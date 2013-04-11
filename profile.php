<?php 
	$verify = true;
	$isAdmin = false;
	require_once('inc/header.php');
	$profileID = $_GET['ID'];
	$get_user_query = mysql_query("SELECT * FROM usertable WHERE userID = '$profileID'");
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
            	<div class="unit two-of-three">
                	<h2>I am using Gateway to learn skills in...</h2>
                    <ul>
                    	<?php decode_array($user_details['userSpecialisation']);
							spec_array($arrayResult);
							$i = 0;
							while ($i < count($arrayResult)){
								?><li><?php echo ucwords($arrayResult[$i])?> </li> <?php
								$i++;
							}
						?>
                        
                    </ul>
                </div>
                <div class="unit span-grid">
                	<h2>Here is my progress so far...</h2>
                    <?php get_completed_modules() ?>
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