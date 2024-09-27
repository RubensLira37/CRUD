<?php
if (empty($_SESSION)) {
    session_start();
}

if (isset($_GET['id'])) {
    require_once "../php/database/db_conection.php";
    require_once "../php/auth/Products.php";

    $id = $_GET["id"];
    $products = new Products($MySQLi);
    $result = $products->select_id($id);

    if ($result->num_rows > 0) {
        while ($user_data = $result->fetch_assoc()) {
            $name = $user_data["name"];
            $brand = $user_data["brand"];
            $category = $user_data["category"];
            $price = $user_data["price"];
        }
    }
} else {
    header("Location: ../../../");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["name"] && $_POST["category"] && $_POST["brand"] && $_POST["price"])) { 
        $name = $_POST["name"];
        $brand = $_POST["brand"];
        $category = $_POST["category"];
        $created_by = $_SESSION["email"];
        $price = $_POST["price"];

        if ($name != $_GET["name"]) {
            $result = $products->select_name($name);
            switch (true) {
                case ($result->num_rows == 0):
                    if ($products->update(
                        $id,
                        $name,
                        $brand,
                        $category,
                        $price,
                        $created_by
                    )) {
                        $edit = "Product edited sucessfully";
                    } else {
                        $error = "Editing failed";
                    }
                    break;

                default:
                    $error = "Name alread exist";
            }
        } else {
            if ($products->update(
                $id,
                $name,
                $brand,
                $category,
                $price,
                $created_by
            )) {
                $edit = "Product edited sucessfully";
            }
        }
    } else {
        $error = "Fill in all fields.";
    }
}
