<!DOCTYPE html>
<html lang="en">

<?php
$title = "Liste des étudiants";
// inclusion des fichiers hedaer, tt du type d'utilisateur
include '../includes/header.php';
include '../middlewares/professeur.php';
// inclusion des fichiers de traitements de données   
include '../back_end/show-data_prof.php';
include '../back_end/show-data_etudiant.php';
?>

<body>

    <?php
    include '../includes/barnav.php';
    ?>

    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        //Listage des étudiants de SIO1 (aps de SIO2 car ils ne sont pas encore à faire)
                        if($_GET['classe']=='SIO1'){
                        include 'etudiant_table_sio1.php';
                        }
                        else{
                            echo'<h5>Pas de BTS SIO2</h5>';
                        }
                        ?>
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