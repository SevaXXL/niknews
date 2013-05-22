<?

//check access
if (!$_SESSION['admin']) {
    header('Location: http://'.$_SERVER['HTTP_HOST']);
    exit;
}


// Редактируем или делаем новую запись
if ($_GET['table'] == 'update') {
    $entry = $db->getRow("SELECT * FROM ".PREFIX."entry WHERE entryid = '".(int)$_GET['id']."'");
    $smarty->assign('data', $entry);
} else {
    $smarty->assign('newPost', true);
}

$smarty->assign(array
(
    'authors'       =>  
    array('odin', 'dva')
    //$db->getAssoc("SELECT authorid, fullName FROM ".PREFIX."authors ORDER BY authorid LIMIT 300")
));

?>