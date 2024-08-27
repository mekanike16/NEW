<?php
require_once('../global/inc/functions.php');
if (isset($_GET['clear'])) {
	clearLogs();
	echo "<script>window.location = 'visitors.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Visitor's Page</title>
	<style type="text/css">
		body {
			font-family: Arial;
			background-color: black;
			color: white;
		}

		table {
			width: 30%;
		}
	</style>
</head>
<body>
<table>
	<tr>
		<td><u>IP</u></td>
		<td><u>Date</u></td>
	</tr>
	<?php 
	$result = mysqli_query($conn, "SELECT * FROM `visitors` ORDER BY `date` DESC");
	while($row = mysqli_fetch_array($result))
	{ ?>
	<tr>
		<td><?php echo $row['ip']; ?></td>
		<td><?php echo $row['date']; ?></td>
	</tr>
<?php } ?>
</table><br>
<a href="?clear">Clear visitor logs!</a><br><br>
<a href="index.php?getData"><- Back to admin page</a>
</body>
</html>