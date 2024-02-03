<?php
session_start();
 if(!$_SESSION['conAd'])
    header("Location:index.html");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../CSS/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>accueil Administrateur</title>
</head>

<body>
    <div class="container-fluid"  >
        <div class="card-header text-center text-primary ">
            <h1>Section Informatique</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <!--  <img src="../image/pexels-maxime-francis-2246476.jpg" alt="Header">-->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class=" but col bg-primary text-light text-center mt-5 ms-1">
                    <h2 class="card-header  card-header mt-4">Gestion Classe</h2>
                    <h5 ><a a class="text-light mt-4" href="gestionClasse.php">Ajouter</a></h5>
                    <h5><a class="text-light mt-4" href="gestionClasse.php">Modifier</a></h5>
                    <h5><a class="text-light mt-4" href="gestionClasse.php">Supprimer</a></h5>
            </div>
            <div class=" but col bg-primary text-light text-center mt-5 ms-1">
                    <h2 class="card-header  card-header mt-4">Gestion Enseignant</h2>
                    <h5 ><a a class="text-light mt-4" href="AjouterEnseignant.php">Ajouter</a></h5>
                    <h5><a class="text-light mt-4" href="ModiSupEnseig.php">Modifier</a></h5>
                    <h5><a class="text-light mt-4" href="ModiSupEnseig.php">Supprimer</a></h5>
            </div>
        </div>
    </div>
</body>
</html>