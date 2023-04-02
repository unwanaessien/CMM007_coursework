<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once "db-conn.php";
require_once "db.php";
// error_reporting(E_ALL);
readfile('header.php');
$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

//enable page security to use authentication
if (!isset($_SESSION["loggedin"])) {
    header("location: login.php");
}
?>

<?php
$storytitle = $userid = $location = $category = $desc = $target_file = $title =  $FirstName = "";




// get image to upload and store path in database

// if (isset($_POST['submit'])) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // handle form upload 
    $ok = true;
    if (!isset($_POST['storytitle']) || $_POST['storytitle'] === '') {
        $ok = false;
        echo '<p style="color:black">Title Required';
    } else {
        $storytitle = $_POST['storytitle'];
    };

    if (!isset($_POST['location']) || $_POST['location'] === '') {
        $ok = false;
        echo '<p style="color:black">Location Required';
    } else {
        $location = $_POST['location'];
    };

    if (!isset($_POST['category']) || $_POST['category'] === '') {
        $ok = false;
        echo '<p style="color:black">Kindly add a category';
    } else {
        $category = $_POST['category'];
    };

    $target_dir = "assets/uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
            echo $target_file;
            $uploadOk = "";
        } else {
            echo "Sorry, there was an error uploading your file.";
            $uploadOk = "";
        }
    }

    // end of image upload 


    $desc = $_POST['desc'];
    $image = $target_file;
    $userid = $_SESSION["id"];
    $FirstName = $_SESSION["FirstName"];
    $LastName = $_SESSION["LastName"];
    $date = date("Y/m/d");


    if ($ok) {
        // secure way to sanitise database code here
        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

        $sql = sprintf(
            "INSERT INTO experiences (title, location, category, description, image, userid, date_added) VALUES (
            '%s', '%s', '%s', '%s', '%s', '%s' , '%s')",
            $db->real_escape_string($storytitle),
            $db->real_escape_string($location),
            $db->real_escape_string($category),
            $db->real_escape_string($desc),
            $db->real_escape_string($image),
            $db->real_escape_string($FirstName),
            $db->real_escape_string($date)

        );
        $db->query($sql);
        $msg = "<p> Your Experience has been added. </p>";
        echo '<p>Your Experience has been added .</p>';
        $db->close();
        $_SESSION['msg'] = $msg;
        $storytitle = $desc = "";
        header("location: my_profile.php");
    } else {
        echo "There is an error in adding this post";
    };
}

?>

<head>
    <!-- Icons font CSS-->
    <link href="assets/color-form/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="assets/color-form/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="assets/color-form/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/color-form/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/color-form/css/main.css" rel="stylesheet" media="all">
    <script src="usingAjax.js"></script>
    <style>
        #body {
            background: url(assets/color-form/images/bg-head-01.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<br>

<body class="container-fluid container" id="body">
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo" id="body">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Share Experience</h2>

                    <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                        <div class="form-group   input-group">
                            <label for="storytitle">Story Title</label>
                            <input onkeydown="wordLimit()" id="wordIntent" class="input--style-1 form-control" required type="text" class="form-control" name="storytitle" placeholder="Enter your experience title" id="storytitle" value="<?php echo htmlspecialchars($storytitle, ENT_QUOTES); ?>">
                        </div>

                        <div class="form-group    input-group">
                            <label for="desc">Description</label>
                            <textarea class="input--style-1 form-control" rows="5" cols="50" class="input--style-1" type="text" name="desc" placeholder="Enter your description " id="desc" value="<?php echo htmlspecialchars($desc, ENT_QUOTES); ?>"></textarea>
                        </div>

                        <div class="form-group    input-group">
                            <label for="Location">Location</label>
                            <input class="input--style-1 form-control" list="location" name="location" placeholder="Aberdeen?">
                            <datalist id="location">
                                <option value="Aberdeen">
                                <option value="Edinburgh">
                                <option value="Glasgow">
                                <option value="Dundee">
                                <option value="Invergodon">
                                <option value="others">
                            </datalist>
                        </div>

                        <div class="form-group   input-group">
                            <label for="Category">Category</label>
                            <input class="input--style-1 form-control" list="category" name="category" placeholder="Foods, Club?">
                            <datalist id="category">
                                <option value="Food">
                                <option value="Nightlife">
                                <option value="Landscape">
                                <option value="Nature">
                                <option value="Club">
                            </datalist>
                        </div>

                        <div class="form-group   input-group">
                            <label for="image">Select image to upload:</label>
                            <input class="input--style-1" type="file" class="form-control" name="image" id="image">
                        </div>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

<bottom>
    <?php
    include('footer.php');
    ?>
</bottom>

</html>