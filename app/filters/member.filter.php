<?php
// Si le membres n'est pas connecté on le redirige vers la page de connexion
require_once "urls.php";

if (!(isset($_SESSION["user"]["connected"]) and $_SESSION["user"]["is_admin"] == False and $_SESSION["user"]["connected"] == True)){
	header("Location:".$LOGIN_PAGE);
	exit();
}
?>