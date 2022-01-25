<?php

/**
 * Vue Déconnexion
 * *
 * PHP Version 7
 * @category  Forum
 */


deconnecter();
?>

<head>
</head>
<div class="">
    <p>Vous avez bien été déconnecté. Vous allez être redirigé vers la page de connexion <br>
    ou <a href="index.php">Cliquez ici.</a>
</div>


<?php
header("Refresh: 3;URL=index.php");
