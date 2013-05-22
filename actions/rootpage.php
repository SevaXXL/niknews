<?

// Основная лента новостей
$smarty->assign('newsline', $db->getAll("SELECT * FROM ".PREFIX."entry ORDER BY intime DESC LIMIT 10"));

$smarty->assign('template', 'main.tpl');

?>