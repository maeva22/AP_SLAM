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

// Recherche des stages non validés dans la même spécialité  
// que celle du professeur connecté s'il est professeur de spécialité
$stmt = $db->prepare(
    "SELECT DATE_FIN,DATE_DEBUT, NOM_ETUDIANT,
            PRENOM_ETUDIANT,NOM_ENTREPRISE,
            VILLE_ENTREPRISE,NOM_SALARIE,TEL_SALARIE,ETAT
      FROM stage,entreprise,etudiant,salarie,specialite 
      WHERE SALARIE.ID_SALARIE=STAGE.ID_SALARIE AND 
            SALARIE.ID_ENTREPRISE=ENTREPRISE.ID_ENTREPRISE AND
           STAGE.ID_ETUDIANT=ETUDIANT.ID_ETUDIANT AND 
           ETUDIANT.ID_SPECIALITE=SPECIALITE.ID_SPECIALITE AND 
           SPECIALITE.ID_PROF=:id    AND ETAT ='RE' 
           ORDER BY NOM_ETUDIANT DESC;"
);
$stmt->bindValue(':id', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$stageRefuse = $stmt->fetchAll(PDO::FETCH_BOTH);
$countStageRefuse = count($stageRefuse);

// Recherche des stages non validés dans la même spécialité  
// que celle du professeur connecté s'il est professeur de spécialité
$stmt = $db->prepare(
    "SELECT DATE_FIN,DATE_DEBUT, NOM_ETUDIANT,
            PRENOM_ETUDIANT,NOM_ENTREPRISE,
            VILLE_ENTREPRISE,NOM_SALARIE,TEL_SALARIE,ETAT
      FROM stage,entreprise,etudiant,salarie,specialite 
      WHERE SALARIE.ID_SALARIE=STAGE.ID_SALARIE AND 
            SALARIE.ID_ENTREPRISE=ENTREPRISE.ID_ENTREPRISE AND
           STAGE.ID_ETUDIANT=ETUDIANT.ID_ETUDIANT AND 
           ETUDIANT.ID_SPECIALITE=SPECIALITE.ID_SPECIALITE AND 
           SPECIALITE.ID_PROF=:id    AND ETAT ='OK' 
           ORDER BY NOM_ETUDIANT DESC;"
);
$stmt->bindValue(':id', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$StageAccepter = $stmt->fetchAll(PDO::FETCH_BOTH);
$countStageAccepter = count($StageAccepter);