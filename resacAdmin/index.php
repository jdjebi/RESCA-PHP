<?php 

require "init.admin.php";

$res1 = $DB->query('select count(*) as nonTraite from bilan where traite = 0');
$bilanNonTraite =$res1->fetch();

$res2 = $DB->query('select count(*) as Traite from bilan where traite = 1');
$bilanTraite =$res2->fetch();

$res3 = $DB->query('select count(*) as suggestion from suggestion where resolu = 0');
$suggestion =$res3->fetch();

require "../views/resacAdmin/index.admin.view.php";

?>