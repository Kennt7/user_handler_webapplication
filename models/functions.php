<?php 
require_once  '../models/database.php';
require_once  '../models/User.php';



function saveUserToDatabase($loggedInUser,$name,$maritalStatus,$birthdate,$website){
  global $conn;

  try {
      $sql = "UPDATE users SET name = :name, password = :password, marital_status = :marital_status, birthdate = :birthdate, website = :website WHERE email = :email";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':email',$loggedInUser->email);
      $stmt-> bindParam(':password',$loggedInUser->password);
      $stmt->bindParam(':name', $loggedInUser->$name);
      $stmt->bindParam(':marital_status', $loggedInUser->$maritalStatus);
      $stmt->bindParam(':birthdate', $loggedInUser->$birthdate);
      $stmt->bindParam(':website', $loggedInUser->$website);
     

      $stmt->execute();

      // Sikeres mentés esetén további műveletek, üzenetek stb. lehetnek itt
      // ...

      // Példa: Üzenet a sikeres mentésről
      echo '<p style="color:green;">Adatok sikeresen frissítve az adatbázisban!</p>';
  } catch (PDOException $e) {
      // Hiba esetén hibaüzenet
      echo '<p style="color:red;">Hiba történt az adatok mentésekor az adatbázisba!</p>';
      // Logolhatjuk a hibát vagy további hibakezelést végezhetünk itt
  }
}


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
        $user['marital_status'],
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
  }//authenticateUser fv vége

  
  
?>