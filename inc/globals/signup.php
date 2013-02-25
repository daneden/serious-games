<?php
	require_once('../db/connect.php');
	$userFName = mysql_real_escape_string($_POST['first-name']);
	$userSName = mysql_real_escape_string($_POST['last-name']);
	$userEmail = mysql_real_escape_string($_POST['email']);
	$userPassword = mysql_real_escape_string($_POST['password']);
	$userPassword = md5($userPassword);
	$userPasswordConfirm = mysql_real_escape_string($_POST['confirm-password']);
	$userPasswordConfirm = md5($userPasswordConfirm);	
	$userSpecialisation = mysql_real_escape_string(json_encode ($_POST['specialisation']));
	if($userPassword != $userPasswordConfirm){
		echo 'Passwords do not match!';
	} else {
		$userLanguage = $_POST['language'];
		$checkUserQuery = mysql_query('SELECT * FROM usertable WHERE userEmail = "'.$userEmail.'"');
		$checkUserExists = mysql_num_rows($checkUserQuery);
		if ($checkUserExists > 0){
			echo 'User Email Address already exists!';
		} else {
		if (mysql_query('Insert INTO usertable (userID, userEmail, userFName, userSName, userPassword, userLanguage, userSpecialisation, userIsAdmin) VALUES ( NULL, "'.$userEmail.'", "'.$userFName.'", "'.$userSName.'", "'.$userPassword.'", "'.$userLanguage.'", "'.$userSpecialisation.'", 0)')) {
			session_start();
			$UserID = mysql_insert_id();
			$_SESSION['UserID'] = $UserID;
			header("location:../../dashboard.php");				
		} else {
			echo mysql_error();
		}
		}
	}
?>