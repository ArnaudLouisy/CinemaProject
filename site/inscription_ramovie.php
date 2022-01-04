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
    header('Refresh: 10; Location=register.html');
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
