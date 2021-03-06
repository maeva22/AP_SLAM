
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Stages en attente</h5>
                <div class="table-responsive">
                    <table class="table">
                        <form action="../back_end/etat_stage.php" method="POST">
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
                        foreach( $stageAttente as $row2 ) { 
                                echo '
                            
                                <tr>
                                    <td>'. $row2['ID_STAGE'] .'</td>    
                                    <td>'. $row2['NOM_ETUDIANT'] .'</td>
                                    <td>'. $row2['PRENOM_ETUDIANT'] .'</td>
                                    <td>'. $row2['NOM_ENTREPRISE'] .'</td>
                                    <td>'. $row2['VILLE_ENTREPRISE'] .'</td>
                                    <td>'. $row2['NOM_SALARIE'] .'</td>
                                    <td>'. $row2['TEL_SALARIE'] .'</td>
                                    <td>'. $row2['DATE_DEBUT'] .'</td>
                                    <td>'. $row2['DATE_FIN'] .'</td>
                                    <td>
                                        <div class="btn-group " role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="btnradio' . $row2['ID_STAGE'] . '" id="btnradio1' . $row2['ID_STAGE'] . '" autocomplete="off" value="OK">
                                            <label class="btn btn-outline-success" for="btnradio1' . $row2['ID_STAGE'] . '" >Valider</label>
                                            <input type="radio" class="btn-check" name="btnradio' . $row2['ID_STAGE'] . '" id="btnradio2' . $row2['ID_STAGE'] . '" autocomplete="off" value="RE" >
                                            <label class="btn btn-outline-danger" for="btnradio2' . $row2['ID_STAGE'] . '"  >Refuser</label>
                                        </div>
                                    </td>
                                </tr> 
                                '; } ?>
                        </tbody>
                        <?php
                        if($countStageAttente !=0){
                            echo'
                        <tfoot>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-primary">Valider les choix</button>
                                </td>
                            </tr>
                        </tfoot>
                      ';}  ?>
                         </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>