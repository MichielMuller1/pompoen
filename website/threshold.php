<?php
session_start();
include "getThreashold.php";

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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Pompoen</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="status.php">current</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">threashold</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="graph.php">graph</a>
                        </li>
                    </ul>
                    <p><?= $_SESSION['user_full_name'] ?></p>
                    <a href="logout.php" class="btn btn-warning">LOGOUT</a>
                </div>
            </div>
        </nav>


        <h2>threasholds/automatic</h2>

        <div>
            <form action="todatabase.php" method="post">
                <div class="row">
                    <div class="form-group col-6">
                        <div class="p-0 mb-2">
                            <label for="ventilator1" class="d-flex justify-content-center">ventilator 1</label>
                        </div>
                        <div class="row">
                            <input type="number" name="ventilator1" id="ventilator1" class="col-9">

                            <label class="switch col-3 d-flex align-items-center">
                                <input type="checkbox" id="ventilator1Automatic" name="ventilator1Automatic" value="0">
                                <input type="checkbox" id="ventilator1_onOff" name="ventilator1_onOff" value="0" class="onOff">
                            </label>
                        </div>

                    </div>
                    <div class="form-group col-6">
                        <label for="ventilator2">ventilator 2</label>
                        <input type="number" name="ventilator2" id="ventilator2">
                        <label class="switch">
                            <input type="checkbox" id="ventilator2Automatic" name="ventilator2Automatic" value="0">
                            <input type="checkbox" id="ventilator2_onOff" name="ventilator1_onOff" value="0" class="onOff">
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="raam1">raam 1</label>
                    <input type="number" name="raam1" id="raam1">
                    <label class="switch">
                        <input type="checkbox" id="raam1Automatic" name="raam1Automatic" value="0">
                        <input type="checkbox" id="raam1_onOff" name="raam1_onOff" value="0" class="onOff">
                    </label>
                </div>
                <div class="form-group">
                    <label for="raam2">raam 2</label>
                    <input type="number" name="raam2" id="raam2">
                    <label class="switch">
                        <input type="checkbox" id="raam2Automatic" name="raam2Automatic" value="0">
                        <input type="checkbox" id="raam2_onOff" name="raam2_onOff" value="0" class="onOff">
                    </label>
                </div>
                <div class="form-group">
                    <label for="deur1">deur 1</label>
                    <input type="number" name="deur1" id="deur1">
                    <label class="switch">
                        <input type="checkbox" id="deur1Automatic" name="deur1Automatic" value="0">
                        <input type="checkbox" id="deur1_onOff" name="deur1_onOff" value="0" class="onOff">
                    </label>
                </div>
                <div class="form-group">
                    <label for="deur2"> deur 2</label>
                    <input type="number" name="deur2" id="deur2">
                    <label class="switch">
                        <input type="checkbox" id="deur2Automatic" name="deur2Automatic" value="0">
                        <input type="checkbox" id="deur2_onOff" name="deur2_onOff" value="0" class="onOff">
                    </label>
                </div>
                <div class="form-group">
                    <label for="vat1MIN">vat 1 min</label>
                    <input type="number" name="vat1MIN" id="vat1MIN">
                    <label for="vat1MAX">vat 1 max</label>
                    <input type="number" name="vat1MAX" id="vat1MAX">
                    <label class="switch">
                        <input type="checkbox" id="vat1Automatic" name="vat1Automatic" value="0">
                        <input type="checkbox" id="vat1_bijvullen_onOff" name="vat1_bijvullen_onOff" value="0" class="onOff">
                        <input type="checkbox" id="vat1_watergeven_onOff" name="vat1_watergeven_onOff" value="0" class="onOff">
                    </label>
                </div>
                <div class="form-group">
                    <label for="vat2MIN">vat 2 min</label>
                    <input type="number" name="vat2MIN" id="vat2MIN">
                    <label for="vat2MAX">vat 2 max</label>
                    <input type="number" name="vat2MAX" id="vat2MAX">
                    <label class="switch">
                        <input type="checkbox" id="vat2Automatic" name="vat2Automatic" value="0">
                        <input type="checkbox" id="vat2_bijvullen_onOff" name="vat2_bijvullen_onOff" value="0" class="onOff">
                        <input type="checkbox" id="vat2_watergeven_onOff" name="vat2_watergeven_onOff" value="0" class="onOff">
                    </label>
                </div>

                <div class="form-group">
                    <label for="vat3MIN">vat 3 min</label>
                    <input type="number" name="vat3MIN" id="vat3MIN">
                    <label for="vat3MAX">vat 3 max</label>
                    <input type="number" name="vat3MAX" id="vat3MAX">
                    <label class="switch">
                        <input type="checkbox" id="vat3Automatic" name="vat3Automatic" value="0">
                        <input type="checkbox" id="vat3_bijvullen_onOff" name="vat3_bijvullen_onOff" value="0" class="onOff">
                        <input type="checkbox" id="vat3_watergeven_onOff" name="vat3_watergeven_onOff" value="0" class="onOff">
                    </label>
                </div>
                <div class="form-group">
                    <label for="grondvochtigheid1Laag1">grondvochtigheid 1 laag 1</label>
                    <input type="number" name="grondvochtigheid1Laag1" id="grondvochtigheid1Laag1">
                </div>
                <div class="form-group">
                    <label for="grondvochtigheid1Laag2">grondvochtigheid 1 laag 2</label>
                    <input type="number" name="grondvochtigheid1Laag2" id="grondvochtigheid1Laag2">
                </div>
                <div class="form-group">
                    <label for="grondvochtigheid2Laag1">grondvochtigheid 2 laag 1</label>
                    <input type="number" name="grondvochtigheid2Laag1" id="grondvochtigheid2Laag1">
                </div>
                <div class="form-group">
                    <label for="grondvochtigheid2Laag2">grondvochtigheid 2 laag 2</label>
                    <input type="number" name="grondvochtigheid2Laag2" id="grondvochtigheid2Laag2">
                </div>
                <div class="form-group">
                    <label for="licht">licht</label>
                    <input type="number" name="licht" id="licht">
                    <label for="lichtKleur">licht kleur</label>
                    <input type="number" name="lichtKleur" id="lichtKleur">
                    <label class="switch">
                        <input type="checkbox" id="lichtAutomatic" name="lichtAutomatic" value="0">
                        <input type="checkbox" id="licht_onOff" name="licht_onOff" value="0" class="onOff">
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Kiezen</button>
            </form>
        </div>
    </div>
    <script>
        //waardes uit de database standaard in de input velden zetten.
        var ventilator1Input = document.getElementById("ventilator1");
        var ventilator2Input = document.getElementById("ventilator2");
        var raam1Input = document.getElementById("raam1");
        var raam2Input = document.getElementById("raam2");
        var deur1Input = document.getElementById("deur1");
        var deur2Input = document.getElementById("deur2");
        var vat1minInput = document.getElementById("vat1MIN");
        var vat1maxInput = document.getElementById("vat1MAX");
        var vat2minInput = document.getElementById("vat2MIN");
        var vat2maxInput = document.getElementById("vat2MAX");
        var vat3minInput = document.getElementById("vat3MIN");
        var vat3maxInput = document.getElementById("vat3MAX");
        var grond1laag1Input = document.getElementById("grondvochtigheid1Laag1");
        var grond1laag2Input = document.getElementById("grondvochtigheid1Laag2");
        var grond2laag1Input = document.getElementById("grondvochtigheid2Laag1");
        var grond2laag2Input = document.getElementById("grondvochtigheid2Laag2");
        var lichtInput = document.getElementById("licht");
        var lichtKleurInput = document.getElementById("lichtKleur");

        ventilator1Input.value = <?= $_SESSION['ventilator1'] ?>;
        ventilator2Input.value = <?= $_SESSION['ventilator2'] ?>;
        raam1Input.value = <?= $_SESSION['raam1'] ?>;
        raam2Input.value = <?= $_SESSION['raam2'] ?>;
        deur1Input.value = <?= $_SESSION['deur1'] ?>;
        deur2Input.value = <?= $_SESSION['deur2'] ?>;
        vat1minInput.value = <?= $_SESSION['vat1min'] ?>;
        vat1maxInput.value = <?= $_SESSION['vat1max'] ?>;
        vat2minInput.value = <?= $_SESSION['vat2min'] ?>;
        vat2maxInput.value = <?= $_SESSION['vat2max'] ?>;
        vat3minInput.value = <?= $_SESSION['vat3min'] ?>;
        vat3maxInput.value = <?= $_SESSION['vat3max'] ?>;
        grond1laag1Input.value = <?= $_SESSION['grond1laag1'] ?>;
        grond1laag2Input.value = <?= $_SESSION['grond1laag2'] ?>;
        grond2laag1Input.value = <?= $_SESSION['grond2laag1'] ?>;
        grond2laag2Input.value = <?= $_SESSION['grond2laag2'] ?>;
        lichtInput.value = <?= $_SESSION['licht'] ?>;
        lichtKleurInput.value = <?= $_SESSION['lichtkleur'] ?>;


        //automatisch checkboxen juist zetten
        var ventilator1Auto = document.getElementById("ventilator1Automatic");
        var ventilator2Auto = document.getElementById("ventilator2Automatic");
        var raam1Auto = document.getElementById("raam1Automatic");
        var raam2Auto = document.getElementById("raam2Automatic");
        var deur1Auto = document.getElementById("deur1Automatic");
        var deur2Auto = document.getElementById("deur2Automatic");
        var vat1Auto = document.getElementById("vat1Automatic");
        var vat2Auto = document.getElementById("vat2Automatic");
        var vat3Auto = document.getElementById("vat3Automatic");
        var lichtAuto = document.getElementById("lichtAutomatic");

        ventilator1Auto.checked =  <?= $_SESSION['ventilator1Auto'] ?>;
        ventilator2Auto.checked =  <?= $_SESSION['ventilator2Auto'] ?>;
        raam1Auto.checked = <?= $_SESSION['raam1Auto'] ?>;
        raam2Auto.checked = <?= $_SESSION['raam2Auto'] ?>;
        deur1Auto.checked = <?= $_SESSION['deur1Auto'] ?>;
        deur2Auto.checked = <?= $_SESSION['deur2Auto'] ?>;
        vat1Auto.checked = <?= $_SESSION['vat1Auto'] ?>;
        vat2Auto.checked = <?= $_SESSION['vat2Auto'] ?>;
        vat3Auto.checked = <?= $_SESSION['vat3Auto'] ?>;
        lichtAuto.checked = <?= $_SESSION['lichtAuto'] ?>;


    </script>
    </body>
    </html>

    <?php
} else {
    header("Location: login.php");
}
?>