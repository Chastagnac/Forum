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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
    <header>
        <!--Barre de recherche-->
        <div class="search-box">
            <div>
                <select name="" id="">
                    <option value="everything">Everything</option>
                    <option value="titre">Titre</option>
                    <option value="description">Description</option>
                    <option value="utilisateur">Dernier poste par</option>
                </select>
                <input type="text" name="q" id="" placeholder="rechercher...">
                <button><i class="fa fa-search"></i></button>
            </div>
        </div>
    </header>
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
                    <i class="fa fa-car"></i>
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
                    <span>24 Posts | 15 Topics</span>
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
    <!--Forum info-->
    <div class="forum-info">

        <div class="chart">
            Les stats de mon forum <i class="fa fa-bar-chart"></i>
        </div>
        <div>
            <span><u>1565</u> posts pour <u>450</u> sujets par <u>7545</u> utilisateurs</span>
            <span> Dernier Poste: <b><a href="#">Star Wars</a></b> le 15 decembre 2022 par <a href="#">Romain</a>
        </div>
    </div>
</body>