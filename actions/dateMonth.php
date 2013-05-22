<?

$smarty->assign(array(
    'year' => $year,
    'month' => date('m', mktime(0, 0, 0, $month, $day, $year))));

$smarty->assign('data', $db->getAll("SELECT title, intime, entryid, urlcache
    FROM ".PREFIX."entry
    WHERE intime > '".mktime(0, 0, 0, $month, 1, $year)."'
        AND intime < '".mktime(23, 59, 59, $month, date('t', mktime(0, 0, 0, $month, 1, $year)), $year)."'
    ORDER BY intime DESC"));

$smarty->assign('template', 'monthView.tpl');

?>