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

$sql = "SELECT * FROM automatisch, controls, pompoen1, pompoen2, threshold, water, weersvoorspelling";


 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_tijd = $row["tijd"];
        $row_temperatuur = $row["temperatuur"];
		$row_luchtvochtigheid = $row["luchtvochtigheid"];
        $row_grondvochtigheidlaag1 = $row["grondvochtigheidlaag1"];
        $row_grondvochtigheidlaag2 = $row["grondvochtigheidlaag2"]; 
        $row_temperatuur2 = $row["temperatuur2"];
		$row_luchtvochtigheid2 = $row["luchtvochtigheid2"];
        $row_grondvochtigheidlaag12 = $row["grondvochtigheidlaag12"];
        $row_grondvochtigheidlaag22 = $row["grondvochtigheidlaag22"]; 
	$row_ventilator1 = $row["ventilator1"];
    $row_ventilator2 = $row["ventilator2"];
    $row_raam1 = $row["raam1"];
    $row_raam2 = $row["raam2"]; 
	$row_deur1 = $row["deur1"]; 
	$row_deur2 = $row["deur2"]; 
	$row_tijdvat1 = $row["tijdvat1"];
	$row_vat1waterenc = $row["vat1wateren"];
	$row_tijdvat2 = $row["tijdvat2"];
	$row_vat2waterenc = $row["vat2wateren"];
	$row_tijdvat3 = $row["tijdvat3"];
	$row_vat3waterenc = $row["vat3wateren"];
	$row_lichtc = $row["licht"]; 
	$row_ventilator1A = $row["ventilator1A"];
    $row_ventilator2A = $row["ventilator2A"];
    $row_raam1A = $row["raam1A"];
    $row_raam2A = $row["raam2A"]; 
	$row_deur1A = $row["deur1A"]; 
	$row_deur2A = $row["deur2A"];
	$row_lichtA = $row["lichtA"]; 	
	$row_vat1A = $row["vat1A"];
    $row_vat2A = $row["vat2A"]; 
	$row_vat3A = $row["vat3A"];
	$row_tijdvat1A = $row["vat1A"];
    $row_tijdvat2A = $row["vat2A"]; 
	$row_tijdvat3A = $row["vat3A"];
	 $row_tempventilator1T = $row["tempventilator1T"];
	 $row_tempventilator2T = $row["tempventilator2T"];
	 $row_tempraam1T = $row["tempraam1T"];
	 $row_tempraam2T = $row["tempraam2T"];
	 $row_tempdeur1T = $row["tempdeur1T"];
	 $row_tempdeur2T = $row["tempdeur2T"];
	 $row_minvat1T = $row["minvat1T"];
	 $row_maxvat1T = $row["maxvat1T"];
	 $row_minvat2T = $row["minvat2T"];
	 $row_maxvat2T = $row["maxvat2T"];
	 $row_minvat3T = $row["minvat3T"];
	 $row_maxvat3T = $row["maxvat3T"];
	 $row_grondvochtigheid1laag1T = $row["grondvochtigheid1laag1T"];
	 $row_grondvochtigheid1laag2T = $row["grondvochtigheid1laag2T"];
	 $row_grondvochtigheid2laag12T = $row["grondvochtigheid2laag12T"];
	 $row_grondvochtigheid2laag22T = $row["grondvochtigheid2laag22T"];
	 $row_lichtT = $row["lichtT"];
	 $row_lichtkleurT = $row["lichtkleurT"];
	$row_waterlevelvat1 = $row["waterlevelvat1"];
	$row_waterlevelvat2 = $row["waterlevelvat2"];
	$row_waterlevelvat3 = $row["waterlevelvat3"];
	$row_roerder = $row["roerder"];
	$row_cyclus1A = $row["cyclus1A"];
	$row_cyclus2A = $row["cyclus2A"];
	$row_cyclus12A = $row["cyclus12A"];
	$row_cyclus22A = $row["cyclus22A"];
	$row_cyclus13A = $row["cyclus13A"];
	$row_cyclus23A = $row["cyclus23A"];
	$row_vat2controlcyclus = $row["vat1controlcyclus"];
	$row_vat1controlcyclus = $row["vat2controlcyclus"];
	$row_voorspelling = $row["voorspelling"];
	$row_regenstatus = $row["regenstatus"];

      
	  
	  
		
		
		
		
		
		
		$data = array(
		'tijd' => $row_tijd,
		'ventilator1' => $row_ventilator1, 
		'ventilator2' => $row_ventilator2, 
		'raam1' => $row_raam1, 
		'raam2' => $row_raam2, 
		'deur1' => $row_deur1,
		'deur2' => $row_deur2,
		'tijdvat1' => $row_tijdvat1,
		'vat1wateren' => $row_vat1waterenc,
		'tijdvat2' => $row_tijdvat2,
		'vat2wateren' => $row_vat2waterenc,
		'tijdvat3' => $row_tijdvat3,
		'vat3wateren' => $row_vat3waterenc,
		'licht' => $row_lichtc,
		'ventilator1A' => $row_ventilator1A, 
		'ventilator2A' => $row_ventilator2A, 
		'raam1A' => $row_raam1A, 
		'raam2A' => $row_raam2A, 
		'deur1A' => $row_deur1A,
		'deur2A' => $row_deur2A, 
		'vat1A' => $row_vat1A,
		'vat2A' => $row_vat2A, 
		'vat3A' => $row_vat3A, 
		'tijdvat1A' => $row_tijdvat1A,
		'tijdvat2A' => $row_tijdvat2A,
		'tijdvat3A' => $row_tijdvat3A,
		'cyclus1A' => $row_cyclus1A,
		'cyclus2A' => $row_cyclus2A,
		'lichtA' => $row_lichtA,
		'temperatuur' => $row_temperatuur,
		'luchtvochtigheid' => $row_luchtvochtigheid,		
		'grondvochtigheidslaag1' => $row_grondvochtigheidlaag1, 
		'grondvochtigheidslaag2' => $row_grondvochtigheidlaag2,
		'temperatuur2' => $row_temperatuur2, 
		'luchtvochtigheid2' => $row_luchtvochtigheid2,		
		'grondvochtigheidslaag12' => $row_grondvochtigheidlaag12, 
		'grondvochtigheidslaag22' => $row_grondvochtigheidlaag22,
		'tempventilator1T' => $row_tempventilator1T, 
		'tempventilator2T' => $row_tempventilator2T, 
		'tempraam1T' => $row_tempraam1T, 
		'tempraam2T' => $row_tempraam2T,
		'tempdeur1T' => $row_tempdeur1T, 
		'tempdeur2T' => $row_tempdeur2T, 
		'minvat1T' => $row_minvat1T, 
		'maxvat1T' => $row_maxvat1T, 
		'minvat2T' => $row_minvat2T, 
		'maxvat2T' => $row_maxvat2T, 
		'minvat3T' => $row_minvat3T, 
		'maxvat3T' => $row_maxvat3T,
		'grondvochtigheid1laag1T' => $row_grondvochtigheid1laag1T, 
		'grondvochtigheid1laag2T' => $row_grondvochtigheid1laag2T,
		'grondvochtigheid1laag12T' => $row_grondvochtigheid2laag12T, 
		'grondvochtigheid1laag22T' => $row_grondvochtigheid2laag22T,
		'lichtT' => $row_lichtT, 
		'lichtkleurT' => $row_lichtkleurT,
		'waterlevelvat1' => $row_waterlevelvat1,
		'waterlevelvat2' => $row_waterlevelvat2,
		'waterlevelvat3' => $row_waterlevelvat3,
		'roerder' => $row_roerder,
		'cyclus1A' => $row_cyclus1A,
		'cyclus2A' => $row_cyclus2A,
		'cyclus12A' => $row_cyclus12A,
		'cyclus22A' => $row_cyclus22A,
		'cyclus13A' => $row_cyclus13A,
		'cyclus23A' => $row_cyclus23A,
		'vat1controlcyclus' => $row_vat1controlcyclus,
		'vat2controlcyclus' => $row_vat2controlcyclus,
		'voorspelling' => $row_voorspelling,
		'regenstatus' => $row_regenstatus
			     );
		header('Content-type: text/javascript');
		echo json_encode($data);
    }
    $result->free();
}


$conn->close();
