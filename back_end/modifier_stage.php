

<?php
/**
 * * NR le 24/12/2020
 *   ce fichier permet de modifer des informations du stage de l'etudiant.
 *     Les caractéristiques : date_debut, date_fin, le tuteur, l'eleve, l'entreprise 
 **/ 


// Requête de modification d'enregistrement
$etat1 = false;
$modif_date_debut = "UPDATE STAGE SET ";
if (isset($_POST['date_debut'])){
    $modif_date_debut = $modif_date_debut.'DATE_DEBUT="'.($_POST['date_debut']).'" ';
    $etat1 = true;
}

$modif_date_fin = "UPDATE STAGE SET ";
if (isset($_POST['date_fin'])){
    $modif_date_fin = $modif_date_fin.'DATE_FIN="'.($_POST['date_fin']).'" ';
    $etat2 = true;
}

if ($etat1 == true){
    $stmt = $db->prepare($modif_date_debut);
    $stmt->execute(); 
}
if ($etat2 == true){
    $stmt = $db->prepare($modif_date_fin);
    $stmt->execute(); 
}