<?php
include ('controleur/maintenance.php');
require ('include/version.php');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <style>


        /* ==== IMPORTATION DE LA POLICE ==== */

        @import url('https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap');

        body{
            background-image: url("theme/upload/bg.png");
            background-size: cover;
            background-attachment: fixed;
            z-index: -1;
            overflow: inherit;

            text-rendering: optimizeLegibility;
            font-family: 'RocknRoll One', sans-serif;
        }

        .titre{
            font-size: 50px;
            color: whitesmoke;
        }

        @media(max-height: 800px){
            body{
                overflow: inherit;
            }
        }


        @media (max-width: 1100px) {
            body{
                overflow: inherit;
            }
            .titre{
                font-size: 40px;
                color: whitesmoke;
            }


        }

        @media (max-width: 800px) {


            .titre{
                font-size: 37px;
                color: whitesmoke;
            }


        }

        /* FORMULAIRES */

        .mdp-confirm-form{
            background: none;
            border: none;
        }


        progress {
            height: 20px;
            background: #333;
            border-radius: 0;
            box-shadow: none;
            margin-bottom: 30px;
            overflow: visible
        }

        .progress .progress-bar {
            position: relative;
            -webkit-animation: animate-positive 2s;
            animation: animate-positive 2s
        }

        .progress .progress-value {
            display: block;
            font-size: 18px;
            font-weight: 500;
            color: black;
            position: absolute;
            top: -30px;
            right: -25px
        }

        .progress .progress-bar:after {
            content: "";
            display: inline-block;
            width: 10px;
            background: #fff;
            position: absolute;
            top: -10px;
            bottom: -10px;
            right: -5px;
            z-index: 1;
            transform: rotate(35deg)
        }


        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: 10px;
            z-index: 2;
        }




        .countdown-circles {
            text-transform: uppercase;
            font-weight: bold;
            text-shadow: black 2px 0px 6px;
        }

        .content-clock {
            display: block;
            padding: .6rem;
            margin: .4rem;
            border-radius: 3px;
            text-align: center;
            font-weight: 900;

        }
        .countdown-circles span:hover{
            background-color: rgba(173, 173, 177, 0.7);
        }

        .countdown-circles span {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            font-size: 32px;
            text-shadow: black 2px 0px 6px;
            background-color: rgba(199, 199, 205, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        .txt-temps-restant{
            color: black;
        }
        .txt-temps-restant:hover{
            color: #454444;
        }

        .img-modal {
            display: none;
            position: fixed;
            z-index: 1072;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.9);
        }

        .modal-img-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 80%;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: whitesmoke;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #1a1a1a;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #3c3c3c;
        }

        ul{
            list-style-type: none;
        }


    </style>

    <title>
        <?=$_Serveur_['General']['name'] . " | MAINTENANCE " ?>
    </title>

    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="<?=$_Serveur_["color"]["theme"]["main"]; ?>">
    <meta name="msapplication-navbutton-color" content="<?=$_Serveur_["color"]["theme"]["main"]; ?>">
    <meta name="apple-mobile-web-app-statut-bar-style" content="<?=$_Serveur_["color"]["theme"]["main"]; ?>">
    <meta name="apple-mobile-web-app-capable" content="<?=$_Serveur_["color"]["theme"]["main"]; ?>">

    <meta property="og:title" content="<?=$_Serveur_['General']['name'] ?>">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://<?=$_SERVER["SERVER_NAME"] ?>">
    <meta property="og:image" content="https://<?=$_SERVER["SERVER_NAME"] ?>/favicon.ico">
    <meta property="og:image:alt" content="<?=$_Serveur_['General']['description'] ?>">
    <meta property="og:description" content="<?=$_Serveur_['General']['description'] ?>">
    <meta property="og:site_name" content="<?=$_Serveur_['General']['name'] ?>" />

    <meta name="twitter:title" content="<?=$_Serveur_['General']['name'] ?>">
    <meta name="twitter:description" content="<?=$_Serveur_['General']['description'] ?>">
    <meta name="twitter:image" content="https://<?=$_SERVER["SERVER_NAME"] ?>/favicon.ico">

    <meta name="author" content="CraftMyWebsite, TheTueurCiTy, <?=$_Serveur_['General']['name']; ?>" />

    <!-- CSS links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


    <style>

    </style>

</head>


<body class="page-bg">
<?php
//Verif Version
include ("./include/version.php");
include ("./include/version_distant.php");
?>

<?php
$maintenanceOn = true;
include ('theme/' . $_Serveur_['General']['theme'] . '/navbar.php'); //Navbar
tempMess(); ?>


<div class="container-fluid col-md-9 col-lg-9 col-sm-10">
    <span class="titre text-center" ><?php echo $donnees['maintenanceMsg']; ?></span>
    <br>

    <!-- CLASSE POUR LE COMPTEUR -->

    <?php if (!empty($donnees['dateFin'])):
        if ($donnees['dateFin'] != 0 && $donnees['dateFin'] <= time())
        {
            $req = $bddConnection->prepare('UPDATE cmw_maintenance SET maintenanceEtat = :maintenanceEtat WHERE maintenanceId = :maintenanceId');
            $req->execute(array(
                'maintenanceEtat' => 0,
                'maintenanceId' => $donnees['maintenanceId']
            ));
            header("Location: /");
        } ?>

        <div class="row">
            <div class="col-sm-10 col-md-9 col-lg-7 mx-auto mt-5" >
                <div class="rounded bg-lightest text-white shadow p-5 text-center mb-5" style="background-color: rgba(255, 255, 255, 0.7);">
                    <h3 class="mb-4 font-weight-bold text-uppercase txt-temps-restant">Temps restant :</h3>
                    <h5 class="txt-temps-restant">Voici le temps restant avant le retour de votre site !</h5>

                    <div id="clockdiv" class="countdown-circles d-flex flex-wrap justify-content-center pt-4">

                        <div class="content-clock">
                            <span class="bloc-clock days h5"></span>
                            <div>Jours</div>
                        </div>
                        <div class="content-clock">
                            <span class="bloc-clock hours h5"></span>
                            <div>Heures</div>
                        </div>
                        <div class="content-clock">
                            <span class="bloc-clock minutes h5"></span>
                            <div>Minutes</div>
                        </div>
                        <div class="content-clock">
                            <span class="bloc-clock seconds h5"></span>
                            <div>Secondes</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>


    <!-- Connexion -->
    <div class="<?=(!empty($donnees['dateFin'])) ? "d-flex justify-content-center" : "col-8 mx-auto mt-3" ?>">

        <div class="card">

            <div class="card-header">
                <h3 class="text-center m-0">Connexion</h3>
            </div>

            <div class="card-body">
                <h5><?=$donnees['maintenanceMsgAdmin']; ?></h5>
            </div>

            <?php if (Permission::getInstance()->verifPerm("PermsPanel", "maintenance", "actions", "connexionAdmin"))
            { ?>

                <div class="card-footer">
                    <a href="index.php" class="btn btn-main w-100">Aller sur votre site</a>
                </div>

                <?php
            }
            elseif (Permission::getInstance()
                ->verifPerm("connect"))
            { ?>
                <div class="card-footer">
                    <a class="btn btn-main w-100">Vous n'avez pas la permission d'accéder au site pendant la maintenance ! </a>
                </div>
                <?php
            }
            else
            { ?>
                <div class="card-footer">
                    <a data-toggle="modal" data-target="#ConnectionSlide" href="#" class="btn btn-main w-100"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
                </div>
                <?php
            } ?>
        </div>

        <?php if ($donnees['inscription'] && !Permission::getInstance()->verifPerm('connect'))
        { ?>
            <!-- Inscription -->
            <div class="card" style="margin-left: 25px">
                <div class="card-header">
                    <h3 class="text-center m-0">Inscription</h3>
                </div>
                <div class="card-body">
                    <h5><?=$donnees['maintenanceMsgInscr']; ?></h5>
                </div>
                <div class="card-footer">
                    <a data-toggle="modal" data-target="#InscriptionSlide" class="btn btn-main w-100">S'inscrire</a>
                </div>
            </div>

            <?php
        } ?>
    </div>
    <script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/custom.js"></script>

    <?php include ('theme/' . $_Serveur_['General']['theme'] . '/formulaires.php'); //Forms included


    ?>




    <!-- Librairies Essential -->
    <script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/jquery.min.js"></script>
    <script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/popper.min.js"></script>
    <script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/bootstrap.min.js"></script>

    <!-- Scripts -->

    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/zxcvbn.js"></script>
    <script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets/js/custom.js"></script>
    <?php include "theme/" . $_Serveur_['General']['theme'] . "/assets/php/ckeditorManager.php"; ?>
    <script src="theme/<?= $_Serveur_['General']['theme']; ?>/assets//js/toastr.min.js"></script>
    <?php include "theme/" . $_Serveur_['General']['theme'] . "/assets/php/custom.php"; ?>




    <!-- Script pour le compteur de temps restant-->
    <script type="text/javascript">

        function getTimeRemaining(endtime) {
            var t = Date.parse(endtime) - Date.parse(new Date());
            var seconds = Math.floor((t / 1000) % 60);
            var minutes = Math.floor((t / 1000 / 60) % 60);
            var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
            var days = Math.floor(t / (1000 * 60 * 60 * 24));
            if (days == 0 && hours == 0 && minutes == 0 && seconds == 0)
                window.location.replace("/");
            return {
                'total': t,
                'days': days,
                'hours': hours,
                'minutes': minutes,
                'seconds': seconds
            };
        }

        function initializeClock(id, endtime) {
            var clock = document.getElementById(id);
            var daysSpan = clock.querySelector('.days');
            var hoursSpan = clock.querySelector('.hours');
            var minutesSpan = clock.querySelector('.minutes');
            var secondsSpan = clock.querySelector('.seconds');

            function updateClock() {
                var t = getTimeRemaining(endtime);

                daysSpan.innerHTML = t.days;
                hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                if (t.total <= 0) {
                    clearInterval(timeinterval);
                }
            }

            updateClock();
            var timeinterval = setInterval(updateClock, 1000);
        }

        var deadline = new Date(Date.parse(new Date()) + <?=($donnees["dateFin"] - time()) ?> * 1000);
        initializeClock('clockdiv', deadline);
    </script>

</body>

</html>
