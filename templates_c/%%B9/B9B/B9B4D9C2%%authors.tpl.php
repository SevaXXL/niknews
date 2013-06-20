<?php /* Smarty version 2.6.27, created on 2013-06-20 01:13:51
         compiled from authors.tpl */ ?>

<h1>Авторы</h1>
<table class="table">
	<?php $_from = $this->_tpl_vars['authors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['thisforeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['thisforeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['entry']):
        $this->_foreach['thisforeach']['iteration']++;
?>
	<tr>
		<td><?php echo $this->_foreach['thisforeach']['iteration']; ?>
</td>
		<td><a href="/author/<?php echo $this->_tpl_vars['entry']['unixword']; ?>
/"><?php echo $this->_tpl_vars['entry']['word']; ?>
</a></td>
		<td><?php echo $this->_tpl_vars['entry']['total']; ?>
</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>