<?php
session_start();
//include "graphDate.php";

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
                            <a class="nav-link" href="status.php">current</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="threshold.php">threashold</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="graph.php" aria-current="page">graph</a>
                        </li>
                    </ul>
                    <p><?= $_SESSION['user_full_name'] ?></p>
                    <a href="logout.php" class="btn btn-warning">LOGOUT</a>
                </div>
            </nav>
            <p>graph</p>

            <form action="/graphBack.php" method="post">
                <div class="form-group my-3">
                    <label for="datetimeFrom">van</label>
                    <input type="datetime-local" id="datetimeFrom" name="datetimeFrom" required>
                </div>
                <div class="form-group mb-3">
                    <label for="datetimeUntil">tot</label>
                    <input type="datetime-local" id="datetimeUntil" name="datetimeUntil" required>
                </div>
                <button type="submit" class="btn btn-primary">Kiezen</button>

            </form>

            <?php
                $datetimeFrom = isset($_POST['datetimeFrom']) ? $_POST['datetimeFrom'] : 0;
                $datetimeUntil = isset($_POST['datetimeUntil']) ? $_POST['datetimeUntil'] : 0;

                $_SESSION['datetimeFrom'] = $datetimeFrom;
                $_SESSION['datetimeUntil'] = $datetimeUntil;

                print_r($datetimeFrom);
                print_r($datetimeUntil);

                $tijden = $_SESSION['gewichtTijden'];
                $gewichtP1 = $_SESSION['gewichtP1'];
                $gewichtP2 = $_SESSION['gewichtP2'];
                print_r($tijden);
                print_r($gewichtP1);
                print_r($gewichtP2);

            ?>

            <canvas id="myChart"></canvas>
            <hr>
            <canvas id="myChart2"></canvas>
        </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<!--        <script src="charts.js"></script>-->
        <script>
            // var ventilator1Check = document.getElementById('ventilator1Automatic');
            // ventilator1Check.addEventListener('click',function (){
            //     if (ventilator1Check.checked){
            //         console.log('on');
            //     }else{
            //         console.log('off');
            //     }
            // });

            ////////////////
            //charts////////
            ////////////////
            let myChart = document.getElementById('myChart').getContext('2d');
            let myChart2 = document.getElementById('myChart2').getContext('2d');

            //global options for all charts
            console.log(<?php echo json_encode($_SESSION['gewichtTijden'])?>);

            let gewichtChart = new Chart(myChart, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($_SESSION['gewichtTijden'])?>,
                    // labels:['2019-12-04','2019-12-05','2019-12-06','2019-12-07','2019-12-08','2019-12-09'],
                    legend: {
                        display:true
                    },
                    datasets: [
                        {
                            label:'pompoen1',
                            data: <?php echo json_encode($_SESSION['gewichtP1'])?>,
                            // data:[
                            //     20,
                            //     40,
                            //     50,
                            //     100,
                            //     200,
                            //     300
                            // ],
                            fill:false,
                            borderColor: 'rgb(75, 192, 192)'
                        },
                        {
                            label:'pompoen2',
                            data: <?php echo json_encode($_SESSION['gewichtP2'])?>,
                            // data:[
                            //     202,
                            //     405,
                            //     548,
                            //     562,
                            //     105,
                            //     356
                            // ],
                            fill: false,
                            borderColor: 'rgb(20, 19, 192)'
                        }
                    ],

                },
                options: {
                    elements: {
                        line: {
                            tension: 0 // disables bezier curves
                        }
                    },
                    title: {
                        display: true,
                        text: 'pompoen gewicht'
                    },
                    scales: {
                        // x: {
                        //     type: 'time',
                        // },
                        xAxes:[{
                            scaleLabel: {
                                display: true,
                                labelString: 'tijd',
                                type: 'time',
                            }
                        }],

                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'gewicht'
                            }
                        }],
                        // y: {
                        //     suggestedMin: 0,
                        //     suggestedMax: 1500,
                        // },


                    }
                }
            });

            let temperatuur = new Chart(myChart2, {
                type: 'line',
                data: {
                    labels:['2019-12-04','2019-12-05','2019-12-06','2019-12-07','2019-12-08','2019-12-09'],
                    legend: {
                        display:true
                    },
                    datasets: [
                        {
                            label:'pompoen1',
                            data:[
                                20,
                                22,
                                30,
                                24,
                                28,
                                32
                            ],
                            fill:false,
                            borderColor: 'rgb(75, 192, 192)'
                        },
                        {
                            label:'pompoen2',
                            data:[
                                28,
                                40,
                                25,
                                36,
                                18,
                                40
                            ],
                            fill: false,
                            borderColor: 'rgb(20, 19, 192)'
                        }
                    ],

                },
                options: {
                    elements: {
                        line: {
                            tension: 0 // disables bezier curves
                        }
                    },
                    title: {
                        display: true,
                        text: 'temperatuur'
                    },
                    scales: {
                        xAxes:[{
                            scaleLabel: {
                                display: true,
                                labelString: 'tijd',
                            }
                        }],

                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'temperatuur (°C)'
                            }
                        }],
                        // y: {
                        //     suggestedMin: 0,
                        //     suggestedMax: 1500,
                        // },


                    }
                }

            });
        </script>

    </body>
    </html>

    <?php
} else {
    header("Location: login.php");
}
?>