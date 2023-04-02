<?php
//https://stackoverflow.com/questions/6902128/getting-data-from-the-url-in-php
// $storyId = "";
session_start();
include_once 'db.php';
include_once 'db-conn.php';
// $newTitle = $newLocation = $newCategory = $newDesc = $newUser = $newDate = "";

//enable page security to use authentication
if (!isset($_SESSION["loggedin"])) {
    header("location: login.php");
}
// handle the post request 
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
    $desc = $_POST['desc'];
    $storyId = $_POST['id'];
    $userid = $_SESSION['FirstName'];
    $date = date("Y/m/d");

    try {
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

            $sql = $pdo->prepare("UPDATE experiences SET title = ?, location = ?, category = ?, description = ?, date_added = ? WHERE story_id = '$storyId' ");
            $sql->execute([$storytitle, $location, $category, $desc, $date]);

            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($result);
            $msg = "Update Successful";
            $_SESSION['UpdateConfirm'] = $msg;
            // Database update successful, redirect to last page
            if (isset($_SESSION['redirect_url'])) {
                $redirect_url = $_SESSION['redirect_url'];
                header('Location: ' . $redirect_url);
            } else {
                header("Location: my_profile.php");
            }
        }
    } catch (PDOException $exception) {
        http_response_code(500);
        echo "<div class='error'>" . $exception->getMessage() . "</div>";
    } //end then part for GET method

}
$pdo = null;    //Destroy PDO object by removing all references to it
//This will close the connection to MySQL.
