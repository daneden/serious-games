<?php
	require_once('../../../inc/db/connect.php');
	$categoryID = $_GET['Cid'];
	mysql_query('DELETE FROM categorytable WHERE categoryID = "'.$categoryID.'"');
	mysql_query('DELETE FROM lessonprerequisitetable WHERE prereqUnlocksID = "'.$categoryID.'"');
	$getModuleID = mysql_query('SELECT * FROM lessontable WHERE lessonCategoryID = "'.$categoryID.'"');
	while($module = mysql_fetch_array($getModuleID)){
		$moduleID = $module['lessonID'];
		mysql_query('DELETE FROM lessontable WHERE lessonCategoryID = "'.$categoryID.'"');
		mysql_query('DELETE FROM questiontable WHERE questionLessonID = "'.$moduleID.'"');
	}
	header ('location:../../categories.php');
?>