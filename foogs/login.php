  
<?php include("partials/html-head(logincss).php") ?>

    <title>Fresh & Organic Online Grocery Store | Login</title>
</head>
<body>

  <?php include("partials/navigation.php") ?>
    <!-- Login Container-->
    <div class="lg_container">
        <h1>Login</h1>
        <form action="login-function/validation.php" method="post">
            <div class="txtfield">
                <input type="text" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txtfield">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="fpass">Forgot Password?</div>
            <input type="submit" value="Login">
            <div class="signup_link">
                Not a member? <a href="#" onclick="regopenmodal();">Sign up</a>
            </div>
        </form>
    </div>
    <!-- Register Containter -->
    <div id="mainpopup" class="mainpopup">
        <div class="regpopup">
            <div class="reg_container">
                <span class="reg_closebtn">&times;</span>
                <div class="title">
                    <h1>Sign Up!</h1>
                    <p>Please fill in the form</p>
                </div>
                <div class="reg_content">
                    <form action="login-function/register.php" method="post">
                        <div class="userinfo">
                            <div class="inputbox">
                              <span class="info">First Name</span>
                              <input type="text" name="first_name" placeholder="Enter your First name" required>
                            </div>
                            <div class="inputbox">
                              <span class="info">Last Name</span>
                              <input type="text" name="last_name" placeholder="Enter your Last name" required>
                            </div>
                            <div class="inputbox">
                              <span class="info">Email</span>
                              <input type="text" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="inputbox">
                              <span class="info">Address</span>
                              <input type="text" name="bill_address" placeholder="Enter your Address" required>
                            </div>
                            <div class="inputbox">
                              <span class="info">Password</span>
                              <input type="password" name="password"  placeholder="Enter your password" required>
                            </div>
                            <div class="inputbox">
                              <span class="info">Confirm Password</span>
                              <input type="password" name="confirm_password" placeholder="Confirm your password" required>
                            </div>
                          </div>
                          <div class="genderinfo">
                            <input type="radio" name="gender" value="m" id="dot-1">
                            <input type="radio" name="gender" value="f" id="dot-2">
                            <input type="radio" name="gender" value="oth" id="dot-3">
                            <span class="gendertitle">Gender</span>
                            <div class="category">
                              <label for="dot-1">
                              <span class="dot one"></span>
                              <span class="gender">Male</span>
                            </label>
                            <label for="dot-2">
                              <span class="dot two"></span>
                              <span class="gender">Female</span>
                            </label>
                            <label for="dot-3">
                              <span class="dot three"></span>
                              <span class="gender">Prefer not to say</span>
                              </label>
                            </div>
                          </div>
                          <div class="button">
                            <input type="submit" value="Register">
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var mainpopup = document.getElementById('mainpopup');
        var reg_closebtn = document.getElementsByClassName('reg_closebtn')[0];
        reg_closebtn.addEventListener('click', regclosemodal);
        function regopenmodal(){mainpopup.style.display = 'block';}
        function regclosemodal(){mainpopup.style.display = 'none';}
    </script>

</body>
</html>
