<?php include('theme/' . $_Serveur_['General']['theme'] . '/config/configTheme.php');
?>

<!-- ATTENTION AUX DEVELOPPEURS DE THEME :
        -> Le système est concue pour qu'il n'y est qu'un seul FORM, et c'est celui de cette action ! Donc merci de ne pas créer d'autres form et de tout garder dans ce form avec cette action et en POST !
        -> Le fichier de traitement est configAdminTraitement.php il ne peux ni être renommer ni déplacé !
        -> Tout se fait en AJAX donc vous devez conservé le onClick="sendPost('configThemeAdmin');" sur le bouton d'envoie + ne pas mettre de balise <form> + conserver le <script>...</script> + conserver une div id="configThemeAdmin" qui doit englober tout les input de votre formulaire (sinon ils ne seront pas recupérés). N'hésitez pas à demander de l'aide sur le discord !
-->
<style id="themeEdition">
    .theme .nav-item > .nav-link {
        color: black !important;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }
</style>

<div class="row theme">
    <div class="col-md-9 col-xl-9 col-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Configuration du thème </h4>
            </div>

            <div class="card-body">

                <section>
                    <!-- Gestion des pages -->
                    <div class="row">
                        <div class="col-12" id="configThemeAdmin">

                            <ul class="nav nav-tabs mb-3" id="defaultTheme" role="tablist">

                                <!-- Onglet pour la page couleur-->
                                <li class="nav-item">
                                    <a class="nav-link active" id="colorsEdition-tab" data-toggle="tab"
                                       href="#colorsEdition" role="tab" aria-controls="colorsEdition"
                                       aria-selected="true">Couleurs</a>
                                </li>

                                <!-- Onglet pour la page footer-->
                                <li class="nav-item">
                                    <a class="nav-link" id="footerEdition-tab" data-toggle="tab" href="#footerEdition"
                                       role="tab" aria-controls="footerEdition" aria-selected="false">Footer</a>
                                </li>

                            </ul>


                            <div class="tab-content" id="defaultThemeContent">


                                <div class="tab-pane fade show active" id="colorsEdition" role="tabpanel"
                                     aria-labelledby="colorsEdition-tab">

                                    <div class="col-11 mx-auto my-2">

                                        <h4>Modifier les couleurs du thème</h4>

                                        <div class="col-10 mx-auto">

                                            <h4> Présentation du thème :</h4>

                                            <div class="col-9 mx-auto mt-5">
                                                <table class="table table-responsive table-striped table-hover">
                                                    <thead>
                                                    <th></th>
                                                    <th>Fond principal</th>
                                                    <th>Fond secondaire</th>
                                                    <th>Couleur du texte</th>
                                                    <th>Couleur foncée du texte</th>
                                                    <th>Couleur importante du texte</th>
                                                    <th>Fond clair</th>
                                                    <th>Fond foncé</th>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td><b> Modifier les couleurs </b></td>


                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="main-color-bg"
                                                                   value="<?php echo $_Theme_['Main']['theme']['couleurs']['main-color-bg']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="secondary-color-bg"
                                                                   value="<?php echo $_Theme_['Main']['theme']['couleurs']['secondary-color-bg']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="base-color"
                                                                   value="<?php echo $_Theme_['Main']['theme']['couleurs']['base-color']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="main-color"
                                                                   value="<?php echo $_Theme_['Main']['theme']['couleurs']['main-color']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="active-color"
                                                                   value="<?php echo $_Theme_['Main']['theme']['couleurs']['active-color']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="darkest"
                                                                   value="<?php echo $_Theme_['Main']['theme']['couleurs']['darkest-color-bg']; ?>">
                                                        </td>

                                                        <td class="text-center">
                                                            <input type="color" id="selColor" name="lightest"
                                                                   value="<?php echo $_Theme_['Main']['theme']['couleurs']['lightest-color-bg']; ?>">
                                                        </td>


                                                    </tr>

                                                    <tr id="selColor">
                                                        <td><b> Couleur présentée </b></td>


                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['main-color-bg']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>

                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['secondary-color-bg']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>

                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['base-color']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>

                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['main-color']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>

                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['active-color']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>

                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['darkest-color-bg']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>


                                                        <td class="text-center p-0">
                                                            <div style="background-color: <?php echo $_Theme_['Main']['theme']['couleurs']['lightest-color-bg']; ?>; width: 100%; padding: 0.75rem">
                                                                &nbsp;
                                                            </div>
                                                        </td>


                                                    </tr>
                                                    </tbody>
                                                </table>


                                            </div>

                                        </div>
                                    </div>

                                </div>


                                <!-- Page footer -->

                                <div class="tab-pane fade mx-auto" id="footerEdition" role="tabpanel"
                                     aria-labelledby="footerEdition-tab">

                                    <div class="col-11 mx-auto my-2">

                                        <h4>Modification du footer</h4>

                                        <div class="col-10 mx-auto my-2">

                                            <h4>À Propos</h4>
                                            <small class="my-1">Parlez de votre serveur, ou du but de ce site internet !</small>

                                            <div class="col-10 mx-auto">

                                                <textarea class="form-control" name="informations" id="aboutTheme">
                                                    <?= $_Theme_['Footer']['informations'] ?>
                                                </textarea>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                </section>

            </div>

            <div class="card-footer">
                <div class="form-group text-center">
                    <input type="submit" onClick="sendPost('configThemeAdmin'); document.location.reload();" class="btn btn-success" value="Sauvegarder">
                </div>

                <script>
                    initPost("configThemeAdmin", "admin.php?action=configTheme");
                </script>
            </div>

        </div>
    </div>
</div>


<script>
    function createNewReseau() {
        var ico = get('new-s-icone');
        var link = get('new-s-link');
        var msg = get('new-s-message');

        if (isset(ico.value) && ico.value.replace(" ", "") != "" && isset(link.value) && link.value.replace(" ", "") !=
            "" && isset(msg.value) && msg.value.replace(" ", "") != "") {
            var ht =
                '<div class="form-row jumbotron py-1" data-reseau>' +
                '<h5 class="col-12 my-1">Réseau <small> <div class="badge badge-warning">Non sauvegardé si pas cliqué sur sauvegarder !</div></small></h5>' +
                '<div class="col-12">' +
                '<label class="control-label">Icone du réseau</label>' +
                '<input type="text" data-type="icon" class="form-control" id="" placeholder=\'<i class="fab fa-discord"></i>\' value="' +
                ico.value.replace(/"/g, '\'') + '">' +
                '<small>Disponible sur : <a href="https://fontawesome.com/icons/"> https://fontawesome.com/icons/</a></small>' +
                '</div>' +

                '<div class="col-12">' +
                '<label class="control-label">Lien vers le réseau</label>' +
                '<input type="text" id="" class="form-control" data-type="link" value="' + link.value.replace(/"/g, '\'') + '">' +
                '</div>' +

                '<div class="col-12">' +
                '<label class="control-label">Message à mettre à côté</label>' +
                '<input type="text" class="form-control" id="" data-type="message" placeholder="Rejoingnez-nous sur Discord !" value="' +
                msg.value.replace(/"/g, '\'') + '">' +
                '</div>' +

                '<div class="col-4 my-4">' +
                '<button class="btn btn-danger form-control" onclick="this.parentElement.parentElement.parentElement.removeChild(this.parentElement.parentElement); genJsonReseau(); sendPost(\'configThemeAdmin\');">Supprimer</button>' +
                '</div>' +

                '</div>'

            get('all-reseau').insertAdjacentHTML("beforeend", ht);
            ico.value = msg.value = link.value = null
            delete ico;
            delete msg;
            delete value;
        } else {
            notif("warning", "Erreur", "Formulaire incomplet");
        }

    }

    function genJsonReseau() {
        var final = [];
        for (let el of document.querySelectorAll("[data-reseau]")) {
            let temp = {}
            for (let o = 0; o < el.children.length; o++) {
                for (let i = 0; i < el.children[o].children.length; i++) {
                    if (isset(el.children[o].children[i].getAttribute('data-type'))) {
                        temp[el.children[o].children[i].getAttribute('data-type')] = el.children[o].children[i].value;
                    }
                }
            }
            final.push(temp);
        }
        get('jsonReseau').value = JSON.stringify(final);
    }

    genJsonReseau();

    $("#aboutTheme").val((i, v) => v.replace(/\s{2,}/g, ''));
</script>
