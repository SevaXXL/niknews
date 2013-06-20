<?php /* Smarty version 2.6.27, created on 2013-06-20 22:00:14
         compiled from rubrika.tpl */ ?>
<ul>
<?php $_from = $this->_tpl_vars['nav_rubrika']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
	<li><a href="/<?php echo $this->_tpl_vars['value']['unixword']; ?>
/"><?php echo $this->_tpl_vars['value']['word']; ?>
</a><?php if ($this->_tpl_vars['value']['child']): ?>
		<ul>
	<?php $_from = $this->_tpl_vars['value']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['rubrika_name']):
?>
			<li><a href="/<?php echo $this->_tpl_vars['value']['unixword']; ?>
_<?php echo $this->_tpl_vars['key']; ?>
/"><?php echo $this->_tpl_vars['rubrika_name']; ?>
</a></li>
	<?php endforeach; endif; unset($_from); ?>
		</ul><?php endif; ?>
	</li>
<?php endforeach; endif; unset($_from); ?>
</ul>