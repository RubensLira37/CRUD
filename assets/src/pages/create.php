<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../static/css/global.css">
    <link rel="stylesheet" href="../../static/css/form.css">
    <link rel="icon" href="../../static/img/php.png" type="image/png">
    <title>Create Products</title>
</head>
<body>
    <?php
        require_once "../php/database/db_conection.php";
        require_once "../php/auth/protect.php";
        require_once "../php/auth/confirm_create.php";
    ?>
    <main>
        <form action="" method="post" class="form">
            <h2>Form</h2>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" autofocus required>
            <label for="brand">Brand</label>
            <input type="text" name="brand" id="brand" required>
            <label for="category">Category</label>
            <input type="text" name="category" id="category" required>
            <label for="price">Price</label>
            <input type="text" name="price" id="price" required>
            <input type="submit" value="Send">
        </form>
        <a href="../../../">Back to home</a>
        <?php
            if (isset($error)) echo "<p style='color:red'>$error</p>";
            if (isset($created)) echo "<p style='color:blue'>$created</p>";
        ?>
    </main>
</body>
</html>