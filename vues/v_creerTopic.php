<?php

/**
 * Vue Créer Topics
 *
 * PHP Version 7
 * @category  PROJET V6.0.0
 * @package   Le forum des geeks
 */

?>

<head>

</head>

<form role="form" method="post" action="index.php?uc=gererTopic&action=insert">
    <fieldset class="container">
        <div>
            <div>
                <input type="text" class="input2" name="sujet" id="desc" aria-describedby="emailHelp" placeholder="Ecrivez la problématique">
            </div>
            <div>
                <textarea type="text" rows="10" cols="70" class="textarea" name="question" id="content"  placeholder="Ecrivez votre question" aria-describedby="emailHelp" placeholder="..."></textarea>
            </div>
            <br>
            <input class="modern-btn-valide" type="submit" value="Publier">
        </div>
    </fieldset>
</form>