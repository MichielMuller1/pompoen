<?php
$sName = "192.168.56.5";
$uName = "root";
$pass = "ITF";
$db_name = "pompoen";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //threshold waardes uit database halen
    $stmt = $conn->prepare("select * from threshold");
    $stmt->execute();
    $result = $stmt->fetchAll();

    $stmt = $conn->prepare("select * from automatisch");
    $stmt->execute();
    $result2 = $stmt->fetchAll();
    print_r($result2);
//    echo $result[0][1] . "   " . $result[0][2];
    if (!empty($result2)){
        $_SESSION['ventilator1Auto'] = $result2[0][2];
        $_SESSION['ventilator2Auto'] = $result2[0][3];
        $_SESSION['raam1Auto'] = $result2[0][4];
        $_SESSION['raam2Auto'] = $result2[0][5];
        $_SESSION['deur1Auto'] = $result2[0][6];
        $_SESSION['deur2Auto'] = $result2[0][7];
        $_SESSION['vat1Auto'] = $result2[0][8];
        $_SESSION['vat2Auto'] = $result2[0][9];
        $_SESSION['vat3Auto'] = $result2[0][10];
        $_SESSION['lichtAuto'] = $result2[0][11];
    }else{
        $_SESSION['ventilator1Auto'] = 0;
        $_SESSION['ventilator2Auto'] = 0;
        $_SESSION['raam1Auto'] = 0;
        $_SESSION['raam2Auto'] = 0;
        $_SESSION['deur1Auto'] = 0;
        $_SESSION['deur2Auto'] = 0;
        $_SESSION['vat1Auto'] = 0;
        $_SESSION['vat2Auto'] = 0;
        $_SESSION['vat3Auto'] = 0;
        $_SESSION['lichtAuto'] = 0;
    }

    if (!empty($result)){
        //waardes in variablen steken
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
        $_SESSION['vat3min'] = $result[0][12];
        $_SESSION['vat3max'] = $result[0][13];

        $_SESSION['grond1laag1'] = $result[0][14];
        $_SESSION['grond1laag2'] = $result[0][15];
        $_SESSION['grond2laag1'] = $result[0][16];
        $_SESSION['grond2laag2'] = $result[0][17];
        $_SESSION['licht'] = $result[0][18];
        $_SESSION['lichtkleur'] = $result[0][19];

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
        $_SESSION['vat3min'] = 0;
        $_SESSION['vat3max'] = 0;

        $_SESSION['grond1laag1'] = 0;
        $_SESSION['grond1laag2'] = 0;
        $_SESSION['grond2laag1'] = 0;
        $_SESSION['grond2laag1'] = 0;
        $_SESSION['licht'] = 0;
        $_SESSION['lichtkleur'] = 0;
    }



} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}