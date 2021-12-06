<?php

$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');


$req=$bdd->prepare('SELECT * FROM client WHERE email = :email');
$req->execute(array(
    'email'=>$_POST['email']

));

$res = $req->fetch();

if($res){
    echo 'compte existant';
}
else {

    $requete = $bdd->prepare('INSERT INTO client (nom, prenom,mot_de_passe,email,) VALUES (:nom, :prenom,:mot_de_passe,:email)');
    $requete->execure(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'mot_de_passe' => $_POST['mot_de_passe'],
        'email' => $_POST['email'],

    ));
}

 ?>
