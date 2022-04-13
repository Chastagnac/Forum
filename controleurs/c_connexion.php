<?php

/**
 * Gestion de la connexion
 *
 * PHP Version 7
 * @category  Projet
 * @package   Wiki Fiche
 * @link      http://www.php.net/manual/fr/book.pdo.php PHP Data Objects sur php.net
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if (!$uc) {
    $uc = 'demandeconnexion';
}

switch ($action) {
    case 'demandeConnexion':
        include 'vues/v_connexion.php';
        break;
    case 'valideConnexion':
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $compte = $pdo->getInfosCompte($mail, $mdp);
        if (is_array($compte)) {
            $id = $compte['id'];
            $nom = $compte['nom'];
            $prenom = $compte['prenom'];
            $role = $compte['role'];
            $xp = $compte['xp'];
            connecter($id, $nom, $prenom, $role, $xp);
            header('Location: index.php');
        } else {
            ajouterErreur('Email ou mot de passe incorrect');
            include 'vues/v_connexion.php';
            include 'vues/v_erreurs.php';
        }
        break;

    case 'forgotPassword':
        $infosCompte = $pdo->getInfo($_SESSION['idCompte']);
        $infosCompte['mail'];
        include 'vues/v_forgotPassword.php';
        break;
    case 'register':
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $mdp2 = filter_input(INPUT_POST, 'mdp2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        valideEnregistrement($nom, $prenom, $mail, $mdp, $mdp2);
        $infos = $pdo->getInfosCompte($mail, $mdp);
        if (nbErreurs() != 0) {
            include 'vues/v_connexion.php';
            include 'vues/v_erreurs.php';
        } else {

            $pdo->register(
                $prenom,
                $nom,
                $mdp,
                $mail
            );
            include 'vues/v_connexion.php';
        }
        break;
    default:
        include 'vues/v_connexion.php';
        break;
}
