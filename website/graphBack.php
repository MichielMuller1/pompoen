<?php

session_start();

$datetimeFrom = isset($_POST['datetimeFrom']) ? $_POST['datetimeFrom'] : 0;
$datetimeUntil = isset($_POST['datetimeUntil']) ? $_POST['datetimeUntil'] : 0;


//$sName = "192.168.56.5";
//$uName = "root";
//$pass = "ITF";
$sName = "localhost";
$uName = "pi";
$pass = "raspberry";
$db_name = "pompoen";
$port = 3306;

$conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//van formulier omzetten naar datetime formaat
echo $datetimeFrom."\n";
$datetimeFrom =  str_replace("T"," ",$datetimeFrom).":00";
echo $datetimeFrom;

echo $datetimeUntil."\n";
$datetimeUntil =  str_replace("T"," ",$datetimeUntil).":00";
echo $datetimeUntil;


//gewicht ophalen uit database
$stmt = $conn->prepare("select * from gewicht where tijd<'$datetimeUntil' and tijd>'$datetimeFrom'");
$stmt->execute();
$result = $stmt->fetchAll();
//aantal resultaten ophalen uit database
$stmt = $conn->prepare("select count(id) from gewicht where tijd<'$datetimeUntil' and tijd>'$datetimeFrom'");
$stmt->execute();
$result2 = $stmt->fetchAll();

$amount_gewicht = $result2[0][0];

//de waardes in arrays zetten
if(!empty($result)){
    $gewichtTijden = array();
    $gewichtP1 = array();
    $gewichtP2 = array();
    for ($i = 0; $i < $amount_gewicht; $i++) {
        array_push($gewichtTijden, $result[$i][1]);
        array_push($gewichtP1,$result[$i][2]);
        array_push($gewichtP2,$result[$i][3]);
    }

    $_SESSION['gewichtTijden'] = $gewichtTijden;
    $_SESSION['gewichtP1'] = $gewichtP1;
    $_SESSION['gewichtP2'] = $gewichtP2;
}


header("Location: graph.php");