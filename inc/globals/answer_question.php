<?php
	session_start();
	include("../db/connect.php");
	$lessonID = $_POST['lesson-id'];
	$numQuestions = $_POST['num-questions'];
	$questionID = $_POST['question-id'];
	$answer = $_POST['answer'];
	$i = 1;
	$score = 0;
	if($_POST['answerQuestion']){
		
		if($_SESSION['CurrentQuestion'] == $numQuestions){
			$getQuestion = mysql_query('SELECT * FROM questiontable WHERE questionID = "'.$questionID.'"');
			$question = mysql_fetch_assoc($getQuestion);
			if ($answer == $question['questionAnswerIndex']) {
				$_SESSION['Answers'][$_SESSION['CurrentQuestion']] = 1;
			} else {
				$_SESSION['Answers'][$_SESSION['CurrentQuestion']] = 0;	
			}			
			while($i <= $numQuestions){
				$score = $score + $_SESSION['Answers'][$i];
				$i++;
			}
			$_SESSION['lessonScore'] = (($score / $numQuestions) * 100);
			$score = $_SESSION['lessonScore'];
			$checkProgression = mysql_query ('SELECT * FROM progressiontable WHERE progressionUserID = "'.$_SESSION['UserID'].'" AND progressionlessonID = "'.$lessonID.'"');
			$hasProgress = mysql_num_rows ($checkProgression);
			if ($hasProgress > 0){
				$userID = $_SESSION['UserID'];
				$updateQuery = "UPDATE progressiontable SET progressionScore ='$score' WHERE progressionUserID = '$userID' AND progressionlessonID = $lessonID";
				mysql_query($updateQuery);
			} else {
				$getCategoryID = mysql_query ('SELECT * FROM lessontable WHERE lessonID = "'.$lessonID.'"');
				$category = mysql_fetch_assoc ($getCategoryID);
				$categoryID = $category['lessonCategoryID'];
				$userID = $_SESSION['UserID'];
				mysql_query ('INSERT INTO progressiontable (progressionID, progressionUserID, progressionCategoryID, progressionLessonID, progressionScore) VALUES ( NULL, "'.$userID.'", "'.$categoryID.'","'.$lessonID.'","'.$score.'")');
				header('location:../../dashboard.php');
			}
		}
				
		if($_SESSION['CurrentQuestion'] < $numQuestions){
			$getQuestion = mysql_query('SELECT * FROM questiontable WHERE questionID = "'.$questionID.'"');
			$question = mysql_fetch_assoc($getQuestion);
			if ($answer == $question['questionAnswerIndex']) {
				$_SESSION['Answers'][$_SESSION['CurrentQuestion']] = 1;
			} else {
				$_SESSION['Answers'][$_SESSION['CurrentQuestion']] = 0;	
			}
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