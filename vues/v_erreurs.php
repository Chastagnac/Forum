<?php
/**
 * Vue Erreurs
 *
 * PHP Version 7
 *
 * @category  Forum
 */

?>
<div class="" role="alert">
    <?php
    foreach ($_REQUEST['erreurs'] as $erreur) {
        echo '<p style="color : red !important;">' . htmlspecialchars($erreur) . '</p>';
    }
    ?>
</div>