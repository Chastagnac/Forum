<?php

/**
 * Vue Accueil
 *
 * PHP Version 7
 * @category  G4
 * @package   Wiki Fiche
 * @link      http://www.php.net/manual/fr/book.pdo.php PHP Data Objects sur php.net
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forum des geeks : Mon compte</title>
    <!-- <link rel="stylesheet" href="../styles/stylesPages/compte.css"> -->
</head>



<section class="main">
    <table>
        <tr>
            <td>Rôle</td>
            <td><?php echo (getLibelleRole($infosCompte['role'])) ?></td>
        </tr>
        <tr>
            <td>Nom/td>
            <td><?php echo $infosCompte['prenom'] ?></td>
        </tr>
        <tr>
            <td>Prénom</td>
            <td><?php echo (getLibelleRole($infosCompte['role'])) ?>
        </tr>
    </table>

</section>
<form method="post" action="index.php?uc=deconnexion&action=demandeDeconnexion">
    <button class="btn-danger" type="submit">Se déconnecter</button>
</form>

<section>
    <table>
        <tr>
            <td>Id</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Mail/td>
            <td>Rôle</td>
            <td>Xp</td>
            <td></td>
        </tr>
        <?php
        foreach ($comptes as $compte => $co) {
            $id = $co['id'];
            $prenom = $co['prenom'];
            $nom = $co['nom'];
            $mail = $co['mail'];
            $role = $co['role'];
            $xp = $co['xp'];
        ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $prenom ?></td>
                <td><?php echo $nom ?></td>
                <td><?php echo $mail ?></td>
                <td><?php echo (getLibelleRole($role)) ?></td>
                <td><?php echo $xp ?></td>
                <td><?php ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</section>



</div>
</div>

</html>