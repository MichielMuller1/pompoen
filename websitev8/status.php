<?php
session_start();
include "getStatus.php";

if (isset($_SESSION['user_id']) && isset($_SESSION['user_username'])) {
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

    <nav class="navbar navbar-expand-lg navbar-light">
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
                    <a class="nav-link" href="threshold.php">threshold</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="camera.php">camera</a>
                </li>
            </ul>

            <a href="logout.php" class="btn btn-warning ml-auto">LOGOUT</a>
        </div>
    </nav>


        <div class="mt-3 statusDiv">
            <h2 class="text-center geleAchtergrond">algemeen</h2>
            <p class="d-flex">CO2: <span id="co2" class="statusValue ml-auto"></span> </p>
            <p class="d-flex">luchtvochtigheid: <span id="luchtvochtigheid" class="statusValue ml-auto"></span> </p>
            <p class="d-flex">lichtsterkte: <span id="lichtsterkte" class="statusValue ml-auto"></span> </p>
            <p class="d-flex">laatste gewicht input <span class="statusValue ml-auto"> <?= $_SESSION['gewichtTijd'] ?></span></p>
            <p class="d-flex">regen: <span class="statusValue ml-auto"><?= $_SESSION['regenStatus'] ?></span></p>
        </div>





        <form action="statusDatabase.php" method="post">



                <div class="mt-3 statusDiv">
                    <h2 class="text-center geleAchtergrond">pompoen 1</h2>
                    <p class="d-flex">temperatuur: <span id="temp1" class="statusValue ml-auto"><?= $_SESSION['temperatuur1'] ?></span>°C</p>
					<p class="d-flex">luchtvochtigheid: <span id="luchtvochtigheid" class="statusValue ml-auto"><?= $_SESSION['luchtvochtigheid'] ?></span> %</p>
                    <p class="d-flex">grondvochtigheid laag 1: <span id="grondVocht1L1" class="statusValue ml-auto"><?= $_SESSION['grondvocht1L1'] ?></span>%</p>
                    <p class="d-flex">grondvochtigheid laag 2: <span id="grondVocht1L2" class="statusValue ml-auto"><?= $_SESSION['grondvocht1L2'] ?></span>%</p>

                    <div class="form-group d-flex">
                        <label for="gewicht1">gewicht: </label>
                        <input type="number" name="gewicht1" id="gewicht1" class="ml-auto" required>
                    </div>
                </div>

                <div class="mt-3 statusDiv">
                    <h2 class="text-center geleAchtergrond">pompoen 2</h2>
                    <p class="d-flex">temperatuur: <span id="temp2" class="statusValue ml-auto"><?= $_SESSION['temperatuur2'] ?></span>°C</p>
					<p class="d-flex">luchtvochtigheid: <span id="luchtvochtigheid2" class="statusValue ml-auto"><?= $_SESSION['luchtvochtigheid2'] ?></span>%</p>
                    <p class="d-flex">grondvochtigheid laag 1: <span id="grondVocht2L1" class="statusValue ml-auto"><?= $_SESSION['grondvocht2L12'] ?></span>%</p>
                    <p class="d-flex">grondvochtigheid laag 2: <span id="grondVocht2L2" class="statusValue ml-auto"><?= $_SESSION['grondvocht2L22'] ?></span>%</p>
                    <div class="form-group d-flex">
                        <label for="gewicht2">gewicht: </label>
                        <input type="number" name="gewicht2" id="gewicht2" class="ml-auto" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="gewichtButton">submit</button>
                </div>


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



    co2.value = <?= echo $_SESSION['co2'] ?>;
    lichtsterkte.value = <?= echo $_SESSION['lichtsterkte'] ?>;

	
</script>

</body>
    </html>

    <?php
} else {
    header("Location: login.php");
}
?>