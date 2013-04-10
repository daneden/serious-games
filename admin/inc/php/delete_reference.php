<?php
	require_once('../../../inc/db/connect.php');
	$referenceID = $_GET['Rid'];
	$getModuleID = mysql_query('SELECT * FROM referencetable WHERE referenceID = "'.$referenceID.'"');
	$module = mysql_fetch_assoc($getModuleID);
	$moduleID = $module['referenceLessonID'];
	mysql_query('DELETE FROM referencetable WHERE referenceID = "'.$referenceID.'"');
	header ('location:../../edit_module.php?mID='.$moduleID);
?>