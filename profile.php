<?php 
	$verify = false;
	$isAdmin = false;
	
	require_once('inc/header.php');
	is_logged_in();
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
                	<img src="<?php get_full_profile_pic($profileID)?>" class="profile-pic">
                </div>
            	<div class="unit two-of-three">
                	<h2>I am using Gateway to learn skills in...</h2>
                    <ul>
                    	<?php decode_array($user_details['userSpecialisation']);
							$i = 0;
							while ($i < count($arrayResult)){
								?><li><?php echo ucwords(get_specialisation($arrayResult[$i]))?> </li> <?php
								$i++;
							}
						?>
                        
                    </ul>
                </div>
                <div class="unit span-grid">
                	<h2>Here is my progress so far...</h2>
                    <?php get_completed_modules($profileID) ?>
                </div>
            </div>
		</div>
		<div class="sidebar secondary-col island">
        <?php if(isset($_SESSION['UserID']) && $_SESSION['UserID'] == $profileID) {?>
        	<h3>This is your profile</h3>
            <p>You can share this profile with people by sending them this URL:</p>
            <a href="profile.php?ID=<?php echo $profileID?>">http://www.gateway-learning.com/profile.php?ID=<?php echo $profileID?></a>
            <p>You can also print your profile out and show it as a record of your achievements</p>
            <a href="javascript:window.print()" class="butt butt-primary">Print</a>
        <?php } ?>
		</div>
	</div>
</div>
<?php
	require_once('inc/footer.php');
?>