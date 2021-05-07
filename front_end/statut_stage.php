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
</div>