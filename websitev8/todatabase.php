<?php

session_start();
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
$raam1ONOFF = isset($_POST["raam1_onOff"]) ? 1 : 0;
echo $raam1 . "\n";

$raam2 = $_POST["raam2"];
$raam2Automatic = isset($_POST["raam2Automatic"]) ? 1 : 0;
$raam2ONOFF = isset($_POST["raam2_onOff"]) ? 1 : 0;
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
$vat1Automatic = isset($_POST["vat1Automatic"]) ? 1 : 0;
$vat1_watergevenONOFF = isset($_POST["vat1_watergeven_onOff"]) ? 1 : 0;
$cyclus1ONOFF = isset($_POST["cyclus1"]) ? 1 : 0;
$cyclus2ONOFF = isset($_POST["cyclus2"]) ? 1 : 0;
$cyclus1startONOFF = $_POST["cyclus1Astart"];
$cyclus2startONOFF = $_POST["cyclus2Astart"];
$tijd1A = $_POST["tijd1A"];
$vat1tijd = $_POST["vat1_tijd"];
echo $vat1MIN . "\n";
echo $vat1MAX . "\n";
echo $cyclus1start . "\n";
echo $cyclus2start . "\n";

$vat2MIN = $_POST["vat2MIN"];
$vat2MAX = $_POST["vat2MAX"];
$vat2Automatic = isset($_POST["vat2Automatic"]) ? 1 : 0;
$vat2_watergevenONOFF = isset($_POST["vat2_watergeven_onOff"]) ? 1 : 0;
$cyclus12ONOFF = isset($_POST["cyclus12"]) ? 1 : 0;
$cyclus22ONOFF = isset($_POST["cyclus22"]) ? 1 : 0;
$cyclus12startONOFF = $_POST["cyclus12Astart"];
$cyclus22startONOFF = $_POST["cyclus22Astart"];
$tijd2A = $_POST["tijd2A"];
$vat2tijd = $_POST["vat2_tijd"];
echo $vat2MIN . "\n";
echo $vat2MAX . "\n";

$vat3MIN = $_POST["vat3MIN"];
$vat3MAX = $_POST["vat3MAX"];
$vat3Automatic = isset($_POST["vat3Automatic"]) ? 1 : 0;
$vat3_watergevenONOFF = isset($_POST["vat3_watergeven_onOff"]) ? 1 : 0;
$cyclus13ONOFF = isset($_POST["cyclus13"]) ? 1 : 0;
$cyclus23ONOFF = isset($_POST["cyclus23"]) ? 1 : 0;
$cyclus13startONOFF = $_POST["cyclus13Astart"];
$cyclus23startONOFF = $_POST["cyclus23Astart"];
$tijd3A = $_POST["tijd3A"];
$vat3tijd = $_POST["vat3_tijd"];
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

    $stmt = $conn->prepare("select * from threshold where id=1");
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (!empty($result)){//only delete when there is something in the database
        $sql = "DELETE FROM threshold WHERE id=1";
        $conn->exec($sql);
        $sql2 = "DELETE FROM automatisch WHERE id=1";
        $conn->exec($sql2);
        $sql3 = "DELETE FROM controls WHERE id=1";
        $conn->exec($sql3);
    }
    date_default_timezone_set("Europe/Brussels");
    $tijd = date('Y-m-d H:i:s');
    echo $tijd;

    //insert all the values into the database
    $sql = "INSERT INTO `threshold` (`ID`, `tijd`, `tempventilator1T`, `tempventilator2T`, `tempraam1T`, `tempraam2T`, `tempdeur1T`, `tempdeur2T`, `minvat1T`, `maxvat1T`, `minvat2T`, `maxvat2T`, `minvat3T`, `maxvat3T`, `grondvochtigheid1laag1T`,`grondvochtigheid1laag2T`, `grondvochtigheid2laag12T`,`grondvochtigheid2laag22T`, `lichtT`, `regen`,`rood`,`groen`,`blauw`,`apiTemperatuur`,`apiMinuten`) VALUES 
	(1,'$tijd',$ventilator1, $ventilator2,$raam1,$raam2,$deur1,$deur2,$vat1MIN,$vat1MAX,$vat2MIN,$vat2MAX,$vat3MIN,$vat3MAX,$grondvochtigheid1Laag1,$grondvochtigheid1Laag2,$grondvochtigheid2Laag1,$grondvochtigheid2Laag2,$licht,$regen,$r,$g,$b,$apiTemp,$minuten)";
    $conn->exec($sql);

    $sql2 = "INSERT INTO `automatisch` (`ID`, `tijd`, `ventilator1A`, `ventilator2A`, `raam1A`, `raam2A`, `deur1A`, `deur2A`, `lichtA`, `vat1A`, `vat2A`, `vat3A`, `tijdvat1A`, `tijdvat2A`, `tijdvat3A`, `cyclus1A` , `cyclus1Astart`, `cyclus2A`, `cyclus2Astart`, `cyclus12A` , `cyclus12Astart`, `cyclus22A`, `cyclus22Astart`, `cyclus13A` , `cyclus13Astart`, `cyclus23A`, `cyclus23Astart`) VALUES 
	(1,'$tijd',$ventilator1Automatic,$ventilator2Automatic,$raam1Automatic,$raam2Automatic,$deur1Automatic,$deur2Automatic, $lichtAutomatic, $vat1Automatic,$vat2Automatic,$vat3Automatic, $tijd1A, $tijd2A, $tijd3A, $cyclus1ONOFF, $cyclus1startONOFF, $cyclus2ONOFF, $cyclus2startONOFF, $cyclus12ONOFF, $cyclus12startONOFF, $cyclus22ONOFF, $cyclus22startONOFF, $cyclus13ONOFF, $cyclus13startONOFF, $cyclus23ONOFF, $cyclus23startONOFF )";
    $conn->exec($sql2);

    $sql3 = "INSERT INTO `controls` (`ID`, `tijd`, `ventilator1`, `ventilator2`, `raam1`, `raam2`, `deur1`, `deur2`, `tijdvat1`, `vat1wateren`, `tijdvat2`, `vat2wateren`, `tijdvat3`, `vat3wateren`, `licht`) VALUES 
	('1', '$tijd', $ventilator1ONOFF, $ventilator2ONOFF, $raam1ONOFF, $raam2ONOFF, $deur1ONOFF, $deur2ONOFF, $vat1tijd, $vat1_watergevenONOFF, $vat2tijd, $vat2_watergevenONOFF, $vat3tijd, $vat3_watergevenONOFF, $lichtONOFF)";
    $conn->exec($sql3);
    //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


//    print_r($result);
//    echo $result[0][1] . "   " . $result[0][2];
//    $_SESSION['ventilator1'] = $result[0][1];


} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}
header("Location: threshold.php");


