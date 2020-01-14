<!DOCTYPE html>
<html>
<head>
	<title>Acceuil - Utilisateur</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="static\base\css\bootstrap\bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">RESAC</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
	      <li class="nav-item active">
	        <a class="nav-link disabled"><?= $_SESSION["user"]["prenom"] ?> <?= $_SESSION["role"] ?></a>
	      </li>
	    </ul>
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" href="<?= $LOGOUT_PAGE ?>">Deconnexion</a>
	      </li>
	    </ul>
	  </div>
	</nav>
	<div class="container">
		<div class="jumbotron">
			<h1>Bienvenue sur la page des utilisateurs</h1>			
		</div>
	</div>
</body>
</html>