<!DOCTYPE html>
<html lang="en">
<head>
	<title>RESAC - Anciens caimans</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
<body style="background-image:url(static/base/images/ETU3.jpg); background-size: cover; background-color: #E0E0E0 !important">
	<?php require "views/nav.home.part.view.php"; ?>

	<div class="container-contact100 mt-5">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST" action="">
				<span class="contact100-form-title">
					Connexion
				</span>
				 <?php  if(!empty($errors)): ?>
			      	<div class="alert alert-danger">
			      	<?php foreach ($errors as $error): ?>
			      		<div class="error"><?= $error ?></div>
			     	 <?php endforeach ?>
			     	</div>
			  	<?php endif ?>
				<div class="wrap-input100 validate-input" data-validate = "Entrer un email example: e@a.x">
					<input class="input100" type="text" name="email" placeholder="Email">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Entrer votre mot de passe">
				    <input class="input100" type="password" name="pass" placeholder="Mot de passe">
					<span class="focus-input100"></span>
				</div>
				<div class="container-contact100-form-btn">
					<button type="submit" name="connect" class="contact100-form-btn">Envoyer</button>
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