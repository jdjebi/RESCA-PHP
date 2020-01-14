<?php 
	function get_notifications(){
		// Retourne les notifications placée
		$notifications = [];
		if(isset($_SESSION["notifications"]))
			$notifications = $_SESSION["notifications"];
		return $notifications;
	}

	function set_notification($type, $message){
		// Place une notification
		$notification = [];
		$notification["type"] = $type;
		$notification["message"] = $message;
		$notification["id"] = uniqid();
		$_SESSION["notifications"][] = $notification;	
	}	

	function clear_notification(){
		// Supprime toutes les notifications
		unset($_SESSION["notifications"]);
	}	

	function delete_notification($id){
		foreach (get_notifications() as $key => $notif){
			if($notif["id"] == $id){
				unset($_SESSION["notifications"][$key]);
			}
		}
	}
?>