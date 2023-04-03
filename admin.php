<!DOCTYPE html>
<html lang='en'>

<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
//enable page security to use authentication
if (!isset($_SESSION["loggedin"]) || $_SESSION["is_admin"] !== "1") {
  $redirect_url = "login.php";
  header('Location: ' . $redirect_url);
}


if (isset($_SESSION['delconfirm'])) {
  $delconfirm = $_SESSION['delconfirm'];
  echo "$delconfirm";
}

$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
include('header.php');

include 'db-conn.php';
include 'db.php';
// include_once 'class/User.php';
// include_once 'class/Post.php';
// include_once 'class/Category.php';

$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
$totalpost = "SELECT Count(title) from experiences";
$totalusers = 'SELECT Count(id) from users where is_admin = "0" ';
$sql = "SELECT * FROM experiences ORDER BY story_id DESC ";

$totalpost = "SELECT COUNT(title) FROM experiences";
$totalpostcount = mysqli_query($db, $totalpost);
$count = mysqli_fetch_array($totalpostcount)[0];
// echo $count;

// echo $postcount;
$totaluserscount = mysqli_query($db, $totalusers);
$usercount = mysqli_fetch_array($totaluserscount)[0];
// echo $usercount;


$result =  mysqli_query($db, $sql);
// $db = $database->getConnection();

// $user = new User($db);
// $post = new Post($db);
// $category = new Category($db);
?>

<head>
  <title>Admin Dashboard</title>
  <meta charset="UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="admin.js"></script>
  <!-- <script src="my_profile.js"></script> -->
</head>

<header id="header">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Admin Dashboard </h1>
      </div>

      <div class="col-md-10">
        <h1><span class="" aria-hidden="true"></span>Total Stories: <?php echo $count; ?>, Total Users: <?php echo $usercount; ?> </h1>
      </div>

      <br>
      <div class="col-md-2">
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Manage
            <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="addexperience.php">Add Experience</a></li>
            <li><a href="signup.php">Add User</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>

<body class="container">
  <div>
    <!-- A simple input text field for entering a keyword for the search. 
      Notice that the button is not a "submit" button, and there is NO form. 
      The button is simply used to invoke the JavaScript function which refreshes the table.
    -->
    <input id="keyword" size="20" placeholder="Search for an item name here">
    <button id="searchButton">Search</button>

    <table id="experiencetable" class="table">
      <thead class="thead-light">
        <tr class="thead-light">
          <th>Story ID</th>
          <th>Title</th>
          <th>Location</th>
          <th>Description</th>
          <th>Category</th>
          <th>Author</th>
          <th>Date Added</th>
          <th>Edit Story</th>
          <th>Delete Story</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>

  </div><br>

  <!-- <div> -->

    <?php
    // $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
    // $sql = 'SELECT * FROM experiences';
    // $result =  mysqli_query($db, $sql);

    // if (mysqli_num_rows($result) > 0) {
    //   if (mysqli_num_rows($result) > 0) {
    //     // Output each image with styling
    //     while ($row = mysqli_fetch_assoc($result)) {
    //       echo '<div class="image" class="table2">
    //             <img src="' . $row["image"] . '" height=60px width=60px>' . "Title: " . $row["title"] . "; Location: " . $row["location"] .

    //         '</div><br>';
    //     }
    //   } else {
    //     echo "No images found.";
    //   }
    // }
    ?>
  <!-- </div> -->

</body>

<footer>
  <?php
  readfile("footer.php");
  ?>
</footer>