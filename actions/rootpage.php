<?


$section = $db->getAssoc("SELECT unixword, wordid FROM ".PREFIX."category");

include('lib/entries.class.php');
$myEntries = new inTerraEntry($db);
$myEntries->setRoot();

$myEntries->setSection($section['novosti']);
$smarty->assign('newsline', $myEntries->getEntries());

// :TODO: $rubrika заменить номером для сокращения количества обращений к БД

$rubrikaid = $db->getOne("SELECT wordid FROM ".PREFIX."rubrika WHERE word = 'Спорт'");
$smarty->assign('sport', $db->getAll("SELECT title, intime, urlcache FROM ".PREFIX."rubriks LEFT JOIN ".PREFIX."entry ON ".PREFIX."entry.entryid = ".PREFIX."rubriks.entryid WHERE wordid = '".$rubrikaid."' ORDER BY ".PREFIX."entry.intime DESC LIMIT 10"));

$rubrikaid = $db->getOne("SELECT wordid FROM ".PREFIX."rubrika WHERE word = 'Политика'");
$smarty->assign('pilitika', $db->getAll("SELECT title, intime, urlcache FROM ".PREFIX."rubriks LEFT JOIN ".PREFIX."entry ON ".PREFIX."entry.entryid = ".PREFIX."rubriks.entryid WHERE wordid = '".$rubrikaid."' ORDER BY ".PREFIX."entry.intime DESC LIMIT 3"));

$rubrikaid = $db->getOne("SELECT wordid FROM ".PREFIX."rubrika WHERE word = 'Общество'");
$smarty->assign('obschestvo', $db->getAll("SELECT title, intime, urlcache FROM ".PREFIX."rubriks LEFT JOIN ".PREFIX."entry ON ".PREFIX."entry.entryid = ".PREFIX."rubriks.entryid WHERE wordid = '".$rubrikaid."' ORDER BY ".PREFIX."entry.intime DESC LIMIT 3"));

$rubrikaid = $db->getOne("SELECT wordid FROM ".PREFIX."rubrika WHERE word = 'Криминал'");
$smarty->assign('kriminal', $db->getAll("SELECT title, intime, urlcache FROM ".PREFIX."rubriks LEFT JOIN ".PREFIX."entry ON ".PREFIX."entry.entryid = ".PREFIX."rubriks.entryid WHERE wordid = '".$rubrikaid."' ORDER BY ".PREFIX."entry.intime DESC LIMIT 3"));


$smarty->assign('template', 'main.tpl');

?>