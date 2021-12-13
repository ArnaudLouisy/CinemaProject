<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
$req = $bdd->prepare('SELECT * FROM film ');
$req->execute(array(

));
$res=$req -> fetchAll();


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <p>Liste des films</p>
  <table>


<?php
foreach ($res as $value){
    echo $value ['titre']."<br>";
    echo $value ['description']."<br>";
    echo $value ['anne_sortie']."<br>";
    echo $value ['description']."<br>";
     echo $value ['image']."<br>"."<br>";
}
?>
  </table>
  </body>
</html>
