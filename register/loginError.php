<!DOCTYPE html>
<?php 
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="validation.php" method="post">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username" required>

        
        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required>

        <p>Credentials are incorrect!!</p>

        <p>Don't have an account yet? <a href="registration.php">Register</a></p>

        <button type="submit">Login</button>

    </form>
</body>
</html>