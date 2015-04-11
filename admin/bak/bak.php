<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
set_time_limit(0);
error_reporting(E_ERROR | E_PARSE);
set_magic_quotes_runtime(0);

define('D_P',__FILE__ ? getdirname(__FILE__).'/' : './');
define('R_P',D_P);

$admin_file = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
 
require_once(R_P."admin/admin.php");
require_once(R_P."admin/bakup.php");
 
function SafeFunc(){
	//Safe The Admin
}
function getdirname($path){
	if(strpos($path,'\\')!==false){
		return substr($path,0,strrpos($path,'\\'));
	}elseif(strpos($path,'/')!==false){
		return substr($path,0,strrpos($path,'/'));
	}else{
		return '/';
	}
}
?>