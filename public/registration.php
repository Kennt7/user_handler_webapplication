<!DOCTYPE html>
<html>
    <head>
        <title>Regisztráció</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/registration.css">
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h2>Regisztráció</h2>
            <form method="POST" action="../controllers/processes-registration.php">
                <label>Email:</label><br>
                <input type="email" name="email" required="required"><br><br>
                <label>Jelszó:</label><br>
                <input type="password" name="password" minlength="4" required="required"><br><br>
                <label>Név:</label><br>
                <input type="text" name="name" required="required"><br><br>
                <label>Családi állapot:</label><br>
                <select name="marital_status" required="required">
                    <option value="single">Egyedülálló</option>
                    <option value="married">Házas</option>
                    <option value="divorced">Elvált</option>
                </select><br><br>
                <label>Születési idő:</label><br>
                <input type="date" name="birthdate"><br><br>
                <label>Weboldal:</label><br>
                <input type="text" name="website"><br><br>
                <input type="submit" value="Regisztráció">
            </form>
        </div>
    </body>
</html>