<?php
session_start();

if (empty($_SESSION["id"])) {
    $redirectUrl = ($_SERVER["REQUEST_URI"] === "/CRUD/") ? "assets/src/pages/login.php" : "login.php";
    header("Location: $redirectUrl");
    exit();
}
