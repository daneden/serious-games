<?php $verify = false; $isAdmin = false; require_once('inc/header.php');
?>

<div class="wrap">
	<div class="home-hero island">
		<div class="hero-intro">
			<h1>Login to Gateway</h1>
		</div>
	</div>
	<div class="content two-col">
		<div class="main-col island">
			<p>Please enter your login details into the boxes below.</p>
            <form action="/inc/globals/login.php" method="post">
            	<div class="grid">
                    <div class="unit one-of-two">
                    	<?php errors() ?>
                        <label for="email-address">Email Address</label>
                        <input class="input" type="text" name="email-address" value="">
                        <label for="password">Password</label>
                        <input class="input" type="password" name="password" value="">
                        <input class="butt butt-primary submit" type="submit" value="Login">
                    </div>                
                </div>
            </form>
		</div>
		<div class="secondary-col island">
			<p>Need an account? <a href="/signup.php">Sign up</a> now.</p>
		</div>
	</div>
</div>
<?php require_once('inc/footer.php'); ?>