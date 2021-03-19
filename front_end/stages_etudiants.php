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
                            <form  action="../back_end/liste_etudiant_profref.php" method="POST">
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

                                </tr> 
                                '; } ?>

                                </tbody>
                            </form>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Liste des élèves avec un stage  </h5>
                    <div class="table-responsive">
                        <table class="table">
                            <form  action="../back_end/liste_etudiant_profref.php" method="POST">
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