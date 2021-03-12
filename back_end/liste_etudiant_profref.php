<?php
/**
 * * NR le 24/12/2020
 *   
 **/ 
$id = $_SESSION['id'];

$req1="SELECT NOM_ETUDIANT,PRENOM_ETUDIANT,ID_ETUDIANT
FROM ETUDIANT, PROFESSEUR
WHERE ETUDIANT.ID_PROF=PROFESSEUR.ID_PROF 
AND PROFESSEUR.ID_PROF = :id";
$stmt = $db->prepare($req1);
$stmt -> bindValue(":id",$id);
$stmt->execute(); 
$etudiants = $stmt->fetchAll(PDO::FETCH_BOTH);


$id = $_SESSION['id'];

$req1="SELECT * 
FROM STAGE,ENTREPRISE,SALARIE
WHERE STAGE.ID_SALARIE=SALARIE.ID_SALARIE
AND ENTREPRISE.ID_ENTREPRISE=SALARIE.ID_ENTREPRISE"
;
$stmt = $db->prepare($req1);
$stmt -> bindValue(":id",$id);
$stmt->execute(); 
$etudiants2 = $stmt->fetchAll(PDO::FETCH_BOTH);
