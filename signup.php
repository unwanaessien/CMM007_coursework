<!DOCTYPE html>
<html>

<?php

require_once "db-conn.php";
error_reporting(E_ALL);
readfile('header.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
} else {
    session_destroy();
    session_start();
}


//now we take our hammer and destroy the session haha!


?>


<head>
    <title>Content Management Website</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register New User</title>

</head>

<body class="container" class="signin-body">
    <?php

    $FirstName = $is_admin = $LastName = $email = $id = $password = $hashed_password = $phone = "";


    if (isset($_POST['submit'])) {
        $ok = true;

        if (!isset($_POST['lastName']) || $_POST['lastName'] === '') {
            $ok = false;
            echo '<p style="color:black" >Please enter your Lastname"</p>';
        } else {
            $LastName = $_POST['lastName'];
        };

        if (!isset($_POST['firstname']) || $_POST['firstname'] === '') {
            $ok = false;
            echo '<p style="color:black"> please enter your Firstname"</p>';
        } else {
            $FirstName = $_POST['firstname'];
        };

        if (!isset($_POST['email']) || $_POST['email'] === '') {
            $ok = false;
            echo '<p style="color:black"> please enter email address"</p>';
        } else {
            $email = $_POST['email'];
        };

        if (!isset($_POST['password']) || $_POST['password'] === '') {
            $ok = false;
            echo '<p style="color:black"> please enter your prefered password "</p>';
        } else {
            $password = $_POST['password'];
        };
        // $id = $_POST["id"];
        $phone = $_POST["phone"];
        $is_admin = 0;

        if ($ok) {
            // make sure to store password in hashes
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
            $sql = sprintf(
                "INSERT INTO users (FirstName, LastName, email, hashed_password, is_admin, phone) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
                $db->real_escape_string($FirstName),
                $db->real_escape_string($LastName),
                $db->real_escape_string($email),
                $db->real_escape_string($hashed_password),
                $db->real_escape_string($is_admin),
                $db->real_escape_string($phone)
            );
            $db->query($sql);
            // This is in the PHP file and sends a Javascript alert to the client
            echo "<p>User registration succesful.👍</p>";
            $_SESSION['sucessfull'] = "<p>User registration succesful.👍</p>";
            header("location: login.php");
            $db->close();
            $FirstName = $LastName = $email = $id = $password = $hashed_password =  $is_admin = $phone = "";
        } else {
            echo "There is an error somewhere ";
        };
    }

    ?>
    <style>
        /* .btn2 {
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
            padding: 10px 15px;
            width: 50%;
            border-radius: 5px;
            border: 0;
            background-color: #8e44ad !important;
        } */

        .signin-body {
            background: url(assets/images/Highlands-blog-GetYourGuide-1200x900.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* 
        .signin-form {
            width: 350px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
            color: #fff;

        }

        * {
            padding: 0;
            margin: 0;
            font-family: sans-serif;
        }

        .signin-form h1 {
            font-size: 40px;
            color: purple;
            text-align: center;
            text-transform: uppercase;
            margin: 40px 0;
        }

        .signin-form label {
            font-size: 20px;
            margin: 15px;
        }

        .signin-form input {
            font-size: 16px;
            width: 100%;
            padding: 15px 10px;
            border: 0;
            outline: none;
            border-radius: 5px;
        } */

        /* .signin-form button {
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
            padding: 10px 15px;
            width: 50%;
            border-radius: 5px;
            border: 0;

        } */
    </style>
    <div class="signin-form">
        <h1>sign in</h1>

        <main class="form-control-sm form-group row">
            <form class="form-body" class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                <div class="form-group">
                    <label for="firstname">FirstName: </label>
                    <input type="text" class="form-control" name="firstname" placeholder="Enter your first name" id="firstname" value="<?php echo htmlspecialchars($FirstName, ENT_QUOTES); ?>">
                </div><br>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" name="lastName" placeholder="Surname" id="Enter your last name" value="<?php echo htmlspecialchars($LastName, ENT_QUOTES); ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required class="form-control" name="email" id="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($email, ENT_QUOTES); ?>">
                </div><br>

                <div class="form-group">
                    <label for="phone ">Phone no: </label>
                    <input type="phone" class="form-control" placeholder="Enter your mobile no." name="phone" id="phone" value="<?php echo htmlspecialchars($phone, ENT_QUOTES); ?>">
                </div><br>


                <!-- <div class="form-group">
                    <label for="id">Student/Staff ID: </label>
                    <input type="text" placeholder="Enter your ID no." class="form-control" name="id" id="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES); ?>">
                </div><br> -->

                <div class="form-group">
                    <label for="password">password: </label>
                    <input type="password" class="form-control" placeholder="Enter your password" name="password" id="password" value="<?php echo htmlspecialchars($password, ENT_QUOTES); ?>">
                </div><br>

                <input type="submit" name="submit" class="btn btn-default" class="btn2 btn-warning form-group">
            </form>
    </div>
    </main><br>



</body><br>

</html>