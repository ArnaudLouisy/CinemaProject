// à faire<?php


$sql = "UPDATE users SET name=?, prenom=?, mot_de_passe=? WHERE email=?";
$req= $pdo->prepare($sql);
$req->execute([$name, $prenom, $mot_de_passe, $email]);



 ?>
