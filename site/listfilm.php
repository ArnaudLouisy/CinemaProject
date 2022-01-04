<?php
session_start();
if (!isset($_SESSION['email'])){
  header('Location: connexion_ramovie.php');
  exit();
}
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
$req = $bdd->prepare('SELECT * FROM film ');
$req->execute(array(

));
$res=$req -> fetchAll();


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RAMOVIE</title>
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
    <meta charset="utf-8">
    <title>RAMOVIE - Films</title>
  </head>
  <body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top"><img src="assets/img/ramov.png" alt="logo" width="200"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="espace_membre_ramovie.php">ESPACE MEMBRES</a></li>
                      <li class="nav-item"><a class="nav-link" href="deco.php">Deconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h2 class="text-white font-weight-bold">Accéder à notre liste de films, juste en dessous !</h2>
                    <hr class="divider">
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Une large selection un prix imbattable ! #rat</p>
                    <a class="btn btn-danger btn-xl" href="#about">Voir la liste des films</a>
                </div>
            </div>
        </div>
    </header>
  <table>
      <center>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p><h1>À l'affiche :</h1></p>
      </center>
      <br>
      <hr class="bg-danger border-5 border-top border-dark">
<?php
foreach ($res as $value){

?>

    <br>
    <div class="text-center">
      <img class="img-thumbnail" src= assets/films/<?php  echo $value ['image']; ?>  alt="" width="200">
    </div>

    <br>


      <figure class="text-center mx-auto" style="width: 400px;">
        <blockquote class="blockquote">
          <p><?php
          echo $value ['titre']."<br>";?></p>
        </blockquote>
        <figcaption class="blockquote-footer">
          <?php
          echo $value ['description']."<br>";?> <cite title="Source Title"><?php
          echo $value ['annee_sortie']."<br>";
          ?></cite>
        </figcaption>
        <a class="btn btn-secondary" href="reservation.php" role="button">RÉSERVER</a>
      </figure>


      <?php
}
      ?>
      <br> <br>
      <a class="btn btn-danger" href="index.php" role="button">Accueil</a>
  </table>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- SimpleLightbox plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
  <!-- * *                               SB Forms JS                               * *-->
  <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</html>
