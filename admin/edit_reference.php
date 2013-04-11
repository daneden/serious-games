<?php
	$isAdmin = true;
	$verify = true;
	require_once('../inc/header.php');
	$referenceID = $_GET['Rid'];
	$getReference = mysql_query('SELECT * FROM referencetable WHERE referenceID = "'.$referenceID.'"');
	$reference = mysql_fetch_assoc($getReference);
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar secondary-col">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>New Reference</h1>
			<p>Here you can create a reference that will display at the end of a lesson for a learner to use as further reading.</p>
			<form action="inc/php/edit_reference.php" method="post" enctype="multipart/form-data">
            	<label for="reference-title">Reference Title</label>
                <input type="text" name="reference-title" value="<?php echo $reference['referenceTitle'];?>" class="input"/>
                <label for="reference-url">Reference URL</label>
                 <input type="text" name="reference-url" value="<?php echo $reference['referenceURL'];?>" class="input"/>
                <input type="submit" class="butt butt-primary alignright" value="Submit"/>
                <input type="hidden" name="reference-id" value="<?php echo $reference['referenceID'];?>" />
            </form>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>
