<?php 
require_once '../controllers/login-process.php';
require_once '../models/functions.php';

// Csak akkor folytatjuk a feldolgozást, ha az űrlapot elküldték (save gombra kattintottak)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    // Űrlap adatainak feldolgozása
    $name = $_POST['name'];
    $maritalStatus = $_POST['marital_status'];
    $birthdate = $_POST['birthdate'];
    $website = $_POST['website'];

    // fh-i objektum lekérése a session-ből
    session_start();
    $loggedInUser = $_SESSION['loggedInUser'];
        // Felhasználó adatok mentése az adatbázisba
        saveUserToDatabase($loggedInUser,$name,$maritalStatus,$birthdate,$website); 
  
    }
 else {
    // Ha nem POST kérés érkezett, átirányítás a profile.php oldalra
    echo "Nem POST kérés érkezett!";
    header('Location: ../views/profile.php');
    exit();
}  
?>