<?php
session_start();

if (empty($_SESSION["id"])) {
    $redirectUrl = ($_SERVER["REQUEST_URI"] === "/Teste/") ? "assets/src/pages/login.php" : "login.php";
    header("Location: $redirectUrl");
    exit();
}
