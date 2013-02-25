<?php
	require_once('../../../inc/db/connect.php');
	$questionName = mysql_real_escape_string($_POST['question-title']);
	$questionAnswer = mysql_real_escape_string(json_encode ($_POST['answer']));
	$questionCorrectAnswer = $_POST['correct-answer'];
	$questionHelperText = mysql_real_escape_string($_POST['help-text']);
	$questionLessonID = $_POST['module-id'];
	mysql_query ('Insert INTO questiontable (questionID, questionLessonID, questionName, questionType, questionAnswers, questionAnswerIndex, questionHelperText, questionTimer) VALUES ( NULL, "'.$questionLessonID.'","'.$questionName.'", 0, "'.$questionAnswer.'", "'.$questionCorrectAnswer.'", "'.$questionHelperText.'", 0)');
	header('location:../../modules.php');
?>