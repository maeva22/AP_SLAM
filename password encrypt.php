<?php
    require_once 'back_end/db.php';
    $req1="SELECT EMAIL,MDP FROM professeur";
    $stmt = $db_professeur->prepare($req1);
    $stmt->execute(); 
    $mdp_prof = $stmt ->fetchAll(PDO::FETCH_BOTH);
    foreach($mdp_prof as $mdp){
        $req2 = "UPDATE professeur SET MDP ='".hash('sha256',$mdp['MDP']). "' WHERE EMAIL='".$mdp['EMAIL']."'";
        print($req2."; ");
        $stmt = $db_etudiant->prepare($req2);
        $stmt->execute();

    }
    $req3="SELECT EMAIL,MDP FROM etudiant";
    $stmt = $db_etudiant->prepare($req3);
    $stmt->execute(); 
    $mdp_eleve = $stmt ->fetchAll(PDO::FETCH_BOTH);
    foreach($mdp_eleve as $mdp){
        $req4 = "UPDATE etudiant SET MDP ='".hash('sha256',$mdp['MDP']). "' WHERE EMAIL='".$mdp['EMAIL']."'";
        print($req4."; ");
        $stmt = $db_etudiant->prepare($req4);
        $stmt->execute(); 
    }
?>