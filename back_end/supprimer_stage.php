<?php

$stmt = $db->prepare("UPDATE STAGE set ETAT = 'RE' where ID_ETUDIANT ");
$stmt->execute(); 
$stageLe = $stmt->fetchAll(PDO::FETCH_BOTH);

?>
