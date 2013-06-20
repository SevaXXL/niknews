<?

include('lib/entries.class.php');
$myEntries = new inTerraEntry($db);
$entry = $myEntries->getEntry($_GET['id']);

if (!$entry) {
    include('actions/404.php');
}



/**
 * :TODO: Добавить данные об авторе: сайт, должность и т.д.
 */



if ($images = $db->getAll("SELECT imgid, ext, caption, credit FROM ".PREFIX."image WHERE entryid = '".(int)$_GET['id']."' ORDER BY sort")) {
    foreach ($images as $key => $value) {
        $images[$key]['part'] = getPartToFiles($value['imgid']);
        if ($value['imgid'] == $entry['image'] && $key == 0) { // Главная фотография и первая по списку
            $size = getimagesize ('files/fullsize/part'.$images[$key]['part'].'/'.$value['imgid'].'.'.$value['ext']);
            if ($size[0] > 640 && $size[0] / $size[1] > 1.5) { // Горизонтальную фотографию размещаем крупно сверху
                $entry['top_photo']['id'] = $value['imgid'];
                $entry['top_photo']['ext'] = $value['ext'];
                $entry['top_photo']['part'] = $images[$key]['part'];
                $entry['top_photo']['credit'] = $value['credit'];
                $entry['top_photo']['caption'] = $value['caption'];
                unset($images[$key]);
            }
        }
    }
}

$smarty->assign('data', $entry);


$smarty->assign('images', $images);

// После assign data
$smarty->assign('title', $smarty->_tpl_vars['data']['title']);
$smarty->assign('template', 'entry.tpl');

?>