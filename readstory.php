
<?php
    readfile('header.php');
    include_once 'db-conn.php';
    session_start();

    $id = $_GET['sid'];

    $query = "SELECT * FROM stories_tb where sid = $id";
    $statement = $conn->prepare($query);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    //$result = $statement->fetchAll();
    


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="col-md-12">
                <h3 
                    class="text-center text-uppercase">Welcome to <?php echo $row["rname"]?>
                </h3>
            </div><br><br>
            <div class="row">
                <div class="col-md-6">
                <img src= <?php echo $row["images"] ?> alt="Your Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                <h2>Story</h2>
                <p><?php echo $row["description"] ?></p>
                </div>
            </div>
        </div>
    </body>
</html>
