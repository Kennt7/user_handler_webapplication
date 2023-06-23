<?php
session_start();
require 'adatbazis.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $maritalStatus = $_POST['marital_status'];
  $birthdate = $_POST['birthdate'];
  $website = $_POST['website'];


  
    // Validáció és adatbázisba történő mentés
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Hibás email formátum!";
    } elseif (strlen($password) < 4 || !preg_match("/[a-zA-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
      echo "A jelszónak legalább 4 karakter hosszúnak kell lennie, és tartalmaznia kell legalább egy betűt és egy számjegyet!";
    } else {
      // Adatbázisba mentés
      // ...
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Regisztráció</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/registration.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container">
  <h2>Regisztráció</h2>
  <form method="POST" action="">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <label>Jelszó:</label><br>
    <input type="password" name="password" minlength="4" required><br><br>
    <label>Név:</label><br>
    <input type="text" name="name" required><br><br>
    <label>Családi állapot:</label><br>
    <select name="marital_status" required>
      <option value="single">Egyedülálló</option>
      <option value="married">Házas</option>
      <option value="divorced">Elvált</option>
    </select><br><br>
    <label>Születési idő:</label><br>
    <input type="date" name="birthdate"><br><br>
    <label>Weboldal:</label><br>
    <input type="text" name="website"><br><br>
    <input type="submit" value="Regisztráció">
  </form>
  </div>
</body>
</html>
