<?php
	$isAdmin = true;
	require_once('../inc/header.php');
	require_once('../inc/db/connect.php');
	require_once('../inc/globals/functions.php');
	require_once('inc/php/functions.php');
	verify_user();
	verify_admin();
	$lessonID = $_GET['mID'];
	$getLesson = mysql_query('SELECT * FROM lessontable WHERE lessonID = "'.$lessonID.'"');
	$lesson = mysql_fetch_assoc($getLesson);
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar bordered-col secondary-col island">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>Edit Module!</h1>
            <p>This page allows you to edit an existing module, simply type in the name of the module and which category you would like it to be under and you're done!</p>
            <form class="form" action="inc/php/edit_module.php" method="post">
                <label for="module-name">Module Name</label>
                <input type="text" class="input" name="module-name" value="<?php echo $lesson['lessonTitle']?>" id="module-name">
                <label for="module-category">Module Category</label>
                <select class="input" name="module-category">
                	<?php fetch_categories(); ?>
                </select>
                <input type="hidden" value="<?php echo $lessonID ?>" name="module-id">
                <input type="submit" value="Submit" class="butt butt-primary alignright" name="submit" id="submit">
            </form>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>