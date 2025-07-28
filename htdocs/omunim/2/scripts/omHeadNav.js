// *****************************************************************************//
// Start Code for Function Keys in Browser
// *****************************************************************************//
var isALT = 'F';
/*********Start Code To Declare Var @Author:PRIYA17AUG13***************/
var isCLT = 'F';
var gbCLTFormName;
var gbCLTFormFun = 'TRUE';
/*********End Code To Declare Var @Author:PRIYA17AUG13***************/
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
        } else {  // IE before version 9
            window.onhelp = new Function("return false");
            event.returnValue = false;
        }
        //End Code to disable the Function Keys for Browser

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainSelectDiv").innerHTML = xmlhttp.responseText;
                document.getElementById("custFirstNameForAddGirvi").focus();
                document.location.reload(true);
                document.location.assign("omHomePage.php?divPanel=OwnerHome");
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmsdv.php?divPanel=OwnerHome", true);
        xmlhttp.send();
    }
    //Start Code To add Quotation List Shortcut `CTRL+Q` @Author:Vinod-10-08-2023
    if(keyCode == '81' && isCLT == 'T'){
        navigatationPanelByFileName('mainBigMiddle', 'ogesqtlt', 'estQuotationList');
    }
    // End Code To add Quotation List Shortcut `CTRL+Q` @Author:Vinod-10-08-2023 
    if (keyCode == '113' && isALT == 'F') { // F2 Key   -     For Girvi Panel Page

        //Start Code to disable the Function Keys for Browser
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        } else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            } else {
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
        } else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser

        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        /********Start Code To Change Panel Name @AUTHOR:PRIYA04MAY13**********/
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=jewelleryPanel", true);
        /********End Code To Change Panel Name @AUTHOR:PRIYA04MAY13**********/
        xmlhttp.send();
    }
    if (keyCode == '115' && isALT == 'F') { // F4 Key   -   

        //Start Code to disable the Function Keys for Browser
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        } else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            } else {
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
        } else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            } else {
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
        } else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            } else {
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
        } else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            } else {
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
        } else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=CustomerList", true);
        xmlhttp.send();
    }


    // Shortcut for Alt-function keys
    //
    //
    //
    //
    //
    //
    //
    //
    //
    //
    //
    //
    //
    //
    //
    //Start code for alt-function shortcut keys @Author: KHUSH04JAN13 
    document.onkeydown = function (e) { // F1 Key   -  For Home Page

        if (e.which == 18)
            isALT = 'T';
        /*****************************************************************************/
        /*************Start code for crystal @Author:PRIYA24SEP13*********************/
        /*****************************************************************************/
        if (e.which == 99 && isALT == 'T' || (e.which == 67 && isALT == 'T')) {
            isALT = 'F';
            if ('cancelable' in event) {    // all browsers except IE before version 9
                if (event.cancelable) {
                    event.preventDefault();
                }
            } else {
                event.returnValue = false;
                event.keyCode = 0;
            }
            if (document.getElementById('globalAltCId').value == 'SuppPurPanel') {
                getSuppPurCryVisibility();
            } else {
                if (document.getElementById('cryShorcut').value == 'StockPanel') {
                    //getMoreCrystalDiv(getCrystalDiv + 1, document.getElementById('cryShorcut').value);
                    getCrystalFunc(crystalCount + 1, 'crystalAddDiv', 'StockPanel');
                } else if (document.getElementById('cryShorcut').value == 'NewOrder') {
                    showCrystalAddDiv();
                    if (getCrysDivByKey == 'true') {
                        getMoreCrystalDiv(getCrystalDiv + 1, '');//func param changed @Author:PRIYA01OCT13
                    }
                }
            }
        }


        /*****************************************************************************/
        /*************End code for crystal @Author:PRIYA24SEP13*********************/
        /*****************************************************************************/
        /**********Start to add code to transfer girvi nd additional principal in ml loan @AUTHOR: SANDY19DEC13***********/
        if (e.which == '80' && isALT == 'T') {
            isALT = 'F';
            if ('cancelable' in event) {    // all browsers except IE before version 9
                if (event.cancelable) {
                    event.preventDefault();
                }
            } else {
                event.returnValue = false;
                event.keyCode = 0;
            }
            /****Add condition to check initial field is filled or not @AUTHOR: SANDY06JAN14****/
            if (document.getElementById('mlLoanNo' + loanNo).value != '') {
                getMoreLoanTrDiv(loanNo);//change in function @AUTHOR: SANDY20DEC13
            } else {
                document.getElementById('mlLoanNo' + loanNo).focus();
            }
            /****Add condition to check initial field is filled or not @AUTHOR: SANDY06JAN14****/
        }
        if (e.which == '65' && isALT == 'T') {
            isALT = 'F';
            if ('cancelable' in event) {    // all browsers except IE before version 9
                if (event.cancelable) {
                    event.preventDefault();
                }
            } else {
                event.returnValue = false;
                event.keyCode = 0;
            }

            /****Add condition to check initial field is filled or not @AUTHOR: SANDY06JAN14****/
            if (document.getElementById('principalId' + prinNoToTransfer).value != '') {
                getMorePrinToTrDiv(prinNoToTransfer);//change in function @AUTHOR: SANDY20DEC13
            } else {
                document.getElementById('principalId' + prinNoToTransfer).focus();
            }
            /****Add condition to check initial field is filled or not @AUTHOR: SANDY06JAN14****/

        }
        /**********End to add code to transfer girvi nd additional principal in ml loan @AUTHOR: SANDY19DEC13***********/
        /*****************************************************************************/
        /*************Start code for crystal for alt + x @Author:PRIYA29NOV13*********************/
        /*****************************************************************************/
        if (e.which == 120 && isALT == 'T' || (e.which == 88 && isALT == 'T')) {
            isALT = 'F';
            if ('cancelable' in event) {    // all browsers except IE before version 9
                if (event.cancelable) {
                    event.preventDefault();
                }
            } else {
                event.returnValue = false;
                event.keyCode = 0;
            }
            if (document.getElementById('cryShorcut').value == 'StockPanel') {
                closeMoreCrystalDiv(getCrystalDiv, document.getElementById('cryShorcut').value)
            }
        }
        /*****************************************************************************/
        /*************End code for crystal @Author:PRIYA29NOV13*********************/
        /*****************************************************************************/
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
            } else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser

            if (gbCLTFormFun != 'TRUE') {
                if (window[gbCLTFormFun]()) { //this is to check validation functions 
                    document.getElementById(gbCLTFormName).submit();
                }
            } else {
                if (typeof (document.getElementById(gbCLTFormName)) != 'undefined' &&
                        (document.getElementById(gbCLTFormName) != null)) {
                    document.getElementById(gbCLTFormName).submit();
                }
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
                } else {  // IE before version 9
                    event.returnValue = false;
                    event.keyCode = 0;
                }
                //End Code to disable the Function Keys for Browser
                /***********Start code to add panel @Author:PRIYA23AUG14************/
                if (document.getElementById('globalPlusKeyId').value == 'SuppPurPanel') {
                    addSuppSimItemsValue('');
                } else if (gbCLTFormFun != 'TRUE') {
                    document.getElementById('panelSimilarDiv').value = 'SimilarItem';//added @Author:PRIYA18DEC14
                    if (window[gbCLTFormFun]()) {
                        // document.getElementById('panelSimilarDiv').value = 'SimilarItem';//commented @Author:PRIYA18DEC14
                        document.getElementById(gbCLTFormName).submit();
                    }
                }
                /***********End code to add panel @Author:PRIYA23AUG14************/
            }
        }
        //*****End Code To Add Ctrl-Enter Func @Author:PRIYA24AUG13**********
        //*********************************************************************
        //*********************************************************************

        if (e.which == 112 && isALT == 'T') { // Alt + F1 Key   -  For Add New Customer
            isALT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            } else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                    //document.getElementById("custFirstNameForAddGirvi").focus();
                } else {
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
            } else {  // IE before version 9
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
        /**********Start code to add alt i code for supp panel @Author:PRIYA06AUG14************/

        if (e.which == 68 && isALT == 'T') {
            isALT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            } else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            addSuppPurItemDetails('', '', '', '', '', '');
        }
        if (e.which == 73 && isALT == 'T') {
            isALT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            } else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            getMoreSuppItemDiv('', '');
        }
        /**********End code to add alt i code for supp panel @Author:PRIYA06AUG14************/
        if (e.which == 115 && isALT == 'T') { // ALT + F4 Key   -   For Add New Girvi
            isALT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            } else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                    //document.getElementById("custFirstNameForAddGirvi").focus();
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }

            };
            xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=StaffList", true);
            xmlhttp.send();
        }
        //amol
        if (e.which == 114 && isALT == 'T') { // ALT + F3 Key   -  For LOAN / GIRVI CALCULATOR  Panel
            isALT = 'F';
            //Start Code to disable the Function Keys for Browser
            if ('cancelable' in event) {    // all browsers except IE before version 9
                // in Firefox, the cancelable property always returns true,
                // so the cancelable state of the event cannot be determined
                if (event.cancelable) {
                    event.preventDefault();
                }
            } else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
//            loadXMLDoc();
//            xmlhttp.onreadystatechange = function() {
//                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
//                    //document.getElementById("custFirstNameForAddGirvi").focus();
//                }
//                else {
//                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//                }
//
//            };
//            xmlhttp.open("POST", "include/php/olgccald.php", true);
//            xmlhttp.send();
            window.open('include/php/olgccald.php',
                    'popup', 'width=550,height=350,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no');
            return false;
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
            } else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                    //document.getElementById("custFirstNameForAddGirvi").focus();
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }

            };
            xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=GirviPanel", true);
            xmlhttp.send();
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
            } else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                    //document.getElementById("custFirstNameForAddGirvi").focus();
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }

            };
            xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=UdhaarPanel", true);
            xmlhttp.send();
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
            } else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                    //document.getElementById("custFirstNameForAddGirvi").focus();
                } else {
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
            } else {  // IE before version 9
                event.returnValue = false;
                event.keyCode = 0;
            }
            //End Code to disable the Function Keys for Browser
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                    //document.getElementById("custFirstNameForAddGirvi").focus();
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }

            };
            xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=Analysis", true);
            xmlhttp.send();
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
        } else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            } else {
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
        } else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            } else {
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
        } else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }

        //End Code to disable the Function Keys for Browser
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                //document.getElementById("custFirstNameForAddGirvi").focus();
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=AccountList", true);
        xmlhttp.send();
    }
    /************Start to add code to make payment after alt+p+enter @AUTHOR: SANDY4OCT13**********/
    if (keyCode == '80' && isALT == 'T') {
        if ('cancelable' in event) {    // all browsers except IE before version 9
            // in Firefox, the cancelable property always returns true,
            // so the cancelable state of the event cannot be determined
            if (event.cancelable) {
                event.preventDefault();
            }
        } else {  // IE before version 9
            event.returnValue = false;
            event.keyCode = 0;
        }
        document.getElementById('addStockPaymentButt').focus();
    }
    /************End to add code to make payment after alt+p+enter @AUTHOR: SANDY4OCT13**********/

//START CODE TO ADD IF FOR DELETE ALL PERSONAL FIRMS @AUTHOR:MADHURI17SEP19
    if (keyCode == '46' && isALT == 'T') {
        var firmIds = "";
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                firmIds = xmlhttp.responseText;
                delKeyFun(firmIds);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omdelallfirm.php", true);
        xmlhttp.send();
    }
//END CODE TO ADD IF FOR DELETE ALL PERSONAL FIRMS @AUTHOR:MADHURI17SEP19
//    START CODE FOR QUICK SELL SHORTCUT @AUTHOR : DARSHANA 21 MAY 2021 
//     if (keyCode == '81' && isALT == 'F') { // alt + q for quick sell 
//        //Start Code to disable the Function Keys for Browser
////        alert(keyCode);
//        if ('cancelable' in event) {    // all browsers except IE before version 9
//            // in Firefox, the cancelable property always returns true,
//            // so the cancelable state of the event cannot be determined
//            if (event.cancelable) {
//                event.preventDefault();
//            }
//        }
//        else {  // IE before version 9
//            event.returnValue = false;
//            event.keyCode = 0;
//        }
//
//        //End Code to disable the Function Keys for Browser
//        loadXMLDoc();
//        xmlhttp.onreadystatechange = function () {
//            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
//                //document.getElementById("custFirstNameForAddGirvi").focus();
//            }
//            else {
//                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//            }
//        };
//        xmlhttp.open("POST", "include/php/orquickproduct.php?panelName=quickSell", true);
//        xmlhttp.send();
//    }
    if (keyCode == '67' && event.altKey) {
        isALT = 'F';
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omppmmdv.php?divMainMiddlePanel=AccountList&navPanelName=allAccountUpdate", true);
        xmlhttp.send();
    }
    //
    if (keyCode == '107' && isALT == 'T') {
        isALT = 'F';
        if (typeof (document.getElementById('totAccountCounter')) != 'undefined' &&
                (document.getElementById('totAccountCounter') != null)) {
            addAccUpdateDiv(document.getElementById('totAccountCounter').value);
            return false;
        }
    }
    //
    //alert(keyCode);
    //alert(isCLT);
    //
    if (keyCode == '13' && isCLT == 'T') {
        isCLT = 'F';
        if (typeof (document.getElementById('totAccountCounter')) != 'undefined' &&
                (document.getElementById('totAccountCounter') != null)) {
            document.getElementById('add_accounts').submit();
        }
    }
    
//START CODE FOR QUICK SELL SHORTCUT @AUTHOR : YUVRAJ 03 10 2022 
// *****************************************************************************//
        if (keyCode == '81' && isALT == 'T') {
        isALT = 'F';
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            var url ="include/php/omquickproduct.php?panelName=quickSell";
            window.open(url, '_blank');
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omquickproduct.php?panelName=quickSell", true);
        xmlhttp.send();
    }
// END CODE FOR QUICK SELL SHORTCUT @AUTHOR : YUVRAJ 03 10 2022 
// *****************************************************************************//
}
//START  CODE AND CREATE FUNCTION FOR QUICK SELL SHORTCUT @AUTHOR : YUVRAJ 06102022
function shortCutKeyFunQuickSell(event) {
    var documentRoot = document.getElementById('documentRoot').value;
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
    var qty_increment = '1';
      var poststrs = "ms_itm_id=" + ms_itm_id
            + "&ms_itm_mrp=" + ms_itm_mrp
            + "&qty_indicator=" + qty_increment
            + "&ms_itm_min_qty=" + ms_itm_min_qty
            + "&user_id=" + user_id
            + "&user_fname=" + user_fname
            + "&user_lname=" + user_lname
            + "&user_mobile=" + user_mobile
            + "&panelName=" + panel_name
            + "&firm_id=" + firmId;
    //
    keyCode = event.keyCode;
    document.onkeydown = function (e) {
        if (e.which == 18) {
            isALT = 'T';
        }
    }
    //
    if (keyCode == '61' && isALT == 'T') {
    //        alert('in function');
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
                document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
                document.getElementById('InputWsPriceInput').value = '0' ;
                document.getElementById('plusButton').focus();
                
            } else {
                document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?" + poststrs, true);
        xmlhttp.send();
    }
   
    // START MINUS PRODUCT CLICK BUTTON QUICKSELL 
    if (keyCode == '173' && isALT == 'T') {
//            alert('in function');
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
                document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
                document.getElementById('InputWsPriceInput').value = '0' ;
                document.getElementById('minusButton').focus();
                
            } else {
                document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?" + poststrs, true);
        xmlhttp.send();
    }
    // END MINUS PRODUCT CLICK BUTTON QUICKSELL 
    //
    // START CUSTOMER INPUT FOCUS CLICK BUTTON QUICKSELL 
    if (keyCode == '67' && isALT == 'T') {
//            alert('in function');
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
                document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
                document.getElementById('InputWsPriceInput').value = '0' ;
                document.getElementById('custFirstNameForAddGirvi').focus();
            } else {
                document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?" + poststrs, true);
        xmlhttp.send();
    }
    // END CUSTOMER INPUT FOCUS CLICK BUTTON QUICKSELL 
    //
// START SEARCH PRODUCT FOCUSCLICK BUTTON QUICKSELL 
    if (keyCode == '80' && isALT == 'T') {
//            alert('in function');
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "hidden";
                document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
                document.getElementById('InputWsPriceInput').value = '0' ;
                document.getElementById('search').focus();
            } else {
                document.getElementById("main_ajax_loading_div_quicksell").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?" + poststrs, true);
        xmlhttp.send();
    }
    // END SEARCH PRODUCT FOCUS CLICK BUTTON QUICKSELL 
    isALT = 'F';
    //
}

//END CODE AND CREATE FUNCTION FOR QUICK SELL SHORTCUT @AUTHOR : YUVRAJ 06102022