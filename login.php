<?php
session_start();
require 'adatbazis.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Validáció és bejelentkezés ellenőrzése
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Bejelentkezés</title>
</head>
<body>
  <h2>Bejelentkezés</h2>
  <form method="POST" action="">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <label>Jelszó:</label><br>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Bejelentkezés">
  </form>
</body>
</html>
