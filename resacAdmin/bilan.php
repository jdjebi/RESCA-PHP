<?php

require "init.admin.php";

//affichage des bilans dans le tableau
$res1 = $DB->query('select * from bilan, users where bilan.leader =users.id_leader and traite =0');

//afficher le message propore a un bilan
$id = (isset($_GET["message"])) ? $_GET["message"] : 0;
$resultat = $DB->query("select libelle from bilan where id_bilan =".$id);
$afficheMessage  = ($mg=$resultat->fetch())? $mg['libelle'] : "le message du bilan s affichera ici";

//valider un bilan lu
if (isset($_GET["traite"])) {
  $numBilan = (isset($_GET["numero"])) ? $_GET["numero"] : 0;
  $res2 =  $DB->query("UPDATE bilan SET traite=1 WHERE  id_bilan=".$numBilan);
  header('Location: bilan.php');
}

require "../views/resacAdmin/bilan.view.php";
 
?>
