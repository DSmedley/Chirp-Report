function chart(name, data) {
        var myChart = new Chart(document.getElementById(name), {
        type: 'doughnut',
        data: {
            labels: ["Neutral", "Positive", "Negative"],
            display: true,
            datasets: [{
                label: "Positivity Index",
                backgroundColor: [
                    'rgba(192, 192, 192, 0.6)',
                    'rgba(0, 204, 0, 0.6)',
                    'rgba(255, 0, 0, 0.6)'
                ],
                borderColor: [
                    'rgba(192, 192, 192, 1)',
                    'rgba(0, 204, 0, 1)',
                    'rgba(255, 0, 0, 1)'
                ],
                data: data
            }]
        },
        options: {
            tooltips: {
                callbacks: {
                    title: function(tooltipItem, data) {
                        return data['labels'][tooltipItem[0]['index']];
                    },
                    label: function(tooltipItem, data) {
                        var dataset = data['datasets'][0];
                        var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][0]['total']) * 100);
                        return data['datasets'][0]['data'][tooltipItem['index']] + ' tweets (' + percent + '%)';
                    }
                },
            },
            title: {
                display: true,
                text: 'Overall Positivity Index'
            },
            legend: {
                display: true
            }
        }
    });

    return myChart;
}

function bar(name, data) {
        var myChart = new Chart(document.getElementById(name), {
        type: 'bar',
        data: {
            labels: ["Anger", "Anticipation", "Disgust", "Fear", "Joy", "Sadness", "Surprise", "Trust"],
            display: true,
            datasets: [{
                backgroundColor: [
                    'rgba(0, 99, 132, 0.6)',
                    'rgba(30, 99, 132, 0.6)',
                    'rgba(60, 99, 132, 0.6)',
                    'rgba(90, 99, 132, 0.6)',
                    'rgba(120, 99, 132, 0.6)',
                    'rgba(150, 99, 132, 0.6)',
                    'rgba(180, 99, 132, 0.6)',
                    'rgba(210, 99, 132, 0.6)',
                    'rgba(240, 99, 132, 0.6)'
                ],
                borderColor: [
                    'rgba(0, 99, 132, 1)',
                    'rgba(30, 99, 132, 1)',
                    'rgba(60, 99, 132, 1)',
                    'rgba(90, 99, 132, 1)',
                    'rgba(120, 99, 132, 1)',
                    'rgba(150, 99, 132, 1)',
                    'rgba(180, 99, 132, 1)',
                    'rgba(210, 99, 132, 1)',
                    'rgba(240, 99, 132, 1)'
                ],
                data: data
            }]
        },
        options: {
            tooltips: {
                callbacks: {
                    title: function(tooltipItem, data) {
                        return data['labels'][tooltipItem[0]['index']];
                    },
                    label: function(tooltipItem, data) {
                        var dataset = data['datasets'][0];
                        var total = 0;
                        for (i = 0; i < dataset['data'].length; i++) {
                            total += dataset['data'][i]
                        }
                        var percent = Math.round(dataset['data'][tooltipItem['index']]/total * 100);
                        return data['datasets'][0]['data'][tooltipItem['index']] + ' Tweets (' + percent + '%)';
                    }
                },
            },
            title: {
                display: true,
                text: 'Individual Emotions'
            },
            legend: {
                display: false
            }
        }
    });

    return myChart;
}

function activeHours(name, times, occurs) {
    var data = [];
    for (i = 0, j = 0; i < times.length; i++) {
        if(times[i] == j){
            data.push(occurs[i]);
            j++
        }else{
            data.push(0);
            j++;
            i--;
        }

    }
    var myChart = new Chart(document.getElementById(name), {
        type: 'bar',
        data: {
            labels: ["12am", "1am", "2am", "3am", "4am", "5am", "6am", "7am", "8am", "9am", "10am", "11am", "12pm", "1pm", "2pm", "3pm", "4pm", "5pm", "6pm", "7pm", "8pm", "9pm", "10pm", "11pm"],
            display: true,
            datasets: [{
                backgroundColor: 'rgba(0, 0, 255, 0.6)',
                borderColor: 'rgba(0, 0, 255, 1)',
                data: data
            }]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                callbacks: {
                    title: function(tooltipItem, data) {
                        return data['labels'][tooltipItem[0]['index']];
                    },
                    label: function(tooltipItem, data) {
                        return data['datasets'][0]['data'][tooltipItem['index']] + ' Tweets';
                    },
                    afterLabel: function(tooltipItem, data) {
                        var dataset = data['datasets'][0];
                        var total = 0;
                        for (i = 0; i < dataset['data'].length; i++) {
                            total += dataset['data'][i]
                        }
                        var percent = Math.round(dataset['data'][tooltipItem['index']]/total * 100);
                        return 'Accounts for ' + percent + '% of the avg day.';
                    }
                },
            },
            title: {
                display: true,
                text: 'Tweets Per Hour (UTC)'
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    return myChart;
}

function percentage(name, text, percent, sign) {

    var chart = document.getElementById(name);

	$(chart).circliful({
        animationStep: 15,
        foregroundBorderWidth: 5,
        backgroundBorderWidth: 15,
        percent: percent,
        text: text,
        halfCircle: true,
        noPercentageSign: sign
    });
}
