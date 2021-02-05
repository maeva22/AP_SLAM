<?php 
include('../includes/header.php');
include('../middlewares/professeur.php');
include('show-data_gen.php');
/**
 * * NR le 22/01/021
 *   ce fichier permet de mettre la valeur ETAT en 1 
 *      . refuser le stage 
 **/ 

$stmt = $db->prepare('UPDATE stage SET ETAT ="OK" WHERE ID_STAGE=:id_stage;');
$stmt->bindParam(":id_stage", $id_stage);
$stmt->execute();

?>
