
<!-- Cette page sert de base pour les pages customs -->

<section class="page" id="CustomPage">
    <div class="container-fluid col-md-9 col-lg-9 col-sm-10">

        <div class="row">

            <div class="container-fluid col-md-9 col-lg-9 col-sm-10">
                <!-- Si le titre est vide ça nous envoie une erreur -->
                <?php if (!empty($pages['titre']) && !empty($pageContenu[$j][0])) :
                    header('Location: ?page=erreur&erreur=8000000');
                else : ?>

                    <!-- Titre de la page-->
                    <h1 class="titre"><?= $pages['titre']; ?></h1>

                    <!-- Contenu de la page -->
                    <?php for ($j = 0; $j < count($pages['tableauPages']); $j++) : ?>
                        <h3><?= $pageContenu[$j][0]; ?></h3>
                        <div><?= $pageContenu[$j][1]; ?></div>
                    <?php endfor; ?>

                <?php endif; ?>
            </div>

        </div>

    </div>
</section>
