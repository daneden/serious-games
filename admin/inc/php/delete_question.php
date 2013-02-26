<?php
	require_once('../../../inc/db/connect.php');
	$questionID = $_GET['Qid'];
	$getModuleID = mysql_query('SELECT * FROM questiontable WHERE questionLessonID = "'.$questionID.'"');
	$module = mysql_fetch_assoc($getModuleID);
	$moduleID = $module['questionLessonID'];
	mysql_query('DELETE FROM questiontable WHERE questionID = "'.$questionID.'"');
	header ('location:../../edit_module.php?mID='.$moduleID);
?>