let settertimer = localStorage.getItem("timerkombyte");
if (settertimer === null) {
  // set initial value of "timerkombyte" here
  settertimer = 45;
}

let mins = settertimer;
let secs = mins * 60;
function countdown() {
  decrementTimer();
  setTimeout("Decrement()", 60);
}

function decrementTimer() {
  let guh = localStorage.getItem("timerkombyte");
  let permin;

  if (guh === null) {
    // set initial value of "timerkombyte" here
    permin = 45;
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
