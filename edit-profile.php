<?php
	require_once('inc/db/connect.php');
	require_once('inc/globals/functions.php');
	verify_user();
	decode_array($userDetails['userSpecialisation']);
require_once('inc/header.php'); ?>
<div class="wrap">
	<div class="content two-col">
		<div class="main-col island">
			<h1>Edit Profile</h1>
			<form action="/inc/globals/edit-profile.php" enctype="multipart/form-data" method="post">
				<div class="grid">
					<div class="unit one-of-three">
                    	<img src="<?php get_profile_pic() ?>" class="profile-pic"/>
                    </div>
                    <div class="unit two-of-three">
                    	<label for="profile-pic">Profile Picture</label>
                        <p class="helper">Maximum file size: 1MB</p>
                        <input type="file" class="input" name="profile-pic" id="profile-pic"/>
                        <?php if (isset($_GET['errors']) && $_GET['errors'] == 1){ ?><p class="helper message-error">File size is too big. Please try again.</p><?php } ?>
                        <?php if (isset($_GET['errors']) && $_GET['errors'] > 1){ ?><p class="helper message-error">Error uploading image. Please try again.</p><?php } ?>
                    </div>
                    <hr class="unit span-grid">
					<div class="unit one-of-two">
						<label for="first-name">First Name</label>
						<input type="text" class="input" name="first-name" value="<?php get_user_fname(); ?>" id="first-name">
					</div>
					<div class="unit one-of-two">
						<label for="last-name">Last Name</label>
						<input type="text" class="input" value="<?php get_user_sname(); ?>" name="last-name" id="last-name">
					</div>
					<div class="unit one-of-two ">
						<label for="email">Email Address</label>
						<input type="email" class="input" value="<?php echo (get_user_email()); ?>" name="email" id="email">
					</div>
                    <div class="unit span-grid">
                        <p class="helper">We need your email address in order for you to sign in to Gateway, and in case we need to contact you. We’ll never send you spam or give this information to third party services without your permission.</p>
                    </div>
					<hr class="unit span-grid">
                    <div class="unit one-of-two p">
                    	<label for="language">Language</label>
                        <p class="helper">Please select your native language.</p>
                    	<select class="input dropdown" name="language">
                            <option <?php compare_language('albanian') ?> value="albanian">Albanian</option>
                            <option <?php compare_language('arabic') ?> value="arabic">Arabic</option>
                            <option  <?php compare_language('bengali') ?>  value="bengali">Bengali</option>
                            <option  <?php compare_language('creole') ?>  value="creole">Creole Malay</option>
                            <option  <?php compare_language('dari') ?>  value="dari">Dari</option>
                            <option  <?php compare_language('english') ?>  value="english">English</option>
                            <option  <?php compare_language('farsi') ?>  value="farsi">Farsi</option>
                            <option  <?php compare_language('french') ?>  value="french">French</option>
                            <option  <?php compare_language('georgian') ?>  value="georgian">Georgian</option>
                            <option  <?php compare_language('german') ?>  value="german">German</option>
                            <option  <?php compare_language('hausa') ?>  value="hasua">Hausa</option>
                            <option  <?php compare_language('igbo') ?>  value="igbo">Igbo</option>
                            <option  <?php compare_language('igrinya') ?>  value="igrinya">Igrinya</option>
                            <option  <?php compare_language('indo-portuguese') ?>  value="indo-portuguese">Indo-Portuguese</option>
                            <option  <?php compare_language('italian') ?>  value="italian">Italian</option>
                            <option  <?php compare_language('kurdish') ?>  value="kurdish">Kurdish</option>
                            <option  <?php compare_language('lingala') ?>  value="lingala">Lingala</option>
                            <option  <?php compare_language('ndebele') ?>  value="ndebele">Ndebele</option>
                            <option  <?php compare_language('pashto') ?>  value="pashto">Pashto</option>
                            <option  <?php compare_language('persian') ?>  value="persian">Persian</option>
                            <option  <?php compare_language('polish') ?>  value="polish">Polish</option>
                            <option  <?php compare_language('portuguese') ?>  value="portuguese">Portuguese</option>
                            <option  <?php compare_language('russian') ?>  value="russian">Russian</option>
                            <option  <?php compare_language('shona') ?>  value="shona">Shona</option>
                            <option  <?php compare_language('sinhala') ?>  value="sinhala">Sinhala</option>
                            <option  <?php compare_language('somali') ?>  value="somali">Somali</option>
                            <option  <?php compare_language('swahili') ?>  value="swahili">Swahili</option>
                            <option  <?php compare_language('tamil') ?>  value="tamil">Tamil</option>
                            <option  <?php compare_language('tigringa') ?>  value="tigringa">Tigringa</option>
                            <option  <?php compare_language('turkish') ?>  value="turkish">Turkish</option>
                            <option  <?php compare_language('urdu') ?>  value="urdu">Urdu</option>
                            <option  <?php compare_language('vedah') ?>  value="vedah">Vedah</option>
                            <option  <?php compare_language('yoruba') ?>  value="yoruba">Yoruba</option>
                        </select>
                    </div>                    
					<hr class="unit span-grid">
                    <div class="unit grid">
                    	<label class="unit span-grid" for="specialisation">Specialisation</label>
						<p class="helper unit span-grid">Specialisations help us to help you choose which modules to take in order to get the most out of Gateway.</p>
                        <div class="p">                    
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" <?php check_specialisation('accounting',$arrayResult) ?> id="accounting" value="accounting"><label for="accounting" class="in">Accounting & Finance</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" <?php check_specialisation('administration',$arrayResult) ?> id="administration" value="administration"><label for="administration" class="in">Administration</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" <?php check_specialisation('education',$arrayResult) ?> value="education" id="education"><label for="education" class="in">Education</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" <?php check_specialisation('engineering',$arrayResult) ?> value="engineering" id="engineering"><label for="engineering" class="in">Engineering</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" <?php check_specialisation('health',$arrayResult) ?> value="health" id="health"><label for="health" class="in">Health & Beautry</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" <?php check_specialisation('human',$arrayResult) ?> value="human"><label for="human" class="in">Human Resources</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" <?php check_specialisation('industrial',$arrayResult) ?> value="industrial" id="industrial"><label for="industrial" class="in">Industrial</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" <?php check_specialisation('maintenance',$arrayResult) ?> value="maintenance" id="maintenance"><label for="maintenance" class="in">Maintenance</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" <?php check_specialisation('science',$arrayResult) ?> value="science" id="science"><label for="science" class="in">Science & Technology</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" <?php check_specialisation('social',$arrayResult) ?> value="social" id="social"><label for="social" class="in">Social Services</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" <?php check_specialisation('teaching',$arrayResult) ?> value="teaching" id="teaching"><label for="teaching" class="in">Teaching</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" <?php check_specialisation('transport',$arrayResult) ?> value="transport" id="transport"><label for="transport" class="in">Transport</label></span>
                        </div>
                    </div>
                    <hr class="unit span-grid">
					<div class="unit span-grid">
                    	<input type="hidden" value="<?php echo $userDetails['userID'] ?>" name="userID" />
                        <a class="alignleft helper message-error" href="javascript:document.deleteAccount.submit()">Delete your account</a>
                        <a href="/" title="Cancel and go home" class=" alignright butt">Cancel</a>
						<input class="alignright butt butt-primary submit" type="submit" value="Save Changes">
					</div>
				</div>
			</form>
            <form method="post" name="deleteAccount" action="inc/globals/delete-acc.php">
            	<input type="hidden" value="<?php echo $userDetails['userID'] ?>" name="userID" />
            </form>                
		</div>
	</div>
</div>
<?php require_once('inc/footer.php'); ?>
