<?
/**
 * :WARNING: После отладки установить 0 вместо E_ALL & E_STRICT
 */
error_reporting(E_ALL & E_STRICT);

mb_internal_encoding('UTF-8');
setlocale(LC_ALL, 'ru_RU.UTF-8');

// Загружаем данные из конфига
$GLOBALS['_CONFIG'] = parse_ini_file('config.ini', true);

// Приставка в названии таблиц в БД к этому проекту
define('PREFIX', 'nik_');

// Основная директория
define('ROOT_DIR', substr(dirname(__FILE__), 0, -8));

// Количество новостей на странице при листании
// используется в entry.class.php
define('PER_PAGE', 15);

/**
 * Вспомогательная функция. Экринируем слэши при записи в БД MySQL
 */
function adds($text)
{
    if (get_magic_quotes_gpc()) {
        return $text;
    } else {
        return addslashes($text);
    }
}
function dels($text)
{
    if (get_magic_quotes_gpc()) {
        return stripslashes($text);
    } else {
        return $text;
    }
}



?>