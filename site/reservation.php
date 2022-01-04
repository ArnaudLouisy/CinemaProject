<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
$req = $bdd -> prepare('INSERT INTO * FROM reservation WHERE moyen_paiment = :moyen_paiment, date_reservation = :date_reservation, heure_reservation = :heure_reservation, ref_client = :reuf_client, ref_salle');
$req->execute(array(
'moyen_paiment' =>$_POST['moyen_paiment'],
'date_reservation' => $_POST['date_reservation'],
'heure_reservation' => $_POST['heure_reservation'],
'ref_salle' => $_POST['ref_salle'],
'ref_client' => $_POST['ref_client'],
));
$res = $req ->fetch();
 ?>
