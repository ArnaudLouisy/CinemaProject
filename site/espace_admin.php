<?php
session_start();
if (!isset($_SESSION['email'])) {
    header ('Location: index.php');
    exit();

    $bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
    if (!$_SESSION['id']=='1') {
        header('location: connexion_ramovie.php');
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Afficher les membres </title>
        <meta charset="utf-8">
    </head>
    <body>


          <!-- Afficher les membre -->
          <a href="list_membre.php"> Affichier la liste des membres </a>
             <!--Fin d'afficher tous les membres -->
          <?php
              $recupUsers = $bdd->query('SELECT * FROM client');
              while($user = $recupUsers->fetch()){
                ?>
                <p><?php $user['pseudo']; ?> <a href="changeadmin.php?id=<?= user['id']; ?>" style="color;red;
                  text-decoration: none,">Mettre admin </a></p>
                <?php
              }
           ?>

    </body>
    </html>
