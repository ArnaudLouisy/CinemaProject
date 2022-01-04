<?php
session_start();
$a1 = "1";
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
if (!$_SESSION['id']) {
    header('location: connexion_ramovie.php');
}
$req = $bdd -> prepare("UPDATE client SET admin=:admin WHERE id_client=:id_client");
$req->execute(array(
    'id_client'=>$_POST['id'],
    'admin'=>$a1
));
var_dump($_POST);
var_dump($req);
//header('Location: index.php');
?>
