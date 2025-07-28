/* global unchecked, xmlhttp */
//
function openCloseAmountReceived(){

    let eyeCloseOpen = document.getElementById('eye-amount-received');
    let car = document.getElementById('chart-amount-received');
    
    if(eyeCloseOpen.classList.contains('fa-eye')){
        eyeCloseOpen.classList.remove('fa-eye');
        eyeCloseOpen.classList.add('fa-eye-slash');
        car.setAttribute('class', 'blur');
    }else{
        eyeCloseOpen.classList.remove('fa-eye-slash');
        eyeCloseOpen.classList.add('fa-eye');
        car.setAttribute('class', 'null');
    }
}

function openCloseGstAmount(){

    let eyeCloseOpen = document.getElementById('eye-gst-amount');
    let gchead = document.getElementById('gst-content-head');
    let gcdata = document.getElementById('gst-content-data');
    
    if(eyeCloseOpen.classList.contains('fa-eye')){
        eyeCloseOpen.classList.remove('fa-eye');
        eyeCloseOpen.classList.add('fa-eye-slash');
        gchead.setAttribute('class', 'blur');
        gcdata.setAttribute('class', 'blur');
    }else{
        eyeCloseOpen.classList.remove('fa-eye-slash');
        eyeCloseOpen.classList.add('fa-eye');
        gchead.setAttribute('class', 'null');
        gcdata.setAttribute('class', 'null');
    }
}

function openClosePayReceived(){

    let eyeCloseOpen = document.getElementById('eye-pay-received');
    let prdate = document.getElementById('pay-received-date');
    let prdata = document.getElementById('pay-received-data');
    
    if(eyeCloseOpen.classList.contains('fa-eye')){
        eyeCloseOpen.classList.remove('fa-eye');
        eyeCloseOpen.classList.add('fa-eye-slash');
        prdate.setAttribute('class', 'blur');
        prdata.setAttribute('class', 'blur');
    }else{
        eyeCloseOpen.classList.remove('fa-eye-slash');
        eyeCloseOpen.classList.add('fa-eye');
        prdate.setAttribute('class', 'null');
        prdata.setAttribute('class', 'null');
    }
}

function openCloseTotalSales(){

    let eyeCloseOpen = document.getElementById('eye-total-sales');
    let cts = document.getElementById('chart-total-sales');
    
    if(eyeCloseOpen.classList.contains('fa-eye')){
        eyeCloseOpen.classList.remove('fa-eye');
        eyeCloseOpen.classList.add('fa-eye-slash');
        cts.setAttribute('class', 'blur');
    }else{
        eyeCloseOpen.classList.remove('fa-eye-slash');
        eyeCloseOpen.classList.add('fa-eye');
        cts.setAttribute('class', 'null');
    }
}

function openCloseTotalPurchases(){

    let eyeCloseOpen = document.getElementById('eye-total-purchases');
    let ctp = document.getElementById('chart-total-purchases');
    
    if(eyeCloseOpen.classList.contains('fa-eye')){
        eyeCloseOpen.classList.remove('fa-eye');
        eyeCloseOpen.classList.add('fa-eye-slash');
        ctp.setAttribute('class', 'blur');
    }else{
        eyeCloseOpen.classList.remove('fa-eye-slash');
        eyeCloseOpen.classList.add('fa-eye');
        ctp.setAttribute('class', 'null');
    }
}

function openCloseStockAnalysis(){

    let eyeCloseOpen = document.getElementById('eye-stock-analysis');
    let sa = document.getElementById('chart-stock-analysis');
    
    if(eyeCloseOpen.classList.contains('fa-eye')){
        eyeCloseOpen.classList.remove('fa-eye');
        eyeCloseOpen.classList.add('fa-eye-slash');
        sa.setAttribute('class', 'blur');
    }else{
        eyeCloseOpen.classList.remove('fa-eye-slash');
        eyeCloseOpen.classList.add('fa-eye');
        sa.setAttribute('class', 'null');
    }
}

function loadCanvas() {
    var wrapper = document.getElementById("signature-pad"),
            clearButton = wrapper.querySelector("[data-action=clear]"),
            saveButton = wrapper.querySelector("[data-action=save]"),
            canvas = wrapper.querySelector("canvas"),
            signaturePad;
// Adjust canvas coordinate space taking into account pixel ratio,
// to make it look crisp on mobile devices.
// This also causes canvas to be cleared.
    function resizeCanvas() {
        // When zoomed out to less than 100%, for some very strange reason,
        // some browsers report devicePixelRatio as less than 1
        // and only part of the canvas is cleared then.
        var ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }

    window.onresize = resizeCanvas;
    resizeCanvas();

    signaturePad = new SignaturePad(canvas);

    clearButton.addEventListener("click", function (event) {
        signaturePad.clear();
    });

    saveButton.addEventListener("click", function (event) {

        if (signaturePad.isEmpty()) {
            alert("Please provide signature first.");
        } else {
            signaturePad.toDataURL();
        }
    });
}
//************************************************************************************************
//START CODE FOR QUICK SELL FUNCTIONS : AUTHOR @ DARSHANA 13 MAY 2021
//***************************************************************************************************
//************************** START LOGOUT FUNCTION YUVRAJ 7 7 2022 *********************** 
function quicksellLogoutprocess(attend_id) { 
        var documentRoot = document.getElementById('documentRoot').value;
//        alert(documentRoot);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (true) { // loginconfirm == 
                systemLogoutquicksell();
            } else {
                window.location.reload();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omLogoutProcess" + default_theme + ".php?attend_id=" + attend_id, true);
    xmlhttp.send();
}

function systemLogoutquicksell() {
     var documentRoot = document.getElementById('documentRoot').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("logoutMessageDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/owner/omollgout" + default_theme + ".php", true);
    xmlhttp.send();
}

//************************** END LOGOUT FUNCTION YUVRAJ 7 7 2022 *********************** 
function searchProduct(str, user_id, user_fname, user_lname, user_mobile, panelName) {
    var documentRoot = document.getElementById('documentRoot').value; // @ Edit work On @ YUVRAJ 01 JULY 2022
    var firmId = document.getElementById('firmId').value; // @ Edit work On @ YUVRAJ 01 JULY 2022
    loadXMLDoc();
    if (str.length == 0) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border = "0px";
        return;
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
            document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('searchProduct').focus();
                document.getElementById('searchProduct').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omsearchglobal" + default_theme + ".php?str=" + str + "&user_id=" + user_id + "&user_fname=" + user_fname + "&user_lname=" + user_lname + "&user_mobile=" + user_mobile + "&panelName=" + panelName + "&firmId=" + firmId, true);
    xmlhttp.send();
}
function searchCustomer(str_user_name, product_id, product_name, product_category, product_barcode, product_hsn_no, product_price, panel_name) {
    var documentRoot = document.getElementById('documentRoot').value;
//    alert("str_user_name=" + str_user_name + "&product_id=" + product_id + "&product_name=" + product_name + "&product_category=" + product_category + "&product_barcode=" + product_barcode + "&product_hsn_no=" + product_hsn_no + "&product_price=" + product_price + "&panel_name=" + panel_name);
    loadXMLDoc();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("livesearch_customer").innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('custNameForAddNew').focus();
                document.getElementById('custNameForAddNew').options[0].selected = true;
            }
        } else {
//             document.getElementById('custNameForAddNew').focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omsearchcustomer" + default_theme + ".php?str_user_name=" + str_user_name + "&product_id=" + product_id + "&product_name=" + product_name + "&product_category=" + product_category + "&product_barcode=" + product_barcode + "&product_hsn_no=" + product_hsn_no + "&product_price=" + product_price + "&panel_name=" + panel_name, true);
    xmlhttp.send();
}
function searchCustomerMobileNo(str_user_mobile, product_id, product_name, product_category, product_barcode, product_hsn_no, product_price, panel_name) {
    var documentRoot = document.getElementById('documentRoot').value;
//       alert();
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
       if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("livesearch_customer_mobile").innerHTML = xmlhttp.responseText;
                document.getElementById("livesearch_customer_mobile").style.border = "1px solid #A5ACB2";
                if (keyCode == 40 || keyCode == 38) {
                    document.getElementById('custNameForAddNew').focus();
                    document.getElementById('custNameForAddNew').options[0].selected = true;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omsearchcustomerMobile" + default_theme + ".php?str_user_mobile=" + str_user_mobile, true);
    xmlhttp.send();
}
//
function getSearchProductValue(product_id, product_name, product_category, product_barcode, product_hsn_no, product_price, user_id, user_fname, user_lname, user_mobile, panel_name) {
    var documentRoot = document.getElementById('documentRoot').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            document.getElementById('custFirstNameForAddGirvi').value = user_fname.charAt(0).toUpperCase() + user_fname.slice(1);
            // start code display user name and mobile number show author@sarvesh 07JUN2022
            document.getElementById('mobileNoToAddGirvi').value = user_mobile;
            document.getElementById("search").value = product_name;
            // end code display user name and mobile number show author@sarvesh 07JUN2022
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?product_id=" + product_id + "&product_name=" + product_name + "&product_category=" + product_category + "&product_barcode=" + product_barcode + "&product_hsn_no=" + product_hsn_no + "&product_price=" + product_price + "&user_id=" + user_id + "&user_fname=" + user_fname + "&user_lname=" + user_lname + "&user_mobile=" + user_mobile + "&panel_name=" + panel_name, true);
    xmlhttp.send();
}
function getProductDetails(product_id, product_name, product_price) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omquickproduct" + default_theme + ".php?product_id=" + product_id + "&product_name=" + product_name + "&product_price=" + product_price, true);
    xmlhttp.send();
}
function getUserDetails(user_id, user_fname, user_lname, user_mobile, product_id, product_name, product_category, product_barcode, product_hsn_no, product_price, panel_name) {
    var documentRoot = document.getElementById('documentRoot').value;
    var checkboxws = document.getElementById('checkboxws').checked;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
//            document.getElementById('custFirstNameForAddGirvi').value = user_fname.charAt(0).toUpperCase() + user_fname.slice(1);
            document.getElementById('custFirstNameForAddGirvi').value = user_fname.trim() +' ' + user_lname.trim();
            document.getElementById('mobileNoToAddGirvi').value = user_mobile;
            document.getElementById('mobileNoToAddGirvi').focus();
            document.getElementById('search').focus();
            document.getElementById('search').value = '';
               if (checkboxws === true || checkboxws === 'true') { 
            document.getElementById('checkboxws').checked = true;
        } else {
            document.getElementById('checkboxws').checked = false;
        }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?user_id=" + user_id + "&user_fname=" + user_fname + "&user_lname=" + user_lname + "&user_mobile=" + user_mobile + "&product_id=" + product_id + "&product_name=" + product_name + "&product_category=" + product_category + "&product_barcode=" + product_barcode + "&product_hsn_no=" + product_hsn_no + "&product_price=" + product_price + "&panel_name=" + panel_name, true);
//    xmlhttp.open("POST", "include/php/omquickProduct"+ default_theme +".php?user_id=" + user_id + "&user_fname=" + user_fname + "&user_lname=" + user_lname+ "&user_mobile=" +user_mobile, true);
    xmlhttp.send();
}
function getAddUserDetail() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //Add user and Set that user to User fname to custFirstNameForAddGirvi and redirect @Mangesh
            var UserDetails = xmlhttp.responseText;
            var UserArray = UserDetails.split('#');
            document.getElementById("user_id").value = UserArray[0];
            document.getElementById("user_fname").value = UserArray[1];
            document.getElementById('custFirstNameForAddGirvi').value = UserArray[1];
            document.getElementById('custFirstNameForAddGirvi').focus();
            //
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omgetquiaddcust" + default_theme + ".php", true);
    xmlhttp.send();
}
//
function sendProductDetails(sttr_id, qty_indicator, sttr_quantity) {
    var documentRoot = document.getElementById('documentRoot').value;
//    var sttr_id = document.getElementById('sttr_id').value;
//    alert(sttr_id);
    var user_id = document.getElementById('user_id').value;
    var user_fname = document.getElementById('user_fname').value;
    var user_lname = document.getElementById('user_lname').value;
    var user_mobile = document.getElementById('user_mobile').value;
    var panelName = document.getElementById('panel_name').value;
    var firmId = document.getElementById('firmId').value;
    //To Restrict the delete quantity from sell entry @Mangesh
    if (sttr_quantity <= 1) {
        alert('Cannot Less Quantity anymore !');
    }
//Open AddUserModal when user_id is not getting quick sell @Mangesh
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
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            document.getElementById('custFirstNameForAddGirvi').value = user_fname;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omAdQuickSell" + default_theme + ".php?" + poststr, true);
    xmlhttp.send();
}
//To Set CASH User When Quick sell modal Default Cash User Button get Clicked @Mangesh 8 Mar 2022
function setDefaultCashUser() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            var cashUserDetails = xmlhttp.responseText;
            var UserArray = cashUserDetails.split('#');
            if (UserArray[1] == null || UserArray[1] == '') {
                alert('Please Add New CASH User to set as Default');
                document.getElementById('custFirstNameForAddGirvi').value = "CASH";
                return false;
            }
            document.getElementById("user_id").value = UserArray[0];
            document.getElementById("user_fname").value = UserArray[1];
            document.getElementById('custFirstNameForAddGirvi').value = UserArray[1];
            document.getElementById('custFirstNameForAddGirvi').focus();
            refreshData();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omQuickSetDefaultCashUser" + default_theme + ".php", true);
    xmlhttp.send();
}
// FUNCTION FOR REFRESH DATA
function refreshData() {
    var documentRoot = document.getElementById('documentRoot').value;
    var sttr_item_category = document.getElementById('sttr_item_category').value;
    var sttr_item_name = document.getElementById('sttr_item_name').value;
    var sttr_image_id = document.getElementById('sttr_image_id').value;
    var sttr_final_valuation = document.getElementById('sttr_final_valuation').value;
    var sttr_id = document.getElementById('sttr_id').value;
    var user_id = document.getElementById('user_id').value;
    var user_fname = document.getElementById('user_fname').value;
    var user_lname = document.getElementById('user_lname').value;
    var user_mobile = document.getElementById('user_mobile').value;
    var panel_name = document.getElementById('panel_name').value;
    var poststr = "sttr_id=" + sttr_id
            + "&sttr_item_category=" + sttr_item_category
            + "&sttr_item_name=" + sttr_item_name
            + "&sttr_image_id=" + sttr_image_id
            + "&sttr_final_valuation=" + sttr_final_valuation
            + "&user_id=" + user_id
            + "&user_fname=" + user_fname
            + "&user_lname=" + user_lname
            + "&user_mobile=" + user_mobile
            + "&panel_name=" + panel_name;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
//      var paymentMsg = 'Payment Done Sucessfully';
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            document.getElementById('custFirstNameForAddGirvi').value = user_fname.charAt(0).toUpperCase() + user_fname.slice(1);
            document.getElementById('mobileNoToAddGirvi').value = user_mobile;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omquickproduct" + default_theme + ".php?" + poststr, true);
    xmlhttp.send();
}
//FUNCTION FOR SEND DETAILS ON PAYMENT PANEL 
function sendDetailsPayment(finalvaluation, userid, firm_id, panelName) {
//    alert('firm_id==='+firm_id);
    var sttr_pre_invoice_no_1 = document.getElementById('sttr_pre_invoice_no_1').value;
    var sttr_invoice_no_1 = document.getElementById('sttr_invoice_no_1').value;
    var sttr_id = document.getElementById('slPrId').value;
    var CgstPer = document.getElementById('CgstPer').value;
    var SgstPer = document.getElementById('SgstPer').value;
    var IgstPer = document.getElementById('IgstPer').value;
    var TaxPer = document.getElementById('TaxPer').value;

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("payment").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omquicksellpaypopup" + default_theme + ".php?finalvaluation=" + finalvaluation + "&userid=" + userid + "&firm_id=" + firm_id + "&sttr_pre_invoice_no_1=" + sttr_pre_invoice_no_1 + "&sttr_invoice_no_1=" + sttr_invoice_no_1 +
            "&panelName=" + panelName + "&sttr_id=" + sttr_id + "&CgstPer=" + CgstPer + "&SgstPer=" + SgstPer + "&IgstPer=" + IgstPer + "&TaxPer=" + TaxPer, true);
    xmlhttp.send();
}
//
function hidepaymentdiv() {
    var hide = document.getElementById('payment');
    if (hide.style.display === "none") {
        hide.style.display = "block";
    } else {
        hide.style.display = "none";
    }
}
//FUNCTION FOR DELETE PRODUCT FROM BILL
function deleteProductPay(user_id, sttr_id) {
    var documentRoot = document.getElementById('documentRoot').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRoot + "/include/php/omdelpyprod" + default_theme + ".php?user_id=" + user_id + "&sttr_id=" + sttr_id, true);
    xmlhttp.send();
}
//FUNCTION FOR DISPLAY GST INPUT BOX ON CHECK 
function gstdisplayInput() {
    var taxgst = document.getElementById('taxgst').value;
    if (taxgst == 'GST') {
        var cgst = document.getElementById('cgst').value;
        var cgst_input = document.getElementById('cgst_input');
        var cgst_amt = document.getElementById('cgst_amt');
        var sgst_amt = document.getElementById('sgst_amt');
        var sgst_input = document.getElementById('sgst_input');
        var igst = document.getElementById('igst').value;
        var igst_input = document.getElementById('igst_input');
        var igst_amt = document.getElementById('igst_amt');

        if (cgst == 'checked') {
            cgst_input.style.display = "block";
            cgst_amt.style.display = "block";
            sgst_input.style.display = "block";
            sgst_amt.style.display = "block";
        } else {
            cgst_input.style.display = "none";
            cgst_amt.style.display = "none";
            sgst_input.style.display = "none";
            sgst_amt.style.display = "none";
        }

        if (igst == 'checked') {
            igst_input.style.display = "block";
            igst_amt.style.display = "block";
        } else {
            igst_input.style.display = "none";
            igst_amt.style.display = "none";
        }
    }

    if (taxgst == 'TAX') {
        var tax_vat = document.getElementById('tax_vat').value;
        var tax_input = document.getElementById('tax_input');
        var tax_amt = document.getElementById('tax_amt');
        //
        if (tax_vat == 'checked') {
//            alert('tax' + tax_vat);
            tax_input.style.display = "block";
            tax_amt.style.display = "block";
        } else {
            tax_input.style.display = "none";
            tax_amt.style.display = "none";
        }
    }
}
//FUNCTION FOR PAYMENT PANEL CALCULATION
function getPayCal() {
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
        
        if (roundOff(balance) > 0) {
            roundOffAmt = roundOff(balance);
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

        if (roundOff(balance) > 0) {
            roundOffAmt = roundOff(balance);
            var rndOffAmt = (1 - roundOffAmt);
            document.getElementById('balance_amt').innerHTML = balance.toFixed(2);
        } else {
            document.getElementById('balance_amt').innerHTML = balance.toFixed(2);
        }
    }
}
//function taxByValCal() {
//    var tax_by_val = document.getElementById('tax_by_val').value;
//    alert('hi');
//    }

//FUNCTION FOR SEND PAYMENT DETAILS FOR FINAL PAYMENT PANEL
function sendPaymentRequest() {
    //
    var user_id = document.getElementById('user_id').value;
    var final_amt = document.getElementById('final_amt').value;
    var firm_id = document.getElementById('firm_id').value;
    var balance = document.getElementById('balance_amt').innerHTML;
    var total = document.getElementById('total').value;
    var cgst = document.getElementById('cgst').value;
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
    var panelName = document.getElementById('panelName').value;
    var poststr = "user_id=" + user_id
            + "&final_amt=" + final_amt
            + "&firm_id=" + firm_id
            + "&balance=" + balance
            + "&total=" + total
            + "&cgst=" + cgst
            + "&sgst=" + cgst
            + "&igst=" + igst
//            + "&tax_vat=" + tax_vat
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
//    alert('poststr===' + poststr);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("payment_req").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omAdQuickSell2" + default_theme + ".php?" + poststr, true);
    xmlhttp.send();
}
function updateCustomerQuick(custId) {
//    alert(custId);
    var custFirstNameForAddGirvi = document.getElementById('custFirstNameForAddGirvi').value;
    var mobileNoToAddGirvi = document.getElementById('mobileNoToAddGirvi').value;

    var poststr = "custId=" + custId
            + "&custFirstNameForAddGirvi=" + custFirstNameForAddGirvi
            + "&mobileNoToAddGirvi=" + mobileNoToAddGirvi;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("updateCustomer").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omsearchcustomer" + default_theme + ".php?" + poststr, true);

    xmlhttp.send();
}
function autofocus(id) {
    id.focus();
}
function productBlank(div) {
    document.getElementById(div).innerHTML = '';
}
function calDiscountByPer() {
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
    getPayCal();
    return total_discount;
}
function calDiscountByAmt() {
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

    getPayCal();

    return discPer;
}
//************************************************************************************************
//END CODE FOR QUICK SELL FUNCTIONS : AUTHOR @ DARSHANA 13 MAY 2021
//***************************************************************************************************
//
// default_theme parameter is appeneded in the .php file by CHETAN 06MAY2022
//
function OpenCustomerSignature(custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
             document.getElementById('signatureModel').style.display = 'block';
            document.getElementById('signatureModel').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    data = 'custId='+custId;
    xmlhttp.open("POST", "include/php/omsignupdate" + default_theme + ".php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(data);
}
