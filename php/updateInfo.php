<?php
session_start();
//$servername = "127.0.0.1";
//$username = "root";
//$password = "";
//$dbname = "complexdb";

$servername = "sql6.freemysqlhosting.net";
$username = "sql6420459";
$password = "WEmetzRCe2";
$dbname = "sql6420459";
$user_id = $_SESSION["user_id"];
$email_start = $_SESSION["email"];

$fname = $_POST["fname"]; 
$lname = $_POST["lname"];  
$phonenumber = $_POST["phone_number"]; 
$password1 =  $_POST["password"];
$confirmpassword = $_POST["password2"]; 
$streetnumber = $_POST["street_number"]; 
$streetname = $_POST["street_name"]; 
$postalcode = $_POST["postal_code"]; 
$nameoncard = $_POST["cc_name"]; 
$creditcardnumber = $_POST["cc_number"];  
$expiration = $_POST["cc_exp"]; 
 


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
$update = "UPDATE User_Account SET _password='$password1', fname = '$fname', lname = '$lname', street_num = $streetnumber, street_name = '$streetname', postal_code = '$postalcode', phone_number = '$phonenumber' where email = '$email_start';";



/*
$update .= "UPDATE Member SET email='$email', card_expiry = '$expiration', card_number = '$creditcardnumber' where member_id'$user_id'";
*/ 

if ($conn->multi_query($update) === TRUE) {
    echo "Updated successfully";
    header('Location: ../php/home.php'); 
} else {
    echo "Error: " . $update . "<br>" . $conn->error;
}

$conn->close();
?>