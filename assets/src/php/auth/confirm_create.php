<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["name"] && $_POST["category"] && $_POST["brand"] && $_POST["price"])) { 
        require_once "../php/database/db_conection.php";
        require_once "../php/auth/Products.php";

        $name = htmlspecialchars($_POST["name"], ENT_QUOTES);
        $category = htmlspecialchars($_POST["category"], ENT_QUOTES);
        $brand = htmlspecialchars($_POST["brand"], ENT_QUOTES);
        $price = htmlspecialchars($_POST["price"], ENT_QUOTES);
        $created_by = $_SESSION["email"];

        $products = new Products($MySQLi);
        if ($products->insert_into(
            $name,
            $brand,
            $category,
            $price,
            $created_by
        )) {
            $created = "Product created sucessfully.";
        } else {
            $error = "Produc alread exist.";
        }
    } else {
        $error = "Fill in all fields.";
    }
}
