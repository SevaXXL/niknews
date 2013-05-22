<?
/**
 * niknews.mk.ua
 *
 *
 *
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
if ($_GET['data']) {
    $_GET['data'] = strtolower(preg_replace( '/\/+/', '/', $_GET['data'])); // Убираем двойные слэши
    $cacheID  = implode('|', array_diff(explode('/', $_GET['data']), array(''))); // Удаляем пустые элементы
}

if (empty($cacheID)) {
    $cacheID = '______rootpage';
}

$tpl = 'index.tpl'; // Основной шаблон

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

    if ($_GET['urlcache']) { // urlcache - название страницы в адресной строке
        define('YEAR',     $_GET['year']);
        define('MONTH',    $_GET['month']);
        define('DAY',      $_GET['day']);
        define('URLCACHE', $_GET['urlcache']);
        define('REDURL',   '/'.YEAR.'/'.MONTH.'/'.DAY.'/'.URLCACHE.'/');
        $dayStartTimeStamp = mktime(0, 0, 0, MONTH, DAY, YEAR);
        $dayEndTimeStamp = mktime(23, 59, 59, MONTH, DAY, YEAR);

        /**
         * :TODO: Добавить префикс в названии таблицы
         */
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
            include('actions/author.php');
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

        default:
        {
            include('actions/rootpage.php');
        }
    }

    $smarty->display($tpl, $cacheID);
}


?>