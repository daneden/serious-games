<?php
	require_once('../../../inc/db/connect.php');
	$categoryName = mysql_real_escape_string($_POST['category-name']);
	$categoryDescription = mysql_real_escape_string($_POST['category-description']);
	$prerequisiteCategoryID = $_POST['prerequisite-category'];
	$score = $_POST['score'];
	$categorySpecialisation = mysql_real_escape_string(json_encode ($_POST['specialisation']));
	$createNewCategory = mysql_query('INSERT INTO categorytable (categoryID, categoryTitle, categoryDescription, categorySpecialisation) VALUES ( NULL, "'.$categoryName.'","'.$categoryDescription.'","'.$categorySpecialisation.'")');
	$categoryID = mysql_insert_id();
		$addPrequisite = mysql_query('INSERT INTO lessonprerequisitetable (prereqID, prereqCategoryID, prereqUnlocksID, prereqScore) VALUES ( NULL, "'.$prerequisiteCategoryID.'","'.$categoryID.'","'.$score.'")');
	header('location:../../categories.php');
?>