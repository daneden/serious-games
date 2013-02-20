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
                    <div class="unit grid">
                    	<label class="unit span-grid" for="specialisation">Specialisation</label>
						<p class="helper unit span-grid">Specialisations help us to help you choose which modules to take in order to get the most out of Gateway.</p>
                        <div class="p">                    
                            <span class="unit one-of-three"><input type="checkbox" name="specialisation" id="accounting" value="accounting"><label for="accounting" class="in">Accounting & Finance</label></span>
                            <span class="unit one-of-three"><input type="checkbox" name="specialisation" id="administration" value="administration"><label for="administration" class="in">Administration</label></span>
                            <span class="unit one-of-three"><input type="checkbox" name="specialisation" value="education" id="education"><label for="education" class="in">Education</label></span>
                            <span class="unit one-of-three"><input type="checkbox" name="specialisation" value="engineering" id="engineering"><label for="engineering" class="in">Engineering</label></span>
                            <span class="unit one-of-three"><input type="checkbox" name="specialisation" value="health" id="health"><label for="health" class="in">Health & Beautry</label></span>
                            <span class="unit one-of-three"><input type="checkbox" name="specialisation" value="human"><label for="human" class="in">Human Resources</label></span>
                            <span class="unit one-of-three"><input type="checkbox" name="specialisation" value="industrial" id="industrial"><label for="industrial" class="in">Industrial</label></span>
                            <span class="unit one-of-three"><input type="checkbox" name="specialisation" value="maintenance" id="maintenance"><label for="maintenance" class="in">Maintenance</label></span>
                            <span class="unit one-of-three"><input type="checkbox" name="specialisation" value="science" id="science"><label for="scienceg" class="in">Science & Technology</label></span>
                            <span class="unit one-of-three"><input type="checkbox" name="specialisation" value="social" id="social"><label for="social" class="in">Social Services</label></span>
                            <span class="unit one-of-three"><input type="checkbox" name="specialisation" value="teaching" id="teaching"><label for="teaching" class="in">Teaching</label></span>
                            <span class="unit one-of-three"><input type="checkbox" name="specialisation" value="transport" id="transport"><label for="transport" class="in">Transport</label></span>
                        </div>
                    </div>
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