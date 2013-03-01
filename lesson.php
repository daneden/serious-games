<?php
	require_once('inc/header.php');
	require_once('inc/db/connect.php');
	require_once('inc/globals/functions.php');
	verify_user();
	$lessonNum[] = "";
	$i = 1;
	$lessonID = $_GET['Lid'];
	if(!isset($_SESSION['CurrentQuestion'])){
		$_SESSION['CurrentQuestion'] = 1;
	}
	if(!isset($_SESSION['Answers'])){
		$_SESSION['Answers'] = array();
	}
	$currentQuestion = $_SESSION['CurrentQuestion'];
	$getLesson = mysql_query('SELECT * FROM lessontable WHERE lessonID = "'.$lessonID.'"');
	$lesson = mysql_fetch_assoc($getLesson);
	$getModule = mysql_query('SELECT * FROM categorytable WHERE categoryID = "'.$lesson['lessonCategoryID'].'"');
	$module = mysql_fetch_assoc($getModule);
	$getLessonNum = mysql_query('SELECT lessonID FROM lessontable WHERE lessonCategoryID = "'.$module['categoryID'].'"');
	while ($getLessonNumArray = mysql_fetch_assoc($getLessonNum)) {
		$lessonNum[$i] = $getLessonNumArray['lessonID'];
		$i++;
	}
	$lessonNumber = array_search($lessonID, $lessonNum);
	get_questions($lessonID);
	get_question_details($questionArray[$currentQuestion]);
	decode_array($questionDetails['questionAnswers']);
	$progressPercent = floor((($currentQuestion - 1)/(count($questionArray)))*100);
	
?>
<div class="wrap">
	<div class="content two-col">
		<div class="main-col border-col island">
			<h1><?php echo $module['categoryTitle'] ?></h1>
			<span class="gamma lesson-header">Lesson <?php echo $lessonNumber; ?>: <strong class="lesson-title"><?php echo $lesson['lessonTitle']?></strong></span>
			<div class="p lesson-progress">
				<div class="progress-measure" style="width: <?php echo $progressPercent ?>%;" data-tooltip="<?php echo $progressPercent ?>% Complete"><span class="visually-hidden"><?php echo $progressPercent ?>% Complete</span></div>
			</div>

			<div class="lesson-content">
            	<form action="inc/globals/answer_question.php" method="post">
				<div class="lesson-question">
					<div class="question-header island">
						<h2>Question <?php echo $currentQuestion ?> <span class="questions-total">of <?php echo count($questionArray); ?></span></h2>
						<p class="intro standalone"><?php get_question_title() ?></p>
					</div>
					<ol class="question-answer-group standalone">
						<li class="question-answer isle"><input class="alignleft qa-in" type="radio" value="0" id="q-a1" name="answer"><label for="q-a1"><?php echo $arrayResult[0] ?></label></li>
						<li class="question-answer isle"><input class="alignleft qa-in" type="radio" value="1" id="q-a2" name="answer"><label for="q-a2"><?php echo $arrayResult[1] ?></label></li>
						<li class="question-answer isle"><input class="alignleft qa-in" type="radio" value="2" id="q-a3" name="answer"><label for="q-a3"><?php echo $arrayResult[2] ?></label></li>
                        <li class="question-answer isle"><input class="alignleft qa-in" type="radio" value="3" id="q-a4" name="answer"><label for="q-a4"><?php echo $arrayResult[3] ?></label></li>
					</ol>
				</div>
				<div class="lesson-navigation cf island">
                	<input type="hidden" name="lesson-id" value="<?php echo $lessonID?>" />
                    <input type="hidden" name="question-id" value="<?php get_question_id()?>" />
                    <input type="hidden" name="num-questions" value="<?php echo count($questionArray); ?>" />
					<input type="submit" value="Next Question" name="answerQuestion" class="butt butt-primary alignright">
					<?php if($_SESSION['CurrentQuestion'] > 1) {?><input type="submit" value="Go Back" name="go-back"class="butt alignleft"><?php } ?>
				</div>
                </form>
			</div>
		</div>
		<div class="sidebar secondary-col island">
			<h2>Need some help?</h2>
			<p><?php get_question_helper(); ?></p>
		</div>
	</div>
</div>
<?php require_once('inc/footer.php'); ?>
