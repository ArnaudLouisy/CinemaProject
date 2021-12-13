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
  <table>
      <center>

      <p><h1>Liste des films</h1></p>
      </center>
      <br>
      <br>
      <br>

<?php
foreach ($res as $value){

?>
    <?php
    echo $value ['titre']."<br>";
    echo $value ['description']."<br>";
    echo $value ['annee_sortie']."<br>";
    ?>
      <img src= <?php  echo $value ['image']; ?>  alt="" width="200">
      <?php
}
      ?>
  </table>
  </body>
</html>