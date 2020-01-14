<?php 
	require __DIR__."\db.php";

	function db_connect(){
		try{

			$DB = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE,DB_USERNAME,DB_PASSWORD);
			
			$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$DB->exec('SET NAMES utf8');

		} catch(PDOexception $e){

			die('Impossible de se connecter à la base de données');
		}

		return $DB;	
	}
?>