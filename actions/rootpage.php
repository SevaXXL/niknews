<?


$section = $db->getAssoc("SELECT unixword, wordid FROM ".PREFIX."category");

include('lib/entries.class.php');
$myEntries = new inTerraEntry($db);
$myEntries->setRoot();

$myEntries->setSection($section['novosti']);
$smarty->assign('newsline', $myEntries->getEntries());

$smarty->assign('template', 'main.tpl');

?>