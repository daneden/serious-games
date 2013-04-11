<?php
	require_once('../../../inc/db/connect.php');
	$moduleID = $_POST['module-id'];
	$moduleName = mysql_real_escape_string($_POST['module-name']);
	$moduleCategoryID = $_POST['module-category'];	
	$moduleState = $_POST['module-state'];	
	$updateQuery = "UPDATE lessontable SET lessonTitle ='$moduleName', lessonCategoryID ='$moduleCategoryID', lessonState = '$moduleState' WHERE lessonID = '$moduleID'";
	mysql_query($updateQuery);
	header('location:../../modules.php');
?>