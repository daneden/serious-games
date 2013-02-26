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
		
		
?>