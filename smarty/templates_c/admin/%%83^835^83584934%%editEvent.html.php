<?php /* Smarty version 2.6.18, created on 2015-04-05 22:32:22
         compiled from editEvent.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'editEvent.html', 51, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
  <tr>
    <td class="head" colspan="2"><b>操作菜单</b></td>
  </tr>
  <tr>
    <td class="b_title">
    	<a href="event.php?action=new" target="_self">添加事件信息</a>&nbsp;
    	<a href="event.php" target="_self">事件信息管理</a>
    </td>
  </tr>
</table>
<br />
<form name="fmEdit" id="fmEdit" method="post" action="event.php?action=save" enctype="multipart/form-data">
	<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['event']['id']; ?>
" />
	<table width="70%" align="center" cellspacing="1" cellpadding="3" class="i_table">
		<tr>
			<td colspan="2" class="head">事件信息管理</td>
        </tr>
        <tr>
			<td width="20%" class="b">事件名称：</td>
			<td class="b">
				<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['event']['name']; ?>
"  class="frminput" />
			</td>
	  	</tr>
		<tr>
			<td width="20%" class="b">事件配图：</td>
            <td class="b_sel">        
				<input name="imgurl" type="file">
				<input type="hidden" name="hasimg" value="<?php echo $this->_tpl_vars['event']['img']; ?>
" />  
		  </td>
	  	</tr>
        <?php if ($this->_tpl_vars['event']['img'] != ''): ?>
        <tr>
			<td width="20%" class="b">事件配图：</td>
            <td class="b_sel">        
				<img src="../<?php echo $this->_tpl_vars['event']['img']; ?>
" width="341" height="341" alt="" />
		  </td>
	  	</tr>
        <?php endif; ?> 
		<tr>
			<td width="20%" class="b">事件介绍：</td>
			<td class="b_sel">
				<textarea name="content1"  id="content1" style="width:500px;height:80px;resize:none;"><?php echo $this->_tpl_vars['event']['intro']; ?>
</textarea>
		  </td>
	  	</tr>
        <tr>
			<td width="20%" class="b">发生时间：</td>
			<td class="b">
				<input type="text" name="sdate" id="sdate"  class="frminput"  onClick="return Calendar('sdate');" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['event']['happenTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
" />
		  </td>
	  	</tr>
        <tr>
			<td width="20%" class="b">年：</td>
			<td class="b">
				<input type="text" name="year" id="year"  class="frminput"   value="<?php echo $this->_tpl_vars['event']['year']; ?>
" />
		  </td>
	  	</tr>
	  	<tr>
			<td width="20%" class="b">月：</td>
			<td class="b">
				<input type="text" name="month" id="month"  class="frminput"   value="<?php echo $this->_tpl_vars['event']['month']; ?>
" />
		  </td>
	  	</tr>
	  	<tr>
			<td width="20%" class="b">日：</td>
			<td class="b">
				<input type="text" name="day" id="day"  class="frminput"   value="<?php echo $this->_tpl_vars['event']['day']; ?>
" />
		  </td>
	  	</tr>
		<tr>
			<td width="20%" class="b">样式：</td>
			<td class="sel">
				<select id="type" name="type">
					<option value="1" <?php if ($this->_tpl_vars['event']['type'] == 1): ?>selected="selected"<?php endif; ?>>内页样式</option>
					<option value="0" <?php if ($this->_tpl_vars['event']['type'] == 0): ?>selected="selected"<?php endif; ?>>年份页样式</option>
				</select>
		  </td>
	  	</tr>
		<tr>
			<td colspan="2" class="b">
				<input type="submit" value="提交">
				<input type="reset" value="重置">
			</td>
		</tr>
	</table>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>