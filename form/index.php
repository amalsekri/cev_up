<?php
$isSubmitted = false;
if ($_POST) {
  $isSubmitted = true;
  // var_dump($_POST['prenom']);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./public/css/styles.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>

  <div class="container wrapper">
    <!-- entete -->
    <div class="row">
      <div class="col-md-2 col-sm-6 col-12 mt-1 mb-1 pl-0 logo">
        <img src="public/img/Logo-UP.png" alt="" class="img-responsive center-block">
      </div>
      <div class="col-md-10 header-right pl-0 pr-0">
        <h1 class="pl-4">Titre</h1>

      </div>

    </div>
    <div class="row form">
      <?php
      if ($isSubmitted) {
        extract($_POST);
        // FONCTION POUR SECURISER LES DONNEES
        function valid_donnees($donnees)
        {
          $donnees = trim($donnees);
          $donnees = stripslashes($donnees);
          $donnees = htmlspecialchars($donnees);
          return $donnees;
        }
        $nom =  valid_donnees($nom);
        $prenom =  valid_donnees($prenom);
        $raisonSociale =  valid_donnees($raisonSociale);
        $ville =  valid_donnees($ville);
        $tel =  valid_donnees($tel);
        $codePostal =  valid_donnees($codePostal);

        if ($demande == "chequeDejeuner") {
          $demande = "chèque Déjeuner";
        } elseif ($demande == "cadhoc") {
          $demande = "Cadhoc";
        } elseif ($demande == "chequeDomicile") {
          $demande = "Chèque Domicile ";
        }

      ?>
        <div class="card text-center col-md-12 p-0">
          <div class="card-header">
            Bonjour <?= $prenom ?>, Votre demande de contact à été bien enregistrer
          </div>
          <div class="card-body">
            <h5 class="card-title">
              Votre demande concerne: <?= $demande ?></h5>

            <div class="">
              <h5 style="color:orange">
                Votre Coordonnées:
              </h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"> <?= $civilite == "mme" ? "Madame" : "Monsieur" ?></li>
                <li class="list-group-item"> <?= $prenom ?></li>
                <li class="list-group-item"> <?= $nom ?></li>
                <li class="list-group-item"> <?= $ville ?></li>
                <li class="list-group-item"> <?= $codePostal ?></li>
                <li class="list-group-item"> <?= $raisonSociale ?></li>
                <li class="list-group-item"> <?= $tel ?></li>
              </ul>
            </div>

          </div>
          <div class="card-footer text-muted">
            Un de nous conseilleir vous rappelle dans les meilleurs délais
          </div>
        </div>

      <?php

      } else {
      ?>
        <form autocomplete="off" action="" method="post" class="row p-0 m-0 justify-content-between">
          <!-- partie gauche -->
          <div class="col-md-6 form-left  pl-4 pr-4 pt-5  pb-5 ">

            <div class="form-row">
              <!-- civilite -->
              <div class="col-md-12 ml-2">
                <label for="" class="mr-3">Civilité*</label>
                <div class="form-check form-check-inline">
                  <label class="check">Mme
                    <input type="radio" name="civilite" value="mme" required>
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <label class="check">Mr
                    <input type="radio" name="civilite" value="mr" required>
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <!-- Prénom -->
              <div class="form-group col-md-12">
                <input type="text" class="form-control" name="prenom" id="inputPrenom" required>
                <label for="inputPrenom">Prénom*</label>
                <div class="line"></div>
              </div>
              <!-- Nom -->
              <div class="form-group  col-md-12">
                <input type="text" class="form-control" name="nom" autocomplete="false" id="inputNom" required>
                <label for="inputNom">Nom*</label>
                <div class="line"></div>
              </div>
              <!-- code postal -->
              <div class="form-group col-md-12">
                <input type="text" class="form-control" name="codePostal" id="codePostal" required>
                <label for="codePostal">Code postal*</label>
                <div class="line"></div>
              </div>
              <!-- Ville -->
              <div class="form-group col-md-12">
                <input type="text" class="form-control" name="ville" id="ville" required>
                <label for="ville">Ville*</label>
                <div class="line"></div>
              </div>
              <!-- Raison sociale -->
              <div class="form-group col-md-12">
                <input type="text" class="form-control" name="raisonSociale" id="raisonSociale" required>
                <label for="raisonSociale">Raison Sociale*</label>
                <div class="line"></div>
              </div>

              <!-- Téléphone -->
              <div class="form-group col-md-12">
                <input type="text" class="form-control" name="tel" id="tel" required>
                <label for="tel">Téléphone*</label>
                <div class="line"></div>
              </div>
            </div>
          </div>

          <!-- partie droite -->
          <div class="col-md-6 form-right d-flex align-content-between flex-wrap pb-5 w-90">


            <div class="col-md-12 p-0">

              <h5>Votre demande concerne : </h5>
              <div class="form-check form-check-inline col-md-12  ">

                <label class="check mb-1">
                  <object type="image/svg+xml" data="public/img/cheque_dejeuner.svg" width="170">

                  </object>
                  <input type="radio" name="demande" value="chequeDejeuner" required>
                  <span class="checkmark"></span>
                </label>

              </div>
              <div class="form-check form-check-inline col-md-12  ">
                <label class="check mb-1">
                  <object type="image/svg+xml" data="public/img/cadhoc.svg" width="90">

                  </object>
                  <input type="radio" name="demande" value="cadhoc" required>
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="form-check form-check-inline col-md-12  ">
                <label class="check mb-1">
                  <object type="image/svg+xml" data="public/img/cheque_domicile.svg" width="170">

                  </object>
                  <input type="radio" name="demande" value="chequeDomicile" required>
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" name="submitButton" class="contacter"> <i class="fa fa-play"></i> <span>être recontacté</span></button>
            </div>

          </div>

        </form>
      <?php
      }
      ?>
    </div>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="./public/js/form.js"></script>
</body>

</html>