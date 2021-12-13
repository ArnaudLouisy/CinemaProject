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

	<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');


//	$req = $bdd->prepare("SELECT * FROM client WHERE email=$_SESSION['email']");
	$req = $pdo->prepare("SELECT * FROM users WHERE email=?");
	$req ->execute(['email' => $_SESSION['email']]);
	$res = $req->fetch();

	 ?>

	<form method="post" action="update.php">
	    <div>
	        <label for="nom">Nom :</label>
	        <input type="text" id="nom" name="nom" value="<?php echo $res["nom"]?>">
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
		 <div>
		 	 <input type="submit">
		 </div>
	</form>
<a href="deco.php">Déconnexion</a> <br>
<a href="index.php">Retourner a l'accueil</a>


</body>
</html>
