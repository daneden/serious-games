<?php
	$isAdmin = true;
	require_once('../inc/header.php');
	require_once('../inc/db/connect.php');
	require_once('../inc/globals/functions.php');
	verify_user();
	verify_admin();
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar bordered-col secondary-col island">
			<h2>Admin Menu</h2>
			<ul>
				<li><a href="modules.php">Modules</a>
                	<ul>
                    	<li><a href="create_module.php">Create Module</a></li>
                    </ul>
                </li>
				<li><a href="users.php">Users</a></li>
				<li><a href="styleguide.php">Styleguide</a></li>
			</ul>
		</div>
		<div class="main-col island">
			<h1>Hi there, <?php get_user_fname(); ?>!</h1>
			<p>Welcome to the admin dashboard! From here, you can add new challenges and edit existing ones, remove users and more</p>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>