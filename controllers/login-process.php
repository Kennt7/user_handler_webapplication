<?php
require_once "../models/functions.php";

session_start();

// Ellenőrizzük, hogy létezik-e a loggedInUser objektum a SESSION-be
if (isset($_SESSION['loggedInUser'])) {
  // Elérjük a loggedInUser objektumot a SESSION-ből
  $loggedInUser = $_SESSION['loggedInUser'];

  // Fh nevének kiiratása
  echo 'Üdvözöllek, ' . $loggedInUser->getName().  '!';

  
  session_write_close();
} else {
 echo "Hiba a bejelentkezés során!";
  header('Location: ../views/login.php');
  exit();
}


?>