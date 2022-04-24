<?php

/**
 * Gestion de la connexion
 *
 * PHP Version 7
 * @category  Projet
 * @package   Wiki Fiche
 * @link      http://www.php.net/manual/fr/book.pdo.php PHP Data Objects sur php.net
 */

$action = $_GET['action'];
$idCompte = $_SESSION['idCompte'];

switch ($action) {
    case 'home':
        $topics = $pdo->getTopics();
        include 'vues/v_discussion.php';
        break;
    case 'discussion':
        $id = $_GET['id'];
        $topic = $pdo->getTopicById($id);
        $commentaires = $pdo->getComment($id);
        include 'vues/v_topics.php';
        break;
    case 'insert':
        $idTopic = $_GET['id'];
        $commentaire = $_POST['commentaire'];
        if (nbErreurs() !== 0) {
            include 'vues/v_erreurs.php';
        } else {
            $pdo->updateXp($idCompte, 5);
            $pdo->insertComment($idTopic, $idCompte, $commentaire);
            header("Location: index.php?uc=discussion&action=discussion&id=$idTopic");
        }
        break;
    case 'suppressioncomm':
        $idCom = $_GET['id'];
        $idTopic = $_GET['idtopic'];
        $pdo->deleteComm($idCom);
        header("Location: index.php?uc=discussion&action=discussion&id=$idTopic");
        break;
    default:
        include 'vues/v_connexion.php';
        break;
}
