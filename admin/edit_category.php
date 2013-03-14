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
		<div class="sidebar bordered-col secondary-col island">
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
                <input type="hidden" name="category-id" value="<?php echo $category['categoryID'] ?>">
                <input type="submit" value="Submit" class="butt butt-primary alignright" name="submit" id="submit">
            </form>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>