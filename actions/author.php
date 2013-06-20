<?

/**
 * Страница автора
 */

if (preg_match('/^[-a-z0-9]+$/u', $_GET['author'])) { // Защита от инъекций
    $author = $db->getRow("SELECT wordid, word FROM ".PREFIX."author WHERE unixword = '".$_GET['author']."'");
}

// Номера статей с данным автором
$tData = $db->getCol("SELECT DISTINCT entryid FROM ".PREFIX."authors WHERE wordid = '".$author['wordid']."'");

if ($tData) {
    $data = $db->getAll("SELECT title, intime, urlcache
        FROM ".PREFIX."entry
        WHERE entryid IN (".implode(',', $tData).")
        ORDER BY intime DESC");    
}

if ($data) {
    $smarty->assign(array(
        'author' =>  $author['word'],
        'data'   =>  $data
        ));
    $smarty->assign('template', 'author.tpl');
} else {
    include('actions/404.php');
}

?>