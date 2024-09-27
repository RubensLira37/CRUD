<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../static/css/global.css">
    <link rel="stylesheet" href="../../static/css/form.css">
    <link rel="icon" href="../../static/img/php.png" type="image/png">
    <title>Edit</title>
</head>
<body>
    <?php
        require_once "../php/database/db_conection.php";
        require_once "../php/auth/protect.php";
        require_once "../php/auth/save_edit.php";
    ?>
    <main>
        <form action="" method="post" class="form">
            <h2>Form</h2>
            <label for="name"></label>
            <input type="text" name="name" id="name" value="<?=$name?>" autofocus >
            <label for="brand"></label>
            <input type="text" name="brand" id="brand" value="<?=$brand?>" >
            <label for="category"></label>
            <input type="text" name="category" id="category" value="<?=$category?>" >
            <label for="price"></label>
            <input type="text" name="price" id="price" value="<?=$price?>" >
            <input type="submit" value="Send">
        </form>
        <?php 
        if (isset($error)) echo "<p style='color:red'>$error</p>";
        if (isset($edit)) echo "<p style='color:green'>$edit</p>";
        ?>
        <a href="../../../">Back to home.</a>
    </main>
</body>
</html>