<?

/**
 * Вывод рубрик в два уровня вложенности
 */
function smarty_function_rubrika($params, &$smarty)
{
    global  $db;

    // Строим массив вида
    // Array (
    //     [wordid] => Array (
    //         'word' => Спорт,
    //         'unixword' => sport,
    //         'child' => Array (
    //             'boks' => 'Бокс',
    //             'borba' => ' Борьба'
    //         )
    //     )
    // )
    $rubriks = array();
    foreach ($db->getAll("SELECT wordid, word, unixword, parent FROM ".PREFIX."rubrika ORDER BY parent, word") as $value) {

        if ($value['parent'] == '0') {
            $rubriks[$value['wordid']] = array('word' => $value['word'], 'unixword' => $value['unixword'], 'parent' => '0');
        } elseif ($rubriks[$value['parent']]['parent'] === '0') { // Первый уровень вложенности
            $rubriks[$value['parent']]['child'][$value['unixword']] = $value['word'];
        }
    }

    $smarty->assign('nav_rubrika', $rubriks);
    $smarty->assign('TOTALDBQUERIES', $db->totq);

    $tempStatus = $smarty->caching;
    $smarty->caching = false;
    $data = $smarty->fetch('rubrika.tpl');
    $smarty->caching = $tempStatus;
    return $data;
}

?>