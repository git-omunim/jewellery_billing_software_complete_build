function validateAddOwnInputs(obj) {

    if (validateEmptyField(document.getElementById("userName").value, "Please enter User Name!") == false ||
            validateLength4(document.getElementById("userName").value, "User Name should be minimum 4 characters length!") == false ||
            validateAlphaNumWithDot(document.getElementById("userName").value, "Accept only alpha or numeric characters without space character!") == false) {
        document.getElementById("userName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("password").value, "Please enter Password!") == false ||
            validateLength8(document.getElementById("password").value, "Password should be minimum 8 characters length!") == false) {
        document.getElementById("password").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("cnfrmPassword").value, "Please enter Confirm Password!") == false) {
        document.getElementById("cnfrmPassword").focus();
        return false;
    } else if (document.getElementById("password").value != document.getElementById("cnfrmPassword").value) {
        alert("Passwords are not matched. Please re-enter passwords.");
        document.getElementById("password").focus();
        return false;
    } else if (document.getElementById("password").value == document.getElementById("userName").value) {
        alert("Password and User Name are same. \nBoth should be different. \n\nPlease re-enter passwords.");
        document.getElementById("password").focus();
        return false;
    } else if (validateSelectField(document.getElementById("passwordHQ").value, "Please select Password Hint Question!") == false) {
        document.getElementById("passwordHQ").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("passwordHA").value, "Please enter Password Hint Answer!") == false ||
            validateAlphaNumWithSpace(document.getElementById("passwordHA").value, "Accept only alpha or numeric characters with space characters!") == false) {
        document.getElementById("passwordHA").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("firstName").value, "Please enter First Name!") == false ||
            validateAlphaWithSpace(document.getElementById("firstName").value, "Accept only alpha characters!") == false) {
        document.getElementById("firstName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("lastName").value, "Please enter Last Name!") == false ||
            validateAlphaWithSpace(document.getElementById("lastName").value, "Accept only alpha characters!") == false) {
        document.getElementById("lastName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("fathersName").value, "Please enter Father's Name!") == false ||
            validateAlphaWithSpace(document.getElementById("fathersName").value, "Accept only alpha characters!") == false) {
        document.getElementById("fathersName").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select your Birth Month!") == false) {
        document.getElementById("DOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBDay").value, "Please select your Birth Date!") == false) {
        document.getElementById("DOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select your Birth Year!") == false) {
        document.getElementById("DOBYear").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("city").value, "Please enter City!") == false ||
            validateAlphaWithSpace(document.getElementById("city").value, "Accept only alpha characters!") == false) {
        document.getElementById("city").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("pin").value, "Please enter PIN!") == false ||
            validateNum(document.getElementById("pin").value, "Accept only Numbers!") == false ||
            validateLength6(document.getElementById("pin").value, "PIN number length should be minimum 6!") == false) {
        document.getElementById("pin").focus();
        return false;
    } else if (validateSelectField(document.getElementById("state").value, "Please select State Name!") == false) {
        document.getElementById("state").focus();
        return false;
    } else if (validateSelectField(document.getElementById("country").value, "Please select Country Name!") == false) {
        document.getElementById("country").focus();
        return false;
    } else if (document.getElementById("phoneNo").value != "" && validateNumWithSpace(document.getElementById("phoneNo").value, "Accept only Numbers!") == false) {
        document.getElementById("phoneNo").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("mobileNo").value, "Please enter Mobile Number!") == false ||
            validateNum(document.getElementById("mobileNo").value, "Accept only Numbers without space character!") == false ||
            validateLength10(document.getElementById("mobileNo").value, "Mobile number length should be minimum 10!") == false) {
        document.getElementById("mobileNo").focus();
        return false;
    }
    return true;
}

function uploadImage(file) {
    extArray = new Array(".jpg", ".jpeg", ".png", ".bmp", ".gif");
    allowSubmit = false;
    if (file)
    {
        while (file.indexOf("\\") != - 1)
            file = file.slice(file.indexOf("\\") + 1);
        ext = file.slice(file.indexOf(".")).toLowerCase();
        for (var i = 0; i < extArray.length; i++) {
            if (extArray[i] == ext) {
                allowSubmit = true;
                break;
            }
        }
        if (allowSubmit)
            return true;
        else
        {
            alert("Please upload only : " + "'.jpg' or '.jpeg' or '.gif' or '.png' or '.bmp'" + "  images files. \nPlease select a new "
                    + "image file to upload and submit again.");
            return false;
        }
    }
}

function addNewOwner(obj) {

    document.getElementById("ajax_loading_div").style.visibility = "visible";
    document.getElementById("addOwnerSubButDiv").style.visibility = "hidden";
    if (validateAddOwnInputs(obj)) {
        if (uploadImage(document.getElementById("selectPhoto").value) == false) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addOwnerSubButDiv").style.visibility = "visible";
            return false;
        }
        document.getElementById("formStatus").value = 1;
        return true;
    } else
    {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addOwnerSubButDiv").style.visibility = "visible";
        return false;
    }
}
/********************** Activate Owner Code *****************************************************************/
function validateActivateOwnerInputs(obj) {

    if (validateEmptyField(document.getElementById("registrationKey").value, "Please enter Registration Key!") == false) {
        document.getElementById("registrationKey").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("activationKey").value, "Please enter Activation Key!") == false) {
        document.getElementById("activationKey").focus();
        return false;
    }
    return true;
}
function activate_owner(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertActivateOwner;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertActivateOwner() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "visible";
    }

}
function activateOwner(obj) {
    document.getElementById("ajax_loading_div").style.visibility = "visible";
    if (validateActivateOwnerInputs(obj)) {
        var poststr = "registrationKey=" + encodeURIComponent(document.getElementById("registrationKey").value)
                + "&activationKey=" + encodeURIComponent(document.getElementById("activationKey").value)
                + "&ownerLoginId=" + encodeURIComponent(document.getElementById("ownerLoginId").value);
        activate_owner('include/php/omooactv' + default_theme + '.php', poststr);
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
    }
}
/********************** Add New Firm Code *****************************************************************/
function validateAddFirmInputs(obj) {

    if (validateEmptyField(document.getElementById("firmName").value, "Please enter Firm Name!") == false) {
        document.getElementById("firmName").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmType").value, "Please select Firm Type!") == false) {
        document.getElementById("firmType").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmOwner").value, "Please select Firm Owner!") == false) {
        document.getElementById("firmOwner").focus();
        return false;
    }
    return true;
}
function add_firm(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddFirm;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertAddFirm() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/**** START CODE TO ADD FIRM @AUTHOR: PRIYA28 *****/
function addNewFirm(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateAddFirmInputs(obj)) {
        return true;
        var poststr = "firmName=" + encodeURIComponent(document.getElementById("firmName").value)
                + "&firmRegNo=" + encodeURIComponent(document.getElementById("firmRegNo").value)
                + "&firmFullName=" + encodeURIComponent(document.getElementById("firmFullName").value)             //CODE TO CHANGE ID  @AUTHOR: PRIYA29
                + "&firmDesc=" + encodeURIComponent(document.getElementById("firmDesc").value)
                + "&firmAddress=" + encodeURIComponent(document.getElementById("firmAddress").value)
                + "&firmPhoneDetail=" + encodeURIComponent(document.getElementById("firmPhoneDetail").value)
                + "&firmType=" + encodeURIComponent(document.getElementById("firmType").value)
                + "&firmOwner=" + encodeURIComponent(document.getElementById("firmOwner").value)
                + "&firmComments=" + encodeURIComponent(document.getElementById("firmComments").value) 
                + "&firmGeolocationLatitude=" + encodeURIComponent(document.getElementById("firmGeolocationLatitude").value)  //CODE TO CHANGE GEOLOCATION  @AUTHOR: PRASHANT 19 APR 2024
                + "&firmGeolocationLongitude=" + encodeURIComponent(document.getElementById("firmGeolocationLongitude").value) //CODE TO CHANGE GEOLOCATION  @AUTHOR: PRASHANT 19 APR 2024
                + "&formFooterInfo=" + encodeURIComponent(document.getElementById("formFooterInfo").value);
        add_firm('include/php/omffadfm' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    }
}
/**** END CODE TO ADD FIRM @AUTHOR: PRIYA28 *****/
/***************** Add New Customer Code ***********************/
/**** START CODE TO ADD NEW CUSTOMER @AUTHOR: PRIYA19 *****/
/*****Start Code To Add Validation For Staff Id @AUTHOR:PRIYA22APR13*********/
function validateAddCustomerInputs(obj) {
    var result;
    if (validateEmptyField(document.getElementById("customerType").value, "Please select Customer Type!") == false) { //validateSelectField changed @Author:PRIYA23FEB15
        document.getElementById("customerType").focus();
        return false;
    } else if ((document.getElementById("pCustId").value != '') && (validateAlphaNum(document.getElementById("pCustId").value, "Accept only alphanumeric characters!") == false)) {
        document.getElementById("pCustId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("uCustId").value, "Please select Customer ID!") == false ||
            validateNum(document.getElementById("uCustId").value, "Accept only Numbers!") == false) {                                    //PRIYA23
        document.getElementById("uCustId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Name!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("accountId").value, "Please select Customer Account!") == false) {         //PRIYA23
        document.getElementById("accountId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("firstName").value, "Please enter First Name!") == false) {
        document.getElementById("firstName").focus();
        return false;
    }else if (validateEmptyField(document.getElementById("city").value, "Please select City Name!") == false) {
        //code updated by pratiksha
        document.getElementById("city").focus();
        return false;
    }
    else if (validateEmptyField(document.getElementById("country").value, "Please select Country Name!") == false) {
        //code updated by pratiksha
        document.getElementById("country").focus();
        return false;
    }   
//    else if (validateEmptyField(document.getElementById("lastName").value, "Please enter Last Name!") == false) {
//        document.getElementById("lastName").focus();
//        return false;
//    }
//    else if (validateEmptyField(document.getElementById("fatherOrSpouseName").value, "Please enter Father/Spouse Name!") == false ||
//            validateAlphaWithSpace(document.getElementById("fatherOrSpouseName").value, "Accept only alpha characters!") == false) {
//        document.getElementById("fatherOrSpouseName").focus();
//        return false;
//    } 
    else if(document.getElementById("othercountries").value == 'YES') {
                var mobileNumber = document.getElementById("mobileNo").value;

        if ((mobileNumber != 'Enter Mobile Number') && (mobileNumber != '')) {
           if (mobileNumber.length < 5) {
            alert("Mobile number should be at least 5 digits.");
            return false;
        } else if (mobileNumber.length > 15) {
            alert("Mobile number should not exceed 15 digits.");
            return false;
        }
        else if (validateNumWithUnderScore(mobileNumber, "Accept only Numbers without space character!") == false) {
            return false;
        }
        }
        } 
    
    else if (validateSelectField(document.getElementById("city").value, "Please select City Name!") == false) {
        document.getElementById("city").focus();
        return false;
    } else if (validateSelectField(document.getElementById("state").value, "Please select State Name!") == false) {
        document.getElementById("state").focus();
        return false;
    } else if (validateSelectField(document.getElementById("country").value, "Please select Country Name!") == false) {
        document.getElementById("country").focus();
        return false;
    } else if (document.getElementById("panelName").value != 'directSchemeAdd') {
        if ((document.getElementById("pinCode").value != '') && ((validateNum(document.getElementById("pinCode").value, "Accept only Numbers without space character!") == false ||
                validateLength6(document.getElementById("pinCode").value, "Pin Code length should be minimum 06!") == false))) {
            document.getElementById("pinCode").focus(); //PRIYA15
            return false;
        } else if (validateSelectField(document.getElementById("state").value, "Please select State Name!") == false) {
            document.getElementById("state").focus();
            return false;
        } else if (validateSelectField(document.getElementById("country").value, "Please select Country Name!") == false) {
            document.getElementById("country").focus();
            return false;
        }
    }
    /***********Start code to comment validation @Author:PRIYA25JUN14************/
//    else if (document.getElementById("phoneNo").value != "" && validateNumWithSpace(document.getElementById("phoneNo").value, "Accept only Numbers!") == false) {
//        document.getElementById("phoneNo").focus();
//        return false;
//    }
    /***********End code to comment validation @Author:PRIYA25JUN14*************/
    /***********Start Code To Validate Mobile No @AUTHOR:PRIYA07JUNE13***********/
    else if ((document.getElementById("mobileNo").value != '') && ((validateNum(document.getElementById("mobileNo").value, "Accept only Numbers without space character!") == false ||
            validateLengthMobNo(document.getElementById("mobileNo").value, "Mobile number length should be 10 numbers only!") == false))) {
        document.getElementById("mobileNo").focus();
        return false;
    }
    //
    if (document.getElementById("mobileNo").value != '') {
        result = checkvalue(document.getElementById("mobileNo").value, '', '', '');
        if (result != 'success') {
            alert("Duplicate Mobile No ! Please Enter Different Mobile No !");
            return false;
        }
    }
    //
    if (document.getElementById("emailId").value != '') {
        result = checkvalue('',document.getElementById("emailId").value, '', '', '','','checkemail');
        if (result != 'success') {
            alert("Duplicate Email Id ! Please Enter Different Email Id !");
            return false;
        }
    }
    //
    if (document.getElementById("panelName").value != 'directSchemeAdd') {
        if (document.getElementById("custLoginId").value != '') {
            result = checkvalue('', '', document.getElementById("custLoginId").value, '');
            if (result != 'success') {
                alert("Duplicate Login Id ! Please Enter Different Login Id !");
                return false;
            }
        }
    }
    //
    if (document.getElementById("panelName").value == 'directSchemeAdd') {
        return addNewKitty();
    }
    /***********End Code To Validate Mobile No @AUTHOR:PRIYA07JUNE13***********/
    return true;
}
/*****End Code To Add Validation For Staff Id @AUTHOR:PRIYA22APR13*********/
/**** END CODE TO ADD NEW CUSTOMER @AUTHOR: PRIYA19 *****/
function addNewCustomer(obj) {
    document.getElementById("ajax_loading_div").style.visibility = "visible";
    document.getElementById("addCustSubButDiv").style.visibility = "hidden";
    if (validateAddCustomerInputs(obj)) {
        if (uploadImage(document.getElementById("selectPhoto").value) == false) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addCustSubButDiv").style.visibility = "visible";
            return false;
        }
        return true;
    } else
    {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addCustSubButDiv").style.visibility = "visible";
        return false;
    }
}
/********************** Direct Add New Customer Code *******************************/
function valDirectAddCustInputs() {
    if (document.getElementById('frmname_hid').value == 'showfrm') {
        if (validateEmptyField(document.getElementById("custFirstNameForAddGirvilf").value, "Please enter First Name!") == false) {
            document.getElementById("custFirstNameForAddGirviIf").focus();
            return false;
        }
        if (validateSelectField(document.getElementById("girviFirmId").value, "Please select Firm Name!") == false) {
            document.getElementById("girviFirmId").focus();
            return false;
        }
        if (((document.getElementById("mobileNoToAddGirvilf").value != 'Enter Mobile Number') && (document.getElementById("mobileNoToAddGirvilf").value != ''))
                && ((validateNumWithUnderScore(document.getElementById("mobileNoToAddGirvilf").value, "Accept only Numbers without space character!") == false ||
                        validateLengthExact10(document.getElementById("mobileNoToAddGirvilf").value, "Mobile number length should be 10 digit!") == false))) {
            document.getElementById("mobileNoToAddGirvilf").focus();
            return false;
        }
        if (document.getElementById("mobileNoToAddGirvilf").value != '') {
            result = checkvalue(document.getElementById("mobileNoToAddGirvilf").value, '', '', '');
            if (result != 'success') {
                alert("Duplicate Mobile No ! Please Enter Different Mobile No !");
                return false;
            }
        }
         if (document.getElementById("custEmailForAddGirvi").value != '') {
           result = checkvalue('',document.getElementById("custEmailForAddGirvi").value, '', '', '','','checkemail');
            if (result != 'success') {
                alert("Duplicate Email Id ! Please Enter Different Email Id !");
                return false;
            }
        }
    } else {
        if (validateEmptyField(document.getElementById("custFirstNameForAddGirvi").value, "Please enter First Name!") == false) {
            document.getElementById("custFirstNameForAddGirvi").focus();
            return false;
        }
//    if (validateSelectField(document.getElementById("custCountryForAddGirvi").value, "Please Select Country Name Or Set Default Country from Settings Panel!") == false) {
//        document.getElementById("custCountryForAddGirvi").focus();
//        return false;
//    }
//    if (validateSelectField(document.getElementById("custStateForAddGirvi").value, "Please Select State Name Or Set Default State from Settings Panel!") == false) {
//        document.getElementById("custStateForAddGirvi").focus();
//        return false;
//    }
//    else if (validateEmptyField(document.getElementById("custLastNameForAddGirvi").value, "Please enter Customer Name!") == false) {
//        document.getElementById("custLastNameForAddGirvi").focus();
//        return false;
//    }
//****description: START CODE TO Add customerStatement @Author: DISH19OCT16 i comment this code.******//
//    else if (validateEmptyField(document.getElementById("custFatherNameForAddGirvi").value, "Please enter Father's Name!") == false ||
//            validateAlphaWithSpace(document.getElementById("custFatherNameForAddGirvi").value, "Accept only alpha characters!") == false) {
//        document.getElementById("custFatherNameForAddGirvi").focus();
//        return false;
//    }
//    else if (validateSelectField(document.getElementById("custCityForAddGirvi").value, "Please select City Name!") == false) {
//        document.getElementById("custCityForAddGirvi").focus();
//        return false;
//    }
//****description: END CODE TO Add customerStatement @Author: DISH19OCT16 i comment this code.******//
        if (validateSelectField(document.getElementById("girviFirmId").value, "Please select Firm Name!") == false) {
            document.getElementById("girviFirmId").focus();
            return false;
        }
        if(document.getElementById("othercountries").value == 'YES') {
                var mobileNumber = document.getElementById("mobileNoToAddGirvi").value;

        if ((mobileNumber != 'Enter Mobile Number') && (mobileNumber != '')) {
           if (mobileNumber.length < 5) {
            alert("Mobile number should be at least 5 digits.");
            document.getElementById("mobileNoToAddGirvi").focus();
            return false;
        } else if (mobileNumber.length > 15) {
            alert("Mobile number should not exceed 15 digits.");
            document.getElementById("mobileNoToAddGirvi").focus();
            return false;
        }
        else if (validateNumWithUnderScore(mobileNumber, "Accept only Numbers without space character!") == false) {
            document.getElementById("mobileNoToAddGirvi").focus();
            return false;
        }
        }
        } 
          else {
        if (((document.getElementById("mobileNoToAddGirvi").value != 'Enter Mobile Number') && (document.getElementById("mobileNoToAddGirvi").value != ''))
                && ((validateNumWithUnderScore(document.getElementById("mobileNoToAddGirvi").value, "Accept only Numbers without space character!") == false ||
                        validateLengthExact10(document.getElementById("mobileNoToAddGirvi").value, "Mobile number length should be 10 digit!") == false))) {
            document.getElementById("mobileNoToAddGirvi").focus();
            return false;
        }
    }
        if (document.getElementById("mobileNoToAddGirvi").value != '') {
            result = checkvalue(document.getElementById("mobileNoToAddGirvi").value, '', '', '');
            if (result != 'success') {
                alert("Duplicate Mobile No ! Please Enter Different Mobile No !");
                return false;
            }
        }
        if (document.getElementById("custEmailForAddGirvi").value != '') {
               result = checkvalue('',document.getElementById("custEmailForAddGirvi").value, '', '', '','','checkemail');
            if (result != 'success') {
                alert("Duplicate Email Id ! Please Enter Different Email Id !");
                return false;
            }
        }
//    if (document.getElementById("custEmailForAddGirvi").value != '') {
//        result = checkvalue('', document.getElementById("custEmailForAddGirvi").value, '', '');
//        if (result != 'success') {
//            alert("Duplicate Email Id ! Please Enter Different Email Id !");
//            return false;
//        }
//    }
//    if (document.getElementById("gstNoToAddGirvi").value != '') {
//        var gstNoLength = document.getElementById("gstNoToAddGirvi").value.length;
//        if (gstNoLength < 15 || gstNoLength > 15) {
//            alert("GST No should contain 15 digits !");
//            document.getElementById("gstNoToAddGirvi").focus();
//            return false;
//        }
//    }
//    if (document.getElementById("custPANNoForAddGirvi").value != '') {
//        var adharNoLength = document.getElementById("custPANNoForAddGirvi").value.length;
//        if (adharNoLength < 10 || adharNoLength > 10) {
//            alert("PAN No should contain 10 characters !");
//            document.getElementById("custPANNoForAddGirvi").focus();
//            return false;
//        }
//    }
//    if (document.getElementById("custAdharNoForAddGirvi").value != '') {
//        var adharNoLength = document.getElementById("custAdharNoForAddGirvi").value.length;
//        if (adharNoLength < 12 || adharNoLength > 12) {
//            alert("Adhaar No should contain 12 digits !");
//            document.getElementById("custAdharNoForAddGirvi").focus();
//            return false;
//        }
//    }
    }
    return true;
}
function valDirectAddCustInputsSmall() {
    if (validateEmptyField(document.getElementById("custFirstNameForAddGirvi").value, "Please enter First Name!") == false) {
        document.getElementById("custFirstNameForAddGirvi").focus();
        return false;
    }
    if (validateSelectField(document.getElementById("girviFirmId").value, "Please select Firm Name!") == false) {
        document.getElementById("girviFirmId").focus();
        return false;
    }
    if (((document.getElementById("mobileNoToAddGirvi").value != 'Enter Mobile Number') && (document.getElementById("mobileNoToAddGirvi").value != ''))
            && ((validateNumWithUnderScore(document.getElementById("mobileNoToAddGirvi").value, "Accept only Numbers without space character!") == false ||
                    validateLengthExact10(document.getElementById("mobileNoToAddGirvi").value, "Mobile number length should be 10 digit!") == false))) {
        document.getElementById("mobileNoToAddGirvi").focus();
        return false;
    }
    if (document.getElementById("mobileNoToAddGirvi").value != '') {
        result = checkvalue(document.getElementById("mobileNoToAddGirvi").value, '', '', '');
        if (result != 'success') {
            alert("Duplicate Mobile No ! Please Enter Different Mobile No !");
            return false;
        }
    }

    return true;
}
function direct_add_cust(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertDirectAddCust;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertDirectAddCust() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    }
}
function directAddCustSmall(panelDivName) {
    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    //
    if (typeof (document.getElementById("addCustomerHomeButton")) != 'undefined' && document.getElementById("addCustomerHomeButton") != null) {
        document.getElementById("addCustomerHomeButton").style.visibility = "hidden";
    }
    //
    if (typeof (document.getElementById("addCustomerSellButton")) != 'undefined' && document.getElementById("addCustomerSellButton") != null) {
        document.getElementById("addCustomerSellButton").style.visibility = "hidden";
    }
    //

    if (valDirectAddCustInputsSmall()) {

        var poststr = "firstName=" + encodeURIComponent(document.getElementById("custFirstNameForAddGirvi").value)
                + "&lastName=" + encodeURIComponent(document.getElementById("custLastNameForAddGirvi").value)
                + "&mobileNoToAddGirvi=" + encodeURIComponent(document.getElementById("mobileNoToAddGirvi").value)
                + "&city=" + encodeURIComponent(document.getElementById("custCityForAddGirvi").value)
                + "&firmId=" + encodeURIComponent(document.getElementById("girviFirmId").value)
                + "&panelDivName=" + encodeURIComponent(panelDivName)
                + "&user_prefix_name=" + encodeURIComponent(document.getElementById("user_prefix_name").value)
                + "&office_address=" + encodeURIComponent(document.getElementById("office_address").value)
                + "&directAddCust=" + encodeURIComponent("YES");

//        alert('poststr==' + poststr);
        direct_add_cust('include/php/omcaadcsmall.php', poststr);
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
        //
        if (typeof (document.getElementById("addCustomerHomeButton")) != 'undefined' && document.getElementById("addCustomerHomeButton") != null) {
            document.getElementById("addCustomerHomeButton").style.visibility = "visible";
        }
        //
        if (typeof (document.getElementById("addCustomerSellButton")) != 'undefined' && document.getElementById("addCustomerSellButton") != null) {
            document.getElementById("addCustomerSellButton").style.visibility = "visible";
        }
        //
    }
}
function directAddCust(panelDivName) {
//document.getElementById("directAddCustButtAndSellPurchase").disabled=true;
    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    //
    if (typeof (document.getElementById("addCustomerHomeButton")) != 'undefined' && document.getElementById("addCustomerHomeButton") != null) {
        document.getElementById("addCustomerHomeButton").style.visibility = "hidden";
    }
    //
    if (typeof (document.getElementById("addCustomerSellButton")) != 'undefined' && document.getElementById("addCustomerSellButton") != null) {
        document.getElementById("addCustomerSellButton").style.visibility = "hidden";
    }
    //
    if (typeof (document.getElementById("addCustomerLoanButton")) != 'undefined' && document.getElementById("addCustomerLoanButton") != null) {
        document.getElementById("addCustomerLoanButton").style.visibility = "hidden";
    }
    //
    if (typeof (document.getElementById("addCustomerUdhaarButton")) != 'undefined' && document.getElementById("addCustomerUdhaarButton") != null) {
        document.getElementById("addCustomerUdhaarButton").style.visibility = "hidden";
    }
    //
    if (typeof (document.getElementById("addCustomerQuotationButton")) != 'undefined' && document.getElementById("addCustomerQuotationButton") != null) {
        document.getElementById("addCustomerQuotationButton").style.visibility = "hidden";
    }
    //
    if (typeof (document.getElementById("addCustomerApprovalPanelButton")) != 'undefined' && document.getElementById("addCustomerApprovalPanelButton") != null) {
        document.getElementById("addCustomerApprovalPanelButton").style.visibility = "hidden";
    }
    //CODE ADDED FOR APPROVAL BUTTON ON HOME PAGE @AUTHOR:ASHWINI-03AUG2023
    if (typeof (document.getElementById("addCustomerApprovalPanelButton")) != 'undefined' && document.getElementById("addCustomerApprovalPanelButton") != null) {
        document.getElementById("addCustomerApprovalPanelButton").style.visibility = "hidden";
    }
    //
    var genderObj = document.getElementsByName('gender');
    for (var i = 0; i < genderObj.length; i++) {
        if (genderObj[i].checked == true)
            gender = genderObj[i].value;
    }

    if (valDirectAddCustInputs()) {
        if (document.getElementById('frmname_hid').value == 'showfrm') {
            var poststr = "firstName=" + encodeURIComponent(document.getElementById("custFirstNameForAddGirvilf").value)
                    + "&lastName=" + encodeURIComponent(document.getElementById("custLastNameForAddGirvilf").value)
                    + "&fatherOrSpouseNameIndicator=" + encodeURIComponent(document.getElementById("fatherOrSpouseNameLabel").value)
                    + "&fatherOrSpouseName=" + encodeURIComponent(document.getElementById("custFatherNameForAddGirvi").value)
                    + "&sex=" + encodeURIComponent(gender)
                    + "&mobileNoToAddGirvi=" + encodeURIComponent(document.getElementById("mobileNoToAddGirvilf").value)
                    + "&phoneNoToAddGirvi=" + encodeURIComponent(document.getElementById("phoneNoToAddGirvi").value)
                    + "&city=" + encodeURIComponent(document.getElementById("custCityForAddGirvilf").value)
                    + "&village=" + encodeURIComponent(document.getElementById("custVillageForAddGirvilf").value)
                    + "&firmId=" + encodeURIComponent(document.getElementById("girviFirmId").value)
                    + "&panelDivName=" + encodeURIComponent(panelDivName)
                    /* START CODE TO PASS EXTRA DETAILS TO ADD DIRECT CUSTOMER @AUTHOR:MADHUREE-01JULY2021 */
                    //
                    + "&user_prefix_name=" + encodeURIComponent(document.getElementById("user_prefix_name_lf").value)
                    + "&custStateForAddGirvi=" + encodeURIComponent(document.getElementById("custStateForAddGirvi").value)
                    + "&custCountryForAddGirvi=" + encodeURIComponent(document.getElementById("custCountryForAddGirvi").value)
                    + "&office_address=" + encodeURIComponent(document.getElementById("office_address").value)
                    + "&user_type=" + encodeURIComponent(document.getElementById("user_type").value)
                    + "&gstNoToAddGirvi=" + encodeURIComponent(document.getElementById("gstNoToAddGirvi").value)
                    + "&custCasteForAddGirvi=" + encodeURIComponent(document.getElementById("custCasteForAddGirvi").value)
                    + "&custPANNoForAddGirvi=" + encodeURIComponent(document.getElementById("custPANNoForAddGirvi").value)
                    + "&imageLoadOption=" + encodeURIComponent(document.getElementById("imageLoadOption").value)
                    + "&compressedImage=" + encodeURIComponent(document.getElementById("compressedImage").value)
                    + "&compressedImageThumb=" + encodeURIComponent(document.getElementById("compressedImageThumb").value)
                    + "&compressedImageSize=" + encodeURIComponent(document.getElementById("compressedImageSize").value)
                    + "&fileName=" + encodeURIComponent(document.getElementById("fileName").value)
                    + "&webcam_file=" + encodeURIComponent(document.getElementById("webcam_file").value)
                    + "&custEmailForAddGirvi=" + encodeURIComponent(document.getElementById("custEmailForAddGirvi").value)
                    + "&user_pincode=" + encodeURIComponent(document.getElementById("user_pincode").value)
                    + "&custAdharNoForAddGirvi=" + encodeURIComponent(document.getElementById("custAdharNoForAddGirvi").value)
                    //
                    /* END CODE TO PASS EXTRA DETAILS TO ADD DIRECT CUSTOMER @AUTHOR:MADHUREE-01JULY2021 */
                    //
                    + "&directAddCust=" + encodeURIComponent("YES");
            document.getElementById("custFirstNameForAddGirvilf").value = null;
        } else {
            var poststr = "firstName=" + encodeURIComponent(document.getElementById("custFirstNameForAddGirvi").value)
                    + "&lastName=" + encodeURIComponent(document.getElementById("custLastNameForAddGirvi").value)
                    + "&fatherOrSpouseNameIndicator=" + encodeURIComponent(document.getElementById("fatherOrSpouseNameLabel").value)
                    + "&fatherOrSpouseName=" + encodeURIComponent(document.getElementById("custFatherNameForAddGirvi").value)
                    + "&sex=" + encodeURIComponent(gender)
                    + "&mobileNoToAddGirvi=" + encodeURIComponent(document.getElementById("mobileNoToAddGirvi").value)
                    + "&phoneNoToAddGirvi=" + encodeURIComponent(document.getElementById("phoneNoToAddGirvi").value)
                    + "&city=" + encodeURIComponent(document.getElementById("custCityForAddGirvi").value)
                    + "&village=" + encodeURIComponent(document.getElementById("custVillageForAddGirvi").value)
                    + "&firmId=" + encodeURIComponent(document.getElementById("girviFirmId").value)
                    + "&panelDivName=" + encodeURIComponent(panelDivName)
                    //
                    /* START CODE TO PASS EXTRA DETAILS TO ADD DIRECT CUSTOMER @AUTHOR:MADHUREE-01JULY2021 */
                    //
                    + "&user_prefix_name=" + encodeURIComponent(document.getElementById("user_prefix_name").value)
                    + "&custStateForAddGirvi=" + encodeURIComponent(document.getElementById("custStateForAddGirvi").value)
                    + "&custCountryForAddGirvi=" + encodeURIComponent(document.getElementById("custCountryForAddGirvi").value)
                    + "&office_address=" + encodeURIComponent(document.getElementById("office_address").value)
                    + "&user_type=" + encodeURIComponent(document.getElementById("user_type").value)
                    + "&gstNoToAddGirvi=" + encodeURIComponent(document.getElementById("gstNoToAddGirvi").value)
                    + "&custCasteForAddGirvi=" + encodeURIComponent(document.getElementById("custCasteForAddGirvi").value)
                    + "&custPANNoForAddGirvi=" + encodeURIComponent(document.getElementById("custPANNoForAddGirvi").value)
                    + "&imageLoadOption=" + encodeURIComponent(document.getElementById("imageLoadOption").value)
                    + "&compressedImage=" + encodeURIComponent(document.getElementById("compressedImage").value)
                    + "&compressedImageThumb=" + encodeURIComponent(document.getElementById("compressedImageThumb").value)
                    + "&compressedImageSize=" + encodeURIComponent(document.getElementById("compressedImageSize").value)
                    + "&fileName=" + encodeURIComponent(document.getElementById("fileName").value)
                    + "&webcam_file=" + encodeURIComponent(document.getElementById("webcam_file").value)
                    + "&custEmailForAddGirvi=" + encodeURIComponent(document.getElementById("custEmailForAddGirvi").value)
                    + "&user_pincode=" + encodeURIComponent(document.getElementById("user_pincode").value)
                    + "&custAdharNoForAddGirvi=" + encodeURIComponent(document.getElementById("custAdharNoForAddGirvi").value)
                    //
                    /* END CODE TO PASS EXTRA DETAILS TO ADD DIRECT CUSTOMER @AUTHOR:MADHUREE-01JULY2021 */
                    //
                    + "&directAddCust=" + encodeURIComponent("YES");
            document.getElementById("custFirstNameForAddGirvi").value = null;
        }

        //  alert('poststr==' + poststr);
        direct_add_cust('include/php/omcaadcs.php', poststr);
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
        //
        if (typeof (document.getElementById("addCustomerHomeButton")) != 'undefined' && document.getElementById("addCustomerHomeButton") != null) {
            document.getElementById("addCustomerHomeButton").style.visibility = "visible";
        }
        //
        if (typeof (document.getElementById("addCustomerSellButton")) != 'undefined' && document.getElementById("addCustomerSellButton") != null) {
            document.getElementById("addCustomerSellButton").style.visibility = "visible";
        }
        //
        if (typeof (document.getElementById("addCustomerLoanButton")) != 'undefined' && document.getElementById("addCustomerLoanButton") != null) {
            document.getElementById("addCustomerLoanButton").style.visibility = "visible";
        }
        //
        if (typeof (document.getElementById("addCustomerUdhaarButton")) != 'undefined' && document.getElementById("addCustomerUdhaarButton") != null) {
            document.getElementById("addCustomerUdhaarButton").style.visibility = "visible";
        }
        //
        //
        if (typeof (document.getElementById("addCustomerQuotationButton")) != 'undefined' && document.getElementById("addCustomerQuotationButton") != null) {
            document.getElementById("addCustomerQuotationButton").style.visibility = "visible";
        }
        //ADDED APPROVAL BUTTON @AUTHOR:ASHWINI-03AUG2023
        if (typeof (document.getElementById("addCustomerApprovalPanelButton")) != 'undefined' && document.getElementById("addCustomerApprovalPanelButton") != null) {
            document.getElementById("addCustomerApprovalPanelButton").style.visibility = "visible";
        }
        //
    }
}
//START CODE FOR ADD DIRECT CUSTOMER FROM QUICK SELL PANEL :AUTHOR @DARSHANA 
function addCust(panelDivName) {
    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    document.getElementById("directAddCustButton").style.visibility = "hidden";
    var genderObj = document.getElementsByName('gender');
    for (var i = 0; i < genderObj.length; i++) {
        if (genderObj[i].checked == true)
            gender = genderObj[i].value;
    }

    if (valDirectAddCustInputsQuickSell()) {

        var poststr = "firstName=" + encodeURIComponent(document.getElementById("custFirstNameForAddGirvi").value)
                + "&mobileNoToAddGirvi=" + encodeURIComponent(document.getElementById("mobileNoToAddGirvi").value)
                + "&firmId=" + encodeURIComponent(document.getElementById("girviFirmId").value)
                + "&panelDivName=" + encodeURIComponent(panelDivName)
                + "&directAddCust=" + encodeURIComponent("YES");
        direct_add_cust_quickSell('include/php/omcaadcs' + default_theme + '.php', poststr);
    } else
    {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
        document.getElementById("directAddCustButton").style.visibility = "visible";
    }

    getAddUserDetail();
}
function direct_add_cust_quickSell(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertDirectAddCustQuickSell;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertDirectAddCustQuickSell() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainMiddle").style.visibility = "visible";
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    }
}
//START CODE FOR ADD DIRECT CUSTOMER FROM QUICK SELL PANEL :AUTHOR @DARSHANA 
/********************** Add New Karigar Code *****************************************************************/
function addNewKarigar(obj) {

    document.getElementById("ajax_loading_div").style.visibility = "visible";
    document.getElementById("addKariSubButDiv").style.visibility = "hidden";
    if (validateAddCustomerInputs(obj)) {
        if (uploadImage(document.getElementById("selectPhoto").value) == false) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addKariSubButDiv").style.visibility = "visible";
            return false;
        }
        return true;
    } else
    {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKariSubButDiv").style.visibility = "visible";
        return false;
    }
}
/********************** Add New WholeSaler Code *****************************************************************/
function addNewWholeSaler(obj) {

    document.getElementById("ajax_loading_div").style.visibility = "visible";
    document.getElementById("addWholeSalerSubButDiv").style.visibility = "hidden";
    if (validateAddCustomerInputs(obj)) {
        if (uploadImage(document.getElementById("selectPhoto").value) == false) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addWholeSalerSubButDiv").style.visibility = "visible";
            return false;
        }
        return true;
    } else
    {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addWholeSalerSubButDiv").style.visibility = "visible";
        return false;
    }
}
/********************** Add New Staff Code *****************************************************************/
/*******Start Code To Hide Staff Function @AUTHOR:PRIYA22APR13*********/
function addNewStaff(obj) {

    document.getElementById("ajax_loading_div").style.visibility = "visible";
    document.getElementById("addStaffSubButDiv").style.visibility = "hidden";

    if (validateAddCustomerInputs(obj)) {
        if (uploadImage(document.getElementById("selectPhoto").value) == false) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStaffSubButDiv").style.visibility = "visible";
            return false;
        }
        return true;
    } else
    {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addStaffSubButDiv").style.visibility = "visible";
        return false;
    }
}
/*******End Code To Hide Staff Function @AUTHOR:PRIYA22APR13*********/
/********************** Add New Comment Code *****************************************************************/
/*************Start code to change function @Author:PRIYA08APR14*****************/
/*************Start code to remove validation @Author:PRIYA24JUN14***************/
/*************Start code to remove validation @Author:PRIYA22AUG14**************/
function validateAddCommentInputs(obj) {
    if (validateEmptyField(document.getElementById("commentSubject").value, "Please enter Comment Subject!") == false) {
        document.getElementById("commentSubject").focus();
        return false;
    }
    return true;
}
/*************End code to remove validation @Author:PRIYA22AUG14**************/
/*************End code to remove validation @Author:PRIYA24JUN14***************/
//function add_comment(url, parameters) {
//
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = alertAddComment;
//    xmlhttp.open('POST', url, true);
//    xmlhttp.setRequestHeader('Content-Type',
//            'application/x-www-form-urlencoded');
//    xmlhttp.setRequestHeader("Content-length", parameters.length);
//    xmlhttp.setRequestHeader("Connection", "close");
//    xmlhttp.send(parameters);
//}
//
//function alertAddComment() {
//
//    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
//    } else {
//        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//    }
//
//}
function addNewComment(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateAddCommentInputs(obj)) {
        return true;
//        var poststr = "custId=" + encodeURIComponent(document.getElementById("custId").value)
//                + "&commentSubject=" + encodeURIComponent(document.getElementById("commentSubject").value)
//                + "&commentDesc=" + encodeURIComponent(document.getElementById("commentDesc").value)
//                + "&custComments=" + encodeURIComponent(document.getElementById("custComments").value);
//        add_comment('include/php/omcacomm' + default_theme +'.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    }
    return false;
}
/*************End code to change function @Author:PRIYA08APR14*****************/
//**************** Get More Item Div in Girvi Panel
/******START Code to change Item Count @AUTHOR:PRIYA24JAN13**********/
var getItemDiv = 4;
var itemEntered = 0;
function get_more_item_div(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertGetMoreItemDiv;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/*****************Start code to change func @Author:PRIYA01MAR14***************/
function alertGetMoreItemDiv() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadGetItemListDiv").style.visibility = "hidden";
//        document.getElementById("addItemDiv").innerHTML = document.getElementById("addItemDiv").innerHTML + xmlhttp.responseText;
        if (getItemDiv == 5) {
            document.getElementById("addItemDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("addItemDiv" + getItemDiv).innerHTML = xmlhttp.responseText;
        }
    } else {
        document.getElementById("ajaxLoadGetItemListDiv").style.visibility = "visible";
    }
}
/*****************End code to change func @Author:PRIYA01MAR14***************/
function getMoreItemDiv() {

    var counter = document.getElementById("itemDivCounter4").value;
    //alert(counter);

    if (counter != '') {
        getItemDiv = getItemDiv + 1;
    } else {
        getItemDiv = 5;
        document.getElementById("itemDivCounter4").value = 1;
    }
    var poststr = "itemDivCount=" + getItemDiv;
    get_more_item_div('include/php/omiadvgv' + default_theme + '.php', poststr);
    return false;
}
//
function getMoreItemDetailsDiv() {
    var counter = document.getElementById("itemDivCounter4").value;
    //alert(counter);
    if (counter != '') {
        getItemDiv = getItemDiv + 1;
    } else {
        getItemDiv = 5;
        document.getElementById("itemDivCounter4").value = 1;
    }
    var poststr = "itemDivCount=" + getItemDiv;
    get_more_item_div('include/php/omiadvgvint' + default_theme + '.php', poststr);
    return false;
}
/******END Code to change Item Count @AUTHOR:PRIYA22JAN13**********/
/********************** Add New Girvi Code *****************************************************************/
/************************Start to change function to add validation for accounts @Author:SHRI10JUL15*************/
function validateAddGirviInputs() {
    //
    //alert('selROIValue == ' + document.getElementById("selROIValue").value);
    //
    var totalPaidAmt = parseFloat(document.getElementById("totalPaidAmount").value).toFixed(2);
    var princpalAmt = parseFloat(document.getElementById("principalAmount").value).toFixed(2);
    var processingAmtLoan = document.getElementById("processingAmtLoan").value;
    if (processingAmtLoan == "Y") {
        var princpalAmt = parseFloat(document.getElementById("finalPrincipalAmount").value).toFixed(2);
    }
    //
    if (validateEmptyField(document.getElementById("principalAmount").value, "Please enter Principal Amount!") == false ||
            validateNum(document.getElementById("principalAmount").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("principalAmount").focus();
        return false;
    } else if (validateSelectField(document.getElementById("interestType").value, "Please select Interest Type!") == false) {
        document.getElementById("interestType").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("serialNumber").value, "Please enter Serial Number!") == false ||
            validateNum(document.getElementById("serialNumber").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("serialNumber").focus();
        return false;
    }
    //
    //
    // ADDED CODE FOR ROI @AUTHOR:PRIYANKA-20MAR2023
    else if (validateEmptyField(document.getElementById("selROIValue").value, "Please Select Rate Of Interest!") == false) {
        document.getElementById("selROIValue").focus();
        return false;
    }
    //
    // 
    /************Start Code to add validation for roi @Author:PRIYA17OCT13************/
    else if (validateEmptyField(document.getElementById("selROI").value, "Please Select ROI!") == false) {
        document.getElementById("selROI").focus();
        return false;
    }
    /************End Code to add validation for @Author:PRIYA17OCT13************/
    //
    //
    else if (validateSelectField(document.getElementById("DOBDay").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("girviFirmId").value, "Please select Girvi Firm Id!") == false) {
        document.getElementById("girviFirmId").focus();
        return false;
    }
    /************Start Code to remove validation for packet weight @Author:SANT19MAY17************/
    else if (validateEmptyField(document.getElementById("packetNumber").value, "Please enter Packet Number!") == false) {
        document.getElementById("packetNumber").focus();
        return false;
    }
    /************End Code to remove validation for packet weight @Author:SANT19MAY17************/
    else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("girviDrAccId").value, "Please select Girvi Dr Account!") == false) {
        document.getElementById("girviDrAccId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("girviPaySelAccountId").value, "Please select Girvi Cr Account!") == false) {
        document.getElementById("girviPaySelAccountId").focus();
        return false;
    } else if (totalPaidAmt > princpalAmt || totalPaidAmt < princpalAmt) {
        alert('Please pay correct amount! Total should be: ' + princpalAmt);
        document.getElementById("girvCashAmtRec").focus();
        return false;
    } else {
        itemEntered = 0;
        for (var dc = 1; dc <= getItemDiv; dc++) {
            if (document.getElementById("itemName" + dc).value != "") {
                if (validateEmptyField(document.getElementById("itemName" + dc).value, "Please select Item Name " + dc + "!") == false) {
                    document.getElementById("itemName" + dc).focus();
                    return false;
                } else if (document.getElementById("itemPieces" + dc).value == 0 ||
                        validateNum(document.getElementById("itemPieces" + dc).value, "Accept only numeric characters without space character!") == false) {
                    if (document.getElementById("itemPieces" + dc).value == 0) {
                        alert('Please enter number of Pieces, 0 or space not accepted!');
                    }
                    document.getElementById("itemPieces" + dc).focus();
                    return false;
                } else if (document.getElementById("itemType" + dc).value != 'Other') {
                    if (document.getElementById("grossWeight" + dc).value == ' ~ Gross Weight ~') {
                        alert('Please enter Gross Weight!');
                        document.getElementById("grossWeight" + dc).focus();
                        return false;
                    } else if (validateEmptyField(document.getElementById("grossWeight" + dc).value, "Please enter Gross Weight!") == false ||
                            validateNumWithDot(document.getElementById("grossWeight" + dc).value, "Accept only numeric characters without space character!") == false) {
                        document.getElementById("grossWeight" + dc).focus();
                        return false;
                    } else if (validateSelectField(document.getElementById("grossWeightType" + dc).value, "Please select Gross Weight Type!") == false) {
                        document.getElementById("grossWeightType" + dc).focus();
                        return false;
                    } else if (document.getElementById("itemWeight" + dc).value == ' ~ Net Weight ~') {
                        alert('Please enter Item Net Weight!');
                        document.getElementById("itemWeight" + dc).focus();
                        return false;
                    } else if (validateEmptyField(document.getElementById("itemWeight" + dc).value, "Please enter Item Net Weight!") == false ||
                            validateNumWithDot(document.getElementById("itemWeight" + dc).value, "Accept only numeric characters without space character!") == false) {
                        document.getElementById("itemWeight" + dc).focus();
                        return false;
                    } else if (validateSelectField(document.getElementById("weightType" + dc).value, "Please select Weight Type!") == false) {
                        document.getElementById("weightType" + dc).focus();
                        return false;
                    } else if (validateSelectField(document.getElementById("itemTunch" + dc).value, "Please select Item Tunch!") == false) {
                        document.getElementById("itemTunch" + dc).focus();
                        return false;
                    } else if (parseFloat(document.getElementById("grossWeight" + dc).value) < parseFloat(document.getElementById("itemWeight" + dc).value)) {
                        alert('Net Weight Exceeding Gross Weight!\nPlease Enter Correct Net Weight!');
                        document.getElementById("itemWeight" + dc).focus();
                        return false;
                    } else if (document.getElementById("weightType" + dc).value != document.getElementById("grossWeightType" + dc).value) {
                        alert('Net Weight and Gross Weight Type is Different!');
                        document.getElementById("weightType" + dc).focus();
                        return false;
                    }
                } else if (document.getElementById("itemType" + dc).value == 'Other') {
                    if (validateEmptyField(document.getElementById("girviValuationMan" + dc).value, "Please enter Item Valuation, for other item it is mandatory!") == false ||
                            validateNumWithDot(document.getElementById("girviValuationMan" + dc).value, "Accept only numeric characters without space character!") == false) {
                        document.getElementById("girviValuationMan" + dc).focus();
                        return false;
                    }
                }
                itemEntered++;
            } else {
                if (itemEntered == 0) {
                    alert('Please enter Item Details!');
                    document.getElementById("itemName" + dc).focus();
                    return false;
                    exit();
                }
            }
        }
    }
    return true;
}
function validateAddPacketInputs() {
    //
    //alert('selROIValue =2= ' + document.getElementById("selROIValue").value);
    //
    var totalPaidAmt = parseFloat(document.getElementById("totalPaidAmount").value).toFixed(2);
    var princpalAmt = parseFloat(document.getElementById("principalAmount").value).toFixed(2);
    var processingAmtLoan = document.getElementById("processingAmtLoan").value;
    if (processingAmtLoan == "Y") {
        var princpalAmt = parseFloat(document.getElementById("finalPrincipalAmount").value).toFixed(2);
    }
    //
    if (validateEmptyField(document.getElementById("principalAmount").value, "Please enter Principal Amount!") == false ||
            validateNumWithDot(document.getElementById("principalAmount").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("principalAmount").focus();
        return false;
    } else if (validateSelectField(document.getElementById("interestType").value, "Please select Interest Type!") == false) {
        document.getElementById("interestType").focus();
        return false;
    }
    //
    // ADDED CODE FOR ROI @AUTHOR:PRIYANKA-20MAR2023
    else if (validateEmptyField(document.getElementById("selROIValue").value, "Please Select Rate Of Interest!") == false) {
        document.getElementById("selROIValue").focus();
        return false;
    }
    //
    //
    /************Start Code to add validation for roi @Author:PRIYA17OCT13************/
    else if (validateEmptyField(document.getElementById("selROI").value, "Please Select ROI!") == false) {
        document.getElementById("selROI").focus();
        return false;
    }
    /************End Code to add validation for roi @Author:PRIYA17OCT13************/
    else if (validateSelectField(document.getElementById("DOBDay").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("girviFirmId").value, "Please select Girvi Firm Id!") == false) {
        document.getElementById("girviFirmId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("serialNumber").value, "Please enter Serial Number!") == false ||
            validateNum(document.getElementById("serialNumber").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("serialNumber").focus();
        return false;
    }
    /************Start Code to remove validation for packet weight @Author:SANT19MAY17************/
    else if (validateEmptyField(document.getElementById("packetNumber").value, "Please enter Packet Number!") == false) {
        document.getElementById("packetNumber").focus();
        return false;
    }
    /************End Code to remove validation for packet weight @Author:SANT19MAY17************/
    else if (validateSelectField(document.getElementById("girviDrAccId").value, "Please select Girvi Dr Account!") == false) {
        document.getElementById("girviDrAccId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("girviPaySelAccountId").value, "Please select Girvi Cr Account!") == false) {
        document.getElementById("girviPaySelAccountId").focus();
        return false;
    } else if (totalPaidAmt > princpalAmt || totalPaidAmt < princpalAmt) {
        alert('Please pay correct amount! Total should be: ' + princpalAmt);
        document.getElementById("girvCashAmtRec").focus();
        return false;
    }
    return true;
}
/************************End to change function to add validation for accounts @Author:SHRI10JUL15*************/
function add_girvi(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddGirvi;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertAddGirvi() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
var girviMoreItem;
function setMoreItems(obj) {
    girviMoreItem = obj.value;
    return true;
} /*******Start code to remove hindi date code @Author:PRIYA21APR15***************/
function addNewGirvi() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addGirviSubButDiv").style.visibility = "hidden";
    var girviDateDay = document.getElementById("DOBDay").value;
    var girviDateMMM = document.getElementById("DOBMonth").value;
    var girviDateYY = document.getElementById("DOBYear").value;
    var girviDateStr = document.getElementById("DOBMonth").value + ' ' + document.getElementById("DOBDay").value + ', ' + document.getElementById("DOBYear").value;
    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date
    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;
    if (typeof (document.getElementById('nepaliDateIndicator')) != 'undefined' &&
            (document.getElementById('nepaliDateIndicator') != null)) {
        var nepaliDateIndicator = document.getElementById("nepaliDateIndicator").value;
    } else {
        var nepaliDateIndicator = '';
    }
    if (datesDiff < 0 && nepaliDateIndicator != 'YES') {
        alert('Please Select the correct Girvi Date!');
        document.getElementById("DOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addGirviSubButDiv").style.visibility = "visible";
        return false;
        exit();
    } else {
        var girviType = document.getElementById("girviType").value;
        if (girviDateMMM == 'FEB' || girviDateMMM == 'APR' || girviDateMMM == 'JUN' || girviDateMMM == 'SEP' || girviDateMMM == 'NOV') {
            if (girviDateMMM == 'FEB' && girviDateDay > 29 && girviDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addGirviSubButDiv").style.visibility = "visible";
                return false;
                exit();
            }
            if (girviDateMMM == 'FEB' && girviDateDay > 28 && girviDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addGirviSubButDiv").style.visibility = "visible";
                return false;
                exit();
            }
            if (girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addGirviSubButDiv").style.visibility = "visible";
                return false;
                exit();
            }
        }
        /***** START CODE TO ADD ItemEntered @AUTHOR:PRIYA26JAN13*******/
        if (girviType == 'Sec.Loan') {
            if (validateAddGirviInputs()) {
                document.getElementById("itemEntered").value = itemEntered;
                return true;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addGirviSubButDiv").style.visibility = "visible";
                return false;
            }
        } else {
            if (validateAddPacketInputs()) {
                return true;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addGirviSubButDiv").style.visibility = "visible";
            }
        }
//
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addGirviSubButDiv").style.visibility = "visible";
        return false;
    }
    return false;
}
/*******End code to remove hindi date code @Author:PRIYA21APR15***************/ /********************** Add Girvi Item Code *****************************************************************/
function validateAddGirviItemInputs(dc) {
    itemEntered = 0;
    if (document.getElementById("itemName" + dc).value != "") {

        if (validateEmptyField(document.getElementById("itemName" + dc).value, "Please select Item Name " + dc + "!") == false) {
            document.getElementById("itemName" + dc).focus();
            return false;
        } else if (document.getElementById("itemPieces" + dc).value == 0 || validateNum(document.getElementById("itemPieces" + dc).value, "Accept only numeric characters without space character!") == false) {
            if (document.getElementById("itemPieces" + dc).value == 0) {
                alert('Please enter number of Pieces, 0 or space not accepted!');
            }
            document.getElementById("itemPieces" + dc).focus();
            return false;
        } else if (document.getElementById("itemType" + dc).value != 'Other') {
            if (document.getElementById("grossWeight" + dc).value == ' ~ Gross Weight ~') {
                alert('Please enter Gross Weight!');
                document.getElementById("grossWeight" + dc).focus();
                return false;
            } else if (validateEmptyField(document.getElementById("grossWeight" + dc).value, "Please enter Gross Weight!") == false ||
                    validateNumWithDot(document.getElementById("grossWeight" + dc).value, "Accept only numeric characters without space character!") == false) {
                document.getElementById("grossWeight" + dc).focus();
                return false;
            } else if (validateSelectField(document.getElementById("grossWeightType" + dc).value, "Please select Gross Weight Type!") == false) {
                document.getElementById("grossWeightType" + dc).focus();
                return false;
            } else if (document.getElementById("itemWeight" + dc).value == ' ~ Net Weight ~') {
                alert('Please enter Item Net Weight!');
                document.getElementById("itemWeight" + dc).focus();
                return false;
            } else if (validateEmptyField(document.getElementById("itemWeight" + dc).value, "Please enter Item Net Weight!") == false ||
                    validateNumWithDot(document.getElementById("itemWeight" + dc).value, "Accept only numeric characters without space character!") == false) {
                document.getElementById("itemWeight" + dc).focus();
                return false;
            } else if (validateSelectField(document.getElementById("weightType" + dc).value, "Please select Weight Type!") == false) {
                document.getElementById("weightType" + dc).focus();
                return false;
            } else if (validateSelectField(document.getElementById("itemTunch" + dc).value, "Please select Item Tunch!") == false) {
                document.getElementById("itemTunch" + dc).focus();
                return false;
            } else if (parseFloat(document.getElementById("grossWeight" + dc).value) < parseFloat(document.getElementById("itemWeight" + dc).value)) {
                alert('Net Weight Exceeding Gross Weight!\nPlease Enter Correct Net Weight!');
                document.getElementById("itemWeight" + dc).focus();
                return false;
            }
        } else if (document.getElementById("itemType" + dc).value == 'Other') {
            if (validateEmptyField(document.getElementById("girviValuationMan" + dc).value, "Please enter Item Valuation, for other item it is mandatory!") == false ||
                    validateNumWithDot(document.getElementById("girviValuationMan" + dc).value, "Accept only numeric characters without space character!") == false) {
                document.getElementById("girviValuationMan" + dc).focus();
                return false;
            }
        }
        itemEntered++;
    } else {
        if (itemEntered == 0) {
            alert('Please enter Item Details!');
            document.getElementById("itemName" + dc).focus();
            return false;
            exit();
        }
    }
    return true;
}
function add_girvi_Item(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddGirviItem;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertAddGirviItem() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }

}
function addGirviItem(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateAddGirviItemInputs(obj)) {

        itemNames = "";
        itemLength = document.add_girvi_item.itemName.length;
        itemCounter = 0;
        for (i = 0; i < itemLength; i++) {
            if (document.add_girvi_item.itemName[i].selected == true && itemCounter % 2 == 0) {
                itemNames += document.add_girvi_item.itemName[i].value + ", ";
                itemCounter++;
            } else if (document.add_girvi_item.itemName[i].selected == true && itemCounter % 2 != 0) {
                itemNames += "<font color=blue>" + document.add_girvi_item.itemName[i].value + "</font>" + ", ";
                itemCounter++;
            }
        }

        itemNames = itemNames.slice(0, -2);
        var poststr;
        if (document.getElementById("itemType").value != 'Other') {
            poststr = "&custId=" + encodeURIComponent(document.getElementById("custId").value)
                    + "&itemName=" + encodeURIComponent(itemNames)
                    + "&itemType=" + encodeURIComponent(document.getElementById("itemType").value)
                    + "&itemPieces=" + encodeURIComponent(document.getElementById("itemPieces").value)
                    + "&grossItemWeight=" + encodeURIComponent(document.getElementById("grossWeight").value)
                    + "&grossWeightType=" + encodeURIComponent(document.getElementById("grossWeightType").value)
                    + "&itemWeight=" + encodeURIComponent(document.getElementById("itemWeight").value)
                    + "&weightType=" + encodeURIComponent(document.getElementById("weightType").value)
                    + "&itemTunch=" + encodeURIComponent(document.getElementById("itemTunch").value)
                    + "&addMoreItem=" + encodeURIComponent(girviMoreItem);
        } else {
            poststr = "&custId=" + encodeURIComponent(document.getElementById("custId").value)
                    + "&itemName=" + encodeURIComponent(itemNames)
                    + "&itemType=" + encodeURIComponent(document.getElementById("itemType").value)
                    + "&itemPieces=" + encodeURIComponent(document.getElementById("itemPieces").value)
                    + "&addMoreItem=" + encodeURIComponent(girviMoreItem);
        }

        add_girvi_Item('include/php/orgaagmi' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
/********************** Add Gold Item Stock Code *****************************************************************/
function validateAddGoldStockInputs(obj) {

    if (validateSelectField(document.getElementById("itemName").value, "Please select Item Name!") == false) {
        document.getElementById("itemName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("itemQuantity").value, "Please enter Item Weight!") == false ||
            validateNum(document.getElementById("itemQuantity").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("itemQuantity").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("itemWeight").value, "Please enter Item Weight!") == false ||
            validateNumWithDot(document.getElementById("itemWeight").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("itemWeight").focus();
        return false;
    } else if (validateSelectField(document.getElementById("weightType").value, "Please select Weight Type!") == false) {
        document.getElementById("weightType").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("itemLabour").value, "Please enter Item Labour!") == false ||
            validateNumWithDot(document.getElementById("itemLabour").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("itemLabour").focus();
        return false;
    } else if (validateSelectField(document.getElementById("labourType").value, "Please select Labour Type!") == false) {
        document.getElementById("labourType").focus();
        return false;
    } else if (validateSelectField(document.getElementById("itemTunch").value, "Please select Item Tunch!") == false) {
        document.getElementById("itemTunch").focus();
        return false;
    } else if (validateTwoSelectField(document.getElementById("itemWholesaler").value, document.getElementById("itemKarigar").value, "Please select Wholesaler or Karigar!") == false) {
        document.getElementById("itemWholesaler").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Name!") == false) {
        document.getElementById("firmId").focus();
        return false;
    }
    return true;
}
function add_gold_stock(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddGoldStock;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertAddGoldStock() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addGoldStockDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }

}
function addGoldStock(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateAddGoldStockInputs(obj)) {
        var poststr = "&itemName=" + encodeURIComponent(document.getElementById("itemName").value) + "&itemQuantity=" + encodeURIComponent(document.getElementById("itemQuantity").value)
                + "&itemWeight=" + encodeURIComponent(document.getElementById("itemWeight").value)
                + "&weightType=" + encodeURIComponent(document.getElementById("weightType").value)
                + "&itemLabour=" + encodeURIComponent(document.getElementById("itemLabour").value)
                + "&labourType=" + encodeURIComponent(document.getElementById("labourType").value)
                + "&itemTunch=" + encodeURIComponent(document.getElementById("itemTunch").value)
                + "&itemWholesaler=" + encodeURIComponent(document.getElementById("itemWholesaler").value)
                + "&itemKarigar=" + encodeURIComponent(document.getElementById("itemKarigar").value)
                + "&firmId=" + encodeURIComponent(document.getElementById("firmId").value)
                + "&goldItemComments=" + encodeURIComponent(document.getElementById("goldItemComments").value);
        add_gold_stock('include/php/omAddGoldStock' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
/********************** Add New City Code *****************************************************************/
function validateAddCityInputs(obj) {

    if (validateEmptyField(document.getElementById("cityName").value, "Please enter City Name!") == false) {
        document.getElementById("cityName").focus();
        return false;
    }
    return true;
}
function add_city(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddCity;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertAddCity() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "visible";
    }

}
function addCity(obj, cityVillage) {
    document.getElementById("ajax_loading_div").style.visibility = "visible";
    if (validateAddCityInputs(obj)) {
        var poststr = "cityName=" + encodeURIComponent(document.getElementById("cityName").value)
                + "&cityComments=" + encodeURIComponent(document.getElementById("cityComments").value)
                + "&cityVillage=" + encodeURIComponent(document.getElementById("cityVillageValue").value)
                //CODE ADDED TO ADD PIN CODE, ECOM DELIVERY STATUS, DELIVERY TIME, ORDER DELIIVERY TIME,@AUTHOR:HEMA-8AUG2020
                + "&pinCode=" + encodeURIComponent(document.getElementById("pinCode").value)
                + "&ecomDelivery=" + encodeURIComponent(document.getElementById("ecomDelivery").value)
                + "&deliveryTime=" + encodeURIComponent(document.getElementById("deliveryTime").value)
                + "&orderDeliveryTime=" + encodeURIComponent(document.getElementById("orderDeliveryTime").value);
        add_city('include/php/omvvaacc' + default_theme + '.php', poststr);
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
    }
}
//
function addCityOrVillage(value) {
    document.getElementById("cityVillageValue").value = value;
}
/********************** Add New Country Code *****************************************************************/
function validateAddCountryInputs(obj) {

    if (validateEmptyField(document.getElementById("countryName").value, "Please enter Country Name!") == false) {
        document.getElementById("countryName").focus();
        return false;
    }
    return true;
}
function add_country(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddCountry;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertAddCountry() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "visible";
    }

}
function addCountry(obj) {
    document.getElementById("ajax_loading_div").style.visibility = "visible";
    if (validateAddCountryInputs(obj)) {
        var poststr = "countryName=" + encodeURIComponent(document.getElementById("countryName").value)
                + "&countryCurrency=" + encodeURIComponent(document.getElementById("countryCurrency").value)
                + "&countryCode=" + encodeURIComponent(document.getElementById("countryCode").value)
                + "&countryComments=" + encodeURIComponent(document.getElementById("countryComments").value);
        add_country('include/php/omvcaaco' + default_theme + '.php', poststr);
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
    }
}
/********************** Add New State Code *****************************************************************/
function validateAddStateInputs(obj) {

    if (validateEmptyField(document.getElementById("stateName").value, "Please enter State Name!") == false) {
        document.getElementById("stateName").focus();
        return false;
    }
    return true;
}
function add_state(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddState;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertAddState() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "visible";
    }
}
function addState(obj) {
    document.getElementById("ajax_loading_div").style.visibility = "visible";
    if (validateAddStateInputs(obj)) {
        var poststr = "stateName=" + encodeURIComponent(document.getElementById("stateName").value)
                + "&stateComments=" + encodeURIComponent(document.getElementById("stateComments").value);
        add_state('include/php/omvsaast' + default_theme + '.php', poststr);
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
    }
}
/********************** Add New ItemName Code *****************************************************************/
/****************Start Code To Add Item Category @AUTHOR:PRIYA11APR13*****************/
/****************Start code to change fn @Author:PRIYA07DEC13***************/
function validateAddItemNameInputs(obj) {
    if (validateEmptyField(document.getElementById("addItemName").value, "Please enter Item Name!") == false) {
        document.getElementById("addItemName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addItemCategory").value, "Please enter Item Category!") == false) {
        document.getElementById("addItemCategory").focus();
        return false;
    } else if (validateSelectField(document.getElementById("metalType").value, "Please select Metal Type!") == false) {
        document.getElementById("metalType").focus();
        return false;
    }
    return true;
}
//function add_itemName(url, parameters) {
//
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = alertAddItemName;
//    xmlhttp.open('POST', url, true);
//    xmlhttp.setRequestHeader('Content-Type',
//            'application/x-www-form-urlencoded');
//    xmlhttp.setRequestHeader("Content-length", parameters.length);
//    xmlhttp.setRequestHeader("Connection", "close");
//    xmlhttp.send(parameters);
//}
//
//function alertAddItemName() {
//
//    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
//    } else {
//        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//    }
//
//}
/****************Start code to change cond @Author:PRIYA26DEC13*************************/
function addSettItemName() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateAddItemNameInputs()) {
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    }
}
/****************End code to change cond @Author:PRIYA26DEC13*************************/
/****************End code to change fn @Author:PRIYA07DEC13***************/
/****************End Code To Add Item Category @AUTHOR:PRIYA11APR13*****************/
/********************** Add New ItemTunch Code *****************************************************************/
function validateAddItemTunchInputs(obj) {

    if (validateEmptyField(document.getElementById("tunchName").value, "Please enter Tunch Name!") == false) {
        document.getElementById("tunchName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("tunchValue").value, "Please enter Tunch Value!") == false ||
            validateNumWithDot(document.getElementById("tunchValue").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("tunchValue").focus();
        return false;
    } else if (validateSelectField(document.getElementById("metalType").value, "Please select Metal Type!") == false) {
        document.getElementById("metalType").focus();
        return false;
    }
    return true;
}
function add_itemTunch(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddItemTunch;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertAddItemTunch() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemTunchButDiv").style.visibility = "visible";
        document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "visible";
        document.getElementById("addItemTunchButDiv").style.visibility = "hidden";
    }

}
/**********Start of changes in function to access barcode related fields @AUTHOR: SANDY21OCT13 ****************/
function addItemTunch(obj) {
    document.getElementById("ajax_loading_div").style.visibility = "visible";
    document.getElementById("addItemTunchButDiv").style.visibility = "hidden";
    if (validateAddItemTunchInputs(obj)) {
        var poststr = "tunchName=" + encodeURIComponent(document.getElementById("tunchName").value) + "&tunchValue=" + encodeURIComponent(document.getElementById("tunchValue").value)
                + "&metalType=" + encodeURIComponent(document.getElementById("metalType").value)
                + "&barcodeColor=" + encodeURIComponent(document.getElementById("barcodeColor").value)
                + "&barcodeSize=" + encodeURIComponent(document.getElementById("barcodeSize").value)
                + "&itemTunchComments=" + encodeURIComponent(document.getElementById("itemTunchComments").value);
        add_itemTunch('include/php/omiaadit' + default_theme + '.php', poststr);
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemTunchButDiv").style.visibility = "visible";
    }
}
/**********End of changes in function to access barcode related fields @AUTHOR: SANDY21OCT13 ****************/
/********************** Add New Metal Rate Code *****************************************************************/
/***Start of changes in validation @AUTHOR: SANDY21DEC13 **/
function validateAddMetalRateInputs(obj) {
    var valTaxCheck = document.getElementById('metalRateTaxIncludeCheck').checked;
    if (validateSelectField(document.getElementById("metalType").value, "Please select Metal Type!") == false) {
        document.getElementById("metalType").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("metalSelectId").value, "Please enter Metal Id!") == false) {
        document.getElementById("metalSelectId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("metalRate").value, "Please enter Metal Rate!") == false ||
            validateNumWithDot(document.getElementById("metalRate").value, "Accept only numeric characters without space character!") == false) { //With Dot Validation Added @Author:SHRI03MAY17
        document.getElementById("metalRate").focus();
        return false;
    } else if (valTaxCheck == true && validateEmptyField(document.getElementById("metalRateTaxPrecent").value, "Please enter tax percentage!") == false) {
        document.getElementById("metalRateTaxPrecent").focus();
        return false;
    } else if (valTaxCheck == true && validateEmptyField(document.getElementById("metalRateWithTax").value, "Please enter Metal Rate With Tax!") == false) {
        document.getElementById("metalRateWithTax").focus();
        return false;
    }
    return true;
}
/***End of changes in validation @AUTHOR: SANDY21DEC13**/
function add_metal_rate(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddMetalRate;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

/*********Start Code To Add Message Disp Delay Func @Author:PRIYA16AUG13*******/ function alertAddMetalRate() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addMetalRateButDiv").style.visibility = "visible";
        document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        refreshMetalRate();
        window.setTimeout(closeMetRateMessDiv, 1000);
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "visible";
        document.getElementById("addMetalRateButDiv").style.visibility = "hidden";
    }
    function closeMetRateMessDiv() {
        document.getElementById("metRateMessDisplayDiv").innerHTML = "";
    }
}
/* Start of modification to pass goldid and customer percentage @AUTHOR: SANDY25JUL13 */
/****************Start code to add ids @Author:PRIYA10NOV14****************/
/*****************Start code to add ids @Author:PRIYA02DEC14******************/
function addMetalRate(obj) {
    document.getElementById("ajax_loading_div").style.visibility = "visible";
    document.getElementById("addMetalRateButDiv").style.visibility = "hidden";
    if (validateAddMetalRateInputs(obj)) {

        var poststr = "metalRate=" + encodeURIComponent(document.getElementById("metalRate").value)
                + "&metalType=" + encodeURIComponent(document.getElementById("metalType").value)
                + "&metalRateComments=" + encodeURIComponent(document.getElementById("metalRateComments").value)
                + "&metalSelectId=" + encodeURIComponent(document.getElementById("metalSelectId").value)
                + "&metalRatePerWt=" + encodeURIComponent(document.getElementById("metalRatePerWt").value)
                + "&metalRatePerWtType=" + encodeURIComponent(document.getElementById("metalRatePerWtType").value)
                + "&customerPercentage=" + encodeURIComponent(document.getElementById("customerPercentage").value)
                + "&metalRateTaxIncludeCheck=" + encodeURIComponent(document.getElementById('metalRateTaxIncludeCheck').checked)
                + "&metalRateTableDisplay=" + encodeURIComponent(document.getElementById('metalRateTableDisplay').checked)
                + "&metalRateTaxPrecent=" + encodeURIComponent(document.getElementById("metalRateTaxPrecent").value)
                + "&metalRateWithTax=" + encodeURIComponent(document.getElementById("metalRateWithTax").value)
                + "&metalRateTaxAmt=" + encodeURIComponent(document.getElementById("metalRateTaxAmt").value)
                + "&metratemkgchrgs=" + encodeURIComponent(document.getElementById("metratemkgchrgs").value)
                + "&mkgchrgPerWtType=" + encodeURIComponent(document.getElementById("mkgchrgPerWtType").value)
                + "&metratepurity=" + encodeURIComponent(document.getElementById("metratepurity").value)
                + "&metalColor=" + encodeURIComponent(document.getElementById("metalColor").value)  //LINE ADDED TO GET METAL COLOR,@AUTHOR:HEMA-3AUG2020
                + "&modifiedRates=" + encodeURIComponent(document.getElementById("modifiedRates").value)
                + "&convertweightin1gm=" + encodeURIComponent(document.getElementById("convertweightin1gm").value)
                + "&1gmmetalRate=" + encodeURIComponent(document.getElementById("1gmmetalRate").value);
        add_metal_rate('include/php/ommradmr' + default_theme + '.php', poststr);
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addMetalRateButDiv").style.visibility = "visible";
    }
}
/*****************End code to add ids @Author:PRIYA02DEC14******************/
/****************End code to add ids @Author:PRIYA10NOV14****************/
/*  End of modification  to pass goldid and customer percentage @AUTHOR: SANDY25JUL13 */
/********************** Add New Girvi Code *****************************************************************/
/***************Start code to add fields @Author:PRIYA19MAR14*****************/
/************Start code to add validation of accounts @Author:SHRI04JUL15**********************/
function validateAddUdhaarInputs(obj) {

    if (validateEmptyField(document.getElementById("udhaarMainAmount").value, "Please enter Udhaar Amount!") == false ||
            validateNumWithDot(document.getElementById("udhaarMainAmount").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("udhaarMainAmount").focus();
        return false;
    }else if (document.getElementById("udhaarMainAmount").value == '0') {
        alert('Please enter valid Udhaar Amount!');
        document.getElementById("udhaarMainAmount").focus();
        return false;
    } else if (validateSelectField(document.getElementById("udhharFirmId").value, "Please select Firm!") == false) {
        document.getElementById("udhharFirmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBDay").value, "Please select Udhaar Date!") == false) {
        document.getElementById("DOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Udhaar Date!") == false) {
        document.getElementById("DOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select Udhaar Date!") == false) {
        document.getElementById("DOBYear").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("udhaarSerialNo").value, "Please enter Serial Number!") == false ||
            validateNum(document.getElementById("udhaarSerialNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("udhaarSerialNo").focus();
        return false;
    } else if (validateSelectField(document.getElementById("udhaarPayAccId").value, "Please select Payment Account!") == false) {
        document.getElementById("udhaarPayAccId").focus();
        return false;
    } else if (document.getElementById('udhaarIntrestCheck').checked) {
        if (validateEmptyField(document.getElementById("selROIValue").value, "Please enter ROI value!") == false) {
            document.getElementById("selROIValue").focus();
            return false;
        } else if (validateSelectField(document.getElementById("udhaInterestType").value, "Please select interest type!") == false) {
            document.getElementById("udhaInterestType").focus();
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
//    else if (validateSelectField(document.getElementById("udhaarDrAccId").value, "Please select Dr Account!") == false) {
//        document.getElementById("udhaarDrAccId").focus();
//        return false;
//    }
//    else if (document.getElementById("udhaarType").value == "OnPurchase") {
//
//        if (validateSelectField(document.getElementById("itemType").value, "Please select Metal Type!") == false) {
//            document.getElementById("itemType").focus();
    //            return false;
    //        }
    //        else if (validateSelectField(document.getElementById("itemName").value, "Please select Item Name!") == false) {
    //            document.getElementById("itemName").focus();
    //            return false;
//        }
//    }     return true;
}
/************End code to add validation of accounts @Author:SHRI04JUL15**********************/
function add_udhaar_details(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddNewUdhaarDetails;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertAddNewUdhaarDetails() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("addUdhaarSubButDiv").style.visibility = "visible";
        document.getElementById("addUdhaarSubButDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
    }

}
function addNewUdhaarDetails(obj) {

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addUdhaarSubButDiv").style.visibility = "visible";
    if (validateAddUdhaarInputs(obj)) {
        /*********Start code to add panel @Author:PRIYA04APR14***********************/
        if (document.getElementById("panelName").value == 'UpdateUdhaar') {
            //            if (document.getElementById("udhaarItemDivCounter").value != '') {
            //                document.getElementById("noOfUdhaarItems").value = document.getElementById("udhaarItemDivCounter").value;
//            } else {
//                document.getElementById("noOfUdhaarItems").value = getUdhaarItemDiv;
//            }
        } else {
            document.getElementById("noOfUdhaarItems").value = getUdhaarItemDiv;
        }
        /*********End code to add panel @Author:PRIYA04APR14***********************/
        return true;
//        itemNames = "";
//        if (document.getElementById("udhaarType").value == "OnPurchase") {
//            itemLength = document.add_udhaar_details.itemName.length;
//            itemCounter = 0;
//            for (i = 0; i < itemLength; i++) {
//                if (document.add_udhaar_details.itemName[i].selected == true && itemCounter % 2 == 0) {
//                    itemNames += document.add_udhaar_details.itemName[i].value + ", ";
//                    itemCounter++;
//                }
//                else if (document.add_udhaar_details.itemName[i].selected == true && itemCounter % 2 != 0) {
//                    itemNames += "<font color=blue>" + document.add_udhaar_details.itemName[i].value + "</font>" + ", ";
//                    itemCounter++;
//                }
//            }
//            itemNames = itemNames.slice(0, -2);
//        }
//
//        var poststr = "udhaarMainAmount=" + encodeURIComponent(document.getElementById("udhaarMainAmount").value)
//                + "&custId=" + encodeURIComponent(document.getElementById("custId").value)
//                + "&DOBDay=" + encodeURIComponent(document.getElementById("DOBDay").value)
//                + "&DOBMonth=" + encodeURIComponent(document.getElementById("DOBMonth").value)
//                + "&DOBYear=" + encodeURIComponent(document.getElementById("DOBYear").value)
//                + "&udhaarType=" + encodeURIComponent(document.getElementById("udhaarType").value)
        //                + "&udhaarOtherInfo=" + encodeURIComponent(document.getElementById("udhaarOtherInfo").value); //        if (document.getElementById("udhaarType").value == "OnPurchase") {
//            poststr += "&itemName=" + encodeURIComponent(itemNames)
//                    + "&itemType=" + encodeURIComponent(document.getElementById("itemType").value);
//        }
//
//        add_udhaar_details('include/php/omuadetl' + default_theme +'.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addUdhaarSubButDiv").style.visibility = "visible";
    }
    return false;
} /***************End code to add fields @Author:PRIYA19MAR14*****************/
/********************** Add Opening Bal Code *****************************************************************/
function validateAddDDOpeningBalInputs(openingBalAmt) {

    if (validateEmptyField(openingBalAmt, "Please enter Opening Balance Amount!") == false ||
            validateNumWithDot(openingBalAmt, "Accept only numeric values!") == false) {
        document.getElementById("openingBalAmount").focus();
        return false;
    }
    if (openingBalAmt == "0.00") {
        alert("Please enter Opening Balance Amount!");
        document.getElementById("openingBalAmount").focus();
        return false;
    }
    return true;
}
function add_dd_opening_bal(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertDDOpeningBal;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertDDOpeningBal() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadAddDDOpeningBal").style.visibility = "hidden";
        document.getElementById("addDDOpeningBalSubButt").style.visibility = "visible";
        document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadAddDDOpeningBal").style.visibility = "visible";
        document.getElementById("addDDOpeningBalSubButt").style.visibility = "hidden";
    }

}
function addDDOpeningBal(ddOpeningBalAmt, dailyDiaryDayDD, dailyDiaryMonth, dailyDiaryYYYY) {
    document.getElementById("ajaxLoadAddDDOpeningBal").style.visibility = "visible";
    document.getElementById("addDDOpeningBalSubButt").style.visibility = "hidden";
    if (validateAddDDOpeningBalInputs(ddOpeningBalAmt)) {
        var poststr = "openingBal=" + encodeURIComponent(ddOpeningBalAmt)
                + "&dailyDiaryDayDD=" + encodeURIComponent(dailyDiaryDayDD)
                + "&dailyDiaryMonth=" + encodeURIComponent(dailyDiaryMonth)
                + "&dailyDiaryYYYY=" + encodeURIComponent(dailyDiaryYYYY);
        add_dd_opening_bal('include/php/omddadob' + default_theme + '.php', poststr);
    } else {
        document.getElementById("ajaxLoadAddDDOpeningBal").style.visibility = "hidden";
        document.getElementById("addDDOpeningBalSubButt").style.visibility = "visible";
    }
}
/********************** Add New Transaction Code *****************************************************************/
/***********************Start of Change in function @AUTHOR: SANDY27JAN14***********************/
function validateAddTransactionInputs(obj) {

    if (validateSelectField(document.getElementById("DOBDay").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBYear").focus();
        return false;
    }
    /*else if (validateEmptyField(document.getElementById("transPreVoucherNo").value, "Please enter Pre Voucher Id!") == false ||
     validateAlpha(document.getElementById("transPreVoucherNo").value, "Accept only alpha characters!") == false) {
     document.getElementById("transPreVoucherNo").focus();
     return false;
     }COMMENT BY @AUTHOR: SANDY27JAN14*/
    else if (validateEmptyField(document.getElementById("transPostVoucherNo").value, "Please enter Post Voucher Number!") == false ||
            validateNum(document.getElementById("transPostVoucherNo").value, "Accept only number without space!") == false) {
        document.getElementById("transPostVoucherNo").focus();
        return false;
    } else if (validateSelectField(document.getElementById("transFirmId").value, "Please select Transaction Firm!") == false) {
        document.getElementById("transFirmId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("transAmt").value, "Please enter Transaction Amount!") == false ||
            validateNumWithDot(document.getElementById("transAmt").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("transAmt").focus();
        return false;
    } else if (validateSelectField(document.getElementById("transFromAcc").value, "Please select Transaction From Account!") == false) {
        document.getElementById("transFromAcc").focus();
        return false;
    } else if (validateSelectField(document.getElementById("transToAcc").value, "Please select Transaction To Account!") == false) {
        document.getElementById("transToAcc").focus();
        return false;
    }
    /******Start code to remove alpha validation @Author:PRIYA17MAY14****************/
    else if (validateEmptyField(document.getElementById("transSub").value, "Please enter Transaction Subject!") == false) {
        document.getElementById("transSub").focus();
        return false;
    }
    /******End code to remove alpha validation @Author:PRIYA17MAY14****************/
    else if (validateSelectField(document.getElementById("transactionCategory").value, "Please select Transaction Category!") == false) {
        document.getElementById("transactionCategory").focus();
        return false;
    }
    return true;
}
/***********************End of Change in function @AUTHOR: SANDY27JAN14***********************/
function add_transaction(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddTransaction;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertAddTransaction() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("transSubButt").style.visibility = "visible";
        document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("transSubButt").style.visibility = "hidden";
    }
}
function addTransaction(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("transSubButt").style.visibility = "hidden";
    if (validateAddTransactionInputs(obj)) {

        var poststr = "DOBDay=" + encodeURIComponent(document.getElementById("DOBDay").value)
                + "&DOBMonth=" + encodeURIComponent(document.getElementById("DOBMonth").value)
                + "&DOBYear=" + encodeURIComponent(document.getElementById("DOBYear").value)
                + "&transPreVoucherNo=" + encodeURIComponent(document.getElementById("transPreVoucherNo").value)
                + "&transPostVoucherNo=" + encodeURIComponent(document.getElementById("transPostVoucherNo").value)
                + "&transFirmId=" + encodeURIComponent(document.getElementById("transFirmId").value)
                + "&transCustId=" + encodeURIComponent(document.getElementById("user_id").value)
                + "&transAmt=" + encodeURIComponent(document.getElementById("transAmt").value)
                + "&transFromAcc=" + encodeURIComponent(document.getElementById("transFromAcc").value)
                + "&transToAcc=" + encodeURIComponent(document.getElementById("transToAcc").value)
                + "&transSub=" + encodeURIComponent(document.getElementById("transSub").value)
                + "&transactionCategory=" + encodeURIComponent(document.getElementById("transactionCategory").value);
//+ "&transactionDesc=" + encodeURIComponent(document.getElementById("transactionDesc").value);comment BY @AUTHOR: SANDY02JAN14
        //alert(poststr);
        add_transaction('include/php/omtatrns' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("transSubButt").style.visibility = "visible";
    }
}
//*********** Transfer Girvi ************************
/*******Start to change function @AUTHOR: SANDY13JAN14*************************/ /*******Start to add code to allow user to select only one option of transfer @AUTHOR: SANDY29NOV13*************/
function validateTransferGirviInputs(obj) {

    if (validateEmptyField(document.getElementById("principalAmount").value, "Please enter Principal Amount!") == false ||
            validateNum(document.getElementById("principalAmount").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("principalAmount").focus();
        return false;
    } else if (validateSelectField(document.getElementById("interestTGType").value, "Please select Interest Type!") == false) {
        document.getElementById("interestTGType").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBDay").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select Girvi Date!") == false) {
        document.getElementById("DOBYear").focus();
        return false;
    }
//to add code to allow user to select only one option of transfer @AUTHOR: SANDY29NOV13
    else if (document.getElementById("girviFirmId").value == "NotSelected" || document.getElementById("girviFirmId").value == null || document.getElementById("girviFirmId").value == "") {
        if (validateEmptyField(document.getElementById("mlId").value, "Please select Girvi Transfer Firm Name or  Ml Loan !") == false) {
            document.getElementById("girviFirmId").focus(); //focus added @Author:PRIYA09DEC14
            return false;
        }
    } else if (document.getElementById("mlId").value == "" || document.getElementById("mlId").value == null) {
        if (validateSelectField(document.getElementById("girviFirmId").value, "Please select Girvi Transfer Firm Name or Ml Loan !") == false) {
            document.getElementById("mlId").focus(); //focus added @Author:PRIYA09DEC14
            return false;
        }
    } else if (validateSelectField(document.getElementById("girviFirmId").value, "Please select Girvi Transfer Firm Name or  Ml Loan !") == true) {
        if (validateEmptyField(document.getElementById("mlId").value, "Please select Girvi Transfer Firm Name  or Ml Loan !") == true) {
            alert('Please either select transfer firm or Moneylender!'); //alert changed @Author:PRIYA15DEC14
            return false;
        }
    }
//to add code to allow user to select only one option of transfer @AUTHOR: SANDY29NOV13
    else if (validateEmptyField(document.getElementById("girviTransSerialNo").value, "Please enter Serial Number!") == false ||
            validateNum(document.getElementById("girviTransSerialNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("girviTransSerialNo").focus();
        return false;
    }
    return true;
}
/*******End to change function @AUTHOR: SANDY13JAN14*************************/
/*******Start to add code to allow user to select only one option of transfer @AUTHOR: SANDY29NOV13*************/
function transfer_girvi(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertTransferGirvi;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//Start Code To Change Funtion refreshTransGirvi @Author:PRIYA29JUN13
/********Start to change function  @AUTHOR: SANDY29NOV13****/
function alertTransferGirvi() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
        /*var xmlhttpStr = xmlhttp.responseText;
         var girviId = parseInt(xmlhttpStr);
         xmlhttpStr = xmlhttpStr.slice(xmlhttpStr.indexOf("@") + 1);
         var girviTransId = parseInt(xmlhttpStr);
         xmlhttpStr = xmlhttpStr.slice(xmlhttpStr.indexOf("@") + 1);comment by @AUTHOR: SANDY29NOV13*/
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText; //CHANGE IN DIV @AUTHOR: SANDY29NOV13
//refreshTransGirvi(girviId, girviTransId);
    } else {
        document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "visible";
        document.getElementById("transferGirviButton").style.visibility = "hidden";
    }
}
/********End to change function  @AUTHOR: SANDY29NOV13****/
//End Code To Change Funtion refreshTransGirvi @Author:PRIYA29JUN13
/***********Start code to change var name @Author:PRIYA14SEP13*************/
/**********START TO CHANGE FUNCTION  @AUTHOR: SANDY06JAN14 *****/
/**********START TO CHANGE FUNCTION  @AUTHOR: SANDY29NOV13 *****/
/**********START TO CHANGE FUNCTION  @AUTHOR: SANDY30NOV13 *****/
/**********Start code to add acc id @Author:PRIYA22MAY14**************/
/**********Start code to add accounts @Author:PRIYA23MAY14**************************/
/**********Start code to add field @Author:PRIYA29OCT14*****/
function transferGirvi(documentRootPath, obj, nepalidate = '', nepaliIndicator = '') {
    document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "visible";
    document.getElementById("transferGirviButton").style.visibility = "hidden";
    var girviDateStr = document.transfer_girvi.DOBMonth.value + ' ' + document.transfer_girvi.DOBDay.value + ', ' + document.transfer_girvi.DOBYear.value;
    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date
    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    if (typeof (document.getElementById('nepaliDateIndicator')) != 'undefined' &&
            (document.getElementById('nepaliDateIndicator') != null)) {
        var nepaliDateIndicator = document.getElementById("nepaliDateIndicator").value;
    } else {
        var nepaliDateIndicator = '';
    }
    if (nepaliIndicator == 'YES') {
        var datesDiff = nepalidate - milliGirviDate;
    } else {
        var datesDiff = milliTodayDate - milliGirviDate;
    }
    if (datesDiff < 0) {
        alert('Please Select the correct Girvi Date!');
        document.getElementById("DOBDay").focus();
        document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
        document.getElementById("transferGirviButton").style.visibility = "visible";
    } else {
        if (validateTransferGirviInputs(obj)) {
            /*********Start code to comment form @Author:PRIYA12SEP13**************/
            //            for (i=0;i<document.transfer_girvi.selTROI.length;i++){
            //                if (document.transfer_girvi.selTROI[i].checked==true) //                    addROI=document.transfer_girvi.selTROI[i].value;
//            }   
            /*********End code to comment form @Author:PRIYA12SEP13**************/
            var poststr = "principalAmount=" + encodeURIComponent(document.getElementById("principalAmount").value)
                    + "&custId=" + encodeURIComponent(document.getElementById("custId").value)
                    + "&girviId=" + encodeURIComponent(document.getElementById("girviId").value)
                    + "&interestType=" + encodeURIComponent(document.getElementById("interestTGType").value)
                    + "&selTROI=" + encodeURIComponent(document.getElementById("selTROI").value)
                    + "&DOBDay=" + encodeURIComponent(document.transfer_girvi.DOBDay.value)
                    + "&DOBMonth=" + encodeURIComponent(document.transfer_girvi.DOBMonth.value)
                    + "&DOBYear=" + encodeURIComponent(document.transfer_girvi.DOBYear.value)
                    + "&girviFirmId=" + encodeURIComponent(document.getElementById("girviFirmId").value)
                    + "&girviExistFirmId=" + encodeURIComponent(document.getElementById("girviExistFirmId").value) + "&girviTransPreSerialNo=" + encodeURIComponent(document.getElementById("girviTransPreSerialNo").value)
                    + "&girviTransSerialNo=" + encodeURIComponent(document.getElementById("girviTransSerialNo").value)
                    + "&loanLenderId=" + encodeURIComponent(document.getElementById("mlId").value)//change in line @AUTHOR: SANDY13JAN14
                    + "&mlMainId=" + encodeURIComponent(document.getElementById("mlMainId").value)//add line @AUTHOR: SANDY14JAN14
                    + "&girviTransTokenNo=" + encodeURIComponent(document.getElementById("girviTransTokenNo").value)
                    + "&girviTransMlLoanNo=" + encodeURIComponent(document.getElementById('mlLoanNo').value)//to pass ml loan number field value @AUTHOR: SANDY29NOV13
                    + "&trGirviPaySelAccountId=" + encodeURIComponent(document.getElementById('trGirviPaySelAccountId').value)
                    + "&trGirviPaymentOtherInfo=" + encodeURIComponent(document.getElementById('trGirviPaymentOtherInfo').value)
                    + "&girviTransOtherInfo=" + encodeURIComponent(document.getElementById("girviTransOtherInfo").value)
                    + "&prinType=" + encodeURIComponent(document.getElementById("prinType").value)
                    + "&girviTransCrAccId=" + encodeURIComponent(document.getElementById("girviTransCrAccId").value)
                    + "&selTransferFirstMonthInt=" + encodeURIComponent(document.getElementById("selTransferFirstMonthInt").checked)
                    + "&girviTransPacketNo=" + encodeURIComponent(document.getElementById("girviTransPacketNo").value); //add line Packet No @Author:ANUJA30JUL15;
            transfer_girvi(documentRootPath + '/include/php/olgggvts' + default_theme + '.php', poststr);
        }//change in filename @AUTHOR: SANDY20NOV13

    }
    document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
    document.getElementById("transferGirviButton").style.visibility = "visible";
}
/**********End code to add field @Author:PRIYA29OCT14*****/
/**********End code to add accounts @Author:PRIYA23MAY14**************************/
/**********End code to add acc id @Author:PRIYA22MAY14**************/
/**********END TO CHANGE FUNCTION  @AUTHOR: SANDY30NOV13 *****/
/**********END TO CHANGE FUNCTION  @AUTHOR: SANDY29NOV13 *****/
/**********END TO CHANGE FUNCTION  @AUTHOR: SANDY06JAN14 *****/
/***********End code to change var name @Author:PRIYA14SEP13*************/
/*START CODE PRIYA02 */
/*START CODE PRIYA15 */
/***************** Add New Supplier Code ***********************/
function validateAddSupplierInputs(obj) {
    if (validateSelectField(document.getElementById("supplierType").value, "Please select Supplier Type!") == false) {
        document.getElementById("supplierType").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("suppIdNum").value, "Please select Supplier ID!") == false ||
            validateAlphaNum(document.getElementById("suppIdNum").value, "Accept only alphanumeric characters!") == false) {
        document.getElementById("suppIdNum").focus();
        return false;
    }
    /***********Start Code To Change position @Author:PRIYA24AUG13************/
    else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Name!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("accMainAccountId").value, "Please select Supplier Account!") == false) {            //PRIYA27
        document.getElementById("accMainAccountId").focus();
        return false;
    }
    /***********End Code To Change position @Author:PRIYA24AUG13************/ //START CODE TO REMOVE Supp Shop Name Validations @AUTHOR:PRIYA19FEB13
    /* }
     else if (document.getElementById("suppShopName").value != "" && validateAlphaNum(document.getElementById("suppShopName").value,"Accept only alphanumeric characters!!") == false) {
     document.getElementById("suppShopName").focus();
     return false;*/
    //END CODE TO REMOVE Supp Shop Name Validations @AUTHOR:PRIYA19FEB13
    else if (validateEmptyField(document.getElementById("suppShopName").value, "Please enter Shop Name!") == false) {
        document.getElementById("suppShopName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("firstName").value, "Please enter Supplier First Name!") == false) {
        document.getElementById("firstName").focus();
        return false;
    }
//    else if (validateEmptyField(document.getElementById("fatherOrSpouseName").value
//            ) == false) {
    //        document.getElementById("fatherOrSpouseName").focus();
//        return false;
//    } 
    else if (validateSelectField(document.getElementById("city").value, "Please select City Name!") == false) {
        document.getElementById("city").focus();
        return false;
    } else if ((document.getElementById("pinCode").value != '') && ((validateNum(document.getElementById("pinCode").value, "Accept only Numbers without space character!") == false ||
            validateLength6(document.getElementById("pinCode").value, "Pin Code length should be minimum 06!") == false))) {
        document.getElementById("pinCode").focus();
        return false;
    } else if (validateSelectField(document.getElementById("state").value, "Please select State Name!") == false) {
        document.getElementById("state").focus();
        return false;
    } else if (validateSelectField(document.getElementById("country").value, "Please select Country Name!") == false) {
        document.getElementById("country").focus();
        return false;
    } else if (document.getElementById("phoneNo").value != "" && validateNumWithSpace(document.getElementById("phoneNo").value, "Accept only Numbers!") == false) {
        document.getElementById("phoneNo").focus();
        return false;
    } else if ((document.getElementById("suppMobileNo").value != '') && ((validateNum(document.getElementById("suppMobileNo").value, "Accept only Numbers without space character!") == false ||
            validateLength10(document.getElementById("suppMobileNo").value, "Mobile number length should be minimum 10!") == false))) {
        document.getElementById("suppMobileNo").focus();
        return false;
//    } else if (document.getElementById("cashBalance").value != "" && validateNumWithDot(document.getElementById("cashBalance").value, "Accept only Numbers!") == false) {
//        document.getElementById("cashBalance").focus();
//        return false;
        //    } else if (document.getElementById("suppGoldWeightBal").value != "" && validateNumWithDot(document.getElementById("suppGoldWeightBal").value, "Accept only Numbers!") == false) {
        //        document.getElementById("suppGoldWeightBal").focus();
        //        return false;
        //    } else if (document.getElementById("suppSilverWeightBal").value != "" && validateNumWithDot(document.getElementById("suppSilverWeightBal").value, "Accept only Numbers!") == false) {
        //        document.getElementById("suppSilverWeightBal").focus();
//        return false;
    }
    if (typeof (document.getElementById('mlId')) != 'undefined' &&
            (document.getElementById('mlId') != null)) {
        var mlId = document.getElementById("mlId").value;
    } else {
        var mlId = '';
    }
    //
    if (document.getElementById("suppMobileNo").value != '') {
        result = checkvalue(document.getElementById("suppMobileNo").value, '', '', mlId);
        if (result != 'success') {
            alert("Duplicate Mobile No ! Please Enter Different Mobile No !");
            return false;
        }
    }
    //
    if (document.getElementById("suppEmailId").value != '') {
         result = checkvalue('',document.getElementById("suppEmailId").value, '', '', '','','checkemail');
        if (result != 'success') {
            alert("Duplicate Email Id ! Please Enter Different Email Id !");
            return false;
        }
    }
    //
    if (typeof (document.getElementById('suppLoginId')) != 'undefined' &&
            (document.getElementById('suppLoginId') != null)) {
        if (document.getElementById("suppLoginId").value != '') {
            result = checkvalue('', '', document.getElementById("suppLoginId").value, mlId);
            if (result != 'success') {
                alert("Duplicate Login Id ! Please Enter Different Login Id !");
                return false;
            }
        }
    } else {
        if (document.getElementById("custLoginId").value != '') {
            result = checkvalue('', '', document.getElementById("custLoginId").value, mlId);
            if (result != 'success') {
                alert("Duplicate Login Id ! Please Enter Different Login Id !");
                return false;
            }
        }
    }
    //alert(supplierType,suppIdNum,accountId,firmId,suppShopName,firstName,lastName,fatherOrSpouseName,city,pinCode,state,country,phoneNo,suppMobileNo,cashBalance,suppGoldWeightBal,suppSilverWeightBal);
    return true;
} /*END CODE PRIYA15 */
function addNewSupplier(obj) {

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addSuppSubButDiv").style.visibility = "hidden";
    if (validateAddSupplierInputs(obj)) {
        if (uploadImage(document.getElementById("selectPhoto").value) == false) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addSuppSubButDiv").style.visibility = "visible";
            return false;
        }
        return true;
    } else
    {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addSuppSubButDiv").style.visibility = "visible";
        return false;
    }
}
/*END CODE PRIYA02 */

/*START CODE PRIYA02 */
/***************** Add New Staff Code ***********************/
/*******Start Code To Add Validation For Staff Login Id @AUTHOR:PRIYA22APR13*********/

function validateAddStaffInputs(obj) {

    if (validateSelectField(document.getElementById("StaffCategory").value, "Please select Staff Category!") == false) { //@Maruti 
        document.getElementById("StaffCategory").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("StaffIdNum").value, "Please select Staff ID!") == false || validateAlphaNum(document.getElementById("StaffIdNum").value, "Accept only alphanumeric characters!") == false) {   //PRIYA15
        document.getElementById("StaffIdNum").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Name!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("accountId").value, "Please select Staff Account!") == false) {          //PRIYA27
        document.getElementById("accountId").focus();
        return false;
    }
    //    else if (validateEmptyField(document.getElementById("staffLoginId").value, "Please select Staff Login ID!") == false ||
//            validateAlphaNum(document.getElementById("staffLoginId").value, "Accept only alphanumeric characters!") == false) {   //PRIYA15
//        document.getElementById("staffLoginId").focus();
//        return false;
//    }
    /**********************Start Code To Add Password Field @AUTHOR:PRIYA06JUNE13********************/
    /**********************Start Code To Change Id @Author:PRIYA22JUL13********************/
    //    else if (validateEmptyField(document.getElementById("userPassword").value, "Please Enter  Password!") == false ||
//            validateLength8(((document.getElementById("userPassword").value)), "Password should be minimum 8 and maximum 16 characters length!") == false) {
    //        document.getElementById("userPassword").focus();
    //        return false;
//    }
    /*else if (validateEmptyField(document.getElementById("staffPassword").value,"Please enter Password!") == false ||
     validatePassword(((document.getElementById("staffPassword").value.length < 8) && (document.getElementById("staffPassword").value.length > 16)),"Password should be minimum 8 and maximum 16 characters length!") == false) {
     document.getElementById("staffPassword").focus();
     return false;
     }*/
    /**********************End Code To Change Id @Author:PRIYA22JUL13********************/
    /**********************End Code To Add Password Field @AUTHOR:PRIYA06JUNE13********************/
    /**********************Start Code To Add Intelig Password Field @Author:PRIYA22JUL13********************/
    //    else if (validateEmptyField(document.getElementById("staffMasterPassword").value, "Please Enter Master Password!") == false ||
    //            validateLength8(((document.getElementById("staffMasterPassword").value)), "Password should be minimum 8 and maximum 16 characters length!") == false) {
//        document.getElementById("staffMasterPassword").focus();
//        return false;
    //    }
    /**********************End Code To Add Intelig Password Field @Author:PRIYA22JUL13********************/
    else if (validateEmptyField(document.getElementById("firstName").value, "Please enter First Name!") == false) {
        document.getElementById("firstName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("lastName").value, "Please enter Last Name!") == false ||
            validateAlphaWithSpace(document.getElementById("lastName").value, "Accept only alpha characters!") == false) {
        document.getElementById("lastName").focus();
        return false;
    } else if (document.getElementById("staffPanNO").value != "" && validateAlphaNum(document.getElementById("staffPanNO").value, "Accept only alphanumeric characters!!") == false) {
        document.getElementById("staffPanNO").focus(); //PRIYA15
        return false;
    }  else if (validateSelectField(document.getElementById("city").value, "Please select City Name!") == false) {
//        code updated by @pratiksha
        document.getElementById("city").focus();
        return false;

    } else if ((document.getElementById("pinCode").value != '') && ((validateNum(document.getElementById("pinCode").value, "Accept only Numbers without space character!") == false ||
            validateLength6(document.getElementById("pinCode").value, "Pin Code length should be minimum 06!") == false))) {
        document.getElementById("pinCode").focus(); //PRIYA15         return false;
    } else if (validateSelectField(document.getElementById("state").value, "Please select State Name!") == false) {
        document.getElementById("state").focus();
        return false;
    } else if (validateSelectField(document.getElementById("country").value, "Please select Country Name!") == false) {
        document.getElementById("country").focus();
        return false;
    } else if (document.getElementById("phoneNo").value != "" && validateNumWithSpace(document.getElementById("phoneNo").value, "Accept only Numbers!") == false) {
        document.getElementById("phoneNo").focus();
        return false;
    } else if ((document.getElementById("StaffmobileNo").value != '') && ((validateNum(document.getElementById("StaffmobileNo").value, "Accept only Numbers without space character!") == false ||
            validateLength10(document.getElementById("StaffmobileNo").value, "Mobile number length should be minimum 10!rrrrrrrrrrr") == false))) {
        document.getElementById("StaffmobileNo").focus();
        return false;
        //    } else if (document.getElementById("staffCashBalance").value != "" && validateNumWithDot(document.getElementById("staffCashBalance").value, "Accept only Numbers!") == false) {
        //        document.getElementById("staffCashBalance").focus();
//        return false;
    }     //
    if (document.getElementById("StaffmobileNo").value != '') {
        result = checkvalue(document.getElementById("StaffmobileNo").value, '', '', '');
        if (result != 'success') {
            alert("Duplicate Mobile No ! Please Enter Different Mobile No !");
            return false;
        }
    }     //
    if (document.getElementById("staffEmailId").value != '') {
        result = checkvalue('',document.getElementById("staffEmailId").value, '', '', '','','checkemail');
        if (result != 'success') {
            alert("Duplicate Email Id ! Please Enter Different Email Id !");
            return false;
        }
    }
    //
    if (document.getElementById("staffLoginId").value != '') {
        result = checkvalue('', '', document.getElementById("staffLoginId").value, '');
        if (result != 'success') {
            alert("Duplicate Login Id ! Please Enter Different Login Id !");
            return false;
        }
    }
    return true;
}
/*******End Code To Add Validation For Staff Login Id @AUTHOR:PRIYA22APR13*********/
function addNewStaff(obj) {

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addStaffSubButDiv").style.visibility = "hidden";
    if (validateAddStaffInputs(obj)) {
        if (uploadImage(document.getElementById("selectPhoto").value) == false) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStaffSubButDiv").style.visibility = "visible";
            return false;
        }
        return true;
    } else
    {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addStaffSubButDiv").style.visibility = "visible";
        return false;
    }
} /*START CODE TO Remove Validation of Crystal fields @AUTHOR:PRIYA11JAN13*/ /**********Start Code To Add Validations In New Order Panel @AUTHOR:PRIYA11MAY13*********/
/**********Start Code To Add Validations In For Crystal @Author:PRIYA16SEP13*********/
/*******************Start code to change function name @Author:PRIYA20JAN14***********/
/**************Start code to remove validn @Author:PRIYA16JUL14********/
var getCrystalDiv = 1;
var crystalEntered = 0;
function valAddNewOrderInputs() {
    if (validateSelectField(document.getElementById("nwOrBillDOBDay").value, "Please select Bill Day!") == false) {
        document.getElementById("nwOrBillDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("nwOrBillDOBMonth").value, "Please select Bill Month!") == false) {
        document.getElementById("nwOrBillDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("nwOrBillDOBYear").value, "Please select Bill Year!") == false) {
        document.getElementById("nwOrBillDOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("nwOrDelvrDOBDay").value, "Please select Delievery Day!") == false) {
        document.getElementById("nwOrDelvrDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("nwOrDelvrDOBMonth").value, "Please select Delievery Month!") == false) {
        document.getElementById("nwOrDelvrDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("nwOrDelvrDOBYear").value, "Please select Delievery Year!") == false) {
        document.getElementById("nwOrDelvrDOBYear").focus();
        return false;
    }
    //Start comment code for hide option supplier name compulsory:Author:SANT05DEC16
    //    else if (validateEmptyField(document.getElementById("addItemSuppName").value, "Please choose Correct Supplier Name!") == false) {
    //        document.getElementById("addItemSuppName").focus(); //Supplier Field added @AUTHOR: PRIYA06JAN13 //Supplier Id changed @Author: PRIYA16SEP13
    //        return false;
//    } 
    //End comment code for hide option supplier name compulsory:Author:SANT05DEC16
    else if (validateEmptyField(document.getElementById("nwOrInvoiceNo").value, "Please select Invoice No!") == false ||
            validateNum(document.getElementById("nwOrInvoiceNo").value, "Accept only alphanumeric characters!") == false) {   //PRIYA15
        document.getElementById("nwOrInvoiceNo").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Name!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("accountId").value, "Please select Account Name!") == false) {
        document.getElementById("accountId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("nwOrItemPostId").value, "Please enter Item Id!") == false ||
            validateNum(document.getElementById("nwOrItemPostId").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("nwOrItemPostId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addStockItemName").value, "Please enter Item Name!") == false) {
        document.getElementById("addStockItemName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addStockItemCategory").value, "Please enter Item Category!") == false) {
        document.getElementById("addStockItemCategory").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("nwOrItemQuantity").value, "Please enter Item Quantity!") == false ||
            validateNum(document.getElementById("nwOrItemQuantity").value, "Accept only Number!") == false) {
        document.getElementById("nwOrItemQuantity").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("nwOrItemGrossWeight").value, "Please select Item Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("nwOrItemGrossWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("nwOrItemGrossWeight").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("nwOrItemNetWeight").value, "Please select Item Net Weight!") == false ||
            validateNumWithDot(document.getElementById("nwOrItemNetWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("nwOrItemNetWeight").focus();
        return false;
        //    } else if (validateSelectField(document.getElementById("nwOrItemPurity").value, "Please select Item Tunch!") == false) {
        //        document.getElementById("nwOrItemPurity").focus();
        //        return false;  //Validation added for Tunch @AUTHOR:PRIYA18JAN13
        //    }
    } else if (validateEmptyField(document.getElementById("nwOrItemValuation").value, "Please enter Item Valuation!") == false ||
            validateNumWithDot(document.getElementById("nwOrItemValuation").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("nwOrItemValuation").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("nwOrItemFinalValuation").value, "Please enter Item Final Valuation!") == false ||
            validateNumWithDot(document.getElementById("nwOrItemFinalValuation").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("nwOrItemFinalValuation").focus();
        return false;
    }
    //    else {
    //        crystalEntered = 0;
    //        for (var dc = 1; dc <= getCrystalDiv; dc++) {
    //            //            if(document.getElementById("nwOrCryId" + dc).value != ""){
    //            if ((document.getElementById('del' + dc).value != 'Deleted')) {
    //                if (validateEmptyField(document.getElementById("nwOrCryId" + dc).value, "Please select Crystal Id" + dc + "!") == false) {
    //                    document.getElementById("nwOrCryId" + dc).focus();
    //                    return false;
    //                }
    //                else if (validateEmptyField(document.getElementById("nwOrCryName" + dc).value, "Please select Crystal Name" + dc + "!") == false) {
    //                    document.getElementById("nwOrCryName" + dc).focus();
    //                    return false;
    //                } else if (validateEmptyField(document.getElementById("nwOrCryQty" + dc).value, "Please select Crystal Qty" + dc + "!") == false) {
    //                    document.getElementById("nwOrCryQty" + dc).focus();
    //                    return false;
    //                } else if (validateEmptyField(document.getElementById("nwOrCryGSW" + dc).value, "Please select Crystal Gross Weight" + dc + "!") == false) {
    //                    document.getElementById("nwOrCryGSW" + dc).focus();
    //                    return false;
    //                } else if (validateEmptyField(document.getElementById("nwOrCryRate" + dc).value, "Please select Crystal Rate!" + dc + "!") == false) {
    //                    document.getElementById("nwOrCryRate" + dc).focus();
    //                    return false;
    //                }
    //                else if (validateEmptyField(document.getElementById("nwOrCryVal" + dc).value, "Please select Crystal Valuation!" + dc + "!") == false) {
    //                    document.getElementById("nwOrCryVal" + dc).focus();
    //                    return false;
//                } else if (validateEmptyField(document.getElementById("nwOrCryFinalVal" + dc).value, "Please Select Crystal Final Valuation!" + dc + "!") == false) {
//                    document.getElementById("nwOrCryFinalVal" + dc).focus();
//                    return false;
    //                }
    //            }
//            crystalEntered++;
    //        //}
    //        }
//    }
    return true;
}
/**************End code to remove validn @Author:PRIYA16JUL14********/
/**********End Code To Add Validations In For Crystal @Author:PRIYA20JAN14*********/
/**********End Code To Add Validations In New Order Panel @AUTHOR:PRIYA11MAY13*********/
/*END CODE TO Remove Validation of Crystal fields @AUTHOR:PRIYA11JAN13*/
/*********Start code to change id @Author:PRIYA06FEB14*******************/
function addNewOrder() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addnwOrSubButtDiv").style.visibility = "hidden";
    var stockDateDay = document.getElementById("nwOrBillDOBDay").value;
    var stockDateMMM = document.getElementById("nwOrBillDOBMonth").value;
    var stockDateYY = document.getElementById("nwOrBillDOBYear").value;
    var stockDateStr = document.getElementById("nwOrBillDOBMonth").value + ' ' + document.getElementById("nwOrBillDOBDay").value + ', ' + document.getElementById("nwOrBillDOBYear").value;
    var stockDate = new Date(stockDateStr); // stock Date
    var todayDate = new Date(); // Today Date

    var milliStockDate = stockDate.getTime();
    var milliTodayDate = milliStockDate;
    var datesDiff = milliTodayDate - milliStockDate;
    if (datesDiff < 0) {
        alert('Please Select the correct Date!');
        document.getElementById("nwOrBillDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addnwOrSubButtDiv").style.visibility = "visible";
        // exit();
    } else {
        if (stockDateMMM == 'FEB' || stockDateMMM == 'APR' || stockDateMMM == 'JUN' || stockDateMMM == 'SEP' || stockDateMMM == 'NOV') {
            if (stockDateMMM == 'FEB' && stockDateDay > 29 && stockDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("nwOrBillDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addnwOrSubButtDiv").style.visibility = "visible";
                //  exit();
            }
            if (stockDateMMM == 'FEB' && stockDateDay > 28 && stockDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("nwOrBillDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addnwOrSubButtDiv").style.visibility = "visible";
                // exit();
            }
            if (stockDateDay > 30) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' has only max 30 days.');
                document.getElementById("nwOrBillDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addnwOrSubButtDiv").style.visibility = "visible";
                //  exit();
            }
        }
        if (valAddNewOrderInputs()) {
            if (document.getElementById("nwOrCryMainId").value != '') {
                document.getElementById("totCrystal").value = parseFloat(document.getElementById("noOfCry").value);
            } else {
                document.getElementById("totCrystal").value = getCrystalDiv;
            }
            return true;
        }
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("addnwOrSubButtDiv").style.visibility = "visible";
    return false;
}
/*********End code to change id @Author:PRIYA06FEB14*******************/
/*******************End code to change function name @Author:PRIYA18SEP13***********/
/*END CODE TO VALIDATE NEW ORDER @AUTHOR:PRIYA08JAN13*/
/********************** Add New Stock Code *******************************/
/****Start Code To Change Firm Id And Add Validation Before Account Id @AUTHOR:PRIYA10APR13*******/
/*************Start code to add div @Author:PRIYA30NOV13******************************/
/******************Start code to add validation for wastage @Author:PRIYA19DEC13***************/
/******************Start code to add validation for wastage @Author:PRIYA21DEC13***************/
/******************Start code to add validation for wastage @Author:PRIYA06JAN14***************/
//function validateAddStockInputs() {
//    if (validateSelectField(document.getElementById("addStockDOBDay").value, "Please select Stock Date Day!") == false) {
//        document.getElementById("addStockDOBDay").focus();
//        return false;
//    }
//    else if (validateSelectField(document.getElementById("addStockDOBMonth").value, "Please select Stock Date Month!") == false) {
//        document.getElementById("addStockDOBMonth").focus();
//        return false;
//    }
//    else if (validateSelectField(document.getElementById("addStockDOBYear").value, "Please select Stock Date Year!") == false) {
//        document.getElementById("addStockDOBYear").focus();
//        return false;
//    }
//    else if (validateEmptyField(document.getElementById("addStockInvoiceNo").value, "Please enter Invoice Number!") == false ||
//            validateNum(document.getElementById("addStockInvoiceNo").value, "Accept only numeric characters without space character!") == false) {
//        document.getElementById("addStockInvoiceNo").focus();
//        return false;
//    }
////    else if (validateEmptyField(document.getElementById("addStockSupplierId").value, "Please choose Correct Supplier Name!") == false ||
////        validateNum(document.getElementById("addStockSupplierId").value, "Accept only numeric characters without space character!") == false) {
////        document.getElementById("addStockSupplierName").focus();
////        return false;
////    }
//    else if (validateSelectField(document.getElementById("firmId").value, "Please select Stock Firm Id!") == false) {
//        document.getElementById("firmId").focus();
//        return false;
//    }
//    else if (validateSelectField(document.getElementById("accountId").value, "Please select Account Name!") == false) {
//        document.getElementById("accountId").focus();
//        return false;
//    }
//    else if ((document.getElementById("addStockItemMetal").value != 'Other') && validateEmptyField(document.getElementById("addStockItemMetalId").value, "Please enter Metal Rate Id!") == false) {
//        document.getElementById("addStockItemMetalId").focus();
//        return false;
//    }
//    else if (validateEmptyField(document.getElementById("addStockItemId").value, "Please enter Item Id!") == false ||
//            validateNum(document.getElementById("addStockItemId").value, "Accept only numeric characters without space character!") == false) {
//        document.getElementById("addStockItemId").focus();
//        return false;
//    }
//    /**********************Start Code To Change Validation @AUTHOR:PRIYA11JUNE13******************/
//    else if (validateEmptyField(document.getElementById("addStockItemName").value, "Please enter Item Name!") == false) {
//        document.getElementById("addStockItemName").focus();
//        return false;
//    }
//    else if (validateEmptyField(document.getElementById("addStockItemCategory").value, "Please enter Item Category!") == false) {
//        document.getElementById("addStockItemCategory").focus();
//        return false;
//    }
//    /**********************End Code To Change Validation @AUTHOR:PRIYA11JUNE13******************/
//    else if (validateEmptyField(document.getElementById("addStockItemPieces").value, "Please enter Item Pieces!") == false ||
//            validateNum(document.getElementById("addStockItemPieces").value, "Accept only numeric characters without space!") == false) {
//        document.getElementById("addStockItemPieces").focus();
//        return false;
//    }
//    else if (validateEmptyField(document.getElementById("addStockItemGrossWeight").value, "Please enter Gross Weight!") == false ||
//            validateNumWithDot(document.getElementById("addStockItemGrossWeight").value, "Accept only numeric characters without space!") == false) {
//        document.getElementById("addStockItemGrossWeight").focus();
//        return false;
//    } else if (document.getElementById('panelSimilarDiv').value != 'NoSimilarItem') {
//        if (document.getElementById("addStockItemNetWeight").value == '') {
//            document.getElementById("addStockItemNetWeight").value = document.getElementById("addStockItemGrossWeight").value;
//            calculatePrice();
//        }
//        return true;
//    }
//    else if (document.getElementById('panelSimilarDiv').value != 'NoSimilarItem') {
//        if (validateEmptyField(document.getElementById("addStockItemNetWeight").value, "Please enter Net Weight!") == false ||
//                validateNumWithDot(document.getElementById("addStockItemNetWeight").value, "Accept only numeric characters without space!") == false) {
//            document.getElementById("addStockItemNetWeight").focus();
//            return false;
//        }
//    }
//    else if ((document.getElementById("addStockItemMetal").value != 'Other') && validateSelectField(document.getElementById("addStockItemTunch").value, "Please select Item Tunch or Purity!") == false) {
//        document.getElementById("addStockItemTunch").focus();
//        return false;
//    } else if (validateEmptyField(document.getElementById("addStockItemWastage").value, "Please enter Wastage!") == false) {
//        document.getElementById("addStockItemWastage").focus();
//        return false;
//    }
//    /******Start Code To Add Validdation For Cust Wastage @AUTHOR:PRIYA03MAY13*******/
////    else if (validateEmptyField(document.getElementById("addStockItemCustWastage").value, "Please enter Cust Wastage!") == false ||
////        validateNumWithDot(document.getElementById("addStockItemCustWastage").value, "Accept only numeric characters without space!") == false) {
////        document.getElementById("addStockItemCustWastage").focus();
////        return false;
////    } /******End Code To Add Validdation For Cust Wastage @AUTHOR:PRIYA03MAY13*******/
////    else if (validateEmptyField(document.getElementById("addStockItemValuation").value, "Please enter Item Valuation!") == false ||
////            validateNumWithDot(document.getElementById("addStockItemValuation").value, "Accept only numeric characters without space!") == false) {
////        document.getElementById("addStockItemValuation").focus();
////        return false;
////    }
//    else if (validateEmptyField(document.getElementById("addStockItemFinalVal").value, "Please enter Item Final Valuation!") == false ||
//            validateNumWithDot(document.getElementById("addStockItemFinalVal").value, "Accept only numeric characters without space!") == false) {
//        document.getElementById("addStockItemFinalVal").focus();
//        return false;
//    } else if (document.getElementById("totCrystal").value != '') {
//        crystalEntered = 0;
//        for (var dc = 1; dc <= getCrystalDiv; dc++) {
//            if ((document.getElementById('del' + dc).value != 'Deleted')) {
//                if (validateEmptyField(document.getElementById("addStockCryId" + dc).value, "Please select Crystal Id" + dc + "!") == false) {
//                    document.getElementById("addStockCryId" + dc).focus();
//                    return false;
//                } else if (validateEmptyField(document.getElementById("addStockCryRate" + dc).value, "Please select Crystal Rate!" + dc + "!") == false) {
//                    document.getElementById("addStockCryRate" + dc).focus();
//                    return false;
//                } else if (validateEmptyField(document.getElementById("addStockCryFinalVal" + dc).value, "Please Select Crystal Final Valuation!" + dc + "!") == false) {
//                    document.getElementById("addStockCryFinalVal" + dc).focus();
//                    return false;
//                }
//            }
//            crystalEntered++;
//        }
//    }
//    return true;
//}
/******************End code to add validation for wastage @Author:PRIYA06JAN14***************/
/******************End code to add validation for wastage @Author:PRIYA21DEC13***************/
/******************End code to add validation for wastage @Author:PRIYA19DEC13***************/
/******************End code to add similar item validn @Author:PRIYA16NOV13*************/
/******************End code to comment supp validation @Author:PRIYA11NOV13**************/
/****End Code To Change Firm Id And Add Validation Before Account Id @AUTHOR:PRIYA10APR13*******/
//START CODE TO Validate Action Item fields @AUTHOR:PRIYA18JAN13
/*******Start code to add delay function @Author:PRIYA03JUL14**********************/
function validateAddNewActionItem() {
    if (validateEmptyField(document.getElementById("taskDescrpn").value, "Please enter Task Description!") == false) {
        document.getElementById("taskDescrpn").focus();
        return false; //Validation Added for Task Desc @AUTHOR:PRIYA07JAN13
        //    } else if (validateSelectField(document.getElementById("acitStartDate").value, "Please select Action Item Start Date!") == false) {
        //        document.getElementById("acitStartDate").focus();
        //        return false;
        //    } else if (validateSelectField(document.getElementById("acitEndDate").value, "Please select Action Item End Date!") == false) {
        //        document.getElementById("acitEndDate").focus();
        //        return false;
    } else if (validateSelectField(document.getElementById("actionItemFirmId").value, "Please select Firm Name!") == false) {
        document.getElementById("actionItemFirmId").focus();
        return false;
    }

    return true;
}
function add_new_action_item(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddNewActionItem;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
var acit_panel_name;
function alertAddNewActionItem() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        //document.getElementById("addActionItemList").innerHTML = xmlhttp.responseText;
        if (typeof (parent.document.getElementById('paymentPanelReminderDiv')) != 'undefined' && parent.document.getElementById('paymentPanelReminderDiv') != null)
            parent.document.getElementById('paymentPanelReminderDiv').style.display = "none"; //parent.document.getElementById("paymentPanelReminderDiv").innerHTML = "";
        else {
            clearDivision('addActionItemDiv');
            clearDivision('ajaxCloseAddNewActionItem');
            getActionItemList('activeList');//ADDED FOR SHOWING LIST AFTER ACTION ITEM ADDED @AUTHOR:MADHUREE-06JULY2020
            if (acit_panel_name == 'UpdateAcit')
                closeMessDiv('messDisplayDiv', 'UPDATED');
            else
                closeMessDiv('messDisplayDiv', 'ADDED');
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/***********Start code to add var @Author:PRIYA03JUL14**************/
/***********Start code to add start date @Author:PRIYA09JUL14**************/
function addNewActionItem(obj, documentRootPath, textEditorData) {
//var y = x;
    acit_panel_name = document.getElementById('panelName').value;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    //document.getElementById("addNewActionItemButDiv").style.visibility = "hidden";
//    document.getElementById("addNewActionItemButDiv").innerHTML = xmlhttp.responseText;


//    var dateStr = document.getElementById("acitStartDate").value;
//    str = dateStr;
//    str = str.replace(/'/g, '\'');
//    str = str.replace(/"/g, '"');
//    str = str.replace(/\\0/g, '\0');
//    str = str.replace(/\\\\/g, '\\');
//    alert(str);
//    var date = new Date(dateStr); // stock Date
//    var todayDate = new Date(); // Today Date
//
//    var milliStockDate = date.getTime();
    //    var milliTodayDate = todayDate.getTime();
    //    var datesDiff = milliTodayDate - milliStockDate;
//    if (datesDiff < 0) {
    //        alert('Please Select the correct Date!');
//        document.getElementById("acitStartDate").focus();
    //        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    //        document.getElementById("addNewActionItemButDiv").style.visibility = "visible";
//        return false;
//    }
    if (validateAddNewActionItem()) {
        poststr = "taskDescrpn=" + encodeURIComponent(document.getElementById("taskDescrpn").value)
                + "&taskRepeat=" + encodeURIComponent(document.getElementById("taskRepeat").value)
                + "&taskCategory=" + encodeURIComponent(document.getElementById("taskCategory").value)
                + "&taskCustLoginId=" + encodeURIComponent(document.getElementById("taskCustLoginId").value)
                + "&selectFirmId=" + encodeURIComponent(document.getElementById("actionItemFirmId").value) + "&acitStartDate=" + encodeURIComponent(document.getElementById("acitStartDate").value)
                + "&acitHrs=" + encodeURIComponent(document.getElementById("acitHrs").value)
                + "&acitMin=" + encodeURIComponent(document.getElementById("acitMin").value)
                + "&acitSec=" + encodeURIComponent(document.getElementById("acitSec").value)
                + "&acitEndDate=" + encodeURIComponent(document.getElementById("acitEndDate").value)
                + "&acitEndHrs=" + encodeURIComponent(document.getElementById("acitEndHrs").value)
                + "&acitEndMin=" + encodeURIComponent(document.getElementById("acitEndMin").value)
                + "&acitEndSec=" + encodeURIComponent(document.getElementById("acitEndSec").value)
                + "&taskLoginId=" + encodeURIComponent(document.getElementById("taskLoginId").value)
                + "&panelName=" + encodeURIComponent(document.getElementById("panelName").value)
                + "&actionId=" + encodeURIComponent(document.getElementById("actionId").value)
                + "&acitOtherInfo=" + encodeURIComponent(textEditorData)
                + "&acitStatus=" + encodeURIComponent(document.getElementById("acit_status").value)
                + "&Notification=" + encodeURIComponent(document.getElementById("Notification").value);

//        alert(poststr);
//        add_new_action_item('include/php/omaiacad' + default_theme +'.php', poststr); txtEditor

        add_new_action_item(documentRootPath + '/include/php/omaiacad' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addNewActionItemButDiv").style.visibility = "visible";
    }
}
/***********End code to add start date @Author:PRIYA09JUL14**************/
/*******End code to add delay function @Author:PRIYA03JUL14**********************/
/***********End code to add var @Author:PRIYA03JUL14**************/
/*END code PRIYA24*/
/*START code PRIYA27*/
/*******start code to add action item to do list function @Author SWAPNIL07FEB2020**********************/
function addNewActionItemstaff(obj, documentRootPath) {
    //alert('helloo');
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateAddNewActionItem()) {
//        var x = document.getElementById("acitEndDate").value;
        //        alert(x);
        poststr = "taskDescrpn=" + encodeURIComponent(document.getElementById("taskDescrpn").value) + "&taskRepeat=" + encodeURIComponent(document.getElementById("taskRepeat").value)
                + "&taskCategory=" + encodeURIComponent(document.getElementById("taskCategory").value)
                + "&selectFirmId=" + encodeURIComponent(document.getElementById("actionItemFirmId").value)
                + "&DOBDay=" + encodeURIComponent(document.getElementById("DOBDay").value)
                + "&DOBMonth=" + encodeURIComponent(document.getElementById("DOBMonth").value)
                + "&DOBYear=" + encodeURIComponent(document.getElementById("DOBYear").value)
                + "&acitEndDate=" + encodeURIComponent(document.getElementById("acitEndDate").value)
                + "&taskLoginId=" + encodeURIComponent(document.getElementById("taskLoginId").value)
                + "&panelName=" + encodeURIComponent(document.getElementById("panelName").value)
                + "&actionId=" + encodeURIComponent(document.getElementById("actionId").value)
                + "&acitOtherInfo=" + encodeURIComponent(document.getElementById("acitOtherInfo").value);
        +"&acitextendeddate=" + encodeURIComponent(document.getElementById("acitextendeddate").value);
        //      alert(poststr);
//        add_new_action_item('include/php/omaiacad' + default_theme +'.php', poststr);

        add_new_action_item(documentRootPath + '/include/php/omaiacad' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addNewActionItemButDiv").style.visibility = "visible";
    }
}

/*******End code to add action item to do list function @Author SWAPNIL07FEB2020**********************/



function validateAddAccountInputs() {

    if (validateEmptyField(document.getElementById("accUserAccount").value, "Please select Account name!") == false) {   //Validation Removed @AUTHOR:PRIYA02MARCH13
        document.getElementById("accUserAccount").focus();
        return false;
    } else if (validateSelectField(document.getElementById("accMainAccountId").value, "Please Select Main Account!") == false) {               //PRIYA27
        document.getElementById("accMainAccountId").focus();
        return false;
    } else if (document.getElementById("accName").value != "" && validateAlphaWithSpace(document.getElementById("accName").value, "Accept only alpha characters!") == false) {
        document.getElementById("accName").focus(); //PRIYA28 to change id 
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Name!") == false) {
        document.getElementById("firmId").focus(); //code to add firm @author:PRIYA29
        return false;
    } else if ((document.getElementById("pinCode").value != '') && ((validateNum(document.getElementById("pinCode").value, "Accept only Numbers without space character!") == false ||
            validateLength6(document.getElementById("pinCode").value, "Pin Code length should be minimum 06!") == false))) {
        document.getElementById("pinCode").focus(); //PRIYA15
        return false;
    } else if (document.getElementById("accCashBalance").value != "" && validateNumWithDot(document.getElementById("accCashBalance").value, "Accept only Numbers!") == false) {
        document.getElementById("accCashBalance").focus();
        return false;
    }
    return true;
}
/*END code PRIYA27*/
function add_account(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddAccount;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertAddAccount() {
    var panel = localStorage.getItem("panel");
    var div = localStorage.getItem("div");
    var prodCount = localStorage.getItem("prodCount");
    var displayAccAddPanel = localStorage.getItem("displayAccAddPanel");
    //    alert(panel);
    //    alert(JSON.parse(xmlhttp));
    //    alert(prodCount);
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { //alert("hi");
        if (panel == "Y") {
//$("#display_account_popup").hide();
            //            alert(panel);
//            alert(div);
            //            alert(prodCount);
//            alert(xmlhttp.responseText);
            getMoreItemDivTransPayment(div, prodCount, xmlhttp.responseText, panel);
            return false;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (displayAccAddPanel == 'YES') {
                document.getElementById("accountListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            }
        }
        localStorage.removeItem("panel");
        localStorage.removeItem("displayAccAddPanel");
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function addNewAccount(div, prodCount, panel) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addAccSubButDiv").style.visibility = "hidden";
    if (validateAddAccountInputs()) {
        var poststr = "omgAccUserAccount=" + encodeURIComponent(document.getElementById("accUserAccount").value)
                + "&omgAccMainAccountId=" + encodeURIComponent(document.getElementById("accMainAccountId").value)
                + "&omgFirmId=" + encodeURIComponent(document.getElementById("firmId").value)             //CODE TO CHANGE ID  @AUTHOR: PRIYA29
                + "&omgAccName=" + encodeURIComponent(document.getElementById("accName").value)
                + "&omgAccountAddress1=" + encodeURIComponent(document.getElementById("accountAddress1").value)
                + "&omgCity=" + encodeURIComponent(document.getElementById("city").value)
                + "&omgPinCode=" + encodeURIComponent(document.getElementById("pinCode").value)
                + "&omgState=" + encodeURIComponent(document.getElementById("state").value)
                + "&omgCountry=" + encodeURIComponent(document.getElementById("country").value)
                + "&omgAccountPANNo=" + encodeURIComponent(document.getElementById("accountPANNo").value)
                + "&omgAccountSalesTaxNo=" + encodeURIComponent(document.getElementById("accountSalesTaxNo").value)
                + "&omgAccountCSTNo=" + encodeURIComponent(document.getElementById("accountCSTNo").value)
                + "&omgBankAccontNo=" + encodeURIComponent(document.getElementById("bankAccontNo").value) + "&omgBranchName=" + encodeURIComponent(document.getElementById("branchName").value)
                + "&omgAccBSRCode=" + encodeURIComponent(document.getElementById("accBSRCode").value)
                + "&omgAccIFSCode=" + encodeURIComponent(document.getElementById("accIFSCode").value)
                + "&omgAccCashBalDate=" + encodeURIComponent(document.getElementById("accOPBALDOBDay").value) + ' ' + encodeURIComponent(document.getElementById("accOPBALDOBMonth").value) + ' ' + encodeURIComponent(document.getElementById("accOPBALDOBYear").value)
                + "&omgAccCashBalance=" + encodeURIComponent(document.getElementById("accCashBalance").value)
                + "&omgAccCashBalCrDr=" + encodeURIComponent(document.getElementById("accCashBalCrDr").value)
                + "&omgAccountOtherInfo=" + encodeURIComponent(document.getElementById("accountOtherInfo").value)
                + "&panel=" + encodeURIComponent(document.getElementById("panel").value)
                + "&displayAccAddPanel=" + encodeURIComponent(document.getElementById("displayAccAddPanel").value);
        localStorage.setItem("panel", document.getElementById("panel").value);
        localStorage.setItem("displayAccAddPanel", document.getElementById("displayAccAddPanel").value);
        localStorage.setItem("div", div);
        localStorage.setItem("prodCount", prodCount);
        add_account('include/php/omacacad' + default_theme + '.php', poststr);
        //if(document.getElementById("panel").value == 'Y')
        return false;
        //else
        //return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addAccSubButDiv").style.visibility = "visible";
        return false;
    }
}
//********************** Start Code to Item Stock Payment ************************
function validateItemStockPaymentInputs() {

    if (validateEmptyField(document.getElementById("stockPayTotalAmtBal").value, "Please enter value in Total Amount Balance Field!") == false ||
            validateNumWithDot(document.getElementById("stockPayTotalAmtBal").value, "Accept only numeric value!") == false) {
        document.getElementById("stockPayTotalAmtBal").focus();
        return false;
    }

    return true;
}

function item_stock_payment(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertItemStockPayment;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertItemStockPayment() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/*******************Start code to comment @Author:PRIYA13NOV13********************************/
/*function itemStockPayment() {
 document.getElementById("main_ajax_loading_div").style.visibility = "visible";
 document.getElementById("itemStockPaymentButt").style.visibility = "hidden";
 var stockPayPriceCut = document.getElementById('stockPayPriceCut').checked;
 if (stockPayPriceCut == true) {
 confirm_box = confirm("आपने भाव काट दिया है! (You have convert Metal Wgt into Price!) \nबकाया राशि:(Amount Bal): " +
 document.getElementById('stockPayTotalAmtBal').value +
 "\nक्या आप यह एंट्री सेव करना चाहते है! Do you really want to continue!");
 }
 else {
 confirm_box = confirm("आपने भाव नही कटा है! (You have not convert Metal Wgt into Price!) \nबकाया सोना:(Gold Bal): " +
 document.getElementById('stockPayMetalDueWeight1').value +
 document.getElementById('stockPayMetalDueWeightType1').value +
 "\nबकाया चाँदी(Silver Bal): " +
 document.getElementById('stockPayMetalDueWeight2').value +
 document.getElementById('stockPayMetalDueWeightType2').value +
 "\nक्या आप यह एंट्री सेव करना चाहते है! Do you really want to continue!");
 }
 if (confirm_box == true)
 {
 if (validateItemStockPaymentInputs()) {
 
 poststr = "stockPayDate=" + encodeURIComponent(document.getElementById("stockPayDate").value)
 + "&stockPayPreInvoiceNo=" + encodeURIComponent(document.getElementById("stockPayPreInvoiceNo").value)
 + "&stockPayInvoiceNo=" + encodeURIComponent(document.getElementById("stockPayInvoiceNo").value)
 + "&stockFirmId=" + encodeURIComponent(document.getElementById("firmIdSelected").value)
 + "&stockAccountId=" + encodeURIComponent(document.getElementById("stockAccountId").value)
 + "&stockSupplierId=" + encodeURIComponent(document.getElementById("stockSupplierId").value)
 + "&stockGoldTotalGWeight=" + encodeURIComponent(document.getElementById("stockGoldTotalGWeight").value)
 + "&stockGoldTotalGWeightType=" + encodeURIComponent(document.getElementById("stockGoldTotalGWeightType").value)
 + "&stockGoldTotalNWeight=" + encodeURIComponent(document.getElementById("stockGoldTotalNWeight").value)
 + "&stockGoldTotalNWeightType=" + encodeURIComponent(document.getElementById("stockGoldTotalNWeightType").value)
 + "&stockGoldTotalFFNWeight=" + encodeURIComponent(document.getElementById("stockGoldTotalFFNWeight").value)
 + "&stockGoldTotalFFNWeightType=" + encodeURIComponent(document.getElementById("stockGoldTotalFFNWeightType").value)
 + "&stockSilverTotalGWeight=" + encodeURIComponent(document.getElementById("stockSilverTotalGWeight").value)
 + "&stockSilverTotalGWeightType=" + encodeURIComponent(document.getElementById("stockSilverTotalGWeightType").value)
 + "&stockSilverTotalNWeight=" + encodeURIComponent(document.getElementById("stockSilverTotalNWeight").value)
 + "&stockSilverTotalNWeightType=" + encodeURIComponent(document.getElementById("stockSilverTotalNWeightType").value)
 + "&stockSilverTotalFFNWeight=" + encodeURIComponent(document.getElementById("stockSilverTotalFFNWeight").value)
 + "&stockSilverTotalFFNWeightType=" + encodeURIComponent(document.getElementById("stockSilverTotalFFNWeightType").value)
 + "&stockPayFirm1=" + encodeURIComponent(document.getElementById("stockPayFirm1").value)
 + "&stockPaySelAccountId1=" + encodeURIComponent(document.getElementById("stockPaySelAccountId1").value)
 + "&stockPayMetalTotWeightRec1=" + encodeURIComponent(document.getElementById("stockPayMetalTotWeightRec1").value)
 + "&stockPayMetalTotWeightRecType1=" + encodeURIComponent(document.getElementById("stockPayMetalTotWeightRecType1").value)
 + "&stockPayMetalTunch1=" + encodeURIComponent(document.getElementById("stockPayMetalTunch1").value)
 + "&stockPayMetalFineWeight1=" + encodeURIComponent(document.getElementById("stockPayMetalFineWeightRec1").value)
 + "&stockPayMetalRate1=" + encodeURIComponent(document.getElementById("stockPayMetalRate1").value)
 + "&stockPayMetalValuation1=" + encodeURIComponent(document.getElementById("stockPayMetalValuation1").value)
 + "&stockPayMetalDueWeight1=" + encodeURIComponent(document.getElementById("stockPayMetalDueWeight1").value)
 + "&stockPayMetalDueWeightType1=" + encodeURIComponent(document.getElementById("stockPayMetalDueWeightType1").value)
 + "&stockPayFirm2=" + encodeURIComponent(document.getElementById("stockPayFirm2").value)
 + "&stockPaySelAccountId2=" + encodeURIComponent(document.getElementById("stockPaySelAccountId2").value)
 + "&stockPayMetalTotWeightRec2=" + encodeURIComponent(document.getElementById("stockPayMetalTotWeightRec2").value)
 + "&stockPayMetalTotWeightRecType2=" + encodeURIComponent(document.getElementById("stockPayMetalTotWeightRecType2").value)
 + "&stockPayMetalTunch2=" + encodeURIComponent(document.getElementById("stockPayMetalTunch2").value)
 + "&stockPayMetalFineWeight2=" + encodeURIComponent(document.getElementById("stockPayMetalFineWeightRec2").value)
 + "&stockPayMetalRate2=" + encodeURIComponent(document.getElementById("stockPayMetalRate2").value)
 + "&stockPayMetalValuation2=" + encodeURIComponent(document.getElementById("stockPayMetalValuation2").value)
 + "&stockPayMetalDueWeight2=" + encodeURIComponent(document.getElementById("stockPayMetalDueWeight2").value)
 + "&stockPayMetalDueWeightType2=" + encodeURIComponent(document.getElementById("stockPayMetalDueWeightType2").value)
 + "&stockPayGoldWghtBal=" + encodeURIComponent(document.getElementById("stockPayGoldWghtBal").value)
 + "&stockPaySilverWghtBal=" + encodeURIComponent(document.getElementById("stockPaySilverWghtBal").value)
 + "&stockPayTotalAmt=" + encodeURIComponent(document.getElementById("stockPayTotalAmt").value)
 + "&stockPayTotalAmtRec=" + encodeURIComponent(document.getElementById("stockPayTotalAmtRec").value)
 + "&stockPayTotalAmtBal=" + encodeURIComponent(document.getElementById("stockPayTotalAmtBal").value)
 + "&stockPaySelAccountId=" + encodeURIComponent(document.getElementById("stockPaySelAccountId").value)
 + "&stockPayChequeNo=" + encodeURIComponent(document.getElementById("stockPayChequeNo").value)
 + "&stockPayTotalCashPaid=" + encodeURIComponent(document.getElementById("stockPayTotalCashPaid").value)
 + "&stockPayTotalDiscount=" + encodeURIComponent(document.getElementById("stockPayTotalDiscount").value)
 + "&stockPayOtherInfo=" + encodeURIComponent(document.getElementById("stockPayOtherInfo").value)
 + "&stockPayPriceCut=" + document.getElementById('stockPayPriceCut').checked;
 item_stock_payment('include/php/ogiapyad' + default_theme +'.php', poststr);
 return true;
 } else {
 document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
 document.getElementById("itemStockPaymentButt").style.visibility = "visible";
 return false;
 }
 }
 else {
 document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
 document.getElementById("itemStockPaymentButt").style.visibility = "visible";
 return false;
 }
 }*/
/*******************End code to comment @Author:PRIYA13NOV13********************************/
//********************** End Code to Item Stock Payment ************************
//
//*********** Start Code for Girvi Notice Validations @Author: KHUSH07JAN13 ************************
function validateGirviNoticeSetUpAddLangInputs() {                                                                  //<!-- Modified By KHUSH09JAN13 -->                        
    if (validateEmptyField(document.getElementById("newLang").value, "Please enter Language Name!") == false)
    {
        document.getElementById("newLang").focus();
        return false;
    }
    if (validateEmptyField(document.getElementById("headerLabel").value, "Please enter Header Label!") == false
            ) {
        document.getElementById("headerLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("custNameLabel").value, "Please enter Customer Name!") == false) {
        document.getElementById("custNameLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("dateLabel").value, "Please enter Date!") == false) {
        document.getElementById("dateLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("fatherOrSpouseNameLabel").value, "Please select Father or Spouse Name!") == false) {
        document.getElementById("fatherOrSpouseNameLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("custAddressLabel").value, "Please enter Customer Address!") == false) {
        document.getElementById("custAddressLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("loanNoticeContent").value, "Please enter Loan Notice Content!") == false) {
        document.getElementById("loanNoticeContent").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("loanDetailLabel").value, "Please enter Loan Details!") == false) {
        document.getElementById("loanDetailLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("loanDateLabel").value, "Please enter Loan Date!") == false) {
        document.getElementById("loanDateLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("principalAmountLabel").value, "Please enter Principal Amount!") == false) {
        document.getElementById("principalAmountLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("totalInterestLabel").value, "Please enter Total Interest!") == false) {
        document.getElementById("totalInterestLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("totalAmountLabel").value, "Please enter Total Amount!") == false) {
        document.getElementById("totalAmountLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("loanArticles").value, "Please enter Loan Articles!") == false) {
        document.getElementById("loanArticles").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("custSign").value, "Please enter Customer Signature!") == false) {
        document.getElementById("custSign").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("ownerSign").value, "Please enter Owner Signature!") == false) {
        document.getElementById("ownerSign").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("footerLabel").value, "Please enter Footer Label!") == false) {
        document.getElementById("footerLabel").focus();
        return false;
    }
    return true;
}
function girvi_notice_setUp_addLang(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertGirviNoticeSetUpAddLang;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertGirviNoticeSetUpAddLang() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addGirviNoticeBut").style.visibility = "visible";
        document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("addGirviNoticeBut").style.visibility = "hidden";
    }
}
/**************Start code to add margin @Author:PRIYA28DEC13*******************/
function girviNoticeSetUpAddLang() {                                                                    //<!-- Modified By KHUSH21JAN13 -->

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addGirviNoticeBut").style.visibility = "hidden";
    if (validateGirviNoticeSetUpAddLangInputs()) {

        var poststr = "newLang=" + encodeURIComponent(document.getElementById("newLang").value)
                + "&headerLabel=" + encodeURIComponent(document.getElementById("headerLabel").value)
                + "&topMargin=" + encodeURIComponent(document.getElementById("loanNoticeTopMargin").value)
                + "&leftMargin=" + encodeURIComponent(document.getElementById("loanNoticeLeftMargin").value)
                + "&custNameLabel=" + encodeURIComponent(document.getElementById("custNameLabel").value)
                + "&dateLabel=" + encodeURIComponent(document.getElementById("dateLabel").value)
                + "&fatherOrSpouseNameLabel=" + encodeURIComponent(document.getElementById("fatherOrSpouseNameLabel").value)
                + "&custAddressLabel=" + encodeURIComponent(document.getElementById("custAddressLabel").value)
                + "&loanNoticeContent=" + encodeURIComponent(document.getElementById("loanNoticeContent").value)
                + "&loanDetailLabel=" + encodeURIComponent(document.getElementById("loanDetailLabel").value)
                + "&loanDateLabel=" + encodeURIComponent(document.getElementById("loanDateLabel").value)
                + "&principalAmountLabel=" + encodeURIComponent(document.getElementById("principalAmountLabel").value)
                + "&totalInterestLabel=" + encodeURIComponent(document.getElementById("totalInterestLabel").value)
                + "&totalAmountLabel=" + encodeURIComponent(document.getElementById("totalAmountLabel").value)
                + "&loanArticles=" + encodeURIComponent(document.getElementById("loanArticles").value)
                + "&tNC=" + encodeURIComponent(document.getElementById("tNC").value)
                + "&custSign=" + encodeURIComponent(document.getElementById("custSign").value)
                + "&ownerSign=" + encodeURIComponent(document.getElementById("ownerSign").value)
                + "&footerLabel=" + encodeURIComponent(document.getElementById("footerLabel").value);
        girvi_notice_setUp_addLang('include/php/omppgnad' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addGirviNoticeBut").style.visibility = "visible";
    }
}
/**************End code to add margin @Author:PRIYA28DEC13*******************/
//*********** End Code for Girvi Notice  @Author: KHUSH07JAN13 ************************
//
//START CODE TO ADD Invoice New Order @AUTHOR:PRIYA06JAN13
//Start code to add validation for Invoice @Author:PRIYA21SEP13
function validateAddNewInvoiceInNwOr() {
    if (validateEmptyField(document.getElementById("nwOrPayInvoiceNo").value, "Invoice Not Available For Payment!") == false) {
        document.getElementById("nwOrPayInvoiceNo").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("nwOrPayTotalAmtBal").value, "Please select Total Amount Balance!") == false) {   //CODE TO CHANGE ID  @AUTHOR: PRIYA31
        document.getElementById("nwOrPayTotalAmtBal").focus();
        return false;
    }
    return true;
}
//End code to add validation for Invoice @Author:PRIYA21SEP13
function add_invoiceInNwOr(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddInvoiceInNwOr;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/************Start Code To Change Div @Author:PRIYA25JUL13******/
function alertAddInvoiceInNwOr() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/************End Code To Change Div @Author:PRIYA25JUL13******/
//START CODE TO ADD Gold and Silver Fields @AUTHOR:PRIYA12JAN13
/******Start Code To Change Acc Id And Discount Id @AUTHOR:PRIYA12MAY13*********/
/***********Start code To change ids and function name @Author:PRIYA19SEP13***************/
/***********Start code To add firm id @Author:PRIYA26SEP13***************/
function newOrderPayment(documentRootPath) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("subButton").style.visibility = "hidden";
    if (validateAddNewInvoiceInNwOr()) {

        var poststr = "custId=" + encodeURIComponent(document.getElementById("custId").value)
                + "&omgItemPanel=" + encodeURIComponent(document.getElementById("itemPanel").value)
                + "&omgFirmId=" + encodeURIComponent(document.getElementById("firmId").value)
                + "&omgNewSuppId=" + encodeURIComponent(document.getElementById("newSuppId").value)
                + "&omgNwOrPayMetalType1=" + encodeURIComponent(document.getElementById("nwOrPayMetalType1").value)
                + "&omgNwOrPreInvoiceNo=" + encodeURIComponent(document.getElementById("nwOrPayPreInvoiceNo").value)
                + "&omgNwOrInvoiceNo=" + encodeURIComponent(document.getElementById("nwOrPayInvoiceNo").value)
                + "&omgNwOrPayRawGoldPreId=" + encodeURIComponent(document.getElementById("nwOrPayRawGoldPreId").value)
                + "&omgNwOrPayRawGoldPostId=" + encodeURIComponent(document.getElementById("nwOrPayRawGoldPostId").value)
                + "&omgNwOrPayFirm1=" + encodeURIComponent(document.getElementById("addnwOdStockItemPayFirm1").value)
                + "&omgNwOrPaySelAccountId1=" + encodeURIComponent(document.getElementById("nwOrItemPaySelAccountId1").value)
                + "&omgNwOrPayMetalTotWeight1=" + encodeURIComponent(document.getElementById("nwOrPayMetalTotWeight1").value)
                + "&omgNwOrPayMetalTotWeightType1=" + encodeURIComponent(document.getElementById("nwOrPayMetalTotWeightType1").value)
                + "&omgNwOrPayMetalTunch1=" + encodeURIComponent(document.getElementById("nwOrPayMetalTunch1").value) + "&omgNwOrPayMetalFineWeight1=" + encodeURIComponent(document.getElementById("nwOrPayMetalFineWeight1").value)
                + "&omgNwOrPayMetalRate1=" + encodeURIComponent(document.getElementById("nwOrPayMetalRate1").value)
                + "&omgNwOrPayMetalValuation1=" + encodeURIComponent(document.getElementById("nwOrPayMetalValuation1").value)
                + "&omgNwOrPayMetalDueWeight1=" + encodeURIComponent(document.getElementById("nwOrPayMetalDueWeight1").value)
                + "&omgNwOrPayMetalDueWeightType1=" + encodeURIComponent(document.getElementById("nwOrPayMetalDueWeightType1").value)
                + "&omgNwOrPayMetalType2=" + encodeURIComponent(document.getElementById("nwOrPayMetalType2").value)
                + "&omgNwOrPayRawSilverPreId=" + encodeURIComponent(document.getElementById("nwOrPayRawSilverPreId").value)
                + "&omgNwOrPayRawSilverPostId=" + encodeURIComponent(document.getElementById("nwOrPayRawSilverPostId").value) + "&omgNwOrPayFirm2=" + encodeURIComponent(document.getElementById("addStockItemPayFirm2").value)
                + "&omgNwOrPaySelAccountId2=" + encodeURIComponent(document.getElementById("nwOrItemPaySelAccountId2").value)
                + "&omgNwOrPayMetalTotWeight2=" + encodeURIComponent(document.getElementById("nwOrPayMetalTotWeight2").value)
                + "&omgNwOrPayMetalTotWeightType2=" + encodeURIComponent(document.getElementById("nwOrPayMetalTotWeightType2").value)
                + "&omgNwOrPayMetalTunch2=" + encodeURIComponent(document.getElementById("nwOrPayMetalTunch2").value) + "&omgNwOrPayMetalFineWeight2=" + encodeURIComponent(document.getElementById("nwOrPayMetalFineWeight2").value)
                + "&omgNwOrPayMetalRate2=" + encodeURIComponent(document.getElementById("nwOrPayMetalRate2").value)
                + "&omgNwOrPayMetalValuation2=" + encodeURIComponent(document.getElementById("nwOrPayMetalValuation2").value) + "&omgNwOrPayMetalDueWeight2=" + encodeURIComponent(document.getElementById("nwOrPayMetalDueWeight2").value)
                + "&omgNwOrPayMetalDueWeightType2=" + encodeURIComponent(document.getElementById("nwOrPayMetalDueWeightType2").value)
                + "&omgNwOrPayGoldWtBal=" + encodeURIComponent(document.getElementById("nwOrPayGoldWtBal").value)
                + "&omgNwOrPaySilverWtBal=" + encodeURIComponent(document.getElementById("nwOrPaySilverWtBal").value)
                + "&omgNwOrPayTotalAmt=" + encodeURIComponent(document.getElementById("nwOrPayTotalAmt").value)
                + "&omgNwOrPayTotalAmtRec=" + encodeURIComponent(document.getElementById("nwOrPayTotalAmtRec").value)
                + "&omgNwOrPayTotalAmtBal=" + encodeURIComponent(document.getElementById("nwOrPayTotalAmtBal").value)
                + "&omgNwOrStockPaySelAccountId=" + encodeURIComponent(document.getElementById("nwOrStockPaySelAccountId").value)
                + "&omgNwOrPayCashAmount=" + encodeURIComponent(document.getElementById("nwOrPayCashAmount").value)
                + "&omgNwOrPayDiscount=" + encodeURIComponent(document.getElementById("nwOPayDiscount").value)
                + "&omgNwOrPayCardType=" + encodeURIComponent(document.getElementById("nwOrPayCardType").value)
                + "&omgNwOrPayCardNo=" + encodeURIComponent(document.getElementById("nwOrPayCardNo").value)
                + "&omgNwOrPayOtherInfo=" + encodeURIComponent(document.getElementById("nwOrPayOtherInfo").value)
                + "&omgNwOrgdWeight1=" + encodeURIComponent(document.getElementById("nwOrPayTotalGoldWt").value)
                + "&omgNwOrgdWeightType1=" + encodeURIComponent(document.getElementById("nwOrPayTotalGoldWtType").value)
                + "&omgNwOrsrWeight2=" + encodeURIComponent(document.getElementById("nwOrPayTotalSilverWt").value)
                + "&omgNwOrsrWeightType2=" + encodeURIComponent(document.getElementById("nwOrPayTotalSilverWtType").value);
        add_invoiceInNwOr("include/php/ognopyad" + default_theme + ".php", poststr);
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("subButton").style.visibility = "visible";
        return false;
    }
}
/***********End code To add firm id @Author:PRIYA26SEP13***************/
/***********End code To change ids and function name @Author:PRIYA19SEP13***************/
/******End Code To Change Acc Id And Discount Id @AUTHOR:PRIYA12MAY13*********/
//END CODE TO ADD Gold and Silver Fields @AUTHOR:PRIYA12JAN13
//
//*********** Start Code for Form N/8 Add Language Validations @Author: KHUSH12JAN13 ************************
function validateFormEightSetUpAddLangInputs() {                                             //<!-- Modified By KHUSH12JAN13 -->                        

    if (validateEmptyField(document.getElementById("newLang").value, "Please enter Language Name!") == false) {
        document.getElementById("newLang").focus();
        return false;
    }
    /*else if (validateEmptyField(document.getElementById("headerLabel").value,"Please enter Header Label!") == false) {
     document.getElementById("headerLabel").focus();
     return false;
     } COMMENT @AUTHOR: SANDY18JUL13*/
    else if (validateEmptyField(document.getElementById("sNoLabel").value, "Please enter Serial No.!") == false)
    {
        document.getElementById("sNoLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("dateLabel").value, "Please enter Date!") == false) {
        document.getElementById("dateLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("custOrPawnerNameLabel").value, "Please enter Customer or Pawner Name!") == false) {
        document.getElementById("custOrPawnerNameLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("fatherNameLabel").value, "Please enter Father Name!") == false) {
        document.getElementById("fatherNameLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addressLabel").value, "Please enter Address Label!") == false) {
        document.getElementById("addressLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("articleOrItemNameLabel").value, "Please enter Article or Item Name!") == false) {
        document.getElementById("articleOrItemNameLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("piecesOrQuantityLabel").value, "Please enter Pieces or Quantity Label!") == false) {
        document.getElementById("piecesOrQuantityLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("metalLabel").value, "Please enter Metal Label!") == false) {
        document.getElementById("metalLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("grossWeightLabel").value, "Please enter Gross Weight!") == false) {
        document.getElementById("grossWeightLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("netWeightLabel").value, "Please enter Net Weight!") == false) {
        document.getElementById("netWeightLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("principalAmountLabel").value, "Please enter Principal Amount!") == false) {
        document.getElementById("principalAmountLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("rateOfInterestLabel").value, "Please enter Rate of Interest!") == false)
    {
        document.getElementById("rateOfInterestLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("redemptionPeriodLabel").value, "Please enter Redemption Period!") == false)
    {
        document.getElementById("redemptionPeriodLabel").focus();
        return false;
    }
    /* else if (validateEmptyField(document.getElementById("otherInfoLabel").value,"Please enter Other Info!") == false) 
     {      document.getElementById("otherInfoLabel").focus();
     return false;
     }  COMMENT @AUTHOR: SANDY18JUL13*/
    else if (validateEmptyField(document.getElementById("custSign").value, "Please enter Customer Sign!") == false)
    {
        document.getElementById("custSign").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("ownerSign").value, "Please enter Owner Sign!") == false)
    {
        document.getElementById("ownerSign").focus();
        return false;
    }
    /*else if (validateEmptyField(document.getElementById("footerLabel").value,"Please enter Footer Label!") == false ) 
     {
     document.getElementById("footerLabel").focus();
     return false;
     }COMMENT @AUTHOR: SANDY18JUL13*/
    return true;
}
function form_eight_setUp_addLang(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertFormEightSetUpAddLang;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertFormEightSetUpAddLang() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("formEightAddLangButt").style.visibility = "visible"; //<!-- Modified By KHUSH12JAN13 -->   
        document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("formEightAddLangButt").style.visibility = "hidden";
    }
}
/*********Start Code To Add ROI Check @AUTHOR:PRIYA06APR13*************/
function formEightSetUpAddLang() {                                                                    //<!-- Modified By KHUSH11JAN13 -->

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("formEightAddLangButt").style.visibility = "hidden";
    var rateOfInterestCheckBox = 'False';
    if (document.getElementById("rateOfInterestCheck").checked == true) {
        rateOfInterestCheckBox = 'True';
    }
    if (validateFormEightSetUpAddLangInputs()) {            // Modified by KHUSH21JAN13    
        var poststr = "newLang=" + encodeURIComponent(document.getElementById("newLang").value)
                + "&headerLabel=" + encodeURIComponent(document.getElementById("headerLabel").value)
                + "&sNoLabel=" + encodeURIComponent(document.getElementById("sNoLabel").value)
                + "&dateLabel=" + encodeURIComponent(document.getElementById("dateLabel").value)
                + "&custOrPawnerNameLabel=" + encodeURIComponent(document.getElementById("custOrPawnerNameLabel").value)
                + "&fatherNameLabel=" + encodeURIComponent(document.getElementById("fatherNameLabel").value)
                + "&addressLabel=" + encodeURIComponent(document.getElementById("addressLabel").value)
                + "&articleOrItemNameLabel=" + encodeURIComponent(document.getElementById("articleOrItemNameLabel").value)
                + "&piecesOrQuantityLabel=" + encodeURIComponent(document.getElementById("piecesOrQuantityLabel").value)
                + "&metalLabel=" + encodeURIComponent(document.getElementById("metalLabel").value)
                + "&grossWeightLabel=" + encodeURIComponent(document.getElementById("grossWeightLabel").value)
                + "&netWeightLabel=" + encodeURIComponent(document.getElementById("netWeightLabel").value)
                + "&principalAmountLabel=" + encodeURIComponent(document.getElementById("principalAmountLabel").value)
                + "&rateOfInterestLabel=" + encodeURIComponent(document.getElementById("rateOfInterestLabel").value) + "&rateOfInterestCheck=" + encodeURIComponent(rateOfInterestCheckBox)
                + "&redemptionPeriodLabel=" + encodeURIComponent(document.getElementById("redemptionPeriodLabel").value) + "&otherInfoLabel=" + encodeURIComponent(document.getElementById("otherInfoLabel").value)
                + "&tNC=" + encodeURIComponent(document.getElementById("tNC").value)
                + "&custSign=" + encodeURIComponent(document.getElementById("custSign").value)
                + "&ownerSign=" + encodeURIComponent(document.getElementById("ownerSign").value)
                + "&footerLabel=" + encodeURIComponent(document.getElementById("footerLabel").value);
        //alert(poststr);
        form_eight_setUp_addLang('include/php/omppfead' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("formEightAddLangButt").style.visibility = "visible";
    }
}
/*********End Code To Add ROI Check @AUTHOR:PRIYA06APR13*************/
//*********** End Code for Form N/8 Add Language Validations @Author: KHUSH11JAN13 ************************
function getNewOrderBookingForm(obj) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("newOrderStatus").innerHTML = xmlhttp.responseText;
            document.getElementById("getNewOrderBooking").focus();
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiva").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ognomndv" + default_theme + ".php", true);
    xmlhttp.send();
}
//*********** Start Code for Form R/7 Validations @Author: KHUSH14JAN13 ************************
function validateFormSevenSetUpAddLangInputs() {                                                                  //<!-- Modified By KHUSH14JAN13 -->                        
    if (validateEmptyField(document.getElementById("newLang").value, "Please enter Language Name!") == false)
    {
        document.getElementById("newLang").focus();
        return false;
    }
    /*else if (validateEmptyField(document.getElementById("headerLabel").value,"Please enter Header Label!") == false)
     {
     document.getElementById("headerLabel").focus();
     return false;
     }COMMENT @AUTHOR: SANDY18JUL13*/
    else if (validateEmptyField(document.getElementById("sNoLabel").value, "Please enter Serial No.!") == false) {
        document.getElementById("sNoLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("dateLabel").value, "Please enter Date!") == false) {
        document.getElementById("dateLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("formSevenContent").value, "Please enter Form Content!") == false) {
        document.getElementById("formSevenContent").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("principalAmount").value, "Please enter Principal Amount!") == false) {
        document.getElementById("principalAmount").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("totalInterest").value, "Please enter Total Interest!") == false) {
        document.getElementById("totalInterest").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("totalAmount").value, "Please enter Total Amount!") == false) {
        document.getElementById("totalAmount").focus();
        return false;
    }
    /*else if (validateEmptyField(document.getElementById("formSevenOtherInfo").value,"Please enter Other Information!") == false) {
     document.getElementById("formSevenOtherInfo").focus();
     return false;
     }COMMENT @AUTHOR: SANDY18JUL13*/
    else if (validateEmptyField(document.getElementById("custSign").value, "Please enter Customer Signature!") == false) {
        document.getElementById("custSign").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("ownerSign").value, "Please enter Owner Signature!") == false) {
        document.getElementById("ownerSign").focus();
        return false;
    }
    /* else if (validateEmptyField(document.getElementById("footerLabel").value,"Please enter Footer Label!") == false) {
     document.getElementById("footerLabel").focus();
     return false;
     } COMMENT @AUTHOR: SANDY18JUL13*/
    return true;
}
function form_seven_setUp_addLang(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertFormSevenSetUpAddLang;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertFormSevenSetUpAddLang() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addFormSevenButt").style.visibility = "visible";
        document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("addFormSevenButt").style.visibility = "hidden";
    }
}
function formSevenSetUpAddLang() {                                                                    //<!-- Modified By KHUSH20JAN13 -->

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addFormSevenButt").style.visibility = "hidden";
    if (validateFormSevenSetUpAddLangInputs()) {

        var poststr = "newLang=" + encodeURIComponent(document.getElementById("newLang").value)
                + "&headerLabel=" + encodeURIComponent(document.getElementById("headerLabel").value)
                + "&sNoLabel=" + encodeURIComponent(document.getElementById("sNoLabel").value)
                + "&dateLabel=" + encodeURIComponent(document.getElementById("dateLabel").value)
                + "&formSevenContent=" + encodeURIComponent(document.getElementById("formSevenContent").value)
                + "&principalAmount=" + encodeURIComponent(document.getElementById("principalAmount").value)
                + "&totalInterest=" + encodeURIComponent(document.getElementById("totalInterest").value)
                + "&totalAmount=" + encodeURIComponent(document.getElementById("totalAmount").value)
                + "&formSevenOtherInfo=" + encodeURIComponent(document.getElementById("formSevenOtherInfo").value)
                + "&tNC=" + encodeURIComponent(document.getElementById("tNC").value)
                + "&custSign=" + encodeURIComponent(document.getElementById("custSign").value)
                + "&ownerSign=" + encodeURIComponent(document.getElementById("ownerSign").value)
                + "&footerLabel=" + encodeURIComponent(document.getElementById("footerLabel").value);
        form_seven_setUp_addLang('include/php/omppfsad' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addFormSevenButt").style.visibility = "visible";
    }
}
//*********** End Code for Form R/7 Validations @Author: KHUSH14JAN13 ************************
/**********START OF CHANGES IN FUNCTION TO  ADD ITEM TAG @AUTHOR: SANDY7NOV13**************/
/**********Start code to change fun @Author:PRIYA24JAN14*****************/
/**********Start code to add status @Author:PRIYA12FEB14********************/
/**********Start code to add last two parameters @Author:GAUR18SEP16********************/
function addItemTag(stockFirmId, itstId, newPreItemId, newItemId, newItemName, newItemMetal, newItemGSW, newItemGSQT, newItemNTW, newItemNTWT, newItemCryVal, newItemTunch,
        bisMarkVal, mkngCharges, mkngChargesType, cryNtWt, cryNtWtTp, panel, bcPresent, itemCode, itemNum, itemPKW, itemPKWT, bcItemDate, itemOtherInfo, itemFinalValuation, bcItemPrefixId, bcItemModelNo, bcItemSize) {
    //            alert(bcItemPrefixId);
    if (bcPresent > 0) {
        var status = "BarCode already present ! Do you really want to add it !";
    } else {
        status = "Do you really want to add it !";
    }
    confirm_box = confirm(status);
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panel == 'ListPanel') {
                    document.getElementById("itemTagDiv" + itstId).innerHTML = "<img src='images/right16.png' />";
                } else {
                    document.getElementById("barcodeAddedDispMsgDiv").innerHTML = "BARCODE ADDED!";
                    window.setTimeout(hideBarcodeAddedMsg, 1000);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogittgad" + default_theme + ".php?stockFirmId=" + stockFirmId + "&itstId=" + itstId
                + "&newPreItemId=" + newPreItemId + "&newItemId=" + newItemId + "&newItemName=" + newItemName + "&newItemMetal=" + newItemMetal
                + "&newItemGSW=" + newItemGSW + "&newItemGSQT=" + newItemGSQT
                + "&newItemNTW=" + newItemNTW + "&newItemNTWT=" + newItemNTWT
                + "&newItemCryVal=" + newItemCryVal + "&newItemTunch=" + newItemTunch + "&bisMarkVal=" + bisMarkVal + "&mkngCharges=" + mkngCharges + "&mkngChargesType=" + mkngChargesType + "&cryNtWt=" + cryNtWt + "&cryNtWtTp=" + cryNtWtTp + "&itemCode=" + itemCode + "&itemNum=" + itemNum + "&itemPKW=" + itemPKW + "&itemPKWT=" + itemPKWT + "&bcItemDate=" + bcItemDate + "&itemOtherInfo=" + itemOtherInfo + "&itemFinalValuation=" + itemFinalValuation + "&bcItemPrefixId=" + bcItemPrefixId + "&bcItemModelNo=" + bcItemModelNo + "&bcItemSize=" + bcItemSize, true);
        xmlhttp.send();
    }
}
function addImitationItemTag(itstId, itprId, panel, documentRoot) {
    status = "Do you really want to add it !";
    confirm_box = confirm(status);
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panel == 'ListPanel') {
                    alert(xmlhttp.responseText);
                    document.getElementById("itemTagDiv" + itprId).innerHTML = "<img src='images/right16.png' />";
                } else {
                    document.getElementById("barcodeAddedDispMsgDiv").innerHTML = "BARCODE ADDED!";
                    window.setTimeout(hideBarcodeAddedMsg, 1000);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogittgad" + default_theme + ".php?itprId=" + itprId + "&itstId=" + itstId + "&panel=ImitationStock", true);
        xmlhttp.send();
    }
}
/**********End code to add last two parameters @Author:GAUR18SEP16********************/
/**********End code to add status @Author:PRIYA12FEB14********************/
/**********End code to change fun @Author:PRIYA24JAN14*****************/
/**********END OF CHANGES IN FUNCTION TO  ADD ITEM TAG @AUTHOR: SANDY7NOV13**************/
/*******Start to add delay function to display barcode added msg in item Detail Panel @AUTHOR: SANDY24OCT13***********/
function hideBarcodeAddedMsg() {
    document.getElementById("barcodeAddedDispMsgDiv").innerHTML = '&nbsp;';
}
/*******End to add delay function to display barcode added msg in item Detail Panel @AUTHOR: SANDY24OCT13***********/
function addLocationInDB(panelName) {
    var location = document.getElementById('backupLocation').value;
    if (validateEmptyField(location, "Please enter backup directory path!") == false) {
        document.getElementById('backupLocation').focus();
        return false;
    } else if (location.indexOf(":") == -1) {
        alert('Please enter correct backup directory path!')
        document.getElementById('backupLocation').focus();
        return false;
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'dbBackupLogOutPanel') {
                    if (xmlhttp.responseText == 'ALREADY_ADDED') {
                        document.getElementById("updateMsgDisplayDiv").innerHTML = "<span class='textLabel20CalibriNormalRed'>ALREADY ADDED!</span>";
                    } else {
                        document.getElementById("dbBackupTextBoxDiv").innerHTML = xmlhttp.responseText;
                        document.getElementById("updateMsgDisplayDiv").innerHTML = "<span class='textLabel16CalibriNormalGreen'>UPDATED SUCCESSFULLY!</span>";
                    }
                } else {
                    if (xmlhttp.responseText == 'ALREADY_ADDED') {
                        document.getElementById("updateMsgDisplayDiv").innerHTML = "<span class='textLabel20CalibriNormalRed'>ALREADY ADDED!</span>";
                    } else {
                        document.getElementById("databaseBackupPanel").innerHTML = xmlhttp.responseText;
                        document.getElementById("updateMsgDisplayDiv").innerHTML = "<span class='textLabel16CalibriNormalGreen'>UPDATED SUCCESSFULLY!</span>";
                    }
                }
                window.setTimeout(functionToCloseDiv, 1000);
            } else {
                document.getElementById("dbBackupButton").style.visibility = "hidden";
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ommpindc" + default_theme + ".php?indicname=" + 'backupLocation' + "&indicval=" + location + "&indicfun=ADD" + "&fileName=" + 'omppbkup' + "&panelName=" + panelName, true);
        xmlhttp.send();
    }
}
function deleteLocationInDB(panelName) {
    confirm_box = confirm("Do you really want to remove this database backup location! \nक्या आप वास्तव में इस डेटाबेस बैकअप स्थान को हटाना चाहते हैं!");
    if (confirm_box == true)
    {
        var location = document.getElementById('dbLocationSelect').value;
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'dbBackupLogOutPanel') {
                    document.getElementById("dbBackupTextBoxDiv").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("databaseBackupPanel").innerHTML = xmlhttp.responseText;
                }
                document.getElementById("updateMsgDisplayDiv").innerHTML = "<span class='textLabel16CalibriNormalGreen'>DELETED SUCCESSFULLY!</span>";
                window.setTimeout(functionToCloseDiv, 1000);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ommpindc" + default_theme + ".php?indicname=" + 'backupLocation' + "&indicval=" + location + "&indicfun=DELDEF" + "&indicDefValue=selected" + "&fileName=" + 'omppbkup' + "&panelName=" + panelName, true);
        xmlhttp.send();
    }
}
function showLocBoxToAddLocInDB(panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("dbBackupTextBoxDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("dbBackupButton").style.visibility = "hidden";
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppdbtbd" + default_theme + ".php?panelName=" + panelName, true);
    xmlhttp.send();
}
function showSelectLoctionDB() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("dbBackupTextBoxDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("dbBackupButton").style.visibility = "visible";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppdblcd" + default_theme + ".php", true);
    xmlhttp.send();
}
// *****************************************************************************
// Start code to add new folder location in database
// This is the universal function to add any location
// *****************************************************************************
function addUpdateLocationInDB(indicator) {
    var location = document.getElementById('folderLocationInputId').value;
    if (validateEmptyField(location, "Please enter backup directory path!") == false) {
        document.getElementById('folderLocationInputId').focus();
        return false;
    } else if (location.indexOf(":") == -1) {
        alert('Please enter correct backup directory path!');
        document.getElementById('folderLocationInputId').focus();
        return false;
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (xmlhttp.responseText == 'ALREADY_ADDED') {
                    document.getElementById("updateMsgDisplayDiv").innerHTML = "<span class='textLabel20CalibriNormalRed'>ALREADY ADDED!</span>";
                } else {
                    document.getElementById("updateMsgDisplayDiv").innerHTML = "<span class='textLabel16CalibriNormalGreen'>UPDATED SUCCESSFULLY!</span>";
                }
                document.getElementById("folderLocationButtonId").style.visibility = "visible";
            } else {
                document.getElementById("folderLocationButtonId").style.visibility = "hidden";
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ommpindc" + default_theme + ".php?indicname=" + indicator + "&indicval=" + location, true);
        xmlhttp.send();
    }
}
// *****************************************************************************
// End code to add new folder location in database
// *****************************************************************************
//
//
// *****************************************************************************
// Start code to create/export file for collection machine
// *****************************************************************************
function collectionMachineExportFile(staffId) {
//
    if (validateEmptyField(document.getElementById('staffNameForCollMachineInputId').value, "Please select the staff first!") == false) {
        document.getElementById('staffNameForCollMachineInputId').focus();
        return false;
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                //
                //alert(xmlhttp.responseText);
                if (xmlhttp.responseText == 'ERROR') {
                    document.getElementById("collectionMsgDisplayDiv").innerHTML = "<span class='textLabel20CalibriNormalRed'>ERROR!</span>";
                } else {
                    document.getElementById("collectionMsgDisplayDiv").innerHTML = "<span class='textLabel16CalibriNormalGreen'>EXPORT SUCCESSFULLY!</span>";
                }
                document.getElementById("exportCollMachineInputId").style.visibility = "visible";
            } else {
                document.getElementById("exportCollMachineInputId").style.visibility = "hidden";
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omcmexportfile" + default_theme + ".php?staffId=" + staffId, true);
        xmlhttp.send();
    }
}
// *****************************************************************************
// End code to create/export file for collection machine
// *****************************************************************************
//
//
// *****************************************************************************
// Start code to load/import file for collection machine
// *****************************************************************************
function collectionMachineImportFile(staffId) {
//
    if (validateEmptyField(document.getElementById('staffNameForCollMachineInputId').value, "Please select the staff first!") == false) {
        document.getElementById('staffNameForCollMachineInputId').focus();
        return false;
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                //
                //alert(xmlhttp.responseText);
                if (xmlhttp.responseText == 'ERROR') {
                    document.getElementById("collectionMsgDisplayDiv").innerHTML = "<span class='textLabel20CalibriNormalRed'>ERROR!</span>";
                } else {
                    document.getElementById("collectionMsgDisplayDiv").innerHTML = "<span class='textLabel16CalibriNormalGreen'>IMPORT SUCCESSFULLY!</span>";
                }
                document.getElementById("exportCollMachineInputId").style.visibility = "visible";
            } else {
                document.getElementById("exportCollMachineInputId").style.visibility = "hidden";
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omcmimportfile" + default_theme + ".php?staffId=" + staffId, true);
        xmlhttp.send();
    }
}
// *****************************************************************************
// End code to load/import file for collection machine
// *****************************************************************************
// *****************************************************************************
// Start code to add option for Non-Collection EMI @renuka_sharma22/11/2022
// *****************************************************************************
function noncollectionEMIDetails(documentRoot, dueEMI) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.display == 'block';
            document.getElementById("userListDiv").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//     var fromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
//    var toDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
    xmlhttp.open("GET", documentRoot + "/include/php/omfindueemi.php?dueEMI=" + dueEMI, true);
    xmlhttp.send();
}
//*****************************************************************************
// End code to add option for non-collection emi@renuka sharma22/11/2022
//*****************************************************************************
/*****************Start code to change func for Trasaction Payment @Author:SHUBHAM24AUG2018***************/
//var count = 0;
//counter++;
//function  getMoreItemDivTransPayment() {
//    
//    var counter = document.getElementById("itemDivCounterTrans").value;
//    //alert("hi");
//
//    if (counter != '') {
//        getMoreItemDivTransPayment = getMoreItemDivTransPayment + 1;
//    } else {
//        getMoreItemDivTransPayment = 3;
//        document.getElementById("itemDivCounterTrans").value = 1;
//    }
//    var poststr = "itemDivCounterTrans=" + getMoreItemDivTransPayment;
//    get_more_item_div_trans_payment('include/php/omDailyTransPayment' + default_theme +'.php', poststr);
//    return false;
//}
/*****************End code to change func @Author:SHUBHAM24AUG2018***************/
/******START Code to change Item Count @AUTHOR:PRIYA24JAN13**********/


//var getMoreItemDivTransPayment = 4;
//var itemEntered = 0;
//function get_more_item_div_trans_payment(url, parameters) {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = alertGetMoreItemDivTransPayment;
//    xmlhttp.open('POST', url, true);
//    xmlhttp.setRequestHeader('Content-Type',
//            'application/x-www-form-urlencoded');
//    xmlhttp.setRequestHeader("Content-length", parameters.length);
//    xmlhttp.setRequestHeader("Connection", "close");
//    xmlhttp.send(parameters);
//}
/*****************Start code to change func @Author:PRIYA01MAR14***************/


//function alertGetMoreItemDivTransPayment() {
//    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//        document.getElementById("ajaxLoadGetItemListDiv").style.visibility = "hidden";
//        document.getElementById("itemDivCounterTrans").innerHTML = document.getElementById("addItemDiv").innerHTML + xmlhttp.responseText;
//        alert(xmlhttp.responseText);
//        if (getMoreItemDivTransPayment == 5) {
//            document.getElementById("itemDivCounterTrans").innerHTML = xmlhttp.responseText;
//            
//        } else {
//            document.getElementById("itemDivCounterTrans" + getMoreItemDivTransPayment).innerHTML = xmlhttp.responseText;
//        }
//    } else {
//        document.getElementById("ajaxLoadGetItemListDiv").style.visibility = "visible";
//    }
//}
/*****************End code to change func @Author:PRIYA01MAR14***************/

function getMoreItemDivTransPayment(div, prodCount, acc_id, panel, firmId) {
    if (panel != 'Y') {
        createChildDiv(div, prodCount);
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'Y') {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
//                $("#display_account_popup").hide();
            } else {
                document.getElementById(div + prodCount).innerHTML = xmlhttp.responseText;
                $('#' + div + '' + prodCount).find('select').focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omDailyTransPaymentDrTrans" + default_theme + ".php?prodCount=" + prodCount + "&acc_id=" + acc_id + "&firmId=" + firmId, true);
    xmlhttp.send();
}

// *************************************************************************************************************************************
// START CODE FOR CLOSE MULTIPLE FORM DIV @PRIYANKA-09MAY18
// *************************************************************************************************************************************
function closeItemDivTransPayment(prodCount, div) {
    if (prodCount <= 3) {
        return false;
    }
//
//alert("prodCount == " + prodCount);
//alert("div == " + div);
//
    if (prodCount == 0) {
        prodCount = '';
    }
//
    var childDivName = document.getElementById(div);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).removeChild(document.getElementById(div + prodCount));
            $('#' + div + '' + Number(prodCount - 1)).find('select').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omDailyTransPaymentDrTrans" + default_theme + ".php?prodCount=" + prodCount, true);
    //
    xmlhttp.send();
}
function payTransaction(obj) {
    //alert('prodCount == ' + document.getElementById("prodCount").value);
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("transPaymentButt").style.visibility = "hidden";
    if (validatePayTransactionInputs(obj)) {
        var poststr = "DOBDay=" + encodeURIComponent(document.getElementById("DOBDay").value)
                + "&DOBMonth=" + encodeURIComponent(document.getElementById("DOBMonth").value)
                + "&DOBYear=" + encodeURIComponent(document.getElementById("DOBYear").value)
                + "&transFirmId=" + encodeURIComponent(document.getElementById("transFirmId").value)
                + "&transPreVoucherNo=" + encodeURIComponent(document.getElementById("transPreVoucherNo").value)
                + "&transPostVoucherNo=" + encodeURIComponent(document.getElementById("transPostVoucherNo").value) + "&transToAcc=" + encodeURIComponent(document.getElementById("transToAcc").value)
                + "&transactionCategory=" + encodeURIComponent(document.getElementById("transactionCategory").value)
                + "&transAmount=" + encodeURIComponent(document.getElementById("transAmount").value);
        //+ "&transactionDesc=" + encodeURIComponent(document.getElementById("transactionDesc").value);comment BY @AUTHOR: SANDY02JAN14
        //alert(poststr);
        xmlhttp.open('include/php/omDailyTransPayment' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("transPaymentButt").style.visibility = "visible";
    }
}
function validatePayTransactionInputs() {

    var prodCount = document.getElementById("prodCount").value;
    if (validateSelectField(document.getElementById("DOBDay").value, "Please select Transaction Date!") == false) {
        document.getElementById("DOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Transaction Date!") == false) {
        document.getElementById("DOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select Transaction Date!") == false) {
        document.getElementById("DOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("transFirmId").value, "Please select Transaction Firm!") == false) {
        document.getElementById("transFirmId").focus();
        return false;
    }
    /*else if (validateEmptyField(document.getElementById("transPreVoucherNo").value, "Please enter Pre Voucher Id!") == false ||
     validateAlpha(document.getElementById("transPreVoucherNo").value, "Accept only alpha characters!") == false) {
     document.getElementById("transPreVoucherNo").focus();
     return false;
     }COMMENT BY @AUTHOR: SANDY27JAN14*/
    else if (validateEmptyField(document.getElementById("transPostVoucherNo").value, "Please enter Post Voucher Number!") == false ||
            validateNum(document.getElementById("transPostVoucherNo").value, "Accept only number without space!") == false) {
        document.getElementById("transPostVoucherNo").focus();
        return false;
    } else if (validateSelectField(document.getElementById("transToAcc" + prodCount).value, "Please select Transaction To Account!") == false) {
        document.getElementById("transToAcc" + prodCount).focus();
        return false;
    }
    /******Start code to remove alpha validation @Author:PRIYA17MAY14****************/
    else if (validateSelectField(document.getElementById("transSub" + prodCount).value, "Please select Transaction Details!") == false) {
        document.getElementById("transSub" + prodCount).focus();
        return false;
    } else if (validateEmptyField(document.getElementById("transAmt" + prodCount).value, "Please enter Transaction Amount!") == false) {
        document.getElementById("transAmt" + prodCount).focus();
        return false;
    }
    /******End code to remove alpha validation @Author:PRIYA17MAY14****************/

    return true;
}

function validateAddNewSupportTicket(ticketType) {
    if (validateSelectField(ticketType, "Please select Ticket Type!") === false) {
        document.getElementById("selectTicketType").focus();
        return false;
    }
    return true;
}
function addNewSupportTicket(ticketType, documentRootPath, textEditorTicketDes, custId, staffId) {
    if (validateAddNewSupportTicket(ticketType)) {
        poststr = "?ticketType=" + encodeURIComponent(ticketType)
                + "&textEditorTicketDes=" + encodeURIComponent(textEditorTicketDes)
                + "&custId=" + encodeURIComponent(custId)
                + "&staffId=" + encodeURIComponent(staffId);
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("SupportTicketMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", documentRootPath + '/include/php/omadcsuppticket' + default_theme + '.php' + poststr, true);
        xmlhttp.send();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addSupportTicketButDiv").style.visibility = "visible";
    }
}
/********************Start Code To Get Email Template @AUTHOR:ASHWINI PATIL 28MAY2020**************/
function addEmailFormat(emailSubject, emailPanel, sendOptionId, attachInvoiceCheck, documentRootPath, EmailBody) {
    //    alert(attachInvoiceCheck);
    var panelName = document.getElementById('panelName').value;
    if (emailSubject === '' || emailSubject === null) {
        alert("Please Enter Email Subject !");
        document.getElementById('emailSubject').focus();
        return false;
    }
    if (emailPanel === '' || emailPanel === 'NotSelected') {
        alert("Please Select Email Panel !");
        document.getElementById('emailPanel').focus();
        return false;
    }
    if (sendOptionId === '' || sendOptionId === 'NotSelected') {
        alert("Please Select Sending Option !");
        document.getElementById('sendOptionId').focus();
        return false;
    }

    var poststr = "?emailSubject=" + encodeURIComponent(emailSubject)
            + "&emailPanel=" + encodeURIComponent(emailPanel)
            + "&sendOptionId=" + encodeURIComponent(sendOptionId)
            + "&EmailBody=" + encodeURIComponent(EmailBody)
            + "&attachInvoiceCheck=" + encodeURIComponent(attachInvoiceCheck)
            + "&panelName=" + encodeURIComponent(panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("EmailFormattMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + '/include/php/omadEmailFormat' + default_theme + '.php' + poststr, true);
    xmlhttp.send();
}

function updateEmailFormat(emailPanel, documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("EmailFormattMainDiv").innerHTML = xmlhttp.responseText;

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
        //document.getElementById("EmailFormattMainDiv").innerHTML = xmlhttp.responseText;
    };
    xmlhttp.open("POST", documentRootPath + '/include/php/ommpmail' + default_theme + '.php?emailPanel=' + emailPanel + "&panelName=" + "UpdateEmailFormat", true);
    xmlhttp.send();
}
//------Start code for send mail panel by Ashwini 1june2020----------
function updateSendEmailFormat(emailPanel, documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("SendEmailFormattMainDiv").innerHTML = xmlhttp.responseText;

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
        //document.getElementById("EmailFormattMainDiv").innerHTML = xmlhttp.responseText;
    };
    xmlhttp.open("POST", documentRootPath + '/include/php/ommpsendmail' + default_theme + '.php?emailPanel=' + emailPanel + "&panelName=" + "UpdateEmailFormat", true);
    xmlhttp.send();
}
/********************End Code To Get send Email Template @AUTHOR:ASHWINI PATIL 1june2020**************/

function validateVisitor() {
    //
//    if (document.getElementById("leadType").value == '' || document.getElementById("leadType").value == 'NotSelected') {
//        alert("Please Select Lead Type !");
//        document.getElementById("leadType").focus();
//        return false;
//    }
//    if (document.getElementById("leadType").value == '' || document.getElementById("leadType").value == 'NotSelected') {
//        alert("Please Select Lead Type !");
//        document.getElementById("leadType").focus();
//        return false;
//    }
    //
    //// code comment for owner add the lead

    if (document.getElementById("leadsPhnNo").value != '') {
        result = checkvalue(document.getElementById("leadsPhnNo").value, '', '', '', 'visitorPanel');
        if (result != 'success') {
            alert("Duplicate Mobile No ! Please Enter Different Mobile No !");
            return false;
        }
    }
    //
    if (document.getElementById("leadsEmail").value != '') {
        result = checkvalue('', document.getElementById("leadsEmail").value, '', '', 'visitorPanel');
        if (result != 'success') {
            alert("Duplicate Email Id ! Please Enter Different Email Id !");
            return false;
        }
    }
    //
    return true;
    //
}
//
function searchStateCountryForPanel(divId, searchString, inputId, eventKeyCode) {
    var keyCode = eventKeyCode;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('searchCountryStateSelect').focus();
                document.getElementById('searchCountryStateSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/omsearchstatecountry' + default_theme + '.php?searchString=' + searchString + "&inputId=" + inputId + "&divId=" + divId, true);
    xmlhttp.send();
}
//
function searchStateContryForPanelBlank(divId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/ombbblnk' + default_theme + '.php', true);
    xmlhttp.send();
}
//
function calTotalPaidAmount() {
    //
    var cashPaidAmount = document.getElementById("girvCashAmtRec").value;
    var chequePaidAmount = document.getElementById("girvBankAmtRec").value;
    var cardPaidAmount = document.getElementById("girvCardAmtRec").value;
    var onlinePaidAmount = document.getElementById("girvOnlineAmtRec").value;
    var totalPaidAmount = 0;
    //
    if (cashPaidAmount == '' || cashPaidAmount == 'NaN') {
        cashPaidAmount = document.getElementById("girvCashAmtRec").value = parseFloat(0).toFixed(2);
    } else {
        cashPaidAmount = document.getElementById("girvCashAmtRec").value = parseFloat(document.getElementById("girvCashAmtRec").value).toFixed(2);
    }
    //
    if (chequePaidAmount == '' || chequePaidAmount == 'NaN') {
        chequePaidAmount = document.getElementById("girvBankAmtRec").value = parseFloat(0).toFixed(2);
    } else {
        chequePaidAmount = document.getElementById("girvBankAmtRec").value = parseFloat(document.getElementById("girvBankAmtRec").value).toFixed(2);
    }
    //
    if (cardPaidAmount == '' || cardPaidAmount == 'NaN') {
        cardPaidAmount = document.getElementById("girvCardAmtRec").value = parseFloat(0).toFixed(2);
    } else {
        cardPaidAmount = document.getElementById("girvCardAmtRec").value = parseFloat(document.getElementById("girvCardAmtRec").value).toFixed(2);
    }
    //
    if (onlinePaidAmount == '' || onlinePaidAmount == 'NaN') {
        onlinePaidAmount = document.getElementById("girvOnlineAmtRec").value = parseFloat(0).toFixed(2);
    } else {
        onlinePaidAmount = document.getElementById("girvOnlineAmtRec").value = parseFloat(document.getElementById("girvOnlineAmtRec").value).toFixed(2);
    }
    //
    totalPaidAmount = parseInt(cashPaidAmount) + parseInt(chequePaidAmount) + parseInt(cardPaidAmount) + parseInt(onlinePaidAmount);
    //
    if (totalPaidAmount > 0) {
        document.getElementById("totalPaidAmount").value = parseFloat(totalPaidAmount).toFixed(2);
    } else {
        document.getElementById("totalPaidAmount").value = parseFloat(0).toFixed(2);
    }
    //
}
//
function calTotalDepAmount() {
    //
    var cashPaidAmount = document.getElementById("girvDepCashAmtRec").value;
    var chequePaidAmount = document.getElementById("girvDepBankAmtRec").value;
    var cardPaidAmount = document.getElementById("girvDepCardAmtRec").value;
    var onlinePaidAmount = document.getElementById("girvDepOnlineAmtRec").value;
    var totalPaidAmount = 0;
    //
    if (cashPaidAmount == '' || cashPaidAmount == 'NaN') {
        cashPaidAmount = document.getElementById("girvDepCashAmtRec").value = parseFloat(0);
    } else {
        cashPaidAmount = document.getElementById("girvDepCashAmtRec").value = parseFloat(document.getElementById("girvDepCashAmtRec").value);
    }
    //
    if (chequePaidAmount == '' || chequePaidAmount == 'NaN') {
        chequePaidAmount = document.getElementById("girvDepBankAmtRec").value = parseFloat(0);
    } else {
        chequePaidAmount = document.getElementById("girvDepBankAmtRec").value = parseFloat(document.getElementById("girvDepBankAmtRec").value);
    }
    //
    if (cardPaidAmount == '' || cardPaidAmount == 'NaN') {
        cardPaidAmount = document.getElementById("girvDepCardAmtRec").value = parseFloat(0);
    } else {
        cardPaidAmount = document.getElementById("girvDepCardAmtRec").value = parseFloat(document.getElementById("girvDepCardAmtRec").value);
    }
    //
    if (onlinePaidAmount == '' || onlinePaidAmount == 'NaN') {
        onlinePaidAmount = document.getElementById("girvDepOnlineAmtRec").value = parseFloat(0);
    } else {
        onlinePaidAmount = document.getElementById("girvDepOnlineAmtRec").value = parseFloat(document.getElementById("girvDepOnlineAmtRec").value);
    }
    totalPaidAmount = cashPaidAmount + chequePaidAmount + cardPaidAmount + onlinePaidAmount;
    //
//    totalPaidAmount = parseInt(cashPaidAmount) + parseInt(chequePaidAmount) + parseInt(cardPaidAmount) + parseInt(onlinePaidAmount);
    //
    if (totalPaidAmount > 0) {
        document.getElementById("girvDeptotalPaidAmount").value = parseFloat(totalPaidAmount).toFixed(2);
    } else {
        document.getElementById("girvDeptotalPaidAmount").value = parseFloat(0).toFixed(2);
    }
    //
}
//
function calFinalInterest() {
    loadXMLDoc();
    documentRootPathForMoneyDep = document.getElementById("documentRootPathForMoneyDep").value;
    var poststr = "?depositYear=" + encodeURIComponent(document.getElementById("DMDOBYear").value)
            + "&depositMonth=" + encodeURIComponent(document.getElementById("DMDOBMonth").value)
            + "&depositDay=" + encodeURIComponent(document.getElementById("DMDOBDay").value)
            + "&intType=" + encodeURIComponent(document.getElementById("interestType").value)
            + "&girviDepositPrinAmount=" + encodeURIComponent(document.getElementById("girviDepositPrinAmount").value)
            + "&girviNewDateForUpdate=" + encodeURIComponent(document.getElementById("girviNewDateForUpdate").value)
            + "&intType=" + encodeURIComponent(document.getElementById("interestType").value)
            + "&ROIValue=" + encodeURIComponent(document.getElementById("selROI").value)
            + "&girviDepositIntAmount" + encodeURIComponent(document.getElementById("girviDepositIntAmount").value)
            + "&girviDepositPrinAmount=" + encodeURIComponent(document.getElementById("girviDepositPrinAmount").value)
            + "&totalPrincipalAmount=" + encodeURIComponent(document.getElementById("totalPrincipalAmount").value)
            + "&girviTimePeriodVar=" + encodeURIComponent(document.getElementById("girviTimePeriodVar").value)
            + "&girviId=" + encodeURIComponent(document.getElementById("girviId").value)
            + "&custId=" + encodeURIComponent(document.getElementById("custId").value)
            + "&directCalInterest=directCalInterest";
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            var prinAmt = document.getElementById('girviDepositPrinAmount').value;
            if (prinAmt != '' || prinAmt != NULL) {
                document.getElementById("girviDepositIntAmount").value = xmlhttp.responseText;
            }
            var intRec = document.getElementById('girviDepositIntAmount').value;
            var extraAmt = document.getElementById('girviDepExtraAmt').value;
            var disAmt = document.getElementById('girviDepositDiscountAmount').value;
            if (prinAmt == '')
                prinAmt = 0;
            if (intRec == '')
                intRec = 0;
            if (disAmt == '')
                disAmt = 0;
            if (extraAmt == '')
                extraAmt = 0;
            document.getElementById('girviTotalAmtRec').value = (parseFloat(intRec) + parseFloat(prinAmt) + parseFloat(extraAmt)) - parseFloat(disAmt);
            if (document.getElementById('girviTotalAmtRec').value == 'NaN') {
                document.getElementById('girviTotalAmtRec').value = '';
            }
            document.getElementById('girvDepCashAmtRec').value = parseFloat(document.getElementById('girviTotalAmtRec').value).toFixed(2);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
        //
        var cashPaidAmount = document.getElementById("girvDepCashAmtRec").value;
        var chequePaidAmount = document.getElementById("girvDepBankAmtRec").value;
        var cardPaidAmount = document.getElementById("girvDepCardAmtRec").value;
        var onlinePaidAmount = document.getElementById("girvDepOnlineAmtRec").value;
        var totalPaidAmount = 0;
        //
        if (cashPaidAmount == '' || cashPaidAmount == 'NaN') {
            cashPaidAmount = document.getElementById("girvDepCashAmtRec").value = parseFloat(0).toFixed(2);
        } else {
            cashPaidAmount = document.getElementById("girvDepCashAmtRec").value = parseFloat(document.getElementById("girvDepCashAmtRec").value).toFixed(2);
        }
        //
        if (chequePaidAmount == '' || chequePaidAmount == 'NaN') {
            chequePaidAmount = document.getElementById("girvDepBankAmtRec").value = parseFloat(0).toFixed(2);
        } else {
            chequePaidAmount = document.getElementById("girvDepBankAmtRec").value = parseFloat(document.getElementById("girvDepBankAmtRec").value).toFixed(2);
        }
        //
        if (cardPaidAmount == '' || cardPaidAmount == 'NaN') {
            cardPaidAmount = document.getElementById("girvDepCardAmtRec").value = parseFloat(0).toFixed(2);
        } else {
            cardPaidAmount = document.getElementById("girvDepCardAmtRec").value = parseFloat(document.getElementById("girvDepCardAmtRec").value).toFixed(2);
        }
        //
        if (onlinePaidAmount == '' || onlinePaidAmount == 'NaN') {
            onlinePaidAmount = document.getElementById("girvDepOnlineAmtRec").value = parseFloat(0).toFixed(2);
        } else {
            onlinePaidAmount = document.getElementById("girvDepOnlineAmtRec").value = parseFloat(document.getElementById("girvDepOnlineAmtRec").value).toFixed(2);
        }
        //
        totalPaidAmount = parseInt(cashPaidAmount) + parseInt(chequePaidAmount) + parseInt(cardPaidAmount) + parseInt(onlinePaidAmount);
        //
        if (totalPaidAmount > 0) {
            document.getElementById("girvDeptotalPaidAmount").value = parseFloat(totalPaidAmount).toFixed(2);
        } else {
            document.getElementById("girvDeptotalPaidAmount").value = parseFloat(0).toFixed(2);
        }
    };
    xmlhttp.open("POST", documentRootPathForMoneyDep + '/include/php/omCalculateInterest' + '.php' + poststr, true);
    xmlhttp.send();
}
function calTotalReleaseAmount() {
    //
    var cashPaidAmount = document.getElementById("girvRelCashAmtRec").value;
    var chequePaidAmount = document.getElementById("girvRelBankAmtRec").value;
    var cardPaidAmount = document.getElementById("girvRelCardAmtRec").value;
    var onlinePaidAmount = document.getElementById("girvRelOnlineAmtRec").value;
    var totalPaidAmount = 0;
    //
    if (cashPaidAmount == '' || cashPaidAmount == 'NaN') {
        cashPaidAmount = document.getElementById("girvRelCashAmtRec").value = parseFloat(0);
    } else {
        cashPaidAmount = document.getElementById("girvRelCashAmtRec").value = parseFloat(document.getElementById("girvRelCashAmtRec").value);
    }
    //
    if (chequePaidAmount == '' || chequePaidAmount == 'NaN') {
        chequePaidAmount = document.getElementById("girvRelBankAmtRec").value = parseFloat(0);
    } else {
        chequePaidAmount = document.getElementById("girvRelBankAmtRec").value = parseFloat(document.getElementById("girvRelBankAmtRec").value);
    }
    //
    if (cardPaidAmount == '' || cardPaidAmount == 'NaN') {
        cardPaidAmount = document.getElementById("girvRelCardAmtRec").value = parseFloat(0);
    } else {
        cardPaidAmount = document.getElementById("girvRelCardAmtRec").value = parseFloat(document.getElementById("girvRelCardAmtRec").value);
    }
    //
    if (onlinePaidAmount == '' || onlinePaidAmount == 'NaN') {
        onlinePaidAmount = document.getElementById("girvRelOnlineAmtRec").value = parseFloat(0);
    } else {
        onlinePaidAmount = document.getElementById("girvRelOnlineAmtRec").value = parseFloat(document.getElementById("girvRelOnlineAmtRec").value);
    }
    //
    totalPaidAmount = cashPaidAmount + chequePaidAmount + cardPaidAmount + onlinePaidAmount;
//    totalPaidAmount = parseInt(cashPaidAmount) + parseInt(chequePaidAmount) + parseInt(cardPaidAmount) + parseInt(onlinePaidAmount);
    //
    if (totalPaidAmount > 0) {
        document.getElementById("girvRelTotalReceivedAmount").value = parseFloat(totalPaidAmount).toFixed(2);
    } else {
        document.getElementById("girvRelTotalReceivedAmount").value = parseFloat(0).toFixed(2);
    }
    //
}
//
function valDirectAddCustInputsQuickSell() {
    if (validateEmptyField(document.getElementById("custFirstNameForAddGirvi").value, "Please enter First Name!") == false) {
        document.getElementById("custFirstNameForAddGirvi").focus();
        return false;
    }
    if (validateSelectField(document.getElementById("custCountryForAddGirvi").value, "Please Select Country Name Or Set Default Country from Settings Panel!") == false) {
        document.getElementById("custCountryForAddGirvi").focus();
        return false;
    }
    if (validateSelectField(document.getElementById("custStateForAddGirvi").value, "Please Select State Name Or Set Default State from Settings Panel!") == false) {
        document.getElementById("custStateForAddGirvi").focus();
        return false;
    } else if (validateSelectField(document.getElementById("girviFirmId").value, "Please select Firm Name!") == false) {
        document.getElementById("girviFirmId").focus();
        return false;
    } else if (((document.getElementById("mobileNoToAddGirvi").value != 'Enter Mobile Number') && (document.getElementById("mobileNoToAddGirvi").value != ''))
            && ((validateNumWithUnderScore(document.getElementById("mobileNoToAddGirvi").value, "Accept only Numbers without space character!") == false ||
                    validateLength10(document.getElementById("mobileNoToAddGirvi").value, "Mobile number length should be minimum 10!") == false))) {
        document.getElementById("mobileNoToAddGirvi").focus();
        return false;
    }
    if (document.getElementById("mobileNoToAddGirvi").value != '') {
        result = checkvalue(document.getElementById("mobileNoToAddGirvi").value, '', '', '');
        if (result != 'success') {
            alert("Duplicate Mobile No ! Please Enter Different Mobile No !");
            return false;
        }
    }
    return true;
}
//
// default_theme parameter is appeneded in the .php file by CHETAN 06MAY2022
//
function calNoOfMonthIntrestAmt(){
        var perMonthInt = document.getElementById('perMonthInt').value;  // Simple Month Principle interest amt
        var additionalPerMnthInt = document.getElementById('additionalPerMnthInt').value;  // Additional Principle interest amt
        
        if(additionalPerMnthInt == 'undefined' || additionalPerMnthInt == ''){
          var additionalPerMnthInt = 0;
        }
        
        var principleMnth = document.getElementById('girvMonDepMonths').value;   // Principle Month on input filed
        var addPrincipleMnth = document.getElementById('addPrinMonth').value;  // Additional Principle  Month cnt
        //
        var additionalIntAmt = 0;
        if(document.getElementById("multipledata").value != 'null'){
            const parsedDataDetails = JSON.parse(document.getElementById("multipledata").value); // Additional Principle Multiple details array get
            var additionalIntAmt = 0;
            parsedDataDetails.forEach(detail => {
                 if(principleMnth <= detail.addPrincipleMnth || principleMnth == detail.addPrincipleMnth){
                   additionalIntAmt += principleMnth * detail.principleMnth;
                 } else if(principleMnth >= detail.addPrincipleMnth){
                   additionalIntAmt += detail.addPrincipleMnth * detail.principleMnth
                 }
            });
        }
        var monthIntAmt = perMonthInt * principleMnth;  // Simple Principle month calculation
        var interestAmount = monthIntAmt + additionalIntAmt;
        
        document.getElementById('girviTotalAmtRec').value = interestAmount;
        document.getElementById('girvDepCashAmtRec').value = interestAmount;
        document.getElementById('girviDepositIntAmount').value = interestAmount.toFixed(2); // Round off to 2 decimal places
}
