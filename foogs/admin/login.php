<?php
    include('../config/constant.php');
?>

<html>
    <head>
        <title>FOOGS | Login</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        
        <div class="login">
            <h1>Login</h1>

            <br>
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br>
            <!--Login Form-->
            <form action="" method="POST">
                <p>Email:</p>
                <input type="email" name="email" placeholder="Enter email"> <br>
                <p>Password:</p>
                <input type="password" name="password" placeholder="Enter password"> <br> <br>

                <input type="submit" name="submit" value="Login" class="login-btn">
            </form>
        </div>
        
    </div>
        
<?php include('partials/footer.php')?>
    </body>
</html>

<?php 
    //Check for login button
    if(isset($_POST['submit'])){
        //Process for login
        //Get the data from form
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        //Query if data match from database
        $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";

        //Execute query
        $result = mysqli_query($conn, $sql);

        //Count row to check if exist
        $count = mysqli_num_rows($result);

        if($count==1){
            //User available and login success
            $_SESSION['login'] = '<div class="success"> Login Successful. </div>';
            $_SESSION['user'] = $email; //Check if user has account




            //Redirect to index.php
            header("location:index.php");

        }else{
            //User not available
            $_SESSION['login'] = '<div class="failed"> Login Failed. </div>';
            //Redirect to index.php
            header("location:login.php");

        }



    }
?>