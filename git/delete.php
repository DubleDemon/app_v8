<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "magacin";

$isbn =$_POST ['isbn'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    // mysql delete query 
    $query = "DELETE FROM `magacin` WHERE `isbn` = $isbn";
    
  
if ($conn->query($query) === TRUE) {
    
     header('Location: datadel.html');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

?>

