<?php /* Smarty version 2.6.27, created on 2013-06-20 01:13:52
         compiled from author.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'author.tpl', 12, false),)), $this); ?>
<ul class="breadcrumb">
    <li><a href="/author/">Все авторы</a> <span class="divider">&gt;</span></li>
    <li class="active">Автор</li>
</ul>
<div class="page-header">
    <h1><?php echo $this->_tpl_vars['author']; ?>
</h1>
</div>
<div class="row-fluid">
    <div class="span8">
        <ol>
        <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
            <li><span class="biser"><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d.%m.%Y') : smarty_modifier_date_format($_tmp, '%d.%m.%Y')); ?>
</span> <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['intime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '/%Y/%m/%d/') : smarty_modifier_date_format($_tmp, '/%Y/%m/%d/')); ?>
<?php echo $this->_tpl_vars['entry']['urlcache']; ?>
/"><?php echo $this->_tpl_vars['entry']['title']; ?>
</a></li>
        <?php endforeach; endif; unset($_from); ?>
        </ol>
    </div>
    <div class="span4">
        <div class="well">
            Об авторе
        </div>
    </div>
</div>
