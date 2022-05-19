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

$sql = "SELECT * FROM pompoen1, automatisch";


 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_tijd = $row["tijd"];
        $row_temperatuur = $row["temperatuur"];
        $row_grondvochtigheidslaag1 = $row["grondvochtigheidlaag1"];
        $row_grondvochtigheidslaag2 = $row["grondvochtigheidlaag2"]; 
		$row_ventilator1 = $row["ventilator1"];
        $row_ventilator2 = $row["ventilator2"];
        $row_raam1 = $row["raam1"];
        $row_raam2 = $row["raam2"]; 
		$row_deur1 = $row["deur1"]; 
		$row_deur2 = $row["deur2"]; 
		$row_vat1 = $row["vat1"];
        $row_vat2 = $row["vat2"]; 
		$row_vat3 = $row["vat3"]; 
		$row_licht = $row["licht"]; 
		

      
		$data = array('tijd' => $row_tijd, 'temperatuur' => $row_temperatuur, 'grondvochtigheidslaag1' => $row_grondvochtigheidslaag1, 'grondvochtigheidslaag2' => $row_grondvochtigheidslaag1
		 'ventilator1' => $row_ventilator1, 'ventilator2' => $row_ventilator2, 'raam1' => $row_raam1, 'raam2' => $row_raam2, 'deur1' => $row_deur1, 'deur2' => $row_deur2, 'vat1' => $row_vat1, 
		 'vat2' => $row_vat2, 'vat3' => $row_vat3, 'licht' => $row_licht);
		header('Content-type: text/javascript');
		echo json_encode($data);
    }
    $result->free();
}


$conn->close();
?> 

