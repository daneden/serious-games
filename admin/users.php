<?php
	$isAdmin = true;
	require_once('../inc/header.php');
	require_once('../inc/db/connect.php');
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar bordered-col secondary-col island">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>Users</h1>
			<p>Welcome to the Users Page! From here, you can delete users, or promote registered users to administrators!</p>
			<h2>List of Users</h2>
            	<div class="grid">
				<?php
                $query=mysql_query("SELECT * FROM usertable");
                while ($result = mysql_fetch_assoc($query)) {
                ?>
                        <div class="unit one-of-three"><?php echo $result['userID'] ?> <?php echo $result['userFName'] ?> <?php echo $result['userSName']?></div>
                        <div class="unit one-of-three"><?php echo $result['userEmail'] ?>
                        </div>
                        <div class="unit one-of-three"><a class="alignright butt butt-danger submit" href="delete_module.php?id=">Delete</a></div>
                <?php } ?>
            </div>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>
