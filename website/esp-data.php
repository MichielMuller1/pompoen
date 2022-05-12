<!DOCTYPE html>
<html><body>
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

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>tijd</td> 
        <td>temperatuur</td> 
        <td>grondvochtigheidslaag1</td> 
        <td>grondvochtigheidslaag2</td>

      </tr>';
 
if ($result = $conn->query($sql)) {
    echo("test");
    while ($row = $result->fetch_assoc()) {
      echo("test2");
        $row_ID = $row["ID"];
        $row_tijd = $row["tijd"];
        $row_temperatuur = $row["temperatuur"];
        $row_grondvochtigheidslaag1 = $row["grondvochtigheidlaag1"];
        $row_grondvochtigheidslaag2 = $row["grondvochtigheidlaag2"]; 

        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_ID . '</td> 
                <td>' . $row_tijd . '</td> 
                <td>' . $row_temperatuur . '</td> 
                <td>' . $row_grondvochtigheidslaag1 . '</td> 
                <td>' . $row_grondvochtigheidslaag2 . '</td>
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>
