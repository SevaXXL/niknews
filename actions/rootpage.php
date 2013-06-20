<?


$section = $db->getAssoc("SELECT unixword, wordid FROM ".PREFIX."category");

include('lib/entries.class.php');
$myEntries = new inTerraEntry($db);
$myEntries->setRoot();

$myEntries->setSection($section['novosti']);
$smarty->assign('newsline', $myEntries->getEntries());

$myEntries->setLimit('5');

$myEntries->setSection($section['soobschenija']);
$smarty->assign('list', $myEntries->getEntries());

$myEntries->setSection($section['press-reliz']);
$smarty->assign('press_reliz', $myEntries->getEntries());

$smarty->assign('template', 'main.tpl');

?>