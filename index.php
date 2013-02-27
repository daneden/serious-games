<?php require_once('inc/header.php'); ?>
<div class="wrap">
	<div class="home-hero island">
		<div class="hero-intro">
			<h1>Welcome to Gateway</h1>
			<p class="intro"><strong>Gateway</strong> is a website for learning the vocational skills you need to find a job. Start now by <a href="signup.php">signing up</a>.</p>
		</div>
	</div>
	<div class="content two-col">
		<div class="main-col island">
			<h1>Login</h1>
			<p>Please enter your login details into the boxes below.</p>
            <form action="inc/globals/login.php" method="post">
            	<div class="grid">
                    <div class="unit one-of-two">
                        <label for="email-address">Email Address</label>
                        <input class="input" type="text" name="email-address" value="">
                        <label for="password">Password</label>
                        <input class="input" type="password" name="password" value="">
                        <input class="butt butt-primary submit" type="submit" value="Login">
                    </div>                
                </div>
            </form>
		</div>
		<div class="sidebar secondary-col island">
			<h2>Page Designs</h2>
			<ul>
				<li><a href="/dashboard.php">Dashboard</a></li>
				<li><a href="/signup.php">Signup</a></li>
				<li><a href="/lesson.php">Lesson</a></li>
				<li><a href="/styleguide.php">Styleguide</a></li>
			</ul>
		</div>
	</div>
</div>
<?php require_once('inc/footer.php'); ?>