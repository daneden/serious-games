<?php

function fetch_categories() {
	global $lessonID, $lesson, $categoryID;
	$getCategories = mysql_query('SELECT * FROM categorytable');
	while ($categories = mysql_fetch_assoc($getCategories)){
		echo '<option value="'.$categories['categoryID'].'"';
		if (isset($lessonID)) {
				if ($lesson['lessonCategoryID'] == $categories['categoryID']){
					echo 'selected="selected"';
				} else {
					
				}
		}
		if (isset($categoryID)) {
				$getPreReq = mysql_query('SELECT * FROM lessonprerequisitetable WHERE prereqUnlocksID = "'.$categoryID.'"');
				$PreReq = mysql_fetch_assoc($getPreReq);
				if ($PreReq['prereqCategoryID'] == $categories['categoryID']){
					echo 'selected="selected"';
				} else {
					
				}
		}		
		echo '>'.$categories['categoryTitle'].'</option>';
	}
}


?>