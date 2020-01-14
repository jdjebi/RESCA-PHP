<?php 
	require_once 'config/defines.php';

	function login_member(){
		$_SESSION["user"]["connected"] = True;
		$_SESSION['user']['is_admin'] = False;
	}

	function login_admin(){
		$_SESSION["user"]["connected"] = True;
		$_SESSION['user']['is_admin'] = True;
	}

	// Effectue un redirection sur la page spécifiée
	function redirect($page){
		header("Location:$page");
		exit();
	}


	// Foncion permettent d'echapper les caractères	
	function e($string){
		if($string){
			return htmlspecialchars($string);
		}
	}
?>