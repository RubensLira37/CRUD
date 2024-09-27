<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../static/css/global.css">
    <link rel="stylesheet" href="../../static/css/form.css">
    <link rel="icon" href="../../static/img/php.png" type="image/png">
    <title>Sign up</title>
</head>
<body>
    <?php 
        require_once "../php/database/db_conection.php";
        require_once "../php/auth/signup_auth.php"
    ?>
    <form action="" method="post" class="form">
        <h2>Sign up</h2>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" autofocus required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <?php if (isset($error_password)) echo "<span style='color:red'>$error_password</span>"?>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" id="password" required>
        <?php if (isset($error_password)) echo "<span style='color:red'>$error_password</span>"?>
        <input type="submit" value="Send">
    </form>
    <p>Have a registration? <a href="login.php">Login here</a></p>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"?>
</body>
</html>