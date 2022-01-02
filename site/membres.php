<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
if (!$_SESSION['mdp']) {
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


      <!-- Afficher les membres -->
      <?php
          $recupUsers = $bdd->query('SELECT * FROM client');
          while($user = $recupUsers->fetch()){
            ?>
            <p><?= $user['pseudo']; ?> <a href="changeadmin.php?id=<?= user['id']; ?>" style="color;red;
              text-decoration: none,">Mettre admin </a></p>
            <?php
          }
       ?>
       <!--Fin d'afficher tous les membres -->
</body>
</html>
