<!DOCTYPE html>
<html lang="*fr">

<?php 
    $title = "Tableau de Bord Professeur";    
    include '../includes/header.php';   
    include '../middlewares/professeur.php';     
    include '../back_end/show-data_gen.php';    
    include '../back_end/show-data_prof.php';    
    include '../back_end/liste_etudiant_profref.php';
    
    ?>

<body>
    <?php 
    include '../includes/barnav.php';  
    include 'stages_etudiants.php';
    ?>     
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