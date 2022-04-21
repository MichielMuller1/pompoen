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
                                <input type="checkbox" id="ventilator1Automatic">
                            </label>
                        </div>

                    </div>
                    <div class="form-group col-6">
                        <label for="ventilator2">ventilator 2</label>
                        <input type="number" name="ventilator2" id="ventilator2">
                        <label class="switch">
                            <input type="checkbox" id="ventilator2Automatic">
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="raam1">raam 1</label>
                    <input type="number" name="raam1" id="raam1">
                    <label class="switch">
                        <input type="checkbox" id="raam1Automatic">
                    </label>
                </div>
                <div class="form-group">
                    <label for="raam2">raam 2</label>
                    <input type="number" name="raam2" id="raam2">
                    <label class="switch">
                        <input type="checkbox" id="raam2Automatic">
                    </label>
                </div>
                <div class="form-group">
                    <label for="deur1">deur 1</label>
                    <input type="number" name="deur1" id="deur1">
                    <label class="switch">
                        <input type="checkbox" id="deur1Automatic">
                    </label>
                </div>
                <div class="form-group">
                    <label for="deur2"> deur 2</label>
                    <input type="number" name="deur2" id="deur2">
                    <label class="switch">
                        <input type="checkbox" id="deur2Automatic">
                    </label>
                </div>
                <div class="form-group">
                    <label for="vat1">vat 1</label>
                    <input type="number" name="vat1" id="vat1">
                    <label class="switch">
                        <input type="checkbox" id="vat1Automatic">
                    </label>
                </div>
                <div class="form-group">
                    <label for="vat2">vat 2</label>
                    <input type="number" name="vat2" id="vat2">
                    <label class="switch">
                        <input type="checkbox" id="vat2Automatic">
                    </label>
                </div>
                <div class="form-group">
                    <label for="grondvochtigheid1">grondvochtigheid 1</label>
                    <input type="number" name="grondvochtigheid1" id="grondvochtigheid1">
                    <label class="switch">
                        <input type="checkbox" id="grondvochtigheid1Automatic">
                    </label>
                </div>
                <div class="form-group">
                    <label for="grondvochtigheid2">grondvochtigheid 2</label>
                    <input type="number" name="grondvochtigheid2" id="grondvochtigheid2">
                    <label class="switch">
                        <input type="checkbox" id="grondvochtigheid2Automatic">
                    </label>
                </div>
                <div class="form-group">
                    <label for="licht">licht</label>
                    <input type="number" name="licht" id="licht">
                    <label class="switch">
                        <input type="checkbox" id="lichtAutomatic">
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Kiezen</button>
            </form>
        </div>
    </div>
    <script>
        var ventilator1Input = document.getElementById("ventilator1");
        ventilator1Input.value = <?= $_SESSION['ventilator1'] ?>;
        var ventilator2Input = document.getElementById("ventilator2");
        ventilator2Input.value = <?= $_SESSION['ventilator2'] ?>;
        var raam1Input = document.getElementById("raam1");
        raam1Input.value = <?= $_SESSION['raam1'] ?>;

    </script>
    </body>
    </html>

    <?php
} else {
    header("Location: login.php");
}
?>