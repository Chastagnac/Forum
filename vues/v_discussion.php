<?php

/**
 * Vue Discussion
 *
 * PHP Version 7
 * @category  PROJET V6.0.0
 * @package   Le forum des geeks
 */
?>

<div name="top"></div>


<?php if ($_SESSION['role'] != '-1') { ?>
    <button class="btn-create" onclick="location.href='index.php?uc=gererTopic&action=insererTopic'">
        Créer un topic ?
    </button>
<?php } ?>
<div class="subforum">
    <div class="subforum-title">
        <h1>Sujet de discussion</h1>
    </div>
    <?php
    foreach ($topics as $topic => $top) {
        $id = $top['id'];
        $idcategorie = $top['idcategorie'];
        $idcompte = $top['idcompte'];
        $sujet = $top['sujet'];
        $question = $top['question'];
        $datecreation = $top['datecreation'];
        $auteur = $pdo->getInfosCompteById($idcompte);
    ?>
        <div class="subforum-row">
            <div class="subforum-icon subforum-column center">
                <i class="fa fa-file"></i>
            </div>
            <div class="suforum-description subforum-column center">
                <h1>
                    <a href="index.php?uc=discussion&action=discussion&id=<?php echo htmlspecialchars($id); ?>">
                        <?php echo htmlspecialchars($sujet) . " : " ?> </a>
                    </a>
                </h1>
                <p> <?php echo " " . htmlspecialchars($question) ?></p>
            </div>
            <div class="subforum-stats subforum-column">
                <i class="fa fa-address-book"></i>
            </div>
            <div class="subforum-info subforum-column">

                <b><a href="">Posté par </a></b> <b><a href=""><?php echo htmlspecialchars($auteur['prenom'] . " " . $auteur['nom']) ?></a></b>
                <br>
                le <small><?php echo htmlspecialchars($datecreation) ?></small>
            </div>
        </div>
    <?php
    } ?>
</div>
<br>
<!--Ancrage-->
<a href="#top"><i class="fa fa-anchor fa-3x white"></i></a>