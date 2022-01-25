<?php

/**
 * Vue Accueil
 *
 * PHP Version 7
 * @category  Forum
 */

?>

<head>

</head>
<div class="">
    <div class="">
        <div class="">
            <!-- Gallery item -->
            <?php
            $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
            if ($action !== 'getFicheByCategorie') {
                if (count($mesFiches) > 0) {
                    foreach ($mesFiches as $fiche) {
                        $id = $fiche['id'];
                        $idcategorie = $fiche['idcategorie'];
                        $idcompte = $fiche['idcompte'];
                        $libelle = $fiche['libelle'];
                        $description = $fiche['description'];
                        $contenu = $fiche['contenu'];
                        $datemodif = $fiche['datemodif'];
                        $datecreation = $fiche['datecreation'];
                        $likes = $fiche['nblike'];
                        $etat = $fiche['etat'];
                        $nbCommentaires = $pdo->getNbComment($id);
            ?>
                        <div class="">
                            <div class="">
                                <?php echo htmlspecialchars($datecreation) ?>
                            </div>
                            <div>
                                <p><?php echo "Satut Fiche : " . getLibelleEtat($etat) ?></p>
                                <?php
                                if ($_SESSION['role'] != '-1') { ?>
                                    <h4>
                                        <a href="index.php?uc=gererFiche&action=visiterFiche&id=<?php echo $id; ?>" class=""><?php echo htmlspecialchars($libelle) ?></a>
                                    </h4>
                                <?php
                                } else { ?>
                                    <h1>
                                        <?php echo htmlspecialchars($libelle) ?>
                                    </h1>
                                <?php
                                } ?>
                            </div>
                            <div class="">
                                <mall><?php echo htmlspecialchars($description) ?></mall>
                            </div>
                            <div class="">
                                <div class="">
                                    <span class="">
                                        <i class="fa fa-comment-o" aria-hidden="true"></i>
                                        <?php echo htmlspecialchars($nbCommentaires['nb']) ?></a>
                                    </span>
                                    <span class="">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                        <?php echo htmlspecialchars($likes) ?>
                                    </span>
                                </div>
                            </div>
                            <div class="">
                                <a href="index.php?uc=gererFiche&action=modifierFiche&id=<?php echo $id; ?>" class="glyphicon glyphicon-pencil" style="text-decoration : none;"></a>
                                <a href="index.php?uc=gererFiche&action=suppression&id=<?php echo $id; ?>" class="glyphicon glyphicon-trash" style="text-decoration : none;"></a>
                            </div>
                        </div>
                        <!-- End -->
                    <?php
                    }
                } else {
                    ?>
                    <div class="" style="margin-top: 50px;">
                        Aucune Fiches
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>