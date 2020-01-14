<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Administraation - Bilans</title>
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

  <?php require "../views/resacAdmin/gscripts.part.view.php"; ?>

  <script src="<?= get_static("resacAdmin/vendor/jquery-easing/jquery.easing.min.js")  ?>"></script>
  <script src="<?= get_static("resacAdmin/js/demo/datatables-demo.js")  ?>"></script>

</html>