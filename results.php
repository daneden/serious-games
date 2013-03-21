<?php
	$_SESSION['CurrentQuestion'] = 1;
	require_once('inc/db/connect.php');
	require_once('inc/globals/functions.php');
	verify_user();
	require_once('inc/header.php');	
	$lessonID = $_GET['Lid'];
	$getQuestions = mysql_query('SELECT * FROM questiontable WHERE questionLessonID = "'.$lessonID.'"');
	$i = 1;
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
	if(isset($lessonNum[($lessonNumber + 1)])){
	$nextLessonID = $lessonNum[($lessonNumber + 1)];
	}
	$i = 1;
?>
<div class="wrap">
	<div class="content two-col">
		<div class="main-col border-col island">
			<h1><?php echo $module['categoryTitle'] ?></h1>
			<span class="gamma lesson-header">Lesson <?php echo $lessonNumber?>: <strong class="lesson-title"><?php echo $lesson['lessonTitle']?></strong></span>
			<div class="p lesson-progress">
				<div class="progress-measure" style="width: 100%;" data-tooltip="100%"><span class="visually-hidden">100% Complete</span></div>
			</div>
            <h2>Lesson Complete!</h2>
            <p>You have finished the lesson, let's take a look at how you've done!</p>
            <ul class="answers">
            	<?php while ($getAnswers = mysql_fetch_assoc($getQuestions)){?>
                	<li <?php if($_SESSION['Answers'][$i] == 1){ ?>class="correct-answer"<?php } else { ?>class="incorrect-answer"<?php }?>>
						<p class="standalone">
	                		<?php if($_SESSION['Answers'][$i] == 1){ ?>
	                			<strong>Correct:</strong>
	                		<?php } else {?>
	                			<strong>Incorrect:</strong>
	                		<?php } ?>

							<?php echo $getAnswers['questionName']?>
						</p>
						<?php if($_SESSION['Answers'][$i] == 0){ ?>
						<p class="standalone">
							<em>Correct Answer:</em>
							<?php decode_array($getAnswers['questionAnswers']);
							echo $arrayResult[$getAnswers['questionAnswerIndex']] ?>
						</p>
						<?php } ?>
					</li>
                <?php $i++; } ?>
            </ul>
            <h2>Your final score is: <?php echo $_SESSION['score']; ?></h2>
			<?php $_SESSION['CurrentQuestion'] = 1;	$_SESSION['Answers'] = array(); ?>            
			<p class="cf">
            	<a class="butt alignleft" href="dashboard.php">Return to Dashboard</a>
            	<a class="butt butt-primary alignright" href="lesson.php?Lid=<?php echo $nextLessonID ?>">Next Lesson &raquo;</a>
            </p>
            <hr>
            <p>Or, you can <a href="/lesson.php?Lid=<?php echo $lessonID; ?>">retake this lesson</a><?php if($_SESSION['score']!='100%') echo " and try to beat your previous score"; ?>.</p>
        </div>
		<div class="sidebar secondary-col island">
			<h2>Profile Overview</h2>
			<h3><?php get_user_fname(); ?> <?php get_user_sname(); ?></h3>
		</div>
	</div>
</div>
<?php require_once('inc/footer.php'); ?>