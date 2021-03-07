
<!-- Section pour la partie information -->
<section id="header">

    <div style="background: url(theme/upload/bg.png)" class="jumbotron bg-cover text-white">
        <div class="container py-5 text-center">

            <h1 class="display-4 font-weight-bold"><?= $_Serveur_['General']['name']; ?></h1>
            <p class="font-italic mb-0"><?= $_Serveur_['General']['description']; ?></p>

            <p class="font-weight-bold nb-joueurs">Nous sommes actuellement <?= $playeronline ?> </strong> / <?= $maxPlayers; ?></p>

            <div class="ip">
                <button onclick="copierIP();" type="button" class="btn px-5" >Nous rejoindre -> <?= $_Serveur_['General']['ipTexte'] ?></button>
                <input type="text" style="position:absolute;z-index:-9999;" id="iptexte" value="<?= $_Serveur_['General']['ipTexte']; ?>">
            </div>




        </div>
    </div>

</section>




<!-- Section pour les news et les miniatures -->
<section id="News">
    <div class="container-fluid col-md-12 col-lg-9 col-sm-10">
        <div class="row">
            <div class="news-articles col-md-12 col-lg-8 col-sm-12">


                <!-- Affichage des news -->
                <?php
                if (isset($news) && count($news) > 0) :
                    for ($i = 0; $i < 10; $i++) :
                        if ($i < count($news)) :
                            $getCountCommentaires = $accueilNews->countCommentaires($news[$i]['id']);
                            $countCommentaires = $getCountCommentaires->rowCount();

                            $getcountLikesPlayers = $accueilNews->countLikesPlayers($news[$i]['id']);
                            $countLikesPlayers = $getcountLikesPlayers->rowCount();
                            $namesOfPlayers = $getcountLikesPlayers->fetchAll(PDO::FETCH_ASSOC);

                            $getNewsCommentaires = $accueilNews->newsCommentaires($news[$i]['id']);
                            ?>

                            <article class="col-md-12 col-lg-12 col-sm-12 news-content">
                                <div class="card bg-dark">
                                    <div class="card-header d-flex flex-nowrap">
                                        <h4><small>#<?= $news[$i]['id'] ?> </small><?= $news[$i]['titre']; ?></h4>
                                        <h6 class="ml-auto"><?= date('d/m/Y', $news[$i]['date']) . " &agrave; " . date('H:i:s', $news[$i]['date']) ?></h6>
                                    </div>

                                    <div class="card-body ">
                                        <?= $news[$i]['message']; ?>
                                    </div>

                                    <div class="card-footer d-flex">

                                        <h3>Par
                                            <a href="?page=profil&profil=<?= $news[$i]['auteur']; ?>"><?= $news[$i]['auteur']; ?></a>
                                        </h3>

                                        <div class="ml-auto">
                                            <?php
                                            if (Permission::getInstance()->verifPerm("connect")) :
                                                $reqCheckLike = $accueilNews->checkLike($_Joueur_['pseudo'], $news[$i]['id']);
                                                $getCheckLike = $reqCheckLike->fetch(PDO::FETCH_ASSOC);
                                                $checkLike = $getCheckLike['pseudo'];
                                                if ($_Joueur_['pseudo'] == $checkLike) : ?>
                                                    <a href="#" class="h5 mr-3" data-toggle="modal"
                                                       data-target="#news<?= $news[$i]['id'] ?>">Commenter
                                                        (<?= $countCommentaires ?>)</a> <i
                                                            class="fa fa-thumbs-up"></i> <?= $countLikesPlayers ?>
                                                <?php else : ?>
                                                    <a href="#" class="h5 mr-3" data-toggle="modal"
                                                       data-target="#news<?= $news[$i]['id'] ?>">Commenter
                                                        (<?= $countCommentaires ?>)</a>
                                                    <a href="?&action=likeNews&id_news=<?= $news[$i]['id'] ?>"
                                                       class="h5 mx-3">J'aime</a>
                                                    <i class="fa fa-thumbs-up"></i> <?= $countLikesPlayers ?>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <a href="#" class="h5 mr-3" data-toggle="modal"
                                                   data-target="#news<?= $news[$i]['id'] ?>">Commenter
                                                    (<?= $countCommentaires ?>)</a> <i
                                                        class="fa fa-thumbs-up"></i> <?= $countLikesPlayers ?>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>

                                <!-- Commentaires -->

                            </article>
                        <?php endif; ?>
                    <?php endfor; ?>
                <?php else : ?>
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="alert alert-warning">
                            <p class="text-center">Aucune news n'a été créée à ce jour...</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>


            <!-- PARTIE MINIATURES-->
            <div class="row info-articles col-md-12 col-lg-4 col-sm-12 mx-auto">
                <?php for ($i = 1; $i < count($lectureAccueil['Infos']) + 1; $i++) : ?>
                    <article class="col-12 info-content">

                        <div class="card bg-dark">
                            <img class="card-img-top"
                                 src="theme/upload/navRap/<?= $lectureAccueil['Infos'][$i]['image'] ?>"
                                 alt="Image <?= $i ?>">
                            <div class="card-body">
                                <p class="card-text">
                                    <?= $lectureAccueil['Infos'][$i]['message']; ?>
                                </p>
                            </div>

                            <div class="card-footer min-footer">
                                <a href="<?= $lectureAccueil['Infos'][$i]['lien']; ?>" class="btn btn-main w-100">S'y
                                    rendre !</a>
                            </div>

                        </div>

                    </article>
                <?php endfor; ?>
            </div>


        </div>
    </div>
</section>
