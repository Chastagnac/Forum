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


switch ($action) {
    case 'home':
        include 'vues/v_discussion.php';
        break;
    case 'valideConnexion':
        break;
    default:
        include 'vues/v_connexion.php';
        break;
}
