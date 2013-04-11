<?php 
	$verify = true;
	$isAdmin = false;
	require_once('inc/header.php');
	$profileID = $_GET['ID'];
	$get_user_query = mysql_query("SELECT * FROM userTable WHERE userID = '$profileID'");
	$user_details = mysql_fetch_assoc($get_user_query);
?>
<div class="wrap">
	<div class="content two-col">
		<div class="main-col border-col island">
			<h1><?php echo $user_details['userFName']." ".$user_details['userSName']?></h1>
            <div class="grid">
            	<div class="unit one-of-three">
                	<img src="assets/profile-pics/<?php echo $user_details['userProfileImg'] ?>" class="profile-pic">
                </div>
            </div>
		</div>
		<div class="sidebar secondary-col island">
		</div>
	</div>
</div>
<?php
	require_once('inc/footer.php');
?>