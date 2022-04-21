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



let gewichtChart = new Chart(myChart, {
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
                    40,
                    50,
                    100,
                    200,
                    300
                ],
                fill:false,
                borderColor: 'rgb(75, 192, 192)'
            },
            {
                label:'pompoen2',
                data:[
                    202,
                    405,
                    548,
                    562,
                    105,
                    356
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
            text: 'pompoen gewicht'
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