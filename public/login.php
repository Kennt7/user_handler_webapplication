

<!DOCTYPE html>
<html>
<head>
  <title>Bejelentkezés</title>
</head>
<body>
  <h2>Bejelentkezés</h2>
  <form method="POST" action="..\controllers\signin-process.php">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <label>Jelszó:</label><br>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Bejelentkezés">
  </form>
</body>
</html>
