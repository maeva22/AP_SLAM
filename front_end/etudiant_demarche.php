<!DOCTYPE html>
<html lang="en">

<?php
$title = "Liste des démarches de l'étudiant";
// inclusion des fichiers header, tt du type d'utilisateur
include '../includes/header.php';
include '../middlewares/professeur.php';
// inclusion des fichiers de traitements de données   
include '../back_end/show-data_prof.php';
include '../back_end/show-data_etudiant.php';
?>

<body>

    <?php
    //Inclusion de la barre de navigation
    include '../includes/barnav.php';
    ?>

    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Liste des démarches de <?php echo str_replace("_", " ", $_GET['etudiant']); ?></h5><!--str_replace permet de transformer le nom et le prenom en texte lisible (enlève le underscore de separation) -->
                                <?php if($demarchesProf){?>
                                <div class="table-responsive">
                                <!-- Tableau pour afficher toutes les démarches d'un élève -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th data-sortable="true" data-field="nom" scope="col">Date démarche</th>
                                                <th data-sortable="true" data-field="prenom" scope="col">Nom entreprise</th>
                                                <th data-sortable="true" data-field="courriel" scope="col">Ville entreprise</th>
                                                <th data-sortable="true" data-field="nb_demarche" scope="col">Nom du contact</th>
                                                <th data-sortable="true" data-field="nb_demarche" scope="col">Tel du contact</th>
                                                <th data-sortable="true" data-field="nb_demarche" scope="col">Moyen de communication</th>
                                                <th data-sortable="true" data-field="nb_demarche" scope="col">Commentaire</th>
                                                <th data-sortable="true" data-field="nb_demarche" scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($demarchesProf as $row) {
                                                if ($row['ID_ETUDIANT'] == $_GET['id']) {
                                                    echo '
                                                  <tr>
                                                    <td>' . escape(substr($row['DATE_DEMARCHE'], 0, -8)) . '</td>
                                                    <td>' . escape($row['NOM_ENTREPRISE']) . '</td>
                                                    <td>' . escape($row['VILLE_ENTREPRISE']) . '</td>
                                                    <td>' . escape($row['NOM_SALARIE']) . '</td>
                                                    <td>' . escape($row['TEL_SALARIE']) . '</td>
                                                    <td>' . escape($row['LIBELLE_MOYEN']) . '</td>
                                                    <td>' . escape($row['COMMENTAIRE']) . '</td>
                                                    <td>
                                                    <button type="button" class="badge badge-success" data-toggle="modal" data-target="#spe_modal' . $row['ID_DEMARCHE'] . '">Voir</button>
                                                    </td>
                                                </tr> 
                                                ';
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Création de toutes les fenêtres pour les détail de la démarche sélectionnée -->
    <?php foreach ($demarchesProf as $row) {
        if ($row['ID_ETUDIANT'] == $_GET['id']) {
    ?>
            <div class="modal fade" id="spe_modal<?php echo $row['ID_DEMARCHE']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="card-title">Entreprise choisie :</h5><br />
                            <?php echo'Nom de l\'entreprise : '.$row['NOM_ENTREPRISE'].'<br/>Adresse de l\'entreprise : '.$row['ADRESSE_ENTREPRISE'].'<br/>'.$row['CP_ENTREPRISE'].' '.$row['VILLE_ENTREPRISE'].'<br/>Téléphone : '.$row['TEL_ENTREPRISE'].'<br/>Courriel : '.$row['TEL_ENTREPRISE'].'<br/><br/>Contact : '.$row['NOM_SALARIE'].' '.$row['PRENOM_SALARIE'].', Tel : '.$row['TEL_SALARIE'].', Courriel : '.$row['EMAIL_SALARIE'].'<br/>Date de la démarche : '.$row['DATE_DEMARCHE'].'<br/>Commentaire : '.$row['COMMENTAIRE'].'<br/>Moyen de communication : '.$row['LIBELLE_MOYEN'];
                            ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
    <div class="lime-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="footer-text">2020 © iStage</span>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include '../includes/footer.php' ?>

</body>

</html>