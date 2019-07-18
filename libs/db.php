<?php
	// This file includes credentials for the database connection
	require "secrets.php";
	$db = new mysqli("127.0.0.1", $db_user, $db_pass, "IntraPool");
?>
