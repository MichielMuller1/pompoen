<?php

session_start();

$sName = "localhost";
$uName = "pi";
$pass = "raspberry";
$db_name = "pompoen";
$port = 3306;

date_default_timezone_set("Europe/Brussels");
$tijd = date('Y-m-d H:i:s');
echo $tijd;

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("select * from gewicht order by ID desc limit 0,1");
    $stmt->execute();
    $result = $stmt->fetchAll();
    print_r($result);

    if (!empty($result)) {
        $gewicht1= $result[0][2];
        $gewicht2 = $result[0][3];
    }else{
        $gewicht1 = 0;
        $gewicht2 = 0;
    }

    if (isset($_POST['gewicht1'])){
        $gewicht1 = $_POST['gewicht1'];
        echo $gewicht1;
    }

    if (isset($_POST['gewicht2'])){
        $gewicht2 = $_POST['gewicht2'];
        echo $gewicht2;
    }


    if (isset($_POST['gewicht1'])){
        $sql = "INSERT INTO `gewicht` (`tijd`,`gewichtp1`,`gewichtp2`) VALUES ('$tijd', $gewicht1,$gewicht2)";
        $conn->exec($sql);
    }
//    if (isset($_POST['gewicht2'])){
//        $sql = "UPDATE `gewicht` SET `tijd` = '$tijd', `gewicht p2`= $gewicht2 WHERE `ID` = 1;";
//        $conn->exec($sql);
//    }


} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}
header("Location: status.php");
