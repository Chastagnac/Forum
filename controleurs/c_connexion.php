<?php

/**
 * Gestion de la connexion
 *
 * PHP Version 7
 * @category  Projet
 * @package   Forum
 * @link      http://www.php.net/manual/fr/book.pdo.php PHP Data Objects sur php.net
 */

$action = $_GET['action'];
if (!$uc) {
    $uc = 'demandeconnexion';
}

switch ($action) {
    case 'demandeConnexion':
        include 'vues/v_connexion.php';
        break;
    case 'valideConnexion':
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
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
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        $mdp2 = $_POST['mdp2'];
        console_log($nom);
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
