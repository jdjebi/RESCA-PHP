<?php 
	class Notif{

		public static function pop(){
			return "Hello World!";
		}

		public static function get_notifications(){
			// Retourne les notifications placée
			$notifications = [];
			if(isset($_SESSION["notifications"]))
				$notifications = $_SESSION["notifications"];
			return $notifications;
		}

		public static function set_notification($type, $message){
			// Place une notification
			$notification = [];
			$notification["type"] = $type;
			$notification["message"] = $message;
			$notification["id"] = uniqid();
			$_SESSION["notifications"][] = $notification;	
		}	

		public static function clear_notification(){
			// Supprime toutes les notifications
			unset($_SESSION["notifications"]);
		}	

		public static function delete_notification($id){
			foreach (Notif::get_notifications() as $key => $notif){
				if($notif["id"] == $id){
					unset($_SESSION["notifications"][$key]);
				}
			}
		}
	}


	$_Notif = new Notif;
?>