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
				?>
                    <li class="island">
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
				echo $questionDetails['questionHelperText'];	
			}
			
		/* This outputs the question ID */
			function get_question_id() {
				global $questionDetails;
				echo $questionDetails['questionID'];	
			}
		/* This function takes in a field of the database that is a JSON string and returns an array */
		function decode_array($array) {
			global $arrayResult;
			$arrayResult = json_decode($array);
			return $arrayResult;
		}
		
		/* This function adds the class "challenge-complete" to completed lessons */
		function lesson_completed($lesson) {
			$lessonID = $lesson;
			$lessonCompleted = mysql_query('SELECT * FROM progressiontable WHERE progressionUserID = "'.$_SESSION['UserID'].'" AND progressionlessonID = "'.$lessonID.'"');
			if($lessonFetch = mysql_fetch_assoc($lessonCompleted)){
				echo 'class="challenge-complete"';
			}
		}
?>
