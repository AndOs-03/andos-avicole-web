<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once 'includes/head.php' ?>
  <title>AndOs Avicole | Connexion</title>

  <!-- Mes fichiers style CSS -->
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/main.css">
</head>


<body class="hold-transition login-page">
<div class="alert alert-warning alerte-zone" role="alert">
  This is a warning alert—check it out!
</div>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="login-app-title"><b>AndOs Avicole</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Connectez vous pour démarrer</p>

      <form ID="Form_Login" name="Form_Login" action="controllers/login_controller.php"
            method="POST">
        <div class="form-group input-group mb-3">
          <input type="email" class="form-control browser-default" placeholder="E-mail"
                 name="loginId" id="loginId" maxlength="255" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="form-group input-group mb-3">
          <input type="password" class="form-control browser-default" placeholder="Mot de passe"
                 name="password" id="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <p class="mb-1">
          <a href="forgot_password_view.php">Mot de passe oublié ?</a>
        </p>

        <div class="row">
          <div class="col-6">
            <div class="icheck-primary">
              <input type="checkbox" name="resterConnecter" id="resterConnecter">
              <label for="resterConnecter" style="font-size: 13px">
                Rester connecter
              </label>
            </div>
          </div>

          <!-- /.col -->
          <div class="col-6">
            <button id="btnLogin" type="submit" class="btn btn-primary btn-block"
                    onclick="" name="btnLogin">Se connecter
            </button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->1


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>

<!-- Mes fichier JS -->
<script src="js/login.js"></script>
</body>

</html>