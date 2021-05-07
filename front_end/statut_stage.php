<!--   MD le 26/03/2021
//  Ce fichier comporte l'affichage du stage 
// de l'étudiant courant.
// cette affichage sera inclus dans le tableau de bord de l'étudiant 
// il pourra voir l'avancement du stage : convention signé, en attente 
-->

<div class="row">
    <div class="col-md-12"> 
        <div class="card">
            <div class="card-body">
                 <h5 class="card-title">Stage</h5>
                 <div class="table-responsive">
                    <table class="table">
                        <form action="../back_end/statut_stage.php" method="POST">
                        <thead>
                            <tr>
                                        <th scope="col">Nom entreprise</th>
                                        <th scope="col">Ville entreprise</th>
                                        <th scope="col">nom du contact</th>
                                        <th scope="col">tel du contact</th>
                                        <th scope="col">Date début</th>
                                        <th scope="col">Date fin</th>
                                        <th scope="col">Modifier</th>
                                        <th scope="col">Statut de la convention</th>
                                        <th scope="col">Actions</th>
                             </tr>
                        </thead>
                        <tbody>
                        <!-- parcours des démarches issues de la BDR
                            et affichages des caractéristiques trouvées-->
                            <?php 
                                 foreach( $stage as $row ) {  
                                    echo ' 
                                    <tr>
                                        <td>'. $row['NOM_ENTREPRISE'].'</td>
                                        <td>'. $row['VILLE_ENTREPRISE'].'</td>
                                        <td>'. $row['NOM_SALARIE'].'</td>
                                        <td>'. $row['TEL_SALARIE'].'</td>
                                        <td>'. $row['DATE_DEBUT'].'</td>
                                        <td>'. $row['DATE_FIN'].'</td>
                                        <td>
                                          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modifier">Modifier</button>
                                       </td>
                                       <td>'. $row['STATUT_CONVENTION'].'</td>
                                        <td>
                                            <button type="submit" name="option_'.$row['ID_STAGE'].'" id="option_'.$row['ID_STAGE'].'" value="En Attente" class="btn btn-success btn-flat"><class="fa fa-check">En Attente</button>
                                            <button type="submit" name="option_'.$row['ID_STAGE'].'" id="option_'.$row['ID_STAGE'].'" value="Signée" class="btn btn-danger btn-flat"><class="fa fa-times">Signée</button>
                                        </td>
                                    </tr> 
                                '; } ?>
                        </tbody>
                    </form>
                    </table>
                 </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modifier" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modifier le stage</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <h5 class="card-title">Stage d entreprise</h5><br />
                        <form id = "modifier_stage" method="post">
                            <div class="form-group">
                            <label for="date_debut">Date début</label>
                            <input type="text" class="form-control" name="date_debut" aria-describedby="date_debut" placeholder="<?php echo $row['DATE_DEBUT']; ?>">
                            </div>
                            <div class="form-group">
                            <label for="date_fin">Date fin</label>
                            <input type="text" class="form-control" name="date_fin" aria-describedby="date_fin" placeholder="<?php echo $row['DATE_FIN']; ?>">
                            </div>

                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" value="modifier_stage" class="btn btn-primary">Enregistrer</button>
                            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                        </div>
                        </form>
                    </div>
                </div>
            </div>

</div>