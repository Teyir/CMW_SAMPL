<?php
// On récupère le fichier preload qui sert notamment à vérifier sur une maintenance est en cours
require('theme/' . $_Serveur_['General']['theme'] . '/preload.php');

// On récupère la configuration du thème
$configTheme = new Lire('theme/' . $_Serveur_['General']['theme'] . '/config/config.yml');
$_Theme_ = $configTheme->GetTableau();

?>
<!DOCTYPE html>
<html lang="fr">
<head>

    <style>

        /*
            Ici on récupère les couleurs qu'on à config sur la panel admin (ou dans le fichier config.yml)
        */

        :root {
            --main-color-bg: <?= $_Theme_["Main"]['theme']['couleurs']["main-color-bg"] ?> !important;
            --secondary-color-bg: <?= $_Theme_["Main"]['theme']['couleurs']["secondary-color-bg"] ?> !important;

            --base-color: <?= $_Theme_["Main"]['theme']['couleurs']["base-color"] ?> !important;
            --main-color: <?= $_Theme_["Main"]['theme']['couleurs']["main-color"] ?> !important;
            --active-color: <?= $_Theme_["Main"]['theme']['couleurs']["active-color"] ?> !important;


            --darkest-color-bg: <?= $_Theme_["Main"]['theme']['couleurs']["darkest-color-bg"] ?> !important;
            --lightest-color-bg: <?= $_Theme_["Main"]['theme']['couleurs']["lightest-color-bg"] ?> !important;
        }

    </style>

    <!-- GESTION DU TITRE DE LA PAGE (partie affiché dans l'onglet) -->
    <title>
        <?= $_Serveur_['General']['name'] . " | " . (isset($_GET["page"]) ? $_GET["page"] : $_Serveur_['General']['description']) ?>
    </title>


    <!-- Meta -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="<?= $_Serveur_["color"]["theme"]["main"]; ?>">
    <meta name="msapplication-navbutton-color" content="<?= $_Serveur_["color"]["theme"]["main"]; ?>">
    <meta name="apple-mobile-web-app-statut-bar-style" content="<?= $_Serveur_["color"]["theme"]["main"]; ?>">
    <meta name="apple-mobile-web-app-capable" content="<?= $_Serveur_["color"]["theme"]["main"]; ?>">


    <!-- SEO -->
    <meta property="og:title" content="<?= $_Serveur_['General']['name'] ?>">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://<?= $_SERVER["SERVER_NAME"] ?>">
    <meta property="og:image" content="https://<?= $_SERVER["SERVER_NAME"] ?>/favicon.ico">
    <meta property="og:image:alt" content="<?= $_Serveur_['General']['description'] ?>">
    <meta property="og:description" content="<?= $_Serveur_['General']['description'] ?>">
    <meta property="og:site_name" content="<?= $_Serveur_['General']['name'] ?>"/>

    <meta name="twitter:title" content="<?= $_Serveur_['General']['name'] ?>">
    <meta name="twitter:description" content="<?= $_Serveur_['General']['description'] ?>">
    <meta name="twitter:image" content="https://<?= $_SERVER["SERVER_NAME"] ?>/favicon.ico">

    <meta name="author" content="CraftMyWebsite, Teyir, <?= $_Serveur_['General']['name']; ?>"/>
    <meta name="publisher" content="<?= $_SERVER["SERVER_NAME"] ?> [contact@<?= $_SERVER["SERVER_NAME"] ?>]"/>
    <meta name="description" content="<?= $_Serveur_['General']['description'] ?>">

    <meta name="copyright" content="CraftMyWebsite, Teyir, <?= $_Serveur_['General']['name']; ?>"/>

    <meta name="robots" content="follow, index, all">

    <!-- CSS -->
    <link rel="stylesheet" href="theme/<?= $_Serveur_['General']['theme']; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="theme/<?= $_Serveur_['General']['theme']; ?>/assets/css/fontawesome.css">
    <link rel="stylesheet" href="theme/<?= $_Serveur_['General']['theme']; ?>/assets/css/custom.css">
    <link rel="stylesheet" type="text/css"
          href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css"/>
    <link rel="stylesheet" href="theme/<?= $_Serveur_['General']['theme']; ?>/assets/css/toastr.min.css">


    <!-- SCRIPTS -->
    <script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/ckeditor.js"></script>
    <?php if (isset($_GET['page']) && $_GET['page'] == "voter") {
        echo '<script src="theme/' . $_Serveur_['General']['theme'] . '/assets/js/voteControleur.js"></script>';
    } ?>
</head>
<body>
<!-- C'est ici que le noms de la monnaie est géré -->
<script type="text/javascript">var _Jetons_ = "<?=$_Serveur_['General']['moneyName'];?>";</script>

<?php
//Verif Version
include("./include/version.php");
include("./include/version_distant.php");

if ($versioncms != $versioncmsrelease && Permission::getInstance()->verifPerm('PermsPanel', 'update', 'showPage')) : ?>

    <div class=" mb-0 rounded-0 text-center alert alert-main bg-lightest alert-dismissible text-shadow-none fade show sticky-top"
         role="alert">
        <h5 class="m-0">
            Une mise à jour est disponible <strong>(<a href="https://craftmywebsite.fr/telecharger" target="_blank"
                                                       class="alert-link"><?= $versioncmsrelease ?></a>)</strong> !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                    style="color: var(--base-color);">
                <span aria-hidden="true">&times;</span>
            </button>
        </h5>
    </div>

<?php endif; ?>

<?php if (Permission::getInstance()->verifPerm("connect")) /* --> */
    setcookie('pseudo', $_Joueur_['pseudo'], time() + 86400, null, null, false, true);

include('theme/' . $_Serveur_['General']['theme'] . '/navbar.php');
tempMess(); ?>

<?php
//On vérifie que le fichier d'installation est bien supprimé
if (is_dir("installation")) {
    include('theme/' . $_Serveur_['General']['theme'] . '/pages/fichier_installation.php');
} else {
    include('controleur/page.php'); //C'est ici qu'on ajoute les pages
}

//C'est ici qu'on ajoute les pages à toutes les pages du site
include('theme/' . $_Serveur_['General']['theme'] . '/footer.php');  //On ajoute le footer à toutes les pages
include('theme/' . $_Serveur_['General']['theme'] . '/formulaires.php'); //On ajoute les formulaires à toutes les pages
?>


<!-- Librairies Essential -->
<script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/jquery.min.js"></script>
<script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/popper.min.js"></script>
<script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>

<!-- Scripts -->
<script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/zxcvbn.js"></script>
<script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/fontawesome.js"></script>
<script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/custom.js"></script>
<?php include "theme/" . $_Serveur_['General']['theme'] . "/assets/php/ckeditorManager.php"; ?>
<script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets//js/toastr.min.js"></script>
<?php include "theme/" . $_Serveur_['General']['theme'] . "/assets/php/custom.php"; ?>
<?php if ($_Serveur_['Payement']['dedipass']) : //API DEDIPASS
    ?>
    <script src="//api.dedipass.com/v1/pay.js"></script>
<?php endif; ?>


</body>

</html>