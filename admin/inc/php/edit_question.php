<?php
	require_once('../../../inc/db/connect.php');
	$questionName = mysql_real_escape_string($_POST['question-title']);
	$questionAnswer = mysql_real_escape_string(json_encode ($_POST['answer']));
	$questionCorrectAnswer = $_POST['correct-answer'];
	$questionHelperText = mysql_real_escape_string($_POST['help-text']);
	$questionID = $_POST['question-id'];
	$updateQuery = "UPDATE questiontable SET questionName ='$questionName', questionAnswers ='$questionAnswer', questionAnswerIndex = '$questionCorrectAnswer', questionHelperText = '$questionHelperText' WHERE questionID = '$questionID'";
	mysql_query($updateQuery);
	header('location:../../modules.php');
?>