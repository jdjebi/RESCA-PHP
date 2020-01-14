<?php 
require_once __DIR__."\..\database\db_auto_connect.php";
require_once __DIR__."\..\utils.php";
require_once __DIR__."\..\urls.php";


/* Connexion */

// Fonction gérant la déconnexion
function logout() {
	global $INDEX_PAGE;

	unset($_SESSION["user"]);
	redirect($INDEX_PAGE);
}


// Fonction gérant la connexion membre et administrateur
function login($form_data){
	/*
		data extract form $form_data:
			- email
			- pass
			- connect
	*/
	global $ADMIN_PAGE, $MEMBER_HOME_PAGE;
	extract($form_data);

	$email = e($email);
	$pass = e($pass);

	$errors = [];

	if (empty($email)){
		array_push($errors, "Email obligatoire");
	} 
	if (empty($pass)){
		array_push($errors, "Mot de passe obligatoire");
	}

	if(count($errors) == 0){
		global $DB;
		$pass = md5($pass);
		$query =$DB->query("SELECT * FROM users WHERE email='$email' AND password='$pass' LIMIT 1") ;
		$results = $query->rowCount();
    	$user = $query->fetch();

    	if($results == 1){

		   	login_user($user);

			if($user['role'] == 'admin')
		   		redirect($ADMIN_PAGE);

			else if($user['role'] == 'user')
				$_SESSION['user']['is_admin'] = False;
    			redirect($MEMBER_HOME_PAGE);
    	}else{
    		array_push($errors, "Votre mail et mot de passe ne correspondent pas.");
    	}
	}

	return $errors;
}

function login_user($user){
	// Tepi
	$_SESSION['id_leader'] = $user['id_leader'];
	$_SESSION['nom'] = $user['nom'];
   	$_SESSION['prenom'] = $user['prenom'];
   	$_SESSION['role'] = $user['role'];
   	$_SESSION['ecole'] = $user['ecole'];
    $_SESSION['pays'] = $user['pays'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['promo'] = $user['promo'];
    $_SESSION['connecté'] = true;
    // Mointi
    $_SESSION['user']['id_leader'] = $user['id_leader'];
	$_SESSION['user']['nom'] = $user['nom'];
   	$_SESSION['user']['prenom'] = $user['prenom'];
   	$_SESSION['user']['role'] = $user['role'];
   	$_SESSION['user']['ecole'] = $user['ecole'];
    $_SESSION['user']['pays'] = $user['pays'];
    $_SESSION['user']['email'] = $user['email'];
    $_SESSION['user']['promo'] = $user['promo'];

	if($user['role'] == 'admin')
		$_SESSION['user']['is_admin'] = True;

	else if($user['role'] == 'user')
		$_SESSION['user']['is_admin'] = False;

	$_SESSION["user"]["connected"] = True;
}

/* Inscription */
require_once __DIR__."\..\app\utils.php";
require __DIR__."\..\app\\notif.php";
require __DIR__."\..\app\\forms\FormRegister.php";

function register($form_data){
	global $DB;

	$form = new FormRegister($form_data, $DB);

	if ($form->validate()) {
		$clear_data = $form->get_clear_data();

		$nom = $clear_data['nom'];
		$prenom = $clear_data['prenom'];
		$ecole = $clear_data['ecole'];
		$pays = $clear_data['pays'];
		$email = $clear_data['email'];
		$promo = $clear_data['promo'];
		$password = md5($clear_data['password']);

        $insert_user = $DB->prepare("INSERT INTO users (nom, prenom, role, ecole, pays, email, promo, password)  VALUES(?, ?, ?, ?, ?, ?, ?,?)");
        $insert_user->execute(array($nom,$prenom, USER_MEMBER, $ecole, $pays, $email, $promo, $password));

        $type = "success";
        $msg = "Inscription réussie. Connectez vous pour avoir accès à la plateforme.";
        set_notification($type,$msg);
  
		http_redirect($INDEX_PAGE);
	}

	return $form->get_validation_data();
}
	
?>