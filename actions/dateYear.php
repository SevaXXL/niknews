<?

//assign some data
$smarty->assign
(
    array
    (
        'thisYear' => $year,
        'thisMonth' =>  $month,
        'years' => $db->getCol("SELECT DISTINCT FROM_UNIXTIME(intime,'%Y') AS myYear FROM ".PREFIX."entry ORDER BY intime"),
        'months' => $db->getCol("SELECT DISTINCT FROM_UNIXTIME(intime,'%c') AS myMonth FROM ".PREFIX."entry WHERE intime > '".mktime(0, 0, 0, 1, 1, $year)."' AND intime < '".mktime(23, 59, 59, 12, 31, $year)."' ORDER BY intime DESC"),
        'title' => $year
    )
);
                            

$smarty->assign('template', 'yearView.tpl');

?>