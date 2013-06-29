<?
/**
 * niknews.mk.ua
 *
 *
 *
 */


/*
if ($_GET) {
    print_r($_GET);
    exit;
};

if ($_GET['frob']) {
    $args = array('frob' => $_GET['frob']);
    $args = array_merge(array("method" => "flickr.auth.getToken", "format" => "rest", "api_key" => "f0d49fb31f9dd2b7e9baa3d6d258dddf"), $args);
    ksort($args);
    $auth_sig = '';
    foreach ($args as $key => $data) {
        $auth_sig .= $key . $data;
    }
    $api_sig = md5('a679f9c4ff805e4d' . $auth_sig);
    $args['api_sig'] = $api_sig;

echo "http://api.flickr.com/services/rest/?method=flickr.auth.getToken&api_key=f0d49fb31f9dd2b7e9baa3d6d258dddf&format=rest&api_sig=$api_sig&frob=".$_GET['frob'];

//    print_r($args);
    exit;
}


//secret (api_key 12345 perms write) по алфавиту
$api_sig = md5('a679f9c4ff805e4dapi_keyf0d49fb31f9dd2b7e9baa3d6d258dddfpermswrite');

echo "http://flickr.com/services/auth/?api_key=f0d49fb31f9dd2b7e9baa3d6d258dddf&perms=write&api_sig=$api_sig";
exit;


// session_start();
require_once('lib/phpFlickr/phpFlickr.php');
$flickr = new phpFlickr('f0d49fb31f9dd2b7e9baa3d6d258dddf', 'a679f9c4ff805e4d');
$result = $flickr->sync_upload('Eagle.jpg', 'title2', 'desc', 'php, css');
print_r($result);
exit;

// Authenticate;  need the "IF" statement or an infinite redirect will occur
if(empty($_GET['frob'])) {
    
    $flickr->auth('write'); // redirects if none; write access to upload a photo

}
else {
    // Get the FROB token, refresh the page;  without a refresh, there will be "Invalid FROB" error
    $flickr->auth_getToken($_GET['frob']);
    header('Location: /photo.html');
    exit();
}
exit;

*/

require_once('configs/settings.php');
require_once('lib/smarty/Smarty.class.php');
require_once('lib/mySmarty.class.php');

$smarty = new mySmarty();

/**
 * :WARNING: доступ администратора
 */
if (isset($_COOKIE['adminExpire'])) {
    if (md5($GLOBALS['_CONFIG']['ADMIN']['USER'].$GLOBALS['_CONFIG']['ADMIN']['SALT'].$GLOBALS['_CONFIG']['ADMIN']['PASS']) === $_COOKIE['adminExpire']) {
        setcookie('adminExpire', $_COOKIE['adminExpire'], time() + $GLOBALS['_CONFIG']['ADMIN']['SESSION_EXPIRE'], '/');
        session_start();
        $_SESSION['admin'] = true;
    } elseif (md5($GLOBALS['_CONFIG']['ADMIN']['SALT']) === $_COOKIE['adminExpire']) {
        session_start();
    } else {
        setcookie('adminExpire', '', time() - 1, '/');
    }
}


/**
 * $_GET['data'] назначается в .htaccess, необходим для путей к кэшируемым файлам
 */
if (array_key_exists('data', $_GET)) {
    $_GET['data'] = strtolower(preg_replace( '/\/+/', '/', $_GET['data'])); // Убираем двойные слэши
    $cacheID  = implode('|', array_diff(explode('/', $_GET['data']), array(''))); // Удаляем пустые элементы
}

if (empty($cacheID)) {
    $cacheID = '______rootpage';
}

$tpl = 'index.tpl'; // Основной шаблон, иные шаблоны не кэшируем

if ($smarty->is_cached($tpl, $cacheID)) {
    $smarty->assign('CACHE', true);
    $smarty->display($tpl, $cacheID);
} else {

/**
 * Подключаемся к БД
 */
    require_once('lib/pear/DB.php');
    $db = DB::connect(array(
        'phptype'  => 'mysql',
        'dbsyntax' => false,
        'protocol' => false,
        'hostspec' => $GLOBALS['_CONFIG']['DB']['HOST'],
        'database' => $GLOBALS['_CONFIG']['DB']['NAME'],
        'username' => $GLOBALS['_CONFIG']['DB']['USER'],
        'password' => $GLOBALS['_CONFIG']['DB']['PASS']
    ));
    if (DB::isError($db)) {
        trigger_error('Connection to database failed!', E_USER_ERROR);
    } else {
        $db->setFetchMode(DB_FETCHMODE_ASSOC);
        $db->setOption('optimize', 'portability');
        $db->query("SET CHARACTER SET UTF8");
        $db->query("SET NAMES UTF8");
    }

    if (array_key_exists('urlcache', $_GET)) { // urlcache - название страницы в адресной строке
        define('YEAR',     $_GET['year']);
        define('MONTH',    $_GET['month']);
        define('DAY',      $_GET['day']);
        define('URLCACHE', $_GET['urlcache']);
        define('REDURL',   '/'.YEAR.'/'.MONTH.'/'.DAY.'/'.URLCACHE.'/');
        $dayStartTimeStamp = mktime(0, 0, 0, MONTH, DAY, YEAR);
        $dayEndTimeStamp = mktime(23, 59, 59, MONTH, DAY, YEAR);

        if (!$_GET['id'] = $db->getOne("SELECT entryid FROM ".PREFIX."entry WHERE intime >= '$dayStartTimeStamp' AND intime <= '$dayEndTimeStamp' AND urlcache = '".URLCACHE."'")) {
               $_GET['action'] = '404';
        }
    }

    switch ($_GET['action'])
    {
        case 'date':
        {
            $year = (int)$_GET['year'];
            if ($year < 1971) $year = 1971;
            elseif ($year > 2030) $year = 2030;

            $month = (int)$_GET['month'];
            if ($month < 1) $month = 1;
            elseif ($month > 12) $month = 12;

            $day = (int)$_GET['day'];
            if ($day < 1) $day = 1;
            elseif ($day > 31) $day = 31;

            switch ($_GET['part'])
            {
                case 'year':
                {
                    include('actions/dateYear.php');
                    break;
                }

                case 'month':
                {
                    include('actions/dateMonth.php');
                    break;
                }

                case 'day':
                {
                    include('actions/dateDay.php');
                    break;
                }
            }
            break;
        }

        case 'keyword':
        {
            if (!empty($_GET['keyword'])) {
                include('actions/keyword.php');
            } else {
                include('actions/keywords.php');
            }
            break;
        }

        case 'section':
        {
            include('actions/section.php');
            break;
        }

        case 'author':
        {
            if (!empty($_GET['author'])) {
                include('actions/author.php');
            } else {
                include('actions/authors.php');
            }
            break;
        }

        case 'entry':
        {
            include('actions/entry.php');
            break;
        }

        case '404':
        {
            include('actions/404.php');
            break;
        }

        case 'add':
        {
            $smarty->caching = false;
            $tpl = 'add.tpl';
            include('actions/add.php');
            break;
        }

        case 'login':
        {
            $smarty->caching = false;
            $tpl = 'login.tpl';
            include('actions/login.php');
            break;
        }

        case 'logout':
        {
            include('actions/logout.php');
            break;
        }

        case 'edit':
        {
            $smarty->caching = false;
            $tpl = 'add.tpl';
            include('actions/add.php');
            break;
        }

        case 'photo':
        {
            $smarty->caching = false;
            $tpl = 'photo.tpl';
            include('actions/photo.php');
            break;
        }

        case 'thumb':
        {
            $smarty->caching = false;
            include('actions/thumb.php');
            exit;
        }

        case 'search':
        {
            $smarty->assign('template', 'search.tpl');
            break;
        }

        // Очистить кэш
        case 'clearc':
        {
            $smarty->clear_all_cache();
            $smarty->clear_compiled_tpl();
            if (!empty($_SERVER['HTTP_REFERER'])) {
                header('Location: '.$_SERVER['HTTP_REFERER']);
            } else {
                header('Location: http://'.$_SERVER['HTTP_HOST']);
            }
            exit;
        }
        // new design
        case 'temp':
        {
            $smarty->caching = false;
            $tpl = 'temp.tpl';
            include('actions/temp.php');
            break;
        }
        default:
        {
            include('actions/rootpage.php');
        }
    }

    $smarty->display($tpl, $cacheID);
}


?>