<?php 
/**
 * * NR le 24/12/2020
 *   ce fichier permet de retrouver les informations nécessaires
 *   à l'affichage du tableau de bord
 *      . savoir si le stagiaire a obtenu un stage
 *      . connaitre les démarches effectuées par le candidat
 **/ 
// Conservation de l'identifiant  pour  les traitements sur le professeur
$id_courant=$_SESSION['id'];


// Recherche des stages non validés dans la même spécialité  
// que celle du professeur connecté s'il est professeur de spécialité
$stmt = $db_professeur->prepare(
    "SELECT ID_STAGE,DATE_FIN,DATE_DEBUT, NOM_ETUDIANT,
            PRENOM_ETUDIANT,NOM_ENTREPRISE,
            VILLE_ENTREPRISE,NOM_SALARIE,TEL_SALARIE 
      FROM stage,entreprise,etudiant,salarie,specialite 
      WHERE SALARIE.ID_SALARIE=STAGE.ID_SALARIE AND 
            SALARIE.ID_ENTREPRISE=ENTREPRISE.ID_ENTREPRISE AND
           STAGE.ID_ETUDIANT=ETUDIANT.ID_ETUDIANT AND 
           ETUDIANT.ID_SPECIALITE=SPECIALITE.ID_SPECIALITE AND 
           SPECIALITE.ID_PROF=:id    AND ETAT ='AT' 
           ORDER BY NOM_ETUDIANT DESC;"
);
$stmt->bindValue(':id', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$stageAttente = $stmt->fetchAll(PDO::FETCH_BOTH);
$countStageAttente = count($stageAttente);

// Recherche des démarches effectuées par les étudiants de BTS  
// pour le professeur de référence d'élève
$stmt = $db_professeur->prepare(
    "SELECT   etudiant.ID_ETUDIANT,NOM_ETUDIANT,PRENOM_ETUDIANT,ID_CLASSE,etudiant.EMAIL,COUNT(ID_DEMARCHE)  AS NB_DEM  
        FROM etudiant 
        LEFT JOIN demarche ON ETUDIANT.ID_ETUDIANT=DEMARCHE.ID_ETUDIANT 
        WHERE ETUDIANT.ID_PROF=:id_courant 
        GROUP BY ETUDIANT.ID_ETUDIANT   
        ORDER BY NOM_ETUDIANT;"
);
$stmt->bindValue(':id_courant', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$etudiantsProfRefDemarche = $stmt->fetchAll(PDO::FETCH_BOTH);
$countDemarcheProfref = count($etudiantsProfRefDemarche);

// Recherche des démarches effectuées par les étudiants de BTS
// décompte des démarches effectuées par chaque étudiant 
// pour un professeur référent de classe
$stmt = $db_professeur->prepare(
    "SELECT   etudiant.ID_ETUDIANT,NOM_ETUDIANT,PRENOM_ETUDIANT,ID_CLASSE,etudiant.EMAIL,COUNT(ID_DEMARCHE)  AS NB_DEM  
        FROM etudiant 
        LEFT JOIN demarche ON ETUDIANT.ID_ETUDIANT=DEMARCHE.ID_ETUDIANT 
        WHERE CLASSE.ID_PROF=:id_courant 
        GROUP BY ETUDIANT.ID_ETUDIANT   
        ORDER BY NOM_ETUDIANT;"
);
$stmt->bindValue(':id_courant', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$classeProfRefDemarche = $stmt->fetchAll(PDO::FETCH_BOTH);
$countDemarcheProfrefclasse = count($classeProfRefDemarche);


// Recherche des démarches effectuées par les étudiants de BTS
// décompte des démarches effectuées par chaque étudiant 
// pour un professeur de spécialité
$stmt = $db_professeur->prepare(
    "SELECT  etudiant.ID_ETUDIANT,NOM_ETUDIANT,PRENOM_ETUDIANT,ID_CLASSE,etudiant.EMAIL,specialite.ID_SPECIALITE,COUNT(ID_DEMARCHE)  AS NB_DEM  
      FROM etudiant 
          LEFT JOIN demarche ON ETUDIANT.ID_ETUDIANT=DEMARCHE.ID_ETUDIANT 
          INNER JOIN specialite ON SPECIALITE.ID_PROF=ETUDIANT.ID_SPECIALITE 
     WHERE SPECIALITE.ID_PROF=:id_courant 
     GROUP BY ETUDIANT.ID_ETUDIANT  
      ORDER BY NOM_ETUDIANT;"
);
$stmt->bindValue(':id_courant', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$etudiantsProfSpeDemarche = $stmt->fetchAll(PDO::FETCH_BOTH);
$countDemarcheProfspe = count($etudiantsProfSpeDemarche);

// Recherche des démarches effectuées par les étudiants de BTS
// décompte des démarches effectuées par chaque étudiant associé à un simple professeur
$stmt = $db_professeur->prepare(
    "SELECT  NOM_ETUDIANT,PRENOM_ETUDIANT,COUNT(ID_DEMARCHE)  AS NB_DEM  
        FROM etudiant 
         LEFT JOIN demarche ON ETUDIANT.ID_ETUDIANT=DEMARCHE.ID_ETUDIANT 
         INNER JOIN classe ON ETUDIANT.ID_CLASSE=CLASSE.ID_CLASSE  
        WHERE LIBELLE_CLASSE='SIO1' AND ETUDIANT.ID_PROF=:id_courant 
        GROUP BY ETUDIANT.ID_ETUDIANT   
        ORDER BY NOM_ETUDIANT;"
);
$stmt->bindValue(':id_courant', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$etudiantsProfSimpleDemarche = $stmt->fetchAll(PDO::FETCH_BOTH);
$countDemarcheProfsimple = count($etudiantsProfSimpleDemarche);

//Requête permettant d'afficher les démarches d'un étudiant choisi
$stmt = $db_professeur->prepare(
    "SELECT ID_ETUDIANT,ID_DEMARCHE, NOM_ENTREPRISE,VILLE_ENTREPRISE, ADRESSE_ENTREPRISE,CP_ENTREPRISE,TEL_ENTREPRISE,EMAIL_ENTREPRISE,NOM_SALARIE,PRENOM_SALARIE,TEL_SALARIE,EMAIL_SALARIE,DATE_DEMARCHE,COMMENTAIRE,LIBELLE_MOYEN 
        FROM demarche
        INNER JOIN salarie ON demarche.ID_SALARIE =  salarie.ID_SALARIE
        INNER JOIN entreprise ON salarie.ID_ENTREPRISE = entreprise.ID_ENTREPRISE
        INNER JOIN moyencom ON demarche.ID_MOYEN = moyencom.ID_MOYEN
        ORDER BY DATE_DEMARCHE  DESC"
  );
  $stmt->execute(); 
  $demarchesProf = $stmt->fetchAll(PDO::FETCH_BOTH);
  $countDemarches= count($demarchesProf);



?>