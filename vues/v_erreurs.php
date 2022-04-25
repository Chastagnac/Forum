<?php

/**
 * Vue Erreurs
 *
 * PHP Version 7
 * @category  PROJET V6.0.0
 * @package   Le forum des geeks
 */

?>
<div class="" role="alert">
    <?php
    foreach ($_REQUEST['erreurs'] as $erreur) {
        echo '<p style="color : red !important;">' . htmlspecialchars($erreur) . '</p>';
    }
    ?>
</div>