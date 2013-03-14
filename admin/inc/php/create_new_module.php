<?php
	require_once('../../../inc/db/connect.php');
	$moduleName = mysql_real_escape_string($_POST['module-name']);
	$moduleCategoryID = $_POST['module-category'];
	$createNewModule = mysql_query('INSERT INTO lessontable (lessonID, lessonCategoryID, lessonTitle) VALUES ( NULL, "'.$moduleCategoryID.'","'.$moduleName.'")');
	$moduleID = mysql_insert_id();
	header('location:../../add_question.php?Mid='.$moduleID);
?>