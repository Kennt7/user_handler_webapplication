<?php 
require_once  '../models/database.php';
require_once  '../models/User.php';


  function authenticateUser($email, $password) {
    global $conn;
  try {
  
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if($stmt->rowCount() === 0){
      echo '<p style="color:red;">Nincs ilyen felhasználó az adatbázisban!</p>';
      return null;
    }else{
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }

  } catch (PDOException $e) {
    echo '<p style="color:red;">Hiba történ az adatbázislekérdezés során!!</p>';
  }


  
  
    if ($user && password_verify($password, $user['password'])) {
     
      
      $loggedInUser = new User(
        $user['email'],
        $user['password'],
        $user['name'],
        $user['maritalStatus'],
        $user['birthdate'],
        $user['website']
      );
      session_start();
      $_SESSION['loggedInUser']= $loggedInUser;
      // $age= $loggedInUser->calculateAge();
      // Bejelentkezés sikeres
     echo '<script>alert("Sikeres bejelentkezés");</script>';
      echo '<script>window.location.href="../views/home.php";</script>';
   
      return $loggedInUser;

    } else {
      // Bejelentkezés sikertelen
       echo '<p style="color:red;">Hibás felhasználónév vagy jelszó!</p>';
       return null;
    }
  }
?>