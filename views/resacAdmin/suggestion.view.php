<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Administration - Suggestions</title>
  <?php require "../views/resacAdmin/gstyle.part.view.php" ?>
</head>

<body id="page-top">

  <?php require "../views/resacAdmin/nav_admin.part.view.php" ?>

  <div id="wrapper">

    <?php require "../views/resacAdmin/sidenav.part.view.php" ?> 

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Acceuil</a>
          </li>
          <li class="breadcrumb-item active">Suggestion</li>
        </ol>

        <?php   if ($choix ==0) { ?>
        <div>
            <form>
                 <form method="post" >
                    
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1"><?= $afficheMessage ?></label>
                      </div><div class="form-group">
                        <div class="form-group">
                        <input type="text" name="numero" class="form-control" value=<?= $id ?> hidden>
                      </div><div class="form-group">
                        <label for="exampleFormControlTextarea1">votre reponse</label>
                        <textarea class="form-control" name="reponse" id="" cols="20" rows="10" ></textarea>
                      </div>
                      <div class="form_group"> 
                        <button type="submit" name="repond" class="btn btn-primary">repondre</button> 
                        <button type="submit" name="repondre" name="faire" class="btn btn-secondary">faire une suggestion</button> 
                      </div>  
                </form>
          </div>
        <?php   }else{ ?>
          <div>
                 <form>
                      <div class="form-group">
                        <input type="text" name="nomAdmin" class="form-control" value="Administrateur" hidden>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Intitulé de la suggestion</label>
                        <input type="text" name="intitule" class="form-control" id="exampleFormControlInput1" placeholder="Intitule de la suggestion">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">veuillez entrer votre suggestion</label>
                        <textarea class="form-control" name="suggestion" id="" cols="20" rows="10" ></textarea>
                      </div>
                      <div class="form_group"> 
                        <button type="submit" name="envoyer" class="btn btn-primary">envoyer</button> 
                        <a href="suggestion.php?repondre=2"><button type="button" name="annuler" class="btn btn-danger">annuler</button></a>
                        <button type="submit" name="repsugg" class="btn btn-dark">repondre aux suggestions</button>
                      </div>  
                </form>
          </div>
          <?php   } ?>
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
                  <?php while ($suggestion = $res1->fetch()) {  
                        $retour="suggestion.php?message=".$suggestion['id_sugg'];
                    ?>
                  <tr>
                    <td><?= $suggestion['date'] ?></td>
                    <td><?= $suggestion['nom'] ?></td>
                    <td><?= $suggestion['intitule'] ?></td>
                    <td>
                        <a href=<?=$retour?>><input type="button" class="btn btn-info" value="voir les details de la suggestion"></a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
              </table>
            </div>
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

</body>

</html>