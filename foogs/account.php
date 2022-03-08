<?php include("partials/html-head.php") ?>

    <title>Fresh & Organic Online Grocery Store | Account</title>
    
</head>
<body>
<?php include("partials/navigation.php") ?>

    <?php 
        $user_email = $_SESSION['email'];
        $sql = "SELECT * FROM user WHERE email = '$user_email'";

        $result = mysqli_query($conn, $sql);

        if($result == TRUE){
            $count = mysqli_num_rows($result);

            if($count > 0){
                while($rows = mysqli_fetch_assoc($result)){
                    $id = $rows['user_id'];
                    $first_name = $rows['first_name'];
                    $last_name = $rows['last_name'];
                    $email = $rows['email'];
                    $address = $rows['bill_address'];

                    ?>
                    <div class="account-container">
                        <div class="column first-con">
                        <h1>Hello <?php echo $first_name?></h1><br>
                        <p><?php 
                        if(isset($_SESSION['update'])){
                            echo $_SESSION['update'];//Displaying session message
                            unset($_SESSION['update']);//Removing session message
                        }
                        if(isset($_SESSION['user-not-found'])){
                            echo $_SESSION['user-not-found']; //Displaying session message
                            unset($_SESSION['user-not-found']);//Removing session message
                        }
                        if(isset($_SESSION['pwd-not-match'])){
                            echo $_SESSION['pwd-not-match']; //Displaying session message
                            unset($_SESSION['pwd-not-match']);//Removing session message
                        }
                        if(isset($_SESSION['change-pwd'])){
                            echo $_SESSION['change-pwd']; //Displaying session message
                            unset($_SESSION['change-pwd']);//Removing session message                
                        }  
                        ?></p>
                        </div>
                        <div class="column second-con">
                        <h3>Account Information</h3>
                        <div class="line"></div>
                        <strong>First Name:</strong><p><?php echo $first_name?></p>
                        <strong>Last Name:</strong><p><?php echo $last_name?></p>
                        <strong>Email:</strong><p><?php echo $email?></p>
                        <strong>Address:</strong><p><?php echo $address?></p><br><br>
                        <a href="update-user-password.php?id=<?php echo$id;?>" class="secondary-btn-change">Password</a>
                        <a href="update-user.php?id=<?php echo$id;?>" class="secondary-btn-update">Update</a>

                        </div>
                    </div>
                    

                    <?php
                }
            }else{

            }
        }
    ?>

    



<?php include("partials/footer.php") ?>

</body>
</html>