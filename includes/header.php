<?php
require 'config/config.php';

if(isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con,"SELECT * FROM users WHERE username = '$userLoggedIn'");
    $user = "";
    $user = mysqli_fetch_array($user_details_query);
}
else {

    header("Location: register.php");

}


?>

<html>
<head>
    <title>Welcome Superhero!</title>
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" ;

</head>
<body>

    <div class="top_bar" >
        <div class="logo">
            <a href="index.php" >SuperBlog!</a>
        </div>

        <nav>
            <a href="<?php echo $userLoggedIn; ?>">
                <?php echo $user['first_name'];?>
            </a>
            <a href="#">
                <i class="fas fa-home "></i>
            </a>
            <a href="#">
                <i class="fas fa-envelope "></i>
            </a>
            <a href="#">
                <i class="fas fa-bell "></i>
            </a>
            <a href="#">
                <i class="fas fa-users "></i>
            </a>
            <a href="#">
                <i class="fas fa-cog "></i>
            </a>
            <a href="includes/handlers/logout.php">
                <i class="fas fa-sign-out-alt "></i>
            </a>
        </nav>

    </div>

<div class="wrapper">




