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
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
$defaultvalue = '0';

$req=$bdd->prepare('SELECT * FROM client WHERE email like :email');
$req->execute(array(
    'email'=>$_POST['email']

));

$res = $req->fetch();

if($res){
    echo "<br><div class='text-center'><h3>Compte existant, redirection dans 5 secondes vers la page d'inscription..</h3><br><a class='btn btn-secondary' href='index.php' role='button'>Accueil</a></div>";
    header('Refresh: 5; register.html');
}
else {

    $requete = $bdd->prepare('INSERT INTO client (nom,prenom,email,mot_de_passe,admin) VALUES (:nom,:prenom,:email,:mot_de_passe,:admin)');
    $requete->execute(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'mot_de_passe' => $_POST['mot_de_passe'],
        'email' => $_POST['email'],
        'admin' => $defaultvalue
    ));
    header('Location: login.html');
}

 ?>
