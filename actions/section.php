<?

$rubrika = $db->getAll("SELECT wordid, word, unixword, parent FROM ".PREFIX."rubrika ORDER BY parent, word");

$searchable = array(); // Ассоциативный массив оптимизированный для поиска id по unixword и parent
$rubriks = array(); // Основной рабочий массив

foreach ($rubrika as $value) {
    $searchable[$value['wordid']] = array('unixword' => $value['unixword'], 'parent' => $value['parent']);
    $rubriks[$value['wordid']] = array('word' => $value['word'], 'unixword' => $value['unixword'], 'parent' => $value['parent']);
}

$parent = '0'; // Первая рубрика - всегда родитель, например, sport_fehtovanie
$rubrika = array(); // Обнуляем массив и используем его для формирования пути к рубрике
$link = ''; // Составная ссылка на рубрику
foreach (explode('_', $_GET['section']) as $value) {
    // Проверяем верность названий и вложенности рубрик
    // Подрубрики могут иметь одинаковые названия, т.к. привязаны к родителю
    // Например, Спорт > Бокс > Юниоры и Спорт > Борьба > Юниоры. В этом случае Юниоры разные
    if ($wordid = array_search(array('unixword' => $value, 'parent' => $parent), $searchable)) {
        $link .= $rubriks[$wordid]['unixword'];
        $rubrika[] = array('link' => '/'.$link.'/', 'word' => $rubriks[$wordid]['word']);
        $link .= '_';
        $parent = $wordid;
    } else {
        include('actions/404.php');
    }
}

include('lib/entries.class.php');
$myEntries = new inTerraEntry($db);
// Выбираем все статьи по id младшей рубрики
$myEntries->setEntriesID($db->getCol("SELECT entryid FROM ".PREFIX."rubriks WHERE wordid = '".$wordid."'"));


$smarty->assign(array(
    'data' => $myEntries->getEntries(),
    'rubrika' => $rubrika,
    'section' => $rubriks[$wordid], // Для pagers.tpl
    'title' => $rubriks[$wordid]['word']
));

$totalEntries = $db->getOne("SELECT count(*) FROM ".PREFIX."rubriks WHERE wordid = '".$wordid."'");

if ($_GET['skip'] >= $totalEntries) {
    include('actions/404.php');
} else {
    $smarty->assign('pagerTotal', $totalEntries);
}

$smarty->assign('template', 'section.tpl');

?>