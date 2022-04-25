<?php

/**
 * Gestion des frais
 *
 * PHP Version 7
 * 
 * @category  PPE
 * @package   Forum
 * @link      http://www.php.net/manual/fr/book.pdo.php PHP Data Objects sur php.net
 */

$idCompte = $_SESSION['idCompte'];
$action = $_GET['action'];
$infosCompte = $pdo->getInfosCompteById($idCompte);

switch ($action) {
    case 'mesInformations':
        $comptes = $pdo->getAllAccounts();
        include('vues/v_mesInformations.php');
        break;
  
    case 'demandeEnregistrement':
        if (estConnecte()) {
            include 'vues/v_deconnexion.php';
        } else {
            ajouterErreur("Vous n'êtes pas connecté");
            include 'vues/v_erreurs.php';
            include 'vues/v_connexion.php';
        }
        break;
    case 'suppression':
        $id = $_GET['id'];
        $pdo->deleteCompte($id);
        $comptes = $pdo->getAllAccounts();
        include('vues/v_mesInformations.php');
        break;
    default:
        include 'vues/v_connexion.php';
        break;
}
