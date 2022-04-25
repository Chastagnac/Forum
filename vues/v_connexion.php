<?php

/**
 * Vue Conexion
 *
 * PHP Version 7
 * @category  PROJET V6.0.0
 * @package   Le forum des geeks
 */

?>

<body>
    <div class="container">
        <div class="logouser">
            <i class="fas fa-user"></i>
        </div>

        <div class="tab-body" data-id="connexion">
            <form role="form" method="POST" action="index.php?uc=connexion&action=valideConnexion">
                <div class="row">
                    <i class="far fa-user"></i>
                    <input type="email" name="mail" class="input" placeholder="Adresse Mail">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input placeholder="Mot de Passe" name="mdp" type="password" class="input">
                </div>
                <br>
                <button class="btn" type="submit">Connexion</button>
            </form>
        </div>

        <div class="tab-body" data-id="inscription">
            <form role="form" method="POST" action="index.php?uc=connexion&action=register">
                <div class="row">
                    <i class="far fa-user"></i>
                    <input type="email" name="mail" class="" placeholder="Adresse Mail">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="text" name="nom" class="" placeholder="Votre nom" autocomplete="off">

                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="text" name="prenom" class="" placeholder="Votre prénom" autocomplete="off">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="mdp" class="" placeholder="Mot de passe" autocomplete="off">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="mdp2" class="" placeholder="Confirmez" autocomplete="off">
                </div>
                <br>
                <button class="btn" type="submit">Inscription</button>
            </form>
        </div>

        <div class="tab-footer">
            <a class="tab-link active" data-ref="connexion" href="javascript:void(0)">Connexion</a>
            <a class="tab-link" data-ref="inscription" href="javascript:void(0)">Inscription</a>
        </div>
    </div>
</body>

</html>


<script>
    let tabs = document.querySelectorAll(".tab-link:not(.desactive)");

    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            unSelectAll();
            tab.classList.add("active");
            let ref = tab.getAttribute("data-ref");
            document
                .querySelector(`.tab-body[data-id="${ref}"]`)
                .classList.add("active");
        });
    });

    function unSelectAll() {
        tabs.forEach((tab) => {
            tab.classList.remove("active");
        });
        let tabbodies = document.querySelectorAll(".tab-body");
        tabbodies.forEach((tab) => {
            tab.classList.remove("active");
        });
    }

    document.querySelector(".tab-link.active").click();
</script>