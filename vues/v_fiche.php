<?php

/**
 * Vue 
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
            <h4 class="">
                <?php echo $theFiche['libelle']; ?>
                </a></h4><br>
            <p class="">
                <?php echo $theFiche['description']; ?>
            </p>
            <p class="">
                <?php echo $theFiche['contenu']; ?>
            </p>
            <p class="t">
                <?php echo $theFiche['datecreation']; ?>
            </p>
            <div class="">
                <br>
                <?php if ($_SESSION['role'] == '1') { ?>
                    <a href="index.php?uc=gererFiche&action=modifierFiche&id=<?php echo $theFiche['id']; ?>" class="glyphicon glyphicon-pencil" style="text-decoration : none;"></a>
                    <a href="index.php?uc=gererFiche&action=suppression&id=<?php echo $theFiche['id']; ?>" class="glyphicon glyphicon-trash" style="text-decoration : none;"></a>
                <?php } ?>
                <div class="badge badge-danger px-3 rounded-pill font-weight-normal">Like <?php echo $theFiche['nblike'] ?></div>
            </div>
        </div>
    </div>
</div>
<form role="form" method="post" action="index.php?uc=gererFiche&action=insererCommentaire&id=<?php echo $theFiche['id']; ?>">
    <div class="">
        <div class="">
            <input type="text" class="" style="width: 70%;" name="commentaire" id="transparent-input" aria-describedby="emailHelp" placeholder="Ecrivez un commentaire ...">
        </div>
        <button type="submit" class="">Poster</button>
    </div>
</form>
<?php
foreach ($commentaires as $commentaire => $com) {
    $id = $com['id'];
    $commentaire = $com['commentaire'];
    $idAuteur = $com['idcompte'];
    $date = $com['date'];
    $auteur = $pdo->getInfosCompteById($idAuteur);
?>
    <div class="">
        <p class="">
            <?php echo htmlspecialchars($auteur['prenom'] . ' ' . $auteur['nom']); ?>
            <span class="">
                <i class="fa fa-comment-o" aria-hidden="true"><br></i>
            </span>
        <div class="">
            <?php echo htmlspecialchars($date);
            if ($_SESSION['role'] == '1' || $idAuteur == $_SESSION['idCompte']) { ?>
                <a href="index.php?uc=gererFiche&action=suppressioncomm&id=<?php echo $id; ?>&idfiche=<?php echo $theFiche['id']; ?>" class="glyphicon glyphicon-trash" style="text-decoration : none;"></a>
            <?php } ?>
        </div>
        </p>
        <div class="">
            <p><?php echo htmlspecialchars($commentaire); ?></p>
            <br>
        </div>
    </div>
<?php }
?>