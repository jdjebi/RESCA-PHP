	<div class="container">
		<div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

		<div class="card card-login mx-auto mt-5">
		
			<form class="contact100-form validate-form" method="POST" action="">
				<div>
					<h1 class="form-btn btn-primary" align="center">
					CONNEXION
				</h1>

              <?php  if(!empty($errors)): ?>
              	<div class="alert alert-danger">
              	<?php foreach ($errors as $error): ?>
              		<div class="error"><?= $error ?></div>
             	 <?php endforeach ?>
             	</div>
              <?php endif ?>

				</div>

				<div  class="form-group row" >
					<div class="col-sm-8">
						<input class="input100" type="Email" name="email" placeholder="Email">
					</div>
				</div>

				<div  class="form-group row" >
					<div class="col-sm-8">
				    	<input class="input100" type="password" name="pass" placeholder="Mot de passe">
				    </div>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn btn-primary" name="connect" type="submit">
						Envoyer
					</button>
				</div>
			</form>
		</div>
	</div>
