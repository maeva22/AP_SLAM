<?php

require 'db.php';
$stmt = $db_professeur->prepare("UPDATE STAGE set ETAT = 'RE', MOTIF =:motif where ID_ETUDIANT =:id");
$stmt->bindValue(':id', $_POST['id_etudiant'], PDO::PARAM_INT);
$stmt->bindValue(':motif',$_POST['motif'],PDO::PARAM_STR);
$stmt->execute();
header('Location: ../front_end/afficher_stages.php');

?>
