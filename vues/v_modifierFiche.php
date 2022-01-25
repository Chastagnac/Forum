<?php

/**
 * Vue Modification de Fiche
 *
 * PHP Version 7
 * @category  G4
 * @package   Wiki Fiche
 * @link      http://www.php.net/manual/fr/book.pdo.php PHP Data Objects sur php.net
 */

?>
<head>
   
</head>
<form role="form" method="post" action="index.php?uc=gererFiche&action=validerModification&id=<?php echo $fiche['id']; ?>">
    <fieldset>
        <div class="">
            <label for="exampleFormControlInput1">Libelle</label>
            <input type="text" class="" name="libelle" value="<?php echo $fiche['libelle']; ?>">
        </div>
        <div class="">
            <label for="exampleFormControlInput1">Description</label>
            <input type="text" class="" name="description" value="<?php echo $fiche['description']; ?>">
        </div>
        <div class="">
            <label for="exampleFormControlInput1">Contenu</label>
            <div class="" style="width : 100%;" value="<?php echo $fiche['contenu']; ?>">
                <textarea class="" name="contenu" type="text"><?php echo $fiche['contenu']; ?>"</textarea>
            </div>
            <div class="" >
                <div class=""><br>
                    <label for="categorie">Choisir la categorie de la fiche</label>
                    <br>
                    <select name="categorie">
                        <option value="1">Developpement</option>
                        <option value="2">ActuWeb</option>
                        <option value="3">Mobile</option>
                        <option value="4">Jeux</option>
                    </select>
                </div>
            </div>
        </div>
        <input class="" style="width: 50% !important;" type="submit" value="Modifier la fiche">
    </fieldset>
</form>