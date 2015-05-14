<?php /* Smarty version 2.6.18, created on 2015-02-27 05:20:52
         compiled from editAdmin.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width="100%" align="center" cellspacing="1" cellpadding="3" class="i_table">
  <tr>
    <td class="head" colspan="2"><b>操作菜单</b></td>
  </tr>
  <tr>
    <td class="b_title">
    	<a href="admin.php?action=new" target="_self">添加管理员信息</a>&nbsp;
    	<a href="admin.php" target="_self">管理员信息管理</a>
    </td>
  </tr>
</table>
<br />
<form name="fmEdit" id="fmEdit" method="post" action="admin.php?action=save" enctype="multipart/form-data">
	<input type="hidden" name="id" id="id" value="<?php echo $this->_tpl_vars['admin']['id']; ?>
" />
    <table width="30%" align="center" cellspacing="1" cellpadding="3" class="i_table">
    	<tr>
			<td colspan="2" class="head">管理员信息管理</td>
        </tr>
        <tr>
			<td width="35%" class="b">管理员名称：</td>
			<td class="b">
				<input name="username" id="username" value="<?php echo $this->_tpl_vars['admin']['username']; ?>
"  class="frminput" />
			</td>
		</tr>
		<tr>
			<td width="35%" class="b">密码：</td>
			<td class="b">
				<input type="password" name="password" id="password" value="" class="frminput"/>
			</td>
		</tr>
		<tr>
			<td width="35%" class="b">审核：</td>
			<td class="b_sel">
				<select name="checked" id="checked">
      				<option value="1" <?php if ($this->_tpl_vars['admin']['checked'] == 1): ?> selected="selected" <?php endif; ?>>已审核</option>
      				<option value="2" <?php if ($this->_tpl_vars['admin']['checked'] == 2): ?> selected="selected" <?php endif; ?>>未审核</option>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>