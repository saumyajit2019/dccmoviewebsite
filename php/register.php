<?php
//$servername = "127.0.0.1";
//$username = "root";
//$password = "";
//$dbname = "complexdb";

$servername = "sql5.freemysqlhosting.net";
$username = "sql5417363";
$password = "iHGmEHhNRn";
$dbname = "sql5417363";

$fname = $_POST["fname"]; 
$lname = $_POST["lname"]; 
$email = $_POST["email"]; 
$phonenumber = $_POST["phone_number"]; 
$password1 =  $_POST["password1"];
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
 
$sql = "select max(member_id) from Member";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $nextmemberid = mysqli_fetch_array($result)['max(member_id)'] + 1;
}

else {
    $nextmemberid = 1;
}


$sql = "insert into User_Account (email, _password, fname, lname, street_name, street_num,postal_code, phone_number) values
('$email','$password1','$fname','$lname','$streetname','$streetnumber','$postalcode','$phonenumber');";


$sql .= "insert into Member (member_id, email, card_number, card_expiry) values
($nextmemberid, '$email','$creditcardnumber','$expiration');";



if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
    header('Location: ../pages/index.html?success'); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
