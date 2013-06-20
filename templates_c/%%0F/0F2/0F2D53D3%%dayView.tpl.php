<?php /* Smarty version 2.6.27, created on 2013-06-11 11:27:00
         compiled from dayView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'dayView.tpl', 2, false),array('function', 'calendar', 'dayView.tpl', 30, false),array('modifier', 'date_format', 'dayView.tpl', 6, false),array('modifier', 'month', 'dayView.tpl', 9, false),array('modifier', 'strip_tags', 'dayView.tpl', 24, false),)), $this); ?>
<?php echo smarty_function_math(array('equation' => "x + y",'x' => $this->_tpl_vars['ts'],'y' => 86400,'assign' => 'skipForward'), $this);?>

<?php echo smarty_function_math(array('equation' => "x - y",'x' => $this->_tpl_vars['ts'],'y' => 86400,'assign' => 'skipBack'), $this);?>


<div class="page-header">
    <a class="btn pull-right" href="/<?php echo ((is_array($_tmp=$this->_tpl_vars['skipForward'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d/") : smarty_modifier_date_format($_tmp, "%Y/%m/%d/")); ?>
">&raquo;</a>
    <a class="btn pull-right" href="/<?php echo ((is_array($_tmp=$this->_tpl_vars['skipBack'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y/%m/%d/") : smarty_modifier_date_format($_tmp, "%Y/%m/%d/")); ?>
">&laquo;</a>
    <h1>
        <?php echo $this->_tpl_vars['day']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['month'])) ? $this->_run_mod_handler('month', true, $_tmp) : smarty_modifier_month($_tmp)); ?>
 <?php echo $this->_tpl_vars['year']; ?>
 года
    </h1>
</div>

<div class="row-fluid">
    <div class="span9">
<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
        <h4><a href="<?php echo $this->_tpl_vars['entry']['url']; ?>
"><small><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%R') : smarty_modifier_date_format($_tmp, '%R')); ?>
</small> <?php echo $this->_tpl_vars['entry']['title']; ?>
</a></h4>
    <?php if ($this->_tpl_vars['entry']['rubrika']): ?>
        <div class="biser">
      <?php $_from = $this->_tpl_vars['entry']['rubrika']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['thisforeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['thisforeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value']):
        $this->_foreach['thisforeach']['iteration']++;
?>
            <a href="<?php echo $this->_tpl_vars['value']['link']; ?>
"><?php echo $this->_tpl_vars['value']['word']; ?>
</a><?php if (! ($this->_foreach['thisforeach']['iteration'] == $this->_foreach['thisforeach']['total'])): ?> &gt; <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
        </div>
    <?php endif; ?>
        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['lead'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</p>
<?php endforeach; else: ?>
            <p>Нет записей в этот день</p>
<?php endif; unset($_from); ?>
    </div>
    <div class="span3">
        <?php echo smarty_function_calendar(array('year' => $this->_tpl_vars['year'],'month' => $this->_tpl_vars['month'],'day' => $this->_tpl_vars['day']), $this);?>

    </div>
</div>