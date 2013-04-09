<?php
	$isAdmin = true;
	require_once('../inc/db/connect.php');
	require_once('../inc/globals/functions.php');
	require_once('inc/php/functions.php');
	verify_user();
	verify_admin();
	$categoryID = $_GET['cID'];
	$getCategory = mysql_query('SELECT * FROM categorytable WHERE categoryID = "'.$categoryID.'"');
	$category = mysql_fetch_assoc($getCategory);
	$getPreReq = mysql_query('SELECT * FROM lessonprerequisitetable WHERE prereqUnlocksID = "'.$categoryID.'"');
	$preReq = mysql_fetch_assoc($getPreReq);
	require_once('../inc/header.php');	
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar secondary-col">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>Edit Category</h1>
            <p>This page allows you to create a new category, simply type in the name of the category and optionally which category needs to be completed to activate it and you're done!</p>
            <form class="form" action="inc/php/edit_category.php" method="post">
                <label for="category-name">Category Name</label>
                <input type="text" class="input" value="<?php echo $category['categoryTitle']?>" name="category-name">
                <label for="category-description">Category Description</label>
                <textarea class="input" name="category-description"><?php echo $category['categoryDescription']?></textarea>                
                <label for="prerequisite-category">Prerequisite Category</label>
                <select class="input" name="prerequisite-category">
                	<option value="0">None</option>
                	<?php fetch_categories(); ?>
                </select>
                <label for="score">Score needed to unlock</label>
                <input type="text" class="input" value="<?php echo $preReq['prereqScore']?>" name="score">
                <p class="helper">Enter a number as a percentage (without the %) - This box should be empty if no prerequisite is selected.</p>
<div class="unit grid">
						<?php decode_array($category['categorySpecialisation']); ?>
                    	<label class="unit span-grid" for="specialisation">Specialisation</label>
						<p class="helper unit span-grid">Leave blank to be a general recommendation.</p>
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
                <label for="category-state">Category State</label>
                <select class="input" name="category-state">
                	<option <?php if($category['categoryState'] == 0){?>selected="selected"<?php } ?> value="0">Draft</option>
                    <option <?php if($category['categoryState'] == 1){?>selected="selected"<?php } ?> value="1">Published</option>
                </select>
                <input type="hidden" name="category-id" value="<?php echo $category['categoryID'] ?>">
                <input type="submit" value="Submit" class="butt butt-primary alignright" name="submit" id="submit">
            </form>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>