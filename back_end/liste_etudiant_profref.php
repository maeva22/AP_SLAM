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
$stmt = $db_professeur->prepare($req1);
$stmt -> bindValue(":id",$id);
$stmt->execute(); 
$etudiants = $stmt->fetchAll(PDO::FETCH_BOTH);


$id = $_SESSION['id'];

$req1="SELECT * 
FROM STAGE,ENTREPRISE,SALARIE
WHERE STAGE.ID_SALARIE=SALARIE.ID_SALARIE
AND ENTREPRISE.ID_ENTREPRISE=SALARIE.ID_ENTREPRISE"
;
$stmt = $db_professeur->prepare($req1);
$stmt -> bindValue(":id",$id);
$stmt->execute(); 
$etudiants2 = $stmt->fetchAll(PDO::FETCH_BOTH);

// Recherche des stages non validés dans la même spécialité  
// que celle du professeur connecté s'il est professeur de spécialité
$stmt = $db_professeur->prepare(
    "SELECT DATE_FIN,DATE_DEBUT, NOM_ETUDIANT,
            PRENOM_ETUDIANT,NOM_ENTREPRISE,
            VILLE_ENTREPRISE,NOM_SALARIE,TEL_SALARIE,ETAT,MOTIF
      FROM stage
      INNER JOIN motif_refus ON stage.id_stage = motif_refus.id_stage
      INNER JOIN SALARIE ON SALARIE.ID_SALARIE = STAGE.ID_SALARIE
      INNER JOIN ENTREPRISE ON SALARIE.ID_ENTREPRISE = ENTREPRISE.ID_ENTREPRISE
      INNER JOIN ETUDIANT ON STAGE.ID_ETUDIANT = ETUDIANT.ID_ETUDIANT
      INNER JOIN SPECIALITE ON ETUDIANT.ID_SPECIALITE = SPECIALITE.ID_SPECIALITE
      WHERE SPECIALITE.ID_PROF=:id    AND ETAT ='RE' 
           ORDER BY NOM_ETUDIANT DESC;"
);
$stmt->bindValue(':id', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$stageRefuse = $stmt->fetchAll(PDO::FETCH_BOTH);
$countStageRefuse = count($stageRefuse);

// Recherche des stages validés dans la même spécialité  
// que celle du professeur connecté s'il est professeur de spécialité
$stmt = $db_professeur->prepare(
    "SELECT ETUDIANT.id_etudiant,DATE_FIN,DATE_DEBUT, NOM_ETUDIANT,
            PRENOM_ETUDIANT,NOM_ENTREPRISE,
            VILLE_ENTREPRISE,NOM_SALARIE,TEL_SALARIE,ETAT,STATUT_CONVENTION
      FROM stage
      INNER JOIN SALARIE ON SALARIE.ID_SALARIE = STAGE.ID_SALARIE
      INNER JOIN ENTREPRISE ON SALARIE.ID_ENTREPRISE = ENTREPRISE.ID_ENTREPRISE
      INNER JOIN ETUDIANT ON STAGE.ID_ETUDIANT = ETUDIANT.ID_ETUDIANT
      INNER JOIN SPECIALITE ON ETUDIANT.ID_SPECIALITE = SPECIALITE.ID_SPECIALITE
      WHERE SPECIALITE.ID_PROF=:id    AND ETAT ='OK' 
           ORDER BY NOM_ETUDIANT DESC;"
);
$stmt->bindValue(':id', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$StageAccepter = $stmt->fetchAll(PDO::FETCH_BOTH);
$countStageAccepter = count($StageAccepter);