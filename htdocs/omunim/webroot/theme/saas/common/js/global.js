/* 
 * **************************************************************************************
 * @tutorial: 
 * **************************************************************************************
 * 
 * Created on 19-May-2020 1:45:05 pm
 *
 * @FileName: global.js
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim_mvc
 * @version 3.0.0
 * @Copyright (c) 2020 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2020 SoftwareGen Technologies
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
function loadXMLDoc() {
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        xmlhttp = new XMLHttpRequest();
        if (xmlhttp.overrideMimeType) {
            // set type accordingly to anticipated content type
            xmlhttp.overrideMimeType('text/html');
        }
    } else if (window.ActiveXObject) { // IE
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
    } else if (window.ActiveXObject) { // IE
        try {
            xmlhttp2 = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            }
        }
    }
    if (!xmlhttp2) {
        alert('Cannot create XMLHTTP instance');
        return false;
    }
}
function loadXMLDoc3() {
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        xmlhttp3 = new XMLHttpRequest();
        if (xmlhttp3.overrideMimeType) {
            // set type accordingly to anticipated content type
            // http_request.overrideMimeType('text/xml');
            xmlhttp3.overrideMimeType('text/html');
        }
    } else if (window.ActiveXObject) { // IE
        try {
            xmlhttp3 = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            }
        }
    }
    if (!xmlhttp3) {
        alert('Cannot create XMLHTTP instance');
        return false;
    }
}

function loadXMLDoc4() {
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        xmlhttp4 = new XMLHttpRequest();
        if (xmlhttp4.overrideMimeType) {
            // set type accordingly to anticipated content type
            // http_request.overrideMimeType('text/xml');
            xmlhttp4.overrideMimeType('text/html');
        }
    } else if (window.ActiveXObject) { // IE
        try {
            xmlhttp4 = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp4 = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            }
        }
    }
    if (!xmlhttp4) {
        alert('Cannot create XMLHTTP instance');
        return false;
    }
}
function changeDiv(httpHost, controller, actionMethod, dataParaOrForm, outputDiv) {
    //
    var url = httpHost + '/' + controller + '/' + actionMethod;
    //var name = 'love';
    //alert('Url: ' + url);
    if (dataParaOrForm != '') {
        $.post(url, dataParaOrForm, function (data) {
            $("#" + outputDiv).html(data);
        });
    } else {
        $.post(url, function (data) {
            $("#" + outputDiv).html(data);
        });
    }
}
//
function menuToggle() {
    var deviceWidth = window.innerWidth;
    if (deviceWidth < 767) {
        $.app.menu.toggle();
    } else {
        // DO NOTHING
    }
}
//
function headerMenuToggle() {
    var currentBreakpoint = Unison.fetch.now();

    // Init drilldown on small screen
    $.app.menu.drillDownMenu(currentBreakpoint.name);
}
//
function modifiedValueFloatLabels(element) {
    const $label = $(element).siblings('label');

    if ($(element).val().length > 0) {
        $label.addClass('active');
    } else {
        $label.removeClass('active');
    }
}
;
//
function calcLessWeightFunc() {
    //
    var gsWeight = parseFloat(document.getElementById('sttr_gs_weight').value).toFixed(3);
    var autoLessWeight = parseFloat(document.getElementById('sttr_auto_less_weight').value).toFixed(3);
    var lessWeight = parseFloat(document.getElementById('sttr_pkt_weight').value).toFixed(3);
    var gsWeightType = document.getElementById('sttr_gs_weight_type').value;
    //
    if (document.getElementById('sttr_pkt_weight_type').value == '' || document.getElementById('sttr_pkt_weight_type').value == 'NotSelected') {
        document.getElementById('sttr_pkt_weight_type').value = gsWeightType;
    }
    if (document.getElementById('sttr_nt_weight_type').value == '' || document.getElementById('sttr_nt_weight_type').value == 'NotSelected') {
        document.getElementById('sttr_nt_weight_type').value = gsWeightType;
    }
    //
    if (lessWeight == 'NaN' || lessWeight == '') {
        var lessWeight = 0.000;
        document.getElementById('sttr_pkt_weight').value = lessWeight;
    }
    //
    document.getElementById('sttr_nt_weight').value = parseFloat(gsWeight - autoLessWeight - lessWeight).toFixed(3);
    //
    modifiedValueFloatLabels(document.getElementById('sttr_pkt_weight'));
    modifiedValueFloatLabels(document.getElementById('sttr_nt_weight'));
    //
}
//
function googleSuggstionOnclickFunction(input_id, input_value) {
    var googleSuggListCounter = document.getElementById('googleSuggestionListCounter').value;
    var inputIdValueString = document.getElementById('googleSuggestionHiddenInputId' + googleSuggListCounter).value;
    var inputIdValueArray = new Array();
    inputIdValueArray = inputIdValueString.split("#");
    inputVal = inputIdValueArray[0];
    inputId = inputIdValueArray[1];
    document.getElementById(input_id).value = inputId;
    document.getElementById(input_value).value = inputVal;
    document.getElementById('autocomplete-items').style.visibility = "hidden";
    if (typeof (document.getElementById('googleSuugetionHiddenIdValue' + googleSuggListCounter)) != 'undefined' &&
            (document.getElementById('googleSuugetionHiddenIdValue' + googleSuggListCounter) != null)) {
        var hiddenInputIdValueString = document.getElementById('googleSuugetionHiddenIdValue' + googleSuggListCounter).value;
        var hiddenInputIdValueArray = new Array();
        hiddenInputIdValueArray = hiddenInputIdValueString.split("#");
        hiddenInputId = hiddenInputIdValueArray[0];
        hiddenInputVal = hiddenInputIdValueArray[1];
        document.getElementById(hiddenInputId).value = hiddenInputVal;
    }
}

function closeMsgDiv(div) {
    document.getElementById(div).style.display = "display";
    window.setTimeout(delayFunction, 1000);
    function delayFunction() {
        document.getElementById(div).style.display = "none";
    }
}
//alert('hiiiiiiiiiiiiiiiiii');
//var div_counter = 0;
//$('#div_add').click(function () {
//    alert('byeeeeeeeeee');
////        div_counter = div_counter + 1;
//    $('#secured_loan').append('#secured_loan_div');
//});


//$(document).ready(function () {
//
//    $(document).on('click', '#div_add', function () {
//        alert('byeeeeeeeeee');
//        $('#secured_loan').('#secured_loan_div');
//    });
//
//});

//    $(document).on('click'
//$(document).ready(function(){
//    //group add limit
//    var maxGroup = 10;
//    
//    //add more fields group
//    $(document).on('click', '#div_add', function (){
////        alert('hgfkghfjsgiltr');
//        if($('#secured_loan').find('#secured_loan_div').length < maxGroup){
//            var fieldHTML = $("#secured_loan_div").html();
//            $('#secured_loan').after(fieldHTML);
//        }else{
//            alert('Maximum '+maxGroup+' groups are allowed.');
//        }
//    });
//    
//    //remove fields group
//    $("body").on("click",".remove",function(){ 
//        $(this).parents(".fieldGroup").remove();
//    });
//});

function getaddcomponentblank(girv_itm_metal_typ, girv_itm_name, girv_itm_pieces, girv_itm_gross_weight, girv_itm_gross_weight_type, girv_itm_weight, girv_itm_weight_type, girv_itm_tunch_id, girv_itm_fine_weight, girv_itm_valuation) {
    $.ajax({
        type: "POST",
        url: "secured_loan.html",
        data: {girv_itm_metal_typ: girv_itm_metal_typ, girv_itm_name: girv_itm_name, girv_itm_pieces: girv_itm_pieces, girv_itm_gross_weight: girv_itm_gross_weight, girv_itm_gross_weight_type: girv_itm_gross_weight_type, girv_itm_weight: girv_itm_weight, girv_itm_weight_type: girv_itm_weight_type, girv_itm_tunch_id: girv_itm_tunch_id, girv_itm_fine_weight: girv_itm_fine_weight, girv_itm_valuation: girv_itm_valuation},
        success: function (data) {
            $("#secured_loan_div").html(data);
//            alert(data);
        }
    });
}
//
function updateOMDongle(dgHWId, versionNo, HTTP_HOST) {
    confirm_box = confirm("Online Munim Dongle Update Process!\n" +
            "\nPRODUCT KEY - " + dgHWId +
            "\n\nBy clicking the 'Ok' button below, I certify that I have read and agree to the Online Munim 'Terms & Conditions'!");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //document.getElementById("ajax_loading_div").style.visibility = "hidden";
                //document.getElementById("updateOMDongleButt").style.visibility = "visible";
                document.getElementById("login_division").innerHTML = xmlhttp.responseText;
            } else {
//                document.getElementById("updateSoftwareWithoutDongleDiv").innerHTML = "<img src='images/ajaxSearch.png' style='vertical-align: middle;' />";
                document.getElementById("updateSoftwareWithoutDongleDiv").innerHTML = `<div class="load-wrapp1" >
                        <div class="load-3">
                            <div class="line-load"></div>
                            <div class="line-load"></div>
                            <div class="line-load"></div>
                        </div>
                    </div>`;
                //document.getElementById("updateOMDongleDiv").style.visibility = "<img src='../images/printer32.png' />";
                //document.getElementById("ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", HTTP_HOST + "/2/include/php/system/omssupdg.php", true);
        xmlhttp.send();
    }
}
// Start Code to Update Software Update @LOVE29JUL2014
function updateSoftwareWithoutDongleForm(versionNo, prodKey, loginId, HTTP_HOST)
{
    //alert('HTTP_HOST: ' + HTTP_HOST);
    if (prodKey == '' || prodKey == null) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("showUpdateSoftwareWithoutDongleDiv").style.visibility = "visible";
                document.getElementById("showUpdateSoftwareWithoutDongleDiv").innerHTML = xmlhttp.responseText;
                document.getElementById('prodKey').focus();
                //document.getElementById("ajax_loading_div").style.visibility = "hidden";
            } else {
                //document.getElementById("ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", HTTP_HOST + "/2/include/php/omppdwfr.php?versionNo=" + versionNo, true);
        xmlhttp.send();
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //alert(xmlhttp.responseText);
                document.getElementById("login_division").innerHTML = xmlhttp.responseText;
            } else {
                //document.getElementById("showUpdateSoftwareWithoutDongleDiv").style.visibility = "hidden";
//                document.getElementById("updateSoftwareWithoutDongleDiv").innerHTML = "<img src='images/ajaxSearch.png' class='img-center' />";
                document.getElementById("updateSoftwareWithoutDongleDiv").innerHTML = `<div class="load-wrapp1" >
                        <div class="load-3">
                            <div class="line-load"></div>
                            <div class="line-load"></div>
                            <div class="line-load"></div>
                        </div>
                    </div>`;
            }
        };
        xmlhttp.open("POST", HTTP_HOST + "/2/include/php/system/omssupdg.php?prodKey=" + prodKey + "&loginId=" + loginId, true);
        xmlhttp.send();
    }
}
function closeUpdateSoftwareWithoutDongleDiv() {
    document.getElementById("showUpdateSoftwareWithoutDongleDiv").style.visibility = "hidden";
    document.getElementById("showUpdateSoftwareWithoutDongleDiv").innerHTML = "";
}
function updateSoftwareWithoutDongle(prodKey, loginId, versionNo, documentRoot)
{
    //alert('documentRoot: ' + documentRoot);
    if (validateProdKeyField()) {
        loadXMLDoc2();
        xmlhttp2.onreadystatechange = function () {
            if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                document.getElementById("login_division").innerHTML = xmlhttp2.responseText;
            } else {
                //document.getElementById("showUpdateSoftwareWithoutDongleDiv").style.visibility = "hidden";
//                document.getElementById("updateSoftwareWithoutDongleDiv").innerHTML = "<img src='images/ajaxSearch.png' class='img-center' />";
                document.getElementById("updateSoftwareWithoutDongleDiv").innerHTML = `<div class="load-wrapp1" >
                        <div class="load-3">
                            <div class="line-load"></div>
                            <div class="line-load"></div>
                            <div class="line-load"></div>
                        </div>
                    </div>`;
            }
        };
        xmlhttp2.open("POST", documentRoot + "/include/php/system/omssupdg.php?prodKey=" + prodKey + "&loginId=" + loginId, true);
        xmlhttp2.send();
    }
}
function validateProdKeyField() {
    if (document.getElementById('prodKey').value == '' || document.getElementById('prodKey').value == null || document.getElementById('prodKey').value == ' Product Key') {
        alert("Please enter product key!");
        document.getElementById('prodKey').focus();
        return false;
    } else if (document.getElementById('loginId').value == '' || document.getElementById('loginId').value == null || document.getElementById('loginId').value == ' Login Id') {
        alert("Please enter login Id!");
        document.getElementById('loginId').focus();
        return false;
    }
    return true;
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
                //document.getElementById("ajax_loading_lg_div").style.visibility = "hidden";
                //document.barcode_search.barcode_text.focus();
                document.getElementById("login_division").innerHTML = xmlhttp.responseText;
            } else {
                //document.getElementById("ajax_loading_lg_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "2/include/php/omppmsdv.php?divPanel=" + divPanel, true);
        xmlhttp.send();
    }
}
function loginWithFingerScan(id, fingerId) {
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
                    //document.getElementById("ajax_loading_lg_div").style.visibility = "hidden";
                    var fileName = strArray[1];
                    var custIdArr = new Array();
                    custIdArr = fileName.split(".");
                    fingerId = custIdArr[0];
//                    alert(fingerId);
                    if (fingerId != '' || fingerId != null) {
                        goLoginByFingerScan(fingerId);
                    }
                } else {
                    document.getElementById('oMunimHeadMainMessSubDiv').innerHTML = 'Finger Print Device Error OR Finger Prints Not Matched!';
                }
            } else {
                //document.getElementById("ajax_loading_lg_div").style.visibility = "hidden";
            }
        } else {
            //document.getElementById("ajax_loading_lg_div").style.visibility = "visible";
        }
    }

    if (id == "captureButt") {
        req.open("GET", "2/include/php/ommpfgsccapture.php?custId=" + fingerId, true);
    } else {
        req.open("GET", "2/include/php/ommpfgscverify.php?checkSession=NO", true);
    }
    req.send();
}
//
function goLoginByFingerScan(fingerId) {
    //alert(fingerId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("ajax_loading_lg_div").style.visibility = "hidden";
            window.location.href = xmlhttp.responseText;
        } else {
            //document.getElementById("ajax_loading_lg_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "2/include/php/owner/omolowlg.php?ownerId=" + fingerId, true);
    xmlhttp.send();
}
//
function forgetPassEmailIdVeri(emailAdd, versionNo) {
    //alert(emailAdd);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            //document.getElementById("emailAddressButt").style.visibility = "visible";
            if (xmlhttp.responseText == 'SUCCESS') {
                showForgetPassSecurityCodeDiv(versionNo, 'ForgetPassSecurityCode');
            } else if (xmlhttp.responseText == 'FAIL') {
                document.getElementById("oMunimHeadMainMessSubDiv").innerHTML = 'This email-id not registered with us! Please enter the registered email id!';
            } else {
                document.getElementById("oMunimHeadMainMessSubDiv").innerHTML = 'Please enter the correct email-id!';
            }

        } else {
            //document.getElementById("emailAddressButt").style.visibility = "hidden";
            //document.getElementById("emailVeriStatus").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };

    xmlhttp.open("POST", "2/include/php/ommpemlv.php?emailAdd=" + emailAdd, true);
    xmlhttp.send();
}
function showForgetPassSecurityCodeDiv(versionNo, divPanel) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("login_division").innerHTML = xmlhttp2.responseText;
        }
    };
    xmlhttp2.open("POST", "2/include/php/omppmsdv.php?divPanel=" + divPanel, true);
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
                document.getElementById("oMunimHeadMainMessSubDiv").innerHTML = 'Please enter the correct security code!!';
            }

        } else {
            document.getElementById("securityCodeButt").style.visibility = "hidden";
            document.getElementById("oMunimHeadMainMessSubDiv").innerHTML = "<img src='images/ajaxLoad.gif' class='img-center' />";
        }
    };

    xmlhttp.open("POST", "2/include/php/ommpsecv.php?securityCode=" + securityCode, true);
    xmlhttp.send();
}
function showForgetPassResetDiv(versionNo, divPanel) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("login_division").innerHTML = xmlhttp2.responseText;
        }
    };
    xmlhttp2.open("POST", "2/include/php/omppmsdv.php?divPanel=" + divPanel, true);
    xmlhttp2.send();
}

function forgetPassReset(newPassword, confirmNewPassword, versionNo) {

    status = 'P';

    if (newPassword.length < 8) {
        status = 'F';
        document.getElementById("resetPasswordStatus").innerHTML = 'Password Length should be minimum 8 characters!';
    }

    if (newPassword != confirmNewPassword) {
        status = 'F';
        document.getElementById("resetPasswordStatus").innerHTML = 'New Passwords does not matched!';
    }


    if (status == 'P') {
        var poststr = "newPassword=" + encodeURIComponent(newPassword);

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //alert(xmlhttp.responseText);
                //document.getElementById("resetPassButtDiv").style.visibility = "visible";
                if (xmlhttp.responseText == 'SUCCESS') {
                    showLoginPanelDiv(versionNo, 'passwordSuccessfullyUpdated');
                } else {
                    document.getElementById("oMunimHeadMainMessSubDiv").innerHTML = 'Error! Please try again!';
                }

            } else {
                //document.getElementById("resetPassButtDiv").style.visibility = "hidden";
                document.getElementById("oMunimHeadMainMessSubDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        };

        xmlhttp.open("POST", "2/include/php/ommppsrs.php?" + poststr, true);
        xmlhttp.send();
    }
}

function showLoginPanelDiv(versionNo, divPanel) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("login_division").innerHTML = xmlhttp2.responseText;
        }
    };
    //showMess = "Password Reset Successfully!";
    xmlhttp2.open("POST", "2/include/php/ompllfdv.php?divPanel=" + divPanel, true);
    xmlhttp2.send();
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
function validateLogin_Mobile(field, alerttxt) {
    if (field == null || field == "" || field == 'Enter Mobile Number' || field.length < 10) {
        //alert(alerttxt);
        return false;
    } else {
        return true;
    }
}

function validateLogin(obj) {

    if (validateLogin_UserId(document.getElementById("lgnUserId").value, "Please enter User Id!") == false ||
            document.getElementById("lgnUserId").value == 'Enter Login Id') {
        alert('Please enter User Id!');
        document.getElementById("lgnUserId").focus();
        return false;
    } else if (typeof (document.getElementById('lgnPassword')) != 'undefined' &&
            document.getElementById('lgnPassword') != null) {
        //
        if (validateLogin_Password(document.getElementById("lgnPassword").value, "Please enter Password!") == false ||
                document.getElementById("lgnPassword").value == 'Enter Password') {
            alert('Please enter Password!');
            document.getElementById("lgnPassword").focus();
            return false;
        }
    } else if (typeof (document.getElementById('lgnMobileNo')) != 'undefined' &&
            document.getElementById('lgnMobileNo') != null) {
        //
        if (validateLogin_Mobile(document.getElementById("lgnMobileNo").value, "Please enter Mobile Number!") == false ||
                document.getElementById("lgnMobileNo").value == 'Enter Mobile Number') {
            //
            var mobileNo = document.getElementById("lgnMobileNo").value;
            if (mobileNo.length < 10) {
                alert('Mobile Number should be minimum 10 digits!');
            } else {
                alert('Please enter Mobile Number!');
            }
            document.getElementById("lgnMobileNo").focus();
            return false;
        }
    }

    return true;
}
//***************************************************************************************************************************
//START CODE FOR SHOW PASSWORD : AUTHOR @DARSHANA 2 FEB 2022
//****************************************************************************************************************************
function showPassword(HTTP_HOST_WEBROOT) {
    const togglePassword = document.querySelector('#togglePassword');

    const password = document.querySelector('#lgnPassword');
    const newPassword = document.querySelector('#newPassword');
    const confirmNewPassword = document.querySelector('#confirmNewPassword');
//    togglePassword.addEventListener('click', () => {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);

    const typeNew = newPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    newPassword.setAttribute('type', typeNew);

    const typeNewConfirm = confirmNewPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmNewPassword.setAttribute('type', typeNewConfirm);

    if (togglePassword.src.match(HTTP_HOST_WEBROOT + "/theme/saas/common/img/Eye-Image.png")) {
        togglePassword.src = HTTP_HOST_WEBROOT + "/theme/saas/common/img/eye-slash.png";
    } else {
        togglePassword.src = HTTP_HOST_WEBROOT + "/theme/saas/common/img/Eye-Image.png";
    }
//    });
}
//***************************************************************************************************************************
//END CODE FOR SHOW PASSWORD : AUTHOR @DARSHANA 2 FEB 2022
//****************************************************************************************************************************
//
//START CODE FOR START YOUR FREE TRIAL FORM IN LOGIN FORM : AUTHOR @ASHWINI 23JULY 2024
function validateName(inputElement) {
    const re = /^[a-zA-Z\s]*$/;
    inputElement.value = inputElement.value.replace(/[^a-zA-Z\s]/g, '');
    return re.test(inputElement.value);
}

function validateEmail(email) {
    const re = /^[a-zA-Z0-9._]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(email);
}

function validatePhone(inputElement) {
     const re = /^[789][0-9]{9}$/;
    inputElement.value = inputElement.value.replace(/[^0-9]/g, '');
    return re.test(inputElement.value);
}

function generateCaptchaText(length = 6) {
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let captchaText = '';
    for (let i = 0; i < length; i++) {
        captchaText += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return captchaText;
}

function drawCaptcha(captchaText) {
    const canvas = document.getElementById('captchaCanvas');
    const ctx = canvas.getContext('2d');

    // Define a top margin for the text
    const textMarginTop = 7; // Adjust the value as needed

    const textColors = ["rgb(0,0,0)", "rgb(130,130,130)"];
    const randomNumber = (min, max) =>
        Math.floor(Math.random() * (max - min + 1) + min);

    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.font = '22px Arial';
    ctx.textBaseline = "middle";

    for (let i = 0; i < captchaText.length; i++) {
        const letterSpace = 110 / captchaText.length;
        const xInitialSpace = 7;

        ctx.save();
        ctx.translate(xInitialSpace + i * letterSpace, randomNumber(12, 24) + textMarginTop);

        if (i % 2 === 0)
            ctx.rotate(-16 * Math.PI / 180);
        else
            ctx.rotate(16 * Math.PI / 180);

        ctx.fillText(captchaText[i], 0, 0);
        ctx.restore();
    }
}

function initCaptcha() {
    const captchaText = generateCaptchaText();
    sessionStorage.setItem('captchaText', captchaText);
    drawCaptcha(captchaText);
}

 function checkCaptcha() {
        const userInput = document.getElementById('captchaAns');
        const captchaValidIcon = document.getElementById("captchaValidIcon");
        const storedCaptchaText = sessionStorage.getItem('captchaText');
        if (userInput.value.length >= 6) {
            if (userInput.value === storedCaptchaText) {
            captchaValidIcon.style.display = 'block'; // Show the icon
                return true;
            } else {
            captchaValidIcon.style.display = 'none'; // Hide the icon
                initCaptcha();
                userInput.value = '';
                return false;
            }
        } else {
        captchaValidIcon.style.display = 'none'; // Hide the icon
            return false;
        }
    }

document.addEventListener("DOMContentLoaded", function () {
    initCaptcha();
});

function validateForm() {
        const nameElement = document.getElementById('lgname');
        const email = document.getElementById('lgemailid').value.trim();
        const phoneElement = document.getElementById('lgmobileno');
        const name = nameElement.value.trim();
        const phone = phoneElement.value.trim();
        if (!validateName(nameElement)) {
            alert('Please enter a valid name.');
            return false;
        }
        if (!validateEmail(email)) {
            alert('Please enter a valid email.');
            return false;
        }
        if (!validatePhone(phoneElement)) {
            if (phone.length < 10) {
                alert('Please enter 10 digits.');
            } else {
                alert('Please enter a valid number.');
            }
            return false;
        }
        if (!checkCaptcha()) {
            alert('Please enter a valid captcha.');
            return false;
        }
        visitorapi();
        showOtpForm();
        const myModal = new bootstrap.Modal(document.getElementById('myModal'));
        myModal.show();
        setTimeout(() => {
            document.getElementById('verifymobileno').value = phone;
        }, 100);

    }
function visitorapi() {
    const phone = document.getElementById('lgmobileno').value.trim();
    loadXMLDoc();
    const data = `request_type=verifyotpforvisitor&phone=${encodeURIComponent(phone)}`;
    xmlhttp.open('POST', '/views/product/jewellery_software/omvisitorapi.php');
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(data);
}
function showOtpForm() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("demoFormContent").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open('POST', '/views/product/jewellery_software/omverifyotp.html');
    xmlhttp.send();
}
function validateOtp(inputElement) {
    const re = /^[0-9]{0,4}$/;
    inputElement.value = inputElement.value.replace(/[^0-9]/g, '').substring(0, 4);
    return re.test(inputElement.value);
}
function resendotpofvisitor() {
    var phone = document.getElementById('verifymobileno').value.trim();
    loadXMLDoc();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("displayresendmsg").innerHTML = "OTP resent to the phone:" + phone;
        }
    };
    const data = `request_type=resendotp&phone=${encodeURIComponent(phone)}`;
    xmlhttp.open('POST', '/views/product/jewellery_software/omvisitorapi.php', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(data);
}
function closeModal() {
    $("#closebtm").click();
}
function showThankyouForm() {
    $("#loadingModalButton").click();
    setTimeout(function () {
        $('#ThankyouModal').modal('hide');
    }, 3000);
}
function verifyotpofvisitor() {
    const phone = document.getElementById('verifymobileno').value.trim();
    const otp = document.getElementById('verifyotp').value.trim();
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("displaymsg").innerHTML = xmlhttp.responseText;
            if (xmlhttp.responseText.trim() === 'OtpVerified') {
                closeModal();
                showThankyouForm();
            }
        }
    };
    const data = `request_type=visitorotpverify&phone=${encodeURIComponent(phone)}&otp=${encodeURIComponent(otp)}`;
    xmlhttp.open('POST', '/views/product/jewellery_software/omvisitorapi.php', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(data);
}
//END CODE FOR START YOUR FREE TRIAL FORM IN LOGIN FORM : AUTHOR @ASHWINI 23JULY 2024