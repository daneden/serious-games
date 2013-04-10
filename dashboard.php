<?php
	$verify = true;
	$isAdmin = false;
	require_once('inc/header.php');
	$_SESSION['CurrentQuestion'] = 1;
	$_SESSION['Answers'] = array();	
	$_SESSION['CompletedModules'] = array();
	$_SESSION['LockedModules'] = array();
	$_SESSION['CompletedLessons'] = array();
?>
<div class="wrap">
	<div class="content two-col">
		<div class="main-col island">
			<h1>Hi, <?php get_user_fname() ?>!</h1>
			<p>Welcome to your dashboard! From here, you can view available challenges, retake challenges you&rsquo;ve previously completed, and get an overview of your profile.</p>
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
