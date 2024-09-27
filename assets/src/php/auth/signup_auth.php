<?php
if (empty($_SESSION)) {
    session_start();
}

require_once "../php/database/db_conection.php";
require_once "../php/auth/Auth.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password != $confirm_password) {
        $error_password = "These fields must be the same.";
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = $_POST["email"];
            $auth = new Auth($MySQLi);

            if ($auth->signup($email, $password)) {
                header("Location: login.php");
                exit();
            } else {
                $error = "Email alread exit";
            }
        } else {
            $error = "Invalid email format.";
        }
    }
}
