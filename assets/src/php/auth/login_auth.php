<?php
if (empty($_SESSION)) {
    session_start();
}

require_once "../php/database/db_conection.php";
require_once "../php/auth/Auth.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $auth = new Auth($MySQLi);
        if ($auth->login($email, $password)) {
            header("Location: ../../../");
            exit();
        } else {
            $error = "Incorrect username or password.";
        }
    } else {
        $error = "Invalid email format.";
    }
}
