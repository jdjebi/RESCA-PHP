<?php 
	session_start();

	require "config/defines.php";
	
	require "app/utils.php";
	require "app/filters/visitor.filter.php";
	require "app/auth.php";

	$errors = [];
	$clear_data = [];

	if(isset($_POST['send'])){
		$form = register($_POST);
		$errors = $form["errors"];
		$clear_data = $form["clear_data"];
	}
	
	require "views/inscription.view.php";
?>