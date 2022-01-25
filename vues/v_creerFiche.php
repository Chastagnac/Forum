<?php

/**
 * Vue Creation Fiche
 *
 * PHP Version 7
 * @category  Forum
 */

?>

<head>
    
</head>

<form role="form" method="post" action="index.php?uc=gererFiche&action=insert">
    <fieldset>
        <div class="">
            <div class="">
                <input type="text" class="" name="libelle" id="title" aria-describedby="emailHelp" placeholder="Titre">
            </div>
            <div class="">
                <input type="text" class="" name="description" id="desc" aria-describedby="emailHelp" placeholder="Description">
            </div>
            <div class="">
                <textarea type="text" rows="10" class="" name="contenu" id="content" aria-describedby="emailHelp" placeholder="..."></textarea>
            </div>
            <div class="">
                <div class="">
                    <div class="">
                        <label for="categorie">Choisir la categorie de la fiche</label>
                        <br>
                        <select name="categorie" style="border-radius: 5px; padding: 3px; color: black !important">
                            <option style="color: black !important" value="1">Developpement</option>
                            <option style="color: black !important" value="2">ActuWeb</option>
                            <option style="color: black !important" value="3">Mobile</option>
                            <option style="color: black !important" value="4">Jeux</option>
                        </select>
                    </div>
                </div>
            </div>
            <input class="" type="submit" value="Publier">
        </div>
    </fieldset>
</form>
