<?php require_once('inc/header.php'); ?>
<div class="wrap">
	<div class="content two-col">
		<div class="main-col island">
			<h1>Sign Up</h1>
			<p>Hi there! You&rsquo;re only a few minutes away from learning the vocational skills you need to get a job. Complete the form below and we&rsquo;ll do the rest.</p>
			<form class="signup-form island" action="/signup.php" method="post">
				<div class="grid">
					<div class="unit one-of-two">
						<label for="first-name">First Name</label>
						<input type="text" class="input" name="first-name" id="first-name">
					</div>
					<div class="unit one-of-two">
						<label for="last-name">Last Name</label>
						<input type="text" class="input" name="last-name" id="last-name">
					</div>
					<div class="unit one-of-two p">
						<label for="email">Email Address</label>
						<input type="email" class="input" name="email" id="email">
					</div>
					<hr class="unit span-grid">
					<div class="unit one-of-two">
						<label for="password">Password</label>
						<input type="password" class="input" name="password" id="password">
					</div>
					<div class="unit one-of-two">
						<label for="confirm-password">Confirm Password</label>
						<input type="password" class="input" name="confirm-password" id="confirm-password">
					</div>
					<p class="helper unit span-grid">Your password must be at least 8 characters long, with at least one digit.</p>
					<hr class="unit span-grid">
					<div class="unit span-grid">
						<input class="alignright butt butt-primary submit" type="submit" value="Sign Up">
					</div>
				</div>
			</form>
		</div>
		<div class="sidebar secondary-col island">
			<h2>Need some help?</h2>
			<p>Blah, blah, blah</p>
		</div>
	</div>
</div>
<?php require_once('inc/footer.php'); ?>