<!DOCTYPE html>
<html lang="fr">

<head>
    <title>AndOs Avicole | Produits Entretien</title>

    <?php include_once 'includes/head.php' ?>
    <?php //include_once 'includes/css_datatables_includes.php' ?>
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="assets/images/logo.png" alt="LOGO" height="60" width="60">
    </div>

    <?php
        include_once 'views/includes/header.php';
        include_once 'views/includes/main_menu.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <?php include('views/includes/flash.php'); ?>
                </div>

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestion des produits d'entretien</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">Accueil</a></li>
                            <li class="breadcrumb-item active">produits entretien</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card card-blue collapsed-card">
                            <!-- card-header -->
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-plus-square"></i>
                                    Créer nouveau
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>


                            <!-- corps  -->
                            <div class="card-body">
                                <form id="formAddData" name="formAddData" action="controllers/produit_entretien_controller.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Libellé</label>
                                                <div class="form-group input-group mb-0">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <span class="fas fa-ad"></span>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control browser-default"
                                                           placeholder="ex: COPAUX" name="libelle" id="libelle" required maxlength="100">
                                                </div>
                                                <div class="mb-3">
                                                    <small id="libelleHelp" class="text-danger invisible"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary right" name="btn_save">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-12">

                        <div class="card card-blue">
                            <!-- card-header -->
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-tag"></i>
                                    Liste des produits d'entretien
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table id="dg_1" class="table table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>N°</th>
                                                <th>Libellé</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-data-body">
                                        <?php
                                        for ($j = 0; $j < count($produits); $j++) {
                                            ?>
                                            <tr>
                                                <td><?php echo ($j+1); ?></td>
                                                <td> <?php echo htmlspecialchars($produits[$j]['libelle']); ?> </td>

                                                <!-- ACTIONS -->
                                                <td class="text-right">
                                                    <div class="btn-group-horizontal">
                                                        <a class="btn btn-info link-update-button"
                                                           href="#" data-ligne-id="<?= $produits[$j]['id'] ?>"
                                                           data-bs-toggle="tooltip" title="Modifier"><span class="fas fa-edit"></span>
                                                        </a>
                                                        <a class="btn btn-danger link-delete-button"
                                                           href="#" data-ligne-id="<?= $produits[$j]['id'] ?>" data-ligne-nom="<?= $produits[$j]['libelle'] ?>"
                                                           data-bs-toggle="tooltip" title="Supprimer le produit"><span class="fas fa-trash"></span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Modal confirmation de supression-->
    <div class="modal fade" id="deleteModal1" tabindex="-1" aria-labelledby="deleteModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal1Label">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p class="delecte-msg-body"></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>
                    <a type="button" class="btn btn-danger link-modal-delete-ligne" href="">
                        Supprimer
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modale de modification -->
    <div class="modal fade" id="updateModal1" tabindex="-1" aria-labelledby="updateModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModal1Label">Modification d'un bâtiment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="formUpdateData" name="formUpdateData" action="controllers/produit_entretien_controller.php" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Libellé</label>
                                    <div class="form-group input-group mb-6">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-ad"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control browser-default"
                                               placeholder="ex: COPAUX" name="libelleUpdate" id="libelleUpdate" required maxlength="100">
                                    </div>
                                    <div class="mb-3">
                                        <small id="libelleHelpUpdate" class="text-danger invisible"></small>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="idModif" name="idModif">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary right" name="btn_save_update">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!--FOOTER-->
<?php
include_once 'includes/footer.php';
?>

<!-- script spécifique à la page -->
<!--<script src="js/datatables.js"></script>-->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="js/templates/adminlte.js"></script>

<?php
//    include_once 'views/includes/js_datatables_includes.php';
?>
<!--<script src="js/datatables.js"></script>-->

<script type="text/javascript">
  function initializeFlash() {
    if ($('.flash').hasClass('alert-success')) {
      $('.flash').removeClass('alert-success');
    } else if ($('.flash').hasClass('alert-danger')) {
      $('.flash').removeClass('alert-danger');
    } else if ($('.flash').hasClass('alert-warning')) {
      $('.flash').removeClass('alert-warning');
    } else if ($('.flash').hasClass('alert-info')) {
      $('.flash').removeClass('alert-info');
    }
  }

  $(".link-delete-button").on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('ligne-id');
    var nom = $(this).data('ligne-nom');
    $(".delecte-msg-body").html("Etes-vous sur de vouloir supprimer le produit : " + nom + " ?");
    $(".link-modal-delete-ligne").attr("href", id);
    $("#deleteModal1").modal('toggle');
  });

  $(".link-modal-delete-ligne").on('click', function (e) {
    e.preventDefault();
    initializeFlash();

    $("#deleteModal1").modal('toggle');
    var id = $(".link-modal-delete-ligne").attr("href");

    $('.flash').addClass('alert-info');
    $('.flash').html('<i class="fas fa-cog fa-spin"></i> Suppression...').fadeIn(300);

    $.ajax({
      type: "GET",
      data: "&idSuppr=" + id,
      url: "controllers/produit_entretien_controller.php",
      success: function (result) {
        donnee = JSON.parse(result);
        if (donnee['success'] === 'oui') {
          initializeFlash();
          $('.flash').addClass('alert-success');
          $('.flash').html('<i class="fas fa-check"></i> ' + donnee['message'])
            .fadeIn(300).delay(2500).fadeOut(300);

          $.ajax({
            type: "GET",
            data: "getAll=" + true,
            url: "controllers/produit_entretien_controller.php",
            success: function (result) {
              donnee = JSON.parse(result);
              if (donnee['success'] === 'oui') {
                $('.table-data-body').html(donnee['produits']);
              }
            }
          });
        }
        else if (donnee['success'] === 'non') {
          $('.flash').removeClass('alert-info').addClass('alert-danger');
          $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['erreur'])
            .fadeIn(300).delay(2500).fadeOut(300);
        }
        else {
          $('.flash').removeClass('alert-info').addClass('alert-danger');
          $('.flash').html('<i class="fas fa-exclamation-circle"></i> Erreur inconnue')
            .fadeIn(300).delay(2500).fadeOut(300);
        }
      }
    })
  });

  $('#formAddData').on('submit', function (e) {
    e.preventDefault();
    initializeFlash();

    var submit = true;
    var libelle = $('#libelle').val();

    // Vérification du libelle
    if (libelle === '') {
      $('#libelle').addClass('is-invalid');
      $('#libelleHelp').html("Ce champ ne doit pas être vide.");
      $('#libelleHelp').removeClass('invisible');
      submit = false;
    } else {
      $('#libelle').removeClass('is-invalid');
      $('#libelleHelp').addClass('invisible');
      $('#libelleHelp').html("");
    }

    if (submit === true) {
      initializeFlash();
      $('.flash').addClass('alert-info');
      $('.flash').html('<i class="fas fa-cog fa-spin"></i> Création...').fadeIn(300);

      var form = $(this);
      var method = form.prop('method');
      var url = form.prop('action');

      $.ajax({
        type: method,
        data: form.serialize() + "&btn_save=" + true,
        url: url,
        success: function (result) {
          donnee = JSON.parse(result);
          if (donnee['success'] === 'existe') {
            $('#libelle').addClass('is-invalid');
            $('#libelleHelp').html(donnee['message']);
            $('#libelleHelp').removeClass('invisible');

            $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                .fadeIn(300).delay(2500).fadeOut(300);
          }
          if (donnee['success'] === 'true') {
            $('#libelle').val("");
            $('#libelleHelp').html("").addClass('invisible');

            initializeFlash();
            $('.flash').addClass('alert-success');
            $('.flash').html('<i class="fas fa-check"></i> ' + donnee['message'])
                .fadeIn(300).delay(2500).fadeOut(300);

            $.ajax({
              type: "GET",
              data: "getAll=" + true,
              url: "controllers/produit_entretien_controller.php",
              success: function (result) {
                donnee = JSON.parse(result);
                if (donnee['success'] === 'oui') {
                  $('.table-data-body').html(donnee['produits']);
                }
              }
            });
          }
          if (donnee['success'] === 'non') {
            initializeFlash();
            $('.flash').addClass('alert-danger');
            $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                .fadeIn(300).delay(2500).fadeOut(300);
          }
          if (donnee['success'] === 'false') {
            $('#libelleHelp').html(donnee['libelle']);
            $('#libelleHelp').removeClass('invisible');

            initializeFlash();
            $('.flash').addClass('alert-danger');
            $('.flash').html('<i class="fas fa-exclamation-circle"></i> Vérifiez les champs')
                .fadeIn(300).delay(2500).fadeOut(300);
          }
        }
      });
    }
  });

  $(".link-update-button").on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('ligne-id');
    $.ajax({
      method: "GET",
      data: "idDetail=" + id,
      url: "controllers/produit_entretien_controller.php",
      success: function(result) {
        donnees = JSON.parse(result);
        batiment  = donnees['produit'];

        if (batiment !== 'null') {
          $('#libelleUpdate').val(batiment['libelle']);
          $('#idModif').val(batiment['id']);
        }
      }
    });

    $("#updateModal1").modal('toggle');
  });

  $('#formUpdateData').on('submit', function (e) {
    e.preventDefault();
    $("#updateModal1").modal('toggle');
    initializeFlash();

    var submit = true;
    var libelle = $('#libelleUpdate').val();

    // Vérification du libelle
    if (libelle === '') {
      $('#libelleUpdate').addClass('is-invalid');
      $('#libelleHelpUpdate').html("Ce champ ne doit pas être vide.");
      $('#libelleHelpUpdate').removeClass('invisible');
      submit = false;
    } else {
      $('#libelleUpdate').removeClass('is-invalid');
      $('#libelleHelpUpdate').addClass('invisible');
      $('#libelleHelpUpdate').html("");
    }

    if (submit === true) {
      initializeFlash();
      $('.flash').addClass('alert-info');
      $('.flash').html('<i class="fas fa-cog fa-spin"></i> Modification...').fadeIn(300);

      var form = $(this);
      var method = form.prop('method');
      var url = form.prop('action');

      $.ajax({
        type: method,
        data: form.serialize() + "&btn_save_update=" + true,
        url: url,
        success: function (result) {
          donnee = JSON.parse(result);
          if (donnee['success'] === 'existe') {
            initializeFlash();
            $('#libelleUpdate').addClass('is-invalid');

            $('#libelleHelpUpdate').html(donnee['message']);
            $('#libelleHelpUpdate').removeClass('invisible');

            $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                .fadeIn(300).delay(2500).fadeOut(300);
          }
          if (donnee['success'] === 'true') {
            $('#libelleUpdate').val("");
            $('#libelleHelpUpdate').html("").addClass('invisible');

            initializeFlash();
            $('.flash').addClass('alert-success');
            $('.flash').html('<i class="fas fa-check"></i> ' + donnee['message'])
                .fadeIn(300).delay(2500).fadeOut(300);

            $.ajax({
              type: "GET",
              data: "getAll=" + true,
              url: "controllers/produit_entretien_controller.php",
              success: function (result) {
                donnee = JSON.parse(result);
                if (donnee['success'] === 'oui') {
                  $('.table-data-body').html(donnee['produits']);
                }
              }
            });
          }
          if (donnee['success'] === 'non') {
            initializeFlash();
            $('.flash').addClass('alert-danger');
            $('.flash').html('<i class="fas fa-exclamation-circle"></i> ' + donnee['message'])
                .fadeIn(300).delay(2500).fadeOut(300);
          }
          if (donnee['success'] === 'false') {
            $('#libelleHelpUpdate').html(donnee['libelle']);
            $('#libelleHelpUpdate').removeClass('invisible');

            initializeFlash();
            $('.flash').addClass('alert-danger');
            $('.flash').html('<i class="fas fa-exclamation-circle"></i> Vérifiez les champs')
                .fadeIn(300).delay(2500).fadeOut(300);
          }
        }
      });
    }
  });
</script>
</body>

</html>