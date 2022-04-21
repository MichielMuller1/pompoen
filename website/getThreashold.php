<?php
$sName = "192.168.56.5";
$uName = "root";
$pass = "ITF";
$db_name = "pompoen";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("select * from threshold");
    $stmt->execute();
    $result = $stmt->fetchAll();
//    print_r($result);
//    echo $result[0][1] . "   " . $result[0][2];

    if (!empty($result)){
        $_SESSION['ventilator1'] = $result[0][2];
        $_SESSION['ventilator2'] = $result[0][3];
        $_SESSION['raam1'] = $result[0][4];
        $_SESSION['raam2'] = $result[0][5];
        $_SESSION['deur1'] = $result[0][6];
        $_SESSION['deur2'] = $result[0][7];
        $_SESSION['vat1min'] = $result[0][8];
        $_SESSION['vat1max'] = $result[0][9];
        $_SESSION['vat2min'] = $result[0][10];
        $_SESSION['vat2max'] = $result[0][11];

        $_SESSION['grondvochtigheid1'] = $result[0][12];
        $_SESSION['grondvochtigheid2'] = $result[0][13];
        $_SESSION['licht'] = $result[0][14];

    }else{
        $_SESSION['ventilator1'] = 0;
        $_SESSION['ventilator2'] = 0;
        $_SESSION['raam1'] = 0;
        $_SESSION['raam2'] = 0;
        $_SESSION['deur1'] = 0;
        $_SESSION['deur2'] = 0;
        $_SESSION['vat1min'] = 0;
        $_SESSION['vat1max'] = 0;
        $_SESSION['vat2min'] = 0;
        $_SESSION['vat2max'] = 0;

        $_SESSION['grondvochtigheid1'] = 0;
        $_SESSION['grondvochtigheid2'] = 0;
        $_SESSION['licht'] = 0;
    }



} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}