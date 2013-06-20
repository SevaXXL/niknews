<?

$smarty->assign('authors', $db->getAll("SELECT 
    ".PREFIX."author.word,
    ".PREFIX."author.unixword,
    count(".PREFIX."authors.entryid) AS total
    FROM ".PREFIX."authors
    LEFT JOIN ".PREFIX."author ON (".PREFIX."authors.wordid = ".PREFIX."author.wordid)
    GROUP BY ".PREFIX."authors.wordid
    ORDER BY ".PREFIX."author.word"));

$smarty->assign('template', 'authors.tpl');

?>