<?php /* Smarty version 2.6.18, created on 2015-02-27 13:20:33
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'index.html', 29, false),)), $this); ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang='zh-CN' xml:lang='zh-CN' xmlns='http://www.w3.org/1999/xhtml'>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo $this->_tpl_vars['siteTitle']; ?>
</title>
	<link rel="stylesheet" type="text/css" href="css/reset_y.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script id="jquery_183" type="text/javascript" class="library" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/script2.js"></script>
</head>
<body class="impress-not-supported">

<div class="bg"><img src="images/bg04.jpg" width="100%" /></div>

<header class="top" id="top">
	<h1><em><?php echo $this->_tpl_vars['siteTitle']; ?>
</em></h1>
</header>

<section id="timeline" class="timeline">
	<div id="line" class="line_white"></div>
	<div id="impress">
		<div id="timeList">
			<div class="step year" data-x="-600" data-y="0" data-scale ="0.5" id="0">
				<div class="year2012">序言</div>
				<div class="list_show">序言<br/></div>
			</div>
			<?php $_from = $this->_tpl_vars['event']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['event'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['event']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['event']):
        $this->_foreach['event']['iteration']++;
?>
			<div class="timeList_item step" data-x="<?php echo ($this->_foreach['event']['iteration']-1)*200; ?>
" data-y="0" id="<?php echo $this->_tpl_vars['event']['id']; ?>
">
				<div class="circle"><?php echo ((is_array($_tmp=$this->_tpl_vars['event']['happenTime'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%m/%d') : smarty_modifier_date_format($_tmp, '%m/%d')); ?>
</div>
				<h2 class="timeList_item_title"><?php echo $this->_tpl_vars['event']['name']; ?>
</h2>
				<div class="list_show show1" >
					<img src="<?php echo $this->_tpl_vars['event']['img']; ?>
" width="500">
					<h2><a href="#"><?php echo $this->_tpl_vars['event']['name']; ?>
</a></h2>
					<p><?php echo $this->_tpl_vars['event']['intro']; ?>
</p>
				</div>
			</div>
			<?php endforeach; endif; unset($_from); ?>
			<div class="timeList_item step refresh" data-x="<?php echo $this->_foreach['event']['total']*200; ?>
" data-y="0" id="<?php echo $this->_foreach['event']['total']+1; ?>
">
				<div class="list_show">
					<a href='javascript:replay();'><img src="images/refress.png"/></a>
					<p class="end">谢谢观看！</p>
				</div>
			</div>
		</div>
	</div>
</section>


<script type="text/javascript" src="js/impress.js"></script>
</body>
</html>
<script type="text/javascript" src="js/script.js"></script>