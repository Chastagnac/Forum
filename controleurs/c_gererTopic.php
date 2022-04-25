<?php

/**
 * Gestion des Topics
 *
 * PHP Version 7
 * 
 * @category  PPE
 * @package   Forum
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
}
