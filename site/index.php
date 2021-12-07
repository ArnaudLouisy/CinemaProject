<?php
session_start();
if (isset($_SESSION['email'])){
  header('Location: accueil_c.html');
}else {header('Location: accueil_nc.html');}
 ?>
