<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usersdb";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    marital_status ENUM('single', 'married', 'divorced') NOT NULL,
    birthdate DATE,
    website VARCHAR(255)
  )";
  $conn->exec($sql);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
