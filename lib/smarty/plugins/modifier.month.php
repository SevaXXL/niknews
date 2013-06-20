<?php

/**
 * Smarty month modifier plugin
 *
 * @param string - number of month 01..11
 * @return string|void
 */
function smarty_modifier_month($string)
{
    $mounth_array = array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
    return $mounth_array[(int)$string - 1];
}


?>
