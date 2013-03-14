<?php
	$isAdmin = true;
	require_once('../inc/db/connect.php');
	require_once('../inc/globals/functions.php');
	require_once('inc/php/functions.php');
	verify_user();
	verify_admin();
	require_once('../inc/header.php');	
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar secondary-col">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>Create New Module!</h1>
            <p>This page allows you to create a new module, simply type in the name of the module and which category you would like it to be under and you're done!</p>
            <form class="form" action="inc/php/create_new_module.php" method="post">
                <label for="module-name">Module Name</label>
                <input type="text" class="input" name="module-name" id="module-name">
                <label for="module-category">Module Category</label>
                <select class="input" name="module-category">
                	<?php fetch_categories(); ?>
                </select>
                <input type="submit" value="Submit" class="butt butt-primary alignright" name="submit" id="submit">
            </form>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>