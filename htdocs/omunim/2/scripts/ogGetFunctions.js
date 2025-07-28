/*********START CODE TO ADD Supp Invoice PAYMENT DIV @AUTHOR:PRIYA19JAN13************/
/*********START CODE TO Change Supp Invoice PAYMENT DIV @AUTHOR:PRIYA21JAN13************/
/*********Start Code To Add FirmId,AccId @AUTHOR:PRIYA30MAY13******************/
/*********Start code to change filename @Author:PRIYA26NOV13******************/
function getSuppNwOrPaymentDiv(documentRootPath, suppId, suppPreInvNo, suppInvNo, goldTotalWeight, goldTotalWeightType,
        silverTotalWeight, silverTotalWeightType, suppNwOrAddDate, firmId, accId, totalItemsQTY, totalVal, totalTaxChrgs, totalMetalVal, totalCryVal, totalFinalBalance, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
            // document.getElementById("addnwOdStockItemPayFirm1").focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            document.getElementById("addSuppNwOdStockPaymentButtDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogcmiddv.php?suppId=" + suppId + "&preInvNo=" + suppPreInvNo + "&postInvNo=" + suppInvNo + "&goldTotalWeight=" + goldTotalWeight +
            "&goldTotalWeightType=" + goldTotalWeightType + "&silverTotalWeight=" + silverTotalWeight + "&silverTotalWeightType=" + silverTotalWeightType + "&suppNwOrAddDate=" + suppNwOrAddDate +
            "&firmId=" + firmId + "&accId=" + accId + "&totalItemsQTY=" + totalItemsQTY + "&totalVal=" + totalVal + "&totalTaxChrgs=" + totalTaxChrgs + "&totalMetalVal=" + totalMetalVal + "&totalCryVal=" + totalCryVal + "&totalFinalBalance=" + totalFinalBalance + "&paymentPanelName=" + panelName, true);
    xmlhttp.send();
}
/*********End code to change filename @Author:PRIYA26NOV13******************/
/*********End Code To Add FirmId,AccId @AUTHOR:PRIYA30MAY13******************/
/*********END CODE TO ADD Supp Invoice PAYMENT DIV @AUTHOR:PRIYA21JAN13************/
/*********END CODE TO Change Supp Invoice PAYMENT DIV @AUTHOR:PRIYA20JAN13************/
///*********Start  code to open stocklist @Author:NEETU7JULY2014******************/
function stocklistopen(documentRootPath, jewelleryListSearch, page) { 
    loadXMLDoc();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockListSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogismnlt.php?jewelleryListSearch=" + jewelleryListSearch + "&page=" + page, true);
    xmlhttp.send();
}/*********End code to open stock list @Author:NEETU7JULY2014******************/
///*********Start  code to open item descrpition @Author:NEETU7JULY2014******************/
function itemDetailsOpen(documentRootPath, itemName, metaltype, page) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockListSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogisavlt.php?itemName=" + itemName + "&metalType=" + metaltype + "&mainPage=" + page, true);
    xmlhttp.send();
}
//  /*********End  code to open item descrpition @Author:NETU7JULY2014******************/ 
function sortJewelleryList(documentRootPath, sortKeyword, selFirmId, rowsPerPage, gTransList) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockListSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogismnlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId +
            "&rowsPerPage=" + rowsPerPage + "&gTransList=" + gTransList, true);
    xmlhttp.send();
}
function searchJewelleryPanel(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage, gTransList) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockListSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/ogismnlt.php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&gTransList=" + gTransList, true);
    xmlhttp.send();
}
///*********Start  code to get back from Stock Panel While Stock Tag stocklist @Author:SHE05NOV15******************/
function backFromSoldStock(documentRootPath) { 
    loadXMLDoc();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockListSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogismnlt.php", true);
    xmlhttp.send();
}/*********End code  get back from Stock Panel While Stock Tag  @Author:SHE05NOV15****************/