<?php 
	include 'app/functions.php';
?>

<!-- Fin du code php -->

<!DOCTYPE html>
<html lang="en">
<head>
	<title>RESAC- Anciens caimans</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="./img/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formvendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formvendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formvendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formvendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formvendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formvendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formcss/util.css">
	<link rel="stylesheet" type="text/css" href="formcss/main.css">
<!--===============================================================================================-->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class="bg-dark">


	<div class="container">

		<div class="card card-login mx-auto mt-5">
			<form class="contact100-form validate-form" method="POST" actions="">
				<div>
					<h1 class="form-btn btn-primary" align="center">
					INSCRIPTION
				</h1>
				</div>

				
	              <?php  if(!empty($errors)): ?>
	              	<div class="alert alert-danger"><?php echo display_error(); ?></div>
	              <?php endif ?>
	         

				<div class="form-group row">
					<div class="col-sm-8">
						<input class="input100" type="text" name="nom" id="nom" placeholder="Nom">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-8">
						<input class="input100" type="text" name="prenom" id="prenom" placeholder="Prénom">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-sm-8">
						<input class="input100" type="text" name="ecole" id="ecole" placeholder="Ecole/Entreprise">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-sm-8">
						<input class="input100" type="text" name="pays" id="pays" placeholder="Pays d'étude">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-sm-8">
						<input class="input100" type="email" name="email" placeholder="example@xxxxx.xx">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-sm-8">
						<input class="input100" type="text" name="promo" id="promoC" placeholder="xxxx-xxxx">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-sm-8">
				    	<input class="input100" type="password" name="password" placeholder="Mot de passe">
				    </div>
				</div>
				<div class="form-group row">
					<div class="col-sm-8">
				    	<input class="input100" type="password" name="password_1" placeholder="Confirmer le Mot de passe">
				    </div>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn btn-primary" name="send" type="submit">
						Envoyer
					</button>
				</div>

				<div class="contact100-more">
					<span>Avez vous déjà un compte?</span> 
			 		<a href="connexion.php">connectez-vous</a>
				</div>
			</form>

		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="formvendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="formvendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="formvendor/bootstrap/js/popper.js"></script>
	<script src="formvendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="formvendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="formvendor/daterangepicker/moment.min.js"></script>
	<script src="formvendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="formvendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<script src="formjs/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
