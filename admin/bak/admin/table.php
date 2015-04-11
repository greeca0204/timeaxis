<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
!function_exists('adminmsg') && exit('Forbidden');

$tabledb=array();

$othortable=array();
$query = $db->query("SHOW TABLES");
while ($rt = $db->fetch_array($query)){
	$value = trim(current($rt));
	 
		$othortable[]=$value;
	 
}
?>