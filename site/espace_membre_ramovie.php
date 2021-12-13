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
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
$req = $bdd->prepare('SELECT * FROM client WHERE id_client=:id_client');
$req->execute(array(
    'id_client'=>$_SESSION['id'],
));
$res = $req->fetch();
$mail = $res['email'];
$nom = $res['nom'];
$prenom = $res['prenom'];
?>


<form method="post" action="update.php">
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo $nom ?>" placeholder="Nom de famille">
    </div>
    <div>
        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $prenom ?>" placeholder="Prénom">
    </div>
    <div>
        <label for="email">E-mail :</label>
        <input type="text" id="email" name="email" value="<?php echo $mail ?>" placeholder="Adresse mail">
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="mot_de_passe" placeholder="Mot de passe">
    </div>
    <div>
        <input type="submit">
    </div>
</form>
<a href="deco.php">Déconnexion</a> <br>
<a href="index.php">Retourner a l'accueil</a>

</body>
</html>
