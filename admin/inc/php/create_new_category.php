<?php
	require_once('../../../inc/db/connect.php');
	$categoryName = mysql_real_escape_string($_POST['category-name']);
	$categoryDescription = mysql_real_escape_string($_POST['category-description']);
	$prerequisiteCategoryID = $_POST['prerequisite-category'];
	$score = $_POST['score'];
	$createNewCategory = mysql_query('INSERT INTO categorytable (categoryID, categoryTitle, categoryDescription) VALUES ( NULL, "'.$categoryName.'","'.$categoryDescription.'")');
	$categoryID = mysql_insert_id();
		$addPrequisite = mysql_query('INSERT INTO lessonprerequisitetable (prereqID, prereqCategoryID, prereqUnlocksID, prereqScore) VALUES ( NULL, "'.$prerequisiteCategoryID.'","'.$categoryID.'","'.$score.'")');
	header('location:../../categories.php');
?>