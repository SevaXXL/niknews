<?php /* Smarty version 2.6.27, created on 2013-06-24 21:51:52
         compiled from yearView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'calendar', 'yearView.tpl', 10, false),)), $this); ?>
<ul class="nav nav-pills">
    <li><a href="/archiv/arc.shtml">2004-2006</a></li>
<?php $_from = $this->_tpl_vars['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['myYear']):
?>
    <li<?php if ($this->_tpl_vars['myYear'] == $this->_tpl_vars['thisYear']): ?> class="active"<?php endif; ?>><a href="/<?php echo $this->_tpl_vars['myYear']; ?>
/"><?php echo $this->_tpl_vars['myYear']; ?>
</a></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
<div class="row-fluid">
<?php $_from = $this->_tpl_vars['months']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['month'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['month']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['myMonth']):
        $this->_foreach['month']['iteration']++;
?>
    <div class="span3">
        <?php echo smarty_function_calendar(array('year' => $this->_tpl_vars['thisYear'],'month' => $this->_tpl_vars['myMonth'],'ignoreNav' => true), $this);?>

    </div>
    <?php if (( $this->_foreach['month']['iteration'] == 4 || $this->_foreach['month']['iteration'] == 8 ) && ! ($this->_foreach['month']['iteration'] == $this->_foreach['month']['total'])): ?>
</div>
<div class="row-fluid">
    <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</div>