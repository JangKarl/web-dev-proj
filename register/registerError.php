<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="register.php" method="post">
        <label for="firstname">First Name: </label>
        <input type="text" name="firstname" id="firstname" required>
        
        <label for="lastname">Last Name: </label>
        <input type="text" name="lastname" id="lastname" required>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required>

        <label for="address">Address: </label>
        <input type="text" name="address" id="address" required>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required>

        <label for="confirm">Confirm Password: </label> 
        <input type="password" name="confirm" id="confirm" required>

        <p>Password incorrect</p>

        <div>
            <label for="male"><input type="radio" name="gender" value="m" id="male">Male</label>
            <label for="female"><input type="radio" name="gender" value="f" id="female">Female</label>
            <label for="nts"><input type="radio" name="gender" value="nts" id="nts">Prefer not to say</label>
        </div>

        <p>Have an account already? <a href="login.php">Log in</a></p>

        <button type="submit">Register</button>

    </form>
</body>
</html>