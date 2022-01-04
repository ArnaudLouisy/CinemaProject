<?php
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
$req = $bdd -> prepare('SELECT * FROM salle_de_cinema');
$req->execute(array(


));
$res=$req -> fetchAll();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<h3>Reservation  : </h3>
<form action="reservation.php" method="post">
    <p>Numéro de la salle :</p>
    <select name="ref_salle" id="ref_salle">
        <?php foreach ($res as $value) {
        ?>
        <option value="<?php echo $value['id_salle']?>"> <?php echo $value['nom_salle'];  ?> </option>

    <?php
    }
    ?>
    </select>
    <br>
    <br>
    <p>Date de Reservation</p>
    <input type="date" name="date_reservation" placeholder="veuillez reservez la date de votre sceance">
    <p> Heure de la reservation : </p>
    <select name="heure_reservation" id="heure_reservation">
        <option value="8h"> 8h</option>
        <option value="10h"> 10h</option>
        <option value="10h30"> 10h30</option>
        <option value="11h"> 11h</option>
        <option value="12h"> 12h</option>
        <option value="13h"> 13h</option>
        <option value="15h30"> 15h30</option>
        <option value="16h40"> 16h40</option>
        <option value="20h"> 20h</option>
        <option value="21h"> 21h</option>
        <option value="22h"> 22h</option>
    </select><br>
    <p>Moyen de paiment</p>
    <select name="moyen_paiment" id="moyen_paiment">
    <option value="Paypal"> Paypal </option>
     <option value="Carte de credit"> Carte de credit</option>
     <option value="Pass Culture"> Pass Culture</option>
     <option value="Ticket de reduction"> Ticket de reduction</option>
    </select>
    <br>
<input type="submit" name="Reserver" value="Reserver">


</form>
</body>
</html>