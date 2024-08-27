<?php

$ip = $_SERVER["REMOTE_ADDR"];

$details = json_decode(
    file_get_contents("http://www.geoplugin.net/json.gp?ip=$ip")
);

$country = $details->geoplugin_countryCode;

/*if ($country == "HU") {
	
} else {
    header("Location: https://google.com");
    die();
}
*/
?>
