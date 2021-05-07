<?php

$id_et=$_SESSION['id'];

$stmt = $db->prepare("UPDATE STAGE set ETAT = 'RE' WHERE ID_ETUDIANT = :id");
$id_et=$_SESSION['id'];
$stmt->bindValue(':id', $id_et, PDO::PARAM_INT);
$stmt->execute(); 
$stageLe = $stmt->fetchAll(PDO::FETCH_BOTH);

?>
