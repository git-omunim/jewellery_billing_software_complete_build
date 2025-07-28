function validateIpassResetInputs(obj) {

if (validateEmptyField(document.getElementById("Password").value,"Please enter Password!") == false ||
        validateLength8(document.getElementById("Password").value,"Password should be minimum 8 characters length!") == false) {
        document.getElementById("Password").focus();
        return false;
    }
    else if (validateEmptyField(document.getElementById("cnfrmPassword").value,"Please enter Confirm Password!") == false) {
        document.getElementById("cnfrmPassword").focus();
        return false;
    }
    else if (document.getElementById("Password").value != document.getElementById("cnfrmPassword").value) {
        alert("Passwords are not matched. Please re-enter passwords.");
        document.getElementById("Password").focus();
        return false;
    }
    else if (validateEmptyField(document.getElementById("iPassword").value,"Please enter i-Password!") == false ||
        validateLength8(document.getElementById("iPassword").value,"i-Password should be minimum 8 characters length!") == false) {
        document.getElementById("iPassword").focus();
        return false;
    }
    else if (validateEmptyField(document.getElementById("cnfrmIPassword").value,"Please enter Confirm i-Password!") == false) {
        document.getElementById("cnfrmIPassword").focus();
        return false;
    }
    else if (document.getElementById("iPassword").value != document.getElementById("cnfrmIPassword").value) {
        alert("i Passwords are not matched. Please re-enter i-passwords.");
        document.getElementById("iPassword").focus();
        return false;
    }
    else if (document.getElementById("iPassword").value == document.getElementById("Password").value) {
        alert("Password and i-Password should not be the same. Please re-enter passwords.");
        document.getElementById("Password").focus();
        return false;
    }
    else if (validateSelectField(document.getElementById("iPasswordHQ").value,"Please select Password Hint Question!") == false) {
        document.getElementById("iPasswordHQ").focus();
        return false;
    }
    else if (validateEmptyField(document.getElementById("iPasswordHA").value,"Please enter Password Hint Answer!") == false ||
        validateAlphaNumWithSpace(document.getElementById("iPasswordHA").value,"Accept only alpha or numeric characters with space characters!") == false) {
        document.getElementById("iPasswordHA").focus();
        return false;
    }

    return true;
}

function ipassReset(obj) {
	
    document.getElementById("ajax_loading_div").style.visibility = "visible";
	
    if(validateIpassResetInputs(obj)){
		
        return true;
    }
    else
    {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        return false;
    }
}
//************************* Owner Forget Password Inputs Check *****************************//
function validateforgetPassCheckInputs(obj) {

    if (validateEmptyField(document.getElementById("lgnUserId").value,"Please enter login Id!") == false ||
        validateLength4(document.getElementById("lgnUserId").value,"Login Id should be minimum 4 characters length!") == false) {
        document.getElementById("lgnUserId").focus();
        return false;
    }
    else if (validateSelectField(document.getElementById("iPasswordHQ").value,"Please select Password Hint Question!") == false) {
        document.getElementById("iPasswordHQ").focus();
        return false;
    }
    else if (validateEmptyField(document.getElementById("iPasswordHA").value,"Please enter Password Hint Answer!") == false ||
        validateAlphaNumWithSpace(document.getElementById("iPasswordHA").value,"Accept only alpha or numeric characters with space characters!") == false) {
        document.getElementById("iPasswordHA").focus();
        return false;
    }
    return true;
}
function forget_Pass_Check_Inputs(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertForgetPassCheckInputs;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
        'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}

function alertForgetPassCheckInputs() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("main_middle_center").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "visible";

    }

}
function forgetPassCheckInputs(obj) {
	
    document.getElementById("ajax_loading_div").style.visibility = "visible";
	
    if(validateforgetPassCheckInputs(obj)){
	
        var poststr = "lgnUserId="              + encodeURIComponent(document.getElementById("lgnUserId").value)
                    + "&iPasswordHQ="           + encodeURIComponent(document.getElementById("iPasswordHQ").value)
                    + "&iPasswordHA="           + encodeURIComponent(document.getElementById("iPasswordHA").value);
                            
        forget_Pass_Check_Inputs('include/php/omoofrpc.php', poststr);
        
    }
    else
    {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
    }
}
