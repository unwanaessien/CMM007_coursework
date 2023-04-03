<?php
//https://stackoverflow.com/questions/6902128/getting-data-from-the-url-in-php
$storyId = "";
session_start();
$role = $_SESSION['is_admin'];
$username = $_SESSION['username'];
$role = $_SESSION['is_admin'];

//enable page security to use authentication
if (!isset($_SESSION["loggedin"])) {
    header("location: login.php");
  }
  
include_once 'db.php';
include_once 'db-conn.php';
$newTitle = $newLocation = $newCategory = $newDesc = $newUser = $newDate = "";

//enable page security to use authentication
if (!isset($_SESSION["loggedin"])) {
    header("location: login.php");
}

if (isset($_GET['storyid'])) {
    //     if (isset($_SESSION['redirect_url'])) {
    //         $redirect_url = $_SESSION['redirect_url'];
    //         header('Location: ' . $redirect_url);
    //     } else {
    //         header('Location: my_profile.php');
    //     }
    // }

    //ref https://www.youtube.com/watch?v=ao-fTUiM1U8
    try {
        $storyId = $_GET['storyid'];
        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
        if (isset($storyId)) {
            $dataSourceName = "mysql:host=$dbHost;dbname=$dbDatabase;";        //compose data source name as a string
            $pdo = new PDO($dataSourceName, $dbUser, $dbPassword);                //create PDO object
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    //tell PDO to report errors by exceptions
            /*
        Compose SQL query and execute it.

        If there is an error in the query, the result is a false.
        In this case, all subsequent operation to result will give an exception.

        If the query is successful, result will be a PDOStatement object.
    */
            //compose SQL query as a string
            $sql = "SELECT * from experiences WHERE story_id = $storyId";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($result);

            //assign return param to variables
            foreach ($result as $row) {
                $newTitle = $row['title'];
                $newLocation = $row['location'];
                $newCategory = $row['category'];
                $newDesc = $row['description'];
            }
        }
    } catch (PDOException $exception) {
        http_response_code(500);
        echo "<div class='error'>" . $exception->getMessage() . "</div>";
    } //end then part for GET method

}
$pdo = null;    //Destroy PDO object by removing all references to it
//This will close the connection to MySQL.

$desc = $newDesc;
// $image = $target_file;
$userid = $_SESSION["FirstName"];
$FirstName = $_SESSION["FirstName"];
$LastName = $_SESSION["LastName"];
$date = date("Y/m/d");
$newUser = $_SESSION['FirstName'];
$newDate = date("Y/m/d");

include_once 'db.php';
include_once 'db-conn.php';
?>
<?php
readfile('header.php');
?>

<head>
    <!-- <script src="usingAjax.js"></script> -->
    <style>
        #body {
            background: url(./assets/images/bg.jpeg);
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
                    <h2 class="title">Update Experience</h2>

                    <form class="form-group" method="POST" action="editStory.php">

                        <div class="form-group   input-group">
                            <label for="storytitle">Story Title </label>
                            <input onkeydown="wordLimit()" id="wordIntent" class="input--style-1 form-control" required type="text" class="form-control" name="storytitle" id="storytitle" value="<?php echo $newTitle; ?>">
                        </div>

                        <div class="form-group   input-group">
                            <label for="desc">Description</label>
                            <textarea rows="5" cols="50" class="input--style-1 form-control" type="text" class="form-control" name="desc" id="desc"><?php echo $newDesc; ?> </textarea>
                        </div>

                        <div class="form-group input-group">
                            <label for="Location">Location</label>
                            <input list="location" name="location" placeholder="Aberdeen?" class="input--style-1 form-control">
                            <datalist id="location">
                                <option selected="selected" value="<?php echo $newLocation; ?>">

                                <option value="Aberdeen" <?php if ($newLocation == 'Aberdeen') echo 'selected="selected"'; ?>>Aberdeen</option>
                                <option value="Edinburgh" <?php if ($newLocation == 'Edinburgh') echo 'selected="selected"'; ?>>Edinburgh</option>
                                <option value="Glasgow" <?php if ($newLocation == 'Glasgow') echo 'selected="selected"'; ?>>Glasgow</option>
                                <option value="Dundee" <?php if ($newLocation == 'Dundee') echo 'selected="selected"'; ?>>Dundee</option>
                                <option value="Invergodon" <?php if ($newLocation == 'Invergodon') echo 'selected="selected"'; ?>>Invergodon</option>
                                <option value="others" <?php if ($newLocation == 'others') echo 'selected="selected"'; ?>>others</option>

                            </datalist>
                        </div>

                        <div class="form-group   input-group">
                            <label for="Category">Category</label>
                            <input list="category" name="category" placeholder="Foods, Club?" class="input--style-1 form-control">
                            <datalist id="category">
                                <option value="Food" <?php if ($newCategory == 'value1') echo ' selected'; ?>>
                                <option value="Nightlife" <?php if ($newCategory == 'value1') echo ' selected="selected"'; ?>>
                                <option value="Landscape" <?php if ($newCategory == 'value1') echo ' selected="selected"'; ?>>
                                <option value="Nature" <?php if ($newCategory == 'value1') echo ' selected="selected"'; ?>>
                                <option value="Club" <?php if ($newCategory == 'value1') echo 'selected="selected"'; ?>>
                            </datalist>
                        </div>

                        <!-- <div class="form-group   col-2 input-group">
                            <label for="image">Select image to upload:</label>
                            <input class="input--style-1" type="file" class="form-control" name="image" id="image">
                        </div> -->

                        <div class="form-group   input-group">
                            <input name=id onkeydown="wordLimit()" id="wordIntent" class="input--style-1 form-control" type="hidden" class="form-control" id="id" value="<?php echo $storyId; ?>">
                        </div>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

<footer>
    <?php

    ?>
</footer>
<?php
readfile('footer.php')
?>
</html>