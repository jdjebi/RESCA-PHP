<?php 
	session_start();

	require "app/auth.php";

	logout();
	
	redirect("index.php");
?>