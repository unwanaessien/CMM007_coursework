<?php
readfile('header.php');
include_once 'db-conn.php';
include_once 'db.php';
session_start();

$id = $_GET['story_id'];
try {
    $dataSourceName = "mysql:host=$dbHost;dbname=$dbDatabase;";
    $db = new PDO($dataSourceName, $dbUser, $dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
    $sql = "SELECT * FROM experiences where story_id = '$id' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo "$username";
    // var_dump($result);
    $pdo = null;
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
foreach ($result as $row)  {
    // echo "<td>" . $row["title"] . "</td>";


?>


<!DOCTYPE html>
<html>

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

<body>
    <div class="container ">
        <div class="col-md-12">
            <h2 class="text-center text-uppercase">Story Title:  <?php echo $row["title"] ?>
            </h2>
        </div><br><br>

        <div class="row">
        <div class="col-md-12 text-lg-start">
                <h2>Story Description: </h2>
                <p><h4><?php echo $row["description"] ?></h4></p>
            </div>

            <div class="col-md-6">
                <img src=<?php echo $row["image"] ?> alt="Your Image" class="img-fluid">
            </div>
            
        </div>
    </div>
</body>

</html>
<?php
}
?>

<footer>
    <?php
    readfile('footer.php');
    ?>
</footer>