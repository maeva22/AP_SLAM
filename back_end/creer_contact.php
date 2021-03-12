<?php
/**
 * NR le 24/12/2020
 *  ce fichier permet de créer une démarche quand l'utilisateur est un etudiant
 **/
// Vérification que l'utilisateur a bien saisi les informations attendues
if (isset($_POST['creer_contact'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) 
        && !empty($_POST['tel']) && !empty($_POST['email'])
    ) {
// préparation de l'enregistrement du contact avec les valeurs saisies 
        $query = "INSERT INTO SALARIE (ID_ENTREPRISE,NOM_SALARIE,PRENOM_SALARIE,
        TEL_SALARIE,EMAIL_SALARIE) VALUES (:id,:nom,:prenom,:tel,:email);";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->bindValue(':tel', $_POST['tel'], PDO::PARAM_STR);
        
               try {
            $execute =$stmt->execute();
            $success = true;
            $message = "Le contact a bien été ajoutée.";
            // à la suite de l'actualisation-création de ses démarches, 
            //l'étudiant est renvoyé sur son tableau de bord
            header("lister_creer_entreprises.php");
        }
        // si l'enregistrement n'a pas été effectué , 
        //traitement d'avertissement de l'utilisateur
        catch    (Exception $e){
            $message =$e;
            $success = false;
            $message ="pas d'ajout.";
        }
    } else {
        $success = false;
        $message = "Il faut remplir tous les champs.";
    }

}
?>

<?php
