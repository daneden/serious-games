<!DOCTYPE html>
<html lang="en"<?php if (isset($isAdmin) && ($isAdmin === true)): ?> class="admin-area"<?php endif; ?>>
<head>
	<meta charset="utf-8">
	<title>Gateway</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/prism.css">
	<link rel="shortcut icon" href="/assets/images/favicon.png">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type="text/javascript" src="//use.typekit.net/cnh2osh.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>
<body>
<header class="site-header">
	<div class="wrap isle cf">
		<a href="/" title="Gateway Home" class="site-title">
			<?php if (isset($isAdmin) && ($isAdmin === true)) { ?>
				<img width="165" height="34" src="/assets/images/admin-site-logo@2x.png" alt="Gateway logo">
			<?php } else { ?>
				<img width="132" height="34" src="/assets/images/site-logo@2x.png" alt="Gateway logo">
			<?php } ?>
		</a>
		<?php if(isset($_SESSION['UserID'])){ ?>
		<nav class="isle user-nav">
			<a class="user-link" href="/user">
				<span class="user-name"><?php get_user_fname(); ?> <?php get_user_sname(); ?></span>
				 <figure class="navatar">
					<img src="http://0.gravatar.com/avatar/<?php echo md5(get_user_email());?>?s=64&d=identicon&r=R" width="32" height="32">
				</figure>
			</a>
			<button class="user-nav-toggle" title="Toggle Menu">Toggle Menu</button>
			<ul class="user-nav-items">
				<li><a class="isle" href="/edit-profile.php">Edit Profile</a></li>
				<li><a class="isle" href="/logout.php">Log Out</a></li>
			</ul>
		</nav>
		<?php } ?>
	</div>
</header>
