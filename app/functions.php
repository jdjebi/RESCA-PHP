<?php
# $apte = isset($_SESSION['nom']);

function inscription(){
	global $db, $errors, $nom, $prenom, $ecole, $pays, $email, $promo, $password, $password_1;

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$ecole = $_POST['ecole'];
	$pays = $_POST['pays'];
	$email = $_POST['email'];
	$promo = $_POST['promo'];
	$password = $_POST['password'];
	$password_1 = $_POST['password_1'];


	if (empty($nom)) {
		array_push($errors, "Nom obligatoire");
	}
	if (empty($prenom)) {
		array_push($errors, "Prenom obligatoire");
	}
	if (empty($ecole)) {
		array_push($errors, "Ecole obligatoire");
	}
	if (empty($pays)) {
		array_push($errors, "Pays obligatoire");
	}
	if (empty($email)) {
		array_push($errors, "Email obligatoire");
	}
	if (empty($promo)) {
		array_push($errors, "Promo obligatoire");
	}
	if (empty($password)) {
		array_push($errors, "Mot de passe obligatoire");
	}else if ($password != $password_1) {
		array_push($errors, "Les deux mots de passe sont différents");
	}

	if (count($errors) == 0) {
	$pass = md5($password); //encrypt the password before saving in the database

		if (isset($_POST['role'])) {
			$role = $_POST['role'];
            $insertleader = $db->prepare("INSERT INTO leader (nom, prenom, role, ecole, pays, email, promo, password)  VALUES(?, ?, ?, ? ,? ,? ,? ,?)");
            $insertleader->execute(array($nom,$prenom, $role, $ecole, $pays, $email, $promo, $pass));
			$_SESSION['success']  = "Nouveau utilisateur crée avec succès!!";
			header('location: user.php');
		}else{
            $insertleader = $db->prepare("INSERT INTO leader (nom, prenom, role, ecole, pays, email, promo, password)  VALUES(?, ?, ?, ?, ?, ?, ?,?)");
            $insertleader->execute(array($nom,$prenom, 'user', $ecole, $pays, $email, $promo, $pass));
			header('location: ../form/connexion.php');
		}
	}
}

function getUserById($id){
	global $db;

    $user = $db->query("SELECT * FROM users WHERE id='".$id."' ");

	return $user;
}

// escape string
/*
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}
*/

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn(){
	if (isset($_SESSION['connecté'])) {
		return true;
	}else{
		return false;
	}
}

// Connexion de l'utilisateur
function tepi_login(){
	global $db, $email, $password, $errors;

	// grap form values
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	// make sure form is filled properly
	if (empty($email)) {
		array_push($errors, "Email obligatoire");
	}
	if (empty($pass)) {
		array_push($errors, "Mot de passe obligatoire");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$pass = md5($pass);

		$query =$db->query("SELECT * FROM users WHERE email='$email' AND password='$pass' LIMIT 1") ;
        $results = $query->rowCount();
        $a = $query->fetch();

		if ($results == 1) { // utilisateur trouvé
			// Voir s'il est amdin ou utilisateur simple

			if ($a['role'] == 'admin') {

                $_SESSION['id_leader'] = $a['id_leader'];
           		$_SESSION['nom'] = $a['nom']; // put logged in user in session
	           	$_SESSION['prenom'] = $a['prenom'];
	           	$_SESSION['role'] = $a['role'];
	           	$_SESSION['ecole'] = $a['ecole'];
	            $_SESSION['pays'] = $a['pays'];
	            $_SESSION['email'] = $a['email'];
	            $_SESSION['promo'] = $a['promo'];
	            $_SESSION['connecté'] = true;
				$_SESSION['success']  = "Vous etes connecté";
				// header('location: .././rescadAminLocale/menuAdmin522`/acceuil.php');
			}else{
                $_SESSION['id_leader'] = $a['id_leader'];
	            $_SESSION['nom'] = $a['nom']; // put logged in user in session
	           	$_SESSION['prenom'] = $a['prenom'];
	           	$_SESSION['role'] = $a['role'];
	           	$_SESSION['ecole'] = $a['ecole'];
	            $_SESSION['pays'] = $a['pays'];
	            $_SESSION['email'] = $a['email'];
	            $_SESSION['promo'] = $a['promo'];
	            $_SESSION['connecté'] = true;
				$_SESSION['success']  = "Vous etes connecté";

				// header('location: ../pages/pageUtilisateur.php');
			}
		}else {
			array_push($errors, "Votre mail et mot de passe ne correspondent pas.");
		}
	}
}

/*
function isAdmin()
{
	if (isset($_SESSION['connecté']) && $_SESSION['role'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

*/



# if($apte) session_destroy();

	// connect to database
	$db = new PDO('mysql:host=localhost;dbname=rescad' , 'root','');
	$db->exec('SET NAMES utf8');


	//declaration de variable
	$nom = "";
	$prenom = "";
	$ecole = "";
	$pays = "";
	$email = "";
	$promo = "";
	$password = "";
	$password_1 = "";
	$errors = array();


	if (isset($_POST["send"])) {
		inscription();
	}

	// log user out if logout button clicked
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: login.php");
	}
	// return user array from their id


	// Appeler la fonction login si l'inscription est terminé
	if (isset($_POST["connect"])) {
		tepi_login();
	}

?>