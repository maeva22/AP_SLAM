<?php

	if (isset($_POST['visualiser_stage'])) {

	    if (!empty($_POST['id_moyen']) && !empty($_POST['date_dem']) && !empty($_POST['comment'])&& !empty($_POST['id_contact'])) {

	        $query = "INSERT INTO stage (ID_STAGE, ID_ETUDIANT,ID_SALARIE) VALUES (:id_stage,:id_etudiant,:id_contact);";

            $stmt = $db_etudiant->prepare($query);
            $stmt->bindValue(':id_contact', $_POST['id_contact'], PDO::PARAM_INT);
            $stmt->bindValue(':id_etudiant', $_SESSION['id'], PDO::PARAM_INT);

	    }
	}
	header('Location:../front_end/lister_demarches.php');
?>