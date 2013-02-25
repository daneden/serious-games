<?php
	require_once('inc/header.php');
	require_once('inc/db/connect.php');
	require_once('inc/globals/functions.php');
	verify_user();
?>
<div class="wrap">
	<div class="content two-col">
		<div class="main-col island">
			<h1>Hi, <?php get_user_fname() ?>!</h1>
			<p>Welcome to your dashboard! From here, you can view available challenges, retake challenges you&rsquo;ve previously completed, and a load of other junk.</p>
			<ul class="challenges">
				<?php get_categories(); ?>
				<li class="island">
					<h2 class="standalone">Vocational Language</h2>
					<p class="desc">Introduction to vocational English language, common phrases, and more.</p>
					<ol class="sub-challenges">
						<li class="challenge-complete"><a href="#">Introduction</a></li>
						<li class="challenge-complete"><a href="#">Your First Interview</a></li>
						<li class="challenge-complete"><a href="#">Safety Training</a></li>
					</ol>
				</li>
			</ul>
		</div>
		<div class="sidebar secondary-col island">
			<h2>Profile Overview</h2>
			<h2><?php get_user_fname(); ?> <?php get_user_sname(); ?></h2>
		</div>
	</div>
</div>
<?php require_once('inc/footer.php'); ?>