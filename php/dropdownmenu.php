<?php
//$servername = "127.0.0.1";
//$username = "root";
//$password = "";
//$dbname = "complexdb";

$servername = "sql6.freemysqlhosting.net";
$username = "sql6420440";
$password = "2nACQE9ElP";
$dbname = "sql6420440";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 

    $result = $conn->query("select title, rating from Movie");
    
    echo "<html>";
    echo "<body>";
    echo "<select name='id'>";
    
    while ($row = $result->fetch_assoc()) {
                  unset($id, $name);
                  $title = $row['title'];
                  $rating = $row['rating']; 
                  echo '<option value="'.$rating.'">'.$title . ' ' . $rating.'</option>';
                 
    }

    echo "</select>";
    echo "</body>";
    echo "</html>";
?>
