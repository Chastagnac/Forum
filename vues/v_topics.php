<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="../styles/stylesPages/topic.css"> -->
</head>


<section class="main">
    <div class="croix">
        <?php if ($_SESSION['role'] == '1') { ?>
            <a class="croix" href="index.php?uc=gererTopic&action=suppression&id=<?php echo $topic['id']; ?>">x</a>
        <?php } ?>
    </div>

    <div class="container">
        <!--Navigation-->
        <div class="titre">
            <?php echo htmlspecialchars($topic['sujet']) ?>
        </div>

    </div>
</section>
<section class="main">
    <div class="container">
        <!--Navigation-->
        <h1>
            <?php echo htmlspecialchars($topic['question']) ?>
        </h1>
    </div>
    <div>
        <button onclick="myFunction()" class="btn-reponse">Repondre</button>
    </div>
</section>
<div class="hr"></div><br>
<?php if (count($commentaires) < 1) {
?>
    <i class="ml-4">Aucun commentaires</i>
<?php
} else {
?>
    <i class="ml-4">Commentaires</i>

    <?php
    foreach ($commentaires as $commentaire => $com) {
        $id = $com['id'];
        $commentaire = $com['commentaire'];
        $idAuteur = $com['idcompte'];
        $date = $com['date'];
        $auteur = $pdo->getInfosCompteById($idAuteur);
    ?>

        <section class="commentaire">
            <div class="autor">
                <div class="name">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <p><?php echo htmlspecialchars($auteur['prenom'] . " " . $auteur['nom']) ?></p>
                </div>
            </div>
            <div class="text-right text-muted">
                <?php echo htmlspecialchars($date);
                if ($_SESSION['role'] == '1' || $idAuteur == $_SESSION['idCompte']) { ?>
                    <a href="index.php?uc=discussion&action=suppressioncomm&id=<?php echo $id; ?>&idtopic=<?php echo $topic['id']; ?>">
                        x
                    </a>
                <?php } ?>
            </div>
            <div class="commentaire">
                <p><?php echo htmlspecialchars($commentaire) ?></p>
            </div>
        </section>
        <div class="hr2"></div><br>
    <?php
    }
    ?>
<?php
} ?>
<form id="myDIV" role="form" class="form" method="post" action="index.php?uc=discussion&action=insert&id=<?php echo $topic['id']; ?>">
    <div class="form-group">
        <textarea name="commentaire" type="submit" class="area" cols="100" rows="5"></textarea>
    </div>
    <br>
    <button type="submit" class="btn-reponse2">Poster</button>
</form>

</html>

<script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.visibility === "hidden") {
            x.style.visibility = "visible";
        } else {
            x.style.visibility = "hidden";
        }
    }
</script>