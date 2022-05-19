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

$sql = "SELECT * FROM pompoen1, pompoen2";


 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
		
		//pompoen1
        $row_tijd = $row["tijd"];
        $row_temperatuur = $row["temperatuur"];
        $row_grondvochtigheidslaag1 = $row["grondvochtigheidlaag1"];
        $row_grondvochtigheidslaag2 = $row["grondvochtigheidlaag2"]; 
		
		//pompoen2
        $row_temperatuur2 = $row["temperatuur2"];
        $row_grondvochtigheidslaag12 = $row["grondvochtigheidlaag12"];
        $row_grondvochtigheidslaag22 = $row["grondvochtigheidlaag22"]; 
		
		

		

      
		$data = array('tijd' => $row_tijd,
		'temperatuur' => $row_temperatuur, 'grondvochtigheidslaag1' => $row_grondvochtigheidslaag1, 'grondvochtigheidslaag2' => $row_grondvochtigheidslaag1,
		'temperatuur2' => $row_temperatuur2, 'grondvochtigheidslaag12' => $row_grondvochtigheidslaag12, 'grondvochtigheidslaag22' => $row_grondvochtigheidslaag22
		);
		header('Content-type: text/javascript');
		echo json_encode($data);
    }
    $result->free();
}


$conn->close();
?> 

