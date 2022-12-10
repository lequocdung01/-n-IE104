<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopgiaytot";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn) {
    mysqli_query($conn, "SET NAMES 'utf8'");
} else {
    echo "thất bại" . mysqli_connect_error();
}
?>