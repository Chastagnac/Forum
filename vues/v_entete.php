<?php

/**
 * Vue Entête
 * PHP Version 7
 *
 * @category  Forum
 */
?>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <title>Wiki Fiche</title>
    <meta name="description" content="">
    <meta name="author" content="Léo Chastagnac, Romain Santiago">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="">
        <?php
        $uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
        if ($estConnecte) {
        ?>
            <div class="">
                <div class="">
                    <div class="">
                        <h1>
                            <img src="../images/wiki_fiche_2_1.png" class="" alt="Wiki fiche" title="wifi fiche">
                        </h1>
                    </div>

                    <div class="">
                        <ul class="">
                            <li <?php if (!$uc || $uc == 'accueil') { ?>class="active" <?php } ?>>
                                <a href="index.php">
                                    <span class="glyphicon glyphicon-home"></span>
                                    Accueil
                                </a>
                            </li>
                            <li <?php if ($uc == 'gererFiche') { ?>class="active" <?php } ?>>
                                <a href="index.php?uc=gererFiche&action=selectionnerFiche">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                    Les Fiches
                                </a>
                            </li>
                            <?php if ($_SESSION['role'] !== '-1') { ?>
                                <li <?php if ($uc == 'gererCompte') { ?>class="active" <?php } ?>>
                                    <a href="index.php?uc=gererCompte&action=mesInformations">
                                        <span class="glyphicon glyphicon-user"></span>
                                        Mon compte
                                    </a>
                                </li>
                            <?php
                            } ?>
                            <?php if ($_SESSION['role'] !== '-1') { ?>
                                <li <?php if ($uc == 'deconnexion') { ?>class="active" <?php } ?>>
                                    <a href="index.php?uc=deconnexion&action=demandeDeconnexion">
                                        <span class="glyphicon glyphicon-log-out"></span>
                                        Déconnexion
                                    </a>
                                </li>
                            <?php
                            } else { ?>
                                <li <?php if ($uc == 'deconnexion') { ?>class="active" <?php } ?>>
                                    <a href="index.php?uc=deconnexion&action=demandeEnregistrement">
                                        <span class="glyphicon glyphicon-user"></span>
                                        S'enregistrer
                                    </a>
                                </li>
                            <?php }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <script>
                const progress = document.querySelector('.progress-done');
                progress.style.width = progress.getAttribute('data-done') + '%';
                progress.style.opacity = 1;
            </script>
        <?php
        }
