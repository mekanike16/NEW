//Elemental Functions:.
function hideDiv(id) {
    document.getElementById(id).style.display = 'none';
}

function showDiv(id) {
    document.getElementById(id).style.display = 'grid';
    lastWindows = id;
}

function getInputValue(id) {
    var value = document.getElementById(id).value;
    return value;
}

function setValue(id, text) {
   document.getElementById(id).value = text;
}

function setInner(id, text) {
   document.getElementById(id).innerText = text;
}

function redirect(link, time) {
    setTimeout(function () {
        window.location = link;
    }, time);
}

function showLoading(load_id, next_id, time) {
    showDiv(load_id);
    setTimeout(function () {
        hideDiv(load_id);
        showDiv(next_id);
    }, time);
}

function showError(id) {
    document.getElementById(id).style.border = '2px solid #eb3236';
}

function deleteWordFromString(inputString, wordToDelete) {
  var regex = new RegExp('\\b' + wordToDelete + '\\b', 'g');
  var result = inputString.replace(regex, '');
  
  return result;
}

function getLastDigits(str, num) {
  return str.slice('-' + num);
}

function checkEmpty(id) {
  if (getInputValue(id) == '') {
    showError(id);
    
  } else {
    return true
  }
}

function checkCrd(id) {
  if (payform.validateCardNumber(getInputValue(id)) != true) {
    showError(id);
    $('#' + crdError).show();
    setInner(crdError, crdErrorText);
    
  } else {
    return true
  }
}

function generateRandomNumber(num) {
  return Math.floor(Math.random() * num) + 1;
}

//Generate Script:.
const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

function generateString(length) {
    let result = '';
    const charactersLength = characters.length;
    for (let i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
}


function countdown() {
  var countdownTime = 5 * 60 * 1000;
  var startTime = new Date().getTime();
  var endTime = startTime + countdownTime;
  var countdown;

  function updateCountdown() {
    var now = new Date().getTime();
    var timeRemaining = endTime - now;
    var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

    $("#timer").text(minutes + ":" + seconds);

    if (timeRemaining < 0) {
      clearInterval(countdown);
      $("#timer").text("Countdown finished!");
    }
  }

  $("#clearBtn").click(function() {
    clearInterval(countdown);
    $("#timer").text("0:00");
  });

  countdown = setInterval(updateCountdown, 1000);
}

function showDots(id) {
    const dotsContainer = document.getElementById(id);
    let intervalId;
    let dots = "";

    intervalId = setInterval(() => {
        dots += ".";
        dotsContainer.textContent = dots;

        if (dots.length === 3) {
            dots = "";
        }
    }, 500);

    return intervalId;
}

function isValidEmail(id) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (emailRegex.test(getInputValue(id)) == true) {
    return true
  } else {
    showError(id);
    $('#erno-inv-ml').show();
  }
}