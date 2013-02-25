<?php
	require_once('../../../inc/db/connect.php');
	$moduleID = $_GET['Mid'];
	mysql_query('DELETE FROM lessontable WHERE lessonID = "'.$moduleID.'"');
	mysql_query('DELETE FROM questiontable WHERE questionLessonID = "'.$moduleID.'"');
	header ('location:../../modules.php');
?>