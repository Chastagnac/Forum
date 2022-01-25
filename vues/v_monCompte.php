
<div class="">
    <?php
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if ($estConnecte) {
    ?>
        <div class="">
            <div class="">
                <div class="">
                    <ul class="" role="tablist">
                        <li <?php if ($action == 'mesInformations') { ?>class="" <?php } ?>>
                            <a href="index.php?uc=gererCompte&action=mesInformations" class="">
                                <span class="glyphicon glyphicon-list"></span>
                                Mes Informations
                            </a>
                        </li>
                        <li <?php if ($action == 'mesFiches') { ?>class="" <?php } ?>>
                            <a href="index.php?uc=gererCompte&action=mesFiches" class="">
                                <span class="glyphicon glyphicon-th"></span>
                                Mes Fiches
                            </a>
                        </li>
                        <?php if ($_SESSION['role'] == '1') { ?>
                            <li <?php if ($action == 'validerFiches') { ?>class="" <?php } ?>>
                                <a href="index.php?uc=validation&action=validerFiches" class="">
                                    <span class="glyphicon glyphicon-user"></span>
                                    Valider les fiches
                                </a>
                            </li>
                        <?php
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php
    } else {
        include('vues/v_connexion.php');
    ?>

    <?php
    } ?>
</div>