<?php require_once('inc/header.php'); ?>
<div class="wrap">
	<div class="home-hero island">
		<div class="hero-intro">
			<h1>Welcome to Gateway</h1>
			<p class="intro"><strong>Gateway</strong> is a website for learning the vocational skills you need to find a job. Start learning today.</p>
			<p><a class="butt butt-primary butt-big" href="/signup.php">Sign Up Now</a></p>
		</div>
	</div>
	<div class="content two-col">
		<div class="main-col island">
			<img src="/assets/images/home-clock@2x.png" width="128" alt="Learn on your own time" class="alignright">
			<h2>Learn In Your Own Time</h2>
			<p><em>Gateway is designed to work around you.</em> You choose the kind of work you’re interested in, and the Gateway content creators will make sure that you get the learning materials you need.</p>
			<p>Take online quizzes and classes in <em>your</em> own time, check your progress, and unlock more advanced stages to help you understand the British workplace, and give you the tools you need to succeed.</p>
			<hr>
			<img src="/assets/images/home-info@2x.png" width="128" alt="Get the information you need" class="alignright">
			<h2>Serving Suggestions</h2>
			<p>Gateway works best when coupled with other learning resources. That&rsquo;s why our quizzes will point you in the right direction to other websites where further information can be found, and you can learn even more.</p>
			<hr>
			<img src="/assets/images/home-travel@2x.png" width="128" alt="Learn wherever you are" class="alignright">
			<h2>Learn On The Go</h2>
			<p>At home, at the library, or on the bus; Gateway helps you learn anywhere you are, whether you’re at a computer or browsing the web on your phone. Gateway also makes it easy for you to pick up where you left off, keeping track of the quizzes you’ve already completed.</p>
			<hr>
			<h2>Start Learning Today</h2>
			<p>Why wait any longer? <a href="/signup.php">Sign up</a> for a free account today &ndash; it only takes a minute.</p>
		</div>
		<div class="sidebar secondary-col island">
			<h2>Login</h2>
			<form action="inc/globals/login.php" method="post">
					<label for="email-address">Email Address</label>
					<input class="input" type="text" name="email-address" value="">
					<label for="password">Password</label>
					<input class="input" type="password" name="password" value="">
					<input class="butt butt-primary p submit alignright" type="submit" value="Login">
			</form>
			<hr>
			<p class="helper">Need an account? <a href="signup.php">Sign up now</a>.</p>
		</div>
	</div>
</div>
<?php require_once('inc/footer.php'); ?>
