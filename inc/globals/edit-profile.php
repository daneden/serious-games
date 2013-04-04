<?php
	require_once('../db/connect.php');
  if ($_FILES["profile-pic"]["error"] > 0)
	{
	echo "Return Code: " . $_FILES["profile-pic"]["error"] . "<br>";
	}
  else
	{
	  $imageName = 'userID'.$_POST['userID'].'.'.pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION);
	  move_uploaded_file($_FILES["profile-pic"]["tmp_name"],'../../assets/profile-pics/'.$imageName);
	}	
	$userID = $_POST['userID'];
	$userFName = mysql_real_escape_string($_POST['first-name']);
	$userSName = mysql_real_escape_string($_POST['last-name']);
	$userEmail = mysql_real_escape_string($_POST['email']);
	$userSpecialisation = mysql_real_escape_string(json_encode ($_POST['specialisation']));
	$userLanguage = $_POST['language'];
	$updateQuery = mysql_query("UPDATE usertable SET userEmail = '$userEmail', userFName = '$userFName', userSName = '$userSName', userLanguage = '$userLanguage', userSpecialisation = '$userSpecialisation', userProfileImg = '$imageName' WHERE userID = '$userID'");
	header('location:/edit-profile.php');
?>