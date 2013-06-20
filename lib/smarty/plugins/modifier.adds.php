<?php


/**
 * Smarty add slash modifier plugin
 *
 * @param string
 * @return string
 */
function smarty_modifier_adds($string)
{
    return addslashes($string);
}

?>
