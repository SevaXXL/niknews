<?

/*
 * Возможны многоуровневые рубрики: Parent > Child > Child...
 */

$db->query("DELETE FROM ".PREFIX."rubriks WHERE entryid = '".ENTRY_ID."'");
$db->query("OPTIMIZE TABLE ".PREFIX."rubriks");

if ($_POST['rubrika']) {

    $_POST['rubrika'] = explode(">", $_POST['rubrika']);
    $_POST['rubrika'] = array_diff($_POST['rubrika'], array(''));

    // Цикл от родителей к детям, 0 - самый старший
    $parent = '0';

    foreach ($_POST['rubrika'] as $key => $value) {

        $value = adds(preg_replace('/\s+/u',' ', trim($value)));

        if (!empty($value)) {
            $unixkey = urlTranslit($value);
            // id ключевого слова
            $keyWordID = $db->getOne("SELECT wordid FROM ".PREFIX."rubrika WHERE unixword = '".$unixkey."' AND parent = '".$parent."'");
            if ($keyWordID) {
                $db->query("INSERT INTO ".PREFIX."rubriks (entryid, wordid) VALUES('".ENTRY_ID."', '".$keyWordID."')");
            } else {
                $keyWordID = (int)$db->getOne("SELECT max(wordid) FROM ".PREFIX."rubrika") + 1;
                $db->query("INSERT INTO ".PREFIX."rubrika (wordid, word, unixword, parent) VALUES('".$keyWordID."', '".$value."', '".$unixkey."', '".$parent."')");
                $db->query("INSERT INTO ".PREFIX."rubriks (entryid, wordid) VALUES('".ENTRY_ID."', '".$keyWordID."')");
            }
            $parent = $keyWordID;
            $entry['rubrika'][$key] = $value."|".$unixkey;
        }
    }
    $entry['rubrika'] = implode(",", $entry['rubrika']);

} else {
    $entry['rubrika'] = null;
}

?>