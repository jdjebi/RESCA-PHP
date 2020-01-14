<?php 
	session_start();

	require "config/defines.php";

	require "app/utils.php";
	require "app/filters/visitor.filter.php";
	require "app/notif.php";

	require "views/index.view.php";
?>