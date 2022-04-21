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

$vat1MIN = $_POST["vat1MIN"];
echo $vat1MIN . "\n";

$vat1MAX = $_POST["vat1MAX"];
echo $vat1MAX . "\n";

$vat2MIN = $_POST["vat2MIN"];
echo $vat2MIN . "\n";

$vat2MAX = $_POST["vat2MAX"];
echo $vat2MAX . "\n";

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

    $tijd = date('Y-m-d H:i:s');
    echo $tijd;


    //'2022-02-01 15:30:15'

    //insert all the values into the database
    $sql = "INSERT INTO `threshold` (`ID`, `tijd`, `temp ventilator 1`, `temp ventilator 2`, `temp raam 1`, `temp raam 2`, `temp deur 1`, `temp deur 2`, `min vat 1`, `max vat 1`, `min vat 2`, `max vat 2`, `grondvochtigheid 1`, `grondvochtigheid 2`, `licht`) VALUES (1,'$tijd',$ventilator1, $ventilator2,$raam1,$raam2,$deur1,$deur2,$vat1MIN,$vat1MAX,$vat2MIN,$vat2MAX,$grondvochtigheid1,$grondvochtigheid2,$licht)";
    $conn->exec($sql);


    //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


//    print_r($result);
//    echo $result[0][1] . "   " . $result[0][2];
//    $_SESSION['ventilator1'] = $result[0][1];


} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}

