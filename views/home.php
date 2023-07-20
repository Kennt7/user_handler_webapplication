<?php
require_once("../controllers/login-process.php");
 session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <title>Bejelentkezés</title>
  <?php include '..\views\header.php';?>
</head>
<body>
<div class="container mt-3">
<h1><?php print "Üdvözöllek,'.$loggedInUser->getName().'.'$loggedInUser->calculateAge()' az oldalon!<br />\n "?></h1>

<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link" href="profile.php">Profil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="analysis.php">Elemzés</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="chat.php">Chat</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="../public/logout.php">Kijelentkezés</a>
  </li>
</ul>
  

</div>
</body>
</html>