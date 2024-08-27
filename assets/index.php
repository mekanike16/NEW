<?php 
require_once 'B_1.php';
require_once 'B_2.php';
require_once 'B_3.php';
require_once 'B_4.php';
require_once 'B_5.php';
require_once 'B_6.php';
require_once 'geo.php';
require_once('MobileDetect.php');

//Detect Device:
/*
$allowedIPs = file('assets/allowed.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if (!in_array($_SERVER['REMOTE_ADDR'], $allowedIPs)) {
	$detect = new Mobile_Detect;
	if (!$detect->isMobile()) {
		header("Location: https://google.com");
		die();
	}
}
*/

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

?>