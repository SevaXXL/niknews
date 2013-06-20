<?php /* Smarty version 2.6.27, created on 2013-06-20 22:00:14
         compiled from main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'main.tpl', 19, false),array('modifier', 'mb_truncate', 'main.tpl', 19, false),array('modifier', 'date_format', 'main.tpl', 21, false),)), $this); ?>

<div class="row-fluid">
	<div class="span8">
<?php $_from = $this->_tpl_vars['newsline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
  <?php if ($this->_tpl_vars['entry']['rubrika']): ?>
    <ul class="breadcrumb">
    <?php $_from = $this->_tpl_vars['entry']['rubrika']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['thisforeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['thisforeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value']):
        $this->_foreach['thisforeach']['iteration']++;
?>
      <li><a href="<?php echo $this->_tpl_vars['value']['link']; ?>
"><?php echo $this->_tpl_vars['value']['word']; ?>
</a><?php if (! ($this->_foreach['thisforeach']['iteration'] == $this->_foreach['thisforeach']['total'])): ?><span class="divider"> &gt; </span><?php endif; ?></li>
    <?php endforeach; endif; unset($_from); ?>
    </ul>
  <?php endif; ?>


		<h4><a href="<?php echo $this->_tpl_vars['entry']['url']; ?>
"><?php echo $this->_tpl_vars['entry']['title']; ?>
</a></h4>
    <?php if ($this->_tpl_vars['entry']['image']): ?>
        <img src="/files/part<?php echo $this->_tpl_vars['entry']['imagepart']; ?>
/<?php echo $this->_tpl_vars['entry']['image']; ?>
-150x75.<?php echo $this->_tpl_vars['entry']['ext']; ?>
" class="pull-left" style="margin-right: 1em;">
    <?php endif; ?>
		<p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['entry']['lead'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)))) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 300) : smarty_modifier_mb_truncate($_tmp, 300)); ?>
</p>
    <div class="biser clearfix">
      <span class="timeago" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%dT%T') : smarty_modifier_date_format($_tmp, '%Y-%m-%dT%T')); ?>
">&nbsp;</span>
    </div>

    <hr>
<?php endforeach; endif; unset($_from); ?>
	</div>
	<div class="span4">
    <h4>Сообщения</h4>
<?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
    <h5><a href="<?php echo $this->_tpl_vars['entry']['url']; ?>
"><?php echo $this->_tpl_vars['entry']['title']; ?>
</a></h5>
<?php endforeach; endif; unset($_from); ?>
    <div class="well">
      <h4>Пресс-релиз</h4>
<?php $_from = $this->_tpl_vars['press_reliz']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
      <h5><a href="<?php echo $this->_tpl_vars['entry']['url']; ?>
"><?php echo $this->_tpl_vars['entry']['title']; ?>
</a></h5>
<?php endforeach; endif; unset($_from); ?>
    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sidebar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
</div>

<script>
  $(document).ready(function () {
    // Относительное представление дат
    $('.timeago').timeago();
  });
</script>

