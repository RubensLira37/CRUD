<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../static/css/global.css">
    <link rel="stylesheet" href="../../static/css/form.css">
    <link rel="icon" href="../../static/img/php.png" type="image/png">
    <title>Login</title>
</head>
<body>
    <?php 
        require_once "../php/database/db_conection.php";
        require_once "../php/auth/login_auth.php";
    ?>
    <main>
        <form action="" method="post" class="form">
            <h2>Login in</h2>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" autofocus required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Enter">
        </form>
        <?php if (isset($error)) echo "<p style='color:red'>$error</p>";?>
        <p>Don't have a registration? <a href="signup.php">Register here</a></p>
    </main>
</body>
</html>