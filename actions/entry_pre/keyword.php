<?

// Удаляем все ссылки на авторов к этой статье
$db->query("DELETE FROM ".PREFIX."keywords WHERE entryid = '".ENTRY_ID."'");
$db->query("OPTIMIZE TABLE ".PREFIX."keywords");

if ($_POST['keyword']) {

    $entry['keyword'] = explode(",", $_POST['keyword']);
    $entry['keyword'] = array_diff($entry['keyword'], array(''));

    // Сортируем по алфавиту
    sort($entry['keyword']);
    reset($entry['keyword']);

    foreach ($entry['keyword'] as $key => $value) {
        $value = adds(preg_replace('/\s+/u',' ', trim($value)));
        if (!empty($value)) {
            $unixkey = urlTranslit($value);
            // Получаем id ключевого слова
            if ($keyWordID = $db->getOne("SELECT wordid FROM ".PREFIX."keyword WHERE unixword = '".$unixkey."'")) {
                $db->query("INSERT INTO ".PREFIX."keywords (entryid, wordid) VALUES('".ENTRY_ID."', '".$keyWordID."')");
            } else {
                $keyWordID = (int)$db->getOne("SELECT max(wordid) FROM ".PREFIX."keyword") + 1;
                $db->query("INSERT INTO ".PREFIX."keyword (wordid, word, unixword) VALUES('".$keyWordID."', '".$value."', '".$unixkey."')");
                $db->query("INSERT INTO ".PREFIX."keywords (entryid, wordid) VALUES('".ENTRY_ID."', '".$keyWordID."')");
            }
            $entry['keyword'][$key] = $value.'|'.$unixkey;
        }
    }
    $entry['keyword'] = implode(',', $entry['keyword']);

} else {
    $entry['keyword'] = null;
}

?>