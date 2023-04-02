<!DOCTYPE html>
<html>

<?php
require 'db-conn.php';
readfile('header.php');
$_SESSION['url'] = $_SERVER['REQUEST_URI'];

?>
<br>

<head>
    <title>Content Management Website</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Trainings</title>
    <script src="usingAjax.js"></script>
    <style>
        .image {
            display: inline-block;
            margin: 10px;
            text-align: center;
        }

        .image img {
            max-width: 300px;
            max-height: 300px;
            object-fit: cover;
        }
    </style>
</head>

<?php
$FirstName = '';
$LastName = '';
$City = '';
$Age = '';
?>

<body class="container-fluid container" id="body">

    <!-- <section class="  text-center   "> -->
    <div class="row ">
        <div class="col-4 d-flex justify-content-center text-center">
            <h1 class="fw-light">Places to GO</h1>
            <p class="lead text-muted">Search a wide range of site attractions, landscapes, food & drink options and things to do from indoor and outdoor attractions to activities, tours and more.</p>
            <!-- <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-primary my-2">Secondary action</a>
                </p> -->
        </div>
    </div>
    <!-- </section> -->

    <div class="container">
        <form method="post" action="">
            <input type="text" name="search_term" placeholder="Search...">
            <button type="submit">Search</button>
        </form>

        <?php
        echo "<h1>Our Other Stories 2</h1>";
        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
        if (isset($_POST['search_term'])) {
            $searchTerm =  $_POST['search_term'];
            $sql = "SELECT * FROM  experiences  WHERE title LIKE '%$searchTerm%' OR location LIKE '%$searchTerm%'  OR category LIKE '%$searchTerm%'  ORDER BY story_id DESC ";
        } else {
            $searchTerm =  "";
            $sql = "SELECT * FROM  experiences ORDER BY story_id DESC ";
        }
        // Output the content in grid style
        $result =  mysqli_query($db, $sql);


        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col">';
            echo ' <div class="card shadow-sm">';
            echo '<div class="col-md-4  ">';
            // echo '<div class="grid-item " >';
            echo '<img class="img-circle" width="250" height="250" src="' . $row["image"] . '">' .
                '<h2>' . $row["title"] . '</h2>' . '<p>' . $row["description"] . '</p>' .
                '<p><a style="color: white" class="btn btn-secondary" href="readstory.php?story_id=' . $row["story_id"] . '">View details &raquo;</a></p>' .
                '</div>';
        }
        echo '</div> ';
        echo '</div> ';
        echo '</div> '; ?> <!-- test - Wrap the rest of the page in another container to center all the content. -->
    </div><br>
<br>

<div>
    <footer>
        <?php
        $db->close();
        readfile('footer.php');
        // include_once('footer.php');

        ?>
    </footer>
</div>

</html>