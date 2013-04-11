<?php $verify = false; $isAdmin = false; require_once('inc/header.php'); ?>
<?php if(is_logged_in()) {
	header("Location:/dashboard.php");
} else { ?>
<div class="wrap">
	<div class="home-hero island">
		<div class="hero-intro">
			<h1>Welcome to Gateway</h1>
			<p class="intro"><strong>Gateway</strong> is a website for learning the vocational skills you need to find a job. Start learning today.</p>
			<p><a class="butt butt-primary butt-big" href="/signup.php">Sign Up Now</a></p>
		</div>
	</div>
	<div class="content">
		<div class="island">
			<p class="intro">Take online quizzes and classes in your own time, check your progress, and unlock more advanced stages to help you understand the British workplace, and give you the tools you need to succeed.</p>
			<hr>
			<div class="landing-promo grid">
				<div class="unit one-of-three">
					<img src="/assets/images/home-clock@2x.png" width="128" alt="Learn on your own time">
					<h4>Learn In Your Own Time</h4>
					<p>Gateway is designed to work around you. You choose the kind of work you’re interested in, and the Gateway content creators will make sure that you get the learning materials you need.</p>
				</div>
				<div class="unit one-of-three">
					<img src="/assets/images/home-info@2x.png" width="128" alt="Get the information you need">
					<h4>Serving Suggestions</h4>
					<p>Gateway works best when coupled with other learning resources. That&rsquo;s why our quizzes will point you in the right direction to other websites where further information can be found, and you can learn even more.</p>
				</div>
				<div class="unit one-of-three">
					<img src="/assets/images/home-travel@2x.png" width="128" alt="Learn wherever you are">
					<h4>Learn On The Go</h4>
					<p>At home, at the library, or on the bus; Gateway helps you learn anywhere you are, whether you’re at a computer or browsing the web on your phone. Gateway also makes it easy for you to pick up where you left off, keeping track of the quizzes you’ve already completed.</p>
				</div>
			</div>
			<hr>
			<div class="promo">
				<h2>Start Learning Today</h2>
				<p>Why wait any longer? Sign up for a free account today &ndash; it only takes a minute.</p>
				<p><a class="butt butt-big butt-primary" href="/signup.php">Sign Up</a> <a class="butt butt-big" href="/login.php">Log In</a></p>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php require_once('inc/footer.php'); ?>
