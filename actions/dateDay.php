<?

$smarty->assign(array("year"  =>  $year,
    "month" =>  $month,
    "day"   =>  $day,
    "ts"    =>  mktime(0, 0, 0, $month, $day, $year)));

include('lib/entries.class.php');
$myEntries = new inTerraEntry($db);
$myEntries->setTimes(mktime(0, 0, 0, $month, $day, $year), mktime(23, 59, 59, $month, $day, $year));
$myEntries->setOrder('ASC');
$myEntries->setLimit('100');


$smarty->assign('data', $myEntries->getEntries());
$smarty->assign('template', 'dayView.tpl');


?>