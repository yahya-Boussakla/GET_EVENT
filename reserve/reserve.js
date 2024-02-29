let dates = document.querySelectorAll(".time span");
function setTimer() {
    for (const date of dates) {
        removeFinishedEvent(date);
    }
}
function removeFinishedEvent(element) {
    var countDownDate = new Date(element.innerHTML).getTime();

    setInterval(function () {
        var now = new Date().getTime();
        var timeleft = countDownDate - now;

        var days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

        element.innerText = days + " d " + hours + " h " + minutes + " m " + seconds + " s ";
        if (days <= 0 && hours <= 0 && minutes <= 0 && seconds <= 0) {
            element.parentElement.parentElement.parentElement.remove();
        }
    }, 1000);
}

setTimer();
// let xhr = new XMLHttpRequest();
// xhr.open('GET','reserve.php',true)
// xhr.onload = () => {
//     let jsonData = JSON.parse(xhr.responseText);
//     console.log(jsonData);
// }
// xhr.send();
