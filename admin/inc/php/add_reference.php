<?php
	require_once('../../../inc/db/connect.php');
	$referenceTitle = mysql_real_escape_string($_POST['reference-title']);
	$referenceURL = stripslashes(mysql_real_escape_string($_POST['reference-url']));
	$referenceLessonID = $_POST['module-id'];
	$referenceQuery = 'Insert INTO referencetable (referenceID, referenceLessonID, referenceTitle, referenceURL) VALUES ( NULL, "'.$referenceLessonID.'","'.$referenceTitle.'","'.$referenceURL.'")';
	mysql_query ($referenceQuery);
	/* header('location:../../modules.php');*/
?>