<?php 
/**
 * * MD le 26/03/2021
 *   ce fichier permet de retrouver les informations nécessaires
 *   à l'affichage du tableau de bord
 *      . savoir si le stagiaire a obtenu un stage
 *      . connaitre les démarches effectuées par le candidat
 *      . connaitre le stage du candidat
 **/ 
$id_et=$_SESSION['id'];

$stmt = $db_etudiant->prepare("SELECT * FROM stage WHERE ID_ETUDIANT=:id;");
$id_et=$_SESSION['id'];
$stmt->bindValue(':id', $id_et, PDO::PARAM_INT);
$stmt->execute(); 
$stage = $stmt->fetchAll(PDO::FETCH_BOTH);
$countStage = count($stage);

// connaitre une démarche nécessite  non seulement de connaitre ces caractéristiques
// mais aussi les caractéristiques de l'entreprise et les moyens de comm utilisés
// et le salarié contacté au sein de l'entreprise
$stmt = $db_etudiant->prepare(
    "SELECT ENTREPRISE.ID_ENTREPRISE, NOM_ENTREPRISE,VILLE_ENTREPRISE, NOM_SALARIE, 
           TEL_SALARIE,DATE_DEMARCHE,COMMENTAIRE,LIBELLE_MOYEN 
           FROM salarie,demarche,entreprise,moyencom 
        WHERE MOYENCOM.ID_MOYEN=DEMARCHE.ID_MOYEN AND 
              DEMARCHE.ID_SALARIE=SALARIE.ID_SALARIE AND
            ENTREPRISE.ID_ENTREPRISE= SALARIE.ID_ENTREPRISE AND 
            DEMARCHE.ID_ETUDIANT=:id 
        ORDER BY DATE_DEMARCHE  DESC"
);

$stmt->bindValue(':id', $id_et, PDO::PARAM_INT);
$stmt->execute(); 
$demarches = $stmt->fetchAll(PDO::FETCH_BOTH);
$countDemarches= count($demarches);

// connaitre un stage nécessite  non seulement de connaitre ces caractéristiques
// mais aussi les caractéristiques de l'entreprise et les dates du stage utilisés
// et le salarié contacté au sein de l'entreprise
$stmt = $db_etudiant->prepare(
        "SELECT ID_STAGE,ENTREPRISE.ID_ENTREPRISE,DATE_FIN,DATE_DEBUT,NOM_ENTREPRISE,
            VILLE_ENTREPRISE,NOM_SALARIE,TEL_SALARIE,STATUT_CONVENTION
      	FROM stage,entreprise,etudiant,salarie
          WHERE 	SALARIE.ID_SALARIE=STAGE.ID_SALARIE AND 
            	SALARIE.ID_ENTREPRISE=ENTREPRISE.ID_ENTREPRISE AND
           		STAGE.ID_ETUDIANT=ETUDIANT.ID_ETUDIANT AND 
          	 	STAGE.ID_ETUDIANT=:id AND
            	ETAT ='OK';"
);

$stmt->bindValue(':id', $id_et, PDO::PARAM_INT);
$stmt->execute(); 
$stage_ok = $stmt->fetchAll(PDO::FETCH_BOTH);
$countstage= count($stage_ok);

?>