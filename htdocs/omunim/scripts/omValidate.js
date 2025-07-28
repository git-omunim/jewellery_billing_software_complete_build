var nVer = navigator.appVersion;
var nAgt = navigator.userAgent;
var browserName = navigator.appName;
var fullVersion = '' + parseFloat(navigator.appVersion);
var majorVersion = parseInt(navigator.appVersion, 10);
var nameOffset, verOffset, ix;

// In Opera, the true version is after "Opera" or after "Version"
if ((verOffset = nAgt.indexOf("Opera")) != -1) {
    browserName = "Opera";
    fullVersion = nAgt.substring(verOffset + 6);
    if ((verOffset = nAgt.indexOf("Version")) != -1)
        fullVersion = nAgt.substring(verOffset + 8);
}
// In MSIE, the true version is after "MSIE" in userAgent
else if ((verOffset = nAgt.indexOf("MSIE")) != -1) {
    browserName = "Microsoft Internet Explorer";
    fullVersion = nAgt.substring(verOffset + 5);
}
// In Chrome, the true version is after "Chrome" 
else if ((verOffset = nAgt.indexOf("Chrome")) != -1) {
    browserName = "Chrome";
    fullVersion = nAgt.substring(verOffset + 7);
}
// In Safari, the true version is after "Safari" or after "Version" 
else if ((verOffset = nAgt.indexOf("Safari")) != -1) {
    browserName = "Safari";
    fullVersion = nAgt.substring(verOffset + 7);
    if ((verOffset = nAgt.indexOf("Version")) != -1)
        fullVersion = nAgt.substring(verOffset + 8);
}
// In Firefox, the true version is after "Firefox" 
else if ((verOffset = nAgt.indexOf("Firefox")) != -1) {
    browserName = "Firefox";
    fullVersion = nAgt.substring(verOffset + 8);
}
// In most other browsers, "name/version" is at the end of userAgent 
else if ((nameOffset = nAgt.lastIndexOf(' ') + 1) <
        (verOffset = nAgt.lastIndexOf('/')))
{
    browserName = nAgt.substring(nameOffset, verOffset);
    fullVersion = nAgt.substring(verOffset + 1);
    if (browserName.toLowerCase() == browserName.toUpperCase()) {
        browserName = navigator.appName;
    }
}
// trim the fullVersion string at semicolon/space if present
if ((ix = fullVersion.indexOf(";")) != -1)
    fullVersion = fullVersion.substring(0, ix);
if ((ix = fullVersion.indexOf(" ")) != -1)
    fullVersion = fullVersion.substring(0, ix);

majorVersion = parseInt('' + fullVersion, 10);
if (isNaN(majorVersion)) {
    fullVersion = '' + parseFloat(navigator.appVersion);
    majorVersion = parseInt(navigator.appVersion, 10);
}

//document.write(''
// +'Browser name  = '+browserName+'<br>'
// +'Full version  = '+fullVersion+'<br>'
// +'Major version = '+majorVersion+'<br>'
// +'navigator.appName = '+navigator.appName+'<br>'
// +'navigator.userAgent = '+navigator.userAgent+'<br>'
//)
//------------------------------------------------------------------------------------------------------
function validateEmptyField(field, alerttxt) {
    String.prototype.trim = function () {
        return this.replace(/^\s*/, "").replace(/\s*$/, "");
    };
    field = field.trim();
    if (field == null || field == "") {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateLength4(field, alerttxt) {
    if (field.length < 4) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateLength6(field, alerttxt) {
    if (field.length < 6) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateLength8(field, alerttxt) {
    if (field.length < 8) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateLengthExact8(field, alerttxt) {
    if (field.length != 8) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateLength10(field, alerttxt) {
    if (field.length < 10) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateAlphaNum(field, alerttxt) {
    var alphaExp = /^[0-9a-zA-Z]+$/;
    if (!field.match(alphaExp)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateAlphaNumWithSpace(field, alerttxt) {
    var alphaExp = /^[0-9a-zA-Z\s]+$/;
    if (!field.match(alphaExp)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateAlpha(field, alerttxt) {
    var alphaExp = /^[a-zA-Z]+$/;
    if (!field.match(alphaExp)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateAlphaWithSpace(field, alerttxt) {
    var alphaExp = /^[a-zA-Z\s]+$/;
    if (!field.match(alphaExp)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateAlphaWithSpaceWithSlash(field, alerttxt) {
    var alphaExp = /^[a-zA-Z\s\\]+$/;
    if (!field.match(alphaExp)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateAlphaNumWithSpaceWithSlash(field, alerttxt) {
    var alphaExp = /^[0-9a-zA-Z\s\/\\]+$/;
    if (!field.match(alphaExp)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateAlphaWithSpaceWithOutAlert(field) {
    var alphaExp = /^[a-zA-Z\s]+$/;
    if (!field.match(alphaExp)) {
        return false;
    } else {
        return true;
    }
}
function validateNum(field, alerttxt) {
    var alphaExp = /^[0-9]+$/;
    if (!field.match(alphaExp)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateNumWithUnderScore(field, alerttxt) {
    var alphaExp = /^[0-9_]+$/;
    if (!field.match(alphaExp)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateNumWithOutAlert(field) {
    var alphaExp = /^[0-9]+$/;
    if (!field.match(alphaExp)) {
        return false;
    } else {
        return true;
    }
}
function validateNumWithSpace(field, alerttxt) {
    var alphaExp = /^[0-9\s]+$/;
    if (!field.match(alphaExp)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateNumWithDot(field, alerttxt) {
    var alphaExp = /^(?!.*\.{2,}.*$)(?!.*\..*\..*$)[0-9.]+$/;
    if (!field.match(alphaExp)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateAlphaNumWithDot(field, alerttxt) {
    var alphaExp = /^(?!.*\.{2,}.*$)(?!.*\..*\..*$)[0-9a-zA-Z.]+$/;
    if (!field.match(alphaExp)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateSelectField(field, alerttxt) {
    if (field == "NotSelected" || field == "" || field == null) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateTwoSelectField(field1, field2, alerttxt) {
    if ((field1 == "NotSelected" || field1 == "" || field1 == null) && (field2 == "NotSelected" || field2 == "" || field2 == null)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateSmsInputs() {
    if (validateLengthSms(document.getElementById("smsText").value, "Mesaage length should be maximum 1000!") == false) {
        document.getElementById("smsText").focus();
        return false;
    }
    return true;
}
/***********Start Code To Hide Alert @Author:PRIYA19AUG13********/
function validateLengthSms(field, alerttxt) {
    if (field.length > 1000) {
        // alert('hi');
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
/***********End Code To Hide Alert @Author:PRIYA19AUG13********/
function validateLengthMobNo(field, alerttxt) {
    if (field.length < 10 || field.length > 10) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function isNumberKeyWithComma(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 44)
        return false;
    return true;
}
function valMultiMobNo(field, evt) {
    var mobNoLen = field.length;
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (mobNoLen < 10) {
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
    } else if (mobNoLen == 10) {
        if (charCode != 44) {
            document.getElementById("mobileNo").value = document.getElementById("mobileNo").value + ",";
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
        }
    } else {
        mobNoLen = mobNoLen - 11 * parseInt(mobNoLen / 11);
        if (mobNoLen < 10) {
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
        } else if (mobNoLen == 10) {
            if (charCode != 44) {
                document.getElementById("mobileNo").value = document.getElementById("mobileNo").value + ",";
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
            }
        }
    }
    return true;
}
function hasHindiCharacters(str)
{
    for (var x = 0; x < str.length; x++)
    {
        var charCode = (str.charAt(x)).charCodeAt();
        if (charCode >= 2309 && charCode <= 2361)
            return true;
    }
    return false;
}
function relNPrintReleaseCart(obj, subButtId) {

    if (subButtId == 'print') {

        var paidAmtArray = new Array();
        var paidAmtStr = "";

        var discountAmtArray = new Array();
        var discountAmtStr = "";

        for (var i = 0; i < document.getElementById("counter").value; i++) {

            paidAmtArray[i] = document.getElementById("paidAmt" + i).value;
        }
        for (var j = 0; j < document.getElementById("counter").value; j++)
        {
            paidAmtStr += "document.getElementById('paidAmt" + j + "').value =" + paidAmtArray[j] + ";";
        }

        for (var k = 0; k < document.getElementById("counter").value; k++) {

            discountAmtArray[k] = document.getElementById("discountAmt" + k).value;
        }
        for (var l = 0; l < document.getElementById("counter").value; l++)
        {
            discountAmtStr += "document.getElementById('discountAmt" + l + "').value =" + discountAmtArray[l] + ";";
        }

        var totalPaidAmtStr = "document.getElementById('totalPaidAmt').value =" + document.getElementById("totalPaidAmt").value + ";";

        var totalDiscountAmtStr = "document.getElementById('totalDiscountAmt').value =" + document.getElementById("totalDiscountAmt").value + ";";

        var DocumentContainer = document.getElementById(obj);
        var html = '<html><head><title>Online Munim - Print Page    www.OnlineMunim.com     www.omunim.com</title>' +
                '<link href="css/print.css" rel="stylesheet" type="text/css" />' +
                '</head><body>' +
                DocumentContainer.innerHTML +
                '<br /><script type="text/javascript">' + paidAmtStr + discountAmtStr + totalPaidAmtStr + totalDiscountAmtStr +
                '</script>' +
                '<a style="cursor: pointer;" onClick="window.print();"><img src="images/printer32.png" alt="Print" title="Print" width="32px" height="32px" /></a>' +
                '</body></html>';

        var WindowObject = window.open("", "PrintWindow", "width=1100,height=800,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");

        WindowObject.document.open();
        WindowObject.document.writeln(html);
        WindowObject.document.close();
        WindowObject.focus();
    } else if (subButtId == 'release') {

        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        confirm_box = confirm("Do you really want to release this Girvi?");
        if (confirm_box == true)
        {
            var girviIdArray = new Array();

            for (var i = 0; i < document.getElementById("counter").value; i++) {

                girviIdArray[i] = document.getElementById("girviId" + i).value;

            }

            //********* Start Release All Girvi From Release Girvi Cart *********************

            document.getElementById('releasePrintButtDiv').innerHTML = "<img src='images/ajaxLoad.gif' />";


            var poststr = "girviIdArray=" + girviIdArray;

            rel_all_girvi_frm_rel_cart('include/php/orgrrfrc.php', poststr);



            function rel_all_girvi_frm_rel_cart(url, parameters) {

                loadXMLDoc();

                xmlhttp.onreadystatechange = alertRelAllGirviFrmRelCart;

                xmlhttp.open('POST', url, true);
                xmlhttp.setRequestHeader('Content-Type',
                        'application/x-www-form-urlencoded');
                xmlhttp.setRequestHeader("Content-length", parameters.length);
                xmlhttp.setRequestHeader("Connection", "close");
                xmlhttp.send(parameters);

            }

            function alertRelAllGirviFrmRelCart() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById('releasePrintButtDiv').innerHTML = "<img src='images/ajaxLoad.gif' />";
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";


                }

            }

            //********* Release All Girvi From Release Girvi Cart *****************
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        }
    }
}
//Print Girvi List
//start to change function @AUTHOR: SANDY7DEC13
//Start to change function @AUTHOR: SANDY06JAN14
function printGirviListPanel(obj) {
    var DocumentContainer = document.getElementById(obj);

    var head;
    head = document.getElementById("girviPanelTrId");
    head.style.position = "relative";
    head.style.top = "0px"
    head.style.visibility = "hidden";

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
            '</head><body>' +
            '<div id="girviListPanelDiv">' +
            DocumentContainer.innerHTML +
            '</div>' +
            '<a style="cursor: pointer;" onClick="window.print();"><img src="images/printer32.png" class="noPrint" alt="Print" title="Print" width="32px" height="32px" /></a>' +
            '</body></html>';

    var WindowObject = window.open("", "PrintWindow", "width=900,height=900,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");

    WindowObject.document.open();
    WindowObject.document.writeln(html);
    WindowObject.document.close();
    WindowObject.focus();
}
//End to change function @AUTHOR: SANDY06JAN14
//End to change function @AUTHOR: SANDY7DEC13
//Print Page Div
//Start code to add css file and table @Author:PRIYA22NOV13
/*********Start code to delete header div @Author:PRIYA06FEB14**************/
function printPageDiv(obj, headerId) {
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
            '<link href="css/style.css" rel="stylesheet" type="text/css" />' +
            '<script type="text/javascript" src="scripts/emNavigation.js"></script>' +
            '<script type="text/javascript" src="scripts/emValidate.js"></script>' +
            '<script type="text/javascript" src="scripts/emAddOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/emOwnerLogin.js"></script>' +
            '<script type="text/javascript" src="scripts/emUpdateOwner.js"></script>' +
            '<script type="text/javascript" src="scripts/orAddFunction_1_6_1.js"></script>' +
            '<script type="text/javascript" src="scripts/ogAddFunction_1_6_1.js"></script>' +
            '</head><body>' +
            '<table align=center>' + '<tr><td align=center>' +
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
/*********Start code to delete header div @Author:PRIYA06FEB14**************/
//End code to add css file and table @Author:PRIYA22NOV13
//Print BalanceSheet Div
/*************Start Code To Add Panel Name @AUTHOR:PRIYA09JUNE13************/
/*************Start Code To Add Panel Name @AUTHOR:PRIYA20JUNE13************/
/*************Start Code To Add css Files @Author:PRIYA19AUG13************/
/*************Start Code To Add Div @Author:PRIYA30OCT13************/
/*************Start Code To Add panel @Author:PRIYA18FEB14************/
function printBalanceSheetDiv(HeaderDiv, balanceSheet_form, panelName) {
    loadXMLDoc();
    if (HeaderDiv == 'purchaseReportSubDiv' || HeaderDiv == 'sellReportSubDiv') { //change in line @AUTHOR: SANDY7DEC13
        var poststr = "date=" + encodeURIComponent(document.getElementById("sellDayDD").value)
                + "&month=" + encodeURIComponent(document.getElementById("sellMonthM").value)
                + "&year=" + encodeURIComponent(document.getElementById("sellYearY").value);
    } else {
        poststr = "balanceSheetYear=" + encodeURIComponent(balanceSheet_form.balanceSheetYear.value)
                + "&balanceSheetMonth=" + encodeURIComponent(balanceSheet_form.balanceSheetMonth.value);
    }

    var head;
    /*******Start to comment code  @AUTHOR: SANDY10DEC13************/
    //if(panelName=='GOLD'){
    head = document.getElementById("headerTable");
    //}else{
    // head = document.getElementById("silverStockheaderTable"); 
    //}
    /*******End to comment code  @AUTHOR: SANDY10DEC13************/
    head.style.position = "relative";
    head.style.top = "0px"
    head.style.visibility = "visible";
    var DocumentHeader = document.getElementById(HeaderDiv);

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("ajaxLoadPrintBalanceSheetDiv").style.visibility = "hidden";

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
                    '</head><body>' +
                    DocumentHeader.innerHTML +
                    '<a style="cursor: pointer;" onClick="window.print();"><div class="marginTop20"><img src="images/printer32.png" alt="Print" title="Print" class="noPrint" width="32px" height="32px" /></div></a>' + //add noPrint class FOR print button @AUTHOR: SANDY11DEC13
                    '</body></html>';
            /*********Start Code To Comment @Author:PRIYA23AUG13***********/
            //            
            //            '</head><body>'+
            //            DocumentHeader.innerHTML + 
            //            '</body></html>' + 
            //            xmlhttp.responseText +
            //            '<html><body>'+
            //            '<br />' +
            //            '<a style="cursor: pointer;" onClick="window.print();"><img src="images/printer32.png" alt="Print" title="Print" width="32px" height="32px" /></a>' +
            //            '</body></html>';
            /*********End Code To Comment @Author:PRIYA23AUG13***********/
            var WindowObject = window.open("", "PrintWindow", "width=1000,height=900,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");//width Changed 980 to 990 @Author:SANDY9DEC13//width Changed 1000 to 980 @Author:PRIYA23AUG13

            WindowObject.document.open();
            WindowObject.document.writeln(html);
            WindowObject.document.close();
            WindowObject.focus();

        } else {
            document.getElementById("ajaxLoadPrintBalanceSheetDiv").style.visibility = "visible";
        }
    };
    if (panelName == 'OMREVO') {
        xmlhttp.open("POST", "include/php/orbbblsh.php?" + poststr + "", true);//fileName Changed @Author:PRIYA24JUL13
    } else if (panelName == 'GOLD') {
        xmlhttp.open("POST", "include/php/ogbbgdbs.php?" + poststr + "", true);//fileName Changed @Author:PRIYA24JUL13
    } else if (panelName == 'SILVER') {
        xmlhttp.open("POST", "include/php/ogbbslbs.php?" + poststr + "", true);//fileName Changed @Author:PRIYA24JUL13
    } 
    else if (panelName == 'RawMetalGold') { // ADDED CODE FOR RAW METAL GOLD STOCK @Author:PRIYANKA-30AUG2021
        xmlhttp.open("POST", "include/php/ogbbrwbs.php?" + poststr + "", true);
    } 
    else if (panelName == 'RawMetalSilver') { // ADDED CODE FOR RAW METAL SILVER STOCK @Author:PRIYANKA-30AUG2021
        xmlhttp.open("POST", "include/php/ogbbrwslbs.php?" + poststr + "", true);
    } 
    else if (panelName == 'STONE') { // ADDED CODE FOR STONE STOCK @Author:PRIYANKA-30AUG2021
        xmlhttp.open("POST", "include/php/ombbstbs.php?" + poststr + "", true);
    } 
    else if (panelName == 'STONE_TRANS') { // ADDED CODE FOR STONE TRANSACTION @Author:PRIYANKA-30AUG2021
        xmlhttp.open("POST", "include/php/ombbsttrep.php?" + poststr + "", true);
    }
    else if (panelName == 'TransGirvi') { // FOR transferred girvi ledger @AUTHOR: SANDY6AUG13
        xmlhttp.open("POST", "include/php/orbbtrgl.php?" + poststr + "", true);//fileName Changed @Author:PRIYA24JUL13
    } else if (panelName == 'UDHAAR') { // FOR Udhaar ledger @Author:PRIYA20AUG13
        xmlhttp.open("POST", "include/php/ombbuubd.php?" + poststr + "", true);
    } else if (panelName == 'PurchaseReport') { // FOR Udhaar ledger @Author:PRIYA20AUG13
        xmlhttp.open("POST", "include/php/ogbbprbs.php?" + poststr + "", true);
    } else if (panelName == 'SellReport') { // FOR Udhaar ledger @Author:PRIYA20AUG13
        xmlhttp.open("POST", "include/php/ogbbsrbs.php?" + poststr + "", true);
    } else if (panelName == 'LoanInt') {
        xmlhttp.open("POST", "include/php/orbbinbs.php?" + poststr + "", true);
    }
    xmlhttp.send();
}
/*************End Code To Add panel @Author:PRIYA18FEB14************/
/*************End Code To Add Div @Author:PRIYA30OCT13************/
/*************End Code To Add css Files @Author:PRIYA19AUG13************/
/*************End Code To Add Panel Name @AUTHOR:PRIYA20JUNE13************/
/*************End Code To Add Panel Name @AUTHOR:PRIYA09JUNE13************/
//Print Page Div
function printBarCodeDiv(printpage) {

    var DocumentContainer;
    var html;
    var WindowObject;

    if (browserName == 'Firefox' || browserName == 'Mozilla') { // Mozilla

        DocumentContainer = document.getElementById(printpage);

        html = '<html><head>' +
                '<link href="css/print.css" rel="stylesheet" type="text/css" />' +
                '<link href="css/index.css" rel="stylesheet" type="text/css" />' +
                '<script type="text/javascript" src="scripts/emNavigation.js"></script>' +
                '<script type="text/javascript" src="scripts/emValidate.js"></script>' +
                '<script type="text/javascript" src="scripts/emAddOwner.js"></script>' +
                '<script type="text/javascript" src="scripts/emOwnerLogin.js"></script>' +
                '<script type="text/javascript" src="scripts/emUpdateOwner.js"></script>' +
                '</head><body>' +
                '<div id="' + printpage + '">' +
                DocumentContainer.innerHTML +
                '</div>' +
                '</body></html>';

        WindowObject = window.open("", "", "width=400,height=400,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");

        WindowObject.document.writeln(html);
        WindowObject.document.close();
        WindowObject.focus();
        WindowObject.print();
        WindowObject.close();
        document.getElementById('print_link').style.display = 'block';
    } else {
        DocumentContainer = document.getElementById(printpage);

        html = '<html><head>' +
                '<link href="css/print.css" rel="stylesheet" type="text/css" />' +
                '<link href="css/index.css" rel="stylesheet" type="text/css" />' +
                '<script type="text/javascript" src="scripts/emNavigation.js"></script>' +
                '<script type="text/javascript" src="scripts/emValidate.js"></script>' +
                '<script type="text/javascript" src="scripts/emAddOwner.js"></script>' +
                '<script type="text/javascript" src="scripts/emOwnerLogin.js"></script>' +
                '<script type="text/javascript" src="scripts/emUpdateOwner.js"></script>' +
                '</head><body>' +
                '<div id="' + printpage + '">' +
                DocumentContainer.innerHTML +
                '</div>' +
                '<a style="cursor: pointer;" onClick="window.print();"><img src="images/printer32.png" class="noPrint" alt="Print" title="Print" width="32px" height="32px" /></a>' +
                '</body></html>';

        WindowObject = window.open("", "", "width=600,height=600,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");

        WindowObject.document.open();
        WindowObject.document.writeln(html);
        WindowObject.document.close();
        WindowObject.focus();
        document.getElementById('print_link').style.display = 'block';
    }


}
/********** START CODE TO UPDATE OMUNIM DONGLE @AUTHOR: LOVE26JAN13 ***************/
function updateOMDongle(dgHWId, versionNo) {
    if (dgHWId == 0 || dgHWId == '' || dgHWId == '0') {
        alert("We are unable to recognize your dongle, please insert your online munim dongle properly with the computer system!\n\n\
                हम आपके डोंगल को पहचानने में असमर्थ हैं, कृपया अपना ऑनलाइन मुनीम डोंगल कंप्यूटर में ठीक से लगाइए!");
    } else {
        versionNo = versionNo.replace('/', "");
        confirm_box = confirm("\t\t\t\t\t\t\t\tOnline Munim Dongle Update Process!\n" +
                "\t\t\t\t\t\t\t\t\tPRODUCT KEY - " + dgHWId +
                "\nBy clicking the 'Ok' button below, I certify that I have read and agree to the Online Munim 'Terms & Conditions'!");
        if (confirm_box == true)
        {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    //document.getElementById("ajax_loading_div").style.visibility = "hidden";
                    //document.getElementById("updateOMDongleButt").style.visibility = "visible";
                    document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("updateOMDongleButt").innerHTML = "<img src='images/ajaxSearch.png' style='vertical-align: middle;' />";
                    //document.getElementById("updateOMDongleDiv").style.visibility = "<img src='../images/printer32.png' />";
                    //document.getElementById("ajax_loading_div").style.visibility = "visible";
                }
            };

            xmlhttp.open("POST", versionNo + "/include/php/system/omssupdg.php", true);
            xmlhttp.send();
        }
    }
}
/********** END  CODE TO UPDATE OMUNIM DONGLE @AUTHOR: LOVE26JAN13 ***************/
//Print Page Div
function printDirectDiv(printpage) {
    var DocumentContainer;
    var html;
    var WindowObject;
    if (browserName == 'Firefox' || browserName == 'Mozilla') { // Mozilla
        DocumentContainer = document.getElementById(printpage);

        try {
            var ifrm = document.getElementById('ifrmPr');
            var content = document.getElementById(printpage).innerHTML;
            /* Determine what DOM model to use */
            var printDoc = (ifrm.contentDocument);
            if (printDoc.document) {
                printDoc = printDoc.document;
            }
            /* Create a HTML document to go into the iFrame */
            /* The title will appear on the printed document */
            printDoc.write("<html><head><link href='css/index.css' rel='stylesheet' type='text/css' /><link href='css/barCodeLabel.css' rel='stylesheet' type='text/css' />");
            printDoc.write("</head><body onload='this.focus(); this.print();'>");
            printDoc.write(content + "</body></html>");
            printDoc.close();
        } catch (e) {
            self.print();
        }
        //        html = '<html><head>'+
        //        '<link href="css/print.css" rel="stylesheet" type="text/css" />'+
        //        '<link href="css/index.css" rel="stylesheet" type="text/css" />'+
        //        '<script type="text/javascript" src="scripts/emNavigation.js"></script>'+
        //        '<script type="text/javascript" src="scripts/emValidate.js"></script>'+
        //        '<script type="text/javascript" src="scripts/emAddOwner.js"></script>'+
        //        '<script type="text/javascript" src="scripts/emOwnerLogin.js"></script>'+
        //        '<script type="text/javascript" src="scripts/emUpdateOwner.js"></script>'+
        //        "</head><body onload='this.focus(); this.print();'>"+
        //        '<div id="' + printpage +'">'+
        //        DocumentContainer.innerHTML + 
        //        '</div><div class="page-break"></div></body></html>';
        //    
        //        //WindowObject = window.open("", "", "width=55px,height=12px,top=0,left=0,toolbars=no,scrollbars=yes,status=no,resizable=yes");
        //        WindowObject.document.writeln(html);
        //        WindowObject.document.close();
        //        //WindowObject.focus();
        //        //WindowObject.print();
        //        //WindowObject.close();
        //        document.getElementById('print_link').style.display='block';
    } else {
        DocumentContainer = document.getElementById(printpage);

        html = '<html><head>' +
                '<link href="css/print.css" rel="stylesheet" type="text/css" />' +
                '<link href="css/index.css" rel="stylesheet" type="text/css" />' +
                '<link href="css/barCodeLabel.css" rel="stylesheet" type="text/css" />' +
                '<script type="text/javascript" src="scripts/emNavigation.js"></script>' +
                '<script type="text/javascript" src="scripts/emValidate.js"></script>' +
                '<script type="text/javascript" src="scripts/emAddOwner.js"></script>' +
                '<script type="text/javascript" src="scripts/emOwnerLogin.js"></script>' +
                '<script type="text/javascript" src="scripts/emUpdateOwner.js"></script>' +
                '</head><body>' +
                '<div id="' + printpage + '">' +
                DocumentContainer.innerHTML +
                '</div>' +
                '<a style="cursor: pointer;" onClick="window.print();"><img src="images/printer32.png" class="noPrint" alt="Print" title="Print" width="32px" height="32px" /></a>' +
                '</body></html>';

        WindowObject = window.open("", "", "width=1,height=1,top=0,left=0,toolbars=no,scrollbars=yes,status=no,resizable=yes");
        WindowObject.document.open();
        WindowObject.document.writeln(html);
        WindowObject.document.close();
        WindowObject.focus();
        document.getElementById('print_link').style.display = 'block';
    }
}
function validateBlankField(fieldValue, placeHolder, alerttxt) {
    if (fieldValue == placeHolder) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
// Start Code to Update Software Update @LOVE29JUL2014
//function updateSoftwareWithoutDongleForm(versionNo)
//{
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function() {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("showUpdateSoftwareWithoutDongleDiv").style.visibility = "visible";
//            document.getElementById("showUpdateSoftwareWithoutDongleDiv").innerHTML = xmlhttp.responseText;
//            document.getElementById('prodKey').focus();
//            document.getElementById("ajax_loading_div").style.visibility = "hidden";
//        } else {
//            document.getElementById("ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    xmlhttp.open("POST", versionNo + "/include/php/omppdwfr.php?versionNo=" + versionNo, true);
//    xmlhttp.send();
//}

function updateSoftwareWithoutDongleForm(versionNo, prodKey, loginId)
{
    if (prodKey == '' || prodKey == null) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("showUpdateSoftwareWithoutDongleDiv").style.visibility = "visible";
                document.getElementById("showUpdateSoftwareWithoutDongleDiv").innerHTML = xmlhttp.responseText;
                document.getElementById('prodKey').focus();
                document.getElementById("ajax_loading_div").style.visibility = "hidden";
            } else {
                document.getElementById("ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", versionNo + "/include/php/omppdwfr.php?versionNo=" + versionNo, true);
        xmlhttp.send();
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("showUpdateSoftwareWithoutDongleDiv").style.visibility = "hidden";
                document.getElementById("updateSoftwareWithoutDongleDiv").innerHTML = "<img src='images/ajaxSearch.png' style='vertical-align: middle;' />";
            }
        };
        xmlhttp.open("POST", versionNo + "/include/php/system/omssupdg.php?prodKey=" + prodKey + "&loginId=" + loginId, true);
        xmlhttp.send();
    }
}

function validateProdKeyField() {
    if (document.getElementById('prodKey').value == '' || document.getElementById('prodKey').value == null || document.getElementById('prodKey').value == ' Product Key') {
        alert("Please enter product key!");
        document.getElementById('prodKey').focus();
        return false;
    } else if (document.getElementById('loginId').value == '' || document.getElementById('loginId').value == null || document.getElementById('loginId').value == ' Login Id') {
        alert("Please enter login Id!");
        document.getElementById('loginId').focus();
        return false;
    }
    return true;
}
function updateSoftwareWithoutDongle(prodKey, loginId, versionNo)
{
    if (validateProdKeyField()) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("showUpdateSoftwareWithoutDongleDiv").style.visibility = "hidden";
                document.getElementById("updateSoftwareWithoutDongleDiv").innerHTML = "<img src='images/ajaxSearch.png' style='vertical-align: middle;' />";
            }
        };
        xmlhttp.open("POST", versionNo + "/include/php/system/omssupdg.php?prodKey=" + prodKey + "&loginId=" + loginId, true);
        xmlhttp.send();
    }
}
function closeUpdateSoftwareWithoutDongleDiv() {
    document.getElementById("showUpdateSoftwareWithoutDongleDiv").style.visibility = "hidden";
}
// End Code to Update Software Update @LOVE29JUL2014