<?php /* Smarty version 2.6.27, created on 2013-06-10 22:54:32
         compiled from pagers.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'pagers.tpl', 11, false),)), $this); ?>
<?php if ($this->_tpl_vars['section']): ?>
    <?php $this->assign('sectionLink', ($this->_tpl_vars['section']['unixword'])."/"); ?>
<?php endif; ?>

<ul class="pager">
<?php if (! $_GET['skip']): ?>
    <li class="next"><a href="/<?php echo $this->_tpl_vars['sectionLink']; ?>
skip/<?php echo @PER_PAGE; ?>
/">Следущая &rarr;</a></li>
<?php else: ?>
        <?php echo smarty_function_math(array('equation' => "x + y",'x' => $_GET['skip'],'y' => @PER_PAGE,'assign' => 'skipBack'), $this);?>

    <?php echo smarty_function_math(array('equation' => "x - y",'x' => $_GET['skip'],'y' => @PER_PAGE,'assign' => 'skipForward'), $this);?>


    <?php if ($this->_tpl_vars['skipForward'] < 1): ?>
        <?php $this->assign('skipForward', ($this->_tpl_vars['sectionLink'])); ?>
    <?php else: ?>
        <?php $this->assign('skipForward', ($this->_tpl_vars['sectionLink'])."skip/".($this->_tpl_vars['skipForward'])."/"); ?>
    <?php endif; ?>

        <?php if ($_GET['skip'] + @PER_PAGE < $this->_tpl_vars['pagerTotal']): ?>
        <li class="previous"><a href="/<?php echo $this->_tpl_vars['skipForward']; ?>
">&larr; Предыдущая</a></li>
        <li class="next"><a href="/<?php echo $this->_tpl_vars['sectionLink']; ?>
skip/<?php echo $this->_tpl_vars['skipBack']; ?>
/">Следущая &rarr;</a></li>
    <?php else: ?>
        <li class="previous"><a href="/<?php echo $this->_tpl_vars['skipForward']; ?>
">&larr; Предыдущая</a></li>
    <?php endif; ?>
<?php endif; ?>
</ul>