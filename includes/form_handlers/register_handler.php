<?php

//Declaring variables to prevent errors
$fname = ""; //First name
$lname = ""; //Last name
$em = ""; //email
$em2 = ""; //email 2
$password = ""; //password
$password2 = ""; //password 2
$date = ""; //Sign up date
$error_array = array(); //Holds error messages

if(isset($_POST['register_button']))
{

    //registration form values

    //first name

    $fname = strip_tags($_POST['reg_fname']); // removing html tags
    $fname = str_replace(' ','',$fname); // removing spaces
    $fname = ucfirst(strtolower($fname)) ; // Uppercase first letter
    $_SESSION['reg_fname'] = $fname ; // Stores first name

    //last name

    $lname = strip_tags($_POST['reg_lname']); // removing html tags
    $lname = str_replace(' ','',$lname); // removing spaces
    $lname = ucfirst(strtolower($lname)); // Uppercase first letter
    $_SESSION['reg_lname'] = $lname ; //stores last name


    //email
    $em = strip_tags($_POST['reg_email']); //Remove html tags
    $em = str_replace(' ', '', $em); //remove spaces
    $em = ucfirst(strtolower($em)); //Uppercase first letter
    $_SESSION['reg_email'] = $em ; // stores email



    //email 2
    $em2 = strip_tags($_POST['reg_email2']); //Remove html tags
    $em2 = str_replace(' ', '', $em2); //remove spaces
    $em2 = ucfirst(strtolower($em2)); //Uppercase first letter
    $_SESSION['reg_email2'] = $em2 ; //stores email 2

    //Password

    $password = strip_tags($_POST['reg_password']) ;
    $password2 = strip_tags($_POST['reg_password2']) ;

    //date

    $date = date('Y-m-d');

    if($em == $em2)
    {
        //Check if email is in valid format

        if(filter_var($em,FILTER_VALIDATE_EMAIL)){
            $em = filter_var($em,FILTER_VALIDATE_EMAIL);

            //check if email already exists

            $e_check = mysqli_query($con,"SELECT email FROM users WHERE email = '$em'");

            //count the number of rows returns

            $num_rows = mysqli_num_rows($e_check);

            if($num_rows > 0) {
                array_push($error_array,"Email is already exists<br>") ;
            }

        }

        else{
            array_push($error_array,"Invalid Format<br>") ;
        }
    }

    else{
        array_push($error_array,"Emails doesn't match<br>");
    }


    if(strlen($fname) > 25 || strlen($fname)< 2) {
        array_push($error_array,"your first name must be between 2 and 25 characters<br>") ;
    }

    if(strlen($lname) > 25 || strlen($lname) < 2 ) {
        array_push($error_array,"your last name must be between 2 and 25 characters<br>") ;
    }

    if($password2 != $password)
    {
        array_push($error_array,"Password doesn't match<br>") ;
    }

    if(strlen($password) > 30 || strlen($password) < 5) {
        array_push($error_array,"Your password must be between 5 and 30 characters<br>")  ;

    }

    if(empty($error_array)) {
        $password = md5($password) ; // encrypted password

        //Generating username by concatenating first and last name
        $username = strtolower($fname. "_" .$lname);
        $check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username ='$username' ");

        $i = 0;

        while(mysqli_num_rows($check_username_query) != 0){
            $i++;
            $username = $username. "_" .$i;
            $check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username ='$username' ");
        }

        //profile picture assignment

        $random = rand(1,2);
        $profile_pic="" ;

        if($random ==1) {
            //$profile_pic = "assets\profile_pics\defaults\head_amethyst.png";
            $profile_pic = addslashes("assets\profile_pics\defaults\head_amethyst.png");
        }

        else if($random == 2) {
            //$profile_pic = "assets\profile_pics\defaults\head_belize_hole.png";
            $profile_pic = addslashes("assets\profile_pics\defaults\head_belize_hole.png");
        }

        $query = mysqli_query($con,"INSERT INTO USERS 
                VALUES('','$fname','$lname','$username','$em','$password','$date','$profile_pic','0', '0', 'no' ,',')");

        array_push($error_array,"<span color = rgb(0,255,0)> You are all set! Go ahead and Log in!</span><br>");

        $_SESSION['reg_fname']  = "" ;
        $_SESSION['reg_lname'] = "" ;
        $_SESSION['reg_email'] = "";
        $_SESSION['reg_email2'] = "";

    }







}


?>
