<!DOCTYPE html>
<html>
<head>
	<title>RESAC - Inscription</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?= get_static("tepi/formcss/main.css")?>">
   	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= get_static("tepi/formvendor/bootstrap/css/bootstrap.min.css")?>">
	<link rel="stylesheet" type="text/css" href="<?= get_static("tepi/fonts/font-awesome-4.7.0/css/font-awesome.min.css")?>">
	<link rel="stylesheet" type="text/css" href="<?= get_static("tepi/fonts/iconic/css/material-design-iconic-font.min.css")?>">
	<link rel="stylesheet" type="text/css" href="<?= get_static("tepi/formvendor/animate/animate.css")?>">
	<link rel="stylesheet" type="text/css" href="<?= get_static("tepi/formvendor/css-hamburgers/hamburgers.min.css")?>">
	<link rel="stylesheet" type="text/css" href="<?= get_static("tepi/formvendor/animsition/css/animsition.min.css")?>">
	<link rel="stylesheet" type="text/css" href="<?= get_static("tepi/formvendor/select2/select2.min.css")?>">
	<link rel="stylesheet" type="text/css" href="<?= get_static("tepi/formvendor/daterangepicker/daterangepicker.css")?>">
	<link rel="stylesheet" type="text/css" href="<?= get_static("tepi/formcss/util.css")?>">
	<link rel="stylesheet" type="text/css" href="<?= get_static("tepi/formcss/main.css")?>">
   	<?php require "views/header.home.part.view.php" ?>
</head>
<body style="background-image:url(static/base/images/ETU2.jpg); background-size: cover; background-color: #E0E0E0 !important">
	<?php require "views/nav.home.part.view.php"; ?>
	<div class="container-contact100 mt-5">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST" action="">
				<span class="contact100-form-title">
					Inscription
				</span>
				<?php if(isset($errors['password_2'])): ?>
					<div class="text-danger text-center mt-2 mb-4"><?= $errors['password_2'] ?></div>
				<?php endif; ?>
			  	<div class="wrap-input100 validate-input <?= get_if_key_exist('alert-validate','nom',$errors) ?> <?= get_if_key_exist('true-validate','nom',$clear_data) ?>" data-validate = "Entrer votre nom">
					<input class="input100" type="text" value="<?= get_clear_data('nom',$clear_data) ?>" name="nom" placeholder="Nom">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input <?= get_if_key_exist('alert-validate','prenom',$errors) ?> <?= get_if_key_exist('true-validate','prenom',$clear_data) ?>" data-validate = "Entrer votre prénom">
				    <input class="input100" type="text" value="<?= get_clear_data('prenom',$clear_data) ?>" name="prenom" placeholder="Prénom">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input <?= get_if_key_exist('alert-validate','ecole',$errors) ?> <?= get_if_key_exist('true-validate','ecole',$clear_data) ?>" data-validate = "Entre votre Ecole/Entreprise">
				    <input class="input100" type="text" value="<?= get_clear_data('ecole',$clear_data) ?>" name="ecole" placeholder="Ecole/Entreprise">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input <?= get_if_key_exist('alert-validate','pays',$errors) ?> <?= get_if_key_exist('true-validate','pays',$clear_data) ?>" data-validate = "Entrer le pays">
				    <input class="input100" type="text" value="<?= get_clear_data('pays',$clear_data) ?>" name="pays" placeholder="Pays d'étude/de résidence">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input <?= get_if_key_exist('alert-validate','promo',$errors) ?> <?= get_if_key_exist('true-validate','promo',$clear_data) ?>" data-validate = "Entrer le pays">
				    <input class="input100" type="text" value="<?= get_clear_data('promo',$clear_data) ?>" name="promo" placeholder="xxxx-xxxx">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input <?= get_if_key_exist('alert-validate','email',$errors) ?> <?= get_if_key_exist('true-validate','email',$clear_data) ?>" data-validate = "Entrer un email example: e@a.x">
					<input class="input100" type="text" value="<?= get_clear_data('email',$clear_data) ?>" name="email" placeholder="Email">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input <?= get_if_key_exist('alert-validate','password',$errors) ?> <?= get_if_key_exist('alert-validate','password_2',$errors) ?>" data-validate = "Entrer votre mot de passe">
				    <input class="input100" type="password" name="password" placeholder="Mot de passe">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input <?= get_if_key_exist('alert-validate','password_2',$errors) ?>" data-validate = "Confirmer le mot de passe">
				    <input class="input100" type="password" name="password_1" placeholder="Confirmation du mot de passe">
					<span class="focus-input100"></span>
				</div>
				<div class="container-contact100-form-btn">
					<button type="submit" name="send" class="contact100-form-btn">Envoyer</button>
				</div>
				<div class="contact100-more">
					<span>Avez vous déjà un compte ?</span> 
			 		<a href="<?= get_url("connexion.php")?>">connectez-vous</a>
				</div>
			</form>
		</div>
	</div>
	<script src="<?= get_static("tepi/formvendor/jquery/jquery-3.2.1.min.js") ?>"></script>
	<script src="<?= get_static("tepi/formvendor/animsition/js/animsition.min.js") ?>"></script>
	<script src="<?= get_static("tepi/formvendor/bootstrap/js/popper.js") ?>"></script>
	<script src="<?= get_static("tepi/formvendor/bootstrap/js/bootstrap.min.js") ?>"></script>
	<script src="<?= get_static("tepi/formvendor/select2/select2.min.js") ?>"></script>
	<script src="<?= get_static("tepi/formvendor/daterangepicker/moment.min.js") ?>"></script>
	<script src="<?= get_static("tepi/formvendor/daterangepicker/daterangepicker.js") ?>"></script>
	<script src="<?= get_static("tepi/formvendor/countdowntime/countdowntime.js") ?>"></script>	
	<script src="<?= get_static("tepi/formjs/main.js") ?>"></script>
</body>
</html>