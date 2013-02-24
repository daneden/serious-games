<?php
	ob_start();
	include("../db/connect.php");
	$EmailAddress = $_POST["email-address"];
	$EmailAddress = stripslashes($EmailAddress);	
	$Password = $_POST["password"];
	$Password = stripslashes($Password);
	$Password = md5($Password);
	$chklogin = "SELECT * FROM usertable WHERE userEmail ='$EmailAddress' AND userPassword='$Password'";
	$result = mysql_query($chklogin);
	$UserDetails = mysql_fetch_assoc($result);
	$count = mysql_num_rows($result);
	
	if ($count==1){
		session_start();
		$_SESSION['UserID'] = $UserDetails['userID'];
		if($UserDetails['userIsAdmin'] == 1){
			$_SESSION['AdminState'] = 1;
			header("location:../../admin/index.php");
		} else {
			$_SESSION['AdminState'] = 0;
			header("location:../../dashboard.php");
		}
	} else {
		echo "Wrong Username or Password!";	
	}
	ob_end_flush();
?>