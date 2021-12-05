<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=user;charset=utf8', 'root', '');

$req = $bdd->prepare('SELECT * FROM user WHERE email = :email AND mot_de_passe = :mot_de_passe');
$req->execute(array(
    'email'=>$_POST['email'],
    'mot_de_passe'=>$_POST['mot_de_passe']
));

$res = $req->fetchall();

if($res){
    $_SESSION['email'] = $res['email'];
    $_SESSION['mot_de_passe'] = $res['mot_de_passe'];
    header('Location: espace_membre_ramovie.php');
}
else{
    header('Location: 1.html');
}
>
