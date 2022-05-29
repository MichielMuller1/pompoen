<?php
session_start();
include "getThreashold.php";
include "db_conn.php";

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
        <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="#">Pompoen</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="status.php">current</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">threshold</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="camera.php">camera</a>
                        </li>
                    </ul>

                    <a href="logout.php" class="btn btn-warning ml-auto">LOGOUT</a>
                </div>
        </nav>


        <h2>thresholds and controls</h2>

        <div>
            <form action="todatabase.php" method="post">
                <div>
                    <p>boven deze temperatuur gaat de ventilator aan</p>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="ventilator1">ventilator 1</label>
                            <input type="number" name="ventilator1" id="ventilator1" required>
                            <label class="switch">
                                <input type="checkbox" id="ventilator1Automatic" name="ventilator1Automatic" value="0">
                                <!--                                <input type="checkbox" id="ventilator1_onOff" name="ventilator1_onOff" value="0" class="onOff">-->
                            </label>
                            <label class="switchSlider">
                                <input type="checkbox" id="ventilator1_onOff" name="ventilator1_onOff" value="0" class="onOff">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="form-group col-6">
                            <label for="ventilator2">ventilator 2</label>
                            <input type="number" name="ventilator2" id="ventilator2" required>
                            <label class="switch">
                                <input type="checkbox" id="ventilator2Automatic" name="ventilator2Automatic" value="0">
                                <!--                            <input type="checkbox" id="ventilator2_onOff" name="ventilator2_onOff" value="0" class="onOff">-->
                            </label>
                            <label class="switchSlider">
                                <input type="checkbox" id="ventilator2_onOff" name="ventilator2_onOff" value="0" class="onOff">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>

                </div>


                <div class="form-group">
                    <label for="regen">regen</label>
                    <input type="number" name="regen" id="regen" required>
                </div>

                <div class="form-group">
                    <label for="raam1">raam 1</label>
                    <input type="number" name="raam1" id="raam1" required>
                    <label class="switch">
                        <input type="checkbox" id="raam1Automatic" name="raam1Automatic" value="0">
                        <!--                        <input type="checkbox" id="raam1_onOff" name="raam1_onOff" value="0" class="onOff">-->
                    </label>
<!--                    <label class="switchSlider">-->
<!--                        <input type="checkbox" id="raam1_onOff" name="raam1_onOff" value="0" class="onOff">-->
<!--                        <span class="slider round"></span>-->
<!--                    </label>-->
                    <button class="btn btn-success" id="raam1Open" name="raam1Open" value="o">open</button>
                    <button class="btn btn-success" id="raam1Toe" name="raam1Toe" value="t">toe</button>
                    <button class="btn btn-danger" id="raam1Stop" name="raam1Stop" value="s">stop</button>
                </div>
                <div class="form-group">
                    <label for="raam2">raam 2</label>
                    <input type="number" name="raam2" id="raam2" required>
                    <label class="switch">
                        <input type="checkbox" id="raam2Automatic" name="raam2Automatic" value="0">
                        <!--                        <input type="checkbox" id="raam2_onOff" name="raam2_onOff" value="0" class="onOff">-->
                    </label>
<!--                    <label class="switchSlider">-->
<!--                        <input type="checkbox" id="raam2_onOff" name="raam2_onOff" value="0" class="onOff">-->
<!--                        <span class="slider round"></span>-->
<!--                    </label>-->
                    <button type="submit" class="btn btn-success" id="raam2Open" name="raam2Open" value="o">open</button>
                    <button type="submit" class="btn btn-success" id="raam2Toe" name="raam2Toe" value="o">toe</button>
                    <button type="submit" class="btn btn-danger" id="raam2Stop" name="raam2Stop" value="o">stop</button>
                </div>
                <div class="form-group">
                    <label for="deur1">deur 1</label>
                    <input type="number" name="deur1" id="deur1" required>
                    <label class="switch">
                        <input type="checkbox" id="deur1Automatic" name="deur1Automatic" value="0">
                        <!--                        <input type="checkbox" id="deur1_onOff" name="deur1_onOff" value="0" class="onOff">-->
                    </label>
                    <label class="switchSlider">
                        <input type="checkbox" id="deur1_onOff" name="deur1_onOff" value="0" class="onOff">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="deur2"> deur 2</label>
                    <input type="number" name="deur2" id="deur2" required>
                    <label class="switch">
                        <input type="checkbox" id="deur2Automatic" name="deur2Automatic" value="0">
                        <!--                        <input type="checkbox" id="deur2_onOff" name="deur2_onOff" value="0" class="onOff">-->
                    </label>
                    <label class="switchSlider">
                        <input type="checkbox" id="deur2_onOff" name="deur2_onOff" value="0" class="onOff">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="vat1MIN">vat 1 min</label>
                    <input type="number" name="vat1MIN" id="vat1MIN" required>
                    <label for="vat1MAX">vat 1 max</label>
                    <input type="number" name="vat1MAX" id="vat1MAX" required>
                    <label for="tijdvat1">tijdvat1</label>
                    <input type="time" step="1" name="tijdvat1" id="tijdvat1" value="<?=$_SESSION['tijdvat1']?>" required>
                    <label for="tijdvat1A">tijdvat1A</label>
                    <input type="time" step="1" name="tijdvat1A" id="tijdvat1A" value="<?=$_SESSION['tijdvat1A']?>" required>


                    <label class="switch"> automatisch
                        <input type="checkbox" id="vat1Automatic" name="vat1Automatic" value="0">
                        <!--                        <input type="checkbox" id="vat1_bijvullen_onOff" name="vat1_bijvullen_onOff" value="0" class="onOff">-->
                        <!--                        <input type="checkbox" id="vat1_watergeven_onOff" name="vat1_watergeven_onOff" value="0" class="onOff">-->
                    </label>
<!--                    <label class="switchSlider"> bijvullen-->
<!--                        <input type="checkbox" id="vat1_bijvullen_onOff" name="vat1_bijvullen_onOff" value="0"-->
<!--                               class="onOff">-->
<!--                        <span class="slider round"></span>-->
<!--                    </label>-->
                    <label class="switchSlider">
                        <input type="checkbox" id="vat1_watergeven_onOff" name="vat1_watergeven_onOff" value="0"
                               class="onOff">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="vat2MIN">vat 2 min</label>
                    <input type="number" name="vat2MIN" id="vat2MIN" required>
                    <label for="vat2MAX">vat 2 max</label>
                    <input type="number" name="vat2MAX" id="vat2MAX" required>
                    <label for="tijdvat2">tijdvat2</label>
                    <input type="time" step="1" name="tijdvat2" id="tijdvat2" value="<?=$_SESSION['tijdvat2']?>" required>
                    <label for="tijdvat2A">tijdvat2A</label>
                    <input type="time" step="1" name="tijdvat2A" id="tijdvat2A" value="<?=$_SESSION['tijdvat2A']?>" required>

                    <label class="switch"> automatisch
                        <input type="checkbox" id="vat2Automatic" name="vat2Automatic" value="0">
                        <!--                        <input type="checkbox" id="vat2_bijvullen_onOff" name="vat2_bijvullen_onOff" value="0" class="onOff">-->
                        <!--                        <input type="checkbox" id="vat2_watergeven_onOff" name="vat2_watergeven_onOff" value="0" class="onOff">-->
                    </label>
<!--                    <label class="switchSlider">-->
<!--                        <input type="checkbox" id="vat2_bijvullen_onOff" name="vat2_bijvullen_onOff" value="0"-->
<!--                               class="onOff">-->
<!--                        <span class="slider round"></span>-->
<!--                    </label>-->
                    <label class="switchSlider">
                        <input type="checkbox" id="vat2_watergeven_onOff" name="vat2_watergeven_onOff" value="0"
                               class="onOff">
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="form-group">
                    <label for="vat3MIN">vat 3 min</label>
                    <input type="number" name="vat3MIN" id="vat3MIN" required>
                    <label for="vat3MAX">vat 3 max</label>
                    <input type="number" name="vat3MAX" id="vat3MAX" required>
                    <label for="tijdvat3">tijdvat3</label>
                    <input type="time" step="1" name="tijdvat3" id="tijdvat3" value="<?=$_SESSION['tijdvat3']?>" required>
                    <label for="tijdvat3A">tijdvat3A</label>
                    <input type="time" step="1" name="tijdvat3A" id="tijdvat3A" value="<?=$_SESSION['tijdvat3A']?>" required>
                    <label class="switch"> automatisch
                        <input type="checkbox" id="vat3Automatic" name="vat3Automatic" value="0">
                        <!--                        <input type="checkbox" id="vat3_bijvullen_onOff" name="vat3_bijvullen_onOff" value="0" class="onOff">-->
                        <!--                        <input type="checkbox" id="vat3_watergeven_onOff" name="vat3_watergeven_onOff" value="0" class="onOff">-->
                    </label>
<!--                    <label class="switchSlider">-->
<!--                        <input type="checkbox" id="vat3_bijvullen_onOff" name="vat3_bijvullen_onOff" value="0"-->
<!--                               class="onOff">-->
<!--                        <span class="slider round"></span>-->
<!--                    </label>-->
                    <label class="switchSlider">
                        <input type="checkbox" id="vat3_watergeven_onOff" name="vat3_watergeven_onOff" value="0"
                               class="onOff">
                        <span class="slider round"></span>
                    </label>
                </div>

                <div class="form-group">
                    <label for="cyclus1A"> cyclus1A
                        <input type="checkbox" id="cyclus1A" name="cyclus1A" value="0" checked="<?=$_SESSION['cyclus1A']?>">
                    </label>
                    <label for="cyclus1Astart">cyclus1Astart</label>
                    <input type="time" step="1" name="cyclus1Astart" id="cyclus1Astart" value="<?=$_SESSION['cyclus1Astart']?>" required>
                    <label for="cyclus12A"> cyclus12A
                        <input type="checkbox" id="cyclus12A" name="cyclus12A" value="0" checked="<?=$_SESSION['cyclus12A']?>">
                    </label>
                    <label for="cyclus12Astart">cyclus12Astart</label>
                    <input type="time" step="1" name="cyclus12Astart" id="cyclus12Astart" value="<?=$_SESSION['cyclus12Astart']?>" required>
                    <label for="cyclus13A"> cyclus13A
                        <input type="checkbox" id="cyclus13A" name="cyclus13A" value="0" checked="<?=$_SESSION['cyclus13A']?>">
                    </label>
                    <label for="cyclus13Astart">cyclus13Astart</label>
                    <input type="time" step="1" name="cyclus13Astart" id="cyclus13Astart" value="<?=$_SESSION['cyclus13Astart']?>" required>

                </div>

                <div class="form-group">
                    <label for="cyclus2A"> cyclus2A
                        <input type="checkbox" id="cyclus2A" name="cyclus2A" value="0" checked="<?=$_SESSION['cyclus2A']?>">
                    </label>
                    <label for="cyclus2Astart">cyclus2Astart</label>
                    <input type="time" step="1" name="cyclus2Astart" id="cyclus2Astart" value="<?=$_SESSION['cyclus2Astart']?>" required>
                    <label for="cyclus22A"> cyclus22A
                        <input type="checkbox" id="cyclus22A" name="cyclus22A" value="0" checked="<?=$_SESSION['cyclus22A']?>">
                    </label>
                    <label for="cyclus22Astart">cyclus22Astart</label>
                    <input type="time" step="1" name="cyclus22Astart" id="cyclus22Astart" value="<?=$_SESSION['cyclus22Astart']?>" required>
                    <label for="cyclus23A"> cyclus23A
                        <input type="checkbox" id="cyclus23A" name="cyclus23A" value="0" checked="<?=$_SESSION['cyclus23A']?>">
                    </label>
                    <label for="cyclus23Astart">cyclus23Astart</label>
                    <input type="time" step="1" name="cyclus23Astart" id="cyclus23Astart" value="<?=$_SESSION['cyclus23Astart']?>" required>
                </div>



                <div class="form-group">
                    <label for="grondvochtigheid1Laag1">grondvochtigheid 1 laag 1</label>
                    <input type="number" name="grondvochtigheid1Laag1" id="grondvochtigheid1Laag1" required>
                </div>
                <div class="form-group">
                    <label for="grondvochtigheid1Laag2">grondvochtigheid 1 laag 2</label>
                    <input type="number" name="grondvochtigheid1Laag2" id="grondvochtigheid1Laag2" required>
                </div>
                <div class="form-group">
                    <label for="grondvochtigheid2Laag1">grondvochtigheid 2 laag 1</label>
                    <input type="number" name="grondvochtigheid2Laag1" id="grondvochtigheid2Laag1" required>
                </div>
                <div class="form-group">
                    <label for="grondvochtigheid2Laag2">grondvochtigheid 2 laag 2</label>
                    <input type="number" name="grondvochtigheid2Laag2" id="grondvochtigheid2Laag2" required>
                </div>
                <div class="form-group">
                    <label for="licht">licht</label>
<!--                    <input type="number" name="licht" id="licht" required>-->
                    <input type="time" name="ledVanaf" id="ledVanaf" step="1" value="<?= $_SESSION['ledstripstart']?>" required>
                    <input type="time" name="ledTot" id="ledTot" step="1" value="<?= $_SESSION['ledstripstop']?>" required>
<!--                    <label for="lichtKleur">licht kleur</label>-->
<!--                    <input type="number" name="lichtKleur" id="lichtKleur" required>-->
                    <label class="switch">
                        <input type="checkbox" id="lichtAutomatic" name="lichtAutomatic" value="0">
                        <!--                        <input type="checkbox" id="licht_onOff" name="licht_onOff" value="0" class="onOff">-->
                    </label>
                    <label class="switchSlider">
                        <input type="checkbox" id="licht_onOff" name="licht_onOff" value="0" class="onOff">
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="form-group">
                    <label for="kleur">Lichtkleur</label>
                    <input type="color" id="kleur" name="kleur" onchange="clickColor(0, -1, -1, 5)" style="width: 50%">
                </div>

                <div class="form-group">
                    <label for="api">weersvoorspelling temperatuur</label>
                    <input type="api" name="api" id="api" required>
                    <label for="minuten">minuten vooraf ramen open zetten</label>
                    <input type="minuten" name="minuten" id="minuten" required>
                </div>

                <button type="submit" class="btn btn-success">Kiezen</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        //waardes uit de database standaard in de input velden zetten.
        var ventilator1Input = document.getElementById("ventilator1");
        var ventilator2Input = document.getElementById("ventilator2");
        var raam1Input = document.getElementById("raam1");
        var raam1Open = document.getElementById("raam1Open");
        var raam1Toe = document.getElementById("raam1Toe");
        var raam1Stop = document.getElementById("raam1Stop");
        var raam2Input = document.getElementById("raam2");
        var raam2Open = document.getElementById("raam2Open");
        var raam2Toe = document.getElementById("raam2Toe");
        var raam2Stop = document.getElementById("raam2Stop");

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
        // var lichtInput = document.getElementById("licht");
        // var lichtKleurInput = document.getElementById("lichtKleur");
        var regenInput = document.getElementById("regen");
        var kleur = document.getElementById("kleur");
        var apiTempInput = document.getElementById("api");
        var apiMinutesInput = document.getElementById("minuten");


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
        //lichtInput.value = <?= $_SESSION['licht'] ?>;
        //lichtKleurInput.value = <?//= $_SESSION['lichtkleur'] ?>//;
        regenInput.value = <?= $_SESSION['regen'] ?>;
        kleur.value = <?='"'. $_SESSION['kleur'] .'"'?>;
        apiTempInput.value = <?= $_SESSION['apiTemp'] ?>;
        apiMinutesInput.value = <?= $_SESSION['apiMinuten'] ?>;


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

        ventilator1Auto.checked = <?= $_SESSION['ventilator1Auto'] ?>;
        ventilator2Auto.checked = <?= $_SESSION['ventilator2Auto'] ?>;
        raam1Auto.checked = <?= $_SESSION['raam1Auto'] ?>;
        raam2Auto.checked = <?= $_SESSION['raam2Auto'] ?>;
        deur1Auto.checked = <?= $_SESSION['deur1Auto'] ?>;
        deur2Auto.checked = <?= $_SESSION['deur2Auto'] ?>;
        vat1Auto.checked = <?= $_SESSION['vat1Auto'] ?>;
        vat2Auto.checked = <?= $_SESSION['vat2Auto'] ?>;
        vat3Auto.checked = <?= $_SESSION['vat3Auto'] ?>;
        lichtAuto.checked = <?= $_SESSION['lichtAuto'] ?>;


        //controls juistzetten met wat er in de database staat
        var ventilator1ONOFF = document.getElementById("ventilator1_onOff");
        var ventilator2ONOFF = document.getElementById("ventilator2_onOff");
        // var raam1ONOFF = document.getElementById("raam1_onOff");
        // var raam2ONOFF = document.getElementById("raam2_onOff");
        var deur1ONOFF = document.getElementById("deur1_onOff");
        var deur2ONOFF = document.getElementById("deur2_onOff");
        // var vat1bijvullen = document.getElementById("vat1_bijvullen_onOff");
        var vat1wateren = document.getElementById("vat1_watergeven_onOff");
        // var vat2bijvullen = document.getElementById("vat2_bijvullen_onOff");
        var vat2wateren = document.getElementById("vat2_watergeven_onOff");
        // var vat3bijvullen = document.getElementById("vat3_bijvullen_onOff");
        var vat3wateren = document.getElementById("vat3_watergeven_onOff");
        var lichtONOFF = document.getElementById("licht_onOff");


        ventilator1ONOFF.checked = <?= $_SESSION['ventilator1ONOFF'] ?>;
        ventilator2ONOFF.checked = <?= $_SESSION['ventilator2ONOFF'] ?>;
        //raam1ONOFF.checked = <?//= $_SESSION['raam1ONOFF'] ?>//;
        //raam2ONOFF.checked = <?//= $_SESSION['raam2ONOFF'] ?>//;
        deur1ONOFF.checked = <?= $_SESSION['deur1ONOFF'] ?>;
        deur2ONOFF.checked = <?= $_SESSION['deur2ONOFF'] ?>;
        //vat1bijvullen.checked = <?//= $_SESSION['vat1bijvullen'] ?>//;
        vat1wateren.checked = <?= $_SESSION['vat1wateren'] ?>;
        //vat2bijvullen.checked = <?//= $_SESSION['vat2bijvullen'] ?>//;
        vat2wateren.checked = <?= $_SESSION['vat2wateren'] ?>;
        //vat3bijvullen.checked = <?//= $_SESSION['vat3bijvullen'] ?>//;
        vat3wateren.checked = <?= $_SESSION['vat3wateren'] ?>;
        lichtONOFF.checked = <?= $_SESSION['lichtONOFF'] ?>;

        //
        // raam1Toe.onclick = function (e){
        //     e.preventDefault();
        //     console.log("toe");
        // };
        // raam1Open.onclick = function (e){
        //     e.preventDefault();
        //     console.log("open");
        // };
        //
        // raam1Stop.onclick = function (e){
        //     e.preventDefault();
        //     console.log("stop");
        // };

    </script>
    </body>
    </html>

    <?php
} else {
    header("Location: login.php");
}
?>