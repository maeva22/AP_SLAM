<!DOCTYPE html>
<html lang="*fr">

<?php
$title = "Tableau de Bord Professeur";
include '../includes/header.php';
include '../middlewares/professeur.php';
include '../back_end/show-data_gen.php';
include '../back_end/show-data_prof.php';
include '../back_end/liste_etudiant_profref.php'

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
                                        <th scope="col">Etat</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($etudiants as $row) {
                                        $verif_stage = 2;
                                        foreach ($etudiants2 as $row2) {
                                            if ($row['ID_ETUDIANT'] == $row2['ID_ETUDIANT']) {
                                                echo '
                                            
                                                <tr>
                                                    <td>' . $row2['ID_STAGE'] . '</td>    
                                                    <td>' . $row['NOM_ETUDIANT'] . '</td>
                                                    <td>' . $row['PRENOM_ETUDIANT'] . '</td>
                                                    <td>' . $row2['NOM_ENTREPRISE'] . '</td>
                                                    <td>' . $row2['VILLE_ENTREPRISE'] . '</td>
                                                    <td>' . $row2['NOM_SALARIE'] . '</td>
                                                    <td>' . $row2['TEL_SALARIE'] . '</td>
                                                    <td>' . $row2['DATE_DEBUT'] . '</td>
                                                    <td>' . $row2['DATE_FIN'] . '</td>
                                                    <td>' . $row2['ETAT'] . '</td>
                                                    <td>
                                                    <div class="btn-group " role="group" aria-label="Basic radio toggle button group">
                                                    <input type="radio" class="btn-check" name="btnradio' . $row['ID_STAGE'] . '" id="btnradio1' . $row['ID_STAGE'] . '" autocomplete="off" value="OK">
                                                        <label class="btn btn-outline-success" for="btnradio1' . $row['ID_STAGE'] . '" >Valider</label>
                                                        <input type="radio" class="btn-check" name="btnradio' . $row['ID_STAGE'] . '" id="btnradio2' . $row['ID_STAGE'] . '" autocomplete="off" value="RE" >
                                                        <label class="btn btn-outline-danger" for="btnradio2' . $row['ID_STAGE'] . '"  >Refuser</label>

                                            
                                                    </div>
                                                </td>
                                                        </tr> 
                                                        ';
                                            } else {
                                                $verif_stage--;
                                                if ($verif_stage == 0)
                                                    echo '<tr>
                                                            <td></td>   
                                                            <td>' . $row['NOM_ETUDIANT'] . '</td>
                                                            <td>' . $row['PRENOM_ETUDIANT'] . '</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Pas de stage</td>
                                                            <td> </td>
                                                            </tr>';
                                            }
                                        }
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