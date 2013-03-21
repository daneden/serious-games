<?php
	require_once('../../../inc/db/connect.php');
	  if ($_FILES["image"]["error"] > 0)
		{
		echo "Return Code: " . $_FILES["image"]["error"] . "<br>";
		}
	  else
		{
			$imageName = $_FILES["image"]["name"];
	
		if (file_exists("../../../assets/lesson-images/" . $_FILES["image"]["name"]))
		  {
		  echo $_FILES["image"]["name"] . " already exists. ";
		  }
		else
		  {
		  move_uploaded_file($_FILES["image"]["tmp_name"],'../../../assets/lesson-images/' . $_FILES["image"]["name"]);
		  }
		}
	
	$questionName = mysql_real_escape_string($_POST['question-title']);
	$questionAnswer = mysql_real_escape_string(json_encode ($_POST['answer']));
	$questionCorrectAnswer = $_POST['correct-answer'];
	$questionHelperText = mysql_real_escape_string($_POST['help-text']);
	$questionLessonID = $_POST['module-id'];
	mysql_query ('Insert INTO questiontable (questionID, questionLessonID, questionName, questionType, questionAnswers, questionAnswerIndex, questionHelperText, questionTimer, questionImg) VALUES ( NULL, "'.$questionLessonID.'","'.$questionName.'", 0, "'.$questionAnswer.'", "'.$questionCorrectAnswer.'", "'.$questionHelperText.'", 0, "'.$imageName.'")');
	header('location:../../modules.php');
?>