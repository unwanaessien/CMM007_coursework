<!DOCTYPE html>
<html lang='en'>

<?php
// include("header.php");
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

<body class="container">
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
    </nav><br>


    <br>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">CONTACT US</h1>
            <p class="lead text-muted mb-0">Contact us to book your Scotland Experience</p>
        </div>
    </section>

    <!-- <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div> -->

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact us.
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" rows="6" required></textarea>
                            </div>
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary text-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                    <div class="card-body">
                        <p>3 RGU Finest Building</p>
                        <p>AB10 7yz Aberdeen</p>
                        <p>United Kingdom</p>
                        <p>Email : email@example.com</p>
                        <p>Tel. +44 12 56 11 51 84</p>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body><br>

<footer>
    <?php
    readfile("footer.php");
    ?>
</footer>