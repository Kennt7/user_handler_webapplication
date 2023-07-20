<?php
require_once '../models/functions.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  authenticateUser($email, $password);
}?>