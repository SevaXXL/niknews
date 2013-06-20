<?

/**
 * Удаляем пустые разделы и неиспользуемые ключевые слова
 */

# authors
$authors = array();
$authors = $db->getCol("SELECT DISTINCT wordid FROM ".PREFIX."authors");
if (!empty($authors)) {
    $db->query("DELETE FROM ".PREFIX."author WHERE wordid NOT IN (".implode(",", $authors).")");
    $db->query("OPTIMIZE TABLE ".PREFIX."author");
}

# keywords
$keywords = array();
$keywords = $db->getCol("SELECT DISTINCT wordid FROM ".PREFIX."keywords");
if (!empty($keywords)) {
    $db->query("DELETE FROM ".PREFIX."keyword WHERE wordid NOT IN (".implode(",", $keywords).")");
    $db->query("OPTIMIZE TABLE ".PREFIX."keyword");
}

# cat_type
// $cat_types = array();
// $cat_types = $db->getCol("SELECT DISTINCT wordid FROM bim_cat_types");
// if(!empty($cat_types)){
//         $db->query("DELETE FROM bim_cat_type WHERE wordid NOT IN(".implode(",",$cat_types).")");
//         $db->query("OPTIMIZE TABLE bim_cat_type");
// }

# rubrika
$rubrika = array();
$rubrika = $db->getCol("SELECT DISTINCT wordid FROM ".PREFIX."rubriks");
if (!empty($rubrika)) {
    $db->query("DELETE FROM ".PREFIX."rubrika WHERE wordid NOT IN (".implode(",", $rubrika).")");
    $db->query("OPTIMIZE TABLE ".PREFIX."rubrika");
}

/*
# rubrika
$rubrika = array();
$rubrika = $db->getCol("SELECT DISTINCT rubrika FROM ".PREFIX."entry");
if (!empty($rubrika)) {
    // Родительские рубрики в статье не указаны, их тоже добавляем в список
    // Например, есть статьи "Спорт > Шахматы", но нет статей "Спорт",
    // значит рубрику "Спорт" тоже нужно сохранить.
    $all_rubriks = $db->getAssoc("SELECT wordid, parent FROM ".PREFIX."rubrika");
    foreach ($rubrika as $value) {
        $parent = $all_rubriks[$value];
        while ($parent > 0) {
            // Избегаем дублирования
            if (!in_array($parent, $rubrika)) {
                $rubrika[] = $parent;
            }
            $parent = $all_rubriks[$parent];
        }
    }

    $db->query("DELETE FROM ".PREFIX."rubrika WHERE wordid NOT IN (".implode(",", $rubrika).")");
    $db->query("OPTIMIZE TABLE ".PREFIX."rubrika");
}
*/
?>