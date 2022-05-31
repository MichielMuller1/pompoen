<?php
session_start();
//include "graphDate.php";
//test


if (isset($_SESSION['user_id']) && isset($_SESSION['user_username'])) {
    ?>
    <!--
      Rui Santos
      Complete project details at https://RandomNerdTutorials.com/esp32-cam-post-image-photo-server/

      Permission is hereby granted, free of charge, to any person obtaining a copy
      of this software and associated documentation files.

      The above copyright notice and this permission notice shall be included in all
      copies or substantial portions of the Software.
    -->

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



        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <div class="container mb-5">
            <nav class="navbar navbar-expand-lg navbar-light">
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
                            <a class="nav-link" href="threshold.php">threshold</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="camera.php" aria-current="page">camera</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://192.168.0.5:3000">grafana</a>
                        </li>
                    </ul>

                    <a href="logout.php" class="btn btn-warning ml-auto">LOGOUT</a>
                </div>
            </nav>
            <h2 class="geleAchtergrond text-center my-3">pompoen 1</h2>
            <img src="uploads/pompoen1.jpg" alt="pompoen1" class="responsive">
            <h2 class="geleAchtergrond text-center my-3">pompoen 2</h2>
            <img src="uploads/pompoen2.jpg" alt="pompoen2" class="responsive">
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