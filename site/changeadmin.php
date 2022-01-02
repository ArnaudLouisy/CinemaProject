<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
if (isset($_GET['id']) AND  !empty($_GET['if'])){
    $getid = $_GET['id'];
    $recupUser = $bdd ->prepare('SELECT * FROM client WHERE id =?');
    $recupUser->execute(array($getid))
    if (recupUser->rowCount() > 0) {

        $changeadmin = $bdd->prepare('')
      
    }else {
      echo "Aucun membres trouvé";
    }
}else {
  echo "l'id n'a pas ete recupere ";
}
?>
