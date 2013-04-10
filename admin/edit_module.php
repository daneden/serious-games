<?php
	$isAdmin = true;
	require_once('../inc/db/connect.php');
	require_once('../inc/globals/functions.php');
	require_once('inc/php/functions.php');
	verify_user();
	verify_admin();
	$lessonID = $_GET['mID'];
	$getLesson = mysql_query('SELECT * FROM lessontable WHERE lessonID = "'.$lessonID.'"');
	$lesson = mysql_fetch_assoc($getLesson);
	require_once('../inc/header.php');
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar secondary-col">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>Edit Module</h1>
			<p>This page allows you to edit an existing module, simply type in the name of the module and which category you would like it to be under and you're done!</p>
			<form class="cf form" action="inc/php/edit_module.php" method="post">
				<label for="module-name">Module Name</label>
				<input type="text" class="input" name="module-name" value="<?php echo $lesson['lessonTitle']?>" id="module-name">
				<label for="module-category">Module Category</label>
				<select class="input" name="module-category">
					<?php fetch_categories(); ?>
				</select>
				<input type="hidden" value="<?php echo $lessonID ?>" name="module-id">
				<input type="submit" value="Save" class="butt butt-primary alignright" name="submit" id="submit">
			</form>
			<hr>
			<h2 class="clear">Questions in Module</h2>
			<table class="table zebra admin-question-list">
				<thead>
					<tr>
						<th>Question</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
			<?php
				$getQuestions = mysql_query('SELECT * FROM questiontable WHERE questionLessonID ="'.$lessonID.'"');
				while($questions = mysql_fetch_assoc($getQuestions)){
			?>
				<tr>
					<td>
						<a href="edit_question.php?Qid=<?php echo $questions['questionID'];?>"><?php echo $questions['questionName'] ?></a>
					</td>
					<td>
						<a class="message-danger" href="inc/php/delete_question.php?Qid=<?php echo $questions['questionID'];?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
				</tbody>
			</table>
			<div class="unit span-grid alignright">
				<a class="butt alignright" href="add_question.php?Mid=<?php echo $lessonID?>">Add Question</a>
			</div>
			<table class="table zebra admin-question-list">
				<thead>
					<tr>
						<th>Reference</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
			<?php
				$getReferences = mysql_query('SELECT * FROM referencetable WHERE referenceLessonID ="'.$lessonID.'"');
				while($references = mysql_fetch_assoc($getReferences)){
			?>
				<tr>
					<td>
						<a href="edit_reference.php?Rid=<?php echo $references['referenceID'];?>"><?php echo $references['referenceTitle'] ?></a>
					</td>
					<td>
						<a class="message-danger" href="inc/php/delete_reference.php?Rid=<?php echo $references['referenceID'];?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
				</tbody>
			</table>
			<div class="unit span-grid alignright">
				<a class="butt alignright" href="add_reference.php?Mid=<?php echo $lessonID?>">Add Reference</a>
			</div>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>