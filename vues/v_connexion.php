<?php

/**
 * Vue Connexion inscription
 * 
 * PHP Version 7
 * @category  Forum
 */

?>
<head>
    <link href="../styles/stylesPages/login.css" rel="stylesheet">
</head>

<body>

    <form role="form" method="post" action="index.php?uc=connexion&action=valideConnexion">
        <h4 class="">Se connecter</h4>
        <div class="">
            <input type="text" name="mail" class="" placeholder="Votre email" id="logemail" autocomplete="off">
            <i class="iconify" data-icon="ic:sharp-alternate-email"></i>
        </div>
        <div class="">
            <input type="password" name="mdp" class="" placeholder="Votre mot de passe" id="logpass" autocomplete="off">
            <i class="iconify" data-icon="uil:lock-alt"></i>
        </div>
        <input type="submit" class="" value="Connexion">
        <p class=""><a href="index.php?uc=connexion&action=visiteur" class="">Que de passage ?</a></p>
        <p class=""><a href="index.php?uc=connexion&action=forgotPassword" class="">Mot de passe oublié ?</a></p>

    </form>

    <form role="form" method="post" action="index.php?uc=connexion&action=register">
        <br>
        <h4 class="">Inscription</h4>
        <div class="form-group mt-2">
            <input type="text" name="mail" class="" placeholder="Email" name="Votre mail" maxlength="45">
            <i class="iconify" data-icon="ic:sharp-alternate-email"></i>
        </div>
        <div class="form-group mt-2">
            <input type="text" name="nom" class="" placeholder="Votre nom" id="logname" autocomplete="off">
            <i class="iconify" data-icon="ant-design:user-outlined"></i>
        </div>
        <div class="form-group mt-2">
            <input type="text" name="prenom" class="" placeholder="Votre prénom" id="logemail" autocomplete="off">
            <i class="iconify" data-icon="ant-design:user-outlined"></i>
        </div>
        <div class="">
            <input type="password" name="mdp" class="" placeholder="Votre mot de passe" id="logpass" autocomplete="off">
            <i class="iconify" data-icon="carbon:password"></i>
        </div>
        <div class="">
            <input type="password" name="mdp2" class="" placeholder="Confirmez votre mot de passe" id="logpass" autocomplete="off">
            <i class="iconify" data-icon="carbon:password"></i>
        </div>
        <input type="submit" class="" value="S'inscrire">
    </form>

