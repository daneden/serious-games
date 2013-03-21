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
			<h3>Profile Overview</h3>
			<img class="alignleft avatar" src="http://0.gravatar.com/avatar/<?php echo md5(get_user_email());?>?s=96&d=identicon&r=R" width="48" height="48">
			<p class="standalone"><strong><?php get_user_fname(); ?> <?php get_user_sname(); ?></strong></p>
			<p class="standalone"><a href="/edit-profile.php">Edit profile/settings</a></p>
			<hr>
		</div>
	</div>
</div>
<?php require_once('inc/footer.php'); ?>
