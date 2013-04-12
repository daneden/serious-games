<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') { 
		require_once('../db/connect.php');
		require_once('functions.php');
		$errors = "none";
	  if ($_FILES["profile-pic"]["error"] > 0)
		{
		$getImageQuery = mysql_query('SELECT * FROM usertable WHERE userID = "'.$_POST['userID'].'"');
		$getImage = mysql_fetch_assoc($getImageQuery);
		$imageName = $getImage['userProfileImg'];
		if ($_FILES["profile-pic"]["error"] != 4){ $errors= $_FILES["profile-pic"]["error"];}
		}
	  else
		{
			if (filesize($_FILES["profile-pic"]["tmp_name"]) < 1048576){
		  $imageName = 'userID'.$_POST['userID'].'.'.pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION);
		  move_uploaded_file($_FILES["profile-pic"]["tmp_name"], getcwd() . '/../../assets/profile-pics/'.$imageName);
		  crop_image(getcwd() . '/../../assets/profile-pics/'.$imageName, getcwd() . '/../../assets/profile-pics/'.$imageName);
			} else {
				$getImageQuery = mysql_query('SELECT * FROM usertable WHERE userID = "'.$_POST['userID'].'"');
				$getImage = mysql_fetch_assoc($getImageQuery);
				$imageName = $getImage['userProfileImg'];
				$errors = 1;
			}
		}	
		$userID = $_POST['userID'];
		$userFName = mysql_real_escape_string($_POST['first-name']);
		$userSName = mysql_real_escape_string($_POST['last-name']);
		$userEmail = mysql_real_escape_string($_POST['email']);
		$userSpecialisation = mysql_real_escape_string(json_encode ($_POST['specialisation']));
		$userLanguage = $_POST['language'];
		$updateQuery = mysql_query("UPDATE usertable SET userEmail = '$userEmail', userFName = '$userFName', userSName = '$userSName', userLanguage = '$userLanguage', userSpecialisation = '$userSpecialisation', userProfileImg = '$imageName' WHERE userID = '$userID'");
		header('location:/edit-profile.php?errors='.$errors);
	} else {
		header('HTTP/1.1 403 Forbidden');
		include $_SERVER['DOCUMENT_ROOT'].'/403.php';
	}
?>