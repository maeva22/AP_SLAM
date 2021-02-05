
<?php
require 'db.php';
foreach ($_POST as $key => $valeur) {
    $idstage = str_replace("btnradio","", $key);
    $radio = $valeur;
    $req = $db->prepare('UPDATE stage SET ETAT =:etatstage WHERE ID_STAGE=:id_stage ');
    $req->bindParam(":id_stage", $idstage);
    $req->bindParam(":etatstage",$radio);
    $req->execute();
    header('Location: ../front_end/tdb_professeur.php');
}
?>