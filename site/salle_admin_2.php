<?php
var_dump($_POST);
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
if (!$_SESSION['id']) {
    header('location: connexion_ramovie.php');
}
$film = "1";
$req=$bdd->prepare('INSERT INTO salle_de_cinema (nom_salle,nombre_places,type_salle,ref_film) VALUES (:nom_salle,:nombre_places,:type_salle,:ref_film)');
$req->execute(array(
  'nom_salle'=>$_POST['nom_salle'],
  'nombre_places'=>$_POST['nombre_places'],
  'type_salle'=>$_POST['type_salle'],
  'ref_film'=>$film,
));

?>
      <br> <br>
      <a href="espace_admin.php">Retourner a l'espace administrateur</a>

<?php var_dump($_POST); var_dump($res)?>
