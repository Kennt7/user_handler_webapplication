<?php 
// Kijelentkezés feldolgozása
session_start();
if (isset($_GET["logout"])) {
    // Kijelentkezés a session törlésével
    session_destroy();

    // Átirányítás a bejelentkezési oldalra
    header("Location: login.php");
    exit;
}

// home.php

// Ellenőrizze, hogy a felhasználó be van-e jelentkezve, és ha igen, jelenítse meg a nevét
session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    $username = $user->getUsername();
    echo "Üdvözöllek, $username!";

    // Kijelentkezési hivatkozás
    echo '<br><a href="home.php?logout=1">Kijelentkezés</a>';
} else {
    echo "Üdvözöllek, vendég!";
}
?>