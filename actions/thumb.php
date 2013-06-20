<?

/**
 * Генерируем превьюшки по get-запросу
 */

// original: files/fullsize/part1/1.jpg
// thumb: files/part1/1-100x100.jpg
// global function getPartToFiles()

$image = array();

$image['part_number']        = getPartToFiles($_GET['image']);
$image['fullsize_path']      = ROOT_DIR.'/files/fullsize/part'.$image['part_number'];
$image['fullsize_filename']  = $_GET['image'].'.'.$_GET['ext'];
$image['thumbnail_path']     = ROOT_DIR.'/files/part'.$image['part_number'];
$image['thumbnail_filename'] = $_GET['image'].'-'.$_GET['width'].'x'.$_GET['height'].'.'.$_GET['ext'];
$image['quality']            = 75;

if (!file_exists($image['thumbnail_path'])) {
    mkdir($image['thumbnail_path'], 0777);
}

if ($_GET['option']) {
    $image['option'] = $_GET['option'];
} else {
    $image['option'] = null;
}

require_once(ROOT_DIR.'/lib/resizeimage.class.php');
$Resize = new ResizeImage($image['fullsize_path'].'/'.$image['fullsize_filename']);
$Resize->resizeTo($_GET['width'], $_GET['height'], $image['option']);
$Resize->saveImage($image['thumbnail_path'].'/'.$image['thumbnail_filename'], $image['quality'], true);



?>