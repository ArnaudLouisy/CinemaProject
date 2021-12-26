<?php

session_start();
$mail = $_SESSION['email'];
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
$req = $bdd -> prepare("UPDATE client SET nom=:nom, prenom=:prenom, email=:email, mot_de_passe=:mot_de_passe WHERE id_client=:id_client");
$req->execute(array(
    'prenom'=>$_POST['prenom'],
    'nom'=>$_POST['nom'],
    'email'=>$_POST['email'],
    'mot_de_passe'=>$_POST['mot_de_passe'],
    'id_client'=>$_SESSION['id'],
));
header('Location: index.php');
?>
