<?php
//start session
session_start();

$_SESSION = array();

//now we take our hammer and destroy the session haha!
session_destroy();

header("location: login.php");
exit;

?>