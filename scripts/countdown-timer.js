var countDownDate = new Date("Feb 01, 2022 00:00:00").getTime();

var x = setInterval(function() {

    var now = new Date().getTime();

    var distance = countDownDate - now;

    if (distance < 0) distance = 0

    var hours = Math.floor(distance / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById('timebox-hour').innerHTML = hours.toString()
    document.getElementById('timebox-min').innerHTML = minutes.toString()
    document.getElementById('timebox-sec').innerHTML = seconds.toString()

    if (distance < 0) {
        clearInterval(x);
    }


}, 1000);