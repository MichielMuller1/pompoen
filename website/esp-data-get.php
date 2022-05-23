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

$sql = "SELECT * FROM automatisch, control, pompoen1, pompoen2, treshold";


 
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
		
		
		//control
		$row_ventilator1 = $row["ventilator1"];
        $row_ventilator2 = $row["ventilator2"];
        $row_raam1 = $row["raam1"];
        $row_raam2 = $row["raam2"]; 
		$row_deur1 = $row["deur1"]; 
		$row_deur2 = $row["deur2"]; 
		$row_vat1bijvullen = $row["vat1bijvallen"];
		$row_vat1wateren = $row["vat1wateren"];
		$row_vat2bijvullen = $row["vat2bijvallen"];
		$row_vat2wateren = $row["vat2wateren"];
		$row_vat3bijvullen = $row["vat3bijvallen"];
		$row_vat3wateren = $row["vat3wateren"];
		$row_licht = $row["licht"]; 

		
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
	    
	    //tresholds
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
	    	
		

      
		$data = array('tijd' => $row_tijd,
		'ventilator1' => $row_ventilator1, 
		'ventilator2' => $row_ventilator2, 
		'raam1' => $row_raam1, 
		'raam2' => $row_raam2, 
		'deur1' => $row_deur1,
		'deur2' => $row_deur2,
		'vat1bijvullen' => $row_vat1bijvullen,
		'vat1wateren' => $row_vat1wateren,
		'vat2bijvullen' => $row_vat2bijvullen,
		'vat2wateren' => $row_vat2wateren,
		'vat2bijvullen' => $row_vat2bijvullen,
		'vat2wateren' => $row_vat2wateren,
		'ventilator1A' => $row_ventilator1A, 
		'ventilator2A' => $row_ventilator2A, 
		'licht' => $row_licht,
		'raam1A' => $row_raam1A, 
		'raam2A' => $row_raam2A, 
		'deur1A' => $row_deur1A,
		'deur2A' => $row_deur2A, 
		'vat1A' => $row_vat1A,
		'vat2A' => $row_vat2A, 
		'vat3A' => $row_vat3A, 
		'lichtA' => $row_lichtA,
		'temperatuur' => $row_temperatuur, 
		'grondvochtigheidslaag1' => $row_grondvochtigheidslaag1, 
		'grondvochtigheidslaag2' => $row_grondvochtigheidslaag1,
		'temperatuur2' => $row_temperatuur2, 
		'grondvochtigheidslaag12' => $row_grondvochtigheidslaag12, 
		'grondvochtigheidslaag22' => $row_grondvochtigheidslaag22,
			      
		'tempventilator1T' => $row_tempventilator1T, 
		'tempventilator2T' => $row_tempventilator2T, 
		'tempraam1T' => $row_tempraam1T, 
		'tempraam2T' =>  $row_tempraam2T,
		'tempdeur1T' => $row_tempdeur1T, 
		'tempdeur2T' => $row_tempdeur2T, 
		'minvat1T' => $minvat1T, 
		'maxvat1T' => $row_maxvat1T, 
		'minvat2T' => $row_minvat2T, 
		'rmaxvat2T' => $row_maxvat2T, 
		'row_minvat3T' => $row_minvat3T, 
		'maxvat3T' => $row_maxvat3T, 
		'grondvochtigheid1laag1T' => $row_grondvochtigheid1laag1T, 
		'grondvochtigheid1laag2T' => $row_grondvochtigheid1laag2T,
		'grondvochtigheid1laag12T' => $row_grondvochtigheid1laag12T, 
		'grondvochtigheid1laag22T' => $row_grondvochtigheid1laag22T,
		'lichtT' = $row_lichtT, 
		'lichtkleurT' => $row_lichtkleurT
			     
			     
			     );
		header('Content-type: text/javascript');
		echo json_encode($data);
    }
    $result->free();
}


$conn->close();
?> 

