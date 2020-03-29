<?php

require 'config/config.php' ;
require 'includes/form_handlers/register_handler.php' ;
require 'includes/form_handlers/login_handler.php' ;


?>


<html>
<head>
    <title>
        NON-COMPLICATED WEBSITE :D
    </title>
    <link rel="stylesheet" href="assets/css/register_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>

<?php
    if (isset($_POST['register_button'])) {
        echo'
            <script>
            
            $(document).ready(function() {
              $("#first").hide();
              $("#second").show();
            });
            
            </script>
        ' ;

    }

?>

    <div class="wrapper">
        <div class="login_box">
            <div class="login_header">
                <h1>WELCOME SUPERHERO!</h1>
                Login or Sign up below!<br>
            </div>

            <div id="first">
                <form action="register.php" method="post">
                    <br><input type="text" name="login_email" placeholder="Email Address" value="<?php

                    if(isset($_SESSION['login_email'])) {
                        echo $_SESSION['login_email'] ;
                    }
                    ?>" required>
                    <input type="password" name="login_password" placeholder="Password" required><br>
                    <?php if(in_array("Invalid Email or Incorrect password<br>",$error_array)) echo"Invalid Email or Incorrect password<br>";  ?>

                    <input type="submit" name="login_button" value="Login">
                    <br>
                    <a href="#" id="signup" class="signup">Need an account? Register here!</a>

                </form>

            </div>

            <div id="second">
                <form action="register.php" method="post">
                    <input type="text" name="reg_fname" placeholder="First Name" value="<?php

                    if(isset($_SESSION['reg_fname'])) {
                        echo $_SESSION['reg_fname'] ;
                    }
                    ?>" required><br>
                    <?php if(in_array("your first name must be between 2 and 25 characters<br>",$error_array)) echo "Your first name must be between 2 and 25 characters<br>";?>

                    <input type="text" name="reg_lname" placeholder="Last Name" value="<?php

                    if(isset($_SESSION['reg_lname'])) {
                        echo $_SESSION['reg_lname'] ;
                    }
                    ?>" required><br>

                    <?php if(in_array("your last name must be between 2 and 25 characters<br>",$error_array)) echo "your last name must be between 2 and 25 characters<br>" ;?>

                    <input type="email" name="reg_email" placeholder="Email" value="<?php
                    if(isset($_SESSION['reg_email'])) {
                        echo $_SESSION['reg_email'] ;
                    }
                    ?>" required><br>

                    <?php if(in_array("Email is already exists<br>",$error_array)) echo "Email is already exists<br>" ;

                    else if(in_array("Invalid Format<br>",$error_array)) echo "Invalid Format<br>"; ?>
                    <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
                    if(isset($_SESSION['reg_email2'])) {
                        echo $_SESSION['reg_email2'] ;
                    }
                    ?>" required><br>

                    <?php if(in_array("Emails doesn't match<br>",$error_array)) echo "Emails doesn't match<br>"; ?>

                    <input type="password" name="reg_password" placeholder="Password" required><br>
                    <?php if(in_array("Your password must be between 5 and 30 characters<br>",$error_array)) echo "Your password must be between 5 and 30 characters<br>"; ?>

                    <input type="password" name="reg_password2" placeholder="Confirm Password" required><br>

                    <?php if(in_array("Password doesn't match<br>",$error_array)) echo "Password doesn't match<br>" ;  ?>

                    <input type="submit" name="register_button" value="Register">
                    <br>
                    <?php if(in_array("<span color = rgb(0,255,0)> You are all set! Go ahead and Log in!</span><br>",$error_array)) echo "<span color = rgb(0,255,0)> You are all set! Go ahead and Log in!</span><br>" ; ?>
                    <a href="#" id="signin" class="signin">Already have an account? Click here to Log in!</a>

                </form>
            </div>


        </div>
    </div>

</body>
</html>