<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') { 
		ob_start();
		require_once('../db/connect.php');
		if($_POST['first-name'] == ''){
			header('location:/signup.php?errors=1');
		} else {
		$userFName = mysql_real_escape_string($_POST['first-name']);
		if($_POST['last-name'] == ''){
			header('location:/signup.php?errors=2');
		} else {
			$userSName = mysql_real_escape_string($_POST['last-name']);
		if($_POST['email'] == ''){
			header('location:/signup.php?errors=3');
		} else {
			$userEmail = mysql_real_escape_string($_POST['email']);
		if($_POST['password'] == ''){
			header('location:/signup.php?errors=4');

		} else {
		$userPassword = mysql_real_escape_string($_POST['password']);
			if(strlen($userPassword) < 8 && !preg_match('/[0-9]/', $userPassword)) {
				header('location:/signup.php?errors=7');
			} else {
		$userPassword = md5($userPassword);
		$userPasswordConfirm = mysql_real_escape_string($_POST['confirm-password']);
		$userPasswordConfirm = md5($userPasswordConfirm);	
		$userSpecialisation = mysql_real_escape_string(json_encode ($_POST['specialisation']));
		if($userPassword != $userPasswordConfirm){
			header('location:/signup.php?errors=5');
		} else {
			$userLanguage = $_POST['language'];
			$checkUserQuery = mysql_query('SELECT * FROM usertable WHERE userEmail = "'.$userEmail.'"');
			$checkUserExists = mysql_num_rows($checkUserQuery);
			if ($checkUserExists > 0){
				header('location:/signup.php?errors=6');
			} else {
			if (mysql_query('Insert INTO usertable (userID, userEmail, userFName, userSName, userPassword, userLanguage, userSpecialisation, userIsAdmin) VALUES ( NULL, "'.$userEmail.'", "'.$userFName.'", "'.$userSName.'", "'.$userPassword.'", "'.$userLanguage.'", "'.$userSpecialisation.'", 0)')) {
				session_start();
				$UserID = mysql_insert_id();
				$_SESSION['UserID'] = $UserID;
				header("location:../../dashboard.php");				
			} else {
				header('location:/signup.php?errors=6');
			}
			}
		}
			}
		}
		}
		}
		}
	} else {
		header('HTTP/1.1 403 Forbidden');
		include $_SERVER['DOCUMENT_ROOT'].'/403.php';
	}
?>