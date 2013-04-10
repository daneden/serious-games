<?php
	$isAdmin = true;
	$verify = true;
	require_once('../inc/header.php');
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar secondary-col">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>Modules</h1>
			<p>Welcome to the Modules Page. From here, you can edit existing or remove modules and more.</p>
			<?php
				$query = mysql_query("SELECT * FROM lessontable");
				if(mysql_fetch_assoc($query)) {
			?>
				<table class="table zebra admin-module-list">
					<thead>
						<tr>
							<th>Module Name</th>
							<th>Questions</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = mysql_query("SELECT * FROM lessontable");
							while ($result = mysql_fetch_assoc($query)) {
						?>
						<tr>
								<td><a href="edit_module.php?mID=<?php echo $result['lessonID'] ?>"><?php echo $result['lessonTitle'] ?></a></td>
								<td><?php
										$questionsQuery = mysql_query('SELECT * FROM questiontable WHERE questionLessonID = "'.$result['lessonID'].'"');
										$getNoOfQuestions = mysql_num_rows($questionsQuery);
										if ($getNoOfQuestions == 1) {
											echo "1 Question";	
										} else {
											echo $getNoOfQuestions." Questions";
										}
									 ?>
								</td>
								<td>
									<nav class="admin-actions">
										<ul class="nav">
											<li><a href="add_question.php?Mid=<?php echo $result['lessonID']?>">Add question</a></li>
											<li><a class="message-danger" href="inc/php/delete_module.php?Mid=<?php echo $result['lessonID']?>">Delete</a></li>
										</ul>
									</nav>
								</td>
						</tr>
						<?php } ?>
					</tbody>            
				</table>
				<a class="alignright butt butt-primary" href="create_module.php">Create Module</a>
			<?php } else { ?>
				<hr>
				<p class="intro promo">No modules yet. <a href="create_module.php">Add one now</a>.</p>
			<?php } ?>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>
