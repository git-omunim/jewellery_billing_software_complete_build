// *****************************************************************************//
// Start Code for Function Keys in Browser
// *****************************************************************************//
var isALT = 'F';
/*********Start Code To Declare Var @Author:PRIYA27AUG13***************/
var isCLT = 'F';
var gbCLTFormName;
var gbCLTFormFun = 'TRUE';
/*********End Code To Declare Var @Author:PRIYA27AUG13***************/

function shortCutKeyFun(event) {

    keyCode = event.keyCode;

    if (keyCode == '112' && isALT == 'F') { // F1 Key   -    For Home Page
        //Start Code to disable the Function Keys for Browser
        //alert(event.cancelable);
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        }
        else {  // IE before version 9
            window.onhelp = new Function("return false");
            event.returnValue = false;
        }
        //End Code to disable the Function Keys for Browser

        loadXMLDoc();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
                document.getElementById("custFirstNameForAddGirvi").focus();
                document.location.reload(true);
                document.location.assign("ogHomePage.php?divPanel=OwnerHome");
            }
            else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmsdv.php?divPanel=OwnerHome", true);
        xmlhttp.send();
    }
    if (keyCode == '113' && isALT == 'F') { // F2 Key   -     For Girvi Panel Page

        //Start Code to disable the Function Keys for Browser
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        }
        else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser

        loadXMLDoc();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            }
            else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=AddStock", true);
        xmlhttp.send();
    }

    if (keyCode == '114' && isALT == 'F') { // F3 Key   -     For Stock List

        //Start Code to disable the Function Keys for Browser
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        }
        else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser

        loadXMLDoc();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            }
            else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        /********Start Code To Change Panel Name @AUTHOR:PRIYA04MAY13**********/
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=jewelleryPanel", true);
        /********Start Code To Change Panel Name @AUTHOR:PRIYA04MAY13**********/
        xmlhttp.send();
    }
    // Start Code To add Quotation List Shortcut `CTRL+Q` @Author:Vinod-10-08-2023
    if (keyCode == '81' && isCLT == 'T') {
        navigatationPanelByFileName('mainBigMiddle', 'ogesqtlt', 'estQuotationList');
    }
    // End Code To add Quotation List Shortcut `CTRL+Q` @Author:Vinod-10-08-2023 
    if (keyCode == '115' && isALT == 'F') { // F4 Key   -   

        //Start Code to disable the Function Keys for Browser
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        }
        else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            }
            else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=SellPurchase", true);
        xmlhttp.send();
    }
    if (keyCode == '116' && isALT == 'F') { // F5 key for New Order Panel
        //Start Code to disable the Function Keys for Browser
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        }
        else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            }
            else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=NewOrder", true);
        xmlhttp.send();
    }
    if (keyCode == '117' && isALT == 'F') { // F6 key for Repair Panel
        //Start Code to disable the Function Keys for Browser
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        }
        else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            }
            else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=ItemRepair", true);
        xmlhttp.send();
    }
    if (keyCode == '118' && isALT == 'F') { // F7 key for Bar Code Print Panel
        //Start Code to disable the Function Keys for Browser
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        }
        else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            }
            else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=BarCodePrint", true);
        xmlhttp.send();
    }
    // Start code for shortcut key 119 @Author: KHUSH04JAN13 
    if (keyCode == '119' && isALT == 'F') { // F8 key for Customer List
        //Start Code to disable the Function Keys for Browser
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        }
        else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            }
            else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=CustomerList", true);
        xmlhttp.send();
    }
    // Shortcut for Alt-function keys

    //Start code for alt-function shortcut keys @Author: KHUSH04JAN13 
    document.onkeydown = function(e) { // F1 Key   -  

        if (e.which == 18)
            isALT = 'T';
        //***************************************************
        //******************Start Code To Add Ctrl-Enter Func @Author:PRIYA27AUG13*********************************
//******************Start Code To Add Ctrl-Enter Func @Author:PRIYA24AUG13*********************************
        if (e.which == 17)
            isCLT = 'T';

        if (e.which == 13 && isCLT == 'T') {             // CTL + F1 Key   -  For Add New Customer
            isCLT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            }
            else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser

            if (gbCLTFormFun != 'TRUE') {
                if (window[gbCLTFormFun]()) { //this is to check validation functions 
                    document.getElementById(gbCLTFormName).submit();
                }
            } else {
                document.getElementById(gbCLTFormName).submit();
            }
        }
        if (e.which != 17 && e.which != 13 && isCLT == 'T') {
            isCLT = 'F';
        }
        if (e.which == 61 || e.which == 107) { //This is to check '+' key
            //alert(gbCLTFormFun);
            if (gbCLTFormFun != 'TRUE') {

                //Start Code to disable the Function Keys for Browser
                if ('cancelable' in event) {    // all browsers except IE before version 9
                    // in Firefox, the cancelable property always returns true,
                    // so the cancelable state of the event cannot be determined
                    if (event.cancelable) {
                        event.preventDefault();
                    }
                }
                else {  // IE before version 9
                    event.returnValue = false;
                    event.keyCode = 0;
                }
                //End Code to disable the Function Keys for Browser
                if (gbCLTFormFun != 'TRUE') {
                    document.getElementById('panelSimilarDiv').value = 'SimilarItem';//added @Author:PRIYA18DEC14
                    if (window[gbCLTFormFun]()) {
                        //document.getElementById('panelSimilarDiv').value = 'SimilarItem';
                        document.getElementById(gbCLTFormName).submit();
                    }
                }
            }
        }
        //*****End Code To Add Ctrl-Enter Func @Author:PRIYA24AUG13**********

        //*****End Code To Add Ctrl-Enter Func @Author:PRIYA27AUG13**********
        //***************************************************
        if (e.which == 112 && isALT == 'T') { // Alt + F1 Key   -  For Add New Customer
            isALT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            }
            else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            loadXMLDoc();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                    //document.getElementById("custFirstNameForAddGirvi").focus();
                }
                else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=AddNewCustomer", true);
            xmlhttp.send();
        }

        if (e.which == 113 && isALT == 'T') { // ALT + F2 Key   -    For Supplier List
            isALT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            }
            else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            //            loadXMLDoc();
            //            xmlhttp.onreadystatechange = function() {
            //                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            //                //document.getElementById("custFirstNameForAddGirvi").focus();
            //                }
            //                else {
            //                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            //                }
            //            };
            //            xmlhttp.open("POST","include/php/omppmmdv.php?divMainMiddlePanel=SupplierList", true);
            //            xmlhttp.send(); 
            showBannerSearchPanel();
        }
        //
        if (e.which == 114 && isALT == 'T') { // ALT + F3 Key   -    For Staff List
            isALT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            }
            else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            loadXMLDoc();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                    //document.getElementById("custFirstNameForAddGirvi").focus();
                }
                else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }

            };
            xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=SupplierList", true);
            xmlhttp.send();
        }
        if (e.which == 115 && isALT == 'T') { // ALT + F4 Key   -   For Add New Girvi
            isALT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            }
            else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            loadXMLDoc();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                    //document.getElementById("custFirstNameForAddGirvi").focus();
                }
                else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }

            };
            xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=StaffList", true);
            xmlhttp.send();
        }
        if (e.which == 116 && isALT == 'T') { // ALT + F5 Key   -  For Girvi Panel
            isALT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            }
            else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            //            loadXMLDoc();
            //            xmlhttp.onreadystatechange = function() {
            //                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            //                //document.getElementById("custFirstNameForAddGirvi").focus();
            //                }
            //                else {
            //                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            //                }
            //                
            //            };
            //            xmlhttp.open("POST","include/php/omppmmdv.php?divMainMiddlePanel=GirviPanel", true);
            //            xmlhttp.send(); 
        }
        if (e.which == 117 && isALT == 'T') { // ALT + F6 Key   -   For Udhaar Panel
            isALT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            }
            else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            //            loadXMLDoc();
            //            xmlhttp.onreadystatechange = function() {
            //                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            //                //document.getElementById("custFirstNameForAddGirvi").focus();
            //                }
            //                else {
            //                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            //                }
            //                
            //            };
            //            xmlhttp.open("POST","include/php/omppmmdv.php?divMainMiddlePanel=UdhaarPanel", true);
            //            xmlhttp.send(); 
        }
        if (e.which == 118 && isALT == 'T') { // ALT + F7 Key   -   For Daily Transactions
            isALT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            }
            else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            loadXMLDoc();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                    //document.getElementById("custFirstNameForAddGirvi").focus();
                }
                else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }

            };
            xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=DailyTransactions", true);
            xmlhttp.send();
        }
        if (e.which == 119 && isALT == 'T') { // ALT + F8 Key   -   For Daily Transactions
            isALT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            }
            else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            //            loadXMLDoc();
            //            xmlhttp.onreadystatechange = function() {
            //                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            //                //document.getElementById("custFirstNameForAddGirvi").focus();
            //                }
            //                else {
            //                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            //                }
            //                
            //            };
            //            xmlhttp.open("POST","include/php/omppmmdv.php?divMainMiddlePanel=Analysis", true);
            //            xmlhttp.send(); 
        }
        //End code for alt-function shortcut keys @Author: KHUSH04JAN13 
    }
    //// Start code for shortcut keys @Author: KHUSH04JAN13 
    if (keyCode == '120' && isALT == 'F') { // F9 key for Firm Panel
        //Start Code to disable the Function Keys for Browser
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        }
        else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            }
            else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=FirmList", true);
        xmlhttp.send();
    }
    if (keyCode == '121' && isALT == 'F') { // F10 key for Account List
        //Start Code to disable the Function Keys for Browser
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        }
        else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            }
            else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=Settings", true);
        xmlhttp.send();
    }
    if (keyCode == '123' && isALT == 'F') { // F12 key for OMunim Control Panel
        //Start Code to disable the Function Keys for Browser
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        }
        else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            }
            else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=AccountList", true);
        xmlhttp.send();
    }
}
// *****************************************************************************//
// End Code for Function Keys in Browser
// *****************************************************************************//