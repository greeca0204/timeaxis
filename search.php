<?php
	header('Content-Type: text/html; charset=UTF-8');
	include("global.inc.php");
	r_require_once("/lib/MultiActions.php");
	
	//首页
	function _default()
	{
		date_default_timezone_set('Asia/Shanghai');
		r_require_once("/DAL/Event.php");
		
		$key = getRequestStringParam('key', '');
		$event = new Event();
		
		$cc = $event->getEventbyname($key);	

		if ($cc)
        	echo "<script>window.location.href='index.php#/".$cc['id']."';</script>";
    	else
        	echo "<script>window.location.href='index.php#/0';</script>";
	}

?>