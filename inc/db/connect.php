<?php
	if ( file_exists( dirname( __FILE__ ) . 'inc/db/connect-local.php' ) ) {	
		require_once dirname(__FILE__) . 'inc/db/connect-local.php';
		define( 'WP_LOCAL_DEV', true);
	} else {
		$DB_hostname = "localhost";
		$DB_username = "root";
		$DB_password = "blahblah";
		$DB_database = "gateway";
		$DB_connect = mysql_pconnect($DB_hostname, $DB_username, $DB_password);
		mysql_select_db($DB_database, $DB_connect);	
	}
?>