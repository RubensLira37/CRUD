<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/static/css/global.css">
    <link rel="stylesheet" href="./assets/static/css/index.css">
    <link rel="icon" href="./assets/static/img/php.png" type="image/png">
    <script defer src="./assets/static/js/index.js"></script>
    <title>Home</title>
</head>
<body>
    <header class="header">
        <nav class="nav-bar">
            <figure class="logo-div"><img src="assets/static/img/php_64.png" alt="logo" class="logo"></figure>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">
                <li><a href="/">Home</a></li>
                <li><a href="assets/src/pages/create.php">Create</a></li>
                <li><a href="assets/src/php/auth/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php
        require_once "assets/src/php/database/db_conection.php";
        require_once "assets/src/php/auth/protect.php";
        require_once "assets/src/php/auth/Products.php";
        $products = new Products($MySQLi);
        $result = $products->select_table();
        ?>
        <h1>Products</h1>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th class="th">ID</th>
                        <th class="th sticky">Name</th>
                        <th class="th">Brand</th>
                        <th class="th">Category</th>
                        <th class="th">Price</th>
                        <th class="th">Created_by</th>
                        <th class="th">Created_at</th>
                        <th class="th">Updated_at</th>
                        <th class="th">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $impa = 1;
                    $color = "";
                    while ($user_data = mysqli_fetch_assoc($result)) {
                        $color = ($impa % 2 == 1) ? "impar" : "par";
                        $impa++;
                        $date_string = $user_data["created_at"];
                        $date = new DateTime($date_string);
                        $formated_created_at = $date->format("H:i:s d/m/Y");
                        $updated_at_string = $user_data["updated_at"];
                        $updated_at = new DateTime($updated_at_string);
                        $formated_updated_at = $updated_at->format("H:i:s d/m/Y");
                        echo "<tr class='$color'>";
                            echo "<td>" . htmlspecialchars($user_data["id"], ENT_QUOTES) . "</td>";
                            echo "<td class='sticky'>" . htmlspecialchars($user_data["name"], ENT_QUOTES) . "</td>";
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
        </div>
    </main>
</body>
</html>