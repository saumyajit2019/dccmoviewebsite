<?php
    $servername = "sql6.freemysqlhosting.net";
    $username = "sql6420459";
    $password = "WEmetzRCe2";
    $dbname = "sql6420459";

$complex = $_POST["complex_chosen"]; 
$screen_id = $_POST["screen_id"];  
$max_seats = $_POST["max_seats"]; 
$screen_size = $_POST["screen_size"];  

 


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
$update = "UPDATE Theatre SET max_seats = '$max_seats', screen_size = '$screen_size' where name = '$complex' and screen_id = '$screen_id'";


if ($conn->multi_query($update) === TRUE) {
    echo "Updated successfully";
    header('Location: ../admin/admin.php'); 
} else {
    echo "Error: " . $update . "<br>" . $conn->error;
}

$conn->close();
?>