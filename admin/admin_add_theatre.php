<?php
    $servername = "sql6.freemysqlhosting.net";
    $username = "sql6420459";
    $password = "WEmetzRCe2";
    $dbname = "sql6420459";

$complex_name = $_POST["complex_chosen"]; 
$screen_id = $_POST["screen_id"]; 
$max_seats = $_POST["max_seats"]; 
$screen_size = $_POST["screen_size"]; 


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "insert into Theatre (name, screen_id, max_seats, screen_size) values
('$complex_name','$screen_id', '$max_seats','$screen_size')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
    header('Location: ../admin/admin.php'); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
