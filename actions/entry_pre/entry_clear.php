<?


// Обязательно должен быть заголовок
$entry['title'] = htmlspecialchars(trim(preg_replace('/\s+/u',' ', $_POST['title'])), ENT_COMPAT, 'UTF-8');
if (empty($entry['title'])) {
    $entry['title'] = 'Title';
}

$entry['subtitle'] = htmlspecialchars(trim(preg_replace('/\s+/u',' ', $_POST['subtitle'])), ENT_COMPAT, 'UTF-8');

// Первый абзац вырезаем в лид
if ($position = mb_strpos($_POST['content'], '</p>', 0, 'UTF-8')) {
    // учитываем закрывающий тэг из 4 символов
    $position += 4;

    // :TODO: подстраиваемся под конкретный WYSIWYG-редактор
    $entry['lead'] = preg_replace('/\n\t\s*/u','\t', trim(mb_substr($_POST['content'], 0, $position)));
    $entry['content'] = preg_replace('/\n\t\s*/u','\t', trim(mb_substr($_POST['content'], $position)));
} else {
    $entry['lead'] = preg_replace('/\n\t\s*/u','\t', trim($_POST['content']));
}


if ($_POST['comments']) {
    $entry['comments'] = '1';
} else {
    $entry['comments'] = '0';
}

if ($_POST['format']) {
    $entry['format'] = '1';
} else {
    $entry['format'] = '0';
}

?>