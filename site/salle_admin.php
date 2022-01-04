<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>Ajout de salle :  </h3>
    <ul>
      <li>
        <form  action="salle_admin_2.php" method="post">
          <input type="number" min="1" name="nom_salle" placeholder="Numéro de la salle" >
          <input type="number" min="20" name="nombre_places" placeholder="Nombre de places" >

          <select name="type_salle" id="salle-select">
        <option value="4DX">Salle 4DX</option>
        <option value="Standard">Salle Standard</option>
        <option value="Ice">Salle Ice</option>
        <option value="Maxi">Salle Maxi-confort</option>
        <option value="IMax">Salle IMax</option>
          </select>
    <select name="ref_film" id="ref_film">
      <?php foreach ($res as $value) {
        ?>
        <option value="<?php 'SELECT id_salle FROM salle_de_cinema WHERE '  ?>"> <?php echo $nom_salle; ?></option>
        <?php
      } ?>

    </select>
    <input type="submit" value="Enregistrer">
        </form>
      </li>
    </ul>
  </body>
</html>
