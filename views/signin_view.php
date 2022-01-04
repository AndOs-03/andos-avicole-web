<!DOCTYPE html>
<html lang="fr">

<head>
  <title>AndOs Avicole | Inscription</title>

    <?php include_once 'includes/head.php' ?>
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">

  <!-- Mes fichiers style CSS -->
  <link rel="stylesheet" href="css/logon.css">
</head>

<body class="hold-transition register-page">
<?php include('views/includes/flash.php'); ?>

<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>AndOs Avicole </b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Nouvel utilisateur, Inscrivez-vous !</p>

      <form id="signin_form" name="signin_form" action="controllers/signin_controller.php" method="POST">
        <div class="bs-stepper">
          <div class="bs-stepper-header" role="tablist">
            <!-- your steps here -->
            <div class="step" data-target="#identité-part">
              <button type="button" class="step-trigger" role="tab" aria-controls="identité-part"
                      id="identité-part-trigger">
                <span class="bs-stepper-circle">1</span>
                <span class="bs-stepper-label">Identité</span>
              </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#compte-part">
              <button type="button" class="step-trigger" role="tab" aria-controls="compte-part"
                      id="compte-part-trigger">
                <span class="bs-stepper-circle">2</span>
                <span class="bs-stepper-label">Compte</span>
              </button>
            </div>
          </div>
          <div class="bs-stepper-content">
            <!-- your steps content here -->

            <div id="identité-part" class="content" role="tabpanel"
                 aria-labelledby="identité-part-trigger">
              <div class="form-group input-group mb-0">
                <input type="text" class="form-control" placeholder="Nom et prénoms"
                       name="nomPrenom"
                       id="nomPrenom" maxlength="150" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <small id="nomPrenomHelp" class="text-danger invisible"></small>
              </div>

              <div class="form-group input-group mb-0">
                <input type="email" class="form-control" placeholder="Email" name="email" id="email"
                       maxlength="255" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <small id="emailHelp" class="text-danger invisible"></small>
              </div>

              <div class="form-group input-group mb-0">
                <input type="tel" class="form-control" placeholder="Tel" name="tel" id="tel"
                       maxlength="20"
                       required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <small id="telHelp" class="text-danger invisible"></small>
              </div>

              <button class="btn btn-primary" id="btnSuivant">Suivant</button>
            </div>

            <div id="compte-part" class="content" role="tabpanel"
                 aria-labelledby="compte-part-trigger">

              <div class="form-group input-group mb-0">
                <input type="text" class="form-control" placeholder="Nom d'utilisateur"
                       maxlength="30" minlength="4" name="userName" id="userName" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <small id="userNameHelp" class="text-danger invisible"></small>
              </div>

              <div class="form-group input-group mb-0">
                <input type="password" class="form-control" placeholder="Mot de passe"
                       name="password" id="password" maxlength="255" minlength="6" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <small id="passwordHelp" class="text-danger invisible"></small>
              </div>

              <div class="form-group input-group mb-0">
                <input type="password" class="form-control" placeholder="Confirmer le mot de passe"
                       name="confPassword" id="confPassword" maxlength="255" minlength="6" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <small id="confPasswordHelp" class="text-danger invisible"></small>
              </div>

              <div class="form-group input-group mb-3">
                <select class="form-control" id="typeCompte" name="typeCompte" required>
                  <option selected="selected">Administrateur</option>
                  <option>Superviseur</option>
                  <option>Consultant</option>
                  <option>Stagiaire</option>
                  <option>Invité</option>
                </select>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user-circle"></span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="form-group icheck-primary">
                  <input type="checkbox" id="conditions" name="conditions">
                  <label for="conditions">
                    J'accèpte <a href="" class="liens_gras" id="Condition" data-toggle="modal"
                                 data-target="#exampleModal">les conditions d'utilisation</a>
                  </label>
                </div>
              </div>

              <button class="btn btn-primary" onclick="stepper.previous()">Précédent</button>
              <button type="submit" class="btn btn-primary" name="btn_signin" id="btn_signin">
                S'inscrire
              </button>
            </div>
          </div>
        </div>

        <!-- /.card-body -->
      </form>

      <a class="text-center">Déjà un compte ? <a class="liens_gras" href="index.php?page=login">connectez-vous</a></a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->


<!-- Modal confirmation de licence-->
<div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" modal-dialog-scrollable="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">E-Expert Gestion Cabinet - Conditions
          d'utilisation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Where does it come from?
        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece
        of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,
        a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure
        Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the
        word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from
        sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and
        Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very
        popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit
        amet..", comes from a line in section 1.10.32.

        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
        interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are
        also reproduced in their exact original form, accompanied by English versions from the 1914
        translation by H. Rackham.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Retour</button>
      </div>
    </div>
  </div>
</div>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>

<script type="text/javascript">
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  $(document).ready(function () {
    $('#btn_signin').attr('disabled', true);
  });

  $('#btnSuivant').on('click', function (e) {
    e.preventDefault();
    var goToNext = true;
    var nomPrenom = $('#nomPrenom').val();
    var email = $('#email').val();
    var tel = $('#tel').val();

    // Vérification du nom et prenom
    if (nomPrenom === '' || nomPrenom.length < 4) {
      $('#nomPrenom').addClass('is-invalid');
      $('#nomPrenomHelp').html("Veuillez saisir votre nom et votre prénom.");
      $('#nomPrenomHelp').removeClass('invisible');
      goToNext = false;
    } else {
      $('#nomPrenom').removeClass('is-invalid');
      $('#nomPrenomHelp').addClass('invisible');
      $('#nomPrenomHelp').html("");
    }

    $.getScript("functions/functions.js", function () {
      // Vérification de l'email
      if (!isEmail(email)) {
        goToNext = false;
        $('#email').addClass('is-invalid');
        $('#emailHelp').html("E-mail invalide.");
        $('#emailHelp').removeClass('invisible');
      } else {
        $('#email').removeClass('is-invalid');
        $('#emailHelp').addClass('invisible');
        $('#emailHelp').html("");
      }

      // Vérification du téléphone
      if (!validatePhone(tel)) {
        goToNext = false;
        $('#tel').addClass('is-invalid');
        $('#telHelp').html("Numéro de téléphone invalide.");
        $('#telHelp').removeClass('invisible');
      } else {
        $('#tel').removeClass('is-invalid');
        $('#telHelp').addClass('invisible');
        $('#telHelp').html("");
      }

      if (goToNext === true) {
        stepper.next();
      }
    });
  });

  $('#signin_form').on('submit', function (e) {
    e.preventDefault();
    var goToNext = true;
    var userName = $('#userName').val();
    var password = $('#password').val();
    var confPassword = $('#confPassword').val();

    // Vérification du nom d'utilisateur
    if (userName === '' || userName.length < 4) {
      $('#userName').addClass('is-invalid');
      $('#userNameHelp').html("Nom d’utilisateur invalide.");
      $('#userNameHelp').removeClass('invisible');
      goToNext = false;
    } else {
      $('#userName').removeClass('is-invalid');
      $('#userNameHelp').addClass('invisible');
      $('#userNameHelp').html("");
    }

    $.getScript("functions/functions.js", function () {
      // Vérification du nom d'utilisateur
      if (!validatePassword(password)) {
        $('#password').addClass('is-invalid');
        $('#passwordHelp').html("Mot de passe invalide (min 6 caractères, une majuscule et une minuscule).");
        $('#passwordHelp').removeClass('invisible');
        goToNext = false;
      } else {
        $('#password').removeClass('is-invalid');
        $('#passwordHelp').addClass('invisible');
        $('#passwordHelp').html("");
      }

      if (confPassword !== password) {
        $('#confPassword').addClass('is-invalid');
        $('#confPasswordHelp').html("Les deux mots de passe ne correspondent pas.");
        $('#confPasswordHelp').removeClass('invisible');
        goToNext = false;
      } else {
        $('#confPassword').removeClass('is-invalid');
        $('#confPasswordHelp').addClass('invisible');
        $('#confPasswordHelp').html("");
      }

      if (goToNext === true) {
        if ($('.flash').hasClass('alert-success')) {
          $('.flash').removeClass('alert-success');
        } else if ($('.flash').hasClass('alert-danger')) {
          $('.flash').removeClass('alert-danger');
        }
        $('.flash').addClass('alert-info');
        $('.flash').html('<i class="fas fa-cog fa-spin"></i> Inscription...').fadeIn(300);

        var form = $('#signin_form');
        var method = form.prop('method');
        var url = form.prop('action');

        $.ajax({
          type: method,
          data: form.serialize() + "&btn_signin=" + true,
          url: url,
          success: function (result) {
            donnee = JSON.parse(result);
            if (donnee['success'] === 'existe') {
              $('#email').addClass('is-invalid');
              $('#emailHelp').html(donnee['erreur']);
              $('#emailHelp').removeClass('invisible');

              $('.flash').html(
                  '<i class="fas fa-exclamation-circle"></i> Adresse email déjà utilisée')
              .fadeIn(300).delay(2500).fadeOut(300);
            }
            if (donnee['success'] === 'true') {
              $('#nomPrenomHelp').html("");
              $('#emailHelp').html("");
              $('#telHelp').html("");
              $('#userNameHelp').html("");
              $('#passwordHelp').html("");
              $('#confPasswordHelp').html("");
              $('#nomPrenomHelp').addClass('invisible');
              $('#emailHelp').addClass('invisible');
              $('#telHelp').addClass('invisible');
              $('#userNameHelp').addClass('invisible');
              $('#passwordHelp').addClass('invisible');
              $('#confPasswordHelp').addClass('invisible');

              $('.flash').removeClass('alert-info').addClass('alert-success');
              $('.flash').html('<i class="fas fa-spinner fa-spin"></i> Compte crée, redirection...')
              .fadeIn(300).delay(2500).fadeOut(300);
            }
            if (donnee['success'] === 'non') {
              $('.flash').removeClass('alert-info').addClass('alert-danger');
              $('.flash').html(
                  '<i class="fas fa-exclamation-circle"></i> Erreur lors de la création du compte')
              .fadeIn(300).delay(2500).fadeOut(300);
            }
            if (donnee['success'] === 'false') {
              $('#nomPrenomHelp').html(donnee['nom']);
              $('#emailHelp').html(donnee['email']);
              $('#telHelp').html(donnee['tel']);
              $('#userNameHelp').html(donnee['userName']);
              $('#passwordHelp').html(donnee['pass']);
              $('#confPasswordHelp').html(donnee['passConf']);
              $('#nomPrenomHelp').removeClass('invisible');
              $('#emailHelp').removeClass('invisible');
              $('#telHelp').removeClass('invisible');
              $('#userNameHelp').removeClass('invisible');
              $('#passwordHelp').removeClass('invisible');
              $('#confPasswordHelp').removeClass('invisible');

              $('.flash').removeClass('alert-info').addClass('alert-danger');
              $('.flash').html('<i class="fas fa-exclamation-circle"></i> Vérifiez les champs')
              .fadeIn(300).delay(2500).fadeOut(300);
            }
          }
        });
      }
    });
  });

  $('#conditions').change(function () {
    if (this.checked) {
      $('#btn_signin').attr('disabled', false);
    } else {
      $('#btn_signin').attr('disabled', true);
    }
  });
</script>
</body>

</html>