<?php
	$isAdmin = true;
	$verify = true;
	require_once('../inc/header.php');
	$lessonID = $_GET['mID'];
	$getLesson = mysql_query('SELECT * FROM lessontable WHERE lessonID = "'.$lessonID.'"');
	$lesson = mysql_fetch_assoc($getLesson);
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar secondary-col">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>Edit Module</h1>
			<p>This page allows you to edit an existing module. Simply type in the name of the module and which category you would like it to be under, and you&rsquo;re done!</p>
			<form class="cf form" action="inc/php/edit_module.php" method="post">
				<label for="module-name">Module Name</label>
				<input type="text" class="input" name="module-name" value="<?php echo $lesson['lessonTitle']?>" id="module-name">
				<label for="module-category">Module Category</label>
				<select class="input" name="module-category">
					<?php fetch_categories(); ?>
				</select>
				<input type="hidden" value="<?php echo $lessonID ?>" name="module-id">
                <label for="module-state">Module State</label>
                <select class="input" name="module-state">
                	<option <?php if($lesson['lessonState'] == 0){?>selected="selected"<?php } ?> value="0">Draft</option>
                    <option <?php if($lesson['lessonState'] == 1){?>selected="selected"<?php } ?> value="1">Published</option>
                </select>
				<input type="submit" value="Save" class="butt butt-primary alignright" name="submit" id="submit">
			</form>
			<hr>
			<h2 class="clear">Questions in Module</h2>
			<?php
				$getQuestions = mysql_query('SELECT * FROM questiontable WHERE questionLessonID ="'.$lessonID.'"');
				if(mysql_fetch_assoc($getQuestions)) {
			?>
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
				<div class="unit span-grid alignright p">
					<a class="butt alignright" href="add_question.php?Mid=<?php echo $lessonID?>">Add Question</a>
				</div>
			<?php } else { ?>
				<hr>
				<p class="intro promo">No questions yet. <a href="add_question.php?Mid=<?php echo $lessonID?>">Add one now</a>.</p>
			<?php } ?>
			<hr>
			<h2>References</h2>
			<p>References appear once a user has completed the module, to help them learn more about the topic.</p>
			<?php
				$getReferences = mysql_query('SELECT * FROM referencetable WHERE referenceLessonID ="'.$lessonID.'"');
				if(mysql_fetch_assoc($getReferences)) {
			?>
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
			<?php } else { ?>
				<hr>
				<p class="intro promo">No references yet. <a href="add_reference.php?Mid=<?php echo $lessonID?>">Add one now</a>.</p>
			<?php } ?>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>