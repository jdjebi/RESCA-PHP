<?php 

	// Si l'admin n'est pas connecté on le redirige vers la page d'acceuil des membres

	require_once __DIR__."\..\..\config\defines.php";
	require_once __DIR__."\..\..\urls.php";

	if (!(isset($_SESSION["user"]["connected"]) and $_SESSION["user"]["is_admin"] == True and $_SESSION["user"]["connected"] == True)){
		$location = HTTP_HOST."\\".$MEMBER_HOME_PAGE;
		header("Location:$location");
		exit();
	}

?>