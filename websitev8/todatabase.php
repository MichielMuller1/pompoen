<?php

session_start();

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

    $stmt = $conn->prepare("select * from threshold");
    $stmt->execute();
    $result = $stmt->fetchAll();

    $stmt = $conn->prepare("SELECT * FROM `controls`");
    $stmt->execute();
    $result1 = $stmt->fetchAll();
//    print_r($result);
//    print_r($result1);
    $raam1ONOFF = $result1[0][4];
    $raam2ONOFF = $result1[0][5];
    echo $raam1ONOFF;
    echo $raam2ONOFF;

    $ventilator1 = $_POST["ventilator1"];
    echo $ventilator1 . "\n";
    $ventilator1Automatic = isset($_POST['ventilator1Automatic']) ? 1 : 0;
    echo $ventilator1Automatic . "\n";
    $ventilator1ONOFF = isset($_POST["ventilator1_onOff"])? 1 : 0;
    echo $ventilator1ONOFF . "\n";


    $ventilator2 = $_POST["ventilator2"];
    $ventilator2Automatic = isset($_POST["ventilator2Automatic"]) ? 1 : 0;
    $ventilator2ONOFF = isset($_POST["ventilator2_onOff"]) ? 1 : 0;
    echo $ventilator2 . "\n";

    $raam1 = $_POST["raam1"];
    $raam1Automatic = isset($_POST["raam1Automatic"]) ? 1 : 0;
//$raam1ONOFF = isset($_POST["raam1_onOff"]) ? 1 : 0;
    echo $raam1 . "\n";

    $raam2 = $_POST["raam2"];
    $raam2Automatic = isset($_POST["raam2Automatic"]) ? 1 : 0;
//$raam2ONOFF = isset($_POST["raam2_onOff"]) ? 1 : 0;
    echo $raam2 . "\n";

    $deur1 = $_POST["deur1"];
    $deur1Automatic = isset($_POST["deur1Automatic"]) ? 1 : 0;
    $deur1ONOFF = isset($_POST["deur1_onOff"]) ? 1 : 0;
    echo $deur1 . "\n";

    $deur2 = $_POST["deur2"];
    $deur2Automatic = isset($_POST["deur2Automatic"]) ? 1 : 0;
    $deur2ONOFF = isset($_POST["deur2_onOff"]) ? 1 : 0;
    echo $deur2 . "\n";

    $vat1MIN = $_POST["vat1MIN"];
    $vat1MAX = $_POST["vat1MAX"];
    $tijdvat1 = $_POST["tijdvat1"];
    $tijdvat1A = $_POST["tijdvat1A"];
    $vat1Automatic = isset($_POST["vat1Automatic"]) ? 1 : 0;
    $vat1_bijvullenONOFF = isset($_POST["vat1_bijvullen_onOff"]) ? 1 : 0;
    $vat1_watergevenONOFF = isset($_POST["vat1_watergeven_onOff"]) ? 1 : 0;
    echo $vat1MIN . "\n";
    echo $vat1MAX . "\n";

    $vat2MIN = $_POST["vat2MIN"];
    $vat2MAX = $_POST["vat2MAX"];
    $tijdvat2 = $_POST["tijdvat2"];
    $tijdvat2A = $_POST["tijdvat2A"];
    $vat2Automatic = isset($_POST["vat2Automatic"]) ? 1 : 0;
    $vat2_bijvullenONOFF = isset($_POST["vat2_bijvullen_onOff"]) ? 1 : 0;
    $vat2_watergevenONOFF = isset($_POST["vat2_watergeven_onOff"]) ? 1 : 0;
    echo $vat2MIN . "\n";
    echo $vat2MAX . "\n";

    $vat3MIN = $_POST["vat3MIN"];
    $vat3MAX = $_POST["vat3MAX"];
    $tijdvat3 = $_POST["tijdvat3"];
    $tijdvat3A = $_POST["tijdvat3A"];
    $vat3Automatic = isset($_POST["vat3Automatic"]) ? 1 : 0;
    $vat3_bijvullenONOFF = isset($_POST["vat3_bijvullen_onOff"]) ? 1 : 0;
    $vat3_watergevenONOFF = isset($_POST["vat3_watergeven_onOff"]) ? 1 : 0;
    echo $vat3MIN . "\n";
    echo $vat3MAX . "\n";


    $cyclus1A = isset($_POST["cyclus1A"]) ? 1 : 0;
    $cyclus12A = isset($_POST["cyclus12A"]) ? 1 : 0;
    $cyclus13A = isset($_POST["cyclus13A"]) ? 1 : 0;
    $cyclus1AStart = $_POST["cyclus1Astart"];
    $cyclus12AStart = $_POST["cyclus12Astart"];
    $cyclus13AStart = $_POST["cyclus13Astart"];

    $cyclus2A = isset($_POST["cyclus2A"]) ? 1 : 0;
    $cyclus22A = isset($_POST["cyclus22A"]) ? 1 : 0;
    $cyclus23A = isset($_POST["cyclus23A"]) ? 1 : 0;
    $cyclus2AStart = $_POST["cyclus2Astart"];
    $cyclus22AStart = $_POST["cyclus22Astart"];
    $cyclus23AStart = $_POST["cyclus23Astart"];


    $grondvochtigheid1Laag1 = $_POST["grondvochtigheid1Laag1"];
    echo $grondvochtigheid1Laag1 . "\n";

    $grondvochtigheid1Laag2 = $_POST["grondvochtigheid1Laag2"];
    echo $grondvochtigheid1Laag2 . "\n";

    $grondvochtigheid2Laag1 = $_POST["grondvochtigheid2Laag1"];
    echo $grondvochtigheid2Laag1 . "\n";

    $grondvochtigheid2Laag2 = $_POST["grondvochtigheid2Laag2"];
    echo $grondvochtigheid2Laag2 . "\n";

    $licht = $_POST["licht"];
    $ledVanaf = $_POST["ledVanaf"];
    $ledTot = $_POST["ledTot"];
//$lichtKleur = $_POST["lichtKleur"];
    $lichtAutomatic = isset($_POST["lichtAutomatic"]) ? 1 : 0;
    $lichtONOFF = isset($_POST["licht_onOff"]) ? 1 : 0;
    echo $licht . "\n";
    $regen = $_POST["regen"];


    $kleur = $_POST["kleur"];
    $_SESSION['kleur'] = $kleur;
    echo $kleur."-----------------";

    list($r, $g, $b) = sscanf($kleur, "#%02x%02x%02x");


    $apiTemp = $_POST["api"];
    $minuten = $_POST["minuten"];

    if(isset($_POST['raam1Open'])){
        $raam1ONOFF = 'o';
    }
    if (isset($_POST['raam1Toe'])){
        $raam1ONOFF = 't';
    }
    if (isset($_POST['raam1Stop'])){
        $raam1ONOFF = 's';
    }
    echo "raam1:  ".$raam1ONOFF;

    if(isset($_POST['raam2Open'])){
        $raam2ONOFF = 'o';
    }elseif (isset($_POST['raam2Toe'])){
        $raam2ONOFF = 't';
    } elseif(isset($_POST['raam2Stop'])){
        $raam2ONOFF = 's';
    }
    echo "raam2:  ".$raam2ONOFF;



    date_default_timezone_set("Europe/Brussels");
    $tijd = date('Y-m-d H:i:s');
    echo $tijd;



    $sql = "UPDATE `controls` SET `ventilator1` = $ventilator1ONOFF, `ventilator2` = $ventilator2ONOFF,`raam1` = '$raam1ONOFF', `raam2` = '$raam2ONOFF', `deur1` = $deur1ONOFF, `deur2` = $deur2ONOFF, `tijdvat1` = '$tijdvat1', `vat1wateren` = $vat1_watergevenONOFF, `tijdvat2` = '$tijdvat2', `vat2wateren` = $vat2_watergevenONOFF, `licht` = $lichtONOFF WHERE `controls`.`ID` = 1";
    $conn->exec($sql);
    echo $cyclus1AStart;
    $sql2 = "UPDATE `automatisch` SET `ventilator1A` = $ventilator1Automatic, `ventilator2A` = $ventilator2Automatic, `raam1A` = '$raam2Automatic', `raam2A` = '$raam2Automatic', `deur1A` = '$deur1Automatic', `deur2A` = '$deur2Automatic', `lichtA` = '$lichtAutomatic', `vat1A` = '$vat1Automatic', `vat2A` = '$vat2Automatic',`tijdvat1A` = '$tijdvat1A', `tijdvat2A` = '$tijdvat2A',`cyclus1A` = '$cyclus1A', `cyclus1Astart` = '$cyclus1AStart', `cyclus2A` = '$cyclus2A', `cyclus2Astart` = '$cyclus2AStart', `cyclus12A` = '$cyclus12A', `cyclus12Astart` = '$cyclus12AStart', `cyclus22A` = '$cyclus22A', `cyclus22Astart` = '$cyclus22AStart', `cyclus13A` = '$cyclus13A', `cyclus13Astart` = '$cyclus13AStart', `cyclus23A` = '$cyclus23A', `cyclus23Astart` = '$cyclus23AStart' WHERE `automatisch`.`ID` = 1;";
    $conn->exec($sql2);

    $sql3 = "UPDATE `threshold` SET `tempventilator1T` = $ventilator1,  `tempraam1T` = $raam1, `tempraam2T` = $raam2, `tempdeur1T` = $deur1, `tempdeur2T` = $deur2, `minvat1T` = $vat1MIN, `maxvat1T` = $vat1MAX, `minvat2T` = $vat2MIN, `maxvat2T` = $vat2MAX,  `grondvochtigheid1laag1T` = $grondvochtigheid1Laag1, `grondvochtigheid1laag2T` = $grondvochtigheid1Laag2, `grondvochtigheid2laag12T` = $grondvochtigheid2Laag1, `grondvochtigheid2laag22T` = $grondvochtigheid2Laag2, `lichtT` = '8', `regen` = $regen, `rood` = $r, `groen` = $g, `blauw` = $b, `apiTemperatuur` = $apiTemp, `apiMinuten` = $minuten, `ledstripstart` = '$ledVanaf', `ledstripstop` = '$ledTot' WHERE `threshold`.`ID` = 1;";
    $conn->exec($sql3);

    //insert all the values into the database
//    $sql = "INSERT INTO `threshold` (`ID`, `tijd`, `tempventilator1T`, `tempventilator2T`, `tempraam1T`, `tempraam2T`, `tempdeur1T`, `tempdeur2T`, `minvat1T`, `maxvat1T`, `minvat2T`, `maxvat2T`, `minvat3T`, `maxvat3T`, `grondvochtigheid1laag1T`,`grondvochtigheid1laag2T`, `grondvochtigheid2laag12T`,`grondvochtigheid2laag22T`, `lichtT`, `regen`,`rood`,`groen`,`blauw`,`apiTemperatuur`,`apiMinuten`) VALUES (1,'$tijd',33, $ventilator2,$raam1,$raam2,$deur1,$deur2,$vat1MIN,$vat1MAX,$vat2MIN,$vat2MAX,$vat3MIN,$vat3MAX,$grondvochtigheid1Laag1,$grondvochtigheid1Laag2,$grondvochtigheid2Laag1,$grondvochtigheid2Laag2,$licht,$regen,$r,$g,$b,$apiTemp,$minuten)";
//    $conn->exec($sql);
//
//    $sql2 = "INSERT INTO `automatisch` (`ID`, `tijd`,`ventilator1A`,`ventilator2A`,`raam1A`,`raam2A`,`deur1A`,`deur2A`,`vat1A`,`vat2A`,`vat3A`,`lichtA`) VALUES (1,'$tijd',$ventilator1Automatic,$ventilator2Automatic,$raam1Automatic,$raam2Automatic,$deur1Automatic,$deur2Automatic,$vat1Automatic,$vat2Automatic,$vat3Automatic,$lichtAutomatic)";
//    $conn->exec($sql2);
//
//    $sql3 = "INSERT INTO `controls` (`ID`, `tijd`, `ventilator1`, `ventilator2`, `raam1`, `raam2`, `deur1`, `deur2`, `vat1bijvullen`, `vat1wateren`, `vat2bijvullen`, `vat2wateren`, `vat3bijvullen`, `vat3wateren`, `licht`) VALUES ('1', '$tijd', $ventilator1ONOFF, $ventilator2ONOFF, $raam1ONOFF, $raam2ONOFF, $deur1ONOFF, $deur2ONOFF, $vat1_bijvullenONOFF, $vat1_watergevenONOFF, $vat2_bijvullenONOFF, $vat2_watergevenONOFF, $vat3_bijvullenONOFF, $vat3_watergevenONOFF, $lichtONOFF)";
//    $conn->exec($sql3);
    //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

//`cyclus1A` = '$cyclus1A', `cyclus1Astart` = '$cyclus1AStart', `cyclus2A` = '$cyclus2A', `cyclus2Astart` = '$cyclus2AStart', `cyclus12A` = '$cyclus12A', `cyclus12Astart` = '$cyclus12AStart', `cyclus22A` = '$cyclus22A', `cyclus22Astart` = '$cyclus22AStart', `cyclus13A` = '$cyclus13A', `cyclus13Astart` = '$cyclus13AStart', `cyclus23A` = '$cyclus23A', `cyclus23Astart` = '$cyclus23AStart'
//    print_r($result);
//    echo $result[0][1] . "   " . $result[0][2];
//    $_SESSION['ventilator1'] = $result[0][1];


} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}
header("Location: threshold.php");


