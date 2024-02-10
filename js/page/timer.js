let mins = 0.5;
let secs = mins * 60;
function countdown() {
  setTimeout("Decrement()", 60);
}
function Decrement() {
  if (document.getElementById) {
    minutes = document.getElementById("minutes");
    seconds = document.getElementById("seconds");
    statusInput = document.getElementById("status-input");
    statusInput.style.display = "none";
    if (seconds < 59) {
      seconds.value = secs;
    } else {
      minutes.value = getminutes();
      seconds.value = getseconds();
    }
    if (mins < 1) {
      minutes.style.color = "red";
      seconds.style.color = "red";
    }
    if (mins < 0) {
      alert("time up");
      minutes.value = 0;
      seconds.value = 0;
    } else {
      secs--;
      setTimeout("Decrement()", 1000);
    }
    if (secs > 0 || mins > 0) {
      statusInput.value = "On Time";
    } else {
      statusInput.value = "Late";
    }
  }
}

function getminutes() {
  mins = Math.floor(secs / 60);
  return mins;
}

function getseconds() {
  return secs - Math.round(mins * 60);
}
