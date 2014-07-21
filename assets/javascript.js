// FORM VALIDATION STARTS


function checkEmpty(sInputId){
    var bValid = false;
    var oInput = document.getElementById(sInputId);
    var sInputValue = oInput.value;

    var oMessage = document.getElementById(sInputId + 'Message')
    if (sInputValue.length == 0){
        oMessage.className = 'message-error';
        oMessage.innerHTML = '✗';
    } else {
        oMessage.innerHTML = '✔';
        oMessage.className = 'message-success';
        bValid = true;
    }
    return bValid;
}


function checkName(sInputId){

    var bValid = false;
    var bFilled = checkEmpty(sInputId);

    if (bFilled == true) {
        var oInput = document.getElementById(sInputId);
        var sInputValue = oInput.value;

        var oMessage = document.getElementById(sInputId + 'Message')
        
        var oRegex = new RegExp("[^a-zA-Z]");
        if (oRegex.test(sInputValue) == false) {
            oMessage.innerHTML = '✔';
            oMessage.className = 'message-success';
            bValid = true;
        } else {
            oMessage.className = 'message-error';
            oMessage.innerHTML = '✗';
        }
    }
    return bValid;
}

function checkEmail(sInputId){

    var bValid = false;
    var bFilled = checkEmpty(sInputId,'Email');

    if (bFilled == true) {
        var oInput = document.getElementById(sInputId);
        var sInputValue = oInput.value;

        var oMessage = document.getElementById(sInputId + 'Message')
        var oRegex = new RegExp("^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$");
        if (oRegex.test(sInputValue) == true) {
            oMessage.innerHTML = '✔';
            oMessage.className = 'message-success';
            bValid = true;
        } else {
            oMessage.className = 'message-error';
            oMessage.innerHTML = '✗';
        }
    }
    return bValid;
}


function checkNumber(sInputId){

    var bValid = false;
    var bFilled = checkEmpty(sInputId,'contact' || 'when');

    if (bFilled == true) {
        var oInput = document.getElementById(sInputId);
        var sInputValue = oInput.value;

        var oMessage = document.getElementById(sInputId + 'Message')
        var oRegex = new RegExp("[0-9]")
        if (oRegex.test(sInputValue) == true) {
            oMessage.innerHTML = '✔';
            oMessage.className = 'message-success';
            bValid = true;
        } else {
            oMessage.className = 'message-error';
            oMessage.innerHTML = '✗';
        }
    }
    return bValid;
}

function checkAll(){
    bValidFirstName = checkName('firstName');
    bValidLastName = checkName('lastName');
    bValidEmail = checkEmail('email');
    bValidusername = checkNumber('username');
    bValidpassword = checkNumber('password');
    bValidmobile = checkEmpty('mobile');
    bValidstreet = checkEmpty('street');
    bValidtown = checkEmpty('town');
    bValidcity = checkEmpty('city');
    bValidcountry = checkEmpty('country');


    var bValid = bValidFirstName && bValidLastName && bValidEmail 
    && bValidusername && bValidpassword && bValidmobile && bValidstreet 
    && bValidtown && bValidcity && bValidcountry

    return bValid;
}

//FORM VALIDATION ENDS