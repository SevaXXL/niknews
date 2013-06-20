<?
/**
 * :WARNING: После отладки установить 0 вместо E_ALL & E_STRICT
 */
// error_reporting(E_ALL & E_STRICT);
error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(E_ALL);

mb_internal_encoding('UTF-8');
setlocale(LC_ALL, 'ru_RU.UTF-8');
$GLOBALS['_CONFIG'] = parse_ini_file('config.ini', true);

// Приставка в названии таблиц в БД к этому проекту
define('PREFIX', 'bim_');

// Основная директория
define('ROOT_DIR', substr(dirname(__FILE__), 0, -8));

// Количество новостей на странице при листании
define('PER_PAGE', 15);



/**
 * global function
 * Номер директории изображения
 */
function getPartToFiles($filenumber)
{
	return ceil((int)$filenumber / 1000);
}

/**
 * global function
 * Экринируем слэши при записи в БД MySQL
 */
function adds($text)
{
    if (get_magic_quotes_gpc()) {
        return $text;
    } else {
        return addslashes($text);
    }
}

/**
 * global function
 * Правильные URL
 */
function urlTranslit($string)
{
    $cyr = array('щ',  'ш', 'ч', 'ц', 'ю', 'я', 'ж', 'а','б','в','г','д','е','ё','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ы','э','є','ї');
    $lat = array('sch','sh','ch','ts','ju','ja','zh','a','b','v','g','d','e','e','z','i','j','k','l','m','n','o','p','r','s','t','u','f','h','y','e','e','i');

    $string = mb_strtolower($string, 'utf-8');

    $string = preg_replace('/[_\s\.,?!]+\b/u', '-', $string);
    $string = preg_replace('/-{2,}/u', '-', $string);

    // Значимые ЬЪ заменяем на j, незначимые удаляем
    $string = preg_replace('/(ь|ъ)(а|е|ё|и|о|у|ы|э|ю|я)/u', 'j\\2', $string);
    $string = preg_replace('/(ь|ъ)/u', '', $string);

    $string = str_replace('ия', 'ia', $string);
    $string = str_replace($cyr, $lat, $string);

    $string = preg_replace('/j{2,}/u', 'j', $string);
    $string = preg_replace('/[^0-9a-z\-]+/u', '', $string);

    return $string;
}

?>