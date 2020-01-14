<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Administration - Acceuil</title>
  <?php require "../views/resacAdmin/gstyle.part.view.php" ?>
</head>

<body id="page-top">

  <?php require "../views/resacAdmin/nav_admin.part.view.php" ?>


  <div id="wrapper">

    <?php require "../views/resacAdmin/sidenav.part.view.php" ?>    

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
          <a class="btn btn-primary" href="<?= get_url($LOGOUT_PAGE) ?>">Deconnexion</a>
        </div>
      </div>
    </div>
  </div>

  <?php require "../views/resacAdmin/gscripts.part.view.php"; ?>

  <script src="<?= get_static("resacAdmin/vendor/jquery-easing/jquery.easing.min.js") ?>"></script>
  <script src="<?= get_static("resacAdmin/js/demo/datatables-demo.js") ?>"></script>
  <script src="<?= get_static("resacAdmin/vendor/chart.js/Chart.min.js") ?>"></script>
  <script src="<?= get_static("resacAdmin/vendor/datatables/jquery.dataTables.js") ?>"></script>
  <script src="<?= get_static("resacAdmin/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
  <script src="<?= get_static("resacAdmin/js/demo/chart-area-demo.js") ?>"></script>

</body>

</html>
