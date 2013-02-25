<?php
	$isAdmin = true;
	require_once('../inc/header.php');
	require_once('../inc/db/connect.php');
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar bordered-col secondary-col island">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>Modules</h1>
			<p>Welcome to the Modules Page! From here, you view the current modules and edit existing ones, remove modules and more.</p>
			<h2>List of Modules </h2>
            	<div class="grid">
				<?php
                $query=mysql_query("SELECT * FROM lessontable");
                while ($result = mysql_fetch_assoc($query)) {
                ?>
                        <div class="unit p one-of-two"><a href="edit_module.php?mID=<?php echo $result['lessonID'] ?>"><?php echo $result['lessonTitle'] ?></a></div>
                        <div class="unit one-of-four"><?php
								$questionsQuery = mysql_query('SELECT * FROM questiontable WHERE questionLessonID = "'.$result['lessonID'].'"');
								$getNoOfQuestions = mysql_num_rows($questionsQuery);
								if ($getNoOfQuestions == 1) {
									echo "1 Question";	
								} else {
									echo $getNoOfQuestions." Questions";
								}
							 ?>
                             	<a class="butt alignright" href="add_question.php?Mid=<?php echo $result['lessonID']?>">Add</a>
                        </div>
                        <div class="unit one-of-four"><a class="alignright butt butt-danger submit" href="inc/php/delete_module.php?Mid=<?php echo $result['lessonID']?>">Delete</a></div>
                <?php } ?>
            </div>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>
