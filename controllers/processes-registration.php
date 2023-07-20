<?php
require_once  '../models/functions.php';
session_start();


$regisztracioSikeres=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $marital_status = $_POST['marital_status'];
  $birthdate = $_POST['birthdate'];
  $website = $_POST['website'];
  
  
  
  // Validáció 
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Hibás email formátum!";
  } elseif (strlen($password) < 4 || !preg_match("/[a-zA-Z]/", $password) || !preg_match("/[0-9]/", $password)) {
    echo "A jelszónak legalább 4 karakter hosszúnak kell lennie, és tartalmaznia kell legalább egy betűt és egy számjegyet!";
  } else {
    
    try{
      //Password hash
      $hashedPassword = password_hash($password,PASSWORD_DEFAULT);

      // Prepared Statement létrehozása és végrehajtása
      $stmt = $conn->prepare("INSERT INTO users (email, password, name, marital_status, birthdate, website) VALUES (:email, :password, :name, :marital_status, :birthdate, :website)");
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':password', $hashedPassword);
      $stmt->bindValue(':name', $name);
      $stmt->bindValue(':marital_status', $marital_status);
      $stmt->bindValue(':birthdate', $birthdate);
      $stmt->bindValue(':website', $website);
      $stmt->execute();
      $regisztracioSikeres = true;
    }catch(PDOException $e){
      echo "Hiba történt a regisztrációban!".$e->getMessage();
    }   
  }
  // User objektum létrehozása
$user = new User($email, $password, $name, $marital_status, $birthdate, $website);

if($regisztracioSikeres){
  echo "<script>alert('A felhasználó sikeresen regisztrált!');</script>";
  echo "<script>
  setTimeout(function(){
    window.location.href='../public/login.php';
  }, 3000);</script>";
}
}


$conn=null;
?>