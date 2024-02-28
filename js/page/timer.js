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
      statusInput.value = "Late";
      minutes.value = 0;
      seconds.value = 0;
      document.body.style.backdropFilter = "contrast(0.5) hue-rotate(265deg)";
      localStorage.setItem("timerkombyte", 0);
      console.log("Timer value: 0");
      alert("time up");
    } else {
      secs--;
      setTimeout("Decrement()", 1000);
    }
  }
}

function getminutes() {
  mins = Math.floor(secs / 60);
  return mins;
}

function getseconds() {
  return parseInt(secs - Math.round(mins * 60));
}
