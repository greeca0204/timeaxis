<?php
	/*
	 * 页面名称：event.php
	 * 页面功能：事件信息管理
	 * 页面类别：业务层
	 * 编写日期：2015.02.16
	 */

	session_start();
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	
	if($_SESSION['username'] == null)
	{
		echo "<script>alert('请先登录！');location.href='index.php';</script>";
	}

	require_once("../global.inc.php");
	r_require_once("/lib/MultiActions.php");	

	//默认情况时
	function _default()
	{
		date_default_timezone_set('Asia/Shanghai');
		r_require_once("/smarty/MySmarty.php");
		r_include_once("/DAL/public/paggingbar.php");
		r_require_once("/DAL/Event.php");
		
		$tpl = new MySmarty("admin");		
		$event = new Event();
		
		$tpl->assign("siteTitle","后台管理系统");
		$pageNum = getRequestIntParam('page_num', 1);
		$pageSize = 15;
		$totalRecords = $event->getTotalbyEvent();
		$totalPages = intval($totalRecords / $pageSize);
		$totalPages += ($totalRecords % $pageSize == 0 ? 0 : 1);
		if($pageNum > $totalPages) $pageNum = $totalPages;
		if($totalRecords>0)
			$tpl->assign('event', $event->getEventByPage($pageNum,$pageSize,0));
		
		$tpl->assign('paggingbar', genPaggingbar('event.php',$pageNum,$totalPages));
		$tpl->display("showEvent.html");
	}
	
	//添加、修改事件页面
	function _new() {
		date_default_timezone_set('Asia/Shanghai');
		r_include_once("/smarty/MySmarty.php");
		r_require_once("/DAL/Event.php");

		$id = getRequestIntParam('id', 0);
		
		$tpl = new MySmarty("admin");
		$event = new Event();
		
		$tpl->assign("siteTitle","后台管理系统");		
		$tpl->assign("event",$event->getOneEvent($id));
		$tpl->display("editEvent.html");
	}
	
	//添加、修改事件操作
	function _save() {
		date_default_timezone_set('Asia/Shanghai');
		r_require_once("/DAL/Event.php");
		
		$id = getRequestIntParam('id', 0);
		$name = getRequestStringParam('name', '');
		$imgurl = getRequestStringParam('imgurl', '');
		$hasimg = getRequestStringParam('hasimg', '');
		//$intro = getRequestStringParam('intro','');		
		
		if (!empty($_POST['content1'])) {
			if (get_magic_quotes_gpc()) {
				$intro = stripslashes($_POST['content1']);
			} else {
				$intro = $_POST['content1'];
			}
		}
		
		$year = getRequestIntParam('year',0);	
		$month = getRequestIntParam('month',0);
		$day = getRequestIntParam('day',0);
		$type = getRequestIntParam('type',0);	
		
		$event = new Event();
		//echo $type;
		
		$newimg = substr(uploadImages('imgurl'),1);
		if ($id == 0) {
			$cc = $event->insertEvent($name,$newimg,$intro,$year,$month,$day,$type);
		} else {
			if($newimg=="")
				$cc = $event->updateEvent($id,$name,$hasimg,$intro,$year,$month,$day,$type);
			else
				$cc = $event->updateEvent($id,$name,$newimg,$intro,$year,$month,$day,$type);
		}
		
		if ($cc)
        	echo "<script>alert('操作成功！');window.location.href='event.php';</script>";
    	else
        	echo "<script>alert('操作失败！');window.location.href='event.php';</script>";
		
	}
	
	//删除事件操作
	function _delete() {
		r_include_once("/DAL/Event.php");
		$event = new Event();
		$chk1=$_POST['chk1'];
		if ($chk1!="" or count($chk1)!=0) {
			for ($i=0;$i<count($chk1);$i++){
				$cc = $event->deleteEvent($chk1[$i]);
			}
			echo "<script>alert('操作成功！');window.location.href='event.php';</script>";
		}
		else
			echo "<script>alert('操作失败！');window.location.href='event.php';</script>";
	}
?>