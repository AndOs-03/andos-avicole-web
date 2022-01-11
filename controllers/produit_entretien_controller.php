<?php

$produits = null;
if (isset($_GET['page']) AND !empty($_GET['page'])) {
    include("models/ProduitsEntretien.php");
    $produits = ProduitsEntretien::getAll();
}

// Enregistrement nouveau produit
if (isset($_POST['btn_save'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/ProduitsEntretien.php');

    $libelle = strSecur($_POST["libelle"]);

    $e_libelle = "";
    $succes = true;

    if (empty($libelle)) {
        $e_libelle = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if ($succes) {
        $produit = ProduitsEntretien::getByLibelle($libelle);
        if ($produit['libelle'] == $libelle) {
            $message = "Ce libellé existe déjà";
            echo json_encode([
                'message' => $message,
                'success' => "existe"
            ]);
        }
        else {
            if (ProduitsEntretien::insert($libelle)) {
                $message = "Produit crée avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            }
            else {
                $message = "Erreur lors de l'enregistrement du produit.";
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
            'libelle' => $e_libelle
        ]);
    }
}

// Modification d'un produit
if (isset($_POST['btn_save_update'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/ProduitsEntretien.php');

    $libelle = strSecur($_POST["libelleUpdate"]);
    $idModif = strSecur($_POST["idModif"]);

    $e_libelle = "";
    $succes = true;

    if (empty($libelle)) {
        $e_libelle = "Ce champ ne doit pas être vide.";
        $succes = false;
    }

    if ($succes) {
        $lastProduit = ProduitsEntretien::getById($idModif);
        $produit = ProduitsEntretien::getByLibelle($libelle);
        if ($produit['libelle'] === $libelle && $produit['libelle'] !== $lastProduit['libelle']) {
            $message = "Ce libellé existe déjà";
            echo json_encode([
                'message' => $message,
                'success' => "existe"
            ]);
        }
        else {
            if (ProduitsEntretien::update($libelle, $idModif)) {
                $message = "Produit modifié avec succès.";
                echo json_encode([
                    'success' => 'true',
                    'message' => $message
                ]);
            }
            else {
                $message = "Erreur lors de la modification du produit.";
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
            'libelle' => $e_libelle
        ]);
    }
}

// Suppression d'un produit
if (isset($_GET['idSuppr'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/ProduitsEntretien.php');

    $id = strSecur($_GET['idSuppr']);
    if (ProduitsEntretien::delete($id)) {
        $message = "Produit supprimé avec succès.";
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

// Récupération des info d'un produit
if (isset($_GET['idDetail'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/ProduitsEntretien.php');

    $id = strSecur($_GET['idDetail']);
    $produit = ProduitsEntretien::getById($id);

    if ($produit) {
        echo json_encode([
            'produit' => $produit
        ]);
    }
    else {
        echo json_encode([
            'produit' => 'null'
        ]);
    }
}

// Récupération tous les produits
if (isset($_GET['getAll'])) {
    include('../functions/functions.php');
    include('../config/config.php');
    include('../config/db.php');
    include('../models/ProduitsEntretien.php');

    $produits = ProduitsEntretien::getAll();

    if ($produits) {
        $table = "";
        for ($j = 0; $j < count($produits); $j++) {
            $n = $j+1;
            $table = $table.
                '<tr>
                    <td>'.$n.'</td>
                    <td>'.$produits[$j]['libelle'].'</td>
    
                    <td class="text-right">
                        <div class="btn-group-horizontal">
                            <a class="btn btn-info link-update-button"
                               href="#" data-ligne-id="'.$produits[$j]['id'].'"
                               data-bs-toggle="tooltip" title="Modifier"><span class="fas fa-edit"></span>
                            </a>
                            <a class="btn btn-danger link-delete-button"
                               href="#" data-ligne-id="'.$produits[$j]['id'].'" data-ligne-nom="'.$produits[$j]['libelle'].'"
                               data-bs-toggle="tooltip" title="Supprimer le produit"><span class="fas fa-trash"></span>
                            </a>
                        </div>
                    </td>
                </tr>';
        }
        echo json_encode([
            'success' => 'oui',
            'produits' => $table
        ]);
    }
    else {
        echo json_encode([
            'success' => 'non',
            'produits' => 'null'
        ]);
    }
}