<?php
// Cette partie permet de récupérer la configuration du thème
$_Theme_ = new Lire('theme/' . $_Serveur_['General']['theme'] . "/config/config.yml");
$_Theme_ = $_Theme_->GetTableau();
?>

<footer id="Footer" class="footer-background text-white text-center text-lg-start">
    <div class="container p-4">
        <div class="row">


            <!-- Partie informations-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Informations</h5>

                <p>
                    <?= $_Theme_['Footer']['informations'] ?>
                </p>
            </div>


            <!-- Colonne liens #1-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Liens</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#" class="text-white">Lien 1</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Lien 2</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Lien 3</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Lien 4</a>
                    </li>
                </ul>
            </div>


            <!-- Colonne liens #2-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">Liens</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="#" class="text-white">Lien 1</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Lien 2</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Lien 3</a>
                    </li>
                    <li>
                        <a href="#" class="text-white">Lien 4</a>
                    </li>
                </ul>
            </div>


        </div>
    </div>


    <!-- Copyright CMW -->
    <div class="text-center p-3">
        Tous droits réservés, site créé pour le serveur <?= $_Serveur_['General']['name']; ?> <br />
        <small><a href="https://craftmywebsite.fr" target="_blank">CraftMyWebsite.fr</a>#<?= $versioncms; ?></small>
    </div>


    <!-- Copyright Teyir -->
    <div class="float-right">
        Thème <strong>Sample</strong> réalisé par <small><a href="https://teyir.fr" target="_blank">Teyir</a></small>
    </div>


</footer>