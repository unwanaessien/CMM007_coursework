<!DOCTYPE html>
<html>

<?php
session_start();
$_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];

//enable page security to use authentication
if (!isset($_SESSION["loggedin"])) {
    header("location: login.php");
}
//load up database variables
require 'db-conn.php';
include 'db.php';

readfile('header.php');
?>


<head>
    <title>Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="my_profile.js"></script>
    <!-- <script src="admin.js"></script> -->

</head>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Welcome <?php echo htmlspecialchars($_SESSION['FirstName']) ?></h1>
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

        <div>
            <?php
            $id = $_SESSION['id'];
            $username = $_SESSION['FirstName'];
            // $username = strtolower($username);

            try {
                $dataSourceName = "mysql:host=$dbHost;dbname=$dbDatabase;";
                $db = new PDO($dataSourceName, $dbUser, $dbPassword);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
                $sql = "Select * FROM experiences WHERE userid = '$username' ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                // echo "$username";
                // var_dump($result);
                $pdo = null;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                exit;
            } ?>

            <table id="my_profile" class="table">
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
                        <th>Picture</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // foreach ($result as $row) {
                    //     echo "<td>" . $row["title"] . "</td>";
                    //     echo "<td>" . $row["location"] . "</td>";
                    //     echo "<td>" . $row["category"] . "</td>";
                    //     echo "<td>" . $row["userid"] . "</td>";
                    //     echo "<td>" . $row["date_added"] . "</td>";
                    //     echo '<img src="' . $row["image"] . '" height=100px width=100px >';
                    //     echo "<td>" . $row["image"] . "</td>";
                    //     echo "<td>" . $row["description"] . "</td>";
                    //     echo "</tr>";
                    // }
                    // echo "</tbody>";
                    // echo "</table>";

                    ?>
                </tbody>
            </table>



        </div>



        <?php
        readfile('footer.php');
        ?>

</html>