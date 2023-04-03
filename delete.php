<?php
$storyId = $_POST['story_id'];
$username = $_SESSION['username'];
$role = $_SESSION['is_admin'];

//enable page security to use authentication
if (!isset($_SESSION["loggedin"])) {
  header("location: login.php");
}


include_once 'db.php';
include_once 'db-conn.php';
$msg;

$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "";
if (isset($role) || $_SESSION["is_admin"] == "1") {
  // Construct the SQL query to delete the entry with the given story_id
  $sql = "DELETE FROM experiences where story_id = $storyId";
} else {
  $sql = "DELETE FROM experiences where story_id = $storyId and userid = '$username'";
}


// Execute the query
if (mysqli_query($db, $sql)) {
  // If the query was successful, send a success response to the client
  $msg = "Entry deleted successfully";
  echo "Entry deleted successfully";
} else {
  // If the query failed, send an error response to the client
  echo "Error deleting entry: " . mysqli_error($db);
}

$db->close();
$_SESSION["delconfirm"] = $msg;
if (isset($_SESSION['redirect_url'])) {
  $redirect_url = $_SESSION['redirect_url'];
} else {
  header('Location: my_profile.php');
}
