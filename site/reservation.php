<?php
session_start();
if (!isset($_SESSION['email'])){
  header('Location: connexion_ramovie.php');
  exit();
}
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
// recup film
$req = $bdd->prepare('SELECT * FROM film ');
$req->execute(array(

));
$res1=$req->fetchAll();

// recup salle
$req = $bdd->prepare('SELECT * FROM salle_de_cinema');
$req->execute(array(

));
$res2=$req->fetchAll();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>Ajout de salle :  </h3>
    <ul>
      <li>
        <form  action="salle_admin_2.php" method="post">
          <input type="number" min="1" name="nom_salle" placeholder="Numéro de la salle" >
          <input type="number" min="20" name="nombre_places" placeholder="Nombre de places" >


          <select name="ref_film" id="salle-select">
            <?php foreach ($res2 as $value) {
              ?>
              <option value="<?php 'SELECT ref_film FROM salle_de_cinema WHERE titre =? '  ?>"> <?php echo $value ?></option>
              <?php
              echo $value ['titre']."<br>";?>
              <?php
            } ?>

          </select>
    <input type="submit" value="Enregistrer">

        </form>
      </li>
    </ul>
  </body>
</html>
