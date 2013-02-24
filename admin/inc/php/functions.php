<?php

function fetch_categories() {
	global $lessonID, $lesson;
	$getCategories = mysql_query('SELECT * FROM categorytable');
	while ($categories = mysql_fetch_assoc($getCategories)){
		echo '<option value="'.$categories['categoryID'].'"';
		if (isset($lessonID)) {
				if ($lesson['lessonCategoryID'] == $categories['categoryID']){
					echo 'selected="selected"';
				} else {
					
				}
		}
		echo '>'.$categories['categoryTitle'].'</option>';
	}
}

?>