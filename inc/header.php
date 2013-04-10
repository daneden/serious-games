<?php
	require_once('/db/connect.php');
	require_once('/globals/functions.php');
	if ($verify == true){verify_user();}
	if ($isAdmin == true){verify_admin();require_once('inc/php/functions.php');};
?>
<!DOCTYPE html>
<html lang="en"<?php if (isset($isAdmin) && ($isAdmin === true)): ?> class="admin-area"<?php endif; ?>>
<head>
	<meta charset="utf-8">
	<title>Gateway</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="google-translate-customization" content="1ea44196f56d88fe-e92cbb062515f7b8-g5809ad459861694e-14"></meta>
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/prism.css">
	<link rel="shortcut icon" href="/assets/images/favicon.png">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if lt IE 8]>
	<script src="/assets/js/pngFix.jquery.js"></script>
	<![endif]-->
	<script type="text/javascript" src="//use.typekit.net/cnh2osh.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>
<body>
<header class="site-header">
	<div class="wrap isle cf">
		<a href="<?php if(isset($_SESSION['UserID']) && !isset($isAdmin)){?>/dashboard.php<?php } else if(isset($_SESSION['UserID']) && isset($isAdmin)){?>/admin<?php } else {?>/<?php } ?>" title="Gateway Home" class="site-title">
			<?php if (isset($isAdmin) && ($isAdmin === true)) { ?>
				<img width="165" height="34" src="/assets/images/admin-site-logo@2x.png" alt="Gateway logo">
			<?php } else { ?>
				<img width="132" height="34" src="/assets/images/site-logo@2x.png" alt="Gateway logo">
			<?php } ?>
		</a>
		<?php if(isset($_SESSION['UserID'])){ ?>
		<nav class="isle user-nav">
			<a class="user-link" href="/dashboard.php">
				<span class="user-name"><?php get_user_fname(); ?> <?php get_user_sname(); ?></span>
				 <figure class="navatar">
					<img src="<?php get_profile_pic() ?>" width="32" height="32">
				</figure>
			</a>
			<button class="user-nav-toggle" title="Toggle Menu">Toggle Menu</button>
			<ul class="user-nav-items">
            	<?php if($isAdmin == true && $_SESSION['AdminState'] == 1) { ?><li><a class="isle" href="/dashboard.php">Switch to Front End</a></li><?php } else if ($isAdmin == 0 && $_SESSION['AdminState'] == 1){?>
                <li><a class="isle" href="/admin">Switch to Back End</a></li><?php } ?>
				<li><a class="isle" href="/edit-profile.php">Edit Profile</a></li>
				<li><a class="isle" href="/logout.php">Log Out</a></li>
			</ul>
		</nav>
		<?php } else { ?>
		<form action="inc/globals/login.php" class="alignright header-login" method="post">
			<label class="visually-hidden" for="email-address">Email Address</label>
			<input class="input in" type="text" placeholder="Email Address" name="email-address" value="">
			<label class="visually-hidden" for="password">Password</label>
			<input class="input in" type="password" placeholder="Password" name="password" value="">
			<input class="butt butt-primary p submit" type="submit" value="Login">
		</form>
		<?php } ?>
	</div>
</header>
