<div class="card">
    <div class="card-body">
        <h5 class="card-title">Liste des étudiants de votre classe en BTS SIO 1</h5>
        <?php
        $request_table = array(
            $classeProfRefDemarche,
            $etudiantsProfRefDemarche,
            $etudiantsProfSpeDemarche
        );
        $choix_titre = 0;
        foreach ($request_table as $table) {
            if (!empty($table)) { 
                        $choix_titre+=1;?>
            <!-- Tableau pour les sio 1 -->
                <div class="table-responsive">
                    <table class="table">
                   <?php  if($choix_titre==0) {
                            echo'<h5 class="card-title">Liste de votre classe référente</h5> ';
                   }
                   if($choix_titre==1) {
                    echo'<h5 class="card-title">Liste des étudiants dont vous êtes référent</h5> ';
                   }
                   if($choix_titre==2) {   
                    echo'<h5 class="card-title">Liste des étudiants de votre spécialité</h5> ';   
                   }
                       ?>

                        <thead>
                            <tr>
                                <th data-sortable="true" data-field="nom" scope="col">Nom</th>
                                <th data-sortable="true" data-field="prenom" scope="col">Prenom</th>
                                <th data-sortable="true" data-field="courriel" scope="col">Courriel</th>
                                <th data-sortable="true" data-field="nb_demarche" scope="col">NB Démarche étudiant(s) </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- parcours de toutes  les entrepreises de la BDR
                                        et affichages des caractéristiques trouvées
                                        L'utilisateur pourra choisir l'ent pour créer
                                        la démarche de recherche effectuée auprès d'elle-->
                            <?php foreach ($table as $row) {
                                if ($row['ID_CLASSE']==1) {
                                    echo '
                                                  <tr>
                                                    <td>' . escape($row['NOM_ETUDIANT']) . '</td>
                                                    <td>' . escape($row['PRENOM_ETUDIANT']) . '</td>
                                                    <td>' . escape($row['EMAIL']) . '</td>
                                                    <td>' . escape($row['NB_DEM']) . '</td>
                                                    <td>
                                                    <a href="etudiant_demarche.php?id=' . $row['ID_ETUDIANT'] . '&etudiant=' . $row['PRENOM_ETUDIANT'] . '_' . $row['NOM_ETUDIANT'] . '"><button type="button" class="badge badge-success">Voir</button></a>
                                                    </td>

                                                </tr> 
                                                ';
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>