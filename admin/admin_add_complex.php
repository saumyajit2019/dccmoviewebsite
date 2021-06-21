<?php
$servername = "sql6.freemysqlhosting.net";
$username = "sql6420459";
$password = "WEmetzRCe2";
$dbname = "sql6420459";

$complex_name = $_POST["complex_name"]; 
$phone_num = $_POST["phone_num"]; 
$street_number = $_POST["street_number"]; 
$street_name = $_POST["street_name"]; 
$postal_code =  $_POST["postal_code"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 


$sql = "insert into Theatre_Complex (name, street_name, street_number, postal_code, phone_number) values
('$complex_name','$street_number','$street_name','$postal_code', '$phone_num');";


if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
    header('Location: ../admin/admin.php'); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
