<?php

session_start();

$sName = "localhost";
$uName = "pi";
$pass = "raspberry";
$db_name = "pompoen";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    date_default_timezone_set("Europe/Brussels");
    $t = date('Y-m-d H:i:s');
    echo $t;


    if (isset($_POST["ventilator1"])){
        $ventilator1 = $_POST["ventilator1"];
        $sql0 = "UPDATE `threshold` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `tempventilator1T` = '" .$ventilator1. "' WHERE id = '1'";
        $conn->exec($sql0);
    }
    if (isset($_POST["ventilator1Auto"])){
        $ventilator1Auto = $_POST["ventilator1Auto"] ? 1 : 0;
        $sql1 = "UPDATE `automatisch` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `ventilator1A` = '" .$ventilator1Auto. "' WHERE id = '1'";
        $conn->exec($sql1);
    } 
    if (isset($_POST["ventilator1_onOff"])){
        $ventilator1ONOFF = $_POST["ventilator1_onOff"] ? 1 : 0;
        $sql2 = "UPDATE `controls` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `ventilator1` = '" .$ventilator1ONOFF. "' WHERE id = '1'";
        $conn->exec($sql2);
    }
    
   

    if (isset($_POST["ventilator2"])){
        $ventilator2 = $_POST["ventilator2"];
        $sql3 = "UPDATE `threshold` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `tempventilator2T` = '" .$ventilator2. "' WHERE id = '1'";
        $conn->exec($sql3);
    } 
    if (isset($_POST["ventilator2Auto"])){
        $ventilator2Auto = $_POST["ventilator2Auto"] ? 1 : 0;
        $sql4 = "UPDATE `automatisch` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `ventilator2A` = '" .$ventilator2Auto. "' WHERE id = '1'";
        $conn->exec($sql4);
    } 
    if (isset($_POST["ventilator2ONOFF"])){
        $ventilator2ONOFF = $_POST["ventilator2ONOFF"] ? 1 : 0;
        $sql5 = "UPDATE `controls` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `ventilator2` = '" .$ventilator2ONOFF. "' WHERE id = '1'";
        $conn->exec($sql5);
    }
    


    if (isset($_POST["raam1"])){
        $raam1 = $_POST["raam1"];
        $sql6 = "UPDATE `threshold` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `tempraam1T` = '" .$raam1. "' WHERE id = '1'";
        $conn->exec($sql6);
    } 
    if (isset($_POST["raam1Auto"])){
        $raam1Auto = $_POST["raam1Auto"] ? 1 : 0;
        $sql7 = "UPDATE `automatisch` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `raam1A` = '" .$raam1Auto. "' WHERE id = '1'";
        $conn->exec($sql7);
    } 
    if (isset($_POST["raam1ONOFF"])){
        $raam1ONOFF = $_POST["raam1ONOFF"] ? 1 : 0;
        $sql8 = "UPDATE `controls` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `raam1` = '" .$raam1ONOFF. "' WHERE id = '1'";
        $conn->exec($sql8);
    }



    if (isset($_POST["raam2"])){
        $raam2 = $_POST["raam2"];
        $sql9 = "UPDATE `threshold` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `tempraam2T` = '" .$raam2. "' WHERE id = '1'";
        $conn->exec($sql9);
    } 
    if (isset($_POST["raam2Auto"])){
        $raam2Auto = $_POST["raam2Auto"] ? 1 : 0;
        $sql10 = "UPDATE `automatisch` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `raam2A` = '" .$raam2Auto. "' WHERE id = '1'";
        $conn->exec($sql10);
    } 
    if (isset($_POST["raam2ONOFF"])){
        $raam2ONOFF = $_POST["raam2ONOFF"] ? 1 : 0;
        $sql11 = "UPDATE `controls` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `raam2` = '" .$raam2ONOFF. "' WHERE id = '1'";
        $conn->exec($sql11);
    }




    if (isset($_POST["deur1"])){
        $deur1 = $_POST["deur1"];
        $sql12 = "UPDATE `threshold` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `tempdeur1T` = '" .$deur1. "' WHERE id = '1'";
        $conn->exec($sql12);
    } 
    if (isset($_POST["deur1Auto"])){
        $deur1Auto = $_POST["deur1Auto"] ? 1 : 0;
        $sql13 = "UPDATE `automatisch` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `deur1A` = '" .$deur1Auto. "' WHERE id = '1'";
        $conn->exec($sql13);
    } 
    if (isset($_POST["deur1ONOFF"])){
        $deur1ONOFF = $_POST["deur1ONOFF"] ? 1 : 0;
        $sql14 = "UPDATE `controls` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `deur1` = '" .$deur1ONOFF. "' WHERE id = '1'";
        $conn->exec($sql14);
    }

    if (isset($_POST["deur2"])){
        $deur2 = $_POST["deur2"];
        $sql15 = "UPDATE `threshold` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `tempdeur2T` = '" .$deur2. "' WHERE id = '1'";
        $conn->exec($sql15);
    } 
    if (isset($_POST["deur2Auto"])){
        $deur2Auto = $_POST["deur2Auto"] ? 1 : 0;
        $sql16 = "UPDATE `automatisch` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `deur2A` = '" .$deur2Auto. "' WHERE id = '1'";
        $conn->exec($sql16);
    } 
    if (isset($_POST["deur2ONOFF"])){
        $deur2ONOFF = $_POST["deur2ONOFF"] ? 1 : 0;
        $sql17 = "UPDATE `controls` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `deur2` = '" .$deur2ONOFF. "' WHERE id = '1'";
        $conn->exec($sql17);
    }


    if (isset($_POST["vat1MIN"])){
        $vat1MIN = $_POST["vat1MIN"];
        $sql18 = "UPDATE `threshold` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `minvat1T` = '" .$vat1MIN. "' WHERE id = '1'";
        $conn->exec($sql18);
    }
    if (isset($_POST["vat1MAX"])){
        $vat1MAX = $_POST["vat1MAX"];
        $sql19 = "UPDATE `threshold` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `maxvat1T` = '" .$vat1MAX. "' WHERE id = '1'";
        $conn->exec($sql19);
    }



    $vat1Auto = isset($_POST["vat1Auto"]) ? 1 : 0;
    $vat1_watergevenONOFF = isset($_POST["vat1wateren"]) ? 1 : 0;
    $cyclus1ONOFF = isset($_POST["cyclus1"]) ? 1 : 0;
    $cyclus2ONOFF = isset($_POST["cyclus2"]) ? 1 : 0;
    $cyclus1startONOFF = $_POST["cyclus1Astart"];
    $cyclus2startONOFF = $_POST["cyclus2Astart"];
    $tijd1A = $_POST["tijd1A"];
    $vat1tijd = $_POST["tijdvat1"];



    if (isset($_POST["vat2MIN"])){
        $vat2MIN = $_POST["vat2MIN"];
        $sql18 = "UPDATE `threshold` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `minvat2T` = '" .$vat2MIN. "' WHERE id = '1'";
        $conn->exec($sql18);
    }
    if (isset($_POST["vat2MAX"])){
        $vat2MAX = $_POST["vat2MAX"];
        $sql19 = "UPDATE `threshold` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `maxvat2T` = '" .$vat2MAX. "' WHERE id = '1'";
        $conn->exec($sql19);
    }




    $vat2MIN = $_POST["vat2MIN"];
    $vat2MAX = $_POST["vat2MAX"];
    $vat2Auto = isset($_POST["vat2Auto"]) ? 1 : 0;
    $vat2_watergevenONOFF = isset($_POST["vat2wateren"]) ? 1 : 0;
    $cyclus12ONOFF = isset($_POST["cyclus12"]) ? 1 : 0;
    $cyclus22ONOFF = isset($_POST["cyclus22"]) ? 1 : 0;
    $cyclus12startONOFF = $_POST["cyclus12Astart"];
    $cyclus22startONOFF = $_POST["cyclus22Astart"];
    $tijd2A = $_POST["tijd2A"];
    $vat2tijd = $_POST["tijdvat2"];
    echo $vat2MIN . "\n";
    echo $vat2MAX . "\n";

    $vat3MIN = $_POST["vat3MIN"];
    $vat3MAX = $_POST["vat3MAX"];
    $vat3Auto = isset($_POST["vat3Auto"]) ? 1 : 0;
    $vat3_watergevenONOFF = isset($_POST["vat3wateren"]) ? 1 : 0;
    $cyclus13ONOFF = isset($_POST["cyclus13"]) ? 1 : 0;
    $cyclus23ONOFF = isset($_POST["cyclus23"]) ? 1 : 0;
    $cyclus13startONOFF = $_POST["cyclus13Astart"];
    $cyclus23startONOFF = $_POST["cyclus23Astart"];
    $tijd3A = $_POST["tijd3A"];
    $vat3tijd = $_POST["tijdvat3"];
    echo $vat3MIN . "\n";
    echo $vat3MAX . "\n";



    $grondvochtigheid1Laag1 = $_POST["grondvochtigheid1Laag1"];
    echo $grondvochtigheid1Laag1 . "\n";

    $grondvochtigheid1Laag2 = $_POST["grondvochtigheid1Laag2"];
    echo $grondvochtigheid1Laag2 . "\n";

    $grondvochtigheid2Laag1 = $_POST["grondvochtigheid2Laag1"];
    echo $grondvochtigheid2Laag1 . "\n";

    $grondvochtigheid2Laag2 = $_POST["grondvochtigheid2Laag2"];
    echo $grondvochtigheid2Laag2 . "\n";

    $licht = $_POST["licht"];
    //$lichtKleur = $_POST["lichtKleur"];
    $lichtAuto = isset($_POST["lichtAuto"]) ? 1 : 0;
    $lichtONOFF = isset($_POST["lichtONOFF"]) ? 1 : 0;
    echo $licht . "\n";
    $regen = $_POST["regen"];


    $kleur = $_POST["kleur"];
    $_SESSION['kleur'] = $kleur;
    echo $kleur . "-----------------";

    list($r, $g, $b) = sscanf($kleur, "#%02x%02x%02x");


    $apiTemp = $_POST["api"];
    $minuten = $_POST["minuten"];

    $ledstripSTA = $_POST["ledstripSTA"];
    $ledstripSTO = $_POST["ledstripSTO"];


    /*if (isset($_POST["pompoen"])){
        $sql = "UPDATE `threshold` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `tempventilator1T` = '" .$ventilator1. "',  `tempventilator2T` = '" .$ventilator2. "', `tempraam1T` = '" .$raam1. "' ,`tempraam2T` = '" .$raam2. "' , `tempdeur1T` = '" .$deur1. "' , `tempdeur2T` = '" .$deur2. "' , `minvat1T` = '" .$vat1MIN. "' , `maxvat1T` = '" .$vat1MAX. "' , `minvat2T` = '" .$vat2MIM. "' , `maxvat2T` = '" .$vat2MAX. "' , `minvat3T` = '" .$vat3MIN. "' , `maxvat3T` = '" .$vat3MAX. "' , `grondvochtigheid1laag1T` = '" .$grondvochtigheid1Laag1. "' , `grondvochtigheid1laag2T` = '" .$grondvochtigheid1Laag2. "' , `grondvochtigheid2laag12T` = '" .$grondvochtigheid2Laag1. "' , `grondvochtigheid2laag22T` = '" .$grondvochtigheid2Laag2. "' , `lichtT` = '" .$licht. "' , `regen` = '" .$regen. "' , `rood` = '" .$r. "' , `groen` = '" .$g. "' ,`blauw` = '" .$b. "' ,`apiTemperatuur` = '" .$apiTemp. "' , `apiMinuten`` = '" .$minuten. "' , `ledstripstart` = '" .$ledstripSTA. "' , `ledstipstop` = '" .$ledstripSTO. "' WHERE id = '1'";
        $conn->exec($sql);
        $sql2 = "UPDATE `automatisch` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "', `ventilator1A` = '" .$ventilator1Auto. "', `ventilator2A` = '" .$ventilator2Auto. "', `raam1A` = '" .$raam1Auto. "', `deur1A` = '" .$deur1Auto. "', `deur2A` = '" .$deur2Auto. "', `lichtA` = '" .$lichtAuto. "', `vat1A` = '" .$vat1Auto. "', `vat2A` = '" .$vat2Auto. "', `vat3A` = '" .$vat3Auto. "', `tijdvat1A` = '" .$tijd1A. "', `tijdvat2A` = '" .$tijd2A. "', `tijdvat3A` = '" .$tijd3A. "', `cyclus1A` = '" .$cyclus1ONOFF. "', `cyclus1Astart` = '" .$cyclus1startONOFF. "', `cyclus2A` = '" .$cyclus2ONOFF. "', `cyclus2Astart` = '" .$cyclus2startONOFF. "', `cyclus12A` = '" .$cyclus12ONOFF. "', `cyclus12Astart` = '" .$cyclus12startONOFF. "', `cyclus22A` = '" .$cyclus22ONOFF. "', `cyclus22Astart` = '" .$cyclus22startONOFF. "', `cyclus13A` = '" .$cyclus13ONOFF. "', `cyclus13Astart` = '" .$cyclus13startONOFF. "', `cyclus23A` = '" .$cyclus23ONOFF. "', `cyclus23Astart` = '" .$cyclus23startONOFF. "' WHERE id = '1'";
        $conn->exec($sql2);
        $sql3 = "UPDATE `controls` SET `tijd` = '" .date("Y-m-d H:i:s", $t). "',`ventilator1` = '" .$ventilator1ONOFF. "',`ventilator2` = '" .$ventilator2ONOFF. "', `raam1` = '" .$raam1ONOFF. "', `raam2` = '" .$raam2ONOFF. "',`deur1` = '" .$deur1ONOFF. "',`deur2` = '" .$deur2ONOFF. "',`tijdvat1` = '" .$vat1tijd. "',`vat1wateren` = '" .$vat1_watergevenONOFF. "',`tijdvat2` = '" .$vat2tijd. "',`vat2wateren` = '" .$vat2_watergevenONOFF. "',`tijdvat3` = '" .$vat3tijd. "',`vat3wateren` = '" .$vat3_watergevenONOFF . "',`licht` = '" .$lichtONOFF. "' WHERE id = '1'";
        $conn->exec($sql3);
        echo "treasure will be set if the form has been submitted (to TRUE, I believe)";
    }*/
} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}
header("Location: threshold.php");
