<?php /* Smarty version 2.6.27, created on 2013-06-29 03:47:10
         compiled from temp.tpl */

$this->_cache_serials['templates_c/%%A1/A12/A120930E%%temp.tpl.inc'] = '58ea5f4f5dac14abfe8647721c9dc386';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'temp.tpl', 6, false),array('modifier', 'escape', 'temp.tpl', 6, false),array('modifier', 'default', 'temp.tpl', 9, false),array('modifier', 'date_format', 'temp.tpl', 95, false),array('modifier', 'mb_truncate', 'temp.tpl', 109, false),array('block', 'dynamic', 'temp.tpl', 37, false),)), $this); ?>
<?php
function _smarty_tplfunc_58ea5f4f5dac14abfe8647721c9dc386_0(&$_smarty)
{
$_smarty->_tag_stack[] = array('dynamic', array()); $_block_repeat=true;smarty_block_dynamic($_smarty->_tag_stack[count($_smarty->_tag_stack)-1][1], null, $_smarty, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    <!-- Static: <?php if ($_smarty->_tpl_vars['CACHE']): ?>Yes<?php else: ?>No<?php endif; ?> | Time: <?php echo $_smarty->_tpl_vars['TIME']; ?>
 s | Queries: <?php echo $_smarty->_tpl_vars['TOTALDBQUERIES']; ?>
 | Memory: <?php echo $_smarty->_tpl_vars['MEMORY']; ?>
 MB -->
  <?php if ($_SESSION['admin']): ?>
    <ul class="admin-menu">
      <li><a href="/logout/" class="exit"></a></li>
      <li><a href="/clearcache/" class="clearcache"></a></li>
      <li><a href="/add/" class="add"></a></li>
    <?php if ($_smarty->_tpl_vars['template'] == 'entry.tpl'): ?>
      <li><a href="edit/" class="edit"></a></li>
      <li><a href="photo/" class="media"></a></li>
    <?php elseif ($_smarty->_tpl_vars['template'] == 'author.tpl'): ?>
      <li><a href="edit/" class="edit"></a></li>
    <?php endif; ?>
    </ul>
  <?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_dynamic($_smarty->_tag_stack[count($_smarty->_tag_stack)-1][1], $_block_content, $_smarty, $_block_repeat); }  array_pop($_smarty->_tag_stack); 
}



?>
