<?php

//$sName = "192.168.56.5";
//$uName = "root";
//$pass = "ITF";
$sName = "localhost";
$uName = "pi";
$pass = "raspberry";
$db_name = "pompoen";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("select * from gewicht order by ID desc limit 0,1");
    $stmt->execute();
    $result = $stmt->fetchAll();

    $stmt = $conn->prepare("select * from `pompoen1` order by ID desc limit 0,1");
    $stmt->execute();
    $result2 = $stmt->fetchAll();

    $stmt = $conn->prepare("select * from `pompoen2` order by ID desc limit 0,1");
    $stmt->execute();
    $result3 = $stmt->fetchAll();

    $stmt = $conn->prepare("select * from `serre` order by ID desc limit 0,1");
    $stmt->execute();
    $result4 = $stmt->fetchAll();

//    print_r($result);
//    print_r($result2);
//    print_r($result3);
//    print_r($result4);

    if (!empty($result)) {
        $_SESSION['gewichtTijd'] = $result[0][1];
        $_SESSION['gewicht1'] = $result[0][2];
        $_SESSION['gewicht2'] = $result[0][3];
    }else{
        $_SESSION['gewichtTijd'] = 0;
        $_SESSION['gewicht1'] = 0;
        $_SESSION['gewicht2'] = 0;
    }

    if (!empty($result2)) {
        $_SESSION['temperatuur1'] = $result2[0][2];
        $_SESSION['grondvocht1L1'] = $result2[0][3];
        $_SESSION['grondvocht1L2'] = $result2[0][4];
    }else{
        $_SESSION['temperatuur1'] = 0;
        $_SESSION['grondvocht1L1'] = 0;
        $_SESSION['grondvocht1L2'] = 0;
    }

    if (!empty($result3)) {
        $_SESSION['temperatuur2'] = $result3[0][2];
        $_SESSION['grondvocht2L1'] = $result3[0][3];
        $_SESSION['grondvocht2L2'] = $result3[0][4];
    }else{
        $_SESSION['temperatuur2'] = 0;
        $_SESSION['grondvocht2L1'] = 0;
        $_SESSION['grondvocht2L2'] = 0;
    }

    if (!empty($result4)) {
        $_SESSION['lichtsterkte'] = $result4[0][6];
        $_SESSION['co2'] = $result4[0][7];
        $_SESSION['luchtvochtigheid'] = $result4[0][8];
        $_SESSION['regenStatus'] = $result4[0][9];
    }else{
        $_SESSION['lichtsterkte'] = 0;
        $_SESSION['co2'] = 0;
        $_SESSION['luchtvochtigheid'] = 0;
        $_SESSION['regenStatus'] = 0;
    }





} catch (PDOException $e) {
echo " database error " . $e->getMessage();
}