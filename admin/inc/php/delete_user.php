<?php
		require_once('../../../inc/db/connect.php');
		$userID = $_GET['id'];
		mysql_query('DELETE FROM usertable WHERE userID = "'.$userID.'"');
		header ('location:../../users.php');	

?>