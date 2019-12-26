<?php 
//controle de conexion
session_start();
$apte = isset($_SESSION['nom']);
if($apte ==false) header('Location: deconnexion.php');

$nomUtilisateur = "root";
$motDePasse = "";
$serveur = "localhost";
$BD = "rescad";
$DSN = 'mysql:host=' . $serveur . ';dbname=' . $BD . ';charset=utf8';
try {
    $connexion = new PDO( $DSN, $nomUtilisateur, $motDePasse );
}

catch ( Exception $e ) {
    echo "Connection  MySQL impossible : ", $e->getMessage();
    die();
}

//affichage des bilans dans le tableau
$res1 = $connexion->query('
select * from bilan,leader where bilan.leader =leader.id_leader and traite =0');
//afficher le message propore a un bilan
$id = (isset($_GET["message"])) ? $_GET["message"] : 0;
$resultat = $connexion->query("select libelle from bilan where id_bilan =".$id);
$afficheMessage  = ($mg=$resultat->fetch())? $mg['libelle'] : "le message du bilan s affichera ici";

//valider un bilan lu
if (isset($_GET["traite"])) {
  $numBilan = (isset($_GET["numero"])) ? $_GET["numero"] : 0;
  $res2 =  $connexion->query("UPDATE bilan SET traite=1 WHERE  id_bilan=".$numBilan);
  header('Location: bilan.php');
}
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Administraation - Bilans</title>


  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="acceuil.php">Administration locale</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>

    <!-- Navbar -->
       <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Deconnexion</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
<ul class="sidebar navbar-nav ">
      <li class="nav-item ">
        <a class="nav-link" href="acceuil.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Acceuil</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="bilan.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Bilan</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="suggestion.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Suggestion</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Acceuil</a>
          </li>
          <li class="breadcrumb-item active">Bilan</li>
        </ol>
         <div>
            <form>
                 <form method="post" >
                    
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1"><?= $afficheMessage ?></label>
                      </div><div class="form-group">
                        <div class="form-group">
                        <input type="text" name="numero" class="form-control" value=<?= $id ?> hidden>
                      </div>
                      <div class="form_group"> 
                        <button type="submit" name="traite" class="btn btn-primary">Vu</button> 
                      </div>  
                </form>
          </div>

        <div class="card mb-3">
          <div class="card-body">
           <div class="table-responsive">
              <table class="table table-bordered center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Date d'envoi</th>
                    <th>Nom</th>
                    <th>intitulé</th>
                    <th>plus de details</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Date d'envoi</th>
                    <th>Nom</th>
                    <th>intitulé</th>
                    <th>plus de details</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php while ($bilan = $res1->fetch()) {  
                        $retour="bilan.php?message=".$bilan['id_bilan'];
                    ?>
                  <tr>
                    <td><?= $bilan['date'] ?></td>
                    <td><?= $bilan['nom'] ?></td>
                    <td><?= $bilan['intitule'] ?></td>
                    <td>
                        <a href=<?=$retour?>><input type="button" class="btn btn-info" value="voir les details du bilan"></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
              </table>
            </div>
          </div>
        </div>

      <!--  Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="col-md-12 text-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits reservés
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </footer>

    </div>


  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <div class="modal fade" id="logoutModal" tabacceuil="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Voulez vous vous deconnecter?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selectionnez 'Deconnexion' pour quitter votre session</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">annuler</button>
          <a class="btn btn-primary" href="deconnexion.php">Deconnexion</a>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>

</html>
