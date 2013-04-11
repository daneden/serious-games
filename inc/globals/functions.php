<?php
/* THIS IS THE GLOBAL FUNCTIONS FILE */

/* True/false check if a session is started */
	function is_logged_in() {
		session_start();
		error_reporting(0);
		if(!isset($_SESSION['UserID'])){
			return false;
		} else {
			return true;
		}
	}

/* This Function verifies the user */
	function verify_user() {
		session_start();
		error_reporting(0);
		global $userDetails;
		if(!isset($_SESSION['UserID'])){
			header ('location:login.php');
		} else {
			$userID = $_SESSION['UserID'];
			$getUser = mysql_query ("SELECT * FROM usertable WHERE userID = '".$userID."'");
			$userDetails = mysql_fetch_assoc($getUser);
			return true;
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
		
		/* This function prints the user's ID*/
		function get_user_ID() {
			global $userDetails;
			echo $userDetails['userID'];	
		}
		
		/* This function prints the user's profile image */
		function get_profile_pic() {
			global $userDetails;
			if($userDetails['userProfileImg']){
				echo '/assets/profile-pics/'.$userDetails['userProfileImg'];
			} else {
				echo '/assets/images/default-avatar.jpg';	
			}
		}
		
		/*This function displays all modules for user dashboard */
		function get_categories() {
			$getCategories = mysql_query('SELECT * FROM categorytable WHERE categoryState = 1');
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
					$_SESSION['LockedModules'][] = $category['categoryID'];
				?>
					<li class="unavailable island">
						<div class="modal island">
							<h3>Challenges Unavailable</h3>
							<p>Unlock these challenges by scoring <strong><?php echo $prequisiteDetails['prereqScore'] ?> %</strong> in <em class="challenge-title">&ldquo;<?php echo $prerequisite['categoryTitle'] ?>.&rdquo;</em></p>
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
				global $numCompleted;
				$getNumLessons = mysql_query('SELECT * FROM lessontable WHERE lessonCategoryID ="'.$categoryID.'"');
				$numLessons = mysql_num_rows($getNumLessons);
				$getNumProgressions = mysql_query('SELECT * FROM progressiontable WHERE progressionCategoryID = "'.$categoryID.'" AND progressionUserID = "'.$_SESSION['UserID'].'"');
				$numProgressRows = mysql_num_rows($getNumProgressions);
				if ($numProgressRows == $numLessons) {
					echo 'completed';
					$numCompleted = $numCompleted + 1;
					$_SESSION['numCompleted'] = $numCompleted;
					$_SESSION['CompletedModules'][] = $categoryID;
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
				$_SESSION['CompletedLessons'][] = $lessonID;
			}
		}

/*
======================
Profile Functions
======================
*/

	function get_modules_completed() {
		echo $_SESSION['numCompleted'];
	}
	
	function get_average_score() {
		$avScore = 0;
		$getScore = mysql_query('SELECT * FROM progressiontable WHERE progressionUserID = "'.$_SESSION['UserID'].'"');
		$i = 0;
		while ($averageScore = mysql_fetch_assoc($getScore)){
			$avScore = $avScore + $averageScore['progressionScore'];
			$i++;
		}
		$average = ceil($avScore/$i);
		echo $average;
	}

	function compare_language($language){
		global $userDetails;
		if($language == $userDetails['userLanguage']){
			echo 'selected="selected"';
		}
	}
	
	function check_specialisation($specialisation, $array) {
		$i = 0;
		while($i < count($array)){
			if($specialisation == $array[$i]){
				echo 'checked="checked"';
			}
			$i++;
		}
	}
	
	function get_recommended() {
		global $arrayResult;
		$getUser = mysql_query ("SELECT * FROM usertable WHERE userID = '".$_SESSION['UserID']."'");
		$userDetails = mysql_fetch_assoc($getUser);	
		decode_array($userDetails['userSpecialisation']);
		$i = 0;
		$getModulesQuery = "SELECT * FROM categorytable WHERE (";
		if (count($arrayResult) > 1){
			while ($i < (count($arrayResult))) {
				if ($i == 0) {
					$getModulesQuery = $getModulesQuery." categorySpecialisation LIKE '%".$arrayResult[$i]."%'";
				} else {
					$getModulesQuery = $getModulesQuery." OR categorySpecialisation LIKE '%".$arrayResult[$i]."%'";
				}
				$i++;
			}
			$getModulesQuery = $getModulesQuery." OR categorySpecialisation = 'null' ) AND categoryState = '1' ORDER BY RAND()";
		}  else {
			$getModulesQuery = $getModulesQuery."categoryState = '1') ORDER BY RAND()";
		}
		$getModules = mysql_query($getModulesQuery);
		$i = 0;
		?>
		<h4 class="standalone">Recommended for you:</h4>
		<ul class="recommended">
		<?php
		while ($i < 3 && $modules = mysql_fetch_assoc($getModules)) {
			if (!in_array($modules['categoryID'],$_SESSION['CompletedModules'], $strict = true) && !in_array($modules['categoryID'],$_SESSION['LockedModules'], $strict = true)){
			?>
            	<li><a href="lesson.php?Lid=<?php get_recommended_lesson($modules['categoryID']); ?>"><?php echo $modules['categoryTitle'] ;?></a></li>
            <?php 
			}
			$i++;
		}
		?>
		</ul>
		<hr>
		<?php
	}
	
	function get_recommended_lesson($categoryID){
		$escapeFlag = 0;
		$getLessons = 'SELECT * FROM lessontable WHERE lessonCategoryID = '.$categoryID;
		$getLessons = mysql_query($getLessons);
		while(($lesson = mysql_fetch_assoc($getLessons)) && $escapeFlag == 0){
			if(!in_array($lesson['lessonID'],$_SESSION['CompletedLessons'], $strict = true)) {
				echo $lesson['lessonID'];
				$escapeFlag = 1;
			}
		}
	}

	function crop_image($src_image, $dest_image, $thumb_size = 512, $jpg_quality = 90) {

		// Get dimensions of existing image
		$image = getimagesize($src_image);

		// Check for valid dimensions
		if( $image[0] <= 0 || $image[1] <= 0 ) return false;

		// Determine format from MIME-Type
		$image['format'] = strtolower(preg_replace('/^.*?\//', '', $image['mime']));

		// Import image
		switch( $image['format'] ) {
			case 'jpg':
			case 'jpeg':
				$image_data = imagecreatefromjpeg($src_image);
			break;
			case 'png':
				$image_data = imagecreatefrompng($src_image);
			break;
			case 'gif':
				$image_data = imagecreatefromgif($src_image);
			break;
			default:
				// Unsupported format
				return false;
			break;
		}

		// Verify import
		if( $image_data == false ) return false;

		// Calculate measurements
		if( $image[0] & $image[1] ) {
			// For landscape images
			$x_offset = ($image[0] - $image[1]) / 2;
			$y_offset = 0;
			$square_size = $image[0] - ($x_offset * 2);
		} else {
			// For portrait and square images
			$x_offset = 0;
			$y_offset = ($image[1] - $image[0]) / 2;
			$square_size = $image[1] - ($y_offset * 2);
		}

		// Resize and crop
		$canvas = imagecreatetruecolor($thumb_size, $thumb_size);
		if( imagecopyresampled(
			$canvas,
			$image_data,
			0,
			0,
			$x_offset,
			$y_offset,
			$thumb_size,
			$thumb_size,
			$square_size,
			$square_size
		)) {

			// Create thumbnail
			switch( strtolower(preg_replace('/^.*\./', '', $dest_image)) ) {
				case 'jpg':
				case 'jpeg':
					return imagejpeg($canvas, $dest_image, $jpg_quality);
				break;
				case 'png':
					return imagepng($canvas, $dest_image);
				break;
				case 'gif':
					return imagegif($canvas, $dest_image);
				break;
				default:
					// Unsupported format
					return false;
				break;
		}

		} else {
			return false;
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
	$arrayResult = array();
	$arrayResult = json_decode($array);
	return $arrayResult;
}

function errors (){
	
}

function spec_array($arrayReplaced){
	$arrayReplaced = str_replace('accounting', 'Accounting & Finance', $arrayReplaced);
	$arrayReplaced = str_replace('health', 'Health & Beauty', $arrayReplaced);
	$arrayReplaced = str_replace('human', 'Human Resources', $arrayReplaced);
	$arrayReplaced = str_replace('science', 'Science & Technology', $arrayReplaced);
	$arrayReplaced = str_replace('social', 'Social Services', $arrayReplaced);
	return $arrayReplaced;
}

?>
