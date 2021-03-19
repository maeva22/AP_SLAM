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