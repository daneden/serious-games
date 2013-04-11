<?php
	session_start();
	error_reporting(0);
	if(isset($_SESSION['UserID'])){
		require_once('inc/db/connect.php');
		require_once('inc/globals/functions.php');		
		verify_user();
	}
	require_once('inc/header.php');
?>
<div class="wrap">
	<div class="content two-col">
		<div class="main-col island">
			<h1>Permission Denied</h1>
			<p>Hmm, you don’t have permission to view that page directly.</p>
			<p>Try going <a href="/">back home</a>. If you keep having trouble, try contacting us at <a href="mailto:support@gateway-learning.com">support@gateway-learning.com</a>.
		</div>
		<div class="sidebar secondary-col island">
			
		</div>
	</div>
</div>
<?php require_once('inc/footer.php'); ?>