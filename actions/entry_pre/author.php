<?

// Удаляем все ссылки на авторов к этой статье
$db->query("DELETE FROM ".PREFIX."authors WHERE entryid = '".ENTRY_ID."'");
$db->query("OPTIMIZE TABLE ".PREFIX."authors");

if ($_POST['author']) {

    $entry['author'] = explode(",", $_POST['author']);
    $entry['author'] = array_diff($entry['author'], array(''));

    // Сортируем по алфавиту
    sort($entry['author']);
    reset($entry['author']);

    foreach ($entry['author'] as $key => $value) {
        $value = adds(preg_replace('/\s+/u',' ', trim($value)));
        $unixkey = urlTranslit($value);
        if (!empty($value)) {
            // Получаем id ключевого слова
            if ($keyWordID = $db->getOne("SELECT wordid FROM ".PREFIX."author WHERE unixword = '".$unixkey."'")) {
                $db->query("INSERT INTO ".PREFIX."authors (entryid, wordid) VALUES('".ENTRY_ID."', '".$keyWordID."')");
            } else {
                $keyWordID = (int)$db->getOne("SELECT max(wordid) FROM ".PREFIX."author") + 1;
                $db->query("INSERT INTO ".PREFIX."author (wordid, word, unixword) VALUES('".$keyWordID."', '".$value."', '".$unixkey."')");
                $db->query("INSERT INTO ".PREFIX."authors (entryid, wordid) VALUES('".ENTRY_ID."', '".$keyWordID."')");
            }
        }
        $entry['author'][$key] = $value."|".$unixkey;
    }
    $entry['author'] = implode(",", $entry['author']);

} else {
    $entry['author'] = null;    
}


?>