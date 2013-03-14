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
		<div class="sidebar bordered-col secondary-col island">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>Categories</h1>
			<p>Welcome to the Categories Page! From here, you view the current categories and edit existing ones.</p>
			<table class="table zebra admin-categories-list">
				<thead>
					<tr>
						<th>Category Name</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query=mysql_query("SELECT * FROM categorytable");
					while ($result = mysql_fetch_assoc($query)) {
					?>
							<td><a href="edit_category.php?cID=<?php echo $result['categoryID'] ?>"><?php echo $result['categoryTitle'] ?></a></td>
							<td><a class="message-danger" href="inc/php/delete_category.php?Cid=<?php echo $result['categoryID']?>">Delete</a></td>
					<?php } ?>
				</tbody>
			</table>
			<a class="alignright butt butt-primary" href="create_category.php">Create Category</a>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>
