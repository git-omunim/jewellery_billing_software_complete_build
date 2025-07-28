/**********START CODE TO add Supp New Order @AUTHOR:PRIYA15JAN13***********/
/**********START CODE TO add Supp New Order validation @AUTHOR:PRIYA19JAN13***********/
/**********START CODE TO Change Supp New Order validations @AUTHOR:PRIYA25MAY13***********/
/**********Start code to add crystal val @Author:PRIYA12OCT13***********/
/**********Start code for Visitor pannel @Author:ASHWINI***********/
function validateSuppNwOrInputs() {

    if (validateSelectField(document.getElementById("suppNwOrBillDOBDay").value, "Please select Date Day!") == false) {
        document.getElementById("suppNwOrBillDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("suppNwOrBillDOBMonth").value, "Please select Date Month!") == false) {
        document.getElementById("suppNwOrBillDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("suppNwOrBillDOBYear").value, "Please select Date Year!") == false) {
        document.getElementById("suppNwOrBillDOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("suppNwOrDelvrDOBDay").value, "Please select Date Day!") == false) {
        document.getElementById("suppNwOrDelvrDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("suppNwOrDelvrDOBMonth").value, "Please select Date Month!") == false) {
        document.getElementById("suppNwOrDelvrDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("suppNwOrDelvrDOBYear").value, "Please select Date Year!") == false) {
        document.getElementById("suppNwOrDelvrDOBYear").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("suppNwOrInvoiceNo").value, "Please enter Invoice Number!") == false ||
            validateNum(document.getElementById("suppNwOrInvoiceNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("suppNwOrInvoiceNo").focus();
        return false;
    }
    /******************************Start Code To Change Id @AUTHOR:PRIYA28MAY13************************/
    else if (validateEmptyField(document.getElementById("addStockSupplierId").value, "Please choose Correct Supplier Name!") == false ||
            validateNum(document.getElementById("addStockSupplierId").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("addStockSupplierName").focus();
        return false;
    }
    /******************************End Code To Change Id @AUTHOR:PRIYA28MAY13************************/
    else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Id!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("accountId").value, "Please select Account Name!") == false) {
        document.getElementById("accountId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("suppNwOrItemId").value, "Please enter Item Id!") == false ||
            validateNum(document.getElementById("suppNwOrItemId").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("suppNwOrItemId").focus();
        return false;
    }
    /******************************Start Code To Change Id @AUTHOR:PRIYA28MAY13************************/
    /******************************Start Code To Change Validations @Author:PRIYA24JUL13************************/
    else if (validateEmptyField(document.getElementById("addStockItemName").value, "Please enter Item name!") == false) {
        document.getElementById("addStockItemName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addStockItemCategory").value, "Please enter Item Category!") == false) {
        document.getElementById("addStockItemCategory").focus();
        return false;
    }
    /******************************End Code To Change Validations @Author:PRIYA24JUL13************************/
    else if (validateEmptyField(document.getElementById("suppNwOrItemPieces").value, "Please enter Item Pieces!") == false ||
            validateNum(document.getElementById("suppNwOrItemPieces").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("suppNwOrItemPieces").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("suppNwOrItemGrossWeight").value, "Please enter Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("suppNwOrItemGrossWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("suppNwOrItemGrossWeight").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("suppNwOrItemNetWeight").value, "Please enter Net Weight!") == false ||
            validateNumWithDot(document.getElementById("suppNwOrItemNetWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("suppNwOrItemNetWeight").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addStockItemTunch").value, "Please select Item Tunch or Purity!") == false) {
        document.getElementById("addStockItemTunch").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("suppNwOrItemValuation").value, "Please enter Item Valuation!") == false ||
            validateNumWithDot(document.getElementById("suppNwOrItemValuation").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("suppNwOrItemValuation").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("suppNwOrItemFinalVal").value, "Please enter Item Final Valuation!") == false ||
            validateNumWithDot(document.getElementById("suppNwOrItemFinalVal").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("suppNwOrItemFinalVal").focus();
        return false;
    } else {
        crystalEntered = 0;
        for (var dc = 1; dc <= getCrystalDiv; dc++) {
            if (document.getElementById("suppNwOrCryId" + dc).value != "") {
                if ((document.getElementById('suppNwOrCryDel' + dc).value != 'Deleted')) {
                    if (validateEmptyField(document.getElementById("suppNwOrCryId" + dc).value, "Please select Crystal Id" + dc + "!") == false) {
                        document.getElementById("suppNwOrCryId" + dc).focus();
                        return false;
                    } else if (validateEmptyField(document.getElementById("suppNwOrCryRate" + dc).value, "Please select Crystal Rate!" + dc + "!") == false) {
                        document.getElementById("suppNwOrCryRate" + dc).focus();
                        return false;
                    } else if (validateEmptyField(document.getElementById("suppNwOrCryVal" + dc).value, "Please select Crystal Valuation!" + dc + "!") == false) {
                        document.getElementById("suppNwOrCryVal" + dc).focus();
                        return false;
                    } else if (validateEmptyField(document.getElementById("suppNwOrCryFinalVal" + dc).value, "Please Select Crystal Final Valuation!" + dc + "!") == false) {
                        document.getElementById("suppNwOrCryFinalVal" + dc).focus();
                        return false;
                    }
                }
                crystalEntered++;
            }
        }
    }
    return true;
}
/**********End code to add crystal val @Author:PRIYA12OCT13***********/
/**********END CODE TO Change Supp New Order validations @AUTHOR:PRIYA25MAY13***********/
/**********END CODE TO add Supp New Order @AUTHOR:PRIYA19JAN13***********/
/**********Start code to add crystal val @Author:PRIYA11OCT13***********/
function addSuppNewOrder(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("suppNwOrSubButtDiv").style.visibility = "hidden";

    if (validateSuppNwOrInputs(obj)) {
        if (document.getElementById("sporCryId").value != '') {
            document.getElementById("suppTotCrystal").value = parseFloat(document.getElementById("noOfCry").value) + (getCrystalDiv - 1);
        } else {
            document.getElementById("suppTotCrystal").value = getCrystalDiv;
        }
        if (uploadImage(document.getElementById("suppNwOrItemSelectPhotoIMG").value) == false) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("suppNwOrSubButtDiv").style.visibility = "visible";
            return false;
        }
        return true;
    } else
    {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("suppNwOrSubButtDiv").style.visibility = "visible";
        return false;
    }
}
/**********End code to add crystal val @Author:PRIYA11OCT13***********/
/**********END CODE TO add Supp New Order @AUTHOR:PRIYA15JAN13***********/
var actionItemID;
function setactionItemID(obj) {
    actionItemID = obj.id;
}

/*******START CODE TO Validate Update Action Item @AUTHOR:PRIYA18JAN13***********/
function validateUpdateNewActionItem() {
    if (validateEmptyField(document.getElementById("upTaskDescrpn").value, "Please enter Task Description!") == false) {
        document.getElementById("upTaskDescrpn").focus();
        return false; //Validation Added for Task Desc @AUTHOR:PRIYA07JAN13
    } else if (validateSelectField(document.getElementById("upStartDOBDay").value, "Please select Action Item Start Date!") == false) {
        document.getElementById("upStartDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("upStartDOBMonth").value, "Please select Action Item Start Month!") == false) {
        document.getElementById("upStartDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("upStartDOBYear").value, "Please select Action Item Start Year!") == false) {
        document.getElementById("upStartDOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("upEndDOBDay").value, "Please select Action Item End Date!") == false) {
        document.getElementById("upEndDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("upEndDOBMonth").value, "Please select Action Item End Month!") == false) {
        document.getElementById("upEndDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("upEndDOBYear").value, "Please select Action Item End Year!") == false) {
        document.getElementById("upEndDOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("actionItemFirmId").value, "Please select Firm Name!") == false) {
        document.getElementById("actionItemFirmId").focus();
        return false;
    }
    return true;
}
/*******END CODE TO Validate Update Action Item @AUTHOR:PRIYA18JAN13***********/
function update_action_item(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertUpadateActionItem;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}
function alertUpadateActionItem() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addActionItemList").innerHTML = xmlhttp.responseText;
        document.getElementById("updateNewActionItemButDiv").innerHTML = '<div id="ajax_upated_div" style="visibility: visible; background:none;" class="addedUpdatedMess"> ~Updated Successfully ~ </div>';
        window.setTimeout(closeActionItemDivDelay, 500);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function closeActionItemDivDelay()
{
    document.getElementById("addActionItemDiv").innerHTML = '';
    document.getElementById("ajaxCloseUpdateNewActionItem").style.visibility = "hidden";
}
/*******START CODE TO Change Update ad File name @AUTHOR:PRIYA23MAR13***********/
function updateNewActionItem(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("updateNewActionItemButDiv").style.visibility = "hidden";

    if (validateUpdateNewActionItem()) {
        poststr = "omgupTaskDescrpn=" + encodeURIComponent(document.getElementById("upTaskDescrpn").value)
                + "&omgActionId=" + encodeURIComponent(document.getElementById("actionid").value)
                + "&omgtaskRepeat=" + encodeURIComponent(document.getElementById("upTaskRepeat").value)
                + "&omgselectFirmId=" + encodeURIComponent(document.getElementById("actionItemFirmId").value)
                + "&omgupStartDOBDay=" + encodeURIComponent(document.getElementById("upStartDOBDay").value)
                + "&omgupStartDOBMonth=" + encodeURIComponent(document.getElementById("upStartDOBMonth").value)
                + "&omgupStartDOBYear=" + encodeURIComponent(document.getElementById("upStartDOBYear").value)
                + "&omgupEndDOBDay=" + encodeURIComponent(document.getElementById("upEndDOBDay").value)
                + "&omgupEndDOBMonth=" + encodeURIComponent(document.getElementById("upEndDOBMonth").value)
                + "&omgupEndDOBYear=" + encodeURIComponent(document.getElementById("upEndDOBYear").value);
        //alert(poststr);
        update_action_item('include/php/omaiucad.php', poststr);//Update Action Item file name changed @AUTHOR:PRIYA18JAN13
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("updateNewActionItemButDiv").style.visibility = "visible";
    }
}
/*******END CODE TO Change Update ad File name @AUTHOR:PRIYA23MAR13***********/
/**********************Start Code To Change Id @AUTHOR:PRIYA11JUNE13******************/
function validateUpdateStockInputs() {

    if (validateSelectField(document.getElementById("updateStockDOBDay").value, "Please select Stock Date Day!") == false) {
        document.getElementById("updateStockDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("updateStockDOBMonth").value, "Please select Stock Date Month!") == false) {
        document.getElementById("updateStockDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("updateStockDOBYear").value, "Please select Stock Date Year!") == false) {
        document.getElementById("updateStockDOBYear").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("updateStockInvoiceNo").value, "Please enter Invoice Number!") == false ||
            validateNum(document.getElementById("updateStockInvoiceNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("updateStockInvoiceNo").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addStockSupplierId").value, "Please choose Correct Supplier Name!") == false ||
            validateNum(document.getElementById("addStockSupplierId").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("addStockSupplierId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("accountId").value, "Please select Account Name!") == false) {
        document.getElementById("accountId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addStockItemId").value, "Please enter Item Id!") == false ||
            validateNum(document.getElementById("addStockItemId").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("addStockItemId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Stock Firm Id!") == false) {
        document.getElementById("firmId").focus();
        return false;
    }
    /**********************Start Code To Change Validation @AUTHOR:PRIYA11JUNE13******************/
    else if (validateEmptyField(document.getElementById("addStockItemName").value, "Please enter Item Name!") == false) {
        document.getElementById("addStockItemName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addStockItemCategory").value, "Please enter Item Category!") == false) {
        document.getElementById("addStockItemCategory").focus();
        return false;
    }
    /**********************End Code To Change Validation @AUTHOR:PRIYA11JUNE13******************/
    else if (validateEmptyField(document.getElementById("addStockItemPieces").value, "Please enter Item Category!") == false ||
            validateNum(document.getElementById("addStockItemPieces").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("addStockItemPieces").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addStockItemGrossWeight").value, "Please enter Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("addStockItemGrossWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("addStockItemGrossWeight").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addStockItemNetWeight").value, "Please enter Net Weight!") == false ||
            validateNumWithDot(document.getElementById("addStockItemNetWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("addStockItemNetWeight").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addStockItemTunch").value, "Please select Item Tunch or Purity!") == false) {
        document.getElementById("addStockItemTunch").focus();
        return false;
    }
    /******Start Code To Add Validdation For Cust Wastage @AUTHOR:PRIYA03MAY13*******/
    else if (validateEmptyField(document.getElementById("addStockItemCustWastage").value, "Please enter Cust Wastage!") == false ||
            validateNumWithDot(document.getElementById("addStockItemCustWastage").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("addStockItemCustWastage").focus();
        return false;
    } /******End Code To Add Validdation For Cust Wastage @AUTHOR:PRIYA03MAY13*******/
    else if (validateEmptyField(document.getElementById("addStockItemValuation").value, "Please enter Item Valuation!") == false ||
            validateNumWithDot(document.getElementById("addStockItemValuation").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("addStockItemValuation").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addStockItemFinalVal").value, "Please enter Item Final Valuation!") == false ||
            validateNumWithDot(document.getElementById("addStockItemFinalVal").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("addStockItemFinalVal").focus();
        return false;
    }
    return true;
}
/**********************End Code To Change Id @AUTHOR:PRIYA11JUNE13******************/
function updateStockItem(obj) {

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("updateStockSubButtDiv").style.visibility = "hidden";

    if (validateUpdateStockInputs(obj)) {
        if (uploadImage(document.getElementById("addStockItemSelectPhoto").value) == false) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("updateStockSubButtDiv").style.visibility = "visible";
            return false;
        }
        return true;
    } else
    {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("updateStockSubButtDiv").style.visibility = "visible";
        return false;
    }
}
/**************** Start Code To Update Firm In Update Girvi Panel @AUTHOR:PRIYA02APR13****************/
function update_girvi_firm_id(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertUpdateGirviFirmId;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}

function alertUpdateGirviFirmId() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function updateGirviFirmId(documentRootPath, custId, girviId, girviFirmId) {

    document.getElementById("updateGirviFirmIdCloseButton" + girviId).style.visibility = "hidden";
    if (girviFirmId == 'NotSelected') {
        alert(updateGirvFirmAlert1 + ' \n\nPlease select Firm Name first!');//add variables of alert msgs @AUTHOR: SANDY29JAN14
    } else {
        confirm_box = confirm(updateGirvFirmAlert2 + " \n\nDo you really want to update Firm?");//add variables of alert msgs @AUTHOR: SANDY29JAN14

        if (confirm_box == true)
        {
            var poststr = "custId=" + custId + "&girviId=" + girviId +
                    "&girviFirmId=" + girviFirmId;

            update_girvi_firm_id(documentRootPath + '/include/php/orgufrnm.php', poststr);
        }
    }
    document.getElementById("updateGirviFirmIdCloseButton" + girviId).style.visibility = "visible";
    return false;
}
/**************** End Code To Update Firm In Update Girvi Panel @AUTHOR:PRIYA02APR13*******************/
/**************Start Code To Change Voucher No By Firm Id @AUTHOR:PRIYA21MAY13*****/
var selFirmId;
var transPanel;
function get_firm_voucher_no(url, parameters) {

    loadXMLDoc2();

    xmlhttp2.onreadystatechange = alertGetFirmVoucherNo;

    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);

}
function alertGetFirmVoucherNo() {

    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("ajaxLoadNavigateTransactionList").style.visibility = "hidden";
        document.getElementById("transVoucherNoDiv").innerHTML = xmlhttp2.responseText;
//        if (transPanel == 'AddNewTransWithMultipleOpt') {  // CONDITION ADDED @AUTHOR:SHRI13AUG20
        document.getElementById('transFirmId').focus();
//        } else {
//            document.getElementById('transPreVoucherNo').focus();//@AUTHOR: SANDY10JAN14
//        }
        //getTransactionAccountsByFrmId(selFirmId);COMMENT BY @AUTHOR: SANDY02JAN14
    } else {
        document.getElementById("ajaxLoadNavigateTransactionList").style.visibility = "visible";
    }
}
function getFirmVoucherNo(selectedFirmNo, panel, month, year) {
    selFirmId = selectedFirmNo;
    transPanel = panel;
    var poststr = "firmNo=" + encodeURIComponent(selectedFirmNo) +
            "&panel=" + encodeURIComponent(panel) +
            "&selectedMonth=" + encodeURIComponent(month) +
            "&selectedYear=" + encodeURIComponent(year);

    get_firm_voucher_no('include/php/omtatrvn.php', poststr);

}
/****************Start Code To Pass xmlhttpStr as responseText @Author:PRIYA29JUN13************/
/********Start to change function  @AUTHOR: SANDY29NOV13****/
function updateTransGirviDetails(girviId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            /*var xmlhttpStr = xmlhttp.responseText;
             xmlhttpStr = xmlhttpStr.slice(xmlhttpStr.indexOf("@") + 1);
             xmlhttpStr = xmlhttpStr.slice(xmlhttpStr.indexOf("@") + 1); COMMENT BY @AUTHOR: SANDY29NOV13*/
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;//change in division @AUTHOR: SANDY29NOV13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/olggtgvd.php?girviId=" + girviId + "&panelName=" + panelName, true);//change in filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
/********End to change function  @AUTHOR: SANDY29NOV13****/
/****************End Code To Pass xmlhttpStr as responseText @Author:PRIYA29JUN13************/
/****************End Code To Pass xmlhttpStr as responseText @Author:PRIYA29JUN13************/
/**************End Code To Navigate To Update Transfer Girvi Panel @AUTHOR:PRIYA23MAY13*******************/
/***********Start Code To Update Principal Amount In Transferred Girvi Panel  @AUTHOR:PRIYA23MAY13***********/
/***********Start code to add global variable and change function to add panel @Author:PRIYA09DEC14***********/
function update_trans_girvi_principal_amount(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertUpdateTransGirviPrincipalAmount;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}
/*************Start Code To Change Div @Author:PRIYA29JUN13***********/
/********Start to change function  @AUTHOR: SANDY29NOV13****/
function alertUpdateTransGirviPrincipalAmount() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        /*var xmlhttpStr = xmlhttp.responseText;
         xmlhttpStr = xmlhttpStr.slice(xmlhttpStr.indexOf("@") + 1);
         xmlhttpStr = xmlhttpStr.slice(xmlhttpStr.indexOf("@") + 1); comment by @AUTHOR: SANDY29NOV13*/
        if (upDatePanelName == 'AddPrinTransPrinUp')
            document.getElementById("addPrinTransDetDiv").innerHTML = xmlhttp.responseText;
        else
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;//CHANGE IN DIV @AUTHOR: SANDY29NOV13
    }
}
/********End to change function  @AUTHOR: SANDY29NOV13****/
/*********Start code to add girviJrnlId @Author:PRIYA30MAY14***********************/
function updateGirviTransPrincipalAmount(documentRootPath, transGirviId, girviId, prinAmount, girviJrnlId, transUpPanel) {
    upDatePanelName = transUpPanel;
    document.getElementById("gTransUpdatePrincipalButton").style.visibility = "hidden";

    var principalAmount = prinAmount.value;
    if (validateEmptyField(principalAmount, "Please enter Principal Amount!") == false ||
            validateNum(principalAmount, "Accept only numeric characters without space character!") == false) {
        document.getElementById("gTransUpdatePrincipalAmount").focus();
        document.getElementById("gTransUpdatePrincipalButton").style.visibility = "visible";
        return false;
    } else {
        confirm_box = confirm("Do you really want to update Principal Amount?");
        if (confirm_box == true)
        {
            var poststr = "principalAmount=" + principalAmount
                    + "&transGirviId=" + transGirviId
                    + "&girviId=" + girviId
                    + "&girviJrnlId=" + girviJrnlId
                    + "&transUpPanel=" + transUpPanel;

            update_trans_girvi_principal_amount(documentRootPath + '/include/php/olgtgupa.php', poststr);//change in filename @AUTHOR: SANDY22NOV13
        }
    }
    document.getElementById("gTransUpdatePrincipalButton").style.visibility = "visible";
    return false;
}
/***********End code to add global variable and change function to add panel @Author:PRIYA09DEC14***********/
/*********End code to add girviJrnlId @Author:PRIYA30MAY14***********************/
/*************End Code To Change Div @Author:PRIYA29JUN13***********/
/***********End Code To Update Principal Amount In Transferred Girvi Panel  @AUTHOR:PRIYA23MAY13***********/
/***********Start Code To Update TROI value @AUTHOR:PRIYA23MAY13***********/
function update_roi_value(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertDeleteDepositGirviAmt;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}

function alertUpdateROIValue() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    }
}
function updateTROIValue(documentRootPath, girviTransId, girviROIForm) {

    document.getElementById("ajaxUpdateROIValueButt").innerHTML = "<img src='images/loading16.gif' />";

    confirm_box = confirm(updateROIAlertMess + "\n\nDo you really want to update rate of interest?");//add variables of alert msgs @AUTHOR: SANDY29JAN14

    if (confirm_box == true)
    {
        for (i = 0; i < girviROIForm.selROI.length; i++) {
            if (girviROIForm.selROI[i].checked == true)
                ROIValue = girviROIForm.selROI[i].value;
        }
        var poststr = "girviTransId=" + girviTransId
                + "&ROIValue=" + ROIValue;
        //alert(poststr);
        update_roi_value(documentRootPath + '/include/php/olgtroiv.php', poststr);//change in filename @AUTHOR: SANDY20NOV13
    } else {
        document.getElementById("ajaxUpdateROIValueButt").innerHTML = "<img src='images/update16.png' />";
    }
    return false;
}
/***********End Code To Update TROI value @AUTHOR:PRIYA23MAY13***********/
/***********Start code To Function To Get Staff Home @AUTHOR:PRIYA03JUNE13*******/
function getStaffDetails(staffPanelOption) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omehmndv.php?staffId=" + staffId + "&staffPanelOption=" + staffPanelOption,
            true);
    xmlhttp.send();
}
/***********End code To Function To Get Staff Home @AUTHOR:PRIYA03JUNE13*******/
/***********Start Code To Get Staff Access Panel @AUTHOR:PRIYA04JUNE13********/
function getStaffAccess(staffId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("staff_middle_body").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omeheacc.php?staffId=" + staffId,
            true);
    xmlhttp.send();
}
/***********End Code To Get Staff Access Panel @AUTHOR:PRIYA04JUNE13********/
/***********Start Code To Get Staff omgold Access Panel @AUTHOR:PRIYA04JUNE13********/
function getStaffOmgoldAccessDiv(staffId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("staffAccessDiv").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omehogac_2_6_88.php?staffId=" + staffId,
            true);
    xmlhttp.send();
}
/***********Start Code To Get Staff omgold Access Panel @AUTHOR:PRIYA04JUNE13********/
/***Start to change in filename @AUTHOR: SANDY13AUG13 *******/
/***********Start Code To Get Staff omrevo Access Panel @AUTHOR:PRIYA04JUNE13********/
function getStaffOmrevoAccessDiv(staffId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("staffAccessDiv").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/orehorac_2_6_88.php?staffId=" + staffId,
            true);// change in filename @AUTHOR: SANDY14AUG13
    xmlhttp.send();
}
/***********Start Code To Get Staff omrevo Access Panel @AUTHOR:PRIYA04JUNE13********/
/***End to change in filename @AUTHOR: SANDY13AUG13 *******/
/***********Start Code To Get Staff omunim Access Panel @AUTHOR:PRIYA04JUNE13********/
/***********Start code to add panel @Author:PRIYA25JUN14***************/
function getStaffCommonAccessDiv(staffId, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("staffAccessDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'FirmAccess')
        xmlhttp.open("GET", "include/php/omehfmac_2_6_88.php?staffId=" + staffId, true);
    else if (panel == 'PanelAccess')
        xmlhttp.open("GET", "include/php/omehpmac_2_6_104.php?staffId=" + staffId, true);
    else if (panel == 'MasterAccess')
        xmlhttp.open("GET", "include/php/stock/master/omMasterPanelAccess.php?staffId=" + staffId, true);
    else
        xmlhttp.open("GET", "include/php/omehcmac_2_6_88.php?staffId=" + staffId, true);
    xmlhttp.send();
}
/***********End code to add panel @Author:PRIYA25JUN14***************/
/***********Start Code To Get Staff omunim Access Panel @AUTHOR:PRIYA04JUNE13********/

/***************Start Code To Get Acceess to Staff @AUTHOR:PRIYA04JUNE13************/
/***************Start Code To Add poststr For Staff Access Panel @AUTHOR:PRIYA05JUNE13************/
var empPanelName;
var empId;
function add_emp_access(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddEmpAccess;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/***************Start Code To Change Div Name @AUTHOR:PRIYA06JUNE13************/
function alertAddEmpAccess() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (empPanelName == 'omgoldAccess') {
            document.getElementById("omgoldAccessDiv").innerHTML = xmlhttp.responseText;
        } else if (empPanelName == 'omrevoAccess') {
            document.getElementById("omrevoAccessDiv").innerHTML = xmlhttp.responseText;
        } else if (empPanelName == 'commonAccess') {
            document.getElementById("commonAccessDiv").innerHTML = xmlhttp.responseText;
        } else if (empPanelName == 'panelAccess') {
            document.getElementById("panelAccessDiv").innerHTML = xmlhttp.responseText;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/**********Start of changes to pass access subfields @AUTHOR: SANDY09JAN14 *******/
/**********Start of changes to pass access subfields @AUTHOR: SANDY16AUG13 *******/
/***************End Code To Change Div Name @AUTHOR:PRIYA06JUNE13************/
/***************Start code to add panels @Author:PRIYA01MAR14********************/
/***************Start code to add loan list access @Author:PRIYA05OCT14**************/
/***************Start code to add circle access @Author:PRIYA03DEC14*******************/
/***************Start code to add crystal access  in omgold @Author:SHE11MAR15 *******************/
/***************Start code to add Imitation for add update and delete access @Author:ANUJA11MAR15*******************/
/***************Start code to add data backup access @Author:SANT09NOV16*******************/
/***************Start code to add payment panel fields access @AUTHOR:SHRI23JAN20*******************/
function addEmpAccess(panelName, staffId) {
    empPanelName = panelName;
    empId = staffId;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("empAccessButton").style.visibility = "hidden";

    confirm_box = confirm("Are You Sure To Allow Access To This Panels!");

    if (confirm_box == true)
    {
        if (empPanelName == 'omgoldAccess') {
//               alert("m:-  " + empPanelName);
//            ######################################################################################
//             START YUVRAJ MAKE THIS CODE FOR RETAILS UNDEFINED VARIABLE SOLVE ERROR @ YUVRAJ 13062022
//            ######################################################################################
            addNewOrderAccess = document.getElementById("addNewOrderAccess");
            deleteNewOrderAccess = document.getElementById("deleteNewOrderAccess");
            addNewOrderAccessFirm = document.getElementById("addNewOrderAccessFirm");
            addNewOrderAccessAcntType = document.getElementById("addNewOrderAccessAcntType");
            //
            if (typeof (addNewOrderAccess) != 'undefined' && addNewOrderAccess != null) {
                addNewOrderAccessundefined = addNewOrderAccess;
            } else {
                addNewOrderAccessundefined = '';
            }

            if (typeof (deleteNewOrderAccess) != 'undefined' && deleteNewOrderAccess != null) {
                deleteNewOrderAccessundefined = deleteNewOrderAccess;
            } else {
                deleteNewOrderAccessundefined = '';
            }
            //
            if (typeof (addNewOrderAccessFirm) != 'undefined' && addNewOrderAccessFirm != null) {
                addNewOrderAccessFirmundefined = addNewOrderAccessFirm;
            } else {
                addNewOrderAccessFirmundefined = '';
            }
            //
            if (typeof (addNewOrderAccessAcntType) != 'undefined' && addNewOrderAccessAcntType != null) {
                addNewOrderAccessAcntTypeundefined = addNewOrderAccessAcntType;
            } else {
                addNewOrderAccessAcntTypeundefined = '';
            }
            //
            //
            addNewOrderAccessItemId = document.getElementById("addNewOrderAccessItemId");
            addNewOrderAccessMetalRate = document.getElementById("addNewOrderAccessMetalRate");
            addNewOrderAccessFinalEvl = document.getElementById("addNewOrderAccessFinalEvl");
            //
            if (typeof (addNewOrderAccessItemId) != 'undefined' && addNewOrderAccessItemId != null) {
                addNewOrderAccessItemIdundefined = addNewOrderAccessItemId;
            } else {
                addNewOrderAccessItemIdundefined = '';
            }
            //
            if (typeof (addNewOrderAccessMetalRate) != 'undefined' && addNewOrderAccessMetalRate != null) {
                addNewOrderAccessMetalRateundefined = addNewOrderAccessMetalRate;
            } else {
                addNewOrderAccessMetalRateundefined = '';
            }
            //
            if (typeof (addNewOrderAccessFinalEvl) != 'undefined' && addNewOrderAccessFinalEvl != null) {
                addNewOrderAccessFinalEvlundefined = addNewOrderAccessFinalEvl;
            } else {
                addNewOrderAccessFinalEvlundefined = '';
            }
            //
            addNewOrderAccessVtax = document.getElementById("addNewOrderAccessVtax");
            addNewOrderAccessOtax = document.getElementById("addNewOrderAccessOtax");
            addNewOrderAccessIcom = document.getElementById("addNewOrderAccessIcom");
            //
            if (typeof (addNewOrderAccessVtax) != 'undefined' && addNewOrderAccessVtax != null) {
                addNewOrderAccessVtaxundefined = addNewOrderAccessVtax;
            } else {
                addNewOrderAccessVtaxundefined = '';
            }
            if (typeof (addNewOrderAccessOtax) != 'undefined' && addNewOrderAccessOtax != null) {
                addNewOrderAccessOtaxundefined = addNewOrderAccessOtax;
            } else {
                addNewOrderAccessOtaxundefined = '';
            }
            if (typeof (addNewOrderAccessIcom) != 'undefined' && addNewOrderAccessIcom != null) {
                addNewOrderAccessIcomundefined = addNewOrderAccessIcom;
            } else {
                addNewOrderAccessIcomundefined = '';
            }
            //
            addNewOrderAccessIweb = document.getElementById("addNewOrderAccessIweb");
            addSellTransAccessfirm = document.getElementById("addSellTransAccessfirm");
            addSellTransAccessDate = document.getElementById("addSellTransAccessDate");
            //
            if (typeof (addNewOrderAccessIweb) != 'undefined' && addNewOrderAccessIweb != null) {
                addNewOrderAccessIwebundefined = addNewOrderAccessIweb;
            } else {
                addNewOrderAccessIwebundefined = '';
            }
            //
            if (typeof (addSellTransAccessfirm) != 'undefined' && addSellTransAccessfirm != null) {
                addSellTransAccessfirmundefined = addSellTransAccessfirm;
            } else {
                addSellTransAccessfirmundefined = '';
            }
            //
            if (typeof (addSellTransAccessDate) != 'undefined' && addSellTransAccessDate != null) {
                addSellTransAccessDateundefined = addSellTransAccessDate;
            } else {
                addSellTransAccessDateundefined = '';
            }
            //
            addSupplierAccessSupTyp = document.getElementById("addSupplierAccessSupTyp");
            addSupplierAccessFirm = document.getElementById("addSupplierAccessFirm");
            addSupplierAccessSupId = document.getElementById("addSupplierAccessSupId");
            //
            if (typeof (addSupplierAccessSupTyp) != 'undefined' && addSupplierAccessSupTyp != null) {
                addSupplierAccessSupTypundefined = addSupplierAccessSupTyp;
            } else {
                addSupplierAccessSupTypundefined = '';
            }
            //
            if (typeof (addSupplierAccessFirm) != 'undefined' && addSupplierAccessFirm != null) {
                addSupplierAccessFirmundefined = addSupplierAccessFirm;
            } else {
                addSupplierAccessFirmundefined = '';
            }
            if (typeof (addSupplierAccessSupId) != 'undefined' && addSupplierAccessSupId != null) {
                addSupplierAccessSupIdundefined = addSupplierAccessSupId;
            } else {
                addSupplierAccessSupIdundefined = '';
            }
            //
            addSupplierAccessAcntTyp = document.getElementById("addSupplierAccessAcntTyp");
            updateSupplierAccessSupTyp = document.getElementById("updateSupplierAccessSupTyp");
            updateSupplierAccessFirm = document.getElementById("updateSupplierAccessFirm");
            //
            if (typeof (addSupplierAccessAcntTyp) != 'undefined' && addSupplierAccessAcntTyp != null) {
                addSupplierAccessAcntTypundefined = addSupplierAccessAcntTyp;
            } else {
                addSupplierAccessAcntTypundefined = '';
            }
            if (typeof (updateSupplierAccessSupTyp) != 'undefined' && updateSupplierAccessSupTyp != null) {
                updateSupplierAccessSupTypundefined = updateSupplierAccessSupTyp;
            } else {
                updateSupplierAccessSupTypundefined = '';
            }
            if (typeof (updateSupplierAccessFirm) != 'undefined' && updateSupplierAccessFirm != null) {
                updateSupplierAccessFirmundefined = updateSupplierAccessFirm;
            } else {
                updateSupplierAccessFirmundefined = '';
            }
            //
            updateSupplierAccessSupId = document.getElementById("updateSupplierAccessSupId");
            updateSupplierAccessAcntTyp = document.getElementById("updateSupplierAccessAcntTyp");
            //
            if (typeof (updateSupplierAccessSupId) != 'undefined' && updateSupplierAccessSupId != null) {
                updateSupplierAccessSupIdundefined = updateSupplierAccessSupId;
            } else {
                updateSupplierAccessSupIdundefined = '';
            }
            if (typeof (updateSupplierAccessAcntTyp) != 'undefined' && updateSupplierAccessAcntTyp != null) {
                updateSupplierAccessAcntTypundefined = updateSupplierAccessAcntTyp;
            } else {
                updateSupplierAccessAcntTypundefined = '';
            }
//            ######################################################################################
//             END YUVRAJ MAKE THIS CODE FOR RETAILS UNDEFINED VARIABLE SOLVE ERROR @ YUVRAJ 13062022
//            ######################################################################################
            //
            poststr = "addStockAccess=" + document.getElementById('addStockAccess').checked
                    + "&updateStockAccess=" + document.getElementById("updateStockAccess").checked
                    + "&deleteStockAccess=" + document.getElementById("deleteStockAccess").checked
                    + "&addSellTransAccess=" + document.getElementById("addSellTransAccess").checked
                    + "&deleteSellTransAccess=" + document.getElementById("deleteSellTransAccess").checked
                    + "&updateSellTransAccess=" + document.getElementById("updateSellTransAccess").checked
                    + "&changeMetalRateTransAccess=" + document.getElementById("changeMetalRateTransAccess").checked
                    + "&StoneSellRateAccess=" + document.getElementById("StoneSellRateAccess").checked
                    + "&sellDeleteQuotationAccess=" + document.getElementById("sellDeleteQuotationAccess").checked
                    + "&sellUpdateQuotationAccess=" + document.getElementById("sellUpdateQuotationAccess").checked
                    + "&changeStaffAcess=" + document.getElementById("changeStaffAcess").checked
                    //
//            ######################################################################################
//             START YUVRAJ MAKE THIS CODE FOR RETAILS UNDEFINED VARIABLE SOLVE ERROR @ YUVRAJ 13062022
//            ######################################################################################
                    + "&addNewOrderAccess=" + addNewOrderAccessundefined.checked
                    + "&deleteNewOrderAccess=" + deleteNewOrderAccessundefined.checked
//            ######################################################################################
//             END YUVRAJ MAKE THIS CODE FOR RETAILS UNDEFINED VARIABLE SOLVE ERROR @ YUVRAJ 13062022
//            ######################################################################################
                    //
                    + "&addSupplierAccess=" + document.getElementById("addSupplierAccess").checked
                    + "&updateSupplierAccess=" + document.getElementById("updateSupplierAccess").checked
                    + "&deleteSupplierAccess=" + document.getElementById("deleteSupplierAccess").checked
                    + "&supplierListAccess=" + document.getElementById("supplierListAccess").checked
                    + "&supplierTransactionAccess=" + document.getElementById("supplierTransactionAccess").checked
                    + "&supplierHomeAccess=" + document.getElementById("supplierHomeAccess").checked
                    + "&supplierFinePurchaseAccess=" + document.getElementById("supplierFinePurchaseAccess").checked
                    + "&supplierImtCryPurchaseAccess=" + document.getElementById("supplierImtCryPurchaseAccess").checked
                    + "&supplierRawMetalPurchaseAccess=" + document.getElementById("supplierRawMetalPurchaseAccess").checked
                    + "&supplierPurchaseListAccess=" + document.getElementById("supplierPurchaseListAccess").checked
                    + "&addSchemeAccess=" + document.getElementById("addSchemeAccess").checked
                    + "&addSchemeWithDisableFieldsAccess=" + document.getElementById("addSchemeWithDisableFieldsAccess").checked
                    + "&addNewSchemeAccess=" + document.getElementById("addNewSchemeAccess").checked
                    + "&updateSchemeAccess=" + document.getElementById("updateSchemeAccess").checked
                    + "&deleteSchemeAccess=" + document.getElementById("deleteSchemeAccess").checked
                    + "&SchemeListAccess=" + document.getElementById("SchemeListAccess").checked
                    + "&SchemeReportAccess=" + document.getElementById("SchemeReportAccess").checked
                    + "&SchemeCollectionListAccess=" + document.getElementById("SchemeCollectionListAccess").checked
                    + "&SchemeCollectionApprovalListAccess=" + document.getElementById("SchemeCollectionApprovalListAccess").checked
                    + "&SchemeNonCollectionListAccess=" + document.getElementById("SchemeNonCollectionListAccess").checked
                    + "&SchemeGiftListAccess=" + document.getElementById("SchemeGiftListAccess").checked
                    + "&ClosedSchemeAccess=" + document.getElementById("ClosedSchemeAccess").checked
                    + "&CurrentSchemeAccess=" + document.getElementById("CurrentSchemeAccess").checked
                    + "&SchemeSearchAccess=" + document.getElementById("SchemeSearchAccess").checked
                    + "&SchemeEmiAccess=" + document.getElementById("SchemeEmiAccess").checked//ADDED FOR SCHEME EMI AMOUNT CHANGE ACCESS @AUTHOR:MADHUREE-01JULY2020
                    + "&SchemePaymentBackDateEntryAccess=" + document.getElementById("SchemePaymentBackDateEntryAccess").checked//ADDED FOR SCHEME PAYMENT BACK DATE ENTRY ACCESS @AUTHOR:MADHUREE-05AUGUST2020
                    + "&addStockAccessInvNo=" + document.getElementById("addStockAccessInvNo").checked
                    + "&addStockAccessSupp=" + document.getElementById("addStockAccessSupp").checked
                    + "&addStockAccessFirm=" + document.getElementById("addStockAccessFirm").checked
                    + "&addStockAccessAcntType=" + document.getElementById("addStockAccessAcntType").checked
                    + "&addStockAccessItemId=" + document.getElementById("addStockAccessItemId").checked
                    + "&addStockAccessMetalType=" + document.getElementById("addStockAccessMetalType").checked
                    + "&addStockAccessMetalRate=" + document.getElementById("addStockAccessMetalRate").checked
                    + "&addStockAccessFinalEvl=" + document.getElementById("addStockAccessFinalEvl").checked
                    + "&addStockAccessVtax=" + document.getElementById("addStockAccessVtax").checked
                    + "&addStockAccessOtax=" + document.getElementById("addStockAccessOtax").checked
                    + "&addStockAccessIcom=" + document.getElementById("addStockAccessIcom").checked
                    + "&addStockAccessIweb=" + document.getElementById("addStockAccessIweb").checked
//            ######################################################################################
//             START YUVRAJ MAKE THIS CODE FOR RETAILS UNDEFINED VARIABLE SOLVE ERROR @ YUVRAJ 13062022
//            ######################################################################################
                    + "&addNewOrderAccessFirm=" + addNewOrderAccessFirmundefined.checked
                    + "&addNewOrderAccessAcntType=" + addNewOrderAccessAcntTypeundefined.checked
                    + "&addNewOrderAccessItemId=" + addNewOrderAccessItemIdundefined.checked
                    + "&addNewOrderAccessMetalRate=" + addNewOrderAccessMetalRateundefined.checked
                    + "&addNewOrderAccessFinalEvl=" + addNewOrderAccessFinalEvlundefined.checked
                    //
                    + "&addNewOrderAccessVtax=" + addNewOrderAccessVtaxundefined.checked
                    + "&addNewOrderAccessOtax=" + addNewOrderAccessOtaxundefined.checked
                    + "&addNewOrderAccessIcom=" + addNewOrderAccessIcomundefined.checked
                    + "&addNewOrderAccessIweb=" + addNewOrderAccessIwebundefined.checked
                    + "&addSellTransAccessfirm=" + addSellTransAccessfirmundefined.checked
                    //
                    + "&addSellTransAccessDate=" + addSellTransAccessDateundefined.checked
                    + "&addSupplierAccessSupTyp=" + addSupplierAccessSupTypundefined.checked
                    + "&addSupplierAccessFirm=" + addSupplierAccessFirmundefined.checked
                    + "&addSupplierAccessSupId=" + addSupplierAccessSupIdundefined.checked
                    + "&addSupplierAccessAcntTyp=" + addSupplierAccessAcntTypundefined.checked
                    //
                    + "&updateSupplierAccessSupTyp=" + updateSupplierAccessSupTypundefined.checked
                    + "&updateSupplierAccessFirm=" + updateSupplierAccessFirmundefined.checked
                    + "&updateSupplierAccessSupId=" + updateSupplierAccessSupIdundefined.checked
                    + "&updateSupplierAccessAcntTyp=" + updateSupplierAccessAcntTypundefined.checked
//            ######################################################################################
//             END YUVRAJ MAKE THIS CODE FOR RETAILS UNDEFINED VARIABLE SOLVE ERROR @ YUVRAJ 13062022
//            ######################################################################################
                    + "&empId=" + encodeURIComponent(empId)
                    + "&empPanelName=" + encodeURIComponent(empPanelName)
                    + "&stockPanelAccess=" + document.getElementById("stockPanelAccess").checked
                    + "&addStockAccessAutoWtRdOnly=" + document.getElementById("addStockAccessAutoWtRdOnly").checked
                    + "&addCrystalAccess=" + document.getElementById("addCrystalAccess").checked
                    + "&updateCrystalAccess=" + document.getElementById("updateCrystalAccess").checked
                    + "&deleteCrystalAccess=" + document.getElementById("deleteCrystalAccess").checked
                    + "&addCrystalRateAccess=" + document.getElementById("addCrystalRateAccess").checked
                    + "&addImitationAccess=" + document.getElementById('addImitationAccess').checked
                    + "&updateImitationAccess=" + document.getElementById("updateImitationAccess").checked
                    + "&deleteImitationAccess=" + document.getElementById("deleteImitationAccess").checked
                    + "&addCrystalInvoiceAccess=" + document.getElementById("addCrystalInvoiceAccess").checked //added for customized crystal invoice panekl @Author:SHE13MAR15
                    + "&addCrystalSoldOutListAccess=" + document.getElementById("addCrystalSoldOutListAccess").checked//added for customized crystal invoice panekl @Author:SHE13MAR15;  //added @Author:PRIYA23DEC14
                    + "&disableSellFieldsAccess=" + document.getElementById("disableSellFieldsAccess").checked//added to disable fields on staff login @Auhtor:SHRI18OCT19
                    + "&jewelleryPanelOnlineOptionAccess=" + document.getElementById("jewelleryPanelOnlineOptionAccess").checked
                    + "&jewelleryPanelItemDetailsAccess=" + document.getElementById("jewelleryPanelItemDetailsAccess").checked
                    + "&sellLesssWtAccess=" + document.getElementById("sellLesssWtAccess").checked
                    + "&sellDeleteCartItem=" + document.getElementById("sellDeleteCartItem").checked
                    + "&SellQuantityAccess=" + document.getElementById("SellQuantityAccess").checked
                    + "&SellGrossWeight=" + document.getElementById("SellGrossWeight").checked
                    + "&SchemeMaturityDateAceess=" + document.getElementById("SchemeMaturityDateAceess").checked
                    + "&SellPurchaseStock=" + document.getElementById("SellPurchaseStock").checked
                    + "&sellMakgingCharges=" + document.getElementById("sellMakgingCharges").checked
                    + "&sellMakgingIncreaseCharges=" + document.getElementById("sellMakgingIncreaseCharges").checked
                    + "&sellMakeQuotation=" + document.getElementById("sellMakeQuotation").checked
                    + "&addApprovalAccress=" + document.getElementById("addApprovalAccress").checked // start added code for approval staff access : author @ darshana 21 oct 2021
                    + "&addApprovalFirmAccess=" + document.getElementById("addApprovalFirmAccess").checked
                    + "&addApprovalDateAccess=" + document.getElementById("addApprovalDateAccess").checked
                    + "&deleteApprovalAcess=" + document.getElementById("deleteApprovalAcess").checked
                    + "&updateApprovalAcess=" + document.getElementById("updateApprovalAcess").checked
                    + "&disableAllApprovalFields=" + document.getElementById("disableAllApprovalFields").checked
                    + "&approvalQuantityAcess=" + document.getElementById("approvalQuantityAcess").checked
                    + "&approvalGswtAccess=" + document.getElementById("approvalGswtAccess").checked
                    + "&approvalLessWtAcess=" + document.getElementById("approvalLessWtAcess").checked
                    + "&returnApprovalItem=" + document.getElementById("returnApprovalItem").checked
                    + "&approvalMakingChrg=" + document.getElementById("approvalMakingChrg").checked
                    + "&approvalIncreseMkgChrg=" + document.getElementById("approvalIncreseMkgChrg").checked // end added code for approval staff access : author @ darshana 21 oct 2021
                    + "&stockSumryAcc=" + document.getElementById("stockSumryAcc").checked
                    + "&stockSumryAccAvaiGoldStockAccess=" + document.getElementById("stockSumryAccAvaiGoldStockAccess").checked
                    + "&stockSumryAccAvaiSilverStockAccess=" + document.getElementById("stockSumryAccAvaiSilverStockAccess").checked
                    + "&stockSumryAccAvaiStoneStockAccess=" + document.getElementById("stockSumryAccAvaiStoneStockAccess").checked
                    + "&stockSumryAccAllGoldStockAccess=" + document.getElementById("stockSumryAccAllGoldStockAccess").checked
                    + "&stockSumryAccAllSilverStockAccess=" + document.getElementById("stockSumryAccAllSilverStockAccess").checked
                    + "&stockSumryAccAllStoneStockAccess=" + document.getElementById("stockSumryAccAllStoneStockAccess").checked
                    + "&stockSumryAccStockMismatchStockAccess=" + document.getElementById("stockSumryAccStockMismatchStockAccess").checked
                    + "&stockSumryAccShowAddStockStockAccess=" + document.getElementById("stockSumryAccShowAddStockStockAccess").checked
                    + "&invLedgerAcc=" + document.getElementById("invLedgerAcc").checked
                    + "&stockLedgerAcc=" + document.getElementById("stockLedgerAcc").checked
                    + "&PurchaseLedgerAcc=" + document.getElementById("PurchaseLedgerAcc").checked
                    + "&sellLedgerAcc=" + document.getElementById("sellLedgerAcc").checked
                    + "&goldLedgerAcc=" + document.getElementById("goldLedgerAcc").checked
                    + "&silverLedgerAcc=" + document.getElementById("silverLedgerAcc").checked
                    + "&rawGdLedgerAcc=" + document.getElementById("rawGdLedgerAcc").checked
                    + "&rawSilLedgerAcc=" + document.getElementById("rawSilLedgerAcc").checked
                    + "&stoneLedgerAcc=" + document.getElementById("stoneLedgerAcc").checked
                    + "&taxLedgerAcc=" + document.getElementById("taxLedgerAcc").checked
                    + "&loanLedgerAcc=" + document.getElementById("loanLedgerAcc").checked
                    + "&interestLedgerAcc=" + document.getElementById("interestLedgerAcc").checked
                    + "&transLnLedgerAcc=" + document.getElementById("transLnLedgerAcc").checked
                    + "&udharLedgerAcc=" + document.getElementById("udharLedgerAcc").checked
                    + "&userTransactionLedgerAcc=" + document.getElementById("userTransactionLedgerAcc").checked
                    + "&completeLnLedgerAcc=" + document.getElementById("completeLnLedgerAcc").checked
                    + "&stockReportAccess=" + document.getElementById('stockReportAccess').checked
                    + "&schemeMetaltypeAccess=" + document.getElementById('schemeMetaltypeAccess').checked
                    + "&sellSalesMonthAccess=" + document.getElementById('sellSalesMonthAccess').checked
                    + "&hidepurchaseprice=" + document.getElementById('hidepurchaseprice').checked // YUVRAJ ADD THIS CODE FOR HIDE PURCHESE PRICE @YUVRAJ 02092022
                    + "&stockMultipleStockDeleteAccess=" + document.getElementById('stockMultipleStockDeleteAccess').checked
                    + "&schemePaidDateAccess=" + document.getElementById('schemePaidDateAccess').checked
//            ######################################################################################
//             START YUVRAJ MAKE THIS CODE FOR STAFF ACCESS STOCK REPORT LIST @ YUVRAJ 29122022
//            ######################################################################################
                    + "&lotstocklistStockReportAccess=" + document.getElementById('lotstocklistStockReportAccess').checked
                    + "&stockReportAccessRP=" + document.getElementById('stockReportAccessRP').checked
                    + "&stockReportAccessTaR=" + document.getElementById('stockReportAccessTaR').checked
                    + "&stockReportAccessPWhS=" + document.getElementById('stockReportAccessPWhS').checked
                    + "&stockReportAccessListRStP=" + document.getElementById('stockReportAccessListRStP').checked
                    + "&stockReportAccessWSsto=" + document.getElementById('stockReportAccessWSsto').checked
                    + "&stockReportAccessAllWh=" + document.getElementById('stockReportAccessAllWh').checked
                    + "&stockReportAccessARe=" + document.getElementById('stockReportAccessARe').checked
                    + "&stockReportAccessAvWh=" + document.getElementById('stockReportAccessAvWh').checked
                    + "&stockReportAccessAlRetaSt=" + document.getElementById('stockReportAccessAlRetaSt').checked
                    + "&stockReportAccessAavalWithMrp=" + document.getElementById('stockReportAccessAavalWithMrp').checked
                    + "&stockReportAccessAavalStockWithZeroQty=" + document.getElementById('stockReportAccessAavalStockWithZeroQty').checked
                    + "&stockReportAccessStTrans=" + document.getElementById('stockReportAccessStTrans').checked
                    + "&stockReportAccessStTrPendAppr=" + document.getElementById('stockReportAccessStTrPendAppr').checked
                    + "&stockReportAccessStTarAppr=" + document.getElementById('stockReportAccessStTarAppr').checked
                    + "&stockReportAccessStTrsRet=" + document.getElementById('stockReportAccessStTrsRet').checked
                    + "&stockReportAccessStTrRe=" + document.getElementById("stockReportAccessStTrRe").checked
                    + "&stockReportAccessStTrHis=" + document.getElementById("stockReportAccessStTrHis").checked
                    + "&stockReportAccessStDel=" + document.getElementById('stockReportAccessStDel').checked;
//            ######################################################################################
//             END YUVRAJ MAKE THIS CODE FOR STAFF ACCESS STOCK REPORT LIST @ YUVRAJ 29122022
//            ######################################################################################
//            alert('poststr==' + poststr);
        } else if (empPanelName == 'omrevoAccess') {

            poststr = "addNewGirviAccess=" + document.getElementById('addNewGirviAccess').checked
                    + "&updateGirviAccess=" + document.getElementById("updateGirviAccess").checked
                    + "&deleteGirviAccess=" + document.getElementById("deleteGirviAccess").checked
                    + "&analysisPanelAccess=" + document.getElementById("analysisPanelAccess").checked
                    + "&addMoneyLenderAccess=" + document.getElementById("addMoneyLenderAccess").checked
                    + "&moneyLenderListAccess=" + document.getElementById("moneyLenderListAccess").checked
                    + "&empId=" + encodeURIComponent(empId)
                    + "&empPanelName=" + encodeURIComponent(empPanelName)
                    + "&addNewGirviAccessIntType=" + document.getElementById("addNewGirviAccessIntType").checked //Start to pass subfield access values @AUTHOR: SANDY13AUG13
                    + "&addNewGirviAccessSerialNo=" + document.getElementById("addNewGirviAccessSerialNo").checked
                    + "&addNewGirviAccessPktNo=" + document.getElementById("addNewGirviAccessPktNo").checked
                    + "&addNewGirviAccessDate=" + document.getElementById("addNewGirviAccessDate").checked
                    + "&addNewGirviAccessGirviType=" + document.getElementById("addNewGirviAccessGirviType").checked
                    + "&addNewGirviAccessFrstMnthInt=" + document.getElementById("addNewGirviAccessFrstMnthInt").checked
                    + "&addNewGirviAccessAcntType=" + document.getElementById("addNewGirviAccessAcntType").checked  //End to pass subfield access values  @AUTHOR: SANDY13AUG13
                    + "&updateGirviAccessPrin=" + document.getElementById("updateGirviAccessPrin").checked
                    + "&updateGirviAccessDt=" + document.getElementById("updateGirviAccessDt").checked
                    + "&updateGirviAccessIntOpt=" + document.getElementById("updateGirviAccessIntOpt").checked
                    + "&updateGirviAccessAddPrin=" + document.getElementById("updateGirviAccessAddPrin").checked
                    + "&updateGirviAccessFirm=" + document.getElementById("updateGirviAccessFirm").checked
                    + "&updateGirviAccessAddItem=" + document.getElementById("updateGirviAccessAddItem").checked
                    + "&updateGirviAccessOtherInfo=" + document.getElementById("updateGirviAccessOtherInfo").checked
                    + "&updateGirviAccessMnthInt=" + document.getElementById("updateGirviAccessMnthInt").checked
                    + "&updateGirviAccessIntTyp=" + document.getElementById("updateGirviAccessIntTyp").checked
                    + "&updateGirviAccessDelGrvDep=" + document.getElementById("updateGirviAccessDelGrvDep").checked
                    + "&updateGirviAccessDepMny=" + document.getElementById("updateGirviAccessDepMny").checked
                    + "&updateGirviAccessSimDepMny=" + document.getElementById("updateGirviAccessSimDepMny").checked
                    + "&updateGirviAccessSimDepMnyInt=" + document.getElementById("updateGirviAccessSimDepMnyInt").checked
                    + "&updateGirviAccessNewLoanDateChange=" + document.getElementById("updateGirviAccessNewLoanDateChange").checked
                    + "&updateGirviAccessDepPrinFullInt=" + document.getElementById("updateGirviAccessDepPrinFullInt").checked
                    + "&updateGirviAccessDepPrinIntWithDisc=" + document.getElementById("updateGirviAccessDepPrinIntWithDisc").checked
                    + "&updateGirviAccessDepPrinIntLeftAdjInPrin=" + document.getElementById("updateGirviAccessDepPrinIntLeftAdjInPrin").checked
                    + "&updateGirviAccessDepPrinIntLeft=" + document.getElementById("updateGirviAccessDepPrinIntLeft").checked
                    + "&releaseGirvi=" + document.getElementById("releaseGirvi").checked
                    + "&releaseGirviDate=" + document.getElementById("releaseGirviDate").checked
                    + "&LoanReleaseWithOTP=" + document.getElementById("LoanReleaseWithOTP").checked //Added @prajwal
                    + "&updateGirviAccessRoi=" + document.getElementById("updateGirviAccessRoi").checked
                    //for loan tally panel ACCESS @AUTHOR: SANDY12SEP13
                    + "&loanPanel=" + document.getElementById("loanPanel").checked
                    + "&loanPanelActiveGirvi=" + document.getElementById("loanPanelActiveGirvi").checked
                    + "&loanPanelLoanList=" + document.getElementById("loanPanelLoanList").checked
                    + "&loanPanelTrGirvi=" + document.getElementById("loanPanelTrGirvi").checked
                    + "&loanTallyPanel=" + document.getElementById("loanTallyPanel").checked
                    + "&unReleaseGirvi=" + document.getElementById("unReleaseGirvi").checked
                    + "&loanPanelRelGirvi=" + document.getElementById("loanPanelRelGirvi").checked
                    + "&loanPanelExGirvi=" + document.getElementById("loanPanelExGirvi").checked
                    + "&loanPanelLossGirvi=" + document.getElementById("loanPanelLossGirvi").checked
                    + "&loanPanelGvSearch=" + document.getElementById("loanPanelGvSearch").checked
                    + "&loanPanelTPExGirvi=" + document.getElementById("loanPanelTPExGirvi").checked
                    + "&loanPanelAunctionList=" + document.getElementById("loanPanelAunctionList").checked //added @Author:SHRI12SEP19
                    + "&finance=" + document.getElementById("finance").checked
                    + "&addFinance=" + document.getElementById("addFinance").checked
                    + "&updateFinance=" + document.getElementById("updateFinance").checked
                    + "&deleteFinance=" + document.getElementById("deleteFinance").checked
                    + "&addNewGirviAccessAutoWtRdOnly=" + document.getElementById("addNewGirviAccessAutoWtRdOnly").checked
                    + "&delTransLoan=" + document.getElementById("delTransLoan").checked //added @Author:PRIYA27FEB15
                    + "&auctionLoan=" + document.getElementById("auctionLoan").checked; //added @Author:SHRI27SEP16

        } else if (empPanelName == 'commonAccess') {

            poststr = "addActionItemAccess=" + document.getElementById('addActionItemAccess').checked
                    + "&updateActionItemAccess=" + document.getElementById("updateActionItemAccess").checked
                    + "&deleteActionItemAccess=" + document.getElementById("deleteActionItemAccess").checked
                    + "&udhaarPanelAccess=" + document.getElementById("udhaarPanelAccess").checked
                    + "&barcodePanelAccess=" + document.getElementById("barcodePanelAccess").checked
                    + "&addCustomerAccess=" + document.getElementById("addCustomerAccess").checked
                    + "&updateCustomerAccess=" + document.getElementById("updateCustomerAccess").checked
                    + "&deleteCustomerAccess=" + document.getElementById("deleteCustomerAccess").checked
                    + "&customerListAccess=" + document.getElementById("customerListAccess").checked
                    + "&customerListDeleteAccess=" + document.getElementById("customerListDeleteAccess").checked
                    + "&addFirmAccess=" + document.getElementById("addFirmAccess").checked
                    + "&updateFirmAccess=" + document.getElementById("updateFirmAccess").checked
                    + "&deleteFirmAccess=" + document.getElementById("deleteFirmAccess").checked
                    + "&addAccountAccess=" + document.getElementById("addAccountAccess").checked
                    + "&updateAccountAccess=" + document.getElementById("updateAccountAccess").checked
                    + "&accountsListAccess=" + document.getElementById("accountsListAccess").checked
                    + "&checkEmpDetAccess=" + document.getElementById("checkEmpDetAccess").checked
                    + "&addEmpAccess=" + document.getElementById("addEmpAccess").checked
                    + "&updateEmpAccess=" + document.getElementById("updateEmpAccess").checked
                    + "&deleteEmpAccess=" + document.getElementById("deleteEmpAccess").checked
                    + "&empListAccess=" + document.getElementById("empListAccess").checked
                    + "&smsAccess=" + document.getElementById("smsAccess").checked
                    + "&deleteBarCodeAccesss=" + document.getElementById("deleteBarCodeAccesss").checked
                    + "&transPanelAccess=" + document.getElementById("transPanelAccess").checked
                    + "&currentTransactionAccess=" + document.getElementById("currentTransactionAccess").checked
                    + "&deleteTransactionAccess=" + document.getElementById("deleteTransactionAccess").checked
                    + "&updateTransactionAccess=" + document.getElementById("updateTransactionAccess").checked
                    + "&dailyDiaryAccess=" + document.getElementById("dailyDiaryAccess").checked
                    + "&journalBookAccess=" + document.getElementById("journalBookAccess").checked
                    + "&stockRegisterAccess=" + document.getElementById("stockRegisterAccess").checked
                    + "&trialBalAccess=" + document.getElementById("trialBalAccess").checked
                    + "&profitNLossAccess=" + document.getElementById("profitNLossAccess").checked
                    + "&balSheetAccess=" + document.getElementById("balSheetAccess").checked
                    + "&leadListAccess=" + document.getElementById("leadListAccess").checked
                    + "&visitorExtendedAccess=" + document.getElementById("visitorExtendedAccess").checked
                    + "&visitorConversionAccess=" + document.getElementById("visitorConversionAccess").checked
                    + "&customerSearchWithFingerScan=" + document.getElementById("customerSearchWithFingerScan").checked
                    + "&loanAccessbyOtp=" + document.getElementById("loanAccessbyOtp").checked
                    + "&databackup=" + document.getElementById("databackup").checked
                    + "&addMetalRateAccess=" + document.getElementById("addMetalRateAccess").checked
                    + "&addItemNameAccess=" + document.getElementById("addItemNameAccess").checked
                    + "&addTunchAccess=" + document.getElementById("addTunchAccess").checked
                    + "&addCityAccess=" + document.getElementById("addCityAccess").checked
                    + "&addStateAccess=" + document.getElementById("addStateAccess").checked
                    + "&addCountryAccess=" + document.getElementById("addCountryAccess").checked
                    + "&addROIAccess=" + document.getElementById("addROIAccess").checked
                    + "&addFormsAccess=" + document.getElementById("addFormsAccess").checked
                    + "&addRepairAccess=" + document.getElementById("addRepairAccess").checked
                    + "&addLayoutAccess=" + document.getElementById("addLayoutAccess").checked//to pass layout panel access val @AUTHOR: SANDY16JAN14
//                    + "&advanceMoneyAccess=" + document.getElementById("advanceMoneyAccess").checked
                    + "&custCircleAccess=" + document.getElementById("custCircleAccess").checked
                    + "&empId=" + encodeURIComponent(empId)
                    + "&empPanelName=" + encodeURIComponent(empPanelName)
                    + "&singleSmsAccess=" + document.getElementById("singleSmsAccess").checked
                    // Start Udhaar Added in common Access File @Author: GAUR23JAN16
                    + "&addUdhaarAccess=" + document.getElementById("addUdhaarAccess").checked
                    + "&updateUdhaarAccess=" + document.getElementById("updateUdhaarAccess").checked
//                    + "&updateDateUdhaarAccess=" + document.getElementById("updateDateUdhaarAccess").checked
                    + "&deleteUdhaarAccess=" + document.getElementById("deleteUdhaarAccess").checked
                    + "&addAdvanceMoneyAccess=" + document.getElementById("addAdvanceMoneyAccess").checked
                    + "&updAdvanceMoneyAccess=" + document.getElementById("updAdvanceMoneyAccess").checked
                    + "&delAdvanceMoneyAccess=" + document.getElementById("delAdvanceMoneyAccess").checked
                    + "&purchaseinvoiceAccess=" + document.getElementById("purchaseinvoiceAccess").checked
                    + "&updateInvoiceAccess=" + document.getElementById("updateInvoiceAccess").checked
                    + "&deleteInvoiceAccess=" + document.getElementById("deleteInvoiceAccess").checked
                    + "&CurrenetmonthAccess=" + document.getElementById("CurrenetmonthAccess").checked
                    + "&reminderAccess=" + document.getElementById("reminderAccess").checked
                    + "&transactionAccess=" + document.getElementById('transactionAccess').checked
                    + "&viewBankDetails=" + document.getElementById('viewBankDetails').checked
                    + "&udhaarDepositAccess=" + document.getElementById('udhaarDepositAccess').checked
                    + "&transactionAccessWithReport=" + document.getElementById('transactionAccessWithReport').checked;
//                    + "&addUdhaarAccessUdhTyp=" + document.getElementById("addUdhaarAccessUdhTyp").checked
//                    + "&updateUdhaarAccessAmnt=" + document.getElementById("updateUdhaarAccessAmnt").checked
//                    + "&updateUdhaarAccessDepMny=" + document.getElementById("updateUdhaarAccessDepMny").checked;
            // End Udhaar Added in common Access File @Author: GAUR23JAN16

        } else if (empPanelName == 'panelAccess') {
            // START CODE TO CHECK IF QUICK ACCESS IS AVAILABLE OR NOT
            if (typeof (document.getElementById("quickSellPanelAccess")) != 'undefined' && document.getElementById("quickSellPanelAccess") != null) {
                var quickSellPanelAccessTypundefined = document.getElementById("quickSellPanelAccess");
            } else {
                var quickSellPanelAccessTypundefined = '';
            }
            // START CODE TO CHECK IF QUICK ACCESS IS AVAILABLE OR NOT

            poststr = "headerHomePageAccess=" + document.getElementById('headerHomePageAccess').checked
                    + "&homePageTopFiveDetailsAccess=" + document.getElementById("homePageTopFiveDetailsAccess").checked
                    + "&headerHallmarkingPanelAccess=" + document.getElementById("headerHallmarkingPanelAccess").checked
                    + "&headerAddStockAccess=" + document.getElementById("headerAddStockAccess").checked
                    + "&headerStockPanelAccess=" + document.getElementById("headerStockPanelAccess").checked
                    + "&headerSellPurchaseAccess=" + document.getElementById("headerSellPurchaseAccess").checked
                    + "&quickSellPanelAccess=" + quickSellPanelAccessTypundefined.checked // SARVESH UPDATE CODE FOR JEWELLERY SOFTWARE 
                    + "&headerAddNewSchemeAccess=" + document.getElementById("headerAddNewSchemeAccess").checked
                    + "&headerAddNewOrderAccess=" + document.getElementById("headerAddNewOrderAccess").checked
                    + "&headerCustomerListAccess=" + document.getElementById("headerCustomerListAccess").checked
                    + "&headerAddCustomerAccess=" + document.getElementById("headerAddCustomerAccess").checked
                    + "&headerSearchCustomerAccess=" + document.getElementById("headerSearchCustomerAccess").checked
                    + "&headerMorePanelAccess=" + document.getElementById("headerMorePanelAccess").checked
                    + "&headerAnalysisPanelAccess=" + document.getElementById("headerAnalysisPanelAccess").checked
                    + "&headerGirviCalculatorAccess=" + document.getElementById("headerGirviCalculatorAccess").checked
                    + "&headerRemainderPanelAccess=" + document.getElementById("headerRemainderPanelAccess").checked
                    + "&sidebarFirmPanelAccess=" + document.getElementById("sidebarFirmPanelAccess").checked
                    + "&sidebarControlPanelAccess=" + document.getElementById("sidebarControlPanelAccess").checked
                    + "&sidebarAccountsPanelAccess=" + document.getElementById("sidebarAccountsPanelAccess").checked
                    + "&sidebarSysLogPanelAccess=" + document.getElementById("sidebarSysLogPanelAccess").checked
                    + "&sidebarGstPanelAccess=" + document.getElementById("sidebarSysLogPanelAccess").checked
                    + "&custHomePageAccess=" + document.getElementById("custHomePageAccess").checked
                    + "&paymentPanelCGSTAccess=" + document.getElementById("paymentPanelCGSTAccess").checked
                    + "&paymentPanelSGSTAccess=" + document.getElementById("paymentPanelSGSTAccess").checked
                    + "&paymentPanelIGSTAccess=" + document.getElementById("paymentPanelIGSTAccess").checked
                    + "&paymentPanelOthTaxAccess=" + document.getElementById("paymentPanelOthTaxAccess").checked
                    + "&paymentPanelMkgChgTaxAccess=" + document.getElementById("paymentPanelMkgChgTaxAccess").checked
                    + "&paymentPanelTaxByValAccess=" + document.getElementById("paymentPanelTaxByValAccess").checked
                    + "&paymentPanelTaxOnTotAmtAccess=" + document.getElementById("paymentPanelTaxOnTotAmtAccess").checked
                    + "&paymentPanelAccountsAccess=" + document.getElementById("paymentPanelAccountsAccess").checked
                    + "&paymentPanelFinalAmtDiscountAccess=" + document.getElementById("paymentPanelFinalAmtDiscountAccess").checked
                    + "&paymentPanelRedeemAccess=" + document.getElementById("paymentPanelRedeemAccess").checked
                    + "&paymentPanelCourierChargeAccess=" + document.getElementById("paymentPanelCourierChargeAccess").checked
                    + "&paymentPanelAdditionalChgAccess=" + document.getElementById("paymentPanelAdditionalChgAccess").checked
                    + "&paymentPanelMetalAmtDiscountAccess=" + document.getElementById("paymentPanelMetalAmtDiscountAccess").checked
                    + "&sellPanelfinejwellerrylistAccess=" + document.getElementById("sellPanelfinejwellerrylistAccess").checked
                    + "&sellPanelimitationinvoicelistAccess=" + document.getElementById("sellPanelimitationinvoicelistAccess").checked
                    + "&sellPanelcrystalinvoicelistAccess=" + document.getElementById("sellPanelcrystalinvoicelistAccess").checked
                    + "&sellPanelrawmetalinvoicelistAccess=" + document.getElementById("sellPanelrawmetalinvoicelistAccess").checked
                    + "&sellPanelapprovalinvoicelistAccess=" + document.getElementById("sellPanelapprovalinvoicelistAccess").checked
                    + "&sellPanelotherinvoicelistAccess=" + document.getElementById("sellPanelotherinvoicelistAccess").checked
                    + "&reportPanelfinejwelleryAccess=" + document.getElementById("reportPanelfinejwelleryAccess").checked
                    + "&reportPanelfinejwelleryAccessjwellery=" + document.getElementById("reportPanelfinejwelleryAccessjwellery").checked
                    + "&reportPanelfinejwelleryAccesswholsale=" + document.getElementById("reportPanelfinejwelleryAccesswholsale").checked
                    + "&reportPanelfinejwelleryAccessPurchase=" + document.getElementById("reportPanelfinejwelleryAccessPurchase").checked
                    + "&reportPanelfinejwelleryAccessRetail=" + document.getElementById("reportPanelfinejwelleryAccessRetail").checked
                    + "&reportPanelimitationjwellery=" + document.getElementById("reportPanelimitationjwellery").checked
                    + "&reportPanestonestock=" + document.getElementById("reportPanestonestock").checked
                    + "&reportPanelRawmetalstock=" + document.getElementById("reportPanelRawmetalstock").checked
                    + "&reportPanelRawmetalstockStockList=" + document.getElementById("reportPanelRawmetalstockStockList").checked
                    + "&reportPanelRawmetalstockPurchaseList=" + document.getElementById("reportPanelRawmetalstockPurchaseList").checked
                    + "&reportPanelRawmetalstockSellList=" + document.getElementById("reportPanelRawmetalstockSellList").checked
                    + "&reportPanelRawmetalstockAllTransaction=" + document.getElementById("reportPanelRawmetalstockAllTransaction").checked
                    + "&reportPanelRawmetalstockMeltingList=" + document.getElementById("reportPanelRawmetalstockMeltingList").checked
                    + "&reportPanelRawmetalstockMelting=" + document.getElementById("reportPanelRawmetalstockMelting").checked

                    + "&reportPanelRawmetalstockSelectItem=" + document.getElementById("reportPanelRawmetalstockSelectItem").checked
                    + "&reportPanelRawmetalstockAssignList=" + document.getElementById("reportPanelRawmetalstockAssignList").checked
                    + "&reportPanelRawmetalstockMeltedList=" + document.getElementById("reportPanelRawmetalstockMeltedList").checked
                    + "&reportPanelRawmetalstockMovedStockList=" + document.getElementById("reportPanelRawmetalstockMovedStockList").checked

                    + "&reportPanelReorderlist=" + document.getElementById("reportPanelReorderlist").checked
                    + "&reportPanelcatloglist=" + document.getElementById("reportPanelcatloglist").checked
                    + "&reportPanelotherpanel=" + document.getElementById("reportPanelotherpanel").checked
                    + "&stockTransferAccess=" + document.getElementById("stockTransferAccess").checked
                    + "&stockSetupAccess=" + document.getElementById("stockSetupAccess").checked
                    + "&stockTallyAccess=" + document.getElementById("stockTallyAccess").checked
                    + "&stockTallyAccessWithImges=" + document.getElementById("stockTallyAccessWithImges").checked
                    + "&stockTallyAccessWithTables=" + document.getElementById("stockTallyAccessWithTables").checked
                    + "&stockTallyAccessWithRfid=" + document.getElementById("stockTallyAccessWithRfid").checked
                    + "&stockTallyAccessWithMultiBarcode=" + document.getElementById("stockTallyAccessWithMultiBarcode").checked
                    + "&reportPanelfinejwelleryAccessGoldsilver=" + document.getElementById("reportPanelfinejwelleryAccessGoldsilver").checked
                    + "&reportPanelfinejwelleryAccessGold=" + document.getElementById("reportPanelfinejwelleryAccessGold").checked
                    + "&reportPanelfinejwelleryAccessSilver=" + document.getElementById("reportPanelfinejwelleryAccessSilver").checked
                    + "&empId=" + encodeURIComponent(empId)
                    + "&empPanelName=" + encodeURIComponent(empPanelName)
                    + "&updateTransactionForAllPanel=" + document.getElementById("updateTransactionForAllPanel").checked
                    + "&deleteTransactionForAllPanel=" + document.getElementById("deleteTransactionForAllPanel").checked
                    + "&backDateTransactionForAllpanel=" + document.getElementById("backDateTransactionForAllpanel").checked
                    + "&firmAccessfordailydiary=" + document.getElementById("firmAccessfordailydiary").checked
                    + "&cityAccessfordailydiary=" + document.getElementById("cityAccessfordailydiary").checked
                    + "&cashAccessfordailydiary=" + document.getElementById("cashAccessfordailydiary").checked
                    + "&bankAccessfordailydiary=" + document.getElementById("bankAccessfordailydiary").checked
                    + "&cardAccessfordailydiary=" + document.getElementById("cardAccessfordailydiary").checked
                    + "&cardAccessfordailydiary=" + document.getElementById("cardAccessfordailydiary").checked
                    + "&onlineAccessfordailydiary=" + document.getElementById("onlineAccessfordailydiary").checked // YUVRAJ MAKE THIS CODE FOR STAFF ACCESS SOLVE ERROR @ YUVRAJ 30122022
                    + "&smsTemplateAccess=" + document.getElementById("smsTemplateAccess").checked
                    + "&stockTransferPanelStockTransferAccess=" + document.getElementById("stockTransferPanelStockTransferAccess").checked
                    + "&stockTransferPanelStockTransferAccessTag=" + document.getElementById("stockTransferPanelStockTransferAccessTag").checked
                    + "&stockTransferPanelStockTransferAccessBarcode=" + document.getElementById("stockTransferPanelStockTransferAccessBarcode").checked
                    + "&stockTransferPanelStockTransferAccessHO=" + document.getElementById("stockTransferPanelStockTransferAccessHO").checked
                    + "&stockTransferPanelStockTransferAccessManager=" + document.getElementById("stockTransferPanelStockTransferAccessManager").checked
                    + "&stockTransferPanelStockTransferAccessBilling=" + document.getElementById("stockTransferPanelStockTransferAccessBilling").checked
                    + "&stockTransferPanelStockTransferAccessSell=" + document.getElementById("stockTransferPanelStockTransferAccessSell").checked;

        }
//        alert(poststr);
        add_emp_access('include/php/omeamndv.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("empAccessButton").style.visibility = "visible";
        return false;
    }
}
/**********END code for Visitor pannel @Author:ASHWINI***********/
/***************End code to add payment panel fields access @AUTHOR:SHRI23JAN20*******************/
/***************End code to add data backup access @Author:SANT09NOV16*******************/
/***************End code to add Imitation for add update and delete access @Author:ANUJA11MAR15*******************/
/***************End code to add circle access @Author:PRIYA03DEC14*******************/
/***************End code to add loan list access @Author:PRIYA05OCT14**************/
/***************End code to add panels @Author:PRIYA01MAR14*********************************/
/**********End of changes to pass access subfields @AUTHOR: SANDY09JAN14 *******/
/***************End Code To Add poststr For Staff Access Panel @AUTHOR:PRIYA05JUNE13************/
/**********End of changes to pass access subfields @AUTHOR: SANDY16AUG13 *******/

/***************Start Code To Change Forms Layout @AUTHOR:PRIYA24JUNE13************/
function change_forms_layout(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertChangeFormsLayout;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertChangeFormsLayout() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("layoutPanelDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/***************Start Code To check radio Buttons @AUTHOR:PRIYA27JUNE13************/
/***************Start Code To Add item Quatn field @Author:PRIYA29JUL13***********************/
/***************Start Code To Add Sell Invoice field @Author:PRIYA03AUG13************/
/***************Start code to Add last day Interst Field @Author:PRIYA06SEP13********/
/**************Start code to add raw metal invoice field and theme @AUTHOR: SANDY9OCT13*************/
function changeFormsLayout() {

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("formLayoutButton").style.visibility = "hidden";

    confirm_box = confirm("Are You Sure To Change Layout!");

    var form7Value;
    var form8Value;
    var girviNoticeValue;
    var udhaarNoticeValue;
    var custNumberValue;
    var itemQuotValue;
    var sellInvoiceValue;
    var lastDayIntValue;
    var rawMetInvValue;
    var themeValue;
    var comPortVal = document.getElementById('enterComPort').value;

    var form7 = document.getElementsByName('form7Lay');
    for (var i = 0; i < form7.length; i++) {
        if (form7[i].checked == true)
            form7Value = form7[i].value;
    }

    var form8 = document.getElementsByName('form8Lay');
    for (var j = 0; j < form8.length; j++) {
        if (form8[j].checked == true)
            form8Value = form8[j].value;
    }

    var girviNotice = document.getElementsByName('girviNoticeLay');
    for (var k = 0; k < girviNotice.length; k++) {
        if (girviNotice[k].checked == true)
            girviNoticeValue = girviNotice[k].value;
    }

    var udhaarNotice = document.getElementsByName('udhaarNoticeLay');
    for (var l = 0; l < udhaarNotice.length; l++) {
        if (udhaarNotice[l].checked == true)
            udhaarNoticeValue = udhaarNotice[l].value;
    }
    var custNumber = document.getElementsByName('girviNoLay');
    for (var m = 0; m < custNumber.length; m++) {
        if (custNumber[m].checked == true)
            custNumberValue = custNumber[m].value;
    }
    var itemQuot = document.getElementsByName('itemQuotLay');
    for (var n = 0; n < itemQuot.length; n++) {
        if (itemQuot[n].checked == true)
            itemQuotValue = itemQuot[n].value;
    }
    var sellInvoice = document.getElementsByName('sellInvoiceLay');
    for (var p = 0; p < sellInvoice.length; p++) {
        if (sellInvoice[p].checked == true)
            sellInvoiceValue = sellInvoice[p].value;
    }
    var lastDayInt = document.getElementsByName('lastDayInt');
    for (var q = 0; q < lastDayInt.length; q++) {
        if (lastDayInt[q].checked == true)
            lastDayIntValue = lastDayInt[q].value;
    }
    var rawMetInv = document.getElementsByName('rawMetInvLay');
    for (var q = 0; q < rawMetInv.length; q++) {
        if (rawMetInv[q].checked == true)
            rawMetInvValue = rawMetInv[q].value;
    }
    var selectedTheme = document.getElementsByName('selectTheme');
    for (var q = 0; q < selectedTheme.length; q++) {
        if (selectedTheme[q].checked == true)
            themeValue = selectedTheme[q].value;
    }

    if (confirm_box == true)
    {
        poststr = "form7Lay=" + encodeURIComponent(form7Value)
                + "&form8Lay=" + encodeURIComponent(form8Value)
                + "&girviNoticeLay=" + encodeURIComponent(girviNoticeValue)
                + "&udhaarNoticeLay=" + encodeURIComponent(udhaarNoticeValue)
                + "&girviNoLay=" + encodeURIComponent(custNumberValue)
                + "&itemQuotLay=" + encodeURIComponent(itemQuotValue)
                + "&sellInvoiceLay=" + encodeURIComponent(sellInvoiceValue)
                + "&lastDayIntSel=" + encodeURIComponent(lastDayIntValue)
                + "&rawMetInvLay=" + encodeURIComponent(rawMetInvValue)
                + "&selectedTheme=" + encodeURIComponent(themeValue)
                + "&comPortVal=" + encodeURIComponent(comPortVal);
        change_forms_layout('include/php/ompplpad.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("formLayoutButton").style.visibility = "visible";
    }
}
/**************End code to add raw metal invoice field and theme @AUTHOR: SANDY9OCT13*************/
/***************End code to Add last day Interst Field @Author:PRIYA06SEP13********/
/***************End Code To Add Sell Invoice field @Author:PRIYA03AUG13************/
/***************End Code To Add item Quatn field @Author:PRIYA29JUL13************/
/***************End Code To check radio Buttons @AUTHOR:PRIYA27JUNE13************/
/***************End Code To Change Forms Layout @AUTHOR:PRIYA24JUNE13************/
/***************Start Code To Get Cust Sms Log Panel @Author:PRIYA09JUL13*********/
/***************Start code to add panel @Author:PRIYA14JUN14**********************/
/***************Start code to add panel @Author:PRIYA24NOV14**********************/
function getCustSmsLog(panel, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'advMoney')
        xmlhttp.open("GET", "include/php/omadmndv.php?custId=" + custId, true);
    else if (panel == 'custCircle')
        xmlhttp.open("GET", "include/php/omcucrdv.php?custId=" + custId, true);
    else
        xmlhttp.open("GET", "include/php/omccsmlg.php?custId=" + custId, true);
    xmlhttp.send();
}
/***************End code to add panel @Author:PRIYA24NOV14**********************/
/***************End Code To Get Cust Sms Log Panel @Author:PRIYA09JUL13*********/
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD FUNCTION FOR GOOGLE SUGGETION DROPDOWN LIST FOR METAL RATE ID @AUTHOR:MADHUREE-03MAY2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
function searchmetalRateId(metalType, metalRateId, KeyCode) {
    keyCodeForItemNames = KeyCode;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("metalIdSelectDiv").innerHTML = xmlhttp.responseText;
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
                document.getElementById('metRateIdSelect').focus();
                document.getElementById('metRateIdSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ommetidlist.php?metalType=" + metalType + "&metalRateId=" + metalRateId, true);
    xmlhttp.send();
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD FUNCTION FOR GOOGLE SUGGETION DROPDOWN LIST FOR METAL RATE ID @AUTHOR:MADHUREE-03MAY2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
