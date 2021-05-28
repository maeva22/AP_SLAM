<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Liste des élèves n'ayant pas de stage </h5>
                <div class="table-responsive">
                    <table class="table">
                        <form action="../back_end/liste_etudiant_profref.php" method="POST">
                            <thead>
                                <tr>
                                    <th scope="col">Nom Stagiaire</th>
                                    <th scope="col">Prénom Stagiaire</th>
                                    <th scope="col">Etat</th>
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
                                                            <td>' . $row['NOM_ETUDIANT'] . '</td>
                                                            <td>' . $row['PRENOM_ETUDIANT'] . '</td>
                                                            <td>Pas de stage</td>
                                                            </tr>';
                                        }
                                    } ?>
                            </tbody>
                        </form>
                    </table>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Liste des élèves avec un stage refusé </h5>
                <div class="table-responsive">
                    <table class="table">
                        <form action="../back_end/liste_etudiant_profref.php" method="POST">
                            <thead>
                                <tr>
                                    <th scope="col">Nom Stagiaire</th>
                                    <th scope="col">Prénom Stagiaire</th>
                                    <th scope="col">Nom entreprise</th>
                                    <th scope="col">Ville entreprise</th>
                                    <th scope="col">Nom contact</th>
                                    <th scope="col">Tel contact</th>
                                    <th scope="col">Date début</th>
                                    <th scope="col">Date fin</th>
                                    <th scope="col">Etat</th>
                                    <th scope="col">Motif</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach( $stageRefuse as $row2 ) { 
                                echo '
                            
                                <tr>
                                    <td>'. $row2['NOM_ETUDIANT'] .'</td>
                                    <td>'. $row2['PRENOM_ETUDIANT'] .'</td>
                                    <td>'. $row2['NOM_ENTREPRISE'] .'</td>
                                    <td>'. $row2['VILLE_ENTREPRISE'] .'</td>
                                    <td>'. $row2['NOM_SALARIE'] .'</td>
                                    <td>'. $row2['TEL_SALARIE'] .'</td>
                                    <td>'. $row2['DATE_DEBUT'] .'</td>
                                    <td>'. $row2['DATE_FIN'] .'</td>
                                    <td>'. $row2['ETAT'] .'</td>
                                    <td>'. $row2['MOTIF'] .'</td>
                                </tr> 
                                '; } ?>

                            </tbody>
                        </form>
                    </table>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Liste des élèves avec un stage </h5>
                <div class="table-responsive">
                    <table class="table">
                        <form action="../back_end/liste_etudiant_profref.php" method="POST">
                            <thead>
                                <tr>
                                    <th scope="col">Nom Stagiaire</th>
                                    <th scope="col">Prénom Stagiaire</th>
                                    <th scope="col">Nom entreprise</th>
                                    <th scope="col">Ville entreprise</th>
                                    <th scope="col">Nom contact</th>
                                    <th scope="col">Tel contact</th>
                                    <th scope="col">Date début</th>
                                    <th scope="col">Date fin</th>
                                    <th scope="col">Etat</th>
                                    <th scope="col">Statut de la convention</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach( $StageAccepter as $row2 ) { 
                                echo '
                            
                                <tr>   
                                    <td>'. $row2['NOM_ETUDIANT'] .'</td>
                                    <td>'. $row2['PRENOM_ETUDIANT'] .'</td>
                                    <td>'. $row2['NOM_ENTREPRISE'] .'</td>
                                    <td>'. $row2['VILLE_ENTREPRISE'] .'</td>
                                    <td>'. $row2['NOM_SALARIE'] .'</td>
                                    <td>'. $row2['TEL_SALARIE'] .'</td>
                                    <td>'. $row2['DATE_DEBUT'] .'</td>
                                    <td>'. $row2['DATE_FIN'] .'</td>
                                    <td>'. $row2['ETAT'] .'</td>
                                    <td>'. $row2['STATUT_CONVENTION'].'</td>
                                    <td>'. $row2['id_etudiant'].'</td>
                                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#supprimer_stage">Refuser</button>
                                    </td>

                                </tr> 
                                '; } ?>

                            </tbody>
                        </form>
                    </table>
                    <div class="modal fade" id="supprimer_stage" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="../back_end/supprimer_stage.php" method="post">
                                <div class="modal-body">
                                    <h5 class="card-title">Voulez-vous vraiment refuser le stage ? </h5><br />
                                    Motif:
                                    <input id = "motif" name="motif" type="text"></input>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input id="id_etudiant" name="id_etudiant" type="hidden" value='<?php echo $row2['id_etudiant']; ?>'>
                                    <button type="submit" value="id_etudiant" class="btn btn-primary">Refuser</button>
                                    
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
