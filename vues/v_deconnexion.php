<?php

/**
 * Vue Déconexion
 *
 * PHP Version 7
 * @category  PROJET V6.0.0
 * @package   Le forum des geeks
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
