<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') { 
		ob_start();
		require_once('../db/connect.php');
		$userID = $_POST['userID'];
		mysql_query('DELETE FROM usertable WHERE userID = "'.$userID.'"');
		header ('location:/logout.php');	
		
	} else {
		header('HTTP/1.1 403 Forbidden');
		include $_SERVER['DOCUMENT_ROOT'].'/403.php';
	}
?>