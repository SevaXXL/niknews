<?

/**
 * Связанные материалы. Статьи вокруг одного случая
 */

$db->query("DELETE FROM ".PREFIX."related WHERE entryid = '".ENTRY_ID."'");
$db->query("OPTIMIZE TABLE ".PREFIX."related");

if ($_POST['related']) {

    // Связанные статьи могут быть перечисленны. Используем первую позицию
    $related_entry = explode(',', $_POST['related']);
    $related_entry = $related_entry[0];

    // Если связываемая статья существует
    if ($db->getOne("SELECT entryid FROM ".PREFIX."entry WHERE entryid = '".(int)$related_entry."'")) {
        // Получаем id связки
        $related = $db->getOne("SELECT relatedid FROM ".PREFIX."related WHERE entryid ='".(int)$related_entry."'");

        if (!$related) {
            // Связки не оказалось. Создаем связку и обрабатываем также связываемую статью
            $related = (int)$db->getOne("SELECT max(relatedid) FROM ".PREFIX."related") + 1;
            // С кем связываем...
            $db->query("INSERT INTO ".PREFIX."related SET entryid = '".(int)$related_entry."', relatedid = '".$related."'");
            $db->query("UPDATE ".PREFIX."entry SET related = '1' WHERE entryid = '".(int)$related_entry."'");
        }
        // ...и что связываем
        $db->query("INSERT INTO ".PREFIX."related SET entryid = '".ENTRY_ID."', relatedid = '".$related."'");
        $entry['related'] = '1';
    } else {
        $entry['related'] = '0';
    }

} else {
    $entry['related'] = '0';
}


?>