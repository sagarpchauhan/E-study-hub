<?php
ob_start(); 
session_start();
$current_file=$_SERVER["SCRIPT_NAME"];
function loggedin(){
	if(isset($_SESSION['id'])&&!empty($_SESSION['id'])){
		return true;
	}
	else{
		return false;
	}
}

?>  