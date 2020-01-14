<?php 

require "init.admin.php";

//affichage des suggestions dans le tableau
$res1 = $DB->query('
select * from suggestion where resolu = 0');
//la variable choix sert a switcher entre faire une suggestion et repondre aux suggestions
$choix =0;
$choix = (isset($_GET["repondre"])) ? 2 : 0;
//afficher le message propore a une suggestion
$id = (isset($_GET["message"])) ? $_GET["message"] : 0;
$resultat = $DB->query("select message from suggestion where id_sugg =".$id);
$afficheMessage  = ($mg=$resultat->fetch())? $mg['message'] : "le message de la suggestion s affichera ici";

//enregistrer une reponse propre a une suggestion
if (isset($_GET["repond"])) {
  $repSugg = (isset($_GET["reponse"])) ? $_GET["reponse"] : 0;
  $repNum = (isset($_GET["numero"])) ? $_GET["numero"] : 0;
  $res2 =  $DB->query("UPDATE suggestion SET reponse='".$repSugg."',resolu=1 WHERE  id_sugg=".$repNum);
  header('Location: suggestion.php');
}

//enregistrer une suggestion de l administrateur
 if (isset($_GET["envoyer"])) {
    if ($_GET["nomAdmin"] !=null && $_GET["intitule"]!=null && $_GET["suggestion"] != null) {
        $nomAdmin = (isset($_GET["nomAdmin"])) ? $_GET["nomAdmin"] : 'null';
        $intituleAdmin= (isset($_GET["intitule"])) ? $_GET["intitule"] : 'null';
        $msgAdmin = (isset($_GET["suggestion"])) ? $_GET["suggestion"] : 'null';
        $DB->query("INSERT INTO suggestion (`message`, `nom`, `intitule`) VALUES ('".$msgAdmin."', '".$nomAdmin."', '".$intituleAdmin."');");
        header('Location: suggestion.php?repondre=2');
    }
    else  header('Location: suggestion.php?repondre=2');
}

require "../views/resacAdmin/suggestion.view.php";

?>