<?php
$servername = "localhost";
$username = "pdtz2d";
$password = "guardareventos";
$dbname = "pdtz_events";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>