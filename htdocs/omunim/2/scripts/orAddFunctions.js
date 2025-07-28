//*********** Start Code for Udhaar Notice Add Language @Author: KHUSH20JAN13 ************************
function validateUdhaarNoticeSetUpAddLangInputs() {
    if (validateEmptyField(document.getElementById("newLang").value, "Please enter Language Name!") == false)
    {
        document.getElementById("newLang").focus();
        return false;
    }
    if (validateEmptyField(document.getElementById("headerLabel").value, "Please enter Header Label!") == false)
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
    } else if (validateEmptyField(document.getElementById("principalAmountLabel").value, "Please enter Principal Amount!") == false) {
        document.getElementById("principalAmountLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("udhaarDateLabel").value, "Please enter Udhaar Date!") == false) {
        document.getElementById("udhaarDateLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("interestLabel").value, "Please enter Interest!") == false) {
        document.getElementById("interestLabel").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("totalAmountLabel").value, "Please enter Total Amount!") == false) {
        document.getElementById("totalAmountLabel").focus();
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
function udhaar_notice_setUp_addLang(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertUdhaarNoticeSetUpAddLang;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertUdhaarNoticeSetUpAddLang() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addUdhaarNoticeBut").style.visibility = "visible";
        document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("addUdhaarNoticeBut").style.visibility = "hidden";
    }
}
/**************Start code to add margin @Author:PRIYA28DEC13*******************/
function UdhaarNoticeSetUpAddLang() {

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addUdhaarNoticeBut").style.visibility = "hidden";

    if (validateUdhaarNoticeSetUpAddLangInputs()) {

        var poststr = "newLang=" + encodeURIComponent(document.getElementById("newLang").value)
                + "&headerLabel=" + encodeURIComponent(document.getElementById("headerLabel").value)
                + "&topMargin=" + encodeURIComponent(document.getElementById("udhaarNoticeTopMargin").value)
                + "&leftMargin=" + encodeURIComponent(document.getElementById("udhaarNoticeLeftMargin").value)
                + "&dateLabel=" + encodeURIComponent(document.getElementById("dateLabel").value)
                + "&subjectLabel=" + encodeURIComponent(document.getElementById("subjectLabel").value)
                + "&udhaarNoticeContent=" + encodeURIComponent(document.getElementById("udhaarNoticeContent").value)
                + "&principalAmountLabel=" + encodeURIComponent(document.getElementById("principalAmountLabel").value)
                + "&udhaarDateLabel=" + encodeURIComponent(document.getElementById("udhaarDateLabel").value)
                + "&interestLabel=" + encodeURIComponent(document.getElementById("interestLabel").value)
                + "&totalAmountLabel=" + encodeURIComponent(document.getElementById("totalAmountLabel").value)
                + "&udhaarOtherInfo=" + encodeURIComponent(document.getElementById("udhaarOtherInfo").value)
                + "&tNC=" + encodeURIComponent(document.getElementById("tNC").value)
                + "&custSign=" + encodeURIComponent(document.getElementById("custSign").value)
                + "&ownerSign=" + encodeURIComponent(document.getElementById("ownerSign").value)
                + "&footerLabel=" + encodeURIComponent(document.getElementById("footerLabel").value);

        udhaar_notice_setUp_addLang('include/php/omppunad.php', poststr);

    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addUdhaarNoticeBut").style.visibility = "visible";
    }
}
/************End code to add margin @Author:PRIYA28DEC13*******************/
//*********** End Code for Udhaar Notice Add Language @Author: KHUSH16JAN13 ************************

/**** Start code to insert value of indicator checkbox in table @AUTHOR: SANDY15JUL13 **/
/**************Start Code To Change FileName @Author:PRIYA20JUL13************************/
function firstMonIntValueChange(indicname, indicval)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("selFirstMonthInt").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //alert(indicval);
    xmlhttp.open("POST", "include/php/ommpindc.php?indicval=" + indicval, true);
    xmlhttp.send();

}
/**************End Code To Change FileName @Author:PRIYA20JUL13************************/
/**** End code to insert value of indicator checkbox in table @AUTHOR: SANDY15JUL13 **/

// START CODE TO SHOW NEXT BARCODES @AUTHOR: SANDY18JUL13
/*******Start Code Add Div For 65L,84L,Loan@Author:PRIYA15AUG13*************/
/****Start to change function @AUTHOR: SANDY09JAN14**********************/
/********Start code to add var in GirviBCPaging @Author:PRIYA03JUN14*****************************/
/********Start code to change div and pass panel @Author:PRIYA07APR15**********************/
function navigationToNextBarcodePanel(pagenum, panelName, serachprodname) {
    //alert(panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'label' || panelName == 'Items55x13BarCodePanel') {
                //   alert(xmlhttp.responseText);
                document.getElementById("SortByProdName").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'Items55x13IMBarCodePanel') {
                document.getElementById("SortByProdName").innerHTML = xmlhttp.responseText;
            } else if (panelName == '65LPaging') {
                document.getElementById("barCode65LDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == '84LPaging') {
                document.getElementById("barCode84L").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'GirviBCPaging') {
                document.getElementById("girviBarCodeDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == '20x12Paging') {
                //alert( xmlhttp.responseText);
                document.getElementById("barCode20x12Div").innerHTML = xmlhttp.responseText;
            } else if (panelName == '61LPaging') {//condition added for 61L Barcode @Author:SHRI17FEB15
                document.getElementById("barCode61LDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == '61RPaging' || panelName == 'Items61x12BarCodePanel') {//condition added for 61L Barcode @Author:SHRI17FEB15
                document.getElementById("barCode61RDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == '55x13Paging') {//condition added for 61L Barcode @Author:SHRI17FEB15
                document.getElementById("SortByProdName").innerHTML = xmlhttp.responseText;
            }
        }
    };
    if (panelName == 'label' || panelName == 'Items55x13BarCodePanel') {
        // alert("hi");
        xmlhttp.open("POST", "include/php/ogibbc55x13.php?page=" + pagenum + "&panel=" + panelName + "&tags=false" + "&prodname=" + serachprodname, true);
    } else if (panelName == 'Items55x13IMBarCodePanel') {
        // alert("hi");
        xmlhttp.open("POST", "include/php/ogibbc55x13imi.php?page=" + pagenum + "&panel=" + panelName + "&tags=false" + "&prodname=" + serachprodname, true);
    } else if (panelName == '65LPaging') {
//        xmlhttp.open("POST", "include/php/ogibbc65l.php?page=" + pagenum + "&tags=true", true);
        xmlhttp.open("POST", "include/php/omstockTransibbc65l.php?page=" + pagenum + "&tags=true", true);
    } else if (panelName == '84LPaging') {
//        xmlhttp.open("POST", "include/php/ogibbc84l.php?page=" + pagenum + "&tags=true", true);
        xmlhttp.open("POST", "include/php/omstockTransibbc84l.php?page=" + pagenum + "&tags=true", true);
    } else if (panelName == 'GirviBCPaging') {
        xmlhttp.open("POST", "include/php/olggbcpd.php?page=" + pagenum + "&girviTags=true", true);//change in filename @AUTHOR: SANDY21NOV13
    } else if (panelName == '20x12Paging') {
//        xmlhttp.open("POST", "include/php/ogibbc20x12.php?page=" + pagenum + "&tags=true" +"&prodname=" + serachprodname, true);//change in filename @AUTHOR: SANDY21NOV13
        xmlhttp.open("POST", "include/php/omstockTransibbc20x12.php?page=" + pagenum + "&tags=true" + "&prodname=" + serachprodname, true);//change in filename @AUTHOR: SANDY21NOV13
    } else if (panelName == '61LPaging') {

        //condition added for 61L Barcode @Author:SHRI17FEB15
//        xmlhttp.open("POST", "include/php/ogibbc61x12dvleft.php?page=" + pagenum + "&tags=true", true); //code to change in file to pass girvi tag true @Author:SHRI04APR15
        xmlhttp.open("POST", "include/php/omstockTransibbc61x12dvleft.php?page=" + pagenum + "&tags=true" + "&panel=Items61x12BarCodePanel", true); //code to change in file to pass girvi tag true @Author:SHRI04APR15
    } else if (panelName == '61RPaging') {

        //condition added for 61R Barcode @Author:BAJRANG8JUN18
//        xmlhttp.open("POST", "include/php/ogibbc61x12dv.php?page=" + pagenum + "&tags=true", true); //code to change in file to pass girvi tag true @Author:SHRI04APR15
        xmlhttp.open("POST", "include/php/omstockTransibbc61x12dvright.php?page=" + pagenum + "&tags=true" + "&panel=Items61x12BarCodePanel", true); //code to change in file to pass girvi tag true @Author:SHRI04APR15
    } else if (panelName == '55x13Paging') {
        xmlhttp.open("POST", "include/php/olggbc55x13.php?page=" + pagenum + "&girviTags=true" + "&prevoiusbtn=" + serachprodname, true); //code to change in file to pass girvi tag true @Author:SHRI04APR15
    }
    xmlhttp.send();
}
/********End code to change div and pass panel @Author:PRIYA07APR15**********************/
/********End code to add var in GirviBCPaging @Author:PRIYA03JUN14*****************************/
/****End to change function @AUTHOR: SANDY09JAN14**********************/
/*******End Code Add Div For 65L,84L,Loan @Author:PRIYA15AUG13*************/
// END CODE TO SHOW NEXT BARCODES @AUTHOR: SANDY18JUL13

/*Start To get Product details @AUTHOR: SANDY24JUL13*/
function alertSearchProductDetails()
{
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("barcode_search_butt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        document.getElementById("barcode_text").value = '';
        document.getElementById("barcode_text").focus();
        //refreshMainRightDiv();
    } else {
        document.getElementById("barcode_search_butt").style.visibility = "hidden";
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/*End To get Product details @AUTHOR: SANDY24JUL13*/
/*Start To get Item details @AUTHOR: SANDY24JUL13*/
function search_product_details(url, parameters)
{
    loadXMLDoc();

    xmlhttp.onreadystatechange = alertSearchProductDetails;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/*End To get Item details @AUTHOR: SANDY24JUL13*/
/*Start To get customer details @AUTHOR: SANDY24JUL13*/
function alertSearchCustDetails()
{
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("barcode_search_butt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        document.getElementById("barcode_text").value = '';
        document.getElementById("barcode_text").focus();
        //refreshMainRightDiv();
    } else {
        document.getElementById("barcode_search_butt").style.visibility = "hidden";
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/*End To get customer details @AUTHOR: SANDY24JUL13*/
/*Start To get customer details @AUTHOR: SANDY24JUL13*/
function search_cust_details(url, parameters)
{
    loadXMLDoc();

    xmlhttp.onreadystatechange = alertSearchCustDetails;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/*End To get customer details @AUTHOR: SANDY24JUL13*/

/*Start To get Supplier details @AUTHOR: SANDY24JUL13*/
function alertSearchSupDetails()
{
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("barcode_search_butt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        document.getElementById("barcode_text").value = '';
        document.getElementById("barcode_text").focus();
        //refreshMainRightDiv();
    } else {
        document.getElementById("barcode_search_butt").style.visibility = "hidden";
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/*End To get Supplier details @AUTHOR: SANDY24JUL13*/
/*Start To get Supplier details @AUTHOR: SANDY24JUL13*/
function search_Supplier_details(url, parameters)
{
    loadXMLDoc();

    xmlhttp.onreadystatechange = alertSearchSupDetails;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/*End To get Supplier details @AUTHOR: SANDY24JUL13*/
/*Start To get staff details @AUTHOR: SANDY24JUL13*/
function alertSearchStaffDetails()
{
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("barcode_search_butt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        document.getElementById("barcode_text").value = '';
        document.getElementById("barcode_text").focus();
        //refreshMainRightDiv();
    } else {
        document.getElementById("barcode_search_butt").style.visibility = "hidden";
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/*End To get staff details @AUTHOR: SANDY24JUL13*/
/*Start To get staff details @AUTHOR: SANDY24JUL13*/
function search_staff_details(url, parameters)
{
    loadXMLDoc();

    xmlhttp.onreadystatechange = alertSearchStaffDetails;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/*End To get staff details @AUTHOR: SANDY24JUL13*/
/*Start To get staff details @AUTHOR: SANDY24JUL13*/
function alertSearchItemDetails()
{
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("barcode_search_butt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        document.getElementById("barcode_text").value = '';
        document.getElementById("barcode_text").focus();
        //refreshMainRightDiv();
    } else {
        document.getElementById("barcode_search_butt").style.visibility = "hidden";
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/*End To get staff details @AUTHOR: SANDY24JUL13*/
/*Start To get items details @AUTHOR: SANDY24JUL13*/
function search_item_details(url, parameters)
{
    loadXMLDoc();

    xmlhttp.onreadystatechange = alertSearchStaffDetails;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/*End To get items details @AUTHOR: SANDY24JUL13*/
/*start code to get SELL REPORT @AUTHOR: SANDY24JUL13*/
function getSellReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogbbsrbs.php", true);
    xmlhttp.send();
}
/* End code to get SELL REPORT @AUTHOR: SANDY24JUL13*/
/*start code to get INVOICE SUMMARY REPORT @AUTHOR: @DNYANESHWARI 2JAN2024*/
function getInvoiceSummary() {
//    alert("fun created");
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omInvoiceSummary.php", true);
    xmlhttp.send();
}
/* End code to get INVOICE SUMMARY @AUTHOR: @DNYANESHWARI 2JAN2024*/
/*SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
 *                                     START getGstAtReport
 *SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS*/
function getGstAtReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("GET", "include/php/omGstAtReport.php", true);
    xmlhttp.send();
}
/*EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
 *                                      END getGstAtReport
 * EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE*/

/*SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
 *                                     START getGstAtadjReport
 *SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS*/
function getGstAtadjReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("GET", "include/php/omGstAtadjReport.php", true);
    xmlhttp.send();
}
/*EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
 *                                      END getGstAtadjReport
 * EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE*/

/*SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
 *                                     START getGstB2bReport
 *SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS*/
function getGstB2bReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("GET", "include/php/omGstB2bReport.php", true);
    xmlhttp.send();
}
/*EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
 *                                      END getGstB2bReport
 * EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE*/

/*SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
 *                                     START getGstB2CLReport
 *SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS*/
function getGstB2CLReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("GET", "include/php/omGstB2CLReport.php", true);
    xmlhttp.send();
}
/*EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
 *                                      END getGstB2CLReport
 * EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE*/

/*SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
 *                                     START getGstB2CSReport
 *SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS*/
function getGstB2CSReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("GET", "include/php/omGstB2CSReport.php", true);
    xmlhttp.send();
}
/*EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
 *                                      END getGstB2CSReport
 * EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE*/

/*SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
 *                                     START getGstCdnrReport
 *SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS*/
function getGstCdnrReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("GET", "include/php/omGstCdnrReport.php", true);
    xmlhttp.send();
}
/*EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
 *                                      END getGstCdnrReport
 * EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE*/

/*SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
 *                                     START getGstCdnurReport
 *SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS*/
function getGstCdnurReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("GET", "include/php/omGstCdnurReport.php", true);
    xmlhttp.send();
}
/*EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
 *                                      END getGstCdnurReport
 * EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE*/

/*SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
 *                                     START getGstExpReport
 *SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS*/
function getGstExpReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("GET", "include/php/omGstExpReport.php", true);
    xmlhttp.send();
}
/*EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
 *                                      END getGstExpReport
 * EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE*/

/*SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
 *                                     START getGstHsnReport
 *SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS*/
function getGstHsnReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("GET", "include/php/omGstHsnReport.php", true);
    xmlhttp.send();
}
/*EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
 *                                      END getGstHsnReport
 * EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE*/

/*SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
 *                                     START getGstHelp
 *SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS*/
function getGstHelp() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("GET", "include/php/omGstHelp.php", true);
    xmlhttp.send();
}
/*EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
 *                                      END getGstHelp
 * EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE*/

/*start code to get purchase REPORT @AUTHOR: SANDY25JUL13*/
function getPurchaseReport()
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("GET", "include/php/ogbbprdt.php", true);
    xmlhttp.send();
}
/* End code to get purchase REPORT @AUTHOR: SANDY25JUL13*/

/*start code to get stock REPORT @AUTHOR:SURAJ12FEB18*/
function getStockReport() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("GET", "include/php/ogbbstdt.php", true);
    xmlhttp.send();
}
/*start code to get  REPORT @AUTHOR: SURAJ12FEB18*/

/**********Start Code To Validate Sell Report Date @Author:PRIYA14AUG13**************/
function valSellReportDate() {
    /*if (validateSelectField(document.getElementById("sellDayDD").value,"Please select Day!") == false) {
     document.getElementById("sellDayDD").focus();
     return false; //to remove validation for day @AUTHOR: SANDY20AUG13
     }else */if (validateSelectField(document.getElementById("sellMonthM").value, "Please select Month!") == false) {
        document.getElementById("sellMonthM").focus();
        return false;
    } else if (validateSelectField(document.getElementById("sellYearY").value, "Please select Year!") == false) {
        document.getElementById("sellYearY").focus();
        return false;
    }
    return true;
}
/***********End Code To Validate Sell Report Date @Author:PRIYA14AUG13**************/
/*start code to get SELL REPORT BY DATE @AUTHOR: SANDY24JUL13*/
/**********Start Code To Add Val Func for date @Author:PRIYA14AUG13***********/
/*********Start of Change in function @AUTHOR: SANDY23DEC13*****************************/
/*********Start code to add firm @Author:PRIYA13MAY14********************/
/***********Start code to add condition for profit loss panel @OMMODTAG SHRI_01OCT15*************/
function searchSellPurchaseByDate(panel, date, month, year, eday, emonth, eyear, firmId)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (valSellReportDate()) {
                if (panel == 'sell') {
                    document.getElementById("mainSellLedgerDiv").innerHTML = xmlhttp.responseText;
                } else if (panel == 'sellItemList') {
                    document.getElementById("mainSellLedgerDiv").innerHTML = xmlhttp.responseText;
                } else if (panel == 'sellProfitLoss') {
                    document.getElementById("mainSellLedgerDiv").innerHTML = xmlhttp.responseText;
                } else if (panel == 'purchaseItemList') {
                    document.getElementById("mainSellLedgerDiv").innerHTML = xmlhttp.responseText;
                } else if (panel == 'productProfitLoss') {
                    document.getElementById("mainSellLedgerDiv").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("mainSellLedgerDiv").innerHTML = xmlhttp.responseText;
                }
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'sell') {
        xmlhttp.open("POST", "include/php/ogbbsrbs.php?date=" + date + "&month=" + month + "&year=" + year + "&eday=" + eday + "&emonth=" + emonth + "&eyear=" + eyear + "&firmId=" + firmId, true);
    } else if (panel == 'sellItemList') {
        xmlhttp.open("POST", "include/php/ogbbsldt.php?date=" + date + "&month=" + month + "&year=" + year + "&eday=" + eday + "&emonth=" + emonth + "&eyear=" + eyear + "&firmId=" + firmId, true);
    } else if (panel == 'sellProfitLoss') {
//         document.getElementById("mainSellLedgerDiv").innerHTML = xmlhttp.responseText;
        xmlhttp.open("POST", "include/php/ogbbslpl.php?date=" + date + "&month=" + month + "&year=" + year + "&eday=" + eday + "&emonth=" + emonth + "&eyear=" + eyear + "&firmId=" + firmId, true);
    } else if (panel == 'productProfitLoss') {
        xmlhttp.open("POST", "include/php/ogbbitpl.php?date=" + date + "&month=" + month + "&year=" + year + "&eday=" + eday + "&emonth=" + emonth + "&eyear=" + eyear + "&firmId=" + firmId, true);
    } else if (panel == 'purchaseItemList') {
        xmlhttp.open("POST", "include/php/ogbbprdt.php?date=" + date + "&month=" + month + "&year=" + year + "&eday=" + eday + "&emonth=" + emonth + "&eyear=" + eyear + "&firmId=" + firmId, true);
    } else if (panel == 'imiprofitloss') {
        xmlhttp.open("POST", "include/php/ogbbimipl.php?date=" + date + "&month=" + month + "&year=" + year + "&eday=" + eday + "&emonth=" + emonth + "&eyear=" + eyear + "&firmId=" + firmId, true);
    } else {
        xmlhttp.open("POST", "include/php/ogbbprbs.php?date=" + date + "&month=" + month + "&year=" + year + "&eday=" + eday + "&emonth=" + emonth + "&eyear=" + eyear + "&firmId=" + firmId, true);
    }
    xmlhttp.send();

}
/***********End code to add condition for profit loss panel @OMMODTAG SHRI_01OCT15*************/
/*********End code to add firm @Author:PRIYA13MAY14********************/
/*********End of Change in function @AUTHOR: SANDY23DEC13*****************************/
/**********End Code To Add Val Func for date @Author:PRIYA14AUG13***********/
/********** End code to get SELL REPORT BY DATE @AUTHOR: SANDY24JUL13************/
/********** Start code to get selected item tag @AUTHOR:SANDY26JUL13************/
/**********Start of changes in function  printItemTag @AUTHOR:SANDY29OCT13**************/
/*********Start of Change in function @AUTHOR: SANDY30OCT13*****************************/
/*********Start of Change in function @AUTHOR: SANDY7NOV13*****************************/
/*********Start of Change in bcPrice function @AUTHOR: ANUJA27JUN15*****************************/
/*********Update add last two parameter @AUTHOR: GAUR18SEP16*****************************/
function printItemTag(itemId, ownerId, stockFirmId, newPreItemId, newItemId, newItemName, newItemMetal, newItemGSW, newItemGSQT, newItemNTW, newItemNTWT, newItemCryVal, newItemTunch, bisMarkVal, mkngCharges, mkngChargesType, barcodeText, color, cryNtWt, cryNtWtTp, bcPrice, itemCode, itemNum, itemPKW, itemPKWT, bcItemDate, itemOtherInfo, bcItemPrefixId, bcItemModelNo, bcItemSize)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("itemTag").innerHTML = xmlhttp.responseText;
            document.getElementById("itemTag").style.visibility = "visible";
        } else {
            document.getElementById("itemTag").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ogitemtg.php?ownerId=" + ownerId + "&stockFirmId=" + stockFirmId + "&itstId=" + itemId
            + "&newPreItemId=" + newPreItemId + "&newItemId=" + newItemId + "&newItemName=" + newItemName + "&newItemMetal=" + newItemMetal
            + "&newItemGSW=" + newItemGSW + "&newItemGSQT=" + newItemGSQT
            + "&newItemNTW=" + newItemNTW + "&newItemNTWT=" + newItemNTWT
            + "&newItemCryVal=" + newItemCryVal
            + "&newItemTunch=" + newItemTunch + "&bisMarkVal=" + bisMarkVal + "&mkngCharges=" + mkngCharges + "&mkngChargesType=" + mkngChargesType + "&barcodeText=" + barcodeText + "&color=" + color + "&cryNtWt=" + cryNtWt + "&cryNtWtTp=" + cryNtWtTp + "&bcPrice=" + bcPrice + "&itemCode=" + itemCode + "&itemNum=" + itemNum + "&itemPKW=" + itemPKW + "&itemPKWT=" + itemPKWT + "&bcItemDate=" + bcItemDate + "&itemOtherInfo=" + itemOtherInfo + "&bcItemPrefixId=" + bcItemPrefixId + "&bcItemModelNo=" + bcItemModelNo + "&bcItemSize=" + bcItemSize, true);
    xmlhttp.send();
}
/*********Update add last two parameter @AUTHOR: GAUR18SEP16*****************************/
/*********End of Change in bcPrice function @AUTHOR: ANUJA27JUN15*****************************/
/*********End of Change in function @AUTHOR: SANDY7NOV13*****************************/
/*********End of Change in function @AUTHOR: SANDY30OCT13*****************************/
/********** End of changes in function  printItemTag @AUTHOR:SANDY29OCT13************/
/**********  End code to get selected item tag @AUTHOR:SANDY26JUL13************/
/********** Start code to get selected item as per selected tag @AUTHOR:SANDY25JUL13***********/
/*********Start of Change in function @AUTHOR: SANDY30OCT13*****************************/
/*********Start of Change in function @AUTHOR: SANDY8NOV13*****************************/
/*********Start of Change in bcPrice function @AUTHOR: ANUJA27JUN15*****************************/
function showSelectedItemTag(tag, itemId, ownerId, stockFirmId, newPreItemId, newItemId, newItemName, newItemMetal, newItemGSW, newItemGSQT, newItemNTW, newItemNTWT, newItemCryVal, newItemTunch, bisMarkVal, mkngCharges, mkngChargesType, barcodeText, color, cryNtWt, cryNtWtTp, bcPrice, itemCode, itemNum, itemPKW, itemPKWT, bcItemDate, bcItemPrefixId, bcItemModelNo, bcItemSize)
{
//    alert(bcPrice);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("itemTagSel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("itemTagSel").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };

    xmlhttp.open("POST", "include/php/ogitmtgd.php?tag=" + tag + "&itemId=" + itemId + "&ownerId=" + ownerId + "&stockFirmId=" + stockFirmId + "&itstId=" + itemId
            + "&newPreItemId=" + newPreItemId + "&newItemId=" + newItemId + "&newItemName=" + newItemName + "&newItemMetal=" + newItemMetal
            + "&newItemGSW=" + newItemGSW + "&newItemGSQT=" + newItemGSQT
            + "&newItemNTW=" + newItemNTW + "&newItemNTWT=" + newItemNTWT
            + "&newItemCryVal=" + newItemCryVal
            + "&newItemTunch=" + newItemTunch + "&bisMarkVal=" + bisMarkVal + "&mkngCharges=" + mkngCharges + "&mkngChargesType=" + mkngChargesType + "&barcodeText=" + barcodeText + "&color=" + color + "&cryNtWt=" + cryNtWt + "&cryNtWtTp=" + cryNtWtTp + "&bcPrice=" + bcPrice + "&itemCode=" + itemCode + "&itemNum=" + itemNum + "&itemPKW=" + itemPKW + "&itemPKWT=" + itemPKWT + "&bcItemDate=" + bcItemDate + "&bcItemPrefixId=" + bcItemPrefixId + "&bcItemModelNo=" + bcItemModelNo + "&bcItemSize=" + bcItemSize, true);
    xmlhttp.send();
}
/*********End of Change in bcPrice function @AUTHOR: ANUJA27JUN15*****************************/
/*********End of Change in function @AUTHOR: SANDY8NOV13*****************************/
/*********End of Change in function @AUTHOR: SANDY30OCT13*****************************/
/* End code to get selected item as per selected tag @AUTHOR:SANDY25JUL13*/
/* Start to close item tag slip @AUTHOR: SANDY25JUL13 */
/***Start of Changes in function to close div @AUTHOR: SANDY30OCT13 ***********/
function getItemTagHide() {
    document.getElementById("itemTag").style.visibility = "hidden";
}
/***End of Changes in function to close div @AUTHOR: SANDY30OCT13 ***********/
/* End to close item tag slip @AUTHOR: SANDY25JUL13 */

/***********Start to add code for item repair panel @AUTHOR: SANDY7NOV13*****************/
/***********Start code To add panel name @Author:PRIYA20SEP13**************/
/************Start to add code for add raw metal panel @AUTHOR: SANDY5OCT13*****************/
/************Start code to change raw metal panel @Author:PRIYA18JAN14****************/
/************Start code to change raw metal panel @OMMODTAG SHE_22DEC15****************/
function showAddedGoldId(metalType, keyCodeInput, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (panelName == 'ItemRepairMetRate') {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("itemRepMetalIdSelectDiv").innerHTML = xmlhttp.responseText;
                if (keyCodeInput == 40 || keyCodeInput == 38) {
                    document.getElementById('selectMetalIdFrmList').focus();
                    document.getElementById('selectMetalIdFrmList').options[0].selected = true;
                }
            }
        } else if (panelName == 'sellRawStockMetRate') {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("sellRawStockMetalIdSelectDiv").innerHTML = xmlhttp.responseText;
                if (keyCodeInput == 40 || keyCodeInput == 38) {
                    document.getElementById('selectMetalIdFrmMetalList').focus();
                    document.getElementById('selectMetalIdFrmMetalList').options[0].selected = true;
                }
            }
        } else if (panelName == 'AddRawStockMetRate') {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("addRawStockMetalIdSelectDiv").innerHTML = xmlhttp.responseText;
                if (keyCodeInput == 40 || keyCodeInput == 38) {
                    document.getElementById('addRawStockMetalId').focus();
                    document.getElementById('addRawStockMetalId').options[0].selected = true;
                }
            }
        } else {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("metalIdSelectDiv").innerHTML = xmlhttp.responseText;
                if (keyCodeInput == 40 || keyCodeInput == 38) {
                    document.getElementById('goldIdListDivToAddGoldIdSelect').focus();
                    document.getElementById('goldIdListDivToAddGoldIdSelect').options[0].selected = true;
                }
            }
        }
    };
    xmlhttp.open("POST", "include/php/ommrmidl.php?metalType=" + metalType + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/************END code to change raw metal panel @OMMODTAG SHE_22DEC15****************/
/************End code to change raw metal panel @Author:PRIYA18JAN14****************/
/************End to add code for add raw metal panel @AUTHOR: SANDY5OCT13*****************/
/***********End code To add panel name @Author:PRIYA20SEP13**************/
/***********End to add code for item repair panel @AUTHOR: SANDY7NOV13*****************/

/* start code to delete metal details after clicking delete button @AUTHOR: SANDY30JUL13*/
/*****************Start Code To Change Message @Author:PRIYA18AUG13***************/
function deleteMetalDetails(metalId, panelName) {
    confirm_box = confirm(deleteAlertMess + "\n\nDo you really want to Permanent Delete this Metal Details?");//change in line @AUTHOR: SANDY28JAN14

    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("metalDetDiv").innerHTML = xmlhttp.responseText;
                window.setTimeout(closeMetRateDelMessDiv, 1000);
            } else {
                if (panelName == 'gold')
                    document.getElementById("deleteGoldMetDet" + metalId).innerHTML = "<img src='images/loading16.gif' />";
                else
                    document.getElementById("deleteSilverMetDet" + metalId).innerHTML = "<img src='images/loading16.gif' />";
            }
        };
        xmlhttp.open("POST", "include/php/ommrmdel.php?metalId=" + metalId, true);
        xmlhttp.send();
    }
    function closeMetRateDelMessDiv() {
        document.getElementById("messDisplayDiv").innerHTML = "";
    }
}
/*****************End Code To Change Message @Author:PRIYA18AUG13***************/
/* end code to delete metal details after clicking delete button @AUTHOR: SANDY30JUL13*/

/* Start code to delete barcode 55X13 on delete @AUTHOR: SANDY31JUL13 */

function deleteItemBarCode55X13(barCodeSlipDiv, closeDivId, barCodePrintId) {
    confirm_box = confirm(deleteAlertMess + "\nDo you really want to Delete this Item Bar Code Slip?");//change in line @AUTHOR: SANDY28JAN14
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

/* End code to delete barcode 55X13 on delete @AUTHOR: SANDY31JUL13 */
/* start code to open repair panel @AUTHOR: SANDY1AUG13 */
/*******Start of changes to set focus on day field  @AUTHOR: SANDY9NOV13***************/
function getCustRepairPanel(custId) {
    //alert(custId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            document.getElementById("itemRepDOBDay").focus();
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogrpsbdv.php?custId=" + custId, true);
    xmlhttp.send();
}
/*******End of changes to set focus on day field  @AUTHOR: SANDY9NOV13***************/
/*End code to open repair panel @AUTHOR: SANDY1AUG13 */
/* start code to add functionality of repair button @AUTHOR: SANDY1AUG13 */
function getRepairDetails(custId)
{
    //alert(custId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogrpaddt.php?custId=" + custId, true);
    xmlhttp.send();
}
/* End code to add functionality of repair button @AUTHOR: SANDY1AUG13*/
/* start code  to validate input for repair item @AUTHOR: SANDY1AUG13*/
/* start code  to change in validate function for repair item @AUTHOR: SANDY17SEP13*/
/****************Start code to add field repair charges @Author:PRIYA03DEC14************************/
/****************Start code to add field repair charges @Author:SHRI16DEC14************************/
/****************Start code to add field  @Author:SHRI19FEB15************************/
function valAddItemDetails(obj) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addItemSubButtDiv").style.visibility = "hidden";

    if (document.getElementById('payButClickId').value == 'true') {
        var prefix = document.getElementById("prefix").value;
        var payPanelName = document.getElementById("upPanel").value;
        if (payPanelName == 'AddPanel') {
            document.getElementById("totMetal").value = getMetalDiv;
        } else if (payPanelName == 'UpPanel') {
            document.getElementById("totMetal").value = document.getElementById("noOfRawMet").value;
        }
//               if (document.getElementById(prefix + 'PayTotAmt').value != 0)
        return true;
    } else {
        if (ValidateRepairItemInputs()) {
            return true;
        }
    }

    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("addItemSubButtDiv").style.visibility = "visible";
    return false;
}
function ValidateRepairItemInputs(obj)
{
    if (validateSelectField(document.getElementById("itemRepDOBDay").value, "Please select Bill Date Day!") == false) {
        document.getElementById("itemRepDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateSelectField(document.getElementById("itemRepDOBMonth").value, "Please select Bill Date Month!") == false) {
        document.getElementById("itemRepDOBMonth").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateSelectField(document.getElementById("itemRepDOBYear").value, "Please select  Bill Date Year!") == false) {
        document.getElementById("itemRepDOBYear").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateSelectField(document.getElementById("itemRepDelDOBDay").value, "Please select Delv Date Day!") == false) {
        document.getElementById("itemRepDelDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateSelectField(document.getElementById("itemRepDelDOBMonth").value, "Please select  Delv Date Month!") == false) {
        document.getElementById("itemRepDelDOBMonth").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateSelectField(document.getElementById("itemRepDelDOBYear").value, "Please select  Delv Date Year!") == false) {
        document.getElementById("itemRepDelDOBYear").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateEmptyField(document.getElementById("itemRepInvoiceNo").value, "Please enter Invoice Number!") == false ||
            validateNum(document.getElementById("itemRepInvoiceNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("itemRepInvoiceNo").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Id!") == false) {
        document.getElementById("firmId").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateSelectField(document.getElementById("accountId").value, "Please select Account Name!") == false) {
        document.getElementById("accountId").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateSelectField(document.getElementById("itemRepMetalType").value, "Please enter metal type!") == false) {
        document.getElementById("itemRepMetalType").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateSelectField(document.getElementById("itemRepMetalRate").value, "Please enter metal rate!") == false) {
        document.getElementById("itemRepMetalRate").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateSelectField(document.getElementById("itemRepPreId").value, "Please enter item pre id!") == false) {
        document.getElementById("itemRepPreId").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateEmptyField(document.getElementById("itemRepPostId").value, "Please enter Item Id!") == false ||
            validateNum(document.getElementById("itemRepPostId").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("itemRepPostId").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateEmptyField(document.getElementById("addItemRepName").value, "Please enter Item Name!") == false) {
        document.getElementById("addItemRepName").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateEmptyField(document.getElementById("addItemRepCategory").value, "Please enter Item Category!") == false) {
        document.getElementById("addItemRepCategory").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateEmptyField(document.getElementById("itemQuantity").value, "Please enter Item Quantity!") == false ||
            validateNum(document.getElementById("itemQuantity").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("itemQuantity").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateSelectField(document.getElementById("itemTunch").value, "Please Enter Item Tunch Or Purity!") == false) {
        document.getElementById("itemTunch").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateEmptyField(document.getElementById("itemGrossWeight").value, "Please enter Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("itemGrossWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("itemGrossWeight").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateEmptyField(document.getElementById("itemNetWeight").value, "Please enter Net Weight!") == false ||
            validateNumWithDot(document.getElementById("itemNetWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("itemNetWeight").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateEmptyField(document.getElementById("repairItemGrossWeight").value, "Please Enter Extra Weight!") == false ||
            validateNumWithDot(document.getElementById("repairItemGrossWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("repairItemGrossWeight").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    } else if (validateEmptyField(document.getElementById("repairCharges").value, "Please enter repair charges!") == false ||
            validateNumWithDot(document.getElementById("repairCharges").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("repairCharges").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    }

    if (document.getElementById('upPanel').value == 'UpPanel') {
        if (noOfCrystal == '' || noOfCrystal == undefined) {
            noOfCrystal = document.getElementById("noOfCry").value;
        }
    }

    if (noOfCrystal != '' && noOfCrystal != undefined && noOfCrystal != '0') {
        suppCryEntered = 0;
        for (var cry = 1; cry <= noOfCrystal; cry++) {
            if (document.getElementById("del" + cry).value != 'Deleted') {
                if (validateEmptyField(document.getElementById("addItemCryId" + cry).value, "Please enter Crystal Id " + cry + "!") == false) {
                    document.getElementById("addItemCryId" + cry).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("addItemCryGSW" + cry).value, "Please enter Crystal Weight " + cry + "!") == false) {
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
//        alert(document.getElementById("addItemCryCount").value);
    }
    if (document.getElementById('mainPanel').value == 'StockPanel' && document.getElementById('autoBcPrint').value == 'YES') {
        document.getElementById("auto_barcode_label_print").style.visibility = "hidden";
        return true;
    } else {
        return true;
    }
}
/****************End code to add field  @Author:SHRI19FEB15************************/
/****************End code to add field repair charges @Author:SHRI16DEC14************************/
/****************End code to add field repair charges @Author:PRIYA03DEC14************************/
/*End code  to change in validate function for repair item @AUTHOR: SANDY17SEP13*/
/* End code to validate input for repair item @AUTHOR: SANDY1AUG13 */

/************Start of Comment to hide function that is not used @AUTHOR: SANDY8NOV13*******************************
 /* start code to for including file for adding item repair details to table @AUTHOR: SANDY1AUG13 
 function addItemDetails(obj) {
 calcFinalCrystValuation();
 document.getElementById("main_ajax_loading_div").style.visibility = "visible";
 document.getElementById("repSubButtDiv").style.visibility = "hidden";
 
 if (valAddItemDetails(obj)) {
 return true;
 }
 else
 {
 document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
 document.getElementById("repSubButtDiv").style.visibility = "visible";
 return false;
 }
 }
 /* End code for including file for adding item repair details to table @AUTHOR: SANDY1AUG13 
 **********End of Comment to hide function that is not used  @AUTHOR: SANDY8NOV13***********************************/
/* start code to show stock as per weight type @AUTHOR: SANDY7AUG13 
 function getSelectedWeightMetals(weight)
 {
 //alert(weight);
 loadXMLDoc();
 xmlhttp.onreadystatechange = function() {
 if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
 document.getElementById("jewellerySubPanel").innerHTML = xmlhttp.responseText;
 }
 else {
 document.getElementById("jewellerySubPanel").innerHTML = "<img src='images/ajaxLoad.gif' />";
 }
 };
 
 xmlhttp.open("POST", "include/php/ogilimsd.php?weight="+ weight, true);
 xmlhttp.send();
 }
 End code to show stock as per weight type @AUTHOR: SANDY7AUG13 */

/* start code to show trans girvi ledger @AUTHOR: SANDY6AUG13*/
function getTransLedgerBook()
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/orbbtrgl.php", true);
    xmlhttp.send();
}
/*End code to show trans girvi ledger @AUTHOR: SANDY6AUG13*/
/** Start of small changes in function getstaffInfo @AUTHOR: SANDY21AUG13 ****/
/*** Start to navigate to access panel of staff ofter clicking staff detail button @AUTHOR: SANDY16AUG13 */
function getstaffInfo(str)
{
    //alert(str);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;

        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omehmndv.php?staffId=" + staffId + "&staffPanelOption=" + str,
            true);
    xmlhttp.send();
}
/*** End to navigate to access panel of staff ofter clicking staff detail button @AUTHOR: SANDY16AUG13 */
/** End of small changes in function getstaffInfo @AUTHOR: SANDY21AUG13 ****/
/** Start to add function to show transaction details for update @AUTHOR: SANDY17AUG13 */
function showTransactionDetails(transId, preVch, firmVch, postVch)
{
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
    xmlhttp.open("POST", "include/php/omtutrnd.php?transId=" + transId + "&preVch=" + preVch + "&firmVch=" + firmVch + "&postVch=" + postVch, true);
    xmlhttp.send();
}
//
function showDepWithdrawDetails(utinId, preInv) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("depWithdrawDiv").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", "include/php/omDepWithdarwInv.php?utinId=" + utinId + "&preInv=" + preInv, true);
    xmlhttp.send();
}
/** End to add function to show transaction details for update @AUTHOR: SANDY17AUG13 */
/* Start to update transaction @AUTHOR: SANDY17AUG13 */
function updateTransaction(obj)
{
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("transSubButt").style.visibility = "hidden";

    if (validateAddTransactionInputs(obj)) {

        var poststr = "DOBDay=" + encodeURIComponent(document.getElementById("DOBDay").value)
                + "&DOBMonth=" + encodeURIComponent(document.getElementById("DOBMonth").value)
                + "&DOBYear=" + encodeURIComponent(document.getElementById("DOBYear").value)
                + "&transPreVoucherNo=" + encodeURIComponent(document.getElementById("transPreVoucherNo").value)
                + "&transPostVoucherNo=" + encodeURIComponent(document.getElementById("transPostVoucherNo").value)
                + "&transFirmId=" + encodeURIComponent(document.getElementById("transFirmId").value)
                + "&subPanelName=" + encodeURIComponent(document.getElementById("subPanelName").value)
                + "&transAmt=" + encodeURIComponent(document.getElementById("transAmt").value)
                + "&transFromAcc=" + encodeURIComponent(document.getElementById("transFromAcc").value)
                + "&transToAcc=" + encodeURIComponent(document.getElementById("transToAcc").value)
                + "&transSub=" + encodeURIComponent(document.getElementById("transSub").value)
                + "&transactionCategory=" + encodeURIComponent(document.getElementById("transactionCategory").value)
                + "&jrnlId=" + encodeURIComponent(document.getElementById("jrnlId").value)
                + "&transId=" + encodeURIComponent(document.getElementById("transId").value);//@AUTHOR: SANDY15JAN14
        //+ "&transactionDesc=" + encodeURIComponent(document.getElementById("transactionDesc").value);COMMENT BY @AUTHOR: SANDY02JAN14

        update_transaction('include/php/omtutrns.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("transSubButt").style.visibility = "visible";
    }
}
/*End to update transaction @AUTHOR: SANDY17AUG13 */
/* Start to update transaction @AUTHOR: SANDY17AUG13 */
function  update_transaction(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertUpdateTransaction;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/*End to update transaction @AUTHOR: SANDY17AUG13 */
/* Start to update transaction @AUTHOR: SANDY17AUG13 */
function alertUpdateTransaction() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("transSubButt").style.visibility = "visible";
        document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("transSubButt").style.visibility = "hidden";
    }
}
/*End to update transaction @AUTHOR: SANDY17AUG13 */
/**start code to show account details as per date @AUTHOR: SANDY20AUG13**/
/****Start to change function @AUTHOR: SANDY18JAN14**************************/
/****Start to change function @AUTHOR: SANDY16JAN14**************************/
/*********************Start code to add panel @Author:PRIYA03APR14*********************/
function searchAccountDetailsByDate(accId, userAccount, firmId, sdd, smm, syyyy, edd, emm, eyyyy, panel, userAcc)
{
    userAcc = encodeURIComponent(userAcc);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var Date = sdd + '-' + smm + '-' + syyyy;
    if (panel == 'ALL FIRM') {
        xmlhttp.open("POST", "include/php/omalacdt.php?accId=" + accId + "&acntName=" + userAccount + "&firmId=" + firmId + "&Date=" + Date + "&sdd=" + sdd + "&smm=" + smm + "&syyyy=" + syyyy + "&edd=" + edd + "&emm=" + emm + "&eyyyy=" + eyyyy + "&userAccount=" + userAcc, true); //change while passing values of date @AUTHOR: SANDY20AUG13
    } else {
        xmlhttp.open("POST", "include/php/omacacdt.php?accId=" + accId + "&userAccount= " + userAccount + "&firmId=" + firmId + "&Date=" + Date + "&sdd=" + sdd + "&smm=" + smm +
                "&syyyy=" + syyyy + "&edd=" + edd + "&emm=" + emm + "&eyyyy=" + eyyyy + "&panel=" + panel, true); //change while passing values of date @AUTHOR: SANDY20AUG13
    }
    xmlhttp.send();
}
/*********************End code to add panel @Author:PRIYA03APR14*********************/
/****End to change function @AUTHOR: SANDY16JAN14**************************/
/****End to change function @AUTHOR: SANDY18JAN14**************************/
/**end code to show account details as per date @AUTHOR: SANDY20AUG13 **/
/** Start to add function to implement paging in In transaction panel @AUTHOR: SANDY20AUG13 **/
function navigationTransactionPanel(pageNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "visible";
            document.barcode_search.barcode_text.focus();
            document.getElementById("transactionListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
        }
    };

    xmlhttp.open("POST", "include/php/omttlisd.php?page=" + pageNo, true);
    xmlhttp.send();
}
/** End to add function to implement paging in In transaction panel @AUTHOR: SANDY20AUG13 **/

/**********Start of changes in function @AUTHOR: SANDY19SEP13 *************/
/**Start to add function to delete repair item @AUTHOR: SANDY26AUG13**/
function deleteRepairItem(preId, postId, custId, panel) {

    confirm_box = confirm(deleteAlertMess + "\n\nDo you really want to delete this Item?");
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
        xmlhttp.open("GET", "include/php/ogrpdelt.php?newItemPreId=" + preId + "&newItemPostId=" + postId + "&custId=" + custId + "&panelName=" + panel, true);
        xmlhttp.send();
    }

}
/**End to add function to delete repair item @AUTHOR: SANDY26AUG13**/
/**********End of changes in function @AUTHOR: SANDY19SEP13 *************/
/**************Start Code To Add or Update In Indicator Table ************************/
function addUpdateOMIndicator(indName, indVal, option)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //document.getElementById("selFirstMonthInt").innerHTML = xmlhttp.responseText;
            //alert(xmlhttp.responseText);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ommpindc.php?indicname=" + indName + "&indicval=" + indVal + "&indicfun=" + option, true);
    xmlhttp.send();

}
/**************End Code To Change FileName @Author:PRIYA20JUL13************************/
function showTransactionGstDetails(transId, preVch, firmVch, postVch, prodCount)
{
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
    xmlhttp.open("POST", "include/php/omDailyTransPaymentUpdate.php?transId=" + transId + "&preVch=" + preVch + "&firmVch=" + firmVch + "&postVch=" + postVch + "&prodCount=" + prodCount, true);
    xmlhttp.send();
}
//
// Added Function For Daily Rates Delete @PRIYANKA-01AUG2019
function deleteDailyRates(panelName, rateId) {
    if (panelName == 'deleteAllMetalRates' && rateId == 'allRates') {
        confirm_box = confirm(deleteAlertMess + "\n\nDo you really want to Permanent Delete All Metal Rates ?");
    } else {
        confirm_box = confirm(deleteAlertMess + "\n\nDo you really want to Permanent Delete this Rate Details ?");
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
        xmlhttp.open("POST", "include/php/ommrmdel.php?metalId=" + rateId, true);
        xmlhttp.send();
    }

}
//
//
function getPurchaseList() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("ledgerBook").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("GET", "include/php/ompurldgrlist.php", true);
    xmlhttp.send();
}
//
//