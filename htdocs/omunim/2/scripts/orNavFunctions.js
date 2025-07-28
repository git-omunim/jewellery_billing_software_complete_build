//*********************** Start code to Navigate Udhaar Notice Panel @Author: KHUSH16JAN13 ************
/****************Start code to add panelname @Author:PRIYA27MAR14********************/
function getUdhaarNoticePanel(panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'UdhaarNotice')
        xmlhttp.open("POST", "include/php/omppundv"+ default_theme +".php", true);
    else if (panelName == 'CustomizedNotice')
        xmlhttp.open("POST", "include/php/omppcuno"+ default_theme +".php", true);
    xmlhttp.send();
}
/****************End code to add panelname @Author:PRIYA27MAR14********************/
//*********************** Start code to Navigate Udhaar Notice Panel @Author: KHUSH16JAN13 ************

//Start code to Add New Language in Udhaar Notice Panel @Author: KHUSH16JAN13
/************Start code to add panel @Author: PRIYA24APR14************************/
function getUdhaarNoticeAddNewLangDiv(panelName, formSize) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/omppundv.php?panelName=" + panelName + "&formSize=" + formSize, true);
    xmlhttp.send();
}
/************End code to add panel @Author: PRIYA24APR14************************/
/********* END code to Add New Language in Udhaar Notice Panel @Author: KHUSH16JAN13 ************/
/*********START CODE TO SET DEF LANG & GET UDHAAR NOTICE @AUTHOR: KHUSH16JAN13 ************/
/*********Start code to add panel @Author:PRIYA24APR14**************/
function setDefLangGetUdhaarNot(defLang, defSize, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/omppunsl.php?defLang=" + defLang + "&defSize=" + defSize + "&panel=" + panel, true);
    xmlhttp.send();
}
/*********End code to add panel @Author:PRIYA24APR14**************/
/*********END CODE TO SET DEF LANG & GET UDHAAR NOTICE @AUTHOR: KHUSH16JAN13 ************/
//**************************** Navigate TROI Panel by @Author: KHUSH23JAN13 *******************************************************************
function navigateTROIPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/olgutroi.php", true);//change in filename @AUTHOR: SANDY13DEC13
    xmlhttp.send();

}
/*****************************************************************/
//**************************** START CODE OF Navigate Loan Box Panel by @Author: JAY12FEB25 *******************************************************************
function navigateLoanBoxPanel() {
    loadXMLDoc();  // Ensure that `loadXMLDoc()` is defined (it initializes XMLHttpRequest)
    
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // Hide the loading indicator when content is loaded
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            
            // Insert the content returned from the PHP file into the 'loanBoxManagementDiv' div
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            // Show loading indicator while the request is being processed
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };

    // Create a POST request with 'value' being sent to the server
    xmlhttp.open("POST", "include/php/omloanboxmanagement.php", true);
    xmlhttp.send();
}
//**************************** END CODE OF Navigate Loan Box Panel by @Author: JAY12FEB25 *******************************************************************

//**************************** START CODE OF INSERT Loan Box by @Author: JAY18FEB25 *******************************************************************

function insertLoanBox() {
    var boxName = document.getElementById('boxName').value;
    var maxPieces = document.getElementById('maxPieces').value;
    var boxWeight = document.getElementById('boxWeight').value;

    // Client-side validation to ensure both fields are filled
    if (boxName.trim() === "") {
        alert("Please fill in the Box Name.");
        return;
    }

    if (maxPieces.trim() === "") {
        alert("Please fill in the Max Pieces.");
        return;
    }
    
    if (boxWeight.trim() === "") {
        alert("Please fill in the Box Weight.");
        return;
    }

    // Ensure maxPieces is a valid number and greater than 0
    if (isNaN(maxPieces) || maxPieces <= 0 || !Number.isInteger(Number(maxPieces))) {
        alert("Please enter a valid number for Max Pieces.");
        return;
    }


    loadXMLDoc(); // Assuming this is for showing the loading spinner

    // Initialize a new XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();

    // Handle the server response
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("boxListDiv").innerHTML = xmlhttp.responseText;   
                document.getElementById('boxName').value = '';
                document.getElementById('maxPieces').value = '';
                document.getElementById('boxWeight').value = '';
        }
    };

    // Send the POST request to insertBox.php
    xmlhttp.open("POST", "include/php/omcrudboxoperation.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Send the data (boxName and maxPieces)
    xmlhttp.send("operation=insert&boxName=" + encodeURIComponent(boxName) + "&maxPieces=" + encodeURIComponent(maxPieces) + "&boxWeight=" + encodeURIComponent(boxWeight));
}
//**************************** END CODE OF INSERT Loan Box by @Author: JAY12FEB25 *******************************************************************

//**************************** START CODE OF DELETE Loan Box by @Author: JAY18FEB25 *******************************************************************

function deleteBox(operation='',boxId='') {
    // Confirm deletion with the user
    if (confirm('Are you sure you want to delete this box?')) {
        loadXMLDoc(); // Show the loading spinner

        // Initialize a new XMLHttpRequest object
        var xmlhttp = new XMLHttpRequest();

        // Handle the server response
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                // On success, update the table with the response HTML
                document.getElementById("boxListDiv").innerHTML = xmlhttp.responseText;
              
            }
        };

        // Send the POST request to deleteBox.php
        xmlhttp.open("POST", "include/php/omcrudboxoperation.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Send the boxId to delete the box
        xmlhttp.send("operation=delete&boxId=" + encodeURIComponent(boxId));
    }
}
//**************************** END CODE OF DELETE Loan Box by @Author: JAY18FEB25 *******************************************************************

/*start code for nO. Of Girvi per page @AUTHOR: LINA4JUN2013 */
/*****************************************************************/
/******* code modified for search option @AUTHOR: LINA27JUN2013 ********/
/********Start Code To Add Variable updateRows @Author:PRIYA16JUL13******************/
/*******Start to make changes in function @AUTHOR: SANDY30OCT13***********************/
/*******Start code to add gTransList @Author:PRIYA30MAY14**********************/
/*********Start code to add param @Author:PRIYA23JUN14******************/
/**************Start code to add panel for trans list @Author:PRIYA17SEP14********************/
/**************Start code to add panel @Author:PRIYA156OCT14*************/
/*************Start code to remove cust details panel @OMMODTAG PRIYA_28MAY15****************/
/*************Start code to Add conditions for collection and noncollection list @OMMODTAG ANUJA23APR16****************/
/*************Start code to Add conditions for FIANNACE list @Author: GAUR20JUNE16****************/
function numberOfRows(documentRootPath, rowsPerPage, selFirmId, sortKeyword, pageNum, searchColumn, searchValue, updateRows, totalGirvi, gTransList)
{
    // var noOfRows = rowsPerPage;
    //var totGirvi= totalGirvi;
//    alert(totalGirvi);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "hidden";
            //document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "visible";
            document.barcode_search.barcode_text.focus();
            if (totalGirvi == 'transList')
                document.getElementById("transactionListDiv").innerHTML = xmlhttp.responseText;
            else if (totalGirvi == 'CustomerDetails')
                document.getElementById("customerDetails").innerHTML = xmlhttp.responseText;
            else
                document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            // document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
            // document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
        }
    };
    if (totalGirvi == 'transList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omttlisd.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
                "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows + "&panel=" + gTransList, true);
    } else if (totalGirvi == 'loanList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/orgpllpn.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
                "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows + "&panel=" + gTransList, true);
    } else if (totalGirvi == 'financeloanList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfnllpn.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
                "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows + "&panel=" + gTransList, true);
    } else if (totalGirvi == 'nonCollectList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfnncml.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
                "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows + "&panel=" + gTransList, true);
    } else if (totalGirvi == 'collectList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfncml.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
                "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows + "&panel=" + gTransList, true);
    } else if (totalGirvi == 'CustomerDetails') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omccdtlt.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
                "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows + "&gTransList=" + gTransList, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/orgpglpd.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
                "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows + "&gTransList=" + gTransList, true);
    }
    xmlhttp.send();
}
/*************END code to Add conditions for FIANNACE list @Author: GAUR20JUNE16****************/
/*************End code to remove cust details panel @OMMODTAG PRIYA_28MAY15****************/
/**************End code to add panel @Author:PRIYA156OCT14*************/
/**************Start code to add panel for trans list @Author:PRIYA17SEP14********************/
/*********E code to add param @Author:PRIYA23JUN14******************/
/*******End code to add gTransList @Author:PRIYA30MAY14**********************/
/*******End to make changes in function @AUTHOR: SANDY30OCT13***********************/
/********End Code To Add Variable updateRows @Author:PRIYA16JUL13******************/
/*****************************************************************/
/*start code for nO. Of Girvi per page @AUTHOR: LINA4JUN2013 */
/*****************************************************************/

/*****************************************************************/
/*start code for month & Year  @AUTHOR: LINA4JUN2013 */
/*****************************************************************/

function searchGirvi(documentRootPath, girviDOBMonth, girviDOBYear, selFirmId, rowsPerPage)
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
    // var GirviEntryDate =  mm.value + '-' +yyyy.value;
    xmlhttp.open("POST", documentRootPath + "/include/php/orgpglpd.php? girviDOBMonth=" + girviDOBMonth + "&girviDOBYear=" + girviDOBYear + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage, true);
    xmlhttp.send();
}
/*****************************************************************/
/*end code for nO. Of Girvi  @AUTHOR: LINA4JUN2013 */
/*****************************************************************/

/**********************************************************************************************/
/*start code for nO. Of Girvi per page for Trasferred Girvi Panel @AUTHOR: LINA4JUN2013 */
/**********************************************************************************************/
/* code modified for search option by  @AUTHOR: LINA27JUN2013*/
/********Start Code To Add Variable updateRows @Author:PRIYA16JUL13******************/
/************Start Code To Select Trans Firm Id @Author:PRIYA20JUL13*************/
/*******Start to make changes in function @AUTHOR: SANDY30OCT13***********************/
/*******Start code to add selMlName @Author:PRIYA30MAY14*****************************/
function numberOfRowsofTrasferPanel(documentRootPath, rowsPerPage, selFirmId, sortKeyword, pageNum, searchColumn, searchValue, updateRows, selTFirmId, gTransStatus, selMlName)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "hidden";
            //document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "visible";
            document.barcode_search.barcode_text.focus();
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            // document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
            // document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/orgptrgl.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&page=" + pageNum + "&searchColumn=" + searchColumn +
            "&searchValue=" + searchValue + "&updateRows=" + updateRows + "&selTFirmId=" + selTFirmId + "&gTransStatus=" + gTransStatus + "&selMlName=" + selMlName, true);
    xmlhttp.send();
}
/*******End code to add selMlName @Author:PRIYA30MAY14*****************************/
/*******End to make changes in function @AUTHOR: SANDY30OCT13***********************/
/************End Code To Select Trans Firm Id @Author:PRIYA20JUL13*************/
/********End Code To Add Variable updateRows @Author:PRIYA16JUL13******************/
/****************************************************************************************/
/*end code for nO. Of Girvi per page for Trasferred Girvi Panel @AUTHOR: LINA4JUN2013 */
/****************************************************************************************/

/**********************************************************************************/
/*start code for nO. Of Girvi per page for Expired Panel @AUTHOR: LINA4JUN2013 */
/**********************************************************************************/
/*code modified for search option by @AUTHOR: LINA27JUN2013*/
/********Start Code To Add Variable updateRows @Author:PRIYA16JUL13******************/
/*******Start to make changes in function @AUTHOR: SANDY30OCT13***********************/
function numberOfRowsExiperedPanel(documentRootPath, rowsPerPage, selFirmId, sortKeyword, pageNum, expMonths, searchColumn, searchValue, updateRows, panel)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "hidden";
            //document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "visible";
            document.barcode_search.barcode_text.focus();
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            //document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
            //document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
        }
    };
    if (panel == 'TPExpiredLoanList')
        xmlhttp.open("POST", documentRootPath + "/include/php/orgptpexgl.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&page=" + pageNum + "&expMonths=" + expMonths + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows, true);
    else
        xmlhttp.open("POST", documentRootPath + "/include/php/orgpexgl.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&page=" + pageNum + "&expMonths=" + expMonths + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows, true);
    xmlhttp.send();
}
/*******End to make changes in function @AUTHOR: SANDY30OCT13***********************/
/********End Code To Add Variable updateRows @Author:PRIYA16JUL13******************/
/*******************************************************************************/
/*end code for nO. Of Girvi per page  Expired Panel@AUTHOR: LINA4JUN2013 */
/*******************************************************************************/

/*********************************************************************************/
/*start code for nO. Of Girvi per page for ReleasedPanel @AUTHOR: LINA4JUN2013 */
/*********************************************************************************/
/*code modified for search option by @AUTHOR: LINA27JUN2013*/
/********Start Code To Add Variable updateRows @Author:PRIYA16JUL13******************/
/*******Start to make changes in function @AUTHOR: SANDY30OCT13***********************/
function numberOfRowsofReleasedPanel(documentRootPath, rowsPerPage, selFirmId, sortKeyword, pageNum, searchColumn, searchValue, updateRows)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "hidden";
            //document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "visible";
            document.barcode_search.barcode_text.focus();
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            //document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
            //document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/orgpregl.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows, true);
    xmlhttp.send();
}
/*******End to make changes in function @AUTHOR: SANDY30OCT13***********************/
/********End Code To Add Variable updateRows @Author:PRIYA16JUL13******************/
/************************************************************************************/
/*end code for nO. Of Girvi per page for ReleasedPanel @AUTHOR: LINA4JUN2013 */
/************************************************************************************/

/***************************************************************************************/
/*start code for nO. Of Girvi per page for Loss Girvi Panel @AUTHOR: LINA4JUN2013 */
/***************************************************************************************/
/*code modified for search option by @AUTHOR: LINA27JUN2013*/
/********Start Code To Add Variable updateRows @Author:PRIYA16JUL13******************/
function numberOfRowsLossGirviPanel(documentRootPath, rowsPerPage, selFirmId, sortKeyword, pageNum, searchColumn, searchValue, updateRows)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "visible";
            document.barcode_search.barcode_text.focus();
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/orgplglp.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows, true);
    xmlhttp.send();
}
/********End Code To Add Variable updateRows @Author:PRIYA16JUL13******************/
/***********************************************************************************/
/*end code for nO. Of Girvi per page for Loss Girvi Panel @AUTHOR: LINA4JUN2013 */
/***********************************************************************************/

/*****************************************************************/
/*start code for SMS Pack Panel @AUTHOR: LINA8JUN2013 */
/*****************************************************************/
/**********Start Code To Change Div Name @Author:PRIYA11JUL13*****************/
/************Start Code To comment @Author:PRIYA19FEB14*********/
//function smsPackPanel()
//{
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function() {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("smsSubDiv").innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//
//    xmlhttp.open("POST", "include/php/omcssmpk.php", true);
//    xmlhttp.send();
//}
/************End Code To comment @Author:PRIYA19FEB14*********/
/**********End Code To Change Div Name @Author:PRIYA11JUL13*****************/
/*****************************************************************/
/*start code for SMS Pack Panel @AUTHOR: LINA8JUN2013 */
/*****************************************************************/

function udhaar_ledger_details()
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviLedgerDetailsDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/omcssmpk.php", true);
    xmlhttp.send();
}

/*****************************************************************/
/*start code for SMS Pack Panel @AUTHOR: LINA21JUN2013 */
/*****************************************************************/

/*****************************************************************/
/*start code for serch option in Girvi panel  @AUTHOR: LINA27JUN2013 */
/*****************************************************************/
/*****************Start code to add gTransList @Author:PRIYA31MAY14**************************/
function searchGirviPanel(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage, gTransList) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/orgpglpd.php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&gTransList=" + gTransList, true);
    xmlhttp.send();
}
/*****************End code to add gTransList @Author:PRIYA31MAY14**************************/
/************Start Code To Select Trans Firm Id @Author:PRIYA20JUL13*************/
/************Start code to add ml name @Author:PRIYA12FEB14***************/
/************Start code to add variable @Author: GAUR15JUN16***************/
/************Start code to add function @Author: GAUR07JULY16***************/
function searchTransferGirviPanel(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage, selTFirmId, gTransStatus, selMlName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/orgptrgl.php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&selTFirmId=" + selTFirmId +
            "&gTransStatus=" + gTransStatus + "&selMlName=" + selMlName, true);
    xmlhttp.send();
}
/************Start code to add function @Author: GAUR07JULY16***************/
/************END code to add variable @Author: GAUR15JUN16***************/
/************End code to add ml name @Author:PRIYA12FEB14***************/
/************End Code To Select Trans Firm Id @Author:PRIYA20JUL13*************/
/*************Start code to add panel @Author:PRIYA03NOV14**************************/
function searchExpiredGirviPanel(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage, expMonths, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'TPExpiredLoanList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/orgptpexgl.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&expMonths=" + expMonths, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/orgpexgl.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&expMonths=" + expMonths, true);
    }
    xmlhttp.send();

}
/*************End code to add panel @Author:PRIYA03NOV14**************************/
function searchReleasedGirviPanel(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/orgpregl.php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage, true);
    xmlhttp.send();
}

function searchLossGirviPanel(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage, expMonths) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/orgplglp.php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&expMonths=" + expMonths, true);
    xmlhttp.send();
}

//Start code to change the function Author:GAUR14JUNE16
//Start code to change the function Author:GAUR27JUNE16
//START code to change the remove parametrs Author:SANT16JUL16
function searchLoansListPanel(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage, expMonths, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'financeList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfnllpn.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&expMonths=" + expMonths + "&panelName=" + panelName, true);
    } else if (panelName == 'collectionList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfncml.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&expMonths=" + expMonths + "&panelName=" + panelName, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/omfnncml.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&expMonths=" + expMonths + "&panelName=" + panelName, true);
    }
//    if (panelName == 'nonCollectionList')
//    else {
//        xmlhttp.open("POST", documentRootPath + "/include/php/orgpllpn.php?searchColumn="
//                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&searchPreColumn=" + searchPreColumn + "&searchPreValue=" + searchPreValue + "&expMonths=" + expMonths, true);
//    }
    xmlhttp.send();
}
//END code to change the remove parametrs Author:SANT16JUL16
//END code to change the function Author:GAUR20JUNE16
//END code to change the function Author:GAUR27JUNE16

//Start code to add the function Author:GAUR28JUNE16
function searchActiveLoansListPanel(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage, searchColumnStr, expMonths) {
    var poststr = "searchColumn=" + encodeURIComponent(searchColumn) +
            "&searchValue=" + encodeURIComponent(searchValue) +
            "&selFirmId=" + encodeURIComponent(selFirmId) +
            "&rowsPerPage=" + encodeURIComponent(rowsPerPage) +
            "&searchColumnStr=" + encodeURIComponent(searchColumnStr) +
            "&expMonths=" + encodeURIComponent(expMonths);
//    alert(poststr);
    search_loan_list("include/php/orgpllpn.php", poststr);

}

function search_loan_list(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertSearchActiveLoansListPanel;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}

function alertSearchActiveLoansListPanel() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//End code to add the function Author:GAUR28JUNE16



function validateNumber() {
    if ((document.getElementById("prinAmt").value != '') && ((validateNum(document.getElementById("prinAmt").value, "Accept only Numbers without space character!") == false))) {
        document.getElementById("prinAmt").focus();
        return false;
    }
    return true;
}
/*****************************************************************/
/*end code for month & Year  @AUTHOR: LINA27JUN2013 */
/*****************************************************************/
//
//
/***** Start of code for interest analysis panel @AUTHOR: SANDY27JUN2013  *********/
function showInterestAnalysisReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviPanelAnalysisDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/orgnsfin.php", true);
    xmlhttp.send();
}
/***** End of code for interest analysis panel @AUTHOR: SANDY27JUN2013  *********/
//
//
/***** Start of code for NewLoansAnalysisReport panel @AUTHOR: SANDY27JUN2013  *********/
function showNewLoansAnalysisReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviPanelAnalysisDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/orgnsfnga.php", true);
    xmlhttp.send();
}
/***** End of code for NewLoansAnalysisReport panel @AUTHOR: SANDY27JUN2013  *********/
//
//
/***** Start of code for ReleaseLoansAnalysisReport @AUTHOR: SANDY27JUN2013  *********/
function showNewReleasedLoansAnalysisReport() {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviPanelAnalysisDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/orgnsfrga.php", true);
    xmlhttp.send();
}
/***** End of code for ReleaseLoansAnalysisReport @AUTHOR: SANDY27JUN2013  *********/

/***** Start of code for purchase AnalysisReport @AUTHOR: SANDY1JUL2013  *********/
function showPurchaseAnalysis() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviPanelAnalysisDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/omgnsfpa.php", true);
    xmlhttp.send();
}
/***** End of code for purchase AnalysisReport @AUTHOR: SANDY1JUL2013  *********/

/***** Start of code for Sell AnalysisReport @AUTHOR: SANDY2JUL2013   *********/
function showSellAnalysis() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviPanelAnalysisDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/omgnsfsa.php", true);
    xmlhttp.send();
}
/***** End of code for Sell AnalysisReport @AUTHOR: SANDY2JUL2013   *********/
/***** Start of code for Sell AnalysisReport @AUTHOR: SANDY2JUL2013   *********/
function showStockAnalysisReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviPanelAnalysisDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/omgnsfsta.php", true);
    xmlhttp.send();
}
/***** End of code for Sell AnalysisReport @AUTHOR: SANDY2JUL2013   *********/
/***** Start code to select common firm in all files @AUTHOR: SANDY31JUL13 ******/
function setFirmSession(firmid)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/omfrsess.php?firmid=" + firmid, true);
    xmlhttp.send();

}
//
function setFirmSessionDefault(firmid)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/omfrsess.php?funType=Default&firmid=" + firmid, true);
    xmlhttp.send();

}
/***** End code to select common firm in all files @AUTHOR: SANDY31JUL13 ******/
/********Start Code To Add Function For Repair Table in login window @AUTHOR: SANDY13JUL13******************/
function getRepairTableAtLogin(versionNo) {
    confirm_box = confirm("Do you really want Repair Data Base?\n" + takeBackupAlertMsg);//add variables of alert msgs @AUTHOR: SANDY29JAN14
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

        xmlhttp.open("POST", "include/php/ommptbrl.php", true);
        xmlhttp.send();

    }
}
/********End Code To Add Function For Repair Table in login window @AUTHOR: SANDY13JUL13******************/
function valgetEmailAdd() {
    if (validateEmptyField(document.getElementById("emailAddress").value, "Please enter First Name!") == false ||
            validateAlphaWithSpace(document.getElementById("emailAddress").value, "Accept only alpha characters!") == false) {
        document.getElementById("emailAddress").focus();
        return false;
    }
}

/********Start Code for back button to  return to login window @AUTHOR: SANDY14JUL13******************/
function backToLogin(divPanel)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            //document.barcode_search.barcode_text.focus();
            document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppmsdv.php?divPanel=" + divPanel, true);
    xmlhttp.send()
}
/********End Code for back button to return to login window @AUTHOR: SANDY14JUL13******************/

/* Start to add window scroll function @AUTHOR: SANDY18AUG13 */
var setScrollId;
function setScrollIdFun(scrollId) {
    //alert(scrollId);
    setScrollId = scrollId;
}
function setLedgerScrollIdFun(scrollId) {
    setScrollId = scrollId;
}
window.onscroll = function () {
    var top = window.pageXOffset ? window.pageXOffset : document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop;
    var head;
    /************ Start code to Change top @Author: PRIYA24OCT13************/
    /************ Start code to Change top @Author: PRIYA28MAY14************/
    /************ Start code to Change top @OMMODTAG SHRI_07OCT15************/
    if (setScrollId == 'girviPanelTrId') {
        head = document.getElementById("girviPanelTrId");
        if (top > 116) {
            head.style.visibility = "visible";
            head.style.position = "fixed";
            head.style.top = "63px" //change in top @AUTHOR: SANDY26DEC13
        }
        else {
            if (head.getAttribute("style"))
                head.removeAttribute("style")
            head.style.visibility = "visible";
        }
    }
    /************ End code to Change top @OMMODTAG SHRI_07OCT15************/
    /************ End code to Change top @Author: PRIYA24OCT13************/
    /************ Start to Change top and head.style.top @Author: PRIYA19AUG13************/
    /************ Start code to Change top @Author: PRIYA24OCT13************/
    /************ Start code to Change top @Author: PRIYA30OCT13************/
    else if (setScrollId == 'headerTable') {
        head = document.getElementById("headerTable");
        // if (top > 120) {
        if (top > 170) { //top changed @Author:PRIYA18FEB14
            head.style.visibility = "visible";
            head.style.position = "fixed";
            head.style.top = "62px"
        }
        else {
            if (head.getAttribute("style"))
                head.removeAttribute("style")
            head.style.visibility = "visible";
        }
    }
    else if (setScrollId == 'headerTableTitle') {
        head = document.getElementById("headerTableTitle");
        // if (top > 120) {
        if (top > 170) { //top changed @Author:PRIYA18FEB14
            head.style.visibility = "visible";
            head.style.position = "fixed";
            head.style.top = "62px";
            head.style.width = "89%";
        }
        else {
            head.style.visibility = "visible";
            head.style.position = "";
            head.style.top = "";
            head.style.width = "100%";
        }
    }
    else if (setScrollId == 'silverStockheaderTable') { //NEW condition For new header @AUTHOR: SANDY9DEC
        head = document.getElementById("silverStockheaderTable");
        // if (top > 120) {
        if (top > 80) {
            head.style.visibility = "visible";
            head.style.position = "fixed";
            head.style.top = "62px"
        }
        else {
            if (head.getAttribute("style"))
                head.removeAttribute("style")
            head.style.visibility = "visible";
        }
    }
    /************ End code to Change top @Author: PRIYA30OCT13************/
    /************ End code to Change top @Author: PRIYA24OCT13************/
    /************ Start code to comment @Author: PRIYA24OCT13************/
    /*   else if(setScrollId == 'headerOfGirviTable'){
     head = document.getElementById("headerOfGirviTable"); 
     if(top > 120){
     head.style.visibility = "visible";
     head.style.position = "fixed";
     head.style.top="104px"
     }
     else {
     if(head.getAttribute("style"))
     head.removeAttribute("style")  
     head.style.visibility = "hidden";
     }
     }
     else if(setScrollId == 'headerOfUdharTable'){
     head = document.getElementById("headerOfUdharTable"); 
     if(top > 120){
     head.style.visibility = "visible";
     head.style.position = "fixed";
     head.style.top="104px"
     }
     else {
     if(head.getAttribute("style"))
     head.removeAttribute("style")    
     head.style.visibility = "hidden";            
     }
     }*/
    /************ End code to comment @Author: PRIYA24OCT13************/
    /************ End to Change top and head.style.top @Author: PRIYA19AUG13************/
    /************ Start code to comment @Author: PRIYA24OCT13************/
    /*else if(setScrollId == 'transGirviListHeader'){
     head = document.getElementById("transGirviListHeader"); 
     if(top > 90){
     
     head.style.visibility = "visible";
     head.style.position = "fixed";
     head.style.top="103px"
     }
     else {
     if(head.getAttribute("style"))
     head.removeAttribute("style") 
     head.style.visibility = "hidden";
     }
     }
     else if(setScrollId == 'releaseGirviListHeader'){
     head = document.getElementById("releaseGirviListHeader"); 
     if(top > 90){
     head.style.visibility = "visible";
     head.style.position = "fixed";
     head.style.top="103px"
     }
     else {
     if(head.getAttribute("style"))
     head.removeAttribute("style")  
     head.style.visibility = "hidden";
     }
     }
     else if(setScrollId == 'lossGirviListHeader'){
     head = document.getElementById("lossGirviListHeader"); 
     if(top > 90){
     head.style.visibility = "visible";
     head.style.position = "fixed";
     head.style.top="103px"
     }
     else {
     if(head.getAttribute("style"))
     head.removeAttribute("style")  
     head.style.visibility = "hidden";
     }
     }*/
    /************ End code to comment @Author: PRIYA24OCT13************/
    /******Start Code To Change top @Author:PRIYA23AUG13***************/
    /************ Start code to comment @Author: PRIYA24OCT13************/
    /*else if(setScrollId == 'sellReportHeading'){
     head = document.getElementById("sellReportHeading"); 
     if(top > 120){
     head.style.visibility = "visible";
     head.style.position = "fixed";
     head.style.top="62px"
     }
     else {
     if(head.getAttribute("style"))
     head.removeAttribute("style")  
     head.style.visibility = "hidden";
     }
     }
     /******End Code To Change top @Author:PRIYA23AUG13***************/
    /*else if(setScrollId == 'expiredGirviListHead'){
     head = document.getElementById("expiredGirviListHead"); 
     if(top > 90){
     head.style.visibility = "visible";
     head.style.position = "fixed";
     head.style.top="103px"
     }
     else {
     if(head.getAttribute("style"))
     head.removeAttribute("style") 
     head.style.visibility = "hidden";
     }
     }*/
    /************ End code to comment @Author: PRIYA24OCT13************/
    else if (setScrollId == 'stockListHeader') {
        head = document.getElementById("stockListHeader");
        if (top > 50) {
            head.style.visibility = "visible";
            head.style.position = "fixed";
            head.style.top = "63px" //change IN top Width @AUTHOR: SANDY21OCT13
        }
        else {
            if (head.getAttribute("style"))
                head.removeAttribute("style")
            head.style.visibility = "visible";//change IN visibility @AUTHOR: SANDY24OCT13
        }
    }
    /************Start code add new header for Imitation @Author:ANUJA25FEB15************/
    else if (setScrollId == 'stockImiListHeader') {
        head = document.getElementById("stockImiListHeader");
        if (top > 80) {
            head.style.visibility = "visible";
            head.style.position = "fixed";
            head.style.top = "62px" //change IN top Width @AUTHOR: SANDY21OCT13
        }
        else {
            if (head.getAttribute("style"))
                head.removeAttribute("style")
            head.style.visibility = "visible";//change IN visibility @AUTHOR: SANDY24OCT13
        }
    }
    /************End code add new header for Imitation @Author:ANUJA25FEB15************/
    //Start change in code to add condition of scroll list for repair panel list @Author: SHRI16DEC14
    else if (setScrollId == 'repairItemListHeader') {
        head = document.getElementById("repairItemListHeader");
        if (top > 80) {
            head.style.visibility = "visible";
            head.style.position = "fixed";
            head.style.top = "60px"  //change IN top Width @Author: SHRI16DEC14
        }
        else {
            if (head.getAttribute("style"))
                head.removeAttribute("style")
            head.style.visibility = "visible";//change IN visibility @AUTHOR: SANDY24OCT13
        }
    }//End change in code to add condition of scroll list for repair panel list @Author: SHRI16DEC14
    /************Start to Change top and head.style.top @Author: PRIYA19AUG13************/
    /************ Start code to comment @Author: PRIYA24OCT13************/
    /*else if(setScrollId == 'headerOfTransGirviTable'){
     head = document.getElementById("headerOfTransGirviTable"); 
     if(top > 120){
     head.style.visibility = "visible";
     head.style.position = "fixed";
     head.style.top="104px"
     }
     else {
     if(head.getAttribute("style"))
     head.removeAttribute("style")    
     head.style.visibility = "hidden";            
     }
     }*/
    /************ End code to comment @Author: PRIYA24OCT13************/
    /************ Start code to add header for DD @Author: PRIYA21NOV13************/
    else if (setScrollId == 'ddHeader') {
        head = document.getElementById("ddHeader");
        if (top > 90) { //Please change this for other panel 118 for loan book
            head.style.visibility = "visible";
            head.style.position = "fixed";
            head.style.top = "62.5px"
        }
        else {
            if (head.getAttribute("style"))
                head.removeAttribute("style")
            head.style.visibility = "visible";
        }
    }
    /************ End code to add header for DD @Author: PRIYA21NOV13************/
    //Start code to change in code to add condition of scroll list for Crystal Purchase list @Author:SHE02MAR15
    else if (setScrollId == 'stockCryListHeader') {
        head = document.getElementById("stockCryListHeader");
        if (top > 80) {
            head.style.visibility = "visible";
            head.style.position = "fixed";
            head.style.top = "60px" //change IN top Width @Author:SHE02MAR15
        }
        else {
            if (head.getAttribute("style"))
                head.removeAttribute("style")
            head.style.visibility = "visible";//change IN visibility @Author:SHE02MAR15
        }
    }

    //End code to change in code to add condition of scroll list for Crystal Purchase list @Author:SHE02MAR15
}
/************ End to Change top and head.style.top @Author: PRIYA19AUG13************/
/* End to add window scroll function @AUTHOR: SANDY18AUG13 */
function forgetPassEmailIdVeri(emailAdd, versionNo) {
    loadXMLDoc();
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
            document.getElementById("emailAddressButt").style.visibility = "hidden";
            document.getElementById("emailVeriStatus").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };

    xmlhttp.open("POST", "include/php/ommpemlv.php?emailAdd=" + emailAdd, true);
    xmlhttp.send();
}

function showForgetPassSecurityCodeDiv(versionNo, divPanel) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("mainSelectDiv").innerHTML = xmlhttp2.responseText;
        }
    };
    xmlhttp2.open("POST", "include/php/omppmsdv.php?divPanel=" + divPanel, true);
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

    xmlhttp.open("POST", "include/php/ommpsecv.php?securityCode=" + securityCode, true);
    xmlhttp.send();
}

function showForgetPassResetDiv(versionNo, divPanel) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("mainSelectDiv").innerHTML = xmlhttp2.responseText;
        }
    };
    xmlhttp2.open("POST", "include/php/omppmsdv.php?divPanel=" + divPanel, true);
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

        xmlhttp.open("POST", "include/php/ommppsrs.php?" + poststr, true);
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
    xmlhttp2.open("POST", "include/php/omppmsdv.php?divPanel=" + divPanel, true);
    xmlhttp2.send();
}