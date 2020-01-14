<?php 
	session_start();

	require "config/defines.php";

	// Seul les visiteurs ont accès à la page
	require "app/filters/visitor.filter.php";
	require "app/utils.php";
	require "app/auth.php";


	if (isset($_POST["connect"]))
		$errors = login($_POST);

	require "views/connexion.view.php";
?>