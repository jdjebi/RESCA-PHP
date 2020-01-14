<?php 
	session_start();

	require "config/defines.php";
	require "utils.php";
	require "urls.php";

	require "app/filters/member.filter.php";

	require "views/acceuil.view.php";
?>