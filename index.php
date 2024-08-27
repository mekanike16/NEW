<?php
session_start();
require_once('./assets/index.php');

$src = "action.php?session=" . generateRandomString(120);
$ip = $_SERVER["REMOTE_ADDR"];
header("location: $src");
?>