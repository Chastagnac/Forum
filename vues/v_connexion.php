<?php

/**
 * Vue Connexion inscription
 * 
 * PHP Version 7
 * @category  Forum
 */

?>


<head>
    <link href="../styles/stylesPages/authentification.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
</head>

<div class="main">Compte <?php $infos ?>
    <input type="checkbox" id="chk" aria-hidden="true">

    <div class="signup">
        <form role="form" method="post" action="index.php?uc=connexion&action=register">
            <label for="chk" aria-hidden="true">S'inscrire</label>
            <input type="text" name="mail" class="" placeholder="Email" maxlength="45">
            <input type="text" name="nom" class="" placeholder="Votre nom" id="logname" autocomplete="off">
            <input type="text" name="prenom" class="" placeholder="Votre prénom" id="logemail" autocomplete="off">
            <input type="password" name="mdp" class="" placeholder="Votre mot de passe" id="logpass" autocomplete="off">
            <input type="password" name="mdp2" class="" placeholder="Confirmez" id="logpass" autocomplete="off">
            <button type="submit">Inscription</button>

        </form>
    </div>

    <div class="login">

        <form role="form" method="post" action="index.php?uc=connexion&action=valideConnexion">
            <label for="chk" aria-hidden="true">Se connecter</label>
            <input type="text" name="mail" class="" placeholder="Votre email" id="logemail" autocomplete="off">
            <input type="password" name="mdp" class="" placeholder="Votre mot de passe" id="logpass" autocomplete="off">
            <button type="submit">Connection</button>
        </form>
    </div>
</div>