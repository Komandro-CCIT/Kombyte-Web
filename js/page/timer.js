let settertimer = localStorage.getItem("timerkombyte");
if (settertimer === null){
    // set initial value of "timerkombyte" here
    settertimer = 5;
}

let mins = settertimer;
let secs = mins * 60;
function countdown() {
  decrementTimer()
  setTimeout("Decrement()", 60);
}

function decrementTimer() {
  let guh = localStorage.getItem("timerkombyte");
  let permin;

  if (guh === null) {
    // set initial value of "timerkombyte" here
    permin = 5;
    localStorage.setItem("timerkombyte", permin);
  } else {
    permin = parseFloat(guh); // parse guh as a float number
    permin -= 0.5; // decrement by 0.5
  }

 

  if (permin <= 0) {
    // handle timer expiration here
    console.log("Timer expired!");
  } else {
    localStorage.setItem("timerkombyte", permin);
    console.log("Timer value:", permin);
    setTimeout(decrementTimer, 30000); // call the function again after 30 seconds
  }
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
  return secs - Math.round(mins * 60);
}



