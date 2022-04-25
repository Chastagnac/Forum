<?php

/**
 * Gestion des fiches
 *
 * PHP Version 7
 * 
 * @category  PPE
 * @package   Wiki Fiche
 * @link      http://www.php.net/manual/fr/book.pdo.php PHP Data Objects sur php.net
 */

$idCompte = $_SESSION['idCompte'];
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$infosCompte = $pdo->getInfosCompteById($idCompte);
$etatCompte = getEtatCompte($infosCompte['role']);

switch ($action) {
    case 'insererTopic':
        include('vues/v_creerTopic.php');
        break;
    case 'insert':
        //idcateg by default..
        $idCategorie = 1; 
        $sujet = $_POST['sujet'];
        $question = $_POST['question'];
        if (nbErreurs() !== 0) {
            include 'vues/v_erreurs.php';
            include 'vues/v_creerTopic.php';
        } else {
            $topics = $pdo->insertTopic($idCategorie, $idCompte, $sujet, $question);
            if($etatCompte === 'VA') {
               $pdo->updateXp($idCompte, 35);
            }
            $topics = $pdo->getTopics();
            include 'vues/v_discussion.php';
        }
        break;

    
    case 'suppression':
        $idTopic = $_GET['id'];
        $pdo->deleteTopic($idTopic);
        $topics = $pdo->getTopics();
        include 'vues/v_discussion.php';
        break;
    case 'insererCommentaire':
        $idFiche = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $commentaire = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_STRING);
        if (nbErreurs() !== 0) {
            include 'vues/v_erreurs.php';
        } else {
            $pdo->updateXp($idCompte, 5);
            $pdo->insertComment($idCompte, $idFiche, $commentaire);
            header("Location: index.php?uc=gererFiche&action=visiterFiche&id=$idFiche");
        }
        break;
    case 'suppressioncomm':
        $idCom = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $idFiche = filter_input(INPUT_GET, 'idfiche', FILTER_SANITIZE_NUMBER_INT);
        $pdo->deleteComm($idCom);
        header("Location: index.php?uc=gererFiche&action=visiterFiche&id=$idFiche");
        break;
}
