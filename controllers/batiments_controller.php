<?php

$batiments = null;
if (isset($_GET['page']) AND !empty($_GET['page'])) {
  include("models/Batiments.php");
  $batiments = Batiments::getAll();
}

// Enregistrement nouveau bâtiment
if (isset($_POST['btn_save'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Batiments.php');

    $libelle = strSecur($_POST["libelle"]);
    $capacite = strSecur($_POST["capacite"]);
    $capacite = intval($capacite);
    $typeBatiment = strSecur($_POST["typeBatiment"]);

    $e_libelle = $e_type = $e_capacite = "";

    $succes = true;

    if (empty($libelle)) {
        $e_libelle = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if ($typeBatiment == "Choisir...") {
        $e_type = "Veillez choisir le type de bâtiment.";
        $succes = false;
    }

    if ($capacite <= 0) {
        $e_capacite = "Capacité invalide.";
        $succes = false;
    }

    if ($succes) {
        $batiment = Batiments::getByLibelle($libelle);
        if ($batiment['libelle'] == $libelle) {
            $message = "Ce libellé existe déjà";
            echo json_encode([
                'message' => $message,
                'success' => "existe"
            ]);
        }
        else {
            if (Batiments::insertWithoutStock($libelle, $capacite, $typeBatiment)) {
                $message = "Bâtiment crée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            }
            else {
                $message = "Erreur lors de l'enregistrement du bâtiment.";
                echo json_encode([
                    'success' => 'non',
                    'message' => $message
                ]);
            }
        }
    }
    else {
        echo json_encode([
            'success' => 'false',
            'libelle' => $e_libelle,
            'type' => $e_type,
            'capacite' => $e_capacite
        ]);
    }
}

// Modification d'un bâtiment
if (isset($_POST['btn_save_update'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Batiments.php');

    $libelle = strSecur($_POST["libelleUpdate"]);
    $capacite = strSecur($_POST["capaciteUpdate"]);
    $capacite = intval($capacite);
    $typeBatiment = strSecur($_POST["typeBatimentUpdate"]);
    $idModif = strSecur($_POST["idModif"]);

    $e_libelle = $e_type = $e_capacite = "";

    $succes = true;

    if (empty($libelle)) {
        $e_libelle = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if ($typeBatiment == "Choisir...") {
        $e_type = "Veillez choisir le type de bâtiment.";
        $succes = false;
    }

    if ($capacite <= 0) {
        $e_capacite = "Capacité invalide.";
        $succes = false;
    }

    if ($succes) {
        $lastBatiment = Batiments::getById($idModif);
        $batiment = Batiments::getByLibelle($libelle);
        if ($batiment['libelle'] === $libelle && $batiment['libelle'] !== $lastBatiment['libelle']) {
            $message = "Ce libellé existe déjà";
            echo json_encode([
                'message' => $message,
                'success' => "existe"
            ]);
        }
        else {
            if (Batiments::updateWithoutStock($libelle, $capacite, $typeBatiment, $idModif)) {
                $message = "Bâtiment modifié avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            }
            else {
                $message = "Erreur lors de la modification du bâtiment.";
                echo json_encode([
                    'success' => 'non',
                    'message' => $message
                ]);
            }
        }
    }
    else {
        echo json_encode([
            'success' => 'false',
            'libelle' => $e_libelle,
            'type' => $e_type,
            'capacite' => $e_capacite
        ]);
    }
}

// Suppression d'un bâtiment
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Batiments.php');

    $id = strSecur($_GET['idSuppr']);
    if (Batiments::delete($id)) {
        $message = "Bâtiment supprimé avec succès.";
        echo json_encode([
            'success' => 'oui',
            'message' => $message
        ]);
    }
    else {
        $message = "Erreur impossible de supprimer cette ligne.";
        echo json_encode([
            'success' => 'non',
            'message' => $message
        ]);
    }
}

// Récupération des info d'un bâtiment
if (isset($_GET['idDetail'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Batiments.php');

    $id = strSecur($_GET['idDetail']);
    $batiment = Batiments::getById($id);

    if ($batiment) {
        echo json_encode([
            'batiment' => $batiment
        ]);
    }
    else {
        echo json_encode([
            'batiment' => 'null'
        ]);
    }
}

// Récupération tous les bâtiments
if (isset($_GET['getAll'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/Batiments.php');

    $batiments = Batiments::getAll();

    if ($batiments) {
        $table = "";
        for ($j = 0; $j < count($batiments); $j++) {
            $n = $j+1;
            $table = $table.
                '<tr>
                    <td>'.$n.'</td>
                    <td>'.$batiments[$j]['libelle'].'</td>
                    <td>'.$batiments[$j]['capacite'].'</td>
                    <td>'.$batiments[$j]['type'].'</td>
                    <td>'.$batiments[$j]['stock_actuel'].'</td>
    
                    <td>
                        <div class="btn-group-horizontal">
                            <a class="btn btn-info link-update-button"
                               href="#" data-ligne-id="'.$batiments[$j]['id'].'"
                               data-bs-toggle="tooltip" title="Modifier"><span class="fas fa-edit"></span>
                            </a>
                            <a class="btn btn-danger link-delete-button"
                               href="#" data-ligne-id="'.$batiments[$j]['id'].'" data-ligne-nom="'.$batiments[$j]['libelle'].'"
                               data-bs-toggle="tooltip" title="Supprimer le bâtiment"><span class="fas fa-trash"></span>
                            </a>
                            <a class="btn btn-warning link-close-campagne-button"
                               href="#" data-ligne-id="'.$batiments[$j]['id'].'" data-ligne-nom="'.$batiments[$j]['libelle'].'"
                               data-bs-toggle="tooltip" title="Fermer la campagne actuelle pour le bâtiment"><span class="fas fa-times"></span>
                            </a>
                        </div>
                    </td>
                </tr>';
        }
        echo json_encode([
            'success' => 'oui',
            'batiment' => $table
        ]);
    }
    else {
        echo json_encode([
            'success' => 'non',
            'batiment' => 'null'
        ]);
    }
}