<?php



$servername = "localhost";

// REPLACE with your Database name
$dbname = "pompoen";
// REPLACE with Database user
$username = "pi";
// REPLACE with Database user password
$password = "raspberry";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. 
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $temp = $hum = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $api_key = test_input($_POST["api_key"]);
//     if($api_key == $api_key_value) {
//         $temp = test_input($_POST["temp"]);
//         $hum = test_input($_POST["hum"]);
$temp = 155;
        $hum = 3000;

        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO pompoen1 (temperatuur, grondvochtigheidlaag1, grondvochtigheidlaag2) VALUES ('" .$temp. "', '" .$hum."', '".$hum."')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
//     }
//     else {
//         echo "Wrong API Key provided.";
//     }

// }
// else {
//     echo "No data posted with HTTP POST.";
// }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
