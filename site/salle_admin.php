<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
if (!$_SESSION['id']) {
    header('location: connexion_ramovie.php');
}

$req = $bdd->prepare('SELECT * FROM film');
$req->execute(array(

));
$res=$req -> fetchAll();

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Espace Administrateur</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/alternative.css" rel="stylesheet" />
  </head>
  <body>
    <h3>Ajout de salle : </h3>

        <form  action="salle_admin_2.php" method="post">
          <p>Numéro de la salle :</p>
          <input type="number" min="1" name="nom_salle" placeholder="Numéro de la salle" > <br>
          <p>Nombre de places :</p>
          <input type="number" min="20" name="nombre_places" placeholder="Nombre de places" > <br>
          <p>Type de salle :</p>
          <select name="type_salle" id="salle-select">
        <option value="4DX">Salle 4DX</option>
        <option value="Standard">Salle Standard</option>
        <option value="Ice">Salle Ice</option>
        <option value="Maxi">Salle Maxi-confort</option>
        <option value="IMax">Salle IMax</option>
          </select> <br>
          <p>Film associé à la salle :</p>
    <select name="ref_film" id="ref_film">
      <?php foreach ($res as $value) {
        ?>
        <option value="<?php echo $value['id_film']  ?>"> <?php echo $value['titre']; ?></option>
        <?php
      } ?>

    </select>
    <br> <br>
    <input type="submit" value="Enregistrer">
        </form>
          <br> <br>
      <a class="btn btn-secondary" href="menu_admin.html" role="button">Accueil</a>
  </body>
</html>
