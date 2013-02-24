<?php
	require_once('../../../inc/db/connect.php');
	$moduleID = $_POST['module-id'];
	$moduleName = mysql_real_escape_string($_POST['module-name']);
	$moduleCategoryID = $_POST['module-category'];	
	$updateQuery = "UPDATE lessontable SET lessonTitle ='$moduleName', lessonCategoryID ='$moduleCategoryID' WHERE lessonID = '$moduleID'";
	mysql_query($updateQuery);
	header('location:../../modules.php');
?>