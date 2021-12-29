<header>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index.php?page=home" class="nav-link">Accueil</a>
            </li>

            <li class="nav-item dropdown d-none d-sm-inline-block">
                <a class="nav-link" data-toggle="dropdown" href="#">Fichier</a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <a href="../bd/deconnexion.php" class="dropdown-item">
                        <i class="fas fa-power-off mr-2"></i> Se déconnecter
                    </a>
                    <div class=" dropdown-divider">
                    </div>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-award mr-2"></i> Licence d'utilisation
                    </a>
                </div>
            </li>

            <li class="nav-item dropdown d-none d-sm-inline-block">
                <a class="nav-link" data-toggle="dropdown" href="#">Etats</a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <a href="../pages/etats/EtatListeClients.php" class="dropdown-item" target="_blank">
                        <i class="fas fa-file-alt mr-2"></i> Liste des clients
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="../pages/etats/EtatListeConsultants.php" class="dropdown-item" target="_blank">
                        <i class="fas fa-file-alt mr-2"></i> Liste des consultants
                    </a>
                    <a href="../pages/etats/EtatListeRapports.php" class="dropdown-item" target="_blank">
                        <i class="fas fa-file-alt mr-2"></i> Liste des rapports consultant
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item link-etat-choix-date"
                       data-lien-page="EtatDeclarationsClient.php">
                        <i class="fas fa-file-alt mr-2"></i> États déclarations client
                    </a>
                    <a href="#" class="dropdown-item link-etat-choix-date"
                       data-lien-page="EtatDeclarationsNonPayees.php">
                        <i class="fas fa-file-alt mr-2"></i> États déclarations non payées
                    </a>
                    <a href="../pages/etats/EtatMensualiteClient.php" class="dropdown-item" target="_blank">
                        <i class="fas fa-file-alt mr-2"></i> Liste des mensualités
                    </a>
                    <a href="#" class="dropdown-item link-etat-choix-date"
                       data-lien-page="EtatDocumentCollectes.php">
                        <i class="fas fa-file-alt mr-2"></i> États documents collectés
                    </a>
                </div>
            </li>

            <li class="nav-item dropdown d-none d-sm-inline-block">
                <a class="nav-link" data-toggle="dropdown" href="#">?</a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-info-circle mr-2"></i> A propos de E-Expert Gestion Cabinet
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-question-circle mr-2"></i> Aide
                    </a>
                </div>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Rechercher"
                                   aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Compte d'utilisateur -->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="assets/images/users/user_default.jpg"
                         class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline"><?= "AndOs" ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="assets/images/users/user_default.jpg" class="img-circle elevation-2" alt="User Image">

                        <p>
                            <?= "AndOs" ?>
                            <small><?= "Administrateur" ?></small>
                        </p>
                    </li>

                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="../pages/profile.php" class="btn btn-default btn-flat">Mon profile</a>
                        <a href="../bd/deconnexion.php"
                           class="btn btn-default btn-flat float-right">Déconnexion</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
</header>