<?php
session_start();
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
                                <a class="nav-link " href="threshold.php">threashold</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">graph</a>
                            </li>
                        </ul>
                        <p><?= $_SESSION['user_full_name'] ?></p>
                        <a href="logout.php" class="btn btn-warning">LOGOUT</a>
                    </div>
                </div>
            </nav>
            <p>graph</p>

            <form action="/action_page.php">
                <div class="form-group my-3">
                    <label for="datetimeFrom">van</label>
                    <input type="datetime-local" id="datetimeFrom" name="datetimeFrom">
                </div>
                <div class="form-group mb-3">
                    <label for="datetimeUntil">tot</label>
                    <input type="datetime-local" id="datetimeUntil" name="datetimeUntil">
                </div>
                <button type="submit" class="btn btn-primary">Kiezen</button>

            </form>

            <canvas id="myChart"></canvas>
            <hr>
            <canvas id="myChart2"></canvas>
        </div>

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
        <script src="charts.js"></script>

    </body>
    </html>

    <?php
} else {
    header("Location: login.php");
}
?>