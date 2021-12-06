<?php
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['mot_de_passe'])) {
  header('Location: index.html');
}
else {
    header('Location: index2.html');
}
 ?>
