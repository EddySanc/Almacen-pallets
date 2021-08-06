<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$database = "indbound";
*/
define('NUM_ITEMS_BY_PAGE', 5);

$username = "contro61_admin";
$password = "TWFy6W%~et5L";
$database = "contro61_proyecto";


//creating a new connection object using mysqli 
$conn = new mysqli($servername, $username, $password, $database);

//if there is some error connecting to the database
//with die we will stop the further execution by displaying a message causing the error 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>