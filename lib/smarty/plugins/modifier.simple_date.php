<?php
/**
 * Smarty plugin
 * @package Smarty
 */

/**
 * Smarty simple_date modifier plugin
 *
 * @param string
 * @return string|void
 */
function smarty_modifier_simple_date($string)
{
    if (is_numeric($string)) {
        $mounth_array = array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
        return date('j ', $string).$mounth_array[(int)date('n', $string) - 1].date(' Y, G:i', $string);
    }
}


?>
