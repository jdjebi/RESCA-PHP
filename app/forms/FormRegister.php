<?php 

/*
	Ce script depend des constantes précisement de la constante spécifiant qu'un utilisateur des un admin
*/
require_once __DIR__."\..\..\config\defines.php";

class FormRegister{
	/*
		Classe pour la validation du formulaire d'inscription
		Les données ayant passé la validation sont directement échappés
	*/
		
	private $form_data;
	private $DB;
	private $errors = [];
	private $clear_data = [];
	private $form_validate = false;

	function __construct($form_data,$DB){
		$this->form_data = $form_data;
		$this->DB = $DB;
	}

	public function get_errors(){
		return $this->errors;
	}

	public function get_clear_data(){
		return $this->clear_data;
	}

	public function get_validation_data(){
		return [
			"errors" => $this->get_clear_data(),
			"clear_data" => $this->get_errors()
		];
	}

	public function validate(){
		$errors = [];
		$clear_data = [];

		$nom = $this->form_data['nom'];
		$prenom = $this->form_data['prenom'];
		$ecole = $this->form_data['ecole'];
		$pays = $this->form_data['pays'];
		$email = $this->form_data['email'];
		$promo = $this->form_data['promo'];
		$password = $this->form_data['password'];
		$password_1 = $this->form_data['password_1'];

		if (empty($nom)) {
		$errors['nom'] = "Nom obligatoire";
		}else{
			$clear_data['nom'] = e($nom);
		}
		if (empty($prenom)) {
			$errors['prenom'] = "Prenom obligatoire";
		}else{
			$clear_data['prenom'] = e($prenom);
		}
		if (empty($ecole)) {
			$errors['ecole'] = "Ecole obligatoire";
		}else{
			$clear_data['ecole'] = e($ecole);
		}
		if (empty($pays)) {
			$errors['pays'] = "Pays obligatoire";
		}else{
			$clear_data['pays'] = e($pays);
		}
		if (empty($email)) {
			$errors['email'] = "Email obligatoire";
		}else{
			$clear_data['email'] = e($email);
		}
		if (empty($promo)) {
			$errors['promo'] = "Promo obligatoire";
		}else{
			$clear_data['promo'] = e($promo);
		}
		if (empty($password)) {
			$errors['password'] = "Mot de passe obligatoire";
		}else if ($password != $password_1) {
			$errors['password_2'] = "Les deux mots de passe sont différents";
		}else{
			// Le mot de passe n'a pas besoin d'être échappé
			$clear_data['password'] = $password;
		}

		$this->errors = $errors;
		$this->clear_data = $clear_data;

		if (count($errors) == 0)
			$this->form_validate = true;
		else
			$this->form_validate = false;

		return $this->form_validate;
	}
}
?>