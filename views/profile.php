<?php
require_once '../controllers/login-process.php';
require_once '../models/functions.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Profil</title>
  <?php include '../views/header.php'?>
  <link rel="stylesheet" type="text/css" href="../css/profile.css">
</head>
<body>
<div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h2>Profil</h2>
      </div>
      <div class="card-body">
        <?php if ($loggedInUser) : ?>
          <p><strong>Email:</strong> <?php echo $loggedInUser->getEmail(); ?></p>
          <p><strong>Jelszó:</strong> <?php echo $loggedInUser->getPassword(); ?></p>
          <p><strong>Név:</strong> <?php echo $loggedInUser->getName(); ?></p>
          <p><strong>Életkor:</strong> <?php echo $loggedInUser->calculateAge(); ?></p>
          <p><strong>Családi állapot:</strong> <?php echo $loggedInUser->getmaritalStatus(); ?></p>
          <p><strong>Születési dátum:</strong> <?php echo $loggedInUser->getBirthdate(); ?></p>
          <p><strong>Weboldal:</strong> <?php echo $loggedInUser->getWebsite(); ?></p>

          <form method="post" action="../controllers/update-profile.php">

          <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $loggedInUser->getEmail(); ?>"><br>
            <label for="password">Jelszó:</label>
            <input type="text" name="password" value="<?php echo $loggedInUser->getPassword(); ?>"><br>

            <label for="name">Név:</label>
            <input type="text" name="name" value="<?php echo $loggedInUser->getName(); ?>"><br>

            <label for="marital_status">Családi állapot:</label>
           <select name="marital_status">
            <option value="single"><?php if ($loggedInUser->getmaritalStatus() === 'single') echo 'selected'; ?>Single</option>
            <option value="married"><?php if ($loggedInUser->getmaritalStatus() === 'married') echo 'selected'; ?>Married</option>
            <option value="divorced"><?php if ($loggedInUser->getmaritalStatus() === 'divorced') echo 'selected'; ?>Divorced</option>
           </select>
           <br>

            <label for="birthdate">Születési dátum:</label>
            <input type="date" name="birthdate" value="<?php echo $loggedInUser->getBirthdate(); ?>"><br>

            <label for="website">Weboldal:</label>
            <input type="text" name="website" value="<?php echo $loggedInUser->getWebsite(); ?>"><br>

          
            <input type="submit" name="save" value="Mentés">
          </form>
        <?php else : ?>
          <p>A profil nem érhető el. Kérlek, jelentkezz be.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>

</body>
</html>
