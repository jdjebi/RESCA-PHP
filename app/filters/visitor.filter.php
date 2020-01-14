<?php 
// Si le membres est connecté on le redirige vers la page d'acceuil des membres

require_once "urls.php";

if (isset($_SESSION["user"]["connected"])){

	if ($_SESSION['user']['is_admin'] == False)
		header("Location:".$MEMBER_HOME_PAGE);

	else if ($_SESSION['user']['is_admin'] == True)
		header("Location:".$ADMIN_PAGE);

	exit();
}

?>
