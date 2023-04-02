<?php

include_once 'db-conn.php';
session_start();

//getting the session id and savingg it in a variable
$sid = $_SESSION['id'];
// fetching all stories on the session id 
$query = "SELECT * FROM stories_tb where id = $sid";
$statement = $conn->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

/* $delid = $row['sid'];
if(isset($_POST['deleteBTN'])){
    $delquery = "DELETE FROM stories_tb where sid = $delid";
    echo $delid;
    //$delstatement = $conn->prepare($delquery);
    $conn->execute($delquery);
    header("location: loggedIn.php");
} */

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>logged In</title>
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
                    class="text-center text-uppercase">Welcome <?php if(isset($_SESSION['username'])) echo $_SESSION['username']?>
                </h3>
                <img src="assets/images/xl2.jpeg" class="rounded-circle img-thumbnail" width="400" height="345" alt="Cinque Terre">
            </div>
            
            <div class="col-md-12">
                <h3 class="text-center"></h3>
            </div>
            <div>
            
                <table class="table">
                    <thead>
                        <tr>
                            <th>Restuarant Name</th>
                            <th>Category</th> 
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            if($result){

                                foreach($result as $row){
                                    ?>
                                        <tr>
                                            <td><?= $row['rname']; ?></td>
                                            <td><?= $row['category']; ?></td>
                                            <td><?= $row['location']; ?></td>
                                            <td>
                                                <a class="btn btn-success"  role="button" name="readBTN">Read</a>
                                                <a class="btn btn-warning"  role="button" name="updateeBTN">Update</a>
                                                <a href="delete.php?sid=<?php echo $row['sid']; ?>" class="btn btn-danger"  role="button" name="deleteBTN">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                }

                            }
                            else{
                                ?>
                                    <tr>
                                        <td colspan="3">No Record Found</td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                <a class="btn btn-primary" href="story.php" role="button">Tell A Story</a>
            </div>
        </div>
    </body>
</html>