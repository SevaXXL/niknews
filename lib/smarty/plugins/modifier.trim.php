<?php

/**
 * Smarty trim modifier plugin
 *
 * Type:     modifier
 * Name:     trim
 * Purpose:  Удаляем пробелы в начале и конце строки
 * Example:  {$var|trim}
 * @param string
 * @return string
 */
function smarty_modifier_trim($text)
{
    return trim($text);
}


?>
