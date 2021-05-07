<!--   NR le 24/12/2020
// A INCLURE  SYSTEMATIQUEMENT dans toutes les fichiers d'affichage des pages
// pour initialiser les traitements à effectuer systématiquement au début de chaque page!
// -> ouvrir la connexion à la base
// -> charger des utilitaires 
// -> initialiser le titre
// -> charger les styles et élments de présentations comme les fonts
-->
<?php
require_once '../back_end/db.php';
require_once '../includes/utils.php';
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">

    <!-- Title -->
    <title><?php if (isset($title)) {
                       echo($title);} ?>
         - iStage
    </title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="../assets/fonts/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="../assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="../assets/plugins/toastr/toastr.min.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="../assets/css/custom.css" rel="stylesheet">
    <link href="../assets/css/lime.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script><!--Script javascript mis dans le header car il est obligé d'être chargé avant le script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script><!--Script déplacé car ne chargeait pas s'il était en footer pour les graphs -->

</head>
