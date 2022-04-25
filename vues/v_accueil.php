<?php

/**
 * Vue Accueil
 *
 * PHP Version 7
 * @category  PROJET V6.0.0
 * @package   Le forum des geeks
 */

?>
<header>
    <link href="../styles/stylesPages/accueil.css" rel="stylesheet">
</header>

<a name="top">
<div style="margin-top: 100px;">
    <section class="contact" id="contact">

        <div class="row">
            <div class="map">
                <div class="content">
                    <ul class="movies">
                        <h3>Films <span>Récents</span></h3>
                        <li>
                            <h4>Toy Story 3</h4><img src="../images/affiches/1page-img2.jpg" alt="" />
                            <p>Quand le jeune Andy quitte sa chambre, ses jouets se mettent à mener leur propre vie sous la houlette de son pantin préféré... </p>
                        </li>
                        <li>
                            <h4>Prince of Persia : Les Sables du Temps </h4><img src="../images/affiches/1page-img3.jpg" alt="" />
                            <p>Un prince rebelle est contraint d'unir ses forces avec une mystérieuse princesse pour affronter ensemble les forces du mal et protéger une dague antique...</p>
                        </li>
                        <li class="last">
                            <h4>Twilight, chapitre III : Hésitation</h4><img src="../images/affiches/1page-img4.jpg" alt="" />
                            <p>Des morts suspectes dans les environs de Seattle laissent présager une nouvelle menace pour Bella. Victoria cherche toujours à assouvir sa vengeance contre elle et rassemble une armée...</p>
                        </li>
                        <li class="clear">&nbsp;</li>
                    </ul>
                </div>
            </div>
            <div class="bestTopics">
                <h3>Discussions <span>Recentes</span></h3>
                <ul class="list">
                    <?php
                    $i = 0;
                    foreach ($hotTopics as $topics => $top) {
                        $id = $top['id'];
                        $idcategorie = $top['idcategorie'];
                        $idcompte = $top['idcompte'];
                        $sujet = $top['sujet'];
                        $question = $top['question'];
                        $datecreation = $top['datecreation'];
                        if ($i < 3) {
                            $i++; ?>
                            <li><img src="../images/affiches/3page-img1.jpg" alt="" />
                                <a href="index.php?uc=discussion&action=discussion&id=<?php echo htmlspecialchars($id); ?>">
                                    <?php echo htmlspecialchars($datecreation); ?>
                                </a>
                                <br />
                                <?php echo htmlspecialchars($sujet) ?>
                                <br />
                            </li>
                    <?php
                        }
                    };
                    ?>
                </ul>
            </div>

        </div>
    </section>
    
     <!--Ancrage-->
    <a href="#top"><i class="fa fa-anchor fa-3x white"></i></a>
</div>