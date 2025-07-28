/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function loadXMLDoc() {
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        xmlhttp = new XMLHttpRequest();
        if (xmlhttp.overrideMimeType) {
            // set type accordingly to anticipated content type
            xmlhttp.overrideMimeType('text/html');
        }
    }
    else if (window.ActiveXObject) { // IE
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            }
        }
    }
    if (!xmlhttp) {
        alert('Cannot create XMLHTTP instance');
        return false;
    }
}
function loadXMLDoc2() {
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        xmlhttp2 = new XMLHttpRequest();
        if (xmlhttp2.overrideMimeType) {
            // set type accordingly to anticipated content type
            // http_request.overrideMimeType('text/xml');
            xmlhttp2.overrideMimeType('text/html');
        }
    }
    else if (window.ActiveXObject) { // IE
        try {
            xmlhttp2 = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
            }
        }
    }
    if (!xmlhttp2) {
        alert('Cannot create XMLHTTP instance');
        return false;
    }
}
//************************* Owner Forget Password Inputs Check *****************************//
function validateforgetPassCheckInputs(obj) {

    if (validateEmptyField(document.getElementById("lgnUserId").value, "Please enter Login Id!") == false ||
            validateLength4(document.getElementById("lgnUserId").value, "Login Id should be minimum 4 characters length!") == false ||
            validateBlankField(document.getElementById("lgnUserId").value, "Enter Login Id", "Please enter Login Id!") == false) {
        document.getElementById("lgnUserId").focus();
        return false;
    }
    else if (validateEmptyField(document.getElementById("iPasswordHA").value, "Hint Answer") == false ||
            validateAlphaNumWithSpace(document.getElementById("iPasswordHA").value, "Accept only alpha or numeric characters with space characters!") == false ||
            validateBlankField(document.getElementById("iPasswordHA").value, "Hint Answer", "Please enter Password Hint Answer!") == false) {
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
function forgetPassCheckInputs(versionNo) {

    document.getElementById("ajax_loading_div").style.visibility = "visible";

    if (validateforgetPassCheckInputs(versionNo)) {

        var poststr = "lgnUserId=" + encodeURIComponent(document.getElementById("lgnUserId").value)
                + "&iPasswordHQ=" + encodeURIComponent(document.getElementById("iPasswordHQ").value)
                + "&iPasswordHA=" + encodeURIComponent(document.getElementById("iPasswordHA").value);

        forget_Pass_Check_Inputs(versionNo + "/include/php/omoofrpc.php", poststr);

    }
    else
    {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
    }
}
function navigation(versionNo, divPanel) {
    if (versionNo == 0 || versionNo == '' || versionNo == '0') {
        alert("We are unable to recognize your dongle, please insert your online munim dongle properly with the computer system!\n\n\
                हम आपके डोंगल को पहचानने में असमर्थ हैं, कृपया अपना ऑनलाइन मुनीम डोंगल कंप्यूटर में ठीक से लगाइए!");
        return false;
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ajax_loading_lg_div").style.visibility = "hidden";
                //document.barcode_search.barcode_text.focus();
                document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("ajax_loading_lg_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", versionNo + "/include/php/omppmsdv.php?divPanel=" + divPanel, true);
        xmlhttp.send();
    }
}
function getRepairTableAtLogin(versionNo) {
    confirm_box = confirm("Do you really want Repair Data Base?");//add variables of alert msgs @AUTHOR: SANDY29JAN14
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == 'Success') {
                    document.getElementById("dataRepairatLoginButt").innerHTML = "<span class='textLabel20CalibriNormalGreen'>Database has been Repaired Successfully. &nbsp; डेटाबेस की सफलतापूर्वक मरम्मत की गई है!</span>";
                }
                else {
                    document.getElementById("dataRepairatLoginButt").innerHTML = "<span class='textLabel20CalibriNormalRed'>" + xmlhttp.responseText + "</span>";
                }
            } else {
                document.getElementById("dataRepairatLoginButt").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        };

        xmlhttp.open("POST", versionNo + "/include/php/ommptbrl.php", true);
        xmlhttp.send();

    }
}
function validateLogin_UserId(field, alerttxt) {
    if (field == null || field == "" || field == 'Enter User Name') {
        //alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateLogin_Password(field, alerttxt) {
    if (field == null || field == "" || field == 'Enter Password') {
        //alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateLogin(versionNo) {
    if (versionNo == 0 || versionNo == '' || versionNo == '0') {
        alert("We are unable to recognize your dongle, please insert your online munim dongle properly with the computer system!\n\n\
                हम आपके डोंगल को पहचानने में असमर्थ हैं, कृपया अपना ऑनलाइन मुनीम डोंगल कंप्यूटर में ठीक से लगाइए!");
        return false;
    } else {
        if (validateLogin_UserId(document.getElementById("lgnUserId").value, "Please enter User Id!") == false ||
                document.getElementById("lgnUserId").value == 'Enter Login Id') {
            alert('Please enter User Id!');
            document.getElementById("lgnUserId").focus();
            return false;
        }
        else if (validateLogin_Password(document.getElementById("lgnPassword").value, "Please enter Password!") == false ||
                document.getElementById("lgnUserId").value == 'Enter Password') {
            alert('Please enter Password!');
            document.getElementById("lgnPassword").focus();
            return false;
        }

        return true;
    }
}
function updateOMDongle(dgHWId, versionNo) {
    if (dgHWId == 0 || dgHWId == '' || dgHWId == '0') {
        alert("We are unable to recognize your dongle, please insert your online munim dongle properly with the computer system!\n\n\
                हम आपके डोंगल को पहचानने में असमर्थ हैं, कृपया अपना ऑनलाइन मुनीम डोंगल कंप्यूटर में ठीक से लगाइए!");
    } else {
        versionNo = versionNo.replace('/', "");
        confirm_box = confirm("\t\t\t\t\t\t\t\tOnline Munim Dongle Update Process!\n" +
                "\t\t\t\t\t\t\t\t\tPRODUCT KEY - " + dgHWId +
                "\nBy clicking the 'Ok' button below, I certify that I have read and agree to the Online Munim 'Terms & Conditions'!");
        if (confirm_box == true)
        {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    //document.getElementById("ajax_loading_div").style.visibility = "hidden";
                    //document.getElementById("updateOMDongleButt").style.visibility = "visible";
                    document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("updateOMDongleButt").innerHTML = "<img src='images/ajaxSearch.png' style='vertical-align: middle;' />";
                    //document.getElementById("updateOMDongleDiv").style.visibility = "<img src='../images/printer32.png' />";
                    //document.getElementById("ajax_loading_div").style.visibility = "visible";
                }
            };

            xmlhttp.open("POST", versionNo + "/include/php/omssupdg.php", true);
            xmlhttp.send();
        }
    }
}
function validateIpassResetInputs(obj) {

    if (validateEmptyField(document.getElementById("Password").value, "Please enter Password!") == false ||
            validateLength8(document.getElementById("Password").value, "Password should be minimum 8 characters length!") == false) {
        document.getElementById("Password").focus();
        return false;
    }
    else if (validateEmptyField(document.getElementById("cnfrmPassword").value, "Please enter Confirm Password!") == false) {
        document.getElementById("cnfrmPassword").focus();
        return false;
    }
    else if (document.getElementById("Password").value != document.getElementById("cnfrmPassword").value) {
        alert("Passwords are not matched. Please re-enter passwords.");
        document.getElementById("Password").focus();
        return false;
    }
    else if (validateEmptyField(document.getElementById("iPassword").value, "Please enter i-Password!") == false ||
            validateLength8(document.getElementById("iPassword").value, "i-Password should be minimum 8 characters length!") == false) {
        document.getElementById("iPassword").focus();
        return false;
    }
    else if (validateEmptyField(document.getElementById("cnfrmIPassword").value, "Please enter Confirm i-Password!") == false) {
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
    else if (validateSelectField(document.getElementById("iPasswordHQ").value, "Please select Password Hint Question!") == false) {
        document.getElementById("iPasswordHQ").focus();
        return false;
    }
    else if (validateEmptyField(document.getElementById("iPasswordHA").value, "Please enter Password Hint Answer!") == false ||
            validateAlphaNumWithSpace(document.getElementById("iPasswordHA").value, "Accept only alpha or numeric characters with space characters!") == false) {
        document.getElementById("iPasswordHA").focus();
        return false;
    }

    return true;
}

function ipassReset(obj) {

    document.getElementById("ajax_loading_div").style.visibility = "visible";

    if (validateIpassResetInputs(obj)) {

        return true;
    }
    else
    {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        return false;
    }
}
//************************ Function Owner Product Activation Online ************************
function validateOwnProdActInputs(productKey) {

    if (validateEmptyField(productKey, "Please enter Product Key!") == false ||
            validateLengthExact8(productKey, "Product Key should be 8 characters length!") == false ||
            validateAlphaNum(productKey, "Accept only alpha or numeric characters without space character!") == false) {
        document.getElementById("productKey").focus();
        return false;
    }
    return true;
}
function owner_prod_act_online(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertOwnerProdActOnline;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}
function alertOwnerProdActOnline() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "visible";

    }

}
function ownerProdActOnline(productKey, versionNo) {
    document.getElementById("ajax_loading_div").style.visibility = "visible";

    if (validateOwnProdActInputs(productKey)) {
        var poststr = "productKey=" + encodeURIComponent(document.getElementById("productKey").value);

        owner_prod_act_online(versionNo + '/include/php/onoaodon.php', poststr);
    }
    else {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
    }
}
//********* Ads Navigation *****
var adnum = 6;
function adsNavigation() {
    if (adnum == 6) {
        url = "<a href='http://www.onlinemunim.com' target='_blank'><img src='2/images/ads/kirana-store-software.png' /></a>";
        adnum = 1;
    }
    else if (adnum == 5) {
        url = "<a href='http://www.softwaregen.com' target='_blank'><img src='2/images/ads/website-design-softwaregen.png' /></a>";
        adnum = adnum + 1;
    }
    else if (adnum == 4) {
        url = "<a href='http://www.onlinemunim.com' target='_blank'><img src='2/images/ads/mobile-shop-software.png' /></a>";
        adnum = adnum + 1;
    }
    else if (adnum == 3) {
        url = "<a href='http://www.softwaregen.com' target='_blank'><img src='2/images/ads/web-hosting-softwaregen.png' /></a>";
        adnum = adnum + 1;
    }
    else if (adnum == 2) {
        url = "<a href='http://www.onlinemunim.com' target='_blank'><img src='2/images/ads/ready-made-garments-billing-software.png' /></a>";
        adnum = adnum + 1;
    }
    else if (adnum == 1) {
        url = "<a href='http://www.omunim.com/' target='_blank'><img src='2/images/ads/medical-store-billing-software.png' /></a>";
        adnum = adnum + 1;
    }
    else {
        url = "<a href='http://www.softwaregen.com' target='_blank'><img src='2/images/ads/softwaregen-offers.png' /></a>";
        adnum = adnum + 1;
    }
    document.getElementById('newOmunimAdsDiv').innerHTML = url;
    setTimeout("adsNavigation()", 4000);
}
//********* Ads Navigation *****

function forgetPassEmailIdVeri(emailAdd, versionNo) {
    loadXMLDoc();
    //alert(versionNo);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            document.getElementById("emailAddressButt").style.visibility = "visible";
            if (xmlhttp.responseText == 'SUCCESS') {
                showForgetPassSecurityCodeDiv(versionNo, 'ForgetPassSecurityCode');
            } else if (xmlhttp.responseText == 'FAIL') {
                document.getElementById("emailVeriStatus").innerHTML = 'This email-id not registered with us! Please enter the registered email id!';
            } else {
                document.getElementById("emailVeriStatus").innerHTML = 'Please enter the correct email-id!';
            }

        } else {
            //alert(xmlhttp.responseText);
            document.getElementById("emailAddressButt").style.visibility = "hidden";
            document.getElementById("emailVeriStatus").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };

    xmlhttp.open("POST", versionNo + "/include/php/ommpemlv.php?emailAdd=" + emailAdd, true);
    xmlhttp.send();
}

function showForgetPassSecurityCodeDiv(versionNo, divPanel) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("mainSelectDiv").innerHTML = xmlhttp2.responseText;
        }
    };
    xmlhttp2.open("POST", versionNo + "/include/php/omppmsdv.php?divPanel=" + divPanel, true);
    xmlhttp2.send();
}

function forgetPassSecurityCodeVeri(securityCode, versionNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            document.getElementById("securityCodeButt").style.visibility = "visible";
            if (xmlhttp.responseText == 'SUCCESS') {
                showForgetPassResetDiv(versionNo, 'ForgetPassReset');
            } else {
                document.getElementById("securityCodeStatus").innerHTML = 'Please enter the correct security code!';
            }

        } else {
            document.getElementById("securityCodeButt").style.visibility = "hidden";
            document.getElementById("securityCodeStatus").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };

    xmlhttp.open("POST", versionNo + "/include/php/ommpsecv.php?securityCode=" + securityCode, true);
    xmlhttp.send();
}

function showForgetPassResetDiv(versionNo, divPanel) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("mainSelectDiv").innerHTML = xmlhttp2.responseText;
        }
    };
    xmlhttp2.open("POST", versionNo + "/include/php/omppmsdv.php?divPanel=" + divPanel, true);
    xmlhttp2.send();
}

function forgetPassReset(newPassword, confirmNewPassword, newMasterPassword, confirmNewMasterPassword, versionNo) {

    status = 'P';

    if (newPassword.length < 8 || newMasterPassword.length < 8) {
        status = 'F';
        document.getElementById("resetPasswordStatus").innerHTML = 'Password Length should be minimum 8 characters!';
    }

    if (newPassword != confirmNewPassword) {
        status = 'F';
        document.getElementById("resetPasswordStatus").innerHTML = 'New Passwords does not matched!';
    }

    if (newMasterPassword != confirmNewMasterPassword) {
        status = 'F';
        document.getElementById("resetPasswordStatus").innerHTML = 'New Master Passwords does not matched!';
    }

    if (newPassword == newMasterPassword) {
        status = 'F';
        document.getElementById("resetPasswordStatus").innerHTML = 'New Password and New Master Password should not be the same!';
    }

    if (status == 'P') {
        var poststr = "newPassword=" + encodeURIComponent(newPassword)
                + "&newMasterPassword=" + encodeURIComponent(newMasterPassword);

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //alert(xmlhttp.responseText);
                document.getElementById("resetPassButtDiv").style.visibility = "visible";
                if (xmlhttp.responseText == 'SUCCESS') {
                    showLoginPanelDiv(versionNo, 'passwordSuccessfullyUpdated');
                } else {
                    document.getElementById("resetPasswordStatus").innerHTML = 'Error! Please try again!';
                }

            } else {
                document.getElementById("resetPassButtDiv").style.visibility = "hidden";
                document.getElementById("resetPasswordStatus").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        };

        xmlhttp.open("POST", versionNo + "/include/php/ommppsrs.php?" + poststr, true);
        xmlhttp.send();
    }
}

function showLoginPanelDiv(versionNo, divPanel) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("mainSelectDiv").innerHTML = xmlhttp2.responseText;
        }
    };
    //showMess = "Password Reset Successfully!";
    xmlhttp2.open("POST", versionNo + "/include/php/omppmsdv.php?divPanel=" + divPanel, true);
    xmlhttp2.send();
}
//
function loginWithFingerScan(id, fingerId) {
    versionNo = '2';
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
//            alert(req.responseText);
            //document.getElementById("ajax_loading_lg_div").style.visibility = "hidden";
            if (id == "verifyButt") {
//                alert(str);
                var str = req.responseText;
//                alert(str);
                var strArray = new Array();
                strArray = str.split(":");
                if (strArray.length > 1) {
                    document.getElementById("ajax_loading_lg_div").style.visibility = "hidden";
                    var fileName = strArray[1];
                    var custIdArr = new Array();
                    custIdArr = fileName.split(".");
                    fingerId = custIdArr[0];
//                    alert(fingerId);
                    if (fingerId != '' || fingerId != null) {
                        goLoginByFingerScan(fingerId);
                    }
                } else {
                    document.getElementById('ajax_loading_lg_div').innerHTML = 'Finger Print Device Error OR Finger Prints Not Matched!';
                }
            }
            else {
                document.getElementById("ajax_loading_lg_div").style.visibility = "hidden";
            }
        } else {
            document.getElementById("ajax_loading_lg_div").style.visibility = "visible";
        }
    }

    if (id == "captureButt") {
        req.open("GET", versionNo + "/include/php/ommpfgsccapture.php?custId=" + fingerId, true);
    } else {
        req.open("GET", versionNo + "/include/php/ommpfgscverify.php?checkSession=NO", true);
    }
    req.send();
}
//
function goLoginByFingerScan(fingerId) {
    versionNo = '2';
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_lg_div").style.visibility = "hidden";
            window.location.href = xmlhttp.responseText;
        }
        else {
            document.getElementById("ajax_loading_lg_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", versionNo + "/include/php/owner/omolowlg.php?ownerId=" + fingerId, true);
    xmlhttp.send();
}