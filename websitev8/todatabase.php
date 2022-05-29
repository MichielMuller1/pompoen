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

$ledstripSTA = $_POST["ledstripSTA"];
$ledstripSTO = $_POST["ledstripSTO"];



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

    date_default_timezone_set("Europe/Brussels");
    $t = date('Y-m-d H:i:s');
    echo $t;

    //insert all the values into the database
	if (isset($_POST['pompoen'])){
	$sql = "UPDATE `threshold` SET `tijd` = '".date("Y-m-d H:i:s",$t)."', `tempventilator1T` = '" .$ventilator1. "',  `tempventilator2T` = '" .$ventilator2. "', `tempraam1T` = '" .$raam1. "' ,`tempraam2T` = '" .$raam2."' , `tempdeur1T` = '" .$deur1."' , `tempdeur2T` = '" .$deur2."' , `minvat1T` = '" .$vat1MIN."' , `maxvat1T` = '" .$vat1MAX."' , `minvat2T` = '" .$vat2MIM."' , `maxvat2T` = '" .$vat2MAX."' , `minvat3T` = '" .$vat3MIN."' , `maxvat3T` = '" .$vat3MAX."' , `grondvochtigheid1laag1T` = '" .$grondvochtigheid1Laag1."' , `grondvochtigheid1laag2T` = '" .$grondvochtigheid1Laag2."' , `grondvochtigheid2laag12T` = '" .$grondvochtigheid2Laag1."' , `grondvochtigheid2laag22T` = '" .$grondvochtigheid2Laag2."' , `lichtT` = '" .$licht."' , `regen` = '" .$regen."' , `rood` = '" .$r."' , `groen` = '" .$g."' ,`blauw` = '" .$b."' ,`apiTemperatuur` = '" .$apiTemp."' , `apiMinuten`` = '" .$minuten."' , `ledstripstart` = '" .$ledstripSTA."' , `ledstipstop` = '" .$ledstripSTO."' WHERE id = '1'";
    $conn->exec($sql);
    $sql2 = "UPDATE `automatisch` SET `tijd` = '".date("Y-m-d H:i:s",$t)."', `ventilator1A` = '" .$ventilator1Automatic. "', `ventilator2A` = '" .$ventilator2Automatic. "', `raam1A` = '" .$raam1Automatic. "', `deur1A` = '" .$deur1Automatic. "', `deur2A` = '" .$deur2Automatic. "', `lichtA` = '" .$lichtAutomatic. "', `vat1A` = '" .$vat1Automatic. "', `vat2A` = '" .$vat2Automatic. "', `vat3A` = '" .$vat3Automatic. "', `tijdvat1A` = '" .$tijd1A. "', `tijdvat2A` = '" .$tijd2A. "', `tijdvat3A` = '" .$tijd3A. "', `cyclus1A` = '" .$cyclus1ONOFF. "', `cyclus1Astart` = '" .$cyclus1startONOFF. "', `cyclus2A` = '" .$cyclus2ONOFF. "', `cyclus2Astart` = '" .$cyclus2startONOFF. "', `cyclus12A` = '" .$cyclus12ONOFF. "', `cyclus12Astart` = '" .$cyclus12startONOFF. "', `cyclus22A` = '" .$cyclus22ONOFF. "', `cyclus22Astart` = '" .$cyclus22startONOFF. "', `cyclus13A` = '" .$cyclus13ONOFF. "', `cyclus13Astart` = '" .$cyclus13startONOFF. "', `cyclus23A` = '" .$cyclus23ONOFF. "', `cyclus23Astart` = '" .$cyclus23startONOFF. "' WHERE id = '1'";
    $conn->exec($sql2);
    $sql3 = "UPDATE `controls` SET `tijd` = '".date("Y-m-d H:i:s",$t)."',`ventilator1` = '" .$ventilator1ONOFF. "',`ventilator2` = '" . $ventilator2ONOFF. "',`raam1` = '" .$raam1ONOFF. "',`raam2` = '" .$raam2ONOFF. "',`deur1` = '" .$deur1ONOFF. "',`deur2` = '" .$deur2ONOFF. "',`tijdvat1` = '" .$vat1tijd. "',`vat1wateren` = '" .$vat1_watergevenONOFF. "',`tijdvat2` = '" .$vat2tijd. "',`vat2wateren` = '" .$vat2_watergevenONOFF. "',`tijdvat3` = '" .$vat3tijd. "',`vat3wateren` = '" .$vat3_watergevenONOFF. "',`licht` = '" .$lichtONOFF. "' WHERE id = '1'";
    $conn->exec($sql3);
    echo "treasure will be set if the form has been submitted (to TRUE, I believe)";
}   

} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}
header("Location: threshold.php");


