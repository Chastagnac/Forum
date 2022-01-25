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

</head>

<div class="">
    <div class="">
        <p class=""><?php echo (getLibelleRole($infosCompte['role'])) ?></p>
    </div>

    <div class="">

        <div class="">
            <img src="images/mr.png" class="">
            <label for="exampleInputPassword1"></label>
            <div class="">
                <?php
                $xp = $infosCompte['xp'];
                $lvl = getRank($xp)['value'];
                $max = getRank($xp)['nextlvl'];

                if ($xp < $max) {
                ?>
                    <small style="float: right; margin : -5px;">
                        <?php echo ($xp . ' / ' . $max); ?>
                    </small>
                <?php
                }
                getProgressBar($xp, $lvl);
                echo ("Rank : " . getRank($xp)['lvl']);
                ?>
            </div>
        </div>
        <div class="">
            <div class="">
                <label for="">Email : </label>
                <p><?php echo $infosCompte['mail'] ?></p>
            </div>
            <div class="">
                <label for="exampleInputPassword1">Nom : </label>
                <p><?php echo $infosCompte['nom'] ?></p>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Prénom :</label>
                <p><?php echo $infosCompte['prenom'] ?></p>
            </div>
            <div class="">
                <label for="exampleInputPassword1">Création du compte :</label>
                <p><?php echo $infosCompte['datecreation'] ?></p>
            </div>
            <?php if ($infosCompte['datemodif'] != null) { ?>
                <div class="">
                    <label for="exampleInputPassword1">Dernière modification datant du :</label>
                    <p><?php echo $infosCompte['datemodif'] ?></p>
                </div>
            <?php
            } ?>
            <!-- Modification données compte -->
            <button type="button" class="" data-toggle="modal" id="btnmodal2" onclick="checkbox2()" data-target="#exampleModal1">
                Modifier vos informations
            </button>

            <!-- Button trigger modal mdp -->
            <button type="button" class="" data-toggle="modal" id="btnmodal" onclick="checkbox()" data-target="#exampleModal2">
                Modifier votre mot de passe
            </button>
        </div>
    </div>
</div>
<!-- Modal  compte-->
<div class="" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="" role="document">
        <div class="" style="background-color: #1F202A;">
            <div class="">
                <h5 class="" id="exampleModalLabel">Modifier vos informations personnels</h5>
                <button type="button" class="" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="">
                <form role="form" method="post" action="index.php?uc=gererCompte&action=validerModifications">
                    <div class="p-4">
                        <div class="">
                            <label for="exampleInputEmail1">Email :</label>
                            <input type="email" class="form-control" style="color : black !important" name="mail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez le nouvel email">
                        </div>
                        <div class="">
                            <label for="exampleInputPassword1">Nom :</label>
                            <input type="text" class="" style="color : black !important" name="nom" id="exampleInputPassword1" placeholder="Entrez le nom">
                        </div>
                        <div class="">
                            <label for="exampleInputPassword1">Prénom :</label>
                            <input type="text" class="form-control" name="prenom" id="exampleInputPassword1" placeholder="Entrez le prénom">
                        </div>
                        <div class="r">
                            <button type="button" class="" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="">Valider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal mdp-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #1F202A;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="index.php?uc=gererCompte&action=changerMdp">
                    <div class="p-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ancien mot de passe :</label>
                            <input type="password" class="form-control" style="color : black !important" name="lastpswd" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez l'ancien mot de passe">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nouveau mot de passe</label>
                            <input type="password" class="form-control" style="color : black !important" name="newpswd" id="exampleInputPassword1" placeholder="Entrez le nouveaux mot de passe">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirmer le mot de passe :</label>
                            <input type="password" class="form-control" style="color : black !important" name="confirmpswd" id="exampleInputPassword1" placeholder="Confirmer le nouveau mot de passe">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-success">Valider</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>