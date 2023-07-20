<?php
session_start();
require '../models/functions.php';


// Bejelentkezés ellenőrzése
/* if (!isset($_SESSION['user'])) {
  header("Location: public/login.php");
  exit;
} */

// Felhasználó adatok betöltése és módosítása
$user = $_SESSION['user'];
$name = $_POST['name'];
$maritalStatus = $_POST['marital_status'];
$birthdate = $_POST['birthdate'];
$website = $_POST['website'];

  // Adatbázisba történő frissítés
  // ...

  // User objektum frissítése
  $user->setName($name);
  $user->setMaritalStatus($maritalStatus);
  $user->setBirthdate($birthdate);
  $user->setWebsite($website);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Profil</title>
</head>
<body>
  <h2>Profil</h2>
  <!-- Felhasználó adatainak megjelenítése és szerkesztése -->
</body>
</html>
