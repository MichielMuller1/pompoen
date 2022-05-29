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


    if (isset($_POST["pompoen"])) {
        $ventilator1 = $_POST["ventilator1"];
        $sql0 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `tempventilator1T` = '" . $ventilator1 . "' WHERE id = '1'";
        $conn->exec($sql0);

        $ventilator1Auto = $_POST["ventilator1Auto"] ? 1 : 0;
        $sql1 = "UPDATE `automatisch` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `ventilator1A` = '" . $ventilator1Auto . "' WHERE id = '1'";
        $conn->exec($sql1);

        $ventilator1ONOFF = $_POST["ventilator1_onOff"] ? 1 : 0;
        $sql2 = "UPDATE `controls` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `ventilator1` = '" . $ventilator1ONOFF . "' WHERE id = '1'";
        $conn->exec($sql2);

        $ventilator2 = $_POST["ventilator2"];
        $sql3 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `tempventilator2T` = '" . $ventilator2 . "' WHERE id = '1'";
        $conn->exec($sql3);

        $ventilator2Auto = $_POST["ventilator2Auto"] ? 1 : 0;
        $sql4 = "UPDATE `automatisch` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `ventilator2A` = '" . $ventilator2Auto . "' WHERE id = '1'";
        $conn->exec($sql4);

        $ventilator2ONOFF = $_POST["ventilator2_onOff"] ? 1 : 0;
        $sql5 = "UPDATE `controls` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `ventilator2` = '" . $ventilator2ONOFF . "' WHERE id = '1'";
        $conn->exec($sql5);

        $raam1T = $_POST["raam1T"];
        $sql6 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `tempraam1T` = '" . $raam1T . "' WHERE id = '1'";
        $conn->exec($sql6);
  
        $raam1Auto = $_POST["raam1Auto"] ? 1 : 0;
        $sql7 = "UPDATE `automatisch` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `raam1A` = '" . $raam1Auto . "' WHERE id = '1'";
        $conn->exec($sql7);

        $raam1ONOFF = $_POST["raam1_onOff"] ? 1 : 0;
        $sql8 = "UPDATE `controls` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `raam1` = '" . $raam1ONOFF . "' WHERE id = '1'";
        $conn->exec($sql8);

        $raam2T = $_POST["raam2T"];
        $sql9 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `tempraam2T` = '" . $raam2T . "' WHERE id = '1'";
        $conn->exec($sql9);

        $raam2Auto = $_POST["raam2Auto"] ? 1 : 0;
        $sql10 = "UPDATE `automatisch` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `raam2A` = '" . $raam2Auto . "' WHERE id = '1'";
        $conn->exec($sql10);

        $raam2ONOFF = $_POST["raam2_onOff"] ? 1 : 0;
        $sql11 = "UPDATE `controls` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `raam2` = '" . $raam2ONOFF . "' WHERE id = '1'";
        $conn->exec($sql11);

        $deur1T = $_POST["deur1T"];
        $sql12 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `tempdeur1T` = '" . $deur1T . "' WHERE id = '1'";
        $conn->exec($sql12);

        $deur1Auto = $_POST["deur1Auto"] ? 1 : 0;
        $sql13 = "UPDATE `automatisch` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `deur1A` = '" . $deur1Auto . "' WHERE id = '1'";
        $conn->exec($sql13);

        $deur1ONOFF = $_POST["deur1_onOff"] ? 1 : 0;
        $sql14 = "UPDATE `controls` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `deur1` = '" . $deur1ONOFF . "' WHERE id = '1'";
        $conn->exec($sql14);

        $deur2T = $_POST["deur2T"];
        $sql15 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `tempdeur2T` = '" . $deur2T . "' WHERE id = '1'";
        $conn->exec($sql15);

        $deur2Auto = $_POST["deur2Auto"] ? 1 : 0;
        $sql16 = "UPDATE `automatisch` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `deur2A` = '" . $deur2Auto . "' WHERE id = '1'";
        $conn->exec($sql16);

        $deur2ONOFF = $_POST["deur2_onOff"] ? 1 : 0;
        $sql17 = "UPDATE `controls` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `deur2` = '" . $deur2ONOFF . "' WHERE id = '1'";
        $conn->exec($sql17);

        $vat1MIN = $_POST["vat1MIN"];
        $sql18 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `minvat1T` = '" . $vat1MIN . "' WHERE id = '1'";
        $conn->exec($sql18);

        $vat1MAX = $_POST["vat1MAX"];
        $sql19 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `maxvat1T` = '" . $vat1MAX . "' WHERE id = '1'";
        $conn->exec($sql19);

        $vat2MIN = $_POST["vat2MIN"];
        $sql20 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `minvat2T` = '" . $vat2MIN . "' WHERE id = '1'";
        $conn->exec($sql20);

        $vat2MAX = $_POST["vat2MAX"];
        $sql21 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `maxvat2T` = '" . $vat2MAX . "' WHERE id = '1'";
        $conn->exec($sql21);

        $vat3MIN = $_POST["vat3MIN"];
        $sql23 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `minvat3T` = '" . $vat3MIN . "' WHERE id = '1'";
        $conn->exec($sql23);

        $vat3MAX = $_POST["vat3MAX"];
        $sql24 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `maxvat3T` = '" . $vat3MAX . "' WHERE id = '1'";
        $conn->exec($sql24);

        $grondvochtigheid1Laag1 = $_POST["grondvochtigheid1Laag1"];
        $sql25 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `grondvochtigheid1laag1T` = '" . $grondvochtigheid1Laag1 . "' WHERE id = '1'";
        $conn->exec($sql25);

        $grondvochtigheid1Laag2 = $_POST["grondvochtigheid1Laag2"];
        $sql26 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `grondvochtigheid1laag2T` = '" . $grondvochtigheid1Laag2 . "' WHERE id = '1'";
        $conn->exec($sql26);

        $grondvochtigheid2Laag1 = $_POST["grondvochtigheid2Laag1"];
        $sql27 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `grondvochtigheid2laag12T` = '" . $grondvochtigheid2Laag1 . "' WHERE id = '1'";
        $conn->exec($sql27);

        $grondvochtigheid2Laag2 = $_POST["grondvochtigheid2Laag2"];
        $sql28 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `grondvochtigheid2laag22T` = '" . $grondvochtigheid2Laag2 . "' WHERE id = '1'";
        $conn->exec($sql28);

        $tijd1A = $_POST["tijd1A"];
        $sql29 = "UPDATE `automatisch` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `tijd1A` = '" . $tijd1A . "' WHERE id = '1'";
        $conn->exec($sql29);

        $vat1tijdwat = $_POST["tijdvat1wat"];
        $sql30 = "UPDATE `controls` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `tijdvat1` = '" . $vat1tijdwat . "' WHERE id = '1'";
        $conn->exec($sql30);

        $tijd2A = $_POST["tijd2A"];
        $sql31 = "UPDATE `automatisch` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `tijd2A` = '" . $tijd2A . "' WHERE id = '1'";
        $conn->exec($sql31);

        $vat2tijdwat = $_POST["tijdvat1wat"];
        $sql32 = "UPDATE `controls` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `tijdvat2` = '" . $vat2tijdwat . "' WHERE id = '1'";
        $conn->exec($sql32);

        $tijd3A = $_POST["tijd3A"];
        $sql33 = "UPDATE `automatisch` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `tijd3A` = '" . $tijd3A . "' WHERE id = '1'";
        $conn->exec($sql33);

        $vat3tijdwat = $_POST["tijdvat3wat"];
        $sql34 = "UPDATE `controls` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `tijdvat3` = '" . $vat3tijdwat . "' WHERE id = '1'";
        $conn->exec($sql34);

        $cyclus1 = isset($_POST["cyclus1"]) ? 1 : 0;
        $sql35 = "UPDATE `automatisch` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `cyclus1A` = '" . $cyclus1 . "' WHERE id = '1'";
        $conn->exec($sql35);

        $vat1Auto = isset($_POST["vat1Auto"]) ? 1 : 0;
        $sql36 = "UPDATE `automatisch` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `vat1A` = '" . $vat1Auto . "' WHERE id = '1'";
        $conn->exec($sql36);

        $vat2Auto = isset($_POST["vat2Auto"]) ? 1 : 0;
        $sql37 = "UPDATE `automatisch` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `vat2A` = '" . $vat2Auto . "' WHERE id = '1'";
        $conn->exec($sql37);

        $vat3Auto = isset($_POST["vat3Auto"]) ? 1 : 0;
        $sql38 = "UPDATE `automatisch` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `vat3A` = '" . $vat3Auto . "' WHERE id = '1'";
        $conn->exec($sql38);



    }



    //$regenT = $_POST["regenT"];
    //$sql36 = "UPDATE `threshold` SET `tijd` = '" . date("Y-m-d H:i:s", $t) . "', `regen` = '" . $regenT . "' WHERE id = '1'";
    //$conn->exec($sql36);




    
    $vat1_watergevenONOFF = isset($_POST["vat1wateren"]) ? 1 : 0;


    $cyclus2ONOFF = isset($_POST["cyclus2"]) ? 1 : 0;
    //$cyclus1startONOFF = $_POST["cyclus1Astart"];
    //$cyclus2startONOFF = $_POST["cyclus2Astart"];



    $vat2_watergevenONOFF = isset($_POST["vat2wateren"]) ? 1 : 0;
    $cyclus12ONOFF = isset($_POST["cyclus12"]) ? 1 : 0;
    $cyclus22ONOFF = isset($_POST["cyclus22"]) ? 1 : 0;
    //$cyclus12startONOFF = $_POST["cyclus12Astart"];
    //$cyclus22startONOFF = $_POST["cyclus22Astart"];




    $vat3_watergevenONOFF = isset($_POST["vat3wateren"]) ? 1 : 0;
    $cyclus13ONOFF = isset($_POST["cyclus13"]) ? 1 : 0;
    $cyclus23ONOFF = isset($_POST["cyclus23"]) ? 1 : 0;
    //$cyclus13startONOFF = $_POST["cyclus13Astart"];
    //$cyclus23startONOFF = $_POST["cyclus23Astart"];




    $licht = $_POST["licht"];
    //$lichtKleur = $_POST["lichtKleur"];
    $lichtAuto = isset($_POST["lichtAuto"]) ? 1 : 0;
    $lichtONOFF = isset($_POST["lichtONOFF"]) ? 1 : 0;

    


    $kleur = $_POST["kleur"];
    $_SESSION['kleur'] = $kleur;
    echo $kleur . "-----------------";

    list($r, $g, $b) = sscanf($kleur, "#%02x%02x%02x");


    //$apiTemp = $_POST["api"];
    //$minuten = $_POST["minuten"];

    //$ledstripSTA = $_POST["ledstripSTA"];
    //$ledstripSTO = $_POST["ledstripSTO"];

} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}
header("Location: threshold.php");
