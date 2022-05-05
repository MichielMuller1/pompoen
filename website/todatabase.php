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
$vat1_bijvullenONOFF = isset($_POST["vat1_bijvullen_onOff"]) ? 1 : 0;
$vat1_watergevenONOFF = isset($_POST["vat1_watergeven_onOff"]) ? 1 : 0;
echo $vat1MIN . "\n";
echo $vat1MAX . "\n";

$vat2MIN = $_POST["vat2MIN"];
$vat2MAX = $_POST["vat2MAX"];
$vat2Automatic = isset($_POST["vat2Automatic"]) ? 1 : 0;
$vat2_bijvullenONOFF = isset($_POST["vat2_bijvullen_onOff"]) ? 1 : 0;
$vat2_watergevenONOFF = isset($_POST["vat2_watergeven_onOff"]) ? 1 : 0;
echo $vat2MIN . "\n";
echo $vat2MAX . "\n";

$vat3MIN = $_POST["vat3MIN"];
$vat3MAX = $_POST["vat3MAX"];
$vat3Automatic = isset($_POST["vat3Automatic"]) ? 1 : 0;
$vat3_bijvullenONOFF = isset($_POST["vat3_bijvullen_onOff"]) ? 1 : 0;
$vat3_watergevenONOFF = isset($_POST["vat3_watergeven_onOff"]) ? 1 : 0;
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
$lichtKleur = $_POST["lichtKleur"];
$lichtAutomatic = isset($_POST["lichtAutomatic"]) ? 1 : 0;
$lichtONOFF = isset($_POST["licht_onOff"]) ? 1 : 0;
echo $licht . "\n";

$sName = "192.168.227.251";
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
        $sql3 = "DELETE FROM control WHERE id=1";
        $conn->exec($sql3);
    }
    date_default_timezone_set("Europe/Brussels");
    $tijd = date('Y-m-d H:i:s');
    echo $tijd;

    //insert all the values into the database
    $sql = "INSERT INTO `threshold` (`ID`, `tijd`, `tempventilator1`, `tempventilator2`, `tempraam1`, `tempraam2`, `tempdeur1`, `tempdeur2`, `minvat1`, `maxvat1`, `minvat2`, `maxvat2`, `minvat3`, `maxvat3`, `grondvochtigheid1laag1`,`grondvochtigheid1laag2`, `grondvochtigheid2laag1`,`grondvochtigheid2laag2`, `licht`, `lichtkleur`) VALUES (1,'$tijd',$ventilator1, $ventilator2,$raam1,$raam2,$deur1,$deur2,$vat1MIN,$vat1MAX,$vat2MIN,$vat2MAX,$vat3MIN,$vat3MAX,$grondvochtigheid1Laag1,$grondvochtigheid1Laag2,$grondvochtigheid2Laag1,$grondvochtigheid2Laag2,$licht,$lichtKleur)";
    $conn->exec($sql);

    $sql2 = "INSERT INTO `automatisch` (`ID`, `tijd`,`ventilator1`,`ventilator2`,`raam1`,`raam2`,`deur1`,`deur2`,`vat1`,`vat2`,`vat3`,`licht`) VALUES (1,'$tijd',$ventilator1Automatic,$ventilator2Automatic,$raam1Automatic,$raam2Automatic,$deur1Automatic,$deur2Automatic,$vat1Automatic,$vat2Automatic,$vat3Automatic,$lichtAutomatic)";
    $conn->exec($sql2);

    $sql3 = "INSERT INTO `control` (`ID`, `tijd`, `ventilator1`, `ventilator2`, `raam1`, `raam2`, `deur1`, `deur2`, `vat1bijvullen`, `vat1wateren`, `vat2bijvullen`, `vat2wateren`, `vat3bijvullen`, `vat3wateren`, `licht`) VALUES ('1', '$tijd', $ventilator1ONOFF, $ventilator2ONOFF, $raam1ONOFF, $raam2ONOFF, $deur1ONOFF, $deur2ONOFF, $vat1_bijvullenONOFF, $vat1_watergevenONOFF, $vat2_bijvullenONOFF, $vat2_watergevenONOFF, $vat3_bijvullenONOFF, $vat3_watergevenONOFF, $lichtONOFF)";
    $conn->exec($sql3);
    //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);


//    print_r($result);
//    echo $result[0][1] . "   " . $result[0][2];
//    $_SESSION['ventilator1'] = $result[0][1];


} catch (PDOException $e) {
    echo " database error " . $e->getMessage();
}
header("Location: threshold.php");



