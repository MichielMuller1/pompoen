<?php
session_start();
include "getCurrent.php";

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
    <p>CO2</p>
    <p>luchtvochtigheid</p>
    <p>lichtsterkte</p>

    <h2>pompoen1</h2>
    <p>temperatuur: <?= $_SESSION['ventilator1'] ?></p>
    <p>grondvochtigheid laag 1<?= $_SESSION['ventilator2'] ?></p>
    <p>grondvochtigheid laag 2</p>

    <h2>pompoen2</h2>
    <p>temperatuur: <?= $_SESSION['ventilator1'] ?></p>
    <p>grondvochtigheid laag 1<?= $_SESSION['ventilator2'] ?></p>
    <p>grondvochtigheid laag 2</p>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
    </html>

    <?php
} else {
    header("Location: login.php");
}
?>