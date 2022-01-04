<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
if (!$_SESSION['id']) {
    header('location: connexion_ramovie.php');
}

$req = $bdd->prepare('SELECT * FROM salle_de_cinema');
$req->execute(array(
));
$res=$req -> fetchAll();
foreach ($res as $value){


          echo $value['nom_salle']."<br>";
          echo $value['nombre_places']."<br>";
          echo $value['type_salle']."<br>";
}
      ?>
