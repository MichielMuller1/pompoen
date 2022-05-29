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
    //threshold waardes uit database halen
    $stmt = $conn->prepare("select * from threshold");
    $stmt->execute();
    $result = $stmt->fetchAll();


    $stmt = $conn->prepare("select * from automatisch");
    $stmt->execute();
    $result2 = $stmt->fetchAll();

    $stmt = $conn->prepare("select * from controls");
    $stmt->execute();
    $result3 = $stmt->fetchAll();
//    print_r($result2);
//    echo $result[0][1] . "   " . $result[0][2];
    if (!empty($result3)){
        $_SESSION['ventilator1ONOFF'] = $result3[0][2];
        $_SESSION['ventilator2ONOFF'] = $result3[0][3];
        $_SESSION['raam1ONOFF'] = $result3[0][4];
        $_SESSION['raam2ONOFF'] = $result3[0][5];
        $_SESSION['deur1ONOFF'] = $result3[0][6];
        $_SESSION['deur2ONOFF'] = $result3[0][7];
        $_SESSION['tijdvat1'] = $result3[0][8];
        $_SESSION['vat1wateren'] = $result3[0][9];
        $_SESSION['tijdvat2'] = $result3[0][10];
        $_SESSION['vat2wateren'] = $result3[0][11];
        $_SESSION['tijdvat3'] = $result3[0][12];
        $_SESSION['vat3wateren'] = $result3[0][13];
        $_SESSION['lichtONOFF'] = $result3[0][14];
    }else{
        $_SESSION['ventilator1ONOFF'] = 0;
        $_SESSION['ventilator2ONOFF'] = 0;
        $_SESSION['raam1ONOFF'] = 0;
        $_SESSION['raam2ONOFF'] = 0;
        $_SESSION['deur1ONOFF'] = 0;
        $_SESSION['deur2ONOFF'] = 0;
        $_SESSION['tijdvat1'] = 0;
        $_SESSION['vat1wateren'] = 0;
        $_SESSION['tijdvat2'] = 0;
        $_SESSION['vat2wateren'] = 0;
        $_SESSION['tijdvat3'] = 0;
        $_SESSION['vat3wateren'] = 0;
        $_SESSION['lichtONOFF'] = 0;
    }

    if (!empty($result2)){
        $_SESSION['ventilator1Auto'] = $result2[0][2];
        $_SESSION['ventilator2Auto'] = $result2[0][3];
        $_SESSION['raam1Auto'] = $result2[0][4];
        $_SESSION['raam2Auto'] = $result2[0][5];
        $_SESSION['deur1Auto'] = $result2[0][6];
        $_SESSION['deur2Auto'] = $result2[0][7];
        $_SESSION['lichtAuto'] = $result [0][8];
        $_SESSION['vat1Auto'] = $result2[0][9];
        $_SESSION['vat2Auto'] = $result2[0][10];
        $_SESSION['vat3Auto'] = $result2[0][11];
        $_SESSION['tijdvat1A'] = $result2[0][12];
        $_SESSION['tijdvat2A'] = $result2[0][13];
        $_SESSION['tijdvat3A'] = $result2[0][14];
        $_SESSION['cyclus1A'] = $result2[0][15];
        $_SESSION['cyclus1Astart'] = $result2[0][16];
        $_SESSION['cyclus2A'] = $result2[0][17];
        $_SESSION['cyclus2Astart'] = $result2[0][18];
        $_SESSION['cyclus12A'] = $result2[0][19];
        $_SESSION['cyclus12Astart'] = $result2[0][20];
        $_SESSION['cyclus22A'] = $result2[0][21];
        $_SESSION['cyclus22Astart'] = $result2[0][22];
        $_SESSION['cyclus13A'] = $result2[0][23];
        $_SESSION['cyclus13Astart'] = $result2[0][24];
        $_SESSION['cyclus23A'] = $result2[0][25];
        $_SESSION['cyclus23Astart'] = $result2[0][26];

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
        $_SESSION['tijdvat1A'] =0;
        $_SESSION['tijdvat2A'] = 0;
        $_SESSION['tijdvat3A'] = 0;
        $_SESSION['cyclus1A'] = 0;
        $_SESSION['cyclus1Astart'] = 0;
        $_SESSION['cyclus2A'] = 0;
        $_SESSION['cyclus2Astart'] = 0;
        $_SESSION['cyclus12A'] = 0;
        $_SESSION['cyclus12Astart'] = 0;
        $_SESSION['cyclus22A'] = 0;
        $_SESSION['cyclus22Astart'] = 0;
        $_SESSION['cyclus13A'] = 0;
        $_SESSION['cyclus13Astart'] = 0;
        $_SESSION['cyclus23A'] = 0;
        $_SESSION['cyclus23Astart'] = 0;
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
        $_SESSION['regen'] = $result[0][19];
        $_SESSION['rood'] = $result[0][20];
        $_SESSION['groen'] = $result[0][21];
        $_SESSION['blauw'] = $result[0][22];
        $_SESSION['apiTemp'] = $result[0][23];
        $_SESSION['apiMinuten'] = $result[0][24];
        $_SESSION['ledstripstart'] = $result[0][25];
        $_SESSION['ledstripstop'] = $result[0][26];
        $_SESSION['kleur'] = sprintf("#%02x%02x%02x", $_SESSION['rood'],  $_SESSION['groen'], $_SESSION['blauw']);

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
        $_SESSION['grond2laag2'] = 0;
        $_SESSION['licht'] = 0;
        $_SESSION['lichtkleur'] = 0;
        $_SESSION['regen'] = 0;
        $_SESSION['rood'] = 0;
        $_SESSION['groen'] = 0;
        $_SESSION['blauw'] = 0;
        $_SESSION['apiTemp'] = 0;
        $_SESSION['apiMinuten'] = 0;
        $_SESSION['ledstripstart'] = 0;
        $_SESSION['ledstripstop'] = 0;
    }



} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}