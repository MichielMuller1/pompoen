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

        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/favicon/site.webmanifest">
        <link rel="shortcut icon" href="/favicon/favicon.ico">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-config" content="/favicon/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
    <div class="container mb-5">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="#">Pompoen</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
                    <li class="nav-item">
                        <a class="nav-link" href="http://192.168.0.5:3000">grafana</a>
                    </li>
                </ul>

                <a href="logout.php" class="btn btn-warning ml-auto">LOGOUT</a>
            </div>
        </nav>


        <div>
            <form action="todatabase.php" method="post">
                <h2 class="text-center geleAchtergrond">temperatuur</h2>
                <p>Boven deze temperatuur gaat de ventilator aan.</p>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="ventilator1">ventilators</label>
                            <div class="d-flex">
                                <input type="number" name="ventilator1" id="ventilator1"
                                       value="<?= $_SESSION['ventilator1'] ?>" required>
                                <label class="switch">
                                    <input type="checkbox" id="ventilator1Automatic" name="ventilator1Automatic"
                                           value="<?= $_SESSION['ventilator1Auto'] ?>" value="0">
                                </label>
                                <label class="switchSlider">
                                    <input type="checkbox" id="ventilator1_onOff" name="ventilator1_onOff"
                                           value="<?= $_SESSION['ventilator1ONOFF'] ?>"
                                           class="onOff">
                                    <span class="slider round"></span>
                                </label></div>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="regen">regen %</label>
                            <input type="number" name="regen" id="regen" value="<?= $_SESSION['regen'] ?>" required>
                        </div>
                    </div>
                </div>
                <p>Boven deze temperatuuren gaan de ramen omhoog.</p>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="raam1">raam 1</label>
                            <div class="d-flex"><input type="number" name="raam1" id="raam1"
                                                       value="<?= $_SESSION['raam1'] ?>" required>
                                <label class="switch">
                                    <input type="checkbox" id="raam1Automatic" name="raam1Automatic" value="0">
                                    <!--                        <input type="checkbox" id="raam1_onOff" name="raam1_onOff" value="0" class="onOff">-->
                                </label></div>
                            <!--                    <label class="switchSlider">-->
                            <!--                        <input type="checkbox" id="raam1_onOff" name="raam1_onOff" value="0" class="onOff">-->
                            <!--                        <span class="slider round"></span>-->
                            <!--                    </label>-->
                            <div class="mt-2 raambuttons">
                                <button class="btn btn-success" id="raam1Open" name="raam1Open" value="o">open</button>
                                <button class="btn btn-success" id="raam1Toe" name="raam1Toe" value="t">toe</button>
<!--                                <button class="btn btn-danger" id="raam1Stop" name="raam1Stop" value="s">stop</button>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="raam2">raam 2</label>
                            <div class="d-flex"><input type="number" name="raam2" id="raam2"
                                                       value="<?= $_SESSION['raam2'] ?>" required>
                                <label class="switch">
                                    <input type="checkbox" id="raam2Automatic" name="raam2Automatic" value="0">
                                    <!--                        <input type="checkbox" id="raam2_onOff" name="raam2_onOff" value="0" class="onOff">-->
                                </label></div>
                            <!--                    <label class="switchSlider">-->
                            <!--                        <input type="checkbox" id="raam2_onOff" name="raam2_onOff" value="0" class="onOff">-->
                            <!--                        <span class="slider round"></span>-->
                            <!--                    </label>-->
                            <div class="mt-2 raambuttons">
                                <button type="submit" class="btn btn-success" id="raam2Open" name="raam2Open" value="o">
                                    open
                                </button>
                                <button type="submit" class="btn btn-success" id="raam2Toe" name="raam2Toe" value="o">
                                    toe
                                </button>
<!--                                <button type="submit" class="btn btn-danger" id="raam2Stop" name="raam2Stop" value="o">-->
<!--                                    stop-->
<!--                                </button>-->
                            </div>
                        </div>
                    </div>
                </div>

                <p>Boven deze temperatuuren gaan de deuren open.</p>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="deur1">deur 1</label>
                            <div class="d-flex"><input type="number" name="deur1" id="deur1"
                                                       value="<?= $_SESSION['deur1'] ?>" required>
                                <label class="switch">
                                    <input type="checkbox" id="deur1Automatic" name="deur1Automatic" value="0">
                                    <!--                        <input type="checkbox" id="deur1_onOff" name="deur1_onOff" value="0" class="onOff">-->
                                </label>
                                <label class="switchSlider">
                                    <input type="checkbox" id="deur1_onOff" name="deur1_onOff" value="0" class="onOff">
                                    <span class="slider round"></span>
                                </label></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="deur2"> deur 2</label>
                            <div class="d-flex"><input type="number" name="deur2" id="deur2"
                                                       value="<?= $_SESSION['deur2'] ?>" required>
                                <label class="switch">
                                    <input type="checkbox" id="deur2Automatic" name="deur2Automatic" value="0">
                                    <!--                        <input type="checkbox" id="deur2_onOff" name="deur2_onOff" value="0" class="onOff">-->
                                </label>
                                <label class="switchSlider">
                                    <input type="checkbox" id="deur2_onOff" name="deur2_onOff" value="0" class="onOff">
                                    <span class="slider round"></span>
                                </label></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-sm-12"><label for="api">weersvoorspelling temperatuur</label>
                            <input type="number" name="api" id="api" value="<?= $_SESSION['apiTemp'] ?>" required></div>
                        <div class="col-md-6 col-sm-12"><label for="minuten">minuten vooraf ramen open zetten</label>
                            <input type="number" name="minuten" id="minuten" value="<?= $_SESSION['apiMinuten'] ?>"
                                   required></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Kiezen</button>
                <h2 class="text-center geleAchtergrond">watervat pompoen 1</h2>
                <div class="form-group">

                    <div class="row">
                        <div class="col-md-4 col-sm-6"><label for="vat1MIN">vat 1 min</label>
                            <input type="number" name="vat1MIN" id="vat1MIN" value="<?= $_SESSION['vat1min'] ?>"
                                   required></div>
                        <div class="col-md-4 col-sm-6">
                            <label for="vat1MAX">vat 1 max</label>
                            <div class="d-flex">
                                <input type="number" name="vat1MAX" id="vat1MAX" value="<?= $_SESSION['vat1max'] ?>"
                                       required>
                                <div class="d-flex">
                                    <label class="switch">
                                        <input type="checkbox" id="vat1Automatic" name="vat1Automatic" value="0">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label for="tijdvat1">handmatige minuten</label>
                            <div class="d-flex"><input type="number" name="tijdvat1" id="tijdvat1"
                                                       value="<?= $_SESSION['tijdvat1'] ?>"
                                                       required>
                                <label class="switchSlider">
                                    <input type="checkbox" id="vat1_watergeven_onOff" name="vat1_watergeven_onOff"
                                           value="0"
                                           class="onOff">
                                    <span class="slider round"></span>
                                </label></div>
                        </div>

                    </div>


                </div>
                <p class="mt-5">Bij automatisch gelden de aangevinkte cyclussen voor het ingesteld aantal minuten.</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="d-flex">
                                <div class="d-flex">
                                    <label for="cyclus1A"> cyclus 1</label>
                                    <input type="checkbox" id="cyclus1A" name="cyclus1A" value="0"
                                           checked="<?= $_SESSION['cyclus1A'] ?>">
                                </div>
                                <div class="d-flex">
                                    <label for="cyclus1Astart">cyclus 1 start</label>
                                    <input type="time" step="1" name="cyclus1Astart" id="cyclus1Astart"
                                           value="<?= $_SESSION['cyclus1Astart'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="d-flex">
                                <div class="d-flex">
                                    <label for="cyclus12A"> cyclus 2</label>
                                    <input type="checkbox" id="cyclus12A" name="cyclus12A" value="0"
                                           checked="<?= $_SESSION['cyclus12A'] ?>">
                                </div>

                                <div class="d-flex">
                                    <label for="cyclus12Astart">cyclus 2 start</label>
                                    <input type="time" step="1" name="cyclus12Astart" id="cyclus12Astart"
                                           value="<?= $_SESSION['cyclus12Astart'] ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-sm-12">
                            <div class="d-flex">
                                <div class="d-flex"><label for="cyclus13A"> cyclus 3</label>
                                    <input type="checkbox" id="cyclus13A" name="cyclus13A" value="0"
                                           checked="<?= $_SESSION['cyclus13A'] ?>"></div>

                                <div class="d-flex"><label for="cyclus13Astart">cyclus 3 start</label>
                                    <input type="time" step="1" name="cyclus13Astart" id="cyclus13Astart"
                                           value="<?= $_SESSION['cyclus13Astart'] ?>" required></div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="d-flex">
                                <label for="tijdvat1A">cyclus minuten</label>
                                <input type="number" name="tijdvat1A" id="tijdvat1A"
                                       value="<?= $_SESSION['tijdvat1A'] ?>"
                                       required>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-5">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="grondvochtigheid1Laag1">grondvochtigheid laag 1</label>
                            <input type="number" name="grondvochtigheid1Laag1" id="grondvochtigheid1Laag1"
                                   value="<?= $_SESSION['grond1laag1'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="grondvochtigheid1Laag2">grondvochtigheid laag 2</label>
                            <input type="number" name="grondvochtigheid1Laag2" id="grondvochtigheid1Laag2"
                                   value="<?= $_SESSION['grond1laag2'] ?>" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Kiezen</button>
                <!--                -->
                <!--          begin      -->
                <!--                -->
                <h2 class="text-center geleAchtergrond">watervat pompoen 2</h2>
                <div class="form-group">

                    <div class="row">
                        <div class="col-md-4 col-sm-6"><label for="vat2MIN">vat 1 min</label>
                            <input type="number" name="vat2MIN" id="vat2MIN" value="<?= $_SESSION['vat2min'] ?>"
                                   required></div>
                        <div class="col-md-4 col-sm-6">
                            <label for="vat2MAX">vat 2 max</label>
                            <div class="d-flex">
                                <input type="number" name="vat2MAX" id="vat2MAX" value="<?= $_SESSION['vat2max'] ?>"
                                       required>
                                <div class="d-flex">
                                    <label class="switch">
                                        <input type="checkbox" id="vat2Automatic" name="vat2Automatic" value="0">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label for="tijdvat2">handmatige minuten</label>
                            <div class="d-flex"><input type="number" name="tijdvat2" id="tijdvat2"
                                                       value="<?= $_SESSION['tijdvat2'] ?>"
                                                       required>
                                <label class="switchSlider">
                                    <input type="checkbox" id="vat2_watergeven_onOff" name="vat2_watergeven_onOff"
                                           value="0"
                                           class="onOff">
                                    <span class="slider round"></span>
                                </label></div>
                        </div>

                    </div>


                </div>
                <p>Bij automatisch gelden de aangevinkte cyclussen voor het ingesteld aantal minuten.</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="d-flex">
                                <div class="d-flex">
                                    <label for="cyclus2A"> cyclus 1</label>
                                    <input type="checkbox" id="cyclus2A" name="cyclus2A" value="0"
                                           checked="<?= $_SESSION['cyclus2A'] ?>">
                                </div>
                                <div class="d-flex">
                                    <label for="cyclus2Astart">cyclus 1 start</label>
                                    <input type="time" step="1" name="cyclus2Astart" id="cyclus2Astart"
                                           value="<?= $_SESSION['cyclus2Astart'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="d-flex">
                                <div class="d-flex">
                                    <label for="cyclus22A"> cyclus 2</label>
                                    <input type="checkbox" id="cyclus22A" name="cyclus22A" value="0"
                                           checked="<?= $_SESSION['cyclus22A'] ?>">
                                </div>

                                <div class="d-flex">
                                    <label for="cyclus22Astart">cyclus 2 start</label>
                                    <input type="time" step="1" name="cyclus22Astart" id="cyclus22Astart"
                                           value="<?= $_SESSION['cyclus22Astart'] ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-sm-12">
                            <div class="d-flex">
                                <div class="d-flex"><label for="cyclus23A"> cyclus 3</label>
                                    <input type="checkbox" id="cyclus23A" name="cyclus23A" value="0"
                                           checked="<?= $_SESSION['cyclus23A'] ?>"></div>

                                <div class="d-flex"><label for="cyclus23Astart">cyclus 3 start</label>
                                    <input type="time" step="1" name="cyclus23Astart" id="cyclus23Astart"
                                           value="<?= $_SESSION['cyclus23Astart'] ?>" required></div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="d-flex"><label for="tijdvat2A">cyclus minuten</label>
                                <input type="number" name="tijdvat2A" id="tijdvat2A"
                                       value="<?= $_SESSION['tijdvat2A'] ?>"
                                       required></div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="grondvochtigheid2Laag1">grondvochtigheid laag 1</label>
                            <input type="number" name="grondvochtigheid2Laag1" id="grondvochtigheid2Laag1"
                                   value="<?= $_SESSION['grond2laag1'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="grondvochtigheid2Laag2">grondvochtigheid laag 2</label>
                            <input type="number" name="grondvochtigheid2Laag2" id="grondvochtigheid2Laag2"
                                   value="<?= $_SESSION['grond2laag2'] ?>" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Kiezen</button>

                <h2 class="text-center geleAchtergrond">licht</h2>
                <p>Tussen deze uren wordt het licht aangezet.</p>


                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <label for="ledVanaf">starttijd</label>
                            <input type="time" name="ledVanaf" id="ledVanaf" step="1"
                                   value="<?= $_SESSION['ledstripstart'] ?>"
                                   required>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label for="ledTot">eindtijd</label>
                            <div class="d-flex"><input type="time" name="ledTot" id="ledTot" step="1"
                                      value="<?= $_SESSION['ledstripstop'] ?>"
                                      required>
                                <label class="switch">
                                    <input type="checkbox" id="lichtAutomatic" name="lichtAutomatic" value="0">
                                </label>
                                <label class="switchSlider">
                                    <input type="checkbox" id="licht_onOff" name="licht_onOff" value="0" class="onOff">
                                    <span class="slider round"></span>
                                </label></div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <label for="kleur">Lichtkleur</label>
                            <input type="color" id="kleur" name="kleur" onchange="clickColor(0, -1, -1, 5)"
                                   style="width: 50%" value="<?= $_SESSION['kleur'] ?>">
                        </div>
                    </div>
                </div>







                <button type="submit" class="btn btn-success">Kiezen</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script>

        var ventilatorAuto = document.getElementById("ventilator1Automatic");
        ventilatorAuto.checked = <?=$_SESSION['ventilator1Auto']?>;
        var ventilatorONOFF = document.getElementById("ventilator1_onOff");
        ventilatorONOFF.checked = <?=$_SESSION['ventilator1ONOFF']?>;
        var raam1Auto = document.getElementById("raam1Automatic");
        raam1Auto.checked = <?=$_SESSION['raam1Auto']?>;
        var raam2Auto = document.getElementById("raam2Automatic");
        raam2Auto.checked = <?=$_SESSION['raam2Auto']?>;
        var deur1Auto = document.getElementById("deur1Automatic");
        deur1Auto.checked = <?=$_SESSION['deur1Auto']?>;
        var deur2Auto = document.getElementById("deur2Automatic");
        deur2Auto.checked = <?=$_SESSION['deur2Auto']?>;
        var deur1ONOFF = document.getElementById("deur1_onOff");
        deur1ONOFF.checked = <?=$_SESSION['deur1ONOFF']?>;
        var deur2ONOFF = document.getElementById("deur2_onOff");
        deur2ONOFF.checked = <?=$_SESSION['deur2ONOFF']?>;

        var vat1Auto = document.getElementById("vat1Automatic");
        vat1Auto.checked = <?=$_SESSION['vat1Auto']?>;
        var vat1ONOFF = document.getElementById("vat1_watergeven_onOff");
        vat1ONOFF.checked = <?=$_SESSION['vat1wateren']?>;

        var vat2Auto = document.getElementById("vat2Automatic");
        vat2Auto.checked = <?=$_SESSION['vat2Auto']?>;
        var vat2ONOFF = document.getElementById("vat2_watergeven_onOff");
        vat2ONOFF.checked = <?=$_SESSION['vat2wateren']?>;


        var cyclus1A = document.getElementById('cyclus1A')
        cyclus1A.checked = <?=$_SESSION['cyclus1A']?>;
        var cyclus12A = document.getElementById('cyclus12A')
        cyclus12A.checked = <?=$_SESSION['cyclus12A']?>;
        var cyclus13A = document.getElementById('cyclus13A')
        cyclus13A.checked = <?=$_SESSION['cyclus13A']?>;
        var cyclus2A = document.getElementById('cyclus2A')
        cyclus2A.checked = <?=$_SESSION['cyclus2A']?>;
        var cyclus22A = document.getElementById('cyclus22A')
        cyclus22A.checked = <?=$_SESSION['cyclus22A']?>;
        var cyclus23A = document.getElementById('cyclus23A')
        cyclus23A.checked = <?=$_SESSION['cyclus23A']?>;

        var lichtAuto = document.getElementById("lichtAutomatic");
        lichtAuto.checked = <?=$_SESSION['lichtAuto']?>;
        var lichtONOFF = document.getElementById("licht_onOff");
        lichtONOFF.checked = <?=$_SESSION['lichtONOFF']?>;

        var raam1Open = document.getElementById("raam1Open");
        var raam2Open = document.getElementById("raam2Open");
        var raam1Toe = document.getElementById("raam1Toe");
        var raam2Toe = document.getElementById("raam2Toe");
        // var raam1Stop = document.getElementById("raam1Stop");
        // var raam2Stop = document.getElementById("raam2Stop");

        if(ventilatorAuto.checked){
            ventilatorONOFF.setAttribute('disabled','');
        }else {
            ventilatorONOFF.removeAttribute('disabled');
        }

        if(raam1Auto.checked){
            raam1Open.setAttribute('disabled','');
            raam1Toe.setAttribute('disabled','');
            // raam1Stop.setAttribute('disabled','');
        }else {
            raam1Open.removeAttribute('disabled');
            raam1Toe.removeAttribute('disabled');
            // raam1Stop.removeAttribute('disabled');
        }

        if(raam2Auto.checked){
            raam2Open.setAttribute('disabled','');
            raam2Toe.setAttribute('disabled','');
            raam2Stop.setAttribute('disabled','');
        }else {
            raam2Open.removeAttribute('disabled');
            raam2Toe.removeAttribute('disabled');
            raam2Stop.removeAttribute('disabled');
        }
        if(deur1Auto.checked){
            deur1ONOFF.setAttribute('disabled','')
        }else {
            deur1ONOFF.removeAttribute('disabled');
        }
        if(deur2Auto.checked){
            deur2ONOFF.setAttribute('disabled','')
        }else {
            deur2ONOFF.removeAttribute('disabled');
        }
        if(vat1Auto.checked){
            vat1ONOFF.setAttribute('disabled','')
        }else {
            vat1ONOFF.removeAttribute('disabled');
        }
        if(vat2Auto.checked){
            vat2ONOFF.setAttribute('disabled','')
        }else {
            vat2ONOFF.removeAttribute('disabled');
        }
        if(lichtAuto.checked){
            lichtONOFF.setAttribute('disabled','')
        }else {
            lichtONOFF.removeAttribute('disabled');
        }

        //disablen
        ventilatorAuto.onclick =function (){
            if(ventilatorAuto.checked){
                ventilatorONOFF.setAttribute('disabled','');
            }else {
                ventilatorONOFF.removeAttribute('disabled');
            }
        }

        raam1Auto.onclick=function (){
            if(raam1Auto.checked){
                raam1Open.setAttribute('disabled','');
                raam1Toe.setAttribute('disabled','');
                raam1Stop.setAttribute('disabled','');
            }else {
                raam1Open.removeAttribute('disabled');
                raam1Toe.removeAttribute('disabled');
                raam1Stop.removeAttribute('disabled');
            }
        }

        raam2Auto.onclick=function (){
            if(raam2Auto.checked){
                raam2Open.setAttribute('disabled','');
                raam2Toe.setAttribute('disabled','');
                raam2Stop.setAttribute('disabled','');
            }else {
                raam2Open.removeAttribute('disabled');
                raam2Toe.removeAttribute('disabled');
                raam2Stop.removeAttribute('disabled');
            }
        }


        deur1Auto.onclick = function (){
            if(deur1Auto.checked){
                deur1ONOFF.setAttribute('disabled','')
            }else {
                deur1ONOFF.removeAttribute('disabled');
            }
        }
        deur2Auto.onclick = function (){
            if(deur2Auto.checked){
                deur2ONOFF.setAttribute('disabled','')
            }else {
                deur2ONOFF.removeAttribute('disabled');
            }
        }

        vat1Auto.onclick = function (){
            if(vat1Auto.checked){
                vat1ONOFF.setAttribute('disabled','')
            }else {
                vat1ONOFF.removeAttribute('disabled');
            }
        }
        vat2Auto.onclick = function (){
            if(vat2Auto.checked){
                vat2ONOFF.setAttribute('disabled','')
            }else {
                vat2ONOFF.removeAttribute('disabled');
            }
        }

        lichtAuto.onclick = function (){
            if(lichtAuto.checked){
                lichtONOFF.setAttribute('disabled','')
            }else {
                lichtONOFF.removeAttribute('disabled');
            }
        }



    </script>
    </body>
    </html>

    <?php
} else {
    header("Location: login.php");
}
?>