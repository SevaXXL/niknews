<?php /* Smarty version 2.6.27, created on 2013-06-12 21:31:16
         compiled from calendar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'calendar.tpl', 9, false),array('modifier', 'default', 'calendar.tpl', 33, false),array('modifier', 'count', 'calendar.tpl', 46, false),array('function', 'math', 'calendar.tpl', 46, false),)), $this); ?>
<table class="table table-bordered table-condensed">
    <thead>
        <tr> 
            <th colspan="7">
                <div class="text-center">
    <?php if ($this->_tpl_vars['calendar']['showNav']): ?>
                    <a href="/<?php echo $this->_tpl_vars['calendar']['prevMonth']; ?>
">&laquo;</a>
    <?php endif; ?>
                    <a href="/<?php echo $this->_tpl_vars['calendar']['thisMonth']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['calendar']['timeStamp'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%B %Y') : smarty_modifier_date_format($_tmp, '%B %Y')); ?>
</a>
    <?php if ($this->_tpl_vars['calendar']['showNav']): ?>
                    <a href="/<?php echo $this->_tpl_vars['calendar']['nextMonth']; ?>
">&raquo;</a>
    <?php endif; ?>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr class="info">
            <td width="14%">Пн</td>
            <td width="14%">Вт</td>
            <td width="14%">Ср</td>
            <td width="14%">Чт</td>
            <td width="14%">Пт</td>
            <td width="14%">Сб</td>
            <td width="14%">Вс</td>
        </tr>
        <tr>
<?php unset($this->_sections['numloop']);
$this->_sections['numloop']['name'] = 'numloop';
$this->_sections['numloop']['loop'] = is_array($_loop=$this->_tpl_vars['calendar']['days']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['numloop']['show'] = true;
$this->_sections['numloop']['max'] = $this->_sections['numloop']['loop'];
$this->_sections['numloop']['step'] = 1;
$this->_sections['numloop']['start'] = $this->_sections['numloop']['step'] > 0 ? 0 : $this->_sections['numloop']['loop']-1;
if ($this->_sections['numloop']['show']) {
    $this->_sections['numloop']['total'] = $this->_sections['numloop']['loop'];
    if ($this->_sections['numloop']['total'] == 0)
        $this->_sections['numloop']['show'] = false;
} else
    $this->_sections['numloop']['total'] = 0;
if ($this->_sections['numloop']['show']):

            for ($this->_sections['numloop']['index'] = $this->_sections['numloop']['start'], $this->_sections['numloop']['iteration'] = 1;
                 $this->_sections['numloop']['iteration'] <= $this->_sections['numloop']['total'];
                 $this->_sections['numloop']['index'] += $this->_sections['numloop']['step'], $this->_sections['numloop']['iteration']++):
$this->_sections['numloop']['rownum'] = $this->_sections['numloop']['iteration'];
$this->_sections['numloop']['index_prev'] = $this->_sections['numloop']['index'] - $this->_sections['numloop']['step'];
$this->_sections['numloop']['index_next'] = $this->_sections['numloop']['index'] + $this->_sections['numloop']['step'];
$this->_sections['numloop']['first']      = ($this->_sections['numloop']['iteration'] == 1);
$this->_sections['numloop']['last']       = ($this->_sections['numloop']['iteration'] == $this->_sections['numloop']['total']);
?>
            <td class="<?php if (! $this->_tpl_vars['calendar']['days'][$this->_sections['numloop']['index']]): ?>s20<?php else: ?>s2<?php if ($this->_tpl_vars['calendar']['days'][$this->_sections['numloop']['index']]['selected']): ?>1<?php endif; ?><?php endif; ?><?php if ($this->_tpl_vars['calendar']['days'][$this->_sections['numloop']['index']]['today']): ?> today<?php endif; ?>">
    <?php if ($this->_tpl_vars['calendar']['days'][$this->_sections['numloop']['index']]['selected']): ?>
                <a href="/<?php echo $this->_tpl_vars['calendar']['thisMonth']; ?>
<?php echo $this->_tpl_vars['calendar']['days'][$this->_sections['numloop']['index']]['link']; ?>
/"><?php echo $this->_tpl_vars['calendar']['days'][$this->_sections['numloop']['index']]['number']; ?>
</a>
    <?php else: ?>
            <?php echo ((is_array($_tmp=@$this->_tpl_vars['calendar']['days'][$this->_sections['numloop']['index']]['number'])) ? $this->_run_mod_handler('default', true, $_tmp, "&nbsp;") : smarty_modifier_default($_tmp, "&nbsp;")); ?>

    <?php endif; ?>
            </td>
        <?php if (! ( $this->_sections['numloop']['rownum'] % 7 )): ?>
        <?php if (! $this->_sections['numloop']['last']): ?>
        </tr>
        <tr>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($this->_sections['numloop']['last']): ?>
                <?php echo smarty_function_math(array('equation' => "n - a % n",'n' => 7,'a' => count($this->_tpl_vars['calendar']['days']),'assign' => 'cells'), $this);?>

        <?php if ($this->_tpl_vars['cells'] != 7): ?>
            <?php unset($this->_sections['pad']);
$this->_sections['pad']['name'] = 'pad';
$this->_sections['pad']['loop'] = is_array($_loop=$this->_tpl_vars['cells']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pad']['show'] = true;
$this->_sections['pad']['max'] = $this->_sections['pad']['loop'];
$this->_sections['pad']['step'] = 1;
$this->_sections['pad']['start'] = $this->_sections['pad']['step'] > 0 ? 0 : $this->_sections['pad']['loop']-1;
if ($this->_sections['pad']['show']) {
    $this->_sections['pad']['total'] = $this->_sections['pad']['loop'];
    if ($this->_sections['pad']['total'] == 0)
        $this->_sections['pad']['show'] = false;
} else
    $this->_sections['pad']['total'] = 0;
if ($this->_sections['pad']['show']):

            for ($this->_sections['pad']['index'] = $this->_sections['pad']['start'], $this->_sections['pad']['iteration'] = 1;
                 $this->_sections['pad']['iteration'] <= $this->_sections['pad']['total'];
                 $this->_sections['pad']['index'] += $this->_sections['pad']['step'], $this->_sections['pad']['iteration']++):
$this->_sections['pad']['rownum'] = $this->_sections['pad']['iteration'];
$this->_sections['pad']['index_prev'] = $this->_sections['pad']['index'] - $this->_sections['pad']['step'];
$this->_sections['pad']['index_next'] = $this->_sections['pad']['index'] + $this->_sections['pad']['step'];
$this->_sections['pad']['first']      = ($this->_sections['pad']['iteration'] == 1);
$this->_sections['pad']['last']       = ($this->_sections['pad']['iteration'] == $this->_sections['pad']['total']);
?>
            <td class="s20">&nbsp;</td>
            <?php endfor; endif; ?>
        <?php endif; ?>
        </tr>
    <?php endif; ?>
<?php endfor; endif; ?>
    </tbody>
</table>