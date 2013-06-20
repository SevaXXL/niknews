<?

if (!$_SESSION['admin']) {
    header('Location: http://'.$_SERVER['HTTP_HOST']);
    exit;
}

$smarty->caching = false;
$smarty->autoload_filters = array();

if ($_POST) {

    $entry = array();

    // Дата статьи и граничные метки даты статьи
    $entry['date'] = strtotime($_POST['date'].' '.$_POST['time']);
    $dayStartTimeStamp = strtotime($_POST['date']);
    $dayEndTimeStamp = strtotime($_POST['date'].' 23:59:59');

    // Определяем id статьи (для keywords, authors и т.д)
    if ($_POST['id']) {
        define('ENTRY_ID', (int)$_POST['id']);
    } else {
        define('ENTRY_ID', (int)$db->getOne("SELECT max(entryid) FROM ".PREFIX."entry") + 1);
    }

    // Предпроцессы
    foreach (glob('actions/entry_pre/*.php') as $value) {
        include_once($value);
    }

    // Обновляем или добавляем
    if ($_POST['id']) {

        $db->query("UPDATE ".PREFIX."entry
            SET
                title         = '".adds($entry['title'])."',
                subtitle      = '".adds($entry['subtitle'])."',
                lead          = '".adds($entry['lead'])."',
                content       = '".adds($entry['content'])."',
                catid         = '".(int)$_POST['catid']."',
                region        = '".(int)$_POST['region']."',
                intime        = '".$entry['date']."',
                comments      = '".$entry['comments']."',
                video         = '".adds($entry['video'])."',
                rubrikacache  = '".$entry['rubrika']."',
                authorcache   = '".$entry['author']."',
                keywordcache  = '".$entry['keyword']."',
                urlcache      = '".$entry['urlcache']."',
                format        = '".$entry['format']."',
                number        = '".(int)$_POST['number']."',
                related       = '".$entry['related']."'
            WHERE entryid     = '".ENTRY_ID."'");

    } else {

        $db->query("INSERT INTO ".PREFIX."entry
            SET
                entryid       = '".ENTRY_ID."',
                title         = '".adds($entry['title'])."',
                subtitle      = '".adds($entry['subtitle'])."',
                lead          = '".adds($entry['lead'])."',
                content       = '".adds($entry['content'])."',
                catid         = '".(int)$_POST['catid']."',
                region        = '".(int)$_POST['region']."',
                intime        = '".$entry['date']."',
                image         = '0',
                video         = '".adds($entry['video'])."',
                rubrikacache  = '".$entry['rubrika']."',
                authorcache   = '".$entry['author']."',
                keywordcache  = '".$entry['keyword']."',
                urlcache      = '".$entry['urlcache']."',
                format        = '".$entry['format']."',
                comments      = '".$entry['comments']."',
                number        = '".(int)$_POST['number']."',
                related       = '".$entry['related']."'");
    }

    // Постпроцессы
    foreach (glob('actions/entry_post/*.php') as $value) {
        include_once($value);
    }

    // $smarty->clear_cache(null,"______rootpage");
    // $smarty->clear_cache(null,"keyword");
    // $smarty->clear_cache(null,"keyword2");
    // $smarty->clear_cache(null,"cat_type");
    // $smarty->clear_cache(null,"gal_type");
    // $smarty->clear_cache(null,date("Y|m|d",$date));


    header('Location: http://'.$_SERVER['HTTP_HOST'].date('/Y/m/d/', $entry['date']).$entry['urlcache'].'/');
    exit;
}





/********************************************
 * Форма редактирования или создания статьи *
 ********************************************/


if ($_GET['table'] == "update") {

    $data = $db->getRow("SELECT * FROM ".PREFIX."entry WHERE entryid = '".(int)$_GET['id']."'");

    $data['author'] = $db->getCol("SELECT
        ".PREFIX."author.word
        FROM ".PREFIX."authors
        LEFT JOIN ".PREFIX."author ON ".PREFIX."authors.wordid = ".PREFIX."author.wordid
        WHERE ".PREFIX."authors.entryid = '".(int)$_GET['id']."'");
    $data['author'] = implode(',', $data['author']);

    $data['keyword'] = $db->getCol("SELECT
        ".PREFIX."keyword.word
        FROM ".PREFIX."keywords
        LEFT JOIN ".PREFIX."keyword ON ".PREFIX."keywords.wordid = ".PREFIX."keyword.wordid
        WHERE ".PREFIX."keywords.entryid = '".(int)$_GET['id']."'");
    $data['keyword'] = implode(',', $data['keyword']);

    $data['rubrika'] = $db->getCol("SELECT
        ".PREFIX."rubrika.word
        FROM ".PREFIX."rubriks
        LEFT JOIN ".PREFIX."rubrika ON ".PREFIX."rubriks.wordid = ".PREFIX."rubrika.wordid
        WHERE ".PREFIX."rubriks.entryid = '".(int)$_GET['id']."'
        ORDER BY ".PREFIX."rubrika.parent");
    $data['rubrika'] = implode(' > ', $data['rubrika']);

    // Код видео и его значимость к статье
    if ($data['video']) {
        $data['video'] = explode('#', $data['video']);
        $data['videofull'] = $data['video'][1];
        $data['video'] = $data['video'][0];
    }

    // Все связанные статьи без текущей
    if ($data['related']) {
        $data['related'] = $db->getOne("SELECT relatedid FROM ".PREFIX."related WHERE entryid = '".(int)$_GET['id']."'");
        $data['related'] = $db->getCol("SELECT entryid FROM ".PREFIX."related WHERE relatedid = '".$data['related']."' AND entryid != '".(int)$_GET['id']."'");
        $data['related'] = implode(',', $data['related']);
    } else {
        unset($data['related']);
    }

    $smarty->assign('data', $data);

} else {

    $smarty->assign('data', array(
        'intime'   => time(),
        'sport'    => false,
        'comments' => true,
        'format'   => true));

}

// Рубрики. Создаем ассоциативный массив с ключем из id и массивом внутри - необходим для группировки при выводе
$rubrika = array();

foreach ($db->getAll("SELECT wordid, word, parent FROM ".PREFIX."rubrika") as $value) {
    $rubrika[$value['wordid']] = array('word' => $value['word'], 'parent' => $value['parent']);
}

$rubrika_tag = array();
$rubrika_tags = array();

// Собираем тэги вида Parent > Child в массив $rubrika_tags
foreach ($rubrika as $key => $value) {
    $rubrika_tag = null;
    $parent = $value['parent'];
    $rubrika_tag[] = $value['word'];
    while ($parent != 0) {
        array_unshift($rubrika_tag, $rubrika[$parent]['word']);
        $parent = $rubrika[$parent]['parent'];
    }
    $rubrika_tag = implode(' > ', $rubrika_tag);
    $rubrika_tags[$key] = $rubrika_tag;
}

// Сортируем по алфавиту с сохранением ключей
asort($rubrika_tags);
reset($rubrika_tags);

$smarty->assign(array(
    'keyword'  => $db->getCol("SELECT word FROM ".PREFIX."keyword ORDER BY word"),
    'author'   => $db->getCol("SELECT word FROM ".PREFIX."author ORDER BY word"),
    'region'   => $db->getAssoc("SELECT wordid, word FROM ".PREFIX."region ORDER BY word"),
    'category' => $db->getAssoc("SELECT wordid, word FROM ".PREFIX."category ORDER BY word"),
    'rubrika'  => $rubrika_tags,
    'template' => 'add.tpl'));

?>