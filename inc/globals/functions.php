<?php
/* THIS IS THE GLOBAL FUNCTIONS FILE */

/* This Function verifies the user */
	function verify_user() {
		session_start();
		global $userDetails;
		if(!isset($_SESSION['UserID'])){
			header ('location:login.php');	
		} else {
		$userID = $_SESSION['UserID'];
		$getUser = mysql_query ("SELECT * FROM usertable WHERE userID = '".$userID."'");
		$userDetails = mysql_fetch_assoc($getUser);	
		}
	}
		/* This function verifies that the user is an admin */
		function verify_admin() {
			global $userDetails;
			if($userDetails['userIsAdmin'] == 1 && $_SESSION['AdminState'] == 1) {
				
			} else {
				header ('location:../login.php');
			}
		}
	
		/* This function prints the user's first name*/
		function get_user_fname() {
			global $userDetails;
			echo $userDetails['userFName'];	
		}
		
		/* This function prints the user's first name*/
		function get_user_email() {
			global $userDetails;
			return $userDetails['userEmail'];	
		}	
		
		/* This function prints the user's last name*/
		function get_user_sname() {
			global $userDetails;
			echo $userDetails['userSName'];	
		}
		
		/*This function displays all modules for user dashboard */
		function get_categories() {
			$getCategories = mysql_query('SELECT * FROM categorytable');
			while($category = mysql_fetch_assoc($getCategories)){
				if(check_available($category['categoryID'])) {?>
					<li class="island <?php check_completed($category['categoryID']) ?>">
						<h2 class="standalone"><?php echo $category['categoryTitle'];?></h2>
						<p class="desc"><?php echo $category['categoryDescription']?></p>
						<ol class="sub-challenges">
							<?php 
								$getLessons = mysql_query('SELECT * FROM lessontable WHERE lessonCategoryID = "'.$category['categoryID'].'"');
								while ($lesson = mysql_fetch_assoc($getLessons)) {
							?>
							<li <?php lesson_completed($lesson['lessonID']) ?> ><a href="lesson.php?Lid=<?php echo $lesson['lessonID'] ?>"><?php echo $lesson['lessonTitle'] ?></a></li>
							<?php } ?>
						</ol>
					</li>
				<?php
				} else { 
					$getPrequisiteDetails = mysql_query('SELECT * FROM lessonprerequisitetable WHERE prereqUnlocksID = "'.$category['categoryID'].'"');
					$prequisiteDetails = mysql_fetch_assoc($getPrequisiteDetails);
					$getPrequisite = mysql_query('SELECT * FROM categorytable WHERE categoryID = "'.$prequisiteDetails['prereqCategoryID'].'"');
					$prerequisite = mysql_fetch_assoc($getPrequisite);
				?>
					<li class="unavailable island">
						<div class="modal island">
							<h3>Challenges Unavailable</h3>
							<p>Unlock these challenges by scoring more than <strong><?php echo $prequisiteDetails['prereqScore'] ?></strong> in <em class="challenge-title">&ldquo;<?php echo $prerequisite['categoryTitle'] ?>.&rdquo;</em></p>
						</div>
						<h2 class="standalone"><?php echo $category['categoryTitle'];?></h2>
						<p class="desc"><?php echo $category['categoryDescription']?></p>
						<ol class="sub-challenges">
							<?php 
								$getLessons = mysql_query('SELECT * FROM lessontable WHERE lessonCategoryID = "'.$category['categoryID'].'"');
								while ($lesson = mysql_fetch_assoc($getLessons)) {
							?>
							<li <?php lesson_completed($lesson['lessonID']) ?> ><a href="lesson.php?Lid=<?php echo $lesson['lessonID'] ?>"><?php echo $lesson['lessonTitle'] ?></a></li>
							<?php } ?>
						</ol>
					</li>
			<?php }
			}
		}
		
			function check_completed($categoryID){
				$getNumLessons = mysql_query('SELECT * FROM lessontable WHERE lessonCategoryID ="'.$categoryID.'"');
				$numLessons = mysql_num_rows($getNumLessons);
				$getNumProgressions = mysql_query('SELECT * FROM progressiontable WHERE progressionCategoryID = "'.$categoryID.'" AND progressionUserID = "'.$_SESSION['UserID'].'"');
				$numProgressRows = mysql_num_rows($getNumProgressions);
				if ($numProgressRows == $numLessons) {
					echo 'completed';
				}
			}
			
			function check_available($categoryID){
				$score = 0;
				$i = 0;
				
				$getPrerequisiteDetails = mysql_query ('SELECT * FROM lessonprerequisitetable WHERE prereqUnlocksID = "'.$categoryID.'"');
				$prerequisiteDetails = mysql_fetch_assoc ($getPrerequisiteDetails);
				$prereqCategory = $prerequisiteDetails['prereqCategoryID'];
				$prereqScore = $prerequisiteDetails['prereqScore'];
				
				$getNumLessons = mysql_query('SELECT * FROM lessontable WHERE lessonCategoryID = "'.$prereqCategory.'"');
				$numLessons = mysql_num_rows($getNumLessons);
				
				if($prerequisiteDetails['prereqCategoryID'] > 0){
					$getUserProgression = mysql_query('SELECT * FROM progressiontable WHERE progressionCategoryID = "'.$prereqCategory.'" AND progressionUserID = "'.$_SESSION['UserID'].'"');
					$numUserProgression = mysql_num_rows($getUserProgression);
					
					if($numLessons == $numUserProgression){
						while($userScore = mysql_fetch_assoc($getUserProgression)){
							$score = $score + $userScore['progressionScore'];
							$i++;
						}
						$score = ($score / $i) * 100;
						if($score >= $prereqScore) {
							return true;
						} else {
							return false;	
						}
					} else {
						return false;

					}
				} else {
					return true;
				}
			}
		
		/* This function retrieves all of the Question IDs that are in the Lesson ID that is passed into it */
		function get_questions($lessonID) {
			global $questionArray;
			$i = 1;
			$getQuestions = mysql_query('SELECT questionID FROM questiontable WHERE questionLessonID ="'.$lessonID.'" ORDER BY questionID ASC');
			while($questions = mysql_fetch_array($getQuestions)){
				$questionArray[$i] = $questions['questionID'];
				$i++;
			}
			return $questionArray;
		}
		
		/* This function retrieves all of the information about the question */
		function get_question_details($questionID) {
			global $questionDetails;
			$getQuestion = mysql_query('SELECT * FROM questiontable WHERE questionID ="'.$questionID.'"');
			$questionDetails = mysql_fetch_assoc($getQuestion);
		}
		
		/* This outputs the question name */
			function get_question_title() {
				global $questionDetails;
				echo $questionDetails['questionName'];	
			}

		/* This outputs the question helper test */
			function get_question_helper() {
				global $questionDetails;
				if($questionDetails['questionHelperText']!='') {
					return nl2p($questionDetails['questionHelperText'], false);
				} else {
					return false;
				}
			}
			
		/* This outputs the question ID */
			function get_question_id() {
				global $questionDetails;
				echo $questionDetails['questionID'];	
			}
			
		/* This outputs the image for the question */
			function get_question_image() {
				global	$questionDetails;
				if($questionDetails['questionImg']){
					echo "<img class='question-image' src='assets/lesson-images/".$questionDetails['questionImg']."'/>";
				}
			}
			
		
		/* This function adds the class "challenge-complete" to completed lessons */
		function lesson_completed($lesson) {
			$lessonID = $lesson;
			$lessonCompleted = mysql_query('SELECT * FROM progressiontable WHERE progressionUserID = "'.$_SESSION['UserID'].'" AND progressionlessonID = "'.$lessonID.'"');
			if($lessonFetch = mysql_fetch_assoc($lessonCompleted)){
				echo 'class="challenge-complete"';
			}
		}

/*
======================
Manipulation Functions
======================
*/

/* Turn newlines into <p> tags */
function nl2p($string, $line_breaks = true, $xml = true) {
	// Remove existing HTML formatting to avoid double-wrapping things
	$string = str_replace(array('<p>', '</p>', '<br>', '<br />'), '', $string);
	
	// It is conceivable that people might still want single line-breaks
	// without breaking into a new paragraph.
	if ($line_breaks == true)
		return '<p>'.preg_replace(array("/([\n]{2,})/i", "/([^>])\n([^<])/i"), array("</p>\n<p>", '<br'.($xml == true ? ' /' : '').'>'), trim($string)).'</p>';
	else 
		return '<p>'.preg_replace("/([\n]{1,})/i", "</p>\n<p>", trim($string)).'</p>';
}

/* This function takes in a field of the database that is a JSON string and returns an array */
function decode_array($array) {
	global $arrayResult;
	$arrayResult = json_decode($array);
	return $arrayResult;
}

?>
