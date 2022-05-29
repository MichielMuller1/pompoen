<?php
session_start();
include "getThreashold.php";

if (isset($_SESSION['user_id']) && isset($_SESSION['user_username'])) {
?>


    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
            <form action="todatabase.php" method="post">
                <div class="row">
                    <div class=" form-group col-6">
                        <label for="ventilator1">ventilator 1</label>
                        <input type="number" name="ventilator1" id="ventilator1">
                        <label class="switch">
                            <input type="checkbox" id="ventilator1Auto" name="ventilator1Auto">
                            <!--                                <input type="checkbox" id="ventilator1_onOff" name="ventilator1_onOff" value="0" class="onOff">-->
                        </label>
                        <label class="switchSlider">
                            <input type="checkbox" id="ventilator1_onOff" name="ventilator1_onOff">
                            <span class="slider round"></span>
                        </label>
                        <br>
                        <label for="raam1">raam 1</label>
                        <input type="number" name="raam1" id="raam1">
                        <label class="switch">
                            <input type="checkbox" id="raam1Auto" name="raam1Auto">
                            <!--                        <input type="checkbox" id="raam1_onOff" name="raam1_onOff" value="0" class="onOff">-->
                        </label>
                        <label class="switchSlider">
                            <input type="checkbox" id="raam1_onOff" name="raam1_onOff">
                            <span class="slider round"></span>
                        </label>
                        <br>
                        <label for="deur1">deur 1</label>
                        <input type="number" name="deur1" id="deur1">
                        <label class="switch">
                            <input type="checkbox" id="deur1Auto" name="deur1Auto" value="0">
                            <!--                        <input type="checkbox" id="deur1_onOff" name="deur1_onOff" value="0" class="onOff">-->
                        </label>
                        <label class="switchSlider">
                            <input type="checkbox" id="deur1_onOff" name="deur1_onOff" value="0">
                            <span class="slider round"></span>
                        </label>
                        <br>
                    </div>

                    <div class="form-group col-6">
                        <label for="ventilator2">ventilator 2</label>
                        <input type="number" name="ventilator2" id="ventilator2">
                        <label class="switch">
                            <input type="checkbox" id="ventilator2Auto" name="ventilator2Auto">
                            <!--                            <input type="checkbox" id="ventilator2_onOff" name="ventilator2_onOff" value="0" class="onOff">-->
                        </label>
                        <label class="switchSlider">
                            <input type="checkbox" id="ventilator2_onOff" name="ventilator2_onOff">
                            <span class="slider round"></span>
                        </label>
                        <br>
                        <label for="raam2">raam 2</label>
                        <input type="number" name="raam2" id="raam2">
                        <label class="switch">
                            <input type="checkbox" id="raam2Auto" name="raam2Auto">
                            <!--                        <input type="checkbox" id="raam2_onOff" name="raam2_onOff" value="0" class="onOff">-->
                        </label>
                        <label class="switchSlider">
                            <input type="checkbox" id="raam2_onOff" name="raam2_onOff">
                            <span class="slider round"></span>
                        </label>
                        <br>
                        <label for="deur2"> deur 2</label>
                        <input type="number" name="deur2" id="deur2">
                        <label class="switch">
                            <input type="checkbox" id="deur2Auto" name="deur2Auto">
                            <!--                        <input type="checkbox" id="deur2_onOff" name="deur2_onOff" value="0" class="onOff">-->
                        </label>
                        <label class="switchSlider">
                            <input type="checkbox" id="deur2_onOff" name="deur2_onOff">
                            <span class="slider round"></span>
                        </label>
                        <br>
                    </div>
                </div>

                <br><br>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="regen">regen</label>
                        <input type="number" name="regen" id="regen">
                        <br>
                        <label for="grondvochtigheid1Laag1">grondvochtigheid 1 laag 1</label>
                        <input type="number" name="grondvochtigheid1Laag1" id="grondvochtigheid1Laag1">

                        <label for="grondvochtigheid1Laag2">grondvochtigheid 1 laag 2</label>
                        <input type="number" name="grondvochtigheid1Laag2" id="grondvochtigheid1Laag2">

                        <label for="grondvochtigheid2Laag1">grondvochtigheid 2 laag 1</label>
                        <input type="number" name="grondvochtigheid2Laag1" id="grondvochtigheid2Laag1">

                        <label for="grondvochtigheid2Laag2">grondvochtigheid 2 laag 2</label>
                        <input type="number" name="grondvochtigheid2Laag2" id="grondvochtigheid2Laag2">
                    </div>

                    <div class="form-group col-6">
                        <label class="switch">
                            <input type="checkbox" id="lichtAuto" name="lichtAuto" value="0">
                            <!--                        <input type="checkbox" id="licht_onOff" name="licht_onOff" value="0" class="onOff">-->
                        </label>

                        <label class="switchSlider">
                            <input type="checkbox" id="licht_onOff" name="licht_onOff" >
                            <span class="slider round"></span>
                        </label>
                        <br>
                        <label for="ledstripSTART"> starttijd
                            <input type="time" id="ledstripSTART" name="ledstripSTART" step="2">
                        </label>
                        <label for="ledstripSTOP"> stoptijd
                            <input type="time" id="ledstripSTOP" name="ledstripSTOP" step="2">
                        </label>
                        <br>
                        <label for="kleur">Lichtkleur</label>
                        <input type="color" id="kleur" name="kleur" onchange="clickColor(0, -1, -1, 5)" style="width: 50%">
                        <br>
                        <label for="api">weersvoorspelling temperatuur</label>
                        <input type="api" name="api" id="api">
                        <br>
                        <label for="minuten">minuten vooraf ramen open zetten</label>
                        <input type="minuten" name="minuten" id="minuten">

                    </div>

                </div>
                <br><br>
                <div class="row">

                    <div class="form-group col-4">
                        <label for="vat1MIN">vat 1 min</label>
                        <input type="number" name="vat1MIN" id="vat1MIN">
                        <br>
                        <label for="vat1MAX">vat 1 max</label>
                        <input type="number" name="vat1MAX" id="vat1MAX">
                        <br>
                        <label class="switch"> water geven automatisch
                            <input type="checkbox" id="vat1Auto" name="vat1Auto" >
                        </label>
                        <label for="tijd1AA"> aantal minuten
                            <input type="number" id="tijd1AA" name="tijd1AA">
                        </label>
                        <br><br>
                        cyclus 1
                        <label class="switch">
                            <input type="checkbox" id="cyclus1" name="cyclus1" >
                        </label>
                        <label for="cyclus1Astart"> starttijd
                            <input type="time" id="cyclus1Astart" name="cyclus1Astart"  step="2">
                        </label>
                        <br><br>
                        cyclus 2
                        <label class="switch">
                            <input type="checkbox" id="cyclus2" name="cyclus2">
                        </label>
                        <label for="cyclus2Astart"> starttijd
                            <input type="time" id="cyclus2Astart" name="cyclus2Astart"  step="2">
                        </label>
                        <br><br>
                        water geven handmatig
                        <label class="switchSlider">
                            <input type="checkbox" id="vat1_watergeven_onOff" name="vat1_watergeven_onOff">
                            <span class="slider round"></span>
                        </label>
                        <label for="tijdvat1wat">vat 1 wateren tijd (in minuten)
                            <input type="number" name="tijdvat1wat" id="tijdvat1wat">
                        </label>
                        <br>
                    </div>



                    <div class="form-group col-4">
                        <label for="vat2MIN">vat 2 min</label>
                        <input type="number" name="vat2MIN" id="vat2MIN">
                        <br>
                        <label for="vat2MAX">vat 2 max</label>
                        <input type="number" name="vat2MAX" id="vat2MAX">
                        <br>
                        <label class="switch"> water geven automatisch
                            <input type="checkbox" id="vat2Auto" name="vat2Auto">
                        </label>
                        <label for="tijd2AA"> aantal minuten
                            <input type="number" id="tijd2AA" name="tijd2AA">
                        </label>
                        <br><br>
                        cyclus 1
                        <label class="switch">
                            <input type="checkbox" id="cyclus12" name="cyclus12">
                        </label>
                        <label for="cyclus12Astart"> starttijd
                            <input type="time" id="cyclus12Astart" name="cyclus12Astart" step="2">
                        </label>
                        <br><br>
                        cyclus 2
                        <label class="switch">
                            <input type="checkbox" id="cyclus22" name="cyclus22" >
                        </label>
                        <label for="cyclus22Astart"> starttijd
                            <input type="time" id="cyclus22Astart" name="cyclus22Astart" step="2">
                        </label>
                        <br><br>
                        water geven handmatig
                        <label class="switchSlider">
                            <input type="checkbox" id="vat2_watergeven_onOff" name="vat2_watergeven_onOff" >
                            <span class="slider round"></span>
                        </label>
                        <label for="tijdvat2wat">vat 2 wateren tijd (in minuten)</label>
                        <input type="number" name="tijdvat2wat" id="tijdvat2wat">
                    </div>

                    <div class="form-group col-4">
                        <label for="vat3MIN">vat 3 min</label>
                        <input type="number" name="vat3MIN" id="vat3MIN">
                        <br>
                        <label for="vat3MAX">vat 3 max</label>
                        <input type="number" name="vat3MAX" id="vat3MAX">
                        <br>
                        <label class="switch"> water geven automatisch
                            <input type="checkbox" id="vat3Auto" name="vat3Auto">
                        </label>
                        <label for="tijd3AA"> aantal minuten
                            <input type="number" id="tijd3AA" name="tijd3AA">
                        </label>
                        <br><br>
                        cyclus 1
                        <label class="switch">
                            <input type="checkbox" id="cyclus13" name="cyclus13" >
                        </label>
                        starttijd
                        <label for="cyclus13Astart">
                            <input type="time" id="cyclus13Astart" name="cyclus13Astart" step="2">
                        </label>
                        <br><br>
                        cyclus 2
                        <label class="switch">
                            <input type="checkbox" id="cyclus23" name="cyclus23" >
                        </label>
                        starttijd
                        <label for="cyclus23Astart">
                            <input type="time" id="cyclus23Astart" name="cyclus23Astart" step="2">
                        </label>
                        <br><br>
                        water geven handmatig
                        <label class="switchSlider">
                            <input type="checkbox" id="vat3_watergeven_onOff" name="vat3_watergeven_onOff" >
                            <span class="slider round"></span>
                        </label>
                        <label for="tijdvat3wat">vat 3 wateren tijd (in minuten)</label>
                        <input type="number" name="tijdvat3wat" id="tijdvat3wat">
                        <br>
                    </div>




                    <button type="submit" class="btn btn-primary" name="pompoen">Submit</button>
                </div>

            </form>
        </div>



        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <script>
            //waardes uit de database standaard in de input velden zetten.
            var ventilator1InputT = document.getElementById("ventilator1");
            var ventilator2InputT = document.getElementById("ventilator2");
            var raam1InputT = document.getElementById("raam1");
            var raam2InputT = document.getElementById("raam2");
            var deur1InputT = document.getElementById("deur1");
            var deur2InputT = document.getElementById("deur2");
            var vat1minInputT = document.getElementById("vat1MIN");
            var vat1maxInputT = document.getElementById("vat1MAX");
            var vat2minInputT = document.getElementById("vat2MIN");
            var vat2maxInputT = document.getElementById("vat2MAX");
            var vat3minInputT = document.getElementById("vat3MIN");
            var vat3maxInputT = document.getElementById("vat3MAX");
            var grond1laag1InputT = document.getElementById("grondvochtigheid1Laag1");
            var grond1laag2InputT = document.getElementById("grondvochtigheid1Laag2");
            var grond2laag1InputT = document.getElementById("grondvochtigheid2Laag1");
            var grond2laag2InputT = document.getElementById("grondvochtigheid2Laag2");
            var regenInputT = document.getElementById("regen");
            var apiTempInputT = document.getElementById("api");
            var apiMinutesInputT = document.getElementById("minuten");


            ventilator1InputT.value = <?= $_SESSION['ventilator1'] ?>;
            ventilator2InputT.value = <?= $_SESSION['ventilator2'] ?>;
            raam1InputT.value = <?= $_SESSION['raam1'] ?>;
            raam2InputT.value = <?= $_SESSION['raam2'] ?>;
            deur1InputT.value = <?= $_SESSION['deur1'] ?>;
            deur2InputT.value = <?= $_SESSION['deur2'] ?>;
            vat1minInputT.value = <?= $_SESSION['vat1min'] ?>;
            vat1maxInputT.value = <?= $_SESSION['vat1max'] ?>;
            vat2minInputT.value = <?= $_SESSION['vat2min'] ?>;
            vat2maxInputT.value = <?= $_SESSION['vat2max'] ?>;
            vat3minInputT.value = <?= $_SESSION['vat3min'] ?>;
            vat3maxInputT.value = <?= $_SESSION['vat3max'] ?>;
            grond1laag1InputT.value = <?= $_SESSION['grond1laag1'] ?>;
            grond1laag2InputT.value = <?= $_SESSION['grond1laag2'] ?>;
            grond2laag1InputT.value = <?= $_SESSION['grond2laag1'] ?>;
            grond2laag2InputT.value = <?= $_SESSION['grond2laag2'] ?>;
            regenInputT.value = <?= $_SESSION['regen'] ?>;
            apiTempInputT.value = <?= $_SESSION['apiTemp'] ?>;
            apiMinutesInputT.value = <?= $_SESSION['apiMinuten'] ?>;
            var ledstripstartONT = document.getElementById("ledstripSTART");
            var ledstripstartOFFT = document.getElementById("ledstripSTOP");



            //automatisch checkboxen juist zetten
            var ventilator1AutoA = document.getElementById("ventilator1Auto");
            var ventilator2AutoA = document.getElementById("ventilator2Auto");
            var raam1AutoA = document.getElementById("raam1Auto");
            var raam2AutoA = document.getElementById("raam2Auto");
            var deur1AutoA = document.getElementById("deur1Auto");
            var deur2AutoA = document.getElementById("deur2Auto");
            var vat1AutoA = document.getElementById("vat1Auto");
            var vat2AutoA = document.getElementById("vat2Auto");
            var vat3AutoA = document.getElementById("vat3Auto");
            var lichtAutoA = document.getElementById("lichtAuto");

            ventilator1AutoA.checked = <?= $_SESSION['ventilator1Auto'] ?>;
            ventilator2AutoA.checked = <?= $_SESSION['ventilator2Auto'] ?>;
            raam1AutoA.checked = <?= $_SESSION['raam1Auto'] ?>;
            raam2AutoA.checked = <?= $_SESSION['raam2Auto'] ?>;
            deur1AutoA.checked = <?= $_SESSION['deur1Auto'] ?>;
            deur2AutoA.checked = <?= $_SESSION['deur2Auto'] ?>;
            vat1AutoA.checked = <?= $_SESSION['vat1Auto'] ?>;
            vat2AutoA.checked = <?= $_SESSION['vat2Auto'] ?>;
            vat3AutoA.checked = <?= $_SESSION['vat3Auto'] ?>;
            lichtAutoA.checked = <?= $_SESSION['lichtAuto'] ?>;





            var cyclus1ONOFFA = document.getElementById("cyclus1");
            cyclus1ONOFFA.checked = <?= $_SESSION['cyclus1A'] ?>;
            var cyclus1startONOFFA = document.getElementById("cyclus1Astart");
            var cyclus2ONOFFA = document.getElementById("cyclus2");
            cyclus2ONOFFA.checked = <?= $_SESSION['cyclus2A'] ?>;
            var cyclus2startONOFFA = document.getElementById("cyclus2Astart");
            var cyclus12ONOFFA = document.getElementById("cyclus12");
            cyclus12ONOFFA.checked = <?= $_SESSION['cyclus12A'] ?>;
            var cyclus12startONOFFA = document.getElementById("cyclus12Astart");
            var cyclus22ONOFFA = document.getElementById("cyclus22");
            cyclus22ONOFFA.checked = <?= $_SESSION['cyclus22A'] ?>;
            var cyclus22startONOFFA = document.getElementById("cyclus22Astart");
            var cyclus13ONOFFA = document.getElementById("cyclus13");
            cyclus13ONOFFA.checked = <?= $_SESSION['cyclus13A'] ?>;
            var cyclus13startONOFFA = document.getElementById("cyclus13Astart");
            var cyclus23ONOFFA = document.getElementById("cyclus23");
            cyclus23ONOFFA.checked = <?= $_SESSION['cyclus23A'] ?>;
            var cyclus23startONOFFA = document.getElementById("cyclus23Astart");
            var tijdvat1AA = document.getElementById("tijd1AA");
            tijdvat1AA.checked = <?= $_SESSION['tijdvat1A'] ?>;
            var tijdvat2AA = document.getElementById("tijd2AA");
            tijdvat2AA.checked = <?= $_SESSION['tijdvat2A'] ?>;
            var tijdvat3AA = document.getElementById("tijd3AA");
            tijdvat3AA.checked = <?= $_SESSION['tijdvat3A'] ?>;

            //controls juistzetten met wat er in de database staat
            var ventilator1ONOFFc = document.getElementById("ventilator1_onOff");
            var ventilator2ONOFFc = document.getElementById("ventilator2_onOff");
            var raam1ONOFFc = document.getElementById("raam1_onOff");
            var raam2ONOFFc = document.getElementById("raam2_onOff");
            var deur1ONOFFc = document.getElementById("deur1_onOff");
            var deur2ONOFFc = document.getElementById("deur2_onOff");
            var vat1tijdc = document.getElementById("tijdvat1wat");
            var vat1waterenc = document.getElementById("vat1_watergeven_onOff");
            var vat2tijdc = document.getElementById("tijdvat2wat");
            var vat2waterenc = document.getElementById("vat2_watergeven_onOff");
            var vat3tijdc = document.getElementById("tijdvat3wat");
            var vat3waterenc = document.getElementById("vat3_watergeven_onOff");
            var lichtONOFFc = document.getElementById("licht_onOff");


            ventilator1ONOFFc.checked = <?= $_SESSION['ventilator1ONOFF'] ?>;
            ventilator2ONOFFc.checked = <?= $_SESSION['ventilator2ONOFF'] ?>;
            raam1ONOFFc.checked = <?= $_SESSION['raam1ONOFF'] ?>;
            raam2ONOFFc.checked = <?= $_SESSION['raam2ONOFF'] ?>;
            deur1ONOFFc.checked = <?= $_SESSION['deur1ONOFF'] ?>;
            deur2ONOFFc.checked = <?= $_SESSION['deur2ONOFF'] ?>;
            vat1tijdc.checked = <?= $_SESSION['tijdvat1c'] ?>;
            vat1waterenc.checked = <?= $_SESSION['vat1wateren'] ?>;
            vat2tijdc.checked = <?= $_SESSION['tijdvat2c'] ?>;
            vat2waterenc.checked = <?= $_SESSION['vat2wateren'] ?>;
            vat3tijdc.checked = <?= $_SESSION['tijdvat3c'] ?>;
            vat3waterenc.checked = <?= $_SESSION['vat3wateren'] ?>;
            lichtONOFFc.checked = <?= $_SESSION['lichtONOFF'] ?>;

            //ledstripstartONT.value = <?= $_SESSION['ledstripSTO'] ?>;
            //ledstripstartOFFT.value = <?= $_SESSION['ledstripSTA'] ?>;
            //var kleurT = document.getElementById("kleur");
            // var lichtKleurInput = document.getElementById("lichtKleur");
            //lichtKleurInput.value = <?= $_SESSION['lichtkleur'] ?>;
            //kleurT.value = <?= $_SESSION['kleur'] ?>;
            //cyclus13startONOFFA.checked = <?= $_SESSION['cyclus13Astart'] ?>;
            //cyclus23startONOFFA.checked = <?= $_SESSION['cyclus23Astart'] ?>;
            //cyclus1startONOFFA.checked = <?= $_SESSION['cyclus1Astart'] ?>;
            //cyclus2startONOFFA.checked = <?= $_SESSION['cyclus2Astart'] ?>;
            //cyclus12startONOFFA.checked = <?= $_SESSION['cyclus12Astart'] ?>;
            //cyclus22startONOFFA.checked = <?= $_SESSION['cyclus22Astart'] ?>;
        </script>
    </body>

    </html>

<?php
} else {
    header("Location: login.php");
}
?>