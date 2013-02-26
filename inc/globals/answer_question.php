<?php
	session_start();
	include("../db/connect.php");
	$lessonID = $_POST['lesson-id'];
	$numQuestions = $_POST['num-questions'];
	if($_POST['answer']){
		if($_SESSION['CurrentQuestion'] < $numQuestions){
		$_SESSION['CurrentQuestion'] = $_SESSION['CurrentQuestion'] + 1;
		header('location:../../lesson.php?Lid='.$lessonID);
		}
	} else {
		if($_SESSION['CurrentQuestion'] > 1){
			$_SESSION['CurrentQuestion'] = $_SESSION['CurrentQuestion'] - 1;
			header('location:../../lesson.php?Lid='.$lessonID);
		}
	}
?>  