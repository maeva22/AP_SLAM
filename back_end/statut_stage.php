<?php
/** MD le 08/03/2021
* 	code SQL 
	pour changer le statut de la convention du stage en Signée ou En Attente 
 **/ 
include'db.php';
   
foreach ($_POST as $key => $value) {
$id = str_replace("option_", "", $key);
$choix = $value;
echo $choix;
$requete = $db_etudiant->prepare('UPDATE stage SET STATUT_CONVENTION=:choix WHERE ID_STAGE=:id_stage ');
$requete->bindParam(":id_stage", $id,PDO::PARAM_INT);
$requete->bindParam(":choix",$choix,PDO::PARAM_STR);
$requete->execute();
header("Location:../front_end/tdb_etudiant.php");
exit();
}
?> 