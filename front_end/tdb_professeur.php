<!DOCTYPE html>
<html lang="*fr">

<?php
$title = "Tableau de Bord Professeur";
include '../includes/header.php';
include '../middlewares/professeur.php';
include '../back_end/show-data_gen.php';
include '../back_end/show-data_prof.php';

?>

<body>
    <?php
    include '../includes/barnav.php';
    include 'tbd_gen.php';
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Stages en attente</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <form action="../back_end/statut-stage.php" method="POST">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom Stagiaire</th>
                                        <th scope="col">Prénom Stagiaire</th>
                                        <th scope="col">Nom entreprise</th>
                                        <th scope="col">Ville entreprise</th>
                                        <th scope="col">Nom contact</th>
                                        <th scope="col">Tel contact</th>
                                        <th scope="col">Date début</th>
                                        <th scope="col">Date fin</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($stageAttente as $row) {
                                        echo '
                                            
                                                <tr>
                                                    <td>' . $row['ID_STAGE'] . '</td>    
                                                    <td>' . $row['NOM_ETUDIANT'] . '</td>
                                                    <td>' . $row['PRENOM_ETUDIANT'] . '</td>
                                                    <td>' . $row['NOM_ENTREPRISE'] . '</td>
                                                    <td>' . $row['VILLE_ENTREPRISE'] . '</td>
                                                    <td>' . $row['NOM_SALARIE'] . '</td>
                                                    <td>' . $row['TEL_SALARIE'] . '</td>
                                                    <td>' . $row['DATE_DEBUT'] . '</td>
                                                    <td>' . $row['DATE_FIN'] . '</td>
                                                    <td>
                                                        <div class="btn-group " role="group" aria-label="Basic radio toggle button group">
                                                        <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                                                        <label class="btn btn-outline-success" for="success-outlined">Accepter</label>

                                                        <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                                                        <label class="btn btn-outline-danger" for="danger-outlined">Refuser</label>

                                                
                                                        </div>
                                                    </td>
                                                </tr> 
                                                ';
                                    } ?>
                                </tbody>
                                <?php
                                if ($countStageAttente != 0) {
                                    echo '
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <button type="submit" class="btn btn-primary">Valider les choix</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                      ';
                                }  ?>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php
                include 'etudiant_table_sio1.php';
                ?>
            </div>
        </div>
    </div>
    <div class="lime-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="footer-text">2020 © iStage</span>
                </div>
            </div>
        </div>
    </div>





    <?php include '../includes/footer.php' ?>

</body>

</html>