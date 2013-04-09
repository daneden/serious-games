<?php
	$isAdmin = true;
	require_once('../inc/db/connect.php');
	require_once('../inc/globals/functions.php');
	require_once('inc/php/functions.php');
	verify_user();
	verify_admin();
	require_once('../inc/header.php');	
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar secondary-col">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>Create New Category</h1>
            <p>This page allows you to create a new category. Simply type in the name of the category and optionally which category needs to be completed to activate it, and you&rsquo;re done!</p>
            <form class="form" action="inc/php/create_new_category.php" method="post">
                <label for="category-name">Category Name</label>
                <input type="text" class="input" name="category-name">
                <label for="category-description">Category Description</label>
                <textarea class="input" name="category-description"></textarea>
                <label for="prerequisite-category">Prerequisite Category</label>
                <select class="input" name="prerequisite-category">
                	<option value="0">None</option>
                	<?php fetch_categories(); ?>
                </select>
                <label for="score">Score needed to unlock</label>
                <input type="text" class="input" name="score">
                <p class="helper">Enter a number as a percentage (without the %) - This box should be empty if no prerequisite is selected.</p>
<label class="unit span-grid" for="specialisation">Specialisation</label>
						<p class="helper unit span-grid">Leave blank to be a general recommendation.</p>
                        <div class="p">                    
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" id="accounting" value="accounting"><label for="accounting" class="in">Accounting & Finance</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" id="administration" value="administration"><label for="administration" class="in">Administration</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" value="education" id="education"><label for="education" class="in">Education</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" value="engineering" id="engineering"><label for="engineering" class="in">Engineering</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" value="health" id="health"><label for="health" class="in">Health & Beautry</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" value="human"><label for="human" class="in">Human Resources</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" value="industrial" id="industrial"><label for="industrial" class="in">Industrial</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" value="maintenance" id="maintenance"><label for="maintenance" class="in">Maintenance</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" value="science" id="science"><label for="science" class="in">Science & Technology</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" value="social" id="social"><label for="social" class="in">Social Services</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" value="teaching" id="teaching"><label for="teaching" class="in">Teaching</label></span>
                            <span class="unit one-of-three"><input type="checkbox" class="checkbox" name="specialisation[]" value="transport" id="transport"><label for="transport" class="in">Transport</label></span>
                    </div>
                <input type="submit" value="Submit" class="butt butt-primary alignright" name="submit" id="submit">
            </form>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>