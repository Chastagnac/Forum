<?php

/**
 * Gestion de l'accueil
 *
 * PHP Version 7
 * @category  PPE
 * @package    Forum
 * @link      http://www.php.net/manual/fr/book.pdo.php PHP Data Objects sur php.net
 */


// $idCompte = $_SESSION['idCompte'];

$hotTopics = $pdo->getTopics();
include 'vues/v_accueil.php';



