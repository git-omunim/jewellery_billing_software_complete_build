/* advanceMetal
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var cryCountGobal = 0;
var discountCountGobal = 0;
var billDiscountCountGobal = 0;
var schemeEmiCountGobal = 0;
/***********Start code to add function for adv metal @Author:SHRI14JAN15*************/
/***********Start code to change Div like addNewUdhaarDiv for adv metal @Author:ANUJA12JAN16*************/
function getAdvanceMetalDiv(custId, panelName)
{
//    alert(panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addNewUdhaarDiv").innerHTML = xmlhttp.responseText;
            if (panelName != 'AdvMetalList')
                document.getElementById("DOBDay").focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'AdvMetalList')
        xmlhttp.open("GET", "include/php/omamtdtdv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&showPanel=AdvMetalPanel", true);
    else
        xmlhttp.open("GET", "include/php/omammtdv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&showPanel=AdvMetalPanel", true);
    xmlhttp.send();
}
/***********End code to add function for adv metal @Author:SHRI14JAN15*************/
//********************* Close Add New Udhaar Div ****************************
function closeAdvMetalDiv() {
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
//********************* Show Udhaar Deposit Div ****************************
/***********End code to change Div like addNewUdhaarDiv for adv metal @Author:ANUJA12JAN16*************/

function addAdvanceMetalDetails(obj) {
//    alert(document.getElementById("advMetalOccCheck").value+" "+document.getElementById("advMetalTimePeriod").value);
    if (document.getElementById("paidCounter").value > 0) {
        alert("You can not update details after EMI has been completed !");
        return false;
    } else if ((document.getElementById("advMetalId").value != '') && (document.getElementById("advMetalOccCheck").value != document.getElementById("advMetalTimePeriod").value)) {
        alert("You can not update days, once added!");
        return false;
    } else {

        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("advMetalSubmit").style.visibility = "hidden";
        if (validateAdvMetalInputs(obj)) {
            return true;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("advMetalSubmit").style.visibility = "visible";
        }
        return false;
    }
    return false;
}
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// START CODE FOR PAYTM CHECK STATUS @SIMTRAN:22DEC2023
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function checkStatus(documentRoot, userProdId, userId, requestId, status, transAmt, day, month, year, preInvNo, invNo) {
    const circularProgress = document.querySelectorAll(".circular-progress");
    Array.from(circularProgress).forEach((progressBar) => {
        const progressValue = progressBar.querySelector(".percentage");
        const innerCircle = progressBar.querySelector(".inner-circle");
        let startValue = 0,
                endValue = Number(progressBar.getAttribute("data-percentage")),
                speed = 80,
                progressColorOr = '#f59c00';
        var timesec = 1;
        const progress = setInterval(() => {
            startValue += 10;
            progressValue.textContent = timesec;
            timesec++;
            progressValue.style.color = progressColorOr;
            progressColor = '#89CFF0';
            innerCircle.style.backgroundColor = `${progressBar.getAttribute(
                    "data-inner-circle-color"
                    )}`;

            progressBar.style.background = `conic-gradient(${progressColor} ${
                    startValue * 3.6
                    }deg,${progressBar.getAttribute("data-bg-color")} 0deg)`;
            if (startValue === endValue) {
                clearInterval(progress);
                if (status == 'PENDING') {
                    checkPaytmTransStatus(documentRoot, userProdId, userId, requestId, status, transAmt, day, month, year, preInvNo, invNo);
                }
            }
        }, 900);
    });
}
function checkPaytmTransStatus(documentRoot, userProdId, userId, requestId, status, transAmt, day, month, year, preInvNo, invNo) {
    let i = 0;
    for (i = 1; i <= 6; i++) {
        setTimeout(checkStatus, i * 10000);
    }
    if (status == 'FAIL') {
        window.location.href = documentRoot + "/include/php/ompaytmTransData.php?documentRoot=" + documentRoot + "&userProdId=" + userProdId + "&userId=" + userId + "&requestId=" + requestId + "&status=" + status + "&transAmt=" + transAmt
                + "&day=" + day + "&month=" + month + "&year" + year + "&preInvNo=" + preInvNo + "&invNo=" + invNo;
    } else {
        window.location.href = documentRoot + "/include/php/ompaytmCheckStatusAPI.php?documentRoot=" + documentRoot + "&userProdId=" + userProdId + "&userId=" + userId + "&requestId=" + requestId + "&status=" + status + "&transAmt=" + transAmt
                + "&day=" + day + "&month=" + month + "&year" + year + "&preInvNo=" + preInvNo + "&invNo=" + invNo;
    }
}
//
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// END CODE FOR PAYTM CHECK STATUS @SIMTRAN:22DEC2023
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//
function validateAdvMetalInputs(obj) {
    if (validateSelectField(document.getElementById("advMetalFirmId").value, "Please select Firm!") == false) {
        document.getElementById("advMetalFirmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBDay").value, "Please select Date Day!") == false) {
        document.getElementById("DOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Date Month!") == false) {
        document.getElementById("DOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select Date Year!") == false) {
        document.getElementById("DOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("advMetalType").value, "Please select metal type!") == false) {
        document.getElementById("advMetalType").focus();
        return false;
    } else if (validateSelectField(document.getElementById("advMetalDrAccId").value, "Please select DR Account!") == false) {
        document.getElementById("advMetalDrAccId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("advMetalCrAccId").value, "Please select CR Account!") == false) {
        document.getElementById("advMetalCrAccId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("advMetalWeight").value, "Please enter metal weight!") == false) {
        document.getElementById("advMetalWeight").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("advMetalSerialNo").value, "Please enter Serial Number!") == false ||
            validateNum(document.getElementById("advMetalSerialNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("advMetalSerialNo").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("advMetalAdditionalWeight").value, "Please enter additional weight!") == false) {
        document.getElementById("advMetalAdditionalWeight").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("advMetalTimePeriod").value, "Please enter time period!") == false) {
        document.getElementById("advMetalTimePeriod").focus();
        return false;
    }
    return true;
}
/**********Start code to add function to get debit account @Author:SHRI16JAN15*********/
function getAdvMetalType(div, id, keyCodeInput, panelName, firmNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('addItemMetSelBy').focus();
                document.getElementById('addItemMetSelBy').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/omammtsl" + default_theme + ".php?id=" + id + "&div=" + div + "&panelName=" + panelName + "&firmNo=" + firmNo, true);
    xmlhttp.send();
}
/**********End code to add function to get debit account @Author:SHRI16JAN15*********/
var selFirmNo;
var panelNameDiv;
var addstockDiv;
var nextFieldFirmAccId;
var advMetalPanelMetalType;
function changeAdvMetalDrAccount(selectedMetalType, panel, firmNo, nextFieldId) {

    var poststr = "metalType=" + encodeURIComponent(selectedMetalType)
            + "&firmNo=" + encodeURIComponent(firmNo)
            + "&panel=" + encodeURIComponent(panel);
    nextFieldFirmAccId = nextFieldId;
    addstockDiv = panel;
    advMetalPanelMetalType = selectedMetalType;
    change_Adv_Metal_Dr_Account('include/php/omamacdv' + default_theme + '.php', poststr);
}

function change_Adv_Metal_Dr_Account(url, parameters) {

    loadXMLDoc2();
    xmlhttp2.onreadystatechange = alertchangeAdvMetalDrAccount;
    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);
}
function alertchangeAdvMetalDrAccount() {

    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        alert(xmlhttp2.responseText);
        if (addstockDiv == 'AdvMetal')//change in condition to check for item repair panel @AUTHOR: SANDY26AUG13
        {
            document.getElementById("selAccountDiv").innerHTML = xmlhttp2.responseText;
        } else {
            document.getElementById("selAccountDiv").innerHTML = xmlhttp2.responseText;
            document.getElementById('advMetalDrAccId').focus();
        }
        changeAdvMetalPanelMetalRate(advMetalPanelMetalType);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}

function changeAdditionalWeightField(selectedWeightType, panel, firmNo, advMetalAddWTType)
{
    var poststr = "weightType=" + encodeURIComponent(selectedWeightType)
            + "&firmNo=" + encodeURIComponent(firmNo)
            + "&panel=" + encodeURIComponent(panel)
            + "&advMetalAddWTType=" + encodeURIComponent(advMetalAddWTType);
    panelNameDiv = panel;
    change_Additional_Weight_Field('include/php/omamtpdv' + default_theme + '.php', poststr);
}

function change_Additional_Weight_Field(url, parameters)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertchangeAdditionalWeightField;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertchangeAdditionalWeightField()
{
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (addstockDiv == 'AdvMetal')//change in condition to check for item repair panel @AUTHOR: SANDY26AUG13
        {
            document.getElementById("adMetalWeightSelectDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("adMetalWeightSelectDiv").innerHTML = xmlhttp.responseText;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}

function changeAdvMetalStatus(emiNo, emiPaidDD, emiPaidMM, emiPaidYY, emiStatus, serialNo, custId, firmId, advMetalId,
        advMetalDOB, advMetalTransId, advMetalJrnlId, emiOccur, totWT, initialWT, additionalWT, totWTType, finalAmnt)
{
//    alert('finalAmnt'+finalAmnt);
    if (validateSelectField(document.getElementById("DOBDay" + advMetalTransId + emiNo).value, "Please select Day!") == false) {
        document.getElementById("DOBDay" + advMetalTransId + emiNo).focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth" + advMetalTransId + emiNo).value, "Please select Month!") == false) {
        document.getElementById("DOBMonth" + advMetalTransId + emiNo).focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear" + advMetalTransId + emiNo).value, "Please select Year!") == false) {
        document.getElementById("DOBYear" + advMetalTransId + emiNo).focus();
        return false;
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
            var emiPaidDate = emiPaidDD + ' ' + emiPaidMM + ' ' + emiPaidYY;
            var poststr = "emiNo=" + emiNo
                    + "&emiPaidDate=" + emiPaidDate
                    + "&emiStatus=" + emiStatus
                    + "&serialNo=" + serialNo
                    + "&custId=" + custId
                    + "&firmId=" + firmId
                    + "&advMetalId=" + advMetalId
                    + "&advMetalDOB=" + advMetalDOB
                    + "&advMetalTransId=" + advMetalTransId
                    + "&advMetalJrnlId=" + advMetalJrnlId
                    + "&emiOccur=" + emiOccur
                    + "&totWT=" + totWT
                    + "&initialWT=" + initialWT
                    + "&additionalWT=" + additionalWT
                    + "&totWTType=" + totWTType
                    + "&finalAmnt=" + finalAmnt;
            xmlhttp.open("POST", "include/php/omadmtein" + default_theme + ".php?" + poststr, true);
            xmlhttp.send();
        }
    }
}

function getAdvanceMetalUpdateDiv(advMetalId, panelDiv)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addNewUdhaarDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("advMetalOccurrence").setAttribute("disabled", "disabled");
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelDiv == 'AdvMetalEMI')
        xmlhttp.open("GET", "include/php/omammtdv" + default_theme + ".php?advMetalId=" + advMetalId + "&panelName=UpdateAdvMetal", true);
//    else
//        xmlhttp.open("GET", "include/php/omuanwdt"+ default_theme +".php?advMetalId=" + advMetalId + "&panelName=" + 'UpdateUdhaar', true);
    xmlhttp.send();
}

function deleteCustAdvMetalDetails(custId, firmId, advMetalId, advMetalJrnlId, advMetalSerialNum, advMetalDate, advMetalWeight, advMetalWeightType)
{
    document.getElementById("ajaxLoadAdvMoneyDepositMon" + advMetalId).style.visibility = "visible";
    confirm_box = confirm("Do you really want to Permanent Delete this Advance Metal Details?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ajaxLoadAdvMoneyDepositMon" + advMetalId).style.visibility = "hidden";
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                document.getElementById("DOBDay").focus();
            } else {
                document.getElementById("ajaxLoadAdvMoneyDepositMon" + advMetalId).style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omamtdelc" + default_theme + ".php?custId=" + custId + "&firmId=" + firmId + "&advMetalId=" + advMetalId
                + "&advMetalJrnlId=" + advMetalJrnlId + "&advMetalSerialNum=" + advMetalSerialNum + "&advMetalDate=" + advMetalDate + "&advMetalWeight=" + advMetalWeight + "&advMetalWeightType=" + advMetalWeightType, true);
        xmlhttp.send();
    } else {
        document.getElementById("ajaxLoadAdvMoneyDepositMon" + advMetalId).style.visibility = "hidden";
    }

}

function showAdvMetalPaymentPanel(custId, admtId, totMetalWt, amtReturnLeft, firmId, metalRate, serialNum, metalType)
{
//    alert(metalType);
    if (totMetalWt == 0) {
        alert('Advance metal is not selected');
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("advMetalDepositMonButDiv" + admtId).style.visibility = "hidden";
                document.getElementById("ajaxLoadAdvMoneyDepositMon" + admtId).style.visibility = "hidden";
                document.getElementById("admnDepositMoneyDiv" + admtId).innerHTML = xmlhttp.responseText;
                document.getElementById("payAdvMetalDrAccId").focus();
            } else {
                document.getElementById("advMetalDepositMonButDiv" + admtId).style.visibility = "hidden";
                document.getElementById("ajaxLoadAdvMoneyDepositMon" + admtId).style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omamtpydv" + default_theme + ".php?custId=" + custId + "&admtId=" + admtId + "&amtReturnLeft=" + amtReturnLeft +
                "&firmId=" + firmId + "&serialNum=" + serialNum + "&totMetalWt=" + totMetalWt + "&metalRate=" + metalRate + "&metalType=" + metalType, true);
        xmlhttp.send();
    }
}

function advMetalDepositMoney(obj, admtId) {
    document.getElementById("ajaxLoadAdvMoneyDepSubmit" + admtId).style.visibility = "visible";
    document.getElementById("admnDepMetalSubButDiv" + admtId).style.visibility = "hidden";
    var depositAmt = parseInt(document.getElementById("admnDepositAmount" + admtId).value);
    var leftAmt = parseInt(document.getElementById("admnAmtLeft" + admtId).value);
    if (depositAmt > leftAmt) {
        alert("Deposit amount(" + depositAmt + ") should not more than main amount(" + leftAmt + ")!");
        document.getElementById("ajaxLoadAdvMoneyDepSubmit" + admtId).style.visibility = "hidden";
        document.getElementById("admnDepMetalSubButDiv" + admtId).style.visibility = "visible";
    } else {
        if (validateAdvMetalDepositMoneyInputs(obj, admtId)) {
            return true;
        } else {
            document.getElementById("ajaxLoadAdvMoneyDepSubmit" + admtId).style.visibility = "hidden";
            document.getElementById("admnDepMetalSubButDiv" + admtId).style.visibility = "visible";
        }
        return false;
    }
}

function validateAdvMetalDepositMoneyInputs(obj, admnId) {
    if (validateEmptyField(document.getElementById("admnDepositAmount" + admnId).value, "Please enter Deposit Amount!") == false ||
            validateNumWithDot(document.getElementById("admnDepositAmount" + admnId).value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("admnDepositAmount" + admnId).focus();
        return false;
    } else if (document.getElementById("admnDepositAmount" + admnId).value == 0) {
        alert('Please enter Correct Amount!');
        document.getElementById("admnDepositAmount" + admnId).focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBDay").value, "Please select Deposit Amount Date!") == false) {
        document.getElementById("DOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Deposit Amount Date!") == false) {
        document.getElementById("DOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select Deposit Amount Date!") == false) {
        document.getElementById("DOBYear").focus();
        return false;
    }
    return true;
}

function closeAdvMetalDepositDiv(admtDepId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("advMetalDepositMonButDiv" + admtDepId).style.visibility = "visible";
            document.getElementById("admnDepositMoneyDiv" + admtDepId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxCloseAdvMoneyDepositMonDiv" + admtDepId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}

function changeAdvMetalPanelMetalRate(metalType) {
    var poststr = "metalType=" + encodeURIComponent(metalType) +
            "&panelName=" + encodeURIComponent(addstockDiv);
    change_Adv_Metal_Panel_Metal_Rate('include/php/ommrggdr"+ default_theme +".php', poststr);
    return false;
}

function change_Adv_Metal_Panel_Metal_Rate(url, parameters) {

    loadXMLDoc2();
    xmlhttp2.onreadystatechange = alertChangeAdvMetalPanelMetalRate;
    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);
}
function alertChangeAdvMetalPanelMetalRate() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (addstockDiv == 'AdvMetal') {
            document.getElementById("metalRateDiv").innerHTML = xmlhttp2.responseText;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}

function getAdvMetalRate(metalType, keyCodeInput, div, id) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('goldIdListDivToAddGoldIdSelect').focus();
                document.getElementById('goldIdListDivToAddGoldIdSelect').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/omammtrt" + default_theme + ".php?metalType=" + metalType + "&div=" + div + "&id=" + id, true);
    xmlhttp.send();
}

function calcAdvMetalValuation()
{
//    alert(document.getElementById('advMetalValuation').value);


    var wtType = document.getElementById('advMetalWeightType').value;
    var wt = document.getElementById('advMetalWeight').value;
    var addWt = document.getElementById('advMetalAdditionalWeight').value;
    var metalType = document.getElementById('advMetalType').value;
    var metalRate = document.getElementById('advMetalMetalRate').value;
    var totWt = parseFloat(wt) + parseFloat(addWt);
    document.getElementById('advMetalValuation').value = '0.0';
//alert(document.getElementById('advMetalValuation').value);


    if (wt != '')
    {
        if (metalType == 'Gold') {
            if (wtType == 'MG') {
                document.getElementById('advMetalValuation').value = Math_round((totWt * metalRate) / document.getElementById('gmWtInMg').value).toFixed(2);
            } else if (wtType == 'GM') {
                document.getElementById('advMetalValuation').value = Math_round((totWt * metalRate) / document.getElementById('gmWtInGm').value).toFixed(2);
            } else {
                document.getElementById('advMetalValuation').value = Math_round((totWt * metalRate * document.getElementById('gmWtInKg').value)).toFixed(2);
            }
        } else if (metalType == 'Silver') {
            if (wtType == 'MG') {
                document.getElementById('advMetalValuation').value = Math_round((totWt * metalRate) / document.getElementById('srGmWtInMg').value).toFixed(2);
            } else if (wtType == 'GM') {
                document.getElementById('advMetalValuation').value = Math_round((totWt * metalRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
            } else {
                document.getElementById('advMetalValuation').value = Math_round((totWt * metalRate * document.getElementById('srGmWtInKg').value)).toFixed(2);
            }
        } else if (metalType == 'strsilver') {
            if (wtType == 'MG') {
                document.getElementById('advMetalValuation').value = Math_round((totWt * metalRate) / document.getElementById('strsrGmWtInMg').value).toFixed(2);
            } else if (wtType == 'GM') {
                document.getElementById('advMetalValuation').value = Math_round((totWt * metalRate) / document.getElementById('strsrGmWtInGm').value).toFixed(2);
            } else {
                document.getElementById('advMetalValuation').value = Math_round((totWt * metalRate * document.getElementById('strsrGmWtInKg').value)).toFixed(2);
            }
        }

    }
    if (document.getElementById('advMetalValuation').value == 'NaN' || document.getElementById('advMetalValuation').value == '')//Start code to change position of if condition @Author:SHRI25MAR15
    {
        document.getElementById('advMetalValuation').value = '0.0';
    }//End code to change position of if condition @Author:SHRI25MAR15
    return false;
}


function showPaidAdvanceMetalDetailsDiv(custId, firmId)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "hidden";
            document.getElementById("custAdvanceMetalDetailsDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omadmtud" + default_theme + ".php?custId=" + custId + "&firmId=" + firmId, true);
    xmlhttp.send();
}
/************Start code to add function for 61L stock @Author:SHRI11FEB15*************/
function update61BarCode(omLayoutOptionTop, omLayoutOptionTopValue, omLayoutOptionLeft, omLayoutOptionLeftValue,
        fontSize, fontSizeValue, slipWidth, slipWidthValue, slipHeight, slipHeightValue,
        noOfRows, noOfRowsValue, tailLength, tailLengthValue, blockWidth, blockWidthValue, blockHeight, blockHeightValue) {
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
    var postStr = 'omLayoutOptionTop=' + omLayoutOptionTop + '&omLayoutOptionTopValue=' + omLayoutOptionTopValue
            + '&omLayoutOptionLeft=' + omLayoutOptionLeft + '&omLayoutOptionLeftValue=' + omLayoutOptionLeftValue
            + '&fontSize=' + fontSize + '&fontSizeValue=' + fontSizeValue
            + '&slipWidth=' + slipWidth + '&slipWidthValue=' + slipWidthValue
            + '&slipHeight=' + slipHeight + '&slipHeightValue=' + slipHeightValue
            + '&noOfRows=' + noOfRows + '&noOfRowsValue=' + noOfRowsValue
            + '&tailLength=' + tailLength + '&tailLengthValue=' + tailLengthValue
            + '&blockWidth=' + blockWidth + '&blockWidthValue=' + blockWidthValue
            + '&blockHeight=' + blockHeight + '&blockHeightValue=' + blockHeightValue;
    xmlhttp.open("POST", "include/php/ombcbcup" + default_theme + ".php?" + postStr, true);
    xmlhttp.send();
}
/************End code to add function for 61L stock @Author:SHRI11FEB15*************/



/****************Start code to add function for 61L LeftBarcode stock @Author:BAJRANG1JUN18********************/
function update61LeftBarcode() {
//    alert('hiiiiii');
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barcode55x13").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//    xmlhttp.open("GET", "include/php/ogibbc61x12dvleft"+ default_theme +".php", true);
    xmlhttp.open("GET", "include/php/omstockTransibbc61x12dvleft" + default_theme + ".php", true);
    xmlhttp.send();
}
/****************End code to add function for 61L LeftBarcode stock @Author:BAJRANG1JUN18********************/


/****************Start code to add function for 61L LeftBarcode stock @Author:BAJRANG1JUN18********************/
function update61RightBarcode() {
//    alert('hiiiiii');
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barcode55x13").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//    xmlhttp.open("GET", "include/php/ogibbc61x12dv"+ default_theme +".php", true);
    xmlhttp.open("GET", "include/php/omstockTransibbc61x12dvright" + default_theme + ".php", true);
    xmlhttp.send();
}
/****************End code to add function for 61L LeftBarcode stock @Author:BAJRANG1JUN18********************/


/*******START CODE TO Delete 61L Slip @AUTHOR:SHRI17FEB15***********/
function deleteItemBarCode61L(barCodeSlipDiv, closeDivId, barCodePrintId, preId, postId) {
    confirm_box = confirm("Do you really want to Delete this Item Bar Code Slip?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(closeDivId).innerHTML = xmlhttp.responseText;
                document.getElementById(barCodeSlipDiv).innerHTML = "";
                window.setTimeout(closeBarCodeSlipCloseButt, 1000);
            } else {
                document.getElementById(closeDivId).innerHTML = "<img src='images/loading16.gif' />";
            }
        };
        xmlhttp.open("POST", "include/php/ogibppdl_1" + default_theme + ".php?barCodePrintId=" + barCodePrintId + "&preId=" + preId + "&postId=" + postId, true);
        xmlhttp.send();
    }
    function closeBarCodeSlipCloseButt()
    {
        document.getElementById(closeDivId).innerHTML = "";
    }
}
/*******START CODE TO Delete 61L Slip @AUTHOR:SHRI17FEB15***********/
/*********Start code to add metal div @Author:SHRI05JAN15**********/
function getRepairItemMoreRawMetalDiv(metalCnt, panelName, firmId, rawGdPreId, rawGdPostId, metalType, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
        metalPanelName, mcntr, rawPreId, rawPostId) {
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
            + "&mcntr=" + mcntr + "&rawPreId=" + rawPreId + "&rawPostId=" + rawPostId;
    if (panelName == 'SuppRawDep')
        get_more_raw_metal_div('include/php/ogwurwdv' + default_theme + '.php', poststr);
    else
        get_more_raw_metal_div('include/php/ogcmrpydt' + default_theme + '.php', poststr);
    return false;
}
/*********End code to add metal div @Author:SHRI05JAN15*******************/
/*****Start code to repair panel @Author:SHRI05JAN15*********/
function getRepairItemRawMetalType(panelName, metalType, metalCount, firmId, rawGdPreId, rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId, metalTypePanel, cntr) {
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
//    alert("metaltype=="+metalType);

    xmlhttp.open("POST", "include/php/ogcmrpydt" + default_theme + ".php?panelName=" + panelName + "&metalType=" + metalType +
            "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId + "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
            "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr, true);
    xmlhttp.send();
}
/****************End code to repair panel @Author:SHRI05JAN15***************/
/*********Start code to get accounts field @Author:SHRI17FEB15**********/
function get61LBarCodeField(option, value, panelName) {
//    alert(panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barCodePrintPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omggbcad_1" + default_theme + ".php?option=" + option + "&value=" + value + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/*********End code to get accounts field @Author:SHRI17FEB15**********/
/*****************Start code to change parameters of a function of udhaar search list @Author:SHRI26FEB15.**************************/
/*****************Start code to add udhaar search list @Author:SHRI25FEB15.**************************/
function searchUdhaarPanel(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("udhharListDiv").innerHTML = xmlhttp.responseText;
            //alert(xmlhttp.responseText);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omuulstp" + default_theme + ".php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage, true);
    xmlhttp.send();
}
/*****************End code to add udhaar search list @Author:SHRI25FEB15.**************************/
/*****************Start code to change parameters of a function of udhaar search list @Author:SHRI26FEB15.**************************/
/*****************Start code to add function for sorting of udhaar list @Author:SHRI26FEB15**************/
function sortUdhaarPanel(documentRootPath, sortKeyword, selFirmId, rowsPerPage) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("udhharListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omuulstp" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId +
            "&rowsPerPage=" + rowsPerPage, true);
    xmlhttp.send();
}

/*****************End code to add function for sorting of udhaar list @Author:SHRI26FEB15**************/
/*****************Start code to add function to get fine wt by nt wt or gs wt of item puchase panel @Author:SHRI04MAR15**************/
function getItemPurchaseFfnWt(div, id, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('itemPurchaseWtBy').focus();
                document.getElementById('itemPurchaseWtBy').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogipfwsl" + default_theme + ".php?div=" + div, true);
    xmlhttp.send();
}
/*****************End code to add function to get fine wt by nt wt or gs wt of item puchase panel @Author:SHRI04MAR15**************/
//**************************** Get Girvi Transfer Info Pop UP @Author:SHRI13MAY15*****************************************
function getGirviTransferInfoPopUp(custId, girviId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/olggtpop" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId, true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
}
//**************************** Get Girvi Transfer Info Pop UP @Author:SHRI13MAY15*****************************************
/****************************START Code To Add Function for hide girvi pop up in cust home @Author:SHRI13MAY15*****************************************/
function getGirviTransInfoPopUpHideInCustHome(girviId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup" + girviId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup" + girviId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/****************************END Code To Add Function for hide girvi pop up in cust home @Author:SHRI13MAY15*****************************************/
//**************************** Hide Girvi Info POP UP @Author:SHRI13MAY15*****************************************
function getGirviTransInfoPopUpHide(girviId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/**********Start code to add parameter root path @Author:SHRI14MAY15****************/
function searchGirviTransByGirviId(girviId, documentRootPath) {
//button.style.visibility = "hidden";
    poststr = "girviId=" + encodeURIComponent(girviId);
    search_girvi_trans_by_girviId(documentRootPath + "/include/php/olgsgidd" + default_theme + ".php", poststr); //change in filename @AUTHOR: SANDY22NOV13 
}
/**********End code to add parameter root path @Author:SHRI14MAY15****************/
/*********Start code to add search_girvi_trans_by_girviId,alertSearchGirviTransByGirviId @Author:SHRI14MAY15*************/
function search_girvi_trans_by_girviId(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchGirviTransByGirviId;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchGirviTransByGirviId() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
        parent.document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        //refreshMainRightDiv();
    } else {
        document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "visible";
    }
}
/*********End code to add search_girvi_trans_by_girviId,alertSearchGirviTransByGirviId @Author:SHRI14MAY15*************/
/*****Start code to add function for customer purchase balance EMI @Author:SHRI15MAY15*******/
function getEMIOption(emiVal, custId, firmId, totBalance, payPreInvoiceNo, payInvoiceNo, slPrId, udhaarDate, invoiceNo, payPanelName, panelName, totBalance) {
//    alert(firmId);
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("indicSellEMIOpt").innerHTML = xmlhttp2.responseText;
            document.getElementById('selROIValue').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp2.open("POST", "include/php/ogademop" + default_theme + ".php?custId=" + custId + "&firmId=" + firmId + "&emiVal=" + emiVal + "&totBalance=" + totBalance + "&payPreInvoiceNo=" + payPreInvoiceNo + "&payInvoiceNo=" + payInvoiceNo + "&slPrId=" + slPrId + "&udhaarDate=" + udhaarDate + "&invoiceNo=" + invoiceNo + "&panelName=" + panelName + "&payPanelName=" + payPanelName, true);
    xmlhttp2.send();
}
/*****End code to add function for customer purchase balance EMI @Author:SHRI15MAY15*******/
/*****Start code to add function for customer purchase balance EMI ROI search @Author:SHRI15MAY15*******/
/*****Start code to add parameter nextFieldId @Author:SHRI16MAY15*******/
function searchROIForEMI(roiValue, intType, girviId, custId, panelName, keyCodeInput, girviDOB, girviFirmId, girviSerialNum, nextFieldId) {
//    keyCodeForRoiValue = keyCodeInput;
//    keyCodeForRoiValueOption = 0;
    var poststr = "ROIValue=" + encodeURIComponent(roiValue) +
            "&interestType=" + encodeURIComponent(intType) +
            "&girviId=" + encodeURIComponent(girviId) +
            "&custId=" + encodeURIComponent(custId) +
            "&panelName=" + encodeURIComponent(panelName) +
            "&girviDOB=" + encodeURIComponent(girviDOB) +
            "&girviFirmId=" + encodeURIComponent(girviFirmId) +
            "&girviSerialNum=" + encodeURIComponent(girviSerialNum) +
            "&nextFieldId=" + encodeURIComponent(nextFieldId);
    search_roi_for_emi('include/php/ogcsroisl' + default_theme + '.php', poststr);
}
/*****End code to add parameter nextFieldId @Author:SHRI16MAY15*******/
function search_roi_for_emi(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchRoiForEMI;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertSearchRoiForEMI() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("roiListDivToAddROI").innerHTML = xmlhttp.responseText;
        document.getElementById('roiListToAddRoiSelect').focus();
        document.getElementById('selROIValue').focus();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/*****Start code to add parameter nextFieldId @Author:SHRI16MAY15*******/
function getROIValByIdForEMI(documentRootPath, roiId, girviId, custId, panelName, intType, girviDOB, girviFirmId, girviSerialNum, nextFieldId) {
    updateRoiValPanelName = panelName;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("roiSelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }

    xmlhttp.open("POST", "include/php/ogroisid" + default_theme + ".php?roiId=" + roiId + "&girviId=" + girviId + "&custId=" + custId +
            "&panelName=" + panelName + "&intType=" + intType + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum + "&nextFieldId=" + nextFieldId, true);
    xmlhttp.send();
}
/*****End code to add parameter nextFieldId @Author:SHRI16MAY15*******/
function setSellPurchaseEMI()
{
    if (validateSellPurchaseEMIInputs()) {


        var poststr = "firmId=" + encodeURIComponent(document.sell_purchase_EMI.firmId.value)
                + "&payPreInvoiceNo=" + encodeURIComponent(document.sell_purchase_EMI.payPreInvoiceNo.value)
                + "&payInvoiceNo=" + encodeURIComponent(document.sell_purchase_EMI.payInvoiceNo.value)
                + "&slPrId=" + encodeURIComponent(document.sell_purchase_EMI.slPrId.value)
                + "&custId=" + encodeURIComponent(document.sell_purchase_EMI.custId.value)
                + "&udhaarDOB=" + encodeURIComponent(document.sell_purchase_EMI.udhaarDOB1.value)
                + "&balanceLeft=" + encodeURIComponent(document.sell_purchase_EMI.balanceLeft.value)
                + "&roiValue=" + encodeURIComponent(document.sell_purchase_EMI.selROIValue.value)
                + "&roiId=" + encodeURIComponent(document.sell_purchase_EMI.selROI.value)
                + "&EMINoOfDays=" + encodeURIComponent(document.sell_purchase_EMI.EMINoOfDays.value)
                + "&EMIOccurrences=" + encodeURIComponent(document.sell_purchase_EMI.EMIOccurrences.value);
//        alert(document.sell_purchase_EMI.balanceLeft.value);
        set_sell_purchase_EMI('include/php/ogspemad' + default_theme + '.php', poststr);
    }
}
function set_sell_purchase_EMI(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSetSellPurchaseEMI;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertSetSellPurchaseEMI() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}

function validateSellPurchaseEMIInputs()
{
    if (validateSelectField(document.getElementById("selROIValue").value, "Please select ROI!") == false) {
        document.getElementById("selROIValue").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("EMINoOfDays").value, "Please enter number of days!") == false) {
        document.getElementById("EMINoOfDays").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("EMIOccurrences").value, "Please enter emi occurrences!") == false) {
        document.getElementById("EMIOccurrences").focus();
        return false;
    } else {
        return true;
    }
    return false;
}
/*****End code to add function for customer purchase balance EMI @Author:SHRI15MAY15*******/
/*****************Start code to add function to sort pending emi list @Author:SHRI15MAY15*************/
function sortPendingUdhaarEMIList(documentRootPath, sortKeyword, selFirmId, div, panel, timePeriod) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omsemilt" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel + "&timePeriod=" +
            timePeriod, true);
    xmlhttp.send();
}
/*****************End code to add function to sort pending emi list @Author:SHRI15MAY15*************/
/*****************Start code to add function to search pending emi list @Author:SHRI15MAY15*************/
function searchPendingUdhaarEMIList(documentRootPath, searchColumn, searchValue, selFirmId, div, panel, timePeriod) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omsemilt" + default_theme + ".php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel + "&timePeriod=" + timePeriod, true);
    xmlhttp.send();
}
/***************Start code to change function @Author:SHRI04JUN15****************/
/*****************End code to add function to search pending emi list @Author:SHRI15MAY15*************/
//Start code to add function @Author:SHRI15MAY15
function addPaymentItemPurchase() {
    if ((document.getElementById("upPanel").value == 'SellPayUp' || document.getElementById("upPanel").value == 'SellDetUpPanel') && parseFloat(document.getElementById("invoiceRow").value) > 0) {
        alert('You can not update this Item');
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("paySubButtDiv").style.visibility = "hidden";
        payPanelName = document.getElementById("payPanelName").value;
        var udhaarEMIChk = document.getElementById("udhaarEMICheck").checked;
        if (payPanelName == 'StockPayment' || payPanelName == 'StockPayUp') {
            var subPanel = document.getElementById("suppSubPanel").value;
            var itemMainPanel = document.getElementById("itemMainPanel").value;
            if (itemMainPanel == 'addByInv') {
//  var subPanel = document.getElementById("subPanel").value;
//  if (subPanel == 'SuppPurByInv') {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("paySubButtDiv").style.visibility = "visible";
                if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Id!") == false) {
                    document.getElementById("firmId").focus();
                    return false;
                }
                suppItmEntered = 0;
                for (var dc = 1; dc <= getSuppItemDiv; dc++) {
                    if ((document.getElementById('suppItemDel' + dc).value != 'Deleted')) {
                        if (validateEmptyField(document.getElementById("suppItemGsWt" + dc).value, "Please enter gross weight of lot" + dc + "!") == false) {
                            document.getElementById("suppItemGsWt" + dc).focus();
                            return false;
                        } else if (validateEmptyField(document.getElementById("suppItemNtWt" + dc).value, "Please enter net weight of lot" + dc + "!") == false) {
                            document.getElementById("suppItemNtWt" + dc).focus();
                            return false;
                        } else if (validateEmptyField(document.getElementById("suppItemFnWt" + dc).value, "Please enter fine weight of lot" + dc + "!") == false) {
                            document.getElementById("suppItemFnWt" + dc).focus();
                            return false;
                        } else if (validateEmptyField(document.getElementById("suppItemFinVal" + dc).value, "Please enter final valuation of lot" + dc + "!") == false) {
                            document.getElementById("suppItemFinVal" + dc).focus();
                            return false;
                        }
                    }
                    suppItmEntered++;
                }
                document.getElementById("noOfSuppItem").value = suppItmEntered;
                // }
                confirm_box = confirm(addAlertMess + " Do you really want to continue!");
                if (confirm_box != true) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("paySubButtDiv").style.visibility = "visible";
                    return false;
                }

            }

        }
//    alert(udhaarEMIChk);
        if (udhaarEMIChk == true) { //alert(udhaarEMIChk);
            if ((document.getElementById("udhaarId").value != '') && (document.getElementById("udharOccCheck").value != document.getElementById("EMIOccurrences").value)) {
                alert("You can not update EMI occurences, once added!");
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("paySubButtDiv").style.visibility = "visible";
                return false;
            } else {
                if (validateSelectField(document.getElementById("selROIValue").value, "Please select ROI!") == false) {
                    document.getElementById("selROIValue").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("paySubButtDiv").style.visibility = "visible";
                    return false;
                } else if (validateEmptyField(document.getElementById("EMINoOfDays").value, "Please enter number of days!") == false) {
                    document.getElementById("EMINoOfDays").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("paySubButtDiv").style.visibility = "visible";
                    return false;
                } else if (validateEmptyField(document.getElementById("EMIOccurrences").value, "Please enter emi occurrences!") == false) {
                    document.getElementById("EMIOccurrences").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("paySubButtDiv").style.visibility = "visible";
                    return false;
                }
            }
//        return false;
        }
        if (((payPanelName == 'StockPayment' || payPanelName == 'StockPayUp') && itemMainPanel == 'addByItems') || payPanelName == 'SuppAddOrder' || payPanelName == 'SuppOrderUp') {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("paySubButtDiv").style.visibility = "visible";
            var prefix = document.getElementById("prefix").value;
            if (document.getElementById('payButClickId').value == 'true' && document.getElementById('noOfItemsInTable').value != 0) {

            } else {
                if (document.getElementById("itemSubPanel").value == 'addByItemsUp' || document.getElementById("itemSubPanel").value == 'itemsAddUp' || document.getElementById('simItemPanel').value == 'SimilarItem' ||
                        document.getElementById("itemPanel").value == 'SuppOrderUp') {
                    if (noOfCrystal == '' || noOfCrystal == undefined) {
                        noOfCrystal = document.getElementById("noOfCry").value;
                    }
                }
                if (validateSelectField(document.getElementById("firmId").value, "Please select Firm!") == false) {
                    document.getElementById("firmId").focus();
                    return false;
                } else if ((document.getElementById("addItemMetal").value != 'Other') && validateEmptyField(document.getElementById("addItemMetalRate").value, "Please enter Metal Rate!") == false) {
                    document.getElementById("addItemMetalRate").focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("addItemId").value, "Please enter Item Id!") == false ||
                        validateNum(document.getElementById("addItemId").value, "Accept only numeric characters without space character!") == false) {
                    document.getElementById("addItemId").focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("addItemName").value, "Please enter Item Name!") == false) {
                    document.getElementById("addItemName").focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("addItemPieces").value, "Please enter Item Pieces!") == false ||
                        validateNum(document.getElementById("addItemPieces").value, "Accept only numeric characters without space!") == false) {
                    document.getElementById("addItemPieces").focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("addItemGrossWeight").value, "Please enter Gross Weight!") == false ||
                        validateNumWithDot(document.getElementById("addItemGrossWeight").value, "Accept only numeric characters without space!") == false) {
                    document.getElementById("addItemGrossWeight").focus();
                    return false;
                } else if (document.getElementById('panelSimilarDiv').value != 'NoSimilarItem') {
                    if (document.getElementById("addItemNetWeight").value == '') {
                        document.getElementById("addItemNetWeight").value = document.getElementById("addItemGrossWeight").value;
                        calItemPrice();
                    }
                    return true;
                } else if (document.getElementById('panelSimilarDiv').value != 'NoSimilarItem') {
                    if (validateEmptyField(document.getElementById("addItemNetWeight").value, "Please enter Net Weight!") == false ||
                            validateNumWithDot(document.getElementById("addItemNetWeight").value, "Accept only numeric characters without space!") == false) {
                        document.getElementById("addItemNetWeight").focus();
                        return false;
                    }
                } else if ((document.getElementById("addItemMetal").value != 'Other') && validateSelectField(document.getElementById("addItemTunch").value, "Please select Item Tunch or Purity!") == false) {
                    document.getElementById("addItemTunch").focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("addItemFinalVal").value, "Please enter Item Final Valuation!") == false ||
                        validateNumWithDot(document.getElementById("addItemFinalVal").value, "Accept only numeric characters without space!") == false) {
                    document.getElementById("addItemFinalVal").focus();
                    return false;
                } else if (noOfCrystal != '' && noOfCrystal != undefined && noOfCrystal != '0') {
                    suppCryEntered = 0;
                    for (var cry = 1; cry <= noOfCrystal; cry++) {
                        if (document.getElementById("del" + cry).value != 'Deleted') {
                            if (validateEmptyField(document.getElementById("addItemCryGSW" + cry).value, "Please enter Crystal Weight " + cry + "!") == false) {
                                document.getElementById("addItemCryGSW" + cry).focus();
                                return false;
                            } else if (validateEmptyField(document.getElementById("addItemCryRate" + cry).value, "Please enter Crystal Rate " + cry + "!") == false) {
                                document.getElementById("addItemCryRate" + cry).focus();
                                return false;
                            } else if (validateEmptyField(document.getElementById("addItemCryVal" + cry).value, "Please enter Crystal Valuation " + cry + "!") == false) {
                                document.getElementById("addItemCryVal" + cry).focus();
                                return false;
                            }
                            suppCryEntered++;
                        }
                    }
                    document.getElementById("addItemCryCount").value = suppCryEntered;
                }

            }
        }
//    alert(payPanelName);
        if (validateAddNewSuppInvoice(payPanelName)) {
            if (payPanelName == 'StockPayment' || payPanelName == 'SlPrPayment' || payPanelName == 'CustSellPayment' || payPanelName == 'RawPayment'
                    || payPanelName == 'NwOrPayment' || payPanelName == 'SuppAddOrder') {
                document.getElementById("totMetal").value = getMetalDiv;
            } else if (payPanelName == 'StockPayUp' || payPanelName == 'SellPayUp' || payPanelName == 'CustSellPayUp' || payPanelName == 'RawPayUp'
                    || payPanelName == 'NwOrPayUp' || payPanelName == 'SuppOrderUp') {
                document.getElementById("totMetal").value = document.getElementById("noOfRawMet").value;
            }
            return true;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("paySubButtDiv").style.visibility = "visible";
            return false;
        }
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("paySubButtDiv").style.visibility = "visible";
    return false;
}
//End code to add function @Author:SHRI15MAY15
/***************End code to Add slprinPanel @Author:SHRI15MAY15****************/
/***************End code to change function @Author:SHRI04JUN15****************/
/***************Start code to change function @Author:GAUR09APR16****************/
/***************Start code to change function add LAST THREE VARIABLE @Author:GAUR25may16****************/
function getPaymentDivForItemPurchase(documentRootPath, preInvoiceNo, postInvoiceNo, panelName, navPanel, slprinPanel, custId, totFinGdWt, totFinSlWt, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (navPanel == 'SellPurchase') {
                document.getElementById("slPrMainDiv").innerHTML = xmlhttp.responseText;
            } else if (navPanel == 'NewOrder') {
                document.getElementById("newOrderDivs").innerHTML = xmlhttp.responseText;
            } else if (navPanel == 'RawStock') {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogcmemdv" + default_theme + ".php?paymentPanelName=" + panelName + "&preInvNo=" + preInvoiceNo + "&postInvNo=" + postInvoiceNo + "&slprinPanel=" + slprinPanel + "&custId=" + custId + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt + "&panel=" + panel, true); // panel added @Author:SHRI07JUL16
//   "&itemValuation=" + totalValuation + "&panelName1=defaultValuation"
    xmlhttp.send();
}
/***************Start code to change function add LAST THREE VARIABLE @Author:GAUR25may16****************/
/***************END code to change function @Author:GAUR09APR16****************/
/***************End code to Add slprinPanel @Author:SHRI15MAY15****************/
/********************Start code to add function @Author:SHRI10JUN15*****************************/
function updateUdhaDepAmt(emiPaidDD, emiPaidMM, emiPaidYY, documentRootPath, custId, udhaarId, udhaDepId, updateUdhaDepIntAmt, updateUdhaDepAmt, uFirmId, uDOB, uSerialNo, udhaDepOption) {

    document.getElementById("updateUdhaDepAmtCloseButton" + udhaDepId).style.visibility = "hidden";
    document.getElementById("updateUdhaDepAmtROIButton" + udhaDepId).style.visibility = "hidden";
    var totEMIAmt = parseFloat(document.getElementById('totEMIAmt' + udhaarId).value);
    var totEMIIntAmt = parseFloat(document.getElementById('totEMIIntAmt' + udhaarId).value);
//    alert(totEMIAmt+' '+updateUdhaDepAmt);
    if (updateUdhaDepAmt == '') {
        alert('Please enter udhaar EMI amount!');
        document.getElementById("updateUdhaDepAmt" + udhaDepId).focus();
    } else if (updateUdhaDepIntAmt == '') {
        alert('Please enter udhaar EMI Interest amount!');
        document.getElementById("updateUdhaDepIntAmt" + udhaDepId).focus();
    } else if (totEMIAmt < updateUdhaDepAmt) {
        alert('Amount should not be greater than total EMI amount!'); //change in line @AUTHOR: SANDY28JAN14
        document.getElementById("updateUdhaDepAmt" + udhaDepId).focus();
    } else if (totEMIIntAmt < updateUdhaDepIntAmt) {
        alert('Interest amount should not be greater than total EMI Interest amount!'); //change in line @AUTHOR: SANDY28JAN14
        document.getElementById("updateUdhaDepIntAmt" + udhaDepId).focus();
    } else {
        confirm_box = confirm("Do you really want to update amount?"); //change in line @AUTHOR: SANDY28JAN14

        if (confirm_box == true)
        {
            var emiPaidDate = emiPaidDD + ' ' + emiPaidMM + ' ' + emiPaidYY;
//            alert(emiPaidDate);
            var poststr = "custId=" + custId + "&udhaarId=" + udhaarId +
                    "&udhaDepId=" + udhaDepId + "&updateUdhaDepAmt=" + updateUdhaDepAmt
                    + "&updateUdhaDepIntAmt=" + updateUdhaDepIntAmt
                    + "&uFirmId=" + uFirmId
                    + "&uDOB=" + uDOB + "&uSerialNo=" + uSerialNo
                    + "&totEMIAmt=" + totEMIAmt +
                    "&totEMIIntAmt=" + totEMIIntAmt +
                    "&emiPaidDate=" + emiPaidDate;
            //alert(poststr);
//            alert(udhaDepOption);
            if (udhaDepOption == 'DIVIDE') {
                update_udha_dep_amt(documentRootPath + '/include/php/omuuemid' + default_theme + '.php', poststr);
            } else if (udhaDepOption == 'PAYMENT') {
                update_udha_dep_amt(documentRootPath + '/include/php/omuuemia' + default_theme + '.php', poststr);
            }
        } else {
            document.getElementById("updateUdhaDepAmt" + udhaDepId).focus();
        }
    }
    document.getElementById("updateUdhaDepAmtCloseButton" + udhaDepId).style.visibility = "visible";
    document.getElementById("updateUdhaDepAmtROIButton" + udhaDepId).style.visibility = "visible";
    return false;
}
function updateUdhaDepAmtByDivide(documentRootPath, custId, udhaarId, udhaDepId, updateUdhaDepAmt, uFirmId, uDOB, uSerialNo) {

    document.getElementById("updateUdhaDepAmtCloseButton" + udhaDepId).style.visibility = "hidden";
    document.getElementById("updateUdhaDepAmtROIButton" + udhaDepId).style.visibility = "hidden";
    var totEMIAmt = parseFloat(document.getElementById('totEMIAmt' + udhaarId).value);
//    alert(totEMIAmt+' '+updateUdhaDepAmt);
    if (updateUdhaDepAmt == '') {
        alert('Please enter udhaar EMI amount!');
        document.getElementById("updateUdhaDepAmt" + udhaDepId).focus();
    } else if (totEMIAmt < updateUdhaDepAmt) {
        alert('Amount should not be greater than total EMI amount!'); //change in line @AUTHOR: SANDY28JAN14
        document.getElementById("updateUdhaDepAmt" + udhaDepId).focus();
    } else {
        confirm_box = confirm("Do you really want to update amount?"); //change in line @AUTHOR: SANDY28JAN14

        if (confirm_box == true)
        {
            var poststr = "custId=" + custId + "&udhaarId=" + udhaarId +
                    "&udhaDepId=" + udhaDepId + "&updateUdhaDepAmt=" + updateUdhaDepAmt
                    + "&uFirmId=" + uFirmId
                    + "&uDOB=" + uDOB + "&uSerialNo=" + uSerialNo
                    + "&totEMIAmt=" + totEMIAmt;
            //alert(poststr);
            update_udha_dep_amt(documentRootPath + '/include/php/omuuemd' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
        } else {
            document.getElementById("updateUdhaDepAmt" + udhaDepId).focus();
        }
    }
    document.getElementById("updateUdhaDepAmtCloseButton" + udhaDepId).style.visibility = "visible";
    document.getElementById("updateUdhaDepAmtROIButton" + udhaDepId).style.visibility = "visible";
    return false;
}

function update_udha_dep_amt(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertUpdateUdhaDepAmt;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertUpdateUdhaDepAmt() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/********************End code to add function @Author:SHRI10JUN15*****************************/
/*********Start code add function for unrelease transfer girvi @Author:SHRI15JUN15**************/
function reactiveTransferGirvi(girviId, custId, girviTransId, girviSettleStatus) {
//    alert(girviSettleStatus);
    confirm_box = confirm("Do you really want to Un-release this transfer girvi?");
//   alert(girviTransId);
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("reactiveTransGirvi").style.visibility = "visible";
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                clearMessage();
            } else {

                document.getElementById("reactiveTransGirvi").style.visibility = "hidden";
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/olgrgtrn" + default_theme + ".php?girviId=" + girviId + "&custId=" + custId + "&girviTransId=" + girviTransId + "&girviSettleStatus=" + girviSettleStatus, true);
        xmlhttp.send();
    }
}
/*********End code add function for unrelease transfer girvi @Author:SHRI15JUN15**************/
//**************************** Navigate Girvi *******************************************************************
function navigationGirviTransfer(pageNo, custId, girviId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLdGirviInfoBelowButtPanelDiv").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLdGirviInfoBelowButtPanelDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olggtgvd" + default_theme + ".php?page=" + pageNo + "&custId=" + custId + "&girviId=" + girviId, true); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
//**************************** Navigate Girvi Receipt Panel *******************************************************************
/*****************Start code to add function @Author:SHRI30JUN15*******************************************/
function performAction(id, custId) {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
//            alert(req.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (id == "verifyButt") {
//                alert(str);
                var str = req.responseText;
//                alert(str);

                var strArray = new Array();
                strArray = str.split(":");
                if (strArray.length > 1) {
                    var fileName = strArray[1];
                    var custIdArr = new Array();
                    custIdArr = fileName.split(".");
                    custId = custIdArr[0];
//                    alert(custId);
                    if (custId != '' || custId != null) {
                        getCustomerDetailsInCustId("CustHome", custId);
                    }
                } else {
                    document.getElementById('homeMessDispDiv').innerHTML = 'Finger Print Device Error OR Finger Prints Not Matched!';
                }
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }

    if (id == "captureButt") {
        req.open("GET", "include/php/ommpfgsccapture" + default_theme + ".php?custId=" + custId, true);
    } else {
        req.open("GET", "include/php/ommpfgscverify" + default_theme + ".php", true);
    }
    req.send();
}
function getCustomerDetailsInCustId(custPanelOption, custId) {
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
/*****************End code to add function @Author:SHRI30JUN15*******************************************/
//

function performActionOnFingerScan(id, custId) {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
//            alert(req.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (id == "verifyButt") {
//                alert(str);
                var str = req.responseText;
//                alert(str);

                var strArray = new Array();
                strArray = str.split(":");
                if (strArray.length > 1) {
                    var fileName = strArray[1];
                    var custIdArr = new Array();
                    custIdArr = fileName.split(".");
                    custId = custIdArr[0];
//                    alert(custId);
                    if (custId != '' || custId != null) {
                        getCustomerDetailsByFingerScan("CustHome", custId);
                    }
                } else {
                    document.getElementById('homeMessDispDiv').innerHTML = 'Finger Print Device Error OR Finger Prints Not Matched!';
                }
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }

    if (id == "captureButt") {
        req.open("GET", "include/php/ommpfgsccapture" + default_theme + ".php?custId=" + custId, true);
    } else {
        req.open("GET", "include/php/ommpfgscverify" + default_theme + ".php", true);
    }
    req.send();
}
function getCustomerDetailsByFingerScan(custPanelOption, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&custPanelOption=" + custPanelOption + "&fingerscanstatus=success",
            true);
    xmlhttp.send();
}
//
/*************Start code to add function @Author:SHRI08JUL15*****************************/
function addNewGirviEngDate()
{
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("AddNewLoanSubButt").style.visibility = "hidden";
    if (validateSelectField(document.getElementById("DOBEngDay").value, "Please select Girvi Date Day!") == false) {
        document.getElementById("DOBEngDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("AddNewLoanSubButt").style.visibility = "visible";
        return false;
    } else if (validateSelectField(document.getElementById("DOBEngMonth").value, "Please select Girvi Date Month!") == false) {
        document.getElementById("DOBEngMonth").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("AddNewLoanSubButt").style.visibility = "visible";
        return false;
    } else if (validateSelectField(document.getElementById("DOBEngYear").value, "Please select Girvi Date year!") == false) {
        document.getElementById("DOBEngYear").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("AddNewLoanSubButt").style.visibility = "visible";
        return false;
    } else {
        return true;
    }
}
function getEngDtOptHide() {
//    alert(divId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_eng_dt").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("engDate").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/*************End code to add function @Author:SHRI08JUL15*****************************/
/********Start code to add function @Author:SHRI10JUL15************/
function getHindiAdhikMonthFromYear(year, todayMonth, divId, monthId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olgahdtmn" + default_theme + ".php?year=" + year + "&todayMonth=" + todayMonth + "&monthId=" + monthId, true);
    xmlhttp.send();
}

/********End code to add function @Author:SHRI10JUL15************/

function validateHDateInput()
{
    document.getElementById("AddNewLoanSubButt").style.visibility = "hidden";
    document.getElementById("AddNewLoanUpdButt").style.visibility = "hidden";
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateSelectField(document.getElementById('DOBDayTithi').value, "Please select Date Tithi!") == false) {
        document.getElementById('DOBDayTithi').focus();
        document.getElementById("AddNewLoanSubButt").style.visibility = "visible";
        document.getElementById("AddNewLoanUpdButt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    } else if (validateSelectField(document.getElementById('DOBMonth').value, "Please select Date Month!") == false) {
        document.getElementById('DOBMonth').focus();
        document.getElementById("AddNewLoanSubButt").style.visibility = "visible";
        document.getElementById("AddNewLoanUpdButt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    } else if (validateSelectField(document.getElementById('DOBDayPaksh').value, "Please select Date Paksh!") == false) {
        document.getElementById('DOBDayPaksh').focus();
        document.getElementById("AddNewLoanSubButt").style.visibility = "visible";
        document.getElementById("AddNewLoanUpdButt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    } else if (validateSelectField(document.getElementById('DOBYear').value, "Please select Date Year!") == false) {
        document.getElementById('DOBYear').focus();
        document.getElementById("AddNewLoanSubButt").style.visibility = "visible";
        document.getElementById("AddNewLoanUpdButt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    } else {
        return true;
    }
}
/********Start code to add function @Author:SHRI13JUL15****************************/
function searchUdhaarCustList(documentRootPath, searchColumn, searchValue, selFirmId, div, panel, timePeriod) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omuucclt" + default_theme + ".php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel + "&timePeriod=" + timePeriod, true);
    xmlhttp.send();
}
function sortUdhaarCustList(documentRootPath, sortKeyword, selFirmId, div, panel, timePeriod) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omuucclt" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel + "&timePeriod=" +
            timePeriod, true);
    xmlhttp.send();
}
/********End code to add function @Author:SHRI13JUL15****************************/
/**************Start code to add function for settle girvi @OMMODTAG SHRI_11AUG15****************/
function settleTransferredGirvi(girviId, gTransId, custId, gTransSts)
{
//    alert(gTransSts);
    document.getElementById("releaseTransferredGirviSettleButton").style.visibility = "hidden";
    confirm_box = confirm("Do you really want to settle this loan?");
    if (confirm_box == true)
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
        xmlhttp.open("POST", "include/php/olggrstls" + default_theme + ".php?girviId=" + girviId + "&gTransId=" + gTransId + "&custId=" + custId + "&gTransSts=" + gTransSts, true);
        xmlhttp.send();
    } else {
        document.getElementById("releaseTransferredGirviSettleButton").style.visibility = "visible";
    }
}
/**************End code to add function for settle girvi @OMMODTAG SHRI_11AUG15****************/
//*************Start code to add function for udhaar search panel navigation @OMMODTAG SHRI_12AUG15******************/
function navigationUdhaarSearchPanel(pageNo, rowsPerPage, panel, udhaarAmtRange) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadNextUdhaarPanelList").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextUdhaarPanelListButt").style.visibility = "visible";
            document.barcode_search.barcode_text.focus();
            document.getElementById("udhaarSrchDetPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadNextUdhaarPanelList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextUdhaarPanelListButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/omusamrg" + default_theme + ".php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&udhaarUpdateRows=UdhaarUpdateRows" + "&panelName=" + panel + "&udhaarAmtRange=" + udhaarAmtRange, true);
    xmlhttp.send();
}
//*************End code to add function for udhaar search panel navigation @OMMODTAG SHRI_12AUG15******************/
/**************Start code to add function for unsettled transfer girvi in girvi panel @OMMODTAG SHRI_14AUG15******************/
function showGirviTransferredUnsettledTrans()
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgptgdv" + default_theme + ".php", true);
    xmlhttp.send();
}
/**************End code to add function for unsettled transfer girvi in girvi panel @OMMODTAG SHRI_14AUG15******************/
/**************Start code to add function for unsettled transfer girvi in girvi panel @OMMODTAG SHRI_20AUG15******************/
function settleLoans() {
    var loanSettleDateDay = document.getElementById("stlTransDOBDay").value;
    var loanSettleDateMMM = document.getElementById("stlTransDOBMonth").value;
    var loanSettleDateYY = document.getElementById("stlTransDOBYear").value;
    var loanSettleDateStr = document.getElementById("stlTransDOBMonth").value + ' ' + document.getElementById("stlTransDOBDay").value + ', ' + document.getElementById("stlTransDOBYear").value;
    var loanSettleDate = new Date(loanSettleDateStr);
    var todayDate = new Date();
    var milliStockDate = loanSettleDate.getTime();
    var milliTodayDate = milliStockDate;
    var datesDiff = milliTodayDate - milliStockDate;
    if (datesDiff < 0) {
        alert('Please Select the correct Date!');
        document.getElementById("stlTransDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("stlTransSubBtn").style.visibility = "visible";
        return false;
    } else {
        if (loanSettleDateMMM == 'FEB' || loanSettleDateMMM == 'APR' || loanSettleDateMMM == 'JUN' || loanSettleDateMMM == 'SEP' || loanSettleDateMMM == 'NOV') {
            if (loanSettleDateMMM == 'FEB' && loanSettleDateDay > 29 && loanSettleDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + loanSettleDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("stlTransDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stlTransSubBtn").style.visibility = "visible";
                return false;
            }
            if (loanSettleDateMMM == 'FEB' && loanSettleDateDay > 28 && loanSettleDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + loanSettleDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("stlTransDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stlTransSubBtn").style.visibility = "visible";
                return false;
            }
            if (loanSettleDateDay > 30) {
                alert('Please select correct Date, Month ' + loanSettleDateMMM + ' has only max 30 days.');
                document.getElementById("stlTransDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stlTransSubBtn").style.visibility = "visible";
                return false;
            }
        }
    }
    if (validateSettleLoans()) {
        return true;
    } else {
        return false;
    }
}
function validateSettleLoans()
{
    if (validateSelectField(document.getElementById("stlTransDOBDay").value, "Please Select Day!") == false) {
        document.getElementById("stlTransDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("stlTransDOBMonth").value, "Please Select Month!") == false) {
        document.getElementById("stlTransDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("stlTransDOBYear").value, "Please Select Year!") == false) {
        document.getElementById("stlTransDOBYear").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("stlTransAmount").value, "Please Enter Settle Amount!") == false ||
            validateNumWithDot(document.getElementById("stlTransAmount").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("stlTransAmount").focus();
        return false;
    } else {
        return true;
    }

}
function calcGirviBal() {
    var settleAmount = parseFloat(document.getElementById('stlTransAmount').value);
    var totFinBal = parseFloat(document.getElementById('totFinBal').value);
    var balLeft = 0;
//    alert(settleAmount + ' ' + totFinBal);
    if (settleAmount == 'NaN')
    {
        settleAmount = '0.00';
    }
    if (totFinBal == 'NaN') {
        totFinBal = '0.00';
    }
//    alert(totFinBal);
    if (totFinBal < 0) {
        balLeft = settleAmount - Math.abs(totFinBal);
    } else {
        balLeft = totFinBal - settleAmount;
    }
    document.getElementById('stlAmountDep').value = parseFloat(settleAmount).toFixed(2);
    document.getElementById('stlTransAmountLeft').value = parseFloat(balLeft).toFixed(2);
    document.getElementById('stlAmountLeft').value = parseFloat(balLeft).toFixed(2);
    if (document.getElementById('stlTransAmountLeft').value == '' || document.getElementById('stlTransAmountLeft').value == 'NaN') {
        document.getElementById('stlTransAmountLeft').value = '0.00';
    }
    if (document.getElementById('stlAmountDep').value == '' || document.getElementById('stlAmountDep').value == 'NaN') {
        document.getElementById('stlAmountDep').value = '0.00';
    }
    if (document.getElementById('stlAmountLeft').value == '' || document.getElementById('stlAmountLeft').value == 'NaN') {
        document.getElementById('stlAmountLeft').value = '0.00';
    }
}
/**************End code to add function for unsettled transfer girvi in girvi panel @OMMODTAG SHRI_20AUG15******************/
/***************Start code to add function for unsettled loan transfer by firm @OMMODTAG SHRI_26AUG15**********************/
function showTFirmTrans() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviTransPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgptgfrm" + default_theme + ".php", true);
    xmlhttp.send();
}
/***************End code to add function for unsettled loan transfer by firm @OMMODTAG SHRI_26AUG15**********************/
/********************Start code to add function to show money lender transferred girvi @OMMODTAG SHRI_27AUG15************/
function showMLenderTrans() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviTransPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgptgml" + default_theme + ".php", true);
    xmlhttp.send();
}
function showAllTransaction() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviTransPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgptgstl" + default_theme + ".php", true);
    xmlhttp.send();
}
function showAllSysLog() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviTransPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgpsllg" + default_theme + ".php", true);
    xmlhttp.send();
}
function getDateInSettledLoanLogPanel(documentRootPath, sdd, smm, syy, edd, emm, eyy, selFirmId, pageNo, panel, rowsPerPage, sortKeyword, searchColumn, searchValue, noOfPagesAsLink) {
//    alert(documentRootPath);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("systemLogPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var startDate = sdd + ' ' + smm + ' ' + syy;
    var endDate = edd + ' ' + emm + ' ' + eyy;
//    alert(startDate + ' ' + endDate);

    xmlhttp.open("POST", documentRootPath + "/include/php/orgpsllg" + default_theme + ".php?page=" + pageNo + "&searchColumn=" + searchColumn +
            "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel +
            "&startDate=" + startDate + "&endDate=" + endDate, true);
    xmlhttp.send();
}
function unreleaseTransGirvi(girviTransId, panelName, girviId, prinType, upPanelName) {
//    alert(girviTransId + '-' + panelName + ' ' + girviId);
    if (upPanelName == 'updateSettledLoans') {
        alert("Sorry! You can not delete this loan");
    } else {
        confirm_box = confirm("Do you really want to Delete?");
        if (confirm_box == true)
        {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
                    window.setTimeout(closeUnreleaseGirviDetails, 1000);
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            xmlhttp.open("POST", "include/php/orgptgdl" + default_theme + ".php?girviTransId=" + girviTransId + "&panelName=" + panelName +
                    "&girviId=" + girviId + "&prinType=" + prinType + "&upPanelName=" + upPanelName, true);
            xmlhttp.send();
            function closeUnreleaseGirviDetails()
            {
                document.getElementById("ajaxLoadGirviDetailsDiv").innerHTML = "";
            }
        }
    }
}

function updateSettledLoans(ltransId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgptgdv" + default_theme + ".php?ltransId=" + ltransId + "&upPanelName=updateSettledLoans", true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
}
/****************Start code to add function @OMMODTAG SHRI_01OCT15**********************/
function getSellProfitLoss(panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'ByItem') {
        xmlhttp.open("GET", "include/php/ogbbitpl" + default_theme + ".php", true);
    } else {
        xmlhttp.open("GET", "include/php/ogbbslpl" + default_theme + ".php", true);
    }
    xmlhttp.send();
}
/****************End code to add function @OMMODTAG SHRI_01OCT15**********************/
/**************Start code to add function @OMMODTAG SHRI_05OCT15*********************/
/**************Start code to change ID Author:PRIYANKA-15JUN17*********************/
function changeCalcByWeight(weightBy, sttrId, pageNo) {

    //alert('weightBy == ' + weightBy);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemDetails").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogidchwt" + default_theme + ".php?weightType=" + weightBy + "&sttrId=" + sttrId + "&pageNo=" + pageNo, true);
    xmlhttp.send();
}
/**************END code to change ID Author:PRIYANKA-15JUN17*********************/
/**********End code to add function @OMMODTAG SHRI_05OCT15 **********************/
/************Start Code for Girvi  Pay Other Info @Author:SHE19OCT15******/

function updateGirviPayOtherInfo(documentRootPath, custId, girviId, girviPayOtherInfo, girviDOB, girviFirmId, girviSerialNum, panelName) {
// document.getElementById("ajaxUpdateGirviOtherInfoButt").innerHTML = "<img src='images/loading16.gif' />";

    confirm_box = confirm(updateAlertMess + "\n\nDo you really want to add or update pay other info?"); //change in line @AUTHOR: SANDY28JAN14

    if (confirm_box == true)
    {

        if (validateUpdateGirviPayOtherInfo()) {
            var poststr = "custId=" + custId + "&girviId=" + girviId
                    + "&girviPayOtherInfo=" + girviPayOtherInfo + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
                    + "&girviSerialNum=" + girviSerialNum + "&panelName=" + panelName;
            update_girvi_pay_other_info(documentRootPath + '/include/php/olguotin' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
        }
    } else {
        alert('bye');
        document.getElementById("ajaxUpdateGirviPayOtherInfoButt").innerHTML = "<img src='images/updateButt.png' />";
    }
    return false;
}
function updateFinanceGirviPayOtherInfo(documentRootPath, custId, girviId, girviPayOtherInfo, girviDOB, girviFirmId, girviSerialNum, panelName) {
// document.getElementById("ajaxUpdateGirviOtherInfoButt").innerHTML = "<img src='images/loading16.gif' />";
    confirm_box = confirm(updateAlertMess + "\n\nDo you really want to add or update pay other info?"); //change in line @AUTHOR: SANDY28JAN14

    if (confirm_box == true)
    {
        if (validateUpdateGirviPayOtherInfo()) {
            var poststr = "custId=" + custId + "&girviId=" + girviId
                    + "&girviPayOtherInfo=" + girviPayOtherInfo + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
                    + "&girviSerialNum=" + girviSerialNum + "&panelName=" + panelName;
            update_girvi_pay_other_info(documentRootPath + '/include/php/olguotin_1' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
        }
    } else {
        document.getElementById("ajaxUpdateGirviPayOtherInfoButt").innerHTML = "<img src='images/updateButt.png' />";
    }
    return false;
}


function updateGirviItemLocation(documentRootPath, custId, girviId, girviLoanItmLoc, girviDOB, girviFirmId, girviSerialNum, panelName) {
// document.getElementById("ajaxUpdateGirviOtherInfoButt").innerHTML = "<img src='images/loading16.gif' />";
    confirm_box = confirm(updateAlertMess + "\n\nDo you really want to add or update Loan item location?"); //change in line @AUTHOR: SANDY28JAN14

    if (confirm_box == true)
    {
        if (validateUpdateGirviLoanItemLocation()) {
            var poststr = "custId=" + custId + "&girviId=" + girviId + "&girviLoanItmLoc=" + girviLoanItmLoc
                    + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
                    + "&girviSerialNum=" + girviSerialNum + "&panelName=" + panelName;
            update_girvi_loan_item_location(documentRootPath + '/include/php/olguotin' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
        }
    } else {
        document.getElementById("ajaxUpdategirviItemLocationButt").innerHTML = "<img src='images/updateButt.png' />";
    }
    return false;
}

function validateUpdateGirviPayOtherInfo() {
    if (validateEmptyField(document.getElementById("girviPayOtherInfo").value, "Please enter Girvi Pay Other Info!") == false) {
        document.getElementById("girviPayOtherInfo").focus();
        return false;
    }
    return true;
}

function validateUpdateGirviLoanItemLocation() {
    if (validateEmptyField(document.getElementById("girviLoanItmLoc").value, "Please enter Girvi item location!") == false) {
        document.getElementById("girviLoanItmLoc").focus();
        return false;
    }
    return true;
}


function update_girvi_pay_other_info(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertUpdateGirviPayOtherInfo;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function update_girvi_loan_item_location(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertUpdateGirviLoanItemLocation;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}


function alertUpdateGirviPayOtherInfo() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    }
}

function alertUpdateGirviLoanItemLocation() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    }
}
/************End Code for Girvi  Pay Other Info @Author:SHE19OCT15******/
/************ Start code to add function passGirviEMIValues @OMMODTAG SHRI_14OCT15************/
/************ Start code to add parameter for new finance panel passGirviEMIValues @OMMODTAG SANT05APR17************/
function passGirviEMIValues(emiNo, emiPaidDD, emiPaidMM, emiPaidYY, emiAmt, emiStatus, serialNo, custId, firmId, girviId,
        girviDOB, gDepId, gDepJrnlId, emiOccur, gEMIIntAmt, gEMIAmt, pageNo, intAmt, princAmt, dueDate, girviEMISatus) {
    if (girviEMISatus == emiStatus)
    {
        return false;
    }
//    alert('pageNum='+pageNo);
    if (validateSelectField(document.getElementById("DOBDay" + gDepId + emiNo).value, "Please select Day!") == false) {
        document.getElementById("DOBDay" + gDepId + emiNo).focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth" + gDepId + emiNo).value, "Please select Month!") == false) {
        document.getElementById("DOBMonth" + gDepId + emiNo).focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear" + gDepId + emiNo).value, "Please select Year!") == false) {
        document.getElementById("DOBYear" + gDepId + emiNo).focus();
        return false;
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
            var emiPaidDate = emiPaidDD + ' ' + emiPaidMM + ' ' + emiPaidYY;
//            alert('Paid=' +  document.getElementById('girviDepEMIStatus').value);
            if (emiStatus == 'Payment' && emiStatus != 'Paid') {
//                alert('hiii');
                openFinancePopUp(emiNo, emiPaidDD, emiPaidMM, emiPaidYY, emiAmt, emiStatus, serialNo, custId, firmId, girviId,
                        girviDOB, gDepId, gDepJrnlId, emiOccur, gEMIIntAmt, gEMIAmt, pageNo, intAmt, princAmt, dueDate);
            } else {
                var poststr = "emiNo=" + emiNo
                        + "&emiPaidDate=" + emiPaidDate
                        + "&emiAmt=" + emiAmt
                        + "&emiStatus=" + emiStatus
                        + "&serialNo=" + serialNo
                        + "&custId=" + custId
                        + "&firmId=" + firmId
                        + "&girviId=" + girviId
                        + "&girviDOB=" + girviDOB
                        + "&gDepId=" + gDepId
                        + "&gDepJrnlId=" + gDepJrnlId
                        + "&emiOccur=" + emiOccur
                        + "&gEMIIntAmt=" + gEMIIntAmt
                        + "&gEMIAmt=" + gEMIAmt
                        + "&pageNo=" + pageNo
                        + "&intAmt=" + intAmt
                        + "&princAmt=" + princAmt
                        + "&girviEndDate=" + dueDate;
                xmlhttp.open("POST", "include/php/omfnemiin" + default_theme + ".php?" + poststr, true);
                xmlhttp.send();
            }
        }
    }
}
/************ End code to add parameter for new finance panel passGirviEMIValues @OMMODTAG SANT05APR17************/
/************ End code to add function passGirviEMIValues @OMMODTAG SHRI_14OCT15************/
/************ Start code to add parameter for new finance panel passGirviEMIValues @OMMODTAG SANT05APR17************/
function passGirviFinanceEMIValues(emiNo, emiPaidDD, emiPaidMM, emiPaidYY, emiAmt, emiStatus, serialNo, custId, firmId, girviId,
        girviDOB, gDepId, gDepJrnlId, emiOccur, gEMIIntAmt, gEMIAmt, pageNo, intAmt, princAmt, dueDate, emiCounter) {
    if (validateSelectField(document.getElementById("DOBDay" + gDepId + emiNo).value, "Please select Day!") == false) {
        document.getElementById("DOBDay" + gDepId + emiNo).focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth" + gDepId + emiNo).value, "Please select Month!") == false) {
        document.getElementById("DOBMonth" + gDepId + emiNo).focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear" + gDepId + emiNo).value, "Please select Year!") == false) {
        document.getElementById("DOBYear" + gDepId + emiNo).focus();
        return false;
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
            var emiPaidDate = emiPaidDD + ' ' + emiPaidMM + ' ' + emiPaidYY;
            var poststr = "emiNo=" + emiNo
                    + "&emiPaidDate=" + emiPaidDate
                    + "&emiAmt=" + emiAmt
                    + "&emiStatus=" + emiStatus
                    + "&serialNo=" + serialNo
                    + "&custId=" + custId
                    + "&firmId=" + firmId
                    + "&girviId=" + girviId
                    + "&girviDOB=" + girviDOB
                    + "&gDepId=" + gDepId
                    + "&gDepJrnlId=" + gDepJrnlId
                    + "&emiOccur=" + emiOccur
                    + "&gEMIIntAmt=" + gEMIIntAmt
                    + "&gEMIAmt=" + gEMIAmt
                    + "&pageNo=" + pageNo
                    + "&girviEndDate=" + dueDate;
            xmlhttp.open("POST", "include/php/omfnemiin_1" + default_theme + ".php?" + poststr, true);
            xmlhttp.send();
        }
    }
}
/************ End code to add parameter for new finance panel passGirviEMIValues @OMMODTAG SANT05APR17************/
/******Start code to add function deleteCustFinanceDetails @OMMODTAG SHRI_16OCT15 ********/
function deleteCustFinanceDetails(custId, firmId, girviId, girviJrnlId, gSerialNum, gDate, gAmt)
{
    document.getElementById("ajaxLoadUdhaarDepositMon" + girviId).style.visibility = "visible";
    confirm_box = confirm("Do you really want to Permanent Delete this Finance Details?");
    if (confirm_box == true)
    {
        var poststr = "girviId=" + girviId + "&custId=" + custId + "&gJrnlId=" + girviJrnlId
                + "&gSerialNo=" + gSerialNum + "&gFirmId=" + firmId
                + "&gDOB=" + gDate + "&gPrinAmt=" + gAmt;
        delete_girvi('include/php/omfngrdl' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    } else {
        document.getElementById("ajaxLoadUdhaarDepositMon" + girviId).style.visibility = "hidden";
    }
}
/******End code to add function deleteCustFinanceDetails @OMMODTAG SHRI_16OCT15 ********/
/********************Start Code To Add function For Tax Report Stock @AUTHOR:SHE20OCT15*********************/
function getTaxLedgerBook() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogbbtlbs" + default_theme + ".php", true);
    xmlhttp.send();
}
/********************End Code To Add function For Tax Report Stock @AUTHOR:SHE20OCT15*********************/
/********************Start Code To Add function For Tax Details Report  @AUTHOR:SANT27MAR17*********************/
function getTaxDetLedgerBook() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omledtaxin" + default_theme + ".php", true); //change file name @AUTHOR:BAJRANG27AUG17
    xmlhttp.send();
}


//START CODE FOR NEW FUNCTION(TAX) AUTHOR:BAJRANG24AUG17
function showTax(tax) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (tax == 'taxpaid')
    {
        xmlhttp.open("GET", "include/php/omledtaxin" + default_theme + ".php", true);
    } else
    {
        xmlhttp.open("GET", "include/php/omledtaxout" + default_theme + ".php", true);
    }
    xmlhttp.send();
}
//END CODE FOR NEW FUNCTION(TAX) AUTHOR:BAJRANG24AUG17


/********************End Code To Add function For Tax Details Report @AUTHOR:SANT27MAR17*********************/
//showCustGirviITMPrincipalListPanel******************************************

function showCustGirviITMPrinciListPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omitmdetbyprinc" + default_theme + ".php", true);
    xmlhttp.send();
}
/////////////////////////////////////////////////////////////////////////////////////////////////
/**********Start code to add function for itemdetails @BAJRANG:29-MAR18 ******************************/
function showCustGirviITMListPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omitmdet" + default_theme + ".php", true);
    xmlhttp.send();
}
/**********End code to add function for itemdetails @BAJRANG:29-MAR18******************************/
//
/**********Start code to add function for Intelligent itemdetails  Author:DIKSHA 09MAY2019*********/
function showCustGirviITMListPanelInt() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omitmdetint" + default_theme + ".php", true);
    xmlhttp.send();
}
/**********End code to add function for Intelligent itemdetails  Author:DIKSHA 09MAY2019*********/
//
/**********Start code to add function for itemdetails @BAJRANG:29-MAR18 ******************************/
function showCustGirvifirmPanel(panel) {
//    alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omchngfirmloan" + default_theme + ".php?panel=" + panel, true);
    xmlhttp.send();
}
/**********End code to add function for itemdetails @BAJRANG:29-MAR18******************************/
/*****************start code for loan deposit day and loan wise report @omkar 2FEB2024 *************/
function showActiveloandepositreportPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omactiveloandepositereport" + default_theme + ".php", true);
    xmlhttp.send();
}
function showloandepositreportPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omloandepositereport" + default_theme + ".php", true);
    xmlhttp.send();
}
//Start LOAN PACKET BOX REPORT
function showLoanBoxReportPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omloanboxreport" + default_theme + ".php", true);
    xmlhttp.send();
}
//End LOAN PACKET BOX REPORT
//Start LOAN PACKET BOX SEARCH
function searchLoanBox(documentRootPath) {
    loadXMLDoc();
    var searchval = document.getElementById('search').value;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omloanboxAssignViewReport" + default_theme + ".php?searchval=" + searchval, true);
    xmlhttp.send();
}

//End LOAN PACKET BOX SEARCH
//Start LOAN PACKET BOX ASSIGNED REPORT
//function showAssignedloanpackets() {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
//            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
//        }
//    };
//    xmlhttp.open("POST", "include/php/orgboxassignedreport" + default_theme + ".php", true);
//    xmlhttp.send();
//}
function showAssignedloanpackets() {
    $.ajax({
        url: "include/php/orgboxassignedreport.php",  // The PHP file you want to load
        type: 'POST',
        success: function(response) {
            $("#mainMiddle").html(response); // Replace content inside 'mainMiddle' div
        },
        error: function(xhr, status, error) {
            console.error("Error loading report:", error);
            alert("Failed to load the report.");
        }
    });
}
function showLoanBoxSearchReportPanel() {
    $.ajax({
        url: "include/php/omloanboxAssignViewReport.php",  // The PHP file you want to load
        type: 'POST',
        success: function(response) {
            $("#mainMiddle").html(response); // Replace content inside 'mainMiddle' div
        },
        error: function(xhr, status, error) {
            console.error("Error loading report:", error);
            alert("Failed to load the report.");
        }
    });
}
function showAssignloanpackets() {
    $.ajax({
        url: "include/php/omloanboxreport.php",  // The PHP file you want to load
        type: 'POST',
        success: function(response) {
            $("#mainMiddle").html(response); // Replace content inside 'mainMiddle' div
        },
        error: function(xhr, status, error) {
            console.error("Error loading report:", error);
            alert("Failed to load the report.");
        }
    });
}
//End LOAN PACKET BOX ASSIGNED REPORT
/***********end code for loan deposit report day and loan wise ******************/
/**********Start code to add function for relststus @BAJRANG:15FEB19 ******************************/
function showCustGirvirelSts() {
//    alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olggrelupdsts" + default_theme + ".php", true);
    xmlhttp.send();
}
//
/**********Start code to add function for relststus Author:DIKSHA 09MAY2019 ******************************/
function showCustGirvirelStsInt() {
//    alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olggrelupdstsint" + default_theme + ".php", true);
    xmlhttp.send();
}
/**********End code to add function for relststus Author:DIKSHA 09MAY2019 ******************************/
//
function showDepAndWith() {
//    alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omdepwithlist" + default_theme + ".php", true);
    xmlhttp.send();
}
//
function showMLLoan() {
//    alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ommnylenlist" + default_theme + ".php", true);
    xmlhttp.send();
}
/**********End code to add function for relststus @BAJRANG:15FEB19******************************/

/**********Start code to add function for Deposit Amount @BAJRANG:01-AUG-18 ******************************/
//function showCustGirviDepositListPanel() {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
//            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
//        }
//    };
//    xmlhttp.open("POST", "include/php/omdepamtdet"+ default_theme +".php", true);
//    xmlhttp.send();
//}
/**********End code to add function for Deposit Amount @BAJRANG:01-AUG-18******************************/

/**********Start code to add function @OMMODTAG SHRI_29OCT15******************************/
function showCustGirviEMIListPanel(panelName = '') {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    if (panelName == 'dueFinReport') {
        xmlhttp.open("POST", "include/php/omfinDueReport" + default_theme + ".php", true);
    } else {
        xmlhttp.open("POST", "include/php/omfnllpn" + default_theme + ".php", true);
    }
    xmlhttp.send();
}
function updatePlaceholder() {
    var selectElement = document.getElementById('loanRoiType');
    var inputElement = document.getElementById('loanRoi');

    if (selectElement.value == 'FIX AMT') {
        inputElement.placeholder = 'FIX';
    } else {
        inputElement.placeholder = 'ROI';
    }
    calcFinalAm();
}
/**********End code to add function @OMMODTAG SHRI_29OCT15******************************/
/***************Start code to add function @OMMODTAG SHRI_30OCT15 ***********************/
function getGirviListInGirviPanelByEMISts(selFirmId, sortKeyword, searchColumnName, searchColumnValue, panelName, status) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            if (panelName == 'transList')
                document.getElementById("transactionListDiv").innerHTML = xmlhttp.responseText;
            else if (panelName == 'tFirm')
                document.getElementById('girviTransPanelSubDiv').innerHTML = xmlhttp.responseText;
            else if (panelName == 'mLender')
                document.getElementById('girviTransPanelSubDiv').innerHTML = xmlhttp.responseText;
            else
                document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omfnllpn" + default_theme + ".php?selFirmId=" + selFirmId.value + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumnName + "&searchValue=" + searchColumnValue + "&gLoanSts=" + status, true);
    xmlhttp.send();
}
/***************Start code to add noncollection list @OMMODTAG ANUJA04APR16 ***********************/
function sortEMILoansListPanel(documentRootPath, sortKeyword, selFirmId, rowsPerPage, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'collectionList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfncml" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage, true);
    } else if (panelName == 'noncollectionList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfnncml" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfnllpn" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage, true);
    }
    xmlhttp.send();
}
function searchEMILoansListPanel(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage, expMonths, panelName) {
//    alert(panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'collectionList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfncml" + default_theme + ".php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&expMonths=" + expMonths, true);
    } else if (panelName == 'noncollectionList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfnncml" + default_theme + ".php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&expMonths=" + expMonths, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfnllpn" + default_theme + ".php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&expMonths=" + expMonths, true);
    }
    xmlhttp.send();
}
/***************End code to add noncollection list @OMMODTAG ANUJA04APR16 ***********************/
function updateGirviDepAmt(emiPaidDD, emiPaidMM, emiPaidYY, documentRootPath, custId, girviId, girviDepId, updateGirviDepAmt, gFirmId, gDOB, gSerialNo, gStartDate, emiNo, gEndDate, emiStatus, girviDepIntAmount, pageNum) {
    document.getElementById("updateGirviDepAmtCloseButton" + girviDepId).style.visibility = "hidden";
    document.getElementById("updateGirviDepAmtROIButton" + girviDepId).style.visibility = "hidden";
    var cashAmt = parseInt(document.getElementById('girvCashAmtRec' + girviDepId).value);
    var bankAmt = parseInt(document.getElementById('girvBankAmtRec' + girviDepId).value);
    var cardAmt = parseInt(document.getElementById('girvCardAmtRec' + girviDepId).value);
    var onlineAmt = parseInt(document.getElementById('girvOnlineAmtRec' + girviDepId).value);

    if (isNaN(cashAmt)) {
        cashAmt = 0;
    }
    if (isNaN(bankAmt)) {
        bankAmt = 0;
    }
    if (isNaN(cardAmt)) {
        cardAmt = 0;
    }
    if (isNaN(onlineAmt)) {
        onlineAmt = 0;
    }

    var totalPaidAmt = cashAmt + bankAmt + cardAmt + onlineAmt;
    if (updateGirviDepAmt != totalPaidAmt)
    {
        alert('Please Check Paid Amt...!'); //change in line @AUTHOR: SANDY28JAN14
        document.getElementById("updateGirviDepAmtCloseButton" + girviDepId).style.visibility = "visible";
        document.getElementById("updateGirviDepAmtROIButton" + girviDepId).style.visibility = "visible";
        return false;
    }
    var totEMIAmt = parseFloat(document.getElementById('totEMIAmt' + girviId).value);
//    alert(girviDepIntAmount+' '+updateGirviDepAmt);
    if (updateGirviDepAmt == '') {
        alert('Please Enter Girvi EMI Amount!');
        document.getElementById("updateGirviDepAmt" + girviDepId).focus();
    } else if (totEMIAmt < updateGirviDepAmt) {
        alert('Amount should not be greater than total EMI amount!'); //change in line @AUTHOR: SANDY28JAN14
        document.getElementById("updateGirviDepAmt" + girviDepId).focus();
    } else {
        confirm_box = confirm("Do you really want to update amount?"); //change in line @AUTHOR: SANDY28JAN14

        var emiPaidDate = emiPaidDD + ' ' + emiPaidMM + ' ' + emiPaidYY;
        if (confirm_box == true)
        {
            var poststr = "custId=" + custId + "&girviId=" + girviId +
                    "&girviDepId=" + girviDepId + "&updateGirviDepAmt=" + updateGirviDepAmt
                    + "&gFirmId=" + gFirmId
                    + "&gDOB=" + gDOB
                    + "&gSerialNo=" + gSerialNo
                    + "&totEMIAmt=" + totEMIAmt
                    + "&emiPaidDate=" + emiPaidDate
                    + "&gStartDate=" + gStartDate
                    + "&emiNo=" + emiNo
                    + "&cashamt=" + cashAmt
                    + "&onlineamt=" + onlineAmt
                    + "&cardamt=" + cardAmt
                    + "&bankamt=" + bankAmt
                    + "&gEndDate=" + gEndDate
                    + "&emiStatus=" + emiStatus
                    + "&girviDepIntAmount=" + girviDepIntAmount
                    + "&pageNum=" + pageNum;
//            alert(poststr);
            update_girvi_dep_amt(documentRootPath + '/include/php/omfnuema' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
        } else {
            document.getElementById("updateGirviDepAmt" + girviDepId).focus();
        }
    }
    document.getElementById("updateGirviDepAmtCloseButton" + girviDepId).style.visibility = "visible";
    document.getElementById("updateGirviDepAmtROIButton" + girviDepId).style.visibility = "visible";
    return false;
}
//***************Start Code To Show Deposit History @Author:Vinod30March2023*******************//
function showDepositHistory(emiId)
{
    document.getElementById(emiId).style.visibility = "visible";
}
function disDepositHistory(emiId)
{
    document.getElementById(emiId).style.visibility = "hidden";
}
//***************END Code To Show Deposit History @Author:Vinod30March2023*******************//
//*****************Start code for deposite principle amount for new finance panel Author:SANT24APR17
function updateGirviDepPrinAmt(emiPaidDD, emiPaidMM, emiPaidYY, documentRootPath, custId, girviId, girviDepId, updateGirviDepPrinAmt, gFirmId, gDOB, gSerialNo, gStartDate, emiNo, gEndDate, emiStatus, girviDepIntAmount, panelName, counter) {
//    alert('girviDepId=='+girviDepId);
    document.getElementById("updateGirviPrinDepAmtCloseButton" + girviDepId).style.visibility = "hidden";
    document.getElementById("updateGirviPrinDepAmtROIButton" + girviDepId).style.visibility = "hidden";
    var totEMIAmt = parseFloat(document.getElementById('totEMIAmt' + girviId).value);
    if (updateGirviDepPrinAmt == '') {
        alert('Please Enter Girvi EMI Amount!');
        document.getElementById("updateGirviDepPrinAmt" + girviDepId).focus();
    } else if (totEMIAmt < updateGirviDepPrinAmt) {
        alert('Amount should not be greater than total EMI amount!'); //change in line @AUTHOR: SANDY28JAN14
        document.getElementById("updateGirviDepPrinAmt" + girviDepId).focus();
    } else {
        confirm_box = confirm("Do you really want to update amount?"); //change in line @AUTHOR: SANDY28JAN14

        var emiPaidDate = emiPaidDD + ' ' + emiPaidMM + ' ' + emiPaidYY;
        if (confirm_box == true)
        {
            var poststr = "custId=" + custId + "&girviId=" + girviId +
                    "&girviDepId=" + girviDepId
                    + "&gFirmId=" + gFirmId + "&updateGirviDepPrinAmt=" + updateGirviDepPrinAmt
                    + "&gDOB=" + gDOB
                    + "&gSerialNo=" + gSerialNo
                    + "&totEMIAmt=" + totEMIAmt
                    + "&emiPaidDate=" + emiPaidDate
                    + "&gStartDate=" + gStartDate
                    + "&emiNo=" + emiNo
                    + "&gEndDate=" + gEndDate
                    + "&emiStatus=" + emiStatus
                    + "&panelName=" + panelName;
//            alert(poststr);
            update_girvi_dep_amt(documentRootPath + '/include/php/omfnuema_1' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
        } else {
            document.getElementById("updateGirviDepPrinAmt" + girviDepId).focus();
        }
    }
    document.getElementById("updateGirviPrinDepAmtCloseButton" + girviDepId).style.visibility = "visible";
    document.getElementById("updateGirviPrinDepAmtROIButton" + girviDepId).style.visibility = "visible";
    return false;
}
//*****************End code for deposite principle amount for new finance panel Author:SANT24APR17
//*****************Start code for deposite  Interest amount for new finance panel Author:SANT24APR17
function updateGirviDepIntAmt(emiPaidDD, emiPaidMM, emiPaidYY, documentRootPath, custId, girviId, girviDepId, updateGirviDepIntAmt, gFirmId, gDOB, gSerialNo, gStartDate, emiNo, gEndDate, emiStatus, girviDepIntAmount, panelName, counter) {
    document.getElementById("updateGirviDepIntAmtCloseButton" + girviDepId).style.visibility = "hidden";
    document.getElementById("updateGirviDepIntAmtROIButton" + girviDepId).style.visibility = "hidden";
    var totEMIAmt = parseFloat(document.getElementById('totEMIAmt' + girviId).value);
    if (updateGirviDepIntAmt == '') {
        alert('Please Enter Girvi EMI Amount!');
        document.getElementById("updateGirviDepIntAmt" + girviDepId).focus();
    } else if (totEMIAmt < updateGirviDepIntAmt) {
        alert('Amount should not be greater than total EMI amount!'); //change in line @AUTHOR: SANDY28JAN14
        document.getElementById("updateGirviDepIntAmt" + girviDepId).focus();
    } else {
        confirm_box = confirm("Do you really want to update amount?"); //change in line @AUTHOR: SANDY28JAN14

        var emiPaidDate = emiPaidDD + ' ' + emiPaidMM + ' ' + emiPaidYY;
        if (confirm_box == true)
        {
            var poststr = "custId=" + custId + "&girviId=" + girviId +
                    "&girviDepId=" + girviDepId
                    + "&gFirmId=" + gFirmId + "&updateGirviDepIntAmt=" + updateGirviDepIntAmt
                    + "&gDOB=" + gDOB
                    + "&gSerialNo=" + gSerialNo
                    + "&totEMIAmt=" + totEMIAmt
                    + "&emiPaidDate=" + emiPaidDate
                    + "&gStartDate=" + gStartDate
                    + "&emiNo=" + emiNo
                    + "&gEndDate=" + gEndDate
                    + "&emiStatus=" + emiStatus
                    + "&panelName=" + panelName;
            update_girvi_dep_amt(documentRootPath + '/include/php/omfnuema_1' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
        } else {
            document.getElementById("updateGirviDepIntAmt" + girviDepId).focus();
        }
    }
    document.getElementById("updateGirviDepIntAmtCloseButton" + girviDepId).style.visibility = "visible";
    document.getElementById("updateGirviDepIntAmtROIButton" + girviDepId).style.visibility = "visible";
    return false;
}
//*****************End code for deposite Interest amount for new finance panel Author:SANT24APR17
function update_girvi_dep_amt(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertUpdateGirviDepAmt;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertUpdateGirviDepAmt() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
// Customer Advance Money Details
function getCustAdvMoneyDet(custId, custFirmId) {


    var poststr = "custId=" + custId +
            "&firmId=" + custFirmId;
    cust_adv_money_details('include/php/omadmndv' + default_theme + '.php', poststr);
}
function cust_adv_money_details(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertCustAdvMoneyDetails;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertCustAdvMoneyDetails() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }

}

function showPaidAdvMoneyDetailsDiv(custId, firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            /// Start change for returned advance money details (@sujata - 13 MAR 2019) 
            //document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "hidden";
            document.getElementById("custUdhaarDetailsDiv").innerHTML = xmlhttp.responseText;
            /// end change for returned advance money details (@sujata - 13 MAR 2019)
        } else {
            /// Start change for returned advance money details (@sujata - 13 MAR 2019)
            // document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "visible";
            /// end change for returned advance money details (@sujata - 13 MAR 2019)
        }
    };
    xmlhttp.open("POST", "include/php/omamcpmd" + default_theme + ".php?custId=" + custId + "&firmId=" + firmId, true);
    xmlhttp.send();
}

//start code to add for change stock opt @Author:SHE02NOV15
function changeStockOpt() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("changeStockOpt").innerHTML = xmlhttp.responseText;
            document.getElementById("changeStockOpt").style.display = 'block';
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            document.getElementById("changeStockOpt").style.display = 'none';
        }
    };
//added  for displaying popup only once
    var count = GetCookie('count');
    if (count == null) {
        count = 1;
        SetCookie('count', count, exp);
        xmlhttp.open("POST",
                "include/php/omchstopt" + default_theme + ".php", true);
        xmlhttp.send();
    } else {
        count++;
        SetCookie('count', count, exp);
        document.getElementById("overlay").style.display = 'none';
    }


}

//End code to add for change stock opt @Author:SHE02NOV15


//Start code to add for change stock opt @Author:SHE03NOV15
function changeStockOptOk() {
    var stockOpt = document.getElementById("stockOpt").value;
//   alert(stockOpt);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            document.getElementById("changeStockOpt").style.display = 'none';
            document.getElementById("overlay").style.display = 'none'

// navigationMainBigMiddleImage('stockPanel', 'stock26.png', 'आभूषण सूची के लिए यहाँ क्लिक करे! \nClick here to see Stock Panel / Shortcut Key F3 ');
        }
        ;
//  alert( xmlhttp.responseText);

    }
    xmlhttp.open("POST", "include/php/omsopad" + default_theme + ".php?value=" + stockOpt + "&fieldName=stockOpt", true);
    xmlhttp.send();
}
//End code to add for change stock opt @Author:SHE03NOV15

// Start code for disply div once @ Author:SHE02NOV15
var expDays = 1825; // number of days the cookie should last(5yrs)

function GetCookie(name) {
    var arg = name + "=";
    var alen = arg.length;
    var clen = document.cookie.length;
    var i = 0;
    while (i < clen) {
        var j = i + alen;
        if (document.cookie.substring(i, j) == arg)
            return getCookieVal(j);
        i = document.cookie.indexOf(" ", i) + 1;
        if (i == 0)
            break;
    }
    return null;
}
function SetCookie(name, value) {
    var argv = SetCookie.arguments;
    var argc = SetCookie.arguments.length;
    var expires = (argc > 2) ? argv[2] : null;
    var path = (argc > 3) ? argv[3] : null;
    var domain = (argc > 4) ? argv[4] : null;
    var secure = (argc > 5) ? argv[5] : false;
    document.cookie = name + "=" + escape(value) +
            ((expires == null) ? "" : ("; expires=" + expires.toGMTString())) +
            ((path == null) ? "" : ("; path=" + path)) +
            ((domain == null) ? "" : ("; domain=" + domain)) +
            ((secure == true) ? "; secure" : "");
}
function DeleteCookie(name) {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval = GetCookie(name);
    document.cookie = name + "=" + cval + "; expires=" + exp.toGMTString();
}
var exp = new Date();
exp.setTime(exp.getTime() + (expDays * 24 * 60 * 60 * 1000));
function amt() {
    var count = GetCookie('count')
    if (count == null) {
        SetCookie('count', '1')
        return 1
    } else {
        var newcount = parseInt(count) + 1;
        DeleteCookie('count')
        SetCookie('count', newcount, exp);
        return count
    }
}
function getCookieVal(offset) {
    var endstr = document.cookie.indexOf(";", offset);
    if (endstr == -1)
        endstr = document.cookie.length;
    return unescape(document.cookie.substring(offset, endstr));
}
// End code for disply div once @ Author:SHE02NOV15

function numberOfRowsInActiveGirviList(documentRootPath, rowsPerPage, selFirmId, sortKeyword, pageNum, searchColumn, searchValue, updateRows, custId)
{
    // var noOfRows = rowsPerPage;
    //var totGirvi= totalGirvi;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("activeGirvListDiv").innerHTML = xmlhttp.responseText;
        } else {
            // document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
            // document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omchacgv" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
            "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows + "&custId=" + custId, true);
    xmlhttp.send();
}
//function navigationActiveGirviList(button, offset, totalGirviProcessed, maxLimit, maxLimitProcess, selFirmId, sortKeyword, rowsPerPage, pageNo, searchColumn, searchValue) {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "hidden";
//            document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "visible";
//            document.getElementById("activeGirvListDiv").innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
//            document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
//        }
//    };
//    xmlhttp.open("POST", "include/php/omchacgv"+ default_theme +".php?button=" + button + "&offset=" + offset + "&totalGirviProcessed=" + totalGirviProcessed + "&maxLimit=" + maxLimit + "&maxLimitProcess=" + maxLimitProcess +
//            "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&rowsPerPage=" + rowsPerPage + "&page=" + pageNo + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue, true);
//    xmlhttp.send();
//}
function showSelectedPageActiveGirvi(pageNo, panel, rowsPerPage, noOfPagesAsLink, selFirmId, sortKeyword, searchColumn, searchValue, custId) {
//    alert(pageNo+'-'+rowsPerPage+'-'+noOfPagesAsLink+'-'+selFirmId+'-'+sortKeyword+'-'+searchColumn+'-'+searchValue+'-'+selTFirmId);
    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.barcode_search.barcode_text.focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("activeGirvListDiv").innerHTML = xmlhttp.responseText;
                if (pageNo >= 10) {
                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omchacgv" + default_theme + ".php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
//************Start code for add parameter for supplier purchase:Author:SANT22JAN17
function showStockPanel(panel, stockPanel, payPanelName, utinId, suppPurId, utansMetalType, payStockPanelName, documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('main_ajax_loading_div').style.visibility = "hidden";
            if (stockPanel == 'AddByInv' || stockPanel == 'AddImitationByInv') {
                document.getElementById('main_body').innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById('stockPanelSubDiv').innerHTML = xmlhttp.responseText;
            }
            if (panel == "retail") {
                document.getElementById("addRetailStock").setAttribute("class", "greenFont frm-btn");
                document.getElementById("addWholeStock").setAttribute("class", "grayFont frm-btn");
            } else {
                document.getElementById("addRetailStock").setAttribute("class", "grayFont frm-btn");
                document.getElementById("addWholeStock").setAttribute("class", "greenFont frm-btn");
            }
        } else {
            document.getElementById('main_ajax_loading_div').style.visibility = "visible";
        }
    };
    if (stockPanel == 'ImitationStock' || stockPanel == 'AddImitationByInv') {
//        xmlhttp.open("POST", "include/php/ogijsdv"+ default_theme +".php?stockType=" + panel, true);
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijsdv" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&utransUserId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel, true);
    } else if (stockPanel == 'RETAIL_IMITATION_B1') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijsdvimb1" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&utransUserId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel, true);
    } else if (stockPanel == 'CrystelStock') {
//        xmlhttp.open("POST", "include/php/ogcraddv"+ default_theme +".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utinId=" + utinId + "&suppPurId=" + suppPurId, true);
        xmlhttp.open("POST", documentRootPath + "/include/php/ogcraddv" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&suppPurId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel, true);
    } else if (stockPanel == 'RETAIL_IMITATION_NUM_B3') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omAdStNumB3" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&suppPurId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel, true);
    } else if (stockPanel == 'RETAIL_IMITATION_B3') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvRetailB3" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&suppPurId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel, true);
    } else if (stockPanel == 'RETAIL_IMITATION_B2') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvRB21" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&suppPurId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogadstoc" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&suppPurId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel, true);
    }
    xmlhttp.send();
}
//************End code for add parameter for supplier purchase:Author:SANT22JAN17
function getMoreStockRawMetalDiv(metalCnt, panelName, firmId, rawGdPreId, rawGdPostId, metalType, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
        metalPanelName, mcntr, rawPreId, rawPostId, otherChgsBy, totFinGdWt, totFinSlWt) {
    metalPanel = panelName;
    metalCount = metalCnt;
    if (metalCount != '') {
        getMetalDiv = metalCount;
    }
//    alert('getMoreStockRawMetalDiv-getMetalDiv=' + getMetalDiv);
    var poststr = "metalDivCount=" + metalCount
            + "&panelName=" + panelName + "&firmId=" + firmId
            + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&metalType=" + metalType + "&rawSlPreId=" + rawSlPreId +
            "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId +
            "&rawAlPostId=" + rawAlPostId + "&metalPanelName=" + metalPanelName
            + "&mcntr=" + mcntr + "&rawPreId=" + rawPreId + "&rawPostId=" + rawPostId
            + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt;
    get_more_raw_metal_div('include/php/ogwspydt' + default_theme + '.php', poststr);
    return false;
}
function getStockRawMetalType(panelName, metalType, metalCount, firmId, rawGdPreId, rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId, metalTypePanel, cntr, otherChgsBy, totFinGdWt, totFinSlWt, metalTypeId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalIdDiv" + metalCount).innerHTML = xmlhttp.responseText;
            document.getElementById(metalTypeId).focus();
            // calcItemBalance();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwspydt" + default_theme + ".php?panelName=" + panelName + "&metalType=" + metalType +
            "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId + "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
            "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt, true);
    xmlhttp.send();
}
function setRateCutValues(prefix) {
    document.getElementById('metal1RtCtWt').value = parseFloat(goldWtBal).toFixed(3);
    document.getElementById('metal1RtCtWtType').value = GoldWtType;
    document.getElementById('metal2RtCtWt').value = parseFloat(silverWtBal).toFixed(3);
    document.getElementById('metal2RtCtWtType').value = SilverWtType;
    document.getElementById(prefix + 'PayMetal1WtBal').value = parseFloat(goldWtBal).toFixed(3);
    document.getElementById(prefix + 'PayMetal1WtBalType').value = GoldWtType;
    document.getElementById(prefix + 'PayMetal2WtBal').value = parseFloat(silverWtBal).toFixed(3);
    document.getElementById(prefix + 'PayMetal2WtBalType').value = SilverWtType;
    if (document.getElementById('paymentMode').value == 'RateCut') {
        if (stockDiv == 'wholeSaleStock') {
            document.getElementById(prefix + 'Metal1RtCtWtBalDisp').value = parseFloat(goldWtBal).toFixed(3) + ' ' + GoldWtType;
            document.getElementById(prefix + 'Metal2RtCtWtBalDisp').value = parseFloat(silverWtBal).toFixed(3) + ' ' + SilverWtType;
//            alert(document.getElementById(prefix + 'Metal2RtCtWtBalDisp').value);
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
var rateCutPanel = null;
function wholesaleRateCut(rateCutId, totFinGdWt, goldTotFFineWtType, totFinSlWt, silverTotFFineWtType, totGoldPay, totSilverPay, goldRate, silverRate, payPanelName, otherCharges, otherChgsBy, suppId, preInvNo, invNo, uniqueId, goldTotFFineWt, silverTotFFineWt, panel, crystalAmount, mainPanel) {
    //    alert(rateCutId + '-' + goldTotFFineWt + '-' + goldTotFFineWtType + '-' + silverTotFFineWt + '-' + silverTotFFineWtType + '-' + totGoldPay + '-' + totSilverPay + '-' + goldRate + '-' + silverRate + '-' + payPanelName + '-' + otherCharges + '-' + otherChgsBy + '-' + suppId + '-' + preInvNo + '-' + invNo);
//    alert(rateCutId + "-" + panel);
//    alert(silverRate);
    rateCutPanel = panel;
    var poststr = "rateCutOpt=" + encodeURIComponent(rateCutId) +
            "&goldTotFFineWt=" + encodeURIComponent(goldTotFFineWt) +
            "&goldTotFFineWtType=" + encodeURIComponent(goldTotFFineWtType) +
            "&silverTotFFineWt=" + encodeURIComponent(silverTotFFineWt) +
            "&silverTotFFineWtType=" + encodeURIComponent(silverTotFFineWtType) +
            "&totFinGdWt=" + encodeURIComponent(totFinGdWt) +
            "&totFinSlWt=" + encodeURIComponent(totFinSlWt) +
            "&totGoldPay=" + encodeURIComponent(totGoldPay) +
            "&totSilverPay=" + encodeURIComponent(totSilverPay) +
            "&goldRate=" + encodeURIComponent(goldRate) +
            "&silverRate=" + encodeURIComponent(silverRate) +
            "&otherCharges=" + encodeURIComponent(otherCharges) + "&payPanelName=" + encodeURIComponent(payPanelName) +
            "&otherChgsBy=" + encodeURIComponent(otherChgsBy) +
            "&payId=" + encodeURIComponent(document.getElementById('payId').value) +
            "&preInvId=" + encodeURIComponent(preInvNo) +
            "&invId=" + encodeURIComponent(invNo) +
            "&uniqueId=" + encodeURIComponent(uniqueId) +
            "&suppId=" + encodeURIComponent(suppId) +
            "&crystalVal=" + encodeURIComponent(crystalAmount) +
            "&mainPanel=" + encodeURIComponent(mainPanel);
    if (rateCutId == 'RateCut') {
        if (panel == 'sellPanel') {
            wholesale_rate_cut("include/php/ogswrtct" + default_theme + ".php", poststr);
        } else {
            wholesale_rate_cut("include/php/ogspwrtct" + default_theme + ".php", poststr);
        }
    } else {
        if (panel == 'sellPanel') {
            wholesale_rate_cut("include/php/ogswsbdv" + default_theme + ".php", poststr);
        } else {
            wholesale_rate_cut("include/php/ogspwsdv" + default_theme + ".php", poststr);
        }
    }
}
function wholesale_rate_cut(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertWholeSaleRateCut;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertWholeSaleRateCut() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("rateCutDiv").innerHTML = xmlhttp.responseText;
        var prefix = document.getElementById('prefix').value;
        if (rateCutPanel == 'sellPanel') {
            calcSellRawMetStock(prefix);
        } else {
            calcWholeSaleRateCut(prefix);
        }
        calcPaymentCashBalance(prefix);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function calcStockCashBalance(prefix) {
//    alert('hi');
    var finalCashBal;
    var finBalLabel = 'FINAL CASH BALANCE';
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
        var totTax = parseFloat(document.getElementById('VATTax').value) / 100;
        document.getElementById(prefix + 'PayVATAmt').value = parseFloat(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
        document.getElementById(prefix + 'PayVATAmtDisp').value = Math_round(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
    }

    if (document.getElementById(prefix + 'PayVATAmt').value == 'NaN') {
        document.getElementById(prefix + 'PayVATAmt').value = 0.00;
    }
    if (document.getElementById(prefix + 'PayVATAmt').value || document.getElementById(prefix + 'PayDiscount').value != '') {
        if (document.getElementById(prefix + 'PayVATAmt').value == null || document.getElementById(prefix + 'PayVATAmt').value == '' || document.getElementById(prefix + 'PayVATAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayVATAmt').value = 0;
        }
        if (document.getElementById(prefix + 'PayPrevTotAmt').value == null || document.getElementById(prefix + 'PayPrevTotAmt').value == '' || document.getElementById(prefix + 'PayPrevTotAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayPrevTotAmt').value = 0;
        }
        if (document.getElementById(prefix + 'PayDiscount').value == null || document.getElementById(prefix + 'PayDiscount').value == '' || document.getElementById(prefix + 'PayDiscount').value == 'NaN') {
            document.getElementById(prefix + 'PayDiscount').value = 0;
        }
        document.getElementById(prefix + 'PayDiscountDisp').value = Math_round(parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        document.getElementById(prefix + 'PayVATAmtDisp').value = Math_round(parseFloat(document.getElementById(prefix + 'PayVATAmt').value)).toFixed(2);
        document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math_round((parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value))).toFixed(2);
//        alert(document.getElementById(prefix + 'PayTotAmt').value);
        finalCashBal = Math_round((parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        if (finalCashBal > 0) {
//            finBalClass = 'redFont';
        } else if (finalCashBal <= 0) {
            finBalLabel = 'FINAL CASH DEPOSIT :';
        }
//        alert(finBalClass);
        document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(finalCashBal).toFixed(2);
        document.getElementById('finCashBalTd').innerHTML = finBalLabel;
//        document.getElementById('finalBalanceTd').setAttribute('class', finBalClass);
        document.getElementById(prefix + 'PayTotAmtBal').value = parseFloat((parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
    }
}


//********Start code for add this option in Add Invoice:Author:SANT24OCT16
/*****Start to change panel name variable for sellpayup and slprpayment @Author:SHRI04NOV16*********************/
function changeStockOtherChgsOpt(othChgsBy, stockPanelName, invPanel, preInvoiceNo, invoiceNo, panel, sellPanelName, slprInfo, custId, UpPanel, transDate, slprDay = '', slprMonth = '', slprYear = '', changeStockOtherChgsOpt = '')
{
    var rateCutOption = '';
    loadXMLDoc();
    if (stockPanelName == 'SlPrPayment' || stockPanelName == 'SellPayUp' || panel == 'InvoicePayment' || panel == 'InvoicePayUp')
        rateCutOption = document.getElementById('paymentMode').value;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('main_ajax_loading_div').style.visibility = "hidden";
            if (panel == 'InvoicePayment') {
                document.getElementById('suppDeposite').innerHTML = xmlhttp.responseText;
            } else if (panel == 'InvoicePayUp') {
                document.getElementById('suppAddInvoiceStockDiv').innerHTML = xmlhttp.responseText;
            } else if (panel == 'whSellPanel') {
                document.getElementById('slPrCurrentInvBeforePay').innerHTML = xmlhttp.responseText;
            } else if (stockPanelName == 'SlPrPayment' || stockPanelName == 'SellPayUp') {
                document.getElementById('slPrCurrentInvoice').innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById('addStockCurrentInvoice').innerHTML = xmlhttp.responseText;
            }
            if (stockPanelName == 'SellPayUp') {
                if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
                    calcWholeSaleRateCut('slPr');
                }
                calcPaymentCashBalance('slPr');
            } else if (panel == 'whSellPanel') {
                calcWholeSaleSellRateCut('slPr');
                calcPaymentCashBalance('slPr');
            } else if (panel == 'InvoicePayment' || panel == 'InvoicePayUp') {
                calcWholeSaleSellRateCut('suppDep');
                calcPaymentCashBalance('suppDep');
            }
        } else {
            document.getElementById('main_ajax_loading_div').style.visibility = "visible";
        }
    };
    if (panel == 'retailStock') {
        xmlhttp.open("POST", "include/php/ogstocklist" + default_theme + ".php?othChgsBy=" + othChgsBy + "&stockPanelName=" + stockPanelName + "&invPanel=" + invPanel + "&preInvoiceNo=" + preInvoiceNo + "&invoiceNo=" + invoiceNo + "&suppId=" + custId, true);
    } else if (panel == 'whSellPanel') {
        xmlhttp.open("POST", "include/php/ogwsindv" + default_theme + ".php?othChgsBy=" + othChgsBy + "&stockPanelName=" + stockPanelName + "&invPanel=" + invPanel + "&preInvoiceNo=" + preInvoiceNo + "&postInvoiceNo=" + invoiceNo + "&panelName=" + sellPanelName + "&slprInfo=" + slprInfo + "&custId=" + custId + "&upPanel=" + UpPanel, true);
    } else if (panel == 'InvoicePayment' || panel == 'InvoicePayUp') {
        xmlhttp.open("POST", "include/php/ogpayment" + default_theme + ".php?othChgsBy=" + othChgsBy + "&stockPanelName=" + stockPanelName + "&invPanel=" + invPanel + "&preInvoiceNo=" + preInvoiceNo + "&postInvoiceNo=" + invoiceNo + "&panelName=" + sellPanelName + "&slprInfo=" + slprInfo + "&custId=" + custId + "&paymentPanelName=" + panel + "&rateCutOption=" + rateCutOption, true);
    } else if (stockPanelName == 'SlPrPayment' || stockPanelName == 'SellPayUp') {
        xmlhttp.open("POST", "include/php/ogspindv" + default_theme + ".php?otherChgsBy=" + othChgsBy + "&preInvoiceNo=" + preInvoiceNo + "&postInvoiceNo=" + invoiceNo + "&panelName=" + stockPanelName + "&slprInfo=" + slprInfo + "&custId=" + custId + "&paymentPanelName=" + stockPanelName + "&rateCutOption=" + rateCutOption + "&transDate=" + transDate + "&DOBDay=" + slprDay + "&DOBMonth=" + slprMonth + "&DOBYear=" + slprYear + "&changeStockOtherChgsOpt=" + changeStockOtherChgsOpt, true);
    } else {
        xmlhttp.open("POST", "include/php/ogwaindv" + default_theme + ".php?othChgsBy=" + othChgsBy + "&stockPanelName=" + stockPanelName + "&invPanel=" + invPanel + "&preInvoiceNo=" + preInvoiceNo + "&invoiceNo=" + invoiceNo + "&suppId=" + custId, true);
    }
    xmlhttp.send();
}
/*****End to change panel name variable for sellpayup and slprpayment @Author:SHRI04NOV16*********************/
//********End code for add this option in Add Invoice:Author:SANT24OCT16

function addWhStockExistingItemDiv(newPreInvoiceNo, newInvoiceNo, panelName, mainPanel, stockPanel, documentRootPath, sttrId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStockCurrentInvoice").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogwaexad" + default_theme + ".php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&stockPanel=" + stockPanel + "&sttrId=" + sttrId, true);
    xmlhttp.send();
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO DELETE DAILY METAL RATE BY METAL RATE ID @AUTHOR:SIMRAN-12MAY2023 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
function deleteMetalDailyRate(metalRateId, panelName, metalId, metalType) {
    //alert('metalRateId==' + metalRateId);
    if (panelName == 'DeleteMetaldailyRate' && metalId == 'dailyMetalRate') {
        confirm_box = confirm(deleteAlertMess + "\n\nDo you really want to Permanent Delete All Metal Rates ID ?");
    } else {
        confirm_box = confirm(deleteAlertMess + "\n\nDo you really want to Permanent Delete this Rate Details ID?");
    }
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("metalDetDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ommrmdel.php?metalRateId=" + metalRateId + "&metalId=" + metalId + "&metalType=" + metalType, true);
        xmlhttp.send();
    }

}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO DELETE DAILY METAL RATE BY METAL RATE ID @AUTHOR:SIMRAN-12MAY2023 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//********Start code to delete particular add stock :Author:SANT25JAN17
function deleteWhStockListItem(sttrId, panelName, mainPanel, pageNo, sellPresent, prevStockPresent, itemCategory, metalType, utinId, deletereason) {

    var documentRootPath = document.getElementById('documentRootPath').value;
    if (sellPresent > 0) {
        alert('To Delete,First Delete This Item From Customer Jewellery Panel!');
        return false;
    } else {
        // Check if a reason is required for deletion (only prompt if deletereason is 'YES')
        var deleteReason = '';

        // Prompt for a reason if required
        if (deletereason === 'YES') {
            deleteReason = prompt("Please provide a reason for deleting this item:");

            // If no reason is provided, prevent deletion
            if (deleteReason === null || deleteReason.trim() === "") {
                alert("You must provide a reason for deletion.");
                return false;
            }
        }
        if (prevStockPresent > 0) {
            confirm_box = confirm("Previous balance gets changed from this item delete\n\nDo you really want to delete this Item?");
        } else {
            confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
        }
        if (confirm_box == true)
        {
            if (panelName != 'ItemStockList') {
                var stockDeleteConfirm = 'yes';
                var stockDelete = 'Y';
            }

            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    if (panelName == 'ItemDetailPanel') {
                        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                        window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                    } else if (panelName == 'StockList') {
                        document.getElementById("stockList").innerHTML = xmlhttp.responseText;
                        window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                    } else if (panelName == 'PurchaseList' || panelName == 'ItemStockList') {
                        document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                        if (panelName == 'ItemStockList')
                            closeMessDiv('messDisplayDivision', 'DELETED');
                        else
                            closeMessDiv('messDisplayDiv', 'DELETED');
                    } else if (mainPanel == 'StockInvoice' || mainPanel == 'RETAIL_FINE_B1' || mainPanel == 'RETAIL_FINE_B2' || mainPanel == 'RETAIL_FINE_B3' || mainPanel == 'RETAIL_CAD_STOCK') {
                        document.getElementById("mainAddStockDiv").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else if (panelName == 'jewelleryPanel') {
                        document.getElementById("jewelleryPanelItemDiv").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else {
                        document.getElementById("paymentDiv").innerHTML = xmlhttp.responseText;
                        window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                    }
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            if (panelName == 'ItemStockList') {
                xmlhttp.open("GET", "include/php/ogwhstdl" + default_theme + ".php?stockId=" + sttrId + "&panelName=" + panelName + "&pageNo=" + pageNo + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&deleteReason=" + encodeURIComponent(deleteReason), true);
            } else {
                xmlhttp.open("GET", documentRootPath + "/include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&pageNo=" + pageNo + "&stockDeleteConfirm=" + stockDeleteConfirm + "&utinId=" + utinId + "&deleteReason=" + encodeURIComponent(deleteReason), true);
            }
            xmlhttp.send();
        }
    }
}
//********End code to delete particular add stock :Author:SANT25JAN17

function calcWholeSaleSellRateCut(prefix) {
    if (document.getElementById(prefix + 'GoldWtPrevBal1').value == '' || document.getElementById(prefix + 'GoldWtPrevBal1').value == 'NaN') {
        document.getElementById(prefix + 'GoldWtPrevBal1').value = 0;
    }
    if (document.getElementById(prefix + 'Metal1WtPurBal1').value == '' || document.getElementById(prefix + 'Metal1WtPurBal1').value == 'NaN') {
        document.getElementById(prefix + 'Metal1WtPurBal1').value = 0;
    }
    if (document.getElementById(prefix + 'Metal1WtRecBal1').value == '' || document.getElementById(prefix + 'Metal1WtRecBal1').value == 'NaN') {
        document.getElementById(prefix + 'Metal1WtRecBal1').value = 0;
    }
    var gdRtCt = 0;
    var gdBal = parseFloat(document.getElementById(prefix + 'GoldWtPrevBal1').value) + parseFloat(document.getElementById(prefix + 'Metal1WtPurBal1').value) - parseFloat(document.getElementById(prefix + 'Metal1WtRecBal1').value);
    var gdRtCt = parseFloat(document.getElementById('metal1RtCtWt').value);
    var goldRtCtWtType = document.getElementById('metal1RtCtWtType').value;
    var goldWtType = document.getElementById(prefix + 'Metal1WtPurBal1Type').value;
    if (gdBal != '') {
        if (goldWtType == 'KG') {
            if (goldRtCtWtType == 'KG') {
                gdRtCt = parseFloat(gdRtCt).toFixed(3);
            } else if (goldRtCtWtType == 'GM') {
                gdRtCt = parseFloat(gdRtCt / 1000).toFixed(3);
            } else if (goldRtCtWtType == 'MG') {
                gdRtCt = parseFloat((gdRtCt / (1000 * 1000))).toFixed(3);
            }
        } else if (goldWtType == 'GM') {
            if (goldRtCtWtType == 'KG') {
                gdRtCt = parseFloat((gdRtCt * 1000)).toFixed(3);
            } else if (goldRtCtWtType == 'GM') {
                gdRtCt = parseFloat(gdRtCt).toFixed(3);
            } else if (goldRtCtWtType == 'MG') {
                gdRtCt = parseFloat((gdRtCt / (1000))).toFixed(3);
            }
        } else if (goldWtType == 'MG') {
            if (goldRtCtWtType == 'KG') {
                gdRtCt = parseFloat((gdRtCt * 1000 * 1000)).toFixed(3);
            } else if (goldRtCtWtType == 'GM') {
                gdRtCt = parseFloat((gdRtCt * 1000)).toFixed(3);
            } else if (goldRtCtWtType == 'MG') {
                gdRtCt = parseFloat((gdRtCt)).toFixed(3);
            }
        }
        document.getElementById(prefix + 'Metal1RtCtWtBal').value = gdRtCt;
//        alert(gdBal);
//        alert(gdRtCt);
        document.getElementById(prefix + 'PayMetal1WtBal').value = parseFloat(gdBal - gdRtCt).toFixed(3);
//        alert('calcWholeSaleSellRateCut='+document.getElementById(prefix + 'PayMetal1WtBal').value);
        if (document.getElementById('paymentMode').value == 'RateCut') {
            document.getElementById(prefix + 'Metal1RtCtWtBalDisp').value = gdRtCt + ' ' + goldWtType;
        }
    }
    if (document.getElementById(prefix + 'SilverWtPrevBal1').value == '' || document.getElementById(prefix + 'SilverWtPrevBal1').value == 'NaN') {
        document.getElementById(prefix + 'SilverWtPrevBal1').value = 0;
    }
    if (document.getElementById(prefix + 'Metal2WtPurBal1').value == '' || document.getElementById(prefix + 'Metal2WtPurBal1').value == 'NaN') {
        document.getElementById(prefix + 'Metal2WtPurBal1').value = 0;
    }
    if (document.getElementById(prefix + 'Metal2WtRecBal1').value == '' || document.getElementById(prefix + 'Metal2WtRecBal1').value == 'NaN') {
        document.getElementById(prefix + 'Metal2WtRecBal1').value = 0;
    }
    var silverRtCt = 0;
    var silverBal = parseFloat(document.getElementById(prefix + 'SilverWtPrevBal1').value) + parseFloat(document.getElementById(prefix + 'Metal2WtPurBal1').value) - parseFloat(document.getElementById(prefix + 'Metal2WtRecBal1').value);
    var silverRtCt = parseFloat(document.getElementById('metal2RtCtWt').value);
    var silverRtCtWtType = document.getElementById('metal2RtCtWtType').value;
    var silverWtType = document.getElementById(prefix + 'Metal2WtPurBal1Type').value;
    if (silverBal != '') {
        if (silverWtType == 'KG') {
            if (silverRtCtWtType == 'KG') {
                silverRtCt = parseFloat(silverRtCt).toFixed(3);
            } else if (silverRtCtWtType == 'GM') { //                alert(silverRtCtWtType);
                silverRtCt = parseFloat(silverRtCt / 1000).toFixed(3);
            } else if (silverRtCtWtType == 'MG') {
                silverRtCt = parseFloat((silverRtCt / (1000 * 1000))).toFixed(3);
            }
        } else if (silverWtType == 'GM') {
            if (silverRtCtWtType == 'KG') {
                silverRtCt = parseFloat((silverRtCt * 1000)).toFixed(3);
            } else if (silverRtCtWtType == 'GM') {
                silverRtCt = parseFloat(silverRtCt).toFixed(3);
            } else if (silverRtCtWtType == 'MG') {
                silverRtCt = parseFloat((silverRtCt / (1000))).toFixed(3);
            }
        } else if (silverWtType == 'MG') {
            if (silverRtCtWtType == 'KG') {
                silverRtCt = parseFloat((silverRtCt * 1000 * 1000)).toFixed(3);
            } else if (silverRtCtWtType == 'GM') {
                silverRtCt = parseFloat((silverRtCt * 1000)).toFixed(3);
            } else if (silverRtCtWtType == 'MG') {
                silverRtCt = parseFloat((silverRtCt)).toFixed(3);
            }
        }
        document.getElementById(prefix + 'Metal2RtCtWtBal').value = silverRtCt;
        document.getElementById(prefix + 'PayMetal2WtBal').value = parseFloat(silverBal - silverRtCt).toFixed(3);
        if (document.getElementById('paymentMode').value == 'RateCut') {
            document.getElementById(prefix + 'Metal2RtCtWtBalDisp').value = silverRtCt + ' ' + silverWtType;
        }
    }

    calcSellRawMetStock(prefix);
    calcPaymentCashBalance(prefix);
}
//
//
function showAddWhStockPanel(panel) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'StockList' || panel == 'stockListByItem' || panel == 'FineStock' || panel == 'FineWholesaleStock' || panel == 'AllTagStock' ||
                    panel == 'FineStockWithStone' || panel == 'AllStock' || panel == 'AllWholesaleStock' ||
                    panel == 'AvailRetailStockList' || panel == 'AvailWholesaleStockList' ||
                    panel == 'AvailServicesList' || panel == 'AvailSubscriptionsList' ||
                    panel == 'ExpiredStockList' || panel == 'FineAllWholesaleStock' ||
                    panel == 'conversionPanel' || panel == 'deletedStockList' ||
                    panel == 'transferredStockList' || panel == 'discountList' || panel == 'AvailStockListWithFixedMrp' ||
                    panel == 'discountCommissionList' || panel == 'discountCommissionListMostLess' || panel == 'discountCommissionListMostLessL' || panel == 'AvailStockListWithZeroQty' || panel == 'CrystalretailStock' || panel == 'CrystalrwholesaleStock' || panel == 'CadStock') {//add new panel for imitation and crystal @omkar30JAN2024
                document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
            // start add this condition for retail in @ yuvraj 06102022
            if (panel == 'RETAIL_IMITATION_B3') {
                if (document.getElementById('sttr_gs_weight')) {
                    document.getElementById('sttr_gs_weight').focus();
                }
            }
            // ADD THIS CODE FOR RETAIL SOFTWARE ON FOUCS DAY INPUT @YUVRAJ 11-11-2022
            if (panel == 'RETAIL_IMITATION_B2' || panel == 'SERVICE_FORM' || panel == 'SUBSCRIPTION_FORM') {
                document.getElementById('addItemDOBDay').focus();
            }
            // END ADD THIS CODE FOR RETAIL SOFTWARE ON FOUCS DAY INPUT @YUVRAJ 11-11-2022
            // // end add this condition for retail in @ yuvraj 06102022
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    //
    if (panel == 'CrystalretailStock') {//add crystal reatil stock list @omkar31jan2024
        xmlhttp.open("POST", "include/php/ompurcryretailstocklist" + default_theme + ".php?panelName=" + panel, true);
    } else if (panel == 'CrystalrwholesaleStock') {//add crystal wholesalke stock list
        xmlhttp.open("POST", "include/php/ompurcrywholesalestocklist" + default_theme + ".php?panelName=" + panel, true);
    } else if (panel == 'FineAllWholesaleStock') {
        xmlhttp.open("POST", "include/php/omAllWholesaleStockList" + default_theme + ".php?panelName=" + panel, true);
    } else if (panel == 'FineStock') {
        xmlhttp.open("POST", "include/php/ompurchase" + default_theme + ".php?panelName=" + panel, true);
    } else if (panel == 'FineWholesaleStock') {
        xmlhttp.open("POST", "include/php/omavailwhst.php?panelName=" + panel, true);
    } else if (panel == 'AvailRetailStockList') {
        // ADDED CODE FOR AVAILABLE RETAIL STOCK LIST @PRIYANKA-30JUNE2020
        xmlhttp.open("POST", "include/php/omAvailRetailStockList" + default_theme + ".php?panelName=" + panel, true);
    } else if (panel == 'AvailWholesaleStockList') {
        // ADDED CODE FOR AVAILABLE WHOLESALE STOCK LIST @PRIYANKA-30JUNE2020
        xmlhttp.open("POST", "include/php/omAvailWholesaleStockList" + default_theme + ".php?panelName=" + panel, true);
    } else if (panel == 'AvailServicesList') {
        // ADDED CODE FOR AVAILABLE SERVICES LIST @PRIYANKA-17JULY2020
        xmlhttp.open("POST", "include/php/omAvailServicesList" + default_theme + ".php?panelName=" + panel, true);
    } else if (panel == 'AvailSubscriptionsList') {
        // ADDED CODE FOR AVAILABLE SUBSCRIPTIONS LIST @PRIYANKA-17JULY2020
        xmlhttp.open("POST", "include/php/omAvailSubscriptionsList" + default_theme + ".php?panelName=" + panel, true);
    } else if (panel == 'stock' || panel == 'stockListByItem') {
        // xmlhttp.open("POST", "include/php/ogwastlt"+ default_theme +".php?panel=" + panel, true);
        xmlhttp.open("POST", "include/php/ogwgstlt" + default_theme + ".php?divPanel=" + panel, true);
    } else if (panel == 'conversionPanel') {
        xmlhttp.open("POST", "include/php/omStockConversion" + default_theme + ".php?panelName=" + panel, true);
    } else if (panel == 'AllStock' || panel == 'AllWholesaleStock' || panel == 'AllTagStock') {
        // xmlhttp.open("POST", "include/php/ogwastlt.php?panel=" + panel, true);

        //xmlhttp.open("POST", "include/php/ompurchaselist"+ default_theme +".php?panelName=" + panel, true);

        xmlhttp.open("POST", "include/php/ompurchaselist" + default_theme + ".php?panelName=" + panel, true);

        // xmlhttp.open("POST", "include/php/ogwastlt"+ default_theme +".php?panel=" + panel, true);
        xmlhttp.open("POST", "include/php/ompurchaselist" + default_theme + ".php?panelName=" + panel, true);
    } else if (panel == 'deletedStockList') {
        // xmlhttp.open("POST", "include/php/ogwastlt"+ default_theme +".php?panel=" + panel, true);omstockdeletelist
        // xmlhttp.open("POST", "include/php/ogiamndv"+ default_theme +".php?panelName=" + panel, true);
        xmlhttp.open("POST", "include/php/omstockdeletelist" + default_theme + ".php?panelName=" + panel, true);

        // xmlhttp.open("POST", "include/php/ogwastlt.php?panel=" + panel, true);omstockdeletelist
        // xmlhttp.open("POST", "include/php/ogiamndv.php?panelName=" + panel, true);
        xmlhttp.open("POST", "include/php/omstockdeletelist" + default_theme + ".php?panelName=" + panel, true);

    } else if (panel == 'discountList') {
        //xmlhttp.open("POST", "include/php/omDiscountList.php?panelName=" + panel, true);
        xmlhttp.open("POST", "include/php/omDiscountManagement.php?panelName=" + panel, true);
    } else if (panel == 'discountCommissionList') {
        xmlhttp.open("POST", "include/php/omDiscountManagementRetail.php?panelName=" + panel, true);
        //xmlhttp.open("POST", "include/php/omDiscountMostLessManagementRetail.php?panelName=" + panel, true);
    } else if (panel == 'discountCommissionListMostLess') {
        xmlhttp.open("POST", "include/php/omDiscountMostLessManagementRetail.php?panelName=" + panel, true);
    } else if (panel == 'discountCommissionListMostLessL') {
        xmlhttp.open("POST", "include/php/omDiscountMostLessManagementRetail12.php?panelName=" + panel, true);
    } else if (panel == 'RETAIL_IMITATION_B2' || panel == 'RETAIL_IMITATION_B3' || panel == 'RETAIL_IMITATION_B1' ||
            panel == 'SERVICE_FORM' || panel == 'SUBSCRIPTION_FORM') {
        /* START CODE TO ADD ELSE -IF CONDITION FOR RETAIL-IMITATION B2 STOCK @AUTHOR:MADHUREE-04FEB2020 */
        // ADDED CONDITIONS FOR SERVICE AND SUBSCRIPTION FORM @AUTHOR:PRIYANKA-14JULY2020
        xmlhttp.open("POST", "include/php/ogiamndv" + default_theme + ".php?panelName=" + panel + "&formName=" + panel, true);
        /* END CODE TO ADD ELSE -IF CONDITION FOR RETAIL-IMITATION B2 STOCK @AUTHOR:MADHUREE-04FEB2020 */

    } else if (panel == 'RETAIL_FINE_B2' || panel == 'RETAIL_FINE_B3' || panel == 'RETAIL_FINE_B3_UPDATE' || panel == 'ImitationStock' || panel == 'RETAIL_CAD_STOCK' || panel == 'RETAIL_CAD_STOCK_UPDATE') { // || panel == 'ImitationStock' add this condition for retail soft @yuvraj 06102022
        /* START CODE TO ADD ELSE -IF CONDITION FOR RETAIL-FINE B2 STOCK @AUTHOR:MADHUREE-15FEB2020 */
        xmlhttp.open("POST", "include/php/ogiamndv" + default_theme + ".php?panelName=" + panel, true);
        /* END CODE TO ADD ELSE -IF CONDITION FOR RETAIL-FINE B2 STOCK @AUTHOR:MADHUREE-15FEB2020 */
        /* START CODE TO ADD ELSE -IF CONDITION FOR RETAIL_IMITATION_NUM_B3 and StrelleringStock STOCK @AUTHOR:YUVRAJ -06102022*/
    } else if (panel == 'RETAIL_IMITATION_NUM_B3') {
        xmlhttp.open("POST", "include/php/ogiamndv" + default_theme + ".php?panelName=RETAIL_IMITATION_NUM_B3", true);
//    code updated by  hrushali.
    } else if (panel == 'FASHION_JEWELLARY') {
        xmlhttp.open("POST", "include/php/ogiamndv" + default_theme + ".php?panelName=FASHION_JEWELLARY", true);
        //end
    } else if (panel == 'StrelleringStock') {
        xmlhttp.open("POST", "include/php/ogiamndv" + default_theme + ".php?panelName=StrelleringStock", true);
        /* END CODE TO ADD ELSE -IF CONDITION FOR RETAIL_IMITATION_NUM_B3 and StrelleringStock STOCK @AUTHOR:YUVRAJ -06102022*/
        /* START CODE TO ADD ELSE -IF CONDITION FOR CATALOGUE STOCK @AUTHOR:MADHUREE-01APRIL2020 */
    } else if (panel == 'catalogueStock') {
        xmlhttp.open("POST", "include/php/ogiamndv" + default_theme + ".php?panelName=" + panel, true);
        /* END CODE TO ADD ELSE -IF CONDITION FOR CATALOGUE STOCK @AUTHOR:MADHUREE-01APRIL2020 */
    } else if (panel == 'AllStockWithStone' || panel == 'AllWholesaleStockWithStone') {
        xmlhttp.open("POST", "include/php/ogiamndv" + default_theme + ".php?panelName=" + panel, true);
        /* END CODE TO ADD ELSE -IF CONDITION FOR CATALOGUE STOCK @AUTHOR:MADHUREE-01APRIL2020 */
    } else if (panel == 'FineStockWithStone') {
        xmlhttp.open("POST", "include/php/ompurchasewst" + default_theme + ".php?panelName=" + panel, true);
        /* END CODE TO ADD ELSE -IF CONDITION FOR CATALOGUE STOCK @AUTHOR:MADHUREE-01APRIL2020 */
        /* START CODE TO ADD ELSE -IF CONDITION FOR TRANSFERRED STOCK LIST @AUTHOR:MADHUREE-21NOV2020 */
    } else if (panel == 'transferredStockList') {
        xmlhttp.open("POST", "include/php/omtransStockList" + default_theme + ".php?panelName=" + panel, true);
        /* END CODE TO ADD ELSE -IF CONDITION FOR TRANSFERRED STOCK LIST @AUTHOR:MADHUREE-21NOV2020 */
    } else if (panel == 'ExpiredStockList') {
        // ADDED CODE FOR EXPIRED STOCK LIST @PRIYANKA-30JAN2021
        xmlhttp.open("POST", "include/php/omExpiredStockList" + default_theme + ".php?panelName=" + panel, true);
    } else if (panel == 'FINE_JEWELLERY_PUR_B2') {
        xmlhttp.open("POST", "include/php/ogiamndv" + default_theme + ".php?panelName=" + panel, true);
    } else if (panel == 'AvailStockListWithFixedMrp') {
        xmlhttp.open("POST", "include/php/omavalblstkwimrp" + default_theme + ".php?panelName=" + panel, true);
        /* START CODE FOR ADDED STOCK REPORT WITJ ZERO QTY @SIMRAN:02MAY2023*/
    } else if (panel == 'AvailStockListWithZeroQty') {
        xmlhttp.open("POST", "include/php/omavalblstkwiZeroQty" + default_theme + ".php?panelName=" + panel, true);
    } else if (panel == 'CadStock') {
        xmlhttp.open("POST", "include/php/omcadstockreports" + default_theme + ".php?panelName=" + panel, true);
    }
    /* END CODE FOR ADDED STOCK REPORT WITJ ZERO QTY @SIMRAN:02MAY2023*/
    else {
        xmlhttp.open("POST", "include/php/ogiamndv" + default_theme + ".php?panel=" + panel + "&panelName=AddStock", true);
    }
    xmlhttp.send();
}
//
//
var addNewStockMetalType;
var newItemTunchDivCount;
function changeItemStockTunchOption(selectedMetalType, divCount) {
//    alert('changeItemStockTunchOption=' + selectedMetalType.value);
    var poststr = "metalType=" + encodeURIComponent(selectedMetalType.value)
            + "&itemDivCount=" + encodeURIComponent(divCount);
    addNewStockMetalType = selectedMetalType.value;
    newItemTunchDivCount = divCount;
    /************Start code to add div @Author:PRIYA07OCT14********/
    /********Start code to add divCount WholeSale @Author:PRIYA14APR15*********/
//    newItemTunchDivCount = '';
    poststr += "&tunchDivId=addItemTunch" +
            "&nextFieldId=addItemWastage" +
            "&prevFieldId=addItemNetWeightType" +
            "&netWeightFieldId=addItemNetWeight" +
            "&fineWeightFieldId=addItemFineWeight" +
            "&finalFineWeightFieldId=addItemFFineWeight" +
            "&tunchDivClass=form-control-select20-font12 placeholderClass";
    change_Item_stock_Tunch_Option('include/php/ogiatndv' + default_theme + '.php', poststr);
}

function change_Item_stock_Tunch_Option(url, parameters) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = alertChangeItemStockTunchOption;
    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);
}
function alertChangeItemStockTunchOption() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("itemTunchDiv").innerHTML = xmlhttp2.responseText;
        newChangeAddStockMetalRate(addNewStockMetalType);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function newChangeAddStockMetalRate(metalType) {
//    alert(metalType);
    var poststr = "metalType=" + encodeURIComponent(metalType) +
            "&panelName=" + encodeURIComponent('AddStockPanel');
    new_change_add_stock_metal_rate('include/php/ommrggdr' + default_theme + '.php', poststr);
    return false;
}
function new_change_add_stock_metal_rate(url, parameters) {

    loadXMLDoc2();
    xmlhttp2.onreadystatechange = alertNewChangeAddStockMetalRate;
    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);
}
function alertNewChangeAddStockMetalRate() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("metalRateDiv").innerHTML = xmlhttp2.responseText;
        newChangeStockItemId(addNewStockMetalType, 'AddStockPanel');
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function newChangeStockItemId(selectedMetalType, panelName) {
//    alert(selectedMetalType);
    var poststr = "metalType=" + encodeURIComponent(selectedMetalType)
            + "&panelName=" + encodeURIComponent(panelName);
    new_change_stock_item_id('include/php/ogiaiddv' + default_theme + '.php', poststr);
    return false;
}
function new_change_stock_item_id(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertNewChangeStockItemId;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertNewChangeStockItemId() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        var str = xmlhttp.responseText;
        var strValue = new Array();
        strValue = str.split("*");
        document.getElementById("addItemPreId").value = strValue[0].trim(); //trim added @OMMODTAG SHRI_12JAN16
        document.getElementById("addItemId").value = strValue[1];
        document.getElementById("addItemMetalRate").focus();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//add itemname Author:GAUR25JUL16
/*****************START code to change parameters @Author:PRIYANKA-21JUN17************************/
function showWSStockItemDetailsDiv(itemCategory, metalType, panelName, itemName, itemNameDetail, stockType) {
//alert(stockType);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText; //change in div name @AUTHOR: SANDY25SEP13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //alert(panelName);
    if (panelName == 'ImitationStock' || panelName == 'stock') {
        var status = 'No';
        xmlhttp.open("POST", "include/php/ogijstlt" + default_theme + ".php?panelName=" + panelName + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName + "&itemNameDetail=" + itemNameDetail + "&stockType=" + stockType, true);
    } else if (panelName == 'ImitationStockDetails' || panelName == 'StockDetails') {
        xmlhttp.open("POST", "include/php/omimstocdet" + default_theme + ".php?panelName=" + panelName + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName + "&itemNameDetail=" + itemNameDetail + "&stockType=" + stockType, true);
    } else {
        xmlhttp.open("POST", "include/php/ogwastlt" + default_theme + ".php?panelName=" + panelName + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName + "&itemNameDetail=" + itemNameDetail + "&stockType=" + stockType, true);
    }
    xmlhttp.send();
}
//
// /*****************START code to add function for FINE STOCK LIST @Author:PRIYANKA-05-07-17************************/
function showFineStockItemDetailsDiv(itemCategory, itemName, panel, panelName, metalType, stockType, stockPurity) {
    //
    //alert('itemCategory == ' + itemCategory);
    //alert('itemName == ' + itemName);
    //alert('panel == ' + panel); 
    //alert('panelName == ' + panelName); 
    //alert('metalType == ' + metalType);
    //alert('stockType == ' + stockType);
    //alert('stockPurity == ' + stockPurity);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText; //change in div name @AUTHOR: SANDY25SEP13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'FineStock') {
        xmlhttp.open("POST", "include/php/omstocitmlt" + default_theme + ".php?panel=" + panel + "&panelName=" + panelName
                + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName
                + "&stockType=" + stockType + "&stockPurity=" + stockPurity, true);
    } else {
        xmlhttp.open("POST", "include/php/omstocitmdetlt" + default_theme + ".php?panel=" + panel + "&panelName=" + panelName
                + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName
                + "&stockType=" + stockType + "&stockPurity=" + stockPurity, true);
    }
    xmlhttp.send();
}
/***************** END code to add function for FINE STOCK LIST @Author:PRIYANKA-05-07-17************************/
//
/*****************START code to add function for CRYSTAL STOCK LIST @Author:PRIYANKA-11-07-17************************/
function showCrystalStockItemDetailsDiv(itemCategory, itemName, panel, panelName, metalType, stockType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText; //change in div name @AUTHOR: SANDY25SEP13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'CrystalStock') {
        xmlhttp.open("POST", "include/php/omcryitmlt" + default_theme + ".php?panel=" + panel + "&panelName=" + panelName + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName + "&stockType=" + stockType, true);
    } else {
        xmlhttp.open("POST", "include/php/omcryitmdetlt" + default_theme + ".php?panel=" + panel + "&panelName=" + panelName + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName + "&stockType=" + stockType, true);
    }
    xmlhttp.send();
}
/***************** END code to add function for CRYSTAL STOCK LIST @Author:PRIYANKA-11-07-17************************/
//
//
//****************STRAT CODE TO ADD FUNCTION FOR STRELLERING SILVER LIST AUTHOR : DIKSHA 15DEC2018******************
function showStrlleringStockItemDetailsDiv(itemCategory, itemName, panel, panelName, metalType, stockType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText; //change in div name @AUTHOR: SANDY25SEP13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'StrelleringStock') {
        xmlhttp.open("POST", "include/php/omstritmlt" + default_theme + ".php?panel=" + panel + "&panelName=" + panelName + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName + "&stockType=" + stockType, true);
    } else {
        xmlhttp.open("POST", "include/php/omstritmdetlt" + default_theme + ".php?panel=" + panel + "&panelName=" + panelName + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName + "&stockType=" + stockType, true);
    }
    xmlhttp.send();
}
//****************END CODE TO ADD FUNCTION FOR STRELLERING SILVER LIST AUTHOR : DIKSHA 15DEC2018******************
//
//
/*****************END code to change parameters @Author:PRIYANKA-21JUN17************************/
//
//add itemname Author:GAUR25JUL16
function showStockNoOfRows(documentRootPath, rowsPerPage, pageNum, upRowsPanel, nwOrPanel, custId)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadNextItemList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextItemListButt").style.visibility = "hidden";
        }
    };
    if (nwOrPanel == 'StockListByItems' || nwOrPanel == 'WholeSaleStockList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwastlt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&panel=" + nwOrPanel + "&stockUpdateRows=" + upRowsPanel + "&panelName=" + nwOrPanel, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwaprlt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&panel=" + nwOrPanel + "&stockUpdateRows=" + upRowsPanel + "&panelName=" + nwOrPanel, true);
    }
    xmlhttp.send();
}
//
function getStockCrystalFunc(crystalCount, div, commonPanel, documentRootPath, panelName) {

    //alert('UpdateItemPanel == ' + document.getElementById("UpdateItemPanel").value); 
    //alert('noOfCry == ' + document.getElementById("noOfCry").value);  
    //alert('crystalCount == ' + panelName);
    // Add Stock => Entry Update time, after stone weight less from GS WT @PRIYANKA-04APR18
    if (document.getElementById("UpdateItemPanel").value == 'UpdateItem') {
        cryCountGobal = crystalCount;
        if (crystalCount == 0 || crystalCount == '0') {
            cryCountGobal = crystalCount;
            crystalCount = '';
        }
    } else if (document.getElementById("UpdateItemPanel").value == 'PurCADJewelleryUpdate') {
        cryCountGobal = crystalCount;
        if (crystalCount == 0 || crystalCount == '0') {
            cryCountGobal = crystalCount;
            crystalCount = '';
        }
    } else {
        if (crystalCount == 0 || crystalCount == '0') {
            cryCountGobal = crystalCount;
            crystalCount = '';
        }
        cryCountGobal++;
    }
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (crystalCount == '') {
                noOfCrystal = 1;
                if (document.getElementById("noOfCry").value == '' || document.getElementById("noOfCry").value == '0') {
                    document.getElementById("noOfCry").value = noOfCrystal;
                }
                document.getElementById(div).innerHTML = xmlhttp.responseText;
            } else {
                noOfCrystal = crystalCount;
                document.getElementById(div + crystalCount).innerHTML = xmlhttp.responseText;
            }
            document.getElementById('totalCrystalCount').value = noOfCrystal;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    // START TO CODE CHECK CONDITION FOR CRYSTAL B2 FORM AT UPDATE STOCK PANEL @AUTHOR:MADHUREE-18APRIL2020
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    //
    if (commonPanel == 'RETAIL_CAD_STOCK' || commonPanel == 'RETAIL_CAD_STOCK_UPDATE') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwasmcycaddv" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel + "&panelName=" + panelName, true);
    } else if (panelName == 'PurCADJewelleryUpdate') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwacadcydv" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel + "&panelName=" + panelName, true);
    } else if (div === 'crystalAddSmallDiv' || div === 'crystalAddSmallDiv' + crystalCount) {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwasmcydv" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel + "&panelName=" + panelName, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwacydv" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel + "&panelName=" + panelName, true);
    }
    //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    // END TO CODE CHECK CONDITION FOR CRYSTAL B2 FORM AT UPDATE STOCK PANEL @AUTHOR:MADHUREE-18APRIL2020
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    //
    xmlhttp.send();
}
function closeStockCrystalFunc(cryCount, panelName, stprCryId, itstCryId, sttrId, wtId, wtTypeId, sellPanel, documentRootPath) {
    cryCountGobal--;
//    alert(sttrId);
//    autoLessWeight(cryCount, document.getElementById('sttr_wt_auto_less' + cryCount).checked, wtId, wtTypeId, 'deleteCry', sellPanel);
    document.getElementById("del" + cryCount).value = 'Deleted';
    document.getElementById("crystal" + cryCount).innerHTML = "";
    if (sttrId != '') {
        deleteStockCrystalDiv(stprCryId, itstCryId, sttrId, documentRootPath);
    }
    calcItemCryPrice();
    return false;
}
//
// START CODE TO RESET GLOBAL CRYSTAL COUNT @Author:PRIYANKA-22MAR18
function resetStockCrystalFunc() {
    cryCountGobal = 0;
}
// END CODE TO RESET GLOBAL CRYSTAL COUNT @Author:PRIYANKA-22MAR18
// 
// Start Code To Change ID & URL @Author:PRIYANKA-15JUN17
function deleteStockCrystalDiv(stprCryId, itstCryId, sttrId, documentRootPath) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("suppPurByItemSubDiv").innerHTML = xmlhttp2.responseText;
            closeMessDiv('messDisplayDiv', 'CRYSTAL DELETED');
        }
    };
    xmlhttp2.open("POST", documentRootPath + "/include/php/ogadcydl" + default_theme + ".php?itprCryId=" + stprCryId + "&itstCryId=" + itstCryId + "&sttrId=" + sttrId + "&panelName=AddWholeSaleStock", true);
    xmlhttp2.send();
}
// END Code To Change ID & URL @Author:PRIYANKA-15JUN17
function checkRawStockWeight(rawPreId, rawPostId, rawMetalType, rawMetalId, recWt, recWtType, panelName, rwSlStatus) {
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
function getItemInSellLotByCategory(itemCategory, keyCodeInput, metalType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('itemCategorySelectDiv').innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('itemCategoryListToSel').focus();
                document.getElementById('itemCategoryListToSel').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogspslis" + default_theme + ".php?itemCategory=" + itemCategory + "&metalType=" + metalType + "&panelDiv=wholeSale", true);
    xmlhttp.send();
}
function getItemDetInSellByCategory(itemCategory, mainPanel, custId) {
    var metalType = document.getElementById('addItemMetal').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemListDivToAddStock").innerHTML = xmlhttp.responseText;
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
                document.getElementById('itemListToAddItemSelect').focus();
                document.getElementById('itemListToAddItemSelect').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogspialt" + default_theme + ".php?metalType=" + metalType + "&itemCategory=" + itemCategory + "&mainPanel=" + mainPanel + "&custId=" + custId, true);
    xmlhttp.send();
}
function getWholesaleSellPanel(custId, panelName, sellPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("messageDisplayDiv").innerHTML = '';
            document.getElementById("slPrMainDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("sellPurchaseDiv").innerHTML = 'DAILY SELL PANEL';
            document.getElementById("addItemMetal").focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'DailyWholeSale') {
        xmlhttp.open("POST", "include/php/ogspdwsdv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName, true);
    } else {
        xmlhttp.open("POST", "include/php/ogspwisdv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName, true); //Filename Changed @OMMODTAG SHRI_03FEB16
    }
    xmlhttp.send();
}
function calculateWhSellLotPrice() {
//    alert('hi');
//alert(document.getElementById('slPrItemWtBy').value);
    if (document.getElementById('slPrItemWtBy').value == 'byNetWt') {
        var wt = document.getElementById('addItemNetWeight').value;
        var wtType = document.getElementById('addItemNetWeightType').value;
    } else if (document.getElementById('slPrItemWtBy').value == 'byGrossWt') {
        wt = document.getElementById('addItemGrossWeight').value;
        wtType = document.getElementById('addItemGrossWeightType').value;
    }
    var purWstg = document.getElementById('addItemWastage').value;
    if (purWstg == 'NaN' || purWstg == '')
        purWstg = 0;
//    alert('Tunch : '+document.getElementById('addItemTunch').value);
    if (document.getElementById('addItemTunch').value != 'NotSelected' || document.getElementById('addItemTunch').value != '') {
        document.getElementById('addItemFineWeight').value = parseFloat(parseFloat(((document.getElementById('addItemTunch').value)) * wt) / 100).toFixed(3);
        var wstg = parseFloat(document.getElementById('addItemTunch').value) + parseFloat(purWstg);
        document.getElementById('addItemFFineWeight').value = parseFloat((parseFloat(wstg) * wt) / 100).toFixed(3);
        document.getElementById('addItemCustWastage').value = parseFloat(document.getElementById('addItemTunch').value) + parseFloat(purWstg);
    }

    if (document.getElementById('addItemFineWeight').value == '' || document.getElementById('addItemFineWeight').value == 'NaN') {
        document.getElementById('addItemFineWeight').value = 0;
    }
    if (document.getElementById('addItemFFineWeight').value == '' || document.getElementById('addItemFFineWeight').value == 'NaN') {
        document.getElementById('addItemFFineWeight').value = 0;
    }
    if (document.getElementById('addItemCustWastage').value == '' || document.getElementById('addItemCustWastage').value == 'NaN') {
        document.getElementById('addItemCustWastage').value = 0;
    }
    var labCharges = document.getElementById('addItemCustCharges').value;
    var labChargesType = document.getElementById('addItemCustChargesType').value;
    var totalLabNOthCharges = 0;
    var itemsQTY = parseInt(document.getElementById('addItemPieces').value);
    var metalRate = parseFloat(document.getElementById('addItemMetalRate').value);
    var metalType = document.getElementById('addItemMetal').value;
    var ffnWt = document.getElementById('addItemFFineWeight').value;
    if (document.getElementById('addItemLabourChgsBy').value == 'lbByNetWt') {
        labChargesBy = parseFloat(document.getElementById('addItemNetWeight').value);
    } else if (document.getElementById('addItemLabourChgsBy').value == 'lbByGrossWt') {
        labChargesBy = parseFloat(document.getElementById('addItemGrossWeight').value);
    } else {
        var labChargesBy = ffnWt;
    }
    if (document.getElementById('addItemGrossWeight').value != '' && document.getElementById('addItemNetWeight').value != '') {
        if (labCharges != '') {
            if (labChargesType == 'KG') {
                if (wtType == 'KG')
                    totalLabNOthCharges = labCharges * labChargesBy;
                else if (wtType == 'GM')
                    totalLabNOthCharges = (labCharges / 1000) * labChargesBy;
                else
                    totalLabNOthCharges = (labCharges / (1000 * 1000)) * labChargesBy;
            } else if (labChargesType == 'GM') {
                if (wtType == 'KG')
                    totalLabNOthCharges = labCharges * 1000 * labChargesBy;
                else if (wtType == 'GM')
                    totalLabNOthCharges = labCharges * labChargesBy;
                else
                    totalLabNOthCharges = (labCharges / 1000) * labChargesBy;
            } else if (labChargesType == 'MG') {
                if (wtType == 'KG')
                    totalLabNOthCharges = labCharges * 1000 * 1000 * labChargesBy;
                else if (wtType == 'GM')
                    totalLabNOthCharges = labCharges * 1000 * labChargesBy;
                else
                    totalLabNOthCharges = labCharges * labChargesBy;
            } else if (labChargesType == 'PP') {
                totalLabNOthCharges = labCharges * itemsQTY;
            } else if (labChargesType == 'per') {
                var gsWt = document.getElementById('addItemGrossWeight').value;
                var gsWtTyp = document.getElementById('addItemGrossWeightType').value;
                var labNOthCharges = (labCharges * gsWt) / 100;
                if (metalType == 'Gold') {
                    if (gsWtTyp == 'KG') {
                        totalLabNOthCharges = Math_round((labNOthCharges * metalRate) * document.getElementById('gmWtInKg').value).toFixed(2);
                    } else if (gsWtTyp == 'GM') {
                        totalLabNOthCharges = Math_round((labNOthCharges * metalRate) / document.getElementById('gmWtInGm').value).toFixed(2);
                    } else if (gsWtTyp == 'MG') {
                        totalLabNOthCharges = Math_round((labNOthCharges * metalRate) / document.getElementById('gmWtInMg').value).toFixed(2);
                    }
                } else if (metalType == 'Silver') {
                    if (gsWtTyp == 'KG') {
                        totalLabNOthCharges = Math_round(labNOthCharges * metalRate * document.getElementById('srGmWtInKg').value).toFixed(2);
                    } else if (gsWtTyp == 'GM') {
                        totalLabNOthCharges = Math_round((labNOthCharges * metalRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
                    } else if (gsWtTyp == 'MG') {
                        totalLabNOthCharges = Math_round((labNOthCharges * metalRate) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                    }
                }
            }
        }
        document.getElementById('addItemLbNOthCh').value = Math_round(totalLabNOthCharges).toFixed(2);
        if (metalType == 'Gold') {
            if (wtType == 'KG') {
                document.getElementById('addItemNTWNMetRate').value = Math_round((ffnWt * metalRate) * document.getElementById('gmWtInKg').value).toFixed(2);
            } else if (wtType == 'GM') {
                document.getElementById('addItemNTWNMetRate').value = Math_round((ffnWt * metalRate) / document.getElementById('gmWtInGm').value).toFixed(2);
            } else if (wtType == 'MG') {
                document.getElementById('addItemNTWNMetRate').value = Math_round((ffnWt * metalRate) / document.getElementById('gmWtInMg').value).toFixed(2);
            }
        } else if (metalType == 'Silver') {
            if (wtType == 'KG') {
                document.getElementById('addItemNTWNMetRate').value = Math_round(ffnWt * metalRate * document.getElementById('srGmWtInKg').value).toFixed(2);
            } else if (wtType == 'GM') {
                document.getElementById('addItemNTWNMetRate').value = Math_round((ffnWt * metalRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
            } else if (wtType == 'MG') {
                document.getElementById('addItemNTWNMetRate').value = Math_round((ffnWt * metalRate) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
            }
        } else {
            document.getElementById('addItemNTWNMetRate').value = 0;
            document.getElementById('addItemValuation').value = 0;
            document.getElementById('addItemFinalVal').value = 0;
        }
        if (metalType == 'Gold' || metalType == 'Silver') {
            document.getElementById('addItemValuation').value = Math_round(parseFloat(document.getElementById('addItemNTWNMetRate').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
//            if (document.getElementById('valueAdd').value == 'false') {
//                document.getElementById('slPrItemValueAdded').value = Math_round(parseFloat(document.getElementById('addItemNTWNMetRate').value * parseFloat(itemPurity)) / 100).toFixed(2);
//            }
            //            document.getElementById('addItemFinalVal').value = Math_round(parseFloat(document.getElementById('addItemValuation').value) + parseFloat(document.getElementById('slPrItemValueAdded').value)).toFixed(2);
            document.getElementById('addItemFinalVal').value = Math_round(parseFloat(document.getElementById('addItemValuation').value)).toFixed(2);
        }
        if (document.getElementById('addItemVATTax').value != '') {
            document.getElementById('addItemTotTax').value = Math_round((parseFloat(document.getElementById('addItemValuation').value) * document.getElementById('addItemVATTax').value) / 100).toFixed(2);
            document.getElementById('addItemFinalVal').value = Math_round(parseFloat(document.getElementById('addItemValuation').value) + parseFloat(document.getElementById('addItemTotTax').value)).toFixed(2);
        }
        var totVal = document.getElementById('addItemFinalVal').value;
        if (document.getElementById('slPrCryFinVal').value != '') {
            document.getElementById('addItemFinalVal').value = Math_round(parseFloat(totVal) + parseFloat(document.getElementById('slPrCryFinVal').value)).toFixed(2);
        }
    }
    return false;
}
function calcWhSellCryPrice() {
    var crystalEntered = 0;
    var totalCryVal = 0;
    if (document.getElementById('panelName').value == 'SellDetUpPanel' || document.getElementById('panelName').value == 'SellPayUp') {
        getCrystalDiv = document.getElementById('noOfCry').value;
        var count = document.getElementById('slPrCrystalId').value;
        var delId = 'del' + count;
    } else {
        count = 1;
        delId = 'del' + 1;
    }

    for (var dc = count; getCrystalDiv != ''; dc++) {
        if (document.getElementById('del' + dc).value != 'Deleted') {
            var crystalQTY = parseInt(document.getElementById('slPrCryQty' + dc).value);
            var crystalGsWt = parseFloat(document.getElementById('slPrCryGSW' + dc).value);
            var crystalGsWtTyp = document.getElementById('slPrCryGSWType' + dc).value;
            var crystalRate = parseFloat(document.getElementById('slPrCryRate' + dc).value);
            var crystalRateType = document.getElementById('slPrCryRateType' + dc).value;
            var crystalVal = parseFloat(document.getElementById('slPrCryVal' + dc).value);
            var totalGSWTNRate = 0;
            if (crystalRateType == 'PP') {
                totalGSWTNRate = crystalRate * crystalQTY;
            } else {
                totalGSWTNRate = crystalRate * crystalGsWt;
            }
            document.getElementById('slPrCryVal' + dc).value = Math_round(totalGSWTNRate).toFixed(2);
            if (document.getElementById('slPrCryVal' + dc).value == 'NaN') {
                document.getElementById('slPrCryVal' + dc).value = 0;
            }
            totalCryVal += parseFloat(document.getElementById('slPrCryVal' + dc).value);
            document.getElementById('slPrCrystalValuation').value = Math_round(parseFloat(totalCryVal)).toFixed(2);
            document.getElementById('slPrCryFinVal').value = document.getElementById('slPrCrystalValuation').value;
            if (document.getElementById('slPrItemCryTax').value != '') {
                document.getElementById('slPrCrystalTotTax').value = Math_round(parseFloat((document.getElementById('slPrCrystalValuation').value * document.getElementById('slPrItemCryTax').value) / 100)).toFixed(2);
                document.getElementById('slPrCryFinVal').value = Math_round(parseFloat(document.getElementById('slPrCrystalValuation').value) + parseFloat(document.getElementById('slPrCrystalTotTax').value)).toFixed(2);
            }
            if (document.getElementById('slPrCryFinVal').value != '') {
                calculateWhSellLotPrice();
            }
        }
        if (document.getElementById(delId).value == 'Deleted') {
            document.getElementById('slPrCrystalValuation').value = '';
            document.getElementById('slPrItemCryTax').value = '';
            document.getElementById('slPrCrystalTotTax').value = '';
            document.getElementById('slPrCryFinVal').value = 0 + totalCryVal;
            calculateWhSellLotPrice();
        }
        crystalEntered++;
    }
    return false;
}
function closeWhCrystalFunc(cryCount, panelName, itprCryId, itstCryId, itprId, wtId, wtTypeId, sellPanel) {
//    alert('in close');
    autoLessWeight(cryCount, document.getElementById('slPrAutoLessCryWt' + cryCount).checked, wtId, wtTypeId, 'deleteCry', sellPanel);
    document.getElementById("del" + cryCount).value = 'Deleted';
    document.getElementById("crystal" + cryCount).innerHTML = "";
    if (itprCryId != '') {
        deleteCrystalDiv(itprCryId, itstCryId, itprId, panelName);
    }
//    alert('before')

    calcSellCryPrice();
    return false;
}

//deleteSellCrystalDiv

function deleteSellCrystalDiv(itprCryId, itstCryId, itprId, panelName) {
    loadXMLDoc2();
//    var documentRootPath = document.getElementById('documentRootPath').value;
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            if (panelName == 'UpdateUdhaar') {
//                document.getElementById("udhaarItemDiv" + udhaarItmCnt).innerHTML = "";
            } else {
                alert(xmlhttp2.responseText);
                document.getElementById("addStockCrystalDiv").innerHTML = xmlhttp2.responseText;
                closeMessDiv('messDisplayDiv', 'CRYSTAL DELETED');
            }
        }
    };
//    xmlhttp2.open("POST", "include/php/ogslcydv"+ default_theme +".php?itprCryId=" + itprCryId + "&itstCryId=" + itstCryId + "&itprId=" + itprId + "&panelName=" + panelName, true);
    xmlhttp2.open("POST", "include/php/ogadcydl" + default_theme + ".php?itprCryId=" + itprCryId + "&itstCryId=" + itstCryId + "&itprId=" + itprId + "&panelName=" + panelName, true);
    xmlhttp2.send();
}

function getWhSellLotItemDetails() {
    loadXMLDoc2();
    var ntWeight = document.getElementById("addItemNetWeight").value;
    var ntWeighTyp = document.getElementById("addItemNetWeightType").value;
    var metalType = document.getElementById("addItemMetal").value;
    var itemName = document.getElementById("addItemName").value;
    var preId = document.getElementById("srchItemId").value;
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            var str = xmlhttp2.responseText;
            var strArray = new Array();
            strArray = str.split("*");
            if (str == 'EXCEEDS' || strArray[14] == 'EXCEEDS') {
                document.getElementById('addItemId').value = '0';
                document.getElementById("itstId").value = '';
                alert("Net weight exceeding available weight !\n Please enter correct weight !");
                return false;
            } else if (str == 'noItem') {
            } else if (str == 'FAIL') {
                document.getElementById('addItemId').value = '0';
//            confirm_box = confirm("No such stock is available\nDo you really want to continue ?");
//            if (confirm_box == true) {
//               return false;
//            } else {
                //               document.getElementById("addItemGrossWeight").value = '';
                //               document.getElementById("addItemNetWeight").value = '';
                document.getElementById("addItemGrossWeight").focus();
                return false;
//            }
                //             alert('No Such Stock is available'); //@Author:SHE06NOV15
            } else {
                document.getElementById('addItemId').value = strArray[0];
                document.getElementById('addItemName').value = strArray[1];
                document.getElementById('addItemCategory').value = strArray[2];
                document.getElementById('addItemPieces').value = strArray[3];
                document.getElementById('addItemFineWeight').value = strArray[4];
                document.getElementById('addItemTunch').value = strArray[5];
                document.getElementById('addItemCustCharges').value = strArray[6];
                document.getElementById('addItemCustChargesType').value = strArray[7];
                document.getElementById('addItemValuation').value = strArray[8];
                document.getElementById('addItemVATTax').value = strArray[9];
                document.getElementById('addItemMetal').value = strArray[10];
                document.getElementById('addItemPreId').value = strArray[11];
                document.getElementById("addItemWastage").value = strArray[12];
                document.getElementById("addItemFFineWeight").value = strArray[13];
                if (strArray[14] != undefined && strArray[14] != 'SUCCESS' && strArray[14] != 'EXCEEDS') {
                    document.getElementById("itstId").value = strArray[14];
                }
                document.getElementById("itemAvailStatus").value = 'YES';
                calculateSellLotPrice();
                return true;
            }
        }
    };
    xmlhttp2.open("POST", "include/php/ogspwhic" + default_theme + ".php?netWeight=" + ntWeight + "&netWeighTyp=" + ntWeighTyp + "&metalType=" + metalType + "&itemName=" + itemName
            + "&preId=" + preId + "&panel=" + panel, true);
    xmlhttp2.send();
}
function deleteWhSellItem(custId, slPrId, panelName, panel) {
    var addToStock = 'no';
    if (mainPanel == 'SellItemReturn' && panelName == 'ItemReturn') {
        confirm_box = confirm("Do you really want to Return this Item?");
    } else if (mainPanel == 'SellItemReturn' && panelName == 'ItemActive') {
        confirm_box = confirm("Do you really want to Reactive this Item?");
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
    }

    if (confirm_box == true) {
        stock_add_confirm = confirm(addItemAlertMess + "\n\nDo you want to add this item in stock?");
        if (stock_add_confirm == true) {
            addToStock = 'yes';
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'soldOutListDel') {
                    document.getElementById("sellMainDiv").innerHTML = xmlhttp.responseText;
                    window.setTimeout(sellFunctionToCloseDiv, 1000);
                } else if (mainPanel == 'SlPrPayment' && panelName == 'SlPrPayment') {
                    document.getElementById("paymentDiv").innerHTML = xmlhttp.responseText;
                    window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                } else if (mainPanel == 'SlPrPayment' && panelName == '') {
                    document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                    window.setTimeout(sellFunctionToCloseDiv, 1000);
                } else {
                    document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                    window.setTimeout(sellFunctionToCloseDiv, 1000);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogspitdl" + default_theme + ".php?custId=" + custId + "&slPrId=" + slPrId + "&panelName=" + panelName + "&mainPanel=" + panel + "&slPrInfo=" + panel + "&stockAdd=" + addToStock, true);
        xmlhttp.send();
    }
}
// START CODE FOR METAL RECEIVED DIV - MULTIPLE DIV DELETE VALUATION NOT CHANGE ISSUE @PRIYANKA-21JUNE18
function calcSellStockItemBalance() {

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

        if (document.getElementById('metalPanel').value == 'SlPrPayment' && document.getElementById('metalPanel').value == 'PaymentSaved') {
            if (document.getElementById('rawId').value != '') {
                count = document.getElementById('rawId').value;
            } else {
                count = 1;
            }
            if (document.getElementById('noOfRawMet').value != 0) {
                getMetalDiv = document.getElementById('noOfRawMet').value;
            }

        } else {
            count = 1;
        }
        delId = 'del' + count;
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
    var goldWeight = 0;
    var silverWeight = 0;
    var silverWeightType = '';
    var goldWeightType = '';
    GoldWtType = '';
    SilverWtType = '';
    goldWtBal = 0;
    silverWtBal = 0;
    stockDiv = 'wholeSaleStock';
    for (var dc = count; getMetalDiv != ''; dc++) {
        if (document.getElementById('metalDel' + dc).value != 'Deleted') {
            var payTotalWeight1 = document.getElementById('sttr_nt_weight' + dc).value;
            var payTotalWeightType1 = document.getElementById('sttr_nt_weight_type' + dc).value;
            var payMetalRate1 = document.getElementById('sttr_metal_rate' + dc).value;
            var payMetalTunch1 = document.getElementById('sttr_purity' + dc).value;
            var metalWeight = (payTotalWeight1 * payMetalTunch1) / 100;
            if (document.getElementById('metalPanel').value == 'SlPrPayment' && document.getElementById('sttr_metal_trans' + dc).checked) {
                var newFfnWt = document.getElementById('sttr_gs_weight' + dc).value * document.getElementById('sttr_purity' + dc).value / 100;
                metalWeight = (newFfnWt / 99.5) * 100;
                if (metalWeight != '' && metalWeight != 'NaN') {
                    document.getElementById('sttr_final_fine_weight' + dc).value = parseFloat(metalWeight).toFixed(3);
                    document.getElementById('sttr_fine_weight' + dc).value = parseFloat(metalWeight).toFixed(3);
                }
            } else
                document.getElementById('sttr_fine_weight' + dc).value = parseFloat(metalWeight).toFixed(3);
            if (document.getElementById('sttr_metal_type' + dc).value == 'Gold' || document.getElementById('sttr_metal_type' + dc).value == 'Alloy') {

                goldWeight = parseFloat(metalWeight);
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById('sttr_valuation' + dc).value = ((goldWeight * payMetalRate1) * document.getElementById('gmWtInKg').value).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById('sttr_valuation' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById('sttr_valuation' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInMg').value).toFixed(2);
                }

                if (document.getElementById('sttr_metal_type' + dc).value == 'Gold') {
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
                            goldWeight = parseFloat(goldWeight / 1000).toFixed(3);
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

                    document.getElementById('PayMetal1Bal' + dc).value = gdBal;
                    document.getElementById('PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                    goldWtBal = parseFloat(gdBal).toFixed(3);
                    GoldWtType = payMetalDueWeightType1;
                    totRecGd += parseFloat(goldWeight);
                    //totGoldAmt += parseFloat(document.getElementById('sttr_valuation' + dc).value);
                    //document.getElementById(prefix + 'PayTotGoldAmtRec').value = parseFloat(totGoldAmt).toFixed(2);
                }
            }

            if (document.getElementById('sttr_metal_type' + dc).value == 'Silver') {

                silverWeight = parseFloat(metalWeight);
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById('sttr_valuation' + dc).value = ((silverWeight * payMetalRate1 * document.getElementById('srGmWtInKg').value)).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById('sttr_valuation' + dc).value = ((silverWeight * payMetalRate1) / document.getElementById('srGmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById('sttr_valuation' + dc).value = ((silverWeight * payMetalRate1) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
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

                document.getElementById('PayMetal1Bal' + dc).value = parseFloat(slBal).toFixed(3);
                document.getElementById('PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
                    document.getElementById(prefix + 'PaySilverWtBal').value = parseFloat(Math.abs(slBal)).toFixed(3);
                    document.getElementById(prefix + 'PaySilverWtBalType').value = payMetalDueWeightType1;
                    if ((document.getElementById('metalPanel').value != 'RawPayUp' && document.getElementById('metalPanel').value != 'InvoicePayUp' && document.getElementById('metalPanel').value != 'SellPayUp' && document.getElementById('metalPanel').value != 'NwOrPayUp') && document.getElementById('paymentMode').value == 'RateCut') { //add panel for order panel prev balance :Author:SANT01DEC16
                        document.getElementById(prefix + 'SilverRtCtWtBal').value = parseFloat(Math.abs(slBal)).toFixed(3);
                        document.getElementById(prefix + 'SilverRtCtWtBalType').value = payMetalDueWeightType1;
                        document.getElementById('metal2RtCtWtBal').value = parseFloat(Math.abs(slBal)).toFixed(3) + '' + payMetalDueWeightType1; //Add Value this variable:Author:SANT24OCT16
                    }
                }

                if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
                    document.getElementById(prefix + 'SilverWtFinBal').value = parseFloat(Math.abs(slBal)).toFixed(3);
                    document.getElementById(prefix + 'SilverWtFinBalType').value = payMetalDueWeightType1;
                }

                silverWtBal = parseFloat(slBal).toFixed(3);
                SilverWtType = payMetalDueWeightType1;
                totRecSl += parseFloat(silverWeight);
                silverPurRemWt = parseFloat(parseFloat(slBal) - parseFloat(document.getElementById(prefix + 'SilverWtPrevBal').value)).toFixed(3);
                //totSilverAmt += parseFloat(document.getElementById('sttr_valuation' + dc).value);
                //document.getElementById(prefix + 'PayTotSilverAmtRec').value = parseFloat(totSilverAmt).toFixed(2);
                //alert('totSilverAmt == ' + totSilverAmt);
            }

            if (document.getElementById(prefix + 'GoldTotFineWt').value != '' && goldWtBal == 0) {
                goldWtBal = parseFloat(document.getElementById(prefix + 'GoldTotFineWt').value);
                GoldWtType = document.getElementById(prefix + 'GoldTotFineWtType').value;
            }

            if (document.getElementById(prefix + 'SilverTotFineWt').value != '' && silverWtBal == 0) {
                silverWtBal = parseFloat(document.getElementById(prefix + 'SilverTotFineWt').value);
                SilverWtType = document.getElementById(prefix + 'SilverTotFineWtType').value;
            }

            document.getElementById(prefix + 'GoldWtRecBal').value = parseFloat(totRecGd).toFixed(3);
            document.getElementById(prefix + 'GoldWtRecBalType').value = goldWeightType;
            document.getElementById(prefix + 'SilverWtRecBal').value = parseFloat(totRecSl).toFixed(3);
            document.getElementById(prefix + 'SilverWtRecBalType').value = silverWeightType;
            if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
                document.getElementById(prefix + 'GoldAvgRate').value = parseFloat((((parseFloat(document.getElementById(prefix + 'GoldPrevRate').value) * parseFloat(document.getElementById(prefix + 'GoldWtPrevBal').value) / 100) + (parseFloat(document.getElementById(prefix + 'GoldPurRate').value) * parseFloat(goldPurRemWt)) / 100) / parseFloat(parseFloat(document.getElementById(prefix + 'GoldWtPrevBal').value) / 10 + parseFloat(goldPurRemWt) / 10)) * 10).toFixed(2);
                document.getElementById(prefix + 'SilverAvgRate').value = parseFloat((((parseFloat(document.getElementById(prefix + 'SilverPrevRate').value) * parseFloat(document.getElementById(prefix + 'SilverWtPrevBal').value) / 100) + (parseFloat(document.getElementById(prefix + 'SilverPurRate').value) * parseFloat(silverPurRemWt)) / 100) / parseFloat(parseFloat(document.getElementById(prefix + 'SilverWtPrevBal').value) / 10 + parseFloat(silverPurRemWt) / 10)) * 10).toFixed(2);
                if (document.getElementById(prefix + 'GoldAvgRate').value == 'NaN') {
                    document.getElementById(prefix + 'GoldAvgRate').value = document.getElementById(prefix + 'GoldPurRate').value;
                }
                if (document.getElementById(prefix + 'SilverAvgRate').value == 'NaN') {
                    document.getElementById(prefix + 'SilverAvgRate').value = document.getElementById(prefix + 'SilverPurRate').value;
                }
                document.getElementById('metal1WtRecBal').value = parseFloat(totRecGd).toFixed(3) + ' ' + goldWeightType;
                document.getElementById('metal2WtRecBal').value = parseFloat(totRecSl).toFixed(3) + ' ' + silverWeightType;
            }

            if (document.getElementById('sttr_valuation' + dc).value == '') {
                document.getElementById('sttr_valuation' + dc).value = 0;
            }

            totAmtRec += parseFloat(document.getElementById('sttr_valuation' + dc).value);
            //alert('paymentMode ==' + document.getElementById('paymentMode').value);

            if (document.getElementById('paymentMode').value == 'ByCash') {
                document.getElementById(prefix + 'PayTotAmtRec').value = Math_round(parseFloat(totAmtRec)).toFixed(2);
                document.getElementById(prefix + 'PayTotAmtRecDisp').value = Math_round(parseFloat(totAmtRec)).toFixed(2); // METAL RECEIVED-PRIYANKA-19MAR18	
                document.getElementById(prefix + 'PayTotAmtExchangeDisp').value = Math_round(parseFloat(totAmtRec)).toFixed(2); // METAL EXCHANGE-PRIYANKA-19MAR18
                //alert('PayTotAmtExchangeDisp == ' + document.getElementById(prefix + 'PayTotAmtExchangeDisp').value);
                //alert('totAmtRec == ' + totAmtRec);
            }

            if (document.getElementById('paymentMode').value == 'RateCut') {
                if (document.getElementById('utin_metal_exchange_chk').checked) {
                    document.getElementById(prefix + 'PayTotAmtRec').value = Math_round(parseFloat(totAmtRec)).toFixed(2);
                    document.getElementById(prefix + 'PayTotAmtRecDisp').value = Math_round(parseFloat(totAmtRec)).toFixed(2); // METAL RECEIVED-PRIYANKA-19MAR18	
                    document.getElementById(prefix + 'PayTotAmtExchangeDisp').value = Math_round(parseFloat(totAmtRec)).toFixed(2); // METAL EXCHANGE-PRIYANKA-19MAR18
                }
            }

            if (document.getElementById('paymentMode').value == 'RateCut' ||
                    document.getElementById('paymentMode').value == 'NoRateCut') {
                calcWholeSaleRateCut(prefix);
                calcRawMetStock(prefix);
            }
            calcPaymentCashBalance(prefix);
        }
        metalEntered++;
    }
    return false;
}
// END CODE FOR METAL RECEIVED DIV - MULTIPLE DIV DELETE VALUATION NOT CHANGE ISSUE @PRIYANKA-21JUNE18
function calcSellRawMetStock(prefix) {
    if (document.getElementById(prefix + 'GoldWtPrevBal1').value != '' || document.getElementById(prefix + 'Metal1WtPurBal1').value != '' || document.getElementById(prefix + 'Metal1WtRecBal1').value != '') {
        if (document.getElementById(prefix + 'GoldWtPrevBal1').value == '' || document.getElementById(prefix + 'GoldWtPrevBal1').value == 'NaN') {
            document.getElementById(prefix + 'GoldWtPrevBal1').value = 0;
        }
        if (document.getElementById(prefix + 'Metal1WtPurBal1').value == '' || document.getElementById(prefix + 'Metal1WtPurBal1').value == 'NaN') {
            document.getElementById(prefix + 'Metal1WtPurBal1').value = 0;
        }
        if (document.getElementById(prefix + 'Metal1WtRecBal1').value == '' || document.getElementById(prefix + 'Metal1WtRecBal1').value == 'NaN') {
            document.getElementById(prefix + 'Metal1WtRecBal1').value = 0;
        }
        if (document.getElementById('paymentMode').value == 'RateCut') {
            if (document.getElementById('metal1RtCtWt').value == '' || document.getElementById('metal1RtCtWt').value == 'NaN') {
                document.getElementById('metal1RtCtWt').value = 0;
            }
            var totFinGdWtBal = parseFloat(document.getElementById(prefix + 'GoldWtPrevBal1').value) + parseFloat(document.getElementById(prefix + 'Metal1WtPurBal1').value) - parseFloat(document.getElementById(prefix + 'Metal1WtRecBal1').value) - parseFloat(document.getElementById(prefix + 'Metal1RtCtWtBal').value);
        } else {
            var totFinGdWtBal = parseFloat(document.getElementById(prefix + 'GoldWtPrevBal1').value) + parseFloat(document.getElementById(prefix + 'Metal1WtPurBal1').value) - parseFloat(document.getElementById(prefix + 'Metal1WtRecBal1').value);
        }
        if (document.getElementById('paymentMode').value != 'RateCut') {
            document.getElementById(prefix + 'Metal1WtFinBal').value = parseFloat(totFinGdWtBal).toFixed(3) + ' ' + document.getElementById(prefix + 'Metal1WtPurBal1Type').value;
        } else {
            document.getElementById(prefix + 'Metal1WtFinBal').value = 0.00;
        }
        document.getElementById(prefix + 'Metal1WtFinBal1').value = parseFloat(totFinGdWtBal).toFixed(3);
        document.getElementById(prefix + 'Metal1WtFinBal1Typ').value = document.getElementById(prefix + 'Metal1WtPurBal1Type').value;
        if (document.getElementById('paymentMode').value == 'RateCut') {
            var payTotalWeightType1 = document.getElementById('metal1RtCtWtType').value;
            var goldWeight = document.getElementById('metal1RtCtWt').value;
            var payMetalRate1 = document.getElementById('metal1Rate').value;
            if (payTotalWeightType1 == 'KG') {
                document.getElementById('metal1Valuation').value = Math_round((goldWeight * payMetalRate1 * document.getElementById('gmWtInKg').value));
            } else if (payTotalWeightType1 == 'GM') {
                document.getElementById('metal1Valuation').value = Math_round((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value);
            } else if (payTotalWeightType1 == 'MG') {
                document.getElementById('metal1Valuation').value = Math_round((goldWeight * payMetalRate1) / (document.getElementById('gmWtInMg').value));
            }
        }
    }
    if (document.getElementById(prefix + 'SilverWtPrevBal1').value != '' || document.getElementById(prefix + 'Metal2WtPurBal1').value != '' || document.getElementById(prefix + 'Metal2WtRecBal1').value != '') {
        if (document.getElementById(prefix + 'SilverWtPrevBal1').value == '' || document.getElementById(prefix + 'SilverWtPrevBal1').value == 'NaN') {
            document.getElementById(prefix + 'SilverWtPrevBal1').value = 0;
        }
        if (document.getElementById(prefix + 'Metal2WtPurBal1').value == '' || document.getElementById(prefix + 'Metal2WtPurBal1').value == 'NaN') {
            document.getElementById(prefix + 'Metal2WtPurBal1').value = 0;
        }
        if (document.getElementById(prefix + 'Metal2WtRecBal1').value == '' || document.getElementById(prefix + 'Metal2WtRecBal1').value == 'NaN') {
            document.getElementById(prefix + 'Metal2WtRecBal1').value = 0;
        }
        if (document.getElementById('paymentMode').value == 'RateCut') {
            if (document.getElementById('metal2RtCtWt').value == '' || document.getElementById('metal2RtCtWt').value == 'NaN') {
                document.getElementById('metal2RtCtWt').value = 0;
            }

            var totFinSrWtBal = parseFloat(document.getElementById(prefix + 'SilverWtPrevBal1').value) + parseFloat(document.getElementById(prefix + 'Metal2WtPurBal1').value) - parseFloat(document.getElementById(prefix + 'Metal2WtRecBal1').value) - parseFloat(document.getElementById(prefix + 'Metal2RtCtWtBal').value);
        } else {
            var totFinSrWtBal = parseFloat(document.getElementById(prefix + 'SilverWtPrevBal1').value) + parseFloat(document.getElementById(prefix + 'Metal2WtPurBal1').value) - parseFloat(document.getElementById(prefix + 'Metal2WtRecBal1').value);
        }
        document.getElementById(prefix + 'Metal2WtFinBal').value = parseFloat(totFinSrWtBal).toFixed(3) + ' ' + document.getElementById(prefix + 'Metal2WtPurBal1Type').value;
        document.getElementById(prefix + 'Metal2WtFinBal1').value = parseFloat(totFinSrWtBal).toFixed(3);
        document.getElementById(prefix + 'Metal2WtFinBal1Typ').value = document.getElementById(prefix + 'Metal2WtPurBal1Type').value;
        if (document.getElementById('paymentMode').value == 'RateCut') {
            var payTotalWeightType2 = document.getElementById('metal2RtCtWtType').value;
            var silverWeight = document.getElementById('metal2RtCtWt').value;
            var payMetalRate2 = document.getElementById('metal2Rate').value;
            if (payTotalWeightType2 == 'KG') {
                document.getElementById('metal2Valuation').value = Math_round((silverWeight * payMetalRate2 * document.getElementById('srGmWtInKg').value));
            } else if (payTotalWeightType2 == 'GM') {
                document.getElementById('metal2Valuation').value = Math_round((silverWeight * payMetalRate2) / document.getElementById('srGmWtInGm').value);
            } else if (payTotalWeightType2 == 'MG') {
                document.getElementById('metal2Valuation').value = Math_round((silverWeight * payMetalRate2) / (document.getElementById('srGmWtInMg').value));
            }
        }
    }
    if (document.getElementById('paymentMode').value == 'RateCut') {
        if (document.getElementById('metal1Valuation').value == '') {
            document.getElementById('metal1Valuation').value = 0;
        }
        if (document.getElementById('metal2Valuation').value == '') {
            document.getElementById('metal2Valuation').value = 0;
        }
        if (document.getElementById('payPanelName').value != 'SellItemReturn' || document.getElementById('payPanelName').value != 'SellItemReturnUp') {
            document.getElementById(prefix + 'PayTotAmtBalDisp').value = Math_round(parseFloat(document.getElementById('metal1Valuation').value) + parseFloat(document.getElementById('metal2Valuation').value)).toFixed(2);
        }
        document.getElementById(prefix + 'PayTotAmtRec').value = Math_round(parseFloat(document.getElementById('metal1Valuation').value) + parseFloat(document.getElementById('metal2Valuation').value)).toFixed(2);
    }
}
function searchWhSellItemNames(itemCategory, metalType, divNum, slPrItemPreId, slPrItemPostId, keyCodeInput) {
    keyCodeForItemNames = keyCodeInput;
    divNumForItemNames = divNum;
    panelNameForItemNames = divNum;
    //document.getElementById("ajaxLoadGetItemListDiv").style.visibility = "visible";

    var poststr = "itemCategory=" + encodeURIComponent(itemCategory)
            + "&metalType=" + encodeURIComponent(metalType)
            + "&slPrItemPreId=" + encodeURIComponent(slPrItemPreId)
            + "&slPrItemPostId=" + encodeURIComponent(slPrItemPostId)
            + "&divNum=" + encodeURIComponent(divNum);
    search_item_names('include/php/omiladgv_1' + default_theme + '.php', poststr);
}
function getSellDetByItemName(itemName, itemCategory, mainPanel) {
    var metalType = document.getElementById('slPrItemMetal').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            var strArray = new Array();
            strArray = str.split("*");
//            alert('Charges Typ :'+strArray[11]);
            document.getElementById('slPrItemPieces').value = Math.abs(strArray[2]);
            document.getElementById('slPrItemGSW').value = '';
            document.getElementById('slPrItemNTW').value = '';
            document.getElementById('slPrItemFineWeight').value = Math.abs(strArray[7]);
            document.getElementById('slPrItemTunch').value = Math.abs(strArray[8]);
            document.getElementById('addItemNTWNMetRate').value = Math.abs(strArray[9]);
            document.getElementById('slPrItemLabCharges').value = Math.abs(strArray[10]);
            document.getElementById('slPrItemLabChargesType').value = (strArray[11]);
            document.getElementById('slPrItemVATTax').value = Math.abs(strArray[12]);
            document.getElementById('slPrItemWastage').value = Math.abs(strArray[14]);
            document.getElementById('slPrItemFFineWeight').value = Math.abs(strArray[15]);
            calculateSellPrice();
        }
    };
//    alert(metalType);     
    xmlhttp.open("POST", "include/php/ogspiapd" + default_theme + ".php?metalType=" + metalType + "&itemCategory=" + itemCategory + "&itemName=" + itemName + "&mainPanel=" + mainPanel + "&custId=" + custId, true);
    xmlhttp.send();
}
//
// START CODE FOR ADD NEW METAL REC/PAID ENTRY - MAIN ENTRY UPDATE TIME - NEW FUNCTIONALITY @PRIYANKA-18MAR2019 
var delRawString = '';
function closeStockRawMetalDiv(metalCnt, panelName) {
    //
    //alert('metalCnt == ' + metalCnt);
    //alert('panelName == ' + panelName);
    //
    delRawString = delRawString + metalCnt;
    metalPanel = panelName;
    var metmin = metalCnt - 1;
    var d = metalCnt - 1;
    var a = d - 1;
    //
    //alert('metmin == ' + metmin);
    //
    document.getElementById("metalDel" + metalCnt).value = 'Deleted';
    //
    if ((a == metmin || d == metmin) && metmin != 0) {
        if (document.getElementById("metalDel" + metmin).value != 'Deleted') {
            document.getElementById("metalDiv" + metmin).value = 'true';
        }
    }
    //
    if (metmin == 0) {
        document.getElementById("metalDiv" + metalCnt).value = 'true';
    }
    //
    document.getElementById("rawMetalDiv" + metalCnt).innerHTML = "";
    //
    document.getElementById('noOfRawMet').value = metmin;
    document.getElementById('metalCount').value = metmin;
    //
    if (panelName == 'SlPrPayment')
        calcSellStockItemBalance();
    else if (panelName == 'Estimate')
        calcEstimateStockItemBalance();
    else
        calcStockItemBalance();
    //
}
// END CODE FOR ADD NEW METAL REC/PAID ENTRY - MAIN ENTRY UPDATE TIME - NEW FUNCTIONALITY @PRIYANKA-18MAR2019 
//
function printSellItemListPanel(obj) {
    var DocumentContainer = document.getElementById(obj);
    var head;
    head = document.getElementById("sellItemListPanelTrId");
    head.style.position = "relative";
    head.style.top = "0px"
    head.style.visibility = "visible"; //visible added @Author:PRIYA28MAY14

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
            '<div id="slPrSellItemListDiv">' +
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
var stockMetalType = null;
function changeWhStockItemId(selectedMetalType, panelName) {
    var poststr = "metalType=" + encodeURIComponent(selectedMetalType)
            + "&panelName=" + encodeURIComponent(panelName);
    stockMetalType = selectedMetalType;
    change_wh_stock_item_id('include/php/ogiaiddv' + default_theme + '.php', poststr);
    return false;
}
function change_wh_stock_item_id(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertChangeWhStockItemId;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertChangeWhStockItemId() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (addstockDiv == 'AddStockPanel' || addstockDiv == 'AddWhStockPanel') {
            var str = xmlhttp.responseText;
            var strValue = new Array();
            strValue = str.split("*");
            document.getElementById("addItemPreId").value = strValue[0].trim(); //trim added @OMMODTAG SHRI_12JAN16
            document.getElementById("addItemId").value = strValue[1];
            //            document.getElementById("addItemPreId").focus();
            changeStockAccount(stockMetalType);
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function changeStockAccount(metalType) {
//    alert(metalType);
    var panelName = 'AddWhStock';
    var poststr = "firmNo=" + encodeURIComponent(document.getElementById('firmId').value) +
            "&panelName=" + encodeURIComponent(panelName) +
            "&metalType=" + encodeURIComponent(metalType);
    change_stock_account('include/php/ommpfacc' + default_theme + '.php', poststr);
}
function change_stock_account(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertChangeStockAccount;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertChangeStockAccount() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("selAccountDiv").innerHTML = xmlhttp.responseText;
        document.getElementById('addItemPreId').focus();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//
//
function calStockItemPrice() {
    //
    if (document.getElementById('sttr_final_val_by').value == 'byGrossWt') {
        var wt = document.getElementById('sttr_gs_weight').value;
        var wtType = document.getElementById('sttr_gs_weight_type').value;
    } else if (document.getElementById('sttr_final_val_by').value == 'byNetWt') {
        var wt = document.getElementById('sttr_nt_weight').value;
        var wtType = document.getElementById('sttr_nt_weight_type').value;
    } else {
        var wt = document.getElementById('sttr_nt_weight').value;
        var wtType = document.getElementById('sttr_nt_weight_type').value;
    }
    //
    if (wt == '' || wt == null || wt == 'NaN') {
        wt = 0;
    }
    var addHallamrkChargOnSilverItem = document.getElementById('addHallamrkChargOnSilverItem').value;
    //
    if (document.getElementById('sttr_purity').value != 'NotSelected' || document.getElementById('sttr_purity').value != '') {
        document.getElementById('sttr_fine_weight').value = parseFloat((document.getElementById('sttr_purity').value * parseFloat(wt)) / 100).toFixed(4);
    }
    //
    if (document.getElementById('sttr_fine_weight').value == '' || document.getElementById('sttr_fine_weight').value == 'NaN') {
        document.getElementById('sttr_fine_weight').value = 0;
    }
    //
    if (document.getElementById('sttr_final_purity').value != '') {
        //
        document.getElementById('sttr_final_fine_weight').value = parseFloat((document.getElementById('sttr_final_purity').value * parseFloat(wt)) / 100).toFixed(4);
        if (document.getElementById('itemReadyorderlist') != null) {
            calculateWastageWtPurchase();
        }
        //
        //alert('sttr_final_fine_weight == ' + document.getElementById('sttr_final_fine_weight').value);
        //
    }
    //    
    //
    //
    // ================================================================================================================== //
    // START CODE TO CALCULATE AND ADD MAKING CHARGES WT IN NET WT IF MKG IN WT OPTION IS ON @AUTHOR:MADHUREE-07JULY20201 //
    // ================================================================================================================== //
    //
    //
    var lbrCharges = document.getElementById('sttr_lab_charges').value;
    var lbrChargesType = document.getElementById('sttr_lab_charges_type').value;
    var totalLabourWt = 0;
    if (document.getElementById('sttr_other_charges_by').value == 'lbInWt') {
        totalLabourWt = convertWeight(lbrCharges, document.getElementById('sttr_nt_weight_type').value, lbrChargesType);
        document.getElementById('sttr_final_fine_weight').value = parseFloat(parseFloat(document.getElementById('sttr_final_fine_weight').value) - parseFloat(totalLabourWt)).toFixed(4);
    }
    //
    // ================================================================================================================ //
    // END CODE TO CALCULATE AND ADD MAKING CHARGES WT IN NET WT IF MKG IN WT OPTION IS ON @AUTHOR:MADHUREE-07JULY20201 //
    // ================================================================================================================ //
    //
    var finalFineWeight = parseFloat(document.getElementById('sttr_final_fine_weight').value);
    //
    var itemsQTY = (document.getElementById('sttr_quantity').value);
    if (itemsQTY == '' || itemsQTY == null || itemsQTY == 'NaN') {
        itemsQTY = 0;
    }
    //
    //
    //alert('sttr_metal_rate == ' + document.getElementById('sttr_metal_rate').value);
    //
    //var metalRate = parseFloat(document.getElementById('metalRateCalculation').value); //change metal rate id for tax in metal rate @Author:SHRI29FEB16
    //
    //alert('metalRate == ' + metalRate);
    //
    //
    //
    // METAL RATE @PRIYANKA-20DEC2021
    var metalRate = parseFloat(document.getElementById('sttr_metal_rate').value);
    //
    // METAL TYPE @PRIYANKA-20DEC2021
    var metalType = document.getElementById('sttr_metal_type').value;
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
    if (document.getElementById('checkarateonegm').value == 'true') {
        document.getElementById('gmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
        document.getElementById('gmWtInGm').value = parseFloat(1).toFixed(2);
        document.getElementById('gmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
    } else {
        //
        // FOR METAL RATE @PRIYANKA-20DEC2021
        if ((metal_Rate_Int_Val_Length == 2 || metal_Rate_Int_Val_Length == 3 || metal_Rate_Int_Val_Length == 4) &&
                (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold')) {
            //
            // FOR GOLD METAL RATE PER GM @PRIYANKA-20DEC2021
            document.getElementById('gmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
            document.getElementById('gmWtInGm').value = parseFloat(1).toFixed(2);
            document.getElementById('gmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
            //
            //alert('gmWtInGm #== ' + document.getElementById('gmWtInGm').value);
            //
        } else if ((metal_Rate_Int_Val_Length == 5 || metal_Rate_Int_Val_Length == 6) &&
                (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold')) {
            //
            // FOR GOLD METAL RATE PER 10 GM @PRIYANKA-20DEC2021
            document.getElementById('gmWtInKg').value = parseFloat(1000 / 10).toFixed(2);
            document.getElementById('gmWtInGm').value = parseFloat(10).toFixed(2);
            document.getElementById('gmWtInMg').value = parseFloat(1000 * 10).toFixed(2);
            //
            //
        } else if ((metal_Rate_Int_Val_Length == 5 || metal_Rate_Int_Val_Length == 6) &&
                (metalType == 'Silver' || metalType == 'SILVER' || metalType == 'silver')) {
            //
            // FOR SILVER METAL RATE PER KG @PRIYANKA-20DEC2021
            document.getElementById('srGmWtInKg').value = parseFloat(1).toFixed(2);
            document.getElementById('srGmWtInGm').value = parseFloat(1000 * 1).toFixed(2);
            document.getElementById('srGmWtInMg').value = parseFloat((1000 * 1000) * 1).toFixed(2);
            //
            //
        } else if ((metal_Rate_Int_Val_Length == 2 || metal_Rate_Int_Val_Length == 3 || metal_Rate_Int_Val_Length == 4) &&
                (metalType == 'Silver' || metalType == 'SILVER' || metalType == 'silver')) {
            //
            // FOR SILVER METAL RATE PER GM @PRIYANKA-20DEC2021
            //
            // FOR DISPLAY SILVER RATE ACCORDING TO PER10GM@RENUKA-15DEC2022
            if (document.getElementById('silverMetalRateby10gm').value == 'yes') {
                document.getElementById('srGmWtInGm').value = parseFloat(10).toFixed(2);
                document.getElementById('srGmWtInKg').value = parseFloat(100 * 1).toFixed(2);
                document.getElementById('srGmWtInMg').value = parseFloat(10000 * 1).toFixed(2);
            } else {
                document.getElementById('srGmWtInGm').value = parseFloat(1).toFixed(2);
                document.getElementById('srGmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
                document.getElementById('srGmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
            }
            //
            //
        } else if ((metal_Rate_Int_Val_Length == 5 || metal_Rate_Int_Val_Length == 6) &&
                (metalType == 'StrSilver' || metalType == 'STRSILVER' || metalType == 'strsilver')) {
            //
            // FOR SILVER METAL RATE PER KG @PRIYANKA-20DEC2021
            document.getElementById('strsrGmWtInKg').value = parseFloat(1).toFixed(2);
            document.getElementById('strsrGmWtInGm').value = parseFloat(1000 * 1).toFixed(2);
            document.getElementById('strsrGmWtInMg').value = parseFloat((1000 * 1000) * 1).toFixed(2);
            //
            //
        } else if ((metal_Rate_Int_Val_Length == 2 || metal_Rate_Int_Val_Length == 3 || metal_Rate_Int_Val_Length == 4) &&
                (metalType == 'StrSilver' || metalType == 'STRSILVER' || metalType == 'strsilver')) {
            //
            // FOR SILVER METAL RATE PER GM @PRIYANKA-20DEC2021
            //
            // FOR DISPLAY SILVER RATE ACCORDING TO PER10GM@RENUKA-15DEC2022
            if (document.getElementById('strsilverMetalRateby10gm').value == 'yes') {
                document.getElementById('strsrGmWtInGm').value = parseFloat(10).toFixed(2);
                document.getElementById('strsrGmWtInKg').value = parseFloat(100 * 1).toFixed(2);
                document.getElementById('strsrGmWtInMg').value = parseFloat(10000 * 1).toFixed(2);
            } else {
                document.getElementById('strsrGmWtInGm').value = parseFloat(1).toFixed(2);
                document.getElementById('strsrGmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
                document.getElementById('strsrGmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
            }
            //
            //
        }
    }
    //alert('gmWtInKg @== ' + document.getElementById('gmWtInKg').value);
    //alert('gmWtInGm @== ' + document.getElementById('gmWtInGm').value);
    //alert('gmWtInMg @== ' + document.getElementById('gmWtInMg').value);
    //
    //alert('srGmWtInKg @== ' + document.getElementById('srGmWtInKg').value);
    //alert('srGmWtInGm @== ' + document.getElementById('srGmWtInGm').value);
    //alert('srGmWtInMg @== ' + document.getElementById('srGmWtInMg').value);
    //
    //
    // START CODE TO ADD CODE FOR OTHER METAL @PRIYANKA-06JUNE18
    //
    var metalType = document.getElementById('sttr_metal_type').value;
    //
    metalType = metalType.charAt(0).toUpperCase() + metalType.substr(1);
    //
    // END CODE TO ADD CODE FOR OTHER METAL @PRIYANKA-06JUNE18
    //
    //
    //alert('metalType == ' + metalType);
    //
    //
//    var str = new String(metalType);
//    var stngCaseGold = str.localeCompare("Gold");
//
//    if (stngCaseGold == '-1') {
//        metalType = 'Gold';
//    }
//   
//    if (stngCaseGold == '1') {
//        metalType = 'Silver';
//    }
    //
    //alert('metalType **== ' + metalType);
    //
    var labCharges = document.getElementById('sttr_lab_charges').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;
    var totalLabNOthCharges = 0;
    var totVal;
    if (document.getElementById('sttr_other_charges_by').value == 'lbByNetWt') {
        labChargesBy = parseFloat(document.getElementById('sttr_nt_weight').value);
    } else if (document.getElementById('sttr_other_charges_by').value == 'lbByGrossWt') {
        labChargesBy = parseFloat(document.getElementById('sttr_gs_weight').value);
    } else if (document.getElementById('sttr_other_charges_by').value == 'lbByFineWt') {
        labChargesBy = parseFloat(document.getElementById('sttr_fine_weight').value);
    } else {
        var labChargesBy = finalFineWeight;
    }
    //
    if (document.getElementById('sttr_fine_weight').value == 'NaN') {
        document.getElementById('sttr_fine_weight').value = 0;
    }
    //
    if (document.getElementById('sttr_final_fine_weight').value == '' || document.getElementById('sttr_final_fine_weight').value == 'NaN') {
        document.getElementById('sttr_final_fine_weight').value = '';
    }
    //
    if (document.getElementById('sttr_metal_rate').value == '') {
        document.getElementById('sttr_metal_rate').value = 0;
    }
    if (document.getElementById('sttr_final_fine_weight').value != '' && document.getElementById('sttr_final_fine_weight').value != 0) {
        //
        //alert('labChargesType == ' + labChargesType);
        //
        if (document.getElementById('sttr_other_charges_by').value != 'lbInWt') {

            if (labCharges != '') {

                if (labChargesType == 'KG') {
                    if (wtType == 'KG')
                        totalLabNOthCharges = labCharges * labChargesBy;
                    else if (wtType == 'GM')
                        totalLabNOthCharges = (labCharges / 1000) * labChargesBy;
                    else
                        totalLabNOthCharges = (labCharges / (1000 * 1000)) * labChargesBy;
                } else if (labChargesType == 'GM') {
                    if (wtType == 'KG')
                        totalLabNOthCharges = labCharges * 1000 * labChargesBy;
                    else if (wtType == 'GM')
                        totalLabNOthCharges = labCharges * labChargesBy;
                    else
                        totalLabNOthCharges = (labCharges / 1000) * labChargesBy;
                } else if (labChargesType == 'MG') {
                    if (wtType == 'KG')
                        totalLabNOthCharges = labCharges * 1000 * 1000 * labChargesBy;
                    else if (wtType == 'GM')
                        totalLabNOthCharges = labCharges * 1000 * labChargesBy;
                    else
                        totalLabNOthCharges = labCharges * labChargesBy;
                } else if (labChargesType == 'PP') {
                    totalLabNOthCharges = labCharges * itemsQTY;
                } else if (labChargesType == 'Fixed') {
                    totalLabNOthCharges = labCharges;
                } else if (labChargesType == 'per') {
                    labChargeByPer = (labCharges * labChargesBy) / 100;
                    //
                    if (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold') {
                        if (document.getElementById('sttr_nt_weight_type').value == 'KG') {
                            totalLabNOthCharges = ((labChargeByPer * metalRate) * document.getElementById('gmWtInKg').value).toFixed(2);
                        } else if (document.getElementById('sttr_nt_weight_type').value == 'GM') {
                            totalLabNOthCharges = ((labChargeByPer * metalRate) / document.getElementById('gmWtInGm').value).toFixed(2);
                        } else if (document.getElementById('sttr_nt_weight_type').value == 'MG') {
                            totalLabNOthCharges = ((labChargeByPer * metalRate) / document.getElementById('gmWtInMg').value).toFixed(2);
                        }
                    } else if (metalType == 'Silver' || metalType == 'SILVER' || metalType == 'silver') {
                        if (document.getElementById('sttr_nt_weight_type').value == 'KG') {
                            totalLabNOthCharges = (labChargeByPer * metalRate * document.getElementById('srGmWtInKg').value).toFixed(2);
                        } else if (document.getElementById('sttr_nt_weight_type').value == 'GM') {
                            totalLabNOthCharges = ((labChargeByPer * metalRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
                        } else if (document.getElementById('sttr_nt_weight_type').value == 'MG') {
                            totalLabNOthCharges = ((labChargeByPer * metalRate) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                        }
                    }
                    //
                    else if (metalType == 'StrSilver' || metalType == 'STRSILVER' || metalType == 'strsilver') {
                        if (document.getElementById('sttr_nt_weight_type').value == 'KG') {
                            totalLabNOthCharges = (labChargeByPer * metalRate * document.getElementById('strsrGmWtInKg').value).toFixed(2);
                        } else if (document.getElementById('sttr_nt_weight_type').value == 'GM') {
                            totalLabNOthCharges = ((labChargeByPer * metalRate) / document.getElementById('strsrGmWtInGm').value).toFixed(2);
                        } else if (document.getElementById('sttr_nt_weight_type').value == 'MG') {
                            totalLabNOthCharges = ((labChargeByPer * metalRate) / (document.getElementById('strsrGmWtInMg').value)).toFixed(2);
                        }
                    }
                }
                document.getElementById('sttr_total_lab_charges').value = parseFloat(totalLabNOthCharges).toFixed(2);
                //
            } else {

                if (document.getElementById('sttr_total_lab_charges').value == '') {
                    document.getElementById('sttr_total_lab_charges').value = 0;
                }

                totalLabNOthCharges = parseFloat(document.getElementById('sttr_total_lab_charges').value);
            }
        } else {
            totalLabNOthCharges = 0;
            document.getElementById('sttr_total_lab_charges').value = 0;
        }
        //
        if (document.getElementById('sttr_lab_charges').value == '' ||
                document.getElementById('sttr_lab_charges').value == null) {
            document.getElementById('sttr_total_lab_charges').value = 0;
        }
        // ******************************************************************************************************
        // START CODE TO CALCULATE TOTAL OTHER CHARGES @PRIYANKA-12OCT2018
        // ******************************************************************************************************
        var OtherCharges = document.getElementById('sttr_other_charges').value; // OTHER CHARGES
        var OtherChargesType = document.getElementById('sttr_other_charges_type').value; // OTHER CHARGES TYPE
        var OtherChargesBy = document.getElementById('sttr_nt_weight').value; // OTHER CHARGES BY NET WEIGHT
        var otherWeightType = document.getElementById('sttr_nt_weight_type').value; // NET WEIGHT TYPE
        var totalOtherCharges = 0;
        //
        if (OtherCharges != '') {
            //
            if (OtherChargesType == 'KG') {
                //
                if (otherWeightType == 'KG')
                    totalOtherCharges = OtherCharges * OtherChargesBy;
                else if (otherWeightType == 'GM')
                    totalOtherCharges = (OtherCharges / 1000) * OtherChargesBy;
                else
                    totalOtherCharges = (OtherCharges / (1000 * 1000)) * OtherChargesBy;
                //
            } else if (OtherChargesType == 'GM') {
                //
                if (otherWeightType == 'KG')
                    totalOtherCharges = OtherCharges * 1000 * OtherChargesBy;
                else if (otherWeightType == 'GM')
                    totalOtherCharges = OtherCharges * OtherChargesBy;
                else
                    totalOtherCharges = (OtherCharges / 1000) * OtherChargesBy;
                //
            } else if (OtherChargesType == 'MG') {
                //
                if (otherWeightType == 'KG')
                    totalOtherCharges = OtherCharges * 1000 * 1000 * OtherChargesBy;
                else if (otherWeightType == 'GM')
                    totalOtherCharges = OtherCharges * 1000 * OtherChargesBy;
                else
                    totalOtherCharges = OtherCharges * OtherChargesBy;
                //
            } else if (OtherChargesType == 'PP') {
                totalOtherCharges = OtherCharges * itemsQTY;
            } else if (OtherChargesType == 'per') {
                //
                var OthCharges = (OtherCharges * OtherChargesBy) / 100;
                //
                if (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold') {
                    if (otherWeightType == 'KG') {
                        totalOtherCharges = ((OthCharges * metalRate) * document.getElementById('gmWtInKg').value).toFixed(2);
                    } else if (otherWeightType == 'GM') {
                        totalOtherCharges = ((OthCharges * metalRate) / document.getElementById('gmWtInGm').value).toFixed(2);
                    } else if (otherWeightType == 'MG') {
                        totalOtherCharges = ((OthCharges * metalRate) / document.getElementById('gmWtInMg').value).toFixed(2);
                    }
                } else if (metalType == 'Silver' || metalType == 'SILVER' || metalType == 'silver') {
                    if (otherWeightType == 'KG') {
                        totalOtherCharges = (OthCharges * metalRate * document.getElementById('srGmWtInKg').value).toFixed(2);
                    } else if (otherWeightType == 'GM') {
                        totalOtherCharges = ((OthCharges * metalRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
                    } else if (otherWeightType == 'MG') {
                        totalOtherCharges = ((OthCharges * metalRate) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                    }
                }
                //
                else if (metalType == 'StrSilver' || metalType == 'STRSILVER' || metalType == 'strsilver') {
                    if (otherWeightType == 'KG') {
                        totalOtherCharges = (OthCharges * metalRate * document.getElementById('strsrGmWtInKg').value).toFixed(2);
                    } else if (otherWeightType == 'GM') {
                        totalOtherCharges = ((OthCharges * metalRate) / document.getElementById('strsrGmWtInGm').value).toFixed(2);
                    } else if (otherWeightType == 'MG') {
                        totalOtherCharges = ((OthCharges * metalRate) / (document.getElementById('strsrGmWtInMg').value)).toFixed(2);
                    }
                }
            } else if (OtherChargesType == 'Fixed') {
                totalOtherCharges = OtherCharges;
            }
            document.getElementById('sttr_total_other_charges').value = parseFloat(totalOtherCharges).toFixed(2);
        }
        // ******************************************************************************************************
        // END CODE TO CALCULATE TOTAL OTHER CHARGES @PRIYANKA-12OCT2018
        // ******************************************************************************************************
        //
        //alert('metalType == ' + metalType);
        //
        //alert('sttr_final_val_by == ' + document.getElementById('sttr_final_val_by').value );
        //
        // START CODE TO ADD FUNCTION FOR FINAL VALUATION BY GS WT, NT WT, FN WT, FFN WT @PRIYANKA-07MAR19
        if (document.getElementById('sttr_final_valuation_by').value == 'byGrossWt') {
            var finalFineWeight = parseFloat(document.getElementById('sttr_gs_weight').value);
        } else if (document.getElementById('sttr_final_valuation_by').value == 'byNetWt') {
            var finalFineWeight = parseFloat(document.getElementById('sttr_nt_weight').value);
        } else if (document.getElementById('sttr_final_valuation_by').value == 'byFineWt') {
            var finalFineWeight = parseFloat(document.getElementById('sttr_fine_weight').value);
        } else if (document.getElementById('sttr_final_valuation_by').value == 'byFFineWt') {
            var finalFineWeight = parseFloat(document.getElementById('sttr_final_fine_weight').value);
        } else { // By default final valuation calculated by final fine weight @PRIYANKA-07MAR19
            var finalFineWeight = parseFloat(document.getElementById('sttr_final_fine_weight').value);
        }
        // END CODE TO ADD FUNCTION FOR FINAL VALUATION BY GS WT, NT WT, FN WT, FFN WT @PRIYANKA-07MAR19
        //
        //alert('wtType == ' + wtType);
        //alert('finalFineWeight == ' + finalFineWeight);
        //alert('metalRate == ' + metalRate);
        //alert('gmWtInGm == ' + document.getElementById('gmWtInGm').value);
//        console.log('---midd5555---'+document.getElementById('sttr_final_valuation').value)
//        console.log('metalType : '+metalType);
////        metalType = 'StrSilver';
//        console.log('metalType : '+metalType);
//        console.log(wtType);
        if (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold') {
            //
            //
//            if (wtType == 'KG') {
//                document.getElementById('addItemNTWNMetRate').value = Math_round((finalFineWeight * metalRate) * 100).toFixed(2);
//                document.getElementById('addItemValuation').value = Math_round((finalFineWeight * metalRate) * 100 + totalLabNOthCharges).toFixed(2);
//                document.getElementById('addItemFinalVal').value = Math_round((finalFineWeight * metalRate) * 100 + totalLabNOthCharges).toFixed(2);
//            } else if (wtType == 'GM') {
//                document.getElementById('addItemNTWNMetRate').value = Math_round((finalFineWeight * metalRate) / 10).toFixed(2);
//                document.getElementById('addItemValuation').value = Math_round((finalFineWeight * metalRate) / 10 + totalLabNOthCharges).toFixed(2);
//                document.getElementById('addItemFinalVal').value = Math_round((finalFineWeight * metalRate) / 10 + totalLabNOthCharges).toFixed(2);
//            } else if (wtType == 'MG') {
//                document.getElementById('addItemNTWNMetRate').value = Math_round((finalFineWeight * metalRate) / 10000).toFixed(2);
//                document.getElementById('addItemValuation').value = Math_round((finalFineWeight * metalRate) / 10000 + totalLabNOthCharges).toFixed(2);
//                document.getElementById('addItemFinalVal').value = Math_round((finalFineWeight * metalRate) / 10000 + totalLabNOthCharges).toFixed(2);
//            }
            //
            //alert('wtType == ' + wtType);
            //alert('finalFineWeight == ' + finalFineWeight);
            //alert('metalRate == ' + metalRate);
            //alert('gmWtInGm == ' + document.getElementById('gmWtInGm').value);
            //
            if (wtType == 'KG') {
                document.getElementById('sttr_valuation').value = ((finalFineWeight * metalRate) * document.getElementById('gmWtInKg').value).toFixed(2);
                document.getElementById('addItemValuation').value = ((finalFineWeight * metalRate) * document.getElementById('gmWtInKg').value + parseFloat(totalLabNOthCharges)).toFixed(2);
                document.getElementById('sttr_final_valuation').value = parseFloat((finalFineWeight * metalRate) * document.getElementById('gmWtInKg').value + parseFloat(totalLabNOthCharges)).toFixed(2);
            } else if (wtType == 'GM') {
                document.getElementById('sttr_valuation').value = parseFloat((finalFineWeight * metalRate) / document.getElementById('gmWtInGm').value).toFixed(2);
                document.getElementById('addItemValuation').value = parseFloat(((finalFineWeight * metalRate) / document.getElementById('gmWtInGm').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
                document.getElementById('sttr_final_valuation').value = parseFloat(((finalFineWeight * metalRate) / document.getElementById('gmWtInGm').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
            } else if (wtType == 'MG') {
                document.getElementById('sttr_valuation').value = ((finalFineWeight * metalRate) / document.getElementById('gmWtInMg').value).toFixed(2);
                document.getElementById('addItemValuation').value = ((finalFineWeight * metalRate) / document.getElementById('gmWtInMg').value + parseFloat(totalLabNOthCharges)).toFixed(2);
                document.getElementById('sttr_final_valuation').value = parseFloat((finalFineWeight * metalRate) / document.getElementById('gmWtInMg').value + parseFloat(totalLabNOthCharges)).toFixed(2);
            }
            //
            //alert('sttr_valuation == ' + document.getElementById('sttr_valuation').value);
            //
        } else if (metalType == 'Silver' || metalType == 'SILVER' || metalType == 'silver') {
//
//            if (wtType == 'KG') {
//                document.getElementById('addItemNTWNMetRate').value = ((finalFineWeight * metalRate)).toFixed(2);
//                document.getElementById('addItemValuation').value = ((finalFineWeight * metalRate) + totalLabNOthCharges).toFixed(2);
//                document.getElementById('addItemFinalVal').value = ((finalFineWeight * metalRate) + totalLabNOthCharges).toFixed(2);
//            } else if (wtType == 'GM') {
//                document.getElementById('addItemNTWNMetRate').value = ((finalFineWeight * metalRate) / 1000).toFixed(2);
//                document.getElementById('addItemValuation').value = ((finalFineWeight * metalRate) / 1000 + totalLabNOthCharges).toFixed(2);
//                document.getElementById('addItemFinalVal').value = ((finalFineWeight * metalRate) / 1000 + totalLabNOthCharges).toFixed(2);
//            } else if (wtType == 'MG') {
//                document.getElementById('addItemNTWNMetRate').value = ((finalFineWeight * metalRate) / (1000 * 1000)).toFixed(2);
//                document.getElementById('addItemValuation').value = ((finalFineWeight * metalRate) / (1000 * 1000)  + parseFloat(totalLabNOthCharges)).toFixed(2);
//                document.getElementById('addItemFinalVal').value = ((finalFineWeight * metalRate) / (1000 * 1000)  + parseFloat(totalLabNOthCharges)).toFixed(2);
//            }
            //
            //
            if (wtType == 'KG') {
                document.getElementById('sttr_valuation').value = ((finalFineWeight * metalRate) * document.getElementById('srGmWtInKg').value).toFixed(2);
                document.getElementById('addItemValuation').value = ((finalFineWeight * metalRate * document.getElementById('srGmWtInKg').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
                document.getElementById('sttr_final_valuation').value = parseFloat((finalFineWeight * metalRate * document.getElementById('srGmWtInKg').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
            } else if (wtType == 'GM') {
                document.getElementById('sttr_valuation').value = parseFloat((finalFineWeight * metalRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
                document.getElementById('addItemValuation').value = parseFloat(((finalFineWeight * metalRate) / document.getElementById('srGmWtInGm').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
                document.getElementById('sttr_final_valuation').value = parseFloat(((finalFineWeight * metalRate) / document.getElementById('srGmWtInGm').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
            } else if (wtType == 'MG') {
                document.getElementById('sttr_valuation').value = ((finalFineWeight * metalRate) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                document.getElementById('addItemValuation').value = ((finalFineWeight * metalRate) / (document.getElementById('srGmWtInMg').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
                document.getElementById('sttr_final_valuation').value = parseFloat((finalFineWeight * metalRate) / (document.getElementById('srGmWtInMg').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
            }
            //
        } else if (metalType == 'Strsilver' || metalType == 'STRSILVER' || metalType == 'strsilver' || metalType == 'StrSilver') {
            if (wtType == 'KG') {
                document.getElementById('sttr_valuation').value = ((finalFineWeight * metalRate) * document.getElementById('strsrGmWtInKg').value).toFixed(2);
                document.getElementById('addItemValuation').value = ((finalFineWeight * metalRate * document.getElementById('strsrGmWtInKg').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
                document.getElementById('sttr_final_valuation').value = parseFloat((finalFineWeight * metalRate * document.getElementById('strsrGmWtInKg').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
            } else if (wtType == 'GM') {
                document.getElementById('sttr_valuation').value = parseFloat((finalFineWeight * metalRate) / document.getElementById('strsrGmWtInGm').value).toFixed(2);
                document.getElementById('addItemValuation').value = parseFloat(((finalFineWeight * metalRate) / document.getElementById('strsrGmWtInGm').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
                document.getElementById('sttr_final_valuation').value = parseFloat(((finalFineWeight * metalRate) / document.getElementById('strsrGmWtInGm').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
            } else if (wtType == 'MG') {
                document.getElementById('sttr_valuation').value = ((finalFineWeight * metalRate) / (document.getElementById('strsrGmWtInMg').value)).toFixed(2);
                document.getElementById('addItemValuation').value = ((finalFineWeight * metalRate) / (document.getElementById('strsrGmWtInMg').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
                document.getElementById('sttr_final_valuation').value = parseFloat((finalFineWeight * metalRate) / (document.getElementById('strsrGmWtInMg').value) + parseFloat(totalLabNOthCharges)).toFixed(2);
            }
            //
        } else {
            //
            // START CODE TO ADD CODE FOR OTHER METAL @PRIYANKA-06JUNE18
            if (wtType == 'KG') {
                document.getElementById('sttr_valuation').value = (finalFineWeight * metalRate * 1000).toFixed(2);
                document.getElementById('addItemValuation').value = ((finalFineWeight * metalRate * 1000) + parseFloat(totalLabNOthCharges)).toFixed(2);
                document.getElementById('sttr_final_valuation').value = parseFloat((finalFineWeight * metalRate * 1000) + parseFloat(totalLabNOthCharges)).toFixed(2);
            } else if (wtType == 'GM') {
                document.getElementById('sttr_valuation').value = (finalFineWeight * metalRate).toFixed(2);
                document.getElementById('addItemValuation').value = ((finalFineWeight * metalRate) + parseFloat(totalLabNOthCharges)).toFixed(2);
                document.getElementById('sttr_final_valuation').value = parseFloat((finalFineWeight * metalRate) + parseFloat(totalLabNOthCharges)).toFixed(2);
            } else if (wtType == 'MG') {
                document.getElementById('sttr_valuation').value = (finalFineWeight * metalRate * 0.001).toFixed(2);
                document.getElementById('addItemValuation').value = ((finalFineWeight * metalRate * 0.001) + parseFloat(totalLabNOthCharges)).toFixed(2);
                document.getElementById('sttr_final_valuation').value = parseFloat((finalFineWeight * metalRate * 0.001) + parseFloat(totalLabNOthCharges)).toFixed(2);
            }
            // END CODE TO ADD CODE FOR OTHER METAL @PRIYANKA-06JUNE18
            //
            //alert('sttr_final_valuation == ' + document.getElementById('sttr_final_valuation').value);
            //
        }
        //
        //alert('sttr_valuation == ' + document.getElementById('sttr_valuation').value);
        //
        // LAB CGST IN % @PRIYANKA-23FEB18
        if (document.getElementById('sttr_mkg_cgst_per').value == '' || document.getElementById('sttr_mkg_cgst_per').value == 'NaN') {
            document.getElementById('sttr_mkg_cgst_per').value = 0;
        }
        //
        // CALCULATE LAB CGST AMT => (TOTAL LAB CHARGES * LAB CGST IN %) / 100 @PRIYANKA-23FEB18
        if (document.getElementById('sttr_mkg_cgst_per').value != '') {
            document.getElementById('sttr_mkg_cgst_chrg').value = (parseFloat(document.getElementById('sttr_total_lab_charges').value) * (parseFloat(document.getElementById('sttr_mkg_cgst_per').value) / 100)).toFixed(2);
        }
        //
        // LAB CGST CHRG @PRIYANKA-23FEB18
        if (document.getElementById('sttr_mkg_cgst_chrg').value == '' || document.getElementById('sttr_mkg_cgst_chrg').value == 'NaN') {
            document.getElementById('sttr_mkg_cgst_chrg').value = 0;
        }
        //
        // LAB SGST IN % @PRIYANKA-23FEB18
        if (document.getElementById('sttr_mkg_sgst_per').value == '' || document.getElementById('sttr_mkg_sgst_per').value == 'NaN') {
            document.getElementById('sttr_mkg_sgst_per').value = 0;
        }
        //
        // CALCULATE LAB CGST AMT => (TOTAL LAB CHARGES * LAB SGST IN %) / 100 @PRIYANKA-23FEB18
        if (document.getElementById('sttr_mkg_sgst_per').value != '') {
            document.getElementById('sttr_mkg_sgst_chrg').value = (parseFloat(document.getElementById('sttr_total_lab_charges').value) * (parseFloat(document.getElementById('sttr_mkg_sgst_per').value) / 100)).toFixed(2);
        }
        //
        // LAB SGST CHRG @PRIYANKA-23FEB18
        if (document.getElementById('sttr_mkg_sgst_chrg').value == '' || document.getElementById('sttr_mkg_sgst_chrg').value == 'NaN') {
            document.getElementById('sttr_mkg_sgst_chrg').value = 0;
        }
        //
        // LAB IGST IN % @PRIYANKA-23FEB18
        if (document.getElementById('sttr_mkg_igst_per').value == '' || document.getElementById('sttr_mkg_igst_per').value == 'NaN') {
            document.getElementById('sttr_mkg_igst_per').value = 0;
        }
        //
        // CALCULATE LAB CGST AMT => (TOTAL LAB CHARGES * LAB IGST IN %) / 100 @PRIYANKA-23FEB18
        if (document.getElementById('sttr_mkg_igst_per').value != '') {
            document.getElementById('sttr_mkg_igst_chrg').value = (parseFloat(document.getElementById('sttr_total_lab_charges').value) * (parseFloat(document.getElementById('sttr_mkg_igst_per').value) / 100)).toFixed(2);
        }

        // LAB IGST CHRG @PRIYANKA-23FEB18
        if (document.getElementById('sttr_mkg_igst_chrg').value == '' || document.getElementById('sttr_mkg_igst_chrg').value == 'NaN') {
            document.getElementById('sttr_mkg_igst_chrg').value = 0;
        }

        // METAL CGST IN % @PRIYANKA-23FEB18
        if (document.getElementById('sttr_tot_price_cgst_per').value == '' || document.getElementById('sttr_tot_price_cgst_per').value == 'NaN') {
            document.getElementById('sttr_tot_price_cgst_per').value = 0;
        }

        // CALCULATE MET CGST AMT => (METAL VAL * MET CGST IN %) / 100 @PRIYANKA-23FEB18
        if (document.getElementById('sttr_tot_price_cgst_per').value != '') {
            document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
        }

        // MET CGST CHRG @PRIYANKA-23FEB18
        if (document.getElementById('sttr_tot_price_cgst_chrg').value == '' || document.getElementById('sttr_tot_price_cgst_chrg').value == 'NaN') {
            document.getElementById('sttr_tot_price_cgst_chrg').value = 0;
        }

        // METAL SGST IN % @PRIYANKA-23FEB18
        if (document.getElementById('sttr_tot_price_sgst_per').value == '' || document.getElementById('sttr_tot_price_sgst_per').value == 'NaN') {
            document.getElementById('sttr_tot_price_sgst_per').value = 0;
        }

        // CALCULATE MET SGST AMT => (METAL VAL * MET SGST IN %) / 100 @PRIYANKA-23FEB18
        if (document.getElementById('sttr_tot_price_sgst_per').value != '') {
            document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
        }

        // MET SGST CHRG @PRIYANKA-23FEB18
        if (document.getElementById('sttr_tot_price_sgst_chrg').value == '' || document.getElementById('sttr_tot_price_sgst_chrg').value == 'NaN') {
            document.getElementById('sttr_tot_price_sgst_chrg').value = 0;
        }

        // METAL IGST IN % @PRIYANKA-23FEB18
        if (document.getElementById('sttr_tot_price_igst_per').value == '' || document.getElementById('sttr_tot_price_igst_per').value == 'NaN') {
            document.getElementById('sttr_tot_price_igst_per').value = 0;
        }

        // CALCULATE MET IGST AMT => (METAL VAL * MET IGST IN %) / 100 @PRIYANKA-23FEB18
        if (document.getElementById('sttr_tot_price_igst_per').value != '') {
            document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
        }

        // MET IGST CHRG @PRIYANKA-23FEB18
        if (document.getElementById('sttr_tot_price_igst_chrg').value == '' || document.getElementById('sttr_tot_price_igst_chrg').value == 'NaN') {
            document.getElementById('sttr_tot_price_igst_chrg').value = 0;
        }

        if (document.getElementById('sttr_tax').value == '' || document.getElementById('sttr_tax').value == 'NaN') {
            document.getElementById('sttr_tax').value = 0;
        }

        // CALCULATE TOT TAX AMT => LAB CGST AMT + LAB SGST AMT + LAB IGST AMT + MET CGST AMT + MET SGST AMT + MET IGST AMT @PRIYANKA-23FEB18
        document.getElementById('sttr_tot_tax').value = (parseFloat(document.getElementById('sttr_mkg_cgst_chrg').value) +
                parseFloat(document.getElementById('sttr_mkg_sgst_chrg').value) +
                parseFloat(document.getElementById('sttr_mkg_igst_chrg').value) +
                parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
                parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
                parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value) +
                (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tax').value) / 100))).toFixed(2);

        if (document.getElementById('sttr_tot_tax').value == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
            document.getElementById('sttr_tot_tax').value = 0;
        }

        // CALCULATE FINAL VALUATION @PRIYANKA-23FEB18
        if (document.getElementById('sttr_tot_tax').value != '') {
            document.getElementById('sttr_final_valuation').value = parseFloat(parseFloat(document.getElementById('addItemValuation').value) + parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
        }
        // ADD TOTAL OTHER CHARGES INTO FINAL VALUATION @PRIYANKA-12OCT2018
        if (document.getElementById('sttr_total_other_charges').value != '') {
            document.getElementById('sttr_final_valuation').value = parseFloat(parseFloat(document.getElementById('sttr_final_valuation').value) + parseFloat(document.getElementById('sttr_total_other_charges').value)).toFixed(2);
        }
        //
        //
        // *************************************************************************************************************
        // ADDED FOR TOTAL HALLMARKING CHARGES INTO FINAL VALUATION @PRIYANKA-23MAY2022
        // *************************************************************************************************************
        if ((metalType == 'Gold' || metalType == 'gold' || metalType == 'GOLD') || (addHallamrkChargOnSilverItem == 'YES' && (metalType == 'Silver' || metalType == 'silver' || metalType == 'SILVER'))) {   // ADDED CONDITIONS FOR ADD GOLD ITEM @SIMRAN:17APR2023
            //   
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
                    // FOR HALLMARK CGST % @PRIYANKA-25MAY2022
                    if (document.getElementById('sttr_hallmark_cgst_per').value == '' || document.getElementById('sttr_hallmark_cgst_per').value == 'NaN') {
                        document.getElementById('sttr_hallmark_cgst_per').value = 0;
                    }
                    //
                    // FOR HALLMARK SGST % @PRIYANKA-25MAY2022
                    if (document.getElementById('sttr_hallmark_sgst_per').value == '' || document.getElementById('sttr_hallmark_sgst_per').value == 'NaN') {
                        document.getElementById('sttr_hallmark_sgst_per').value = 0;
                    }
                    //
                    // FOR HALLMARK IGST % @PRIYANKA-25MAY2022
                    //if (document.getElementById('sttr_hallmark_igst_per').value == '' || document.getElementById('sttr_hallmark_igst_per').value == 'NaN') {
                    document.getElementById('sttr_hallmark_igst_per').value = 0;
                    //}                      
                    //
                    //
                    var totalHallmarkCharges = 0;
                    //                        
                    //
                    // FOR HALLMARKING CHARGES TYPE - FX @PRIYANKA-23MAY2022
                    //Adding Code To Update HallMarking Charge @Author:08-01-2023
                    if (document.getElementById('hallmarkingChargesBySetupPanel').value == null || document.getElementById('hallmarkingChargesBySetupPanel').value == 0 || document.getElementById('hallmarkingChargesBySetupPanel').value == '')
                    {
                        totalHallmarkCharges = document.getElementById('sttr_total_hallmark_charges').value;
                        document.getElementById('hallmarkingChargesTypeBySetupPanel').value = 'FX';
                    } else
                    if (document.getElementById('hallmarkingChargesTypeBySetupPanel').value == 'FX') {
                        totalHallmarkCharges = parseFloat(document.getElementById('hallmarkingChargesBySetupPanel').value).toFixed(2);
                    }
                    // FOR HALLMARKING CHARGES TYPE - PP @PRIYANKA-23MAY2022
                    else if (document.getElementById('hallmarkingChargesTypeBySetupPanel').value == 'PP') {
                        totalHallmarkCharges = parseFloat(parseFloat(itemsQTY) * parseFloat(document.getElementById('hallmarkingChargesBySetupPanel').value)).toFixed(2);
                    }
                    // FOR HALLMARKING CHARGES TYPE - GM @PRIYANKA-23MAY2022
                    else if (document.getElementById('hallmarkingChargesTypeBySetupPanel').value == 'GM' && document.getElementById('sttr_gs_weight_type').value == 'GM') {
                        totalHallmarkCharges = parseFloat(parseFloat(document.getElementById('sttr_gs_weight').value) * parseFloat(document.getElementById('hallmarkingChargesBySetupPanel').value)).toFixed(2);
                    }
                    // FOR HALLMARKING CHARGES TYPE - KG @PRIYANKA-23MAY2022
                    else if (document.getElementById('hallmarkingChargesTypeBySetupPanel').value == 'KG' && document.getElementById('sttr_gs_weight_type').value == 'KG') {
                        totalHallmarkCharges = parseFloat(parseFloat(document.getElementById('sttr_gs_weight').value) * parseFloat(document.getElementById('hallmarkingChargesBySetupPanel').value)).toFixed(2);
                    } else {
                        totalHallmarkCharges = parseFloat(document.getElementById('hallmarkingChargesBySetupPanel').value).toFixed(2);
                    }
                    //
                    //
                    // TO CALCULATE HALLMARK CGST AMT @PRIYANKA-25MAY2022
                    if (document.getElementById('sttr_hallmark_cgst_per').value > 0) {
                        document.getElementById('sttr_hallmark_cgst_amt').value = parseFloat(parseFloat(totalHallmarkCharges) * (parseFloat(document.getElementById('sttr_hallmark_cgst_per').value) / 100)).toFixed(2);
                    }
                    //
                    // TO CALCULATE HALLMARK SGST AMT @PRIYANKA-25MAY2022
                    if (document.getElementById('sttr_hallmark_sgst_per').value > 0) {
                        document.getElementById('sttr_hallmark_sgst_amt').value = parseFloat(parseFloat(totalHallmarkCharges) * (parseFloat(document.getElementById('sttr_hallmark_sgst_per').value) / 100)).toFixed(2);
                    }
                    //
                    // TO CALCULATE HALLMARK IGST AMT @PRIYANKA-25MAY2022
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
                    // FOR HALLMARK CGST AMT @PRIYANKA-25MAY2022
                    if (document.getElementById('sttr_hallmark_cgst_amt').value == '' || document.getElementById('sttr_hallmark_cgst_amt').value == 'NaN') {
                        document.getElementById('sttr_hallmark_cgst_amt').value = 0;
                    }
                    //
                    // FOR HALLMARK SGST AMT @PRIYANKA-25MAY2022
                    if (document.getElementById('sttr_hallmark_sgst_amt').value == '' || document.getElementById('sttr_hallmark_sgst_amt').value == 'NaN') {
                        document.getElementById('sttr_hallmark_sgst_amt').value = 0;
                    }
                    //
                    // FOR HALLMARK IGST AMT @PRIYANKA-25MAY2022
                    //if (document.getElementById('sttr_hallmark_igst_amt').value == '' || document.getElementById('sttr_hallmark_igst_amt').value == 'NaN') {
                    document.getElementById('sttr_hallmark_igst_amt').value = 0;
                    //}
                    //
                    //
                    // TO CALCULATE TOTAL HALLMARKING CHARGES @PRIYANKA-25MAY2022
                    document.getElementById('sttr_total_hallmark_charges').value = parseFloat(parseFloat(document.getElementById('sttr_hallmark_cgst_amt').value) +
                            parseFloat(document.getElementById('sttr_hallmark_sgst_amt').value) +
                            parseFloat(document.getElementById('sttr_hallmark_igst_amt').value) +
                            parseFloat(totalHallmarkCharges)).toFixed(2);
                    //
                    //
                    // TO CALCULATE FINAL VALUATION WITH HALLMARKING CHARGES @PRIYANKA-25MAY2022
                    document.getElementById('sttr_final_valuation').value = parseFloat(parseFloat(document.getElementById('sttr_final_valuation').value) + parseFloat(document.getElementById('sttr_total_hallmark_charges').value)).toFixed(2);
                    //
                    //
                }
            }

        }
//        else {
//            document.getElementById('sttr_total_hallmark_charges').value = 0;
//            document.getElementById('hallmarkingChargesBySetupPanel').value = 0;
//            document.getElementById('sttr_hallmark_cgst_per').value = 0;
//            document.getElementById('sttr_hallmark_sgst_per').value = 0;
//            document.getElementById('sttr_hallmark_igst_per').value = 0;
//        }
        // END CONDITION FOR ADD GOLD STOCK @SIMRAN:17APR2023
        //
        // COMMENTED BY @PRIYANKA-23FEB18
//        if (document.getElementById('sttr_tax').value != '') {
//            document.getElementById('sttr_tot_tax').value = parseFloat((parseFloat(document.getElementById('addItemValuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
//            document.getElementById('sttr_final_valuation').value = parseFloat(parseFloat(document.getElementById('addItemValuation').value) + parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
//        }
//
        totVal = parseFloat(document.getElementById('sttr_final_valuation').value).toFixed(2);
        if (document.getElementById('addItemCryFinVal').value != '') {
            document.getElementById('sttr_final_valuation').value = (parseFloat(totVal) + parseFloat(document.getElementById('addItemCryFinVal').value)).toFixed(2);
        }
//
//        var finalVal = parseFloat(document.getElementById('sttr_final_valuation').value).toFixed(2);
//        
//        if (document.getElementById('sttr_value_added').value > 0) {
//            document.getElementById('sttr_final_valuation').value = (parseFloat(finalVal) + parseFloat(document.getElementById('sttr_value_added').value)).toFixed(2);
//        }
//
    }
    //
    return false;
    //
}
//
//
function showImitationJewellery(panel) {
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('jewellerySubPanel').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        }
    };
    if (panel == 'imitationList')
        xmlhttp.open("POST", "include/php/ogijlimsd" + default_theme + ".php", true);
    else
        xmlhttp.open("POST", "include/php/ogijstlt" + default_theme + ".php", true);
    xmlhttp.send();
}
// START CODE TO CHANGE FUNCTION FOR MASTER ITEM DETAILS @PRIYANKA-20MAR18
function searchStockItemNames(itemCategory, itemName, metalType, divNum, keyCodeInput, itemPreId, itemId, documentRootPath, itemType) {
    keyCodeForItemNames = keyCodeInput;
    divNumForItemNames = divNum;
    //
    var poststr = "itemName=" + encodeURIComponent(itemName)
            + "&metalType=" + encodeURIComponent(metalType)
            + "&itemType=" + encodeURIComponent(itemType)
            + "&divNum=" + encodeURIComponent(divNum)
            + "&itemCat=" + encodeURIComponent(itemCategory)
            + "&itemPreId=" + encodeURIComponent(itemPreId)
            + "&itemId=" + encodeURIComponent(itemId);
    //
    search_stock_item_names(documentRootPath + "/include/php/ommasteritemsearch" + default_theme + ".php", poststr);
}
// END CODE TO CHANGE FUNCTION FOR MASTER ITEM DETAILS @PRIYANKA-20MAR18
var keyCodeForItemNames;
function search_stock_item_names(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchStockItemNames;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchStockItemNames() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (divNumForItemNames == 'slPrItemCategory') {
            document.getElementById("itemListDivToAddStock").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("itemListDivToAddStockItem").innerHTML = xmlhttp.responseText;
        }
        if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
            document.getElementById('itemListToAddItemSelect').focus();
            document.getElementById('itemListToAddItemSelect').options[0].selected = true;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
////START CODE TO CHANGE ID'S OF STOCK TRANSACTION @AUTH:ATHU6JUN17
function getItemDetails(itemName, itemCategory, suppName, metalType) {
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            // alert(xmlhttp.responseText);
            var str = xmlhttp.responseText;
//            alert(str);
            var strArray = new Array();
            strArray = str.split("*");
            document.getElementById('sttr_purity').value = strArray[0];
            document.getElementById('sttr_wastage').value = strArray[1];
            document.getElementById('sttr_gs_weight').value = strArray[2];
            document.getElementById('sttr_nt_weight').value = strArray[3];
            document.getElementById('sttr_final_purity').value = strArray[4];
            document.getElementById('sttr_fine_weight').value = strArray[5];
            document.getElementById('sttr_final_fine_weight').value = strArray[6];
            document.getElementById('sttr_lab_charges').value = strArray[7];
            document.getElementById('sttr_lab_charges_type').value = strArray[8];
            document.getElementById('sttr_pkt_weight').value = strArray[9];
            document.getElementById('sttr_quantity').value = strArray[10];
            calStockItemPrice();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/ogitstdt" + default_theme + ".php?suppName=" + suppName + "&itemName=" + itemName + "&itemCategory=" + itemCategory + "&metalType=" + metalType, true);
    xmlhttp.send();
}
//
//
function getRawItemDetails(itemName, itemCategory, suppName, metalType) {
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            // alert(xmlhttp.responseText);
            var str = xmlhttp.responseText;
//            alert(str);
            var strArray = new Array();
            strArray = str.split("*");
//            document.getElementById('sttr_purity').value = strArray[0];
            document.getElementById('sttr_wastage').value = strArray[1];
            document.getElementById('sttr_gs_weight').value = strArray[2];
            document.getElementById('maxgswt').value = document.getElementById('sttr_gs_weight').value = strArray[2];
            document.getElementById('sttr_nt_weight').value = strArray[3];
            document.getElementById('sttr_final_purity').value = strArray[4];
            document.getElementById('sttr_fine_weight').value = strArray[5];
            document.getElementById('sttr_final_fine_weight').value = strArray[6];
            document.getElementById('sttr_lab_charges').value = strArray[7];
            document.getElementById('sttr_lab_charges_type').value = strArray[8];
            document.getElementById('sttr_pkt_weight').value = strArray[9];
            document.getElementById('sttr_quantity').value = strArray[10];
            calStockItemPrice();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "/2/include/php/ogitstdt" + default_theme + ".php?suppName=" + suppName + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName, true);
    xmlhttp.send();
}
//
function getAdvanceMoneyDetDiv(custId, panelName)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addNewUdhaarDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("advMoneyDetails").style.visibility = "visible";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omamndtdv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName, true);
    xmlhttp.send();
}
function showAddNewUdhaarDetDiv(custId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addNewUdhaarDiv").innerHTML = xmlhttp.responseText;
//            document.getElementById('udhaarMainAmount').focus();//added @Author:PRIYA09NOV14
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'udhaarWithEMIList')
        xmlhttp.open("GET", "include/php/omuemidet" + default_theme + ".php?custId=" + custId, true);
    else
        xmlhttp.open("GET", "include/php/omuudet" + default_theme + ".php?custId=" + custId, true);
    xmlhttp.send();
}
function getSellLotItemDetByPreId(itemPreId, metalType, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            if (str == '') {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                document.getElementById('addItemId').value = '1';
            } else {
                document.getElementById('itemPreIdSelectDiv').innerHTML = xmlhttp.responseText;
                if (keyCodeInput == 40 || keyCodeInput == 38) {
                    document.getElementById('itemPreIdListToSel').focus();
                    document.getElementById('itemPreIdListToSel').options[0].selected = true;
                }
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogisidsl" + default_theme + ".php?metalType=" + metalType + "&itemPreId=" + itemPreId + "&mainPanel=SlPrPayment", true);
    xmlhttp.send();
}
function getStockItemDetailsByPreId(preId, suppName, mainPanel, invPanelName, utransInvId, pre_metal_rate = null) { //add new parameter for previous or manual metal rate @OMKAR27JAN2024
    //alert('utransInvId == ' + utransInvId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('stockPanelSubDiv').innerHTML = xmlhttp.responseText;
            document.getElementById('addItemPreId').focus();
            calItemPrice();
        }
    };
    if (invPanelName == 'AddByInv') {
        xmlhttp.open("POST", "ogadstoc.php?preId=" + encodeURIComponent(preId) + "&suppName=" + encodeURIComponent(suppName)
                + "&stockDetPanel=preIdDetail" + "&invPanel=" + encodeURIComponent(invPanelName) + "&utransInvId=" + encodeURIComponent(utransInvId), true); //CODE CHANGE TO ENCODE URL FOR PREID,@AUTHOR:HEMA-13JUL2020
    } else if (invPanelName == 'RawMoveToStock') {
        xmlhttp.open("POST", "omrwfinadstoc.php?preId=" + encodeURIComponent(preId) + "&suppName=" + encodeURIComponent(suppName)
                + "&stockDetPanel=preIdDetail" + "&invPanel=" + encodeURIComponent(invPanelName) + "&utransInvId=" + encodeURIComponent(utransInvId), true);
    } else {
        xmlhttp.open("POST", "include/php/ogadstoc.php?preId=" + encodeURIComponent(preId) + "&suppName=" + encodeURIComponent(suppName)
                + "&stockDetPanel=preIdDetail" + "&invPanel=" + encodeURIComponent(invPanelName) + "&utransInvId=" + encodeURIComponent(utransInvId) + "&panelName=" + encodeURIComponent(mainPanel) + "&pre_metal_rate=" + pre_metal_rate, true); //CODE CHANGE TO ENCODE URL FOR PREID,@AUTHOR:HEMA-13JUL2020 // change to get the previous metal rate @OMKAR24JAN2024
    }
    xmlhttp.send();
}
function getStockItemDetailsByProdCode(preId, suppName, panelname, payPanelName, pre_metal_rate = null) { //add new parameter for previous or manual metal rate @OMKAR27JAN2024
//    alert('preId == ' + preId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('AddInvoiceMainDiv').innerHTML = xmlhttp.responseText;
            calItemPrice();
        }
    };
    if (panelname == 'suppJewelleryPanel') {
        xmlhttp.open("POST", "include/php/ogwadinv.php?preId=" + encodeURIComponent(preId) + "&suppName=" + encodeURIComponent(suppName)
                + "&stockDetPanel=prodCodeDetail" + "&payPanelName=" + encodeURIComponent(payPanelName), true); //CODE CHANGE TO ENCODE URL FOR PREID,@AUTHOR:HEMA-13JUL2020
    } else {
        xmlhttp.open("POST", "include/php/ogadstoc.php?preId=" + encodeURIComponent(preId) + "&suppName=" + encodeURIComponent(suppName)
                + "&stockDetPanel=preIdDetail" + "&invPanel=" + encodeURIComponent(invPanelName) + "&utransInvId=" + encodeURIComponent(utransInvId) + "&panelName=" + encodeURIComponent(mainPanel) + "&pre_metal_rate=" + pre_metal_rate, true); //CODE CHANGE TO ENCODE URL FOR PREID,@AUTHOR:HEMA-13JUL2020 // change to get the previous metal rate @OMKAR24JAN2024
    }
    xmlhttp.send();
}
function getPayAllUdhaField(payAllUdhaVal, payPanelName, mainPanel, payPreInvNo, payInvNo, panel) {
    var prefix = document.getElementById('prefix').value;
    var payId = document.getElementById(prefix + 'PayId').value;
    var custId = document.getElementById(prefix + 'CustId').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("prevBalDiv").innerHTML = xmlhttp.responseText;
            document.getElementById(prefix + 'PayPrevTotAmt').value = document.getElementById('prevBalance').value;
//            alert(document.getElementById(prefix + 'PayPrevTotAmt').value);
            calcPaymentCashBalance(prefix);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogsppyudh" + default_theme + ".php?payAllUdhaVal=" + payAllUdhaVal + "&payPanelName=" + payPanelName + "&mainPanel=" + mainPanel + "&payPreInvNo=" + payPreInvNo + "&payInvNo=" + payInvNo + "&custId=" + custId + "&suppPayId=" + payId, true);
    xmlhttp.send();
}

function changePktWt() {

    var qty = document.getElementById('sttr_quantity').value;
    var pktWt = document.getElementById('sttr_pkt_weight').value;
    if (qty != null && qty != 0 && qty != '')
    {
        var newPktWt = ((document.getElementById('sttr_quantity').value) * (document.getElementById('sttr_pkt_weight').value));
    } else {
        var newPktWt = document.getElementById('sttr_pkt_weight').value;
    }
    document.getElementById('sttr_pkt_weight').value = newPktWt;
}
function changeSellPktWt(panel = null) {
    var qty = document.getElementById('slPrItemPieces').value;
    var pktWt = document.getElementById('slPrPacketWeight').value;
    var lessWt = document.getElementById('slPrLessWeight').value;
    if (panel == 'changepktwt' || panel == 'changelesswt') {
        var newPktWt = ((document.getElementById('slPrItemPieces').value) * (document.getElementById('slPrPacketWeight').value) * document.getElementById('slPrLessWeight').value);
    } else {
        var newPktWt = ((document.getElementById('slPrItemPieces').value) * (document.getElementById('pktWt1').value));
    }
    document.getElementById('slPrPacketWeight').value = parseFloat(newPktWt).toFixed(3);
    // alert (newPktWt);
}
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
//START CODE FOR ADD USER PKT WT DETAILS @SIMRAN:12DEC2023
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function getPktWtDetails(count) {
    loadXMLDoc();
    for (let i = 1; i <= count; i++) {
        pktWt = document.getElementById('sttr_pkt_weight' + i).value;
        document.getElementById('pktWt' + i).value = pktWt;
        pktWt = '';
        pktDesc = document.getElementById('sttr_pkt_desc' + i).value;
        document.getElementById('pktDesc' + i).value = pktDesc;
        pktDesc = '';
        pktQty = document.getElementById('sttr_pkt_qty' + i).value;
        document.getElementById('pktQty' + i).value = pktQty;
        pktQty = '';
    }
}
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
//END CODE FOR ADD USER PKT WT DETAILS @SIMRAN:12DEC2023
//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function calcCadOtherCharges() {
    let noOfRows = document.getElementById('sttr_total_other_charges_rows').value;
    let totalOthCharges = 0;
//
    for (i = 1; i <= noOfRows; i++) {
        let charges = document.getElementById('sttr_other_charges_amt' + i).value;
        if (charges == '' || charges == null) {
            charges = 0;
        }
        totalOthCharges += parseFloat(charges);
        if (!totalOthCharges) {
            totalOthCharges = 0;
        }
        document.getElementById('sttr_other_charges_total').value = totalOthCharges;
    }
    //
}
//
/*********************Start to add funtion @Author:SHRI30JUL16***************************/
function changeNetWeightByPktWt(pktWeight, slmetalbindicator = '') {

    //alert('slPrPacketWeight == ' + document.getElementById('slPrPacketWeight').value);

    if ((document.getElementById('addPanel').value == 'InvoicePayment' ||
            document.getElementById('addPanel').value == 'stockTransfer' ||
            document.getElementById('addPanel').value == 'PurCADJewellery' ||
            document.getElementById('addPanel').value == 'ItemApprovalRec' ||
            document.getElementById('addPanel').value == 'PurCADJewelleryUpdate' ||
            document.getElementById('addPanel').value == 'ItemApprovalRecUp' ||
            document.getElementById('addPanel').value == 'InvoicePayUp' ||
            document.getElementById('addPanel').value == 'UpdateItem' ||
            document.getElementById('addPanel').value == 'PurchaseReturnPayUp' ||
            document.getElementById('addPanel').value == 'PurchaseReturnPanel' ||
            document.getElementById('addPanel').value == 'PurchaseQuotation' ||
            document.getElementById('addPanel').value == 'UpdateQuotationItem') &&
            document.getElementById('addPanelInfo').value != 'InvoiceAddStock') {//update panel added @Author:SANT22NOV16

        var gsWt = document.getElementById('sttr_gs_weight').value;
        var gsWtType = document.getElementById('sttr_gs_weight_type').value;
        if (gsWt == '' || gsWt == null) {
            gsWt = 0;
        }

        var pktWeightValue = parseFloat(document.getElementById('sttr_pkt_weight').value) || 0;
        var lessWeightValue = parseFloat(document.getElementById('sttr_less_weight').value) || 0;
        var pktWt = pktWeightValue + lessWeightValue;
        var pktWtType = document.getElementById('sttr_pkt_weight_type').value;
        var lessWtType = document.getElementById('sttr_less_weight_type').value;
        if (pktWeightValue == '' || pktWeightValue == null) {
            pktWeightValue = 0;
        }
        //
        if (lessWeightValue == '' || lessWeightValue == null) {
            lessWeightValue = 0;
        }

        var NetWTID = document.getElementById('sttr_nt_weight');
    } else if (document.getElementById('addPanel').value == 'SlPrPayment' ||
            document.getElementById('addPanel').value == 'EstimateUpdate' ||
            document.getElementById('addPanel').value == 'EstimatePayUp' ||
            document.getElementById('addPanel').value == 'Estimate' ||
            document.getElementById('addPanel').value == 'SellPayUp' ||
            document.getElementById('addPanel').value == 'SellStock' ||
            document.getElementById('addPanel').value == 'SellDetUpPanel' ||
            document.getElementById('addPanel').value == 'StockReturnPanel') {

        if (document.getElementById('netWeight').value == '' ||
                document.getElementById('netWeight').value == null) {
            document.getElementById('netWeight').value = 0;
        }

        gsWt = document.getElementById('slPrItemGSW').value;
        gsWtType = document.getElementById('slPrItemNTWT').value;
        if (document.getElementById('slPrPacketWeight').value == '' ||
                document.getElementById('slPrPacketWeight').value == null) {
            document.getElementById('slPrPacketWeight').value = 0;
        }
        //
        if (slmetalbindicator == 'sellMetalB2') {
            var pktWeightValue = 0;
            var lessWeightValue = parseFloat(document.getElementById('slPrPacketWeight').value) || 0;
        } else {
            var pktWeightValue = parseFloat(document.getElementById('slPrPacketWeight').value) || 0;
            var lessWeightValue = parseFloat(document.getElementById('slPrLessWeight').value) || 0;
        }

        var pktWt = pktWeightValue + lessWeightValue;
        var pktWtType = document.getElementById('slPrPacketWeightType').value;
        if (slmetalbindicator == 'sellMetalB2') {
            var lessWtType = document.getElementById('slPrPacketWeightType').value;
        } else {
            var lessWtType = document.getElementById('slPrLessWeightType').value;
        }
        if (pktWeightValue == '' || pktWeightValue == null) {
            pktWeightValue = 0;
        }
        //
        if (lessWeightValue == '' || lessWeightValue == null) {
            lessWeightValue = 0;
        }
        NetWTID = document.getElementById('slPrItemNTW');
    } else if (document.getElementById('addPanel').value == 'StockPayment' ||
            document.getElementById('addPanel').value == 'StockPayUp' ||
            document.getElementById('addPanel').value == 'AddStock' ||
            document.getElementById('addPanel').value == 'UpdateStock' ||
            document.getElementById('addPanel').value == 'SellByLot' ||
            document.getElementById('addPanel').value == 'DailyWholeSale' ||
            document.getElementById('addPanel').value == 'updateCatalogueStock') {

        var gsWt = document.getElementById('netWeight').value;
        var gsWtType = document.getElementById('sttr_nt_weight_type').value;
        if (gsWt == '' || gsWt == null) {
            gsWt = 0;
        }
        var pktWeightValue = parseFloat(document.getElementById('sttr_pkt_weight').value) || 0;
        var lessWeightValue = parseFloat(document.getElementById('sttr_less_weight').value) || 0;
        var pktWt = pktWeightValue + lessWeightValue;
        var pktWtType = document.getElementById('sttr_pkt_weight_type').value;
        var lessWtType = document.getElementById('sttr_less_weight_type').value;
        if (pktWeightValue == '' || pktWeightValue == null) {
            pktWeightValue = 0;
        }
        //
        if (lessWeightValue == '' || lessWeightValue == null) {
            lessWeightValue = 0;
        }

        var NetWTID = document.getElementById('sttr_nt_weight');
    } else if (document.getElementById('addPanelInfo').value == 'InvoiceAddStock') {

        var gsWt = document.getElementById('sttr_gs_weight').value;
        var gsWtType = document.getElementById('sttr_gs_weight_type').value;
        if (gsWt == '' || gsWt == null) {
            gsWt = 0;
        }

        var pktWeightValue = parseFloat(document.getElementById('sttr_pkt_weight').value) || 0;
        var lessWeightValue = parseFloat(document.getElementById('sttr_less_weight').value) || 0;
        var pktWt = pktWeightValue + lessWeightValue;
        var pktWtType = document.getElementById('sttr_pkt_weight_type').value;
        var lessWtType = document.getElementById('sttr_less_weight_type').value;
        if (pktWeightValue == '' || pktWeightValue == null) {
            pktWeightValue = 0;
        }
        //
        if (lessWeightValue == '' || lessWeightValue == null) {
            lessWeightValue = 0;
        }

        var NetWTID = document.getElementById('sttr_nt_weight');
    }
    NetWTID.value = parseFloat(parseFloat(gsWt) - convertWeight(pktWt, gsWtType, pktWtType, lessWtType)).toFixed(3);
    if (document.getElementById('noofcrystal') != null) {
        for (i = 1; i <= 20; i++) {
            if (document.getElementById('sttr_wt_auto_less' + i) != null && document.getElementById('sttr_wt_auto_less' + i).value == 'on') {
                if (document.getElementById('totNetWeight') != null) {
                    document.getElementById('totNetWeight').value = document.getElementById('sttr_nt_weight').value;
                }
                document.getElementById('netWeight').value = document.getElementById('sttr_nt_weight').value;
                autoLessWeight(i, document.getElementById('slPrAutoLessCryWt' + i).checked, 'sttr_nt_weight', 'sttr_nt_weight_type', '', 'AddStock');
                break;
            }
        }
    }
    if (document.getElementById('sttr_wastage_wight') != null) {
        calculateRemainingWeight(document.getElementById('sttr_wastage').value, '', 'percentage', document.getElementById('sttr_wastage_by').value);
}
}
/*********************End to add funtion @Author:SHRI30JUL16***************************/
/*******************Start to add function @Author:SHRI03AUG16***********************/

function autoLessWeight(cryCount, autoChk, gsWtId, wtTypId, cryPanel, sellPanel) {
    var remWt = 0;
    if (sellPanel == 'AddStock' && cryPanel != 'deleteCry') {
        if (document.getElementById('sttr_gs_weight_' + cryCount).value == '' || document.getElementById('sttr_gs_weight_' + cryCount).value == 'NaN')
            document.getElementById('sttr_gs_weight_' + cryCount).value = 0;
        var cryGSW = document.getElementById('sttr_gs_weight_' + cryCount).value;
        var cryGSWT = document.getElementById('sttr_gs_weight_type_' + cryCount).value;
        if (document.getElementById('sttr_gs_weight').value == '' || document.getElementById('sttr_gs_weight').value == 'NaN')
            document.getElementById('sttr_gs_weight').value = 0;
        var itemGSW = parseFloat(document.getElementById('sttr_gs_weight').value);
        var itemGSWT = document.getElementById(wtTypId).value;
        //
    } else if (cryPanel == 'deleteCry') {
        if (document.getElementById('sttr_gs_weight_' + cryCount).value == '' || document.getElementById('sttr_gs_weight_' + cryCount).value == 'NaN')
            document.getElementById('sttr_gs_weight_' + cryCount).value = 0;
        var cryGSW = document.getElementById('sttr_gs_weight_' + cryCount).value;
        var cryGSWT = document.getElementById('sttr_gs_weight_type_' + cryCount).value;
        //
        if (document.getElementById('sttr_nt_weight').value == '' || document.getElementById('sttr_nt_weight').value == 'NaN')
            document.getElementById('sttr_nt_weight').value = 0;
        //
        var itemGSW = parseFloat(document.getElementById('sttr_nt_weight').value);
        var itemGSWT = document.getElementById(wtTypId).value;
        //
    } else {
        //
        if (document.getElementById('slPrCryGSW' + cryCount).value == '' || document.getElementById('slPrCryGSW' + cryCount).value == 'NaN')
            document.getElementById('slPrCryGSW' + cryCount).value = 0;
        //
        var cryGSW = document.getElementById('slPrCryGSW' + cryCount).value;
        var cryGSWT = document.getElementById('slPrCryGSWType' + cryCount).value;
        //
        if (document.getElementById('netWeight').value == '' || document.getElementById('netWeight').value == 'NaN')
            document.getElementById('netWeight').value = 0;
        //
        var itemGSW = parseFloat(document.getElementById('netWeight').value);
        var itemGSWT = document.getElementById(wtTypId).value;
        //
    }
    //
    //
    // START CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-09MAR18
    if (cryGSWT == 'KG') { // CRYSTAL WEIGHT TYPE IN KG
        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSW = cryGSW;
    } else if (cryGSWT == 'GM') { // CRYSTAL WEIGHT TYPE IN GM
        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSW = (cryGSW * 0.001);
        else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSW = cryGSW;
        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSW = (cryGSW * 1000);
    } else if (cryGSWT == 'MG') { // CRYSTAL WEIGHT TYPE IN MG
        if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSW = (cryGSW * 0.001);
        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSW = cryGSW;
    } else if (cryGSWT == 'CT') { // CRYSTAL WEIGHT TYPE IN CT
        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSW = (cryGSW * 0.0002);
        else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSW = (cryGSW * 0.2);
        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSW = (cryGSW * 200);
    }
    // END CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-09MAR18
    //
    //cryGSW = convertCryWeight(cryGSW, itemGSWT, cryGSWT);
    //
    if (cryPanel == 'deleteCry') {
        if (autoChk) {
            remWt = parseFloat(itemGSW) + parseFloat(cryGSW);
            document.getElementById('sttr_nt_weight').value = parseFloat(remWt).toFixed(3);
//            document.getElementById('totNetWeight').value = parseFloat(remWt).toFixed(3);
            var checked = document.getElementById('noofcrystal').value;
            let noCryCount = document.querySelectorAll('#noOfCry');
            // Get the value of the last input
            let lastInputValue = noCryCount[noCryCount.length - 1]?.value;
            let flag = false;
            for (var i = 0; i <= lastInputValue; i++) {
                if (document.getElementById('sttr_gs_weight_' + i) != null) {
                    flag = true;
                    break;
                }
            }
            if (checked != 0 || flag) {
                if (document.getElementById('totNetWeight') != null) {
                    document.getElementById('totNetWeight').value = parseFloat(remWt).toFixed(3);
                }
                document.getElementById('netWeight').value = parseFloat(remWt).toFixed(3);
            } else {
                if (document.getElementById('totNetWeight') != null) {
                    document.getElementById('totNetWeight').value = parseFloat(document.getElementById('sttr_gs_weight').value).toFixed(3);
                }
                document.getElementById('netWeight').value = parseFloat(document.getElementById('sttr_gs_weight').value).toFixed(3);
            }
//            changeNetWeightByPktWt();
            calculateAddCustWastageWt();
        }
        //
    } else {
        //
        if (autoChk) {
            //
            var gsWt = document.getElementById('sttr_gs_weight').value;
            var gsWtType = document.getElementById('sttr_gs_weight_type').value;
            if (gsWt == '' || gsWt == null) {
                gsWt = 0;
            }
            var pktWeightValue = parseFloat(document.getElementById('sttr_pkt_weight').value) || 0;
            if (document.getElementById('sttr_less_weight') != null) {
                var lessWeightValue = parseFloat(document.getElementById('sttr_less_weight').value) || 0;
            } else {
                var lessWeightValue = 0;
            }
            var pktWt = pktWeightValue + lessWeightValue;
            var pktWtType = document.getElementById('sttr_pkt_weight_type').value;
            if (document.getElementById('sttr_less_weight_type') != null) {
                var lessWtType = document.getElementById('sttr_less_weight_type').value;
            } else {
                var lessWtType = pktWtType;
            }
            if (pktWeightValue == '' || pktWeightValue == null) {
                pktWeightValue = 0;
            }
            //
            if (lessWeightValue == '' || lessWeightValue == null) {
                lessWeightValue = 0;
            }
            //
            //
            var newNetWT = parseFloat(parseFloat(gsWt) - convertWeight(pktWt, gsWtType, pktWtType, lessWtType)).toFixed(3);
            var newPktWT = convertWeight(pktWt, gsWtType, pktWtType, lessWtType);
            var totCryGSW = 0;
            //
            if (document.getElementById('noOfCry').value > 0)
                cryCountGobal = document.getElementById('noOfCry').value;
            if (document.getElementById('totalCrystalCount').value > document.getElementById('noOfCry').value) {
                cryCountGobal = document.getElementById('totalCrystalCount').value;
            }
            for (var i = 1; i <= cryCountGobal; i++) {
                if (document.getElementById('slPrAutoLessCryWt' + i) == null)
                {
                    continue;
                } else {
                    if (sellPanel == 'AddStock') {
                        var finalNtWt = document.getElementById('sttr_gs_weight').value;
                        var itemGSWT = document.getElementById('sttr_gs_weight_type').value;
                        var cryGSW = document.getElementById('sttr_gs_weight_' + i).value;
                        //alert('sttr_gs_weight ==' + document.getElementById('sttr_gs_weight' + i).value);
                        var cryGSWT = document.getElementById('sttr_gs_weight_type_' + i).value;
                        //alert('sttr_gs_weight_type ==' + document.getElementById('sttr_gs_weight_type' + i).value);
                    } else {
                        var finalNtWt = document.getElementById('netWeight').value;
                        var itemGSWT = document.getElementById('netWeight').value;
                        var cryGSW = document.getElementById('slPrCryGSW' + i).value;
                        var cryGSWT = document.getElementById('slPrCryGSWType' + i).value;
                    }
                    //
                    if (document.getElementById('slPrAutoLessCryWt' + i).checked == true) {
                        // START CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-10MAR18
                        if (cryGSWT == 'KG') { // CRYSTAL WEIGHT TYPE IN KG
                            if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
                                cryGSW = cryGSW;
                        } else if (cryGSWT == 'GM') { // CRYSTAL WEIGHT TYPE IN GM
                            if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
                                cryGSW = (cryGSW * 0.001);
                            else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
                                cryGSW = cryGSW;
                            else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
                                cryGSW = (cryGSW * 1000);
                        } else if (cryGSWT == 'MG') { // CRYSTAL WEIGHT TYPE IN MG
                            if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
                                cryGSW = (cryGSW * 0.001);
                            else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
                                cryGSW = cryGSW;
                        } else if (cryGSWT == 'CT') { // CRYSTAL WEIGHT TYPE IN CT
                            if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
                                cryGSW = (cryGSW * 0.0002);
                            else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
                                cryGSW = (cryGSW * 0.2);
                            else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
                                cryGSW = (cryGSW * 200);
                        }
                        // END CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-10MAR18
                        if (document.getElementById('slPrAutoLessCryWt' + i).checked == true)
                            totCryGSW += parseFloat(cryGSW);
                    }
                }
            }

            //
            var NetWT = parseFloat(finalNtWt) - parseFloat(totCryGSW);
            //
            if (newPktWT != '' && cryCount >= 1) {
                var newNtWeight = NetWT - newPktWT;
                remWt = newNtWeight;
            } else {
                remWt = NetWT;
            }

            document.getElementById(gsWtId).value = parseFloat(remWt).toFixed(3);
            if (document.getElementById('totNetWeight') != null) {
                document.getElementById('totNetWeight').value = parseFloat(NetWT).toFixed(3);
            }
            document.getElementById('netWeight').value = parseFloat(NetWT).toFixed(3);
            calculateAddCustWastageWt();
        } else {
            //
            var gsWt = document.getElementById('sttr_gs_weight').value;
            var gsWtType = document.getElementById('sttr_gs_weight_type').value;
            if (gsWt == '' || gsWt == null) {
                gsWt = 0;
            }
            //
            var pktWeightValue = parseFloat(document.getElementById('sttr_pkt_weight').value) || 0;
            if (document.getElementById('sttr_less_weight') != null) {
                var lessWeightValue = parseFloat(document.getElementById('sttr_less_weight').value) || 0;
            } else {
                var lessWeightValue = 0;
            }
            var pktWt = pktWeightValue + lessWeightValue;
            var pktWtType = document.getElementById('sttr_pkt_weight_type').value;
            if (document.getElementById('sttr_less_weight_type') != null) {
                var lessWtType = document.getElementById('sttr_less_weight_type').value;
            } else {
                var lessWtType = pktWtType;
            }
            if (pktWeightValue == '' || pktWeightValue == null) {
                pktWeightValue = 0;
            }
            //
            if (lessWeightValue == '' || lessWeightValue == null) {
                lessWeightValue = 0;
            }
            //
            //
            var newNetWT = parseFloat(parseFloat(gsWt) - convertWeight(pktWt, gsWtType, pktWtType, lessWtType)).toFixed(3);
            var remNTWt;
            remNTWt = parseFloat(itemGSW) + parseFloat(cryGSW);
            if (newNetWT == remNTWt) {
                remWt = parseFloat(itemGSW) + parseFloat(cryGSW);
            } else {
                if (document.getElementById('totNetWeight') != null) {
                    var finalNtWt = document.getElementById('totNetWeight').value;
                } else {
                    var finalNtWt = document.getElementById('sttr_nt_weight').value;
                }
                remWt = parseFloat(finalNtWt) + parseFloat(cryGSW);
            }
            document.getElementById(gsWtId).value = parseFloat(remWt).toFixed(3);
            document.getElementById('sttr_nt_weight').value = parseFloat(remWt).toFixed(3);
            if (document.getElementById('totNetWeight') != null) {
                document.getElementById('totNetWeight').value = parseFloat(remWt).toFixed(3);
                document.getElementById('sttr_nt_weight').value = parseFloat(remWt).toFixed(3);
            }
            //
            document.getElementById(gsWtId).value = parseFloat(remWt).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(remWt).toFixed(3);
            calculateAddCustWastageWt();
        }
        //
        if (sellPanel == 'AddStock') {
            if (document.getElementById('suppPanelName').value == 'AddSuppStock') {
                addInvoiceValue();
                calcFuncSupplierFineJewelleryPurchase();
            } else {
                calStockItemPrice();
            }
        } else if (sellPanel == 'ItemSell') {
            calculateSellPrice();
        } else {
            calculateWhSellLotPrice();
        }
    }
}

/*******************Start to add function @Author:SHRI03AUG16***********************/
function autoSellLessWeight(cryCount, autoChk, gsWtId, wtTypId, cryPanel, sellPanel) {

    var remWt = 0;
    if (document.getElementById('slPrCryGSW' + cryCount).value == '' || document.getElementById('slPrCryGSW' + cryCount).value == 'NaN')
        document.getElementById('slPrCryGSW' + cryCount).value = 0;
    var cryGSW = document.getElementById('slPrCryGSW' + cryCount).value;
    var cryGSWT = document.getElementById('slPrCryGSWType' + cryCount).value;
    var itemGSW = document.getElementById('slPrItemGSW').value;
    var itemGSWT = document.getElementById('slPrItemGSWT').value;
    // START CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-09MAR18
    if (cryGSWT == 'KG') { // CRYSTAL WEIGHT TYPE IN KG
        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSW = cryGSW;
    } else if (cryGSWT == 'GM') { // CRYSTAL WEIGHT TYPE IN GM
        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSW = (cryGSW * 0.001);
        else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSW = cryGSW;
        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSW = (cryGSW * 1000);
    } else if (cryGSWT == 'MG') { // CRYSTAL WEIGHT TYPE IN MG
        if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSW = (cryGSW * 0.001);
        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSW = cryGSW;
    } else if (cryGSWT == 'CT') { // CRYSTAL WEIGHT TYPE IN CT
        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSW = (cryGSW * 0.0002);
        else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSW = (cryGSW * 0.2);
        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSW = (cryGSW * 200);
    }
    // END CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-09MAR18

    if (cryPanel == 'deleteCry') {

        if (autoChk) {
            remWt = parseFloat(itemGSW) + parseFloat(cryGSW);
            document.getElementById('slPrItemNTW').value = parseFloat(remWt).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(remWt).toFixed(3);
            changeNetWeightByPktWt();
        }

    } else {
        if (autoChk) {

            var gsWt = document.getElementById('slPrItemGSW').value;
            var gsWtType = document.getElementById('slPrItemGSWT').value;
            if (gsWt == '' || gsWt == null) {
                gsWt = 0;
            }

            var pktWeightValue = parseFloat(document.getElementById('slPrPacketWeight').value) || 0;
            var lessWeightValue = parseFloat(document.getElementById('slPrLessWeight').value) || 0;
            var pktWt = pktWeightValue + lessWeightValue;
            var pktWtType = document.getElementById('slPrPacketWeightType').value;
            var lessWtType = document.getElementById('slPrLessWeightType').value;
            if (pktWeightValue == '' || pktWeightValue == null) {
                pktWeightValue = 0;
            }
            //
            if (lessWeightValue == '' || lessWeightValue == null) {
                lessWeightValue = 0;
            }

            var newNetWT = parseFloat(parseFloat(gsWt) - convertWeight(pktWt, gsWtType, pktWtType, lessWtType)).toFixed(3);
            var newPktWT = convertWeight(pktWt, gsWtType, pktWtType, lessWtType);
            var finalNtWt = document.getElementById('slPrItemGSW').value;
            var totCryGSW = 0;
            if (document.getElementById('noOfCry').value > 0)
                cryCountGobal = document.getElementById('noOfCry').value;

//            var temp = document.getElementById('maincry').value;
//            let delarray = temp.split("*");
            cryCountGobal = document.getElementById('totalCrystalCount').value;
            for (var i = 1; i <= cryCountGobal; i++) {
                if (!document.getElementById('slPrCryGSW' + i))
                {
                    continue;
                }
                var itemGSWT = document.getElementById('slPrItemGSWT').value;
                var cryGSW = document.getElementById('slPrCryGSW' + i).value;
                var cryGSWT = document.getElementById('slPrCryGSWType' + i).value;
                // START CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-09MAR18
                if (cryGSWT == 'KG') { // CRYSTAL WEIGHT TYPE IN KG
                    if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
                        cryGSW = cryGSW;
                } else if (cryGSWT == 'GM') { // CRYSTAL WEIGHT TYPE IN GM
                    if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
                        cryGSW = (cryGSW * 0.001);
                    else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
                        cryGSW = cryGSW;
                    else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
                        cryGSW = (cryGSW * 1000);
                } else if (cryGSWT == 'MG') { // CRYSTAL WEIGHT TYPE IN MG
                    if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
                        cryGSW = (cryGSW * 0.001);
                    else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
                        cryGSW = cryGSW;
                } else if (cryGSWT == 'CT') { // CRYSTAL WEIGHT TYPE IN CT
                    if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
                        cryGSW = (cryGSW * 0.0002);
                    else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
                        cryGSW = (cryGSW * 0.2);
                    else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
                        cryGSW = (cryGSW * 200);
                }
                // END CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-09MAR18

                if (document.getElementById('slPrAutoLessCryWt' + i).checked == true) {
                    totCryGSW += Math.abs(parseFloat(cryGSW));
                }

            }

            var NetWT = parseFloat(finalNtWt) - parseFloat(totCryGSW);
            if (newPktWT != '' && cryCount >= 1) {
                var newNtWeight = NetWT - newPktWT;
                remWt = newNtWeight;
            } else {
                remWt = NetWT;
            }

            document.getElementById('slPrItemNTW').value = parseFloat(remWt).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(remWt).toFixed(3);
            if (document.getElementById('sttr_mkg_discount_per_onload') != null) {
                document.getElementById('sttr_mkg_discount_per_onload').value = '';
                document.getElementById('ProductMainMkgChrgsForDiscIncPer').value = document.getElementById('sttr_mkg_per_old').value;
            }

        } else {

            var gsWt = document.getElementById('slPrItemGSW').value;
            var gsWtType = document.getElementById('slPrItemGSWT').value;
            if (gsWt == '' || gsWt == null) {
                gsWt = 0;
            }


            var pktWeightValue = parseFloat(document.getElementById('slPrPacketWeight').value) || 0;
            var lessWeightValue = parseFloat(document.getElementById('slPrLessWeight').value) || 0;
            var pktWt = pktWeightValue + lessWeightValue;
            var pktWtType = document.getElementById('slPrPacketWeightType').value;
            var lessWtType = document.getElementById('slPrLessWeightType').value;
            if (pktWeightValue == '' || pktWeightValue == null) {
                pktWeightValue = 0;
            }
            //
            if (lessWeightValue == '' || lessWeightValue == null) {
                lessWeightValue = 0;
            }
            //
            var newNetWT = parseFloat(parseFloat(gsWt) - convertWeight(pktWt, gsWtType, pktWtType, lessWtType)).toFixed(3);
            var remNTWt;
            remNTWt = parseFloat(itemGSW) + parseFloat(cryGSW);
            if (newNetWT == remNTWt) {
                remWt = parseFloat(itemGSW) + parseFloat(cryGSW);
            } else {
                var finalNtWt = document.getElementById('netWeight').value;
                remWt = parseFloat(finalNtWt) + parseFloat(cryGSW);
            }
            document.getElementById('slPrItemNTW').value = parseFloat(remWt).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(remWt).toFixed(3);
            if (document.getElementById('sttr_mkg_discount_per_onload') != null) {
                document.getElementById('sttr_mkg_discount_per_onload').value = '';
                document.getElementById('slPrItemLabCharges').value = document.getElementById('sttr_mkg_per_old').value;
            }
        }
        calculateCustWastageWt();
        calculateSellPrice();
    }
}

function nwautoLessWeight(cryCount, autoChk, gsWtId, wtTypId, cryPanel, sellPanel) {

    var remWt = 0;
    if (sellPanel == 'AddStock') {
        if (document.getElementById('nwOrCryGSW' + cryCount).value == '' || document.getElementById('nwOrCryGSW' + cryCount).value == 'NaN')
            document.getElementById('nwOrCryGSW' + cryCount).value = 0;
        cryGSW = document.getElementById('nwOrCryGSW' + cryCount).value;
        cryGSWT = document.getElementById('nwOrCryGSWType' + cryCount).value;
    } else {
        if (document.getElementById('slPrCryGSW' + cryCount).value == '' || document.getElementById('slPrCryGSW' + cryCount).value == 'NaN')
            document.getElementById('slPrCryGSW' + cryCount).value = 0;
        var cryGSW = document.getElementById('slPrCryGSW' + cryCount).value;
        var cryGSWT = document.getElementById('slPrCryGSWType' + cryCount).value;
    }
    if (document.getElementById('nwOrItemNetWeight').value == '' || document.getElementById('nwOrItemNetWeight').value == 'NaN')
        document.getElementById('nwOrItemNetWeight').value = 0;
//alert(document.getElementById('netWeight').value);
    var itemGSW = parseFloat(document.getElementById('nwOrItemNetWeight').value);
    var itemGSWT = document.getElementById(wtTypId).value;
    //var itemMainGSW = parseFloat(document.getElementById('grossWeight').value);

    cryGSW = convertCryWeight(cryGSW, itemGSWT, cryGSWT);
    if (cryPanel == 'deleteCry') {
        if (autoChk) {
            remWt = parseFloat(itemGSW) + parseFloat(cryGSW);
            alert('PlusremWt' + remWt);
            document.getElementById('netWeight').value = parseFloat(remWt).toFixed(3);
            changeNetWeightByPktWt();
        }
    } else {
        if (autoChk) {

            var gsWt = document.getElementById('nwOrItemGrossWeight').value;
            var gsWtType = document.getElementById('nwOrItemGrossWeightType').value;
            if (gsWt == '' || gsWt == null) {
                gsWt = 0;
            }

//            var pktWt = document.getElementById('sttr_pkt_weight').value;
//            var pktWtType = document.getElementById('sttr_pkt_weight_type').value;
//            if (pktWt == '' || pktWt == null) {
//                pktWt = 0;
//            } 

//            var newNetWT = parseFloat(parseFloat(gsWt) - convertWeight(pktWt, gsWtType, pktWtType)).toFixed(3);
            var newNetWT = document.getElementById('nwOrItemNetWeight').value;
            //alert('newNetWT='+newNetWT);

            var remNTWt;
            remNTWt = parseFloat(itemGSW) - parseFloat(cryGSW);
            if (newNetWT == itemGSW) {

                remWt = parseFloat(itemGSW) - parseFloat(cryGSW);
                //alert('MyyyyyremWt='+remWt);

            } else {
                var NetWT = parseFloat(newNetWT) - parseFloat(cryGSW);
                //alert('NNNNetWT='+NetWT);
                remWt = NetWT;
            }


//            if (document.getElementById('addPanel').value != 'UpdateStock')
//            changeNetWeightByPktWt();
//            remWt = parseFloat(itemGSW) - parseFloat(cryGSW);
//            
//            
//            alert('Minus'+remWt);
        } else {

            var gsWt = document.getElementById('nwOrItemGrossWeight').value;
            var gsWtType = document.getElementById('nwOrItemGrossWeightType').value;
            if (gsWt == '' || gsWt == null) {
                gsWt = 0;
            }
            var pktWeightValue = parseFloat(document.getElementById('slPrPacketWeight').value) || 0;
            var lessWeightValue = parseFloat(document.getElementById('slPrLessWeight').value) || 0;
            var pktWt = pktWeightValue + lessWeightValue;
            var pktWtType = document.getElementById('slPrPacketWeightType').value;
            var lessWtType = document.getElementById('slPrLessWeightType').value;
            if (pktWeightValue == '' || pktWeightValue == null) {
                pktWeightValue = 0;
            }
            //
            if (lessWeightValue == '' || lessWeightValue == null) {
                lessWeightValue = 0;
            }
            //
            var newNetWT = parseFloat(parseFloat(gsWt) - convertWeight(pktWt, gsWtType, pktWtType, lessWtType)).toFixed(3);

//alert('newNetWT='+newNetWT);
            var newNetWT = document.getElementById('nwOrItemNetWeight').value;
            var remNTWt;
//            remNTWt = parseFloat(itemGSW) + parseFloat(cryGSW);



            if (newNetWT == remNTWt) {

                remWt = parseFloat(itemGSW) + parseFloat(cryGSW);
                //alert('MyyyyyremWt='+remWt);

            } else {
//                var NetWT = parseFloat(parseFloat(newNetWT) - convertWeight(pktWt, gsWtType, pktWtType)).toFixed(3);
//alert('NNNNetWT='+NetWT);

                var NetWT = newNetWT;
                remWt = parseFloat(document.getElementById(gsWtId).value);
                ;
            }
        }
//        document.getElementById(gsWtId).value = parseFloat(remWt).toFixed(3);

        document.getElementById('nwOrItemNetWeight').value = parseFloat(remWt).toFixed(3);
        //alert(document.getElementById('netWeight').value = parseFloat(remWt).toFixed(3));

//        if (document.getElementById('addPanel').value != 'UpdateStock')
//            changeNetWeightByPktWt();


        if (sellPanel == 'AddStock') {
            calcNwOrItemPrice();
        } else if (sellPanel == 'ItemSell') {
            calculateSellPrice();
        } else {
            calculateWhSellLotPrice();
        }
    }

}

function convertWeight(wtBal, to, from, from1) {
//    alert('wtBal=' + wtBal);
//     alert('to=1=' + to);
//     alert('from=' + from);
    var convertedWt = 0;
    if (wtBal != '') {
        if (to == 'KG') {
            if (from == 'KG' || from1 == 'KG') {
                convertedWt = parseFloat(wtBal).toFixed(3);
            } else if (from == 'GM' || from == 'CT' || from1 == 'GM' || from1 == 'CT') {
                convertedWt = parseFloat(wtBal / 1000).toFixed(3);
            } else if (from == 'MG' || from1 == 'MG') {
                convertedWt = parseFloat((wtBal / (1000 * 1000))).toFixed(3);
            }
        } else if (to == 'GM') {
            if (from == 'KG' || from1 == 'KG') {
                convertedWt = parseFloat((wtBal * 1000)).toFixed(3);
            } else if (from == 'GM' || from == 'CT' || from1 == 'GM' || from1 == 'CT') {
                convertedWt = parseFloat(wtBal).toFixed(3);
            } else if (from == 'MG' || from1 == 'MG') {
                convertedWt = parseFloat((wtBal / (1000))).toFixed(3);
            }
        } else if (to == 'MG') {
            if (from == 'KG' || from1 == 'KG') {
                convertedWt = parseFloat((wtBal * 1000 * 1000)).toFixed(3);
            } else if (from == 'GM' || from1 == 'GM') {
                convertedWt = parseFloat((wtBal * 1000)).toFixed(3);
            } else if (from == 'MG' || from1 == 'MG') {
                convertedWt = parseFloat((wtBal)).toFixed(3);
            }
        } else if (to == 'CT') {
//            alert('to=' + to);
// START CODE FOR CT : DARSHANA 21 JULY 2021
            if (from == 'KG' || from1 == 'KG') {
                convertedWt = parseFloat((wtBal * 5000)).toFixed(3);
            } else if (from == 'GM' || from1 == 'GM') {
                convertedWt = parseFloat((wtBal * 5)).toFixed(3);
            } else if (from == 'MG' || from1 == 'MG') {
                convertedWt = parseFloat((wtBal * 0.005)).toFixed(3);
            } else if (from == 'CT' || from1 == 'CT') {
                convertedWt = parseFloat(wtBal).toFixed(3);
            }
        }
    }
//    alert('convertedWt=' + convertedWt);
    return convertedWt;
}
function convertCryWeight(weight, weightType, cryGSWT) {
//    alert(weightType);
//    alert(cryGSWT);
    var totalWeight = 0;
    if (cryGSWT == 'GM') {
        if (weightType == 'KG') {
            totalWeight = weight / 1000;
            return totalWeight;
        } else if (weightType == 'MG') {
            totalWeight = weight * (1000);
            return totalWeight;
        } else if (weightType == 'GM') {
            return weight;
        }
    }
    if (cryGSWT == 'KG') {
        if (weightType == 'KG') {
            return weight;
        } else if (weightType == 'MG') {
            totalWeight = weight * 1000 * 1000;
            return totalWeight;
        } else if (weightType == 'GM') {
            totalWeight = weight * 1000;
            return totalWeight;
        }
    }
    if (cryGSWT == 'MG') {
        if (weightType == 'KG') {
            totalWeight = weight / (1000 * 1000);
            return totalWeight;
        } else if (weightType == 'MG') {
            return weight;
        } else if (weightType == 'GM') {
            totalWeight = weight / 1000;
            return totalWeight;
        }
    }
    if (cryGSWT == 'CT') {
        if (weightType == 'KG') {
            totalWeight = (weight / 5) / (1000 * 1000);
            return totalWeight;
        } else if (weightType == 'MG') {
            return (weight / 5) * 1000;
        } else if (weightType == 'GM') {
            totalWeight = weight / 5;
            return totalWeight;
        }
    }
}
function crystalWeightLess(sellPanel) {
//    var sellPanel = 'AddStock';
    var count = 1;
    var delId = 'del' + count;
    var remWt = 0;
    if (noOfCrystal == '' || noOfCrystal == undefined) {
        noOfCrystal = document.getElementById("noOfCry").value;
    }
    var crystalCount = noOfCrystal;
    var finalWeight = 0;
    var totCrystalWeight = 0;
    if (crystalCount === undefined) {
        crystalCount = '';
    }
    var itemGSW = parseFloat(document.getElementById('netWeight').value);
    var itemGSWT = document.getElementById('sttr_nt_weight_type').value;
    for (var dc = count; dc <= crystalCount; dc++) {
        if (document.getElementById('del' + dc).value != 'Deleted') {
            if (sellPanel == 'AddStock') {
                var autoChk = document.getElementById('slPrAutoLessCryWt' + dc).checked;
                if (document.getElementById('sttr_gs_weight_' + dc).value == '' || document.getElementById('sttr_gs_weight_type_' + dc).value == 'NaN')
                    document.getElementById('sttr_gs_weight_' + dc).value = 0;
                var cryGSW = document.getElementById('sttr_gs_weight_' + dc).value;
                var cryGSWT = document.getElementById('sttr_gs_weight_type_' + dc).value;
            } else {
                var autoChk = document.getElementById('sttr_wt_auto_less' + dc).checked;
                if (document.getElementById('sttr_gs_weight' + dc).value == '' || document.getElementById('sttr_gs_weight_type' + dc).value == 'NaN')
                    document.getElementById('sttr_gs_weight' + dc).value = 0;
                var cryGSW = document.getElementById('sttr_gs_weight' + dc).value;
                var cryGSWT = document.getElementById('sttr_gs_weight_type' + dc).value;
            }

            cryGSW = convertCryWeight(cryGSW, itemGSWT, cryGSWT);
            if (autoChk) {
                totCrystalWeight = parseFloat(totCrystalWeight) + parseFloat(cryGSW);
            }
            remWt = parseFloat(itemGSW) - totCrystalWeight;
            if (document.getElementById('netWeight').value == '' || document.getElementById('netWeight').value == 'NaN')
                document.getElementById('netWeight').value = 0;
            document.getElementById('sttr_nt_weight').value = parseFloat(remWt).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(remWt).toFixed(3);
            if (document.getElementById('addPanel').value != 'UpdateStock')
                changeNetWeightByPktWt();
            if (sellPanel == 'AddStock') {
                calStockItemPrice();
            } else if (sellPanel == 'ItemSell') {
                calculateSellPrice();
            } else {
                calculateWhSellLotPrice();
            }
        }
    }
//    alert(itemGSW);
//    alert(totCrystalWeight);

}
/*******************End to add function @Author:SHRI03AUG16***********************/
function searchTunchForPanelBlank() {
    document.getElementById("tunchListDivToAddTUNCH").innerHTML = '';
}
////start code to change poststr id names @auth:athu5jun17
function searchTunch(tunchValue, panelName, keyCodeInput, metalType, tunchId, nextId, prevId, documentRootPath) {
//alert(metalType);
    keyCodeForTunchValue = keyCodeInput;
    keyCodeForTunchValueOption = 0;
    tunchDivId = tunchId;
    tunchDivCount = panelName;
    nextFieldId = nextId;
    prevFieldId = prevId;
    var poststr = "TunchValue=" + encodeURIComponent(tunchValue) +
            "&panelName=" + encodeURIComponent(panelName) +
            "&metalType=" + encodeURIComponent(metalType);
    if (panelName == 'AddWhStockPanel' || panelName == 'AddStockPanel') {
        poststr += "&netWeightFieldId=sttr_nt_weight" +
                "&fineWeightFieldId=sttr_fine_weight" +
                "&finalFineWeightFieldId=sttr_final_fine_weight" +
                "&tunchDivClass=form-control-select20-font12 placeholderClass";
    } else if (panelName == 'SellPurchase') {
        poststr += "&netWeightFieldId=slPrItemNTW" +
                "&fineWeightFieldId=slPrItemFineWeight" +
                "&finalFineWeightFieldId=slPrItemFFineWeight" +
                "&tunchDivClass=form-control-select20-font12 placeholderClass";
    }
    search_tunch(documentRootPath + "/include/php/ogiatnsl" + default_theme + ".php", poststr);
}
var keyCodeForTunchValue;
var keyCodeForTunchValueOption = 0;
var keyCodeForTunchValueOptionCount;
var keyCodeForTunchValueOptionPrev = 0;
var tunchDivId = '';
var tunchDivCount = '';
function search_tunch(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchTunch;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//*********Start code to add condition for Fine Invoice Panel:Author:SANT18NOV16*****
function alertSearchTunch() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (tunchDivCount == 'AddInvoice') {
            document.getElementById("tunchListDivToAddFineTUNCH").innerHTML = xmlhttp.responseText;
            document.getElementById('tunchListToAddFineTunchSelect').focus();
            keyCodeForRoiValueOptionPrev = keyCodeForRoiValueOption;
            document.getElementById('tunchListToAddFineTunchSelect').options[keyCodeForRoiValueOptionPrev].selected = false;
            document.getElementById('tunchListToAddFineTunchSelect').options[keyCodeForRoiValueOption].selected = true;
            document.getElementById(tunchDivId).focus();
        } else {
            document.getElementById("tunchListDivToAddTUNCH").innerHTML = xmlhttp.responseText;
            document.getElementById('tunchListToAddTunchSelect').focus();
            keyCodeForRoiValueOptionPrev = keyCodeForRoiValueOption;
//  START HIDE THIS FOR  FOR OLD METAL CUSTMER PURCHASE SETTING BY FINAL VALUVATION @AUTHOR-YUVRAJ KAMBLE - 09122021
//            document.getElementById('tunchListToAddTunchSelect').options[keyCodeForRoiValueOptionPrev].selected = false; 
//            document.getElementById('tunchListToAddTunchSelect').options[keyCodeForRoiValueOption].selected = true;
//  END HIDE THIS FOR  FOR OLD METAL CUSTMER PURCHASE SETTING BY FINAL VALUVATION @AUTHOR-YUVRAJ KAMBLE - 09122021
            document.getElementById(tunchDivId).focus();
        }
        if (tunchDivCount == 'SellPurchase') {
            calculateSellPrice();
        } else if (tunchDivCount == 'AddInvoice') {
            calcFuncSupplierFineJewelleryPurchase();
        } else {
            calStockItemPrice();
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//*********End code to add condition for Fine Invoice Panel:Author:SANT18NOV16*****
function getTunchValById(tunchId, panelName, metalType, documentRootPath) {
//    alert(tunchId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelName == 'AddInvoice') {
                document.getElementById("itemFineTunchDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("tunchSelDiv").innerHTML = xmlhttp.responseText;
            }
            document.getElementById(tunchDivId).focus();
            if (panelName == 'SellPurchase') {
                calculateSellPrice();
            } else if (panelName == 'SellByLot') {
                calculateWhSellLotPrice();
            } else if (panelName == 'AddInvoice') {
                calcFuncSupplierFineJewelleryPurchase();
            } else {
                calStockItemPrice();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
    xmlhttp.open("POST", documentRootPath + "/include/php/ogtnsid" + default_theme + ".php?tunchId=" + tunchId + "&panelName=" + panelName + "&tunchDivId=" + tunchDivId + "&metalType=" + metalType + "&nextFieldId=" + nextFieldId + "&prevFieldId=" + prevFieldId, true);
    xmlhttp.send();
}
/*********** Start Code to add function @Author:SHRI08SEP16 **********************/
function deleteRawStockMetalItm(rwstId, mainPanel, pageNum, rowsPerPage, metalType, metalRateId, rawMetalType) {
//    alert(metalType+'-'+rawMetalType);
//    alert(mainPanel);
    confirm_box = confirm(deleteAlertMess + "\nDo you really want to delete this Main Stock Item?"); //change in line @AUTHOR: SANDY28JAN14
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("rawPanelPurchaseList").innerHTML = xmlhttp.responseText;
                window.setTimeout(rawMetalStockFunctionCloseDiv, 1000);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogrmdelt" + default_theme + ".php?rwprId=" + rwstId + "&mainPanel=" + mainPanel +
                "&pageNum=" + pageNum + "&rowsPerPage=" + rowsPerPage + "&metalType=" + metalType + "&metalRateId=" + metalRateId + "&rawMetalType=" + rawMetalType, true);
        xmlhttp.send();
    }
}
function rawMetalStockFunctionCloseDiv() {
    document.getElementById('messDisplayDiv').innerHTML = '';
}
/*********** End Code to add function @Author:SHRI08SEP16 **********************/
/*****<!--description: START CODE TO Add customerStatement @Author: DISH08OCT16-->******/
function custStatementDetails(custId, custFirmId) {

    var poststr = "custId=" + custId +
            "&firmId=" + custFirmId;
    cust_udhaar_details('include/php/ogcstdet' + default_theme + '.php', poststr);
}

/*****<!--description: END CODE TO Add customerStatement @Author: DISH08OCT16-->******/
/******description: START CODE TO Add customerStatement @Author: DISH08OCT16******/
function searchStatTranDetails(ddDetVal, firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, ddPanelToShow, ddMainPanel, custId) {
    if (valDailyDiaryInputs()) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("CustStmDivs").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        var dailyDiaryFromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var dailyDiaryToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        xmlhttp.open("POST", "include/php/omddddandv_1" + default_theme + ".php?ddDetVal=" + ddDetVal + "&firmId=" + firmId + "&dailyDiaryFromDate=" + dailyDiaryFromDate + "&dailyDiaryToDate=" + dailyDiaryToDate + "&ddPanelToShow=" + ddPanelToShow + "&ddMainPanel=" + ddMainPanel + "&custId=" + custId, true);
        xmlhttp.send();
    }
}

/******description: START CODE TO Add customerStatement @Author: DISH14NOV16******/
function searchCustStatTranDetails(firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, custId) {

    if (valDailyDiaryInputs()) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("CustStmDivs").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        var dailyDiaryFromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var dailyDiaryToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        xmlhttp.open("POST", "include/php/omddddandv_1" + default_theme + ".php?firmId=" + firmId + "&dailyDiaryFromDate=" + dailyDiaryFromDate + "&dailyDiaryToDate=" + dailyDiaryToDate + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
/******description: END CODE TO Add customerStatement @Author: DISH14NOV16******/


/******description: START CODE TO Sell Invoice Change to User @Author: Bajrang7APR18******/
//function sellinvconvert(userid,slPrPreInvoiceNo,slPrInvoiceNo) {
////    alert('userid == ' + userid);
////    alert('slPrPreInvoiceNo == ' + slPrPreInvoiceNo);
////    alert('slPrInvoiceNo == ' + slPrInvoiceNo);
//    loadXMLDoc();
//
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("sellMainDiv").innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//
//    };
//        xmlhttp.open("POST", "include/php/omsellinvcon"+ default_theme +".php?userid=" + userid + "&slPrPreInvoiceNo=" + slPrPreInvoiceNo + "&slPrInvoiceNo=" + slPrInvoiceNo, true);
//        xmlhttp.send();
//
//            }
/******description: END CODE TO Sell Invoice Change to User @Author: Bajrang7APR18******/

/**************Start code to add function @Author:SHRI05NOV16***************/
function valKeyPressedForNumNChar(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if ((charCode == 8 || charCode == 13) || (charCode > 96 && charCode < 123) || (charCode > 47 && charCode < 58)) {
        return true;
    } else if ((charCode < 65 || charCode > 90)) {
        return false;
    }
    return true;
}
function calcMetalRateCut(prefix) {
//alert("calcMetalRateCut");
    var slBal = 0;
    var gdBal = 0;
    var slMetalTyp = document.getElementById(prefix + 'SilverTotFineWtType').value;
    if (document.getElementById(prefix + 'SilverWtPrevBal').value == '' || document.getElementById(prefix + 'SilverWtPrevBal').value == 'NaN')
        document.getElementById(prefix + 'SilverWtPrevBal').value = 0;
    if (document.getElementById(prefix + 'SilverTotFineWt').value == '' || document.getElementById(prefix + 'SilverTotFineWt').value == 'NaN')
        document.getElementById(prefix + 'SilverTotFineWt').value = 0;
    if ((document.getElementById(prefix + 'SilverWtRecBal').value).trim() == '' || document.getElementById(prefix + 'SilverWtRecBal').value == 'NaN') {
        document.getElementById(prefix + 'SilverWtRecBal').value = 0;
    }

//    if (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR') {
//        slBal = parseFloat(parseFloat(document.getElementById(prefix + 'SilverTotFineWt').value) - parseFloat(document.getElementById(prefix + 'SilverWtPrevBal').value)).toFixed(3);
//    } else {
//        slBal = parseFloat(parseFloat(document.getElementById(prefix + 'SilverTotFineWt').value) + parseFloat(document.getElementById(prefix + 'SilverWtPrevBal').value)).toFixed(3);
//    }
//
//    if (slBal < 0) {
//        document.getElementById(prefix + 'RtCtSlCRDR').value = 'CR';
//    } else {
//        document.getElementById(prefix + 'RtCtSlCRDR').value = 'DR';
//    }
//    var rtCtCRDRID = document.getElementById(prefix + 'RtCtSlCRDR');
//    alert('silverAdvMt');

    slBal = calcWeightBalance(prefix, document.getElementById(prefix + 'SilverWtPrevBalCRDR').value, document.getElementById(prefix + 'SilverWtPrevBal').value, document.getElementById(prefix + 'SilverTotFineWt').value, document.getElementById(prefix + 'SilverWtRecBal').value, document.getElementById(prefix + 'RtCtSlCRDR'));
    var gdMetalTyp = document.getElementById(prefix + 'GoldTotFineWtType').value;
    //alert('gdMetalTyp == ' + gdMetalTyp);

    if (document.getElementById(prefix + 'GoldWtPrevBal').value == '' || document.getElementById(prefix + 'GoldWtPrevBal').value == 'NaN')
        document.getElementById(prefix + 'GoldWtPrevBal').value = 0;
    if (document.getElementById(prefix + 'GoldTotFineWt').value == '' || document.getElementById(prefix + 'GoldTotFineWt').value == 'NaN')
        document.getElementById(prefix + 'GoldTotFineWt').value = 0;
    if ((document.getElementById(prefix + 'GoldWtRecBal').value).trim() == '' || document.getElementById(prefix + 'GoldWtRecBal').value == 'NaN') {
        document.getElementById(prefix + 'GoldWtRecBal').value = 0;
    }

//    if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR') {
//        gdBal = parseFloat(parseFloat(document.getElementById(prefix + 'GoldTotFineWt').value) - parseFloat(document.getElementById(prefix + 'GoldWtPrevBal').value)).toFixed(3);
//    } else {
//        gdBal = parseFloat(parseFloat(document.getElementById(prefix + 'GoldTotFineWt').value) + parseFloat(document.getElementById(prefix + 'GoldWtPrevBal').value)).toFixed(3);
//    }
//
//    if (gdBal < 0) {
//        document.getElementById(prefix + 'RtCtGdCRDR').value = 'CR';
//    } else {
//        document.getElementById(prefix + 'RtCtGdCRDR').value = 'DR';
//    }
//    rtCtCRDRID = document.getElementById(prefix + 'RtCtGdCRDR');
//    alert('goldAdvMt');

    gdBal = calcWeightBalance(prefix, document.getElementById(prefix + 'GoldWtPrevBalCRDR').value, document.getElementById(prefix + 'GoldWtPrevBal').value, document.getElementById(prefix + 'GoldTotFineWt').value, document.getElementById(prefix + 'GoldWtRecBal').value, document.getElementById(prefix + 'RtCtGdCRDR'));
    //alert(gdBal);

    if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
        document.getElementById(prefix + 'PayGoldWtBal').value = gdBal;
        if (document.getElementById(prefix + 'PayGoldWtBal').value == 'NaN' || document.getElementById(prefix + 'PayGoldWtBal').value == '') {
            document.getElementById(prefix + 'PayGoldWtBal').value = 0;
        }
        document.getElementById(prefix + 'PayGoldWtBalType').value = gdMetalTyp;
        if ((document.getElementById("payPanelName").value != 'InvoicePayUp' &&
                document.getElementById("payPanelName").value != 'NwOrDelPaymentUp' &&
                document.getElementById("payPanelName").value != 'SuppOrderDeliveryUp' &&
                document.getElementById("payPanelName").value != 'StockPayUp' &&
                document.getElementById("payPanelName").value != 'SellPayUp' &&
                document.getElementById("payPanelName").value != 'RawPayUp' &&
                document.getElementById("payPanelName").value != 'SuppOrderUp' &&
                document.getElementById("payPanelName").value != 'NwOrPayUp') &&
                document.getElementById('paymentMode').value == 'RateCut') { //add panel for order panel prev balance :Author:SANT01DEC16
            document.getElementById(prefix + 'GoldRtCtWtBal').value = parseFloat(gdBal);
            document.getElementById(prefix + 'GoldRtCtWtBalType').value = gdMetalTyp;
            document.getElementById('metal1RtCtWtBal').value = parseFloat(gdBal) + ' ' + gdMetalTyp; //Add Value this variable:Author:SANT24OCT16
//           alert(document.getElementById(prefix + 'GoldRtCtWtBal').value);
        }

        document.getElementById(prefix + 'PaySilverWtBal').value = slBal;
        if (document.getElementById(prefix + 'PaySilverWtBal').value == 'NaN' || document.getElementById(prefix + 'PaySilverWtBal').value == '') {
            document.getElementById(prefix + 'PaySilverWtBal').value = 0;
        }
        document.getElementById(prefix + 'PaySilverWtBalType').value = slMetalTyp;
        if ((document.getElementById("payPanelName").value != 'InvoicePayUp' &&
                document.getElementById("payPanelName").value != 'NwOrDelPaymentUp' &&
                document.getElementById("payPanelName").value != 'SuppOrderDeliveryUp' &&
                document.getElementById("payPanelName").value != 'StockPayUp' &&
                document.getElementById("payPanelName").value != 'SellPayUp' &&
                document.getElementById("payPanelName").value != 'RawPayUp' &&
                document.getElementById("payPanelName").value != 'SuppOrderUp' &&
                document.getElementById("payPanelName").value != 'NwOrPayUp') &&
                document.getElementById('paymentMode').value == 'RateCut') { //add panel for order panel prev balance :Author:SANT01DEC16
            document.getElementById(prefix + 'SilverRtCtWtBal').value = slBal;
            document.getElementById(prefix + 'SilverRtCtWtBalType').value = slMetalTyp;
            document.getElementById('metal2RtCtWtBal').value = slBal + ' ' + slMetalTyp; //Add Value this variable:Author:SANT24OCT16
        }
    }

    document.getElementById(prefix + 'GoldWtFinBal').value = gdBal;
    document.getElementById(prefix + 'GoldWtFinBalType').value = gdMetalTyp;
    if (document.getElementById('metal1WtFinBal'))
        document.getElementById('metal1WtFinBal').value = gdBal + ' ' + gdMetalTyp;
    document.getElementById(prefix + 'SilverWtFinBal').value = slBal;
    document.getElementById(prefix + 'SilverWtFinBalType').value = slMetalTyp;
    if (document.getElementById('metal2WtFinBal'))
        document.getElementById('metal2WtFinBal').value = slBal + ' ' + slMetalTyp;
}
/**************End code to add function @Author:SHRI05NOV16***************/
//-----------------START DISH14NOV16-----------------------//
function showWSStockItemDetailsDiv_1(documentRoot, itemCategory, metalType, panelName, stockType, itemName, CrysName) {
//    alert(CrysName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStockCurrentInvoice").innerHTML = xmlhttp.responseText; //change in div name @AUTHOR: SANDY25SEP13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (stockType == 'CrystalStock') {
        xmlhttp.open("POST", "include/php/ogcrinvd_1" + default_theme + ".php?panelName=" + panelName + "&itemCategory=" + itemCategory + "&itemName=" + itemName + "&CrysName=" + CrysName, true);
    } else {
        xmlhttp.open("POST", "include/php/ogwastlt" + default_theme + ".php?panelName=" + panelName + "&itemCategory=" + itemCategory + "&stockType=" + stockType + "&metalType=" + metalType + "&itemName=" + itemName, true);
    }
    xmlhttp.send();
}
//-----------------END DISH14NOV16-----------------------//
//*****************START CODE to set Back Button : DISH14NOV16**************************//
function navigateBackToStockPanel_1(documentRootPath, panel, page) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'udhaarList' || panel == 'StockList' || panel == 'RawList' || panel == 'CurrentCrystalStockList')
                document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            else if (panel == 'retailPurchaseList')
                document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
            else
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogcrmnlt" + default_theme + ".php?listPanel=CurrentCrystalStockList", true);
    xmlhttp.send();
}
//*****************END CODE to set Back Button : DISH14NOV16**************************//
/**************START code to add new function***********:DISH14NOV16****************************/
function showSlPrInvDiv_1(srchItemPreId, srchItemPostId, custId, panelName) {
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase(); //chnaged @OMMODTAG PRIYA_05MAY15
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            if (res == 'G' || res == 'S' || res == 'O') {
                searchItemNames(itemName, metalType, divNum, keyCodeInput);
            }
            if (firstChar == 'R') {
                document.getElementById('slRwDOBDay').focus();
            } else {
                document.getElementById('slPrDOBDay').focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (firstChar == 'J' || firstChar == 'j')
        xmlhttp.open("POST", "include/php/ogcrspdv_1" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
    else
        xmlhttp.open("POST", "include/php/ogcrspdv_1" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
    xmlhttp.send();
}
/**************END code to add new function *******DISH14NOV16*********************************/
/**************Start code for pass txtType parameter for delete Author:SANT16DEC16***************************/
function showSlPrJewelleryInvDiv(srchItemPreId, srchItemPostId, custId, panelName, txtType, def = null, firmId) {
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase(); //chnaged @OMMODTAG PRIYA_05MAY15
    loadXMLDoc();
    var preInvNo = "";
    var postInvNo = "";
    if (panelName == 'orderPickStock') {
        var str = txtType.split(';');
        preInvNo = str[0];
        postInvNo = str[1];
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelName == 'InvoicePayment') {
                document.getElementById("AddInvoiceMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            }
            if (res == 'G' || res == 'S' || res == 'O') {
                searchItemNames(itemName, metalType, divNum, keyCodeInput);
            }
            if (panelName != 'InvoicePayment') {
                document.getElementById('slPrDOBDay').focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //alert('srchItemPreId=='+srchItemPreId);
    //alert('srchItemPostId=='+srchItemPostId);
//    alert('panelName=='+panelName);
//alert('txtType=='+txtType);
//         if (panelName == 'StockPurchasePanel') {

    var returnItem = document.getElementById('srchDelItemId').value;
    if (panelName == 'orderPickStock') {
        xmlhttp.open("POST", "include/php/ogspjsdv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&preOrdInvNo=" + preInvNo + "&postOrdInvNo=" + postInvNo, true);
    } else if (panelName == 'InvoicePayment') {
        xmlhttp.open("POST", "include/php/ogwadinv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&txtType=" + txtType + "&returnItem=" + returnItem + "&invoiceNo=" + invoiceNo + "&firmId=" + firmId, true);
    } else if (panelName == 'windowshopping') {
        if (txtType == 'delete')
            xmlhttp.open("POST", "include/php/ogwsmndv" + default_theme + ".php?srchdelItemPreId=" + srchItemPreId + "&srchdelItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&txtType=" + txtType, true);
        else
            xmlhttp.open("POST", "include/php/ogwsmndv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&txtType=" + txtType, true);
    } else if (panelName == 'ItemApproval' || panelName == 'ItemApprovalUp') {
        var invoiceNo = document.getElementById('invoiceNo').value;
        xmlhttp.open("POST", "include/php/ogiaijdv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&txtType=" + txtType + "&returnItem=" + returnItem + "&invoiceNo=" + invoiceNo, true);
    } else if (panelName == 'FINE_JEWELLERY_SELL_B2') {
        xmlhttp.open("POST", "include/php/ogspjsdvb2" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&txtType=" + txtType + "&returnItem=" + returnItem + "&invoiceNo=" + invoiceNo + "&firmId=" + firmId, true);
    } else if (panelName == 'FINE_JEWELLERY_SELL_B3') {
        xmlhttp.open("POST", "include/php/ogspjsdvb3" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&txtType=" + txtType + "&returnItem=" + returnItem + "&invoiceNo=" + invoiceNo + "&firmId=" + firmId, true);
    } else if (panelName == 'FINE_JEWELLERY_SELL_CAD') {
        xmlhttp.open("POST", "include/php/ogspjsdvcad" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&txtType=" + txtType + "&returnItem=" + returnItem + "&invoiceNo=" + invoiceNo + "&firmId=" + firmId, true);
    } else
        xmlhttp.open("POST", "include/php/ogspjsdv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName + "&txtType=" + txtType, true);
//        } 
    xmlhttp.send();
}
//
/**************End code for pass txtType parameter for delete Author:SANT16DEC16***************************/
//
function showReturnInvDiv(srchInvNo, custId, panelName) {
    //
    //alert('srchInvNo ==' + srchInvNo);
    //
    var searchItemIdCharPart = '';
    var searchItemIdNumPart = '';
    //
    // Using match with regEx
    let matches = srchInvNo.match(/\d+/g);
    //  
    // Length of Array
    let arrayLength = matches.length;
    // 
    // Display last element of array - from number extracted
    let lastElement = matches[arrayLength - 1];
    // 
    // 
    //alert('arrayLength == ' + arrayLength);
    //alert('lastElement == ' + lastElement);
    //
    //
    // FOR POST INVOICE NO.
    searchItemIdNumPart = lastElement;
    //
    //
    let prePostStringLength = srchInvNo.length;
    let postStringLength = searchItemIdNumPart.length;
    //
    //
    //alert('prePostStringLength == ' + prePostStringLength);
    //alert('postStringLength == ' + postStringLength);
    //
    //
    let preStringLength = (prePostStringLength - postStringLength);
    //
    //
    //alert('newPreLength == ' + newPreLength);
    //
    //
    // FOR PRE INVOICE NO.
    searchItemIdCharPart = srchInvNo.substr(0, preStringLength);
    //
    //
    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);    
    //
    //
//    var preInvNoCheckCharacter = '#';
//    //    
//    if (srchInvNo.includes(preInvNoCheckCharacter)) {
//        //
//        searchItemIdCharPart = srchInvNo.substring(0, srchInvNo.indexOf(preInvNoCheckCharacter));
//        //
//        searchItemIdNumPart = srchInvNo.substring(srchInvNo.indexOf(preInvNoCheckCharacter) + 1);
//        //
//        searchItemIdCharPart = searchItemIdCharPart + '#';
//        //
//    } else {
//        //
//        var searchItemIdLen = srchInvNo.length;    
//        var searchItemIdTemp = srchInvNo;    
//        var tempLen = searchItemIdLen;
//        var charLen = 0;    
//        var alphaExp = /^[a-zA-Z]+$/;
//        //
//        while (tempLen > 0) {
//            //
//            var field = searchItemIdTemp.substr(0, 1);
//            //
//            searchItemIdTemp = searchItemIdTemp.substr(1);
//            //
//            if (field.match(alphaExp)) {
//                charLen = charLen + 1;
//            } else {
//                break;
//            }
//            //
//            tempLen = tempLen - 1;
//            //
//        }
//        //
//        searchItemIdCharPart = srchInvNo.substr(0, charLen);
//        searchItemIdNumPart = srchInvNo.substr(charLen);
//        //
//    }
    //
    //alert('searchItemIdCharPart ==' + searchItemIdCharPart);
    //alert('searchItemIdNumPart ==' + searchItemIdNumPart);
    //
    document.getElementById('srchItemPreId').value = searchItemIdCharPart;
    document.getElementById('srchItemPostId').value = searchItemIdNumPart;
    //
    //alert('srchItemPreId ==' + document.getElementById('srchItemPreId').value);
    //alert('srchItemPostId ==' + document.getElementById('srchItemPostId').value);
    //
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    //alert('searchItemIdCharPart =2=' + searchItemIdCharPart);
    //alert('searchItemIdNumPart =2=' + searchItemIdNumPart);
    //
    xmlhttp.open("POST", "include/php/ogrtjsdv" + default_theme + ".php?custId=" + custId + "&srchInvNo=" + searchItemIdNumPart +
            "&panelName=" + panelName + "&srchPreInvNo=" + encodeURIComponent(searchItemIdCharPart), true);
    //
    xmlhttp.send();
    //
}
//
//
//
//
function searchImitationItemByItemId(searchItemId, autoEntryValue, custId) {

    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
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
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);
    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
    //alert('searchItemIdNumPart == ' + searchItemIdNumPart);

    document.getElementById('srchItemPreId').value = searchItemIdCharPart;
    document.getElementById('srchItemPostId').value = searchItemIdNumPart;
    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogijsmndv" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart +
                "&srchItemPostId=" + searchItemIdNumPart +
                "&custId=" + custId + "&panelName=" + 'autoEntry' +
                "&autoEntry=" + autoEntryValue + "&charLen=" + charLen, true);
        xmlhttp.send();
    } else {

        var firstChar = searchItemId.charAt(0);
        var res = firstChar.toUpperCase();
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
                document.getElementById('addItemDOBDay').focus();
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogijsmndv" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart +
                "&srchItemPostId=" + searchItemIdNumPart + "&custId=" + custId, true);
    }
}

function showSlPrImitationInvDiv(srchItemPreId, srchItemPostId, custId, panelName) {

    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            document.getElementById('slPrDOBDay').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'ImitationPurchasePanel') {
        xmlhttp.open("POST", "include/php/ogijsmndv" + default_theme + ".php?srchItemPreId=" + srchItemPreId +
                "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
        /* START CODE TO ADD ESLE-IF CONDITION FOR RETAIL IMITATION B2 SELL FORM @AUTHOR:MADHUREE-03FEB2020 */
    } else if (panelName == 'RETAIL_IMITATION_B2') {
        xmlhttp.open("POST", "include/php/ogijaitdvB2selldiv" + default_theme + ".php?srchItemPreId=" + srchItemPreId +
                "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=RETAIL_IMITATION_B2", true);
        /* END CODE TO ADD ESLE-IF CONDITION FOR RETAIL IMITATION B2 SELL FORM @AUTHOR:MADHUREE-03FEB2020 */
    } else {
        xmlhttp.open("POST", "include/php/ogijsmndv" + default_theme + ".php?srchItemPreId=" + srchItemPreId +
                "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
    }
    xmlhttp.send();
}
//****************Start code to add function strellering silver search code AUTHOR:DIKSHA13OCT2018
function showSlPrstrellingInvDiv(srchItemPreId, srchItemPostId, custId, panelName) {
//    alert(panelName);
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase(); //chnaged @OMMODTAG PRIYA_05MAY15
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            document.getElementById('slPrDOBDay').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'ImitationPurchasePanel') {
        xmlhttp.open("POST", "include/php/omijsmndv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
    } else {
        xmlhttp.open("POST", "include/php/omijsmndv" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
    }
    xmlhttp.send();
}
//****************End code to add function strellering silver search code AUTHOR:DIKSHA13OCT2018
function showSlPrCrystalInvDiv(srchItemPreId, srchItemPostId, custId, panelName, firm_Id) {
//    alert(panelName);
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase(); //chnaged @OMMODTAG PRIYA_05MAY15
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            document.getElementById('slPrDOBDay').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'CrystalPurchasePanel') {
//****************START code to sell :DISH14NOV16******************************//
        xmlhttp.open("POST", "include/php/ogcrspdv_1" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId, true);
//****************END code to sell :DISH14NOV16******************************//
    } else {
//****************START code to sell :DISH14NOV16******************************//
        xmlhttp.open("POST", "include/php/ogcrspdv_1" + default_theme + ".php?srchItemPreId=" + srchItemPreId + "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&firmId=" + firm_Id, true);
        //****************END code to sell :DISH14NOV16******************************//
    }
    xmlhttp.send();
}
function calculateItemWeight(count) {
    var returnWt = document.getElementById('addItemReturnedWeight' + count).value;
    var rWtTyp = document.getElementById('addItemReturnedWeightType' + count).value;
    var gsWt = document.getElementById('addItemGsWt' + count).value;
    var gWtTyp = document.getElementById('addItemGsWtTyp' + count).value;
    if (returnWt == '' || returnWt == 'NaN') {
        returnWt = '0.00';
    }
    var convertedWt = convertWeight(parseFloat(returnWt), gWtTyp, rWtTyp);
    var purity = parseFloat(document.getElementById('addItemFinTunch' + count).value);
    var finalWt = parseFloat(gsWt) - convertedWt;
    if (document.getElementById('addItemFfnWtBy').value == 'byGrossWt') {
        wt = document.getElementById('addItemGsWt' + count).value;
    } else {
        var wt = document.getElementById('addItemNtWt' + count).value;
    }
//    alert(count);
//    alert(wt +' '+ convertedWt);
    var FinalFnWt = parseFloat(wt) - convertedWt;
    document.getElementById('addItemFinalWt' + count).innerHTML = (finalWt).toFixed(3) + ' ' + gWtTyp;
    document.getElementById('addItemFinalGsWt' + count).value = (finalWt).toFixed(3);
    document.getElementById('addItemFFineWt' + count).innerHTML = parseFloat(parseFloat(FinalFnWt * purity) / 100).toFixed(3) + ' ' + gWtTyp;
    document.getElementById('addItemFinalFinWt' + count).value = parseFloat(parseFloat(FinalFnWt * purity) / 100).toFixed(3);
}
//function calculateTotalWeight() {
//    var totItem = parseFloat(document.getElementById('totalItem').value);
//    var totWeight = 0;
//    for (var count = 0; count < totItem; count++) {
//        var finalWt = parseFloat(document.getElementById('addItemFinalFinWt' + count).value).toFixed(2);
//        var wtTyp = document.getElementById('addItemGsWtTyp' + count).value;
//        if (document.getElementById('addItemFinalFinWt' + count).value == '' || document.getElementById('addItemFinalFinWt' + count).value == 'NaN')
//            document.getElementById('addItemFinalFinWt' + count).value = '0.00';
//
//        var convWt = convertWeight(parseFloat(document.getElementById('addItemFinalFinWt' + count).value), 'GM', wtTyp);
//        totWeight = parseFloat(totWeight) + parseFloat(convWt);
//    }
//    document.getElementById('addItemTotalWgtBal').value = parseFloat(totWeight).toFixed(2) + ' GM';
//}
function calculateTotalWeight() {
    var totItem = parseFloat(document.getElementById('totalItem').value);
    var totGdWeight = 0;
    var totGdGsWeight = 0;
    var totSlWeight = 0;
    var totSlGsWeight = 0;
    var totWeight = 0;
    var totGsWeight = 0;
    var metal = '';
    var totGdGsWeightTyp = 'GM';
    var totGdWeightTyp = 'GM';
    var totSlGsWeightTyp = 'GM';
    var totSlWeightTyp = 'GM';
//    alert(totItem);
    for (var count = 0; count < totItem; count++)
    {
        metal = document.getElementById('mtype' + count).value;
        var wtTyp = document.getElementById('addItemGsWtTyp' + count).value;
        if (document.getElementById('addItemFinalFinWt' + count).value == '' || document.getElementById('addItemFinalFinWt' + count).value == 'NaN')
            document.getElementById('addItemFinalFinWt' + count).value = '0.00';
        if (document.getElementById('addItemFinalGsWt' + count).value == '' || document.getElementById('addItemFinalGsWt' + count).value == 'NaN')
            document.getElementById('addItemFinalGsWt' + count).value = '0.00';
        var convGsWt = convertWeight(parseFloat(document.getElementById('addItemFinalGsWt' + count).value), 'GM', wtTyp);
        var convWt = convertWeight(parseFloat(document.getElementById('addItemFinalFinWt' + count).value), 'GM', wtTyp);
        if (metal == 'Gold')
        {
            totGdGsWeight = parseFloat(totGdGsWeight) + parseFloat(convGsWt);
            totGdWeight = parseFloat(totGdWeight) + parseFloat(convWt);
        }
        if (metal == 'Silver')
        {
            totSlGsWeight = parseFloat(totSlGsWeight) + parseFloat(convGsWt);
            totSlWeight = parseFloat(totSlWeight) + parseFloat(convWt);
        }
    }

    if (totGdGsWeight >= 1000) {
        totGdGsWeight = totGdGsWeight / 1000;
        totGdGsWeightTyp = 'KG';
    }
    if (totGdWeight >= 1000) {
        totGdWeight = totGdWeight / 1000;
        totGdWeightTyp = 'KG';
    }
    if (totSlGsWeight >= 1000) {
        totSlGsWeight = totSlGsWeight / 1000;
        totSlGsWeightTyp = 'KG';
    }
    if (totSlWeight >= 1000) {
        totSlWeight = totSlWeight / 1000;
        totSlWeightTyp = 'KG';
    }

    document.getElementById('goldGrossWeight').value = parseFloat(totGdGsWeight).toFixed(3) + ' ' + totGdGsWeightTyp;
    document.getElementById('goldFineWeight').value = parseFloat(totGdWeight).toFixed(3) + ' ' + totGdWeightTyp;
    document.getElementById('silverGrossWeight').value = parseFloat(totSlGsWeight).toFixed(3) + ' ' + totSlGsWeightTyp;
    document.getElementById('silverFineWeight').value = parseFloat(totSlWeight).toFixed(3) + ' ' + totSlWeightTyp;
}
function getSuppMetalPurchaseList(suppId, panelName, mainPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("supplierCrystalPurchasePanel").innerHTML = xmlhttp.responseText; //change in div name @AUTHOR: SANDY25SEP13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogrwwsprlt" + default_theme + ".php?panelName=" + panelName + "&userId=" + suppId + "&mainPanel=" + mainPanel, true);
    xmlhttp.send();
}
function showRawStockPanel(panel, userId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText; //change in div name @AUTHOR: SANDY25SEP13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//    if (panel == 'MetalPurchaseList')
    xmlhttp.open("POST", "include/php/ogrwwscprlt" + default_theme + ".php?panel=" + panel + "&userId=" + userId, true);
//    else
//        xmlhttp.open("POST", "include/php/ogiamsdv"+ default_theme +".php?panel=" + panel, true);
    xmlhttp.send();
}
function showMetalNoOfRows(documentRootPath, rowsPerPage, pageNum, upRowsPanel, nwOrPanel, custId, mainPanel)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("SuppMetalPurchaseDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogrwwsprlt" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&panelName=" + nwOrPanel + "&stockUpdateRows=" + upRowsPanel + "&userId=" + custId + "&mainPanel=" + mainPanel, true);
    xmlhttp.send();
}
//
// Start code to implement datatable onclick fn in raw sell list @AUTH:ATHU7APR17
function showUserRawMetalDetails(rawId, panelName, userId, mainPanel, metType, transactionPanel, divName, transDate) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divName).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogrwmomf" + default_theme + ".php?rwprId=" + rawId +
            "&payPanelName=RawPayUp&rawPanelName=RawPayUp&suppPanelName=addMetalByCash&userId=" + userId +
            "&mainPanel=" + mainPanel + "&metType=" + metType + "&transactionPanel=" + transactionPanel + "&transDate=" + transDate, true);
    xmlhttp.send();
}
//
//
function showRawMetalSellUpdateDetails(rawId, panelName, mainPanel, subPanel, userId) {
    //
    //alert('rawId == ' + rawId);
    //alert('panelName == ' + panelName);    
    //alert('mainPanel == ' + mainPanel);
    //alert('subPanel == ' + subPanel);
    //alert('userId == ' + userId);
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
    xmlhttp.open("POST", "include/php/ogrwmomf" + default_theme + ".php?rwprId=" + rawId +
            "&payPanelName=RawPayUp&rawPanelName=RawPayUp&suppPanelName=addMetalByCash&userId=" + userId +
            "&mainPanel=" + mainPanel + "&metType=SELL&transactionPanel=RawSell", true);
    xmlhttp.send();
}
//
//
function showCustTransactions(panel, userId) {
    loadXMLDoc();
    confirm_box = false;
    if (panel == 'custAllTransDel') {
        confirm_box = confirm(deleteAllTransaction + "\n\nDo you really want to delete all transaction of this customer?");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'custAllTrans' || panel == 'custAllTransDel' || panel == 'custAllCashTrans' || panel == 'custAllMetalTrans' || panel == 'custPaymentTrans') {
                document.getElementById("custHomeTransDiv").innerHTML = xmlhttp.responseText;
            } else if (panel == 'custAllTransDel') {
                if ((panel == 'custAllTransDel' && confirm_box == true))
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("supplierProductPurchasePanel").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'custAllTransDel' && confirm_box == true) {
        xmlhttp.open("POST", "include/php/omlondel" + default_theme + ".php?userId=" + userId + "&panelName=" + panel, true);
    } else {
        xmlhttp.open("POST", "include/php/ogwsprdt" + default_theme + ".php?userId=" + userId + "&panelName=" + panel, true);
    }

    xmlhttp.send();
}


function getMetalByCashItemList(suppId, panelName, mainPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("SuppMetalItemListDiv").innerHTML = xmlhttp.responseText; //change in div name @AUTHOR: SANDY25SEP13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogrwwscslt" + default_theme + ".php?transType=" + panelName + "&userId=" + suppId + "&mainPanel=" + mainPanel, true);
    xmlhttp.send();
}

function chnageAddRawMetalInv(metalType, transType, userId) {
    var poststr = "metalType=" + encodeURIComponent(metalType) +
            "&panelName=" + encodeURIComponent(addstockDiv) +
            "&transType=" + encodeURIComponent(transType) +
            "&userId=" + encodeURIComponent(userId);
    chnage_add_raw_metal_inv('include/php/ogrminvdt' + default_theme + '.php', poststr);
    return false;
}
function chnage_add_raw_metal_inv(url, parameters) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = alertChnageAddRawMetalInv;
    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);
}
function alertChnageAddRawMetalInv() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        var str = xmlhttp2.responseText;
        var strArr = new Array();
        strArr = str.split("*");
        document.getElementById('sttr_pre_invoice_no').value = strArr[0];
        document.getElementById('sttr_invoice_no').value = strArr[1].replace(/\s/g, '');
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function changeRawMetalType(metalType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemTypeDescDiv").innerHTML = xmlhttp.responseText;
            chnageAddRawMetalInv(addStockMetalType, transType, userId);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogrmmtdt" + default_theme + ".php?metalType=" + metalType, true);
    xmlhttp.send();
}
function searchInvTunchForPanelBlank() {
    document.getElementById("tunchListDivToAddFineTUNCH").innerHTML = '';
}

function deleteRawMetalToCashItem(rwprId, rwmtdrId, mainPanel, payPanelName, pageNum, rowsPerPage, mainPanelNew, metType, userId, deletereason) {
    // Check if a delete reason is required
    if (deletereason === 'YES') {
        var deleteReason = prompt("Please provide a reason for deleting this item:");

        // If no reason is provided, prevent deletion
        if (deleteReason === null || deleteReason.trim() === "") {
            alert("You must provide a reason for deletion.");
            return false;
        }
    }
    confirm_box = confirm(deleteAlertMess + "\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var rawDeleteConfirm = '';
        confirm_box_for_raw_metal = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Raw Metal Stock?");
        if (confirm_box_for_raw_metal == true)
        {
            rawDeleteConfirm = 'yes';
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (mainPanel == 'RawUserPanelPurchaseList') {
                    document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                    document.getElementById('deleteInvVerifyPopUp').style.display = "none";
                    window.setTimeout(rawMetalFunctionCloseDiv, 1000);
                } else if (mainPanel == 'RawStockPanelPurchaseList') {
                    document.getElementById("rawPanelPurchaseList").innerHTML = xmlhttp.responseText;
                    window.setTimeout(rawMetalFunctionCloseDiv, 1000);
                } else if (mainPanel == 'RawSellList') {
                    document.getElementById("stockPanelSellList").innerHTML = xmlhttp.responseText;
                    document.getElementById('deleteInvVerifyPopUp').style.display = "none";
                    window.setTimeout(rawMetalFunctionCloseDiv, 1000);
                } else if (mainPanel == 'AddRawMetalIssue') {
                    document.getElementById("addRawMetalIssueStockInvoice").innerHTML = xmlhttp.responseText;
                    window.setTimeout(rawMetalFunctionCloseDiv, 1000);
                } else {
                    document.getElementById("addRawStockInvoice").innerHTML = xmlhttp.responseText;
                    window.setTimeout(rawMetalFunctionCloseDiv, 1000);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogrmdelt" + default_theme + ".php?rwprId=" + rwprId + "&rwmtdrId=" + rwmtdrId + "&mainPanelNew=" + mainPanelNew + "&mainPanel=" + mainPanel +
                "&payPanelName=" + payPanelName + "&pageNum=" + pageNum + "&rowsPerPage=" + rowsPerPage + "&rawDeleteConfirm=" + rawDeleteConfirm + "&userId=" + userId + "&metType=" + metType + "&deleteReason=" + encodeURIComponent(deleteReason), true);
        xmlhttp.send();
    }
}
function changeAddStockSuppWastage(metalType, suppId) {
    var poststr = "metalType=" + encodeURIComponent(metalType) +
            "&suppId=" + encodeURIComponent(suppId);
    change_add_stock_supp_wastage('include/php/ogitwstg' + default_theme + '.php', poststr);
    return false;
}
function change_add_stock_supp_wastage(url, parameters) {

    loadXMLDoc2();
    xmlhttp2.onreadystatechange = alertChangeAddStockSuppWastage;
    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);
}
function alertChangeAddStockSuppWastage() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("suppItemwstg1").value = xmlhttp2.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function changeSlPrInvoiceNo(panelName, firmId) {
    var poststr = "panelName=" + encodeURIComponent(panelName) +
            "&firmId=" + encodeURIComponent(firmId) +
            "&custId=" + encodeURIComponent(document.getElementById('custId').value) +
            "&metalType=" + encodeURIComponent(document.getElementById('slPrItemMetal').value);
    change_slpr_invoice_no('include/php/ogspinchg' + default_theme + '.php', poststr);
    return false;
}
function change_slpr_invoice_no(url, parameters) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = alertChangeSlPrInvoiceNo;
    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);
}
function alertChangeSlPrInvoiceNo() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("slPrInvoiceNoDiv").innerHTML = xmlhttp2.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function getItemPreInvDiv(preInvId, firmId, metalType, div, id, keyCodeInput, mainPanel, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            if (str == '') {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                document.getElementById('addItemId').value = '1';
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
    xmlhttp.open("POST", "include/php/ogspinchg" + default_theme + ".php?firmId=" + firmId + "&metalType=" + metalType + "&preInvId=" + preInvId + "&div=" + div + "&id=" + id + "&mainPanel=preInvUpdate", true);
    xmlhttp.send();
}
function changeMetalRateByVal(prefix, count) {

    var goldWeight = 0;
    var silverWeight = 0;
    if (document.getElementById('metalDel' + count).value != 'Deleted') {

        //alert('count == ' + count);
        //alert('prefix == ' + prefix);

        var payTotalWeight1 = document.getElementById('sttr_nt_weight' + count).value;
        var payTotalWeightType1 = document.getElementById('sttr_nt_weight_type' + count).value;
        var payMetalTunch1 = document.getElementById('sttr_purity' + count).value;
        var metalWeight = (payTotalWeight1 * payMetalTunch1) / 100;
        //
        // START CODE TO ADD CONDITIONS FOR OLD PRODUCT CALCULATION BY WEIGHT @AUTHOR:MADHUREE-25FEB2022
        //
        if (document.getElementById('urdValuationBy').value == 'byGrossWt') {
            metalWeight = document.getElementById('sttr_gs_weight' + count).value;
        } else if (document.getElementById('urdValuationBy').value == 'byNetWt') {
            metalWeight = document.getElementById('sttr_nt_weight' + count).value;
        } else {
            metalWeight = document.getElementById('sttr_fine_weight' + count).value;
        }
        //
        // END CODE TO ADD CONDITIONS FOR OLD PRODUCT CALCULATION BY WEIGHT @AUTHOR:MADHUREE-25FEB2022
        //
        if (document.getElementById('sttr_metal_type' + count).value == 'Gold' ||
                document.getElementById('sttr_metal_type' + count).value == 'Alloy') {
            goldWeight = parseFloat(metalWeight);
            if (document.getElementById('sttr_valuation' + count).value == '' || document.getElementById('sttr_valuation' + count).value == 'NaN')
                document.getElementById('sttr_valuation' + count).value = 0;
            if (document.getElementById('sttr_valuation' + count).value != 0) {
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById('sttr_metal_rate' + count).value = parseFloat(parseFloat(document.getElementById('sttr_valuation' + count).value) / (goldWeight * document.getElementById('gmWtInKg').value)).toFixed(4);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById('sttr_metal_rate' + count).value = parseFloat(parseFloat(parseFloat(document.getElementById('sttr_valuation' + count).value) / goldWeight) * document.getElementById('gmWtInGm').value).toFixed(4);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById('sttr_metal_rate' + count).value = parseFloat(parseFloat(parseFloat(document.getElementById('sttr_valuation' + count).value) / goldWeight) * document.getElementById('gmWtInMg').value).toFixed(4);
                }
            }
        }
        if (document.getElementById('sttr_metal_type' + count).value == 'Silver') {
            silverWeight = parseFloat(metalWeight);
            if (payTotalWeightType1 == 'KG') {
                document.getElementById('sttr_metal_rate' + count).value = parseFloat(parseFloat(document.getElementById('sttr_valuation' + count).value) / (silverWeight * document.getElementById('srGmWtInKg').value)).toFixed(4);
            } else if (payTotalWeightType1 == 'GM') {
                document.getElementById('sttr_metal_rate' + count).value = parseFloat((parseFloat(document.getElementById('sttr_valuation' + count).value) / silverWeight) * (document.getElementById('srGmWtInGm').value)).toFixed(4);
            } else if (payTotalWeightType1 == 'MG') {
                document.getElementById('sttr_metal_rate' + count).value = parseFloat((parseFloat(document.getElementById('sttr_valuation' + count).value) / silverWeight) * (document.getElementById('srGmWtInMg').value)).toFixed(4);
            }
        }
    }
    return false;
}
//open discount panel popup
function openDiscountPopUp(documentRoot, st_id, panelName, st_item_category, st_purity, st_metal_type, firmName, discountSubPanel) {
    const iframe = document.getElementById('iframe');
    iframe.src = documentRoot + "/include/php/omDiscountPopUp.php?panelName=" + panelName +
            "&st_id=" + st_id +
            "&st_item_category=" + st_item_category +
            "&st_purity=" + st_purity +
            "&st_metal_type=" + st_metal_type +
            "&firmName=" + firmName +
            "&discountSubPanel=setProductDiscount";
//
    document.getElementById('myModal').style.display = "block";
}
function openRetailDiscountPopUp(st_id) {
    document.getElementById('myModal' + st_id).style.display = "block";
}

function openTimePeriodDiscountPopUp(st_id) {
    document.getElementById('discountModal' + st_id).style.display = "block";
}

// When the user clicks the button, open the modal 
function openAddStockPopUp(stId, documentRoot) {
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
    xmlhttp.open("POST", "include/php/ogfinepopIframe" + default_theme + ".php?stId=" + stId + "&documentRoot=" + documentRoot + "&panelName=lotStockList", true);
    xmlhttp.send();
}
function openImiAddStockPopUp(stId, documentRoot) {
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
    xmlhttp.open("POST", "include/php/ogfinepopIframe" + default_theme + ".php?stId=" + stId + "&documentRoot=" + documentRoot + "&panelName=ImilotStockList", true);
    xmlhttp.send();
}

// When the user clicks the button, open the modal 
function openFineSupplierStockPopUp(stId, documentRoot, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModal' + stId).style.display = "block";
            document.getElementById('myModal' + stId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogfinepopIframe" + default_theme + ".php?stId=" + stId + "&documentRoot=" + documentRoot + "&panel=" + panel + "&panelName=supplierPurchase", true);
    xmlhttp.send();
}

function openRemPopUp() {
    document.getElementById('paymentPanelReminderDiv').style.display = "block";
}

function openSchemePopUp(kittyNo, emiPaidDD, emiPaidMM, emiPaidYY, emiAmt, custStaffLoginId, emiStatus, kPaidAmt, serialNo, custId, firmId, kittyId, kittyDOB, gDepId, gDepJrnlId, emiOccur, gEMIAmt, princAmt, dueDate, pageNo, kittyStaffId, newKittyRecipitNo, prevEMIStatus, currEMIstatus, kittyMetalType, kRateAmt, kWtAmt, kittyPaidAmt, ktGstAmt, ktTaxableAmt) {
    //console.log(kittyNo+ emiPaidDD+ emiPaidMM+ emiPaidYY+ emiAmt+ custStaffLoginId+ emiStatus+ kPaidAmt+ serialNo+ custId+ firmId+ kittyId+ kittyDOB+ gDepId+ gDepJrnlId+ emiOccur+ gEMIAmt+ princAmt+ dueDate+ pageNo+ kittyStaffId+ newKittyRecipitNo+ prevEMIStatus+ kittyMetalType+ kRateAmt+ kWtAmt+ ktGstAmt+ ktTaxableAmt+ kittyPaidAmt);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("schemeModel").innerHTML = xmlhttp.responseText;
            document.getElementById('schemeModel').style.display = "block";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var emiPaidDate = emiPaidDD + ' ' + emiPaidMM + ' ' + emiPaidYY;
    xmlhttp.open("POST", "include/php/ogschemepop" + default_theme + ".php?kittyNo=" + kittyNo
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
            + "&kWtAmt=" + kWtAmt
            + "&serialNo=" + serialNo
            + "&firmId=" + firmId
            + "&kittyMetalType=" + kittyMetalType
            + "&ktGstAmt=" + ktGstAmt
            + "&ktTaxableAmt=" + ktTaxableAmt
            + "&kittyPaidAmt=" + kittyPaidAmt,
            true);
    xmlhttp.send();
}
//
//
// CLOSE DISCOUNT POP UP @AUTHOR-PRIYANKA-22-OCT-2020
function closeDiscountPopUp(st_id) {
    document.getElementById('myModal' + st_id).style.display = "none";
    showDiscountPanel('discountList', 'popUpClosed');
}
//
// CLOSE RETAIL DISCOUNT POP UP @AUTHOR-SHRIAKNT-17-JAN-2023
function closeRetailDiscountPopUp(st_id) {
    //alert('closeRetailDiscountPopUp');
    document.getElementById('myModal' + st_id).style.display = "none";
    showRetailDiscountPanel('discountCommissionList', 'popUpClosed');
}
//
// CLOSE RETAIL DISCOUNT POP UP @AUTHOR-SHRIAKNT-17-JAN-2023
function closeRetailDiscountMostLessPopUp(st_id) {
    //alert('closeRetailDiscountPopUp');
    document.getElementById('myModal' + st_id).style.display = "none";
    showRetailDiscountMostLessPanel('discountCommissionListMostLess', 'popUpClosed');
}
//
// CLOSE RETAIL DISCOUNT POP UP @AUTHOR-SHRIAKNT-17-JAN-2023
function closeRetailDiscountMostLessLPopUp(st_id) {
    //alert('closeRetailDiscountPopUp');
    document.getElementById('myModal' + st_id).style.display = "none";
    showRetailDiscountMostLessPanel('discountCommissionListMostLessl', 'popUpClosed');
}
//
function closeTimePeriodDiscountPopUp(st_id) {
    document.getElementById('discountModal' + st_id).style.display = "none";
}

// When the user clicks on <span> (x), close the modal
function closeAddStockPopUp() {
    document.getElementById('myModal').style.display = "none";
    showAddWhStockPanel('wholesaleStockList');
}
function closeImiAddStockPopUp() {
    document.getElementById('myModal').style.display = "none";
    showAddWhStockPanel('imiwholesaleStockList');
}
function closeAddStockTransPopUp() {
    document.getElementById('myModalStock').style.display = "none";
}
function closeSupplierPopUp(utransInvId) {
    document.getElementById('myModal' + utransInvId).style.display = "none";
}

function closeRemPopUp() {
    document.getElementById('paymentPanelReminderDiv').style.display = "none";
}

function closeSchemePopUp() {
    document.getElementById('schemeModel').style.display = "none";
}



function openchitfundPopUp(chitCId, chitPId, chitstartDOB) {
//    alert(chitstartDOB);
    document.getElementById('chitCId').value = chitCId;
    document.getElementById('chitPId').value = chitPId;
    document.getElementById('chitstartDOB').value = chitstartDOB;
    document.getElementById('myModal' + chitPId).style.display = "block";
}

function closechitfundPopUp(chitPId) {
//    alert(chitPId);
    document.getElementById('myModal' + chitPId).style.display = "none";
}

function openmetalPopUp() {
//    alert(chitstartDOB);
    document.getElementById('myModal').style.display = "block";
}

function closemetalPopUp() {
//    alert(chitPId);
    document.getElementById('myModal').style.display = "none";
}
function closemeltingPopUp() {
//    alert(chitPId);
    document.getElementById('girviIframePopUp').style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
//window.onclick = function (event) {
//    if (event.target == document.getElementById('myModal')) {
//        document.getElementById('myModal').style.display = "none";
//    }
//}
//
// START CODE TO CHANGE FUNCTION FOR MASTER ITEM DETAILS @PRIYANKA-20MAR18
function searchAddStockItemNames(itemCat, metalType, preId, divNum, keyCodeInput, documentRootPath, itemType) {
    keyCodeForItemNames = keyCodeInput;
    divNumForItemNames = divNum;
    panelNameForItemNames = divNum;
    //
    var poststr = "itemCat=" + encodeURIComponent(itemCat)
            + "&metalType=" + encodeURIComponent(metalType)
            + "&divNum=" + encodeURIComponent(divNum)
            + "&preId=" + encodeURIComponent(preId)
            + "&itemType=" + encodeURIComponent(itemType);
    //
    search_item_names(documentRootPath + "/include/php/ommasteritemsearch" + default_theme + ".php", poststr);
}
// END CODE TO CHANGE FUNCTION FOR MASTER ITEM DETAILS @PRIYANKA-20MAR18
//
function changeVATType(accountId, firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (xmlhttp.responseText != 'INVALID_ACCOUNT') {
                document.getElementById('vatAccountLabelDisp').value = xmlhttp.responseText;
                document.getElementById('vatAmountLabelDisp').value = xmlhttp.responseText;
            } else {
                alert('INVALID ACCOUNT');
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/oggtaccnm" + default_theme + ".php?accId=" + accountId + "&firmId=" + firmId, true);
    xmlhttp.send();
}
function changeItemMetalRate(metalType) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            var str = xmlhttp.responseText;
            var strArr = str.split('*');
            document.getElementById('metalRateCalculation').value = strArr[0];
            document.getElementById('sttr_tax').value = strArr[1];
            document.getElementById('metalRateId').value = strArr[2];
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogiachmr" + default_theme + ".php?metalType=" + metalType, true);
    xmlhttp.send();
}
function getAddStockHelp() {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('addItemHelpDiv').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogiafnh" + default_theme + ".php", true);
    xmlhttp.send();
}
function changeCurrentMetalRate(metalType, metalRate) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            var status = xmlhttp.responseText;
            // alert(status);
            if (status == 'RATE_NOT_PRESENT') {
                document.getElementById('metalRateCalculation').value = parseFloat(metalRate);
                document.getElementById('sttr_tax').value = ''; ///changed by @auth:athu6jun17
                calStockItemPrice();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogiachmtrt" + default_theme + ".php?metalType=" + metalType + "&metalRate=" + metalRate, true);
    xmlhttp.send();
}
//
function barcodeDetails(barcode) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStockPanelFormMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("GET", "include/php/ogijsdv" + default_theme + ".php?barcode=" + barcode, true);
    xmlhttp.send();
}
//
/******* START CODE TO Delete From AllTransactionList @AUTHOR:PRIYANKA-20-08-17***********/
function deleteAllTransactionList(panelName, utinId, transactionType, ownerId, utinType, userId) {
    confirm_box = confirm("Do you really want to delete this entry... \n It will roll back all setlled invoice!!!");
    if (confirm_box == true) {
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
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?utinId=" + utinId + "&transactionType=" + transactionType + "&panelName=" + panelName + "&ownerId=" + ownerId + "&utinType=" + utinType + "&userId=" + userId, true);
        xmlhttp.send();
    }
}
/******* END CODE TO Delete From AllTransactionList @AUTHOR:PRIYANKA-20-08-17***********/

//******************************************@AUTHOR:HARSHAD-20-01-18*************************************************//
//------------------------------------------Theme Universe Navigation Function---------------------------------------//
function navigation_universe(panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'addStock') {
                document.getElementById("mainSelectDiv_Universe").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'omAddImitationStock') {
                document.getElementById("mainSelectDiv_Universe").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'omAddCustomer') {
                document.getElementById("mainSelectDiv_Universe").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'omSell_Purchase') {
                document.getElementById("mainSelectDiv_Universe").innerHTML = xmlhttp.responseText;
            }
        } else {
            //document.getElementById("main_ajax_loading_div").style.visibility = "visible";     
        }
    };
    if (panelName == 'addStock') {
        xmlhttp.open("GET", "include/php/addStock/omAddStock" + default_theme + ".php?panelName=" + panelName, true);
    } else if (panelName == 'omAddImitationStock') {
        xmlhttp.open("GET", "include/php/addStock/omAddImitationStock" + default_theme + ".php?panelName=" + panelName, true);
    } else if (panelName == 'omAddCustomer') {
        xmlhttp.open("GET", "include/php/addCustomer/omAddCustomer" + default_theme + ".php?panelName=" + panelName, true);
    } else if (panelName == 'omSell_Purchase') {
        xmlhttp.open("GET", "include/php/sell_purchase Panel/omSell_Purchase" + default_theme + ".php?panelName=" + panelName, true);
    }
//xmlhttp.open("GET", "include/php/addStock/omAddStock"+ default_theme +".php?panelName=" + panelName, true);
    xmlhttp.send();
}
//----------------------------------------Theme Universe Navigation Function End-----------------------------------//

//----------------------------------------Delete Transaction Payment Panel Records----------------------------------//
function deleteTransactionItem(utinId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            location.reload();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omadtranspnl" + default_theme + ".php?panelName=" + panelName + "&utinId=" + utinId, true);
    xmlhttp.send();
}
//----------------------------------------Delete Transaction Payment Panel Records----------------------------------//
//****************************************End Code @AUTHOR: HARSHAD*************************************************//
// ****************************************************************************************************************//
// START CODE FOR FUNCTION TO LESS STONE WT FROM GS WT OR NT WT @PRIYANKA-25FEB18
// ****************************************************************************************************************//
function stoneWtLessBy(cryCount, autoChk, panel) {
    // CRYSTAL WEIGHT
    var cryGSWT = document.getElementById('sttr_gs_weight' + cryCount).value;
    var cryGSWType = document.getElementById('sttr_gs_weight_type' + cryCount).value;
    // NET WEIGHT
    var ntWt = document.getElementById('sttr_nt_weight').value;
    var ntWtType = document.getElementById('sttr_nt_weight_type').value;
    if (ntWt == '' || ntWt == 'NaN') {
        ntWt = 0;
    }
    // GROSS WEIGHT
    var gsWt = document.getElementById('sttr_gs_weight').value;
    var gsWtType = document.getElementById('sttr_gs_weight_type').value;
    if (gsWt == '' || gsWt == 'NaN') {
        gsWt = 0;
    }
    // PACKET WEIGHT
    var pktWeightValue = parseFloat(document.getElementById('sttr_pkt_weight').value) || 0;
    var lessWeightValue = parseFloat(document.getElementById('sttr_less_weight').value) || 0;
    var pktWt = pktWeightValue + lessWeightValue;
    var pktWtType = document.getElementById('sttr_pkt_weight_type').value;
    var lessWtType = document.getElementById('sttr_less_weight_type').value;
    if (pktWeightValue == '' || pktWeightValue == null) {
        pktWeightValue = 0;
    }
    //
    if (lessWeightValue == '' || lessWeightValue == null) {
        lessWeightValue = 0;
    }
    // START CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-25FEB18
    if (cryGSWType == 'KG') { // CRYSTAL WEIGHT TYPE IN KG
        if (gsWtType == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSWT = cryGSWT;
    } else if (cryGSWType == 'GM') { // CRYSTAL WEIGHT TYPE IN GM
        if (gsWtType == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSWT = (cryGSWT * 0.001);
        else if (gsWtType == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSWT = cryGSWT;
        else if (gsWtType == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSWT = (cryGSWT * 1000);
    } else if (cryGSWType == 'MG') { // CRYSTAL WEIGHT TYPE IN MG
        if (gsWtType == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSWT = (cryGSWT * 0.001);
        else if (gsWtType == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSWT = cryGSWT;
    } else if (cryGSWType == 'CT') { // CRYSTAL WEIGHT TYPE IN CT
        if (gsWtType == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSWT = (cryGSWT * 0.0002);
        else if (gsWtType == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSWT = (cryGSWT * 0.2);
        else if (gsWtType == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSWT = (cryGSWT * 200);
    }
    // END CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-25FEB18
    // IF STONE LESS WT CHECKBOX IS CHECKED                  
    if (autoChk == 'true') {
        // IF CHECKED STONE MINUS FROM GS WT/NT WT (MAIN ENTRY) @PRIYANKA-25FEB18
        if (document.getElementById('sttr_stone_less_wt_by').value == 'lsByNetWt') {
            // CALCULATE NT WT
            var newNetWT = parseFloat(parseFloat(gsWt) - convertWeight(pktWt, gsWtType, pktWtType, lessWtType)).toFixed(3);
            var newPktWT = convertWeight(pktWt, gsWtType, pktWtType, lessWtType);
            //
            var remNTWt;
            remNTWt = parseFloat(gsWt) - parseFloat(cryGSWT);
            //
            if (newNetWT == gsWt) {
                var remWt = parseFloat(gsWt) - parseFloat(cryGSWT);
            } else {
                // CALCULATE NT WT
                var finalNtWt = document.getElementById('netWeight').value;
                var NetWT = parseFloat(finalNtWt) - parseFloat(cryGSWT);
                //
                if (newPktWT != '' && cryCount <= 1) {
                    var newNtWeight = NetWT - newPktWT;
                    var remWt = newNtWeight;
                } else {
                    var remWt = NetWT;
                }
            }
            // ASSIGN WT VARIABLE TO NT WT
            document.getElementById('sttr_nt_weight').value = parseFloat(remWt).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(remWt).toFixed(3);
            // IF CHECKED STONE MINUS FROM GS WT/NT WT (MAIN ENTRY) @PRIYANKA-25FEB18
        } else if (document.getElementById('sttr_stone_less_wt_by').value == 'lsByGrossWt') {
            // CALCULATE GS WT
            var remGSWT;
            remGSWT = parseFloat(gsWt) - parseFloat(cryGSWT);
            // ASSIGN WT VARIABLE TO GS WT
            document.getElementById('sttr_gs_weight').value = parseFloat(remGSWT).toFixed(3);
            document.getElementById('grossWeight').value = parseFloat(remGSWT).toFixed(3);
            // CALCULATE NT WT
            var NetWT = parseFloat(parseFloat(document.getElementById('sttr_gs_weight').value) - convertWeight(pktWt, gsWtType, pktWtType, lessWtType)).toFixed(3);
            // ASSIGN WT VARIABLE TO NT WT
            document.getElementById('sttr_nt_weight').value = parseFloat(NetWT).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(NetWT).toFixed(3);
        }
    } else {
        // IF UNCHECK STONE LESS WT CHECKBOX : STONE WT ADDED INTO GS WT/NT WT @PRIYANKA-25FEB18
        if (document.getElementById('sttr_stone_less_wt_by').value == 'lsByNetWt') {
            // CALCULATE NT WT
            var newNetWT = parseFloat(parseFloat(gsWt) - convertWeight(pktWt, gsWtType, pktWtType, lessWtType)).toFixed(3);
            // CALCULATE ACTUAL NT WT
            var remNTWt;
            var remNTWt = parseFloat(gsWt) + parseFloat(cryGSWT);
            //
            if (newNetWT == remNTWt) {
                var remWt = parseFloat(gsWt) + parseFloat(cryGSWT);
            } else {
                var finalNtWt = document.getElementById('netWeight').value;
                var remWt = parseFloat(finalNtWt) + parseFloat(cryGSWT); // NT WT +  CRY GS WT
            }
            // ASSIGN WT VARIABLE TO NT WT
            document.getElementById('sttr_nt_weight').value = parseFloat(remWt).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(remWt).toFixed(3);
        } else if (document.getElementById('sttr_stone_less_wt_by').value == 'lsByGrossWt') {
            // IF UNCHECK STONE LESS WT CHECKBOX : STONE WT ADDED INTO GS WT/NT WT @PRIYANKA-25FEB18
            // CALCULATE ACTUAL GS WT
            var remGSWT;
            remGSWT = parseFloat(gsWt) + parseFloat(cryGSWT);
            // ASSIGN WT VARIABLE TO GS WT
            document.getElementById('sttr_gs_weight').value = parseFloat(remGSWT).toFixed(3);
            document.getElementById('grossWeight').value = parseFloat(remGSWT).toFixed(3);
            // CALCULATE ACTUAL NT WT
            var NetWT = parseFloat(parseFloat(document.getElementById('sttr_gs_weight').value) - convertWeight(pktWt, gsWtType, pktWtType, lessWtType)).toFixed(3);
            // ASSIGN WT VARIABLE TO NT WT
            document.getElementById('sttr_nt_weight').value = parseFloat(NetWT).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(NetWT).toFixed(3);
        }
    }
    // CALLING ADD STOCK CALCULATION FUNCTION AFTER GS WT/ NT WT CHANGE @PRIYANKA-25FEB18
    calStockItemPrice();
}
// ****************************************************************************************************************//
// END CODE FOR FUNCTION TO LESS STONE WT FROM GS WT OR NT WT @PRIYANKA-25FEB18
// ****************************************************************************************************************//

/********************************************************************************************************/
// START CODE TO CALCULATE CUSTOMER WASTAGE ACCORDING TO CUSTOMER WASTAGE WEIGHT @PRIYANKA-11APR18
/********************************************************************************************************/
function calculateAddCustWastage() {

    var wt = document.getElementById('sttr_nt_weight').value; // NET WEIGHT
    var wtType = document.getElementById('sttr_nt_weight_type').value; // NET WEIGHT TYPE
    var metalType = document.getElementById('sttr_metal_type').value;

    if (wt == '' || wt == 'NaN') {
        wt = 0;
    }

    var finalFineWt = ((parseFloat(document.getElementById('sttr_final_purity').value) * wt) / 100).toFixed(3);
    if (document.getElementById('sttr_cust_wastage_wt').value > 0) { // CUSTOMER WASTAGE WEIGHT IS GREATER THAN ZERO

        document.getElementById('sttr_cust_wastage').value = ((parseFloat(document.getElementById('sttr_cust_wastage_wt').value) * 100) / parseFloat(finalFineWt)); // CALCULATE CUSTOMER WASTAGE
        //
        if (metalType == 'Gold') {
            if (wtType == 'KG') {
                document.getElementById('sttr_value_added').value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt').value) * parseFloat(document.getElementById('sttr_metal_rate').value)) / document.getElementById('gmWtInKg').value)).toFixed(2);
            } else if (wtType == 'GM') {
                document.getElementById('sttr_value_added').value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt').value) * parseFloat(document.getElementById('sttr_metal_rate').value)) / document.getElementById('gmWtInGm').value)).toFixed(2);
            } else if (wtType == 'MG') {
                document.getElementById('sttr_value_added').value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt').value) * parseFloat(document.getElementById('sttr_metal_rate').value)) / document.getElementById('gmWtInMg').value)).toFixed(2);
            }
        } else if (metalType == 'Silver') {
            if (wtType == 'KG') {
                document.getElementById('sttr_value_added').value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt').value) * parseFloat(document.getElementById('sttr_metal_rate').value)) / document.getElementById('srGmWtInKg').value)).toFixed(2);
            } else if (wtType == 'GM') {
                document.getElementById('sttr_value_added').value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt').value) * parseFloat(document.getElementById('sttr_metal_rate').value)) / document.getElementById('srGmWtInGm').value)).toFixed(2);
            } else if (wtType == 'MG') {
                document.getElementById('sttr_value_added').value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt').value) * parseFloat(document.getElementById('sttr_metal_rate').value)) / document.getElementById('srGmWtInMg').value)).toFixed(2);
            }
        }
        //
    } else {
        document.getElementById('sttr_cust_wastage').value = '0'; // CUSTOMER WASTAGE
        document.getElementById('sttr_value_added').value = '0'; // VALUE ADDED
        document.getElementById('sttr_cust_wastage_wt').value = '0'; // CUSTOMER WASTAGE WEIGHT
    }
    if (document.getElementById('sttr_panel_name').value == 'RETAIL_FINE_B2') {
        document.getElementById('sttr_cust_wastage').value = '0'; // CUSTOMER WASTAGE
        document.getElementById('sttr_value_added').value = '0'; // VALUE ADDED
        document.getElementById('sttr_cust_wastage_wt').value = '0'; // CUSTOMER WASTAGE WEIGHT
    }

}
//
function calculateAddCustWastageWt() {
    //
    var wt = document.getElementById('sttr_nt_weight').value; // NET WEIGHT
    var wtType = document.getElementById('sttr_nt_weight_type').value; // NET WEIGHT TYPE
    var metalType = document.getElementById('sttr_metal_type').value;
    //
    var custWastgBy;
    //
    //alert('sttr_cust_wastg_by == ' + document.getElementById('sttr_cust_wastg_by').value);
    //
    if (document.getElementById('sttr_cust_wastg_by').value == 'custWastgByNetWt') {
        custWastgBy = parseFloat(document.getElementById('sttr_nt_weight').value);
    } else if (document.getElementById('sttr_cust_wastg_by').value == 'custWastgByGrossWt') {
        custWastgBy = parseFloat(document.getElementById('sttr_gs_weight').value);
    } else if (document.getElementById('sttr_cust_wastg_by').value == 'custWastgByFineWt') {
        custWastgBy = parseFloat(document.getElementById('sttr_fine_weight').value);
    } else {
        custWastgBy = parseFloat(document.getElementById('sttr_gs_weight').value);
    }
    //
    if (isNaN(custWastgBy)) {
        custWastgBy = 0;
    }
    //
    if (custWastgBy == '') {
        custWastgBy = 0;
    }
    //
    //var FFNWT = ((parseFloat(document.getElementById('sttr_final_purity').value) * wt) / 100).toFixed(3);
    //
    if (document.getElementById('sttr_cust_wastage').value > 0) {
        //
        //
        if (document.getElementById('sttr_final_fine_wt_by').value == 'byGrossWtWstg' ||
                document.getElementById('sttr_final_fine_wt_by').value == 'byNetWtWstg') {
            document.getElementById('sttr_cust_wastage_wt').value = ((parseFloat(custWastgBy) * (parseFloat(document.getElementById('sttr_wastage').value) + parseFloat(document.getElementById('sttr_cust_wastage').value))) / 100).toFixed(3);
        } else {
            document.getElementById('sttr_cust_wastage_wt').value = ((parseFloat(custWastgBy) * parseFloat(document.getElementById('sttr_cust_wastage').value)) / 100).toFixed(3);
        }
        //
        //
        if (metalType == 'Gold') {
            if (wtType == 'KG') {
                document.getElementById('sttr_value_added').value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt').value) * parseFloat(document.getElementById('sttr_metal_rate').value)) / document.getElementById('gmWtInKg').value)).toFixed(2);
            } else if (wtType == 'GM') {
                document.getElementById('sttr_value_added').value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt').value) * parseFloat(document.getElementById('sttr_metal_rate').value)) / document.getElementById('gmWtInGm').value)).toFixed(2);
            } else if (wtType == 'MG') {
                document.getElementById('sttr_value_added').value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt').value) * parseFloat(document.getElementById('sttr_metal_rate').value)) / document.getElementById('gmWtInMg').value)).toFixed(2);
            }
        } else if (metalType == 'Silver') {
            if (wtType == 'KG') {
                document.getElementById('sttr_value_added').value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt').value) * parseFloat(document.getElementById('sttr_metal_rate').value)) / document.getElementById('srGmWtInKg').value)).toFixed(2);
            } else if (wtType == 'GM') {
                document.getElementById('sttr_value_added').value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt').value) * parseFloat(document.getElementById('sttr_metal_rate').value)) / document.getElementById('srGmWtInGm').value)).toFixed(2);
            } else if (wtType == 'MG') {
                document.getElementById('sttr_value_added').value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt').value) * parseFloat(document.getElementById('sttr_metal_rate').value)) / document.getElementById('srGmWtInMg').value)).toFixed(2);
            }
        }
        //
    } else {
        document.getElementById('sttr_cust_wastage_wt').value = '0'; // CUSTOMER WASTAGE WEIGHT
        document.getElementById('sttr_value_added').value = '0'; // VALUE ADDED
        document.getElementById('sttr_cust_wastage').value = '0'; // CUSTOMER WASTAGE 
    }
}
//********************************************************************************************************/
// END CODE TO CALCULATE CUSTOMER WASTAGE ACCORDING TO CUSTOMER WASTAGE WEIGHT @PRIYANKA-11APR18
//********************************************************************************************************/
//
//********************************************************************************************************/
// START CODE TO DELETE ESTIMATE @PRIYANKA-08JUNE18
//********************************************************************************************************/
function deleteEstimate(sttrId, panelName, custId, preInvNo = '', postInvNo = '', deletePanel) {
    confirm_box = confirm("Do you really want to delete this Item?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'EstimateList') {
                    document.getElementById("EstimateList").innerHTML = xmlhttp.responseText;
                    document.getElementById('deleteInvVerifyPopUp').style.display = "none";
                } else {
                    document.getElementById("estimateDetails").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName + "&custId=" + custId + "&preInvNo=" + preInvNo + "&postInvNo=" + postInvNo + "&deletePanel=" + deletePanel, true);
        xmlhttp.send();
}
}
/********************************************************************************************************/
// END CODE TO DELETE ESTIMATE @PRIYANKA-08JUNE18
/********************************************************************************************************/
//
//********************************************************************************************************/
// START CODE FOR MAKE ESTIMATE @PRIYANKA-08JUNE18
//********************************************************************************************************/
function makeEstimate(custId, preInvoice, postInvoice, panelName, documentRoot, prevInvoices = null) {
    let preInvoiceStr = '';
    if (prevInvoices > 0 && prevInvoices != '' && prevInvoices != null) {
        for (let i = 1; i <= prevInvoices; i++) {
            invChk = document.getElementById('preInvoice' + i).checked;
            invChkvalue = document.getElementById('preInvoice' + i).value;
            if (invChk == true) {
                preInvoiceStr = preInvoiceStr + '|' + invChkvalue;
            }
        }
    }
    if (preInvoiceStr.startsWith('|')) {
        preInvoiceStr = preInvoiceStr.substring(1);
    }
    confirm_box = confirm("Do you really want to make Estimate?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("estimateDetails").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omestimatenav" + default_theme + ".php?custId=" + custId + "&preInvoice=" + preInvoice + "&postInvoice=" +
                postInvoice + "&panelName=" + panelName + "&documentRoot=" + documentRoot + "&preInvoiceStr=" + preInvoiceStr, true);
        xmlhttp.send();
}
}
//********************************************************************************************************/
// END CODE FOR MAKE ESTIMATE @PRIYANKA-08JUNE18
//********************************************************************************************************/
//
//********************************************************************************************************/
// START CODE TO DELETE XRF ENTRIES @PRIYANKA-01AUG18
//********************************************************************************************************/
function deleteXRF(utinId, panelName, custId) {
    confirm_box = confirm("Do you really want to delete this Item?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("XRFList").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?utinId=" + utinId + "&panelName=" + panelName + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
//********************************************************************************************************/
// END CODE TO DELETE XRF ENTRIES @PRIYANKA-01AUG18
//********************************************************************************************************/
//
//********************************************************************************************************/
// START CODE TO DELETE XRF ENTRIES @PRIYANKA-02AUG18
//********************************************************************************************************/
function deleteXRFEntries(panelName, xrfId, custId, mainPanel, preInv, invNo) {
    var documentRoot = document.getElementById("documentRoot").value;
    confirm_box = confirm("Do you really want to delete this Item?");
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
        xmlhttp.open("GET", "include/php/omwaldel" + default_theme + ".php?xrfId=" + xrfId + "&documentRoot=" + documentRoot + "&panelName=" + panelName + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
//********************************************************************************************************/
// END CODE TO DELETE XRF ENTRIES @PRIYANKA-02AUG18
//********************************************************************************************************/
//
//********************************************************************************************************/
// START CODE TO UPDATE XRF ENTRIES @PRIYANKA-03AUG18
//********************************************************************************************************/
function updateXRFEntries(xrfId, custId, panelName, mainPanel, xrfPreInvoiceNo, xrfInvoiceNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'updateXRFEntries' || panelName == 'updatePayXRFEntries') {
        xmlhttp.open("GET", "include/php/ogxrfdv" + default_theme + ".php?xrfId=" + xrfId + "&panelName=" + panelName + "&custId=" + custId + "&transactionType=XRF" + "&xrf_pre_invoice_no=" + xrfPreInvoiceNo + "&xrf_invoice_no=" + xrfInvoiceNo, true);
    } else if (panelName == 'updateXRFPayEntries') {
        xmlhttp.open("GET", "include/php/ompayment" + default_theme + ".php?utinId=" + xrfId + "&preInv=" + xrfPreInvoiceNo + "&invNo=" + xrfInvoiceNo + "&panelName=" + panelName + "&custId=" + custId, true);
    }
    xmlhttp.send();
}
////********************************************************************************************************/
// START CODE TO DELETE METAL VALUATION ENTRIES @SANSKRUTI- 3FEB2023
//********************************************************************************************************/

function deleteMetalValuation(sttrId, panelName, custId, sttrPreInvoiceNo, sttrInvoiceNo) {
    confirm_box = confirm("Do you really want to delete this Item?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("MetalValuationList").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omMetalValuationDel" + default_theme + ".php?sttrId=" + sttrId + "&panelName=MetalValuationList" + "&custId=" + custId + "&MetalValuation_pre_invoice_no=" + sttrPreInvoiceNo + "&MetalValuation_invoice_no=" + sttrInvoiceNo, true);
        xmlhttp.send();
    }
}
//********************************************************************************************************/
// END CODE TO DELETE METAL VALUATION ENTRIES @SANSKRUTI- 3FEB2023
//********************************************************************************************************/
//********************************************************************************************************/
// START CODE TO DELETE METAL VALUATION ENTRIES @SANSKRUTI- 24JAN2023
//********************************************************************************************************/
function deleteMetalValuationEntries(panelName, sttrid, custId) {
    //alert (sttrid);
    var documentRoot = document.getElementById("documentRoot").value;
    confirm_box = confirm("Do you really want to delete this Item?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("metalvaluationDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omMetalValuationDel" + default_theme + ".php?MetalValuationId=" + sttrid + "&documentRoot=" + documentRoot + "&panelName=" + panelName + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
//********************************************************************************************************/
// END CODE TO DELETE METAL VALUATION ENTRIES @SANSKRUTI- 24JAN2023
//********************************************************************************************************/
//
//
//********************************************************************************************************/
// START CODE TO UPDATE Metal Valuation ENTRIES @SANSKRUTI- 24JAN2023
//********************************************************************************************************/
function updateMetalValuationEntries(sttrid, custId, panelName, mainPanel, sttrPreInvoiceNo, sttrInvoiceNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'sttr_panel_name') {

        xmlhttp.open("GET", "include/php/oggoldvalution" + default_theme + ".php?MetalValuationId=" + sttrid + "&panelName=MetalValuationUp" +
                "&custId=" + custId + "&sttrIndicator=Metalvaluation" +
                "&transactionType=Metalvaluation" + "&MetalValuation_pre_invoice_no=" + sttrPreInvoiceNo +
                "&MetalValuation_invoice_no=" + sttrInvoiceNo, true);

    } else if (panelName == 'updateMetalValuationPayEntries') {

        xmlhttp.open("GET", "include/php/omPaymentMetalValuation" + default_theme + ".php?&sttrid=" + sttrid +
                "&custId=" + custId + "&panelName=" + panelName +
                "&MetalValuation_pre_invoice_no=" + sttrPreInvoiceNo + "&MetalValuation_invoice_no=" + sttrInvoiceNo, true);

    }
    xmlhttp.send();
}
//********************************************************************************************************/
// END CODE TO UPDATE METAL VALUATION ENTRIES @SANSKRUTI- 24JAN2023
//********************************************************************************************************/
//
//
//********************************************************************************************************/
// START CODE FOR SET PURITY, LAB CHARGES, WASTAGE ACCORDING TO USER AND ITEM CODE @PRIYANKA-22AUG18
//********************************************************************************************************/
function setPurityAccUserItmCode(itemCode, userId) {
    //alert('itemCode == ' + itemCode);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("SetPurityMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omsetpurity" + default_theme + ".php?itemCode=" + itemCode + "&userId=" + userId, true);
    xmlhttp.send();
}
//
function purItmSetPurityDetails(purity, wastage, labChargs, labChargsType, itemCategory, itemName) {
    //alert('itemCategory == ' + itemCategory);
    //alert('itemName == ' + itemName);
    document.getElementById('sttr_purity').value = purity;
    document.getElementById('sttr_wastage').value = wastage;
    document.getElementById('sttr_lab_charges').value = labChargs;
    document.getElementById('sttr_lab_charges_type').value = labChargsType;
    document.getElementById('sttr_item_category').value = itemCategory;
    document.getElementById('sttr_item_name').value = itemName;
}
function getUserGrpAllDetails(noEmi, emiAmt, bnsAmt, strtTknNo, endTknNo, totAmt, totPrinAmt, schName, userGroup, mainStartTknNo) {
    document.getElementById('kittyNoOfEmi').value = noEmi;
    document.getElementById('kittyEmiAmount').value = emiAmt;
    document.getElementById('kittyBonusAmount').value = bnsAmt;
    document.getElementById('kittyTokenNo').value = strtTknNo;
    document.getElementById('kittyAmount').value = totAmt;
    document.getElementById('kittyFinalAmount').value = totPrinAmt;
    document.getElementById('kittyScheme').value = schName;
    document.getElementById('kittyGroup').value = userGroup;
    document.getElementById('startTokenNo').value = mainStartTknNo;
    document.getElementById('endTokenNo').value = endTknNo;
    searchSchemeForUserBlank('');
}
function getUserGrpAllNewDetails(strtTknNo) {
    document.getElementById('kittyTokenNo').value = strtTknNo;
}
function getCurrentTimeBoxValue(time, inTime, outTime) {
    if (inTime != '' && outTime == '') {
        document.getElementById('timeIn').value = time;
    } else {
        document.getElementById('timeOut').value = time;
    }

}
//
function getDiffInWtValue(diffInWt, timeOut) {
    document.getElementById('diffInWt').value = diffInWt;
    document.getElementById('timeOut').value = timeOut;
}
//
function getAllBoxDetailsByBarcode(desc, wtIn, wtout, tmIn, tmOut, perAllOut, perAllIn, difInWt, remrk, srNum, barcodeDetails, stlcID) {
    document.getElementById('boxDesc').value = desc;
    document.getElementById('weightIn').value = wtIn;
    document.getElementById('weightOut').value = wtout;
    document.getElementById('timeIn').value = tmIn;
    document.getElementById('timeOut').value = tmOut;
    document.getElementById('outPerson').value = perAllOut;
    document.getElementById('inPerson').value = perAllIn;
    document.getElementById('diffInWt').value = difInWt;
    document.getElementById('remark').value = remrk;
    document.getElementById('boxSrNo').value = srNum;
    document.getElementById('panelNameBarcode').value = barcodeDetails;
    document.getElementById('stlcID').value = stlcID;
}
//
function getAllBoxDetailsByBarcodeIn(srNum, barcodeNum, desc) {
    document.getElementById('boxSrNo').value = srNum;
    document.getElementById('barodeBox').value = barcodeNum;
    document.getElementById('boxDesc').value = desc;
}
//
function getAllBoxDetailsByBarcodeNull(barcodeNumNull) {
    document.getElementById('barodeBox').value = barcodeNumNull;
}
//
function getDepWithdrawFinalAmount(perMonthInt, finalAmt) {
    document.getElementById('descIntAmt').value = perMonthInt;
    document.getElementById('descFinalAmount').value = finalAmt;
}
//********************************************************************************************************/
// END CODE FOR SET PURITY, LAB CHARGES, WASTAGE ACCORDING TO USER AND ITEM CODE @PRIYANKA-22AUG18
//********************************************************************************************************/
//
//********************************************************************************************************/
// START CODE TO DELIVER NEW ORDER ENTRIES @PRIYANKA-27NOV18
//********************************************************************************************************/
function pendingOrderDeliver(sttrId, utinId, userId, pendOrderPanel) {
    //alert('sttrId == ' + sttrId);
    //alert('utinId == ' + utinId);
    //alert('custId == ' + custId);
    //alert('pendOrderPanel == ' + pendOrderPanel);
    confirm_box = confirm("Do you really want to Deliver this Product ?");
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
        xmlhttp.open("POST", "include/php/omnordeliverprodlist" + default_theme + ".php?sttrId=" + sttrId + "&utinId=" + utinId + "&userId=" + userId + "&pendOrderPanel=" + pendOrderPanel, true);
        xmlhttp.send();
    }
}
//********************************************************************************************************************************************/
// END CODE TO DELIVER NEW ORDER ENTRIES @PRIYANKA-27NOV18
//********************************************************************************************************************************************/
//
//********************************************************************************************************************************************/
// START CODE FOR PENDING ORDER LIST : NEW ORDER PENDING PRODUCT - SELL THAT PRODUCT FROM SELL PANEL FUNCTIONALITY : @PRIYANKA-03DEC18
//********************************************************************************************************************************************/
function pendingOrderProdSell(sttrId, preId, postId, custId, newOrderPanelName) {
    //alert('preId == ' + preId);
    //alert('postId == ' + postId);
    //alert('custId == ' + custId);
    //alert('newOrderPanelName == ' + newOrderPanelName);
    confirm_box = confirm("Do you really want to Sell this Product through Sell Panel ?");
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
        xmlhttp.open("POST", "include/php/ogspjsdv" + default_theme + ".php?sttrId= " + sttrId + "&srchItemPreId=" + preId + "&srchItemPostId=" + postId + "&custId=" + custId + "&newOrderPanelName=" + newOrderPanelName, true);
        xmlhttp.send();
    }
}
//**********************************************************************************************************************************************/
// END CODE FOR PENDING ORDER LIST : NEW ORDER PENDING PRODUCT - SELL THAT PRODUCT FROM SELL PANEL FUNCTIONALITY : @PRIYANKA-03DEC18
//**********************************************************************************************************************************************/
//
//******************************************************************************************************************************************************/
// START CODE FOR NEW ORDER PENDING PRODUCT ORDER LIST - ADD PRODUCT INTO STOCK THEN SELL THAT PRODUCT FROM SELL PANEL FUNCTIONALITY : @PRIYANKA-04DEC18
//******************************************************************************************************************************************************/
function pendingOrderProdAddSell(sttrId, preId, postId, custId, newOrderPanelName) {
    //alert('preId == ' + preId);
    //alert('postId == ' + postId);
    //alert('custId == ' + custId);
    //alert('newOrderPanelName == ' + newOrderPanelName);
    confirm_box = confirm("Do you really want to Add this Product into Stock and then Sell this Product through Sell Panel ?");
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
        xmlhttp.open("POST", "include/php/ogspjsdv" + default_theme + ".php?sttrId= " + sttrId + "&srchItemPreId=" + preId + "&srchItemPostId=" + postId + "&custId=" + custId + "&newOrderPanelName=" + newOrderPanelName, true);
        xmlhttp.send();
    }
}
//****************************************************************************************************************************************************/
// END CODE FOR NEW ORDER PENDING PRODUCT ORDER LIST - ADD PRODUCT INTO STOCK THEN SELL THAT PRODUCT FROM SELL PANEL FUNCTIONALITY : @PRIYANKA-04DEC18
//****************************************************************************************************************************************************/
//
//******************************************************************************************************************************************************/
// START CODE FOR UNIVERSAL PENDING ORDER LIST AND ASSIGN MULTIPLE ORDERS TO ONE KARIGAR FUNCTIONALITY : @PRIYANKA-07DEC18
//******************************************************************************************************************************************************/
//
// CODE FOR UNIVERSAL PENDING ORDER LIST @PRIYANKA-07DEC18
function showUniversalPendOrder(universalPanel, status) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcccldv" + default_theme + ".php?universalPanel=" + universalPanel + "&status=" + status, true);
    xmlhttp.send();
}
//
// CODE FOR ASSIGN MULTIPLE PENDING ORDERS TO ONE USER/KARIGAR @PRIYANKA-07DEC18
function assignOrderAllSelectedRecord(assignCheck, assignUserId) {
    confirm_box = confirm("\n\nDo you really want to Assign this Orders?");
    if (confirm_box == true) {
        var selectedId = new Array();
        for (var i = 0; i < assignCheck.length; i++) {
            if (assignCheck[i].checked)
                selectedId.push(assignCheck[i].value);
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("universalAssignOrderDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omAssignPendOrder" + default_theme + ".php?selectedId=" + selectedId + "&assignUserId=" + assignUserId, true);
        xmlhttp.send();
    }
}
//
// CODE FOR ASSIGN MULTIPLE PENDING ORDERS TO USER
function assignOrderToUser() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("assignOrderToUserDiv").style.visibility = "visible";
    }
}
//******************************************************************************************************************************************************/
// END CODE FOR UNIVERSAL PENDING ORDER LIST AND ASSIGN MULTIPLE ORDERS TO ONE KARIGAR FUNCTIONALITY : @PRIYANKA-07DEC18
//******************************************************************************************************************************************************/
//
//
//******************************************************************************************************************************************************/
// Start Code For Product Code Dropdown Functionality on Supplier Panel :
// According to that Category and Name dropdown will show : @PRIYANKA-07JAN19
//******************************************************************************************************************************************************/
//
function searchSuppProductCode(itemCode, userId, metalType, prodCategory, prodItemName, divNum, keyCodeInput, documentRootPath, panelName, payPanelName) {
    keyCodeForProdCode = keyCodeInput;
    divNumForProdCode = divNum;
    panelNameForProdCode = panelName;
    //
    var poststr = "itemCode=" + encodeURIComponent(itemCode) +
            "&userId=" + encodeURIComponent(userId) +
            "&metalType=" + encodeURIComponent(metalType) +
            "&prodCategory=" + encodeURIComponent(prodCategory) +
            "&prodItemName=" + encodeURIComponent(prodItemName) +
            "&divNum=" + encodeURIComponent(divNum) +
            "&keyCodeInput=" + encodeURIComponent(keyCodeInput) +
            "&documentRootPath=" + encodeURIComponent(documentRootPath) +
            "&panelName=" + encodeURIComponent(panelName) +
            "&payPanelName=" + encodeURIComponent(payPanelName);
    //
    search_prod_codes(documentRootPath + "/include/php/omprodcodesearch" + default_theme + ".php", poststr);
}
//
var keyCodeForProdCode;
var divNumForProdCode;
var panelNameForProdCode;
function search_prod_codes(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchSuppProductCode;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//
function alertSearchSuppProductCode() {
    if (panelNameForProdCode == 'suppJewelleryPanel') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("searchSuppProductCodeDiv").innerHTML = xmlhttp.responseText;
            if (keyCodeForProdCode == 40 || keyCodeForProdCode == 38) {
                document.getElementById('searchSuppProductCodeDivSelect').focus();
                document.getElementById('searchSuppProductCodeDivSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
}
//******************************************************************************************************************************************************/
// End Code For Product Code Dropdown Functionality on Supplier Panel :
// According to that Category and Name dropdown will show : @PRIYANKA-07JAN19
//******************************************************************************************************************************************************/
//
// 
function getStockTransCategoryFunc(category) {

    var productCategory = category.value;
    //alert('productCategory == ' + productCategory);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogstallyRFID" + default_theme + ".php?productCategory=" + productCategory, true);
    xmlhttp.send();
}
//
// *********************************************************************************************************
// Start Code for Raw Metal Panel Stone Functionality @Author:PRIYANKA-14MAR19
// *********************************************************************************************************
// 
// Start Code to Get/Add Crystal Div @Author:PRIYANKA-14MAR19
function getStockCrystalDivFunc(crystalCount, div, commonPanel, documentRootPath) {

    //alert('UpdateItemPanel == ' + document.getElementById("UpdateItemPanel").value); 
    //alert('noOfCry == ' + document.getElementById("noOfCry").value);  
    //alert('crystalCount == ' + crystalCount);

    // Entry Update time, after stone weight less from GS WT @Author:PRIYANKA-14MAR19
    if (document.getElementById("rawPanelName").value == 'RawDetUpPanel' ||
            document.getElementById("rawPanelName").value == 'RawPayUp') {
        cryCountGobal = crystalCount;
    } else {
        cryCountGobal++;
    }

    //alert('cryCountGobal == ' + cryCountGobal);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (crystalCount == '') {
                noOfCrystal = 1;
                if (document.getElementById("noOfCry").value == '' || document.getElementById("noOfCry").value == '0') {
                    document.getElementById("noOfCry").value = noOfCrystal;
                }
                document.getElementById(div).innerHTML = xmlhttp.responseText;
            } else {
                noOfCrystal = crystalCount;
                document.getElementById(div + crystalCount).innerHTML = xmlhttp.responseText;
            }
            document.getElementById('totalCrystalCount').value = noOfCrystal;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omrwwacydv" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel, true);
    xmlhttp.send();
}
// End Code to Get/Add Crystal Div @Author:PRIYANKA-14MAR19
//
// Start Code to Close Crystal Div @Author:PRIYANKA-14MAR19
function closeStockCrystalDivFunc(cryCount, panelName, stprCryId, itstCryId, sttrId, wtId, wtTypeId, sellPanel, documentRootPath) {
    cryCountGobal--;
    //alert('cryCount == ' + cryCount);
    //alert('cryCountGobal == ' + cryCountGobal);

    if (sttrId == '' || sttrId == null) {
        document.getElementById('slPrAutoLessCryWt' + cryCount).value = false;
        autoLessWeightStockCrystalFunc(cryCount, document.getElementById('slPrAutoLessCryWt' + cryCount).value, 'sttr_nt_weight', 'sttr_nt_weight_type', '', 'AddStock');
    }

    document.getElementById("del" + cryCount).value = 'Deleted';
    document.getElementById("crystal" + cryCount).innerHTML = "";
    if (sttrId != '') {
        deleteRawStockCrystalDivFunc(panelName, sellPanel, stprCryId, itstCryId, sttrId, documentRootPath);
    }

    calcRawMetalCrystalVal();
    return false;
}
// End Code to Close Crystal Div @Author:PRIYANKA-14MAR19
//
// Start Code to Delete Crystal @Author:PRIYANKA-14MAR19
function deleteStockCrystalDivFunc(stprCryId, itstCryId, sttrId, documentRootPath) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("suppSellPurProdSubDiv").innerHTML = xmlhttp2.responseText;
            closeMessDiv('messDisplayDiv', 'CRYSTAL DELETED');
        }
    };
    xmlhttp2.open("POST", documentRootPath + "/include/php/omrwcydldv" + default_theme + ".php?itprCryId=" + stprCryId +
            "&itstCryId=" + itstCryId + "&sttrId=" + sttrId + "&panelName=RawMetalPanel", true);
    xmlhttp2.send();
}
// End Code to Delete Crystal @Author:PRIYANKA-14MAR19
//
// Start Code for Crystal Price Calculations @Author:PRIYANKA-14MAR19
function calcRawMetalCrystalVal() {

    var crystalEntered = 0;
    var totalCryVal = 0;
    var cryGSWT = 0;
    var count = 1;
    var delId = 'del' + count;
    var totCryTax = 0;
    if (noOfCrystal == null) {
        var inputs = document.querySelectorAll('#addItemCryCount');
        var noOfCrystal = inputs[inputs.length - 1].value;
    }
    if (noOfCrystal == '') {
        document.getElementById('sttr_stone_valuation').value = 0;
        document.getElementById('sttr_final_valuation').value = document.getElementById('sttr_valuation').value;
        document.getElementById('sttr_nt_weight').value = document.getElementById('sttr_gs_weight').value;
        document.getElementById('netWeight').value = document.getElementById('sttr_gs_weight').value;
    }
    for (var dc = count; dc <= noOfCrystal; dc++) {
        if (document.getElementById('del' + dc))
        {
            if (document.getElementById('del' + dc).value != 'Deleted') {

                var crystalQTY = parseInt(document.getElementById('sttr_quantity' + dc).value);
                var crystalGsWt = parseFloat(document.getElementById('sttr_gs_weight_' + dc).value);
                var crystalGsWtTyp = document.getElementById('sttr_gs_weight_type' + dc).value;
                var crystalRate = parseFloat(document.getElementById('sttr_purchase_rate' + dc).value);
                var crystalRateType = document.getElementById('sttr_purchase_rate_type' + dc).value;
                var crystalVal = parseFloat(document.getElementById('sttr_valuation' + dc).value);
                var totalGSWTNRate = 0;

                // START CODE TO CALCULATE VALUATION ACCORDING TO CRYSTAL WEIGHT TYPE & CRYSTAL RATE TYPE @PRIYANKA-18FEB18
                if (crystalRateType == 'KG') { // CRYSTAL RATE TYPE IN KG
                    if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
                        totalGSWTNRate = crystalRate * crystalGsWt;
                    else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
                        totalGSWTNRate = (crystalRate / 1000) * crystalGsWt;
                    else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
                        totalGSWTNRate = (crystalRate * 0.0002) * crystalGsWt;
                    else
                        totalGSWTNRate = (crystalRate / (1000 * 1000)) * crystalGsWt;
                } else if (crystalRateType == 'GM') { // CRYSTAL RATE TYPE IN GM
                    if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
                        totalGSWTNRate = crystalRate * 1000 * crystalGsWt;
                    else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
                        totalGSWTNRate = crystalRate * crystalGsWt;
                    else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
                        totalGSWTNRate = (crystalRate * 0.2) * crystalGsWt;
                    else
                        totalGSWTNRate = (crystalRate / 1000) * crystalGsWt;
                } else if (crystalRateType == 'MG') { // CRYSTAL RATE TYPE IN MG
                    if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
                        totalGSWTNRate = crystalRate * 1000 * 1000 * crystalGsWt;
                    else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
                        totalGSWTNRate = crystalRate * 1000 * crystalGsWt;
                    else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
                        totalGSWTNRate = (crystalRate * 200) * crystalGsWt;
                    else
                        totalGSWTNRate = crystalRate * crystalGsWt;
                } else if (crystalRateType == 'CT') { // CRYSTAL RATE TYPE IN CT
                    if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
                        totalGSWTNRate = ((crystalRate / 0.0002) * crystalGsWt);
                    else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
                        totalGSWTNRate = ((crystalRate / 0.2) * crystalGsWt);
                    else if (crystalGsWtTyp == 'MG') // CRYSTAL WEIGHT TYPE IN MG
                        totalGSWTNRate = ((crystalRate / 200) * crystalGsWt);
                    else
                        totalGSWTNRate = crystalRate * crystalGsWt;
                } else if (crystalRateType == 'PP') { // CRYSTAL RATE TYPE IN PP @PRIYANKA-13MAR18
                    totalGSWTNRate = crystalRate * crystalQTY; // CRYSTAL VAL @PRIYANKA-13MAR18
                } else if (crystalRateType == 'FX') { // CRYSTAL RATE TYPE IN FX @PRIYANKA-12OCT2020
                    totalGSWTNRate = crystalRate; // CRYSTAL RATE TYPE IN FX @PRIYANKA-12OCT2020
                } else {
                    totalGSWTNRate = crystalRate * crystalGsWt;
                }
                // END CODE TO CALCULATE VALUATION ACCORDING TO CRYSTAL WEIGHT TYPE & CRYSTAL RATE TYPE @PRIYANKA-18FEB18

                if (document.getElementById('sttr_purchase_rate_type' + dc).value != document.getElementById('sttr_sell_rate_type' + dc).value) {
                    document.getElementById('sttr_sell_rate_type' + dc).value = document.getElementById('sttr_purchase_rate_type' + dc).value;
                }

                // STONE CGST IN % @PRIYANKA-24FEB18
                if (document.getElementById('sttr_tot_price_cgst_per' + dc).value == '' || document.getElementById('sttr_tot_price_cgst_per' + dc).value == 'NaN') {
                    document.getElementById('sttr_tot_price_cgst_per' + dc).value = 0;
                }

                // CALCULATE STONE CGST AMT => (STONE VAL * STONE CGST IN %) / 100 @PRIYANKA-24FEB18
                if (document.getElementById('sttr_tot_price_cgst_per' + dc).value != '') {
                    document.getElementById('sttr_tot_price_cgst_chrg' + dc).value = (parseFloat(document.getElementById('sttr_valuation' + dc).value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per' + dc).value) / 100)).toFixed(2);
                }

                // STONE CGST CHRG @PRIYANKA-24FEB18
                if (document.getElementById('sttr_tot_price_cgst_chrg' + dc).value == '' || document.getElementById('sttr_tot_price_cgst_chrg' + dc).value == 'NaN') {
                    document.getElementById('sttr_tot_price_cgst_chrg' + dc).value = 0;
                }

                // STONE SGST IN % @PRIYANKA-24FEB18
                if (document.getElementById('sttr_tot_price_sgst_per' + dc).value == '' || document.getElementById('sttr_tot_price_sgst_per' + dc).value == 'NaN') {
                    document.getElementById('sttr_tot_price_sgst_per' + dc).value = 0;
                }

                // CALCULATE STONE SGST AMT => (STONE VAL * STONE SGST IN %) / 100 @PRIYANKA-24FEB18
                if (document.getElementById('sttr_tot_price_sgst_per' + dc).value != '') {
                    document.getElementById('sttr_tot_price_sgst_chrg' + dc).value = (parseFloat(document.getElementById('sttr_valuation' + dc).value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per' + dc).value) / 100)).toFixed(2);
                }

                // STONE SGST CHRG @PRIYANKA-24FEB18
                if (document.getElementById('sttr_tot_price_sgst_chrg' + dc).value == '' || document.getElementById('sttr_tot_price_sgst_chrg' + dc).value == 'NaN') {
                    document.getElementById('sttr_tot_price_sgst_chrg' + dc).value = 0;
                }

                // STONE IGST IN % @PRIYANKA-24FEB18
                if (document.getElementById('sttr_tot_price_igst_per' + dc).value == '' || document.getElementById('sttr_tot_price_igst_per' + dc).value == 'NaN') {
                    document.getElementById('sttr_tot_price_igst_per' + dc).value = 0;
                }

                // CALCULATE MET IGST AMT => (STONE VAL * STONE IGST IN %) / 100 @PRIYANKA-24FEB18
                if (document.getElementById('sttr_tot_price_igst_per' + dc).value != '') {
                    document.getElementById('sttr_tot_price_igst_chrg' + dc).value = (parseFloat(document.getElementById('sttr_valuation' + dc).value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per' + dc).value) / 100)).toFixed(2);
                }

                // STONE IGST CHRG @PRIYANKA-24FEB18
                if (document.getElementById('sttr_tot_price_igst_chrg' + dc).value == '' || document.getElementById('sttr_tot_price_igst_chrg' + dc).value == 'NaN') {
                    document.getElementById('sttr_tot_price_igst_chrg' + dc).value = 0;
                }

                // CALCULATE TOT TAX AMT =>  STONE CGST AMT + STONE SGST AMT + STONE IGST AMT @PRIYANKA-24FEB18
                document.getElementById('sttr_tot_tax' + dc).value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg' + dc).value) +
                        parseFloat(document.getElementById('sttr_tot_price_sgst_chrg' + dc).value) +
                        parseFloat(document.getElementById('sttr_tot_price_igst_chrg' + dc).value)).toFixed(2);

                if (document.getElementById('sttr_tot_tax' + dc).value == '' || document.getElementById('sttr_tot_tax' + dc).value == 'NaN') {
                    document.getElementById('sttr_tot_tax' + dc).value = 0;
                }

                document.getElementById('sttr_valuation' + dc).value = (totalGSWTNRate).toFixed(2);

                if (document.getElementById('sttr_valuation' + dc).value == 'NaN') {
                    document.getElementById('sttr_valuation' + dc).value = 0;
                }

                totalCryVal += parseFloat(document.getElementById('sttr_valuation' + dc).value);

                cryGSWT += parseFloat(document.getElementById('sttr_gs_weight_' + dc).value);

                totCryTax += parseFloat(document.getElementById('sttr_tot_tax' + dc).value);

                // CALCULATE FINAL VALUATION @PRIYANKA-23FEB18
//            console.log(totalCryVal);
                document.getElementById('addItemCryFinVal').value = parseFloat(parseFloat(totalCryVal) + parseFloat(totCryTax)).toFixed(2);

                if (document.getElementById('addItemCryFinVal').value == 'NaN') {
                    document.getElementById('addItemCryFinVal').value = 0;
                }

                document.getElementById('sttr_final_valuation' + dc).value = parseFloat(parseFloat(document.getElementById('sttr_valuation' + dc).value) + parseFloat(document.getElementById('sttr_tot_tax' + dc).value)).toFixed(2);

                if (document.getElementById('sttr_final_valuation' + dc).value == 'NaN') {
                    document.getElementById('sttr_final_valuation' + dc).value = 0;
                }

                // document.getElementById('addItemCryFinVal').value = (parseFloat(totalCryVal)).toFixed(2);

                if (document.getElementById('addItemCryFinVal').value != '') {

                    if (document.getElementById('subPanel').value == 'SuppPurByInv') {
                        document.getElementById('sttr_stone_wt').value = (parseFloat(cryGSWT)).toFixed(2);
                        document.getElementById('sttr_stone_wt_type').value = document.getElementById('sttr_gs_weight_type' + dc).value;
                        document.getElementById('sttr_stone_valuation').value = (parseFloat(totalCryVal)).toFixed(2);
                        addInvoiceValue();
                        calcFuncSupplierFineJewelleryPurchase();
                    } else {
                        calStockItemPrice();
                    }
                }
            }
        }
        if (document.getElementById(delId).value == 'Deleted') {
            document.getElementById('addItemCryFinVal').value = 0 + totalCryVal;
            if (document.getElementById('subPanel').value == 'SuppPurByInv') {
                document.getElementById('sttr_stone_valuation').value = (parseFloat(totalCryVal)).toFixed(2);
                addInvoiceValue();
                calcFuncSupplierFineJewelleryPurchase();
            } else {
                calStockItemPrice();
            }
        }
        crystalEntered++;
    }
    return false;
}
// Start Code for Crystal Price Calculations @Author:PRIYANKA-14MAR19
// 
// Start Code for Crystal Weight Less From Main Product Functionality @Author:PRIYANKA-14MAR19
function autoLessWeightStockCrystalFunc(cryCount, autoChk, gsWtId, wtTypId, cryPanel, sellPanel) {
    //
    //alert('cryCount == ' + cryCount);
    //alert('autoChk == ' + autoChk);
    //alert('gsWtId == ' + gsWtId);
    //alert('wtTypId == ' + wtTypId);
    //
    var remWt = 0;
    //
    if (document.getElementById('sttr_gs_weight_' + cryCount).value == '' ||
            document.getElementById('sttr_gs_weight_' + cryCount).value == 'NaN')
        document.getElementById('sttr_gs_weight_' + cryCount).value = 0;
    //
    var cryGSW = document.getElementById('sttr_gs_weight_' + cryCount).value;
    var cryGSWT = document.getElementById('sttr_gs_weight_type' + cryCount).value;
    //
    if (document.getElementById('sttr_gs_weight').value == '' ||
            document.getElementById('sttr_gs_weight').value == 'NaN')
        document.getElementById('sttr_gs_weight').value = 0;
    //
    var itemGSW = parseFloat(document.getElementById('sttr_gs_weight').value);
    var itemGSWT = document.getElementById(wtTypId).value;
    //
    //
    // START CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @Author:PRIYANKA-14MAR19
    if (cryGSWT == 'KG') { // CRYSTAL WEIGHT TYPE IN KG
        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSW = cryGSW;
    } else if (cryGSWT == 'GM') { // CRYSTAL WEIGHT TYPE IN GM
        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSW = (cryGSW * 0.001);
        else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSW = cryGSW;
        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSW = (cryGSW * 1000);
    } else if (cryGSWT == 'MG') { // CRYSTAL WEIGHT TYPE IN MG
        if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSW = (cryGSW * 0.001);
        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSW = cryGSW;
    } else if (cryGSWT == 'CT') { // CRYSTAL WEIGHT TYPE IN CT
        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSW = (cryGSW * 0.0002);
        else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSW = (cryGSW * 0.2);
        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSW = (cryGSW * 200);
    }
    // END CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @Author:PRIYANKA-14MAR19
    //
    //
    if (cryPanel == 'deleteCry') {
        //
        if (autoChk) {
            remWt = parseFloat(itemGSW) + parseFloat(cryGSW);
            document.getElementById(gsWtId).value = parseFloat(remWt).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(remWt).toFixed(3);
            changeNetWeightByPktWt();
        }
        //
    } else {
        //
        if (autoChk) {
            //
            var gsWt = document.getElementById('sttr_gs_weight').value;
            var gsWtType = document.getElementById('sttr_gs_weight_type').value;
            if (gsWt == '' || gsWt == null) {
                gsWt = 0;
            }
            //
            //
            var newNetWT = parseFloat(document.getElementById('sttr_nt_weight').value).toFixed(3);
            //
            var totCryGSW = 0;
            //
            //alert('cryCountGobal 1== ' + cryCountGobal);
            //
            if (document.getElementById('totalCrystalCount').value > 0 && cryCountGobal <= 0)
                cryCountGobal = document.getElementById('totalCrystalCount').value;

            //alert('cryCountGobal 2== ' + cryCountGobal);

            for (var i = 1; i <= cryCountGobal; i++) {

                //alert('i == ' + i);

                var finalNtWt = document.getElementById('sttr_gs_weight').value;
                var itemGSWT = document.getElementById('sttr_gs_weight_type').value;
                var cryGSW = document.getElementById('sttr_gs_weight_' + i).value;
                //alert('sttr_gs_weight ==' + document.getElementById('sttr_gs_weight_' + i).value);

                var cryGSWT = document.getElementById('sttr_gs_weight_type' + i).value;
                //alert('sttr_gs_weight_type ==' + document.getElementById('sttr_gs_weight_type' + i).value);

                if (document.getElementById('slPrAutoLessCryWt' + i).checked == true) {
                    //
                    // START CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @Author:PRIYANKA-14MAR19
                    if (cryGSWT == 'KG') { // CRYSTAL WEIGHT TYPE IN KG
                        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
                            cryGSW = cryGSW;
                    } else if (cryGSWT == 'GM') { // CRYSTAL WEIGHT TYPE IN GM
                        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
                            cryGSW = (cryGSW * 0.001);
                        else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
                            cryGSW = cryGSW;
                        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
                            cryGSW = (cryGSW * 1000);
                    } else if (cryGSWT == 'MG') { // CRYSTAL WEIGHT TYPE IN MG
                        if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
                            cryGSW = (cryGSW * 0.001);
                        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
                            cryGSW = cryGSW;
                    } else if (cryGSWT == 'CT') { // CRYSTAL WEIGHT TYPE IN CT
                        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
                            cryGSW = (cryGSW * 0.0002);
                        else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
                            cryGSW = (cryGSW * 0.2);
                        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
                            cryGSW = (cryGSW * 200);
                    }
                    // END CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @Author:PRIYANKA-14MAR19
                    //
                    totCryGSW += parseFloat(cryGSW);
                    //
                }
            }

            //
            var NetWT = parseFloat(finalNtWt) - parseFloat(totCryGSW);
            //
            if (cryCount <= 1) {
                var newNtWeight = NetWT;
                remWt = newNtWeight;
            } else {
                remWt = NetWT;
            }
            //
            if (cryPanel != 'rawAddStock') {
                document.getElementById(gsWtId).value = parseFloat(remWt).toFixed(3);
            }
            document.getElementById('netWeight').value = parseFloat(remWt).toFixed(3);
            document.getElementById('sttr_nt_weight').value = parseFloat(remWt).toFixed(3);
            //
        } else {
            //
            var gsWt = document.getElementById('sttr_gs_weight').value;
            var gsWtType = document.getElementById('sttr_gs_weight_type').value;
            if (gsWt == '' || gsWt == null) {
                gsWt = 0;
            }
            //
            var newNetWT = parseFloat(gsWt).toFixed(3);
            var remNTWt;
            //
            remNTWt = parseFloat(itemGSW) + parseFloat(cryGSW);
            //
            if (newNetWT == remNTWt) {
                remWt = parseFloat(itemGSW) + parseFloat(cryGSW);
            } else {
                var finalNtWt = document.getElementById('netWeight').value;
                remWt = parseFloat(finalNtWt) + parseFloat(cryGSW);
            }
            //
            if (cryPanel != 'rawAddStock') {
                document.getElementById(gsWtId).value = parseFloat(remWt).toFixed(3);
            }
            document.getElementById('netWeight').value = parseFloat(remWt).toFixed(3);
            document.getElementById('sttr_nt_weight').value = parseFloat(remWt).toFixed(3);
        }
        //
        changeNetWeightByPktWt();
        calRawMetalFinVal();
        //
    }
}
// End Code for Crystal Weight Less From Main Product Functionality @Author:PRIYANKA-14MAR19
// 
// *********************************************************************************************************
// Start Code for Raw Metal Panel Stone Functionality @Author:PRIYANKA-14MAR19
// *********************************************************************************************************
// 
// *********************************************************************************************************
// Start Code to Delete Pending New Order Entries @Author:PRIYANKA-06APR19
// *********************************************************************************************************
function pendingOrderDeliverDel(sttrId, utinId, custId, mainPanel) {
//    alert('sttrId---->'+sttrId);
//     alert('utinId---->'+utinId);
//      alert('custId---->'+custId);
//       alert('mainPanel---->'+mainPanel);
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
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&utinId=" + utinId +
                "&panelName=" + mainPanel + "&mainPanel=" + mainPanel + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
// *********************************************************************************************************
// End Code to Delete Pending New Order Entries @Author:PRIYANKA-06APR19
// *********************************************************************************************************
//
//
// *********************************************************************************************************
// Start Code to Update New Order Entries @Author:PRIYANKA-06APR19
// *********************************************************************************************************
function pendingOrderUpdate(sttrId, utinId, custId, firmId, payPanelName, prodPreInvNo, prodInvNo) {
    //
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
    xmlhttp.open("GET", "include/php/stock/omStockTransForm" + default_theme + ".php?sttrId=" + sttrId + "&utinId=" + utinId +
            "&sttr_sttrin_id=" + sttrId + "&prodPreInvNo=" + prodPreInvNo + "&prodInvNo=" + prodInvNo +
            "&operation=update&panelName=addNewOrder&mainPanel=addNewOrder&paymentPanelDisp=YES&custId=" + custId +
            "&firmId=" + firmId + "&divName=cust_middle_body&indicator=stock" +
            "&stockType=retail&transactionType=newOrder" +
            "&payPanelName=" + payPanelName + "&transPanelName=" + payPanelName, true);
    //
    xmlhttp.send();
    //
}
// *********************************************************************************************************
// End Code to Update New Order Entries @Author:PRIYANKA-06APR19
// *********************************************************************************************************
//
//
//
// *********************************************************************************************************
// Start Code to Update New Order Entries @Author:PRIYANKA-23DEC2021
// *********************************************************************************************************
function AllOrderUpdate(sttrId, utinId, custId, firmId, payPanelName, prodPreInvNo, prodInvNo) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("AllOrdersList").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("GET", "include/php/stock/omStockTransForm" + default_theme + ".php?sttrId=" + sttrId + "&utinId=" + utinId +
            "&sttr_sttrin_id=" + sttrId + "&prodPreInvNo=" + prodPreInvNo + "&prodInvNo=" + prodInvNo +
            "&operation=update&panelName=addNewOrder&mainPanel=addNewOrder&paymentPanelDisp=YES&custId=" + custId +
            "&firmId=" + firmId + "&divName=cust_middle_body&indicator=stock" +
            "&stockType=retail&transactionType=newOrder" +
            "&payPanelName=" + payPanelName + "&transPanelName=" + payPanelName, true);
    //
    xmlhttp.send();
    //
}
// *********************************************************************************************************
// End Code to Update New Order Entries @Author:PRIYANKA-23DEC2021
// *********************************************************************************************************
//
//
//
// ADD CODE FOR RFID TAG @PRIYANKA-12APR2019
function addRFIDTag(mainEntryId, documentRootPath, panelName, RFIDAutoBarcodePrint, indicator) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addRFIDTagDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omAddRFIDTag" + default_theme + ".php?mainEntryId=" + mainEntryId +
            "&documentRootPath=" + documentRootPath + "&panelName=" + panelName + "&RFIDAutoBarcodePrint=" + RFIDAutoBarcodePrint + "&indicator=" + indicator, true);
    xmlhttp.send();
}

function showFineTrendProductsDetails(itemCategory, itemName, panel, panelName, metalType, stockType, stockPurity) {

    //alert('itemCategory == ' + itemCategory);
    //alert('itemName == ' + itemName);
    //alert('panel == ' + panel); 
    //alert('panelName == ' + panelName); 
    //alert('metalType == ' + metalType);
    //alert('stockType == ' + stockType);
    //alert('stockPurity == ' + stockPurity);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText; //change in div name @AUTHOR: SANDY25SEP13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omfinetrendproddetails" + default_theme + ".php?panel=" + panel + "&panelName=" + panelName
            + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName
            + "&stockType=" + stockType + "&stockPurity=" + stockPurity, true);
    xmlhttp.send();
}

function numberOfRowsInActiveGirviListInt(documentRootPath, rowsPerPage, selFirmId, sortKeyword, pageNum, searchColumn, searchValue, updateRows, custId)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("activeGirvListDiv").innerHTML = xmlhttp.responseText;
        } else {
            // document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
            // document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omchacgvint" + default_theme + ".php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
            "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows + "&custId=" + custId, true);
    xmlhttp.send();
}

function showSelectedPageActiveGirviInt(pageNo, panel, rowsPerPage, noOfPagesAsLink, selFirmId, sortKeyword, searchColumn, searchValue, custId) {

    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.barcode_search.barcode_text.focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("activeGirvListDiv").innerHTML = xmlhttp.responseText;
                if (pageNo >= 10) {
                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omchacgvint" + default_theme + ".php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&custId=" + custId, true);
        xmlhttp.send();
    }
}


function showPurReturnInvDiv(srchInvNo, custId, panelName) {
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
    var searchItemIdCharPart = srchInvNo.substr(0, charLen);
    var searchItemIdNumPart = srchInvNo.substr(charLen);
    // alert('searchItemIdCharPart ==' + searchItemIdCharPart);

    //  alert('searchItemIdNumPart ==' + searchItemIdNumPart);

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("purchaseReturnDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omprrtrndv" + default_theme + ".php?srchPreInvNo=" + searchItemIdCharPart + "&srchInvNo="
            + searchItemIdNumPart + "&custId=" + custId + "&panelName=" + panelName, true);
    xmlhttp.send();
}
//FUNCTION ADDED @AUTHOR:SHRI17AUG19
function calculateFinalPrincAmt() {
    //
    if (document.getElementById("principalAmount").value == '' || document.getElementById("principalAmount").value == 0)
        document.getElementById("principalAmount").value = 0;
    if (document.getElementById("chargeAmountPer").value == '' || document.getElementById("chargeAmountPer").value == 0)
        document.getElementById("chargeAmountPer").value = 0;
    if (document.getElementById("processingAmountPer").value == '' || document.getElementById("processingAmountPer").value == 0)
        document.getElementById("processingAmountPer").value = 0;
    if (document.getElementById("processingAmount").value == '' || document.getElementById("processingAmount").value == 0)
        document.getElementById("processingAmount").value = 0;
    if (document.getElementById("chargeAmount").value == '' || document.getElementById("chargeAmount").value == 0)
        document.getElementById("chargeAmount").value = 0;
    //
    //
//    if (document.getElementById("chargeAmountPer").value != '') {
//        document.getElementById("chargeAmount").value = parseFloat(parseFloat(document.getElementById("principalAmount").value) * parseFloat(document.getElementById("chargeAmountPer").value) / 100);
//    }
    //
//    if (document.getElementById("processingAmountPer").value != '') {
//        document.getElementById("processingAmount").value = (parseFloat(parseFloat(document.getElementById("principalAmount").value) * parseFloat(document.getElementById("processingAmountPer").value) / 100)).toFixed(0);
//    }
    //
    //
    if (document.getElementById("chargeAmountPer").value != '' && document.getElementById("chargeAmountPerCal").value == 'YES') {
        document.getElementById("chargeAmount").value = (parseFloat(parseFloat(document.getElementById("principalAmount").value) * parseFloat(document.getElementById("chargeAmountPer").value) / 100)).toFixed(0);
    }
    //
    if (document.getElementById("processingAmountPer").value != '' && document.getElementById("processingAmountPerCal").value == 'YES') {
        document.getElementById("processingAmount").value = (parseFloat(parseFloat(document.getElementById("principalAmount").value) * parseFloat(document.getElementById("processingAmountPer").value) / 100)).toFixed(0);
    }
    //
    //
    var girvFinalMainPrincipalAmt = 0;
    var firstMonthInterest = document.getElementById("selFirstMonthInt").checked;
    var processingAmtPlusMinus = document.getElementById("processingAmountAction").value;
    var ChargesAmtPlusMinus = document.getElementById("chargesAmountAction").value;
    var processingAmountForCalculation;
    var chargesAmountForCalculation;
    //
    if (firstMonthInterest == true) {
        firstMonthInterestAmt = parseFloat(document.getElementById("firstMonthInterestAmt").value);
    } else {
        firstMonthInterestAmt = 0;
    }
    //
    if (processingAmtPlusMinus == 'minus') {
        processingAmountForCalculation = parseFloat(document.getElementById("processingAmount").value * -1);
    } else {
        processingAmountForCalculation = parseFloat(document.getElementById("processingAmount").value);
    }
    //
    if (ChargesAmtPlusMinus == 'minus') {
        chargesAmountForCalculation = parseFloat(document.getElementById("chargeAmount").value * -1);
    } else {
        chargesAmountForCalculation = parseFloat(document.getElementById("chargeAmount").value);
    }
    //
    girvFinalMainPrincipalAmt = (parseFloat(document.getElementById("principalAmount").value) +
            parseFloat(processingAmountForCalculation) +
            parseFloat(chargesAmountForCalculation) -
            parseFloat(firstMonthInterestAmt)).toFixed(2);
    if (girvFinalMainPrincipalAmt == 'NaN')
        girvFinalMainPrincipalAmt = 0;
    document.getElementById("finalPrincipalAmount").value = girvFinalMainPrincipalAmt;
    document.getElementById("girvCashAmtRec").value = girvFinalMainPrincipalAmt;
    calTotalPaidAmount();
}
// FUNCTION ADDED @AUTHOR:SHRI03DEC19
//
function calculateFinalPrincper() {
    if (document.getElementById("principalAmount").value == '' || document.getElementById("principalAmount").value == 0)
        document.getElementById("principalAmount").value = 0;
    if (document.getElementById("processingAmount").value != '') {
        document.getElementById("processingAmountPer").value = (parseFloat(100 * parseFloat(document.getElementById("processingAmount").value) / parseFloat(document.getElementById("principalAmount").value))).toFixed(2);
    }
    calculateFinalPrincAmt();
}
//
//
function calculateFinalPrincChargePer() {
    if (document.getElementById("principalAmount").value == '' || document.getElementById("principalAmount").value == 0)
        document.getElementById("principalAmount").value = 0;
    if (document.getElementById("chargeAmount").value != '') {
        document.getElementById("chargeAmountPer").value = (parseFloat(100 * parseFloat(document.getElementById("chargeAmount").value) / parseFloat(document.getElementById("principalAmount").value))).toFixed(2);
    }
    calculateFinalPrincAmt();
}
//
//
function purchaseReportByItems() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("purchaseDetailsSubDiv").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogPurchaseReportByItems" + default_theme + ".php", true);
    xmlhttp.send();
}
// FUNCTION ADDED TO DISPLAY SCHEME PERIOD TYPE @AUTHOR:SHRI05DEC19
function setSchemePrdTyp(schemePrdTyp) {
    var panelName = document.getElementById('panelName').value;
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("schemePrdTypDiv").innerHTML = xmlhttp2.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp2.open("GET", "include/php/omSchemePrdTyp" + default_theme + ".php?schemePrdTyp=" + schemePrdTyp + "&panelName=" + panelName, true);
    xmlhttp2.send();
}

// FUNCTION ADDED TO DISPLAY SCHEME TYPE @AUTHOR:SHRI05DEC19
function setSchemeMetalType(schemeMetalType) {
    var panelName = document.getElementById('panelName').value;
    loadXMLDoc4();
    xmlhttp4.onreadystatechange = function () {
        if (xmlhttp4.readyState == 4 && xmlhttp4.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("metalCashDiv").innerHTML = xmlhttp4.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp4.open("GET", "include/php/omSchemeMetalType" + default_theme + ".php?schemeMetalType=" + schemeMetalType + "&panelName=" + panelName, true);
    xmlhttp4.send();
}


// FUNCTION ADDED TO DISPLAY SCHEME GROUP BONUS EMI DIV @AUTHOR:SHRI29DEC19
var noOfSchemeBonusEMI;
function getSchemeDiscountEMIFunc(schemeEmiCount, div, ominId, schemeId, commonPanel, documentRootPath) {
    if (document.getElementById("panelName").value == 'updateusergroup') {
        schemeEmiCountGobal = schemeEmiCount;
    } else {
        schemeEmiCountGobal++;
    }
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (schemeEmiCount == '') {
                noOfSchemeBonusEMI = 1;
                if (document.getElementById("noOfSchemeBonusEMI").value == '' || document.getElementById("noOfSchemeBonusEMI").value == '0') {
                    document.getElementById("noOfSchemeBonusEMI").value = noOfSchemeBonusEMI;
                }
                document.getElementById(div).innerHTML = xmlhttp.responseText;
            } else {
                noOfSchemeBonusEMI = schemeEmiCount;
                document.getElementById(div + schemeEmiCount).innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omktbinstldiscsbdv" + default_theme + ".php?schemeEmiCount=" + schemeEmiCount + "&commonPanel=" + commonPanel, true);
    xmlhttp.send();
}

// FUNCTION ADDED TO CLOSE SCHEME GROUP BONUS EMI DIV @AUTHOR:SHRI29DEC19
function closeSchemeDiscountEMIFunc(schemeEmiCount, panelName, ominId, schemeId, documentRootPath) {
//    alert(panelName);
    schemeEmiCountGobal--;
    document.getElementById("del" + schemeEmiCount).value = 'Deleted';
    document.getElementById("bonusDiscount" + schemeEmiCount).innerHTML = "";
    if (schemeId != '') {
        deleteSchemeDiscountEMIFunc(panelName, ominId, schemeId, documentRootPath);
    }
    return false;
}

function deleteSchemeDiscountEMIFunc(panelName, ominId, schemeId, documentRootPath) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("userGroupMain").innerHTML = xmlhttp2.responseText;
            closeMessDiv('messDisplayDiv', 'EMI DELETED ');
        }
    };
    xmlhttp2.open("POST", documentRootPath + "/include/php/omadscgdemidl" + default_theme + ".php?panelName=" + panelName + "&ominId=" + ominId + "&schemeId=" + schemeId, true);
    xmlhttp2.send();
}

// DELETE APPROVAL ENTRY @AUTHOR:SHRI02JAN20
function deleteApproval(sttrId, panelName, custId) {
    confirm_box = confirm("Do you really want to delete this Item?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoiceNew").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
/* START CODE ADD FUNCTIONS FOR RETAIL-IMITATION B2 STOCK SELL-PURCHASE @AUTHOR:MADHUREE-03FEB2020 */
function callItemPriceImitationB2() {
    var transType = document.getElementById('sttr_transaction_type').value;
    if (transType == 'sell') {
        //
        document.getElementById('sttr_total_cust_price').value = ((parseFloat(document.getElementById('slPrItemPieces').value) * document.getElementById('slPrItemCharges').value)).toFixed(2);
        document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('slPrItemPieces').value) * document.getElementById('slPrItemCharges').value)).toFixed(2);
        document.getElementById('sttr_metal_amt').value = ((parseFloat(document.getElementById('slPrItemPieces').value) * document.getElementById('slPrItemCharges').value)).toFixed(2);
        document.getElementById('taxByValMainAmount').value = ((parseFloat(document.getElementById('slPrItemPieces').value) * document.getElementById('slPrItemCharges').value)).toFixed(2);
        //
        // ADDED CODE FOR DISCOUNT FUNCTIONALITY @PRIYANKA-30NOV2020
        if (document.getElementById('sttr_itm_disc_type').value == 'AMT') {
            //
            var metalDiscountAmt = parseFloat(document.getElementById('sttr_itm_disc_amt').value);
            //
        } else {
            //
            // METAL DISCOUNT IN % @PRIYANKA-30NOV2020
            var sttr_metal_discount_per = document.getElementById('sttr_metal_discount_per').value;
            //
            // CALCULATE METAL DISCOUNT AMT @PRIYANKA-30NOV2020
            var metalDiscountAmt = Math_round(parseFloat(document.getElementById('sttr_metal_amt').value) * parseFloat(sttr_metal_discount_per) / 100).toFixed(2);
            //
        }
        //
        // METAL DISCOUNT AMT @PRIYANKA-30NOV2020
        document.getElementById('sttr_metal_discount_amt').value = Math_round(parseFloat(metalDiscountAmt)).toFixed(2);
        //
        if (document.getElementById('sttr_metal_discount_amt').value == 'NaN') {
            document.getElementById('sttr_metal_discount_amt').value = 0;
        }
        //
        // AMOUNTS AFTER DISCOUNT @PRIYANKA-30NOV2020
        if (metalDiscountAmt > 0) {
            var stockTotalVal = parseFloat(document.getElementById('sttr_metal_amt').value).toFixed(2);
            document.getElementById('sttr_valuation').value = (Math_round(parseFloat(stockTotalVal) - parseFloat(metalDiscountAmt))).toFixed(2);
            document.getElementById('taxByValMainAmount').value = (Math_round(parseFloat(stockTotalVal) - parseFloat(metalDiscountAmt))).toFixed(2);
            document.getElementById('sttr_total_cust_price').value = (Math_round(parseFloat(stockTotalVal) - parseFloat(metalDiscountAmt))).toFixed(2);
        }
        //
        //
        if (document.getElementById('sttr_metal_amt').value == 'NaN') {
            document.getElementById('sttr_metal_amt').value = 0;
        }
        //
        //
    } else {
        //
        document.getElementById('sttr_valuation').value = (parseFloat(document.getElementById('sttr_quantity').value) * parseFloat(document.getElementById('sttr_price').value)).toFixed(2);
        document.getElementById('taxByValMainAmount').value = (parseFloat(document.getElementById('sttr_quantity').value) * parseFloat(document.getElementById('sttr_price').value)).toFixed(2);
        //
    }

    if (document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }

    // CGST IN % @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_cgst_per').value == '' || document.getElementById('sttr_tot_price_cgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_per').value = '';
    }

    // CALCULATE CGST AMT => (VAL * CGST IN %) / 100 @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_cgst_per').value != '') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
    }

    // CGST CHRG @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_cgst_chrg').value == '' || document.getElementById('sttr_tot_price_cgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = 0;
    }

    // SGST IN % @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_sgst_per').value == '' || document.getElementById('sttr_tot_price_sgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_per').value = '';
    }

    // CALCULATE SGST AMT => (VAL * SGST IN %) / 100 @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_sgst_per').value != '') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
    }

    // SGST CHRG @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_sgst_chrg').value == '' || document.getElementById('sttr_tot_price_sgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = 0;
    }

    // IGST IN % @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_igst_per').value == '' || document.getElementById('sttr_tot_price_igst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_per').value = '';
    }

    // CALCULATE IGST AMT => (VAL * IGST IN %) / 100 @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_igst_per').value != '') {
        document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
    }

    // IGST CHRG @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_igst_chrg').value == '' || document.getElementById('sttr_tot_price_igst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_chrg').value = 0;


    }

    if (document.getElementById('sttr_tax').value == '' || document.getElementById('sttr_tax').value == 'NaN' ||
            document.getElementById('sttr_tax').value == 'undefined') {
        document.getElementById('sttr_tax').value = '';
    }


    // CALCULATE TOT TAX AMT => CGST AMT + SGST AMT + IGST AMT @AUTHOR:PRIYANKA-25JULY2020
    document.getElementById('sttr_tot_tax').value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);
    if (document.getElementById('sttr_tot_tax').value == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }

    // CALCULATE TOT TAX AMT @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tax').value > 0) {
        document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
    }

    // CALCULATE FINAL PRICE => PRICE + TOTAL TAX @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_tax').value != '') {
        document.getElementById('sttr_final_valuation').value = Math_round(parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
    } else {
        document.getElementById('sttr_final_valuation').value = Math_round((parseFloat(document.getElementById('sttr_valuation').value))).toFixed(2);
    }

    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }


    return false;
}
//

function callItemPriceImitationRetailB2() {
    var transType = document.getElementById('sttr_transaction_type').value;
    if (transType == 'sell') {
        //
        document.getElementById('sttr_total_cust_price').value = ((parseFloat(document.getElementById('slPrItemPieces').value) * document.getElementById('slPrItemCharges').value)).toFixed(2);
        document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('slPrItemPieces').value) * document.getElementById('slPrItemCharges').value)).toFixed(2);
        document.getElementById('sttr_metal_amt').value = ((parseFloat(document.getElementById('slPrItemPieces').value) * document.getElementById('slPrItemCharges').value)).toFixed(2);
        document.getElementById('taxByValMainAmount').value = ((parseFloat(document.getElementById('slPrItemPieces').value) * document.getElementById('slPrItemCharges').value)).toFixed(2);
        //
        // ADDED CODE FOR DISCOUNT FUNCTIONALITY @PRIYANKA-30NOV2020
        if (document.getElementById('sttr_itm_disc_type').value == 'AMT') {
            //
            var metalDiscountAmt = parseFloat(document.getElementById('sttr_itm_disc_amt').value);
            //
        } else {
            //
            // METAL DISCOUNT IN % @PRIYANKA-30NOV2020
            var sttr_metal_discount_per = document.getElementById('sttr_metal_discount_per').value;
            //
            // CALCULATE METAL DISCOUNT AMT @PRIYANKA-30NOV2020
            var metalDiscountAmt = Math_round(parseFloat(document.getElementById('sttr_metal_amt').value) * parseFloat(sttr_metal_discount_per) / 100).toFixed(2);
            //
        }
        //
        // METAL DISCOUNT AMT @PRIYANKA-30NOV2020
        document.getElementById('sttr_metal_discount_amt').value = Math_round(parseFloat(metalDiscountAmt)).toFixed(2);
        //
        if (document.getElementById('sttr_metal_discount_amt').value == 'NaN') {
            document.getElementById('sttr_metal_discount_amt').value = 0;
        }
        //
        // AMOUNTS AFTER DISCOUNT @PRIYANKA-30NOV2020
        if (metalDiscountAmt > 0) {
            var stockTotalVal = parseFloat(document.getElementById('sttr_metal_amt').value).toFixed(2);
            document.getElementById('sttr_valuation').value = (Math_round(parseFloat(stockTotalVal) - parseFloat(metalDiscountAmt))).toFixed(2);
            document.getElementById('taxByValMainAmount').value = (Math_round(parseFloat(stockTotalVal) - parseFloat(metalDiscountAmt))).toFixed(2);
            document.getElementById('sttr_total_cust_price').value = (Math_round(parseFloat(stockTotalVal) - parseFloat(metalDiscountAmt))).toFixed(2);
        }
        //
        //
        if (document.getElementById('sttr_metal_amt').value == 'NaN') {
            document.getElementById('sttr_metal_amt').value = 0;
        }
        //
        //
    } else {
        var purchesTaxDiscont = 0;
        var purchesDiscont = 0;
        var purchesTax = 0;
        var purchesAmt = document.getElementById('sttr_price').value;
        var sellTaxDiscont = 0;
        var sellDiscont = 0;
        var sellTax = 0;
        var sellAmt = document.getElementById('sttr_sell_rate').value;
        //PURCHES TAX AND DISC 
        if (document.getElementById('sttr_lab_charges').value != '') {
            purchesTax = (parseFloat(document.getElementById('sttr_lab_charges').value));
        }
        if (document.getElementById('sttr_purches_discount_per').value != '') {
            purchesDiscont = (parseFloat(purchesAmt) * parseFloat(document.getElementById('sttr_purches_discount_per').value) / 100);
            document.getElementById('sttr_purches_discount_amt').value = purchesDiscont;
        }
        purchesTaxDiscont = (parseFloat(purchesAmt) + (purchesTax - purchesDiscont));
        if (purchesTaxDiscont == 0 || purchesTaxDiscont == '') {
            document.getElementById('sttr_purchase_price').value = document.getElementById('sttr_price').value
        } else {
            document.getElementById('sttr_purchase_price').value = purchesTaxDiscont;
        }


        //SELL TAX AND DISC 
        if (document.getElementById('sttr_making_charges').value != '') {
            sellTax = (parseFloat(document.getElementById('sttr_making_charges').value));
        }
        if (document.getElementById('sttr_metal_discount_per').value != '') {
            sellDiscont = (parseFloat(sellAmt) * parseFloat(document.getElementById('sttr_metal_discount_per').value) / 100);
            document.getElementById('sttr_metal_discount_amt').value = sellDiscont;
        }
        sellTaxDiscont = (parseFloat(sellAmt) + (sellTax - sellDiscont));
        if (sellTaxDiscont == 0 || sellTaxDiscont == '') {
            document.getElementById('sttr_cust_price').value = document.getElementById('sttr_sell_rate').value;
        } else {
            document.getElementById('sttr_cust_price').value = sellTaxDiscont;
        }

        document.getElementById('sttr_valuation').value = (parseFloat(document.getElementById('sttr_quantity').value) * parseFloat(document.getElementById('sttr_purchase_price').value)).toFixed(2);
        document.getElementById('taxByValMainAmount').value = (parseFloat(document.getElementById('sttr_quantity').value) * parseFloat(document.getElementById('sttr_price').value)).toFixed(2);
        //
    }

    if (document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }

    // CGST IN % @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_cgst_per').value == '' || document.getElementById('sttr_tot_price_cgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_per').value = '';
    }

    // CALCULATE CGST AMT => (VAL * CGST IN %) / 100 @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_cgst_per').value != '') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
    }

    // CGST CHRG @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_cgst_chrg').value == '' || document.getElementById('sttr_tot_price_cgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = 0;
    }

    // SGST IN % @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_sgst_per').value == '' || document.getElementById('sttr_tot_price_sgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_per').value = '';
    }

    // CALCULATE SGST AMT => (VAL * SGST IN %) / 100 @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_sgst_per').value != '') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
    }

    // SGST CHRG @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_sgst_chrg').value == '' || document.getElementById('sttr_tot_price_sgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = 0;
    }

    // IGST IN % @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_igst_per').value == '' || document.getElementById('sttr_tot_price_igst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_per').value = '';
    }

    // CALCULATE IGST AMT => (VAL * IGST IN %) / 100 @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_igst_per').value != '') {
        document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
    }

    // IGST CHRG @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_price_igst_chrg').value == '' || document.getElementById('sttr_tot_price_igst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_chrg').value = 0;
    }

    if (document.getElementById('sttr_tax').value == '' || document.getElementById('sttr_tax').value == 'NaN' ||
            document.getElementById('sttr_tax').value == 'undefined') {
        document.getElementById('sttr_tax').value = '';
    }


    // CALCULATE TOT TAX AMT => CGST AMT + SGST AMT + IGST AMT @AUTHOR:PRIYANKA-25JULY2020
    document.getElementById('sttr_tot_tax').value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);
    if (document.getElementById('sttr_tot_tax').value == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }

    // CALCULATE TOT TAX AMT @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tax').value > 0) {
        document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
    }

    // CALCULATE FINAL PRICE => PRICE + TOTAL TAX @AUTHOR:PRIYANKA-25JULY2020
    if (document.getElementById('sttr_tot_tax').value != '') {
        document.getElementById('sttr_final_valuation').value = Math_round(parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
    } else {
        document.getElementById('sttr_final_valuation').value = Math_round((parseFloat(document.getElementById('sttr_valuation').value))).toFixed(2);
    }

    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }
    return false;
}
function searchImitationB2ItemByItemId(searchItemId, autoEntryValue, custId) {
    //alert(custId);
    const processedRfids = new Set();
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;
    if (searchItemIdLen > 20) {
        // Code to check rfid numbers
        // --- Input Validation ---
        if (searchItemId === '' || searchItemIdLen > 24) {
            // Ignore empty input
            console.log('Ignore empty input:', searchItemId);
            return;
        }
        if (processedRfids.has(searchItemId)) {
            // It's a duplicate, ignore it but maybe give feedback
            console.log('Duplicate ignored:', searchItemId);
            return; // Stop processing this input
        }
        // --- Process Unique RFID ---
        // 1. Add to our client-side set to prevent future duplicates
        processedRfids.add(searchItemId);
        //
        console.log('RFID:', searchItemId);
        var searchItemIdCharPart = '';
        var searchItemIdNumPart = searchItemId;

        document.getElementById('srchItemPreId').value = searchItemIdCharPart;
        document.getElementById('srchItemPostId').value = searchItemIdNumPart;
    } else {
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
        var searchItemIdCharPart = searchItemId.substr(0, charLen);
        var searchItemIdNumPart = searchItemId.substr(charLen);
        //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
        //alert('searchItemIdNumPart == ' + searchItemIdNumPart);

        document.getElementById('srchItemPreId').value = searchItemIdCharPart;
        document.getElementById('srchItemPostId').value = searchItemIdNumPart;
    }
    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
//        if (proName == 'OMRETL') {
//            xmlhttp.open("GET", "include/php/ogijaitdvRB2sell" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart +
//                    "&srchItemPostId=" + searchItemIdNumPart + "&formName=RETAIL_IMITATION_B2" +
//                    "&custId=" + custId + "&panelName=" + 'autoEntry' +
//                    "&autoEntry=" + autoEntryValue + "&charLen=" + charLen + "&panelName=RETAIL_IMITATION_B2", true);
//        } else {
        xmlhttp.open("GET", "include/php/ogijaitdvB2selldiv" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart +
                "&srchItemPostId=" + searchItemIdNumPart + "&formName=RETAIL_IMITATION_B2" +
                "&custId=" + custId + "&panelName=" + 'autoEntry' +
                "&autoEntry=" + autoEntryValue + "&charLen=" + charLen + "&panelName=RETAIL_IMITATION_B2", true);
//        }

        xmlhttp.send();
    } else {
        return false;
    }
}
//START CODE FOR RETAIL SEARCH PRODUCT @AUTHOR:SHRIKANT 16022023
function searchImitationB2ItemByItemIdRetail(searchItemId, autoEntryValue, custId, serialNum) {
    //alert('searchImitationB2ItemByItemIdRetail');
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
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
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);
    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
    //alert('searchItemIdNumPart == ' + searchItemIdNumPart);

    document.getElementById('srchItemPreId').value = searchItemIdCharPart;
    document.getElementById('srchItemPostId').value = searchItemIdNumPart;
    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogijaitdvRB2sell" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart +
                "&srchItemPostId=" + searchItemIdNumPart + "&formName=RETAIL_IMITATION_B2" +
                "&custId=" + custId + "&panelName=" + 'autoEntry' +
                "&autoEntry=" + autoEntryValue + "&charLen=" + charLen + "&panelName=RETAIL_IMITATION_B2" + "&serialNum=" + serialNum, true);

        xmlhttp.send();
    } else {
        return false;
    }
}

function showSlPrImitationB2InvDivRetail(srchItemPreId, srchItemPostId, custId, serialNum) {
    //alert(serialNum);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            if (document.getElementById('addItemDOBDay')) {
                document.getElementById('addItemDOBDay').focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogijaitdvRB2sell" + default_theme + ".php?srchItemPreId=" + srchItemPreId +
            "&srchItemPostId=" + srchItemPostId + "&custId=" + custId +
            "&panelName=RETAIL_IMITATION_B2" + "&formName=RETAIL_IMITATION_B2" + "&serialNum=" + serialNum, true);
    xmlhttp.send();
}
//END CODE FOR RETAIL SEARCH PRODUCT @AUTHOR:SHRIKANT 16022023
//START CODE FOR RETAIL SEARCH PRODUCT @AUTHOR:SHRIKANT 14032023
function searchImitationAllItemByItemIdRetail(searchItemId, autoEntryValue, custId, serialNum, panelName, formName) {
    //alert('searchImitationB2ItemByItemIdRetail');
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
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
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);
    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
    //alert('searchItemIdNumPart == ' + searchItemIdNumPart);

    document.getElementById('srchItemPreId').value = searchItemIdCharPart;
    document.getElementById('srchItemPostId').value = searchItemIdNumPart;
    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogijsmndvR" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart +
                "&srchItemPostId=" + searchItemIdNumPart + "&formName=" + panelName +
                "&custId=" + custId + "&panelName=" + 'autoEntry' +
                "&autoEntry=" + autoEntryValue + "&charLen=" + charLen + "&panelName=" + panelName + "&serialNum=" + serialNum, true);

        xmlhttp.send();
    } else {
        return false;
    }
}

function showSlPrImitationAllInvDivRetail(srchItemPreId, srchItemPostId, custId, serialNum, panelName, formName) {
    //alert(serialNum);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            if (document.getElementById('addItemDOBDay')) {
                document.getElementById('addItemDOBDay').focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogijsmndvR" + default_theme + ".php?srchItemPreId=" + srchItemPreId +
            "&srchItemPostId=" + srchItemPostId + "&custId=" + custId +
            "&panelName=" + panelName + "&formName=" + panelName + "&serialNum=" + serialNum, true);
    xmlhttp.send();
}
//END CODE FOR RETAIL SEARCH PRODUCT @AUTHOR:SHRIKANT 14032023
function showSlPrImitationB2InvDiv(srchItemPreId, srchItemPostId, custId) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            document.getElementById('addItemDOBDay').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogijaitdvB2selldiv" + default_theme + ".php?srchItemPreId=" + srchItemPreId +
            "&srchItemPostId=" + srchItemPostId + "&custId=" + custId +
            "&panelName=RETAIL_IMITATION_B2" + "&formName=RETAIL_IMITATION_B2", true);
    xmlhttp.send();
}

/* END CODE ADD FUNCTIONS FOR RETAIL-IMITATION B2 STOCK SELL-PURCHASE @AUTHOR:MADHUREE-03FEB2020 */
/* START CODE TO ADD FUNCTION TO SHOW ATTENDANCE REPORT OF STAFF ACCORDING TO SELECTED DATE,@AUTHOR:HEMA-16MAY2020 */
function selattendanceReportMonth(staffId) {
    var attendanceReportMonth = document.getElementById("attendanceReportMonth").value;
    var attendanceReportYear = document.getElementById("attendanceReportYear").value;
// alert(x);
    $.ajax({
        type: "POST",
        url: "include/php/omstaffattendancereport" + default_theme + ".php",
        data: {attendanceReportMonth: attendanceReportMonth, attendanceReportYear: attendanceReportYear, staffId: staffId},
        success: function (data) {
            $("#AttendanceDetails").html(data);
        }
    });
}
/* END CODE TO ADD FUNCTION TO SHOW ATTENDANCE REPORT OF STAFF ACCORDING TO SELECTED DATE,@AUTHOR:HEMA-16MAY2020 */
/* START CODE TO ADD FUNCTION TO SHOW ATTENDANCE REPORT OF STAFF ACCORDING TO SELECTED YEAR,@AUTHOR:HEMA-16MAY2020 */
function selattendanceReportYear(staffId) {
    var attendanceReportMonth = document.getElementById("attendanceReportMonth").value;
    var attendanceReportYear = document.getElementById("attendanceReportYear").value;
// alert(x);
    $.ajax({
        type: "POST",
        url: "include/php/omstaffattendancereport" + default_theme + ".php",
        data: {attendanceReportMonth: attendanceReportMonth, attendanceReportYear: attendanceReportYear, staffId: staffId},
        success: function (data) {
            $("#AttendanceDetails").html(data);
        }
    });
}
/* END CODE TO ADD FUNCTION TO SHOW ATTENDANCE REPORT OF STAFF ACCORDING TO SELECTED YEAR,@AUTHOR:HEMA-16MAY2020 */
/* START CODE TO ADD QUARTERLY LEAVES OF STAFF,@AUTHOR:HEMA-16MAY2020 */
function addQuarterlyLeavesOfStaff(staffId) {
    var firstQurterLeaves = document.getElementById("firstQurterLeaves").value;
    var secondQurterLeaves = document.getElementById("secondQurterLeaves").value;
    var thirdQurterLeaves = document.getElementById("thirdQurterLeaves").value;
    var fourthQurterLeaves = document.getElementById("fourthQurterLeaves").value;
    var currentYear = document.getElementById("currentYear").value;
// alert(x);
    $.ajax({
        type: "POST",
        url: "include/php/omstaffattendancereport" + default_theme + ".php",
        data: {firstQurterLeaves: firstQurterLeaves, secondQurterLeaves: secondQurterLeaves, thirdQurterLeaves: thirdQurterLeaves, fourthQurterLeaves: fourthQurterLeaves, currentYear: currentYear, staffId: staffId},
        success: function (data) {
            $("#AttendanceDetails").html(data);
        }
    });
}
/* END CODE TO ADD QUARTERLY LAEAVES OF STAFF,@AUTHOR:HMEA-16mAY2020 */
//
// FUNCTION ADDED FOR RETAIL AND WHOLESALE PANEL CHANGE IN FORMS - REDIRECTION FUNCTIONALITY @AUTHOR-PRIYANKA-14JULY2020
function showAddRTWHStockPanel(panel, stockPanel, payPanelName, formName, utinId, suppPurId, utansMetalType, payStockPanelName, documentRootPath, proName) {
    //alert('panel == ' + panel);
    //alert('stockPanel == ' + stockPanel);
    //alert('payPanelName == ' + payPanelName);
    //alert('formName == ' + formName);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('main_ajax_loading_div').style.visibility = "hidden";
            if (stockPanel == 'AddByInv' || stockPanel == 'AddImitationByInv') {
                document.getElementById('main_body').innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById('stockPanelSubDiv').innerHTML = xmlhttp.responseText;
            }
            if (panel == "retail") {
                document.getElementById("addRetailStock").setAttribute("class", "greenFont frm-btn");
                document.getElementById("addWholeStock").setAttribute("class", "grayFont frm-btn");
            } else {
                document.getElementById("addRetailStock").setAttribute("class", "grayFont frm-btn");
                document.getElementById("addWholeStock").setAttribute("class", "greenFont frm-btn");
            }
        } else {
            document.getElementById('main_ajax_loading_div').style.visibility = "visible";
        }
    };
    //START CODE IMITATION @AUTHIOR: SHRIKANT 08012023 
    if (formName == 'RETAIL_IMITATION_B2' && proName == 'OMRETL') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvRB2" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&utransUserId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel + "&formName=" + formName + "&panelName=" + formName, true);
    } else if (formName == 'RETAIL_IMITATION_B2' && proName == 'OMUNIM') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvB2" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&utransUserId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel + "&formName=" + formName + "&panelName=" + formName, true);
    } else if (formName == 'RETAIL_IMITATION_B3') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvB3" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&utransUserId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel + "&formName=" + formName + "&panelName=" + formName, true);
    } else if (formName == 'SUBSCRIPTION_FORM' || formName == 'SERVICE_FORM') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvS1" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&utransUserId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel + "&formName=" + formName + "&panelName=" + formName, true);
    } else if (formName == 'RETAIL_IMITATION_NUM_B3' && proName == 'OMRETL') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvRB3" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&utransUserId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel + "&formName=" + formName + "&panelName=" + formName, true);
    }
    xmlhttp.send();
}
//
// FUNCTION ADDED FOR RETAIL AND WHOLESALE PANEL CHANGE IN FORMS - REDIRECTION FUNCTIONALITY @AUTHOR-PRIYANKA-14JULY2020
function showAddRTWHStockPanelStock(panel, stockPanel, payPanelName, formName, utinId, suppPurId, utansMetalType, payStockPanelName, documentRootPath, proName) {
    //alert('panel == ' + panel);
    //alert('stockPanel == ' + stockPanel);
    //alert('payPanelName == ' + payPanelName);
    //alert('formName == ' + formName);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('main_ajax_loading_div').style.visibility = "hidden";
            if (stockPanel == 'AddByInv' || stockPanel == 'AddImitationByInv') {
                document.getElementById('main_body').innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById('stockPanelSubDiv').innerHTML = xmlhttp.responseText;
            }
            if (panel == "retail") {
                document.getElementById("addRetailStock").setAttribute("class", "greenFont frm-btn");
                document.getElementById("addWholeStock").setAttribute("class", "grayFont frm-btn");
            } else {
                document.getElementById("addRetailStock").setAttribute("class", "grayFont frm-btn");
                document.getElementById("addWholeStock").setAttribute("class", "greenFont frm-btn");
            }
        } else {
            document.getElementById('main_ajax_loading_div').style.visibility = "visible";
        }
    };
    //START CODE IMITATION @AUTHIOR: SHRIKANT 08012023 
    if (formName == 'RETAIL_IMITATION_B2' && proName == 'OMRETL') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvRB2" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&utransUserId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel + "&formName=" + formName + "&panelName=" + formName, true);
    } else if (formName == 'RETAIL_IMITATION_B3' && proName == 'OMRETL') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvB3" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&utransUserId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel + "&formName=" + formName + "&panelName=" + formName, true);
    } else if ((formName == 'SUBSCRIPTION_FORM' || formName == 'SERVICE_FORM') && proName == 'OMRETL') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvS1" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&utransUserId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel + "&formName=" + formName + "&panelName=" + formName, true);
    } else if (formName == 'RETAIL_IMITATION_NUM_B3' && proName == 'OMRETL') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvRB3" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&utransUserId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel + "&formName=" + formName + "&panelName=" + formName, true);
    }
    xmlhttp.send();
}
//
var transactionEntryCountGlobal = 3;
var noOfTransactions = 3;
function getTransDivFunc(transactionEntryCount, div, ominId, transId, commonPanel, documentRootPath, firmId) {
    if (transactionEntryCount > 10) {
        alert("You can add only 10 transactions at a time!");
    } else {
        if (document.getElementById("panelName").value == 'updateTransactions') {
            transactionEntryCountGlobal = transactionEntryCount;
        } else {
            transactionEntryCountGlobal++;
        }
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (transactionEntryCount == '') {
                    if (document.getElementById("noOfTransactions").value == '' || document.getElementById("noOfTransactions").value == '0') {
                        document.getElementById("noOfTransactions").value = noOfTransactions;
                    }
                    document.getElementById(div).innerHTML = xmlhttp.responseText;
                } else {
                    noOfTransactions = transactionEntryCount;
                    document.getElementById("noOfTransactions").value = noOfTransactions;
                    document.getElementById(div + transactionEntryCount).innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", documentRootPath + "/include/php/omTransSubDiv_1" + default_theme + ".php?transactionEntryCount=" + transactionEntryCount + "&commonPanel=" + commonPanel + "&firmId=" + firmId, true);
        xmlhttp.send();
    }
}
function closeTransFunc(transactionEntryCount, panelName, mainTransId, transId, documentRootPath) {
//    alert(panelName);
    if (panelName == 'updateTransactions') {
        transactionEntryCountGlobal = document.getElementById("noOfTransactions").value;
    }
    transactionEntryCountGlobal--;
    document.getElementById("del" + transactionEntryCount).value = 'Deleted';
    document.getElementById("transactionEntryDiv" + transactionEntryCount).innerHTML = "";
    document.getElementById("noOfTransactions").value = transactionEntryCountGlobal;
//    alert(document.getElementById("noOfTransactions").value);

    if (transId != '') {
        deleteTransactionSubEntryFunc(panelName, mainTransId, transId, documentRootPath);
    }
    return false;
}
function deleteTransactionSubEntryFunc(panelName, mainTransId, transId, documentRootPath) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("addUpdateTransactionDiv").innerHTML = xmlhttp2.responseText;
            calcTotTransAmount();
            closeMessDiv('messDisplayDiv', 'TRANSACTION DELETED');
        }
    };
    xmlhttp2.open("POST", documentRootPath + "/include/php/omtustrnsdl" + default_theme + ".php?panelName=" + panelName + "&mainTransId=" + mainTransId + "&transId=" + transId, true);
    xmlhttp2.send();
}

// START CODE TO ADD FUNCTION FOR CALCULATE OTHER WEIGHTS BY FINE WEIGHT @AUTHOR:MADHUREE-25JULY2020 //
function calculateWeightByfineWt() {
    //
    var GsWt = 0;
    var PktWt = 0;
    var NtWt = 0;
    var FfnWt = 0;
    var GsWtType = document.getElementById('sttr_gs_weight_type').value;
    var PktWtType = document.getElementById('sttr_pkt_weight_type').value;
    if (document.getElementById('sttr_purity').value != 'NotSelected' && document.getElementById('sttr_purity').value != '') {
        GsWt = ((document.getElementById('sttr_fine_weight').value / document.getElementById('sttr_purity').value) * 100).toFixed(3);
        document.getElementById('sttr_gs_weight').value = parseFloat(GsWt).toFixed(3);
        if (document.getElementById('sttr_pkt_weight').value == '' || document.getElementById('sttr_pkt_weight').value == null) {
            document.getElementById('sttr_pkt_weight').value = parseFloat(PktWt).toFixed(3);
        } else {
            var pktWeightValue = parseFloat(document.getElementById('sttr_pkt_weight').value) || 0;
            var lessWeightValue = parseFloat(document.getElementById('sttr_less_weight').value) || 0;
            var pktWt = pktWeightValue + lessWeightValue;
            var pktWtType = document.getElementById('sttr_pkt_weight_type').value;
            var lessWtType = document.getElementById('sttr_less_weight_type').value;
            if (pktWeightValue == '' || pktWeightValue == null) {
                pktWeightValue = 0;
            }
            //
            if (lessWeightValue == '' || lessWeightValue == null) {
                lessWeightValue = 0;
            }
        }
        NtWt = parseFloat(parseFloat(GsWt) - convertWeight(PktWt, GsWtType, PktWtType, lessWtType)).toFixed(3);
        document.getElementById('sttr_nt_weight').value = parseFloat(NtWt).toFixed(3);
        if (document.getElementById('sttr_final_purity').value != '') {
            document.getElementById('sttr_final_fine_weight').value = ((document.getElementById('sttr_final_purity').value * NtWt) / 100).toFixed(3);
        } else {
            var wastage = document.getElementById('sttr_wastage').value;
            if (wastage != '' && wastage != null) {
                document.getElementById('sttr_final_purity').value = wastage + document.getElementById('sttr_purity').value;
            } else {
                document.getElementById('sttr_final_purity').value = document.getElementById('sttr_purity').value;
            }
            document.getElementById('sttr_final_fine_weight').value = ((document.getElementById('sttr_final_purity').value * NtWt) / 100).toFixed(3);
        }
    }
    calStockItemPrice();
}
// END CODE TO ADD FUNCTION FOR CALCULATE OTHER WEIGHTS BY FINE WEIGHT @AUTHOR:MADHUREE-25JULY2020 

// FUNCTION TO APPEND LEADING DECIMAL'S ON ALL TRANS AMOUNTS @AUTHOR:SHRI12AUG20
function appendDecimalsOnTransAmts() {
    var totalTransactions = 3;
    if (document.getElementById("noOfTransactions").value != '' && document.getElementById("noOfTransactions").value != '0' && document.getElementById("noOfTransactions").value != 'undefined') {
        totalTransactions = document.getElementById("noOfTransactions").value;
    }
    for (var i = 1; i <= totalTransactions; i++) {
        if (document.getElementById('transAmtDr' + i).value != '' && document.getElementById('transAmtDr' + i).value != 0) {
            document.getElementById('transAmtDr' + i).value = parseFloat(document.getElementById('transAmtDr' + i).value).toFixed(2);
        }
        if (document.getElementById('transAmtCr' + i).value != '' && document.getElementById('transAmtCr' + i).value != 0) {
            document.getElementById('transAmtCr' + i).value = parseFloat(document.getElementById('transAmtCr' + i).value).toFixed(2);
        }
    }
}
// FUNCTION - CALCULATION OF ALL TRANS AMOUNTS @AUTHOR:SHRI12AUG20
function calcTotTransAmount() {
    var transAmtDrTotal = 0;
    var transAmtCrTotal = 0;
    var totalTransactions = 3;
//    alert('noOfTransactions:'+document.getElementById("noOfTransactions").value);
    if (document.getElementById("noOfTransactions").value != '' && document.getElementById("noOfTransactions").value != '0' && document.getElementById("noOfTransactions").value != 'undefined') {
        totalTransactions = document.getElementById("noOfTransactions").value;
    }
//    alert('totalTransactions:'+totalTransactions);
    for (var i = 1; i <= totalTransactions; i++) {
//        alert('transAmtDr:'+ i + document.getElementById('transAmtDr' + i).value);
//        alert('transAmtCr:'+document.getElementById('transAmtCr' + i).value);
        if (document.getElementById('transAmtDr' + i).value != '' && document.getElementById('transAmtDr' + i).value != 0) {
            transAmtDrTotal += parseFloat(document.getElementById('transAmtDr' + i).value);
        }
        if (document.getElementById('transAmtCr' + i).value != '' && document.getElementById('transAmtCr' + i).value != 0) {
            transAmtCrTotal += parseFloat(document.getElementById('transAmtCr' + i).value);
        }
    }
    document.getElementById('transAmtDrTotal').value = parseFloat(transAmtDrTotal).toFixed(2);
    document.getElementById('transAmtCrTotal').value = parseFloat(transAmtCrTotal).toFixed(2);
//    alert(fieldId + transEntryCount + ':' + document.getElementById(fieldId + transEntryCount).value);
}

// FUNCTION ADDED FOR RETAIL AND WHOLESALE PANEL CHANGE IN FORMS - 
// REDIRECTION FUNCTIONALITY (STERLING JEWELLERY STOCK) @AUTHOR-PRIYANKA-01AUG2020
function showAddRTWHSterlingStockPanel(panel, stockPanel, payPanelName, formName, utinId, suppPurId, utansMetalType, payStockPanelName, documentRootPath) {
    //
    //alert('panel == ' + panel);
    //alert('stockPanel == ' + stockPanel);
    //alert('payPanelName == ' + payPanelName);
    //alert('formName == ' + formName);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('main_ajax_loading_div').style.visibility = "hidden";
            if (stockPanel == 'AddByInv' || stockPanel == 'AddImitationByInv') {
                document.getElementById('main_body').innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById('stockPanelSubDiv').innerHTML = xmlhttp.responseText;
            }
            if (panel == "retail") {
                document.getElementById("addRetailStock").setAttribute("class", "greenFont frm-btn");
                document.getElementById("addWholeStock").setAttribute("class", "grayFont frm-btn");
            } else {
                document.getElementById("addRetailStock").setAttribute("class", "grayFont frm-btn");
                document.getElementById("addWholeStock").setAttribute("class", "greenFont frm-btn");
            }
        } else {
            document.getElementById('main_ajax_loading_div').style.visibility = "visible";
        }
    };
    if (formName == 'STERLING_JEWELLERY_STOCK') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omijsdv" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&utransUserId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel + "&formName=" + formName + "&panelName=" + formName, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/omijsdv" + default_theme + ".php?stockType=" + panel + "&stockPanelName=" + payPanelName + "&utransInvId=" + utinId + "&utransUserId=" + suppPurId + "&utansMetalType=" + utansMetalType + "&payStockPanelName=" + payStockPanelName + "&invPanel=" + stockPanel + "&formName=" + formName + "&panelName=" + formName, true);
    }
    xmlhttp.send();
}
//
//
function searchProductByProductCode(searchItemId, autoEntryValue, custId, formName) {

    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
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

    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);
    document.getElementById('srchItemPreId').value = searchItemIdCharPart;
    document.getElementById('srchItemPostId').value = searchItemIdNumPart;
    if (autoEntryValue == 'YES') {

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogijsmndv" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart +
                "&srchItemPostId=" + searchItemIdNumPart +
                "&custId=" + custId + "&panelName=" + 'autoEntry' + "&formName=" + formName +
                "&autoEntry=" + autoEntryValue + "&charLen=" + charLen, true);
        xmlhttp.send();
    } else {

        var firstChar = searchItemId.charAt(0);
        var res = firstChar.toUpperCase();
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
                document.getElementById('addItemDOBDay').focus();
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogijsmndv" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart +
                "&srchItemPostId=" + searchItemIdNumPart + "&custId=" + custId + "&formName=" + formName, true);
        xmlhttp.send();
    }
}
//
//
//START CODE FOR REATAIL SELL @AUTHOR:SHRIKANT 14022023
function searchProductByProductCodeRetail(searchItemId, autoEntryValue, custId, formName) {

    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
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

    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);
    document.getElementById('srchItemPreId').value = searchItemIdCharPart;
    document.getElementById('srchItemPostId').value = searchItemIdNumPart;
    if (autoEntryValue == 'YES') {

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogijsmndvR" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart +
                "&srchItemPostId=" + searchItemIdNumPart +
                "&custId=" + custId + "&panelName=" + 'autoEntry' + "&formName=" + formName +
                "&autoEntry=" + autoEntryValue + "&charLen=" + charLen, true);
        xmlhttp.send();
    } else {

        var firstChar = searchItemId.charAt(0);
        var res = firstChar.toUpperCase();
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
                document.getElementById('addItemDOBDay').focus();
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogijsmndvR" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart +
                "&srchItemPostId=" + searchItemIdNumPart + "&custId=" + custId + "&formName=" + formName, true);
        xmlhttp.send();
    }
}
//END CODE FOR REATAIL SELL @AUTHOR:SHRIKANT 14022023

//START CODE FOR RETAIL SEARCH PRODUCT @AUTHOR:SHRIKANT 16022023
function showProductInvDivRetail(srchItemPreId, srchItemPostId, custId, panelName, formName) {
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            if (document.getElementById('slPrDOBDay')) {
                document.getElementById('slPrDOBDay').focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogijsmndvR" + default_theme + ".php?srchItemPreId=" + srchItemPreId +
            "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&formName=" + formName, true);
    xmlhttp.send();
}
//END CODE FOR RETAIL SEARCH PRODUCT @AUTHOR:SHRIKANT 16022023
function showProductInvDiv(srchItemPreId, srchItemPostId, custId, panelName) {

    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            document.getElementById('slPrDOBDay').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogijsmndv" + default_theme + ".php?srchItemPreId=" + srchItemPreId +
            "&srchItemPostId=" + srchItemPostId + "&custId=" + custId + "&panelName=" + panelName, true);
    xmlhttp.send();
}
// START - FUNCTION TO SET ACCOUNT ID TO SUB TRANSACTION @AUTHOR:SHRI12AUG20
var newTransFirmId;
var newNextFieldId;
var newTransPanel;
var selMonth;
var selYear;
function changeSubTransAccount(documentRootPath, transMainDrAccountId, transMainCrAccountId, firmId, nextFieldId, panelName, transMainId, month, year, custId) {
    newTransFirmId = firmId;
    newNextFieldId = nextFieldId;
    newTransPanel = panelName;
    selMonth = month;
    selYear = year;
//    alert('panelName:'+panelName);
    if (firmId == 'NotSelected') {
        alert(' \n\nPlease select Firm Name first!');
    } else {
        var poststr = "transMainDrAccountId=" + transMainDrAccountId +
                "&transMainCrAccountId=" + transMainCrAccountId +
                "&firmId=" + firmId +
                "&custId=" + custId +
                "&nextFieldId=" + nextFieldId;
        if (panelName == 'updateTransaction') {
            poststr = poststr + "&transId=" + transMainId;
//            alert('poststr:' + poststr);
            change_sub_trans_account(documentRootPath + '/include/php/omtutrnd_new' + default_theme + '.php', poststr);
        } else {
            change_sub_trans_account(documentRootPath + '/include/php/omtatrndsb_new' + default_theme + '.php', poststr);
        }
    }
}

function change_sub_trans_account(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertChangeSubTransAccount;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//
function alertChangeSubTransAccount() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (newTransPanel == 'updateTransaction') {
            document.getElementById("addUpdateTransactionDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("mainTransactionDiv").innerHTML = xmlhttp.responseText;
        }
        getFirmVoucherNoNew(newTransFirmId, newTransPanel, selMonth, selYear); //CALL FUNCTION TO SET VCH ID
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
// END - FUNCTION TO SET ACCOUNT ID TO SUB TRANSACTION @AUTHOR:SHRI12AUG20
// *****************START TO CHANGE IN FUNCTION @AUTHOR:SHRI12AUG20***************************
function validateAddTransactionInputsNew(obj) {

    if (document.getElementById("panelName").value == 'UpdateTransaction') {
        noOfTransactions = document.getElementById("noOfTransactions").value;
    } else {
        if (noOfTransactions == '' || noOfTransactions == undefined) {
            noOfTransactions = document.getElementById("noOfTransactions").value;
        }
    }
    if (validateSelectField(document.getElementById("DOBDay").value, "Please select Date!") == false) {
        document.getElementById("DOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Date!") == false) {
        document.getElementById("DOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select Date!") == false) {
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
    } else if (validateSelectField(document.getElementById("transToMainAcc").value, "Please Select Transaction Main DR Account!") == false) {
        document.getElementById("transToMainAcc").focus();
        return false;
    } else if (validateSelectField(document.getElementById("transFromMainAcc").value, "Please Select Transaction Main CR Account!") == false) {
        document.getElementById("transFromMainAcc").focus();
        return false;
    }
//    else if (validateEmptyField(document.getElementById("transAmt").value, "Please enter Transaction Amount!") == false ||
//            validateNumWithDot(document.getElementById("transAmt").value, "Accept only numeric characters without space character!") == false) {
//        document.getElementById("transAmt").focus();
//        return false;
//    } else if (validateSelectField(document.getElementById("transFromAcc").value, "Please select Transaction From Account!") == false) {
//        document.getElementById("transFromAcc").focus();
//        return false;
//    } else if (validateSelectField(document.getElementById("transToAcc").value, "Please select Transaction To Account!") == false) {
//        document.getElementById("transToAcc").focus();
//        return false;
//    }
    /******Start code to remove alpha validation @Author:PRIYA17MAY14****************/
    else if (validateEmptyField(document.getElementById("transSub").value, "Please enter Transaction Subject!") == false) {
        document.getElementById("transSub").focus();
        return false;
    }
    /******End code to remove alpha validation @Author:PRIYA17MAY14****************/
    else if (validateSelectField(document.getElementById("transactionCategory").value, "Please select Transaction Category!") == false) {
        document.getElementById("transactionCategory").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("transAmtCrTotal").value, "CR Total Amount Should Not Be Empty!") == false) {
        document.getElementById("transAmtCrTotal").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("transAmtDrTotal").value, "DR Total Amount Should Not Be Empty!") == false) {
        document.getElementById("transAmtDrTotal").focus();
        return false;
    } else if (parseFloat(document.getElementById("transAmtDrTotal").value).toFixed(2) != parseFloat(document.getElementById("transAmtCrTotal").value).toFixed(2)) {
        alert("Total CR and DR Amounts Should Be Similar");
        return false;
    }
    var crAmtPresent = false;
    var drAmtPresent = false;
//    alert('noOfTransactions:'+noOfTransactions);
    if (noOfTransactions != '' && noOfTransactions != undefined && noOfTransactions != '0') {
        for (var trans = 1; trans <= noOfTransactions; trans++) {
//            alert('trans:'+trans);
            if (document.getElementById("transAmtCr" + trans).value != 'NaN' && document.getElementById("transAmtCr" + trans).value != 0 && document.getElementById("transAmtCr" + trans).value != '') {
//               alert("transAmtCr" + trans +":"+ parseFloat(document.getElementById("transAmtCr" + trans).value));
                crAmtPresent = true;
            }
            if (document.getElementById("transAmtDr" + trans).value != 'NaN' && document.getElementById("transAmtDr" + trans).value != 0 && document.getElementById("transAmtDr" + trans).value != '') {
//                alert("transAmtDr" + trans +":"+ parseFloat(document.getElementById("transAmtDr" + trans).value));
                drAmtPresent = true;
            }
        }
//        alert('crAmtPresent:'+crAmtPresent);
//        alert('drAmtPresent:'+drAmtPresent);
    }
    if (noOfTransactions != '' && noOfTransactions != undefined && noOfTransactions != '0') {
        for (var trans = 1; trans <= noOfTransactions; trans++) {
//            alert('trans:'+trans);
            if (!crAmtPresent && !drAmtPresent) {
                alert("Please Enter An Amount!");
                document.getElementById("transAmtCr1").focus();
                return false;
            } else {
                if (document.getElementById("del" + trans).value != 'Deleted') {
                    if (document.getElementById("transAmtCr" + trans).value != '' && document.getElementById("transAmtCr" + trans).value != null && document.getElementById("transAmtCr" + trans).value != 0) {
                        if (validateSelectField(document.getElementById("transFromAcc" + trans).value, "Please select Transaction Cr Account!") == false) {
                            document.getElementById("transFromAcc" + trans).focus();
                            return false;
                        }
                    }
//                    else if (validateEmptyField(document.getElementById("transAmtCr" + trans).value, "Please enter Cr Transaction Amount!") == false ||
//                            validateNumWithDot(document.getElementById("transAmtCr" + trans).value, "Accept only numeric characters without space character!") == false) {
//                        document.getElementById("transAmtCr" + trans).focus();
//                        return false;
//                    } else 
                    if (document.getElementById("transAmtDr" + trans).value != '' && document.getElementById("transAmtDr" + trans).value != null && document.getElementById("transAmtDr" + trans).value != 0) {
                        if (validateSelectField(document.getElementById("transToAcc" + trans).value, "Please select Transaction Dr Account!") == false) {
                            document.getElementById("transToAcc" + trans).focus();
                            return false;
                        }
                    }
//                    if (validateEmptyField(document.getElementById("transAmtDr" + trans).value, "Please enter Dr Transaction Amount!") == false ||
//                            validateNumWithDot(document.getElementById("transAmtDr" + trans).value, "Accept only numeric characters without space character!") == false) {
//                        document.getElementById("transAmtDr" + trans).focus();
//                        return false;
//                    }
                }
            }
        }
    }
    return true;
}
// *****************END TO CHANGE IN FUNCTION @AUTHOR:SHRI12AUG20***************************
/***********************End of Change in function @AUTHOR: SANDY27JAN14***********************/
function add_transaction_new(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddTransactionNew;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertAddTransactionNew() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("transSubButt").style.visibility = "visible";
        document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("transSubButt").style.visibility = "hidden";
    }
}
const colors = [
    {
        font: '#990f0f',
        background: '#ffbfbf'
    },
    {
        font: '#99630f',
        background: '#d6ffbf'
    },
    {
        font: '#6f7d4e',
        background: '#fff3bf'
    },
    {
        font: '#4e7d74',
        background: '#bff0ff'
    },
    {
        font: '#594e7d',
        background: '#c8bfff'
    },
    {
        font: '#7d4e76',
        background: '#ffbff0'
    }
]
let aCollectionTags = [];
//
function getRandomColor() {
    const randomIndex = Math.floor(Math.random() * colors.length);
    return colors[randomIndex];
}
window.onload = () => {
    const tagsContainer = document.querySelector('.tags-container');
    tagsContainer.addEventListener('click', removeTag);
}
function removeTag() {
    if (event.target.classList.contains('tag-close')) {
        event.target.parentElement.remove();

        var elements = document.getElementsByClassName("tag-text");
        var result = "";

        if (elements.length > 0) {
            for (let i = 0; i < elements.length; i++) {
                var spanValue = elements[i].innerText;
                result += "#" + spanValue;
            }
        }

        document.getElementById('sttr_occasion_hashtags').value = result;

    }
}

function addTag() {
//    if (event.keyCode === 13) {
    const input = document.getElementById('select_tags').value;
    if (input == 'SelectOccasions' || input == '') {
        return;
    }
    //
    var occasionHashtags = document.getElementById('product_occasion_hashtags').value;
    var hashtags = occasionHashtags.split('#');
    //
    if (hashtags.includes(input)) {
        // Input already exists in the hashtags
        return;
    }
    //
    const tagsContainer = document.querySelector('.tags-container');
    const color = getRandomColor();
    const value = input;
    const spanElement = document.createElement('span');
    //alert(value);

    var oldvalue = document.getElementById('product_occasion_hashtags').value;
    var newvalue = document.getElementById('select_tags').value;

    var combined = oldvalue + "#".concat(newvalue);
    document.getElementById('product_occasion_hashtags').value = combined;
////////////
    let elements = document.querySelectorAll('.addhashTag');

    // Count the number of elements found
    let tagCount = elements.length;

    // Split the value by commas
//            const valuesArray = inputValue.split(',');
//var htmlTags="";
//            // Loop through the array and print each value
//            valuesArray.forEach((value, index) => {
//                htmlTags+=<p id='hashTag${tagCount}' class='ecomgobtn1 addhashTag'>${value.trim()} <i class='fa fa-close' onclick="removeHashTag('hashTag${tagCount}');updatecollecHashTag();"></i></p>;
//                tagCount++;
//            });    
//    document.getElementById('addEcomHashtag').innerHTML+=htmlTags;
//    document.getElementById('addhashTag').value='';


////////////
    document.getElementById('sttr_occasion_hashtags').value = combined;

    spanElement.innerHTML = `
        <span class="tag-text addhashTag" id="hashTag${tagCount}">${value}</span>
            <input type="hidden" id="product_occasion_hashtags{value}" name="productoccasionhashtags=${value}" value="#${value}">
        <button type="button" class="tag-close" style="cursor:pointer;" onclick="removeTag(event);updatecollecHashTag();">x</button>
          `;
    spanElement.classList.add('tag');

    tagsContainer.appendChild(spanElement);

    document.getElementById('select_tags').value = '';

//    }
}
//
function removecollectionTag() {
    if (event.target.classList.contains('tag-close')) {
        event.target.parentElement.remove();

        var elements = document.getElementsByClassName("ecomcollection");
        var result = "";

        if (elements.length > 0) {
            for (let i = 0; i < elements.length; i++) {
                var spanValue = elements[i].innerText;
                result += "#" + spanValue;
            }
        }

        document.getElementById('product_hash_tags').value = result;
        document.getElementById('sttr_product_hashtags').value = result;

    }
}


function addCollection() {
//    if (event.keyCode === 13) {
    const input = document.getElementById('select_collection').value;
    if (input == 'SelectCollections' || input == '') {
        return;
    }
    var collectionHashtags = document.getElementById('product_hash_tags').value;
    var hashtags = collectionHashtags.split('#');
    //
    if (hashtags.includes(input)) {
        //
        return;
    }
    //
    const tagsContainer = document.querySelector('.collection-container');
    const color = getRandomColor();
    const value = input;
    const spanElement = document.createElement('span');
    //alert(value);

    var oldvalue = document.getElementById('product_hash_tags').value;
    var newvalue = document.getElementById('select_collection').value;

    var combined = oldvalue + "#".concat(newvalue);

    document.getElementById('product_hash_tags').value = combined;
    let elements = document.querySelectorAll('.ecomcollection');

    // Count the number of elements found
    let tagCount = elements.length;

    spanElement.innerHTML = `
        <span class="tag-text-collection ecomcollection" id="colleTag${tagCount}">${value}</span>
            <input type="hidden" id="product_hash_tags${value}" name="producthashtags=${value}" value="#${value}">
        <button type="button" class="tag-close" style="cursor:pointer;" onclick="removecollectionTag(event);updatecollecHashTag();">x</button>
          `;
    spanElement.classList.add('tag');

    tagsContainer.appendChild(spanElement);

    document.getElementById('select_collection').value = '';

//    }
}
//
window.onload = () => {
    const tagsContainer = document.querySelector('.tags-container');
    tagsContainer.addEventListener('click', removeTag);

    const collectiontagsContainer = document.querySelector('.collection-container');
    collectiontagsContainer.addEventListener('click', removeTag);
}


// *****************START TO CHANGE IN FUNCTION @AUTHOR:SHRI12AUG20***************************
function addTransactionNew(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("transSubButt").style.visibility = "hidden";
    if (validateAddTransactionInputsNew(obj)) {

        if (noOfTransactions == '' || noOfTransactions == undefined) {
            noOfTransactions = document.getElementById("noOfTransactions").value;
        }
        var ifrm = document.getElementById('editorIframeToDoList');
        var doc = ifrm.contentDocument ? ifrm.contentDocument : ifrm.contentWindow.document;
        var formValue = doc.getElementById('txtEditor').value;
        var poststr = "DOBDay=" + encodeURIComponent(document.getElementById("DOBDay").value)
                + "&DOBMonth=" + encodeURIComponent(document.getElementById("DOBMonth").value)
                + "&DOBYear=" + encodeURIComponent(document.getElementById("DOBYear").value)
                + "&transPreVoucherNo=" + encodeURIComponent(document.getElementById("transPreVoucherNo").value)
                + "&transPostVoucherNo=" + encodeURIComponent(document.getElementById("transPostVoucherNo").value)
                + "&supplierVoucherNo=" + encodeURIComponent(document.getElementById("supplierVoucherNo").value)
                + "&transFirmId=" + encodeURIComponent(document.getElementById("transFirmId").value)
                + "&transCustId=" + encodeURIComponent(document.getElementById("user_id").value)
                + "&transSub=" + encodeURIComponent(document.getElementById("transSub").value)
                + "&transactionCategory=" + encodeURIComponent(document.getElementById("transactionCategory").value)
                + "&txtEditorContent=" + encodeURIComponent(formValue)
                + "&noOfTransactions=" + encodeURIComponent(noOfTransactions)
                + "&transAmtCrTotal=" + encodeURIComponent(document.getElementById("transAmtCrTotal").value)
                + "&transFromMainAcc=" + encodeURIComponent(document.getElementById("transFromMainAcc").value)
                + "&transToMainAcc=" + encodeURIComponent(document.getElementById("transToMainAcc").value);
        if (noOfTransactions != '' && noOfTransactions != undefined && noOfTransactions != '0') {
            for (var trans = 1; trans <= noOfTransactions; trans++) {
                if (document.getElementById("del" + trans).value != 'Deleted') {
                    poststr = poststr + "&transAmtDr" + trans + "=" + encodeURIComponent(document.getElementById("transAmtDr" + trans).value)
                            + "&transFromAcc" + trans + "=" + encodeURIComponent(document.getElementById("transFromAcc" + trans).value)
                            + "&transToAcc" + trans + "=" + encodeURIComponent(document.getElementById("transToAcc" + trans).value)
                            + "&transAmtCr" + trans + "=" + encodeURIComponent(document.getElementById("transAmtCr" + trans).value);
                }
            }
        }


        //+ "&transactionDesc=" + encodeURIComponent(document.getElementById("transactionDesc").value);comment BY @AUTHOR: SANDY02JAN14
//        alert(poststr);
        add_transaction_new('include/php/omtatrns_new' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("transSubButt").style.visibility = "visible";
    }
}
// *****************END TO CHANGE IN FUNCTION @AUTHOR:SHRI12AUG20***************************
/**************START TO ADD FUNCTION @AUTHOR:SHRI12AUG20****************************/
function updateTransactionNew(obj)
{
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("transSubButt").style.visibility = "hidden";
    if (validateAddTransactionInputsNew(obj)) {

        noOfTransactions = document.getElementById("noOfTransactions").value;
        var ifrm = document.getElementById('editorIframeToDoList');
        var doc = ifrm.contentDocument ? ifrm.contentDocument : ifrm.contentWindow.document;
        var formValue = doc.getElementById('txtEditor').value;
//        alert('txtEditor:'+formValue);
//        return false;
        var poststr = "DOBDay=" + encodeURIComponent(document.getElementById("DOBDay").value)
                + "&DOBMonth=" + encodeURIComponent(document.getElementById("DOBMonth").value)
                + "&DOBYear=" + encodeURIComponent(document.getElementById("DOBYear").value)
                + "&transPreVoucherNo=" + encodeURIComponent(document.getElementById("transPreVoucherNo").value)
                + "&transPostVoucherNo=" + encodeURIComponent(document.getElementById("transPostVoucherNo").value)
                + "&transFirmId=" + encodeURIComponent(document.getElementById("transFirmId").value)
                + "&subPanelName=" + encodeURIComponent(document.getElementById("subPanelName").value)
                + "&transSub=" + encodeURIComponent(document.getElementById("transSub").value)
                + "&transactionCategory=" + encodeURIComponent(document.getElementById("transactionCategory").value)
                + "&txtEditorContent=" + encodeURIComponent(formValue)
                + "&noOfTransactions=" + encodeURIComponent(noOfTransactions)
                + "&transAmtCrTotal=" + encodeURIComponent(document.getElementById("transAmtCrTotal").value)
                + "&transFromMainAcc=" + encodeURIComponent(document.getElementById("transFromMainAcc").value)
                + "&transToMainAcc=" + encodeURIComponent(document.getElementById("transToMainAcc").value)
                + "&transId=" + encodeURIComponent(document.getElementById("transId").value);
        if (noOfTransactions != '' && noOfTransactions != undefined && noOfTransactions != '0') {
            for (var trans = 1; trans <= noOfTransactions; trans++) {
                if (document.getElementById("del" + trans).value != 'Deleted') {
                    poststr = poststr + "&transAmtDr" + trans + "=" + encodeURIComponent(document.getElementById("transAmtDr" + trans).value)
                            + "&transFromAcc" + trans + "=" + encodeURIComponent(document.getElementById("transFromAcc" + trans).value)
                            + "&transToAcc" + trans + "=" + encodeURIComponent(document.getElementById("transToAcc" + trans).value)
                            + "&transAmtCr" + trans + "=" + encodeURIComponent(document.getElementById("transAmtCr" + trans).value)
                            + "&transId" + trans + "=" + encodeURIComponent(document.getElementById("transId" + trans).value);
                }
            }
        }

        update_transaction('include/php/omtutrns_new' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("transSubButt").style.visibility = "visible";
    }
}
/**************END TO CHANGE FUNCTION @AUTHOR:SHRI12AUG20****************************/
function showTransactionDetailsNew(transId, preVch, constField1, constField2, firmVch, postVch, panel)
{
//    alert('transId:' + transId + ' /preVch:' + preVch + ' /firmVch:' + firmVch + ' /postVch:' + postVch + "/panel:" + panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addUpdateTransactionDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("addUpdateTransactionDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'NEW_TRANS_PANEL') {
        xmlhttp.open("POST", "include/php/omtutrnd_new" + default_theme + ".php?transId=" + transId + "&preVch=" + preVch + "&firmVch=" + firmVch + "&postVch=" + postVch + "&subPanelName=" + constField1, true);
    } else {
        xmlhttp.open("POST", "include/php/omtutrnd" + default_theme + ".php?transId=" + transId + "&preVch=" + preVch + "&firmVch=" + firmVch + "&postVch=" + postVch + "&subPanelName=" + constField1, true);
    }
    xmlhttp.send();
}
//var selFirmId;
function get_firm_voucher_no_new(url, parameters) {

    loadXMLDoc2();
    xmlhttp2.onreadystatechange = alertGetFirmVoucherNoNew;
    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);
}
function alertGetFirmVoucherNoNew() {

    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("ajaxLoadNavigateTransactionList").style.visibility = "hidden";
        document.getElementById("transVoucherNoDiv").innerHTML = xmlhttp2.responseText;
        if (newNextFieldId != '' && newNextFieldId != null && newNextFieldId != 'undefined') {
            document.getElementById(newNextFieldId).focus();
        } else {
            document.getElementById('transPreVoucherNo').focus(); //@AUTHOR: SANDY10JAN14
        }
        //getTransactionAccountsByFrmId(selFirmId);COMMENT BY @AUTHOR: SANDY02JAN14
    } else {
        document.getElementById("ajaxLoadNavigateTransactionList").style.visibility = "visible";
    }
}
function getFirmVoucherNoNew(selectedFirmNo, panel, month, year) {
//    selFirmId = selectedFirmNo;
//newNextFieldId = nextFieldId;
    var poststr = "firmNo=" + encodeURIComponent(selectedFirmNo) +
            "&panel=" + encodeURIComponent(panel) +
            "&selectedMonth=" + encodeURIComponent(month) +
            "&selectedYear=" + encodeURIComponent(year);
    get_firm_voucher_no_new('include/php/omtatrvn' + default_theme + '.php', poststr);
}
var selFirmId;
var transPanel;
var fieldId;
function get_firm_voucher_no_by_financial_year(url, parameters) {

    loadXMLDoc2();

    xmlhttp2.onreadystatechange = alertGetFirmVoucherNoByFinancialYear;

    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);

}
function alertGetFirmVoucherNoByFinancialYear() {
//alert("Hi");
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("ajaxLoadNavigateTransactionList").style.visibility = "hidden";
//        alert(xmlhttp2.responseText);
        document.getElementById("transVoucherNoDiv").innerHTML = xmlhttp2.responseText;
        if (fieldId != '' && fieldId != null)
            document.getElementById(fieldId).focus();
        //getTransactionAccountsByFrmId(selFirmId);COMMENT BY @AUTHOR: SANDY02JAN14
    } else {
        document.getElementById("ajaxLoadNavigateTransactionList").style.visibility = "visible";
    }
}
function getFirmVoucherNoByFinancialYear(selectedFirmNo, panel, currentFieldId, selMonth, selYear) {
    selFirmId = selectedFirmNo;
    transPanel = panel;
    fieldId = currentFieldId;
    var poststr = "firmNo=" + encodeURIComponent(selectedFirmNo) +
            "&panel=" + encodeURIComponent(panel) +
            "&selectedMonth=" + encodeURIComponent(selMonth) +
            "&selectedYear=" + encodeURIComponent(selYear);

    get_firm_voucher_no_by_financial_year('include/php/omtatrvn' + default_theme + '.php', poststr);

}
//
function sendStockTransferDetails() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockTransferDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omstocktransferpopup" + default_theme + ".php?firmId=" + firmId + "&gstr3bFromYY=" + formYYYY +
            "&gstr3bFromMM=" + fromMM + "&gstr3bFromDD=" + fromDD + "&gstr3bToYY=" + toYYYY + "&gstr3bToMM=" + toMM + "&gstr3bToDD=" + toDD, true);
    xmlhttp.send();
}
//
function getInsuranceApiWindow(merchantId, invoiceNo, invoiceDate, insuredName, insuredMobile, insuredEmail, insuredAdd, typeOfBase, weights, coverageValue, premium, premiumShow, itemDesc, slPrIdStr) {
    confirm_box = confirm("Do you really want to create insurance?");
    if (confirm_box == true) {
//        var roundOffAmt;
//        alert('coverageValue:'+coverageValue);
//        if (roundOff(coverageValue) > 0) {
//            roundOffAmt = roundOff(coverageValue);
//            var rndOffAmt = (1 - roundOffAmt);
//        }

//        alert('coverageValue:'+coverageValue);
        if (validateEmptyField(merchantId, "Merchant Id Should Not Be Empty!") == false) {
            return false;
        } else if (validateEmptyField(invoiceNo, "Invoice Number Should Not Be Empty!") == false) {
            return false;
        } else if (validateEmptyField(invoiceDate, "Please set Invoice Date!") == false) {
            return false;
        } else if (validateEmptyField(insuredName, "Customer Name Should Not Be Empty!") == false) {
            return false;
        } else if (validateEmptyField(insuredMobile, "Customer Mobile Number Should Not Be Empty!") == false) {
            return false;
        } else if (validateEmptyField(insuredEmail, "Email Id Should Not Be Empty!") == false) {
            return false;
        } else if (validateEmptyField(insuredAdd, "Customer Address Should Not Be Empty!") == false) {
            return false;
        } else if (validateEmptyField(coverageValue, "Coverage Value Should Not Be Empty!") == false) {
            return false;
        } else if (validateEmptyField(premium, "Please Set Insurance Premium!") == false) {
            return false;
        } else {
            coverageValue = Math_round(coverageValue);
            var poststr = "merchantId=" + encodeURIComponent(merchantId) +
                    "&invoiceNo=" + encodeURIComponent(invoiceNo) +
                    "&invoiceDate=" + encodeURIComponent(invoiceDate) +
                    "&insuredName=" + encodeURIComponent(insuredName) +
                    "&insuredMobile=" + encodeURIComponent(insuredMobile) +
                    "&insuredEmail=" + encodeURIComponent(insuredEmail) +
                    "&insuredAdd=" + encodeURIComponent(insuredAdd) +
                    "&typeOfBase=" + encodeURIComponent(typeOfBase) +
                    "&weights=" + encodeURIComponent(weights) +
                    "&coverageValue=" + encodeURIComponent(coverageValue) +
                    "&premium=" + encodeURIComponent(premium) +
                    "&premiumShow=" + encodeURIComponent(premiumShow) +
                    "&itemDesc=" + encodeURIComponent(itemDesc) +
                    "&slPrIdStr=" + encodeURIComponent(slPrIdStr);

            get_insurance_api_window('include/php/ominsuapi' + default_theme + '.php', poststr);
        }
    } else {
        document.getElementById("utin_pay_jew_insurance_chk").checked = false;
    }
}
function get_insurance_api_window(url, parameters) {

    loadXMLDoc2();

    xmlhttp2.onreadystatechange = alertGetInsuranceApiWindow;

    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);

}
function alertGetInsuranceApiWindow() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (xmlhttp2.responseText != 'ERROR') {
            if (xmlhttp2.responseText != '') {
                alert(xmlhttp2.responseText);
            }
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}

function getTokenIdFromOlocker(key, hashValue, preInvNo, postInvNo, userId, invoiceAmt, insuranceAmt) {
    confirm_box = confirm("Do you really want to create insurance?");
    if (confirm_box == true) {
        var poststr = "key=" + encodeURIComponent(key) +
                "&hashValue=" + encodeURIComponent(hashValue) +
                "&preInvNumber=" + encodeURIComponent(preInvNo) +
                "&postInvNumber=" + encodeURIComponent(postInvNo) +
                "&userId=" + encodeURIComponent(userId) +
                "&invoiceAmount=" + encodeURIComponent(invoiceAmt) +
                "&insuranceAmount=" + encodeURIComponent(insuranceAmt);

//    alert(poststr);

        get_token_id_from_olocker('include/php/ominsuapi' + default_theme + '.php', poststr);
    } else {
        document.getElementById("utin_pay_jew_insurance_chk").checked = false;
    }
}
function get_token_id_from_olocker(url, parameters) {

    loadXMLDoc2();

    xmlhttp2.onreadystatechange = alertGetTokenIdFromOlocker;

    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);

}
function alertGetTokenIdFromOlocker() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        if (xmlhttp2.responseText != 'ERROR') {
//        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//function setPolicyNdPdfURLInDb(policyNo, pdfURL, sttrIdStr) {
//    var poststr = "sttrIdStr=" + encodeURIComponent(sttrIdStr) +
//            "&policyNo=" + encodeURIComponent(policyNo) +
//            "&pdfURL=" + encodeURIComponent(pdfURL);
//
//
//    set_policy_nd_pdf_url_in_db('include/php/ominsuroptupd"+ default_theme +".php', poststr);
//}
//function set_policy_nd_pdf_url_in_db(url, parameters) {
//
//    loadXMLDoc2();
//
//    xmlhttp2.onreadystatechange = alertSetPolicyNdPdfURLInDb;
//
//    xmlhttp2.open('POST', url, true);
//    xmlhttp2.setRequestHeader('Content-Type',
//            'application/x-www-form-urlencoded');
//    xmlhttp2.setRequestHeader("Content-length", parameters.length);
//    xmlhttp2.setRequestHeader("Connection", "close");
//    xmlhttp2.send(parameters);
//
//}
//function alertSetPolicyNdPdfURLInDb() {
//    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//    } else {
//        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//    }
//}
//getGSTR3BByDate FUNCTION CHANGE BY : AUTHOR @DARSHANA 31 AUG 2021
function getGSTR3BByDate(firmId, formYYYY, fromMM, fromDD, toYYYY, toMM, toDD) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("gst3BDetailsSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omgstr3bsbdv" + default_theme + ".php?firmId=" + firmId + "&gstr3bFromYY=" + formYYYY +
            "&gstr3bFromMM=" + fromMM + "&gstr3bFromDD=" + fromDD + "&gstr3bToYY=" + toYYYY + "&gstr3bToMM=" + toMM + "&gstr3bToDD=" + toDD, true);
    xmlhttp.send();
}
//Start Function To Add GST Report Search  @Author:Vinod22APR2023
function getSearchGST(divId, fileName)
{
    var fromDate = '';
    var toDate = '';
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //From Date
    FromDay = document.getElementById('srchItemByDay').value;
    FromMonth = document.getElementById('srchItemByMonth').value;
    FromYear = document.getElementById('srchItemByYear').value;
    //To Date
    ToDay = document.getElementById('srchItemByToDay').value;
    ToMonth = document.getElementById('srchItemByToMonth').value;
    ToYear = document.getElementById('srchItemByToYear').value;
    fromDate = FromDay + '-' + FromMonth + '-' + FromYear;
    toDate = ToDay + '-' + ToMonth + '-' + ToYear;
    xmlhttp.open("GET", "include/php/" + fileName + default_theme + ".php?fromSrchDate=" + fromDate + "&toSrchDate=" + toDate + "&status=Yes", true);
    xmlhttp.send();
}
function getGSTR3BByFirmName(firmId, yyyy) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("gst3BDetailsSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omgstr3bsbdv" + default_theme + ".php?firmId=" + firmId + "&GSTR3BYear=" + yyyy.value, true);
    xmlhttp.send();
}
//
//
// ***************************************************************************
// START CODE TO ADD FUNCTION FOR DISCOUNT PANEL @AUTHOR-PRIYANKA-17OCT2020
// ***************************************************************************
function getDiscountPanel(panelName, discountPanelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (discountPanelName == 'productDiscountPanel') {
        xmlhttp.open("POST", "include/php/omDiscountManagement" + default_theme + ".php?panelName=" + panelName +
                "&discountPanelName=" + discountPanelName, true);
    } else {
        xmlhttp.open("POST", "include/php/omSetBillDiscount" + default_theme + ".php?panelName=" + panelName +
                "&discountPanelName=" + discountPanelName, true);
    }
    xmlhttp.send();
}
// ***************************************************************************
// END CODE TO ADD FUNCTION FOR DISCOUNT PANEL @AUTHOR-PRIYANKA-17OCT2020
// ***************************************************************************
//
// ***************************************************************************
// START CODE TO ADD FUNCTION FOR RETAIL DISCOUNT PANEL @AUTHOR-SHRIKANT 23012023
// ***************************************************************************
function getRetailDiscountPanel(panelName, discountPanelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (discountPanelName == 'productRetailDiscountPanel') {
        xmlhttp.open("POST", "include/php/omDiscountManagementRetail" + default_theme + ".php?panelName=" + panelName +
                "&discountPanelName=" + discountPanelName, true);
    } else if (discountPanelName == 'productRetailMostSellDiscountPanel') {
        xmlhttp.open("POST", "include/php/omDiscountMostLessManagementRetail" + default_theme + ".php?panelName=" + panelName +
                "&discountPanelName=" + discountPanelName, true);
    } else if (discountPanelName == 'productRetailLessSellDiscountPanel') {
        xmlhttp.open("POST", "include/php/omDiscountMostLessManagementRetail2" + default_theme + ".php?panelName=" + panelName +
                "&discountPanelName=" + discountPanelName, true);
    } else {
        xmlhttp.open("POST", "include/php/omSetBillDiscount" + default_theme + ".php?panelName=" + panelName +
                "&discountPanelName=" + discountPanelName, true);
    }
    xmlhttp.send();
}
// ***************************************************************************
// END CODE TO ADD FUNCTION FOR DISCOUNT PANEL @AUTHOR-PRIYANKA-17OCT2020
// ***************************************************************************
//
// ****************************************************************************************************
// START CODE TO ADD FUNCTION FOR ADD DISCOUNT FROM PRODUCT DISCOUNT PANEL @AUTHOR-PRIYANKA-22OCT2020
// ****************************************************************************************************
function addDiscountToStockTable(st_id, discCount, panelName, discountPanelName) {
    //
    //
    var documentRoot = document.getElementById('documentRoot').value;
    //
    //alert('discCount == ' + discCount);
    //
    var st_firm_id = document.getElementById('st_firm_id' + discCount).value;
    var st_item_category = document.getElementById('st_item_category' + discCount).value;
    var disc_product_amount = document.getElementById('disc_product_amount' + discCount).value;
    var disc_making_discount = document.getElementById('disc_making_discount' + discCount).value;
    var disc_stone_discount = document.getElementById('disc_stone_discount' + discCount).value;
    var disc_online_product = document.getElementById('disc_online_product' + discCount).value;
    var disc_product_discount = document.getElementById('disc_product_discount' + discCount).value;
    var disc_online_product_price_bounce = document.getElementById('disc_online_product_price_bounce' + discCount).value;
    var StartDateDay = document.getElementById('discountDOBDay' + discCount).value;
    var StartDateMonth = document.getElementById('discountDOBMonth' + discCount).value;
    var StartDateYear = document.getElementById('discountDOBYear' + discCount).value;
    var EndDateDay = document.getElementById('discountEDOBDay' + discCount).value;
    var EndDateMonth = document.getElementById('discountEDOBMonth' + discCount).value;
    var EndDateYear = document.getElementById('discountEDOBYear' + discCount).value;
    //
    //
    var st_old_disc_product_amount = document.getElementById('st_old_disc_product_amount' + discCount).value;
    var st_old_disc_making_discount = document.getElementById('st_old_disc_making_discount' + discCount).value;
    var st_old_disc_stone_discount = document.getElementById('st_old_disc_stone_discount' + discCount).value;
    var st_old_disc_product_discount = document.getElementById('st_old_disc_product_discount' + discCount).value;
    var st_old_online_product_disc = document.getElementById('st_old_online_product_disc' + discCount).value;
    var st_old_online_product_price_bounce = document.getElementById('st_old_online_product_price_bounce' + discCount).value;
    //
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("discountManagementMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omAddProdDiscount" + default_theme + ".php?st_id=" + st_id +
            "&panelName=" + panelName + "&discountPanelName=" + discountPanelName +
            "&documentRoot=" + documentRoot + "&discCount=" + discCount +
            "&StartDateDay=" + StartDateDay + "&StartDateMonth=" + StartDateMonth +
            "&StartDateYear=" + StartDateYear +
            "&EndDateDay=" + EndDateDay + "&EndDateMonth=" + EndDateMonth +
            "&EndDateYear=" + EndDateYear +
            "&st_firm_id=" + st_firm_id + "&st_item_category=" + st_item_category +
            "&disc_product_amount=" + disc_product_amount +
            "&disc_making_discount=" + disc_making_discount +
            "&disc_stone_discount=" + disc_stone_discount +
            "&disc_online_product=" + disc_online_product +
            "&disc_online_product_price_bounce=" + disc_online_product_price_bounce +
            "&disc_product_discount=" + disc_product_discount +
            "&st_old_disc_product_amount=" + st_old_disc_product_amount +
            "&st_old_disc_making_discount=" + st_old_disc_making_discount +
            "&st_old_disc_stone_discount=" + st_old_disc_stone_discount +
            "&st_old_online_product_disc=" + st_old_online_product_disc +
            "&st_old_online_product_price_bounce=" + st_old_online_product_price_bounce +
            "&st_old_disc_product_discount=" + st_old_disc_product_discount, true);
    //
    xmlhttp.send();
    //
}
// ****************************************************************************************************
// END CODE TO ADD FUNCTION FOR ADD DISCOUNT FROM PRODUCT DISCOUNT PANEL @AUTHOR-PRIYANKA-22OCT2020
// ****************************************************************************************************
//
//
// ****************************************************************************************************
// START CODE TO ADD FUNCTION FOR ADD RETAIL DISCOUNT FROM PRODUCT DISCOUNT PANEL @AUTHOR-PRIYANKA-22OCT2020
// ****************************************************************************************************
function addRetailDiscountToStockTable(st_id, discCount, panelName, discountPanelName) {
    //
    //
    var documentRoot = document.getElementById('documentRoot').value;
    //
    //alert('panelName == ' + panelName);
    //
    var st_firm_id = document.getElementById('st_firm_id' + discCount).value;
    var st_item_category = document.getElementById('st_item_category' + discCount).value;
    var disc_product_amount = document.getElementById('disc_product_amount' + discCount).value;
    //var disc_making_discount = document.getElementById('disc_making_discount' + discCount).value;
    //var disc_stone_discount = document.getElementById('disc_stone_discount' + discCount).value;product_commission
    var product_commission_amount = document.getElementById('product_commission_amount' + discCount).value;
    var disc_product_discount = document.getElementById('disc_product_discount' + discCount).value;
    var StartDateDay = document.getElementById('discountDOBDay' + discCount).value;
    var StartDateMonth = document.getElementById('discountDOBMonth' + discCount).value;
    var StartDateYear = document.getElementById('discountDOBYear' + discCount).value;
    var EndDateDay = document.getElementById('discountEDOBDay' + discCount).value;
    var EndDateMonth = document.getElementById('discountEDOBMonth' + discCount).value;
    var EndDateYear = document.getElementById('discountEDOBYear' + discCount).value;
    //
    //
    //var st_old_disc_product_amount = document.getElementById('st_old_disc_product_amount' + discCount).value;
    var st_old_product_commission_amount = document.getElementById('st_old_product_commission_amount' + discCount).value;
    var st_old_disc_stone_discount = document.getElementById('st_old_disc_stone_discount' + discCount).value;
    var st_old_disc_product_discount = document.getElementById('st_old_disc_product_discount' + discCount).value;
    //
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("discountManagementMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omRetailAddProdDiscount" + default_theme + ".php?st_id=" + st_id +
            "&panelName=" + panelName + "&discountPanelName=" + discountPanelName +
            "&documentRoot=" + documentRoot + "&discCount=" + discCount +
            "&StartDateDay=" + StartDateDay + "&StartDateMonth=" + StartDateMonth +
            "&StartDateYear=" + StartDateYear +
            "&EndDateDay=" + EndDateDay + "&EndDateMonth=" + EndDateMonth +
            "&EndDateYear=" + EndDateYear +
            "&st_firm_id=" + st_firm_id + "&st_item_category=" + st_item_category +
            "&disc_product_amount=" + disc_product_amount +
            "&disc_product_discount=" + disc_product_discount +
            "&product_commission_amount=" + product_commission_amount +
            "&st_old_product_commission_amount=" + st_old_product_commission_amount +
            "&st_old_disc_stone_discount=" + st_old_disc_stone_discount +
            "&st_old_disc_product_discount=" + st_old_disc_product_discount, true);
    //
    xmlhttp.send();
    //
}
// ****************************************************************************************************
// END CODE TO ADD FUNCTION FOR ADD DISCOUNT FROM PRODUCT DISCOUNT PANEL @AUTHOR-PRIYANKA-22OCT2020
// ****************************************************************************************************
//
//
// ****************************************************************************************************
// START CODE TO ADD FUNCTION FOR TO NAVIGATE TO PRODUCT DISCOUNT PANEL @AUTHOR-PRIYANKA-22OCT2020
// ****************************************************************************************************
function showDiscountPanel(panelName, msgShowDiv) {
    //
    setTimeout(function () {
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
        xmlhttp.open("POST", "include/php/omDiscountManagement" + default_theme + ".php?panelName=" + panelName + "&msgShowDiv=" + msgShowDiv, true);
        xmlhttp.send();
    }, 100);
    //
}
// ****************************************************************************************************
// END CODE TO ADD FUNCTION FOR TO NAVIGATE TO PRODUCT DISCOUNT PANEL @AUTHOR-PRIYANKA-22OCT2020
// ****************************************************************************************************
//
//
// ****************************************************************************************************
// START CODE TO ADD FUNCTION FOR TO NAVIGATE TO RETAIL PRODUCT DISCOUNT PANEL @AUTHOR-SHRIKANT-17JAN2023
// ****************************************************************************************************
function showRetailDiscountPanel(panelName, msgShowDiv) {
    //
    //alert('showRetaiDiscountPanel');
    setTimeout(function () {
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
        if (panelName == 'discountCommissionListMostLessl') {
            xmlhttp.open("POST", "include/php/omDiscountMostLessManagementRetail" + default_theme + ".php?panelName=" + panelName + "&msgShowDiv=" + msgShowDiv, true);
        } else if (panelName == 'discountCommissionListMostLessll') {
            xmlhttp.open("POST", "include/php/omDiscountMostLessManagementRetail2" + default_theme + ".php?panelName=" + panelName + "&msgShowDiv=" + msgShowDiv, true);
        } else {
            xmlhttp.open("POST", "include/php/omDiscountManagementRetail" + default_theme + ".php?panelName=" + panelName + "&msgShowDiv=" + msgShowDiv, true);
        }

        xmlhttp.send();
    }, 100);
    //
}
// ****************************************************************************************************
// END CODE TO ADD FUNCTION FOR TO NAVIGATE TO PRODUCT DISCOUNT PANEL @AUTHOR-PRIYANKA-22OCT2020
// ****************************************************************************************************
//
// ****************************************************************************************************
// START CODE TO ADD FUNCTION FOR TO NAVIGATE TO RETAIL PRODUCT DISCOUNT PANEL @AUTHOR-SHRIKANT-17JAN2023
// ****************************************************************************************************
function showRetailDiscountMostLessPanel(panelName, msgShowDiv) {
    //
    //alert('showRetaiDiscountPanel');
    setTimeout(function () {
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
        if (panelName == 'discountCommissionListMostLessl') {
            xmlhttp.open("POST", "include/php/omDiscountMostLessManagementRetail2" + default_theme + ".php?panelName=" + panelName + "&msgShowDiv=" + msgShowDiv, true);
        } else {
            xmlhttp.open("POST", "include/php/omDiscountMostLessManagementRetail" + default_theme + ".php?panelName=" + panelName + "&msgShowDiv=" + msgShowDiv, true);
        }
//        xmlhttp.open("POST", "include/php/omDiscountMostLessManagementRetail" + default_theme + ".php?panelName=" + panelName + "&msgShowDiv=" + msgShowDiv, true);
        xmlhttp.send();
    }, 100);
    //
}
// ****************************************************************************************************
// END CODE TO ADD FUNCTION FOR TO NAVIGATE TO PRODUCT DISCOUNT PANEL @AUTHOR-PRIYANKA-22OCT2020
// ****************************************************************************************************
//
//
// ****************************************************************************************************
// START CODE TO ADD FUNCTION FOR DELETE DISCOUNT ENTRIES @AUTHOR-PRIYANKA-23OCT2020
// ****************************************************************************************************
function deleteDiscountFromTable(disc_id, discCounter, panelName, discountPanelName) {
    //
    discountCountGobal--;
    //
    document.getElementById("noOfDiscount").value = discountCountGobal;
    document.getElementById("disc_status" + discCounter).value = 'Deleted';
    document.getElementById("discountRow" + discCounter).innerHTML = "";
    //
    if (disc_id != '') {
        deleteDiscountFromTableFunc(disc_id, discCounter, panelName, discountPanelName);
    }
    //
    return false;
    //
}
//
// ****************************************************************************************************
//
function deleteDiscountFromTableFunc(disc_id, discCounter, panelName, discountPanelName) {
    //
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("msgShowDiv").innerHTML = '';
            document.getElementById("DiscountHelpDiv").innerHTML = xmlhttp2.responseText;
            closeMessDiv('messDisplayDiv', 'DELETED');
        }
    };
    //
    xmlhttp2.open("POST", "omDeleteDiscount" + default_theme + ".php?disc_id=" + disc_id + "&discCounter=" + discCounter +
            "&panelName=" + panelName + "&discountPanelName=" + discountPanelName, true);
    //
    xmlhttp2.send();
    //
}
// ****************************************************************************************************
// END CODE TO ADD FUNCTION FOR DELETE DISCOUNT ENTRIES @AUTHOR-PRIYANKA-23OCT2020
// ****************************************************************************************************
// 
//
function addNewDiscountDiv(discId, discCounter, noOfDiscount, documentRootPath, panelName, discountPanelName) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addNewDiscountDiv" + discCounter).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/omSetProductDiscountAddNewDiv" + default_theme + ".php?discId=" + discId +
            "&discCounter=" + discCounter + "&noOfDiscount=" + noOfDiscount +
            "&documentRootPath=" + documentRootPath +
            "&panelName=" + panelName + "&discountPanelName=" + discountPanelName, true);
    xmlhttp.send();
    //
}
//
//
//
// *****************************************************************************************************************
// START CODE TO ADD FUNCTION FOR ADD NEW DISCOUNT ENTRIES @AUTHOR-PRIYANKA-27OCT2020
// *****************************************************************************************************************
function addNewProdDiscountDiv(discId, discCounter, documentRootPath, panelName, discountPanelName, commonPanel, stMainId, stMainCategory) {
    //
    //alert("discId == " + discId);
    //alert("discCounter == " + discCounter);
    //
    discCounter++;
    //
    discountCountGobal = discCounter;
    //
    document.getElementById("noOfDiscount").value = discCounter;
    //
    var stMainPurity = document.getElementById("main_st_metal_type").value;
    var stMainMetalType = document.getElementById("main_st_purity").value;
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addNewDiscountDiv" + discCounter).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/omSetProdDiscAddNewDiv" + default_theme + ".php?discId=" + discId +
            "&discCounter=" + discCounter +
            "&documentRootPath=" + documentRootPath +
            "&panelName=" + panelName + "&discountPanelName=" + discountPanelName +
            "&commonPanel=" + commonPanel +
            "&stMainId=" + stMainId + "&stMainCategory=" + stMainCategory +
            "&stMainPurity=" + stMainPurity + "&stMainMetalType=" + stMainMetalType, true);
    //
    xmlhttp.send();
    //
}
// ****************************************************************************************************
// END CODE TO ADD FUNCTION FOR ADD NEW DISCOUNT ENTRIES @AUTHOR-PRIYANKA-27OCT2020
// ****************************************************************************************************
//
//
// ****************************************************************************************************
// START CODE TO ADD FUNCTION FOR DELETE NEWLY ADDED DISCOUNT ENTRIES @AUTHOR-PRIYANKA-27OCT2020
// ****************************************************************************************************
function deleteAddNewDiscountFrom(disc_id, discCounter, panelName, discountPanelName) {
    //
    discountCountGobal--;
    //
    //alert("discountCountGobal == " + discountCountGobal);
    //
    document.getElementById("noOfDiscount").value = discountCountGobal;
    document.getElementById("disc_status" + discCounter).value = 'Deleted';
    document.getElementById("discount" + discCounter).innerHTML = "";
    document.getElementById("addNewDiscountDiv" + discCounter).innerHTML = "";
    //
    if (disc_id != '') {
        deleteAddNewDiscountFunc(disc_id, discCounter, panelName, discountPanelName);
    }
    //
    return false;
    //
}
//
// ****************************************************************************************************
//
function deleteAddNewDiscountFunc(disc_id, discCounter, panelName, discountPanelName) {
    //
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("DiscountHelpDiv").innerHTML = xmlhttp2.responseText;
            closeMessDiv('messDisplayDiv', 'DELETED');
        }
    };
    //
    xmlhttp2.open("POST", "omDeleteDiscount" + default_theme + ".php?disc_id=" + disc_id + "&discCounter=" + discCounter +
            "&panelName=" + panelName + "&discountPanelName=" + discountPanelName, true);
    //
    xmlhttp2.send();
    //
}
// ****************************************************************************************************
// END CODE TO ADD FUNCTION FOR DELETE NEWLY ADDED DISCOUNT ENTRIES @AUTHOR-PRIYANKA-27OCT2020
// ****************************************************************************************************
// 
//
function getRepairFormDivFunc(crystalCount, div, commonPanel, documentRootPath) {
    //
    if (document.getElementById("UpdateItemPanel").value == 'UpdateRepairItem' ||
            document.getElementById("UpdateItemPanel").value == 'RepairItemPayUp') {
        cryCountGobal = crystalCount;
    } else {
        cryCountGobal++;
    }
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (crystalCount == '') {
                noOfCrystal = 1;
                if (document.getElementById("noOfCry").value == '' || document.getElementById("noOfCry").value == '0') {
                    document.getElementById("noOfCry").value = noOfCrystal;
                }
                document.getElementById(div).innerHTML = xmlhttp.responseText;
            } else {
                noOfCrystal = crystalCount;
                document.getElementById(div + crystalCount).innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omrpnfdv" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel, true);
    xmlhttp.send();
}
//
//
function closeRepairFormDivFunc(cryCount, panelName, stprCryId, itstCryId, sttrId, documentRootPath) {
    cryCountGobal--;
    document.getElementById("del" + cryCount).value = 'Deleted';
    document.getElementById("crystal" + cryCount).innerHTML = "";
    if (sttrId != '') {
        deleteRepairFormDivDiv(stprCryId, itstCryId, sttrId, documentRootPath);
    }
    return false;
}
//
//
function deleteRepairFormDivDiv(stprCryId, itstCryId, sttrId, documentRootPath) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("suppPurByItemSubDiv").innerHTML = xmlhttp2.responseText;
            closeMessDiv('messDisplayDiv', 'REPAIR PRODUCT DELETED');
        }
    };
    xmlhttp2.open("POST", documentRootPath + "/include/php/ogadcydl" + default_theme + ".php?itprCryId=" + stprCryId + "&itstCryId=" + itstCryId + "&sttrId=" + sttrId + "&panelName=RepairPanel", true);
    xmlhttp2.send();
}
//
//
//
//
// *****************************************************************************************************************
// START CODE TO ADD FUNCTION FOR ADD NEW BILL DISCOUNT ENTRIES @AUTHOR-PRIYANKA-28OCT2020
// *****************************************************************************************************************
function addNewBillDiscountDiv(discId, billDiscCounter, documentRootPath, panelName, discountPanelName, commonPanel) {
    //
    //alert("discId == " + discId);
    //alert("Previous Counter == " + billDiscCounter);
    //
    var disc_discount_checked = document.getElementById("disc_discount_checked" + billDiscCounter).value;
    var disc_firm_id = document.getElementById("disc_firm_id" + billDiscCounter).value;
    var disc_total_bill_amount_min = document.getElementById("disc_total_bill_amount_min" + billDiscCounter).value;
    var disc_total_bill_amount_max = document.getElementById("disc_total_bill_amount_max" + billDiscCounter).value;
    var disc_making_discount = document.getElementById("disc_making_discount" + billDiscCounter).value;
    var disc_stone_discount = document.getElementById("disc_stone_discount" + billDiscCounter).value;
    var disc_total_bill_amount_discount = document.getElementById("disc_total_bill_amount_discount" + billDiscCounter).value;
    var discountDOBDay = document.getElementById("discountDOBDay" + billDiscCounter).value;
    var discountDOBMonth = document.getElementById("discountDOBMonth" + billDiscCounter).value;
    var discountDOBYear = document.getElementById("discountDOBYear" + billDiscCounter).value;
    var discountEDOBDay = document.getElementById("discountEDOBDay" + billDiscCounter).value;
    var discountEDOBMonth = document.getElementById("discountEDOBMonth" + billDiscCounter).value;
    var discountEDOBYear = document.getElementById("discountEDOBYear" + billDiscCounter).value;
    var disc_product_check = document.getElementById("disc_product_check" + billDiscCounter).value;
    var disc_discount_check = document.getElementById("disc_discount_check" + billDiscCounter).value;
    var disc_discount_adjust = document.getElementById("disc_discount_adjust" + billDiscCounter).value;
    //
    //
    billDiscCounter++;
    //
    billDiscountCountGobal = billDiscCounter;
    //
    document.getElementById("noOfBillDiscount").value = billDiscCounter;
    //
    //alert("New Counter == " + billDiscCounter);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addNewBillDiscountDiv" + billDiscCounter).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/omSetBillDiscountAddNewDiv" + default_theme + ".php?discId=" + discId +
            "&billDiscCounter=" + billDiscCounter +
            "&documentRootPath=" + documentRootPath +
            "&panelName=" + panelName + "&discountPanelName=" + discountPanelName +
            "&commonPanel=" + commonPanel +
            "&disc_discount_checked=" + disc_discount_checked + "&disc_firm_id=" + disc_firm_id +
            "&disc_total_bill_amount_min=" + disc_total_bill_amount_min +
            "&disc_total_bill_amount_max=" + disc_total_bill_amount_max +
            "&disc_making_discount=" + disc_making_discount + "&disc_stone_discount=" + disc_stone_discount +
            "&disc_total_bill_amount_discount=" + disc_total_bill_amount_discount +
            "&discountDOBDay=" + discountDOBDay +
            "&discountDOBMonth=" + discountDOBMonth + "&discountDOBYear=" + discountDOBYear +
            "&discountEDOBDay=" + discountEDOBDay +
            "&discountEDOBMonth=" + discountEDOBMonth + "&discountEDOBYear=" + discountEDOBYear +
            "&disc_product_check=" + disc_product_check +
            "&disc_discount_check=" + disc_discount_check + "&disc_discount_adjust=" + disc_discount_adjust, true);
    //
    xmlhttp.send();
    //
}
// ****************************************************************************************************
// END CODE TO ADD FUNCTION FOR ADD NEW BILL DISCOUNT ENTRIES @AUTHOR-PRIYANKA-28OCT2020
// ****************************************************************************************************
//
//
// ****************************************************************************************************
// START CODE TO ADD FUNCTION FOR DELETE BILL DISCOUNT ENTRIES @AUTHOR-PRIYANKA-28OCT2020
// ****************************************************************************************************
function deleteBillDiscountFromTable(disc_id, billDiscCounter, panelName, discountPanelName, documentRootPath) {
    //
    billDiscountCountGobal--;
    //
    document.getElementById("noOfBillDiscount").value = billDiscountCountGobal;
    document.getElementById("disc_status" + billDiscCounter).value = 'Deleted';
    document.getElementById("billDiscountRow" + billDiscCounter).innerHTML = "";
    //
    if (disc_id != '') {
        deleteAddNewBillDiscountFunc(disc_id, billDiscCounter, panelName, discountPanelName, documentRootPath);
    }
    //
    return false;
    //
}
//
// ****************************************************************************************************
//
function deleteBillDiscount(disc_id, billDiscCounter, panelName, discountPanelName) {
    //
    billDiscountCountGobal--;
    //
    //alert("billDiscountCountGobal == " + billDiscountCountGobal);
    //
    document.getElementById("noOfBillDiscount").value = billDiscountCountGobal;
    document.getElementById("disc_status" + billDiscCounter).value = 'Deleted';
    document.getElementById("billDiscount" + billDiscCounter).innerHTML = "";
    document.getElementById("addNewBillDiscountDiv" + billDiscCounter).innerHTML = "";
    //
    return false;
    //
}
//
// ****************************************************************************************************
//
function deleteAddNewBillDiscountFunc(disc_id, billDiscCounter, panelName, discountPanelName, documentRootPath) {
    //
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("billDiscountHelpDiv").innerHTML = xmlhttp2.responseText;
            closeMessDiv('messDisplayDiv', 'DELETED');
        }
    };
    //
    xmlhttp2.open("POST", documentRootPath + "/include/php/omDeleteDiscount" + default_theme + ".php?disc_id=" + disc_id +
            "&discCounter=" + billDiscCounter +
            "&panelName=" + panelName + "&discountPanelName=" + discountPanelName, true);
    //
    xmlhttp2.send();
    //
}
// ****************************************************************************************************
// END CODE TO ADD FUNCTION FOR DELETE BILL DISCOUNT ENTRIES @AUTHOR-PRIYANKA-28OCT2020
// ****************************************************************************************************
// 
//
function setDiscountToProductCode(discId, discCounter, documentRootPath, panelName, stMainId, stMainCategory, stMainName, stMainPurity, stMainMetalType, firmName) {
    //
    //
    //alert('stMainId == ' + stMainId);
    //alert('stMainCategory == ' + stMainCategory);
    //alert('stMainName == ' + stMainName);
    //alert('stMainPurity == ' + stMainPurity);
    //alert('firmName == ' + firmName);
    //
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainDiscountDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/omSetDiscountToProductCode" + default_theme + ".php?discId=" + discId +
            "&discCounter=" + discCounter +
            "&documentRootPath=" + documentRootPath +
            "&panelName=" + panelName +
            "&stMainId=" + stMainId + "&stMainCategory=" + stMainCategory +
            "&stMainName=" + stMainName + "&stMainPurity=" + stMainPurity +
            "&stMainMetalType=" + stMainMetalType + "&firmName=" + firmName, true);
    //
    xmlhttp.send();
    //
}
//
//Start Code for RETAIL DISCOUNT PANEL @AUTHOR:SHRIKANT 18JAN2023
//
function setRetailDiscountToProductCode(discId, discCounter, documentRootPath, panelName, stMainId, stMainCategory, stMainName, stMainPurity, stMainMetalType, firmName) {
    //
    //
    //alert('stMainId == ' + stMainId);
    //alert('stMainCategory == ' + stMainCategory);
    //alert('stMainName == ' + stMainName);
    //alert('stMainPurity == ' + stMainPurity);
    //alert('firmName == ' + firmName);
    //
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainDiscountDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/omRetailSetDiscountToProductCode" + default_theme + ".php?discId=" + discId +
            "&discCounter=" + discCounter +
            "&documentRootPath=" + documentRootPath +
            "&panelName=" + panelName +
            "&stMainId=" + stMainId + "&stMainCategory=" + stMainCategory +
            "&stMainName=" + stMainName + "&stMainPurity=" + stMainPurity +
            "&stMainMetalType=" + stMainMetalType + "&firmName=" + firmName, true);
    //
    xmlhttp.send();
    //
}
//
//
function backToDiscountProductDiv(st_id, st_item_category, st_purity, st_metal_type, documentRootPath, panelName, firmName) {
    //
    //
    //alert('st_id == ' + st_id);
    //alert('st_item_category == ' + st_item_category);
    //alert('st_purity == ' + st_purity);
    //alert('documentRootPath == ' + documentRootPath);
    //alert('panelName == ' + panelName);
    //alert('firmName == ' + firmName);
    //
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainDiscountDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/omSetProductDiscount" + default_theme + ".php?st_id=" + st_id +
            "&st_item_category=" + st_item_category + "&st_purity=" + st_purity +
            "&st_metal_type=" + st_metal_type +
            "&documentRootPath=" + documentRootPath +
            "&panelName=" + panelName + "&firmName=" + firmName, true);
    //
    xmlhttp.send();
    //
}
//
//Start code for Retail discount panel @AUTHOR:SHRIKANT 18JAN2023
function backToRetailDiscountProductDiv(st_id, st_item_category, st_purity, st_metal_type, documentRootPath, panelName, firmName) {
    //
    //
    //alert('st_id == ' + st_id);
    //alert('st_item_category == ' + st_item_category);
    //alert('st_purity == ' + st_purity);
    //alert('documentRootPath == ' + documentRootPath);
    //alert('panelName == ' + panelName);
    //alert('firmName == ' + firmName);
    //
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainDiscountDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/omRetailSetProductDiscount" + default_theme + ".php?st_id=" + st_id +
            "&st_item_category=" + st_item_category + "&st_purity=" + st_purity +
            "&st_metal_type=" + st_metal_type +
            "&documentRootPath=" + documentRootPath +
            "&panelName=" + panelName + "&firmName=" + firmName, true);
    //
    xmlhttp.send();
    //
}
//
//
function calculatePriceFuncS1() {

    document.getElementById('sttr_total_cust_price').value = ((parseFloat(document.getElementById('slPrItemPieces').value) * document.getElementById('slPrItemCharges').value)).toFixed(2);
    document.getElementById('sttr_metal_amt').value = ((parseFloat(document.getElementById('slPrItemPieces').value) * document.getElementById('slPrItemCharges').value)).toFixed(2);
    document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('slPrItemPieces').value) * document.getElementById('slPrItemCharges').value)).toFixed(2);
    document.getElementById('taxByValMainAmount').value = ((parseFloat(document.getElementById('slPrItemPieces').value) * document.getElementById('slPrItemCharges').value)).toFixed(2);

    //alert('sttr_itm_disc_type == ' + document.getElementById('sttr_itm_disc_type').value);

    if (document.getElementById('sttr_itm_disc_type').value == 'AMT') {

        var metalDiscountAmt = parseFloat(document.getElementById('sttr_itm_disc_amt').value);

    } else {

        // METAL DISCOUNT IN % @PRIYANKA-26NOV2020
        var sttr_metal_discount_per = document.getElementById('sttr_metal_discount_per').value;

        // CALCULATE METAL DISCOUNT AMT @PRIYANKA-26NOV2020
        var metalDiscountAmt = Math_round(parseFloat(document.getElementById('sttr_metal_amt').value) * parseFloat(sttr_metal_discount_per) / 100).toFixed(2);

    }

    // METAL DISCOUNT AMT @PRIYANKA-26NOV2020
    document.getElementById('sttr_metal_discount_amt').value = Math_round(parseFloat(metalDiscountAmt)).toFixed(2);

    if (document.getElementById('sttr_metal_discount_amt').value == 'NaN') {
        document.getElementById('sttr_metal_discount_amt').value = 0;
    }

    if (metalDiscountAmt > 0) {
        var stockTotalVal = parseFloat(document.getElementById('sttr_metal_amt').value).toFixed(2);
        document.getElementById('sttr_valuation').value = (Math_round(parseFloat(stockTotalVal) - parseFloat(metalDiscountAmt))).toFixed(2);
        document.getElementById('taxByValMainAmount').value = (Math_round(parseFloat(stockTotalVal) - parseFloat(metalDiscountAmt))).toFixed(2);
        document.getElementById('sttr_total_cust_price').value = (Math_round(parseFloat(stockTotalVal) - parseFloat(metalDiscountAmt))).toFixed(2);
    }

    if (document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }

    // CGST IN % @PRIYANKA-26NOV2020
    if (document.getElementById('sttr_tot_price_cgst_per').value == '' || document.getElementById('sttr_tot_price_cgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_per').value = '';
    }

    // CALCULATE CGST AMT => (VAL * CGST IN %) / 100 @PRIYANKA-26NOV2020
    if (document.getElementById('sttr_tot_price_cgst_per').value != '') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
    }

    // CGST CHRG @PRIYANKA-26NOV2020
    if (document.getElementById('sttr_tot_price_cgst_chrg').value == '' || document.getElementById('sttr_tot_price_cgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = 0;
    }

    // SGST IN % @PRIYANKA-26NOV2020
    if (document.getElementById('sttr_tot_price_sgst_per').value == '' || document.getElementById('sttr_tot_price_sgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_per').value = '';
    }

    // CALCULATE SGST AMT => (VAL * SGST IN %) / 100 @PRIYANKA-26NOV2020
    if (document.getElementById('sttr_tot_price_sgst_per').value != '') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
    }

    // SGST CHRG @PRIYANKA-26NOV2020
    if (document.getElementById('sttr_tot_price_sgst_chrg').value == '' || document.getElementById('sttr_tot_price_sgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = 0;
    }

    // IGST IN % @PRIYANKA-26NOV2020
    if (document.getElementById('sttr_tot_price_igst_per').value == '' || document.getElementById('sttr_tot_price_igst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_per').value = '';
    }

    // CALCULATE IGST AMT => (VAL * IGST IN %) / 100 @PRIYANKA-26NOV2020
    if (document.getElementById('sttr_tot_price_igst_per').value != '') {
        document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
    }

    // IGST CHRG @PRIYANKA-26NOV2020
    if (document.getElementById('sttr_tot_price_igst_chrg').value == '' || document.getElementById('sttr_tot_price_igst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_chrg').value = 0;
    }

    if (document.getElementById('sttr_tax').value == '' || document.getElementById('sttr_tax').value == 'NaN' ||
            document.getElementById('sttr_tax').value == 'undefined') {
        document.getElementById('sttr_tax').value = '';
    }


    // CALCULATE TOT TAX AMT => CGST AMT + SGST AMT + IGST AMT @PRIYANKA-26NOV2020
    document.getElementById('sttr_tot_tax').value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);

    if (document.getElementById('sttr_tot_tax').value == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }

    // CALCULATE TOT TAX AMT @PRIYANKA-26NOV2020
    if (document.getElementById('sttr_tax').value > 0) {
        document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
    }

    // CALCULATE FINAL PRICE => PRICE + TOTAL TAX @PRIYANKA-26NOV2020
    if (document.getElementById('sttr_tot_tax').value != '') {
        document.getElementById('sttr_final_valuation').value = Math_round(parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
    } else {
        document.getElementById('sttr_final_valuation').value = Math_round((parseFloat(document.getElementById('sttr_valuation').value))).toFixed(2);
    }

    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }

    return false;
}
function calStockItemCustWastage(custWastageWeight) {
    var custWastgBy = 0;
    //
    if (custWastageWeight != '') {
        if (document.getElementById('sttr_cust_wastg_by').value == 'custWastgByNetWt') {
            custWastgBy = parseFloat(document.getElementById('sttr_nt_weight').value);
        } else if (document.getElementById('sttr_cust_wastg_by').value == 'custWastgByGrossWt') {
            custWastgBy = parseFloat(document.getElementById('sttr_gs_weight').value);
        } else if (document.getElementById('sttr_cust_wastg_by').value == 'custWastgByFineWt') {
            custWastgBy = parseFloat(document.getElementById('sttr_fine_weight').value);
        } else {
            custWastgBy = parseFloat(document.getElementById('sttr_gs_weight').value);
        }
        //
        if (isNaN(custWastgBy) || custWastgBy == '') {
            custWastgBy = 0;
        }
        if (isNaN(custWastageWeight)) {
            custWastageWeight = 0;
        }
        //
        //alert('custWastageWeight2 : ' + custWastageWeight);
        //
        if (custWastageWeight > 0) {
            //
            document.getElementById('sttr_cust_wastage').value = ((parseFloat(custWastageWeight) * 100) / parseFloat(custWastgBy)).toFixed(2);
            //
            if (document.getElementById('sttr_final_fine_wt_by').value == 'byGrossWtWstg' ||
                    document.getElementById('sttr_final_fine_wt_by').value == 'byNetWtWstg') {
                //
                if (document.getElementById('sttr_wastage').value == '' || document.getElementById('sttr_wastage').value == 'NaN') {
                    document.getElementById('sttr_wastage').value = 0;
                }
                //
                document.getElementById('sttr_cust_wastage').value = parseFloat(parseFloat(document.getElementById('sttr_cust_wastage').value) - parseFloat(document.getElementById('sttr_wastage').value)).toFixed(2);
                //
            }
            //
        } else {
            document.getElementById('sttr_cust_wastage_wt').value = '0'; // CUSTOMER WASTAGE WEIGHT
            document.getElementById('sttr_cust_wastage').value = '0'; // CUSTOMER WASTAGE 
        }
    }
}
//
//
function openSupplierAddStockPopUp(utransInvId) {
    document.getElementById('myModal' + utransInvId).style.display = "block";
}
//
function closeSupplierAddStockPopUp(utransInvId) {
    document.getElementById('myModal' + utransInvId).style.display = "none";
}
//
//
function showSellMetalFormB2InvDiv(srchItemPreId, srchItemPostId, custId, panelName, txtType) {
    //
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();
    var preInvNo = "";
    var postInvNo = "";
    //
    if (panelName == 'orderPickStock') {
        var str = txtType.split(';');
        preInvNo = str[0];
        postInvNo = str[1];
    }
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            if (res == 'G' || res == 'S' || res == 'O') {
                searchItemNames(itemName, metalType, divNum, keyCodeInput);
            }

            document.getElementById('slPrDOBDay').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    var returnItem = document.getElementById('srchDelItemId').value;
    //
    xmlhttp.open("POST", "include/php/omspjsdv" + default_theme + ".php?srchItemPreId=" + srchItemPreId +
            "&srchItemPostId=" + srchItemPostId + "&custId=" + custId +
            "&panelName=" + panelName + "&txtType=" + txtType, true);
    //
    xmlhttp.send();
    //
}
//
//
function searchItemByItemIdMetalFormB2(searchItemId, autoEntryValue, custId) {
    //
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    //
    var tempLen = searchItemIdLen;
    var charLen = tempLen;
    var alphaExp = /#/;
    //
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
    //
    if (document.getElementById("srchDelItemId")) {
        // ADDED CONDITION FOR RETURN ITEM CODE 
        if (document.getElementById('srchDelItemId').value != '') {
            // IT WILL SET ITEM PRE ID & POST ID IN CASE OF WINDOW ITEM RETURN 
            document.getElementById('srchdelItemPreId').value = searchItemIdCharPart;
            document.getElementById('srchdelItemPostId').value = searchItemIdNumPart;
        } else {
            // IT WILL SET ITEM PRE ID & POST ID IN CASE OF ITEM SELL/PURCHASE 
            document.getElementById('srchItemPreId').value = searchItemIdCharPart;
            document.getElementById('srchItemPostId').value = searchItemIdNumPart;
        }
    } else {

        // IT WILL SET ITEM PRE ID & POST ID IN CASE OF ITEM SELL/PURCHASE 
        document.getElementById('srchItemPreId').value = searchItemIdCharPart;
        document.getElementById('srchItemPostId').value = searchItemIdNumPart;
    }

    if (autoEntryValue == 'YES') {

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };

        if (document.getElementById("srchDelItemId")) {
            xmlhttp.open("GET", "include/php/omspjsdv" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart + "&srchItemPostId=" + searchItemIdNumPart +
                    "&custId=" + custId + "&panelName=" + 'autoEntry' + "&autoEntry=" + autoEntryValue + "&charLen=" + charLen, true);

        } else {
            xmlhttp.open("GET", "include/php/omspjsdv" + default_theme + ".php?srchItemPreId=" + searchItemIdCharPart + "&srchItemPostId=" + searchItemIdNumPart +
                    "&custId=" + custId + "&panelName=" + 'autoEntry' + "&autoEntry=" + autoEntryValue + "&charLen=" + charLen, true);
        }
        //
        xmlhttp.send();
        //
    } else {
        return false;
    }
}
//
function updateFinalPrincAmt(mainPrincAmount, girviProcessingAmountPer, girviProcessingAmount, girviChargeAmountPer, girviChargeAmount, calculationBy) {
    //
    var updatedMainPrincAmount;
    var updatedProcessingPercentage;
    var updatedChragesPercentage;
    var updatedGirvFinalMainPrincipalAmt = 0;
    var processingAmtPlusMinus = document.getElementById("processingAmountAction").value;
    var ChargesAmtPlusMinus = document.getElementById("chargesAmountAction").value;
    var processingAmountForCalculation;
    var chargesAmountForCalculation;
    var firstMonthInterest = document.getElementById("selFirstMonthIntGd").checked;
    //
    if (firstMonthInterest == true) {
        firstMonthInterestAmt = parseFloat(document.getElementById("firstMonthInterestAmt").value);
    } else {
        firstMonthInterestAmt = 0;
    }
    //
    if (document.getElementById("updatePrincipalAmount").value == '') {
        updatedMainPrincAmount = mainPrincAmount;
    } else {
        updatedMainPrincAmount = document.getElementById("updatePrincipalAmount").value;
    }
    //
    if (document.getElementById("updateProcessingAmountPer").value == '') {
        updatedProcessingPercentage = girviProcessingAmountPer;
    } else {
        updatedProcessingPercentage = document.getElementById("updateProcessingAmountPer").value;
    }
    //
    if (document.getElementById("updateProcessingAmount").value == '') {
        processingAmountForCalculation = girviProcessingAmount;
    } else {
        processingAmountForCalculation = document.getElementById("updateProcessingAmount").value;
    }
    //
    if (document.getElementById("updateChargePerAmount").value == '') {
        updatedChragesPercentage = girviChargeAmountPer;
    } else {
        updatedChragesPercentage = document.getElementById("updateChargePerAmount").value;
    }
    //
    if (document.getElementById("updateChargeAmount").value == '') {
        chargesAmountForCalculation = girviChargeAmount;
    } else {
        chargesAmountForCalculation = document.getElementById("updateChargeAmount").value;
    }
    //
    if (calculationBy == 'percentage') {
        processingAmountForCalculation = parseFloat(parseFloat(updatedProcessingPercentage) * parseFloat(updatedMainPrincAmount) / 100);
        chargesAmountForCalculation = parseFloat(parseFloat(updatedChragesPercentage) * parseFloat(updatedMainPrincAmount) / 100);
        //
        document.getElementById("girviProcessingAmountPerDiv").innerHTML = updatedProcessingPercentage;
        document.getElementById("girviChargeAmountPerDiv").innerHTML = updatedChragesPercentage;
        document.getElementById("updateProcessingAmount").value = processingAmountForCalculation;
        document.getElementById("updateChargeAmount").value = chargesAmountForCalculation;
        document.getElementById("girviProcessingAmountDiv").innerHTML = processingAmountForCalculation;
        document.getElementById("girviChargeAmountDiv").innerHTML = chargesAmountForCalculation;
    } else if (calculationBy == 'amount') {
        updatedProcessingPercentage = parseFloat(100 * parseFloat(processingAmountForCalculation) / parseFloat(updatedMainPrincAmount));
        updatedChragesPercentage = parseFloat(100 * parseFloat(chargesAmountForCalculation) / parseFloat(updatedMainPrincAmount));
        //
        document.getElementById("girviProcessingAmountDiv").innerHTML = processingAmountForCalculation;
        document.getElementById("girviChargeAmountDiv").innerHTML = chargesAmountForCalculation;
        document.getElementById("updateProcessingAmountPer").value = updatedProcessingPercentage;
        document.getElementById("updateChargePerAmount").value = updatedChragesPercentage;
        document.getElementById("girviProcessingAmountPerDiv").innerHTML = updatedProcessingPercentage;
        document.getElementById("girviChargeAmountPerDiv").innerHTML = updatedChragesPercentage;
    }
    //
    if (processingAmtPlusMinus == 'minus') {
        processingAmountForCalculation = parseFloat(processingAmountForCalculation * -1);
    }
    //
    if (ChargesAmtPlusMinus == 'minus') {
        chargesAmountForCalculation = parseFloat(chargesAmountForCalculation * -1);
    }
    //
    updatedGirvFinalMainPrincipalAmt = (parseFloat(updatedMainPrincAmount) + parseFloat(processingAmountForCalculation) + parseFloat(chargesAmountForCalculation) - parseFloat(firstMonthInterestAmt)).toFixed(2);
    if (updatedGirvFinalMainPrincipalAmt == 'NaN') {
        updatedGirvFinalMainPrincipalAmt = 0;
    }
    document.getElementById("updatedFinalPricipleAmt").value = updatedGirvFinalMainPrincipalAmt;
    document.getElementById("updatedFinalPricipleAmtDiv").innerHTML = updatedGirvFinalMainPrincipalAmt;
}

function calculateFisrtMonthInterest(principalAmount, interestType, girviType, selROIValue, custId, DOBDay, DOBMonth, DOBYear) {
    if (principalAmount == '') {
        principalAmount = 0;
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("fisrtMonthCalDiv").innerHTML = xmlhttp.responseText;
            setTimeout(function () {
                calculateFinalPrincAmt();
            }, 100);
        }
    };
    //
    xmlhttp.open("POST", "include/php/olcalfirstmint" + default_theme + ".php?principalAmount=" + principalAmount +
            "&interestType=" + interestType +
            "&girviType=" + girviType +
            "&selROIValue=" + selROIValue +
            "&custId=" + custId + "&DOBDay=" + DOBDay +
            "&DOBMonth=" + DOBMonth + "&DOBYear=" + DOBYear, true);
    xmlhttp.send();
}
//
//
//********************************************************************************************************/
// START CODE TO ASSIGN REPAIR ORDERS @PRIYANKA-02APR2021
//********************************************************************************************************/
function pendingRepairOrderAssign(sttrId, utinId, userId, repairOrderAssignUserId, RepairPanelName, transMainId) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('utinId == ' + utinId);
    //alert('userId == ' + userId);
    //alert('repairOrderAssignUserId == ' + repairOrderAssignUserId); 
    //
    confirm_box = confirm("Do you really want to Assign this Repair Order!");
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
        //
        xmlhttp.open("POST", "include/php/omRepairPendingItemList" + default_theme + ".php?sttrId=" + sttrId +
                "&utinId=" + utinId +
                "&panelName=RepairItemPendingList" + "&transMainId=" + transMainId +
                "&indicator=stock" + "&stockType=wholesale" +
                "&transactionType=RepairItem" + "&operation=insert" +
                "&formName=RepairItemPendingList" +
                "&mainPanel=ItemRepair" + "&divName=cust_middle_body" +
                "&mainUserPanel=ItemRepair" +
                "&userId=" + userId + "&repairOrderAssignUserId=" + repairOrderAssignUserId +
                "&custId=" + userId + "&RepairPanelName=" + RepairPanelName, true);
        //
        xmlhttp.send();
        //
    }
}
//********************************************************************************************************************************************/
// END CODE TO ASSIGN REPAIR ORDERS @PRIYANKA-02APR2021
//********************************************************************************************************************************************/
//
//
//********************************************************************************************************/
// START CODE TO ADD ASSIGN REPAIR ORDERS @PRIYANKA-02APR2021
//********************************************************************************************************/
function addAssignRepairOrder(sttrId, userId, NewPanelName) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('userId == ' + userId);
    //alert('NewPanelName == ' + NewPanelName); 
    //
    confirm_box = confirm("Do you really want to Add Assign Repair Order!");
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
        //
        xmlhttp.open("POST", "include/php/omrwiadv" + default_theme + ".php?sttrId=" + sttrId +
                "&userId=" + userId + "&custId=" + userId +
                "&NewPanelName=" + NewPanelName +
                "&panelName=CustSell" + "&metType=SELL" + "&type=rawMetal" +
                "&indicator=rawMetal" + "&stockType=wholesale" +
                "&transactionType=sell" + "&operation=insert" + "&formName=CustSell" +
                "&mainPanel=Customer" + "&divName=cust_middle_body" +
                "&mainUserPanel=Customer", true);
        //
        xmlhttp.send();
        //
    }
}
//********************************************************************************************************************************************/
// END CODE TO ADD ASSIGN REPAIR ORDERS @PRIYANKA-02APR2021
//********************************************************************************************************************************************/
//
//
//********************************************************************************************************/
// START CODE TO RETURN REPAIR ORDERS @PRIYANKA-21APR2021
//********************************************************************************************************/
function repairOrderReturnFunc(sttrId, utinId, userId, RepairPanelName) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('utinId == ' + utinId);
    //alert('userId == ' + userId);
    //alert('RepairPanelName == ' + RepairPanelName); 
    //
    confirm_box = confirm("Do you really want to Return this Repair Item!");
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
        //
        xmlhttp.open("POST", "include/php/omRepairReturnItemList" + default_theme + ".php?sttrId=" + sttrId + "&utinId=" + utinId +
                "&panelName=RepairReturnItemList" +
                "&indicator=stock" + "&stockType=wholesale" +
                "&transactionType=RepairItem" + "&operation=insert" + "&formName=RepairReturnItemList" +
                "&mainPanel=ItemRepair" + "&divName=cust_middle_body" + "&mainUserPanel=ItemRepair" +
                "&userId=" + userId +
                "&custId=" + userId + "&RepairPanelName=" + RepairPanelName, true);
        //
        xmlhttp.send();
        //
    }
}
//********************************************************************************************************************************************/
// END CODE TO RETURN REPAIR ORDERS @PRIYANKA-21APR2021
//********************************************************************************************************************************************/
//
function getStockItemDetailsByPreIdMetalB2(preId, suppName, mainPanel, invPanelName, utransInvId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('stockPanelSubDiv').innerHTML = xmlhttp.responseText;
            document.getElementById('sttr_item_pre_id').focus();
            calItemPrice();
        }
    };
    if (invPanelName == 'metalB2Form') {
        xmlhttp.open("POST", "include/php/omadstoc" + default_theme + ".php?preId=" + encodeURIComponent(preId) + "&suppName=" + encodeURIComponent(suppName)
                + "&stockDetPanel=preIdDetail" + "&invPanel=" + encodeURIComponent(invPanelName) + "&utransInvId=" + encodeURIComponent(utransInvId), true); //CODE CHANGE TO ENCODE URL FOR PREID,@AUTHOR:HEMA-13JUL2020
    } else {
        xmlhttp.open("POST", "include/php/omadstoc" + default_theme + ".php?preId=" + encodeURIComponent(preId) + "&suppName=" + encodeURIComponent(suppName)
                + "&stockDetPanel=preIdDetail" + "&invPanel=" + encodeURIComponent(invPanelName) + "&utransInvId=" + encodeURIComponent(utransInvId) + "&panelName=" + encodeURIComponent(mainPanel), true); //CODE CHANGE TO ENCODE URL FOR PREID,@AUTHOR:HEMA-13JUL2020
    }
    xmlhttp.send();
}
//
//
//********************************************************************************************************/
// START CODE TO ASSIGN ORDERS @PRIYANKA-05JUNE2021
//********************************************************************************************************/
function pendingOrderAssignFunc(sttrId, utinId, userId, repairOrderAssignUserId, RepairPanelName, transMainId) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('utinId == ' + utinId);
    //alert('userId == ' + userId);
    //alert('repairOrderAssignUserId == ' + repairOrderAssignUserId); 
    //
    confirm_box = confirm("Do you really want to Assign this Order!");
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
        //
        xmlhttp.open("POST", "include/php/omnopenditemlist" + default_theme + ".php?sttrId=" + sttrId + "&utinId=" + utinId +
                "&panelName=newOrderPendingList" + "&transMainId=" + transMainId +
                "&indicator=stock" + "&stockType=retail" +
                "&transactionType=newOrder" + "&operation=insert" + "&formName=newOrderPendingList" +
                "&mainPanel=Customer" + "&divName=cust_middle_body" + "&mainUserPanel=Customer" +
                "&userId=" + userId + "&repairOrderAssignUserId=" + repairOrderAssignUserId +
                "&custId=" + userId + "&RepairPanelName=" + RepairPanelName, true);
        //
        xmlhttp.send();
        //
    }
}
//
//
//********************************************************************************************************************************************/
// END CODE TO ASSIGN ORDERS @PRIYANKA-05JUNE2021
//********************************************************************************************************************************************/
//
//
//
//
function showUserRawMetalDetailsUp(rawId, panelName, userId, mainPanel, metType, transactionPanel, divName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divName).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogrwmomf" + default_theme + ".php?rwprId=" + rawId + "&metalAssignPanel=metalAssignOrderUpdatePanel" +
            "&payPanelName=RawPayUp&rawPanelName=RawPayUp&suppPanelName=addMetalByCash&userId=" + userId +
            "&mainPanel=" + mainPanel + "&metType=" + metType + "&transactionPanel=" + transactionPanel, true);
    xmlhttp.send();
}
//
//
//
//
//********************************************************************************************************/
// START CODE TO RETURN ORDERS @PRIYANKA-05JUNE2021
//********************************************************************************************************/
function returnRepairOrderAssign(sttrId, utinId, userId, returnOrderAssignUserId, ReturnPanelName) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('utinId == ' + utinId);
    //alert('userId == ' + userId);
    //alert('returnOrderAssignUserId == ' + returnOrderAssignUserId); 
    //
    confirm_box = confirm("Do you really want to Deliver this Order!");
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
        //
        xmlhttp.open("POST", "include/php/omrwwscsllt" + default_theme + ".php?sttrId=" + sttrId + "&utinId=" + utinId +
                "&panelName=SELL" + "&indicator=rawMetal" + "&type=rawMetal" +
                "&transactionType=SELL" + "&operation=insert" + "&formName=SELL" +
                "&mainPanel=Customer" + "&divName=cust_middle_body" + "&mainUserPanel=Customer" +
                "&userId=" + userId + "&returnOrderAssignUserId=" + returnOrderAssignUserId +
                "&custId=" + userId + "&ReturnPanelName=" + ReturnPanelName, true);
        //
        xmlhttp.send();
        //
    }
}
//********************************************************************************************************************************************/
// END CODE TO RETURN ORDERS @PRIYANKA-05JUNE2021
//********************************************************************************************************************************************/ 
//
//
//
//
// *********************************************************************************************************
// Start Code to Assign Received Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
// *********************************************************************************************************
function assignReceivedOrderFunc(sttrReceivedOrderId, userId, firmId, assignReceivedOrderPanelName) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalAddDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("GET", "include/php/omrwiadv" + default_theme + ".php?sttrReceivedOrderId=" + sttrReceivedOrderId +
            "&userId=" + userId + "&custId=" + userId + "&firmId=" + firmId +
            "&assignReceivedOrderPanelName=" + assignReceivedOrderPanelName +
            "&panelName=CustSell" + "&metType=SELL" + "&type=rawMetal" +
            "&indicator=rawMetal" + "&stockType=wholesale" +
            "&transactionType=sell" + "&operation=insert" +
            "&formName=CustSell" +
            "&mainPanel=Customer" + "&divName=cust_middle_body" +
            "&mainUserPanel=Customer", true);
    //
    xmlhttp.send();
    //
}
// *********************************************************************************************************
// End Code to Assign Received Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
// *********************************************************************************************************
//
//
//
//
// *********************************************************************************************************
// Start Code to Assign Main Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
// *********************************************************************************************************
function assignMainOrderFunc(sttrMainOrderId, userId, firmId, transMainId, assignMainOrderPanelName) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalAddDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("GET", "include/php/omrwiadv" + default_theme + ".php?sttrMainOrderId=" + sttrMainOrderId +
            "&userId=" + userId + "&custId=" + userId +
            "&firmId=" + firmId + "&transMainId=" + transMainId +
            "&assignMainOrderPanelName=" + assignMainOrderPanelName +
            "&panelName=CustSell" + "&metType=SELL" + "&type=rawMetal" +
            "&indicator=rawMetal" + "&stockType=wholesale" +
            "&transactionType=sell" + "&operation=insert" +
            "&formName=CustSell" +
            "&mainPanel=Customer" + "&divName=cust_middle_body" +
            "&mainUserPanel=Customer", true);
    //
    xmlhttp.send();
    //
}
// *********************************************************************************************************
// End Code to Assign Main Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
// *********************************************************************************************************
//
//
//
//
// *********************************************************************************************************
// Start Code to Unassign Main Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
// *********************************************************************************************************
function unassignMainOrderFunc(sttrMainOrderId, userId, firmId, transMainId, unassignMainOrderPanelName) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalAddDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("GET", "include/php/omrwiadv" + default_theme + ".php?sttrMainOrderId=" + sttrMainOrderId +
            "&userId=" + userId + "&custId=" + userId +
            "&firmId=" + firmId + "&transMainId=" + transMainId +
            "&unassignMainOrderPanelName=" + unassignMainOrderPanelName +
            "&panelName=CustSell" + "&metType=SELL" + "&type=rawMetal" +
            "&indicator=rawMetal" + "&stockType=wholesale" +
            "&transactionType=sell" + "&operation=insert" +
            "&formName=CustSell" +
            "&mainPanel=Customer" + "&divName=cust_middle_body" +
            "&mainUserPanel=Customer", true);
    //
    xmlhttp.send();
    //
}
// *********************************************************************************************************
// End Code to Unassign Main Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
// *********************************************************************************************************
//
//
//
//********************************************************************************************************/
// START CODE TO RETURN ORDERS ASSIGN FUNCTION @PRIYANKA-20JUNE2021
//********************************************************************************************************/
function returnOrderAssignFunc(sttrId, userId, sttrAssignPreInvoiceNo, sttrAssignInvoiceNo, ReturnOrderAssignPanelName, transMainId) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('utinId == ' + utinId);
    //alert('userId == ' + userId);
    //alert('ReturnOrderAssignPanelName == ' + ReturnOrderAssignPanelName); 
    //
    confirm_box = confirm("Do you really want to Return this Order!");
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
        //        
        xmlhttp.open("POST", "include/php/omfnordrtnadv" + default_theme + ".php?sttrMainOrderId=" + sttrId +
                "&panelName=InvoicePayment" + "&transMainId=" + transMainId +
                "&indicator=stock" + "&stockType=wholesale" + "&type=stock" +
                "&transactionType=PURBYSUPP" + "&operation=insert" + "&formName=InvoicePayment" +
                "&mainPanel=CustHome" + "&divName=cust_middle_body" + "&mainUserPanel=CustHome" +
                "&userId=" + userId + "&custId=" + userId +
                "&sttrAssignPreInvoiceNo=" + sttrAssignPreInvoiceNo +
                "&sttrAssignInvoiceNo=" + sttrAssignInvoiceNo +
                "&ReturnOrderAssignPanelName=" + ReturnOrderAssignPanelName, true);
        //
        xmlhttp.send();
        //
    }
}
//
//
//********************************************************************************************************************************************/
// END CODE TO RETURN ORDERS ASSIGN FUNCTION @PRIYANKA-20JUNE2021
//********************************************************************************************************************************************/
//
//
//
//
// *********************************************************************************************************
// Start Code to Return Main Orders From Return Order Panel @Author:PRIYANKA-20JUNE2021
// *********************************************************************************************************
function returnMainOrderFunc(sttrMainOrderId, userId, firmId, transMainId, returnMainOrderPanelName, stockType) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainNewInvoiceDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("GET", "include/php/omfnordrtnadv" + default_theme + ".php?sttrMainOrderId=" + sttrMainOrderId +
            "&transMainId=" + transMainId +
            "&userId=" + userId + "&custId=" + userId + "&firmId=" + firmId +
            "&returnMainOrderPanelName=" + returnMainOrderPanelName +
            "&panelName=InvoicePayment" +
            "&indicator=stock" + "&stockType=" + stockType + "&type=stock" +
            "&transactionType=PURBYSUPP" + "&operation=insert" + "&formName=InvoicePayment" +
            "&mainPanel=CustHome" + "&divName=cust_middle_body" + "&mainUserPanel=CustHome", true);
    //
    xmlhttp.send();
    //
}
// *********************************************************************************************************
// End Code to Return Main Orders From Return Order Panel @Author:PRIYANKA-20JUNE2021
// *********************************************************************************************************
//
//
//
//
// *******************************************************************************************************************
// Start Code to change order status RETURNED TO READY TO RETURN From Return Order Panel @Author:PRIYANKA-08SEP2021
// *******************************************************************************************************************
//
function updateReturnOrderStatusFunc(sttrMainOrderId, userId, firmId, transMainId, updateReturnMainOrderStatusPanelName, stockType) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainNewInvoiceDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("GET", "include/php/omfnordrtnadv" + default_theme + ".php?sttrMainOrderId=" + sttrMainOrderId +
            "&transMainId=" + transMainId +
            "&userId=" + userId + "&custId=" + userId + "&firmId=" + firmId +
            "&updateReturnMainOrderStatusPanelName=" + updateReturnMainOrderStatusPanelName +
            "&panelName=InvoicePayment" +
            "&indicator=stock" + "&stockType=" + stockType + "&type=stock" +
            "&transactionType=PURBYSUPP" + "&operation=insert" + "&formName=InvoicePayment" +
            "&mainPanel=CustHome" + "&divName=cust_middle_body" + "&mainUserPanel=CustHome", true);
    //
    xmlhttp.send();
    //
}
//
// *******************************************************************************************************************
// END Code to change order status RETURNED TO READY TO RETURN From Return Order Panel @Author:PRIYANKA-08SEP2021
// *******************************************************************************************************************
//
//
//
//
//********************************************************************************************************/
// START CODE TO DELIVER ORDER FUNCTION @PRIYANKA-12JULY2021
//********************************************************************************************************/
function deliverOrderFunc(sttrReturnEntryId, sttrItemPreId, sttrItemPostId, sttrReturnPreInvoiceNo, sttrReturnInvoiceNo, returnUserId, userId, orderPanelName) {
    //
    //alert('sttrReturnEntryId == ' + sttrReturnEntryId);
    //alert('sttrItemPreId == ' + sttrItemPreId);
    //alert('sttrItemPostId == ' + sttrItemPostId);
    //alert('sttrReturnPreInvoiceNo == ' + sttrReturnPreInvoiceNo); 
    //alert('sttrReturnInvoiceNo == ' + sttrReturnInvoiceNo);
    //
    confirm_box = confirm("Do you really want to Make a Bill!");
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
        //
        //
        xmlhttp.open("POST", "include/php/ogspjsdv" + default_theme + ".php?sttrReturnEntryId=" + sttrReturnEntryId +
                "&panelName=FINE_JEWELLERY_SELL" + "&operation=insert" +
                "&indicator=stock" + "&stockType=wholesale" + "&type=stock" +
                "&formName=FINE_JEWELLERY_SELL" +
                "&transactionType=sell" +
                "&divName=cust_middle_body" +
                "&orderPanelName=" + orderPanelName +
                "&userId=" + userId + "&custId=" + userId +
                "&returnUserId=" + returnUserId +
                "&sttrReturnPreInvoiceNo=" + sttrReturnPreInvoiceNo +
                "&sttrReturnInvoiceNo=" + sttrReturnInvoiceNo +
                "&sttrItemPreId=" + sttrItemPreId +
                "&sttrItemPostId=" + sttrItemPostId, true);
        //
        xmlhttp.send();
        //
    }
}
//
//
//********************************************************************************************************************************************/
// END CODE TO DELIVER ORDER FUNCTION @PRIYANKA-12JULY2021
//********************************************************************************************************************************************/
//
//
//********************************************************************************************************/
// START CODE TO MOVE TO READY ORDERS FUNCTION @PRIYANKA-23JULY2021
//********************************************************************************************************/
function moveToReadyOrderFunc(sttrOrderId, sttrOrderPreInvoiceNo, sttrOrderInvoiceNo, sttrOrderUserId, userId, readyOrderPanelName, sttrOrderTransId) {
    //
    //alert('sttrOrderId == ' + sttrOrderId);
    //alert('sttrOrderTransId == ' + sttrOrderTransId);
    //alert('sttrOrderPreInvoiceNo == ' + sttrOrderPreInvoiceNo);
    //alert('sttrOrderInvoiceNo == ' + sttrOrderInvoiceNo); 
    //alert('userId == ' + userId);
    //alert('readyOrderPanelName == ' + readyOrderPanelName);
    //
    confirm_box = confirm("Do you really want to Move this Order to Ready Orders!");
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
        //
        xmlhttp.open("POST", "include/php/omnopenditemlist" + default_theme + ".php?sttrOrderId=" + sttrOrderId +
                "&panelName=newOrderPendingList" +
                "&indicator=stock" + "&stockType=retail" +
                "&transactionType=newOrder" + "&operation=insert" + "&formName=newOrderPendingList" +
                "&mainPanel=Customer" + "&divName=cust_middle_body" + "&mainUserPanel=Customer" +
                "&userId=" + userId + "&custId=" + userId +
                "&sttrOrderPreInvoiceNo=" + sttrOrderPreInvoiceNo +
                "&sttrOrderInvoiceNo=" + sttrOrderInvoiceNo +
                "&readyOrderPanelName=" + readyOrderPanelName +
                "&sttrOrderUserId=" + sttrOrderUserId +
                "&sttrOrderTransId=" + sttrOrderTransId, true);
        //
        xmlhttp.send();
        //
    }
}
//
//
//********************************************************************************************************************************************/
// END CODE TO MOVE TO READY ORDERS FUNCTION @PRIYANKA-23JULY2021
//********************************************************************************************************************************************/
//
//
//
//
//********************************************************************************************************/
// START CODE TO RETURN ORDERS ASSIGN FUNCTION @PRIYANKA-23JULY2021
//********************************************************************************************************/
function returnOrderAssignFunction(sttrId, userId, sttrAssignPreInvoiceNo, sttrAssignInvoiceNo, ReturnOrderAssignPanelName, transMainId) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('utinId == ' + utinId);
    //alert('userId == ' + userId);
    //alert('ReturnOrderAssignPanelName == ' + ReturnOrderAssignPanelName); 
    //
    confirm_box = confirm("Do you really want to Return this Order!");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("SuppMetalItemListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("POST", "include/php/omrwwscslt" + default_theme + ".php?sttrMainOrderId=" + sttrId +
                "&panelName=SELL" + "&indicator=rawMetal" + "&type=rawMetal" +
                "&transactionType=SELL" + "&operation=insert" + "&formName=SELL" +
                "&mainPanel=Customer" + "&divName=cust_middle_body" + "&mainUserPanel=Customer" +
                "&userId=" + userId + "&custId=" + userId +
                "&sttrAssignPreInvoiceNo=" + sttrAssignPreInvoiceNo +
                "&sttrAssignInvoiceNo=" + sttrAssignInvoiceNo +
                "&ReturnOrderAssignPanelName=" + ReturnOrderAssignPanelName, true);
        //
        xmlhttp.send();
        //
    }
}
//
//
//********************************************************************************************************************************************/
// END CODE TO RETURN ORDERS ASSIGN FUNCTION @PRIYANKA-23JULY2021
//********************************************************************************************************************************************/
//
//
//********************************************************************************************************************************************/
// START CODE TO RETAIL / WHOLESALE STOCK FUNCTION @PRIYANKA-14JULY2021
//********************************************************************************************************************************************/
function showRetailWholesalePanel(stockType, mainReturnOrderId, userId, ReturnOrderPanelName, documentRootPath) {
    //
    //alert('stockType == ' + stockType);
    //alert('ReturnOrderPanelName == ' + ReturnOrderPanelName);
    //alert('documentRootPath == ' + documentRootPath);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('main_ajax_loading_div').style.visibility = "hidden";
            document.getElementById('mainAddInvoiceStockPanelFormDiv').innerHTML = xmlhttp.responseText;
            if (stockType == "retail") {
                document.getElementById("addRetailStock").setAttribute("class", "greenFont frm-btn");
                document.getElementById("addWholeStock").setAttribute("class", "grayFont frm-btn");
            } else {
                document.getElementById("addRetailStock").setAttribute("class", "grayFont frm-btn");
                document.getElementById("addWholeStock").setAttribute("class", "greenFont frm-btn");
            }
        } else {
            document.getElementById('main_ajax_loading_div').style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/omadwhordwhrtrtnst" + default_theme + ".php?stockType=" + stockType +
            "&ReturnOrderPanelName=" + ReturnOrderPanelName +
            "&mainReturnOrderId=" + mainReturnOrderId +
            "&panelName=InvoicePayment" + "&formName=InvoicePayment" +
            "&transactionType=PURBYSUPP" + "&type=stock" +
            "&divName=cust_middle_body" + "&mainUserPanel=CustHome" + "&mainPanel=CustHome" +
            "&custId=" + userId + "&userId=" + userId, true);
    //
    xmlhttp.send();
    //
}
//********************************************************************************************************************************************/
// END CODE TO RETAIL / WHOLESALE STOCK FUNCTION @PRIYANKA-14JULY2021
//********************************************************************************************************************************************/
//
//
//
//
function deleteOrderTransEntry(rwprId, rwmtdrId, mainPanel, payPanelName, pageNum, rowsPerPage, mainPanelNew, metType, userId) {
    confirm_box = confirm(deleteAlertMess + "\nDo you really want to delete this Entry?");
    if (confirm_box == true) {
        var rawDeleteConfirm = '';
        confirm_box_for_raw_metal = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Entry From Raw Metal Stock?");
        if (confirm_box_for_raw_metal == true) {
            rawDeleteConfirm = 'yes';
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (mainPanel == 'RawSellList') {
                    document.getElementById("SuppMetalItemListDiv").innerHTML = xmlhttp.responseText;
                    window.setTimeout(rawMetalFunctionCloseDiv, 1000);
                } else {
                    document.getElementById("stockPanelSellList").innerHTML = xmlhttp.responseText;
                    window.setTimeout(rawMetalFunctionCloseDiv, 1000);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("POST", "include/php/omrmdelt" + default_theme + ".php?rwprId=" + rwprId + "&rwmtdrId=" + rwmtdrId +
                "&mainPanelNew=" + mainPanelNew + "&mainPanel=" + mainPanel +
                "&payPanelName=" + payPanelName + "&pageNum=" + pageNum + "&rowsPerPage=" + rowsPerPage +
                "&rawDeleteConfirm=" + rawDeleteConfirm + "&userId=" + userId + "&metType=" + metType, true);
        //
        xmlhttp.send();
        //
    }
}
//
//
//********************************************************************************************************/
// START CODE FOR UPDATE ORDER DELIVERY STATUS FUNCTION @PRIYANKA-04AUG2021
//********************************************************************************************************/
function deliverOrderFunction(sttrOrderId, userId, orderPanelName) {
    //    
    //
    confirm_box = confirm("Do you really want to Deliver this Order!");
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
        //
        //
        xmlhttp.open("POST", "include/php/omorddelvrdlt" + default_theme + ".php?sttrOrderId=" + sttrOrderId +
                "&panelName=newOrderDeliveredList" + "&operation=insert" +
                "&indicator=stock" + "&stockType=retail" + "&type=stock" +
                "&formName=newOrderDeliveredList" +
                "&transactionType=newOrder" +
                "&divName=cust_middle_body" +
                "&mainPanel=Customer" +
                "&mainUserPanel=Customer" +
                "&orderPanelName=" + orderPanelName +
                "&userId=" + userId + "&custId=" + userId, true);
        //
        xmlhttp.send();
        //
    }
}
//********************************************************************************************************************************************/
// END CODE FOR UPDATE ORDER DELIVERY STATUS FUNCTION @PRIYANKA-04AUG2021
//********************************************************************************************************************************************/
//
//
function userAllOrderListNavFunc(sttrOrderId, userId, panelName) {
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
    //
    if (panelName == 'invDetails') {
        //
        xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?sttrOrderId=" + sttrOrderId +
                "&panelName=" + panelName + "&operation=insert" +
                "&indicator=stock" + "&stockType=retail" +
                "&transactionType=newOrder" + "&operation=insert" + "&formName=invDetails" +
                "&mainPanel=Customer" + "&divName=cust_middle_body" + "&mainUserPanel=Customer" +
                "&panelDivName=invDetails" + "&returnOrderPanelName=returnOrderPanel" +
                "&userId=" + userId + "&custId=" + userId, true);
        //
        xmlhttp.send();
        //
    } else if (panelName == 'LoanPanel') {
        //
        xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?sttrOrderId=" + sttrOrderId +
                "&panelName=" + panelName + "&operation=insert" +
                "&indicator=stock" + "&stockType=retail" +
                "&transactionType=newOrder" + "&operation=insert" + "&formName=newOrderDeliveredList" +
                "&mainPanel=Customer" + "&divName=cust_middle_body" + "&mainUserPanel=Customer" +
                "&panelDivName=ActiveGirviPanel" +
                "&userId=" + userId + "&custId=" + userId, true);
        //
        xmlhttp.send();
        //
    } else if (panelName == 'newOrderDeliveredList') {
        //
        xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?sttrOrderId=" + sttrOrderId +
                "&panelName=" + panelName + "&operation=insert" +
                "&indicator=stock" + "&stockType=retail" +
                "&transactionType=newOrder" + "&operation=insert" + "&formName=newOrderDeliveredList" +
                "&mainPanel=Customer" + "&divName=cust_middle_body" + "&mainUserPanel=Customer" +
                "&panelDivName=newOrderDeliveredList" +
                "&userId=" + userId + "&custId=" + userId, true);
        //
        xmlhttp.send();
        //
    } else {
        //
        xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?sttrOrderId=" + sttrOrderId +
                "&panelName=" + panelName + "&operation=insert" +
                "&indicator=stock" + "&stockType=retail" +
                "&transactionType=newOrder" + "&operation=insert" + "&formName=newOrderPendingList" +
                "&mainPanel=Customer" + "&divName=cust_middle_body" + "&mainUserPanel=Customer" +
                "&panelDivName=newOrderPendingList" +
                "&userId=" + userId + "&custId=" + userId, true);
        //
        xmlhttp.send();
        //
    }
    //
}
//
//
function universalOrderListFunc(orderPanelName) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("universalAssignOrderDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    if (orderPanelName == 'universalReadyOrderPanel') {
        xmlhttp.open("POST", "include/php/omUniversalReadyOrderList" + default_theme + ".php?orderPanelName=" + orderPanelName, true);
        xmlhttp.send();
    } else if (orderPanelName == 'universalDeliveredOrderPanel') {
        xmlhttp.open("POST", "include/php/omUniversalDeliveredOrderList" + default_theme + ".php?orderPanelName=" + orderPanelName, true);
        xmlhttp.send();
    } else if (orderPanelName == 'universalPendingNewOrderPanel') {
        xmlhttp.open("POST", "include/php/omUniversalPendingOrderList" + default_theme + ".php?orderPanelName=" + orderPanelName, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("POST", "include/php/omUniversalPendOrderList" + default_theme + ".php?orderPanelName=" + orderPanelName, true);
        xmlhttp.send();
    }
    //
}
//
//START CODE TO GET PRODUCT CODE AS PER PRODUCT NAME : AUTHOR @ DARSHANA 6 SEPT 2021
function getProductCodeByName(ItemCategory, ItemName, ItemMetalType) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (xmlhttp2.responseText != '' && xmlhttp2.responseText != null) {
                document.getElementById('sttr_item_pre_id').value = xmlhttp2.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp2.open("POST", "include/php/omSerchPcodByName" + default_theme + ".php?ItemCategory=" + ItemCategory + "&ItemName=" + ItemName + "&ItemMetalType=" + ItemMetalType, true);
    xmlhttp2.send();
}
// END CODE TO GET PRODUCT CODE AS PER PRODUCT NAME : AUTHOR @ DARSHANA 6 SEPT 2021
function getprodcodebycatname(itemCategory, itemName, firmId, ItemMetalType, ItemCode, showalert) {
//    alert('itemCategory==>'+itemCategory);
//    alert('itemName==>'+itemName);
//    alert('firmId==>'+firmId);
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            let result = xmlhttp2.responseText.split('|');
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (result[1] == 'YES') {
                if (result[0] != ' ') {
                    document.getElementById('sttr_item_pre_id').value = result[0];

                    document.getElementById("sttr_item_pre_id").readOnly = true;
                }

            } else {
                if (showalert != 'NO') {
                    alert('This Product Code Already Present! Try This ' + itemCategory + ' or ' + itemCategory.substring(0, 3));
                    document.getElementById("sttr_item_pre_id").readOnly = false;
                    document.getElementById('sttr_item_pre_id').value = '';
                    document.getElementById('sttr_item_pre_id').focus();
                }
                document.getElementById("sttr_item_pre_id").readOnly = false;
                document.getElementById('sttr_item_pre_id').value = '';
//                document.getElementById('sttr_item_pre_id').focus();

            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp2.open("POST", "include/php/omsearchprodcodebycatname" + default_theme + ".php?ItemCategory=" + itemCategory + "&ItemName=" + itemName + "&firmId=" + firmId + "&ItemMetalType=" + ItemMetalType + "&ItemCode=" + ItemCode.trim(), true);
    xmlhttp2.send();
}
function showImportStockPanel(panelName, documentRootPath) {
    //console.log(panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('main_ajax_loading_div').style.visibility = "hidden";
            document.getElementById('stockPanelSubDiv').innerHTML = xmlhttp.responseText;
            if (panelName == "importStockFromAddStockPanel") {
                document.getElementById("importStock").setAttribute("class", "greenFont frm-btn");
                document.getElementById("addRetailStock").setAttribute("class", "grayFont frm-btn");
                document.getElementById("addWholeStock").setAttribute("class", "grayFont frm-btn");
            }
        } else {
            document.getElementById('main_ajax_loading_div').style.visibility = "visible";
        }
    };
    if (panelName == 'importStockMapping') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omStockImportMapping" + default_theme + ".php?panelName=" + panelName, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogadstoc" + default_theme + ".php?panelName=" + panelName, true);
    }
    xmlhttp.send();
}
function getStockCrystalRawMetalDivFunc(crystalCount, div, commonPanel, documentRootPath) {

    //alert('UpdateItemPanel == ' + document.getElementById("UpdateItemPanel").value); 
    //alert('noOfCry == ' + document.getElementById("noOfCry").value);  
    //alert('crystalCount == ' + crystalCount);

    // Entry Update time, after stone weight less from GS WT @Author:PRIYANKA-14MAR19
    if (document.getElementById("rawPanelName").value == 'RawDetUpPanel' ||
            document.getElementById("rawPanelName").value == 'RawPayUp') {
        cryCountGobal = crystalCount;
    } else {
        cryCountGobal++;
    }

    //alert('cryCountGobal == ' + cryCountGobal);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (crystalCount == '') {
                noOfCrystal = 1;
                if (document.getElementById("noOfCry").value == '' || document.getElementById("noOfCry").value == '0') {
                    document.getElementById("noOfCry").value = noOfCrystal;
                }
                document.getElementById(div).innerHTML = xmlhttp.responseText;
            } else {
                noOfCrystal = crystalCount;
                document.getElementById(div + crystalCount).innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omrwwacydv" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel, true);
    xmlhttp.send();
}
// start code for raw metal issue : author @darshana 22 sept 2021
//
function showUserRawMetalIssueDetails(rawId, panelName, userId, mainPanel, metType, transactionPanel, divName) {
//    alert('panelName=' + panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divName).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omrwmetisue" + default_theme + ".php?rwprId=" + rawId + "&payPanelName=RawPayUp&rawPanelName=RawPayUp&suppPanelName=addMetalByCash&userId=" + userId + "&mainPanel=" + mainPanel + "&metType=" + metType + "&transactionPanel=" + transactionPanel, true);
    xmlhttp.send();
}
function getStockCrystalRawMetalIssueDivFunc(crystalCount, div, commonPanel, documentRootPath) {

    //alert('UpdateItemPanel == ' + document.getElementById("UpdateItemPanel").value); 
    //alert('noOfCry == ' + document.getElementById("noOfCry").value);  
    //alert('crystalCount == ' + crystalCount);

    // Entry Update time, after stone weight less from GS WT @Author:PRIYANKA-14MAR19
    if (document.getElementById("rawPanelName").value == 'RawDetUpPanel' ||
            document.getElementById("rawPanelName").value == 'RawPayUp') {
        cryCountGobal = crystalCount;
    } else {
        cryCountGobal++;
    }

    //alert('cryCountGobal == ' + cryCountGobal);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (crystalCount == '') {
                noOfCrystal = 1;
                if (document.getElementById("noOfCry").value == '' || document.getElementById("noOfCry").value == '0') {
                    document.getElementById("noOfCry").value = noOfCrystal;
                }
                document.getElementById(div).innerHTML = xmlhttp.responseText;
            } else {
                noOfCrystal = crystalCount;
                document.getElementById(div + crystalCount).innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omrwwacydv" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel, true);
    xmlhttp.send();
}
//
//
//
//START CODE FOR FINANCE PAYMENT PANEL POPUP : AUTHOR @DARSHANA 22 OCT 2021
function openFinancePopUp(emiNo, emiPaidDD, emiPaidMM, emiPaidYY, emiAmt, emiStatus, serialNo, custId, firmId, girviId,
        girviDOB, gDepId, gDepJrnlId, emiOccur, gEMIIntAmt, gEMIAmt, pageNo, intAmt, princAmt, dueDate) {

//    alert('emiNo=' + emiNo);
//    alert('emiPaidDD=' + emiPaidDD);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("financeModel").innerHTML = xmlhttp.responseText;
            document.getElementById('financeModel').style.display = "block";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var emiPaidDate = emiPaidDD + '-' + emiPaidMM + '-' + emiPaidYY;
    xmlhttp.open("POST", "include/php/omFinanPopUp" + default_theme + ".php?emiNo=" + emiNo
            + "&emiPaidDate=" + emiPaidDate
            + "&emiAmt=" + emiAmt
            + "&emiStatus=" + emiStatus
            + "&custId=" + custId
            + "&gDepId=" + gDepId
            + "&gDepJrnlId=" + gDepJrnlId
            + "&emiOccur=" + emiOccur
            + "&gEMIAmt=" + gEMIAmt
            + "&princAmt=" + princAmt
            + "&financeEndDate=" + dueDate
            + "&pageNo=" + pageNo
            + "&serialNo=" + serialNo
            + "&firmId=" + firmId
            + "&girviId=" + girviId
            + "&girviDOB=" + girviDOB
            + "&gEMIIntAmt=" + gEMIIntAmt
            + "&intAmt=" + intAmt, true);
    xmlhttp.send();
}
////END CODE FOR FINANCE PAYMENT PANEL POPUP : AUTHOR @DARSHANA 22 OCT 2021
//
//********************************************************************************************************/
// START CODE TO REASSIGN ORDER FUNCTION @PRIYANKA-28OCT2021
//********************************************************************************************************/
function allNewOrderReAssignFunc(sttrId, utinId, userId, newOrderReAssignUserId, NewOrderReAssign, transMainId) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('utinId == ' + utinId);
    //alert('userId == ' + userId);
    //alert('NewOrderReAssign == ' + NewOrderReAssign); 
    //
    confirm_box = confirm("Do you really want to Re-Assign this Order!");
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
        //
        xmlhttp.open("POST", "include/php/omNewOrderAllOrderslist" + default_theme + ".php?sttrId=" + sttrId + "&utinId=" + utinId +
                "&panelName=newOrderAllOrdersList" + "&transMainId=" + transMainId +
                "&indicator=stock" + "&stockType=retail" +
                "&transactionType=newOrder" + "&operation=insert" + "&formName=newOrderAllOrdersList" +
                "&mainPanel=Customer" + "&divName=cust_middle_body" + "&mainUserPanel=Customer" +
                "&userId=" + userId + "&newOrderReAssignUserId=" + newOrderReAssignUserId +
                "&custId=" + userId + "&NewOrderReAssign=" + NewOrderReAssign, true);
        //
        xmlhttp.send();
        //
    }
}
//********************************************************************************************************/
// END CODE TO REASSIGN ORDER FUNCTION @PRIYANKA-28OCT2021
//********************************************************************************************************/
//
//
//********************************************************************************************************/
//START CODE FOR SEARCH COUNTER NAME : AUTHOR @DARSHANA 22 FEB 2022
//********************************************************************************************************/
//
function searchAllCounterName(divNum, keyCodeInput, metalType) {
//    alert('keyCodeInput=='+ keyCodeInput);
    keyCodeForItemNames = keyCodeInput;
    divNumForItemNames = divNum;
    panelNameForItemNames = divNum;
    //document.getElementById("ajaxLoadGetItemListDiv").style.visibility = "visible";

    var poststr = "divNum=" + divNum
            + "&metalType=" + metalType
            + "&counterName=" + document.getElementById('sttr_counter_name').value;
    search_counter_names('include/php/omalcntrnm"+ default_theme +".php', poststr);
}
//
var keyCodeForItemNames;
var divNumForItemNames;
var panelNameForItemNames;

function search_counter_names(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCounterNames;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchCounterNames() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("itemCounterDiv").innerHTML = xmlhttp.responseText;
        if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
            document.getElementById('itemListDivToCounterName').focus();
            document.getElementById('itemListDivToCounterName').options[0].selected = true;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//********************************************************************************************************/
//END CODE FOR SEARCH COUNTER NAME : AUTHOR @DARSHANA 22 FEB 2022
//********************************************************************************************************/
//
//*********************************************************************************************************
//START CODE FOR DETAILS OF PURCHASE STOCK LIST WITH CATEGORY : AUTHOR @DARSHANA 7 MAR 2022
//*********************************************************************************************************
function showPurchaseStockItemDetailsDiv(itemCategory, itemName, indicator, panelName, metalType, stockType, stockPurity) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText; //change in div name @AUTHOR: SANDY25SEP13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/ompurstlistwicat" + default_theme + ".php?indicator=" + indicator + "&panelName=" + panelName
            + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName
            + "&stockType=" + stockType + "&stockPurity=" + stockPurity, true);

    xmlhttp.send();
}
//*********************************************************************************************************
//END CODE FOR DETAILS OF PURCHASE STOCK LIST WITH CATEGORY : AUTHOR @DARSHANA 7 MAR 2022
//*********************************************************************************************************
function showRetailSellReturnSellInv(srchInvNo, custId, panelName) {
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
    var searchItemIdCharPart = srchInvNo.substr(0, charLen);
    var searchItemIdNumPart = srchInvNo.substr(charLen);
    // alert('searchItemIdCharPart ==' + searchItemIdCharPart);

    //  alert('searchItemIdNumPart ==' + searchItemIdNumPart);

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omitmrtn" + default_theme + ".php?srchPreInvNo=" + searchItemIdCharPart + "&srchInvNo=" + searchItemIdNumPart + "&custId=" + custId + "&panelName=" + panelName, true);
    xmlhttp.send();
}

/***************************************************************************************************************/
// When the user clicks on the GST E-invoice button, open the modal and loads the GST Pay Form CHETAN 25 MAR 2022
/***************************************************************************************************************/
function OpenGSTPayModal(custId, sttrPreInvoiceNo, slPrInvoiceNo, slPrDate, slPrDate1, slPrInvoiceNo1, crystalPanel) {
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
    xmlhttp.open("POST", "include/php/omGSTopmod" + default_theme + ".php?custId=" + custId + "&sttrPreInvoiceNo=" + sttrPreInvoiceNo + "&slPrInvoiceNo=" + slPrInvoiceNo + "&slPrDate=" + slPrDate + "&slPrDate1=" + slPrDate1 + "&slPrInvoiceNo1=" + slPrInvoiceNo1 + "&crystalPanel=" + crystalPanel, true);
    xmlhttp.send();
}

function closeGSTPopUp() {
    document.getElementById('myModal').style.display = "none";
}

/***************************************************************************************************************/
//End Function for the colse the opened modal //
/***************************************************************************************************************/

function OpenDailyRateUpdateModal() {
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
    xmlhttp.open("POST", "include/php/omMCXRateUpdate" + default_theme + ".php", true);
    xmlhttp.send();
}
//For LED RATES 
function OpenDailyLEDRatesmodal() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalLed').style.display = "block";
            document.getElementById('myModalLed').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omledsmodeldisp" + default_theme + ".php", true);
    xmlhttp.send();
}
function closeMCXRateUpdateModal()
{
    document.getElementById('mcx-live-rate-modal').style.display = 'none';
    document.getElementById('myModal').style.display = 'none';
}
//
//FOr LED RATES
function closeLEDRatesModal()
{
    document.getElementById('myModalLed').style.display = 'none';
}
// open buy now model code rani@25may 2023
function OpenbuynowModal() {
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
    xmlhttp.open("POST", "include/php/ombuynow" + default_theme + ".php", true);
    xmlhttp.send();
}
/*--- add Document popup Rani 19/12/2023---*/
function openDocpop() {
//    alert('hi..');
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalDocpop').style.display = 'block';
            document.getElementById('myModalDocpop').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omdocpop" + default_theme + ".php", true);
    xmlhttp.send();
}
function closeddocpop() {
    var iframe = document.getElementById('myModalDocpop').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalDocpop').style.display = 'none';
}
//
function nextBtn() {
    document.getElementById('show').style.display = "block";
    document.getElementById('imgPay').style.display = "none";
}
//function closeMCXRateUpdateModal()
//{
//    document.getElementById('mcx-live-rate-modal').style.display = 'none';
//    document.getElementById('myModal').style.display = 'none';
//}
//
//
function OpenAddProdDetailsModal(documentRootPath, counter, panel, sttrId) {
    var productDesc = document.getElementById("update_sttr_product_desc").value;
    var sttr_product_hashtags = document.getElementById("update_sttr_product_hashtags").value;
    var sttr_occasion_hashtags = document.getElementById("update_sttr_occasion_hashtags").value;
    var sttr_omecom_prod_type = document.getElementById("update_sttr_omecom_prod_type").value;
    var sttr_ecomm_status = document.getElementById("update_sttr_ecomm_status").value;
    poststr = "sttr_product_desc=" + encodeURIComponent(productDesc) +
            "&sttr_product_hashtags=" + sttr_product_hashtags +
            "&sttr_occasion_hashtags=" + sttr_occasion_hashtags +
            "&sttr_omecom_prod_type=" + encodeURIComponent(sttr_omecom_prod_type) +
            "&sttr_ecomm_status=" + encodeURIComponent(sttr_ecomm_status) +
            "&sttrId=" + encodeURIComponent(sttrId) +
            "&counter=" + encodeURIComponent(counter);
    if (panel == 'RETAIL_IMITATION_B1') {
        add_new_product_desc(documentRootPath + '/include/php/omaddprodimdets.php', poststr);
    } else {
        add_new_product_desc(documentRootPath + '/include/php/omaddproddets.php', poststr);
    }
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

// Start firm help button popup @rani 14 OCT 2023 
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
function closedfirmHelp() {
    var iframe = document.getElementById('myModalfirmHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalfirmHelp').style.display = 'none';
}
/*--- add Paytm popup Rani 18/12/2023---*/
function openpaypop() {
    let transAmt = document.getElementById('slPrPayOnlinePaymentFinalAmt').value;
    let confirm_paytm_pay = confirm("Do you really want to proceed this transaction " + transAmt + " with Paytm POS?");
    if (confirm_paytm_pay == true) {
        loadXMLDoc();
        //slPrDOBDay slPrDOBMonth slPrDOBYear
        let day = document.getElementById('slPrDOBDay').value;
        let month = document.getElementById('slPrDOBMonth').value;
        let year = document.getElementById('slPrDOBYear').value;
        let preInvNo = document.getElementById('slPrPreInvoiceNo').value;
        let invNo = document.getElementById('slPrPostInvoiceNo').value;
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById('myModalPaypop').style.display = 'block';
                document.getElementById('myModalPaypop').innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omPaypop" + default_theme + ".php?transAmt=" + transAmt + "&day=" + day + "&month=" + month + "&year=" + year + "&preInvNo=" + preInvNo + "&invNo=" + invNo, true);
        xmlhttp.send();
    }
}
//
//
function closedpaypop() {
    document.getElementById('paytmSubmitBtn').style.display = 'none';
    document.getElementById('myModalPaypop').style.display = 'none';
    document.getElementById('paytmSubmitBtn').style.display = 'none';
    document.getElementById('paySubButtDiv').style.display = 'block';
//    var status = document.getElementById('resultPaytmStatus11').value;
//    if (status !='SUCCESS') {
//        document.getElementById('slPrPayOnlinePaymentAmt').value = '0.00';
//    }
    document.getElementById('add_payment').submit();
}
//
//
/*--- add Document popup Rani 19/12/2023---*/
// add help order panel button popup @akshay31OCT2023

function OpenHelporderpanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalorderHelp').style.display = 'block';
            document.getElementById('myModalorderHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omorderhelp" + default_theme + ".php", true);
    xmlhttp.send();

}
function closedorderpanel() {
    var iframe = document.getElementById('myModalorderHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalorderHelp').style.display = 'none';
}

// add help Imitation stock panel button popup @akshay31OCT2023

function OpenHelpImitationStockpanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalImitationStockHelp').style.display = 'block';
            document.getElementById('myModalImitationStockHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omimitationstockhelp" + default_theme + ".php", true);
    xmlhttp.send();

}

function closedImitationStockpanel() {
    var iframe = document.getElementById('myModalImitationStockHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalImitationStockHelp').style.display = 'none';
}

// add help fine jewellery panel button popup @akshay31OCT2023

function OpenHelpFineJewellerypanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalFineJewelleryHelp').style.display = 'block';
            document.getElementById('myModalFineJewelleryHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omfinejewelleryhelp" + default_theme + ".php", true);
    xmlhttp.send();

}
function closedFineJewellerypanel() {
    var iframe = document.getElementById('myModalFineJewelleryHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalFineJewelleryHelp').style.display = 'none';
}

// add help Expense panel button popup @akshay31OCT2023

function OpenHelpExpensepanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalExpenseHelp').style.display = 'block';
            document.getElementById('myModalExpenseHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omexpensehelp" + default_theme + ".php", true);
    xmlhttp.send();

}
function closedExpensepanel() {
    var iframe = document.getElementById('myModalExpenseHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalExpenseHelp').style.display = 'none';
}

// add help fine stock panel button popup @akshay31OCT2023

function OpenHelpFineStockpanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalFineStockHelp').style.display = 'block';
            document.getElementById('myModalFineStockHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omfinestockhelp" + default_theme + ".php", true);
    xmlhttp.send();

}
function closedFineStockpanel() {
    var iframe = document.getElementById('myModalFineStockHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalFineStockHelp').style.display = 'none';
}

// add help scheme panel button popup @akshay31OCT2023

function OpenHelpschemepanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalschemeHelp').style.display = 'block';
            document.getElementById('myModalschemeHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omschemehelp" + default_theme + ".php", true);
    xmlhttp.send();

}
function closedschemepanel() {
    var iframe = document.getElementById('myModalschemeHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalschemeHelp').style.display = 'none';
}

// add help sell panel button popup @akshay31OCT2023

function OpenHelpsellpanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalsellHelp').style.display = 'block';
            document.getElementById('myModalsellHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omsellhelp" + default_theme + ".php", true);
    xmlhttp.send();

}
function closedsellpanel() {
    var iframe = document.getElementById('myModalsellHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalsellHelp').style.display = 'none';
}

//
//
// Start firm help button popup @rani 14 OCT 2023 
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
function closedfirmHelp() {
    var iframe = document.getElementById('myModalfirmHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalfirmHelp').style.display = 'none';
}
//
// Add help order panel button popup @akshay31OCT2023
//
function OpenHelporderpanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalorderHelp').style.display = 'block';
            document.getElementById('myModalorderHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omorderhelp" + default_theme + ".php", true);
    xmlhttp.send();

}
//
//
function closedorderpanel() {
    var iframe = document.getElementById('myModalorderHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalorderHelp').style.display = 'none';
}
//
// Add help Imitation stock panel button popup @akshay31OCT2023
//
function OpenHelpImitationStockpanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalImitationStockHelp').style.display = 'block';
            document.getElementById('myModalImitationStockHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omimitationstockhelp" + default_theme + ".php", true);
    xmlhttp.send();

}
//
//
function closedImitationStockpanel() {
    var iframe = document.getElementById('myModalImitationStockHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalImitationStockHelp').style.display = 'none';
}
//
// Add help fine jewellery panel button popup @akshay31OCT2023
//
function OpenHelpFineJewellerypanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalFineJewelleryHelp').style.display = 'block';
            document.getElementById('myModalFineJewelleryHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omfinejewelleryhelp" + default_theme + ".php", true);
    xmlhttp.send();

}
//
//
function closedFineJewellerypanel() {
    var iframe = document.getElementById('myModalFineJewelleryHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalFineJewelleryHelp').style.display = 'none';
}
//
// Aadd help Expense panel button popup @akshay31OCT2023
//
function OpenHelpExpensepanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalExpenseHelp').style.display = 'block';
            document.getElementById('myModalExpenseHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omexpensehelp" + default_theme + ".php", true);
    xmlhttp.send();

}
//
//
function closedExpensepanel() {
    var iframe = document.getElementById('myModalExpenseHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalExpenseHelp').style.display = 'none';
}
//
// Add help fine stock panel button popup @akshay31OCT2023
//
function OpenHelpFineStockpanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalFineStockHelp').style.display = 'block';
            document.getElementById('myModalFineStockHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omfinestockhelp" + default_theme + ".php", true);
    xmlhttp.send();

}
//
//
function closedFineStockpanel() {
    var iframe = document.getElementById('myModalFineStockHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalFineStockHelp').style.display = 'none';
}
//
// Add help scheme panel button popup @akshay31OCT2023
//
function OpenHelpschemepanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalschemeHelp').style.display = 'block';
            document.getElementById('myModalschemeHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omschemehelp" + default_theme + ".php", true);
    xmlhttp.send();

}
//
//
function closedschemepanel() {
    var iframe = document.getElementById('myModalschemeHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalschemeHelp').style.display = 'none';
}
//
// Add help sell panel button popup @akshay31OCT2023
//
function OpenHelpsellpanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalsellHelp').style.display = 'block';
            document.getElementById('myModalsellHelp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omsellhelp" + default_theme + ".php", true);
    xmlhttp.send();

}
//
//
function closedsellpanel() {
    var iframe = document.getElementById('myModalsellHelp').querySelector('iframe');
    var videoSrc = iframe.src;
    iframe.src = videoSrc; // This will reset and stop the video.
    document.getElementById('myModalsellHelp').style.display = 'none';
}
//
//
// Adding text editor for product description in add stock by CHETAN 17MAY2023
function saveProdDetails(docroot, prod_desc, prod_hashtags, sttr_occasion_hashtags, counter, sttr_omecom_prod_type, sttr_ecomm_status, panel)
{
    //alert("in form");
    //console.log(formValue);
    if (prod_desc != "")
    {
//        if (counter !== 'undefined') {
//            document.getElementById('sttr_product_desc' + counter).value = prod_desc;
//        } else {
        document.getElementById('sttr_product_desc').value = prod_desc;
//        }
//        alert("Data Saved successfully");
        //document.getElementById('myModal').style.display = 'none';
    }
    //
    if (prod_hashtags != "")
    {
//        if (counter !== 'undefined') {
//            document.getElementById('sttr_product_hashtags' + counter).value = prod_hashtags;
//        } else {
        document.getElementById('sttr_product_hashtags').value = prod_hashtags;
//        }
//        alert("Data Saved successfully");


        //document.getElementById('myModal').style.display = 'none';
    }
    if (sttr_occasion_hashtags != "")
    {
//        if (counter !== 'undefined') {
//            document.getElementById('sttr_product_hashtags' + counter).value = prod_hashtags;
//        } else {
        document.getElementById('sttr_occasion_hashtags').value = sttr_occasion_hashtags;
//        }
//        alert("Data Saved successfully");


        //document.getElementById('myModal').style.display = 'none';
    }
    if (panel == 'RETAIL_IMITATION_B1') {
        if (sttr_omecom_prod_type != "")
        {
            document.getElementById('sttr_omecom_prod_type').value = sttr_omecom_prod_type;
        }
        //
        if (sttr_ecomm_status != "") {
            if (sttr_ecomm_status == 'YES') {
                document.getElementById('sttr_ecomm_status').checked = true;
                document.getElementById('sttr_omecom_status').value = 'YES';// Directly set the checked property
            }
        }
    }
    alert("Data Saved successfully");
    closeProdDetailsModal();
}//
function checkMCXFields()
{
    console.log("In js fun");
    var goldDifference = document.getElementById('goldDifference').value;
    var silverDifference = document.getElementById('silverDifference').value;

    if (isNaN(document.getElementById('goldDifference').value) || document.getElementById('goldDifference').value == "")
    {
        alert("This filed is not a number <br/>");
        document.getElementById("goldDifference").focus();
        return false;
    } else if (isNaN(document.getElementById('silverDifference').value) || document.getElementById('silverDifference').value == "")
    {
        alert(silverDifference + " is not a number <br/>");
        document.getElementById("silverDifference").focus();
        return false;
    }

    return true;
}


function calculateMCXGoldRate(documentRoot)
{
    var goldMCXRate = document.getElementById('mcxGoldRate').value;
    var goldDifference = document.getElementById('goldDifference').value;
    var newGoldRate = document.getElementById('newGoldRate').value;

    if (goldDifference == "" || isNaN(goldDifference))
    {
        alert("Please enter valid number");
        document.getElementById("goldDifference").focus();
        return false;
    } else
    {

        var changeImage = document.getElementById('goldRate').src;
        var oldSource = documentRoot + "/images/plus_sign.png";

        var newSource = documentRoot + "/images/minus_sign.png";

        if (changeImage == oldSource)
        {
            var resultGoldRate = parseInt(goldMCXRate) + parseInt(goldDifference);

            document.getElementById('goldRate').src = newSource;
            document.getElementById('newGoldRate').value = parseInt(resultGoldRate);

            updateMetalGoldRates();

        } else
        {
            document.getElementById('goldRate').src = oldSource;
            var resultGoldRate = parseInt(goldMCXRate) - parseInt(goldDifference);
            document.getElementById('newGoldRate').value = parseInt(resultGoldRate);

            updateMetalGoldRates();
        }

        return true;
    }

}


function calculateMCXSilverRate(documentRoot)
{
    var silverMCXRate = document.getElementById('mcxSilverRate').value;
    var silverDifference = document.getElementById('silverDifference').value;


    if (silverDifference == "" || isNaN(silverDifference))
    {
        alert("Please enter valid number");
        document.getElementById("silverDifference").focus();
        return false;
    } else
    {
        var changeImage = document.getElementById('silverRate').src;
        var oldSource = documentRoot + "/images/plus_sign.png";

        var newSource = documentRoot + "/images/minus_sign.png";

        if (changeImage == oldSource)
        {
            var resultSilverRate = parseInt(silverMCXRate) + parseInt(silverDifference);

            document.getElementById('silverRate').src = newSource;
            document.getElementById('newSilverRate').value = parseInt(resultSilverRate);
            document.getElementById('smsign').src = newSource;

            updateMetalSilverRates();


        } else
        {
            document.getElementById('silverRate').src = oldSource;
            var resultSilverRate = parseInt(silverMCXRate) - parseInt(silverDifference);
            document.getElementById('newSilverRate').value = parseInt(resultSilverRate);
            document.getElementById('smsign').src = oldSource;

            updateMetalSilverRates();
        }

        return true;
    }

}
//
// default_theme parameter is appeneded in the .php file by CHETAN 06MAY2022
//
//
//
// ***************************************************************************************************************************
// START CODE FOR STOCK TRANSFER - APPROVAL PENDING FUNCTION @Author:PRIYANKA-20JUNE2022
// ***************************************************************************************************************************
function tagApprovalPendingAddStock(sttrId, transType, mainPanelName, transPanelName, metalType, indicator, approveStatus, count, arrcount) {
    if (approveStatus == 'approveMultipleStock') {
        var confirmMsg = true;
    } else {
        var confirmMsg = confirm("Do You Really Want To Approve This Stock ?");
    }
    if (confirmMsg == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (arrcount == count) {
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogiamndv.php?panelName=AddStock" + "&panel=tagStockApprovalPendingStockList" +
                "&mainPanelName=" + mainPanelName + "&metalType=" + metalType +
                "&sttrId=" + sttrId + "&transType=" + transType + "&indicator=" + indicator +
                "&transPanelName=" + transPanelName, true);
        xmlhttp.send();
    }
}
// ***************************************************************************************************************************
// END CODE FOR STOCK TRANSFER - APPROVAL PENDING FUNCTION @Author:PRIYANKA-20JUNE2022
// ***************************************************************************************************************************
//
//START SELECT UNSELECT ALL TO SEND APPROVAL BUTTON FUNCTION @DNYANESHWARI 
function unselectSelectCheckboxes() {
    // 
    var checkboxes = document.querySelectorAll('.approval');
    var allChecked = true;
    // 
    checkboxes.forEach(function (checkbox) {
        if (!checkbox.checked) {
            allChecked = false;
        }
    });

    //
    if (allChecked) {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = false;
        });
        document.getElementById('toggleButton').innerText = 'SELECT ALL TO SEND APPROVAL';
    } else {
        // 
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = true;
        });
        document.getElementById('toggleButton').innerText = 'UNSELECT ALL TO SEND APPROVAL';
    }
}
//END SELECT UNSELECT ALL TO SEND APPROVAL BUTTON FUNCTION @DNYANESHWARI 
//START SEND TO APPROVAL BUTTON FUNCTION @DNYANESHWARI 
function approveMultiple() {
    const checkboxes = document.querySelectorAll('.approval');
    //    
    var selectedValues = [];
    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            selectedValues.push(checkbox.value);
        }
    });
    //   
    if (selectedValues.length == 0) {
        alert('Please select at least one checkbox To Send Stock To Approve.');
        return;
    }
    var confirmMsg = confirm('Do You Really Want To Approve Multiple Stock?');
    // 
    if (confirmMsg == true) {
        const checkedValues = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);
        console.log(checkedValues);
        let result = checkedValues.map(element => element.split('|'));
        var arrCount = result.length;
        //
        var count = 0;
        result.forEach(subArray => {
            count++;
            tagApprovalPendingAddStock(subArray[0], subArray[1], subArray[2], subArray[3], subArray[4], subArray[5], 'approveMultipleStock', count, arrCount);
        });
    }
}
//END SEND TO APPROVAL BUTTON FUNCTION @DNYANESHWARI 
//
// ***************************************************************************************************************************
// START CODE FOR STOCK TRANSFER - APPROVED STOCK DELETE FUNCTION @Author:PRIYANKA-20JUNE2022
// ***************************************************************************************************************************
function tagStockApprovedDel(mainPanelName, sttrId, metalType, transType, transPanelName, indicator) {
    var confirmMsg = confirm("Do You Really Want To Delete This Stock From Approved List?");
    if (confirmMsg == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogiamndv.php?panelName=AddStock" + "&panel=tagStockApprovedStockList" +
                "&mainPanelName=" + mainPanelName + "&metalType=" + metalType +
                "&sttrId=" + sttrId + "&transType=" + transType + "&indicator=" + indicator +
                "&transPanelName=" + transPanelName, true);
        xmlhttp.send();
    }
}
//
// ***************************************************************************************************************************
// END CODE FOR STOCK TRANSFER - APPROVED STOCK DELETE FUNCTION @Author:PRIYANKA-20JUNE2022
// ***************************************************************************************************************************
//
//
// ***************************************************************************************************************************
// START CODE FOR STOCK TRANSFER - STOCK RETURN FUNCTION @Author:PRIYANKA-23JUNE2022
// ***************************************************************************************************************************
function tagStockTransferReturnStock(sttrId, transType, mainPanelName, transPanelName, metalType, indicator) {
    var confirmMsg = confirm("Do You Really Want To Return This Stock?");
    if (confirmMsg == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogiamndv.php?panelName=AddStock" + "&panel=tagStockApprovalPendingStockList" +
                "&mainPanelName=" + mainPanelName + "&metalType=" + metalType +
                "&sttrId=" + sttrId + "&transType=" + transType + "&indicator=" + indicator +
                "&transPanelName=" + transPanelName, true);
        xmlhttp.send();
    }
}
// ***************************************************************************************************************************
// END CODE FOR STOCK TRANSFER - STOCK RETURN FUNCTION @Author:PRIYANKA-23JUNE2022
// ***************************************************************************************************************************
//
//
function getEwayBillDiv(documentRootPath, utin_einvoice_irn_no, requestid, gstin) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddleDiv").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", documentRootPath + "/include/php/omewaybilldiv.php?utin_einvoice_irn_no=" + utin_einvoice_irn_no + "&requestid=" + requestid + "&gstin=" + gstin, true);
    xmlhttp.send();
}

function rfidProductDetail(rfidId, rfid_gate_tag_id) {
    loadXMLDoc();
    var documentRootPath = document.getElementById("documentRootPath").value;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rfidTrackingDetail").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", documentRootPath + "/include/php/omrfiddetect.php?rfidId=" + rfidId + "&rfidgatetagid=" + rfid_gate_tag_id + "&documentRootPath=" + documentRootPath, true);
    xmlhttp.send();
}
// START ADD THIS FUN FOR STOCK TALLY USE @YUVRAJ 28102022
function getStockTransCategoryFuncNew(panel) {
    var RFIDPopup = document.getElementById('RFIDPopup').value;
    var stockType = document.getElementById('stockType').value;
    var StockTallycheckbox = document.getElementById('StockTallycheckbox').checked;
    var productCounterName = document.getElementById('productCounterName').value;
    var productCategory = document.getElementById('productCategory').value;
    var productLocation = document.getElementById('productLocation').value;
    //
    if (panel == 'OPEN STOCK') {
        var stockType = 'OPEN STOCK';
    } else if (panel == 'CLOSE STOCK') {
        var stockType = 'CLOSE STOCK';
    }
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
            if ((productCounterName != '' && productCounterName != 'NotSelected') || (productCategory != '' && productCategory != 'NotSelected') || (productLocation != '' && productLocation != 'NotSelected')) {
                document.getElementById('StockTallycheckbox').checked = true;
            }
        } else {
            //  document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (RFIDPopup == 'RFIDPopup') {
        var stockType = 'OPEN STOCK';
        xmlhttp.open("POST", "ogstallyRFIDpop" + default_theme + ".php?stockType=" + stockType
                + "&StockTallycheckbox=" + StockTallycheckbox
                + "&productCounterName=" + productCounterName
                + "&productCategory=" + productCategory
                + "&productLocation=" + productLocation, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("POST", "include/php/ogstallyRFIDNew" + default_theme + ".php?stockType=" + stockType
                + "&StockTallycheckbox=" + StockTallycheckbox
                + "&productCounterName=" + productCounterName
                + "&productCategory=" + productCategory
                + "&productLocation=" + productLocation, true);
        xmlhttp.send();
    }
}
// END ADD THIS FUN FOR STOCK TALLY USE @YUVRAJ 28102022
//
// 
//  Start New code for RFID 
//  
function searchRFIDStockTally(rfidTagsArrr, rfid_no) {
    //
    rfidTagsArr = document.getElementById('RFIDArr').value;
    newRfidTagsArr = JSON.parse(decodeURIComponent(rfidTagsArr.replace(/\+/g, '%20')));
    //alert(newRfidTagsArr);
    resRfidTagsNewArr = findAndUpdateRFIDTags(newRfidTagsArr, 'sttr_rfid_no', rfid_no, 'sttr_rfid_tally_status', 'Y');
    //
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("rfidScannedResultsDiv").innerHTML = xmlhttp.responseText;
//        } else {
//            //  document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    xmlhttp.open("POST", "include/php/omImitationStockTallyResults.php?rfidProductsArr=" + JSON.stringify({data: rfidTagsNewArr}), true);
//    xmlhttp.send();

//    fetch("include/php/omImitationStockTallyDiv.php", {
//        method: "POST", // Use POST (not GET)
//        headers: {
//            "Content-Type": "application/text"
//        },
//        body: JSON.stringify({data: resRfidTagsNewArr}) // Convert array to JSON
//    })
//            .then(response => response.json()) // Convert PHP response to JSON
//            .then(data => console.log("Response from PHP:", data)) // Show response
//            .catch(error => console.error("Error:", error));


    fetch("include/php/omImitationStockTallyDiv.php", {// Replace with your PHP file name
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(resRfidTagsNewArr) // Convert JS object to JSON string
    })
            .then(response => response.text()) // Expect HTML as response
            .then(data => {
                document.getElementById("rfidResultDiv").innerHTML = data; // Update div with received HTML
            })
            .catch(error => console.error("Error:", error));
}


function findAndUpdateRFIDTags(array, searchKey, searchValue, updateKey, newValue) {
    //
    array.forEach(item => {
        if (String(item[searchKey]).trim() === String(searchValue).trim()) {
            item[updateKey] = newValue; // Update the main array
        }
    });
    //
    return array;
}
// 
//  End New code for RFID   
//     
// START ADD THIS FUN FOR IMITATION STOCK TALLY USE
function getStockTransCatFuncImitation(panel) {
    var RFIDPopup = document.getElementById('RFIDPopup').value;
    var stockType = document.getElementById('stockType').value;
    var StockTallycheckbox = document.getElementById('StockTallycheckbox').checked;
    var productCounterName = document.getElementById('productCounterName').value;
    var productModelNo = document.getElementById('productModelNo').value;
    var productCategory = document.getElementById('productCategory').value;
    var productLocation = document.getElementById('productLocation').value;
    //
    if (panel == 'OPEN STOCK') {
        var stockType = 'OPEN STOCK';
    } else if (panel == 'CLOSE STOCK') {
        var stockType = 'CLOSE STOCK';
    }
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            // document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("imstockTallyPanelDiv").innerHTML = xmlhttp.responseText;
            if ((productCounterName != '' && productCounterName != 'NotSelected') || (productCategory != '' && productCategory != 'NotSelected') || (productLocation != '' && productLocation != 'NotSelected')) {
                document.getElementById('StockTallycheckbox').checked = true;
            }
        } else {
            //  document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (RFIDPopup == 'RFIDPopup') {
        var stockType = 'OPEN STOCK';
        xmlhttp.open("POST", "ogstallyRFIDpop" + default_theme + ".php?stockType=" + stockType
                + "&StockTallycheckbox=" + StockTallycheckbox
                + "&productModelNo=" + productModelNo
                + "&productCounterName=" + productCounterName
                + "&productCategory=" + productCategory
                + "&productLocation=" + productLocation, true);
        xmlhttp.send();
    } else {
//        alert("stockType=" + stockType
//                + "&StockTallycheckbox=" + StockTallycheckbox
//                + "&productCounterName=" + productCounterName
//                + "&productCategory=" + productCategory
//                + "&productLocation=" + productLocation);
        xmlhttp.open("POST", "include/php/ogimstallyRFIDNew" + default_theme + ".php?stockType=" + stockType
                + "&StockTallycheckbox=" + StockTallycheckbox
                + "&productCounterName=" + productCounterName
                + "&productModelNo=" + productModelNo
                + "&productCategory=" + productCategory
                + "&productLocation=" + productLocation, true);
        xmlhttp.send();
    }
}
//END ADD THIS FUN FOR IMITATION STOCK TALLY USE 
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
//************************************START CODE  FOR MULTIBAR CODE SCANNER@RENUKA SHARMA-12DEC2022*******************************************
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
function getStockTransCategoryFORMultibarcode(panel) {
    //alert(panel);
    var stockType = document.getElementById('stockType').value;
    var StockTallycheckbox = document.getElementById('StockTallycheckbox').checked;
    var productCounterName = document.getElementById('productCounterName').value;
    var productCategory = document.getElementById('productCategory').value;
    var productLocation = document.getElementById('productLocation').value;
    // 
    if (panel == 'OPEN STOCK') {
        var stockType = 'OPEN STOCK';
    } else if (panel == 'CLOSE STOCK') {
        var stockType = 'CLOSE STOCK';
    }
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
            if ((productCounterName != '' && productCounterName != 'NotSelected') || (productCategory != '' && productCategory != 'NotSelected') || (productLocation != '' && productLocation != 'NotSelected')) {
                document.getElementById('StockTallycheckbox').checked = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogstallyMutiBarcode" + default_theme + ".php?stockType=" + stockType
            + "&StockTallycheckbox=" + StockTallycheckbox
            + "&productCounterName=" + productCounterName
            + "&productCategory=" + productCategory
            + "&productLocation=" + productLocation, true);
    xmlhttp.send();
}
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//****************************************END CODE FOR MULTIBARCODE SCANNER-RENUKA SHARMA-12/DEC/2020********************************************
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
//************************************START CODE  FOR RFID REPORT CODE SCANNER@RENUKA SHARMA-19DEC2022*******************************************
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
function OpenRFIDReportModal(stockType, category) {

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
    xmlhttp.open("POST", "omRFIDpopupdiv" + default_theme + ".php?stockType=" + stockType + "&productCategory=" + category, true);
    xmlhttp.send();
}

function closeRFIDREPORTPopUp() {
    document.getElementById('myModal').style.display = "none";
}
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//****************************************END CODE FOR RFID REPORT SCANNER-RENUKA SHARMA-19/DEC/2020**************************************
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//
////*************************************************************************************************************************************
//START ICICI BANK API CODE: CODE TO CALL REGISTRATION STATUS API @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
function resgistrationStatus(documentRoot, bank, apiType)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainPaymentDiv").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", documentRoot + "/include/php/omBankUtil.php?bank=" + bank + "&apiType=" + apiType, true);
    xmlhttp.send();
}
//****************************************************************************************************************************************
//END ICICI BANK API CODE: CODE TO CALL REGISTRATION STATUS API @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
//
//
//****************************************************************************************************************************************
//START ICICI BANK API CODE: CODE TO CALL OTP CREATE API @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
function bankpayment(documentRoot, custid, bank, amount, apiType)
{
    if (document.getElementById("bank").value == "")
    {
        alert("Please Select Bank");
        document.getElementById("bank").focus();
        return false;
    } else if (document.getElementById("amount").value == "")
    {
        alert("Please Enter Amount");
        document.getElementById("amount").focus();
        return false;
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainPaymentDiv").innerHTML = xmlhttp.responseText;
            } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", documentRoot + "/include/php/omBankUtil.php?custid=" + custid + " &bank=" + bank + "&amount=" + amount + "&apiType=" + apiType, true);
        xmlhttp.send();

    }
    return true;
}
//****************************************************************************************************************************************
//END ICICI BANK API CODE: CODE TO CALL OTP CREATE API @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
//
//****************************************************************************************************************************************
//START ICICI BANK API CODE: CODE TO CALL TRANSACTION WITH OTP API @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
function bankPaymentWithtOtp(documentRoot, bank, amount, apiType, uniqueid)
{
    if (document.getElementById("credit").value == "")
    {
        alert("Please Enter Credit Account NO.");
        document.getElementById("credit").focus();
        return false;
    } else if (document.getElementById("ifsc").value == "")
    {
        alert("Please Enter IFSC Code Of Payeee's Bank.");
        document.getElementById("ifsc").focus();
        return false;
    } else if (document.getElementById("transtyp").value == "")
    {
        alert("Please Select Transaction Type.");
        document.getElementById("transtyp").focus();
        return false;
    } else if (document.getElementById("otp").value == "")
    {
        alert("Please Enter OTP.");
        document.getElementById("otp").focus();
        return false;
    } else if (document.getElementById("remark").value == "")
    {
        alert("Please Enter REMARK");
        document.getElementById("remark").focus();
        return false;
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainPaymentDiv").innerHTML = xmlhttp.responseText;
            } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", documentRoot + "/include/php/omBankPayment.php?bank=" + bank + "&amount=" + amount + "&uniqueid=" + uniqueid + "&apiType=" + apiType + "&debit="
                + (document.getElementById("debit").value) + "&credit=" + (document.getElementById("credit").value) + "&ifsc="
                + (document.getElementById("ifsc").value) + "&transtyp=" + (document.getElementById("transtyp").value) + "&otp=" + (document.getElementById("otp").value) + "&remark=" + (document.getElementById("remark").value) + "&payeename=" + (document.getElementById("payeename").value) + "&currency=" + (document.getElementById("currency").value), true);
        xmlhttp.send();

    }
    return true;
}
//****************************************************************************************************************************************
//END ICICI BANK API CODE: CODE TO CALL TRANSACTION WITH OTP API @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
//
//****************************************************************************************************************************************
//START ICICI BANK API CODE: CODE TO CALL TRANSACTION STATUS(TRANSACTION STATUS INQUIRY)API @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
function bankTransStatusInquiry(documentRoot, bank, apiType)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainPaymentDiv").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", documentRoot + "/include/php/omBankPayment.php?bank=" + bank + "&apiType=" + apiType, true);
    xmlhttp.send();
}
//****************************************************************************************************************************************
//END ICICI BANK API CODE: CODE TO CALL TRANSACTION STATUS(TRANSACTION STATUS INQUIRY)API @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
//
//****************************************************************************************************************************************
//START ICICI BANK API CODE: CODE TO FETCH ACCOUNT BALANCE @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
function balanceFetch(documentRoot, apiType)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mainDiv").style.display == 'block';
            document.getElementById("mainPaymentDiv").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", documentRoot + "/include/php/omBankUtil.php?&apiType=" + apiType, true);
    xmlhttp.send();
}
//
function balanceFetchPublic(documentRoot, bank, apiType)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.display == 'block';
            document.getElementById("mainPaymentDivPub").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", documentRoot + "/include/php/omBankUtil.php?bank=" + bank + "&apiType=" + apiType, true);
    xmlhttp.send();
}
//****************************************************************************************************************************************
//END ICICI BANK API CODE: CODE TO FETCH ACCOUNT BALANCE @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
//
//****************************************************************************************************************************************
//START ICICI BANK API CODE: CODE TO DISPLAY ACCOUNT STATEMENTS @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
function getbankstatement(documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mainDiv").innerHTML = xmlhttp.responseText;

        } else {
            //Do Nothing
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omBankBalanceFetchDiv.php", true);
    xmlhttp.send();
    //
//  document.getElementById("getbankstatement").style.display = "none";
}
function bankStatementDetails(fromDay, fromMonth, fromYear, toDay, toMonth, toYear, documentRoot, bank, apiType, format) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("getbankstatement1").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var fromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
    var toDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
//
    xmlhttp.open("GET", documentRoot + "/include/php/omBankUtil.php?bank=" + bank + "&apiType=" + apiType + "&fromDate=" + fromDate + "&toDate=" + toDate + "&format=" + format, true);
    xmlhttp.send();
}
////
function bankStatementDetailsBanklist(fromDay, fromMonth, fromYear, toDay, toMonth, toYear, documentRoot, bank, apiType, format) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.display == 'block';
            document.getElementById("getbankstatement1").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var fromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
    var toDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
    xmlhttp.open("GET", documentRoot + "/include/php/omdisplaybankstmt.php?bank=" + bank + "&apiType=" + apiType + "&fromDate=" + fromDate + "&toDate=" + toDate + "&format=" + format, true);
    xmlhttp.send();
}
//
function bankStatementDetailsCrlist(fromDay, fromMonth, fromYear, toDay, toMonth, toYear, documentRoot, bank, apiType, format) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.display == 'block';
            document.getElementById("getbankstatement1").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var fromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
    var toDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
    xmlhttp.open("GET", documentRoot + "/include/php/omdisplaybankstmtcrlist.php?bank=" + bank + "&apiType=" + apiType + "&fromDate=" + fromDate + "&toDate=" + toDate + "&format=" + format, true);
    xmlhttp.send();
}
//
//
function bankStatementDetailsDrlist(fromDay, fromMonth, fromYear, toDay, toMonth, toYear, documentRoot, bank, apiType, format) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.display == 'block';
            document.getElementById("getbankstatement1").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var fromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
    var toDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
    xmlhttp.open("GET", documentRoot + "/include/php/omdisplaybankstmtdrlist.php?bank=" + bank + "&apiType=" + apiType + "&fromDate=" + fromDate + "&toDate=" + toDate + "&format=" + format, true);
    xmlhttp.send();
}
//****************************************************************************************************************************************
//START ICICI BANK API CODE: CODE TO DISPLAY ACCOUNT STATEMENTS @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
//
//****************************************************************************************************************************************
//START ICICI BANK API CODE: CODE TO DISPLAY ACCOUNT STATEMENTS ACCORDING  DATA TABLE VIEW WITH PAGGING @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
function bankstatementpagging(documentRoot, page_no, fromdate, todate) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.display == 'block';
            document.getElementById("getbankstatement1").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", documentRoot + "/include/php/omdisplaybankstmt.php?page_no=" + page_no + "&fromDate=" + fromdate + "&toDate=" + todate, true);
    xmlhttp.send();
}
//
function bankstatementpaggingcr(documentRoot, page_no, fromdate, todate) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.display == 'block';
            document.getElementById("getbankstatement1").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", documentRoot + "/include/php/omdisplaybankstmtcrlist.php?page_no=" + page_no + "&fromDate=" + fromdate + "&toDate=" + todate, true);
    xmlhttp.send();
}
//
function bankstatementpaggingdr(documentRoot, page_no, fromdate, todate) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.display == 'block';
            document.getElementById("getbankstatement1").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", documentRoot + "/include/php/omdisplaybankstmtdrlist.php?page_no=" + page_no + "&fromDate=" + fromdate + "&toDate=" + todate, true);
    xmlhttp.send();
}
//
function displaybankstmtdatatb(fromDay, fromMonth, fromYear, toDay, toMonth, toYear, documentRoot, format) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.display == 'block';
            document.getElementById("getbankstatement1").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var fromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
    var toDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
    xmlhttp.open("GET", documentRoot + "/include/php/omdisplaybankstdatatb.php?format=" + format + "&fromDate=" + fromDate + "&toDate=" + toDate, true);
    xmlhttp.send();
}
//****************************************************************************************************************************************
//END ICICI BANK API CODE: CODE TO DISPLAY ACCOUNT STATEMENTS ACCORDING  DATA TABLE VIEW WITH PAGGING @RENUKA_SHARMA_2022
//****************************************************************************************************************************************
//
//
//
// *********************************************************************************************************
// START CODE TO ADD FUNCTION FOR QUOTATION PANEL @PRIYANKA-12NOV2022
// *********************************************************************************************************
function showEstimateInvoiceDiv(srchInvNo, custId, panelName) {
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
    var searchItemIdCharPart = srchInvNo.substr(0, charLen);
    var searchItemIdNumPart = srchInvNo.substr(charLen);
    //
    //alert('searchItemIdCharPart ==' + searchItemIdCharPart);
    //alert('searchItemIdNumPart ==' + searchItemIdNumPart);
    //
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("estimateDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omestimate" + default_theme + ".php?srchPreInvNo=" + searchItemIdCharPart + "&srchInvNo=" + searchItemIdNumPart + "&custId=" + custId + "&panelName=" + panelName, true);
    xmlhttp.send();
}
//
//
//Start Code To Make Multiple Stock Invoice At A Time @Author:Vinod : 04-08-2023
function makeAllEstimateSellInvoiceFunc(custId, preInvoice, postInvoice, mainPanel, MakeInvoiceType, ApprovalStatus, estimateProductId)
{
    sttrIdArray = estimateProductId.split(",");
    displayFlag = true;
    for (cntAr = 0; cntAr < sttrIdArray.length - 1; cntAr++)
    {
        if (sttrIdArray[cntAr] != null || sttrIdArray[cntAr] != ' ')
        {
            makeEstimateSellInvoiceFunc(custId, preInvoice, postInvoice, mainPanel, MakeInvoiceType, ApprovalStatus, sttrIdArray[cntAr], displayFlag);

        }

    }
}
//End Code To Make Multiple Stock Invoice At A Time @Author:Vinod : 04-08-2023
//
function makeEstimateSellInvoiceFunc(custId, preInvoice, postInvoice, mainPanel, MakeInvoiceType, ApprovalStatus, estimateProductId, displayStatus = false) {
    //
    //alert('mainPanel ===' + mainPanel);
    //
    if (MakeInvoiceType == 'selectedInvoice')
        confirm_box = confirm("Do you really want to make invoice of selected Item?");
    else if (ApprovalStatus == 'ApprovalDone')
        confirm_box = confirm("Do you really want to submit this Approval?");
    else
        confirm_box = confirm("Do you really want to make invoice of this Item?");
    //
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (mainPanel == 'Estimate') {
                    if (ApprovalStatus == 'custHomeInvList')
                    {
                        if (displayStatus)
                        {
                            document.getElementById("estimateCurrentInvoice").style.display = "none";
                            document.getElementById("estimateListHead").style.display = "none";
                        }
                    }
                    document.getElementById("estimateDetails").innerHTML = xmlhttp.responseText;
                    //closeMessDiv('sellMessDisplayDiv', 'DELETED');
                } else if (mainPanel == 'ItemApprovalRec' || mainPanel == 'ItemApprovalRecUp') {
                    document.getElementById("AddInvoiceMainDiv").innerHTML = xmlhttp.responseText;
                    closeMessDiv('messDisplayDiv', 'DELETED');
                } else {
                    document.getElementById("sellMainDiv").innerHTML = xmlhttp.responseText;
                    window.setTimeout(sellFunctionToCloseDiv, 1000);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        var SelectedItemIds = "";
        if (MakeInvoiceType == "selectedInvoice") {
            var ItemId = new Array();
            var counter = parseFloat(document.getElementById('approvalItemCount').value);
            for (var i = 1; i <= counter; i++) {
                ItemId[i] = document.getElementById('approvalItemId' + i).value;
                if (document.getElementById('approvalItemId' + i).checked == true) {
                    if (SelectedItemIds == '')
                        SelectedItemIds = ItemId[i];
                    else
                        SelectedItemIds = SelectedItemIds + "," + ItemId[i];
                }
            }
        }
        xmlhttp.open("GET", "include/php/ogspidel" + default_theme + ".php?custId=" + custId +
                "&preInvoice=" + preInvoice + "&postInvoice=" + postInvoice +
                "&panelName=" + mainPanel + "&mainPanel=" + mainPanel +
                "&slPrInfo=MakeInvoice" + "&SelectedItemIds=" + SelectedItemIds +
                "&ApprovalStatus=" + ApprovalStatus + "&EstimateStatus=PaymentDone" +
                "&SelectedItemIds=" + estimateProductId, true);
        xmlhttp.send();
}
}
// *********************************************************************************************************
// END CODE TO ADD FUNCTION FOR QUOTATION PANEL @PRIYANKA-12NOV2022
// *********************************************************************************************************
//
//

function addStockExistingNgenrateExcleReportItemDiv(newPreInvoiceNo, newInvoiceNo, panelName, mainPanel, stockPanel, documentRootPath, sttrId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("addStockCurrentInvoice").innerHTML = xmlhttp.responseText;
            window.open(documentRootPath + "/include/php/omHUIDStockExport.php?sttrId=" + sttrId + "&documentRootBSlash=" + documentRootPath);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//    alert("newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&stockPanel=" + stockPanel + "&sttrId=" + sttrId);
    xmlhttp.open("POST", documentRootPath + "/include/php/omHUIDStockExport" + default_theme + ".php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&stockPanel=" + stockPanel + "&sttrId=" + sttrId, true);
    //xxxxxxxxxxxxxxxxxxxxxxxx  END ADD omHUIDStockExport.PHP THIS FUNCTION FOR HALLMARKING 17012023 xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    xmlhttp.send();
}
//**************************************************************************************************************//
// ADD FOR LED RATES HIDE SUBMIT BUTTON @AUTHOR-SONALI
function hideSubmitButton() {
    var submitButton = document.getElementById("paySubButn");
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    submitButton.style.display = "none";
}
//****************************************************************************************************************************************
//START CODE FOR COUPON UPDATE FORM ADD @SONALI-25OCT23
//****************************************************************************************************************************************

function couponFormUp(selFirmName, quantity, offerName, content, discount, discounton, cpnStartDay, cpnStartMonth, cpnStartYear, cpn_day, cpn_month, cpn_year, cpn_validity_detail, cpnHeightInMm, cpnWidthInMm, divId) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('submitbtn').style.display = 'block';
            document.getElementById('updatebtn').style.display = 'none';
            document.getElementById('newaddbtn').style.display = 'none';
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omdisctempcpn.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var params = "c_firm_name=" + selFirmName + "&c_qty=" + quantity + "&c_offer_name=" + offerName + "&c_content=" + content + "&c_discount=" + discount + "&discounton=" + discounton + "&cpnstart_day=" + cpnStartDay + "&cpnstart_month=" + cpnStartMonth + "&cpnstart_year=" + cpnStartYear + "&cpn_day=" + cpn_day + "&cpn_month=" + cpn_month + "&cpn_year=" + cpn_year + "&cpn_validity_detail=" + cpn_validity_detail + "&cpn_height=" + cpnHeightInMm + "&cpn_width=" + cpnWidthInMm;
    xmlhttp.send(params);
}

//****************************************************************************************************************************************
//START CODE FOR COUPON CODE SUBMIT FORM @SONALI-25OCT23
//****************************************************************************************************************************************

function couponSubmit(selFirmName, quantity, offerName, content, discount, cpnStartDay, cpnStartMonth, cpnStartYear, cpn_day, cpn_month, cpn_year, cpn_validity_detail, cpnHeightInMm, cpnWidthInMm, divId) {
    var selectedOption = document.getElementById('c_discount_on');
    var discounton = selectedOption.value;
//     alert(discountType);  
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).style.display = "block";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omdisctempcpn.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var params = "c_firm_name=" + selFirmName + "&c_qty=" + quantity + "&c_offer_name=" + offerName + "&c_content=" + content + "&c_discount=" + discount + "&discounton=" + discounton + "&cpnstart_day=" + cpnStartDay + "&cpnstart_month=" + cpnStartMonth + "&cpnstart_year=" + cpnStartYear + "&cpn_day=" + cpn_day + "&cpn_month=" + cpn_month + "&cpn_year=" + cpn_year + "&cpn_validity_detail=" + cpn_validity_detail + "&cpn_height=" + cpnHeightInMm + "&cpn_width=" + cpnWidthInMm;
    xmlhttp.send(params);
}
//END CODE FOR COUPON CODE  @SONALI-25OCT23
//****************************************************************************************************************************************
//START CODE FOR COUPON CODE GOOGLE SUGGETION @SONALI-25OCT23
//****************************************************************************************************************************************

function searchAddCoupon(offerName, divNum, keyCodeInput, documentRootPath) {
    keyCodeForItemNames = keyCodeInput;
    divNumForItemNames = divNum;
    //panelNameForItemNames = divNum;
    //c_offer_name
    var poststr = "&c_offer_name=" + encodeURIComponent(offerName)
            //+ "&c_firm_name=" + encodeURIComponent(selFirmName) 
            + "&divNum=" + encodeURIComponent(divNum);
    //
    search_stock_item_names(documentRootPath + "/include/php/ommasteritemsearch" + default_theme + ".php", poststr);
}
// END CODE FOR COUPON CODE GOOGLE SUGGETION @SONALI-25OCT23///////////////////////////////////
//
//****************************************************************************************************************************************
//
// start CODE FOR COUPON CODE @SONALI-25OCT23///////////////////////////////////
//****************************************************************************************************************************************

function EnterOfferName(offerName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //
            var response = xmlhttp.responseText;
            let data = JSON.parse(response);
            //
//
            document.getElementById("c_firm_name").value = data.cpn_firm_name;
            document.getElementById("c_qty").value = data.cpn_quantity;
            document.getElementById("c_content").value = data.cpn_content;
            document.getElementById("c_discount").value = data.cpn_discount;
            document.getElementById("c_discount_on").value = data.cpn_discount_on;
            document.getElementById("cpn_validity_detail").value = data.cpn_validity_detail;
            //
            var startdate = data.cpn_start_date.split('-');
            var enddate = data.cpn_end_date.split('-');
            //
            document.getElementById('cpnstart_day').value = startdate[2];
            //
            let shortMonth = new Date(startdate).toLocaleString('en-US', {month: 'short'});
            shortMonth = shortMonth.toUpperCase();
            //console.log(shortMonth);
            //
            let shortendMonth = new Date(enddate).toLocaleString('en-US', {month: 'short'});
            shortendMonth = shortendMonth.toUpperCase();
            //
            document.getElementById('cpnstart_month').value = shortMonth;
            document.getElementById('cpnstart_year').value = startdate[0];
            document.getElementById('cpn_day').value = enddate[2];
            document.getElementById('cpn_month').value = shortendMonth;
            document.getElementById('cpn_year').value = enddate[0];
            //
            //

            var cpnHeight = Math.round((data.cpn_height * (25.4 / 96))).toFixed(0) + 'MM';
            var cpnWidth = Math.round((data.cpn_width * (25.4 / 96))).toFixed(0) + 'MM';
            document.getElementById("cpn_height").value = cpnHeight;
            document.getElementById("cpn_width").value = cpnWidth;
            //
            document.getElementById("cpn_validity_detail").value = data.cpn_validity_detail;
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcouponoffers" + default_theme + ".php?c_offer_name=" + offerName, true);
    xmlhttp.send();
}
//****************************************************************************************************************************************
//FOR SUBMIT COUPON FORM VALIDATION SONALI01-11-2023/////////////////////////////
//****************************************************************************************************************************************
function couponSub(id) {
    var input1 = document.getElementById("c_offer_name").value;
    var input2 = document.getElementById("c_qty").value;
    var input4 = document.getElementById("cpn_validity_detail").value;
    var input5 = document.getElementById("cpn_height").value;
    var input6 = document.getElementById("cpn_width").value;

    if (input1 == '' || input2 == '' || input4 == '' || input5 == '' || input6 == '') {
        alert("Field is empty. Please fill it.");
        return false;
    }
    return true;
}
////****************************************************************************************************************************************
//////// New SUBMIT COUPON FORM VALIDATION Ashwini 2-11-2023////////////
////****************************************************************************************************************************************
function couponnewSubmit(selFirmName, quantity, offerName, content, discount, cpnStartDay, cpnStartMonth, cpnStartYear, cpn_day, cpn_month, cpn_year, cpn_validity_detail, cpnHeightInMm, cpnWidthInMm, divId) {
    var selectedOption = document.getElementById('c_discount_on');
    var discounton = selectedOption.value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).style.display = "block";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omNewDiscCpn.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var params = "c_firm_name=" + selFirmName + "&c_qty=" + quantity + "&c_offer_name=" + offerName + "&c_content=" + content + "&c_discount=" + discount + "&discounton=" + discounton + "&cpnstart_day=" + cpnStartDay + "&cpnstart_month=" + cpnStartMonth + "&cpnstart_year=" + cpnStartYear + "&cpn_day=" + cpn_day + "&cpn_month=" + cpn_month + "&cpn_year=" + cpn_year + "&cpn_validity_detail=" + cpn_validity_detail + "&cpn_height=" + cpnHeightInMm + "&cpn_width=" + cpnWidthInMm;
    xmlhttp.send(params);
}
// Start Code to Delete Raw metal Crystal @Author:Prathamesh-22 june 2024
function deleteRawStockCrystalDivFunc(mainPanelName, rawPanelName, stprCryId, itstCryId, sttrId, documentRootPath) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById('rawMetalAddDiv').innerHTML = xmlhttp2.responseText;
            let crystalCount = document.getElementById('totalCrystalCount').value;
            if (crystalCount > 0) {
                autoLessWeightStockCrystalFunc(crystalCount, document.getElementById('slPrAutoLessCryWt' + crystalCount).value, 'sttr_gs_weight', 'sttr_gs_weight_type', 'rawAddStock', 'AddStock');
            }
        }
    };
    xmlhttp2.open("POST", documentRootPath + "/include/php/omrwcydldv" + default_theme + ".php?stprCryId=" + stprCryId +
            "&itstCryId=" + itstCryId + "&sttrId=" + sttrId + "&mainPanel=" + mainPanelName + "&rawPanelName=" + rawPanelName + "&panelName=RawMetalPanel", true);
    xmlhttp2.send();
}
// End Code to Delete Crystal @Author:Prathamesh-22 june 2024
function showRetailCadStock(panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cadStockDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcadstockcrystalreports.php?panelName=" + panel, true);
    xmlhttp.send();
}
//
function OpenDailyMetalRateModal() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalLed').style.display = "block";
            document.getElementById('myModalLed').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ommetratemodeldisp" + default_theme + ".php", true);
    xmlhttp.send();
}
function changeTunchByMetal(metalType) {
    loadXMLDoc();
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("tunchCodeDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omchangetunchbymetal.php?metalType=" + metalType, true);
    xmlhttp.send();
}
// End Code to Delete Crystal @Author:Prathamesh-22 june 2024
function calcCadOtherCharges() {
    let noOfRows = document.getElementById('sttr_total_other_charges_rows').value;
    let totalOthCharges = 0;
    //
    for (i = 1; i <= noOfRows; i++) {
        let charges = document.getElementById('sttr_other_charges_amt' + i).value;
        if (charges == '' || charges == null) {
            charges = 0;
        }
        totalOthCharges += parseFloat(charges);
        if (!totalOthCharges) {
            totalOthCharges = 0;
        }
        document.getElementById('sttr_other_charges_total').value = totalOthCharges;
    }
    //
}
//
//PRATIKSHA
function triggerFileInput(inputId) {
    document.getElementById(inputId).click();
}
function getfileuploadname(fileId,fileValue){
//    alert('fileId:'+fileId);
//    alert('fileValue:'+fileValue);
//    alert('document.getElementById(fileId).value:'+document.getElementById(fileId).value);
    document.getElementById(fileId).value = fileValue;
}
function openPDF(pdfPath) {
    //alert('pdfPath:'+pdfPath);
    if (!pdfPath) {
        alert("Invalid file path.");
        return;
    }
//    window.location.href = 'include/php/ompdfupload.php?pdf=' + encodeURIComponent(pdfPath);
 window.open('include/php/ompdfupload.php?pdf=' + encodeURIComponent(pdfPath), '_blank');
}



//PRATIKSHA
//
function changeCalcByFfnWeight(newItemFFNWBy, sttrId, pageNo, weightBy) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemDetails").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogidchwt" + default_theme + ".php?weightType=" + weightBy + "&sttrId=" + sttrId + "&pageNo=" + pageNo + "&panelName=changeSellFfnWt" + "&newItemFFNWBy=" + newItemFFNWBy, true);
    xmlhttp.send();
}
//-----------Start code for prevent multiple submission of purity (Daily Rates Panel) @RANJEET:06-NOV-2024---------------//
function disableButtonOnSubmit() {
    var button = document.getElementById("metalRateButton"); // Replace with actual ID if different
    if (button) {
        button.disabled = true; // Disable the button
    }
    return true; // Proceed with form submission
}
//-----------End code for prevent multiple submission of purity (Daily Rates Panel) @RANJEET:06-NOV-2024---------------//

//------------Start code for calculate carat on purity (Daily Rates Panel) @RANJEET:06-NOV-2024---------------//
function calMetalCaratOnPurity() {
    purity = document.getElementById('metratepurity').value;
    result = purity * 24 / 100;
    carat = (result % 1 === 0) ? result.toFixed(0) : result.toFixed(2)
    document.getElementById('metratecarat').value = carat;
    return false;
}
//------------End code for calculate carat on purity (Daily Rates Panel) @RANJEET:06-NOV-2024---------------//
//-------------START CODE TO CHANGE DAILY METAL RATE BY CHANGING SINGLE VALUES @AUTHOR:RANJEET-28OCT2024------------//

function changeMetalRateValue(metalRateId, panelName, metalId, metRateMetalName) {
    //    alert('metalRateId==' + metalRateId);
    if (panelName === 'changeMetalRateValue' && metalId === 'dailyMetalRate') {
        var metalRateTemp = parseFloat(document.getElementById(metalRateId).value);
        if (!(metalRateTemp > 0)) {
            return false;
        }
        let preMetalId = metalRateId.split('-')[0];
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "include/php/omFetchMetalRatesData.php?preMetalId=" + preMetalId, true);
        xmlhttp.onload = function () {
            if (xmlhttp.status === 200) {
                let data = JSON.parse(xmlhttp.responseText);
                //        alert(data);
                if (data.error) {
                    console.error('Error:', data.error);
                } else {
                    ind = data.indexOf(metalRateId);
                    var metalRate = parseFloat(document.getElementById(metalRateId).value);
                    var newMetalRate = metalRate.toFixed(2);
                    document.getElementById(metalRateId).value = newMetalRate;
                    for (let i = ind + 1; i < data.length; i++) {
                        let preMetalRateCarat = data[i - 1].split('-')[1];
                        let nxtMetalRateCarat = data[i].split('-')[1];

                        if (metRateMetalName == 'Gold' || metRateMetalName == 'gold' || metRateMetalName == 'GOLD') {
                            if (typeof preMetalRateCarat === "string" && preMetalRateCarat.endsWith("K")) {
                                preMetalRateCarat = preMetalRateCarat.slice(0, -1);  // Removes the last character
                            }
                            if (typeof nxtMetalRateCarat === "string" && nxtMetalRateCarat.endsWith("K")) {
                                nxtMetalRateCarat = nxtMetalRateCarat.slice(0, -1);  // Removes the last character
                            }
                            if (preMetalRateCarat == '' || preMetalRateCarat == null) {
                                preMetalRateCarat = '24';
                            }
                            if (nxtMetalRateCarat == '' || nxtMetalRateCarat == null) {
                                nxtMetalRateCarat = '24';
                            }
                        } else {
                            if (preMetalRateCarat == '' || preMetalRateCarat == null) {
                                preMetalRateCarat = '100';
                            }
                            if (nxtMetalRateCarat == '' || nxtMetalRateCarat == null) {
                                nxtMetalRateCarat = '100';
                            }
                        }
                        newMetalRate = ((parseFloat(nxtMetalRateCarat) * newMetalRate) / parseFloat(preMetalRateCarat)).toFixed(2);
                        document.getElementById(data[i]).value = newMetalRate;
                    }
                }
            }
        };
        xmlhttp.onerror = function () {
            console.error('Request failed');
        };
        xmlhttp.send();
    }
}
//-------------END CODE TO CHANGE DAILY METAL RATE BY CHANGING SINGLE VALUES @AUTHOR:RANJEET-28OCT2024------------//
function addNewMetalPurityRate() {
    let xmlhttp = new XMLHttpRequest();
    preMetalId = '-';
    xmlhttp.open("GET", "include/php/omFetchMetalRatesData.php?preMetalId=" + preMetalId, true);
    xmlhttp.onload = function () {

        if (xmlhttp.status === 200) {
            let data = JSON.parse(xmlhttp.responseText);
            if (data.error) {
                console.error('Error:', data.error);
            } else {
                let metalRatesObject = {};
                let blankFlag = true;
                for (let i = 0; i < data.length; i++) {
                    let val = document.getElementById(data[i]).value;
                    if (val !== '' && val !== null) {
                        metalRatesObject[data[i]] = val; // Assign value to the key
                        blankFlag = false;
                    }
                }
                if (blankFlag) {
                    return false;
                }
                let metalIdAndRateStr = JSON.stringify(metalRatesObject);

                let xmlhttp2 = new XMLHttpRequest();
                xmlhttp2.onreadystatechange = function () {

                    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";

                        document.getElementById("metalDetDiv").innerHTML = xmlhttp2.responseText;
                    } else {
                        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                    }
                };

                xmlhttp2.open("POST", "include/php/omAddNewMetalRate.php", true);
                xmlhttp2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xmlhttp2.send("metalIdAndRateStr=" + encodeURIComponent(metalIdAndRateStr)); // Send the JSON string
                return true;
            }
        }
    };
    xmlhttp.onerror = function () {
        console.error('Request failed');
    };
    xmlhttp.send();
//    location.reload();
}

// This is the function called by the image's onload event
function initiateAjaxSubmit() {
    console.log("Image loaded, initiating AJAX submission sequence.");

    // --- IMPORTANT ---
    // If initFormName and callItemPriceImitationB2 MUST run before submission,
    // call them here:
    // initFormName('sell_purchase', 'someIdentifier'); // Adjust params if needed
    // callItemPriceImitationB2();

    // Now, instead of form.submit(), call our AJAX function directly:
    submitSellPurchaseFormViaAjax();
}


// Document Ready - Ensure jQuery is loaded and ready
//$(document).ready(function () {
//    console.log("Document ready. AJAX submission logic prepared.");
//
//    // The $(document).on('submit', ...) listener is NOT needed and will NOT work
//    // reliably when form.submit() is called programmatically, and it's
//    // not needed at all if we call the AJAX function directly.
//    // You can safely remove it.
//
//});
// Reusable function containing the core AJAX logic
function submitSellPurchaseFormViaAjax() {
    console.log("Attempting AJAX submission for sell_purchase...");

    var formElement = document.getElementById('sell_purchase');
    if (!formElement) {
        console.error("Form #sell_purchase not found!");
        $('#slPrCurrentInvoice').html('<p style="color:red;">Error: Form element missing.</p>');
        return;
    }

    var formData = new FormData(formElement);

    $('#slPrCurrentInvoice').html('<p>Processing...</p>'); // Loading indicator

    $.ajax({
        url: 'include/php/ogijspmad.php', // Correct path needed
        type: 'POST',
        data: formData,
        processData: false, // Important for FormData
        contentType: false, // Important for FormData
        success: function (response) {
            console.log("AJAX Success (Triggered by onload). Response received.");
            $('#slPrCurrentInvoice').html(response); // Update target div
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error (Triggered by onload):");
            console.error("Status: " + textStatus);
            console.error("Error Thrown: " + errorThrown);
            if (jqXHR.responseText) {
                console.error("Server Response: " + jqXHR.responseText);
            }
            $('#slPrCurrentInvoice').html('<p style="color:red;">An error occurred. Status: ' + textStatus + '</p>');
        }
    });
}
//
function showInvoiceDetailsAutoSell(requestData) {
    // Access the data
    //console.log('Received request data:', requestData);
    //
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp2.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp2.open("POST", "include/php/ogijspindv.php?requestData=" + requestData, true);
    xmlhttp2.send();

}