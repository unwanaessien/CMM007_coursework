<!DOCTYPE html>
<html>

<?php
require 'db-conn.php';
readfile('header.php');

?>
<br>

<head>
    <title>Content Management Website</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Trainings</title>
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

if (isset($_POST['submit'])) {
    $target_dir = "assets/uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
            echo $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


if (isset($_POST['submit'])) {
    $ok = true;

    if (!isset($_POST['LastName']) || $_POST['LastName'] === '') {
        $ok = false;
    } else {
        $LastName = $_POST['LastName'];
    };

    if (!isset($_POST['FirstName']) || $_POST['FirstName'] === '') {
        $ok = false;
    } else {
        $FirstName = $_POST['FirstName'];
    };

    if (!isset($_POST['City']) || $_POST['City'] === '') {
        $ok = false;
    } else {
        $City = $_POST['City'];
    };

    if (!isset($_POST['Age']) || $_POST['Age'] === '') {
        $ok = false;
    } else {
        $Age = $_POST['Age'];
    };

    if ($ok) {
        // secure way to sanitise database code here
        // $hash = password_hash($password, PASSWORD_DEFAULT);

        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

        $target_dir = "assets/uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // ... validate file upload, as shown in previous example ...

        // If file was uploaded successfully, add file path to database
        if ($uploadOk == 1) {
            //     $sql = "INSERT INTO Persons (picture) VALUES ('$target_file')";
            //     if (mysqli_query($db, $sql)) {
            //         echo "New record created successfully.";
            //     } else {
            //         echo "Error: " . $sql . "<br>" . mysqli_error($db);
            //     }
            // }

            $sql = sprintf(
                "INSERT INTO Persons (LastName, FirstName, City, Age, picture) VALUES (
          '%s', '%s', '%s', '%s', '%s')",
                $db->real_escape_string($LastName),
                $db->real_escape_string($FirstName),
                $db->real_escape_string($City),
                $db->real_escape_string($Age),
                $db->real_escape_string($target_file)
            );
            $db->query($sql);
            echo '<p>User added.</p>';
            $db->close();
        } else {
            echo "There is an error in the";
        };
    }
}

?>

<body style="color:blue;">
    <div class="page-content">
        <h1>Welcome to our Items Missing App Pace holder </h1>
        <h3>This is not part of the project's page</h3><br><br>
        <!-- PHP code to retrieve and display content from the database -->


        <?php
        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
        $sql = 'SELECT story_id, title, location, description, is_admin FROM experiences';
        $result =  mysqli_query($db, $sql);

        // $all_property = array();
        //declare an array for saving property


        //showing property
        echo '<table  class="table"  id="table" border="100" >
        <tr class="data-heading">';  //initialize table tag
        while ($property = mysqli_fetch_field($result)) {
            echo '<td>' . " " .  $property->name . "  " . "  " . '</td>';  //get field name for header
            $all_property[] = $property->name;  //save those to array
        }
        echo '</tr>'; //end tr tag

        if (mysqli_num_rows($result) > 0) {
            // Output each image with styling
            while($row = mysqli_fetch_assoc($result)) {
                echo '<div class="image" class="table">
                <img src="' . $row["picture"] . '">' . "Age: ". $row["Age"]. "; Name: " . $row["FirstName"]. 
                
                '</div><br>';
            }
        } else {
            echo "No images found.";
        }



        //showing all data
        // while ($row = mysqli_fetch_array($result)) {
        //     echo "<tr>";
        //     foreach ($all_property as $item) {
        //         $pic = $row["picture"];
        //         echo '<td>' . $row[$item] . '</td>'; //get items using property value
        //     }
        //     echo '</tr>';
        // }
        echo "</table>";
        ?><br>
    </div><br>


</body><br>


<main>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="LastName">Last Name</label>
            <input type="text" class="form-control" name="LastName" id="LastName" value="<?php echo htmlspecialchars($LastName, ENT_QUOTES);
                                                                                            ?>"><br>


            <div class="form-group">
                <label for="FirstName">First Name</label>
                <input type="text" class="form-control" name="FirstName" id="FirstName" value="<?php echo htmlspecialchars($FirstName, ENT_QUOTES);
                                                                                                ?>"><br>

                <div class="form-group">
                    <label for="Age">Age</label>
                    <input type="text" class="form-control" name="Age" id="Age" value="<?php echo htmlspecialchars($Age, ENT_QUOTES);
                                                                                        ?>"><br>

                </div>
                <div class="form-group">
                    <label for="City">City</label>
                    <input type="text" class="form-control" name="City" id="City" value="<?php echo htmlspecialchars($City, ENT_QUOTES); ?>"><br>

                    <label for="image">Select image to upload:</label>
                    <input type="file" name="image" id="image">
                    <!-- <input type="submit" name="submit" value="Upload"> -->

                    <input type="submit" name="submit" class="btn btn-primary" value="Register">
    </form>
</main><br>
<section>

</section><br>

<?php
$db->close();
readfile('footer.php');
?>

</html>