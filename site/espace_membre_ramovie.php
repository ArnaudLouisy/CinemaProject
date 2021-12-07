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

	<form method="post">
	    <div>
	        <label for="nom">Nom :</label>
	        <input type="text" id="nom" name="nom">
	    </div>
	    <div>
	        <label for="prenom">Prenom :</label>
	        <input type="text" id="prenom" name="prenom">
	    </div>
	    <div>
	        <label for="email">E-mail :</label>
	        <input type="text" id="email" name="email">
	    </div>
			<div>
				 <label for="password">Mot de passe :</label>
				 <input type="password" id="password" name="mot_de_passe">
		 </div>
	</form>
<a href="deco.php">Déconnexion</a> <br>
<a href="index.php">Retourner a l'accueil</a>
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
$req=$bdd->prepare('SELECT * FROM client WHERE email  = :email and nom = :nom and prenom = :prenom ');
$req->execute(array(
  'email'=>$_POST['email'],
  'nom'=>$_POST['email'],
  'nom'=>$_POST['email'],
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
