<?php
session_start();
if (!isset($_SESSION['email'])) {
	header ('Location: index.php');
	exit();
}
?>

<html>
<head>
<title>ESPACE MEMBRES - RAMOVIE</title>
</head>

<body>

<form class="" action="index.html" method="post">

</form>
<a href="deco.php">Déconnexion</a> <br>
<a href="index.php">Retourner a l'accueil</a>
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
$req=$bdd->prepare('SELECT * FROM client WHERE email like :email');
$req->execute(array(
  'email'=>$_POST['email']
));

$res = $req->fetch();
if($res){
    echo 'Compte existant';
}
else {

    $requete = $bdd->prepare('INSERT INTO client (nom,prenom,email,mot_de_passe) VALUES (:nom, :prenom,:email,:mot_de_passe)');
    $requete->execute(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'mot_de_passe' => $_POST['mot_de_passe'],
        'email' => $_POST['email'],
    ));
    header('Location: login.html');
}
 ?>

</body>
</html>
