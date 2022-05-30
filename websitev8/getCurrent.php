<?php

$sName = "192.168.56.5";
$uName = "root";
$pass = "ITF";

//$sName = "localhost";
//$uName = "pi";
//$pass = "raspberry";
$db_name = "pompoen";
$port = 3306;

try {
$conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("select * from threshold where id=( SELECT MAX(id) FROM threshold )");
    $stmt->execute();
    $result = $stmt->fetchAll();
//    print_r($result);
//    echo $result[0][1] . "   " . $result[0][2];
    if (!empty($result)){
        $_SESSION['ventilator1'] = $result[0][2];
        $_SESSION['ventilator2'] = $result[0][3];
    }else{
        $_SESSION['ventilator1'] = 0;
        $_SESSION['ventilator2'] = 0;
    }



} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}