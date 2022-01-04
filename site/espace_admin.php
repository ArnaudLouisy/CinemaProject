<?php
session_start();
if (!isset($_SESSION['email'])) {
    header ('Location: index.php');
    exit();
    }
    $bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
    if (!$_SESSION['id']=='1') {
        header('location: connexion_ramovie.php');
    }
    ?>

    <html>
    <head>
        <title>Afficher les membres </title>
        <meta charset="utf-8">
        <style>
        table, th, td {
          padding: 10px;
          border: 1px solid black;
          border-collapse: collapse;
        }
        </style>
    </head>
    <body>
      <h3>Liste des membres :</h3>

          <!-- Afficher les membre -->
          <?php
          $bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');

          $req = $bdd->query('SELECT * FROM client');
          $res = $req->fetchall();
          ?>

          <table>
            <tr>
              <?php
              foreach ($res as $value) {
              ?>
              <form action="espace_admin_2.php" method="post">


              <tr>
                <td><?php echo $value['nom']; ?></td>
                <td><?php echo $value['prenom']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><div>
                  <input value="<?php echo $value['id_client'] ?>" id="admin" <?php if ($value['admin']==1) {
                    echo "disabled";
                  } ?> type="radio" name="id">
                  <label for="admin">
                    Membre<?php if ($value['admin']==1) {
                      echo " administrateur";
                    }
                    if ($value['admin']==0) {
                      echo " standard";
                    } ?>
                  </label>
                </div> </td>
                </tr><?php
              }
              ?>

            </tr>
          </table>
          <br>
          <input type="submit" value="AJOUTER ADMINISTRATEUR(S)">
          </form>
             <!--Fin d'afficher tous les membres -->
    </body>
    </html>
