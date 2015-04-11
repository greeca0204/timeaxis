<?php
	/*
	* 页面名称：Event.php
	* 页面功能：事件信息管理数据操作
	* 页面类别：数据层
	* 编写日期：2015.02.16
	*/
	
	r_require_once("/lib/GenericDao.php");
	
	class Event extends GenericDao {
	
		//获取所有事件信息
	    function getAllEvent() {
	    	$sql="SELECT * FROM tbl_event ORDER BY year asc,month asc,day asc";
	        return $this->executeQuery($sql);
	    }
	    
	    //分页显示事件信息
	    function getEventByPage($pageNum,$pageSize,$offLimit=0) {
	    	$sql = "SELECT * FROM tbl_event order by id desc";
	    	return $this->pagedQuery($sql,$pageNum,$pageSize);
	    }
	    
	    //查询记录总行数
	    function getTotalbyEvent() {
	    	$sql = "SELECT COUNT(*) AS CNT FROM tbl_event";
	    	$row = $this->getOne($sql);
	    	return $row?$row['CNT']:0;
	    }
	    
	    //获取事件信息
	    function getOneEvent($id) {
	    	$sql="SELECT * FROM tbl_event where id=$id";
	    	return $this->getOne($sql);
	    }   
	       
	    //添加事件信息
	    function insertEvent($name,$img,$intro,$year,$month,$day,$type) {
	    	$sql="insert into tbl_event(name,img,intro,year,month,day,type) values('$name','$img','$intro',$year,$month,$day,$type)";
	    	return $this->executeInsert($sql);
	    }
	    
	    //修改事件信息
	    function updateEvent($id,$name,$img,$intro,$year,$month,$day,$type) {
			$sql="update tbl_event set name='$name',img='$img',intro='$intro',year=$year,month=$month,day=$day,type=$type where id=$id";
	    	return $this->executeUpdate($sql);
	    }
	    
	    //删除事件信息
	    function deleteEvent($id)
	    {
	    	$sql="delete from tbl_event where id=$id";
	    	return $this->executeDelete($sql);
	    }
		
		function getEventbyname($key) {
	    	$sql="SELECT * FROM tbl_event where name like '%".$key."%' limit 0,1";
	        return $this->getOne($sql);
	    }
		
		function getLastId(){
			$sql="SELECT id FROM tbl_event order by id desc limit 0,1";
	        $row = $this->getOne($sql);
			return $row?$row['id']:0;
		}	

	}
?>