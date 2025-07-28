var cryCountGobal = 0;

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*********Start code to add func to check net weight @Author:PRIYA06SEP13*********/
/**********Start code to change function @Author:PRIYA27DEC13********************/
function checkNetWeight(itemW, itemWType, wtToCheck, wtToCheckType, focusId, panelName) {
    if (panelName == 'loanPanel') {
        alertMessage = 'Net Weight Exceeding Gross Weight!\nPlease Enter Correct Net Weight!';
    }
    if (itemWType == wtToCheckType) {
        if (parseFloat(wtToCheck) > parseFloat(itemW)) {
            alert(alertMessage);
            document.getElementById(focusId).focus();
        }
    } else {
        if (itemWType == 'GM' && wtToCheckType == 'KG') {
            alert(alertMessage);
            document.getElementById(focusId).focus();
        } else if (itemWType == 'MG' && (wtToCheckType == 'GM' || wtToCheckType == 'KG')) {
            alert(alertMessage);
        }
    }
    return false;
}



/*********End code to change function @Author:PRIYA27DEC13********************/
/*********Start code to add func to check net weight @Author:PRIYA06SEP13*********/
/*********Start code to add func to select roi @Author:PRIYA07SEP13*********/
/*********Start code to add param in searchROI @Author:PRIYA10SEP13*********/
var keyCodeForRoiValue;
var keyCodeForRoiValueOption = 0;
var keyCodeForRoiValueOptionCount;
var keyCodeForRoiValueOptionPrev = 0;
function search_roi(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchRoi;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertSearchRoi() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("roiListDivToAddROI").innerHTML = xmlhttp.responseText;
        //if (keyCodeForRoiValue == 40 || keyCodeForRoiValue == 38) {
        document.getElementById('roiListToAddRoiSelect').focus();
        keyCodeForRoiValueOptionPrev = keyCodeForRoiValueOption;
        document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOptionPrev].selected = false;
        document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].selected = true;
        //}
        document.getElementById('selROIValue').focus();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//function validateAddROI(){
//    if (validateEmptyField(document.getElementById("selROI").value,"Please Select ROI!") == false) {  
//        document.getElementById("selROI").focus();
//        return false;
//    }
//    return true;
//}
/***********Start code to add panelName @Author:PRIYA12NOV14********************/
/***********Start code to add AuctionPanel @Author:ANUJA30MAY15********************/

function searchROI(roiValue, intType, girviId, custId, panelName, keyCodeInput, girviDOB, girviFirmId, girviSerialNum, auctionPanel) {
    keyCodeForRoiValue = keyCodeInput;
    keyCodeForRoiValueOption = 0;
    var poststr = "ROIValue=" + encodeURIComponent(roiValue) +
            "&interestType=" + encodeURIComponent(intType) +
            "&girviId=" + encodeURIComponent(girviId) +
            "&custId=" + encodeURIComponent(custId) +
            "&panelName=" + encodeURIComponent(panelName) +
            "&girviDOB=" + encodeURIComponent(girviDOB) +
            "&girviFirmId=" + encodeURIComponent(girviFirmId) +
            "&girviSerialNum=" + encodeURIComponent(girviSerialNum) +
            "&auctionPanel=" + encodeURIComponent(auctionPanel);
    if (panelName == 'AddUdhaarEMI')
        search_roi('include/php/omuroisl' + default_theme + '.php', poststr);
   else
        search_roi('include/php/olgroisl' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
}
/***********End code to add AuctionPanel @Author:ANUJA30MAY15********************/
/***********Start code to add AuctionPanel @Author:SANT28APR17********************/

function searchFinanceLoanROI(roiValue, intType, girviId, custId, panelName, keyCodeInput, girviDOB, girviFirmId, girviSerialNum, auctionPanel) {
    keyCodeForRoiValue = keyCodeInput;
    keyCodeForRoiValueOption = 0;
    var poststr = "ROIValue=" + encodeURIComponent(roiValue) +
            "&interestType=" + encodeURIComponent(intType) +
            "&girviId=" + encodeURIComponent(girviId) +
            "&custId=" + encodeURIComponent(custId) +
            "&panelName=" + encodeURIComponent(panelName) +
            "&girviDOB=" + encodeURIComponent(girviDOB) +
            "&girviFirmId=" + encodeURIComponent(girviFirmId) +
            "&girviSerialNum=" + encodeURIComponent(girviSerialNum) +
            "&auctionPanel=" + encodeURIComponent(auctionPanel);
    if (panelName == 'AddUdhaarEMI')
        search_roi('include/php/omuroisl' + default_theme + '.php', poststr);
    else
        search_roi('include/php/olgroisl_1' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
}
/***********End code to add AuctionPanel @Author:SANT28APR17********************/
/***********End code to add panelName @Author:PRIYA12NOV14********************/
/*********End code to add param in searchROI @Author:PRIYA10SEP13*********/
function searchRoiForPanelBlank() {
    document.getElementById("roiListDivToAddROI").innerHTML = '';
}
/**************Start code to add focus @Author:PRIYA12SEP13**********/
/***********Start to add code for add loan in money lender panel @AUTHOR: SANDY14NOV13************/
function searchRoiForFocusPanelBlank(panelName, keyCode) {
    document.getElementById("roiListDivToAddROI").innerHTML = '';
    if (panelName == 'AddNewGirvi') {
        if (keyCode == 13) {
            document.getElementById('girviFirmId').focus();
        } else if (keyCode == 8) {
            document.getElementById('interestType').focus();
        }
    } else if (panelName == 'MoneyLenderLoan') {
        if (keyCode == 13) {
            document.getElementById('mlAddLnDOBDay').focus();
        } else if (keyCode == 8) {
            document.getElementById('mlPrincipalAmount').focus();
        }
    }
}
/***********End to add code for add loan in money lender panel @AUTHOR: SANDY14NOV13************/
/**************End code to add focus @Author:PRIYA12SEP13**********/
/*********Start code to add param in searchRRoiForPanelBlank @Author:PRIYA18NOV13*********/
/*********Start code to comment code @Author:PRIYA18NOV13**************************/
//function selectRoiForPanelBlank(documentRootPath,girviROI,girviId,custId,panelName) {
//    document.getElementById("roiListDivToAddROI").innerHTML = '';
//}
/*********End code to comment code @Author:PRIYA18NOV13**************************/
/*********End code to add param in searchROI @Author:PRIYA18NOV13*********/
/*********End code to add func to select roi @Author:PRIYA07SEP13*********/
/*********Start code to add func to Update roi @Author:PRIYA07SEP13*********/
function update_roi(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertUpdateRoi;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/********Start to change function to pass response in correct div as per panel name @AUTHOR: SANDY27NOV13************/
function alertUpdateRoi() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        if (updateRoiValPanelName == 'mlLoanInfo' || updateRoiValPanelName == 'mlLoanUpdate') {
            document.getElementById("mnyLender_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        }
        document.getElementById("selROIChangeDiv").style.visibility = "visible";
        window.setTimeout(closeselROIOptChangeDiv, 1000);
    }
}
/********End to change function to pass response in correct div as per panel name @AUTHOR: SANDY27NOV13************/
function closeselROIOptChangeDiv()
{
    document.getElementById("selROIChangeDiv").style.visibility = "hidden";
}
/*********Start code to change message @Author:PRIYA18NOV13*********/
/********Start code to add var girviDOB,girviFirmId, girviSerialNum @Author:PRIYA12APR14**************/
/********Start code to add var for sys log @Author:PRIYA02JUL14**********************/
/********Start code to add auctionPanel @Author:ANUJA30MAY15**********************/
function updateRoi(documentRootPath, roiId, girviId, custId, panelName, girviDOB, girviFirmId, girviSerialNum, roiType, auctionPanel) {
//  alert('hi');
    confirm_box = confirm(updateROIAlertMess + "\n\nDo you really want to update rate of interest?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
    if (confirm_box == true)
    {
        var poststr = "custId=" + custId + "&girviId=" + girviId
                + "&roiId=" + roiId + "&panelName=" + panelName
                + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
                + "&girviSerialNum=" + girviSerialNum + "&roiType=" + roiType + "&auctionPanel=" + auctionPanel;
        update_roi(documentRootPath + '/include/php/olguroiv' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    }
    return false;
}
/********End code to add auctionPanel @Author:ANUJA30MAY15**********************/
/********Start code to update custody roi**********************/
function updateCustodyRoi(documentRootPath,custodyroi,girviId, custId, panelName) {
    confirm_box = confirm(updateROIAlertMess + "\n\nDo you really want to update rate of interest?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
    if (confirm_box == true)
    {
        var poststr = "custId=" + custId + "&girviId=" + girviId
                + "&custodyroi=" + custodyroi + "&panelName=" + panelName;
        update_roi(documentRootPath + '/include/php/olguroiv' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    }
    return false;
}
/********End code to update custody roi**********************/
/********Start code to add auctionPanel @Author:ANUJA30MAY15**********************/
function updateFinanceLoanRoi(documentRootPath, roiId, girviId, custId, panelName, girviDOB, girviFirmId, girviSerialNum, roiType, auctionPanel) {
//      alert('hello');
    confirm_box = confirm(updateROIAlertMess + "\n\nDo you really want to update rate of interest?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
    if (confirm_box == true)
    {
        var poststr = "custId=" + custId + "&girviId=" + girviId
                + "&roiId=" + roiId + "&panelName=" + panelName
                + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
                + "&girviSerialNum=" + girviSerialNum + "&roiType=" + roiType + "&auctionPanel=" + auctionPanel;
        update_roi(documentRootPath + '/include/php/olguroiv_1' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    }
    return false;
}
/********End code to add auctionPanel @Author:ANUJA30MAY15**********************/
/********End code to add var for sys log @Author:PRIYA02JUL14**********************/
/********End code to add var girviDOB,girviFirmId, girviSerialNum @Author:PRIYA12APR14**************/
/*********Start code to change message @Author:PRIYA18NOV13*********/
/*********End code to add func to update roi @Author:PRIYA07SEP13*********/

/*********Start code to Update roi @Author:PRIYA11SEP13*********/
var keyCodeForTRoiValue;
var trRoiExactMatchCount = 0; //var by @AUTHOR: SANDY06FEB14
function search_t_roi(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchTRoi;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/*****Start to change function @AUTHOR: SANDY08JAN14*************/
function alertSearchTRoi() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (panel == 'MlLoan') {
            document.getElementById("tRoiListDivToAddROIInMl").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("tRoiListDivToAddROI").innerHTML = xmlhttp.responseText;
        }
        if (keyCodeForTRoiValue == 40 || keyCodeForTRoiValue == 38) {
            document.getElementById('tRoiListToAddRoiSelect').focus();
            document.getElementById('tRoiListToAddRoiSelect').options[0].selected = true;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
var panel; //@AUTHOR: SANDY08JAN14
function searchTROI(troiValue, intType, girviId, gTransId, custId, panelName, keyCodeInput) {
    panel = panelName;
    keyCodeForTRoiValue = keyCodeInput;
    var poststr = "TROIValue=" + encodeURIComponent(troiValue) +
            "&interestType=" + encodeURIComponent(intType) +
            "&girviId=" + encodeURIComponent(girviId) +
            "&gTransId=" + encodeURIComponent(gTransId) +
            "&custId=" + encodeURIComponent(custId) +
            "&panelName=" + encodeURIComponent(panelName);
    search_t_roi('include/php/oltgrosl' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY22NOV13
}
/*****End to change function @AUTHOR: SANDY08JAN14*************/
function searchTRoiForPanelBlank() {
    document.getElementById("tRoiListDivToAddROI").innerHTML = '';
}
/*********Start code to add param in searchRRoiForPanelBlank @Author:PRIYA10SEP13*********/
/*****Start to change function to pass panel @AUTHOR: SANDY02JAN14*************/
/*****Start to change function @AUTHOR: SANDY08JAN14*************/
function selectTRoiForPanelBlank(documentRootPath, girviROI, intType, girviId, gTransId, custId, omPanelDiv) {
    if (panel == 'MlLoan') {
        document.getElementById("tRoiListDivToAddROIInMl").innerHTML = '';
    } else {
        document.getElementById("tRoiListDivToAddROI").innerHTML = '';
    }
    updateTRoi(documentRootPath, girviROI, intType, girviId, gTransId, custId, omPanelDiv);
}
/*****End to change function @AUTHOR: SANDY08JAN14*************/
/*****End to change function to pass panel @AUTHOR: SANDY02JAN14*************/
/*********End code to add param in searchROI @Author:PRIYA10SEP13*********/
function update_t_roi(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertUpdateTRoi;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/*******Start to change function  @AUTHOR: SANDY29NOV13****/
/*******Start to change function  @AUTHOR: SANDY02JAN14****/
/*******Start code to add if condition for AddPrinTransPanel @Author:PRIYA09DEC14*******************/
function alertUpdateTRoi() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        if (updatePanelname == 'mlLoanInfo' || updatePanelname == 'mlLoanUpdate' || updatePanelname == 'mlLoanInfoToRelease' || updatePanelname == 'ReleasedLoan') {
            document.getElementById("mnyLender_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            if (updatePanelname == 'AddPrinTransPanel')
                document.getElementById("addPrinTransDetDiv").innerHTML = xmlhttp.responseText;
            else
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText; //CHANGE IN DIV @AUTHOR: SANDY29NOV13
            document.getElementById("selTROIChangeDiv").style.visibility = "visible";
            window.setTimeout(closeSelTROIOptChangeDiv, 1000);
        }
    }
}
/*******End code to add if condition for AddPrinTransPanel @Author:PRIYA09DEC14*******************/
/*******End to change function @AUTHOR: SANDY02JAN14****/
/*************Start to change function @AUTHOR: SANDY02JAN14*****************/
var updatePanelname;
function updateTRoi(documentRootPath, girviTROI, intType, girviId, gTransId, custId, omPanelDiv) {
    updatePanelname = omPanelDiv;
    confirm_box = confirm(updateROIAlertMess + "\n\nDo you really want to update rate of interest?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
    if (confirm_box == true)
    {
        var poststr = "custId=" + custId + "&roiOption=" + intType + "&girviId=" + girviId + "&girviTransId=" + gTransId
                + "&ROIValue=" + girviTROI + "&panelName=" + 'updateTROIDiv' + "&omPanelDiv=" + omPanelDiv;
        update_t_roi(documentRootPath + '/include/php/olguptro' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    }
    return false;
}
/*************End to change function @AUTHOR: SANDY02JAN14*****************/

/*******End to change function  @AUTHOR: SANDY29NOV13****/
function closeSelTROIOptChangeDiv()
{
    document.getElementById("selTROIChangeDiv").style.visibility = "hidden";
}
/*********End code to Update roi @Author:PRIYA11SEP13*********/
/*********Start code to Add roi List in Add loan @Author:PRIYA11SEP13*********/
function change_ROI_Opt_Add(url) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertchangeROIOptAdd;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send();
}
/************Start code to add delay func @Author:PRIYA11SEP13********************/
function alertchangeROIOptAdd() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "hidden";
        document.getElementById("ROIOption").innerHTML = xmlhttp.responseText;
        document.getElementById('selROIValue').focus();
    } else {
        document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "visible";
    }
}
/**************Start code to add new roi Option Daily and weekly @Author:ANUJA09OCT15**********/
function changeROIOptAdd(selectROIType, obj, panelName) {
    roiOption = selectROIType.value;
    if (roiOption == 'Annually') {
        change_ROI_Opt_Add('include/php/olggroia' + default_theme + '.php?panelName=' + panelName); //change in filename @AUTHOR: SANDY20NOV13
    } else if (roiOption == 'Monthly') {
        change_ROI_Opt_Add('include/php/olggroim' + default_theme + '.php?panelName=' + panelName); //change in filename @AUTHOR: SANDY20NOV13
    } else if (roiOption == 'Daily') {
        change_ROI_Opt_Add('include/php/olggroid' + default_theme + '.php?panelName=' + panelName); //change in filename @AUTHOR: SANDY20NOV13
    } else {
        change_ROI_Opt_Add('include/php/olggroiw' + default_theme + '.php?panelName=' + panelName); //change in filename @AUTHOR: SANDY20NOV13
    }
    return false;
}
/**************End code to add new roi Option Daily and weekly @Author:ANUJA09OCT15**********/
/*********End code to Add roi List in Add loan @Author:PRIYA11SEP13*********/
/**************Start code to add new roi @Author:PRIYA12SEP13**********/
function add_new_roi(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddNewRoi;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertAddNewRoi() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        document.getElementById("selROIChangeDiv").style.visibility = "visible";
        window.setTimeout(closeAddROIOptChangeDiv, 1000);
    }
}
function closeAddROIOptChangeDiv()
{
    document.getElementById("selROIChangeDiv").style.visibility = "hidden";
}
/*********Start code to change message @Author:PRIYA11SEP13*********/
function addNewRoi(documentRootPath, girviROI, intType, girviId, custId, panelName) {

    confirm_box = confirm(addNewRoiAlert + "\n\nDo you really want to add rate of interest?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
    if (confirm_box == true)
    {
        var poststr = "custId=" + custId + "&girviId=" + girviId + "&intType=" + intType
                + "&ROIValue=" + girviROI + "&panelName=" + panelName;
        add_new_roi(documentRootPath + '/include/php/olgadroi' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY22NOV13
    }
    return false;
}
/**************End code to add new roi @Author:PRIYA12SEP13**********/
/**************Start code to add new troi @Author:PRIYA12SEP13**********/
function add_new_t_roi(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddNewTRoi;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/*********start code to change function name @Author:PRIYA13SEP13*************/
/******Start to change code @AUTHOR: SANDY06FEB14****************/
function alertAddNewTRoi() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        if (troiAddPanel == 'mlLoanInfo' || troiAddPanel == 'mlLoanUpdate' || troiAddPanel == 'ReleasedLoan' || troiAddPanel == 'mlLoanInfoToRelease') {
            document.getElementById("mnyLender_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("transGirviDiv").innerHTML = xmlhttp.responseText;
        }
        document.getElementById("selTROIChangeDiv").style.visibility = "visible";
        window.setTimeout(closeAddTROIOptChangeDiv, 1000);
    }
}
/******End to change code @AUTHOR: SANDY06FEB14****************/
function closeAddTROIOptChangeDiv()
{
    document.getElementById("selTROIChangeDiv").style.visibility = "hidden";
}
/*********start code to change function name @Author:PRIYA13SEP13*************/
/*********Start code to change message @Author:PRIYA11SEP13*********/
/******Start to change code @AUTHOR: SANDY06FEB14****************/
/******Start to change code @AUTHOR: SANDY07FEB14****************/
function addNewTRoi(documentRootPath, girviROI, intType, girviId, custId, panelName) {
    troiAddPanel = panelName;
    if (troiAddPanel == 'mlLoanInfo' || troiAddPanel == 'mlLoanUpdate' || troiAddPanel == 'ReleasedLoan' || troiAddPanel == 'mlLoanInfoToRelease') {
        confirm_box = confirm(updateROIAlertMess + "\nDo you really want to Update rate of interest?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
    } else {
        confirm_box = confirm(addNewRoiAlert + "\n\nDo you really want to add rate of interest?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
    }
    if (confirm_box == true)
    {
        var poststr = "custId=" + custId + "&girviId=" + girviId + "&intType=" + intType
                + "&ROIValue=" + girviROI + "&panelName=" + panelName;
        add_new_t_roi(documentRootPath + '/include/php/olgtgaro' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY15JAN14
    }
    return false;
}
/******End to change code @AUTHOR: SANDY07FEB14****************/
/******End to change code @AUTHOR: SANDY06FEB14****************/
/**************End code to add new troi @Author:PRIYA12SEP13**********/
/**************Start code to add focus in TROI Panel @Author:PRIYA12SEP13**********/
function searchTRoiForFocusPanelBlank(keyCode) {
    document.getElementById("roiListDivToAddROI").innerHTML = '';
    if (keyCode == 13) {
        document.getElementById('interestTGType').focus();
    } else if (keyCode == 8) {
        document.getElementById('DOBDay').focus();
    }
}
/**************Start code to add focus in TROI Panel @Author:PRIYA12SEP13**********/
/************Start code To Add  charCode == 13 @Author:PRIYA13SEP13**********/
function valKeyPressedForROI(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if ((charCode > 97 && charCode < 122) || (charCode > 65 && charCode < 90)) {
        return false;
    } else {
        return true;
    }
}
/************End code To Add  charCode == 13 @Author:PRIYA13SEP13**********/
/************Start code to show crystal add div @Author:PRIYA16SEP13******************/
var crystalCount;
var getCrysDivByKey; //var added @Author:PRIYA24SEP13
var crystalPanel;
/*************Start code to add var @Author:PRIYA29NOV13**************/
function showCrystalAddDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("nwOrCrystalAddDiv").innerHTML = xmlhttp.responseText;
            if (getCrystalDiv == 0) {
                getCrystalDiv = 1;
            }
            getCrysDivByKey = document.getElementById('cryKeyb').value;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogncmndv" + default_theme + ".php", true);
    xmlhttp.send();
}
/************End code to add var @Author:PRIYA29NOV13**************/
/************End code to show crystal add div @Author:PRIYA16SEP13******************/
/************Start code to get new crystal add div @Author:PRIYA20SEP13******************/
/************Start code to get new crystal add div @Author:PRIYA30SEP13******************/
/************Start code to add panelName @Author: @Author:PRIYA10OCT13******************/
/************Start code to add stock div @Author:PRIYA25DEC13**************/
var suppPurItemCry;
function get_more_crystal_div(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertGetMoreCrystalDiv;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertGetMoreCrystalDiv() {
    var crysmin = crystalCount - 1;
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (crystalPanel == 'suppPayPanel') {
            document.getElementById("suppCrystal" + crysmin).value = 'false';
            document.getElementById("suppNwOrCry" + crystalCount).innerHTML = xmlhttp.responseText;
        } else if (crystalPanel == 'nwOrCryUp') {
            //document.getElementById("suppCrystal" + crysmin).value = 'false'; 
            document.getElementById("newOrderCry" + crystalCount).innerHTML = xmlhttp.responseText;
        } else if (crystalPanel == 'suppCryAddPanel') {
            //document.getElementById("suppCrystalDiv" + crystalCount).value = 'false'; 
            document.getElementById("suppNewOrderCry" + crystalCount).innerHTML = xmlhttp.responseText;
        } else if (crystalPanel == 'AddStock') {
            document.getElementById("noOfCry").value = getCrystalDiv;
            document.getElementById("crystalDiv" + crysmin).value = 'false';
            document.getElementById("addStockCry" + crystalCount).innerHTML = xmlhttp.responseText;
        } else if (crystalPanel == 'CustSell') {
            document.getElementById("crystalDiv" + crysmin).value = 'false';
            document.getElementById("custSellCrystalDiv" + crystalCount).innerHTML = xmlhttp.responseText;
        } else if (crystalPanel == 'NewOrder') {
            document.getElementById("crystalDiv" + crysmin).value = 'false';
            document.getElementById("newOrderCry" + crystalCount).innerHTML = xmlhttp.responseText;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/****************Start code to add panels @Author:PRIYA27SEP14******************/
function getMoreCrystalDiv(cryCount, panelName) {

    crystalPanel = panelName;
    crystalCount = cryCount;
    if (crystalCount != '') {
        getCrystalDiv = crystalCount;
    }
    var poststr = "crystalDivCount=" + crystalCount
            + "&panelName=" + panelName;
    if (panelName == 'suppPayPanel') {
        get_more_crystal_div('include/php/ogwpcydv' + default_theme + '.php', poststr);
    } else if (panelName == 'nwOrCryUp') {
        get_more_crystal_div('include/php/ognoupcy' + default_theme + '.php', poststr);
    } else if (panelName == 'suppCryAddPanel' || panelName == 'CustSell') {
        get_more_crystal_div('include/php/ogncmndv' + default_theme + '.php', poststr);
    } else if (panelName == 'AddStock') {
        get_more_crystal_div('include/php/ogiscydv' + default_theme + '.php', poststr);
    } else if (panelName == 'NewOrder') {
        get_more_crystal_div('include/php/ogncmnsd' + default_theme + '.php', poststr);
    }
    return false;
}
/****************End code to add panels @Author:PRIYA27SEP14******************/
/************End code to add panelName @Author: @Author:PRIYA25DEC13******************/
/************End code to get new crystal add div @Author:PRIYA30SEP13******************/
/************Start code to close crystal add div @Author:PRIYA06DEC13******************/
function closeMoreCrystalDiv(cryCount, panelName) {

    crystalPanel = panelName;
    var crysmin = cryCount - 1;
    var d = crystalCount - 1;
    var a = d - 1;
    if (crystalPanel == 'suppPayPanel') {
        document.getElementById("suppPaydel" + cryCount).value = 'Deleted';
        if ((a == crysmin || d == crysmin) && crysmin != 0) {
            if (document.getElementById("suppPaydel" + crysmin).value != 'Deleted') {
                document.getElementById("suppCrystal" + crysmin).value = 'true';
            }
        }
        if (crysmin == 0) {
            document.getElementById("suppCrystal" + cryCount).value = 'true';
        }
        document.getElementById("suppPayCrystalDiv" + cryCount).innerHTML = "";
        calcSuppNwOrCrystalPrice('suppNwOr');
    } else if (crystalPanel == 'suppCryAddPanel') {
        document.getElementById("suppNwOrCryDel" + cryCount).value = 'Deleted';
        document.getElementById("suppCrystalAdd" + cryCount).innerHTML = "";
        calcSuppAddCryPrice();
    } else if (crystalPanel == 'AddStock' || crystalPanel == 'SuppPurByItem') {
        document.getElementById("del" + cryCount).value = 'Deleted';
        if ((a == crysmin || d == crysmin) && crysmin != 0) {
            if (document.getElementById("del" + crysmin).value != 'Deleted') {
                document.getElementById("crystalDiv" + crysmin).value = 'true';
            }
        }
        if (crysmin == 0) {
            document.getElementById("crystalDiv" + cryCount).value = 'true';
        }
        document.getElementById("crystal" + cryCount).innerHTML = "";
        calcStockCryPrice();
    } else if (crystalPanel == 'SellPanel') {
        document.getElementById("del" + cryCount).value = 'Deleted';
        document.getElementById("crystal" + cryCount).innerHTML = "";
        calcSellCryPrice();
    } else if (crystalPanel == 'CustSell') {
        document.getElementById("del" + cryCount).value = 'Deleted';
        if ((a == crysmin || d == crysmin) && crysmin != 0) {
            if (document.getElementById("del" + crysmin).value != 'Deleted') {
                document.getElementById("crystalDiv" + crysmin).value = 'true';
            }
        }
        if (crysmin == 0) {
            document.getElementById("crystalDiv" + cryCount).value = 'true';
        }
        document.getElementById("crystal" + cryCount).innerHTML = "";
        calcCustSellCryPrice();
    } else if (crystalPanel == 'NewOrder') {
        document.getElementById("del" + cryCount).value = 'Deleted';
        if ((a == crysmin || d == crysmin) && crysmin != 0) {
            if (document.getElementById("del" + crysmin).value != 'Deleted') {
                document.getElementById("crystalDiv" + crysmin).value = 'true';
            }
        }
        if (crysmin == 0) {
            document.getElementById("crystalDiv" + cryCount).value = 'true';
        }
        document.getElementById("crystal" + cryCount).innerHTML = "";
        calcNwOrCrystalPrice();
    }
}
/************End code to add stock div @Author:PRIYA10DEC13**************/
/************End code to close crystal add div @Author:PRIYA11OCT13******************/
/************End code to get new crystal add div @Author:PRIYA23SEP13******************/
/***********Start code to get new order div @Author:PRIYA19SEP13*************/
/***********Start code to add panel @Author:PRIYA28SEP13*************/
function getNewOrderDiv(custId, panelName)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowLoadDiv").style.visibility = "hidden";
            document.getElementById("newOrderDivs").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowLoadDiv").style.visibility = "visible";
        }
    };
    if (panelName == 'AddOrder') {
        xmlhttp.open("GET", "include/php/ognoiadv" + default_theme + ".php?custId=" + custId, true);
    } else if (panelName == 'PendingOrder' || panelName == 'OrdersList' || panelName == 'PendingList') {
        xmlhttp.open("GET", "include/php/ognostlt" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName, true);
    } else if (panelName == 'LayoutPanel') {
        xmlhttp.open("GET", "include/php/ognolayt" + default_theme + ".php?custId=" + custId, true);
    }
    xmlhttp.send();
}
/***********End code to add panel @Author:PRIYA28SEP13*************/
/***********Start code to add function for cust Inv Layout @Author:PRIYA23SEP13*************/
/***********Start code to add custId @Author:PRIYA07OCT13*************/
var layoutSelect;
function change_cust_invoice_layout(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertChangeCustInvoiceLayout;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertChangeCustInvoiceLayout() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadShowLoadDiv").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        window.setTimeout(closeMessDisplayDiv, 1000);
    } else {
        document.getElementById("ajaxLoadShowLoadDiv").style.visibility = "visible";
    }
}
function closeMessDisplayDiv() {
    document.getElementById("nwOrMessDisplayDiv").innerHTML = "";
}
function changeCustInvoiceLayout(custId) {
    confirm_box = confirm("Are You Sure To Change Layout!");
    var custInvoiceValue;
    var custInvoice = document.getElementsByName('custInvoiceLay');
    for (var i = 0; i < custInvoice.length; i++) {
        if (custInvoice[i].checked == true)
            custInvoiceValue = custInvoice[i].value;
    }
    if (confirm_box == true)
    {
        poststr = "custInvLay=" + encodeURIComponent(custInvoiceValue) +
                "&custId=" + encodeURIComponent(custId);
    } else {
        poststr = "getStatusDiv=" + 'laySelectcancel' +
                "&custId=" + encodeURIComponent(custId);
    }
    change_cust_invoice_layout('include/php/ognolyad' + default_theme + '.php', poststr);
}
/***********End code to add custId @Author:PRIYA07OCT13*************/
/***********End code to add function for cust Inv Layout  @Author:PRIYA23SEP13*************/
/***********Start code to get New Order Update div @Author:PRIYA30JAN14*************/
/***********Start code to add div @Author:PRIYA16JUL14********************/
/***********Start code to change filename for order panel @Author:SANT02MAR17********************/
function getNewOrderUpdateItemDiv(custId, nworId, panelName, mainPanel, PayPanelName) {
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
    } else if (panelName == 'NwOrDetUpPanel') {
        xmlhttp.open("POST", "include/php/ognomndv" + default_theme + ".php?itemPanel=" + panelName + "&custId=" + custId + "&nworId=" + nworId + "&PayPanelName=" + PayPanelName, true);
    } else {
        xmlhttp.open("POST", "include/php/ognoiadv" + default_theme + ".php?itemPanel=" + panelName + "&custId=" + custId + "&nworId=" + nworId + "&PayPanelName=" + PayPanelName, true);
    }
    xmlhttp.send();
}
/***********End code to change filename for order panel @Author:SANT02MAR17********************/
/***********End code to add div @Author:PRIYA16JUL14********************/
/***********End code to get New Order Update div @Author:PRIYA30JAN14*************/
/***********Start code to hide dropdown @Author:PRIYA24SEP13*************/
//function hideDiv(keyCode){ 
//    if (keyCode == 40 || keyCode == 38) {
//        document.getElementById('custCityForAddGirviSelect').focus();
//        document.getElementById('custCityForAddGirviSelect').options[0].selected = true;
//    }else{ 
//        document.getElementById("cityListDivToAddNewCust").innerHTML = '';  
//    }
//}
/***********End code to hide dropdown @Author:PRIYA24SEP13*************/

/***********Start to add code for item repair panel @AUTHOR: SANDY07JAN14*****************/
/***********Start to add code for item repair panel @AUTHOR: SANDY7NOV13*****************/
/***********Start code to get Metal rate value @Author:PRIYA27SEP13*************/
/**********Start to add code for add raw metal Panel @AUTHOR: SANDY1OCT13********************/
/**********Start to add panel Name for supp @Author:PRIYA12OCT13********************/
/**********Start to add panel Name for supp @Author:PRIYA12OCT13********************/
/**********Start code to add div for add stock @Author:PRIYA08NOV13************************/
/**********Start code to add div for sellPurchase @Author:PRIYA18JAN14************************/
/****Start to change function to add condition for raw stock panel @OMMODTAG SHE02APR16*****/
function getMetRateValue(metalId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (panelName == 'sellRawStockMetRate') {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("sellRawMetRateValue").innerHTML = xmlhttp.responseText;
                calSellVal();
            }
        } else if (panelName == 'ItemRepairMetRate') {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("itemRepMetRateValue").innerHTML = xmlhttp.responseText;
                calculateValuation();
            }
        } else {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("nwOrMetRateValue").innerHTML = xmlhttp.responseText;
                if (panelName == 'SuppOrderMetRate') {
                    calcSuppOrderItemPrice();
                } else if (panelName == 'addStockItemMetalId') {
                    calculatePrice();
                } else if (panelName == 'slPrItemMetalRateId') {
                    calculateSellPrice();
                } else if (panelName == 'slItemMetalRateId') {
                    calculateCustSellPrice();
                } else if (panelName == 'nwOrItemMetalId') {
                    calcNwOrItemPrice();
                } else if (panelName == 'addRawStockMetalId') {
                    showMetalRateWithTax(metalId, 'addRawStock');
                    calRawMetalFinVal();
                }
            }
        }
    };
    xmlhttp.open("POST", "include/php/ognomtrt" + default_theme + ".php?metalId=" + metalId + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/****End to change function to add condition for raw stock panel @OMMODTAG SHE02APR16*****/
/**********End code to add div for sellPurchase @Author:PRIYA18JAN14************************/
/**********End code to add div for add stock @Author:PRIYA08NOV13************************/
/**********End to add panel Name for supp @Author:PRIYA12OCT13********************/
/**********End to add panel Name for supp @Author:PRIYA12OCT13********************/
/**********End to add code for add raw metal Panel @AUTHOR: SANDY1OCT13********************/
/***********End code to get Metal rate value @Author:PRIYA27SEP13*************/
/***********End to add code for item repair panel @AUTHOR: SANDY7NOV13*****************/
/**********End to add code for item repair panel @AUTHOR: SANDY07JAN14*****************/
/***********Start code To get Crystal List @Author:PRIYA25SEP13**************/
/***********Start code To add panel name @Author:PRIYA04DEC13**************/
/***********Start code To add panel name @Author:PRIYA13SEP14**************/
/***********Start code To add panel name @Author:SANT10FEB17**************/
function showCrystalList(searchvalue, keyCodeInput, panelName, crystalCount, userPanel, documentRootPath, itemType, itemCat, formPanel) {

//     alert('itemType ==' + itemCat);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if ((panelName == 'NewOrderCrystalId' || panelName == 'suppNwOrCrystalId' || panelName == 'addStockCrystalId' ||
                    panelName == 'slPrCryId' || panelName == 'sellCrystalId' || panelName == 'addItemCryId' || panelName == 'addStockCrystalId')
                    && (itemCat !== 'existing_stone')) {
                document.getElementById("cryIdSelectDiv" + crystalCount).innerHTML = xmlhttp.responseText;
            } else if (itemCat == 'existing_stone') {
                document.getElementById("cryIdSelectExistingDiv" + crystalCount).innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("cryNameSelectDiv" + crystalCount).innerHTML = xmlhttp.responseText;
            }
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('cryIdListToSel').focus();
                document.getElementById('cryIdListToSel').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ognocylt" + default_theme + ".php?panelName=" + panelName + "&crystalCount=" + crystalCount + "&userPanel=" + userPanel
            + "&searchvalue=" + searchvalue + "&itemType=" + itemType + "&itemCat=" + itemCat + "&formPanel=" + formPanel, true);
    xmlhttp.send();
}
/***********End code To add panel name @Author:SANT10FEB17**************/
/***********End code To add panel name @Author:SANT10FEB17**************/
function showCrystalListCrystalRates(searchvalue, keyCodeInput, panelName, crystalCount, userPanel, documentRootPath, itemType, itemCat) {

//     alert('itemType ==' + itemCat);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'crystalSelectId') {
                document.getElementById("crystalIdSelectDiv").innerHTML = xmlhttp.responseText;
            }
//            else if (itemCat == 'existing_stone') {
//                document.getElementById("cryIdSelectExistingDiv" + crystalCount).innerHTML = xmlhttp.responseText;
//            } else {
//                document.getElementById("cryNameSelectDiv" + crystalCount).innerHTML = xmlhttp.responseText;
//            }
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('cryIdListToSel').focus();
                document.getElementById('cryIdListToSel').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ognocylt" + default_theme + ".php?panelName=" + panelName + "&crystalCount=" + crystalCount + "&userPanel=" + userPanel
            + "&searchvalue=" + searchvalue + "&itemType=" + itemType + "&itemCat=" + itemCat, true);
    xmlhttp.send();
}
//
//
function setCrystalDetails(crystalId, crystalCount, documentRootPath, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            var strArray = str.split("*");
//            alert('10' + strArray[2]);
            if (xmlhttp.responseText != 0) {

                if (panelName == 'slPrCryId') {
//            if (strArray[0] != '' || strArray[0] != null) {
//                document.getElementById('sttr_purchase_rate'+crystalCount).value = strArray[0];
//            }
                    //
                    if (strArray[1] != '' || strArray[1] != null) {
                        document.getElementById('slPrCryRate' + crystalCount).value = strArray[1];
                    }
                    //
                    if (strArray[2] != '' || strArray[2] != null) {
                        document.getElementById('slPrCryRateType' + crystalCount).value = strArray[2];
                    }
                    //
                    if (strArray[3] != '' || strArray[3] != null) {
                        document.getElementById('slPrCryClarity' + crystalCount).value = strArray[3];
                    }
                    //

                    if (strArray[4] != '' || strArray[4] != null) {
                        document.getElementById('slPrCryColor' + crystalCount).value = strArray[4];
                    }
                    //
                    if (strArray[5] != '' || strArray[5] != null) {
                        document.getElementById('sttr_shape' + crystalCount).value = strArray[5];
                    }
                    //
                    if (strArray[6] != '' || strArray[6] != null) {
                        document.getElementById('slPrCryName' + crystalCount).value = strArray[6];
                    }
                } else {
                    if (strArray[0] != '' || strArray[0] != null) {
                        document.getElementById('sttr_purchase_rate' + crystalCount).value = strArray[0];
                    }
                    //
                    if (strArray[1] != '' || strArray[1] != null) {
                        document.getElementById('sttr_sell_rate' + crystalCount).value = strArray[1];
                    }
                    //
                    if (strArray[2] != '' || strArray[2] != null) {
                        document.getElementById('sttr_sell_rate_type' + crystalCount).value = strArray[2];
                    }
                    //
                    if (strArray[3] != '' || strArray[3] != null) {
                        document.getElementById('sttr_clarity' + crystalCount).value = strArray[3];
                    }
                    //

                    if (strArray[4] != '' || strArray[4] != null) {
                        document.getElementById('sttr_color' + crystalCount).value = strArray[4];
                    }
                    //
                    if (strArray[5] != '' || strArray[5] != null) {
                        document.getElementById('sttr_shape' + crystalCount).value = strArray[5];
                    }
                    //
                    if (strArray[6] != '' || strArray[6] != null) {
                        document.getElementById('sttr_item_name' + crystalCount).value = strArray[6];
                    }
                    //
                    if (strArray[7] != '' || strArray[7] != null) {
                        var selectElement = document.getElementById('sttr_purchase_rate_type' + crystalCount);
                        var options = selectElement.options;

                        for (var i = 0; i < options.length; i++) {
                            if (options[i].value.trim() == strArray[7].trim()) {
                                selectElement.selectedIndex = i;
                                break;
                            }
                        }
                    }


                }
            }
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omsetcrystalratesdetails" + default_theme + ".php?crystalId=" + crystalId, true);
    xmlhttp.send();
}
//
/***********End code To add panel name @Author:SANT10FEB17**************/
function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32)
        return false;
}
function crystalPanelBlank(div) {
    document.getElementById(div).innerHTML = '';
}
/***********End code To add panel name @Author:PRIYA13SEP14**************/
/***********End code To add panel name @Author:PRIYA04DEC13**************/
/***********End code To add panel name @Author:PRIYA25SEP13**************/

/***********Start code to get Supp New Order Div @Author:PRIYA29SEP13*************/
function navigateToSuppNwOrDiv(suppId, custOrderStatus) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (custOrderStatus == 'OrderTransferred') {
        xmlhttp.open("POST", "include/php/ogwhmndv" + default_theme + ".php?suppId=" + suppId + "&suppPanelOption=" + 'SuppNewOrder', true);
    } else {
        xmlhttp.open("POST", "include/php/ogwhmndv" + default_theme + ".php?suppId=" + suppId + "&suppPanelOption=" + 'PendingOrder', true);
    }
    xmlhttp.send();
}
/***********End code to get Supp New Order Div  @Author:PRIYA29SEP13*************/
/***********Start code to add Supp crystal add Div @Author:PRIYA30SEP13*************/
/***********Start code to add div for stock @Author:PRIYA15NOV13******************/
/***********Start code remove stock div @Author:PRIYA25NOV13******************/
function showSuppNwOrCrystalAddDiv(panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("suppNwOrCrystalAddDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogncmndv" + default_theme + ".php?panelName=" + panelName, true);
    xmlhttp.send();
}
/***********End code remove stock div @Author:PRIYA25NOV13******************/

/***********End code to add div for stock @Author:PRIYA15NOV13******************/
/***********End code to add Supp crystal add Div @Author:PRIYA30SEP13*************/

/***********Start code to get Crystal Details @Author:PRIYA30SEP13*************/
/***********Start code to add panel name @Author:PRIYA12OCT13*************/
/***********Start code to add stock div @Author:PRIYA09NOV13****************/
function getCryDet(cryId, cryCount, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'suppCryAddPanel') {
                document.getElementById("suppNewOrderCry" + cryCount).innerHTML = xmlhttp.responseText;
            } else if (panelName == 'suppPayPanel') {
                document.getElementById("suppNwOrCry" + cryCount).innerHTML = xmlhttp.responseText;
            } else if (panelName == 'AddStock') {
                document.getElementById("addStockCry" + cryCount).innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("newOrderCry" + cryCount).innerHTML = xmlhttp.responseText;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogncmndv" + default_theme + ".php?cryId=" + cryId + "&crystalDivCount=" + cryCount + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/***********End code to add stock div @Author:PRIYA09NOV13****************/
/***********End code to add panel name @Author:PRIYA12OCT13*************/
/***********End code to get Crystal Details @Author:PRIYA30SEP13*************/
/***********Start code to get Supp Pay crystal div @Author:PRIYA12OCT13*************/
function showSuppPayCrystalAddDiv(panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("suppNwOrCrystalAddDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogncmndv" + default_theme + ".php?panelName=" + panelName, true);
    xmlhttp.send();
}
/***********End code to get Supp Pay crystal div @Author:PRIYA12CT13*************/
/***********Start code to Payment Panel div @Author:PRIYA04OCT13*************/
function getsuppNwOrPayDiv(suppOrId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwhiadv" + default_theme + ".php?suppNwOrId=" + suppOrId + "&panelName=" + 'suppUpdateStock', true);
    xmlhttp.send();
}
/***********End code to Payment Panel div @Author:PRIYA04OCT13*************/

/**********Start code to add item to payment panel @Author:PRIYA16OCT13***************/
/**********Start code to add item to payment panel @Author:SANT03SEP16***************/
function addItemToPayment(documentRoot, suppPayId, suppPayDelvId, suppId, preInvNo, postInvNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (suppPayDelvId != '')
        var payPanel = 'SuppOrderDeliveryUp';
    else
        payPanel = 'SuppOrderDelivery';

    xmlhttp.open("POST", "include/php/ogwpydlv" + default_theme + ".php?suppPayId=" + suppPayId + "&paymentPanelName=" + payPanel + "&suppId=" + suppId + "&preInvNo=" + preInvNo + "&postInvNo=" + postInvNo, true);
    xmlhttp.send();
}
/**********End code to add item to payment panel @Author:SANT03SEP16***************/
/**********End code to add item to payment panel @Author:PRIYA16OCT13***************/
/**********Start code to add get exttra or left amnt in supp item deliver Panel @Author:PRIYA14OCT13***************/
function getExtraWt(sporId, itemDelverWt, itemDelverWtType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itDlvrWtDiv" + sporId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwpdrwt" + default_theme + ".php?sporId=" + sporId + "&itemDelverWt=" + itemDelverWt + "&itemDelverWtType=" + itemDelverWtType, true);
    xmlhttp.send();
}
/**********End code to add get exttra or left amnt in supp item deliver Panel @Author:PRIYA14OCT13***************/
/**********Start code to add func for supp order delv @Author:PRIYA14OCT13***************/
function add_order_to_delievery(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddOrderToDelievery;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertAddOrderToDelievery() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("suppPayDiv").innerHTML = xmlhttp.responseText;
        window.setTimeout(closeMessDivDelay, 1000);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function closeMessDivDelay()
{
    document.getElementById("messDisplayDiv").innerHTML = '';
}
function addOrderToDelievery(sporId) {

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    confirm_box = confirm("Do You Really Want To Save the result?");
    if (confirm_box == true)
    {
        var poststr = "sporId=" + encodeURIComponent(sporId)
                + "&omgSuppId=" + encodeURIComponent(document.getElementById("suppId").value)
                + "&omgSpOrPreInvNo=" + encodeURIComponent(document.getElementById("preInvNo").value)
                + "&omgSpOrPostInvNo=" + encodeURIComponent(document.getElementById("postInvNo").value)
                + "&omgSpOrPayId=" + encodeURIComponent(document.getElementById("payId").value)
                + "&omgSpOrDvMetType=" + encodeURIComponent(document.getElementById("spOrDvMetalType").value)
                + "&omgSpOrDvItemName=" + encodeURIComponent(document.getElementById("spOrDvItemName" + sporId).value)
                + "&omgSpOrDvItemQty=" + encodeURIComponent(document.getElementById("spOrDvItemQty" + sporId).value)
                + "&omgSpOrDvReqGdWt=" + encodeURIComponent(document.getElementById("spOrDvReqGdWt").value)
                + "&omgSpOrDvReqGdWtType=" + encodeURIComponent(document.getElementById("spOrDvReqGdWtType").value)
                + "&omgSpOrDvReqSrWt=" + encodeURIComponent(document.getElementById("spOrDvReqSrWt").value)
                + "&omgSpOrDvReqSrWtType=" + encodeURIComponent(document.getElementById("spOrDvReqSrWtType").value)
                + "&omgSpOrDvReqCash=" + encodeURIComponent(document.getElementById("spOrDvReqCashRec").value)
                + "&omgSpOrDvItemNtWt=" + encodeURIComponent(document.getElementById("spOrDvItemNtWt" + sporId).value)
                + "&omgSpOrDvItemNtWtType=" + encodeURIComponent(document.getElementById("spOrDvItemNtWtType" + sporId).value)
                + "&omgSpOrDvTotRecWt=" + encodeURIComponent(document.getElementById("spOrDvPayGdFnWt").value)
                + "&omgSpOrDvTotRecWtType=" + encodeURIComponent(document.getElementById("spOrDvPayGdFnWtType").value)
                + "&omgSpOrDvPayTunch=" + encodeURIComponent(document.getElementById("spOrDvPayGdTunch").value)
                + "&omgSpOrDvPayFnWt=" + encodeURIComponent(document.getElementById("spOrDvPayTotGdFnWt").value)
                + "&omgSpOrDvPayMetRate=" + encodeURIComponent(document.getElementById("spOrDvPayGdRate").value)
                + "&omgSpOrDvPayGdVal=" + encodeURIComponent(document.getElementById("spOrDvPayGdVal").value)
                + "&omgSpOrDvPayTotAmtBal=" + encodeURIComponent(document.getElementById("spOrDvPayTotAmtBal").value)
                + "&omgInvDvId=" + encodeURIComponent(document.getElementById("invDvId").value);
    }
    add_order_to_delievery('include/php/ogwpdlad' + default_theme + '.php', poststr);
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    return true;
}
/**********End code to add func for supp order delv @Author:PRIYA14OCT13***************/
/**********End code to add func for supp order delv @Author:PRIYA08OCT13***************/
/**********Start code to add func for supp order delv @Author:PRIYA09OCT13***************/
function changeSpOrDvItemWtType(wtType, sporId, keyCodeInput, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'reqPanel') {
                document.getElementById("reqWtSelectDiv").innerHTML = xmlhttp.responseText;
                if (keyCodeInput == 40 || keyCodeInput == 38) {
                    document.getElementById('spOrDvReqGdWtType').focus();
                    document.getElementById('spOrDvReqGdWtType').options[0].selected = true;
                }
            } else {
                document.getElementById("wtSelectDiv" + sporId).innerHTML = xmlhttp.responseText;
                if (keyCodeInput == 40 || keyCodeInput == 38) {
                    document.getElementById('spOrDvItemNtWtTypeSelect' + sporId).focus();
                    document.getElementById('spOrDvItemNtWtTypeSelect' + sporId).options[0].selected = true;
                }
            }

        }
    };
    xmlhttp.open("POST", "include/php/ogwodcwt" + default_theme + ".php?wtType=" + wtType + "&sporId=" + sporId + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/**********End code to add func for supp order delv @Author:PRIYA09OCT13***************/
/**********Start code to add func for supp order delv @Author:PRIYA11OCT13***************/
function changeTunch(tunchVal, metType, invDvId, sporId, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("tunchSelectDiv").innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('spOrDvTunchSelect').focus();
                document.getElementById('spOrDvTunchSelect').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogwodtsl" + default_theme + ".php?tunchVal=" + tunchVal + "&metType=" + metType + "&invDvId=" + invDvId + "&sporId=" + sporId, true);
    xmlhttp.send();
}
/**********End code to add func for supp order delv @Author:PRIYA11OCT13***************/
/**********Start code to add func  @Author:PRIYA15OCT13***************/
function checkBal(cash, bal) {

    var cashAmt = parseFloat(cash);
    var balance = parseFloat(bal);
    if (cashAmt > balance) {
        confirm_box = confirm("Cash is More than Balance!\nDo You Really Want To Continue?");
        if (confirm_box == true)
        {
            document.getElementById('nwOrPayCardType').focus();
            document.getElementById('checkBalVal').value = 'yes';
        } else {
            document.getElementById('nwOrPayCashAmount').focus();
            document.getElementById('checkBalVal').value = 'no';
        }
    }
    return true;
}
/**********End code to add func  @Author:PRIYA15OCT13***************/
/**********Start Code To validate DD Date @Author:PRIYA18NOV13*******/
function valDailyDiaryInputs() {
    if (validateSelectField(document.getElementById('dailyDiaryFromDay').value, "Please Select Start Day!") == false) {
        document.getElementById('dailyDiaryFromDay').focus();
        return false;
    } else if (validateSelectField(document.getElementById('dailyDiaryFromMonth').value, "Please Select Start Month!") == false) {
        document.getElementById('dailyDiaryFromMonth').focus();
        return false;
    } else if (validateSelectField(document.getElementById('dailyDiaryFromYear').value, "Please Select Start Year!") == false) {
        document.getElementById('dailyDiaryFromYear').focus();
        return false;
    } else if (validateSelectField(document.getElementById('dailyDiaryToDay').value, "Please Select End Day!") == false) {
        document.getElementById('dailyDiaryToDay').focus();
        return false;
    } else if (validateSelectField(document.getElementById('dailyDiaryToMonth').value, "Please Select End Month!") == false) {
        document.getElementById('dailyDiaryToMonth').focus();
        return false;
    } else if (validateSelectField(document.getElementById('dailyDiaryToYear').value, "Please Select End Year!") == false) {
        document.getElementById('dailyDiaryToYear').focus();
        return false;
    }
    return true;
}
/**********End Code To validate DD Date @Author:PRIYA18NOV13*******/
/*******Start Code To add function in daily diary @Author:PRIYA24OCT13********/
function showDDRelLoanDet(documentRootPath, gTransId, panelName, todayDate, firmId, gFirmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('loanDetailsDiv' + gTransId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById('loanDetailsDiv' + gTransId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omddtgrl" + default_theme + ".php?gTransId=" + gTransId + "&panelDDDetClick=" + panelName + "&todayDate=" + todayDate + "&firmId=" + firmId + "&gFirmId=" + gFirmId, true);
    xmlhttp.send();
}
/*******End Code To add function in daily diary @Author:PRIYA24OCT13********/
/*******Start Code To add function to add fn to close div in daily diary @Author:PRIYA22OCT13********/
function closeDDRelLoanDet(gTransId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('loanDetailsDiv' + gTransId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById('loanDetailsDiv' + gTransId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/*******Start Code To add function to add fn to close div in daily diary @Author:PRIYA22OCT13********/
/*************Start code to add DD Details @Author:PRIYA23OCT13**************/
/*************start code to add date @Author:PRIYA18NOV13***************/
/*************start code to change div @Author:PRIYA14DEC13***************/
/*************Start code to add div @Author:PRIYA29APR14***************/
function showDDDetails(ddDetVal, firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, ddPanelToShow, detailPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("dailyDiaryDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var dailyDiaryFromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
    var dailyDiaryToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
    xmlhttp.open("POST", "include/php/omddddandv" + default_theme + ".php?ddDetVal=" + ddDetVal + "&firmId=" + firmId + "&dailyDiaryFromDate=" + dailyDiaryFromDate +
            "&dailyDiaryToDate=" + dailyDiaryToDate + "&ddPanelToShow=" + ddPanelToShow + "&detailPanel=" + detailPanel, true);
    xmlhttp.send();
}
//
function showDDDetailsCust(ddDetVal, firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, ddPanelToShow, detailPanel, custId, ddMainPanel) {
    //alert(ddMainPanel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (ddMainPanel == 'custAccLedgerDayBook' || ddMainPanel == 'custAccLedger') {
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            } else {
                //document.getElementById("dailyDiaryDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var dailyDiaryFromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
    var dailyDiaryToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
    xmlhttp.open("POST", "include/php/omddddandv" + default_theme + ".php?ddDetVal=" + ddDetVal + "&firmId=" + firmId + "&dailyDiaryFromDate=" + dailyDiaryFromDate +
            "&dailyDiaryToDate=" + dailyDiaryToDate + "&ddPanelToShow=" + ddPanelToShow + "&detailPanel=" + detailPanel + "&custId=" + custId + "&ddMainPanel=" + ddMainPanel, true);
    xmlhttp.send();
}
/*************End code to add div @Author:PRIYA29APR14***************/
/*************End code to change div @Author:PRIYA14DEC13***************/
/*************End code to add date @Author:PRIYA18NOV13***************/
/*************End code to add DD Details @Author:PRIYA23OCT13**************/
/**************Start code to get trmasactional panel @Author:PRIYA27OCT13*************/
function getTransPanel(transId, transCat) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omtatrnd" + default_theme + ".php?transId=" + transId + "&transactionCat=" + transCat, true);
    xmlhttp.send();
}
/**************End code to get trmasactional panel @Author:PRIYA27OCT13*************/
/*************Start to add alter function TO PASS GIRVI ID @AUTHOR: SANDY04JAN14******************/
/*************Start to add alter function @AUTHOR: SANDY12DEC13******************/
function deleteTransGirvi(girviTransId, panelName, selFirmId, sortKeyword, pageNo, searchColumn, searchValue, selTFirmId, gTransStatus, girviId, prinType) {
    confirm_box = confirm("Do you really want to Delete?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
                window.setTimeout(closeTransGirviDetails, 1000);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/olggtrgl" + default_theme + ".php?girviTransId=" + girviTransId + "&panelName=" + panelName +
                "&page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&selTFirmId=" + selTFirmId + "&gTransStatus=" + gTransStatus + "&girviId=" + girviId + "&prinType=" + prinType, true); //change in filename @AUTHOR: SANDY20NOV13
        xmlhttp.send();
        function closeTransGirviDetails()
        {
            document.getElementById("ajaxLoadGirviDetailsDiv").innerHTML = "";
        }
    }
}
/*************End to add alter function @AUTHOR: SANDY12DEC13******************/
/*************Start to add alter function TO PASS GIRVI ID @AUTHOR: SANDY04JAN14******************/
/**************End code to add function to delete trans girvi @Author:PRIYA31OCT13***************/
/**************Start code to get sell Purchase Lay Panel @Author:PRIYA07NOV13***********/
/**************Start code to change div @Author:PRIYA05JUN14******************/
//  Start code to add customize crystal invoice tab @Author:SHE04MAR15
function getSlPrLayPanel(layoutPanel)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (layoutPanel == 'soldOutList')
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
            else
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (layoutPanel == 'soldOutList')
        xmlhttp.open("GET", "include/php/ogspsblt" + default_theme + ".php?layoutPanel=" + layoutPanel, true);
    else if (layoutPanel == 'CrystalSoldOutList')
        xmlhttp.open("GET", "include/php/ogcrcufm" + default_theme + ".php?layoutPanel=" + layoutPanel, true);
    else
        xmlhttp.open("GET", "include/php/ogspspdv" + default_theme + ".php?layoutPanel=" + layoutPanel, true);
    xmlhttp.send();
}
//  End code to add customize crystal invoice tab @Author:SHE04MAR15
/**************End code to change div @Author:PRIYA05JUN14******************/
/**************End code to get sell Purchase Lay Panel @Author:PRIYA07NOV13***********/
/**************Start code to get sell Purchase Update INV options @Author:PRIYA07NOV13***********/
function updateSlPrInvDet(headerTop, headerTopValue, custDetTop, custDetTopValue, itemDetTop, itemDetTopValue, termsTop, termsTopValue,
        termsContents, termsContentsValue, panelName, slPrValueAdded, slPrValueAddedValue)
{
    confirm_box = confirm("Do you really want to Update?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                window.setTimeout(closeMessDetails, 1000);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        var postStr = 'panelName=' + panelName + '&headerTop=' + headerTop + '&headerTopValue=' + headerTopValue +
                '&custDetTop=' + custDetTop + '&custDetTopValue=' + custDetTopValue + '&itemDetTop=' + itemDetTop + '&itemDetTopValue=' + itemDetTopValue +
                '&termsTop=' + termsTop + '&termsTopValue=' + termsTopValue + '&termsContents=' + termsContents + '&termsContentsValue=' + termsContentsValue +
                '&slPrValueAdded=' + slPrValueAdded + '&slPrValueAddedValue=' + slPrValueAddedValue;
        xmlhttp.open("GET", "include/php/ombcbcup" + default_theme + ".php?" + postStr, true);
        xmlhttp.send();
    }
    function closeMessDetails()
    {
        document.getElementById("messDisplayDiv").innerHTML = "";
    }
}
/**************End code to get sell Purchase Update INV options @Author:PRIYA07NOV13***********/
function update_roi(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertUpdateRoi;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/********Start to change function to pass response in correct div as per panel name @AUTHOR: SANDY27NOV13************/
function alertUpdateRoi() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        if (updateRoiValPanelName == 'mlLoanInfo' || updateRoiValPanelName == 'mlLoanUpdate') {
            document.getElementById("mnyLender_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        }
        document.getElementById("selROIChangeDiv").style.visibility = "visible";
        window.setTimeout(closeselROIOptChangeDiv, 1000);
    }
}
/********End to change function to pass response in correct div as per panel name @AUTHOR: SANDY27NOV13************/
function closeselROIOptChangeDiv()
{
    document.getElementById("selROIChangeDiv").style.visibility = "hidden";
}
/*********Start code to change message @Author:PRIYA11SEP13*********/
/*********Start code to get roi value by roi id @Author:PRIYA18NOV13****************/
/********Start to change function to set global var value as panel name @AUTHOR: SANDY27NOV13************/
/********Start code to add var for sys log @Author:PRIYA02JUL14**********************/
/***********Start code to add panelName @Author:PRIYA12NOV14********************/
/***********Start code to add AuctionPanel @Author:ANUJA30MAY15********************/
/*********Start code to call function calcLoanInt @OMMODTAG SHRI_24OCT15****************/
var updateRoiValPanelName;
function getROIValById(documentRootPath, roiId, girviId, custId, panelName, intType, girviDOB, girviFirmId, girviSerialNum, auctionPanel) {
    updateRoiValPanelName = panelName;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("roiSelDiv").innerHTML = xmlhttp.responseText;
            if (panelName != 'AddNewGirvi' && panelName != 'MoneyLenderLoan' && panelName != 'AddUdhaarEMI' && panelName != 'AddGirviEMI')       // Check panel name for girvi EMI @OMMODTAG SHRI_24OCT15
                updateRoi(documentRootPath, roiId, girviId, custId, panelName, girviDOB, girviFirmId, girviSerialNum, intType, auctionPanel);
            //document.getElementById('DOBDay').focus();
//            alert(intType);
            if (panelName == 'AddGirviEMI') {
                calcLoanInt(intType);
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
    if (panelName == 'AddUdhaarEMI') {
        xmlhttp.open("POST", "include/php/omroisid" + default_theme + ".php?roiId=" + roiId + "&girviId=" + girviId + "&custId=" + custId +
                "&panelName=" + panelName + "&intType=" + intType + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum, true);
    } else if (panelName == 'AddGirviEMI') {
        xmlhttp.open("POST", "include/php/olfnrsid" + default_theme + ".php?roiId=" + roiId + "&girviId=" + girviId + "&custId=" + custId +
                "&panelName=" + panelName + "&intType=" + intType + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum + "&auctionPanel=" + auctionPanel, true); //change in filename @AUTHOR: SANDY20NOV13 
    } else {
        xmlhttp.open("POST", "include/php/olroisid" + default_theme + ".php?roiId=" + roiId + "&girviId=" + girviId + "&custId=" + custId +
                "&panelName=" + panelName + "&intType=" + intType + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum + "&auctionPanel=" + auctionPanel, true); //change in filename @AUTHOR: SANDY20NOV13 
    }
    xmlhttp.send();
}
/*********End code to call function calcLoanInt @OMMODTAG SHRI_24OCT15****************/
/*********Start code to call function calcLoanInt @OMMODTAG SHRI_24OCT15****************/
function getFinanceROIValById(documentRootPath, roiId, girviId, custId, panelName, intType, girviDOB, girviFirmId, girviSerialNum, auctionPanel) {
//    alert('panelName==' + panelName);
    updateRoiValPanelName = panelName;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("roiSelDiv").innerHTML = xmlhttp.responseText;
            if (panelName != 'AddNewGirvi' && panelName != 'MoneyLenderLoan' && panelName != 'AddUdhaarEMI' && panelName != 'AddGirviEMI')       // Check panel name for girvi EMI @OMMODTAG SHRI_24OCT15
                updateRoi(documentRootPath, roiId, girviId, custId, panelName, girviDOB, girviFirmId, girviSerialNum, intType, auctionPanel);
            //document.getElementById('DOBDay').focus();
//            alert(intType);
            if (panelName == 'AddGirviEMI') {
                calcLoanInt(intType);
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
    if (panelName == 'AddUdhaarEMI') {
        xmlhttp.open("POST", "include/php/omroisid" + default_theme + ".php?roiId=" + roiId + "&girviId=" + girviId + "&custId=" + custId +
                "&panelName=" + panelName + "&intType=" + intType + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum, true);
    } else if (panelName == 'AddGirviEMI') {
        xmlhttp.open("POST", "include/php/olfnrsid" + default_theme + ".php?roiId=" + roiId + "&girviId=" + girviId + "&custId=" + custId +
                "&panelName=" + panelName + "&intType=" + intType + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum + "&auctionPanel=" + auctionPanel, true); //change in filename @AUTHOR: SANDY20NOV13 
    } else {
        xmlhttp.open("POST", "include/php/olroisid_1" + default_theme + ".php?roiId=" + roiId + "&girviId=" + girviId + "&custId=" + custId +
                "&panelName=" + panelName + "&intType=" + intType + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum + "&auctionPanel=" + auctionPanel, true); //change in filename @AUTHOR: SANDY20NOV13 
    }
    xmlhttp.send();
}
/*********End code to call function calcLoanInt @OMMODTAG SHRI_24OCT15****************/
/***********End code to add AuctionPanel @Author:ANUJA30MAY15********************/
/***********End code to add panelName @Author:PRIYA12NOV14********************/
/********End code to add var for sys log @Author:PRIYA02JUL14**********************/
/********Start to change function to set global var value as panel name @AUTHOR: SANDY27NOV13************/
/*********End code to get roi value by roi id @Author:PRIYA18NOV13****************/
/*********Start code to get crystal rate type @Author:PRIYA28NOV13****************/
/*********Start code to add div for sell crystal @Author:PRIYA30JAN14****************/
var cryCount;
var cryPanelName;
function change_cry_rate_typ(url, parameters) {

    loadXMLDoc2();
    xmlhttp2.onreadystatechange = alertChangeCryRateTyp;
    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);
}
/***********Start code to add panel @Author:PRIYA13SEP14**************/
function alertChangeCryRateTyp() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addStockCryRateDiv" + cryCount).innerHTML = xmlhttp2.responseText;
        if (cryPanelName == 'SellPanel') {
            document.getElementById('slPrCryGSWType' + cryCount).focus();
            calcSellCryPrice();
        } else if (cryPanelName == 'CustSellPanel') {
            document.getElementById('sellCryGSWType' + cryCount).focus();
            calcCustSellCryPrice();
        } else if (cryPanelName == 'NewOrder') {
            document.getElementById('nwOrCryGSWType' + cryCount).focus();
            calcNwOrCrystalPrice();
        } else if (cryPanelName == 'addItemCryId') {
            document.getElementById('sttr_gs_weight_type' + cryCount).focus();
            calcItemCryPrice();
        } else if (cryPanelName == 'addRepItemCryId') { // change code to add condition for repair panel @Author: SHRI16DEC14
            document.getElementById('addItemCryGSWTyp' + cryCount).focus();
            calcItemRepCryPrice();
        } else if (cryPanelName == 'RawMetalPanel') {
            document.getElementById('sttr_gs_weight_type' + cryCount).focus();
            calcRawMetalCrystalVal();
        } else {
            document.getElementById('addStockCryGSWType' + cryCount).focus();
            calcStockCryPrice();
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/***********End code to add panel @Author:PRIYA13SEP14**************/
function getCryRateTypByGsWt(wtType, crystalCount, cryRate, cryRateType, panelName, documentRootPath) {
    cryCount = crystalCount;
    cryPanelName = panelName;
    var poststr = "wtType=" + encodeURIComponent(wtType)
            + "&crystalCount=" + encodeURIComponent(crystalCount)
            + "&cryRate=" + encodeURIComponent(cryRate)
            + "&cryRateType=" + encodeURIComponent(cryRateType)
            + "&panelName=" + encodeURIComponent(panelName);
    change_cry_rate_typ(documentRootPath + "/include/php/ogisfndv" + default_theme + ".php", poststr);
}
/********End code to add div for sell crystal @Author:PRIYA30JAN14****************/
/********End code to get crystal rate type @Author:PRIYA28NOV13****************/
/****************Start code to add Func @Author:PRIYA06DEC13*************/
/****************Start code to add page @Author:PRIYA27NOV14**************/
function changeStockMetalRate(metalRateId, itstId, panelName, pageNum) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemDetails").innerHTML = xmlhttp.responseText;
            window.setTimeout(closeMessDispDetails, 1000);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogidsbdv" + default_theme + ".php?metalRateId=" + metalRateId + "&itstId=" + itstId + "&panelName=" + panelName + "&page=" + pageNum, true);
    xmlhttp.send();
}
/****************End code to add page @Author:PRIYA27NOV14**************/
function closeMessDispDetails()
{
    document.getElementById("messUpDisplaydiv").innerHTML = "";
}
/****************End code to add Func @Author:PRIYA06DEC13*************/

/****************Start code to add Func @Author:PRIYA04DEC13*************/
/****************Start code to add panel @Author:PRIYA17NOV14**********************/
/****************Start code to add WholeSalePanel panel @Author:PRIYA26DEC14***********/
/****************Start code to change function @Author:PRIYA14JAN15******************/
/**************** Start to Check For Crystal Purchase Panel by Sheetal  @Author:SHE18FEB15*************/
/****************Start code to add if condition for SearchByLot @Author:PRIYA21FEB15**********/
/****************Start code to add WholeSalePanel condition for passing title @Author:PRIYA25FEB15**********/
/**********Start code to add paymentPanel in ItemSearchPanel for ImitationPurchasePanel @Author:ANUJA25FEB15***************/
/**********Start code to change name according to  Crystalpanel @Author:SHE20MAR15*************/
/**********Start code to change name according to Imitation Panel @Author:GAUR22APR16*************/
function getSellPanel(custId, panelName, sellPanel) {
//    alert(panelName);
    loadXMLDoc();
    var stock = 'STOCk';
    if (document.getElementById("software").value == 'OMRETL')
        stock = 'PRODUCT';
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("messageDisplayDiv").innerHTML = '';
            if (panelName == 'windowshopping' && sellPanel == 'jewelleryPanel')
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            else
                document.getElementById("slPrMainDiv").innerHTML = xmlhttp.responseText;

            if (panelName == 'ItemSearchPanel') {
                document.getElementById("sellPurchaseDiv").innerHTML = 'UNIVERSAL SELL PANEL';
            } else if (panelName == 'StockReturnPanel') {
                document.getElementById("sellPurchaseDiv").innerHTML = 'ITEM RETURN PANEL';
            } else if (panelName == 'StockPurchasePanel') {
                document.getElementById("sellPurchaseDiv").innerHTML = 'JEWELLERY SELL PANEL';
            } else if (panelName == 'CrystalPurchasePanel') {
                document.getElementById("sellPurchaseDiv").innerHTML = 'CRYSTAL SELL PANEL';
            } else if (panelName == 'ImitationPurchasePanel') {
                document.getElementById("sellPurchaseDiv").innerHTML = stock + ' SELL PANEL';
            } else if (panelName == 'StrlleringPurchasePanel') {
                document.getElementById("sellPurchaseDiv").innerHTML = 'STRLLERING SILVER SOLD OUT LIST';
            } else if (panelName == 'ReturnedItemList') {
                document.getElementById("sellPurchaseDiv").innerHTML = 'RETURNED ITEM LIST';
            } else if (panelName == 'SoldOutList') {
                document.getElementById("sellPurchaseDiv").innerHTML = 'ITEM SOLD OUT LIST';
            } else if (panelName == 'ImitationSoldOutList') {
                document.getElementById("sellPurchaseDiv").innerHTML = stock + ' SOLD OUT LIST';
            } else if (panelName == 'windowshopping') {
                document.getElementById("sellPurchaseDiv").innerHTML = 'WINDOW SHOPPING PANEL';
            } else if (panelName == 'ItemApproval') {
                document.getElementById("sellPurchaseDiv").innerHTML = 'ITEM APPROVAL PANEL';
            } else if (panelName == 'ApprovalList') {
                document.getElementById("sellPurchaseDiv").innerHTML = 'APPROVAL ITEM LIST';
            } else if (panelName != 'StockReturnPanel')
                document.getElementById("srchItemId").focus();

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    if (panelName == 'SoldOutList')
        xmlhttp.open("POST", "include/php/ogspsllt" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&sellPanel=" + sellPanel, true);
    else if (panelName == 'ImitationSoldOutList')
        xmlhttp.open("POST", "include/php/ogijspllt" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&sellPanel=" + sellPanel, true);
    else if (panelName == 'ReturnedItemList')
        xmlhttp.open("POST", "include/php/ogsprtilt" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&sellPanel=" + sellPanel, true);
    else if (panelName == 'ItemPurchaseByLot' || panelName == 'SearchByLot')
        xmlhttp.open("POST", "include/php/ogspildv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName, true);
    else if (panelName == 'ItemSearchPanel' || panelName == 'ItemPurchaseByLot')
        xmlhttp.open("POST", "include/php/ogspmndv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&payPanel=paymentPanel", true);//file changed @Author:PRIYA21FEB15
    else if (panelName == 'CrystalPurchasePanel')// Check For Crystal Purchase Panel by Sheetal  @Author:SHE15MAR15
        xmlhttp.open("POST", "include/php/ogcrspdv_1" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName, true);
    else if (panelName == 'StockPurchasePanel')
        xmlhttp.open("POST", "include/php/ogspjsdv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&payPanel=paymentPanel", true);
    else if (panelName == 'StockReturnPanel')
        xmlhttp.open("POST", "include/php/ogrtjsdv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&payPanel=paymentPanel", true);
    else if (panelName == 'ImitationPurchasePanel')
        xmlhttp.open("POST", "include/php/ogijsmndv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&payPanel=paymentPanel", true);
    else if (panelName == 'StrlleringPurchasePanel')
        xmlhttp.open("POST", "include/php/omijsmndv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&payPanel=paymentPanel", true);
    else if (panelName == 'windowshopping' && sellPanel == 'jewelleryPanel') {
        slPrId = document.getElementById("slPrId").value;
        xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&payPanel=paymentPanel&custPanelOption=windowshopping&slPrId" + slPrId, true);
    } else if (panelName == 'windowshopping')
        xmlhttp.open("POST", "include/php/ogwsmndv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&payPanel=paymentPanel", true);
    else if (panelName == 'ItemApproval')
        xmlhttp.open("POST", "include/php/ogiaijdv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&payPanel=paymentPanel", true);
    else if (panelName == 'ApprovalList')
        xmlhttp.open("POST", "include/php/ogpiallt" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName + "&payPanel=paymentPanel", true);


    xmlhttp.send();

}
/**********Start code to change name according to Imitation Panel @Author:GAUR22APR16*************/
/**********End code to change name according to  Crystalpanel @Author:SHE20MAR15*************/
/**********End code to add paymentPanel in ItemSearchPanel for ImitationPurchasePanel @Author:ANUJA25FEB15***************/
/****************End code to add WholeSalePanel condition for passing title @Author:PRIYA25FEB15**********/
/****************End code to add if condition for SearchByLot @Author:PRIYA21FEB15**********/
/**************** End to Check For Crystal Purchase Panel by Sheetal  @Author:SHE18FEB15*************/
/****************End code to change function @Author:PRIYA14JAN15******************/
/****************Start code to add WholeSalePanel panel @Author:PRIYA26DEC14***********/
/****************End code to add panel @Author:PRIYA17NOV14**********************/
/****************End code to add Func @Author:PRIYA04DEC13*************/

/**********Start code to add fn @Author:PRIYA30JAN14***************************/
/**********Start code to change function @Author:PRIYA19NOV14***********************/
/**********Start code to change function @Author:PRIYA26NOV14****************************/
/**********Start code to add condition for CrystalPurchasePanel @Author:SHE18FEB15***************/
/**********Start code to add paymentPanel for ImitationPurchasePanel @Author:ANUJA24FEB15***************/
/**********Start code to add Panel for Imitation @Author:ANUJA15MAR15***************/
/**********Start code to add / pass Panel in function  for Imitation @Author:ANUJA20MAR15***************/
/**********Start code to add condition CrystalPurchasePanel @Author:SHE18MAR15***************/
/**********Start code to change panel name to mainpanel in Imitationstock @Author:ANUJA25MAR15***************/
/**********Start code to change function to change custHome panelName  @Author:PRIYA06APR15***************/
/**********Start code to add wholesaleupPanel panelName in if condition @Author:ANUJA14MAY15***************/
//Start code to add emi chk value and invoice number parameters @Author:SHRI15MAY15
/**********Start code to change in if else condition change division  @Author:ANUJA28MAY15***************/
/**********Start code to change condition for metal upadation   @Author:SHE04FEB16***************/
/**********Start code to change condition slPrInvoiceNo TO INVOICE NO  @Author:GAUR12FEB16***************/
/**********Start code to change condition metalsell type @Author:GAUR29NOV16***************/
function showSellDetUpdatePanel(documentRootPath, custId, itemId, panelName, slPrInvoiceNo, emiChkValue, panel, metalSellType, UpdatePanelName, eInvoiceNo, eInvoicePreNo, subPanelName) {
    // alert('UpdatePanelName : ' + UpdatePanelName);
//    alert('panel : ' + panel);
    if (documentRootPath == '') {
        if (typeof (document.getElementById('documentRootPath')) != 'undefined' &&
                (document.getElementById('documentRootPath') != null)) {
            documentRootPath = document.getElementById('documentRootPath').value;
        }
    }
    if (panelName.indexOf("#") !== -1) {
        var panelNameArray = new Array();
        panelNameArray = panelName.split('#');
        panelName = panelNameArray[0];
        var subPanelName = panelNameArray[1];
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelName == 'CustSellUpPanel' || panelName == 'CustSellPayUp') {
                document.getElementById("custSellDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'custHome') {
                document.getElementById("sellMainDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'StockReturnPanel') {
                document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'ItemApprovalRecUp' && subPanelName == 'ItemApprovalUpFromSellPanel') {
                document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'CustSellUpPanel' || panelName == 'CustSellPayUp') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmspdv" + default_theme + ".php?custId=" + custId + "&itslId=" + itemId + "&panelName=" + panelName + "&metalSellType=" + metalSellType, true);
    } else if (panelName == 'custHome') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=ItemPurchase" + "&panelName=SellPayUp", true);
    } else if (panelName == 'SellLotDetUpPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=" + 'SearchByLot' + "&upPanel=" + panelName + "&panelName=paymentPanel", true);
    } else if (panelName == 'WholeSaleUpPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=WholeSalePanel" + "&upPanel=" + panelName, true);
    } else if (panelName == 'CrystalPurchasePanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=" + panelName + "&panelName=CrySellPayUp", true); // Panel name and file changed @Author:SHE24FEB15
    } else if (panel == 'ImitationStock') {// Start code to change condition for imitation stock panel @Author:SHRI05MAR15
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&panelName=" + panelName + "&mainPanel=ImitationPurchasePanel" + "&UpdatePanelName=" + UpdatePanelName, true);
    } else if (panel == 'StrelleringStock') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&panelName=" + panelName + "&mainPanel=StrlleringPurchasePanel", true);
    } else if (panelName == 'dailyWholeSaleUp') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=DailyWholeSale" + "&upPanel=" + panelName, true);
    } else if (panelName == 'windowshopping') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=" + panelName + "&upPanel=" + panelName, true);
    } else if (panelName == 'StockReturnPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrtjsdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=StockReturnPanel" + "&panelName=" + panelName + "&invoiceNo=" + slPrInvoiceNo, true);
    } else if (panelName == 'ItemApproval') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=" + panelName + "&panelName=" + panelName + "&invoiceNo=" + slPrInvoiceNo + "&emiChkValue=" + emiChkValue, true);
    } else if (panelName == 'ItemApprovalRecUp' && subPanelName == 'ItemApprovalUpFromSellPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=" + panelName + "&panelName=" + panelName + "&invoiceNo=" + slPrInvoiceNo + "&emiChkValue=" + emiChkValue, true);
    } else if (panelName == 'ItemApprovalUp') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=" + panelName + "&panelName=" + panelName + "&invoiceNo=" + slPrInvoiceNo + "&emiChkValue=" + emiChkValue, true);
    } else if (panelName == 'ReturnedItemList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogsprtilt" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=" + panelName + "&panelName=" + panelName + "&invoiceNo=" + slPrInvoiceNo, true);
    } else if (panelName == 'SellDetUpPanel' && panel == 'fineb2') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=FINE_JEWELLERY_SELL_B2" + "&panelName=" + panelName + "&invoiceNo=" + slPrInvoiceNo + "&emiChkValue=" + emiChkValue, true);
    } else if (panelName == "RetailStockItemReturn") {
        xmlhttp.open("POST", documentRootPath + "/include/php/omitmrtn" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=RetailStockItemReturn" + "&panelName=" + panelName + "&invoiceNo=" + slPrInvoiceNo, true);
    } else if (panel == 'RetailStockUpdate') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvB2sell" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&panelName=" + panelName + "&mainPanel=ImitationPurchasePanel", true);

    } else if (panelName == 'EstimatePayUp') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omestimate" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=StockPurchasePanel&panelDivName=EstimateUp&mainDivPanelEsName=EstimateGoUp&" + "&panelName=" + panelName + "&invoiceNo=" + slPrInvoiceNo + "&emiChkValue=" + emiChkValue + "&eInvoiceNo=" + eInvoiceNo + "&eInvoicePreNo=" + eInvoicePreNo, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=StockPurchasePanel" + "&panelName=" + panelName + "&invoiceNo=" + slPrInvoiceNo + "&emiChkValue=" + emiChkValue+ "&subPanelName=" + subPanelName+ "&panel=" + panel, true);
    }// End code to change condition for imitation stock panel @Author:SHRI05MAR15
    xmlhttp.send();
}
/**********END code to change condition metalsell type @Author:GAUR29NOV16***************/
/**********End code to change condition slPrInvoiceNo TO INVOICE NO  @Author:GAUR12FEB16***************/
/**********End code to change condition for metal upadation   @Author:SHE04FEB16***************/
/**********End code to change in if else condition change division  @Author:ANUJA28MAY15***************/
//End code to add emi chk value and invoice number parameters @Author:SHRI15MAY15
/**********End code to add wholesaleupPanel panelName in if condition @Author:ANUJA14MAY15***************/
/**********End code to change function to change custHome panelName  @Author:PRIYA06APR15***************/
/**********End code to change panel name to mainpanel in Imitationstock @Author:ANUJA25MAR15***************/
/**********End code to add condition CrystalPurchasePanel @Author:SHE18MAR15***************/
/**********End code to add Panel for Imitation @Author:ANUJA20MAR15***************/
/**********End code to add Panel for Imitation @Author:ANUJA15MAR15***************/
/**********End code to add paymentPanel for ImitationPurchasePanel @Author:ANUJA24FEB15***************/
/**********End code to add condition for CrystalPurchasePanel @Author:SHE18FEB15***************/
/**********End code to change function @Author:PRIYA26NOV14****************************/
/**********End code to change function @Author:PRIYA19NOV14***********************/
/**********End code to add fn @Author:PRIYA30JAN14***************************/
/**********Start code to add fn @Author:PRIYA07DEC13***************************/
function getItemDetailsPanel(documentRootPath, preId, postId, panelName, page, prodVersion) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("itemDetails").innerHTML = xmlhttp.responseText;
        }
    };
    if (prodVersion == 'OMUNIM3.0.0') {
        xmlhttp.open("POST", documentRootPath + "/include/php/stock/omStockJwelleryPanel" + default_theme + ".php?panelName=" + encodeURIComponent(panelName) + "&sttrId=" + encodeURIComponent(preId) +
                "&page=" + encodeURIComponent(page), true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogidsbdv" + default_theme + ".php?panelName=" + encodeURIComponent(panelName) + "&preId=" + encodeURIComponent(preId) + "&postId=" + encodeURIComponent(postId) +
                "&page=" + encodeURIComponent(page), true); //CODE CHANGE TO ENCODE URL,@AUTHOR:HEMA-15JUL2020
    }
    xmlhttp.send();
}
/**********End code to add fn @Author:PRIYA07DEC13***************************/

/**********Start code to add imitation stock @Author:AshwiniPatil6May2021***************************/
function getImitationItemDetailsPanel(documentRootPath, preId, postId, panelName, page, prodVersion) {
//    alert(preId);
//    alert(postId);
//    alert(panelName);
//    var imiStock = document.getElementById("imiStock").value;
//    alert(imiStock);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("itemDetails").innerHTML = xmlhttp.responseText;
        }
    };
    if (prodVersion == 'OMUNIM3.0.0') {
        xmlhttp.open("POST", documentRootPath + "/include/php/stock/omStockJwelleryPanel" + default_theme + ".php?panelName=" + encodeURIComponent(panelName) + "&sttrId=" + encodeURIComponent(preId) +
                "&page=" + encodeURIComponent(page), true);
    } else {
//    if(imiStock == 'imitation'){
//        alert("Hiiiiiiiiii");
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijrtsbdv" + default_theme + ".php?panelName=" + encodeURIComponent(panelName) + "&preId=" + encodeURIComponent(preId) + "&postId=" + encodeURIComponent(postId) +
                "&page=" + encodeURIComponent(page), true);
//    }else{
//        xmlhttp.open("POST", documentRootPath + "/include/php/ogidsbdv" + default_theme + ".php?panelName=" + encodeURIComponent(panelName) + "&preId=" + encodeURIComponent(preId) + "&postId=" + encodeURIComponent(postId) +
//                "&page=" + encodeURIComponent(page), true); //CODE CHANGE TO ENCODE URL,@AUTHOR:HEMA-15JUL2020
    }
    xmlhttp.send();
}
/**********End code to add imitation stock @Author:AshwiniPatil6May2021***************************/
//
//
//*************************************************************************************************************************
// START CODE TO ADD INVOICE DELETE VERIFICATION FUNCTION @SIMRAN:07OCT2023
//*************************************************************************************************************************
function openDeleteInvoiceVerifyPopUp(panelName, slPrId, preInvNo, invNo, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('deleteInvVerifyPopUp').style.display = "block";
            document.getElementById('deleteInvVerifyPopUp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omDelInvpreview" + default_theme + ".php?panelName=" + panelName + "&slPrId=" + slPrId + "&preInvNo=" + preInvNo + "&invNo=" + invNo + "&custId=" + custId, true);
    xmlhttp.send();
}
//
//
function openDeleteInvVerifyPopUp(custId, slPrId, panelName, mainPanel, panel, slPrInfo, count, preInvNo, invNo) {
    //
    //alert(preInvNo + invNo);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('deleteInvVerifyPopUp').style.display = "block";
            document.getElementById('deleteInvVerifyPopUp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omDelInvpreview" + default_theme + ".php?custId=" + custId + "&slPrId=" + slPrId +
            "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&panel=" + panel + "&slPrInfo=" + slPrInfo +
            "&count=" + count + "&preInvNo=" + preInvNo + "&invNo=" + invNo, true);
    xmlhttp.send();
}
//
//
function closedopenDelInvVerificationPopUp() {
    document.getElementById('deleteInvVerifyPopUp').style.display = 'none';
}
//
//
function verifyTransactionPasscode(transPasscode, custId, slPrId, panelName, mainPanel, panel, slPrInfo, count, preInvNo, invNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('deleteInvVerifyPopUp').style.display = "block";
            document.getElementById('deleteInvVerifyPopUp').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            //document.getElementById('deleteInvVerificationPopUp').style.display = "none";
        }
    };
    xmlhttp.open("GET", "include/php/omDelInvPreviewPopUp" + default_theme + ".php?transPasscode=" + transPasscode + "&custId=" + custId + "&slPrId=" + slPrId +
            "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&panel=" + panel + "&slPrInfo=" + slPrInfo + "&count=" + count +
            "&preInvNo=" + preInvNo + "&invNo=" + invNo, true);
    xmlhttp.send();
}
//*************************************************************************************************************************
// END CODE TO ADD INVOICE DELETE VERIFICATION FUNCTION @SIMRAN:07OCT2023
//*************************************************************************************************************************
//
/*********Start code to add sell item del func @Author:PRIYA30JAN14*********************/
/*********Start code to add Imitation Panel for del func @Author:ANUJA30MAR15*********************/
/*********Start code to add slPrInfo param @Author:SHRI23JUN16 *************************/
function deleteSellItem(custId, slPrId, panelName, mainPanel, panel, slPrInfo, count, slPrInfo, utinId, sellStatus, subPanelName) {
//
//    alert('count ===' + count);
//    alert('subStaff ===' + subStaff);
    //alert('panelName ===' + panelName);
    //alert('mainPanel ===' + mainPanel);
    //alert('panel ===' + panel);
    //alert('slPrInfo ===' + slPrInfo);
    //alert('count ===' + count);

    var addToStock = 'no';
    var stock_add_confirm;
    if ((mainPanel == 'SellItemReturn' || mainPanel == 'ItemApproval' || mainPanel == 'ItemApprovalUp') && (panelName == 'ItemReturn' || panel == 'ItemReturn')) {
        confirm_box = confirm("Do you really want to Return this Item?");
    } else if (mainPanel == 'SellItemReturn' && panelName == 'ItemActive') {
        confirm_box = confirm("Do you really want to Reactive this Item?");
    } else if (sellStatus == 'RETURNED') {
        confirm_box = alert("This Item Is Already Returned To Delete this Item first Delete the Return Invoice");
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
    }

    var stockDelete = document.getElementById("stockDelete").value;

    //alert('stockDelete ===' + stockDelete);

    if (confirm_box == true)
    {
        if ((panel == 'ImitationStock' || (panel == 'ItemPurchase' && panel == 'ItemRet' && panelName != 'ItemActive') || mainPanel == 'finalOrderDel') && stockDelete == 'Y')
            stock_add_confirm = confirm(addItemAlertMess + "\n\nDo you want to add this item in stock?");

        if ((panel == 'StrelleringStock' || (panel == 'ItemPurchase' && panel == 'ItemRet' && panelName != 'ItemActive') || mainPanel == 'finalOrderDel') && stockDelete == 'Y')
            stock_add_confirm = confirm(addItemAlertMess + "\n\nDo you want to add this item in stock?");

        //alert('stock_add_confirm ===' + stock_add_confirm);

        if (stock_add_confirm == true && stockDelete == 'Y') {
            addToStock = 'yes';
        }

        //alert('addToStock ===' + addToStock);

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (mainPanel == 'SellItemReturn') {
                    document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'soldOutListDel' || panelName == 'ItemApprovalListDel' || panelName == 'retItmListDel') {
                    document.getElementById("slPrCurrentInvoiceNew").innerHTML = xmlhttp.responseText;
                    document.getElementById('deleteInvVerifyPopUp').style.display = "none";
                } else if (mainPanel == 'SlPrPayment' && panelName == '') {
                    document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                    window.setTimeout(sellFunctionToCloseDiv, 1000);
                } else if (mainPanel == 'MainSoldOutListDel' && panelName == '') {
                    document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                    window.setTimeout(sellFunctionToCloseDiv, 1000);
                } else if (mainPanel == 'finalOrderUp' || mainPanel == 'finalOrderDel') {
                    document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                    window.setTimeout(sellFunctionToCloseDiv, 1000);
                } else if (panelName == 'ImitationSellDel') {
                    document.getElementById("imitationSellPurchaseList").innerHTML = xmlhttp.responseText;
                    document.getElementById('deleteInvVerifyPopUp').style.display = "none";
                } else if (panelName == 'StrlleringSellDel') {
                    document.getElementById("strlleringSellPurchaseList").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                    window.setTimeout(sellFunctionToCloseDiv, 1000);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };

        if (panel == 'ImitationStock')
            xmlhttp.open("GET", "include/php/ogspimdl" + default_theme + ".php?custId=" + custId + "&slPrId=" + slPrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&panel=" + panel + "&stockAdd=" + addToStock+ "&subPanelName=" + subPanelName, true); // filename changed @SHRI09MAR16
         else if (panel == 'StrelleringStock')
            xmlhttp.open("GET", "include/php/ogspimdl" + default_theme + ".php?custId=" + custId + "&slPrId=" + slPrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&panel=" + panel + "&stockAdd=" + addToStock, true); // filename changed @SHRI09MAR16
         else
            xmlhttp.open("GET", "include/php/ogspidel" + default_theme + ".php?custId=" + custId + "&slPrId=" + slPrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&slPrInfo=" + slPrInfo + "&panel=" + panel + "&stockAdd=" + addToStock + "&utinId=" + utinId+ "&subPanelName=" + subPanelName, true);
         xmlhttp.send();

    }
}
function deleteReturnItem(custId, slPrId, panelName, mainPanel, panel, slPrInfo) {
    // alert(mainPanel);
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14

    if (confirm_box == true) {

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (mainPanel == 'ReturnedItemList') {
                    if (slPrInfo == 'deleteReturnItemList') {
                        document.getElementById("sellPurchaseList").innerHTML = xmlhttp.responseText;
                    } else {
                        document.getElementById("returnItemListDiv").innerHTML = xmlhttp.responseText;
                        document.getElementById('deleteInvVerifyPopUp').style.visibility = "hidden";
                    }
                } else {
                    document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };

//alert(xmlhttp.responseText);
        if (slPrInfo == 'deleteReturnItemList') {
            xmlhttp.open("GET", "include/php/ogrtitdel" + default_theme + ".php?custId=" + custId + "&slPrId=" + slPrId + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&panel=" + panel, true); // filename changed @SHRI09MAR16
        } else {
            xmlhttp.open("GET", "include/php/ogrtitdel" + default_theme + ".php?custId=" + custId + "&slPrId=" + slPrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&panel=" + panel, true); // filename changed @SHRI09MAR16
        }
        xmlhttp.send();
    }
}
function deleteReturnItemInv(userId, custId, slPrId, panelName, mainPanel, panel, slPrInfo, stockDelete = '') {
    // alert(mainPanel);
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14

    if (confirm_box == true) {

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sellPurchaseList").innerHTML = xmlhttp.responseText;

            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        if (slPrInfo == 'deleteReturnItemList') {
            xmlhttp.open("GET", "include/php/ogrtitdel" + default_theme + ".php?custId=" + custId + "&slPrId=" + slPrId + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&panel=" + panel, true); // filename changed @SHRI09MAR16
        } else {
            xmlhttp.open("GET", "include/php/ogrtitdel" + default_theme + ".php?custId=" + custId + "&slPrId=" + slPrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&panel=" + panel, true); // filename changed @SHRI09MAR16
        }
        xmlhttp.send();
}
}

function deleteSellItem_1(panelName, slPrId, mainPanel, custId, preInvoiceNo, postInvoiceNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        //soldOutImtInv

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'soldOutList')
            {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sellPurchaseList").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'soldOutImtInv') {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("itemSoldInvoiceDiv").innerHTML = xmlhttp.responseText;//sellPurchaseList//itemSoldInvoiceDiv
            } else if (panelName == 'soldOutImtList') {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sellPurchaseList").innerHTML = xmlhttp.responseText;//sellPurchaseList//itemSoldInvoiceDiv
            } else if (panelName == 'soldOutInv') {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("itemSoldInvoiceDiv").innerHTML = xmlhttp.responseText;//sellPurchaseList//itemSoldInvoiceDiv
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }

    };
    xmlhttp.open("GET", "include/php/ogcrspdl" + default_theme + ".php?custId=" + custId + "&slPrId=" + slPrId + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&slPrPreInvoiceNo=" + preInvoiceNo + "&slPrInvoiceNo=" + postInvoiceNo, true);
    xmlhttp.send();
}
/*********End code to add slPrInfo param @Author:SHRI23JUN16 *************************/
function sellFunctionToCloseDiv() {
    document.getElementById('sellMessDisplayDiv').innerHTML = '';
}
/*********End code to add Imitation Panel for del func @Author:ANUJA30MAR15*********************/
/*********End code to add sell item del func @Author:PRIYA30JAN14*********************/
/**********Start code to add fn @Author:PRIYA10DEC13***************************/
function searchTransGirviByGirviId(girviCustId, girviId, panelDivName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "include/php/omcdccdd" + default_theme + ".php?custId=" + girviCustId + "&girviId=" + girviId + "&panelDivName=" + panelDivName, true);
    xmlhttp.send();
}
/**********End code to add fn @Author:PRIYA10DEC13***************************/

/****************Start code to add date @Author:PRIYA10DEC13*************/
/****************Start code to add param @Author:PRIYA30MAY14*************/
function searchDailyDiaryPanel(firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, ddMainPanel, ddOrderBy) {
//    alert(ddMainPanel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (ddMainPanel == 'custAccLedgerDayBook') {
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("dailyDiaryDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var dailyDiaryFromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
    var dailyDiaryToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
    xmlhttp.open("POST", "include/php/omddddandv" + default_theme + ".php?firmId=" + firmId + "&dailyDiaryFromDate=" + dailyDiaryFromDate + "&dailyDiaryToDate=" + dailyDiaryToDate +
            "&ddMainPanel=" + ddMainPanel + "&ddOrderBy=" + ddOrderBy, true);
    xmlhttp.send();
}
/****************End code to add param @Author:PRIYA30MAY14*************/
/****************End code to add date @Author:PRIYA10DEC13*************/
/**********Start code to add fn @Author:PRIYA12DEC13***************************/
/**********Start code to change div fn @Author:PRIYA22JAN14***************************/
function navToMoneyLenderPanel(loanId, mlId, panelDivName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "include/php/ommlmndv" + default_theme + ".php?loanId=" + loanId + "&mlId=" + mlId + "&mlPanelOption=" + panelDivName + "&panelOption=" + panelDivName
            + "&girviId=" + loanId, true);
    xmlhttp.send();
}
/**********End code to change div fn @Author:PRIYA22JAN14***************************/
/**********End code to add fn @Author:PRIYA12DEC13***************************/
/**********Start code to add func @Author:PRIYA31DEC13********************/
var commonDivId;
var payPanelName;
function payment_submit(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertPaymentSubmit
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertPaymentSubmit() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById(commonDivId).innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function paymentSubmit() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("paySubButt").style.visibility = "hidden";
    var divId = document.getElementById("divIdHidden").value;
    commonDivId = divId;
    var prefix = document.getElementById("prefix").value;
    payPanelName = document.getElementById("payPanelName").value;
    if (validateAddNewSuppInvoice(payPanelName)) {
        //        if (payPanelName == 'SuppOrderDelivery' || payPanelName == 'suppPendingOrderUp' || payPanelName == 'SuppPaymentPanel') {
        //            document.getElementById("totSuppPayCrystal").value = getCrystalDiv;
        //        }
        var poststr = "payPanelName=" + encodeURIComponent(document.getElementById("payPanelName").value)
                + "&itemId=" + encodeURIComponent(document.getElementById(prefix + "ItemId").value)
                + "&custId=" + encodeURIComponent(document.getElementById(prefix + "CustId").value)
                + "&suppId=" + encodeURIComponent(document.getElementById(prefix + "SuppId").value)
                + "&firmId=" + encodeURIComponent(document.getElementById(prefix + "FirmId").value)
                + "&accId=" + encodeURIComponent(document.getElementById(prefix + "AccId").value)
                + "&itemAddDate=" + encodeURIComponent(document.getElementById(prefix + "ItemAddDate").value)
                + "&preInvoiceNo=" + encodeURIComponent(document.getElementById(prefix + "PreInvoiceNo").value)
                + "&postInvoiceNo=" + encodeURIComponent(document.getElementById(prefix + "PostInvoiceNo").value)
                + "&goldTotGrosssWt=" + encodeURIComponent(document.getElementById(prefix + "GoldTotGrosssWt").value)
                + "&goldTotGrosssWtType=" + encodeURIComponent(document.getElementById(prefix + "GoldTotGrosssWtType").value)
                + "&goldTotNetWt=" + encodeURIComponent(document.getElementById(prefix + "GoldTotNetWt").value)
                + "&goldTotNetWtType=" + encodeURIComponent(document.getElementById(prefix + "GoldTotNetWtType").value)
                + "&goldTotFineWt=" + encodeURIComponent(document.getElementById(prefix + "GoldTotFineWt").value)
                + "&goldTotFineWtType=" + encodeURIComponent(document.getElementById(prefix + "GoldTotFineWtType").value)
                + "&silverTotGrosssWt=" + encodeURIComponent(document.getElementById(prefix + "SilverTotGrosssWt").value)
                + "&silverTotGrosssWtType=" + encodeURIComponent(document.getElementById(prefix + "SilverTotGrosssWtType").value)
                + "&silverTotNetWt=" + encodeURIComponent(document.getElementById(prefix + "SilverTotNetWt").value)
                + "&silverTotNetWtType=" + encodeURIComponent(document.getElementById(prefix + "SilverTotNetWtType").value)
                + "&silverTotFineWt=" + encodeURIComponent(document.getElementById(prefix + "SilverTotFineWt").value)
                + "&silverTotFineWtType=" + encodeURIComponent(document.getElementById(prefix + "SilverTotFineWtType").value)

                + "&payId=" + encodeURIComponent(document.getElementById(prefix + "PayId").value)
                + "&payMetalType1=" + encodeURIComponent(document.getElementById(prefix + "PayMetalType1").value)
                + "&payRawGoldPreId=" + encodeURIComponent(document.getElementById(prefix + "PayRawGoldPreId").value)
                + "&payRawGoldPosId=" + encodeURIComponent(document.getElementById(prefix + "PayRawGoldPosId").value)
                + "&payFirmId1=" + encodeURIComponent(document.getElementById(prefix + "PayFirmId1").value)
                + "&payAccId1=" + encodeURIComponent(document.getElementById(prefix + "PayAccId1").value)
                + "&payMetal1RecWt=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1RecWt").value)
                + "&payMetal1RecWtType=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1RecWtType").value)
                + "&payMetal1Tunch=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1Tunch").value)
                + "&payMetal1FnWt=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1FnWt").value)
                + "&payMetal1Rate=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1Rate").value)
                + "&payMetal1Val=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1Val").value)
                + "&payMetal1Bal=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1Bal").value)
                + "&payMetalBal1Type=" + encodeURIComponent(document.getElementById(prefix + "PayMetalBal1Type").value)

                + "&payMetalType2=" + encodeURIComponent(document.getElementById(prefix + "PayMetalType2").value)
                + "&payRawSilverPreId=" + encodeURIComponent(document.getElementById(prefix + "PayRawSilverPreId").value)
                + "&payRawSilverPosId=" + encodeURIComponent(document.getElementById(prefix + "PayRawSilverPosId").value)
                + "&payFirmId2=" + encodeURIComponent(document.getElementById(prefix + "PayFirmId2").value)
                + "&payAccId2=" + encodeURIComponent(document.getElementById(prefix + "PayAccId2").value)
                + "&payMetal2RecWt=" + encodeURIComponent(document.getElementById(prefix + "PayMetal2RecWt").value)
                + "&payMetal2RecWtType=" + encodeURIComponent(document.getElementById(prefix + "PayMetal2RecWtType").value)
                + "&payMetal2Tunch=" + encodeURIComponent(document.getElementById(prefix + "PayMetal2Tunch").value)
                + "&payMetal2FnWt=" + encodeURIComponent(document.getElementById(prefix + "PayMetal2FnWt").value)
                + "&payMetal2Rate=" + encodeURIComponent(document.getElementById(prefix + "PayMetal2Rate").value)
                + "&payMetal2Val=" + encodeURIComponent(document.getElementById(prefix + "PayMetal2Val").value)
                + "&payMetal2Bal=" + encodeURIComponent(document.getElementById(prefix + "PayMetal2Bal").value)
                + "&payMetalBal2Type=" + encodeURIComponent(document.getElementById(prefix + "PayMetalBal2Type").value)
                + "&payMetal1WtBal=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1WtBal").value)
                + "&payMetal2WtBal=" + encodeURIComponent(document.getElementById(prefix + "PayMetal2WtBal").value)

                + "&payTotAmt=" + encodeURIComponent(document.getElementById(prefix + "PayTotAmt").value)
                + "&payTotAmtRec=" + encodeURIComponent(document.getElementById(prefix + "PayTotAmtRec").value)
                + "&payTotAmtBal=" + encodeURIComponent(document.getElementById(prefix + "PayTotAmtBal").value)
                + "&payAccId=" + encodeURIComponent(document.getElementById(prefix + "PayAccId").value)
                + "&payCashAmtRec=" + encodeURIComponent(document.getElementById(prefix + "PayCashAmtRec").value)
                + "&payDiscount=" + encodeURIComponent(document.getElementById(prefix + "PayDiscount").value)
                + "&payCardType=" + encodeURIComponent(document.getElementById(prefix + "PayCardType").value)
                + "&payCardNo=" + encodeURIComponent(document.getElementById(prefix + "PayCardNo").value)
                + "&payOtherInfo=" + encodeURIComponent(document.getElementById(prefix + "PayOtherInfo").value)

                + "&payTotAmtDisp=" + encodeURIComponent(document.getElementById(prefix + "PayTotAmtDisp").value)
                + "&payTotAmtRecDisp=" + encodeURIComponent(document.getElementById(prefix + "PayTotAmtRecDisp").value)
                + "&payCashRecDisp=" + encodeURIComponent(document.getElementById(prefix + "PayCashRecDisp").value)
                + "&payDiscountDisp=" + encodeURIComponent(document.getElementById(prefix + "PayDiscountDisp").value)
                + "&payTotAmtBalDisp=" + encodeURIComponent(document.getElementById(prefix + "PayTotAmtBalDisp").value);
        payment_submit('include/php/ogwhpyad' + default_theme + '.php', poststr);
        return false;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("paySubButt").style.visibility = "visible";
        return false;
    }
}
/**********End code to add func @Author:PRIYA31DEC13********************/
/***********Start code add func @Author:PRIYA15JAN14**************************/
/***********Start code to pass paymentPanel @Author:ANUJA15JAN14**************************/
/***********Start code to add mainPanel @Author:PRIYA15MAR15**************/
function sellExchange(custId, preInvoiceNo, postInvoiceNo, returnPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&panelName=" + returnPanel + "&preInvoiceNo=" + preInvoiceNo +
            "&postInvoiceNo=" + postInvoiceNo + "&payPanel=paymentPanel" + "&mainPanel=ItemPurchase", true);
    xmlhttp.send();
}
/***********End code to add mainPanel @Author:PRIYA15MAR15**************/
/***********End code to pass paymentPanel @Author:ANUJA15JAN14**************************/
/***********End code add func @Author:PRIYA15JAN14**************************/
/***********Start code add func To Select Raw Metal @Author:PRIYA29DEC13**************************/
function getRawMetalList(keyCodeInput, panelName, metalType, rawPreId, rawPostId, div, metalCount) {
    var rawMetalStr = '';
    var id = parseInt(metalCount) - 1;
    while (id > 0) {
        if (delRawString.indexOf(id) < 0) {
            rawMetalStr = rawMetalStr + document.getElementById("payRawMetalSelId" + id).value;
        } else {
            rawMetalStr = rawMetalStr;
        }
        id = parseInt(id) - 1;
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('rawMetalIdSel').focus();
                document.getElementById('rawMetalIdSel').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogrmsldv" + default_theme + ".php?panelName=" + panelName + "&metalType=" + metalType + "&rawPreId=" + rawPreId + "&rawPostId=" + rawPostId +
            "&div=" + div + "&metalCount=" + metalCount + "&rawMetalStr=" + rawMetalStr, true);
    xmlhttp.send();
}
/***********End code add func Toi Select Raw Metal @Author:PRIYA29DEC13**************************/
/***********Start code to add stock div @Author:PRIYA09NOV13****************/
function postRawMetalDet(rawMetalPreId, rawMetalPostId, rawMetalReturn, panelName, preInvNo, postInvNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("payMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogcmiddv" + default_theme + ".php?rawMetalPreId=" + rawMetalPreId + "&rawMetalPostId=" + rawMetalPostId + "&rawMetalReturn=" + rawMetalReturn +
            "&paymentPanelName=" + panelName + "&preInvNo=" + preInvNo + "&postInvNo=" + postInvNo, true);
    xmlhttp.send();
}
/***********End code to add stock div @Author:PRIYA09NOV13****************/
function returnInvSubmit() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("paySubButt").style.visibility = "hidden";
    var divId = document.getElementById("divIdHidden").value;
    commonDivId = divId;
    var prefix = document.getElementById("prefix").value;
    payPanelName = document.getElementById("payPanelName").value;
    if (validateAddNewSuppInvoice(payPanelName)) {
        var poststr = "payPanelName=" + encodeURIComponent(document.getElementById("payPanelName").value)
                + "&itemId=" + encodeURIComponent(document.getElementById(prefix + "ItemId").value)
                + "&custId=" + encodeURIComponent(document.getElementById(prefix + "CustId").value)
                + "&suppId=" + encodeURIComponent(document.getElementById(prefix + "SuppId").value)
                + "&firmId=" + encodeURIComponent(document.getElementById(prefix + "FirmId").value)
                + "&accId=" + encodeURIComponent(document.getElementById(prefix + "AccId").value)
                + "&itemAddDate=" + encodeURIComponent(document.getElementById(prefix + "ItemAddDate").value)
                + "&preInvoiceNo=" + encodeURIComponent(document.getElementById(prefix + "PreInvoiceNo").value)
                + "&postInvoiceNo=" + encodeURIComponent(document.getElementById(prefix + "PostInvoiceNo").value)
                + "&goldTotGrosssWt=" + encodeURIComponent(document.getElementById(prefix + "GoldTotGrosssWt").value)
                + "&goldTotGrosssWtType=" + encodeURIComponent(document.getElementById(prefix + "GoldTotGrosssWtType").value)
                + "&goldTotNetWt=" + encodeURIComponent(document.getElementById(prefix + "GoldTotNetWt").value)
                + "&goldTotNetWtType=" + encodeURIComponent(document.getElementById(prefix + "GoldTotNetWtType").value)
                + "&goldTotFineWt=" + encodeURIComponent(document.getElementById(prefix + "GoldTotFineWt").value)
                + "&goldTotFineWtType=" + encodeURIComponent(document.getElementById(prefix + "GoldTotFineWtType").value)
                + "&silverTotGrosssWt=" + encodeURIComponent(document.getElementById(prefix + "SilverTotGrosssWt").value)
                + "&silverTotGrosssWtType=" + encodeURIComponent(document.getElementById(prefix + "SilverTotGrosssWtType").value)
                + "&silverTotNetWt=" + encodeURIComponent(document.getElementById(prefix + "SilverTotNetWt").value)
                + "&silverTotNetWtType=" + encodeURIComponent(document.getElementById(prefix + "SilverTotNetWtType").value)
                + "&silverTotFineWt=" + encodeURIComponent(document.getElementById(prefix + "SilverTotFineWt").value)
                + "&silverTotFineWtType=" + encodeURIComponent(document.getElementById(prefix + "SilverTotFineWtType").value)

                + "&payId=" + encodeURIComponent(document.getElementById(prefix + "PayId").value)
                + "&payMetalType1=" + encodeURIComponent(document.getElementById(prefix + "PayMetalType1").value)
                + "&payRawGoldPreId=" + encodeURIComponent(document.getElementById(prefix + "PayRawGoldPreId").value)
                + "&payRawGoldPosId=" + encodeURIComponent(document.getElementById(prefix + "PayRawGoldPosId").value)
                + "&payFirmId1=" + encodeURIComponent(document.getElementById(prefix + "PayFirmId1").value)
                + "&payAccId1=" + encodeURIComponent(document.getElementById(prefix + "PayAccId1").value)
                + "&payMetal1RecWt=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1RecWt").value)
                + "&payMetal1RecWtType=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1RecWtType").value)
                + "&payMetal1Tunch=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1Tunch").value)
                + "&payMetal1FnWt=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1FnWt").value)
                + "&payMetal1Rate=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1Rate").value)
                + "&payMetal1Val=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1Val").value)
                + "&payMetal1Bal=" + encodeURIComponent(document.getElementById(prefix + "PayMetal1Bal").value)
                + "&payMetalBal1Type=" + encodeURIComponent(document.getElementById(prefix + "PayMetalBal1Type").value)

                + "&payTotAmt=" + encodeURIComponent(document.getElementById(prefix + "PayTotAmt").value)
                + "&payTotAmtRec=" + encodeURIComponent(document.getElementById(prefix + "PayTotAmtRec").value)
                + "&payTotAmtBal=" + encodeURIComponent(document.getElementById(prefix + "PayTotAmtBal").value)
                + "&payAccId=" + encodeURIComponent(document.getElementById(prefix + "PayAccId").value)
                + "&payCashAmtRec=" + encodeURIComponent(document.getElementById(prefix + "PayCashAmtRec").value)
                + "&payDiscount=" + encodeURIComponent(document.getElementById(prefix + "PayDiscount").value)
                + "&payCardType=" + encodeURIComponent(document.getElementById(prefix + "PayCardType").value)
                + "&payCardNo=" + encodeURIComponent(document.getElementById(prefix + "PayCardNo").value)
                + "&payOtherInfo=" + encodeURIComponent(document.getElementById(prefix + "PayOtherInfo").value)

                + "&payTotAmtDisp=" + encodeURIComponent(document.getElementById(prefix + "PayTotAmtDisp").value)
                + "&payTotAmtRecDisp=" + encodeURIComponent(document.getElementById(prefix + "PayTotAmtRecDisp").value)
                + "&payCashRecDisp=" + encodeURIComponent(document.getElementById(prefix + "PayCashRecDisp").value)
                + "&payDiscountDisp=" + encodeURIComponent(document.getElementById(prefix + "PayDiscountDisp").value)
                + "&payTotAmtBalDisp=" + encodeURIComponent(document.getElementById(prefix + "PayTotAmtBalDisp").value);
        payment_submit('include/php/ogwhpyad' + default_theme + '.php', poststr);
        return false;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("paySubButt").style.visibility = "visible";
        return false;
    }
}
/***********Start code to add Cust sell panel @Author:PRIYA25DEC13*************/
/*************** Start code to change in function @Author:SHE30JAN16 *********************/
/*************** End code to change in function @Author:SHE03FEB16*********************/
/*********start to add condition for meatlSellType=BuyMetal @Author: GAUR25NOV16**********/
/*********start to add condition for meatlSellType=BuyMetal @Author: GAUR01DEC16**********/
function getCustSellPanel(custId, panelName)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("custSellDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'AddItem') {
        xmlhttp.open("GET", "include/php/ogpriadv" + default_theme + ".php?custId=" + custId, true);
//        xmlhttp.open("GET", "include/php/ogrmspdv" + default_theme + ".php?custId=" + custId, true);
    } else if (panelName == 'ItemListSell') {
//        xmlhttp.open("GET", "include/php/ogprstlt" + default_theme + ".php?custId=" + custId, true);
        xmlhttp.open("GET", "include/php/ogrmsolt" + default_theme + ".php?custId=" + custId, true);
    } else if (panelName == 'ItemListBuy') {
//        xmlhttp.open("GET", "include/php/ogprstlt" + default_theme + ".php?custId=" + custId, true);
        xmlhttp.open("GET", "include/php/ogrmbsolt" + default_theme + ".php?custId=" + custId, true);
    } else if (panelName == 'BuyMetal' || panelName == 'SellMetal') {
//        xmlhttp.open("GET", "include/php/ogprstlt" + default_theme + ".php?custId=" + custId, true);
        xmlhttp.open("GET", "include/php/ogrmspdv" + default_theme + ".php?custId=" + custId + "&metalSellType=" + panelName, true);
    }
    xmlhttp.send();
}
/*********END to add condition for meatlSellType=BuyMetal @Author: GAUR01DEC16**********/
/*********END to add condition for meatlSellType=BuyMetal @Author: GAUR25NOV16**********/
/*************** End code to change in function @Author:SHE03FEB16 *********************/
/*************** End code to change in function @Author:SHE30JAN16 *********************/
/*************** Start code to change in function @Author:ANUJA29MAY15 *********************/

/*******Start  code to change validatio  @Author:SHE02FEB16***********/
function validateCustItemSellInputs() {

    if (validateSelectField(document.getElementById("slItemDOBDay").value, "Please select Date Day!") == false) {
        document.getElementById("slItemDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("slItemDOBMonth").value, "Please select Date Month!") == false) {
        document.getElementById("slItemDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("slItemDOBYear").value, "Please select Date Year!") == false) {
        document.getElementById("slItemDOBYear").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slItemInvoiceNo").value, "Please enter Invoice Number!") == false ||
            validateNum(document.getElementById("slItemInvoiceNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("slItemInvoiceNo").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Id!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("accountId").value, "Please select Account Name!") == false) {
        document.getElementById("accountId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slItemMetalRate").value, "Please enter Metal Rate Id!") == false) {
        document.getElementById("slItemMetalRate").focus();
        return false;
    }
//    else if (validateEmptyField(document.getElementById("slItemId").value, "Please enter Item Id!") == false ||
//            validateNum(document.getElementById("slItemId").value, "Accept only numeric characters without space character!") == false) {
//        document.getElementById("slItemId").focus();
//        return false;
//    }
    else if (validateEmptyField(document.getElementById("slItemName").value, "Please enter Item Name!") == false) {
        document.getElementById("slItemName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slItemMetalRateId").value, "Please enter Item Name!") == false) {
        document.getElementById("slItemMetalRateId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slItemPieces").value, "Please enter Item Pieces!") == false ||
            validateNum(document.getElementById("slItemPieces").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slItemPieces").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slItemGrossWeight").value, "Please enter Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("slItemGrossWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slItemGrossWeight").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slItemNetWeight").value, "Please enter Net Weight!") == false ||
            validateNumWithDot(document.getElementById("slItemNetWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slItemNetWeight").focus();
        return false;
    } else if (validateSelectField(document.getElementById("slItemTunch").value, "Please select Item Tunch or Purity!") == false) {
        document.getElementById("slItemTunch").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slItemFinalVal").value, "Please enter Item Final Valuation!") == false ||
            validateNumWithDot(document.getElementById("slItemFinalVal").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slItemFinalVal").focus();
        return false;
    } else {
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
        return true;
    }
}
/*******End  code to change validatio  @Author:SHE02FEB16***********/
/*******Strat code to change mess @Author:PRIYA06FEB14***********/
function custItemSell() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("slItemSubButDiv").style.visibility = "hidden";
    var stockDateDay = document.getElementById("slItemDOBDay").value;
    var stockDateMMM = document.getElementById("slItemDOBMonth").value;
    var stockDateYY = document.getElementById("slItemDOBYear").value;
    var stockDateStr = document.getElementById("slItemDOBMonth").value + ' ' + document.getElementById("slItemDOBDay").value + ', ' + document.getElementById("slItemDOBYear").value;
    var stockDate = new Date(stockDateStr); // stock Date
    var todayDate = new Date(); // Today Date

    var milliStockDate = stockDate.getTime();
    var milliTodayDate = milliStockDate;
    var datesDiff = milliTodayDate - milliStockDate;
    if (datesDiff < 0) {
        alert('Please Select the correct Date!');
        document.getElementById("slItemDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("slItemSubButDiv").style.visibility = "visible";
        /// exit();
    } else {
        if (stockDateMMM == 'FEB' || stockDateMMM == 'APR' || stockDateMMM == 'JUN' || stockDateMMM == 'SEP' || stockDateMMM == 'NOV') {
            if (stockDateMMM == 'FEB' && stockDateDay > 29 && stockDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("slItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slItemSubButDiv").style.visibility = "visible";
                //  exit();
            }
            if (stockDateMMM == 'FEB' && stockDateDay > 28 && stockDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("slItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slItemSubButDiv").style.visibility = "visible";
                // exit();
            }
            if (stockDateDay > 30) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' has only max 30 days.');
                document.getElementById("slItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slItemSubButDiv").style.visibility = "visible";
                //  exit();
            }
        }

        if (validateCustItemSellInputs()) {
//            if (document.getElementById("itslCryId").value != '') {
//                document.getElementById("sellTotCrystal").value = parseFloat(document.getElementById("noOfCry").value);
//            } else {
//                document.getElementById("sellTotCrystal").value = getCrystalDiv;
//            }
            if (uploadImage(document.getElementById("slItemSelectPhoto").value) == false) {
                window.setTimeout(stockMessDispDiv, 1000);
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slItemSubButDiv").style.visibility = "visible";
                return false;
            } else {
                return true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("slItemSubButDiv").style.visibility = "visible";
            return false;
        }
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("slItemSubButDiv").style.visibility = "visible";
    return false;
}
function stockMessDispDiv() {
    document.getElementById('messDisplayDiv').innerHTML = '';
}
/*************** Start code to change in function @Author:ANUJA29MAY15 *********************/
/*******End code to change mess @Author:PRIYA06FEB14***********/
/***********End code to add Cust sell panel @Author:PRIYA25DEC13*************/
/***************Start code to add func @Author:PRIYA25DEC13****************/
/***************Start code to add condition for sell metal @Author:SHE03FEB16****************/
function getCustSellPaymentPanel(documentRootPath, preInvoiceNo, postInvoiceNo, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPaymentButtDiv").style.visibility = "visible";
            document.getElementById("custSellDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            document.getElementById("sellPaymentButtDiv").style.visibility = "hidden";
        }
    };
    if (panelName == 'CustSell' || panelName == 'CustSellUpPanel') {
        panelName = 'CustSellPayment';
    }
    xmlhttp.open("POST", documentRootPath + "/include/php/ogrmiddv" + default_theme + ".php?paymentPanelName=" + panelName + "&preInvNo=" + preInvoiceNo + "&postInvNo=" + postInvoiceNo, true);
    xmlhttp.send();
}
/***************End code to add condition for sell metal @Author:SHE03FEB16****************/
/***************End code to change param @Author:PRIYA25DEC13****************/
/*******Start code to change div of stock @Author:PRIYA25DEC13***************/
/*******Start code to change file for raw mwtal sell del list  @Author:SHE05FEB16***************/
/*******Start code to change file for raw mwtal sell del list  @Author:SHE10FEB16***************/
/*******Start code to change   @Author: GAUR29NOV16***************/
function deleteCustSellItem(pageNo, itslId, custId, subPanel, panelName, metalSellType) {
//    alert('metalSellType'. metalSellType);
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    if (confirm_box == true) {
        var rawMetalSellDeleteConfirm = '';
        confirm_box_for_raw_metal = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Raw Metal Stock?");
        if (confirm_box_for_raw_metal == true)
        {
            rawMetalSellDeleteConfirm = 'yes';
            var panelName = 'RawSellMetalList';
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("custSellDiv").innerHTML = xmlhttp.responseText;
                window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);

                if (panelName == 'RawSellMetalList') {
                    document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
                    window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
//        xmlhttp.open("GET", "include/php/ogpridel" + default_theme + ".php?pageNo=" + pageNo + "&itslId=" + itslId + "&custId=" + custId + "&panelName=" + panelName + "&subPanel=" + subPanel, true);
        xmlhttp.open("GET", "include/php/ogrmsidel" + default_theme + ".php?pageNo=" + pageNo + "&itslId=" + itslId + "&custId=" + custId + "&panelName=" + panelName + "&subPanel=" + subPanel + "&rawMetalSellDeleteConfirm=" + rawMetalSellDeleteConfirm + "&metalSellType=" + metalSellType, true);

        xmlhttp.send();
    }
}
/*******End code to change   @Author: GAUR29NOV16***************/
/*******End code to change file for raw mwtal sell del list  @Author:SHE10FEB16***************/
/*******End code to change file for raw mwtal sell del list  @Author:SHE05FEB16***************/
function stockGlobalFunctionToCloseDiv() {
    document.getElementById('messDisplayDiv').innerHTML = '';
}
/*******End code to change div of stock @Author:PRIYA25DEC13***************/
/*****Start code to add function @Author:PRIYA28DEC13***********************************/
function clearMessage() {
    window.setTimeout(messDisplay, 1500);
}
function messDisplay() {
    document.getElementById('messDisplay').innerHTML = '';
}
/*****End code to add function @Author:PRIYA28DEC13***********************************/
/*********Start code to add function @Author:PRIYA29JAN14*******************/
/*********Start code to add panel @Author:PRIYA20JUN14********************/
var metalPanel;
var metalCount;
var getMetalDiv = 1;
function get_more_raw_metal_div(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertGetMoreRawMetalDiv;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertGetMoreRawMetalDiv() {
    var metmin = metalCount - 1;
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("metalDiv" + metmin).value = 'false';
        document.getElementById("payRawMetalDiv" + metalCount).innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/******Start code to add panel SuppWholeDep @Author:PRIYA30APR15****************/
/******Start code to remove SuppWholeDep @Author:PRIYA02MAYR15****************/
function getMoreRawMetalDiv(metalCnt, panelName, firmId, rawGdPreId, rawGdPostId, metalType, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
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
        get_more_raw_metal_div('include/php/ogcmpydt' + default_theme + '.php', poststr);
    return false;
}
/******End code to remove SuppWholeDep @Author:PRIYA02MAYR15****************/
/******End code to add panel SuppWholeDep @Author:PRIYA30APR15****************/
/*********End code to add function @Author:PRIYA02JAN13*******************/
/*********Start code to add function to close Metal div @Author:PRIYA29DEC13**********/
var delRawString = '';
function closeRawMetalDiv(metalCnt, panelName) {
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
        calcItemBalance();
}
/*********End code to add panel @Author:PRIYA20JUN14********************/
/*********End code to add function to close Metal div @Author:PRIYA29JAN14**********/
/***********Start code add func To Select Raw Metal @Author:PRIYA02JAN13**************************/
/*********End code to add panel @Author:PRIYA20JUN14********************/
/****************START CODE FOR ADD SEARCH RAW METAL ITEMS BY METAL TYPE @SIMRAN:06FEB2024*************/
/******************************************************************************************************/
function getRawMetalMetType(panelName, metalType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalStock").innerHTML = xmlhttp.responseText;
            // calcItemBalance();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogrmmeltselectionlist" + default_theme + ".php?panelName=" + panelName + "&metalType=" + metalType, true);
    xmlhttp.send();
}
/******************************************************************************************************/
/****************END CODE FOR ADD SEARCH RAW METAL ITEMS BY METAL TYPE @SIMRAN:06FEB2024***************/
/******************************************************************************************************/
/****************Start code to add panel @Author:PRIYA19SEP14***************/
function getRawMetalType(panelName, metalType, metalCount, firmId, rawGdPreId, rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId, metalTypePanel, cntr) {
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
    if (panelName == 'SuppRawDep') {
        xmlhttp.open("POST", "include/php/ogwurwdv" + default_theme + ".php?panelName=" + panelName + "&metalType=" + metalType +
                "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
                "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&firmId=" + firmId +
                "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("POST", "include/php/ogcmpydt" + default_theme + ".php?panelName=" + panelName + "&metalType=" + metalType +
                "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
                "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId + "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
                "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr, true);
        xmlhttp.send();
    }
}
/****************End code to add panel @Author:PRIYA19SEP14***************/
/*********End code to add panel @Author:PRIYA20JUN14********************/
/***********End code add func Toi Select Raw Metal @Author:PRIYA02JAN14**************************/
/*****Start code to add function for raw accounts @Author:PRIYA07JAN14*********/
var rawPanel;
var rawPrefix;
var rawCount;
var rawNextFieldId;
function get_firm_raw_acc_no(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertGetFirmRawAccNo;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertGetFirmRawAccNo() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById(rawPrefix + "PayAccId1" + rawCount).innerHTML = xmlhttp.responseText;
        document.getElementById(rawNextFieldId).focus();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function getFirmRawAccNo(selectedFirmNo, rawmCount, prefix, panelName, metalType, nextFieldId) {
    rawNextFieldId = nextFieldId;
    rawPanel = panelName;
    rawPrefix = prefix;
    rawCount = rawmCount;
    var poststr = "firmNo=" + encodeURIComponent(selectedFirmNo) +
            "&panelName=" + encodeURIComponent(panelName) +
            "&prefix=" + encodeURIComponent(prefix) +
            "&rawmCount=" + encodeURIComponent(rawmCount) +
            "&metalType=" + encodeURIComponent(metalType);
    get_firm_raw_acc_no('include/php/ommpfacc' + default_theme + '.php', poststr);
}
/*****End code to add function for raw accounts @Author:PRIYA07JAN14**********/
//function capture(div) {
////    div.html2canvas({
////        onrendered: function(canvas) {
////            //Set hidden field's value to image data (base-64 string)
////            document.getElementById("img_val").val(canvas.toDataURL("http://127.0.0.1:8080/omunim/include/php/image/png"));
////          document.body.appendChild(canvas);
////            //Submit the form manually
////            document.getElementById("dd_form").submit();
////        }
////    });
//html2canvas([document.getElementById('div')], {
//    onrendered: function (canvas) {
//        document.getElementById('canvas').appendChild(canvas);
//        var data = canvas.toDataURL('image/png');
//        // AJAX call to send `data` to a PHP file that creates an image from the dataURI string and saves it to a directory on the server
//
//        var image = new Image();
//        image.src = data;
//        document.getElementById('img_val').appendChild(image);
//    }
//});
//
//}
//
////function capture(div) {
////var image = new Image();
////        image.src = canvas.toDataURL("http://127.0.0.1:8080/omunim/include/php/image/png");
////        alert(image);
////         document.getElementById("img_val").value = image;
////       
////         document.getElementById("dd_form").submit();
////       
//////}
/*************Start code to add class @Author:PRIYA09JAN14*********************/
//function submitForm() {
//    document.getElementById("dd_form").submit();
//    return true;
//}
//function submitLnBkForm() {
//    document.getElementById("lnbk_form").submit();
//    return true;
//}
/*************End code to add class @Author:PRIYA09JAN14*********************/
/*************Start code to add function @Author:PRIYA06FEB14********************/
function sendStockForMelting() {
    loadXMLDoc();
    var documentRootPath = document.getElementById('documentRootPath').value;
    //
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            showRawMetalList('MeltingTransList', '', '1');
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
        //
    };
    const form = document.getElementById('add_raw_stock');
    const formFields = form.querySelectorAll('input, select, textarea');
    var poststr = "rawPanelName=AddRawStock";
    formFields.forEach(field => {
        poststr = poststr + '&' + field.name + "=" + field.value;
    });
    xmlhttp.open("POST", documentRootPath + "/include/php/ogrwmtad.php?" + poststr, true);
    xmlhttp.send();
}
/*************Start code to add function @Author:SHE20JAN16********************/
function addRawStock() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addRawStockSubButtDiv").style.visibility = "hidden";
    var stockDateDay = document.getElementById("addItemDOBDay").value;
    var stockDateMMM = document.getElementById("addItemDOBMonth").value;
    var stockDateYY = document.getElementById("addItemDOBYear").value;
    var stockDateStr = document.getElementById("addItemDOBMonth").value + ' ' + document.getElementById("addItemDOBDay").value + ', ' + document.getElementById("addItemDOBYear").value;
    var stockDate = new Date(stockDateStr); // stock Date
    var todayDate = new Date(); // Today Date

    var milliStockDate = stockDate.getTime();
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
        document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
    } else {
        if (stockDateMMM == 'FEB' || stockDateMMM == 'APR' || stockDateMMM == 'JUN' || stockDateMMM == 'SEP' || stockDateMMM == 'NOV') {
            if (stockDateMMM == 'FEB' && stockDateDay > 29 && stockDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
            }
            if (stockDateMMM == 'FEB' && stockDateDay > 28 && stockDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
            }
            if (stockDateDay > 30) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' has only max 30 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
            }
        }
        if (document.getElementById('payButClickId').value == 'true') {
            var prefix = document.getElementById("prefix").value;
            var payPanelName = document.getElementById("upPanel").value;
            if (payPanelName == 'AddPanel') {
                document.getElementById("totMetal").value = getMetalDiv;
            } else if (payPanelName == 'UpPanel') {
                document.getElementById("totMetal").value = document.getElementById("noOfRawMet").value;
            }
            return true;
        } else {
            if (document.getElementById("userMainPanel").value == 'Supplier') {
                functionName = validateAddSuppRawStockInputs;
            } else {
                var functionName = validateAddRawStockInputs;
            }
            if (functionName()) {
                return true;
            }
        }
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
        return false;
    }
    return false;
//    }
}
function addCrystalIssueStock() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addRawStockSubButtDiv").style.visibility = "hidden";
    var stockDateDay = document.getElementById("addCryIsueDOBDay").value;
    var stockDateMMM = document.getElementById("addCryIsueDOBMonth").value;
    var stockDateYY = document.getElementById("addCryIsueDOBYear").value;
    var stockDateStr = document.getElementById("addCryIsueDOBMonth").value + ' ' + document.getElementById("addCryIsueDOBDay").value + ', ' + document.getElementById("addCryIsueDOBYear").value;
    var stockDate = new Date(stockDateStr); // stock Date
    var todayDate = new Date(); // Today Date

    var milliStockDate = stockDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliStockDate;
    if (datesDiff < 0) {
        alert('Please Select the correct Date!');
        document.getElementById("addCryIsueDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
    } else {
        if (stockDateMMM == 'FEB' || stockDateMMM == 'APR' || stockDateMMM == 'JUN' || stockDateMMM == 'SEP' || stockDateMMM == 'NOV') {
            if (stockDateMMM == 'FEB' && stockDateDay > 29 && stockDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("addCryIsueDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
            }
            if (stockDateMMM == 'FEB' && stockDateDay > 28 && stockDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("addCryIsueDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
            }
            if (stockDateDay > 30) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' has only max 30 days.');
                document.getElementById("addCryIsueDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
            }
        }
        if (document.getElementById('payButClickId').value == 'true') {
            var prefix = document.getElementById("prefix").value;
            var payPanelName = document.getElementById("upPanel").value;
            if (payPanelName == 'AddPanel') {
                document.getElementById("totMetal").value = getMetalDiv;
            } else if (payPanelName == 'UpPanel') {
                document.getElementById("totMetal").value = document.getElementById("noOfRawMet").value;
            }
            return true;
        } else {
            if (document.getElementById("userMainPanel").value == 'Supplier') {
                functionName = validateAddSuppRawStockInputs;
            } else {
                var functionName = validateAddRawStockInputs;
            }
            if (functionName()) {
                return true;
            }
        }
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
        return false;
    }
    return false;
//    }  
}
function checkCryIsueField() {
//alert('hii');
    if (document.getElementById('panelName').value == 'CryIsueSellPayUp' && document.getElementById('noOfInv').value > 0) {
        alert('You can not update this item');
        return false;
    } else {
        if (validateSelectField(document.getElementById("addCysIsueDOBDay").value, "Please select Day!") == false) {
            document.getElementById("addCysIsueDOBDay").focus();
            return false;
        } else if (validateSelectField(document.getElementById("addCysIsueDOBMonth").value, "Please select Month!") == false) {
            document.getElementById("addCysIsueDOBMonth").focus();
            return false;
        } else if (validateSelectField(document.getElementById("addCryIsueDOBYear").value, "Please select Year!") == false) {
            document.getElementById("addCryIsueDOBYear").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_invoice_no").value, "Please enter Invoice Number!") == false ||
                validateNum(document.getElementById("sttr_invoice_no").value, "Accept only numeric characters without space character!") == false) {
            document.getElementById("sttr_invoice_no").focus();
            return false;
        } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm!") == false) {
            document.getElementById("firmId").focus();
            return false;
        } else if (validateSelectField(document.getElementById("sttr_account_id").value, "Please select Account Name!") == false) {
            document.getElementById("sttr_account_id").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please enter Item Name!") == false) {
            document.getElementById("sttr_item_name").focus();

        } else if (validateEmptyField(document.getElementById("sttr_quantity").value, "Please enter Crystal Quantity!") == false ||
                validateNum(document.getElementById("sttr_quantity").value, "Accept only numeric characters without space!") == false) {
            document.getElementById("sttr_quantity").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_gs_weight").value, "Please enter Gross Weight!") == false ||
                validateNumWithDot(document.getElementById("sttr_gs_weight").value, "Accept only numeric characters without space!") == false) {
            document.getElementById("sttr_gs_weight").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_sell_rate").value, "Please enter Crystal Rate!") == false) {
            document.getElementById("sttr_sell_rate").focus();
            return false;
        }
//    else if (validateEmptyField(document.getElementById("slPrItemCryTax").value, "Please enter Crystal Tax!") == false ||
//            validateNum(document.getElementById("slPrItemCryTax").value, "Accept only numeric characters without space!") == false) {
//        document.getElementById("slPrItemCryTax").focus();
//        return false;
//
//    }
        else
            return true;
    }

}

/*************End code to add function @Author:SHE20JAN16********************/
/*************End code to add function @Author:PRIYA06FEB14********************/
/*************Start code to add function @Author:PRIYA30JAN14**********/
function checkWeight(rawPreId, rawPostId, recWt, recWtType, panelName, rwSlStatus) {
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
    xmlhttp.open("POST", "include/php/ogrwwtch" + default_theme + ".php?rawPreId=" + rawPreId + "&rawPostId=" + rawPostId + "&recWt=" + recWt + "&recWtType=" + recWtType, true);
    xmlhttp.send();
    // return false;
}
/*************End code to add function @Author:PRIYA30JAN14**********/
/*************Start code to add function @Author:PRIYA27JAN14**************/
function searchRelGirviByGirviId(girviId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olgsgidd" + default_theme + ".php?girviId=" + girviId + "&panelDivName=" + panelName, true);
    xmlhttp.send();
}
/*************End code to add function @Author:PRIYA27JAN14**************/
/*************Start code to add function @Author:PRIYA30JAN14***********/
function valKeyPressedForAlphaNum(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if ((charCode == 8 || charCode == 13) || (charCode > 47 && charCode < 58) || (charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)) {
        return true;
    } else if ((charCode > 57 || charCode < 65)) {
        return false;
    }
    return true;
}
/*************End code to add function @Author:PRIYA30JAN14***********/
/******************Start code to add common print function @Author:PRIYA05FEB14************/
/******************Start code to add width @Author:PRIYA28MAY14***************************/
function printOmgoldPageDiv(obj, headerId) {
//alert("hiii");
    var DocumentContainer = document.getElementById(obj);
    if (headerId != '') {
        var head;
        head = document.getElementById(headerId);
        head.style.position = "relative";
        head.style.top = "0px"
        head.style.visibility = "visible"; //visibility changed @Author:PRIYA27JAN14
    }
    /* START CODE TO ADD STYLE & ALIGN PARAMETER TO PRINT DIV FOR SCHEME PASSBOOK PRINT @AUTHOR:MADHUREE-19AUG2020 */
    var divWidth = 'width';
    var divStyle = '';
    var divAlign = 'align=center';
    if (typeof (document.getElementById('divStyle')) != 'undefined' && (document.getElementById('divStyle') != null)) {
        divStyle = document.getElementById('divStyle').value;
        divAlign = '';
    }
    /* END CODE TO ADD STYLE & ALIGN PARAMETER TO PRINT DIV FOR SCHEME PASSBOOK PRINT @AUTHOR:MADHUREE-19AUG2020 */
    var html = '<html><head><title>Online Munim - Print Page    www.OnlineMunim.com     www.omunim.com</title>' +
            '<link href="css/invoice.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/print.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/index.css" rel="stylesheet" type="text/css" />' +
            '<link href="assets/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css"/>' +
//            '<link href="css/style.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/orcss.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/ogcss.css" rel="stylesheet" type="text/css" />' +
            '<link rel="stylesheet" type="text/css" href="css/custom.css"/>' +
            '<script type="text/javascript" src="scripts/emNavigation.js"></script>' +
            '<script type="text/javascript" src="scripts/emValidate.js"></script>' +
            '<script type="text/javascript" src="scripts/emAddOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/emOwnerLogin.js"></script>' +
            '<script type="text/javascript" src="scripts/emUpdateOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/accBalance.js"></script>' +
            '<script type="text/javascript" src="scripts/ogNavFunction.js"></script>' +
            '<script type="text/javascript" src="scripts/orAddFunction_1_6_1.js"></script>' +
            '<script type="text/javascript" src="scripts/ogAddFunctions_1_6_1.js"></script>' +
            '</head><body>' +
            '<table id="' + divAlign + '" style="' + divStyle + '" width="100%">' + '<tr><td align=center>' +
            '<div id="' + obj + '">' +
//            '<table align=center width=divWidth>' + '<tr><td align=center width=divWidth>' +
//            '<div class="' + divWidth + '" id="' + obj + '">' +
            DocumentContainer.innerHTML +
            '</div>' +
            '</td></tr>' +
            '<tr><td  align=center><a style="cursor: pointer;" onClick="window.print();"><img src="images/printer32.png" class="noPrint" alt="Print" title="Print" width="32px" height="32px" /></a>' +
            '</td></tr></table>' + '</body></html>';
    var WindowObject = window.open("", "PrintWindow", "width=1050,height=900,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");
    WindowObject.document.open();
    WindowObject.document.writeln(html);
    WindowObject.document.close();
    WindowObject.focus();
}
/******************End code to add width @Author:PRIYA28MAY14***************************/
/******************End code to add common print function @Author:PRIYA05FEB14************/
/*********Start code to add function @Author:PRIYA10FEB14***********/
var div;
function closeMessDiv(divName, message) {
    div = divName;
    document.getElementById(div).innerHTML = "<span class='fs_14 ff_calibri reddish'>" + message + " SUCCESSFULLY</span>";
    window.setTimeout(delayFunction, 1500);
    function delayFunction() {
        document.getElementById(div).innerHTML = "";
    }
}
/*********End code to add function @Author:PRIYA10FEB14***********/
/*************Start code to add function @Author:PRIYA20FEB14**************/
var subStatus;
function getSmsTemplate(smtpId, smsTempId, smsTempText, smsType, panelName, smsTempOwner, message) {
    if ((panelName == 'smsTempAdd') && (document.getElementById('smsTempId').value == '' || document.getElementById('smsTempText').value == '')) {
        if (document.getElementById('smsTempId').value == '') {
            alert('Please Enter Template Id!');
            document.getElementById("smsTempId").focus();
        } else if (document.getElementById('smsTempText').value == '') {
            alert('Please Enter Template!');
            document.getElementById("smsTempText").focus();
        }
    } else if (panelName == 'smsTempDelete' && smsTempOwner == 'omunim') {
        alert('Template added by omunim,User can not delete this Template ! ');
    } else {
        var smtp_staff_id = document.getElementById('smtp_staff_id').value;
//        if ((panelName == 'smsTempAdd' || panelName == 'smsTempUpdate') && document.getElementById('smsTempId').value != '') {
//            loadXMLDoc();
//            xmlhttp.onreadystatechange = function() {
//                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                    subStatus = xmlhttp.responseText;
//                    if (subStatus == 'SUBPRESENT') {
//                        alert('Subject Already Present! Please Enter another Subject');
//                        document.getElementById("smsTempId").focus();
//                    }
//                }
//            };
//            xmlhttp.open("POST", "include/php/omsmstpc" + default_theme + ".php?smsTempId=" + smsTempId, true);
//            xmlhttp.send();
//        } else {
//            subStatus = 'SUCCESS';
//        }
//        if (subStatus == 'SUCCESS') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'smsTempAdd') {
                    document.getElementById("smsTempAddButt").style.visibility = "visible";
                } else if (panelName == 'smsTempUpdate' || panelName == 'smsTempDelete') {
                    document.getElementById("smsTempUpdateButt").style.visibility = "visible";
                    document.getElementById("smsTempDeleteButt").style.visibility = "visible";
                }
                document.getElementById("smsTempDiv").innerHTML = xmlhttp.responseText;
                if (panelName == 'smsTempAdd' || panelName == 'smsTempUpdate' || panelName == 'smsTempDelete') {
                    closeMessDiv('smsMessDisplayDiv', message);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                if (panelName == 'smsTempAdd') {
                    document.getElementById("smsTempAddButt").style.visibility = "hidden";
                } else if (panelName == 'smsTempUpdate' || panelName == 'smsTempDelete') {
                    document.getElementById("smsTemDoagpUpdateButt").style.visibility = "hidden";
                    document.getElementById("smsTempDeleteButt").style.visibility = "hidden";
                }
            }
        };
        xmlhttp.open("POST", "include/php/omsmstmp" + default_theme + ".php?smtpId=" + smtpId + "&smsTempId=" + smsTempId + "&smsTempText=" + encodeURIComponent(smsTempText) + "&smsType=" + smsType + "&smtp_staff_id=" + smtp_staff_id + "&panelName=" + panelName, true);
        xmlhttp.send();
        //}
    }
}
function navigationSmsTemp(pageNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("smsTempDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omsmstmp" + default_theme + ".php?page=" + pageNo, true);
    xmlhttp.send();
}
/*************End code to add function @Author:PRIYA20FEB14**************/
/*************Start code to add func to sort girvi in cust home @Author:PRIYA27FEB14**************/
function searchGirviInCustHomePanel(documentRootPath, searchColumn, searchValue, selFirmId, custId) {
    //alert(searchValue.length);
    if (searchValue.length == 0 || searchValue.length == 'NULL') {
        searchValue = '';
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("activeGirvListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omchacgv" + default_theme + ".php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&custId=" + custId, true);
    xmlhttp.send();
}
function getvalue(e) {
    //if( e.which == 8 || e.which == 46 ) return false;
    var recentChar = String.fromCharCode(e.which);
    var val = document.getElementById('custHomeLoanSNo').value + recentChar;
    // alert(val);
    document.getElementById("textboxval").value = val;

}

/*************End code to add func to sort girvi in cust home @Author:PRIYA27FEB14**************/
/*************Start code to add func to sort girvi in cust home for Release @Author:PRIYA27FEB14**************/
function searchRelGirviInCustHomePanel(documentRootPath, relSearchColumn, relSearchValue, relSelFirmId, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("relGirvListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omchrlgv" + default_theme + ".php?relSearchColumn="
            + relSearchColumn + "&relSearchValue=" + relSearchValue + "&relSelFirmId=" + relSelFirmId + "&custId=" + custId, true);
    xmlhttp.send();
}
/*************End code to add func to sort girvi in cust home  for Release@Author:PRIYA27FEB14**************/
/*************Start code to add func to search list @Author:PRIYA28FEB14**************/
/*************Start code to add panel for seraching @Author:DEEP08JUL14****************/
/*************Start code to add and change panel @Author:PRIYA05OCT14*********************/
/*************Start code to add param empLoginId @Author:PRIYA13JAN15*********************/
/*************Start code update @Author:GAUR19OCT16*********************/
function searchList(documentRootPath, searchColumn, searchValue, selFirmId, custId, empLoginId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'soldOutList' || panelName == 'returnedList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsldt" + default_theme + ".php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&custId=" + custId + "&empLoginId=" + empLoginId + "&panel=" + panelName, true);
    else if (panelName == 'soldOutImtList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisldt" + default_theme + ".php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&custId=" + custId + "&empLoginId=" + empLoginId + "&panel=" + panelName, true);
    else if (panelName == 'soldOutImtInv')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogsipsblt" + default_theme + ".php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&custId=" + custId + "&empLoginId=" + empLoginId + "&panel=" + panelName, true);
    else
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsblt" + default_theme + ".php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&custId=" + custId + "&empLoginId=" + empLoginId + "&panel=" + panelName, true);
    xmlhttp.send();
}
function sortList(documentRootPath, sortKeyword, selFirmId, custId, empLoginId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'soldOutList' || panelName == 'returnedList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsldt" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&custId=" + custId
                + "&empLoginId=" + empLoginId + "&panel=" + panelName, true);
    else if (panelName == 'soldOutImtList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisldt" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&custId=" + custId
                + "&empLoginId=" + empLoginId + "&panel=" + panelName, true);
    else if (panelName == 'soldOutImtInv')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogsipsblt" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&custId=" + custId
                + "&empLoginId=" + empLoginId + "&panel=" + panelName, true);
    else
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsblt" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&custId=" + custId
                + "&empLoginId=" + empLoginId + "&panel=" + panelName, true);
    xmlhttp.send();
}
/*************END code update @Author:GAUR19OCT16*********************/
/*************End code to add param empLoginId @Author:PRIYA13JAN15*********************/
/*************End code to add and change panel @Author:PRIYA05OCT14*********************/
/*************End code to add panel for seraching @Author:DEEP08JUL14****************/
/*************End code to add func to sort girvi in cust home @Author:PRIYA28FEB14**************/
/*************Start code to add function to delete roi @Author:PRIYA01MAR14**********************/
/*************Start code to add alert for roi 1 @Author:PRIYA13MAY14**********************/
/*************Start code to add param @Author:PRIYA01JUL14**************/
function deleteROI(roiId, roiChecked, panelName, roiType, roiValue) {
    if (roiChecked == 'checked') {
        alert("This is selected option ! Before delete, please select another option !");
    } else if (roiId == 1) {
        alert("1 is permanently set ! please select another option to delete !");
    } else {
        confirm_box = confirm("Do you really want to delete ?");
        if (confirm_box == true)
        {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
                    window.setTimeout(messageCloseDiv, 1000);
                } else {

                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            xmlhttp.open("GET", "include/php/oldelroi" + default_theme + ".php?roiId=" + roiId + "&panelName=" + panelName + "&roiType=" + roiType + "&roiValue=" + roiValue, true);
            xmlhttp.send();
        }
    }
}
/*************End code to add param @Author:PRIYA01JUL14**************/
/*************End code to add alert for roi 1 @Author:PRIYA13MAY14**********************/
/*************End code to add function to delete roi @Author:PRIYA01MAR14**********************/
/***********Start code to add function for udhaar panel @Author:PRIYA18MAR14***********/
var udahaarItemCount;
var getUdhaarItemDiv;
var getCrysDivByKey; //var added @Author:PRIYA24SEP13
function get_more_udhaar_item_div(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertGetMoreUdhaarItemDiv;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertGetMoreUdhaarItemDiv() {
    var udharrItemMin = udahaarItemCount - 1;
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("udhaarItemVar" + udharrItemMin).value = 'false';
        document.getElementById("addUdhaarItemDiv" + udahaarItemCount).innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function getMoreUdhaarItemDiv(udhaarItmCnt, panelName) {
    udahaarItemCount = udhaarItmCnt;
    if (udahaarItemCount != '') {
        getUdhaarItemDiv = udahaarItemCount;
    }
    var poststr = "udhaarItmCnt=" + udhaarItmCnt;
    get_more_udhaar_item_div('include/php/omuuiadv' + default_theme + '.php', poststr);
    return false;
}
function closeUdhaarItemDiv(udhaarItmCnt, panelName) {

    var udharrItemMin = udhaarItmCnt - 1;
    var d = udahaarItemCount - 1;
    var a = d - 1;
    document.getElementById("udhaarItemDel" + udhaarItmCnt).value = 'Deleted';
    if ((a == udharrItemMin || d == udharrItemMin) && udharrItemMin != 0) {
        if (document.getElementById("udhaarItemDel" + udharrItemMin).value != 'Deleted') {
            document.getElementById("udhaarItemVar" + udharrItemMin).value = 'true';
        }
    }
    if (udharrItemMin == 0) {
        document.getElementById("udhaarItemVar" + udhaarItmCnt).value = 'true';
    }
    document.getElementById("udhaarItemDiv" + udhaarItmCnt).innerHTML = "";
}
/***********End code to add function for udhaar panel @Author:PRIYA18MAR14***********/
/*****************Start code to add function @Author:PRIYA19MAR14***********/
/*****************Start code to add panel @Author:PRIYA11JUN14***********************/
function getUdhaarFirmSerialNo(selectedFirmNo, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("udhaarSerialNoDiv").innerHTML = xmlhttp.responseText;
            getFirmAccountNo(selectedFirmNo, panel);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omuusrno" + default_theme + ".php?firmNo=" + selectedFirmNo + "&panel=" + panel, true);
    xmlhttp.send();
}
//
// START CODE TO ADDED FUNCTION FOR GET SCEHME FIRM  ID @SIMRAN:28APR203//
//
function getKittyFirmId(selectedFirmNo, panel) {
    //alert('panel =1= ' + panel);
    //alert('selectedFirmNo =1= ' + selectedFirmNo);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("udhaarSerialNoDiv").innerHTML = xmlhttp.responseText;
            getKittyFirmAccountNo(selectedFirmNo, panel);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omuusrno" + default_theme + ".php?firmNo=" + selectedFirmNo + "&panel=" + panel, true);
    xmlhttp.send();
}
//
//
//
function getKittyFirmAccountNo(selectedFirmNo, panelName) {
    //alert('panelName =2= ' + panelName);
    //alert('selectedFirmNo =2= ' + selectedFirmNo);
    panelNameDiv = panelName;
    selFirmNo = selectedFirmNo;
    var poststr = "firmNo=" + encodeURIComponent(selectedFirmNo) +
            "&panelName=" + encodeURIComponent(panelName);
    get_firm_account_no('include/php/ommpfacc.php', poststr);
}
//
//END CODE TO ADDED FUNCTION FOR GET SCEHME FIRM  ID @SIMRAN:28APR203//
//
/*****************End code to add panel @Author:PRIYA11JUN14***********************/
/***********Start code to chnage function @Author:PRIYA29MAR14*************/
/***********Start code to add panel @Author:PRIYA13NOV14************************/
//
//
function getUdhaarUpdateDiv(udhaarId, panelDiv) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelDiv == 'custUdhaarDetailsPrintDiv') {
                document.getElementById("custUdhaarDetailsPrintDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("addNewUdhaarDiv").innerHTML = xmlhttp.responseText;
                document.getElementById("udhaarMaindiv").innerHTML = '<font color=brown>UPDATE UDHAAR DETAILS</font>';
            }
            //document.getElementById("ajaxCloseAddNewUdhaar").innerHTML = '';
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelDiv == 'UdhaarWithEMI' || panelDiv == 'UdhaarList')
        xmlhttp.open("GET", "include/php/omuemidv" + default_theme + ".php?udhaarId=" + udhaarId + "&panelName=" + 'UpdateUdhaar', true);
    else
        xmlhttp.open("GET", "include/php/omuanwdt" + default_theme + ".php?udhaarId=" + udhaarId + "&panelName=" + 'UpdateUdhaar', true);
    xmlhttp.send();
}
//
//
/***********End code to add panel @Author:PRIYA13NOV14************************/
/***********End code to chnage function @Author:PRIYA29MAR14*************/
/***************Start code to add param @Author:PRIYA26MAR14*************/
/*********Start code to add var @Author:PRIYA14APR14************************/
function getUdhaarDepUpdateDiv(udhaarDepId, udhaarId, custId, firmId, udhaarSerialNum) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("udhaarDepositMoneyDiv" + udhaarId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omuudpmd" + default_theme + ".php?udhaarDepId=" + udhaarDepId + "&panelName=" + 'UpdateUdhaar' + "&udhaarId=" + udhaarId +
            "&custId=" + custId + "&firmId=" + firmId + "&udhaarSerialNum=" + udhaarSerialNum, true);
    xmlhttp.send();
}
/*********End code to add var @Author:PRIYA14APR14************************/
/***************End code to add param @Author:PRIYA26MAR14*************/
function closeUdhaarUpdDiv(custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
//            closeMessDiv('udhaarClosediv', 'PANEL CLOSED'); 
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omuudetl" + default_theme + ".php?custId=" + custId, true);
    xmlhttp.send();
}
/*****************End code to add function @Author:PRIYA19MAR14***********/
/*************Start code to add function @Author:PRIYA27MAR14****************/
function validateCustomizedNoticeSetup() {
    if (validateEmptyField(document.getElementById("cutmNotice").value, "Please select Content!") == false) {
        document.getElementById("cutmNotice").focus();
        return false;
    }
    return true;
}
function customizedNoticeSetup() {

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("customNoticeSubmitButt").style.visibility = "hidden";
    if (validateCustomizedNoticeSetup()) {
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("customNoticeSubmitButt").style.visibility = "visible";
    }
    return false;
}
/*************End code to add function @Author:PRIYA27MAR14****************/
/*************Start code to add func to sort in cust home panel @Author:PRIYA03APR14**************/
function sortGirviInCustHome(documentRootPath, sortKeyword, selFirmId, custId, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'release') {
                document.getElementById("relGirvListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("activeGirvListDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'release') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omchrlgv" + default_theme + ".php?sortKeyword="
                + sortKeyword + "&selFirmId=" + selFirmId + "&custId=" + custId, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/omchacgv" + default_theme + ".php?sortKeyword="
                + sortKeyword + "&selFirmId=" + selFirmId + "&custId=" + custId, true);
    }
    xmlhttp.send();
}
/*************End code to add func to sort in cust home panel @Author:PRIYA03APR14**************/
/***********Start code to add panel @Author:PRIYA09APR14*************/
function getCustCommentDiv(custId, panelName)
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
    xmlhttp.open("GET", "include/php/omcdcddv" + default_theme + ".php?custId=" + custId + "&custPanel=" + panelName, true);
    xmlhttp.send();
}
/***********End code to add panel @Author:PRIYA09APR14*************/
/**************Start code to add fun Ledger Detail @Author:PRIYA10APR14******************/
/**************Start code to add condition for Ledger Detail @Author:RUTUJA04MAR21******************/
function getLoanStatusInLedgerDetail(FrmDay, FrmMonth, FrmYear, ToDay, ToMonth, ToYear, firmId, loanType, panel, indicator) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerDetDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var girviLedgerDetStartDate = FrmDay + " " + FrmMonth + " " + FrmYear;
    var girviLedgerDetEndDate = ToDay + " " + ToMonth + " " + ToYear;
    if (indicator == 'OMREVODETAILS') {
        xmlhttp.open("POST", "include/php/ombbglrpdv" + default_theme + ".php?firmId=" + firmId + "&girviLedgerDetStartDate=" + girviLedgerDetStartDate + "&girviLedgerDetEndDate=" + girviLedgerDetEndDate
                + "&loanType=" + loanType + "&indicator=" + indicator, true);
    } else {
        xmlhttp.open("POST", "include/php/ombbgldv" + default_theme + ".php?firmId=" + firmId + "&girviLedgerDetStartDate=" + girviLedgerDetStartDate + "&girviLedgerDetEndDate=" + girviLedgerDetEndDate
                + "&loanType=" + loanType, true);
    }
    xmlhttp.send();
}
/**************END code to add condition for Ledger Detail @Author:RUTUJA04MAR21******************/
/**************End code to add fun Ledger Detail @Author:PRIYA10APR14******************/
/**************Start code to add fun for system log panel @Author:PRIYA11APR14******************/
function searchSystemLogPanel(sysLogTransId, documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage, pageNo, panel) {
//    alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("systemLogPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'LoanNoticeLogList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/olglnlog" + default_theme + ".php?startDate=" + searchColumn + "&endDate=" + searchValue
                + "&sysLogTransId=" + sysLogTransId + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&page=" + pageNo + "&panel=" + panel, true);
    } else if (panel == 'LoanLogList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ollonlog" + default_theme + ".php?startDate=" + searchColumn + "&endDate=" + searchValue
                + "&sysLogTransId=" + sysLogTransId + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&page=" + pageNo + "&panel=" + panel, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ommpsslg" + default_theme + ".php?searchColumn=" + searchColumn + "&searchValue=" + searchValue
                + "&sysLogTransId=" + sysLogTransId + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&page=" + pageNo + "&panel=" + panel, true);
    }
    xmlhttp.send();
}
/**************End code to add fun for system log panel @Author:PRIYA11APR14******************/
/**************Start code to add fun for paging in system log panel @Author:PRIYA11APR14******************/
/**************Start code to add LoanLogList panel @Author:PRIYA02MAR15******************/
function showPageInPanel(documentRootPath, pageNo, panel, rowsPerPage, selFirmId, sortKeyword, searchColumn, searchValue, noOfPagesAsLink) {
//    alert(panel);
    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("systemLogPanelDiv").innerHTML = xmlhttp.responseText;
                if (pageNo >= 10) {
                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            }
        };
        if (panel == 'LoanNoticeLogList') {
            xmlhttp.open("POST", documentRootPath + "/include/php/olglnlog" + default_theme + ".php?page=" + pageNo + "&startDate="
                    + searchColumn + "&endDate=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel, true);
        } else if (panel == 'LoanLogList') {
            xmlhttp.open("POST", documentRootPath + "/include/php/ollonlog" + default_theme + ".php?page=" + pageNo + "&startDate="
                    + searchColumn + "&endDate=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel, true);
        } else {
            xmlhttp.open("POST", documentRootPath + "/include/php/ommpsslg" + default_theme + ".php?page=" + pageNo + "&searchColumn="
                    + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel, true);
        }
        xmlhttp.send();
    }
}
/**************End code to add LoanLogList panel @Author:PRIYA02MAR15******************/
/**************End code to add fun for paging in system log panel @Author:PRIYA11APR14******************/
/**************Start code to date function in system log pane @Author:PRIYA11APR14******************/
/**************Start code to add LoanLogList panel @Author:PRIYA02MAR15******************/
function getDateInSystemLogPanel(sysLogTransId, documentRootPath, sdd, smm, syy, edd, emm, eyy, selFirmId, pageNo, panel, rowsPerPage, sortKeyword, searchColumn, searchValue, noOfPagesAsLink) {
//    alert(panel);
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
    if (panel == 'LoanNoticeLogList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/olglnlog" + default_theme + ".php?page=" + pageNo + "&selFirmId=" + selFirmId +
                "&sysLogTransId=" + sysLogTransId + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel + "&startDate=" + startDate + "&endDate=" + endDate, true);
    } else if (panel == 'LoanLogList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ollonlog" + default_theme + ".php?page=" + pageNo + "&selFirmId=" + selFirmId +
                "&sysLogTransId=" + sysLogTransId + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel + "&startDate=" + startDate + "&endDate=" + endDate, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ommpsslg" + default_theme + ".php?page=" + pageNo + "&searchColumn=" + searchColumn +
                "&sysLogTransId=" + sysLogTransId + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel +
                "&startDate=" + startDate + "&endDate=" + endDate, true);
    }
    xmlhttp.send();
}
/**************End code to add LoanLogList panel @Author:PRIYA02MAR15******************/
/**************End code to date function in system log pane @Author:PRIYA11APR14******************/

/**************Start code to add LoanLogList panel @Author:PRIYA02MAR15******************/
function getDateMeltingPanel(girviLedDelFrmDay, girviLedDelFrmMonth, girviLedDelFrmYear, girviLedDelToDay, girviLedDelToMonth, girviLedDelToYear, selFirmId,listPanel) {
//    alert(selFirmId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("MeltingTransactionsListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var startDate = girviLedDelFrmDay + girviLedDelFrmMonth + girviLedDelFrmYear;
    var endDate = girviLedDelToDay + girviLedDelToMonth + girviLedDelToYear;
    
    xmlhttp.open("POST", "include/php/ogrmmelting" + default_theme + ".php?startDate=" + startDate + "&endDate=" + endDate + "&selFirmId=" + selFirmId + "&listPanel=" + listPanel, true);
    xmlhttp.send();
}
/**************End code to add LoanLogList panel @Author:PRIYA02MAR15******************/

/*******Start code to add function @Author:PRIYA16APR14***************************/
function sendNotice(documentRootPath, girviId, custId, loanSerialNo, date, custName, firmId, totalPrincipalAmount, totalFinalInterest, totalAmount) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("noticeSendButtDiv").innerHTML = xmlhttp.responseText;
            window.print();
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/olgvnoti" + default_theme + ".php?girviId=" + girviId + "&custId=" + custId +
            "&loanSerialNo=" + loanSerialNo + "&date=" + date + "&custName=" + custName +
            "&firmId=" + firmId + "&totalPrincipalAmount=" + totalPrincipalAmount +
            "&totalFinalInterest=" + totalFinalInterest + "&totalAmount=" + totalAmount, true);
    xmlhttp.send();
}
/*******End code to add function @Author:PRIYA16APR14***************************/
/********Start code to add function for cust commment delete @Author:PRIYA25APR14********************/
function deleteCustComment(custCommId, custId) {
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Comment?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("commDisplayDiv").innerHTML = xmlhttp.responseText;
                // window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omcccmdl" + default_theme + ".php?custCommId=" + custCommId + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
/**********Start code to add var @Author:PRIYA26APR14*******************/
function getLoanNoticeLang(custId, girviId, totalPrincipalAmount, totalFinalInterest, totalAmount, width, height) {
    //alert(totalAmount);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_loan_notice_lang").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_loan_notice_lang").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/olgglnlg" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId + "&totalPrincipalAmount=" + totalPrincipalAmount +
            "&totalFinalInterest=" + totalFinalInterest + "&totalAmount=" + totalAmount + "&width=" + width + "&height=" + height, true);
    xmlhttp.send();
}
/**********End code to add var @Author:PRIYA26APR14*******************/
//
//******Start Function to select Customized Notice Author:DIKSHA 27FEB2019*******
//
function getLoanNoticeSelect(custId, girviId, totalPrincipalAmount, totalFinalInterest, totalAmount, width, height) {
//    alert(custId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_loan_notice_lang").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_loan_notice_lang").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/olggcufmsel" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId + "&totalPrincipalAmount=" + totalPrincipalAmount +
            "&totalFinalInterest=" + totalFinalInterest + "&totalAmount=" + totalAmount + "&width=" + width + "&height=" + height, true);
    xmlhttp.send();
}
//
//******End Function to select Customized Notice Author:DIKSHA 27FEB2019*********
//
function passLoanNoticeLang(lnsLangSel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olggnoti" + default_theme + ".php?lnsLangSel=" + lnsLangSel, true);
    xmlhttp.send();
}
/**********Start code to add panelName @Author:PRIYA02MAR15*******************/
function getLoanNoticeLog(girviId, documentRootPath, panelName) {
    poststr = "girviId=" + encodeURIComponent(girviId);
    search_girvi_by_girviId_cust_home(documentRootPath + "/include/php/olgsgiwd" + default_theme + ".php?panelDivName=" + panelName, poststr);
}
/**********End code to add panelName @Author:PRIYA02MAR15*******************/
/********End code to add function for cust commment delete @Author:PRIYA25APR14********************/
/******************Start code to add CustomizedForm function @Author:PRIYA26APR14************/
function printCustomizedForm(obj, headerId) {

    var DocumentContainer = document.getElementById(obj);
    if (headerId != '') {
        var head;
        head = document.getElementById(headerId);
        head.style.position = "relative";
        head.style.top = "0px"
        head.style.visibility = "visible"; //visibility changed @Author:PRIYA27JAN14
    }
    var html = '<html><head><title>Online Munim - Print Page    www.OnlineMunim.com     www.omunim.com</title>' +
            '<link href="css/invoice.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/print.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/index.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/ogcss.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/orcss.css" rel="stylesheet" type="text/css" />' +
//            '<link href="css/style.css" rel="stylesheet" type="text/css" />' +
            '<script type="text/javascript" src="scripts/emNavigation.js"></script>' +
            '<script type="text/javascript" src="scripts/emValidate.js"></script>' +
            '<script type="text/javascript" src="scripts/emAddOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/emOwnerLogin.js"></script>' +
            '<script type="text/javascript" src="scripts/emUpdateOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/orAddFunction_1_6_1.js"></script>' +
            '<script type="text/javascript" src="scripts/ogAddFunctions_1_6_1.js"></script>' +
            '</head><body>' +
            '<table align=left>' + '<tr><td align=left>' +
            '<div id="' + obj + '">' +
            DocumentContainer.innerHTML +
            '</div>' +
            '</td></tr>' +
            '<tr><td  align=center><a style="cursor: pointer;" onClick="window.print();"><img src="images/printer32.png" class="noPrint" alt="Print" title="Print" width="32px" height="32px" /></a>' +
            '</td></tr></table>' + '</body></html>';
    var WindowObject = window.open("", "PrintWindow", "width=1050,height=900,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");
    WindowObject.document.open();
    WindowObject.document.writeln(html);
    WindowObject.document.close();
    WindowObject.focus();
}
/******************End code to add common CustomizedForm function @Author:PRIYA26APR14************/
/*********Start code to add panel @Author:PRIYA02MAY14**************/
function setDefLangForCustomNotice(custNoticeId, defSize, panel) {                                 // Modified on KHUSH15JAN13
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppcnsl" + default_theme + ".php?custNoticeId=" + custNoticeId + "&defSize=" + defSize + "&panel=" + panel, true);
    xmlhttp.send();
}
/*********End code to add panel @Author:PRIYA02MAY14**************/
/*********Start code to add function @Author:PRIYA03MAY14**************/
/*********Start code to change alert @Author:PRIYA05MAY14**************/
/*********Start code to check if condition for un-auction loan @Author:ANUJA15MAR15**************/
function reactiveGirvi(girviId, custId, panelDivName) {
    if (panelDivName == 'girviAuctioned') {
        confirm_box = confirm("Do you really want to Un-auction this Loan ?");
    } else {
        confirm_box = confirm("Do you really want to Un-release this Loan ?");
    }
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("girviDeleteButDiv").style.visibility = "visible";
                document.getElementById("girviReactivateButDiv").style.visibility = "visible";
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                clearMessage();
            } else {
                document.getElementById("girviDeleteButDiv").style.visibility = "hidden";
                document.getElementById("girviReactivateButDiv").style.visibility = "hidden";
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/olgrgrac" + default_theme + ".php?girviId=" + girviId + "&custId=" + custId + "&panelDivName=" + panelDivName, true);
        xmlhttp.send();
    }
}
/*********End code to check if condition for un-auction loan @Author:ANUJA15MAR15**************/
/*********End code to change alert @Author:PRIYA05MAY14**************/
/*********End code to add function @Author:PRIYA03MAY14**************/
/*********Start code to add function @Author:PRIYA05MAY14**************/
function girviMoneyDepRollbackOption(girviId, custId, commentId) {
    confirm_box = confirm("Do you really want to Rollback this Transaction ?");
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
        xmlhttp.open("POST", "include/php/olggmdrb" + default_theme + ".php?girviId=" + girviId + "&custId=" + custId + "&commentId=" + commentId, true);
        xmlhttp.send();
    }
}
/*********End code to add function @Author:PRIYA05MAY14**************/
/*********Start code to add function @Author:PRIYA10MAY14********************/
function showCustomNotice(noticeType, keyCodeInput, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("custmNoticeDiv").innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('customNoticeTypListToSel').focus();
                document.getElementById('customNoticeTypListToSel').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/omcunolt" + default_theme + ".php?noticeType=" + noticeType, true);
    xmlhttp.send();
}
function setDefNoticeType(defType, panelName, cunoId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
            window.setTimeout(noticeFunctionToCloseDiv, 1500);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcunolt" + default_theme + ".php?defType=" + defType + "&panelName=" + panelName + "&cunoId=" + cunoId, true);
    xmlhttp.send();
}
function noticeFunctionToCloseDiv() {
    document.getElementById('messDisplayDiv').innerHTML = '';
}
function addNewCustomNotice(panelName, defType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppcuno" + default_theme + ".php?defType=" + defType + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/*********End code to add function @Author:PRIYA10MAY14********************/
/*********Start code to get accounts field @Author:PRIYA20MAY14**********/
/*********Start code to add param fstMonIntVal @Author:PRIYA28MAY14**********/
function getFstMonthAccountsField(fstMonIntVal, firmId) {
    setTimeout(function () {
        var mainGirvAccId = '';
        if (typeof (document.getElementById('girviPaySelAccountId')) != 'undefined' &&
                (document.getElementById('girviPaySelAccountId') != null)) {
            mainGirvAccId = document.getElementById('girviPaySelAccountId').value;
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("indicSelFirstMonth").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/olgadpac" + default_theme + ".php?firmId=" + firmId + "&fstMonIntVal=" + fstMonIntVal + "&mainGirvAccId=" + mainGirvAccId, true);
        xmlhttp.send();
    }, 500);
}
/*********Start code to add function for new finance panem EMI amount @Author:SANT05APR17**********/
/*********Start code to add function for new finance panel Total Value Calculations EMI amount @Author:ATHU10APR17**********/
function getCountTotalEmiAmount(counter) {
    var emiSum = 0
    for (var cnt = 1; cnt <= counter; cnt++) {
        var emiStatus = document.getElementById('emiStatus' + cnt).value;
        var princiAmtChk = document.getElementById('setPrincAmt' + cnt).checked;
        var intAmtChk = document.getElementById('setTotInt' + cnt).checked;
        if (emiStatus != 'Paid') {
            if (princiAmtChk == false && intAmtChk == false) {
                document.getElementById('totEmiAmount' + cnt).value = 0;
            } else if (princiAmtChk == true && intAmtChk == true) {

                document.getElementById('totEmiAmount' + cnt).value = parseFloat(parseFloat(document.getElementById('totintAmount' + cnt).value) + parseFloat(document.getElementById('totprinAmount' + cnt).value)).toFixed(2);
            } else if (princiAmtChk == true) {
                document.getElementById('totEmiAmount' + cnt).value = document.getElementById('totprinAmount' + cnt).value;
            } else if (intAmtChk == true) {
                document.getElementById('totEmiAmount' + cnt).value = parseFloat(document.getElementById('totintAmount' + cnt).value).toFixed(2);
            }
            emiSum = parseFloat(parseFloat(emiSum) + parseFloat(document.getElementById('totEmiAmount' + cnt).value));
        }
    }
    document.getElementById('totEmiSum').value = emiSum;
    // alert(emiSum);
}
/*********End code to add function for new finance panem EMI amount @Author:SANT05APR17**********/
/*********End code to add param fstMonIntVal @Author:PRIYA28MAY14**********/
/*********End code to get accounts field @Author:PRIYA20MAY14**********/
/*********Start code to get accounts field @Author:PRIYA20MAY14**********/
function getLoanBarCodeField(option, value) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barCodePrintPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olggbcad" + default_theme + ".php?option=" + option + "&value=" + value, true);
    xmlhttp.send();
}
/*********End code to get accounts field @Author:PRIYA20MAY14**********/
/********Start code to add function to update loan accounts @Author:PRIYA21MAY14**************/
/********Start code to add var @Author:PRIYA27MAY14**************/
/********Start code to add accounts @Author:PRIYA04JUL14****************/
function updateLoanAccounts(girviAccId, girviCashId, girviBankId, girviCardId, girviOnlineId, girviCashAmt, girviBankAmt, girviCardAmt, girviOnlineAmt,
        girvCashNarr, girvBankNarr, girvCardNarr, girvOnlineNarr, payOtherInfo, girviId, custId, girviJrnlId, panel, girviSerialNum, girviFirmId, girviDOB) {

    confirm_box = confirm("Do you really want to update ?");
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
        xmlhttp.open("POST", "include/php/olgaacup" + default_theme + ".php?girviAccId=" + girviAccId + "&girviCashId=" + girviCashId + "&payOtherInfo=" + payOtherInfo +
                "&girviBankId=" + girviBankId + "&girviCardId=" + girviCardId + "&girviOnlineId=" + girviOnlineId + "&girviCashAmt=" + girviCashAmt + "&girviBankAmt=" + girviBankAmt +
                "&girviCardAmt=" + girviCardAmt + "&girviOnlineAmt=" + girviOnlineAmt + "&girvCashNarr=" + girvCashNarr + "&girvBankNarr=" + girvBankNarr +
                "&girvCardNarr=" + girvCardNarr + "&girvOnlineNarr=" + girvOnlineNarr +
                "&girviId=" + girviId + "&custId=" + custId + "&girviJrnlId=" + girviJrnlId + "&panel=" + panel + "&girviSerialNum=" + girviSerialNum + "&girviDOB=" + girviDOB +
                "&girviFirmId=" + girviFirmId, true);
        xmlhttp.send();
    }
}
function updateAccountGirvi(principalAmt, girviCashAmt, girviBankAmt, girviCardAmt, girviOnlineAmt) {
    if (isNaN(principalAmt) || isNaN(girviCashAmt) || isNaN(girviBankAmt) || isNaN(girviCardAmt) || isNaN(girviOnlineAmt)) {
        alert('Invalid input. Please enter valid numeric values.');
        return false;
    }
    if (girviOnlineAmt == '') {
        girviOnlineAmt = 0;
    }
    if (girviCashAmt == '') {
        girviCashAmt = 0;
    }
    if (girviCardAmt == '') {
        girviCardAmt = 0;
    }
    if (girviBankAmt == '') {
        girviBankAmt = 0;
    }
    // Calculate total paid amount
    var totalPaidAmt = Math.round(parseFloat(girviCashAmt) + parseFloat(girviBankAmt) + parseFloat(girviCardAmt) + parseFloat(girviOnlineAmt));
    principalAmt = Math.round(principalAmt);
    if (totalPaidAmt !== principalAmt) {
        alert('Please pay the correct amount. Total should be: ' + principalAmt);
        document.getElementById("girvBankAmtPaid").focus();
        return false;
    }
    return true;
}
/********End code to add accounts @Author:PRIYA04JUL14****************/
/********End code to add var @Author:PRIYA27MAY14**************/
/********End code to add function to update loan accounts @Author:PRIYA21MAY14**************/
function exportToExcel(layoutPanel)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            alert(xmlhttp.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omppexcl" + default_theme + ".php?layoutPanel=" + layoutPanel, true);
    xmlhttp.send();
}
/*********Start code to add account div @Author:PRIYA23MAY14****************/
function getMLFirmLoanNo(firmId, panelName, crdrType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("selAccountDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ommpfacc" + default_theme + ".php?firmNo=" + firmId + "&panelName=" + panelName + "&crdrType=" + crdrType, true);
    xmlhttp.send();
}
/*********End code to add account div @Author:PRIYA23MAY14****************/
/*************Start code to add func to sort in ML home panel @Author:PRIYA30MAY14**************/
function sortGirviInMlHome(documentRootPath, sortKeyword, selFirmId, custId, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'release') {
                document.getElementById("mlReleasedLoanList").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mlActiveLoanList").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'release') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ormllnrl" + default_theme + ".php?sortKeyword="
                + sortKeyword + "&selFirmId=" + selFirmId + "&mlId=" + custId, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ormlacln" + default_theme + ".php?sortKeyword="
                + sortKeyword + "&selFirmId=" + selFirmId + "&mlId=" + custId, true);
    }
    xmlhttp.send();
}
/*************End code to add func to sort in ML home panel @Author:PRIYA30MAY14**************/
/*************Start code to add function @Author:PRIYA03JUN14*********************************/
/*************Start code to add function @Author:SANT21SEP16*********************************/
function showCustHomeByPanel(custId, invId, panel, panelDiv, subPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'NewOrder') {
        xmlhttp.open("GET", "include/php/omcdccdd" + default_theme + ".php?panelDivName=" + panel + "&custId=" + custId + "&uoin_id=" + invId +
                "&panelDiv=" + panelDiv + "&itemPanel=" + subPanel, true);
    } else if (panel == 'SellPanel') {
        xmlhttp.open("GET", "include/php/omcdccdd" + default_theme + ".php?panelDivName=" + panel + "&custId=" + custId + "&itslin_id=" + invId +
                "&panelDiv=" + panelDiv + "&panelName=" + subPanel, true);
    }
    xmlhttp.send();
}
/*************End code to add function @Author:SANT21SEP16*********************************/
/*************End code to add function @Author:PRIYA03JUN14*********************************/
/*************Start code to add function for gender @Author:PRIYA06JUN14********************/
function getCareOfNameLabel(fatherOrSpouseNameLabel, panel, fatherValue) {
    //alert(fatherOrSpouseNameLabel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            document.getElementById("careOfDiv").innerHTML = xmlhttp.responseText;
            getSexRadioLabelToAddGirvi(fatherOrSpouseNameLabel, panel);
            document.getElementById("fatherOrSpouseNameLabel").focus();
            //document.getElementById("custFatherNameForAddGirvi").placeholder = 'Customer Spouse Name';
        } else {
            //  document.getElementById("fatherOrSpouseNameDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omccspnl" + default_theme + ".php?fatherOrSpouseNameLabel=" + fatherOrSpouseNameLabel + "&panel=" + panel + "&fatherValue=" + fatherValue, true);
    xmlhttp.send();
}
/*************End code to add function for gender @Author:PRIYA06JUN14********************/


/*************Start code to add function for customized form @Author:PRIYA05JUN14******************/
/*************Start code to add panel for customized form @Author:PRIYA17JUN14******************/
function labelsForm(count, labelType, fieldName, fieldValue, fontSize, fontColor, divId, display) {
    if(fieldName == 'topMargin' || fieldName == 'formWidth' || fieldName == 'leftMargin'){
        var check = 'true';
    }else{
        var check = ''; 
    }
    if (display == 'NO' || divId == 'tncDiv' || divId == 'authSignLbDiv' || divId == 'invTitleDiv' || fieldName == 'formBorderCheck' || divId == 'footerLbDiv') {
        var check = document.getElementById("fontCheckId" + count).checked;
        // alert(check);
    }
    if (fieldName != 'firmLeftLogoCheck' && fieldName != 'firmRightLogoCheck' && fieldName != 'design' && divId != '' && fontSize == '') {
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
        xmlhttp.open("POST", "include/php/omcufoad" + default_theme + ".php?labelType=" + labelType + "&count=" + count + "&fieldName=" + fieldName + "&fieldValue=" + encodeURIComponent(fieldValue) + "&fontSize=" + fontSize +
                "&fontColor=" + fontColor + "&fieldCheck=" + check + "&panel=CustomizedFormMainPanel", true);
        xmlhttp.send();
    }
    function closeMessDetails()
    {
        document.getElementById("cuMessDisplayDiv").innerHTML = "";
    }
}
/*************End code to add panel for customized form @Author:PRIYA17JUN14******************/
/*************End code to add function for customized form @Author:PRIYA05JUN14******************/

/*************start code to add function for customized Sell Return form @Author:DNYANESHWARI 05DEC2023******************/
function openSellReturnFormDiv(divId, count, display, labelId, fieldName, fieldValue, fontSize, fontColor, fieldCheck, inputWidth, labelType, topMargin, leftMargin) {
//    alert(fieldName);return false;
//alert('fun called');
    fieldValue = encodeURIComponent(fieldValue);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            if (labelType != 'SchemeBook') {
                document.getElementById('fontSize' + count).focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omsellreturninvfmad" + default_theme + ".php?divId=" + divId + "&count=" + count + "&display=" + display + "&labelId=" + labelId + "&labelType=" + labelType + "&fieldName=" + fieldName
            + "&fieldValue=" + fieldValue + "&inputWidth=" + inputWidth + "&fontSize=" + fontSize + "&fontColor=" + fontColor + "&fieldCheck=" + fieldCheck + "&topMargin=" + topMargin + "&leftMargin=" + leftMargin, true);
    xmlhttp.send();
}



function labelsFormSellReturn(count, labelType, fieldName, fieldValue, fontSize, fontColor, divId, display) {
    var check = '';
    if (display == 'NO' || divId == 'tncDiv' || divId == 'authSignLbDiv' || divId == 'invTitleDiv' || fieldName == 'formBorderCheck' || divId == 'footerLbDiv') {
        var check = document.getElementById("fontCheckId" + count).checked;
        // alert(check);
    }
    if (fieldName != 'firmLeftLogoCheck' && fieldName != 'firmRightLogoCheck' && fieldName != 'design' && divId != '' && fontSize == '') {
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
        xmlhttp.open("POST", "include/php/omcuSellReturnfoad" + default_theme + ".php?labelType=" + labelType + "&count=" + count + "&fieldName=" + fieldName + "&fieldValue=" + encodeURIComponent(fieldValue) + "&fontSize=" + fontSize +
                "&fontColor=" + fontColor + "&fieldCheck=" + check + "&panel=CustomizedFormMainPanel", true);
        xmlhttp.send();
    }
    function closeMessDetails()
    {
        document.getElementById("cuMessDisplayDiv").innerHTML = "";
    }
}

/*************End code to add function for customized Sell Return form @Author:DNYANESHWARI 05DEC2023******************/

/*************Start code to add function @Author:PRIYA10JUN14***********************/
function closeLabel(divId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = '';
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
function openFormDiv(divId, count, display, labelId, fieldName, fieldValue, fontSize, fontColor, fieldCheck, inputWidth, labelType, topMargin, leftMargin, fieldNoPrintCheck = '') {
//    alert(fieldName);
    fieldValue = encodeURIComponent(fieldValue);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            if (labelType != 'SchemeBook' || fieldName != 'header_img') {
                document.getElementById('fontSize' + count).focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if(labelType == 'prodCert'){
    xmlhttp.open("POST", "include/php/omcufmadcert" + default_theme + ".php?divId=" + divId + "&count=" + count + "&display=" + display + "&labelId=" + labelId + "&labelType=" + labelType + "&fieldName=" + fieldName
            + "&fieldValue=" + fieldValue + "&inputWidth=" + inputWidth + "&fontSize=" + fontSize + "&fontColor=" + encodeURIComponent(fontColor) + "&fieldCheck=" + fieldCheck + "&fieldNoPrintCheck=" + fieldNoPrintCheck + "&topMargin=" + topMargin + "&leftMargin=" + leftMargin, true);
    }else{
        xmlhttp.open("POST", "include/php/omcufmad" + default_theme + ".php?divId=" + divId + "&count=" + count + "&display=" + display + "&labelId=" + labelId + "&labelType=" + labelType + "&fieldName=" + fieldName
            + "&fieldValue=" + fieldValue + "&inputWidth=" + inputWidth + "&fontSize=" + fontSize + "&fontColor=" + fontColor + "&fieldCheck=" + fieldCheck + "&fieldNoPrintCheck=" + fieldNoPrintCheck + "&topMargin=" + topMargin + "&leftMargin=" + leftMargin, true);
    }
    xmlhttp.send();
    
}
/*************End code to add function @Author:PRIYA10JUN14***********************/
/*************End code to add function @Author:PRIYA11JUN14***********************/
/*************Start code to add function @Author:DNYANESHWARI***********************/
function openFormQuotationDiv(divId, count, display, labelId, fieldName, fieldValue, fontSize, fontColor, fieldCheck, inputWidth, labelType, topMargin, leftMargin, fieldNoPrintCheck = '') {
//    alert(fieldName);return false;
    fieldValue = encodeURIComponent(fieldValue);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            if (labelType != 'SchemeBook') {
                document.getElementById('fontSize' + count).focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcufmadquot" + default_theme + ".php?divId=" + divId + "&count=" + count + "&display=" + display + "&labelId=" + labelId + "&labelType=" + labelType + "&fieldName=" + fieldName
            + "&fieldValue=" + fieldValue + "&inputWidth=" + inputWidth + "&fontSize=" + fontSize + "&fontColor=" + fontColor + "&fieldCheck=" + fieldCheck + "&fieldNoPrintCheck=" + fieldNoPrintCheck + "&topMargin=" + topMargin + "&leftMargin=" + leftMargin, true);
    xmlhttp.send();
}
//
function submitCertificateFormData() {
    const formData = new FormData(document.getElementById("add_stock"));
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
            document.getElementById("cuMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri green fw_b'>UPDATED</span>";
                window.setTimeout(closeMessDetails, 1500);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcufoad" + default_theme + ".php", true);
    xmlhttp.send(formData);
    function closeMessDetails()
    {
        document.getElementById("cuMessDisplayDiv").innerHTML = "";
    }
}
//
function labelsFormQuotation(count, labelType, fieldName, fieldValue, fontSize, fontColor, divId, display) {
    var check = '';
    if (display == 'NO' || divId == 'tncDiv' || divId == 'authSignLbDiv' || divId == 'invTitleDiv' || fieldName == 'formBorderCheck' || divId == 'footerLbDiv') {
        var check = document.getElementById("fontCheckId" + count).checked;
        // alert(check);
    }
    if (fieldName != 'firmLeftLogoCheck' && fieldName != 'firmRightLogoCheck' && fieldName != 'design' && divId != '' && fontSize == '') {
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
        xmlhttp.open("POST", "include/php/omcufoadquot" + default_theme + ".php?labelType=" + labelType + "&count=" + count + "&fieldName=" + fieldName + "&fieldValue=" + encodeURIComponent(fieldValue) + "&fontSize=" + fontSize +
                "&fontColor=" + fontColor + "&fieldCheck=" + check + "&panel=CustomizedFormMainPanel", true);
        xmlhttp.send();
    }
    function closeMessDetails()
    {
        document.getElementById("cuMessDisplayDiv").innerHTML = "";
    }
}
/*************End code to add function @Author:DNYANESHWARI***********************/
//Start Code To Open quotation Invoice @Author DNYANESHWARI -08-07-2023
function showQuotationInvoice(custId, slPrPreInvoiceNo, slprinSubPanel, documentRootBSlash, slPrInvoiceNo, slPrAddDate, invLay)
{
    window.open(documentRootBSlash + '/include/php/ogspinvo.php?userId=' + custId + '&slPrPreInvoiceNo=' + slPrPreInvoiceNo + '&slPrInvoiceNo=' + slPrInvoiceNo + '&slprinSubPanel=' + slprinSubPanel + '&invoiceDate=' + slPrAddDate + '&firmId=' + invLay + '&panelName=Estimate80MM&labelType=QuotationInv',
            'popup', 'width=850,height=950,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
}
//End Code To Open quotation Invoice @DNYANESHWARIAuthor-08-07-2023
/******Start code to add validation of accounts @Author:SHRI04JUL15***************/
function validateAdvMoneyInputs(obj) {
    if (validateEmptyField(document.getElementById("advMoneyAmt").value, "Please enter Amount!") == false ||
            validateNum(document.getElementById("advMoneyAmt").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("advMoneyAmt").focus();
        return false;
    } else if (validateSelectField(document.getElementById("advMoneyFirmId").value, "Please select Firm!") == false) {
        document.getElementById("advMoneyFirmId").focus();
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
    } else if (validateEmptyField(document.getElementById("advMoneySerialNo").value, "Please enter Serial Number!") == false ||
            validateNum(document.getElementById("advMoneySerialNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("advMoneySerialNo").focus();
        return false;
    } else if (validateSelectField(document.getElementById("advMoneyDrAccId").value, "Please select Dr Account!") == false) {
        document.getElementById("advMoneyDrAccId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("advMoneyCrAccId").value, "Please select Cr Account!") == false) {
        document.getElementById("advMoneyCrAccId").focus();
        return false;
    }
    return true;
}
/******End code to add validation of accounts @Author:SHRI04JUL15***************/
function addAdvanceMoneyDetails(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("advMoneySubmit").style.visibility = "hidden";
    if (validateAdvMoneyInputs(obj)) {
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("advMoneySubmit").style.visibility = "visible";
    }
    return false;
}
/*************End code to add function @Author:PRIYA11JUN14***********************/
/***************Start code to add function for advance money @Author:PRIYA12JUN14******************/
/***************Start code to add panel @Author:PRIYA17JUN14******************/
/***************Start code to hide del button @Author:PRIYA31JAN15**************/
/*****Start code to change div name to addNewUdhaarDiv @Author:SHRI02JUN16************/
function getAdvanceMoneyCustHome(custId, admnId, panel, divPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'AdvanceMoney') {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("custUdhaarDetailsDiv").innerHTML = xmlhttp.responseText;
//                document.getElementById("ajaxCloseAddAdvanceMoney").innerHTML = "";
                document.getElementById("titleDiv").innerHTML = 'UPDATE ADVANCE MONEY DETAILS';
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'AdvanceMoney')
        xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&admnId=" + admnId + "&custPanelOption=" + panel + "&showDivPanel=" + panel, true); // showDivPanel @Author:SHRI18JUN16
    else
        xmlhttp.open("POST", "include/php/omamaddv" + default_theme + ".php?custId=" + custId + "&admnId=" + admnId + "&panelName=" + 'UpdateAdvMoney', true);
    xmlhttp.send();
}
/*****End code to change div name to addNewUdhaarDiv @Author:SHRI02JUN16************/
/***************End code to hide del button @Author:PRIYA31JAN15**************/
/***************End code to add panel @Author:PRIYA17JUN14******************/
/***************Start code to add serial number @Author:PRIYA01JUL14*********/
function deleteAdvanceMoney(custId, admnId, jrnlId, page, panel, serialNum, depAmt, depDOB) {
    confirm_box = confirm("Do you really want to Permanent Delete this Details?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panel == 'advMoneyHome')
                    document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                else
                    document.getElementById("advMoneyList").innerHTML = xmlhttp.responseText;
                closeMessDiv('messDisplayDiv', 'DELETED');
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omadmndl" + default_theme + ".php?admnId=" + admnId + "&custId=" + custId + "&jrnlId=" + jrnlId + "&page=" + page + "&panel=" + panel +
                "&serialNum=" + serialNum + "&depAmt=" + depAmt + "&depDOB=" + depDOB, true);
        xmlhttp.send();
    }
}
/***************End code to add serial number @Author:PRIYA01JUL14*********/
function navigationAdvanceMoneyPanel(pageNo, rowsPerPage, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadNextAdvMoneyList").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextAdvMoneyListButt").style.visibility = "visible";
            document.getElementById("advMoneyList").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadNextAdvMoneyList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextAdvMoneyListButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/omadmnlt" + default_theme + ".php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&panelName=" + panel, true);
    xmlhttp.send();
}
/***************End code to add for advance money  @Author:PRIYA12JUN14******************/
/***********Start code to add function gor adv money @Author:PRIYA14JUN14*************/
/***********Start code to change Div like addNewUdhaarDiv for adv metal @Author:ANUJA12JAN16*************/
//*****************************Start code to change moneypanel home page Author:SANT28APR16********************************
function getAdvanceMoneyDiv(custId, panelName)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addNewUdhaarDiv").innerHTML = xmlhttp.responseText;
            //Start code to show money details @Author:SHRI30JAN15
            document.getElementById("advMoneyDetails").style.visibility = "visible";
//            document.getElementById("advanceMoneyDivision").style.visibility="hidden";
            //End code to show money details @Author:SHRI30JAN15
            document.getElementById("advMoneyAmt").focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'AdvMoneyList')
        xmlhttp.open("GET", "include/php/omadmnlt" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName, true);
    else
        xmlhttp.open("GET", "include/php/omamaddv" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName, true);
    xmlhttp.send();
}
//*****************************End code to change moneypanel home page Author:SANT28APR16********************************
/***********End code to add function for adv money @Author:PRIYA14JUN14*************/
/***********Start code to add function to close adv money @Author:PRIYA17JUN14*************/
function closeAdvanceMoneyDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ajaxCloseAddAdvanceMoney").style.visibility = "hidden";
            document.getElementById("addNewUdhaarDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/***********End code to change Div like addNewUdhaarDiv for adv metal @Author:ANUJA12JAN16*************/
/***********End code to add function to close adv money @Author:PRIYA17JUN14*************/
/***********Start code to add function to add adv money dep @Author:PRIYA17JUN14**************************/
/***********Start code to add serialNum @Author:PRIYA01JUL14*****************/
function showAdvMoneyDepositMoneyDiv(custId, admnId, amtLeft, firmId, preInvoiceNo, InvoiceNo, accCr, OthInfo, sdate, mdate, ydate, discount, utin_id, advanceRateStr = null) {
    if (amtLeft == 0) {
        alert('Please enter deposit amount.');
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                if (admnId == '') {
                    document.getElementById("AdvancepaymentPanel").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("advMoneyDepositMonButDiv" + admnId).style.visibility = "hidden";
                    document.getElementById("ajaxLoadAdvMoneyDepositMon" + admnId).style.visibility = "hidden";
                    document.getElementById("admnDepositMoneyDiv" + admnId).innerHTML = xmlhttp.responseText;
                }
            } else {
                if (admnId != '') {
                    document.getElementById("advMoneyDepositMonButDiv" + admnId).style.visibility = "hidden";
                    document.getElementById("ajaxLoadAdvMoneyDepositMon" + admnId).style.visibility = "visible";
                }
            }
        };

        str = "&paymentPanelName=UdhaarPayment&mainPanelName=MONEY&transPanelName=ADVMONEY";

        if (utin_id != '')
            str = "&paymentPanelName=UdhaarPaymentUpdate&mainPanelName=MONEY&transPanelName=ADVMONEY&utin_id=" + utin_id;

        if (admnId == '') {
            var paymInfo = document.getElementById("advMoneyPayOtherInfo").value;

            xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + custId + "&amtLeft=" + amtLeft +
                    "&firmId=" + firmId + "&PreInvoiceNo=" + preInvoiceNo + "&PostInvoiceNo=" + InvoiceNo + "&accCrId=" + accCr + "&PayOtherInfo=" + OthInfo
                    + "&DOBDay=" + sdate + "&DOBMonth=" + mdate + "&DOBYear=" + ydate + "&paymInfo=" + paymInfo + str + "&advanceRateStr=" + advanceRateStr, true);
        } else
            xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + custId + "&admnId=" + admnId + "&amtLeft=" + amtLeft +
                    "&firmId=" + firmId + "&DOBDay=" + sdate + "&DOBMonth=" + mdate + "&DOBYear=" + ydate + "&depsoitDisc=" + discount + "&serialNum=" + preInvoiceNo + "&paymentPanelName=UdhaarPayment&mainPanelName=MONEY&transPanelName=MONEY", true);
        xmlhttp.send();
}
}

function getCRDRAccountID(custId, firmId, accCrId, accDrId, staffId, subStaffId, sttrStatus, sttrTranType) {
    loadXMLDoc();
    // Create and style alert div
    let alertDiv = document.createElement('div');
    alertDiv.id = 'alertDiv';
    alertDiv.style.color = 'red';
    alertDiv.style.fontWeight = 'bold';
    alertDiv.style.marginTop = '10px';
    alertDiv.innerText = 'THIS PRODUCT ALL READY RETURN !';
    // disable submit button
    if (sttrStatus == 'PaymentPending' && sttrTranType == 'PurchaseReturn') {
        const disableButton = document.getElementById('addInvItemSubButt');
        // Disable the button when the AJAX call is made
        disableButton.disabled = true;
        // Check if alertDiv already exists to avoid duplicating
        if (!document.getElementById('alertDiv')) {
            disableButton.parentNode.insertBefore(alertDiv, disableButton.nextSibling);
        }
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            // Re-enable the button when the AJAX call is completed
            disableButton.disabled = false;
            // Remove the alert div
            let existingAlertDiv = document.getElementById('alertDiv');
            if (existingAlertDiv) {
                existingAlertDiv.remove();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + custId + "&firmId=" + firmId + "&accCrId=" + accCrId + "&accDrId=" + accDrId + "&staff1=" + staffId + "&staff2=" + subStaffId, true);
    xmlhttp.send();
}

//start code
function getSameItemID(custId, firmId, accCrId, accDrId, staffId, subStaffId, itemId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + custId + "&firmId=" + firmId + "&accCrId=" + accCrId + "&accDrId=" + accDrId + "&staff1=" + staffId + "&staff2=" + subStaffId, true);
    xmlhttp.send();
}
//end code

/***********End code to add serialNum @Author:PRIYA01JUL14*****************/
function validateAdvMoneyDepositMoneyInputs(obj, admnId) {
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
function advMoneyDepositMoney(obj, admnId) {
    document.getElementById("ajaxLoadAdvMoneyDepSubmit" + admnId).style.visibility = "visible";
    document.getElementById("admnDepMoneySubButDiv" + admnId).style.visibility = "hidden";
    var depositAmt = parseInt(document.getElementById("admnDepositAmount" + admnId).value);
    var leftAmt = parseInt(document.getElementById("admnAmtLeft" + admnId).value);
    if (depositAmt > leftAmt) {
        alert("Deposit amount(" + depositAmt + ") should not more than main amount(" + leftAmt + ")!");
        document.getElementById("ajaxLoadAdvMoneyDepSubmit" + admnId).style.visibility = "hidden";
        document.getElementById("admnDepMoneySubButDiv" + admnId).style.visibility = "visible";
    } else {
        if (validateAdvMoneyDepositMoneyInputs(obj, admnId)) {
            return true;
        } else {
            document.getElementById("ajaxLoadAdvMoneyDepSubmit" + admnId).style.visibility = "hidden";
            document.getElementById("admnDepMoneySubButDiv" + admnId).style.visibility = "visible";
        }
        return false;
    }
}
/***********End code to add function to add adv money dep @Author:PRIYA17JUN14**************************/
/*********Start code to add function to delete  @Author:PRIYA14APR14************************/
/*********Start code to add var @Author:PRIYA01JUL14****************/
function deleteAdvMoneyDepAmt(custId, depId, advMoneyDiv, advMoneyDepDiv, firmId, depJrnlId, serialNum, depAmt, depDOB, panelName) {
//alert(custId);
    globalUdhaarDiv = advMoneyDiv;
    globalDepUdhaarDiv = advMoneyDepDiv;
    confirm_box = confirm("Do you really want to delete this amount?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("updAdvMoneyDepAmtDelButt" + advMoneyDiv + advMoneyDepDiv).style.visibility = "visible";
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                closeMessDiv('messDisplayDiv', 'DELETED');
            } else {
                document.getElementById("updAdvMoneyDepAmtDelButt" + advMoneyDiv + advMoneyDepDiv).style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omadmndl" + default_theme + ".php?custId=" + custId + "&depId=" + depId + "&panel=AdvanceMoneyDep" + "&firmId=" + firmId + "&jrnlId=" + depJrnlId +
                "&serialNum=" + serialNum + "&depAmt=" + depAmt + "&depDOB=" + depDOB + "&panelName=" + panelName, true);// panelName added @Author:SHRI20JUN16
        xmlhttp.send();
    }
}
/*********End code to add var @Author:PRIYA01JUL14****************/
function closeAdvMoneyDepositDiv(admnDepId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("advMoneyDepositMonButDiv" + admnDepId).style.visibility = "visible";
            document.getElementById("admnDepositMoneyDiv" + admnDepId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxCloseAdvMoneyDepositMonDiv" + admnDepId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/*************Start code to add serialNum @Author:PRIYA01JUL14*******************/
function getAdvMoneyDepUpdateDiv(depId, admnId, custId, firmId, serialNum) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("advMoneyDepositMonButDiv" + admnId).style.visibility = "hidden";
            document.getElementById("ajaxLoadAdvMoneyDepositMon" + admnId).style.visibility = "hidden";
            document.getElementById("admnDepositMoneyDiv" + admnId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("advMoneyDepositMonButDiv" + admnId).style.visibility = "hidden";
            document.getElementById("ajaxLoadAdvMoneyDepositMon" + admnId).style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omamdpdv" + default_theme + ".php?custId=" + custId + "&depId=" + depId + "&admnId=" + admnId + "&firmId=" + firmId + "&panelName=UpdateAdvMoney" +
            "&serialNum=" + serialNum, true);
    xmlhttp.send();
}
/*************End code to add serialNum @Author:PRIYA01JUL14*******************/
/*********End code to add var @Author:PRIYA14APR14************************/
/*********Start code to add function @Author:PRIYA19JUN14******/
function labelsFormSubmit(fieldName, fontSize, count) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (fieldName != 'firmLeftLogoCheck' && fieldName != 'firmRightLogoCheck' && fieldName != 'design' && fontSize == '') {
        alert("Please Enter Font Size !");
        document.getElementById('fontSize' + count).focus();
    } else {
        closeMessDiv('cuMessDisplayDiv', 'UPDATED');
        return true;
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    return false;
}
/*********End code to add function @Author:PRIYA19JUN14******/
/*********Start code to add function to sort customer details @Author:PRIYA20JUN14******************************/
/***********Start code to add parameters @OMMODTAG PRIYA_22MAY15**********/
function searchCustDetails(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage, panel, staffId, custInterest) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omccdtlt" + default_theme + ".php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel
            + "&searchStaffId=" + staffId + "&custInterest=" + custInterest, true);
    xmlhttp.send();
}
/***********End code to add parameters @OMMODTAG PRIYA_22MAY15**********/
/*********End code to add function to sort customer details @Author:PRIYA20JUN14******************************/
/************Start code to add panel @Author:PRIYA23JUN14*************/
function showCommentUpdateDiv(documentRootPath, custId, custCommId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("main_middle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omcdcddv" + default_theme + ".php?custId=" + custId + "&custCommId=" + custCommId + "&custPanel=comment"
            + "&commentPanel=commentUpdate", true);
    xmlhttp.send();
}
/************End code to add panel @Author:PRIYA23JUN14*************/
/************Start code to add function for staff access @Author:PRIYA25JUN14************************/
function setEmpFirmAcess(check, checkId, staffId, accPanel) {
    loadXMLDoc();
    var accCheck = check.checked;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("firmAccessDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omefacad" + default_theme + ".php?checkId=" + checkId + "&empId=" + staffId +
            "&accCheck=" + accCheck + "&accPanel=" + accPanel, true);
    xmlhttp.send();
}
/************End code to add function for staff access @Author:PRIYA25JUN14************************/
/************Start code to add function for action item  @Author:PRIYA03JUL14*******************/
function getActionItemNotify(acitId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_Noti" + acitId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_Noti" + acitId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omaisbdv" + default_theme + ".php?acitId=" + acitId, true);
    xmlhttp.send();
}
function closeActionItemNotify(divId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById(divId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/************End code to add function for action item  @Author:PRIYA03JUL14*******************/
/*******Start code to add div @Author:PRIYA05JUL14********************/
function showCalenderDiv(div, hrsId, minId, secId, documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        }
    };
//    xmlhttp.open("POST", "include/php/ommpcale" + default_theme + ".php?div=" + div + "&hrsId=" + hrsId + "&minId=" + minId + "&secId=" + secId, true);

    xmlhttp.open("POST", documentRootPath + "/include/php/ommpcale" + default_theme + ".php?div=" + div + "&hrsId=" + hrsId + "&minId=" + minId + "&secId=" + secId, true);

    xmlhttp.send();
}
function goLastMonth(month, year, div, documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("calDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (month == 1)
    {
        --year;
        month = 13;
//        xmlhttp.open("POST", "include/php/ommpcale" + default_theme + ".php?month=" + parseFloat(month - 1) + "&year=" + year + "&div=" + div, true);
        xmlhttp.open("POST", documentRootPath + "/include/php/ommpcale" + default_theme + ".php?month=" + parseFloat(month - 1) + "&year=" + year + "&div=" + div, true);

    } else {
//        xmlhttp.open("POST", "include/php/ommpcale" + default_theme + ".php?month=" + parseFloat(month - 1) + "&year=" + year + "&div=" + div, true);
        xmlhttp.open("POST", documentRootPath + "/include/php/ommpcale" + default_theme + ".php?month=" + parseFloat(month - 1) + "&year=" + year + "&div=" + div, true);

    }
    xmlhttp.send();
}
function goNextMonth(month, year, div, documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("calDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (month == 12)
    {
        ++year;
        month = 0;
        var mn = parseFloat(month) + 1;
//        xmlhttp.open("POST", "include/php/ommpcale" + default_theme + ".php?month=" + mn + "&year=" + year + "&div=" + div, true);
        xmlhttp.open("POST", documentRootPath + "/include/php/ommpcale" + default_theme + ".php?month=" + mn + "&year=" + year + "&div=" + div, true);

    } else {
        var mn = parseFloat(month) + 1;
//        xmlhttp.open("POST", "include/php/ommpcale" + default_theme + ".php?month=" + mn + "&year=" + year + "&div=" + div, true);
        xmlhttp.open("POST", documentRootPath + "/include/php/ommpcale" + default_theme + ".php?month=" + mn + "&year=" + year + "&div=" + div, true);

    }

    xmlhttp.send();
}
/*******End code to add div @Author:PRIYA05JUL14********************/
function sendAcitSMS(acitMobile, acitText, smsDate, hrs, min, sec) {
    acitText = encodeURIComponent(acitText);
    loadXMLDoc();
    if (validateNum(document.getElementById("acitMobile").value, "Accept only Numbers without space character!") == false ||
            validateLength10(document.getElementById("acitMobile").value, "Mobile number length should be minimum 10!") == false) {
        document.getElementById("acitMobile").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("acitText").value, "Please select sms Text!") == false || validateLengthSms(document.getElementById("acitText").value, "Mesaage length should be maximum 160!") == false) {
        document.getElementById("acitText").focus();
        return false;
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("acitSmsButt").style.visibility = "visible";
            document.getElementById("acitNotDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            document.getElementById("acitSmsButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/omaitsms" + default_theme + ".php?acitMobile=" + acitMobile + "&acitText=" + acitText + "&smsDate=" + smsDate + "&hrs=" + hrs + "&min=" + min + "&sec=" + sec, true);
    xmlhttp.send();
}
function sendEmail(emailToField, emailFromField, emailSubField, emailBodyField, emailDate, hrs, min, sec) {
    loadXMLDoc();
    if (validateEmptyField(document.getElementById("emailTo").value, "Please Enter To Field!") == false) {
        document.getElementById("emailTo").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("emailFrom").value, "Please Enter From Field!") == false) {
        document.getElementById("emailFrom").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("emailSub").value, "Please Enter Field Subject!") == false) {
        document.getElementById("emailSub").focus();
        return false;
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("acitEmailButt").style.visibility = "visible";
            document.getElementById("acitNotDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            document.getElementById("acitEmailButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/omaimail" + default_theme + ".php?emailTo=" + emailToField + "&emailFrom=" + emailFromField + "&emailSub=" + emailSubField + "&emailBody=" + emailBodyField +
            "&emailDate=" + emailDate + "&hrs=" + hrs + "&min=" + min + "&sec=" + sec, true);
    xmlhttp.send();
}
function getTime(time, div, panel, id) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("calDiv").innerHTML = xmlhttp.responseText;
            clearDivision(div);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'sec')
        document.getElementById(id).value = time;
    else
        document.getElementById(id).value = time + ' :';
    xmlhttp.open("POST", "include/php/ommpcale" + default_theme + ".php", true);
    xmlhttp.send();
}
function getDate(date, div) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("calDiv").innerHTML = xmlhttp.responseText;
            clearDivision(div);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (div == 'calenderDiv')
        document.getElementById("acitStartDate").value = date;
    else if (div == 'calenderEmailDiv')
        document.getElementById("emailDate").value = date;
    else if (div == 'calenderSmsDiv')
        document.getElementById("smsDate").value = date;
    else
        document.getElementById("acitEndDate").value = date;
    xmlhttp.open("POST", "include/php/ommpcale" + default_theme + ".php", true);
    xmlhttp.send();
}
/*******End code to add function for sms and email in acit  @Author:PRIYA08JUL14********************/
/*******Start code to add function @Author:PRIYA09JUL14****************/
function getYear(year, period, div, documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("calDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (period == 'Next')
    {
        ++year;
//        xmlhttp.open("POST", "include/php/ommpcale" + default_theme + ".php?year=" + year + "&div=" + div, true);
        xmlhttp.open("POST", documentRootPath + "/include/php/ommpcale" + default_theme + ".php?year=" + year + "&div=" + div, true);

    } else {
        --year;
//        xmlhttp.open("POST", "include/php/ommpcale" + default_theme + ".php?year=" + year + "&div=" + div, true);
        xmlhttp.open("POST", documentRootPath + "/include/php/ommpcale" + default_theme + ".php?year=" + year + "&div=" + div, true);

    }
    xmlhttp.send();
}
/*******End code to add function @Author:PRIYA09JUL14****************/
/*******Start code to add function @Author:@Author:PRIYA10JUL14****************/
function searchActionItemPanel(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage, listPanel, sNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("acitListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omaiatlt" + default_theme + ".php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&listPanel=" + listPanel + "&sNo=" + sNo, true);
    xmlhttp.send();
}
function sortActionItemPanel(documentRootPath, sortKeyword, selFirmId, rowsPerPage, listPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("acitListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omaiatlt" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId +
            "&rowsPerPage=" + rowsPerPage + "&listPanel=" + listPanel, true);
    xmlhttp.send();
}
/****************Start code to add panel @Author:PRIYA11JUL14***********/
function addActionItemToDoneList(acitId, panel) {
    if (panel == 'doneList' || panel == 'deletedList') {
        confirm_box = confirm("Do you really want to add this action item into Active List?");
    } else if (panel == 'activeList') {
        confirm_box = confirm("Do you really want to add this action item into Done List?");
    }
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("acitListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omaiatdl" + default_theme + ".php?actionItemID=" + acitId + "&panel=" + panel, true);
        xmlhttp.send();
    }
}
/****************End code to add panel @Author:PRIYA11JUL14***********/
function getActionItemList(listPanel, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("acitListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omaiatlt" + default_theme + ".php?listPanel=" + listPanel + "&custId=" + custId, true);
    xmlhttp.send();
}
/*******End code to add function @Author:@Author:PRIYA10JUL14****************/
/****************Start code to add panel @Author:PRIYA11JUL14***********/
function showStockTallyPanel()
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStockCurrentInvoice").innerHTML = xmlhttp.responseText;
            document.getElementById('enterSerialNum').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogstally" + default_theme + ".php", true);
    xmlhttp.send();
}
function addToStockTally(pre, post, panel, num, mainpanel) {

//    alert("pre : " + pre);
//    alert("post : " + post);
//    alert("panel : " + panel);
//    alert("num : " + num);
//    alert("mainpanel : " + mainpanel);

    if (panel == 'NON TALLY' || panel == 'Quick Access') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
                document.getElementById('enterSerialNum').focus();
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogsttlad" + default_theme + ".php?preId=" + pre + "&postId=" + post + "&panel=" + panel + "&num=" + num + "&mainpanel=" + mainpanel, true);
        xmlhttp.send();
    } else {
        confirm_box = confirm("Do you really want to back this Item");
        if (confirm_box == true) {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
                    document.getElementById('enterSerialNum').focus();
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            xmlhttp.open("POST", "include/php/ogsttlad" + default_theme + ".php?preId=" + encodeURIComponent(pre) + "&postId=" + encodeURIComponent(post) + "&panel=" + panel + "&num=" + num + "&mainpanel=" + mainpanel, true);
            xmlhttp.send();
        }
    }
}
//
function moveToStockTally(RfidNo, panel, num, mainpanel) {
    //
    if (panel == 'NON TALLY') {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
                document.getElementById('enterSerialNum').focus();
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogsttladd" + default_theme + ".php?RfidNo=" + encodeURIComponent(RfidNo) + "&panel=" + panel +
                "&num=" + num + "&mainpanel=" + mainpanel, true);
        xmlhttp.send();
    }
}
//
/*********Start cdoe to add panel @Author:PRIYA12JUL14************/
function numberOfRowsInStockTally(number) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
            document.getElementById('enterSerialNum').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogstally" + default_theme + ".php?num=" + number + "&updateRows=" + 'updateRows', true);
    xmlhttp.send();
}
/*********End cdoe to add panel @Author:PRIYA12JUL14************/
function navigationToNextStockTally(pagenum, panelName, num) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
            document.getElementById('enterSerialNum').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogstally" + default_theme + ".php?page=" + pagenum + "&panel=" + panelName + "&num=" + num, true);
    xmlhttp.send();
}
function showEnteredStock(itemId, num, panel) {
    //alert(panel);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";

            document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
            // document.getElementById('stockItemId' + itemId).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //var itemId = itemId.toUpperCase();
    if (panel == 'images') {
        xmlhttp.open("POST", "include/php/ogstally" + default_theme + ".php?itemId=" + itemId + "&num=" + num + "&RFID=Y", true);
    } else {
        xmlhttp.open("POST", "include/php/ogstallytable" + default_theme + ".php?itemId=" + itemId + "&num=" + num, true);
    }
    xmlhttp.send();
}


function showEnteredStockCategory(itemcategory, num, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
            document.getElementById('entername').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    if (panel == 'images') {
        xmlhttp.open("POST", "include/php/ogstally" + default_theme + ".php?itemCategory=" + itemcategory + "&num=" + num, true);
    } else {
        xmlhttp.open("POST", "include/php/ogstallytable" + default_theme + ".php?itemCategory=" + itemcategory + "&num=" + num, true);
    }
    xmlhttp.send();
}


function showEnteredstockName(itemName, num, panel, category) {
    /// alert(category);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
            document.getElementById('enterSerialNum').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    if (panel == 'images') {
        xmlhttp.open("POST", "include/php/ogstally" + default_theme + ".php?itemName=" + itemName + "&num=" + num + "&itemCategory=" + category, true);
    } else {
        xmlhttp.open("POST", "include/php/ogstallytable" + default_theme + ".php?itemName=" + itemName + "&num=" + num + "&itemCategory=" + category, true);
    }
    xmlhttp.send();
}

function resetAllTallyStock(number, panel) {
    confirm_box = confirm("Do you really want to reset all Stock!");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
                document.getElementById('enterSerialNum').focus();
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogsttlad" + default_theme + ".php?num=" + number + "&mainpanel=" + panel, true);
        xmlhttp.send();
    }
}
/****************End code to add panel @Author:PRIYA11JUL14***********/
//*************Start code to change func @Author:PRIYA24APR14************************/
function validateUdhaarNoticeUpdateLang() {
    if (validateSelectField(document.getElementById("udhaarNoticeDefaultLang").value, "Please select Language!") == false) {
        document.getElementById("udhaarNoticeDefaultLang").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("headerLabel").value, "Please enter Header Label!") == false)
    {
        document.getElementById("headerLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("dateLabel").value, "Please enter Date Label!") == false) {
        document.getElementById("dateLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("subjectLabel").value, "Please enter Subject Label!") == false) {
        document.getElementById("subjectLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("udhaarNoticeContent").value, "Please enter Udhaar Notice Content!") == false) {
        document.getElementById("udhaarNoticeContent").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("udhaarOtherInfo").value, "Please enter Other Information!") == false) {
        document.getElementById("udhaarOtherInfo").focus();
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
function udhaarNoticeUpdateLang() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("udhaarNoticeUpdateButt").style.visibility = "hidden";
    if (validateUdhaarNoticeUpdateLang()) {
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("udhaarNoticeUpdateButt").style.visibility = "visible";
    }
    return false;
}
//*************End code to change func @Author:PRIYA24APR14************************/
/**************Start code to add function @Author:PRIYA22JUL14******************/
var suppItemCount = 1;
var globSuppItmCount = 1;
var getSuppItemDiv = 1;
var globSuppMoreItem = 1;
var suppLotCount = 1;
function get_more_supp_item_div(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertGetMoreSuppItemDiv;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertGetMoreSuppItemDiv() {
    var crysmin = suppItemCount - 1;
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("suppItemDiv" + crysmin).value = 'false';
        document.getElementById("addSuppItem" + suppItemCount).innerHTML = xmlhttp.responseText;
        getLotTableInsert();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function getMoreSuppItemDiv(suppItmCout, panelName, suppId) {
    var cnt = suppItmCout - 1;
    suppItemCount = suppItmCout;
    suppLotCount = cnt;
    if (suppItmCout == '') {
        globSuppMoreItem = document.getElementById("globSuppItemCount").value;
        suppItemCount = globSuppMoreItem;
    }
    if (suppItemCount != '') {
        getSuppItemDiv = suppItemCount;
    }
    globSuppItmCount = suppItemCount;
    var poststr = "itemCount=" + suppItemCount
            + "&panelName=" + panelName
            + "&suppId=" + suppId;
    get_more_supp_item_div('include/php/ogwisbdv' + default_theme + '.php', poststr);
    return false;
}
function valLotTableInsert(dc) {
    if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Id!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("suppItemGsWt" + dc).value, "Please enter gross weight of item" + dc + "!") == false) {
        document.getElementById("suppItemGsWt" + dc).focus();
        return false;
    } else if (validateEmptyField(document.getElementById("suppItemGsWtType" + dc).value, "Please enter gross weight type of item" + dc + "!") == false) {
        document.getElementById("suppItemGsWtType" + dc).focus();
        return false;
    } else if (validateEmptyField(document.getElementById("suppItemNtWt" + dc).value, "Please enter net weight of item" + dc + "!") == false) {
        document.getElementById("suppItemNtWt" + dc).focus();
        return false;
    } else if (validateEmptyField(document.getElementById("suppItemNtWtType" + dc).value, "Please enter net weight type of item" + dc + "!") == false) {
        document.getElementById("suppItemNtWtType" + dc).focus();
        return false;
    } else if (validateEmptyField(document.getElementById("suppItemFnWt" + dc).value, "Please enter fine weight of item" + dc + "!") == false) {
        document.getElementById("suppItemFnWt" + dc).focus();
        return false;
    } else if (validateEmptyField(document.getElementById("suppItemFinVal" + dc).value, "Please enter final valuation of item" + dc + "!") == false) {
        document.getElementById("suppItemFinVal" + dc).focus();
        return false;
    }
    return true;
}
function getLotTableInsert(suppItmCout, panelName, suppId, suppIdtId) {
    loadXMLDoc2();
    var suppItmC = suppItmCout - 1;
    if (valLotTableInsert(suppItmC)) {
        var poststr = "suppItemName=" + encodeURIComponent(document.getElementById("suppItemName" + suppItmC).value)
                + "&suppMetalType=" + encodeURIComponent(document.getElementById("suppMetalType" + suppItmC).value)
                + "&suppItemGsWt=" + encodeURIComponent(document.getElementById("suppItemGsWt" + suppItmC).value)
                + "&suppItemGsWtType=" + encodeURIComponent(document.getElementById("suppItemGsWtType" + suppItmC).value)
                + "&suppItemNtWt=" + encodeURIComponent(document.getElementById("suppItemNtWt" + suppItmC).value)
                + "&suppItemNtWtType=" + encodeURIComponent(document.getElementById("suppItemNtWtType" + suppItmC).value)
                + "&suppItemFnWt=" + encodeURIComponent(document.getElementById("suppItemFnWt" + suppItmC).value)
                + "&suppItemMetalRate=" + encodeURIComponent(document.getElementById("suppItemMetalRate" + suppItmC).value)
                + "&suppItemLabCharges=" + encodeURIComponent(document.getElementById("suppItemLabCharges" + suppItmC).value)
                + "&suppItemLabChargesType=" + encodeURIComponent(document.getElementById("suppItemLabChargesType" + suppItmC).value)
                + "&suppItemValuation=" + encodeURIComponent(document.getElementById("suppItemValuation" + suppItmC).value)
                + "&suppItemTax=" + encodeURIComponent(document.getElementById("suppItemTax" + suppItmC).value)
                + "&suppItemFinVal=" + encodeURIComponent(document.getElementById("suppItemFinVal" + suppItmC).value)
                + "&suppFirmId=" + encodeURIComponent(document.getElementById("firmId").value)
                + "&preInvNo=" + encodeURIComponent(document.getElementById("addItemPreInvoiceNo").value)
                + "&postInvNo=" + encodeURIComponent(document.getElementById("addItemInvoiceNo").value)
                + "&addStockSupplierId=" + encodeURIComponent(suppId)
                + "&suppIdtId=" + encodeURIComponent(suppIdtId);
        xmlhttp2.open("POST", "include/php/ogwpload" + default_theme + ".php?" + poststr, true);
        xmlhttp2.send();
        // if(suppIdtId == '')
        getMoreSuppItemDiv(suppItmCout, panelName, suppId);
    }
}
function closeMoreSuppItemDiv(suppItmCount, suppIdtId, suppId, panelName) {
    loadXMLDoc();
    var crysmin = suppItmCount - 1;
    var d = suppItemCount - 1;
    globSuppItmCount = suppItmCount - 1;
    var a = d - 1;
    document.getElementById("globSuppItemCount").value = suppItmCount;
    document.getElementById("suppItemDel" + suppItmCount).value = 'Deleted';
    if ((a == crysmin || d == crysmin) && crysmin != 0) {
        if (document.getElementById("suppItemDel" + crysmin).value != 'Deleted') {
            document.getElementById("suppItemDiv" + crysmin).value = 'true';
        }
    }
    if (crysmin == 0) {
        document.getElementById("suppItemDiv" + suppItmCount).value = 'true';
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("suppItem" + suppItmCount).innerHTML = xmlhttp.responseText;
            if (suppIdtId != '') {
                deleteSuppLotValue(suppItmCount, suppIdtId, suppId);
            }
            suppPurLotValue();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
function deleteSuppItem(payId, suppId) {
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("suppPurListDiv").innerHTML = xmlhttp.responseText;
                closeMessDiv('messDisplayDiv', 'DELETED');
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwpidel" + default_theme + ".php?payId=" + payId + "&suppId=" + suppId, true);
        xmlhttp.send();
    }
}
function showSuppItemDiv(payId, isinPanel, suppId) {
    loadXMLDoc();
    var subPanel;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("suppPurchaseDivs").innerHTML = xmlhttp.responseText;
            document.getElementById("suppPurInvTitle").innerHTML = "UPDATE DETAILS";
        }
    };
    if (isinPanel == 'addByItems') {
        subPanel = 'addByItemsUp';
    } else if (isinPanel == 'addByInv') {
        subPanel = 'addByInvUp';
    }
    xmlhttp.open("GET", "include/php/ogwprinv" + default_theme + ".php?payId=" + payId + "&payPanelName=StockPayUp" + "&itemSubPanel=" + subPanel + "&itemMainPanel=" + isinPanel
            + "&suppId=" + suppId, true);
    xmlhttp.send();
}
/**************End code to add function @Author:PRIYA22JUL14******************/
/**********Start code to add function for supp list @Author:PRIYA25JUL14*********/
function searchSuppType(suppType, keyCodeInput) {
    loadXMLDoc();
//      alert(suppType);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("suppTypeListDiv").innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('suppTypeListIdToSel').focus();
                document.getElementById('suppTypeListIdToSel').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogwatplt" + default_theme + ".php?suppType=" + suppType, true);
    xmlhttp.send();
}
function getSuppListByType(suppType) {
    loadXMLDoc();
    var str = suppType.toUpperCase();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("suppListDiv").innerHTML = xmlhttp.responseText;
            if (suppType != 'all')
                document.getElementById("suppListTitle").innerHTML = str + " LIST";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogwwspld" + default_theme + ".php?suppType=" + suppType, true);
    xmlhttp.send();
}
function searchSuppPurWtType(suppWtType, keyCodeInput, div, id, suppItemCount) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('suppWtTypeListIdToSel').focus();
                document.getElementById('suppWtTypeListIdToSel').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogwpwtlt" + default_theme + ".php?suppWtType=" + suppWtType + "&div=" + div + "&id=" + id + "&suppItemCount=" + suppItemCount, true);
    xmlhttp.send();
}
/**********End code to add function for supp list @Author:PRIYA25JUL14*********/
/**********Start code to add function for supp Purchase item @Author:PRIYA26JUL14*********/
function addSuppPurItemDetails(suppItemCoun, suppId, suppLotId, suppPurPrsent, metalType, simItemPanel) {
    if (globSuppItmCount == undefined || suppItemCoun == 0)
        suppItemCoun = 1;
    else if (suppItemCoun == '' && globSuppItmCount != undefined)
        suppItemCoun = globSuppItmCount;
    document.getElementById("openLotItemDetDiv").value = 'true';
    var metalType = document.getElementById("suppMetalType" + suppItemCoun).value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("display_supp_pur_div" + suppItemCoun).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var panel = document.getElementById("suppSimilarItem" + suppItemCoun).value;
    var suppId = document.getElementById("supplierId").value;
    xmlhttp.open("GET", "include/php/ogwpdtdv" + default_theme + ".php?suppItemCount=" + suppItemCoun + "&suppId=" + suppId + "&metalType=" + metalType + "&suppLotId=" + suppLotId +
            "&suppPurPrsent=" + suppPurPrsent + "&panel=" + panel + "&simItemPanel=" + simItemPanel, true);
    xmlhttp.send();
}
/**********End code to add function for supp Purchase item @Author:PRIYA26JUL14*********/
/**********Start code to add function for  @Author:PRIYA26JUL14*********/
var suppItemEntered = 0;
var suppCryEntered = 0;
function valAddSuppPurStock() {
    if (validateSelectField(document.getElementById("addItemDOBDay").value, "Please select Stock Date Day!") == false) {
        document.getElementById("addItemDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBMonth").value, "Please select Stock Date Month!") == false) {
        document.getElementById("addItemDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBYear").value, "Please select Stock Date Year!") == false) {
        document.getElementById("addItemDOBYear").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addItemInvoiceNo").value, "Please enter Invoice Number!") == false ||
            validateNum(document.getElementById("addItemInvoiceNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("addItemInvoiceNo").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Stock Firm Id!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("accountId").value, "Please select Account Name!") == false) {
        document.getElementById("accountId").focus();
        return false;
    } else {
        suppItemEntered = 0;
        if (document.getElementById("checkForSimItem").value == 'true') {
            suppItemDetDiv = document.getElementById("noOfSuppPurItem").value;
        }
        for (var dc = 1; dc <= suppItemDetDiv; dc++) {
            if ((document.getElementById("itemName" + dc).value != '') || dc == 1) {
                if (document.getElementById("checkCryAdded").value == 'true') {
                    if ((getSuppPurCryArr[dc]) == undefined)
                        getSuppPurCryArr[dc] = document.getElementById("suppPurCryCount" + dc).value;
                }
                if (validateEmptyField(document.getElementById("addStockItemId" + dc).value, "Please enter Item Id " + dc + "!") == false) {
                    document.getElementById("addStockItemId" + dc).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("itemName" + dc).value, "Please enter Item Name " + dc + "!") == false) {
                    document.getElementById("itemName" + dc).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("addStockItemMetalRate" + dc).value, "Please enter Metal Rate Id " + dc + "!") == false) {
                    document.getElementById("addStockItemMetalRate" + dc).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("addStockItemPieces" + dc).value, "Please enter Item Pieces " + dc + "!") == false ||
                        validateNum(document.getElementById("addStockItemPieces" + dc).value, "Accept only numeric characters without space " + dc + "!") == false) {
                    document.getElementById("addStockItemPieces" + dc).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("addStockItemGrossWeight" + dc).value, "Please enter Gross Weight " + dc + "!") == false ||
                        validateNumWithDot(document.getElementById("addStockItemGrossWeight" + dc).value, "Accept only numeric characters without space " + dc + "!") == false) {
                    document.getElementById("addStockItemGrossWeight" + dc).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("addStockItemNetWeight" + dc).value, "Please enter Net Weight " + dc + "!") == false ||
                        validateNumWithDot(document.getElementById("addStockItemNetWeight" + dc).value, "Accept only numeric characters without space " + dc + "!") == false) {
                    document.getElementById("addStockItemNetWeight" + dc).focus();
                    return false;
                } else if (validateSelectField(document.getElementById("addStockItemTunch" + dc).value, "Please select Item Tunch or Purity " + dc + "!") == false) {
                    document.getElementById("addStockItemTunch" + dc).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("addStockItemFinalVal" + dc).value, "Please enter Item Final Valuation " + dc + "!") == false ||
                        validateNumWithDot(document.getElementById("addStockItemFinalVal" + dc).value, "Accept only numeric characters without space " + dc + "!") == false) {
                    document.getElementById("addStockItemFinalVal" + dc).focus();
                    return false;
                } else if ((getSuppPurCryArr[dc]) != undefined) {
                    suppCryEntered = 0;
                    for (var cry = 1; cry <= getSuppPurCryArr[dc]; cry++) {
                        if (document.getElementById("addStockCryId" + dc + cry).value != '') {
                            if (validateEmptyField(document.getElementById("addStockCryGSW" + dc + cry).value, "Please enter Crystal Weight " + cry + "!") == false) {
                                document.getElementById("addStockCryGSW" + dc + cry).focus();
                                return false;
                            } else if (validateEmptyField(document.getElementById("addStockCryRate" + dc + cry).value, "Please enter Crystal Rate " + cry + "!") == false) {
                                document.getElementById("addStockCryRate" + dc + cry).focus();
                                return false;
                            } else if (validateEmptyField(document.getElementById("addStockCryVal" + dc + cry).value, "Please enter Crystal Valuation " + cry + "!") == false) {
                                document.getElementById("addStockCryVal" + dc + cry).focus();
                                return false;
                            }
                            suppCryEntered++;
                        }
                    }
                    document.getElementById("suppCrystalCount" + dc).value = suppCryEntered;
                }
                suppItemEntered++;
            }
        }
    }
    return true;
}
function addSuppPurStock(metalType, payId) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (valAddSuppPurStock()) {
        document.getElementById("suppItemDetCount").value = suppItemEntered;
        var suppItmC = document.getElementById("suppItemCnt").value;
        document.getElementById("suppDate").value = document.getElementById('addItemDOBDay').value + ' ' + document.getElementById('addItemDOBMonth').value + ' ' + document.getElementById('addItemDOBYear').value;
        document.getElementById("suppName").value = document.getElementById('addItemSuppName').value;
        document.getElementById("suppFirmId").value = document.getElementById('firmId').value;
        document.getElementById("suppPreInvId").value = document.getElementById('addItemPreInvoiceNo').value;
        document.getElementById("suppPostInvId").value = document.getElementById('addItemInvoiceNo').value;
        document.getElementById("suppAccId").value = document.getElementById('accountId').value;
        document.getElementById("suppItemName").value = document.getElementById("suppItemName" + suppItmC).value;
        document.getElementById("suppItemGsWt").value = document.getElementById("suppItemGsWt" + suppItmC).value;
        document.getElementById("suppItemGsWtType").value = document.getElementById("suppItemGsWtType" + suppItmC).value;
        document.getElementById("suppItemNtWt").value = document.getElementById("suppItemNtWt" + suppItmC).value;
        document.getElementById("suppItemNtWtType").value = document.getElementById("suppItemNtWtType" + suppItmC).value;
        document.getElementById("suppItemFnWt").value = document.getElementById("suppItemFnWt" + suppItmC).value;
        document.getElementById("suppItemLabChrgs").value = document.getElementById("suppItemLabCharges" + suppItmC).value;
        document.getElementById("suppItemLabChrgsType").value = document.getElementById("suppItemLabChargesType" + suppItmC).value;
        document.getElementById("suppMetalRate").value = document.getElementById("suppItemMetalRate" + suppItmC).value;
        document.getElementById("suppItemTotalVal").value = document.getElementById("suppItemTotVal" + suppItmC).value;
        document.getElementById("suppItemVal").value = document.getElementById("suppItemValuation" + suppItmC).value;
        document.getElementById("suppItemTax").value = document.getElementById("suppItemTax" + suppItmC).value;
        document.getElementById("suppItemFinVal").value = document.getElementById("suppItemFinVal" + suppItmC).value;
        document.getElementById('itemTotalCrystalVal' + 1).value = totalCryVal;
        if (parseFloat(document.getElementById("suppItemFnWt").value) > parseFloat(document.getElementById("suppItemNtWt").value)) {
            confirm_box = confirm("FFN weight is greater than net weight !\n Do u really want to continue ?");
            if (confirm_box == false)
            {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                return false;
            }
        }
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return true;
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    return false;
}
/*************Start code to add func @Author:PRIYA30JUL14***********/
var suppCryCnt = 0;
var globCryShotcut;
var getSuppPurCryArr = new Array();
function getSuppPurCryVisibility(itmDivCounter, itprSnapFname, itprBisMark) {
    loadXMLDoc();
    if (itmDivCounter == undefined)
        itmDivCounter = 1;
    getSuppPurCryArr[itmDivCounter] = 1;
    document.getElementById("suppPurLotItemTotCry1").value = 1;
    document.getElementById('itemDivCnt').value = itmDivCounter;
    var lotCount = globSuppItmCount;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            suppCryCnt = 1;
            document.getElementById("suppPurCrystalDiv" + itmDivCounter).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwpicdv" + default_theme + ".php?itmDivCounter=" + itmDivCounter + "&itmLotCount=" + lotCount + "&itprSnapFname=" + itprSnapFname + "&itprBisMark=" + itprBisMark, true);
    xmlhttp.send();
}
/*************End code to add func @Author:PRIYA30JUL14***********/
/*************Start code to add func @Author:PRIYA01AUG14***********/
var itemDetCount;
var suppItemDetDiv = 4;
var globSuppItemDetDiv;
function addSuppPurMoreItems(itmDetCount, metalType, itemPreId, itemPostId, suppLotId) {
    var panel;
    var preId;
    var postId;
    var counter = document.getElementById("suppItemDivCounter4").value;
    if (counter != '') {
        suppItemDetDiv = parseFloat(suppItemDetDiv) + parseFloat(1);
        var cnt = suppItemDetDiv - 1;
        var preId = document.getElementById("addStockItemPreId" + cnt).value;
        var postId = document.getElementById("addStockItemId" + cnt).value;
        postId = parseFloat(postId) + parseFloat(1);
    } else {
        suppItemDetDiv = 5;
        if (panel != 'SuppSimilarItem')
            document.getElementById("suppItemDivCounter4").value = 1;
        preId = itemPreId;
        postId = itemPostId;
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (suppItemDetDiv == 5 && panel != 'SuppSimilarItem' && suppLotId == '') {
                document.getElementById("getSuppItemDetDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("getSuppItemDetDiv" + suppItemDetDiv).innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwpisdv" + default_theme + ".php?itemDetCount=" + suppItemDetDiv + "&metalType=" + metalType + "&itemPreId=" + preId +
            "&itemPostId=" + postId + "&panel=" + panel + "&suppLotId=" + suppLotId, true);
    xmlhttp.send();
}
var getSuppPurCryDiv = 1;
var globItem;
function getSuppPurCrystal(itmDetCount, crystalCount, crystalSerCount, panelName) {
    if (crystalCount != '') {
        getSuppPurCryDiv = crystalSerCount;
    }
    globItem = itmDetCount;
    getSuppPurCryArr[itmDetCount] = crystalCount;
    document.getElementById("suppPurLotItemTotCry" + itmDetCount).value = crystalSerCount;
    var lotCount = getSuppItemDiv;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("suppPurCry" + itmDetCount + crystalCount).innerHTML = xmlhttp.responseText;
            document.getElementById("upPanel").value = "";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwpicdv" + default_theme + ".php?crystalDivCount=" + crystalCount + "&crystalSerCount=" + crystalSerCount + "&itmDivCounter=" + itmDetCount +
            "&itmLotCount=" + lotCount, true);
    xmlhttp.send();
}
/*************End code to add func @Author:PRIYA01AUG14***********/
function closeSuppMoreCrystalDiv(itmDetCount, cryCount, panelName) {
    document.getElementById("crystalDiv" + itmDetCount + cryCount).value = 'Deleted';
    document.getElementById("crystal" + itmDetCount + cryCount).innerHTML = "";
    calcSuppPurCryPrice();
}
/*************Start code to add funct @Author:PRIYA08AUG14***********/
function showMetalRate(metalType, keyCodeInput, itemCount, panelName, id, metRatePanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("metalIdSelectDiv" + itemCount).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('goldIdListDivToAddGoldIdSelect').focus();
                document.getElementById('goldIdListDivToAddGoldIdSelect').options[0].selected = true;
            }
        }
    };
    if (panelName == 'suppPurMatRate') {
        var documentRootPath = document.getElementById('documentRootPath').value;
        xmlhttp.open("POST", documentRootPath + "/include/php/ommrmidl" + default_theme + ".php?metalType=" + metalType + "&itemCount=" + itemCount + "&panelName=" + panelName + "&id=" + id + "&panel=" + metRatePanel, true);
    } else {
        xmlhttp.open("POST", "include/php/ommrmidl" + default_theme + ".php?metalType=" + metalType + "&itemCount=" + itemCount + "&panelName=" + panelName + "&id=" + id + "&panel=" + metRatePanel, true);
    }
    xmlhttp.send();
}
/*************End code to add funct @Author:PRIYA08AUG14***********/
var globSuppSimItemInd;
function addSuppSimItemsValue(suppItemCount) {
    var itmDetCount = globSuppSimItemInd;
    var itemDetCountPlus = parseFloat(itmDetCount) + parseFloat(1);
    document.getElementById("itemName" + itemDetCountPlus).value = document.getElementById("itemName" + itmDetCount).value;
    document.getElementById("addStockItemMetalRate" + itemDetCountPlus).value = document.getElementById("addStockItemMetalRate" + itmDetCount).value;
    document.getElementById("addStockItemPieces" + itemDetCountPlus).value = document.getElementById("addStockItemPieces" + itmDetCount).value;
    document.getElementById("addStockItemTunch" + itemDetCountPlus).value = document.getElementById("addStockItemTunch" + itmDetCount).value;
    document.getElementById("addStockItemWastage" + itemDetCountPlus).value = document.getElementById("addStockItemWastage" + itmDetCount).value;
    document.getElementById("addStockItemFinalTunch" + itemDetCountPlus).value = document.getElementById("addStockItemFinalTunch" + itmDetCount).value;
    document.getElementById("addStockItemFineWeight" + itemDetCountPlus).value = document.getElementById("addStockItemFineWeight" + itmDetCount).value;
    document.getElementById("addStockItemFFineWeight" + itemDetCountPlus).value = document.getElementById("addStockItemFFineWeight" + itmDetCount).value;
    document.getElementById("addStockItemLabCharges" + itemDetCountPlus).value = document.getElementById("addStockItemLabCharges" + itmDetCount).value;
    document.getElementById("addStockItemLabChargesType" + itemDetCountPlus).value = document.getElementById("addStockItemLabChargesType" + itmDetCount).value;
    document.getElementById("addStockCustItemLabCharges" + itemDetCountPlus).value = document.getElementById("addStockCustItemLabCharges" + itmDetCount).value;
    document.getElementById("itemCustChargesType" + itemDetCountPlus).value = document.getElementById("itemCustChargesType" + itmDetCount).value;
    document.getElementById("addStockItemFinalVal" + itemDetCountPlus).value = document.getElementById("addStockItemFinalVal" + itmDetCount).value;
    document.getElementById("addStockItemGrossWeight" + itemDetCountPlus).focus();
    if (document.getElementById("suppPurLotItemTotCry" + itmDetCount).value != '') {
        getSuppPurCryVisibility(itemDetCountPlus);
    }
}
/**************Start to change code from loadXMLDoc2 to loadXMLDoc @Author:SHRI24FEB17*****************/
function getSuppPurMetalRate(metalType, div, firmId = '') {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            alert(xmlhttp.responseText);
            document.getElementById(div).value = xmlhttp.responseText;
            getPurchaseAccountName(document.getElementById('sttr_metal_type').value, firmId);
        }
    };
    xmlhttp.open("POST", "include/php/ogwpmtrt" + default_theme + ".php?metalType=" + metalType, true);
    xmlhttp.send();
}
/**************End to change code from loadXMLDoc2 to loadXMLDoc @Author:SHRI24FEB17*****************/
//=======================================================================================
// START CODE TO SET ACCOUNT NAME ACCORDING TO METAL TYPE @SIMRAN:16AUG2023//
//=======================================================================================
function getPurchaseAccountName(metalType, firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("selAccountDiv").innerHTML = xmlhttp.responseText;

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //document.getElementById('sttr_account_id').value = '64';
    xmlhttp.open("POST", "include/php/omPurchaseAccdv.php?metalType=" + metalType + "&firmId=" + firmId, true);
    xmlhttp.send();
}
//=========================================================================================
// END CODE TO SET ACCOUNT NAME ACCORDING TO METAL TYPE @SIMRAN:16AUG2023//
//=========================================================================================
/**************Start code to add func to delete @Author:PRIYA11AUG14******************/
function deleteSuppLotValue(suppItmCount, suppIdtId, suppId) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("suppPurchaseDivs").innerHTML = xmlhttp2.responseText;
            closeMessDiv('messDisplayDiv', 'LOT DELETED');
        }
    };
    xmlhttp2.open("POST", "include/php/ogwpldel" + default_theme + ".php?suppIdtId=" + suppIdtId + "&suppId=" + suppId, true);
    xmlhttp2.send();
}
/**************End code to add func to delete @Author:PRIYA11AUG14*******************/
function shortCutKeyAltCFun(event) {
    var keyCode = (event.which) ? event.which : event.keyCode;
    alert(keyCode);
//    if (charCode == 46 || charCode == 8) {
//        return true;
//    }
//    keyCode = event.keyCode; 
    document.onkeydown = function (e) {
        alert('HI');
        if (keyCode == 18)
            isALT = 'T';
        if (keyCode == 99 && isALT == 'T' || (keyCode == 67 && isALT == 'T')) {
            alert('Hi');
            isALT = 'F';
            if ('cancelable' in event) {    // all browsers except IE before version 9
                if (event.cancelable) {
                    event.preventDefault();
                }
            } else {
                event.returnValue = false;
                event.keyCode = 0;
            }
            if (document.getElementById('cryShorcut').value == 'AddStock') {
                closeMoreCrystalDiv(getCrystalDiv, document.getElementById('cryShorcut').value)
            }
        }
    }
}

var noOfCrystal;
function validateSuppPurByItemVal() {
    if (document.getElementById("itemPanel").value == 'addByItemsUp' || document.getElementById('simItemPanel').value == 'SimilarItem' ||
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
    } else if (validateEmptyField(document.getElementById("addItemNetWeight").value, "Please enter Net Weight!") == false ||
            validateNumWithDot(document.getElementById("addItemNetWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("addItemNetWeight").focus();
        return false;
    } else if ((document.getElementById("addItemMetal").value != 'Other') && validateSelectField(document.getElementById("addItemTunch").value, "Please select Item Tunch or Purity!") == false) {
        document.getElementById("addItemTunch").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addItemFinalVal").value, "Please enter Item Final Valuation!") == false ||
            validateNumWithDot(document.getElementById("addItemFinalVal").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("addItemFinalVal").focus();
        return false;
    } else if (noOfCrystal != '' && noOfCrystal != undefined) {
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
        return false;
    }
    return false;
}
var panel;
function supp_pur_by_item(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSuppPurByItem;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertSuppPurByItem() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addStockSimilarItemButtDiv").style.visibility = "hidden";
        document.getElementById("suppItemPurSubButt").style.visibility = "hidden";
        document.getElementById("suppPurchaseDivs").innerHTML = xmlhttp.responseText;
        if (panel == 'addByItemsUp')
            closeMessDiv('messDisplayDiv', 'UPDATED');
        else
            closeMessDiv('messDisplayDiv', 'ADDED');
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("addStockSimilarItemButtDiv").style.visibility = "visible";
        document.getElementById("suppItemPurSubButt").style.visibility = "visible";
    }
}
/**** START CODE TO ADD FIRM @AUTHOR: PRIYA28 *****/
function suppPurByItem(panelName) {
    return false;
    panel = panelName;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateSuppPurByItemVal()) {
//  return true;
        var poststr = "addItemDOBDay=" + encodeURIComponent(document.getElementById("addItemDOBDay").value)
                + "&addItemDOBMonth=" + encodeURIComponent(document.getElementById("addItemDOBMonth").value)
                + "&addItemDOBYear=" + encodeURIComponent(document.getElementById("addItemDOBYear").value)
                + "&supplierId=" + encodeURIComponent(document.getElementById("supplierId").value)
                + "&addItemSuppName=" + encodeURIComponent(document.getElementById("addItemSuppName").value)
                + "&firmId=" + encodeURIComponent(document.getElementById("firmId").value)
                + "&addItemPreInvoiceNo=" + encodeURIComponent(document.getElementById("addItemPreInvoiceNo").value)
                + "&addItemInvoiceNo=" + encodeURIComponent(document.getElementById("addItemInvoiceNo").value)
                + "&accountId=" + encodeURIComponent(document.getElementById("accountId").value)
                + "&addStockItemMetal=" + encodeURIComponent(document.getElementById("addStockItemMetal").value)
                + "&addStockItemPreId=" + encodeURIComponent(document.getElementById("addStockItemPreId").value)
                + "&addStockItemId=" + encodeURIComponent(document.getElementById("addStockItemId").value)
                + "&addStockItemName=" + encodeURIComponent(document.getElementById("addStockItemName").value)
                + "&addStockItemMetalRate=" + encodeURIComponent(document.getElementById("addStockItemMetalRate").value)
                + "&addStockItemPieces=" + encodeURIComponent(document.getElementById("addStockItemPieces").value)
                + "&addStockItemGrossWeight=" + encodeURIComponent(document.getElementById("addStockItemGrossWeight").value)
                + "&addStockItemGrossWeightType=" + encodeURIComponent(document.getElementById("addStockItemGrossWeightType").value)
                + "&addStockItemNetWeight=" + encodeURIComponent(document.getElementById("addStockItemNetWeight").value)
                + "&addStockItemNetWeightType=" + encodeURIComponent(document.getElementById("addStockItemNetWeightType").value)
                + "&addStockItemTunch=" + encodeURIComponent(document.getElementById("addStockItemTunch").value)
                + "&addStockItemWastage=" + encodeURIComponent(document.getElementById("addStockItemWastage").value)
                + "&addStockItemFinalTunch=" + encodeURIComponent(document.getElementById("addStockItemFinalTunch").value)
                + "&addStockItemFineWeight=" + encodeURIComponent(document.getElementById("addStockItemFineWeight").value)
                + "&addStockItemFFineWeight=" + encodeURIComponent(document.getElementById("addStockItemFFineWeight").value)
                + "&addStockItemLabCharges=" + encodeURIComponent(document.getElementById("addStockItemLabCharges").value)
                + "&addStockItemLabChargesType=" + encodeURIComponent(document.getElementById("addStockItemLabChargesType").value)
                + "&addStockCustItemLabCharges=" + encodeURIComponent(document.getElementById("addStockCustItemLabCharges").value)
                + "&itemCustChargesType=" + encodeURIComponent(document.getElementById("itemCustChargesType").value)
                + "&addStockItemFinalVal=" + encodeURIComponent(document.getElementById("addStockItemFinalVal").value)
                + "&itprId=" + encodeURIComponent(document.getElementById("itprId").value)
                + "&itstId=" + encodeURIComponent(document.getElementById("itstId").value)
                + "&panelSimilarDiv=" + encodeURIComponent(document.getElementById("panelSimilarDiv").value);
        supp_pur_by_item('include/php/ogwpitad' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    }
}
/***************Start code to add cust image @Author:PRIYA04SEP14**************/
function showCustMoreItem(custId, div, divCheckValue, closeId) {
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
    xmlhttp.open("POST", "include/php/omccimdv" + default_theme + ".php?custId=" + custId + "&div=" + div, true);
    xmlhttp.send();
}
function closeOpenDiv(div, closeButtonDiv, divCheckValue) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(closeButtonDiv).style.visibility = "hidden";
            document.getElementById(divCheckValue).value = 'false';
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/***************End code to add cust image @Author:PRIYA04SEP14**************/
var getSuppPurCryDiv = 1;
function getSuppPurByItemCryVis(crystalCount) {
    if (crystalCount != '')
        getSuppPurCryDiv = crystalCount;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (crystalCount == '')
                document.getElementById("suppPurByItemCryDiv").innerHTML = xmlhttp.responseText;
            else
                document.getElementById("suppPurByItemCryDiv" + crystalCount).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwpitcy" + default_theme + ".php?crystalCount=" + crystalCount, true);
    xmlhttp.send();
}
function addSuppPurMoreItemsUp(itmDetCount, metalType, itemPreId, itemPostId, suppLotId) {
    var panel;
    var preId;
    var postId;
    var counter = document.getElementById("suppItemDivCounter" + itmDetCount).value;
    if (counter != '') {
        suppItemDetDiv = parseFloat(suppItemDetDiv) + parseFloat(1);
        var cnt = suppItemDetDiv - 1;
        var preId = document.getElementById("addStockItemPreId" + cnt).value;
        var postId = document.getElementById("addStockItemId" + cnt).value;
        postId = parseFloat(postId) + parseFloat(1);
    } else {
        suppItemDetDiv = parseFloat(itmDetCount) + parseFloat(1);
        document.getElementById("suppItemDivCounter" + itmDetCount).value = 1;
        preId = itemPreId;
        postId = itemPostId;
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("getSuppItemDetDiv" + suppItemDetDiv).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwpisdv" + default_theme + ".php?itemDetCount=" + suppItemDetDiv + "&metalType=" + metalType + "&itemPreId=" + preId +
            "&itemPostId=" + postId + "&panel=" + panel + "&suppLotId=" + suppLotId, true);
    xmlhttp.send();
}
function addSuppPurItemDetailsUp(suppItemCoun, suppId, suppLotId, suppPurPrsent, metalType, simItemPanel) {
    if (globSuppItmCount == undefined || suppItemCoun == 0)
        suppItemCoun = 1;
    else if (suppItemCoun == '' && globSuppItmCount != undefined)
        suppItemCoun = globSuppItmCount;
    document.getElementById("openLotItemDetDiv").value = 'true';
    var metalType = document.getElementById("suppMetalType" + suppItemCoun).value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert('HI');
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("display_supp_pur_div" + suppItemCoun).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var panel = document.getElementById("suppSimilarItem" + suppItemCoun).value;
    var suppId = document.getElementById("supplierId").value;
    xmlhttp.open("GET", "include/php/ogwpdtdv" + default_theme + ".php?suppItemCount=" + suppItemCoun + "&suppId=" + suppId + "&metalType=" + metalType + "&suppLotId=" + suppLotId +
            "&suppPurPrsent=" + suppPurPrsent + "&panel=" + panel + "&simItemPanel=" + simItemPanel, true);
    xmlhttp.send();
}
/*************Start code to add function @Author:PRIYA12SEP14***********/
/*************Start code to add new parameters orderpanel function @Author:SANT27AUG16***********/
/*************Start code to add new parameters orderpanel function @Author:SANT03SEP16***********/
function getCrystalFunc(crystalCount, div, commonPanel, sellPanel, orderPanel) {
    cryCountGobal++;
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
            document.getElementById('totalCrystalCount').value = noOfCrystal;

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (sellPanel == 'SellPurchase') {
        xmlhttp.open("POST", "include/php/ogadwscy" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel + "&sellPanel=" + sellPanel, true);
    } else if (sellPanel == 'SellPurchaseb2') {
        // 
        // ADDED CODE FOR METAL VALUATION PANEL @Author:PRIYANKA-07FEB2023
        xmlhttp.open("POST", "include/php/ogadwscyb2" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel + "&sellPanel=" + sellPanel + "&orderPanel=" + orderPanel, true);
    } else if (sellPanel == 'SellPurchaseCAD') {
        //
        xmlhttp.open("POST", "include/php/ogadwscycad" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel + "&sellPanel=" + sellPanel + "&orderPanel=" + orderPanel, true);
    } else {
        xmlhttp.open("POST", "include/php/ogadcydv" + default_theme + ".php?crystalCount=" + crystalCount + "&commonPanel=" + commonPanel + "&orderPanel=" + orderPanel, true);
    }
    xmlhttp.send();
}


function closeSellCrystalFunc(cryCount, panelName, itprCryId, itstCryId, itprId, wtId, wtTypeId, sellPanel) {
    cryCountGobal--;
    if (panelName == 'UpdateUdhaar') {
        var udharrItemMin = cryCount - 1;
        var d = udahaarItemCount - 1;
        var a = d - 1;
//        document.getElementById("udhaarItemDel" + cryCount).value = 'Deleted';
//          alert(document.getElementById("udhaarItemDivCounter").value);
//        if (parseFloat(document.getElementById("udhaarItemDivCounter").value) == 0)
//            document.getElementById("udhaarItemDivCounter").value = 0;
//        else
//            document.getElementById("udhaarItemDivCounter").value = parseFloat(document.getElementById("udhaarItemDivCounter").value) - 1;


        if ((a == udharrItemMin || d == udharrItemMin) && udharrItemMin != 0) {
            if (document.getElementById("udhaarItemDel" + udharrItemMin).value != 'Deleted') {
                document.getElementById("udhaarItemVar" + udharrItemMin).value = 'true';
            }
        }
        if (udharrItemMin == 0) {
            document.getElementById("udhaarItemVar" + cryCount).value = 'true';
        }
        document.getElementById("udhaarItemDiv" + cryCount).innerHTML = "";
    } else {
        document.getElementById("del" + cryCount).value = 'Deleted';
        document.getElementById("crystal" + cryCount).innerHTML = "";
    }
    if (itprCryId != '') {
        deleteSellCrystalDiv(itprCryId, itstCryId, itprId, panelName);
    }

    if (panelName == 'UpdateUdhaar') {

    } else if (panelName == 'SellPurchase' || panelName == 'SellPurchaseb2') {
        calcSellCryPrice();
    } else {
        calcItemCryPrice();
    }

    return false;
}


/*************End code to add new parameters orderpanel function @Author:SANT03SEP16***********/
/*************End code to add new parameters orderpanel function @Author:SANT27AUG16***********/
function closeCrystalFunc(cryCount, panelName, itprCryId, itstCryId, itprId) {
    document.getElementById("del" + cryCount).value = 'Deleted';
    document.getElementById("crystal" + cryCount).innerHTML = "";
    if (itprCryId != '') {
        deleteCrystalDiv(itprCryId, itstCryId, itprId, panelName);
    }
    calcItemCryPrice();
    return false;
}
function deleteCrystalDiv(itprCryId, itstCryId, itprId, panelName) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("suppPurByItemSubDiv").innerHTML = xmlhttp2.responseText;
            closeMessDiv('messDisplayDiv', 'CRYSTAL DELETED');
        }
    };
    xmlhttp2.open("POST", "include/php/ogadcydl" + default_theme + ".php?itprCryId=" + itprCryId + "&itstCryId=" + itstCryId + "&itprId=" + itprId + "&panelName=" + panelName, true);
    xmlhttp2.send();
}
/*************End code to add func @Author:PRIYA12SEP14***********/
/*************Start code to add function to show metal rate div @Author:PRIYA17SEP14****************/
/*************Start code to add param @Author:PRIYA07OCT14********************/
/*************Start code to add param panel @Author: SHRI29MAR16*************/
function getMetalRateDiv(metalType, div, id, keyCodeInput, panel) {
    //alert("Key Code :"+keyCodeInput);
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
    if (panel == 'AddStockPanel' || panel == 'AddWhStockPanel') {
        var documentRootPath = document.getElementById('documentRootPath').value;
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwpmtrt" + default_theme + ".php?metalType=" + metalType + "&div=" + div + "&id=" + id + "&panel=" + panel, true);
    } else {
        xmlhttp.open("POST", "include/php/ogwpmtrt" + default_theme + ".php?metalType=" + metalType + "&div=" + div + "&id=" + id + "&panel=" + panel, true);
    }
    xmlhttp.send();
}
/*************End code to add param panel @Author: SHRI29MAR16*************/
/*************End code to add param @Author:PRIYA07OCT14********************/
/*************End code to add function to show metal rate div @Author:PRIYA17SEP14****************/
/*************Start code to show trans panel @Author:PRIYA17SEP14****************/
/* Start code to add function for metal rate as per purity @Author: VISHAL20MAR21 */
function getMetalRatePurityDiv(metalType, metalTunch, div, id, keyCodeInput, panel) {
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
    if (panel == 'AddStockPanel' || panel == 'AddWhStockPanel') {
        var documentRootPath = document.getElementById('documentRootPath').value;
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwpmtrt" + default_theme + ".php?metalType=" + metalType + "&metalTunch=" + metalTunch + "&div=" + div + "&id=" + id + "&panel=" + panel, true);
    } else {
        xmlhttp.open("POST", "include/php/ogwpmtrt" + default_theme + ".php?metalType=" + metalType + "&metalTunch=" + metalTunch + "&div=" + div + "&id=" + id + "&panel=" + panel, true);
    }
    xmlhttp.send();
}
/* End code to add function for metal rate as per purity @Author: VISHAL20MAR21 */
function sortTransPanel(documentRootPath, sortKeyword, selFirmId, rowsPerPage) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("transactionListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omttlisd" + default_theme + ".php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId +
            "&rowsPerPage=" + rowsPerPage, true);
    xmlhttp.send();
}
/*************End code to show trans panel @Author:PRIYA17SEP14****************/
function printLedgerInfoDetPageDiv(obj, headerId) {
    var DocumentContainer = document.getElementById(obj);
    if (headerId != '') {
        var head;
        head = document.getElementById(headerId);
        head.style.position = "relative";
        head.style.top = "0px"
        head.style.visibility = "visible"; //visibility changed @Author:PRIYA27JAN14
    }
    var divWidth = 'width';
    // var width = document.getElementById(obj).offsetWidth;
    var html = '<html><head><title>Online Munim - Print Page    www.OnlineMunim.com     www.omunim.com</title>' +
            '<link href="css/invoice.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/print.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/index.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/orcss.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/ogcss.css" rel="stylesheet" type="text/css" />' +
            '<script type="text/javascript" src="scripts/emNavigation.js"></script>' +
            '<script type="text/javascript" src="scripts/emValidate.js"></script>' +
            '<script type="text/javascript" src="scripts/emAddOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/emOwnerLogin.js"></script>' +
            '<script type="text/javascript" src="scripts/emUpdateOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/orAddFunction_1_6_1.js"></script>' +
            '<script type="text/javascript" src="scripts/ogAddFunctions_1_6_1.js"></script>' +
            '</head><body>' +
            '<table align=center>' + '<tr><td align=center>' +
            '<div id="' + obj + '">' +
            '<table align=center width=divWidth>' + '<tr><td align=center width=divWidth>' +
            '<div class="' + divWidth + '" id="' + obj + '">' +
            DocumentContainer.innerHTML +
            '</div>' +
            '</td></tr>' +
            '<tr><td  align=center><a style="cursor: pointer;" onClick="window.print();"><img src="images/printer32.png" class="noPrint" alt="Print" title="Print" width="32px" height="32px" /></a>' +
            '</td></tr></table>' + '</body></html>';
    var WindowObject = window.open("", "PrintWindow", "width=1050,height=900,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");
    WindowObject.document.open();
    WindowObject.document.writeln(html);
    WindowObject.document.close();
    WindowObject.focus();
}
/******start code to deletetrasfergirvi @AUTH:athu20MAR17******/
function deleteTransferGirvi(panelName, girviTransId) {
    confirm_box = confirm("Do you really want to Delete?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;

            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/olggtrgl" + default_theme + ".php?girviTransId=" + girviTransId + "&panelName=" + panelName, true); //change in filename @AUTHOR: SANDY20NOV13
        xmlhttp.send();

    }
}
//******************************************************************************
//******************* START CODE FOR MAKE INVOICE FUNCTION *********************
//******************************************************************************

function makeInvoiceFunc(custId, preInvoice, postInvoice, mainPanel, MakeInvoiceType, ApprovalStatus = '') {

//    alert('panelName ===' + panelName);
    if (MakeInvoiceType == 'selectedInvoice')
        confirm_box = confirm("Do you really want to make invoice of selected Item?");
    else if (ApprovalStatus == 'ApprovalDone')
        confirm_box = confirm("Do you really want to submit this Approval?");
    else
        confirm_box = confirm("Do you really want to make invoice of this Item?");

    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                // start add code for retail make Estimate code for make invoice add this @yuvraj 04102022
                if (mainPanel == 'Estimate') {
                    document.getElementById("estimateDetails").innerHTML = xmlhttp.responseText;
                    closeMessDiv('sellMessDisplayDiv', 'DELETED');
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
        if (MakeInvoiceType == "selectedInvoice")
        {
            var ItemId = new Array();
            var counter = parseFloat(document.getElementById('approvalItemCount').value);

            for (var i = 1; i <= counter; i++) {
//                deleteChk[i] = document.getElementById('deletecheck' + i).checked;
                ItemId[i] = document.getElementById('approvalItemId' + i).value;
//                alert(document.getElementById('approvalItemId' + i).checked);
                if (document.getElementById('approvalItemId' + i).checked == true) {
                    if (SelectedItemIds == '')
                        SelectedItemIds = ItemId[i];
                    else
                        SelectedItemIds = SelectedItemIds + "," + ItemId[i];

                }
            }

        }

        xmlhttp.open("GET", "include/php/ogspidel" + default_theme + ".php?custId=" + custId + "&preInvoice=" + preInvoice + "&postInvoice=" + postInvoice + "&panelName=" + mainPanel + "&mainPanel=" + mainPanel + "&slPrInfo=MakeInvoice" + "&SelectedItemIds=" + SelectedItemIds + "&ApprovalStatus=" + ApprovalStatus + "&MakeInvoiceType=" + MakeInvoiceType, true);
        xmlhttp.send();

}
}
//******************************************************************************
//******************* END CODE FOR MAKE INVOICE FUNCTION *********************
//******************************************************************************


//******************************************************************************
//******************* START CODE FOR NAVIGATION ON STOCK FORM FUNCTION *********
//******************************************************************************
function navigatationStockForm(panelName, type) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('addStockMainDiv').innerHTML = xmlhttp.responseText;

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omUniversalForm" + default_theme + ".php?panelName=" + panelName + "&type=" + type, true);
    xmlhttp.send();
}
//******************************************************************************
//******************* END CODE FOR NAVIGATION ON STOCK FORM FUNCTION ***********
//******************************************************************************
//
// *****************************************************************************************************************************
// START CODE FOR PAYMENT/RECEIPT UPDATE FUNCTION @PRIYANKA-21MAY18
// *****************************************************************************************************************************
function updatePaymentReceiptTransaction(utinId, transactionType, mainPanel, transPanelName, firmId, userId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (transactionType == 'PAYMENT') {
        xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?utinId=" + utinId + "&userId=" + userId + "&PaymentReceiptPanel=PAYMENT"
                + "&mainPanelName=" + mainPanel + "&firmId=" + firmId + "&transPanelName=" + transPanelName
                + "&transactionType=" + transactionType + "&paymentPanelName=PaymentUp" + "&panelName=PAYMENT", true);
    } else if (transactionType == 'RECEIPT') {
        xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?utinId=" + utinId + "&userId=" + userId + "&PaymentReceiptPanel=RECEIPT"
                + "&mainPanelName=" + mainPanel + "&firmId=" + firmId + "&transPanelName=" + transPanelName
                + "&transactionType=" + transactionType + "&paymentPanelName=ReceiptUp" + "&panelName=RECEIPT", true);
    }
    xmlhttp.send();
}
// ****************************************************************************************************************************
// END CODE FOR PAYMENT/RECEIPT UPDATE FUNCTION @PRIYANKA-21MAY18
// ****************************************************************************************************************************
function addLoyaltypoint() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateLoyaltyPoints()) {
        var poststr = "points=" + encodeURIComponent(document.getElementById("points").value);
        xmlhttp.open('include/php/omloyaltycardnoad' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
//
function addUserGroupForm() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateUserGroup()) {
        var poststr = "userGrpName=" + encodeURIComponent(document.getElementById("userGrpName").value);
        xmlhttp.open('include/php/omktusergrpad' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
//
function addBoxMovementForm() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateBoxMovement()) {
        var poststr = "weightOut=" + encodeURIComponent(document.getElementById("weightOut").value);
        xmlhttp.open('include/php/omboxinoutad' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
//
function validateLoyaltyPoints() {

    if (validateSelectField(document.getElementById("points").value, "Please Add Loyalty Points!") == false) {
        document.getElementById("points").focus();
        return false;
    }
}
//
function validateUserGroup() {
    if (validateSelectField(document.getElementById("userGrpName").value, "Please Add User Group Name!") == false) {
        document.getElementById("userGrpName").focus();
        return false;
    }
}
//
function validateBoxMovement() {
    if (validateSelectField(document.getElementById("weightOut").value, "Please Add Weight Out!") == false) {
        document.getElementById("weightOut").focus();
        return false;
    }
    return false;
}
//
function searchDailyDiaryPanelCust(firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, ddMainPanel, ddOrderBy, custId) {
//    alert(ddMainPanel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (ddMainPanel == 'custAccLedgerDayBook') {
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            } else if (ddMainPanel == 'custAccLedger') {
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("dailyDiaryDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var dailyDiaryFromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
    var dailyDiaryToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
    xmlhttp.open("POST", "include/php/omddddandv" + default_theme + ".php?firmId=" + firmId + "&dailyDiaryFromDate=" + dailyDiaryFromDate + "&dailyDiaryToDate=" + dailyDiaryToDate +
            "&ddMainPanel=" + ddMainPanel + "&ddOrderBy=" + ddOrderBy + "&custId=" + custId, true);
    xmlhttp.send();
}
//
function addSharesCust() {
//    alert("hi");
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateShares()) {
        var poststr = "sharesQTY=" + encodeURIComponent(document.getElementById("sharesQTY").value);
        xmlhttp.open('include/php/omSharesAd' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
//
function validateShares() {

    if (validateSelectField(document.getElementById("sharesQTY").value, "Please Add Shares Quantity!") == false) {
        document.getElementById("sharesQTY").focus();
        return false;
    }
}
// add function for Shares Calculations 
function AddSharesCal() {
    var sharesQTY = parseFloat(document.getElementById('sharesQTY').value).toFixed(2);
    var sharesPrice = parseFloat(document.getElementById('sharesPrice').value).toFixed(2);

    document.getElementById('sharesTotalPrice').value = ((parseFloat(sharesQTY)) * parseFloat(sharesPrice)).toFixed(2);

    if (document.getElementById('sharesQTY').value == '' ||
            document.getElementById('sharesQTY').value == 'NaN') {
        document.getElementById('sharesQTY').value = 0;
    }

    if (document.getElementById('sharesPrice').value == '' ||
            document.getElementById('sharesPrice').value == 'NaN') {
        document.getElementById('sharesPrice').value = 0;
    }

    if (document.getElementById('sharesTotalPrice').value == '' ||
            document.getElementById('sharesTotalPrice').value == 'NaN') {
        document.getElementById('sharesTotalPrice').value = 0;
    }
    return false;
}
//
function addDepWithdraw(obj) {
//    alert('hi');
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateDepWithdraw(obj)) {
        //alert("hi");
        var poststr = "descAmount=" + encodeURIComponent(document.getElementById("descAmount").value);
        add_depwithdraw('include/php/omDepWithdrwad' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
//
function add_depwithdraw(url, parameters) {
//    alert("hi1");
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertDepWithTransaction;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//
function alertDepWithTransaction() {
//    alert("hi2");
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        //document.getElementById("transSubButt").style.visibility = "visible";
        document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        //document.getElementById("transSubButt").style.visibility = "hidden";
    }
}
//
function validateDepWithdraw() {
    //alert('hi');
    if (validateSelectField(document.getElementById("descAmount").value, "Please Add Deposite/Withdraw Amount!") == false) {
        document.getElementById("descAmount").focus();
        return false;
    } else {
        return true;
    }
}
//
function addLeads() {
    //alert("hi");
    //document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    loadXMLDoc();
    if (validateLeads()) {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            }
        };

        xmlhttp.open("GET", "omLeadsAd" + default_theme + ".php?leadsPhnNo=" + encodeURIComponent(document.getElementById("leadsPhnNo").value), true);
        xmlhttp.send();
    } else {
        return false;
    }
}
//
function validateLeads() {

    if (validateSelectField(document.getElementById("leadsPhnNo").value, "Please Add Customers Phone Number!") == false) {
        document.getElementById("leadsPhnNo").focus();
        return false;
    }
    var contact_id = document.getElementById("contact_id").value;
    if (document.getElementById("leadsPhnNo").value != '') {
        result = checkvalue(document.getElementById("leadsPhnNo").value, '', '', contact_id, 'visitorPanel');
        if (result != 'success') {
            alert("Duplicate Mobile No ! Please Enter Different Mobile No !");
            return false;
        }
    }
    //
    if (document.getElementById("leadsEmail").value != '') {
        result = checkvalue('', document.getElementById("leadsEmail").value, '', contact_id, 'visitorPanel');
        if (result != 'success') {
            alert("Duplicate Email Id ! Please Enter Different Email Id !");
            return false;
        }
    }
    return true;
}
//
function addLeadsDetails() {
    //alert("hi");
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateLeads()) {
        var poststr = "leadsPhnNo=" + encodeURIComponent(document.getElementById("leadsPhnNo").value);
        xmlhttp.open('include/php/omLeadsDetailsAd' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
//    $('#leadspupdate').click(function(){
//        $('#display_girvi_info_popup').close();
//    });
}

function searchROIInt(roiValue, intType, girviId, custId, panelName, keyCodeInput, girviDOB, girviFirmId,
        girviSerialNum, auctionPanel) {
    keyCodeForRoiValue = keyCodeInput;
    keyCodeForRoiValueOption = 0;
    var poststr = "ROIValue=" + encodeURIComponent(roiValue) +
            "&interestType=" + encodeURIComponent(intType) +
            "&girviId=" + encodeURIComponent(girviId) +
            "&custId=" + encodeURIComponent(custId) +
            "&panelName=" + encodeURIComponent(panelName) +
            "&girviDOB=" + encodeURIComponent(girviDOB) +
            "&girviFirmId=" + encodeURIComponent(girviFirmId) +
            "&girviSerialNum=" + encodeURIComponent(girviSerialNum) +
            "&auctionPanel=" + encodeURIComponent(auctionPanel);
    search_roi_int('include/php/olgroiintsel' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
}

var keyCodeForRoiValue;
var keyCodeForRoiValueOption = 0;
var keyCodeForRoiValueOptionCount;
var keyCodeForRoiValueOptionPrev = 0;
function search_roi_int(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchRoiInt;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchRoiInt() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("roiListDivToAddROIInt").innerHTML = xmlhttp.responseText;
        document.getElementById('roiListToAddRoiSelectInt').focus();
        keyCodeForRoiValueOptionPrev = keyCodeForRoiValueOption;
        document.getElementById('roiListToAddRoiSelectInt').options[keyCodeForRoiValueOptionPrev].selected = false;
        document.getElementById('roiListToAddRoiSelectInt').options[keyCodeForRoiValueOption].selected = true;
        document.getElementById('selROIValueInt').focus();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}

var updateRoiValPanelName;
function getROIValByIdInt(documentRootPath, roiId, girviId, custId, panelName, intType, girviDOB,
        girviFirmId, girviSerialNum, auctionPanel) {
    updateRoiValPanelName = panelName;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";

            //alert('RESPONSE TEXT : ' + xmlhttp.responseText);  
            //alert('selROIValueNew == ' + document.getElementById('selROIValueNew').value);

            document.getElementById("roiSelDivInt").innerHTML = xmlhttp.responseText;
            //document.getElementById("roiSelDiv").innerHTML = xmlhttp.responseText;

            if (panelName != 'AddNewGirvi' && panelName != 'AddNewGirviInt' &&
                    panelName != 'MoneyLenderLoan' &&
                    panelName != 'AddUdhaarEMI' && panelName != 'AddGirviEMI') {
                updateRoiInt(documentRootPath, roiId, girviId, custId, panelName, girviDOB, girviFirmId, girviSerialNum,
                        intType, auctionPanel);
            }

            if (panelName == 'AddGirviEMI') {
                calcLoanInt(intType);
            }

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }

    xmlhttp.open("POST", "include/php/olroiintsid" + default_theme + ".php?roiId=" + roiId + "&girviId=" + girviId + "&custId=" + custId +
            "&panelName=" + panelName + "&intType=" + intType + "&girviDOB=" + girviDOB +
            "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum + "&auctionPanel=" + auctionPanel, true);
    xmlhttp.send();
}

function updateRoiInt(documentRootPath, roiId, girviId, custId, panelName, girviDOB, girviFirmId, girviSerialNum, roiType, auctionPanel) {

    confirm_box = confirm(updateROIAlertMess + "\n\nDo you really want to update rate of interest?"); //add variables of alert msgs 
    if (confirm_box == true)
    {
        var poststr = "custId=" + custId + "&girviId=" + girviId
                + "&roiId=" + roiId + "&panelName=" + panelName
                + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
                + "&girviSerialNum=" + girviSerialNum + "&roiType=" + roiType + "&auctionPanel=" + auctionPanel;

        update_roi(documentRootPath + '/include/php/olguroivint' + default_theme + '.php', poststr); //change in filename 
    }
    return false;
}

function searchRoiForPanelBlankInt() {
    document.getElementById("roiListDivToAddROIInt").innerHTML = '';
}

function searchRoiForFocusPanelBlankInt(panelName, keyCode) {
    document.getElementById("roiListDivToAddROIInt").innerHTML = '';
    if (panelName == 'AddNewGirviInt') {
        if (keyCode == 13) {
            document.getElementById('girviFirmIdInt').focus();
        } else if (keyCode == 8) {
            document.getElementById('interestTypeInt').focus();
        }
    } else if (panelName == 'MoneyLenderLoan') {
        if (keyCode == 13) {
            document.getElementById('mlAddLnDOBDay').focus();
        } else if (keyCode == 8) {
            document.getElementById('mlPrincipalAmount').focus();
        }
    }
}

function changeROIOptAddInt(selectROIType, obj, panelName) {
    roiOption = selectROIType.value;
    if (roiOption == 'Annually') {
        change_ROI_Opt_AddInt('include/php/olggroia' + default_theme + '.php?panelName=' + panelName); //change in filename @AUTHOR: SANDY20NOV13
    } else if (roiOption == 'Monthly') {
        change_ROI_Opt_AddInt('include/php/olggroimint' + default_theme + '.php?panelName=' + panelName); //change in filename @AUTHOR: SANDY20NOV13
    } else if (roiOption == 'Daily') {
        change_ROI_Opt_AddInt('include/php/olggroid' + default_theme + '.php?panelName=' + panelName); //change in filename @AUTHOR: SANDY20NOV13
    } else {
        change_ROI_Opt_AddInt('include/php/olggroiw' + default_theme + '.php?panelName=' + panelName); //change in filename @AUTHOR: SANDY20NOV13
    }
    return false;
}

function change_ROI_Opt_AddInt(url) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertchangeROIOptAddInt;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send();
}

function alertchangeROIOptAddInt() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "hidden";
        document.getElementById("ROIOptionInt").innerHTML = xmlhttp.responseText;
        document.getElementById('selROIValueInt').focus();
    } else {
        document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "visible";
    }
}

function searchROIOrd(roiValue, intType, girviId, custId, panelName, keyCodeInput, girviDOB, girviFirmId,
        girviSerialNum, auctionPanel) {
    keyCodeForRoiValue = keyCodeInput;
    keyCodeForRoiValueOption = 0;
    var poststr = "ROIValue=" + encodeURIComponent(roiValue) +
            "&interestType=" + encodeURIComponent(intType) +
            "&girviId=" + encodeURIComponent(girviId) +
            "&custId=" + encodeURIComponent(custId) +
            "&panelName=" + encodeURIComponent(panelName) +
            "&girviDOB=" + encodeURIComponent(girviDOB) +
            "&girviFirmId=" + encodeURIComponent(girviFirmId) +
            "&girviSerialNum=" + encodeURIComponent(girviSerialNum) +
            "&auctionPanel=" + encodeURIComponent(auctionPanel);
    search_roi_ord('include/php/olgroiordsel' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
}

var keyCodeForRoiValue;
var keyCodeForRoiValueOption = 0;
var keyCodeForRoiValueOptionCount;
var keyCodeForRoiValueOptionPrev = 0;
function search_roi_ord(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchRoiOrd;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchRoiOrd() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("roiListDivToAddROI").innerHTML = xmlhttp.responseText;
        //if (keyCodeForRoiValue == 40 || keyCodeForRoiValue == 38) {
        document.getElementById('roiListToAddRoiSelect').focus();
        keyCodeForRoiValueOptionPrev = keyCodeForRoiValueOption;
        document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOptionPrev].selected = false;
        document.getElementById('roiListToAddRoiSelect').options[keyCodeForRoiValueOption].selected = true;
        //}
        document.getElementById('selROIValue').focus();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}

var updateRoiValPanelName;
function getROIValByIdOrd(documentRootPath, roiId, girviId, custId, panelName, intType, girviDOB, girviFirmId,
        girviSerialNum, auctionPanel) {
    updateRoiValPanelName = panelName;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("roiSelDiv").innerHTML = xmlhttp.responseText;
            if (panelName != 'AddNewGirvi' && panelName != 'MoneyLenderLoan' && panelName != 'AddUdhaarEMI' && panelName != 'AddGirviEMI')       // Check panel name for girvi EMI @OMMODTAG SHRI_24OCT15
                updateRoi(documentRootPath, roiId, girviId, custId, panelName, girviDOB, girviFirmId, girviSerialNum, intType, auctionPanel);
            if (panelName == 'AddGirviEMI') {
                calcLoanInt(intType);
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }

    xmlhttp.open("POST", "include/php/olroisidord" + default_theme + ".php?roiId=" + roiId + "&girviId=" + girviId + "&custId=" + custId +
            "&panelName=" + panelName + "&intType=" + intType + "&girviDOB=" + girviDOB + "&girviFirmId=" +
            girviFirmId + "&girviSerialNum=" + girviSerialNum + "&auctionPanel=" + auctionPanel, true); //change in filename @AUTHOR: SANDY20NOV13 

    xmlhttp.send();
}
//
function setROIValueById(ROIIdValue, ROIType) {

    //alert('ROIIdValue == ' + ROIIdValue);
    //alert('ROIType == ' + ROIType);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //alert('responseText == ' + xmlhttp.responseText);            
            document.getElementById("roiSelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }

    xmlhttp.open("POST", "include/php/olsetroival" + default_theme + ".php?ROIIdValue=" + ROIIdValue + "&ROIType=" + ROIType, true);
    xmlhttp.send();
}

function searchGirviByGirviIdInCustHomeInt(girviId, documentRootPath) {

    poststr = "girviId=" + encodeURIComponent(girviId);
    search_girvi_by_girviId_cust_home(documentRootPath + "/include/php/olgsgiwdint" + default_theme + ".php", poststr); //change in filename @AUTHOR: SANDY20NOV13
}

function reactiveGirviInt(girviId, custId, panelDivName) {
    if (panelDivName == 'girviAuctioned') {
        confirm_box = confirm("Do you really want to Un-auction this Loan ?");
    } else {
        confirm_box = confirm("Do you really want to Un-release this Loan ?");
    }
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("girviDeleteButDiv").style.visibility = "visible";
                document.getElementById("girviReactivateButDiv").style.visibility = "visible";
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                clearMessage();
            } else {
                document.getElementById("girviDeleteButDiv").style.visibility = "hidden";
                document.getElementById("girviReactivateButDiv").style.visibility = "hidden";
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/olgrgracint" + default_theme + ".php?girviId=" + girviId + "&custId=" + custId + "&panelDivName=" + panelDivName, true);
        xmlhttp.send();
    }
}
function valLoanInputs() {
    if (validateSelectField(document.getElementById('loanFromDay').value, "Please Select Start Day!") == false) {
        document.getElementById('loanFromDay').focus();
        return false;
    } else if (validateSelectField(document.getElementById('loanFromMonth').value, "Please Select Start Month!") == false) {
        document.getElementById('loanFromMonth').focus();
        return false;
    } else if (validateSelectField(document.getElementById('loanFromYear').value, "Please Select Start Year!") == false) {
        document.getElementById('loanFromYear').focus();
        return false;
    } else if (validateSelectField(document.getElementById('loanToDay').value, "Please Select End Day!") == false) {
        document.getElementById('loanToDay').focus();
        return false;
    } else if (validateSelectField(document.getElementById('loanToMonth').value, "Please Select End Month!") == false) {
        document.getElementById('loanToMonth').focus();
        return false;
    } else if (validateSelectField(document.getElementById('loanToYear').value, "Please Select End Year!") == false) {
        document.getElementById('loanToYear').focus();
        return false;
    }
    return true;
}


function sortGirviInCustHomeInt(documentRootPath, sortKeyword, selFirmId, custId, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'release') {
                document.getElementById("relGirvListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("activeGirvListDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'release') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omchrlgvint" + default_theme + ".php?sortKeyword="
                + sortKeyword + "&selFirmId=" + selFirmId + "&custId=" + custId, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/omchacgvint" + default_theme + ".php?sortKeyword="
                + sortKeyword + "&selFirmId=" + selFirmId + "&custId=" + custId, true);
    }
    xmlhttp.send();
}

/* START CODE TO ADD FUNCTIONS FOR IMITATION STCOK TALLY @AUTHOR:MADHUREE-12FEB2020 */
function moveToStockTallyImitation(itemId, panel, num) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
            document.getElementById('enterSerialNum').focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogimisttladd" + default_theme + ".php?itemId=" + itemId + "&panel=" + panel +
            "&num=" + num, true);
    xmlhttp.send();
}

function showEnteredImitationStock(itemId, num, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    itemId = itemId.toUpperCase();
    xmlhttp.open("POST", "include/php/ogimistocktal" + default_theme + ".php?itemId=" + itemId + "&num=" + num, true);
    xmlhttp.send();
}

function resetImitationTallyStock(number, panel) {
    confirm_box = confirm("Do you really want to reset all Stock!");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
                document.getElementById('enterSerialNum').focus();
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogimisttladd" + default_theme + ".php?num=" + number + "&mainpanel=" + panel, true);
        xmlhttp.send();
    }
}
/* END CODE TO ADD FUNCTIONS FOR IMITATION STCOK TALLY @AUTHOR:MADHUREE-12FEB2020 */
function changeJewelleryPanelStockMetalRate(goldRate, silverRate, sttrId, jwelleryPanelIframe, pageNum) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/stock/omStockJwelleryPanel" + default_theme + ".php?goldRate=" + encodeURIComponent(goldRate) + "&silverRate=" + encodeURIComponent(silverRate) + "&sttrId=" + encodeURIComponent(sttrId) + "&jwelleryPanelIframe=" + encodeURIComponent(jwelleryPanelIframe) + "&pageNum=" + encodeURIComponent(pageNum), true);
    xmlhttp.send();
}
function getUserCommentPanel(custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&panel=comment" + "&commentPanel=", true);
    xmlhttp.send();
}
//
//
function showSellMetalFormB2UpdatePanel(documentRootPath, custId, itemId, panelName, slPrInvoiceNo, emiChkValue) {
    //
    //alert('panelName : ' + panelName);
    //
    if (documentRootPath == '') {
        if (typeof (document.getElementById('documentRootPath')) != 'undefined' &&
                (document.getElementById('documentRootPath') != null)) {
            documentRootPath = document.getElementById('documentRootPath').value;
        }
    }
    //
    if (panelName.indexOf("#") !== -1) {
        var panelNameArray = new Array();
        panelNameArray = panelName.split('#');
        panelName = panelNameArray[0];
    }
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
    xmlhttp.open("POST", documentRootPath + "/include/php/ogspisdv" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId +
            "&mainPanel=StockPurchasePanel" + "&panelName=" + panelName + "&invoiceNo=" + slPrInvoiceNo +
            "&emiChkValue=" + emiChkValue + "&redirectionPanelName=SellMetalFormB2", true);
    //
    xmlhttp.send();
    //
}
//
//
//********************************************************************************************************/
// START CODE TO DELETE ASSIGN REPAIR ORDERS @PRIYANKA-03APR2021
//********************************************************************************************************/
function deleteAssignRepairOrder(NewPanelName, sttrId, userId, transMainId) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('NewPanelName == ' + NewPanelName);
    //alert('userId == ' + userId);
    //
    confirm_box = confirm("Do you really want to Delete Assigned Repair Order!");
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
                "&NewPanelName=" + NewPanelName + "&transMainId=" + transMainId +
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
}
//********************************************************************************************************************************************/
// END CODE TO DELETE ASSIGN REPAIR ORDERS @PRIYANKA-03APR2021
//********************************************************************************************************************************************/
//
//
function onStoneValChnage(value, crystalCount) {
//    alert(value);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cystalTable").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwacydv" + default_theme + ".php?value=" + value + "&crystalCount=" + crystalCount, true);
    xmlhttp.send();
}
function selectExistingCrystalDetail(id, name, value, crystalCount) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cystalTable").innerHTML = xmlhttp.responseText;
            document.getElementById('sttr_item_name_1' + crystalCount).value = name;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogwacydv" + default_theme + ".php?cryid=" + id + "&cryname=" + name + "&value=" + value + "&crystalCount=" + crystalCount, true);
    xmlhttp.send();
}
function searchCustLogPanel(sysLogTransId, documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage, pageNo, panel, custId) {
//    alert(rowsPerPage);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("systemLogPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'custsyslog') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcustsyslog" + default_theme + ".php?searchColumn=" + searchColumn + "&searchValue=" + searchValue
                + "&sysLogTransId=" + sysLogTransId + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&page=" + pageNo + "&panelName=" + panel + "&custId=" + custId, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ommpsslg" + default_theme + ".php?searchColumn=" + searchColumn + "&searchValue=" + searchValue
                + "&sysLogTransId=" + sysLogTransId + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&page=" + pageNo + "&panel=" + panel, true);
    }
    xmlhttp.send();
}
function showCustPageInPanel(documentRootPath, pageNo, panel, rowsPerPage, selFirmId, sortKeyword, searchColumn, searchValue, noOfPagesAsLink, custId) {
//    alert(panel);
    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("systemLogPanelDiv").innerHTML = xmlhttp.responseText;
                if (pageNo >= 10) {
                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            }
        };
        if (panel == 'custsyslog') {
            xmlhttp.open("POST", documentRootPath + "/include/php/omcustsyslog" + default_theme + ".php?page=" + pageNo + "&searchColumn="
                    + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&panelName=" + panel + "&custId=" + custId, true);
        } else {
            xmlhttp.open("POST", documentRootPath + "/include/php/ommpsslg" + default_theme + ".php?page=" + pageNo + "&searchColumn="
                    + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel, true);
        }
        xmlhttp.send();
    }
}
function getDateInCustLogPanel(sysLogTransId, documentRootPath, sdd, smm, syy, edd, emm, eyy, selFirmId, pageNo, panel, rowsPerPage, sortKeyword, searchColumn, searchValue, noOfPagesAsLink, custId) {
//    alert(panel);
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
    if (panel == 'custsyslog') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omcustsyslog" + default_theme + ".php?page=" + pageNo + "&searchColumn=" + searchColumn +
                "&sysLogTransId=" + sysLogTransId + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&panelName=" + panel +
                "&startDate=" + startDate + "&endDate=" + endDate + "&custId=" + custId, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ommpsslg" + default_theme + ".php?page=" + pageNo + "&searchColumn=" + searchColumn +
                "&sysLogTransId=" + sysLogTransId + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel +
                "&startDate=" + startDate + "&endDate=" + endDate, true);
    }
    xmlhttp.send();
}
function deleteCustomerLogs(custId) {
//    alert(custId);
    confirm_box = confirm("All Customer Logs Will Be Deleted !\n Do you really want to continue!");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("systemLogPanelDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        }

        xmlhttp.open("POST", "include/php/ommpcustdllg" + default_theme + ".php?custId=" + custId);
        xmlhttp.send();
    }

}
//
//
//********************************************************************************************************/
// START CODE TO DELETE RETURN ORDERS @PRIYANKA-05JULY2021
//********************************************************************************************************/
function deleteReturnOrders(deletePanelName, returnOrderMainId, userId, firmId) {
    //
    //alert('returnOrderMainId == ' + returnOrderMainId);
    //alert('deletePanelName == ' + deletePanelName);
    //alert('firmId == ' + firmId);
    //alert('userId == ' + userId);
    //
    confirm_box = confirm("Do you really want to Delete this Order!");
    //
    if (confirm_box == true) {
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
        xmlhttp.open("POST", "include/php/omfnordrtnadv" + default_theme + ".php?returnOrderMainId=" + returnOrderMainId +
                "&userId=" + userId + "&custId=" + userId +
                "&deletePanelName=" + deletePanelName + "&firmId=" + firmId +
                "&panelName=InvoicePayment" +
                "&indicator=stock" + "&stockType=wholesale" + "&type=stock" +
                "&transactionType=PURBYSUPP" + "&operation=insert" + "&formName=InvoicePayment" +
                "&mainPanel=CustHome" + "&divName=cust_middle_body" + "&mainUserPanel=CustHome", true);
        //
        xmlhttp.send();
        //
    }
}
//********************************************************************************************************************************************/
// END CODE TO DELETE RETURN ORDERS @PRIYANKA-05JULY2021
//********************************************************************************************************************************************/
//
//
function addRawMetalIssueStock() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addRawStockSubButtDiv").style.visibility = "hidden";
    var stockDateDay = document.getElementById("addItemDOBDay").value;
    var stockDateMMM = document.getElementById("addItemDOBMonth").value;
    var stockDateYY = document.getElementById("addItemDOBYear").value;
    var stockDateStr = document.getElementById("addItemDOBMonth").value + ' ' + document.getElementById("addItemDOBDay").value + ', ' + document.getElementById("addItemDOBYear").value;
    var stockDate = new Date(stockDateStr); // stock Date
    var todayDate = new Date(); // Today Date

    var milliStockDate = stockDate.getTime();
    var milliTodayDate = milliStockDate;
    var datesDiff = milliTodayDate - milliStockDate;
    if (datesDiff < 0) {
        alert('Please Select the correct Date!');
        document.getElementById("addItemDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
    } else {
        if (stockDateMMM == 'FEB' || stockDateMMM == 'APR' || stockDateMMM == 'JUN' || stockDateMMM == 'SEP' || stockDateMMM == 'NOV') {
            if (stockDateMMM == 'FEB' && stockDateDay > 29 && stockDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
            }
            if (stockDateMMM == 'FEB' && stockDateDay > 28 && stockDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
            }
            if (stockDateDay > 30) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' has only max 30 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
            }
        }
        if (document.getElementById('payButClickId').value == 'true') {
            var prefix = document.getElementById("prefix").value;
            var payPanelName = document.getElementById("upPanel").value;
            if (payPanelName == 'AddPanel') {
                document.getElementById("totMetal").value = getMetalDiv;
            } else if (payPanelName == 'UpPanel') {
                document.getElementById("totMetal").value = document.getElementById("noOfRawMet").value;
            }
            return true;
        } else {
            if (document.getElementById("userMainPanel").value == 'Supplier') {
                functionName = validateAddSuppRawStockInputs;
            } else {
                var functionName = validateAddRawStockInputs;
            }
            if (functionName()) {
                return true;
            }
        }
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addRawStockSubButtDiv").style.visibility = "visible";
        return false;
    }
    return false;
//    }
}
//
//
//
//
// *******************************************************************************************************
// START CODE FOR GST COMPOSITE REPORT @AUTHOR:PRIYANKA:10FEB2022
// *******************************************************************************************************
function getGstCompositeReportLedgerBook(gstCompositeValue) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omGstCompositeReport" + default_theme + ".php?gstCompositeValue=" + gstCompositeValue, true);
    xmlhttp.send();
}
// *******************************************************************************************************
// END CODE FOR GST COMPOSITE REPORT @AUTHOR:PRIYANKA:10FEB2022
// *******************************************************************************************************
//
//
//
//
// *******************************************************************************************************
// START CODE FOR STOCK MISMATCH FIRM CHANGE REPORT DELETE FUNCTION @AUTHOR:PRIYANKA:02MAR2022
// *******************************************************************************************************
function deleteStockFirmChangeSellStock(subPanelName, slPrId, custId, stockDelete, indicator, transType) {
    //
    //alert('panelName == ' + panelName);
    //
    var addToStock = 'no';
    //
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    //
    if (confirm_box == true) {
        //
        if (stockDelete == 'Y') {
            addToStock = 'yes';
        }
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockFirmChangeDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("GET", "ogspidel" + default_theme + ".php?custId=" + custId + "&slPrId=" + slPrId +
                "&stockDelete=" + stockDelete + "&panelName=soldOutListDel" +
                "&subPanelName=" + subPanelName + "&indicator=" + indicator +
                "&transType=" + transType +
                "&panel=ItemPurchase" + "&stockAdd=" + addToStock, true);
        //
        xmlhttp.send();
        //
    }
}
// *******************************************************************************************************
// END CODE FOR STOCK MISMATCH FIRM CHANGE REPORT DELETE FUNCTION @AUTHOR:PRIYANKA:02MAR2022
// *******************************************************************************************************
function showReturnSellDetUpdatePanel(documentRootPath, custId, itemId, panelName, slPrInvoiceNo, slInvNo, emiChkValue, panel, metalSellType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omitmrtn" + default_theme + ".php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=RetailStockItemReturn" +
            "&panelName=" + panelName + "&slPrInvoiceNo=" + slPrInvoiceNo + "&slInvNo=" + slInvNo, true);
    xmlhttp.send();

}
//**************************************************************************************************************
//START CODE FOR UPDATE SELL INVOICE : AUTHOR @DARSHANA 11 MARCH 2022
//**************************************************************************************************************
function showSellUpdatePanelDiv(custId, preInvoiceNo, panelName, subPanelName, postInvoiceNo) {

    if (panelName == '') {
        panelName = 'ImitationStock';
    }
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?suppId=" + custId + "&suppPayId=" + custId + "&panelName=ImitationSellPayUp" +
            "&mainPanel=ImitationPurchasePanel" + "&custId=" + custId
            + "&preInvoiceNo=" + preInvoiceNo + "&postInvoiceNo=" + postInvoiceNo, true);

    xmlhttp.send();
}
//
//
//Adding default_theme parameter by CHETAN @09 MAY 2022
function calcGoldWeightforrawetal(checkvalue, count, gdweight, utinid,metaltype,id) {
    var sttr_meatl_type=document.getElementById("sttr_metal_type").value;
    if(metaltype==sttr_meatl_type){
    var gsWeight = parseFloat(document.getElementById("sttr_gs_weight").value);
    if (isNaN(gsWeight)) {
        gsWeight = 0; // Default to 0 if the value is invalid
    }
    if (checkvalue == true) {
        gsWeight += parseFloat(gdweight);
    } else {
        gsWeight -= parseFloat(gdweight);
    }
    document.getElementById("sttr_gs_weight").value = gsWeight;
    document.getElementById("sttr_nt_weight").value = gsWeight;
    document.getElementById("netWeight").value = gsWeight;
    var settledUtinIdInput = document.getElementById("settled_utin_ids"); // Replace with the correct input ID
    var settledUtinId = settledUtinIdInput.value;

    // Update the settled utin IDs
    settledUtinId = updateSettledUtinIds(settledUtinId, utinid, checkvalue);

    // Store the updated IDs back in the input field
    settledUtinIdInput.value = settledUtinId;
     changeNetWeightByPktWt();
     calRawMetalFinVal();
}else{
   const checkbox = document.getElementById(id);
    if (checkbox) {
        checkbox.checked = false;
    }
}
}

function updateSettledUtinIds(settledUtinId, utinid, add) {
    // Ensure settledUtinId is treated as a string and not null
    settledUtinId = settledUtinId || "";

    // Split the settledUtinId into an array based on '|'
    let idArray = settledUtinId ? settledUtinId.split(',') : [];

    if (add) {
        // Add utinid if it doesn't already exist in the array
        if (!idArray.includes(utinid)) {
            idArray.push(utinid);
        }
    } else {
        // Remove utinid from the array
        idArray = idArray.filter(id => id !== utinid);
    }

    // Join the array back into a '|' separated string
    return idArray.join(',');
}
