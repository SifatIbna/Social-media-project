<?php



    if(isset($_POST['login_button'])) {

        $email = filter_var($_POST['login_email'],FILTER_SANITIZE_EMAIL); // sanitize email

        $_SESSION['login_email'] = $email; // store email in session variable
        $password = md5($_POST['login_password']);

        $check_database_query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email' AND password = '$password' ");

        $check_login_query = mysqli_num_rows($check_database_query);

        if($check_login_query == 1) {

            $user_closed_query = mysqli_query($con,"SELECT * FROM users where email = '$email' AND user_closed = 'yes'");
            if(mysqli_num_rows($user_closed_query) == 1){
                $reopen_account = mysqli_query($con,"UPDATE users SET user_closed = 'no' where email = '$email'");
            }

            $row = mysqli_fetch_array($check_database_query);
            $username = $row['username'];
            $_SESSION['username'] = $username ;
            header("Location:index.php");
            exit();
        }

        else {
            array_push($error_array,"Invalid Email or Incorrect password<br>");
        }


    }

?>
