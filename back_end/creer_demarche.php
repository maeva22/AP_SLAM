<?php

if (isset($_POST['creer_demarche'])) {
    
    if (!empty($_POST['id_moyen']) && !empty($_POST['date_dem']) && !empty($_POST['comment'])&& !empty($_POST['id_contact'])) {
        
        $query = "INSERT INTO DEMARCHE (ID_SALARIE, ID_ETUDIANT,ID_MOYEN,DATE_DEMARCHE,COMMENTAIRE) VALUES (:id_contact,:id_etudiant,:id_moyen,:date_dem,:comment);";
    
            $stmt = $db->prepare($query);
            $stmt->bindValue(':id_contact', $_POST['id_contact'], PDO::PARAM_INT);
            $stmt->bindValue(':id_etudiant', $_SESSION['id'], PDO::PARAM_INT);
            $stmt->bindValue(':id_moyen', $_POST['id_moyen'], PDO::PARAM_INT);
            $stmt->bindValue(':date_dem', $_POST['date_dem'], PDO::PARAM_STR);
            $stmt->bindValue(':comment', $_POST['comment'], PDO::PARAM_STR);

        try {    
              $stmt->execute();
              header("refresh:1; tdb_etudiant.php");
        } 
        catch    (Exception $e){
            $message =$e;
            $success = false;
            $message ="pas d'ajout.";
        }
    } 
} 
?>