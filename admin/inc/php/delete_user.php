<?php
		require_once('../../../inc/db/connect.php');
		$userID = $_GET['id'];
		mysql_query('DELETE FROM usertable WHERE userID = "'.$userID.'"');
		mysql_query('DELETE FROM progressiontable WHERE progressionUserID = "'.$userID.'"');
		header ('location:../../users.php');	

?>