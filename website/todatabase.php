<?php

session_start();
$ventilator1 = $_POST["ventilator1"];
echo $ventilator1 . "\n";

$ventilator2 = $_POST["ventilator2"];
echo $ventilator2 . "\n";

$raam1 = $_POST["raam1"];
echo $raam1 . "\n";

$raam2 = $_POST["raam2"];
echo $raam2 . "\n";

$deur1 = $_POST["deur1"];
echo $deur1 . "\n";
$deur2 = $_POST["deur2"];
echo $deur2 . "\n";

$vat1 = $_POST["vat1"];
echo $vat1 . "\n";

$vat2 = $_POST["vat2"];
echo $vat2 . "\n";

$grondvochtigheid1 = $_POST["grondvochtigheid1"];
echo $grondvochtigheid1 . "\n";

$grondvochtigheid2 = $_POST["grondvochtigheid2"];
echo $grondvochtigheid2 . "\n";

$licht = $_POST["licht"];
echo $licht . "\n";

$sName = "192.168.56.5";
$uName = "root";
$pass = "ITF";
$db_name = "pompoen";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//    $sql = "DELETE FROM threshold WHERE id=1";
//    $conn->exec($sql);
//
//
//    $sql = "INSERT INTO threshold (ventilator1, ventilator2) VALUES ($ventilator1, $ventilator2)";
//    $conn->exec($sql);


    $stmt = $conn->prepare("select * from threshold where id=1");
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (!empty($result)){//only delete when there is something in the database
        $sql = "DELETE FROM threshold WHERE id=1";
        $conn->exec($sql);
    }

    //insert all the values into the database
    $sql = "INSERT INTO threshold (ventilator1, ventilator2) VALUES ($ventilator1, $ventilator2)";
    $conn->exec($sql);


    //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


//    print_r($result);
//    echo $result[0][1] . "   " . $result[0][2];
//    $_SESSION['ventilator1'] = $result[0][1];


} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}

