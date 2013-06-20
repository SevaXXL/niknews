<?

/**
 * Создаем ЧПУ
 */

// Для новых материалов в автоматическом режиме url пустое и создается из заголовка
if (empty($_POST['url'])) {
    $_POST['url'] = $_POST['title'];
}

$entry['urlcache'] = urlTranslit($_POST['url']);

if (empty($entry['urlcache'])) {
    $entry['urlcache'] = 'niknews';
}

// Дубликаты в названии в данный день
if ($_POST['id']) {
    if ($db->getOne("SELECT entryid FROM ".PREFIX."entry
        WHERE intime >= '$dayStartTimeStamp'
            AND intime <= '$dayEndTimeStamp'
            AND urlcache = '".$entry['urlcache']."'
            AND entryid != '".(int)$_POST['id']."'")) {
        // При редактировании дубликату URL добавляем его id
        $entry['urlcache'] = $entry['urlcache'].'-'.(int)$_POST['id'];
    }
} else {
    if ($db->getOne("SELECT entryid FROM ".PREFIX."entry
        WHERE intime >= '$dayStartTimeStamp'
            AND intime <= '$dayEndTimeStamp'
            AND urlcache = '".$entry['urlcache']."'")) {
        // При новой записи дубликату добавляем рандомный номер
        $entry['urlcache'] = $entry['urlcache'].'-'.rand(1000, 9999);
    }
}


?>