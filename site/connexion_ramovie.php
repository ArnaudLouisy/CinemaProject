<?php
session_start();
var_dump();

$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');

$req = $bdd->prepare('SELECT * FROM client WHERE email = :email AND mot_de_passe = :mot_de_passe');
$req->execute(array(
    'email'=>$_POST['email'],
    'mot_de_passe'=>$_POST['mot_de_passe']
));

$res = $req->fetch();

if($res){
    $_SESSION['email'] = $res['email'];

    header('Location: accueil_c.html');
}
else{
    header('Location: login.html');
}

?>
