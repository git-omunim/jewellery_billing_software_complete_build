//var timeout;
//emNavigation
if (typeof (default_theme) == 'undefined' || (default_theme == null)) {
    var default_theme = '';
}
//

function wa_instance_create(owner_id) {
    loadXMLDoc();
    //
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("whatsappApiPanel").innerHTML = xmlhttp.responseText;
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var data = 'apiCall=yes&request_type=createInstance';
    xmlhttp.open('POST', 'include/php/omwhatsapppanel.php?owner_id=' + owner_id);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(data);
}
//
function wa_instance_restart() {
    loadXMLDoc();
    //
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var ResponseData2 = xmlhttp.responseText;
            alert("Status: " + ResponseData2);
        }
    };
    var data = 'request_type=restartInstance';
    xmlhttp.open('POST', 'include/php/omwpapi.php');
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(data);
}
//ADDED CODE FOR LOCATION @AUTHOR:@Pratiksha-20-01-2025
function showAllActiveReleseLoansDepositPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omallndrp" + default_theme + ".php", true);
    xmlhttp.send();
}
//End CODE FOR LOCATION @AUTHOR:@Pratiksha-20-01-2025
//
function wa_instance_terminate() {
    loadXMLDoc();
    //
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("whatsappApiPanel").innerHTML = xmlhttp.responseText;
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var data = 'apiCall=yes&request_type=terminateInstance';
    xmlhttp.open('POST', 'include/php/omwhatsapppanel.php');
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(data);
}
//
function wa_qrcode_generate() {
    loadXMLDoc2();
    //
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState === 4 && xmlhttp2.status === 200) {
            //var ResponseData3 = xmlhttp2.responseText;
            //alert("Status: " + ResponseData3);
            document.getElementById("qrcode_image").src = xmlhttp2.responseText;
        }
    };
    var data = 'request_type=generateQrCode';
    xmlhttp2.open('POST', 'include/php/omwpapi.php');
    xmlhttp2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp2.send(data);
}
//
function wa_api_send_message(mobileNum, message, imageUrl, pdfUrl) {
    loadXMLDoc();
    //
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            //
            //alert(xmlhttp.responseText);
            if (xmlhttp.responseText == 'success') {
                document.getElementById("wa_api_send_message_btn").style.color = "#229954";
                document.getElementById("wa_api_send_message_btn").style.background = "#D8F6D8";
                document.getElementById("wa_api_send_message_btn").style.borderColor = "#86bc86";
                document.getElementById("wa_api_send_message_btn").innerText = "Sent Successfully!";
            } else {
                alert(xmlhttp.responseText);
            }
            //
            setTimeout(function () {
                document.getElementById("wa_api_send_message_btn").style.color = "#0F118A";
                document.getElementById("wa_api_send_message_btn").style.background = "#DCEAFF";
                document.getElementById("wa_api_send_message_btn").style.borderColor = "#7ab0fe";
                document.getElementById("wa_api_send_message_btn").innerText = "Send Test Message";
                document.getElementById("wa_api_send_message_btn").disabled = false;
            }, 1000);
        } else {
            document.getElementById("wa_api_send_message_btn").disabled = true;
            document.getElementById("wa_api_send_message_btn").innerText = "Sending...";
        }
    };
    var data = "request_type=sendMessage" +
            "&mobile_num=" + mobileNum +
            "&message=" + message +
            "&imageUrl=" + imageUrl +
            "&pdfUrl=" + pdfUrl;

    xmlhttp.open('POST', 'include/php/omwpapi.php');
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(data);
}

//
function sendWhatsappApiPdfFile(mobileNum, message, imageUrl, pdfUrl) {
    loadXMLDoc();
    //
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            //document.getElementById("qrcode_image").src = xmlhttp.responseText;
            //alert(xmlhttp.responseText);
        }
    };
    var data = "request_type=sendMessage" +
            "&mobile_num=" + mobileNum +
            "&message=" + message +
            "&imageUrl=" + imageUrl +
            "&pdfUrl=" + pdfUrl;
    //
    xmlhttp.open('POST', 'include/php/omwpapi.php');
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(data);
}
//           

function navigation(divPanel) {
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
    xmlhttp.open("POST", "include/php/omppmsdv" + default_theme + ".php?divPanel=" + divPanel, true);
    xmlhttp.send();
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
                document.getElementById("ajax_loading_lg_div").style.visibility = "hidden";
                //document.barcode_search.barcode_text.focus();
                document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("ajax_loading_lg_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmsdv" + default_theme + ".php?divPanel=" + divPanel, true);
        xmlhttp.send();
    }
}
function navigationHomePage(divPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST",
            "include/php/omppmsdv" + default_theme + ".php?divPanel="
            + divPanel, true);
    xmlhttp.send();
}

function navigationHomePageImage(divPanel, imageName, imageContent) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(divPanel).innerHTML = "<img src='images/" + imageName + "' title='" + imageContent + "' />";
            document.barcode_search.barcode_text.focus();
            document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById(divPanel).innerHTML = "<img src='images/loading16.gif' />";
        }
    };
    xmlhttp.open("POST",
            "include/php/omppmsdv" + default_theme + ".php?divPanel="
            + divPanel, true);
    xmlhttp.send();
}

function navigationMainMiddle(divPanel, divPanelContent) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(divPanel).innerHTML = divPanelContent;
            document.barcode_search.barcode_text.focus();
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById(divPanel).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST",
            "include/php/omppmmdv" + default_theme + ".php?divMainMiddlePanel="
            + divPanel, true);
    xmlhttp.send();
}
function navigationMainMiddleImage(divPanelPath, divPanel, imageName, imageContent) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(divPanel).innerHTML = "<img src='images/" + imageName + "' title='" + imageContent + "' />";
            document.barcode_search.barcode_text.focus();
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById(divPanel).innerHTML = "<img src='images/loading16.gif' />";
        }
    };
    xmlhttp.open("POST",
            "include/php/omppmmdv" + default_theme + ".php?divMainMiddlePanel="
            + divPanelPath, true);
    xmlhttp.send();
}
/************Start Code To Hide Func @Author:PRIYA23JUL13************/
/*function navigationMainBigMiddle(divPanel) {
 loadXMLDoc();
 xmlhttp.onreadystatechange = function() {
 if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
 document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
 document.barcode_search.barcode_text.focus();
 document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
 } else {
 document.getElementById("main_ajax_loading_div").style.visibility = "visible";
 }
 };
 xmlhttp.open("POST", "include/php/omppsbdv" + default_theme +".php?divPanel=" + divPanel, true);
 xmlhttp.send();
 }*/
/************End Code To Hide Func @Author:PRIYA23JUL13************/
//amol
function navigationMainBigMiddleImage(divPanel, imageName, imageContent, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (divPanel != 'stock') {
                document.getElementById(divPanel).innerHTML = "<img src='images/" + imageName + "' title='" + imageContent + "' /> " + panelName;
            }
            document.barcode_search.barcode_text.focus();
            if (divPanel == 'stock') {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
            checkPlaceHolder();
            //Start code to add a function to change the stock option @AUTHOR:SHE04MAY16
//            if (divPanel == 'stockPanel') {
//                var containerElement = document.getElementById('main_full_body');
//                var overlayEle = document.getElementById('overlay');
//                overlayEle.style.display = 'block';
//                containerElement.setAttribute('class', 'blur');
//
//                changeStockOpt();
//            }
//            
            //End code to add function to change the stock option @AUTHOR:SHE04MAY16

        } else {
            if (divPanel != 'stock') {
                document.getElementById(divPanel).innerHTML = "<img src='images/loading16.gif' />";
            }
        }
    };
    if (divPanel == 'stock') {
        xmlhttp.open("POST", "include/php/ogwgstlt" + default_theme + ".php?divPanel=" + divPanel, true);
    } else {
//        alert(divPanel);
        xmlhttp.open("POST", "include/php/omppsbdv" + default_theme + ".php?divPanel=" + divPanel, true);
    }

    xmlhttp.send();
}
function navigationMainBigMiddleImageMouseOver(divPanel, imageName, imageNameOver, imageContent) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //This change done by CHETAN 31MAY2022
            if (default_theme == "")
            {
                document.getElementById(divPanel).innerHTML = "<img src='images/img/" + imageName + "' title='" + imageContent + "' onmouseover=\"this.src='images/img/" + imageNameOver + "';\" onmouseout=\"this.src='images/img/" + imageName + "';\" />";
            } else
            {
                document.getElementById(divPanel).innerHTML = "<img src='/2/assets_wow/images/icon/" + imageName + "' title='" + imageContent + "' onmouseout=\"this.src='/2/assets_wow/images/icon/" + imageName + "';\" />";
            }
            document.barcode_search.barcode_text.focus();
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById(divPanel).innerHTML = "<img src='images/loading16.gif' />";
        }
    };
    xmlhttp.open("POST",
            "include/php/omppsbdv" + default_theme + ".php?divPanel="
            + divPanel, true);
    xmlhttp.send();
}
function navigationHeaderMetalRates(divPanel, divPanelContent) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(divPanel).innerHTML = "<img src='images/" + divPanelContent + ".png' />";
            document.barcode_search.barcode_text.focus();
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById(divPanel).innerHTML = "<img src='images/loading16.gif' />";
        }
    };
    xmlhttp.open("POST",
            "include/php/omppmmdv" + default_theme + ".php?divMainMiddlePanel="
            + divPanel, true);
    xmlhttp.send();
}
function navigationPubFirms(pageNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("pubFirmDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omffrpbf" + default_theme + ".php?page=" + pageNo, true);
    xmlhttp.send();
}
function navigationPerFirms(pageNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("perFirmDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omffrtpf" + default_theme + ".php?page=" + pageNo, true);
    xmlhttp.send();
}
function navigationAllFirms(pageNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("selectFirmDiv").innerHTML = xmlhttp.responseText;
            //document.getElementById("nextPrevFirmDiv").innerHTML = document.getElementById("nextPrevFirmDiv").innerHTML;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omffrafr" + default_theme + ".php?page=" + pageNo, true);
    xmlhttp.send();
}

//**************************** Navigate Customer *******************************************************************
function navigationCust(pageNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("customerListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcccslt" + default_theme + ".php?page=" + pageNo, true);
    xmlhttp.send();
}
/***********Start code to change func @Author:PRIYA08APR14**********************/
function navigationComment(pageNo, custId, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'commDispPanel') {
                document.getElementById("commDisplayDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("customerCommentsDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'commDispPanel') {
        xmlhttp.open("POST", "include/php/omcommlt" + default_theme + ".php?page=" + pageNo + "&custId=" + custId, true);
    } else {
        xmlhttp.open("POST", "include/php/omcdccdv" + default_theme + ".php?page=" + pageNo + "&custId=" + custId, true);
    }

    xmlhttp.send();
}
/***********End code to change func @Author:PRIYA08APR14**********************/
//**************************** Navigate Girvi *******************************************************************
function navigationGirvi(pageNo, custId) {
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
    xmlhttp.open("POST", "include/php/olggcgdt" + default_theme + ".php?page=" + pageNo + "&custId=" + custId, true); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
//**************************** Navigate Girvi Receipt Panel *******************************************************************
function navigationGirviReceipt(pageNo, custId) {
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
    xmlhttp.open("POST", "include/php/olggsumm" + default_theme + ".php?page=" + pageNo + "&custId=" + custId, true); //change in filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
//**************************** Navigate Girvi Panel *******************************************************************
function navigationGirviPanel(pageNo) {
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
    xmlhttp.open("POST", "include/php/orgpglpd" + default_theme + ".php?page=" + pageNo, true);
    xmlhttp.send();
}
//**************************** Start Navigate Girvi Panel By Firm Id @AUTHOR : PRIYA27JAN13 *******************************************************************
//**********code Modified by @Author: LINA4JUN2013***********************
//*********code modified for search option by @AUTHOR: LINA27JUN2013 *****
function navigationGirviPanelByFirmId(pageNo, selFirmId, sortKeyword, rowsPerPage, searchColumn, searchValue) {
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
    xmlhttp.open("POST", "include/php/orgpglpd" + default_theme + ".php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&rowsPerPage=" + rowsPerPage + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue, true);
    xmlhttp.send();
}
//**************************** End Navigate Girvi Panel By Firm Id @AUTHOR : PRIYA27JAN13 *******************************************************************
//**************************** Navigate Girvi Ledger Details Panel *******************************************************************
/****Start to change function @AUTHOR: SANDY05FEB14******/
function navigationGirviLedgerDetailsPanel(pageNo, startDate, endDate, selFirmId, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadNextGirviLedgerDetailsList").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextGirviLedgerDetailsButt").style.visibility = "visible";
            //document.barcode_search.barcode_text.focus();
            if (panel == 'ledgerInfoDet') {
                document.getElementById("ledgerDetDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("girviLedgerDetailsDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("ajaxLoadNextGirviLedgerDetailsList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextGirviLedgerDetailsButt").style.visibility = "hidden";
        }
    };
    if (panel == 'ledgerInfoDet') {
        xmlhttp.open("POST", "include/php/ommlgdet" + default_theme + ".php?page=" + pageNo + "&girviLedgerDetStartDate=" + startDate + "&girviLedgerDetEndDate=" + endDate + "&firmId=" + selFirmId, true);
    } else {
        xmlhttp.open("POST", "include/php/ombbgldd" + default_theme + ".php?page=" + pageNo + "&girviLedgerDetStartDate=" + startDate + "&girviLedgerDetEndDate=" + endDate + "&firmId=" + selFirmId, true);
    }
    xmlhttp.send();
}
/****End to change function @AUTHOR: SANDY05FEB14******/
//**************************** Navigate Girvi Expiry Panel *******************************************************************
//*********code modified for search option by @AUTHOR: LINA27JUN2013 *****
function navigationGirviExpPanel(pageNo, expMonths, selFirmId, sortKeyword, rowsPerPage, searchColumn, searchValue) {
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
    xmlhttp.open("POST", "include/php/orgpexgl" + default_theme + ".php?page=" + pageNo + "&expMonths=" + expMonths + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&rowsPerPage=" + rowsPerPage + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue, true);
    xmlhttp.send();
}
//**************************** Navigate to Add Gold Stock Div *******************************************************************
function navigateAddGoldStockDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("goldStockDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omAddGoldStockDiv" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Navigate Gold Items *******************************************************************
function navigationGoldItems(pageNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("goldStockDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omGoldStockDiv" + default_theme + ".php?page=" + pageNo, true);
    xmlhttp.send();
}

//**************************** Get Gold Item Details *******************************************************************
function getGoldItemDetails(gItemId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("goldStockDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omGoldStockDetailsDiv" + default_theme + ".php?gItemId=" + gItemId, true);
    xmlhttp.send();
}
//**************************** Navigate Udhaar Panel *******************************************************************
//*************Start code to change div @Author:PRIYA04JUN14******************/
function navigationUdhaarPanel(pageNo, rowsPerPage, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadNextUdhaarPanelList").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextUdhaarPanelListButt").style.visibility = "visible";
            document.barcode_search.barcode_text.focus();
            document.getElementById("udhaarDetPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadNextUdhaarPanelList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextUdhaarPanelListButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/omuupnal" + default_theme + ".php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&udhaarUpdateRows=UdhaarUpdateRows" + "&panelName=" + panel, true);
    xmlhttp.send();
}
//*************End code to change div @Author:PRIYA04JUN14******************/
//**************************** Navigate All Udhaar Panel *******************************************************************
//*************Start code to change div @Author:PRIYA04JUN14******************/
function navigationAllUdhaarListPanel(pageNo, rowsPerPage, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadNextAllUdhaarPanelList").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextAllUdhaarPanelListButt").style.visibility = "visible";
            document.barcode_search.barcode_text.focus();
            document.getElementById("allUdhaarListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadNextAllUdhaarPanelList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextAllUdhaarPanelListButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/omuualud" + default_theme + ".php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&udhaarUpdateRows=UdhaarUpdateRows" + "&panelName=" + panel, true);
    xmlhttp.send();
}
//*************End code to change div @Author:PRIYA04JUN14******************/
//**************************** Navigate All Deposit Udhaar Panel *******************************************************************
function navigationAllDepUdhaarPanel(pageNo, rowsPerPage, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadNextAllDepUdhaarPanelList").style.visibility = "hidden";
            document.getElementById("ajaxLoadNextAllDepUdhaarPanelListButt").style.visibility = "visible";
            document.barcode_search.barcode_text.focus();
            document.getElementById("allUdhaarDepListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadNextAllDepUdhaarPanelList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextAllDepUdhaarPanelListButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/omuualdp" + default_theme + ".php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&udhaarUpdateRows=UdhaarUpdateRows" + "&panelName=" + panel, true);
    xmlhttp.send();
}
//**************************** Navigate City Panel *******************************************************************
function navigateCityPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omvvaacd" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Navigate Country Panel *******************************************************************
function navigateCountryPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omvcaacd" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Navigate State Panel *******************************************************************
function navigateStatePanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omvsaasd" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Navigate ROI Panel *******************************************************************
function navigateROIPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olguroid" + default_theme + ".php", true); //change in filename @AUTHOR: SANDY13DEC13
    xmlhttp.send();
}
//**************************** Navigate Item Name Panel *******************************************************************
function navigateItemNamePanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omiaaind" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Navigate Item Tunch Panel *******************************************************************
function navigateItemTunchPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omiaaitd" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Navigate Metal Rates Panel *******************************************************************
function navigateMetalRatePanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ommramrd" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Navigate Cities *******************************************************************
function navigateCities(pageNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("citiesListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omvvctlt" + default_theme + ".php?page=" + pageNo, true);
    xmlhttp.send();
}
//
//**************************** Navigate Villages *******************************************************************

function navigateVillages(pageNo) {
    //alert("hi");
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("citiesListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omvvctlt" + default_theme + ".php?pagev=" + pageNo, true);
    xmlhttp.send();
}
//**************************** Navigate Countries *******************************************************************
function navigateCountries(pageNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("countriesListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omvccolt" + default_theme + ".php?page=" + pageNo, true);
    xmlhttp.send();
}
//**************************** Navigate States *******************************************************************
function navigateStates(pageNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("statesListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omvsstlt" + default_theme + ".php?page=" + pageNo, true);
    xmlhttp.send();
}
//**************************** Navigate Gold Item Names *******************************************************************
//****************************Start Code To Add Div @Author:PRIYA16AUG13*****************************/
//****************************Start Code To Add Div and condition for crystal rate panel @Author:SHE31MAR15*****************************/
// add condition Author: GAUR12AUG16
// update condition Author: GAUR12SEP16
function navigateGoldItemNames(pageNo, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            if (panelName == 'goldMetRateList') {
                document.getElementById("metalRateGoldListDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'CrystalRateList') {
                document.getElementById("crystalRateListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("itemNamesGoldListDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'goldMetRateList') {
        xmlhttp.open("POST", "include/php/ommrgmgl" + default_theme + ".php?page=" + pageNo, true);
    } else if (panelName == 'CrystalRateList') {
        xmlhttp.open("POST", "include/php/omcrrtlt" + default_theme + ".php?page=" + pageNo, true);
    } else if (panelName == 'scheme') {
        xmlhttp.open("POST", "include/php/omslingl" + default_theme + ".php?page=" + pageNo, true);
    } else if (panelName == 'ItmCode') {
        xmlhttp.open("POST", "include/php/omiclingl" + default_theme + ".php?page=" + pageNo, true);
    } else {
        xmlhttp.open("POST", "include/php/omilingl" + default_theme + ".php?page=" + pageNo, true);
    }
    xmlhttp.send();
}
// update condition Author: GAUR12SEP16
// add condition Author: GAUR12AUG16
//****************************End Code To Add Div and condition for crystal rate panel @Author:SHE31MAR15*****************************/
//**************************** Navigate Silver Item Names *******************************************************************
//****************************Start Code To Add Div @Author:PRIYA16AUG13*****************************/
function navigateSilverItemNames(pageNo, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            if (panelName == 'silverMetRateList') {
                document.getElementById("metalRateSilverListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("itemNamesSilverListDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'silverMetRateList') {
        xmlhttp.open("POST", "include/php/ommrgmsl" + default_theme + ".php?page=" + pageNo, true);
    } else {
        xmlhttp.open("POST", "include/php/omilinsl" + default_theme + ".php?page=" + pageNo, true);
    }
    xmlhttp.send();
}
//****************************End Code To Add Div @Author:PRIYA16AUG13*****************************/
//**************************** Navigate Other Item Names ******************************************
function navigateOtherItemNames(pageNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemNamesOtherListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omilinol" + default_theme + ".php?page=" + pageNo, true);
    xmlhttp.send();
}
//**************************** Navigate Item Gold Tunch *******************************************************************
function navigateTunchGoldList(pageNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemTunchGoldListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omilitgl" + default_theme + ".php?page=" + pageNo, true);
    xmlhttp.send();
}
//**************************** Navigate Item Silver Tunch *******************************************************************
function navigateTunchSilverList(pageNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemTunchSilverListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omilitsl" + default_theme + ".php?page=" + pageNo, true);
    xmlhttp.send();
}


//**************************** Search Customer *******************************************************************
function valSearchCustNameOrMobNoInputs(obj) {
    if (document.getElementById("custNameOrMobNo").value == "Enter Customer Name / Mobile Number") {
        alert("Please enter Customer Name / Mobile Number!");
        document.getElementById("custNameOrMobNo").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("custNameOrMobNo").value, "Please enter Customer Name / Mobile Number!") == false) {
        document.getElementById("custNameOrMobNo").focus();
        return false;
    }
    return true;
}

function search_cust_name_mobno(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCustNameOrMobNo;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchCustNameOrMobNo() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("custNameOrMobNoDiv").style.visibility = "visible";
        document.getElementById("ajaxCustSearchDiv").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        refreshMainRightDiv();
    } else {
        document.getElementById("custNameOrMobNoDiv").style.visibility = "hidden";
        document.getElementById("ajaxCustSearchDiv").style.visibility = "visible";
    }
}
function searchCustByNameOrMobNo(obj) {
    document.getElementById("custNameOrMobNoDiv").style.visibility = "hidden";
    document.getElementById("ajaxCustSearchDiv").style.visibility = "visible";
    if (valSearchCustNameOrMobNoInputs(obj)) {

        var poststr = "";
        // 
        if (hasHindiCharacters(document.getElementById("custNameOrMobNo").value) == true) {
            poststr = "custName=" + encodeURIComponent(document.getElementById("custNameOrMobNo").value);
            search_cust_name_mobno('include/php/omccsrcl' + default_theme + '.php', poststr);
        }

        if (validateNumWithOutAlert(document.getElementById("custNameOrMobNo").value) == true) {
            poststr = "custMobileNo=" + encodeURIComponent(document.getElementById("custNameOrMobNo").value);
            search_cust_name_mobno('include/php/omccscml' + default_theme + '.php', poststr);
        }

        if (validateAlphaWithSpaceWithOutAlert(document.getElementById("custNameOrMobNo").value) == true) {
            poststr = "custName=" + encodeURIComponent(document.getElementById("custNameOrMobNo").value);
            search_cust_name_mobno('include/php/omccsrcl' + default_theme + '.php', poststr);
        }
    } else {
        document.getElementById("custNameOrMobNoDiv").style.visibility = "visible";
        document.getElementById("ajaxCustSearchDiv").style.visibility = "hidden";
    }
}
//**************************** Navigate Search Customer *******************************************************************
function navigationSrchCust(pageNo, custName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omccscls" + default_theme + ".php?page=" + pageNo + "&custName=" + custName, true);
    xmlhttp.send();
}
//**************************** Navigate Search Customer To Add New Girvi *******************************************************************
/*************Start Code To Add Var custMobile and custFirmId @Author:PRIYA27AUG13*********************/
function navigationSrchCustToAddGirvi(pageNo, custFName, custLName, custFatherOrSpouseName, custCity, custMobile, custFirmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadNavSrchCustToAddGirviButtDiv").style.visibility = "visible";
            document.getElementById("ajaxLoadShowSearchGirviDiv").style.visibility = "hidden";
            document.getElementById("custListForAddGirviDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadNavSrchCustToAddGirviButtDiv").style.visibility = "hidden";
            document.getElementById("ajaxLoadShowSearchGirviDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omccscag" + default_theme + ".php?page=" + pageNo + "&custFName=" + custFName + "&custLName=" + custLName + "&custFatherOrSpouseName=" + custFatherOrSpouseName + "&custCity=" + custCity + "&custMobNo=" + custMobile + "&custFirmId=" + custFirmId, true);
    xmlhttp.send();
}
/*************End Code To Add Var custMobile and custFirmId @Author:PRIYA27AUG13*********************/
//**************************** Search Customer By Mobile Number ****************************************************
function valSearchCustByCityInputs(obj) {
    if (validateSelectField(document.getElementById("searchCity").value, "Please select customer city or village!") == false) {
        document.getElementById("searchCity").focus();
        return false;
    }
    return true;
}

function search_cust_city(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCustByCity;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchCustByCity() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("custSearchCityDiv").style.visibility = "visible";
        document.getElementById("ajaxCustSearchDiv").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        refreshMainRightDiv();
    } else {
        document.getElementById("custSearchCityDiv").style.visibility = "hidden";
        document.getElementById("ajaxCustSearchDiv").style.visibility = "visible";
    }
}
function searchCustByCity(obj) {
    document.getElementById("custSearchCityDiv").style.visibility = "hidden";
    document.getElementById("ajaxCustSearchDiv").style.visibility = "visible";
    if (valSearchCustByCityInputs(obj)) {

        var poststr = "custCity=" + encodeURIComponent(document.getElementById("searchCity").value);
        search_cust_city('include/php/omccsccl' + default_theme + '.php', poststr);
    } else {
        document.getElementById("custSearchCityDiv").style.visibility = "visible";
        document.getElementById("ajaxCustSearchDiv").style.visibility = "hidden";
    }
}
//**************************** Search Banner Girvi By Amount *************************************
function valSearchBannerGirviByAmountInputs(obj) {

    var gPrinAmtOrSerialNo = document.search_girvi_by_prinAmt.searchGirviPrinAmt.value;
    var checkSerialNo = gPrinAmtOrSerialNo.substr(0, 1);
    if (document.search_girvi_by_prinAmt.searchGirviPrinAmt.value == "Principal Amount / Serial No. (s1234)") {
        alert("Please Enter Girvi Principal Amount Or Girvi Serial Number!");
        document.search_girvi_by_prinAmt.searchGirviPrinAmt.focus();
        return false;
    } else if (checkSerialNo == 's' || checkSerialNo == 'S') {
        var serialNo = gPrinAmtOrSerialNo.slice(1);
        if (validateEmptyField(serialNo, "Please Enter Girvi Serial Number!") == false ||
                validateAlphaNum(serialNo, "Accept only Numbers without space character!") == false) {
            document.search_girvi_by_prinAmt.searchGirviPrinAmt.focus();
            return false;
        }
    } else if (validateEmptyField(document.search_girvi_by_prinAmt.searchGirviPrinAmt.value, "Please enter girvi principal amount!") == false ||
            validateNum(document.search_girvi_by_prinAmt.searchGirviPrinAmt.value, "Accept only Numbers without space character!") == false) {
        document.search_girvi_by_prinAmt.searchGirviPrinAmt.focus();
        return false;
    }
    return true;
}

function search_banner_girvi_by_amount(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchBannerGirviByPrincipalAmt;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchBannerGirviByPrincipalAmt() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("searchBannerGirviPrincipalAmtDiv").style.visibility = "visible";
        document.getElementById("ajaxCustSearchDiv").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        //refreshMainRightDiv();
    } else {
        document.getElementById("searchBannerGirviPrincipalAmtDiv").style.visibility = "hidden";
        document.getElementById("ajaxCustSearchDiv").style.visibility = "visible";
    }
}
function searchBannerGirviByPrincipalAmt(obj) {
    document.getElementById("searchBannerGirviPrincipalAmtDiv").style.visibility = "hidden";
    document.getElementById("ajaxCustSearchDiv").style.visibility = "visible";
    var gPrinAmtOrSerialNo = document.search_girvi_by_prinAmt.searchGirviPrinAmt.value;
    var checkSerialNo = gPrinAmtOrSerialNo.substr(0, 1);
    var poststr;
    if (valSearchBannerGirviByAmountInputs(obj)) {
        if (checkSerialNo == 's' || checkSerialNo == 'S') {

            var serialNo = gPrinAmtOrSerialNo.slice(1);
            poststr = "grvSerialNo=" + encodeURIComponent(serialNo);
            search_banner_girvi_by_amount('include/php/olgssndv' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY21NOV13
        } else {
            poststr = "grvFixedAmt=" + encodeURIComponent(document.search_girvi_by_prinAmt.searchGirviPrinAmt.value);
            search_banner_girvi_by_amount('include/php/olgsfxad' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY21NOV13
        }
    } else {
        document.getElementById("searchBannerGirviPrincipalAmtDiv").style.visibility = "visible";
        document.getElementById("ajaxCustSearchDiv").style.visibility = "hidden";
    }
}
//********************* Search Girvi By Serial Number *****************
function searchGirviBySerialNo(serialNo) {

    poststr = "grvSerialNo=" + encodeURIComponent(serialNo);
    search_banner_girvi_by_amount('include/php/olgssndv' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY21NOV13
}
//********************* Search Girvi By Serial Number *****************
function search_girvi_by_girviId(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchGirviByGirviId;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchGirviByGirviId() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        //refreshMainRightDiv();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function searchGirviByGirviId(girviId) {
//button.style.visibility = "hidden";

//alert(girviId);
    poststr = "girviId=" + encodeURIComponent(girviId);
    search_girvi_by_girviId('include/php/olgsgidd' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY22NOV13
}
function showGirviReceiptByGirviId(girviId) {

//button.style.visibility = "hidden";

    poststr = "girviId=" + encodeURIComponent(girviId);
    search_girvi_by_girviId('include/php/olgsgiwd' + default_theme + '.php?getGirviReceipt=YES', poststr); //change in filename @AUTHOR: SANDY20NOV13
}
//********************* Search Girvi By Serial Number in Cust Home Panel *****************
function search_girvi_by_girviId_cust_home(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchGirviByGirviIdInCustHome;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchGirviByGirviIdInCustHome() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadGirviDetailsCustHomeDiv").style.visibility = "hidden";
        parent.document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadGirviDetailsCustHomeDiv").style.visibility = "visible";
    }
}
function searchGirviByGirviIdInCustHome(girviId, documentRootPath, panel = '') {

    poststr = "girviId=" + encodeURIComponent(girviId) + '&panelFName=' + panel;
    search_girvi_by_girviId_cust_home(documentRootPath + "/include/php/olgsgiwd" + default_theme + ".php", poststr); //change in filename @AUTHOR: SANDY20NOV13
}
function searchGirviReceiptByGirviIdInCustHome(girviId, documentRootPath) {

    poststr = "girviId=" + encodeURIComponent(girviId);
    search_girvi_by_girviId_cust_home(documentRootPath + "/include/php/olgsgiwd" + default_theme + ".php?getGirviReceipt=YES", poststr); //change in filename @AUTHOR: SANDY20NOV13
}
//**************************** Refresh Main Right Main Div *****************************
function refreshMainRightDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadRightMenuDiv").style.visibility = "hidden";
            document.getElementById("mainRightDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadRightMenuDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ompprmdv" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Search Banner Girvi By Date **********************************************
function valSearchBannerGirviByDateInputs(obj) {
    if (validateSelectField(document.search_banner_girvi_by_date.dayDD.value, "Please select Day in Date!") == false) {
        document.search_banner_girvi_by_date.dayDD.focus();
        return false;
    } else if (validateSelectField(document.search_banner_girvi_by_date.monthMonth.value, "Please select Month in Date!") == false) {
        document.search_banner_girvi_by_date.monthMonth.focus();
        return false;
    } else if (validateSelectField(document.search_banner_girvi_by_date.yearYYYY.value, "Please select Year in Date!") == false) {
        document.search_banner_girvi_by_date.yearYYYY.focus();
        return false;
    }
    return true;
}

function search_banner_girvi_by_date(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchBannerGirviByDate;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchBannerGirviByDate() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("searchBannerGirviDateDiv").style.visibility = "visible";
        document.getElementById("ajaxCustSearchDiv").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("searchBannerGirviDateDiv").style.visibility = "hidden";
        document.getElementById("ajaxCustSearchDiv").style.visibility = "visible";
    }
}
function searchBannerGirviByDate(obj, noOfRows) {

    document.getElementById("searchBannerGirviDateDiv").style.visibility = "hidden";
    document.getElementById("ajaxCustSearchDiv").style.visibility = "visible";
    if (valSearchBannerGirviByDateInputs(obj)) {
        var poststr = "dayDD=" + encodeURIComponent(document.search_banner_girvi_by_date.dayDD.value)
                + "&monthMonth=" + encodeURIComponent(document.search_banner_girvi_by_date.monthMonth.value)
                + "&yearYYYY=" + encodeURIComponent(document.search_banner_girvi_by_date.yearYYYY.value)
                + "&noOfRows=" + encodeURIComponent(noOfRows);
        search_banner_girvi_by_date('include/php/olgsdatd' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY21NOV13
    } else {
        document.getElementById("searchBannerGirviDateDiv").style.visibility = "visible";
        document.getElementById("ajaxCustSearchDiv").style.visibility = "hidden";
    }
}
//**************************** Navigate Search Customer By Mobile No ************************************************************
function navigationSrchCustByMobileNo(pageNo, custMobileNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omccscbm" + default_theme + ".php?page=" + pageNo + "&custMobileNo=" + custMobileNo, true);
    xmlhttp.send();
}
//**************************** Navigate Search Customer By City ********************************************************
function navigationSrchCustByCity(pageNo, custCity, searchPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omccscbc" + default_theme + ".php?page=" + pageNo + "&custSearchVar=" + custCity + "&searchPanel=" + searchPanel, true);
    xmlhttp.send();
}
//**************************** Navigate Released Girvi *******************************************************************
/********Start code to add panelDivName for Auction @Author:ANUJA14MAR15**************/
function navigationReleasedGirvi(pageNo, custId, panelDivName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olgrgrdt" + default_theme + ".php?page=" + pageNo + "&custId=" + custId + "&panelDivName=" + panelDivName, true); //change in filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
/********End code to add panelDivName for Auction @Author:ANUJA14MAR15**************/
//********************* Show Add More Principal Div ****************************
/********Start code to add var girviSerialNum @Author:PRIYA12APR14**************/
/********Start code to add acc ids @Author:PRIYA30MAY14**************/
function showAddMorePrincipalDiv(custId, girviId, girviFirmId, ROI, girviSerialNum, girviCrAccId, girviDrAccId, loanDateOpt, $statusOTP = 'OTP') {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "hidden";
            document.getElementById("ajaxCloseAddMorePrincipal").style.visibility = "visible";
            document.getElementById("addMorePrincipalDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("principalAmount").focus();
        } else {
            document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olgaampd" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId + "&girviFirmId=" +
            girviFirmId + "&ROI=" + ROI + "&girviSerialNum=" + girviSerialNum + "&girviCrAccId=" + girviCrAccId + "&girviDrAccId=" + girviDrAccId + "&OTPStatus=" + $statusOTP, true); //change in filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
/********End code to add acc ids @Author:PRIYA30MAY14**************/
/********End code to add var girviSerialNum @Author:PRIYA12APR14**************/
//********************* Close Add More Principal Div ****************************
function closeAddMorePrincipalDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            clearInterval(myInterval);
            document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "hidden";
            document.getElementById("ajaxCloseAddMorePrincipal").style.visibility = "hidden";
            document.getElementById("addMorePrincipalDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//********************* Close Banner Search Panel Div ****************************
function closeBannerSearchPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("main_banner_panel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//********************* Show Banner Search Panel Div ****************************
function showBannerSearchPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("main_banner_panel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppmbdv" + default_theme + ".php", true);
    xmlhttp.send();
}
//********************* Show Add More Item Div ****************************
/**************Start code to add var @Author:PRIYA14APR14************************/
function showAddMoreItemDiv(custId, girviId, gSerialNo, gFirmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadAddMoreItem").style.visibility = "hidden";
            document.getElementById("ajaxCloseAddMoreItem").style.visibility = "visible";
            document.getElementById("addMoreItemDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadAddMoreItem").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olguitdv" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId + "&gSerialNo=" + gSerialNo + "&gFirmId=" + gFirmId, true); //change in filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
/**************End code to add var @Author:PRIYA14APR14************************/
//********************* close Add More Item Div ****************************
function closeAddMoreItemDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadAddMoreItem").style.visibility = "hidden";
            document.getElementById("ajaxCloseAddMoreItem").style.visibility = "hidden";
            document.getElementById("addMoreItemDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadAddMoreItem").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//********************* Show Deposite Money Div ****************************
/***********Start code to add girviSerialNum girviSerialNum***************/
/***********Start code to add firmId @Author:PRIYA20MAY14***********************/
/***********Start code to add parameter girviHindiDOB @Author:PRIYA23APR15************/
/***********Start code to add parameter dateCompare @Author:PRIYA30APR15************/
/***********Start code to add parameter girviHindiPaksh @OMMODTAG PRIYA_15MAY15************/
function showDepositMoneyDiv(custId, girviId, totalPrincipalAmount, totalInterest, totalFinalInterest, principalAmt, girviDOB, girviType, girviUpdSts, girviSerialNum, firmId,
        girviHindiDOB, dateCompare, girviHindiTithi, girviHindiPaksh, totalFinalIInterest, totalFinalOInterest, perMonthInt, principalPerMonthInt, addPrinMonth, datadetails) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
            document.getElementById("ajaxCloseDepositMoneyDiv").style.visibility = "visible";
            document.getElementById("depositMoneyDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("girviDepositPrinAmount").focus();
        } else {
            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "visible";
        }
    };
    const dataDetails = JSON.parse(datadetails);
    const dataDetailsString = encodeURIComponent(JSON.stringify(dataDetails)); // URL-encoded

    xmlhttp.open("POST", "include/php/olgggmdp" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId + "&totalPrincipalAmount=" + totalPrincipalAmount
            + "&totalInterest=" + totalInterest + "&totalFinalInterest=" + totalFinalInterest + "&principalAmt=" + principalAmt + "&girviDOB=" + girviDOB + "&girviType=" + girviType
            + "&girviStatus=" + girviUpdSts + "&girviSerialNum=" + girviSerialNum + "&firmId=" + firmId + "&girviHindiDOB=" + girviHindiDOB + "&dateCompare=" + dateCompare
            + "&girviHindiTithi=" + girviHindiTithi + "&girviHindiPaksh=" + girviHindiPaksh + "&totalFinalIInterest=" + totalFinalIInterest + "&totalFinalOInterest=" + totalFinalOInterest + "&perMonthInt=" + perMonthInt + "&addPrinMonth=" + addPrinMonth + "&principalPerMonthInt=" + principalPerMonthInt + "&datadetails=" + dataDetailsString, true); //change in filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
function showDepositMoneyDivInt(custId, girviId, totalPrincipalAmount, totalFinalInterest, principalAmt,
        totalPrincipalAmountInt, totalFinalInterestInt, principalAmtInt,
        girviDOB, girviType, girviUpdSts, girviSerialNum, firmId,
        girviHindiDOB, dateCompare, girviHindiTithi, girviHindiPaksh) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
            document.getElementById("ajaxCloseDepositMoneyDiv").style.visibility = "visible";
            document.getElementById("depositMoneyDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("girviDepositPrinAmount").focus();
        } else {
            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olgggmdpint" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId
            + "&totalPrincipalAmount=" + totalPrincipalAmount
            + "&totalFinalInterest=" + totalFinalInterest + "&principalAmt=" + principalAmt
            + "&totalPrincipalAmountInt=" + totalPrincipalAmountInt
            + "&totalFinalInterestInt=" + totalFinalInterestInt + "&principalAmtInt=" + principalAmtInt
            + "&girviDOB=" + girviDOB + "&girviType=" + girviType
            + "&girviStatus=" + girviUpdSts + "&girviSerialNum=" + girviSerialNum + "&firmId=" + firmId
            + "&girviHindiDOB=" + girviHindiDOB + "&dateCompare=" + dateCompare
            + "&girviHindiTithi=" + girviHindiTithi + "&girviHindiPaksh=" + girviHindiPaksh, true); //change in filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
/***********End code to add parameter girviHindiPaksh @OMMODTAG PRIYA_15MAY15************/
/***********End code to add parameter dateCompare @Author:PRIYA30APR15************/
/***********End code to add parameter girviHindiDOB @Author:PRIYA23APR15************/
/***********End code to add firmId @Author:PRIYA20MAY14***********************/
/***********End code to add girviSerialNum girviSerialNum***************/
//********************* Close Deposite Money Div ****************************
function closeDepositMoneyDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
            document.getElementById("ajaxCloseDepositMoneyDiv").style.visibility = "hidden";
            document.getElementById("depositMoneyDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//********************* Show Add New Udhaar Div ****************************
/**********************Start code to add panel @Author:PRIYA11JUN14*****************************/
//*****************************Start code to change moneypanel home page Author:SANT28APR16********************************
function showAddNewUdhaarDiv(custId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addNewUdhaarDiv").innerHTML = xmlhttp.responseText;
            document.getElementById('udhaarMainAmount').focus(); //added @Author:PRIYA09NOV14
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'udhaarWithEMI')
        xmlhttp.open("GET", "include/php/omktdetl" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName, true);
    else
        xmlhttp.open("GET", "include/php/omuanwdt" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName, true);
    xmlhttp.send();
}
//*****************************End code to change moneypanel home page Author:SANT28APR16********************************
/**********************End code to add panel @Author:PRIYA11JUN14*****************************/
//********************* Close Add New Udhaar Div ****************************
function closeAddNewUdhaarDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "hidden";
            document.getElementById("ajaxCloseAddNewUdhaar").style.visibility = "hidden";
            document.getElementById("addNewUdhaarDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//********************* Show Udhaar Deposit Div ****************************
/*********Start code to add var @Author:PRIYA14APR14************************/
/*********Start - code modified for udhaar interest @Author:SHRI26DEC19************************/
function showUdhaarDepositMoneyDiv(custId, udhaarId, udhaarAmtLeft, udhaarIntAmt, firmId, udhaarPreSerialNum, udhaarSerialNum, sday, smonth, syear, eday, emonth, eyear, udhaarType, otherInfo, accId, discount, utin_id) {

    var udhaarDepIntRecAccId = document.getElementById('udhaarDepIntRecAccId');

    if (udhaarDepIntRecAccId != null && udhaarDepIntRecAccId != '') {
        udhaarDepIntRecAccId = udhaarDepIntRecAccId.value;
    }

    if (udhaarAmtLeft == 0) {
        alert('Please First Enter Deposit amount.');
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (udhaarId == '') {
                    document.getElementById("udharPaymentPanel" + udhaarId).innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("udhaarDepositMonButDiv" + udhaarId).style.visibility = "hidden";
                    document.getElementById("ajaxLoadUdhaarDepositMon" + udhaarId).style.visibility = "hidden";
                    document.getElementById("udhaarDepositMoneyDiv" + udhaarId).innerHTML = xmlhttp.responseText;
                }
            } else {
                if (udhaarId != '') {
                    document.getElementById("udhaarDepositMonButDiv" + udhaarId).style.visibility = "hidden";
                    document.getElementById("ajaxLoadUdhaarDepositMon" + udhaarId).style.visibility = "visible";
                }
            }
        };

        var str = "&paymentPanelName=UdhaarPayment&mainPanelName=udhaar&transPanelName=OnPurchase";

        if (utin_id != '' && typeof (utin_id) != 'undefined') {

            str = "&paymentPanelName=UdhaarPaymentUpdate&mainPanelName=udhaar&transPanelName=OnPurchase&utin_id=" + utin_id;
        }

        // CODE FOR UDHAAR ROI / UDHAAR INTEREST TYPE / UDHAAR INTEREST CHECK / UDHAAR INTEREST CALCUALATIONS ISSUE @AUTHOR:PRIYANKA-08FEB2022
        //var udhaarROIValueStr = "&udhaarROIValue=" + document.getElementById("selROIValue").value;        
        //var udhaarInterestTypeStr = "&udhaarInterestType=" + document.getElementById("udhaInterestType").value;                          
        //var udhaarInterestCheckStr = "&udhaarInterestCheck=" + document.getElementById("udhaarIntrestCheck").checked;


        var udhaarAmtLeft = +udhaarAmtLeft + +udhaarIntAmt;

        if (udhaarId == '' || udhaarId == null) {

            var paymInfo = document.getElementById("udhaarPayOtherInfo").value;

            xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + custId + "&udhaarAmtLeft=" + udhaarAmtLeft + "&udhaarIntAmt=" + udhaarIntAmt + "&udhaarDepIntRecAccId=" + udhaarDepIntRecAccId +
                    "&firmId=" + firmId + "&PreInvoiceNo=" + udhaarPreSerialNum + "&PostInvoiceNo=" + udhaarSerialNum + "&udhaarType=" + udhaarType +
                    "&accDrId=" + accId + "&PayOtherInfo=" + otherInfo + "&eDOBDay=" + eday + "&eDOBMonth=" + emonth + "&eDOBYear=" + eyear +
                    "&DOBDay=" + sday + "&DOBMonth=" + smonth + "&DOBYear=" + syear + "&paymInfo=" + paymInfo + str, true);

            xmlhttp.send();

        } else {

            xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + custId + "&udhaarId=" + udhaarId + "&udhaarAmtLeft=" + udhaarAmtLeft + "&udhaarIntAmt=" + udhaarIntAmt + "&udhaarDepIntRecAccId=" + udhaarDepIntRecAccId +
                    "&firmId=" + firmId + "&depsoitDisc=" + discount + "&preInvNo=" + udhaarPreSerialNum + "&postInvNo=" + udhaarSerialNum +
                    "&paymentPanelName=UdhaarPayment&mainPanelName=udhaar&transPanelName=UDHAAR", true);

            xmlhttp.send();

        }
    }
}
/*********End - code modified for udhaar interest @Author:SHRI26DEC19************************/
/*********End code to add var @Author:PRIYA14APR14************************/
//********************* Close Udhaar Deposit Div ****************************
function closeUdhaarDepositMoneyDiv(udhaarId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("udhaarDepositMonButDiv" + udhaarId).style.visibility = "visible";
            document.getElementById("udhaarDepositMoneyDiv" + udhaarId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxCloseUdhaarDepositMonDiv" + udhaarId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//********************* Show Search Girvi Panel Div ****************************
function showSearchGirviPanelDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("searchGirviPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgsgvpd" + default_theme + ".php", true);
    xmlhttp.send();
}
//********************* Close Add New Udhaar Div ****************************
function closeSearchGirviPanelDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("searchGirviPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Search Girvi By Date **********************************************
function valSearchGirviByDateInputs(obj) {
    if (validateSelectField(document.search_girvi_panel.dayDD.value, "Please select Day in Date!") == false) {
        document.search_girvi_panel.dayDD.focus();
        return false;
    } else if (validateSelectField(document.search_girvi_panel.monthMonth.value, "Please select Month in Date!") == false) {
        document.search_girvi_panel.monthMonth.focus();
        return false;
    } else if (validateSelectField(document.search_girvi_panel.yearYYYY.value, "Please select Year in Date!") == false) {
        document.search_girvi_panel.yearYYYY.focus();
        return false;
    }
    return true;
}

function search_girvi_by_date(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchGirviByDate;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchGirviByDate() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
        document.getElementById("girviByDateSearchButt").style.visibility = "visible";
        document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        document.getElementById("girviByDateSearchButt").style.visibility = "hidden";
    }
}
function searchGirviByDate(obj) {
    if (valSearchGirviByDateInputs(obj)) {
        var poststr = "dayDD=" + encodeURIComponent(document.search_girvi_panel.dayDD.value)
                + "&monthMonth=" + encodeURIComponent(document.search_girvi_panel.monthMonth.value)
                + "&yearYYYY=" + encodeURIComponent(document.search_girvi_panel.yearYYYY.value);
        search_girvi_by_date('include/php/olgsdatd' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY21NOV13
    }
}
//**************************** Search Girvi By Fixed Amount *************************************
function valSearchGirviByFixedAmountInputs(obj) {
    if (validateEmptyField(document.srch_girvi_fixedAmt.grvFixedAmt.value, "Please enter girvi principal amount!") == false ||
            validateNum(document.srch_girvi_fixedAmt.grvFixedAmt.value, "Accept only Numbers without space character!") == false) {
        document.srch_girvi_fixedAmt.grvFixedAmt.focus();
        return false;
    }
    return true;
}

function search_girvi_by_fixed_amount(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchGirviByFixedAmount;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchGirviByFixedAmount() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
        document.getElementById("girviByFixedAmtSrchButt").style.visibility = "visible";
        document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        document.getElementById("girviByFixedAmtSrchButt").style.visibility = "hidden";
    }
}
function searchGirviByFixedAmount(obj) {
    if (valSearchGirviByFixedAmountInputs(obj)) {
        var poststr = "grvFixedAmt=" + encodeURIComponent(document.srch_girvi_fixedAmt.grvFixedAmt.value);
        search_girvi_by_fixed_amount('include/php/olgsfxad' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY21NOV13
    }
}
//**************************** Search Girvi By Fixed Amount Range ********************************
function valSearchGirviByAmountRangeInputs(obj) {
    if (validateSelectField(document.srch_girvi_amtRange.grvAmtRange.value, "Please select amount range!") == false) {
        document.srch_girvi_amtRange.grvAmtRange.focus();
        return false;
    }
    return true;
}

function search_girvi_by_amt_range(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchGirviByAmountRange;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchGirviByAmountRange() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
        document.getElementById("girviByAmtRangeSrchButt").style.visibility = "visible";
        document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        document.getElementById("girviByAmtRangeSrchButt").style.visibility = "hidden";
    }
}
function searchGirviByAmountRange(obj) {
    if (valSearchGirviByAmountRangeInputs(obj)) {
        var poststr = "grvAmtRange=" + encodeURIComponent(document.srch_girvi_amtRange.grvAmtRange.value);
        search_girvi_by_amt_range('include/php/orgsamrd' + default_theme + '.php', poststr);
    }
}
//**************************** Search Girvi By Customized Amount Range ********************************
function valSearchGirviByCustomAmountRangeInputs(obj) {
    if (validateEmptyField(document.srch_girvi_customAmtRange.grvCustomAmtStartRange.value, "Please enter start range!") == false ||
            validateNum(document.srch_girvi_customAmtRange.grvCustomAmtStartRange.value, "Accept only Numbers without space character!") == false) {
        document.srch_girvi_customAmtRange.grvCustomAmtStartRange.focus();
        return false;
    } else if (validateEmptyField(document.srch_girvi_customAmtRange.grvCustomAmtEndRange.value, "Please enter end range!") == false ||
            validateNum(document.srch_girvi_customAmtRange.grvCustomAmtEndRange.value, "Accept only Numbers without space character!") == false) {
        document.srch_girvi_customAmtRange.grvCustomAmtEndRange.focus();
        return false;
    }
    return true;
}

function search_girvi_by_amt_custom_range(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchGirviByCustomAmountRange;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchGirviByCustomAmountRange() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
        document.getElementById("girviByCustomAmtRangeSrchButt").style.visibility = "visible";
        document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        document.getElementById("girviByCustomAmtRangeSrchButt").style.visibility = "hidden";
    }
}
function searchGirviByCustomAmountRange(obj) {
    if (valSearchGirviByCustomAmountRangeInputs(obj)) {
        var poststr = "startRange=" + encodeURIComponent(document.srch_girvi_customAmtRange.grvCustomAmtStartRange.value)
                + "&endRange=" + encodeURIComponent(document.srch_girvi_customAmtRange.grvCustomAmtEndRange.value);
        search_girvi_by_amt_custom_range('include/php/orgscard' + default_theme + '.php', poststr);
    }
}
//********************* Show Search Udhaar Panel Div ****************************
function showSearchUdhaarPanelDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "hidden";
            document.getElementById("searchUdhaarPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omuspndv" + default_theme + ".php", true);
    xmlhttp.send();
}
//********************* Show All Udhaar Details Div ****************************
/***************Start code to add panelname @Author:PRIYA21MAY14*********/
/***************Start code to change panel @Author:PRIYA04JUN14*******/
function showAllUdhaarDetailsDiv(panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("udhaarDetPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omuupnal" + default_theme + ".php?panelName=" + panelName, true);
    xmlhttp.send();
}
/***************End code to change panel @Author:PRIYA04JUN14*******/
/***************End code to add panelname @Author:PRIYA21MAY14*********/
//********************* Close Search Udhaar Div ****************************
function closeSearchUdhaarPanelDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "hidden";
            document.getElementById("searchUdhaarPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Search Udhaar By Date **********************************************
function valSearchUdhaarByDateInputs(obj) {
    if (validateSelectField(document.search_udhaar_panel.dayDD.value, "Please select Day in Date!") == false) {
        document.search_udhaar_panel.dayDD.focus();
        return false;
    } else if (validateSelectField(document.search_udhaar_panel.monthMonth.value, "Please select Month in Date!") == false) {
        document.search_udhaar_panel.monthMonth.focus();
        return false;
    } else if (validateSelectField(document.search_udhaar_panel.yearYYYY.value, "Please select Year in Date!") == false) {
        document.search_udhaar_panel.yearYYYY.focus();
        return false;
    }
    return true;
}

function search_udhaar_by_date(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchUdhaarByDate;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchUdhaarByDate() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "hidden";
        document.getElementById("udhaarByDateSearchButt").style.visibility = "visible";
        document.getElementById("udhaarListPanelDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "visible";
        document.getElementById("udhaarByDateSearchButt").style.visibility = "hidden";
    }
}
function searchUdhaarByDate(obj) {
    if (valSearchUdhaarByDateInputs(obj)) {
        var poststr = "dayDD=" + encodeURIComponent(document.search_udhaar_panel.dayDD.value)
                + "&monthMonth=" + encodeURIComponent(document.search_udhaar_panel.monthMonth.value)
                + "&yearYYYY=" + encodeURIComponent(document.search_udhaar_panel.yearYYYY.value);
        search_udhaar_by_date('include/php/omusdatd' + default_theme + '.php', poststr);
    }
}
//**************************** Search Udhaar By Fixed Amount *************************************
function valSearchUdhaarByFixedAmountInputs(obj) {
    if (validateEmptyField(document.srch_udhaar_fixedAmt.udhaarFixedAmt.value, "Please enter udhaar principal amount!") == false ||
            validateNum(document.srch_udhaar_fixedAmt.udhaarFixedAmt.value, "Accept only Numbers without space character!") == false) {
        document.srch_udhaar_fixedAmt.udhaarFixedAmt.focus();
        return false;
    }
    return true;
}

function search_udhaar_by_fixed_amount(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchUdhaarByFixedAmount;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchUdhaarByFixedAmount() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "hidden";
        document.getElementById("udhaarByFixedAmtSrchButt").style.visibility = "visible";
        document.getElementById("udhaarListPanelDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "visible";
        document.getElementById("udhaarByFixedAmtSrchButt").style.visibility = "hidden";
    }
}
function searchUdhaarByFixedAmount(obj) {
    if (valSearchUdhaarByFixedAmountInputs(obj)) {
        var poststr = "udhaarFixedAmt=" + encodeURIComponent(document.srch_udhaar_fixedAmt.udhaarFixedAmt.value);
        search_udhaar_by_fixed_amount('include/php/omusfxam' + default_theme + '.php', poststr);
    }
}
//**************************** Search Udhaar By Fixed Amount Range ********************************
function valSearchUdhaarByAmountRangeInputs(obj) {
    if (validateSelectField(document.srch_udhaar_amtRange.udhaarAmtRange.value, "Please select amount range!") == false) {
        document.srch_udhaar_amtRange.udhaarAmtRange.focus();
        return false;
    }
    return true;
}

function search_udhaar_by_amt_range(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchUdhaarByAmountRange;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchUdhaarByAmountRange() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "hidden";
        document.getElementById("udhaarByAmtRangeSrchButt").style.visibility = "visible";
        document.getElementById("udhaarListPanelDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "visible";
        document.getElementById("udhaarByAmtRangeSrchButt").style.visibility = "hidden";
    }
}
function searchUdhaarByAmountRange(obj) {
    if (valSearchUdhaarByAmountRangeInputs(obj)) {
        var poststr = "udhaarAmtRange=" + encodeURIComponent(document.srch_udhaar_amtRange.udhaarAmtRange.value);
        search_udhaar_by_amt_range('include/php/omusamrg' + default_theme + '.php', poststr);
    }
}
//**************************** Search Udhaar By Customized Amount Range ********************************
function valSearchUdhaarByCustomAmountRangeInputs(obj) {
    if (validateEmptyField(document.srch_udhaar_customAmtRange.udhaarCustomAmtStartRange.value, "Please enter start range!") == false ||
            validateNum(document.srch_udhaar_customAmtRange.udhaarCustomAmtStartRange.value, "Accept only Numbers without space character!") == false) {
        document.srch_udhaar_customAmtRange.udhaarCustomAmtStartRange.focus();
        return false;
    } else if (validateEmptyField(document.srch_udhaar_customAmtRange.udhaarCustomAmtEndRange.value, "Please enter end range!") == false ||
            validateNum(document.srch_udhaar_customAmtRange.udhaarCustomAmtEndRange.value, "Accept only Numbers without space character!") == false) {
        document.srch_udhaar_customAmtRange.udhaarCustomAmtEndRange.focus();
        return false;
    }
    return true;
}

function search_udhaar_by_amt_custom_range(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchUdhaarByCustomAmountRange;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchUdhaarByCustomAmountRange() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "hidden";
        document.getElementById("udhaarByCustomAmtRangeSrchButt").style.visibility = "visible";
        document.getElementById("udhaarListPanelDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "visible";
        document.getElementById("udhaarByCustomAmtRangeSrchButt").style.visibility = "hidden";
    }
}
function searchUdhaarByCustomAmountRange(obj) {
    if (valSearchUdhaarByCustomAmountRangeInputs(obj)) {
        var poststr = "startRange=" + encodeURIComponent(document.srch_udhaar_customAmtRange.udhaarCustomAmtStartRange.value)
                + "&endRange=" + encodeURIComponent(document.srch_udhaar_customAmtRange.udhaarCustomAmtEndRange.value);
        search_udhaar_by_amt_custom_range('include/php/omuscuam' + default_theme + '.php', poststr);
    }
}
//**************************** Search Girvi By City ********************************
function valSearchGirviByCityInputs(obj) {
    if (validateSelectField(document.search_girvi_by_city.searchGirviCity.value, "Please select Girvi City / Village!") == false) {
        document.search_girvi_by_city.searchGirviCity.focus();
        return false;
    }
    return true;
}

function search_girvi_by_city(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchGirviByCity;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchGirviByCity() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
        document.getElementById("girviByCitySearchButt").style.visibility = "visible";
        document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        document.getElementById("girviByCitySearchButt").style.visibility = "hidden";
    }
}
function searchGirviByCity(obj) {
    if (valSearchGirviByCityInputs(obj)) {
        var poststr = "girviSearchCity=" + encodeURIComponent(document.search_girvi_by_city.searchGirviCity.value);
        search_girvi_by_city('include/php/orgscitd' + default_theme + '.php', poststr);
    }
}
//**************************** Search Udhaar By City ********************************
function valSearchUdhaarByCityInputs(obj) {
    if (validateSelectField(document.search_udhaar_by_city.searchUdhaarCity.value, "Please select Udhaar City / Village!") == false) {
        document.search_udhaar_by_city.searchUdhaarCity.focus();
        return false;
    }
    return true;
}

function search_udhaar_by_city(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchUdhaarByCity;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchUdhaarByCity() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "hidden";
        document.getElementById("udhaarByCitySearchButt").style.visibility = "visible";
        document.getElementById("udhaarListPanelDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadShowSearchUdhaarDiv").style.visibility = "visible";
        document.getElementById("udhaarByCitySearchButt").style.visibility = "hidden";
    }
}
function searchUdhaarByCity(obj) {
    if (valSearchUdhaarByCityInputs(obj)) {
        var poststr = "searchOption=" + encodeURIComponent(document.search_udhaar_by_city.searchUdhaarCity.value);
        search_udhaar_by_city('include/php/omusctdv' + default_theme + '.php', poststr);
    }
}
//**************************** Search Customer To Add Girvi **********************************
function valSearchCustFirstNameToAddGirvi(custFirstName) {
    if (custFirstName == "Enter Customer First Name") {
        alert("Please enter Customer First Name!");
        document.getElementById("custFirstName").focus();
        return false;
    }
    return true;
}

function search_cust_fname_to_add_girvi(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCustFNameToAddGirvi;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function search_supp_fname_to_add_girvi(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchSuppFNameToAddGirvi;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchCustFNameToAddGirvi() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
        document.getElementById("custListForAddGirviDiv").innerHTML = xmlhttp.responseText;
        //searchCityForPanelBlank();
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    }
}
function alertSearchSuppFNameToAddGirvi() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("suppListForAddGirviDiv").innerHTML = xmlhttp.responseText;
        //searchCityForPanelBlank();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/***If Customer input FirstName on Phone No field Then Should Go Directly On Fisrt Name Field On Home Page @AUTHOR: SANSKRUTI 06JUNE23 */
function searchNameOnFirstNo(input) {
    var phoneNoInput = input.value;
    var firstNameInput = document.getElementById("custFirstNameForAddGirvi");

    // Remove any non-digit characters from the phone number input
    var characterCheck = phoneNoInput.replace(/\D/g, '');
    if (characterCheck !== phoneNoInput) {
        input.value = characterCheck;
        firstNameInput.value += phoneNoInput.charAt(phoneNoInput.length - 1);
        firstNameInput.focus();
    } else {
        // Update the value of the "Mobile No" field with the processed input
        input.value = phoneNoInput;
    }
}
/***End Code For If Customer input FirstName on Phone No field Then Should Go Directly On Fisrt Name Field On Home Page @AUTHOR: SANSKRUTI 06JUNE23 */
//
/*****************Start to add code to show print button @AUTHOR: SANDY7OCT13*************************/
function searchCustToAddGirvi(custFName, custLName, custFatherOrSpouseName, custCity, custMobNo, custFirmId, custPhoneNo, custAdharCardNo) {

    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    //document.getElementById('printButt').style.visibility = "visible";
    if (true) {

        var poststr = "custFName=" + encodeURIComponent(custFName)
                + "&custLName=" + encodeURIComponent(custLName)
                + "&custFatherOrSpouseName=" + encodeURIComponent(custFatherOrSpouseName)
                + "&custCity=" + encodeURIComponent(custCity)
                + "&custMobNo=" + encodeURIComponent(custMobNo)
                + "&custAdharCardNo=" + encodeURIComponent(custAdharCardNo)
                + "&custPhoneNo=" + encodeURIComponent(custPhoneNo)
                + "&custFirmId=" + encodeURIComponent(custFirmId);
        //alert(poststr);
        search_cust_fname_to_add_girvi('include/php/omccscag' + default_theme + '.php', poststr);
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
    }
}

function searchSuppToAddGirvi(suppFName, suppLName, suppFatherOrSpouseName, suppCity, suppMobNo, suppFirmId) {

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    //document.getElementById('printButt').style.visibility = "visible";
    if (true) {

        var poststr = "suppFName=" + encodeURIComponent(suppFName)
                + "&suppLName=" + encodeURIComponent(suppLName)
                + "&suppFatherOrSpouseName=" + encodeURIComponent(suppFatherOrSpouseName)
                + "&suppCity=" + encodeURIComponent(suppCity)
                + "&suppMobNo=" + encodeURIComponent(suppMobNo)
                + "&suppFirmId=" + encodeURIComponent(suppFirmId);
        //alert(poststr);search_supp_fname_to_add_girvi
        search_supp_fname_to_add_girvi('include/php/omsuppscag' + default_theme + '.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
/*****************End to add code to show print button @AUTHOR: SANDY7OCT13*************************/
//************************** Search City TO Add Girvi
/***********Start Code To Add Div For Add New Customer @AUTHOR:PRIYA21MAY13********/
var keyCode;
var panelNameToAddCustCity;
function search_city_for_panel(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCityForPanel;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//
var keyCode;
var panelNameToAddCustCity;
function search_village_for_panel(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchVillageForPanel;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
// Add code for search tehsil from dropdown CHETAN 16 JUNE 2022
var keyCode;
var panelNameToAddCustCity;
function search_tehsil_for_panel(url, parameters)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchTehsilForPanel;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchTehsilForPanel()
{
    if (panelNameToAddCustCity == 'addNewCustomer') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("tehsilListDivToAddNewCust").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('custVillageForAddNewCustSelect').focus();
                document.getElementById('custVillageForAddNewCustSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    } else if (panelNameToAddCustCity == 'directAddCust') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('custVillageForAddNewCustSelect').focus();
                document.getElementById('custVillageForAddNewCustSelect').options[0].selected = true;
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

//Disply tehsil dropdown list add user panel CHETAN 16JUNE2022 ends here
function alertSearchCityForPanel() {
    if (panelNameToAddCustCity == 'addNewCustomer') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("cityListDivToAddNewCust").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('custCityForAddNewCustSelect').focus();
                document.getElementById('custCityForAddNewCustSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    } else if (panelNameToAddCustCity == 'directAddCust') {
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
//
function alertSearchVillageForPanel() {
    if (panelNameToAddCustCity == 'addNewCustomer') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("villageListDivToAddNewCust").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('custVillageForAddNewCustSelect').focus();
                document.getElementById('custVillageForAddNewCustSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    } else if (panelNameToAddCustCity == 'directAddCust') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('custVillageForAddNewCustSelect').focus();
                document.getElementById('custVillageForAddNewCustSelect').options[0].selected = true;
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
//
function searchCityForPanel(custCity, keyCodeInput, panelName) {
    keyCode = keyCodeInput;
    panelNameToAddCustCity = panelName;
    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    var poststr = "custCity=" + encodeURIComponent(custCity) +
            "&panelName=" + encodeURIComponent(panelName);
    search_city_for_panel('include/php/omvvgtcg' + default_theme + '.php', poststr);
}


//************************** Search City TO Add Girvi Blank Panel
function searchVillageForPanel(custVillage, keyCodeInput, panelName) {
    keyCode = keyCodeInput;
    panelNameToAddCustCity = panelName;
    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    var poststr = "custVillage=" + encodeURIComponent(custVillage) +
            "&panelName=" + encodeURIComponent(panelName);
    search_village_for_panel('include/php/omvvgtcgvil' + default_theme + '.php', poststr);
}


function searchCityForGoogleSugg(custCity, keyCodeInput, panelName) {
    keyCode = keyCodeInput;
    panelNameToAddCustCity = panelName;
    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    var poststr = "custCity=" + encodeURIComponent(custCity) +
            "&panelName=" + encodeURIComponent(panelName);
    search_city_for_panel('include/php/omInputFieldGoogleSuggestion' + default_theme + '.php', poststr);
}
//************************** this function created by deepesh for Search City on 16/06/2022
//Search Tehsil from dropdown list by CHETAN 16 JUNE 2022
function searchTehsilForPanel(custVillage, keyCodeInput, panelName)
{
    keyCode = keyCodeInput;
    panelNameToAddCustCity = panelName;
    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    var poststr = "custVillage=" + encodeURIComponent(custVillage) +
            "&panelName=" + encodeURIComponent(panelName);
    search_tehsil_for_panel('include/php/omvvgtcgteh' + default_theme + '.php', poststr);
}

//************************** this function created by deepesh for Search Tehsil on 16/06/2022


var cityNameForPanelBlank;
function search_city_for_panel_blank(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCityForPanelBlank;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//
var cityNameForPanelBlank;
function search_village_for_panel_blank(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchVillageForPanelBlank;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//function make tehsil blank CHETAN 16JUNE2022

function search_tehsil_for_panel_blank(url, parameters)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchTehsilForPanelBlank;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//
//
var tehsilNameForPanelBlank;
function alertSearchTehsilForPanelBlank()
{
    if (tehsilNameForPanelBlank == 'addNewCustomer') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("tehsilListDivToAddNewCust").innerHTML = xmlhttp.responseText;
            // document.getElementById("city").focus(); //Start Code To Hide @Author:PRIYA24AUG13
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    } else if (tehsilNameForPanelBlank == 'directAddCust') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            //document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
            document.getElementById("custCityForAddGirvi").focus();
            searchCustToAddGirvi(document.getElementById('custFirstNameForAddGirvi').value,
                    document.getElementById('custLastNameForAddGirvi').value,
                    document.getElementById('custFatherNameForAddGirvi').value,
                    document.getElementById('custCityForAddGirvi').value,
                    document.getElementById('mobileNoToAddGirvi').value,
                    document.getElementById('girviFirmId').value);
            document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    } else if (tehsilNameForPanelBlank == 'blank') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    }
}
//
//
function alertSearchCityForPanelBlank() {
    if (cityNameForPanelBlank == 'addNewCustomer') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("cityListDivToAddNewCust").innerHTML = xmlhttp.responseText;
            // document.getElementById("city").focus(); //Start Code To Hide @Author:PRIYA24AUG13
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    } else if (cityNameForPanelBlank == 'directAddCust') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            //document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
            document.getElementById("custCityForAddGirvi").focus();
            searchCustToAddGirvi(document.getElementById('custFirstNameForAddGirvi').value,
                    document.getElementById('custLastNameForAddGirvi').value,
                    document.getElementById('custFatherNameForAddGirvi').value,
                    document.getElementById('custCityForAddGirvi').value,
                    document.getElementById('mobileNoToAddGirvi').value,
                    document.getElementById('girviFirmId').value);
            document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    } else if (cityNameForPanelBlank == 'blank') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    }
}
//
function alertSearchVillageForPanelBlank() {
    if (cityNameForPanelBlank == 'addNewCustomer') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("villageListDivToAddNewCust").innerHTML = xmlhttp.responseText;
            // document.getElementById("city").focus(); //Start Code To Hide @Author:PRIYA24AUG13
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    } else if (cityNameForPanelBlank == 'directAddCust') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            //document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
            document.getElementById("custCityForAddGirvi").focus();
            searchCustToAddGirvi(document.getElementById('custFirstNameForAddGirvi').value,
                    document.getElementById('custLastNameForAddGirvi').value,
                    document.getElementById('custFatherNameForAddGirvi').value,
                    document.getElementById('custCityForAddGirvi').value,
                    document.getElementById('mobileNoToAddGirvi').value,
                    document.getElementById('girviFirmId').value);
            document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    } else if (cityNameForPanelBlank == 'blank') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("cityListDivToAddGirvi").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    }
}
function searchCityForPanelBlank(divName) {
    cityNameForPanelBlank = divName;
    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    var poststr = "";
    search_city_for_panel_blank('include/php/ombbblnk' + default_theme + '.php', poststr);
}
//
function searchVillageForPanelBlank(divName) {
    cityNameForPanelBlank = divName;
    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    var poststr = "";
    search_village_for_panel_blank('include/php/ombbblnk' + default_theme + '.php', poststr);
}
//
function searchTehsilForPanelBlank(divName)
{
    tehsilNameForPanelBlank = divName;
    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    var poststr = "";
    search_tehsil_for_panel_blank('include/php/ombbblnk' + default_theme + '.php', poststr);
}

/***********End Code To Add Div For Add New Customer @AUTHOR:PRIYA21MAY13********/
//**************************** Navigate Expiry Girvi Panel *******************************************************************
function showExpiredGirviListPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgpexgl" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Navigate TP Expiry Girvi Panel *******************************************************************
//**************************** Start Navigate Expiry Girvi Panel Author:DIKSHA 09MAY2019*******************************************************************
function showExpiredGirviListPanelInt() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgpexglint" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** End Navigate Expiry Girvi Panel Author:DIKSHA 09MAY2019 *******************************************************************
//
function showTPExpiredGirviListPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgptpexgl" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Navigate Girvi Panel *******************************************************************
//****************************Start Navigate TP Expiry Girvi Panel Author:DIKSHA 09MAY2019*******************************************************************
function showTPExpiredGirviListPanelInt() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgptpexglint" + default_theme + ".php", true);
    xmlhttp.send();
}
//****************************End Navigate TP Expiry Girvi Panel Author:DIKSHA 09MAY2019 *******************************************************************
//
function showReleasedGirviListPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgpregl" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Start Navigate Loss Girvi Panel Author:DIKSHA 09MAY2019*******************************************************************
function showReleasedGirviListPanelInt() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgpreglint" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** End Navigate Loss Girvi Panel Author:DIKSHA 09MAY2019*******************************************************************
function showLossGirviListPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgplglp" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Navigate Loans List Panel *******************************************************************
//**************************** Start Navigate Loss Girvi Panel Author:DIKSHA 09MAY2019*******************************************************************
function showLossGirviListPanelInt() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgplglpint" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** End Navigate Loans List Panel Author:DIKSHA 09MAY2019*******************************************************************
function showLoansListPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgpllpn" + default_theme + ".php", true);
    xmlhttp.send();
}
//**********Start code to add function for Intelligent Active details  Author:DIKSHA 09MAY2019*********/


//**********Start code to add function for  Active Loan details  Author:GANGADHAR  26JUNE2021*********/
function showActiveloanlistdetailspanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgpllpn1" + default_theme + ".php", true);
    xmlhttp.send();
}
//**********End code to add function for  Active Loan details  Author:GANGADHAR  26JUNE2021*********/
//

//**********Start code to add function for Active Loan List with more details  Author:ASHWINI  11AUG2023*********/
function showActiveloanlistWithMoreDetailsPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgpllpn2" + default_theme + ".php", true);
    xmlhttp.send();
}
//**********End code to add function for Active Loan List with more details  Author:ASHWINI  11AUG2023*********/
function getColumnData(documentRootPath, form8lay) {
    const table = document.getElementById("dtTableDivId");
    const dataArray = [];

    // Start from 1 to skip the header row
    for (let i = 1; i < table.rows.length; i++) {
        const loanId = table.rows[i].cells[0].textContent.trim();  // 1st column
//        const customerId = table.rows[i].cells[1].textContent.trim();  // 2nd column

        // Add each row's data as an object to the array
        dataArray.push({loanId: loanId});
    }

//    console.log(dataArray);  // Output the array to console

    // Create a hidden form to send the data
    const form = document.createElement('form');
    form.method = 'POST';
    form.target = '_blank'; // Opens the form in a new window
    if (form8lay == 'form8LayPawn') {
        form.action = documentRootPath + "/include/php/omggmltfrm8pawn.php";
    } else if (form8lay == 'form8LayModern') {
        form.action = documentRootPath + "/include/php/omggmltfrm8mdrn.php";
    } else if (form8lay == 'form8LayModernSheet2') {
        form.action = documentRootPath + "/include/php/omggmltfrm8mdrnshet2.php";
    } else {
        form.action = documentRootPath + "/include/php/ommltfrm8.php";
    }
    // Convert dataArray to JSON and create a hidden input field for it
    const dataInput = document.createElement('input');
    dataInput.type = 'hidden';
    dataInput.name = 'data';  // The name for the POST variable
    dataInput.value = JSON.stringify(dataArray); // Set the JSON data as the value

    // Append the input to the form
    form.appendChild(dataInput);

    // Append the form to the document body
    document.body.appendChild(form);

    // Submit the form to open the new window with the data
    form.submit();

    // Remove the form after submitting
    document.body.removeChild(form);
}
function getSellColumnData(documentRootPath, form8lay) {
    const table = document.getElementById("dtTableDivId2");
    const dataArray = [];

    // Start from 1 to skip the header row
    for (let i = 1; i < table.rows.length; i++) {
        const row = table.rows[i];

        // Loop through each cell (td) in the row
        if (row.classList.contains('odd') || row.classList.contains('even')) {
            const rowData = {};

            // Loop through each cell (td) in the row

            // Use column index as key (you can replace this with meaningful keys if available)
            const preInv = row.cells[0].textContent.trim();
            const PostInv = row.cells[1].textContent.trim();
            const Date = row.cells[2].textContent.trim();
            const userId = row.cells[3].textContent.trim();
            const Tranctiontype = row.cells[5].textContent.trim();
            const firmId = row.cells[6].textContent.trim();
            const utinId = row.cells[4].textContent.trim();

            // Add row data to the array
            dataArray.push({preInv: preInv, PostInv: PostInv, Date: Date, userId: userId, Tranctiontype: Tranctiontype, firmId: firmId, utinId: utinId});
        }
    }
    console.log(JSON.stringify(dataArray)); // Set the JSON data as the value
    console.log(dataArray);  // Output the array to console

    // Create a hidden form to send the data
    const form = document.createElement('form');
    form.method = 'POST';
    form.target = '_blank'; // Opens the form in a new window

    form.action = documentRootPath + "/include/php/ommprinInvAll.php";

    // Convert dataArray to JSON and create a hidden input field for it
    const dataInput = document.createElement('input');
    dataInput.type = 'hidden';
    dataInput.name = 'data';  // The name for the POST variable
    dataInput.value = JSON.stringify(dataArray); // Set the JSON data as the value

    // Append the input to the form
    form.appendChild(dataInput);

    // Append the form to the document body
    document.body.appendChild(form);

    // Submit the form to open the new window with the data
    form.submit();

    // Remove the form after submitting
    document.body.removeChild(form);
}
function showloandetailform8(documentRootPath, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
//            document.getElementById("printAll").style.visibility = "hidden";
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omlnmltfrm8" + default_theme + ".php?panelName=" + panelName, true);
    xmlhttp.send();
}

function showLoansListPanelInt() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/orgpllpnint" + default_theme + ".php", true);
    xmlhttp.send();
}
//**********End code to add function for Intelligent Active details  Author:DIKSHA 09MAY2019*********/
//
//**************************** Search Expiry Girvi Panel *******************************************************************
function searchExpGirviByFixedMonths(expGirviFrm, rowsPerPage) {
    loadXMLDoc();
    if (validateEmptyField(expGirviFrm.expGrvMonths.value, "Please enter Months!") == false ||
            validateNum(expGirviFrm.expGrvMonths.value, "Accept only Numbers!") == false) {
        expGirviFrm.expGrvMonths.focus();
    } else {
        var expMonths = expGirviFrm.expGrvMonths.value;
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
                document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/orgpexgl" + default_theme + ".php?expMonths=" + expMonths + "&rowsPerPage=" + rowsPerPage, true);
        xmlhttp.send();
    }
}
//**************************** Navigate Released Girvi Panel *******************************************************************
//********code modified for search option by  @AUTHOR: LINA27JUN2013*******
function navigationReleasedGirviListPanel(pageNo, selFirmId, sortKeyword, rowsPerPage, searchColumn, searchValue)
{
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
    xmlhttp.open("POST", "include/php/orgpregl" + default_theme + ".php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&rowsPerPage=" + rowsPerPage + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue, true);
    xmlhttp.send();
}
//**************************** Navigate Loss Girvi Panel *******************************************************************
//********code modified for search option by  @AUTHOR: LINA27JUN2013*******
/***********************Start Code To Add PageNo @Author:PRIYA14JUL13************************/
function navigationLossGirviListPanel(button, offset, totalGirviProcessed, maxLimit, maxLimitProcess, selFirmId, sortKeyword, rowsPerPage, pageNo, searchColumn, searchValue) {
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
    xmlhttp.open("POST", "include/php/orgplglp" + default_theme + ".php?button=" + button + "&offset=" + offset + "&totalGirviProcessed=" + totalGirviProcessed + "&maxLimit=" + maxLimit + "&maxLimitProcess=" + maxLimitProcess +
            "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&rowsPerPage=" + rowsPerPage + "&page=" + pageNo + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue, true);
    xmlhttp.send();
}
/***********************End Code To Add PageNo @Author:PRIYA14JUL13************************/
/***********************Start Code To Add PageNo @Author:PRIYA14JUL13************************/
function navigationLoansListPanel(button, offset, totalGirviProcessed, maxLimit, maxLimitProcess, selFirmId, sortKeyword, rowsPerPage, pageNo, searchColumn, searchValue) {
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
    xmlhttp.open("POST", "include/php/orgpllpn" + default_theme + ".php?button=" + button + "&offset=" + offset + "&totalGirviProcessed=" + totalGirviProcessed + "&maxLimit=" + maxLimit + "&maxLimitProcess=" + maxLimitProcess +
            "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&rowsPerPage=" + rowsPerPage + "&page=" + pageNo + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue, true);
    xmlhttp.send();
}
/***********************End Code To Add PageNo @Author:PRIYA14JUL13************************/
//**************************** Navigate Girvi List Panel By Fixed Amount ****************************************
function navigationGirviListPanelByFixedAmount(pageNo, grvFixedAmt) {
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
    xmlhttp.open("POST", "include/php/olgsfxad" + default_theme + ".php?page=" + pageNo + "&grvFixedAmt=" + grvFixedAmt, true); //change in filename @AUTHOR: SANDY21NOV13
    xmlhttp.send();
}
//**************************** Navigate Girvi List Panel By Amount Range ****************************************
function navigationGirviListPanelByAmtRange(pageNo, grvAmtRange) {
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
    xmlhttp.open("POST", "include/php/orgsamrd" + default_theme + ".php?page=" + pageNo + "&grvAmtRange=" + grvAmtRange, true);
    xmlhttp.send();
}
//**************************** Navigate Girvi List Panel By Custom Amount Range ****************************************
function navigationGirviListPanelByCustomAmtRange(pageNo, startRange, endRange) {
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
    xmlhttp.open("POST", "include/php/orgscard" + default_theme + ".php?page=" + pageNo + "&startRange=" + startRange + "&endRange=" + endRange, true);
    xmlhttp.send();
}
//**************************** Navigate Girvi List Panel By Date ****************************************
function navigationGirviListPanelByDate(pageNo, dayDD, monthMonth, yearYYYY) {
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
    xmlhttp.open("POST", "include/php/olgsdatd" + default_theme + ".php?page=" + pageNo + "&dayDD=" + dayDD + "&monthMonth=" + monthMonth + "&yearYYYY=" + yearYYYY, true); //change in filename @AUTHOR: SANDY21NOV13
    xmlhttp.send();
}
//**************************** Get Father Name Label Div *****************************************
/*******Start Code To Add Placeholder @AUTHOR:PRIYA06APR13*********/
function getFatherNameLabel(fatherOrSpouseNameLabel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("fatherOrSpouseNameDiv").innerHTML = xmlhttp.responseText;
            getSexRadioLabelToAddGirvi(fatherOrSpouseNameLabel, '');
            document.getElementById("fatherOrSpouseNameLabel").focus();
            document.getElementById("custFatherNameForAddGirvi").placeholder = 'Customer Father Name';
        } else {
            document.getElementById("fatherOrSpouseNameDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omccfnld" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Get Spouse Name Label Div *****************************************
function getSpouseNameLabel(fatherOrSpouseNameLabel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("fatherOrSpouseNameDiv").innerHTML = xmlhttp.responseText;
            getSexRadioLabelToAddGirvi(fatherOrSpouseNameLabel, '');
            document.getElementById("fatherOrSpouseNameLabel").focus();
            document.getElementById("custFatherNameForAddGirvi").placeholder = 'Customer Spouse Name';
        } else {
            document.getElementById("fatherOrSpouseNameDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omccspnl" + default_theme + ".php", true);
    xmlhttp.send();
}
/*******End Code To Add Placeholder @AUTHOR:PRIYA06APR13*********/
//**************************** Get Sex Radio Label Div *****************************************
/*************Start code to add indiac @Author:PRIYA06JUN14********************/
function getSexRadioLabelToAddGirvi(fatherOrSpouseNameLabel, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sexToAddGirviDiv").innerHTML = xmlhttp.responseText;
        } else {
            //            document.getElementById("sexToAddGirviDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (fatherOrSpouseNameLabel == 'S/o') {
        custSex = 'M';
        document.getElementById("fatherOrSpouseNameIndicator").value = 'S';
    } else if (fatherOrSpouseNameLabel == 'C/o') {
        custSex = 'M';
        document.getElementById("fatherOrSpouseNameIndicator").value = 'C';
    } else if (fatherOrSpouseNameLabel == 'W/o') {
        custSex = 'F';
        document.getElementById("fatherOrSpouseNameIndicator").value = 'W';
    } else if (fatherOrSpouseNameLabel == 'D/o') {
        custSex = 'F';
        document.getElementById("fatherOrSpouseNameIndicator").value = 'D';
    } else if (fatherOrSpouseNameLabel == 'M/o') {
        custSex = 'F';
        document.getElementById("fatherOrSpouseNameIndicator").value = 'M';
    }
    xmlhttp.open("POST", "include/php/omccgsrb" + default_theme + ".php?custSex=" + custSex + "&panel=" + panel, true);
    xmlhttp.send();
}
//
function getSexRadioByNamePrefix(panel) {
    var userNamePrefix = document.getElementById('user_prefix_name').value;
    var custSex = 'M';
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sexToAddGirviDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (userNamePrefix == 'Mr.' || userNamePrefix == 'M/S.') {
        custSex = 'M';
    } else if (userNamePrefix == 'Mrs.' || userNamePrefix == 'Ms.') {
        custSex = 'F';
    }
    xmlhttp.open("POST", "include/php/omccgsrb" + default_theme + ".php?custSex=" + custSex + "&panel=" + panel, true);
    xmlhttp.send();
}
/*************End code to add indiac @Author:PRIYA06JUN14********************/
//**************************** Get Girvi Info Pop UP *****************************************
function getGirviInfoPopUp(custId, girviId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/olggipop" + default_theme + ".php?custId=" + custId + "&girvipopup=girvipopup" + "&girviId=" + girviId, true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
}
//**************************** Get Girvi Info Pop UP *****************************************
//*******Start function Get Girvi Info Pop UP Author:DIKSHA 10MAy2019************************//
function getGirviInfoPopUpInt(custId, girviId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/olggipopint" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId, true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
}
//*********End function Get Girvi Info Pop UP Author:DIKSHA 10MAy2019************************//
/****************************START Code To Add Girvi Id @AUTHOR:PRIYA27FEB13 *****************************************/
function getGirviInfoPopUpInCustHome(custId, girviId, documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            parent.document.getElementById("display_girvi_info_popup" + girviId).innerHTML = xmlhttp.responseText;
        } else {
            parent.document.getElementById("display_girvi_info_popup" + girviId).innerHTML = "<img src='" + documentRootPath + "/images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/olggipop" + default_theme + ".php?custHome=Yes&custId=" + custId + "&girviId=" + girviId, true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
}
/****************************END Code To Add Girvi Id @AUTHOR:PRIYA27FEB13 *****************************************/
//**************************** Hide Girvi Info POP UP in Cust Home Panel *****************************************
/****************************START Code To Add Girvi Id @AUTHOR:PRIYA27FEB13 *****************************************/
function getGirviInfoPopUpHideInCustHome(girviId) {
    //console.log(girviId);
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
/****************************END Code To Add Girvi Id @AUTHOR:PRIYA27FEB13 *****************************************/
//**************************** Hide Girvi Info POP UP *****************************************
function getGirviInfoPopUpHide(girviId) {
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

function closeIframe() {

    var div = window.parent.document.getElementById('girviIframePopUpCust');
    div.style.display = 'none';
}

//
function closeGirviInfoPopUp(girviId) {
    document.getElementById('iframeContainer').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("iframeContainer").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("iframeContainer").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//CODE TO CLOSE VISITOR POPUP
function closeVisitorReqPopUpHide(documentRoot) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            window.top.location.href = documentRoot + "/include/php/omppsbdv.php?divPanel=CustList";
        } else {

        }
    };

    xmlhttp.open("GET", "omleads" + default_theme + ".php", true);

    xmlhttp.send();
}
//
//**************************** Get Balance Sheet ********************************
/*********Start Code To Change Function Name BalnceSheet To Girvi Ledger @AUTHOR:PRIYA15MAR13***********/
function valGetGirviLedgerInputs() {
    if (validateSelectField(document.get_balance_sheet_form.balanceSheetYear.value, "Please select Year!") == false) {
        document.get_balance_sheet_form.balanceSheetYear.focus();
        return false;
    } else if (validateSelectField(document.get_balance_sheet_form.balanceSheetMonth.value, "Please select Month!") == false) {
        document.get_balance_sheet_form.balanceSheetMonth.focus();
        return false;
    }
    return true;
}
/**************Start Code To Add PanelName and Change FileName @AUTHOR:PRIYA09JUNE13*************/
/**************Start Code To Add Gold & Silver Panel Name @AUTHOR:PRIYA19JUNE13***************/
/**************Start Code To Add Panel Name For Udhaar Ledger @AUTTHOR:PRIYA21JUNE13**********/
/**************Start Code To Change Div Name @Author:PRIYA24JUL13*****************************/
/**************Start code to add Int panel @Author:PRIYA18FEB14**********************/
/**************Start code to add panel @Author:PRIYA31MAR14*****************/
/**************Start code to add panel @Author:SHE20OCT15*****************/
function getGirviLedger(panelName) {
    if (valGetGirviLedgerInputs()) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var year = document.get_balance_sheet_form.balanceSheetYear.value;
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("finStartYearDiv").innerHTML = parseInt(year);
                document.getElementById("finEndYearDiv").innerHTML = parseInt(year) + 1;
                if (panelName == 'OMREVO') {
                    document.getElementById("girviLedgerDetails").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'GOLD') {
                    document.getElementById("goldLedgerDetails").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'RawMetalGold') { // ADDED CODE FOR RAW METAL GOLD STOCK @Author:PRIYANKA-30AUG2021
                    document.getElementById("goldLedgerDetails").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'SILVER') {
                    document.getElementById("silverLedgerDetails").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'RawMetalSilver') { // ADDED CODE FOR RAW METAL SILVER STOCK @Author:PRIYANKA-30AUG2021
                    document.getElementById("silverLedgerDetails").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'STONE' || panelName == 'STONE_TRANS') { // ADDED CODE FOR STONE STOCK @Author:PRIYANKA-30AUG2021
                    document.getElementById("goldLedgerDetails").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'UdhaarLedger') {
                    document.getElementById("udhaarLedgerDetails").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'TransGirvi') {
                    document.getElementById("girviTransLedgerDetails").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'LoanInt') {
                    document.getElementById("loanIntLedgerDetails").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'commomLedger') {
                    document.getElementById("comLedgerDetails").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'TAX') {
                    document.getElementById("taxLedgerDetails").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'USEROMREVO') {
                    document.getElementById("girviReleasedLoansListPanelNewDiv").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };

        var poststr = "balanceSheetYear=" + encodeURIComponent(document.get_balance_sheet_form.balanceSheetYear.value)
                + "&balanceSheetMonth=" + encodeURIComponent(document.get_balance_sheet_form.balanceSheetMonth.value)
                + "&firmId=" + encodeURIComponent(document.getElementById("girviLedgerFirmName").value);

        if (panelName == 'OMREVO') {
            xmlhttp.open("POST", "include/php/orbbblsh" + default_theme + ".php?" + poststr, true);
        } else if (panelName == 'GOLD') {
            xmlhttp.open("POST", "include/php/ogbbgdbs" + default_theme + ".php?" + poststr, true);
        } else if (panelName == 'RawMetalGold') {
            xmlhttp.open("POST", "include/php/ogbbrwbs" + default_theme + ".php?" + poststr, true);
        } else if (panelName == 'SILVER') {
            xmlhttp.open("POST", "include/php/ogbbslbs" + default_theme + ".php?" + poststr, true);
        } else if (panelName == 'RawMetalSilver') {
            xmlhttp.open("POST", "include/php/ogbbrwslbs" + default_theme + ".php?" + poststr, true);
        } else if (panelName == 'STONE') {
            xmlhttp.open("POST", "include/php/ombbstbs" + default_theme + ".php?" + poststr, true);
        } else if (panelName == 'STONE_TRANS') {
            xmlhttp.open("POST", "include/php/ombbsttrep" + default_theme + ".php?" + poststr, true);
        } else if (panelName == 'UdhaarLedger') {
            xmlhttp.open("POST", "include/php/ombbuubs" + default_theme + ".php?" + poststr, true);
        } else if (panelName == 'TransGirvi') {
            xmlhttp.open("POST", "include/php/orbbtrgl" + default_theme + ".php?" + poststr, true);
        } else if (panelName == 'LoanInt') {
            xmlhttp.open("POST", "include/php/orbbinbs" + default_theme + ".php?" + poststr, true);
        } else if (panelName == 'commomLedger') {
            xmlhttp.open("POST", "include/php/ombbcmbs" + default_theme + ".php?" + poststr, true);
        } else if (panelName == 'TAX') {
            xmlhttp.open("POST", "include/php/ogbbtlbs" + default_theme + ".php?" + poststr, true);
        } else if (panelName == 'USEROMREVO') {
            xmlhttp.open("POST", "include/php/ombbglrploandv" + default_theme + ".php?" + poststr, true);
        }
        xmlhttp.send();
    }
}
/**************End code to add panel @Author:PRIYA31MAR14*****************/
/**************End code to add Int panel @Author:PRIYA18FEB14**********************/
/**************End Code To Change Div Name @Author:PRIYA24JUL13*****************************/
/**************End Code To Add Panel Name For Udhaar Ledger @AUTTHOR:PRIYA21JUNE13**********/
/**************End Code To Add Gold & Silver Panel Name @AUTHOR:PRIYA19JUNE13***************/
/**************End Code To Add PanelName and Change FileName @AUTHOR:PRIYA09JUNE13*************/
/*********End Code To Change Function Name BalnceSheet To Girvi Ledger @AUTHOR:PRIYA15MAR13***********/
//**************************** Navigate Search Customer By Mobile No ************************************************************
/****************Start code to add date @Author:PRIYA23OCT13**********/
/****************Start code to add date @Author:PRIYA10DEC13*************/
function searchDailyDiaryDetails(ddDetVal, firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, ddPanelToShow, ddMainPanel) {
    if (valDailyDiaryInputs()) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (ddMainPanel == 'custAccLedger') {
                    document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("dailyDiaryDiv").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };

        if (ddMainPanel == 'custAccLedger') {
            var custId = document.getElementById("custAccLedgerCustId").value;
        }

        var dailyDiaryFromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var dailyDiaryToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;

        if (ddMainPanel == 'custAccLedger') {
            xmlhttp.open("POST", "include/php/omddddandv" + default_theme + ".php?ddDetVal=" + ddDetVal + "&custId=" + custId + "&firmId=" + firmId + "&dailyDiaryFromDate=" + dailyDiaryFromDate + "&dailyDiaryToDate=" + dailyDiaryToDate + "&ddPanelToShow=" + ddPanelToShow + "&ddMainPanel=" + ddMainPanel, true);
        } else {
            xmlhttp.open("POST", "include/php/omddddandv" + default_theme + ".php?ddDetVal=" + ddDetVal + "&firmId=" + firmId + "&dailyDiaryFromDate=" + dailyDiaryFromDate + "&dailyDiaryToDate=" + dailyDiaryToDate + "&ddPanelToShow=" + ddPanelToShow + "&ddMainPanel=" + ddMainPanel, true);
        }
        xmlhttp.send();
    }
}
/****************End code to add date @Author:PRIYA10DEC13*************/
function searchDailyDiaryDetailsNepali(ddDetVal, firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, ddPanelToShow, ddMainPanel) {
//    alert(ddPanelToShow);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (ddMainPanel == 'custAccLedger') {
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
    xmlhttp.open("POST", "include/php/omddddandv" + default_theme + ".php?ddDetVal=" + ddDetVal + "&firmId=" + firmId + "&dailyDiaryFromDate=" + dailyDiaryFromDate + "&dailyDiaryToDate=" + dailyDiaryToDate + "&ddPanelToShow=" + ddPanelToShow + "&ddMainPanel=" + ddMainPanel, true);
    xmlhttp.send();

}
//**************************** Show Paid Udhaar Details *****************************************
function showPaidUdhaarDetailsDiv(custId, firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "hidden";
            document.getElementById("custUdhaarDetailsDiv").innerHTML = xmlhttp.responseText;
        } else {
            //document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omuucpud" + default_theme + ".php?custId=" + custId + "&firmId=" + firmId + "&displayTotalColumn=No", true);
    xmlhttp.send();
}
//**************************** Delete Udhaar Details *****************************************
/*********Start code to add Pay UdharDeposit Monye  @Author:GANGADHAR08JUL2020************************/
function PayudhaarDepositMonye(udhaarPaidAmt, custId, udhaarId, firmId, udhaarPreSerialNum, udhaarSerialNum, udhaarDate, udhaarAmtLeft) {
    //var paymInfo = document.getElementById("udhaarPayOtherInfo").value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("UdhaarDepositDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
    if (udhaarPaidAmt == 0) {
        alert('Please First Enter Deposit amount.');
//        document.getElementById("depositAmt<?php echo $udCounter; ?>').focus;
    } else {
        xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + custId + "&udhaarAmtLeft=" + udhaarAmtLeft + "udhaarId=" + udhaarId +
                "&firmId=" + firmId + "&PreInvoiceNo=" + udhaarPreSerialNum + "&PostInvoiceNo=" + udhaarSerialNum + "&udhaarDate=" + udhaarDate + "&udhaarPaidAmt=" + udhaarPaidAmt + "&paymentPanelName=UdhaarPayment", true);
        xmlhttp.send();
    }
}
/******************End code to add Pay UdharDeposit Monye @Author:GANGADHAR08JUL2020***************/
/******************Start code to add udhaarJrnlId @Author:PRIYA12APR14***************/
/*********Start code to add var @Author:PRIYA14APR14************************/
function deleteCustUdhaarDetails(custId, firmId, udhaarId, udhaarJrnlId, uSerialNum, uDate, uAmt) {
//    alert(uAmt);
    document.getElementById("ajaxLoadUdhaarDepositMon" + udhaarId).style.visibility = "visible";
    confirm_box = confirm("Do you really want to Permanent Delete this Udhaar Details?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ajaxLoadUdhaarDepositMon" + udhaarId).style.visibility = "hidden";
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("ajaxLoadUdhaarDepositMon" + udhaarId).style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omccdelc" + default_theme + ".php?custId=" + custId + "&firmId=" + firmId + "&udhaarId=" + udhaarId
                + "&udhaarJrnlId=" + udhaarJrnlId + "&uSerialNum=" + uSerialNum + "&uDate=" + uDate + "&uAmt=" + uAmt, true);
        xmlhttp.send();
    } else {
        document.getElementById("ajaxLoadUdhaarDepositMon" + udhaarId).style.visibility = "hidden";
    }
}
/*********End code to add var @Author:PRIYA14APR14************************/
/******************End code to add udhaarJrnlId @Author:PRIYA12APR14***************/
//**************************** Delete Udhaar Details from Uhaar Panel *****************************************
/*****************Start code to add page number @Author:PRIYA17JUN14*********/
function deleteCustUdhaarDetailsFromUdhaarPanel(custId, udhaarId, DeleteFrom, pageNum, uSerialNum, uDate, uAmt) {

    document.getElementById("udhaarDeleteFromUdhaarPanelButt" + udhaarId).innerHTML = "<img src='images/loading16.gif' />";
    confirm_box = confirm("Do you really want to Permanent Delete this Udhaar Details?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("udhaarDeleteFromUdhaarPanelButt" + udhaarId).innerHTML = "<img src='images/ajaxClose.png' />";
                document.getElementById("udhaarListPanelDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("udhaarDeleteFromUdhaarPanelButt" + udhaarId).innerHTML = "<img src='images/loading16.gif' />";
            }
        };
        xmlhttp.open("POST", "include/php/omccdelc" + default_theme + ".php?udhaarStatus=" + DeleteFrom + "&custId=" + custId + "&udhaarId=" + udhaarId + "&pageNum=" + pageNum
                + "&uSerialNum=" + uSerialNum + "&uDate=" + uDate + "&uAmt=" + uAmt, true);
        xmlhttp.send();
    } else {
        document.getElementById("udhaarDeleteFromUdhaarPanelButt" + udhaarId).innerHTML = "<img src='images/ajaxClose.png' />";
    }
}
/*****************End code to add page number @Author:PRIYA17JUN14*********/
//**************************** Delete Udhaar Deposit Details from Uhaar Panel *****************************************
/*********Start Code To Add uDepJrnlId @Author:PRIYA18AUG13*******************/
function deleteCustUdhaarDepDetailsFromUdhaarPanel(custId, udhaarDepId, DeleteFrom, uDepJrnlId) {

    document.getElementById("udhaarDeleteFromUdhaarDepPanelButt" + udhaarDepId).innerHTML = "<img src='images/loading16.gif' />";
    confirm_box = confirm("Do you really want to Permanent Delete this Udhaar Deposit Details?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("udhaarDeleteFromUdhaarDepPanelButt" + udhaarDepId).innerHTML = "<img src='images/ajaxClose.png' />";
                document.getElementById("udhaarListPanelDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("udhaarDeleteFromUdhaarDepPanelButt" + udhaarDepId).innerHTML = "<img src='images/loading16.gif' />";
            }
        };
        xmlhttp.open("POST", "include/php/omuddpam" + default_theme + ".php?udhaarStatus=" + DeleteFrom + "&custId=" + custId + "&udhaarDepId=" + udhaarDepId + "&uDepJrnlId=" + uDepJrnlId, true);
        xmlhttp.send();
    } else {
        document.getElementById("udhaarDeleteFromUdhaarDepPanelButt" + udhaarDepId).innerHTML = "<img src='images/ajaxClose.png' />";
    }
}
/*********End Code To Add uDepJrnlId @Author:PRIYA18AUG13*******************/
//**************************** Navigate Transaction List *****************************************
function navigateTransactionList(transactionCat) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadNavigateTransactionList").style.visibility = "hidden";
            document.getElementById("transactionListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadNavigateTransactionList").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omttlisd" + default_theme + ".php?transactionCat=" + transactionCat, true);
    xmlhttp.send();
}
//**************************** Delete Transaction Details *****************************************
/*************Change in function @AUTHOR: SANDY06JAN14*********/
/*************Start code to add transJrnlId @Author:PRIYA12APR14*********************/
/*************Start code to add var @Author:PRIYA14APR14*********************/
function deleteTransaction(transactionCat, transId, transJrnlId, transUId, transAmt, transDOB, transFirmId, transSub, transPanel) {
    document.getElementById("deleteTransactionButt").innerHTML = "<img src='images/loading16.gif' />";
    confirm_box = confirm("Do you really want to Permanent Delete this Transaction Details?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("deleteTransactionButt").innerHTML = "<img src='images/ajaxClose.png' />";
                document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("deleteTransactionButt").innerHTML = "<img src='images/loading16.gif' />";
            }
        };
        xmlhttp.open("POST", "include/php/omtdtrns" + default_theme + ".php?transactionCat=" + transactionCat + "&transId=" + transId + "&transJrnlId=" + transJrnlId
                + "&transUId=" + transUId + "&transAmt=" + transAmt + "&transDOB=" + transDOB + "&transFirmId=" + transFirmId + "&transSub=" + transSub
                + "&transPanel=" + transPanel, true); // transPanel PARAMETER ADDED @AUTHOR:SHRI14AUG20
        xmlhttp.send();
    } else {
        document.getElementById("deleteTransactionButt").innerHTML = "<img src='images/ajaxClose.png' />";
    }
}
/*************End code to add var @Author:PRIYA14APR14*********************/
/*************End code to add transJrnlId @Author:PRIYA12APR14*********************/
/*************Change in function @AUTHOR: SANDY06JAN14*********/
//**************************** Get Girvi Info Pop UP *****************************************
function getGirviBarCodeSlip(custId, girviId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_barcode_slip").innerHTML = xmlhttp.responseText;
            document.getElementById('myModal').style.display = "block";
            document.getElementById('myModal').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_barcode_slip").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/olggbcsp" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId, true); //change in filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
//

//
function OpenbarcodeModal(custId, girviId) {
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
    xmlhttp.open("POST", "include/php/olggbcsp" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId, true); //change in filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
//
function closeBarCode()
{
    document.getElementById('myModal').style.display = 'none';
}
//

//**************************** Hide Girvi Info POP UP *****************************************
function getGirviBarCodeSlipHide() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_barcode_slip").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_barcode_slip").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Search Bar Code Function *************************************
/****************** Start Code To Comment SellPurchase Item BarCode @AUTHOR:PRIYA07MArch13*********************/
/************Start code to add shortcut for cust email @Author:PRIYA25JUN14******************/
function valSearchBarCodeInputs(barCode) {

    var barCodeFirstLetter = barCode.substr(0, 1);
    if (validateEmptyField(barCode, "Please enter Bar Code 'or' Serial Number!") == false) {
        document.getElementById("barcode_text").focus();
        return false;
    } else {
        if (barCodeFirstLetter == 'S' || barCodeFirstLetter == 's' || barCode.lenght >= 20 ||
                barCodeFirstLetter == 'J' || barCodeFirstLetter == 'j' ||
                barCodeFirstLetter == 'G' || barCodeFirstLetter == 'g' ||
                barCodeFirstLetter == 'L' || barCodeFirstLetter == 'l' ||
                barCodeFirstLetter == 'T' || barCodeFirstLetter == 't' ||
                barCodeFirstLetter == 'C' || barCodeFirstLetter == 'c' ||
                barCodeFirstLetter == 'P' || barCodeFirstLetter == 'p' ||
                barCodeFirstLetter == 'A' || barCodeFirstLetter == 'a' ||
                barCodeFirstLetter == 'Q' || barCodeFirstLetter == 'q' ||
                barCodeFirstLetter == 'W' || barCodeFirstLetter == 'w' ||
                barCodeFirstLetter == 'E' || barCodeFirstLetter == 'e' ||
                barCodeFirstLetter == 'I' || barCodeFirstLetter == 'i' ||
                barCodeFirstLetter == 'B' || barCodeFirstLetter == 'b' ||
                barCodeFirstLetter.toLowerCase(barCodeFirstLetter) == 'm' ||
                barCodeFirstLetter == 'R' || barCodeFirstLetter == 'r' || //OMUNIM SEARCH : Search Product with RFID No. @PRIYANKA-10FEB19
                barCodeFirstLetter == 'H' || barCodeFirstLetter == 'h' || //OMUNIM SEARCH : Search Product with H-UID : @DARSHANA 11 AUG 2021
                barCodeFirstLetter == 0 || barCodeFirstLetter == '0' ||
                barCodeFirstLetter == 1 || barCodeFirstLetter == '1' ||
                barCodeFirstLetter == 2 || barCodeFirstLetter == '2' ||
                barCodeFirstLetter == 3 || barCodeFirstLetter == '3' ||
                barCodeFirstLetter == 4 || barCodeFirstLetter == '4' ||
                barCodeFirstLetter == 5 || barCodeFirstLetter == '5' ||
                barCodeFirstLetter == 'D' || barCodeFirstLetter == 'd') {
            return true;
        } else {
            alert("Please enter correct Bar Code 'or' Serial Number!");
            document.getElementById("barcode_text").focus();
            return false;
        }
    }
    return true;
}

function search_bar_code(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchBarCode;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchBarCode() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        document.getElementById("barcode_text").value = '';
        document.getElementById("barcode_text").focus();
        //refreshMainRightDiv();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/* Start change in function searchBarCode @AUTHOR: SANDY29JUL13 */
/***************Start code to add item barcode @Author:PRIYA30NOV13***************/
function searchBarCode(barCode, firmId) {
    var prodcode = barCode;
    var panelName = document.getElementById('barcodelist').value;
    if (panelName == 'finejewellerywithItemCode') {
        barCode = 'P' + barCode;
    } else if (panelName == 'finejewellerywithbarcode') {
        barCode = '1' + barCode;
    } else if (panelName == 'ImtJewelleryWithItemCode') {
        barCode = 'A' + barCode;
    } else if (panelName == 'imtbarcod') {
        barCode = '2' + barCode;
    } else if (panelName == 'customerId') {
        barCode = 'C' + barCode;
    } else if (panelName == 'emailId') {
        barCode = 'M' + barCode;
    } else if (panelName == 'loyalityCard') {
        barCode = '2' + barCode;
    } else if (panelName == 'SterlingJewelleryWithItmCode') {
        barCode = 'B' + barCode;
    } else if (panelName == 'SterlingJewelleryBarcode') {
        barCode = '1' + barCode;
    } else if (panelName == 'HallMarkUID') {
        barCode = 'H' + barCode;
    } else if (panelName == 'QuotationSerial') {
        barCode = 'Q' + barCode;
    } else if (panelName == 'loanserial') {
        barCode = 'S' + barCode;
    } else if (panelName == 'transferloan') {
        barCode = 'T' + barCode;
    } else if (panelName == 'QuotationInvoice') {
        barCode = 'O' + barCode;
    } else {
        barCode = barCode;
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr;
    var barCodeLen = barCode.length;
    var barCodeTemp = barCode;
    var tempLen = barCodeLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;
    while (tempLen > 0) {
        //a-zA-Z0-9
        field = barCodeTemp.substr(0, 1);
        barCodeTemp = barCodeTemp.substr(1);
        if (field.match(alphaExp)) {
            charLen = charLen + 1;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }
    //
    var barCodeFirstLetter = barCode.substr(0, 1);
    var barCodeSecondLetter = barCode.substr(1, 1);
    var barCodeCharPart = barCode.substr(0, charLen);
    var barCodeNumPart = barCode.substr(charLen);
    var girviSerialNo = barCode.substr(1);
    var hallmarkUid = barCode;
    //
    hallmarkUIDstr = "preId=" + encodeURIComponent(hallmarkUid);
    //
    girviPoststr = "grvSerialNo=" + encodeURIComponent(girviSerialNo); //Serach Girvi
    var prebarCodeCharPart = barCode.substr(1, (charLen - 1));
    if (firmId != '' && firmId != null)
    {
        var quoPrebarCodeCharPart = prebarCodeCharPart + 'IQ' + firmId;
        var quaBarCodeNumPart = barCodeNumPart.substring(1);
    } else {
        var quoPrebarCodeCharPart = prebarCodeCharPart + 'IQ';
        var quaBarCodeNumPart = barCodeNumPart;
    }
    quotPoststr = "qtySerialNo=" + encodeURIComponent(girviSerialNo) + "&panelName=Estimate&sellPanelName=Estimate&panelDivName=StockEstimate&srchPreInvNo=" + quoPrebarCodeCharPart + "&srchInvNo=" + quaBarCodeNumPart; //Serach Quotation
    //
    if (firmId != '' && firmId != null)
    {
        var quoPurPrebarCodeCharPart = prebarCodeCharPart + 'IQP' + firmId;
        var quaPurBarCodeNumPart = barCodeNumPart.substring(1);
    } else {
        var quoPurPrebarCodeCharPart = prebarCodeCharPart + 'IQP';
        var quaPurBarCodeNumPart = barCodeNumPart;
    }
    //
    quotPurPoststr = "qtySerialNo=" + encodeURIComponent(girviSerialNo) + "&panelName=PurchaseQuotationList&sellPanelName=PurchaseQuotationList&panelDivName=PurchaseQuotationList&srchPreInvNo=" + quoPurPrebarCodeCharPart + "&srchInvNo=" + quaPurBarCodeNumPart; //Serach Quotation
    // alert('barCodeCharPart'+barCodeCharPart + 'barCodeNumPart'+barCodeNumPart);
    poststr = "preId=" + encodeURIComponent(barCodeCharPart) +
            "&postId=" + encodeURIComponent(barCodeNumPart) +
            "&prodcode=" + encodeURIComponent(prodcode);
    //start Code Search Stock @Author : Vinod :19-08-2023
    let barCodeArray = barCode.split("");
    let length = barCodeArray.length;
    let strPreId = '';
    let strPostId = '';
    let st = false;
    for (let i = length - 1; i >= 0; i--)
    {
        if (isNaN(barCodeArray[i]) || st)
        {
            st = true;
            strPreId += barCodeArray[i];
        } else {
            strPostId += barCodeArray[i];
        }
    }
    strPreId = strPreId.split("").reverse().join("");
    strPostId = strPostId.split("").reverse().join("");
    P_Poststr = "preId=" + encodeURIComponent(strPreId) +
            "&postId=" + encodeURIComponent(strPostId);
    //End Code Search Stock @Author : Vinod :19-08-2023
    //
    if (valSearchBarCodeInputs(barCode, barCodeCharPart)) {
        if (barCodeFirstLetter == 'R' || barCodeFirstLetter == 'r' || barCode.length >= 20) { //OMUNIM SEARCH : Search Product with RFID No. @PRIYANKA-10FEB19
            poststr = "ItemId=" + encodeURIComponent(barCodeNumPart) +
                    "&rfidNo=" + encodeURIComponent(barCode);
            search_bar_code('include/php/ogidsbdv' + default_theme + '.php', poststr);
        } else if (barCodeFirstLetter == 'S' || barCodeFirstLetter == 's') {
            search_bar_code('include/php/olgssndv' + default_theme + '.php', girviPoststr); //change in filename @AUTHOR: SANDY21NOV13
        } else if (barCodeFirstLetter == 'G' || barCodeFirstLetter == 'g') {
            poststr = "girviId=" + encodeURIComponent(barCodeNumPart);
            search_bar_code('include/php/olgsgidd' + default_theme + '.php', poststr); //change in filename @AUTHOR: SANDY22NOV13
        } else if (barCodeFirstLetter == 'T' || barCodeFirstLetter == 't') {
            search_bar_code('include/php/olgtsrch' + default_theme + '.php', poststr + "&searchPanel=TransLoanSearch"); //change in filename @AUTHOR: SANDY22NOV13//filename added @Author:PRIYA12NOV14
        } else if (barCodeFirstLetter == 'C' || barCodeFirstLetter == 'c') {
            search_bar_code('include/php/omcdccdd' + default_theme + '.php', poststr);
        } else if (barCodeFirstLetter == 'X' || barCodeFirstLetter == 'x') {
            search_bar_code('include/php/omcdccdd' + default_theme + '.php', poststr);
        } else if (barCodeFirstLetter == 'P' || barCodeFirstLetter == 'p') {
            search_bar_code('include/php/ogidsbdv' + default_theme + '.php', P_Poststr);
        } else if (barCodeFirstLetter == 'A' || barCodeFirstLetter == 'a') {
            search_bar_code('include/php/ogijdsbdv' + default_theme + '.php', poststr);
        } else if (barCodeFirstLetter == 'W' || barCodeFirstLetter == 'w') {
            search_bar_code('include/php/ogwhmndv' + default_theme + '.php', poststr);
        } else if (barCodeFirstLetter == 'L' || barCodeFirstLetter == 'l') {
            search_bar_code('include/php/omcdccdd' + default_theme + '.php', poststr);
        } else if (barCodeFirstLetter == 'B' || barCodeFirstLetter == 'b') {
            search_bar_code('include/php/ogijdsbdv' + default_theme + '.php', poststr);
        } else if (barCodeFirstLetter == 'E' || barCodeFirstLetter == 'e') {
            search_bar_code('include/php/omehmndv' + default_theme + '.php', poststr);
        } else if ((barCodeFirstLetter == 'A' || barCodeFirstLetter == 'a' ||
                barCodeFirstLetter == 2 || barCodeFirstLetter == 3 ||
                (barCodeFirstLetter == 0 && barCodeSecondLetter == 2) ||
                (barCodeFirstLetter == 0 && barCodeSecondLetter == 3)) && barCodeNumPart != '') {
            poststr = "ItemId=" + encodeURIComponent(barCodeNumPart);
            search_bar_code('include/php/ogijdsbdv' + default_theme + '.php', poststr);

        } else if (((barCodeFirstLetter == 'I' || barCodeFirstLetter == 'i' ||
                barCodeFirstLetter == 1) ||
                (barCodeFirstLetter == 0 && barCodeSecondLetter == 1)) && barCodeNumPart != '') {
            poststr = "ItemId=" + encodeURIComponent(barCodeNumPart) +
                    "&rfidNo=" + encodeURIComponent(barCode);
            search_bar_code('include/php/ogidsbdv' + default_theme + '.php', poststr);
        } else if ((barCodeFirstLetter == 'J' || barCodeFirstLetter == 'j' ||
                barCodeFirstLetter == 4 || barCodeFirstLetter == 5 ||
                (barCodeFirstLetter == 0 && barCodeSecondLetter == 4) ||
                (barCodeFirstLetter == 0 && barCodeSecondLetter == 5)) && barCodeNumPart != '') {
            search_bar_code("include/php/ogcrisbd" + default_theme + ".php?preId=" + encodeURIComponent(barCodeCharPart) +
                    "&postId=" + encodeURIComponent(barCodeNumPart), +poststr);
        } else if (barCodeFirstLetter.toLowerCase(barCodeFirstLetter) == 'm' ||
                barCodeFirstLetter.toLowerCase(barCodeFirstLetter) == 'M') {
            search_bar_code('include/php/omccsccl' + default_theme + '.php', poststr + "&searchPanel=" + 'EmailSearch');
        } else if (barCodeFirstLetter == 'IS') {
            window.open('<?php echo $documentRootBSlash; ?>/include/php/ogspinvo' + default_theme + '.php?userId=<?php echo "$custId"; ?>&slPrPreInvoiceNo=<?php echo "$slPrPreInvoiceNo"; ?>&slPrInvoiceNo=<?php echo "$slPrInvoiceNo"; ?>&slprinSubPanel=<?php echo "$slprinSubPanel"; ?>&invoiceDate=<?php echo "$slPrAddDate"; ?>&invoicePanel=formatA41',
                    'popup', 'width=850,height=850,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
        } else if (barCodeFirstLetter == 'H' || barCodeFirstLetter == 'h') { //OMUNIM SEARCH : Search Product with H-UID @DARSHANA 11 AUG 2021
            search_bar_code('include/php/ogidsbdv' + default_theme + '.php', hallmarkUIDstr);
        } else if ((barCodeFirstLetter == 'Q' || barCodeFirstLetter == 'q') && (barCodeSecondLetter == 'P' || barCodeSecondLetter == 'p')) {
            search_bar_code("include/php/omqpssndv" + default_theme + ".php", quotPurPoststr);
        } else if (barCodeFirstLetter == 'Q' || barCodeFirstLetter == 'q') {
            search_bar_code("include/php/omqssndv" + default_theme + ".php", quotPoststr);
        } else if (barCodeFirstLetter == 'D' || barCodeFirstLetter == 'd') {
            search_bar_code("include/php/ogcrisbd" + default_theme + ".php", poststr);
        }

    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
/************End code to add shortcut for cust email @Author:PRIYA25JUN14******************/
/*************** End code to add item barcode @Author:PRIYA30NOV13***************/
/* End change in function searchBarCode @AUTHOR: SANDY29JUL13 */
/******************** End Code To Comment SellPurchase Item BarCode @AUTHOR:PRIYA07MArch13**********************/
//********** Start Bar Code Print Panel Swapping *************************************************************/
var setBarCodeSlipDiv = '';
var setBarCodeSlipContainer = '';
var setBarCodeSlipContainer2 = '';
var setCloseDiv = '';
var setCloseContainer = '';
var setCloseContainer2 = '';
function moveBarCodeSlip(barCodeSlipDiv, closeDivId) {
    if (setBarCodeSlipDiv == '') {

        setBarCodeSlipDiv = barCodeSlipDiv;
        setCloseDiv = closeDivId;
        setBarCodeSlipContainer = document.getElementById(setBarCodeSlipDiv).innerHTML;
        setCloseContainer = document.getElementById(setCloseDiv).innerHTML;
        document.getElementById(closeDivId).innerHTML = "<img src='images/loading16.gif' />";
    } else if (barCodeSlipDiv != setBarCodeSlipDiv) {
        setBarCodeSlipContainer2 = document.getElementById(barCodeSlipDiv).innerHTML;
        setCloseContainer2 = document.getElementById(closeDivId).innerHTML;
        document.getElementById(barCodeSlipDiv).innerHTML = setBarCodeSlipContainer;
        document.getElementById(setBarCodeSlipDiv).innerHTML = setBarCodeSlipContainer2;
        document.getElementById(closeDivId).innerHTML = setCloseContainer;
        document.getElementById(setCloseDiv).innerHTML = setCloseContainer2;
        setBarCodeSlipDiv = '';
        setBarCodeSlipContainer = '';
        setBarCodeSlipContainer2 = '';
        setCloseDiv = '';
        setCloseContainer = '';
        setCloseContainer2 = '';
    }
}
//End Bar Code Print Panel Swapping
//
//Close Girvi Bar Code SLip *************************************************************************
function closeBarCodeSlip(barCodeSlipDiv, closeDivId, barCodePrintId) {
    confirm_box = confirm("Do you really want to Delete this Bar Code Girvi Slip?");
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
        xmlhttp.open("POST", "include/php/olgrbcpp" + default_theme + ".php?barCodePrintId=" + barCodePrintId, true); //change in filename @AUTHOR: SANDY21NOV13
        xmlhttp.send();
    }

    function closeBarCodeSlipCloseButt()
    {
        document.getElementById(closeDivId).innerHTML = "";

    }
}
// add Function
function getBarcodeProdName(ProdName, id, div, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('selectItembyname').focus();
                document.getElementById('selectItembyname').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogibbc20x12GetProdNm" + default_theme + ".php?prodname=" + ProdName + "&id=" + id + "&div=" + div + "&panel=" + panel, true);
    xmlhttp.send();
}
// start  Code For SOrt by Product Nname On multi lable Panel////
function sendProdName(ProdName) {
//alert(ProdName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            document.getElementById('SortByProdName').innerHTML = xmlhttp.responseText;
        }
    };
//    xmlhttp.open("POST", "include/php/ogibbc20x12" + default_theme +".php?prodname=" + ProdName, true);
    xmlhttp.open("POST", "include/php/omstockTransibbc20x12" + default_theme + ".php?prodname=" + ProdName, true);
    xmlhttp.send();
}


function sendProdId(ProdName, panel) {
    // alert(ProdName);
//alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            document.getElementById('SortByProdName').innerHTML = xmlhttp.responseText;
        }
    };
    if (panel == 'ItemsRFIDBarCodePanel') {
        xmlhttp.open("GET", "include/php/ogRFIDibbc55x13" + default_theme + ".php?printOption=directPRNPrint&panel=" + panel + "&sttrId=" + sttrId + "&page=" + page, true);
    } else {
        xmlhttp.open("POST", "include/php/ogibbc55x13" + default_theme + ".php?prodid=" + ProdName + "&panel=" + panel, true);
    }
    xmlhttp.send();
}
function sendProdIMId(ProdName, panel) {
//    alert(ProdName);
//    alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('SortByProdName').innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", "include/php/ogibbc55x13imi" + default_theme + ".php?prodid=" + ProdName + "&panel=" + panel, true);
    xmlhttp.send();
}
// End Code For Sort By Product Name On Multilable//////
function directPRNPrint(panel, page)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'ItemsRFIDBarCodePanel') {
        xmlhttp.open("GET", "include/php/omstockTransRFIDibbc55x13dv" + default_theme + ".php?printOption=directPRNPrint&panel=" + panel + "&sttrId=" + sttrId + "&page=" + page, true);
    } else if (panel == 'Items55x13IMBarCodePanel') {
        xmlhttp.open("GET", "include/php/omstockTransibbc55x13imidv" + default_theme + ".php?printOption=directPRNPrint&panel=" + panel + "&page=" + page, true);
    } else
    {
        xmlhttp.open("GET", "include/php/omstockTransibbc55x13dv" + default_theme + ".php?printOption=directPRNPrint&panel=" + panel + "&page=" + page, true);
    }
    xmlhttp.send();
}
//
// Start Code to Create New Function for DIRECT PRINT PRN - Tail Label @PRIYANKA-11MAR19
function directPRNPrintTailLabel(panel, sttrId, page, girv_cust_id, girv_firm_id) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var poststr = "printOption=directPRNPrint"
            + "&sttrId=" + encodeURIComponent(sttrId)
            + "&panel=" + encodeURIComponent(panel)
            + "&page=" + encodeURIComponent(page)
            + "&girv_cust_id=" + encodeURIComponent(girv_cust_id)
            + "&girv_firm_id=" + encodeURIComponent(girv_firm_id);
    //&setQuantity=Yes
    if (panel == 'ItemsRFIDBarCodePanel') {
        xmlhttp.open("GET", "include/php/omstockTransRFIDibbc55x13dv" + default_theme + ".php?printOption=directPRNPrint&panel=" + panel + "&sttrId=" + sttrId + "&page=" + page, true);
    } else if (panel == 'Items55x13IMBarCodePanel') {
        xmlhttp.open("GET", "include/php/omstockTransibbc55x13imidv" + default_theme + ".php?printOption=directPRNPrint&panel=" + panel + "&sttrId=" + sttrId + "&page=" + page, true);
    } else if (panel == 'Items55x13LoanBarCodePanel') {
        xmlhttp.open("GET", "include/php/olggbc55x13dv" + default_theme + ".php?" + poststr, true);
    } else {
        xmlhttp.open("GET", "include/php/omstockTransibbc55x13dv" + default_theme + ".php?printOption=directPRNPrint&panel=" + panel + "&sttrId=" + sttrId + "&page=" + page, true);
    }
    xmlhttp.send();
}
//
// End Code to Create New Function for DIRECT PRINT PRN - Tail Label @PRIYANKA-11MAR19
// 
// *************************************************************************************************************
// START CODE FOR XRF PRN PRINT OPTION @AUTHOR SIMRAN-29JUNE2022
// *************************************************************************************************************
function directXrfPrnPrint(panelName, custId, firm_long_name, firm_address, user_mobile, xrf_pre_bill_no, xrf_bill_no, bill_date, bill_time, userName, xrf_prod_name, xrf_prod_gs_weight, xrf_purity, xrf_avg_purity, xrf_karat, page) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('XRFPrint').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //&setQuantity=Yes

    xmlhttp.open("GET", "include/php/omXrfPrnPrint" + default_theme + ".php?printOption=directXRFPrnPrint&panelName=" + panelName + "&custId=" + custId + "&firm_long_name=" + firm_long_name + "&firm_address=" + firm_address + "&user_mobile=" + user_mobile + "&xrf_pre_bill_no=" + xrf_pre_bill_no + "&xrf_bill_no=" + xrf_bill_no + "&bill_date=" + bill_date + "&bill_time=" + bill_time + "&userName=" + userName + "&xrf_prod_name=" + xrf_prod_name + "&xrf_prod_gs_weight=" + xrf_prod_gs_weight + "&xrf_purity=" + xrf_purity + "&xrf_avg_purity=" + xrf_avg_purity + "&xrf_karat=" + xrf_karat + "&page=" + page, true);
    xmlhttp.send();
}
// *************************************************************************************************************
// END CODE FOR XRF PRN PRINT OPTION @AUTHOR SIMRAN-29JUNE2022
// *************************************************************************************************************

function printBarCodeA4Sheet(obj) {

    var DocumentContainer = document.getElementById(obj);
    var html = '<html><head><title>Online Munim - Print Page    www.OnlineMunim.com     www.omunim.com</title>' +
            '<link href="css/index.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/ogcss.css" rel="stylesheet" type="text/css" />' +
            '<link href="css/orcss.css" rel="stylesheet" type="text/css" />' +
            '<script type="text/javascript" src="scripts/emNavigation.js"></script>' +
            '<script type="text/javascript" src="scripts/ogNavFunctions.js"></script>' +
            '</head><body>' +
            DocumentContainer.innerHTML +
            '<br />' +
            '<a style="cursor: pointer;" onClick="window.print();" class="noPrint"><img src="images/printer32.png" alt="Print" title="Print" width="32px" height="32px" /></a>' +
            '<br />' +
            '<br />' +
            '</body></html>';
    var WindowObject = window.open("", "PrintWindow", "width=1000,height=1000,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");
    WindowObject.document.open();
    WindowObject.document.writeln(html);
    WindowObject.document.close();
    WindowObject.focus();
}
//********* Ads Navigation *****
var adnum = 6;
function adsNavigation() {
    if (adnum == 6) {
        url = "<a href='http://www.onlinemunim.com' target='_blank'><img src='images/ads/kirana-store-software.png' /></a>";
        adnum = 1;
    } else if (adnum == 5) {
        url = "<a href='http://www.softwaregen.com' target='_blank'><img src='images/ads/website-design-softwaregen.png' /></a>";
        adnum = adnum + 1;
    } else if (adnum == 4) {
        url = "<a href='http://www.onlinemunim.com' target='_blank'><img src='images/ads/mobile-shop-software.png' /></a>";
        adnum = adnum + 1;
    } else if (adnum == 3) {
        url = "<a href='http://www.softwaregen.com' target='_blank'><img src='images/ads/web-hosting-softwaregen.png' /></a>";
        adnum = adnum + 1;
    } else if (adnum == 2) {
        url = "<a href='http://www.onlinemunim.com' target='_blank'><img src='images/ads/ready-made-garments-billing-software.png' /></a>";
        adnum = adnum + 1;
    } else if (adnum == 1) {
        url = "<a href='http://www.omunim.com/' target='_blank'><img src='images/ads/medical-store-billing-software.png' /></a>";
        adnum = adnum + 1;
    } else {
        url = "<a href='http://www.softwaregen.com' target='_blank'><img src='images/ads/softwaregen-offers.png' /></a>";
        adnum = adnum + 1;
    }
    var element = document.getElementById('newOmunimAdsDiv');
    //
    if (typeof (element) != 'undefined' && element != null)
    {
        document.getElementById('newOmunimAdsDiv').innerHTML = url;
    }
    setTimeout("adsNavigation()", 4000);
}
//********* Ads Navigation *****
var adMainIntroNum = 1;
function adsMainIntroNavigation() {
    var url = "<img src='images/oMunimIntro" + adMainIntroNum + ".png' alt='Welcome to oMunim Girvi Software' />";
    var element = document.getElementById('oMunimIntroAdsDiv');
    //
    if (typeof (element) != 'undefined' && element != null)
    {
        document.getElementById('oMunimIntroAdsDiv').innerHTML = url;
    }
    //document.getElementById('oMunimIntroAdsDiv').innerHTML = url;
    if (adMainIntroNum == 3) {
        adMainIntroNum = adMainIntroNum - 2;
    } else {
        adMainIntroNum = adMainIntroNum + 1;
    }
    setTimeout("adsMainIntroNavigation()", 5000);
}
//**************************** Display Transfer Girvi Panel *****************************************
function getGirviTransPanel(documentRootPath, girviId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("display_girvi_transfer_div").style.visibility = "visible";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText; //change in division @AUTHOR: SANDY28NOV13
        } else {
            //document.getElementById("display_girvi_transfer_div").style.visibility = "visible";
            //document.getElementById("display_girvi_transfer_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/olgggtpn" + default_theme + ".php?girviId=" + girviId, true); //change in filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
//**************************** Hide Girvi Info POP UP *****************************************
function hideGirviTransPanel(documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_transfer_div").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_transfer_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Display Transfer Girvi Details *****************************************
/****************Start Code To Pass xmlhttpStr as responseText @Author:PRIYA29JUN13************/
/***************Start to change function @AUTHOR: SANDY27DEC13************/
function getTransGirviDetails(documentRootPath, girviId, prinType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("display_girvi_transfer_div").style.visibility = "visible";
            //var xmlhttpStr = xmlhttp.responseText;
            //xmlhttpStr = xmlhttpStr.slice(xmlhttpStr.indexOf("@") + 1);
            //xmlhttpStr = xmlhttpStr.slice(xmlhttpStr.indexOf("@") + 1);
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText; //change in division @AUTHOR: SANDY29NOV13
        } else {
            //document.getElementById("display_girvi_transfer_div").style.visibility = "visible";
            //document.getElementById("display_girvi_transfer_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/olggtgvd" + default_theme + ".php?girviId=" + girviId + "&prinType=" + prinType, true); //change in filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
/***************End to change function @AUTHOR: SANDY27DEC13************/
/****************End Code To Pass xmlhttpStr as responseText @Author:PRIYA29JUN13************/
//************************** Search Item Names to Add New Girvi ***************************************
/**********Start Code To Add Jwellery Panel Div @AUTHOR:PRIYA28APR13**********/
var keyCodeForItemNames;
var divNumForItemNames;
var panelNameForItemNames;
function search_item_names(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchItemNames;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchItemNames() {
    /*******Start code to add div for custSlItem @Author:PRIYA24DEC13******/
    /*******Start code to add div @Author:PRIYA13SEP14*******************************/
//change condition from item name to item category @OMMODTAG SHRI_16DEC15
//change condition for utrans_item_name @OMMODTAG ATHU9jun17
    if (panelNameForItemNames == 'addStockItemName' || panelNameForItemNames == 'slItemName' || panelNameForItemNames == 'addItemCategory' || panelNameForItemNames == 'addItemName' || panelNameForItemNames == 'slPrItemName' || panelNameForItemNames == 'sttr_item_category' || panelNameForItemNames == 'utrans_item_name') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelNameForItemNames == 'sttr_item_category') {
                document.getElementById("itemCategoryListDivToAddStock").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("itemListDivToAddStock").innerHTML = xmlhttp.responseText;
            }
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
                document.getElementById('itemListToAddItemSelect').focus();
                document.getElementById('itemListToAddItemSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
    /*******End code to add div @Author:PRIYA13SEP14*******************************/
    /*******End code to add div for custSlItem @Author:PRIYA24DEC13******/
    else if (panelNameForItemNames == 'jewelleryPanel') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemListDivInJewelleryPanel").innerHTML = xmlhttp.responseText;
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
                document.getElementById('itemListJewelleryPanelToAddItemSelect').focus();
                document.getElementById('itemListJewelleryPanelToAddItemSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
    /** Start of code For RePair Panel @AUTHOR:SANDY13SEP13 **/
    else if (panelNameForItemNames == 'addItemRepName') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemListDivToRepair").innerHTML = xmlhttp.responseText;
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
                /****Start of changes in Code @AUTHOR: SANDY23SEP13 ******/
                document.getElementById('itemListDivToRepairItem').focus();
                document.getElementById('itemListDivToRepairItem').options[0].selected = true;
                /****End of changes in Code @AUTHOR: SANDY23SEP13 ******/
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
    /** End of code For Repair Panel @AUTHOR:SANDY13SEP13 **/
    /** Start of code For Add Raw stock @AUTHOR:SANDY24SEP13**/
    else if (panelNameForItemNames == 'addRawStockItemName') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemListDivToaddRawStock").innerHTML = xmlhttp.responseText;
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
                /****Start of changes in Code @AUTHOR: SANDY23SEP13 ******/
                document.getElementById('itemListToaddRawStock').focus();
                document.getElementById('itemListToaddRawStock').options[0].selected = true;
                /****End of changes in Code @AUTHOR: SANDY23SEP13 ******/
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    } else if (panelNameForItemNames == 'ImitationStock') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("categoryListDivToAddStock").innerHTML = xmlhttp.responseText;
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
                document.getElementById('itemListToAddItemSelect').focus();
                document.getElementById('itemListToAddItemSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
    /** End of code For Add Raw stock @AUTHOR:SANDY24SEP13 **/
    /****************************************************************************************/
    else {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemListDivToAddGirvi" + divNumForItemNames).innerHTML = xmlhttp.responseText;
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
                document.getElementById('itemListToAddItemSelect').focus();
                document.getElementById('itemListToAddItemSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
}

function searchItemNames(itemName, metalType, divNum, keyCodeInput) {
    keyCodeForItemNames = keyCodeInput;
    divNumForItemNames = divNum;
    panelNameForItemNames = divNum;
    //document.getElementById("ajaxLoadGetItemListDiv").style.visibility = "visible";

    var poststr = "itemName=" + encodeURIComponent(itemName)
            + "&metalType=" + encodeURIComponent(metalType)
            + "&divNum=" + encodeURIComponent(divNum);
    search_item_names("include/php/omiladgv" + default_theme + ".php", poststr);
}
/**Start to add code for Add Raw Metal @AUTHOR: SANDY25SEP13 ***************/
/**Start to add code for Add Raw Metal @AUTHOR: SHE26FEB16***************/
/**Start to add code for Add Raw Metal @AUTHOR: SHE08MAR16***************/
function searchItemForPanelBlank(divNum, metalCount) {
//    alert(divNum);
//    alert(metalCount);
    if (divNum == 'addStockItemName') {
        document.getElementById("itemListDivToAddStock").innerHTML = '';
    } else if (divNum == 'itemListDivToAddStock') {
        document.getElementById("itemListDivToAddStock").innerHTML = '';
    } else if (divNum == 'stockItemName') {
        document.getElementById("itemListDivInJewelleryPanel").innerHTML = '';
    } else if (divNum == 'addItemRepName') {                                     // for item Repair Panel @AUTHOR: SANDY1AUG13
        document.getElementById("itemListDivToRepair").innerHTML = '';
    } else if (divNum == 'sttr_item_name') {                                     // for raw stock and sell Panel @AUTHOR: SHE26FEB16
        document.getElementById("itemListDivToaddRawStock").innerHTML = '';
    } else if (divNum == 'addRawItemCategory') {                                     // for item Repair Panel @AUTHOR: SANDY1AUG13
        document.getElementById("itemCatgryList").innerHTML = '';
    } else if (divNum == 'rawSell') {                                     // for raw sell Panel @AUTHOR: SHE26FEB16
        document.getElementById("itemListDivToaddRawMetSellStock" + metalCount).innerHTML = '';
    } else if (divNum == 'slItemName') {                                // for raw sell Panel @AUTHOR: SHE26FEB16
        document.getElementById("itemListDivToaddRawCustStock").innerHTML = '';
    } else if (divNum == 'RawStockItemName') {
        document.getElementById("itemListToAddItemSelect").innerHTML = '';
    } else if (divNum == 'addWhStockItemName') {
        document.getElementById("itemListToAddItemSelect").innerHTML = '';
    } else {
        document.getElementById("itemListDivToAddGirvi" + divNum).innerHTML = '';
    }
}
/**End to add code for Add Raw Metal @AUTHOR: SHE08MAR16***************/
/**End to add code for Add Raw Metal @AUTHOR: SHE26FEB16***************/
/**End to add code for Add Raw Metal @AUTHOR: SANDY25SEP13 ***************/
/***************Start code to change func to pass 1 param @Author:PRIYA06JAN14************/
function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32)
        return false;
}
function clearDivision(divName) {
    document.getElementById(divName).innerHTML = '';
}



/***************End code to change func to pass 1 param @Author:PRIYA06JAN14************/
/**********End Code To Add Jwellery Panel Div @AUTHOR:PRIYA28APR13**********/
//********************* Show Udhaar Amount Update Div ***************************
function showUpdUdharAmtDiv(divId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("updUdharAmtDiv" + divId).style.visibility = "visible";
            document.getElementById("updUdharAmtButt" + divId).style.visibility = "hidden";
            document.getElementById("ajaxUpdUdharAmtButt" + divId).style.visibility = "hidden";
            document.getElementById("updUdharAmtTextBox" + divId).focus();
        } else {
            document.getElementById("ajaxUpdUdharAmtButt" + divId).innerHTML = "<img src='images/loading16.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//********************* Show Udhaar Deposit Amount Update Div ****************************
function showUpdUdharDepAmtDiv(divId, depDivId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("updUdharDepAmtDiv" + divId + depDivId).style.visibility = "visible";
            document.getElementById("updUdharDepAmtButt" + divId + depDivId).innerHTML = "";
            document.getElementById("updUdharDepAmtTextBox" + divId + depDivId).focus();
        } else {
            document.getElementById("updUdharDepAmtButt" + divId + depDivId).innerHTML = "<img src='images/loading16.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
//**************************** Change Customer Image Load Option *****************************************
/********** Start Code To Pass custId To Upadate Customer Image @AUTHOR:PRIYA06MARCH13********/
/***********Start code to add panel name @Author:PRIYA25FEB14*************/
/***********Start code to add fingerscan panel @Author:PRIYA27JUN14*********************/
/***********Start code to add panel @Author:PRIYA05SEP14*****************/
/*********************************Start code to add count variables for div tag @Author:SANT25MAY16*****************/
function chngCustImgLoadOpt(chngCustImgLoadOption, custId, count, panelName, selectPhotoId, custImageLoadOptionId, fileNameId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(custImageLoadOptionId).value = chngCustImgLoadOption;
            if (chngCustImgLoadOption == 'Computer') {
                //document.getElementById("webcam_input_div").innerHTML = '';
                document.getElementById("file_input_div" + count).innerHTML = xmlhttp.responseText;
            } else if (chngCustImgLoadOption == 'Webcam' || chngCustImgLoadOption == 'FingerScan') {
                //document.getElementById("file_input_div" + count).innerHTML = '';
                document.getElementById("webcam_input_div" + count).innerHTML = xmlhttp.responseText;
            }

        } else {
            if (chngCustImgLoadOption == 'Computer') {
                //document.getElementById("webcam_input_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
            } else if (chngCustImgLoadOption == 'Webcam' || chngCustImgLoadOption == 'FingerScan') {
                //document.getElementById("file_input_div" + count).innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        }
    };
    if (chngCustImgLoadOption == 'Computer') {
        xmlhttp.open("POST", "include/php/omccpcim" + default_theme + ".php?custId=" + custId + "&count=" + count + "&selectPhotoId=" + selectPhotoId + "&fileNameId=" + fileNameId, true);
    } else if (chngCustImgLoadOption == 'Webcam' || chngCustImgLoadOption == 'FingerScan') {
        xmlhttp.open("POST", "include/php/omccwcif" + default_theme + ".php?custId=" + custId + "&itemDivCount=" + count + "&panelName=" + panelName + "&imageOption=" + chngCustImgLoadOption, true);
    }
    xmlhttp.send();
}
/*********************************End code to add count variables for div tag @Author:SANT25MAY16*****************/
/***********End code to add panel @Author:PRIYA05SEP14*****************/
/***********End code to add fingerscan panel @Author:PRIYA27JUN14*********************/
/***********End code to add panel name @Author:PRIYA25FEB14*************/
/********** End Code To Pass custId To Upadate Customer Image @AUTHOR:PRIYA06MARCH13********/
//**************************** Get Girvi Ledger in Details ********************************
function valGetGirviLedgerDetailsInputs(obj) {
    if (validateSelectField(document.get_girvi_ledger_details_form.girviLedDelFrmDay.value, "Please select from Day!") == false) {
        document.get_girvi_ledger_details_form.girviLedDelFrmDay.focus();
        return false;
    } else if (validateSelectField(document.get_girvi_ledger_details_form.girviLedDelFrmMonth.value, "Please select from Month!") == false) {
        document.get_girvi_ledger_details_form.girviLedDelFrmMonth.focus();
        return false;
    } else if (validateSelectField(document.get_girvi_ledger_details_form.girviLedDelFrmYear.value, "Please select from Year!") == false) {
        document.get_girvi_ledger_details_form.girviLedDelFrmYear.focus();
        return false;
    } else if (validateSelectField(document.get_girvi_ledger_details_form.girviLedDelToDay.value, "Please select to Day!") == false) {
        document.get_girvi_ledger_details_form.girviLedDelToDay.focus();
        return false;
    } else if (validateSelectField(document.get_girvi_ledger_details_form.girviLedDelToMonth.value, "Please select to Month!") == false) {
        document.get_girvi_ledger_details_form.girviLedDelToMonth.focus();
        return false;
    } else if (validateSelectField(document.get_girvi_ledger_details_form.girviLedDelToYear.value, "Please select to Year!") == false) {
        document.get_girvi_ledger_details_form.girviLedDelToYear.focus();
        return false;
    }

    return true;
}
/************Start Code To Change Div Name @Author:PRIYA24JUL13**************/
/************Start Code To Add Condition For OMREVODETAILS @Author:RUTUJA04MAR21**************/
function getGirviLedgerDetails(obj, indicator) {
    if (valGetGirviLedgerDetailsInputs(obj)) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
                document.getElementById("ledgerDetDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
            }
        };
        var poststr = "girviLedgerDetStartDate="
                + encodeURIComponent(document.get_girvi_ledger_details_form.girviLedDelFrmDay.value) + " "
                + encodeURIComponent(document.get_girvi_ledger_details_form.girviLedDelFrmMonth.value) + " "
                + encodeURIComponent(document.get_girvi_ledger_details_form.girviLedDelFrmYear.value)
                + "&girviLedgerDetEndDate="
                + encodeURIComponent(document.get_girvi_ledger_details_form.girviLedDelToDay.value) + " "
                + encodeURIComponent(document.get_girvi_ledger_details_form.girviLedDelToMonth.value) + " "
                + encodeURIComponent(document.get_girvi_ledger_details_form.girviLedDelToYear.value)
                + "&firmId=" + encodeURIComponent(document.getElementById("girviLedgerDetailsFirmName").value);
//        alert(indicator);
        if (indicator == 'OMREVODETAILS') {
            xmlhttp.open("POST", "include/php/ombbglrpdv" + default_theme + ".php?" + poststr, true);
        } else {
            xmlhttp.open("POST", "include/php/ombbgldv" + default_theme + ".php?" + poststr, true);
        }
        xmlhttp.send();
    }
}
//
function getMetalDetails(obj) {
    if (valGetGirviLedgerDetailsInputs(obj)) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
                document.getElementById("MeltingTransactionsListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
            }
        };
        var poststr = "startDate="
                + encodeURIComponent(document.get_girvi_ledger_details_form.girviLedDelFrmDay.value) + " "
                + encodeURIComponent(document.get_girvi_ledger_details_form.girviLedDelFrmMonth.value) + " "
                + encodeURIComponent(document.get_girvi_ledger_details_form.girviLedDelFrmYear.value)
                + "&endDate="
                + encodeURIComponent(document.get_girvi_ledger_details_form.girviLedDelToDay.value) + " "
                + encodeURIComponent(document.get_girvi_ledger_details_form.girviLedDelToMonth.value) + " "
                + encodeURIComponent(document.get_girvi_ledger_details_form.girviLedDelToYear.value)
                + "&selFirmId=" + encodeURIComponent(document.getElementById("selFirmId").value)
                + "&listPanel=SelectItemForMelting";
        xmlhttp.open("POST", "include/php/ogrmmelting" + default_theme + ".php?" + poststr, true);
        xmlhttp.send();
    }
}
/************End Code To Change Div Name @Author:PRIYA24JUL13**************/
/*******Start Code To Add Supplier Id @AUTHOR:PRIYA17MAY13*******/
/*******Start Code To Change In Webcam Func @AUTHOR:PRIYA18MAY13********/
function chngSuppImgLoadOpt(chngSuppImgLoadOption, panelName, suppId) {
    loadXMLDoc();
//    alert(panelName);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("suppImageLoadOption").value = chngSuppImgLoadOption;
            if (chngSuppImgLoadOption == 'Computer') {
                document.getElementById("webcam_input_div").innerHTML = '';
                document.getElementById("file_input_div").innerHTML = xmlhttp.responseText;
            } else if (chngSuppImgLoadOption == 'Webcam') {
                document.getElementById("file_input_div").innerHTML = '';
                document.getElementById("webcam_input_div").innerHTML = xmlhttp.responseText;
            }

        } else {
            if (chngSuppImgLoadOption == 'Computer') {
                document.getElementById("webcam_input_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
            } else if (chngSuppImgLoadOption == 'Webcam') {
                document.getElementById("file_input_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        }
    };
    if (chngSuppImgLoadOption == 'Computer') {
        xmlhttp.open("POST", "include/php/omccpcim" + default_theme + ".php?panelName=" + panelName + "&suppId=" + suppId, true);
    } else if (chngSuppImgLoadOption == 'Webcam') {
        xmlhttp.open("POST", "include/php/omccwcif" + default_theme + ".php?panelName=" + panelName, true); //Start code to pass panel name @Author:PRIYA25FEB14
    }

    xmlhttp.send();
}
/*******End Code To Change In Webcam Func @AUTHOR:PRIYA18MAY13********/
/*******End Code To Add Supplier Id @AUTHOR:PRIYA17MAY13*******/
/******Start of changes in function to navigate to correct page as per new design @AUTHOR: SANDY19NOV13******/
function navigationSupp(pageNo, user) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText; //change in div
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcccldv" + default_theme + ".php?page=" + pageNo + "&user=" + user, true);
    xmlhttp.send();
}
/******End of changes in function to navigate to correct page as per new design @AUTHOR: SANDY19NOV13******/
/*End code PRIYA02 */

/******Start of changes in function to navigate to correct page as per new design @AUTHOR: SANDY19NOV13******/
/*Start code PRIYA02 */
function navigationStaff(pageNo, user) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcccldv" + default_theme + ".php?page=" + pageNo + "&user=" + user, true);
    xmlhttp.send();
}
/******End of changes in function to navigate to correct page as per new design @AUTHOR: SANDY19NOV13******/
/*End code PRIYA02 */


//************************** Search Supplier for Test Box **************************
function search_suppId_for_textField(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchSuppIdForTextField;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchSuppIdForTextField() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("suppListDivToAddItemStock").innerHTML = xmlhttp.responseText;
        if (keyCode == 40 || keyCode == 38) {
            document.getElementById('suppListForTextFieldSelect').focus();
            document.getElementById('suppListForTextFieldSelect').options[0].selected = true;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function searchSuppIdForTextField(suppName, keyCodeInput, mainPanel) {
//
    keyCode = keyCodeInput;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "suppName=" + encodeURIComponent(suppName);
    //
    if (mainPanel == 'AddStockPanel' || mainPanel == 'AddWhStockPanel') {
        var documentRootPath = document.getElementById('documentRootPath').value;
        search_suppId_for_textField(documentRootPath + '/include/php/ogwwswlt' + default_theme + '.php', poststr);
    } else {
        search_suppId_for_textField('include/php/ogwwswlt' + default_theme + '.php', poststr);
    }
}
//************************** Search City TO Add Girvi Blank Panel
/**********Start Code To Change Div @Author:PRIYA24AUG13*************/
function clearSearchSuppPanel() {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function() {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("suppListDivToAddItemStock").innerHTML = xmlhttp.responseText;
//            document.getElementById('addStockSupplierName').focus();
//        }
//        else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//
//    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme +".php", true);
//    xmlhttp.send();
    document.getElementById("suppListDivToAddItemStock").innerHTML = '';
    // document.getElementById('addStockSupplierName').focus();
}
/**********End Code To Change Div @Author:PRIYA24AUG13*************/
/*START code PRIYA24 */
function showAddNewActionItemDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("ajaxCloseAddNewActionItem").style.visibility = "visible";
            document.getElementById("addActionItemDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("taskDescrpn").focus();
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omaimndv" + default_theme + ".php", true);
    xmlhttp.send();
}

function closeAddMoreActionItemTaskDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("ajaxCloseAddNewActionItem").style.visibility = "hidden";
            document.getElementById("addActionItemDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/*END code PRIYA24*/
/*START CODE  TO NAVIGATE ACCOUNT PAGE @AUTHOR: PRIYA18MAR13 */
function navigationAcc(pageNo, firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.barcode_search.barcode_text.focus();
            document.getElementById("accountListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omacacld" + default_theme + ".php?page=" + pageNo + "&firmId=" + firmId, true);
    xmlhttp.send();
}
/*END CODE  TO NAVIGATE ACCOUNT PAGE @AUTHOR: PRIYA18MAR13 */
//**************************** Display Add Stock Payment Division *****************************************
/*********************Start code to change div @Author:PRIYA26NOV13********/
function getAddStockPaymentDiv(documentRootPath, preInvoiceNo, invoiceNo, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelFormDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            document.getElementById("addStockPaymentButtDiv").style.visibility = "hidden";
        }
    };
    if (panelName == 'AddStock' || panelName == 'UpdateStock' || panelName == 'SimilarItem') {
        panelName = 'StockPayment';
    }
    xmlhttp.open("POST", documentRootPath + "/include/php/ogcmiddv" + default_theme + ".php?preInvNo=" + preInvoiceNo + "&postInvNo=" + invoiceNo + "&paymentPanelName=" + panelName, true);
    xmlhttp.send();
}
/*********************End code to change div @Author:PRIYA26NOV13********/
//Start code for forms panel @Author KHUSH05JAN13
//**************************** Navigate Forms Panel *******************************************************************
function navigateFormsPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppfmsp" + default_theme + ".php", true);
    xmlhttp.send();
}
// End code for forms panel @Author KHUSH05JAN13
/*********START CODE TO SET DEF LANG & GET GIRVI NOTICE @AUTHOR: KHUSH06JAN13 ************/
/************Start code to add formSize @Author:PRIYA23APR14*****************/
function setDefLangGetGirNot(defLang, defSize, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppgnsl" + default_theme + ".php?defLang=" + defLang + "&defSize=" + defSize + "&panel=" + panel, true);
    xmlhttp.send();
}
/*********END CODE TO SET DEF LANG & GET GIRVI NOTICE @AUTHOR: KHUSH06JAN13 ************/
/************End code to add formSize @Author:PRIYA23APR14*****************/
//Start code for Add New Language @Author KHUSH06JAN13
/***********Start code to add panel name @Author:PRIYA17APR14***************/
/************Start code to add formSize @Author:PRIYA23APR14*****************/
function getGirviNoticeAddNewLangDiv(panelName, formSize) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppgndv" + default_theme + ".php?panelName=" + panelName + "&formSize=" + formSize, true);
    xmlhttp.send();
}
/************End code to add formSize @Author:PRIYA23APR14*****************/
/***********End code to add panel name @Author:PRIYA17APR14***************/
/*********END CODE to Add New Language @Author KHUSH06JAN13************/
/*********START CODE TO ADD Invoice PAYMENT DIV @AUTHOR:PRIYA13JAN13************/
/*******************Start code To Add Firm Id @AUTHOR:PRIYA12MAY13****************/
/*******************Start code To Change SuppId @AUTHOR:PRIYA13MAY13****************/
/*******************Start code to change function name @Author:PRIYA20SEP13***********/
/*******************Start code to change div @Author:PRIYA26SEP13***********/
function getNwOrPaymentDiv(documentRootPath, newSuppId, custId, newPreInvoiceNo, newInvoiceNo, goldTotalWeight, goldTotalWeightType, silverTotalWeight, silverTotalWeightType,
        totalFinalBalance, firmId, totalItemsQty, totalValuation, nwOrItemLbChrgs, nwOrItemLbChrgsTyp, nwOrItemTotalTaxChrg, totalMetalValuation, crystalFinalVal, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("newOrderDivs").innerHTML = xmlhttp.responseText;
            //document.getElementById("nwOrPayMetalType1").focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            //document.getElementById("nwOrPaymentButt").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ognopydv" + default_theme + ".php?newSuppId=" + newSuppId + "&custId=" + custId + "&newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo +
            "&goldTotalWeight=" + goldTotalWeight + "&goldTotalWeightType=" + goldTotalWeightType + "&silverTotalWeight=" + silverTotalWeight + "&silverTotalWeightType=" + silverTotalWeightType +
            "&totalFinalBalance=" + totalFinalBalance + "&nwOrFirmId=" + firmId + "&totalItemsQty=" + totalItemsQty + "&totalValuation=" + totalValuation + "&nwOrItemLbChrgs=" + nwOrItemLbChrgs +
            "&nwOrItemLbChrgsTyp=" + nwOrItemLbChrgsTyp + "&nwOrItemTotalTaxChrg=" + nwOrItemTotalTaxChrg +
            "&totalMetalValuation=" + totalMetalValuation + "&crystalFinalVal=" + crystalFinalVal + "&itemPanel=" + panelName, true);
    xmlhttp.send();
}
/*******************End code to change div @Author:PRIYA26SEP13***********/
/*******************End code to change function name @Author:PRIYA20SEP13***********/
/*******************End code To Add Firm Id @AUTHOR:PRIYA12MAY13****************/
/*********END CODE TO ADD Invoice PAYMENT DIV @AUTHOR:PRIYA13JAN13************/
/*********START CODE TO Click Invoice Id and close button @AUTHOR:PRIYA14JAN13************/
function showNewOrderInvoiceDiv(documentRootPath, newPreInvoiceNo, newInvoiceNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            //document.getElementById("ajaxCloseAddNewOrderInvoice").style.visibility = "visible";
            document.getElementById("nwOrItemDetailsDiv" + newPreInvoiceNo + newInvoiceNo).innerHTML = xmlhttp.responseText;
            //document.getElementById("ajaxCloseAddNewOrderInvoice").style.visibility = "visible";

        } else {
            document.getElementById("nwOrItemDetailsDiv" + newPreInvoiceNo + newInvoiceNo).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ognoindv" + default_theme + ".php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo, true);
    xmlhttp.send();
}
function closeAddNewOrderInvoiceDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
            document.getElementById("ajaxCloseAddNewOrderInvoice").style.visibility = "hidden";
            document.getElementById("nwOrItemDetailsDiv" + newPreInvoiceNo + newInvoiceNo).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk" + default_theme + ".php", true);
    xmlhttp.send();
}
/*********END CODE TO Click Invoice Id  and close button @AUTHOR:PRIYA15JAN13************/
//**************************** Navigate Girvi Notice Panel *******************************************************************
function getLoanNoticePanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppgndv" + default_theme + ".php", true);
    xmlhttp.send();
}
// ************* Start Code to navigate to FORM N/8 Panel @Author: KHUSH09JAN13 ****************
function getFormEightPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppfedv" + default_theme + ".php", true); //Modified by KHUSH13JAN13
    xmlhttp.send();
}
//Start code for Add New Language @Author KHUSH06JAN13
/*************Start code to change function @Author:PRIYA25MAR14*************/
/*************Start code to add form width @Author:PRIYA22APR14*************/
function getFormEightAddNewLangDiv(panelName, formSize) {             //modified by KHUSH15JAN13
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppfedv" + default_theme + ".php?panelName=" + panelName + "&formSize=" + formSize, true); //filename changed @Author:PRIYA22MAR14
    xmlhttp.send();
}
/*************End code to add form width @Author:PRIYA22APR14*************/
/*************End code to change function @Author:PRIYA25MAR14*************/
/*********START CODE TO SET DEF LANG & GET FORM EIGHT @AUTHOR: KHUSH11JAN13 ************/
/*********Start code to add panel @Author:PRIYA19APR14**************/
function setDefLangGetFormEight(defLang, defSize, panel) {
// alert(defSize);// Modified on KHUSH15JAN13
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppfesl" + default_theme + ".php?defLang=" + defLang + "&defSize=" + defSize + "&panel=" + panel, true);
    xmlhttp.send();
}
/*********End code to add panel @Author:PRIYA19APR14**************/
/*********END CODE TO SET DEF LANG & GET FORM EIGHT @AUTHOR: KHUSH11JAN13 ************/

//**************************** show Stock Item Details Div *****************************************
/**********Start Code To Add Panel Name @AUTHOR:PRIYA04MAY13**************/
/**********Start code to add div @Author:PRIYA19JAN14***************************/
/**********Start code to add div @Author:PRIYA11SEP14****************/
/**********Start code to change param name @Author:PRIYA30SEP14******************/
/******Start code to add stock type parameter in else condition  @OMMODTAG SHRI_09JAN16*****/
/**********Start code to add if else condition for Imitation Panel @Author:ANUJA07JAN16******************/
// 
// 
// Start Code To Update LOT To Tag List Product @Author:Vinod25-07-2023
function showLotStockItemDetailsDiv(documentRootPath, sttrId, utransInvId) {
    //
    //alert('documentRootPath == ' + documentRootPath);
    //alert('sttrId == ' + sttrId);
    //alert('utransInvId == ' + utransInvId);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainAddStockDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "ogadstoc" + default_theme + ".php?sttrId=" + sttrId + "&panelName=UpdateStock" +
            "&stockType=retailStock" + "&stockPanelName=UpdateStock" + "&invPanel=AddByInv" +
            "&utransInvId=" + utransInvId, true);
    //
    xmlhttp.send();
    //
}
// End Code To Update LOT To Tag List Product @Author:Vinod25-07-2023
//
function showImiLotStockItemDetailsDiv(documentRootPath, sttrId, utransInvId) {
    //
    //alert('documentRootPath == ' + documentRootPath);
    //alert('sttrId == ' + sttrId);
    //alert('utransInvId == ' + utransInvId);
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
    xmlhttp.open("POST", documentRootPath + "ogijsdv" + default_theme + ".php?sttrId=" + sttrId + "&updatePanelName=UpdateImitationStock" +
            "&stockType=retailStock" + "&stockPanelName=UpdateStock" + "&invPanel=AddImitationByInv" +
            "&utransInvId=" + utransInvId, true);
    //
    xmlhttp.send();
    //
}
/*******START CODE FOR METAL-TO-METAL Panel @Author:SANT12JUL17**************/
function showStockItemDetailsDiv(documentRootPath, sttrId, panelName, stockType, mainPanel, transactionPanel, utinId, invPanel, metType) {
    loadXMLDoc();
    if (panelName == 'RawDetUpPanel' && (mainPanel == 'Customer' || mainPanel == 'Supplier') && (transactionPanel == 'RawPurchase' || transactionPanel == 'RawSell')) {
        var invoice = invPanel.split(";");
        var preInvoice = invoice[0];
        var invoiceNum = invoice[1];
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (transactionPanel == 'AddByInv') {
                document.getElementById("mainAddStockDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'RawDetUpPanel') {
                document.getElementById("rawMetalAddDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'addByItems') {
                document.getElementById("suppPurchaseDivs").innerHTML = xmlhttp.responseText;
            } else if (mainPanel == 'CrystalStockPayment' || mainPanel == 'CrystalStockPayUp') {
                document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
        }
    };
    if (transactionPanel == 'AddByInv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogadstoc" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName + "&stockType=" + stockType + "&stockPanelName=" + panelName + "&invPanel=" + transactionPanel + "&utransInvId=" + utinId, true);
    } else if (mainPanel == 'CrystalStockPayment' || mainPanel == 'CrystalStockPayUp') {
        xmlhttp.open("POST", "include/php/ogcraddv" + default_theme + ".php?sttrId=" + sttrId + "&updatePanelName=" + panelName + "&stockType=" + stockType + "&stockPanelName=" + mainPanel + "&suppPurId=" + transactionPanel + "&utinId=" + utinId, true);
    } else {
        if (panelName == 'RawDetUpPanel') {
            if (panelName == 'RawDetUpPanel' && (mainPanel == 'Customer' || mainPanel == 'Supplier') && (transactionPanel == 'RawPurchase' || transactionPanel == 'RawSell'))
                xmlhttp.open("POST", documentRootPath + "/include/php/ogrwiadv" + default_theme + ".php?rwprId=" + sttrId + "&panelName=RawStock" + "&rawPanelName=" + panelName + "&mainPanel=" + mainPanel + "&transactionPanel=" + transactionPanel + "&preInvNo=" + preInvoice + "&postInvNo=" + invoiceNum + "&metType=" + metType + "", true);
            else
                xmlhttp.open("POST", documentRootPath + "/include/php/ogrwiadv" + default_theme + ".php?sttr_id=" + sttrId + "&panelName=RawStock" + "&rawPanelName=" + panelName + "&mainPanel=" + mainPanel + "&transactionPanel=" + transactionPanel + "&metType=" + metType + "", true);
        } else if (panelName == 'RawDetUpPanelQuo') {
            panelName = 'RawDetUpPanel';
            panelName1 = 'RawDetUpPanelQuo';
            if (panelName == 'RawDetUpPanel' && (mainPanel == 'Customer' || mainPanel == 'Supplier') && (transactionPanel == 'RawPurchase' || transactionPanel == 'RawSell')) {
                if (document.getElementById("EstimateList") != null) {
                    document.getElementById("EstimateList").innerHTML = '';
                }
                xmlhttp.open("POST", documentRootPath + "/include/php/ogwadquo" + default_theme + ".php?rwprId=" + sttrId + "&panelName=RawStock" + "&rawPanelName=" + panelName + "&mainPanel=" + mainPanel + "&transactionPanel=" + transactionPanel + "&preInvNo=" + preInvoice + "&postInvNo=" + invoiceNum + "&metType=" + metType + "&panelName1=" + panelName1, true);
            } else {
                xmlhttp.open("POST", documentRootPath + "/include/php/ogwadquo" + default_theme + ".php?sttr_id=" + sttrId + "&panelName=RawStock" + "&rawPanelName=" + panelName + "&mainPanel=" + mainPanel + "&transactionPanel=" + transactionPanel + "&metType=" + metType + "&panelName1=" + panelName1, true);
            }
        } else if (panelName == 'addByItems') {
            xmlhttp.open("POST", documentRootPath + "/include/php/ogwprinv" + default_theme + ".php?sttrId=" + sttrId + "&itemMainPanel=" + panelName + "&itemSubPanel=itemsAddUp", true);
            /**Star Code to Add Condition for Panel Name during updation @Author:SHE21FEB15 **/
        } else if (panelName == 'UpdateCrystal' || panelName == 'CrystalPayUp') {
            xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + sttrId + "&stockType=" + stockType + "&updatePanelName=" + panelName + "&panelName=CrystalPanel", true);
            /**End Code to Add Condition for Panel Name during updation @Author:SHE21FEB15 **/
        } else if (panelName == 'ImitationStockPayUp') {
            xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + sttrId + "&updatePanelName=UpdateImitationStock" + "&panelName=ImitationStock" + "&stockType=retail", true);
        } else if (panelName == 'StrelleringStockPayUp') { // Code to Add Condition for Sterling Panel @Author:DIKSHA 31DEC2018
            xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + sttrId + "&updatePanelName=" + panelName + "&panelName=StrelleringStock", true);
        } else if (panelName == 'ImitationSearch') {
            xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + sttrId + "&updatePanelName=ImitationStockPayUp&stockType=wholeSale&panelName=ImitationStock&subPanel=" + panelName, true);
        } else {
            xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName + "&stockType=" + stockType, true);
        }
    }
    xmlhttp.send();
}
/*******END CODE FOR METAL-TO-METAL Panel @Author:SANT12JUL17**************/
/**********Start code to add if else condition for Imitation Panel @Author:ANUJA07JAN16******************/
/******End code to add stock type parameter in else condition  @OMMODTAG SHRI_09JAN16*****/
/**********End code to change param name @Author:PRIYA30SEP14******************/
/**********End code to add div @Author:PRIYA11SEP14****************/
/**********End code to add div @Author:PRIYA19JAN14***************************/
/**********End Code To Add Panel Name @AUTHOR:PRIYA04MAY13**************/
//*********************** Start code to Navigate Form Seven Panel @Author: KHUSH13JAN13 ************
function getFormSevenPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppfsdv" + default_theme + ".php", true);
    xmlhttp.send();
}
//Start code for Add New Language in Form R/7 @Author KHUSH14JAN13
/************Start code to change function @Author:PRIYA25MAR14*****************/
/************Start code to add formSize @Author:PRIYA22APR14*****************/
function getFormSevenAddNewLangDiv(panelName, formSize) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppfsdv" + default_theme + ".php?panelName=" + panelName + "&formSize=" + formSize, true);
    xmlhttp.send();
}

/************End code to change function @Author:PRIYA25MAR14*****************/
/*********END CODE to Add New Language in Form R/7 @Author KHUSH14JAN13************/
/*********START CODE TO SET DEF LANG & GET FORM R/7 @AUTHOR: KHUSH14JAN13 ************/
function setDefLangGetFormSeven(defLang, defSize, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("formSetupDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppfssl" + default_theme + ".php?defLang=" + defLang + "&defSize=" + defSize + "&panel=" + panel, true);
    xmlhttp.send();
}
/************End code to add formSize @Author:PRIYA22APR14*****************/
/*********END CODE TO SET DEF LANG & GET FORM R/7 @AUTHOR: KHUSH14JAN13 ************/
/**********START CODE TO ADD Supplier Invoice Details @AUTHOR:PRIYA14JAN13***************/
/***********Start code to comment @Author:PRIYA27OCT13*********/
//function showSuppNwOrItemDetailsDiv(documentRootPath, newItemId) {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function() {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("suppNwOrItemDetailsDiv" + newItemId).innerHTML = xmlhttp.responseText;
//        }
//        else {
//            document.getElementById("suppNwOrItemDetailsDiv" + newItemId).innerHTML = "<img src='images/ajaxLoad.gif' />";
//        }
//    };
//
//    xmlhttp.open("POST", documentRootPath + "/include/php/ogwhiddv" + default_theme +".php?newItemId=" + newItemId, true);
//
//    xmlhttp.send();
//}
/***********End code to comment @Author:PRIYA27OCT13*********/
/**********END CODE TO ADD Supplier Invoice Details @AUTHOR:PRIYA14JAN13***************/
/**********START CODE TO ADD Repair Panel @AUTHOR:PRIYA14JAN13***************/
function navigateRepairPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppdbcp" + default_theme + ".php", true);
    xmlhttp.send();
}

/**********END CODE TO ADD Repair Panel @AUTHOR:PRIYA14JAN13***************/
//**************************** Navigate Loss Girvi Panel *******************************************************************
/**********START CODE TO ADD 65L & 84L Bar Code Panel @AUTHOR:PRIYA12FEB13***************/
/**********Start Code To Add Help Option @Author:PRIYA12AUG13****************************/
/***************Start of change in function @AUTHOR: SANDY09JAN14************/
/***************Start code to add loan tags panel @Author:PRIYA25APR14**********/
/**************Start code to add panel @Author:PRIYA05NOV14***********************/
function showBarCodePrintPanel(divPanel, stockTypeP1) {
    document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "visible";
    showBarCodeSettingPanel(divPanel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barCodePrintPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (divPanel == 'Items65LBarCodePanel') {
    //    xmlhttp.open("POST", "include/php/ommstockpfunc" + default_theme +".php", true);

        xmlhttp.open("POST", "include/php/omstockTransibbc65l" + default_theme + ".php?stockTypeP1=" + stockTypeP1, true);
    } else if (divPanel == 'ItemsAllLabelsBarCodePanel') {
        document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "hidden"; //Start code to check the conditions for allLabel Barcode @AUTH:ATHU5MAR17
        xmlhttp.open("POST", "include/php/ogicallalllabels" + default_theme + ".php?divPanel=" + divPanel, true); //End code to check the conditions for allLabel Barcode @AUTH:ATHU5MAR17
    } else if (divPanel == 'Items84LBarCodePanel') {
//        xmlhttp.open("POST", "include/php/ogibbc84l" + default_theme +".php", true);
        xmlhttp.open("POST", "include/php/omstockTransibbc84l" + default_theme + ".php", true);
    } else if (divPanel == 'GirviBarCodePanel') {
        xmlhttp.open("POST", "include/php/olggbcpd" + default_theme + ".php", true); //change in file name @AUTHOR: SANDY20NOV13
    } else if (divPanel == 'label') {
        document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "hidden";
        xmlhttp.open("POST", "include/php/ogibbc55x13" + default_theme + ".php?panel=" + divPanel, true);
    } else if (divPanel == 'Items55x13BarCodePanel') {
        document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "hidden";
        xmlhttp.open("POST", "include/php/ogibbc55x13" + default_theme + ".php?panel=" + divPanel, true);
    } else if (divPanel == 'Items55x13IMBarCodePanel') {
        document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "hidden";
        xmlhttp.open("POST", "include/php/ogibbc55x13imi" + default_theme + ".php?panel=" + divPanel, true);
    } else if (divPanel == 'GirviAllBarCodePanel') {
        xmlhttp.open("POST", "include/php/omLoanTagReport" + default_theme + ".php", true); //change in file name @AUTHOR: SANDY20NOV13
    }
    //**************************************************************//
    // START CODE FOR ADDED RFID LABEL OPTION @SIMRAN:16MAR2023  //
    //*************************************************************//
    else if (divPanel == 'ItemsRFIDBarCodePanel') {
        document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "hidden";
        xmlhttp.open("POST", "include/php/ogRFIDibbc55x13" + default_theme + ".php?panel=" + divPanel, true);
    }
    //***********************************************************//
    //END CODE FOR ADDED RFID LABEL OPTION @SIMRAN:16MAR2023  //
    //***********************************************************//
    else if (divPanel == 'BarCodePrintHelp') {
        xmlhttp.open("POST", "include/php/ombchelp" + default_theme + ".php", true);
    } else if (divPanel == 'Items20x12BarCodePanel') {
//        xmlhttp.open("POST", "include/php/ogibbc20x12" + default_theme +".php", true);
        xmlhttp.open("POST", "include/php/omstockTransibbc20x12" + default_theme + ".php", true); //new file
    } else if (divPanel == 'formsPrintHelp') {
        xmlhttp.open("POST", "include/php/omfrhelp" + default_theme + ".php", true);
    } else if (divPanel == 'BarCodeLoanTags') {
        xmlhttp.open("POST", "include/php/olggbctg" + default_theme + ".php", true);
    } else if (divPanel == 'Items55x13TwoLabelsPanel') {
        document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "hidden";
        xmlhttp.open("POST", "include/php/ogib55x13twdv" + default_theme + ".php", true);
    }
    /****** Start code to add condition for 61L Barcode Panel @Author:SHRI25FEB15******/
    else if (divPanel == 'Items61x12BarCodePanel') {
        document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "hidden";
        xmlhttp.open("POST", "include/php/ogibbc61x12" + default_theme + ".php?panel=" + divPanel, true);
    }
    /****** End code to add condition for 61L Barcode  Panel @Author:SHRI25FEB15******/
    //
    /****** Start code to add condition for  Tail Labels loan Barcode Panel @Author:SHE08APR15******/
    else if (divPanel == 'Items55x13LoanBarCodePanel') {
        document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "hidden";
        xmlhttp.open("POST", "include/php/olggbc55x13" + default_theme + ".php", true);
    }
    /****** End code to add condition for  Tail Labels loan Barcode Panel @Author:SHE08APR15******/
    //
    /****** START CODE TO ADD CONDITION FOR STICKER @Author:PRIYANKA-29AUG2019 ******/
    else if (divPanel == 'stickerPrintPanel') {
        xmlhttp.open("POST", "include/php/omStickerPrintPanel" + default_theme + ".php", true);
    }
    /****** END CODE TO ADD CONDITION FOR STICKER @Author:PRIYANKA-29AUG2019 ******/
    /****** START CODE TO ADD CONDITION FOR BRACODE PRN PRINT SETUP @Author:SIMRAN:25JAN2023 ******/
    else if (divPanel == 'barcodePRNPrintSetupPanel') {
        xmlhttp.open("POST", "include/php/omBarcodePRNPrintSetup" + default_theme + ".php", true);
    }
    /****** END CODE TOADD CONDITION FOR BRACODE PRN PRINT SETUP @Author:SIMRAN:25JAN2023 ******/

    //
    xmlhttp.send();
    //
}
/**************End code to add panel @Author:PRIYA05NOV14***********************/
/***************End code to add loan tags panel @Author:PRIYA25APR14**********/
/***************End of change in function @AUTHOR: SANDY09JAN14************/

//**************Start code to stock tally panel @Author:SURAJ15MARCH18***********************/
function showTallyStockPanel(panel) {
    loadXMLDoc();
    //alert(panel);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // alert(xmlhttp.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
            if ((panel == 'StockTallyByRFID') || (panel == 'StockTallyByMultiBarcode')) {
                document.getElementById("productCategory").focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'StockTallyByImages') {
//alert("1");
        xmlhttp.open("POST", "include/php/ogstally" + default_theme + ".php?panelName=" + panel, true);
        xmlhttp.send();
    } else if (panel == 'StockTallyByTable') {
        xmlhttp.open("POST", "include/php/ogstallytable" + default_theme + ".php?panelName=" + panel, true);
        xmlhttp.send();
    } else if (panel == 'StockTallyByRFID') {
        // ogstallyRFID Replace This page by ogstallyRFIDNew.php for rfid stock tally work @yuvrajkamble
        xmlhttp.open("POST", "include/php/ogstallyRFIDNew" + default_theme + ".php?stockType=OPEN STOCK" + "&panel=" + panel, true);
        xmlhttp.send();
    } else if (panel == 'StockTallyByMultiBarcode') {
        // for rfid stock tally work @yuvrajkamble
        xmlhttp.open("POST", "include/php/ogstallyMutiBarcode" + default_theme + ".php?stockType=OPEN STOCK" + "&panel=" + panel, true);
        xmlhttp.send();
    }
}
/**************END code to stock tally panel @Author:SURAJ15MARCH18***********************/
//
//**************Start code to stock tally panel @Author:SURAJ15MARCH18***********************/
var tallyStockByRfidMainTimmer;
var tallyStockByRfidTimmer;
var allProductsScanned;
var rfidStockScanDate;
var rfidStockScanTime;
function tallyStockByRFID(processOnOFF, rfid_stock_scan_date, rfid_stock_scan_time) {
    //
    var allProductsScannedSound;
    var scanSound;
    //alert('Start' + processOnOFF);
    if (processOnOFF == 'OFF') {
        clearTimeout(tallyStockByRfidTimmer);
        clearTimeout(tallyStockByRfidMainTimmer);
    }
    console.log(processOnOFF);
    document.getElementById("rfidTallyStartButton").innerHTML = 'WAIT...';
    if (allProductsScanned == 'ALL_SCANNED') {
        if (processOnOFF == 'OFF')
            allProductsScannedSound = new Audio("http://127.0.0.1:8080/omunim/2/sounds/scanning_stopped.mp3");
        else
            allProductsScannedSound = new Audio("http://127.0.0.1:8080/omunim/2/sounds/all_products_scanned.mp3");
        allProductsScannedSound.play();
    } else {
        if (processOnOFF == 'ON')
            scanSound = new Audio("http://127.0.0.1:8080/omunim/2/sounds/scan_start.mp3");
        else
            scanSound = new Audio("http://127.0.0.1:8080/omunim/2/sounds/scanning_stopped.mp3");
        scanSound.play();
    }
    tallyStockByRfidMainTimmer = setTimeout(function () {
        console.log('WAIT');
        //alert('Inside' + processOnOFF);
        //
        var textAreaRfidTagsData = document.getElementById("textareaRFIDTags").value;
        textAreaRfidTagsData = textAreaRfidTagsData.replace(/\r?\n/g, '|');
        //alert(textAreaRfidTagsData);
        //
        document.getElementById("textareaRFIDTags").value = '';
        document.getElementById("textareaRFIDTags").focus();
        document.getElementById("rfidTallyStartButton").innerHTML = 'Read More...';
        //
        loadXMLDoc();
        if (processOnOFF == 'ON') {
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    console.log(xmlhttp.responseText);
                    //document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    if (xmlhttp.responseText == 'SUCCESS' || xmlhttp.responseText == 'ALL_SCANNED') {
                        if (xmlhttp.responseText == 'ALL_SCANNED')
                            allProductsScanned = 'ALL_SCANNED';
                        refreshRFIDScannedResultDiv();
                        tallyStockByRfidTimmer = setTimeout(function () {
                            tallyStockByRFID('ON', rfid_stock_scan_date, rfid_stock_scan_time);
                        }, 3000);
                    }
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
        } else {
            allProductsScanned = '';
            console.log('OFFFFF');
            clearTimeout(tallyStockByRfidTimmer);
            clearTimeout(tallyStockByRfidMainTimmer);
            document.getElementById("rfidTallyStartButton").innerHTML = 'START';
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        }
        //alert(textAreaRfidTagsData);
        if (processOnOFF == 'ON') {
            xmlhttp.open("POST", "include/php/ogstallyRFIDAdd" + default_theme + ".php?rfidTagsData=" + textAreaRfidTagsData + "&rfid_stock_scan_date=" + rfid_stock_scan_date + "&rfid_stock_scan_time=" + rfid_stock_scan_time, true);
            xmlhttp.send();
        }
    }, 2000);
    if (processOnOFF == 'OFF') {
        allProductsScanned = '';
        clearTimeout(tallyStockByRfidMainTimmer);
        document.getElementById("rfidTallyStartButton").innerHTML = 'START';
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
//
function RFIDScanCounterFun() {
    if (parseInt(document.getElementById('RFIDScanCounter').value) > 1) {
        document.getElementById('RFIDScanCounter').value = 1;
        refreshRFIDScannedResultDiv();
    }
    document.getElementById('RFIDScanCounter').value = parseInt(document.getElementById('RFIDScanCounter').value) + 1;
    tallyStockByRfidTimmer = setTimeout(function () {
        RFIDScanCounterFun();
    }, 1000);
}
function tallyStockOneShotByRFID(textAreaRfidTagsData, rfid_stock_scan_date, rfid_stock_scan_time, productCategory) {
    //
    //document.getElementById('RFIDScanCounter').value = 1;
    var allProductsScannedSound;
    var scanSound;
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (xmlhttp.responseText == 'SUCCESS' || xmlhttp.responseText == 'ALL_SCANNED') {
                if (xmlhttp.responseText == 'ALL_SCANNED' && allProductsScanned != 'ALL_SCANNED') {
                    allProductsScanned = 'ALL_SCANNED';
                    allProductsScannedSound = new Audio("http://127.0.0.1:8080/omunim/2/sounds/all_products_scanned.mp3");
                    allProductsScannedSound.play();
                    clearTimeout(tallyStockByRfidTimmer);
                    //refreshRFIDScannedResultDiv();
                } else if (rfidStockScanTime != rfid_stock_scan_time && allProductsScanned != 'ALL_SCANNED') {
                    scanSound = new Audio("http://127.0.0.1:8080/omunim/2/sounds/scan_start.mp3");
                    scanSound.play();
                    //rfidStockScanDate = rfid_stock_scan_date;
                    rfidStockScanTime = rfid_stock_scan_time;
                }
                refreshRFIDScannedResultDiv(productCategory);
            }
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogstallyRFIDAdd" + default_theme + ".php?rfidTagsData=" + textAreaRfidTagsData +
            "&rfid_stock_scan_date=" + rfid_stock_scan_date +
            "&rfid_stock_scan_time=" + rfid_stock_scan_time + "&productCategory=" + productCategory, true);
    xmlhttp.send();
}
//
function resetStockByRFID() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //document.getElementById("rfidScannedResultsDiv").innerHTML = xmlhttp.responseText;
            if (xmlhttp.responseText == 'SUCCESS')
                refreshRFIDScannedResultDiv();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogtallyRFIDReset" + default_theme + ".php", true);
    xmlhttp.send();
}
/**************END code to stock tally panel @Author:SURAJ15MARCH18***********************/
//
function refreshRFIDScannedResultDiv(productCategory) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            //document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rfidScannedResultsDiv").innerHTML = xmlhttp2.responseText;
        } else {
            //document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp2.open("POST", "include/php/ogtallyRFIDScannedResults" + default_theme + ".php?productCategory=" + productCategory, true);
    xmlhttp2.send();
}
//
//
function showBarCodeSettingPanel(divPanel) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barCodePrintPanelSettingDiv").innerHTML = xmlhttp2.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp2.open("POST", "include/php/ombcbcsp" + default_theme + ".php?divPanel=" + divPanel, true);
    xmlhttp2.send();
}
/************Start code to add options @Author:PRIYA05FEB14***************/
/************Start code to add noOfRows @Author:PRIYA14MAY14*************/
function updateBarCodeTopLeftMargin(omLayoutOptionTop, omLayoutOptionTopValue, omLayoutOptionLeft, omLayoutOptionLeftValue,
        fontSize, fontSizeValue, blockWidth, blockWidthValue, blockHeight, blockHeightValue, slipWidth, slipWidthValue, slipHeight, slipHeightValue,
        noOfRows, noOfRowsValue) {
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
            + '&blockWidth=' + blockWidth + '&blockWidthValue=' + blockWidthValue
            + '&blockHeight=' + blockHeight + '&blockHeightValue=' + blockHeightValue
            + '&slipWidth=' + slipWidth + '&slipWidthValue=' + slipWidthValue
            + '&slipHeight=' + slipHeight + '&slipHeightValue=' + slipHeightValue
            + '&noOfRows=' + noOfRows + '&noOfRowsValue=' + noOfRowsValue;
    xmlhttp.open("POST", "include/php/ombcbcup" + default_theme + ".php?" + postStr, true);
    xmlhttp.send();
}
function closeBCMessDiv() {
    document.getElementById("bcMessDisplayDiv").innerHTML = "";
}
/************End code to add noOfRows @Author:PRIYA14MAY14*************/
/************End code to add options @Author:PRIYA05FEB14***************/
/***************Start code to add delay function @Author:PRIYA06FEB14************/
function showBarCodeBorders(omLayoutOptionBorder, showBarCodeBordersCheck, bcSizeSelect, bcSizeSelectValue) {
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
    xmlhttp.open("POST", "include/php/ombcbcup" + default_theme + ".php?omLayoutOptionBorder=" + omLayoutOptionBorder + "&showBarCodeBordersCheck=" + showBarCodeBordersCheck +
            "&bcSizeSelect=" + bcSizeSelect + "&bcSizeSelectValue=" + bcSizeSelectValue, true);
    xmlhttp.send();
}
/***************End code to add delay function @Author:PRIYA06FEB14************/
/**********End Code To Add Help Option @Author:PRIYA12AUG13****************************/
/**********END CODE TO ADD 65L & 84L Bar Code Panel @AUTHOR:PRIYA12FEB13***************/
//
//****************************************************************************************//
//***************START CODE FOR RESET BARCODE PRN PRINT SETTING @SIMRAN:22AUG2023**********//
//****************************************************************************************//
function resetPrnBarcodeSetting() {
    //alert('postId == ' + postId);
    //alert('custId == ' + custId);
    //alert('newOrderPanelName == ' + newOrderPanelName);
    confirm_box = confirm("Do you really want to Reset All PRN File setting ?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("resetPrnbarcodeSetting").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ommptbupd27232_2omm" + default_theme + ".php", true);
        xmlhttp.send();
    }
}
//****************************************************************************************//
//***************END CODE FOR RESET BARCODE PRN PRINT SETTING @SIMRAN:22AUG2023**********//
//****************************************************************************************//
//
//****************************************************************************************//
//***************START CODE FOR BARCODE PRN PRINT SETUP @SIMRAN:27JAN2023************//
//****************************************************************************************//
function barcodePrnPrintSeup(bcPRNFileValue, barcodePrnTextUpdate, operation) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('barCodePrintPanelDiv').innerHTML = xmlhttp.responseText;

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }

    };
    xmlhttp.open("POST", "include/php/omBarcodePRNPrintSetup" + default_theme + ".php?bcPRNFileValue=" + bcPRNFileValue + "&barcodePrnTextUpdate=" + barcodePrnTextUpdate + "&operation=" + operation, true);
    xmlhttp.send();
}


//function barcodePrnPrintSeupUpdate(bcPRNFileValue, barcodePrnTextUpdate, operation, filepath) {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//       
//            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//                document.getElementById('barCodePrintPanelDiv').innerHTML = xmlhttp.responseText;
//               
//            } else {
//                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//            }           
//            };
//   xmlhttp.open("POST", "include/php/omBarcodePRNPrintSetup" + default_theme + ".php?bcPRNFileValue=" +  bcPRNFileValue + "&barcodePrnTextUpdate=" + barcodePrnTextUpdate + "&operation="+ operation , true); 
//    xmlhttp.send();
//}




function barcodePrnPrintSeupUpdate(bcPRNFileValue, barcodePrnTextUpdate, operation, filepath) {
    var poststr = "bcPRNFileValue=" + bcPRNFileValue +
            "&barcodePrnTextUpdate=" + encodeURIComponent(barcodePrnTextUpdate) +
            "&operation=" + operation +
            "&filepath=" + filepath;
    barcodePrnPrintSeupUpdate2("include/php/omBarcodePRNPrintSetup" + default_theme + ".php", poststr);
}

function barcodePrnPrintSeupUpdate2(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('barCodePrintPanelDiv').innerHTML = xmlhttp.responseText;

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }

    };

    xmlhttp.onreadystatechange = alertbarcodePrnPrintSeupUpdate3;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//    xmlhttp.setRequestHeader("Content-length", parameters.length);
//    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}

function alertbarcodePrnPrintSeupUpdate3() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("barCodePrintPanelDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}


//****************************************************************************************//
//***************END CODE FOR BARCODE PRN PRINT SETUP @SIMRAN:27JAN2023************//
//****************************************************************************************//
function softwareUpdateCompleted(divPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(divPanel).innerHTML = xmlhttp.responseText;
            document.getElementById("softwareUpdateCompletedDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ommptbupd" + default_theme + ".php", true);
    xmlhttp.send();
}
//var metalRateMetTyp = new Array();
//var metalRateMetId = new Array();
//var metalRateMetRate = new Array();
//
//function setMetalRatesArray(metalRateMetTyp,metalRateMetId,metalRateMetRate) {
//    
//}

function autoUpdateMetalRates(metalArrNum) {
    loadXMLMetalRates();
    xmlhttpMetalRates.onreadystatechange = function () {
        if (xmlhttpMetalRates.readyState == 4 && xmlhttpMetalRates.status == 200) {
            document.getElementById("metalRatesDiv").innerHTML = xmlhttpMetalRates.responseText;
        }
    };
    xmlhttpMetalRates.open("POST", "include/php/ommrdmrd" + default_theme + ".php?metalArrNum=" + metalArrNum, true);
    xmlhttpMetalRates.send();
}
function openWindowsExe(omWinExe) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST",
            "include/php/omwinexe" + default_theme + ".php?omWinExe=" + omWinExe, true);
    xmlhttp.send();
}
function sentSMSByTemplateId(counter, smsTemplateId, userId, userType, itemId, itemType, amount1, amount2, amount3, amount4) {
    if (smsTemplateId == '') {
        alert('Please select SMS Template Id!');
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (xmlhttp.responseText == 'SUCCESS') {
                    document.getElementById("smsSentByTemplateDiv" + counter).innerHTML = "<img src='images/right16.png' title='SMS Sent Successfully!' />";
                } else {
                    document.getElementById("smsSentByTemplateDiv" + counter).innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST",
                "include/php/omcsmssbt" + default_theme + ".php?smsTemplateId=" + smsTemplateId + "&userId=" + userId
                + "&userType=" + userType + "&itemId=" + itemId + "&itemType=" + itemType
                + "&amount1=" + amount1 + "&amount2=" + amount2 + "&amount3=" + amount3 + "&amount4=" + amount4, true);
        xmlhttp.send();
    }
}
function getOnlinePaymentPanel(amount) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("prodPaymentDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST",
            "include/php/ommppyam" + default_theme + ".php?amount=" + amount, true);
    xmlhttp.send();
}
function closeProdExpMessDiv() {
    document.getElementById("prodExpMessMainDiv").innerHTML = '';
}
//*********Start code for delete multiple loans in loan panel:Author:SANT23DEC16

//Start code to add selectall sms option @Author:SHE20FEB15
//Start Code to add function for delete selected and multiple loan : Author:SANT04JAN17
function selectDeleteOne(panelName, trnasId, girviId, custId, sellPresent, itemCounter, prevStockCount) {
//    alert(panelName);
//    exit();
    if (sellPresent > 0) {
        alert('To Delete,First Delete This Item From Customer Jewellery Panel!');
        document.getElementById('deletecheck' + itemCounter).checked = false;
    } else {
        if (prevStockCount > 0) {
            confirm_box = confirm("Previous balance gets changed from this item delete\n\nDo you really want to delete this Item?");
        } else {
            confirm_box = true;
        }
        if (confirm_box == true)
        {
            var counter = parseFloat(document.getElementById('counter').value);
//        var delId = document.getElementById(delId).value;
            var deleteChkAll = new Array();
            var chk = 0;
            for (var i = 1; i <= counter; i++) {
                deleteChkAll[i] = document.getElementById('deletecheck' + i).checked;
                if (deleteChkAll[i] == false)
                {
                    chk = 1;
                    break;
                }
            }
            if (chk == 1)
                document.getElementById('deleteallcheck').checked = false;
            else
                document.getElementById('deleteallcheck').checked = true;
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    for (var i = 1; i <= counter; i++) {
                        if (xmlhttp.responseText == 'CustLoanPresent') {
                            alert("Please first delete all Loans of this Customer!");
                            document.getElementById('deleteallcheck').checked = false;
                            document.getElementById('deletecheck' + i).checked = false;
                        } else if (xmlhttp.responseText == 'CustPurInvPresent') {
                            alert("Please first delete all Purchase Invoices of this Customer!");
                            document.getElementById('deleteallcheck').checked = false;
                            document.getElementById('deletecheck' + i).checked = false;
                        } else if (xmlhttp.responseText == 'UdhaarPresent') {
                            alert("Please first delete all Udhaar of this Customer!");
                            document.getElementById('deleteallcheck').checked = false;
                            document.getElementById('deletecheck' + i).checked = false;
                        } else if (xmlhttp.responseText == 'AdvanceMoneyPresent') {
                            alert("Please first delete all Advance Money of this Customer!");
                            document.getElementById('deleteallcheck').checked = false;
                            document.getElementById('deletecheck' + i).checked = false;
                        } else if (xmlhttp.responseText == 'CustSellPresent') {
                            alert("Please first delete all Sell of this Customer!");
                            document.getElementById('deleteallcheck').checked = false;
                            document.getElementById('deletecheck' + i).checked = false;
                        } else if (xmlhttp.responseText == 'NewOrderPresent') {
                            alert("Please first delete all Orders of this Customer!");
                            document.getElementById('deleteallcheck').checked = false;
                            document.getElementById('deletecheck' + i).checked = false;
                        } else {
                            var deleteChk = document.getElementById('deletecheck' + i).checked;
                            if (deleteChk == true) {
                                usertransId[i] = document.getElementById('girviIdForDelete' + i).value;
                            } else if (deleteChk != true) {
                                usertransId[i] = '';
                            }
                        }
                    }
                }
            }
        }
        ;
        if (panelName == 'loansList')
            xmlhttp.open("POST", "include/php/orgpllpn" + default_theme + ".php?panelName=" + panelName, true);
        if (panelName == 'releaseGirviList')
            xmlhttp.open("POST", "include/php/orgpregl" + default_theme + ".php?panelName=" + panelName, true);
        if (panelName == 'releasePurchaseList')
            xmlhttp.open("POST", "include/php/ogwaprlt" + default_theme + ".php?panelName=" + panelName, true);
        if (panelName == 'stockPanelPurchaseList')
            xmlhttp.open("POST", "include/php/ogwastlt" + default_theme + ".php?panelName=" + panelName, true);
        if (panelName == 'releaseCustomerList')
            xmlhttp.open("POST", "include/php/omcdcsdl" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName, true);
        xmlhttp.send();
    }
}
function sendDeleteMultiple(counter, userType, itemId, itemType, amount1, itemCategory, metalType, panelName, stockDeleteConfirm) {
// alert(panelName);
    var deleteChk = new Array();
    var usertransId = new Array();
//    var counter = parseFloat(document.getElementById('counter').value);
    var chk = 0;
    var chkvar = 'false';
    var cnt = 0;
    confirm_box_cust = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this customer?");
    if (confirm_box_cust == true)
    {
        if (panelName == 'releaseCustomerList') {
            confirm_box_trans = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this transaction?");
            if (confirm_box_trans) {
                transDelete = 'yes';
            }
        }
        if (panelName == 'stockPanelPurchaseList' || panelName == 'releasePurchaseList') {
            var stockDeleteConfirm = '';
            var transDelete = '';
            if (panelName != 'ItemStockList') {
                if (panelName == 'stockPanelPurchaseList') {
                    confirm_box_for_stock = true;
                } else {
                    confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
                }
                if (confirm_box_for_stock == true)
                {
                    stockDeleteConfirm = 'yes';
                    document.getElementById('stockDeleteConfirm').value = 'yes';
                }
            }
        }
        if (panelName == 'releaseSoldInvoice') {
            stock_add_confirm = confirm(addItemAlertMess + "\n\nDo you want to add this item in stock?");
            var stockAddConfirm = 'Yes';
        }

        var counter = parseFloat(document.getElementById('counter').value);
        for (var i = 1; i <= counter; i++) {
            deleteChk[i] = document.getElementById('deletecheck' + i).checked;
            usertransId[i] = document.getElementById('IdForDelete' + i).value;
            if (deleteChk[i] == false) {
                chk++;
            }
        }
        if (chk == counter) {
            alert('Please select to Delete Entry');
            document.getElementById("deleteButt").style.visibility = "visible";
        } else {
            panel = panelName;
            var poststr = "counter=" + encodeURIComponent(counter)
                    + "&panelName=" + encodeURIComponent(panelName)
                    + "&itemCategory=" + encodeURIComponent(itemCategory)
                    + "&metalType=" + encodeURIComponent(metalType)
                    + "&deleteChk=" + encodeURIComponent(deleteChk)
                    + "&stockDeleteConfirm=" + encodeURIComponent(stockDeleteConfirm)
                    + "&stockAddConfirm=" + encodeURIComponent(stockAddConfirm)
                    + "&transDelete=" + encodeURIComponent(transDelete)
                    + "&usertransId=" + encodeURIComponent(usertransId);
//            alert(poststr);
            send_delete_multiple('include/php/omlondel' + default_theme + '.php', poststr);
        }
    }
}
function send_delete_multiple(url, parameters)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSendDeleteMultiple;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
var panel;
function alertSendDeleteMultiple()
{
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("deleteButt").style.visibility = "hidden";
            if (xmlhttp.responseText == 'SUCCESS') {
                document.getElementById("deleteButt").style.visibility = "visible";
            } else if (panel == 'releasePurchaseList') {
                document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                document.getElementById("deleteButt").style.visibility = "visible";
            } else if (panel == 'releaseCustomerList') {
                document.getElementById("customerDetailsDiv").innerHTML = xmlhttp.responseText;
                document.getElementById("deleteButt").style.visibility = "visible";
            } else if (panel == 'stockPanelPurchaseList') {
                document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                document.getElementById("deleteButt").style.visibility = "visible";
            } else if (panel == 'releaseSoldInvoice') {
                document.getElementById("itemSoldInvoiceDiv").innerHTML = xmlhttp.responseText;
                document.getElementById("deleteButt").style.visibility = "visible";
            } else {
                document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
                alert('Deleted Successfully!');
                document.getElementById("deleteButt").style.visibility = "visible";
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
}

var usertransId = new Array();
function selectAllDelete(panelName) {
    var deleteDel = document.getElementById('deleteallcheck').checked;
    var counter = parseFloat(document.getElementById('counter').value);
    if (panelName == 'releaseGirviList') {
        if (deleteDel == true) {
            confirm_box = confirm("You have selected all loan's to delete!\n Do you really want to continue!");
        }
    } else if (panelName == 'releaseCustomerList') {
        if (deleteDel == true) {
            confirm_box = confirm("You have selected all Customers to delete!\n Do you really want to continue!");
        }
    } else if (panelName == 'releasePurchaseList') {
        if (deleteDel == true) {
            confirm_box = confirm("You have selected all Purchase List to delete!\n Do you really want to continue!");
        }
    } else if (panelName == 'stockPanelPurchaseList') {
        if (deleteDel == true) {
            confirm_box = confirm("You have selected all Stock Purchase List to delete!\n Do you really want to continue!");
        }
    } else if (panelName == 'releaseSoldInvoice') {
        if (deleteDel == true) {
            confirm_box = confirm("You have selected all Invoices to delete!\n Do you really want to continue!");
        }
    }
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (deleteDel == true) {

                    for (var i = 1; i <= counter; i++) {

                        if (panelName == 'releasePurchaseList' || panelName == 'stockPanelPurchaseList') {
                            var sellPresent = document.getElementById('sellPresent' + i).value;
                            if (sellPresent == 1) {
                                alert('To Delete,First Delete This Item From Customer Jewellery Panel!');
                                document.getElementById('deletecheck' + i).checked = false;
                            } else {
                                document.getElementById('deletecheck' + i).checked = true;
                                usertransId[i] = document.getElementById('IdForDelete' + i).value;
                            }
                        } else {
                            if (xmlhttp.responseText == 'CustLoanPresent') {
                                alert("Please first delete all Loans of this Customer!");
                                document.getElementById('deleteallcheck').checked = false;
                                document.getElementById('deletecheck' + i).checked = false;
                            } else if (xmlhttp.responseText == 'CustPurInvPresent') {
                                alert("Please first delete all Purchase Invoices of this Customer!");
                                document.getElementById('deleteallcheck').checked = false;
                                document.getElementById('deletecheck' + i).checked = false;
                            } else if (xmlhttp.responseText == 'UdhaarPresent') {
                                alert("Please first delete all Udhaar of this Customer!");
                                document.getElementById('deleteallcheck').checked = false;
                                document.getElementById('deletecheck' + i).checked = false;
                            } else if (xmlhttp.responseText == 'AdvanceMoneyPresent') {
                                alert("Please first delete all Advance Money of this Customer!");
                                document.getElementById('deleteallcheck').checked = false;
                                document.getElementById('deletecheck' + i).checked = false;
                            } else if (xmlhttp.responseText == 'CustSellPresent') {
                                alert("Please first delete all Sell of this Customer!");
                                document.getElementById('deleteallcheck').checked = false;
                                document.getElementById('deletecheck' + i).checked = false;
                            } else if (xmlhttp.responseText == 'NewOrderPresent') {
                                alert("Please first delete all Orders of this Customer!");
                                document.getElementById('deleteallcheck').checked = false;
                                document.getElementById('deletecheck' + i).checked = false;
                            } else {
                                document.getElementById('deletecheck' + i).checked = true;
                                usertransId[i] = document.getElementById('IdForDelete' + i).value;
                            }
                        }
                    }
                } else {
                    for (var i = 1; i <= counter; i++) {
                        document.getElementById('deletecheck' + i).checked = false;
                    }
                }
            }
        };
    } else
    {
        document.getElementById('deleteallcheck').checked = false;
    }

    if (panelName == 'lossGirviList')
        xmlhttp.open("POST", "include/php/orgplglp" + default_theme + ".php?panelName=" + panelName, true);
    else if (panelName == 'releaseGirviList')
        xmlhttp.open("POST", "include/php/orgpregl" + default_theme + ".php?panelName=" + panelName, true);
    else if (panelName == 'releaseCustomerList')
        xmlhttp.open("POST", "include/php/omcdcsdl" + default_theme + ".php?custId=" + custId + "&panelName=" + panelName, true);
    else if (panelName == 'releasePurchaseList')
        xmlhttp.open("POST", "include/php/ogwaprlt" + default_theme + ".php?panelName=" + panelName, true);
    else if (panelName == 'stockPanelPurchaseList')
        xmlhttp.open("POST", "include/php/ogwastlt" + default_theme + ".php?panelName=" + panelName, true);
    else if (panelName == 'releaseSoldInvoice')
        xmlhttp.open("POST", "include/php/ogspsblt" + default_theme + ".php?panelName=" + panelName, true);
    xmlhttp.send();
}
//End Code to add function for delete selected and multiple loan : Author:SANT04JAN17
////////////////////////////////////Start Code For delete logs/////////////////////////////////////////////
/////// ////////////////////////////author :Suraj18JAN2018////////////////////////////////////////////////
function deleteSystemLogs() {
    confirm_box = confirm("All Systems Logs Will Be Deleted !\n Do you really want to continue!");
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

        xmlhttp.open("POST", "include/php/ommpsysdllg" + default_theme + ".php");
        xmlhttp.send();
    }

}
//////////////////////End Code For Delete Sysytem Log////////////////////////////////////////////
function deleteRecordId(panelName, recordId) {
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this record or entry?");
    if (confirm_box == true)
    {
        var poststr = "panelName=" + encodeURIComponent(panelName)
                + "&recordId=" + encodeURIComponent(recordId);
        //
        send_delete_record_id('include/php/omdelrecord' + default_theme + '.php', poststr);
    }
}
//
function send_delete_record_id(url, parameters)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertDeleteRecordId;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//
function alertDeleteRecordId()
{
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
            //alert('Deleted Successfully!');
            //document.getElementById("deleteButt").style.visibility = "visible";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
}

// It will delete the multiple selected item
function deleteAllSelectedRecord(delCheck, panelName) {
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
        if (panelName == 'retailStockPurList' || panelName == 'whsellStockPurList' || panelName == 'Stock' || panelName == 'FineStock' || panelName == 'Imitation' || panelName == 'imitationPurchaseList' || panelName == 'Crystal' || panelName == 'ImitationList' || panelName == 'CrystalList' || panelName == 'AllStock' || panelName == 'PurchaseRawStockList' || panelName == 'RawSellList' || panelName == 'FineStockDetails' || panelName == 'soldOutSellList' || panelName == 'soldOutPurList') {
            confirm_box_for_stock = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Stock?");
            if (confirm_box_for_stock == true) {
                stockDeleteConfirm = 'yes';
            } else {
                stockDeleteConfirm = 'no';
            }
        }

        var selectedDelId = new Array();
        for (var i = 0; i < delCheck.length; i++) {

            if (delCheck[i].checked)
                selectedDelId.push(delCheck[i].value);
        }

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'retailStockPurList' || panelName == 'whsellStockPurList' || panelName == 'Stock' || panelName == 'FineStock' || panelName == 'Imitation' || panelName == 'imitationPurchaseList' || panelName == 'Crystal' || panelName == 'ImitationList' || panelName == 'CrystalList' || panelName == 'AllStock') {
                    document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'PurchaseRawStockList' || panelName == 'RawSellList') {
                    document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'FineStockDetails') {
                    document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'soldOutSellList' || panelName == 'soldOutPurList') {
                    document.getElementById("sellPurchaseList").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("paymentDiv").innerHTML = xmlhttp.responseText;
                }
                window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?selectedDelId=" + selectedDelId + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm, true);
        xmlhttp.send();
    }

}


function deleteAllRecordId(panelName) {
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete these all records or entries?");
    if (confirm_box == true)
    {
        var transId = new Array();
        var delCounter = document.getElementById('counter').value;
        for (var i = 0; i <= delCounter; i++) {
            transId[i] = document.getElementById('deleteDiv' + i).value;
        }
        var poststr = "panelName=" + encodeURIComponent(panelName)
                + "&counter=" + encodeURIComponent(delCounter)
                + "&transId=" + encodeURIComponent(transId);
        //
        //alert(poststr);
        send_delete_record_id('include/php/omdelrecord' + default_theme + '.php', poststr);
    }
}
function getBarChart(div) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppbarchart" + default_theme + ".php", true);
    xmlhttp.send();
}
function barChart() {
    $(function () {

        //var data_click = <?php echo $viewer; ?>;
        //var data_viewer = [1000, 2000, 1200, 1400, 1300, 1000, 2000, 1200, 1400, 1300, 1800, 2300];
        //var data_viewer = < ?php echo $viewer; ? > ;
        var data_viewer;
        $.ajax({
            url: 'include/php/omppchartapi' + default_theme + '.php',
            success: function (response) {
                response = response.trim();
                response = response.split("|");
                //alert(response[0]);
                //alert(response[1]);
                //alert(response[2]);
                //alert(response[3]);
                //alert(response[4]);

                xAxis = JSON.parse(response[0].trim());
                yAxis = JSON.parse(response[2].trim());
                yAxis2 = JSON.parse(response[4].trim());
                Highcharts.setOptions({
                    lang: {
                        decimalPoint: '.',
                        thousandsSep: ','
                    }
                });
                $('#container').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: response[6].trim()
                    },
                    xAxis: {
                        categories: xAxis
                    },
                    yAxis: {
                        title: {
                            text: response[1].trim()
                        },
                        labels: {
                            formatter: function () {
                                return Highcharts.numberFormat(this.value, '', ',', ',');
                            }
                        }
                    },
                    series: [{
                            name: response[3].trim(),
                            color: '#008000',
                            data: yAxis
                        },
                        {
                            name: response[5].trim(),
                            color: '#e74c3c',
                            data: yAxis2
                        }]
                });
            }
        });
    });
}

// Stack Chart
function stackChart(xdata, ydata) {
    var x_axis_data = xdata.split('|');
    x_axis_data.pop();
    var y_axis_data = ydata.split('|');
    let y_axis_data_aa = y_axis_data.map(Number);
    y_axis_data_aa.pop();

    // Find the maximum value in the y_axis_data_aa array
    var max_y_value = Math.max(...y_axis_data_aa);

    $(function () {
        Highcharts.chart('chart-amount-received', {
            chart: {
                type: 'column',
                backgroundColor: '#ffffff' // White background color
            },
            title: {
                text: '',
                style: {
                    color: '#333333' // Dark title color to contrast with white background
                }
            },
            xAxis: {
                categories: x_axis_data,
                labels: {
                    style: {
                        color: '#333333' // Dark labels
                    }
                }
            },
            yAxis: {
                min: 0,
                max: max_y_value, // Set the max dynamically
                title: {
                    style: {
                        color: '#333333' // Dark title color
                    }
                },
                labels: {
                    format: '{value}',
                    style: {
                        color: '#333333' // Dark labels
                    }
                }
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{point.y}'
            },
            plotOptions: {
                column: {
                    borderRadius: 3,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}',
                        color: '#333333' // Dark data labels
                    }
                }
            },
            series: [{
                    name: 'Amount Received',
                    color: {
                        linearGradient: {x1: 0, x2: 0, y1: 0, y2: 1},
                        stops: [
                            [0, '#ccffcc'], // Top color
                            [1, '#33ff33']  // Bottom color
                        ]
                    },
                    data: y_axis_data_aa
                }]
        });
    });
}


// Total Sales Chart
function totalSalesChart(xdata, ydata) {
    var x_axis_data = xdata.split('|');
    x_axis_data.pop();
    var y_axis_data = ydata.split('|');
    let y_axis_data_aa = y_axis_data.map(Number);
    y_axis_data_aa.pop();
    var max_y_value = Math.max(...y_axis_data_aa);
    $(function () {

        Highcharts.chart('chart-total-sales', {
            chart: {
                type: 'column',
                backgroundColor: '#ffffff' // White background color
            },
            title: {
                text: '',
                style: {
                    color: '#333333' // Dark title color to contrast with white background
                }
            },
            xAxis: {
                categories: x_axis_data,
                labels: {
                    style: {
                        color: '#333333' // Dark labels
                    }
                }
            },
            yAxis: {
                min: 0,
                max: max_y_value, // Set the max dynamically
                title: {
                    style: {
                        color: '#333333' // Dark title color
                    }
                },
                labels: {
                    format: '{value}',
                    style: {
                        color: '#333333' // Dark labels
                    }
                }
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{point.y}'
            },
            plotOptions: {
                column: {
                    borderRadius: 3,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}',
                        color: '#333333' // Dark data labels
                    }
                }
            },
            series: [{
                    name: 'Sales',
                    color: {
                        linearGradient: {x1: 0, x2: 0, y1: 0, y2: 1},
                        stops: [
                            [0, '#CF8600'], // Top color (yellow)
                            [1, '#FFA808']  // Bottom color (orange)
                        ]
                    },
                    data: y_axis_data_aa
                }]
        });
    });
}

// Total Purchases Chart
function totalPurchasesChart(xdata, ydata) {
    var x_axis_data = xdata.split('|');
    x_axis_data.pop();
    var y_axis_data = ydata.split('|');
    let y_axis_data_aa = y_axis_data.map(Number);
    y_axis_data_aa.pop();
    var max_y_value = Math.max(...y_axis_data_aa);
    $(function () {

        Highcharts.chart('chart-total-purchases', {
            chart: {
                type: 'column',
                backgroundColor: '#ffffff' // White background color
            },
            title: {
                text: '',
                style: {
                    color: '#333333' // Dark title color to contrast with white background
                }
            },
            xAxis: {
                categories: x_axis_data,
                labels: {
                    style: {
                        color: '#333333' // Dark labels
                    }
                }
            },
            yAxis: {
                min: 0,
                max: max_y_value, // Set the max dynamically
                title: {
                    style: {
                        color: '#333333' // Dark title color
                    }
                },
                labels: {
                    format: '{value}',
                    style: {
                        color: '#333333' // Dark labels
                    }
                }
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{point.y}'
            },
            plotOptions: {
                column: {
                    borderRadius: 3,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}',
                        color: '#333333' // Dark data labels
                    }
                }
            },
            series: [{
                    name: 'Purchases',
                    color: {
                        linearGradient: {x1: 0, x2: 0, y1: 0, y2: 1},
                        stops: [
                            [0, '#0D5BAB'], // Top color (yellow)
                            [1, '#6AA2DD']  // Bottom color (orange)
                        ]
                    },
                    data: y_axis_data_aa
                }]
        });
    });
}

// Total Purchases Chart
function stockAnalysisChart(xdata, ydata) {
    var x_axis_data = xdata.split('|');
    x_axis_data.pop();
    var y_axis_data = ydata.split('|');
    let y_axis_data_aa = y_axis_data.map(Number);
    y_axis_data_aa.pop();
    var max_y_value = Math.max(...y_axis_data_aa);
    $(function () {

        Highcharts.chart('chart-stock-analysis', {
            chart: {
                type: 'line',
                backgroundColor: '#ffffff' // White background color
            },
            title: {
                text: '',
                style: {
                    color: '#333333' // Dark title color to contrast with white background
                }
            },
            xAxis: {
                categories: x_axis_data,
                labels: {
                    style: {
                        color: '#333333' // Dark labels
                    }
                }
            },
            yAxis: {
                min: 0,
                max: max_y_value, // Set the max dynamically
                title: {
                    style: {
                        color: '#333333' // Dark title color
                    }
                },
                labels: {
                    format: '{value}',
                    style: {
                        color: '#333333' // Dark labels
                    }
                }
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{point.y}'
            },
            plotOptions: {
                column: {
                    borderRadius: 3,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y}',
                        color: '#333333' // Dark data labels
                    }
                }
            },
            series: [{
                    name: 'Stock',
                    color: {
                        linearGradient: {x1: 0, x2: 0, y1: 0, y2: 1},
                        stops: [
                            [0, '#0D5BAB'], // Top color (yellow)
                            [1, '#6AA2DD']  // Bottom color (orange)
                        ]
                    },
                    data: y_axis_data_aa
                }]
        });
    });
}
function calculatesellpurchasemetaldashbord(goldavgrate, goldweight, sliveravgrate, sliverweight, sell_or_purchase) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("sell_purchase_div").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omchangsellpurchase" + default_theme + ".php?goldavgrate=" + goldavgrate +
            "&goldweight=" + goldweight + "&sliveravgrate=" + sliveravgrate +
            "&sell_or_purchase=" + sell_or_purchase + "&sliverweight=" + sliverweight, true);
    xmlhttp.send();
}
function calculatepayreceivedashbord(payable, reiveable) {
    document.getElementById("payableamt").innerHTML = Number(payable).toLocaleString('en-US');
    document.getElementById("Receivable").innerHTML = Number(reiveable).toLocaleString('en-US');

}
function changepayrecivetype(paytype) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("pay_amt_recive_div").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ompayamtrevgraph" + default_theme + ".php?paytype=" + paytype, true);
    xmlhttp.send();
}

function calculategstdashbord(showgstmonth) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("gst_amt_div").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omcaldashgst" + default_theme + ".php?showgstmonth=" + showgstmonth, true);
    xmlhttp.send();
}
function showStockItemDetailsGeneralDiv(sttrId, stockType, panelName, sttrSttrid, invoicePreNo = '', invoiceNo = '', custId = '', utinId = '') {
    //
    //alert(stockType);
    //alert(panelName);
    //
    var updatePanelName;
    var newPanelName;
    var documentRootPath = document.getElementById('documentRootPath').value;
    //
    if (panelName == 'FineStock' || panelName == 'Stock' ||
            panelName == 'FineStockDetails' || panelName == 'AllStock' || panelName == 'FineStock' || panelName == 'AllTagStock') {
        //
        newPanelName = 'UpdateStock';
        updatePanelName = 'UpdateStock';
        //
    }
    //
    if (panelName == 'Imitation' || panelName == 'ImitationStockDetails' ||
            panelName == 'imitationPurchaseList' || panelName == 'ImitationList' ||
            panelName == 'PurchaseList') {
        //
        if (stockType == 'wholesale') {
            stockType = 'wholeSale';
        }
        //
        newPanelName = 'ImitationStock';
        updatePanelName = 'UpdateImitationStock';
        //
    }
    //
    if (panelName == 'Crystal' || panelName == 'CrystalItemStockDetails' || panelName == 'CrystalList' || panelName == 'CrystalItemStockDetails' || panelName == 'CrystalList' || panelName == 'CrystalrwholesaleStock' || panelName == 'CrystalretailStock') { //add new panelname for wholesale and retail crystal stock list report @omkar31JAN2024
        //
        if (stockType == 'retail') {
            stockType = 'retailStock';
        } else {
            stockType = 'wholeSaleStock';
        }
        //
        newPanelName = 'CrystalPanel';
        updatePanelName = 'UpdateCrystal';
        //
    }
    //
    if (panelName == 'Strellering' || panelName == 'StrelleringStockDetails' ||
            panelName == 'StrelleringSilverList') {
        //
        if (stockType == 'retail') {
            stockType = 'retailStock';
        } else {
            stockType = 'wholeSaleStock';
        }
        //
        newPanelName = 'StrelleringStock';
        updatePanelName = 'UpdateStrelleringStock';
        //
    }
    //
    if (stockType == 'retail') {
        stockType = 'retail';
    }
    //
    if (stockType == 'wholesale') {
        stockType = 'wholeSaleStock';
    }
    //
    if (panelName == 'AllWholesaleStock') {
        newPanelName = 'UpdateStock';
        updatePanelName = 'UpdateStock';
    }
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        }
    };
    if (panelName == 'ImitationList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijssdv" + default_theme + ".php?stId=" + sttrId +
                "&updatePanelName=ImitationStockPayUp" + "&panelName=ImitationStock" + "&suppId=" + custId, true);
    } else if (invoicePreNo != '' && invoicePreNo != null && invoiceNo != '' && invoiceNo != null) {
        xmlhttp.open("POST", "include/php/ogwadinv" + default_theme + ".php?utinId=" + utinId + "&panelName=UpdateItem&paymentPanelName=StockPayUp" +
                "&preInvoiceNo=" + invoicePreNo + "&PreInvoiceNo=" + invoiceNo +
                "&postInvoiceNo=" + invoiceNo + "&invoiceNo=" + invoicePreNo +
                "&suppId=" + custId + "&suppPayId=" + utinId + "&mainPanel=CustHome", true);
    } else if (panelName == 'FineWholesaleStock') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?stId=" + sttrId +
                "&updatePanelName=" + updatePanelName + "&panelName=" + newPanelName +
                "&stockType=" + stockType, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + sttrId +
                "&updatePanelName=" + updatePanelName + "&panelName=" + newPanelName +
                "&stockType=" + stockType, true);
    }
    xmlhttp.send();
}
//
function showStockItemDetailsGeneralDivTemp(sttrId, stockType, panelName, sttrSttrid, invoicePreNo, invoiceNo, custId, utinId) {
    if (custId != '' && custId != null) {
        showStockItemDetailsGeneralDiv(sttrId, stockType, panelName, sttrSttrid, invoicePreNo, invoiceNo, custId, utinId);
    } else {
        if (panelName == 'AllStock' || panelName == 'AllWholesaleStock' || panelName == 'Stock') {
            showStockItemDetailsGeneralDiv(sttrId, stockType, panelName, sttrSttrid, invoicePreNo, invoiceNo, custId, utinId);
        } else {
            var documentRootPath = document.getElementById("documentRootPath").value;
            showImitationStockDiv(documentRootPath, sttrId, 'UpdateImitationStock', stockType, 'ImitationStock', '', '');
        }
    }
}
//
////Onclick Action changed by @auth:ratnakar
function showMetalDetailWise(condition1, stockPurity, panelName, depth, condition2, condition3) {

    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'RawDetUpPanel')
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            else
                document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
        }

    };

    if (panelName == 'RawDetUpPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrwiadv" + default_theme + ".php?sttr_id=" + condition1
                + "&stockPurity=" + stockPurity + "&rawPanelName=" + panelName + "&condition=" + depth, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmprlt" + default_theme + ".php?con1=" + condition1
                + "&stockPurity=" + stockPurity + "&listPanel=" + panelName + "&depth=" + depth + "&con2=" + condition2 + "&con3=" + condition3, true);
    }
    xmlhttp.send();
}

oFReader = new FileReader(), rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;
oFReader.onload = function (oFREvent) {

    var img = new Image();
    img.onload = function () {
        //document.getElementById("originalImg").src=img.src;
        var canvas = document.createElement("canvas");
        var ctx = canvas.getContext("2d");
        ratio = img.width / img.height;
        if (img.width > 1280) {
            canvas.width = 1280;
            canvas.height = 1280 / ratio;
        } else {
            //alert(document.getElementById("addItemSelectPhoto").files[0].size / 1024);
            //alert(document.getElementById("addItemSelectPhoto").files[0].name.match(/.(png|gif)$/i));
            if (typeof (document.getElementById('checkOMECOMImg')) != 'undefined' &&
                    document.getElementById('checkOMECOMImg') != null) {
                if (parseInt(document.getElementById("addItemSelectPhoto").files[0].size / 1024) < 1000 && document.getElementById("checkOMECOMImg").value == 'YES') {
                    canvas.width = img.width;
                    canvas.height = img.height;
                } else if (parseInt(document.getElementById("addItemSelectPhoto").files[0].size / 1024) < 500) {
                    canvas.width = img.width / 2;
                    canvas.height = img.height / 2;
                } else if (parseInt(document.getElementById("addItemSelectPhoto").files[0].size / 1024) < 1000) {
                    canvas.width = img.width / 3;
                    canvas.height = img.height / 3;
                }
            } else if (parseInt(document.getElementById("addItemSelectPhoto").files[0].size / 1024) < 200) {
                canvas.width = img.width;
                canvas.height = img.height;
            } else if (parseInt(document.getElementById("addItemSelectPhoto").files[0].size / 1024) < 500) {
                canvas.width = img.width / 2;
                canvas.height = img.height / 2;
            } else if (parseInt(document.getElementById("addItemSelectPhoto").files[0].size / 1024) < 1000) {
                canvas.width = img.width / 3;
                canvas.height = img.height / 3;
            }
        }
        document.getElementById('compressedImageSize').value = canvas.width * canvas.height * 0.20;
        ctx.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
        //document.getElementById("uploadPreview").src = canvas.toDataURL();
        if (document.getElementById("addItemSelectPhoto").files[0].name.match(/.(png|gif)$/i) == '.png,png')
            document.getElementById('compressedImage').value = canvas.toDataURL('image/png');
        else
            document.getElementById('compressedImage').value = canvas.toDataURL('image/jpeg');
        //document.getElementById('compressedImageSize').value = canvas.size;
        if (parseInt(document.getElementById("addItemSelectPhoto").files[0].size / 1024) > 300) {
            canvas.width = 256;
            canvas.height = 256;
        }
        ctx.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
        document.getElementById('compressedImageThumb').value = canvas.toDataURL('image/jpeg');
    }
    img.src = oFREvent.target.result;
    //document.getElementById('imageup2').src = img.src;
    //document.getElementById('compressedImage').value = img.src;
    //
    //document.getElementById('fileName').value = img.src;
};
//This code updated by @Pratiksha Ingale 11-01-2025
function checkimagesize(fileInputId) {
    var fileInput = document.getElementById(fileInputId);
    var file = fileInput.files[0]; // Get the selected file

    // Check if a file is selected
    if (!file) {
        alert('Please select a file to upload.');
        return false;
    }

    // Check file size
    var fileSizeInBytes = file.size; // File size in bytes
    var fileSizeInMB = fileSizeInBytes / (1024 * 1024); // Convert to MB

    if (fileSizeInMB > 1) {
        alert('The selected file exceeds the 1 MB limit. Please upload a smaller image.');
        fileInput.value = ''; // Reset file input
        return false;
    }

    // Optional: Additional checks for file type
    var allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!allowedFileTypes.includes(file.type)) {
        alert('Invalid file type. Please upload an image (JPEG, PNG, or GIF).');
        fileInput.value = ''; // Reset file input
        return false;
    }

    return true; // Validation passed
}
//This code updated end  by @Pratiksha Ingale 11-01-2025
function loadImageFileCompress(cust = '') {

//code updated by Hrushali

    if (cust) {
        if (document.getElementById("addItemSelectPhoto").files.length === 0) {
            return;
        }
        var oFile = document.getElementById("addItemSelectPhoto").files[0];


        var maxSizeInBytes = 1024 * 1024; // 1 MB = 1 * 1024 KB * 1024 Bytes

        if (oFile.size > maxSizeInBytes) {
            alert("File size exceeds the 1 MB limitPlease select a smaller file. ");
            return;
        }
    } else {
        if (document.getElementById("addItemSelectPhoto").files.length === 0) {
            return;
        }
        var oFile = document.getElementById("addItemSelectPhoto").files[0];
    }
//else{
//     if (document.getElementById("selectPhotoLeft").files.length === 0) {
//    return;
//    }
//    var oFile = document.getElementById("selectPhotoLeft").files[0];
//    
//
//var maxSizeInBytes = 1 * 1024 ; // 300 MB = 300 * 1024 KB * 1024 Bytes
//
//// Validate the file size
//   if (oFile.size > maxSizeInBytes) {
//    alert("File size exceeds the 1 MB limit,Please select a smaller file.");
//    
//    return ;
//    
//        }
//    
//}


//    if (!rFilter.test(oFile.type)) {
//        alert("You must select a valid image file!");
//        return;
//    }
    oFReader.readAsDataURL(oFile);
    document.getElementById('fileName').value = document.getElementById("addItemSelectPhoto").value;
    //document.getElementById("addItemSelectPhoto").value = '';
}

//code ended by Hrushali
oFReaderDoc = new FileReader(), rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;
oFReaderDoc.onload = function (oFREvent) {
    var img = new Image();
    img.onload = function () {
        //document.getElementById("originalImg").src=img.src;
        var canvas = document.createElement("canvas");
        var ctx = canvas.getContext("2d");
        ratio = img.width / img.height;
        canvas.width = 1280;
        canvas.height = 1280 / ratio;
        document.getElementById(DocCompressFileSize).value = canvas.width * canvas.height * 0.20;
        ctx.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
        //document.getElementById("uploadPreview").src = canvas.toDataURL();
        if (document.getElementById(DocFileId).files[0].name.match(/.(png|gif)$/i) == '.png,png')
            document.getElementById(DocCompressImgId).value = canvas.toDataURL('image/png');
        else
            document.getElementById(DocCompressImgId).value = canvas.toDataURL('image/jpeg');
        //document.getElementById('compressedImageSize').value = canvas.size;
        if (parseInt(document.getElementById(DocFileId).files[0].size / 1024) > 300) {
            canvas.width = 256;
            canvas.height = 256;
        }
        //alert( canvas.height);
        //alert("Image 222 loaded: width=" + canvas.width + ", height=" +canvas.height);
        ctx.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
        document.getElementById(DocCompressImgThumb).value = canvas.toDataURL('image/jpeg');
    }
    img.src = oFREvent.target.result;
    //document.getElementById('imageup2').src = img.src;
    //
    //document.getElementById('fileName').value = img.src;
};
function loadStaffDocumentFileCompress(FileId, FileInputId, CompressImageId, CompressImageThumb, CompressFileSize, NotifyId)
{
    DocFileId = FileId;
    //DocFileInputId=FileInputId;
    DocCompressImgId = CompressImageId;
    DocCompressImgThumb = CompressImageThumb;
    DocCompressFileSize = CompressFileSize;
    var filePath = document.getElementById(FileId).value;
    if (document.getElementById(FileId).files.length === 0) {
        return;
    }
    var oFile = document.getElementById(FileId).files[0];
    if (!rFilter.test(oFile.type)) {
        document.getElementById(NotifyId).innerText = "Please Enter Valid File";
        document.getElementById(NotifyId).style.color = "red";
        document.getElementById(FileInputId).value = "";
        return;
    } else {
        oFReaderDoc.readAsDataURL(oFile);
        document.getElementById(NotifyId).innerText = filePath;
        document.getElementById(NotifyId).style.color = "Green";
        document.getElementById(FileInputId).value = filePath;
    }
}

function loadImageFileCompressAutoSub() {

    if (document.getElementById("addImageAutoSub").files.length === 0) {
        alert('File not loaded!');
        return;
    }
    //
    var oFile = document.getElementById("addImageAutoSub").files[0];
    //alert(document.getElementById("addImageAutoSub").files.length);
    if (!rFilter.test(oFile.type)) {
        alert("You must select a valid image file!");
        return;
    }
    loadImageFileCompressAutoSubFun();
    oFReaderInv.readAsDataURL(oFile);
    document.getElementById('fileNameInv').value = document.getElementById("addImageAutoSub").value;
    alert("Image has been uploaded successfully! Please click here to continue!");
    setTimeout(() => {
        document.getElementById('add_new_inv_image').submit();
    }, 200);
    //setTimeout(document.getElementById('add_new_inv_image').submit(), 10000);
}
//
function loadImageFileCompressAutoSubFun() {
//    alert('hi');
    oFReaderInv = new FileReader(), rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;
    oFReaderInv.onload = function (oFREventInv) {
        //
        var img = new Image();
        img.onload = function () {
            //alert('hi');
            //document.getElementById("originalImg").src=img.src;
            var canvas = document.createElement("canvas");
            var ctx = canvas.getContext("2d");
            ratio = img.width / img.height;
            if (img.width > 1280) {
                canvas.width = 1280;
                canvas.height = 1280 / ratio;
            } else {
                //alert(document.getElementById("addImageAutoSub").files[0].name.match(/.(png|gif)$/i));
                if (typeof (document.getElementById('checkOMECOMImg')) != 'undefined' &&
                        document.getElementById('checkOMECOMImg') != null) {
                    if (parseInt(document.getElementById("addImageAutoSub").files[0].size / 1024) < 1000 && document.getElementById("checkOMECOMImg").value == 'YES') {
                        canvas.width = img.width;
                        canvas.height = img.height;
                    } else if (parseInt(document.getElementById("addImageAutoSub").files[0].size / 1024) < 500) {
                        canvas.width = img.width / 2;
                        canvas.height = img.height / 2;
                    } else if (parseInt(document.getElementById("addImageAutoSub").files[0].size / 1024) < 1000) {
                        canvas.width = img.width / 3;
                        canvas.height = img.height / 3;
                    }
                } else if (parseInt(document.getElementById("addImageAutoSub").files[0].size / 1024) < 1200) {
                    canvas.width = img.width;
                    canvas.height = img.height;
                } else {
                    canvas.width = img.width;
                    canvas.height = img.height;
                }
            }
            document.getElementById('compressedImageSizeInv').value = canvas.width * canvas.height * 0.20;
            //
            ctx.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
            //document.getElementById("uploadPreview").src = canvas.toDataURL();
            if (document.getElementById("addImageAutoSub").files[0].name.match(/.(png|gif)$/i) == '.png,png')
                document.getElementById('compressedImageInv').value = canvas.toDataURL('image/png');
            else
                document.getElementById('compressedImageInv').value = canvas.toDataURL('image/jpeg');
            //document.getElementById('compressedImageSize').value = canvas.size;
            if (parseInt(document.getElementById("addImageAutoSub").files[0].size / 1024) > 300) {
                canvas.width = 256;
                canvas.height = 256;
            }
            ctx.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
            document.getElementById('compressedImageThumbInv').value = canvas.toDataURL('image/jpeg');
        }
        img.src = oFREventInv.target.result;
        //alert(img.src);
        //document.getElementById('compressedImage').value = img.src;
        //
        //document.getElementById('fileName').value = img.src;
    };
}
//===================================================================================================
//====================== START CODE FOR ADD HEADER INFO IMG @SIMRAN:30MAR2023=====================//
//===================================================================================================
function loadImageFileCompressAutoSub2() {

    if (document.getElementById("addImageAutoSub2").files.length === 0) {
        alert('File not loaded!');
        return;
    }
    //
    var oFile = document.getElementById("addImageAutoSub2").files[0];
    //alert(document.getElementById("addImageAutoSub").files.length);
    if (!rFilter.test(oFile.type)) {
        alert("You must select a valid image file!");
        return;
    }
    loadImageFileCompressAutoSubFun2();
    oFReaderInv.readAsDataURL(oFile);
    document.getElementById('fileNameInv2').value = document.getElementById("addImageAutoSub2").value;
    alert("Image has been uploaded successfully! Please click here to continue!");
    setTimeout(() => {
        document.getElementById('add_new_inv_image2').submit();
    }, 200);
    //setTimeout(document.getElementById('add_new_inv_image').submit(), 10000);
}
//
function loadImageFileCompressAutoSubFun2() {
//    alert('hi');
    oFReaderInv = new FileReader(), rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;
    oFReaderInv.onload = function (oFREventInv) {
        //
        var img = new Image();
        img.onload = function () {
            //alert('hi');
            //document.getElementById("originalImg").src=img.src;
            var canvas = document.createElement("canvas");
            var ctx = canvas.getContext("2d");
            ratio = img.width / img.height;
            if (img.width > 1280) {
                canvas.width = 1280;
                canvas.height = 1280 / ratio;
            } else {
                //alert(document.getElementById("addImageAutoSub").files[0].name.match(/.(png|gif)$/i));
                if (typeof (document.getElementById('checkOMECOMImg')) != 'undefined' &&
                        document.getElementById('checkOMECOMImg') != null) {
                    if (parseInt(document.getElementById("addImageAutoSub2").files[0].size / 1024) < 1000 && document.getElementById("checkOMECOMImg").value == 'YES') {
                        canvas.width = img.width;
                        canvas.height = img.height;
                    } else if (parseInt(document.getElementById("addImageAutoSub2").files[0].size / 1024) < 500) {
                        canvas.width = img.width / 2;
                        canvas.height = img.height / 2;
                    } else if (parseInt(document.getElementById("addImageAutoSub2").files[0].size / 1024) < 1000) {
                        canvas.width = img.width / 3;
                        canvas.height = img.height / 3;
                    }
                } else if (parseInt(document.getElementById("addImageAutoSub2").files[0].size / 1024) < 1200) {
                    canvas.width = img.width;
                    canvas.height = img.height;
                } else {
                    canvas.width = img.width;
                    canvas.height = img.height;
                }
            }
            document.getElementById('compressedImageSizeInv2').value = canvas.width * canvas.height * 0.20;
            //
            ctx.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
            //document.getElementById("uploadPreview").src = canvas.toDataURL();
            if (document.getElementById("addImageAutoSub2").files[0].name.match(/.(png|gif)$/i) == '.png,png')
                document.getElementById('compressedImageInv2').value = canvas.toDataURL('image/png');
            else
                document.getElementById('compressedImageInv2').value = canvas.toDataURL('image/jpeg');
            //document.getElementById('compressedImageSize').value = canvas.size;
            if (parseInt(document.getElementById("addImageAutoSub2").files[0].size / 1024) > 300) {
                canvas.width = 256;
                canvas.height = 256;
            }
            ctx.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
            document.getElementById('compressedImageThumbInv2').value = canvas.toDataURL('image/jpeg');
        }
        img.src = oFREventInv.target.result;
        //alert(img.src);
        //document.getElementById('compressedImage').value = img.src;
        //
        //document.getElementById('fileName').value = img.src;
    };
}
//===================================================================================================
//====================== END CODE FOR ADD HEADER INFO IMG @SIMRAN:30MAR2023=====================//
//===================================================================================================
//
function loadImageCompresswithcnt(itemDivCount) {
//    var  itemDivCount;
    oFReaderCount = new FileReader(), rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;
    oFReaderCount.onload = function (oFREventCount) {

        var img = new Image();
        img.onload = function () {
            //document.getElementById("originalImg").src=img.src;
            var canvas = document.createElement("canvas");
            var ctx = canvas.getContext("2d");
            ratio = img.width / img.height;
            if (img.width > 1280) {
                canvas.width = 1280;
                canvas.height = 1280 / ratio;
            } else {
                //alert(document.getElementById("addItemSelectPhoto").files[0].name.match(/.(png|gif)$/i));
                if (typeof (document.getElementById('checkOMECOMImg')) != 'undefined' &&
                        document.getElementById('checkOMECOMImg') != null) {
                    if (parseInt(document.getElementById("addItemSelectPhoto" + itemDivCount).files[0].size / 1024) < 1000 && document.getElementById("checkOMECOMImg").value == 'YES') {
                        canvas.width = img.width;
                        canvas.height = img.height;
                    } else if (parseInt(document.getElementById("addItemSelectPhoto" + itemDivCount).files[0].size / 1024) < 500) {
                        canvas.width = img.width / 2;
                        canvas.height = img.height / 2;
                    } else if (parseInt(document.getElementById("addItemSelectPhoto" + itemDivCount).files[0].size / 1024) < 1000) {
                        canvas.width = img.width / 3;
                        canvas.height = img.height / 3;
                    }
                } else if (parseInt(document.getElementById("addItemSelectPhoto" + itemDivCount).files[0].size / 1024) < 100) {
                    canvas.width = img.width;
                    canvas.height = img.height;
                } else if (parseInt(document.getElementById("addItemSelectPhoto" + itemDivCount).files[0].size / 1024) < 500) {
                    canvas.width = img.width / 2;
                    canvas.height = img.height / 2;
                } else if (parseInt(document.getElementById("addItemSelectPhoto" + itemDivCount).files[0].size / 1024) < 1000) {
                    canvas.width = img.width / 3;
                    canvas.height = img.height / 3;
                }
            }
            document.getElementById('compressedImageSize' + itemDivCount).value = canvas.width * canvas.height * 0.20;
            //
            ctx.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
            //document.getElementById("uploadPreview").src = canvas.toDataURL();
            if (document.getElementById("addItemSelectPhoto" + itemDivCount).files[0].name.match(/.(png|gif)$/i) == '.png,png')
                document.getElementById('compressedImage' + itemDivCount).value = canvas.toDataURL('image/png');
            else
                document.getElementById('compressedImage' + itemDivCount).value = canvas.toDataURL('image/jpeg');
            //document.getElementById('compressedImageSize').value = canvas.size;
            if (parseInt(document.getElementById("addItemSelectPhoto" + itemDivCount).files[0].size / 1024) > 300) {
                canvas.width = 256;
                canvas.height = 256;
            }
            ctx.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
            document.getElementById('compressedImageThumb' + itemDivCount).value = canvas.toDataURL('image/jpeg');
        }
        img.src = oFREventCount.target.result;
        //document.getElementById('compressedImage').value = img.src;
        //
        //document.getElementById('fileName').value = img.src;
    };
}
function loadImageFileCompresswithcnt(itemDivCount) {
    if (document.getElementById("addItemSelectPhoto" + itemDivCount).files.length === 0) {
        return;
    }
    var oFile = document.getElementById("addItemSelectPhoto" + itemDivCount).files[0];
    if (!rFilter.test(oFile.type)) {
        alert("You must select a valid image file!");
        return;
    }
    loadImageCompresswithcnt(itemDivCount);
    oFReaderCount.readAsDataURL(oFile);
    document.getElementById('fileName' + itemDivCount).value = document.getElementById("addItemSelectPhoto" + itemDivCount).value;
    document.getElementById("addItemSelectPhoto").value = '';
}
function loadImageFileCompressDynamic(element) {
    if (!element || element.files.length === 0) {
        return;
    }

    var itemDivCount = element.getAttribute("id").replace("addItemSelectPhoto", "");
    var fileDiv = document.getElementById("fileInputDiv" + itemDivCount);

    if (!fileDiv) {
        console.error("fileInputDiv" + itemDivCount + " not found!");
        return;
    }

    var oFile = element.files[0];

    if (!rFilter.test(oFile.type)) {
        alert("You must select a valid image file!");
        return;
    }

    loadImageCompresswithcnt(itemDivCount);
    var oFReader = new FileReader();

    oFReader.onload = function () {
        document.getElementById("fileName" + itemDivCount).value = element.value;
        fileDiv.innerHTML = "<img src='" + oFReader.result + "' alt='Uploaded Image' width='100'>";
    };

    oFReader.readAsDataURL(oFile);
}

//
/******START CODE TO ADD FUNCTION FOR TOTAL VALUATION IN LOAN PANEL @ASHWINI:24AUG2023******/
function totalvaluationforloan(itemDivCount) {
    var valueofitem = 0;
    var valueoftotalitems = 0;
    for (var item = 1; item <= itemDivCount; item++) {
        valueofitem = document.getElementById("girviValuationMan" + item).placeholder;
        if (valueofitem != 'NaN')
        {
            valueoftotalitems = parseFloat(valueoftotalitems) + parseFloat(valueofitem);
            //console.log(valueofitem1);
        }
    }
    //console.log((valueofitem1));
    var formattedValue = valueoftotalitems.toFixed(2);
    document.getElementById("displayValueDiv").textContent = "(" + formattedValue + ")";
}
/******END CODE TO ADD FUNCTION FOR TOTAL VALUATION IN LOAN PANEL @ASHWINI:24AUG2023********/
//
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
                    document.getElementById("ajax_loading_lg_div").style.visibility = "hidden";
                    var fileName = strArray[1];
                    var custIdArr = new Array();
                    custIdArr = fileName.split(".");
                    fingerId = custIdArr[0];
//                    alert(fingerId);
                    if (fingerId != '' || fingerId != null) {
                        goLoginByFingerScan(fingerId);
                    }
                } else {
                    document.getElementById('ajax_loading_lg_div').innerHTML = 'Finger Print Device Error OR Finger Prints Not Matched!';
                }
            } else {
                document.getElementById("ajax_loading_lg_div").style.visibility = "hidden";
            }
        } else {
            document.getElementById("ajax_loading_lg_div").style.visibility = "visible";
        }
    }

    if (id == "captureButt") {
        req.open("GET", "include/php/ommpfgsccapture" + default_theme + ".php?custId=" + fingerId, true);
    } else {
        req.open("GET", "include/php/ommpfgscverify" + default_theme + ".php?checkSession=NO", true);
    }
    req.send();
}
//
function goLoginByFingerScan(fingerId) {
    //alert(fingerId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajax_loading_lg_div").style.visibility = "hidden";
            window.location.href = xmlhttp.responseText;
        } else {
            document.getElementById("ajax_loading_lg_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/owner/omolowlg" + default_theme + ".php?ownerId=" + fingerId, true);
    xmlhttp.send();
}


//------------------------------Add Function to Switch Transaction Panel To Trasaction Payment---------------------------------//
//----------------------------------------------Modified By Harshad---------------------------------------------------//

function transactionPayment() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("changeTransactionPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    document.getElementById("transactionPanel_div").style.display = "none";
    document.getElementById("paymentTransaction_div").style.display = "block";
    xmlhttp.open("GET", "include/php/omtransactionPanel" + default_theme + ".php", true);
    xmlhttp.send();
}

function transactionPaymentList(panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("changeTransactionPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    document.getElementById("transactionPanel_div").style.display = "none";
    document.getElementById("paymentTransaction_div").style.display = "block";
    xmlhttp.open("GET", "include/php/omtranpaylst" + default_theme + ".php?panelName=" + panelName, true);
    xmlhttp.send();
}

function transactionPanel(custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("changeTransactionPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    document.getElementById("transactionPanel_div").style.display = "block";
    document.getElementById("paymentTransaction_div").style.display = "none";
    xmlhttp.open("GET", "include/php/omtatrndsb" + default_theme + ".php?custId=" + custId, true);
    xmlhttp.send();
}

function transactionPanelMany(custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("changeTransactionPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    document.getElementById("transactionPanel_div").style.display = "block";
    document.getElementById("paymentTransaction_div").style.display = "none";
    xmlhttp.open("GET", "include/php/omtatrndsb_new" + default_theme + ".php?custId=" + custId, true);
    xmlhttp.send();
}
function transaction() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("changeTransactionPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    document.getElementById("transactionPanel_div").style.display = "block";
    document.getElementById("paymentTransaction_div").style.display = "none";
    xmlhttp.open("GET", "include/php/omDailyTransPayment" + default_theme + ".php", true);
    xmlhttp.send();
}


//--------------------------------------Modified By Harshad-----------------------------------------------//


//----------------------------Add Function to set values in Trasaction Payment Invoice Div----------------------------//
//--------------------------------------Modified By Harshad-----------------------------------------------//
function showPaymentTransactionDetailsDiv(utinId, panelName) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("changeTransactionPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omtransactionPanel" + default_theme + ".php?panelName=" + panelName + "&utinId=" + utinId, true);
    xmlhttp.send();
}
//--------------------------------------Modified By Harshad-----------------------------------------------//

//---------------------------- Function to Navigate on Stock Panel ----------------------------//
//-------------------------------------- Modified By Sunaina -----------------------------------------------//
function navigationUniversal(divPanel, divName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addstockform").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/stock/omAddNewForm" + default_theme + ".php?divPanel" + divPanel + "&divName" + divName, true);
    xmlhttp.send();
}
function AddStockUniForm(divPanel, divName) {
    loadXMLDoc();
    //alert("hellllo");
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("UniAddStockform").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/stock/omAddStock" + default_theme + ".php?divPanel" + divPanel + "&divName" + divName, true);
    xmlhttp.send();
}
function GenerateBarcode() {
    loadXMLDoc();
    //alert("hellllo");
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            // document.getElementById("UniAddStockform").innerHTML = xmlhttp.responseText;

            alert("ALL BARCODE ARE GENERATED");
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omadgenitbc" + default_theme + ".php");
    xmlhttp.send();
}

// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR GOOGLE SUGGESTION FUNCTIONALITY @PRIYANKA-03MAY18
// *************************************************************************************************************************************
var googleSuggKeyCode;
var googleSuggDiv;
var mainInputFieldIdGlobal;
function googleSuggestionDropdown(tableName, columnName, searchValue, whereConditionColumns, mainInputFieldId, selectDropdownClass, keyCodeInput, searchValueBlank, googleSuggDivLocal) {
    //
    var documentRootPath = document.getElementById('documentRootPath').value;
    //
    //alert('documentRootPath == ' + documentRootPath);
    //
    googleSuggKeyCode = keyCodeInput;
    googleSuggDiv = googleSuggDivLocal;
    mainInputFieldIdGlobal = mainInputFieldId;
    var poststr = "searchValue=" + encodeURIComponent(searchValue) +
            "&keyCodeInput=" + encodeURIComponent(keyCodeInput) +
            "&tableName=" + encodeURIComponent(tableName) +
            "&columnName=" + encodeURIComponent(columnName) +
            "&whereConditionColumns=" + encodeURIComponent(whereConditionColumns) +
            "&mainInputFieldId=" + encodeURIComponent(mainInputFieldId) +
            "&selectDropdownClass=" + encodeURIComponent(selectDropdownClass) +
            "&searchValueBlank=" + encodeURIComponent(searchValueBlank);

    //alert('poststr' + poststr);

    google_suggestion_dropdown(documentRootPath + "/include/php/omGoogleSuggestion" + default_theme + ".php", poststr);
    return false;
}
//
function google_suggestion_dropdown(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertGoogleSuggestionDropdown;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//
function alertGoogleSuggestionDropdown() {
    //
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        //document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        //
        if (xmlhttp.responseText != '') {
            document.getElementById(googleSuggDiv).innerHTML = xmlhttp.responseText;
        }
        //
        if (googleSuggKeyCode == 40 || googleSuggKeyCode == 38) {
            //document.getElementById('googleSuggForSearchValueSelect').focus();
            var element = document.getElementById('googleSuggForSearchValueSelect');
            //
            if (typeof (element) != 'undefined' && element != null)
            {
                var elementSelectedIndex = element.selectedIndex;
                //
                if (element.selectedIndex == -1) {
                    document.getElementById('googleSuggForSearchValueSelect').options[0].selected = true;
                    //element.selectedIndex = 0;
                } else {
                    if (googleSuggKeyCode == 40) {
                        document.getElementById('googleSuggForSearchValueSelect').options[elementSelectedIndex].selected = false;
                        if (elementSelectedIndex < element.options.length - 1)
                            document.getElementById('googleSuggForSearchValueSelect').options[elementSelectedIndex + 1].selected = true;
                    }
                    if (googleSuggKeyCode == 38) {
                        document.getElementById('googleSuggForSearchValueSelect').options[elementSelectedIndex].selected = false;
                        if (elementSelectedIndex > 0)
                            document.getElementById('googleSuggForSearchValueSelect').options[elementSelectedIndex - 1].selected = true;
                    }
                }
                //alert(encodeURIComponent(document.getElementById('googleSuggForSearchValueSelect').value));
                //document.cookie = "om_google_sugg_srchstr=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
                document.cookie = "om_google_sugg_srchstr=" + encodeURIComponent(document.getElementById('googleSuggForSearchValueSelect').value) + ";path=/;";
                //alert(document.cookie);
                valueStr = document.getElementById('googleSuggForSearchValueSelect').value;
                if (valueStr.indexOf('~') >= 0) {
                    document.getElementById(mainInputFieldIdGlobal).value = valueStr.substr(valueStr.indexOf('~') + 1);
                    document.getElementById(mainInputFieldIdGlobal + '_id').value = valueStr.substr(0, valueStr.indexOf('~'));
                } else {
                    document.getElementById(mainInputFieldIdGlobal).value = document.getElementById('googleSuggForSearchValueSelect').value;
                }
//            document.getElementById(mainInputFieldIdGlobal).focus();
            }
        }
    } else {
        //document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//
//
function google_suggestion_dropdown_blank(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertGoogleSuggestionDropdownBlank;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertGoogleSuggestionDropdownBlank() {
    //
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        //document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (typeof (document.getElementById('googleSuggForSearchValueSelect')) != 'undefined' && document.getElementById('googleSuggForSearchValueSelect') != null) {
            if (document.getElementById('googleSuggForSearchValueSelect').value != '') {
                //document.getElementById(mainInputFieldIdGlobal).value = document.getElementById('googleSuggForSearchValueSelect').value;
                valueStrBlank = document.getElementById('googleSuggForSearchValueSelect').value;
                if (valueStrBlank.indexOf('~') >= 0) {
                    document.getElementById(mainInputFieldIdGlobal).value = valueStrBlank.substr(valueStr.indexOf('~') + 1);
                    document.getElementById(mainInputFieldIdGlobal + '_id').value = valueStrBlank.substr(0, valueStr.indexOf('~'));
                } else {
                    document.getElementById(mainInputFieldIdGlobal).value = document.getElementById('googleSuggForSearchValueSelect').value;
                }
            }
        }
        //
        if (typeof (document.getElementById(googleSuggDiv)) != 'undefined') {
            document.getElementById(googleSuggDiv).innerHTML = xmlhttp.responseText;
        }
        googleSuggDiv = '';
    } else {
        //document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
    //
}
function googleSuggestionDropdownBlank(divName) {
    googleSuggDiv = divName;
    var documentRootPath = document.getElementById('documentRootPath').value;
    //document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    var poststr = "";
    google_suggestion_dropdown_blank(documentRootPath + '/include/php/ombbblnk' + default_theme + '.php', poststr);
    return false;
}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR GOOGLE SUGGESTION FUNCTIONALITY @PRIYANKA-03MAY18
function validateInput(input) {
    const regex = /[^\w\s\u0900-\u097F\u0980-\u09FF\u0A00-\u0A7F\u0A80-\u0AFF\u0B00-\u0B7F\u0B80-\u0BFF\u0C00-\u0C7F\u0C80-\u0CFF\u0D00-\u0D7F\u0D80-\u0DFF\u0E00-\u0E7F\u0E80-\u0EFF\u0F00-\u0FFF]/g;
    input.value = input.value.replace(regex, '');
}
// *************************************************************************************************************************************
//
function showXRFEntrieDiv(custId, xrf_pre_invoice_no, xrf_invoice_no) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("xrfEntriesDiv").style.visibility = "visible";
            document.getElementById("xrfEntriesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogXRFEntries" + default_theme + ".php?custId=" + custId + "&xrf_pre_invoice_no=" + xrf_pre_invoice_no + "&xrf_invoice_no=" + xrf_invoice_no, true);
    xmlhttp.send();
}
//
function hideXRFEntrieDiv(custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("xrfEntriesDiv").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogxrfdv" + default_theme + ".php?custId=" + custId, true);
    xmlhttp.send();
}
//
function deleteXRFFileEntry(recStartPos, recEndPos, custId, xrf_pre_invoice_no, xrf_invoice_no) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("xrfEntriesDiv").style.visibility = "visible";
            document.getElementById("xrfEntriesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogXRFDelEntries" + default_theme + ".php?recStartPos=" + recStartPos + "&recEndPos=" + recEndPos + "&custId=" + custId + "&xrf_pre_invoice_no=" + xrf_pre_invoice_no + "&xrf_invoice_no=" + xrf_invoice_no, true);
    xmlhttp.send();
}
//************************************************************************************************************************************************************
//******************* START CODE FOR NAVIGATION ON PANEL *****************************************************************************************************
//************************************************************************************************************************************************************
//function for pop up icon @Abhishek
function togglePaymentPopup(icon) {
    const popup = icon.nextElementSibling;
    if (popup) {
        popup.style.display = (popup.style.display === "block") ? "none" : "block";
    }
}
// CHANGES DONE IN FUNCTION FOR ADDING SOME PARAMETERS LIKE TRANSACTION TYPE, INDICATOR, STOCK TYPE, OPERATION @PRIYANKA-12MAY18
function navigatationPanelByFileName(divName, fileName, panelName, indicator, transactionType, stockType, operation, type, custId, metType, mainPanel, payCRDR, firmId, preInvNo, postInvNo, girviId) {
    //alert(panelName)
    var panel = panelName;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (type == 'XRF_PRINT_AUTO_PAY') {
                var result = printXRFDirectDiv('xrfPrintDiv');
                if (result == 'Y') {
                    alert('After Print. Please Click Here to proceed!');
                    document.getElementById(divName).innerHTML = xmlhttp.responseText;
                    calcPaymentCashBalance('');
                    calLoyaltyPoints('');
                    document.getElementById('paymentDiv').style.display = 'none';
                    document.getElementById('add_payment').submit();
                }
            } else if (type == 'XRF_PRINT_SHOW_PAY') {
                printXRFDirectDiv('xrfPrintDiv');
                alert('After Print. Please Click Here to proceed!');
                document.getElementById(divName).innerHTML = xmlhttp.responseText;
            } else if (type == 'XRF_NO_PRINT_AUTO_PAY') {
                document.getElementById(divName).innerHTML = xmlhttp.responseText;
                document.getElementById(divName).innerHTML = xmlhttp.responseText;
                calcPaymentCashBalance('');
                calLoyaltyPoints('');
                document.getElementById('paymentDiv').style.display = 'none';
                document.getElementById('add_payment').submit();
            } else if (panelName == 'bestSellerList') {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("customerListDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'exportCustData') {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("customerListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById(divName).innerHTML = xmlhttp.responseText;
            }
            // START ADD THIS CODE FOR RETAIL SOFTWARE ON FOUCS DAY INPUT @YUVRAJ 11-11-2022
            if (panelName == 'RETAIL_IMITATION_B2' && fileName == 'ogiamndv') {
                document.getElementById('addItemDOBDay').focus();
            }
            // END ADD THIS CODE FOR RETAIL SOFTWARE ON FOUCS DAY INPUT @YUVRAJ 11-11-2022
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/" + fileName + default_theme + ".php?panelName=" + panelName + "&indicator=" + indicator
            + "&stockType=" + stockType + "&transactionType=" + transactionType + "&operation=" + operation
            + "&type=" + type + "&custId=" + custId + "&metType=" + metType + "&formName=" + panel
            + "&mainPanel=" + mainPanel + "&transCRDR=" + payCRDR + "&firmId=" + firmId
            + "&divName=" + divName + "&mainUserPanel=" + mainPanel + "&preInvNo=" + preInvNo + "&postInvNo=" + postInvNo + "&girviId=" + girviId, true);
    xmlhttp.send();
    //
    return false;
}
// CHANGES DONE IN FUNCTION FOR ADDING SOME PARAMETERS LIKE TRANSACTION TYPE, INDICATOR, STOCK TYPE, OPERATION @PRIYANKA-12MAY18
//***************************************************************************************************************************************************************
//******************* END CODE FOR NAVIGATION ON STOCK FORM FUNCTION ********************************************************************************************
//***************************************************************************************************************************************************************

//*******************************************************************************************************************************************
//******************* START CODE FOR ON CHANGE FUNCTION *************************************************************************************
//*******************************************************************************************************************************************
function onChangeFunction(ownerIdColumn, searchValue, passElement, tableName, columnName, columnNameAlias, searchColumnName, mainPanelName) {
    //
    var documentRootPath = document.getElementById('documentRootPath').value;
    setTimeout(function () {
        //
        if ((typeof (document.getElementById(searchValue)) != 'undefined') && (document.getElementById(searchValue) != null))
            searchValuePara = document.getElementById(searchValue).value;
        loadXMLDoc2();
        xmlhttp2.onreadystatechange = function () {
            if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (typeof (document.getElementById(passElement)) != 'undefined' && (document.getElementById(passElement) != null)) {
                    if (searchColumnName == 'sttr_item_pre_id') {
                        var sttr_merge_count = searchValue.match(/\d+/)[0];
                        if ((typeof (document.getElementById('sttr_temp_item_pre_id')) != 'undefined' &&
                                (document.getElementById('sttr_temp_item_pre_id') != null) &&
                                typeof (document.getElementById('sttr_temp_item_post_id')) != 'undefined' &&
                                (document.getElementById('sttr_temp_item_post_id') != null) &&
                                typeof (document.getElementById('sttr_temp_merge_count')) != 'undefined' &&
                                (document.getElementById('sttr_temp_merge_count') != null)) &&
                                (searchValuePara == document.getElementById('sttr_temp_item_pre_id').value) &&
                                (sttr_merge_count != document.getElementById('sttr_temp_merge_count').value) &&
                                (searchValuePara != '') && (document.getElementById('sttr_temp_item_pre_id').value != '')) {
                            document.getElementById(passElement).value = (parseInt(document.getElementById('sttr_temp_item_post_id').value) + 1);
                        } else {
                            document.getElementById(passElement).value = xmlhttp2.responseText;
                        }
                    } else {
                        document.getElementById(passElement).value = xmlhttp2.responseText;
                    }
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp2.open("POST", documentRootPath + "/include/php/omOnChangeFunction" + default_theme + ".php?ownerIdColumn=" + ownerIdColumn +
                "&searchValue=" + encodeURIComponent(searchValuePara) +
                "&passElement=" + encodeURIComponent(passElement) + "&tableName=" + tableName +
                "&columnName=" + encodeURIComponent(columnName) +
                "&columnNameAlias=" + columnNameAlias + "&searchColumnName=" + searchColumnName + "&mainPanelName=" + mainPanelName, true);
        xmlhttp2.send();
    }, 100);
    return false;
}
//
//********************************************************************************************
// Start code to add for search by category @Author:PRIYANKA-10JULY18
//********************************************************************************************
function searchItemCat(itemCat, metalType, divNum, keyCodeInput) {
    keyCodeForItemCat = keyCodeInput;
    divNumForItemCat = divNum;
    panelNameForItemCat = divNum;
    //
    var poststr = "itemCat=" + encodeURIComponent(itemCat)
            + "&metalType=" + encodeURIComponent(metalType)
            + "&divNum=" + encodeURIComponent(divNum);
    search_item_cat("include/php/omciladgv" + default_theme + ".php", poststr);
}
//
var keyCodeForItemCat;
var divNumForItemCat;
var panelNameForItemCat;
function search_item_cat(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchItemCat;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//
function alertSearchItemCat() {
    if (panelNameForItemCat == 'jewelleryPanel') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemListCatDivToAddStock").innerHTML = xmlhttp.responseText;
            if (keyCodeForItemCat == 40 || keyCodeForItemCat == 38) {
                document.getElementById('itemListCatJewelleryPanelToAddItemSelect').focus();
                document.getElementById('itemListCatJewelleryPanelToAddItemSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
}
//
function searchItemCatForPanelBlank(divNum) {
    if (divNum == 'stockItemCat') {
        document.getElementById("itemListCatDivToAddStock").innerHTML = '';
    }
}
//********************************************************************************************
// End code to add for search by category @Author:PRIYANKA-10JULY18
//********************************************************************************************
function getAccountPopup(panel, div, prodCount, firmId) {
    //alert('firmId @@ == ' + firmId);    
    div = div.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_account_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_account_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omacacdv" + default_theme + ".php?panel=" + panel + "&firmId=" + firmId + "&div=" + div + "&prodCount=" + prodCount, true); //change in filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
    $("#display_account_popup").show();
}

function getAccountPopupHide() {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("changeTransactionPanel").innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("display_account_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
//        }
//    };
//    xmlhttp.open("POST", "include/php/omDailyTransPayment" + default_theme +".php?prodCount=" + prodCount, true);
//    xmlhttp.send();
    $("#display_account_popup").hide();
}
function getSchemePopupHide() {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("schemeModel").style.visibility = "hidden";
//        } else {
//            document.getElementById("display_account_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
//        }
//    };
//    xmlhttp.open("POST", "include/php/omktpydtl" + default_theme +".php", true);
//    xmlhttp.send();
    $("#schemeModel").hide();
}

//function getTransAccIdDetails(acc) {
//    $("#display_account_popup").hide();
//   header("Location: $documentRoot/include/php/omDailyTransPayment" + default_theme +".php?divMainMiddlePanel=DailyTransactions"); }

function transactionList() {
    loadXMLDoc();
    //$("#DOBDay").focus();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("changeTransactionPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    document.getElementById("transactionPanel_div").style.display = "block";
    document.getElementById("paymentTransaction_div").style.display = "none";
    xmlhttp.open("GET", "include/php/omGstTransList" + default_theme + ".php", true);
    xmlhttp.send();
}


function transactionInvList() {
    loadXMLDoc();
    //$("#DOBDay").focus();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("changeTransactionPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    document.getElementById("transactionPanel_div").style.display = "block";
    document.getElementById("paymentTransaction_div").style.display = "none";
    xmlhttp.open("GET", "include/php/omGstTransInvList" + default_theme + ".php", true);
    xmlhttp.send();
}

function deleteItemGstTrans(panelName, firmId, transId, preVch, postVch, todayDay) {
//    alert(preVch);
//    alert(postVch);
    confirm_box = confirm("\n\nDo you really want to delete this Item?");
    //alert("hi");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("changeTransactionPanel").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?panelName=" + panelName + "&firmId=" + firmId + "&transId=" + transId, "&preVch=" + preVch, "&postVch=" + postVch, "&todayDay=" + todayDay, true);
        xmlhttp.send();
    }
}
//
//function updateItemGstTrans(panelName, firmId, transId){
////    alert(panelName);
////    alert(firmId);
////    alert(transId);
//    loadXMLDoc();
//        xmlhttp.onreadystatechange = function () {
//            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//                document.getElementById("addstockform").innerHTML = xmlhttp.responseText;
//            } else {
//                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//            }
//        };
//        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme +".php?panelName=" + panelName + "&firmId=" + firmId + "&transId=" + transId, true);
//        xmlhttp.send();
//}
//
function updateItemGstTrans(panelName, firmId, transId, preVch, postVch, accId, prodCount) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("updateGstTrans").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("addUpdateTransactionDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omDailyTransPaymentUpdate" + default_theme + ".php?panelName=" + panelName + "&accId=" + accId + "&firmId=" + firmId + "&transId=" + transId, "&preVch=" + preVch, "&postVch=" + postVch, "&prodCount=" + prodCount, true);
    xmlhttp.send();
}
//
//
function xrfCorrectOtherElement(fieldValue) {
    if (fieldValue == '' || fieldValue == '.' || fieldValue == '-')
        fieldValue = 0;
    var diffElementValue = (parseFloat(document.getElementById('inputOtherHidden').value)).toFixed(3) - (parseFloat(fieldValue)).toFixed(3);
    var newValue = (parseFloat(document.getElementById('xrf_Others').value) + parseFloat(diffElementValue)).toFixed(3);
    if (newValue == '-0.000')
        newValue = '0.000';
    document.getElementById('xrf_Others').value = newValue;
    document.getElementById('xrf_Others').setAttribute("value", newValue);
    document.getElementById('inputOtherHidden').value = fieldValue;
}

function deleteTransactionId(panelName, utinId) {
    confirm_box = confirm("\n\nDo you really want to delete this Item?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("changeTransactionPanelInv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?panelName=" + panelName + "&utinId=" + utinId, true);
        xmlhttp.send();
    }
}
//************** Start Code to Get Assigned Metal for Melting Info Pop UP AUTHOR : DIKSHA 01DEC2018****************
function getMeltingInfoPopUp(sttrId, panel, listPanel, selFirmId, firmId, other, other1) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
            openmetalPopUp();
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ogmetalggipop" + default_theme + ".php?sttrId=" + sttrId + "&listPanel=" + listPanel + "&selFirmId=" + selFirmId + "&firmId=" + firmId, true); //change in filename @AUTHOR: DIKSHA 30NOV2018
    xmlhttp.send();
}
//************** End Code to Get Assigned Metal for Melting Info Pop UP AUTHOR : DIKSHA 01DEC2018******************
///*****************************************************************************************************************/
//************** START CODE FOR DELETE RAW METAL ENTRIES @SIMRAN:07FEB2023****************************************/
/*****************************************************************************************************************/
function delMeltingRawStock(panelName, sttrId) {
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var stockDeleteConfirm = '';
        var stockDelete = document.getElementById("stockDelete").value;
        if (stockDelete == 'Y') {
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

                if (panelName == 'meltingStockList') {
                    document.getElementById("rawMetalStockList").innerHTML = xmlhttp.responseText;
                }

            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?sttrId=" + sttrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&stockDeleteConfirm=" + stockDeleteConfirm, true);
        xmlhttp.send();
    }
    //
}
/*****************************************************************************************************************/
//************** END CODE FOR DELETE RAW METAL ENTRIES @SIMRAN:07FEB2023****************************************/
/*****************************************************************************************************************/
//************** Start Code to Get Assigned Metal for Melting Info Pop UP AUTHOR : DIKSHA 01DEC2018****************
function getMeltedInfoPopUp(sttrId, panel, listMetalPanel, selFirmId) {
//    alert(selFirmId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
            openmetalPopUp();
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ogmetalggipop" + default_theme + ".php?sttrId=" + sttrId + "&listMetalPanel=" + listMetalPanel + "&selFirmId=" + selFirmId, true); //change in filename @AUTHOR: DIKSHA 30NOV2018
    xmlhttp.send();
}
//************** End Code to Get Assigned Metal for Melting Info Pop UP AUTHOR : DIKSHA 01DEC2018******************

//**************************** Get Girvi Info Pop UP *****************************************
function deleteLoyaltyPoint(panelName, utinId, custId) {
    confirm_box = confirm("\n\nDo you really want to delete this Item?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("loyaltyCard").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?panelName=" + panelName + "&utinId=" + utinId + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
//
function deleteUserGrp(panelName, kittyId) {
    confirm_box = confirm("\n\nDo you really want to delete this User Group?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("userGrp").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?panelName=" + panelName + "&kittyId=" + kittyId, true);
        xmlhttp.send();
    }
}
//
function updateUserGrp(panelName, kittyId) {
    //console.log(panelName + kittyId );
    confirm_box = confirm("\nDo you really want to update this user group?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("userGrp").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omktusergrp" + default_theme + ".php?panelName=" + panelName + "&kittyId=" + kittyId, true);
        xmlhttp.send();
    }
}
//
function deleteAllLoyaltyPoint(panelName, utinId, custId) {
    confirm_box = confirm("\n\nDo you really want to delete this Item?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("loyaltyCard").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?panelName=" + panelName + "&utinId=" + utinId + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
//
function searchDailyDiaryDetailsCust(ddDetVal, firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, ddPanelToShow, ddMainPanel, custId) {
    if (valDailyDiaryInputs()) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (ddMainPanel == 'custAccLedgerDayBook' || ddMainPanel == 'custAccLedger') {
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
        xmlhttp.open("POST", "include/php/omddddandv" + default_theme + ".php?ddDetVal=" + ddDetVal + "&firmId=" + firmId + "&dailyDiaryFromDate=" + dailyDiaryFromDate + "&dailyDiaryToDate=" + dailyDiaryToDate + "&ddPanelToShow=" + ddPanelToShow + "&ddMainPanel=" + ddMainPanel + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
//**********************************START CODE TO SEARCH DETAILS ACCORDING TO NEPALI DATE @RENUKA SHARMA  NOV2022***************************************//
function searchDailyDiaryDetailsCustNepali(ddDetVal, firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, ddPanelToShow, ddMainPanel, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (ddMainPanel == 'custAccLedgerDayBook' || ddMainPanel == 'custAccLedger') {
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
    xmlhttp.open("POST", "include/php/omddddandv" + default_theme + ".php?ddDetVal=" + ddDetVal + "&firmId=" + firmId + "&dailyDiaryFromDate=" + dailyDiaryFromDate + "&dailyDiaryToDate=" + dailyDiaryToDate + "&ddPanelToShow=" + ddPanelToShow + "&ddMainPanel=" + ddMainPanel + "&custId=" + custId, true);
    xmlhttp.send();
}
//**************************************START CODE TO SEARCH DETAILS ACCORDING TO NEPALI DATE @RENUKA SHARMA  NOV2022*****************************************//
function deleteShares(panelName, utinId, custId) {
    confirm_box = confirm("\n\nDo you really want to delete this Item?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addShares").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?panelName=" + panelName + "&utinId=" + utinId + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
//
function deleteAllShares(panelName, utinId, custId) {
    confirm_box = confirm("\n\nDo you really want to delete this Item?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addShares").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?panelName=" + panelName + "&utinId=" + utinId + "&custId=" + custId, true);
        xmlhttp.send();
    }
}
//
function deleteDepWithdrawId(panelName, utinId) {
    confirm_box = confirm("\n\nDo you really want to delete this Item?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("depWithdrawDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?panelName=" + panelName + "&utinId=" + utinId, true);
        xmlhttp.send();
    }
}
//
function deleteBoxMovement(panelName, stlcId) {
//    alert(panelName);
//    alert(stlcId);
    confirm_box = confirm("\n\nDo you really want to delete this entry?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("boxMove").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?panelName=" + panelName + "&stlcId=" + stlcId, true);
        xmlhttp.send();
    }
}
//
function boxMovementDetails() {
    //alert("hi");
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("boxMove").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omboxinoutboxdetails" + default_theme + ".php", true);
    xmlhttp.send();
}
//
function boxMovementDivPopUp(srNo) {
    //alert(srNo);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omboxinoutpopup" + default_theme + ".php?srNo=" + srNo, true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
    $("#display_account_popup").show();

}
//
function leadPanelPopup(contactName, contactId, leadPopUp, leadPop, lead, contactLead, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omleadspopup" + default_theme + ".php?contactName=" + contactName + "&contactId=" + contactId + "&contactLead=" + contactLead + "&panelName=" + panelName + "&leadPopUp=" + leadPopUp, true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
    $("#display_account_popup").show();
}
//
////////////////////////////////////////////////////////////////////////////
//START CODE TO DISPLAY VISITOR REUIEREMENT DETAILS @RENUKA SHARMA 02 FEB 2023
////////////////////////////////////////////////////////////////////////////
function visitorRequirementPopup(contactId, panel) {
//     alert(panel);
    //document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    loadXMLDoc();
    if (validateLeads()) {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            }
        };

        xmlhttp.open("GET", "omLeadsAd" + default_theme + ".php?visitorID=" + encodeURIComponent(contactId) + "&mypanel=" + encodeURIComponent(panel), true);
        xmlhttp.send();
    } else {
        return false;
    }
}
////////////////////////////////////////////////////////////////////////////
//END CODE TO DISPLAY VISITOR REUIEREMENT DETAILS @RENUKA SHARMA JAN 2023
////////////////////////////////////////////////////////////////////////////
//
//function customerFeedbackPopup() {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {        
//            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                document.getElementById('myModal').style.display = "block";
//                document.getElementById('myModal').innerHTML = xmlhttp.responseText;
//            } else {
//              //  document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//            }
//       
//    };
//    xmlhttp.open("POST", "include/php/omcustFeedback" + default_theme + ".php", true); //change in filename @AUTHOR: SANDY22NOV13
//    xmlhttp.send();
//      $("#display_account_popup").show();
//}
//function closecustomerFeedbackPopup() {
//    document.getElementById('myModal').style.display = "none";
//}
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//START CODE ADDED FOR SMS  TEMPLATE POPUP AUTHOR@SARVESH 22JUN2022 
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function smsUpdatePopup(templateId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omSmsTemplateUpdatePopup" + default_theme + ".php?templateId=" + templateId, true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
    $("#display_account_popup").show();
}
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//END CODE ADDED FOR SMS  TEMPLATE POPUP AUTHOR@SARVESH 22JUN2022 
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function leaddiffLists(para) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("leadMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (para == 'allLead')
        xmlhttp.open("GET", "include/php/omleads" + default_theme + ".php?para=" + para, true);
    if (para == 'thirtyDays')
        xmlhttp.open("GET", "include/php/omleads" + default_theme + ".php?para=" + para, true);
    else if (para == 'todays')
        xmlhttp.open("GET", "include/php/omleads" + default_theme + ".php?para=" + para, true);
    else if (para == 'fake')
        xmlhttp.open("GET", "include/php/omleads" + default_theme + ".php?para=" + para, true);
    else if (para == 'nint')
        xmlhttp.open("GET", "include/php/omleads" + default_theme + ".php?para=" + para, true);
    else if (para == 'delete')
        xmlhttp.open("GET", "include/php/omleads" + default_theme + ".php?para=" + para, true);
    else if (para == 'customerList')
        xmlhttp.open("GET", "include/php/omleads" + default_theme + ".php?para=" + para, true);
    else if (para == 'approvedList')
        xmlhttp.open("GET", "include/php/omleads" + default_theme + ".php?para=" + para, true);
    else if (para == 'everyLead')
        xmlhttp.open("GET", "include/php/omleads" + default_theme + ".php?para=" + para, true);
    else if (para == 'complaints')
        xmlhttp.open("GET", "include/php/omleads" + default_theme + ".php?para=" + para, true);
    else if (para == 'allCommentList')
        xmlhttp.open("GET", "include/php/omleads" + default_theme + ".php?para=" + para, true);
    else
        xmlhttp.open("GET", "include/php/omleads" + default_theme + ".php?para=" + para, true);
    xmlhttp.send();
}
//
function deleteReport(panelName, contactId) {
    if (panelName == 'smsReset') {
        confirm_box = confirm("\n\nDo you really want to Reset SMS status?");
    } else {
        confirm_box = confirm("\n\nDo you really want to delete this Item?");
    }
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'suppTicketDelete') {
                    document.getElementById("suppTicketListDiv").innerHTML = xmlhttp.responseText;
                } else if (panelName == 'smsReset') {
                    document.getElementById("smsResetDiv").innerHTML = xmlhttp.responseText;
                    document.getElementById("smsMessDisplayDiv").innerHTML = 'SMS STATUS RESET SUCCESSFULLY !';
                    window.setTimeout(closeMessDetails, 1500);
                } else {
                    document.getElementById("leadDivPanel").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogwaldel" + default_theme + ".php?panelName=" + panelName + "&contactId=" + contactId, true);
        xmlhttp.send();
    }
    if (panelName == 'smsReset') {
        function closeMessDetails()
        {
            document.getElementById("smsMessDisplayDiv").innerHTML = "";
        }
    }
}
//
function closeLeadPopUp(panelName, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            parent.document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelName == 'custSupportTicketPanel') {
                parent.document.getElementById("suppTicketListDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'custHome') {
                parent.document.getElementById("supportTicketListDiv").innerHTML = xmlhttp.responseText;
            } else {
                parent.document.getElementById("leadDivPanel").innerHTML = xmlhttp.responseText;
            }
        } else {
            parent.document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'custSupportTicketPanel') {
        xmlhttp.open("GET", "omAllSupportList" + default_theme + ".php", true);
    } else if (panelName == 'custHome') {
        xmlhttp.open("GET", "omcsuppticket" + default_theme + ".php?custId=" + custId, true);
    } else {
        xmlhttp.open("GET", "omleads" + default_theme + ".php", true);
    }
    xmlhttp.send();
}
//
function masterSettings() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            parent.document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            parent.document.getElementById("addStockMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            parent.document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omStockMasterSetup" + default_theme + ".php", true);
    xmlhttp.send();
}

function getGirviInfoPopUpInt(custId, girviId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/olggipopint" + default_theme + ".php?custId=" + custId + "&girviId=" + girviId, true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
}

function showGirviReceiptByGirviIdInt(girviId) {
    poststr = "girviId=" + encodeURIComponent(girviId);
    search_girvi_by_girviIdInt('include/php/olgsgiwdint' + default_theme + '.php?getGirviReceipt=YES', poststr); //change in filename @AUTHOR: SANDY20NOV13
}

function search_girvi_by_girviIdInt(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchGirviByGirviIdInt;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchGirviByGirviIdInt() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        //refreshMainRightDiv();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}

function getGirviInfoPopUpHideInCustHomeInt(girviId) {
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

function getGirviInfoPopUpHideInt(girviId) {
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
//
//
function getStockMasterUserDetails(documentRootPath, userId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("itemMasterUserInfoDiv").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/stock/omMasterItemUserInfo" + default_theme + ".php?userId=" + userId, true);
    xmlhttp.send();
}

function setStockMasterUserDetails(itemCategory, itemName, userId) {
    //
    //alert('itemCategory == ' + itemCategory);
    //alert('itemName == ' + itemName);
    //alert('userId == ' + userId);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("SetPurityMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omSetStockMasterUserDetails" + default_theme + ".php?itemCategory=" + itemCategory +
            "&itemName=" + itemName + "&userId=" + userId, true);
    xmlhttp.send();
}


var keyCode;
var panelNameToAddItemCat;
function searchCategoryForPanel(itemCat, keyCodeInput, panelName) {
    //alert('itemCat == ' + itemCat);
    //alert('panelName == ' + panelName);
    keyCode = keyCodeInput;
    panelNameToAddItemCat = panelName;
    var poststr = "itemCat=" + encodeURIComponent(itemCat) +
            "&panelName=" + encodeURIComponent(panelName);
    search_category_for_panel('include/php/omcatsearch' + default_theme + '.php', poststr);
}

function search_category_for_panel(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCategoryForPanel;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchCategoryForPanel() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        // alert(keyCode);
        document.getElementById("cryNameInvSelectDiv").innerHTML = xmlhttp.responseText;
        if (keyCode == 40 || keyCode == 87) {
            document.getElementById('ItemcatForAddSelect').focus();
            document.getElementById('ItemcatForAddSelect').options[0].selected = true;
        }
    }
}

var keyCodeInput1;
var panelNameToAddItem1;
function searchItemForPanel(itemName, keyCodeInput, panelName) {
    //alert('itemName == ' + itemName);
    //alert('panelName == ' + panelName);
    keyCodeInput1 = keyCodeInput;
    panelNameToAddItem1 = panelName;
    var poststr1 = "itemName=" + encodeURIComponent(itemName) +
            "&panelName=" + encodeURIComponent(panelName);
    //alert('poststr1 == ' + poststr1);     
    search_item_for_panel('include/php/omitemsearch' + default_theme + '.php', poststr1);
    //alert('keyCodeInput1 == ' + keyCodeInput);  
}

function search_item_for_panel(url, parameters) {
    //alert('url == ' + url);
    //alert('parameters == ' + parameters);
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = alertSearchItemForPanel;
    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);
}

function alertSearchItemForPanel() {
    //alert('readyState #==# ' + xmlhttp2.readyState);
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        //alert('keyCodeInput1 @==@ ' + keyCodeInput1);
        //alert('responseText == ' + xmlhttp2.responseText);
        document.getElementById("itemListDivToAddStock").innerHTML = xmlhttp2.responseText;
        if (keyCodeInput1 == 40 || keyCodeInput1 == 38) {
            //alert('keyCodeInput1 == ' + keyCodeInput1);
            document.getElementById('ItemForAddSelect').focus();
            document.getElementById('ItemForAddSelect').options[0].selected = true;
        }
    }
}

var cityNameForPanelBlank;
function searchCatForPanelBlank(divName) {
    cityNameForPanelBlank = divName;
    var poststr = "";
    search_cat_for_panel_blank('include/php/ombbblnk' + default_theme + '.php', poststr);
}

function search_cat_for_panel_blank(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSearchCatForPanelBlank;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertSearchCatForPanelBlank() {
    if (cityNameForPanelBlank == 'cryNameInvSelectDiv') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("cryNameInvSelectDiv").innerHTML = xmlhttp.responseText;
        } else {
        }
    } else if (cityNameForPanelBlank == 'blank') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("cryNameInvSelectDiv").innerHTML = xmlhttp.responseText;
        } else {
        }
    }
}
var cityNameForPanelBlank1;
//
function searchItemForPanelBlank1(divName) {
    cityNameForPanelBlank1 = divName;
    var poststr = "";
    search_item_for_panel_blank1('include/php/ombbblnk' + default_theme + '.php', poststr);
}
function search_item_for_panel_blank1(url, parameters) {
    loadXMLDoc3();
    xmlhttp3.onreadystatechange = alertSearchItemForPanelBlank1;
    xmlhttp3.open('POST', url, true);
    xmlhttp3.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp3.setRequestHeader("Content-length", parameters.length);
    xmlhttp3.setRequestHeader("Connection", "close");
    xmlhttp3.send(parameters);
}
function alertSearchItemForPanelBlank1() {
    if (cityNameForPanelBlank1 == 'itemListDivToAddStock') {
        if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200) {
            document.getElementById("itemListDivToAddStock").innerHTML = xmlhttp3.responseText;
        } else {
        }
    } else if (cityNameForPanelBlank1 == 'blank') {
        if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200) {
            document.getElementById("itemListDivToAddStock").innerHTML = xmlhttp3.responseText;
        } else {
        }
    }
}
function searchLoanDetailsCust(firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, ddMainPanel, custId) {
    if (valLoanInputs()) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (ddMainPanel == 'custledgerreport') {
                    document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("customerledger").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        var loanFromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var loanToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        xmlhttp.open("POST", "include/php/omcustledgerreport" + default_theme + ".php?firmId=" + firmId + "&loanFromDate=" + loanFromDate + "&loanToDate=" + loanToDate + "&ddMainPanel=" + ddMainPanel + "&custId=" + custId, true);
        xmlhttp.send();
    }
}

function searchAllLoanDetailsCust(firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, ddMainPanel, custId) {
    if (valLoanInputs()) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (ddMainPanel == 'custledgertotreport') {
                    document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("allloanreport").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        var loanFromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var loanToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        xmlhttp.open("POST", "include/php/omcustledgerreport1" + default_theme + ".php?firmId=" + firmId + "&loanFromDate=" + loanFromDate + "&loanToDate=" + loanToDate + "&ddMainPanel=" + ddMainPanel + "&custId=" + custId, true);
        xmlhttp.send();
    }


}

function navigationGirviInt(pageNo, custId) {
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
    xmlhttp.open("POST", "include/php/olggcgdtint" + default_theme + ".php?page=" + pageNo + "&custId=" + custId, true); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}

function navigationGirviInt(pageNo, custId) {
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
    xmlhttp.open("POST", "include/php/olggcgdtint" + default_theme + ".php?page=" + pageNo + "&custId=" + custId, true); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    xmlhttp.send();
}
//
function setROIValueByROIAmt(selROIAmt, principalAmount) {
    //
    var roi = (selROIAmt * 100) / principalAmount;
    //
    document.getElementById('selROIValue').value = roi;
}
//
function karigarLists(user, para) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("suppListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogwwspld" + default_theme + ".php?user=" + user + "&para=" + para, true);
    xmlhttp.send();
}
//
function onlineValidation()
{
    if (document.add_ECommOnlineOption.onlineQtyOption.value == " ") {
        alert("please enter quantity");
        return false;
    } else if (document.add_ECommOnlineOption.onlineDescOption.value == " ") {
        alert("please enter description of product");
        return false;
    }
    return true;
}
// START CODE TO ADD FUNCTION FOR SHOWING CUSTOMER SELL PURCHASE PANEL AT ONLINE CUSTOMER ORDER LIST @AUTHOR:MADHUREE-26DEC2019
function navigationOnlineOrder(custId, firmId, panelName, indicator, transactionType, stockType, operation, type, metType, mainPanel, payCRDR, preInvNo, postInvNo) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    //alert(documentRootPath);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd" + default_theme + ".php?panelName=" + panelName + "&indicator=" + indicator
            + "&stockType=" + stockType + "&transactionType=" + transactionType + "&operation=" + operation
            + "&type=" + type + "&custId=" + custId + "&metType=" + metType
            + "&mainPanel=" + mainPanel + "&transCRDR=" + payCRDR + "&firmId=" + firmId
            + "&divName=" + 'cust_middle_body' + "&mainUserPanel=" + mainPanel + "&preInvNo=" + preInvNo + "&postInvNo=" + postInvNo + "&custPanelOption=SellPurchase" + "&mainPanel=ItemPurchase", true);
    xmlhttp.send();
    return false
}
// END CODE TO ADD FUNCTION FOR SHOWING CUSTOMER SELL PURCHASE PANEL AT ONLINE CUSTOMER ORDER LIST @AUTHOR:MADHUREE-26DEC2019
// START CODE TO ADD FUNCTION FOR SHOWING POPUP AT ECOM ADMIN PANEL FOR CHANGING THE DELIVERY STATUS @AUTHOR:MADHUREE-14JAN2020



function whatsappPopup(custMobile) {
    window.open('https://wa.me/91' + custMobile, '_blank');
}
function getEcomDeliveryStatusPopup(sttrId, sttrUserId, delStatus) {
//    alert(sttrId);
//    alert(sttrUserId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omdelstatuspopup" + default_theme + ".php?sttrId=" + sttrId + "&sttrUserId=" + sttrUserId + "&delStatus=" + delStatus, true);
    xmlhttp.send();
}
function getEcomDeliveryStatusPopupHide(delStatus) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    if (delStatus == 'DELIVERY_PENDING') {
        xmlhttp.open("POST", "include/php/omecom/omonlinependingorder" + default_theme + ".php", true);
    } else if (delStatus == 'DELIVERY_IN_PROGRESS') {
        xmlhttp.open("POST", "include/php/omecom/omonlinedelorder" + default_theme + ".php", true);
    }
    xmlhttp.send();
}

// END CODE TO ADD FUNCTION FOR SHOWING POPUP AT ECOM ADMIN PANEL FOR CHANGING THE DELIVERY STATUS @AUTHOR:MADHUREE-14JAN2020
// START CODE TO CHANGE DELIVERY STATUS AT ECOM ADMIN PANEL @AUTHOR:MADHUREE-16JAN2020
function changeEcomDeliveryStatus(delStatus, sttrId, sttrStatus) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    if (sttrStatus === "PaymentPending") {
        alert("Payment Process is Pending ! First Complete the payment process ! ");
        document.getElementById('sttr_delivery_status').value = 'DELIVERY_PENDING';
        return false;
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemDelStatuschangediv").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omdelstatuschange" + default_theme + ".php?selStatus=" + delStatus.value + "&sttrId=" + sttrId, true);
    xmlhttp.send();
}
// END CODE TO CHANGE DELIVERY STATUS AT ECOM ADMIN PANEL @AUTHOR:MADHUREE-16JAN2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO MODIFY FUNCTION WIITH MARGING BOTH FUNCTIONS IN ONE FOR FORM CUSTOMIZATION ALL ISSUES @MADHUREE-24MARCH2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO FORM CUSTOMIZATION @AUTHOR:SWAPNIL-06MAR2020
function formSettingforRow(check, checkId, searchForm, omincontents) {
    var checkIdLen = checkId.length;
    var checkIdTemp = checkId;
    var tempLen = checkIdLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;
    var rowFieldCount1 = document.getElementById('rowFieldCount1').value;
    var rowFieldCount2 = document.getElementById('rowFieldCount2').value;
    var rowFieldCount3 = document.getElementById('rowFieldCount3').value;
    var rowFieldCount4 = document.getElementById('rowFieldCount4').value;

    while (tempLen > 0) {

        var field = checkIdTemp.substr(0, 1);
        checkIdTemp = checkIdTemp.substr(1);
        if (field.match(alphaExp)) {
            charLen = charLen + 1;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }
    var checkIdWithoutCount = checkId.substr(0, charLen);
    var checkIdCount = checkId.substr(charLen);
    //
    var lastIndexOfHash = checkIdCount.lastIndexOf("#");

    if (lastIndexOfHash > 0) {
        checkIdWithoutCount = checkId.substr(0, lastIndexOfHash + 2);
        checkIdCount = checkId.substr(lastIndexOfHash + 2);
    }
    checkIdWithoutCount = encodeURIComponent(checkIdWithoutCount);
    checkIdCount = encodeURIComponent(checkIdCount);
    var checkId1 = checkIdWithoutCount + '1';
    var checkId2 = checkIdWithoutCount + '2';
    var checkId3 = checkIdWithoutCount + '3';
    var checkId4 = checkIdWithoutCount + '4';
    if (checkIdCount == 1 && check == true) {
        if (rowFieldCount1 > 13) {
            alert('We Can Select Only 14 Item In One Row');
            return false;
        }
        document.getElementById(checkId2).disabled = true;
        document.getElementById(checkId3).disabled = true;
        document.getElementById(checkId4).disabled = true;
    } else if (checkIdCount == 1 && check == false) {
        document.getElementById(checkId2).disabled = false;
        document.getElementById(checkId3).disabled = false;
        document.getElementById(checkId4).disabled = false;
    }
    if (checkIdCount == 2 && check == true) {
        if (rowFieldCount2 > 13) {
            alert('We Can Select Only 14 Item In One Row');
            return false;
        }
        document.getElementById(checkId1).disabled = true;
        document.getElementById(checkId3).disabled = true;
        document.getElementById(checkId4).disabled = true;
    } else if (checkIdCount == 2 && check == false) {
        document.getElementById(checkId1).disabled = false;
        document.getElementById(checkId3).disabled = false;
        document.getElementById(checkId4).disabled = false;
    }
    if (checkIdCount == 3 && check == true) {
        if (rowFieldCount3 > 13) {
            alert('We Can Select Only 14 Item In One Row');
            return false;
        }
        document.getElementById(checkId1).disabled = true;
        document.getElementById(checkId2).disabled = true;
        document.getElementById(checkId4).disabled = true;
    } else if (checkIdCount == 3 && check == false) {
        document.getElementById(checkId1).disabled = false;
        document.getElementById(checkId2).disabled = false;
        document.getElementById(checkId4).disabled = false;
    }
    if (checkIdCount == 4 && check == true) {
        if (rowFieldCount4 > 13) {
            alert('We Can Select Only 14 Item In One Row');
            return false;
        }
        document.getElementById(checkId1).disabled = true;
        document.getElementById(checkId2).disabled = true;
        document.getElementById(checkId3).disabled = true;
    } else if (checkIdCount == 4 && check == false) {
        document.getElementById(checkId1).disabled = false;
        document.getElementById(checkId2).disabled = false;
        document.getElementById(checkId3).disabled = false;
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customization").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/stock/setup/omformquearyfile" + default_theme + ".php?check=" + check + "&checkId=" + checkId + "&searchForm=" + searchForm + "&rowno=" + checkIdCount + "&omincontents=" + omincontents, true);
    xmlhttp.send();
}
// END CODE TO FORM CUSTOMIZATION @AUTHOR:SWAPNIL-06MAR2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO MODIFY FUNCTION WIITH MARGING BOTH FUNCTIONS IN ONE FOR FORM CUSTOMIZATION ALL ISSUES @MADHUREE-24MARCH2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //

// START CODE TO ADD FUNCTION FOR GETTING STFF SELL REPORT AT STAFF PANEL @AUTHOR:MADHUREE-02MAR2020
function getStaffSellReportDetails(staffId, reportType) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("staff_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omstaffsellreport" + default_theme + ".php?staffId=" + staffId + "&reportType=" + reportType, true);
    xmlhttp.send();
}

// START CODE TO ADD FUNCTION FOR GETTING RETAIL STFF SELL REPORT AT STAFF PANEL @AUTHOR:SHRIKANT-19JAN2023
function getRetailStaffSellReportDetails(staffId, reportType) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("staff_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omretailstaffsellreport" + default_theme + ".php?staffId=" + staffId + "&reportType=" + reportType, true);
    xmlhttp.send();
}
function setStaffCommition(staffId) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    var staffCommission = document.getElementById('enterCommition').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("staff_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omstaffsellreport" + default_theme + ".php?staffId=" + staffId + "&staffCommission=" + staffCommission, true);
    xmlhttp.send();
}
// END CODE TO ADD FUNCTION FOR GETTING STFF SELL REPORT AT STAFF PANEL @AUTHOR:MADHUREE-02MAR2020
// START CODE TO ADD FUNCTION FOR SHOWING POPUP AT SCHEME COLLECTION LIST - APPROVAL PANEL FOR CHANGING THE APPROVAL STATUS BY ACCOUNTANT @AUTHOR:HEMA25FEB2020
function getSchemeApprovedStatusPopup(kittyMondepId, kittyCustId, delStatus) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omSchemeApproveStatuspopup" + default_theme + ".php?kittyMondepId=" + kittyMondepId + "&kittyCustId=" + kittyCustId + "&delStatus=" + delStatus, true);
    xmlhttp.send();
}
// END CODE TO ADD FUNCTION FOR SHOWING POPUP AT SCHEME COLLECTION LIST - APPROVAL PANEL FOR CHANGING THE APPROVAL STATUS BY ACCOUNTANT @AUTHOR:HEMA25FEB2020
// START CODE TO ADD FUNCTION FOR SHOWING POPUP AT SCHEME COLLECTION LIST - COMPLETE PANEL FOR CHANGING THE COMPLETE STATUS BY ACCOUNTANT @AUTHOR:HEMA25FEB2020
function getSchemeCompleteStatusPopup(kittyMondepId, kittyMondepCustId, delStatus) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omSchemeCompleteStatuspopup" + default_theme + ".php?kittyMondepId=" + kittyMondepId + "&kittyMondepCustId=" + kittyMondepCustId + "&delStatus=" + delStatus, true);
    xmlhttp.send();
}
// END CODE TO ADD FUNCTION FOR SHOWING POPUP AT SCHEME COLLECTION LIST - COMPLETE PANEL FOR CHANGING THE COMPLETE STATUS BY ACCOUNTANT @AUTHOR:HEMA25FEB2020
// START CODE TO CHANGE APPROVE STATUS OF SCHEME, @AUTHOR:HEMA-25FEB2020
function changeSchemeApproveStatus(kittyMondepId, kittyApproveStatus) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemDelStatuschangediv").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/omSchemeApproveStatusChange" + default_theme + ".php?kittyMondepId=" + kittyMondepId + "&kittyApproveStatus=" + kittyApproveStatus);
    xmlhttp.send();
}
// END CODE TO CHANGE APPROVE STATUS OF SCHEME,@AUTHOR:HEMA-25FEB2020
// START CODE TO CHANGE APPROVE STATUS OF SCHEME, @AUTHOR:HEMA-25FEB2020
function changeSchemeCompleteStatus(kittyMondepId, kittyApproveStatus) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemDelStatuschangediv").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/omSchemeCompleteStatusChange" + default_theme + ".php?kittyMondepId=" + kittyMondepId + "&kittyApproveStatus=" + kittyApproveStatus);
    xmlhttp.send();
}
// END CODE TO CHANGE APPROVE STATUS OF SCHEME,@AUTHOR:HEMA-25FEB2020
function formlist(formname) {
//      var x = formname;    
//      alert(x);
    $.ajax({
        type: "POST",
        url: "include/php/stock/setup/Setupaddstockpanel" + default_theme + ".php",
        data: {Menuname: formname},
        success: function (data) {
            $("#maindiv").html(data);
//            alert(data);

        }
    });
}
function formchkid(formcheckid, formvalue, Menuname) {
//    var y = formcheckid;
//    var x = formvalue;
//    var z = Menuname;   
//    alert(y);
//       alert(x);
//       alert(z);
    $.ajax({
        type: "POST",
        url: "include/php/stock/setup/Setupaddstockpanel" + default_theme + ".php",
        data: {formcheckid: formcheckid, formvalue: formvalue, Menuname: Menuname},
        success: function (data) {
            $("#maindiv").html(data);
//            alert(data);

        }
    });

}
function hideform(formcheckid, formvalue, Menuname) {
//    var y = formcheckid;
//    var x = formvalue;
//    var z = Menuname;   
//    alert(y);
//       alert(x);
//       alert(z);
    $.ajax({
        type: "POST",
        url: "include/php/stock/setup/Setupaddstockpanel" + default_theme + ".php",
        data: {formcheckid: formcheckid, formvalue: formvalue, Menuname: Menuname},
        success: function (data) {
            $("#maindiv").html(data);
//            alert(data);

        }
    });
}
function editform(editfromnm) {
//    var y = editfromnm;
//    alert(y);
    $.ajax({
        type: "POST",
        url: "include/php/stock/setup/Setupaddstockpanel" + default_theme + ".php",
        data: {editfromnm: editfromnm},
        success: function (data) {
            $("#maindiv").html(data);
//            alert(data);

        }
    });
}
function Renamefrnm(frmname, Rename, oldfrnm, value) {
//        var y = frmname;
//         var z = Rename;
//         var x = oldfrnm;
//         var m = value;
//            alert(y);
//             alert(z);
//             alert(x);
//              alert(m);
    $.ajax({
        type: "POST",
        url: "include/php/stock/setup/Setupaddstockpanel" + default_theme + ".php",
        data: {editfromnm: frmname, Rename: Rename, oldfrnm: oldfrnm},
        success: function (data) {
            $("#maindiv").html(data);
//            alert(data);

        }
    });

}


function myname(x) {
    var y = x;
    alert(y);
}
// START CODE TO ADD FUNCTION FOR REDIRECTING TO HOME PAGE BY HEADER OPTION @AUTHOR:MADHUREE-24APRIL2020
function navigationHomePageFromHeader(divPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omppmsdv" + default_theme + ".php?divPanel=" + divPanel, true);
    xmlhttp.send();
}
// END CODE TO ADD FUNCTION FOR REDIRECTING TO HOME PAGE BY HEADER OPTION @AUTHOR:MADHUREE-24APRIL2020
//
// START CODE TO STAFF ID IN HR PANEL  @AUTHOR:SWAPNIL-13MAY2020
function myFunction() {
    window.open("http://192.168.43.209:8080/omunim/2/include/php/ompdf" + default_theme + ".php");
}
// END CODE TO STAFF ID IN HR PANEL  @AUTHOR:SWAPNIL-13MAY2020
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO VALIDATE AND UPDATE VISITOR PANEL POPUP DETAILS @AUTHOR:MADHUREE-08MAY2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
function validateVisitorDetails(user_mobile, user_email) {
    var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (user_email != '') {
        if (!user_email.match(emailFormat)) {
            alert("Please Enter Valid Email Id !");
            document.getElementById("user_email").focus();
            return false;
        }
    }
    if (user_mobile.length < 10 || user_mobile.length > 12 || user_mobile.length === 11) {
        alert("Please Enter Valid Mobile No !");
        document.getElementById("user_mobile").focus();
        return false;
    }
    var contact_id = document.getElementById("contact_id").value;
    if (document.getElementById("user_mobile").value != '') {
        result = checkvalue(document.getElementById("user_mobile").value, '', '', contact_id, 'visitorPanel');
        if (result != 'success') {
            alert("Duplicate Mobile No ! Please Enter Different Mobile No !");
            return false;
        }
    }
    //
    if (document.getElementById("user_email").value != '') {
        result = checkvalue('', document.getElementById("user_email").value, '', contact_id, 'visitorPanel');
        if (result != 'success') {
            alert("Duplicate Email Id ! Please Enter Different Email Id !");
            return false;
        }
    }
    return true;
}
//
function customerTicketPopupDetails(visitorId) {
    var selectedOption = document.getElementById("leadStatus");
    var value = selectedOption.value;
    var text = selectedOption.options[selectedOption.selectedIndex].text;
    var documentRootPath = document.getElementById("documentRootPath").value;

    if (value == "CUSTOMER") {
        var iframeContent = document.getElementById('visitorStaffAssignDiv');
        var upperDiv = document.getElementById('leadDiv');
        var visitorRequirement = document.getElementById('visitorRequirement');
        iframeContent.innerHTML = ''; // Clear the existing content
        upperDiv.innerHTML = '';
        visitorRequirement.innerHTML = '';

        var xhr = new XMLHttpRequest();
        var url = 'omLeadsDetails.php?contactId=' + visitorId; // Include the ID as a query parameter in the URL
        xhr.open('GET', url, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                iframeContent.innerHTML = xhr.responseText; // Update the iframe content
            }
        };

        xhr.onerror = function () {
            console.log('Error loading content');
        };
        xhr.send();
    }
}

function updateCustomerTicketPopupDetails(contactId) {
    var panelName = "updateLeadsSalesCrm";
    var iframeContent1 = document.getElementById('visitorToCustomer');
    var upperDiv2 = document.getElementById('customerStatusChangeDiv');
    iframeContent1.innerHTML = ''; // Clear the existing content
    upperDiv2.innerHTML = '';

    var xhr = new XMLHttpRequest();
    var url = 'omLeadsDetails.php?panelName=' + panelName + '&contactId=' + contactId;
    ; // Include the ID as a query parameter in the URL
    xhr.open('GET', url, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            iframeContent1.innerHTML = xhr.responseText; // Update the iframe content
        }
    };

    xhr.onerror = function () {
        console.log('Error loading content');
    };
    xhr.send();
}

function updateCustomerHistoryPopupDetails(contactId) {
    var panelName = "updateLeadsSalesCrm";
    var iframeContent1 = document.getElementById('visitorToCustomer');
    var upperDiv2 = document.getElementById('customerStatusChangeDiv');
    iframeContent1.innerHTML = ''; // Clear the existing content
    upperDiv2.innerHTML = '';

    var xhr = new XMLHttpRequest();
    var url = 'omleadspopupdetailscontact.php?panelName=' + panelName + '&contactId=' + contactId;
    ; // Include the ID as a query parameter in the URL
    xhr.open('GET', url, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            iframeContent1.innerHTML = xhr.responseText; // Update the iframe content
        }
    };

    xhr.onerror = function () {
        console.log('Error loading content');
    };
    xhr.send();
}
function validateFormNotSubmit(panelName) {
//    alert('panelName' + panelName);
    if (panelName == 'updateLeadsSalesCrm') {
        var prodId = document.getElementById("prod_id").value;
        if (prodId === "" || prodId === "null" || prodId === "NULL") {
            document.getElementById("prod_id").focus();
            alert("Please fill the Product Id");
            return false; // Prevent form submission
        }
        var email = document.getElementById("user_email").value;
        if (email === "") {
            document.getElementById("user_email").focus();
            alert("Please fill the email");
            return false; // Prevent form submission
        }

        var phoneNumber = document.getElementById('user_mobile').value;
        if (!validatePhoneNumber(phoneNumber, panelName)) {
            event.preventDefault();
            return false;
        }
    } else {
        var remainingAmt = document.getElementById("remainingAmt").value;
        if (remainingAmt === "") {
            alert("Please fill the fields");
            return false; // Prevent form submission
        }

    }
    return true;
}

function updateVisitorPopupdetails(user_name, user_mobile, user_email, user_city, user_state, user_id) {
    var documentRootPath = document.getElementById("documentRootPath").value;
    var valdateVisitor = validateVisitorDetails(user_mobile, user_email);
    if (valdateVisitor === true) {
        poststr = "?user_mobile=" + encodeURIComponent(user_mobile)
                + "&user_email=" + encodeURIComponent(user_email)
                + "&user_city=" + encodeURIComponent(user_city)
                + "&user_state=" + encodeURIComponent(user_state)
                + "&user_id=" + encodeURIComponent(user_id)
                + "&user_name=" + encodeURIComponent(user_name);
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("visitorDetailUpdateDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", documentRootPath + '/include/php/omleadspopupdetailupdate' + default_theme + '.php' + poststr, true);
        xmlhttp.send();
    }
}
function updateVisitorStatus(leadStatus, DOBDay, DOBMonth, DOBYear, leadStaffName1, leadStaffName2, documentRootPath, visitorComm, contactId) {
    var panelName = document.getElementById("panelName").value;
    var supportPanel = document.getElementById("supportPanel").value;
    if (panelName == 'custSupportTicketPanel') {
        var DeadlineDay = document.getElementById("DeadlineDay").value;
        var DeadlineMonth = document.getElementById("DeadlineMonth").value;
        var DeadlineYear = document.getElementById("DeadlineYear").value;
        poststr = "?leadStatus=" + encodeURIComponent(leadStatus)
                + "&DOBDay=" + encodeURIComponent(DOBDay)
                + "&DOBMonth=" + encodeURIComponent(DOBMonth)
                + "&DOBYear=" + encodeURIComponent(DOBYear)
                + "&leadStaffId1=" + encodeURIComponent(leadStaffName1)
                + "&leadStaffId2=" + encodeURIComponent(leadStaffName2)
                + "&visitorComm=" + encodeURIComponent(visitorComm)
                + "&contactId=" + encodeURIComponent(contactId)
                + "&panelName=" + encodeURIComponent(panelName)
                + "&supportPanel=" + encodeURIComponent(supportPanel)
                + "&DeadlineDay=" + encodeURIComponent(DeadlineDay)
                + "&DeadlineMonth=" + encodeURIComponent(DeadlineMonth)
                + "&DeadlineYear=" + encodeURIComponent(DeadlineYear);
    } else {
        poststr = "?leadStatus=" + encodeURIComponent(leadStatus)
                + "&DOBDay=" + encodeURIComponent(DOBDay)
                + "&DOBMonth=" + encodeURIComponent(DOBMonth)
                + "&DOBYear=" + encodeURIComponent(DOBYear)
                + "&leadStaffId1=" + encodeURIComponent(leadStaffName1)
                + "&leadStaffId2=" + encodeURIComponent(leadStaffName2)
                + "&visitorComm=" + encodeURIComponent(visitorComm)
                + "&contactId=" + encodeURIComponent(contactId)
                + "&panelName=" + encodeURIComponent(panelName)
                + "&supportPanel=" + encodeURIComponent(supportPanel);
    }
//    alert(poststr);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("visitorStaffAssignDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (leadStaffName1 == 'NotSelected' && leadStaffName2 == 'NotSelected') {
        return false;
    } else {
        xmlhttp.open("POST", documentRootPath + '/include/php/omLeadsDetailsAd' + default_theme + '.php' + poststr, true);
        xmlhttp.send();
    }

}
function changeCustomerApprovalStatusStatus(firmId, customerStatus, contactId, panelName) {
//    alert('firmId'+firmId);
//    alert('customerStatus'+customerStatus);
//    alert('contactId'+contactId);
//    alert('panelName'+panelName);
    var documentRootPath = document.getElementById("documentRootPath").value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerStatusChangeDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName === 'CustomerApprovalPanel') {
        xmlhttp.open("POST", documentRootPath + '/include/php/omCustStatusChange' + default_theme + '.php?customerStatus='
                + customerStatus + "&contactId=" + contactId + "&panelName=" + panelName + "&firmId=" + firmId, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("POST", documentRootPath + '/include/php/omCustStatusChange' + default_theme + '.php?StaffId='
                + customerStatus + "&transferStaffId=" + contactId + "&panelName=" + panelName, true);
        xmlhttp.send();
    }
}
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO VALIDATE AND UPDATE VISITOR PANEL POPUP DETAILS @AUTHOR:MADHUREE-08MAY2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//START CODE FOR SELL ITEM PREID @AUTHOR:ASHWINI PATIL-12JUNE2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

function searchItemByItemPreId(itemPreId, keyCodeInput, payPanelName) {
    var keyCode = keyCodeInput;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (xmlhttp.responseText == 'BarCodeNoFound') {
                //alert(xmlhttp.responseText);
                return 'BarCodeNoFound';
            } else {
                document.getElementById("itemDropdownDiv").innerHTML = xmlhttp.responseText;
            }
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('sellItemPreIdSelect').focus();
                document.getElementById('sellItemPreIdSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/omselpreid' + default_theme + '.php?itemPreId=' + itemPreId + "&payPanelName=" + payPanelName, true);
    xmlhttp.send();
}
//
function searchSellItemPreIdForPanelBlank() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemDropdownDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/ombbblnk' + default_theme + '.php', true);
    xmlhttp.send();

}
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//END CODE FOR SELL ITEM PREID @AUTHOR:ASHWINI PATIL-12JUNE2020
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //=======
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO SALARY SLIP FUNCTION  @AUTHOR:SWAPNIL-05MAY2020
function Approvestaff(staffId, APPROVE) {
    $.ajax({
        type: "POST",
        url: "include/php/omsalary" + default_theme + ".php",
        data: {staffId: staffId, APPROVE: APPROVE},
        success: function (data) {
            $("#salaryslip").html(data);
//            alert(data);
        }
    });
}

function grospayment(value, staffId) {
//        var y = value;
//            alert(y);
    $.ajax({
        type: "POST",
        url: "include/php/omsalaryslip" + default_theme + ".php",
        data: {value: value, staffId: staffId},
        success: function (data) {
            $("#salarydiv").html(data);
//            alert(data);
        }
    });
}
function pervalue(pervalue, compontename, staffId) {
    $.ajax({
        type: "POST",
        url: "include/php/omsalaryslip" + default_theme + ".php",
        data: {pervalue: pervalue, compontename: compontename, staffId: staffId},
        success: function (data) {
            $("#salarydiv").html(data);
//            alert(data);
        }
    });
}
// END CODE TO SALARY SLIP FUNCTION  @AUTHOR:SWAPNIL-05MAY2020
// START CODE TO HR PANEL FUNCTION  @AUTHOR:SWAPNIL-13MAY2020
function pervaluehr(pervalue, compontename, staffId) {
    $.ajax({
        type: "POST",
        url: "include/php/omhrsalary" + default_theme + ".php",
        data: {pervalue: pervalue, compontename: compontename, staffId: staffId},
        success: function (data) {
            $("#hrsalary").html(data);
//            alert(data);
        }
    });
}
// END CODE TO HR PANEL FUNCTION  @AUTHOR:SWAPNIL-13MAY2020 
// START CODE TO SALARY SLIP FUNCTION  @AUTHOR:SWAPNIL-05MAY2020
function componentamt(componentamt, compontename, staffId) {
    $.ajax({
        type: "POST",
        url: "include/php/omsalaryslip" + default_theme + ".php",
        data: {componentamt: componentamt, compontename: compontename, staffId: staffId},
        success: function (data) {
            $("#salarydiv").html(data);
//            alert(data);
        }
    });
}
// END CODE TO SALARY SLIP FUNCTION  @AUTHOR:SWAPNIL-05MAY2020
// START CODE TO HR PANEL FUNCTION  @AUTHOR:SWAPNIL-13MAY2020 
function componentamthr(componentamt, compontename, staffId) {
    $.ajax({
        type: "POST",
        url: "include/php/omhrsalary" + default_theme + ".php",
        data: {componentamt: componentamt, compontename: compontename, staffId: staffId},
        success: function (data) {
            $("#hrsalary").html(data);
//            alert(data);
        }
    });
}
// END CODE TO HR PANEL FUNCTION  @AUTHOR:SWAPNIL-13MAY2020 
// START CODE TO SALARY SLIP FUNCTION  @AUTHOR:SWAPNIL-05MAY2020
function comgrssalary(compontename, staffId) {
    $.ajax({
        type: "POST",
        url: "include/php/omsalaryslip" + default_theme + ".php",
        data: {componentamt: componentamt, compontename: compontename, staffId: staffId},
        success: function (data) {
            $("#salarydiv").html(data);
//            alert(data);
        }
    });
}
function getaddcomponent(staffId, Id, compontename, inputfield, panel, operation) {
    $.ajax({
        type: "POST",
        url: "include/php/omsalaryslip" + default_theme + ".php",
        data: {compontename: compontename, inputfield: inputfield, panel: panel, operation: operation, Id: Id, staffId: staffId},
        success: function (data) {
            $("#salarydiv").html(data);
//            alert(data);
        }
    });
}
// END CODE TO SALARY SLIP FUNCTION  @AUTHOR:SWAPNIL-05MAY2020
// START CODE TO HR PANEL FUNCTION  @AUTHOR:SWAPNIL-13MAY2020 
function getaddcomponenthr(staffId, Id, compontename, inputfield, panel, operation) {
    $.ajax({
        type: "POST",
        url: "include/php/omhrsalary" + default_theme + ".php",
        data: {compontename: compontename, inputfield: inputfield, panel: panel, operation: operation, Id: Id, staffId: staffId},
        success: function (data) {
            $("#hrsalary").html(data);
//            alert(data);
        }
    });
}

function getaddcomponentblank(staffId, Id, compontename, inputfield, panel, operation) {
    $.ajax({
        type: "POST",
        url: "include/php/omhrsalary" + default_theme + ".php",
        data: {compontename: compontename, inputfield: inputfield, panel: panel, operation: operation, Id: Id, staffId: staffId},
        success: function (data) {
            $("#hrsalary").html(data);
//            alert(data);
        }
    });
}
// END CODE TO HR PANEL FUNCTION  @AUTHOR:SWAPNIL-13MAY2020 
// START CODE TO CHECK UNIQUE VALUE  @AUTHOR:SWAPNIL-05MAY2020

function checkvalue(userMobile, userEmail, userLoginId, userId, panelName, checkemail = '') {
    var result = "";
    //
    if (panelName === 'visitorPanel') {
        $.ajax({
            async: false,
            type: "POST",
            url: "omusercheck" + default_theme + ".php",
            data: {userMobile: userMobile, userEmail: userEmail, userLoginId: userLoginId, userId: userId, checkemail: checkemail},
            success: function (data) {
                if (data == 'success')
                    $("#userAlerts").html('');
                else
                    $("#userAlerts").html(data);
//            alert(data);
                result = data;
            }
        });
    } else {
        $.ajax({
            async: false,
            type: "POST",
            url: "include/php/omusercheck" + default_theme + ".php",
            data: {userMobile: userMobile, userEmail: userEmail, userLoginId: userLoginId, userId: userId, checkemail: checkemail},
            success: function (data) {
                if (data == 'success')
                    $("#userAlerts").html('');
                else
                    $("#userAlerts").html(data);
//            alert(data);
                result = data;
            }
        });
    }
    return result;
}

function validateForm(event) {
    var phoneNumber = document.getElementById('leadsPhnNo').value;
    if (!validatePhoneNumber(phoneNumber)) {
        event.preventDefault();
        return false;
    }
    return true;
}
function validatePhoneNumber(phoneNumber, panelName) {
    // Remove leading and trailing whitespace from the phone number
    phoneNumber = phoneNumber.trim();

    // Check if the phone number is less than 10 characters or starts with '+' or '0'
    if (phoneNumber.length < 10 || phoneNumber.startsWith('+') || phoneNumber.startsWith('0')) {
        alert("Invalid phone number. Please enter a valid phone number.");
        document.getElementById('leadsPhnNo').focus();
        return false;
    }
    return true;
}

function checkDuplicateMobileNoOrEmailId(userMobile, userEmail, userLoginId, userId, panelName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("userAlerts").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", 'include/php/omusercheck' + default_theme + '.php?userMobile=' + userMobile + '&userEmail=' + userEmail + '&userLoginId=' + userLoginId + '&userId=' + userId + '&panelName=' + panelName, true);
    xmlhttp.send();

}
// END CODE TO CHECK UNIQUE VALUE  @AUTHOR:SWAPNIL-05MAY2020
// START CODE TO STAFF ID IN HR PANEL  @AUTHOR:SWAPNIL-13MAY2020
function userid(staffId) {
//        var y = staffId;
//            alert(y);
    $.ajax({
        type: "POST",
        url: "include/php/omhrsalary" + default_theme + ".php",
        data: {staffId: staffId},
        success: function (data) {
            $("#hrsalary").html(data);
//          alert(data);
        }
    });
}
// END CODE TO STAFF ID IN HR PANEL  @AUTHOR:SWAPNIL-13MAY2020
function addsalary(percentage) {
    var y = percentage;
    alert(y);
    $.ajax({
        type: "POST",
        url: "include/php/omhrsalary" + default_theme + ".php",
        data: {staffId: staffId},
        success: function (data) {
            $("#hrsalary").html(data);
//          alert(data);
        }
    });
}

function getslaryslip(staffId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("salaryslip").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("salaryslip").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ompdf" + default_theme + ".php?staffId=" + staffId, true);
    xmlhttp.send();
}
function getdateupdate(mon, year, staffId) {
    $.ajax({
        type: "POST",
        url: "include/php/omsalaryslipupdate" + default_theme + ".php",
        data: {mon: mon, year: year, staffId: staffId},
        success: function (data) {
            $("#updatesalaryslip").html(data);
//            alert(data);
        }
    });
}
function Getupdatedetails(staffId, mon, year, value1, value2, panel) {
    $.ajax({
        type: "POST",
        url: "include/php/omsalaryslipupdate" + default_theme + ".php",
        data: {staffId: staffId, mon: mon, year: year, value1: value1, value2: value2, panel: panel},
        success: function (data) {
            $("#updatesalaryslip").html(data);
//            alert(data);
        }
    });
}
function supportPanelPopup(ticketId, staffId, supportPanel, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("display_girvi_info_popup").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("display_girvi_info_popup").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/omleadspopup" + default_theme + ".php?ticketId=" + ticketId + "&staffId=" + staffId + "&custId=" + custId + "&supportPanelName=custSupportTicketPanel" + "&supportPanel= " + supportPanel, true);
    xmlhttp.send();
    $("#display_account_popup").show();
}
//
function showPurchaseInvDet(preInvoiceNo, postInvoiceNo, panelName, suppPanelOption, userId, utinId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?utinId=" + utinId + "&panelName=" + panelName + "&paymentPanelName=StockPayUp" +
            "&preInvoiceNo=" + preInvoiceNo + "&PreInvoiceNo=" + preInvoiceNo +
            "&postInvoiceNo=" + postInvoiceNo + "&invoiceNo=" + postInvoiceNo +
            "&suppId=" + userId + "&suppPayId=" + utinId + "&suppPanelOption=" + suppPanelOption, true);
    xmlhttp.send();
}

function getSchemePrintRow(checkValue, KittyEmiId, kittyId, kittyCustId, documentRoot, kittyNo, moneyDepEMINo, kittyCheckStr) {
    if (checkValue == true) {
        poststr = "?KittyEmiId=" + encodeURIComponent(KittyEmiId)
                + "&kittyId=" + encodeURIComponent(kittyId)
                + "&kittyNo=" + encodeURIComponent(kittyNo)
                + "&moneyDepEMINo=" + encodeURIComponent(moneyDepEMINo)
                + "&kittyCustId=" + encodeURIComponent(kittyCustId)
                + "&checkValue=" + encodeURIComponent(checkValue)
                + "&kittyCheckStr=" + encodeURIComponent(kittyCheckStr);
    } else {
        poststr = "?KittyEmiId=" + encodeURIComponent(KittyEmiId)
                + "&kittyId=" + encodeURIComponent(kittyId)
                + "&kittyNo=" + encodeURIComponent(kittyNo)
                + "&moneyDepEMINo=" + encodeURIComponent(moneyDepEMINo)
                + "&kittyCustId=" + encodeURIComponent(kittyCustId)
                + "&checkValue=" + encodeURIComponent(checkValue)
                + "&kittyCheckStr=" + encodeURIComponent(kittyCheckStr);
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("SchemeInvoiceDiv").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/scheme/omSchemePassbookInv" + default_theme + ".php" + poststr, true);
    xmlhttp.send();
}
//
//
// ***************************************************************************************************
// START CODE TO DISPLAY DROPDOWN AFTER SEARCHING SELL PRODUCT CODE @AUTHOR-PRIYANKA-12NOV2020
// ***************************************************************************************************
function searchProductByPreId(itemPreId, keyCodeInput) {
    var keyCode = keyCodeInput;
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            //alert(xmlhttp2.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("prodCodeDropdownDiv").innerHTML = xmlhttp2.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('sellItemPreIdSelect').focus();
                document.getElementById('sellItemPreIdSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp2.open("POST", 'include/php/omSearchProdByPreId' + default_theme + '.php?itemPreId=' + itemPreId, true);
    xmlhttp2.send();
}
//
//for fashion jewellary item
function searchProductByPreIdfashion(itemPreId, keyCodeInput) {
    var keyCode = keyCodeInput;
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("prodCodeDropdownDiv").innerHTML = xmlhttp2.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('sellItemPreIdSelect').focus();
                document.getElementById('sellItemPreIdSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp2.open("POST", 'include/php/omSearchProdByPreIdfashion' + default_theme + '.php?itemPreId=' + itemPreId, true);
    xmlhttp2.send();
}
//end code by hrushali
function searchSellProdPreIdForPanelBlank() {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("prodCodeDropdownDiv").innerHTML = xmlhttp2.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp2.open("POST", 'include/php/ombbblnk' + default_theme + '.php', true);
    xmlhttp2.send();

}
// ***************************************************************************************************
// END CODE TO DISPLAY DROPDOWN AFTER SEARCHING SELL PRODUCT CODE @AUTHOR-PRIYANKA-12NOV2020
// ***************************************************************************************************
//
function getPrevProductDetails(userId, transType, prodType, prodCategory, prodMergedCount, prevEntryByIndicator, prevEntryByCustIndicator) {
    //
    poststr = "?userId=" + encodeURIComponent(userId)
            + "&transType=" + encodeURIComponent(transType)
            + "&prodType=" + encodeURIComponent(prodType)
            + "&prodCategory=" + encodeURIComponent(prodCategory)
            + "&prodMergedCount=" + encodeURIComponent(prodMergedCount)
            + "&prevEntryByIndicator=" + encodeURIComponent(prevEntryByIndicator)
            + "&prevEntryByCustIndicator=" + encodeURIComponent(prevEntryByCustIndicator);
    //
    loadXMLDoc3();
    xmlhttp3.onreadystatechange = function () {
        if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("setStockDataByMasterDataMainDiv").innerHTML = xmlhttp3.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp3.open("POST", "include/php/stock/omGetPrevProdDetail" + default_theme + ".php" + poststr, true);
    xmlhttp3.send();
}
//
//
//
//
function formFieldSetSetting(check, checkId, searchForm, omincontents) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customization").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("GET", "include/php/stock/setup/omformquearyfile" + default_theme + ".php?check=" + check +
            "&checkId=" + checkId + "&searchForm=" + searchForm +
            "&omincontents=" + omincontents, true);
    //
    xmlhttp.send();
    //
}
//
//
function sendWhatsAppMess(mobileNo, message) {
    //
    mobileNo = encodeURIComponent(mobileNo);
    message = encodeURIComponent(message);
    //
    window.open("https://web.whatsapp.com/send?phone=" + mobileNo + "&text=" + message, "whatsapp").focus();
    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            //document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            //alert(xmlhttp.responseText);
//        } 
//    };
    xmlhttp.open("POST", 'include/php/omsendwamess' + default_theme + '.php', true);
    xmlhttp.send();
}
function setTempPreId(prodMergeCount, sttr_temp_item_pre_id, sttr_temp_item_post_id) {
    if (typeof (document.getElementById('sttr_temp_item_pre_id')) != 'undefined' &&
            (document.getElementById('sttr_temp_item_pre_id') != null) &&
            typeof (document.getElementById('sttr_temp_item_post_id')) != 'undefined' &&
            (document.getElementById('sttr_temp_item_post_id') != null) &&
            typeof (document.getElementById('sttr_temp_merge_count')) != 'undefined' &&
            (document.getElementById('sttr_temp_merge_count') != null)) {
        document.getElementById('sttr_temp_merge_count').value = prodMergeCount;
        document.getElementById('sttr_temp_item_pre_id').value = sttr_temp_item_pre_id;
        document.getElementById('sttr_temp_item_post_id').value = sttr_temp_item_post_id;
    }
}
//
//
function showMetalFormB2DetailsDiv(documentRootPath, sttrId, panelName, stockType, mainPanel, transactionPanel, utinId, invPanel, metType) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName +
            "&sttr_panel_name=FINE_JEWELLERY_PUR_B2" + "&stockType=" + stockType, true);
    //
    xmlhttp.send();
    //
}
//
function addBoxItemLocationDiv(count) {
    var totalLocationCount = document.getElementById("locationCount").value;
    totalLocationCount = parseInt(totalLocationCount) + 1;
    document.getElementById("locationCount").value = totalLocationCount;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("locationAddDiv" + count).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omadlocdv" + default_theme + ".php?count=" + count, true);
    xmlhttp.send();
}
//
function removeBoxItemLocationDiv(count) {
    var totalLocationCount = document.getElementById("locationCount").value;
    totalLocationCount = parseInt(totalLocationCount) - 1;
    document.getElementById("locationCount").value = totalLocationCount;
    document.getElementById("locationAddMiddleDiv" + count).innerHTML = "";
}
//
function setItemBoxLoactions() {
    var locationCount = document.getElementById("locationCount").value;
    var poststr = "panelName=addLocations&value=NoChange&locationCount=" + locationCount;
    for (counter = 1; counter <= locationCount; counter++) {
        poststr = poststr + "&locationStartRange" + counter + "=" + encodeURIComponent(document.getElementById("locationStartRange" + counter).value)
                + "&locationEndRange" + counter + "=" + encodeURIComponent(document.getElementById("locationEndRange" + counter).value)
                + "&locationYear" + counter + "=" + encodeURIComponent(document.getElementById("loactionYear" + counter).value)
                + "&location" + counter + "=" + encodeURIComponent(document.getElementById("location" + counter).value);
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("addLocationMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/ompplpad' + default_theme + '.php?' + poststr);
    xmlhttp.send();
}
//
// ========================================================================================== //
// START CODE TO ADD FUNCTION TO ADD NEW SCHEME EMI DEPOSITE DIV @AUTHOR:MADHUREE-07APRIL2021 //
// ========================================================================================== //
//
function addKittyWithInterestPayDiv(count, kittyEndDOB, kittyPreSerialNumber, kittyCustId, kittyFirmId, kittyId, kittyMetalType, kittyMonDepInterest, kittyRecipitNo, DOBDay, DOBMonth, DOBYear) {
    var newKittyRecipitNo = parseInt(kittyRecipitNo) + 1;
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("kittyMonDepDiv" + count).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omktwintpy" + default_theme + ".php?count=" + count + "&kittyMetalType=" + kittyMetalType + "&newKittyRecipitNo=" + newKittyRecipitNo + "&kittyPreSerialNumber=" + kittyPreSerialNumber + "&kittyCustId=" + kittyCustId + "&kittyFirmId=" +
            kittyFirmId + "&kittyId=" + kittyId + "&kittyMonDepInterest=" + kittyMonDepInterest + "&kittyEndDOB=" + kittyEndDOB, true);
    xmlhttp.send();
}
//
// ========================================================================================== //
// END CODE TO ADD FUNCTION TO ADD NEW SCHEME EMI DEPOSITE DIV @AUTHOR:MADHUREE-07APRIL2021 //
// ========================================================================================== //
//
// ========================================================================================= //
// START CODE TO ADD FUNCTION TO REMOVE SCHEME EMI DEPOSITE DIV @AUTHOR:MADHUREE-07APRIL2021 //
// ========================================================================================= //
//
function removeKittyWithInterestPayDiv(count) {
    document.getElementById("kittyMonDepMiddleDiv" + count).innerHTML = "";
}
//
// ========================================================================================= //
// END CODE TO ADD FUNCTION TO REMOVE SCHEME EMI DEPOSITE DIV @AUTHOR:MADHUREE-07APRIL2021 //
// ========================================================================================= //
//
// ======================================================================================================= //
// START CODE TO ADD FUNCTION TO CHANGE TIME PERIOD TO CALCULATE INTEREST AMT @AUTHOR:MADHUREE-07APRIL2021 //
// ======================================================================================================= //
//
function changeTotalTimePeriodForInterest(count, DOBDay, DOBMonth, DOBYear, kittyEndDOB, $kittyMetalType) {
    var paidDate = DOBDay + ' ' + DOBMonth + ' ' + DOBYear;
    var nextEmiStartDate = DOBDay + ' ' + DOBMonth + ' ' + DOBYear;
    var emiPaidDateStr = Date.parse(nextEmiStartDate);
    var kittyEndDateStr = Date.parse(kittyEndDOB);
    var currentDate = new Date();
    //
    if (new Date(emiPaidDateStr).getTime() > new Date(kittyEndDateStr).getTime()) {
        alert('Please select correct paid date!');
        document.getElementById('DOBDay' + count).value = currentDate.getDate();
        document.getElementById('DOBMonth' + count).value = (currentDate.toLocaleString('default', {month: 'long'}).toUpperCase()).substring(0, 3);
        document.getElementById('DOBYear' + count).value = currentDate.getFullYear();
        return false;
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("kittyEmiTimePeriod" + count).value = xmlhttp.responseText;
            document.getElementById("kittyEmiTimePeriodDiv" + count).innerHTML = xmlhttp.responseText + ' Days';
            calculateTotalDepositeAmount(count, $kittyMetalType);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcalschemeint" + default_theme + ".php?paidDate=" + paidDate + "&kittyEndDOB=" + kittyEndDOB, true);
    xmlhttp.send();
}
//
// ===================================================================================================== //
// END CODE TO ADD FUNCTION TO CHANGE TIME PERIOD TO CALCULATE INTEREST AMT @AUTHOR:MADHUREE-07APRIL2021 //
// ===================================================================================================== //
//
// ================================================================================================================= //
// START CODE TO ADD FUNCTION FOR CALCULATE TOTAL DEPOSITE AMOUNT ACCORDING TO INTEREST @AUTHOR:MADHUREE-07APRIL2021 //
// ================================================================================================================= //
//
function calculateTotalDepositeAmount(count, kittyMetalType) {
    var kittyMonDepInterest = document.getElementById('kittyMonDepInterest' + count).value;
    var kittyDepositeAmount = document.getElementById('kittyPaidAmt' + count).value;
    var kittyEmiTimePeriod = document.getElementById('kittyEmiTimePeriod' + count).value;
    var kittyDepositeInterest = 0;
    var kittyTotalPaidAmt = 0;
    var gstOnPaidAmt = 0;
    var gstCharges = parseInt(3);
    //
    if (kittyDepositeAmount != '') {
        document.getElementById('kittyPaidAmt' + count).value = parseFloat(kittyDepositeAmount).toFixed(2);
    }
    //
    if (kittyMonDepInterest != '' && kittyDepositeAmount != '') {
        kittyDepositeInterest = parseFloat(kittyDepositeAmount * (kittyMonDepInterest / 100 / 365) * kittyEmiTimePeriod).toFixed(2);
    }
    //
    if (kittyDepositeAmount != '' && kittyDepositeInterest != '') {
        kittyTotalPaidAmt = parseFloat(parseFloat(kittyDepositeAmount) + parseFloat(kittyDepositeInterest)).toFixed(2);
    }
    //
    if (kittyDepositeInterest != '') {
        document.getElementById('kittyPaidInterest' + count).value = kittyDepositeInterest;
    }
    //
    if (kittyTotalPaidAmt != '') {
        document.getElementById('kittyTotalPaidAmt' + count).value = kittyTotalPaidAmt;
        var taxable_amt = parseFloat((kittyTotalPaidAmt * 100) / parseInt(gstCharges + 100)).toFixed(2);
        document.getElementById('kittyChangedPaidAmt' + count).value = parseFloat(taxable_amt).toFixed(2);
        gstOnPaidAmt = parseFloat((taxable_amt * gstCharges) / 100);
        document.getElementById('kittyGSTPaidAmt' + count).value = parseFloat(gstOnPaidAmt).toFixed(2);
    }
    //
    if (kittyMetalType != 'CASH') {
        changeKittyMetalWeight(count);
    }
}
//
// =============================================================================================================== //
// END CODE TO ADD FUNCTION FOR CALCULATE TOTAL DEPOSITE AMOUNT ACCORDING TO INTEREST @AUTHOR:MADHUREE-07APRIL2021 //
// =============================================================================================================== //
//
// ================================================================================================================== //
// START CODE TO ADD FUNCTION FOR CALCULATE TOTAL METAL WEIGHT ACCORDING TO TOTAL AMOUNT @AUTHOR:MADHUREE-07APRIL2021 //
// ================================================================================================================== //
//
function changeKittyMetalWeight(count) {
    var kittyTotalPaidAmt = document.getElementById('kittyTotalPaidAmt' + count).value;
    var kitttyTaxableAmt = document.getElementById('kittyChangedPaidAmt' + count).value;
    var kittyMetalRate = document.getElementById('kittyRateAmt' + count).value;
    var othGmWtInGm = document.getElementById('othGmWtInGm' + count).value;
    var kittyMetalWt = 0;
    //
    if (kittyTotalPaidAmt != '' && kittyMetalRate != '') {
        kittyMetalWt = parseFloat(kitttyTaxableAmt / (kittyMetalRate / othGmWtInGm)).toFixed(3);
    }
    //
    if (kittyMetalWt != '') {
        document.getElementById('kittyWeight' + count).value = kittyMetalWt;
    }
}
//
// ================================================================================================================ //
// END CODE TO ADD FUNCTION FOR CALCULATE TOTAL METAL WEIGHT ACCORDING TO TOTAL AMOUNT @AUTHOR:MADHUREE-07APRIL2021 //
// ================================================================================================================ //
//
// ====================================================================================== //
// START CODE TO ADD FUNCTION FOR SCHEME EMI DEPOSIT PAYMENT @AUTHOR:MADHUREE-07APRIL2021 //
// ====================================================================================== //
//
function passKittyWithInterestEMIValues(count, DOBDay, DOBMonth, DOBYear, kittyPaidAmt, kittyPaidInterest, kittyTotalPaidAmt, custStaffLoginId, kittyEmiTimePeriod, newKittyRecipitNo, depEMIStatus, kittyPreSerialNum, kittyCustId, kittyFirmId, kittyId, kittyMonDepId, prevSchDepEMIStatus, kittyMetalType, kittyEndDOB, kittyRateAmt, kittyWeight, ktGstAmt, ktTaxableAmt) {
    if (validateSelectField(document.getElementById("DOBDay" + count).value, "Please select Day!") == false) {
        document.getElementById("DOBDay" + count).focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth" + count).value, "Please select Month!") == false) {
        document.getElementById("DOBMonth" + count).focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear" + count).value, "Please select Year!") == false) {
        document.getElementById("DOBYear" + count).focus();
        return false;
    } else if (prevSchDepEMIStatus == 'Due' && depEMIStatus != 'Paid' && depEMIStatus != 'Payment') {
        alert("Please pay previous all EMI");
        return false;
    } else {
        var nextEmiStartDate = DOBDay + ' ' + DOBMonth + ' ' + DOBYear;
        var emiPaidDateStr = Date.parse(nextEmiStartDate);
        var kittyEndDateStr = Date.parse(kittyEndDOB);
        var currentDate = new Date();
        //
        if (new Date(emiPaidDateStr).getTime() > new Date(kittyEndDateStr).getTime()) {
            alert('Please select correct paid date!');
            document.getElementById('DOBDay' + count).value = currentDate.getDate();
            document.getElementById('DOBMonth' + count).value = (currentDate.toLocaleString('default', {month: 'long'}).toUpperCase()).substring(0, 3);
            document.getElementById('DOBYear' + count).value = currentDate.getFullYear();
            if (depEMIStatus == 'Paid' || depEMIStatus == 'Payment') {
                document.getElementById('depEMIStatus' + count).value = 'Due';
            }
            return false;
        }
        var checkKittyPaidAmt = document.getElementById("kittyPaidAmt" + count).value;
        if (checkKittyPaidAmt == '' || checkKittyPaidAmt == null || checkKittyPaidAmt == 0) {
            alert("Please enter the Paid Amt!");
            document.getElementById("kittyPaidAmt" + count).focus();
            if (depEMIStatus == 'Paid' || depEMIStatus == 'Payment') {
                document.getElementById('depEMIStatus' + count).value = 'Due';
            }
            return  false;
        }
        if (kittyMetalType != 'CASH') {
            var checkKittyRateAmt = document.getElementById("kittyRateAmt" + count).value;
            var checkKittyWeight = document.getElementById("kittyWeight" + count).value;
            if (checkKittyRateAmt == '' || checkKittyWeight == '' || checkKittyRateAmt == null || checkKittyWeight == null || checkKittyRateAmt == 0.000 || checkKittyWeight == 0.00 || checkKittyRateAmt == 0 || checkKittyWeight == 0 || checkKittyWeight == 0) {
                alert("Please enter the Metal Rate and Weight!");
                if (depEMIStatus == 'Paid' || depEMIStatus == 'Payment') {
                    document.getElementById('depEMIStatus' + count).value = 'Due';
                }
                return  false;
            }
        }
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
            if (depEMIStatus == 'Payment') {
                openSchemeWithInterestPopUp(count, DOBDay, DOBMonth, DOBYear, kittyPaidAmt, kittyPaidInterest, kittyTotalPaidAmt, custStaffLoginId, kittyEmiTimePeriod, newKittyRecipitNo, depEMIStatus, kittyPreSerialNum, kittyCustId, kittyFirmId, kittyId, kittyMonDepId, prevSchDepEMIStatus, kittyMetalType, kittyEndDOB, kittyRateAmt, kittyWeight, ktGstAmt, ktTaxableAmt);
            } else {
                var emiPaidDate = DOBDay + ' ' + DOBMonth + ' ' + DOBYear;
                var poststr = "count=" + count
                        + "&emiPaidDate=" + emiPaidDate
                        + "&kittyPaidAmt=" + kittyPaidAmt
                        + "&kittyPaidInterest=" + kittyPaidInterest
                        + "&kittyTotalPaidAmt=" + kittyTotalPaidAmt
                        + "&custStaffLoginId=" + custStaffLoginId
                        + "&kittyEmiTimePeriod=" + kittyEmiTimePeriod
                        + "&newKittyRecipitNo=" + newKittyRecipitNo
                        + "&depEMIStatus=" + depEMIStatus
                        + "&kittyPreSerialNum=" + kittyPreSerialNum
                        + "&kittyCustId=" + kittyCustId
                        + "&kittyFirmId=" + kittyFirmId
                        + "&kittyId=" + kittyId
                        + "&kittyMonDepId=" + kittyMonDepId
                        + "&kittyEndDOB=" + kittyEndDOB;
                if (kittyMetalType != 'CASH') {
                    poststr = poststr + "&kittyMetalType=" + kittyMetalType
                            + "&kittyWeight=" + kittyWeight
                            + "&kittyRateAmt=" + kittyRateAmt
                            + "&ktGstAmt=" + ktGstAmt
                            + "&ktTaxableAmt=" + ktTaxableAmt;
                }
                xmlhttp.open("POST", "include/php/omktwintemiin" + default_theme + ".php?" + poststr, true);
                xmlhttp.send();
            }
        }
    }
}
//
// ==================================================================================== //
// END CODE TO ADD FUNCTION FOR SCHEME EMI DEPOSIT PAYMENT @AUTHOR:MADHUREE-07APRIL2021 //
// ==================================================================================== //
//
// ============================================================================================== //
// START CODE TO ADD FUNCTION FOR SCHEME WITH INTEREST PAYMENT PANEL @AUTHOR:MADHUREE-07APRIL2021 //
// ============================================================================================== //
//
function openSchemeWithInterestPopUp(count, DOBDay, DOBMonth, DOBYear, kittyPaidAmt, kittyPaidInterest, kittyTotalPaidAmt, custStaffLoginId, kittyEmiTimePeriod, newKittyRecipitNo, depEMIStatus, kittyPreSerialNum, kittyCustId, kittyFirmId, kittyId, kittyMonDepId, prevSchDepEMIStatus, kittyMetalType, kittyEndDOB, kittyRateAmt, kittyWeight, ktGstAmt, ktTaxableAmt) {
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
    var emiPaidDate = DOBDay + ' ' + DOBMonth + ' ' + DOBYear;
    xmlhttp.open("POST", "include/php/ogschemepop" + default_theme + ".php?count=" + count
            + "&kittyIndicator=schemeWithInterest"
            + "&emiPaidDate=" + emiPaidDate
            + "&custStaffLoginId=" + custStaffLoginId
            + "&kittyPaidAmt=" + kittyPaidAmt
            + "&kittyPaidInterest=" + kittyPaidInterest
            + "&kittyTotalPaidAmt=" + kittyTotalPaidAmt
            + "&kittyCustId=" + kittyCustId
            + "&kittyId=" + kittyId
            + "&kittyEmiTimePeriod=" + kittyEmiTimePeriod
            + "&newKittyRecipitNo=" + newKittyRecipitNo
            + "&depEMIStatus=" + depEMIStatus
            + "&kittyPreSerialNum=" + kittyPreSerialNum
            + "&kittyFirmId=" + kittyFirmId
            + "&kittyMonDepId=" + kittyMonDepId
            + "&prevSchDepEMIStatus=" + prevSchDepEMIStatus
            + "&kittyMetalType=" + kittyMetalType
            + "&kittyEndDOB=" + kittyEndDOB
            + "&kittyRateAmt=" + kittyRateAmt
            + "&kittyWeight=" + kittyWeight
            + "&ktGstAmt=" + ktGstAmt
            + "&ktTaxableAmt=" + ktTaxableAmt, true);
    xmlhttp.send();
}
//
// ============================================================================================ //
// END CODE TO ADD FUNCTION FOR SCHEME WITH INTEREST PAYMENT PANEL @AUTHOR:MADHUREE-07APRIL2021 //
// ============================================================================================ //
//
function openJewelleryPanelPopUpFunction(sttr_sttrin_id, sttr_id) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("info-popup-" + sttr_id).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("info-popup-" + sttr_id).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/stock/omStockJwelleryPanelPopUp" + default_theme + ".php?sttr_sttrin_id=" + sttr_sttrin_id + "&sttr_id=" + sttr_id, true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
}

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO ADD FUNCTIONS FOR MASTER ACCESS PANEL @PRIYANKA-08MAY2021
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
function omMasterAccessSetting(value, acc_check_id, acc_type, acc_aplcatn, staffId) {
    //
    //alert('ms_itm_barcode == ' + document.getElementById("ms_itm_barcode").value);
    //alert('acc_check_id == ' + acc_check_id);
    //alert('acc_type == ' + acc_type);
    //alert('acc_aplcatn == ' + acc_aplcatn);
    //alert('staffId == ' + staffId);
    //
    //var value = document.getElementById("ms_itm_barcode").value;
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("setMasterAccessDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/stock/master/omMasterAccessAd" + default_theme + ".php?acc_check_id=" + acc_check_id +
            "&acc_type=" + acc_type + "&acc_aplcatn=" + acc_aplcatn +
            "&staffId=" + staffId + "&value=" + value, true);
    //
    xmlhttp.send();
    //
}
// 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO ADD FUNCTIONS FOR MASTER ACCESS PANEL @PRIYANKA-08MAY2021
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
function showUserAssignOrdersDetailsDiv(documentRootPath, sttrId, panelName, stockType, mainPanel, transactionPanel, utinId, invPanel, metType) {
    //
    //alert('panelName == ' + panelName);
    //
    loadXMLDoc();
    //
    if (panelName == 'RawDetUpPanel' && (mainPanel == 'Customer' || mainPanel == 'Supplier') &&
            (transactionPanel == 'RawPurchase' || transactionPanel == 'RawSell')) {
        var invoice = invPanel.split(";");
        var preInvoice = invoice[0];
        var invoiceNum = invoice[1];
    }
    //
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'RawDetUpPanel') {
                document.getElementById("assignOrderMainFormDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
        }
    };
    //
    if (panelName == 'RawDetUpPanel') {
        //
        if (panelName == 'RawDetUpPanel' && (mainPanel == 'Customer' || mainPanel == 'Supplier') &&
                (transactionPanel == 'RawPurchase' || transactionPanel == 'RawSell')) {
            xmlhttp.open("POST", documentRootPath + "/include/php/omrwformdv" + default_theme + ".php?rwprId=" + sttrId + "&panelName=RawStock" +
                    "&rawPanelName=" + panelName + "&mainPanel=" + mainPanel + "&transactionPanel=" + transactionPanel +
                    "&preInvNo=" + preInvoice + "&postInvNo=" + invoiceNum + "&metType=" + metType + "", true);
        } else {
            xmlhttp.open("POST", documentRootPath + "/include/php/omrwformdv" + default_theme + ".php?sttr_id=" + sttrId + "&panelName=RawStock" +
                    "&rawPanelName=" + panelName + "&mainPanel=" + mainPanel + "&transactionPanel=" + transactionPanel + "&metType=" + metType + "", true);
        }
        //
        xmlhttp.send();
        //
    }
}
//
//
function changeSMSTemplateDiv(documentRootPath, smsTemplateId) {
    //alert(smsTemplateId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("waMessageContentTempDiv").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omwamesstempdv" + default_theme + ".php?smsTemplateId=" + smsTemplateId, true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
}
//
//
function getStoneStockType(prodCategory, prodName, prodType, firmId) {
    //
    //alert('prodCategory == ' + prodCategory);
    //alert('prodName == ' + prodName);
    //alert('prodType == ' + prodType);
    //alert('firmId == ' + firmId);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("getStoneStockTypeDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omGetStoneStockType" + default_theme + ".php?prodCategory=" + prodCategory +
            "&prodName=" + prodName + "&prodType=" + prodType + "&firmId=" + firmId, true);
    //
    xmlhttp.send();
}
//
//
//
function stoneStockTypeDetailsDisplay(stoneStockType, weightType) {
    //
    //alert('stoneStockType == ' + stoneStockType);
    //alert('weightType == ' + weightType);
    //
    document.getElementById('sttr_stock_type').value = stoneStockType;
    //document.getElementById('sttr_gs_weight_type').value = weightType;
    //document.getElementById('sttr_nt_weight_type').value = weightType;
    //document.getElementById('sttr_pkt_weight_type').value = weightType;
    //
}
//
function getWebcamImageDiv(count, div, imageLoadOption) {
    var documentRootPath = '';
    if (typeof (document.getElementById('documentRootPath').value) != 'undefined' && (document.getElementById('documentRootPath').value != null)) {
        documentRootPath = document.getElementById('documentRootPath').value;
    } else {
        documentRootPath = '';
    }
    document.getElementById('imageLoadOption' + count).value = imageLoadOption;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div + count).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    if (documentRootPath != '') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omwebcamdiv" + default_theme + ".php?count=" + count + "&div=" + div, true);
    } else {
        xmlhttp.open("POST", "include/php/omwebcamdiv" + default_theme + ".php?count=" + count + "&div=" + div, true);
    }
    xmlhttp.send();
}
//START CODE FOR DISPLAY ALL LOANS : AUTHOR @ DARSHANA 7 OCT 2021
function showAllActiveReleseLoansListPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omallnrp" + default_theme + ".php", true);
    xmlhttp.send();
}
//END CODE FOR DISPLAY ALL LOANS : AUTHOR @ DARSHANA 7 OCT 2021
//START CODE FOR DISPLAY ALL LOANS WITH ITEMS DETAILS : AUTHOR @ SARVESH 12 OCT 2021
function showAllLoanWitemPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omallnrpwitems" + default_theme + ".php", true);
    xmlhttp.send();
}
function showReleasedGirviListPanelWithFincYear(currentYear) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omreleaseloanfincyear" + default_theme + ".php?currentYear=" + currentYear, true);
    xmlhttp.send();
}
//END CODE FOR DISPLAY ALL LOANS WITH ITEMS DETAILS :AUTHOR @ SARVESH 12 OCT 2021


//START CODE FOR RELEASED LOAN WITH MORE DETAILS :AUTHOR @ASHWINI 11AUG 2023
function showReleasedGirviListPanelWithMoreDetails() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omreleaseloanwithmoredet" + default_theme + ".php", true);
    xmlhttp.send();
}
//END CODE FOR RELEASED LOAN WITH MORE DETAILS :AUTHOR @ASHWINI 11AUG 2023


function showRawMetalItemDetailsDiv(documentRootPath, sttrId, panelName, stockType, mainPanel, transactionPanel, utinId, invPanel, metType) {
    loadXMLDoc();
    if (panelName == 'RawDetUpPanel' && (mainPanel == 'Customer' || mainPanel == 'Supplier') && (transactionPanel == 'RawPurchase' || transactionPanel == 'RawSell')) {
        var invoice = invPanel.split(";");
        var preInvoice = invoice[0];
        var invoiceNum = invoice[1];
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (transactionPanel == 'AddByInv') {
                document.getElementById("mainAddStockDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'RawDetUpPanel') {
                document.getElementById("rawMetalIssueAddDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'addByItems') {
                document.getElementById("suppPurchaseDivs").innerHTML = xmlhttp.responseText;
            } else if (mainPanel == 'CrystalStockPayment' || mainPanel == 'CrystalStockPayUp') {
                document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
        }
    };
    if (transactionPanel == 'AddByInv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogadstoc" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName + "&stockType=" + stockType + "&stockPanelName=" + panelName + "&invPanel=" + transactionPanel + "&utransInvId=" + utinId, true);
    } else if (mainPanel == 'CrystalStockPayment' || mainPanel == 'CrystalStockPayUp') {
        xmlhttp.open("POST", "include/php/ogcraddv" + default_theme + ".php?sttrId=" + sttrId + "&updatePanelName=" + panelName + "&stockType=" + stockType + "&stockPanelName=" + mainPanel + "&suppPurId=" + transactionPanel + "&utinId=" + utinId, true);
    } else {
        if (panelName == 'RawDetUpPanel') {
            if (panelName == 'RawDetUpPanel' && (mainPanel == 'Customer' || mainPanel == 'Supplier') && (transactionPanel == 'RawPurchase' || transactionPanel == 'RawSell'))
                xmlhttp.open("POST", documentRootPath + "/include/php/omrwmetisue" + default_theme + ".php?rwprId=" + sttrId + "&panelName=RawStock" + "&rawPanelName=" + panelName + "&mainPanel=" + mainPanel + "&transactionPanel=" + transactionPanel + "&preInvNo=" + preInvoice + "&postInvNo=" + invoiceNum + "&metType=" + metType + "", true);
            else
                xmlhttp.open("POST", documentRootPath + "/include/php/omrwmetisue" + default_theme + ".php?sttr_id=" + sttrId + "&panelName=RawStock" + "&rawPanelName=" + panelName + "&mainPanel=" + mainPanel + "&transactionPanel=" + transactionPanel + "&metType=" + metType + "", true);
        } else if (panelName == 'addByItems') {
            xmlhttp.open("POST", documentRootPath + "/include/php/ogwprinv" + default_theme + ".php?sttrId=" + sttrId + "&itemMainPanel=" + panelName + "&itemSubPanel=itemsAddUp", true);
            /**Star Code to Add Condition for Panel Name during updation @Author:SHE21FEB15 **/
        } else if (panelName == 'UpdateCrystal' || panelName == 'CrystalPayUp') {
            xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + sttrId + "&stockType=" + stockType + "&updatePanelName=" + panelName + "&panelName=CrystalPanel", true);
            /**End Code to Add Condition for Panel Name during updation @Author:SHE21FEB15 **/
        } else if (panelName == 'ImitationStockPayUp') {
            xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + sttrId + "&updatePanelName=" + panelName + "&panelName=ImitationStock" + "&stockType=retail", true);
        } else if (panelName == 'StrelleringStockPayUp') { // Code to Add Condition for Sterling Panel @Author:DIKSHA 31DEC2018
            xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + sttrId + "&updatePanelName=" + panelName + "&panelName=StrelleringStock", true);
        } else if (panelName == 'ImitationSearch') {
            xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + sttrId + "&updatePanelName=ImitationStockPayUp&stockType=wholeSale&panelName=ImitationStock&subPanel=" + panelName, true);
        } else {
            xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv" + default_theme + ".php?sttrId=" + sttrId + "&panelName=" + panelName + "&stockType=" + stockType, true);
        }
    }
    xmlhttp.send();
}
//
// ======================================================================================================================================= //
// START CODE TO ADD FUNCTION FOR PERMANENT DELETE & RECATVE OPTION FOR DELETED ITEMS IN 3.0 DELETED STOCK LIST @AUTHOR:MADHUREE-20OCT2021 //
// ======================================================================================================================================= //
//
function stock_transaction_delete_reactive(sttr_sttrin_id, sttr_id, operation) {
    var confirm_msg = '';
    if (operation == 'reactive') {
        confirm_msg = confirm("Do you really want to Reactive this item ?");
    } else {
        confirm_msg = confirm("Do you really want to Delete this item permenantly ?");
    }
    //
    if (confirm_msg == true || confirm_msg == 'true') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/stock/omStockDeleteReactiveItem" + default_theme + ".php?sttr_id=" + sttr_id + "&operation=" + operation, true);
        xmlhttp.send();
    } else {
        return false;
    }
}
//
// ===================================================================================================================================== //
// END CODE TO ADD FUNCTION FOR PERMANENT DELETE & RECATVE OPTION FOR DELETED ITEMS IN 3.0 DELETED STOCK LIST @AUTHOR:MADHUREE-20OCT2021 //
// ===================================================================================================================================== //
//
//START CODE FOR CLOSE FINANCE PAYMENT PANEL : @DARSHANA 23 OCT 2021
function getFinancePopupHide() {
    $("#financeModel").hide();
}
//END CODE FOR CLOSE FINANCE PAYMENT PANEL : @DARSHANA 23 OCT 2021
//
// ============================================================================================================================================= //
// START CODE TO ADD FUNCTION FOR CHANGING THE ACCOUNT ID FOR FIRST MONTH INTEREST DEPOSITE ACCORDING TO MAIN ACCOUNT @AUTHOR:MADHUREE-02DEC2021 //
// ============================================================================================================================================= //
//
function getFirstMonthDepositeAccount() {
    var firstMonthInterestCheck = document.getElementById('selFirstMonthInt').checked;
    if (firstMonthInterestCheck === true || firstMonthInterestCheck === 'true') {
        var mainGirvAccId = document.getElementById('girviPaySelAccountId').value;
        var depositeGirvAccId = document.getElementById('girviDepDrAccId').value;
        //
        if (mainGirvAccId != depositeGirvAccId) {
            document.getElementById('girviDepDrAccId').value = mainGirvAccId;
        }
    }
}
//
// =========================================================================================================================================== //
// END CODE TO ADD FUNCTION FOR CHANGING THE ACCOUNT ID FOR FIRST MONTH INTEREST DEPOSITE ACCORDING TO MAIN ACCOUNT @AUTHOR:MADHUREE-02DEC2021 //
// =========================================================================================================================================== //
// 
// ******************************************************************************************************************************************
// START CODE FOR OPEN USER HOME PANEL : AUTHOR @DARSHANA 15 MARCH 2022
// ******************************************************************************************************************************************
//
function getUserHomePanel(panel, custId) {
//    alert('custId @@ == ' + custId);    
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcdccdd" + default_theme + ".php?panel=" + panel + "&custId=" + custId, true);
    xmlhttp.send();
}
//
// ******************************************************************************************************************************************
// END CODE FOR OPEN USER HOME PANEL : AUTHOR @DARSHANA 15 MARCH 2022
// ******************************************************************************************************************************************
//
// default_theme parameter is appeneded in the .php file by CHETAN 06MAY2022
//
//*******************************************************************************************************
//SSSSSSSSSSSSSSS  START CODE FOR OPEN PANEL FOR UPDATE ALL ACCOUNT @AUTHER : YUVRAJ KAMBLE 14/05/2022 SSSSSSSSSSSSS
//*******************************************************************************************************
function addAccUpdateDiv(count) {
    var totalAccountCount = document.getElementById("totAccountCounter").value;
    var accFirmId = document.getElementById("accFirmId").value;
    totalAccountCount = parseInt(totalAccountCount) + 1;
    document.getElementById("totAccountCounter").value = totalAccountCount;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("AccountAddDiv" + count).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omallcaupdlocdv" + default_theme + ".php?counter=" + count + "&accFirmId=" + accFirmId, true);
    xmlhttp.send();
}
//*******************************************************************************************************
//EEEEEEEEEEEEE END CODE FOR OPEN PANEL FOR UPDATE ALL ACCOUNT @AUTHER : YUVRAJ KAMBLE 14/05/2022 EEEEEEEEEEEEEEEEEE
//*******************************************************************************************************
//
function removeAccUpdateDiv(count) {
    var totalAccountCount = document.getElementById("totAccountCounter").value;
    totalAccountCount = parseInt(totalAccountCount) - 1;
    document.getElementById("totAccountCounter").value = totalAccountCount;
    document.getElementById("AccountMainAddDiv" + count).innerHTML = "";
}
//
function calculateTotalAmount() {
    //
    var totalCRAmt = 0;
    var totalDRAmt = 0;
    var totalAmount = 0;
    //
    var totAccountCounter = document.getElementById("totAccountCounter").value;
    //
    for (accCount = 0; accCount < totAccountCounter; accCount++) {
        var openingAmount = document.getElementById("opening_amt" + accCount).value;
        var openingAmountCRDR = document.getElementById("opening_amt_CRDR" + accCount).value;
        //
        if (openingAmount > 0 && openingAmountCRDR == 'CR') {
            totalCRAmt = parseFloat(parseFloat(totalCRAmt) + parseFloat(openingAmount)).toFixed(2);
        } else if (openingAmount > 0 && openingAmountCRDR == 'DR') {
            totalDRAmt = parseFloat(parseFloat(totalDRAmt) + parseFloat(openingAmount)).toFixed(2);
        }
        //
    }
    //
    totalAmount = parseFloat(parseFloat(totalCRAmt) - parseFloat(totalDRAmt)).toFixed(2);
    //
    if (totalCRAmt == 'NaN' || totalCRAmt == '') {
        totalCRAmt = 0;
    }
    if (totalDRAmt == 'NaN' || totalDRAmt == '') {
        totalDRAmt = 0;
    }
    if (totalAmount == 'NaN' || totalAmount == '') {
        totalAmount = 0;
    }
    //
    document.getElementById("totalDRAmt").value = totalDRAmt;
    document.getElementById("totalCRAmt").value = totalCRAmt;
    document.getElementById("totalAmount").value = totalAmount;
    //
}
//
function getAccFirmIdOnAccUpdatePanel(accFirmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("accountListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omallacupd" + default_theme + ".php?accFirmId=" + accFirmId, true);
    xmlhttp.send();
}
//
function changeAccCRDRType(counter, acc_group) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (xmlhttp.responseText != '') {
                document.getElementById("opening_amt_CRDR" + counter).value = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omgetaccpriacc" + default_theme + ".php?counter=" + counter + "&acc_group=" + acc_group, true);
    xmlhttp.send();

}
//
//
// default_theme parameter is appeneded in the .php file by CHETAN 06MAY2022
//
function calculateAccOpeningBal(opening_amt_desc, counter) {
    //
    var openingBal = 0;
    var amountDescription = opening_amt_desc;
    document.getElementById("opening_amt_desc" + counter).value = amountDescription;
    if (amountDescription != '') {
        openingBal = eval(amountDescription);
    }
    openingBal = (openingBal).toFixed(2);
    //
    if (openingBal == 'NaN' || openingBal == '') {
        openingBal = 0;
    }
    //
    document.getElementById("opening_amt" + counter).value = openingBal;
    //
    calculateTotalAmount();
    //
}
//New js function added for displaying auto updating GOLD and silver rates
function autoUpdateMetalRatesGold(metalArrNum, metalType) {
    loadXMLMetalRates();
    xmlhttpMetalRates.onreadystatechange = function () {
        if (xmlhttpMetalRates.readyState == 4 && xmlhttpMetalRates.status == 200) {
            document.getElementById("metalRatesDiv").innerHTML = xmlhttpMetalRates.responseText;
        }
    };
    xmlhttpMetalRates.open("POST", "include/php/ommrdmrd" + default_theme + ".php?metalArrNum=" + metalArrNum + "&metalType=" + metalType, true);
    xmlhttpMetalRates.send();
}

function autoUpdateMetalRatesSilver(metalArrNum, metalType) {
    loadXMLMetalRates();
    xmlhttpMetalRates.onreadystatechange = function () {
        if (xmlhttpMetalRates.readyState == 4 && xmlhttpMetalRates.status == 200) {
            document.getElementById("metalRatesDiv").innerHTML = xmlhttpMetalRates.responseText;
        }
    };
    xmlhttpMetalRates.open("POST", "include/php/ommrdmrd" + default_theme + ".php?metalArrNum=" + metalArrNum + "&metalType=" + metalType, true);
    xmlhttpMetalRates.send();
}
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
////QQQQQQQQQQQQQQQQQQQQQQQQ START YUVRAJ ADD THIS CODE FOR QUICK SELL MASTER NEW REQUIERMENT 14072022 QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
// ****************************************************************************************
// START CODE FOR STOCK LEDGER PANEL NAVIGATION LEDGER PANEL @AUTHOR:YUVRAJ KAMBLE-25OCT2021
// ****************************************************************************************
function getQuickSellPanel(documentRoot, omquickproduct, panelName) {
    //CHANGE FUNCTION FOR OPEN STOCK LEFGER IN ANOTHER TAB : AUTHOR @DARSHANA 11 NOV 2021
    var url = documentRoot + "/include/php/" + omquickproduct + default_theme + ".php?panelName=" + panelName;
    window.open(url, '_blank');
    document.getElementById('documentRoot').focus();

}
// ****************************************************************************************
// END CODE FOR STOCK LEDGER PANEL NAVIGATION LEDGER PANEL @AUTHOR:YUVRAJ KAMBLE-25OCT2021
// ****************************************************************************************
//
function quickSearchProduct(str, user_id, user_fname, user_lname, user_mobile, panelName, checkboxws, sellAutoEntryvalue) {
//    alert( 'str:- ' + str + 'user_id:- ' + user_id + 'user_fname:- ' + user_fname + 'user_lname:- ' + user_lname + 'user_mobile:- ' + user_mobile + 'panelName:- ' + panelName + 'checkboxws:- ' + checkboxws + 'sellAutoEntryvalue:- ' + sellAutoEntryvalue );
//    quickSearchProduct(this.value, '', '', '', '', 'quickSell', getElementById('checkboxws').value, 'YES');
    var documentRoot = document.getElementById('documentRoot').value;
    var firmId = document.getElementById('firmId').value;
    loadXMLDoc();
    if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
            document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('searchProduct').focus();
                document.getElementById('searchProduct').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquickmastersearchprod" + default_theme + ".php?str=" + str + "&user_id=" + user_id + "&user_fname=" + user_fname + "&user_lname=" + user_lname + "&user_mobile=" + user_mobile + "&panelName=" + panelName + "&firmId=" + firmId + "&sellAutoEntry_value=" + sellAutoEntryvalue, true);
    xmlhttp.send();
}
//
function getquickSearchProductValue(product_id, product_name, product_category, product_sell_price, product_mrp, product_image_id_0, user_id, user_fname, user_lname, user_mobile, panel_name) {
    var documentRoot = document.getElementById('documentRoot').value;
    var checkboxws = document.getElementById('checkboxws').checked;
    //  alert("getquickSearchProductValue:- " + checkboxws);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            document.getElementById('custFirstNameForAddGirvi').value = user_fname.charAt(0).toUpperCase() + user_fname.slice(1);
            document.getElementById('mobileNoToAddGirvi').value = user_mobile;
            document.getElementById("search").value = product_name;
//            document.getElementById('product_display').focus();
            document.getElementById('imageProdQuicksell').focus();
            //         
            if (checkboxws === true || checkboxws === 'true') {
                document.getElementById('WsGSWTInput').focus();
                document.getElementById('checkboxws').checked = true;
            } else {
                document.getElementById('checkboxws').checked = false;
            }
            //

        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?product_id=" + product_id + "&product_name=" + product_name + "&product_category=" + product_category + "&product_sell_price=" + product_sell_price + "&product_mrp=" + product_mrp + "&product_image_id_0=" + product_image_id_0 + "&user_id=" + user_id + "&user_fname=" + user_fname + "&user_lname=" + user_lname + "&user_mobile=" + user_mobile + "&panel_name=" + panel_name, true);
    xmlhttp.send();
}



function refreshquicksellData() {
    var documentRoot = document.getElementById('documentRoot').value;
    var ms_itm_sub_category = document.getElementById('ms_itm_sub_category').value;
    var ms_itm_name = document.getElementById('ms_itm_name').value;
    var ms_itm_image_id_0 = document.getElementById('ms_itm_image_id_0').value;
    var ms_itm_sell_price = document.getElementById('ms_itm_sell_price').value;
    var ms_itm_mrp = document.getElementById('ms_itm_mrp').value;
    var ms_itm_id = document.getElementById('ms_itm_id').value;
    var user_id = document.getElementById('user_id').value;
    var user_fname = document.getElementById('user_fname').value;
    var user_lname = document.getElementById('user_lname').value;
    var user_mobile = document.getElementById('user_mobile').value;
    var firmId = document.getElementById('firmId').value;
    var panel_name = 'quicksell';
    var checkboxws = document.getElementById('checkboxws').checked;
    //
    var poststr = "ms_itm_id=" + ms_itm_id
            + "&ms_itm_sub_category=" + ms_itm_sub_category
            + "&ms_itm_name=" + ms_itm_name
            + "&ms_itm_image_id_0=" + ms_itm_image_id_0
            + "&ms_itm_sell_price=" + ms_itm_sell_price
            + "&ms_itm_mrp=" + ms_itm_mrp
            + "&user_id=" + user_id
            + "&user_fname=" + user_fname
            + "&user_lname=" + user_lname
            + "&user_mobile=" + user_mobile
            + "&firmId=" + firmId
            + "&panel_name=" + panel_name;
//    alert('poststr==' + poststr);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
//      var paymentMsg = 'Payment Done Sucessfully';
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            document.getElementById('custFirstNameForAddGirvi').value = user_fname.charAt(0).toUpperCase() + user_fname.slice(1);
            document.getElementById('mobileNoToAddGirvi').value = user_mobile;
            document.getElementById("productImgSec").innerHTML.reload;
            document.getElementById("leftDiv").innerHTML.reload;
            //
            if (checkboxws === true || checkboxws === 'true') {
                document.getElementById('WsGSWTInput').focus();
                document.getElementById('checkboxws').checked = true;
            } else {
                document.getElementById('checkboxws').checked = false;
            }
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?" + poststr, true);
    xmlhttp.send();
}

function sendquicksellProductDetails(ms_itm_id, qty_indicator, ms_itm_min_qty, panel_name, product_name, newaddcust, ms_itm_mrp, product_category) {
    //
    if (panel_name == '') {
        panel_name = "quicksell";
    }
//    alert("ms_itm_id" + ms_itm_id +"\n" +"qty_indicator" + qty_indicator +"\n" +"ms_itm_min_qty" + ms_itm_min_qty +"\n" +"panel_name" + panel_name +"\n" +"product_name" + product_name +"\n" +"newaddcust" + newaddcust +"\n" + "ms_itm_mrp" + ms_itm_mrp + "\n" + "product_category" + product_category);
    //             
    var documentRoot = document.getElementById('documentRoot').value;
    var custFirstNameForAddGirvi = document.getElementById('custFirstNameForAddGirvi').value;
    var mobileNoToAddGirvi = document.getElementById('mobileNoToAddGirvi').value;
    var user_id = document.getElementById('user_id').value;
    var user_fname = document.getElementById('user_fname').value;
    var user_lname = document.getElementById('user_lname').value;
    var user_mobile = document.getElementById('user_mobile').value;
    var firmId = document.getElementById('firmId').value;
    var discountInputWsInput = document.getElementById('discountInputWsInput').value;
    var qtyInputWsInput = document.getElementById('qtyInputWsInput').value;
    var WsGSWTInput = document.getElementById('WsGSWTInput').value;
    var InputWsPriceInput = document.getElementById('InputWsPriceInput').value;
    var checkboxws = document.getElementById('checkboxws').checked;
    //
    if (checkboxws === true || checkboxws === 'true') {
        document.getElementById('WsGSWTInput').focus();
        document.getElementById("WsGSWTInput").style.border = "1px solid #A5ACB2";
        var ms_itm_mrps = qtyInputWsInput * (WsGSWTInput * InputWsPriceInput);
        var sttr_disc_product_amount = ms_itm_mrps * (discountInputWsInput / 100);
        var poststr = "ms_itm_id=" + ms_itm_id
                + "&user_id=" + user_id
                + "&user_fname=" + user_fname
                + "&user_lname=" + user_lname
                + "&user_mobile=" + user_mobile
                + "&qty_indicator=" + qty_indicator
                + "&panelName=" + panel_name
                + "&discountInputWsInput=" + discountInputWsInput
                + "&qtyInputWsInput=" + qtyInputWsInput
                + "&WsGSWTInput=" + WsGSWTInput
                + "&InputWsPriceInput=" + InputWsPriceInput
                + "&sttr_disc_product_amount=" + sttr_disc_product_amount.toFixed();
        +"&product_name=" + product_name
                + "&firm_id=" + firmId;

    } else {
        var poststr = "ms_itm_id=" + ms_itm_id
                + "&user_id=" + user_id
                + "&user_fname=" + user_fname
                + "&user_lname=" + user_lname
                + "&user_mobile=" + user_mobile
                + "&qty_indicator=" + qty_indicator
                + "&discountInputWsInput=" + discountInputWsInput
                + "&qtyInputWsInput=" + qtyInputWsInput
                + "&panelName=" + panel_name
                + "&product_name=" + product_name
                + "&firm_id=" + firmId;
    }
    //
    if (newaddcust == 'AddNewCustomer') {
        var poststr = "custFirstNameForAddGirvi=" + custFirstNameForAddGirvi
                + "&mobileNoToAddGirvi=" + mobileNoToAddGirvi
                + "&newaddcust=" + newaddcust
                + "&firm_id=" + firmId;
    }
    //
    if (newaddcust == 'SetProductDetail') {
        var poststr = "ms_itm_id=" + ms_itm_id
                + "&ms_itm_mrp=" + ms_itm_mrp
                + "&newaddcust=" + newaddcust
                + "&ms_itm_min_qty=" + ms_itm_min_qty
                + "&user_id=" + user_id
                + "&user_fname=" + user_fname
                + "&user_lname=" + user_lname
                + "&user_mobile=" + user_mobile
                + "&panelName=" + panel_name
                + "&discountInputWsInput=" + discountInputWsInput
                + "&qtyInputWsInput=" + qtyInputWsInput
                + "&WsGSWTInput=" + WsGSWTInput
                + "&InputWsPriceInput=" + InputWsPriceInput
                + "&product_name=" + product_name
                + "&product_category=" + product_category
                + "&qty_increment=" + "1"
                + "&firm_id=" + firmId;
    }
//alert(poststr);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            if (checkboxws === true || checkboxws === 'true') {
                document.getElementById('WsGSWTInput').focus();
                document.getElementById('checkboxws').checked = true;
            } else {
                document.getElementById('checkboxws').checked = false;
            }
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    if (newaddcust == 'SetProductDetail') {
        xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?" + poststr, true);
    } else {
        xmlhttp.open("POST", documentRoot + "/include/php/omAdQuickSell_2" + default_theme + ".php?" + poststr, true);
    }
    xmlhttp.send();
    document.getElementById("productImgSec").innerHTML.reload;
    document.getElementById("leftDiv").innerHTML.reload;
}
//
function getquicksellprodByCategory(ms_itm_group) {
    var documentRoot = document.getElementById('documentRoot').value;
//    alert(ms_itm_name);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
//            document.getElementById('custFirstNameForAddGirvi').value = user_fname.charAt(0).toUpperCase() + user_fname.slice(1);
//            document.getElementById('mobileNoToAddGirvi').value = user_mobile;
//            document.getElementById("search").value = product_category;
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?ms_itm_group_by_cate_sear_btn=" + ms_itm_group, true);
    xmlhttp.send();


}

function checkWSBtn(ValueWSBtn) {
    var documentRoot = document.getElementById('documentRoot').value;
//    alert(ms_itm_name);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            //getUserDetails(document.getElementById("user_id").value, document.getElementById("user_fname").value, '', document.getElementById('mobileNoToAddGirvi').value, '', '', '', '', '', '', '');


        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?ValueWSBtn=" + ValueWSBtn, true);
    xmlhttp.send();
}

function searchQuicksellCustomerName(str_user_name, product_id, product_name, product_category, product_sell_price, product_mrp, product_image_id_0, panel_name) {
    var documentRoot = document.getElementById('documentRoot').value;
//    alert("str_user_name=" + str_user_name + "&product_id=" + product_id + "&product_name=" + product_name + "&product_category=" + product_category + "&product_barcode=" + product_barcode + "&product_hsn_no=" + product_hsn_no + "&product_price=" + product_price + "&panel_name=" + panel_name);
//   alert(str_user_name);
    loadXMLDoc();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("livesearch_customer").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('custNameForAddNew').focus();
                document.getElementById('custNameForAddNew').options[0].selected = true;
            }
        } else {
            //document.getElementById('custNameForAddNew').focus();
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omsearchcustomer" + default_theme + ".php?str_user_name=" + str_user_name + "&product_id=" + product_id + "&product_name=" + product_name + "&product_category=" + product_category + "&product_sell_price=" + product_sell_price + "&product_mrp=" + product_mrp + "&product_image_id_0=" + product_image_id_0 + "&panel_name=" + panel_name, true);
    xmlhttp.send();
}

function searchQuicksellCustomerMobileNo(str_user_mobile, product_id, product_name, product_category, product_sell_price, product_mrp, product_image_id_0, panel_name) {
    var documentRoot = document.getElementById('documentRoot').value;
//       alert(str_user_mobile);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("livesearch_customer_mobile").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('MobileForAddNew').focus();
                document.getElementById('MobileForAddNew').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omsearchcustomerMobile" + default_theme + ".php?str_user_mobile=" + str_user_mobile + "&product_id=" + product_id + "&product_name=" + product_name + "&product_category=" + product_category + "&product_sell_price=" + product_sell_price + "&product_mrp=" + product_mrp + "&product_image_id_0=" + product_image_id_0 + "&panel_name=" + panel_name, true);
    xmlhttp.send();
}
function getQuickSellUserDetails(user_id, user_fname, user_lname, user_mobile, product_id, product_name, product_category, product_sell_price, product_mrp, product_image_id_0, panel_name) {
    var documentRoot = document.getElementById('documentRoot').value;
//    var user_fname = document.getElementById('custFirstNameForAddGirvi').value;
//    var user_mobile = document.getElementById('mobileNoToAddGirvi').value;
//    var girviFirmId = document.getElementById('girviFirmId').value;
//    alert("hiiii");
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            document.getElementById('custFirstNameForAddGirvi').value = user_fname.charAt(0).toUpperCase() + user_fname.slice(1);
            document.getElementById('mobileNoToAddGirvi').value = user_mobile;
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?user_id=" + user_id + "&user_fname=" + user_fname + "&user_lname=" + user_lname + "&user_mobile=" + user_mobile + "&product_id=" + product_id + "&product_name=" + product_name + "&product_category=" + product_category + "&product_sell_price=" + product_sell_price + "&product_mrp=" + product_mrp + "&product_image_id_0=" + product_image_id_0 + "&panel_name=" + panel_name, true);
//    xmlhttp.open("POST", "include/php/omquickProduct"+ default_theme +".php?user_id=" + user_id + "&user_fname=" + user_fname + "&user_lname=" + user_lname+ "&user_mobile=" +user_mobile, true);
    xmlhttp.send();
}

function addCustDirectly(panelDivName, firmName, firmId) {
    var documentRoot = document.getElementById('documentRoot').value;
    var custFirstNameForAddGirvi = document.getElementById('custFirstNameForAddGirvi').value;
    var mobileNoToAddGirvi = document.getElementById('mobileNoToAddGirvi').value;
    document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    document.getElementById("directAddCustButton").style.visibility = "hidden";
    var genderObj = document.getElementsByName('gender');
    for (var i = 0; i < genderObj.length; i++) {
        if (genderObj[i].checked == true)
            gender = genderObj[i].value;
    }
    if (valDirectAddCustInputsQuickSellNew(firmName)) {
        var poststr = "firstName=" + encodeURIComponent(custFirstNameForAddGirvi)
                + "&mobileNoToAddGirvi=" + encodeURIComponent(mobileNoToAddGirvi)
                + "&firmId=" + encodeURIComponent(firmId)
                + "&panelDivName=" + encodeURIComponent(panelDivName)
                + "&directAddCust=" + encodeURIComponent("YES");
        //
        direct_add_cust_quickSell_New('omcaadcs.php', poststr);
        alert("User Added Successfull.");
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "hidden";
    }
    document.getElementById("leftDiv").innerHTML.reload;
    getAddUserDetailquick();
}

function valDirectAddCustInputsQuickSellNew(firmName) {
    if (validateEmptyField(document.getElementById("custFirstNameForAddGirvi").value, "Please enter First Name!") == false) {
        document.getElementById("custFirstNameForAddGirvi").focus();
        return false;
    }
    if (validateSelectField("India", "Please Select Country Name Or Set Default Country from Settings Panel!") == false) {
        document.getElementById("custCountryForAddGirvi").focus();
        return false;
    }
    if (validateSelectField('Maharashtra', "Please Select State Name Or Set Default State from Settings Panel!") == false) {
        document.getElementById("custStateForAddGirvi").focus();
        return false;
    } else if (validateSelectField(firmName, "Please select Firm Name!") == false) {
        document.getElementById("girviFirmId").focus();
        return false;
    } else if (((document.getElementById("mobileNoToAddGirvi").value != 'Enter Mobile Number') && (document.getElementById("mobileNoToAddGirvi").value != ''))
            && ((validateNumWithUnderScore(document.getElementById("mobileNoToAddGirvi").value, "Accept only Numbers without space character!") == false ||
                    validateLength10(document.getElementById("mobileNoToAddGirvi").value, "Mobile number length should be minimum 10!") == false))) {
        document.getElementById("mobileNoToAddGirvi").focus();
        return false;
    }
    if (document.getElementById("mobileNoToAddGirvi").value != '') {
        result = checkvaluequicksell(document.getElementById("mobileNoToAddGirvi").value, '', '', '');
        if (result != 'success') {
            alert("Duplicate Mobile No ! Please Enter Different Mobile No !");
            return false;
        }
    }
    if (document.getElementById("custEmailForAddGirvi").value != '') {
        result = checkvalue('', document.getElementById("custEmailForAddGirvi").value, '', '', '', '', 'checkemail');
        if (result != 'success') {
            alert("Duplicate Email Id ! Please Enter Different Email Id !");
            return false;
        }
    }
    return true;
}
//
function direct_add_cust_quickSell_New(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertDirectAddCustQuickSellNew;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
//
function alertDirectAddCustQuickSellNew() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainMiddle").style.visibility = "visible";
    } else {
        document.getElementById("ajaxLoadSrchCustToAddGirviDiv").style.visibility = "visible";
    }
}
//
function getAddUserDetailquick() {
    var documentRoot = document.getElementById('documentRoot').value;
    var custFirstNameForAddGirvi = document.getElementById('custFirstNameForAddGirvi').value;
    var mobileNoToAddGirvi = document.getElementById('mobileNoToAddGirvi').value;
//    alert("custFirstNameForAddGirvi:- "+ custFirstNameForAddGirvi + "mobileNoToAddGirvi :- " + mobileNoToAddGirvi);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            var UserDetails = xmlhttp.responseText;
            var UserArray = UserDetails.split('#');
            document.getElementById("user_id").value = UserArray[0];
            document.getElementById("user_fname").value = UserArray[1];
            document.getElementById('custFirstNameForAddGirvi').value = UserArray[1];
            document.getElementById('mobileNoToAddGirvi').value = UserArray[2];
            getUserDetails(UserArray[0], UserArray[1], '', UserArray[2], '', '', '', '', '', '', '');
            document.getElementById('search').focus();
            //
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omgetquiaddcust" + default_theme + ".php?custFirstNameForAddGirvi=" + custFirstNameForAddGirvi, true);
    xmlhttp.send();
}

function checkvaluequicksell(userMobile, userEmail, userLoginId, userId, panelName) {
    //
    var result = "";
    //
    if (panelName === 'visitorPanel') {
        $.ajax({
            async: false,
            type: "POST",
            url: "omusercheck" + default_theme + ".php",
            data: {userMobile: userMobile, userEmail: userEmail, userLoginId: userLoginId, userId: userId},
            success: function (data) {
                if (data == 'success')
                    $("#userAlerts").html('');
                else
                    $("#userAlerts").html(data);
//            alert(data);
                result = data;
            }
        });
    } else {
        $.ajax({
            async: false,
            type: "POST",
            url: "omusercheck" + default_theme + ".php",
            data: {userMobile: userMobile, userEmail: userEmail, userLoginId: userLoginId, userId: userId},
            success: function (data) {
                if (data == 'success')
                    $("#userAlerts").html('');
                else
                    $("#userAlerts").html(data);
//            alert(data);
                result = data;
            }
        });
    }
    return result;
}

function updateCustomerQuickSellNew(custId) {
    var documentRoot = document.getElementById('documentRoot').value;
//    alert(custId);
    var custFirstNameForAddGirvi = document.getElementById('custFirstNameForAddGirvi').value;
    var mobileNoToAddGirvi = document.getElementById('mobileNoToAddGirvi').value;
    var poststr = "custId=" + custId
            + "&custFirstNameForAddGirvi=" + custFirstNameForAddGirvi
            + "&mobileNoToAddGirvi=" + mobileNoToAddGirvi;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            var UserDetails = xmlhttp.responseText;
            var UserArray = UserDetails.split('#');
            document.getElementById("custFirstNameForAddGirvi").value = UserArray[1];
            document.getElementById("mobileNoToAddGirvi").value = UserArray[2];
            document.getElementById("updateCustomer").innerHTML = xmlhttp.responseText;
            document.getElementById("productImgSec").innerHTML.reload;
            document.getElementById("leftDiv").innerHTML.reload;
            getUserDetails(document.getElementById("user_id").value, document.getElementById("custFirstNameForAddGirvi").value, '', document.getElementById('mobileNoToAddGirvi').value, '', '', '', '', '', '', '');

        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omCustomerUpdateQuickSell" + default_theme + ".php?" + poststr, true);
    xmlhttp.send();
}

function getAddUserDetailAddBtnquickSell() {
    var documentRoot = document.getElementById('documentRoot').value;
    var mobileNoToAddGirvi = document.getElementById('mobileNoToAddGirvi').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            var UserDetails = xmlhttp.responseText;
            var UserArray = UserDetails.split('#');
            document.getElementById("user_id").value = UserArray[0];
            document.getElementById("user_fname").value = UserArray[1];
//            document.getElementById("tempVarFordisplayDiv").value = UserArray[2];
            document.getElementById('custFirstNameForAddGirvi').value = UserArray[1];
            document.getElementById('custFirstNameForAddGirvi').focus();
            document.getElementById('search').focus();
//            tempVarFordisplayDiv = "show"; 
//            document.getElementById('mobileNoToAddGirvi').value = mobileNoToAddGirvi;

//            alert(tempVarFordisplayDiv);

            //
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omgetquiaddcust" + default_theme + ".php", true);
//    xmlhttp.open("POST", documentRoot + "/include/php/omgetquiaddcust" + default_theme + ".php?tempVarFordisplayDiv=" + tempVarFordisplayDiv, true);
    xmlhttp.send();
}

function getquickByCategoryProductValue(product_id, product_name, product_category, product_sell_price, product_mrp, product_image_id_0, user_id, user_fname, user_lname, user_mobile, panel_name) {
    var documentRoot = document.getElementById('documentRoot').value;
    var checkboxws = document.getElementById('checkboxws').checked;
//    alert(product_category);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            document.getElementById('custFirstNameForAddGirvi').value = user_fname.charAt(0).toUpperCase() + user_fname.slice(1);
            document.getElementById('mobileNoToAddGirvi').value = user_mobile;
            document.getElementById("search").value = product_name;
            if (checkboxws === true || checkboxws === 'true') {
                document.getElementById('checkboxws').checked = true;
            } else {
                document.getElementById('checkboxws').checked = false;
            }
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?product_id=" + product_id + "&product_category=" + product_category + "&product_sell_price=" + product_sell_price + "&product_mrp=" + product_mrp + "&product_image_id_0=" + product_image_id_0 + "&user_id=" + user_id + "&user_fname=" + user_fname + "&user_lname=" + user_lname + "&user_mobile=" + user_mobile + "&panel_name=" + panel_name, true);
    xmlhttp.send();
}
//
function setDefaultCashUserNew() {

    var documentRoot = document.getElementById('documentRoot').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            var cashUserDetails = xmlhttp.responseText;
            var UserArray = cashUserDetails.split('#');
            if (UserArray[1] == null || UserArray[1] == '') {
                alert('Please Add New CASH User to set as Default');
                document.getElementById('custFirstNameForAddGirvi').value = "CASH";
                document.getElementById("directAddCustBtn").focus();
                return false;
            }
            document.getElementById("user_id").value = UserArray[0];
            document.getElementById("user_fname").value = UserArray[1];
            document.getElementById('custFirstNameForAddGirvi').value = UserArray[1];
            document.getElementById('mobileNoToAddGirvi').value = UserArray[2];
            document.getElementById('directAddCustBtn').focus();
//            refreshquicksellData();
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omQuickSetDefaultCashUser" + default_theme + ".php", true);
    xmlhttp.send();
}


function getUserDetailsAddBtun(product_id, product_name, product_price) {
//    alert("product_id :- " + product_id );
    var documentRoot = document.getElementById('documentRoot').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
//            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?product_id=" + product_id + "&product_name=" + product_name + "&product_price=" + product_price, true);
    xmlhttp.send();
}
//
function sendDetailsPaymentNew(finalvaluation, userid, firm_id, panelName) {
    var documentRoot = document.getElementById('documentRoot').value;
    var sttr_pre_invoice_no_1 = document.getElementById('sttr_pre_invoice_no_1').value;
    var sttr_invoice_no_1 = document.getElementById('sttr_invoice_no_1').value;
    var sttr_id = document.getElementById('slPrId').value;
    var CgstPer = document.getElementById('CgstPer').value;
    var SgstPer = document.getElementById('SgstPer').value;
    var IgstPer = document.getElementById('IgstPer').value;
    var TaxPer = document.getElementById('TaxPer').value;

//        alert('sttr_invoice_no_1===' + sttr_invoice_no_1  + 'sttr_id===' + sttr_id + 'CgstPer===' + CgstPer + 'SgstPer===' + SgstPer + 'IgstPer===' + IgstPer + 'panelName===' + panelName );


    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("paymentTaxQuickSellBody").innerHTML = xmlhttp.responseText;
            document.getElementById('paymentTaxQuickSell').style.display = 'block';
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquicksellpaypopup" + default_theme + ".php?finalvaluation=" + finalvaluation + "&userid=" + userid + "&firm_id=" + firm_id + "&sttr_pre_invoice_no_1=" + sttr_pre_invoice_no_1 + "&sttr_invoice_no_1=" + sttr_invoice_no_1 +
            "&panelName=" + panelName + "&sttr_id=" + sttr_id + "&CgstPer=" + CgstPer + "&SgstPer=" + SgstPer + "&IgstPer=" + IgstPer + "&TaxPer=" + TaxPer, true);
    xmlhttp.send();
}
//*********** start Button Add funct for quick sell pay button direct payment option @yuvraj 20092022 *************
function sendDirectPaymentDetails(finalvaluation, userid, firm_id, panelName) {
    var documentRoot = document.getElementById('documentRoot').value;
    var sttr_pre_invoice_no_1 = document.getElementById('sttr_pre_invoice_no_1').value;
    var sttr_invoice_no_1 = document.getElementById('sttr_invoice_no_1').value;
    var sttr_id = document.getElementById('slPrId').value;
    var CgstPer = document.getElementById('CgstPer').value;
    var SgstPer = document.getElementById('SgstPer').value;
    var IgstPer = document.getElementById('IgstPer').value;
    var TaxPer = document.getElementById('TaxPer').value;

    alert('sttr_invoice_no_1===' + sttr_invoice_no_1 + 'sttr_id===' + sttr_id + 'CgstPer===' + CgstPer + 'SgstPer===' + SgstPer + 'IgstPer===' + IgstPer + 'panelName===' + panelName);


    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("paymentTaxQuickSellBody").innerHTML = xmlhttp.responseText;
            document.getElementById('paymentTaxQuickSell').style.display = 'block';
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquicksellpaypopup" + default_theme + ".php?finalvaluation=" + finalvaluation + "&userid=" + userid + "&firm_id=" + firm_id + "&sttr_pre_invoice_no_1=" + sttr_pre_invoice_no_1 + "&sttr_invoice_no_1=" + sttr_invoice_no_1 +
            "&panelName=" + panelName + "&sttr_id=" + sttr_id + "&CgstPer=" + CgstPer + "&SgstPer=" + SgstPer + "&IgstPer=" + IgstPer + "&TaxPer=" + TaxPer, true);
    xmlhttp.send();
}
//*********** end Button Add funct for quick sell pay button direct payment option @yuvraj 20092022 *************
function hidepaymentTaxQuickSelldiv() {
    var hide = document.getElementById('paymentTaxQuickSell');
    if (hide.style.display === "none") {
        hide.style.display = "block";
    } else {
        hide.style.display = "none";
    }
}
//
function getWSUserProductAndDetails(user_id, user_fname, user_lname, user_mobile, product_id, product_name, product_category, product_barcode, product_hsn_no, product_price, panel_name) {
    var documentRoot = document.getElementById('documentRoot').value;
    var btnWeightIndw = document.getElementById('checkboxws').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            if (btnWeightIndw == 'on') {
                document.getElementById('checkboxws').value = 'off';
//    document.getElementById('checkboxws').checked = false;
            } else {
                document.getElementById('checkboxws').value = 'on';
//    document.getElementById('checkboxws').checked = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?user_id=" + user_id + "&user_fname=" + user_fname + "&user_lname=" + user_lname + "&user_mobile=" + user_mobile + "&product_id=" + product_id + "&product_name=" + product_name + "&product_category=" + product_category + "&product_barcode=" + product_barcode + "&product_hsn_no=" + product_hsn_no + "&product_price=" + product_price + "&panel_name=" + panel_name + "&btnWeightInd=" + btnWeightIndw, true);
//    xmlhttp.open("POST", "include/php/omquickProduct"+ default_theme +".php?user_id=" + user_id + "&user_fname=" + user_fname + "&user_lname=" + user_lname+ "&user_mobile=" +user_mobile, true);
    xmlhttp.send();
}

function getWeightFromWeighingScaleQuickSell(elementId, elementId2) {
    var documentRoot = document.getElementById('documentRoot').value;
//        alert('hiiii');
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
//          document.getElementById('qtyInputWsGSWTInput').value = xmlhttp.responseText;
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            document.getElementById('WsGSWTInput').value = elementId;
            document.getElementById('WsGSWTInput').focus();
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/system/omsswtsc.php", true);
    xmlhttp.send();
}

//FUNCTION FOR PAYMENT PANEL CALCULATION
function getPayCalculationQuickSell() {
    var tax_by_val = document.getElementById('tax_by_val').value;
    var cgstPer = document.getElementById('cgst_input').value;
    var sgstPer = document.getElementById('sgst_input').value;
    var igstPer = document.getElementById('igst_input').value;
    var taxPer = document.getElementById('tax_input').value;
    var fianlAmt = document.getElementById('fianlAmt').value;
    var taxgst = document.getElementById('taxgst').value;
    //
    //Calculate Tax when default loaded according to GST on quick sell payment popup @Mangesh
    var quickSellCgstCheck_val = document.getElementById('quickSellCgstCheck').value;
    var quickSelligstCheck_val = document.getElementById('quickSelligstCheck').value;
//    document.getElementById('balance_amt').innerHTML = fianlAmt.toFixed(2);
    var fixdeAmt = fianlAmt;
    var taxableamt = fianlAmt;
    if (taxgst == 'GST') {
        var cgst = document.getElementById('cgst').value;
        var igst = document.getElementById('igst').value;
        if (cgst == 'checked' || quickSellCgstCheck_val == 'checked') {
            var cgst_amt = (fianlAmt * cgstPer) / 100;
            var sgst_amt = (fianlAmt * sgstPer) / 100;
        } else {
            var cgst_amt = (0.00).toFixed(2);
            var sgst_amt = (0.00).toFixed(2);
            cgstPer = 0;
            sgstPer = 0;
        }
        if (igst == 'checked' || quickSelligstCheck_val == 'checked') {
            var igst_amt = (fianlAmt * igstPer) / 100;
        } else {
            var igst_amt = (0.00).toFixed(2);
            igstPer = 0;
        }
    }
//    var igst_amt = (fianlAmt * igstPer) / 100;
    if (taxgst == 'TAX') {
        var tax_vat = document.getElementById('tax_vat').value;
        if (tax_vat == 'checked') {
            var tax_amt = (fianlAmt * taxPer) / 100;
        } else {
            var tax_amt = (0.00).toFixed(2);
            taxPer = (0.00).toFixed(2);
        }
    }

    if (tax_by_val == 'checked') {

//        alert(tax_by_val);
        if (taxgst == 'GST') {
            if (cgstPer > 0) {
                taxableamt = parseFloat(((100 * parseFloat(taxableamt)) / (100 + parseFloat(cgstPer) + parseFloat(sgstPer)))).toFixed(2);
//                alert('fianlAmt' + taxableamt);
            }
            if (igstPer > 0) {
                taxableamt = parseFloat(((100 * parseFloat(taxableamt)) / (100 + parseFloat(igstPer)))).toFixed(2);
            }
            document.getElementById('amount_tax').innerHTML = parseFloat(taxableamt).toFixed(2);
            document.getElementById('amt_with_tax').value = parseFloat(taxableamt).toFixed(2);
        }
        if (taxgst == 'TAX') {
            if (taxPer > 0) {
                taxableamt = parseFloat(((100 * parseFloat(taxableamt)) / (100 + parseFloat(taxPer)))).toFixed(2);
//                alert(taxableamt);
            }
            document.getElementById('amount_tax').innerHTML = parseFloat(taxableamt).toFixed(2);
            document.getElementById('amt_with_tax').value = parseFloat(taxableamt).toFixed(2);
        }
//        alert(taxableamt);
//        document.getElementById('amount_tax').innerHTML = taxableamt;
        var taxgst = document.getElementById('taxgst').value;
        if (taxgst == 'GST') {
            if (cgst == 'checked' || quickSellCgstCheck_val == 'checked') {
                document.getElementById('cgst_amt').value = cgst_amt.toFixed(2);
                document.getElementById('sgst_amt').value = sgst_amt.toFixed(2);
            }
            if (igst == 'checked' || quickSelligstCheck_val == 'checked') {
                document.getElementById('igst_amt').value = igst_amt.toFixed(2);
            }
            var totalTax = Number(cgst_amt) + Number(sgst_amt) + Number(igst_amt);
        }
        if (taxgst == 'TAX') {
            if (tax_vat == 'checked') {
                document.getElementById('tax_amt').value = tax_amt.toFixed(2);
            }
            var totalTax = Number(tax_amt)
        }
        document.getElementById('total_tax').innerHTML = totalTax.toFixed(2);
//         document.getElementById('amount_tax').innerHTML = fianlAmt.toFixed(2);
//        document.getElementById('cgst_amt').value = cgst_amt.toFixed(2);
//        document.getElementById('sgst_amt').value = sgst_amt.toFixed(2);
//        document.getElementById('igst_amt').value = igst_amt.toFixed(2);
//        document.getElementById('tax_amt').value = tax_amt.toFixed(2);

        var finalamtdisc = fianlAmt;

        var discOption = document.getElementById('disc_option').value;
        if (document.getElementById('discPer').value == 'NaN')
        {
            document.getElementById('discPer').value = 0;
        }
//        if (discOption === 'btax') {
//            var discPer = document.getElementById('discPer').value;
//            var total_discount = (finalamtdisc * discPer) / 100;
//            document.getElementById('discAmt').value = total_discount.toFixed(2);
//            fianlAmt = finalamtdisc - total_discount;
//        } else if (discOption === 'atax' || discOption == '') {
//            if ((document.getElementById('discPer').value == '' && document.getElementById('discAmt').value != 0)) {
////                alert('bye');
//                var total_discount = document.getElementById('discAmt').value;
//                discPer = (parseFloat(total_discount) * 100 / fianlAmt).toFixed(2);
//                document.getElementById('discPer').value = discPer;
//            } else {
////                alert('hii');
//                var discPer = document.getElementById('discPer').value;
//                var total_discount = (fianlAmt * discPer) / 100;
//                document.getElementById('discAmt').value = total_discount.toFixed(2);
//            }
//            fianlAmt = fianlAmt - total_discount;
//        }
//        else if (discPer == '' || discPer == 'NaN' || discPer == '0.00' || discOption == '') {
//            var discount_amt = document.getElementById('discAmt').value;
////            alert('discount_amt'+discount_amt);
//            discPer = (parseFloat(discount_amt) * 100 / fianlAmt).toFixed(2);
//            document.getElementById('discPer').value = discPer;
////            alert('discPer'+discPer);
//            fianlAmt = fianlAmt - discount_amt;
//        }
        var total_discount = document.getElementById('discAmt').value;
        fianlAmt = fianlAmt - total_discount;

        var cash = document.getElementById('cash_amt').value;
        document.getElementById('cash_amt').value = cash;

        var bank = document.getElementById('chq_amt').value;
        var card = document.getElementById('card_amt').value;
        var online = document.getElementById('online_amt').value;
        var total = Number(cash) + Number(bank) + Number(card) + Number(online);
        document.getElementById('total_amt').innerHTML = total.toFixed(2);
        var balance = fianlAmt - total;

        var roundOffAmt = 0;

        if (roundOffquickSell(balance) > 0) {
            roundOffAmt = roundOffquickSell(balance);
            var rndOffAmt = (1 - roundOffAmt);

            document.getElementById('balance_amt').innerHTML = balance.toFixed(2);
        } else {
            document.getElementById('balance_amt').innerHTML = balance.toFixed(2);
        }
    } else {
//        alert(tax_by_val);
        var taxgst = document.getElementById('taxgst').value;
        document.getElementById('amount_tax').innerHTML = taxableamt;

        var taxgst = document.getElementById('taxgst').value;
        if (taxgst == 'GST') {
            var cgst = document.getElementById('cgst').value;
            if (cgst == 'checked' || quickSellCgstCheck_val == 'checked') {
//                alert(cgst)
                var cgst_amt = (fianlAmt * cgstPer) / 100;
                var sgst_amt = (fianlAmt * sgstPer) / 100;
                document.getElementById('cgst_amt').value = cgst_amt.toFixed(2);
                document.getElementById('sgst_amt').value = sgst_amt.toFixed(2);
            } else {
                var cgst_amt = (0.00).toFixed(2);
                var sgst_amt = (0.00).toFixed(2);
                cgstPer = 0;
                sgstPer = 0;
            }
            var igst = document.getElementById('igst').value;
//            alert(igst);
            if (igst == 'checked' || quickSelligstCheck_val == 'checked') {
//                alert(igst+"2");
                var igst_amt = (fianlAmt * igstPer) / 100;
                document.getElementById('igst_amt').value = igst_amt.toFixed(2);
            } else {
                var igst_amt = (0.00).toFixed(2);
                igstPer = 0;
            }
            var totalTax = Number(cgst_amt) + Number(sgst_amt) + Number(igst_amt);
        }
        if (taxgst == 'TAX') {
            if (tax_vat == 'checked') {
                var tax_amt = (fianlAmt * taxPer) / 100;
                document.getElementById('tax_amt').value = tax_amt.toFixed(2);
            } else {
                var tax_amt = (0.00).toFixed(2);
                taxPer = (0.00).toFixed(2);
            }
            var totalTax = Number(tax_amt);
        }
//        var totalTax = Number(cgst_amt) + Number(sgst_amt) + Number(igst_amt) + Number(tax_amt);
//        alert(totalTax);
        fianlAmt = Number(fianlAmt) + totalTax;
        document.getElementById('amount_tax').innerHTML = fianlAmt.toFixed(2);
        document.getElementById('amt_with_tax').value = fianlAmt.toFixed(2);
//        document.getElementById('cgst_amt').value = cgst_amt.toFixed(2);
//        document.getElementById('sgst_amt').value = sgst_amt.toFixed(2);
//        document.getElementById('igst_amt').value = igst_amt.toFixed(2);
//        document.getElementById('tax_amt').value = tax_amt.toFixed(2);

        var finalamtdisc = fianlAmt;

        document.getElementById('total_tax').innerHTML = totalTax.toFixed(2);

        var fianlAmt_with_tax = fianlAmt;
        document.getElementById('amount_tax').innerHTML = fianlAmt_with_tax.toFixed(2);
//        document.getElementById('cgst_amt').value = cgst_amt.toFixed(2);
//        document.getElementById('sgst_amt').value = sgst_amt.toFixed(2);
//        document.getElementById('igst_amt').value = igst_amt.toFixed(2);
//        document.getElementById('tax_amt').value = tax_amt.toFixed(2);

        var discOption = document.getElementById('disc_option').value;
        if (document.getElementById('discPer').value == 'NaN')
        {
            document.getElementById('discPer').value = 0;
        }
//        var discPer = document.getElementById('discPer').value;
//        if (discOption === 'btax') {
//            var total_discount = (finalamtdisc * discPer) / 100;
//            document.getElementById('discAmt').value = total_discount.toFixed(2);
//            fianlAmt = finalamtdisc - total_discount;
//        } else if (discOption === 'atax' || discOption == '') {
//            if ((document.getElementById('discPer').value == '' && document.getElementById('discAmt').value != 0)) {
////                alert('bye');
//                var total_discount = document.getElementById('discAmt').value;
//                discPer = (parseFloat(total_discount) * 100 / fianlAmt).toFixed(2);
//                document.getElementById('discPer').value = discPer;
//            } else if ((document.getElementById('discPer').value != 0 && document.getElementById('discAmt').value == '')) {
////                alert('hii');
//                var discPer = document.getElementById('discPer').value;
//                var total_discount = (fianlAmt * discPer) / 100;
//                document.getElementById('discAmt').value = total_discount.toFixed(2);
//            }
//            fianlAmt = fianlAmt - total_discount;
//        }
//        else if (discPer == '' || discPer == 'NaN' || discPer == '0.00' || discOption == '') {
//            var discount_amt = document.getElementById('discAmt').value;
////            alert('discount_amt'+discount_amt);
//            discPer = (parseFloat(discount_amt) * 100 / fianlAmt).toFixed(2);
//            document.getElementById('discPer').value = discPer;
////            alert('discPer'+discPer);
//            fianlAmt = fianlAmt - discount_amt;
//        }
        var total_discount = document.getElementById('discAmt').value;
        fianlAmt = fianlAmt - total_discount;

        var cash = document.getElementById('cash_amt').value;
        document.getElementById('cash_amt').value = cash;
        var bank = document.getElementById('chq_amt').value;
        var card = document.getElementById('card_amt').value;
        var online = document.getElementById('online_amt').value;
        var total = Number(cash) + Number(bank) + Number(card) + Number(online);
        document.getElementById('total_amt').innerHTML = total.toFixed(2);
        var balance = fianlAmt - total;
        var roundOffAmt = 0;
        if (roundOffquickSell(balance) > 0) {
            roundOffAmt = roundOffquickSell(balance);
            var rndOffAmt = (1 - roundOffAmt);
            document.getElementById('balance_amt').innerHTML = balance.toFixed(2);
        } else {
            document.getElementById('balance_amt').innerHTML = balance.toFixed(2);
        }
    }
}

function calDiscountByPerQuickSell() {
    var discOption = document.getElementById('disc_option').value;
    var discPer = document.getElementById('discPer').value;
    if (discOption === 'btax') {
        var fianlAmt = document.getElementById('fianlAmt').value;
        var total_discount = (fianlAmt * discPer) / 100;
        document.getElementById('discAmt').value = total_discount.toFixed(2);
//        fianlAmt = fianlAmt - total_discount;
    } else {
        var fianlAmt = document.getElementById('amt_with_tax').value;
        var discPer = document.getElementById('discPer').value;
        var total_discount = (fianlAmt * discPer) / 100;
//        alert('total_discount' + total_discount);
        document.getElementById('discAmt').value = total_discount.toFixed(2);
//        fianlAmt = fianlAmt - total_discount;
    }
    getPayCalculationQuickSell();
    return total_discount;
}

function calDiscountByAmtQuickSell() {
    var discOption = document.getElementById('disc_option').value;
    var discPer = document.getElementById('discPer').value;
    var fianlAmt = 0;
    if (discOption == 'btax' || discOption == 'atax' || discOption == '') {
        fianlAmt = document.getElementById('amt_with_tax').value;
//        alert('fianlAmt' + fianlAmt);
        var total_discount = document.getElementById('discAmt').value;
        discPer = (parseFloat(total_discount) * 100 / fianlAmt).toFixed(2);
        document.getElementById('discPer').value = discPer;
    }
//    fianlAmt = fianlAmt - total_discount;

    getPayCalculationQuickSell();

    return discPer;
}

function roundOffquickSell(value) {
    return (value % 1).toFixed(2); // This function return the fraction value
}

//FUNCTION FOR SEND PAYMENT DETAILS FOR FINAL PAYMENT PANEL
function sendPaymentRequestQuickSell(finalvaluation, userid, firm_id, panelName, types) {
//     alert('finalvaluation===' + finalvaluation + 'userid ===' + userid + 'firm_id===' + firm_id + 'panelName===' + panelName + 'types== ' + types);
    var documentRoot = document.getElementById('documentRoot').value;

    if (finalvaluation == 'undefined' || finalvaluation == null) {
        var firm_id = document.getElementById('firm_id').value;
        var final_amt = document.getElementById('final_amt').value;
        var user_id = document.getElementById('user_id').value;
        var panelName = document.getElementById('panelName').value;
        //
        var balance = document.getElementById('balance_amt').innerHTML;
        var total = document.getElementById('total').value;
        var cgst = document.getElementById('cgst').value;
        //
        var sgst;
        if (cgst == 'checked') {
            sgst = cgst;
        }
//    var sgst = document.getElementById('sgst').value;
        var igst = document.getElementById('igst').value;
        if (igst == 'igst') {
            igst = 'unchecked';
        }
        //    var tax_vat = document.getElementById('tax_vat').value;
        var cgst_input = document.getElementById('cgst_input').value;
        var cgst_amt = document.getElementById('cgst_amt').value;
        var sgst_input = document.getElementById('sgst_input').value;
        var sgst_amt = document.getElementById('sgst_amt').value;
        var igst_input = document.getElementById('igst_input').value;
        var igst_amt = document.getElementById('igst_amt').value;
        var tax_by_val = document.getElementById('tax_by_val').value;
        if (tax_by_val == 'on') {
            tax_by_val = '';
        }
        var tax_input = document.getElementById('tax_input').value;
        var tax_amt = document.getElementById('tax_amt').value;
        var cashNarration = document.getElementById('cashNarration').value;
        var cash_amt = document.getElementById('cash_amt').value;
        var slPrPayAccId = document.getElementById('slPrPayAccId').value;
        var slPrPayChequeAccId = document.getElementById('slPrPayChequeAccId').value;
        var slPrPayCardAccId = document.getElementById('slPrPayCardAccId').value;
        var slPrPayOnlinePaymentAccId = document.getElementById('slPrPayOnlinePaymentAccId').value;
        var slPrPayDiscAccId = document.getElementById('slPrPayDiscAccId').value;
        var chequeNo = document.getElementById('chequeNo').value;
        var chq_amt = document.getElementById('chq_amt').value;
        var cardNo = document.getElementById('cardNo').value;
        var card_amt = document.getElementById('card_amt').value;
        var onlinePaymentNarration = document.getElementById('onlinePaymentNarration').value;
        var online_amt = document.getElementById('online_amt').value;
        var disc_option = document.getElementById('disc_option').value;
        var discPer = document.getElementById('discPer').value;
        var discAmt = document.getElementById('discAmt').value;
        var utin_dr_acc_id = document.getElementById('utin_dr_acc_id').value;
        var utin_cr_acc_id = document.getElementById('utin_cr_acc_id').value;
        var cgst_acc_id = document.getElementById('cgst_acc_id').value;
        var sgst_acc_id = document.getElementById('sgst_acc_id').value;
        var igst_acc_id = document.getElementById('igst_acc_id').value;
        var invoice_pr_id = document.getElementById('invoice_pr_id').value;
        var invoice_num = document.getElementById('invoice_num').value;
        var sttr_panel_name = document.getElementById('sttr_panel_name').value;
        var firm_type = document.getElementById('firm_type').value;
        var mkg_acc_id = document.getElementById('mkg_acc_id').value;
        var tax_acc_id = document.getElementById('tax_acc_id').value;
        var curch_acc_id = document.getElementById('curch_acc_id').value;

    } else {
        var final_amt = finalvaluation;
        var user_id = userid;
        var firm_id = firm_id;
        var panelName = panelName;
        var balance = 0;
        var total = finalvaluation;
        var cgst_input = 0;
        var cgst_amt = 0;
        var sgst_input = 0;
        var sgst_amt = 0;
        var igst_input = 0;
        var igst_amt = 0;
        var tax_by_val = '';
        var tax_input = 0;
        var tax_amt = 0;
        var cashNarration = 0;

        if (types == 'CASH') {
            var cash_amt = finalvaluation;
        } else {
            var cash_amt = 0;
        }
        var slPrPayAccId = '';
        var slPrPayChequeAccId = '';
        var slPrPayCardAccId = '';
        var slPrPayOnlinePaymentAccId = '';
        var slPrPayDiscAccId = '';
        var chequeNo = '';
        var chq_amt = '';
        var cardNo = '';
        var card_amt = '';
        var onlinePaymentNarration = '';
        if (types == 'ONLINE') {
            var online_amt = finalvaluation;
        } else {
            var online_amt = 0;
        }
        var disc_option = '';
        var discPer = '';
        var discAmt = '';
        var utin_dr_acc_id = '';
        var utin_cr_acc_id = '';
        var cgst_acc_id = '';
        var sgst_acc_id = '';
        var igst_acc_id = '';
        var invoice_pr_id = document.getElementById('sttr_pre_invoice_no_1').value;
        var invoice_num = document.getElementById('sttr_invoice_no_1').value;
        var sttr_panel_name = document.getElementById('sttr_panel_name').value;
        var firm_type = document.getElementById('firm_type').value;
        var mkg_acc_id = '';
        var tax_acc_id = '';
        var curch_acc_id = '';
        //
    }
    //
    var poststr = "user_id=" + user_id
            + "&final_amt=" + final_amt
            + "&firm_id=" + firm_id
            + "&balance=" + balance
            + "&total=" + total
            + "&cgst=" + cgst
            + "&sgst=" + cgst
            + "&igst=" + igst
            + "&tax_by_val=" + tax_by_val
            + "&cgst_input=" + cgst_input
            + "&sgst_input=" + sgst_input
            + "&cgst_amt=" + cgst_amt
            + "&sgst_amt=" + sgst_amt
            + "&igst_input=" + igst_input
            + "&igst_amt=" + igst_amt
            + "&tax_input=" + tax_input
            + "&tax_amt=" + tax_amt
            + "&cashNarration=" + cashNarration
            + "&cash_amt=" + cash_amt
            + "&slPrPayAccId=" + slPrPayAccId
            + "&slPrPayChequeAccId=" + slPrPayChequeAccId
            + "&slPrPayCardAccId=" + slPrPayCardAccId
            + "&slPrPayOnlinePaymentAccId=" + slPrPayOnlinePaymentAccId
            + "&slPrPayDiscAccId=" + slPrPayDiscAccId
            + "&chequeNo=" + chequeNo
            + "&chq_amt=" + chq_amt
            + "&cardNo=" + cardNo
            + "&card_amt=" + card_amt
            + "&onlinePaymentNarration=" + onlinePaymentNarration
            + "&online_amt=" + online_amt
            + "&disc_option=" + disc_option
            + "&discPer=" + discPer
            + "&discAmt=" + discAmt
            + "&utin_dr_acc_id=" + utin_dr_acc_id
            + "&utin_cr_acc_id=" + utin_cr_acc_id
            + "&cgst_acc_id=" + cgst_acc_id
            + "&sgst_acc_id=" + sgst_acc_id
            + "&igst_acc_id=" + igst_acc_id
            + "&invoice_pr_id=" + invoice_pr_id
            + "&invoice_num=" + invoice_num
            + "&sttr_panel_name=" + sttr_panel_name
            + "&firm_type=" + firm_type
            + "&mkg_acc_id=" + mkg_acc_id
            + "&tax_acc_id=" + tax_acc_id
            + "&curch_acc_id=" + curch_acc_id
            + "&panelName=" + panelName;
    +"&types=" + types;
//    alert(poststr);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";

            if (finalvaluation == 'undefined' || finalvaluation == null) {
                document.getElementById("payment_req").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("directPaymentOptionId").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    if (finalvaluation == 'undefined' || finalvaluation == null) {
        xmlhttp.open("POST", documentRoot + "/include/php/omAdQuickSell2" + default_theme + ".php?" + poststr, true);
    } else {
        xmlhttp.open("POST", documentRoot + "/include/php/omAdQuickSell2" + default_theme + ".php?" + poststr + "&directPaymentPanelName=directPaymentPanel", true);
    }
    xmlhttp.send();
}
//
function sendProductDetailsQuickSell(sttr_id, qty_indicator, sttr_quantity) {
    var documentRoot = document.getElementById('documentRoot').value;
    var user_id = document.getElementById('user_id').value;
    var user_fname = document.getElementById('user_fname').value;
    var user_lname = document.getElementById('user_lname').value;
    var user_mobile = document.getElementById('user_mobile').value;
    var panelName = document.getElementById('panel_name').value;
    var firmId = document.getElementById('firmId').value;
    //To Restrict the delete quantity from sell entry 
//    if (sttr_quantity <= 1) {
//        alert('Cannot Less Quantity anymore !');
//    }
//Open AddUserModal when user_id is not getting quick sell 
    if (!user_id) {
        $('#quick_sell_add_user_modal').modal();
        $(".modal-backdrop.in").hide();
//            console.log('sttr_id = '+sttr_id);
    }
    var poststr = "sttr_id=" + sttr_id
            + "&user_id=" + user_id
            + "&user_fname=" + user_fname
            + "&user_lname=" + user_lname
            + "&user_mobile=" + user_mobile
            + "&qty_indicator=" + qty_indicator
            + "&panelName=" + panelName
            + "&firm_id=" + firmId;
//alert('poststr==' + poststr);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            document.getElementById('custFirstNameForAddGirvi').value = user_fname;
            document.getElementById('mobileNoToAddGirvi').value = user_mobile;
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omAdQuickSell" + default_theme + ".php?" + poststr, true);
    xmlhttp.send();
    document.getElementById("productImgSec").innerHTML.reload;
    document.getElementById("leftDiv").innerHTML.reload;
}

function deleteProductPayQuickSell(user_id, sttr_id) {
    var documentRoot = document.getElementById('documentRoot').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            document.getElementById("productImgSec").innerHTML.reload;
            document.getElementById("leftDiv").innerHTML.reload;
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omdelpyprod" + default_theme + ".php?user_id=" + user_id + "&sttr_id=" + sttr_id, true);
    xmlhttp.send();
}
function addUserDetailquickGet() {
    var documentRoot = document.getElementById('documentRoot').value;
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            var UserDetails = xmlhttp2.responseText;
            var UserArray = UserDetails.split('#');
            document.getElementById("user_id").value = UserArray[0];
            document.getElementById("user_fname").value = UserArray[1];
            document.getElementById('custFirstNameForAddGirvi').value = UserArray[1];
            document.getElementById('mobileNoToAddGirvi').value = UserArray[2];
            document.getElementById('search').focus();
            //
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp2.open("POST", documentRoot + "/include/php/omgetquiaddcust" + default_theme + ".php", true);
    xmlhttp2.send();
}
//
function setDataValueOnWs(ms_itm_id, ms_itm_mrp, qty_increment, ms_itm_min_qty, panel_name, product_name) {
//      alert('ms_itm_id:- ' + ms_itm_id );
    if (panel_name == '') {
        panel_name = "quicksell";
    }
    var documentRoot = document.getElementById('documentRoot').value;
    var user_id = document.getElementById('user_id').value;
    var user_fname = document.getElementById('user_fname').value;
    var user_lname = document.getElementById('user_lname').value;
    var user_mobile = document.getElementById('user_mobile').value;
    var firmId = document.getElementById('firmId').value;
    var discountInputWsInput = document.getElementById('discountInputWsInput').value;
    var qtyInputWsInput = document.getElementById('qtyInputWsInput').value;
    var WsGSWTInput = document.getElementById('WsGSWTInput').value;
    var InputWsPriceInput = document.getElementById('InputWsPriceInput').value;
    var checkboxws = document.getElementById('checkboxws').checked;
    //
    var poststrs = "ms_itm_id=" + ms_itm_id
            + "&ms_itm_mrp=" + ms_itm_mrp
            + "&qty_indicator=" + qty_increment
            + "&qty_increment=" + qty_increment
            + "&ms_itm_min_qty=" + ms_itm_min_qty
            + "&user_id=" + user_id
            + "&user_fname=" + user_fname
            + "&user_lname=" + user_lname
            + "&user_mobile=" + user_mobile
            + "&qty_indicator=" + qty_increment
            + "&panelName=" + panel_name
            + "&discountInputWsInput=" + discountInputWsInput
            + "&qtyInputWsInput=" + qtyInputWsInput
            + "&WsGSWTInput=" + WsGSWTInput
            + "&InputWsPriceInput=" + InputWsPriceInput
            + "&product_name=" + product_name
            + "&firm_id=" + firmId;
//    alert('poststrs:- ' + poststrs);
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp2.responseText;
            document.getElementById('custFirstNameForAddGirvi').value = user_fname;
            document.getElementById('mobileNoToAddGirvi').value = user_mobile;
            document.getElementById('InputWsPriceInput').focus();
            //
            //            alert('poststrs:- ' + poststrs );
        } else {
            document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
        }
    };
    xmlhttp2.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?" + poststrs, true);
    xmlhttp2.send();
    document.getElementById("productImgSec").innerHTML.reload;
    document.getElementById("leftDiv").innerHTML.reload;
}

//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
////QQQQQQQQQQQQQQQQQQQQQQQQ END YUVRAJ ADD THIS CODE FOR QUICK SELL MASTER NEW REQUIERMENT 14072022 QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
//
//
//
// 
// ***********************************************************************************************************************
// START CODE TO ADD ONCLICK FUNCTION FOR IF DEPOSIT DATE CHANGE, CALCUALTE NEW INTEREST @AUTHOR-PRIYANKA-10AUG2022
// ***********************************************************************************************************************
function showUdhaarDepositMoneyInterestChangeDiv(custId, mainUdhaarId, changeCounter, newDepositDOBDay, newDepositDOBMonth, newDepositDOBYear) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omuudet" + default_theme + ".php?panelName=UdhaarList&panel=UdhaarList&formName=UdhaarList"
            + "&mainUdhaarId=" + mainUdhaarId + "&custId=" + custId
            + "&newDepositDOBDay=" + newDepositDOBDay + "&newDepositDOBMonth=" + newDepositDOBMonth
            + "&newDepositDOBYear=" + newDepositDOBYear + "&changeCounter=" + changeCounter
            + "&divName=cust_middle_body&subPanelName=udhaarDepositDateChangePanel", true);
    xmlhttp.send();
}
// ***********************************************************************************************************************
// END CODE TO ADD ONCLICK FUNCTION FOR IF DEPOSIT DATE CHANGE, CALCUALTE NEW INTEREST @AUTHOR-PRIYANKA-10AUG2022
// ***********************************************************************************************************************
//
function addsimilarproduct(sttr_id) {
    var similar_prod_id = document.getElementById('smilarProductId').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("updateSimilarProductDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omupdatesimprod.php?similar_prod_id=" + similar_prod_id + "&sttr_id=" + sttr_id, true);
    xmlhttp.send();
}
//
function removesimilarproduct(sttr_id, similar_prod_id) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("updateSimilarProductDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omupdatesimprod.php?similar_prod_id=" + similar_prod_id + "&sttr_id=" + sttr_id + "&operation=removeSimilarProduct", true);
    xmlhttp.send();
}
//
function searchSimilarProductId(keyCodeInput, prodIdSerachStr, sttrId) {
    var keyCode = keyCodeInput;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("searchProductIdDiv").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('selItemId').focus();
                document.getElementById('selItemId').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/omSelectSimProdId.php?prodIdSerachStr=' + prodIdSerachStr + "&sttrId=" + sttrId, true);
    xmlhttp.send();
}
//
function createDDPanelStr(checkboxstatus, checkboxvalue) {
    //
    document.getElementById('panelDiv').classList.add('showDropdown');
    //
    if (document.getElementById('panelDiv').classList.contains('showDropdown')) {
        document.getElementById('panelDropdown').style.display = 'block';
    } else {
        document.getElementById('panelDropdown').style.display = 'none';
    }
    //
    var ddPanelToShow = document.getElementById("ddPanelToShow").value;
    //
    if (checkboxstatus == 'true' || checkboxstatus == true) {
        ddPanelToShow = ddPanelToShow + checkboxvalue + '*';
    } else if (checkboxstatus == 'false' || checkboxstatus == false) {
        ddPanelToShow = ddPanelToShow.replace(checkboxvalue + '*', '');
    }
    //
    document.getElementById("ddPanelToShow").value = ddPanelToShow;
    //
}
//=====================================================================================================
// =====================  START ADD THIS FUNC FOR STOCK TALLY RFID READ NEW FUNC ADD @YUVRAJ 28102022
//=====================================================================================================
var tallyStockByRfidMainTimmerNew;
var tallyStockByRfidTimmerNew;
var allProductsScannedNew;
var rfidStockScanDateNew;
var rfidStockScanTimeNew;
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
//*********************CHANGES MADE BY @RENUKA_SHARMA-FOR STOCK TALLY BY RFID**********************************************************tallyStockOneShotByRFIDNewpopup
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
function tallyStockOneShotByRFIDNew(textAreaRfidTagsData, rfid_stock_scan_date, rfid_stock_scan_time, stockType, StockTallycheckbox, productCounterName, productCategory, productLocation, deviceType, divName = '') {
    var RFIDPopup = document.getElementById('RFIDPopup').value;
    loadXMLDoc();
    //
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("rfidScannedResultsDiv").innerHTML = xmlhttp.responseText;
            if (RFIDPopup != 'RFIDPopup') {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            }
        } else {
            if (RFIDPopup != 'RFIDPopup') {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        }
    };
    //
    if (stockType == '' && divName != 'imitationTally') {
        alert("Please Select Reporting Period Stock Type!...");
        xmlhttp.open("POST", "include/php/ogstallyRFIDNew" + default_theme + ".php?rfidTagsData=" + textAreaRfidTagsData +
                "&rfid_stock_scan_date=" + rfid_stock_scan_date +
                "&rfid_stock_scan_time=" + rfid_stock_scan_time +
                "&stockType=" + stockType +
                "&StockTallycheckbox=" + StockTallycheckbox + "&productCounterName=" + productCounterName + "&productCategory=" + productCategory + "&productLocation=" + productLocation + "&deviceType=" + deviceType, true);
    } else if (stockType == '' && divName == 'imitationTally') {
        alert("Please Select Reporting Period Stock Type!...");
        xmlhttp.open("POST", "include/php/ogimstallyRFIDNew" + default_theme + ".php?rfidTagsData=" + textAreaRfidTagsData +
                "&rfid_stock_scan_date=" + rfid_stock_scan_date +
                "&rfid_stock_scan_time=" + rfid_stock_scan_time +
                "&stockType=" + stockType +
                "&StockTallycheckbox=" + StockTallycheckbox + "&productCounterName=" + productCounterName + "&productCategory=" + productCategory + "&productLocation=" + productLocation + "&deviceType=" + deviceType, true);
    } else {
        if (RFIDPopup == 'RFIDPopup') {
            xmlhttp.open("POST", "ogstallyRFIDAdd" + default_theme + ".php?rfidTagsData=" + textAreaRfidTagsData +
                    "&rfid_stock_scan_date=" + rfid_stock_scan_date +
                    "&rfid_stock_scan_time=" + rfid_stock_scan_time +
                    "&stockType=" + stockType +
                    "&StockTallycheckbox=" + StockTallycheckbox + "&productCounterName=" + productCounterName + "&productCategory=" + productCategory + "&productLocation=" + productLocation + "&deviceType=" + deviceType, true);

        } else {
            xmlhttp.open("POST", "include/php/ogstallyRFIDAdd" + default_theme + ".php?rfidTagsData=" + textAreaRfidTagsData +
                    "&rfid_stock_scan_date=" + rfid_stock_scan_date +
                    "&rfid_stock_scan_time=" + rfid_stock_scan_time +
                    "&stockType=" + stockType +
                    "&StockTallycheckbox=" + StockTallycheckbox + "&productCounterName=" + productCounterName + "&productCategory=" + productCategory + "&productLocation=" + productLocation + "&deviceType=" + deviceType + "&divName=" + divName, true);
        }
    }
    xmlhttp.send();
}
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//*************************************END CODE TO CHANGE IN FUNCTION FOR STOCK TALLY BY RFID***************************************************
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
//*********************CHANGES MADE BY @RENUKA_SHARMA-FOR STOCK TALLY BY MULTIBARCODE**********************************************************
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
var multiBarcodeGlobalCounter = 0;
var callCounter = [];
var xmlhttpArr = [];
function tallyStockOneShotByMultiBarcode(multiBarcodeCounter, textAreamultiBarcodeTagsData, rfid_stock_scan_date, rfid_stock_scan_time, stockType, StockTallycheckbox, productCounterName, productCategory, productLocation) {
//
    //console.log("multiBarcodeCounter:" + multiBarcodeCounter);
    if (multiBarcodeCounter > 0) {
        multiBarcodeGlobalCounter = parseInt(multiBarcodeCounter);
    } else {
        multiBarcodeGlobalCounter = parseInt(multiBarcodeCounter);
        callCounter[0] = false;
    }
    //
    setTimeout(function () {
        tallyStockOneShotByMultiBarcodeWaitFunc(multiBarcodeGlobalCounter, textAreamultiBarcodeTagsData, rfid_stock_scan_date, rfid_stock_scan_time, stockType, StockTallycheckbox, productCounterName, productCategory, productLocation);
    }, 100);
    //
    //console.log("First Call:" + multiBarcodeGlobalCounter + "  Value:" + callCounter[multiBarcodeGlobalCounter]);
    //

}

function tallyStockOneShotByMultiBarcodeWaitFunc(multiBarcodeCounter, textAreamultiBarcodeTagsData, rfid_stock_scan_date, rfid_stock_scan_time, stockType, StockTallycheckbox, productCounterName, productCategory, productLocation) {
    //
    //console.log("1st Running waitFunc:" + multiBarcodeCounter + "  Value:" + callCounter[multiBarcodeCounter]);
    //
    var callCounterNum;
    if (multiBarcodeCounter > 0)
        callCounterNum = parseInt(multiBarcodeCounter) - 1;
    else
        callCounterNum = 0;
    //
    if (callCounter[callCounterNum]) {
        //console.log("Running waitFunc:" + callCounterNum + "  Value:" + callCounter[callCounterNum]);
        setTimeout(function () {
            tallyStockOneShotByMultiBarcodeWaitFunc(multiBarcodeCounter, textAreamultiBarcodeTagsData, rfid_stock_scan_date, rfid_stock_scan_time, stockType, StockTallycheckbox, productCounterName, productCategory, productLocation);
        }, 400);
    } else {
        //console.log("Start waitFunc:" + callCounterNum + "  Value:" + callCounter[callCounterNum]);
//        if (multiBarcodeCounter > 0)
//            document.getElementById('multiBarcodeGlobalCounter').value = parseInt(0);
//        else
        document.getElementById('multiBarcodeGlobalCounter').value = parseInt(multiBarcodeCounter) + 1;
        //
        if (window.XMLHttpRequest) { // Mozilla, Safari,...
            xmlhttpArr[multiBarcodeCounter] = new XMLHttpRequest();
            if (xmlhttpArr[multiBarcodeCounter].overrideMimeType) {
                // set type accordingly to anticipated content type
                xmlhttpArr[multiBarcodeCounter].overrideMimeType('text/html');
            }
        } else if (window.ActiveXObject) { // IE
            try {
                xmlhttpArr[multiBarcodeCounter] = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttpArr[multiBarcodeCounter] = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                }
            }
        }
        if (!xmlhttpArr[multiBarcodeCounter]) {
            alert('Cannot create XMLHTTP instance');
            return false;
        }
        xmlhttpArr[multiBarcodeCounter].onreadystatechange = function () {
            if (xmlhttpArr[multiBarcodeCounter].readyState == 4 && xmlhttpArr[multiBarcodeCounter].status == 200) {
                document.getElementById("rfidScannedResultsDiv").innerHTML = xmlhttpArr[multiBarcodeCounter].responseText;
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                callCounter[multiBarcodeCounter] = false;
                //console.log("Success callCounter:" + multiBarcodeCounter + "  Value:" + callCounter[multiBarcodeCounter]);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                callCounter[multiBarcodeCounter] = true;
                //console.log("Processing callCounter:" + multiBarcodeCounter + "  Value:" + callCounter[multiBarcodeCounter]);
            }
        };
        //console.log("Finish waitFunc:" + multiBarcodeCounter + "  Value:" + callCounter[multiBarcodeCounter]);
        //
        if (stockType == '') {
            alert("Please Select Reporting Period Stock Type!...");
            xmlhttpArr[multiBarcodeCounter].open("POST", "include/php/ogstallyMutiBarcode" + default_theme + ".php?rfidTagsData=" + textAreamultiBarcodeTagsData +
                    "&rfid_stock_scan_date=" + rfid_stock_scan_date +
                    "&rfid_stock_scan_time=" + rfid_stock_scan_time +
                    "&stockType=" + stockType +
                    "&StockTallycheckbox=" + StockTallycheckbox + "&productCounterName=" + productCounterName + "&productCategory=" + productCategory + "&productLocation=" + productLocation, true);
        } else {
            xmlhttpArr[multiBarcodeCounter].open("POST", "include/php/ogstallyMultiBarcodeAdd" + default_theme + ".php?rfidTagsData=" + textAreamultiBarcodeTagsData +
                    "&rfid_stock_scan_date=" + rfid_stock_scan_date +
                    "&rfid_stock_scan_time=" + rfid_stock_scan_time +
                    "&stockType=" + stockType +
                    "&StockTallycheckbox=" + StockTallycheckbox + "&productCounterName=" + productCounterName + "&productCategory=" + productCategory + "&productLocation=" + productLocation, true);
        }
        xmlhttpArr[multiBarcodeCounter].send();

    }
    //console.log("Last waitFunc:" + multiBarcodeCounter + "  Value:" + callCounter[multiBarcodeCounter]);
}
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//*************************************END CODE TO CHANGE IN FUNCTION FOR STOCK TALLY BY MULTIBARCODE****************************************
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
function tallyStockOneShotByRFIDNewpopup(textAreaRfidTagsData, rfid_stock_scan_date, rfid_stock_scan_time, stockType, StockTallycheckbox, productCounterName, productCategory, productLocation) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("rfidScannedResultsDiv").innerHTML = xmlhttp.responseText;
            // document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        } else {
            // document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    if (stockType == '') {
        alert("Please Select Reporting Period Stock Type!...");
        xmlhttp.open("POST", "ogstallyRFIDpop" + default_theme + ".php?rfidTagsData=" + textAreaRfidTagsData +
                "&rfid_stock_scan_date=" + rfid_stock_scan_date +
                "&rfid_stock_scan_time=" + rfid_stock_scan_time +
                "&stockType=" + stockType +
                "&StockTallycheckbox=" + StockTallycheckbox + "&productCounterName=" + productCounterName + "&productCategory=" + productCategory + "&productLocation=" + productLocation, true);
    } else {
        xmlhttp.open("POST", "ogstallyRFIDAdd" + default_theme + ".php?rfidTagsData=" + textAreaRfidTagsData +
                "&rfid_stock_scan_date=" + rfid_stock_scan_date +
                "&rfid_stock_scan_time=" + rfid_stock_scan_time +
                "&stockType=" + stockType +
                "&StockTallycheckbox=" + StockTallycheckbox + "&productCounterName=" + productCounterName + "&productCategory=" + productCategory + "&productLocation=" + productLocation, true);
    }
    xmlhttp.send();
}
//function insertRfidScannedResult(textAreaRfidTagsData, rfid_stock_scan_date, rfid_stock_scan_time, stockType, StockTallycheckbox, productCounterName, productCategory, productLocation) {
//    loadXMLDoc2();
//    xmlhttp2.onreadystatechange = function () {
//        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
//            if (xmlhttp2.responseText == 'INSERT SUCCESS') {
//                refreshRFIDScannedResultDivNew(productCategory, productLocation, productCounterName, StockTallycheckbox, stockType);
//            }
//        } else {
//            document.getElementById("stockTallyPanelDivbottom").innerHTML.reload;
//        }
//    };
//    // ogtallyRFIDScannedResultsNew
//    xmlhttp2.open("POST", "include/php/ogRfidTallyProsses" + default_theme + ".php?rfidTagsData=" + textAreaRfidTagsData +
//            "&rfid_stock_scan_date=" + rfid_stock_scan_date +
//            "&rfid_stock_scan_time=" + rfid_stock_scan_time +
//            "&stockType=" + stockType +
//            "&StockTallycheckbox=" + StockTallycheckbox +
//            "&productCounterName=" + productCounterName +
//            "&productCategory=" + productCategory +
//            "&productLocation=" + productLocation, true);
//    xmlhttp2.send();
//}
////
////
//function refreshRFIDScannedResultDivNew(textAreaRfidTagsData, productCategory, productLocation, productCounterName, StockTallycheckbox, stockType) {
//    loadXMLDoc2();
//    xmlhttp2.onreadystatechange = function () {
//        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
//            document.getElementById("stockTallyPanelDivbottom").innerHTML = xmlhttp2.responseText;
//            document.getElementById("stockTallyPanelDivbottom").innerHTML.reload;
//
//            // insertRfidScannedResult(textAreaRfidTagsData, rfid_stock_scan_date, rfid_stock_scan_time, stockType, StockTallycheckbox, productCounterName, productCategory, productLocation);
//        } else {
//            document.getElementById("stockTallyPanelDivbottom").innerHTML.reload;
//        }
//    };
//    //
//    xmlhttp2.open("POST", "include/php/ogtallyRFIDScannedResultsNew" + default_theme + ".php?rfidTagsData=" + textAreaRfidTagsData + "stockType=" + stockType +
//            "&StockTallycheckbox=" + StockTallycheckbox + "&productCounterName=" + productCounterName + "&productCategory=" + productCategory + "&productLocation=" + productLocation, true);
//    xmlhttp2.send();
//}
////
////// FUNCTION FOR MULTI BARCODE SCAN @YUVRAJ 01122022
//function tallyStockOneShotByMultiBarcode(textAreamultiBarcodeTagsData, rfid_stock_scan_date, rfid_stock_scan_time, stockType, StockTallycheckbox, productCounterName, productCategory, productLocation) {
//    //
//    var allProductsScannedSound;
//    var scanSound;
//    //
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            var StockTallyDetails = xmlhttp.responseText;
//            var StockTallyArray = StockTallyDetails.split('#');
////            
//            if (StockTallyArray[3] == 'SUCCESS' || StockTallyArray[3] == 'SUCCESS' || StockTallyArray[3] == 'ALL_SCANNED') {
//
//                if (StockTallyArray[3] == 'ALL_SCANNED' && allProductsScanned != 'ALL_SCANNED') {
//                    allProductsScanned = 'ALL_SCANNED';
//                    allProductsScannedSound = new Audio("http://127.0.0.1:8080/omunim/2/sounds/all_products_scanned.mp3");
//                    allProductsScannedSound.play();
//                    clearTimeout(tallyStockByRfidTimmer);
//                    //refreshRFIDScannedResultDiv();
//                } else if (rfidStockScanTime != rfid_stock_scan_time && allProductsScanned != 'ALL_SCANNED') {
//                    scanSound = new Audio("http://127.0.0.1:8080/omunim/2/sounds/scan_start.mp3");
//                    scanSound.play();
//                    rfidStockScanTime = rfid_stock_scan_time;
//                }
//                refreshBarcodeMultiScannedResultDiv(StockTallyArray[0], StockTallyArray[1], StockTallyArray[2], StockTallycheckbox, stockType);
//            }
//
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    if (stockType == '') {
//        alert("Please Select Reporting Period Stock Type!...");
//        xmlhttp.open("POST", "include/php/ogstallyMutiBarcode" + default_theme + ".php?rfidTagsData=" + textAreamultiBarcodeTagsData +
//                "&rfid_stock_scan_date=" + rfid_stock_scan_date +
//                "&rfid_stock_scan_time=" + rfid_stock_scan_time +
//                "&stockType=" + stockType +
//                "&StockTallycheckbox=" + StockTallycheckbox + "&productCounterName=" + productCounterName + "&productCategory=" + productCategory + "&productLocation=" + productLocation, true);
//    } else {
//        //ogstallyRFIDAdd.php 
//        //ogtallyRFIDScannedResultsNew
//        xmlhttp.open("POST", "include/php/ogstallyMultiBarcodeAdd" + default_theme + ".php?rfidTagsData=" + textAreamultiBarcodeTagsData +
//                "&rfid_stock_scan_date=" + rfid_stock_scan_date +
//                "&rfid_stock_scan_time=" + rfid_stock_scan_time +
//                "&stockType=" + stockType +
//                "&StockTallycheckbox=" + StockTallycheckbox + "&productCounterName=" + productCounterName + "&productCategory=" + productCategory + "&productLocation=" + productLocation, true);
//    }
//    xmlhttp.send();
//}
////
//function refreshBarcodeMultiScannedResultDiv(productCategory, productLocation, productCounterName, StockTallycheckbox, stockType) {
//    //
//    loadXMLDoc2();
//    xmlhttp2.onreadystatechange = function () {
//        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
//            //document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("stockTallyPanelDivbottom").innerHTML = xmlhttp2.responseText;
//            if (StockTallycheckbox == 'false' || StockTallycheckbox == false) {
//                productCounterName = "NotSelected";
//                productCategory = "NotSelected";
//                productLocation = "NotSelected";
//            }
////            
//        } else {
//            document.getElementById("stockTallyPanelDivbottom").innerHTML.reload;
//            //document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//            //
//        }
//    };
//    xmlhttp2.open("POST", "include/php/ogtallyMultiBarcodeScanResult" + default_theme + ".php?stockType=" + stockType + "&productCounterName=" + productCounterName + "&StockTallycheckbox=" + StockTallycheckbox + "&productLocation=" + productLocation + "&productCategory=" + productCategory, true);
//    xmlhttp2.send();
//}
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
//*********************START====>>>CHANGES MADE BY @RENUKA_SHARMA-FOR RESET STOCK TALLY BY RFID**********************************************************
//SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
function resetStockByRFIDNew(stockType, StockTallycheckbox, productCounterName, productCategory, productLocation) {
//    alert("stockType:- " + stockType);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("rfidScannedResultsDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //document.getElementById("rfidScannedResultsDiv").innerHTML = xmlhttp.responseText;
            if (xmlhttp.responseText == 'SUCCESS') {
                // refreshRFIDScannedResultDivNew(productCategory, productLocation, productCounterName, StockTallycheckbox, stockType);
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogtallyRFIDReset" + default_theme + ".php?productCategory=" + productCategory, true);
    xmlhttp.send();
}
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//*************************************END CODE TO CHANGE IN FUNCTION FOR RESET STOCK TALLY BY RFID****************************************
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
function resetStockByMultiBarcodeNew(stockType, StockTallycheckbox, productCounterName, productCategory, productLocation) {
//    alert("stockType:- " + stockType);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rfidScannedResultsDiv").innerHTML = xmlhttp.responseText;
//            if (xmlhttp.responseText == 'SUCCESS') {
//               // refreshBarcodeMultiScannedResultDiv(productCategory, productLocation, productCounterName, StockTallycheckbox, stockType);
//            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogtallyMultiBarcodeReset" + default_theme + ".php", true);
    xmlhttp.send();
}
//
//
// Added Code For Stock Tally Multi Barcode Scan Delete @AUTHOR-PRIYANKA-15SEP23
function deleteStockTallyByMultiBarcodeScan(productCounterName, productCategory, productLocation) {
    //    
    //alert("productCounterName :- " + productCounterName);
    //alert("productCategory :- " + productCategory);
    //alert("productLocation :- " + productLocation);
    //
    confirm_box = confirm("Do you really want to Permanent Delete This Stock?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("rfidScannedResultsDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("POST", "include/php/omStockTallyMultiBarcodeScanDelete" + default_theme + ".php?productCounterName=" + productCounterName +
                "&productCategory=" + productCategory + "&productLocation=" + productLocation, true);
        //
        xmlhttp.send();
        //
    } else {
        document.getElementById("main_ajax_loading_div" + udhaarId).style.visibility = "hidden";
    }
}
//
//
//=====================================================================================================
// =====================  END ADD THIS FUNC FOR STOCK TALLY RFID READ NEW FUNC ADD @YUVRAJ 28102022
//=====================================================================================================
function showTallyStockPanelNew(panel) {
//    alert(panel);
    var StockTallycheckbox = document.getElementById('StockTallycheckbox').checked;
    var productCounterName = document.getElementById('productCounterName').value;
    var productCategory = document.getElementById('productCategory').value;
    var productLocation = document.getElementById('productLocation').value;
    //alert(StockTallycheckbox);
    // 
    if (panel == 'OpenStockTallyWithRFID' || panel == 'OpenStockTallyWithMultibarcode') {
//                    var StockTallycheckbox = 'false';
//        var productCounterName = '';
//        var productCategory = '';
//        var productLocation = '';
        var stockType = 'OPEN STOCK';

    } else if (panel == 'CloseStockTallyWithRFID' || panel == 'CloseStockTallyWithMultibarcode') {
//                    var StockTallycheckbox = 'false';
//        var productCounterName = '';
//        var productCategory = '';
        var productLocation = '';
        var stockType = 'CLOSE STOCK';
    }

    loadXMLDoc();
    //alert(panel);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // alert(xmlhttp.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'OpenImStockTallyWithRFID' || panel == 'CloseImStockTallyWithRFID') {
                document.getElementById("imstockTallyPanelDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    //
    if (panel == 'StockTallyByImages') {
        xmlhttp.open("POST", "include/php/ogstally" + default_theme + ".php?panelName=" + panel, true);
        xmlhttp.send();
    } else if (panel == 'StockTallyByTable') {
        xmlhttp.open("POST", "include/php/ogstallytable" + default_theme + ".php", true);
        xmlhttp.send();
    } else if (panel == 'StockTallyByRFID') {
        xmlhttp.open("POST", "include/php/ogstallyRFIDNew" + default_theme + ".php", true);
        xmlhttp.send();
    } else if (panel == 'OpenStockTallyWithRFID') {
        xmlhttp.open("POST", "include/php/ogstallyRFIDNew" + default_theme + ".php?stockType=" + stockType + "&StockTallycheckbox=" + StockTallycheckbox + "&productCategory=" + productCategory, true);
        xmlhttp.send();
    } else if (panel == 'CloseStockTallyWithRFID') {
        xmlhttp.open("POST", "include/php/ogstallyRFIDNew" + default_theme + ".php?stockType=" + stockType + "&StockTallycheckbox=" + StockTallycheckbox + "&productCategory=" + productCategory, true);
        xmlhttp.send();
    } else if (panel == 'OpenImStockTallyWithRFID') {
        xmlhttp.open("POST", "include/php/ogimstallyRFIDNew" + default_theme + ".php?stockType=" + stockType + "&StockTallycheckbox=" + StockTallycheckbox + "&productCategory=" + productCategory, true);
        xmlhttp.send();
    } else if (panel == 'CloseImStockTallyWithRFID') {
        xmlhttp.open("POST", "include/php/ogimstallyRFIDNew" + default_theme + ".php?stockType=" + stockType + "&StockTallycheckbox=" + StockTallycheckbox + "&productCategory=" + productCategory, true);
        xmlhttp.send();
    } else if (panel == 'OpenStockTallyWithMultibarcode') {
        xmlhttp.open("POST", "include/php/ogstallyMutiBarcode" + default_theme + ".php?stockType=" + stockType + "&StockTallycheckbox=" + StockTallycheckbox + "&productCategory=" + productCategory, true);
        xmlhttp.send();
    } else if (panel == 'CloseStockTallyWithMultibarcode') {
        xmlhttp.open("POST", "include/php/ogstallyMutiBarcode" + default_theme + ".php?stockType=" + stockType + "&StockTallycheckbox=" + StockTallycheckbox + "&productCategory=" + productCategory, true);
        xmlhttp.send();
    }

}
//
function checkBoxTallyStockPanelNew() {
    var StockTallycheckbox = document.getElementById('StockTallycheckbox').checked;
//    var productCounterName = document.getElementById('productCounterName').value;
//    var productCategory = document.getElementById('productCategory').value;
//    var productLocation = document.getElementById('productLocation').value;
    var stockType = document.getElementById('stockType').value;
    //
    if (StockTallycheckbox == true) {
        var productCounterName = '';
        var productCategory = '';
        var productLocation = '';
    }
//    var stockType = '';
    //
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockTallyPanelDiv").innerHTML = xmlhttp2.responseText;
//            document.getElementById("stockTallyPanelDiv").innerHTML.reload;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp2.open("POST", "include/php/ogstallyRFIDNew" + default_theme + ".php?stockType=" + stockType + "&productCounterName=" + productCounterName + "&StockTallycheckbox=" + StockTallycheckbox + "&productLocation=" + productLocation + "&productCategory=" + productCategory, true);
    xmlhttp2.send();
}

function getStockTallyPanelReport(documentRoot, omstocktallyreport, panelName) {
    //CHANGE FUNCTION FOR OPEN STOCK LEFGER IN ANOTHER TAB : AUTHOR @DARSHANA 11 NOV 2021
    var url = documentRoot + "/include/php/" + omstocktallyreport + default_theme + ".php?panelName=" + panelName;
    window.open(url, '_blank');
}
// END ADD THIS FUNC FOR STOCK TALLY NEW FUNC ADD @YUVRAJ 28102022
// 
// 
// 
// 
// SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
// START CODE TO CHANGE IN FUNCTION FOR STOCK MANAGEMENT BY COUNTER BY MULTIBARCODE
// SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
//
var stockTransferMultiBarcodeGlobalCounter = 0;
var callMultiBarcodeCounter = [];
var xmlhttpArray = [];
function stockManagementByCounterMultiBarcode(stockTransferMultiBarcodeCounter, barcodeTagsData, productCounter) {
    //
    //console.log("stockTransferMultiBarcodeCounter:" + stockTransferMultiBarcodeCounter);
    //
    if (stockTransferMultiBarcodeCounter > 0) {
        stockTransferMultiBarcodeGlobalCounter = parseInt(stockTransferMultiBarcodeCounter);
    } else {
        stockTransferMultiBarcodeGlobalCounter = parseInt(stockTransferMultiBarcodeCounter);
        callMultiBarcodeCounter[0] = false;
    }
    //
    setTimeout(function () {
        stockManagementByCounterMultiBarcodeWaitFunc(stockTransferMultiBarcodeGlobalCounter, barcodeTagsData, productCounter);
    }, 100);
    //
    //console.log("First Call:" + stockTransferMultiBarcodeGlobalCounter + "  Value:" + callMultiBarcodeCounter[stockTransferMultiBarcodeGlobalCounter]);
    //

}
//
//
function stockManagementByCounterMultiBarcodeWaitFunc(stockTransferMultiBarcodeCounter, barcodeTagsData, productCounter) {
    //
    //console.log("1st Running waitFunc:" + stockTransferMultiBarcodeCounter + "  Value:" + callMultiBarcodeCounter[stockTransferMultiBarcodeCounter]);
    //
    var callMultiBarcodeCounterNum;
    if (stockTransferMultiBarcodeCounter > 0)
        callMultiBarcodeCounterNum = parseInt(stockTransferMultiBarcodeCounter) - 1;
    else
        callMultiBarcodeCounterNum = 0;
    //
    if (callMultiBarcodeCounter[callMultiBarcodeCounterNum]) {
        //
        //console.log("Running waitFunc:" + callMultiBarcodeCounterNum + "  Value:" + callMultiBarcodeCounter[callMultiBarcodeCounterNum]);
        //
        setTimeout(function () {
            stockManagementByCounterMultiBarcodeWaitFunc(stockTransferMultiBarcodeCounter, barcodeTagsData, productCounter);
        }, 400);
        //
    } else {
        //
        //console.log("Start waitFunc:" + callMultiBarcodeCounterNum + "  Value:" + callMultiBarcodeCounter[callMultiBarcodeCounterNum]);
        //
        //if (stockTransferMultiBarcodeCounter > 0)
        //    document.getElementById('stockTransferMultiBarcodeGlobalCounter').value = parseInt(0);
        //else
        document.getElementById('stockTransferMultiBarcodeGlobalCounter').value = parseInt(stockTransferMultiBarcodeCounter) + 1;
        //
        if (window.XMLHttpRequest) { // Mozilla, Safari,...
            //
            xmlhttpArray[stockTransferMultiBarcodeCounter] = new XMLHttpRequest();
            //
            if (xmlhttpArray[stockTransferMultiBarcodeCounter].overrideMimeType) {
                // 
                // Set type accordingly to anticipated content type
                xmlhttpArray[stockTransferMultiBarcodeCounter].overrideMimeType('text/html');
            }
            //
        } else if (window.ActiveXObject) { // IE
            //
            try {
                xmlhttpArray[stockTransferMultiBarcodeCounter] = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlhttpArray[stockTransferMultiBarcodeCounter] = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                }
            }
        }
        //
        if (!xmlhttpArray[stockTransferMultiBarcodeCounter]) {
            alert('Cannot create XMLHTTP instance');
            return false;
        }
        //
        xmlhttpArray[stockTransferMultiBarcodeCounter].onreadystatechange = function () {
            if (xmlhttpArray[stockTransferMultiBarcodeCounter].readyState == 4 && xmlhttpArray[stockTransferMultiBarcodeCounter].status == 200) {
                document.getElementById("stockManagementByCounterMultiBarcodeResultsDiv").innerHTML = xmlhttpArray[stockTransferMultiBarcodeCounter].responseText;
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                callMultiBarcodeCounter[stockTransferMultiBarcodeCounter] = false;
                //
                //console.log("Success callMultiBarcodeCounter:" + stockTransferMultiBarcodeCounter + "  Value:" + callMultiBarcodeCounter[stockTransferMultiBarcodeCounter]);
                //
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                callMultiBarcodeCounter[stockTransferMultiBarcodeCounter] = true;
                //
                //console.log("Processing callMultiBarcodeCounter:" + stockTransferMultiBarcodeCounter + "  Value:" + callMultiBarcodeCounter[stockTransferMultiBarcodeCounter]);
                //
            }
        };
        //
        //console.log("Finish waitFunc:" + stockTransferMultiBarcodeCounter + "  Value:" + callMultiBarcodeCounter[stockTransferMultiBarcodeCounter]);
        //
        xmlhttpArray[stockTransferMultiBarcodeCounter].open("POST", "include/php/omStockManagementByCounterMultiBarcode" + default_theme + ".php?barcodeTagsData=" + barcodeTagsData + "&productCounter=" + productCounter, true);
        //
        xmlhttpArray[stockTransferMultiBarcodeCounter].send();
        //
    }
    //
    //console.log("Last waitFunc:" + stockTransferMultiBarcodeCounter + "  Value:" + callMultiBarcodeCounter[stockTransferMultiBarcodeCounter]);
    //
}
// EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
// END CODE TO CHANGE IN FUNCTION FOR STOCK MANAGEMENT BY COUNTER BY MULTIBARCODE
// EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
//
//
//function stockManagementByCounterMultiBarcode(barcodeTagsData, productCounter) {
//    //
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("stockManagementByCounterMultiBarcodeResultsDiv").innerHTML = xmlhttp.responseText;
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    //
//    xmlhttp.open("POST", "include/php/omStockManagementByCounterMultiBarcode" + default_theme + ".php?barcodeTagsData=" + barcodeTagsData +
//            "&productCounter=" + productCounter, true);
//    //
//    xmlhttp.send();
//    //
//}
//
//
//
//
function MetalValuationInvoiceReport(documentRoot, fileName, panelname, custId, sttr_pre_invoice_no, sttr_invoice_no)
{
    //var url = documentRoot + "/include/php/" + omspinvoiceMetalValuation + default_theme + ".php?panelName=" + panelName;
    //console.log(sttr_pre_invoice_no);
    window.open(documentRoot + "/include/php/omspinvoiceMetalValuation.php?custId=" + custId + "&slPrPreInvoiceNo=" + sttr_pre_invoice_no + "&slPrInvoiceNo=" + sttr_invoice_no + "&slprinSubPanel=MetalValuation&invoicePanel=InvLayDefault&customizationOption=", 'popup', 'width=850,height=850,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');

}
/************START CODE FOR GST NO. VALIDATION @Author:RENUKA AUG2022*********************************************/
function checkGSTNoFields(gstNoToAddGirvi, gstin, panel) {
    if ((gstNoToAddGirvi.length < 15 || gstNoToAddGirvi.length > 16) && (gstin == 'NO'))
    {
        alert("Please Enter Valid GST No !");
        if (panel == 'customer')
        {
            document.getElementById("custCSTNo").focus();
        } else if (panel == 'firm')
        {
            document.getElementById("firmTinNo").focus();

        } else if (panel == 'supplier')
        {
            document.getElementById("suppCSTNo").focus();
        } else if (panel == 'customer_update')
        {
            document.getElementById("custCSTNo").focus();
        }
        //document.getElementById("gstNoToAddGirvi").focus();
        return false;
    } else {
        if (gstin == 'YES')
        {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    if (xmlhttp.responseText == 'INVALID GST NUMBER!') {
                        alert(xmlhttp.responseText);
                        if (panel == 'customer')
                        {
                            document.getElementById("custCSTNo").focus();
                        } else if (panel == 'firm')
                        {
                            document.getElementById("firmTinNo").focus();

                        } else if (panel == 'supplier')
                        {
                            document.getElementById("suppCSTNo").focus();
                        } else if (panel == 'customer_update')
                        {
                            document.getElementById("custCSTNo").focus();
                        }
                        return false;
                    } else if (xmlhttp.responseText != '') {
                        // alert(xmlhttp.responseText);
                        if (panel == 'customer')
                        {
                            const myArray = xmlhttp.responseText.split('*');
                            document.getElementById("custFirstNameForAddGirvi").value = myArray[1];
                            document.getElementById("custCityForAddGirvi").value = myArray[2];
                        } else if (panel == 'firm')
                        {
                            const myArray = xmlhttp.responseText.split('*');
                            document.getElementById("firmFullName").value = myArray[1];
                            document.getElementById("firmCity").value = myArray[2];
                        } else if (panel == 'supplier')
                        {
                            const myArray = xmlhttp.responseText.split('*');
                            document.getElementById("suppShopName").value = myArray[1];
                            document.getElementById("city").value = myArray[2];
                        } else if (panel == 'customer_update')
                        {
                            const myArray = xmlhttp.responseText.split('*');
                            document.getElementById("firstName").value = myArray[1];
                            document.getElementById("city").value = myArray[2];
                        }
                    }
                } else {
                    //Do Nothing
                }
            };
            xmlhttp.open("POST", "include/php/omGSTINcheckData.php?gstNoToAddGirvi=" + gstNoToAddGirvi, true);
            xmlhttp.send();
        }
        //
    }
}
/************END CODE TO ADD OTP OPTION @Author:RENUKA AUG2022*********************************************/
//
//
//
//
// *************************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR UDHAAR PAYMENT PANEL
// (UDHAAR ROI / UDHAAR INTEREST TYPE / UDHAAR INTEREST CHECK / UDHAAR INTEREST CALCUALATIONS ISSUE) @AUTHOR:PRIYANKA-08FEB2022
// *************************************************************************************************************************************************
function showAddUdhaarDepositMoneyPaymentDiv(custId, udhaarId, udhaarAmtLeft, udhaarIntAmt, firmId, udhaarPreSerialNum, udhaarSerialNum, sday, smonth, syear, eday, emonth, eyear, udhaarType, otherInfo, accId, discount, utin_id) {

    var udhaarDepIntRecAccId = document.getElementById('udhaarDepIntRecAccId');

    if (udhaarDepIntRecAccId != null && udhaarDepIntRecAccId != '') {
        udhaarDepIntRecAccId = udhaarDepIntRecAccId.value;
    }

    if (udhaarAmtLeft == 0) {
        alert('Please First Enter Deposit amount.');
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (udhaarId == '') {
                    document.getElementById("udharPaymentPanel" + udhaarId).innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("udhaarDepositMonButDiv" + udhaarId).style.visibility = "hidden";
                    document.getElementById("ajaxLoadUdhaarDepositMon" + udhaarId).style.visibility = "hidden";
                    document.getElementById("udhaarDepositMoneyDiv" + udhaarId).innerHTML = xmlhttp.responseText;
                }
            } else {
                if (udhaarId != '') {
                    document.getElementById("udhaarDepositMonButDiv" + udhaarId).style.visibility = "hidden";
                    document.getElementById("ajaxLoadUdhaarDepositMon" + udhaarId).style.visibility = "visible";
                }
            }
        };

        var str = "&paymentPanelName=UdhaarPayment&mainPanelName=udhaar&transPanelName=OnPurchase";

        if (utin_id != '' && typeof (utin_id) != 'undefined') {

            str = "&paymentPanelName=UdhaarPaymentUpdate&mainPanelName=udhaar&transPanelName=OnPurchase&utin_id=" + utin_id;
        }
        //
        //
        // ADDED CODE FOR UDHAAR CR / DR ACCOUNT ID @AUTHOR:PRIYANKA-08FEB2022
        var accDrId = "&accDrId=" + document.getElementById("udhaarPayAccId").value;
        //
        var accCrId = "&accCrId=" + document.getElementById("udhaarDrAccId").value;
        //
        //
        // ADDED CODE FOR UDHAAR ROI / UDHAAR INTEREST TYPE / UDHAAR INTEREST CHECK / UDHAAR INTEREST CALCUALATIONS ISSUE @AUTHOR:PRIYANKA-08FEB2022
        var udhaarROIValueStr = "&udhaarROIValue=" + document.getElementById("selROIValue").value;
        //
        var udhaarInterestTypeStr = "&udhaarInterestType=" + document.getElementById("udhaInterestType").value;
        //
        var udhaarInterestCheckStr = "&udhaarInterestCheck=" + document.getElementById("udhaarIntrestCheck").checked;
        //
        //
        var udhaarAmtLeft = +udhaarAmtLeft + +udhaarIntAmt;
        //
        //
        if (udhaarId == '' || udhaarId == null) {

            var paymInfo = document.getElementById("udhaarPayOtherInfo").value;

            xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + custId + "&udhaarAmtLeft=" + udhaarAmtLeft + "&udhaarIntAmt=" + udhaarIntAmt + "&udhaarDepIntRecAccId=" + udhaarDepIntRecAccId +
                    "&firmId=" + firmId + "&PreInvoiceNo=" + udhaarPreSerialNum + "&PostInvoiceNo=" + udhaarSerialNum + "&udhaarType=" + udhaarType +
                    "&accDrId=" + accId + "&PayOtherInfo=" + otherInfo + "&eDOBDay=" + eday + "&eDOBMonth=" + emonth + "&eDOBYear=" + eyear +
                    "&DOBDay=" + sday + "&DOBMonth=" + smonth + "&DOBYear=" + syear + "&paymInfo=" + paymInfo + str +
                    udhaarROIValueStr + udhaarInterestTypeStr + udhaarInterestCheckStr + accCrId + accDrId, true);

            xmlhttp.send();

        } else {

            xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + custId + "&udhaarId=" + udhaarId + "&udhaarAmtLeft=" + udhaarAmtLeft + "&udhaarIntAmt=" + udhaarIntAmt + "&udhaarDepIntRecAccId=" + udhaarDepIntRecAccId +
                    "&firmId=" + firmId + "&depsoitDisc=" + discount + "&preInvNo=" + udhaarPreSerialNum + "&postInvNo=" + udhaarSerialNum +
                    "&paymentPanelName=UdhaarPayment&mainPanelName=udhaar&transPanelName=UDHAAR" +
                    udhaarROIValueStr + udhaarInterestTypeStr + udhaarInterestCheckStr + accCrId + accDrId, true);

            xmlhttp.send();

        }
    }
}
// *************************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR UDHAAR PAYMENT PANEL
// (UDHAAR ROI / UDHAAR INTEREST TYPE / UDHAAR INTEREST CHECK / UDHAAR INTEREST CALCUALATIONS ISSUE) @AUTHOR:PRIYANKA-08FEB2022
// *************************************************************************************************************************************************
//
//
//
//
// *************************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR UDHAAR DEPOSIT PAYMENT PANEL @AUTHOR:PRIYANKA-08FEB2022
// *************************************************************************************************************************************************
function showAddUdhaarDepositPayDiv(custId, udhaarId, udhaarAmtLeft, udhaarIntAmt, firmId, udhaarPreSerialNum, udhaarSerialNum, sday, smonth, syear, eday, emonth, eyear, udhaarType, otherInfo, accId, discount, utin_id, mainInvNo, udhaarCounterNew) {
    //alert(mainInvNo);
    //
    var udhaarDepIntRecAccId = document.getElementById('udhaarDepIntRecAccId');
    //
    if (udhaarDepIntRecAccId != null && udhaarDepIntRecAccId != '') {
        udhaarDepIntRecAccId = udhaarDepIntRecAccId.value;
    }
    //
    document.getElementById("utin_main_inv_no").value = mainInvNo;
    //
    //alert('udhaarAmtLeft =1= ' + udhaarAmtLeft);
    //alert('udhaarIntAmt =1= ' + udhaarIntAmt);
    //
    if (udhaarAmtLeft == '' || udhaarAmtLeft == null) {
        udhaarAmtLeft = 0;
    }
    //
    if (udhaarIntAmt == '' || udhaarIntAmt == null) {
        udhaarIntAmt = 0;
    }
    //
    //alert('udhaarAmtLeft =2= ' + udhaarAmtLeft);
    //alert('udhaarIntAmt =2= ' + udhaarIntAmt);
    //
    if (udhaarAmtLeft == 0 && udhaarIntAmt == 0) {
        alert('Please Enter Deposit Amount!');
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (udhaarId == '') {
                    document.getElementById("udharPaymentPanel" + udhaarId).innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("udhaarDepositMonButDiv" + udhaarId).style.visibility = "hidden";
                    document.getElementById("ajaxLoadUdhaarDepositMon" + udhaarId).style.visibility = "hidden";
                    document.getElementById("udhaarDepositMoneyDiv" + udhaarId).innerHTML = xmlhttp.responseText;
                }
            } else {
                if (udhaarId != '') {
                    document.getElementById("udhaarDepositMonButDiv" + udhaarId).style.visibility = "hidden";
                    document.getElementById("ajaxLoadUdhaarDepositMon" + udhaarId).style.visibility = "visible";
                }
            }
        };
        //
        var str = "&paymentPanelName=UdhaarPayment&mainPanelName=udhaar&transPanelName=OnPurchase";
        //
        if (utin_id != '' && typeof (utin_id) != 'undefined') {
            //
            str = "&paymentPanelName=UdhaarPaymentUpdate&mainPanelName=udhaar&transPanelName=OnPurchase&utin_id=" + utin_id;
            //
        }
        //
        //
        // ADDED CODE FOR UDHAAR DEPOSIT DATE ISSUE @AUTHOR:PRIYANKA-08FEB2022
//        var udhaarCounterNew = document.getElementById("udhaarCounterNew").value;
        //
        //alert('udhaarCounterNew == ' + udhaarCounterNew);
        //alert('DOBDay == ' + document.getElementById("DOBDay" + udhaarCounterNew).value);
        //alert('DOBMonth == ' + document.getElementById("DOBMonth" + udhaarCounterNew).value);
        //alert('DOBYear == ' + document.getElementById("DOBYear" + udhaarCounterNew).value);
        //
        var udhaarDOBDayStr = "&DOBDay=" + document.getElementById("DOBDay" + udhaarCounterNew).value;
        var udhaarDOBMonthStr = "&DOBMonth=" + document.getElementById("DOBMonth" + udhaarCounterNew).value;
        var udhaarDOBYearStr = "&DOBYear=" + document.getElementById("DOBYear" + udhaarCounterNew).value;
        //
        //
        var udhaarAmtLeft = +udhaarAmtLeft + +udhaarIntAmt;
        //
        //
        if (udhaarId == '' || udhaarId == null) {
            //
            var paymInfo = document.getElementById("udhaarPayOtherInfo").value;
            //
            xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + custId + "&udhaarAmtLeft=" + udhaarAmtLeft + "&udhaarIntAmt=" + udhaarIntAmt + "&udhaarDepIntRecAccId=" + udhaarDepIntRecAccId +
                    "&firmId=" + firmId + "&PreInvoiceNo=" + udhaarPreSerialNum + "&PostInvoiceNo=" + udhaarSerialNum + "&udhaarType=" + udhaarType +
                    "&accDrId=" + accId + "&PayOtherInfo=" + otherInfo + "&eDOBDay=" + eday + "&eDOBMonth=" + emonth + "&eDOBYear=" + eyear +
                    "&DOBDay=" + sday + "&DOBMonth=" + smonth + "&DOBYear=" + syear + "&paymInfo=" + paymInfo + "&utin_main_inv_no=" + mainInvNo + str, true);
            //   
            xmlhttp.send();
            //
        } else {
            //
            xmlhttp.open("POST", "include/php/ompyamt" + default_theme + ".php?userId=" + custId + "&udhaarId=" + udhaarId + "&udhaarAmtLeft=" + udhaarAmtLeft + "&udhaarIntAmt=" + udhaarIntAmt + "&udhaarDepIntRecAccId=" + udhaarDepIntRecAccId +
                    "&firmId=" + firmId + "&depsoitDisc=" + discount + "&preInvNo=" + udhaarPreSerialNum + "&postInvNo=" + udhaarSerialNum +
                    "&paymentPanelName=UdhaarPayment&mainPanelName=udhaar&transPanelName=UDHAAR" +
                    udhaarDOBDayStr + udhaarDOBMonthStr + udhaarDOBYearStr + "&utin_main_inv_no=" + mainInvNo, true);
            //     
            xmlhttp.send();
            //
        }
    }
}
// *************************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR UDHAAR DEPOSIT PAYMENT PANEL @AUTHOR:PRIYANKA-08FEB2022
// *************************************************************************************************************************************************
//
//
//FUNCTION FOR SET CURSOR AT END @AMOL:21032023
function  PutCursorAtEndOfText(end) {
    var Element = document.getElementById(end);
    var len = Element.value.length;
    if (Element.setSelectionRange) {
        Element.focus();
        Element.setSelectionRange(len, len);
    } else if (Element.createTextRange) {
        var t = Element.createTextRange();
        t.collapse(true);
        t.moveEnd('character', len);
        t.moveStart('character', len);
        t.select();
    }
}


function setSelectedPrice(selectId, inputId) {
    var selectedOption = document.getElementById(selectId).value;
    document.getElementById(inputId).value = selectedOption;
    totalSoftwarePrice();
}

function setMinimumPrice(input) {
    var minPricePack = [
        {
            "id": "software_price_div",
            "minValue": 4000,
            "indication": "Software price should not be less than 4000"
        },
        {
            "id": "printer_pack",
            "minValue": 8070,
            "indication": "Printer price should not be less than 8070"
        },

        {
            "id": "scanner_pack",
            "minValue": 1000,
            "indication": "Scanner price should not be less than 1000"
        },
        {
            "id": "labels_pack",
            "minValue": 650,
            "indication": "Labels price should not be less than 650"
        },

        {
            "id": "inkRoll_pack",
            "minValue": 900,
            "indication": "inkRoll_pack should not be less than 900"
        },
        {
            "id": "cloud_charges",
            "minValue": 15000,
            "indication": "cloud_charges should not be less than 15000"
        },
        {
            "id": "otherAccessories_price",
            "minValue": 300,
            "indication": "otherAccessories_price should not be less than 300"
        },
        {
            "id": "otherAccessories_price",
            "minValue": 150,
            "indication": "otherAccessories_price should not be less than 150"
        }
    ];

    var id = input.id;
    var minValue, message;
    for (var i = 0; i < minPricePack.length; i++) {
        if (minPricePack[i].id === id) {
            minValue = minPricePack[i].minValue;
            message = minPricePack[i].indication;
            break;
        }
    }

    if (input.value < minValue) {
        if (!input.classList.contains("error")) {
            // Add error class to the input field
            input.classList.add("error");

            // Create and append the indication element
            var indication = document.createElement("span");
            indication.className = "error-message";
            indication.textContent = message;
            input.parentNode.insertBefore(indication, input.nextSibling);
        }

        // Set the input value to the minimum value
        input.value = minValue;

        // Display a message to the user
        alert("You entered a value less than the specified minimum value. The value has been set to " + minValue);
    } else {
        if (input.classList.contains("error")) {
            // Remove error class from the input field
            input.classList.remove("error");

            // Remove the indication element
            var indication = input.parentNode.querySelector(".error-message");
            if (indication) {
                indication.parentNode.removeChild(indication);
            }
        }

        // Remove the error message when SELECT PRINTER PRICE is selected
        if (input.value === '0') { // Assuming software_price_div is the ID of the input field showing the error
            if (errorInput && errorInput.classList.contains("error")) {
                errorInput.classList.remove("error");
                var errorIndication = errorInput.parentNode.querySelector(".error-message");
                if (errorIndication) {
                    errorIndication.parentNode.removeChild(errorIndication);
                }
            }
        }
    }
}


oFReaderDoc = new FileReader(), rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;
oFReaderDoc.onload = function (oFREvent) {
    var img = new Image();
    img.onload = function () {
        //document.getElementById("originalImg").src=img.src;
        var canvas = document.createElement("canvas");
        var ctx = canvas.getContext("2d");
        ratio = img.width / img.height;
        if (img.width > 1280) {
            canvas.width = 1280;
            canvas.height = 1280 / ratio;
        } else {
            //alert(document.getElementById("addItemSelectPhoto").files[0].size / 1024);
            //alert(document.getElementById("addItemSelectPhoto").files[0].name.match(/.(png|gif)$/i));
            if (typeof (document.getElementById('checkOMECOMImg')) != 'undefined' &&
                    document.getElementById('checkOMECOMImg') != null) {

                if (parseInt(document.getElementById(DocFileId).files[0].size / 1024) < 1000 && document.getElementById("checkOMECOMImg").value == 'YES') {
                    canvas.width = img.width;
                    canvas.height = img.height;
                } else if (parseInt(document.getElementById(DocFileId).files[0].size / 1024) < 500) {
                    canvas.width = img.width / 2;
                    canvas.height = img.height / 2;
                } else if (parseInt(document.getElementById(DocFileId).files[0].size / 1024) < 1000) {
                    canvas.width = img.width / 3;
                    canvas.height = img.height / 3;
                }
            } else if (parseInt(document.getElementById(DocFileId).files[0].size / 1024) < 200) {
                // alert('333333333'+img.width);
                canvas.width = img.width;
                canvas.height = img.height;
            } else if (parseInt(document.getElementById(DocFileId).files[0].size / 1024) < 500) {
                canvas.width = img.width / 2;
                canvas.height = img.height / 2;
            } else if (parseInt(document.getElementById(DocFileId).files[0].size / 1024) < 1000) {
                canvas.width = img.width / 3;
                canvas.height = img.height / 3;
            }
        }
        document.getElementById(DocCompressFileSize).value = canvas.width * canvas.height * 0.20;
        ctx.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
        //document.getElementById("uploadPreview").src = canvas.toDataURL();
        if (document.getElementById(DocFileId).files[0].name.match(/.(png|gif)$/i) == '.png,png')
            document.getElementById(DocCompressImgId).value = canvas.toDataURL('image/png');
        else
            document.getElementById(DocCompressImgId).value = canvas.toDataURL('image/jpeg');
        //document.getElementById('compressedImageSize').value = canvas.size;
        if (parseInt(document.getElementById(DocFileId).files[0].size / 1024) > 300) {
            canvas.width = 256;
            canvas.height = 256;
        }
        //alert( canvas.height);
        //alert("Image 222 loaded: width=" + canvas.width + ", height=" +canvas.height);
        ctx.drawImage(img, 0, 0, img.width, img.height, 0, 0, canvas.width, canvas.height);
        document.getElementById(DocCompressImgThumb).value = canvas.toDataURL('image/jpeg');
    }
    img.src = oFREvent.target.result;
    //document.getElementById('imageup2').src = img.src;
//
    //document.getElementById('fileName').value = img.src;
};
function loadStaffDocumentFileCompress(FileId, FileInputId, CompressImageId, CompressImageThumb, CompressFileSize, NotifyId)
{
    DocFileId = FileId;
    //DocFileInputId=FileInputId;
    DocCompressImgId = CompressImageId;
    DocCompressImgThumb = CompressImageThumb;
    DocCompressFileSize = CompressFileSize;
    var filePath = document.getElementById(FileId).value;
    if (document.getElementById(FileId).files.length === 0) {
        return;
    }
    var oFile = document.getElementById(FileId).files[0];
    if (!rFilter.test(oFile.type)) {
        document.getElementById(NotifyId).innerText = "Please Enter Valid File";
        document.getElementById(NotifyId).style.color = "red";
        document.getElementById(FileInputId).value = "";
        return;
    } else {
        oFReaderDoc.readAsDataURL(oFile);
        document.getElementById(NotifyId).innerText = filePath;
        document.getElementById(NotifyId).style.color = "Green";
        document.getElementById(FileInputId).value = filePath;
    }
}

function updateAMCCharges() {
    const softwarePriceInput = document.getElementById('software_price_div');
    const amcChargesInput = document.getElementById('amc_charges');
    const softwarePrices = [6800, 8500, 11500, 15500, 17500];
    const amcCharges = ['2500', '3000', '3500', '4500', '5500'];
    const softwarePrice = parseFloat(softwarePriceInput.value);
    const index = softwarePrices.indexOf(softwarePrice);
    const userInput = amcChargesInput.value;
    const isValidAMC = amcCharges.includes(userInput);

    if (index !== -1) {
        amcChargesInput.value = amcCharges[index];
    } else {
        amcChargesInput.value;
    }
}

function updateRemainingAmount() {
    const amountInput = document.getElementById('amount');
    const totalAmountInput = document.getElementById('totalAmount');
    const advanceAmountInput = document.getElementById('advanceMoney');
    const remainingAmountInput = document.getElementById('remainingAmt');
    const gstCharges18 = document.getElementById('gstCharges');
    const discount = document.getElementById('discount');

    let amount = parseFloat(amountInput.value);
    let discountAmount = parseFloat(discount.value);
    let advanceAmount = parseFloat(advanceAmountInput.value);
    let totalAmount = parseFloat(totalAmountInput.value);

    let remainingAmount;
    if (isNaN(advanceAmount)) {
        remainingAmount = totalAmount;
    } else {
        remainingAmount = totalAmount - advanceAmount;
    }
    if (!isNaN(discountAmount)) {
        remainingAmount -= discountAmount;
    }
    if (!isNaN(remainingAmount)) {
        remainingAmountInput.value = remainingAmount.toFixed(2);
    } else {
        remainingAmountInput.value = '';
    }
}

function totalSoftwarePrice() {
    var software_price = parseFloat(document.getElementById('software_price_div').value)
    software_price = software_price ? software_price : 0;
    //
    var printer_pack = parseFloat(document.getElementById('printer_pack').value)
    printer_pack = printer_pack ? printer_pack : 0;
    //
    var scanner_pack = parseFloat(document.getElementById('scanner_pack').value)
    scanner_pack = scanner_pack ? scanner_pack : 0;
    //
    var labels_pack = parseFloat(document.getElementById('labels_pack').value)
    labels_pack = labels_pack ? labels_pack : 0;
    //
    var inkRoll_pack = parseFloat(document.getElementById('inkRoll_pack').value)
    inkRoll_pack = inkRoll_pack ? inkRoll_pack : 0;
    //
    var cloud_charges = parseFloat(document.getElementById('cloud_charges').value)
    cloud_charges = cloud_charges ? cloud_charges : 0;
    //
    var otherAccessories_price = parseFloat(document.getElementById('otherAccessories_price').value);
    otherAccessories_price = otherAccessories_price ? otherAccessories_price : 0;
    //
    var otherAccessories_price2 = parseFloat(document.getElementById('otherAccessories_price2').value);
    otherAccessories_price2 = otherAccessories_price2 ? otherAccessories_price2 : 0;
    var totalAmount = parseFloat(document.getElementById('totalAmount').value);
    //
    var totalSum = parseFloat(software_price) + parseFloat(printer_pack) + parseFloat(scanner_pack) + parseFloat(labels_pack) + parseFloat(inkRoll_pack) + parseFloat(cloud_charges)
            + parseFloat(otherAccessories_price) + parseFloat(otherAccessories_price2);
//        alert('totalSum' + totalSum);
    document.getElementById('totalAmount').value = parseFloat(totalSum);
    amount = (totalSum * 100) / 118;
    gstAmount = document.getElementById('totalAmount').value - amount;

    if (totalSum > 0) {
        let gstCharges18 = document.getElementById('gstCharges');
        if ((gstCharges18.value === '' || gstCharges18.value == null || gstCharges18.value > 1) && (parseFloat(gstCharges18.value) != 0))
        {
            document.getElementById('amount').value = parseFloat(amount).toFixed(2);
            gstCharges18.value = gstAmount.toFixed(2);
        } else if (gstCharges18.value == 0) {
            document.getElementById('amount').value = parseFloat(totalSum).toFixed(2);
            gstCharges18.value = 0.00;
        }
    }
    updateAMCCharges();
    updateRemainingAmount();
}

var incentives = [
    {minDays: 0, maxDays: 7, value: 150},
    {minDays: 7, maxDays: 14, value: 100},
    {minDays: 14, maxDays: 21, value: 50}
];

function calculateDayIncentive(days) {
    var parsedDays = parseInt(days);
    if (!isNaN(parsedDays)) {
        var incentiveValue = getIncentiveValue(parsedDays);
        document.getElementById("day_incentive").value = incentiveValue;
    } else {
        document.getElementById("day_incentive").value = "Invalid input";
    }
}

function getIncentiveValue(days) {
    for (var i = 0; i < incentives.length; i++) {
        if (days >= incentives[i].minDays && days < incentives[i].maxDays) {
            return incentives[i].value;
        }
    }
    return 0; // Default incentive if the days exceed the defined ranges
}


var amountIncentives = [
    {minAmount: 30000, value: 300},
    {minAmount: 60000, value: 500},
    {minAmount: 100000, value: 1000}
];

function calculateAmountIncentive(amount) {
    var parsedAmount = parseFloat(amount);
    if (!isNaN(parsedAmount)) {
        var incentiveValue = getAmountIncentiveValue(parsedAmount);
        document.getElementById("amt_incentive").value = incentiveValue;
    } else {
        document.getElementById("amt_incentive").value = "Invalid input";
    }
}

function getAmountIncentiveValue(amount) {
    for (var i = 0; i < amountIncentives.length; i++) {
        if (amount >= amountIncentives[i].minAmount) {
            return amountIncentives[i].value;
        }
    }
    return 0; // Default incentive if the amount is below the defined thresholds
}


function calculateHardwareIncentive() {
    var hardwareIncentiveInput = document.getElementById('hardware_incentive');
    var rfidOption = document.getElementById('otherAccessories');
    var rfidValue = rfidOption.value;

    if (rfidValue === '5000') {
        hardwareIncentiveInput.value = '1000';
    } else {
        hardwareIncentiveInput.value = '';
    }

    totalIncentive();
}

function totalIncentive() {
    var amtIncentiveInput = document.getElementById('amt_incentive');
    var dayIncentiveInput = document.getElementById('day_incentive');
    var hardwareIncentiveInput = document.getElementById('hardware_incentive');
    var totIncentiveInput = document.getElementById('tot_incentive');

    var amtIncentive = parseFloat(amtIncentiveInput.value) || 0; // Use 0 if NaN
    var dayIncentive = parseFloat(dayIncentiveInput.value) || 0; // Use 0 if NaN
    var hardwareIncentive = parseFloat(hardwareIncentiveInput.value) || 0; // Use 0 if NaN

    var totalIncentive = amtIncentive + dayIncentive + hardwareIncentive;
    totIncentiveInput.value = totalIncentive.toFixed(2);
}
// add help medal popup 7 july 2023


function DisplayhelpPopup() {
    document.getElementById('help-menu-modal').style.display = 'block';

}

function showFullFrm() {
    document.getElementById('showfrm').style.display = 'block';
    document.getElementById('frmname_hid').value = 'showfrm';
    document.getElementById('LineFrm').style.display = 'none';
}
//
function setTemplate(panelname, thisvalue, searchValue = "") {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("templateSetting").innerHTML = xmlhttp.responseText;
        } else {

        }

    };

    if (thisvalue == "template_1")
    {
        xmlhttp.open("POST", "include/php/omdisctemp1.php", true);
        //   
        xmlhttp.send();
    } else if (thisvalue == "template_2")
    {
        xmlhttp.open("POST", "include/php/omdisctemp2.php", true);
        //   
        xmlhttp.send();
    } else if (thisvalue == "COUPON LIST")
    {
        xmlhttp.open("POST", "include/php/omtempcoupon" + default_theme + ".php?c_offer_list=" + searchValue, true);
        //   
        xmlhttp.send();
}

}



// Add Active class on navigation onclick  Author @ RANI 30AUG2023 

function showact(ulTag, Id)
{
    var navItems = document.querySelectorAll('.' + ulTag);
    for (var i = 0; i < navItems.length; i++) {
        navItems[i].classList.remove("active");
    }
    document.getElementById(Id).classList.add("active");
}

// Add overflow dropdown on navigation onclick  Author @ RANI 20 Sep 2023   

$(function () {
    //add BT DD show event
    $(".dropdown.Home-menu").on("show.bs.dropdown", function () {
        var $btnDropDown = $(this).find(".dropdown-toggle");
        var $listHolder = $(this).find(".dropdown-menu");

        //reset position property for DD container
        $(this).css("position", "static");
//    $listHolder.css({
//      "top": ($btnDropDown.offset().top + $btnDropDown.outerHeight(true)) + "px",
//      "left": $btnDropDown.offset().left + "px"
//    });
        $listHolder.data("open", true);
//    $(this).css("position", "relative");
    });
    //add BT DD hide event
    $(".dropdown.Home-menu").on("hidden.bs.dropdown", function () {
        var $listHolder = $(this).find(".dropdown-menu");
        $listHolder.data("open", false);


    });
    //add on scroll for table holder
    $(".ak-holder").scroll(function () {
        var $ddHolder = $(this).find(".dropdown")
        var $btnDropDown = $(this).find(".dropdown-toggle");
        var $listHolder = $(this).find(".dropdown-menu");
        if ($listHolder.data("open")) {
//      $listHolder.css({
//        "top": ($btnDropDown.offset().top + $btnDropDown.outerHeight(true)) + "px",
//        "left": $btnDropDown.offset().left + "px"
//      });
            $ddHolder.toggleClass("open", ($btnDropDown.offset().left > $(this).offset().left))
        }
    })
});

//////////////////////ADD FOR COUPON LIST GOOGLESUGGESTION @SONALI03NOV2023//////////////////////////////////
function searchCouponList(offerName, divNum, keyCodeInput, documentRootPath) {
    keyCodeForItemNames = keyCodeInput;
    divNumForItemNames = divNum;
    //panelNameForItemNames = divNum;
    //c_offer_name
    var poststr = "c_offer_name=" + encodeURIComponent(offerName)
            //+ "&c_firm_name=" + encodeURIComponent(selFirmName) 
            + "&divNum=" + encodeURIComponent(divNum);
    //
    search_stock_item_names(documentRootPath + "/include/php/ommasteritemsearch" + default_theme + ".php", poststr);
}
//
//************Start Code To for applying discount by coupon code on payment panel @Author:ASHWINI SOLANKI 25OCT2023************/
function enterCouponCode(utin_disc_cpn, prefix) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//
            var responseArray = xmlhttp.responseText.split("||");
//            alert(responseArray[0]);
            document.getElementById("utin_discount_per_discup").value = responseArray[1]; // Assuming you want the first split value

            document.getElementById("utin_discount_on").value = responseArray[0];
            if (utin_disc_cpn.length == 8) {
                if (xmlhttp.responseText.trim() == '') {
                    alert('Invalid Coupon Code.');
                    document.getElementById("utin_discount_per_discup").value = '';
                } else if (xmlhttp.responseText.trim() == 'Redeem') {
                    alert('This coupon is already Redeemed');
                    document.getElementById("utin_discount_per_discup").value = '';
                } else {
                    document.getElementById("utin_discount_per_discup").value = responseArray[1];
                }
            } else {
                alert('Please Provide Correct Coupon Code');
            }
            //
            calDiscountAmt(prefix);
            calcPaymentCashBalance(prefix);
//            document.getElementById("utin_discount_per_discup").value = responseArray[1];
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcpndiscountpay" + default_theme + ".php?disc_cpn=" + utin_disc_cpn, true);
    xmlhttp.send();
}
//************End Code To for applying discount by coupon code on payment panel @Author:ASHWINI SOLANKI 25OCT2023************/
//
function checkAPIKeyNoFields(panel, ownerId, apiKeyPassword) {
    // Validate Password
    if (validateEmptyField(document.getElementById("apiKeyPassword").value, "Please enter Password!") == false) {
        document.getElementById("apiKeyPassword").focus();
        return false;
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText != '') {
                    const responseText = xmlhttp.responseText.trim();  // Remove extra spaces/newlines
                    console.log("Server response:", responseText);  // Log the response for debugging

                    try {
                        const myArray = JSON.parse(responseText);  // Parse JSON response
                        document.getElementById("public_api_key").value = myArray['own_api_key']; // Set API Key value
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                        alert("There was an error with the response.");
                    }
                }
            } else {
                // Do Nothing (optionally add a loading indicator)
            }
        };

        // Send the request based on panel type
        xmlhttp.open("POST", "include/php/omGenerateApiKey.php?apiKeyPassword=" + apiKeyPassword + "&panel=" + panel, true);
        xmlhttp.send();
    }
}
function submitImageForm(itemDivCount) {
    var form = document.getElementById('uploadForm_' + itemDivCount);

    // 1. Check if file input has a file
    var fileInput = document.getElementById('addItemSelectPhoto' + itemDivCount);
    var fileSelected = fileInput && fileInput.files && fileInput.files.length > 0;

    // 2. Check if webcam image has data
    var webcamInput = document.getElementById('webcam_file' + itemDivCount);
    var webcamData = webcamInput && webcamInput.value && webcamInput.value.trim().length > 0;

    // 3. If neither is present, show error and do not submit
    if (!fileSelected && !webcamData) {
        alert('Please upload an image or capture one with the webcam before updating.');
        return false;
    }

    // Proceed with AJAX as before
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onload = function () {
        alert(xhr.responseText);
        // Hide the filename textbox after successful update
        var fileNameField = document.getElementById('fileName' + itemDivCount);
        if (fileNameField) fileNameField.style.display = "none";
        // Optionally refresh image preview here
    };
    xhr.onerror = function () {
        alert('Error connecting to server!');
    };
    xhr.send(formData);
    return false;
}



//
// Function to toggle the visibility of the API key
//    function toggleApiKeyVisibility() {
//        var apiKeyField = document.getElementById('public_api_key');
//        var showApiKeyCheckbox = document.getElementById('showApiKey');
//         var showApiKeyHideCheckbox = document.getElementById('HideApiKey');
//
//        if (showApiKeyCheckbox.checked) {
//            apiKeyField.type = 'text';  // Show the API Key
//            showApiKeyCheckbox.style.display='none';
//              showApiKeyHideCheckbox.style.display='block';
//        } else {
//            apiKeyField.type = 'password';  // Hide the API Key
//             showApiKeyCheckbox.style.display='block';
//              showApiKeyHideCheckbox.style.display='none';
//        }
//    }


//// File: your-main-script.js
//
///**
// * Processes a given image to load it lazily.
// * @param {HTMLImageElement} lazyImage The image element to process.
// */
//function processLazyImage(lazyImage) {
//    if (lazyImage.classList.contains('lazy-src-set') || lazyImage.classList.contains('lazy-loaded')) {
//        return; // Already processed or loaded
//    }
//
//    // Check if in viewport (or close to it)
//    const rect = lazyImage.getBoundingClientRect();
//    const isInViewport = (
//        rect.top <= (window.innerHeight || document.documentElement.clientHeight) + 200 && // 200px buffer
//        rect.bottom >= -200 && // 200px buffer
//        rect.left <= (window.innerWidth || document.documentElement.clientWidth) + 200 &&
//        rect.right >= -200
//    );
//
//    if (isInViewport && getComputedStyle(lazyImage).display !== "none") {
//        lazyImage.src = lazyImage.dataset.src;
//        lazyImage.classList.add('lazy-src-set'); // Mark that src has been set
//
//        lazyImage.addEventListener('load', function() {
//            lazyImage.classList.remove('lazy'); // Optional: remove base lazy class
//            lazyImage.classList.add('lazy-loaded');
//        }, { once: true });
//
//        lazyImage.addEventListener('error', function() {
//            console.error('Lazy image failed to load:', lazyImage.dataset.src);
//            lazyImage.classList.add('lazy-error');
//            // You could set a fallback error image here if desired
//            // lazyImage.src = 'path/to/error-image.png';
//        }, { once: true });
//    }
//}
//
///**
// * Scans a container (or the whole document) for lazy images and processes them.
// * @param {HTMLElement} [container=document] - The container element to scan.
// */
//function scanAndLoadLazyImages(container) {
//    const elementToScan = container || document;
//    const imagesToLoad = elementToScan.querySelectorAll('img.lazy:not(.lazy-src-set):not(.lazy-loaded)');
//    imagesToLoad.forEach(processLazyImage);
//}
//
//// --- Global Event Handling ---
//let scrollAndResizeDebounceTimer;
//
//function handleScrollOrResize() {
//    clearTimeout(scrollAndResizeDebounceTimer);
//    scrollAndResizeDebounceTimer = setTimeout(function() {
//        scanAndLoadLazyImages(document); // Scan the whole document
//    }, 150); // Debounce an appropriate amount
//}
//
//// Attach global listeners ONCE when the page first loads
//document.addEventListener('DOMContentLoaded', function() {
//    // Initial scan for images already in the DOM on page load
//    scanAndLoadLazyImages(document);
//
//    window.addEventListener('scroll', handleScrollOrResize, { passive: true });
//    window.addEventListener('resize', handleScrollOrResize);
//    window.addEventListener('orientationchange', handleScrollOrResize);
//
//    // If you have a MutationObserver for dynamically added content (more advanced)
//    // you could also trigger scanAndLoadLazyImages from there.
//    // For now, calling it after AJAX is the simplest for this case.
//});
//
//
//// --- Function to be called explicitly after AJAX content is added ---
///**
// * Specifically scans and attempts to load lazy images within a newly added HTML fragment or container.
// * This is typically called in an AJAX success callback.
// * @param {HTMLElement} newContentContainer - The HTML element that now contains the new lazy images.
// */
//function initializeLazyLoadForNewContent(newContentContainer) {
//    if (newContentContainer && typeof newContentContainer.querySelectorAll === 'function') {
//        // console.log("Initializing lazy load for new content in:", newContentContainer);
//        scanAndLoadLazyImages(newContentContainer);
//    } else {
//        // console.warn("initializeLazyLoadForNewContent called with invalid container, scanning whole document.");
//        scanAndLoadLazyImages(document); // Fallback to whole document if container is bad
//    }
//}

// File: your-main-script.js

/**
 * Processes a given image to load it lazily.
 * THIS FUNCTION NOW DIRECTLY TRIES TO LOAD THE IMAGE, IGNORING VIEWPORT CHECK INITIALLY
 * WHEN CALLED FROM initializeLazyLoadForNewContent.
 * The viewport check is still relevant for scroll-triggered loading.
 *
 * @param {HTMLImageElement} lazyImage The image element to process.
 * @param {boolean} [checkViewport=true] - Whether to check if the image is in viewport.
 */
function processLazyImage(lazyImage, checkViewport = true) {
    if (lazyImage.classList.contains('lazy-src-set') || lazyImage.classList.contains('lazy-loaded')) {
        return; // Already processed or loaded
    }

    let shouldLoad = false;
    if (!checkViewport) { // If explicitly told not to check viewport (e.g., initial load of new content)
        shouldLoad = true;
    } else { // For scroll/resize events, check viewport
        const rect = lazyImage.getBoundingClientRect();
        const buffer = 200; // Pixels an image can be outside the viewport and still load
        shouldLoad = (
            rect.top <= (window.innerHeight || document.documentElement.clientHeight) + buffer &&
            rect.bottom >= -buffer &&
            rect.left <= (window.innerWidth || document.documentElement.clientWidth) + buffer &&
            rect.right >= -buffer
        );
    }

    if (shouldLoad && getComputedStyle(lazyImage).display !== "none") {
        lazyImage.src = lazyImage.dataset.src;
        lazyImage.classList.add('lazy-src-set'); // Mark that src has been set

        lazyImage.addEventListener('load', function() {
            lazyImage.classList.remove('lazy'); // Optional: remove base lazy class
            lazyImage.classList.add('lazy-loaded');
        }, { once: true });

        lazyImage.addEventListener('error', function() {
            console.error('Lazy image failed to load:', lazyImage.dataset.src);
            lazyImage.classList.add('lazy-error');
        }, { once: true });
    }
}

/**
 * Scans a container (or the whole document) for lazy images and processes them.
 * @param {HTMLElement} [container=document] - The container element to scan.
 * @param {boolean} [checkViewport=true] - Passed to processLazyImage.
 */
function scanAndLoadLazyImages(container, checkViewport = true) {
    const elementToScan = container || document;
    const imagesToLoad = elementToScan.querySelectorAll('img.lazy:not(.lazy-src-set):not(.lazy-loaded)');
    imagesToLoad.forEach(img => processLazyImage(img, checkViewport));
}

// --- Global Event Handling for scroll/resize (fallback) ---
let scrollAndResizeDebounceTimer;

function handleScrollOrResize() {
    clearTimeout(scrollAndResizeDebounceTimer);
    scrollAndResizeDebounceTimer = setTimeout(function() {
        scanAndLoadLazyImages(document, true); // ALWAYS check viewport on scroll/resize
    }, 150);
}

// Attach global listeners ONCE when the page first loads
document.addEventListener('DOMContentLoaded', function() {
    // Initial scan for images already in the DOM on page load.
    // Load images in viewport immediately, others will wait for scroll.
    scanAndLoadLazyImages(document, true); // Check viewport for initial static content

    window.addEventListener('scroll', handleScrollOrResize, { passive: true });
    window.addEventListener('resize', handleScrollOrResize);
    window.addEventListener('orientationchange', handleScrollOrResize);
});


// --- Function to be called explicitly after AJAX content is added ---
/**
 * Specifically scans and attempts to load ALL lazy images within a newly added HTML fragment or container,
 * optionally with a delay, and WITHOUT initially checking the viewport for these new images.
 * @param {HTMLElement} newContentContainer - The HTML element that now contains the new lazy images.
 * @param {number} [delayMs=0] - Delay in milliseconds before starting to load images. 0 for immediate.
 */
function initializeLazyLoadForNewContent(newContentContainer, delayMs = 0) {
    if (!newContentContainer || typeof newContentContainer.querySelectorAll !== 'function') {
        console.warn("initializeLazyLoadForNewContent called with invalid container.");
        return;
    }

    // console.log(`Initializing lazy load for new content in:`, newContentContainer, `with delay: ${delayMs}ms`);

    if (delayMs > 0) {
        setTimeout(function() {
            scanAndLoadLazyImages(newContentContainer, false); // false = DON'T check viewport for this initial batch
        }, delayMs);
    } else {
        scanAndLoadLazyImages(newContentContainer, false); // false = DON'T check viewport for this initial batch
    }
}