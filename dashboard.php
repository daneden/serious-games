<?php
	if(!isset($_SESSION)){
		session_start();
		error_reporting(0);
	}
	$_SESSION['CurrentQuestion'] = 1;
	require_once('inc/db/connect.php');
	require_once('inc/globals/functions.php');
	$_SESSION['Answers'] = array();
	verify_user();
	require_once('inc/header.php');	
?>
<div class="wrap">
	<div class="content two-col">
		<div class="main-col island">
			<h1>Hi, <?php get_user_fname() ?>!</h1>
			<p>Welcome to your dashboard! From here, you can view available challenges, retake challenges you&rsquo;ve previously completed, and a load of other junk.</p>
			<ul class="challenges">
				<?php get_categories(); ?>
			</ul>
		</div>
		<div class="sidebar secondary-col island">
			<?php include('inc/profile.php') ?>
		</div>
	</div>
</div>
<?php require_once('inc/footer.php'); ?>
