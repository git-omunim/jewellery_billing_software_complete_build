/*******START CODE TO Pass Action Item Id @AUTHOR:PRIYA18JAN13***********/
/*******START CODE TO Add Del File name @AUTHOR:PRIYA19JAN13***********/
/*******START CODE TO Change Delete File name @AUTHOR:PRIYA23MAR13***********/
/*******Start code to add delay function @Author:PRIYA11JUL14**********************/
function deleteActionItem(actionItemID, listPanel) {
    if (panel == 'deletedList') {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to permanently delete this Action Item?");
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Action Item?");
    }
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("acitListDiv").innerHTML = xmlhttp.responseText;
                if (panel == 'deletedList')
                    closeMessDiv('messDisplayDiv', 'PERMANENTLY DELETED');
                else
                    closeMessDiv('messDisplayDiv', 'DELETED');
            } else {

                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omaiatdl.php?actionItemID=" + actionItemID + "&listPanel=" + listPanel, true);
        xmlhttp.send();
    }
}
/*******End code to add delay function @Author:PRIYA11JUL14**********************/
/**********End Code To Add Delay Func @Author:PRIYA24JUL13**********/
/*******END CODE TO Change Delete File name @AUTHOR:PRIYA23MAR13***********/
/*******END CODE TO Add Del File name @AUTHOR:PRIYA19JAN13***********/
/*******START CODE TO Delete 65L Slip @AUTHOR:PRIYA15FEB13***********/
function deleteItemBarCode65L(barCodeSlipDiv, closeDivId, barCodePrintId) {
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
        xmlhttp.open("POST", "include/php/ogibppdl.php?barCodePrintId=" + barCodePrintId, true);
        xmlhttp.send();
    }
    function closeBarCodeSlipCloseButt()
    {
        document.getElementById(closeDivId).innerHTML = "";
    }
}
/*******START CODE TO Delete 65L Slip @AUTHOR:PRIYA15FEB13***********/
/*******START CODE TO Delete 84L Slip @AUTHOR:PRIYA15FEB13***********/
function deleteItemBarCode84L(barCodeSlipDiv, closeDivId, barCodePrintId) {
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
        xmlhttp.open("POST", "include/php/ogibppdl.php?barCodePrintId=" + barCodePrintId, true);
        xmlhttp.send();
    }
    function closeBarCodeSlipCloseButt()
    {
        document.getElementById(closeDivId).innerHTML = "";
    }
}
/*******END CODE TO Delete 84L Slip @AUTHOR:PRIYA15FEB13***********/
/*******START CODE TO Del Item From Stock Invoice List  @AUTHOR:PRIYA19MAR13***********/
/*******START CODE TO Add Alert For Supp Udhaar Details @AUTHOR:PRIYA10MAR13***********/
function deleteStockInvoice(newPreInvoiceNo, newInvoiceNo, panelName) {
    confirm_box = confirm("Supplier Udhaar Details And All Items Of This Invoice Will Also Delete!\nDo You Like To Continue?");

    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            } else {

                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogialdel.php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&panelName=" + panelName, true);
        xmlhttp.send();
    }
}
/*******END CODE TO Add Alert For Supp Udhaar Details @AUTHOR:PRIYA10MAR13***********/
/*******End Code TO Del Item From Stock Invoice List @AUTHOR:PRIYA19MAR13***********/
/*******START CODE TO Del Item From Stock List  @AUTHOR:PRIYA19MAR13***********/
/*******Start to add code to delete item from item detail panel @AUTHOR: SANDY7NOV13************/
/*******Start code to change div of stock @Author:PRIYA30JAN14***************/
/*******Start code to add panel @Author:PRIYA08AUG14********************/
function deleteStockListItem(itstId, itprId, panelName, mainPanel, pageNo, sellPresent) {
    if (sellPresent > 0) {
        alert('To Delete,First Delete This Item From Customer Purchase Panel!');
        return false;
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");//add variables of alert msgs @AUTHOR: SANDY29JAN14
        if (confirm_box == true)
        {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    if (panelName == 'ItemDetailPanel') {
                        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                        window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                    }
                    else if (panelName == 'StockList') {
                        document.getElementById("stockList").innerHTML = xmlhttp.responseText;
                        window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                    } else if (panelName == 'PurchaseList') {
                        document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else if (mainPanel == 'StockInvoice') {
                        document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else if (pageNo == 'SuppPanel' || pageNo == 'addByItems') {
                        document.getElementById("suppPurchaseDivs").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else {
                        document.getElementById("paymentDiv").innerHTML = xmlhttp.responseText;
                        window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                    }
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            //xmlhttp.open("GET", "include/php/ogialdel.php?itstId=" + itstId + "&itprId=" + itprId + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&pageNo=" + pageNo, true);
            xmlhttp.open("GET", "include/php/ogialdel.php?itstId=" + itstId + "&itprId=" + itprId + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&stockPanel=ImitationStock" + "&pageNo=" + pageNo, true);//Add Panel Imitation @Author:ANUJA17FEB15
            xmlhttp.send();
        }
    }
}
function stockGlobalFunctionToCloseDiv() {
    document.getElementById('messDisplayDiv').innerHTML = '';
}
/*******End code to add panel @Author:PRIYA08AUG14********************/
/*******End code to change div of stock @Author:PRIYA30JAN14***************/
/*******End to add code to delete item from item detail panel @AUTHOR: SANDY7NOV13************/
/*******End Code TO Del Item From Stock List @AUTHOR:PRIYA19MAR13***********/
/*******START CODE TO Del Sell Purchase Invoice List Item @AUTHOR:PRIYA19MAR13***********/
/*******START CODE TO Change Div @AUTHOR:@AUTHOR:PRIYA22MAR13***********/
/*******START CODE TO Change Alert Message In Hindi @AUTHOR:@AUTHOR:PRIYA13MAY13***********/
/*******Start Code To Change Div @Author:PRIYA12AUG13***********************************/
function deleteSellPurchaseInvoice(newPreInvoiceNo, newInvoiceNo, custId, panelName, navigationPanel) {
    confirm_box = confirm(delInvoiceAlert + " \n\nDo you really want to delete this Invoice?");//add variables of alert msgs @AUTHOR: SANDY29JAN14
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
            } else {

                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogspidel.php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&custId=" + custId + "&panelName=" + panelName + "&navigationPanel=" + navigationPanel, true);
        xmlhttp.send();
    }
}
/*******End Code To Change Div @Author:PRIYA12AUG13***********************************/
/*******END CODE TO Change Alert Message In Hindi @AUTHOR:@AUTHOR:PRIYA13MAY13***********/
/*******END CODE TO Change Div @AUTHOR:@AUTHOR:PRIYA22MAR13***********/
/*******End Code TO Del Sell Purchase Invoice List Item @AUTHOR:PRIYA19MAR13***********/

/*******START CODE TO Del Sell Purchase sold Out List Item @AUTHOR:PRIYA19MAR13***********/
/*******START CODE TO Change Div @AUTHOR:@AUTHOR:PRIYA22MAR13***********/

/**********sTART TO CHANGE IN CODE TO DELETE RAW METAL @AUTHOR: SANDY26OCT13*************************/
function deleteSellPurchaseListItem(newItemPreId, newItemPostId, custId, rowId, panelName) {
    var firstChar = newItemPreId.charAt(0);
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");//add variables of alert msgs @AUTHOR: SANDY29JAN14
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        if (firstChar == 'P') {
            xmlhttp.open("GET", "include/php/ogspidel.php?newItemPreId=" + newItemPreId + "&newItemPostId=" + newItemPostId + "&custId=" + custId + "&rowId=" + rowId + "&panelName=" + panelName, true);
        } else if (firstChar == 'R') {
            xmlhttp.open("GET", "include/php/ogrpdelt.php?newItemPreId=" + newItemPreId + "&newItemPostId=" + newItemPostId + "&custId=" + custId + "&rowId= " + rowId + "&panelName=" + panelName, true);
        }
        xmlhttp.send();
    }
}
/**********End TO CHANGE IN CODE TO DELETE RAW METAL @AUTHOR: SANDY26OCT13*************************/
/*******End CODE TO Change Div @AUTHOR:@AUTHOR:PRIYA22MAR13***********/
/*******START CODE TO Del Sell Purchase sold Out List Item @AUTHOR:PRIYA19MAR13***********/
/*******Start Code To Delete Supp Deposit Amount @AUTHOR:PRIYA10MAY13*********/
/*******Start code to hide div @Author:PRIYA20JUN14*********************/
function delete_supp_udhar_dep_amt(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertDeleteSuppUdharDepAmt;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}

function alertDeleteSuppUdharDepAmt() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("suppUdhaarDiv").innerHTML = xmlhttp.responseText;
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    } else {
        //  document.getElementById("suppUdharDepAmtDelButt" + globalSuppDepUdhaarDiv).innerHTML = "<img src='images/loading16.gif' />";
    }

}
/*******End code to hide div @Author:PRIYA20JUN14*********************/
/*********Start code to add jrnl Id @Author:PRIYA27APR14************/
/*********Start code to change div @Author:PRIYA21JUN14***************/
function deleteSuppUdhaarDepAmt(utransId, suppUdhaarDepDiv, newPreInvoiceNo, newInvoiceNo, jrnlId, payId, goldRate, silverRate, goldFnWtTyp, silverFnWtTyp, goldFnWt, silverFnWt, checkGd, suppId) {
//    alert(suppId);
//    return;
    globalSuppDepUdhaarDiv = suppUdhaarDepDiv;

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";

    confirm_box = confirm("Do you really want to delete this udhaar amount?");

    if (confirm_box == true)
    {
        var poststr = "utransId=" + utransId +
                "&newPreInvoiceNo=" + newPreInvoiceNo +
                "&newInvoiceNo=" + newInvoiceNo +
                "&jrnlId=" + jrnlId +
                "&payId=" + payId +
                "&goldRate=" + goldRate +
                "&silverRate=" + silverRate +
                "&goldFnWtTyp=" + goldFnWtTyp +
                "&silverFnWtTyp=" + silverFnWtTyp +
                "&goldFnWt=" + goldFnWt +
                "&silverFnWt=" + silverFnWt +
                "&checkGd=" + checkGd +
                "&suppId=" + suppId;

        delete_supp_udhar_dep_amt('include/php/ogwudpdl.php', poststr);
    }
    else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    }
}
/*********End code to change div @Author:PRIYA21JUN14***************/
/*********End code to add jrnl Id @Author:PRIYA27APR14************/
/*******Start Code To Delete New Order Invoice @AUTHOR:PRIYA13MAY13*********/
function deleteNwOrInvoice(newPreInvoiceNo, newInvoiceNo, panelName) {
    confirm_box = confirm(delInvoiceAlert + "\n\nDo you really want to delete this Invoice?");//add variables of alert msgs @AUTHOR: SANDY29JAN14

    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("newOrderStatus").innerHTML = xmlhttp.responseText;
            } else {

                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ognoidel.php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&panelName=" + panelName, true);
        xmlhttp.send();
    }
}
/*******End Code To Delete New Order Invoice @AUTHOR:PRIYA13MAY13*********/
/*******START CODE TO Del Item From New Order Invoice List  @AUTHOR:PRIYA13MAY13***********/
/***********Start code to add custId @Author:PRIYA19SEP13**********************/
/***********Start code to add delay function @Author:PRIYA20SEP13**********************/
/***********Start code to change div @Author:PRIYA30JAN14**********************/
function deleteNewOrderItem(nworId, custId, panelName, pageNum, itemPanel, count) {
//    alert(document.getElementById("invoiceRow" + count).value);
    if (parseFloat(document.getElementById("invoiceRow" + count).value) > 0) {
        alert('You can not delete this Item');
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");//add variables of alert msgs @AUTHOR: SANDY29JAN14
        if (confirm_box == true)
        {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    if (itemPanel == 'NwOrPayUp') {
                        document.getElementById("newOrderDiv").innerHTML = xmlhttp.responseText;
                        window.setTimeout(nwOrGlobalFunctionToCloseDiv, 1000);
                    } else if (panelName == 'NwOrPayment' && itemPanel == 'NwOrPayment') {
                        document.getElementById("paymentDiv").innerHTML = xmlhttp.responseText;
                        window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                    } else if (panelName == '' && itemPanel == 'NwOrPayment') {
                        document.getElementById("nwOrInvoice").innerHTML = xmlhttp.responseText;
                        window.setTimeout(nwOrGlobalFunctionToCloseDiv, 1000);
                    } else if (itemPanel == 'nwOrItemList') {
                        document.getElementById("newOrderStatus").innerHTML = xmlhttp.responseText;
                        window.setTimeout(nwOrGlobalFunctionToCloseDiv, 1000);
                    } else {
                        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                        window.setTimeout(nwOrGlobalFunctionToCloseDiv, 1000);
                    }

                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            xmlhttp.open("GET", "include/php/ognoidel.php?nworId=" + nworId + "&custId=" + custId + "&panelName=" + panelName + "&pageNum=" + pageNum + "&itemPanel=" + itemPanel, true);
            xmlhttp.send();

        }
    }
}
function nwOrGlobalFunctionToCloseDiv() {
    document.getElementById('nwOrMessDisplay').innerHTML = '';
}
/***********End code to change div @Author:PRIYA30JAN14**********************/
/***********End code to add delay function @Author:PRIYA20SEP13**********************/
/*******END CODE TO Del Item From New Order Invoice List  @AUTHOR:PRIYA13MAY13***********/
/********Start Code To Delete Transferred Girvi @AUTHOR:PRIYA22MAY13*********/
/********Start Code To Display Delete Message @AUTHOR:PRIYA23MAY13*********/
/****************Start Code To Add Function refreshTransGirvi() Author:PRIYA29JUN13*********/
var gGirviId;
function delete_trans_girvi_details(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertDeleteTransGirviDetails;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}
/*****Start to change function to navigate to girvi info after delete from transfer panel @AUTHOR: SANDY29NOV13***/
function alertDeleteTransGirviDetails() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (xmlhttp.responseText == 'Sucessfully Deleted') {
            searchGirviByGirviId(gGirviId);//call function to get details of girvi @AUTHOR: SANDY29NOV13
            /*refreshTransGirvi(gGirviId,'');
             document.getElementById("display_girvi_transfer_div").innerHTML = "";
             window.setTimeout(closeTransGirviDetailsDiv, 1000); COMMENT @AUTHOR: SANDY29NOV13*/
        } else {
            document.getElementById("transGirviDelMessDiv").innerHTML = 'Not Deleted';
            window.setTimeout(closeTransGirviDetailsDiv, 1000);
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("transGirviDeleteButDiv").style.visibility = "hidden";

    }
    function closeTransGirviDetailsDiv()
    {
        document.getElementById("transGirviDelMessDiv").innerHTML = "";
    }
}
/*****End to change function to navigate to girvi info after delete from transfer panel @AUTHOR: SANDY29NOV13***/
/************Start code to add panel name @Author:PRIYA09DEC14***********************/
function deleteTransGirviDetails(girviTransId, girviId, panelName) {
    document.getElementById("transGirviDeleteButDiv").style.visibility = "hidden";
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";

    gGirviId = girviId;
    confirm_box = confirm("Do you really want to Delete This Transferred Girvi?");
    if (confirm_box == true)
    {
        var poststr = "girviTransId=" + girviTransId
                + "&girviId=" + girviId
                + "&panelName=" + panelName;
        delete_trans_girvi_details('include/php/olggtrgl.php', poststr);//change in filename @AUTHOR: SANDY20NOV13
    }
    else {
        document.getElementById("transGirviDeleteButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
/************End code to add panel name @Author:PRIYA09DEC14***********************/
/****************End Code To Add Function refreshTransGirvi() Author:PRIYA29JUN13*********/
/********End Code To Display Delete Message @AUTHOR:PRIYA23MAY13*********/
/********End Code To Delete Transferred Girvi @AUTHOR:PRIYA22MAY13*********/
/***************Start Code To Delete Item Add Div In Supp New Order Panel @AUTHOR:PRIYA24MAR13************/
function deleteSuppNwOrItemDetailsDiv(nwOrId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("suppHomeNwOrItemDetailsDiv" + nwOrId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("suppHomeNwOrItemDetailsDiv" + nwOrId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };

    xmlhttp.open("POST", "include/php/ombbblnk.php", true);
    xmlhttp.send();
}
/****************End Code To Delete Item Add Div In Supp New Order Panel @AUTHOR:PRIYA24MAR13************/
/*********************Start Code To Close Supp Add Stock Div @AUTHOR:PRIYA28MAY13************************/
/*********************Start Code To change Div Name @AUTHOR:PRIYA30MAY13********************************/
function closeSuppAddStockDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("suppAddStockDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("suppAddStockDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };

    xmlhttp.open("POST", "include/php/ombbblnk.php", true);
    xmlhttp.send();
}
/*********************End Code To change Div Name @AUTHOR:PRIYA30MAY13********************************/
/*********************End Code To Close Supp Add Stock Div @AUTHOR:PRIYA28MAY13************************/
/*******Start Code To Delete Supplier Stock Item  @AUTHOR:PRIYA28MAY13****************/
/*******Start Code To Change Div Name @AUTHOR:PRIYA11OCT13***********************/
/*******Start code to add panel @Author:PRIYA18SEP14**********************/
/*******Start code to add panel @Author:SANT01AUG16**********************/
/*******Start code to add panel @Author:SANT03SEP16**********************/
function deleteSuppInvItem(sporId, newPreInvoiceNo, newInvoiceNo, suppId, itemPanel, panelName, payId) {

    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");//add variables of alert msgs @AUTHOR: SANDY29JAN14

    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'SuppAddOrder' || panelName == 'SuppOrderUp') {
                    document.getElementById("suppAddOrderDiv").innerHTML = xmlhttp.responseText;
                    closeMessDiv('messDisplayDiv', 'ITEM DELETED');
                } else {
                    document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
                    closeMessDiv('messDisplayDiv', 'ITEM DELETED');
                }
                window.setTimeout(globalFunctionToCloseDiv, 1000);
            } else {

                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwhidel.php?sporId=" + sporId + "&newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&suppId=" + suppId
                + "&itemPanel=" + itemPanel + "&panelName=" + panelName + "&payId=" + payId, true);
        xmlhttp.send();
    }
}
/*******End code to add panel @Author:SANT03SEP16**********************/
/*******End code to add panel @Author:SANT01AUG16**********************/
function globalFunctionToCloseDiv() {
    document.getElementById("messDisplayDiv").innerHTML = "";
}
/*******End code to add panel @Author:PRIYA18SEP14**********************/
/*******End Code To Change Div Name @AUTHOR:PRIYA11OCT13***********************/
/*******End Code To Delete Supplier Stock Item  @AUTHOR:PRIYA28MAY13****************/
/*******Start Code To Delete Supplier Invoice @AUTHOR:PRIYA28MAY13****************/
/*******Start Code To Add Supp ID @AUTHOR:PRIYA29MAY13****************/
function deleteSuppInvoice(newPreInvoiceNo, newInvoiceNo, suppId, panelName) {
    confirm_box = confirm(delInvoiceAlert + "\n\nDo you really want to delete this Invoice?");//add variables of alert msgs @AUTHOR: SANDY29JAN14

    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
            } else {

                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwhidel.php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&suppId=" + suppId + "&panelName=" + panelName, true);
        xmlhttp.send();
    }
}
/*******End Code To Add Supp ID @AUTHOR:PRIYA29MAY13****************/
/***************Start Code To Delete Supp Update Stock Div @AUTHOR:PRIYA29MAY13************/
/***************Start code to change function name @Author:PRIYA27OCT13**********/
function closeSuppOrderAddDiv(sporId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'suppPendingOrderUp')
                document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
            else
                document.getElementById("suppStockUpdateDiv" + sporId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("suppStockUpdateDiv" + sporId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };

    xmlhttp.open("POST", "include/php/ombbblnk.php", true);
    xmlhttp.send();
}
/***************End code to change function name @Author:PRIYA27OCT13**********/
/***************End Code To Delete Supp Update Stock Div @AUTHOR:PRIYA29MAY13************/
/***************Start Code To Delete All Bar Code Slips @AUTHOR:PRIYA31MAY13************/
/***************Start Code To Change Div @Author:PRIYA29AUG13************/
/***************Start of change in function to replace div name in 84l after delete @AUTHOR: SANDY25OCT13************/
/***************Start of change in function @AUTHOR: SANDY09JAN14************/
/***************Start code to add delay function @Author:PRIYA05FEB14************/
function deleteAllBarCodeSlips(panelName) {
    var panelNameval = panelName;
    var barCodeSlipsDel = document.getElementById('deleteAllBarCodeSlips').checked;

    if (barCodeSlipsDel == true) {
        if (panelNameval == 'stickerPrintPanel') {
            confirm_box = confirm("You are deleting All Stickers!\n Do you really want to continue!");
        } else {
            confirm_box = confirm("You are deleting All Bar Code Slips!\n Do you really want to continue!");
        }
    }
    if (confirm_box == true) {
        xmlhttp.onreadystatechange = function () {
            if (panelNameval == 'Items65LBarCodePanel') {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("barCode65LDiv").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("barCode65LDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
                }
            }
            else if (panelNameval == 'Items84LBarCodePanel') {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("barCode84L").innerHTML = xmlhttp.responseText; //change in div name @AUTHOR: SANDY23OCT13
                } else {
                    document.getElementById("barCode84L").innerHTML = "<img src='images/ajaxLoad.gif' />";//change in div name @AUTHOR: SANDY23OCT13
                }
            } else if (panelNameval == 'Items55x13BarCodePanel') {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("barcode55x13").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("barcode55x13").innerHTML = "<img src='images/ajaxLoad.gif' />";
                }
            } else if (panelNameval == 'GirviBarCodePanel' || panelNameval == 'stickerPrintPanel') {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("girviBarCodeDiv").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("girviBarCodeDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
                }
            } else if (panelNameval == 'Items20x12BarCodePanel') {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("barCode20x12Div").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("barCode20x12Div").innerHTML = "<img src='images/ajaxLoad.gif' />";
                }
            }
            document.getElementById("bcMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>DELETED</span>";
            window.setTimeout(closeBCMessDiv, 1500);
        };
        xmlhttp.open("POST", "include/php/omibcdel.php?panelName=" + panelNameval, true);
        xmlhttp.send();
        document.getElementById('deleteAllBarCodeSlips').checked = false;
    } else
    {
        document.getElementById('deleteAllBarCodeSlips').checked = false;
    }
}
/***************End code to add delay function @Author:PRIYA05FEB14************/
/***************End of change in function @AUTHOR: SANDY09JAN14************/
/***************End of change in function to replace div name in 84l after delete @AUTHOR: SANDY25OCT13************/
/***************End Code To Change Div @Author:PRIYA29AUG13************/
/***************End Code To Delete All Bar Code Slips @AUTHOR:PRIYA31MAY13************/

/*******Start Code To Delete SMS @Author:PRIYA09JUL13*********/
/*******Start Code To Add Panel Name @Author:PRIYA10JUL13***********************/
/*******Start Code To Add Panel Name @Author:PRIYA12JUL13***********************/
function deleteSms(smsId, panelName, pageNo, mainPanelName) {
    confirm_box = confirm("Do you really want to delete this sms?");

    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (mainPanelName == 'smsLogList') {
                    document.getElementById("smsLogDiv").innerHTML = xmlhttp.responseText;
                } else if (mainPanelName == 'smsRejectList') {
                    document.getElementById("smsRejectListDiv").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("custSmsLogDiv").innerHTML = xmlhttp.responseText;
                }
                window.setTimeout(closeSmsDelMessDiv, 1000);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omcsmsdl.php?smsId=" + smsId + "&panelName=" + panelName + "&pageNo=" + pageNo + "&mainPanelName=" + mainPanelName, true);
        xmlhttp.send();
    }
    function closeSmsDelMessDiv() {
        document.getElementById("smsDelMessDisplayDiv").innerHTML = "";
    }
}
/*******End Code To Add Panel Name @Author:PRIYA12JUL13***********************/
/*******End Code To Delete SMS @Author:PRIYA09JUL13*********/
/*******End Code To Add Panel Name @Author:PRIYA10JUL13***********************/
/*******Start Code To Delete All SMS @Author:PRIYA09JUL13*********/
/*******Start Code To Add Panel Name @Author:PRIYA10JUL13***********************/
/*******Start Code To Add Panel Name @Author:PRIYA12JUL13***********************/
function deleteAllSms(panelName, mainPanelName, custId) {
    var smsDel = document.getElementById('deleteAllSms').checked;

    if (smsDel == true) {
        confirm_box = confirm("You are deleting All sms!\n Do you really want to continue!");
    }
    if (confirm_box == true) {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (mainPanelName == 'smsLogList') {
                    document.getElementById("smsLogDiv").innerHTML = xmlhttp.responseText;
                } else if (mainPanelName == 'smsRejectList') {
                    document.getElementById("smsRejectListDiv").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("custSmsLogDiv").innerHTML = xmlhttp.responseText;
                }
                window.setTimeout(closeSmsDelMessDiv, 1000);
            } else {
                document.getElementById("smsLogDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        };
        if (mainPanelName == 'smsLogList' || mainPanelName == 'smsRejectList') {
            xmlhttp.open("POST", "include/php/omcsmsdl.php?panelName=" + panelName + "&mainPanelName=" + mainPanelName, true);
        } else {
            xmlhttp.open("POST", "include/php/omcsmsdl.php?panelName=" + panelName + "&mainPanelName=" + mainPanelName + "&custId=" + custId, true);
        }
        xmlhttp.send();
    }
    else
    {
        document.getElementById('deleteAllSms').checked = false;
    }
    function closeSmsDelMessDiv() {
        document.getElementById("smsDelMessDisplayDiv").innerHTML = "";
    }
}
/*******End Code To Add Panel Name @Author:PRIYA12JUL13***********************/
/*******End Code To Delete All SMS @Author:PRIYA09JUL13*********/
/*******End Code To Add Panel Name @Author:PRIYA10JUL13***********************/
/*************************/
/*******Start Code To delete Firm Image @Author:PRIYA12AUG13***********************/
function deleteFirmImage(firmId, panelName) {
    confirm_box = confirm("Do you really want to delete this Image?");

    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById(panelName + "Div").innerHTML = xmlhttp.responseText;

            } else {
                document.getElementById(panelName + "Div").innerHTML = "";
            }
        };
        xmlhttp.open("GET", "include/php/omffdlfr.php?firmId=" + firmId + "&panelName=" + panelName, true);
        xmlhttp.send();
    }
}
/*******End Code To delete Firm Image @Author:PRIYA12AUG13***********************/
//
function AddAllUsersStickers(panelName) {
    var panelNameval = panelName;
    var AddAllUsersStickers = document.getElementById('AddAllUsersStickers').checked;

    if (AddAllUsersStickers == true) {
        confirm_box = confirm("\n Add All Stickers!");
    }
    if (confirm_box == true) {
        xmlhttp.onreadystatechange = function () {
            if (panelNameval == 'stickerPrintPanel') {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("girviBarCodeDiv").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("girviBarCodeDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
                }
            } 
            document.getElementById("bcMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>ADDED</span>";
            window.setTimeout(closeBCMessDiv, 1500);
        };
        xmlhttp.open("POST", "include/php/omAddAllStickers.php?panelName=" + panelNameval, true);
        xmlhttp.send();
        document.getElementById('AddAllUsersStickers').checked = false;
    } 
    else {
        document.getElementById('AddAllUsersStickers').checked = false;
    }
}
//
function getUserStickerField(option, value) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barCodePrintPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omUpdateStickerOptionValue.php?option=" + option + "&value=" + value, true);
    xmlhttp.send();
}

function deleteSmsfromlog(panelName,smsId) {
    confirm_box = confirm("Do you really want to delete this sms?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("smsSubDiv").innerHTML = xmlhttp.responseText;
//                window.setTimeout(closeSmsDelMessDiv, 1000);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omcsmsdl.php?smsId=" + smsId + "&panelName=" + panelName + "&pageNo=&mainPanelName=smsLogList", true);
        xmlhttp.send();
    }    
}
//
function searchSmsLogWithGirvi (GirviSerialNum) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("smsSubDiv").innerHTML = xmlhttp.responseText;
            } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omcsmslg.php?GirviSerialNum=" + GirviSerialNum, true);
        xmlhttp.send();
}