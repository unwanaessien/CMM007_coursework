<?php
/* This page will help create a connection to the database using PDO */
/*Database Credentials go below here*/


$dbHost="localhost";			//MySQL host
$dbUser="cm007";			//MySQL username
$dbPassword="cm007";		//MySQL user password
$dbDatabase="cm007";

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'cm007');
define('DB_PASSWORD', 'cm007');
define('DB_NAME', 'cm007');
/*Connect to Database*/
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    //Set the PDO error mode to exception
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    die("ERROR:Could not connect. " . $e->getMessage());
}

?>