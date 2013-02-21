<?php
	$isAdmin = true;
	require_once('../inc/header.php');
	require_once('../inc/db/connect.php');
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar bordered-col secondary-col island">
			<h2>Page Designs</h2>
			<ul>
				<li><a href="/dashboard.php">Dashboard</a></li>
				<li><a href="/signup.php">Signup</a></li>
				<li><a href="/lesson.php">Lesson</a></li>
				<li><a href="/styleguide.php">Styleguide</a></li>
			</ul>
		</div>
		<div class="main-col island">
			<h1>Modules</h1>
			<p>Welcome to the Modules Page! From here, you view the current modules and edit existing ones, remove modules and more.</p>
			
			
			
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>