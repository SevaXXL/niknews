<?php /* Smarty version 2.6.27, created on 2013-06-10 00:19:08
         compiled from monthView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'monthView.tpl', 7, false),array('function', 'calendar', 'monthView.tpl', 25, false),)), $this); ?>
<div class="page-header">
    <h1><a href="/<?php echo $this->_tpl_vars['year']; ?>
/"><?php echo $this->_tpl_vars['year']; ?>
</a><small>/<?php echo $this->_tpl_vars['month']; ?>
</small></h1>
</div>
<div class="row-fluid">
    <div class="span9">
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myData'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myData']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['entry']):
        $this->_foreach['myData']['iteration']++;
?>
    <?php if ($this->_tpl_vars['myDay'] != ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d"))): ?>
        <?php if (! ($this->_foreach['myData']['iteration'] <= 1)): ?>
        </ol>
        <?php endif; ?>
        <?php $this->assign('myDay', ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d"))); ?>
        <?php $this->assign('myDayFull', ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%e %B") : smarty_modifier_date_format($_tmp, "%e %B"))); ?>
        <h2><a href="/<?php echo $this->_tpl_vars['year']; ?>
/<?php echo $this->_tpl_vars['month']; ?>
/<?php echo $this->_tpl_vars['myDay']; ?>
/"><?php echo $this->_tpl_vars['myDayFull']; ?>
</a></h2>
        <ol>
    <?php endif; ?>
            <li>
                <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '/%Y/%m/%d/') : smarty_modifier_date_format($_tmp, '/%Y/%m/%d/')); ?>
<?php echo $this->_tpl_vars['entry']['urlcache']; ?>
/"><?php echo $this->_tpl_vars['entry']['title']; ?>
</a>
            </li>
    <?php if (($this->_foreach['myData']['iteration'] == $this->_foreach['myData']['total'])): ?>
        </ol>
    <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
    </div>
    <div class="span3">
        <?php echo smarty_function_calendar(array('year' => $this->_tpl_vars['year'],'month' => $this->_tpl_vars['month']), $this);?>

    </div>
</div>