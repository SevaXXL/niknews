<?

//include('lib/entries.class.php');
//$myEntries = new inTerraEntry($db);
//$entry = $myEntries->getEntry($_GET['id']);

$entry = $db->getRow("SELECT * FROM ".PREFIX."entry WHERE entryid = '".(int)$_GET['id']."'");

if (!$entry) {
    include('actions/404.php');
}

$smarty->assign('data', $entry);
$smarty->assign('template', 'entry.tpl');



?>