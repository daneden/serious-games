<?php
	$isAdmin = true;
	require_once('../inc/db/connect.php');
	require_once('../inc/globals/functions.php');
	verify_user();
	verify_admin();	
	require_once('../inc/header.php');	
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar secondary-col">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>Users</h1>
			<p>Welcome to the Users Page. From here, you can delete users, or promote registered users to administrators.</p>
			<table class="table zebra admin-user-list">
				<thead>
					<tr>
						<th>#</th>
						<th>User Name</th>
						<th>Email</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query=mysql_query("SELECT * FROM usertable");
					while ($result = mysql_fetch_assoc($query)) {
					?>
					<tr>
						<td><?php echo $result['userID'] ?></td>
						<td><?php echo $result['userFName'] ?> <?php echo $result['userSName']?></td>
						<td><?php echo $result['userEmail'] ?></td>
						<td><a class="message-danger" href="delete_module.php?id=">Delete</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>
