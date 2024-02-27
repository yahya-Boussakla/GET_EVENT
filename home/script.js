let cardButtons = document.querySelectorAll(".finish");
let secondDateFilter = document.getElementById("secondFilter");
let firstDateFilter = document.getElementById("firstFilter");
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
    dateFrom(countDownDate,element);
    dateTo(countDownDate,element);
  }

setTimer();

function search() {
  let titles = document.querySelectorAll(".cardInformation h2");
  let searchValue = document.querySelector(".search input").value;
  searchLoop(titles, searchValue);
}

function changeTextButton() {
  for (const button of cardButtons) {
    button.innerText = "Guichet fermé";
  }
}

changeTextButton();

function searchLoop(arr, val) {
  for (const title of arr) {
    if (title.innerText.toLowerCase().includes(val.toLowerCase())) {
      title.parentElement.parentElement.style.display = "block";
    } else {
      title.parentElement.parentElement.style.display = "none";
    }
  }
}

function available() {
  let availableFilter = document.querySelector("select").value;
  for (const button of cardButtons) {
    if (availableFilter == 1) {
      button.parentElement.parentElement.style.display = "block";
    } else {
      button.parentElement.parentElement.style.display = "none";
    }
  }
}

function dateFrom(date,element) {
  firstDateFilter.addEventListener("change" , () =>{
      let firstFilterTimeLeft = date - new Date(firstDateFilter.value).getTime();
      let firstFilterDaysLeft = Math.floor(firstFilterTimeLeft / (1000 * 60 * 60 * 24));
      let firstFilterHoursLeft = Math.floor((firstFilterTimeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let firstFilterMinutsLeft =  Math.floor((firstFilterTimeLeft % (1000 * 60 * 60)) / (1000 * 60));

      let secondFilterTimeLeft = date - new Date(secondDateFilter.value).getTime();
      let secondFilterDaysLeft = Math.floor(secondFilterTimeLeft / (1000 * 60 * 60 * 24));
      let secondFilterHoursLeft = Math.floor((secondFilterTimeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let secondFilterMinutsLeft =  Math.floor((secondFilterTimeLeft % (1000 * 60 * 60)) / (1000 * 60)); 

      if (secondDateFilter.value !== "") {
  
        if (secondFilterDaysLeft <= 0 && secondFilterHoursLeft <= 0 && secondFilterMinutsLeft <= 0 && firstFilterDaysLeft >= 0 && firstFilterHoursLeft >= 0 && firstFilterMinutsLeft >= 0) {
          element.parentElement.parentElement.parentElement.style.display="block";
        }
        else{
          element.parentElement.parentElement.parentElement.style.display="none";
        }
      }
      else{
         if (firstFilterDaysLeft >= 0 && firstFilterHoursLeft >= 0 && firstFilterMinutsLeft >= 0) {
          element.parentElement.parentElement.parentElement.style.display="block";
        }
        else{
          element.parentElement.parentElement.parentElement.style.display="none";
        }
      }
  });
}

function dateTo(date,element) {
    secondDateFilter.addEventListener("change" , () =>{
      let firstFilterTimeLeft = date - new Date(firstDateFilter.value).getTime();
      let firstFilterDaysLeft = Math.floor(firstFilterTimeLeft / (1000 * 60 * 60 * 24));
      let firstFilterHoursLeft = Math.floor((firstFilterTimeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let firstFilterMinutsLeft =  Math.floor((firstFilterTimeLeft % (1000 * 60 * 60)) / (1000 * 60));

      let secondFilterTimeLeft = date - new Date(secondDateFilter.value).getTime();
      let secondFilterDaysLeft = Math.floor(secondFilterTimeLeft / (1000 * 60 * 60 * 24));
      let secondFilterHoursLeft = Math.floor((secondFilterTimeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let secondFilterMinutsLeft =  Math.floor((secondFilterTimeLeft % (1000 * 60 * 60)) / (1000 * 60));

      if (firstDateFilter.value !== "") {        
        if (secondFilterDaysLeft <= 0 && secondFilterHoursLeft <= 0 && secondFilterMinutsLeft <= 0 && firstFilterDaysLeft >= 0 && firstFilterHoursLeft >= 0 && firstFilterMinutsLeft >= 0) {
          element.parentElement.parentElement.parentElement.style.display="block";
        }
        else{
          element.parentElement.parentElement.parentElement.style.display="none";
        }
      }
      else{
         if (secondFilterDaysLeft <= 0 && secondFilterHoursLeft <= 0 && secondFilterMinutsLeft <= 0) {
          element.parentElement.parentElement.parentElement.style.display="block";
        }
        else{
          element.parentElement.parentElement.parentElement.style.display="none";
        }
      }
    });
  }