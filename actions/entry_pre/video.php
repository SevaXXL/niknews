<?

/**
 * id видео Youtube получаем напрямую или из адреса
 */

if ($_POST['video']) {

    // Проверяем, послан полный адрес или только код
    if (strpos($_POST['video'], '://') === false) {
        $entry['video'] = $_POST['video'];
    } else {
        $youtube = parse_url($_POST['video']);
        parse_str($youtube['query'], $youtube);
        $entry['video'] = $youtube['v'];
    }

    // Отображать видео как основной материал
    if ($_POST['videofull']) {
        $entry['video'] .= '#true';
    }

} else {
    $entry['video'] = null;
}

?>