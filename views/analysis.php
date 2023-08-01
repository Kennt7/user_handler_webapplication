<?php
session_start();
require '../models/database.php';
require_once("../controllers/process_url.php");

// Bejelentkezés ellenőrzése

?>

<!DOCTYPE html>
<html>
<head>
  <title>Elemzés</title>
  <script src="../controllers/urlList.js" ></script>
</head>
<body>
  <h2>Elemzés</h2>
  <h1>URL szólistázó</h1>
  <label for="urlInput">Adjon meg egy URL-t:</label>
  <input type="text" id="urlInput" placeholder="https://example.com" />
  <button id="listButton" onclick="listWords()">Listázás</button>
  <div id="loadingSpinner" style="display: none;">Feldolgozás folyamatban...</div>
  <div id="wordList"></div>
</body>
</html>
