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
                            <li><a href="lesson.php?Lid=<?php echo $lesson['lessonID'] ?>"><?php echo $lesson['lessonTitle'] ?></a></li>
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
		
		function get_question_details($questionID) {
			global $questionDetails;
			$getQuestion = mysql_query('SELECT * FROM questiontable WHERE questionID ="'.$questionID.'"');
			$questionDetails = mysql_fetch_assoc($getQuestion);
		}
		
			function get_question_title() {
				global $questionDetails;
				echo $questionDetails['questionName'];	
			}

			function get_question_helper() {
				global $questionDetails;
				echo $questionDetails['questionHelperText'];	
			}

		function decode_array($array) {
			global $arrayResult;
			$arrayResult = json_decode($array);
			return $arrayResult;
		}
	
?>