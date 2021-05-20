<?php

require 'db.php';
$stmt = $db_professeur->prepare("UPDATE STAGE set ETAT = 'RE' where ID_ETUDIANT =:id");
$stmt->bindValue(':id', $_GET['id_etudiant'], PDO::PARAM_INT);
$stmt->execute(); 
header('Location: ../front_end/afficher_stages.php');

?>
