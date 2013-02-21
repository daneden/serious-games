<?php
/* THIS IS THE GLOBAL FUNCTIONS FILE */

/* This Function verifies the user */
	function verify_user() {
		session_start();
		global $userDetails;
		if(!isset($_SESSION['UserID'])){
			header ('location:login.php');	
		} else {
		$userID = $_SESSION['UserID'];
		$getUser = mysql_query ("SELECT * FROM usertable WHERE userID = '".$userID."'");
		$userDetails = mysql_fetch_assoc($getUser);	
		}
	}
	
		function get_user_fname() {
			global $userDetails;
			echo $userDetails['userFName'];	
		}
		
		function get_user_sname() {
			global $userDetails;
			echo $userDetails['userSName'];	
		}
?>