<?php
// initialize a session or read a session
session_start();
// include('header.php');
readfile('header.php');
//check session data if user is logged on

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: logout.php");
    exit;
}



//load the database connection string
require_once "db.php";

//set the variables as empty initially.
$email = $password = $is_admin = $FirstName = "";
$emailerror = $passworderror = $loginerror = $is_adminerror = "";
//check if the method is post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //sanitize email 
    if (empty(trim($_POST["email"]))) {
        $emailerror = "Please enter an email as a username.";
    } else {
        $email = trim($_POST["email"]);
    }
    //verify password field
    if (empty(trim($_POST["password"]))) {
        $passworderror = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    // if(empty(trim($_POST["role"]))){
    //     $is_adminerror = "Please select a role buddy";
    // }

    if (empty($emailerror) && empty($passworderror)) {
        //check the database for the user credentials 
        $sql = "SELECT *  FROM users WHERE email = :email";
        if ($stmt = $pdo->prepare($sql)) {
            //I will attach the value :email to a parameter
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

            //I will set the parameter below
            $param_email = trim($_POST["email"]);

            //since i have all the parameters, i'll execute the statement.
            if ($stmt->execute()) {
                //used the two echos below for debugging.
                //echo "prepare sql";
                if ($stmt->rowCount() == 1) {
                    //if a user exists retrieve the details and verify them.
                    //s  echo "found user";
                    if ($row = $stmt->fetch()) {
                        //retrieve the details from the row in the DB
                        $id = $row["id"];
                        $email = $row["email"];
                        $is_admin = $row["is_admin"];
                        $hashed_password = $row["hashed_password"];
                        $FirstName = $row["FirstName"];

                        if (password_verify($password, $hashed_password)) {
                            //the above code compares the password entered with the hashed one in DB
                            //if it's the same, store the following in a session.

                            // session_start(); session already started

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["is_admin"] = $is_admin;
                            $_SESSION["FirstName"] = $FirstName;
                            $_SESSION["LastName"] = $LastName;
                            $_SESSION["username"] = $FirstName;
                            //get the user to the correcpoding page based on is_admin flag
                            switch ($is_admin) {
                                case "1":
                                    if (isset($_SESSION['redirect_url'])) {
                                        $redirect_url = $_SESSION['redirect_url'];
                                        unset($_SESSION['redirect_url']);
                                        header('Location: ' . $redirect_url);
                                        exit();
                                    } else {
                                        header('Location: admin.php');
                                        exit();
                                    }
                                case "0":
                                    if (isset($_SESSION['redirect_url'])) {
                                        $redirect_url = $_SESSION['redirect_url'];
                                        unset($_SESSION['redirect_url']);
                                        header('Location: ' . $redirect_url);                                    
                                    } else {
                                        $redirect_url = $_SESSION['redirect_url'];
                                        header('Location: ' . $redirect_url);                                        
                                    }
                            }
                        }
                        //if the credentials are wrong display an error
                        else {
                            $loginerror = "Invalid email or password.";
                        }
                    }
                }
                //if you cant find a user, echo the error below.
                else {
                    $loginerror = "this username does not exist.";
                }
            } else {
                echo "Login Failed. Contact Admin";
            }
            //now i'll close the statament
            unset($stmt);
        }
    }
    //close the connection. Phew!
    unset($pdo);
}

?>

<!--Bootstrap was used mostly to style this application-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- footer stylesheet -->
    <link rel="stylesheet" href="assets/css/main_style.css">
    <?php
    if (isset($_SESSION['sucessfull'])) {
        echo $_SESSION['sucessfull'];
    }

    ?>


    <title>Login</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->

    <style>
        .login-body {
            background: url(assets/images/Highlands-blog-GetYourGuide-1200x900.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>




</head>

<body class="login-body">
    <main class=" form-control-sm form-group row">

        <div class="login-form">
            <h1> login page</h1>

            <?php if (!empty($loginerror)) {
                echo '<div class="alert alert-danger">' . $loginerror . '</div>';
            } ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="m-4">
                <div class="mt-5">
                    <input type="email" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES); ?>" placeholder="Enter your email here" class="form-control <?php echo (!empty($emailerror)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $emailerror; ?> </span>
                </div><br>

                <div class="mt-5">
                    <input type="password" name="password" placeholder="Enter your Password Here" class="form-control <?php echo (!empty($passworderror)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $passworderror; ?> </span>
                </div>

                <div class="mt-5">
                    <input type="submit" class="btn btn-lg bg-warning" value="Login">
                </div>
                <p class="text-center" class="btn btn-lg bg-warning"><a href="password.php" class="password" style="color:#308ca5">Forgot Password?</a></p>
                <P class="text-center" style="color:#308ca5">New User? <a href="signup.php" class="text-center mt-5 bw" style="color:#308ca5">Register Now</a></P>
            </form>

        </div>

        </div>
    </main>

</body>

<footer>

    <?php
    // include('footer.php');
    ?>

</footer>

</html>