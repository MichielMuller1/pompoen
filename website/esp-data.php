<?php


$servername = "localhost";

// REPLACE with your Database name
$dbname = "pompoen";
// REPLACE with Database user
$username = "pi";
// REPLACE with Database user password
$password = "raspberry";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM pompoen1 WHERE id = '1'";


 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_ID = $row["ID"];
        $row_tijd = $row["tijd"];
        $row_temperatuur = $row["temperatuur"];
        $row_grondvochtigheidslaag1 = $row["grondvochtigheidlaag1"];
        $row_grondvochtigheidslaag2 = $row["grondvochtigheidlaag2"]; 

        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
		$data = array('ID' => $row_ID, 'tijd' => $row_tijd, 'temperatuur' => $row_temperatuur, 'grondvochtigheidslaag2' => $row_grondvochtigheidslaag1, 'grondvochtigheidslaag2' => $row_grondvochtigheidslaag1);
		header('Content-type: text/javascript');
		echo json_encode($data);
    }
    $result->free();
}

$conn->close();
?> 

