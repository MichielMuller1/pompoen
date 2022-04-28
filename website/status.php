<?php
session_start();
include "getStatus.php";

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pompoenen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#">Pompoen</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">current</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="threshold.php">threashold</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="graph.php">graph</a>
                </li>
            </ul>
            <p><?= $_SESSION['user_full_name'] ?></p>
            <a href="logout.php" class="btn btn-warning">LOGOUT</a>
        </div>
    </nav>

    <h2>algemeen</h2>
    <p>CO2: <span id="co2"></span> </p>
    <p>luchtvochtigheid: <span id="luchtvochtigheid"></span> </p>
    <p>lichtsterkte: <span id="lichtsterkte"></span> </p>
    <p>laatste gewicht input <?= $_SESSION['gewichtTijd'] ?></p>

    <h2>pompoen1</h2>
    <p>temperatuur: <span id="temp1"></span> </p>
    <p>grondvochtigheid laag 1: <span id="grondVocht1L1"></span> </p>
    <p>grondvochtigheid laag 2: <span id="grondVocht1L2"></span></p>

    <form action="statusDatabase.php" method="post">
        <div class="form-group">
            <label for="gewicht1">gewicht1</label>
            <input type="number" name="gewicht1" id="gewicht1" required>
        </div>

        <h2>pompoen2</h2>
        <p>temperatuur: <span id="temp2"></span> </p>
        <p>grondvochtigheid laag 1: <span id="grondVocht2L1"></span> </p>
        <p>grondvochtigheid laag 2: <span id="grondVocht2L2"></span></p>
        <div class="form-group">
            <label for="gewicht2">gewicht2</label>
            <input type="number" name="gewicht2" id="gewicht2" required>
        </div>
        <button type="submit" class="btn btn-primary">Kiezen</button>
    </form>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    var gewicht1Input = document.getElementById("gewicht1");
    var gewicht2Input = document.getElementById("gewicht2");
    var temp1 = document.getElementById("temp1");
    var grondVocht1L1 = document.getElementById("grondVocht1L1");
    var grondVocht1L2 = document.getElementById("grondVocht1L2")
    var temp2 = document.getElementById("temp2");
    var grondVocht2L1 = document.getElementById("grondVocht2L1");
    var grondVocht2L2 = document.getElementById("grondVocht2L2");

    var co2 = document.getElementById("co2");
    var luchtvochtigheid = document.getElementById("luchtvochtigheid");
    var lichtsterkte = document.getElementById("lichtsterkte");

    gewicht1Input.value= <?= $_SESSION['gewicht1'] ?>;
    gewicht2Input.value = <?= $_SESSION['gewicht2'] ?>;

    temp1.textContent = <?= $_SESSION['temperatuur1'] ?>;
    grondVocht1L1.textContent = <?= $_SESSION['grondvocht1L1'] ?>;
    grondVocht1L2.textContent = <?= $_SESSION['grondvocht1L2'] ?>;
    temp2.textContent = <?= $_SESSION['temperatuur2'] ?>;
    grondVocht2L1.textContent = <?= $_SESSION['grondvocht2L1'] ?>;
    grondVocht2L2.textContent = <?= $_SESSION['grondvocht2L2'] ?>;

    co2.textContent = <?= $_SESSION['co2'] ?>;
    lichtsterkte.textContent = <?= $_SESSION['lichtsterkte'] ?>;
    luchtvochtigheid.textContent = <?= $_SESSION['luchtvochtigheid'] ?>;
</script>

</body>
    </html>

    <?php
} else {
    header("Location: login.php");
}
?>