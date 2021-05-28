<?php
/*requête pour avoir les statistiques sur les villes*/
$stmt = $db_professeur->prepare("SELECT VILLE_ENTREPRISE as labels,COUNT(stage.ID_STAGE) as nbville from entreprise INNER JOIN salarie on salarie.ID_ENTREPRISE = entreprise.ID_ENTREPRISE INNER JOIN stage on stage.ID_SALARIE = salarie.ID_SALARIE GROUP BY VILLE_ENTREPRISE");
$stmt->execute();
$stats_villes = $stmt->fetchAll(PDO::FETCH_BOTH);

/*requête pour avoir les statistiques sur les départements*/
$stmt = $db_professeur->prepare("SELECT SUBSTRING(CP_ENTREPRISE,1,2) as labels,COUNT(Stage.ID_STAGE) as nbdepartement from entreprise INNER JOIN salarie on salarie.ID_ENTREPRISE = entreprise.ID_ENTREPRISE INNER JOIN stage on stage.ID_SALARIE = salarie.ID_SALARIE group by SUBSTRING(CP_ENTREPRISE,1,2)");
$stmt->execute();
$stats_departements = $stmt->fetchAll(PDO::FETCH_BOTH);

/*requête pour avoir les statistiques sur les entreprises*/
$stmt = $db_professeur->prepare("SELECT entreprise.NOM_ENTREPRISE as labels,COUNT(Stage.ID_STAGE) as nbentreprise from entreprise INNER JOIN salarie on salarie.ID_ENTREPRISE = entreprise.ID_ENTREPRISE INNER JOIN stage on stage.ID_SALARIE = salarie.ID_SALARIE group by entreprise.NOM_ENTREPRISE");
$stmt->execute();
$stats_entreprises = $stmt->fetchAll(PDO::FETCH_BOTH);