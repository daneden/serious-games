<?php
	$isAdmin = true;
	$verify = true;
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
						<td><a href="/profile.php?ID=<?php echo $result['userID'] ?>" title="View <?php echo $result['userFName'] ?>'s profile"><?php echo $result['userFName'] ?> <?php echo $result['userSName']?></a></td>
						<td><?php echo $result['userEmail'] ?></td>
                        <td><?php if($result['userIsAdmin'] == 0){?><a href="inc/php/promote_user.php?id=<?php echo $result['userID'] ?>">Make Admin</a><?php } else {?> <a href="inc/php/demote_user.php?id=<?php echo $result['userID'] ?>">Remove Admin</a><?php } ?></td>
						<td><a class="message-danger" href="inc/php/delete_user.php?id=<?php echo $result['userID'] ?>">Delete</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>
