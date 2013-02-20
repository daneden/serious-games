<?php
	require_once('../../inc/db/connect.php');
	$userFName = mysql_real_escape_string($_POST['first-name']);
	
	$userSName = mysql_real_escape_string($_POST['last-name']);
	$userEmail = mysql_real_escape_string($_POST['email']);
	$userPassword = mysql_real_escape_string($_POST['password']);
	$userPassword = md5($userPassword);
	$userPasswordConfirm = mysql_real_escape_string($_POST['confirm-password']);
	$userPasswordConfirm = md5($userPasswordConfirm);
	if($userPassword != $userPasswordConfirm){
		echo 'Passwords do not match!';
	} else {
		$userLanguage = $_POST['language'];
		$userSpecialisation = $_POST['specialisation'];
		
		$checkUserQuery = mysql_query('SELECT * FROM usertable WHERE userEmail = "'.$userEmail.'"');
		if ($checkUserQuery){
			echo 'User Email Address already exists!';
		}
		mysql_query('Insert INTO usertable (userID, userEmail, userFName, userSName, userPassword, userLanguage, userSpecialisation, userIsAdmin) VALUES ( NULL, "'.$userEmail.'", "'.$userFName.'", "'.$userSName.'", "'.$userPassword.'", "'.$userLanguage.'", "'.$userSpecialisation.'", 0)');
		session_start();
		$_SESSION['userEmail'] = $UserEmail;
		header("location:../../dashboard.php");		
	}
?>