<!DOCTYPE html>
<html lang="en">
<?php
    $title = "Créer une nouvelle demarche si l'entreprise existe";

    include_once '../includes/header.php';
    include_once '../middlewares/etudiant.php';

    include_once '../back_end/recherche_entreprise.php';
    // inclusion des fichiers de traitements de données
    include_once '../back_end/creer_contact.php';
?>

<body>
    <?php
    include_once '../includes/barnav.php';
?>
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nouvelle demarche si l'entreprise existe</h5>
                                <div class="mt-4">

                                    <?php if(isset($success)) {
                                    echo '<p class="text-'.($success == true ? 'success' : 'danger').'">'.$message.
                                        '</p>';
                                      } ?>
                                </div>

                                <div class="card">
                                    <p class="card-title">Entreprise choisie</p>
                                    <div class="card-body">
                                        <p class="card-text">Nom de l'entreprise : 
                                            <?php echo $entreprise['NOM_ENTREPRISE'];?></p>
                                        <p class="card-text">Adresse de l'entreprise : 
                                            <?php echo $entreprise['ADRESSE_ENTREPRISE'];?></p>
                                        <p class="card-text">
                                            <?php echo $entreprise['CP_ENTREPRISE'].' '
                                            .$entreprise['VILLE_ENTREPRISE'];?></p>
                                        <p class="card-text">Teléphone : 
                                            <?php echo $entreprise['TEL_ENTREPRISE'];?></p>
                                        <p class="card-text"> Courriel : 
                                            <?php echo $entreprise['EMAIL_ENTREPRISE'];?></p>
                                        <p class="card-text"> <?php if ($entreprise['REFUS_ANNEESIO1']==1 ) 
                                            echo'<p> <i class="fad fa-exclamation-circle" 
                                            style="color:red"></i>refus stagiaire</p>';?>
                                    </div>
                                </div>



                                <form method="POST" id="creer_contact" name="creer_contact" class="mt-4">
                                    <div class="form-group">
                                        <label for="nom">Nom contact</label>
                                        <input type="text" class="form-control" id="nom" name="nom" maxlength="32" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="prenom">Prenom contact</label>
                                        <input type="text" class="form-control " id="prenom" name="prenom" maxlength="32" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" maxlength="32" size="32" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tel">Telephone contact</label>
                                        <input type="tel" id="tel" name="tel" maxlength="10" required>
                                    </div>


                                    <div class="mt-3">
                                        <button type="submit" name="creer_contact" id="creer_contact" class="btn btn-block btn-primary btn-lg">Soumettre</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
    </div>


    <?php include '../includes/footer.php' ?>

</body>

</html>
