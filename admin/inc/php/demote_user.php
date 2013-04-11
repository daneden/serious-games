<?php
	require_once('../../../inc/db/connect.php');
	$userID = $_GET['id'];
	$updateQuery = "UPDATE usertable SET userIsAdmin ='0' WHERE userID = '$userID'";
	mysql_query($updateQuery);
	header('location:../../modules.php');
?>