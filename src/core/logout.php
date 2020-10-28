<?php
	session_start();
	
	session_destroy();		// Destroy the session

	// Redirect back to the login page.
	header('Location: ../index.php');
?>
