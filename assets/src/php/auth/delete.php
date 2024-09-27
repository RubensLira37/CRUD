<?php
session_start();

if (isset($_GET['id'])) {
    require_once "../database/db_conection.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $MySQLi->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $query = "DELETE FROM products WHERE id = ?";
        $stmt = $MySQLi->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    header("Location: ../../../../");
    exit();
} else {
    header("Location: ../../../../");
    exit();
}
