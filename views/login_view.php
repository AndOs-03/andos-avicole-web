<!DOCTYPE html>
<html lang="fr">

<head>
  <title>AndOs Avicole | Connexion</title>

  <?php include_once 'includes/head.php' ?>

  <!-- Mes fichiers style CSS -->
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/main.css">
</head>


<body class="hold-transition login-page">
<?php include('views/includes/flash.php'); ?>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="login-app-title"><b>AndOs Avicole</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Connectez vous pour démarrer</p>

      <form id="login_form" name="login_form" action="controllers/login_controller.php"
            method="POST">
        <div class="form-group input-group mb-0">
          <input type="email" class="form-control" placeholder="E-mail"
                 name="loginId" id="loginId" maxlength="255" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <small id="loginIdHelp" class="text-danger invisible"></small>
        </div>

        <div class="form-group input-group mb-0">
          <!--     is-invalid     -->
          <input type="password" class="form-control" placeholder="Mot de passe"
                 name="password" id="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <small id="passwordHelp" class="text-danger invisible"></small>
        </div>

        <p class="mb-1">
          <a href="forgot_password_view.php">Mot de passe oublié ?</a> ou
          <a href="index.php?page=signin"><b>Pas encore de compte ?</b></a>
        </p>

        <div class="row">
          <div class="col-6">
            <div class="icheck-primary">
              <input type="checkbox" name="avicoleUserConnecte" id="avicoleUserConnecte">
              <label for="resterConnecter" style="font-size: 13px">
                Rester connecter
              </label>
            </div>
          </div>

          <!-- /.col -->
          <div class="col-6">
            <button id="btn_login" type="submit" class="btn btn-primary btn-block" name="btn_login">Se connecter</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Mes fichier JS -->
<script type="text/javascript">
  var formValide = false;

  $('#loginId').on('keyup', function () {
    var loginId = $(this).val();
    $.getScript("functions/functions.js", function() {
      if (!isEmail(loginId)) {
        formValide = false;
        $('#loginId').addClass('is-invalid');
        $('#loginIdHelp').html("E-mail invalide.");
        $('#loginIdHelp').removeClass('invisible');
      }
      else {
        formValide = true;
        $('#loginId').removeClass('is-invalid');
        $('#loginIdHelp').addClass('invisible');
        $('#loginIdHelp').html("");
      }
    });
  });

  $('#password').on('keyup', function (e) {
    var password = $(this).val();
    if (password === '') {
      formValide = false;
      $('#password').addClass('is-invalid');
      $('#passwordHelp').html("Veillez saisir le mot de passe.");
      $('#passwordHelp').removeClass('invisible');
    }
    else {
      formValide = true;
      $('#password').removeClass('is-invalid');
      $('#passwordHelp').addClass('invisible');
      $('#passwordHelp').html("");
    }
  });

  $('#login_form').on('submit', function (e) {
    e.preventDefault();
    if (formValide === true) {
      if ($('.flash').hasClass('alert-success')) {
        $('.flash').removeClass('alert-success');
      } else if ($('.flash').hasClass('alert-danger')) {
        $('.flash').removeClass('alert-danger');
      }
      $('.flash').addClass('alert-info');
      $('.flash').html('<i class="fas fa-cog fa-spin"></i> Authentification...').fadeIn(300);

      var form = $(this);
      var method = form.prop('method');
      var url = form.prop('action');

      $.ajax({
        type: method,
        data: form.serialize() + "&btn_login=" + true,
        url: url,
        success: function(result) {
          donnee = JSON.parse(result);
          if (donnee['result'] === 'ok') {
            $('#loginIdHelp').html("");
            $('#passwordHelp').html("");
            $('#loginIdHelp').addClass('invisible');

            $('.flash').removeClass('alert-info').addClass('alert-success');
            $('.flash').html('<i class="fas fa-spinner fa-spin"></i> Connexion établie, redirection...')
            .fadeIn(300).delay(2500).fadeOut(300);
            window.location.href = "index.php?page=home";
          }
          else {
            $('#loginIdHelp').html(donnee['erreur']);
            $('#loginIdHelp').removeClass('invisible');

            $('.flash').removeClass('alert-info').addClass('alert-danger');
            $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['erreur'])
            .fadeIn(300).delay(2500).fadeOut(300);
          }
        }
      });
    }
  })
</script>
</body>

</html>