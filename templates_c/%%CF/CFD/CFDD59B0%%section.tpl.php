<?php /* Smarty version 2.6.27, created on 2013-06-20 21:30:28
         compiled from section.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'section.tpl', 30, false),array('modifier', 'date_format', 'section.tpl', 32, false),array('modifier', 'month', 'section.tpl', 32, false),)), $this); ?>
<ul class="breadcrumb">
    <li class="active">Рубрика</li>
</ul>

<div class="page-header">
    <h1>
        <small>
<?php $_from = $this->_tpl_vars['rubrika']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['thisforeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['thisforeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value']):
        $this->_foreach['thisforeach']['iteration']++;
?>
    <?php if (! ($this->_foreach['thisforeach']['iteration'] == $this->_foreach['thisforeach']['total'])): ?>
            <a href="<?php echo $this->_tpl_vars['value']['link']; ?>
"><?php echo $this->_tpl_vars['value']['word']; ?>
</a> &gt;
    <?php else: ?>
        </small>
        <?php echo $this->_tpl_vars['value']['word']; ?>

    <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
    </h1>
</div>

<div class="row-fluid">
    <div class="span8">
<?php if ($this->_tpl_vars['pagerTotal'] > @PER_PAGE): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'pagers.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
        <h4><a href="<?php echo $this->_tpl_vars['entry']['url']; ?>
"><?php echo $this->_tpl_vars['entry']['title']; ?>
</a></h4>
    <?php if ($this->_tpl_vars['entry']['image']): ?>
        <img src="/files/part<?php echo $this->_tpl_vars['entry']['imagepart']; ?>
/<?php echo $this->_tpl_vars['entry']['image']; ?>
-100x100.<?php echo $this->_tpl_vars['entry']['ext']; ?>
" class="pull-left" style="margin-right: 1em;">
    <?php endif; ?>
        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['lead'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp, false) : smarty_modifier_strip_tags($_tmp, false)); ?>
</p>
        <div class="biser clearfix">
            <?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%e") : smarty_modifier_date_format($_tmp, "%e")); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")))) ? $this->_run_mod_handler('month', true, $_tmp) : smarty_modifier_month($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y г.") : smarty_modifier_date_format($_tmp, "%Y г.")); ?>

            <?php if ($this->_tpl_vars['entry']['authors']): ?>
            Автор:
                <?php $_from = $this->_tpl_vars['entry']['authors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['thisforeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['thisforeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['value']):
        $this->_foreach['thisforeach']['iteration']++;
?>
                    <?php echo $this->_tpl_vars['value']['word']; ?>
<?php if (! ($this->_foreach['thisforeach']['iteration'] == $this->_foreach['thisforeach']['total'])): ?>,<?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
        </div>
        <hr>
<?php endforeach; endif; unset($_from); ?>


<?php if ($this->_tpl_vars['pagerTotal'] > @PER_PAGE): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'pagers.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

    </div>
    <div class="span4">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sidebar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
</div>
