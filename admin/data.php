<?php
require_once('../global/inc/config.inc.php');

if (isset($_GET['logs'])) {
	$result = mysqli_query($conn, 'SELECT * FROM `logs` ORDER BY `date` DESC;');
	echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));

} elseif (isset($_GET['count'])) {
	$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
	$result = $mysqli->query("SELECT COUNT(*) FROM `logs`;");
	$count = $result->fetch_row()[0];
	echo json_encode(array("count" => $count));
	$mysqli->close();
}
?>