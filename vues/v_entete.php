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
    <link rel="stylesheet" href="../styles/stylesPages/entete.css">
    <link rel="stylesheet" href="../styles/style.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <header class="header">
        <?php
        $uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        ?>
        <a href="index.php" class="logo">
            <img src="images/logo.png" alt="">
        </a>
        <nav class="navbar">
            <a href="index.php?uc=gererFiche&action=selectionnerFiche" <?php if (!$uc || $uc == 'accueil') { ?>class="active" <?php } ?>>Accueil</a>
            <a href="index.php?uc=discussion&action=home">Discussion</a>
        </nav>
        <div class="icons">
            <?php if (estConnecte()) { ?>
                <a href="index.php?uc=gererCompte&action=mesInformations"> <i class="fa fa-user fa-3x"></i></a>
            <?php } else {
            ?>
                <a href="index.php?uc=deconnexion&action=demandeDeconnexion"> <i class="fa fa-user fa-3x white"></i></a>
            <?php
            } ?>
        </div>
    </header>
</body>



<!-- <div class="">
        <?php
        $uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
        ?>
       

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
                        <?php if ($estConnecte) { ?>
                            <li <?php if ($uc == 'gererCompte') { ?>class="active" <?php } ?>>
                                <a href="index.php?uc=gererCompte&action=mesInformations">
                                    <span class="glyphicon glyphicon-user"></span>
                                    Mon compte
                                </a>
                            </li>
                        <?php
                        } ?>
                        <?php if (estConnecte()) { ?>
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
        </script> -->