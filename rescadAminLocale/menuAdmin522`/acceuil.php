<?php
//controle de connexion
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

$res1 = $connexion->query('
select count(*) as nonTraite from bilan where traite = 0');
$bilanNonTraite =$res1->fetch();

$res2 = $connexion->query('
select count(*) as Traite from bilan where traite = 1');
$bilanTraite =$res2->fetch();

$res3 = $connexion->query('
select count(*) as suggestion from suggestion where resolu = 0');
$suggestion =$res3->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Administration - Acceuil</title>
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
      <li class="nav-item active">
        <a class="nav-link" href="acceuil.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Acceuil</span>
        </a>
      </li>
      <li class="nav-item">
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
        </ol>
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"><?= $suggestion['suggestion'] ?> suggestion(s) envoyees</div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"><?= $bilanTraite['Traite'] ?> bilan(s) traités</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5"><?= $bilanNonTraite['nonTraite'] ?> bilan(s) non traités</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">              </a>
            </div>
          </div>
        </div>
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
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="js/sb-admin.min.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
