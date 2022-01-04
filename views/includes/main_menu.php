<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="assets/images/logo.png" alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AndOs Avicole</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Rechercher"
               aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
          data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

        <li class="nav-item menu-open">
          <a href="index.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Tableau de bord</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Les etats de gestion
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../pages/etats/EtatListeClients.php" class="nav-link" target="_blank">
                <i class="fas fa-file nav-icon"></i>
                <p>Liste des clients</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/etats/EtatListeConsultants.php" class="nav-link" target="_blank">
                <i class="fas fa-file nav-icon"></i>
                <p>Liste des consultants</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/etats/EtatListeRapports.php" class="nav-link" target="_blank">
                <i class="fas fa-file nav-icon"></i>
                <p>Liste des rapports consultant</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link link-etat-choix-date"
                 data-lien-page="EtatDeclarationsClient.php">
                <i class="fas fa-file nav-icon"></i>
                <p>États déclarations client</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link link-etat-choix-date"
                 data-lien-page="EtatDeclarationsNonPayees.php">
                <i class="fas fa-file nav-icon"></i>
                <p>États déclarations non payées</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/etats/EtatMensualiteClient.php" class="nav-link" target="_blank">
                <i class="fas fa-file nav-icon"></i>
                <p>Liste des mensualités</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link link-etat-choix-date"
                 data-lien-page="EtatDocumentCollectes.php">
                <i class="fas fa-file nav-icon"></i>
                <p>États documents collectés</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
              Gestion des bâtiments
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?page=batiments" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Bâtiments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=produit_entretien" class="nav-link">
                <i class="fas fa-bell nav-icon"></i>
                <p>Produits entretien</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=achat_produit" class="nav-link">
                <i class="fas fa-money-bill-alt nav-icon"></i>
                <p>Achat de produits</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
              Gestion consultants
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../pages/consultants.php" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>Liste des consultants</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/activites_consultant.php" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>Activités</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/rapport_consultant.php" class="nav-link">
                <i class="nav-icon fas fa-book-open"></i>
                <p>Rapport</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/taches_consultant.php" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>Tâches</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">CONFIGURATIONS</li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
              Structures
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../pages/impot_taxe.php" class="nav-link">
                <i class="fas fa-cog nav-icon"></i>
                <p>Impôts et taxes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/documents_client.php" class="nav-link">
                <i class="fas fa-users-cog nav-icon"></i>
                <p>Documents client</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/parametre_relance_notif.php" class="nav-link">
                <i class="fas fa-cog nav-icon"></i>
                <p>Paramètre relances notifications</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Paramètres
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../pages/info_societe.php" class="nav-link">
                <i class="fas fa-list-alt nav-icon"></i>
                <p>Informations société</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../pages/gestion_users.php" class="nav-link">
                <i class="fa fa-users nav-icon"></i>
                <p>Gestion des utilisateurs</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<div class="modal fade" id="choixDateModal1" tabindex="-1" aria-labelledby="choixDateModal1Label"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="choixDateModal1Label">Definir les intervalles de date</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="formChoixIntervalleDate" name="formChoixIntervalleDate" action="" method="POST"
              enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Date début</label>
                <div class="form-group input-group mb-6">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-calendar-day"></span>
                    </div>
                  </div>
                  <input type="date" class="form-control browser-default"
                         placeholder="01/01/1999" value="<?= date("Y-m-d"); ?>"
                         name="dateDebut" id="dateDebut" required>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Date fin</label>
                <div class="form-group input-group mb-6">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-calendar-day"></span>
                    </div>
                  </div>
                  <input type="date" class="form-control browser-default"
                         placeholder="01/01/1999" value="<?= date("Y-m-d"); ?>"
                         name="dateFin" id="dateFin" required>
                </div>
              </div>
            </div>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary right" name="btn-visualiser"
                    id="btn-visualiser" data-lien-page="">
              Visualiser
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">
  $(".link-etat-choix-date").on('click', function (e) {
    e.preventDefault();
    $lienPage = $(this).data('lien-page');
    $("#btn-visualiser").data('lien-page', $lienPage);

    $("#choixDateModal1").modal('toggle');
  });

  $("#btn-visualiser").on('click', function (e) {
    e.preventDefault();
    var dateDebut = $('#dateDebut').val();
    var dateFin = $('#dateFin').val();
    var lienPage = $(this).data('lien-page');

    var url = "../pages/etats/" + lienPage + "?dateDebut=" + dateDebut + "&dateFin=" + dateFin;
    window.open(url, '_blanc');
  });


</script>