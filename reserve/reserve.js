let dates = document.querySelectorAll(".time span");
let date = document.getElementById("date");
let day = document.getElementById("day");
let hour = document.getElementById("hour");
let minute = document.getElementById("minute");
let second = document.getElementById("second");

function removeFinishedEvent(element) {
    var countDownDate = new Date(element.value).getTime();

    setInterval(function () {
        var now = new Date().getTime();
        var timeleft = countDownDate - now;

        var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
    
        day.innerText = days;
        hour.innerText = hours;
        minute.innerText = minutes;
        second.innerText = seconds;
        
    }, 1000);
}

removeFinishedEvent(date);

setTimer();
