<!--   NR le 24/12/2020
  affichage de la barre de navigation avec plusieurs zones
   et selon le type d'utilisateurs
-->

<nav class="navbar navbar-expand-lg navbar-light">
  <?php
  //  affichage des fonctionnalités accessibles aux étudiants
  if ($_SESSION['rank'] == "professeur") {
    echo '
    <h2 class="navbar-brand nav-link">
    <a href="tdb_professeur.php">
      iStage pour les professeurs.
    </a>
  </h2>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Liste des étudiants et leurs démarches
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a href="lister_etudiant.php?classe=SIO1"> BTS SIO1</a>
          <a href="lister_etudiant.php?classe=SIO2"> BTS SIO2</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" data-toggle="dropdown">
          Gérer les stages
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a href="emettre_voeux.php"> émettre des voeux de visites</a>
          <a href="afficher_visites.php"> afficher les visites fixées</a>
          <a href="afficher_stages.php"> afficher les stages </a>
          <a href="stats_stages.php">afficher les statistiques des stages </a>
        </div>
      </li>
    </ul>
  ';
  }
  //  affichage des fonctionnalités accessibles aux étudiants
  if ($_SESSION['rank'] == "etudiant") {
    echo '
    <h2 class="navbar-brand nav-link" >
    <a
      href="tdb_etudiant.php">
         iStage  pour les  étudiants. 
    </a>
  </h2>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-link ">
     <a  href="lister_demarches.php">Actualiser/créer tes démarches</a>
     </li>
     <li class="nav-link ">
        <a  href="lister_creer_entreprises.php">Chercher une entreprise</a>
    </li>
    </ul>
    
   ';
  }
  ?>
  <!--   NR le 24/12/2020
//  affichage de la barre de navigation commune aux étudiants et professeurs
//  affichage des éléments d'identification et de la possibilité de les consulter 
// et les modifier!
// ainsi quie la déconnexion à l'application avec RAZ des variables de session
-->
  <ul class="navbar-collapse justify-content-end navbar-nav">
    <li class=" nav-link dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fad fa-user-tag mr-3"></i>
        <?php echo ucfirst($_SESSION['prenom']) . " " . ucfirst($_SESSION['nom']); ?>
      </a>
      <ul class="dropdown-menu">
        <li>
          <a class="dropdown-item" href="profil.php">
            <i class="fad fa-user mr-3"></i>
            Mon Profil
          </a>
        </li>
        <li><a class="dropdown-item" href="deconnexion.php">
            <i class="fad fa-sign-out mr-3"></i>
            Se déconnecter
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>