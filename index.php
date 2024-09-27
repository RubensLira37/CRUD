<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/static/css/global.css">
    <link rel="stylesheet" href="./assets/static/css/index.css">
    <link rel="icon" href="assets/static/img/php.png" type="image/png">
    <title>Home</title>
</head>
<body>
    <header class="header">
        <figure class="logoHeader"><img src="assets/static/img/php_64.png" alt="logo" class="logo"></figure>
        <h1>Home</h1>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="assets/src/pages/create.php">Create Products</a></li>
            <li><a href="assets/src/php/auth/logout.php">Logout</a></li>
        </ul>
    </header>
    <main>
        <?php
        require_once "assets/src/php/database/db_conection.php";
        require_once "assets/src/php/auth/protect.php";
        require_once "assets/src/php/auth/Products.php";
        $products = new Products($MySQLi);
        $result = $products->select_table();
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Created_by</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result)) {
                    $date_string = $user_data["created_at"];
                    $date = new DateTime($date_string);
                    $formated_created_at = $date->format("H:i:s d/m/Y");

                    $updated_at_string = $user_data["updated_at"];
                    $updated_at = new DateTime($updated_at_string);
                    $formated_updated_at = $updated_at->format("H:i:s d/m/Y");

                    echo "<tr>";
                        echo "<td>" . htmlspecialchars($user_data["id"], ENT_QUOTES) . "</td>";
                        echo "<td>" . htmlspecialchars($user_data["name"], ENT_QUOTES) . "</td>";
                        echo "<td>" . htmlspecialchars($user_data["brand"], ENT_QUOTES) . "</td>";
                        echo "<td>" . htmlspecialchars($user_data["category"],ENT_QUOTES) . "</td>";
                        echo "<td>" . htmlspecialchars($user_data["price"], ENT_QUOTES) . "</td>";
                        echo "<td>" . htmlspecialchars($user_data["created_by"], ENT_QUOTES) . "</td>";
                        echo "<td> $formated_created_at </td>";
                        echo "<td> $formated_updated_at </td>";
                        echo "<td>";
                            echo "<a href='assets/src/pages/edit_products.php?id=$user_data[id]&name=$user_data[name]'><img src='assets/static/img/pencil.png' alt='pecil'></a>";
                            echo "<a href='assets/src/php/auth/delete.php?id=$user_data[id]'><img src='assets/static/img/exclued.png' alt='pecil'></a>"; 
                        echo "</td>";  
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>