<?php
	$isAdmin = true;
	require_once('../inc/db/connect.php');
	require_once('../inc/globals/functions.php');
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
			<h1>Hi there, <?php get_user_fname(); ?>.</h1>
			<p>Welcome to the Admin Dashboard. From here, you can add new challenges and edit existing ones, remove users and more.</p>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>