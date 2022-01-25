<?php

/**
 * Vue 
 *
 * PHP Version 7
 * @category  Forum
 */

?>
?>

<head>
   
</head>


<div class="">
    <div class="">
        <div class="">
            <div class="">
                <div class="">
                    <div class="">
                        <h2>Topic</h2>
                    </div>
                    <ul>
                        <form class="white" id="form" method="post" action="index.php?uc=gererFiche&action=getFicheByCategorie">
                            <div>
                                <input type="checkbox" name="idcateg[]" value="1" id="1">
                                <label for="dev">Développement</label>
                            </div>
                            <div>
                                <input type="checkbox" name="idcateg[]" value="2" id="2">
                                <label for="idactuweb">Actus Web</label>
                            </div>
                            <div>
                                <input type="checkbox" name="idcateg[]" value="3" id="3">
                                <label for="mobile">Mobile</label>
                            </div>
                            <div>
                                <input type="checkbox" name="idcateg[]" value="4" id="4">
                                <label for="jeux">Jeux</label>
                            </div>
                            <div class="">
                                <button type="submit" class="blue">Valider categorie</button>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <div class="">
            <div class="">
                <?php if ($_SESSION['role'] != '-1') { ?>
                    <button class="" onclick="location.href='index.php?uc=gererFiche&action=insererFiche'">
                        Créer une fiche
                    </button>
                <?php } ?>
                <label for="terme">
                    <script src="../js/app.js"></script>
                    <form id="myForm" role="form" method="post" action="index.php?uc=gererFiche&action=Rechercher">
                        <input class="recherche" type="text" name="terme" style="color: black !important" id="terme" placeholder="Recherche d'article ...">
                        <button class="buttonRecherche" type="submit" alt="Lancer la recherche!">
                            <i class="fa">&#xf002;</i>
                        </button>
                        <span id="error"></span>
                    </form>
                </label>
            </div>
            <!-- Gallery item -->
            <?php
            $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
            if ($action !== 'getFicheByCategorie') {
                foreach ($fiches as $fiche) {
                    $id = $fiche['id'];
                    $idcategorie = $fiche['idcategorie'];
                    $idcompte = $fiche['idcompte'];
                    $libelle = $fiche['libelle'];
                    $description = $fiche['description'];
                    $contenu = $fiche['contenu'];
                    $datemodif = $fiche['datemodif'];
                    $datecreation = $fiche['datecreation'];
                    $likes = $fiche['nblike'];
                    $nbCommentaires = $pdo->getNbComment($id);
            ?>
                    <!--<div class="contenuArticle">-->
                    <div class="card white">
                        <div class="card-header white">
                            <p><?php echo htmlspecialchars($datecreation) ?></p>
                            <?php
                            if ($_SESSION['role'] != '-1') { ?>
                                <h4><a href="index.php?uc=gererFiche&action=visiterFiche&id=<?php echo $id; ?>" style="text-decoration : none;" class="text-dark">
                                        <?php echo htmlspecialchars($libelle) ?></a>
                                </h4>
                            <?php
                            } else { ?>
                                <h1><?php echo htmlspecialchars($libelle) ?></h1>
                            <?php
                            } ?>
                            <p><?php echo htmlspecialchars($description) ?> </p>
                        </div>
                        <div class="card-footer">
                            <div class="buttons">
                                <span class="comment white">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    <?php echo htmlspecialchars($nbCommentaires['nb']) ?></a>
                                </span>
                                <span class="like">
                                    <a class="fa fa-heart" style="text-decoration : none;" href="index.php?uc=gererFiche&action=likerFiche&id=<?= $id ?>"></a> <?= $likes ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php
                };
            } else {
                foreach ($fiches as $fiche) {
                    foreach ($fiche as $uneFiche) {
                        $id = $uneFiche['id'];
                        $idcategorie = $uneFiche['idcategorie'];
                        $idcompte = $uneFiche['idcompte'];
                        $libelle = $uneFiche['libelle'];
                        $description = $uneFiche['description'];
                        $contenu = $uneFiche['contenu'];
                        $datemodif = $uneFiche['datemodif'];
                        $datecreation = $uneFiche['datecreation'];
                        $likes = $uneFiche['nblike'];
                        $nbCommentaires = $pdo->getNbComment($id);
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <p><?php echo htmlspecialchars($datecreation) ?></p>
                                <?php
                                if ($_SESSION['role'] != '-1') { ?>
                                    <h4><a href="index.php?uc=gererFiche&action=visiterFiche&id=<?php echo $id; ?>" class="text-dark"><?php echo htmlspecialchars($libelle) ?></a>
                                    </h4>
                                <?php
                                } else { ?>
                                    <h1><?php echo htmlspecialchars($libelle) ?></h1>
                                <?php
                                } ?>
                            </div>
                            <div class="card-body">
                                <?php echo htmlspecialchars($description) ?>
                            </div>
                            <div class="card-footer">
                                <div class="buttons">
                                    <span class="comment white">
                                        <i class="fa fa-comment-o" aria-hidden="true"></i>
                                        <?php echo htmlspecialchars($nbCommentaires['nb']) ?></a>
                                    </span>
                                    <span class="like">
                                        <a class="fa fa-heart" style="text-decoration : none;" href="index.php?uc=gererFiche&action=likerFiche&id=<?= $id ?>"></a> <?= $likes ?>
                                    </span>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            } ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    let myForm = document.getElementById('myForm');

    myForm.addEventListener('submit', function(e) {
        let myInput = document.getElementById('terme');

        if (myInput.value.trim() == "") {
            let myError = document.getElementById('error');
            myError.innerHTML = "Le champ recherche d'article doit être rempli.";
            myError.style.color = 'red';
            e.preventDefault();
        }
    });
</script>