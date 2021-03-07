<?php
if(Permission::getInstance()->verifPerm('PermsPanel', 'theme', 'actions', 'editTheme')) {
    $configTheme = new Lire('theme/' . $_Serveur_['General']['theme'] . '/config/config.yml');
    $_Theme_ = $configTheme->GetTableau();



// Modification couleurs du thème

    // On récupère les informations
    $_Theme_['Main']['theme']['couleurs']['main-color-bg'] = $_POST['main-color-bg'];
    $_Theme_['Main']['theme']['couleurs']['secondary-color-bg'] = $_POST['secondary-color-bg'];
    $_Theme_['Main']['theme']['couleurs']['base-color'] = $_POST['base-color'];
    $_Theme_['Main']['theme']['couleurs']['main-color'] = $_POST['main-color'];
    $_Theme_['Main']['theme']['couleurs']['active-color'] = $_POST['active-color'];
    $_Theme_['Main']['theme']['couleurs']['darkest-color-bg'] = $_POST['darkest-color-bg'];
    $_Theme_['Main']['theme']['couleurs']['lightest-color-bg'] = $_POST['lightest-color-bg'];

    // On écrit les informations
    $ecriture = new Ecrire('theme/Sample/config/config.yml', $_Theme_);




// Footer


    // On récupère les informations
    $_Theme_['Footer']['informations'] = $_POST['informations'];


    // On écrit les informations
    $ecriture = new Ecrire('theme/Sample/config/config.yml', $_Theme_);
}
?>
