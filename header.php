<!DOCTYPE html>
<html lang='en'>
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

?>

<html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- footer stylesheet -->
  <link rel="stylesheet" href="assets/css/main_style.css">

  <meta name="keywords" content="Expierience, Scottish highlands, scotland, holidays, Aberdeen, Glasgow, Edinburgh, views, Travel">

  <meta name="description" content="This application allows users to view tourist attractions around sctoland. It also allow users to upload images of their experiences around the Scottish attractions">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="./assets/css/footer.css"> -->


  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/fonts/icomoon/style.css">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">  -->

  

</head>


<body>

  <nav class="navbar navbar-inverse"> <!--navbar-fixed-top -->
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><img src="./assets/images/logo.png" width="100%" alt="logo Image"> </a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="active"><a href="experience.php">Find experience</a></li>
        <li class="active"><a href="addexperience.php">Share experience</a></li>
        <li class="active"><a href="admin.php">Admin</a></li>
        <li class="active"><a href="contactus.php">Contact Us</a></li>
        <li><a href="my_profile.php">My Profile</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav>



  <!-- <div class="container">
    <h3>Right Aligned Navbar</h3>
    <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
  </div> -->