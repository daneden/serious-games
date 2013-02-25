<?php
	require_once('../../../inc/db/connect.php');
	$categoryName = mysql_real_escape_string($_POST['category-name']);
	$prerequisiteCategoryID = $_POST['prerequisite-category'];
	$score = $_POST['score'];
	$createNewCategory = mysql_query('INSERT INTO categorytable (categoryID, categoryTitle) VALUES ( NULL, "'.$categoryName.'")');
	$categoryID = mysql_insert_id();
		$addPrequisite = mysql_query('INSERT INTO lessonprerequisitetable (prereqID, prereqCategoryID, prereqUnlocksID, prereqScore) VALUES ( NULL, "'.$prerequisiteCategoryID.'","'.$categoryID.'","'.$score.'")');
	header('location:../../categories.php');
?>