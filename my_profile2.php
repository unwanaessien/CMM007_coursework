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
    <title>My Profile</title>
   
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <title>Admin Dashboard</title>
    <!-- Load the JavaScript which set up the event handler, etc. -->
    <script src="usingAjax.js"></script>
    <script src="admin.js"></script>
    <style>
        /* Define the grid container */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid: ""
        }
    </style>
</head>


<body style="color:blue;" class="container"><br>
    <div class="page-content">
        <p><h1>Welcome <?php echo htmlspecialchars($_SESSION['FirstName']) ?> </h1></p></b>
        <p><h1>This is your Profile Page </h1></p>
        <p><a href="logout.php" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-log-out"></span> Log out</a>
        </p>
        <h1>Your Uploaded Stories</h1>
        <?php

        if (isset($_SESSION['delconfirm'])) {
            $delconfirm = $_SESSION['delconfirm'];
            echo "$delconfirm";
        }
        ?>

        <section>
            <!-- A simple input text field for entering a keyword for the search.
                Notice that the button is not a "submit" button, and there is NO form.
                The button is simply used to invoke the JavaScript function which refreshes the table.
            -->
            <input id="keyword" size="20" placeholder="Search a location here">
            <button id="searchButton">Search</button>
        </section>

        <table id="stories" class="table">
            <thead class="thead-light">
                <tr class="thead-light">
                    <th>Title</th>
                    <th>Location</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Image</th>
                    <!-- <th>Item Type</th>
                    <th>Item Color</th>
                    <th>Description</th>
                    <th>Date Missing</th>
                    <th>Date Found</th> -->
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div><br><br>


    <div class="page-content">
        <h1>Our Other Stories</h1>
        <!-- PHP code to retrieve and display content from the database -->
        <?php
        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM experiences";
        $result =  mysqli_query($db, $sql);

        $all_property = array();
        //declare an array for saving property

        //showing property
        echo '<table  class="table" border=20 >
        <tr class="data-heading" class="table">';  //initialize table tag
        while ($property = mysqli_fetch_field($result)) {
            echo '<td>' . " " .  $property->name . "  " . "  " . '</td>';  //get field name for header
            $all_property[] = $property->name;  //save those to array
        }
        echo '</tr>'; //end tr tag

        //showing all data
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr class="table">';
            foreach ($all_property as $item) {
                echo '<td>' . $row[$item] . '</td>'; //get items using property value
            }
            echo '</tr>';
        }
        echo '</table>';
        ?><br>

        <br><br>
        <div class="container">
            <?php
            echo "<h1>Our Other Stories 2</h1>";
            $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM experiences ORDER BY story_id DESC LIMIT 40";
            $result =  mysqli_query($db, $sql);

            // Output the content in grid style

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="row container ">';
                echo '<div class="col-md-4  ">';
                // echo '<div class="grid-item " >';
                echo '<img class="img-circle "  width="140" height="140" src="' . $row["image"] . '">' .
                    '<h2>' . $row["title"] . '</h2>' .
                    '<p>' . $row["description"] . '</p>' . '<p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>' .
                    '</div>';
            }
            echo '</div>'; ?>

            <!-- test - Wrap the rest of the page in another container to center all the content. -->


        </div>
    </div>








</body><br>


<?php
$db->close();
readfile('footer.php');
?>

</html>