<?php

/**
 * Vue Entete
 *
 * PHP Version 7
 * @category  PROJET V6.0.0
 * @package   Le forum des geeks
 */
?>
<!DOCTYPE html>
<html>

<head>
    <title>Forum des geeks</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <html lang="fr">
    <meta name="description" content="">
    <meta name="author" content="Léo Chastagnac, Romain Santiago">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="forum, informatique, film, jeux vidéos" />
    <link rel="stylesheet" href="../styles/stylesPages/entete.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="../images/gekk.jpg">
</head>


<div class="header">
    <?php
    $uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    ?>
    <a href="index.php" class="logo">
        <img src="images/logo.png" alt="">
    </a>
    <nav class="navbar">
        <a href="index.php" <?php if (!$uc || $uc == 'accueil') { ?>class="active" <?php } ?>>Accueil</a>
        <a href="index.php?uc=discussion&action=home">Discussion</a>
    </nav>
    <?php if (estConnecte()) {
    ?>
        <div class="icons">
            <a href="index.php?uc=gererCompte&action=mesInformations"> <i class="fa fa-user fa-3x white"></i></a>
        </div>
    <?php
    } else { ?>
        <div class="icons">
            <a href="index.php?uc=gererCompte&action=mesInformations"> <i class="fa fa-user-plus fa-3x white"></i></a>
        </div>
    <?php } ?>
</div>