<?php

session_start();

if (isset($_POST['gewicht1'])){
    $gewicht1 = $_POST['gewicht1'];
    echo $gewicht1;
}

if (isset($_POST['gewicht2'])){
    $gewicht2 = $_POST['gewicht2'];
    echo $gewicht2;
}

$sName = "192.168.56.5";
$uName = "root";
$pass = "ITF";
$db_name = "pompoen";
$port = 3306;

date_default_timezone_set("Europe/Brussels");
$tijd = date('Y-m-d H:i:s');
echo $tijd;

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['gewicht1'])){
        $sql = "UPDATE `gewicht` SET `tijd` = '$tijd', `gewicht p1`= $gewicht1 WHERE `ID` = 1;";
        $conn->exec($sql);
    }
    if (isset($_POST['gewicht2'])){
        $sql = "UPDATE `gewicht` SET `tijd` = '$tijd', `gewicht p2`= $gewicht2 WHERE `ID` = 1;";
        $conn->exec($sql);
    }


} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}
//header("Location: status.php");
