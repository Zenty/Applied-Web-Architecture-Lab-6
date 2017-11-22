<?php
 	include('config.php'); 

	if(isset($_SESSION['user'])) {
		session_unset();
		session_destroy();
		header("Location: ./index.php");
	} else {
		header("Location: ./index.php");
	}
?>