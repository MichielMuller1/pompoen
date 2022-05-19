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

$sql = "SELECT * FROM automatisch, control, pompoen1, pompoen2 where ID = '1'";


 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
		
		//pompoen1
        $row_tijd = $row["tijd"];
        $row_temperatuur = $row["temperatuur"];
        $row_grondvochtigheidslaag1 = $row["grondvochtigheidlaag1"];
        $row_grondvochtigheidslaag2 = $row["grondvochtigheidlaag2"]; 
		
		//pompoen2
        $row_tijd = $row["tijd"];
        $row_temperatuur2 = $row["temperatuur2"];
        $row_grondvochtigheidslaag12 = $row["grondvochtigheidlaag12"];
        $row_grondvochtigheidslaag22 = $row["grondvochtigheidlaag22"]; 
		
		
		//control
		$row_ventilator1 = $row["ventilator1"];
        $row_ventilator2 = $row["ventilator2"];
        $row_raam1 = $row["raam1"];
        $row_raam2 = $row["raam2"]; 
		$row_deur1 = $row["deur1"]; 
		$row_deur2 = $row["deur2"]; 

		
		//automatisch
		$row_ventilator1A = $row["ventilator1A"];
        $row_ventilator2A = $row["ventilator2A"];
        $row_raam1A = $row["raam1A"];
        $row_raam2A = $row["raam2A"]; 
		$row_deur1A = $row["deur1A"]; 
		$row_deur2A = $row["deur2A"]; 
		$row_vat1A = $row["vat1A"];
        $row_vat2A = $row["vat2A"]; 
		$row_vat3A = $row["vat3A"]; 
		$row_lichtA = $row["lichtA"]; 
		

      
		$data = array('tijd' => $row_tijd,
		'ventilator1' => $row_ventilator1, 'ventilator2' => $row_ventilator2, 'raam1' => $row_raam1, 'raam2' => $row_raam2, 'deur1' => $row_deur1,
		'deur2' => $row_deur2,
		'ventilator1A' => $row_ventilator1A, 'ventilator2A' => $row_ventilator2A, 'raam1A' => $row_raam1A, 'raam2A' => $row_raam2A, 'deur1A' => $row_deur1A,
		'deur2A' => $row_deur2A, 'vat1A' => $row_vat1A,'vat2A' => $row_vat2A, 'vat3A' => $row_vat3A, 'lichtA' => $row_lichtA,
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

