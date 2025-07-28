/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/***********Start Code To Select FirmId In Account Balance Details Panel @AUTHOR: GAUR11JAN16********/
function getAccBalDetailsByFirmName(firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("accBalDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var postYear = encodeURIComponent(document.get_account_balance_sheet_form.balanceSheetYear.value);
    xmlhttp.open("POST", "include/php/omaccbal" + default_theme + ".php?firmId=" + firmId + "&postYear=" + postYear, true);
    xmlhttp.send();
}
/***********END Code To Select FirmId In Account Balance Details Panel @AUTHOR: GAUR11JAN16********/

/***********Start Code To Select FirmId In Old Metal Firm Panel @AUTHOR: BAJRANG14JAN19********/
function getOldMetalDetailsByFirmName(firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("MeltingTransactionsListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogrmmelting" + default_theme + ".php?firmId=" + firmId, true);
    xmlhttp.send();
}
/***********END Code To Select FirmId In Old Metal Firm Panel @AUTHOR: GAUR14JAN19********/

/***********Start Code To Select Year In Account Balance Details Panel @AUTHOR: GAUR29DEC15********/
function getAccBalDate(balanceSheetYear) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("accBalDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omaccbal" + default_theme + ".php?firmId=" + balanceSheetYear, true);
    xmlhttp.send();
}
/***********END Code To Select Year In Account Balance Details Panel @AUTHOR: GAUR29DEC15********/

/**********Start to add function showCountBal @AUTHOR: GAUR26DEC15****************/
function showCountBal() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("accountListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omaccbal" + default_theme + ".php", true);
    xmlhttp.send();
}
/**********End to add function showCountBal @AUTHOR: GAUR26DEC15****************/

/***********Start Code To Select Year In Account Balance Details Panel @AUTHOR: GAUR30DEC15********/
function valAccGetYearInputs() {
    if (validateSelectField(document.get_account_balance_sheet_form.balanceSheetYear.value, "Please select Year!") == false) {
        document.get_account_balance_sheet_form.balanceSheetYear.focus();
        return false;
    }
    return true;
}

function accGetYear() {
    if (valAccGetYearInputs()) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("accBalDetails").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        var postYear = encodeURIComponent(document.get_account_balance_sheet_form.balanceSheetYear.value);
        var firmId = encodeURIComponent(document.get_account_balance_sheet_form.selFirmId.value);
        xmlhttp.open("POST", "include/php/omaccbal" + default_theme + ".php?postYear=" + postYear + "&firmId=" + firmId, true);
        xmlhttp.send();
    }
}
/***********END Code To Select Year In Account Balance Details Panel @AUTHOR: GAUR30DEC15********/

/***********Start Code To Select TextBox value In Account Balance Details Panel @AUTHOR: GAUR22MAR16********/
function jrmnUpdate(opBal, drAmt, crAmt, clBal, accID, selFirmId, finStartYear, finEndYear, drAccId, crAccId, accId, jrmnAccId, opBalSelectType, clBalSelectType, jrmnId) {
    var poststr = "opBal=" + opBal +
            "&drAmt=" + drAmt +
            "&crAmt=" + crAmt +
            "&clBal=" + clBal +
            "&accId=" + accID +
            "&selFirmId=" + selFirmId +
            "&finStartYear=" + finStartYear +
            "&finEndYear=" + finEndYear +
            "&drAccId=" + drAccId +
            "&crAccId=" + crAccId +
            "&accId=" + accId +
            "&jrmnAccId=" + jrmnAccId +
            "&opBalSelectType=" + opBalSelectType +
            "&clBalSelectType=" + clBalSelectType +
            "&jrmnId=" + jrmnId +
            "&panelName=accBalUpdatePanel";
    jrmn_update("include/php/ommpjrmn" + default_theme + ".php", poststr);
}

function jrmn_update(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertjrmnUpdate;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertjrmnUpdate() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("accBalDetails").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/***********END Code To Select TextBox In Account Balance Details Panel @AUTHOR: GAUR22MAR16********/
/**********Start to add function add loan accounat Bal @AUTHOR: GAUR7JAN16****************/

/**********Start to add function add loan accounat Bal @AUTHOR: GAUR12JAN16****************/
function addLoanAccBal(opBal, drAmt, crAmt, clBal, accID, selFirmId, finStartYear, finEndYear, drAccId, crAccId, accId, jrmnAccId, opBalSelectType, clBalSelectType, jrmnId) {

    var poststr = "opBal=" + opBal +
            "&drAmt=" + drAmt +
            "&crAmt=" + crAmt +
            "&clBal=" + clBal +
            "&accId=" + accID +
            "&girviFirmId=" + selFirmId +
            "&finStartYear=" + finStartYear +
            "&finEndYear=" + finEndYear +
            "&drAccId=" + drAccId +
            "&crAccId=" + crAccId +
            "&accId=" + accId +
            "&jrmnAccId=" + jrmnAccId +
            "&opBalSelectType=" + opBalSelectType +
            "&clBalSelectType=" + clBalSelectType +
            "&jrmnId=" + jrmnId;
//    alert(poststr);
    add_loan("include/php/omaccssr" + default_theme + ".php", poststr);
}

function add_loan(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertaddLoanAccBal;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertaddLoanAccBal() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("accBalDetails").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//function addLoanAccBal() {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    xmlhttp.open("POST", "include/php/omaccssr"+ default_theme +".php", true);
//    xmlhttp.send();
//}
/**********End to add function add loan accounat Bal @AUTHOR: GAUR12JAN16****************/
/**********End to add function add loan accounat Bal @AUTHOR: GAUR7JAN16****************/
//function showAddWhStockPanel(panel) {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;  //change in div name @AUTHOR: SANDY25SEP13
//        }
//        else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    if (panel == 'PurchaseList')
//        xmlhttp.open("POST", "include/php/ogwaprlt"+ default_theme +".php?panel=" + panel, true);
//    else if (panel == 'StockList')
//        xmlhttp.open("POST", "include/php/ogwastlt"+ default_theme +".php?panel=" + panel, true);
//    else
//        xmlhttp.open("POST", "include/php/ogadstoc"+ default_theme +".php?panel=" + panel, true);
//    xmlhttp.send();
//}
/********************** Start Direct Add New Customer For The Account Balance Panel to Add the Loan  @Author: GAUR08JAN16*******************************/
function valDirectAddCustForLoanInputs() {
    if (validateEmptyField(document.getElementById("custFirstNameForAddGirvi").value, "Please enter First Name!") == false ||
            validateAlphaWithSpace(document.getElementById("custFirstNameForAddGirvi").value, "Accept only alpha characters!") == false) {
        document.getElementById("custFirstNameForAddGirvi").focus();
        return false;
    } else if ((document.getElementById("custLastNameForAddGirvi").value != '') &&
            (validateAlphaWithSpace(document.getElementById("custLastNameForAddGirvi").value, "Accept only alpha characters!") == false)) {
        document.getElementById("custLastNameForAddGirvi").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("custFatherNameForAddGirvi").value, "Please enter Father's Name!") == false ||
            validateAlphaWithSpace(document.getElementById("custFatherNameForAddGirvi").value, "Accept only alpha characters!") == false) {
        document.getElementById("custFatherNameForAddGirvi").focus();
        return false;
    } else if (validateSelectField(document.getElementById("custCityForAddGirvi").value, "Please select City Name!") == false) {
        document.getElementById("custCityForAddGirvi").focus();
        return false;
    } else if (validateSelectField(document.getElementById("girviFirmId").value, "Please select Firm Name!") == false) {
        document.getElementById("girviFirmId").focus();
        return false;
    } else if (((document.getElementById("mobileNoToAddGirvi").value != 'Enter Mobile Number') && (document.getElementById("mobileNoToAddGirvi").value != ''))
            && ((validateNum(document.getElementById("mobileNoToAddGirvi").value, "Accept only Numbers without space character!") == false ||
                    validateLength10(document.getElementById("mobileNoToAddGirvi").value, "Mobile number length should be minimum 10!") == false))) {
        document.getElementById("mobileNoToAddGirvi").focus();
        return false;
    }
    return true;
}
function direct_add_cust_for_loan(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertDirectAddCust;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertDirectAddCustForLoan() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    }
}
function directAddCustForLoan() {

    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    document.getElementById("directAddCustButton").style.visibility = "hidden";
    var genderObj = document.getElementsByName('gender');
    for (var i = 0; i < genderObj.length; i++) {
        if (genderObj[i].checked == true)
            gender = genderObj[i].value;
    }

    if (valDirectAddCustForLoanInputs()) {

        var poststr = "firstName=" + encodeURIComponent(document.getElementById("custFirstNameForAddGirvi").value)
                + "&lastName=" + encodeURIComponent(document.getElementById("custLastNameForAddGirvi").value)
                + "&fatherOrSpouseName=" + encodeURIComponent(document.getElementById("custFatherNameForAddGirvi").value)
                + "&fatherOrSpouseNameIndicator=" + encodeURIComponent(document.getElementById("fatherOrSpouseNameIndicator").value)
                + "&sex=" + encodeURIComponent(gender)
                + "&mobileNoToAddGirvi=" + encodeURIComponent(document.getElementById("mobileNoToAddGirvi").value)
                + "&city=" + encodeURIComponent(document.getElementById("custCityForAddGirvi").value)
                + "&firmId=" + encodeURIComponent(document.getElementById("girviFirmId").value)
                + "&jrmnId=" + encodeURIComponent(document.getElementById("jrmnId").value)
                + "&jrmnStartYr=" + encodeURIComponent(document.getElementById("jrmnStartYr").value)
                + "&jrmnEndYr=" + encodeURIComponent(document.getElementById("jrmnEndYr").value)
                + "&accId=" + encodeURIComponent(document.getElementById("accId").value)
                + "&opBalCust=" + encodeURIComponent(document.getElementById("opBalCust").value)
                + "&clBalCust=" + encodeURIComponent(document.getElementById("clBalCust").value)
                + "&crAmtCust=" + encodeURIComponent(document.getElementById("crAmtCust").value)
                + "&drAmtCust=" + encodeURIComponent(document.getElementById("drAmtCust").value)
                + "&panelName=" + encodeURIComponent("AccBalance")
                + "&directAddCust=" + encodeURIComponent("YES");
//        alert(poststr);
        direct_add_cust_for_loan('include/php/omcaadcs' + default_theme + '.php', poststr);
    } else
    {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
        document.getElementById("directAddCustButton").style.visibility = "visible";
    }
}
/********************** End Direct Add New Customer For The Account Balance Panel to Add the Loan  @Author: GAUR08JAN16*******************************/

/************************************************START CHANGE IN CODE @Author :GAUR03APR16****************************************************/

function addGirivToLoanPanel() {
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
//End to change code to add condition for girvi date @Author:SHRI31MAR15
    if (datesDiff < 0) {
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
        if (girviType == 'OpenGirvi') {
            itemEntered = 0;
            if (validateAddGirviInputsForLoan()) {
                document.getElementById("itemEntered").value = itemEntered;
//                alert(document.getElementById("itemEntered").value);
                return true;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addGirviSubButDiv").style.visibility = "visible";
                return false;
            }
        } else {
            if (validateAddPacketInputsForLoan()) {
                return true;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addGirviSubButDiv").style.visibility = "visible";
                return false;
            }
        }
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        document.getElementById("addGirviSubButDiv").style.visibility = "visible";
//        return false;
        return true;
    }

}
function openAccBalPanel(panelNameCustLoan) {
    if (addGirivToLoanPanel()) {
        var poststr;
        var poststrItem = '';
        var girviType = encodeURIComponent(document.getElementById("girviType").value);
        if (girviType == 'OpenGirvi') {
            var itemEntered = encodeURIComponent(document.getElementById("itemEntered").value);
//            itemNames = "";
//            itemLength = document.open_loan.itemName.length;
//            itemCounter = 0;
//            for (i = 0; i < itemLength; i++) {
//                if (document.open_loan.itemName[i].selected == true && itemCounter % 2 == 0) {
//                    itemNames += document.open_loan.itemName[i].value + ", ";
//                    itemCounter++;
//                }
//                else if (document.open_loan.itemName[i].selected == true && itemCounter % 2 != 0) {
//                    itemNames += "<font color=blue>" + document.open_loan.itemName[i].value + "</font>" + ", ";
//                    itemCounter++;
//                }
//            }
//
//            itemNames = itemNames.slice(0, -2);
//grossItemWeight
            for (var i = 1; i <= itemEntered; i++) {
                if (document.getElementById("itemType" + i).value != 'Other') {
                    poststrItem = poststrItem + "&itemName" + i + "=" + encodeURIComponent(document.getElementById("itemName" + i).value)
                            + "&itemType" + i + "=" + encodeURIComponent(document.getElementById("itemType" + i).value)
                            + "&itemPieces" + i + "=" + encodeURIComponent(document.getElementById("itemPieces" + i).value)
                            + "&grossWeight" + i + "=" + encodeURIComponent(document.getElementById("grossWeight" + i).value)
                            + "&grossWeightType" + i + "=" + encodeURIComponent(document.getElementById("grossWeightType" + i).value)
                            + "&itemWeight" + i + "=" + encodeURIComponent(document.getElementById("itemWeight" + i).value)
                            + "&weightType" + i + "=" + encodeURIComponent(document.getElementById("weightType" + i).value)
                            + "&itemTunch" + i + "=" + encodeURIComponent(document.getElementById("itemTunch" + i).value);
//                            + "&addMoreItem=" + encodeURIComponent(girviMoreItem);
                } else {
                    poststrItem = poststrItem + "&itemName" + i + "=" + encodeURIComponent(document.getElementById("itemName" + i).value)
                            + "&itemType" + i + "=" + encodeURIComponent(document.getElementById("itemType" + i).value)
                            + "&itemPieces" + i + "=" + encodeURIComponent(document.getElementById("itemPieces" + i).value);
//                            + "&addMoreItem=" + encodeURIComponent(girviMoreItem);
                }
            }
        }
        poststr = "custId=" + encodeURIComponent(document.getElementById("custId").value) +
                "&girviFirmId=" + encodeURIComponent(document.getElementById("girviFirmId").value) +
                "&jrmnId=" + encodeURIComponent(document.getElementById("jrmnId").value) +
                "&jrmnStartYr=" + encodeURIComponent(document.getElementById("jrmnStartYr").value) +
                "&jrmnEndYr=" + encodeURIComponent(document.getElementById("jrmnEndYr").value) +
                "&accId=" + encodeURIComponent(document.getElementById("accId").value) +
                "&selROI=" + encodeURIComponent(document.getElementById("selROI").value) +
                "&selROIValue=" + encodeURIComponent(document.getElementById("selROIValue").value) +
                "&interestType=" + encodeURIComponent(document.getElementById("interestType").value) +
                "&principalAmount=" + encodeURIComponent(document.getElementById("principalAmount").value) +
                "&DOBDay=" + encodeURIComponent(document.getElementById("DOBDay").value) +
                "&DOBMonth=" + encodeURIComponent(document.getElementById("DOBMonth").value) +
                "&DOBYear=" + encodeURIComponent(document.getElementById("DOBYear").value) +
                "&preSerialNumber=" + encodeURIComponent(document.getElementById("preSerialNumber").value) +
                "&serialNumber=" + encodeURIComponent(document.getElementById("serialNumber").value) +
                "&packetNumber=" + encodeURIComponent(document.getElementById("packetNumber").value) +
                "&girviType=" + encodeURIComponent(document.getElementById("girviType").value) +
                "&girviOtherInfo=" + encodeURIComponent(document.getElementById("girviOtherInfo").value) +
                "&loanTimePeriod=" + encodeURIComponent(document.getElementById("loanTimePeriod").value) +
                "&smsTemplateId=" + encodeURIComponent(document.getElementById("smsTemplateId").value) +
                "&girviDrAccId=" + encodeURIComponent(document.getElementById("girviDrAccId").value) +
                "&girviPaySelAccountId=" + encodeURIComponent(document.getElementById("girviPaySelAccountId").value) +
                "&girviPaymentOtherInfo=" + encodeURIComponent(document.getElementById("girviPaymentOtherInfo").value) +
                "&selFirstMonthInt=" + encodeURIComponent(document.getElementById("selFirstMonthInt").checked) +
                "&opBalCust=" + encodeURIComponent(document.getElementById("opBalCust").value) +
                "&clBalCust=" + encodeURIComponent(document.getElementById("clBalCust").value) +
                "&drAmtCust=" + encodeURIComponent(document.getElementById("drAmtCust").value) +
                "&crAmtCust=" + encodeURIComponent(document.getElementById("crAmtCust").value) +
                "&chkJrmnId=" + encodeURIComponent(document.getElementById("chkJrmnId").value) +
                "&itemEntered=" + encodeURIComponent(itemEntered) +
                "&panelNameNewLoan=" + encodeURIComponent(panelNameCustLoan) +
                poststrItem;
//alert(poststr);
        open_loan("include/php/olacadgv" + default_theme + ".php", poststr);
    }
}

function validateAddGirviInputsForLoan() {
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
    /************Start Code to add validation for roi @Author:PRIYA17OCT13************/
    else if (validateEmptyField(document.getElementById("selROI").value, "Please Select ROI!") == false) {
        document.getElementById("selROI").focus();
        return false;
    }
    /************End Code to add validation for @Author:PRIYA17OCT13************/
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
    } else if (validateEmptyField(document.getElementById("packetNumber").value, "Please enter Packet Number!") == false ||
            validateNum(document.getElementById("packetNumber").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("packetNumber").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Girvi Date!") == false) {
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
    } else {
//      alert('item entered'+);
//      itemEntered = document.getElementById("itemEntered").value;
//      alert(getItemDiv);
        for (var dc = 1; dc <= getItemDiv; dc++) {
            if (document.getElementById("itemName" + dc).value != "") {
                if (validateEmptyField(document.getElementById("itemName" + dc).value, "Please select Item Name " + dc + "!") == false) {
                    document.getElementById("itemName" + dc).focus();
                    alert(document.getElementById("itemName" + dc));
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
                    }
                } else if (document.getElementById("itemType" + dc).value == 'Other') {
//                    alert('dc2:' + dc);
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

function validateAddPacketInputsForLoan() {
    if (validateEmptyField(document.getElementById("principalAmount").value, "Please enter Principal Amount!") == false ||
            validateNum(document.getElementById("principalAmount").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("principalAmount").focus();
        return false;
    } else if (validateSelectField(document.getElementById("interestType").value, "Please select Interest Type!") == false) {
        document.getElementById("interestType").focus();
        return false;
    }
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
    } else if (validateEmptyField(document.getElementById("packetNumber").value, "Please enter Packet Number!") == false ||
            validateNum(document.getElementById("packetNumber").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("packetNumber").focus();
        return false;
    } else if (validateSelectField(document.getElementById("girviDrAccId").value, "Please select Girvi Dr Account!") == false) {
        document.getElementById("girviDrAccId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("girviPaySelAccountId").value, "Please select Girvi Cr Account!") == false) {
        document.getElementById("girviPaySelAccountId").focus();
        return false;
    }
    return true;
}

//function openAccBalPanel() {
//    
//    var poststr = "custId=" + encodeURIComponent(document.getElementById("custId").value) +
//            "&girviFirmId=" + encodeURIComponent(document.getElementById("girviFirmId").value) +
//            "&jrmnId=" + encodeURIComponent(document.getElementById("jrmnId").value) +
//            "&jrmnStartYr=" + encodeURIComponent(document.getElementById("jrmnStartYr").value) +
//            "&jrmnEndYr=" + encodeURIComponent(document.getElementById("jrmnEndYr").value) +
//            "&accId=" + encodeURIComponent(document.getElementById("accId").value) +
//            "&selROI=" + encodeURIComponent(document.getElementById("selROI").value) +
//            "&selROIValue=" + encodeURIComponent(document.getElementById("selROIValue").value) +
//            "&interestType=" + encodeURIComponent(document.getElementById("interestType").value) +
//            "&principalAmount=" + encodeURIComponent(document.getElementById("principalAmount").value) +
//            "&itemEntered=" + encodeURIComponent(itemEntered) +
//            "&DOBDay=" + encodeURIComponent(document.getElementById("DOBDay").value) +
//            "&DOBMonth=" + encodeURIComponent(document.getElementById("DOBMonth").value) +
//            "&DOBYear=" + encodeURIComponent(document.getElementById("DOBYear").value) +
//            "&preSerialNumber=" + encodeURIComponent(document.getElementById("preSerialNumber").value) +
//            "&serialNumber=" + encodeURIComponent(document.getElementById("serialNumber").value) +
//            "&packetNumber=" + encodeURIComponent(document.getElementById("packetNumber").value) +
//            "&girviType=" + encodeURIComponent(document.getElementById("girviType").value) +
//            "&girviOtherInfo=" + encodeURIComponent(document.getElementById("girviOtherInfo").value) +
//            "&loanTimePeriod=" + encodeURIComponent(document.getElementById("loanTimePeriod").value) +
//            "&smsTemplateId=" + encodeURIComponent(document.getElementById("smsTemplateId").value) +
//            "&girviDrAccId=" + encodeURIComponent(document.getElementById("girviDrAccId").value) +
//            "&girviPaySelAccountId=" + encodeURIComponent(document.getElementById("girviPaySelAccountId").value) +
//            "&girviPaymentOtherInfo=" + encodeURIComponent(document.getElementById("girviPaymentOtherInfo").value) +
//            "&selFirstMonthInt=" + encodeURIComponent(document.getElementById("selFirstMonthInt").value) +
//            "&opBalCust=" + encodeURIComponent(document.getElementById("opBalCust").value) +
//            "&clBalCust=" + encodeURIComponent(document.getElementById("clBalCust").value) +
//            "&drAmtCust=" + encodeURIComponent(document.getElementById("drAmtCust").value) +
//            "&crAmtCust=" + encodeURIComponent(document.getElementById("crAmtCust").value) +
//            "&chkJrmnId=" + encodeURIComponent(document.getElementById("chkJrmnId").value) +
//            "&AddNewLoanSubButtClick=" + encodeURIComponent(document.getElementById("AddNewLoanSubButtClick").value = 'true');
//
//    alert(poststr);
//       open_loan("include/php/olacadgv"+ default_theme +".php", poststr);
//}

function open_loan(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertopenAccBalPanel;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertopenAccBalPanel() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        alert(xmlhttp.responseText);
        document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/*******************************************END CHANGE IN CODE @Author : GAUR03APR16********************************************************/

//////////////////////////////////////// CHANGE IN CODE @Author :GAUR21MAR16 ///////////////////////////////////////// 
/**********End to code open account bal panel @AUTHOR: GAUR8JAN16****************/

/*****************Start to add code to add customer to account balance panel @AUTHOR: GAUR09JAN16*************************/
function valSearchCustFirstNameToAddGirvi(custFirstName) {
    if (custFirstName == "Enter Customer First Name") {
        alert("Please enter Customer First Name!");
        document.getElementById("custFirstName").focus();
        return false;
    }
    return true;
}

function search_cust_fname_to_add_loan(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCustFNameToAddGirvi;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchCustFNameToAddLoan() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
        document.getElementById("custListForAddGirviDiv").innerHTML = xmlhttp.responseText;
        //searchCityForPanelBlank();
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    }
}

function searchCustToAddLoan(custFName, custLName, custFatherOrSpouseName, custCity, custMobNo, custFirmId) {

    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    //document.getElementById('printButt').style.visibility = "visible";
    if (true) {

        var poststr = "custFName=" + encodeURIComponent(custFName)
                + "&custLName=" + encodeURIComponent(custLName)
                + "&custFatherOrSpouseName=" + encodeURIComponent(custFatherOrSpouseName)
                + "&custCity=" + encodeURIComponent(custCity)
                + "&custMobNo=" + encodeURIComponent(custMobNo)
                + "&custFirmId=" + encodeURIComponent(custFirmId)
                + "&girviFirmId=" + encodeURIComponent(document.getElementById("girviFirmId").value) +
                "&jrmnId=" + encodeURIComponent(document.getElementById("jrmnId").value) +
                "&jrmnStartYr=" + encodeURIComponent(document.getElementById("jrmnStartYr").value) +
                "&jrmnEndYr=" + encodeURIComponent(document.getElementById("jrmnEndYr").value) +
                "&accId=" + encodeURIComponent(document.getElementById("accId").value) +
                "&opBalCust=" + encodeURIComponent(document.getElementById("opBalCust").value) +
                "&clBalCust=" + encodeURIComponent(document.getElementById("clBalCust").value) +
                "&drAmtCust=" + encodeURIComponent(document.getElementById("drAmtCust").value) +
                "&crAmtCust=" + encodeURIComponent(document.getElementById("crAmtCust").value);
//        alert(poststr);
        search_cust_fname_to_add_loan('include/php/omaccsc' + default_theme + '.php', poststr);
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
    }
}
/*****************End to add code to add customer to account balance panel @AUTHOR: GAUR09JAN16*************************/

/***************Start code to add param @Author: GAUR03APR16******************/

function getCustomerDetailsWithCustIdForLoan(custPanelOption, custId, firmId) {

    var poststr = "custPanelOption=" + encodeURIComponent(custPanelOption) +
            "&custId=" + encodeURIComponent(custId) +
            "&firmId=" + encodeURIComponent(firmId) +
            "&jrmnId=" + encodeURIComponent(document.getElementById("jrmnId").value) +
            "&jrmnStartYr=" + encodeURIComponent(document.getElementById("jrmnStartYr").value) +
            "&jrmnEndYr=" + encodeURIComponent(document.getElementById("jrmnEndYr").value) +
            "&accId=" + encodeURIComponent(document.getElementById("accId").value) +
            "&opBalCust=" + encodeURIComponent(document.getElementById("opBalCust").value) +
            "&clBalCust=" + encodeURIComponent(document.getElementById("clBalCust").value) +
            "&drAmtCust=" + encodeURIComponent(document.getElementById("drAmtCust").value) +
            "&crAmtCust=" + encodeURIComponent(document.getElementById("crAmtCust").value) +
            "&optionGirviTypeOpen=selected";
//alert(poststr);
    add_loan_customer_list("include/php/omacadln" + default_theme + ".php", poststr);
}

function add_loan_customer_list(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertgetCustomerDetailsWithCustIdForLoan;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertgetCustomerDetailsWithCustIdForLoan() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("accBalDetails").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}



//function getCustomerDetailsWithCustIdForLoan(custPanelOption, custId ,firmId) {
//    alert(custPanelOption);
//      alert(custId);
//        alert(firmId);
//          
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
//        }
//        else {
//
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    var poststr =
//                "jrmnId=" + encodeURIComponent(document.getElementById("jrmnId").value) +
//                "&jrmnStartYr=" + encodeURIComponent(document.getElementById("jrmnStartYr").value) +
//                "&jrmnEndYr=" + encodeURIComponent(document.getElementById("jrmnEndYr").value) +
//                "&accId=" + encodeURIComponent(document.getElementById("accId").value) +
//                "&opBalCust=" + encodeURIComponent(document.getElementById("opBalCust").value) +
//                "&clBalCust=" + encodeURIComponent(document.getElementById("clBalCust").value) +
//                "&drAmtCust=" + encodeURIComponent(document.getElementById("drAmtCust").value) +
//                "&crAmtCust=" + encodeURIComponent(document.getElementById("crAmtCust").value) ;
//        alert(poststr);
//    xmlhttp.open("POST", "include/php/omacadln"+ default_theme +".php?custPanelOption=" + custPanelOption + "&custId=" + custId + "&srchItemPreId=" + itemPreId + "&srchItemPostId=" + itemPostId + "&poststr" + poststr,
//            true);
//    xmlhttp.send();
//}
/***************END code to add param @Author: GAUR03APR16******************/



// **********************************Start Customer Details Functions @Author: GAUR18JAN16******************/

function setCusFrmCusTypForLoan(custId, firmId, custType) {
//alert(custId);
//alert(firmId);
//alert(custType);
    var poststr = "custId=" + encodeURIComponent(custId) +
            "&firmId=" + encodeURIComponent(firmId) +
            "&custType=" + encodeURIComponent(custType) +
            "&jrmnId=" + encodeURIComponent(document.getElementById("jrmnId").value) +
            "&jrmnStartYr=" + encodeURIComponent(document.getElementById("jrmnStartYr").value) +
            "&jrmnEndYr=" + encodeURIComponent(document.getElementById("jrmnEndYr").value) +
            "&accId=" + encodeURIComponent(document.getElementById("accId").value) +
            "&opBalCust=" + encodeURIComponent(document.getElementById("opBalCust").value) +
            "&clBalCust=" + encodeURIComponent(document.getElementById("clBalCust").value) +
            "&drAmtCust=" + encodeURIComponent(document.getElementById("drAmtCust").value) +
            "&crAmtCust=" + encodeURIComponent(document.getElementById("crAmtCust").value);
//alert(poststr);
    add_loan_customer("include/php/omacadln" + default_theme + ".php", poststr);
}

function add_loan_customer(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertsetCusFrmCusTypForLoan;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertsetCusFrmCusTypForLoan() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}


//var custId;
//function setCustIdForLoan(obj) {
//    custId = obj.id;
//}
//
//var custType;
//function setCusFrmCusTypForLoan(obj, getFirmId, getCustType) {
//    custId = obj.id;
//    firmId = getFirmId;
//    custType = getCustType;


//function getCustHome() {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
//        } else {
//
//            document.getElementById("ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    xmlhttp.open("GET", "include/php/omcdcshm"+ default_theme +".php?custId=" + custId,
//            true);
//    xmlhttp.send();
//}

//function setCusFrmCusTypForLoan(custPanelOption) {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
//        }
//        else {
//
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
////    alert('hiiii');
//    xmlhttp.open("GET", "include/php/omacadln"+ default_theme +".php?custId=" + custId,
//            true);
//    xmlhttp.send();
//}
// **********************************End Customer Details Functions @Author: GAUR18JAN16******************/



//************************** Search City TO Add Girvi
/***********Start Code To Add Div For Add New Customer @AUTHOR: GAUR19JAN16********/
var keyCode;
var panelNameToAddCustCity;
function search_city_for_Loan_panel(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCityForLoanPanel;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchCityForLoanPanel() {
//    if (panelNameToAddCustCity == 'addNewCustomer') {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
//            document.getElementById("cityListDivToAddNewCust").innerHTML = xmlhttp.responseText;
//            if (keyCode == 40 || keyCode == 38) {
//                document.getElementById('custCityForAddNewCustSelect').focus();
//                document.getElementById('custCityForAddNewCustSelect').options[0].selected = true;
//            }
//        } else {
//            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
//        }
//    } else
    if (panelNameToAddCustCity == 'directAddCust') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('custCityForAddGirviSelect').focus();
                document.getElementById('custCityForAddGirviSelect').options[0].selected = true;
                //document.getElementById('custCityForAddGirvi').value = document.getElementById('custCityForAddGirviSelect').options[0].value;
                //document.getElementById('custCityForAddGirvi').focus();
            }
            searchCustToAddGirvi(document.getElementById('custFirstNameForAddGirvi').value,
                    document.getElementById('custLastNameForAddGirvi').value,
                    document.getElementById('custFatherNameForAddGirvi').value,
                    document.getElementById('custCityForAddGirvi').value,
                    document.getElementById('mobileNoToAddGirvi').value,
                    document.getElementById('girviFirmId').value);
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    }
}
function searchCityForLoanPanel(custCity, keyCodeInput, panelName) {
    keyCode = keyCodeInput;
    panelNameToAddCustCity = panelName;
    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    var poststr = "custCity=" + encodeURIComponent(custCity) +
            "&panelName=" + encodeURIComponent(panelName);
    search_city_for_Loan_panel('include/php/omavvgtc' + default_theme + '.php', poststr);
}
//************************** Search City TO Add Girvi Blank Panel GAUR19JAN16

/**********Start to add function showCountBal @AUTHOR: GAUR20JAN16****************/
function openCustomerDetail() {
    var poststr = "girviFirmId=" + encodeURIComponent(document.getElementById("girviFirmId").value) +
            "&jrmnId=" + encodeURIComponent(document.getElementById("jrmnId").value) +
            "&finStartYear=" + encodeURIComponent(document.getElementById("jrmnStartYr").value) +
            "&finEndYear=" + encodeURIComponent(document.getElementById("jrmnEndYr").value) +
            "&accId=" + encodeURIComponent(document.getElementById("accId").value) +
            "&opBal=" + encodeURIComponent(document.getElementById("opBalCust").value) +
            "&clBal=" + encodeURIComponent(document.getElementById("clBalCust").value) +
            "&drAmt=" + encodeURIComponent(document.getElementById("drAmtCust").value) +
            "&crAmt=" + encodeURIComponent(document.getElementById("crAmtCust").value);
//  alert(poststr);
    open_Customer_Detail("include/php/omaccssr" + default_theme + ".php", poststr);
}

function open_Customer_Detail(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertopenCustomerDetail;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertopenCustomerDetail() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/**********End to add function showCountBal @AUTHOR: GAUR20JAN16****************/

//************************** Search City TO Add Girvi Blank Panel @AUTHOR: GAUR20JAN16**************************/
var keyCode;
var cityNameForLoanPanelBlank;
function search_city_for_loan_panel_blank(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCityForLoanPanelBlank;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchCityForLoanPanelBlank() {
//    if (panelNameToAddCustCity == 'addNewCustomer') {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
//            document.getElementById("cityListDivToAddNewCust").innerHTML = xmlhttp.responseText;
//            if (keyCode == 40 || keyCode == 38) {
//                document.getElementById('custCityForAddNewCustSelect').focus();
//                document.getElementById('custCityForAddNewCustSelect').options[0].selected = true;
//            }
//        } else {
//            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
//        }
//    } 
    if (cityNameForLoanPanelBlank == 'directAddCust') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("custCityForAddGirvi").focus();
            searchCustToAddLoanPanelGirvi(document.getElementById('custFirstNameForAddGirvi').value,
                    document.getElementById('custLastNameForAddGirvi').value,
                    document.getElementById('custFatherNameForAddGirvi').value,
                    document.getElementById('custCityForAddGirvi').value,
                    document.getElementById('mobileNoToAddGirvi').value,
                    document.getElementById('girviFirmId').value);
            document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    } else if (cityNameForLoanPanelBlank == 'blank') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    }
}
function searchCityForLoanPanelBlank(divName) {

    cityNameForLoanPanelBlank = divName;
    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    var poststr = "";
    search_city_for_loan_panel_blank('include/php/ombbblnk' + default_theme + '.php', poststr);
}
/***********End Code To Add Div For Add New Customer @AUTHOR: GAUR20JAN16**************************/

/*****************Start to add code to show print button @AUTHOR: GAUR20JAN16*************************/
function searchCustToAddLoanPanelGirvi(custFName, custLName, custFatherOrSpouseName, custCity, custMobNo, custFirmId) {

    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    //document.getElementById('printButt').style.visibility = "visible";
    if (true) {

        var poststr = "custFName=" + encodeURIComponent(custFName)
                + "&custLName=" + encodeURIComponent(custLName)
                + "&custFatherOrSpouseName=" + encodeURIComponent(custFatherOrSpouseName)
                + "&custCity=" + encodeURIComponent(custCity)
                + "&custMobNo=" + encodeURIComponent(custMobNo)
                + "&custFirmId=" + encodeURIComponent(custFirmId);
        search_cust_fname_to_add_girvi('include/php/omaccsc' + default_theme + '.php', poststr);
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
    }
}
/*****************End to add code to show print button @AUTHOR: GAUR20JAN16*************************/



/**********Start to add function add loan accounat Bal @AUTHOR: GAUR20JAN16****************/
function addLoanCustomerList(opBal, drAmt, crAmt, clBal, accID, selFirmId, finStartYear, finEndYear, drAccId, crAccId, accId, jrmnAccId, opBalSelectType, clBalSelectType, jrmnId) {

    var poststr = "opBal=" + opBal +
            "&drAmt=" + drAmt +
            "&crAmt=" + crAmt +
            "&clBal=" + clBal +
            "&accId=" + accID +
            "&girviFirmId=" + selFirmId +
            "&finStartYear=" + finStartYear +
            "&finEndYear=" + finEndYear +
            "&drAccId=" + drAccId +
            "&crAccId=" + crAccId +
            "&accId=" + accId +
            "&jrmnAccId=" + jrmnAccId +
            "&opBalSelectType=" + opBalSelectType +
            "&clBalSelectType=" + clBalSelectType +
            "&jrmnId=" + jrmnId;
//    alert(poststr);
    add_loan_to_customer_list("include/php/omaccsc" + default_theme + ".php", poststr);
}

function add_loan_to_customer_list(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertaddLoanCustomerList;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertaddLoanCustomerList() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("accBalDetails").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/**********End to add function add loan accounat Bal @AUTHOR: GAUR20JAN16****************/


/********************** Add Girvi Item Code *****************************************************************/
function validateAddGirviItemInputsForLoan(dc) {
    itemEntered = 0;
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
function add_girvi_Item_For_Loan(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddGirviItemForLoan;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertAddGirviItemForLoan() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }

}
function addGirviItemForLoan(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateAddGirviItemInputsForLoan(obj)) {
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
//        alert(poststr);
        add_girvi_Item_For_Loan('include/php/olacadgv"+ default_theme +".php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
/***********Start Code To add item_sell by final fine wt @Author: GAUR03MAR16***************/

function calculateItemSellByFineWt() {
    var wt = document.getElementById('slPrItemFineWeight').value;
    document.getElementById('addItemNTWNMetRate').value = ((Math_round(parseFloat(document.getElementById('slPrItemMetalRate').value) * wt)) / 10).toFixed(2);
    document.getElementById('slPrItemTotTax').value = Math_round((parseFloat(document.getElementById('addItemNTWNMetRate').value) * document.getElementById('slPrItemVATTax').value) / 100).toFixed(2);
    document.getElementById('slPrItemFinalVal').value = Math_round(parseFloat(document.getElementById('addItemNTWNMetRate').value) + parseFloat(document.getElementById('slPrItemLabCharges').value) + parseFloat(document.getElementById('slPrItemTotTax').value)).toFixed(2);
    document.getElementById('slPrItemFinalVal').value = Math_round(parseFloat(document.getElementById('slPrItemFinalVal').value) + parseFloat(document.getElementById('slPrCryVal1').value)).toFixed(2);
    return false;
}

/***********END Code To add item_sell by final fine wt @Author: GAUR03MAR16***************/

/***********Start code to add Payment form on supplier home @Author:SANT10FEB16*****************/
function showSuppPaymentDetailse(newItemGdFFNW, newItemGdFFNWT, newItemSlFFNW, newItemSlFFNWT) {
//  alert(newItemGdFFNW);
//  alert(newItemGdFFNWT);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("advMoneyDepositMonButDiv").style.visibility = "hidden";
            document.getElementById("ajaxLoadAdvMoneyDepositMon").style.visibility = "visible";
            document.getElementById("admnDepositMoneyDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("advMoneyDepositMonButDiv").style.visibility = "hidden";
            document.getElementById("ajaxLoadAdvMoneyDepositMon").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogspprdt" + default_theme + ".php?finalwt=" + newItemGdFFNW + "&finalwtp=" + newItemGdFFNWT + "&finalswt=" + newItemSlFFNW + "&finalswtp=" + newItemSlFFNWT, true);
    xmlhttp.send();
}
function getSuppRawMetalType(panelName, metalType, metalCount, firmId, rawGdPreId, rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId, metalTypePanel, cntr, otherChgsBy, totFinGdWt, totFinSlWt) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalIdDiv" + metalCount).innerHTML = xmlhttp.responseText;
            // calcItemBalance();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogsppydt" + default_theme + ".php?panelName=" + panelName + "&metalType=" + metalType +
            "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId + "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
            "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt, true);
    xmlhttp.send();
}
//*******************************************************************************************************************
var goldWtBal;
var silverWtBal;
var GoldWtType;
var SilverWtType;
function calcSuppItemBalance() {

    var metalEntered = 0;
    var metalCount = document.getElementById("metalCount").value;
    if (document.getElementById('metalPanel').value == 'StockPayment' || document.getElementById('metalPanel').value == 'StockPayUp') {
        var prefix = 'stock';
    } else if (document.getElementById('metalPanel').value == 'SlPrPayment' || document.getElementById('metalPanel').value == 'SellPayUp') {
        prefix = 'slPr';
    } else if (document.getElementById('metalPanel').value == 'CustSellPayment' || document.getElementById('metalPanel').value == 'CustSellPayUp') {
        prefix = 'sell';
    } else if (document.getElementById('metalPanel').value == 'NwOrPayment' || document.getElementById('metalPanel').value == 'NwOrPayUp') {
        prefix = 'nwOr';
    } else if (document.getElementById('metalPanel').value == 'RawPayment' || document.getElementById('metalPanel').value == 'RawPayUp') {
        prefix = 'rwPr';
    } else if (document.getElementById('metalPanel').value == 'SuppAddOrder' || document.getElementById('metalPanel').value == 'SuppOrderUp') {
        prefix = 'spOr';
    }
    if (document.getElementById('metalPanel').value == 'StockPayment' || document.getElementById('metalPanel').value == 'SlPrPayment' ||
            document.getElementById('metalPanel').value == 'CustSellPayment' || document.getElementById('metalPanel').value == 'NwOrPayment' ||
            document.getElementById('metalPanel').value == 'RawPayment' || document.getElementById('metalPanel').value == 'SuppAddOrder') {
        count = 1;
        delId = 'del' + 1;
    } else if (document.getElementById('metalPanel').value == 'StockPayUp' || document.getElementById('metalPanel').value == 'SellPayUp' ||
            document.getElementById('metalPanel').value == 'CustSellPayUp' || document.getElementById('metalPanel').value == 'NwOrPayUp' ||
            document.getElementById('metalPanel').value == 'RawPayUp' || document.getElementById('metalPanel').value == 'SuppOrderUp') {
        getMetalDiv = document.getElementById('noOfRawMet').value;
        var count = document.getElementById('rawId').value;
        var delId = 'del' + count;
    }

    var totAmtRec = 0;
    var gdBal = 0;
    var slBal = 0;
    var totRecGd = 0;
    var totRecSl = 0;
    //    for (var dc = count; dc <= getMetalDiv; dc++) { 
    for (var dc = count; getMetalDiv != ''; dc++) {
        //if (document.getElementById('metalDel' + dc).value != 'Deleted') {
        var payTotalWeight1 = document.getElementById('PayMetal1RecWt').value;
        var payTotalWeightType1 = document.getElementById('PayMetal1RecWtType').value;
//            alert(payTotalWeightType1);
        var payMetalRate1 = document.getElementById('PayMetal1Rate').value;
        var payMetalTunch1 = document.getElementById('PayMetal1Tunch').value;
        var metalWeight = (payTotalWeight1 * payMetalTunch1) / 100;
        document.getElementById('PayMetal1FnWt').value = parseFloat(metalWeight).toFixed(2);
        if (document.getElementById('PayMetalType1').value == 'Gold' || document.getElementById('PayMetalType1').value == 'Alloy') {

            goldWeight = metalWeight;
            if (payTotalWeightType1 == 'KG') {
                document.getElementById('PayMetal1Val').value = ((goldWeight * payMetalRate1) * document.getElementById('gmWtInKg').value).toFixed(2);
            } else if (payTotalWeightType1 == 'GM') {
                document.getElementById('PayMetal1Val').value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(2);
            } else if (payTotalWeightType1 == 'MG') {
                document.getElementById('PayMetal1Val').value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInMg').value).toFixed(2);
            }

            if (document.getElementById('PayMetalType1').value == 'Gold') {

                var payMetalDueWeightType1 = (document.getElementById('GoldTotFineWtType').value);
                var goldWeightType = payMetalDueWeightType1;
//                    alert(payMetalDueWeightType1 + '-' + payTotalWeightType1);
                if (gdBal == '') {
                    gdBal = document.getElementById('GoldTotFineWt').value;
                    //alert(gdBal);
                }

                if (payMetalDueWeightType1 == 'KG') {
                    if (payTotalWeightType1 == 'KG') {
                        gdBal = parseFloat((gdBal) - goldWeight).toFixed(2);
                    } else if (payTotalWeightType1 == 'GM') {
                        gdBal = parseFloat(((gdBal) - goldWeight / 1000)).toFixed(2);
                        goldWeight = parseFloat(goldWeight / 1000).toFixed(2);
                    } else if (payTotalWeightType1 == 'MG') {
                        gdBal = parseFloat(((gdBal) - goldWeight / (1000 * 1000))).toFixed(2);
                        goldWeight = parseFloat(goldWeight / (1000 * 1000)).toFixed(2);
                    }
                } else if (payMetalDueWeightType1 == 'GM') {
                    // alert('hi');
                    if (payTotalWeightType1 == 'KG') {
                        gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(2);
                        goldWeight = parseFloat(goldWeight * 1000).toFixed(2);
                    } else if (payTotalWeightType1 == 'GM') {
//                        alert(goldWeight);

                        gdBal = parseFloat((gdBal) - goldWeight).toFixed(2);
                    } else if (payTotalWeightType1 == 'MG') {
                        gdBal = parseFloat(((gdBal) - goldWeight / (1000))).toFixed(2);
                        goldWeight = parseFloat(goldWeight / 1000).toFixed(2);
                    }
                } else if (payMetalDueWeightType1 == 'MG') {
                    if (payTotalWeightType1 == 'KG') {
                        gdBal = parseFloat(((gdBal) - goldWeight * 1000 * 1000)).toFixed(2);
                        goldWeight = parseFloat(goldWeight * 1000 * 1000).toFixed(2);
                    } else if (payTotalWeightType1 == 'GM') {
                        gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(2);
                        goldWeight = parseFloat(goldWeight * 1000).toFixed(2);
                    } else if (payTotalWeightType1 == 'MG') {
                        gdBal = parseFloat((gdBal - goldWeight)).toFixed(2);
                    }
                }
//                    alert(payMetalDueWeightType1);
                document.getElementById('PayMetal1Bal').value = gdBal;
                document.getElementById('PayMetalBal1Type').value = payMetalDueWeightType1;
                goldWtBal = parseFloat(gdBal).toFixed(3);
                GoldWtType = payMetalDueWeightType1;
//alert(goldWtBal);
                totRecGd += goldWeight;
//                    alert(totRecGd);
            }
        }
        if (document.getElementById('PayMetalType1').value == 'Silver') {
            silverWeight = metalWeight;
            if (payTotalWeightType1 == 'KG') {
                document.getElementById('PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1 * document.getElementById('srGmWtInKg').value)).toFixed(2);
            } else if (payTotalWeightType1 == 'GM') {
                document.getElementById('PayMetal1Val').value = ((silverWeight * payMetalRate1) / document.getElementById('srGmWtInGm').value).toFixed(2);
            } else if (payTotalWeightType1 == 'MG') {
                document.getElementById('PayMetal1Val').value = ((silverWeight * payMetalRate1) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
            }

            payMetalDueWeightType1 = document.getElementById('SilverTotFineWtType').value;
            var silverWeightType = payMetalDueWeightType1;
            if (slBal == '') {
                slBal = document.getElementById('SilverTotFineWt').value;
            }
            if (payMetalDueWeightType1 == 'KG') {
                if (payTotalWeightType1 == 'KG') {
                    slBal = parseFloat((slBal) - silverWeight).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    slBal = parseFloat(((slBal) - silverWeight / 1000)).toFixed(2);
                    silverWeight = parseFloat(silverWeight / 1000).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    slBal = parseFloat(((slBal) - silverWeight / (1000 * 1000))).toFixed(2);
                    silverWeight = parseFloat(silverWeight / (1000 * 1000)).toFixed(2);
                }
            } else if (payMetalDueWeightType1 == 'GM') {
                if (payTotalWeightType1 == 'KG') {
                    slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(2);
                    silverWeight = parseFloat(silverWeight * 1000).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    slBal = parseFloat((slBal) - silverWeight).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    slBal = parseFloat(((slBal) - silverWeight / (1000))).toFixed(2);
                    silverWeight = parseFloat(silverWeight / 1000).toFixed(2);
                }
            } else if (payMetalDueWeightType1 == 'MG') {
                if (payTotalWeightType1 == 'KG') {
                    slBal = parseFloat(((slBal) - silverWeight * 1000 * 1000)).toFixed(2);
                    silverWeight = parseFloat(silverWeight * 1000 * 1000).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(2);
                    silverWeight = parseFloat(silverWeight * 1000).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    slBal = parseFloat((slBal - silverWeight)).toFixed(2);
                }
            }
            document.getElementById('PayMetal1Bal').value = slBal;
            document.getElementById('PayMetalBal1Type').value = payMetalDueWeightType1;
//                alert(silverWtBal);
            silverWtBal = parseFloat(slBal).toFixed(3);
            SilverWtType = payMetalDueWeightType1;
            totRecSl += silverWeight;
        }
        document.getElementById('metal1WtRecBal').value = parseFloat(totRecGd).toFixed(3) + ' ' + goldWeightType;
        document.getElementById('metal1WtRecBal1').value = parseFloat(totRecGd).toFixed(3);
        document.getElementById('metal1WtRecBal1Typ').value = goldWeightType;
        document.getElementById('metal2WtRecBal').value = parseFloat(totRecSl).toFixed(3) + ' ' + silverWeightType;
        document.getElementById('metal2WtRecBal1').value = parseFloat(totRecSl).toFixed(3);
        document.getElementById('metal2WtRecBal1Typ').value = silverWeightType;
        if (document.getElementById('PayMetal1Val').value == '') {
            document.getElementById('PayMetal1Val').value = 0;
        }
        totAmtRec += parseFloat(document.getElementById('PayMetal1Val').value);
        document.getElementById('PayTotAmtRec').value = parseFloat(totAmtRec).toFixed(2);
//            alert('paytotamtrec='+document.getElementById(prefix + 'PayTotAmtRec').value);
        document.getElementById('PayTotAmtRecDisp').value = document.getElementById('PayTotAmtRec').value;
//            calcCashBalance(prefix);
        calcRawMetStock(prefix);
        metalEntered++;
    }
    return false;
}
//***********************************************************************************************************************
/*************Start code to add serialNum @Author:SANT11FEB16*******************/
//var delRawString = '';
var delRawString = '';
function closeSuppRawMetalDiv(metalCnt, panelName) {
    delRawString = delRawString + metalCnt;
    metalPanel = panelName;
    var metmin = metalCnt - 1;
    var d = metalCnt - 1;
    var a = d - 1;
    document.getElementById("metalDel" + metalCnt).value = 'Deleted';
    if ((a == metmin || d == metmin) && metmin != 0) {
        if (document.getElementById("metalDel" + metmin).value != 'Deleted') {
            document.getElementById("metalDiv" + metmin).value = 'true';
        }
    }
    if (metmin == 0) {
        document.getElementById("metalDiv" + metalCnt).value = 'true';
    }
    document.getElementById("rawMetalDiv" + metalCnt).innerHTML = "";
    if (panelName == 'SuppRawDep')
        calSuppDepositBalance();
    else
        calcSuppItemBalance();
}

function getSuppMoreStockRawMetalDiv(metalCnt, panelName, firmId, rawGdPreId, rawGdPostId, metalType, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
        metalPanelName, mcntr, rawPreId, rawPostId, otherChgsBy, totFinGdWt, totFinSlWt) {
    metalPanel = panelName;
    metalCount = metalCnt;
    if (metalCount != '') {
        getMetalDiv = metalCount;
    }
    var poststr = "metalDivCount=" + metalCount
            + "&panelName=" + panelName + "&firmId=" + firmId
            + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&metalType=" + metalType + "&rawSlPreId=" + rawSlPreId +
            "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId +
            "&rawAlPostId=" + rawAlPostId + "&metalPanelName=" + metalPanelName
            + "&mcntr=" + mcntr + "&rawPreId=" + rawPreId + "&rawPostId=" + rawPostId
            + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt;
    get_more_raw_metal_div('include/php/ogsppydt' + default_theme + '.php', poststr);
    return false;
}
/*************End code to add serialNum @Author:SANT11FEB16*******************/
/***********START Code To add itemsaleratecut by final fine wt @Author: GAUR07APR16***************/
/***********START Code To add itemsaleratecut by final fine wt @Author: GAUR24MAY16***************/

//**********End code to check condition for CustSellPayment @Author:SANT30NOV16
//**********End code to check condition for CustSellPayment @Author:GAUR17NOV16
//**********End code to check condition for metalCOunt:Author:SANT20OCT16
/***********END Code To add itemsaleratecut by final fine wt @Author: GAUR24MAY16****************/
/***********END Code To add itemsaleratecut by final fine wt @Author: GAUR07APR16***************/
/***********END Code To add itemsaleratecut by final fine wt @Author: GAUR01APR16***************/

/***********START Code To add calc itemsaleratecut by final fine wt @Author: GAUR03MAR16***************/
function calcItemSaleRateCut(prefix) {
    var goldBal = parseFloat(docume.getElementById('metal1RtCtWtBal1').value);
    var goldWtType = document.getElementById('metal1RtCtWtType').value;
    if (goldBal != '') {
        document.getElementById(prefix + 'PayMetal1WtBal').value = parseFloat(goldBal - parseFloat(document.getElementById('metal1RtCtWt').value)).toFixed(3);
        document.getElementById('metal1RtCtWtBalDisp').value = document.getElementById('metal1RtCtWt').value + ' ' + goldWtType;
    }
    var silverBal = parseFloat(document.getElementById('metal2RtCtWtBal1').value);
    var silverWtType = document.getElementById('metal2RtCtWtType').value;
    if (silverBal != '') {
        document.getElementById(prefix + 'PayMetal2WtBal').value = parseFloat(silverBal - parseFloat(document.getElementById('metal2RtCtWt').value)).toFixed(3);
        document.getElementById('metal2RtCtWtBalDisp').value = document.getElementById('metal2RtCtWt').value + ' ' + silverWtType;
    }
    calcRawMetStock(prefix);
}
/***********END Code To add calc itemsaleratecut by final fine wt @Author: GAUR03MAR16***************/

/****************************START Code ADD MULTIPLE ROW @Author: GAUR03MAR16*********************************************/
function getMoreStockRawMetalDivForItemSell(metalCnt, panelName, firmId, rawGdPreId, rawGdPostId, metalType, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
        metalPanelName, mcntr, rawPreId, rawPostId, otherChgsBy, totFinGdWt, totFinSlWt) {
    metalPanel = panelName;
    metalCount = metalCnt;
    if (metalCount != '') {
        getMetalDiv = metalCount;
    }
    var poststr = "metalDivCount=" + metalCount
            + "&panelName=" + panelName + "&firmId=" + firmId
            + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&metalType=" + metalType + "&rawSlPreId=" + rawSlPreId +
            "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId +
            "&rawAlPostId=" + rawAlPostId + "&metalPanelName=" + metalPanelName
            + "&mcntr=" + mcntr + "&rawPreId=" + rawPreId + "&rawPostId=" + rawPostId
            + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt;
    get_more_raw_metal_div('include/php/ogspmpydt' + default_theme + '.php', poststr);
    return false;
}
/****************************END Code ADD MULTIPLE ROW @Author:GAUR03MAR16*********************************************/
/****************************END Code ADD MULTIPLE ROW @Author: GAUR15FEB16*********************************************/

/****************************START Code ADD change the dropdown condition @Author: GAUR03MAR16*********************************************/
/****************************START Code ADD if condition of slprinPanel @Author: GAUR09MAY16*********************************************/
function changeStockOtherChgsOptItemSell(otherChgsBy, sellPanelName, preInvoiceNo, invoiceNo, slprinPanel)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('main_ajax_loading_div').style.visibility = "hidden";
            if (sellPanelName == 'SlPrPayment') {
                document.getElementById('slPrMainDiv').innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById('slPrCurrentInvBeforePay').innerHTML = xmlhttp.responseText;
            }
            if (sellPanelName == 'SellPayUp') {
                calcWholeSaleRateCut('slPr');
                calcStockRrCtCashBalance('slPr');
            }
        } else {
            document.getElementById('main_ajax_loading_div').style.visibility = "visible";
        }
    };
    if (sellPanelName == 'SlPrPayment') {
        xmlhttp.open("POST", "include/php/ogcmemdv" + default_theme + ".php?otherChgsBy=" + otherChgsBy + "&paymentPanelName=" + sellPanelName + "&sellPanelName=" + sellPanelName + "&preInvoiceNo=" + preInvoiceNo + "&postInvoiceNo=" + invoiceNo + "&slprinPanel=" + slprinPanel, true);
    } else {
        xmlhttp.open("POST", "include/php/ogspindv" + default_theme + ".php?otherChgsBy=" + otherChgsBy + "&paymentPanelName=" + sellPanelName + "&sellPanelName=" + sellPanelName + "&preInvoiceNo=" + preInvoiceNo + "&postInvoiceNo=" + invoiceNo + "&slprinPanel=" + slprinPanel + "&mainPanel=ItemPurchase", true);
    }
    xmlhttp.send();
}
/****************************END Code ADD if condition of slprinPanel @Author: GAUR09MAY16*********************************************/
/****************************End Code ADD change the dropdown condition @Author: GAUR03MAR16*********************************************/

//******************************************************************Start code to change supplier home panel Author@:SANT22MAR16********************
//*******Start code to change supplier home panel Author@:SANT19OCT16********************
function showSuppPurchaseDetails(newPreInvoiceNo, newInvoiceNo, navPanel, suppId, payId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (navPanel == 'InvoiceDetails') {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (navPanel == 'InvoiceDetails') {
        xmlhttp.open("POST", "include/php//ogwhmndv" + default_theme + ".php?suppId=" + suppId + "&suppPanelOption=SuppHome", true);
    } else {
        xmlhttp.open("POST", "include/php/ogpayment" + default_theme + ".php?paymentPanelName=" + navPanel + "&preInvNo=" + newPreInvoiceNo + "&postInvNo=" + newInvoiceNo + "&suppId=" + suppId + "&suppPayId=" + payId, true);
    }
    xmlhttp.send();
}
//*******End code to change supplier home panel Author@:SANT19OCT16********************
function getSuppStockRawMetalType(panelName, metalType, metalCount, firmId, rawGdPreId, rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId, metalTypePanel, cntr, otherChgsBy, totFinGdWt, totFinSlWt, goldTotFFineWtType, silverTotFFineWtType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalIdDiv" + metalCount).innerHTML = xmlhttp.responseText;
            // calcItemBalance();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogsppydt" + default_theme + ".php?panelName=" + panelName + "&metalType=" + metalType +
            "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId + "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
            "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt + "&goldTotFFineWtType=" + goldTotFFineWtType + "&silverTotFFineWtType=" + silverTotFFineWtType, true);
    xmlhttp.send();
}
//****************************Start code to change supplier prev balance type show Author@:SANT5MAR16************************
//****************************Start code to change supplier prev balance type show Author@:SANT8MAR16************************
//****************************Start code to change supplier prev balance type show Author@:SANT12MAR16************************
function calcSuppStockItemBalance() {
    if (document.getElementById('totGdPaidWt').value == 'NaN' || document.getElementById('totGdPaidWt').value == '') {
        document.getElementById('totGdPaidWt').value = 0.00;
    }
    if (document.getElementById('totSlPaidWt').value == 'NaN' || document.getElementById('totSlPaidWt').value == '') {
        document.getElementById('totSlPaidWt').value = 0.00;
    }
// var totGdPaidWt = document.getElementById('totGdPaidWt').value;
//var totSlPaidWt = document.getElementById('totSlPaidWt').value;
    var metalEntered = 0;
    var metalCount = document.getElementById("metalCount").value;
    var prefix = 'supDep';
    var count = 1;
    var delId = 'del' + 1;
    var totAmtRec = 0;
    var gdBal = 0;
    var slBal = 0;
    var totRecGd = 0;
    var totRecSl = 0;
    var goldWeight = 0;
    var silverWeight = 0;
    var silverWeightType = '';
    var goldWeightType = '';
//    GoldWtType = '';
//    SilverWtType = '';
//    goldWtBal = 0;
//    silverWtBal = 0;
    //    for (var dc = count; dc <= getMetalDiv; dc++) { 
    for (var dc = count; getMetalDiv != ''; dc++) {
        if (document.getElementById('metalDel' + dc).value != 'Deleted') {
            var payTotalWeight1 = document.getElementById(prefix + 'PayMetal1RecWt' + dc).value;
            var payTotalWeightType1 = document.getElementById(prefix + 'PayMetal1RecWtType' + dc).value;
//            alert(payTotalWeightType1);
            var payMetalRate1 = document.getElementById(prefix + 'PayMetal1Rate' + dc).value;
            var payMetalTunch1 = document.getElementById(prefix + 'PayMetal1Tunch' + dc).value;
            var metalWeight = (payTotalWeight1 * payMetalTunch1) / 100;
            document.getElementById(prefix + 'PayMetal1FnWt' + dc).value = parseFloat(metalWeight).toFixed(2);
            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold' || document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Alloy') {
                goldWeight = metalWeight;
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) * document.getElementById('gmWtInKg').value).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInMg').value).toFixed(2);
                }

                if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold') {
                    var payMetalDueWeightType1 = document.getElementById(prefix + 'GoldTotFineWtType').value;
                    goldWeightType = payMetalDueWeightType1;
//                    alert(payMetalDueWeightType1 + '-' + payTotalWeightType1);
                    if (gdBal == '') {
                        gdBal = document.getElementById(prefix + 'GoldTotFineWt').value;
                    }

                    if (payMetalDueWeightType1 == 'KG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(2);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight / 1000)).toFixed(2);
                            goldWeight = parseFloat(goldWeight / 1000).toFixed(2);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000 * 1000))).toFixed(2);
                            goldWeight = parseFloat(goldWeight / (1000 * 1000)).toFixed(2);
                        }
                    } else if (payMetalDueWeightType1 == 'GM') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(2);
                            goldWeight = parseFloat(goldWeight * 1000).toFixed(2);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(2);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000))).toFixed(2);
                            goldWeight = parseFloat(goldWeight / 1000).toFixed(2);
                        }
                    } else if (payMetalDueWeightType1 == 'MG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000 * 1000)).toFixed(2);
                            goldWeight = parseFloat(goldWeight * 1000 * 1000).toFixed(2);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(2);
                            goldWeight = parseFloat(goldWeight * 1000).toFixed(2);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat((gdBal - goldWeight)).toFixed(2);
                        }
                    }
//                    alert(payMetalDueWeightType1);
                    document.getElementById(prefix + 'PayMetal1Bal' + dc).value = gdBal;
                    document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                    goldWtBal = parseFloat(gdBal).toFixed(3);
                    GoldWtType = payMetalDueWeightType1;
//alert(goldWtBal);
                    totRecGd += goldWeight;
                }
            }
            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Silver') {
                silverWeight = metalWeight;
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1 * document.getElementById('srGmWtInKg').value)).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1) / document.getElementById('srGmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                }

                payMetalDueWeightType1 = document.getElementById(prefix + 'SilverTotFineWtType').value;
                silverWeightType = payMetalDueWeightType1;
                if (slBal == '') {
                    slBal = document.getElementById(prefix + 'SilverTotFineWt').value;
                }
                if (payMetalDueWeightType1 == 'KG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat((slBal) - silverWeight).toFixed(2);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - silverWeight / 1000)).toFixed(2);
                        silverWeight = parseFloat(silverWeight / 1000).toFixed(2);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - silverWeight / (1000 * 1000))).toFixed(2);
                        silverWeight = parseFloat(silverWeight / (1000 * 1000)).toFixed(2);
                    }
                } else if (payMetalDueWeightType1 == 'GM') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(2);
                        silverWeight = parseFloat(silverWeight * 1000).toFixed(2);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat((slBal) - silverWeight).toFixed(2);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - silverWeight / (1000))).toFixed(2);
                        silverWeight = parseFloat(silverWeight / 1000).toFixed(2);
                    }
                } else if (payMetalDueWeightType1 == 'MG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000 * 1000)).toFixed(2);
                        silverWeight = parseFloat(silverWeight * 1000 * 1000).toFixed(2);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(2);
                        silverWeight = parseFloat(silverWeight * 1000).toFixed(2);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat((slBal - silverWeight)).toFixed(2);
                    }
                }
                document.getElementById(prefix + 'PayMetal1Bal' + dc).value = slBal;
                document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                silverWtBal = parseFloat(slBal).toFixed(3);
                SilverWtType = payMetalDueWeightType1;
                totRecSl += silverWeight;
            }
            document.getElementById('metal1WtRecBal').value = parseFloat(parseFloat(totRecGd)).toFixed(3) + ' ' + goldWeightType;
            document.getElementById('metal1WtRecBal1').value = parseFloat(totRecGd).toFixed(3);
            document.getElementById('metal1WtRecBal1Typ').value = goldWeightType;
            document.getElementById('metal2WtRecBal').value = parseFloat(parseFloat(totRecSl)).toFixed(3) + ' ' + silverWeightType;
            document.getElementById('metal2WtRecBal1').value = parseFloat(totRecSl).toFixed(3);
            document.getElementById('metal2WtRecBal1Typ').value = silverWeightType;
            if (document.getElementById(prefix + 'PayMetal1Val' + dc).value == '') {
                document.getElementById(prefix + 'PayMetal1Val' + dc).value = 0;
            }
            totAmtRec += parseFloat(document.getElementById(prefix + 'PayMetal1Val' + dc).value);
//            document.getElementById(prefix + 'PayTotAmtRec').value = parseFloat(totAmtRec).toFixed(2);
////            alert('paytotamtrec='+document.getElementById(prefix + 'PayTotAmtRec').value);
//            document.getElementById(prefix + 'PayTotAmtRecDisp').value = document.getElementById(prefix + 'PayTotAmtRec').value;
//            calcCashBalance(prefix);
            calcSuppRawMetStock(prefix);
        }
        metalEntered++;
    }
    return false;
}

//****************************End code to change supplier prev balance type show Author@:SANT12MAR16************************
//****************************End code to change supplier prev balance type show Author@:SANT8MAR16************************
//****************************End code to change supplier prev balance type show Author@:SANT5MAR16************************
//****************************Start code to change supplier prev balance type show Author@:SANT6APR16************************
function setSuppRateCutValues() {
    if (goldWtBal != 0 || goldWtBal != '') {
        document.getElementById('metal1RtCtWt').value = parseFloat(goldWtBal).toFixed(3);
        document.getElementById('metal1RtCtWtBal1').value = goldWtBal;
        document.getElementById('metal1RtCtWtType').value = GoldWtType;
        document.getElementById('supDepPayMetal1WtBal').value = goldWtBal;
        document.getElementById('supDepPayMetal1WtBalType').value = GoldWtType;
    }
    if (silverWtBal != 0 || silverWtBal != '') {
        document.getElementById('metal2RtCtWt').value = parseFloat(silverWtBal).toFixed(3);
        document.getElementById('metal2RtCtWtBal1').value = parseFloat(silverWtBal).toFixed(3);
        document.getElementById('metal2RtCtWtType').value = SilverWtType;
        document.getElementById('supDepPayMetal2WtBal').value = silverWtBal;
        document.getElementById('supDepPayMetal2WtBalType').value = SilverWtType;
    }
}
/***********End code to add Payment form on supplier home @Author:SANT6APR16*****************/
/***********End code to add Payment form on supplier home @Author:SANT10FEB16*****************/
function checkSuppRawStockWeight(rawPreId, rawPostId, rawMetalType, rawMetalId, recWt, recWtType, panelName, rwSlStatus) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (xmlhttp.responseText == 'SUCCESS') {
                document.getElementById("checkStatus").value = 'true';
                return true;
            } else if (xmlhttp.responseText != 'SUCCESS' && xmlhttp.responseText != '' && (panelName == 'StockPayUp' && rwSlStatus == 'PaymentDone')) {
                document.getElementById("checkStatus").value = 'false';
                alert(xmlhttp.responseText);
                return false;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogwrwtch" + default_theme + ".php?rawPreId=" + rawPreId + "&rawPostId=" + rawPostId + "&rawMetalType=" + rawMetalType + "&rawMetalId=" + rawMetalId + "&recWt=" + recWt + "&recWtType=" + recWtType, true);
    xmlhttp.send();
    // return false;
}

//******************************Start code to change supp home page rate cut Author:@SANT10MAR16*****************************
function wholesaleSuppRateCut(rateCutId, goldTotFFineWt, goldTotFFineWtType, silverTotFFineWt, silverTotFFineWtType, totGoldPay, totSilverPay, totpaidfinalgd, totpaidfinalsl, goldRate, silverRate, payPanelName, otherCharges, otherChgsBy, suppId, preInvNo, invNo) {
//    alert(rateCutId+'-'+goldTotFFineWt+'-'+goldTotFFineWtType+'-'+silverTotFFineWt+'-'+silverTotFFineWtType+'-'+totGoldPay+'-'+totSilverPay+'-'+goldRate+'-'+silverRate+'-'+payPanelName+'-'+otherCharges+'-'+otherChgsBy+'-'+suppId+'-'+preInvNo+'-'+invNo);
    var poststr = "rateCutOpt=" + encodeURIComponent(rateCutId) +
            "&goldTotFFineWt=" + encodeURIComponent(goldTotFFineWt) +
            "&goldTotFFineWtType=" + encodeURIComponent(goldTotFFineWtType) +
            "&silverTotFFineWt=" + encodeURIComponent(silverTotFFineWt) +
            "&silverTotFFineWtType=" + encodeURIComponent(silverTotFFineWtType) +
            "&totGoldPay=" + encodeURIComponent(totGoldPay) +
            "&totSilverPay=" + encodeURIComponent(totSilverPay) +
            "&totpaidfinalgd=" + encodeURIComponent(totpaidfinalgd) +
            "&totpaidfinalsl=" + encodeURIComponent(totpaidfinalsl) +
            "&goldRate=" + encodeURIComponent(goldRate) +
            "&silverRate=" + encodeURIComponent(silverRate) +
            "&otherCharges=" + encodeURIComponent(otherCharges) +
            "&payPanelName=" + encodeURIComponent(payPanelName) +
            "&otherChgsBy=" + encodeURIComponent(otherChgsBy) +
            "&payId=" + encodeURIComponent(document.getElementById('payId').value) +
            "&preInvId=" + encodeURIComponent(preInvNo) +
            "&invId=" + encodeURIComponent(invNo) +
            "&suppId=" + encodeURIComponent(suppId) +
            "&goldLeft=" + encodeURIComponent(document.getElementById('goldLeft').value) +
            "&silverLeft=" + encodeURIComponent(document.getElementById('silverLeft').value);
    if (rateCutId == 'RateCut') {
        wholesale_rate_cut("include/php/ogsprtct" + default_theme + ".php", poststr);
    } else {
        wholesale_rate_cut("include/php/ogspnrc" + default_theme + ".php", poststr);
    }
}
//******************************End code to change supp home page rate cut Author:@SANT10MAR16*****************************
//******************************End code to change supp home page rate cut Author:@SANT12MAR16*****************************
function calcSuppStockRrCtCashBalance(prefix) {

    if (document.getElementById(prefix + 'PayCashAmtRec').value != '' || document.getElementById(prefix + 'PayChequeAmt').value || document.getElementById(prefix + 'totPrevCash').value) {
        var totalCashPaidAmt = document.getElementById(prefix + 'PayCashAmtRec').value;
        if (totalCashPaidAmt == null || totalCashPaidAmt == '') {
            totalCashPaidAmt = 0;
        }
        var totalChequeAmt = document.getElementById(prefix + 'PayChequeAmt').value;
        if (totalChequeAmt == null || totalChequeAmt == '') {
            totalChequeAmt = 0;
        }
        var totalCardAmt = document.getElementById(prefix + 'PayCardAmt').value;
        if (totalCardAmt == null || totalCardAmt == '') {
            totalCardAmt = 0;
        }
        var totPrevCashh = document.getElementById(prefix + 'totPrevCash').value;
        if (totPrevCashh == null || totPrevCashh == '') {
            totPrevCashh = 0;
        }
        document.getElementById(prefix + 'PayCashRecDisp').value = Math_round(parseFloat(totalCashPaidAmt) + parseFloat(totalChequeAmt) + parseFloat(totalCardAmt)).toFixed(2);
        document.getElementById(prefix + 'PayTotCashAmt').value = parseFloat(parseFloat(totalCashPaidAmt) + parseFloat(totalChequeAmt) + parseFloat(totalCardAmt)).toFixed(2);
    }

    if (document.getElementById('VATTax').value != '' || document.getElementById('VATTax').value != null) {
        var totalValuation = document.getElementById('taxOnTotAmt').value;
        if (totalValuation == null || totalValuation == '') {
            totalValuation = 0;
        }
        if (document.getElementById('VATTax').value == '') {
            document.getElementById('VATTax').value = 0;
        }
        var totTax = parseFloat(document.getElementById('VATTax').value) / 100;
        document.getElementById(prefix + 'PayVATAmtDisp').value = Math_round(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
        document.getElementById(prefix + 'PayVATAmt').value = parseFloat(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
    }

    if (document.getElementById(prefix + 'PayVATAmt').value == 'NaN' || document.getElementById(prefix + 'PayVATAmt').value == '') {
        document.getElementById(prefix + 'PayVATAmt').value = 0.00;
    }
    if (document.getElementById(prefix + 'PayTotCashAmt').value || document.getElementById(prefix + 'PayVATAmt').value || document.getElementById(prefix + 'PayDiscount').value != '') {
        var totalAmt = 0;
        if (document.getElementById(prefix + 'PayTotAmt').value == '' || document.getElementById(prefix + 'PayTotAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayTotAmt').value = 0;
        }
        if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
            if (document.getElementById(prefix + 'PayTotAmtRec').value == '' || document.getElementById(prefix + 'PayTotAmtRec').value == 'NaN') {
                document.getElementById(prefix + 'PayTotAmtRec').value = 0;
            }
            totalAmt = parseFloat(document.getElementById(prefix + 'PayTotAmtRec').value) + parseFloat(document.getElementById(prefix + 'PayTotAmt').value);
        } else {
            totalAmt = parseFloat(document.getElementById(prefix + 'PayTotAmt').value);
        }
        if (document.getElementById(prefix + 'PayPrevTotAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevTotAmt').value == '') {
            document.getElementById(prefix + 'PayPrevTotAmt').value = 0;
        }
        if (document.getElementById(prefix + 'PayPrevTotAmt').value != '' || document.getElementById(prefix + 'PayPrevTotAmt').value != 0) {
            if (document.getElementById(prefix + 'PayPrevTotAmt').value > 0) {
                totalAmt = totalAmt + parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value);
            } else {
                totalAmt = totalAmt - Math.abs(parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value));
            }
        }
        if (document.getElementById(prefix + 'PayVATAmt').value == '' || document.getElementById(prefix + 'PayVATAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayVATAmt').value = 0;
        }
        if (document.getElementById(prefix + 'PayDiscount').value == '' || document.getElementById(prefix + 'PayDiscount').value == 'NaN') {
            document.getElementById(prefix + 'PayDiscount').value = 0;
        }
        if (document.getElementById(prefix + 'PayTotCashAmt').value == '' || document.getElementById(prefix + 'PayTotCashAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayTotCashAmt').value = 0;
        }
        document.getElementById(prefix + 'PayDiscountDisp').value = Math_round(parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
//        alert('calcStockRrCtCashBalance='+document.getElementById(prefix + 'PayFinAmtBalDisp').value);
        document.getElementById(prefix + 'PayTotAmtBal').value = parseFloat((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
    }
}
//**********************************Start code to change supp home page Author:SANT12MAR16
function calcSuppWholeSaleRateCut(prefix) {
    var goldBal = parseFloat(document.getElementById('metal1RtCtWtBal1').value);
    var goldWtType = document.getElementById('metal1RtCtWtType').value;
    if (goldBal != '') {
        document.getElementById(prefix + 'PayMetal1WtBal').value = parseFloat(goldBal - parseFloat(document.getElementById('metal1RtCtWt').value)).toFixed(3);
        document.getElementById('metal1RtCtWtBalDisp').value = document.getElementById('metal1RtCtWt').value + ' ' + goldWtType;
    }
    var silverBal = parseFloat(document.getElementById('metal2RtCtWtBal1').value);
    var silverWtType = document.getElementById('metal2RtCtWtType').value;
    if (silverBal != '') {
        document.getElementById(prefix + 'PayMetal2WtBal').value = parseFloat(silverBal - parseFloat(document.getElementById('metal2RtCtWt').value)).toFixed(3);
        document.getElementById('metal2RtCtWtBalDisp').value = document.getElementById('metal2RtCtWt').value + ' ' + silverWtType;
    }
    calcSuppRawMetStock(prefix);
}
//**********************************End code to change supp home page Author:SANT12MAR16
//**********************************End code to change supp home page Author:@SANT8MAR16
function getMoreSuppStockRawMetalDiv(metalCnt, panelName, firmId, rawGdPreId, rawGdPostId, metalType, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
        metalPanelName, mcntr, rawPreId, rawPostId, otherChgsBy, totFinGdWt, totFinSlWt, goldTotFFineWtType, silverTotFFineWtType) {
    metalPanel = panelName;
    metalCount = metalCnt;
    if (metalCount != '') {
        getMetalDiv = metalCount;
    }
    var poststr = "metalDivCount=" + metalCount
            + "&panelName=" + panelName + "&firmId=" + firmId
            + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&metalType=" + metalType + "&rawSlPreId=" + rawSlPreId +
            "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId +
            "&rawAlPostId=" + rawAlPostId + "&metalPanelName=" + metalPanelName
            + "&mcntr=" + mcntr + "&rawPreId=" + rawPreId + "&rawPostId=" + rawPostId
            + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt + "&goldTotFFineWtType=" + goldTotFFineWtType + "&silverTotFFineWtType=" + silverTotFFineWtType;
    get_more_raw_metal_div('include/php/ogsppydt' + default_theme + '.php', poststr);
    return false;
}
//******************************************************************Start code to change supplier home panel Author@:SANT7MAR16********************
function closeAdvMoney1DepositDiv() {
//    document.getElementById('stockPanelSubDiv').style.display = "none";
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("advMoneyDepositMonButDiv" + admnDepId).style.visibility = "visible";
            document.getElementById('stockPanelSubDiv').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxCloseAdvMoneyDepositMonDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//******************************************************************End code to change supplier home panel Author@:SANT7MAR16********************
function showPayPanel() {
    document.getElementById('stockPanelSubDiv').style.display = "block";
}
//******************************************************************End code to change supplier home panel Author@:SANT29FEB16********************
/****************************Start Code calculation @Author: GAUR21APR16*********************************************/
/****************************Start Code calculation @Author: GAUR20MAY16*********************************************/
var goldWtBal = 0;
var silverWtBal = 0;
var GoldWtType = null;
var SilverWtType = null;
var stockDiv = null;
function calcStockItemBalanceForItemSell() {
    var metalEntered = 0;
    var metalCount = document.getElementById("metalCount").value;
    if (document.getElementById('metalPanel').value == 'SlPrPayment' || document.getElementById('metalPanel').value == 'SellPayUp') {
        var prefix = 'slPr';
    }
    if (document.getElementById('metalPanel').value == 'SlPrPayment') {
        count = 1;
        delId = 'del' + 1;
    } else if (document.getElementById('metalPanel').value == 'SellPayUp') {
        getMetalDiv = document.getElementById('noOfRawMet').value;
        var count = document.getElementById('rawId').value;
        var delId = 'del' + count;
    }
    var totAmtRec = 0;
    var gdBal = 0;
    var slBal = 0;
    var totRecGd = 0;
    var totRecSl = 0;
    var goldWeight = 0;
    var silverWeight = 0;
    var silverWeightType = '';
    var goldWeightType = '';
    GoldWtType = '';
    SilverWtType = '';
    goldWtBal = 0;
    silverWtBal = 0;
    for (var dc = count; getMetalDiv != ''; dc++) {
        if (document.getElementById('metalDel' + dc).value != 'Deleted') {
            var payTotalWeight1 = document.getElementById(prefix + 'PayMetal1RecWt' + dc).value;
            var payTotalWeightType1 = document.getElementById(prefix + 'PayMetal1RecWtType' + dc).value;
            var payMetalRate1 = document.getElementById(prefix + 'PayMetal1Rate' + dc).value;
            var payMetalTunch1 = document.getElementById(prefix + 'PayMetal1Tunch' + dc).value;
            var metalWeight = (payTotalWeight1 * payMetalTunch1) / 100;
            document.getElementById(prefix + 'PayMetal1FnWt' + dc).value = parseFloat(metalWeight).toFixed(2);
            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold' || document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Alloy') {
                goldWeight = metalWeight;
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) * document.getElementById('gmWtInKg').value).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInMg').value).toFixed(2);
                }
                if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold') {
                    var payMetalDueWeightType1 = document.getElementById(prefix + 'GoldTotFineWtType').value;
                    goldWeightType = payMetalDueWeightType1;
                    if (gdBal == '') {
                        gdBal = document.getElementById(prefix + 'GoldTotFineWt').value;
                    }
                    if (payMetalDueWeightType1 == 'KG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight / 1000)).toFixed(3);
                            goldWeight = parseFloat(goldWeight / 1000).toFixed(2);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000 * 1000))).toFixed(3);
                            goldWeight = parseFloat(goldWeight / (1000 * 1000)).toFixed(3);
                        }
                    } else if (payMetalDueWeightType1 == 'GM') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(3);
                            goldWeight = parseFloat(goldWeight * 1000).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(3);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000))).toFixed(3);
                            goldWeight = parseFloat(goldWeight / 1000).toFixed(3);
                        }
                    } else if (payMetalDueWeightType1 == 'MG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000 * 1000)).toFixed(3);
                            goldWeight = parseFloat(goldWeight * 1000 * 1000).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(3);
                            goldWeight = parseFloat(goldWeight * 1000).toFixed(3);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat((gdBal - goldWeight)).toFixed(3);
                        }
                    }
                    document.getElementById(prefix + 'PayMetal1Bal' + dc).value = gdBal;
                    document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                    goldWtBal = parseFloat(gdBal).toFixed(3);
                    GoldWtType = payMetalDueWeightType1;
                    totRecGd += goldWeight;
                }
            }
            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Silver') {
                silverWeight = metalWeight;
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1 * document.getElementById('srGmWtInKg').value)).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1) / document.getElementById('srGmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                }

                payMetalDueWeightType1 = document.getElementById(prefix + 'SilverTotFineWtType').value;
                silverWeightType = payMetalDueWeightType1;
                if (slBal == '') {
                    slBal = document.getElementById(prefix + 'SilverTotFineWt').value;
                }
                if (payMetalDueWeightType1 == 'KG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat((slBal) - silverWeight).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - silverWeight / 1000)).toFixed(3);
                        silverWeight = parseFloat(silverWeight / 1000).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - silverWeight / (1000 * 1000))).toFixed(3);
                        silverWeight = parseFloat(silverWeight / (1000 * 1000)).toFixed(3);
                    }
                } else if (payMetalDueWeightType1 == 'GM') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(3);
                        silverWeight = parseFloat(silverWeight * 1000).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat((slBal) - silverWeight).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - silverWeight / (1000))).toFixed(3);
                        silverWeight = parseFloat(silverWeight / 1000).toFixed(3);
                    }
                } else if (payMetalDueWeightType1 == 'MG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000 * 1000)).toFixed(3);
                        silverWeight = parseFloat(silverWeight * 1000 * 1000).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(3);
                        silverWeight = parseFloat(silverWeight * 1000).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat((slBal - silverWeight)).toFixed(3);
                    }
                }
                document.getElementById(prefix + 'PayMetal1Bal' + dc).value = slBal;
                document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                silverWtBal = parseFloat(slBal).toFixed(3);
                SilverWtType = payMetalDueWeightType1;
                totRecSl += silverWeight;
            }
            if (document.getElementById(prefix + 'GoldTotFineWt').value != '' && goldWtBal == 0) {
                goldWtBal = parseFloat(document.getElementById(prefix + 'GoldTotFineWt').value);
                GoldWtType = document.getElementById(prefix + 'GoldTotFineWtType').value;
            }
            if (document.getElementById(prefix + 'SilverTotFineWt').value != '' && silverWtBal == 0) {
                silverWtBal = parseFloat(document.getElementById(prefix + 'SilverTotFineWt').value);
                SilverWtType = document.getElementById(prefix + 'SilverTotFineWtType').value;
            }

            if (document.getElementById('stockPurPriceCut').value != 'default') {
                document.getElementById('metal1WtRecBal').value = parseFloat(totRecGd).toFixed(3) + ' ' + goldWeightType;
                document.getElementById('metal2WtRecBal').value = parseFloat(totRecSl).toFixed(3) + ' ' + silverWeightType;
            }

            document.getElementById('metal1WtRecBal1').value = parseFloat(totRecGd).toFixed(3);
            document.getElementById('metal1WtRecBal1Typ').value = goldWeightType;
            document.getElementById('metal2WtRecBal1').value = parseFloat(totRecSl).toFixed(3);
            document.getElementById('metal2WtRecBal1Typ').value = silverWeightType;
            if (document.getElementById(prefix + 'PayMetal1Val' + dc).value == '') {
                document.getElementById(prefix + 'PayMetal1Val' + dc).value = 0;
            }
            totAmtRec += parseFloat(document.getElementById(prefix + 'PayMetal1Val' + dc).value);
            document.getElementById(prefix + 'PayTotMetAmtRec').value = (totAmtRec).toFixed(3); // added @Author:SHRI17AUG16

            if (document.getElementById('stockPurPriceCut').value == 'default') {
                document.getElementById(prefix + 'PayTotAmtRecDisp').value = document.getElementById(prefix + 'PayTotMetAmtRec').value;
            }

            if (document.getElementById('metalPanel').value == 'SellPayUp') {
                if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
                    calcWholeSaleRateCut(prefix);
                }
            }
            if (document.getElementById('stockPurPriceCut').value != 'default') {
                calcRawMetStock(prefix);
            }
            calcStockRrCtCashBalance(prefix);
        }
        metalEntered++;
    }
    return false;
}

function setRateCutValuesForItemSell(prefix) {
    if (document.getElementById('stockPurPriceCut').value != 'default') {
        document.getElementById('metal1RtCtWt').value = parseFloat(goldWtBal).toFixed(3);
        document.getElementById('metal1RtCtWtType').value = GoldWtType;
        document.getElementById('metal2RtCtWt').value = parseFloat(silverWtBal).toFixed(3);
        document.getElementById('metal2RtCtWtType').value = SilverWtType;
        document.getElementById(prefix + 'PayMetal1WtBal').value = parseFloat(goldWtBal).toFixed(3);
        document.getElementById(prefix + 'PayMetal1WtBalType').value = GoldWtType;
        document.getElementById(prefix + 'PayMetal2WtBal').value = parseFloat(silverWtBal).toFixed(3);
        document.getElementById(prefix + 'PayMetal2WtBalType').value = SilverWtType;
        if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
            if (stockDiv == 'wholeSaleStock') {
                document.getElementById(prefix + 'Metal1RtCtWtBal1').value = parseFloat(goldWtBal).toFixed(3);
                document.getElementById(prefix + 'Metal2RtCtWtBal1').value = parseFloat(silverWtBal).toFixed(3);
            } else {
                document.getElementById('metal1RtCtWtBal1').value = parseFloat(goldWtBal).toFixed(3);
                document.getElementById('metal2RtCtWtBal1').value = parseFloat(silverWtBal).toFixed(3);
                document.getElementById('metal1RtCtWtBal').value = parseFloat(goldWtBal).toFixed(3);
                document.getElementById('metal2RtCtWtBal').value = parseFloat(silverWtBal).toFixed(3);
                document.getElementById('metal1RtCtWtBalDisp').value = parseFloat(goldWtBal).toFixed(3) + ' ' + GoldWtType;
                document.getElementById('metal2RtCtWtBalDisp').value = parseFloat(silverWtBal).toFixed(3) + ' ' + SilverWtType;
            }
        }
    }
}
/****************************END Code calculation @Author: GAUR20MAY16*********************************************/
/****************************END Code calculation @Author: GAUR21APR16*********************************************/
/***********END Code To add calc itemsaleratecut by final fine wt @Author: GAUR03MAR16***************/

function getItemsaleRawMetalType(panelName, metalType, metalCount, firmId, rawGdPreId, rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId, metalTypePanel, cntr, otherChgsBy, totFinGdWt, totFinSlWt, goldTotFFineWtType, silverTotFFineWtType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalIdDiv" + metalCount).innerHTML = xmlhttp.responseText;
            // calcItemBalance();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogspmpydt" + default_theme + ".php?panelName=" + panelName + "&metalType=" + metalType +
            "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId + "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
            "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt + "&goldTotFFineWtType=" + goldTotFFineWtType + "&silverTotFFineWtType=" + silverTotFFineWtType, true);
    xmlhttp.send();
}

/****************************START Code ADD MULTIPLE ROW @Author: GAUR03MAR16*********************************************/
//******************************************************************Start code to change supplier home panel Author@:SANT9MAR16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT22MAR16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT7JUN16*******************
//******************Start code to change supplier home panel Author@:SANT20OCT16*************
//******************Start code to update supplier home panel Author@:GAUR13DEC16****************************************************
function showSuppHomePurchaseDetails(name, updPanelname, rateCutOpt, paymentType) {
//    var goldTotWt = document.getElementById('goldTotWt').value;
//    var goldTotWtType = document.getElementById('goldTotWtType').value;
//    var silverTotWt = document.getElementById('silverTotWt').value;
//    var silverTotWtType = document.getElementById('silverTotWtType').value;
//    var totRemBal = document.getElementById('totRemBal').value;
//    var transDate = document.getElementById('transDate').value;
    var userId = document.getElementById('userId').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("stockPanelSubDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogsuppaym" + default_theme + ".php?paymentPanelName=" + updPanelname + "&userId=" + userId + "&rateCutOpt=" + rateCutOpt + "&paymentType=" + paymentType, true);
    xmlhttp.send();
}
//stockPanelSubDiv
//+ "&suppPayId=" + isinId + "&preInvNo=" + payPreInvoiceNo + "&postInvNo=" + payInvoiceNo + "&totFinGdWt=" + totFinGdWt + "&silverTotFFineWt=" + silverTotFFineWt + "&goldTotFFineWtType=" + goldTotFFineWtType + "&silverTotFFineWtType=" + silverTotFFineWtType + "&leftAmount=" + leftAmount + "&firmId=" + firmId + "&userId=" + suppId
//******************END code to update supplier home panel Author@:GAUR13DEC16****************************************************
//*******************************End code to change supplier home panel Author@:SANT20OCT16*******************
//******************************************************************End code to change supplier home panel Author@:SANT7JUN16*******************
//******************************************************************End code to change supplier home panel Author@:SANT22MAR16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT22JUN16*******************
function showSuppHomeAllTranPurchaseDetails(suppPanelName, suppId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("suppHomePanelSubDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwsprdt" + default_theme + ".php?&suppPanelName=" + suppPanelName + "&suppId=" + suppId, true);
    xmlhttp.send();
}
//****************************End code to change supp home rate cut option Author:SANT22JUN16********************************
//****************************Start code to change supp home rate cut option Author:@SANT12MAR16********************************
//****************************Start code to change supp home rate cut option Author:@SANT10MAR16********************************
function calcSuppRawMetStock(prefix) {

    if (document.getElementById('metal1WtPrevBal1').value != '' || document.getElementById('metal1WtPurBal1').value != '' || document.getElementById('metal1WtRecBal1').value != '') {
        if (document.getElementById('metal1WtPrevBal1').value == '' || document.getElementById('metal1WtPrevBal1').value == 'NaN') {
            document.getElementById('metal1WtPrevBal1').value = 0;
        }
        if (document.getElementById('metal1WtPurBal1').value == '' || document.getElementById('metal1WtPurBal1').value == 'NaN') {
            document.getElementById('metal1WtPurBal1').value = 0;
        }
        if (document.getElementById('metal1WtRecBal1').value == '' || document.getElementById('metal1WtRecBal1').value == 'NaN') {
            document.getElementById('metal1WtRecBal1').value = 0;
        }
        if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
            if (document.getElementById('metal1RtCtWt').value == '' || document.getElementById('metal1RtCtWt').value == 'NaN') {
                document.getElementById('metal1RtCtWt').value = 0;
            }
            var totFinGdWtBal = parseFloat(document.getElementById('metal1WtPrevBal1').value) + parseFloat(document.getElementById('metal1WtPurBal1').value) - parseFloat(document.getElementById('metal1RtCtWt').value);
        } else {
            var totFinGdWtBal = parseFloat(document.getElementById('metal1WtPrevBal1').value) + parseFloat(document.getElementById('metal1WtPurBal1').value) - parseFloat(document.getElementById('metal1WtRecBal1').value);
        }
        document.getElementById('metal1WtFinBal').value = parseFloat(totFinGdWtBal).toFixed(3) + ' ' + document.getElementById('metal1WtPurBal1Type').value;
//        alert( document.getElementById('metal1WtFinBal').value);
        document.getElementById('metal1WtFinBal1').value = parseFloat(totFinGdWtBal);
        document.getElementById('metal1WtFinBal1Typ').value = document.getElementById('metal1WtPurBal1Type').value;
        if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
            var payTotalWeightType1 = document.getElementById('metal1RtCtWtType').value;
            var goldWeight = document.getElementById('metal1RtCtWt').value;
            var payMetalRate1 = document.getElementById('metal1Rate').value;
            if (payTotalWeightType1 == 'KG') {
                document.getElementById('metal1Valuation').value = ((goldWeight * payMetalRate1 * document.getElementById('gmWtInKg').value)).toFixed(2);
            } else if (payTotalWeightType1 == 'GM') {
                document.getElementById('metal1Valuation').value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(2);
            } else if (payTotalWeightType1 == 'MG') {
                document.getElementById('metal1Valuation').value = ((goldWeight * payMetalRate1) / (document.getElementById('gmWtInMg').value)).toFixed(2);
            }
        }
    }
    if (document.getElementById('metal2WtPrevBal1').value != '' || document.getElementById('metal2WtPurBal1').value != '' || document.getElementById('metal2WtRecBal1').value != '') {
        if (document.getElementById('metal2WtPrevBal1').value == '' || document.getElementById('metal2WtPrevBal1').value == 'NaN') {
            document.getElementById('metal2WtPrevBal1').value = 0;
        }
        if (document.getElementById('metal2WtPurBal1').value == '' || document.getElementById('metal2WtPurBal1').value == 'NaN') {
            document.getElementById('metal2WtPurBal1').value = 0;
        }
        if (document.getElementById('metal2WtRecBal1').value == '' || document.getElementById('metal2WtRecBal1').value == 'NaN') {
            document.getElementById('metal2WtRecBal1').value = 0;
        }
        if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
            if (document.getElementById('metal2RtCtWt').value == '' || document.getElementById('metal2RtCtWt').value == 'NaN') {
                document.getElementById('metal2RtCtWt').value = 0;
            }
            var totFinSrWtBal = parseFloat(document.getElementById('metal2WtPrevBal1').value) + parseFloat(document.getElementById('metal2WtPurBal1').value) - parseFloat(document.getElementById('metal2RtCtWt').value);
        } else {
            var totFinSrWtBal = parseFloat(document.getElementById('metal2WtPrevBal1').value) + parseFloat(document.getElementById('metal2WtPurBal1').value) - parseFloat(document.getElementById('metal2WtRecBal1').value);
        }


        document.getElementById('metal2WtFinBal').value = parseFloat(totFinSrWtBal).toFixed(3) + ' ' + document.getElementById('metal2WtPurBal1Type').value;
        document.getElementById('metal2WtFinBal1').value = parseFloat(totFinSrWtBal).toFixed(3);
        document.getElementById('metal2WtFinBal1Typ').value = document.getElementById('metal2WtPurBal1Type').value;
        if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
            var payTotalWeightType2 = document.getElementById('metal2RtCtWtType').value;
            var silverWeight = document.getElementById('metal2RtCtWt').value;
            var payMetalRate2 = document.getElementById('metal2Rate').value;
            if (payTotalWeightType2 == 'KG') {
                document.getElementById('metal2Valuation').value = ((silverWeight * payMetalRate2 * document.getElementById('srGmWtInKg').value)).toFixed(2);
            } else if (payTotalWeightType2 == 'GM') {
                document.getElementById('metal2Valuation').value = ((silverWeight * payMetalRate2) / document.getElementById('srGmWtInGm').value).toFixed(2);
            } else if (payTotalWeightType2 == 'MG') {
                document.getElementById('metal2Valuation').value = ((silverWeight * payMetalRate2) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
            }
//            document.getElementById(prefix + 'PayTotAmtRecDisp').value = parseFloat(document.getElementById('metal1Valuation').value) + parseFloat(document.getElementById('metal2Valuation').value);
        }
    }
    if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
        if (document.getElementById('metal1Valuation').value == '') {
            document.getElementById('metal1Valuation').value = 0;
        }
        if (document.getElementById('metal2Valuation').value == '') {
            document.getElementById('metal2Valuation').value = 0;
        }
        document.getElementById(prefix + 'PayTotAmtBalDisp').value = Math_round(parseFloat(document.getElementById('metal1Valuation').value) + parseFloat(document.getElementById('metal2Valuation').value)).toFixed(2);
        document.getElementById(prefix + 'PayTotAmtRec').value = parseFloat(parseFloat(document.getElementById('metal1Valuation').value) + parseFloat(document.getElementById('metal2Valuation').value)).toFixed(2);
//        alert(document.getElementById(prefix + 'PayTotAmtRec').value);
    }
}
//****************************Start code to change supp home rate cut option Author:@SANT10MAR16********************************
//***************Start code to add more raw metal line @Author: GAUR18MAR16************************************************//
function getStockRawMetalTypeForItemSell(panelName, metalType, metalCount, firmId, rawGdPreId, rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId, metalTypePanel, cntr, otherChgsBy, totFinGdWt, totFinSlWt, metalTypeId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalIdDiv" + metalCount).innerHTML = xmlhttp.responseText;
            document.getElementById(metalTypeId).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogspmpydt" + default_theme + ".php?panelName=" + panelName + "&metalType=" + metalType +
            "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId + "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
            "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt, true);
    xmlhttp.send();
}
//************Start code to add more raw metal line @Author: GAUR18MAR16************************************************//
/****************************START Code ADD MULTIPLE ROW @Author:SANT22MAR16********************************************/
function getMoreStockRawMetalDivForSuppDet(metalCnt, panelName, firmId, rawGdPreId, rawGdPostId, metalType, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
        metalPanelName, mcntr, rawPreId, rawPostId, otherChgsBy, totFinGdWt, totFinSlWt, suppId, suppUdhaarId, leftAmount) {
    metalPanel = panelName;
    metalCount = metalCnt;
    if (metalCount != '') {
        getMetalDiv = metalCount;
    }
    var poststr = "metalDivCount=" + metalCount
            + "&panelName=" + panelName + "&firmId=" + firmId
            + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&metalType=" + metalType + "&rawSlPreId=" + rawSlPreId +
            "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId +
            "&rawAlPostId=" + rawAlPostId + "&metalPanelName=" + metalPanelName
            + "&mcntr=" + mcntr + "&rawPreId=" + rawPreId + "&rawPostId=" + rawPostId
            + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt + "&suppId=" + suppId + "&suppUdhaarId=" + suppUdhaarId + "&leftAmount=" + leftAmount;
    get_more_raw_metal_div('include/php/ogsppydt' + default_theme + '.php', poststr);
    return false;
}
/****************************END Code ADD MULTIPLE ROW @Author:SANT22MAR16*********************************************/
//***************Start code to add more raw metal line @Author:SANT22MAR16 ************************************************//
function getStockRawMetalTypeForSuppDet(panelName, metalType, metalCount, firmId, rawGdPreId, rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId, metalTypePanel, cntr, otherChgsBy, totFinGdWt, totFinSlWt, metalTypeId, suppId, suppUdhaarId, leftAmount) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalIdDiv" + metalCount).innerHTML = xmlhttp.responseText;
            document.getElementById(metalTypeId).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogsppydt" + default_theme + ".php?panelName=" + panelName + "&metalType=" + metalType +
            "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId + "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
            "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt + "&suppId=" + suppId + "&suppUdhaarId=" + suppUdhaarId + "&leftAmount=" + leftAmount, true);
    xmlhttp.send();
}
//************Start code to add more raw metal line @Author:SANT22MAR16 ***********************************************//
/***********START Code To add itemsaleratecut by final fine wt @Author:SANT21MAR16 ***************/

function itemsaleRateCutForSupp(rateCutId, goldTotFFineWt, goldTotFFineWtType, silverTotFFineWt, silverTotFFineWtType, totGoldPay, totSilverPay, goldRate, silverRate, payPanelName, otherCharges, otherChgsBy, suppId, preInvNo, invNo) {
//    alert(rateCutId+'-'+goldTotFFineWt+'-'+goldTotFFineWtType+'-'+silverTotFFineWt+'-'+silverTotFFineWtType+'-'+totGoldPay+'-'+totSilverPay+'-'+goldRate+'-'+silverRate+'-'+payPanelName+'-'+otherCharges+'-'+otherChgsBy+'-'+suppId+'-'+preInvNo+'-'+invNo);

    var poststr = "rateCutOpt=" + encodeURIComponent(rateCutId) +
            "&goldTotFFineWt=" + encodeURIComponent(goldTotFFineWt) +
            "&goldTotFFineWtType=" + encodeURIComponent(goldTotFFineWtType) +
            "&silverTotFFineWt=" + encodeURIComponent(silverTotFFineWt) +
            "&silverTotFFineWtType=" + encodeURIComponent(silverTotFFineWtType) +
            "&totGoldPay=" + encodeURIComponent(totGoldPay) +
            "&totSilverPay=" + encodeURIComponent(totSilverPay) +
            "&goldRate=" + encodeURIComponent(goldRate) +
            "&silverRate=" + encodeURIComponent(silverRate) +
            "&otherCharges=" + encodeURIComponent(otherCharges) +
            "&payPanelName=" + encodeURIComponent(payPanelName) +
            "&otherChgsBy=" + encodeURIComponent(otherChgsBy) +
            "&payId=" + encodeURIComponent(document.getElementById('payId').value) +
            "&preInvId=" + encodeURIComponent(preInvNo) +
            "&invId=" + encodeURIComponent(invNo) +
            "&suppId=" + encodeURIComponent(suppId);
    if (rateCutId == 'RateCut') {
        itemsale_rate_cut_supp("include/php/ogsprtct" + default_theme + ".php", poststr);
    } else {
        itemsale_rate_cut_supp("include/php/ogspnrc" + default_theme + ".php", poststr);
    }
}
function itemsale_rate_cut_supp(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertitemsaleRateCutForSupp;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertitemsaleRateCutForSupp() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("rateCutDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }

}
/***********END Code To add itemsaleratecut by final fine wt @Author: SANT21MAR16**************/
//************Start code to add more raw metal line @Author: GAUR21MAR16************************************************//
function calcStockRrCtCashBalanceForItemSell(prefix) {
    if (document.getElementById(prefix + 'PayCashAmtRec').value != '' || document.getElementById(prefix + 'PayChequeAmt').value || document.getElementById(prefix + 'PayCardAmt').value) {
        var totalCashPaidAmt = document.getElementById(prefix + 'PayCashAmtRec').value;
        if (totalCashPaidAmt == null || totalCashPaidAmt == '') {
            totalCashPaidAmt = 0;
        }
        var totalChequeAmt = document.getElementById(prefix + 'PayChequeAmt').value;
        if (totalChequeAmt == null || totalChequeAmt == '') {
            totalChequeAmt = 0;
        }
        var totalCardAmt = document.getElementById(prefix + 'PayCardAmt').value;
        if (totalCardAmt == null || totalCardAmt == '') {
            totalCardAmt = 0;
        }
        document.getElementById(prefix + 'PayCashRecDisp').value = Math_round(parseFloat(totalCashPaidAmt) + parseFloat(totalChequeAmt) + parseFloat(totalCardAmt)).toFixed(2);
        document.getElementById(prefix + 'PayTotCashAmt').value = parseFloat(parseFloat(totalCashPaidAmt) + parseFloat(totalChequeAmt) + parseFloat(totalCardAmt)).toFixed(2);
    }

    if (document.getElementById('VATTax').value != '' || document.getElementById('VATTax').value != null) {
        var totalValuation = document.getElementById('taxOnTotAmt').value;
        if (totalValuation == null || totalValuation == '') {
            totalValuation = 0;
        }
        if (document.getElementById('VATTax').value == '') {
            document.getElementById('VATTax').value = 0;
        }
        var totTax = parseFloat(document.getElementById('VATTax').value) / 100;
        document.getElementById(prefix + 'PayVATAmtDisp').value = Math_round(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
        document.getElementById(prefix + 'PayVATAmt').value = parseFloat(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
    }

    if (document.getElementById(prefix + 'PayVATAmt').value == 'NaN' || document.getElementById(prefix + 'PayVATAmt').value == '') {
        document.getElementById(prefix + 'PayVATAmt').value = 0.00;
    }

    if (document.getElementById(prefix + 'PayTotCashAmt').value || document.getElementById(prefix + 'PayVATAmt').value || document.getElementById(prefix + 'PayDiscount').value != '') {
        var totalAmt = 0;
        if (document.getElementById(prefix + 'PayTotAmt').value == '' || document.getElementById(prefix + 'PayTotAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayTotAmt').value = 0;
        }
        if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
            if (document.getElementById(prefix + 'PayTotAmtRec').value == '' || document.getElementById(prefix + 'PayTotAmtRec').value == 'NaN') {
                document.getElementById(prefix + 'PayTotAmtRec').value = 0;
            }
            totalAmt = parseFloat(document.getElementById(prefix + 'PayTotAmtRec').value) + parseFloat(document.getElementById(prefix + 'PayTotAmt').value);
        } else {
            totalAmt = parseFloat(document.getElementById(prefix + 'PayTotAmt').value);
//            alert(totalAmt);
        }
        if (document.getElementById(prefix + 'PayPrevTotAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevTotAmt').value == '') {
            document.getElementById(prefix + 'PayPrevTotAmt').value = 0;
        }
        if (document.getElementById(prefix + 'PayPrevTotAmt').value != '' || document.getElementById(prefix + 'PayPrevTotAmt').value != 0) {
            if (document.getElementById(prefix + 'PayPrevTotAmt').value > 0) {
                totalAmt = totalAmt + parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value);
            } else {
                totalAmt = totalAmt - Math.abs(parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value));
            }
        }
        if (document.getElementById(prefix + 'PayVATAmt').value == '' || document.getElementById(prefix + 'PayVATAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayVATAmt').value = 0;
        }
        if (document.getElementById(prefix + 'PayDiscount').value == '' || document.getElementById(prefix + 'PayDiscount').value == 'NaN') {
            document.getElementById(prefix + 'PayDiscount').value = 0;
        }
        if (document.getElementById(prefix + 'PayTotCashAmt').value == '' || document.getElementById(prefix + 'PayTotCashAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayTotCashAmt').value = 0;
        }
        document.getElementById(prefix + 'PayDiscountDisp').value = Math_round(parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value))).toFixed(2);
//        alert('PayTotCashAmtDisp' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);
        document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
//        alert('calcStockRrCtCashBalance='+document.getElementById(prefix + 'PayFinAmtBalDisp').value);
        document.getElementById(prefix + 'PayTotAmtBal').value = parseFloat((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
    }
}
//************Start code to add more raw metal line @Author: GAUR21MAR16************************************************//
/****************************Start Code calculation @Author: SANT22MAR16*********************************************/
/****************************Start Code calculation @Author: SANT9JUN16*********************************************/
var goldWtBal;
var silverWtBal;
var GoldWtType;
var SilverWtType;
function calcStockItemBalanceForSuppPanel() {
//    alert(document.getElementById(prefix + 'SilverTotFineWtType').value);
    var metalEntered = 0;
    var metalCount = document.getElementById("metalCount").value;
    if (document.getElementById('metalPanel').value == 'StockPayment' || document.getElementById('metalPanel').value == 'StockPayUp') {
        var prefix = 'stock';
    } else if (document.getElementById('metalPanel').value == 'SuppPayment' || document.getElementById('metalPanel').value == 'SuppPayUp') {
        prefix = 'supDep';
    } else if (document.getElementById('metalPanel').value == 'CustSellPayment' || document.getElementById('metalPanel').value == 'CustSellPayUp') {
        prefix = 'sell';
    } else if (document.getElementById('metalPanel').value == 'NwOrPayment' || document.getElementById('metalPanel').value == 'NwOrPayUp') {
        prefix = 'nwOr';
    } else if (document.getElementById('metalPanel').value == 'RawPayment' || document.getElementById('metalPanel').value == 'RawPayUp') {
        prefix = 'rwPr';
    } else if (document.getElementById('metalPanel').value == 'SuppAddOrder' || document.getElementById('metalPanel').value == 'SuppOrderUp') {
        prefix = 'spOr';
    }
    if (document.getElementById('metalPanel').value == 'StockPayment' || document.getElementById('metalPanel').value == 'SuppPayment' ||
            document.getElementById('metalPanel').value == 'CustSellPayment' || document.getElementById('metalPanel').value == 'NwOrPayment' ||
            document.getElementById('metalPanel').value == 'RawPayment' || document.getElementById('metalPanel').value == 'SuppAddOrder') {
        count = 1;
        delId = 'del' + 1;
    } else if (document.getElementById('metalPanel').value == 'StockPayUp' || document.getElementById('metalPanel').value == 'SuppPayUp' ||
            document.getElementById('metalPanel').value == 'CustSellPayUp' || document.getElementById('metalPanel').value == 'NwOrPayUp' ||
            document.getElementById('metalPanel').value == 'RawPayUp' || document.getElementById('metalPanel').value == 'SuppOrderUp') {
        getMetalDiv = document.getElementById('noOfRawMet').value;
        var count = document.getElementById('rawId').value;
        var delId = 'del' + count;
    }
    var totAmtRec = 0;
    var gdBal = 0;
    var slBal = 0;
    var totRecGd = 0;
    var totRecSl = 0;
    var goldWeight = 0;
    var silverWeight = 0;
    var silverWeightType = '';
    var goldWeightType = '';
    GoldWtType = '';
    SilverWtType = '';
    goldWtBal = 0;
    silverWtBal = 0;
    //    for (var dc = count; dc <= getMetalDiv; dc++) { 
    for (var dc = count; getMetalDiv != ''; dc++) {
        if (document.getElementById('metalDel' + dc).value != 'Deleted') {
            var payTotalWeight1 = document.getElementById(prefix + 'PayMetal1RecWt' + dc).value;
            var payTotalWeightType1 = document.getElementById(prefix + 'PayMetal1RecWtType' + dc).value;
//            alert(payTotalWeightType1);
            var payMetalRate1 = document.getElementById(prefix + 'PayMetal1Rate' + dc).value;
            var payMetalTunch1 = document.getElementById(prefix + 'PayMetal1Tunch' + dc).value;
            var metalWeight = (payTotalWeight1 * payMetalTunch1) / 100;
            document.getElementById(prefix + 'PayMetal1FnWt' + dc).value = parseFloat(metalWeight).toFixed(2);
            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold' || document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Alloy') {
                goldWeight = metalWeight;
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) * document.getElementById('gmWtInKg').value).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInMg').value).toFixed(2);
                }
                if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold') {
                    var payMetalDueWeightType1 = document.getElementById(prefix + 'GoldTotFineWtType').value;
                    goldWeightType = payMetalDueWeightType1;
//                    alert(payMetalDueWeightType1 + '-' + payTotalWeightType1);
                    if (gdBal == '') {
                        gdBal = document.getElementById(prefix + 'GoldTotFineWt').value;
//                        alert(prefix + 'GoldTotFineWt');
//                        alert(gdBal);
                    }
//                    alert(gdBal);
                    if (payMetalDueWeightType1 == 'KG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(2);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight / 1000)).toFixed(2);
                            goldWeight = parseFloat(goldWeight / 1000).toFixed(2);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000 * 1000))).toFixed(2);
                            goldWeight = parseFloat(goldWeight / (1000 * 1000)).toFixed(2);
                        }
                    } else if (payMetalDueWeightType1 == 'GM') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(2);
                            goldWeight = parseFloat(goldWeight * 1000).toFixed(2);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(2);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000))).toFixed(2);
                            goldWeight = parseFloat(goldWeight / 1000).toFixed(2);
                        }
                    } else if (payMetalDueWeightType1 == 'MG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000 * 1000)).toFixed(2);
                            goldWeight = parseFloat(goldWeight * 1000 * 1000).toFixed(2);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(2);
                            goldWeight = parseFloat(goldWeight * 1000).toFixed(2);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat((gdBal - goldWeight)).toFixed(2);
                        }
                    }
                    document.getElementById(prefix + 'PayMetal1Bal' + dc).value = gdBal;
                    document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                    goldWtBal = parseFloat(gdBal).toFixed(3);
                    GoldWtType = payMetalDueWeightType1;
                    totRecGd += goldWeight;
//                    alert(totRecGd);
                }
            }
//            alert(document.getElementById(prefix + 'PayMetalType1' + dc).value);
            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Silver') {
                silverWeight = metalWeight;
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1 * document.getElementById('srGmWtInKg').value)).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1) / document.getElementById('srGmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                }
                payMetalDueWeightType1 = document.getElementById(prefix + 'SilverTotFineWtType').value;
                silverWeightType = payMetalDueWeightType1;
                if (slBal == '') {
//                    alert(document.getElementById(prefix + 'SilverTotFineWt').value);
                    slBal = document.getElementById(prefix + 'SilverTotFineWt').value;
//                    slBal = document.getElementById('slprSilverTotFineWt').value;

                }
                if (payMetalDueWeightType1 == 'KG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat((slBal) - silverWeight).toFixed(2);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - silverWeight / 1000)).toFixed(2);
                        silverWeight = parseFloat(silverWeight / 1000).toFixed(2);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - silverWeight / (1000 * 1000))).toFixed(2);
                        silverWeight = parseFloat(silverWeight / (1000 * 1000)).toFixed(2);
                    }
                } else if (payMetalDueWeightType1 == 'GM') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(2);
                        silverWeight = parseFloat(silverWeight * 1000).toFixed(2);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat((slBal) - silverWeight).toFixed(2);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - silverWeight / (1000))).toFixed(2);
                        silverWeight = parseFloat(silverWeight / 1000).toFixed(2);
                    }
                } else if (payMetalDueWeightType1 == 'MG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000 * 1000)).toFixed(2);
                        silverWeight = parseFloat(silverWeight * 1000 * 1000).toFixed(2);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(2);
                        silverWeight = parseFloat(silverWeight * 1000).toFixed(2);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat((slBal - silverWeight)).toFixed(2);
                    }
                }
                document.getElementById(prefix + 'PayMetal1Bal' + dc).value = slBal;
                document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
//                alert(silverWtBal);
                silverWtBal = parseFloat(slBal).toFixed(3);
                SilverWtType = payMetalDueWeightType1;
                totRecSl += silverWeight;
            }
            document.getElementById('metal1WtRecBal').value = parseFloat(totRecGd).toFixed(3) + ' ' + goldWeightType;
            document.getElementById('metal1WtRecBal1').value = parseFloat(totRecGd).toFixed(3);
            document.getElementById('metal1WtRecBal1Typ').value = goldWeightType;
            document.getElementById('metal2WtRecBal').value = parseFloat(totRecSl).toFixed(3) + ' ' + silverWeightType;
            document.getElementById('metal2WtRecBal1').value = parseFloat(totRecSl).toFixed(3);
            document.getElementById('metal2WtRecBal1Typ').value = silverWeightType;
            if (document.getElementById(prefix + 'PayMetal1Val' + dc).value == '') {
                document.getElementById(prefix + 'PayMetal1Val' + dc).value = 0;
            }
            totAmtRec += parseFloat(document.getElementById(prefix + 'PayMetal1Val' + dc).value);
//            alert(totAmtRec);
//            alert(document.getElementById(prefix + 'PayTotAmtRec'))
//            document.getElementById(prefix + 'PayTotAmtRec').value = parseFloat(totAmtRec).toFixed(2);
//            alert('paytotamtrec='+document.getElementById(prefix + 'PayTotAmtRec').value);
//            document.getElementById(prefix + 'PayTotAmtRecDisp').value = document.getElementById(prefix + 'PayTotAmtRec').value;
//            calcCashBalance(prefix);
            calcRawMetStock(prefix);
            calcStockRrCtCashBalance(prefix);
        }
        metalEntered++;
    }
    return false;
}
/****************************END Code calculation @Author: SANT9JUN16*********************************************/
/****************************END Code calculation @Author: SANT22MAR16*********************************************/
/****************************START Code LOAN BUTTON @Author: GAUR29MAR16*********************************************/

function cust_girvi_details_for_loan(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertCustGirviDetailsForLoan;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertCustGirviDetailsForLoan() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }

}
function custGirviDetailsForLoan(custId, firmId) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "custId=" + custId +
            "&firmId=" + firmId +
            "&jrmnId=" + encodeURIComponent(document.getElementById("jrmnId").value) +
            "&jrmnStartYr=" + encodeURIComponent(document.getElementById("jrmnStartYr").value) +
            "&jrmnEndYr=" + encodeURIComponent(document.getElementById("jrmnEndYr").value) +
            "&accId=" + encodeURIComponent(document.getElementById("accId").value) +
            "&opBalCust=" + encodeURIComponent(document.getElementById("opBalCust").value) +
            "&clBalCust=" + encodeURIComponent(document.getElementById("clBalCust").value) +
            "&drAmtCust=" + encodeURIComponent(document.getElementById("drAmtCust").value) +
            "&crAmtCust=" + encodeURIComponent(document.getElementById("crAmtCust").value);
    cust_girvi_details_for_loan('include/php/olaccgdt' + default_theme + '.php', poststr);
}

/****************************END Code LOAN BUTTON calculation @Author: GAUR29MAR16*********************************************/



/****************************ADD Code add loan calculation @Author: GAUR29MAR16*********************************************/
function cust_loan_panel(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertCustLoanPanel;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertCustLoanPanel() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }

}
function custLoanPanel(custId, firmId) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "custId=" + custId +
            "&firmId=" + firmId +
            "&jrmnId=" + encodeURIComponent(document.getElementById("jrmnId").value) +
            "&jrmnStartYr=" + encodeURIComponent(document.getElementById("jrmnStartYr").value) +
            "&jrmnEndYr=" + encodeURIComponent(document.getElementById("jrmnEndYr").value) +
            "&accId=" + encodeURIComponent(document.getElementById("accId").value) +
            "&opBalCust=" + encodeURIComponent(document.getElementById("opBalCust").value) +
            "&clBalCust=" + encodeURIComponent(document.getElementById("clBalCust").value) +
            "&drAmtCust=" + encodeURIComponent(document.getElementById("drAmtCust").value) +
            "&crAmtCust=" + encodeURIComponent(document.getElementById("crAmtCust").value) +
            "&optionGirviTypeOpen=selected";
    cust_loan_panel('include/php/omacadln' + default_theme + '.php', poststr);
}
/****************************END Code add loan calculation @Author: GAUR29MAR16*********************************************/

//****************************Start Navigate Girvi @Author: GAUR29MAR16 *******************************************************************
function navigationGirviForLoanPanel(pageNo, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLdGirviInfoBelowButtPanelDiv").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLdGirviInfoBelowButtPanelDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olaccgdt" + default_theme + ".php?page=" + pageNo + "&custId=" + custId, true); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
//****************************End Navigate Girvi @Author: GAUR29MAR16  *******************************************************************
//*****************************Start code to change moneypanel home page Author:SANT28APR16********************************
function closeAdvMetalDiv1() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "hidden";
            document.getElementById("addNewUdhaarDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
function closeAdvMoneyDiv1() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "hidden";
            document.getElementById("addNewUdhaarDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//*****************************End code to change moneypanel home page Author:SANT28APR16********************************
//****************************** Start Code to change add new fun for raw metal details show on supp home and delete nominee @Author:SANT24MAY16 ********************>
function showSuppInfoForRawMetal(prSuppId, newPreInvoiceNo, newInvoiceNo, panel, userType) {
//    alert(userType);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (userType == 'CUSTOMER') {
//        xmlhttp.open("POST", "include/php/ogwhmndv"+ default_theme +".php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&userId=" + prSuppId + "&suppPanelOption=" + panel, true);
    } else {
        xmlhttp.open("POST", "include/php/ogwhmndv" + default_theme + ".php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&suppId=" + prSuppId + "&suppPanelOption=" + panel, true);
    }
    xmlhttp.send();
}

function changeNomineeStatus(custId, action) {
    if (action == 'Delete') {
        confirm_box = confirm(deletePermAlertMess + "\nDo you really want to delete this Nominee ?"); //change in line @AUTHOR: SANDY28JAN14
    }
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ajax_loading_div").style.visibility = "hidden";
                document.getElementById("customerListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omchcsst" + default_theme + ".php?custId=" + custId + "&action=" + action, true);
        xmlhttp.send();
    }
}
//*****************************End Code to change add new fun for raw metal details show on supp home and delete nominee @Author:SANT24MAY16*******************************
//****************************** Start Code to change add new nominee for customer@Author:SANT25MAY16 ********************>
//****************************** Start Code to change add new nominee for customer@Author:SANT27MAY16 ********************>
function getAddNominee(custPanelOption) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&custPanelOption=" + custPanelOption,
            true);
    xmlhttp.send();
}
function getLoyaltyPoints(custPanelOption) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("main_middle").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omloyaltypts" + default_theme + ".php?custId=" + custId + "&custPanelOption=" + custPanelOption,
            true);
    xmlhttp.send();
}
function getLoyaltyCardNo(custPanelOption) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("main_middle").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcdcddv" + default_theme + ".php?custId=" + custId + "&custPanelOption=" + custPanelOption,
            true);
    xmlhttp.send();
}
function searchCustToAddInNominee(mainCustId, custName, custUId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("custListDivToAddInCircle").innerHTML = xmlhttp.responseText;
        }
    };
    var poststr = "custName=" + encodeURIComponent(custName)
            + "&custUId=" + encodeURIComponent(custUId)
            + "&mainCustId=" + encodeURIComponent(mainCustId);
    xmlhttp.open("GET", "include/php/omnmcsrrs" + default_theme + ".php?" + poststr, true);
    xmlhttp.send();
}
function deleteCustFromNominee(mainCustId, custId) {
    confirm_box = confirm("Do you really want to remove this customer from Nominee?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "include/php/omnmcremo" + default_theme + ".php?mainCustId=" + mainCustId + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
function addNominee(custId, mainCustId) {
    loadXMLDoc();
    if (validateEmptyField(document.getElementById("custCircleRelationId" + custId).value, "Please Enter Relation!") == false) {
        document.getElementById("custCircleRelationId" + custId).focus();
        return false;
    } else {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", "include/php/omnmcread" + default_theme + ".php?custId=" + custId + "&mainCustId=" + mainCustId, true);
        xmlhttp.send();
    }
}
//****************************** End Code to change add new nominee for customer@Author:SANT27MAY16 ********************>
/****************************START Code ADD THE LOAN LIST OPTION @Author: GAUR28MAY16*********************************************/
/****************************update Code ADD THE LOAN LIST OPTION @Author: GAUR02JUNE16*********************************************/
/****************************update Code ADD THE COLLECTION OR NON COLLECTION LIST @Author: GAUR14JUL16*********************************************/

/****************************update Code ADD girvi valuation active nad relesed @Author: GAUR10AUG16*********************************************/

function showLayoutGirviListPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olgglypn" + default_theme + ".php", true);
    xmlhttp.send();
}

//+ "&actLpOmInt=" + document.getElementById("actLpOmInt").checked
function actlpAccessButton(panel) {
    panelName = panel;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//    document.getElementById("actlpAccessButton").style.visibility = "hidden";

    confirm_box = confirm("Are You Sure To Allow Access To This Options!");
    if (confirm_box == true)
    {
        if (panelName == 'active') {
            poststr = "actLpSno=" + document.getElementById("actLpSno").checked
                    + "&actLpPrinAmt=" + document.getElementById("actLpPrinAmt").checked
                    + "&actLpTotprin=" + document.getElementById("actLpTotprin").checked
                    + "&actLpInt=" + document.getElementById("actLpInt").checked
                    + "&actLpTotAmt=" + document.getElementById("actLpTotAmt").checked
                    + "&actLpCustName=" + document.getElementById("actLpCustName").checked
                    + "&actLpFatherName=" + document.getElementById("actLpFatherName").checked
                    + "&actLpMobno=" + document.getElementById("actLpMobno").checked
                    + "&actLpCity=" + document.getElementById("actLpCity").checked
                    + "&actLpFirm=" + document.getElementById("actLpFirm").checked
                    + "&actLpAloan=" + document.getElementById("actLpAloan").checked
                    + "&actLpOtherIn=" + document.getElementById("actLpOtherIn").checked
                    + "&actLpDay=" + document.getElementById("actLpDay").checked
                    + "&actLpGirviVal=" + document.getElementById("actLpGirviVal").checked
                    + "&actLpSdate=" + document.getElementById("actLpSdate").checked
                    + "&actLpSign=" + document.getElementById("actLpSign").checked
                    + "&actLpSms=" + document.getElementById("actLpSms").checked
                    + "&panel=" + encodeURIComponent(panelName);
        } else if (panelName == 'transferred') {
            poststr = "transLpSno=" + document.getElementById("transLpSno").checked
                    + "&transLpPktno=" + document.getElementById("transLpPktno").checked
                    + "&transLpPrinAmt=" + document.getElementById("transLpPrinAmt").checked
                    + "&transLpIntAmt=" + document.getElementById("transLpIntAmt").checked
                    + "&transLpTotAmt=" + document.getElementById("transLpTotAmt").checked
                    + "&transLpCustName=" + document.getElementById("transLpCustName").checked
                    + "&transLpFatherName=" + document.getElementById("transLpFatherName").checked
                    + "&transLpCity=" + document.getElementById("transLpCity").checked
                    + "&transLpEfirm=" + document.getElementById("transLpEfirm").checked
                    + "&transLpTfirm=" + document.getElementById("transLpTfirm").checked
                    + "&transLpOtherIn=" + document.getElementById("transLpOtherIn").checked
                    + "&transLpSdate=" + document.getElementById("transLpSdate").checked
                    + "&transLpRdate=" + document.getElementById("transLpRdate").checked
                    + "&transLpTyp=" + document.getElementById("transLpTyp").checked
                    + "&transLpSt=" + document.getElementById("transLpSt").checked
                    + "&transLpDel=" + document.getElementById("transLpDel").checked
                    + "&panel=" + encodeURIComponent(panelName);
        } else if (panelName == 'released') {
            poststr = "relLpSno=" + document.getElementById("relLpSno").checked
                    + "&relLpPrinAmt=" + document.getElementById("relLpPrinAmt").checked
                    + "&relLpTotPrinAmt=" + document.getElementById("relLpTotPrinAmt").checked
                    + "&relLpPrinAmtInt=" + document.getElementById("relLpPrinAmtInt").checked
                    + "&relLpToatalPrinAmt=" + document.getElementById("relLpToatalPrinAmt").checked
                    + "&relLpCustName=" + document.getElementById("relLpCustName").checked
                    + "&relLpFatherName=" + document.getElementById("relLpFatherName").checked
                    + "&relLpMobno=" + document.getElementById("relLpMobno").checked
                    + "&relLpCity=" + document.getElementById("relLpCity").checked
                    + "&relLpExFirm=" + document.getElementById("relLpExFirm").checked
                    + "&relLpTrFirm=" + document.getElementById("relLpTrFirm").checked
                    + "&relLpSdate=" + document.getElementById("relLpSdate").checked
                    + "&relLpReldate=" + document.getElementById("relLpReldate").checked
                    + "&relLpGirviVal=" + document.getElementById("relLpGirviVal").checked
                    + "&relLpSign=" + document.getElementById("relLpSign").checked
                    + "&relLpSms=" + document.getElementById("relLpSms").checked
                    + "&panel=" + encodeURIComponent(panelName);
        } else if (panelName == 'loss') {
            poststr = "lossLpSno=" + document.getElementById("lossLpSno").checked
                    + "&lossLpPrinAmt=" + document.getElementById("lossLpPrinAmt").checked
                    + "&lossLpCustName=" + document.getElementById("lossLpCustName").checked
                    + "&lossLpFatherName=" + document.getElementById("lossLpFatherName").checked
                    + "&lossLpMobno=" + document.getElementById("lossLpMobno").checked
                    + "&lossLpCity=" + document.getElementById("lossLpCity").checked
                    + "&lossLpExFirm=" + document.getElementById("lossLpExFirm").checked
                    + "&lossLpTotAmt=" + document.getElementById("lossLpTotAmt").checked
                    + "&lossLpGirviVal=" + document.getElementById("lossLpGirviVal").checked
                    + "&lossLpL=" + document.getElementById("lossLpL").checked
                    + "&lossLpOtherIn=" + document.getElementById("lossLpOtherIn").checked
                    + "&lossLpSdate=" + document.getElementById("lossLpSdate").checked
                    + "&lossLpNt=" + document.getElementById("lossLpNt").checked
                    + "&lossLpSms=" + document.getElementById("lossLpSms").checked
                    + "&panel=" + encodeURIComponent(panelName);
        } else if (panelName == 'unRelTrans') {
            poststr = "unRelTLpSno=" + document.getElementById("unRelTLpSno").checked
                    + "&unRelTLpPktno=" + document.getElementById("unRelTLpPktno").checked
                    + "&unRelTLpCustName=" + document.getElementById("unRelTLpCustName").checked
                    + "&unRelTLpFatherName=" + document.getElementById("unRelTLpFatherName").checked
                    + "&unRelTLpCity=" + document.getElementById("unRelTLpCity").checked
                    + "&unRelTLpEfirm=" + document.getElementById("unRelTLpEfirm").checked
                    + "&unRelTLpTfirm=" + document.getElementById("unRelTLpTfirm").checked
                    + "&unRelTLpOtherIn=" + document.getElementById("unRelTLpOtherIn").checked
                    + "&unRelTLpSdate=" + document.getElementById("unRelTLpSdate").checked
                    + "&unRelTLpTyp=" + document.getElementById("unRelTLpTyp").checked
                    + "&unRelTLpPrinAmt=" + document.getElementById("unRelTLpPrinAmt").checked
                    + "&unRelTLpRel=" + document.getElementById("unRelTLpRel").checked
                    + "&unRelTLpDel=" + document.getElementById("unRelTLpDel").checked
                    + "&panel=" + encodeURIComponent(panelName);
        } else if (panelName == 'timePrExp') {
            poststr = "timePrExpLpSno=" + document.getElementById("timePrExpLpSno").checked
                    + "&timePrExpLpPrinAmt=" + document.getElementById("timePrExpLpPrinAmt").checked
                    + "&timePrExpLpCustName=" + document.getElementById("timePrExpLpCustName").checked
                    + "&timePrExpLpFatherName=" + document.getElementById("timePrExpLpFatherName").checked
                    + "&timePrExpLpMobno=" + document.getElementById("timePrExpLpMobno").checked
                    + "&timePrExpLpCity=" + document.getElementById("timePrExpLpCity").checked
                    + "&timePrExpLpEfirm=" + document.getElementById("timePrExpLpEfirm").checked
                    + "&timePrExpLpTp=" + document.getElementById("timePrExpLpTp").checked
                    + "&timePrExpLpOtherIn=" + document.getElementById("timePrExpLpOtherIn").checked
                    + "&timePrExpLpSdate=" + document.getElementById("timePrExpLpSdate").checked
                    + "&panel=" + encodeURIComponent(panelName);
        } else if (panelName == 'oldExp') {
            poststr = "oldExpLpSno=" + document.getElementById("oldExpLpSno").checked
                    + "&oldExpLpPrinAmt=" + document.getElementById("oldExpLpPrinAmt").checked
                    + "&oldExpLpCustName=" + document.getElementById("oldExpLpCustName").checked
                    + "&oldExpLpFatherName=" + document.getElementById("oldExpLpFatherName").checked
                    + "&oldExpLpMobno=" + document.getElementById("oldExpLpMobno").checked
                    + "&oldExpLpCity=" + document.getElementById("oldExpLpCity").checked
                    + "&oldExpLpExFirm=" + document.getElementById("oldExpLpExFirm").checked
                    + "&oldExpLpOtherIn=" + document.getElementById("oldExpLpOtherIn").checked
                    + "&oldExpLpSdate=" + document.getElementById("oldExpLpSdate").checked
                    + "&panel=" + encodeURIComponent(panelName);
        } else if (panelName == 'collect') {
            poststr = "collectSno=" + document.getElementById("collectSno").checked
                    + "&collectTotamt=" + document.getElementById("collectTotamt").checked
                    + "&collectCustName=" + document.getElementById("collectCustName").checked
                    + "&collectCity=" + document.getElementById("collectCity").checked
                    + "&collectExFirm=" + document.getElementById("collectExFirm").checked
                    + "&collectStaff=" + document.getElementById("collectStaff").checked
                    + "&collectStatus=" + document.getElementById("collectStatus").checked
                    + "&collectSdate=" + document.getElementById("collectSdate").checked
                    + "&collectDueDate=" + document.getElementById("collectDueDate").checked
                    + "&collectPdate=" + document.getElementById("collectPdate").checked
                    + "&panel=" + encodeURIComponent(panelName);
        } else if (panelName == 'nonCollect') {
            poststr = "nonCollectSno=" + document.getElementById("nonCollectSno").checked
                    + "&nonCollectEmi=" + document.getElementById("nonCollectEmi").checked
                    + "&nonCollectDue=" + document.getElementById("nonCollectDue").checked
                    + "&nonCollectTotamt=" + document.getElementById("nonCollectTotamt").checked
                    + "&nonCollectCustName=" + document.getElementById("nonCollectCustName").checked
                    + "&nonCollectCity=" + document.getElementById("nonCollectCity").checked
                    + "&nonCollectFirm=" + document.getElementById("nonCollectFirm").checked
                    + "&nonCollectStaff=" + document.getElementById("nonCollectStaff").checked
                    + "&nonCollectSdate=" + document.getElementById("nonCollectSdate").checked
                    + "&nonCollectDueDate=" + document.getElementById("nonCollectDueDate").checked
                    + "&nonCollectComm=" + document.getElementById("nonCollectComm").checked
                    + "&panel=" + encodeURIComponent(panelName);
        }
        add_actlp_access('include/php/olgglypn' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        document.getElementById("actlpAccessButton").style.visibility = "visible";
        return false;
    }
}
function add_actlp_access(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertActlpAccessButton;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertActlpAccessButton() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("loanAccessDiv").innerHTML = xmlhttp.responseText;
//         alert( document.getElementById("commonAccessDiv").innerHTML);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/****************************update Code ADD girvi valuation active nad relesed @Author: GAUR10AUG16*********************************************/
/****************************update Code ADD THE COLLECTION OR NON COLLECTION LIST @Author: GAUR14JUL16*********************************************/
/****************************END Code ADD THE LOAN LIST OPTION @Author: GAUR28MAY16*********************************************/
/****************************START Code ADD FINANCE LOAN LIST NEXT PREV button  @Author: GAUR20JUN16*********************************************/
function navigationFinanceLoansListPanel(button, offset, totalGirviProcessed, maxLimit, maxLimitProcess, selFirmId, sortKeyword, rowsPerPage, pageNo, searchColumn, searchValue) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "visible";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/omfnllpn" + default_theme + ".php?button=" + button + "&offset=" + offset + "&totalGirviProcessed=" + totalGirviProcessed + "&maxLimit=" + maxLimit + "&maxLimitProcess=" + maxLimitProcess +
            "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&rowsPerPage=" + rowsPerPage + "&page=" + pageNo + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue, true);
    xmlhttp.send();
}
/****************************END Code ADD THE FINANCE LOAN LIST NEXT PREV  button @Author: GAUR20JUN16*********************************************/
//***************Start code to customer and supplier Order panel @Author: SANT14UL16************************************************//
//***************Start code to customer and supplier Order panel @Author: SANT29JUL16************************************************//
//***************Start code to customer and supplier Order panel @Author: SANT10AUG16************************************************//
//***************Start code to customer and supplier Order panel @Author: SANT12AUG16************************************************//
//***************Start code to customer and supplier Order panel @Author: SANT23AUG16************************************************//
//***************Start code to customer and supplier Order panel @Author: SANT24AUG16************************************************//
//***************Start code to customer and supplier Order panel @Author: SANT26AUG16************************************************//

//***************Start code to customer and supplier Order panel @Author: SANT03SEP16************************************************//

//***************Start code to customer and supplier Order panel @Author: SANT19SEP16************************************************//
function getStockRawMetalTypeForOrder(panelName, metalType, metalCount, firmId, rawGdPreId, rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId, metalTypePanel, cntr, otherChgsBy, totFinGdWt, totFinSlWt, metalTypeId, goldRate, silverRate) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalIdDiv" + metalCount).innerHTML = xmlhttp.responseText;
            document.getElementById(metalTypeId).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwhorpydt" + default_theme + ".php?panelName=" + panelName + "&metalType=" + metalType +
            "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId + "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
            "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt + "&goldRate=" + goldRate + "&silverRate=" + silverRate, true);
    xmlhttp.send();
}
var goldWtBal = 0;
var silverWtBal = 0;
var GoldWtType = null;
var SilverWtType = null;
var stockDiv = null;
function calcStockItemBalanceForItemSellForOrder() {
    var metalEntered = 0;
    var metalCount = document.getElementById("metalCount").value;
    if (document.getElementById('metalPanel').value == 'StockPayment' || document.getElementById('metalPanel').value == 'StockPayUp') {
        var prefix = 'stock';
    } else if (document.getElementById('metalPanel').value == 'SuppAddOrder' || document.getElementById('metalPanel').value == 'SuppOrderUp') {
        prefix = 'spOr';
    } else if (document.getElementById('metalPanel').value == 'CustSellPayment' || document.getElementById('metalPanel').value == 'CustSellPayUp') {
        prefix = 'sell';
    } else if (document.getElementById('metalPanel').value == 'NwOrPayment' || document.getElementById('metalPanel').value == 'NwOrPayUp') {
        prefix = 'nwOr';
    } else if (document.getElementById('metalPanel').value == 'RawPayment' || document.getElementById('metalPanel').value == 'RawPayUp') {
        prefix = 'rwPr';
    } else if (document.getElementById('metalPanel').value == 'SuppOrderDeliev' || document.getElementById('metalPanel').value == 'SuppOrderDeliveryUp') {
        prefix = 'spOrDel';
    } else if (document.getElementById('metalPanel').value == 'NwOrDelPayment' || document.getElementById('metalPanel').value == 'NwOrDelPaymentUp') {
        prefix = 'nwOrDel';
    }
    if (document.getElementById('metalPanel').value == 'StockPayment' || document.getElementById('metalPanel').value == 'SuppAddOrder' ||
            document.getElementById('metalPanel').value == 'CustSellPayment' || document.getElementById('metalPanel').value == 'NwOrPayment' ||
            document.getElementById('metalPanel').value == 'RawPayment' || document.getElementById('metalPanel').value == 'SuppOrderDeliev' || document.getElementById('metalPanel').value == 'NwOrDelPayment') {
        count = 1;
        delId = 'del' + 1;
    } else if (document.getElementById('metalPanel').value == 'StockPayUp' || document.getElementById('metalPanel').value == 'SellPayUp' ||
            document.getElementById('metalPanel').value == 'CustSellPayUp' || document.getElementById('metalPanel').value == 'NwOrPayUp' ||
            document.getElementById('metalPanel').value == 'RawPayUp' || document.getElementById('metalPanel').value == 'SuppOrderUp' || document.getElementById('metalPanel').value == 'SuppOrderDeliveryUp' || document.getElementById('metalPanel').value == 'NwOrDelPaymentUp') {
        getMetalDiv = document.getElementById('noOfRawMet').value;
        var count = document.getElementById('rawId').value;
        var delId = 'del' + count;
    }
    var totAmtRec = 0;
    var gdBal = 0;
    var slBal = 0;
    var totRecGd = 0;
    var totRecSl = 0;
    var goldWeight = 0;
    var silverWeight = 0;
    var silverWeightType = '';
    var goldWeightType = '';
    GoldWtType = '';
    SilverWtType = '';
    goldWtBal = 0;
    silverWtBal = 0;
    //    for (var dc = count; dc <= getMetalDiv; dc++) { 
    for (var dc = count; getMetalDiv != ''; dc++) {
        if (document.getElementById('metalDel' + dc).value != 'Deleted') {
            var payTotalWeight1 = document.getElementById(prefix + 'PayMetal1RecWt' + dc).value;
            var payTotalWeightType1 = document.getElementById(prefix + 'PayMetal1RecWtType' + dc).value;
//            alert(payTotalWeightType1);
            var payMetalRate1 = document.getElementById(prefix + 'PayMetal1Rate' + dc).value;
            var payMetalTunch1 = document.getElementById(prefix + 'PayMetal1Tunch' + dc).value;
            var metalWeight = (payTotalWeight1 * payMetalTunch1) / 100;
            document.getElementById(prefix + 'PayMetal1FnWt' + dc).value = parseFloat(metalWeight).toFixed(2);
            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold' || document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Alloy') {
                goldWeight = metalWeight;
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) * document.getElementById('gmWtInKg').value).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInMg').value).toFixed(2);
                }

                if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold') {

                    var payMetalDueWeightType1 = document.getElementById(prefix + 'GoldTotFineWtType').value;
                    goldWeightType = payMetalDueWeightType1;
                    if (gdBal == '') {
                        gdBal = document.getElementById(prefix + 'GoldTotFineWt').value;
                    }

                    if (payMetalDueWeightType1 == 'KG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight / 1000)).toFixed(3);
                            goldWeight = parseFloat(goldWeight / 1000).toFixed(2);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000 * 1000))).toFixed(3);
                            goldWeight = parseFloat(goldWeight / (1000 * 1000)).toFixed(3);
                        }
                    } else if (payMetalDueWeightType1 == 'GM') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(3);
                            goldWeight = parseFloat(goldWeight * 1000).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(3);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000))).toFixed(3);
                            goldWeight = parseFloat(goldWeight / 1000).toFixed(3);
                        }
                    } else if (payMetalDueWeightType1 == 'MG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000 * 1000)).toFixed(3);
                            goldWeight = parseFloat(goldWeight * 1000 * 1000).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(3);
                            goldWeight = parseFloat(goldWeight * 1000).toFixed(3);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat((gdBal - goldWeight)).toFixed(3);
                        }
                    }
                    document.getElementById(prefix + 'PayMetal1Bal' + dc).value = gdBal;
//                    alert( document.getElementById(prefix + 'PayMetal1Bal' + dc).value);
                    document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                    goldWtBal = parseFloat(gdBal).toFixed(3);
                    GoldWtType = payMetalDueWeightType1;
                    totRecGd += goldWeight;
//                    alert(totRecGd);
                }
            }
            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Silver') {
                silverWeight = metalWeight;
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1 * document.getElementById('srGmWtInKg').value)).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1) / document.getElementById('srGmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                }

                payMetalDueWeightType1 = document.getElementById(prefix + 'SilverTotFineWtType').value;
                silverWeightType = payMetalDueWeightType1;
                if (slBal == '') {
                    slBal = document.getElementById(prefix + 'SilverTotFineWt').value;
                }
//                alert(slBal);
                if (payMetalDueWeightType1 == 'KG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat((slBal) - silverWeight).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - silverWeight / 1000)).toFixed(3);
                        silverWeight = parseFloat(silverWeight / 1000).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - silverWeight / (1000 * 1000))).toFixed(3);
                        silverWeight = parseFloat(silverWeight / (1000 * 1000)).toFixed(3);
                    }
                } else if (payMetalDueWeightType1 == 'GM') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(3);
                        silverWeight = parseFloat(silverWeight * 1000).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat((slBal) - silverWeight).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - silverWeight / (1000))).toFixed(3);
                        silverWeight = parseFloat(silverWeight / 1000).toFixed(3);
                    }
                } else if (payMetalDueWeightType1 == 'MG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000 * 1000)).toFixed(3);
                        silverWeight = parseFloat(silverWeight * 1000 * 1000).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(3);
                        silverWeight = parseFloat(silverWeight * 1000).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat((slBal - silverWeight)).toFixed(3);
                    }
                }
                document.getElementById(prefix + 'PayMetal1Bal' + dc).value = slBal;
                document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
//                alert(silverWtBal);
                silverWtBal = parseFloat(slBal).toFixed(3);
                SilverWtType = payMetalDueWeightType1;
                totRecSl += silverWeight;
            }
            if (document.getElementById(prefix + 'GoldTotFineWt').value != '' && goldWtBal == 0) {
                goldWtBal = parseFloat(document.getElementById(prefix + 'GoldTotFineWt').value);
                GoldWtType = document.getElementById(prefix + 'GoldTotFineWtType').value;
            }
            if (document.getElementById(prefix + 'SilverTotFineWt').value != '' && silverWtBal == 0) {
                silverWtBal = parseFloat(document.getElementById(prefix + 'SilverTotFineWt').value);
                SilverWtType = document.getElementById(prefix + 'SilverTotFineWtType').value;
            }

            document.getElementById('metal1WtRecBal').value = parseFloat(totRecGd).toFixed(3) + ' ' + goldWeightType;
            document.getElementById('metal1WtRecBal1').value = parseFloat(totRecGd).toFixed(3);
            document.getElementById('metal1WtRecBal1Typ').value = goldWeightType;
            document.getElementById('metal2WtRecBal').value = parseFloat(totRecSl).toFixed(3) + ' ' + silverWeightType;
            document.getElementById('metal2WtRecBal1').value = parseFloat(totRecSl).toFixed(3);
            document.getElementById('metal2WtRecBal1Typ').value = silverWeightType;
            if (document.getElementById(prefix + 'PayMetal1Val' + dc).value == '') {
                document.getElementById(prefix + 'PayMetal1Val' + dc).value = 0;
            }
            totAmtRec += parseFloat(document.getElementById(prefix + 'PayMetal1Val' + dc).value);
//            document.getElementById(prefix + 'PayTotMetAmtRec').value = Math_round(totAmtRec).toFixed(2);
//            alert(totAmtRec);
//            alert(document.getElementById(prefix + 'PayTotAmtRec'))
//            document.getElementById(prefix + 'PayTotAmtRec').value = parseFloat(totAmtRec).toFixed(2);
//            alert('paytotamtrec='+document.getElementById(prefix + 'PayTotAmtRec').value);
//            document.getElementById(prefix + 'PayTotAmtRecDisp').value = document.getElementById(prefix + 'PayTotAmtRec').value;
//            calcCashBalance(prefix);
            calcRawMetStock(prefix);
            calcStockRrCtCashBalanceForOrder(prefix);
        }
        metalEntered++;
    }
    return false;
}
function setRateCutValuesForOrderPanel(prefix) {
//    alert(prefix);
    document.getElementById('metal1RtCtWt').value = parseFloat(goldWtBal).toFixed(3);
    document.getElementById('metal1RtCtWtType').value = GoldWtType;
    document.getElementById('metal2RtCtWt').value = parseFloat(silverWtBal).toFixed(3);
    document.getElementById('metal2RtCtWtType').value = SilverWtType;
    document.getElementById(prefix + 'PayMetal1WtBal').value = parseFloat(goldWtBal).toFixed(3);
    document.getElementById(prefix + 'PayMetal1WtBalType').value = GoldWtType;
    document.getElementById(prefix + 'PayMetal2WtBal').value = parseFloat(silverWtBal).toFixed(3);
    document.getElementById(prefix + 'PayMetal2WtBalType').value = SilverWtType;
    if (stockDiv == 'wholeSaleStock') {
        document.getElementById(prefix + 'Metal1RtCtWtBal1').value = parseFloat(goldWtBal).toFixed(3);
        document.getElementById(prefix + 'Metal2RtCtWtBal1').value = parseFloat(silverWtBal).toFixed(3);
    } else {
        document.getElementById('metal1RtCtWtBal1').value = parseFloat(goldWtBal).toFixed(3);
        document.getElementById('metal2RtCtWtBal1').value = parseFloat(silverWtBal).toFixed(3);
        document.getElementById('metal1RtCtWtBal').value = parseFloat(goldWtBal).toFixed(3);
        document.getElementById('metal2RtCtWtBal').value = parseFloat(silverWtBal).toFixed(3);
        document.getElementById('metal1RtCtWtBalDisp').value = parseFloat(goldWtBal).toFixed(3) + ' ' + GoldWtType;
        document.getElementById('metal2RtCtWtBalDisp').value = parseFloat(silverWtBal).toFixed(3) + ' ' + SilverWtType;
    }
}
function itemsaleRateCutForOrder(rateCutId, totFinGdWt, goldTotFFineWtType, totFinSlWt, silverTotFFineWtType, totGoldPay, totSilverPay, goldRate, silverRate, payPanelName, otherCharges, otherChgsBy, suppId, preInvNo, invNo, goldTotFFineWt, silverTotFFineWt, crystalVal, payOpt, prevGoldPaid, prevSilverPaid) {

    var poststr = "rateCutOpt=" + encodeURIComponent(rateCutId) +
            "&goldTotFFineWt=" + encodeURIComponent(goldTotFFineWt) +
            "&goldTotFFineWtType=" + encodeURIComponent(goldTotFFineWtType) +
            "&silverTotFFineWt=" + encodeURIComponent(silverTotFFineWt) +
            "&silverTotFFineWtType=" + encodeURIComponent(silverTotFFineWtType) +
            "&totFinGdWt=" + encodeURIComponent(totFinGdWt) +
            "&totFinSlWt=" + encodeURIComponent(totFinSlWt) +
            "&prevGoldPaid=" + encodeURIComponent(prevGoldPaid) +
            "&prevSilverPaid=" + encodeURIComponent(prevSilverPaid) +
            "&totGoldPay=" + encodeURIComponent(totGoldPay) +
            "&totSilverPay=" + encodeURIComponent(totSilverPay) +
            "&goldRate=" + encodeURIComponent(goldRate) +
            "&silverRate=" + encodeURIComponent(silverRate) +
            "&otherCharges=" + encodeURIComponent(otherCharges) +
            "&payPanelName=" + encodeURIComponent(payPanelName) +
            "&otherChgsBy=" + encodeURIComponent(otherChgsBy) +
            "&payId=" + encodeURIComponent(document.getElementById('payId').value) +
            "&preInvId=" + encodeURIComponent(preInvNo) +
            "&invId=" + encodeURIComponent(invNo) +
            "&suppId=" + encodeURIComponent(suppId) +
            "&custId=" + encodeURIComponent(document.getElementById('custId').value) +
            "&crystalVal=" + encodeURIComponent(crystalVal) +
            "&payOpt=" + encodeURIComponent(payOpt);
//alert(poststr);
    if (rateCutId == 'RateCut') {
        itemsale_rate_cut("include/php/ogwhitrc" + default_theme + ".php", poststr);
    } else {
        itemsale_rate_cut("include/php/ogwhitnrc" + default_theme + ".php", poststr);
    }
}

function getMoreStockRawMetalDivForOrder(metalCnt, panelName, firmId, rawGdPreId, rawGdPostId, metalType, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
        metalPanelName, mcntr, rawPreId, rawPostId, otherChgsBy, totFinGdWt, totFinSlWt, goldRate, silverRate) {

    metalPanel = panelName;
    metalCount = metalCnt;
    if (metalCount != '') {
        getMetalDiv = metalCount;
    }
    var poststr = "metalDivCount=" + metalCount
            + "&panelName=" + panelName + "&firmId=" + firmId
            + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&metalType=" + metalType + "&rawSlPreId=" + rawSlPreId +
            "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId +
            "&rawAlPostId=" + rawAlPostId + "&metalPanelName=" + metalPanelName
            + "&mcntr=" + mcntr + "&rawPreId=" + rawPreId + "&rawPostId=" + rawPostId
            + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt + "&goldRate=" + goldRate + "&silverRate=" + silverRate;
    get_more_raw_metal_div('include/php/ogwhorpydt' + default_theme + '.php', poststr);
    return false;
}

var goldRateCutWeight = 0;
var silverRateCutWeight = 0;
function calcWholeSaleRateCutForOrder(prefix) {

    var gdRtCt = 0;
    var metalType;
    if ((document.getElementById('metal1WtPrevBal1').value).trim() == '' || document.getElementById('metal1WtPrevBal1').value == 'NaN') {
        document.getElementById('metal1WtPrevBal1').value = 0;
    }
    if ((document.getElementById('metal1WtPurBal1').value).trim() == '' || document.getElementById('metal1WtPurBal1').value == 'NaN') {
        document.getElementById('metal1WtPurBal1').value = 0;
    }
    if ((document.getElementById('metal1WtRecBal1').value).trim() == '' || document.getElementById('metal1WtRecBal1').value == 'NaN') {
        document.getElementById('metal1WtRecBal1').value = 0;
    }
    if ((document.getElementById('metal1RtCtWt').value).trim() == '' || document.getElementById('metal1RtCtWt').value == 'NaN') {
        document.getElementById('metal1RtCtWt').value = 0;
    }
//    alert(document.getElementById('metal1RtCtWt').value);
    var gdBal = parseFloat(document.getElementById('metal1WtPrevBal1').value) + parseFloat(document.getElementById('metal1WtPurBal1').value) - parseFloat(document.getElementById('metal1WtRecBal1').value);
    var gdRtCt = parseFloat(document.getElementById('metal1RtCtWt').value);
    var goldRtCtWtType = document.getElementById('metal1RtCtWtType').value;
    var goldWtType = document.getElementById('metal1WtPurBal1Type').value;
    if (gdBal != '') {
        gdRtCt = convertWeight(gdRtCt, goldWtType, goldRtCtWtType);
        document.getElementById('metal1RtCtWtBal').value = gdRtCt;
        document.getElementById(prefix + 'PayMetal1WtBal').value = parseFloat(gdBal - gdRtCt).toFixed(3);
        if (document.getElementById('stockPurPriceCut').value == 'RateCut' || document.getElementById('stockPurPriceCut').value == 'default') {
            document.getElementById('metal1RtCtWtBalDisp').value = gdRtCt + ' ' + goldWtType;
        }
    }

    if ((document.getElementById('metal2WtPrevBal1').value).trim() == '' || document.getElementById('metal2WtPrevBal1').value == 'NaN') {
        document.getElementById('metal2WtPrevBal1').value = 0;
    }
    if ((document.getElementById('metal2WtPurBal1').value).trim() == '' || document.getElementById('metal2WtPurBal1').value == 'NaN') {
        document.getElementById('metal2WtPurBal1').value = 0;
    }
    if ((document.getElementById('metal2WtRecBal1').value).trim() == '' || document.getElementById('metal2WtRecBal1').value == 'NaN') {
        document.getElementById('metal2WtRecBal1').value = 0;
    }
    if ((document.getElementById('metal2RtCtWt').value).trim() == '' || document.getElementById('metal2RtCtWt').value == 'NaN') {
        document.getElementById('metal2RtCtWt').value = 0;
    }
    var silverRtCt = 0;
    var silverBal = parseFloat(document.getElementById('metal2WtPrevBal1').value) + parseFloat(document.getElementById('metal2WtPurBal1').value) - parseFloat(document.getElementById('metal2WtRecBal1').value);
    var silverRtCt = parseFloat(document.getElementById('metal2RtCtWt').value);
    var silverRtCtWtType = document.getElementById('metal2RtCtWtType').value;
    var silverWtType = document.getElementById('metal2WtPurBal1Type').value;
    if (silverBal != '') {
        silverRtCt = convertWeight(silverRtCt, silverWtType, silverRtCtWtType);
        document.getElementById('metal2RtCtWtBal').value = silverRtCt;
        document.getElementById(prefix + 'PayMetal2WtBal').value = parseFloat(silverBal - silverRtCt).toFixed(3);
        if (document.getElementById('stockPurPriceCut').value == 'RateCut' || document.getElementById('stockPurPriceCut').value == 'default') {
            document.getElementById('metal2RtCtWtBalDisp').value = silverRtCt + ' ' + silverWtType;
//            alert(document.getElementById('metal2RtCtWtBalDisp').value);
        }
    }
    calcRawMetStock(prefix);
    calcStockRrCtCashBalanceForOrder(prefix);
}

function calcStockRrCtCashBalanceForOrder(prefix) {
    var finalCashBal;
    var finBalLabel = 'FINAL CASH BALANCE :';
//    if (document.getElementById(prefix + 'PayCashAmtRec').value != '' || document.getElementById(prefix + 'PayChequeAmt').value || document.getElementById(prefix + 'PayCardAmt').value) {
    var totalCashPaidAmt = document.getElementById(prefix + 'PayCashAmtRec').value;
    if (totalCashPaidAmt == null || totalCashPaidAmt == '') {
        totalCashPaidAmt = 0;
    }
    var totalChequeAmt = document.getElementById(prefix + 'PayChequeAmt').value;
    if (totalChequeAmt == null || totalChequeAmt == '') {
        totalChequeAmt = 0;
    }
    var totalCardAmt = document.getElementById(prefix + 'PayCardAmt').value;
    if (totalCardAmt == null || totalCardAmt == '') {
        totalCardAmt = 0;
    }
    document.getElementById(prefix + 'PayCashRecDisp').value = Math_round(parseFloat(totalCashPaidAmt) + parseFloat(totalChequeAmt) + parseFloat(totalCardAmt)).toFixed(2);
//        alert('paycashrecdisp='+ document.getElementById(prefix + 'PayCashRecDisp').value);
    document.getElementById(prefix + 'PayTotCashAmt').value = Math_round(parseFloat(totalCashPaidAmt) + parseFloat(totalChequeAmt) + parseFloat(totalCardAmt)).toFixed(2);
//    }

//    if (document.getElementById('VATTax').value != '' || document.getElementById('VATTax').value != null) {
    var totalValuation = document.getElementById('taxOnTotAmt').value;
    if (totalValuation == null || totalValuation == '') {
        totalValuation = 0;
    }
    if (document.getElementById('VATTax').value == '') {
        document.getElementById('VATTax').value = 0;
    }
    var totTax = parseFloat(document.getElementById('VATTax').value) / 100;
    document.getElementById(prefix + 'PayVATAmtDisp').value = Math_round(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
    document.getElementById(prefix + 'PayVATAmt').value = Math_round(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
//    }

    if (document.getElementById(prefix + 'PayVATAmt').value == 'NaN' || document.getElementById(prefix + 'PayVATAmt').value == '') {
        document.getElementById(prefix + 'PayVATAmt').value = 0.00;
    }

//    if (document.getElementById(prefix + 'PayTotCashAmt').value || document.getElementById(prefix + 'PayVATAmt').value || document.getElementById(prefix + 'PayDiscount').value != '') {
    var totalAmt = 0;
    if (document.getElementById(prefix + 'PayTotAmt').value == '' || document.getElementById(prefix + 'PayTotAmt').value == 'NaN') {
        document.getElementById(prefix + 'PayTotAmt').value = 0;
    }
    var crystalAmnt = 0;
    if (document.getElementById('stockPurPriceCut').value == 'RateCut' || document.getElementById('stockPurPriceCut').value == 'default') {
        if (document.getElementById('suppSubPanel').value == 'order' || document.getElementById('suppSubPanel').value == 'ItemStock') {
            if (document.getElementById(prefix + 'PayCrystalAmt').value == '' || document.getElementById(prefix + 'PayCrystalAmt').value == 'NaN') {
                document.getElementById(prefix + 'PayCrystalAmt').value = 0;
            }
            crystalAmnt = parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value);
        }
        if (document.getElementById(prefix + 'PayTotAmtRec').value == '' || document.getElementById(prefix + 'PayTotAmtRec').value == 'NaN') {
            document.getElementById(prefix + 'PayTotAmtRec').value = 0;
        }
        totalAmt = parseFloat(document.getElementById(prefix + 'PayTotAmtRec').value) + parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + crystalAmnt;
    } else {
        totalAmt = parseFloat(document.getElementById(prefix + 'PayTotAmt').value);
    }
    var newTotalAmount = totalAmt;
    document.getElementById('taxOnTotAmt').value = Math_round((parseFloat(totalAmt))).toFixed(2);
    if (document.getElementById(prefix + 'PayPrevTotAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevTotAmt').value == '') {
        document.getElementById(prefix + 'PayPrevTotAmt').value = 0;
    }

    if (document.getElementById(prefix + 'PayPrevTotAmt').value != '' || document.getElementById(prefix + 'PayPrevTotAmt').value != 0) {
        if (document.getElementById(prefix + 'PayPrevTotAmt').value > 0) {
            totalAmt = totalAmt + parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value);
        } else {
            totalAmt = totalAmt - Math.abs(parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value));
        }
    }
    if (document.getElementById(prefix + 'PayVATAmt').value == '' || document.getElementById(prefix + 'PayVATAmt').value == 'NaN') {
        document.getElementById(prefix + 'PayVATAmt').value = 0;
    }
    if (document.getElementById(prefix + 'PayDiscount').value == '' || document.getElementById(prefix + 'PayDiscount').value == 'NaN') {
        document.getElementById(prefix + 'PayDiscount').value = 0;
    }
    if (document.getElementById(prefix + 'PayTotCashAmt').value == '' || document.getElementById(prefix + 'PayTotCashAmt').value == 'NaN') {
        document.getElementById(prefix + 'PayTotCashAmt').value = 0;
    }
    if (document.getElementById(prefix + 'prevCash').value == '' || document.getElementById(prefix + 'prevCash').value == 'NaN') {
        document.getElementById(prefix + 'prevCash').value = 0;
    }
    document.getElementById(prefix + 'PayDiscountDisp').value = Math_round(parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
    document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value))).toFixed(2);
    document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math_round((parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value) - parseFloat(document.getElementById(prefix + 'prevCash').value))).toFixed(2);
    //    document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
    finalCashBal = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
    finalCashBal = Math_round((parseFloat(finalCashBal) - parseFloat(document.getElementById(prefix + 'prevCash').value))).toFixed(2);
    if (finalCashBal <= 0) {
        finBalLabel = 'FINAL CASH DEPOSIT :';
    }
    document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(finalCashBal).toFixed(2);
    document.getElementById('finCashBalTd').innerHTML = finBalLabel;
    document.getElementById(prefix + 'PayTotAmtBal').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value) - parseFloat(document.getElementById(prefix + 'prevCash').value)).toFixed(2);
    document.getElementById(prefix + 'PayTotRemAmtBal').value = Math_round((parseFloat(newTotalAmount) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
}

//***************End code to customer and supplier Order panel @Author: SANT19SEP16*************************************************//
//***************End code to customer and supplier Order panel @Author: SANT03SEP16*************************************************//
//***************End code to customer and supplier Order panel @Author: SANT26AUG16*************************************************//
//***************End code to customer and supplier Order panel @Author: SANT24AUG16*************************************************//
//***************End code to customer and supplier Order panel @Author: SANT23AUG16*************************************************//
//***************End code to customer and supplier Order panel @Author: SANT12AUG16*************************************************//
//***************End code to customer and supplier Order panel @Author: SANT10AUG16*************************************************//
//***************End code to customer and supplier Order panel @Author: SANT29JUL16*************************************************//
//***************End code to customer and supplier Order panel @Author: SANT14UL16*************************************************//
//add new function Author:GAUR15JUL16
function getFormPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppfdv" + default_theme + ".php", true);
    xmlhttp.send();
}

function setDefLangGetForm(defLang, defSize, panel) {                                 // Modified on KHUSH15JAN13
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppfsl" + default_theme + ".php?defLang=" + defLang + "&defSize=" + defSize + "&panel=" + panel, true);
    xmlhttp.send();
}

function getFormAddNewLangDiv(panelName, formSize) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppfdv" + default_theme + ".php?panelName=" + panelName + "&formSize=" + formSize, true); //filename changed @Author:PRIYA22MAR14
    xmlhttp.send();
}

//add new function Author:GAUR15JUL16

//add new function Author: GAUR21JUL16
function printCustHome(objName, objData) {
    var DocumentContainerName = document.getElementById(objName);
    var DocumentContainerData = document.getElementById(objData);
    var head;
    head = document.getElementById("girviPanelTrId");
    head.style.position = "relative";
    head.style.top = "0px"
    head.style.visibility = "visible";
    var html = '<html><head><title>Online Munim - Print Page    www.OnlineMunim.com     www.omunim.com</title>' +
            '<link href="css/print.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/index.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/ogcss.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/orcss.css" rel="stylesheet" type="text/css" />' +
            '<script type="text/javascript" src="scripts/emNavigation.js"></script>' +
            '<script type="text/javascript" src="scripts/emValidate.js"></script>' +
            '<script type="text/javascript" src="scripts/emAddOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/emOwnerLogin.js"></script>' +
            '<script type="text/javascript" src="scripts/emUpdateOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/orAddFunction_1_6_1.js"></script>' +
            '<script type="text/javascript" src="scripts/advanceMetal.js"></script>' +
            '</head><body>' +
            '<div id="girviListPanelDiv">' +
            DocumentContainerName.innerHTML + '<br/>' + '<br/>' + '<br/>' +
            DocumentContainerData.innerHTML +
            '</div>' +
            '<a style="cursor: pointer;" onClick="window.print();"><img src="images/printer32.png" class="noPrint" alt="Print" title="Print" width="32px" height="32px" /></a>' +
            '</body></html>';
    var WindowObject = window.open("", "PrintWindow", "width=950,height=900,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");
    WindowObject.document.open();
    WindowObject.document.writeln(html);
    WindowObject.document.close();
    WindowObject.focus();
}
//End add new function Author: GAUR21JUL16

//******************************************************************Start code to change supplier home panel Author@:SANT28JUL16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT29JUL16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT10AUG16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT12AUG16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT23AUG16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT24AUG16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT26AUG16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT03SEP16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT19SEP16*******************
//******Start code to change supplier home panel Author@:SANT27NOV16**********
function showOrderSuppInfo(prCustId, prSuppId, newPreInvoiceNo, newInvoiceNo, panel, isinOthrChgsBy) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwhmndv" + default_theme + ".php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&suppId=" + prSuppId + "&suppPanelOption=" + panel + "&isinOthrChgsBy=" + isinOthrChgsBy + "&custId=" + prCustId, true);
    xmlhttp.send();
}
//******End code to change supplier home panel Author@:SANT27NOV16**********
//****Start code for change order panel payment filename:Author:SANT18NOV16****
//****Start code for change order panel payment filename:Author:SANT22NOV16****
//****Start code for change order panel payment filename:Author:SANT25NOV16****
//****Start code for change order panel payment filename:Author:SANT30NOV16****
function getOrderPaymentDiv(documentRootPath, preInvoiceNo, postInvoiceNo, panelName, navPanel, slprinPanel, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (navPanel == 'SellPurchase') {
                document.getElementById("slPrMainDiv").innerHTML = xmlhttp.responseText;
            } else if (navPanel == 'NewOrder') {
                document.getElementById("newOrderDivs").innerHTML = xmlhttp.responseText;
            } else if (navPanel == 'RawStock' || panelName == 'RawPayment') {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            } else if (navPanel == 'orderPreDel') {
                document.getElementById("addStockCurrentInvoice").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            // document.getElementById("slPrPaymentButtDiv").style.visibility = "hidden";
        }
    };
    if (navPanel == 'RawStock' || panelName == 'RawPayment') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmiddv" + default_theme + ".php?paymentPanelName=" + panelName + "&preInvNo=" + preInvoiceNo + "&postInvNo=" + postInvoiceNo + "&slprinPanel=" + slprinPanel + "&suppId=" + suppId, true);
    } else if (navPanel == 'orderPreDel') {
        xmlhttp.open("GET", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?mainPanel=" + panelName + "&preOrdInvNo=" + preInvoiceNo + "&postOrdInvNo=" + postInvoiceNo + "&custType=" + navPanel + "&custId=" + custId, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogpayment" + default_theme + ".php?paymentPanelName=" + panelName + "&preInvNo=" + preInvoiceNo + "&postInvNo=" + postInvoiceNo + "&slprinPanel=" + slprinPanel + "&custId=" + custId, true);
    }
    xmlhttp.send();
}
//****End code for change order panel payment filename:Author:SANT30NOV16****
//****End code for change order panel payment filename:Author:SANT25NOV16****
//****End code for change order panel payment filename:Author:SANT22NOV16****
//****End code for change order panel payment filename:Author:SANT18NOV16****
function getSuppOrderDelPaymentDiv(documentRootPath, preInvoiceNo, postInvoiceNo, panelName, navPanel, slprinPanel, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (navPanel == 'SellPurchase') {
                document.getElementById("slPrMainDiv").innerHTML = xmlhttp.responseText;
            } else if (navPanel == 'NewOrder') {
                document.getElementById("suppPayDiv").innerHTML = xmlhttp.responseText;
            } else if (navPanel == 'RawStock' || panelName == 'RawPayment') {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            // document.getElementById("slPrPaymentButtDiv").style.visibility = "hidden";
        }
    };
    if (navPanel == 'RawStock' || panelName == 'RawPayment') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmiddv" + default_theme + ".php?paymentPanelName=" + panelName + "&preInvNo=" + preInvoiceNo + "&postInvNo=" + postInvoiceNo + "&slprinPanel=" + slprinPanel + "&suppId=" + suppId, true);
    } else
    {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwhpydv" + default_theme + ".php?paymentPanelName=" + panelName + "&preInvNo=" + preInvoiceNo + "&postInvNo=" + postInvoiceNo + "&slprinPanel=" + slprinPanel + "&custId=" + custId, true);
    }
    xmlhttp.send();
}
//******************************************************************End code to change supplier home panel Author@:SANT19SEP16*******************
//******************************************************************End code to change supplier home panel Author@:SANT03SEP16*******************
//******************************************************************End code to change supplier home panel Author@:SANT26AUG16*******************
//******************************************************************End code to change supplier home panel Author@:SANT24AUG16*******************
//******************************************************************End code to change supplier home panel Author@:SANT23AUG16*******************
//******************************************************************End code to change supplier home panel Author@:SANT12AUG16*******************
//******************************************************************End code to change supplier home panel Author@:SANT10AUG16*******************
//******************************************************************End code to change supplier home panel Author@:SANT29JUL16*******************
//******************************************************************End code to change supplier home panel Author@:SANT28JUL16*******************
/***** Start of code for Max Sell AnalysisReport @AUTHOR: GAUR2AUG16   *********/
function showMaxSellAnalysis() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviPanelAnalysisDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omgnsfmx" + default_theme + ".php", true);
    xmlhttp.send();
}
/***** End of code for  Max Sell AnalysisReport @AUTHOR: GAUR2AUG16*********/
//******************************************************************Start code to change supplier home panel Author@:SANT12AUG16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT23AUG16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT24AUG16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT26AUG16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT01SEP16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT03SEP16*******************
//******************************************************************Start code to change supplier home panel Author@:SANT19SEP16*******************
//***********************Start code to change supplier home panel Author@:SANT29NOV16*******************
//***********************Start code to change supplier home panel Author@:SANT30NOV16*******************
//***********************Start code to change supplier home panel Author@:SANT01DEC16*******************
function showSuppOrderDeliev(paymentPanelName) {
    document.getElementById('crystalCounter1').value
    var newItemMetal = document.getElementById('newItemMetal').value;
    var crysFinalVal = document.getElementById('crysFinalVal').value;
    if (crysFinalVal == '')
        crysFinalVal = 0;
    var goldFinalVal = '0.00';
    var silverFinalVal = 0.00;
    if (newItemMetal == 'Gold') {
        var cryWeight = document.getElementById('crystalCounter1').value;
        var cryWeightTyp = document.getElementById('crystalGdweightType').value;
        var goldTotGrossWt = document.getElementById('spOrDvItemGdGSW1').value;
        var goldTotGrossWtType = document.getElementById('spOrDvItemGdGSWTyp').value;
        var goldTotNetWt = document.getElementById('spOrDvItemGdNTFNW1').value;
        var goldTotNetWtType = document.getElementById('spOrDvItemGdNTFNWT1').value;
        var goldToTounch = document.getElementById('spOrDvItemGdTunch1').value;
        var goldWstgTounch = document.getElementById('spOrDvGdWSTG').value;
        var AdvanceGold = document.getElementById('spOrDvAdvanceGold').value;
        var AdvanceGoldTyp = document.getElementById('spOrDvAdvanceGoldTyp').value;
        var wstg = document.getElementById('spOrDvGdFFNW').value;
        var silverTotGrossWt = '0.000';
        var silverTotGrossWtType = 'GM';
        var silverTotNetWt = '0.000';
        var silverTotNetWtType = 'GM';
        var silverQty = '0';
        var goldQty = document.getElementById('goldQty').value;
        var goldTotFFineWt = document.getElementById('spOrDvTotFineGd').value;
        var goldTotFFineWtType = document.getElementById('spOrDvTotFineGdTyp').value;
        var silverTotFFineWt = '0.000';
        var silverTotFFineWtType = 'GM';
        var goldFinalWeight = document.getElementById('spOrDvRemainGdFnWt').value;
        var goldFinalWeightType = document.getElementById('spOrDvRemainGdFnTyp').value;
        var goldRate = document.getElementById('goldRate').value;
        var silverFinalWeight = '0.000';
        var silverFinalWeightType = 'GM';
//        var goldFinalVal = '0.00';
        if (goldFinalWeightType == 'KG') {
            goldFinalVal = ((goldFinalWeight * goldRate) * document.getElementById('gmWtInKg').value).toFixed(2);
        } else if (goldFinalWeightType == 'GM') {
            goldFinalVal = ((goldFinalWeight * goldRate) / document.getElementById('gmWtInGm').value).toFixed(2);
        } else if (goldFinalWeightType == 'MG') {
            goldFinalVal = ((goldFinalWeight * goldRate) / document.getElementById('gmWtInMg').value).toFixed(2);
        }
        if (goldFinalVal == '' || goldFinalVal == '')
            goldFinalVal = 0.00;
        var totGoldFinalVal = 0.00;
        if (goldTotGrossWtType == 'KG') {
            totGoldFinalVal = ((goldTotGrossWt * goldRate) * document.getElementById('gmWtInKg').value).toFixed(2);
        } else if (goldTotGrossWtType == 'GM') {
            totGoldFinalVal = ((goldTotGrossWt * goldRate) / document.getElementById('gmWtInGm').value).toFixed(2);
        } else if (goldTotGrossWtType == 'MG') {
            totGoldFinalVal = ((goldTotGrossWt * goldRate) / document.getElementById('gmWtInMg').value).toFixed(2);
        }
        var totalFinalBalance = parseFloat(goldFinalVal) + parseFloat(crysFinalVal);
    } else {
        var cryWeight = document.getElementById('crystalCounter1').value;
        var cryWeightTyp = document.getElementById('crystalSlweightType').value;
        var goldTotGrossWt = '0.000';
        var goldTotGrossWtType = 'GM';
        var silverTotGrossWt = document.getElementById('spOrDvItemSrGSW1').value;
        var silverTotGrossWtType = document.getElementById('spOrDvItemSrGSWTyp').value;
        var goldTotNetWt = '0.000';
        var goldTotNetWtType = 'GM';
        var silverTotNetWt = document.getElementById('spOrDvItemSlNTFNW1').value;
        var silverTotNetWtType = document.getElementById('spOrDvItemSlNTFNWT1').value;
        var silverToTounch = document.getElementById('spOrDvItemSrTunch1').value;
        var silverWstgTounch = document.getElementById('spOrDvSrWSTG').value;
        var silverQty = document.getElementById('silverQty').value;
        var wstg = document.getElementById('spOrDvSrFFNW').value;
        var goldQty = '0';
        var goldTotFFineWt = '0.000';
        var goldTotFFineWtType = 'GM';
        var silverTotFFineWt = document.getElementById('spOrDvTotFineSr').value;
        var silverTotFFineWtType = document.getElementById('spOrDvTotFineSrTyp').value;
        var goldFinalWeight = '0.000';
        var goldFinalWeightType = 'GM';
        var silverFinalWeight = document.getElementById('spOrDvRemainSrFnWt').value;
        var silverFinalWeightType = document.getElementById('spOrDvRemainSrFnTyp').value;
        var silverRate = document.getElementById('silverRate').value;
        if (silverFinalWeightType == 'KG') {
            silverFinalVal = ((silverFinalWeight * silverRate * document.getElementById('srGmWtInKg').value)).toFixed(2);
        } else if (silverFinalWeightType == 'GM') {
            silverFinalVal = ((silverFinalWeight * silverRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
        } else if (silverFinalWeightType == 'MG') {
            silverFinalVal = ((silverFinalWeight * silverRate) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
        }
        var totSilverFinalVal = 0.00;
        if (silverTotGrossWtType == 'KG') {
            totSilverFinalVal = ((silverTotGrossWt * silverRate * document.getElementById('srGmWtInKg').value)).toFixed(2);
        } else if (silverTotGrossWtType == 'GM') {
            totSilverFinalVal = ((silverTotGrossWt * silverRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
        } else if (silverTotGrossWtType == 'MG') {
            totSilverFinalVal = ((silverTotGrossWt * silverRate) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
        }
        var totalFinalBalance = parseFloat(silverFinalVal) + parseFloat(crysFinalVal);
        var AdvanceSilver = document.getElementById('spOrDvAdvanceSilver').value;
        var AdvanceSilverTyp = document.getElementById('spOrDvAdvanceSilverTyp').value;
    }
    var spOrIdd = document.getElementById('spOrIdd').value;
    var suppId = document.getElementById('suppId').value;
    var custId = document.getElementById('custId').value;
    var firmId = document.getElementById('firmId').value;
    var preInvoiceNo = document.getElementById('preInvoiceNo').value;
    var postInvoiceNo = document.getElementById('postInvoiceNo').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("stockPanelSubDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogpayment" + default_theme + ".php?paymentPanelName=" + paymentPanelName + "&goldTotGrossWt=" + goldTotGrossWt + "&goldTotGrossWtType=" + goldTotGrossWtType + "&silverTotGrossWt=" + silverTotGrossWt + "&silverTotGrossWtType=" + silverTotGrossWtType + "&silverQty=" + silverQty + "&goldQty=" + goldQty + "&suppId=" + suppId + "&goldTotFFineWt=" + goldTotFFineWt + "&goldTotFFineWtType=" + goldTotFFineWtType + "&silverTotFFineWt=" + silverTotFFineWt + "&silverTotFFineWtType=" + silverTotFFineWtType + "&goldFinalWeight=" + goldFinalWeight + "&goldFinalWeightType=" + goldFinalWeightType + "&silverFinalWeight=" + silverFinalWeight + "&silverFinalWeightType=" + silverFinalWeightType + "&custId=" + custId + "&preInvoiceNo=" + preInvoiceNo + "&postInvoiceNo=" + postInvoiceNo + "&goldFinalVal=" + goldFinalVal + "&silverFinalVal=" + silverFinalVal + "&totalFinalBalance=" + totalFinalBalance + "&firmId=" + firmId + "&goldTotNetWt=" + goldTotNetWt + "&goldTotNetWtType=" + goldTotNetWtType + "&silverTotNetWt=" + silverTotNetWt + "&silverTotNetWtType=" + silverTotNetWtType + "&silverToTounch=" + silverToTounch + "&goldToTounch=" + goldToTounch + "&wstg=" + wstg + "&cryWeight=" + cryWeight + "&cryWeightTyp=" + cryWeightTyp + "&goldWstgTounch=" + goldWstgTounch + "&silverWstgTounch=" + silverWstgTounch + "&metalType=" + newItemMetal + "&AdvanceGold=" + AdvanceGold + "&AdvanceGoldTyp=" + AdvanceGoldTyp + "&AdvanceSilver=" + AdvanceSilver + "&AdvanceSilverTyp=" + AdvanceSilverTyp + "&spOrIdd=" + spOrIdd + "&crysFinalVal=" + crysFinalVal + "&totGoldFinalVal=" + totGoldFinalVal + "&totSilverFinalVal=" + totSilverFinalVal, true);
    xmlhttp.send();
}
//*********End code to change supplier home panel Author@:SANT01DEC16*******************
//*********End code to change supplier home panel Author@:SANT30NOV16*******************
//*********End code to change supplier home panel Author@:SANT29NOV16*******************
function getUpdateorderDeliv(custId, nworId, panelName, mainPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            if (mainPanel == 'NewOrderMainPanel') {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            } else if (panelName == 'NwOrDetUpPanel') {
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            } else {
                document.getElementById("newOrderDivs").innerHTML = xmlhttp.responseText;
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (mainPanel == 'NewOrderMainPanel') {
        xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&panelDivName=" + 'NewOrder' + "&itemPanel=" + "NwOrPayUp" + "&nworId=" + nworId, true);
    } else {
        if (panelName == 'DelOrderPayment')
        {
            xmlhttp.open("POST", "include/php/ogcmiddv" + default_theme + ".php?itemPanel=" + panelName + "&custId=" + custId + "&nworId=" + nworId, true);
        } else {
            xmlhttp.open("POST", "include/php/ognoidelv" + default_theme + ".php?itemPanel=" + panelName + "&custId=" + custId + "&nworId=" + nworId, true);
        }
    }
    xmlhttp.send();
}
function showCustOrderDeliev(paymentPanelName) {
    var custId = document.getElementById('custId').value;
    var suppId = document.getElementById('suppId').value;
    var payPreInvoiceNo = document.getElementById('preInvoiceNo').value;
    var payInvoiceNo = document.getElementById('postInvoiceNo').value;
    var totFinGdWt = document.getElementById('totFinGdWt').value;
    var goldTotFFineWtType = document.getElementById('goldTotFFineWtType').value;
    var totFinSlWt = document.getElementById('totFinSlWt').value;
    var totFinSlWtyp = document.getElementById('totFinSlWtyp').value;
    var cryWt = document.getElementById('cryWt').value;
    var cryWtTyp = document.getElementById('cryWtTyp').value;
    var finalItemWTVal = document.getElementById('finalItemWTVal').value;
    var finalCRYWTVal = document.getElementById('finalCRYWTVal').value;
    var finalVal = document.getElementById('finalVal').value;
    var totalMetalVal = document.getElementById('totalMetalVal').value;
    var firmId = document.getElementById('firmId').value;
    var nworId = document.getElementById('nworId').value;
    var goldRate = document.getElementById('goldRate').value;
    var silverRate = document.getElementById('silverRate').value;
    var labChargVal = document.getElementById('labChargVal').value;
    paymentPanelName = 'NwOrDelPayment';
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("stockPanelSubDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogcmiddv" + default_theme + ".php?paymentPanelName=" + paymentPanelName + "&suppId=" + suppId + "&custId=" + custId + "&payPreInvoiceNo=" + payPreInvoiceNo + "&payInvoiceNo=" + payInvoiceNo + "&totFinGdWt=" + totFinGdWt + "&goldTotFFineWtType=" + goldTotFFineWtType + "&totFinSlWt=" + totFinSlWt + "&totFinSlWtyp=" + totFinSlWtyp + "&cryWt=" + cryWt + "&cryWtTyp=" + cryWtTyp + "&finalItemWTVal=" + finalItemWTVal + "&finalCRYWTVal=" + finalCRYWTVal + "&finalVal=" + finalVal + "&totalMetalVal=" + totalMetalVal + "&firmId=" + firmId + "&nworId=" + nworId + "&goldRate=" + goldRate + "&silverRate=" + silverRate + "&labChargVal=" + labChargVal, true);
    xmlhttp.send();
}
//******************************************************************End code to change supplier home panel Author@:SANT19SEP16*******************
//******************************************************************End code to change supplier home panel Author@:SANT03SEP16*******************
//******************************************************************End code to change supplier home panel Author@:SANT01SEP16*******************
//******************************************************************End code to change supplier home panel Author@:SANT26AUG16*******************
//******************************************************************End code to change supplier home panel Author@:SANT24AUG16*******************
//******************************************************************End code to change supplier home panel Author@:SANT23AUG16*******************
//******************************************************************End code to change supplier home panel Author@:SANT12AUG16*******************
////START CODE FOR SCHEME AUTHOR: GAUR12AUG16
//**************************** START Navigate scheme Panel Author: GAUR12AUG16 *******************************************************************
function navigateSchemeNamePanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omsaaind" + default_theme + ".php", true);
    xmlhttp.send();
}

//************* Get ItemName Details *******************
var schemeNameId;
function setSchemeNameId(obj) {

    schemeNameId = obj.id;
}
function getSchemeName(obj) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addUpdateSchemeNameDiv").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omsuindv" + default_theme + ".php?schemeNameId=" + schemeNameId,
            true);
    xmlhttp.send();
}
//************* Get ItemTunch Details *******************


function updateDeleteSchemeName() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateAddSchemeNameInputs()) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("UpdateScheme").style.visibility = "visible";
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    }
}

function validateAddSchemeNameInputs(obj) {
    if (validateEmptyField(document.getElementById("addSchemeName").value, "Please enter Scheme Name!") == false ||
            validateAlphaNumWithSpaceWithSlash(document.getElementById("addSchemeName").value, "Accept only alpha or numeric characters or with space character!") == false) {
        document.getElementById("addSchemeName").focus();
        return false;
    }
    return true;
}

function addSettSchemeName() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateAddSchemeNameInputs()) {
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    }
}
//****************************END Navigate SHEME Panel Author: GAUR12AUG16 *******************************************************************
//END CODE FOR SCHEME AUTHOR: GAUR12AUG16
// START add code for stock_list print function Author:GAUR08AUG16
function printStockListPanel(obj) {
    var DocumentContainer = document.getElementById(obj);
    var head;
    head = document.getElementById("stockItemListPanelTrId");
    head.style.position = "relative";
    head.style.top = "0px"
    head.style.visibility = "visible";
    var html = '<html><head><title>Online Munim - Print Page    www.OnlineMunim.com     www.omunim.com</title>' +
            '<link href="css/print.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/index.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/ogcss.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/orcss.css" rel="stylesheet" type="text/css" />' +
            '<script type="text/javascript" src="scripts/emNavigation.js"></script>' +
            '<script type="text/javascript" src="scripts/emValidate.js"></script>' +
            '<script type="text/javascript" src="scripts/emAddOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/emOwnerLogin.js"></script>' +
            '<script type="text/javascript" src="scripts/emUpdateOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/orAddFunction_1_6_1.js"></script>' +
            '<script type="text/javascript" src="scripts/advanceMetal.js"></script>' +
            '</head><body>' +
            '<div id="stockPanelPurchaseList">' +
            DocumentContainer.innerHTML +
            '</div>' +
            '<a style="cursor: pointer;" onClick="window.print();"><img src="images/printer32.png" class="noPrint" alt="Print" title="Print" width="32px" height="32px" /></a>' +
            '</body></html>';
    var WindowObject = window.open("", "PrintWindow", "width=1000,height=900,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");
    WindowObject.document.open();
    WindowObject.document.writeln(html);
    WindowObject.document.close();
    WindowObject.focus();
}
// END add code for stock_list print function Author:GAUR08AUG16
var custId;
function setkittyCustId(obj) {
    custId = obj.id;
}

function add_new_kitty(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertCustAddNewKitty;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertCustAddNewKitty() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        document.getElementById("kittyScheme").focus();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }

}
function custAddNewKitty(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "custId=" + custId
            + "&firmId=" + encodeURIComponent(document.getElementById("custFirmId").value)
            + "&custType=" + encodeURIComponent(document.getElementById("custType").value);
    add_new_kitty('include/php/omktdetl' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13

}


function addNewKitty() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addKittySubButDiv").style.visibility = "hidden";
    var girviDateDay = document.getElementById("DOBDay").value;
    var girviDateMMM = document.getElementById("DOBMonth").value;
    var girviDateYY = document.getElementById("DOBYear").value;
    var girviDateStr = document.getElementById("DOBMonth").value + ' ' + document.getElementById("DOBDay").value + ', ' + document.getElementById("DOBYear").value;
    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date
    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;
//    if (datesDiff < 0) {
//        alert('Please Select the correct Girvi Date!');
//        document.getElementById("DOBDay").focus();
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        document.getElementById("addKittySubButDiv").style.visibility = "visible";
//        return false;
//        exit();
//    } else {
    if (girviDateMMM == 'FEB' || girviDateMMM == 'APR' || girviDateMMM == 'JUN' || girviDateMMM == 'SEP' || girviDateMMM == 'NOV') {
        if (girviDateMMM == 'FEB' && girviDateDay > 29 && girviDateYY % 4 == 0) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 29 days.');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addKittySubButDiv").style.visibility = "visible";
            return false;
            exit();
        }
        if (girviDateMMM == 'FEB' && girviDateDay > 28 && girviDateYY % 4 != 0) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 28 days.');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addKittySubButDiv").style.visibility = "visible";
            return false;
            exit();
        }
        if (girviDateDay > 30) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addKittySubButDiv").style.visibility = "visible";
            return false;
            exit();
        }
    }
    if (validateAddFLaonEMIInputs()) {
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
    }

    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("addKittySubButDiv").style.visibility = "visible";
    return false;
    //}
    return false;
}

function addNewChit() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addChitSubButDiv").style.visibility = "hidden";
    var girviDateDay = document.getElementById("DOBDay").value;
    var girviDateMMM = document.getElementById("DOBMonth").value;
    var girviDateYY = document.getElementById("DOBYear").value;
    var girviDateStr = document.getElementById("DOBMonth").value + ' ' + document.getElementById("DOBDay").value + ', ' + document.getElementById("DOBYear").value;
    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date
    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;
    if (datesDiff < 0) {
        alert('Please Select the correct Girvi Date!');
        document.getElementById("DOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addChitSubButDiv").style.visibility = "visible";
        return false;
        exit();
    } else {
        if (girviDateMMM == 'FEB' || girviDateMMM == 'APR' || girviDateMMM == 'JUN' || girviDateMMM == 'SEP' || girviDateMMM == 'NOV') {
            if (girviDateMMM == 'FEB' && girviDateDay > 29 && girviDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addChitSubButDiv").style.visibility = "visible";
                return false;
                exit();
            }
            if (girviDateMMM == 'FEB' && girviDateDay > 28 && girviDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addChitSubButDiv").style.visibility = "visible";
                return false;
                exit();
            }
            if (girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addChitSubButDiv").style.visibility = "visible";
                return false;
                exit();
            }
        }
        if (validateAddFLaonEMIInputs()) {
            return true;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addChitSubButDiv").style.visibility = "visible";
        }

        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addChitSubButDiv").style.visibility = "visible";
        return false;
    }
    return false;
}
/********************* start - update field name @Author:GAUR01SEPT16 **************************/
/********************* start - update field name @Author:GAUR02SEP16 **************************/
function validateAddFLaonEMIInputs() {
//Validation changes By @Amol 3 march 2017 
    if (validateEmptyField(document.getElementById("kittyScheme").value, "Please Enter Scheme Name!") == false) {
        document.getElementById("kittyScheme").focus();
        return false;
    }
    if (validateEmptyField(document.getElementById("kittyEmiAmount").value, "Please Enter EMI Amount!") == false ||
            validateNum(document.getElementById("kittyEmiAmount").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("kittyEmiAmount").focus();
        return false;
    }
    if (validateEmptyField(document.getElementById("kittyEmiAmount").value, "Please Enter EMI Amount!") == true &&
            validateNum(document.getElementById("kittyEmiAmount").value, "Accept only numeric characters without space character!") == true) {
        kittyEmiAmount = document.getElementById("kittyEmiAmount").value;
        kittyEmiMultipleAmtHidden = document.getElementById("kittyEmiMultipleAmtHidden").value;
        if (kittyEmiMultipleAmtHidden == '' || kittyEmiMultipleAmtHidden == null || kittyEmiMultipleAmtHidden == 0)//kittyEmiMultipleAmtHidden == 0 ADDED @AUTHOR:MADHUREE-04JULY2020
            kittyEmiMultipleAmtHidden = 100;
        kittyRem = kittyEmiAmount % kittyEmiMultipleAmtHidden;
        if (kittyRem != 0) {
            alert('Emi amount should be multiple of : ' + kittyEmiMultipleAmtHidden);
            return false;
        }
    }

    if (document.getElementById("panelName").value != 'directSchemeAdd') {

        if (validateEmptyField(document.getElementById("kittyGroup").value, "Please Enter User Group Name!") == false) {
            document.getElementById("kittyGroup").focus();
            return false;
        }

        if (validateEmptyField(document.getElementById("kittyNoOfEmi").value, "Please Enter Number Of EMI!") == false ||
                validateNum(document.getElementById("kittyNoOfEmi").value, "Accept only numeric characters without space character!") == false) {
            document.getElementById("kittyNoOfEmi").focus();
            return false;
        }
        if (validateEmptyField(document.getElementById("kittyNoOfDays").value, "Please Enter Number Of Days/Months!") == false ||
                validateNum(document.getElementById("kittyNoOfDays").value, "Accept only numeric characters without space character!") == false) {
            document.getElementById("kittyNoOfDays").focus();
            return false;
        }
        if (validateEmptyField(document.getElementById("kittyAmount").value, "Please Enter Total Ammount!") == false ||
                validateNum(document.getElementById("kittyAmount").value, "Accept only numeric characters without space character!") == false) {
            document.getElementById("kittyAmount").focus();
            return false;
        }
        if (document.getElementById("kittyFirmId").value == 'NotSelected') {
            alert('Please Select Firm Name!');
            document.getElementById("kittyFirmId").focus();
            return false;
        }


        if (validateEmptyField(document.getElementById("kittyFinalAmount").value, "Please Enter Amount!") == false ||
                validateNum(document.getElementById("kittyFinalAmount").value, "Accept only numeric characters without space character!") == false) {
            document.getElementById("kittyFinalAmount").focus();
            return false;
        } else if (validateSelectField(document.getElementById("DOBDay").value, "Please select Day!") == false) {
            document.getElementById("DOBDay").focus();
            return false;
        } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Month!") == false) {
            document.getElementById("DOBMonth").focus();
            return false;
        } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select Year!") == false) {
            document.getElementById("DOBYear").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("kittySerialNo").value, "Please enter Serial Number!") == false ||
                validateNum(document.getElementById("kittySerialNo").value, "Accept only numeric characters without space character!") == false) {
            document.getElementById("kittySerialNo").focus();
            return false;
        }

// else if (validateSelectField(document.getElementById("selectFirmDiv").value, "Please select Loan Firm Id!") == false) {
//     document.getElementById("selectFirmDiv").focus();
//     return false;
// }
        else if (validateEmptyField(document.getElementById("kittyNoOfDays").value, "Please Enter Kitty Number of days!") == false) {
            document.getElementById("kittyNoOfDays").focus();
            return false;
        } else if (validateSelectField(document.getElementById("kittyPayAccId").value, "Please Select Payment Account!") == false) {
            document.getElementById("kittyPayAccId").focus();
            return false;
        } else if (validateSelectField(document.getElementById("kittyDrAccId").value, "Please Select Cr Account!") == false) {
            document.getElementById("kittyDrAccId").focus();
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

/********************* end - update field name @Author:GAUR02SEP16**************************/
/********************* end - update field name @Author:GAUR01SEPT16 **************************/

function printKittyPanel(obj) {
    var DocumentContainer = document.getElementById(obj);
    var head;
    head = document.getElementById("kittyPanelTrId");
    head.style.position = "relative";
    head.style.top = "0px"
    head.style.visibility = "visible";
    var html = '<html><head><title>Online Munim - Print Page    www.OnlineMunim.com     www.omunim.com</title>' +
            '<link href="css/print.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/index.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/ogcss.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/orcss.css" rel="stylesheet" type="text/css" />' +
            '<script type="text/javascript" src="scripts/emNavigation.js"></script>' +
            '<script type="text/javascript" src="scripts/emValidate.js"></script>' +
            '<script type="text/javascript" src="scripts/emAddOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/emOwnerLogin.js"></script>' +
            '<script type="text/javascript" src="scripts/emUpdateOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/orAddFunction_1_6_1.js"></script>' +
            '<script type="text/javascript" src="scripts/advanceMetal.js"></script>' +
            '</head><body>' +
            '<div id="girviDetailsDiv">' +
            DocumentContainer.innerHTML +
            '</div>' +
            '<a style="cursor: pointer;" onClick="window.print();"><img src="images/printer32.png" class="noPrint" alt="Print" title="Print" width="32px" height="32px" /></a>' +
            '</body></html>';
    var WindowObject = window.open("", "PrintWindow", "width=1000,height=900,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");
    WindowObject.document.open();
    WindowObject.document.writeln(html);
    WindowObject.document.close();
    WindowObject.focus();
}
//end add kitty button Author: GAUR17AUG16
//****************************end add all functions for kitty scheme Author:GAUR22AUG16****************************/

/**********Start code to FINANCE NOTICE add var @Author:GAUR22AUG16*******************/
function getFinanceNoticeLang(custId, girviId, mainPrincAmount, width, height) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_finance_notice_lang").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_finance_notice_lang").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omfinntl" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId + "&mainPrincAmount=" + mainPrincAmount + "&width=" + width + "&height=" + height, true);
    xmlhttp.send();
}
/**********End code to FINANCE NOTICE add var @Author:GAUR22AUG16*******************/


/**********Start code to add the scheme dropdown @Author:GAUR22AUG16*******************/
/**********Start code to add the scheme dropdown @Author:GAUR01SEP16*******************/
var keyCode;
function search_scheme_for_kitty(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchSchemeForKitty;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertSearchSchemeForKitty() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (schemeSearchPanelName == 'searchBySchemeName') {
            document.getElementById("schemeListDiv").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('schemeForKitty').focus();
                document.getElementById('schemeForKitty').options[0].selected = true;
            }
        } else {
            document.getElementById("kittyGroupDiv").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('schemeGroupForKitty').focus();
                document.getElementById('schemeGroupForKitty').options[0].selected = true;
            }
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//
//var keyCode;
//function search_scheme_for_chit(url, parameters) {
//    loadXMLDoc();
//
//    xmlhttp.onreadystatechange = alertSearchSchemeForChit;
//
//    xmlhttp.open('POST', url, true);
//    xmlhttp.setRequestHeader('Content-Type',
//            'application/x-www-form-urlencoded');
//    xmlhttp.setRequestHeader("Content-length", parameters.length);
//    xmlhttp.setRequestHeader("Connection", "close");
//    xmlhttp.send(parameters);
//}
//function alertSearchSchemeForChit() {
//    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        document.getElementById("chitListDiv").innerHTML = xmlhttp.responseText;
//        if (keyCode == 40 || keyCode == 38) {
//            document.getElementById('schemeForchit').focus();
//            document.getElementById('schemeForchit').options[0].selected = true;
//        }
//    } else {
//        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//    }
//}
//function searchChitForKitty(scheme, keyCodeInput) {
//    keyCode = keyCodeInput;
//
//    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//
//    var poststr = "scheme=" + encodeURIComponent(scheme);
//
//    search_scheme_for_chit('include/php/omcfscsr'+ default_theme +'.php', poststr);
//}
//var cityNameForPanelBlank;
/* START CODE TO ADD FUNCTION TO ADD GOOGLE SUGGETION FOR CRYSTAL COLOR,@AUTHOR:HEMA-4AUG2020*/
function searchForMetalColor(color, keyCodeInput, panelName) {
    var keyCode = keyCodeInput;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("colorListDiv").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('CrystalColor').focus();
                document.getElementById('CrystalColor').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/omcolorsrch' + default_theme + '.php?color=' + color + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/* END CODE TO ADD FUNCTION TO ADD GOOGLE SUGGETION FOR CRYSTAL COLOR,@AUTHOR:HEMA-4AUG2020 */
/* START CODE TO ADD FUNCTION TO ADD GOOGLE SUGGETION FOR CLARITY COLOR,@AUTHOR:HEMA-4AUG2020*/
function searchForClarityColor(clarityColor, keyCodeInput, panelName) {
    var keyCode = keyCodeInput;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("clarityColorListDiv").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('crystalClarityColor').focus();
                document.getElementById('crystalClarityColor').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/omcolorsrch' + default_theme + '.php?clarityColor=' + clarityColor + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/* END CODE TO ADD FUNCTION TO ADD GOOGLE SUGGETION FOR CLARITY COLOR,@AUTHOR:HEMA-4AUG2020 */
/* START CODE TO ADD FUNCTION TO ADD GOOGLE SUGGETION FOR CRYSTAL CUT,@AUTHOR:HEMA-4AUG2020*/
function searchForCrystalCut(cut, keyCodeInput, panelName) {
    var keyCode = keyCodeInput;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("crystalCutListDiv").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('crystalCut').focus();
                document.getElementById('crystalCut').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/omcolorsrch' + default_theme + '.php?cut=' + cut + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/* END CODE TO ADD FUNCTION TO ADD GOOGLE SUGGETION FOR CRYSTAL CUT,@AUTHOR:HEMA-4AUG2020 */
/* START CODE TO ADD FUNCTION TO ADD GOOGLE SUGGETION FOR CERTIFICATE LAB,@AUTHOR:HEMA-4AUG2020*/
function searchForCertificateLab(certificateLab, keyCodeInput, panelName) {
    var keyCode = keyCodeInput;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("certificateLabListDiv").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('crystalCertificateLab').focus();
                document.getElementById('crystalCertificateLab').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/omcolorsrch' + default_theme + '.php?certificateLab=' + certificateLab + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/* END CODE TO ADD FUNCTION TO ADD GOOGLE SUGGETION FOR CERTIFICATE LAB,@AUTHOR:HEMA-4AUG2020 */
var schemeSearchPanelName = "";
function searchSchemeForKitty(scheme, schemeGroup, keyCodeInput, panelName, subPanelName) {
    schemeSearchPanelName = panelName;
    keyCode = keyCodeInput;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "scheme=" + encodeURIComponent(scheme) +
            "&schemeGroup=" + encodeURIComponent(schemeGroup) +
            "&panelName=" + encodeURIComponent(panelName) +
            "&subPanelName=" + encodeURIComponent(subPanelName);
    search_scheme_for_kitty('include/php/omktscsr' + default_theme + '.php', poststr);
}
var cityNameForPanelBlank;
function search_scheme_for_kitty_blank(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchSchemeForKittyBlank;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertSearchSchemeForKittyBlank() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("schemeListDiv").innerHTML = xmlhttp.responseText;
    }
}
function searchSchemeForKittyBlank() {
    document.getElementById("schemeListDiv").innerHTML = '';
//    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//
//    var poststr = "";
//
//    search_scheme_for_kitty_blank('include/php/ombbblnk'+ default_theme +'.php', poststr);
}
/* START CODE TO CALL DIV TO SHOW METAL COLOR,@AUTHOR:HEMA-4AUG2020 */
function searchMetalColorForBlank(div) {
    document.getElementById(div).innerHTML = '';
}
/* END CODE TO CALL DIV TO SHOW METAL COLOR,@AUTHOR:HEMA-4AUG2020 */
//
function searchSchemeForUserBlank() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "";
    search_scheme_for_user_blank('include/php/ombbblnk' + default_theme + '.php', poststr);
}
//
var cityNameForPanelBlank;
function search_scheme_for_user_blank(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchSchemeForUserBlank;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//
function alertSearchSchemeForUserBlank() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("kittyNameDiv").innerHTML = xmlhttp.responseText;
    }
}
//
function searchChitForKittyBlank() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "";
    search_scheme_for_kitty_blank('include/php/ombbblnk' + default_theme + '.php', poststr);
}
/**********END code to add the scheme dropdown @Author:GAUR01SEP16*******************/
/**********END code to add the scheme dropdown @Author:GAUR22AUG16*******************/


/************ Start code to add update kitty @Author:GAUR23AUG16************/
/************ Start code to add update kitty @Author:GAUR30AUG16************/
function getKittyUpdateDiv(kittyId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("kittyFinDiv").innerHTML = xmlhttp.responseText;
            document.getElementById('kittyAmount').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omktdetl" + default_theme + ".php?kittyId=" + kittyId + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/************END code to add update kitty @Author:GAUR30AUG16************/
/************END code to add update kitty @Author:GAUR23AUG16************/
/************ Start code to add function passKittyEMIValues @Author:GAUR26AUG16************/
/******Start code to update function @Author:GAUR09SEP16********/
function passKittyEMIValues(kittyNo, emiPaidDD, emiPaidMM, emiPaidYY, emiAmt, custStaffLoginId, emiStatus, kPaidAmt, serialNo, custId, firmId, kittyId, kittyDOB, gDepId, gDepJrnlId, emiOccur, gEMIAmt, princAmt, dueDate, pageNo, kittyStaffId, newKittyRecipitNo, prevEMIStatus, currEMIstatus, kittyMetalType, kittyPaidAmt, kRateAmt, kWtAmt, ktGstAmt, ktTaxableAmt) {
    let a = ktValidEmiAmt(kittyNo);
    if (a == 'false') {
        showKittyUserDetails(custId, kittyId, firmId);
        return false;
    }
//alert('kitty no '+kittyNo);
//    let ii=0;PRATHAMESH
//    console.log(ii++ +'->'+kittyNo+'|'+ii++ +'->'+emiPaidDD+'|'+ii++ +'->'+emiPaidMM+'|'+ii++ +'->'+emiPaidYY+'|'+ii++ +'->'+emiAmt+'|'+ii++ +'->'+custStaffLoginId+'|'+ii++ +'->'+emiStatus+'|'+ii++ +'->'+kPaidAmt+'|'+ii++ +'->'+serialNo+'|'+ii++ +'->'+custId+'|'+ii++ +'->'+firmId+'|'+ii++ +'->'+kittyId+'|'+ii++ +'->'+kittyDOB+'|'+ii++ +'->'+gDepId+'|'+ii++ +'->'+gDepJrnlId+'|'+ii++ +'->'+emiOccur+'|'+ii++ +'->'+gEMIAmt+'|'+ii++ +'->'+princAmt+'|'+ii++ +'->'+dueDate+'|'+ii++ +'->'+pageNo+'|'+ii++ +'->'+kittyStaffId+'|'+ii++ +'->'+newKittyRecipitNo+'|'+ii++ +'->'+prevEMIStatus+'|'+ii++ +'->'+currEMIstatus+'|'+ii++ +'->'+kittyMetalType+'|'+ii++ +'->'+ kRateAmt+'|'+ii++ +'->'+kWtAmt+'|'+ii++ +'->'+kittyPaidAmt+'|'+ii++ +'->'+ktGstAmt+'|'+ii++ +'->'+ktTaxableAmt+ '*');
//    return;
    let currentEmiSts = document.getElementById('kittyDepEMIStatus' + kittyNo).value;
    if (validateSelectField(document.getElementById("DOBDay" + gDepId + kittyNo).value, "Please select Day!") == false) {
        document.getElementById("DOBDay" + gDepId + kittyNo).focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth" + gDepId + kittyNo).value, "Please select Month!") == false) {
        document.getElementById("DOBMonth" + gDepId + kittyNo).focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear" + gDepId + kittyNo).value, "Please select Year!") == false) {
        document.getElementById("DOBYear" + gDepId + kittyNo).focus();
        return false;
    } else if (prevEMIStatus == 'Due' && currentEmiSts != 'Paid' && currentEmiSts != 'Payment') {
        alert("Please pay previous all EMI");
        location.reload(true);
        return false;
    } else {
//Checking next emi status is paid or payment
        var nextKittyNo = parseInt(kittyNo) + parseInt(1);
        var nextEmiStatus = document.getElementById('kittyDepEMIStatus' + nextKittyNo).value;
        if (nextEmiStatus == 'Paid' || nextEmiStatus == 'Payment')
        {
            alert("This status will not be change, please check next EMI status !");
            location.reload(true);
            return false;
        }

        var checkKittyPaidAmt = document.getElementById("kittyPaidAmt" + kittyNo).value;
        if (kittyMetalType != 'CASH') {
            var checkKittyRateAmt = document.getElementById("kittyRateAmt" + kittyNo).value;
            var checkKittyWteAmt = document.getElementById("kittyRateAmt" + kittyNo).value;
            if (checkKittyRateAmt == '' || checkKittyWteAmt == '' ||
                    checkKittyRateAmt == null ||
                    checkKittyWteAmt == null ||
                    checkKittyRateAmt == 0.000 || checkKittyWteAmt == 0.00 ||
                    checkKittyRateAmt == 0 || checkKittyWteAmt == 0 ||
                    checkKittyWteAmt == 0)
            {
                alert("please enter the Metal Rate and Weight!");
                if (emiStatus == 'Paid' || emiStatus == 'Payment') {
                    document.getElementById('kittyDepEMIStatus' + kittyNo).value = 'Due';
                }
                return  false;
            }
        }
        var gst_check_status = document.getElementById('kitty_gst_check_status').value;
        if (checkKittyPaidAmt == '' ||
                checkKittyPaidAmt == null ||
                checkKittyPaidAmt == 0)
        {
            alert("Please enter the Paid Amt!");
            document.getElementById("kittyPaidAmt" + kittyNo).focus();
            if (emiStatus == 'Paid') {
                document.getElementById('kittyDepEMIStatus' + kittyNo).value = 'Due';
            }
            return  false;
        } else {
            confirm_box = confirm("Do you really want to change the status !");
            if (confirm_box == true) {

                loadXMLDoc();
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                    } else {
                        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                    }
                };
                if (emiStatus == 'Payment')
                {
                    openSchemePopUp(kittyNo, emiPaidDD, emiPaidMM, emiPaidYY, emiAmt, custStaffLoginId, emiStatus, kPaidAmt, serialNo, custId, firmId, kittyId, kittyDOB, gDepId, gDepJrnlId, emiOccur, gEMIAmt, princAmt, dueDate, pageNo, kittyStaffId, newKittyRecipitNo, prevEMIStatus, currEMIstatus, kittyMetalType, kRateAmt, kWtAmt, kittyPaidAmt, ktGstAmt, ktTaxableAmt);
                } else {
                    var emiPaidDate = emiPaidDD + ' ' + emiPaidMM + ' ' + emiPaidYY;
                    var poststr = "kittyNo=" + kittyNo
                            + "&emiPaidDate=" + emiPaidDate
                            + "&emiAmt=" + emiAmt
                            + "&custStaffLoginId=" + custStaffLoginId
                            + "&emiStatus=" + emiStatus
                            + "&kPaidAmt=" + kPaidAmt
                            + "&custId=" + custId
                            + "&kittyId=" + kittyId
                            + "&kittyDOB=" + kittyDOB
                            + "&gDepId=" + gDepId
                            + "&gDepJrnlId=" + gDepJrnlId
                            + "&emiOccur=" + emiOccur
                            + "&gEMIAmt=" + gEMIAmt
                            + "&princAmt=" + princAmt
                            + "&kittyEndDate=" + dueDate
                            + "&pageNo=" + pageNo
                            + "&kittyStaffId=" + kittyStaffId
                            + "&newKittyRecipitNo=" + newKittyRecipitNo
                            + "&kRateAmt=" + kRateAmt
                            + "&kWtAmt=" + kWtAmt;
                    if (kittyMetalType != 'CASH') {
                        poststr = poststr + "&kRateAmt=" + kRateAmt
                                + "&kWtAmt=" + kWtAmt;
                    }
                    if (gst_check_status == 'true')
                    {
                        poststr = poststr + "&ktGstAmt=" + ktGstAmt
                                + "&ktTaxableAmt=" + ktTaxableAmt;
                    }
                    poststr = poststr + "&serialNo=" + serialNo
//                        + "&custStaffLoginId=" + custStaffLoginId
                            + "&custId=" + custId
                            + "&firmId=" + firmId
                            + "&kittyId=" + kittyId
                            + "&kittyDOB=" + kittyDOB
                            + "&gDepId=" + gDepId
                            + "&gDepJrnlId=" + gDepJrnlId
                            + "&emiOccur=" + emiOccur
                            + "&gEMIAmt=" + gEMIAmt
                            + "&princAmt=" + princAmt
                            + "&kittyEndDate=" + dueDate
                            + "&pageNo=" + pageNo
                            + "&kittyStaffId=" + kittyStaffId
                            + "&newKittyRecipitNo=" + newKittyRecipitNo
                            + "&kittyPaidAmt=" + kittyPaidAmt;
                    //alert(poststr);
                    xmlhttp.open("POST", "include/php/omktemiin" + default_theme + ".php?" + poststr, true);
                    xmlhttp.send();
//            }
                }
            } else
            {
                loadXMLDoc();
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                    } else {
                        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                    }
                };
                //
                var operation = "canceled";
                var poststr = "operation=" + operation
                        + "&custId=" + custId
                        + "&kittyId=" + kittyId
                        + "&pageNo=" + pageNo;
                //
//                console.log("operation::" + operation);
                xmlhttp.open("POST", "include/php/omktemiin" + default_theme + ".php?" + poststr, true);
                xmlhttp.send();
            }
        }
    }
}
/******END code to update function @Author:GAUR09SEP16********/
/************END code to add function passKittyEMIValues @Author:GAUR26AUG16************/

/******Start code to add function deleteCustKittyDetails @Author:GAUR26AUG16********/
function deleteCustKittyDetails(kittyId, custId)
{

    document.getElementById("ajaxLoadUdhaarDepositMon" + kittyId).style.visibility = "visible";
    confirm_box = confirm("Do you really want to Permanent Delete this Kitty Details?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        var poststr = "kittyId=" + kittyId +
                "&custId=" + custId;
        delete_girvi('include/php/omktgrdl' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    } else {
        document.getElementById("ajaxLoadUdhaarDepositMon" + kittyId).style.visibility = "hidden";
    }
}
/******End code to add function deleteCustKittyDetails @Author:GAUR26AUG16********/


/******Start code to add function deleteCustKittyDetails @Author:GAUR26AUG16********/
function closeKittyDate(kittyId, kittyCustId, DOBClDay, DOBClMonth, DOBClYear)
{
//    alert(kittyCustId)
    confirm_box = confirm("Do you really want to Permanent Close this Kitty Details?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("kittyFinDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }

        };
        xmlhttp.open("POST", "include/php/omktclosedate" + default_theme + ".php?kittyId=" + kittyId + "&kittyCustId=" + kittyCustId + "&DOBClDay=" + DOBClDay + "&DOBClMonth=" + DOBClMonth + "&DOBClYear=" + DOBClYear, true);
        xmlhttp.send();
    }
}
/******End code to add function deleteCustKittyDetails @Author:GAUR26AUG16********/


/******START code to add function KITTY DETAILS @Author:GAUR26AUG16********/
/******START code to UPDATE function KITTY DETAILS @Author:GAUR02SEP16********/
/******START code to update function @Author:GAUR09SEP16********/
function cust_kitty_details(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertCustKittyDetails;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertCustKittyDetails() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }

}
function custKittyDetails(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (obj) {
        var poststr = "custId=" + custId
                + "&firmId=" + encodeURIComponent(document.getElementById("custFirmId").value);
        cust_kitty_details('include/php/omktpydtl' + default_theme + '.php', poststr); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    }

}
/******END code to update function @Author:GAUR09SEP16********/
/******END code to UPDATE function KITTY DETAILS @Author:GAUR02SEP16********/
/******END code to add function KITTY DETAILS @Author:GAUR26AUG16********/

/******Start code to update function payoutKittyDetails @Author:GAUR01SEPT16********/
/******Start code to update function payoutKittyDetails @Author:GAUR09SEP16********/
function payoutKittyDetails(totalDepAmount, kittyScheme, kittyId, custId, kittyBonusAmt, kittyFirmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("kittyPayoutDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("kittyPayoutDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omktpyot" + default_theme + ".php?totalDepAmount=" + totalDepAmount + "&kittyScheme=" + kittyScheme + "&kittyId=" + kittyId + "&custId=" + custId + "&kittyBonusAmt=" + kittyBonusAmt + "&kittyFirmId=" + kittyFirmId, true);
    xmlhttp.send();
}
/******End code to update function payoutKittyDetails @Author:GAUR09SEP16********/
/******End code to update function payoutKittyDetails @Author:GAUR01SEPT16********/
/*****************************CHANGE BONUS AMOUNT ONCLICK FUNCTION ***************/
function changeKittyBonusAmount()
{
    var confirm_box = confirm("Do you really want to change bonus amount");
    if (confirm_box == true)
    {
        var kittyBonusAmt = document.getElementById('kittyBonusAmount').value;
        var totNoEmi = document.getElementById('kittyNoOfEmi').value;
        var kittyAmount = document.getElementById('kittyEmiAmount').value;
        /*  */
        if (kittyAmount == 0 || kittyAmount == 0.00) {
            alert('EMI amount must be greater than zero!');
            return false;
        }
        var kittyTotalAmt = (totNoEmi * kittyAmount);
        document.getElementById('kittyAmount').value = kittyTotalAmt;
        if (kittyTotalAmt == '' || kittyBonusAmt == '') {
            document.getElementById('kittyFinalAmount').value = kittyTotalAmt;
        } else {
            document.getElementById('kittyFinalAmount').value = (parseFloat(kittyTotalAmt) + parseFloat(kittyBonusAmt));
        }
    }

}
/****************************************Add function for change end date and change amount @Author:GAUR02SEP16**********************************/
function changeKittyAmount() {
    var totNoEmi = document.getElementById('kittyNoOfEmi').value;
    var kittyAmount = document.getElementById('kittyEmiAmount').value;
    /* START CODE TO CHECK IF BONUS AMOUNT IS SET SAME AS EMI AMOUNT @AUTHOR:MADHUREE-27AUGUST2020 */
    if (document.getElementById('kittyBonusAmountStatus').value == 'EMI') {
        document.getElementById('kittyBonusAmount').value = kittyAmount;
        var kittyBonusAmt = kittyAmount;
    } else {
        var kittyBonusAmt = document.getElementById('kittyBonusAmount').value;
    }
    /* END CODE TO CHECK IF BONUS AMOUNT IS SET SAME AS EMI AMOUNT @AUTHOR:MADHUREE-27AUGUST2020 */
    if (kittyAmount == 0 || kittyAmount == 0.00) {
        alert('EMI Amount Must Be Greater than 0');
        return false;
    }
    var kittyTotalAmt = (totNoEmi * kittyAmount);
    document.getElementById('kittyAmount').value = kittyTotalAmt;
    if (kittyTotalAmt == '' || kittyBonusAmt == '') {
        document.getElementById('kittyFinalAmount').value = kittyTotalAmt;
    } else {
        document.getElementById('kittyFinalAmount').value = (parseFloat(kittyTotalAmt) + parseFloat(kittyBonusAmt));
    }
}
//
function calculateEndTkn() {
    var startTokenNo = document.getElementById('stTokenNo').value;
    var numberOfUsers = document.getElementById('noOfUsers').value;
    if (numberOfUsers <= 0) {
        document.getElementById('stTokenNo').value = '';
        document.getElementById('endTokenNo').value = '';
        document.getElementById('noOfUsersHidden').style.visibility = 'visible';
    } else {
        document.getElementById('noOfUsersHidden').style.visibility = 'hidden';
        var eTokenNo = parseInt(startTokenNo) + parseInt(numberOfUsers);
        var endTokenNnumber = parseInt(eTokenNo) - 1;
        document.getElementById('endTokenNo').value = endTokenNnumber;
    }
}
//
function showAllUserGrp(kitty_group, kitty_scheme, keyCodeInput) {
//
    keyCode = keyCodeInput;
    //
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    //
    var poststr = "kitty_group=" + encodeURIComponent(kitty_group) +
            "&kitty_scheme=" + encodeURIComponent(kitty_scheme);
    //
    search_scheme_for_user_grp('include/php/omusrdrp' + default_theme + '.php', poststr);
    //
}
//
var keyCode;
function search_scheme_for_user_grp(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchSchemeForUserGrp;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//
function alertSearchSchemeForUserGrp() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("kittyNameDiv").innerHTML = xmlhttp.responseText;
        if (keyCode == 40 || keyCode == 38) {
            document.getElementById('schemeGroupForKitty').focus();
            document.getElementById('schemeGroupForKitty').options[0].selected = true;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//
function getAllUserGrpDetails(kittyGroup) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("KittyUserGroupMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omktgtusrgrpdetl" + default_theme + ".php?kittyGroup=" + kittyGroup, true);
    xmlhttp.send();
}
//
function getAllNewUserGrpTokenNum(kittyGroup) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("kittyTokenNo").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omktgtusrgrpdetlnewtkn" + default_theme + ".php?kittyGroup=" + kittyGroup, true);
    xmlhttp.send();
}
//
function getCurrentTimeBoxJS(inTime, outTime) {
//    alert(outTime);
//alert("hi");
    var d = new Date();
    var h = d.getHours();
    var m = d.getMinutes();
    var s = d.getSeconds();
    var nowTime = h + ":" + m + ":" + s;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (inTime != 'wtIn' && outTime == '') {
                document.getElementById("timeIn").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("timeOut").innerHTML = xmlhttp.responseText;
                document.getElementById("timeOutHidden").value = document.getElementById("timeOut").value;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omboxinoutcrtime" + default_theme + ".php?nowTime=" + nowTime + "&inTime=" + inTime + "&outTime=" + outTime, true);
    xmlhttp.send();
}
//
function getBoxBarcodeDetails(barcodeNum, srNo) {
//    alert(barcodeNum);
//    alert(srNo);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barodeBox").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omboxinoutbarcode" + default_theme + ".php?barcodeNum=" + barcodeNum + "&srNo=" + srNo, true);
    xmlhttp.send();
}
//
function getDescIntrestAmount(amount, intInPer, custID) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("descIntAmt").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omDepWithdrwIntCalculation" + default_theme + ".php?amount=" + amount + "&intInPer=" + intInPer + "&custID=" + custID, true);
    xmlhttp.send();
}
//
function getUpdatePanelNameDetails(UpdatePanelName) {
//alert(UpdatePanelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("panelNameBarcode").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omboxinout" + default_theme + ".php?UpdatePanelName=" + UpdatePanelName, true);
    xmlhttp.send();
}
function getDiffInWt(weightIn, weightOut, timeOut) {
    var wtIn = weightIn;
    var wtout = weightOut;
    var diffInWt = parseFloat(weightIn) - parseFloat(weightOut);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("diffInWt").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omboxinoutcrtime" + default_theme + ".php?diffInWt=" + diffInWt + "&timeOut=" + timeOut, true);
    xmlhttp.send();
}
//
function showBoxMovementDetails(stlcSrNo, stlcWtIn, panelName) {
//    alert(panelName);
//    alert("hi");
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("boxMove").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omboxinout" + default_theme + ".php?stlcSrNo=" + stlcSrNo + "&panelName=" + panelName, true);
    xmlhttp.send();
}
//
function edateChange() {
    if (document.getElementById('panelName').value == 'directSchemeAdd') {
        var DOBDay = document.getElementById('schemeDOBDay').value;
        var DOBMonth = document.getElementById('schemeDOBMonth').value;
        var DOBYear = document.getElementById('schemeDOBYear').value;
    } else {
        var DOBDay = document.getElementById('DOBDay').value;
        var DOBMonth = document.getElementById('DOBMonth').value;
        var DOBYear = document.getElementById('DOBYear').value;
    }
    var noOfEmi = document.getElementById('kittyNoOfEmi').value;
    var noOfDays = document.getElementById('kittyNoOfDays').value;
    var noOfEmiTyp = document.getElementById('addSchemePrdTyp').value;
    // alert(DOBDay + ' ' + DOBMonth + ' ' + DOBYear + ' ' + noOfEmi + ' noOfDays:' + noOfDays + ' ' + noOfEmiTyp);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("kittyEdate").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omktedat" + default_theme + ".php?DOBDay=" + DOBDay + "&DOBMonth=" + DOBMonth + "&DOBYear=" + DOBYear + "&noOfEmi=" + noOfEmi + "&noOfEmiTyp=" + noOfEmiTyp + "&noOfDays=" + noOfDays + "&class=textLabel14CalibriGrey", true);
    xmlhttp.send();
}


/// <!--***********start Todo Target Date :Author:SWAPNIL14JAN2020-->
function todoedateChange() {
    if (document.getElementById('panelName').value == 'directSchemeAdd') {
        var DOBDay = document.getElementById('DOBDay').value;
        var DOBMonth = document.getElementById('DOBMonth').value;
        var DOBYear = document.getElementById('DOBYear').value;
    } else {
        var DOBDay = document.getElementById('DOBDay').value;
        var DOBMonth = document.getElementById('DOBMonth').value;
        var DOBYear = document.getElementById('DOBYear').value;
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("todoeDateDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omtodoedate" + default_theme + ".php?DOBDay=" + DOBDay + "&DOBMonth=" + DOBMonth + "&DOBYear=" + DOBYear + "&class=textLabel14CalibriGrey", true);
    xmlhttp.send();
}

// <!--***********End Todo Target DateAuthor:SWAPNIL14JAN2020-->
//
function firmChangeAllSelectedRecord(delCheck, custId, girviId, girviFirmId) {
    confirm_box = confirm(updateGirvFirmAlert2 + "\n\nDo you really want to change this Firm Name?");
    var selectedDelId = new Array();
    for (var i = 0; i < delCheck.length; i++) {
        if (delCheck[i].checked)
            selectedDelId.push(delCheck[i].value);
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("loanfirmDiv").innerHTML = xmlhttp.responseText;
//                
            window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omfrmchng" + default_theme + ".php?selectedDelId=" + selectedDelId + "&custId=" + custId + "&girviId=" + girviId + "&girviFirmId=" + girviFirmId, true);
    xmlhttp.send();
}
//
/***************START CODE TO ADD FUNCTION TO APPROVE KITTY STATUS,@AUTHOR:HEMA-1JUN2020*********************/
function approveAll(delCheck) {
    confirm_box = confirm(schemeApprovel1 + "\n\nDo you really want to approve?");
    var selectedDelId = new Array();
    for (var i = 0; i < delCheck.length; i++) {
        if (delCheck[i].checked)
            selectedDelId.push(delCheck[i].value);
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("kittyApproveAllDiv").style.visibility = "visible";
            document.getElementById("kittyApproveAllDiv").innerHTML = xmlhttp.responseText;
//                
            window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omkittyapproveall" + default_theme + ".php?selectedDelId=" + selectedDelId, true);
    xmlhttp.send();
}
/***************START CODE TO ADD FUNCTION TO APPROVE KITTY STATUS,@AUTHOR:HEMA-1JUN2020*********************/
//
/***************START CODE TO ADD FUNCTION TO APPROVE ALL KITTY STATUS,@AUTHOR:HEMA-13JUN2020*********************/
function approveAllStatus(delCheck) {
    confirm_box = confirm(schemeApprovel2 + "\n\nDo you really want to approve all?");
    var selectedDelId = new Array();
    for (var i = 0; i < delCheck.length; i++) {
        selectedDelId.push(delCheck[i].value);
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("kittyApproveAllDiv").style.visibility = "visible";
            document.getElementById("kittyApproveAllDiv").innerHTML = xmlhttp.responseText;
//                
            window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omkittyapproveall" + default_theme + ".php?selectedDelId=" + selectedDelId, true);
    xmlhttp.send();
}
/***************START CODE TO ADD FUNCTION TO APPROVE ALL KITTY STATUS,@AUTHOR:HEMA-13JUN2020*********************/
//
/***************START CODE TO ADD FUNCTION TO APPROVE KITTY STATUS FROM ADMIN OR OWNER,@AUTHOR:HEMA-1JUN2020*********************/
function completeAll(delCheck) {
    confirm_box = confirm(schemeApprovel3 + "\n\nDo you really want to approve status ?");
    var selectedDelId = new Array();
    for (var i = 0; i < delCheck.length; i++) {
        if (delCheck[i].checked)
            selectedDelId.push(delCheck[i].value);
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("kittyCompleteAllDiv").style.visibility = "visible";
            document.getElementById("kittyCompleteAllDiv").innerHTML = xmlhttp.responseText;
//                
            window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omkittycompleteall" + default_theme + ".php?selectedDelId=" + selectedDelId, true);
    xmlhttp.send();
}
/***************END CODE TO ADD FUNCTION TO APPROVE KITTY STATUS FROM ADMIN OR OWNER,@AUTHOR:HEMA-1JUN2020*********************/
//
/***************START CODE TO ADD FUNCTION TO COMPLETE ALL KITTY STATUS FROM ADMIN OR OWNER,@AUTHOR:HEMA-1JUN2020*********************/
function completeAllStatus(delCheck) {
    confirm_box = confirm(schemeApprovel4 + "\n\nDo you really want to approve all status ?");
    var selectedDelId = new Array();
    for (var i = 0; i < delCheck.length; i++) {
        selectedDelId.push(delCheck[i].value);
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("kittyCompleteAllDiv").style.visibility = "visible";
            document.getElementById("kittyCompleteAllDiv").innerHTML = xmlhttp.responseText;
//                
            window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omkittycompleteall" + default_theme + ".php?selectedDelId=" + selectedDelId, true);
    xmlhttp.send();
}
/***************END CODE TO ADD FUNCTION TO COMPLETE ALL KITTY STATUS FROM ADMIN OR OWNER,@AUTHOR:HEMA-13JUN2020*********************/
/*************START CODE TO ADD FUNCTION TO DELETE ONLINE CUSTOMER,@AUTHOR:HEMA-28SEP2020***********************/
function deleteOnlineCustmor(panel, delCheck) {
    confirm_box = confirm(updateGirvFirmAlert2 + "\n\nDo you really want to delete this online customer?");
//    var selectedDelId = new Array();
//    for (var i = 0; i < delCheck.length; i++) {
//        if (delCheck[i].checked)
//            selectedDelId.push(delCheck[i].value);
//    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("onlineCustDiv").style.visibility = "visible";
            document.getElementById("onlineCustDiv").innerHTML = xmlhttp.responseText;
//                
            window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omecom/omDeleteOnlineCust" + default_theme + ".php?selectedDelId=" + delCheck, true);
    xmlhttp.send();
}
/*************END CODE TO ADD FUNCTION TO DELETE ONLINE CUSTOMER,@AUTHOR:HEMA-28SEP2020*************************/
//
function edateCFChange() {
    var DOBDay = document.getElementById('DOBDay').value;
    var DOBMonth = document.getElementById('DOBMonth').value;
    var DOBYear = document.getElementById('DOBYear').value;
    var noOfEmi = document.getElementById('chitNoOfEmi').value;
    var noOfDays = document.getElementById('chitNoOfDays').value;
    var noOfEmiTyp = document.getElementById('addSchemePrdTyp').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("chitEdate").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("chitEdate").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcfedat" + default_theme + ".php?DOBDay=" + DOBDay + "&DOBMonth=" + DOBMonth + "&DOBYear=" + DOBYear + "&noOfEmi=" + noOfEmi + "&noOfEmiTyp=" + noOfEmiTyp + "&noOfDays=" + noOfDays + "&class=textLabel14CalibriGrey", true);
    xmlhttp.send();
}

function changeChitAmount() {
    var totNoEmi = document.getElementById('chitNoOfEmi').value;
    var chitAmount = document.getElementById('chitFundAmount').value;
    if (chitAmount == 0 || chitAmount == 0.00) {
        alert('FOUND Amount Must Be Greater than 0');
        return false
                ;
    }
    var chitTotalAmt = (chitAmount / totNoEmi);
    document.getElementById('chitEmiAmount').value = chitTotalAmt;
    if (chitTotalAmt == '' || chitBonusAmt == '') {
        document.getElementById('chitFinalAmount').value = chitTotalAmt;
    } else {
        document.getElementById('chitFinalAmount').value = (parseFloat(chitTotalAmt));
    }
}
function changeLossAmount(totChitAmt, chitAmount) {
//    alert(totChitAmt);
//    alert(chitAmount);
    if (chitAmount == '0' || chitAmount == '0.00') {
        alert('FOUND Amount Must Be Greater than 0');
        return false
                ;
    }
    var chitWinAmt = totChitAmt - chitAmount;
    document.getElementById('chitAmount').value = chitWinAmt;
}
function changeChitPaidAmount(amount, chitPaidAmount, serialNo) {
    if (chitAmount == '0' || chitAmount == '0.00') {
        alert('FOUND Amount Must Be Greater than 0');
        return false
                ;
    }
    var chitLeftAmt = amount - chitPaidAmount;
    document.getElementById('leftamt' + serialNo).value = chitLeftAmt;
}
/*****************Start to Code Search Customer @AUTHOR: Bajrang23NOV2018*************************/
function searchCustToAddChit(custFName, panelDivName, chitCustId, chitId) {
//    alert(chitCustId);
    if (true) {
        var poststr = "custFName=" + encodeURIComponent(custFName)
                + "&panelDivName=" + encodeURIComponent(panelDivName)
                + "&chitCustId=" + encodeURIComponent(chitCustId)
                + "&chitId=" + encodeURIComponent(chitId);
        search_cust_fname_to_add_chit('include/php/omccscag' + default_theme + '.php', poststr);
    } else {
//        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
    }
}
//
function search_cust_fname_to_add_chit(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCustFNameToAddChit;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//
function alertSearchCustFNameToAddChit() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("custListForAddChitDiv").innerHTML = xmlhttp.responseText;
    } else {
//        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    }
}

function getChitCustomerAdd(custPanelOption, custId, firmId, chitCustId, chitId) {
//    alert(custPanelOption);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (xmlhttp.responseText == 'sucess')
            {
                setTimeout(showMemberDetails, 500, custPanelOption, custId, firmId, chitCustId, chitId);
//                showMemberDetails(custId, firmId, chitCustId,chitId);
            }
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcfdtad" + default_theme + ".php?custPanelOption=" + custPanelOption + "&custId=" + custId + "&firmId=" + firmId + "&chitCustId=" + chitCustId, true); // showPanelDiv added @Author:SHRI20JUN16
    xmlhttp.send();
}

function showChitFundDetails(custPanelOption, custId, firmId, chitCustId, chitId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("enterCustDetailsDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//            document.getElementById("enterCustDetailsDiv").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/omcfpydtl" + default_theme + ".php?custPanelOption=" + custPanelOption + "&custId=" + custId + "&firmId=" + firmId + "&chitCustId=" + chitCustId + "&chitId=" + chitId + "&display1=Yes", true);
    xmlhttp.send();
}
function showMemberDetails(custPanelOption, custId, firmId, chitCustId, chitId) {
//    alert('**' + chitId);
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
//            alert('&&&' + xmlhttp2.responseText);
            //document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("enterCustDetailsDiv").innerHTML = xmlhttp2.responseText;
        } else {
            //document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp2.open("POST", "include/php/omcfpydtl" + default_theme + ".php?custPanelOption=" + custPanelOption + "&custId=" + custId + "&firmId=" + firmId + "&chitCustId=" + chitCustId + "&chitId=" + chitId + "&display=Yes", true);
    xmlhttp2.send();
}
function getChitNameDetails(custId, firmId, chitCustId, chitId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("enterCustDetailsDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//            document.getElementById("enterCustDetailsDiv").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/omcfpydtl" + default_theme + ".php?custId=" + custId + "&firmId=" + firmId + "&chitCustId=" + chitCustId + "&chitId=" + chitId + "&display=Yes", true);
    xmlhttp.send();
}

function getChitNameDiv(chitCId, div, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('chitcustname').focus();
                document.getElementById('chitcustname').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "omchitcustname" + default_theme + ".php?chitCId=" + chitCId + "&div=" + div, true);
    xmlhttp.send();
}
function showChitDetails(custId, firmId, chitCustId, chitId) {
//    alert(chitId);
//    alert(chitCustId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("enterCustDetailsDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//            document.getElementById("enterCustDetailsDiv").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/omcfpydtl" + default_theme + ".php?custId=" + custId + "&firmId=" + firmId + "&chitCustId=" + chitCustId + "&chitId=" + chitId + "&display=Yes", true);
    xmlhttp.send();
}
function showChitAmtDetails(chitAmount, chitWinner, lossAmount, chitPId, chitCId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "omcfwinamt" + default_theme + ".php?chitAmount=" + chitAmount + "&chitWinner=" + chitWinner + "&lossAmount=" + lossAmount + "&chitPId=" + chitPId + "&chitCId=" + chitCId, true);
    xmlhttp.send();
}

function showChitFundList(user) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText; //change in div @AUTHOR: SANDY23DEC13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcccldv" + default_theme + ".php?user=" + user, true);
    xmlhttp.send();
}
function showChutFundCollectedList() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerListDiv").innerHTML = xmlhttp.responseText; //change in div @AUTHOR: SANDY23DEC13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcfemilst" + default_theme + ".php", true);
    xmlhttp.send();
}

function showChitUserDetails(custId, kittyId) {
//    alert(custId);
//    alert(kittyId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&kittyId=" + kittyId + "&panelDivName=" + "chitfundInfo", true);
    xmlhttp.send();
}

function searchChitFundByName(obj) {
    document.getElementById("enterCustDetailsDiv").style.visibility = "hidden";
    document.getElementById("ajaxCustSearchDiv").style.visibility = "visible";
    if (valSearchCustNameOrMobNoInputs(obj)) {

        var poststr = "";
        // 
        if (hasHindiCharacters(document.getElementById("custName").value) == true) {
            poststr = "custName=" + encodeURIComponent(document.getElementById("custName").value);
            search_cust_name_mobno('include/php/omccsrcl' + default_theme + '.php', poststr);
        }
//
        if (validateNumWithOutAlert(document.getElementById("custName").value) == true) {
            poststr = "custMobileNo=" + encodeURIComponent(document.getElementById("custName").value);
            search_cust_name_mobno('include/php/omccscml' + default_theme + '.php', poststr);
        }

        if (validateAlphaWithSpaceWithOutAlert(document.getElementById("custName").value) == true) {
            poststr = "custName=" + encodeURIComponent(document.getElementById("custName").value);
            search_cust_name_mobno('include/php/omccsrcl' + default_theme + '.php', poststr);
        }
    } else {
        document.getElementById("enterCustDetailsDiv").style.visibility = "visible";
        document.getElementById("ajaxCustSearchDiv").style.visibility = "hidden";
    }
}

/******Start code to add function deleteCustKittyDetails @Author:GAUR26AUG16********/
function deleteCustChitDetails(chitId, custId)
{
//    document.getElementById("ajaxLoadUdhaarDepositMon" + kittyId).style.visibility = "visible";
    confirm_box = confirm("Do you really want to Permanent Delete this Chit Details?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        var poststr = "chitId=" + chitId +
                "&custId=" + custId;
        delete_girvi('include/php/omcfgrdl' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    } else {
//        document.getElementById("ajaxLoadUdhaarDepositMon" + kittyId).style.visibility = "hidden";
    }
}
/******End code to add function deleteCustKittyDetails @Author:GAUR26AUG16********/


/*****************End to Code Search Customer @AUTHOR: Bajrang23NOV2018*************************/

function changeKittyPayoutAmount() {
    var totKittyPaidAmt = document.getElementById('kittyPaidAmt').value;
    var kittyBonusAmt = document.getElementById('kittyBonusAmt').value;
    document.getElementById('kittyTotAmt').value = (parseFloat(totKittyPaidAmt) + parseFloat(kittyBonusAmt));
}

/******Start code to update function payKitty @Author:GAUR09SEP16********/
function payKitty(kittyId, custId, kittyFirmId, totalDepAmount, kittyBonusAmt, totalAmt) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("kittyPayDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("kittyPayoutDiv").style.visibility = "hidden";
        } else {
            document.getElementById("kittyPayDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omktpyamt" + default_theme + ".php?kittyId=" + kittyId + "&custId=" + custId + "&kittyFirmId=" + kittyFirmId + "&totalDepAmount=" + totalDepAmount + "&kittyBonusAmt=" + kittyBonusAmt + "&totalAmt=" + totalAmt, true);
    xmlhttp.send();
}
/******End code to update function payKitty @Author:GAUR09SEP16********/

//****************************add Navigate Girvi @Author:GAUR09SEP16*******************************************************************
function navigationKitty(pageNo, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.barcode_search.barcode_text.focus();
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omktpydtl" + default_theme + ".php?page=" + pageNo + "&custId=" + custId, true); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
//***************************add* Navigate Girvi Receipt Panel @Author:GAUR09SEP16*******************************************************************

//****************************add Navigate CHIT FUND @Author:BAJRANG23NOV18*******************************************************************
function navigationChit(pageNo, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.barcode_search.barcode_text.focus();
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcfpydtl" + default_theme + ".php?page=" + pageNo + "&custId=" + custId, true); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
//***************************add* Navigate CHIT FUND @Author:BAJRANG23NOV18*******************************************************************
/****************************************Add function for change end date and change amount @Author:GAUR02SEP16**********************************/
//***************************start add item code nevigation @Author:GAUR12SEP16*******************************************************************
function navigateImitationCodePanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omicaaind" + default_theme + ".php", true);
    xmlhttp.send();
}
//***************************end add item code nevigation @Author:GAUR12SEP16*******************************************************************
//*************start Get ItemCode Details @Author:GAUR12SEP16**************************************************************
var itmCodeId;
function setItmCodeId(obj) {

    itmCodeId = obj.id;
}
function getItmCode(obj) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addUpdateSchemeNameDiv").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omsuindv" + default_theme + ".php?schemeNameId=" + schemeNameId,
            true);
    xmlhttp.send();
}
//*************end Get ItemCode Details @Author:GAUR12SEP16**************************************************************
//************* start Get ItemCode Details @Author:GAUR12SEP16*******************
var itemCodeId;
function setItmCodeId(obj) {

    itemCodeId = obj.id;
}
function getImtCode(obj) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addUpdateImitationCodeDiv").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcuindv" + default_theme + ".php?itemCodeId=" + itemCodeId,
            true);
    xmlhttp.send();
}
//*************end Get ItemTunch Details @Author:GAUR12SEP16*******************
//************* start update ItemCode Details @Author:GAUR12SEP16*******************
function updateDeleteItmCode() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateAddItmCodeInputs()) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("UpdateItmCode").style.visibility = "visible";
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    }
}

function validateAddItmCodeInputs(obj) {
    if (validateEmptyField(document.getElementById("addImtCodeId").value, "Please Enter Item Code Id!") == false ||
            validateAlphaNumWithSpaceWithSlash(document.getElementById("addImtCodeId").value, "Accept only alpha or numeric characters or with space character!") == false) {
        document.getElementById("addImtCodeId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addImtCodePrice").value, "Please enter Item Code Price!") == false ||
            validateNumWithDot(document.getElementById("addImtCodePrice").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("addImtCodePrice").focus();
        return false;
    }
    return true;
}

function addSettImtCode() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateAddItmCodeInputs()) {
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    }
}
//************* end update ItemCode Details @Author:GAUR12SEP16*******************


//************* start code kitty Details @Author:GAUR13SEP16*******************
function showKittyDetails(custId, firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("kittyFinDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omktpydtl" + default_theme + ".php?custId=" + custId + "&firmId=" + firmId, true);
    xmlhttp.send();
}
//
function addUserGroup(firmId) {
//    alert(firmId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("schemeMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omktusergrp" + default_theme + ".php?firmId=" + firmId, true);
    xmlhttp.send();
}
function showKittyUserDetails(custId, kittyId, panelName, kittyPayUp) {
    //alert(kittyPayUp);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&kittyId=" + kittyId + "&panelDivName=" + "kittyInfo" + "&panelName=" + panelName + "&updateUserPay=" + kittyPayUp, true);
    xmlhttp.send();
}
function showFinanceUserDetails(custId, girvId, panelName, kittyPayUp) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&girvId=" + girvId + "&panelDivName=FinanceEmi", true);//olggcgdt
    xmlhttp.send();
}
function showCustUdhaarDetails(utinId, custId) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //xmlhttp.open("POST", "include/php/omuanwdt"+ default_theme +".php?invoiceNo=" + invoiceNo + "&utinId=" + utinId + "&custId=" + custId, true);
    xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&custPanelOption=" + 'CustUdhaar', true);
    xmlhttp.send();
}
function showCustadvMoneyDetails(utinId, custId, showDivPanel) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //xmlhttp.open("POST", "include/php/omuanwdt"+ default_theme +".php?invoiceNo=" + invoiceNo + "&utinId=" + utinId + "&custId=" + custId, true);
    xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&custPanelOption=" + 'CustAdvance' + "&showDivPanel=" + showDivPanel, true);
    xmlhttp.send();
}

function showkittyCloseDetails() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("kittyFinDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("kittyFinDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omktcldt" + default_theme + ".php", true);
    xmlhttp.send();
}
//************* end code kitty Details @Author:GAUR13SEP16*******************

/********Strat code to add updateSize55BarCode @Author:GAUR14SEP16**************/
function updateSize55BarCode(omLayoutOptionTop, omLayFontSize1, fontSizeBarCode1, omLayFontSize2, fontSizeBarCode2, omLayFontSize3, fontSizeBarCode3, omLayFontSize4, fontSizeBarCode4, omLayFontSize5, fontSizeBarCode5,
        omLayFontSize6, fontSizeBarCode6, omLayFontSize7, fontSizeBarCode7, omLayFontSize8, fontSizeBarCode8, omLayFontSize9, fontSizeBarCode9, omLayFontSize10, fontSizeBarCode10, omLayFontSize11, fontSizeBarCode11,
        caption1, caption2, caption3, caption4, caption5, caption6, caption7, caption8, caption9, caption10, caption11, panel, fontSizeBarCode12, caption12, omLayFontSize12) {
    loadXMLDoc();
    //alert(fontSizeBarCode1);

    // alert(panel);


    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barCodePrintPanelDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("bcMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>UPDATED</span>";
            window.setTimeout(closeBCMessDiv, 1500);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var postStr = 'omLayoutOptionTop=' + omLayoutOptionTop + '&fontSize1=' + omLayFontSize1 + '&fontSizeValue1=' + fontSizeBarCode1 + '&fontSize2=' + omLayFontSize2 + '&fontSizeValue2=' + fontSizeBarCode2 + '&fontSize3=' + omLayFontSize3 + '&fontSizeValue3=' + fontSizeBarCode3
            + '&fontSize4=' + omLayFontSize4 + '&fontSizeValue4=' + fontSizeBarCode4 + '&fontSize5=' + omLayFontSize5 + '&fontSizeValue5=' + fontSizeBarCode5 + '&fontSize6=' + omLayFontSize6 + '&fontSizeValue6=' + fontSizeBarCode6 + '&fontSize7=' + omLayFontSize7 + '&fontSizeValue7=' + fontSizeBarCode7

            + '&fontSize8=' + omLayFontSize8 + '&fontSizeValue8=' + fontSizeBarCode8 + '&fontSize9=' + omLayFontSize9 + '&fontSizeValue9=' + fontSizeBarCode9 + '&fontSize10=' + omLayFontSize10 + '&fontSizeValue10=' + fontSizeBarCode10 + '&fontSize11=' + omLayFontSize11 + '&fontSizeValue11=' + fontSizeBarCode11 + '&captionvalue1=' + caption1 +
            '&captionvalue2=' + caption2 + '&captionvalue3=' + caption3 + '&captionvalue4=' + caption4 + '&captionvalue5=' + caption5 + '&captionvalue6=' + caption6
            + '&captionvalue7=' + caption7 + '&captionvalue8=' + caption8 + '&captionvalue9=' + caption9 + '&captionvalue10=' + caption10 + '&captionvalue11=' + caption11 + '&panel=' + panel + '&fontSizeValue12=' + fontSizeBarCode12 + '&captionvalue12=' + caption12 + '&fontSize12=' + omLayFontSize12;
    xmlhttp.open("POST", "include/php/ombcbcup" + default_theme + ".php?" + postStr, true);
    xmlhttp.send();
}
/********END code to add updateSize55BarCode @Author:GAUR14SEP16**************/
//
//
/****START CODE ADDED updateSizeLoanBarCode FUNCTION @SIMRAN:05SEPT2023 *****/
function updateSizeLoanBarCode(omLayoutOptionTop, omLayFontSize1, fontSizeBarCode1, omLayFontSize2, fontSizeBarCode2, omLayFontSize3, fontSizeBarCode3, omLayFontSize4, fontSizeBarCode4, omLayFontSize5, fontSizeBarCode5,
        omLayFontSize6, fontSizeBarCode6, omLayFontSize7, fontSizeBarCode7, omLayFontSize8, fontSizeBarCode8, omLayFontSize9, fontSizeBarCode9, caption1, caption2, caption3, caption4, caption5, caption6, caption7, caption8, caption9, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barCodePrintPanelDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("bcMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>UPDATED</span>";
            window.setTimeout(closeBCMessDiv, 1500);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var postStr = 'omLayoutOptionTop=' + omLayoutOptionTop + '&fontSize1=' + omLayFontSize1 + '&fontSizeValue1=' + fontSizeBarCode1 + '&fontSize2=' + omLayFontSize2 + '&fontSizeValue2=' + fontSizeBarCode2 + '&fontSize3=' + omLayFontSize3 + '&fontSizeValue3=' + fontSizeBarCode3
            + '&fontSize4=' + omLayFontSize4 + '&fontSizeValue4=' + fontSizeBarCode4 + '&fontSize5=' + omLayFontSize5 + '&fontSizeValue5=' + fontSizeBarCode5 + '&fontSize6=' + omLayFontSize6 + '&fontSizeValue6=' + fontSizeBarCode6 + '&fontSize7=' + omLayFontSize7 + '&fontSizeValue7=' + fontSizeBarCode7
            + '&fontSize8=' + omLayFontSize8 + '&fontSizeValue8=' + fontSizeBarCode8 + '&fontSize9=' + omLayFontSize9 + '&fontSizeValue9=' + fontSizeBarCode9 + '&captionvalue1=' + caption1
            + '&captionvalue2=' + caption2 + '&captionvalue3=' + caption3 + '&captionvalue4=' + caption4 + '&captionvalue5=' + caption5 + '&captionvalue6=' + caption6
            + '&captionvalue7=' + caption7 + '&captionvalue8=' + caption8 + '&captionvalue9=' + caption9 + '&panel=' + panel;
    xmlhttp.open("POST", "include/php/ombcbcup" + default_theme + ".php?" + postStr, true);
    xmlhttp.send();
}
/****END CODE ADDED updateSizeLoanBarCode FUNCTION @SIMRAN:05SEPT2023 *****/
//
//
//
/********Strat code to add updateSize55BarCode @Author:GAUR14SEP16**************/
function updateSize55imiBarCode(omLayoutOptionTop, omLayFontSize1, fontSizeBarCode1, omLayFontSize2, fontSizeBarCode2, omLayFontSize3, fontSizeBarCode3, omLayFontSize4, fontSizeBarCode4, omLayFontSize5, fontSizeBarCode5,
        omLayFontSize6, fontSizeBarCode6, omLayFontSize7, fontSizeBarCode7, omLayFontSize8, fontSizeBarCode8, omLayFontSize9, fontSizeBarCode9, omLayFontSize10, fontSizeBarCode10, omLayFontSize11, fontSizeBarCode11,
        caption1, caption2, caption3, caption4, caption5, caption6, caption7, caption8, caption9, caption10, caption11, panel) {
    loadXMLDoc();
    //alert(fontSizeBarCode1);

//     alert(panel);


    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barCodePrintPanelDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("bcMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>UPDATED</span>";
            window.setTimeout(closeBCMessDiv, 1500);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var postStr = 'omLayoutOptionTop=' + omLayoutOptionTop + '&fontSize1=' + omLayFontSize1 + '&fontSizeValue1=' + fontSizeBarCode1 + '&fontSize2=' + omLayFontSize2 + '&fontSizeValue2=' + fontSizeBarCode2 + '&fontSize3=' + omLayFontSize3 + '&fontSizeValue3=' + fontSizeBarCode3
            + '&fontSize4=' + omLayFontSize4 + '&fontSizeValue4=' + fontSizeBarCode4 + '&fontSize5=' + omLayFontSize5 + '&fontSizeValue5=' + fontSizeBarCode5 + '&fontSize6=' + omLayFontSize6 + '&fontSizeValue6=' + fontSizeBarCode6 + '&fontSize7=' + omLayFontSize7 + '&fontSizeValue7=' + fontSizeBarCode7

            + '&fontSize8=' + omLayFontSize8 + '&fontSizeValue8=' + fontSizeBarCode8 + '&fontSize9=' + omLayFontSize9 + '&fontSizeValue9=' + fontSizeBarCode9 + '&fontSize10=' + omLayFontSize10 + '&fontSizeValue10=' + fontSizeBarCode10 + '&fontSize11=' + omLayFontSize11 + '&fontSizeValue11=' + fontSizeBarCode11 + '&captionvalue1=' + caption1 +
            '&captionvalue2=' + caption2 + '&captionvalue3=' + caption3 + '&captionvalue4=' + caption4 + '&captionvalue5=' + caption5 + '&captionvalue6=' + caption6
            + '&captionvalue7=' + caption7 + '&captionvalue8=' + caption8 + '&captionvalue9=' + caption9 + '&captionvalue10=' + caption10 + '&captionvalue11=' + caption11 + '&panel=' + panel;
    xmlhttp.open("POST", "include/php/ombcbcup" + default_theme + ".php?" + postStr, true);
    xmlhttp.send();
}
/********END code to add updateSize55BarCode @Author:GAUR14SEP16**************/


/****************************************START Add function for artifical amt @Author:GAUR16SEP16**********************************/

/**********Start code to change ID's @Author: PRIYANKA-03-06-17*********/
function custPriceCalculation(custPrice) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    var ItmCode = document.getElementById('sttr_cust_itmcode').value;
    var ItmNum = document.getElementById('sttr_cust_itmnum').value;
    var ItmCalType = document.getElementById('sttr_cust_itmcalby').value;
//    document.getElementById('addItemCustPrice').value = ItmNum * ;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sttr_cust_price").value = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogijincl" + default_theme + ".php?ItmCode=" + ItmCode + "&ItmNum=" + ItmNum + "&ItmCalType=" + ItmCalType, true);
    xmlhttp.send();
}
/**********END code to change ID's @Author: PRIYANKA-03-06-17*********/

function custSellPriceCalculation() {
    var ItmCode = document.getElementById('addItemCustItmCode').value;
    var ItmNum = document.getElementById('addItemCustItmNum').value;
    var ItmCalType = document.getElementById('addItemCalType').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("slPrItemCharges").value = xmlhttp.responseText;
            calculateImitationSellPrice();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogijincl" + default_theme + ".php?ItmCode=" + ItmCode + "&ItmNum=" + ItmNum + "&ItmCalType=" + ItmCalType, true);
    xmlhttp.send();
}
/****************************************END Add function for artifical amt @Author:GAUR16SEP16**********************************/
//*********Start code to check condition for supplier deleivery panel add multiple crystal :Author:SANT19SEP16******
function calcNwOrDelivCryPrice() {
    var crystalEntered = 0;
    var totalCryVal = 0;
    var count = 1;
    var delId = 'del' + count;
    for (var dc = count; noOfCrystal != ''; dc++) {
        if (document.getElementById('del' + dc).value != 'Deleted') {
            var crystalQTY = parseInt(document.getElementById('addItemCryQty' + dc).value);
            var crystalGsWt = parseFloat(document.getElementById('addItemCryGSW' + dc).value);
            var crystalGsWtTyp = document.getElementById('addItemCryGSWTyp' + dc).value;
            var crystalRate = parseFloat(document.getElementById('addItemCryRate' + dc).value);
            var crystalRateType = document.getElementById('addItemCryRateTyp' + dc).value;
            var crystalVal = parseFloat(document.getElementById('addItemCryVal' + dc).value);
            var totalGSWTNRate = 0;
            if (crystalRateType == 'PP') {
                totalGSWTNRate = crystalRate * crystalQTY;
            } else {
                totalGSWTNRate = crystalRate * crystalGsWt;
            }
            document.getElementById('addItemCryVal' + dc).value = (totalGSWTNRate).toFixed(2);
            if (document.getElementById('addItemCryVal' + dc).value == 'NaN') {
                document.getElementById('addItemCryVal' + dc).value = 0;
            }
            totalCryVal += parseFloat(document.getElementById('addItemCryVal' + dc).value);
            if (document.getElementById('orderpanel').value != 'SuppDelCryOrder') {
                document.getElementById('addItemCryFinVal').value = (parseFloat(totalCryVal)).toFixed(2);
                if (document.getElementById('addItemCryFinVal').value != '') {
                    calItemPrice();
                }
            }
        }
        if (document.getElementById(delId).value == 'Deleted') {
            document.getElementById('addItemCryFinVal').value = 0 + totalCryVal;
            calItemPrice();
        }
        crystalEntered++;
    }
    return false;
}
/*************Start  code to add new parameters orderpanel function @Author:SANT22SEP16***********/
/*************Start  code to add new parameters orderpanel function @Author:SANT29NOV16***********/
/*************Start  code to add new parameters orderpanel function @Author:SANT30NOV16***********/
function getNwOrCrystalFunc(crystalCount, div, commonPanel, sellPanel, orderPanel, preInvoiceNo, invoiceNo, suppId, usorId, firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (crystalCount == '') {
                noOfCrystal = 1;
                document.getElementById(div).innerHTML = xmlhttp.responseText;
            } else {
                noOfCrystal = crystalCount;
                document.getElementById(div + crystalCount).innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (sellPanel == 'SellPurchase') {
        xmlhttp.open("POST", "include/php/ogadwscy" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel + "&sellPanel=" + sellPanel, true);
    } else {
        xmlhttp.open("POST", "include/php/ognocydv" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel + "&orderPanel=" + orderPanel + "&preInvoiceNo=" + preInvoiceNo + "&invoiceNo=" + invoiceNo + "&suppId=" + suppId + "&usorId=" + usorId + "&firmId=" + firmId, true);
    }
    xmlhttp.send();
}
/*************End code to add new parameters orderpanel function @Author:SANT30NOV16***********/
/*************End code to add new parameters orderpanel function @Author:SANT29NOV16***********/
/*************End code to add new parameters orderpanel function @Author:SANT22SEP16***********/
/*************End code to add new parameters orderpanel function @Author:SANT19SEP16***********/
/****************************************start code Add function for artifical CUSTMIZATION @Author:GAUR19SEP16**********************************/
/****************************************start code update function for artifical CUSTMIZATION @Author:GAUR20SEP16**********************************/
function openImitationFormDiv(divId, count, display, labelId, fieldName, fieldValue, fontSize, fontColor, fontWeight, fieldCheck, inputWidth, labelType, topMargin, leftMargin) {
    fieldValue = encodeURIComponent(fieldValue);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            document.getElementById('fontSize' + count).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    // fontWeight ADD IN FUNCTION FOR RETAIL SINVOICE @YUVRAJ 06102022
    xmlhttp.open("POST", "include/php/omimtfmad" + default_theme + ".php?divId=" + divId + "&count=" + count + "&display=" + display + "&labelId=" + labelId + "&labelType=" + labelType + "&fieldName=" + fieldName
            + "&fieldValue=" + fieldValue + "&inputWidth=" + inputWidth + "&fontSize=" + fontSize + "&fontColor=" + fontColor + "&fontWeight=" + fontWeight + "&fieldCheck=" + fieldCheck + "&topMargin=" + topMargin + "&leftMargin=" + leftMargin, true);
    xmlhttp.send();
}
//==============================================================================================================
//=============== START CODE FOR SCHEME EMI INVOICE CUSTOMISATION @SIMRAN:05APR2023==============================//
//==============================================================================================================
function openSchemeInvFormDiv(divId, count, display, labelId, fieldName, fieldValue, fontSize, fontColor, fontWeight, fieldCheck, inputWidth, labelType, topMargin, leftMargin) {
    fieldValue = encodeURIComponent(fieldValue);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            document.getElementById('fontSize' + count).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    // fontWeight ADD IN FUNCTION FOR RETAIL SINVOICE @YUVRAJ 06102022
    xmlhttp.open("POST", "include/php/omSchemeInvfmad" + default_theme + ".php?divId=" + divId + "&count=" + count + "&display=" + display + "&labelId=" + labelId + "&labelType=" + labelType + "&fieldName=" + fieldName
            + "&fieldValue=" + fieldValue + "&inputWidth=" + inputWidth + "&fontSize=" + fontSize + "&fontColor=" + fontColor + "&fontWeight=" + fontWeight + "&fieldCheck=" + fieldCheck + "&topMargin=" + topMargin + "&leftMargin=" + leftMargin, true);
    xmlhttp.send();
}
//==============================================================================================================
//=============== END CODE FOR SCHEME EMI INVOICE CUSTOMISATION @SIMRAN:05APR2023==============================//
//==============================================================================================================
//
//==============================================================================================================
//=============== START CODE FOR SCHEME INVOICE CUSTOMISATION @SIMRAN:05APR2023==============================//
//==============================================================================================================
function openSchemeFormDiv(divId, count, display, labelId, fieldName, fieldValue, fontSize, fontColor, fontWeight, fieldCheck, inputWidth, labelType, topMargin, leftMargin) {
    fieldValue = encodeURIComponent(fieldValue);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            document.getElementById('fontSize' + count).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    // fontWeight ADD IN FUNCTION FOR RETAIL SINVOICE @YUVRAJ 06102022
    xmlhttp.open("POST", "include/php/omSchemefmad" + default_theme + ".php?divId=" + divId + "&count=" + count + "&display=" + display + "&labelId=" + labelId + "&labelType=" + labelType + "&fieldName=" + fieldName
            + "&fieldValue=" + fieldValue + "&inputWidth=" + inputWidth + "&fontSize=" + fontSize + "&fontColor=" + fontColor + "&fontWeight=" + fontWeight + "&fieldCheck=" + fieldCheck + "&topMargin=" + topMargin + "&leftMargin=" + leftMargin, true);
    xmlhttp.send();
}
//==============================================================================================================
//=============== END CODE FOR SCHEME INVOICE CUSTOMISATION @SIMRAN:05APR2023==============================//
//==============================================================================================================
//
//
//==============================================================================================================
//=============== START CODE FOR UDHAAR MONEY DEPOSIT INVOICE CUSTOMISATION @SIMRAN:05APR2023==================//
//==============================================================================================================
function openUdhaarInvFormDiv(divId, count, display, labelId, fieldName, fieldValue, fontSize, fontColor, fontWeight, fieldCheck, inputWidth, labelType, topMargin, leftMargin) {
    fieldValue = encodeURIComponent(fieldValue);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            document.getElementById('fontSize' + count).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    // fontWeight ADD IN FUNCTION FOR RETAIL SINVOICE @YUVRAJ 06102022
    xmlhttp.open("POST", "include/php/omUdhaarfmad" + default_theme + ".php?divId=" + divId + "&count=" + count + "&display=" + display + "&labelId=" + labelId + "&labelType=" + labelType + "&fieldName=" + fieldName
            + "&fieldValue=" + fieldValue + "&inputWidth=" + inputWidth + "&fontSize=" + fontSize + "&fontColor=" + fontColor + "&fontWeight=" + fontWeight + "&fieldCheck=" + fieldCheck + "&topMargin=" + topMargin + "&leftMargin=" + leftMargin, true);
    xmlhttp.send();
}
function openAdvanceInvFormDiv(divId, count, display, labelId, fieldName, fieldValue, fontSize, fontColor, fontWeight, fieldCheck, inputWidth, labelType, topMargin, leftMargin) {
    fieldValue = encodeURIComponent(fieldValue);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            document.getElementById('fontSize' + count).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    // fontWeight ADD IN FUNCTION FOR RETAIL SINVOICE @YUVRAJ 06102022
    xmlhttp.open("POST", "include/php/omadvancefmad" + default_theme + ".php?divId=" + divId + "&count=" + count + "&display=" + display + "&labelId=" + labelId + "&labelType=" + labelType + "&fieldName=" + fieldName
            + "&fieldValue=" + fieldValue + "&inputWidth=" + inputWidth + "&fontSize=" + fontSize + "&fontColor=" + fontColor + "&fontWeight=" + fontWeight + "&fieldCheck=" + fieldCheck + "&topMargin=" + topMargin + "&leftMargin=" + leftMargin, true);
    xmlhttp.send();
}
//==============================================================================================================
//=============== END CODE FOR UDHAAR MONEY DEPOSIT INVOICE CUSTOMISATION @SIMRAN:05APR2023====================//
//==============================================================================================================
function openStrlleringFormDiv(divId, count, display, labelId, fieldName, fieldValue, fontSize, fontColor, fieldCheck, inputWidth, labelType, topMargin, leftMargin) {
    fieldValue = encodeURIComponent(fieldValue);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            document.getElementById('fontSize' + count).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omstrfmad" + default_theme + ".php?divId=" + divId + "&count=" + count + "&display=" + display + "&labelId=" + labelId + "&labelType=" + labelType + "&fieldName=" + fieldName
            + "&fieldValue=" + fieldValue + "&inputWidth=" + inputWidth + "&fontSize=" + fontSize + "&fontColor=" + fontColor + "&fieldCheck=" + fieldCheck + "&topMargin=" + topMargin + "&leftMargin=" + leftMargin, true);
    xmlhttp.send();
}

function labelsFormImitation(count, labelType, fieldName, fieldValue, fontSize, fontColor, divId, display) {
    if (display == 'NO' || divId == 'tncImtDiv' || divId == 'authImtSignLbDiv' || divId == 'invImtTitleDiv' || fieldName == 'formImtBorderCheck' || divId == 'footerImtLbDiv') {
        var check = document.getElementById("fontCheckId" + count).checked;
    }
    if (fieldName != 'firmImtLeftLogoCheck' && fieldName != 'firmImtRightLogoCheck' && fieldName != 'designImt' && divId != '' && fontSize == '') {
        alert("Please Enter Font Size !");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                document.getElementById("cuMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>UPDATED</span>";
                window.setTimeout(closeMessDetails, 1500);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omimtfoad" + default_theme + ".php?labelType=" + labelType + "&count=" + count + "&fieldName=" + fieldName + "&fieldValue=" + encodeURIComponent(fieldValue) + "&fontSize=" + fontSize +
                "&fontColor=" + fontColor + "&fieldCheck=" + check + "&panel=CustomizedFormMainPanel", true);
        xmlhttp.send();
    }
    function closeMessDetails()
    {
        document.getElementById("cuMessDisplayDiv").innerHTML = "";
    }
}
function labelsFormAdvanceInv(count, labelType, fieldName, fieldValue, fontSize, fontColor, divId, display) {
    var check = '';
    if (display == 'NO' || divId == 'tncAdvanceInvDiv' || divId == 'authAdvanceInvSignLbDiv' || divId == 'AdvanceInvTitleDiv' || fieldName == 'formAdanceInvBorderCheck') {
        var check = document.getElementById("fontCheckId" + count).checked;
        // alert(check);
    }
    if (fieldName != 'firmAdvanceInvLeftLogoCheck' && fieldName != 'firmAdvanceInvRightLogoCheck' && divId != '' && fontSize == '') {
        alert("Please Enter Font Size !");
    } else {

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                document.getElementById("cuMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>UPDATED</span>";
                window.setTimeout(closeMessDetails, 1500);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omadvanceInvfoad" + default_theme + ".php?labelType=" + labelType + "&count=" + count + "&fieldName=" + fieldName + "&fieldValue=" + encodeURIComponent(fieldValue) + "&fontSize=" + fontSize +
                "&fontColor=" + fontColor + "&fieldCheck=" + check + "&panel=CustomizedAdvanceInvFormPanel", true);
        xmlhttp.send();
    }
    function closeMessDetails()
    {
        document.getElementById("cuMessDisplayDiv").innerHTML = "";
    }
}
//=======================================================================================================
//============ END CODE FOR ADDED ADVANCE MONEY INVOICE PANEL CUSTOMISATION @PRANALI:29MARCH2024====//
//=======================================================================================================
//=======================================================================================================
//================ START CODE FOR ADDED SCHEME EMI INVOICE PANEL CUSTOMISATION @SIMRAN:05APR2023============//
//=======================================================================================================
function labelsFormScheme(count, labelType, fieldName, fieldValue, fontSize, fontColor, divId, display) {
    var check = '';
    if (display == 'NO' || divId == 'tncSchemeDiv' || divId == 'authSchemeSignLbDiv' || divId == 'schemeInvTitleDiv' || fieldName == 'formSchemeBorderCheck') {
        var check = document.getElementById("fontCheckId" + count).checked;
        // alert(check);
    }
    if (fieldName != 'firmSchemeLeftLogoCheck' && fieldName != 'firmSchemeRightLogoCheck' && divId != '' && fontSize == '') {
        alert("Please Enter Font Size !");
    } else {

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                document.getElementById("cuMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>UPDATED</span>";
                window.setTimeout(closeMessDetails, 1500);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omschemefoad" + default_theme + ".php?labelType=" + labelType + "&count=" + count + "&fieldName=" + fieldName + "&fieldValue=" + encodeURIComponent(fieldValue) + "&fontSize=" + fontSize +
                "&fontColor=" + fontColor + "&fieldCheck=" + check + "&panel=CustomizedSchemeFormPanel", true);
        xmlhttp.send();
    }
    function closeMessDetails()
    {
        document.getElementById("cuMessDisplayDiv").innerHTML = "";
    }
}
//=======================================================================================================
//================ END CODE FOR ADDED SCHEME EMI INVOICE PANEL CUSTOMISATION @SIMRAN:05APR2023============//
//=======================================================================================================
//
//=======================================================================================================
//================ START CODE FOR ADDED SCHEME INVOICE PANEL CUSTOMISATION @SIMRAN:26APR2023============//
//=======================================================================================================
function labelsFormSchemeInv(count, labelType, fieldName, fieldValue, fontSize, fontColor, divId, display) {
    var check = '';
    if (display == 'NO' || divId == 'tncSchemeInvDiv' || divId == 'authSchemeInvSignLbDiv' || divId == 'schemeInvTitleDiv' || fieldName == 'formSchemeInvBorderCheck') {
        var check = document.getElementById("fontCheckId" + count).checked;
        // alert(check);
    }
    if (fieldName != 'firmSchemeInvLeftLogoCheck' && fieldName != 'firmSchemeInvRightLogoCheck' && divId != '' && fontSize == '') {
        alert("Please Enter Font Size !");
    } else {

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                document.getElementById("cuMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>UPDATED</span>";
                window.setTimeout(closeMessDetails, 1500);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omSchemeInvfoad" + default_theme + ".php?labelType=" + labelType + "&count=" + count + "&fieldName=" + fieldName + "&fieldValue=" + encodeURIComponent(fieldValue) + "&fontSize=" + fontSize +
                "&fontColor=" + fontColor + "&fieldCheck=" + check + "&panel=CustomizedSchemeInvFormPanel", true);
        xmlhttp.send();
    }
    function closeMessDetails()
    {
        document.getElementById("cuMessDisplayDiv").innerHTML = "";
    }
}
//=======================================================================================================
//================ END CODE FOR ADDED SCHEME INVOICE PANEL CUSTOMISATION @SIMRAN:26APR2023============//
//=======================================================================================================
//
//
//=======================================================================================================
//======== START CODE FOR ADDED UDHAAR MONEY DEPOSIT INVOICE PANEL CUSTOMISATION @SIMRAN:26APR2023=======//
//=======================================================================================================
function labelsFormUdhaarInv(count, labelType, fieldName, fieldValue, fontSize, fontColor, divId, display) {
    var check = '';
    if (display == 'NO' || divId == 'tncUdhaarInvDiv' || divId == 'authUdhaarInvSignLbDiv' || divId == 'udhaarInvTitleDiv' || fieldName == 'formUdhaarInvBorderCheck') {
        var check = document.getElementById("fontCheckId" + count).checked;
        // alert(check);
    }
    if (fieldName != 'firmUdhaarInvLeftLogoCheck' && fieldName != 'firmUdhaarInvRightLogoCheck' && divId != '' && fontSize == '') {
        alert("Please Enter Font Size !");
    } else {

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                document.getElementById("cuMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>UPDATED</span>";
                window.setTimeout(closeMessDetails, 1500);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omUdhaarInvfoad" + default_theme + ".php?labelType=" + labelType + "&count=" + count + "&fieldName=" + fieldName + "&fieldValue=" + encodeURIComponent(fieldValue) + "&fontSize=" + fontSize +
                "&fontColor=" + fontColor + "&fieldCheck=" + check + "&panel=CustomizedUdhaarInvFormPanel", true);
        xmlhttp.send();
    }
    function closeMessDetails()
    {
        document.getElementById("cuMessDisplayDiv").innerHTML = "";
    }
}
//=======================================================================================================
//============ END CODE FOR ADDED UDHAAR MONEY DEPOSIT INVOICE PANEL CUSTOMISATION @SIMRAN:15sept2023====//
//=======================================================================================================
function labelsFormStrllering(count, labelType, fieldName, fieldValue, fontSize, fontColor, divId, display) {
    if (display == 'NO' || divId == 'tncImtDiv' || divId == 'authImtSignLbDiv' || divId == 'invImtTitleDiv' || fieldName == 'formImtBorderCheck' || divId == 'footerImtLbDiv') {
        var check = document.getElementById("fontCheckId" + count).checked;
    }
    if (fieldName != 'firmImtLeftLogoCheck' && fieldName != 'firmImtRightLogoCheck' && fieldName != 'designImt' && divId != '' && fontSize == '') {
        alert("Please Enter Font Size !");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                document.getElementById("cuMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>UPDATED</span>";
                window.setTimeout(closeMessDetails, 1500);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omstrfoad" + default_theme + ".php?labelType=" + labelType + "&count=" + count + "&fieldName=" + fieldName + "&fieldValue=" + encodeURIComponent(fieldValue) + "&fontSize=" + fontSize +
                "&fontColor=" + fontColor + "&fieldCheck=" + check + "&panel=CustomizedFormMainPanel", true);
        xmlhttp.send();
    }
    function closeMessDetails()
    {
        document.getElementById("cuMessDisplayDiv").innerHTML = "";
    }
}
/****************************************END code update function for artifical CUSTMIZATION @Author:GAUR20SEP16**********************************/
/****************************************END code Add function for artifical CUSTMIZATION @Author:GAUR19SEP16**********************************/

//START CODE to show record from daily dairy AUTHOR:GAUR24SEP16
function showImtStockDetddDiv(documentRootPath, itprId, panelName) {
// alert(panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?isin_id=" + itprId + "&panelName=ImitationStock&updatePanelName=" + panelName, true);
    xmlhttp.send();
}
//END CODE to show record from daily dairy AUTHOR:GAUR24SEP16
/**********Start code TO ADD calculation function for imitation jwellery @Author: GAUR28SEP16*********/
/**********Start code TO update calculation function for imitation jwellery @Author: GAUR30SEP16*********/
/**********Start code TO update calculation function for imitation jwellery @Author: GAUR01OCT16*********/
/**********Start code TO change parameters for imitation jwellery @Author: SANT06JUN17*********/
function callImtItemPrice() {
//alert('hello');
    var addprice = document.getElementById('sttr_cust_price').value;
    var labCharges = document.getElementById('sttr_lab_charges').value;
    var itemqty = document.getElementById('sttr_quantity').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;
//    var priceQtyBy = document.getElementById('addItemLbChargQtyBy').value;

    if (labCharges == '') {
        document.getElementById('sttr_valuation').value = (parseFloat(document.getElementById('sttr_cust_price').value)).toFixed(2);
    } else if (labChargesType == 'PP') {
        document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('sttr_cust_price').value)) + (parseFloat(labCharges) * parseFloat(itemqty))).toFixed(2);
    } else {
        document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('sttr_cust_price').value) + parseFloat(labCharges))).toFixed(2);
    }

    if (document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }
    if (document.getElementById('sttr_valuation').value == '' || document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = '';
    }

    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }

//document.getElementById('addItemValuation').value = ((parseFloat(document.getElementById('addItemPrice').value) + parseFloat(labCharges))).toFixed(2);
//  alert(document.getElementById('addItemValuation').value );
    if (document.getElementById('sttr_tax').value != '') {
        var totTax = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
        document.getElementById('sttr_tot_tax').value = parseFloat(totTax);
        document.getElementById('sttr_final_valuation').value = (parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(totTax)).toFixed(2);
    } else {
        document.getElementById('sttr_final_valuation').value = ((parseFloat(document.getElementById('sttr_valuation').value))).toFixed(2);
    }
    return false;
}
/**********End code TO change parameters for imitation jwellery @Author: SANT06JUN17*********/
/**********END code TO ADD calculation function for imitation jwellery @Author: GAUR01OCT16*********/
/**********END code TO ADD calculation function for imitation jwellery @Author: GAUR30SEP16*********/
/**********END code TO ADD calculation function for imitation jwellery @Author: GAUR28SEP16*********/
/**********add start code TO update imitation item @Author: GAUR28SEP16*********/

function showSuppImtStockDiv(documentRootPath, utinId, upPanelName, suppId) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelFormDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (upPanelName == 'CrystalStockPayUp' || upPanelName == 'UpdateCrystalStock') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijssdv" + default_theme + ".php?utin_Id=" + utinId + "&panelName=CrystalStock" +
                "&updatePanelName=" + upPanelName + "&suppId=" + suppId, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijssdv" + default_theme + ".php?utin_Id=" + utinId + "&panelName=ImitationStock" +
                "&updatePanelName=" + upPanelName + "&suppId=" + suppId, true);
        xmlhttp.send();
    }
}
/**********add end code TO update imitation item @Author: GAUR28SEP16*********/
//****************End code to change panel @Author:SANT28SEP16************/-->
//Start Code For Add Fine Purchase Invoice Calculation Function:Author:SANT04JUN17
function addInvoiceValue() {
    var suppPurLotEntered = 0;
    var totalFinVal = 0;
    var totalLabNOthCharges = 0;
    var wastg = 0;
    var suppPurItemEntered = 0;
    var totalVal = 0;
    var totalLabNOthCharges = 0;
    var totalGsWt = 0;
    var gsWtKG = 0;
    var gsWtGM = 0;
    var ntWtKG = 0;
    var ntWtGM = 0;
    var totalNtWt = 0;
    var finVal = 0;
    var fnWt = 0;
    var itemCryVal;
    var finVal;
    var itemTotCryVal;
    var totVal;
    var finTotVal;
    var labTotal = 0;
    var rateNWt;
    var totalRateNWt = 0;
    var finalTotalVal = 0;
    //alert('sttr_gs_weight == ' + document.getElementById('sttr_gs_weight').value);
    if (document.getElementById('sttr_gs_weight_type').value != document.getElementById('sttr_nt_weight_type').value) {
        document.getElementById('sttr_nt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;
        document.getElementById('utransFinalWeightTyp').value = document.getElementById('sttr_gs_weight_type').value;
        document.getElementById('sttr_pkt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;
    }

    var netweight = document.getElementById('sttr_nt_weight').value;
    var weight = document.getElementById('sttr_final_fine_weight').value;
    var metalType = document.getElementById('sttr_metal_type').value;
    var tounch = document.getElementById('sttr_purity').value;
    var metalRate = document.getElementById('sttr_metal_rate').value;
    var wtType = document.getElementById('sttr_nt_weight_type').value;
    var labCharges = document.getElementById('sttr_lab_charges').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;
    var wastg = document.getElementById('sttr_wastage').value;
    var qty = document.getElementById('sttr_quantity').value;
    if (document.getElementById('sttr_final_val_by').value == 'byGrossWt') {
        var weight = document.getElementById('sttr_gs_weight').value;
        var wtType = document.getElementById('sttr_gs_weight_type').value;
    } else {
        var weight = document.getElementById('sttr_nt_weight').value;
        var wtType = document.getElementById('sttr_nt_weight_type').value;
    }
    //
    if (document.getElementById('sttr_other_charges_by').value == 'lbByNetWt') {
        weight = parseFloat(document.getElementById('sttr_nt_weight').value);
    } else if (document.getElementById('sttr_other_charges_by').value == 'lbByGrossWt') {
        weight = parseFloat(document.getElementById('sttr_gs_weight').value);
    } else if (document.getElementById('sttr_other_charges_by').value == 'lbByFineWt') {
        var weight = document.getElementById('sttr_final_fine_weight').value;
    }
//    alert(weight);
    //    ;
    if (labCharges != '') {
        if (labChargesType == 'KG') {
            if (wtType == 'KG')
                totalLabNOthCharges = labCharges * weight;
            else if (wtType == 'GM')
                totalLabNOthCharges = (labCharges / 1000) * weight;
            else
                totalLabNOthCharges = (labCharges / (1000 * 1000)) * weight;
        } else if (labChargesType == 'GM') {
            if (wtType == 'KG')
                totalLabNOthCharges = labCharges * 1000 * weight;
            else if (wtType == 'GM')
                totalLabNOthCharges = labCharges * weight;
            else
                totalLabNOthCharges = (labCharges / 1000) * weight;
        } else if (labChargesType == 'MG') {
            if (wtType == 'KG')
                totalLabNOthCharges = labCharges * 1000 * 1000 * weight;
            else if (wtType == 'GM')
                totalLabNOthCharges = labCharges * 1000 * weight;
            else
                totalLabNOthCharges = labCharges * weight;
        } else if (labChargesType == 'PP') {
            totalLabNOthCharges = parseFloat(labCharges * qty);
        }
    }

    if (wastg == '')
        wastg = 0;
    //weight = (((parseFloat(wastg) + parseFloat(tounch)) * netweight) / 100).toFixed(3);
    if (metalType == 'Gold') {
        if (wtType == 'KG') {
            document.getElementById('sttr_valuation').value = ((weight * metalRate) * document.getElementById('gmWtInKg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weight * metalRate) * document.getElementById('gmWtInKg').value + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'GM') {
            document.getElementById('sttr_valuation').value = ((weight * metalRate) / document.getElementById('gmWtInGm').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weight * metalRate) / document.getElementById('gmWtInGm').value + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'MG') {
            document.getElementById('sttr_valuation').value = ((weight * metalRate) / document.getElementById('gmWtInMg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weight * metalRate) / document.getElementById('gmWtInMg').value + totalLabNOthCharges).toFixed(2);
        }
    } else if (metalType == 'Silver') {
        if (wtType == 'KG') {
            document.getElementById('sttr_valuation').value = (weight * metalRate * document.getElementById('srGmWtInKg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weight * metalRate * document.getElementById('srGmWtInKg').value) + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'GM') {
            document.getElementById('sttr_valuation').value = ((weight * metalRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weight * metalRate) / document.getElementById('srGmWtInGm').value + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'MG') {
            document.getElementById('sttr_valuation').value = ((weight * metalRate) / document.getElementById('srGmWtInMg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weight * metalRate) / document.getElementById('srGmWtInMg').value + totalLabNOthCharges).toFixed(2);
        }
    } else {
        document.getElementById('sttr_valuation').value = 0;
        document.getElementById('suppItemTotVal').value = 0;
    }
    if ((document.getElementById('sttr_tax').value).trim() == '' || document.getElementById('sttr_tax').value == 'NaN') {
        document.getElementById('sttr_tax').value = 0;
    }
    var val = parseFloat(document.getElementById('suppItemTotVal').value).toFixed(2);
    var tax = document.getElementById('sttr_tax').value;
    if (val == '')
        val = 0;
    if (tax == '')
        tax = 0;
    document.getElementById('sttr_tot_tax').value = (parseFloat(val) * parseFloat(tax) / 100).toFixed(2);
    if (val == '')
        val = 0;
    if (document.getElementById('sttr_tot_tax').value == '')
        document.getElementById('sttr_tot_tax').value = 0;
    if ((document.getElementById('sttr_stone_valuation').value) == '' || document.getElementById('sttr_stone_valuation').value == 'NaN') {
        document.getElementById('sttr_stone_valuation').value = 0;
    }
   //start code to calculate final fine weight @ASHWINI- 10APR2024
    var wastageWtByValue = document.getElementById("sttr_wastage_by").value;
    if (wastageWtByValue == 'wastageByNetWt')
    {
       var percentntwt = parseFloat(document.getElementById("sttr_nt_weight").value) * parseFloat(document.getElementById("sttr_wastage").value) /100 ;
       var weight= (parseFloat(document.getElementById("sttr_nt_weight").value) *  parseFloat(document.getElementById("sttr_purity").value) / 100) + percentntwt;
    } 
    else if (wastageWtByValue == 'wastageByGrossWt'){
       var percentgswt = parseFloat(document.getElementById("sttr_gs_weight").value) * parseFloat(document.getElementById("sttr_wastage").value) /100 ;
       var weight= (parseFloat(document.getElementById("sttr_nt_weight").value) *  parseFloat(document.getElementById("sttr_purity").value / 100)) + percentgswt;
    }
    else {
       var percentntwt = parseFloat(document.getElementById("sttr_nt_weight").value) * parseFloat(document.getElementById("sttr_wastage").value) /100 ;
       var weight= (parseFloat(document.getElementById("sttr_nt_weight").value) *  parseFloat(document.getElementById("sttr_purity").value) / 100) + percentntwt;
    }
    document.getElementById('sttr_fine_weight').value = (parseFloat(document.getElementById("sttr_nt_weight").value) * parseFloat(document.getElementById("sttr_purity").value) / 100).toFixed(3);
    //end code to calculate final fine weight @ASHWINI- 10APR2024
    document.getElementById('sttr_final_fine_weight').value = parseFloat(weight);
    document.getElementById('sttr_final_valuation').value = (parseFloat(val) + parseFloat(document.getElementById('sttr_tot_tax').value) + parseFloat(document.getElementById('sttr_stone_valuation').value)).toFixed(2); // Crystal Valuation added @Author:SHRI06JAN17

    if ((document.getElementById('sttr_final_valuation').value).trim() == '' || document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }
    if ((document.getElementById('sttr_final_fine_weight').value).trim() == '' || document.getElementById('sttr_final_fine_weight').value == 'NaN') {
        document.getElementById('sttr_final_fine_weight').value = 0;
    }
    if ((document.getElementById('sttr_valuation').value).trim() == '' || document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }
    if ((document.getElementById('sttr_tot_tax').value).trim() == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }
    //
    var gsWt = document.getElementById('sttr_gs_weight').value
    var gsWtType = document.getElementById('sttr_gs_weight_type').value;
    if (gsWt != '') {
        if (gsWtType != 'GM')
            gsWtKG += convert('GM', gsWtType, gsWt);
        else
            gsWtGM += parseFloat(gsWt);
        totalGsWt = parseFloat(gsWtKG) + parseFloat(gsWtGM);
    }
    var ntWt = document.getElementById('sttr_nt_weight').value;
    var ntWtType = document.getElementById('sttr_nt_weight_type').value;
    if (ntWt != '') {
        if (ntWtType != 'GM')
            ntWtKG = convert('GM', ntWtType, ntWt);
        else
            ntWtGM += parseFloat(ntWt);
        totalNtWt = parseFloat(ntWtKG) + parseFloat(ntWtGM);
    }
    var finalFineWeight = document.getElementById('sttr_final_fine_weight').value;
    if (finalFineWeight != '') {
        fnWt += parseFloat(finalFineWeight);
        document.getElementById('sttr_final_fine_weight').value = (fnWt).toFixed(3);
    }
    var labCharges = document.getElementById('sttr_lab_charges').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;
    if ((document.getElementById('sttr_tot_tax').value).trim() == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }
    if ((document.getElementById('sttr_tot_tax').value).trim() == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }
    document.getElementById('sttr_final_purity').value = (parseFloat(document.getElementById('sttr_purity').value) + parseFloat(document.getElementById('sttr_wastage').value)); //added @Author:SHRI24FEB17
    document.getElementById('sttr_total_lab_charges').value = parseFloat(totalLabNOthCharges).toFixed(2);
    finVal += parseFloat(document.getElementById('sttr_final_valuation').value);
    document.getElementById('sttr_final_valuation').value = (finVal).toFixed(2);
    if ((document.getElementById('sttr_final_purity').value).trim() == '' || document.getElementById('sttr_final_purity').value == 'NaN') {
        document.getElementById('sttr_final_purity').value = 0;
    }
    var cashRec = 0;
    if (cashRec == '')
        cashRec = 0;
    var totAmt = 0;
    if (totAmt == '')
        totAmt = 0;
    var totAmtRec = 0;
    if (totAmtRec == '')
        totAmtRec = 0;
    totalLabNOthCharges = 0;
    suppPurLotEntered++;
//    }
    return false;
}
//End Code For Add Fine Purchase Invoice Calculation Function:Author:SANT04JUN17
function showInvoiceItemDetailsDiv(documentRootPath, utrId, panelName, stockType, suppId) {

//alert('panelName='+panelName);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'RawDetUpPanel') {
                document.getElementById("rawMetalAddDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'addByItems') {
                document.getElementById("suppPurchaseDivs").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'ApprovalRecList') {
                document.getElementById("suppHomePanelSubDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("AddInvoiceMainDiv").innerHTML = xmlhttp.responseText;
            }
        }
    };
    if (panelName == 'ApprovalRecList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogaprinv" + default_theme + ".php?utrId=" + utrId + "&panelName=ItemApprovalRecUp&stockType=" + stockType + "&suppId=" + suppId, true);
    } else if (panelName == 'ItemApprovalRecUp') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogaprinv" + default_theme + ".php?utrId=" + utrId + "&panelName=" + panelName + "&stockType=" + stockType + "&suppId=" + suppId, true);
    } else if (panelName == 'UpdateQuotationItem') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwadquo" + default_theme + ".php?utrId=" + utrId + "&panelName=" + panelName + "&stockType=" + stockType + "&suppId=" + suppId, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwadinv" + default_theme + ".php?utrId=" + utrId + "&panelName=" + panelName + "&stockType=" + stockType + "&suppId=" + suppId, true);
    }

    xmlhttp.send();
}
//
//
//
function deleteFineInvoiceItms(sttrId, panelName, suppId, preInvNo, postInvNo, payPanelName,firmId,DelPanelName ='',transType) {
//
if(transType == 'sell'){
    confirm_box = confirm("You can't delete this item because this item is alreday soldout!"); 
    return false;
}
//    var DelPanelName = document.getElementById("DelPanelName").value;
    if (panelName == 'ItemReturn') {
        confirm_box = confirm("Do you really want to Return this Item?");
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14 
    }

    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                //
//               alert( xmlhttp.responseText);
                if (payPanelName == 'ApprovalRecList') {

                    document.getElementById("suppHomePanelSubDiv").innerHTML = xmlhttp.responseText;
                    closeMessDiv('messDisplayDiv', 'DELETED');
                } else {
                    document.getElementById("AddInvoiceMainDiv").innerHTML = xmlhttp.responseText;
                    closeMessDiv('messDisplayDiv', 'DELETED');
                }
                //
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwindel" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName + "&suppId=" + suppId + "&preInvNo=" + preInvNo + "&postInvNo=" + postInvNo + "&payPanelName=" + payPanelName + "&firmId=" + firmId + "&DelPanelName=" + DelPanelName, true);
    }
    xmlhttp.send();
}
//
// START CODE FOR ADD RETAIL STOCK FROM FINE PURCHASE WHOLESALE ENTRY OF SUPPLIER @PRIYANKA-07FEB19
function deleteFineInvoiceAllEntry(sttrId, panelName, suppId, preInvNo, postInvNo, payPanelName) {
//
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete all this Item?");
    //
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                closeMessDiv('messDisplayDiv', 'DELETED');
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwindel" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName + "&suppId=" + suppId + "&preInvNo=" + preInvNo + "&postInvNo=" + postInvNo + "&payPanelName=" + payPanelName, true);
    }
    xmlhttp.send();
}
// END CODE FOR ADD RETAIL STOCK FROM FINE PURCHASE WHOLESALE ENTRY OF SUPPLIER @PRIYANKA-07FEB19
//
function deleteInvoiceListItem(utinId, panelName, suppId) {
    if (utinId > 0) {
        confirm_box = confirm("Previous balance gets changed from this item delete\n\nDo you really want to delete this Item?");
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    }

    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("AddInvoiceMainDiv").innerHTML = xmlhttp.responseText;
                closeMessDiv('messDisplayDiv', 'DELETED');
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwindel" + default_theme + ".php?utinId=" + utinId + "&panelName=" + panelName + "&suppId=" + suppId, true);
    }
    xmlhttp.send();
}
//
function deleteFineInvoiceListItem(utinId, panelName, suppId, preInvNo, postInvNo, type, transDate) {

    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?\n\nIt will delete main entry & related all tag entries remains as it is!"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("suppHomePanelSubDiv").innerHTML = xmlhttp.responseText;
                document.getElementById('deleteInvVerifyPopUp').style.display = "none";
                closeMessDiv('messDisplayDiv', 'DELETED');
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwindel" + default_theme + ".php?utinId=" + utinId + "&panelName=" + panelName + "&suppId=" + suppId + "&preInvNo=" + preInvNo + "&postInvNo=" + postInvNo + "&type=" + type + "&transDate=" + transDate, true);
    }
    xmlhttp.send();
}
//
//
//****************End code to change panel @Author:SANT23NOV16************/-->
//****************End code to change panel @Author:SANT05OCT16************/-->
//****************End code to change panel @Author:SANT29SEP16************/-->
//****************End code to change panel @Author:SANT28SEP16************/-->
/**********ADD code TO ADD PRICE INTO QUANTITY @Author: GAUR30SEP16*********/
function getItemPriceQty(div, id, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('addItemQtyBy').focus();
                document.getElementById('addItemQtyBy').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogijiqpc" + default_theme + ".php?div=" + div, true);
    xmlhttp.send();
}
/**********END code TO ADD PRICE INTO QUANTITY @Author: GAUR30SEP16*********/
/****************************************START add function for artifical amt @Author:GAUR30SEP16**********************************/
//*****START CODE FOR CRYSTAL PURCHASE INVOICE CALCULATION FUNCTION: AUTHOR:SANT16JUN17
function custSuppPriceCalculation() {
    var ItmCode = document.getElementById('sttr_cust_itmcode').value;
    var ItmNum = document.getElementById('sttr_cust_itmnum').value;
    var Qty = document.getElementById('sttr_quantity').value;
    var priceType = document.getElementById('addItemPriceQtyBy').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sttr_cust_price").value = xmlhttp.responseText;
            var addprice = document.getElementById('sttr_cust_price').value;
            var labCharges = document.getElementById('sttr_lab_charges').value;
            var itemqty = document.getElementById('sttr_quantity').value;
            var labChargesType = document.getElementById('sttr_lab_charges_type').value;
            if (labCharges == '') {
                document.getElementById('sttr_valuation').value = (parseFloat(document.getElementById('sttr_cust_price').value)).toFixed(2);
            } else if (labChargesType == 'PP') {
                document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('sttr_cust_price').value)) + (parseFloat(labCharges) * parseFloat(itemqty))).toFixed(2);
            } else {
                document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('sttr_cust_price').value) + parseFloat(labCharges))).toFixed(2);
            }
            if (document.getElementById('sttr_valuation').value == 'NaN') {
                document.getElementById('sttr_valuation').value = 0;
            }
            if (document.getElementById('sttr_valuation').value == '' || document.getElementById('sttr_valuation').value == 'NaN') {
                document.getElementById('sttr_valuation').value = '';
            }
            if (document.getElementById('sttr_final_valuation').value == 'NaN') {
                document.getElementById('sttr_final_valuation').value = 0;
            }
            if (document.getElementById('sttr_tax').value != '') {
                var totTax = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
                document.getElementById('sttr_tot_tax').value = parseFloat(totTax);
                document.getElementById('sttr_final_valuation').value = (parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(totTax)).toFixed(2);
            } else {
                document.getElementById('sttr_final_valuation').value = ((parseFloat(document.getElementById('sttr_valuation').value))).toFixed(2);
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogijincl" + default_theme + ".php?ItmCode=" + ItmCode + "&ItmNum=" + ItmNum + "&Qty=" + Qty + "&priceType=" + priceType + "&ItmCalType=M", true);
    xmlhttp.send();
}
//*****END CODE FOR CRYSTAL PURCHASE INVOICE CALCULATION FUNCTION: AUTHOR:SANT16JUN17
/****************************************END add function for artifical amt @Author:GAUR30SEP16**********************************/


/**************************************** add function @Author:GAUR30SEP16**********************************/
/**************************************** add function @Author:GAUR01OCT16**********************************/
function deleteSuppImtStockList(utinId, panelName, mainPanel, pageNo, sellPresent, preInvNo, invNo, formName,purchaseonly='') {
//alert(mainPanel);
    if (sellPresent > 0) {
        alert('To Delete,First Delete This Item From Customer Purchase Panel!');
        return false;
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
        if (confirm_box == true)
        {
            var stockDeleteConfirm = '';
            var stockDelete = document.getElementById("stockDelete").value;
            if ((panelName == 'ItemDelete' || panelName == 'CrystalStockPayment' || panelName == 'ImitationStockPayment' || panelName == 'TagDelete') && stockDelete == 'Y') {
                confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
                if (confirm_box_for_stock == true) {
                    stockDeleteConfirm = 'yes';
                } else {
                    stockDeleteConfirm = 'no';
                }
            }
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    if (panelName == 'TagDelete') {
                        document.getElementById("crystalPanelFormDiv").innerHTML = xmlhttp.responseText;
                    } else {
                        document.getElementById("stockPanelFormDiv").innerHTML = xmlhttp.responseText;
                    }
                    closeMessDiv('messDisplayDiv', 'DELETED');
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            if (panelName == 'TagDelete') {
                xmlhttp.open("GET", "ogijsiadel" + default_theme + ".php?utinId=" + utinId + "&stockDelete=" + stockDelete + "&stockDeleteConfirm=" + stockDeleteConfirm + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&pageNo=" + pageNo + "&preInvNo=" + preInvNo + "&invNo=" + invNo + "&formName=" + formName, true);
            } else {
                xmlhttp.open("GET", "include/php/ogijsiadel" + default_theme + ".php?utinId=" + utinId + "&stockDelete=" + stockDelete + "&stockDeleteConfirm=" + stockDeleteConfirm + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&pageNo=" + pageNo + "&preInvNo=" + preInvNo + "&invNo=" + invNo + "&formName=" + formName + "&purchaseonly=" + purchaseonly, true);
            }
            xmlhttp.send();
        }
    }
}
/**************************************** add function @Author:GAUR01OCT16**********************************/
/**************************************** add function @Author:GAUR30SEP16**********************************/
/****************************************Start code to add function @Author:SANT04OCT16**********************************/
function getPaymentDivForAddInvoice(documentRootPath, preInvoiceNo, postInvoiceNo, panelName, navPanel, suppId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (navPanel == 'InvoicePayment') {
                document.getElementById("AddInvoiceMainDiv").innerHTML = xmlhttp.responseText;
            } else if (navPanel == 'NewOrder') {
                document.getElementById("newOrderDivs").innerHTML = xmlhttp.responseText;
            } else if (navPanel == 'RawStock') {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogpayment" + default_theme + ".php?paymentPanelName=" + navPanel + "&preInvNo=" + preInvoiceNo + "&postInvNo=" + postInvoiceNo + "&suppId=" + suppId, true);
    xmlhttp.send();
}
/****************************************End code to add function @Author:SANT04OCT16**********************************/
/**********Start code to add function @Author: GAUR04OCT16*********/
function getAItemValidatePreIdDiv(preId, div, id, keyCodeInput, mainPanel) {
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        }
    };
    var itemPreId = preId;
    xmlhttp.open("POST", "include/php/ogijvidsl" + default_theme + ".php?&itemPreId=" + itemPreId + "&div=" + div + "&id=" + id + "&mainPanel=" + mainPanel, true);
    xmlhttp.send();
}
/**********End code to add function @Author: GAUR04OCT16*********/
/**********Start code to Validation of Item @Author: GAUR07OCT16*********/
function addSuppImtAItem() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addItemSubButtDiv").style.visibility = "hidden";
    var itemDateDay = document.getElementById("addItemDOBDay").value;
    var itemDateMMM = document.getElementById("addItemDOBMonth").value;
    var itemDateYY = document.getElementById("addItemDOBYear").value;
    var itemDateStr = document.getElementById("addItemDOBMonth").value + ' ' + document.getElementById("addItemDOBDay").value + ', ' + document.getElementById("addItemDOBYear").value;
    var itemDate = new Date(itemDateStr); // stock Date
    var todayDate = new Date(); // Today Date

    var milliStockDate = itemDate.getTime();
    var milliTodayDate = milliStockDate;
    var datesDiff = milliTodayDate - milliStockDate;
    if (typeof (document.getElementById('nepaliDateIndicator')) != 'undefined' &&
            (document.getElementById('nepaliDateIndicator') != null)) {
        var nepaliDateIndicator = document.getElementById("nepaliDateIndicator").value;
    } else {
        var nepaliDateIndicator = '';
    }
    if (datesDiff < 0 && nepaliDateIndicator != 'YES') {
        alert('Please Select the correct Date!');
        document.getElementById("addItemDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else {
        if (itemDateMMM == 'FEB' || itemDateMMM == 'APR' || itemDateMMM == 'JUN' || itemDateMMM == 'SEP' || itemDateMMM == 'NOV') {
            if (itemDateMMM == 'FEB' && itemDateDay > 29 && itemDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + itemDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                return false;
            }
            if (itemDateMMM == 'FEB' && itemDateDay > 28 && itemDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + itemDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                return false;
            }
            if (itemDateDay > 30) {
                alert('Please select correct Date, Month ' + itemDateMMM + ' has only max 30 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                return false;
            }
        }

        // alert(' payButClickId == ' + document.getElementById('payButClickId').value);

        if (document.getElementById('payButClickId').value == 'true') {
            var prefix = document.getElementById("prefix").value;
            var payPanelName = document.getElementById("upPanel").value;
            return true;
        } else {

            // alert(' payButClickId ++ ' + document.getElementById('payButClickId').value);

            if (validateAddSuppImtAItemInputs()) {
                if (document.getElementById('mainPanel').value == 'StockPanel') {
                    if (document.getElementById("panelName").value != 'ImitationUpdateStock' && document.getElementById("panelName").value != 'ImitationStockPayUp')
                        callAutoBcPrint();
                    else
                        return true;
                } else {
                    return true;
                }
            }
        }
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("addItemSubButtDiv").style.visibility = "visible";
    return false;
}

function validateAddSuppImtAItemInputs() {

    // alert('sttr_quantity == ' + document.getElementById('sttr_quantity').value);

    if (validateSelectField(document.getElementById("addItemDOBDay").value, "Please select Day!") == false) {
        document.getElementById("addItemDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBMonth").value, "Please select Month!") == false) {
        document.getElementById("addItemDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBYear").value, "Please select Year!") == false) {
        document.getElementById("addItemDOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("sttr_account_id").value, "Please select Account Name!") == false) {
        document.getElementById("sttr_account_id").focus();
        return false;
    }

    // ADDED CODE FOR VALIDATION OF QTY FIELD ON ADD STOCK GENERAL B1 AND ADD STOCK WITH NUM B2 FORMS @AUTHOR-PRIYANKA-17JULY2020
    if (document.getElementById("sttr_panel_name").value == 'RETAIL_IMITATION_B2' ||
            document.getElementById("sttr_panel_name").value == 'RetailStock') {
        //
        if (validateEmptyField(document.getElementById("sttr_quantity").value, "Please enter quantity!") == false) {
            document.getElementById("sttr_quantity").focus();
            return false;
        }
        //
    }

    if (document.getElementById("panelName").value == 'ImitationStock' ||
            document.getElementById("panelName").value == 'UpdateImitationStock') {

        if (validateEmptyField(document.getElementById("sttr_item_category").value, "Please enter Item Category!") == false) {
            document.getElementById("sttr_item_category").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please enter Item Name!") == false) {
            document.getElementById("sttr_item_name").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_item_pre_id").value, "Please enter Code!") == false) {
            document.getElementById("sttr_item_pre_id").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_price").value, "Please enter Purchase  Price!") == false ||
                validateNumWithDot(document.getElementById("sttr_price").value, "Accept only numeric characters without space!") == false) {
            document.getElementById("sttr_price").focus();
            return false;
        } else if (document.getElementById("sttr_price").value == '0') {
            alert('Please enter Price!')
            document.getElementById("sttr_price").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_price").value, "Please enter Price!") == false ||
                validateNumWithDot(document.getElementById("sttr_price").value, "Accept only numeric characters without space!") == false) {
            document.getElementById("sttr_price").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_valuation").value, "Please enter Item Final Valuation!") == false ||
                validateNumWithDot(document.getElementById("sttr_valuation").value, "Accept only numeric characters without space!") == false) {
            document.getElementById("sttr_valuation").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_final_valuation").value, "Please enter Item Final Valuation!") == false ||
                validateNumWithDot(document.getElementById("sttr_final_valuation").value, "Accept only numeric characters without space!") == false) {
            document.getElementById("sttr_final_valuation").focus();
            return false;
        } else
            return true;
    } else {
        if (validateEmptyField(document.getElementById("sttr_item_category").value, "Please enter Crystal Id!") == false) {
            document.getElementById("sttr_item_category").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please enter Crystal Name!") == false) {
            document.getElementById("sttr_item_name").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_sell_rate").value, "Please Enter Sell Rate!") == false ||
                validateNumWithDot(document.getElementById("sttr_sell_rate").value, "Accept only numeric characters without space!") == false) {
            document.getElementById("sttr_sell_rate").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_purchase_rate").value, "Please Enter Purchase Rate!") == false ||
                validateNumWithDot(document.getElementById("sttr_purchase_rate").value, "Accept only numeric characters without space!") == false) {
            document.getElementById("sttr_purchase_rate").focus();
            return false;
        } else
            return true;
    }
}
/**********END code to Validation of Item @Author: GAUR07OCT16*********/
/***************Start cdoe to add panel @Author: GAUR14OCT16*************/
function showImtPurStockPanel(suppId, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'ImitationPurchaseList' || panel == 'CrystalPurchaseList')
        xmlhttp.open("POST", "include/php/ogijpltd" + default_theme + ".php?panel=" + panel + "&custId=" + suppId, true);
    else
        xmlhttp.open("POST", "include/php/ogijssdv" + default_theme + ".php?panel=" + panel + "&custId=" + suppId, true);
    xmlhttp.send();
}
/***************End cdoe to add panel @Author: GAUR14OCT16*************/

/**********add start code TO update imitation item @Author: GAUR14OCT16*********/
function showSuppListImtStockDiv(documentRootPath, utinId, upPanelName, suppId, div) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (div == 'cust_middle_body') {
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
            }
        }
    };
    if (upPanelName == 'UpdateCrystalStock') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijssdv" + default_theme + ".php?utin_Id=" + utinId + "&panelName=CrystalStock" +
                "&updatePanelName=" + upPanelName + "&suppId=" + suppId, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijssdv" + default_theme + ".php?utin_Id=" + utinId + "&panelName=ImitationStock" +
                "&updatePanelName=" + upPanelName + "&suppId=" + suppId, true);
    }

    xmlhttp.send();
}
/**********add end code TO update imitation item @Author: GAUR14OCT16*********/

/**************************************** add function @Author:GAUR14OCT16**********************************/
function deleteSuppImtPurList(utinId, panelName, mainPanel, pageNo, sellPresent, preInvNo, invNo) {
//alert('Hello');
    if (sellPresent > 0) {
        alert('To Delete,First Delete This Item From Customer Purchase Panel!');
        return false;
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
        if (confirm_box == true)
        {

            var stockDeleteConfirm = '';
            var stockDelete = document.getElementById("stockDelete").value;
            if (panelName == 'ItemDelete' && stockDelete == 'Y') {
                confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
                if (confirm_box_for_stock == true) {
                    stockDeleteConfirm = 'yes';
                } else {
                    stockDeleteConfirm = 'no';
                }
            }
//
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                    document.getElementById('deleteInvVerifyPopUp').style.display = "none";
                    closeMessDiv('messDisplayDiv', 'DELETED');
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            xmlhttp.open("GET", "include/php/ogijsiadel" + default_theme + ".php?utinId=" + utinId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm + "&mainPanel=" + mainPanel + "&pageNo=" + pageNo + "&preInvNo=" + preInvNo + "&invNo=" + invNo, true);
            xmlhttp.send();
        }
    }
}
/**************************************** add function @Author:GAUR14OCT16**********************************/
/****************************************start add function @Author:GAUR26OCT16**********************************/
function getSuppForAddMetal(suppId, suppPanelName, mainPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogrwmomf" + default_theme + ".php?&suppPanelName=" + suppPanelName + "&userId=" + suppId + "&metType=BUY&mainPanel=" + mainPanel, true);
    xmlhttp.send();
}


function changeType(userId, suppPanelName, metType, mainPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//    if (suppPanelName == 'addMetalByCash') {
    xmlhttp.open("POST", "include/php/ogrwmomf" + default_theme + ".php?suppPanelName=" + suppPanelName + "&userId=" + userId + "&metType=" + metType + "&mainPanel=" + mainPanel, true);
//    } else {
//        xmlhttp.open("POST", "include/php/ogrwmomf"+ default_theme +".php?suppPanelName=" + suppPanelName + "&userId=" + userId + "&metType=" + metType + "&mainPanel=" + mainPanel, true);
//    }
    xmlhttp.send();
}

function calculateFineWt() {
    var goldWeight = 0;
    var payTotalWeight1 = document.getElementById('PayMetal1RecWt').value;
    var payTotalWeightType1 = document.getElementById('PayMetal1RecWtType').value;
    var payMetalTunch1 = document.getElementById('PayMetal1Tunch').value;
    var metalWeight = (payTotalWeight1 * payMetalTunch1) / 100;
    document.getElementById('PayMetal1FnWt').value = parseFloat(metalWeight).toFixed(3);
}

/****************************************end add function @Author:GAUR26OCT16**********************************/
/***********Start code to add function for InvoiceUpdate @Author:SANT26OCT16*********/
/***********Start code to add function for InvoiceUpdate @Author:SANT27OCT16*********/
function showSuppAddInvoicePurchaseDetails(newPreInvoiceNo, newInvoiceNo, navPanel, suppId, payId, rateCutValue, mainPanel, transDate) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("suppHomePanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwadinv" + default_theme + ".php?utinId=" + payId + "&panelName=UpdateItem&paymentPanelName=" + navPanel +
            "&preInvoiceNo=" + newPreInvoiceNo + "&PreInvoiceNo=" + newPreInvoiceNo +
            "&postInvoiceNo=" + newInvoiceNo + "&invoiceNo=" + newInvoiceNo +
            "&suppId=" + suppId + "&suppPayId=" + payId + "&mainPanel=" + mainPanel + "&transDate=" + transDate, true);
    xmlhttp.send();
}
/***********End code to add function for InvoiceUpdate @Author:SANT27OCT16*********/
/***********End code to add function for InvoiceUpdate @Author:SANT26OCT16*********/
/***********start code to update function for calculateRawMetPurchsePrice @Author: GAUR04NOV16*********/
/***********start code to add function for calculateRawMetPurchsePrice @Author: GAUR28OCT16*********/
function calculateRawMetPurchsePrice() {
//    alert('hi');
    var totalLabNOthCharges = 0;
    var labCharges = document.getElementById('slItemLbrRate').value;
    var labChargesType = document.getElementById('slItemLbrRateType').value;
    var wastg = document.getElementById('slItemWstg').value;
    var qty = document.getElementById('slItemPieces').value;
    var netWt = parseFloat(document.getElementById('slItemNetWeight').value);
    var netWtTp = document.getElementById('slItemNetWeightType').value;
//    var metalRate = parseFloat(document.getElementById('slItemMetalRate').value);
//    var metalRate = parseFloat(document.getElementById('metalRateCalculation').value);

    var metalType = document.getElementById('slItemMetal').value;
    if (document.getElementById('slItemTunch').value != 'NotSelected') {
        document.getElementById('slItemFineWeight').value = parseFloat((parseFloat(document.getElementById('slItemTunch').value) * netWt) / 100).toFixed(3);
    } else {
        document.getElementById('slItemTunch').value = 0.0;
        document.getElementById('slItemFineWeight').value = 0.0;
    }

    var fineWt = parseFloat(document.getElementById('slItemFineWeight').value);
    if (labCharges != '') {
        if (labChargesType == 'KG') {
            if (netWtTp == 'KG')
                totalLabNOthCharges = labCharges * netWt;
            else if (netWtTp == 'GM')
                totalLabNOthCharges = (labCharges / 1000) * netWt;
            else
                totalLabNOthCharges = (labCharges / (1000 * 1000)) * netWt;
        } else if (labChargesType == 'GM') {
            if (netWtTp == 'KG')
                totalLabNOthCharges = labCharges * 1000 * netWt;
            else if (netWtTp == 'GM')
                totalLabNOthCharges = labCharges * netWt;
            else
                totalLabNOthCharges = (labCharges / 1000) * netWt;
        } else if (labChargesType == 'MG') {
            if (netWtTp == 'KG')
                totalLabNOthCharges = labCharges * 1000 * 1000 * netWt;
            else if (netWtTp == 'GM')
                totalLabNOthCharges = labCharges * 1000 * netWt;
            else
                totalLabNOthCharges = labCharges * netWt;
        } else if (labChargesType == 'PP') {
            totalLabNOthCharges = parseFloat(labCharges * qty);
        }
    }
    document.getElementById('slItemNetWt').value = parseFloat(totalLabNOthCharges).toFixed(2);
    var tounch = document.getElementById('slItemTunch').value;
    if (wastg == '' || wastg == null)
        wastg = 0;
    if (tounch != 'NotSelected')
        document.getElementById('slItemFFineWeight').value = parseFloat(((parseFloat(wastg) + parseFloat(tounch)) * netWt) / 100).toFixed(3);
    return false;
}
/***********start code to add function for calculateRawMetPurchsePrice @Author: GAUR28OCT16*********/
/***********END code to update function for calculateRawMetPurchsePrice @Author: GAUR04NOV16*********/
/*********Start code to add delete invoice det @Author:SANT15NOV16 *************************/
function deleteInvoiceItem(custId, slPrId, panelName, mainPanel, panel, slPrInfo) {
    if (panelName == 'InvoicePayUp') {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    }
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'InvoicePayUp') {
                    document.getElementById("suppHomePanelSubDiv").innerHTML = xmlhttp.responseText;
                    window.setTimeout(sellFunctionToCloseDiv, 1000);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwindel" + default_theme + ".php?custId=" + custId + "&slPrId=" + slPrId + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&slPrInfo=" + slPrInfo + "&panel=" + panel, true);
        xmlhttp.send();
    }
}
/*********End code to add delete invoice det @Author:SANT15NOV16 *************************/
/***********Start to add functions for packet weights and labour charges @Author: ATHU8NOV16********/
/***********Start to add functions for packet weights and labour charges changed count @Author: ATHU5jun17********/
function totalPacketsCal(count) {
    //
    var totalWeight = 0;
    for (var i = 1; i <= 5; i++) {
        //
        if (document.getElementById('sttr_pkt_qty' + i).value == 'NaN') {
            document.getElementById('sttr_pkt_qty' + i).value = 0;
        }
        //
        if (document.getElementById('sttr_pkt_qty' + i).value == 'NaN') {
            document.getElementById('sttr_pkt_weight' + i).value = 0;
        }
        //
        var totalWeightForCount = parseFloat(document.getElementById('sttr_pkt_qty' + i).value * document.getElementById('sttr_pkt_weight' + i).value).toFixed(3);
        var weight = document.getElementById('packetTotalWeight' + i).value = totalWeightForCount;
        //
        if (weight == '' || weight == 'NaN') {
            weight = 0;
        }
        //
   if(document.getElementById('sttr_pkt_wt_opration' + i).value=='ADD'){
        totalWeight = parseFloat(totalWeight) - parseFloat(weight);
    }else{
        totalWeight = parseFloat(totalWeight) + parseFloat(weight);
    }
    }
    //
    document.getElementById("totalWt").value = parseFloat(totalWeight).toFixed(3);
    if (typeof (document.getElementById('sttr_less_weight')) != 'undefined' && (document.getElementById('sttr_less_weight') != null)) {
        document.getElementById("sttr_less_weight").value = parseFloat(totalWeight).toFixed(3);
    } else if (typeof (document.getElementById('slPrPacketWeight')) != 'undefined' && (document.getElementById('slPrPacketWeight') != null)) {
        document.getElementById("slPrPacketWeight").value = parseFloat(totalWeight).toFixed(3);
    }
    //
}

function total(count)
{
    for (var i = 1; i <= count; i++)
    {

        if (document.getElementById('qty' + i).value == '' || document.getElementById('qty' + i).value == 'NaN')
        {

            document.getElementById('qty' + i).value = 0;
        }
        if (document.getElementById('lbchrg' + i).value == '' || document.getElementById('lbchrg' + i).value == 'NaN')
        {

            document.getElementById('lbchrg' + i).value = 0;
        }
        if (document.getElementById('total' + i).value == '' || document.getElementById('total' + i).value == 'NaN')
        {

            document.getElementById('total' + i).value = 0;
        }


        var totalvalue = parseFloat(document.getElementById('qty' + i).value) * parseFloat(document.getElementById('lbchrg' + i).value);
        document.getElementById('total' + i).value = parseFloat(totalvalue).toFixed(3);
    }
    var total = 0;
    for (var i = 1; i <= count; i++)
    {

        var s = document.getElementById('total' + i).value;
        total = parseFloat(total) + parseFloat(s);
    }

    if (total != 'NaN' || total != '') {
        document.getElementById("totalcharge").value = parseFloat(total).toFixed(3);
        document.getElementById("sttr_total_lab_charges").value = parseFloat(total).toFixed(3); ////changed by @auth:athu5JUN17
    }
}
//START CODE TO CHANGE IDS @AUTH:ATHU5JUN17
function disableField()
{
    if (document.getElementById('sttr_lab_charges').value != '')
    {
        var a = document.getElementById('sttr_lab_charges').value;
        document.getElementById("sttr_total_lab_charges").value = a;
        document.getElementById("sttr_total_lab_charges").disabled = true;
    } else
    {
        document.getElementById("sttr_lab_charges").disabled = false;
    }
}

function disableField1()
{
    var a = document.getElementById('sttr_total_lab_charges').value;
    if (document.getElementById('sttr_total_lab_charges').value != '')
    {
        document.getElementById("sttr_lab_charges").disabled = true;
    } else
    {
        document.getElementById("sttr_lab_charges").disabled = false;
    }
}
////eND CODE @AUTH:ATHU5JUN17
/***********End to add functions for packet weights and labour charges @Author: ATHU8NOV16********/
/***********START code to update function for calculateRawMetPurchsePrice @Author: GAUR16NOV16*********/
function addSuppRawStockExistingItemDiv(suppId, newPreInvoiceNo, newInvoiceNo, panelName, mainPanel, metType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogrwexad" + default_theme + ".php?suppId=" + suppId + "&newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&metType=" + metType, true);
    xmlhttp.send();
}
/***********END code to update function for calculateRawMetPurchsePrice @Author: GAUR16NOV16*********/
/***********Start code to add functions for validate fine Invoice @Author: SANT22NOV16********/
/***********Start code to add functions for validate fine Invoice @Author: SANT30NOV16********/
/************Start code to remove if condition for payButClickId for validation @Author:SHRI07JAN17*************/
function addSuppInvoiceItem() {
//    alert('hi');
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addItemSubButtDiv").style.visibility = "hidden";
    var itemDateDay = document.getElementById("addItemDOBDay").value;
    var itemDateMMM = document.getElementById("addItemDOBMonth").value;
    var itemDateYY = document.getElementById("addItemDOBYear").value;
    var itemDateStr = document.getElementById("addItemDOBMonth").value + ' ' + document.getElementById("addItemDOBDay").value + ', ' + document.getElementById("addItemDOBYear").value;
    var itemDate = new Date(itemDateStr); // stock Date
    var todayDate = new Date(); // Today Date
    var documentRootPath = document.getElementById('documentRootPath').value;

    var milliStockDate = itemDate.getTime();
    var milliTodayDate = milliStockDate;
    var datesDiff = milliTodayDate - milliStockDate;
    if (typeof (document.getElementById('nepaliDateIndicator')) != 'undefined' &&
            (document.getElementById('nepaliDateIndicator') != null)) {
        var nepaliDateIndicator = document.getElementById("nepaliDateIndicator").value;
    } else {
        var nepaliDateIndicator = '';
    }
    //
    if (datesDiff < 0 && nepaliDateIndicator != 'YES') {
        alert('Please Select the correct Date!');
        document.getElementById("addItemDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else {
        if (itemDateMMM == 'FEB' || itemDateMMM == 'APR' || itemDateMMM == 'JUN' || itemDateMMM == 'SEP' || itemDateMMM == 'NOV') {
            if (itemDateMMM == 'FEB' && itemDateDay > 29 && itemDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + itemDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                return false;
            }
            if (itemDateMMM == 'FEB' && itemDateDay > 28 && itemDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + itemDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                return false;
            }
            if (itemDateDay > 30) {
                alert('Please select correct Date, Month ' + itemDateMMM + ' has only max 30 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                return false;
            }
        }
        if (document.getElementById('noofcrystal').value > 0) {
            var noOfCrystals = parseInt(document.getElementById('noofcrystal').value);
            for (var i = 1; i <= noOfCrystals; i++) {
                var crystalId = 'sttr_purchase_rate' + i;
                var rate = document.getElementById(crystalId).value;
                if (rate.trim() === '') {
                    alert('Please enter a crystal rate for crystal ' + i);
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("addInvItemSubButt").style.visibility = "visible";
                    return false;
                }
            }
            return true;
        }
        if (document.getElementById("validateHUID").value == 'YES' &&
                (document.getElementById("sttr_metal_type").value == 'Gold' || document.getElementById("sttr_metal_type").value == 'gold' || document.getElementById("sttr_metal_type").value == 'GOLD')
                && document.getElementById("sttr_gs_weight").value > 2) {
            if (validateEmptyField(document.getElementById("sttr_hallmark_uid").value, "Please enter Item Hallmark UID !") == false) {
                document.getElementById("sttr_hallmark_uid").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addInvItemSubButt").style.visibility = "visible";
                return false;
            }
        }
        if (document.getElementById("sttr_hallmark_uid").value != '') {
            result = checkHallMarkUid(document.getElementById("sttr_hallmark_uid").value, documentRootPath, 'AddStock', document.getElementById("sttr_id").value);
            if (result != 'success') {
                alert(result);
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addInvItemSubButt").style.visibility = "visible";
                return false;
            }
        }
        if (validateAddSuppInvoiceItemInputs()) {
            if (document.getElementById('mainPanel').value == 'StockPanel') {
                if (document.getElementById("panelName").value != 'ImitationUpdateStock' && document.getElementById("panelName").value != 'ImitationStockPayUp')
                    callAutoBcPrint();
                else
                    return true;
            } else {
                return true;
            }
        }
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("addItemSubButtDiv").style.visibility = "visible";
    return false;
}
/************End code to remove if condition for payButClickId for validation @Author:SHRI07JAN17*************/
function validateAddSuppInvoiceItemInputs() {
    //
    if (validateSelectField(document.getElementById("addItemDOBDay").value, "Please select Day!") == false) {
        document.getElementById("addItemDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBMonth").value, "Please select Month!") == false) {
        document.getElementById("addItemDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBYear").value, "Please select Year!") == false) {
        document.getElementById("addItemDOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("sttr_account_id").value, "Please select Account Name!") == false) {
        document.getElementById("sttr_account_id").focus();
        return false;
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // START CODE TO ADD VALIDATIONS FOR ITEM CATEGORY,NAME AND PRE-ID AT WHO;ESALE PURCHASE FORM @MADHUREE-14APRIL2020
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    } else if (validateSelectField(document.getElementById("sttr_item_category").value, "Please Enter Product Category!") == false) {
        document.getElementById("sttr_item_category").focus();
        return false;
    } else if (validateSelectField(document.getElementById("sttr_item_name").value, "Please Enter Product Name!") == false) {
        document.getElementById("sttr_item_name").focus();
        return false;
    } else if (validateSelectField(document.getElementById("sttr_item_pre_id").value, "Please Enter Product Id!") == false) {
        document.getElementById("sttr_item_pre_id").focus();
        return false;
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // END CODE TO ADD VALIDATIONS FOR ITEM CATEGORY,NAME AND PRE-ID AT WHO;ESALE PURCHASE FORM @MADHUREE-14APRIL2020
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    } else if (validateEmptyField(document.getElementById("sttr_gs_weight").value, "Please Enter Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("sttr_gs_weight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_gs_weight").focus();
        return false;
    } else if ((validateSelectField(document.getElementById("sttr_purity").value, "Please Enter Purity!") == false) ||
            (validateEmptyField(document.getElementById("sttr_purity").value, "Please Enter Purity!") == false)) {     
        event.preventDefault();
        document.getElementById("sttr_purity").focus();
        return false;
    } else if ((document.getElementById("sttr_metal_type").value == 'Gold' || document.getElementById("sttr_metal_type").value == 'Silver') && validateSelectField(document.getElementById("sttr_purity").value, "Please Enter Purity!") == false) {
        document.getElementById("sttr_purity").focus();
        return false;
    } else if (document.getElementById("sttr_purity").value == '0') {
        alert("Please Enter Purity!");
               event.preventDefault();
        document.getElementById("sttr_purity").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_invoice_no").value, "Please Enter Post Invoice Number!") == false ||
            validateNum(document.getElementById("sttr_invoice_no").value, "Accept only numeric without space!") == false) {
        document.getElementById("sttr_invoice_no").focus();
        return false;
    } else{
        return true;
}
}
/***********End code to add functions for validate fine Invoice @Author: SANT30NOV16********/
//
//
// **********************************************************************************************************************
// START CODE TO CHANGE CODE FOR Add Crystal Panel - According to Pre Id, Item Id not Changing @PRIYANKA-13JUNE18
// **********************************************************************************************************************
function getCRtemPreIdDiv(preId, div, id, keyCodeInput, mainPanel, stockType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            if (str == '') {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                document.getElementById('sttr_item_id').value = '1';
                document.getElementById('changedItemId').value = '1';
            } else {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                if (keyCodeInput == 40 || keyCodeInput == 38) {
                    document.getElementById('itemPreIdListToSel').focus();
                    document.getElementById('itemPreIdListToSel').options[0].selected = true;
                }
            }
        }
    };
    var itemPreId = preId;
    xmlhttp.open("POST", "include/php/ogcraidsl" + default_theme + ".php?itemPreId=" + itemPreId + "&div=" + div + "&id=" + id + "&mainPanel=" + mainPanel + "&stockType=" + stockType, true);
    xmlhttp.send();
}
//
function getCrystalPreId(preId, panelName, div) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", "include/php/ogcraddv" + default_theme + ".php?preId=" + preId + "&stockPanel=" + panelName, true);
    xmlhttp.send();
}
// **********************************************************************************************************************
// END CODE TO CHANGE CODE FOR Add Crystal Panel - According to Pre Id, Item Id not Changing @PRIYANKA-13JUNE18
// **********************************************************************************************************************

// ****START CODE FOR ADD STERLING SILVER PANEL - ACCORDING TO PRE ID, ITEM ID NOT CHANGING AUTHOR : DIKSHA 28DEC 2018****
// 
function getSRitemPreIdDiv(preId, div, id, keyCodeInput, mainPanel, stockType) {
//alert(stockType);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            if (str == '') {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                document.getElementById('sttr_item_id').value = '1';
                document.getElementById('changedItemId').value = '1';
            } else {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                if (keyCodeInput == 40 || keyCodeInput == 38) {
                    document.getElementById('itemPreIdListToSel').focus();
                    document.getElementById('itemPreIdListToSel').options[0].selected = true;
                }
            }
        }
    };
    var itemPreId = preId;
    xmlhttp.open("POST", "include/php/omstraidsl" + default_theme + ".php?itemPreId=" + itemPreId + "&div=" + div + "&id=" + id + "&mainPanel=" + mainPanel + "&stockType=" + stockType, true);
    xmlhttp.send();
}
//
function getSterlingPreId(preId, panelName, div) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", "include/php/omijsdv" + default_theme + ".php?preId=" + preId + "&stockPanel=" + panelName, true);
    xmlhttp.send();
}
//
// ****END CODE FOR ADD STERLING SILVER PANEL - ACCORDING TO PRE ID, ITEM ID NOT CHANGING AUTHOR : DIKSHA 28DEC 2018******

/**********START CODE FOR SELECT DROPDOWN PREVIUSLY ADDED:AUTHOR:SANT05JUL17********/
function getCryItemDetails(itemPreId, stockType) {
//    alert('stockType=' + stockType);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            var str = xmlhttp.responseText;
//            alert(str);
            var strArray = new Array();
            strArray = str.split("*");
            document.getElementById('sttr_item_category').value = strArray[0];
            document.getElementById('sttr_item_name').value = strArray[1];
            document.getElementById('sttr_clarity').value = strArray[2];
            document.getElementById('sttr_color').value = strArray[3];
            document.getElementById('sttr_other_info').value = strArray[4];
//            document.getElementById('sttr_quantity').value = '';
            document.getElementById('sttr_gs_weight').value = strArray[5];
            document.getElementById('sttr_gs_weight_type').value = strArray[6];
            document.getElementById('sttr_purchase_rate').value = strArray[7];
            document.getElementById('sttr_purchase_rate_type').value = strArray[8];
            document.getElementById('sttr_valuation').value = strArray[9];
            document.getElementById('sttr_tax').value = strArray[10];
            document.getElementById('sttr_tot_tax').value = strArray[11];
            document.getElementById('sttr_final_valuation').value = strArray[12];
            document.getElementById('sttr_quantity').value = strArray[13];
            document.getElementById('sttr_shape').value = strArray[14];
            document.getElementById('sttr_size').value = strArray[15];
            document.getElementById('sttr_color').value = strArray[16];
            document.getElementById('sttr_clarity').value = strArray[17];
//            calcCryTotalTaxPrice();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/ogcrstdt" + default_theme + ".php?itemPreId=" + itemPreId + "&stockType=" + stockType, true);
    xmlhttp.send();
}
/**********END CODE FOR SELECT DROPDOWN PREVIUSLY ADDED:AUTHOR:SANT05JUL17********/

/***********START Code To add itemsaleSuppRateCut @Author: GAUR14DEC16***************/
function itemsaleSuppRateCut(rateCutId, goldPrevWeight, goldPrevWeightType, silverPrevWeight, silverPrevWeightType, goldFinalWeight, goldFinalWeightType, silverFinalWeight, silverFinalWeightType, goldRate, silverRate, payPanelName, userId, preInvNo, invNo, payOpt, totalFinalBalance, totBalance, gdffnWtCrDrType, slffnWtCrDrType, userCashBalCrDrType, firmId) {

    document.getElementById('stockPurPriceCut').value = rateCutId;
    var paymentType = document.getElementById('paymentType').value;
    var poststr = "rateCutOpt=" + encodeURIComponent(rateCutId) +
            "&goldPrevWeight=" + encodeURIComponent(goldPrevWeight) +
            "&goldPrevWeightType=" + encodeURIComponent(goldPrevWeightType) +
            "&silverPrevWeight=" + encodeURIComponent(silverPrevWeight) +
            "&silverPrevWeightType=" + encodeURIComponent(silverPrevWeightType) +
            "&goldFinalWeight=" + encodeURIComponent(goldFinalWeight) +
            "&silverFinalWeight=" + encodeURIComponent(silverFinalWeight) +
            "&goldFinalWeightType=" + encodeURIComponent(goldFinalWeightType) +
            "&silverFinalWeightType=" + encodeURIComponent(silverFinalWeightType) +
            "&goldRate=" + encodeURIComponent(goldRate) +
            "&silverRate=" + encodeURIComponent(silverRate) +
            "&payPanelName=" + encodeURIComponent(payPanelName) +
            "&preInvId=" + encodeURIComponent(preInvNo) +
            "&invId=" + encodeURIComponent(invNo) +
            "&userId=" + encodeURIComponent(userId) +
            "&payOpt=" + encodeURIComponent(payOpt) +
            "&totalFinalBalance=" + encodeURIComponent(totalFinalBalance) +
            "&totBalance=" + encodeURIComponent(totBalance) +
            "&gdffnWtCrDrType=" + encodeURIComponent(gdffnWtCrDrType) +
            "&slffnWtCrDrType=" + encodeURIComponent(slffnWtCrDrType) +
            "&userCashBalCrDrType=" + encodeURIComponent(userCashBalCrDrType) +
            "&firmId=" + encodeURIComponent(firmId) +
            "&paymentType=" + encodeURIComponent(paymentType);
    ;
//    alert('poststr=' + poststr);
    itemsale_Supp_rate_cut("include/php/ogsuppaym" + default_theme + ".php", poststr);
}
function itemsale_Supp_rate_cut(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertItemsaleSuppRateCut;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertItemsaleSuppRateCut() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("rateCutDiv").innerHTML = xmlhttp.responseText;
        var prefix = document.getElementById('prefix').value;
        var metCount = 0;
        var metalVal = 0;
        if (document.getElementById('stockPurPriceCut').value == 'RateCut')
            calcSuppMetalWholeSaleRateCut(prefix);
        calcSuppMtStockRrCtCashBalance(prefix);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}




var goldRateCutWeight = 0;
var silverRateCutWeight = 0;
function calcSuppMetalWholeSaleRateCut(prefix) {
//    alert('prefix=' + prefix)
    var gdRtCt = 0;
    var metalType;
    if ((document.getElementById(prefix + 'Metal1WtPrevBal').value).trim() == '' || document.getElementById(prefix + 'Metal1WtPrevBal').value == 'NaN') {
        document.getElementById(prefix + 'Metal1WtPrevBal').value = 0;
    }

    var gdBal = parseFloat(document.getElementById(prefix + 'PayMetal1WtBal').value);
    var goldWtType = document.getElementById(prefix + 'PayMetal1WtBalType').value;
    if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
        if ((document.getElementById(prefix + 'Metal1RtCtWtBal').value).trim() == '' || document.getElementById(prefix + 'Metal1RtCtWtBal').value == 'NaN') {
            document.getElementById(prefix + 'Metal1RtCtWtBal').value = 0;
        }
        var gdRtCt = parseFloat(document.getElementById(prefix + 'Metal1RtCtWtBal').value);
//        alert('gdRtCt='+gdRtCt);
        var goldRtCtWtType = document.getElementById(prefix + 'Metal1RtCtWtBalType').value;
        if (gdBal == '' || gdBal == null) {
            gdBal = 0;
        }
        gdRtCt = convertWeight(gdRtCt, goldWtType, goldRtCtWtType);
        document.getElementById('metal1RtCtWtBal').value = gdRtCt + ' ' + goldWtType;
    }
    document.getElementById('metal1WtBal').value = parseFloat(gdBal - gdRtCt).toFixed(3) + ' ' + goldWtType;
    document.getElementById('metal1WtFinBal').value = parseFloat(gdBal - gdRtCt).toFixed(3) + ' ' + goldWtType;
//    alert(document.getElementById('metal1WtFinBal').value);
    if ((document.getElementById(prefix + 'Metal2WtPrevBal').value).trim() == '' || document.getElementById(prefix + 'Metal2WtPrevBal').value == 'NaN') {
        document.getElementById(prefix + 'Metal2WtPrevBal').value = 0;
    }

    var silverRtCt = 0;
    var silverBal = parseFloat(document.getElementById(prefix + 'PayMetal2WtBal').value);
    var silverWtType = document.getElementById(prefix + 'PayMetal2WtBalType').value;
//    alert('sl wt:' + silverBal +'Rate Cut Opt : '+ document.getElementById('stockPurPriceCut').value);
    if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
        if ((document.getElementById(prefix + 'Metal2RtCtWtBal').value).trim() == '' || document.getElementById(prefix + 'Metal2RtCtWtBal').value == 'NaN') {
            document.getElementById(prefix + 'Metal2RtCtWtBal').value = 0;
        }
        var silverRtCt = parseFloat(document.getElementById(prefix + 'Metal2RtCtWtBal').value);
        var silverRtCtWtType = document.getElementById(prefix + 'Metal2RtCtWtBalType').value;
//        alert(silverRtCtWtType);
        if (silverBal == '' || silverBal == null) {
            silverBal = 0;
        }
        silverRtCt = convertWeight(silverRtCt, silverWtType, silverRtCtWtType);
        document.getElementById('metal2RtCtWtBal').value = silverRtCt + ' ' + silverWtType;
    }
    document.getElementById('metal2WtBal').value = parseFloat(silverBal - silverRtCt).toFixed(3) + ' ' + silverWtType;
    document.getElementById('metal2WtFinBal').value = parseFloat(silverBal - silverRtCt).toFixed(3) + ' ' + silverWtType;
    calcSuppMetRawMetStock(prefix);
    calcSuppMtStockRrCtCashBalance(prefix);
}


function calcSuppMtStockRrCtCashBalance(prefix) {
    var userCashBalCrDrType = document.getElementById('userCashBalCrDrType').value;
    var paymentType = document.getElementById('paymentType').value;
    if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
        var PayTotAmtBalType = document.getElementById('PayTotAmtBalType').value;
    }
    var finalCashBal;
    var finBalLabel = 'CASH BALANCE :';
    var totalCashPaidAmt = document.getElementById(prefix + 'PayCashAmtRec').value;
    if (totalCashPaidAmt == null || totalCashPaidAmt == '') {
        totalCashPaidAmt = 0;
    }
    var totalChequeAmt = document.getElementById(prefix + 'PayChequeAmt').value;
    if (totalChequeAmt == null || totalChequeAmt == '') {
        totalChequeAmt = 0;
    }
    var totalCardAmt = document.getElementById(prefix + 'PayCardAmt').value;
    if (totalCardAmt == null || totalCardAmt == '') {
        totalCardAmt = 0;
    }
    document.getElementById(prefix + 'PayCashRecDisp').value = Math_round(parseFloat(totalCashPaidAmt) + parseFloat(totalChequeAmt) + parseFloat(totalCardAmt)).toFixed(2);
    document.getElementById(prefix + 'PayTotCashAmt').value = Math_round(parseFloat(totalCashPaidAmt) + parseFloat(totalChequeAmt) + parseFloat(totalCardAmt)).toFixed(2);
    var totalAmt = 0;
    var crystalAmnt = 0;
    if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
        if (document.getElementById(prefix + 'PayTotAmt').value == '' || document.getElementById(prefix + 'PayTotAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayTotAmt').value = 0;
        }
//      totalAmt = parseFloat(document.getElementById(prefix + 'PayTotAmt').value);
        var totalfianlAmt1 = document.getElementById('dispMetal11Value').value;
        var totalfianlAmt2 = document.getElementById('dispMetal22Value').value;
        if (totalfianlAmt1 == '' || totalfianlAmt1 == 'NaN') {
            totalfianlAmt1 = 0;
        }
        if (totalfianlAmt2 == '' || totalfianlAmt2 == 'NaN') {
            totalfianlAmt2 = 0;
        }
        var totalAmt = Math.abs(parseFloat(totalfianlAmt1) - parseFloat(totalfianlAmt2));
    } else if (document.getElementById('stockPurPriceCut').value == 'ByCash') {
        totalAmt = Math.abs(parseFloat(document.getElementById(prefix + 'PayTotAmt').value));
    }
//    else {
//        totalAmt = parseFloat(document.getElementById(prefix + 'PayTotAmt').value);
//    }

    var newTotalAmount = totalAmt;
    document.getElementById('taxOnTotAmt').value = Math_round((parseFloat(totalAmt))).toFixed(2);
    var totalValuation = document.getElementById('taxOnTotAmt').value;
    if (totalValuation == null || totalValuation == '') {
        totalValuation = 0;
    }
    if (document.getElementById(prefix + 'VATTax').value == '') {
        document.getElementById(prefix + 'VATTax').value = 0;
    }
    var totTax = parseFloat(document.getElementById(prefix + 'VATTax').value) / 100;
    document.getElementById(prefix + 'PayVATAmtDisp').value = Math_round(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
    document.getElementById(prefix + 'PayVATAmt').value = Math_round(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
    if (document.getElementById(prefix + 'PayVATAmt').value == 'NaN' || document.getElementById(prefix + 'PayVATAmt').value == '') {
        document.getElementById(prefix + 'PayVATAmt').value = 0.00;
    }

    if (document.getElementById(prefix + 'PayPrevTotAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevTotAmt').value == '') {
        document.getElementById(prefix + 'PayPrevTotAmt').value = 0;
    }
    if (document.getElementById(prefix + 'PayPrevTotAmt').value != '' || document.getElementById(prefix + 'PayPrevTotAmt').value != 0) {
        if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
            if (document.getElementById(prefix + 'PayPrevTotAmt').value > 0) {
                if (userCashBalCrDrType == 'DR') {
                    totalAmt = totalAmt + parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value);
                    totalAmt = Math.abs(parseFloat(totalAmt));
                } else if (userCashBalCrDrType == 'CR') {
                    totalAmt = totalAmt - parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value);
                    totalAmt = Math.abs(parseFloat(totalAmt));
                }
            } else {
                if (userCashBalCrDrType == 'DR') {
                    totalAmt = totalAmt + Math.abs(parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value));
                    totalAmt = Math.abs(parseFloat(totalAmt));
                } else if (userCashBalCrDrType == 'CR') {
                    totalAmt = totalAmt - Math.abs(parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value));
                    totalAmt = Math.abs(parseFloat(totalAmt));
                }

            }
            if (document.getElementById('dispMetal22Value').value == '' || document.getElementById('dispMetal22Value').value == 'NaN') {
                document.getElementById('dispMetal22Value').value = 0;
            }
            var totalfianlAmt1 = document.getElementById('dispMetal11Value').value;
            var totalfianlAmt2 = document.getElementById('dispMetal22Value').value;
            if (totalfianlAmt1 == '' || totalfianlAmt1 == 'NaN') {
                totalfianlAmt1 = 0;
            }
            if (totalfianlAmt2 == '' || totalfianlAmt2 == 'NaN') {
                totalfianlAmt2 = 0;
            }
            var totalMetalAmt = parseFloat(totalfianlAmt1) - parseFloat(totalfianlAmt2);
            totalAmt = Math.abs(parseFloat(totalMetalAmt));
        }
//        alert(totalAmt);
    }
    if (document.getElementById(prefix + 'PayVATAmt').value == '' || document.getElementById(prefix + 'PayVATAmt').value == 'NaN') {
        document.getElementById(prefix + 'PayVATAmt').value = 0;
    }
    if (document.getElementById(prefix + 'PayDiscount').value == '' || document.getElementById(prefix + 'PayDiscount').value == 'NaN') {
        document.getElementById(prefix + 'PayDiscount').value = 0;
    }
    if (document.getElementById(prefix + 'PayTotCashAmt').value == '' || document.getElementById(prefix + 'PayTotCashAmt').value == 'NaN') {
        document.getElementById(prefix + 'PayTotCashAmt').value = 0;
    }
    document.getElementById(prefix + 'PayDiscountDisp').value = Math_round(parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
    if (document.getElementById('stockPurPriceCut').value == 'ByCash') {
        document.getElementById(prefix + 'PayTotFinalAmt').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value))).toFixed(2);
    }
    document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value))).toFixed(2);
    if (document.getElementById('stockPurPriceCut').value == 'ByCash') {
        if (paymentType == 'OWNER' && userCashBalCrDrType == 'CR') {
            finalCashBal = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        } else if (paymentType == 'SUPPLIER' && userCashBalCrDrType == 'DR') {
            finalCashBal = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        } else {
            finalCashBal = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        }
    } else if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
        if (paymentType == 'OWNER' && PayTotAmtBalType == 'CR') {
            finalCashBal = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        } else if (paymentType == 'SUPPLIER' && PayTotAmtBalType == 'DR') {
            finalCashBal = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        } else {
            finalCashBal = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        }
    }
//    finalCashBal = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);

    if (finalCashBal <= 0) {
        finBalLabel = 'FINAL CASH DEPOSIT :';
    }
    document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(finalCashBal).toFixed(2);
    if (document.getElementById('stockPurPriceCut').value == 'ByCash') {
        if (paymentType == 'OWNER' && userCashBalCrDrType == 'CR') {
            document.getElementById(prefix + 'PayTotAmtBal').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
            document.getElementById(prefix + 'PayTotRemAmtBal').value = Math_round((parseFloat(newTotalAmount) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        } else if (paymentType == 'SUPPLIER' && userCashBalCrDrType == 'DR') {
            document.getElementById(prefix + 'PayTotAmtBal').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
            document.getElementById(prefix + 'PayTotRemAmtBal').value = Math_round((parseFloat(newTotalAmount) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        } else {
            document.getElementById(prefix + 'PayTotAmtBal').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
            document.getElementById(prefix + 'PayTotRemAmtBal').value = Math_round((parseFloat(newTotalAmount) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        }
    } else if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
        if (paymentType == 'OWNER' && PayTotAmtBalType == 'CR') {
            document.getElementById(prefix + 'PayTotAmtBal').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
            document.getElementById(prefix + 'PayTotRemAmtBal').value = Math_round((parseFloat(newTotalAmount) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        } else if (paymentType == 'SUPPLIER' && PayTotAmtBalType == 'DR') {
            document.getElementById(prefix + 'PayTotAmtBal').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
            document.getElementById(prefix + 'PayTotRemAmtBal').value = Math_round((parseFloat(newTotalAmount) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        } else {
            document.getElementById(prefix + 'PayTotAmtBal').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
            document.getElementById(prefix + 'PayTotRemAmtBal').value = Math_round((parseFloat(newTotalAmount) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        }
    }
//    document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(finalCashBal).toFixed(2);
//    document.getElementById('finCashBalTd').innerHTML = finBalLabel;
//    document.getElementById(prefix + 'PayTotAmtBal').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
//    document.getElementById(prefix + 'PayTotRemAmtBal').value = Math_round((parseFloat(newTotalAmount) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
}



function calcSuppMetRawMetStock(prefix) {
    var weightBal = 0;
    var gdffnWtCrDrType = document.getElementById('gdffnWtCrDrType').value;
    var slffnWtCrDrType = document.getElementById('slffnWtCrDrType').value;
    var userCashBalCrDrType = document.getElementById('userCashBalCrDrType').value;
    if (document.getElementById(prefix + 'Metal1WtPrevBal').value != '' || document.getElementById(prefix + 'GoldTotFineWt').value != '') {
        if (document.getElementById(prefix + 'PayMetal1WtBal').value == '' || document.getElementById(prefix + 'PayMetal1WtBal').value == 'NaN') {
            document.getElementById(prefix + 'PayMetal1WtBal').value = 0;
        }
        if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
            if (document.getElementById(prefix + 'Metal1RtCtWtBal').value == '' || document.getElementById(prefix + 'Metal1RtCtWtBal').value == 'NaN') {
                document.getElementById(prefix + 'Metal1RtCtWtBal').value = 0;
            }
            var gdRateCut = convertWeight(parseFloat(document.getElementById(prefix + 'Metal1RtCtWtBal').value), document.getElementById(prefix + 'PayMetal1WtBalType').value, document.getElementById(prefix + 'Metal1RtCtWtBalType').value);
            var totFinGdWtBal = parseFloat(document.getElementById(prefix + 'PayMetal1WtBal').value) - parseFloat(gdRateCut);
        }

        document.getElementById('metal1WtFinBal').value = parseFloat(totFinGdWtBal).toFixed(3) + ' ' + document.getElementById(prefix + 'PayMetal1WtBalType').value;
        document.getElementById(prefix + 'Metal1WtFinBal').value = parseFloat(totFinGdWtBal).toFixed(3);
        document.getElementById(prefix + 'Metal1WtFinBalType').value = document.getElementById(prefix + 'PayMetal1WtBalType').value;
        if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
            var payTotalWeightType1 = document.getElementById(prefix + 'Metal1RtCtWtBalType').value;
            var goldWeight = document.getElementById(prefix + 'Metal1RtCtWtBal').value;
            var payMetalRate1 = document.getElementById(prefix + 'Metal1Rate').value;
            if (payTotalWeightType1 == 'KG') {
                document.getElementById(prefix + 'Metal1Valuation').value = Math_round((goldWeight * payMetalRate1 * document.getElementById('gmWtInKg').value));
                document.getElementById('dispMetal1Value').value = Math_round((goldWeight * payMetalRate1 * document.getElementById('gmWtInKg').value)).toFixed(2);
            } else if (payTotalWeightType1 == 'GM') {
                document.getElementById(prefix + 'Metal1Valuation').value = Math_round((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value);
                document.getElementById('dispMetal1Value').value = Math_round((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(2);
            } else if (payTotalWeightType1 == 'MG') {
                document.getElementById(prefix + 'Metal1Valuation').value = Math_round((goldWeight * payMetalRate1) / (document.getElementById('gmWtInMg').value));
                document.getElementById('dispMetal1Value').value = Math_round((goldWeight * payMetalRate1) / (document.getElementById('gmWtInMg').value)).toFixed(2);
            }
        }
    }
    if (document.getElementById(prefix + 'Metal2WtPrevBal').value != '' || document.getElementById(prefix + 'SilverTotFineWt').value != '') {
        if (document.getElementById(prefix + 'PayMetal2WtBal').value == '' || document.getElementById(prefix + 'PayMetal2WtBal').value == 'NaN') {
            document.getElementById(prefix + 'PayMetal2WtBal').value = 0;
        }
        if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
            if (document.getElementById(prefix + 'Metal2RtCtWtBal').value == '' || document.getElementById(prefix + 'Metal2RtCtWtBal').value == 'NaN') {
                document.getElementById(prefix + 'Metal2RtCtWtBal').value = 0;
            }
            var slRateCut = convertWeight(parseFloat(document.getElementById(prefix + 'Metal2RtCtWtBal').value), document.getElementById(prefix + 'PayMetal2WtBalType').value, document.getElementById(prefix + 'Metal2RtCtWtBalType').value);
            var totFinSrWtBal = parseFloat(document.getElementById(prefix + 'PayMetal2WtBal').value) - parseFloat(slRateCut);
        }
        document.getElementById('metal2WtFinBal').value = parseFloat(totFinSrWtBal).toFixed(3) + ' ' + document.getElementById(prefix + 'PayMetal2WtBalType').value;
        document.getElementById(prefix + 'Metal2WtFinBal').value = parseFloat(totFinSrWtBal).toFixed(3);
        document.getElementById(prefix + 'Metal2WtFinBalType').value = document.getElementById(prefix + 'PayMetal2WtBalType').value;
        if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
            var payTotalWeightType2 = document.getElementById(prefix + 'Metal2RtCtWtBalType').value;
            var silverWeight = parseFloat(document.getElementById(prefix + 'Metal2RtCtWtBal').value);
            var payMetalRate2 = parseFloat(document.getElementById(prefix + 'Metal2Rate').value);
            if (payTotalWeightType2 == 'KG') {
                document.getElementById(prefix + 'Metal2Valuation').value = Math_round((silverWeight * payMetalRate2 * document.getElementById('srGmWtInKg').value));
                document.getElementById('dispMetal2Value').value = Math_round((silverWeight * payMetalRate2 * document.getElementById('srGmWtInKg').value)).toFixed(2);
            } else if (payTotalWeightType2 == 'GM') {
                document.getElementById(prefix + 'Metal2Valuation').value = Math_round((silverWeight * payMetalRate2) / document.getElementById('srGmWtInGm').value);
                document.getElementById('dispMetal2Value').value = Math_round((silverWeight * payMetalRate2) / document.getElementById('srGmWtInGm').value).toFixed(2);
            } else if (payTotalWeightType2 == 'MG') {
                document.getElementById(prefix + 'Metal2Valuation').value = Math_round((silverWeight * payMetalRate2) / (document.getElementById('srGmWtInMg').value));
                document.getElementById('dispMetal2Value').value = Math_round((silverWeight * payMetalRate2) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
            }
        }
    }
    if (document.getElementById(prefix + 'PayPrevTotAmt').value == '' || document.getElementById(prefix + 'PayPrevTotAmt').value == 'NaN') {
        document.getElementById(prefix + 'PayPrevTotAmt').value = 0;
    }
    if (gdffnWtCrDrType == 'DR') {
        if (slffnWtCrDrType == 'DR' && userCashBalCrDrType == 'DR') {
            var dispMetal11Amt = Math_round(parseFloat(document.getElementById('dispMetal1Value').value) + parseFloat(document.getElementById('dispMetal2Value').value) + parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value)).toFixed(2);
            document.getElementById('dispMetal11Value').value = Math.abs(dispMetal11Amt).toFixed(2);
        } else if (slffnWtCrDrType == 'CR' && userCashBalCrDrType == 'CR') {
            var dispMetal11Amt = Math_round(parseFloat(document.getElementById('dispMetal1Value').value)).toFixed(2);
            document.getElementById('dispMetal11Value').value = Math.abs(dispMetal11Amt).toFixed(2);
            var dispMetal22Amt = Math_round(parseFloat(document.getElementById('dispMetal2Value').value) + parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value)).toFixed(2);
            document.getElementById('dispMetal22Value').value = Math.abs(dispMetal22Amt).toFixed(2);
        } else if (slffnWtCrDrType == 'DR' && userCashBalCrDrType == 'CR') {
            var dispMetal11Amt = Math_round(parseFloat(document.getElementById('dispMetal1Value').value) + parseFloat(document.getElementById('dispMetal2Value').value)).toFixed(2);
            document.getElementById('dispMetal11Value').value = Math.abs(dispMetal11Amt).toFixed(2);
            var dispMetal22Amt = Math_round(parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value)).toFixed(2);
            document.getElementById('dispMetal22Value').value = Math.abs(dispMetal22Amt).toFixed(2);
        } else if (slffnWtCrDrType == 'CR' && userCashBalCrDrType == 'DR') {
            var dispMetal11Amt = Math_round(parseFloat(document.getElementById('dispMetal1Value').value) + parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value)).toFixed(2);
            document.getElementById('dispMetal11Value').value = Math.abs(dispMetal11Amt).toFixed(2);
            var dispMetal22Amt = Math_round(parseFloat(document.getElementById('dispMetal2Value').value)).toFixed(2);
            document.getElementById('dispMetal22Value').value = Math.abs(dispMetal22Amt).toFixed(2);
        }
    } else {
        if (slffnWtCrDrType == 'CR' && userCashBalCrDrType == 'CR') {
            var dispMetal22Amt = Math_round(parseFloat(document.getElementById('dispMetal1Value').value) + parseFloat(document.getElementById('dispMetal2Value').value) + parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value)).toFixed(2);
            document.getElementById('dispMetal22Value').value = Math.abs(dispMetal22Amt).toFixed(2);
        } else if (slffnWtCrDrType == 'DR' && userCashBalCrDrType == 'DR') {
            var dispMetal11Amt = Math_round(parseFloat(document.getElementById('dispMetal2Value').value) + parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value)).toFixed(2);
            document.getElementById('dispMetal11Value').value = Math.abs(dispMetal11Amt).toFixed(2);
            var dispMetal22Amt = Math_round(parseFloat(document.getElementById('dispMetal1Value').value)).toFixed(2);
            document.getElementById('dispMetal22Value').value = Math.abs(dispMetal22Amt).toFixed(2);
        } else if (slffnWtCrDrType == 'DR' && userCashBalCrDrType == 'CR') {
            var dispMetal11Amt = Math_round(parseFloat(document.getElementById('dispMetal2Value').value)).toFixed(2);
            document.getElementById('dispMetal11Value').value = Math.abs(dispMetal11Amt).toFixed(2);
            var dispMetal22Amt = Math_round(parseFloat(document.getElementById('dispMetal1Value').value) + parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value)).toFixed(2);
            document.getElementById('dispMetal22Value').value = Math.abs(dispMetal22Amt).toFixed(2);
        } else if (slffnWtCrDrType == 'CR' && userCashBalCrDrType == 'DR') {
            var dispMetal22Amt = Math_round(parseFloat(document.getElementById('dispMetal1Value').value) + parseFloat(document.getElementById('dispMetal2Value').value)).toFixed(2);
            document.getElementById('dispMetal22Value').value = Math.abs(dispMetal22Amt).toFixed(2);
            var dispMetal11Amt = Math_round(parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value)).toFixed(2);
            document.getElementById('dispMetal11Value').value = Math.abs(dispMetal11Amt).toFixed(2);
        }
    }
    var dispMetTotalAmt = Math_round((parseFloat(document.getElementById('dispMetal1Value').value) + parseFloat(document.getElementById('dispMetal2Value').value))).toFixed(2);
    document.getElementById('dispTotMetalValue').value = Math.abs(dispMetTotalAmt).toFixed(2);
    if (document.getElementById('stockPurPriceCut').value == 'RateCut') {
        if (document.getElementById(prefix + 'Metal1Valuation').value == '' || document.getElementById(prefix + 'Metal1Valuation').value == 'NaN') {
            document.getElementById(prefix + 'Metal1Valuation').value = 0;
        }
        if (document.getElementById(prefix + 'Metal2Valuation').value == '' || document.getElementById(prefix + 'Metal2Valuation').value == 'NaN') {
            document.getElementById(prefix + 'Metal2Valuation').value = 0;
        }

        var totalfianlAmt1 = document.getElementById('dispMetal11Value').value;
        var totalfianlAmt2 = document.getElementById('dispMetal22Value').value;
        if (totalfianlAmt1 == '' || totalfianlAmt1 == 'NaN') {
            totalfianlAmt1 = 0;
        }
        if (totalfianlAmt2 == '' || totalfianlAmt2 == 'NaN') {
            totalfianlAmt2 = 0;
        }
        var totalMetalAmt = Math_round(parseFloat(totalfianlAmt1) - parseFloat(totalfianlAmt2));
        if (totalMetalAmt < 0) {
            document.getElementById('PayTotAmtBalType').value = 'CR';
            document.getElementById('amtType').value = '(लेना)';
        } else if (totalMetalAmt >= 0) {
            document.getElementById('PayTotAmtBalType').value = 'DR';
            document.getElementById('amtType').value = '(देना)';
        }
        var totalMetalAmt = Math.abs(totalMetalAmt);
        document.getElementById(prefix + 'PayTotAmtBalDisp').value = Math_round(totalMetalAmt).toFixed(2);
        document.getElementById(prefix + 'PayTotAmtRec').value = Math_round(parseFloat(document.getElementById(prefix + 'Metal1Valuation').value) + parseFloat(document.getElementById(prefix + 'Metal2Valuation').value)).toFixed(2);
        document.getElementById(prefix + 'PayTotAmt').value = Math_round(parseFloat(document.getElementById(prefix + 'Metal1Valuation').value) + parseFloat(document.getElementById(prefix + 'Metal2Valuation').value)).toFixed(2);
    }
}
/***********END Code To add itemsaleSuppRateCut @Author: GAUR14DEC16***************/

/***********START Code To add itemsaleSuppRateCut @Author: GAUR16DEC16***************/
function deleteSuppAllTransList(transId, suppId, utransType, count) {
    if (parseFloat(document.getElementById("invoiceRow" + count).value) > 0) {
        alert('You can not delete this Item');
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
        if (confirm_box == true)
        {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    if (utransType == 'SuppPayment')
                        document.getElementById("suppHomeDiv").innerHTML = xmlhttp.responseText;
                    else
                        document.getElementById("mainMiddleCustHome").innerHTML = xmlhttp.responseText;
//                    closeMessDiv('messDisplayDiv', 'DELETED');
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            xmlhttp.open("GET", "include/php/ogspmdel" + default_theme + ".php?transId=" + transId + "&suppId=" + suppId, true);
            xmlhttp.send();
        }
    }
}
/***********END Code To add itemsaleSuppRateCut @Author: GAUR16DEC16***************/

function labelsPurFormSubmit(fieldName, fontSize, count) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (fieldName != 'firmPurLeftLogoCheck' && fieldName != 'firmPurRightLogoCheck' && fieldName != 'designPur' && fontSize == '') {
        alert("Please Enter Font Size !");
        document.getElementById('fontSize' + count).focus();
    } else {
        closeMessDiv('cuMessDisplayDiv', 'UPDATED');
        return true;
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    return false;
}


function labelsPurForm(count, labelType, fieldName, fieldValue, fontSize, fontColor, divId, display) {
    if (display == 'NO' || divId == 'tncPurDiv' || divId == 'authPurSignLbDiv' || divId == 'invPurTitleDiv' || fieldName == 'formPurBorderCheck' || divId == 'footerPurLbDiv') {
        var check = document.getElementById("fontCheckId" + count).checked;
    }
    if (fieldName != 'firmPurLeftLogoCheck' && fieldName != 'firmPurRightLogoCheck' && fieldName != 'designPur' && divId != '' && fontSize == '') {
        alert("Please Enter Font Size !");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                document.getElementById("cuMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>UPDATED</span>";
                window.setTimeout(closeMessDetails, 1500);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omcpfoad" + default_theme + ".php?labelType=" + labelType + "&count=" + count + "&fieldName=" + fieldName + "&fieldValue=" + fieldValue + "&fontSize=" + fontSize +
                "&fontColor=" + fontColor + "&fieldCheck=" + check + "&panel=CustomizedFormMainPanel", true);
        xmlhttp.send();
    }
    function closeMessDetails()
    {
        document.getElementById("cuMessDisplayDiv").innerHTML = "";
    }
}
function openPurFormDiv(divId, count, display, labelId, fieldName, fieldValue, fontSize, fontColor, fieldCheck, inputWidth, labelType, topMargin, leftMargin) {
    fieldValue = encodeURIComponent(fieldValue);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            document.getElementById('fontSize' + count).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcpufmd" + default_theme + ".php?divId=" + divId + "&count=" + count + "&display=" + display + "&labelId=" + labelId + "&labelType=" + labelType + "&fieldName=" + fieldName
            + "&fieldValue=" + fieldValue + "&inputWidth=" + inputWidth + "&fontSize=" + fontSize + "&fontColor=" + fontColor + "&fieldCheck=" + fieldCheck + "&topMargin=" + topMargin + "&leftMargin=" + leftMargin, true);
    xmlhttp.send();
}


//START add function for sell @Author:GAUR20DEC16

function labelsSellFormSubmit(fieldName, fontSize, count) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (fieldName != 'firmPurLeftLogoCheck' && fieldName != 'firmPurRightLogoCheck' && fieldName != 'designPur' && fontSize == '') {
        alert("Please Enter Font Size !");
        document.getElementById('fontSize' + count).focus();
    } else {
        closeMessDiv('cuMessDisplayDiv', 'UPDATED');
        return true;
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    return false;
}


function labelsSellForm(count, labelType, fieldName, fieldValue, fontSize, fontColor, divId, display) {
    if (display == 'NO' || divId == 'tncPurDiv' || divId == 'authPurSignLbDiv' || divId == 'invPurTitleDiv' || fieldName == 'formPurBorderCheck' || divId == 'footerPurLbDiv') {
        var check = document.getElementById("fontCheckId" + count).checked;
    }
    if (fieldName != 'firmPurLeftLogoCheck' && fieldName != 'firmPurRightLogoCheck' && fieldName != 'designPur' && divId != '' && fontSize == '') {
        alert("Please Enter Font Size !");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                document.getElementById("cuMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>UPDATED</span>";
                window.setTimeout(closeMessDetails, 1500);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omcsfoad" + default_theme + ".php?labelType=" + labelType + "&count=" + count + "&fieldName=" + fieldName + "&fieldValue=" + fieldValue + "&fontSize=" + fontSize +
                "&fontColor=" + fontColor + "&fieldCheck=" + check + "&panel=CustomizedFormMainPanel", true);
        xmlhttp.send();
    }
    function closeMessDetails()
    {
        document.getElementById("cuMessDisplayDiv").innerHTML = "";
    }
}
function openSellFormDiv(divId, count, display, labelId, fieldName, fieldValue, fontSize, fontColor, fieldCheck, inputWidth, labelType, topMargin, leftMargin) {
    fieldValue = encodeURIComponent(fieldValue);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            document.getElementById('fontSize' + count).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcsufmd" + default_theme + ".php?divId=" + divId + "&count=" + count + "&display=" + display + "&labelId=" + labelId + "&labelType=" + labelType + "&fieldName=" + fieldName
            + "&fieldValue=" + fieldValue + "&inputWidth=" + inputWidth + "&fontSize=" + fontSize + "&fontColor=" + fontColor + "&fieldCheck=" + fieldCheck + "&topMargin=" + topMargin + "&leftMargin=" + leftMargin, true);
    xmlhttp.send();
}
//
// END add function for sell @Author:GAUR20DEC16
//
// START add function for CUST ALL TARNSACTION @Author:GAUR21DEC16
// START CODE TO ADD ONE PARAMETER IN FUNCTION FOR PAYMENT/RECEIPT PANEL @PRIYANKA-15MAR18
function showCustHomePurchaseDetails(PanelName, userId, payCRDR, PaymentReceiptPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (PanelName == 'SuppPayment') {
                document.getElementById('supplierProductPurchasePanel').innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("custHomeTransDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?transCRDR=" + payCRDR + "&PaymentReceiptPanel=" + PaymentReceiptPanel + "&paymentPanelName=UserPayment&transPanelName=Payment&mainPanelName=userHome&userId=" + userId, true);
    xmlhttp.send();
}
// START CODE TO ADD ONE PARAMETER IN FUNCTION FOR PAYMENT/RECEIPT PANEL @PRIYANKA-15MAR18
// END add function for CUST ALL TARNSACTION @Author:GAUR21DEC16
//
function updateSuppAllTransList(transId, suppId, utransType) {
    if (utransType == 'SuppPayment')
        var uType = 'SuppPaymentUp';
    else
        var uType = 'CustPaymentUp';
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("suppHomePanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogsuppaym" + default_theme + ".php?transId=" + transId + "&userId=" + suppId + "&paymentPanelName=" + uType, true);
    xmlhttp.send();
}
//*****Start code for crystal on supplier purchase:Author:SANT22JAN17
function addSuppPurDetails(suppItemCoun, stockPanelName, suppPurId, utinId, utansMetalType, payStockPanelName) {
    var payStockPanelName = stockPanelName;
    if (stockPanelName == 'InvoicePayUp') {
        stockPanelName = 'InvoicePayment';
    }
    document.getElementById("openLotItemDetDiv").value = 'true';
    document.getElementById("stockPanelSubFormDiv").style.display = 'block';
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubFormDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (stockPanelName == 'InvoicePayment') {
        xmlhttp.open("GET", "include/php/ogadstoc" + default_theme + ".php?" + suppItemCoun + "&stockPanelName=" + stockPanelName + "&suppPurId=" + suppPurId + "&utinId=" + utinId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName, true);
    } else {
        xmlhttp.open("GET", "include/php/ogcraddv" + default_theme + ".php?" + suppItemCoun + "&stockPanelName=" + stockPanelName + "&suppPurId=" + suppPurId + "&utinId=" + utinId, true);
    }
    xmlhttp.send();
}
// START CODE FOR CRYSTAL PURCHASE INVOICE CALCULATION FUNCTION: AUTHOR:SANT06JUN17
function calcCryTotalPurInvPrice() {
//
    var crystalQTY = parseInt(document.getElementById('sttr_quantity').value);
    var crystalGsWt = parseFloat(document.getElementById('sttr_gs_weight').value);
    var crystalGsWtTyp = document.getElementById('sttr_gs_weight_type').value;
    var crystalInvRate = parseFloat(document.getElementById('sttr_purchase_rate').value);
    var crystalRateType = document.getElementById('sttr_purchase_rate_type').value;
    var crystalTax = parseFloat(document.getElementById('sttr_tax').value);
    if (document.getElementById('sttr_item_category').value != '') {
        document.getElementById('sttr_item_pre_id').value = document.getElementById('sttr_item_category').value;
    }

// START CODE TO CALCULATE TOTAL LABOUR CHARGES @PRIYANKA-14JUNE18
    var totalLabCharges = 0;
    var labCharges = document.getElementById('sttr_lab_charges').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;
    if (labCharges != '') {

        if (labChargesType == 'KG') {
            if (crystalGsWtTyp == 'KG')
                totalLabCharges = labCharges;
            else if (crystalGsWtTyp == 'GM')
                totalLabCharges = (labCharges / 1000);
            else
                totalLabCharges = (labCharges / (1000 * 1000));
        } else if (labChargesType == 'GM') {
            if (crystalGsWtTyp == 'KG')
                totalLabCharges = labCharges * 1000;
            else if (crystalGsWtTyp == 'GM')
                totalLabCharges = labCharges;
            else
                totalLabCharges = (labCharges / 1000);
        } else if (labChargesType == 'MG') {
            if (crystalGsWtTyp == 'KG')
                totalLabCharges = labCharges * 1000 * 1000;
            else if (crystalGsWtTyp == 'GM')
                totalLabCharges = labCharges * 1000;
            else
                totalLabCharges = labCharges;
        } else if (labChargesType == 'PP') {
            totalLabCharges = labCharges * crystalQTY;
        }

    }

    document.getElementById('sttr_total_lab_charges').value = parseFloat(totalLabCharges).toFixed(2);
    // END OF CODE TO CALCULATE TOTAL LABOUR CHARGES @PRIYANKA-14JUNE18

    var totalGSWTNRate = 0;
    var totalCrystalTax = 0;
    var finalValuation = 0;
    //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    // START CODE TO MODIFY CONDITIONS & CALCULATION ACCORDINGLY RATE TYPE & GS WEIGHT TYPE @AUTHOR:MADHUREE-31JULY2020 //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    //
    if (crystalRateType == 'KG') { // CRYSTAL RATE TYPE IN KG
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = crystalInvRate * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = (crystalInvRate / 1000) * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalGSWTNRate = (crystalInvRate * 0.0002) * crystalGsWt;
        else
            totalGSWTNRate = (crystalInvRate / (1000 * 1000)) * crystalGsWt;
    } else if (crystalRateType == 'GM') { // CRYSTAL RATE TYPE IN GM
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = crystalInvRate * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = crystalInvRate * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalGSWTNRate = (crystalInvRate * 0.2) * crystalGsWt;
        else
            totalGSWTNRate = (crystalInvRate / 1000) * crystalGsWt;
    } else if (crystalRateType == 'MG') { // CRYSTAL RATE TYPE IN MG
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = crystalInvRate * 1000 * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = crystalInvRate * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalGSWTNRate = (crystalInvRate * 200) * crystalGsWt;
        else
            totalGSWTNRate = crystalInvRate * crystalGsWt;
    } else if (crystalRateType == 'CT') { // CRYSTAL RATE TYPE IN CT
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = ((crystalInvRate / 0.0002) * crystalGsWt);
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = ((crystalInvRate / 0.2) * crystalGsWt);
        else if (crystalGsWtTyp == 'MG') // CRYSTAL WEIGHT TYPE IN MG
            totalGSWTNRate = ((crystalInvRate / 200) * crystalGsWt);
        else
            totalGSWTNRate = crystalInvRate * crystalGsWt;
    } else if (crystalRateType == 'PP') { // CRYSTAL RATE TYPE IN PP 
        totalGSWTNRate = crystalInvRate * crystalQTY; // CRYSTAL VAL 
    } else {
        totalGSWTNRate = crystalInvRate * crystalGsWt;
    }
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO MODIFY CONDITIONS & CALCULATION ACCORDINGLY RATE TYPE & GS WEIGHT TYPE @AUTHOR:MADHUREE-31JULY2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//

// START CODE TO ADD TOTAL LABOUR CHARGES INTO VALUATION @PRIYANKA-14JUNE18
//    if (totalLabCharges != '') {
//        document.getElementById('sttr_valuation').value = (parseFloat(totalGSWTNRate) + parseFloat(totalLabCharges)).toFixed(2);
//    } else {
    document.getElementById('sttr_valuation').value = parseFloat(totalGSWTNRate).toFixed(2);
//    }
    // END OF CODE TO ADD TOTAL LABOUR CHARGES INTO VALUATION @PRIYANKA-14JUNE18

    if (document.getElementById('sttr_valuation').value == 'NaN' || document.getElementById('sttr_valuation').value == '') {
        document.getElementById('sttr_valuation').value = 0;
    }

    if (document.getElementById('sttr_tax').value != '') {

        totalCrystalTax = (parseFloat(document.getElementById('sttr_valuation').value) * (crystalTax / 100));
        document.getElementById('sttr_tot_tax').value = parseFloat(totalCrystalTax).toFixed(2);
        if (document.getElementById('sttr_tot_tax').value == 'NaN') {
            document.getElementById('sttr_tot_tax').value = 0;
        }

// START CODE TO ADD TOTAL LABOUR CHARGES INTO FINAL VALUATION @PRIYANKA-14JUNE18
        finalValuation = (parseFloat(totalCrystalTax) + parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(totalLabCharges)).toFixed(2);
        document.getElementById('sttr_final_valuation').value = parseFloat(finalValuation).toFixed(2);
        // END CODE TO ADD TOTAL LABOUR CHARGES INTO FINAL VALUATION @PRIYANKA-14JUNE18

    } else {
        document.getElementById('sttr_final_valuation').value = (parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(totalLabCharges)).toFixed(2);
    }

    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }
}
// END CODE FOR CRYSTAL PURCHASE INVOICE CALCULATION FUNCTION: AUTHOR:SANT06JUN17

//*****End code for crystal on supplier purchase:Author:SANT22JAN17
//*********Start code open and close popup for supplier add stock:Author:SANT04DEC16
function pop(div) {
    document.getElementById(div).style.display = 'block';
}
function hide(div) {
    document.getElementById(div).style.display = 'none';
}
//*********End code open and close popup for supplier add stock:Author:SANT04DEC16

function searchImitationByAmountRange(obj) {
    if (valSearchImitationByAmountRangeInputs(obj)) {
        var poststr = "startRange=" + encodeURIComponent(document.srch_stock_AmtRange.stockAmtStartRange.value)
                + "&endRange=" + encodeURIComponent(document.srch_stock_AmtRange.stockAmtEndRange.value)
                + "&itemCat=" + encodeURIComponent(document.srch_stock_AmtRange.stockItemCat.value)
                + "&itemName=" + encodeURIComponent(document.srch_stock_AmtRange.stockItemName.value)
                + "&metalWt=" + encodeURIComponent(document.srch_stock_AmtRange.selectMetalWeight.value)
                + "&panelName=jwelleryPanel"; //TO PASS METAL WEIGHT TYPE 

        search_Imitation_by_amt_range('include/php/ogijlimsd' + default_theme + '.php', poststr);
    }
}

function valSearchImitationByAmountRangeInputs(obj) {
    if (validateEmptyField(document.srch_stock_AmtRange.stockAmtStartRange.value, "Please enter start range!") == false) {
        document.srch_stock_AmtRange.stockAmtStartRange.focus();
        return false;
    } else if (validateEmptyField(document.srch_stock_AmtRange.stockAmtEndRange.value, "Please enter end range!") == false)
    {
        document.srch_stock_AmtRange.stockAmtEndRange.focus();
        return false;
    }
    return true;
}
function search_Imitation_by_amt_range(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchImitationByAmtRange;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchImitationByAmtRange() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("stockByAmtRangeGoButt").style.visibility = "visible";
        document.getElementById("jewellerySubPanel").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("stockByAmtRangeGoButt").style.visibility = "hidden";
    }
}
/**********Start code to change div @Author:PRIYA06FEB14*************/


function updateKittyDepAmt(emiPaidDD, emiPaidMM, emiPaidYY, documentRootPath, kittyCustId, kittyId, kittyDepId,
        updateKittyDepAmt, kFirmId, kDOB, kSerialNo, kStartDate, kittyNo, kEndDate, emiStatus) {

    document.getElementById("updateKittyDepAmtCloseButton" + kittyDepId).style.visibility = "hidden";
    document.getElementById("updateKittyDepAmtROIButton" + kittyDepId).style.visibility = "hidden";
    var totEMIAmt = parseFloat(document.getElementById('totEMIAmt' + kittyId).value);
    if (updateKittyDepAmt == '') {
        alert('Please Enter Girvi EMI Amount!');
        document.getElementById("updateKittyDepAmt" + kittyDepId).focus();
    } else if (totEMIAmt < updateKittyDepAmt) {
        alert('Amount should not be greater than total EMI amount!'); //change in line @AUTHOR: AMOL
        document.getElementById("updateKittyDepAmt" + kittyDepId).focus();
    } else {
        confirm_box = confirm("Do you really want to update amount?"); //change in line @AUTHOR: AMOL

        var emiPaidDate = emiPaidDD + ' ' + emiPaidMM + ' ' + emiPaidYY;
        if (confirm_box == true)
        {
            var poststr = "kittyCustId=" + kittyCustId
                    + "&kittyId=" + kittyId
                    + "&kittyDepId=" + kittyDepId
                    + "&updateKittyDepAmt=" + updateKittyDepAmt
                    + "&kFirmId=" + kFirmId
                    + "&kDOB=" + kDOB
                    + "&kSerialNo=" + kSerialNo
                    + "&totEMIAmt=" + totEMIAmt
                    + "&emiPaidDate=" + emiPaidDate
                    + "&kStartDate=" + kStartDate
                    + "&kittyNo=" + kittyNo
                    + "&kEndDate=" + kEndDate
                    + "&emiStatus=" + emiStatus;
            // alert(poststr);
            update_kitty_dep_amt(documentRootPath + '/include/php/omktuema' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
        } else {
            document.getElementById("updateKittyDepAmt" + kittyDepId).focus();
        }
    }

    return false;
}

function update_kitty_dep_amt(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertUpdateKittyDepAmt;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertUpdateKittyDepAmt() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//
function calculateMetalRateAmount()
{
    var count = document.getElementById('totalEMI').value;
    //alert('count == ' + count);
    var EmiCount_paid = document.getElementById('kittyEmiCount_paid').value;
    if (EmiCount_paid <= 0 || EmiCount_paid == null || EmiCount_paid == '' || !EmiCount_paid) {
        EmiCount_paid = 1;
    }
    //
    for (var i = 1; i <= EmiCount_paid; i++) {
        var kittyMetalRate = document.getElementById('kittyRateAmt' + i).value;
        if (kittyMetalRate == "" || kittyMetalRate == null)
        {
            alert("Please set metal rate from Setting Panel");
            document.getElementById('kittyRateAmt' + i).focus();
            //location.reload(true);
            return false;
        } else {
            //
            //Checking the length of the entered rate is it 4 or 5 digit //
//        console.log(kittyMetalRate);
            var metal_rate_int_val = parseInt(kittyMetalRate);
            var sttr_metal_type = document.getElementById('kitty_metal_type').value;
            //
            var metal_rate_int_val_length = metal_rate_int_val.toString().length;
            //
            //Setting gold rate and silver rate as per length
            if ((metal_rate_int_val_length == 2 || metal_rate_int_val_length == 3 || metal_rate_int_val_length == 4) &&
                    (sttr_metal_type.toLowerCase() == "gold")) {
                //
                document.getElementById('gmWtInGm').value = parseFloat(1).toFixed(2);
                //
                //
            } else if ((metal_rate_int_val_length == 5 || metal_rate_int_val_length == 6) &&
                    (sttr_metal_type.toLowerCase() == "gold")) {
                //
                document.getElementById('gmWtInGm').value = parseFloat(10).toFixed(2);
                //
                //
            } else if ((metal_rate_int_val_length == 5 || metal_rate_int_val_length == 6) &&
                    (sttr_metal_type.toLowerCase() == 'silver')) {
                //
                document.getElementById('srGmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
                //
                //
            } else if ((metal_rate_int_val_length == 2 || metal_rate_int_val_length == 3 || metal_rate_int_val_length == 4) &&
                    (sttr_metal_type.toLowerCase() == 'silver')) {
                //
                if (document.getElementById('silverMetalRateby10gm').value == 'yes') {
                    document.getElementById('srGmWtInGm').value = parseFloat(10).toFixed(2);
                    document.getElementById('srGmWtInKg').value = parseFloat(100 * 1).toFixed(2);
                    document.getElementById('srGmWtInMg').value = parseFloat(10000 * 1).toFixed(2);
                } else {
                    document.getElementById('srGmWtInGm').value = parseFloat(1).toFixed(2);
                    document.getElementById('srGmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
                    document.getElementById('srGmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
                }
            }
            //console.log(document.getElementById('gmWtInGm').value);
            //this code ends here
            //
            //
            var gstOnPaidAmt = 0;
            var gstCharges = parseInt(3);
            var kittyEmiAmt = parseFloat(document.getElementById('kittyEmiAmt' + i).value);
            var kittyPaidAmt = parseFloat(document.getElementById('kittyPaidAmt' + i).value);
            var gst_status_check = document.getElementById('kitty_gst_check_status').value;
//        console.log(gst_status_check);
            if (sttr_metal_type != "Cash" && gst_status_check == 'true')
            {
                var kittyChangedPaidAmt = parseFloat(document.getElementById('kittyChangedPaidAmt' + i).value);
            }
            //
            //When kitty paid amount changed change in taxable amount and gst amount
            //Calculate Total amount on GST EMI amount
            if (kittyPaidAmt != "" || kittyPaidAmt != null || kittyPaidAmt > 0)
            {
                if (gst_status_check == 'true')
                {
                    var taxable_paid_amt = parseFloat((kittyPaidAmt * 100) / parseInt(gstCharges + 100)).toFixed(2);
                    gstOnPaidAmt = parseFloat((taxable_paid_amt * gstCharges) / 100);
                    document.getElementById('kittyGSTPaidAmt' + i).value = parseFloat(gstOnPaidAmt).toFixed(2);
                    document.getElementById('kittyChangedPaidAmt' + i).value = parseFloat(taxable_paid_amt).toFixed(2);
                    //
                    if (sttr_metal_type.toLowerCase() == "gold")
                    {
                        kittyMetalWt = parseFloat(kittyChangedPaidAmt / (kittyMetalRate / document.getElementById('gmWtInGm').value)).toFixed(3);
                        document.getElementById('kittyWeightAmt' + i).value = parseFloat(kittyMetalWt).toFixed(3);
//                    console.log(kittyMetalWt);
                    }
                    //
                    if (sttr_metal_type.toLowerCase() == "silver")
                    {
                        kittyMetalWt = parseFloat(kittyChangedPaidAmt / (kittyMetalRate / document.getElementById('srGmWtInKg').value)).toFixed(3);
                        document.getElementById('kittyWeightAmt' + i).value = parseFloat(kittyMetalWt).toFixed(3);
                    }
                } else
                {
                    if (sttr_metal_type.toLowerCase() == "gold")
                    {
                        kittyMetalWt = parseFloat(kittyPaidAmt / (kittyMetalRate / document.getElementById('gmWtInGm').value)).toFixed(3);
                        document.getElementById('kittyWeightAmt' + i).value = parseFloat(kittyMetalWt).toFixed(3);
//                    console.log(kittyMetalWt);
                    }
                    //
                    if (sttr_metal_type.toLowerCase() == "silver")
                    {
                        kittyMetalWt = parseFloat(kittyPaidAmt / (kittyMetalRate / document.getElementById('srGmWtInKg').value)).toFixed(3);
                        document.getElementById('kittyWeightAmt' + i).value = parseFloat(kittyMetalWt).toFixed(3);
//                    console.log("silver rate::"+kittyMetalWt);
                    }
                }
            }
        }

    }

}
//
function changeKittyRateAmount(kittyNo) {
    //Checking the length of the entered rate is it 4 or 5 digit //
    var kittyMetalRate = document.getElementById('kittyRateAmt' + kittyNo).value;
    var metal_rate_int_val = parseInt(kittyMetalRate);
    var sttr_metal_type = document.getElementById('kitty_metal_type').value;
    //
    var metal_rate_int_val_length = metal_rate_int_val.toString().length;
    //
    //Setting gold rate and silver rate as per length
    if ((metal_rate_int_val_length == 2 || metal_rate_int_val_length == 3) &&
            (sttr_metal_type.toLowerCase() == "gold")) {
        //
        alert("Entered metal rate is not valid !");
        return false;
        //
        //
    } else if (metal_rate_int_val_length == 4 && (sttr_metal_type.toLowerCase() == "gold")) {
        //
        document.getElementById('gmWtInGm').value = parseFloat(1).toFixed(2);
    } else if ((metal_rate_int_val_length == 5 || metal_rate_int_val_length == 6) &&
            (sttr_metal_type.toLowerCase() == "gold")) {
        //
        document.getElementById('gmWtInGm').value = parseFloat(10).toFixed(2);
        //
        //
    } else if ((metal_rate_int_val_length == 5 || metal_rate_int_val_length == 6) &&
            (sttr_metal_type.toLowerCase() == 'silver')) {
        //
        document.getElementById('srGmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
        //
        //
    } else if ((metal_rate_int_val_length == 2 || metal_rate_int_val_length == 3 || metal_rate_int_val_length == 4) &&
            (sttr_metal_type.toLowerCase() == 'silver')) {
        //
        if (document.getElementById('silverMetalRateby10gm').value == 'yes') {
            document.getElementById('srGmWtInGm').value = parseFloat(10).toFixed(2);
            document.getElementById('srGmWtInKg').value = parseFloat(100 * 1).toFixed(2);
            document.getElementById('srGmWtInMg').value = parseFloat(10000 * 1).toFixed(2);
        } else {
            document.getElementById('srGmWtInGm').value = parseFloat(1).toFixed(2);
            document.getElementById('srGmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
            document.getElementById('srGmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
        }
    }
//    console.log(document.getElementById('gmWtInGm').value);
    //this code ends here
    //
    //
    var gstOnPaidAmt = 0;
    var gstCharges = parseInt(3);
    var kittyEmiAmt = parseFloat(document.getElementById('kittyEmiAmt' + kittyNo).value);
    var kittyPaidAmt = parseFloat(document.getElementById('kittyPaidAmt' + kittyNo).value);
    var gst_status_check = document.getElementById('kitty_gst_check_status').value;
//    console.log(gst_status_check);
    if (sttr_metal_type != "Cash" && gst_status_check == 'true')
    {
        var kittyChangedPaidAmt = parseFloat(document.getElementById('kittyChangedPaidAmt' + kittyNo).value);
    }
    //

    // if( kittyEmiAmt < kittyPaidAmt){
    //     alert("PAID AMMOUTN MUST BE LESS or EQUAL TO EMI AMMOUNT");
    //     var kittyPaidAmt = document.getElementById('kittyPaidAmt'+ kittyNo).value = '';
    //     return kittyPaidAmt;
    // }
//When kitty paid amount changed change in taxable amount and gst amount
    //Calculate Total amount on GST EMI amount
    if (kittyPaidAmt != "" || kittyPaidAmt != null || kittyPaidAmt > 0)
    {
        if (gst_status_check == 'true')
        {
            var taxable_paid_amt = parseFloat((kittyPaidAmt * 100) / parseInt(gstCharges + 100)).toFixed(2);
            gstOnPaidAmt = parseFloat((taxable_paid_amt * gstCharges) / 100);
            document.getElementById('kittyGSTPaidAmt' + kittyNo).value = parseFloat(gstOnPaidAmt).toFixed(2);
            document.getElementById('kittyChangedPaidAmt' + kittyNo).value = parseFloat(taxable_paid_amt).toFixed(2);
            //
            if (sttr_metal_type.toLowerCase() == "gold")
            {
                kittyMetalWt = parseFloat(taxable_paid_amt / (kittyMetalRate / document.getElementById('gmWtInGm').value)).toFixed(3);
                document.getElementById('kittyWeightAmt' + kittyNo).value = parseFloat(kittyMetalWt).toFixed(3);
//                console.log(kittyMetalWt);
            }
            //
            if (sttr_metal_type.toLowerCase() == "silver")
            {
                kittyMetalWt = parseFloat(kittyChangedPaidAmt / (kittyMetalRate / document.getElementById('srGmWtInKg').value)).toFixed(3);
                document.getElementById('kittyWeightAmt' + kittyNo).value = parseFloat(kittyMetalWt).toFixed(3);
            }
        } else
        {
            if (sttr_metal_type.toLowerCase() == "gold")
            {
                kittyMetalWt = parseFloat(kittyPaidAmt / (kittyMetalRate / document.getElementById('gmWtInGm').value)).toFixed(3);
                document.getElementById('kittyWeightAmt' + kittyNo).value = parseFloat(kittyMetalWt).toFixed(3);
//                console.log(kittyMetalWt);
            }
            //
            if (sttr_metal_type.toLowerCase() == "silver")
            {
                kittyMetalWt = parseFloat(kittyPaidAmt / (kittyMetalRate / document.getElementById('srGmWtInKg').value)).toFixed(3);
                document.getElementById('kittyWeightAmt' + kittyNo).value = parseFloat(kittyMetalWt).toFixed(3);
            }
        }
    }
// calShemeFinWeight(kittyNo);
// calShemeFinRate(kittyNo);
}
//
function calculateFinalBonusAmt()
{
    if (typeof (document.getElementById('bounsAmt')) != 'undefined' &&
            (document.getElementById('bounsAmt') != null))
    {
        if (document.getElementById('bounsAmt').value != "" || document.getElementById('bounsAmt').value != null)
        {
            bounsAmt = parseFloat(document.getElementById('bounsAmt').value).toFixed(2);
            var total_delay_days = document.getElementById('kitty_total_late_days').value;
//            console.log(total_delay_days);
            var kitty_late_fee_days = document.getElementById('kitty_late_fee_days').value;
//            console.log(kitty_late_fee_days);
            var kitty_emi_late_fee = document.getElementById('kitty_emi_late_fee').value;
//            console.log(kitty_emi_late_fee);
            if (parseInt(total_delay_days) > parseInt(kitty_late_fee_days))
            {
                var ch_bonus_amt = parseFloat(bounsAmt) - parseFloat((bounsAmt * kitty_emi_late_fee) / 100);
//                console.log("ln 8818"+ch_bonus_amt);
            } else
            {
                ch_bonus_amt = parseFloat(bounsAmt);
//                console.log("ln 8823"+ch_bonus_amt);
            }

        } else if (document.getElementById('bounsAmt').value == 'NaN') {
            bounsAmt = 0;
            ch_bonus_amt = 0;
        }
    }
    //
//    if(ch_bonus_amt == 0 || ch_bonus_amt == null || ch_bonus_amt == 'NaN' || !ch_bonus_amt){
//        ch_bonus_amt = document.getElementById('kittyBonusAmtHidden').value;
//    }
    //
    document.getElementById('bounsAmt').value = parseFloat(ch_bonus_amt).toFixed(2);
}
//
function calSchemePaidAmt(kittyNo, dateOptStr,nepaliDateIndicator='') {
    var count = document.getElementById('totalEMI').value;
    var totalPaidRateAmt = 0;
    var totalPaidDiscountAmt = 0;
    var totalAmt = 0;
    var bounsAmt = 0;
    var paidEmiCount = 0;
//    alert('count == ' + count);

    for (var i = 1; i <= count; i++) {

//alert('i @@==  ' + i);

//alert('kittyDepEMIStatus ==  ' + document.getElementById('kittyDepEMIStatus' + i).value);

        if (document.getElementById('kittyDepEMIStatus' + i).value == 'Paid' ||
                document.getElementById('kittyDepEMIStatus' + i).value == 'Payment') {
            paidEmiCount++;
//            alert('i ##==  ' + i);
//            alert('kittyPaidAmt ==  ' + document.getElementById('kittyPaidAmt' + i).value);
//            alert('kittyDiscountPaidAmt ==  ' + document.getElementById('kittyDiscountPaidAmt' + i).value);

            totalPaidRateAmt += parseFloat(document.getElementById('kittyPaidAmt' + i).value);
//            totalPaidDiscountAmt += parseFloat(document.getElementById('kittyDiscountPaidAmt' + i).value);
//            alert('totalPaidRateAmt == ' + totalPaidRateAmt);
//            alert('totalPaidRateAmt == ' + totalPaidDiscountAmt);

        }
        totalAmt += parseFloat(document.getElementById('kittyEmiAmt' + i).value);
    }
//alert(paidEmiCount);
//    alert('totalPaidRateAmt == ' + totalPaidRateAmt);
//    alert('totalPaidDiscountAmt == ' + totalPaidDiscountAmt);
//alert('totalAmt == ' + totalAmt);


    document.getElementById('totalPaidAmt').value = parseFloat(totalPaidRateAmt).toFixed(2);
//
    if (typeof (document.getElementById('bounsAmt')) != 'undefined' &&
            (document.getElementById('bounsAmt') != null))
    {
        if (document.getElementById('bounsAmt').value != "" || document.getElementById('bounsAmt').value != null)
        {
            bounsAmt = parseFloat(document.getElementById('bounsAmt').value).toFixed(2);


        } else if (document.getElementById('bounsAmt').value == 'NaN') {
            bounsAmt = 0;
        }
    }
//
    if (typeof (document.getElementById('discAmt')) != 'undefined' &&
            (document.getElementById('discAmt') != null))
    {
        totalPaidDiscountAmt = parseFloat(document.getElementById('discAmt').value).toFixed(2);
        if (totalPaidDiscountAmt == 'NaN') {
            totalPaidDiscountAmt = 0;
        }
    }

    //console.log(reciptCheckDis + "*****" + recDisCount);
    document.getElementById('totalAmt').value = parseFloat(totalAmt).toFixed(2);
    document.getElementById('totalPaidDepositAmt').value = parseFloat(totalPaidRateAmt).toFixed(2);
    if (typeof (document.getElementById('reciptCheckDis')) != 'undefined' &&
            (document.getElementById('reciptCheckDis') != null))
    {
        var reciptCheckDis = document.getElementById('reciptCheckDis').value;
    }
    //
    if (typeof (document.getElementById('recDisCount')) != 'undefined' &&
            (document.getElementById('recDisCount') != null))
    {
        var recDisCount = document.getElementById('recDisCount').value;
    }
    //
    if ((recDisCount < reciptCheckDis && reciptCheckDis > 0))
    {
        document.getElementById('totalPaidDiscountAmt').value = totalPaidDiscountAmt;
    }

    document.getElementById('discAmt').value = totalPaidDiscountAmt;
    document.getElementById('amtLeft').value = parseFloat(totalAmt - totalPaidRateAmt - totalPaidDiscountAmt).toFixed(2);
    if (bounsAmt == 'NaN' || bounsAmt == "" || bounsAmt == null)
    {
        bounsAmt = 0;
        document.getElementById('bounsAmt').value = bounsAmt;
    }

    // GET DIFFERENCE OF TODAY DATE AND MATURITY DATE
//    var maturityDateDay = document.getElementById("DOBMaturityDay").value;
//    var maturityDateMMM = document.getElementById("DOBMaturityMonth").value;
//    var maturityDateYY = document.getElementById("DOBMaturityYear").value;
//    var maturityDateStr = document.getElementById("DOBMaturityDay").value + ' ' + document.getElementById("DOBMaturityMonth").value + ', ' + document.getElementById("DOBMaturityYear").value;
//    var maturityDate = new Date(maturityDateStr); // Maturity Date

//    var bonusDateDay = document.getElementById("kittyBonusDateDay").value;
//    var bonusDateMMM = document.getElementById("kittyBonusDateMnth").value;
//    var bonusDateYY = document.getElementById("kittyBonusDateYear").value;
    if(nepaliDateIndicator == 'YES'){
         if (dateOptStr === 'MaturityDate'){
        var bonusDateStr = document.getElementById("DOBMaturityDay1").value + ' ' + document.getElementById("DOBMaturityMonth1").value + ', ' + document.getElementById("DOBMaturityYear1").value;
    } else{
        var bonusDateStr = document.getElementById("kittyBonusDateDay").value + ' ' + document.getElementById("kittyBonusDateMnth").value + ', ' + document.getElementById("kittyBonusDateYear").value;
    }
    }else{
    if (dateOptStr === 'MaturityDate'){
        var bonusDateStr = document.getElementById("DOBMaturityDay").value + ' ' + document.getElementById("DOBMaturityMonth").value + ', ' + document.getElementById("DOBMaturityYear").value;
    } else{
        var bonusDateStr = document.getElementById("kittyBonusDateDay").value + ' ' + document.getElementById("kittyBonusDateMnth").value + ', ' + document.getElementById("kittyBonusDateYear").value;
    }
    }
    var bonusDate = new Date(bonusDateStr); // Maturity Date
    var todayDate = new Date(); // Today Date
    var milliMaturityDate = bonusDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliMaturityDate;
//    alert(datesDiff);

    if (paidEmiCount == count && (datesDiff == 0 || datesDiff > 0)) { //BONUS SHOULD INCLUDE IN FINAL AMOUNT WHEN MATURITY DATE COMPLETE @AUTHOR:SHRI30NOV19
        document.getElementById('finalAmt').value = parseFloat(Number(totalPaidRateAmt) + Number(totalPaidDiscountAmt) + Number(bounsAmt)).toFixed(2);
        document.getElementById('finalBonusAmountToPay').value = parseFloat(bounsAmt).toFixed(2);
    } else if (datesDiff == 0 || datesDiff > 0) {
        document.getElementById('finalAmt').value = parseFloat(Number(totalPaidRateAmt) + Number(totalPaidDiscountAmt) + Number(bounsAmt)).toFixed(2);
        document.getElementById('finalBonusAmountToPay').value = parseFloat(bounsAmt).toFixed(2);
    } else {
        document.getElementById('finalAmt').value = parseFloat(Number(totalPaidRateAmt) + Number(totalPaidDiscountAmt)).toFixed(2);
        document.getElementById('finalBonusAmountToPay').value = 0.00;
    }
}
function calSchemeFinRate(kittyNo) {

    var count = document.getElementById('totalEMI').value;
    var totalPaidRateAmt = 0;
    for (var i = 1; i <= count; i++) {
        if (document.getElementById('kittyDepEMIStatus' + i).value == 'Paid') {
            totalPaidRateAmt += parseFloat(document.getElementById('kittyRateAmt' + i).value);
            document.getElementById('totalFinalRt').value = parseFloat(totalPaidRateAmt).toFixed(2);
        }
    }
}
function calSchemeFinWeight(kittyNo) {
    var count = document.getElementById('totalEMI').value;
    var totalPaidEmiWtAmt = 0;
    for (var i = 1; i <= count; i++) {
        if (document.getElementById('kittyDepEMIStatus' + i).value == 'Paid') {
            totalPaidEmiWtAmt += parseFloat(document.getElementById('kittyWeightAmt' + i).value);
            document.getElementById('totalFinalWT').value = parseFloat(totalPaidEmiWtAmt).toFixed(3);
        }
    }
}
//
//
//Update Scheme 
//
function updatePaymentPanelDisplay(kittyId, kittyCustId, kittyFirmId, transType = '', metalType, totalPaidAmt, totalFinalRt, totalFinalWT,
        utinId, paymentPanelName, kittyRateTot, kittyCloseDay, kittyCloseMonth, kittyCloseYear)
{
    //alert(paymentPanelName);
    var confirm_box = false;
    if (paymentPanelName == 'schemeMetalPayment' && utinId != '')
        confirm_box = confirm("Do you really want to update this scheme?");
    loadXMLDoc();
    if (confirm_box == true || utinId != '') {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("paymentPanelDisplayDiv").innerHTML = xmlhttp.responseText;

            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
    } else {
        document.getElementById("paymentPanelDisplayDiv").innerHTML = xmlhttp.responseText;
        return false;
    }
    //
    var mainPanelName = 'scheme';
    var transPanelName = 'scheme';
    var totalValuation = totalPaidAmt;
    var kittyCloseDate = kittyCloseDay + ' ' + kittyCloseMonth + ' ' + kittyCloseYear;
    var bonusAmount = document.getElementById('finalBonusAmountToPay').value;
    if ((paymentPanelName == '' || paymentPanelName == 'schemeMetalPayment') && utinId == '') {
        var paymentPanelName = 'SchemePayment';
    } else if (utinId != '') {
        var paymentPanelName = 'schemeCashPayUp';
    }

    xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + kittyCustId + "&kittyId=" + kittyId +
            "&firmId=" + kittyFirmId + "&totalPaidAmt=" + totalPaidAmt + "&totalFinalRt=" + totalFinalRt +
            "&totalFinalWT=" + totalFinalWT + "&paymentPanelName=" + paymentPanelName +
            "&metalType=" + metalType + "&suppPayId=" + kittyId + "&mainPanelName=" + mainPanelName +
            "&transPanelName=" + transPanelName + "&totalValuation=" + totalValuation +
            "&utid=" + utinId + "&rtctTot=" + kittyRateTot + "&kittyCloseDate=" + kittyCloseDate + "&kittyPaidBonusAmt=" + bonusAmount + '&transType=' + transType, true);
    xmlhttp.send();
}
//
//
//
function paymentPanelDisplay(kittyId, kittyCustId, kittyFirmId, transType = '', metalType, totalEmiAmt, totalBonusAmt, totalPaidAmt, totalFinalRt, totalFinalWT,
        utinId, paymentPanelName, kittyRateTot, kittyCloseDay, kittyCloseMonth, kittyCloseYear, paymentMode, transactionMode) {

//alert("totalPaidAmt = " + totalPaidAmt);
//alert("SCHEME_PAYMENT = " + SCHEME_PAYMENT); 
//alert("paymentPanelName = " + paymentPanelName); 
//alert("utinId = " + utinId);
    var SchemeOtpOption = document.getElementById('SchemeOtpOption').value;
    var staffId = document.getElementById('loginStaffId').value;
    if (staffId != '' && SchemeOtpOption == 'Yes') {
        if (document.getElementById('user_otp').value == '') {
            alert("Please Enter OTP !");
            return false;
        }
        if (document.getElementById('user_otp').value != document.getElementById('dbOtp').value) {
            document.getElementById("user_otp_validate").innerHTML = "Wrong OTP! Please Try Again !";
            return false;
        }
    }

    var confirm_box = false;
    if (paymentPanelName == 'schemeMetalPayment' && utinId == '')
        confirm_box = confirm("do you really want to close this scheme?");
    loadXMLDoc();
    if (confirm_box == true || utinId != '') {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if ((totalPaidAmt == '' || totalPaidAmt == 0) && paymentPanelName != 'schemeCashPayment') {
                    alert('Please Enter The EMI Amount and Paid');
                } else {
                    document.getElementById("paymentPanelDisplayDiv").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
    } else {
        document.getElementById("paymentPanelDisplayDiv").innerHTML = xmlhttp.responseText;
        return false;
    }

    var mainPanelName = 'scheme';
    var transPanelName = 'scheme';
    if (metalType == "CASH")
    {
        var totalValuation = totalPaidAmt;
    } else
    {
        var totalValuation = totalEmiAmt;
    }

    var kittyCloseDate = kittyCloseDay + ' ' + kittyCloseMonth + ' ' + kittyCloseYear;
    var bonusAmount = document.getElementById('finalBonusAmountToPay').value;
    if ((paymentPanelName == '' || paymentPanelName == 'schemeMetalPayment') && utinId == '') {
        var paymentPanelName = 'SchemePayment';
    } else if (utinId != '') {
        var paymentPanelName = 'schemePayUp';
    }

    xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + kittyCustId + "&kittyId=" + kittyId +
            "&firmId=" + kittyFirmId + "&totalPaidAmt=" + totalPaidAmt + "&totalFinalRt=" + totalFinalRt +
            "&totalFinalWT=" + totalFinalWT + "&paymentPanelName=" + paymentPanelName +
            "&metalType=" + metalType + "&suppPayId=" + kittyId + "&mainPanelName=" + mainPanelName + "&totalEmiAmt=" + totalEmiAmt + "&totalBonusAmt=" + totalBonusAmt +
            "&transPanelName=" + transPanelName + "&totalValuation=" + totalValuation + "&paymentMode=" + paymentMode + "&transactionMode=" + transactionMode +
            "&utid=" + utinId + "&rtctTot=" + kittyRateTot + "&kittyCloseDate=" + kittyCloseDate + "&kittyPaidBonusAmt=" + bonusAmount + '&transType=' + transType, true);
    xmlhttp.send();
}


function schemeInvoice(srNo, kScheme, Ktotaldp, k, kName, kemi)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("schemeInvDispDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }

    };
    xmlhttp.open("POST", "include/php/omSchemeInv" + default_theme + ".php?srNo=" + srNo + "&kScheme=" + kScheme + "&Ktotaldp=" + Ktotaldp + "&kName=" + kName + "&kemi=" + kemi, true);
    xmlhttp.send();
}
function giftValueStatus(kittyId, item)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("kittyUpdateSubmit").style.visibility = "hidden";
            if ((item == '')) {
                alert('Please Select Gift Status');
                return false;
            } else {
                document.getElementById("kittystatus").innerHTML = xmlhttp.responseText;
                alert('Gift Item Delivered Succesfully');
            }
        } else {
            ;
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omktgiftst" + default_theme + ".php?kittyId=" + kittyId + "&item=" + item, true);
    xmlhttp.send();
}
function selBarCodeFormType(custId, girviId, item)
{
    var barCodeTag = 'tail';
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if ((item == '')) {
                alert('Please Select Barcode Format Type');
                return false;
            } else {
                document.getElementById("barcodeStatus").innerHTML = xmlhttp.responseText;
                //alert('Gift Item Delivered Succesfully');
            }
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (item == '24L LOAN') {
        xmlhttp.open("POST", "include/php/olggbcpd" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId, true);
    } else {
        xmlhttp.open("POST", "include/php/olggbc55x13" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId + "&barCodeTag=" + barCodeTag, true);
    }
    xmlhttp.send();
}


// function metalKittyAmt(kittyMetalType, kittyId, kittyCustId, kittyFirmId, totalFinalWT) {
//      // alert(totalFinalWT);
//     loadXMLDoc();
//   xmlhttp.onreadystatechange = function () {
//         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//             document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//             document.getElementById("kittyUpdateCashDiv").innerHTML = xmlhttp.responseText;
//         } else {
//             document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//         }
//     };
//     xmlhttp.open("POST", "include/php/omktuema1"+ default_theme +".php?&kittyCustId=" + kittyCustId + "&kittyId=" + kittyId + "&kittyFirmId=" + kittyFirmId + "&totalFinalWT=" + totalFinalWT + "&kittyMetalType=" + kittyMetalType, true);

//     xmlhttp.send();
//     xmlhttp.onreadystatechange = alertMetalSchemeClose(totalFinalWT);
// }
// function alertMetalSchemeClose(totalFinalWT) {
//    confirm_box = confirm("\nFianally Scheme Are Closing");//change in line @AUTHOR: SANDY28JAN14

//     if (confirm_box == true && totalFinalWT!='')
//     {
//         loadXMLDoc();
//         xmlhttp.onreadystatechange = function () {
//             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                 document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//                 document.getElementById("kittyUpdateCashDiv").innerHTML = xmlhttp.responseText;
//             }
//             else {
//                 document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//             }
//         };
//         // xmlhttp.open("POST", "include/php/omchcsst"+ default_theme +".php?custId=" + custId + "&action=" + action, true);
//         // xmlhttp.send();
//         var hidden = false;

//         hidden = !hidden;
//         if(hidden) {
//             document.getElementById("kittyCashSubmit").style.visibility = "hidden";
//             document.getElementById("kittyMetalSubmit").style.visibility = "hidden";
//         } else {
//             document.getElementById("kittyCashSubmit").style.visibility = "visible";
//             document.getElementById("kittyMetalSubmit").style.visibility = "visible";
//         }
//     }
// }

// start add function delete the data from retail purchase list in datatable @Author:GAUR21MAR17
function deletePurStockListDt(panelName, sttrId, sellPresent) {
//  alert(panelName);
//  alert(sttrId);
//    if (sellPresent > 0) {
//        alert('To Delete,First Delete This Item From Customer Jewellery Panel!');
//        return false;
//    } else {
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
        if (panelName != 'ItemStockList') {
            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
            if (confirm_box_for_stock == true)
            {
                stockDeleteConfirm = 'yes';
            }
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'retailStockPurList' || panelName == 'whsellStockPurList') {
                    document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                    if (panelName == 'ItemStockList')
                        closeMessDiv('messDisplayDivision', 'DELETED');
                    else
                        closeMessDiv('messDisplayDiv', 'DELETED');
                } else {
                    document.getElementById("paymentDiv").innerHTML = xmlhttp.responseText;
                    window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm, true);
        xmlhttp.send();
    }
//    }
}
// END add function delete the data from retail purchase list in datatable @Author:GAUR21MAR17

function showRetailStock(itprId, stockType) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + itprId + "&panelName=StockPayUp" + "&stockType=retailStock", true);
    xmlhttp.send();
}


function addDelStock(sttrId, stockAdd) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    var itemList = document.getElementById('itemList').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogspreadd" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + stockAdd + "&itemList=" + itemList, true);
    xmlhttp.send();
}


function showWhsellStock(itprId, stockType) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + itprId + "&panelName=StockPayUp" + "&stockType=wholeSaleStock", true);
    xmlhttp.send();
}
//****Start code for add function for cust trans history:Author:SANT27MAR17
function searchHistoryEntryByDate(firmId, dd, mm, yyyy, CustId, Todd, Tomm, Toyyyy) {
//    alert('firmId = '+firmId);
//    alert('dd = '+dd);
//    alert('mm = '+mm);
//    alert('yyyy = '+yyyy);
//    alert('CustId = '+CustId);
//    alert('Todd = '+Todd);
//    alert('Tomm = '+Tomm);
//    alert('Toyyyy = '+Toyyyy);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (valJournalEntryDate()) {
                if (CustId == '') {
                    document.getElementById("taxLedgerDetails").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("suppHomePanelSubDiv").innerHTML = xmlhttp.responseText;
                }
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var journalEntryDate = dd + '-' + mm + '-' + yyyy;
    var journalEntryToDate = Todd + '-' + Tomm + '-' + Toyyyy;
    if (CustId == '') {
        xmlhttp.open("POST", "include/php/ogbbtiolbs" + default_theme + ".php?firmId=" + firmId + "&journalEntryDate=" + journalEntryDate + "&dd=" + dd.value + "&mm=" + mm.value + "&yyyy=" + yyyy.value + "&suppPanelName=" + 'transHistory' + "&suppId=" + CustId, true); //change while passing values of date @AUTHOR: SANDY20AUG13
    } else {
        xmlhttp.open("POST", "include/php/ogwsprdt" + default_theme + ".php?firmId=" + firmId + "&journalEntryDate=" + journalEntryDate + "&dd=" + dd.value + "&mm=" + mm.value + "&yyyy=" + yyyy.value + "&suppPanelName=" + 'transHistory' + "&suppId=" + CustId + "&journalEntryToDate=" + journalEntryToDate + "&Todd=" + Todd.value + "&Tomm=" + Tomm.value + "&Toyyyy=" + Toyyyy.value, true); //change while passing values of date @AUTHOR: SANDY20AUG13
    }

    xmlhttp.send();
}
function getHistoryBookByFrmId(firmId, dd, mm, yyyy, CustId) {
//    alert('firmId='+firmId);
//    alert('dd='+dd);
//    alert('mm='+mm);
//    alert('yyyy='+yyyy);
//    alert('CustId='+CustId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (CustId == '') {
                document.getElementById("taxLedgerDetails").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("suppHomePanelSubDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var journalEntryDate = dd + '-' + mm + '-' + yyyy;
    if (CustId == '') {
        xmlhttp.open("POST", "include/php/ogbbtiolbs" + default_theme + ".php?firmId=" + firmId + "&journalEntryDate=" + journalEntryDate + "&dd=" + dd.value + "&mm=" + mm.value + "&yyyy=" + yyyy.value + "&suppPanelName=" + 'transHistory' + "&suppId=" + CustId, true); //change while passing values of date @AUTHOR: SANDY20AUG13
    } else {
        xmlhttp.open("POST", "include/php/ogwsprdt" + default_theme + ".php?firmId=" + firmId + "&journalEntryDate=" + journalEntryDate + "&dd=" + dd.value + "&mm=" + mm.value + "&yyyy=" + yyyy.value + "&suppPanelName=" + 'transHistory' + "&suppId=" + CustId, true); //change while passing values of date @AUTHOR: SANDY20AUG13
    }

    xmlhttp.send();
}
//****End code for add function for cust trans history:Author:SANT27MAR17
function showSellPurchaseItmDet(custId, preId, default1, default2, postId, default3, default4) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (default1 == 'itemApproval' || default1 == 'itemApprovalRec') {
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//    alert(postId);
//  header('Location: ' . $documentRoot . '/ogHomePage'+ default_theme +'.php?divPanel=OwnerHome&divMainMiddlePanel=SuppHome&suppPanelOption=ItemApprovalRecUp&suppId=' . $suppId .
//                '&panelName=ItemApprovalRecUp&divSubPanel=' . $divSubPanel . '&accDrId=' . $accountId."&utrId=".$sttr_id);
    if (default1 == 'ItemApprovalUp') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&custPanelOption=SellPurchase" + "&mainPanel=ItemApprovalUp" + "&panelName=ItemApprovalUp" + "&divMainMiddlePanel=SellPurchase" +
                "&slPrId=" + preId + "&invoiceNo=" + postId, true);
    } else if (default1 == 'ItemApprovalRecUp') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwhmndv" + default_theme + ".php?suppId=" + custId + "&suppPanelOption=ItemApprovalRecUp&panelName=ItemApprovalRecUp&utrId=" + preId, true);
    } else if (default1 == 'itemApproval' || default1 == 'itemApprovalRec') {
        xmlhttp.open("GET", "include/php/ogcrspst" + default_theme + ".php?panel=" + default1 + "&custId=" + custId, true);
    } else if (default3 == 'XRF') { //add for XRF update panel redirection AUTHOR:DIKSHA04DEC2018
        xmlhttp.open("GET", "include/php/ogxrfdv" + default_theme + ".php?panel=" + default1 + "&custId=" + custId, true);
    } else if (default3 == 'imitation') { //add for IMITATION update panel redirection AUTHOR:DIKSHA19DEC2018
        xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&custPanelOption=SellPurchase" + "&mainPanel=ImitationPurchasePanel" + "&panelName=ImitationSellPayUp" + "&divMainMiddlePanel=ImitationSellPayUp" +
                "&preInvoiceNo=" + preId + "&postInvoiceNo=" + postId, true);
    } else if (default3 == 'strsilver') { //add for STRLLERING update panel redirection AUTHOR:DIKSHA04DEC2018
        xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&custPanelOption=SellPurchase" + "&mainPanel=StrlleringPurchasePanel" + "&panelName=StrlleringSellPayUp" + "&divMainMiddlePanel=StrlleringSellPayUp" +
                "&preInvoiceNo=" + preId + "&postInvoiceNo=" + postId, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&custPanelOption=SellPurchase" + "&mainPanel=ItemPurchase" + "&panelName=SellPayUp" + "&divMainMiddlePanel=SellPayUp" +
                "&preInvoiceNo=" + preId + "&postInvoiceNo=" + postId + "&default3=" + default3 + "&default4=" + default4, true);
    }
    xmlhttp.send();
}
//
//
// *************************************************************************************************************************
// START CODE TO ADD INVOICE DELETE VERIFICATION FUNCTION @SIMRAN:07OCT2023
// *************************************************************************************************************************
function OpenHelpfirm() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalfirmHelp').style.display = 'block';
            document.getElementById('myModalfirmHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omHelpfirm" + default_theme + ".php", true);
    xmlhttp.send();

}
//
//
function openDeleteInvVerificationPopUp(transType, preInvNo, invNo, userId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('deleteInvVerificationPopUp').style.display = "block";
            document.getElementById('deleteInvVerificationPopUp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omDeleteInvpreview" + default_theme + ".php?transType=" + transType + "&preInvNo=" + preInvNo +
            "&invNo=" + invNo + "&userId=" + userId, true);
    xmlhttp.send();
}
//
//
function closedopenDeleteInvVerificationPopUp() {
    document.getElementById('deleteInvVerificationPopUp').style.display = 'none';
}
//
//
function verifyTransPasscode(transPasscode, panelName, utinId, preInvNo, invNo, userId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('deleteInvVerificationPopUp').style.display = "block";
            document.getElementById('deleteInvVerificationPopUp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            //document.getElementById('deleteInvVerificationPopUp').style.display = "none";
        }
    };
    xmlhttp.open("GET", "include/php/omDeleteInvPreviewPopUp" + default_theme + ".php?transPasscode=" + transPasscode + "&panelName=" + panelName +
            "&utinId=" + utinId + "&preInvNo=" + preInvNo + "&invNo=" + invNo + "&userId=" + userId, true);
    xmlhttp.send();
}
//
// *************************************************************************************************************************
// END CODE TO ADD INVOICE DELETE VERIFICATION FUNCTION @SIMRAN:07OCT2023
// *************************************************************************************************************************
// 
// 
let selectedItems = []; // Array to store selected values
// START OF CODE FOR DELETE INVOICE
function deleteInvoice(panelName, utinId, PreInvoice, invoiceNo) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    if (typeof (document.getElementById('panel')) != 'undefined' &&
            (document.getElementById('panel') != null)) {
        var panel = document.getElementById('panel').value;
    } else {
        var panel = '';
    }
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Invoice?");
    if (confirm_box == true) {
        var stockDeleteConfirm = '';
        if (panelName == 'soldOutInv' || panelName == 'soldOutImtList') {
//            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to add this Item into Stock?");
//            if (confirm_box_for_stock == true) {
            stockDeleteConfirm = 'yes';
//            } else {
//                stockDeleteConfirm = 'no';
//            }
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'soldOutInv' || panelName == 'soldOutImtInv' || panelName == 'soldOutStrInv') {
                    document.getElementById("itemSoldInvoiceDiv").innerHTML = xmlhttp.responseText;
                    document.getElementById('deleteInvVerificationPopUp').style.display = "none";
                } else {
                    document.getElementById("sellPurchaseList").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        if (panel == 'ItemEstimate') {
            xmlhttp.open("POST", documentRootPath + "/include/php/omogspidel" + default_theme + ".php?panelName=" + panelName +
                    "&utinId=" + utinId + "&stockDeleteConfirm=" + stockDeleteConfirm +
                    "&PreInvoice=" + PreInvoice + "&invoiceNo=" + invoiceNo + "&panel=" + panel, true);
            xmlhttp.send();
        }
        if (panel == 'deleteSoldOutItemList') {
            xmlhttp.open("POST", documentRootPath + "/include/php/omogspidel" + default_theme + ".php?panelName=" + panelName +
                    "&utinId=" + utinId + "&stockDeleteConfirm=" + stockDeleteConfirm +
                    "&PreInvoice=" + PreInvoice + "&invoiceNo=" + invoiceNo + "&panel=" + panel, true);
            xmlhttp.send();
        } else {
            xmlhttp.open("POST", documentRootPath + "/include/php/omogspidel" + default_theme + ".php?panelName=" + panelName +
                    "&utinId=" + utinId + "&stockDeleteConfirm=" + stockDeleteConfirm +
                    "&PreInvoice=" + PreInvoice + "&invoiceNo=" + invoiceNo, true);
            xmlhttp.send();
        }
    }
}
//END OF CODE FOR DELETE INVOICE
//
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//******** START CODE FOR DELETE RETURN LIST ITEM @SIMRAN:10JAN2024******************************//
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function deleteReturnItemList(panelName, sttrId) {
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item Permanently?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
        var stockDelete = 'Y';
        if (panelName != 'ItemStockList' && stockDelete == 'Y') {
            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
            if (confirm_box_for_stock == true)
            {
                stockDeleteConfirm = 'yes';
            }
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sellPurchaseList").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm, true);
        xmlhttp.send();
    }
}
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//******** END CODE FOR DELETE RETURN LIST ITEM @SIMRAN:10JAN2024******************************//
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//
//********Start code for create function for fincance work:Author:SANT03APR17
function custAddFinance(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "custId=" + custId
            + "&firmId=" + encodeURIComponent(document.getElementById("custFirmId").value)
            + "&custType=" + encodeURIComponent(document.getElementById("custType").value);
    add_new_girvi('include/php/olgacang_1' + default_theme + '.php', poststr);
}
//
//********End code for create function for fincance work:Author:SANT03APR17
//
//
//********Start code for delete function for deleted stock list work:Author:simran21oct2021
//
function deleteDeletedStockList(panelName, sttrId, stockType, itemName, operation) {
    //alert(itemName);
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item Permanently?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
//        var stockDelete = document.getElementById("stockDelete").value;
        if (panelName == 'deletedStockList ' && operation == 'delete') {
            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
            if (confirm_box_for_stock == true) {
                stockDeleteConfirm = 'yes';
                //closeBANKPopUp();
                if (document.getElementById("rfid-modal")) {
                    document.getElementById("rfid-modal").style.display = "none";
                }
            } else {
                stockDeleteConfirm = 'no';
                document.getElementById("rfid-modal").style.display = "none";
            }
        }

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("userListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omsttrandel" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm + "&stockType=" + stockType + "&itemName=" + itemName + "&operation=" + operation, true);
        xmlhttp.send();
    }
}

//
//********End code for delete function for deleted stock list work:Author:simran21oct2021
//
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXx
//****************START CODE FOR ADDED DELETE ALL DELETED STOCK @SIMRAN:01DEC2023***********************************//
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXx
function deleteAllDeletedStock(panelName) {
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item Permanently?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
//        var stockDelete = document.getElementById("stockDelete").value;
        if (panelName == 'deleteDeletedAllStockList') {
            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
            if (confirm_box_for_stock == true) {
                stockDeleteConfirm = 'yes';
                //closeBANKPopUp();
                if (document.getElementById("rfid-modal")) {
                    document.getElementById("rfid-modal").style.display = "none";
                }
            } else {
                stockDeleteConfirm = 'no';
                document.getElementById("rfid-modal").style.display = "none";
            }
        }

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("userListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?panelName=" + panelName, true);
        xmlhttp.send();
    }
}

//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXx
//****************END CODE FOR ADDED DELETE ALL DELETED STOCK @SIMRAN:01DEC2023**********************************//
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXx
//let selectedItems = []; // Array to store selected values
function soldoutDeletedInv(panelName,sttrId) {
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item Permanently?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("soldoutDeletedList").innerHTML = xmlhttp.responseText;
                selectedItems = [];
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?panelName=" + panelName + "&sttrId=" + sttrId, true);
        xmlhttp.send();
    }
}
//Start code for single single click and DELETED SOLD OUT ITEM LIST  | ITEM ESTIMATE INVOICE 
function selectedMultipleItems(checkbox) {
    // Get the value of the clicked checkbox
    const value = checkbox.value;
    if (checkbox.checked) {
        // Add the value to the array if checked
        if (!selectedItems.includes(value)) {
            selectedItems.push(value);
        }
    } else {
        // Remove the value from the array if unchecked
        const index = selectedItems.indexOf(value);
        if (index > -1) {
            selectedItems.splice(index, 1);
        }
    }
}
//End code for single single click and DELETED SOLD OUT ITEM LIST  | ITEM ESTIMATE INVOICE 

// Start code for DELETED SOLD OUT ITEM LIST
function delMultipleInv() {
     // Send the selected items to the server
     xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?panelName=soldOutDeletedList" + "&selectedItems=" + selectedItems, true);
     xmlhttp.send();
}
// End code for DELETED SOLD OUT ITEM LIST


// Start code for single single estimate invoice delete
function delMultipleEstimateInv() {
    var stockDeleteConfirm = 'yes';
    var documentRootPath = document.getElementById('documentRootPath').value;
  
    xmlhttp.open("POST", documentRootPath + "/include/php/omogspimuldel" + default_theme + ".php?panelName=soldOutInv" + "&selectedItems=" + selectedItems + "&stockDeleteConfirm=" + stockDeleteConfirm + "&panel=ItemEstimate", true);
    xmlhttp.send();
    selectedItems = [];
}
// End code for single single estimate invoice delete
// 
// 
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXx
//****************Start code All check box select and delete for estimate delete invoice**********************************//
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXx
let selectedAllValues = [];

function selecteAllItems(checkbox) {
    let value = checkbox.value;

    if (checkbox.checked) {
        // Add to array if not already present
        if (!selectedAllValues.includes(value)) {
            selectedAllValues.push(value);
        }
    } else {
        // Remove from array if unchecked
        selectedAllValues = selectedAllValues.filter(item => item !== value);
    }

//    console.log("Selected values:", selectedAllValues);
}
// Function to select/deselect all checkboxes
function toggleSelectAll(mainCheckbox) {
    let isChecked = mainCheckbox.checked;
    selectedAllValues = []; // Reset array

    document.querySelectorAll(".delCheck").forEach(checkbox => {
        checkbox.checked = isChecked;
        if (isChecked) {
            selectedAllValues.push(checkbox.value);
        }
    });

//    console.log("Selected values:", selectedAllValues);
}

function delAllEstimateInv() {
    var stockDeleteConfirm = 'yes';
    var documentRootPath = document.getElementById('documentRootPath').value;
  
    xmlhttp.open("POST", documentRootPath + "/include/php/omogspimuldel" + default_theme + ".php?panelName=soldOutInv" + "&selectedItems=" + selectedAllValues + "&stockDeleteConfirm=" + stockDeleteConfirm + "&panel=ItemEstimate", true);
    xmlhttp.send();
    selectedItems = [];
}
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXx
//****************End code All check box select and delete for estimate delete invoice**********************************//
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXx
function deleteCrystalStockList(panelName, sttrId, stockType, itemCategory, metalType, itemName) {

    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
        var stockDelete = document.getElementById("stockDelete").value;
        if (panelName != 'ItemStockList' && stockDelete == 'Y') {
            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
            if (confirm_box_for_stock == true) {
                stockDeleteConfirm = 'yes';
            } else {
                stockDeleteConfirm = 'no';
            }
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm + "&stockType=" + stockType + "&itemName=" + itemName + "&itemCategory=" + itemCategory + "&metalType=" + metalType, true);
        xmlhttp.send();
    }
}
function deleteImitationItemFromStockList(panelName, sttrId, stockType, metalType, itemCategory, itemName) {
//alert(panelName);
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
        var stockDelete = document.getElementById("stockDelete").value;
        if (panelName != 'ItemStockList' && stockDelete == 'Y') {
            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
            if (confirm_box_for_stock == true) {
                stockDeleteConfirm = 'yes';
            } else {
                stockDeleteConfirm = 'no';
            }
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockListSubDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm + "&stockType=" + stockType + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName, true);
        xmlhttp.send();
    }
}
function deleteItemImitationStockList(panelName, sttrId, stockType, itemCategory, metalType, utinId, formName, deletereason) {
//alert(panelName);
// Check if deletion requires a reason
    if (deletereason === 'YES') {
        var deleteReason = prompt("Please provide a reason for deleting this item:");

        // If no reason is provided, prevent deletion
        if (deleteReason === null || deleteReason.trim() === "") {
            alert("You must provide a reason for deletion.");
            return false;
        }
    }
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
        var stockDelete = document.getElementById("stockDelete").value;
        if (panelName != 'ItemStockList' && stockDelete == 'Y') {
            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
            if (confirm_box_for_stock == true)
            {
                stockDeleteConfirm = 'yes';
            }
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addStockPanelFormMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        if (panelName == 'ImitationStockInvoice') {
            xmlhttp.open("GET", "ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm + "&stockType=" + stockType + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&utinId=" + utinId + "&deleteReason=" + encodeURIComponent(deleteReason), true);
        } else {
            // ADD THIS FORMNAME FOR RETAIL_IMITATION_B3 FORM @SHRIKANT 22022023
            xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm + "&stockType=" + stockType + "&itemCategory=" + itemCategory + "&formName=" + formName + "&metalType=" + metalType + "&deleteReason=" + encodeURIComponent(deleteReason), true);
        }

        xmlhttp.send();
    }
}
//*************************START CODE TO ADD FUNCTION FOR STRELLERING SILVER DELETE AUTHOR:DIKSHA09OCT2018
function deleteItemstrsilverList(panelName, sttrId, stockType, itemCategory, metalType, utinId, deletereason) {
//alert(panelName);
 // Check if a delete reason is required
    if (deletereason === 'YES') {
        var deleteReason = prompt("Please provide a reason for deleting this item:");

        // If no reason is provided, prevent deletion
        if (deleteReason === null || deleteReason.trim() === "") {
            alert("You must provide a reason for deletion.");
            return false;
        }
    }
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
        var stockDelete = document.getElementById("stockDelete").value;
        if (panelName != 'ItemStockList' && stockDelete == 'Y') {
            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
            if (confirm_box_for_stock == true)
            {
                stockDeleteConfirm = 'yes';
            }
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addStockPanelFormMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        if (panelName == 'StrelleringSilver') {
            xmlhttp.open("GET", "ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm + "&stockType=" + stockType + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&utinId=" + utinId + "&deleteReason=" + encodeURIComponent(deleteReason), true);
        } else {
            xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm + "&stockType=" + stockType + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&deleteReason=" + encodeURIComponent(deleteReason), true);
        }

        xmlhttp.send();
    }
}
//*************************END CODE TO ADD FUNCTION FOR STRELLERING SILVER DELETE AUTHOR:DIKSHA09OCT2018
// START code to create function for stock delete Author:PRIYANKA-08-07-17
function deleteStockList(panelName, sttrId, stockType, itemCategory, metalType, itemName) {

    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
        var stockDelete = document.getElementById("stockDelete").value;
        if (panelName != 'ItemStockList' && stockDelete == 'Y') {
            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
            if (confirm_box_for_stock == true) {
                stockDeleteConfirm = 'yes';
            } else {
                stockDeleteConfirm = 'no';
            }
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm + "&stockType=" + stockType + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName, true);
        xmlhttp.send();
    }
}
// END code to create function for stock delete Author:PRIYANKA-08-07-17
// 
///purchase delete datatable fn changed by @auth:athu8JUN17
//purchase delete datatable fn changed by Aakanksha R on 29/12/22
function deletePurchaseList(panelName, sttrId, stockType, status, deletereason) {
    if(status == 'SOLDOUT'){
             confirm_box = confirm(deleteItemAlertMess + "\n\nYou can't delete this item because this item is already SOLDOUT!");
             return false;
        }
        // Check if a delete reason is required (based on 'deletereason' passed from PHP)
    var deleteReason = '';
    if (deletereason === 'YES') {
        deleteReason = prompt("Please provide a reason for deleting this item:");
        
        // If no reason is provided, prevent deletion
        if (deleteReason === null || deleteReason.trim() === "") {
            alert("You must provide a reason for deletion.");
            return false;
        }
    }
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
        var stockDelete = document.getElementById("stockDelete").value;
        if (panelName != 'ItemStockList' && stockDelete == 'Y') {
            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
            if (confirm_box_for_stock == true) {
                stockDeleteConfirm = 'yes';
                //closeBANKPopUp();
                if (document.getElementById("rfid-modal")) {
                    document.getElementById("rfid-modal").style.display = "none";
                }
            } else {
                if(panelName == 'FineStock' || panelName == 'AllStock'){
                     stockDeleteConfirm = 'yes';
                }else{
                     stockDeleteConfirm = 'no';
                 }
            }
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'retailStockPurList' || panelName == 'AllWholesaleStock' || panelName == 'whsellStockPurList' || panelName == 'Stock' || panelName == 'FineStock' || panelName == 'Imitation' || panelName == 'imitationPurchaseList' || panelName == 'Crystal' || panelName == 'ImitationList' || panelName == 'CrystalList' || panelName == 'AllStock' || panelName == 'StrelleringSilverList' || panelName == 'Strellering' || panelName == 'AvailStockListWithZeroQty' 
                        || panelName == 'AllTagStock' || panelName == 'CrystalretailStock' || panelName == 'CrystalrwholesaleStock' || panelName == 'ImitationTagList') {
                    document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'StockTallyByTable') {
                    document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("paymentDiv").innerHTML = xmlhttp.responseText;
                    window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm + "&stockType=" + stockType + "&deleteReason=" + encodeURIComponent(deleteReason), true);
        xmlhttp.send();
    }
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO DELETE STOCK TALLY WITH TABLE ITEM @AUTHOR:SIMRAN-03MAY2023 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function deleteStockTallyWithTablesList(panelName, sttrId, stockType, panelName1, panelName2, panelName3) {
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
        var stockDelete = document.getElementById("stockDelete").value;
        if (panelName != 'ItemStockList' && stockDelete == 'Y') {
            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
            if (confirm_box_for_stock == true) {
                stockDeleteConfirm = 'yes';
                //closeBANKPopUp();
                if (document.getElementById("rfid-modal")) {
                    document.getElementById("rfid-modal").style.display = "none";
                }
            } else {
                stockDeleteConfirm = 'no';
            }
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName1 == 'StockTallyByTable') {
                    document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&stockDelete=" + stockDelete + "&panelName1=" + panelName1 + "&stockDeleteConfirm=" + stockDeleteConfirm + "&stockType=" + stockType, true);
        xmlhttp.send();
    }
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO DELETE STOCK TALLY WITH TABLE ITEM @AUTHOR:SIMRAN-03MAY2023 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO DELETE STOCK LOT TO TAG ITEM @AUTHOR:SIMRAN-10JULY2023                   //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function deletestockLotTotagList(panelName, sttrId, stockTableId, utinId, utransInvId) {
    //
    //alert('panelName == ' + panelName);
    //alert('sttrId == ' + sttrId);
    //alert('stockTableId == ' + stockTableId);
    //alert('utinId == ' + utinId);
    //alert('utransInvId == ' + utransInvId);
    //    
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    //
    if (confirm_box == true) {
        if (panelName != 'ItemStockList') {
            var stockDeleteConfirm = 'yes';
            var stockDelete = 'Y';
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainAddStockDiv").innerHTML = xmlhttp.responseText;
                closeMessDiv('messDisplayDiv', 'DELETED');
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("GET", "ogwaldel" + default_theme + ".php?panelName=" + panelName + "&sttrId=" + sttrId + "&stockDelete=" + stockDelete +
                "&stockDeleteConfirm=" + stockDeleteConfirm +
                "&stockType=retail&mainPanel=StockInvoice" + "&utinId=" + utinId, true);
        //
        xmlhttp.send();
        //
    }
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO DELETE STOCK LOT TO TAG ITEM @AUTHOR:SIMRAN-10JULY2023                   //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
 function deleteImitstockLotTotagList(panelName, sttrId, stockTableId, utinId, utransInvId) {
    //
    //alert('panelName == ' + panelName);
    //alert('sttrId == ' + sttrId);
    //alert('stockTableId == ' + stockTableId);
    //alert('utinId == ' + utinId);
    //alert('utransInvId == ' + utransInvId);
    //    
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    //
    if (confirm_box == true) {
        if (panelName != 'ItemStockList') {
            var stockDeleteConfirm = 'yes';
            var stockDelete = 'Y';
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockLotTotag").innerHTML = xmlhttp.responseText;
                closeMessDiv('messDisplayDiv', 'DELETED');
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("GET", "ogwaldel" + default_theme + ".php?panelName=" + panelName + "&sttrId=" + sttrId + "&stockDelete=" + stockDelete +
                "&stockDeleteConfirm=" + stockDeleteConfirm +
                "&stockType=retail&mainPanel=StockInvoice" + "&utinId=" + utinId, true);
        //
        xmlhttp.send();
        //
    }
}
//<!------function for onchange Added By Aakanksha 21/12/22---------------------->
function myOnChange(checkpara, type, panelName, sttrId, stockType, itemName, operation) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("paymentDiv").innerHTML = xmlhttp.responseText;
        }
    }
    if (type == 'passcode') {
        xmlhttp.open("GET", "include/php/omFirmOTPVerificationDiv" + default_theme + ".php?passcode=" + checkpara + "&panelName=" + panelName + "&sttrId=" + sttrId + "&stockType=" + stockType + "&itemName=" + itemName + "&operation=" + operation, true);
        // pass the argument operation and itemName required for panelName=deletedStockList(delete) @AUTHOR : SHRIKANT 07 JAN 2023
    } else if (type == 'otp') {
        xmlhttp.open("GET", "include/php/omFirmOTPVerificationDiv" + default_theme + ".php?otp=" + checkpara + "&panelName=" + panelName + "&sttrId=" + sttrId + "&stockType=" + stockType + "&itemName=" + itemName + "&operation=" + operation, true);
        //pass the argument operation and itemName required for panelName=deletedStockList(delete) @AUTHOR : SHRIKANT 07 JAN 2023
    }
    xmlhttp.send();
}
///purchase delete datatable fn changed by @auth:athu8JUN17
function deleteMeltedList(listPanel, sttrId) {

    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Melted Entry?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("MeltedTransactionsListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ommatdel" + default_theme + ".php?listPanel=" + listPanel + "&sttrId=" + sttrId, true);
        xmlhttp.send();
    }
}


function DelRawMetal(panelName, sttrId, stockType, condition1, condition2, condition3) {

    var confirmMessage = "";
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
        if (panelName == 'PurchaseRawStockList' || panelName == 'soldOutPurList') {
            confirmMessage = "\n\nDo you want to delete this Item From Raw Purchase?";
        } else if (panelName == 'RawSellList' || panelName == 'soldOutSellList') {
            confirmMessage = "\n\nDo you want to delete this Item From Raw Sell?";
        }
        //added code to implement datatable deletefunction in raw metal sell list @AUTH:ASHWINI28JUN2023
        else if (panelName == 'deleterawmetalList') {
            confirmMessage = "\n\nDo you want to delete this Item From Raw Metal?";
        } else {
            confirmMessage = "\n\nDo you want to delete this Item From Raw Stock?";
        }
        confirm_box_for_stock = confirm(deleteItemAlertMess + confirmMessage);
        if (confirm_box_for_stock == true) {
            stockDeleteConfirm = 'yes';
        } else {
            stockDeleteConfirm = 'no';
        }

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'PurchaseRawStockList') {
                    document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'RawSellList') {
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'CurrentRawStockList') {
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'soldOutSellList' || panelName == 'soldOutPurList') {
                    document.getElementById("sellPurchaseList").innerHTML = xmlhttp.responseText;
                    document.getElementById('deleteInvVerificationPopUp').style.display = "none";
                }
                //added code to implement datatable deletefunction in raw metal sell list @AUTH:ASHWINI28JUN2023
                else if (panelName == 'deleterawmetalList') {
                    document.getElementById("deleterawmetal").innerHTML = xmlhttp.responseText;
                    document.getElementById('deleteInvVerificationPopUp').style.display = "none";
                } else if (panelName == 'oldMetalPurList' || panelName ==  'oldMetalPurRecList') {
                    document.getElementById("soldoutDeletedList").innerHTML = xmlhttp.responseText;
                    document.getElementById('deleteInvVerificationPopUp').style.display = "none";
                } else {
                    document.getElementById("paymentDiv").innerHTML = xmlhttp.responseText;
                    window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm + "&stockType=" + stockType + "&con1=" + condition1 + "&con2=" + condition2 + "&con3=" + condition3, true);
        xmlhttp.send();
    }
}

// END add function delete the data from retail purchase list in datatable @Author:GAUR21MAR17

//***********************Start code to change Customer home panel Author@:SANT01DEC16*******************
function showCustOrderDeliev(paymentPanelName) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("stockPanelSubDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogsuppaym" + default_theme + ".php?paymentPanelName=" + updPanelname + "&userId=" + userId + "&rateCutOpt=" + rateCutOpt + "&paymentType=" + paymentType, true);
    xmlhttp.send();
}
//*********End code to change Customer home panel Author@:SANT01DEC16*******************
//
/*********** Start code to add function for InvoiceUpdate from ALL Transaction @Author:PRIYANKA-21-08-17 *********/
//
function showAllTransactionInvoiceDetails(utinId, transType, panelName, mainPanel, utinType, userId) {
//
    var paymentPanelName;
    var updatePanelName;
    var mainPanel;
    //
    if (transType == 'PURBYSUPP' && utinType == 'stock') {
        paymentPanelName = 'StockPayUp';
    } else if (transType == 'PURBYSUPP' && utinType == 'imitation') {

        updatePanelName = 'UpdateImitationStock';
        panelName = 'ImitationStock';
    } else if (transType == 'PURBYSUPP' && utinType == 'crystal') {

        updatePanelName = 'UpdateCrystalStock';
        panelName = 'CrystalStock';
    } else if (transType == 'sell' && utinType == 'stock') {

        mainPanel = 'StockPurchasePanel';
        panelName = 'SellPayUp';
    } else if (transType == 'sell' && utinType == 'imitation') {

        mainPanel = 'ImitationPurchasePanel';
        panelName = 'ImitationSellPayUp';
    } else if (transType == 'sell' && utinType == 'crystal') {

        mainPanel = 'CrystalPurchasePanel';
        panelName = 'CrySellPayUp';
    }
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("suppHomePanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (transType == 'PURBYSUPP' && utinType == 'stock') {

        xmlhttp.open("GET", "include/php/ogainpydv" + default_theme + ".php?paymentPanelName=" + paymentPanelName + "&utinId=" + utinId + "&suppId=" + userId, true);
    } else if (transType == 'PURBYSUPP' && (utinType == 'imitation' || utinType == 'crystal')) {

        xmlhttp.open("GET", "include/php/ogijssdv" + default_theme + ".php?utin_id=" + utinId + "&panelName=" + panelName + "&updatePanelName=" + updatePanelName + "&suppId=" + userId, true);
    } else if (transType == 'sell' && (utinType == 'stock' || utinType == 'imitation' || utinType == 'crystal')) {

        xmlhttp.open("GET", "include/php/ogspisdv" + default_theme + ".php?utin_id=" + utinId + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&custId=" + userId, true);
    }

    xmlhttp.send();
}
//
/*********** End code to add function for InvoiceUpdate from ALL Transaction @Author:PRIYANKA-21-08-17 ********/
function addShares(custPanelOption) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("main_middle").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcdcddv" + default_theme + ".php?custId=" + custId + "&custPanelOption=" + custPanelOption,
            true);
    xmlhttp.send();
}
//*************************************************************************************//
// Start to add function for Master stock on customer info Author:DIKSHA 26APRIL2019   //
//*************************************************************************************//
function masterStock(custId, custPanelOption) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("main_middle").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcdcddv" + default_theme + ".php?custId=" + custId + "&custPanelOption=" + custPanelOption,
            true);
    xmlhttp.send();
}
//*************************************************************************************//
// End to add function for Master stock on customer info Author:DIKSHA 26APRIL2019     //
//*************************************************************************************//
/***************Start code to add function @Author:SHRI21AUG19*************************/
function updateProcessingAmount(documentRootPath, custId, girviId, processAmount, processAmountPerId, FinalPrincipalAmtId, girviJrnlId, girviDOB, girviFirmId, girviSerialNum, panelName) {

    document.getElementById("updateProcessingAmtButton").style.visibility = "hidden";
    var processingAmount = processAmount.value;
    var processAmountPer = processAmountPerId.value;
    var FinalPrincipalAmt = FinalPrincipalAmtId.value;
    if (validateEmptyField(processingAmount, "Please Enter Processing Amount!") == false ||
            validateNum(processingAmount, "Accept only numeric characters without space character!") == false) {
        document.getElementById("updateProcessingAmount").focus();
        document.getElementById("updateProcessingAmtButton").style.visibility = "visible";
        return false;
    } else {

        confirm_box = confirm("Do you really want to update Processing Amount?");
        if (confirm_box == true)
        {
            var processingAmountAction = document.getElementById("processingAmountAction").value;
            var poststr = "custId=" + custId + "&girviId=" + girviId
                    + "&processingAmount=" + processingAmount
                    + "&processAmountPer=" + processAmountPer
                    + "&FinalPrincipalAmt=" + FinalPrincipalAmt
                    + "&girviJrnlId=" + girviJrnlId
                    + "&processingAmountAction=" + processingAmountAction
                    + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum + "&panelName=" + panelName;
            update_principal_amount(documentRootPath + '/include/php/olgumpam' + default_theme + '.php?', poststr); //change in filename @AUTHOR: SANDY20NOV13
        }
    }
    document.getElementById("updateProcessingAmtButton").style.visibility = "visible";
    return false;
}
/***************End code to add function @Author:SHRI21AUG19*************************/
/***************Start code to add function @Author:SHRI21AUG19*************************/
function updateChargeAmount(documentRootPath, custId, girviId, chargeAmountId, chargeAmountPerId, FinalPrincipalAmtId, girviJrnlId, girviDOB, girviFirmId, girviSerialNum, panelName) {

    document.getElementById("updateChargeAmtButton").style.visibility = "hidden";
    var chargeAmount = chargeAmountId.value;
    var chargeAmountPer = chargeAmountPerId.value;
    var FinalPrincipalAmt = FinalPrincipalAmtId.value;
    if (validateEmptyField(chargeAmount, "Please Enter Charge Amount!") == false ||
            validateNum(chargeAmount, "Accept only numeric characters without space character!") == false) {
        document.getElementById("updateChargeAmount").focus();
        document.getElementById("updateChargeAmtButton").style.visibility = "visible";
        return false;
    } else {

        confirm_box = confirm("Do you really want to update Charge Amount?");
        if (confirm_box == true)
        {
            var chargesAmountAction = document.getElementById("chargesAmountAction").value;
            var poststr = "custId=" + custId + "&girviId=" + girviId
                    + "&chargeAmount=" + chargeAmount
                    + "&chargeAmountPer=" + chargeAmountPer
                    + "&FinalPrincipalAmt=" + FinalPrincipalAmt
                    + "&girviJrnlId=" + girviJrnlId
                    + "&chargesAmountAction=" + chargesAmountAction
                    + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum + "&panelName=" + panelName;
            update_principal_amount(documentRootPath + '/include/php/olgumpam' + default_theme + '.php?', poststr); //change in filename @AUTHOR: SANDY20NOV13
        }
    }
    document.getElementById("updateChargeAmtButton").style.visibility = "visible";
    return false;
}
/***************End code to add function @Author:SHRI21AUG19*************************/

/***************Start code to add function @AUTHOR:SHRI27AUG19***********************/
function getGstPanel(firmId, gstPanelToShow)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("AllGstMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omgst" + default_theme + ".php?gstPanelToShow=" + gstPanelToShow + "&firmId=" + firmId, true);
    xmlhttp.send();
}
/***************End code to add function @AUTHOR:SHRI27AUG19***********************/


function omKittyEMIUpdate(kittyNo, emiPaidDD, emiPaidMM, emiPaidYY, emiAmt, custStaffLoginId, kPaidAmt,
        serialNo, custId, firmId, kittyId, kittyDOB, gDepId, gDepJrnlId, emiOccur, gEMIAmt, princAmt,
        dueDate, pageNo, kittyStaffId, newKittyRecipitNo, kittyMetalType, kRateAmt, kWtAmt) {

//alert('custStaffLoginId @@== ' + custStaffLoginId);                      

    confirm_box = confirm("Do you really want to change the status !");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //alert('custStaffLoginId == ' + custStaffLoginId);

        var emiPaidDate = emiPaidDD + ' ' + emiPaidMM + ' ' + emiPaidYY;
        var poststr = "kittyNo=" + kittyNo
                + "&emiPaidDate=" + emiPaidDate
                + "&emiAmt=" + emiAmt
                + "&custStaffLoginId=" + custStaffLoginId
                + "&kPaidAmt=" + kPaidAmt
                + "&custId=" + custId
                + "&kittyId=" + kittyId
                + "&kittyDOB=" + kittyDOB
                + "&gDepId=" + gDepId
                + "&gDepJrnlId=" + gDepJrnlId
                + "&emiOccur=" + emiOccur
                + "&gEMIAmt=" + gEMIAmt
                + "&princAmt=" + princAmt
                + "&kittyEndDate=" + dueDate
                + "&pageNo=" + pageNo
                + "&kittyStaffId=" + kittyStaffId
                + "&newKittyRecipitNo=" + newKittyRecipitNo
                + "&kRateAmt=" + kRateAmt
                + "&kWtAmt=" + kWtAmt;
        xmlhttp.open("POST", "include/php/omKittyEMIUpdate" + default_theme + ".php?" + poststr, true);
        xmlhttp.send();
    }

}

function showKittyPassbook(kittyId, custId, firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("schemePassbook").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("schemePassbook").style.visibility = "visible";
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omSchemePassbook" + default_theme + ".php?custId=" + custId + "&firmId=" + firmId + "&kittyId=" + kittyId, true);
    xmlhttp.send();
}


function userUdhaarAdvTrans() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omUserTrans" + default_theme + ".php", true);
    xmlhttp.send();
}
//START CODE TO ADD FUNCTION FOR DELETE ALL PERSONAL FIRMS @AUTHOR:MADHURI17SEP19
function delKeyFun(firmIds) {
    if (firmIds.trim() == "FAIL") {
        alert("If you want to delete all master firms, please select option from layout panel!");
    } else {
        confirm_box = confirm("Do you really want to delete all master firms !");
        if (confirm_box == true) {
            if (firmIds == 0) {
                confirm_box = confirm("No Firms Found!");
            } else {
                var strFirmArray = new Array();
                strFirmArray = firmIds.split(",");
                for (i = 0; i < strFirmArray.length; i++) {
                    var firmId = strFirmArray[i];
                    if (firmId != '') {
//deleteFirm(strFirmArray[i]);
                        loadXMLDoc();
                        xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                            } else {
                                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                            }
                        };
                        xmlhttp.open("GET", "include/php/omffdlfr" + default_theme + ".php?firmId=" + firmId,
                                true);
                        xmlhttp.send();
                    }
                }
            }
        }
    }
}
//END CODE TO ADD FUNCTION FOR DELETE ALL PERSONAL FIRMS @AUTHOR:MADHURI17SEP19
function searchSchemeInCustHomePanel(documentRootPath, searchColumn, searchValue, selFirmId, custId) {
    if (searchValue.length == 0 || searchValue.length == 'NULL') {
        searchValue = '';
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("activeSchemeListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogchackt" + default_theme + ".php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&custId=" + custId, true);
    xmlhttp.send();
}
function sortSchemeInCustHome(documentRootPath, sortKeyword, selFirmId, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("activeSchemeListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogchackt" + default_theme + ".php?sortKeyword="
            + sortKeyword + "&selFirmId=" + selFirmId + "&custId=" + custId, true);
    xmlhttp.send();
}
function showSelectedPageActiveScheme(pageNo, panel, rowsPerPage, noOfPagesAsLink, selFirmId, sortKeyword, searchColumn, searchValue, custId) {
    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.barcode_search.barcode_text.focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("activeSchemeListDiv").innerHTML = xmlhttp.responseText;
                if (pageNo >= 10) {
                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogchackt" + default_theme + ".php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
function numberOfRowsInActiveSchemeList(documentRootPath, rowsPerPage, selFirmId, sortKeyword, pageNum, searchColumn, searchValue, updateRows, custId)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("activeSchemeListDiv").innerHTML = xmlhttp.responseText;
        } else {
            // document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
            // document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogchackt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
            "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows + "&custId=" + custId, true);
    xmlhttp.send();
}
function getSchemeDetails(documentRootPath, kittyId, kittyIndicator) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //
            var str = xmlhttp.responseText;
            var strArray = new Array();
            strArray = str.split("*");
            //
            if (kittyIndicator == '') {
                document.getElementById("kittyGroup").value = strArray[0];
                document.getElementById("kittyNoOfEmi").value = strArray[1];
                if (strArray[2] == '' || strArray[2] == null) {
                    document.getElementById("kittyNoOfDays").value = '1';
                } else {
                    document.getElementById("kittyNoOfDays").value = strArray[2];
                }
                if (strArray[3] == '' || strArray[3] == null) {
                    document.getElementById("addSchemePrdTyp").value = 'MONTH';
                } else {
                    document.getElementById("addSchemePrdTyp").value = strArray[3];
                }
                if (strArray[4] == '' || strArray[4] == null) {
                    document.getElementById('kittyMetalType').value = 'CASH';
                } else {
                    document.getElementById('kittyMetalType').value = strArray[4];
                    if (kittyIndicator == '') {                        
                        changeSchemeMetalCarat(strArray[4]);
                    }
                }
                document.getElementById("kittyEmiAmount").value = strArray[5];
                /* START CODE TO CHECK IF BONUS AMOUNT IS SET SAME AS EMI AMOUNT @AUTHOR:MADHUREE-27AUGUST2020 */
                if (strArray[6] == 'EMI') {
                    document.getElementById('kittyBonusAmountStatus').value = strArray[6];
                    document.getElementById('kittyBonusAmount').value = strArray[5];
                } else {
                    document.getElementById('kittyBonusAmount').value = strArray[6];
                }
                /* END CODE TO CHECK IF BONUS AMOUNT IS SET SAME AS EMI AMOUNT @AUTHOR:MADHUREE-27AUGUST2020 */
                document.getElementById("kittyEmiMultipleAmtHidden").value = strArray[9];
                edateChange();
                changeKittyAmount();
                if (document.getElementById('panelName').value != 'directSchemeAdd') {
                    setSchemePrdTyp(document.getElementById("addSchemePrdTyp").value);
                    setSchemeMetalType(document.getElementById('kittyMetalType').value);
                }
            } else {
                document.getElementById("kittyGroup").value = strArray[0];
                if (strArray[4] == '' || strArray[4] == null) {
                    document.getElementById('kittyMetalType').value = 'CASH';
                } else {
                    document.getElementById('kittyMetalType').value = strArray[4];
                    if (kittyIndicator == '') {                        
                        changeSchemeMetalCarat(strArray[4]);
                    }
                }
                document.getElementById('kittyInterest').value = strArray[6];
                setSchemeMetalType(document.getElementById('kittyMetalType').value);
            }
            if (strArray[10] != '' || strArray[10] != null)
            {
                document.getElementById('kitty_gst_check_status').value = strArray[10];
            }
            if (strArray[11] != '' || strArray[11] != null)
            {
                document.getElementById('kitty_id').value = strArray[11];
                document.getElementById('kitty_kitty_id').value = strArray[11];
            }
            // assign gold / diamond / bullion per and making charges
            if (strArray[12] != '' || strArray[12] != null)
            {
                document.getElementById('kitty_gold_bonus_per').value = strArray[12];
            }
            if (strArray[13] != '' || strArray[13] != null)
            {
                document.getElementById('kitty_diamond_bonus_per').value = strArray[13];
            }
            if (strArray[14] != '' || strArray[14] != null)
            {
                document.getElementById('kitty_bullion_bonus_per').value = strArray[14];
            }
            if (strArray[15] != '' || strArray[15] != null)
            {
                document.getElementById('kitty_gold_making_per').value = strArray[15];
            }
            if (strArray[16] != '' || strArray[16] != null)
            {
                document.getElementById('kitty_diamond_making_per').value = strArray[16];
            }
            if (strArray[17] != '' || strArray[17] != null)
            {
                document.getElementById('kitty_bullion_making_per').value = strArray[17];
            }
            //
            //
            if (strArray[18] != '' || strArray[18] != null)
            {
                document.getElementById('kitty_emi_late_fee').value = strArray[18];
            }
            if (strArray[19] != '' || strArray[19] != null)
            {
                document.getElementById('kitty_cash_to_gold').value = strArray[19];
            }
            if (strArray[20] != '' || strArray[20] != null)
            {
                document.getElementById('kitty_late_fee_days').value = strArray[20];
            }
            if (strArray[21] != '' || strArray[21] != null)
            {
                document.getElementById('kitty_plan').value = strArray[21];
            }
            if (strArray[22] != '' || strArray[22] != null)
            {
                if (document.getElementById('kitty_bonus_percent') != null) {
                    document.getElementById('kitty_bonus_percent').value = strArray[22];
                }                
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omktitdt" + default_theme + ".php?kittyId=" + kittyId, true);
    xmlhttp.send();
}
function showHideSpouseDetails(maritalStatus) {
    if (maritalStatus == 'S') {
//        document.getElementById('spouseName').style.visibility = "hidden";
        document.getElementById('spouseDOB').hidden = true;
        document.getElementById('anniversaryDate').hidden = true;
    } else {
//        document.getElementById('spouseName').style.visibility = "visible";
        document.getElementById('spouseDOB').hidden = false;
        document.getElementById('anniversaryDate').hidden = false;
    }
}
function showCustAdhaarItem(custId, div, divCheckValue, closeId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divCheckValue).value = 'true';
            document.getElementById(closeId).style.visibility = "visible";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcaimdv" + default_theme + ".php?custId=" + custId + "&div=" + div, true);
    xmlhttp.send();
}
//added By Deepak on 10 Oct 2019 For Stock Tranfer Panel
function stockTransferPanel(panel) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omStocktransfer" + default_theme + ".php", true);
    xmlhttp.send();
}
//START CODE TO ADD FUNCTION FOR ADD DISCOUNT @AUTHOR:HEMA-10FEB2020
function AddDiscount(panel) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omDiscountList" + default_theme + ".php", true);
    xmlhttp.send();
}
//END CODE TO ADD FUNCTION FOR ADD DISCOUNT @AUTHOR:HEMA-10FEB2020
//START CODE TO ADD FUNCTION FOR UPDATE ITEM NAME AND CATRGORY @AUTHOR:HEMA-10FEB2020
function UpdateCategoryAndItemName(panel) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omUpdateCategoryItemNameList" + default_theme + ".php", true);
    xmlhttp.send();
}
//END CODE TO ADD FUNCTION FOR UPDATE ITEM NAME AND CATEGORY @AUTHOR:HEMA-10FEB2020
//START CODE TO ADD FUNCTIONS FOR GETTING ITEM CODES IN DROPDOWN ON SELL PANEL @AUTHOR:MADHUREE-17OCT19
var keyCode;
var panelname;
function search_item_for_panel(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchItemForPanel;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function searchItemIdForPanel(itemId, keyCodeInput, panelName) {
    keyCode = keyCodeInput;
    itemid = itemId;
    panelname = panelName;
    //alert(itemId);
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "itemid=" + encodeURIComponent(itemId) +
            "&panelname=" + encodeURIComponent(panelName);
    search_item_for_panel('include/php/ompritemid' + default_theme + '.php', poststr);
}
function alertSearchItemForPanel() {
    if (panelname == 'FINE_JEWELLERY_SELL') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("preitemid").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('preitemidSelect').focus();
                document.getElementById('preitemidSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
}
var ItemForPanelBlank;
function search_item_for_panel_blank(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchItemForPanel;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertSearchItemForPanelBlank() {
    if (ItemForPanelBlank == 'invDetails') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("preitemid").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    } else if (ItemForPanelBlank == 'blank') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("preitemid").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
}
function searchItemIdForPanelBlank(divName) {
    ItemForPanelBlank = divName;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "";
    search_item_for_panel_blank('include/php/ombbblnk' + default_theme + '.php', poststr);
}
//END CODE TO ADD FUNCTIONS FOR GETTING ITEM CODES IN DROPDOWN ON SELL PANEL @AUTHOR:MADHUREE-17OCT19
//START CODE TO ADD FUNCTION TO GET ITEM ID FOR STOCK TRANSFER  @AUTHOR:MADHUREE-22OCT19
function search_item_for_stock_transfer(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchItemForStockTransfer;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function searchItemForStockTransfer(itemId) {
//    itemId = itemId;
//    alert(itemId);
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "itemId=" + encodeURIComponent(itemId);
    search_item_for_stock_transfer('include/php/omStocktransfer' + default_theme + '.php', poststr);
}
function alertSearchItemForStockTransfer() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("stockTransferMainDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function search_item_for_stock_firm_transfer(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchItemForStockFirmTransfer;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function stockFirmTransfer(firmId, itemId, preFirmNames, preFirmId, stTransDate) {
//    itemId = itemId;
//    alert(stTransDate);

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "itemId=" + encodeURIComponent(itemId) +
            "&firmId=" + encodeURIComponent(firmId) +
            "&preFirmNames=" + encodeURIComponent(preFirmNames) +
            "&preFirmId=" + encodeURIComponent(preFirmId) +
            "&stTransDate=" + encodeURIComponent(stTransDate);
    search_item_for_stock_firm_transfer('include/php/omStockFirmTransfer' + default_theme + '.php', poststr);
}
function alertSearchItemForStockFirmTransfer() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("stockTransferMainDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//END CODE TO ADD FUNCTION TO GET ITEM ID FOR STOCK TRANSFER @AUTHOR:MADHUREE-22OCT19
//START CODE TO ADD FUNCTIONS TO GET ITEM DETAILS AT TAG SPLIT PANEL-@AUTHOR:MADHUREE-18DEC19
function search_item_for_tag_split(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchItemForTagSplit;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function searchItemForTagSplit(itemId) {
//    alert(itemId);
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "itemId=" + encodeURIComponent(itemId);
    search_item_for_tag_split('include/php/stock/omTagSplit' + default_theme + '.php', poststr);
}
function alertSearchItemForTagSplit() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("TagSplitMainDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//END CODE TO ADD FUNCTIONS TO GET ITEM DETAILS AT TAG SPLIT PANEL-@AUTHOR:MADHUREE-18DEC19

// START TO ADD FUNCTIONS FOR UDHAAR INTEREST OPTION @AUTHOR:SHRI21DEC19
function searchROIForUdhaar(roiValue, intType, panelName, keyCodeInput, udhaarFirmId) {
    var poststr = "ROIValue=" + encodeURIComponent(roiValue) +
            "&interestType=" + encodeURIComponent(intType) +
            "&panelName=" + encodeURIComponent(panelName) +
            "&udhaarFirmId=" + encodeURIComponent(udhaarFirmId);
    search_roi_for_udhaar('include/php/omuroisl_2_6_106' + default_theme + '.php', poststr);
}
function search_roi_for_udhaar(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchROIForUdhaar;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertSearchROIForUdhaar() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("roiListDivToAddROI").innerHTML = xmlhttp.responseText;
        document.getElementById('roiListToAddRoiSelect').focus();
        document.getElementById('selROIValue').focus();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
// END TO ADD FUNCTIONS FOR UDHAAR INTEREST OPTION @AUTHOR:SHRI21DEC19
// 
// 
// START - ADD FUNCTION TO SHOW AVAILABLE STOCK FOR TAGGING @AUTHOR:SHRI21DEC19
function showAvailableProductToTag(srchItemPreId, srchItemPostId, userId, panelName, transType, status) {
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockAvailableProductSearchDiv").innerHTML = xmlhttp.responseText;
            //document.getElementById('prodDOBDay').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//    alert('srchItemPreId == ' + srchItemPreId);
//    alert('srchItemPostId == ' + srchItemPostId);
//    alert('panelName == ' + panelName);
//    alert('txtType == ' + txtType);


    xmlhttp.open("POST", "include/php/stock/omAvailableStockForTag" + default_theme + ".php?searchProductPreId=" + srchItemPreId +
            "&searchProductPostId=" + srchItemPostId + "&userId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&sttr_status=" + status, true);
    xmlhttp.send();
}
// END - ADD FUNCTION TO SHOW AVAILABLE STOCK FOR TAGGING @AUTHOR:SHRI21DEC19

// START - ADD FUNCTION TO SHOW SEARCHED CUSTOMER LIST IN SCHEME PANEL @AUTHOR:SWAPNIL26DEC19
function searchCustToAddScheme(custFName, custMobNo) {

    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    if (true) {
        var poststr = "custFName=" + encodeURIComponent(custFName)
                + "&custMobNo=" + encodeURIComponent(custMobNo);
        search_cust_fname_to_add_scheme('include/php/omSchemeuser' + default_theme + '.php', poststr);
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
    }
}
function search_cust_fname_to_add_scheme(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCustFNameToAddScheme;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertSearchCustFNameToAddScheme() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
        document.getElementById("custListForScheme").innerHTML = xmlhttp.responseText;
        //searchCityForPanelBlank();
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    }
}
// END - ADD FUNCTION TO SHOW SEARCHED CUSTOMER LIST IN SCHEME PANEL @AUTHOR:SWAPNIL26DEC19
//START CODE TO ADD FUNCTION FOR SHOWING ECOM ADMIN PANEL @AUTHOR:MADHUREE-24DEC19
function navigateEcommAdminPanel(delStatus) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omecom/omecomonadminpanel" + default_theme + ".php?delStatus=" + delStatus, true);
    xmlhttp.send();
}
//END CODE TO ADD FUNCTION FOR SHOWING ECOM ADMIN PANEL @AUTHOR:MADHUREE-24DEC19
//START CODE TO ADD FUNCTION FOR SHOWING ECOM ADMIN PANEL OF SCHEME @AUTHOR:HEMA-25JAN2020
function navigateSetUpEcommScheme(subDivName, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omecom/omecomschemesetup" + default_theme + ".php?subDivName=" + subDivName + "&panelName=" + panelName, true);
    xmlhttp.send();
}
//END CODE TO ADD FUNCTION FOR SHOWING ECOM ADMIN PANEL FOR SCHEME @AUTHOR:HEMA-25JAN2020
//START CODE TO CALCULATE CUSTOMER WASTAGE SELL PANEL-@AUTHOR:RUTUJA-03JAN2020
function calculateSellCustWastageWt() {
    var custWastgBy;
    if (document.getElementById('sttr_cust_wastg_by').value == 'custWastgByNetWt') {
        custWastgBy = parseFloat(document.getElementById('slPrItemNTW').value);
    } else if (document.getElementById('sttr_cust_wastg_by').value == 'custWastgByGrossWt') {
        custWastgBy = parseFloat(document.getElementById('slPrItemGSW').value);
    } else if (document.getElementById('sttr_cust_wastg_by').value == 'custWastgByFineWt') {
        custWastgBy = parseFloat(document.getElementById('slPrItemFineWeight').value);
    } else {
        custWastgBy = parseFloat(document.getElementById('slPrItemNTW').value);
    }
//
    if (custWastgBy == '' || custWastgBy == 'NaN') {
        custWastgBy = 0;
    }
//
    if (document.getElementById('slPrCustWastage').value > 0) {
        document.getElementById('slPrCustWastageWt').value = ((parseFloat(custWastgBy) * parseFloat(document.getElementById('slPrCustWastage').value)) / 100).toFixed(3);
        document.getElementById('slPrItemValueAdded').value = Math_round(((parseFloat(document.getElementById('slPrCustWastageWt').value) * parseFloat(document.getElementById('slPrItemMetalRate').value)) / document.getElementById('gmWtInGm').value));
    } else {
        document.getElementById('slPrCustWastageWt').value = '0'; // CUSTOMER WASTAGE WEIGHT
        document.getElementById('slPrItemValueAdded').value = '0'; // VALUE ADDED
        document.getElementById('slPrCustWastage').value = '0'; // CUSTOMER WASTAGE 
    }
}
//END CODE TO CALCULATE CUSTOMER WASTAGE SELL PANEL-@AUTHOR:RUTUJA-03JAN2020

//START CODE TO ADD FUNCTION FOR Add SELL - Customer Wastage By GS, NT, FN Wt @RUTUJA-03JAN2020
function sellCustWastageByWt(div, id, keyCodeInput, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('custWastgBy').focus();
                document.getElementById('custWastgBy').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/omslctwstgby" + default_theme + ".php?div=" + div + "&panel=" + panel + "&id=" + id, true);
    xmlhttp.send();
}
//END CODE TO ADD FUNCTION FOR Add SELL - Customer Wastage By GS, NT, FN Wt @RUTUJA-03JAN2020
function searchSchemeForBlank(div) {
    document.getElementById(div).innerHTML = '';
}
//START CODE ADDED TO SHOW METAL COLOR INFORMATION FOR BLANK DIV,@AUTHOR:HEMA-4AUG2020
function searchColorForBlank(div) {
    document.getElementById(div).innerHTML = '';
}
//END CODE ADDED TO SHOW METAL COLOR INFORMATION FOR BLANK DIV,@AUTHOR:HEMA-4AUG2020
function loadNotification(documentRootPath, notificationHeading, dueAmount, custFName, custMobile, custCity) {
//    setTimeout(function ()
//    {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("notificationContent").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/notification/notificationContent" + default_theme + ".php?notificationHeading=" + notificationHeading + "&dueAmount=" + dueAmount + "&custFName=" + custFName + "&custMobile=" + custMobile + "&custCity=" + custCity, true);
    xmlhttp.send();
    // document.getElementById('mainNotificationDiv').addAttribute("class","show");
    //$('#mainNotificationDiv').addClass('show');
//    }, 10000);
//    $('#close').on('click', function ()
//    {
//        $('.Notification').removeClass('show');
//    })
}
function closeNotification() {
    document.getElementById('notificationContent').innerHTML = '';
}
function otpPanelDisplay(kittyId, kittyCustId, kittyFirmId, kittyMetalType, finalAmt, totalPaidAmt, totalFinalRt,
        totalFinalWT, kitty_rate_tot, kittyCloseDay, kittyCloseMonth, kittyCloseYear) {
//            alert(kittyId+'-'+kittyCustId+'-'+kittyFirmId+'-'+kittyMetalType+'-'+finalAmt+'-'+totalPaidAmt+'-'+totalFinalRt+'-'+
//        totalFinalWT+'-'+kitty_rate_tot+'-'+kittyCloseDay+'-'+kittyCloseMonth+'-'+kittyCloseYear);
//    alert(kittyId);
//    alert(kittyCustId);
//    alert(kittyFirmId);
    var SchemeOtpOption = document.getElementById('SchemeOtpOption').value;
    var bonusAmount = document.getElementById('finalBonusAmountToPay').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("paymentPanelDisplayDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omschemeotp" + default_theme + ".php?kittyId=" + kittyId + "&kittyCustId=" + kittyCustId + "&kittyFirmId=" + kittyFirmId
            + "&kittyMetalType=" + kittyMetalType + "&finalAmt=" + finalAmt + "&totalPaidAmt=" + totalPaidAmt
            + "&totalFinalRt=" + totalFinalRt + "&totalFinalWT=" + totalFinalWT + "&kitty_rate_tot=" + kitty_rate_tot
            + "&kittyCloseDay=" + kittyCloseDay + "&kittyCloseMonth=" + kittyCloseMonth
            + "&kittyCloseYear=" + kittyCloseYear + "&SchemeOtpOption=" + SchemeOtpOption
            + "&kittyPaidBonusAmt=" + bonusAmount, true);
    xmlhttp.send();
}
function verifySchemeOtp() {
    var userOtp = document.getElementById('user_otp').value;
    var dbOtp = document.getElementById('dbOtp').value;
    if (userOtp != dbOtp)
    {
        document.getElementById("user_otp_validate").innerHTML = "Wrong OTP! Please Try Again !";
        return false;
    }
}
function searchSchemeByMobile(searchSchemeMobileNo) {
//
// IT WILL SET SCHEME BARCODE 
    document.getElementById('searchSchemeMobileNo').value = searchSchemeMobileNo;
}
function showCustomerSchemeDiv(userMobileNumber) {
//    alert(userMobileNumber);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("searchSchemeByBarcodeListDisplayDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omMobileNoSearchedSchemes" + default_theme + ".php?userMobileNumber=" + userMobileNumber, true);
    //
    xmlhttp.send();
}

var glPaymentPanelName = '';
var glUtinId = '';
var glTotalPaidAmt = 0;
function paymentInAdvanceMoney(kittyId, kittyCustId, kittyFirmId, metalType, totalPaidAmt, totalFinalRt, totalFinalWT,
        utinId, paymentPanelName, kittyRateTot, kittyCloseDay, kittyCloseMonth, kittyCloseYear, advMoneyPreSerialNo, advMoneySerialNo) {

    glPaymentPanelName = paymentPanelName;
    glUtinId = utinId;
    glTotalPaidAmt = totalPaidAmt;
    var SchemeOtpOption = document.getElementById('SchemeOtpOption').value;
    if (SchemeOtpOption == 'Yes') {
        if (document.getElementById('user_otp').value == '') {
            alert("Please Enter OTP !");
            return false;
        }
        if (document.getElementById('user_otp').value != document.getElementById('dbOtp').value) {
            document.getElementById("user_otp_validate").innerHTML = "Wrong OTP! Please Try Again !";
            return false;
        }
    }

    var kittyCloseDate = kittyCloseDay + ' ' + kittyCloseMonth + ' ' + kittyCloseYear;
//    alert('kittyCloseDate:'+kittyCloseDate);

    var poststr = "UserId=" + encodeURIComponent(kittyCustId) +
            "&userPanelName=schemePaymentInAdvByOTP" +
            "&payPanelName=SchemePayment" +
            "&PayTotAmt=" + encodeURIComponent(totalPaidAmt) +
            "&utin_utin_id=" + encodeURIComponent(kittyId) +
            "&FirmId=" + encodeURIComponent(kittyFirmId) +
            "&PayTotAmtBal=" + encodeURIComponent(totalPaidAmt) +
            "&totalFinalRt=" + encodeURIComponent(totalFinalRt) +
            "&totalFinalWT=" + encodeURIComponent(totalFinalWT) +
            "&paymentPanelName=" + encodeURIComponent(paymentPanelName) +
            "&metalType=" + encodeURIComponent(metalType) +
            "&rtctTot=" + encodeURIComponent(kittyRateTot) +
            "&DOBDay=" + encodeURIComponent(kittyCloseDay) +
            "&DOBMonth=" + encodeURIComponent(kittyCloseMonth) +
            "&DOBYear=" + encodeURIComponent(kittyCloseYear) +
            "&kittyCloseDate=" + encodeURIComponent(kittyCloseDate) +
            "&payTotSchemePaidEMIAmt=" + encodeURIComponent(totalPaidAmt) +
            "&PreInvoiceNo=" + encodeURIComponent(advMoneyPreSerialNo) +
            "&PostInvoiceNo=" + encodeURIComponent(advMoneySerialNo) +
            "&totalValuation=" + encodeURIComponent(totalPaidAmt) +
            "&TransCRDR=CR" +
            "&PayableCashCRDR=CR" +
            "&FinalCashCRDR=CR" +
            "&kittyPaidBonusAmt=" + encodeURIComponent(document.getElementById('finalBonusAmountToPay').value);
//alert('poststr==>'+poststr);
    payment_in_advance_money('include/php/ompyamtad' + default_theme + '.php', poststr);
}
function payment_in_advance_money(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertPaymentInAdvanceMoney;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertPaymentInAdvanceMoney() {
    var confirm_box = false;
    if (glPaymentPanelName == 'schemeMetalPayment' && glUtinId == '')
        confirm_box = confirm("do you really want to close this scheme?");
    if (confirm_box == true) {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if ((glTotalPaidAmt == '' || glTotalPaidAmt == 0) && glPaymentPanelName != 'schemeCashPayment') {
                    alert('Please Enter The EMI Amount and Paid');
                } else {
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
    }
}
// FUNCTION ADDED TO CLEAR OPENED PASSBOOK DIV @AUTHOR:SHRI25JAN20
function closePassbook(div) {
    document.getElementById(div).innerHTML = '';
}
//START CODE TO ADD FUNCTION TO GET SELECT CATEGORY, @AUTHOR:HEMA-10FEB2020
function getSelectedCategory() {
    var x = document.getElementById("selItemCategory").value;
// alert(x);
    $.ajax({
        type: "POST",
        url: "include/php/omgetselectedcategory" + default_theme + ".php",
        data: 'category_s=' + x,
        success: function (data) {
            $("#selItemName").html(data);
        }
    });
}
//END CODE TO ADD FUNCTION TO GET SELECTED CATEGORY, @AUTHOR:HEMA-10FEB2020
//START CODE TO ADD FUNCTION TO GET SELECT NAME, @AUTHOR:HEMA-27FEB2020
function getSelectedItemName() {
    var y = document.getElementById("selItemNameToChange").value;
// alert(y);
    $.ajax({
        type: "POST",
        url: "include/php/omgetselecteditemname" + default_theme + ".php",
        data: 'name_s=' + y,
        success: function (data) {
            $("#selItemCategoryToChange").html(data);
        }
    });
}
//END CODE TO ADD FUNCTION TO GET SELECTED NAME, @AUTHOR:HEMA-27FEB2020
//START CODE TO ADD FUNCTION FOR SHOWING COLLECTION LIST - APPROVE PANEL @AUTHOR:HEMA-25FEB19
function navigatSchemeCollectionListApprovalPanel(delStatus) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("schemeMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcollectionlstApproval" + default_theme + ".php?delStatus=" + delStatus, true);
    xmlhttp.send();
}
//END CODE TO ADD FUNCTION FOR SHOWING COLLECTION LIST - APPROVAL @AUTHOR:HEMA-25FEB20
//START CODE TO ADD FUNCTION FOR SHOWING COLLECTION LIST - COMPLETE PANEL @AUTHOR:HEMA-25FEB19
function navigatSchemeCollectionListCompletePanel(delStatus) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("schemeMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcollectionlstComplete" + default_theme + ".php?delStatus=" + delStatus, true);
    xmlhttp.send();
}
//END CODE TO ADD FUNCTION FOR SHOWING COLLECTION LIST - COMPLETE @AUTHOR:HEMA-25FEB20
//START CODE TO GET SELECTED SEARCH OPTION VALUE FOR OMECOM OPTION, @AUTHOR:HEMA-30MARCH2020
function searchBy(searchOptionId) {
    var searchOptionId = searchOptionId;
    var x = document.getElementById(searchOptionId).value;
    $.ajax({
        type: "POST",
        url: "include/php/omecom/omecomSelSearchOption" + default_theme + ".php",
        data: {searchBy_s: x, searchOptionId: searchOptionId},
        success: function (data) {
            if (searchOptionId == 'newArrivalmSearchOpt') {
                $("#selSearchOption").html(data);
            } else if (searchOptionId == 'newArrivalwSearchOpt') {
                $("#selSearchOptionW").html(data);
            } else if (searchOptionId == 'newYearSaleSearchOpt') {
                $("#selSearchOptionNewYearSale").html(data);
            } else if (searchOptionId == 'goldSavingSchemeSearchOpt') {
                $("#selSearchOptionGoldSavingScheme").html(data);
            } else if (searchOptionId == 'slide1Option15') {
                $("#slide1Option14").html(data);
            } else if (searchOptionId == 'slide2Option15') {
                $("#slide2Option14").html(data);
            } else if (searchOptionId == 'slide3Option15') {
                $("#slide3Option14").html(data);
            } else if (searchOptionId == 'slide4Option15') {
                $("#slide4Option14").html(data);
            } else if (searchOptionId == 'OMUNIMOption14') {
                $("#OMUNIMOption13").html(data);
            }
        }
    });
}
//END CODE TO GET SELECTED SEARCH OPTION VALUE FOR OMECOM OPTION, @AUTHOR:HEMA-30MARCH2020
//
//
//
//***************************************************************************************************************
//* START CODE TO ADD FUNCTION FOR MASTER - UNIT PRICE CALCULATION FROM LAYOUT PANEL @AUTHOR-PRIYANKA-13JUNE2020
//***************************************************************************************************************
function masterUnitPriceCalculation() {
//
    var prodPriceCodeVal = document.getElementById('ms_itm_price_code_val').value;
    var prodPriceCodeType = document.getElementById('ms_itm_price_code_type').value;
    var prodPriceCodeNum = document.getElementById('ms_itm_price_code_num').value;
    var documentRoot = document.getElementById('documentRoot').value;
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ms_itm_unit_price").value = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omMasterFromLayoutUnitPriceCal" + default_theme + ".php?prodPriceCodeVal=" + prodPriceCodeVal +
            "&prodPriceCodeType=" + prodPriceCodeType + "&prodPriceCodeNum=" + prodPriceCodeNum, true);
    xmlhttp.send();
}
//***************************************************************************************************************
//* END CODE TO ADD FUNCTION FOR MASTER - UNIT PRICE CALCULATION FROM LAYOUT PANEL @AUTHOR-PRIYANKA-13JUNE2020
//***************************************************************************************************************
//
//
//
//*****************************************************************************************************************
//* START CODE TO ADD FUNCTION FOR ADD MASTER FORM FIELDS VALIDATION FROM LAYOUT PANEL @AUTHOR-PRIYANKA-13JUNE2020
//*****************************************************************************************************************
function addMasterFormFromLayoutVal() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateAddMasterFromLayoutInputs()) {
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    }
}
//
//***************************************************************************************************************
//
function validateAddMasterFromLayoutInputs(obj) {
    if (validateEmptyField(document.getElementById("ms_itm_category").value, "Please Enter Category!") == false) {
        document.getElementById("ms_itm_category").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("ms_itm_name").value, "Please Enter Name!") == false) {
        document.getElementById("ms_itm_name").focus();
        return false;
    } else if (validateSelectField(document.getElementById("ms_itm_price_code").value, "Please Enter Price Code!") == false) {
        document.getElementById("ms_itm_price_code").focus();
        return false;
    }
    return true;
}
//***************************************************************************************************************
//* END CODE TO ADD FUNCTION FOR ADD MASTER FORM FIELDS VALIDATION FROM LAYOUT PANEL @AUTHOR-PRIYANKA-13JUNE2020
//***************************************************************************************************************
//
//
//
//***************************************************************************************************************
//* START CODE TO ADD FUNCTION FOR UPDATE MASTER FROM LAYOUT PANEL @AUTHOR-PRIYANKA-13JUNE2020
//***************************************************************************************************************
function masterUpdateFromLayoutPanel(ms_itm_id, ms_itm_category, panelName) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addMasterFromLayoutMainDiv").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omAddMasterFromLayout" + default_theme + ".php?ms_itm_id=" + ms_itm_id +
            "&ms_itm_category=" + ms_itm_category + "&panelName=" + panelName, true);
    xmlhttp.send();
    //
}
//***************************************************************************************************************
//* END CODE TO ADD FUNCTION FOR UPDATE MASTER FROM LAYOUT PANEL @AUTHOR-PRIYANKA-13JUNE2020
//***************************************************************************************************************
//
//
//
//********************************************************************************************************************
//* START CODE TO ADD FUNCTION FOR ONCLICK OF ADD PRODUCT NAMES BUTTON ON LAYOUT PANEL @AUTHOR-PRIYANKA-13JUNE2020
//********************************************************************************************************************
function navigateAddNewProductNamePanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omAddMasterFromLayout" + default_theme + ".php", true);
    xmlhttp.send();
}
//*******************************************************************************************************************
//* END CODE TO ADD FUNCTION FOR ONCLICK OF ADD PRODUCT NAMES BUTTON ON LAYOUT PANEL @AUTHOR-PRIYANKA-13JUNE2020
//*******************************************************************************************************************

function showWorkReportByTeam(staffTeam, staffId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            if (staffTeam != '') {
                document.getElementById("sellDetailsSubDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("SummeryWorkReportDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    if (staffTeam != '') {
        xmlhttp.open("POST", "include/php/omstaffworkreport" + default_theme + ".php?staffTeam=" + staffTeam + "&panelName=" + panelName, true);
    } else {
        xmlhttp.open("POST", "include/php/omstaffsummworkreport" + default_theme + ".php?staffId=" + staffId + "&panelName=" + panelName, true);
    }
    xmlhttp.send();
}

function searchActionItemForPanel(suggetionId, suggetionIdvalue, keyCodeInput, divId) {
    var keyCode = keyCodeInput;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('actionItemSelect').focus();
                document.getElementById('actionItemSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/omselactitemdet' + default_theme + '.php?suggetionIdvalue=' + suggetionIdvalue + "&suggetionId=" + suggetionId, true);
    xmlhttp.send();
}
//
function searchActionItemForPanelBlank(divId) {
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
function getActionItemHistoryPopup(actiId, actiType) {
    loadXMLDoc();
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("actionItemPopup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("actionItemPopup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omactitmpopup" + default_theme + ".php?actiId=" + actiId + "&actiType=" + actiType, true);
    xmlhttp.send();
}
//
function getActionItemHistoryPopupHide() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("actionItemPopup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("actionItemPopup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//
//
function getStockReportLedgerPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ommnstocrptldgrpl" + default_theme + ".php", true);
    xmlhttp.send();
}
//
//
// START CODE FOR STOCK SUMMARY PANEL @AUTHOR-PRIYANKA-19JULY2020
function searchStockReportDetails(firmId, panelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear) {
//
    if (valStockReportInputs()) {
//
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        xmlhttp.open("POST", "include/php/ommnstocrptldgrpl" + default_theme + ".php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.send();
    }
}
// END CODE FOR STOCK SUMMARY PANEL @AUTHOR-PRIYANKA-19JULY2020
//
//
// START CODE FOR STOCK SUMMARY PANEL - INPUT FIELD VALIDATION @AUTHOR-PRIYANKA-19JULY2020
function valStockReportInputs() {
    if (validateSelectField(document.getElementById('FromDay').value, "Please Select Start Day!") == false) {
        document.getElementById('FromDay').focus();
        return false;
    } else if (validateSelectField(document.getElementById('FromMonth').value, "Please Select Start Month!") == false) {
        document.getElementById('FromMonth').focus();
        return false;
    } else if (validateSelectField(document.getElementById('FromYear').value, "Please Select Start Year!") == false) {
        document.getElementById('FromYear').focus();
        return false;
    } else if (validateSelectField(document.getElementById('ToDateDay').value, "Please Select End Day!") == false) {
        document.getElementById('ToDateDay').focus();
        return false;
    } else if (validateSelectField(document.getElementById('ToDateMonth').value, "Please Select End Month!") == false) {
        document.getElementById('ToDateMonth').focus();
        return false;
    } else if (validateSelectField(document.getElementById('ToDateYear').value, "Please Select End Year!") == false) {
        document.getElementById('ToDateYear').focus();
        return false;
    }
    return true;
}
// END CODE FOR STOCK SUMMARY PANEL - INPUT FIELD VALIDATION @AUTHOR-PRIYANKA-19JULY2020
//
//********************************START CODE TO ADD NEPALI DATE @RENUKA SHARMA2022*********************************//
function valStockReportInputsNepali() {
    if (validateSelectField(document.getElementById('addItemDOBFromDay').value, "Please Select Start Day!") == false) {
        document.getElementById('addItemDOBFromDay').focus();
        return false;
    } else if (validateSelectField(document.getElementById('addItemDOBFromMonth').value, "Please Select Start Month!") == false) {
        document.getElementById('addItemDOBFromMonth').focus();
        return false;
    } else if (validateSelectField(document.getElementById('addItemDOBFromYear').value, "Please Select Start Year!") == false) {
        document.getElementById('addItemDOBFromYear').focus();
        return false;
    } else if (validateSelectField(document.getElementById('addItemDOBToDay').value, "Please Select End Day!") == false) {
        document.getElementById('addItemDOBToDay').focus();
        return false;
    } else if (validateSelectField(document.getElementById('addItemDOBToMonth').value, "Please Select End Month!") == false) {
        document.getElementById('addItemDOBToMonth').focus();
        return false;
    } else if (validateSelectField(document.getElementById('addItemDOBToYear').value, "Please Select End Year!") == false) {
        document.getElementById('addItemDOBToYear').focus();
        return false;
    }
    return true;
}
//********************************END CODE TO ADD NEPALI DATE @RENUKA SHARMA2022*********************************//
//
//
function showSuppSterlingJewelleryDiv(documentRootPath, utinId, upPanelName, suppId, div, sttr_panel_name) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (div == 'cust_middle_body') {
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
            }
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/omijssdv" + default_theme + ".php?utin_Id=" + utinId + "&panelName=ImitationStock" +
            "&updatePanelName=" + upPanelName + "&suppId=" + suppId + "&sttr_panel_name=" + sttr_panel_name, true);
    //
    xmlhttp.send();
    //
}
//
//
function showUpdateSuppSterlingStockDiv(documentRootPath, utinId, upPanelName, suppId, sttr_panel_name) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelFormDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/omijssdv" + default_theme + ".php?utin_Id=" + utinId + "&panelName=ImitationStock" +
            "&updatePanelName=" + upPanelName + "&suppId=" + suppId + "&sttr_panel_name=" + sttr_panel_name, true);
    //
    xmlhttp.send();
    //
}
//
//
function showUpdateProductFormDiv(documentRootPath, utinId, upPanelName, suppId, formName) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelFormDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/ogijssdv" + default_theme + ".php?utin_Id=" + utinId + "&panelName=ImitationStock" +
            "&updatePanelName=" + upPanelName + "&suppId=" + suppId +
            "&formName=" + formName + "&sttr_panel_name=" + formName, true);
    //
    xmlhttp.send();
    //
}
//
//
//***************************************************************************************************************
//* START CODE TO ADD FUNCTION TO GET INVOICE NUMBER ACCORDING TO FINANCIAL YEAR @AUTHOR-PRIYANKA-19AUG2020
//***************************************************************************************************************
function getInvoiceNoByFinancialYear(userId, stockType, transType, userNewPreInv, firmId, metalType, currentInvoiceDate) {
//
//alert('userId == ' + userId);
//alert('stockType == ' + stockType);
//alert('transType == ' + transType);
//alert('userNewPreInv == ' + userNewPreInv);
//alert('firmId == ' + firmId);
//alert('metalType == ' + metalType);
//alert('currentInvoiceDate == ' + currentInvoiceDate);
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("getInvoiceNumberDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omGetInvoiceNumberByFinancialYear" + default_theme + ".php?userId=" + userId + "&stockType=" + stockType +
            "&transType=" + transType + "&userNewPreInv=" + userNewPreInv +
            "&firmId=" + firmId + "&metalType=" + metalType + "&currentInvoiceDate=" + currentInvoiceDate, true);
    //
    xmlhttp.send();
    //
}
//***************************************************************************************************************
//* END CODE TO ADD FUNCTION TO GET INVOICE NUMBER ACCORDING TO FINANCIAL YEAR @AUTHOR-PRIYANKA-19AUG2020
//***************************************************************************************************************
//
//
//***************************************************************************************************************
//* START CODE TO ADD FUNCTION TO SET INVOICE NUMBER ACCORDING TO FINANCIAL YEAR @AUTHOR-PRIYANKA-19AUG2020
//***************************************************************************************************************
function setInvoiceNumberAccordingToFinancialYear(sttr_pre_invoice_no, sttr_invoice_no) {
//
//alert('sttr_pre_invoice_no == ' + sttr_pre_invoice_no);
//alert('sttr_invoice_no == ' + sttr_invoice_no);
//
    document.getElementById('sttr_pre_invoice_no').value = sttr_pre_invoice_no;
    document.getElementById('sttr_invoice_no').value = sttr_invoice_no;
    //
}
//***************************************************************************************************************
//* END CODE TO ADD FUNCTION TO SET INVOICE NUMBER ACCORDING TO FINANCIAL YEAR @AUTHOR-PRIYANKA-19AUG2020
//***************************************************************************************************************
//
function getInvoiceNoByMetal(metalType, preInvoiceNo, InvoiceNo, firmId, transType,userId=null) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("SelectMetalDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/oggetrawinvno" + default_theme + ".php?metalType=" + metalType + "&preInvoiceNo=" + preInvoiceNo + "&InvoiceNo=" + InvoiceNo + "&firmId=" + firmId + "&transType=" + transType + "&userId=" + userId, true);
    xmlhttp.send();
}

//*************************************************************************************************************
//* START CODE TO ADD FUNCTION TO SHOW REMINDER MODAL PANEL AND SEND MESSAGE @AUTHOR-VISHAL 25JAN2021
//*************************************************************************************************************

function getDefUnvisitCustDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("reminderDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omunvisitcustremind" + default_theme + ".php");
    xmlhttp.send();
}
function getDefReminderDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("reminderDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcustbareminder" + default_theme + ".php");
    xmlhttp.send();
}
function getDefOfferDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("reminderDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcustofferremind" + default_theme + ".php");
    xmlhttp.send();
}
function getUnvisitCustDiv(unvisitCustPanelDiv) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("reminderDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omunvisitcustremind" + default_theme + ".php?unvisitCustPanelDiv=" + unvisitCustPanelDiv);
    xmlhttp.send();
}
function unvisitCustRemind(monthBtn) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("unvisitCust").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omunvisitcust" + default_theme + ".php?monthBtn=" + monthBtn);
    xmlhttp.send();
}
function unvisitCustIndi(userId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("unvisitCust").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omunvisitcustindi" + default_theme + ".php?userId=" + userId);
    xmlhttp.send();
}
function getReminderDiv(panelDiv) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("reminderDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcustbareminder" + default_theme + ".php?panelDiv=" + panelDiv);
    xmlhttp.send();
}
function birthAnniReminder(birthAnnyRemind) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("remindSms").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombirthaniremind" + default_theme + ".php?birthAnnyRemind=" + birthAnnyRemind);
    xmlhttp.send();
}
function indiReminder(userId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("remindSms").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombirthaniindiremind" + default_theme + ".php?userId=" + userId);
    xmlhttp.send();
}
function offerReminder(smsTemplate) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("offerSms").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omofferreminder" + default_theme + ".php?smsTemplate=" + smsTemplate);
    xmlhttp.send();
}
//function offerReminderWa(smsTemplate) {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
//        {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("offerSms").innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    xmlhttp.open("POST", "include/php/omofferreminderwa"+ default_theme +".php?smsTemplate=" + smsTemplate);
//    xmlhttp.send();
//}
function setSmsTemplate(smsTem) {
    //document.getElementByClassName("modal-backdrop").remove();
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("offerSmsTem").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omoffersmstemplate" + default_theme + ".php?smsTem=" + smsTem);
    xmlhttp.send();
    document.getElementById("sms-template-modal").style.display = "block";
}
function setMsgTemp() {
    setTimeout(getDefOfferDiv, 0);
}
function indiRemindWa(userId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("remindSms").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombirthaniindiwa" + default_theme + ".php?userId=" + userId);
    xmlhttp.send();
}
function unvisitindiwa(userId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("unvisitCust").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omunvisitcustindiwa" + default_theme + ".php?userId=" + userId);
    xmlhttp.send();
}
//
//
function validateNotSubmit() {
    var taskStatus = document.getElementById("taskStatus").value;
    if (taskStatus === "" || taskStatus === "null" || taskStatus === "NULL" || taskStatus === "NotSelected") {
        document.getElementById("taskStatus").focus();
        alert("Please fill the Task Status");
        event.preventDefault();
        return false; // Prevent form submission
    }
    var hours = document.getElementById("hours").value;
    if (hours === "") {
        document.getElementById("hours").focus();
        alert("Please fill the hours Field");
        event.preventDefault();
        return false; // Prevent form submission
    }
    var minutes = document.getElementById("minutes").value;
    if (minutes === "") {
        document.getElementById("minutes").focus();
        alert("Please fill the minutes Field");
        event.preventDefault();
        return false; // Prevent form submission
    }
    var description = document.getElementById("description").value;
    if (description === "") {
        document.getElementById("description").focus();
        alert("Please fill the description Field");
        event.preventDefault();
        return false; // Prevent form submission
    }
    return true;

    const form = document.getElementById("myForm");
    let isValid = true;
    const requiredFields = form.querySelectorAll("[required]");

    for (let i = 0; i < requiredFields.length; i++) {
        if (!requiredFields[i].value.trim()) {
            isValid = false;
            // You can also add custom validation styling or messages here
            break; // Exit the loop early if a required field is empty
        }
    }
    //
    if (!isValid) {
        // Optionally display an error message or styling
        alert("Please fill out all required fields.");
    }
    //
    return isValid;
    //     
}
//
//
function updateOfferTemplate() {
    var userType = document.getElementById("userType").value;
    var firmId = document.getElementById("smsFirmId").value;
    var interestList = document.getElementById("interestList").value;
    var transactionType = document.getElementById("transactionType").value;
    var userGroup = document.getElementById("allUsergroup").value;
    var smsStaffId = document.getElementById("smsStaffId").value;
    var city = document.getElementById("city").value;
    var userGender = document.getElementById("userGender").value;
    var selectDate = document.getElementById("selectedValues").value;
    var smsTem = document.getElementById("smsTemp");
    var smsTemplate = smsTem.textContent;


//    alert(countTable);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("updateOfferSmsTem").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omupdateoffersmstem" + default_theme + ".php?userType=" + userType + "&firmId=" + firmId + "&interestList=" + interestList + "&transactionType=" + transactionType + "&userGroup=" + userGroup + "&smsStaffId=" + smsStaffId + "&city=" + city + "&userGender=" + userGender + "&selectDate=" + selectDate + "&smsTemplate=" + smsTemplate);
    xmlhttp.send();
}

////////-----Start code for multiple date pick calender @AUTHOR-VISHAL 10MAR2021-----//////// 
var calenderMonths = [];
var calenderSelectedDates = [];
var calenderYears = [];
var calenderToday = new Date();
var calenderCurrentMonth = calenderToday.getMonth();
var calenderCurrentYear = calenderToday.getFullYear();
var calenderSelectYear = document.getElementById("year");
var calenderSelectMonth = document.getElementById("month");
// parameters to be set for the datepicker to run accordingly
var calenderMinYear = calenderCurrentYear - 1;
var calenderMaxYear = calenderCurrentYear + 2;
var calenderStartMonth = 0;
var calenderEndMonth = 11;
var highlightToday = true;
var calenderDateSeparator = ',';

// constants that would be used in the script
var calenderMonth =
        [
            ["JAN", 0],
            ["FEB", 1],
            ["MAR", 2],
            ["APR", 3],
            ["MAY", 4],
            ["JUN", 5],
            ["JUL", 6],
            ["AUG", 7],
            ["SEP", 8],
            ["OCT", 9],
            ["NOV", 10],
            ["DEC", 11]
        ];

//this class will add a background to the selected date
var highlightClass = 'highlight';

function calenderDatePick() {
    $(document).ready(function (e) {
        calenderToday = new Date();
        calenderCurrentMonth = calenderToday.getMonth();
        calenderCurrentYear = calenderToday.getFullYear();
        calenderSelectYear = document.getElementById("year");
        calenderSelectMonth = document.getElementById("month");
        calenderLoadControl(calenderCurrentMonth, calenderCurrentYear);
    });
}
// check how many days in a month code from https://dzone.com/articles/determining-number-days-month
function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}
// adds the months to the dropdown
function addMonths(selectedMonth) {
    var select = document.getElementById("month");

    if (calenderMonths.length > 0) {
        return;
    }
    for (var month = calenderStartMonth; month <= calenderEndMonth; month++) {
        var monthInstance = calenderMonth[month];
        calenderMonths.push(monthInstance[0]);
        select.options[select.options.length] = new Option(monthInstance[0], monthInstance[1], parseInt(monthInstance[1]) === parseInt(selectedMonth));
    }
}
// adds the calenderYears to the selection dropdown
// by default it is from 1990 to 2030
function addYears(selectedYear) {
    if (calenderYears.length > 0) {
        return;
    }
    var select = document.getElementById("year");
    for (var year = calenderMinYear; year <= calenderMaxYear; year++) {
        calenderYears.push(year);
        select.options[select.options.length] = new Option(year, year, parseInt(year) === parseInt(selectedYear));
    }
}

resetCalendar = function resetCalendar() {
    // reset all the selected dates
    calenderSelectedDates = [];
    $('#calendarBody tr').each(function () {
        $(this).find('td').each(function () {
            // $(this) will be the current cell
            $(this).removeClass(highlightClass);
        });
    });
};

function datesToString(dates) {
    return dates.join(calenderDateSeparator);
}

function endSelection() {
    $('#parent').hide();
}

// to add the button panel at the bottom of the calendar
function addButtonPanel(tbl) {
    // after we have looped for all the days and the calendar is complete,
    // we will add a panel that will show the buttons, reset and done
    var row = document.createElement("tr");
    row.className = 'buttonPanel';
    cell = document.createElement("td");
    cell.colSpan = 7;
    var parentDiv = document.createElement("div");
    parentDiv.classList.add('row');
    parentDiv.classList.add('buttonPanel-row');

    var div = document.createElement("div");
    div.className = 'col-sm';
    var resetButton = document.createElement("button");
    resetButton.className = 'btn';
    resetButton.value = 'Reset';
    resetButton.onclick = function () {
        resetCalendar();
    };
    var resetButtonText = document.createTextNode("Reset");
    resetButton.appendChild(resetButtonText);

    div.appendChild(resetButton);
    parentDiv.appendChild(div);

    var div2 = document.createElement("div");
    div2.className = 'col-sm';
    var doneButton = document.createElement("button");
    doneButton.className = 'btn';
    doneButton.value = 'Done';
    doneButton.onclick = function () {
        endSelection();
    };
    var doneButtonText = document.createTextNode("Done");
    doneButton.appendChild(doneButtonText);

    div2.appendChild(doneButton);
    parentDiv.appendChild(div2);

    cell.appendChild(parentDiv);
    row.appendChild(cell);
    // appending each row into calendar body.
    tbl.appendChild(row);
}

function calenderNext() {
    calenderCurrentYear = calenderCurrentMonth === 11 ? calenderCurrentYear + 1 : calenderCurrentYear;
    calenderCurrentMonth = calenderCurrentMonth + 1 % 12;
    calenderLoadControl(calenderCurrentMonth, calenderCurrentYear);
}

function calenderPrevious() {
    calenderCurrentYear = calenderCurrentMonth === 0 ? calenderCurrentYear - 1 : calenderCurrentYear;
    calenderCurrentMonth = calenderCurrentMonth === 0 ? 11 : calenderCurrentMonth - 1;
    calenderLoadControl(calenderCurrentMonth, calenderCurrentYear);
}

function calenderChange() {
    calenderCurrentYear = parseInt(calenderSelectYear.value);
    calenderCurrentMonth = parseInt(calenderSelectMonth.value);
    calenderLoadControl(calenderCurrentMonth, calenderCurrentYear);
}

function calenderLoadControl(month, year) {
    addMonths(month);
    addYears(year);

    var firstDay = (new Date(year, month)).getDay();
    // body of the calendar
    var tbl = document.querySelector("#calendarBody");
    // clearing all previous cells
    tbl.innerHTML = "";

    var monthAndYear = document.getElementById("monthAndYear");
    // filing data about month and in the page via DOM.
    monthAndYear.innerHTML = calenderMonths[month] + " " + year;

    calenderSelectYear.value = year;
    calenderSelectMonth.value = month;

    // creating the date cells here
    var date = 1;

    // add the selected dates here to preselect
    //calenderSelectedDates.push((month + 1).toString() + '/' + date.toString() + '/' + year.toString());

    // there will be maximum 6 rows for any month
    for (var rowIterator = 0; rowIterator < 6; rowIterator++) {

        // creates a new table row and adds it to the table body
        var row = document.createElement("tr");

        //creating individual cells, filing them up with data.
        for (var cellIterated = 0; cellIterated < 7 && date <= daysInMonth(month, year); cellIterated++) {

            // create a table data cell
            cell = document.createElement("td");
            var textNode = "";
            // check if this is the valid date for the month
            if (rowIterator !== 0 || cellIterated >= firstDay) {
                cell.id = (month + 1).toString() + '/' + date.toString() + '/' + year.toString();
                cell.class = "clickable";
                textNode = date;
                // this means that highlightToday is set to true and the date being iterated it todays date,
                // in such a scenario we will give it a background color
                if (highlightToday
                        && date === calenderToday.getDate() && year === calenderToday.getFullYear() && month === calenderToday.getMonth()) {
                    cell.classList.add("today-color");
                }

                // set the previous dates to be selected
                // if the calenderSelectedDates array has the dates, it means they were selected earlier. 
                // add the background to it.
                if (calenderSelectedDates.indexOf((month + 1).toString() + '/' + date.toString() + '/' + year.toString()) >= 0) {
                    cell.classList.add(highlightClass);
                }
                date++;
            }

            cellText = document.createTextNode(textNode);
            cell.appendChild(cellText);
            row.appendChild(cell);
        }

        tbl.appendChild(row); // appending each row into calendar body.
    }

    // this adds the button panel at the bottom of the calendar
    addButtonPanel(tbl);
    // function when the date cells are clicked
    $("#calendarBody tr td").click(function (e) {
        var id = $(this).attr('id');
        // check the if cell clicked has a date
        // those with an id, have the date
        if (typeof id !== typeof undefined) {
            var classes = $(this).attr('class');
            if (typeof classes === typeof undefined || !classes.includes(highlightClass)) {
                var selectedDate = new Date(id);
                calenderSelectedDates.push((selectedDate.getMonth() + 1).toString() + '/' + selectedDate.getDate().toString() + '/' + selectedDate.getFullYear());
            } else {
                var index = calenderSelectedDates.indexOf(id);
                if (index > -1) {
                    calenderSelectedDates.splice(index, 1);
                }
            }

            $(this).toggleClass(highlightClass);
        }

        // sort the selected dates array based on the latest date first
        var sortedArray = calenderSelectedDates.sort((a, b) => {
            return new Date(a) - new Date(b);
        });

        // update the selectedValues text input
        document.getElementById('selectedValues').value = datesToString(sortedArray);
    });

    var $search = $('#selectedValues');
    var $dropBox = $('#parent');

    $search.on('blur', function (event) {
        //$dropBox.hide();
    }).on('focus', function () {
        $dropBox.show();
    });
}
////////-----End code for multiple date pick calender @AUTHOR-VISHAL 12MAR2021-----////////    
//*************************************************************************************************************
//* END CODE TO ADD FUNCTION TO SHOW REMINDER MODAL PANEL AND SEND MESSAGE @AUTHOR-VISHAL 12MAR2021
//*************************************************************************************************************
//
// **************************************************************************************************************
// START TO ADDED FUNCTION FOR PURCHASE RETURN PANEL @PRIYANKA-03MAR2021
// **************************************************************************************************************
function purReturnCalFunc() {
    //
    var suppPurLotEntered = 0;
    var totalFinVal = 0;
    var totalLabNOthCharges = 0;
    var wastg = 0;
    var suppPurItemEntered = 0;
    var totalVal = 0;
    var totalLabNOthCharges = 0;
    var totalGsWt = 0;
    var gsWtKG = 0;
    var gsWtGM = 0;
    var ntWtKG = 0;
    var ntWtGM = 0;
    var totalNtWt = 0;
    var finVal = 0;
    var fnWt = 0;
    var itemCryVal;
    var finVal;
    var itemTotCryVal;
    var totVal;
    var finTotVal;
    var labTotal = 0;
    var rateNWt;
    var totalRateNWt = 0;
    var finalTotalVal = 0;
    //
    //alert('sttr_gs_weight == ' + document.getElementById('sttr_gs_weight').value);
    //
    if (document.getElementById('sttr_gs_weight_type').value != document.getElementById('sttr_nt_weight_type').value) {
        document.getElementById('sttr_nt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;
        document.getElementById('utransFinalWeightTyp').value = document.getElementById('sttr_gs_weight_type').value;
        document.getElementById('sttr_pkt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;
    }
    //
    var netweight = document.getElementById('sttr_nt_weight').value;
    var weight = document.getElementById('sttr_final_fine_weight').value;
    var metalType = document.getElementById('sttr_metal_type').value;
    var tounch = document.getElementById('sttr_purity').value;
    var metalRate = document.getElementById('sttr_metal_rate').value;
    var wtType = document.getElementById('sttr_nt_weight_type').value;
    var labCharges = document.getElementById('sttr_lab_charges').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;
    var wastg = document.getElementById('sttr_wastage').value;
    var qty = document.getElementById('sttr_quantity').value;
    //
    if (document.getElementById('sttr_final_val_by').value == 'byGrossWt') {
        var weight = document.getElementById('sttr_gs_weight').value;
        var wtType = document.getElementById('sttr_gs_weight_type').value;
    } else {
        var weight = document.getElementById('sttr_nt_weight').value;
        var wtType = document.getElementById('sttr_nt_weight_type').value;
    }
    //
    if (document.getElementById('sttr_other_charges_by').value == 'lbByNetWt') {
        var weight = parseFloat(document.getElementById('sttr_nt_weight').value);
    } else if (document.getElementById('sttr_other_charges_by').value == 'lbByGrossWt') {
        var weight = parseFloat(document.getElementById('sttr_gs_weight').value);
    } else if (document.getElementById('sttr_other_charges_by').value == 'lbByFineWt') {
        var weight = document.getElementById('sttr_final_fine_weight').value;
    }
    //
    if (labCharges != '') {
        if (labChargesType == 'KG') {
            if (wtType == 'KG')
                totalLabNOthCharges = labCharges * weight;
            else if (wtType == 'GM')
                totalLabNOthCharges = (labCharges / 1000) * weight;
            else
                totalLabNOthCharges = (labCharges / (1000 * 1000)) * weight;
        } else if (labChargesType == 'GM') {
            if (wtType == 'KG')
                totalLabNOthCharges = labCharges * 1000 * weight;
            else if (wtType == 'GM')
                totalLabNOthCharges = labCharges * weight;
            else
                totalLabNOthCharges = (labCharges / 1000) * weight;
        } else if (labChargesType == 'MG') {
            if (wtType == 'KG')
                totalLabNOthCharges = labCharges * 1000 * 1000 * weight;
            else if (wtType == 'GM')
                totalLabNOthCharges = labCharges * 1000 * weight;
            else
                totalLabNOthCharges = labCharges * weight;
        } else if (labChargesType == 'PP') {
            totalLabNOthCharges = parseFloat(labCharges * qty);
        }
    }
    //
    //
    if (wastg == '')
        wastg = 0;
    //
    //
    document.getElementById('sttr_fine_weight').value = ((parseFloat(tounch) * netweight) / 100).toFixed(3);
    //
    weight = (((parseFloat(wastg) + parseFloat(tounch)) * netweight) / 100).toFixed(3);
    //
    document.getElementById('sttr_final_fine_weight').value = parseFloat(weight).toFixed(3);
    //
     if (document.getElementById('sttr_final_valuation_by').value == 'byGrossWt') {
        weightForMetalCal = document.getElementById('sttr_gs_weight').value;
    } else if (document.getElementById('sttr_final_valuation_by').value == 'byNetWt') {
        weightForMetalCal = document.getElementById('sttr_nt_weight').value;
    } else if (document.getElementById('sttr_final_valuation_by').value == 'byFineWt') {
        weightForMetalCal = document.getElementById('sttr_fine_weight').value;
    } else if (document.getElementById('sttr_final_valuation_by').value == 'byFFineWt') {
        weightForMetalCal = document.getElementById('sttr_final_fine_weight').value;
    } else {
        weightForMetalCal = document.getElementById('sttr_gs_weight').value;
    }
    if (metalType == 'Gold') {
        if (wtType == 'KG') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) * document.getElementById('gmWtInKg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) * document.getElementById('gmWtInKg').value + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'GM') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) / document.getElementById('gmWtInGm').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) / document.getElementById('gmWtInGm').value + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'MG') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) / document.getElementById('gmWtInMg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) / document.getElementById('gmWtInMg').value + totalLabNOthCharges).toFixed(2);
        }
    } else if (metalType == 'Silver') {
        if (wtType == 'KG') {
            document.getElementById('sttr_valuation').value = (weightForMetalCal * metalRate * document.getElementById('srGmWtInKg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate * document.getElementById('srGmWtInKg').value) + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'GM') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) / document.getElementById('srGmWtInGm').value + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'MG') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) / document.getElementById('srGmWtInMg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) / document.getElementById('srGmWtInMg').value + totalLabNOthCharges).toFixed(2);
        }
    } else {
        document.getElementById('sttr_valuation').value = 0;
        document.getElementById('suppItemTotVal').value = 0;
    }
    //
    if ((document.getElementById('sttr_tax').value).trim() == '' || document.getElementById('sttr_tax').value == 'NaN') {
        document.getElementById('sttr_tax').value = 0;
    }
    //
    var val = parseFloat(document.getElementById('suppItemTotVal').value).toFixed(2);
    //
    var tax = document.getElementById('sttr_tax').value;
    //
    if (val == '')
        val = 0;
    //
    if (tax == '')
        tax = 0;
    //
    document.getElementById('sttr_tot_tax').value = (parseFloat(val) * parseFloat(tax) / 100).toFixed(2);
    //
    if (val == '')
        val = 0;
    //
    if (document.getElementById('sttr_tot_tax').value == '')
        document.getElementById('sttr_tot_tax').value = 0;
    //
    if ((document.getElementById('sttr_stone_valuation').value) == '' || document.getElementById('sttr_stone_valuation').value == 'NaN') {
        document.getElementById('sttr_stone_valuation').value = 0;
    }
    //
    //
    document.getElementById('sttr_final_valuation').value = (parseFloat(val) + parseFloat(document.getElementById('sttr_tot_tax').value) + parseFloat(document.getElementById('sttr_stone_valuation').value)).toFixed(2);
    //
    //
    if ((document.getElementById('sttr_final_valuation').value).trim() == '' || document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }
    //
    if ((document.getElementById('sttr_final_fine_weight').value).trim() == '' || document.getElementById('sttr_final_fine_weight').value == 'NaN') {
        document.getElementById('sttr_final_fine_weight').value = 0;
    }
    //
    if ((document.getElementById('sttr_valuation').value).trim() == '' || document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }
    //
    if ((document.getElementById('sttr_tot_tax').value).trim() == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }
    //
    var gsWt = document.getElementById('sttr_gs_weight').value
    var gsWtType = document.getElementById('sttr_gs_weight_type').value;
    //
    if (gsWt != '') {
        if (gsWtType != 'GM')
            gsWtKG += convert('GM', gsWtType, gsWt);
        else
            gsWtGM += parseFloat(gsWt);
        totalGsWt = parseFloat(gsWtKG) + parseFloat(gsWtGM);
    }
    //
    var ntWt = document.getElementById('sttr_nt_weight').value;
    var ntWtType = document.getElementById('sttr_nt_weight_type').value;
    //
    if (ntWt != '') {
        if (ntWtType != 'GM')
            ntWtKG = convert('GM', ntWtType, ntWt);
        else
            ntWtGM += parseFloat(ntWt);
        totalNtWt = parseFloat(ntWtKG) + parseFloat(ntWtGM);
    }
    //
    var finalFineWeight = document.getElementById('sttr_final_fine_weight').value;
    //
    if (finalFineWeight != '') {
        fnWt += parseFloat(finalFineWeight);
        document.getElementById('sttr_final_fine_weight').value = (fnWt).toFixed(3);
    }
    //
    var labCharges = document.getElementById('sttr_lab_charges').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;
    //
    if ((document.getElementById('sttr_tot_tax').value).trim() == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }
    //
    if ((document.getElementById('sttr_tot_tax').value).trim() == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }
    //
    document.getElementById('sttr_final_purity').value = (parseFloat(document.getElementById('sttr_purity').value) + parseFloat(document.getElementById('sttr_wastage').value));
    //
    document.getElementById('sttr_total_lab_charges').value = parseFloat(totalLabNOthCharges).toFixed(2);
    //
    finVal += parseFloat(document.getElementById('sttr_final_valuation').value);
    //
    document.getElementById('sttr_final_valuation').value = (finVal).toFixed(2);
    //
    if ((document.getElementById('sttr_final_purity').value).trim() == '' || document.getElementById('sttr_final_purity').value == 'NaN') {
        document.getElementById('sttr_final_purity').value = 0;
    }
    //
    var cashRec = 0;
    //
    if (cashRec == '')
        cashRec = 0;
    //
    var totAmt = 0;
    //
    if (totAmt == '')
        totAmt = 0;
    //
    var totAmtRec = 0;
    //
    if (totAmtRec == '')
        totAmtRec = 0;
    //
    totalLabNOthCharges = 0;
    //
    suppPurLotEntered++;
    //
    return false;
}
// **************************************************************************************************************
// END TO ADDED FUNCTION FOR PURCHASE RETURN PANEL @PRIYANKA-03MAR2021
// **************************************************************************************************************
//
//
// **************************************************************************************************************
// START TO ADDED FUNCTION FOR FINE_JEWELLERY_PUR_B2 FORM @PRIYANKA-03MAR2021
// **************************************************************************************************************
function purFormB2CalFunc() {
    //
    //
    var suppPurLotEntered = 0;
    var totalFinVal = 0;
    var totalLabNOthCharges = 0;
    var wastg = 0;
    var suppPurItemEntered = 0;
    var totalVal = 0;
    var totalLabNOthCharges = 0;
    var totalGsWt = 0;
    var gsWtKG = 0;
    var gsWtGM = 0;
    var ntWtKG = 0;
    var ntWtGM = 0;
    var totalNtWt = 0;
    var finVal = 0;
    var fnWt = 0;
    var itemCryVal;
    var finVal;
    var itemTotCryVal;
    var totVal;
    var finTotVal;
    var labTotal = 0;
    var rateNWt;
    var totalRateNWt = 0;
    var finalTotalVal = 0;
    //
    //alert('sttr_gs_weight == ' + document.getElementById('sttr_gs_weight').value);
    //
    if (document.getElementById('sttr_gs_weight_type').value != document.getElementById('sttr_nt_weight_type').value) {
        document.getElementById('sttr_nt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;
        document.getElementById('utransFinalWeightTyp').value = document.getElementById('sttr_gs_weight_type').value;
        document.getElementById('sttr_pkt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;
    }
    //
    //
    var netweight = document.getElementById('sttr_nt_weight').value;
    var weight = document.getElementById('sttr_final_fine_weight').value;
    var metalType = document.getElementById('sttr_metal_type').value;
    var tounch = document.getElementById('sttr_purity').value;
    var metalRate = document.getElementById('sttr_metal_rate').value;
    var wtType = document.getElementById('sttr_nt_weight_type').value;
    var labCharges = document.getElementById('sttr_lab_charges').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;
    var wastg = document.getElementById('sttr_wastage').value;
    var qty = document.getElementById('sttr_quantity').value;
    //
    //
    if (document.getElementById('sttr_final_val_by').value == 'byGrossWt') {
        var weight = document.getElementById('sttr_gs_weight').value;
        var wtType = document.getElementById('sttr_gs_weight_type').value;
    } else {
        var weight = document.getElementById('sttr_nt_weight').value;
        var wtType = document.getElementById('sttr_nt_weight_type').value;
    }
    //
    //
    if (document.getElementById('sttr_other_charges_by').value == 'lbByNetWt') {
        var weight = parseFloat(document.getElementById('sttr_nt_weight').value);
    } else if (document.getElementById('sttr_other_charges_by').value == 'lbByGrossWt') {
        var weight = parseFloat(document.getElementById('sttr_gs_weight').value);
    } else if (document.getElementById('sttr_other_charges_by').value == 'lbByFineWt') {
        var weight = document.getElementById('sttr_final_fine_weight').value;
    }
    //
    //
    if (labCharges != '') {
        if (labChargesType == 'KG') {
            if (wtType == 'KG')
                totalLabNOthCharges = labCharges * weight;
            else if (wtType == 'GM')
                totalLabNOthCharges = (labCharges / 1000) * weight;
            else
                totalLabNOthCharges = (labCharges / (1000 * 1000)) * weight;
        } else if (labChargesType == 'GM') {
            if (wtType == 'KG')
                totalLabNOthCharges = labCharges * 1000 * weight;
            else if (wtType == 'GM')
                totalLabNOthCharges = labCharges * weight;
            else
                totalLabNOthCharges = (labCharges / 1000) * weight;
        } else if (labChargesType == 'MG') {
            if (wtType == 'KG')
                totalLabNOthCharges = labCharges * 1000 * 1000 * weight;
            else if (wtType == 'GM')
                totalLabNOthCharges = labCharges * 1000 * weight;
            else
                totalLabNOthCharges = labCharges * weight;
        } else if (labChargesType == 'PP') {
            totalLabNOthCharges = parseFloat(labCharges * qty);
        }
    }
    //
    //
    if (wastg == '')
        wastg = 0;
    //
    //
    document.getElementById('sttr_fine_weight').value = ((parseFloat(tounch) * netweight) / 100).toFixed(3);
    //
    weight = (((parseFloat(wastg) + parseFloat(tounch)) * netweight) / 100).toFixed(3);
    //
    document.getElementById('sttr_final_fine_weight').value = parseFloat(weight).toFixed(3);
    //
    //
    var gsWt = document.getElementById('sttr_gs_weight').value
    var gsWtType = document.getElementById('sttr_gs_weight_type').value;
    //
    if (gsWt != '') {
        if (gsWtType != 'GM')
            gsWtKG += convert('GM', gsWtType, gsWt);
        else
            gsWtGM += parseFloat(gsWt);
        totalGsWt = parseFloat(gsWtKG) + parseFloat(gsWtGM);
    }
    //
    var ntWt = document.getElementById('sttr_nt_weight').value;
    var ntWtType = document.getElementById('sttr_nt_weight_type').value;
    //
    if (ntWt != '') {
        if (ntWtType != 'GM')
            ntWtKG = convert('GM', ntWtType, ntWt);
        else
            ntWtGM += parseFloat(ntWt);
        totalNtWt = parseFloat(ntWtKG) + parseFloat(ntWtGM);
    }
    //
    //
    var finalFineWeight = document.getElementById('sttr_final_fine_weight').value;
    //
    if (finalFineWeight != '') {
        fnWt += parseFloat(finalFineWeight);
        document.getElementById('sttr_final_fine_weight').value = (fnWt).toFixed(3);
    }
    //
    //
    var labCharges = document.getElementById('sttr_lab_charges').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;
    //
    //
    document.getElementById('sttr_final_purity').value = (parseFloat(document.getElementById('sttr_purity').value) + parseFloat(document.getElementById('sttr_wastage').value));
    //
    //
    document.getElementById('sttr_total_lab_charges').value = parseFloat(totalLabNOthCharges).toFixed(2);
    //
    //
    if ((document.getElementById('sttr_final_purity').value).trim() == '' || document.getElementById('sttr_final_purity').value == 'NaN') {
        document.getElementById('sttr_final_purity').value = 0;
    }
    //
    if (document.getElementById('sttr_final_fine_weight').value == 'NaN' || document.getElementById('sttr_final_fine_weight').value == 'undefined') {
        document.getElementById('sttr_final_fine_weight').value = "";
    }
    //
    var cashRec = 0;
    //
    if (cashRec == '')
        cashRec = 0;
    //
    var totAmt = 0;
    //
    if (totAmt == '')
        totAmt = 0;
    //
    var totAmtRec = 0;
    //
    if (totAmtRec == '')
        totAmtRec = 0;
    //
    totalLabNOthCharges = 0;
    //
    suppPurLotEntered++;
    //
    return false;
}
// **************************************************************************************************************
// END TO ADDED FUNCTION FOR FINE_JEWELLERY_PUR_B2 FORM @PRIYANKA-03MAR2021
// **************************************************************************************************************
//
//
// **************************************************************************************************************
// START TO ADDED FUNCTION FOR UPDATE FINE_JEWELLERY_PUR_B2 FORM @PRIYANKA-03MAR2021
// **************************************************************************************************************
function showSuppInvoicePurchaseB2Details(newPreInvoiceNo, newInvoiceNo, navPanel, suppId, payId, rateCutValue, mainPanel, transDate) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("suppHomePanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omwadinv" + default_theme + ".php?utinId=" + payId + "&panelName=UpdateItem&paymentPanelName=" + navPanel +
            "&preInvoiceNo=" + newPreInvoiceNo + "&PreInvoiceNo=" + newPreInvoiceNo +
            "&postInvoiceNo=" + newInvoiceNo + "&invoiceNo=" + newInvoiceNo +
            "&suppId=" + suppId + "&suppPayId=" + payId + "&mainPanel=" + mainPanel+ "&transDate=" + transDate, true);
    //
    xmlhttp.send();
    //
}
//
//
function showInvoiceMetaB2DetailsDiv(documentRootPath, utrId, panelName, stockType, suppId) {
    //
    //alert('panelName='+panelName);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("AddInvoiceMainDiv").innerHTML = xmlhttp.responseText;
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/omwadinv" + default_theme + ".php?utrId=" + utrId +
            "&panelName=" + panelName + "&stockType=" + stockType + "&suppId=" + suppId, true);
    //
    xmlhttp.send();
    //
}
//
//
// **************************************************************************************************************
// END TO ADDED FUNCTION FOR UPDATE FINE_JEWELLERY_PUR_B2 FORM @PRIYANKA-03MAR2021
// **************************************************************************************************************
//
function updateProcessingPercentage(documentRootPath, custId, girviId, processAmountPer, processingAmountId, finalPricipleAmtId, girviJrnlId, girviDOB, girviFirmId, girviSerialNum, panelName) {

    document.getElementById("updateProcessingAmtButton").style.visibility = "hidden";
    var processingPercentage = processAmountPer.value;
    var processingAmount = processingAmountId.value;
    var FinalPrincipalAmt = finalPricipleAmtId.value;
    //
//    var upPrincipalAMt = document.getElementById('upPrincipalAmt').value;
//    var upProcessingPer = document.getElementById('updateProcessingAmountPer').value;
//   
//    if (upPrincipalAMt == '' || upPrincipalAMt == 0)
//        upPrincipalAMt = 0;
//    if (upProcessingPer == '' || upProcessingPer == 0)
//        upProcessingPer = 0;
//    
//    var UpProcessingAmount = (parseFloat(parseFloat(upPrincipalAMt) * parseFloat(upProcessingPer) / 100)).toFixed(0);
//    var FinalPrincipalAmt = (parseFloat(parseFloat(upPrincipalAMt) - UpProcessingAmount)).toFixed(0);
    //
    if (validateEmptyField(processingPercentage, "Please Enter Processing Percentage!") == false ||
            validateNum(processingPercentage, "Accept only numeric characters without space character!") == false) {
        document.getElementById("updateProcessingAmountPer").focus();
        document.getElementById("updateProcessingAmtPerButton").style.visibility = "visible";
        return false;
    } else {
        confirm_box = confirm("Do you really want to update Processing Percentage?");
        if (confirm_box == true) {
            //
            var processingAmtPlusMinus = document.getElementById("processingAmountAction").value;
            //
            var poststr = "custId=" + custId + "&girviId=" + girviId
                    + "&processAmountPer=" + processingPercentage
                    + "&processingAmount=" + processingAmount
                    + "&FinalPrincipalAmt=" + FinalPrincipalAmt
                    + "&girviJrnlId=" + girviJrnlId
                    + "&processingAmountAction=" + processingAmtPlusMinus
                    + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum + "&panelName=" + panelName;// + "&UpProcessingAmount=" + UpProcessingAmount + "&upProcessingPer=" + upProcessingPer
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("POST", documentRootPath + "/include/php/olgumpam" + default_theme + ".php?" + poststr, true);
            xmlhttp.send();
        }
    }
    document.getElementById("updateProcessingAmtPerButton").style.visibility = "visible";
    return false;
}
//
function updateChargePercentage(documentRootPath, custId, girviId, chargeAmountPer, chargeAmountId, finalPricipleAmtId, girviJrnlId, girviDOB, girviFirmId, girviSerialNum, panelName) {

    document.getElementById("updateChargeAmtPerButton").style.visibility = "hidden";
    var chargeAmountPercentage = chargeAmountPer.value;
    var chargeAmount = chargeAmountId.value;
    var FinalPrincipalAmt = finalPricipleAmtId.value;
    if (validateEmptyField(chargeAmountPercentage, "Please Enter Processing Charges Percentage!") == false ||
            validateNum(chargeAmountPercentage, "Accept only numeric characters without space character!") == false) {
        document.getElementById("updateChargePerAmount").focus();
        document.getElementById("updateChargeAmtPerButton").style.visibility = "visible";
        return false;
    } else {
        confirm_box = confirm("Do you really want to update Charges Percentage?");
        if (confirm_box == true) {
            var chargesAmountAction = document.getElementById("chargesAmountAction").value;
            var poststr = "custId=" + custId + "&girviId=" + girviId
                    + "&chargeAmountPer=" + chargeAmountPercentage
                    + "&chargeAmount=" + chargeAmount
                    + "&FinalPrincipalAmt=" + FinalPrincipalAmt
                    + "&girviJrnlId=" + girviJrnlId
                    + "&chargesAmountAction=" + chargesAmountAction
                    + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum + "&panelName=" + panelName;

            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("POST", documentRootPath + "/include/php/olgumpam" + default_theme + ".php?" + poststr, true);
            xmlhttp.send();
        }
    }
    document.getElementById("updateChargeAmtPerButton").style.visibility = "visible";
    return false;
}
//
//
function calcFuncSupplierFineJewelleryPurchase() {
    var suppPurLotEntered = 0;
    var totalFinVal = 0;
    var totalLabNOthCharges = 0;
    var wastg = 0;
    var suppPurItemEntered = 0;
    var totalVal = 0;
    var totalLabNOthCharges = 0;
    var totalGsWt = 0;
    var gsWtKG = 0;
    var gsWtGM = 0;
    var ntWtKG = 0;
    var ntWtGM = 0;
    var totalNtWt = 0;
    var finVal = 0;
    var fnWt = 0;
    var itemCryVal;
    var finVal;
    var itemTotCryVal;
    var totVal;
    var finTotVal;
    var labTotal = 0;
    var rateNWt;
    var totalRateNWt = 0;
    var finalTotalVal = 0;
    var wastageWt = 0;
    var weightForMetalCal = 0;
    //
    if (document.getElementById('sttr_gs_weight_type').value != document.getElementById('sttr_nt_weight_type').value) {
        document.getElementById('sttr_nt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;
        document.getElementById('utransFinalWeightTyp').value = document.getElementById('sttr_gs_weight_type').value;
        document.getElementById('sttr_pkt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;
    }
    //
    var netweight = document.getElementById('sttr_nt_weight').value;
    var weight = document.getElementById('sttr_final_fine_weight').value;
    var metalType = document.getElementById('sttr_metal_type').value;
    var tounch = document.getElementById('sttr_purity').value;
    var metalRate = document.getElementById('sttr_metal_rate').value;
    var wtType = document.getElementById('sttr_nt_weight_type').value;
    var labCharges = document.getElementById('sttr_lab_charges').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;
    var wastg = document.getElementById('sttr_wastage').value;
    var qty = document.getElementById('sttr_quantity').value;
    var addHallamrkChargOnSilverItem = document.getElementById('addHallamrkChargOnSilverItem').value;
    //
    //
    //
    // FOR METAL RATE IN INTEGER FORMAT @PRIYANKA-20DEC2021
    var metal_Rate_Int_Val = parseInt(metalRate);
    //
    // FOR METAL RATE LENGTH @PRIYANKA-20DEC2021
    var metal_Rate_Int_Val_Length = metal_Rate_Int_Val.toString().length;
    //
    //
    //alert('metalRate == ' + metalRate);
    //alert('metalType == ' + metalType);
    //alert('metal_Rate_Int_Val == ' + metal_Rate_Int_Val);
    //alert('metal_Rate_Int_Val_Length == ' + metal_Rate_Int_Val_Length);
     if(document.getElementById('checkarateonegm').value == 'true'){
        document.getElementById('gmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
        document.getElementById('gmWtInGm').value = parseFloat(1).toFixed(2);
        document.getElementById('gmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
    }else{
    //
    // FOR METAL RATE @PRIYANKA-20DEC2021
    if (metal_Rate_Int_Val_Length == 4 && (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold')) {
        //
        // FOR GOLD METAL RATE PER GM @PRIYANKA-20DEC2021
        document.getElementById('gmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
        document.getElementById('gmWtInGm').value = parseFloat(1).toFixed(2);
        document.getElementById('gmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
        //
        //alert('gmWtInGm #== ' + document.getElementById('gmWtInGm').value);
        //
    } else if (metal_Rate_Int_Val_Length == 5 && (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold')) {
        //
        // FOR GOLD METAL RATE PER 10 GM @PRIYANKA-20DEC2021
        document.getElementById('gmWtInKg').value = parseFloat(1000 / 10).toFixed(2);
        document.getElementById('gmWtInGm').value = parseFloat(10).toFixed(2);
        document.getElementById('gmWtInMg').value = parseFloat(1000 * 10).toFixed(2);
        //
        //
    } else if (metal_Rate_Int_Val_Length == 2 && (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold')) {
        //
        // FOR GOLD METAL RATE PER 10 GM @PRIYANKA-20DEC2021
        document.getElementById('gmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
        document.getElementById('gmWtInGm').value = parseFloat(1).toFixed(2);
        document.getElementById('gmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
        //
        //
    } else if (metal_Rate_Int_Val_Length == 5 && (metalType == 'Silver' || metalType == 'SILVER' || metalType == 'silver')) {
        //
        // FOR SILVER METAL RATE PER KG @PRIYANKA-20DEC2021
        document.getElementById('srGmWtInKg').value = parseFloat(1).toFixed(2);
        document.getElementById('srGmWtInGm').value = parseFloat(1000 * 1).toFixed(2);
        document.getElementById('srGmWtInMg').value = parseFloat((1000 * 1000) * 1).toFixed(2);
        //
        //
    } else if (metal_Rate_Int_Val_Length == 2 && (metalType == 'Silver' || metalType == 'SILVER' || metalType == 'silver')) {
        //
        // FOR SILVER METAL RATE PER GM @PRIYANKA-20DEC2021
        document.getElementById('srGmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
        document.getElementById('srGmWtInGm').value = parseFloat(1).toFixed(2);
        document.getElementById('srGmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
        //
        //
    } else if (metal_Rate_Int_Val_Length == 5 && (metalType == 'StrSilver' || metalType == 'STRSILVER' || metalType == 'strsilver')) {
        //
        // FOR SILVER METAL RATE PER KG @PRIYANKA-20DEC2021
        document.getElementById('strsrGmWtInKg').value = parseFloat(1).toFixed(2);
        document.getElementById('strsrGmWtInGm').value = parseFloat(1000 * 1).toFixed(2);
        document.getElementById('strsrGmWtInMg').value = parseFloat((1000 * 1000) * 1).toFixed(2);
        //
        //
    } else if (metal_Rate_Int_Val_Length == 2 && (metalType == 'StrSilver' || metalType == 'STRSILVER' || metalType == 'strsilver')) {
        //
        // FOR SILVER METAL RATE PER GM @PRIYANKA-20DEC2021
        document.getElementById('strsrGmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
        document.getElementById('strsrGmWtInGm').value = parseFloat(1).toFixed(2);
        document.getElementById('strsrGmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
        //
        //
    }else if (metal_Rate_Int_Val_Length == 4 && (metalType == 'Platinum' || metalType == 'PLATINUM' || metalType == 'platinum')) {
        //
        // FOR GOLD METAL RATE PER GM @PRIYANKA-20DEC2021
        document.getElementById('platinumGmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
        document.getElementById('platinumGmWtInGm').value = parseFloat(1).toFixed(2);
        document.getElementById('platinumgmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
        //
        //alert('gmWtInGm #== ' + document.getElementById('gmWtInGm').value);
        //
    } else if (metal_Rate_Int_Val_Length == 2 && (metalType == 'Platinum' || metalType == 'PLATINUM' || metalType == 'platinum')) {
        //
        // FOR GOLD METAL RATE PER 10 GM @PRIYANKA-20DEC2021
        document.getElementById('platinumGmWtInKg').value = parseFloat(1000 / 10).toFixed(2);
        document.getElementById('platinumGmWtInGm').value = parseFloat(10).toFixed(2);
        document.getElementById('platinumgmWtInMg').value = parseFloat(1000 * 10).toFixed(2);
        //
        //
    }
    }
    //
    //
    //alert('gmWtInKg @== ' + document.getElementById('gmWtInKg').value);
    //alert('gmWtInGm @== ' + document.getElementById('gmWtInGm').value);
    //alert('gmWtInMg @== ' + document.getElementById('gmWtInMg').value);
    //
    //alert('srGmWtInKg @== ' + document.getElementById('srGmWtInKg').value);
    //alert('srGmWtInGm @== ' + document.getElementById('srGmWtInGm').value);
    //alert('srGmWtInMg @== ' + document.getElementById('srGmWtInMg').value);
    //
    //
    //
    if (document.getElementById('sttr_final_val_by').value == 'byGrossWt') {
        var weight = document.getElementById('sttr_gs_weight').value;
        var wtType = document.getElementById('sttr_gs_weight_type').value;
    } else {
        var weight = document.getElementById('sttr_nt_weight').value;
        var wtType = document.getElementById('sttr_nt_weight_type').value;
    }

    if (document.getElementById('sttr_other_charges_by').value == 'lbByNetWt') {
        weight = parseFloat(document.getElementById('sttr_nt_weight').value);
    } else if (document.getElementById('sttr_other_charges_by').value == 'lbByGrossWt') {
        weight = parseFloat(document.getElementById('sttr_gs_weight').value);
    } else if (document.getElementById('sttr_other_charges_by').value == 'lbByFineWt') {
        var weight = document.getElementById('sttr_final_fine_weight').value;
    }

    if (labCharges != '') {
        if (labChargesType == 'KG') {
            if (wtType == 'KG')
                totalLabNOthCharges = labCharges * weight;
            else if (wtType == 'GM')
                totalLabNOthCharges = (labCharges / 1000) * weight;
            else
                totalLabNOthCharges = (labCharges / (1000 * 1000)) * weight;
        } else if (labChargesType == 'GM') {
            if (wtType == 'KG')
                totalLabNOthCharges = labCharges * 1000 * weight;
            else if (wtType == 'GM')
                totalLabNOthCharges = labCharges * weight;
            else
                totalLabNOthCharges = (labCharges / 1000) * weight;
        } else if (labChargesType == 'MG') {
            if (wtType == 'KG')
                totalLabNOthCharges = labCharges * 1000 * 1000 * weight;
            else if (wtType == 'GM')
                totalLabNOthCharges = labCharges * 1000 * weight;
            else
                totalLabNOthCharges = labCharges * weight;
        } else if (labChargesType == 'PP') {
            totalLabNOthCharges = parseFloat(labCharges * qty);
        } else if (labChargesType == 'per') {
            labChargeByPer = (labCharges * weight) / 100;
            totalLabNOthCharges = labChargeByPer * metalRate;
        }else if (labChargesType == 'Fixed') {
            labChargeByPer = labCharges;
            totalLabNOthCharges = labChargeByPer;
        }
    }

    var labCharges = document.getElementById('sttr_lab_charges').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;

    document.getElementById('sttr_total_lab_charges').value = parseFloat(totalLabNOthCharges).toFixed(2);

    document.getElementById('sttr_fine_weight').value = (((parseFloat(tounch)) * netweight) / 100).toFixed(3);

    if ((document.getElementById('sttr_fine_weight').value).trim() == '' || document.getElementById('sttr_fine_weight').value == 'NaN') {
        document.getElementById('sttr_fine_weight').value = 0;
    }

    document.getElementById('sttr_final_purity').value = (parseFloat(document.getElementById('sttr_purity').value) + parseFloat(document.getElementById('sttr_wastage').value)); //added @Author:SHRI24FEB17

    if ((document.getElementById('sttr_final_purity').value).trim() == '' || document.getElementById('sttr_final_purity').value == 'NaN') {
        document.getElementById('sttr_final_purity').value = 0;
    }

    if (wastg == '')
        wastg = 0;

    weight = (((parseFloat(wastg) + parseFloat(tounch)) * netweight) / 100).toFixed(3);
    //
    if (document.getElementById('sttr_wastage_by').value == 'wastageByFineWt') {
        wastageWt = ((parseFloat(wastg) * document.getElementById('sttr_fine_weight').value) / 100).toFixed(3);
    } else if (document.getElementById('sttr_wastage_by').value == 'wastageByNetWt') {
        wastageWt = ((parseFloat(wastg) * document.getElementById('sttr_nt_weight').value) / 100).toFixed(3);
    } else {
        wastageWt = ((parseFloat(wastg) * document.getElementById('sttr_gs_weight').value) / 100).toFixed(3);
    }
    //
    document.getElementById('sttr_final_fine_weight').value = parseFloat(parseFloat(document.getElementById('sttr_fine_weight').value) + parseFloat(wastageWt)).toFixed(3);
   if(document.getElementById('calcPurchFnWt') != null){
    calculateWastageWtPurchase();
    }
    //
    if ((document.getElementById('sttr_final_fine_weight').value).trim() == '' || document.getElementById('sttr_final_fine_weight').value == 'NaN') {
        document.getElementById('sttr_final_fine_weight').value = 0;
    }

    var gsWt = document.getElementById('sttr_gs_weight').value
    var gsWtType = document.getElementById('sttr_gs_weight_type').value;

    if (gsWt != '') {
        if (gsWtType != 'GM')
            gsWtKG += convert('GM', gsWtType, gsWt);
        else
            gsWtGM += parseFloat(gsWt);
        totalGsWt = parseFloat(gsWtKG) + parseFloat(gsWtGM);
    }

    var ntWt = document.getElementById('sttr_nt_weight').value;
    var ntWtType = document.getElementById('sttr_nt_weight_type').value;
    if (ntWt != '') {
        if (ntWtType != 'GM')
            ntWtKG = convert('GM', ntWtType, ntWt);
        else
            ntWtGM += parseFloat(ntWt);
        totalNtWt = parseFloat(ntWtKG) + parseFloat(ntWtGM);
    }

    var finalFineWeight = document.getElementById('sttr_final_fine_weight').value;

    if (finalFineWeight != '') {
        fnWt += parseFloat(finalFineWeight);
        document.getElementById('sttr_final_fine_weight').value = (fnWt).toFixed(3);
    }
    //
    if (document.getElementById('sttr_final_valuation_by').value == 'byGrossWt') {
        weightForMetalCal = document.getElementById('sttr_gs_weight').value;
    } else if (document.getElementById('sttr_final_valuation_by').value == 'byNetWt') {
        weightForMetalCal = document.getElementById('sttr_nt_weight').value;
    } else if (document.getElementById('sttr_final_valuation_by').value == 'byFineWt') {
        weightForMetalCal = document.getElementById('sttr_fine_weight').value;
    } else if (document.getElementById('sttr_final_valuation_by').value == 'byFFineWt') {
        weightForMetalCal = document.getElementById('sttr_final_fine_weight').value;
    } else {
        weightForMetalCal = document.getElementById('sttr_gs_weight').value;
    }
    //
    if (metalType == 'Gold') {
        if (wtType == 'KG') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) * document.getElementById('gmWtInKg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) * document.getElementById('gmWtInKg').value + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'GM') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) / document.getElementById('gmWtInGm').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) / document.getElementById('gmWtInGm').value + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'MG') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) / document.getElementById('gmWtInMg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) / document.getElementById('gmWtInMg').value + totalLabNOthCharges).toFixed(2);
        }
    } else if (metalType == 'Silver') {
        if (wtType == 'KG') {
            document.getElementById('sttr_valuation').value = (weightForMetalCal * metalRate * document.getElementById('srGmWtInKg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate * document.getElementById('srGmWtInKg').value) + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'GM') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) / document.getElementById('srGmWtInGm').value + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'MG') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) / document.getElementById('srGmWtInMg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) / document.getElementById('srGmWtInMg').value + totalLabNOthCharges).toFixed(2);
        }
    } else if (metalType == 'strsilver') {
        if (wtType == 'KG') {
            document.getElementById('sttr_valuation').value = (weightForMetalCal * metalRate * document.getElementById('strsrGmWtInKg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate * document.getElementById('strsrGmWtInKg').value) + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'GM') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) / document.getElementById('strsrGmWtInGm').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) / document.getElementById('strsrGmWtInGm').value + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'MG') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) / document.getElementById('strsrGmWtInMg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) / document.getElementById('strsrGmWtInMg').value + totalLabNOthCharges).toFixed(2);
        }
    }else if (metalType == 'Platinum') {
        if (wtType == 'KG') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) * document.getElementById('platinumGmWtInKg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) * document.getElementById('platinumGmWtInKg').value + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'GM') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) / document.getElementById('platinumGmWtInGm').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) / document.getElementById('platinumGmWtInGm').value + totalLabNOthCharges).toFixed(2);
        } else if (wtType == 'MG') {
            document.getElementById('sttr_valuation').value = ((weightForMetalCal * metalRate) / document.getElementById('platinumgmWtInMg').value).toFixed(2);
            document.getElementById('suppItemTotVal').value = ((weightForMetalCal * metalRate) / document.getElementById('platinumgmWtInMg').value + totalLabNOthCharges).toFixed(2);
        }
    } else {
        document.getElementById('sttr_valuation').value = 0;
        document.getElementById('suppItemTotVal').value = 0;
    }

    if ((document.getElementById('sttr_tax').value).trim() == '' || document.getElementById('sttr_tax').value == 'NaN') {
        document.getElementById('sttr_tax').value = 0;
    }

    var val = parseFloat(document.getElementById('suppItemTotVal').value).toFixed(2);

    if (val == '') {
        val = 0;
    }
    //
    // ========================================================================================================== //
    // START CODE TO CALCULATE TOTAL HALLMARK CHARGES BY HALLMARK CHARGES AND QUANTITY @AUTHOR:MADHUREE-15JAN2022 //
    // ========================================================================================================== //
    //
//    var hallmarkCharges = document.getElementById('sttr_hallmark_charges').value;
//    var totalHallmarkCharges = '';
//    //
//    if (hallmarkCharges == '') {
//        hallmarkCharges = 0;
//    }
//    //
//    if (hallmarkCharges > 0) {
//        if (qty == '' || qty == 0) {
//            totalHallmarkCharges = parseFloat(hallmarkCharges).toFixed(2);
//        } else {
//            totalHallmarkCharges = parseFloat(hallmarkCharges * qty).toFixed(2);
//        }
//    } else {
//        totalHallmarkCharges = 0;
//    }
//    //
//    document.getElementById('sttr_total_hallmark_charges').value = parseFloat(totalHallmarkCharges).toFixed(2);
    //
    // ======================================================================================================== //
    // END CODE TO CALCULATE TOTAL HALLMARK CHARGES BY HALLMARK CHARGES AND QUANTITY @AUTHOR:MADHUREE-15JAN2022 //
    // ======================================================================================================== //
    //
    if ((document.getElementById('sttr_valuation').value).trim() == '' || document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = (0).toFixed(2);
    }

    var tax = document.getElementById('sttr_tax').value;

    if (tax == '')
        tax = 0;

    if (document.getElementById('sttr_tax').value > 0) {
        document.getElementById('sttr_tot_tax').value = (parseFloat(val) * parseFloat(tax) / 100).toFixed(2);
    } else {
        //
        // METAL CGST IN % @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_cgst_per').value == '' || document.getElementById('sttr_tot_price_cgst_per').value == 'NaN') {
            document.getElementById('sttr_tot_price_cgst_per').value = 0;
        }

        // CALCULATE MET CGST AMT => (METAL VAL * MET CGST IN %) / 100 @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_cgst_per').value != '') {
            document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(val) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
        }

        // MET CGST CHRG @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_cgst_chrg').value == '' || document.getElementById('sttr_tot_price_cgst_chrg').value == 'NaN') {
            document.getElementById('sttr_tot_price_cgst_chrg').value = 0;
        }

        // METAL SGST IN % @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_sgst_per').value == '' || document.getElementById('sttr_tot_price_sgst_per').value == 'NaN') {
            document.getElementById('sttr_tot_price_sgst_per').value = 0;
        }

        // CALCULATE MET SGST AMT => (METAL VAL * MET SGST IN %) / 100 @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_sgst_per').value != '') {
            document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(val) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
        }

        // MET SGST CHRG @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_sgst_chrg').value == '' || document.getElementById('sttr_tot_price_sgst_chrg').value == 'NaN') {
            document.getElementById('sttr_tot_price_sgst_chrg').value = 0;
        }

        // METAL IGST IN % @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_igst_per').value == '' || document.getElementById('sttr_tot_price_igst_per').value == 'NaN') {
            document.getElementById('sttr_tot_price_igst_per').value = 0;
        }

        // CALCULATE MET IGST AMT => (METAL VAL * MET IGST IN %) / 100 @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_igst_per').value != '') {
            document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(val) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
        }

        // MET IGST CHRG @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_igst_chrg').value == '' || document.getElementById('sttr_tot_price_igst_chrg').value == 'NaN') {
            document.getElementById('sttr_tot_price_igst_chrg').value = 0;
        }
        //
        //
        // CALCULATE TOT TAX AMT => MET CGST AMT + MET SGST AMT + MET IGST AMT @PRIYANKA-12MAR2021
        document.getElementById('sttr_tot_tax').value = parseFloat(parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
                parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
                parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);
        //
        //
        if (document.getElementById('sttr_tot_tax').value == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
            document.getElementById('sttr_tot_tax').value = 0;
        }
        //
        //
    }

    if (document.getElementById('sttr_tot_tax').value == '')
        document.getElementById('sttr_tot_tax').value = 0;

    if ((document.getElementById('sttr_tot_tax').value).trim() == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }

    if ((document.getElementById('sttr_tot_tax').value).trim() == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }

    if ((document.getElementById('sttr_tot_tax').value).trim() == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }

    if ((document.getElementById('sttr_stone_valuation').value) == '' || document.getElementById('sttr_stone_valuation').value == 'NaN') {
        document.getElementById('sttr_stone_valuation').value = 0;
    }
    //
    //
    // *************************************************************************************************************
    // ADDED FOR TOTAL HALLMARKING CHARGES INTO FINAL VALUATION @PRIYANKA-08JUNE2022
    // *************************************************************************************************************
    if ((metalType == 'Gold' || metalType == 'gold' || metalType == 'GOLD') || (addHallamrkChargOnSilverItem == 'YES' && (metalType == 'Silver' || metalType == 'silver' || metalType == 'SILVER'))) {   // ADDED CONDITIONS FOR ADD GOLD ITEM @SIMRAN:17APR2023
        if (typeof (document.getElementById('hallmarkingChargesBySetupPanel')) != 'undefined' &&
                (document.getElementById('hallmarkingChargesBySetupPanel') != null)) {
            //
            //
            if (typeof (document.getElementById('hallmarkingChargesTypeBySetupPanel')) != 'undefined' &&
                    (document.getElementById('hallmarkingChargesTypeBySetupPanel') != null)) {
                //
                //
                if (document.getElementById('sttr_total_hallmark_charges').value == '' || document.getElementById('sttr_total_hallmark_charges').value == 'NaN') {
                    document.getElementById('sttr_total_hallmark_charges').value = 0;
                }
                //
                //
                if (document.getElementById('hallmarkingChargesBySetupPanel').value == '' || document.getElementById('hallmarkingChargesBySetupPanel').value == 'NaN') {
                    document.getElementById('hallmarkingChargesBySetupPanel').value = 0;
                }
                //
                //
                // FOR HALLMARK CGST % @PRIYANKA-08JUNE2022
                if (document.getElementById('sttr_hallmark_cgst_per').value == '' || document.getElementById('sttr_hallmark_cgst_per').value == 'NaN') {
                    document.getElementById('sttr_hallmark_cgst_per').value = 0;
                }
                //
                //
                // FOR HALLMARK SGST % @PRIYANKA-08JUNE2022
                if (document.getElementById('sttr_hallmark_sgst_per').value == '' || document.getElementById('sttr_hallmark_sgst_per').value == 'NaN') {
                    document.getElementById('sttr_hallmark_sgst_per').value = 0;
                }
                //
                //
                // FOR HALLMARK IGST % @PRIYANKA-08JUNE2022
                //if (document.getElementById('sttr_hallmark_igst_per').value == '' || document.getElementById('sttr_hallmark_igst_per').value == 'NaN') {
                document.getElementById('sttr_hallmark_igst_per').value = 0;
                //}                      
                //
                //
                //
                var totalHallmarkCharges = 0;
                //
                //   
                if (document.getElementById('sttr_hallmark_charges').value != '' && document.getElementById('sttr_hallmark_charges').value != null) {
                    document.getElementById('hallmarkingChargesBySetupPanel').value = parseFloat(document.getElementById('sttr_hallmark_charges').value).toFixed(2);
                }
                //
                // FOR HALLMARKING CHARGES TYPE - FX @PRIYANKA-08JUNE2022
                if (document.getElementById('hallmarkingChargesTypeBySetupPanel').value == 'FX') {
                    totalHallmarkCharges = parseFloat(document.getElementById('hallmarkingChargesBySetupPanel').value).toFixed(2);
                }
                // 
                // FOR HALLMARKING CHARGES TYPE - PP @PRIYANKA-08JUNE2022
                else if (document.getElementById('hallmarkingChargesTypeBySetupPanel').value == 'PP') {
                    totalHallmarkCharges = parseFloat(parseFloat(qty) * parseFloat(document.getElementById('hallmarkingChargesBySetupPanel').value)).toFixed(2);
                }
                // 
                // FOR HALLMARKING CHARGES TYPE - GM @PRIYANKA-08JUNE2022
                else if (document.getElementById('hallmarkingChargesTypeBySetupPanel').value == 'GM' && document.getElementById('sttr_gs_weight_type').value == 'GM') {
                    totalHallmarkCharges = parseFloat(parseFloat(document.getElementById('sttr_gs_weight').value) * parseFloat(document.getElementById('hallmarkingChargesBySetupPanel').value)).toFixed(2);
                }
                // 
                // FOR HALLMARKING CHARGES TYPE - KG @PRIYANKA-08JUNE2022
                else if (document.getElementById('hallmarkingChargesTypeBySetupPanel').value == 'KG' && document.getElementById('sttr_gs_weight_type').value == 'KG') {
                    totalHallmarkCharges = parseFloat(parseFloat(document.getElementById('sttr_gs_weight').value) * parseFloat(document.getElementById('hallmarkingChargesBySetupPanel').value)).toFixed(2);
                } else {
                    totalHallmarkCharges = parseFloat(document.getElementById('hallmarkingChargesBySetupPanel').value).toFixed(2);
                }
                //
                //
                // TO CALCULATE HALLMARK CGST AMT @PRIYANKA-08JUNE2022
                if (document.getElementById('sttr_hallmark_cgst_per').value > 0) {
                    document.getElementById('sttr_hallmark_cgst_amt').value = parseFloat(parseFloat(totalHallmarkCharges) * (parseFloat(document.getElementById('sttr_hallmark_cgst_per').value) / 100)).toFixed(2);
                }
                //
                // TO CALCULATE HALLMARK SGST AMT @PRIYANKA-08JUNE2022
                if (document.getElementById('sttr_hallmark_sgst_per').value > 0) {
                    document.getElementById('sttr_hallmark_sgst_amt').value = parseFloat(parseFloat(totalHallmarkCharges) * (parseFloat(document.getElementById('sttr_hallmark_sgst_per').value) / 100)).toFixed(2);
                }
                //
                // TO CALCULATE HALLMARK IGST AMT @PRIYANKA-08JUNE2022
                if (document.getElementById('sttr_hallmark_igst_per').value > 0) {
                    document.getElementById('sttr_hallmark_igst_amt').value = parseFloat(parseFloat(totalHallmarkCharges) * (parseFloat(document.getElementById('sttr_hallmark_igst_per').value) / 100)).toFixed(2);
                }
                //
                //
                //alert('sttr_hallmark_cgst_amt @== ' + document.getElementById('sttr_hallmark_cgst_amt').value);
                //alert('sttr_hallmark_sgst_amt @== ' + document.getElementById('sttr_hallmark_sgst_amt').value);
                //alert('sttr_hallmark_igst_amt @== ' + document.getElementById('sttr_hallmark_igst_amt').value);
                //alert('totalHallmarkCharges @== ' + totalHallmarkCharges);
                //
                //
                // FOR HALLMARK CGST AMT @PRIYANKA-08JUNE2022
                if (document.getElementById('sttr_hallmark_cgst_amt').value == '' || document.getElementById('sttr_hallmark_cgst_amt').value == 'NaN') {
                    document.getElementById('sttr_hallmark_cgst_amt').value = 0;
                }
                //
                // FOR HALLMARK SGST AMT @PRIYANKA-08JUNE2022
                if (document.getElementById('sttr_hallmark_sgst_amt').value == '' || document.getElementById('sttr_hallmark_sgst_amt').value == 'NaN') {
                    document.getElementById('sttr_hallmark_sgst_amt').value = 0;
                }
                //
                // FOR HALLMARK IGST AMT @PRIYANKA-08JUNE2022
                //if (document.getElementById('sttr_hallmark_igst_amt').value == '' || document.getElementById('sttr_hallmark_igst_amt').value == 'NaN') {
                document.getElementById('sttr_hallmark_igst_amt').value = 0;
                //}
                //
                //
                // TO CALCULATE TOTAL HALLMARKING CHARGES @PRIYANKA-08JUNE2022
                document.getElementById('sttr_total_hallmark_charges').value = parseFloat(parseFloat(document.getElementById('sttr_hallmark_cgst_amt').value) +
                        parseFloat(document.getElementById('sttr_hallmark_sgst_amt').value) +
                        parseFloat(document.getElementById('sttr_hallmark_igst_amt').value) +
                        parseFloat(totalHallmarkCharges)).toFixed(2);
                //
                if (document.getElementById('sttr_total_hallmark_charges').value == '' || document.getElementById('sttr_total_hallmark_charges').value == 'NaN') {
                    document.getElementById('sttr_total_hallmark_charges').value = 0;
                }
                //
                //
                // TO CALCULATE FINAL VALUATION WITH HALLMARKING CHARGES @PRIYANKA-08JUNE2022
                //document.getElementById('sttr_final_valuation').value = parseFloat(parseFloat(document.getElementById('sttr_final_valuation').value) + parseFloat(document.getElementById('sttr_total_hallmark_charges').value)).toFixed(2);
                //
                //
            }
        }
    } 
//    else {
//        document.getElementById('sttr_total_hallmark_charges').value = 0;
//        document.getElementById('hallmarkingChargesBySetupPanel').value = 0;
//        document.getElementById('sttr_hallmark_cgst_per').value = 0;
//        document.getElementById('sttr_hallmark_sgst_per').value = 0;
//        document.getElementById('sttr_hallmark_igst_per').value = 0;
//    }  // END CONDITION FOR ADD GOLD STOCK @SIMRAN:17APR2023   
//        
     if (document.getElementById('sttr_total_hallmark_charges').value == '' || document.getElementById('sttr_total_hallmark_charges').value == 'NaN') {
      document.getElementById('sttr_total_hallmark_charges').value = 0;
       }

    document.getElementById('sttr_final_valuation').value = (parseFloat(val) + parseFloat(document.getElementById('sttr_tot_tax').value) + parseFloat(document.getElementById('sttr_stone_valuation').value) + parseFloat(document.getElementById('sttr_total_hallmark_charges').value)).toFixed(2); // Crystal Valuation added @Author:SHRI06JAN17

    if ((document.getElementById('sttr_final_valuation').value).trim() == '' || document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }

    finVal += parseFloat(document.getElementById('sttr_final_valuation').value);

    document.getElementById('sttr_final_valuation').value = (finVal).toFixed(2);

    var cashRec = 0;

    if (cashRec == '')
        cashRec = 0;

    var totAmt = 0;

    if (totAmt == '')
        totAmt = 0;

    var totAmtRec = 0;

    if (totAmtRec == '')
        totAmtRec = 0;

    totalLabNOthCharges = 0;

    suppPurLotEntered++;
    return false;
}
function calcFuncSupplierCrystalPurchase() {
    //
    var crystalQTY = parseInt(document.getElementById('sttr_quantity').value);
    var crystalGsWt = parseFloat(document.getElementById('sttr_gs_weight').value);
    var crystalGsWtTyp = document.getElementById('sttr_gs_weight_type').value;
    var crystalInvRate = parseFloat(document.getElementById('sttr_purchase_rate').value);
    var crystalRateType = document.getElementById('sttr_purchase_rate_type').value;
    var crystalTax = parseFloat(document.getElementById('sttr_tax').value);
    //
//    if (document.getElementById('sttr_item_category').value != '') {
//        document.getElementById('sttr_item_pre_id').value = document.getElementById('sttr_item_category').value;
//    }
    //
    // START CODE TO CALCULATE TOTAL LABOUR CHARGES @PRIYANKA-12MAR2021
    var totalLabCharges = 0;
    var labCharges = document.getElementById('sttr_lab_charges').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;
    //
    if (labCharges != '') {
        //
        if (labChargesType == 'KG') {
            if (crystalGsWtTyp == 'KG')
                totalLabCharges = labCharges;
            else if (crystalGsWtTyp == 'GM')
                totalLabCharges = (labCharges / 1000);
            else
                totalLabCharges = (labCharges / (1000 * 1000));
        } else if (labChargesType == 'GM') {
            if (crystalGsWtTyp == 'KG')
                totalLabCharges = labCharges * 1000;
            else if (crystalGsWtTyp == 'GM')
                totalLabCharges = labCharges;
            else
                totalLabCharges = (labCharges / 1000);
        } else if (labChargesType == 'MG') {
            if (crystalGsWtTyp == 'KG')
                totalLabCharges = labCharges * 1000 * 1000;
            else if (crystalGsWtTyp == 'GM')
                totalLabCharges = labCharges * 1000;
            else
                totalLabCharges = labCharges;
        } else if (labChargesType == 'PP') {
            totalLabCharges = labCharges * crystalQTY;
        }

    }
    //
    document.getElementById('sttr_total_lab_charges').value = parseFloat(totalLabCharges).toFixed(2);
    // END OF CODE TO CALCULATE TOTAL LABOUR CHARGES @PRIYANKA-12MAR2021
    //
    var totalGSWTNRate = 0;
    var totalCrystalTax = 0;
    var finalValuation = 0;
    //
    if (crystalRateType == 'KG') { // CRYSTAL RATE TYPE IN KG
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = crystalInvRate * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = (crystalInvRate / 1000) * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalGSWTNRate = (crystalInvRate * 0.0002) * crystalGsWt;
        else
            totalGSWTNRate = (crystalInvRate / (1000 * 1000)) * crystalGsWt;
    } else if (crystalRateType == 'GM') { // CRYSTAL RATE TYPE IN GM
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = crystalInvRate * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = crystalInvRate * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalGSWTNRate = (crystalInvRate * 0.2) * crystalGsWt;
        else
            totalGSWTNRate = (crystalInvRate / 1000) * crystalGsWt;
    } else if (crystalRateType == 'MG') { // CRYSTAL RATE TYPE IN MG
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = crystalInvRate * 1000 * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = crystalInvRate * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalGSWTNRate = (crystalInvRate * 200) * crystalGsWt;
        else
            totalGSWTNRate = crystalInvRate * crystalGsWt;
    } else if (crystalRateType == 'CT') { // CRYSTAL RATE TYPE IN CT
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = ((crystalInvRate / 0.0002) * crystalGsWt);
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = ((crystalInvRate / 0.2) * crystalGsWt);
        else if (crystalGsWtTyp == 'MG') // CRYSTAL WEIGHT TYPE IN MG
            totalGSWTNRate = ((crystalInvRate / 200) * crystalGsWt);
        else
            totalGSWTNRate = crystalInvRate * crystalGsWt;
    } else if (crystalRateType == 'PP') { // CRYSTAL RATE TYPE IN PP 
        totalGSWTNRate = crystalInvRate * crystalQTY; // CRYSTAL VAL 
    } else {
        totalGSWTNRate = crystalInvRate * crystalGsWt;
    }
    //
    document.getElementById('sttr_valuation').value = parseFloat(totalGSWTNRate).toFixed(2);
    //
    if (document.getElementById('sttr_valuation').value == 'NaN' || document.getElementById('sttr_valuation').value == '') {
        document.getElementById('sttr_valuation').value = 0;
    }
    //
    if (document.getElementById('sttr_tax').value > 0) {
        //
        totalCrystalTax = (parseFloat(document.getElementById('sttr_valuation').value) * (crystalTax / 100));
        //
        document.getElementById('sttr_tot_tax').value = parseFloat(totalCrystalTax).toFixed(2);
        //
    } else {
        //
        //
        // CGST IN % @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_cgst_per').value == '' || document.getElementById('sttr_tot_price_cgst_per').value == 'NaN') {
            document.getElementById('sttr_tot_price_cgst_per').value = 0;
        }

        // CALCULATE CGST AMT => (VAL * CGST IN %) / 100 @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_cgst_per').value != '') {
            document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
        }

        // CGST CHRG @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_cgst_chrg').value == '' || document.getElementById('sttr_tot_price_cgst_chrg').value == 'NaN') {
            document.getElementById('sttr_tot_price_cgst_chrg').value = 0;
        }

        // SGST IN % @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_sgst_per').value == '' || document.getElementById('sttr_tot_price_sgst_per').value == 'NaN') {
            document.getElementById('sttr_tot_price_sgst_per').value = 0;
        }

        // CALCULATE SGST AMT => (VAL * SGST IN %) / 100 @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_sgst_per').value != '') {
            document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
        }

        // SGST CHRG @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_sgst_chrg').value == '' || document.getElementById('sttr_tot_price_sgst_chrg').value == 'NaN') {
            document.getElementById('sttr_tot_price_sgst_chrg').value = 0;
        }

        // IGST IN % @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_igst_per').value == '' || document.getElementById('sttr_tot_price_igst_per').value == 'NaN') {
            document.getElementById('sttr_tot_price_igst_per').value = 0;
        }

        // CALCULATE IGST AMT => (VAL * IGST IN %) / 100 @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_igst_per').value != '') {
            document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
        }

        // IGST CHRG @PRIYANKA-12MAR2021
        if (document.getElementById('sttr_tot_price_igst_chrg').value == '' || document.getElementById('sttr_tot_price_igst_chrg').value == 'NaN') {
            document.getElementById('sttr_tot_price_igst_chrg').value = 0;
        }
        //
        //
        // CALCULATE TOT TAX AMT => CGST AMT + SGST AMT + IGST AMT @PRIYANKA-12MAR2021
        document.getElementById('sttr_tot_tax').value = parseFloat(parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
                parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
                parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);
        //
        //
        if (document.getElementById('sttr_tot_tax').value == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
            document.getElementById('sttr_tot_tax').value = 0;
        }
        //
        //
        totalCrystalTax = parseFloat(document.getElementById('sttr_tot_tax').value).toFixed(2);
        //
        //        
    }
    //            
    if (document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }
    //    
    if (document.getElementById('sttr_tot_tax').value > 0) {
        //
        // START CODE TO ADD TOTAL LABOUR CHARGES INTO FINAL VALUATION @PRIYANKA-12MAR2021
        finalValuation = (parseFloat(totalCrystalTax) + parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(totalLabCharges)).toFixed(2);
        document.getElementById('sttr_final_valuation').value = parseFloat(finalValuation).toFixed(2);
        // END CODE TO ADD TOTAL LABOUR CHARGES INTO FINAL VALUATION @PRIYANKA-12MAR2021
        //
    } else {
        document.getElementById('sttr_final_valuation').value = (parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(totalLabCharges)).toFixed(2);
    }
    //
    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }
}
//
// ================================================================================================ //
// START CODE TO ADD FUNCTION TO VALIDATE ADD NEW SCHEME WITH INTEREST @AUTHOR:MADHUREE-07APRIL2021 //
// ================================================================================================ //
//
function addNewKittyWithInterest() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addKittySubButDiv").style.visibility = "hidden";
    var girviDateDay = document.getElementById("DOBDay").value;
    var girviDateMMM = document.getElementById("DOBMonth").value;
    var girviDateYY = document.getElementById("DOBYear").value;
    var girviEndDateDay = document.getElementById("endDOBDay").value;
    var girviEndDateMMM = document.getElementById("endDOBMonth").value;
    var girviEndDateYY = document.getElementById("endDOBYear").value;
    //
    if (validateSelectField(girviDateDay, "Please select Day!") == false) {
        document.getElementById("DOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    if (validateSelectField(girviDateMMM, "Please select Month!") == false) {
        document.getElementById("DOBMonth").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    if (validateSelectField(girviDateYY, "Please select Year!") == false) {
        document.getElementById("DOBYear").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    //
    if (validateSelectField(girviEndDateDay, "Please select end Day!") == false) {
        document.getElementById("endDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    if (validateSelectField(girviEndDateMMM, "Please select end Month!") == false) {
        document.getElementById("endDOBMonth").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    if (validateSelectField(girviEndDateYY, "Please select end Year!") == false) {
        document.getElementById("endDOBYear").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    //
    if (girviDateMMM == 'FEB' || girviDateMMM == 'APR' || girviDateMMM == 'JUN' || girviDateMMM == 'SEP' || girviDateMMM == 'NOV') {
        if (girviDateMMM == 'FEB' && girviDateDay > 29 && girviDateYY % 4 == 0) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 29 days.');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addKittySubButDiv").style.visibility = "visible";
            return false;
        }
        if (girviDateMMM == 'FEB' && girviDateDay > 28 && girviDateYY % 4 != 0) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 28 days.');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addKittySubButDiv").style.visibility = "visible";
            return false;
            exit();
        }
        if (girviDateDay > 30) {
            alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
            document.getElementById("DOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addKittySubButDiv").style.visibility = "visible";
            return false;
        }
    }
    //
    if (girviEndDateMMM == 'FEB' || girviEndDateMMM == 'APR' || girviEndDateMMM == 'JUN' || girviEndDateMMM == 'SEP' || girviEndDateMMM == 'NOV') {
        if (girviEndDateMMM == 'FEB' && girviEndDateDay > 29 && girviEndDateYY % 4 == 0) {
            alert('Please select correct Date, Month ' + girviEndDateMMM + ' for this selected year has only max 29 days.');
            document.getElementById("endDOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addKittySubButDiv").style.visibility = "visible";
            return false;
        }
        if (girviEndDateMMM == 'FEB' && girviEndDateDay > 28 && girviEndDateYY % 4 != 0) {
            alert('Please select correct Date, Month ' + girviEndDateMMM + ' for this selected year has only max 28 days.');
            document.getElementById("endDOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addKittySubButDiv").style.visibility = "visible";
            return false;
            exit();
        }
        if (girviEndDateDay > 30) {
            alert('Please select correct Date, Month ' + girviEndDateMMM + ' has only max 30 days.');
            document.getElementById("endDOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addKittySubButDiv").style.visibility = "visible";
            return false;
        }
    }
    //
    var StartDate = girviDateDay + ' ' + girviDateMMM + ' ' + girviDateYY;
    var EndDate = girviEndDateDay + ' ' + girviEndDateMMM + ' ' + girviEndDateYY;
    var kittyStartDateStr = Date.parse(StartDate);
    var kittyEndDateStr = Date.parse(EndDate);
    //
    if (new Date(kittyStartDateStr).getTime() == new Date(kittyEndDateStr).getTime()) {
        alert('Scheme Start date and End date should not same!');
        document.getElementById("endDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    //
    if (validateEmptyField(document.getElementById("kittyScheme").value, "Please Enter Scheme Name!") == false) {
        document.getElementById("kittyScheme").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    //
    if (validateEmptyField(document.getElementById("kittyGroup").value, "Please Enter User Group Name!") == false) {
        document.getElementById("kittyGroup").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    //
    if (document.getElementById("kittyFirmId").value == 'NotSelected') {
        alert('Please Select Firm Name!');
        document.getElementById("kittyFirmId").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    //
    if (validateEmptyField(document.getElementById("kittyInterest").value, "Please Enter Scheme Interest !") == false) {
        document.getElementById("kittyInterest").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    //
    if (validateEmptyField(document.getElementById("kittySerialNo").value, "Please enter Serial Number!") == false ||
            validateNum(document.getElementById("kittySerialNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("kittySerialNo").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    //
    if (validateSelectField(document.getElementById("kittyPayAccId").value, "Please Select Payment Account!") == false) {
        document.getElementById("kittyPayAccId").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    //
    if (validateSelectField(document.getElementById("kittyDrAccId").value, "Please Select Cr Account!") == false) {
        document.getElementById("kittyDrAccId").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addKittySubButDiv").style.visibility = "visible";
        return false;
    }
    return true;
}
//
// ============================================================================================== //
// END CODE TO ADD FUNCTION TO VALIDATE ADD NEW SCHEME WITH INTEREST @AUTHOR:MADHUREE-07APRIL2021 //
// ============================================================================================== //
//
// ================================================================================================= //
// START CODE TO ADD FUNCTION TO CHANGE END DATE WHEN ADDING NEW SCHEME @AUTHOR:MADHUREE-07APRIL2021 //
// ================================================================================================= //
//
function changeKittyEndDate() {
    var DOBDay = document.getElementById('DOBDay').value;
    var DOBMonth = document.getElementById('DOBMonth').value;
    var DOBYear = document.getElementById('DOBYear').value;
    //
    document.getElementById('endDOBDay').value = DOBDay;
    document.getElementById('endDOBMonth').value = DOBMonth;
    document.getElementById('endDOBYear').value = (parseInt(DOBYear) + 1);
}
//
// ================================================================================================= //
// END CODE TO ADD FUNCTION TO CHANGE END DATE WHEN ADDING NEW SCHEME @AUTHOR:MADHUREE-07APRIL2021 //
// ================================================================================================= //
//
// ============================================================================================ //
// START CODE TO ADD FUNCTION TO NAVIGATE ALL SCHEME WITH INTEREST @AUTHOR:MADHUREE-07APRIL2021 //
// ============================================================================================ //
//
function navigationKittyWithInterest(pageNo, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omktpydtlwint" + default_theme + ".php?page=" + pageNo + "&custId=" + custId, true);
    xmlhttp.send();
}
//
// ========================================================================================== //
// END CODE TO ADD FUNCTION TO NAVIGATE ALL SCHEME WITH INTEREST @AUTHOR:MADHUREE-07APRIL2021 //
// ========================================================================================== //
//
// ========================================================================================= //
// START CODE TO ADD FUNCTION FOR CALCULATE TOTAL FINAL AMOUNTS @AUTHOR:MADHUREE-07APRIL2021 //
// ========================================================================================= //
//
function calSchemeTotalPaidAmt(totalCount, kittyEndDate) {
    var totalPaidAmt = 0;
    var totalPaidInterestAmt = 0;
    var totalFinalPaidAmt = 0;
    var totalWeight = 0;
    var totalWeightWithoutInterest = 0;
    var kittyMetalType = document.getElementById('kittyMetalType').value;
    var closeDay = document.getElementById('DOBClDay').value;
    var closeMonth = document.getElementById('DOBClMonth').value;
    var closeYear = document.getElementById('DOBClYear').value;
    var closeDate = closeDay + ' ' + closeMonth + ' ' + closeYear;
    //
    for (var emiCounter = 1; emiCounter <= totalCount; emiCounter++) {
        totalPaidAmt += parseFloat(document.getElementById('kittyPaidAmt' + emiCounter).value);
        totalPaidInterestAmt += parseFloat(document.getElementById('kittyPaidInterest' + emiCounter).value);
        totalFinalPaidAmt += parseFloat(document.getElementById('kittyTotalPaidAmt' + emiCounter).value);
        if (kittyMetalType != 'CASH') {
            //
            var kittyMetalRate = document.getElementById('kittyRateAmt' + emiCounter).value;
            var othGmWtInGm = document.getElementById('othGmWtInGm' + emiCounter).value;
            kittyMetalWt = parseFloat(parseFloat(document.getElementById('kittyPaidAmt' + emiCounter).value) / (kittyMetalRate / othGmWtInGm)).toFixed(3);
            //
            totalWeightWithoutInterest += kittyMetalWt;
            totalWeight += parseFloat(document.getElementById('kittyWeight' + emiCounter).value);
        }
    }
    //
    if (!isNaN(totalPaidAmt) && totalPaidAmt != '' && totalPaidAmt != null) {
        document.getElementById('totalPaidAmt').value = parseFloat(totalPaidAmt).toFixed(2);
        document.getElementById('totPaidAmt').value = parseFloat(totalPaidAmt).toFixed(2);
    }
    //
    if (!isNaN(totalPaidInterestAmt) && totalPaidInterestAmt != '' && totalPaidInterestAmt != null) {
        document.getElementById('totalPaidInterest').value = parseFloat(totalPaidInterestAmt).toFixed(2);
        document.getElementById('totPaidInterest').value = parseFloat(totalPaidInterestAmt).toFixed(2);
    }
    //
    if (!isNaN(totalFinalPaidAmt) && totalFinalPaidAmt != '' && totalFinalPaidAmt != null) {
        document.getElementById('totalFinalDepositAmt').value = parseFloat(totalFinalPaidAmt).toFixed(2);
        document.getElementById('totFinalDepositAmt').value = parseFloat(totalFinalPaidAmt).toFixed(2);
    }
    //
    if (kittyMetalType != 'CASH') {
        if (!isNaN(totalWeight) && totalWeight != '' && totalWeight != null) {
            document.getElementById('totalFinalWT').value = parseFloat(totalWeight).toFixed(3);
            document.getElementById('totFinalWT').value = parseFloat(totalWeight).toFixed(3);
        }
    }
    //
    var kittyEndDateStr = Date.parse(kittyEndDate);
    var kittyCloseDateStr = Date.parse(closeDate);
    //
    if (isNaN(totalFinalPaidAmt)) {
        totalFinalPaidAmt = 0;
    }
    if (isNaN(totalPaidAmt)) {
        totalPaidAmt = 0;
    }
    if (new Date(kittyEndDateStr).getTime() <= new Date(kittyCloseDateStr).getTime()) {
        document.getElementById('totPayableAmount').value = parseFloat(totalFinalPaidAmt).toFixed(2);
        document.getElementById('totPayableWeight').value = parseFloat(totalWeight).toFixed(3);
    } else {
        document.getElementById('totPayableAmount').value = parseFloat(totalPaidAmt).toFixed(2);
        document.getElementById('totPayableWeight').value = parseFloat(totalWeightWithoutInterest).toFixed(3);
    }
}
//
// ========================================================================================= //
// END CODE TO ADD FUNCTION FOR CALCULATE TOTAL FINAL AMOUNTS @AUTHOR:MADHUREE-07APRIL2021 //
// ========================================================================================= //
//
// ================================================================================================= //
// START CODE TO ADD FUNCTION FOR DISPLAY PAYMENT PANEL TO CLOSE SCHEME @AUTHOR:MADHUREE-07APRIL2021 //
// ================================================================================================= //
//
function closeSchemePaymentPanelDisplay(kittyId, kittyCustId, kittyFirmId, metalType, totalPaidAmt, totalFinalWT, utinId, kittyCloseDay, kittyCloseMonth, kittyCloseYear) {
    var confirm_box = false;
    if (utinId == '') {
        confirm_box = confirm("do you really want to close this scheme?");
    } else if (utinId != '') {
        confirm_box = true;
    }
    //
    loadXMLDoc();
    if (confirm_box == true) {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if ((totalPaidAmt == '' || totalPaidAmt == 0) && (utinId == '')) {
                    alert('Please enter total paid amount !');
                } else {
                    document.getElementById("paymentPanelDisplayDiv").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
    }
    //
    var mainPanelName = 'scheme';
    var transPanelName = 'scheme';
    var totalValuation = totalPaidAmt;
    var kittyCloseDate = kittyCloseDay + ' ' + kittyCloseMonth + ' ' + kittyCloseYear;
    var totPaidInterest = document.getElementById('totPaidInterest').value;
    if (utinId == '') {
        var paymentPanelName = 'SchemePayment';
    } else if (utinId != '') {
        var paymentPanelName = 'schemePayUp';
    }
    //
    xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + kittyCustId + "&kittyId=" + kittyId +
            "&firmId=" + kittyFirmId + "&totalPaidAmt=" + totalPaidAmt +
            "&totalFinalWT=" + totalFinalWT + "&paymentPanelName=" + paymentPanelName +
            "&metalType=" + metalType + "&suppPayId=" + kittyId + "&mainPanelName=" + mainPanelName +
            "&transPanelName=" + transPanelName + "&totalValuation=" + totalValuation +
            "&utid=" + utinId + "&kittyCloseDate=" + kittyCloseDate + "&totPaidInterest="
            + totPaidInterest + "kittyIndicator=schemeWithInterest", true);
    xmlhttp.send();
}
//
// =============================================================================================== //
// END CODE TO ADD FUNCTION FOR DISPLAY PAYMENT PANEL TO CLOSE SCHEME @AUTHOR:MADHUREE-07APRIL2021 //
// =============================================================================================== //
//
function getLbrWtDropdown(metalCount) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('lbrWtOptionDiv').innerHTML = xmlhttp.responseText;
            document.getElementById('selLbrWtOption').focus();
        }
    };
    xmlhttp.open("POST", "include/php/ogialbsl" + default_theme + ".php?div=lbrWtOptionDiv&panel=metalReceivedPanel&metalCount=" + metalCount, true);
    xmlhttp.send();
}
//
//
// =============================================================================================== //
// START CODE TO ADD FUNCTION FOR UPDATE READY ORDERS @AUTHOR:PRIYANKA-19JULY2021                  //
// =============================================================================================== //
function showReadyOrderInvoiceDetailsDiv(documentRootPath, utrId, panelName, stockType, suppId, PreInvoiceNo, InvoiceNo) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("AddInvoiceMainDiv").innerHTML = xmlhttp.responseText;
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/omadwhordwhrtrtnst" + default_theme + ".php?utrId=" + utrId +
            "&panelName=" + panelName + "&stockType=" + stockType +
            "&suppId=" + suppId + "&userId=" + suppId + "&custId=" + suppId +
            "&PreInvoiceNo=" + PreInvoiceNo + "&InvoiceNo=" + InvoiceNo, true);
    //
    xmlhttp.send();
    //
}
// =============================================================================================== //
// END CODE TO ADD FUNCTION FOR UPDATE READY ORDERS @AUTHOR:PRIYANKA-19JULY2021                    //
// =============================================================================================== //
//
//
function showReadyOrderDetailsUp(newPreInvoiceNo, newInvoiceNo, navPanel, suppId, utinId, payId, mainPanel) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omfnordrtnadv" + default_theme + ".php?utinId=" + utinId +
            "&panelName=StockPayUp&paymentPanelName=" + navPanel + "&payPanelName=StockPayUp" +
            "&preInvoiceNo=" + newPreInvoiceNo + "&PreInvoiceNo=" + newPreInvoiceNo +
            "&postInvoiceNo=" + newInvoiceNo + "&invoiceNo=" + newInvoiceNo +
            "&custId=" + suppId + "&userId=" + suppId + "&sttrId=" + payId + "&payId=" + payId +
            "&suppId=" + suppId + "&suppPayId=" + utinId + "&mainPanel=" + mainPanel, true);
    //
    xmlhttp.send();
    //
}
//
// =========================================================================================== //
// START COPDE TO ADD FUNCTIONS FOR WEBCAM IMAGE CAPTURE PROCESS @AUTHOR:MADHUREE-25AUGUST2021  //
// =========================================================================================== //
//
function show_snapshot(count) {
    Webcam.set({
        width: 300,
        height: 220,
        image_format: 'jpeg',
        jpeg_quality: 100
    });
    Webcam.attach('#webcam_image_div' + count);
    return false;
}
//
function take_snapshot(count) {
    //
    Webcam.snap(function (data_uri) {
        var imageName = Math.random();
        imageName = imageName + '.jpeg';
        $("#fileName" + count).val(imageName);
        $("#webcam_file" + count).val(data_uri);
        document.getElementById('webcam_image_div' + count).innerHTML = '<img src="' + data_uri + '"/>';
    });
    return false;
}
//
function closeWebcamImageDiv(count, div) {
    document.getElementById(div + count).innerHTML = '';
}
//
// ========================================================================================= //
// END COPDE TO ADD FUNCTIONS FOR WEBCAM IMAGE CAPTURE PROCESS @AUTHOR:MADHUREE-25AUGUST2021  //
// ========================================================================================= //
//
function showDeliveryChallanDbTb(utin_user_id, utin_pre_invoice_no, invLay, documentRoot, utin_invoice_no, utin_date) {
    var url = documentRoot + "/include/php/omDeliverChallan" + default_theme + ".php?userId=" + utin_user_id + "&slPrPreInvoiceNo=" + utin_pre_invoice_no + "&slPrInvoiceNo=" + utin_invoice_no + "&invoiceDate=" + utin_date + "&invoicePanel=" + invLay + "&labelType=SellPurchase&challan=DeliveryChallan";
    var name = "deliverChallan";
    var params = "scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0,width=850,height=850";
    window.open(url, name, params);
}
//
//
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR STOCK TRANSFER PANEL FUNCTIONS @AUTHOR:PRIYANKA-10DEC2021                            //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//Start Code To Open Estimate Invoice @Author-08-07-2023
function showQuoInv(custId, slPrPreInvoiceNo, slprinSubPanel, documentRootBSlash, slPrInvoiceNo, slPrAddDate, slPrAddDate, invLay)
{
    window.open(documentRootBSlash + '/include/php/ogspinvo.php?userId=' + custId + '&slPrPreInvoiceNo=' + slPrPreInvoiceNo + '&slPrInvoiceNo=' + slPrInvoiceNo + '&slprinSubPanel=' + slprinSubPanel + '&invoiceDate=' + slPrAddDate + '&invoicePanel=' + invLay + '&panelName=Estimate80MM&labelType=ROUGH_ESTIMATE',
            'popup', 'width=850,height=950,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
}
//End Code To Open Estimate Invoice @Author-08-07-2023
function stockManagementByCounter(panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omStockManagementByCounter" + default_theme + ".php?panelName=" + panelName, true);
    xmlhttp.send();
}
//
//
function stockTransferHistoryFunc(panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omStockTransferHistory" + default_theme + ".php?panelName=" + panelName, true);
    xmlhttp.send();
}
//
//
function stockTransferReportFunc(panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omStockTransferReport" + default_theme + ".php?panelName=" + panelName, true);
    xmlhttp.send();
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE FOR STOCK TRANSFER PANEL FUNCTIONS @AUTHOR:PRIYANKA-10DEC2021                              //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
//********************************************************************************************************
//START CODE FOR GET LEATEST CRYSTAL RATE CATEGORY AND NAME WISE : AUTHOR @DARSHANA 10 DEC 2021 
//********************************************************************************************************
function getCryLatestMetalRate(prodCount, sttr_id) {
    //
    var prodCategory = document.getElementById('sttr_item_category' + prodCount).value;
    var prodName = document.getElementById('sttr_item_name' + prodCount).value;
    var stone_live_rate = document.getElementById('sttr_stone_live_rate' + prodCount).checked;
    //
    if (stone_live_rate == true) {
        if ((prodCategory != '' && prodCategory != null) && (prodName != '' && prodName != null)) {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    //
                    var rate = xmlhttp.responseText;
                    var StoneRate = rate.split("#");
                    //
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    //
                    if (typeof (document.getElementById('sttr_product_purchase_rate' + prodCount)) != 'undefined' && (document.getElementById('sttr_product_purchase_rate' + prodCount) != null)) {
                        if (StoneRate[0] != '' && StoneRate[0] != null) {
                            document.getElementById("sttr_product_purchase_rate" + prodCount).value = StoneRate[0];
                        } else {
                            document.getElementById("sttr_product_purchase_rate" + prodCount).value = StoneRate[1];
                        }

                    }
                    if (document.getElementById("sttr_product_purchase_rate" + prodCount).value == 'undefined') {
                        document.getElementById("sttr_product_purchase_rate" + prodCount).value = '0';
                    }
                    //
                    if (typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' && (document.getElementById('sttr_product_sell_rate' + prodCount) != null)) {
                        if (StoneRate[1] != '' && StoneRate[1] != null) {
                            document.getElementById("sttr_product_sell_rate" + prodCount).value = StoneRate[1];
                        } else {
                            document.getElementById("sttr_product_sell_rate" + prodCount).value = StoneRate[0];
                        }
                    }
                    if (document.getElementById("sttr_product_sell_rate" + prodCount).value == 'undefined') {
                        document.getElementById("sttr_product_sell_rate" + prodCount).value = '0';
                    }
                    //
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };

            xmlhttp.open("POST", "include/php/stock/omgetcryrlatestrate" + default_theme + ".php?prodCategory=" + prodCategory + "&prodName=" + prodName + "&sttr_id=" + sttr_id, true);
            xmlhttp.send();
        }
    } else {
        if (typeof (document.getElementById('sttr_product_purchase_rate' + prodCount)) != 'undefined' && (document.getElementById('sttr_product_purchase_rate' + prodCount) != null)) {
            document.getElementById("sttr_product_purchase_rate" + prodCount).value = '';
        }
        if (typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' && (document.getElementById('sttr_product_sell_rate' + prodCount) != null)) {
            document.getElementById("sttr_product_sell_rate" + prodCount).value = '';
        }

    }
}
//********************************************************************************************************
//END CODE FOR GET LEATEST CRYSTAL RATE CATEGORY AND NAME WISE : AUTHOR @DARSHANA 10 DEC 2021 
//********************************************************************************************************
//
//
//
//********************************************************************************************************
// START CODE FOR PURCHASE RETURN PRODUCT SEARCH BY INVOICE NUMBER @AUTHOR:PRIYANKA:04FEB2022
//********************************************************************************************************
function showPurReturnInvDiv(srchInvNo, userId, panelName, transType, indicator, status) {
    //
    var searchItemIdLen = srchInvNo.length;
    var searchItemIdTemp = srchInvNo;
    var tempLen = searchItemIdLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;
    while (tempLen > 0) {
        var field = searchItemIdTemp.substr(0, 1);
        searchItemIdTemp = searchItemIdTemp.substr(1);
        if (field.match(alphaExp)) {
            charLen = charLen + 1;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }
    //
    var searchItemIdCharPart = srchInvNo.substr(0, charLen);
    var searchItemIdNumPart = srchInvNo.substr(charLen);
    //
    //alert('searchItemIdCharPart ==' + searchItemIdCharPart);   
    //alert('searchItemIdNumPart ==' + searchItemIdNumPart);
    //
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockReturnMainFormDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //        
    xmlhttp.open("POST", "include/php/omPurStockReturn" + default_theme + ".php?srchPreInvNo=" + searchItemIdCharPart +
            "&srchInvNo=" + searchItemIdNumPart +
            "&srchInvPreNumber=" + searchItemIdCharPart +
            "&srchInvPostNumber=" + searchItemIdNumPart +
            "&custId=" + userId +
            "&userId=" + userId + "&panelName=" + panelName +
            "&transType=" + transType + "&transactionType=" + transType +
            "&status=" + status + "&indicator=" + indicator, true);
    //
    xmlhttp.send();
    //
}
//
//
function searchInvByPurInvNumber(searchItemId, autoEntryValue, userId, panelName, transType, indicator, status) {
    //
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = tempLen;
    //
    //
    var alphaExp = /#/;
    while (tempLen > 0) {
        var field = searchItemIdTemp.substr(tempLen - 1);
        searchItemIdTemp = searchItemIdTemp.substr(0, tempLen - 1);
        if (isNaN(field) == false) {
            charLen = charLen - 1;
        } else if (field.match(alphaExp)) {
            charLen = charLen;
            break;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }
    //
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen, searchItemId.length);
    //
    var lastIndexOfHash = searchItemIdNumPart.lastIndexOf("#");
    //
    if (lastIndexOfHash > 0) {
        searchItemIdCharPart = searchItemId.substr(0, lastIndexOfHash + 2);
        searchItemIdNumPart = searchItemId.substr(lastIndexOfHash + 2);
    }
    //
    searchItemIdCharPart = encodeURIComponent(searchItemIdCharPart);
    searchItemIdNumPart = encodeURIComponent(searchItemIdNumPart);
    //
    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
    //alert('searchItemIdNumPart == ' + searchItemIdNumPart);
    //
    if (document.getElementById("srchDelItemId")) {
        //
        // ADDED CONDITION FOR PURCHASE RETURN INV NUMBER 
        if (document.getElementById('srchDelItemId').value != '') {
            //
            // IT WILL SET PURCHASE RETURN INV NUMBER 
            document.getElementById('srchInvPreNumber').value = searchItemIdCharPart;
            document.getElementById('srchInvPostNumber').value = searchItemIdNumPart;
        } else {
            //
            // IT WILL SET PURCHASE RETURN INV NUMBER 
            document.getElementById('srchInvPreNumber').value = searchItemIdCharPart;
            document.getElementById('srchInvPostNumber').value = searchItemIdNumPart;
        }
    } else {
        //
        // IT WILL SET PURCHASE RETURN INV NUMBER 
        document.getElementById('srchInvPreNumber').value = searchItemIdCharPart;
        document.getElementById('srchInvPostNumber').value = searchItemIdNumPart;
    }
    //
    if (autoEntryValue == 'YES') {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockReturnMainFormDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("GET", "include/php/omPurStockReturn" + default_theme + ".php?srchInvPreNumber=" + searchItemIdCharPart +
                "&srchInvPostNumber=" + searchItemIdNumPart +
                "&srchPreInvNo=" + searchItemIdCharPart +
                "&srchInvNo=" + searchItemIdNumPart +
                "&autoEntry=" + autoEntryValue +
                "&custId=" + userId + "&userId=" + userId + "&panelName=" + panelName +
                "&transType=" + transType + "&transactionType=" + transType +
                "&status=" + status + "&indicator=" + indicator, true);
        //
        xmlhttp.send();
        //
    } else {
        return false;
    }
}
//********************************************************************************************************
// END CODE FOR PURCHASE RETURN PRODUCT SEARCH BY INVOICE NUMBER @AUTHOR:PRIYANKA:04FEB2022
//********************************************************************************************************
//
//
//********************************************************************************************************
// START CODE FOR PURCHASE RETURN PANEL - FOR RETURN PRODUCT DETAILS @AUTHOR:PRIYANKA:04FEB2022
//********************************************************************************************************
function showPurReturnFormDiv(sttrId, prodPreInvNo, prodInvNo, userId, panelName, transType, indicator, status) {
    //    
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockReturnMainFormDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //        
    xmlhttp.open("POST", "include/php/omPurStockReturn" + default_theme + ".php?sttr_id=" + sttrId +
            "&srchInvPreNumber=" + prodPreInvNo +
            "&srchInvPostNumber=" + prodInvNo +
            "&srchPreInvNo=" + prodPreInvNo +
            "&srchInvNo=" + prodInvNo +
            "&custId=" + userId +
            "&userId=" + userId + "&panelName=" + panelName +
            "&transType=" + transType + "&transactionType=" + transType +
            "&status=" + status + "&indicator=" + indicator, true);
    //
    xmlhttp.send();
    //
}
//*******************************************************************************************************
// END CODE FOR PURCHASE RETURN PANEL - FOR RETURN PRODUCT DETAILS @AUTHOR:PRIYANKA:04FEB2022
//*******************************************************************************************************
//
//
//
//
//*******************************************************************************************************
// START CODE FOR DELETED STOCK LIST - DELETE FUNCTION @AUTHOR:PRIYANKA:07FEB2022
//*******************************************************************************************************
function deletedStockListFunc(panelName, sttrId, stockType, itemName, operation) {
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Stock Permanently?");
    if (confirm_box == true) {
        var stockDeleteConfirm = '';
        if (panelName == 'deletedStockList' && stockDelete == 'Y') {
            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
            if (confirm_box_for_stock == true) {
                stockDeleteConfirm = 'yes';
                document.getElementById("pop_up_purchase").style.display = "none";
            } else {
                stockDeleteConfirm = 'no';

            }
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("deletedStockListDiv").innerHTML = xmlhttp.responseText;

            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "omsttrandel" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName +
                "&stockDeleteConfirm=" + stockDeleteConfirm + "&stockType=" + stockType +
                "&itemName=" + itemName + "&operation=" + operation, true);
        xmlhttp.send();
    }
}
//*******************************************************************************************************
// END CODE FOR DELETED STOCK LIST - DELETE FUNCTION @AUTHOR:PRIYANKA:07FEB2022
//*******************************************************************************************************
//
//
//
//
//*******************************************************************************************************
// START CODE FOR ADD DELETED STOCK INTO AVIALABLE STOCK @AUTHOR:PRIYANKA:07FEB2022
//*******************************************************************************************************
function addDeletedStockInToAvailableStock(sttrId, mainPanelName, panelName, operation) {
    var confirmMsg = confirm("Do You really want to add this stock Into Available Stock?");
    if (confirmMsg == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("deletedStockListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "omsttrandel" + default_theme + ".php?panelName=" + panelName + "&sttrId=" + sttrId +
                "&mainPanelName=" + mainPanelName + "&operation=" + operation, true);
        xmlhttp.send();
    }
}
//*******************************************************************************************************
// END CODE FOR ADD DELETED STOCK INTO AVIALABLE STOCK @AUTHOR:PRIYANKA:07FEB2022
//*******************************************************************************************************
//
//
//
//
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR UPDATE STOCK PURITY IFRAME POP UP @AUTHOR:PRIYANKA-08FEB2022
// ********************************************************************************************************************
function stockMismatchStockPurityPopUp(sttrId, transStockType, transFirmId, transPanelDetailsDisplay, transCategory, transName, transPurity, transMetal, transIndicator, startDate, endDate, documentRoot, stockLedgerPanelName) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('transStockType == ' + transStockType);
    //alert('transFirmId == ' + transFirmId);
    //alert('transPanelDetailsDisplay == ' + transPanelDetailsDisplay);
    //alert('transCategory == ' + transCategory);
    //alert('transName == ' + transName);
    //alert('transPurity == ' + transPurity);
    //alert('transMetal == ' + transMetal);
    //alert('transIndicator == ' + transIndicator);    
    //alert('startDate == ' + startDate);
    //alert('endDate == ' + endDate);
    //alert('documentRoot == ' + documentRoot);
    //alert('stockLedgerPanelName == ' + stockLedgerPanelName);    
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModal').style.display = "block";
            document.getElementById('myModal').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("GET", documentRoot + "/include/php/omStockLedgerSummaryTransReportPopUpIframe" + default_theme + ".php?startDate=" + startDate +
            "&endDate=" + endDate + "&transMetal=" + transMetal + "&transIndicator=" + transIndicator +
            "&transFirmId=" + transFirmId + "&transCategory=" + transCategory +
            "&transName=" + transName + "&transStockType=" + transStockType +
            "&transPurity=" + transPurity + "&transPanelDetailsDisplay=" + transPanelDetailsDisplay +
            "&documentRoot=" + documentRoot + "&sttrId=" + sttrId + "&stockLedgerPanelName=" + stockLedgerPanelName, true);
    //
    xmlhttp.send();
    //
}
// ********************************************************************************************************************
// END CODE FOR NEW FUNCTION FOR UPDATE STOCK PURITY IFRAME POP UP @AUTHOR:PRIYANKA-08FEB2022
// ********************************************************************************************************************
//
// *************************************************************************************************************
// START CODE TO ADD FUNCTION FOR SEARCHING PRODUCT CATEGORY AND NAME TO DELETE STOCK @AUTHOR:MADHUREE-16FEB2022
// *************************************************************************************************************
//
function searchProductCategoryAndName(keyCodeInput, searchBy, productMetal, prodCategory, prodName) {
    var keyCode = keyCodeInput;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (searchBy == 'productCategory') {
                document.getElementById("searchProductCategoryDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("searchProductNameDiv").innerHTML = xmlhttp.responseText;
            }
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('selItemNameCategory').focus();
                document.getElementById('selItemNameCategory').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/omSelectProdCategoryName' + default_theme + '.php?searchBy=' + searchBy + "&productMetal=" + productMetal + "&prodCategory=" + prodCategory + "&prodName=" + prodName, true);
    xmlhttp.send();
}
//
// ***********************************************************************************************************
// END CODE TO ADD FUNCTION FOR SEARCHING PRODUCT CATEGORY AND NAME TO DELETE STOCK @AUTHOR:MADHUREE-16FEB2022
// ***********************************************************************************************************
//
function deleteStockByCategoryAndName() {
    //
    var productMetal = document.getElementById('selectProducttMetal').value;
    var productCategory = document.getElementById('searchProductCategory').value;
    var productName = document.getElementById('searchProductName').value;
    //
    if (productMetal == 'NotSelected') {
        alert('Please select Metal type to proceed !');
        document.getElementById('selectProducttMetal').focus();
        return false;
    }
    //
    if (productCategory == '') {
        alert('Please enter category to proceed !');
        document.getElementById('searchProductCategory').focus();
        return false;
    }
    //
    if (productName == '') {
        alert('Please enter name to proceed !');
        document.getElementById('searchProductName').focus();
        return false;
    }
    //
    var confirm_box = confirm("\nDo you really want to delete these products Permanently?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("deleteMultipleStockDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omDeleteMultipleStock" + default_theme + ".php?productMetal=" + productMetal + "&productCategory=" + productCategory + "&productName=" + productName, true);
        xmlhttp.send();
    }
}
//
//
//
//
// **************************************************************************************
// START TO ADD CODE FOR UPDATE LOYALTY POINTS @AUTHOR:PRIYANKA-09MAR2022
// **************************************************************************************
function refreshUserLoyaltyPoints(panelName, userType, transPanelName) {
    var confirm_box = confirm("\nDo you really want to Update Loyalty Points?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("customerListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omccinftbl" + default_theme + ".php?panelName=" + panelName + "&userType=" + userType +
                "&transPanelName=" + transPanelName, true);
        xmlhttp.send();
    }
}
// **************************************************************************************
// END TO ADD CODE FOR UPDATE LOYALTY POINTS @AUTHOR:PRIYANKA-09MAR2022
// **************************************************************************************
//
//
//
//
// *********************************************************************************************************
// Start Code to Delete Pending New Order Entries @Author:PRIYANKA-14MAR2022
// *********************************************************************************************************
function pendingOrderDelFunc(sttrId, utinId, custId, mainPanel) {
    confirm_box = confirm("\n\nDo you really want to delete this Item?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("PendingOrderList").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&utinId=" + utinId +
                "&panelName=" + mainPanel + "&mainPanel=" + mainPanel + "&custId=" + custId, true);
        //
        xmlhttp.send();
        //
    }
}
// *********************************************************************************************************
// End Code to Delete Pending New Order Entries @Author:PRIYANKA-14MAR2022
// *********************************************************************************************************
//
//
// default_theme parameter is appeneded in the .php file by CHETAN 06MAY2022
//
//
// *********************************************************************************************************
// Start Code For Stock Transfer All Reports Panel @Author:PRIYANKA-22JULY2022
// *********************************************************************************************************
function stockTransferAllReportFunc(panelName) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    if (panelName == 'tagStockApprovalPendingStockList') { // FOR STOCK TRANSFER - PENDING APPROVAL LIST @Author:PRIYANKA-22JULY2022
        xmlhttp.open("POST", "include/php/omTagStockApprovalPendingStockList" + default_theme + ".php?panelName=" + panelName + "&showAllButtons=YES", true);
        xmlhttp.send();
    } else if (panelName == 'tagStockApprovedStockList') { // FOR STOCK TRANSFER - APPROVED LIST @Author:PRIYANKA-22JULY2022
        xmlhttp.open("POST", "include/php/omTagStockApprovedStockList" + default_theme + ".php?panelName=" + panelName + "&showAllButtons=YES", true);
        xmlhttp.send();
    } else if (panelName == 'tagStockReturnStockList') { // FOR STOCK TRANSFER - RETURN LIST @Author:PRIYANKA-22JULY2022
        xmlhttp.open("POST", "include/php/omTagStockReturnStockList" + default_theme + ".php?panelName=" + panelName + "&showAllButtons=YES", true);
        xmlhttp.send();
    }else if (panelName == 'stocktransmainvoucherlist') { // FOR STOCK TRANSFER - VOUCHER LIST @Author:DNYANESHWARI 10SEPT2024
        xmlhttp.open("POST", "include/php/omstocktransmainvoucherlist" + default_theme + ".php?panelName=" + panelName + "&showAllButtons=YES", true);
        xmlhttp.send();
    } else { // FOR STOCK TRANSFER LIST @Author:PRIYANKA-22JULY2022
        xmlhttp.open("POST", "include/php/omTagStockTransferList" + default_theme + ".php?panelName=" + panelName + "&showAllButtons=YES", true);
        xmlhttp.send();
    }
}
// *********************************************************************************************************
// End Code For Stock Transfer All Reports Panel @Author:PRIYANKA-22JULY2022
// *********************************************************************************************************
// 
//
//*********************************************************************************************************
//START Code For Show Details of voucher code  @Author:DNYANESHWARI 10SEPT2024
//*********************************************************************************************************
function showStockTransVoucherDetails(voucherCode, transferedFirm) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
   xmlhttp.open("POST", "include/php/omstocktransvoucherdata" + default_theme + ".php?voucherCode=" + voucherCode + "&transferedFirm=" + transferedFirm + "&showAllButtons=YES", true);
    xmlhttp.send();
}
//*********************************************************************************************************
//End Code For Show Details of voucher code @Author:DNYANESHWARI 10SEPT2024
//*********************************************************************************************************
//
//
// *********************************************************************************************************
// Start Code To Add Function For Stock Transfer Voucher Number @Author:PRIYANKA-29JULY2022
// *********************************************************************************************************
function stockTransferVoucherFunc(updatePanelName, preVoucherNo, postVoucherNo, productCounter, selectedStaff, selectedFirm) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockManagementByCounterMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omStockManagementByCounter" + default_theme + ".php?updatePanelName=" + updatePanelName +
            "&preVoucherNo=" + preVoucherNo + "&postVoucherNo=" + postVoucherNo +
            "&productCounter=" + productCounter +
            "&selectedStaff=" + selectedStaff + "&selectedFirm=" + selectedFirm, true);
    //
    xmlhttp.send();
    //
}
// *********************************************************************************************************
// End Code To Add Function For Stock Transfer Voucher Number @Author:PRIYANKA-29JULY2022
// *********************************************************************************************************
//
function sendWhatsAppMsg(mobileNumber, msgText, imageURL, pdfURL, divName) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divName).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omSendWhatsApp.php?mobileNumber=" + mobileNumber + "&msgText="
            + msgText + "&imageURL=" + imageURL + "&pdfURL=" + pdfURL, true);
    xmlhttp.send();
    //
}
//
function updateProductSetting(sttr_id, min_size, max_size, size_type, min_weight, max_weight) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("productSettingDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omupdatesimprod.php?updateType=productSetting" + "&sttr_id=" + sttr_id + "&min_size=" + min_size + "&max_size=" + max_size + "&size_type=" + size_type + "&min_weight=" + min_weight + "&max_weight=" + max_weight, true);
    xmlhttp.send();
    //
}
function openpopupschemeBarcode(kittyCustId, kittyId) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("schemeBarcode").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omschemebarcode.php?kittyCustId=" + kittyCustId + "&kittyId=" + kittyId, true);
    xmlhttp.send();
    //
}
function openpopupschemeMonthlyBarcode(depositeAmt, barcodeNo, paymentMode, paiddate, accountNo, operation) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("schemeBarcode").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omschemebarcode.php?depositeAmt=" + depositeAmt + "&barcodeNo=" + barcodeNo + "&paymentMode=" + paymentMode + "&paiddate=" + paiddate + "&accountNo=" + accountNo + "&operation=" + operation, true);
    xmlhttp.send();
    //
}
//
function goldSchemePanelDisplay(kittyId, kittyCustId, kittyFirmId, transType = '', metalType, totalEmiAmt, totalBonusAmt, totalPaidAmt, totalFinalRt, totalFinalWT,
        utinId, paymentPanelName, kittyRateTot, kittyCloseDay, kittyCloseMonth, kittyCloseYear, paymentMode, transactionMode, $documentRootBSlash,
        kitty_cash_to_gold, kitty_emi_late_fee, kitty_late_fee_days, total_delay_days, total_no_of_emis)
{
    //alert(kitty_cash_to_gold);
    if ((totalPaidAmt == '' || totalPaidAmt == 0) && paymentPanelName != 'schemeCashPayment') {
        alert('Please enter the EMI amount and click on paid button');
        showKittyUserDetails(kittyCustId, kittyId, kittyFirmId);
        return false;
    }
    var confirm_box = false;
    if (paymentPanelName == 'schemeMetalPayment' && utinId == '')
        confirm_box = confirm("do you really want to close this scheme?");
    loadXMLDoc();
    if (confirm_box == true || utinId != '') {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if ((totalPaidAmt == '' || totalPaidAmt == 0) && paymentPanelName != 'schemeCashPayment') {
                    alert('Please enter the EMI amount and click on paid button');
                } else {
                    document.getElementById("paymentPanelDisplayDiv").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
    } else {
        document.getElementById("paymentPanelDisplayDiv").innerHTML = xmlhttp.responseText;
        return false;
    }

    var mainPanelName = 'scheme';
    var transPanelName = 'scheme';
    if (metalType == "CASH")
    {
        var totalValuation = totalPaidAmt;
    } else
    {
        var totalValuation = totalEmiAmt;
    }

    var kittyCloseDate = kittyCloseDay + ' ' + kittyCloseMonth + ' ' + kittyCloseYear;
    var bonusAmount = document.getElementById('finalBonusAmountToPay').value;
    if ((paymentPanelName == '' || paymentPanelName == 'schemeMetalPayment') && utinId == '') {
        var paymentPanelName = 'SchemePayment';
    } else if (utinId != '') {
        var paymentPanelName = 'schemePayUp';
    }

    var poststr = "userId=" + kittyCustId + "&kittyId=" + kittyId +
            "&firmId=" + kittyFirmId + "&totalPaidAmt=" + totalPaidAmt + "&totalFinalRt=" + totalFinalRt +
            "&totalFinalWT=" + totalFinalWT + "&paymentPanelName=" + paymentPanelName +
            "&metalType=" + metalType + "&suppPayId=" + kittyId + "&mainPanelName=" + mainPanelName + "&totalEmiAmt=" + totalEmiAmt + "&totalBonusAmt=" + totalBonusAmt +
            "&transPanelName=" + transPanelName + "&totalValuation=" + totalValuation + "&paymentMode=" + paymentMode + "&transactionMode=" + transactionMode +
            "&utid=" + utinId + "&rtctTot=" + kittyRateTot + "&kittyCloseDate=" + kittyCloseDate + "&kittyPaidBonusAmt=" + bonusAmount + "&transType=" + transType +
            "&kitty_cash_to_gold=" + kitty_cash_to_gold + "&kitty_emi_late_fee=" + kitty_emi_late_fee +
            "&kitty_late_fee_days=" + kitty_late_fee_days + "&total_delay_days=" + total_delay_days + "&total_no_of_emis=" + total_no_of_emis;


    add_new_product_desc($documentRootBSlash + '/include/php/omkityclosegold.php', poststr);
}
//
//
function add_new_product_desc(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddNewProdDesc;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertAddNewProdDesc() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById('myModal').style.display = "block";
        document.getElementById('myModal').innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//
function closeProdDetailsModal()
{
    document.getElementById('myModal').style.display = 'none';
}
//
function makeSchemeParaList()
{

}
//
//Calculate total gst amount and taxable amount
function calGstPaidAmt(kittyNo) {

    var count = document.getElementById('totalEMI').value;
    var totalGstAmt = 0;
    for (var i = 1; i <= count; i++) {
        if (document.getElementById('kittyDepEMIStatus' + i).value == 'Paid') {
            totalGstAmt += parseFloat(document.getElementById('kittyGSTPaidAmt' + i).value);
            document.getElementById('totalFinalGSTAmt').value = parseFloat(totalGstAmt).toFixed(2);
        }
    }
}
//
function calTaxablePaidAmt(kittyNo) {

    var count = document.getElementById('totalEMI').value;
    var totalTaxableAmt = 0;
    for (var i = 1; i <= count; i++) {
        if (document.getElementById('kittyDepEMIStatus' + i).value == 'Paid') {
            totalTaxableAmt += parseFloat(document.getElementById('kittyChangedPaidAmt' + i).value);
            document.getElementById('totalFinalTaxableAmt').value = parseFloat(totalTaxableAmt).toFixed(2);
        }
    }
}

function changeSchemeMetalCarat(KittyMetalType) {
//    console.log(KittyMetalType);
    let indicator = document.getElementById('GdSlCaratIndicator').value;
//
    if (indicator == '1') {
        var metalCaratTable = document.getElementById('GdSlCarat');
//        var GdSlCaratMetRate = document.getElementById('GdSlCaratMetRate');
        var metalNameLabel = document.getElementById('metalNamesWithCarat');
        var kittyMetalTunch = document.getElementById('kittyMetalTunch');
        //
        if (KittyMetalType == 'GOLD' || KittyMetalType == 'SILVER') {
            metalCaratTable.style.visibility = 'visible';
//            GdSlCaratMetRate.style.visibility = 'visible';
            metalNameLabel.innerHTML = KittyMetalType + ' CARAT';
            kittyMetalTunch.selectedIndex = 1;
        } else {
            metalCaratTable.style.visibility = 'hidden';
//            GdSlCaratMetRate.style.visibility = 'hidden';
            kittyMetalTunch.value = '';
        }
    }
}
//
function kittyValidationsHandler(element, noOfEmi, action, target) {
    //
    if (element.checked == 1) {
        //
        let a = kittyLuckyValidations(element, noOfEmi, action, target);
        //
        if (a) {
            document.getElementById(target).disabled = false;
        } else {
            document.getElementById(target).disabled = true;
        }
    } else {
        document.getElementById(target).disabled = true;
        alert('Please check Checkbox');
    }

}
//
function kittyLuckyValidations(element, noOfEmi, action, target) {

    for (var i = 1; i <= noOfEmi; i++) {
        let luckyWinPrice = document.getElementById('kittyLuckyPrice' + i);
        let luckyWinPriceAmt = luckyWinPrice.value;
        //
        if (luckyWinPriceAmt < 0 || luckyWinPriceAmt == '' || luckyWinPriceAmt == null) {
            luckyWinPrice.focus();
            return false;
        }
    }
    return true;
}
//
function checkKittyAvailable(schemeName) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (parseInt(xmlhttp.responseText) > 0) {
                document.getElementById("schName").value = '';
                document.getElementById("schName").focus();
                alert('Scheme Name Already taken');
            }

            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omCheckKittyNameAvailable" + default_theme + ".php?schemeName=" + schemeName, true);
    xmlhttp.send();
    // 
}
//
function ktValidEmiAmt(kittyNo) {
    let ktEmiAmt = document.getElementById('kittyEmiAmt' + kittyNo).value;
    let ktPaidAmt = document.getElementById('kittyPaidAmt' + kittyNo);
    let ktMultAmt = document.getElementById('kitty_EMI_multiple').value;
    let ktPaidAmtVal = ktPaidAmt.value;
    if (parseFloat(ktPaidAmtVal) < parseFloat(ktEmiAmt)) {
        alert('Deposite Amount should not less than EMI AMOUNT');
        ktPaidAmt.value = ktEmiAmt;
        ktPaidAmt.focus();
        return 'false';
    } else if (ktMultAmt > 0 && (ktPaidAmtVal % ktMultAmt != 0)) {
        alert('Please Enter Amount in Multiple of ' + ktMultAmt);
        ktPaidAmt.value = ktEmiAmt;
        ktPaidAmt.focus();
        return 'false';
    }
}
//
function checkMetalwt() {
    let ktDepMetalWt = parseFloat(document.getElementById('totalFinalWT').value);
    let dbAdvMeatlWt = parseFloat(document.getElementById('targetMetalWt').value);
    if (dbAdvMeatlWt > 0) {
        if (dbAdvMeatlWt <= ktDepMetalWt) {
            alert('Your advance metal is full fill please close the scheme!');
            document.getElementById('kittyMetalSubmit').click();
        }
    }
}
//START CODE TO VALIDATE UPDATE MKG CH FIELDS PRATHAMESH:16APR2024
function validateUpdateMkgFields() {
    //
    selItemCategoryToChange = document.getElementById('selItemCategoryToChangeMkg').value;
    selItemNameToChange = document.getElementById('selItemNameToChangeMkg').value;
    sttr_mkg_ch = document.getElementById('new_sttr_making_charges').value;
    sttr_mkg_ch_type = document.getElementById('new_sttr_making_charges_type').value;
    firmSelected = document.getElementById('firmSelected').value;
    let form = document.getElementById('updateItemMkgForm');
    //
    if((sttr_mkg_ch != '' && sttr_mkg_ch_type != '') && firmSelected != '') {
        if(selItemNameToChange != '' && selItemCategoryToChange == '') {
            return true;
        } else if (selItemNameToChange == '' && selItemCategoryToChange != '') {
            return true;
        } else if (selItemNameToChange != '' && selItemCategoryToChange != '') {
            return true;
        } else {
            alert('please select Item Category OR Item Name!');
            document.getElementById('selItemCategoryToChangeMkg').focus();
            return false;
        } 
    } else if (sttr_mkg_ch == '') {
        alert('please enter making charges!');
        document.getElementById('new_sttr_making_charges').focus();
    } else if (firmSelected == '') {
        alert('Please select firm!');
    } else if (sttr_mkg_ch_type == '') {
        alert('please enter making charges type!');
        document.getElementById('new_sttr_making_charges_type').focus();
    } else if (selItemCategoryToChange == '' && selItemNameToChange == '') {
        alert('please select Item Category OR Item Name!');
        document.getElementById('selItemCategoryToChangeMkg').focus();
    }
    return false;
}
//END CODE TO VALIDATE UPDATE MKG CH FIELDS PRATHAMESH:16APR2024
//Start Code To Open Purchase Quotation Invoice PRATHAMESH-06-05-2024
function showPurQuoInv(custId, slPrPreInvoiceNo, slprinSubPanel, documentRootBSlash, slPrInvoiceNo, slPrAddDate, slPrAddDate, invLay)
{
    window.open(documentRootBSlash + '/include/php/ogspinvo.php?userId=' + custId + '&slPrPreInvoiceNo=' + slPrPreInvoiceNo + '&slPrInvoiceNo=' + slPrInvoiceNo + '&slprinSubPanel=' + slprinSubPanel + '&invoiceDate=' + slPrAddDate + '&invoicePanel=' + invLay +'&firmId=' + invLay + '&panelName=PurchaseEstimate80MM&labelType=ROUGH_ESTIMATE',
            'popup', 'width=850,height=950,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
}
//End Code To Open Purchase Quotation Invoice PRATHAMESH-06-05-2024


function purFormB2MakFunc() {
    //
    //alert('Hiii');
    //
    var suppPurLotEntered = 0;
    var totalFinVal = 0;
    var totalMakingCharges = 0;
    var wastg = 0;
    var suppPurItemEntered = 0;
    var totalVal = 0;
    var totalMakingCharges = 0;
    var totalGsWt = 0;
    var gsWtKG = 0;
    var gsWtGM = 0;
    var ntWtKG = 0;
    var ntWtGM = 0;
    var totalNtWt = 0;
    var finVal = 0;
    var fnWt = 0;
    var itemCryVal;
    var finVal;
    var itemTotCryVal;
    var totVal;
    var finTotVal;
    var labTotal = 0;
    var rateNWt;
    var totalRateNWt = 0;
    var finalTotalVal = 0;
    //
    //alert('sttr_gs_weight == ' + document.getElementById('sttr_gs_weight').value);
    //
    if (document.getElementById('sttr_gs_weight_type').value != document.getElementById('sttr_nt_weight_type').value) {
        document.getElementById('sttr_nt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;
        document.getElementById('utransFinalWeightTyp').value = document.getElementById('sttr_gs_weight_type').value;
        document.getElementById('sttr_pkt_weight_type').value = document.getElementById('sttr_gs_weight_type').value;
    }
    //
    //
    var netweight = document.getElementById('sttr_nt_weight').value;
    var weight = document.getElementById('sttr_final_fine_weight').value;
    var metalType = document.getElementById('sttr_metal_type').value;
    var tounch = document.getElementById('sttr_purity').value;
    var metalRate = document.getElementById('sttr_metal_rate').value;
    var wtType = document.getElementById('sttr_nt_weight_type').value;
    var makCharges = document.getElementById('sttr_making_charges').value;
    var makChargesType = document.getElementById('sttr_making_charges_type').value;
    var wastg = document.getElementById('sttr_wastage').value;
    var qty = document.getElementById('sttr_quantity').value;
    //
    //
    if (document.getElementById('sttr_final_val_by').value == 'byGrossWt') {
        var weight = document.getElementById('sttr_gs_weight').value;
        var wtType = document.getElementById('sttr_gs_weight_type').value;
    } else {
        var weight = document.getElementById('sttr_nt_weight').value;
        var wtType = document.getElementById('sttr_nt_weight_type').value;
    }
    //
    //
    if (document.getElementById('sttr_making_charges_type').value == 'lbByNetWt') {
        var weight = parseFloat(document.getElementById('sttr_nt_weight').value);
    } else if (document.getElementById('sttr_other_charges_by').value == 'lbByGrossWt') {
        var weight = parseFloat(document.getElementById('sttr_gs_weight').value);
    } else if (document.getElementById('sttr_other_charges_by').value == 'lbByFineWt') {
        var weight = document.getElementById('sttr_final_fine_weight').value;
    }
    //
    //
    if (makCharges != '') {
        if (makChargesType == 'KG') {
            if (wtType == 'KG')
                totalMakingCharges = makCharges * weight;
            else if (wtType == 'GM')
                totalMakingCharges = (makCharges / 1000) * weight;
            else
                totalMakingCharges = (makCharges / (1000 * 1000)) * weight;
        } else if (makChargesType == 'GM') {
            if (wtType == 'KG')
                totalMakingCharges = makCharges * 1000 * weight;
            else if (wtType == 'GM')
                totalMakingCharges = makCharges * weight;
            else
                totalMakingCharges = (makCharges / 1000) * weight;
        } else if (makChargesType == 'MG') {
            if (wtType == 'KG')
                totalMakingCharges = makCharges * 1000 * 1000 * weight;
            else if (wtType == 'GM')
                totalMakingCharges = makCharges * 1000 * weight;
            else
                totalMakingCharges = makCharges * weight;
        } else if (makChargesType == 'PP') {
            totalMakingCharges = parseFloat(makCharges * qty);
        }
    }
    //
    //
    if (wastg == '')
        wastg = 0;
    //
    //
    document.getElementById('sttr_fine_weight').value = ((parseFloat(tounch) * netweight) / 100).toFixed(3);
    //
    weight = (((parseFloat(wastg) + parseFloat(tounch)) * netweight) / 100).toFixed(3);
    //
    document.getElementById('sttr_final_fine_weight').value = parseFloat(weight).toFixed(3);
    //
    //
    var gsWt = document.getElementById('sttr_gs_weight').value
    var gsWtType = document.getElementById('sttr_gs_weight_type').value;
    //
    if (gsWt != '') {
        if (gsWtType != 'GM')
            gsWtKG += convert('GM', gsWtType, gsWt);
        else
            gsWtGM += parseFloat(gsWt);
        totalGsWt = parseFloat(gsWtKG) + parseFloat(gsWtGM);
    }
    //
    var ntWt = document.getElementById('sttr_nt_weight').value;
    var ntWtType = document.getElementById('sttr_nt_weight_type').value;
    //
    if (ntWt != '') {
        if (ntWtType != 'GM')
            ntWtKG = convert('GM', ntWtType, ntWt);
        else
            ntWtGM += parseFloat(ntWt);
        totalNtWt = parseFloat(ntWtKG) + parseFloat(ntWtGM);
    }
    //
    //
    var finalFineWeight = document.getElementById('sttr_final_fine_weight').value;
    //
    if (finalFineWeight != '') {
        fnWt += parseFloat(finalFineWeight);
        document.getElementById('sttr_final_fine_weight').value = (fnWt).toFixed(3);
    }
    //
    //
    var makCharges = document.getElementById('sttr_making_charges').value;
    var makChargesType = document.getElementById('sttr_making_charges_type').value;
    //
    //
    document.getElementById('sttr_final_purity').value = (parseFloat(document.getElementById('sttr_purity').value) + parseFloat(document.getElementById('sttr_wastage').value));
    //
    //
    document.getElementById('sttr_total_making_charges').value = parseFloat(totalMakingCharges).toFixed(2);
    //
    //
    if ((document.getElementById('sttr_final_purity').value).trim() == '' || document.getElementById('sttr_final_purity').value == 'NaN') {
        document.getElementById('sttr_final_purity').value = 0;
    }
    //
    if (document.getElementById('sttr_final_fine_weight').value == 'NaN' || document.getElementById('sttr_final_fine_weight').value == 'undefined') {
        document.getElementById('sttr_final_fine_weight').value = "";
    }
    //
    var cashRec = 0;
    //
    if (cashRec == '')
        cashRec = 0;
    //
    var totAmt = 0;
    //
    if (totAmt == '')
        totAmt = 0;
    //
    var totAmtRec = 0;
    //
    if (totAmtRec == '')
        totAmtRec = 0;
    //
    totalMakingCharges = 0;
    //
    suppPurLotEntered++;
    //
    return false;
}
//Prathamesh added code for update kitty End date 27 JUNE 2024
function changeSchemeMaturityDate(userId, kittyId, changedDate, firmId, kittyEndDOB) {
        //
    if (new Date(kittyEndDOB).getTime() < new Date(changedDate).getTime()) {  
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (xmlhttp.responseText == 'true') {
                    document.getElementById("updateSpan").style.display = "block";
                    setTimeout(() => {
                      document.getElementById("updateSpan").style.display = "none";                  
                      showKittyUserDetails(userId, kittyId, firmId);
                    }, "500");                
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omktchangematdate.php?kittyId=" + kittyId + "&changedDate=" + changedDate, true);
        xmlhttp.send();
    } else {
        alert("Please Select Date Greater Than Close Date!");
        showKittyUserDetails(userId, kittyId, firmId);
    }
    //
}
//Prathamesh added code for update kitty End date 27 JUNE 2024
function changeKittyEmiMonth(emiMonth,kitty_mondep_id,kitty_id,userId,firmId) {
    loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (xmlhttp.responseText == 'true') {
                    if (emiMonth != '') {
                        document.getElementById("emiDOBMonth"+kitty_mondep_id+''+kitty_id).style.color='green';
                        document.getElementById("emiDOBMonth"+kitty_mondep_id+''+kitty_id).style.fontWeight = 'bold';
                    } else {
                        document.getElementById("emiDOBMonth"+kitty_mondep_id+''+kitty_id).style.color='black';
                        document.getElementById("emiDOBMonth"+kitty_mondep_id+''+kitty_id).style.fontWeight = 'normal';
                    }
                    document.getElementById("successActive"+kitty_mondep_id+''+kitty_id).style.display = "block";
                    setTimeout(() => {
                    document.getElementById("successActive"+kitty_mondep_id+''+kitty_id).style.display = "none"; 
                    }, "800");                
                } else {
                    document.getElementById("emiDOBMonth"+kitty_mondep_id+''+kitty_id).value = '';
                    alert('Please pay emi first!');
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omktchngemimonth.php?kitty_mondep_id=" + kitty_mondep_id + "&emiMonth=" + emiMonth, true);
        xmlhttp.send();
}

