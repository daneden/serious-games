<?php
	require_once('../../../inc/db/connect.php');
	$categoryName = mysql_real_escape_string($_POST['category-name']);
	$categoryDescription = mysql_real_escape_string($_POST['category-description']);
	$prerequisiteCategoryID = $_POST['prerequisite-category'];
	$score = $_POST['score'];
	$categoryID = $_POST['category-id'];
	$categorySpecialisation = mysql_real_escape_string(json_encode ($_POST['specialisation']));
	$categoryState = $_POST['category-state'];
	$updateQuery = mysql_query("UPDATE categorytable SET categoryTitle ='$categoryName', categoryDescription = '$categoryDescription', categorySpecialisation = '$categorySpecialisation', categoryState = '$categoryState' WHERE categoryID = '$categoryID'");
	if($categoryID != $prerequisiteCategoryID) {
	$updateQuery = mysql_query("UPDATE lessonprerequisitetable SET prereqCategoryID = '$prerequisiteCategoryID', prereqScore = '$score' WHERE prereqUnlocksID = '$categoryID'");
	}
	header ('location:../../edit_category.php?cID='.$categoryID);
?>