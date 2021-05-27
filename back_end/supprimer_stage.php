<?php

require 'db.php';
$stmt = $db_professeur->prepare("UPDATE STAGE set ETAT = 'RE' where ID_ETUDIANT =:id");
$stmt->bindValue(':id', $_POST['id_etudiant'], PDO::PARAM_INT);
$stmt->execute(); 
$stmt = $db_professeur->prepare("INSERT INTO MOTIF_REFUS(ID_STAGE,MOTIF) VALUES((SELECT ID_STAGE from stage WHERE ID_ETUDIANT = :id),:motif)");
$stmt->bindValue(':id',$_POST['id_etudiant'],PDO::PARAM_INT);
$stmt->bindValue(':motif',$_POST['motif'],PDO::PARAM_STR);
$stmt->execute();
header('Location: ../front_end/afficher_stages.php');

?>
