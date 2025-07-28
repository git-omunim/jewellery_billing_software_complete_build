var nVer = navigator.appVersion;
var nAgt = navigator.userAgent;
var browserName = navigator.appName;
var fullVersion = '' + parseFloat(navigator.appVersion);
var majorVersion = parseInt(navigator.appVersion, 10);
var nameOffset, verOffset, ix;
var server;
var selectedDevice;

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
function validateNumWithUnderScore(field, alerttxt) {
    var regex = /^[0-9]+$/; // Regex to check only digits (no spaces)
    if (!regex.test(field)) {
        alert(alerttxt);
        return false;
    } else {
        return true;
    }
}
function validateLengthExact10(field, alerttxt) {
    if (field.length != 10) {
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
            rel_all_girvi_frm_rel_cart('include/php/orgrrfrc' + default_theme + '.php', poststr);
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

    // Clone the content to prevent directly affecting the DOM while removing 'noPrint' class elements
    var clonedContent = DocumentContainer.cloneNode(true);

    // Remove all elements with class 'noPrint' from the cloned content
    var elementsToRemove = clonedContent.getElementsByClassName('noPrint');
    while (elementsToRemove.length > 0) {
        elementsToRemove[0].parentNode.removeChild(elementsToRemove[0]);
    }

    // Prepare the HTML content for the new window (popup)
    var html = `
        <html>
        <head>
            <title>Print Page - Online Munim</title>
            <link href="css/print.css" rel="stylesheet" type="text/css" />
            <link href="css/index.css" rel="stylesheet" type="text/css" />
            <link href="css/ogcss.css" rel="stylesheet" type="text/css" />
            <link href="css/orcss.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript" src="scripts/emNavigation.js"></script>
            <script type="text/javascript" src="scripts/emValidate.js"></script>
            <script type="text/javascript" src="scripts/emAddOwner.js"></script>
            <script type="text/javascript" src="scripts/emOwnerLogin.js"></script>
            <script type="text/javascript" src="scripts/emUpdateOwner.js"></script>
            <script type="text/javascript" src="scripts/orAddFunction_1_6_1.js"></script>
            <script type="text/javascript" src="scripts/ogAddFunction_1_6_1.js"></script>
        </head>
        <body>
            <div id="girviListPanelDiv">
                ${clonedContent.innerHTML}
            </div>
            <a class="noPrint" style="cursor: pointer;" onClick="window.print();">
                <img src="images/printer32.png" alt="Print" title="Print" width="32px" height="32px" />
            </a>
        </body>
        </html>`;

    // Open the new window as a popup
    var WindowObject = window.open("", "PrintWindow", "width=950,height=900,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");
    WindowObject.document.open();
    WindowObject.document.write(html);
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
/*************Start Code To change function for reports @Author:PRIYA13MAY14************/
function printBalanceSheetDiv(HeaderDiv, balanceSheet_form, panelName) {
    loadXMLDoc();
    if (HeaderDiv != 'purchaseDetailsSubDiv' && HeaderDiv != 'sellDetailsSubDiv') { //change in line @AUTHOR: SANDY7DEC13
        poststr = "balanceSheetYear=" + encodeURIComponent(balanceSheet_form.balanceSheetYear.value)
                + "&balanceSheetMonth=" + encodeURIComponent(balanceSheet_form.balanceSheetMonth.value);
    }

    var head;
    if (panelName == 'USEROMREVO') { //to only print user transcation from ledger @omkar30JAN2024
        head = document.getElementById('balanceSheetSubDiv');
        var DocumentHeader = document.getElementById('dtTableDivId_wrapper');
    } else {
        head = document.getElementById("headerTable");
        var DocumentHeader = document.getElementById(HeaderDiv);
    }
    /*******Start to comment code  @AUTHOR: SANDY10DEC13************/
    //if(panelName=='GOLD'){
    //  head = document.getElementById("headerTable");
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
            var WindowObject = window.open("", "PrintWindow", "width=1000,height=900,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes"); //width Changed 980 to 990 @Author:SANDY9DEC13//width Changed 1000 to 980 @Author:PRIYA23AUG13

            WindowObject.document.open();
            WindowObject.document.writeln(html);
            WindowObject.document.close();
            WindowObject.focus();
        } else {
            document.getElementById("ajaxLoadPrintBalanceSheetDiv").style.visibility = "visible";
        }
    };
    if (panelName == 'OMREVO') {
        xmlhttp.open("POST", "include/php/orbbblsh" + default_theme + ".php?" + poststr + "", true); //fileName Changed @Author:PRIYA24JUL13
    } else if (panelName == 'GOLD') {
        xmlhttp.open("POST", "include/php/ogbbgdbs" + default_theme + ".php?" + poststr + "", true); //fileName Changed @Author:PRIYA24JUL13
    } else if (panelName == 'SILVER') {
        xmlhttp.open("POST", "include/php/ogbbslbs" + default_theme + ".php?" + poststr + "", true); //fileName Changed @Author:PRIYA24JUL13
    } else if (panelName == 'RawMetalGold') { // ADDED CODE FOR RAW METAL GOLD STOCK @Author:PRIYANKA-30AUG2021
        xmlhttp.open("POST", "include/php/ogbbrwbs" + default_theme + ".php?" + poststr + "", true);
    } else if (panelName == 'RawMetalSilver') { // ADDED CODE FOR RAW METAL SILVER STOCK @Author:PRIYANKA-30AUG2021
        xmlhttp.open("POST", "include/php/ogbbrwslbs" + default_theme + ".php?" + poststr + "", true);
    } else if (panelName == 'STONE') { // ADDED CODE FOR STONE STOCK @Author:PRIYANKA-30AUG2021
        xmlhttp.open("POST", "include/php/ombbstbs" + default_theme + ".php?" + poststr + "", true);
    } else if (panelName == 'STONE_TRANS') { // ADDED CODE FOR STONE TRANSACTION @Author:PRIYANKA-30AUG2021
        xmlhttp.open("POST", "include/php/ombbsttrep" + default_theme + ".php?" + poststr + "", true);
    } else if (panelName == 'TransGirvi') { // FOR transferred girvi ledger @AUTHOR: SANDY6AUG13
        xmlhttp.open("POST", "include/php/orbbtrgl" + default_theme + ".php?" + poststr + "", true); //fileName Changed @Author:PRIYA24JUL13
    } else if (panelName == 'UDHAAR') { // FOR Udhaar ledger @Author:PRIYA20AUG13
        xmlhttp.open("POST", "include/php/ombbuubd" + default_theme + ".php?" + poststr + "", true);
    } else if (panelName == 'PurchaseReport') { // FOR Udhaar ledger @Author:PRIYA20AUG13
//        xmlhttp.open("POST", "include/php/ogbbprbs"+ default_theme +".php?" + poststr + "", true);
        xmlhttp.open("POST", "include/php/ogbbprbs" + default_theme + ".php", true);
    } else if (panelName == 'SellReport') { // FOR Udhaar ledger @Author:PRIYA20AUG13
//        xmlhttp.open("POST", "include/php/ogbbsrbs"+ default_theme +".php?" + poststr + "", true);
        xmlhttp.open("POST", "include/php/ogbbsrbs" + default_theme + ".php", true);
    } else if (panelName == 'LoanInt') {
        xmlhttp.open("POST", "include/php/orbbinbs" + default_theme + ".php?" + poststr + "", true);
    } else if (panelName == 'USEROMREVO') {//add to print only user tranction from ledger @omkar31jan2024
        xmlhttp.open("POST", "include/php/ombbblsh_1" + default_theme + ".php?" + poststr + "", true);
    }
    xmlhttp.send();
}
/*************End Code To change function for reports @Author:PRIYA13MAY14************/
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
        setTimeout(function () {
            WindowObject.print();
            WindowObject.close();
        }, 500);
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
        xmlhttp.open("POST", "include/php/system/omssupdg" + default_theme + ".php", true);
        xmlhttp.send();
    }
}
/********** END  CODE TO UPDATE OMUNIM DONGLE @AUTHOR: LOVE26JAN13 ***************/
//Print Page Div
function printDirectDiv(printpage) {
    var DocumentContainer;
    var html;
    var WindowObject;
    var jobStatus = 'N';
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
            printDoc.write("<link href='css/mainLayout.css' rel='stylesheet' type='text/css' />");
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
    //if (jobStatus == 'Y')
    //    document.getElementById('xrf_transaction').submit();
}
//
function printXRFDirectDiv(printpage) {
    var DocumentContainer;
    var html;
    var WindowObject;
    var jobStatus = 'N';
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
            printDoc.write("<link href='css/mainLayout.css' rel='stylesheet' type='text/css' />");
            printDoc.write("</head><body style='margin-top:50mm;' onload='this.focus(); this.print();'>");
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
    //if (jobStatus == 'Y')
    //    document.getElementById('xrf_transaction').submit();
    return 'Y';
}
//
function om_sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}
function datepicker() {
    $(".datepicker").datepicker({
        autoclose: true,
        weekStart: 1,
        keyboardNavigation: true,
        todayHighlight: true
    }).datepicker('update', new Date());
}

function draggable_barcode_setting(panel)
{
    //alert(panel);
    $(".element").draggable({
        /* drag: function(event, ui){
         var img = $(this);
         
         var offset = $(this).offset();
         var center_x = (offset.left) + (img.width() / 2);
         var center_y = (offset.top) + (img.height() / 2);
         var mouse_x = event.pageX;
         var mouse_y = event.pageY;
         var radians = Math.atan2(mouse_x - center_x, mouse_y - center_y);
         var degree = (radians * (180 / Math.PI) * -1) + 90;
         var rotateCSS = 'rotate(' + degree + 'deg)';
         //alert(rotateCSS);
         $(this).css({
         '-moz-transform': rotateCSS,
         '-webkit-transform': rotateCSS
         });
         },*/
        containment: '#glassbox',
        scroll: false
    })


            .mouseup(function () {
                var coords = [];
                var coord = $(this).position();
                var element = $(this).attr('id');
                //alert("Top: " + coord.top + " Left: " + coord.left);
                var item = {coordTop: coord.top, coordLeft: coord.left};
                coords.push(item);
                //var angle = getRotationDegrees($(this));
                //alert(angle);
                var dataTosend = 'coordTop=' + coord.top + '&coordLeft=' + coord.left + '&element=' + element + '&panel=' + panel;


                //alert(dataTosend);
                $.ajax({
                    type: "POST",
                    url: "include/php/updatecoords" + default_theme + ".php",
                    //async: true,
                    data: dataTosend,
                    success: function (msg) {
                        //alert(msg);
                        if (msg == "success")
                        {
                            //$("#respond").html('<div class="success">X and Y Coordinates Saved!</div>').hide().fadeIn(1000);
                            //setTimeout(function () {
                            // $('#respond').fadeOut(1000);
                            //  }, 2000);
                        } else if (msg == "MulBcPanel") {
                            //alert("hi");
                            //location.reload();
                            //window.location.replace("http://stackoverflow.com");
                            //alert("url  ="+window.location.href);
                            //alert("PathName  ="+ window.location.pathname);
                            // window.location.replace("/include/php/ogibbc20x12"+ default_theme +".php");

                        }

                    }

                });


            });
}



function getRotationDegrees(obj) {
    var matrix = obj.css("-webkit-transform") ||
            obj.css("-moz-transform") ||
            obj.css("-ms-transform") ||
            obj.css("-o-transform") ||
            obj.css("transform");
    if (matrix !== 'none') {
        var values = matrix.split('(')[1].split(')')[0].split(',');
        var a = values[0];
        var b = values[1];
        var angle = Math.round(Math.atan2(b, a) * (180 / Math.PI));
    } else {
        var angle = 0;
    }
    return (angle < 0) ? angle + 360 : angle;
}


// Start Code to Update Software Update @LOVE29JUL2014
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
        xmlhttp.open("POST", "include/php/omppdwfr" + default_theme + ".php?versionNo=" + versionNo, true);
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
        xmlhttp.open("POST", "include/php/system/omssupdg" + default_theme + ".php?prodKey=" + prodKey + "&loginId=" + loginId, true);
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
        loadXMLDoc2();
        xmlhttp2.onreadystatechange = function () {
            if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                document.getElementById("mainSelectDiv").innerHTML = xmlhttp2.responseText;
            } else {
                document.getElementById("showUpdateSoftwareWithoutDongleDiv").style.visibility = "hidden";
                document.getElementById("updateSoftwareWithoutDongleDiv").innerHTML = "<img src='images/ajaxSearch.png' style='vertical-align: middle;' />";
            }
        };
        xmlhttp2.open("POST", "include/php/system/omssupdg" + default_theme + ".php?prodKey=" + prodKey + "&loginId=" + loginId, true);
        xmlhttp2.send();
    }
}
function closeUpdateSoftwareWithoutDongleDiv() {
    document.getElementById("showUpdateSoftwareWithoutDongleDiv").style.visibility = "hidden";
}
// End Code to Update Software Update @LOVE29JUL2014
//start code to add print all labels in one click @AUTH:ATHU5MAR17
function printDirectAllLabels(AllLabelId)
{
    document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "hidden";
    document.getElementById("a4SheetsPrintButtonPrinting").style.visibility = "visible";
    AllLabelId = JSON.parse(AllLabelId);
    var i = 0;                                      //  set your counter to 0
    function printDirectLabelsLoop() {              //  create a loop function
        setTimeout(function () {                    //  call a 5s setTimeout when the loop is called
            var argument = AllLabelId[i];
            printDirectAllLabelBarcode(argument);
            i++;                                    //  increment the counter
            if (i < AllLabelId.length) {            //  if the counter < 10, call the loop function
                printDirectLabelsLoop();            //  ..  again which will trigger another 
            }                                       //  ..  setTimeout()
            if (i == AllLabelId.length) {
                document.getElementById("a4SheetsPrintButtonPrinting").style.visibility = "hidden";
                document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "visible";
            }
        }, 5000)                                    //1s=1000ms

    }
    printDirectLabelsLoop();                        //  start the loop
    //document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "visible";
}
function printDirectAllLabelBarcode(barcodeId)
{
    var panel = 'Items55x13BarCodePanel';
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("AllLabelsDivs").innerHTML = xmlhttp.responseText;
            //return  xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "include/php/ogibbc55x13" + default_theme + ".php?sttrId=" + barcodeId + "&panel=" + panel, true);
    xmlhttp.send();
}




//start code to add print print all Auction Notice in one click @AUTH:GANGADHAR18-05-21
function printDirectAllNotice(AllNoticeId)
{
    document.getElementById("AllNoticeDivs").innerHTML = '';
    document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "hidden";
    document.getElementById("a4SheetsPrintButtonPrinting").style.visibility = "visible";
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    AllNoticeId = JSON.parse(AllNoticeId);
    var i = 0;                                      //  set your counter to 0
    function printDirectNoticeLoop() {              //  create a loop function
        setTimeout(function () {                    //  call a 5s setTimeout when the loop is called
            var argument = AllNoticeId[i];
            printDirectAllAuctionNotice(argument);
            i++;                                    //  increment the counter
            if (i < (AllNoticeId.length + 1)) {            //  if the counter < 10, call the loop function
                printDirectNoticeLoop();            //  ..  again which will trigger another 
            }                                       //  ..  setTimeout()
            if (i == (AllNoticeId.length + 1)) {
                document.getElementById("a4SheetsPrintButtonPrinting").style.visibility = "hidden";
                document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "visible";
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                printDirectDiv('AllNoticeDivs');
            }
        }, 5000)                                    //1s=1000ms

    }
    printDirectNoticeLoop();                        //  start the loop
    //document.getElementById("a4SheetsPrintButtonDiv").style.visibility = "visible";
}

function printDirectAllAuctionNotice(noticeId)
{
//    alert(noticeId);
    var panel = 'ItemsAuctionNoticePanel';
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            document.getElementById("AllNoticeDivs").innerHTML += xmlhttp.responseText;
            //return  xmlhttp.responseText;
            //printDirectDiv('allNoticeThermalDiv');
        }
    };
    xmlhttp.open("GET", "include/php/olggcufm" + default_theme + ".php?girviId=" + noticeId + "&panel=" + panel, true);
    xmlhttp.send();
}



//End code to add print all Auction Notice in one click @AUTH:GANGADHAR18-05-21



function printOneAllLabelBarcode(barcodeId)
{ //alert(barcodeId);
    var panel = 'Items55x13BarCodePanel';
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //  alert(xmlhttp.responseText);
            document.getElementById("AllLabelsDivs").innerHTML = xmlhttp.responseText;
            //printDirectDiv('allLabelsThermalDiv');
        }
    };
    xmlhttp.open("GET", "include/php/ogibbc55x13" + default_theme + ".php?sttrId=" + barcodeId + "&panel=" + panel, true);
    xmlhttp.send();
}
function printOneAllLabelBarcodeBySttrId(sttrId, Indicator, systemOnOrOff, sysLocalDBRemote, prnPrintOption) {
    //
    var documentRootPath = '';
    //
    if (typeof (document.getElementById('documentRootPath')) != 'undefined' && (document.getElementById('documentRootPath') != null)) {
        documentRootPath = document.getElementById('documentRootPath').value;
    }
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            document.getElementById("AllLabelsDivs").innerHTML = xmlhttp.responseText;
            if (systemOnOrOff == 'ON' && sysLocalDBRemote != 'Y' && prnPrintOption != 'directPrint') {
                parent.location = "localexplorer:C:/OMPRN/omprn.bat";
            }
        }
    };
    //
    if (documentRootPath != '') {
        if (Indicator == 'imitation') {
            var panel = 'Items55x13IMBarCodePanel';
            xmlhttp.open("GET", documentRootPath + "/include/php/ogibbc55x13imi" + default_theme + ".php?sttrId=" + sttrId + "&panel=" + panel, true);
        } else {
            var panel = 'Items55x13BarCodePanel';
            xmlhttp.open("GET", documentRootPath + "/include/php/ogibbc55x13" + default_theme + ".php?sttrId=" + sttrId + "&panel=" + panel, true);
        }
        xmlhttp.send();
    } else {
        if (Indicator == 'imitation') {
            var panel = 'Items55x13IMBarCodePanel';
            xmlhttp.open("GET", "include/php/ogibbc55x13imi" + default_theme + ".php?sttrId=" + sttrId + "&panel=" + panel, true);
        } else {
            var panel = 'Items55x13BarCodePanel';
            xmlhttp.open("GET", "include/php/ogibbc55x13" + default_theme + ".php?sttrId=" + sttrId + "&panel=" + panel, true);
        }
        xmlhttp.send();
    }
}
//End Code to add print all labels in one click @AUTH:ATHU5MAR17
//
//START CODE FOR RFID BARCODE PRINT FUNCTION @AUTHOR SIMRAN:22NOV2022
//
function printRfidTagBySttrId(sttr_id, systemOnOrOff, documentRootPath, prnPrintOption, indicator) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addRFIDTagDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    //if (documentRootPath != '') {
    xmlhttp.open("GET", "include/php/omAddRFIDTag" + default_theme + ".php?mainEntryId=" + sttr_id + "&indicator=rfidTagPrint&documentRootPath=" + documentRootPath, true);
    xmlhttp.send();
    //}
}

//
//END CODE FOR RFID BARCODE PRINT FUNCTION @AUTHOR SIMRAN:22NOV2022
//
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// *********** START CODE FOR LOAN BARCODE PRINT @SIMRAN:03JAN2024 *********************************//
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
function printOneAllLoanBarcodeByGirvId(girviId, systemOnOrOff1, systemOnOrOff, sysLocalDBRemote, prnPrintOption) {
//     alert(sysLocalDBRemote);
    //
    var documentRootPath = '';
    var panel = 'Items55x13LoanBarCodePanel';
    if(prnPrintOption == '' || prnPrintOption == null){
    prnPrintOption = document.getElementById('prnPrintOption').value;
    }
    //
    if (typeof (document.getElementById('documentRootPath')) != 'undefined' && (document.getElementById('documentRootPath') != null)) {
        documentRootPath = document.getElementById('documentRootPath').value;
    }
    // 
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert(xmlhttp.responseText);
            document.getElementById("AllLabelsDivs").innerHTML = xmlhttp.responseText;
            if (systemOnOrOff == 'ON' && sysLocalDBRemote != 'Y' && prnPrintOption != 'directPrint') {
                parent.location = "localexplorer:C:/OMPRN/omprn.bat";
            }
        }
    };
    //
    if (documentRootPath != '') {
        xmlhttp.open("GET", documentRootPath + "/include/php/olggbc55x13" + default_theme + ".php?girviId=" + girviId + "&panel=" + panel +  "&systemOnOrOff=" + systemOnOrOff + "&sysLocalDBRemote=" + sysLocalDBRemote + "&prnPrintOption=" + prnPrintOption, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("GET", "include/php/olggbc55x13" + default_theme + ".php?girviId=" + girviId + "&panel=" + panel + "&systemOnOrOff=" + systemOnOrOff + "&sysLocalDBRemote=" + sysLocalDBRemote + "&prnPrintOption=" + prnPrintOption, true);
        xmlhttp.send();
    }
}
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// *********** END CODE FOR LOAN BARCODE PRINT @SIMRAN:03JAN2024 *********************************//
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
//
// START CODE TO ADD FUNCTION FOR IMITATION AUTO BARCODE PRINT @PRIYANKA-30JULY18
function printOneAllLabelImiBarcodeBySttrId(sttrId,count=null)
{
    if(count==null || count==''){
        count=1;
    }
    for (let i = 1; i<=count;i++) {
        var panel = 'Items55x13IMBarCodePanel';
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("AllLabelsDivs").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "include/php/ogibbc55x13imi" + default_theme + ".php?sttrId=" + sttrId + "&panel=" + panel, true);
        xmlhttp.send();
    }
}
// END CODE TO ADD FUNCTION FOR IMITATION AUTO BARCODE PRINT @PRIYANKA-30JULY18
function stockMasterValidate(documentRootPath) {
    //
    if (validateEmptyField(document.getElementById("ms_itm_metal").value, "Please Select Metal/Product Type!") == false) {
        document.getElementById("ms_itm_metal").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("ms_itm_name").value, "Please Select Product Name!") == false) {
        document.getElementById("ms_itm_name").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("ms_itm_category").value, "Please Select Product Category!") == false) {
        document.getElementById("ms_itm_category").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("ms_itm_pre_id").value, "Please Select Product Code!") == false) {
        document.getElementById("ms_itm_pre_id").focus();
        return false;
    } else {
        return true;
    }
    return false;
}
//
function masterStockPriceValidation() {
    //
    if (validateEmptyField(document.getElementById("ms_itm_id_for_itm_price").value, "Please Select Master Product Details!") == false) {
        if (validateEmptyField(document.getElementById("ms_itm_metal").value, "Please Select Metal/Product Type!") == false) {
            document.getElementById("ms_itm_metal").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("ms_itm_category").value, "Please Select Product Category!") == false) {
            document.getElementById("ms_itm_category").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("ms_itm_name").value, "Please Select Product Name!") == false) {
            document.getElementById("ms_itm_name").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("ms_itm_pre_id").value, "Please Select Product Code!") == false) {
            document.getElementById("ms_itm_pre_id").focus();
            return false;
        } else {
            alert('Please click on "Search Product Price" Button');
            return false;
        }
        return false;
    } else if (validateEmptyField(document.getElementById("ms_sub_itm_user_group").value, "Please Select User Group!") == false) {
        document.getElementById("ms_sub_itm_user_group").focus();
        return false;
    } else {
        return true;
    }
    return false;
}
//
//
// *****************************************************************************************************************
// START TO ADD FUNCTION FOR YEAR CLOSING FUNCTIONALITY ON TRIAL BALANCE PANEL @PRIYANKA-18DEC2020
// *****************************************************************************************************************
function yearClosingFunction(encodedMainYearClosingArr, firmId, fromDD, fromMM, fromYY, toDD, toMM, toYY) {
    // 
    //alert(JSON.stringify(encodedMainYearClosingArr));
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("trialBalanceDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omactrbl" + default_theme + ".php?encodedMainYearClosingArr=" + JSON.stringify(encodedMainYearClosingArr) +
            "&firmId=" + firmId +
            "&trialBalanceFromDD=" + fromDD +
            "&trialBalanceFromMM=" + fromMM + "&trialBalanceFromYY=" + fromYY +
            "&trialBalanceToDD=" + toDD +
            "&trialBalanceToMM=" + toMM + "&trialBalanceToYY=" + toYY +
            "&yearClosingMessageDisplay=YES", true);
    //
    xmlhttp.send();
}
// *****************************************************************************************************************
// END TO ADD FUNCTION FOR YEAR CLOSING FUNCTIONALITY ON TRIAL BALANCE PANEL @PRIYANKA-18DEC2020
// *****************************************************************************************************************
//
//
// *****************************************************************************************************************
// START TO ADD FUNCTION FOR YEAR CLOSING FUNCTIONALITY ON ACCOUNT BALANCE PANEL @PRIYANKA-19DEC2020
// *****************************************************************************************************************
function accBalanceYearClosingFunction(firmId, startYear, closeYear) {
    // 
    //alert('firmId == ' + firmId);
    //
    var yearClosingFunc = 'YES';
    var accBalYearClosingMessageDisplay = 'YES';
    var panelName = 'accountBalance';
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("accBalDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omaccbal" + default_theme + ".php?firmId=" + firmId + "&panelName=" + panelName +
            "&startYear=" + startYear + "&closeYear=" + closeYear +
            "&yearClosingFunc=" + yearClosingFunc +
            "&accBalYearClosingMessageDisplay=" + accBalYearClosingMessageDisplay, true);
    //
    xmlhttp.send();
    //
}
// *****************************************************************************************************************
// END TO ADD FUNCTION FOR YEAR CLOSING FUNCTIONALITY ON ACCOUNT BALANCE PANEL @PRIYANKA-19DEC2020
// *****************************************************************************************************************
//
//
//***************************************************************************************************************
//* START CODE TO ADD FUNCTION FOR MASTER STOCK DETAILS FORM VALIDATION @AUTHOR-PRIYANKA-17FEB2021
//***************************************************************************************************************
function addNewMasterStockDetailsValidation() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateAddNewMasterStockDetailsPanelInputs()) {
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    }
}
//
//
function validateAddNewMasterStockDetailsPanelInputs(obj) {
    //
    if (validateEmptyField(document.getElementById("ms_sub_itm_user_group").value, "Please Select User Group!") == false) {
        document.getElementById("ms_sub_itm_user_group").focus();
        return false;
    }
    return true;
}
//***************************************************************************************************************
//* END CODE TO ADD FUNCTION FOR MASTER STOCK DETAILS FORM VALIDATION @AUTHOR-PRIYANKA-17FEB2021
//***************************************************************************************************************
/*Open Customer Sign Update Functionality CHETAN 26 APR 2022*/
function OpenUpdateCustomerSignModal(userId)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById('customerSignUpdate').style.display = 'block';
            document.getElementById('customerSignUpdate').innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", "omUpdateCustSign" + default_theme + ".php?userId=" + userId, true);
    xmlhttp.send();


}

function closeUpdateSignModal()
{
    document.getElementById('customerSignUpdate').style.display = 'none';

}
/*CLOSE Customer Sign Update Functionality CHETAN 26 APR 2022*/
/***************************************************************************************************************/
//This function helps to validate forms field before form submit
/***************************************************************************************************************/
function OGSTInvoiceFields()
{

    if (document.getElementById("No").value == "") {
        alert("Please enter valid Invoice No!");
        document.getElementById("No").focus();
        return false;
    } else if (document.getElementById("Dt").value == "") {
        alert("Please enter Date Like 01 Jan 2022 Format!");
        document.getElementById("Dt").focus();
        return false;
    } else if (document.getElementById("SelGstin").value == "" || document.getElementById("SelGstin").value == "-") {
        alert("Please enter valid GST No!");
        document.getElementById("SelGstin").focus();
        return false;
    } else if (document.getElementById("SelLglNm").value == "" || document.getElementById("SelLglNm").value == "-") {
        alert("Please enter Firm Legal Name");
        document.getElementById("SelLglNm").focus();
        return false;
    } else if (document.getElementById("SelAddress").value == "" || document.getElementById("SelAddress").value == "-") {
        alert("Please enter address");
        document.getElementById("SelAddress").focus();
        return false;
    } else if (document.getElementById("SelLocation").value == "" || document.getElementById("SelLocation").value == "-") {
        alert("Please enter location");
        document.getElementById("SelLocation").focus();
        return false;
    } else if (document.getElementById("SelPin").value == "" || document.getElementById("SelPin").value == "-" ||
            document.getElementById("SelPin").value.length > 6 || document.getElementById("SelPin").value.length < 6) {
        alert("Please enter Pincode or Check entered pincode");
        document.getElementById("SelPin").focus();
        return false;
    } else if (document.getElementById("SelStcd").value == "" || document.getElementById("SelStcd").value == "-") {
        alert("Please enter State Code");
        document.getElementById("SelStcd").focus();
        return false;
    } else if (document.getElementById("BuyGstin").value == "" || document.getElementById("BuyGstin").value == "-")
    {
        alert("Please enter Buyer GST No");
        document.getElementById("BuyGstin").focus();
        return false;
    } else if (document.getElementById("BuyLglNm").value == "" || document.getElementById("BuyLglNm").value == "-")
    {
        alert("Please enter Buyer Legal Name");
        document.getElementById("BuyLglNm").focus();
        return false;
    } else if (document.getElementById("BuyPOS").value == "" || document.getElementById("BuyPOS").value == "-")
    {
        alert("Please enter Place of Supply");
        document.getElementById("BuyPOS").focus();
        return false;
    } else if (document.getElementById("BuyAddress").value == "" || document.getElementById("BuyAddress").value == "-")
    {
        alert("Please enter buyer address");
        document.getElementById("BuyAddress").focus();
        return false;
    } else if (document.getElementById("BuyLocation").value == "" || document.getElementById("BuyLocation").value == "-")
    {
        alert("Please enter buyer location");
        document.getElementById("BuyLocation").focus();
        return false;
    } else if (document.getElementById("BuyPin").value == "" || document.getElementById("BuyPin").value == 0 ||
            document.getElementById("BuyPin").value.length > 6 || document.getElementById("BuyPin").value.length < 6)
    {
        alert("Please enter Buyer Pincode or check entered pin code");
        document.getElementById("BuyPin").focus();
        return false;
    } else if (document.getElementById("BuyStcd").value == "" || document.getElementById("BuyStcd").value == "-")
    {
        alert("Please enter Buyer State Code");
        document.getElementById("BuyStcd").focus();
        return false;
    } else if (document.getElementById("IsServc").value == "" || document.getElementById("IsServc").value == "-")
    {
        alert("Please enter Is service (Yes/No) ");
        document.getElementById("IsServc").focus();
        return false;
    } else if (document.getElementById("HsnCd").value == "" || document.getElementById("HsnCd").value == "-")
    {
        alert("Please enter HSN Code");
        document.getElementById("HsnCd").focus();
        return false;
    } else if (document.getElementById("UnitPrice").value == "" || document.getElementById("UnitPrice").value == "-")
    {
        alert("Please enter Unit Price");
        document.getElementById("UnitPrice").focus();
        return false;
    } else if (document.getElementById("TotAmt").value == "" || document.getElementById("TotAmt").value == 0)
    {
        alert("Please enter Total Amount");
        document.getElementById("TotAmt").focus();
        return false;
    } else if (document.getElementById("AssAmt").value == "" || document.getElementById("AssAmt").value == 0)
    {
        alert("Please enter Taxable Amount");
        document.getElementById("AssAmt").focus();
        return false;
    } else if (document.getElementById("GstRt").value == "" || document.getElementById("GstRt").value == 0)
    {
        alert("Please enter GST Rate");
        document.getElementById("GstRt").focus();
        return false;
    } else if (document.getElementById("TotItemVal").value == "" || document.getElementById("TotItemVal").value == 0)
    {
        alert("Please enter Total Item Value");
        document.getElementById("TotItemVal").focus();
        return false;
    } else if (document.getElementById("AssVal").value == "" || document.getElementById("AssVal").value == 0)
    {
        alert("Please enter assesable value");
        document.getElementById("AssVal").focus();
        return false;
    } else if (document.getElementById("TotInvVal").value == "" || document.getElementById("TotInvVal").value == 0)
    {
        alert("Please enter Total Invoice Value");
        document.getElementById("TotInvVal").focus();
        return false;
    } else if (document.getElementById("ewayBillDtls").checked)
    {
        if (document.getElementById("Transid").value == "")
        {
            alert("Please enter Transporter GST No.");
            document.getElementById("Transid").focus();
            return false;
        } else if (document.getElementById("TransMode").value == "")
        {
            alert("Please enter mode of transportation");
            document.getElementById("TransMode").focus();
            return false;
        } else if (document.getElementById("Distance").value == "")
        {
            alert("Please enter distance");
            document.getElementById("Distance").focus();
            return false;
        }

    }
    return true;

}
//
// default_theme parameter is appeneded in the .php file by CHETAN 06MAY2022
//This function helps to validate forms field before form submit submit
/***************************************************************************************************************/
function checkGSTInvoiceFields()
{

    if (document.getElementById("No").value == "") {
        alert("Please enter valid Invoice No!");
        document.getElementById("No").focus();
        return false;
    } else if (document.getElementById("Dt").value == "") {
        alert("Please enter Date Like 01 Jan 2022 Format!");
        document.getElementById("Dt").focus();
        return false;
    } else if (document.getElementById("SelGstin").value == "" || document.getElementById("SelGstin").value == "-") {
        alert("Please enter valid GST No!");
        document.getElementById("SelGstin").focus();
        return false;
    } else if (document.getElementById("SelLglNm").value == "" || document.getElementById("SelLglNm").value == "-") {
        alert("Please enter Firm Legal Name");
        document.getElementById("SelLglNm").focus();
        return false;
    } else if (document.getElementById("SelAddress").value == "" || document.getElementById("SelAddress").value == "-") {
        alert("Please enter address");
        document.getElementById("SelAddress").focus();
        return false;
    } else if (document.getElementById("SelLocation").value == "" || document.getElementById("SelLocation").value == "-") {
        alert("Please enter location");
        document.getElementById("SelLocation").focus();
        return false;
    } else if (document.getElementById("SelPin").value == "" || document.getElementById("SelPin").value == "-" ||
            document.getElementById("SelPin").value.length > 6 || document.getElementById("SelPin").value.length < 6) {
        alert("Please enter Pincode or Check entered pincode");
        document.getElementById("SelPin").focus();
        return false;
    } else if (document.getElementById("SelStcd").value == "" || document.getElementById("SelStcd").value == "-") {
        alert("Please enter State Code");
        document.getElementById("SelStcd").focus();
        return false;
    } else if (document.getElementById("SelMobNo").value == "" || document.getElementById("SelMobNo").value == 0 ||
            document.getElementById("SelMobNo").value.length > 10 || document.getElementById("SelMobNo").value.length < 10)
    {
        alert("Please enter Buyer Phone No. or check entered Phone No.");
        document.getElementById("SelMobNo").focus();
        return false;
    } else if (document.getElementById("BuyMobNo").value == "" || document.getElementById("BuyMobNo").value == 0 ||
            document.getElementById("BuyMobNo").value.length > 10 || document.getElementById("BuyMobNo").value.length < 10)
    {
        alert("Please enter Buyer Phone No. or check entered Phone No.");
        document.getElementById("BuyMobNo").focus();
        return false;
    } else if (document.getElementById("BuyGstin").value == "" || document.getElementById("BuyGstin").value == "-")
    {
        alert("Please enter Buyer GST No");
        document.getElementById("BuyGstin").focus();
        return false;
    } else if (document.getElementById("BuyLglNm").value == "" || document.getElementById("BuyLglNm").value == "-")
    {
        alert("Please enter Buyer Legal Name");
        document.getElementById("BuyLglNm").focus();
        return false;
    } else if (document.getElementById("BuyPOS").value == "" || document.getElementById("BuyPOS").value == "-")
    {
        alert("Please enter Place of Supply");
        document.getElementById("BuyPOS").focus();
        return false;
    } else if (document.getElementById("BuyAddress").value == "" || document.getElementById("BuyAddress").value == "-")
    {
        alert("Please enter buyer address");
        document.getElementById("BuyAddress").focus();
        return false;
    } else if (document.getElementById("BuyLocation").value == "" || document.getElementById("BuyLocation").value == "-")
    {
        alert("Please enter buyer location");
        document.getElementById("BuyLocation").focus();
        return false;
    } else if (document.getElementById("BuyPin").value == "" || document.getElementById("BuyPin").value == 0 ||
            document.getElementById("BuyPin").value.length > 6 || document.getElementById("BuyPin").value.length < 6)
    {
        alert("Please enter Buyer Pincode or check entered pin code");
        document.getElementById("BuyPin").focus();
        return false;
    } else if (document.getElementById("BuyStcd").value == "" || document.getElementById("BuyStcd").value == "-")
    {
        alert("Please enter Buyer State Code");
        document.getElementById("BuyStcd").focus();
        return false;
    } else if (document.getElementById("IsServc").value == "" || document.getElementById("IsServc").value == "-")
    {
        alert("Please enter Is service (Yes/No) ");
        document.getElementById("IsServc").focus();
        return false;
    } else if (document.getElementById("HsnCd").value == "" || document.getElementById("HsnCd").value == "-")
    {
        alert("Please enter HSN Code");
        document.getElementById("HsnCd").focus();
        return false;
    } else if (document.getElementById("UnitPrice").value == "" || document.getElementById("UnitPrice").value == "-")
    {
        alert("Please enter Unit Price");
        document.getElementById("UnitPrice").focus();
        return false;
    } else if (document.getElementById("TotAmt").value == "" || document.getElementById("TotAmt").value == 0)
    {
        alert("Please enter Total Amount");
        document.getElementById("TotAmt").focus();
        return false;
    } else if (document.getElementById("AssAmt").value == "" || document.getElementById("AssAmt").value == 0)
    {
        alert("Please enter Taxable Amount");
        document.getElementById("AssAmt").focus();
        return false;
    } else if (document.getElementById("GstRt").value == "" || document.getElementById("GstRt").value == 0)
    {
        alert("Please enter GST Rate");
        document.getElementById("GstRt").focus();
        return false;
    } else if (document.getElementById("TotItemVal").value == "" || document.getElementById("TotItemVal").value == 0)
    {
        alert("Please enter Total Item Value");
        document.getElementById("TotItemVal").focus();
        return false;
    } else if (document.getElementById("AssVal").value == "" || document.getElementById("AssVal").value == 0)
    {
        alert("Please enter assesable value");
        document.getElementById("AssVal").focus();
        return false;
    } else if (document.getElementById("TotInvVal").value == "" || document.getElementById("TotInvVal").value == 0)
    {
        alert("Please enter Total Invoice Value");
        document.getElementById("TotInvVal").focus();
        return false;
    } else if (document.getElementById("ewayBillDtls").checked)
    {
        if (document.getElementById("Transid").value == "")
        {
            alert("Please enter Transporter GST No.");
            document.getElementById("Transid").focus();
            return false;
        } else if (document.getElementById("TransMode").value == "")
        {
            alert("Please enter mode of transportation");
            document.getElementById("TransMode").focus();
            return false;
        } else if (document.getElementById("Distance").value == "")
        {
            alert("Please enter distance");
            document.getElementById("Distance").focus();
            return false;
        }

    }

    return true;

}
//
//This function helps to validate forms field before form submit
//Function for GST_Einvoice
/*****************************CHANGES MADE BY @RENUKA01AUG2022**************************************************/
/***************************************************************************************************************/
function checkGSTInvoiceFields()
{
    if (document.getElementById("No").value == "") {
        alert("Please enter valid Invoice No!");
        document.getElementById("No").focus();
        return false;
    } else if (document.getElementById("Dt").value == "") {
        alert("Please enter Date Like 01 Jan 2022 Format!");
        document.getElementById("Dt").focus();
        return false;
    } else if (document.getElementById("SelGstin").value == "" || document.getElementById("SelGstin").value == "-") {
        alert("Please enter valid GST No!");
        document.getElementById("SelGstin").focus();
        return false;
    } else if (document.getElementById("SelLglNm").value == "" || document.getElementById("SelLglNm").value == "-") {
        alert("Please enter Firm Legal Name");
        document.getElementById("SelLglNm").focus();
        return false;
    } else if (document.getElementById("SelAddress").value == "" || document.getElementById("SelAddress").value == "-") {
        alert("Please enter address");
        document.getElementById("SelAddress").focus();
        return false;
    } else if (document.getElementById("SelLocation").value == "" || document.getElementById("SelLocation").value == "-") {
        alert("Please enter location");
        document.getElementById("SelLocation").focus();
        return false;
    } else if (document.getElementById("SelPin").value == "" || document.getElementById("SelPin").value == "-" ||
            document.getElementById("SelPin").value.length > 6 || document.getElementById("SelPin").value.length < 6) {
        alert("Please enter Pincode or Check entered pincode");
        document.getElementById("SelPin").focus();
        return false;
    } else if (document.getElementById("SelStcd").value == "" || document.getElementById("SelStcd").value == "-") {
        alert("Please enter State Code");
        document.getElementById("SelStcd").focus();
        return false;
    } else if (document.getElementById("BuyGstin").value == "" || document.getElementById("BuyGstin").value == "-")
    {
        alert("Please enter Buyer GST No");
        document.getElementById("BuyGstin").focus();
        return false;
    } else if (document.getElementById("BuyLglNm").value == "" || document.getElementById("BuyLglNm").value == "-")
    {
        alert("Please enter Buyer Legal Name");
        document.getElementById("BuyLglNm").focus();
        return false;
    } else if (document.getElementById("BuyPOS").value == "" || document.getElementById("BuyPOS").value == "-")
    {
        alert("Please enter Place of Supply");
        document.getElementById("BuyPOS").focus();
        return false;
    } else if (document.getElementById("BuyAddress").value == "" || document.getElementById("BuyAddress").value == "-")
    {
        alert("Please enter buyer address");
        document.getElementById("BuyAddress").focus();
        return false;
    } else if (document.getElementById("BuyLocation").value == "" || document.getElementById("BuyLocation").value == "-")
    {
        alert("Please enter buyer location");
        document.getElementById("BuyLocation").focus();
        return false;
    } else if (document.getElementById("BuyPin").value == "" || document.getElementById("BuyPin").value == 0 ||
            document.getElementById("BuyPin").value.length > 6 || document.getElementById("BuyPin").value.length < 6)
    {
        alert("Please enter Buyer Pincode or check entered pin code");
        document.getElementById("BuyPin").focus();
        return false;
    } else if (document.getElementById("BuyStcd").value == "" || document.getElementById("BuyStcd").value == "-")
    {
        alert("Please enter Buyer State Code");
        document.getElementById("BuyStcd").focus();
        return false;
    } else if (document.getElementById("IsServc").value == "" || document.getElementById("IsServc").value == "-")
    {
        alert("Please enter Is service (Yes/No) ");
        document.getElementById("IsServc").focus();
        return false;
    } else if ((document.getElementById("HsnCd").value == "" || document.getElementById("HsnCd").value == "-") && 
             document.getElementById("HsnCd").value.length > 6 || document.getElementById("HsnCd").value.length < 6)
    {
        alert("Please enter HSN Code or check entered HSN");
        document.getElementById("HsnCd").focus();
        return false;
    } else if (document.getElementById("UnitPrice").value == "" || document.getElementById("UnitPrice").value == "-")
    {
        alert("Please enter Unit Price");
        document.getElementById("UnitPrice").focus();
        return false;
    } else if (document.getElementById("TotAmt").value == "" || document.getElementById("TotAmt").value == 0)
    {
        alert("Please enter Total Amount");
        document.getElementById("TotAmt").focus();
        return false;
    } else if (document.getElementById("AssAmt").value == "" || document.getElementById("AssAmt").value == 0)
    {
        alert("Please enter Taxable Amount");
        document.getElementById("AssAmt").focus();
        return false;
    } else if (document.getElementById("GstRt").value == "" || document.getElementById("GstRt").value == 0)
    {
        alert("Please enter GST Rate");
        document.getElementById("GstRt").focus();
        return false;
    } else if (document.getElementById("TotItemVal").value == "" || document.getElementById("TotItemVal").value == 0)
    {
        alert("Please enter Total Item Value");
        document.getElementById("TotItemVal").focus();
        return false;
    } else if ((document.getElementById("Nm").value != "" && document.getElementById("Nm").value != null) && (document.getElementById("Nm").value.length > 100))
    {
        alert("PLEASE ENTER PAYEE NAME BETWEEN 1 TO 100 CHARACTERS");
        document.getElementById("Nm").focus();
        return false;
    } else if ((document.getElementById("Accdet").value != "" && document.getElementById("Accdet").value != null) && (document.getElementById("Accdet").value.length > 18))
    {
        alert("PLEASE ENTER ACCOUNT NUMBER BETWEEN 1 TO 18 CHARACTERS");
        document.getElementById("Accdet").focus();
        return false;
    } else if ((document.getElementById("Mode").value != "" && document.getElementById("Mode").value != null) && (document.getElementById("Mode").value.length > 18))
    {
        alert("PLEASE ENTER MODE OF PAYMENT BETWEEN 1 TO 18 CHARACTERS");
        document.getElementById("Mode").focus();
        return false;
    } else if ((document.getElementById("Fininsbr").value != "" && document.getElementById("Fininsbr").value != null) && (document.getElementById("Fininsbr").value.length > 11))
    {
        alert("PLEASE ENTER IFSC CODE BETWEEN 1 TO 11 CHARACTERS");
        document.getElementById("Fininsbr").focus();
        return false;
    } else if ((document.getElementById("Payterm").value != "" && document.getElementById("Payterm").value != null) && (document.getElementById("Payterm").value.length > 100))
    {
        alert("PLEASE ENTER TERM OF PAYMENT BETWEEN 1 TO 100 CHARACTERS");
        document.getElementById("Payterm").focus();
        return false;
    } else if ((document.getElementById("Payinstr").value != "" && document.getElementById("Payinstr").value != null) && (document.getElementById("Payinstr").value.length > 100))
    {
        alert("PLEASE ENTER PAYMENT INSTRUCTION BETWEEN 1 TO 100 CHARACTERS");
        document.getElementById("Payinstr").focus();
        return false;
    } else if ((document.getElementById("Crtrn").value != "" && document.getElementById("Crtrn").value != null) && (document.getElementById("Crtrn").value.length > 100))
    {
        alert("PLEASE ENTER CREDIT TRANSFER DETAILS BETWEEN 1 TO 100 CHARACTERS");
        document.getElementById("Crtrn").focus();
        return false;
    } else if ((document.getElementById("Dirdr").value != "" && document.getElementById("Dirdr").value != null) && (document.getElementById("Dirdr").value.length > 100))
    {
        alert("PLEASE ENTER DIRECT DEBIT DETAILS BETWEEN 1 TO 100 CHARACTERS");
        document.getElementById("Dirdr").focus();
        return false;
    } else if ((document.getElementById("Crday").value != "" && document.getElementById("Crday").value != null) && (document.getElementById("Crday").value.length > 4))
    {
        alert("PLEASE ENTER CREDIT DAYS LENGTH BETWEEN 1 TO 9999");
        document.getElementById("Crday").focus();
        return false;
    } else if ((document.getElementById("Paidamt").value != "" && document.getElementById("Paidamt").value != null) && (document.getElementById("Paidamt").value.length > 99999999999999))
    {
        alert("PLEASE ENTER BALANCE AMOUNT");
        document.getElementById("Paidamt").focus();
        return false;
    } else if ((document.getElementById("Paymtdue").value != "" && document.getElementById("Paymtdue").value != null) && (document.getElementById("Paymtdue").value.length > 99999999999999))
    {
        alert("PLEASE ENTER PAYMENT DUE AMOUNT");
        document.getElementById("Paymtdue").focus();
        return false;
    } else if (document.getElementById("AssVal").value == "" || document.getElementById("AssVal").value == 0)
    {
        alert("Please enter assesable value");
        document.getElementById("AssVal").focus();
        return false;
    } else if (document.getElementById("TotInvVal").value == "" || document.getElementById("TotInvVal").value == 0)
    {
        alert("Please enter Total Invoice Value");
        document.getElementById("TotInvVal").focus();
        return false;
    } else if (document.getElementById("ewayBillDtls").checked)
    {
        if ((document.getElementById("Transid").value == "") || document.getElementById("Transid").value.length > 16 || document.getElementById("Transid").value.length < 15)
        {
            alert("Please enter valid Transporter GST No.");
            document.getElementById("Transid").focus();
            return false;
        } else if ((document.getElementById("Distance").value == "" || document.getElementById("Distance").value == 0) || (document.getElementById("Distance").value > 10000))
        {
            alert("Please enter Distance");
            document.getElementById("Distance").focus();
            return false;
        } else if ((document.getElementById("TransMode").value == "" || document.getElementById("TransMode").value == 0) || (document.getElementById("TransMode").value.length > 1))
        {
            alert("Please enter mode of transportation of max length 1");
            document.getElementById("TransMode").focus();
            return false;
        }

    }
    return true;

}
function checkEWBFields()
{
    if ((document.getElementById("Transid").value == "") || document.getElementById("Transid").value.length > 16 || document.getElementById("Transid").value.length < 15)
    {
        alert("Please enter valid Transporter GST No.");
        document.getElementById("Transid").focus();
        return false;
    } else if ((document.getElementById("Distance").value == "" || document.getElementById("Distance").value == 0) || (document.getElementById("Distance").value > 10000))
    {
        alert("Please enter Distance");
        document.getElementById("Distance").focus();
        return false;
    } else if ((document.getElementById("TransMode").value == "" || document.getElementById("TransMode").value == 0) || (document.getElementById("TransMode").value.length > 1))
    {
        alert("Please enter mode of transportation of max length 1");
        document.getElementById("TransMode").focus();
        return false;
    }


    return true;

}


//-------START CODE TO PRINT QUOTATION BY TEXT @AUTHOR: RANJEET KAMBLE 03JAN2025---------------//
function upLayoutFieldInDb(fieldName, value){
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "ompplpad.php?fieldName=" + fieldName + "&value=" + value, true);
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            console.log("Printed successfully.");
        } else {
            console.error('The request failed!');
        }
    };
    xhr.onerror = function () {
        console.error('There was a network error.');
    };

    xhr.send();
}

function wait(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function connectToBluetoothDevice(selectedDevice) {
  const abortController = new AbortController();
  selectedDevice.addEventListener('advertisementreceived', async (event) => {
    abortController.abort();
    try {
     server =  await selectedDevice.gatt.connect();
     console.log(server);
    }
    catch(error) {
        console.log('Not connecting:'+error)
    }
  }, { once: true });
  try {
    await selectedDevice.watchAdvertisements({ signal: abortController.signal });
  }
  catch(error) {
    console.log('Failed: ' + error);
  }
}

async function findDevices(name,frdesc,fradd,ph_num,pr_code,pr_dt,pr_nm,pr_gs_wt,pr_gs_wt_t,pr_ls_wt,pr_ls_wt_t,pr_nt_wt,pr_nt_wt_t,
pr_purity,va_wt,t_wt,item_val,met_rate,va_amt,mk_chrg,st_amt,other_charge,taxOp,tax,t_amt,q_lay,newPrinter,quotForm,gold_rate='',
silver_rate='',cr_nm='',cr_wt='',cr_wt_t='',cr_rt='',cr_amt='') {
    try {
        if (!navigator.bluetooth) {
            alert('Print by txt is not supported on this device/browser.');
            return;
        }
        
        document.getElementById('Print').style.display = 'none';
        
        if(newPrinter == "YES"){
            selectedDevice = await navigator.bluetooth.requestDevice({
                filters: [{ services: ['000018f0-0000-1000-8000-00805f9b34fb'] }]
//                acceptAllDevices: true
            });
            server = await selectedDevice.gatt.connect();
            console.log('Connected to device:', selectedDevice.name);
            
            exploreServices(selectedDevice,name,frdesc,fradd,ph_num,pr_code,pr_dt,pr_nm,pr_gs_wt,pr_gs_wt_t,pr_ls_wt,pr_ls_wt_t,pr_nt_wt,pr_nt_wt_t,
            pr_purity,va_wt,t_wt,item_val,met_rate,va_amt,mk_chrg,st_amt,other_charge,taxOp,tax,t_amt,q_lay,newPrinter,quotForm,gold_rate,silver_rate,
            cr_nm,cr_wt,cr_wt_t,cr_rt,cr_amt);
            
        }else{
            const devices = await navigator.bluetooth.getDevices();
            await wait(2000);
            for (let device of devices) {
                connectToBluetoothDevice(device); 
            }

            await wait(3000);
            exploreServices(selectedDevice,name,frdesc,fradd,ph_num,pr_code,pr_dt,pr_nm,pr_gs_wt,pr_gs_wt_t,pr_ls_wt,pr_ls_wt_t,pr_nt_wt,pr_nt_wt_t,
            pr_purity,va_wt,t_wt,item_val,met_rate,va_amt,mk_chrg,st_amt,other_charge,taxOp,tax,t_amt,q_lay,newPrinter,quotForm,gold_rate,silver_rate,
            cr_nm,cr_wt,cr_wt_t,cr_rt,cr_amt);
        }
    } catch (error) {
        alert('Failed:'+error);
        
        selectedDevice = await navigator.bluetooth.requestDevice({
            filters: [{ services: ['000018f0-0000-1000-8000-00805f9b34fb'] }]
//                acceptAllDevices: true
        });
        server = await selectedDevice.gatt.connect();
        console.log('Connected to device:', selectedDevice.name);

        exploreServices(selectedDevice,name,frdesc,fradd,ph_num,pr_code,pr_dt,pr_nm,pr_gs_wt,pr_gs_wt_t,pr_ls_wt,pr_ls_wt_t,pr_nt_wt,pr_nt_wt_t,
        pr_purity,va_wt,t_wt,item_val,met_rate,va_amt,mk_chrg,st_amt,other_charge,taxOp,tax,t_amt,q_lay,newPrinter,quotForm,gold_rate,silver_rate,
        cr_nm,cr_wt,cr_wt_t,cr_rt,cr_amt);

    }
}

// Function to explore services and characteristics of the paired device
async function exploreServices(selectedDevice,name,frdesc,fradd,ph_num,pr_code,pr_dt,pr_nm,pr_gs_wt,pr_gs_wt_t,pr_ls_wt,pr_ls_wt_t,pr_nt_wt,pr_nt_wt_t,
pr_purity,va_wt,t_wt,item_val,met_rate,va_amt,mk_chrg,st_amt,other_charge,taxOp,tax,t_amt,q_lay,newPrinter,quotForm,gold_rate,silver_rate,
cr_nm,cr_wt,cr_wt_t,cr_rt,cr_amt) {
//    if (!selectedDevice) {
//        alert('No device connected.....');
//        return;
//    }

    try {
//       console.log(server);
        let service_uuid = "";
        let char_uuid = "";
//        server = await selectedDevice.gatt.connect();
//        const server = selectedDevice;

        // Get all available services
        const services = await server.getPrimaryServices();
        
        for (let service of services) {
            service_uuid = service.uuid;
//            console.log(service_uuid);
            const characteristics = await service.getCharacteristics();
            
            for (let characteristic of characteristics) {
                
                if (characteristic.properties.write) {
                    char_uuid = characteristic.uuid;
//                    console.log(char_uuid);
                }
            }
        }
//        service_uuid = '000018f0-0000-1000-8000-00805f9b34fb';
//        char_uuid = '00002af1-0000-1000-8000-00805f9b34fb';
        
        sendPrintCommand(selectedDevice, service_uuid, char_uuid,name,frdesc,fradd,ph_num,pr_code,pr_dt,pr_nm,pr_gs_wt,pr_gs_wt_t,pr_ls_wt,pr_ls_wt_t,pr_nt_wt,pr_nt_wt_t,
pr_purity,va_wt,t_wt,item_val,met_rate,va_amt,mk_chrg,st_amt,other_charge,taxOp,tax,t_amt,q_lay,newPrinter,quotForm,gold_rate,silver_rate,
cr_nm,cr_wt,cr_wt_t,cr_rt,cr_amt);
    } catch (error) {
        alert('Failed to explore services:', error);
        return;
    }
}

// Function to send a print command to the paired device
async function sendPrintCommand(selectedDevice, service_uuid, char_uuid,name,frdesc,fradd,ph_num,pr_code,pr_dt,pr_nm,pr_gs_wt,pr_gs_wt_t,pr_ls_wt,pr_ls_wt_t,pr_nt_wt,pr_nt_wt_t,
pr_purity,va_wt,t_wt,item_val,met_rate,va_amt,mk_chrg,st_amt,other_charge,taxOp,tax,t_amt,q_lay,newPrinter,quotForm,gold_rate,silver_rate,
cr_nm,cr_wt,cr_wt_t,cr_rt,cr_amt) {
    
//    if (!selectedDevice) {
//        alert('No device connected');
//        return;
//    }

    try {
        
//        const server = await selectedDevice.gatt.connect();
        if (!server) {
            alert('Device is not connected');
            return;
        }
        let service = await server.getPrimaryService(service_uuid);
        let characteristic = await service.getCharacteristic(char_uuid);
        const resetPrev = new Uint8Array([0x1B, 0x40]); // reset setting
        const cutPaper = new Uint8Array([0x0A, 0x0A, 0x1D, 0x56, 0x00]);
        const boldOn = new Uint8Array([0x1B, 0x45, 0x01]);  // ESC E 1 (bold on)
        const boldOff = new Uint8Array([0x1B, 0x45, 0x00]);  // ESC E 0 (bold off)
                
        if(q_lay != '80MM'){
            wd_len = 32;
            bottom_pad = 10;
            
        }else{
            wd_len = 48;
            bottom_pad = 5;
        }
        separate_line = "-".repeat(wd_len);
        
        // print data
        try {
            printData = "";
            // Reset previous settings of printer
            await characteristic.writeValue(resetPrev);
            
            if(quotForm == "QuatationForm1" || quotForm == "" || quotForm == null){
                // Quotation form 1
                
                if(name){ printData = printData +  sideSpace(name, wd_len); }
                
                if(frdesc){ printData = printData +  sideSpace(frdesc, wd_len); }

                if(fradd){ printData = printData +  sideSpace(fradd, wd_len); }
                
                if(ph_num){ printData = printData +  sideSpace(ph_num, wd_len) + "\n";} 
                
                printData = printData + sideSpace("ESTIMATE", wd_len) + "\n";
                
//                printText = new TextEncoder().encode(printData);
//                await characteristic.writeValue(printText);
//
//                printData = '';
                
                if(("Code: "+pr_code+" Date: "+pr_dt).length > wd_len){
                    if(("Code: "+pr_code).length + 1 > wd_len){
                        printData = printData + adjustLength("Code: "+pr_code, wd_len, 6) + "\n";
                    }else{
                        printData = printData + betweenSpace("Code: "+pr_code, '', wd_len) + "\n";
                    }
                    printData = printData + betweenSpace("Date: "+pr_dt, '', wd_len) + "\n";
                }else{
                    printData = printData + betweenSpace("Code: "+pr_code,"Date: "+pr_dt, wd_len) + "\n";
                }
                
                printData = printData + separate_line + "\n";
                
                if(pr_nm.length + 1 > wd_len - (parseFloat(pr_gs_wt).toFixed(3)+" "+pr_gs_wt_t).length)
                {
                    printData = printData + adjustLength(pr_nm, wd_len - (parseFloat(pr_gs_wt).toFixed(3)+" "+pr_gs_wt_t).length + 1) + "\n";
                    
                    printData = printData + betweenSpace('', parseFloat(pr_gs_wt).toFixed(3)+" "+pr_gs_wt_t, wd_len) + "\n";
                }else{
                    printData = printData + betweenSpace(pr_nm, parseFloat(pr_gs_wt).toFixed(3)+" "+pr_gs_wt_t, wd_len) + "\n";
                }
                
                if(pr_ls_wt > 0){ printData = printData + betweenSpace("Less Weight(-)", parseFloat(pr_ls_wt).toFixed(3)+" "+pr_ls_wt_t, wd_len) + "\n"; }
                
                printData = printData + betweenSpace("Net Weight", parseFloat(pr_nt_wt).toFixed(3)+" "+pr_nt_wt_t, wd_len) + "\n";
                
                printData = printData + betweenSpace("Purity", parseFloat(pr_purity).toFixed(2)+"  %", wd_len) + "\n";
                
//                printText = new TextEncoder().encode(printData);
//                await characteristic.writeValue(printText);
//                
//                printData = '';
                
                if(va_wt > 0){ printData = printData + betweenSpace("V/A Weight(+)", parseFloat(va_wt).toFixed(3)+" "+pr_gs_wt_t, wd_len) + "\n"; }
                
                printData = printData + betweenSpace("Total Weight", parseFloat(t_wt).toFixed(3)+" "+pr_gs_wt_t, wd_len) + "\n";
                
                printData = printData + betweenSpace("Metal Rate", parseFloat(met_rate).toFixed(2)+"/ GM", wd_len) + "\n";
                
//                printText = new TextEncoder().encode(printData);
//                await characteristic.writeValue(printText);
//                
//                printData = '';
                
                printData = printData + separate_line + "\n";
                
                printData = printData + betweenSpace("Metal Val", parseFloat(item_val).toFixed(2), wd_len) + "\n";
                
                if(va_amt > 0){ printData = printData + betweenSpace("Val Added", parseFloat(va_amt).toFixed(2), wd_len) + "\n"; }
                
                if(st_amt > 0){ printData = printData + betweenSpace("Stone Val", parseFloat(st_amt).toFixed(2), wd_len) + "\n"; }
                
                if(mk_chrg > 0){ printData = printData + betweenSpace("Mkg Chrgs", parseFloat(mk_chrg).toFixed(2), wd_len) + "\n"; }
                
                if(other_charge > 0){ printData = printData + betweenSpace("Oth Chrgs", parseFloat(other_charge).toFixed(2), wd_len) + "\n"; }
                
                if(taxOp == "YES"){
                
                    printData = printData + separate_line + "\n";

                    printData = printData + betweenSpace("", parseFloat(parseFloat(t_amt) - parseFloat(tax)).toFixed(2), wd_len) + "\n";

                    printData = printData + betweenSpace("CGST @ 1.5", parseFloat(parseFloat(tax)/2).toFixed(2), wd_len) + "\n";

                    printData = printData + betweenSpace("SGST @ 1.5", parseFloat(parseFloat(tax)/2).toFixed(2), wd_len) + "\n";
                    
                }
                
                printData = printData + separate_line + "\n";
                
//                printText = new TextEncoder().encode(printData);
//                await characteristic.writeValue(printText);
//                
//                await characteristic.writeValue(boldOn);
//                printData = "";
                printData = printData + betweenSpace("Total Amount", parseFloat(t_amt).toFixed(2), wd_len) + "\n\n\n";
                
//                printText = new TextEncoder().encode(printData);
//                await characteristic.writeValue(printText);
//                
//                await characteristic.writeValue(boldOff);
//                
//                printData = "";
                
                printData = printData + betweenSpace("", "Auth. Signatory", wd_len) + "\n\n";
                
                printData = printData + sideSpace("Thank You For Your Contact!", wd_len) + "\n\n\n";
                
            }else{
                // Quotation form 2
                if(name){ printData = printData +  betweenSpace(name, '', wd_len) + "\n"; }
                
                if(ph_num){ printData = printData +  betweenSpace(ph_num, '', wd_len) + "\n\n"; }
                
                printData = printData + sideSpace("ESTIMATE", wd_len) + "\n";
                
//                printText = new TextEncoder().encode(printData);
//                await characteristic.writeValue(printText);
//
//                printData = '';
        
                if(("Gold Rate: "+gold_rate+" Silver Rate: "+silver_rate).length > wd_len){
                    gd = betweenSpace("Gold Rate: "+gold_rate, '', wd_len) + "\n";
                    sl = betweenSpace("Silver Rate: "+silver_rate, '', wd_len);
                    printData = printData + gd + sl + "\n";
                }else{
                    printData = printData + betweenSpace("Gold Rate: "+gold_rate,"Silver Rate: "+silver_rate, wd_len) + "\n";
                }
                
//                printText = new TextEncoder().encode(printData);
//                await characteristic.writeValue(printText);
//                
//                printData = '';
                
                if(("ITEM: "+pr_nm+" DATE: "+pr_dt).length > wd_len){
                    if(("ITEM: "+pr_nm).length > wd_len){
                        printData = printData + adjustLength("ITEM: "+pr_nm, wd_len, 6) + "\n";
                    }else{
                        printData = printData + betweenSpace("ITEM: "+pr_nm, '', wd_len) + "\n";
                    }
                    
                    printData = printData + "DATE: "+ pr_dt + "\n";
                }else{
                    printData = printData + betweenSpace("ITEM: "+pr_nm,"DATE: "+pr_dt, wd_len) + "\n";
                }
                
                if(("TAG NO: "+pr_code+"("+parseFloat(pr_purity).toFixed(2)+"%)").length > wd_len){
                    printData = printData + adjustLength("TAG NO:"+pr_code+"("+parseFloat(pr_purity).toFixed(2)+"%)", wd_len, 8) + "\n\n";
                }else{
                    printData = printData + betweenSpace("TAG NO: "+pr_code+"("+parseFloat(pr_purity).toFixed(2)+"%)", '', wd_len) + "\n\n";
                }
                
//                printText = new TextEncoder().encode(printData);
//                await characteristic.writeValue(printText);
//                
//                printData = '';
                
                printData = printData + betweenSpace("GS WT: "+parseFloat(pr_gs_wt).toFixed(3)+" "+pr_gs_wt_t, '', wd_len) + "\n";
                
                if(pr_ls_wt > 0){ printData = printData + betweenSpace("LESS WT: "+parseFloat(pr_ls_wt).toFixed(3)+" "+pr_ls_wt_t, '', wd_len) + "\n"; }
                
                if(("NT WT: "+parseFloat(pr_nt_wt).toFixed(3)+" @ "+parseFloat(met_rate).toFixed(2)+" = "+parseFloat(item_val).toFixed(2)).length > wd_len){
                    printData = printData + betweenSpace("NT WT: "+parseFloat(pr_nt_wt).toFixed(3), '', wd_len) + "\n";
                    printData = printData + betweenSpace("       @ "+parseFloat(met_rate).toFixed(2)+" = ", parseFloat(item_val).toFixed(2), wd_len) + "\n";
                }else{
                    printData = printData + betweenSpace("NT WT: "+parseFloat(pr_nt_wt).toFixed(3)+" @ "+parseFloat(met_rate).toFixed(2)+" = ", parseFloat(item_val).toFixed(2), wd_len) + "\n";
                }
                
//                printText = new TextEncoder().encode(printData);
//                await characteristic.writeValue(printText);
//                
//                printData = '';
                
                if (cr_nm !== '') {
                    const cnmarr = cr_nm.split(":");
                    const cwtarr = cr_wt.split(":");
                    const cwttarr = cr_wt_t.split(":");
                    const crtarr = cr_rt.split(":");
                    const camtarr = cr_amt.split(":");
                    const crcount = cnmarr.length;

                    for (let ind = 1; ind < crcount; ind++) {
                        let cr_det = `${cnmarr[ind]} : ${cwtarr[ind]} ${cwttarr[ind]} @ ${crtarr[ind]} = `;
                        let cr_row = '';

                        if (cr_det.length > (wd_len-13)) {
                            cr_row = betweenSpace(`${cnmarr[ind]} : ${cwtarr[ind]} ${cwttarr[ind]} = `, '', wd_len);
                            let nm_len = `${cnmarr[ind]} : `.length;
                            if(nm_len > 6 && q_lay != '80MM'){
                                nm_len = 6;
                            }
                            const nxt_line_space = " ".repeat(nm_len);
                            cr_row += `\n${betweenSpace(`${nxt_line_space}@ ${crtarr[ind]} = `, camtarr[ind], wd_len)}`;
                        } else {
                            cr_row = betweenSpace(cr_det, camtarr[ind], wd_len);
                        }
                        
                        printData = printData + cr_row + "\n";
                        
//                        printText = new TextEncoder().encode(printData);
//                        await characteristic.writeValue(printText);
//
//                        printData = '';
                    }
                }
                
                if(mk_chrg > 0){ printData = printData + betweenSpace("MAKING :", parseFloat(mk_chrg).toFixed(2), wd_len) + "\n"; }
                
                if(other_charge > 0){ printData = printData + betweenSpace("OTH CHRG :", parseFloat(other_charge).toFixed(2), wd_len) + "\n"; }
                
                if(va_wt > 0){printData = printData + betweenSpace("V/A WT ("+parseFloat(va_wt).toFixed(3)+" "+pr_gs_wt_t+") =", parseFloat(va_amt).toFixed(2), wd_len) + "\n"; }
                
                if(taxOp == "YES"){
                    
                    printData = printData + separate_line + "\n";

                    printData = printData + betweenSpace("", parseFloat(parseFloat(t_amt) - parseFloat(tax)).toFixed(2), wd_len) + "\n";

                    printData = printData + betweenSpace("CGST @ 1.5", parseFloat(parseFloat(tax)/2).toFixed(2), wd_len) + "\n";

                    printData = printData + betweenSpace("SGST @ 1.5", parseFloat(parseFloat(tax)/2).toFixed(2), wd_len) + "\n";
                    
                    
                }
                
                printData = printData + separate_line + "\n";
                
//                printText = new TextEncoder().encode(printData);
//                await characteristic.writeValue(printText);
//                
//                await characteristic.writeValue(boldOn);
//                printData = "";
                printData = printData + betweenSpace("NET AMOUNT", parseFloat(t_amt).toFixed(2), wd_len) + "\n\n\n";
                
//                printText = new TextEncoder().encode(printData);
//                await characteristic.writeValue(printText);
//                await characteristic.writeValue(boldOff);

//                printData = "";
                
                printData = printData + betweenSpace("", "Signatory", wd_len) + "\n\n";
                
                printData = printData + sideSpace("Thank You For Your Contact!", wd_len) + "\n\n\n";
                
            }
            
            printText = new TextEncoder().encode(printData);
            
            for (let i = 0; i < printText.length; i += wd_len) {
                const chunk = printText.slice(i, i + wd_len);
                await characteristic.writeValue(chunk);
            }
            
            characteristic = null;
            service = null;
            selectedDevice = null;
            server = null;
            
            if(newPrinter == "YES"){
                upLayoutFieldInDb('selNewBluetoothDevice', "NO");
            }
            
            await wait(500);
            
            window.close();
        } catch (error) {
            console.error('Failed to send print command:', error);
            alert('Failed to send print command');
        }
                
    } catch (error) {
        console.error('Failed to send print command:', error);
        alert('Failed to send print command');
    }
}

function sideSpace(name, wd_len) {
    const char = " ";
    let heading = "";
    let newLine = "";
    const nameArr = name.split(" ");
    const nameCount = nameArr.length;
    let lineLen = 0;
    let wordCount = 0;

    nameArr.forEach(nameWord => {
        wordCount += 1;
        lineLen = newLine.length;
        if (lineLen + nameWord.length + 1 === wd_len) {
            newLine += nameWord + " ";
            heading += newLine + "\n";
            newLine = "";
        } else if (lineLen + nameWord.length + 1 < wd_len) {
            newLine += (newLine.length > 0 ? nameWord + " " : nameWord + " ");

            if (wordCount === nameCount) {
                const allRemSpace = wd_len - newLine.length;
                const sideSpaceCount = Math.floor(allRemSpace / 2);
                const sideSpace = char.repeat(sideSpaceCount);

                if (allRemSpace % 2 > 0) {
                    newLine = sideSpace + newLine + sideSpace + " ";
                } else {
                    newLine = sideSpace + newLine + sideSpace;
                }

                heading += newLine + "\n";
            }
        } else {
            const allRemSpace = wd_len - lineLen;
            const sideSpaceCount = Math.floor(allRemSpace / 2);
            const sideSpace = char.repeat(sideSpaceCount);

            if (allRemSpace % 2 > 0) {
                newLine = sideSpace + newLine + sideSpace + " ";
            } else {
                newLine = sideSpace + newLine + sideSpace;
            }

            heading += newLine + "\n";
            newLine = nameWord + " ";
        }
    });

    return heading;
}

function betweenSpace(left_data, right_data, wd_len) {
    const line_count = left_data.length + right_data.length;
    let space_count = wd_len - line_count;
    if(space_count <= 0){
        space_count = 0;
    }
    const line_data = left_data + " ".repeat(space_count) + right_data;
    return line_data;
}

function adjustLength(data, wdLen, leftSpace = 0) {
    // Generate the left space string
    const indentation = ' '.repeat(leftSpace);

    // Adjust the maximum width to account for left space for subsequent lines
    const effectiveLenFirstLine = wdLen; // Full width for the first line
    const effectiveLen = wdLen - leftSpace; // Reduced width for subsequent lines

    let currentLine = '';
    let result = '';
    let isFirstLine = true;

    const addLineToResult = (line) => {
        if (line.trim() !== '') {
            const linePrefix = isFirstLine ? '' : indentation;
            result += linePrefix + line + '\n';
        }
    };

    for (let i = 0; i < data.length; ) {
        // Determine the line limit for the current line
        const lineLimit = isFirstLine ? effectiveLenFirstLine : effectiveLen;

        if (currentLine.length < lineLimit) {
            // Fill the current line until it reaches the limit
            const remainingSpace = lineLimit - currentLine.length;
            const nextChunk = data.slice(i, i + remainingSpace);

            currentLine += nextChunk;
            i += remainingSpace;

            // If we hit the line limit, move the current line to the result
            if (currentLine.length === lineLimit || i >= data.length) {
                addLineToResult(currentLine);
                currentLine = '';
                isFirstLine = false;
            }
        }
    }

    // Add the last line if it exists
    if (currentLine.trim() !== '') {
        const linePrefix = isFirstLine ? '' : indentation;
        result += linePrefix + currentLine;
    }

    return result.trimEnd(); // Remove the trailing newline
}

//-------END CODE TO PRINT QUOTATION BY TEXT @AUTHOR: RANJEET KAMBLE 03JAN2025---------------//
