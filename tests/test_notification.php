<?php 
	session_start();

	require "../app/notif.php";

	if(isset($_GET["send"])){
		extract($_GET);
		$_Notif->set_notification($type,$message);
	}

	if(isset($_GET["delete"])){
		extract($_GET);
		$_Notif->delete_notification($id);
	}

	if(isset($_GET["delete_all"]))
		$_Notif->clear_notification();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Test - Notifications</title>
</head>
<style type="text/css">
	.border{
		border : solid;
		padding: 10px
	}
</style>
<body>
	<h3>Emetteur de notifications</h1>
	<form method="GET" action="">
		<div>
			<div><label>Type: </label></div>
			<div><input type="text" name="type">	</div>
		</div>
		<div>
			<div><label>Message: </label></div>
			<div><input type="text" name="message"></div>
		</div>
		<br>
		<button name="send" type="submit">Emettre</button>
	</form>

	<br>

	<a href="?delete_all">Tout supprimer</a>

	<hr>

	<h3>Liste des notifications</h3>

	<?php foreach ($_Notif->get_notifications() as $notif): ?>

		<div class="border">
			<div><b>Type:</b> <?= $notif["type"] ?></div>
			<div><b>id:</b><i><?= $notif["id"] ?></i></div>  
			<p><?= $notif["message"] ?></p>
			<div>
				<a href="?delete=1&id=<?= $notif["id"] ?>">Supprimer</a>
			</div>
		</div>
		<br>

	<?php endforeach ?> 

</body>
</html>