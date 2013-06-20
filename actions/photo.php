<?

// global function getPartToFiles()
// global function adds()

if (!$_SESSION['admin']) {
    header('Location: http://'.$_SERVER['HTTP_HOST']);
    exit;
}

// Загрузка новой фотографии
if (isset($_FILES['fupload']) && $_POST['entryid']) {

    if (preg_match('/\.(jpe?g|gif|png)$/ui', $_FILES['fupload']['name'], $matches)) {

        $ext = strtolower($matches[1]);
        if ($ext == 'jpeg') {
            $ext = 'jpg';
        }

        $filename = (int)$db->getOne("SELECT max(imgid) FROM ".PREFIX."image") + 1;
        $path_to_image_directory = 'files/fullsize/part'.getPartToFiles($filename).'/';

        if (!file_exists($path_to_image_directory)) {
            mkdir($path_to_image_directory, 0777);
        }

        $source = $_FILES['fupload']['tmp_name'];
        $target = $path_to_image_directory.$filename.'.'.$ext;
        $max_file_size = 1 * 1024 * 1024; // Первый множитель указывается в мегабайтах

        if ($_FILES['fupload']['size'] > $max_file_size) {
            require_once('lib/resizeimage.class.php');
            $resize = new ResizeImage($source);
            $resize->resizeTo(1200, 1200); // Без указания дополнительных параметров масштабирует пропорционально по большей стороне
            $resize->saveImage($target, 75);            
        } else {
           move_uploaded_file($source, $target);
        }

        if (file_exists($target)) {
            $sort = (int)$db->getOne("SELECT max(sort) FROM ".PREFIX."image WHERE entryid = '".(int)$_POST['entryid']."'") + 1;
            $db->query("INSERT INTO ".PREFIX."image SET
                imgid = '".$filename."',
                entryid = '".(int)$_POST['entryid']."',
                ext = '".$ext."',
                sort = '".$sort."',
                caption = '".adds(htmlspecialchars(trim(preg_replace('/\s+/u',' ', $_POST['caption'])), ENT_COMPAT, 'UTF-8'))."',
                credit = '".adds(htmlspecialchars(trim(preg_replace('/\s+/u',' ', $_POST['credit'])), ENT_COMPAT, 'UTF-8'))."'");
            if ($sort == 1) { // По умолчанию превьюшка к тексту назначается только по первой фотографии 
                $db->query("UPDATE ".PREFIX."entry SET image = '".$filename."' WHERE entryid = '".(int)$_POST['entryid']."'");
            }
            header('Location: '.substr($_SERVER['HTTP_REFERER'], 0, -6)); // substr url ../
        } else {
            echo "Error file_exists($target)";
        }
    } else {
        echo 'Недопустимое расширение файла';
    }
    exit;

// Удаление файлов
} elseif ($_GET['delete'] && $_GET['mainphoto'] && $_GET['entryid']) {

    array_map('unlink', glob('files/part'.getPartToFiles($_GET['delete']).'/'.$_GET['delete'].'-*.*'));
    array_map('unlink', glob('files/fullsize/part'.getPartToFiles($_GET['delete']).'/'.$_GET['delete'].'.*')); // (jpg|gif|png)
    $db->query("DELETE FROM ".PREFIX."image WHERE imgid = '".(int)$_GET['delete']."'");
    $db->query("OPTIMIZE TABLE ".PREFIX."image");
    if ($_GET['delete'] === $_GET['mainphoto']) { // Переназначаем превьюшку или устанавливаем 0
        $imgid = (int)$db->getOne("SELECT imgid FROM ".PREFIX."image WHERE entryid = '".(int)$_GET['entryid']."' LIMIT 1");
        $db->query("UPDATE ".PREFIX."entry SET image = '".$imgid."' WHERE entryid = '".(int)$_GET['entryid']."'");
    }
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;

// Назначаем фото-превьюшку к статье
} elseif ($_GET['new_mainphoto'] && $_GET['entryid']) {
    $db->query("UPDATE ".PREFIX."entry SET image = '".(int)$_GET['new_mainphoto']."' WHERE entryid = '".(int)$_GET['entryid']."'");
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;

// Новая сортировка фотографий
} elseif ($_GET['sort']) {
    foreach (explode('_', $_GET['sort']) as $key => $value) {
        $db->query("UPDATE ".PREFIX."image SET sort = '".($key + 1)."' WHERE imgid = '".(int)$value."'");
    }
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;

// Изменяем подпись к фото
} elseif ($_GET['imgid'] && array_key_exists('caption', $_GET) && array_key_exists('credit', $_GET)) {
    $db->query("UPDATE ".PREFIX."image SET caption = '".adds(htmlspecialchars(trim(preg_replace('/\s+/u',' ', $_GET['caption'])), ENT_COMPAT, 'UTF-8'))."', credit = '".adds(htmlspecialchars(trim(preg_replace('/\s+/u',' ', $_GET['credit'])), ENT_COMPAT, 'UTF-8'))."' WHERE imgid = '".(int)$_GET['imgid']."'");
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;    

// Выдаем имеющиеся файлы
} else {

    if ($photos = $db->getAll("SELECT imgid, ext, caption, credit FROM ".PREFIX."image WHERE entryid = '".(int)$_GET['id']."' ORDER BY sort")) {
        foreach ($photos as $key => $value) {
            $photos[$key]['part'] = getPartToFiles($value['imgid']);
        }
    }
    $smarty->assign('photos', $photos);
    $smarty->assign('mainphoto', $db->getOne("SELECT image FROM ".PREFIX."entry WHERE entryid = '".(int)$_GET['id']."'"));
}

?>