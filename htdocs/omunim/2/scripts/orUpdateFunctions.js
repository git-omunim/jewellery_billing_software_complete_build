/**************Start code to item sold out list @Author:DEEP08JUL14*******************/
/**************Start code to add panel @Author:PRIYA06APR15*******************/
/**************Start code to upadte customizedImtInvoice @Author:GAUR19SEP16*******************/
/**************Start code to upadte soldOutImtInv @Author:GAUR18OCT16*******************/
/**************Start code to upadte soldOutImtInv @Author:GAUR19OCT16*******************/
//************Start code to purchase invoice Customise @Author:SANT17DEC16**********/-->
function getMainSellPurchasePanel(panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'soldOutList' || panel == 'returnedList' || panel == 'etimateItemList')
        xmlhttp.open("GET", "include/php/ogcrspst"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'soldOutInv' || panel == 'soldOutEstimateInv')
        xmlhttp.open("GET", "include/php/ogspsblt"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'soldOutImtInv') //AUTH:AMOL 5 JUNE 2017
        xmlhttp.open("GET", "include/php/ogspsblt"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'soldOutImtList')
        xmlhttp.open("GET", "include/php/ogcrspst"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'soldOutStrInv') //AUTH:DIKSHA 17 NOV 2018
        xmlhttp.open("GET", "include/php/ogspsblt"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'soldOutStrList')
        xmlhttp.open("GET", "include/php/ogcrspst"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'customizedInvoice' || panel == 'customizedRoughInvoice' || panel == 'customizedApprovalInvoice' ||
            panel == 'customizedRoughEstimateInvoice' || panel == 'customizedRawMetalInvoice' || panel == 'customizedRawMetalSellInvoice' ||
            panel == 'customizedPaymentInvoice' || panel == 'customizedReceiveInvoice' || panel == 'customizedSupplierInvoice' ||
            panel == 'customizedGoldInvoice' || panel == 'customizedSilverInvoice' || panel == 'customizedEstiInvInvoice' ||
            panel == 'customizedReadyOrderInv' || panel == 'customizedAssignedOrderInv' || panel == 'customizedPendingOrderInv' ||
            panel == 'customizedPurchaseReturnInv')
        xmlhttp.open("GET", "include/php/omcuform"+ default_theme +".php?panel=" + panel, true);      // // ADDED CONDITION FOR SUPPLIER CUSTOMIZED INVOICE DIKSHA20MARCH2019
    else if (panel == 'customizedPurInvoice')
        xmlhttp.open("GET", "include/php/omcpform.php?panel=" + panel, true);
    else if (panel == 'customizedSellInvoice')
        xmlhttp.open("GET", "include/php/omcsform.php?panel=" + panel, true);
    else if (panel == 'customizedImtInvoice')
        xmlhttp.open("GET", "include/php/omimtcufm.php?panel=" + panel, true);
    else if (panel == 'customizedStrInvoice')
        xmlhttp.open("GET", "include/php/omstrcufm.php?panel=" + panel, true);
    else if (panel == 'customizedCryInvoice')
        xmlhttp.open("GET", "include/php/ogcrcufm.php?panel=" + panel, true);
     else if (panel == 'customizedSellReturnInvoice')                                                          // ADDED SELL RETURN CUSTOMISATION @DNYANESHWARI:27NOV2023
            xmlhttp.open("GET", "include/php/omSellReturnInvcufm.php?panel=" + panel, true);
    else if (panel == 'customizedSchmeInv')                                                          // ADDED SCHEME EMI INVOICE CUSTOMISATION @SIMRAN:30MAR2023
            xmlhttp.open("GET", "include/php/omSchemecufm.php?panel=" + panel, true);
    else if (panel == 'customizedSchmeInvoice')                                                          // ADDED SCHEME INVOICE CUSTOMISATION @SIMRAN:26APR2023
            xmlhttp.open("GET", "include/php/omSchemeInvcufm.php?panel=" + panel, true);
    else if(panel == 'customizedUdhaarMonDepInv')                                                       //ADDED UDHAAR MONEY DEPOSIT INVOICE CUSTOMISATION @SIMRAN:15SEPT2023
        xmlhttp.open("GET", "include/php/omUdhaarMonDepInvcufm.php?panel=" + panel, true);
    else if(panel == 'customizedAdvanceMonInv')                                                       //ADDED UDHAAR MONEY DEPOSIT INVOICE CUSTOMISATION @SIMRAN:15SEPT2023
        xmlhttp.open("GET", "include/php/omadvancemoninvcufm.php?panel=" + panel, true);
    else if (panel == 'CrystalSoldOutList')
        xmlhttp.open("GET", "include/php/ogcrspst"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'soldOutPurList' || panel == 'oldMetalPurList' || panel == 'oldMetalPurRecList')
        xmlhttp.open("GET", "include/php/ogcrspst"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'soldOutSellList')
        xmlhttp.open("GET", "include/php/ogcrspst"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'itemApproval' || panel == 'itemApprovalRec')
        xmlhttp.open("GET", "include/php/ogcrspst"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'soldOutPendingImtList')
        xmlhttp.open("GET", "include/php/ogsppsldt"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'soldOutDeletedList')
        xmlhttp.open("GET", "include/php/ogcrspst"+ default_theme +".php?panel=" + panel, true);
    /* START CODE TO ADD ELSE-IF CONDITION FOR RETURNED ITEM LIST OPTION @AUTHOR:MADHUREE-02APRIL2020 */
    else if (panel == 'ReturenedItemList')
        xmlhttp.open("GET", "include/php/ogreturnitemlist"+ default_theme +".php?panel=" + panel, true);
    /* END CODE TO ADD ELSE-IF CONDITION FOR RETURNED ITEM LIST OPTION @AUTHOR:MADHUREE-02APRIL2020 */
    /* START CODE TO ADD ELSE-IF CONDITION FOR RETURNED ITEM LIST OPTION @AUTHOR:SWAPNIL-18MAY2020 */
    else if (panel == 'AllItemList')
        xmlhttp.open("GET", "include/php/ogallitemlist"+ default_theme +".php?panel=" + panel, true);
    /* END CODE TO ADD ELSE-IF CONDITION FOR RETURNED ITEM LIST OPTION @AUTHOR:SWAPNIL-18MAY2020 */
    /* START CODE TO ADD ELSE-IF CONDITION FOR RETURNED ITEM LIST OPTION @AUTHOR:MADHUREE-02APRIL2020 */
    else if (panel == 'purchaseInv' || panel == 'purchaseList' || panel == 'ImtPurchaseInv' || panel == 'CrystalPurchaseInv')
        xmlhttp.open("GET", "include/php/ogsppurinv"+ default_theme +".php?panel=" + panel, true);
    /* END CODE TO ADD ELSE-IF CONDITION FOR RETURNED ITEM LIST OPTION @AUTHOR:MADHUREE-02APRIL2020 */
    /* START CODE TO ADD ELSE-IF CONDITION FOR PURCHASE RETURNED INV AND ITEM LIST OPTION @AUTHOR:PRIYANKA-02FEB2022 */
    else if (panel == 'purchaseReturnItemList' || panel == 'purchaseReturnInvList')
        xmlhttp.open("GET", "include/php/omPurReturnItemList"+ default_theme +".php?panel=" + panel, true);
    /* END CODE TO ADD ELSE-IF CONDITION FOR PURCHASE RETURNED INV AND ITEM LIST OPTION @AUTHOR:PRIYANKA-02FEB2022 */
    else if (panel == 'customizedSchemePassbook')
        xmlhttp.open("GET", "include/php/omschemebook.php?panel=" + panel, true);
    else if (panel == 'customizedQuotation')
        xmlhttp.open("GET", "include/php/omcuquot"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'paymantPendingInv')
        xmlhttp.open("GET", "include/php/ogcrspst"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'sellDeletedList')
        xmlhttp.open("GET", "include/php/omselldelitemlist"+ default_theme +".php?panel=" + panel, true);
    else if(panel=='estQuotationList')
        xmlhttp.open("GET", "include/php/ogesqtlt"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'combineInvList')
        xmlhttp.open("GET", "include/php/ogspsblt"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'soldOutImtInvList')
        xmlhttp.open("GET", "include/php/omstkinvsellst"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'exportSellDetails')
        xmlhttp.open("GET", "include/php/omexpselprodetil"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'exportSellPayementDetils')
        xmlhttp.open("GET", "include/php/omexposellpaydetal"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'exportPurItmLst')
        xmlhttp.open("GET", "include/php/omexppuritmlst"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'exportPurPayDetil')
        xmlhttp.open("GET", "include/php/omexpurpaylst"+ default_theme +".php?panel=" + panel, true);
    else if(panel == 'pendingImtList')
        xmlhttp.open("GET", "include/php/ompendinginvlist"+ default_theme +".php?panel=" + panel, true);
     else if(panel == 'customizedMeltingInv')
         xmlhttp.open("GET", "include/php/ommeltinginvcufm"+ default_theme +".php?panel=" + panel, true);
    else if(panel == 'customizedQuotationInv')
         xmlhttp.open("GET", "include/php/omquotationcuform"+ default_theme +".php?panel=" + panel, true);
    else if(panel == 'paytmAllInvReport')
         xmlhttp.open("GET", "include/php/ompaytmAllInvlist"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'estPurchaseQuotationList')
         xmlhttp.open("GET", "include/php/ogespqtlt"+ default_theme +".php?panel=" + panel, true);
    else if (panel == 'printAllSellInvoice')
         xmlhttp.open("GET", "include/php/omprntallsellinv"+ default_theme +".php?panel=" + panel, true);
    //     Added for Imitation file call
     else if (panel == 'paymantImitationPendingInv')
        xmlhttp.open("GET", "include/php/ogimitationpenlist"+ default_theme +".php?panel=" + panel, true);
    //     Added for Crystal file call
    else if (panel == 'paymantCrystalPendingInv')
        xmlhttp.open("GET", "include/php/ogcrystalpenlist"+ default_theme +".php?panel=" + panel, true);
    //     Added for Raw file call
    else if (panel == 'paymantRawPendingInv')
        xmlhttp.open("GET", "include/php/ograwpenlist"+ default_theme +".php?panel=" + panel, true);
        else if (panel == 'customizedCertificate')
         xmlhttp.open("GET", "include/php/omcertcuform"+ default_theme +".php?panel=" + panel, true); 
    else
        xmlhttp.open("GET", "include/php/ogspsblt"+ default_theme +".php", true);
    xmlhttp.send();
}
//************End code to purchase invoice Customise @Author:SANT17DEC16**********/-->
//************start code to purchase invoice Customise @Author:DIKSHA5SEPT2018**********/-->
function getSellPurchasePanel(panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogbbsrbs.php?panel=" + panel, true);
    xmlhttp.send();
}
//************End code to purchase invoice Customise @Author:DIKSHA5SEPT2018**********/-->
//
/**************End code to upadte soldOutImtInv @Author:GAUR19OCT16*******************/
/**************End code to upadte customizedImtInvoice @Author:GAUR19SEP16*******************/
/**************End code to add panel @Author:PRIYA06APR15*******************/
/*****************Start code to chnage param name @Author:PRIYA05OCT14**************/
/*****************Start code to add soldoutPanel @Author:GAUR19OCT16**************/
function numberOfRowsEPanel(documentRootPath, rowsPerPage, selFirmId, sortKeyword, pageNum, panel, searchColumn, searchValue, updateRows, soldoutPanel)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "hidden";
            //document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "visible";
            document.barcode_search.barcode_text.focus();
            document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
        } else {
            //document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
            //document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
        }
    };
    if (soldoutPanel == 'soldOutImtList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspisldt.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&page=" + pageNum + "&panel=" + panel + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + 'updateImtRows', true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsldt.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&page=" + pageNum + "&panel=" + panel + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + 'updateRows', true);
    }
    xmlhttp.send();
}
/*****************END code to add soldoutPanel @Author:GAUR19OCT16**************/
//**************End code to item sold out list @Author:DEEP08JUL14*******************/
//**************Start code to item sold out list @Author:DEEP12JUL14*******************/
/***************Start code to add div @Author:PRIYA11OCT14**************************/
/***************Start code to change id @Author:PRIYA13JAN15***********************/
/***************Start code to add condition for repair list items @Author:SHRI10JAN15**************************/
/***************Start code to add condition for crystalpurchaselist @Author:PRIYA24FEB15*****************/
/***************Start code to add condition for RAw Item @Author:SHE13JAN16*****************/
/*********Start to add condition for wholesale and retail list @Author:SHRI05APR16******************/
/*********Start to add condition for raw stock and detail list @Author:SHE06APR16******************/
/*********Start to UPDATE @Author:GAUR19OCT16******************/
function showSelectPage(pageNo, panel, rowsPerPage, noOfPagesAsLink, selFirmId, sortKeyword, searchColumn, searchValue, div, panelName) {
    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.barcode_search.barcode_text.focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";

                document.getElementById(div).innerHTML = xmlhttp.responseText;
                if (pageNo >= 10) {

                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };

        alert('panel == ' + panel);
        //alert('pageNo == ' + pageNo);
        //alert('rowsPerPage == ' + rowsPerPage);
        //alert('noOfPagesAsLink == ' + noOfPagesAsLink);

        if (panel == 'soldOutList' || panel == 'returnedList') {
            xmlhttp.open("POST", "include/php/ogspsldt.php?page=" + pageNo + "&empLoginId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'soldOutImtList') {
            xmlhttp.open("POST", "include/php/ogspisldt.php?page=" + pageNo + "&empLoginId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true); //add panel Imitation @Author: GAUR19OCT16
        } else if (panel == 'StockList') {
            xmlhttp.open("POST", "include/php/ogilsbdv.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true); //add panel Imitation @Author:ANUJA17Feb15
        } else if (panel == 'ImitationStockList') {
            xmlhttp.open("POST", "include/php/ogijsbdv.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel + "&stockPanel=ImitationStock", true); //add panel Imitation @Author:ANUJA17Feb15
        } else if (panel == 'PurchaseList') {
            xmlhttp.open("POST", "include/php/ogwaprlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true); // filename changed @Author:SHRI05APR16
        } else if (panel == 'CrystalPurchaseList') {
            xmlhttp.open("POST", "include/php/ogcrprlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'ItemSoldInvoice') {
            xmlhttp.open("POST", "include/php/ogspsblt"+ default_theme +".php?page=" + pageNo + "&empLoginId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'soldOutImtInv') {
            xmlhttp.open("POST", "include/php/ogsipsblt.php?page=" + pageNo + "&empLoginId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);  //add panel Imitation @Author: GAUR19OCT16
        } else if (panel == 'StockPanel') {
            xmlhttp.open("POST", "include/php/ogismnlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'ItemRepairList') {
            xmlhttp.open("POST", "include/php/ogrpilst.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'RawMetalList') {
            xmlhttp.open("POST", "include/php/ogrmcslt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'WholeSalePurchaseList') {
            xmlhttp.open("POST", "include/php/ogwtprlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'RetailPurchaseList') {
            xmlhttp.open("POST", "include/php/ogrtprlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'RawDetailMetalListDet') {
            xmlhttp.open("POST", "include/php/ogrmsdlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'MetalToCashInvoicePurchaseList') {
            xmlhttp.open("POST", "include/php/ogrwspprlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'MetalToCashInvoiceSellList') {
            xmlhttp.open("POST", "include/php/ogrwspsrlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'WholeSaleStockList') {
            xmlhttp.open("POST", "include/php/ogilimlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel + "&panelName=" + panelName, true);
        } else if (panel == 'imitationPurchaseList') {
            panelName = 'stockList';
            displayDivName = 'No';
            xmlhttp.open("POST", "include/php/ogilimlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&divPanel=" + panel + "&panelName=" + panelName + "&displayDivName=" + displayDivName, true);
        } else if (panel == 'imitationPurchaseTagList') {
            panelName = 'stockList';
            displayDivName = 'No';
            xmlhttp.open("POST", "include/php/ogijstlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&divPanel=" + panel + "&panelName=" + panelName + "&displayDivName=" + displayDivName, true);
        }
        xmlhttp.send();
    }
}
/*********End to UPDATE @Author:GAUR19OCT16******************/
/*********End to add condition for raw stock and detail list @Author:SHE06APR16******************/
/*********End to add condition for wholesale and retail list @Author:SHRI05APR16******************/
/***************End code to add condition for RAw Item @Author:SHE13JAN16*****************/
/***************End code to add condition for crystalpurchaselist @Author:PRIYA24FEB15*****************/
/***************End code to add div @Author:PRIYA11OCT14**************************/
/***************End code to change id @Author:PRIYA13JAN15***********************/
/***************End code to add div @Author:PRIYA11OCT14**************************/
//**************End code to item sold out list @Author:DEEP12JUL14*******************/
/***************End code to chnage param name @Author:PRIYA05OCT14**************/


function showSelectPageRawMetalList(pageNo, panel, rowsPerPage, noOfPagesAsLink, selFirmId, sortKeyword, searchColumn, searchValue, div, panelName, userId) {
    if (typeof (document.getElementById('mainPanel')) != 'undefined' && (document.getElementById('mainPanel') != null)) {
        var mainPanel = document.getElementById('mainPanel').value;
    } else {
        var mainPanel = '';
    }
    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.barcode_search.barcode_text.focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";

                document.getElementById(div).innerHTML = xmlhttp.responseText;
                if (pageNo >= 10) {
                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        if (panel == 'MetalToCashPurchaseList') {
            xmlhttp.open("POST", "include/php/ogrwwscsllt.php?page=" + pageNo + "&selFirmId=" + selFirmId
                    + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue
                    + "&searchValue=" + searchValue + "&panel=" + panel + "&userId=" + userId, true);
        } else { // Else added for purchase list@Author:SHRI14NOV19 
            xmlhttp.open("POST", "include/php/ogrwwscprlt.php?page=" + pageNo + "&selFirmId=" + selFirmId
                    + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue
                    + "&searchValue=" + searchValue + "&panel=" + panel + "&userId=" + userId + "&mainPanel=" + mainPanel, true);
        }
        xmlhttp.send();
    }
}
//
function addsoldoutDeletedItemToStock(sttrId, mainPanelName, panelName) {
    var confirmMsg = confirm("Do You really want to add this stock Into Available Stock ?");
    if (confirmMsg == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("soldoutDeletedList").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel.php?panelName=" + panelName + "&sttrId=" + sttrId + "&mainPanelName=" + mainPanelName, true);
        xmlhttp.send();
    }
}
//FOR ADD DELTED STOCK INTO AVIALABLE STOCK AUTHOR@SIMRAN25OCT21
function addDeletedDeleteStockToStock(sttrId, mainPanelName, panelName, operation,indicator,firmId = '') {
    if(indicator == 'AddInvoice')
    {
        alert('You cannot reactive purchase wholesale stock');
        return false;
    }
    var confirmMsg = confirm("Do You really want to add this stock Into Available Stock ?");
    if (confirmMsg == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("userListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omsttrandel.php?panelName=" + panelName + "&sttrId=" + sttrId
                +  "&firmId=" + firmId +  "&mainPanelName=" + mainPanelName + "&operation=" + operation, true);
        xmlhttp.send();
    }
}
// START CODE FOR FUNCTION INSERT ESTIMATE SELL LABEL IF NOT : AUTHOR @DARSHANA 15 JULY 2021
function insertEstimateLabel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omEstiSellInsUpd.php", true);
    xmlhttp.send();
}
// END CODE FOR FUNCTION INSERT ESTIMATE SELL LABEL IF NOT : AUTHOR @DARSHANA 15 JULY 2021
//START CODE TO REDIRECT CUSTOMER PURCHASE QUOTATION LIST PANEL PRATHAMESH 20MAY2024
function showCustPurQtList(custId, firmId) {
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
        xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?custId=" + custId + "&panelDivName=PurchaseQuotationList&firmId="+firmId, true);
    
    xmlhttp.send();
}
//END CODE TO REDIRECT CUSTOMER PURCHASE QUOTATION LIST PANEL PRATHAMESH 20MAY2024