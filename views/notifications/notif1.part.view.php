<?php foreach ($_Notif->get_notifications() as $notification): ?>
	<?php if ($notification["type"] == "success"): ?>
		<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
			<strong><?= $notification["message"] ?></strong>
		  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	   			<span aria-hidden="true">&times;</span>
		  	</button>
		</div>
		<?php 
			$_Notif->delete_notification($notification["id"]);
		?>
	<?php endif; ?>
<?php endforeach; ?>