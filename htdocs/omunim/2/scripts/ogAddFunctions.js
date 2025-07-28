//START CODE TO ADD Supplier Invoice @AUTHOR:PRIYA19JAN13
/***********Start code to add ids @Author:PRIYA04OCT13*********/
/***********Start code to change function @Author:PRIYA15OCT13*********/
/***********Start code to add div @Author:PRIYA19JAN14*****************/
/*********Start Code To add panel @Author:SANT14OCT16************/
var payPanelName;
function validateAddNewSuppInvoice(payPanelName) {
    var prefix = '';
    if (payPanelName == 'StockPayment' || payPanelName == 'StockPayUp') {
        prefix = 'stock';
    } else if (payPanelName == 'SlPrPayment' || payPanelName == 'SellPayUp') {
        prefix = 'slPr';
    } else if (payPanelName == 'RawPayment' || payPanelName == 'RawPayUp') {
        prefix = 'rwPr';
    } else if (payPanelName == 'NwOrPayment' || payPanelName == 'NwOrPayUp') {
        prefix = 'nwOr';
    }
    if (validateEmptyField(document.getElementById(prefix + "PayTotAmtBal").value, "Please enter value in Total Amount Balance Field!") == false) {
        document.getElementById(prefix + "PayTotAmtBal").focus();
        return false;
    } else {
        if (payPanelName == 'UdhaarPayment') {
            var depositAmt = parseFloat(parseInt(document.getElementById(prefix + "PayCashAmtRec").value) +
                    parseInt(document.getElementById(prefix + "PayChequeAmt").value) +
                    parseFloat(parseFloat(document.getElementById(prefix + "PayCardAmt").value) + parseFloat(document.getElementById(prefix + "PayTransChrgAmt").value)) +
                    parseFloat(parseFloat(document.getElementById(prefix + "PayOnlinePaymentAmt").value) - parseFloat(document.getElementById(prefix + "PayCommPayAmt").value)) +
                    parseInt(document.getElementById(prefix + "PayDiscount").value));
            var udhaarLeftAmt = parseInt(document.getElementById(prefix + "PayTotAmt").value);

            if (depositAmt > udhaarLeftAmt) {
                alert("Deposit amount(" + depositAmt + ") should not more than udhaar amount(" + udhaarLeftAmt + ")!");
                document.getElementById(prefix + "PayCashAmtRec").focus();
                return false;
            }
        } else {
            if (validateSelectField(document.getElementById(prefix + "FirmId").value, "Please select firm!") == false) {
                document.getElementById(prefix + "FirmId").focus();
                return false;
            }
        }
    }
    if (payPanelName == 'SuppOrderDelivery' || payPanelName == 'suppPendingOrderUp' || payPanelName == 'SuppPaymentPanel') {
        crystalEntered = 0;
        for (var dc = 1; dc <= getCrystalDiv; dc++) {
            // if(document.getElementById(prefix + "PayCryId" + dc).value != ""){
            if ((document.getElementById("suppPaydel" + dc).value != 'Deleted')) {
                if (validateEmptyField(document.getElementById(prefix + "PayCryId" + dc).value, "Please select Crystal Id" + dc + "!") == false) {
                    document.getElementById(prefix + "PayCryId" + dc).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById(prefix + "PayCryQty" + dc).value, "Please select Crystal Qty" + dc + "!") == false) {
                    document.getElementById(prefix + "PayCryQty" + dc).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById(prefix + "PayCryRate" + dc).value, "Please select Crystal Rate!" + dc + "!") == false) {
                    document.getElementById(prefix + "PayCryRate" + dc).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById(prefix + "PayCryFinVal" + dc).value, "Please Select Crystal Final Valuation!" + dc + "!") == false) {
                    document.getElementById(prefix + "PayCryFinVal" + dc).focus();
                    return false;
                }
            }
            crystalEntered++;
            //}
        }
    }
    return true;
}
/*********End Code To add panel @Author:SANT14OCT16************/
/***********End code to add div @Author:PRIYA19JAN14*****************/
//function add_supp_invoice(url, parameters) {
//
//    loadXMLDoc();
//
//    xmlhttp.onreadystatechange = alertAddSuppInvoice;
//	
//    xmlhttp.open('POST', url, true);
//    xmlhttp.setRequestHeader('Content-Type',
//        'application/x-www-form-urlencoded');
//    xmlhttp.setRequestHeader("Content-length", parameters.length);
//    xmlhttp.setRequestHeader("Connection", "close");
//    xmlhttp.send(parameters);
//
//}
//function alertAddSuppInvoice() {
//    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        document.getElementById("suppHomeDiv").innerHTML = xmlhttp.responseText;
//    } else {
//        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//
//    }
//
//}
//START CODE TO ADD Gold and Silver Fields @AUTHOR:PRIYA12JAN13
//START CODE TO ADD Supp Inv Fields @AUTHOR:PRIYA21JAN13
/*********Start Code To Add FirmId,AccId @AUTHOR:PRIYA30MAY13******************/
/*********Start Code To change id @Author:PRIYA04OCT13******************/
/*********Start Code To add price cut @Author:PRIYA20JAN14******************/
/***Start to change function to add variables of alert msgs @AUTHOR: SANDY29JAN14**********/
/*********Start Code To add panel @Author:PRIYA04FEB14************/
/*********Start Code To add panel @Author:SANT14OCT16************/
/*********Start Code To add panel @Author:SANT30NOV16************/
function addPayment() {
    //
    //     
//    if (((document.getElementById('payPanelName').value == 'SellPayUp' || 
//          document.getElementById('payPanelName').value == 'CrySellPayUp' || 
//          document.getElementById('payPanelName').value == 'ImitationSellPayUp') && 
//          document.getElementById('noOfPayInv').value > 0)) {
//        alert('You can not update this item');
//        return false;
//    } 
    //
    //
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("paySubButtDiv").style.visibility = "hidden";
    document.getElementById("paySubPrintButtDiv").style.visibility = "hidden";
    payPanelName = document.getElementById("payPanelName").value;
    payPanelName = document.getElementById("payPanelName").value;
    if (payPanelName == 'SellPayUp' || payPanelName == 'SlPrPayment') {
        document.getElementById("paySubPrintButtDiv").style.visibility = "hidden";
    }
    transPanel = document.getElementById("transPanelName").value;
    //
    //
    //alert('PayFinAmtBalDisp == ' + document.getElementById("PayFinAmtBalDisp").value);
    //alert('transPanel == ' + transPanel);
    //alert('payPanelName == ' + payPanelName);
    //
    //
    if (transPanel == 'ADVMONEY' || transPanel == 'OnPurchase' || transPanel == 'UDHAAR' || transPanel == 'MONEY' || transPanel == 'SCHEME_PAYMENT' || transPanel == 'FINANCE_PAYMENT') {
        if (document.getElementById("PayFinAmtBalDisp").value != '0.00') {
            alert("PLEASE PAY/RECEIVE EXACT AMOUNT.");
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("paySubButtDiv").style.visibility = "visible";
            document.getElementById("paySubPrintButtDiv").style.visibility = "visible";
            return false;
        }
    }
    //
    var panDetailValidation = validateAmountForPanDetails();
    if (panDetailValidation === false || panDetailValidation === 'false') {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("paySubButtDiv").style.visibility = "visible";
        document.getElementById("paySubPrintButtDiv").style.visibility = "visible";
        return false;
    }
    //
    //
    // *********************************************************************************************************************
    // START CODE TO ADD VALIDATIONS FOR ROI / INTEREST TYPE FIELDS, IF UDHAAR INTEREST CHECK IS ON @PRIYANKA-04AUG2022 
    // *********************************************************************************************************************
    //
    var udhaarIntCheck = document.getElementById('utin_udhaar_int_chk').checked;
    var udhaarIntType = document.getElementById('utin_udhaar_int_type').value;
    var selROIValue = document.getElementById('selROIValue').value;
    //
    //alert('udhaarIntCheck == ' + udhaarIntCheck);
    //alert('udhaarIntType == ' + udhaarIntType);
    //alert('selROIValue == ' + selROIValue);
    //
    if (udhaarIntCheck == true && selROIValue <= 0) {
        alert("Please Enter ROI !");
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("paySubButtDiv").style.visibility = "visible";
        return false;
    } else if (udhaarIntCheck == true && udhaarIntType == 'NotSelected') {
        alert("Please Select Interest Type Option !");
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("paySubButtDiv").style.visibility = "visible";
        return false;
    }
    //
    // *********************************************************************************************************************
    // END CODE TO ADD VALIDATIONS FOR ROI / INTEREST TYPE FIELDS, IF UDHAAR INTEREST CHECK IS ON @PRIYANKA-04AUG2022 
    // *********************************************************************************************************************
    //
    //
    //

//        if (payPanelName == 'StockPayment' || payPanelName == 'StockPayUp' || payPanelName == 'InvoicePayUp' || payPanelName == 'SuppOrderUp' || payPanelName == 'NwOrPayUp' || payPanelName == 'SuppOrderDeliveryUp' || payPanelName == 'NwOrDelPaymentUp') {
//            var subPanel = document.getElementById("suppSubPanel").value;
//            var itemMainPanel = document.getElementById("itemMainPanel").value;
//            if (itemMainPanel == 'addByInv') {
//                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//                document.getElementById("paySubButtDiv").style.visibility = "visible";
//                if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Id!") == false) {
//                    document.getElementById("firmId").focus();
//                    return false;
//                }
//                suppItmEntered = 0;
//                for (var dc = 1; dc <= getSuppItemDiv; dc++) {
//                    if ((document.getElementById('suppItemDel' + dc).value != 'Deleted')) {
//                        if (validateEmptyField(document.getElementById("suppItemGsWt" + dc).value, "Please enter gross weight of lot" + dc + "!") == false) {
//                            document.getElementById("suppItemGsWt" + dc).focus();
//                            return false;
//                        } else if (validateEmptyField(document.getElementById("suppItemNtWt" + dc).value, "Please enter net weight of lot" + dc + "!") == false) {
//                            document.getElementById("suppItemNtWt" + dc).focus();
//                            return false;
//                        } else if (validateEmptyField(document.getElementById("suppItemFnWt" + dc).value, "Please enter fine weight of lot" + dc + "!") == false) {
//                            document.getElementById("suppItemFnWt" + dc).focus();
//                            return false;
//                        } else if (validateEmptyField(document.getElementById("suppItemFinVal" + dc).value, "Please enter final valuation of lot" + dc + "!") == false) {
//                            document.getElementById("suppItemFinVal" + dc).focus();
//                            return false;
//                        }
//                    }
//                    suppItmEntered++;
//                }
//                document.getElementById("noOfSuppItem").value = suppItmEntered;
//                // }
//                confirm_box = confirm(addAlertMess + " Do you really want to continue!");
//                if (confirm_box != true) {
//                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//                    document.getElementById("paySubButtDiv").style.visibility = "visible";
//                    return false;
//                }
//
//            }
//        }
//        if (((payPanelName == 'StockPayment' || payPanelName == 'StockPayUp') && itemMainPanel == 'addByItems')) { // panel name removed:Author:SANT24NOV16
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("paySubButtDiv").style.visibility = "visible";
//            var prefix = document.getElementById("prefix").value;
//            if (document.getElementById('payButClickId').value == 'true' && document.getElementById('noOfItemsInTable').value != 0) {
//            } else {
//                if (document.getElementById("itemSubPanel").value == 'addByItemsUp' || document.getElementById("itemSubPanel").value == 'itemsAddUp' || document.getElementById('simItemPanel').value == 'SimilarItem' ||
//                        document.getElementById("itemPanel").value == 'SuppOrderUp') {
//                    if (noOfCrystal == '' || noOfCrystal == undefined) {
//                        noOfCrystal = document.getElementById("noOfCry").value;
//                    }
//                }
//                if (validateSelectField(document.getElementById("firmId").value, "Please select Firm!") == false) {
//                    document.getElementById("firmId").focus();
//                    return false;
//                }
//                else if ((document.getElementById("addItemMetal").value != 'Other') && validateEmptyField(document.getElementById("addItemMetalRate").value, "Please enter Metal Rate!") == false) {
//                    document.getElementById("addItemMetalRate").focus();
//                    return false;
//                }
//                else if (validateEmptyField(document.getElementById("addItemId").value, "Please enter Item Id!") == false ||
//                        validateNum(document.getElementById("addItemId").value, "Accept only numeric characters without space character!") == false) {
//                    document.getElementById("addItemId").focus();
//                    return false;
//                }
//                else if (validateEmptyField(document.getElementById("addItemName").value, "Please enter Item Name!") == false) {
//                    document.getElementById("addItemName").focus();
//                    return false;
//                }
//                else if (validateEmptyField(document.getElementById("addItemPieces").value, "Please enter Item Pieces!") == false ||
//                        validateNum(document.getElementById("addItemPieces").value, "Accept only numeric characters without space!") == false) {
//                    document.getElementById("addItemPieces").focus();
//                    return false;
//                }
//                else if (validateEmptyField(document.getElementById("addItemGrossWeight").value, "Please enter Gross Weight!") == false ||
//                        validateNumWithDot(document.getElementById("addItemGrossWeight").value, "Accept only numeric characters without space!") == false) {
//                    document.getElementById("addItemGrossWeight").focus();
//                    return false;
//                } else if (document.getElementById('panelSimilarDiv').value != 'NoSimilarItem') {
//                    if (document.getElementById("addItemNetWeight").value == '') {
//                        document.getElementById("addItemNetWeight").value = document.getElementById("addItemGrossWeight").value;
////                        calItemPrice();
//                    }
//                    return true;
//                }
//                else if (document.getElementById('panelSimilarDiv').value != 'NoSimilarItem') {
//                    if (validateEmptyField(document.getElementById("addItemNetWeight").value, "Please enter Net Weight!") == false ||
//                            validateNumWithDot(document.getElementById("addItemNetWeight").value, "Accept only numeric characters without space!") == false) {
//                        document.getElementById("addItemNetWeight").focus();
//                        return false;
//                    }
//                } else if ((document.getElementById("addItemMetal").value != 'Other') && validateSelectField(document.getElementById("addItemTunch").value, "Please select Item Tunch or Purity!") == false) {
//                    document.getElementById("addItemTunch").focus();
//                    return false;
//                } else if (validateEmptyField(document.getElementById("addItemFinalVal").value, "Please enter Item Final Valuation!") == false ||
//                        validateNumWithDot(document.getElementById("addItemFinalVal").value, "Accept only numeric characters without space!") == false) {
//                    document.getElementById("addItemFinalVal").focus();
//                    return false;
//                } else if (noOfCrystal != '' && noOfCrystal != undefined && noOfCrystal != '0') {
//                    suppCryEntered = 0;
//                    for (var cry = 1; cry <= noOfCrystal; cry++) {
//                        if (document.getElementById("del" + cry).value != 'Deleted') {
//                            if (validateEmptyField(document.getElementById("addItemCryGSW" + cry).value, "Please enter Crystal Weight " + cry + "!") == false) {
//                                document.getElementById("addItemCryGSW" + cry).focus();
//                                return false;
//                            } else if (validateEmptyField(document.getElementById("addItemCryRate" + cry).value, "Please enter Crystal Rate " + cry + "!") == false) {
//                                document.getElementById("addItemCryRate" + cry).focus();
//                                return false;
//                            } else if (validateEmptyField(document.getElementById("addItemCryVal" + cry).value, "Please enter Crystal Valuation " + cry + "!") == false) {
//                                document.getElementById("addItemCryVal" + cry).focus();
//                                return false;
//                            }
//                            suppCryEntered++;
//                        }
//                    }
//                    document.getElementById("addItemCryCount").value = suppCryEntered;
//                }
//            }
//        }
    //        
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    // START CODE VALIDATE TAX OPTIONS FOR SELL PURCHASE PAYMENT ACCORDING TO LOGIN TYPE @AUTHOR:MADHUREE-20JUNE2020 //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    //
    var payFirmType = document.getElementById('payFirmType').value;
    if (payFirmType != 'Un-Registered Firm') {
        if ((payPanelName == 'SlPrPayment' && transPanel == 'SellPayment') || (payPanelName == 'StockPayment' && transPanel == 'PurchasePayment' && paymentMode.value != 'NoRateCut') || (payPanelName == 'SellPayUp') || (payPanelName == 'StockPayUp' && paymentMode.value != 'NoRateCut')) {
            var prefix = document.getElementById("prefix").value;
            var CGSTCheck = document.getElementById('CGSTCheck').checked;
            var SGSTCheck = document.getElementById('SGSTCheck').checked;
            var IGSTCheck = document.getElementById('IGSTCheck').checked;
            var CommTaxCheck = document.getElementById('CommTaxCheck').checked;
            //
            var CGSTPer = 0;
            var SGSTPer = 0;
            var IGSTPer = 0;
            var CommTaxPer = 0;
            //
            if (CGSTCheck == false) {
                CGSTPer = 0;
            } else {
                CGSTPer = document.getElementById(prefix + "CGST").value;
            }
            if (SGSTCheck == false) {
                SGSTPer = 0;
            } else {
                SGSTPer = document.getElementById(prefix + "SGST").value;
            }
            if (IGSTCheck == false) {
                IGSTPer = 0;
            } else {
                IGSTPer = document.getElementById(prefix + "IGST").value;
            }
            if (CommTaxCheck == false) {
                CommTaxPer = 0;
            } else {
                CommTaxPer = document.getElementById(prefix + "Tax").value;
            }
            //
            var sessionLoginType = document.getElementById('sessionLoginType').value;
            var currentFirmType = document.getElementById('firmPublicPrivate').value;
            //
            if (sessionLoginType == 'ownLogin') {
                if (((CGSTCheck == false || SGSTCheck == false) && IGSTCheck == false && CommTaxCheck == false) ||
                        (((CGSTPer == '' || CGSTPer == 0) || (SGSTPer == '' || SGSTPer == 0)) && (IGSTPer == '' || IGSTPer == 0) && (CommTaxPer == '' || CommTaxPer == 0))) {
                    if ((CGSTCheck == false || SGSTCheck == false) && IGSTCheck == false && CommTaxCheck == false) {
                        alert("Please Select TAX Options !");
                    } else {
                        alert("Please Enter TAX Percentage !");
                    }
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("paySubButtDiv").style.visibility = "visible";
                    document.getElementById("paySubPrintButtDiv").style.visibility = "visible";
                    return false;
                }
            } else if (sessionLoginType == 'ownILogin') {
                if ((payPanelName == 'SlPrPayment' && transPanel == 'SellPayment') || payPanelName == 'SellPayUp') {
                    var confirmStockTransfer = validateStockFirmTransfer(prefix, CGSTCheck, SGSTCheck, IGSTCheck, CommTaxCheck, CGSTPer, SGSTPer, IGSTPer, CommTaxPer, payPanelName, currentFirmType);
                    if (confirmStockTransfer == true) {
                        return true;
                    } else {
                        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                        document.getElementById("paySubButtDiv").style.visibility = "visible";
                        document.getElementById("paySubPrintButtDiv").style.visibility = "visible";
                        return false;
                    }
                }
            }
        }
    }
    //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    // END CODE VALIDATE TAX OPTIONS FOR SELL PURCHASE PAYMENT ACCORDING TO LOGIN TYPE @AUTHOR:MADHUREE-20JUNE2020 //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    //
    //Prathamesh added condition for RateCut Req for metal transaction 08/08/2024
    if (payPanelName == 'UserPayment') {
        //
        if (!prefix) {
            prefix = '';
        }
        let metal1WtPrevBal = parseFloat(document.getElementById('metal1WtPrevBal').value.slice(0, -3));
        let metal2WtPrevBal = parseFloat(document.getElementById('metal2WtPrevBal').value.slice(0, -3));
        let metal3WtPrevBal = parseFloat(document.getElementById('metal3WtPrevBal').value.slice(0, -3));
        //
        if ((metal1WtPrevBal > 0 || metal2WtPrevBal > 0 || metal3WtPrevBal > 0) && paymentMode.value == 'ByCash') {
            alert("Please Select RateCut Option To continue Transaction !");
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("paySubButtDiv").style.visibility = "visible";
            document.getElementById("paySubPrintButtDiv").style.visibility = "visible";
            return false;
        }
    }
    //Prathamesh added condition for RateCut Req for metal transaction 08/08/2024
    if (validateAddNewSuppInvoice(payPanelName)) {
        if (payPanelName == 'NwOrPayment' || payPanelName == 'SlPrPayment' || payPanelName == 'RawPayment' || payPanelName == 'StockPayment') {
            document.getElementById("totMetal").value = getMetalDiv;
        } else if (payPanelName == 'NwOrPayUp' || payPanelName == 'SellPayUp' || payPanelName == 'RawPayUp' || payPanelName == 'StockPayUp') {
            document.getElementById("totMetal").value = document.getElementById("noOfRawMet").value;
        }
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("paySubButtDiv").style.visibility = "visible";
        document.getElementById("paySubPrintButtDiv").style.visibility = "visible";
        return false;
    }
//    }      
}
/*********End Code To add panel @Author:SANT30NOV16************/
/*********End Code To add panel @Author:SANT14OCT16************/
/*********End Code To add panel @Author:PRIYA04FEB14************/
/***End to change function to add variables of alert msgs @AUTHOR: SANDY29JAN14**********/
/*********End Code To add price cut @Author:PRIYA20JAN14******************/
/*********End Code To change function @Author:PRIYA15OCT13******************/
/*********End Code To change id @Author:PRIYA04OCT13******************/
/*********End Code To Add FirmId,AccId @AUTHOR:PRIYA30MAY13******************/
//END CODE TO ADD Supp Inv Fields @AUTHOR:PRIYA21JAN13
//END CODE TO ADD Supplier Invoice @AUTHOR:PRIYA19JAN13

//START Code To Add SellPurchase Payment Div @AUTHOR:PRIYA22FEB13
//Start code to comment @Author:PRIYA02DEC13
/*function validateSellPurchase(){
 if (validateEmptyField(document.getElementById("slPrItemFinalVal").value,"Please enter Valuation!") == false) {
 document.getElementById("slPrItemFinalVal").focus();
 return false;
 }
 return true;
 }
 function add_sell_purchase(url, parameters) {
 
 loadXMLDoc();
 
 xmlhttp.onreadystatechange = alertAddSellPurchase;
 
 xmlhttp.open('POST', url, true);
 xmlhttp.setRequestHeader('Content-Type',
 'application/x-www-form-urlencoded');
 xmlhttp.setRequestHeader("Content-length", parameters.length);
 xmlhttp.setRequestHeader("Connection", "close");
 xmlhttp.send(parameters);
 
 }
 function alertAddSellPurchase() {
 
 if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
 document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
 document.getElementById("sellPurchaseItemDetails").innerHTML = xmlhttp.responseText;
 } else {
 document.getElementById("main_ajax_loading_div").style.visibility = "visible";
 
 }
 
 }
 */
//End code to comment @Author:PRIYA02DEC13
//START CODE To Add SalesPurchase Invoice After Submit @AUTHOR:PRIYA24FEB13
/**********START CODE To Remove NetWght And NetWghtType Ids @AUTHOR:PRIYA28FEB13**************/
/**********START CODE To Add itstId @AUTHOR:PRIYA08MARCH13**************/
/**********START CODE To Add NT WT @AUTHOR:PRIYA15APR13**************/
/**********START CODE To Add Item Sell Date  @AUTHOR:PRIYA18APR13**************/
/************Start code to change function  @Author:PRIYA06FEB14***************/
/************Start code to add parseInt @Author:PRIYA03JUN14***************/
function sellPurchaseSubmit() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("slPrSubButtDiv").style.visibility = "hidden";
    var stockDateDay = document.getElementById("slPrDOBDay").value;
    var stockDateMMM = document.getElementById("slPrDOBMonth").value;
    var stockDateYY = document.getElementById("slPrDOBYear").value;
    var stockDateStr = document.getElementById("slPrDOBMonth").value + ' ' + document.getElementById("slPrDOBDay").value + ', ' + document.getElementById("slPrDOBYear").value;
    var stockDate = new Date(stockDateStr); // stock Date
    var todayDate = new Date(); // Today Date

    var milliStockDate = stockDate.getTime();
    var milliTodayDate = milliStockDate;
    var datesDiff = milliTodayDate - milliStockDate;
    if (typeof (document.getElementById('nepaliDateIndicator')) != 'undefined' &&
            (document.getElementById('nepaliDateIndicator') != null)) {
        var nepaliDateIndicator = document.getElementById("nepaliDateIndicator").value;
    } else {
        var nepaliDateIndicator = '';
    }
    if (validateSellPurchaseInputs()) {//Start code to add condition for sell purchase item inputs validation @Author:SHRI05MAR15
        if (datesDiff < 0 && nepaliDateIndicator != 'YES') {
            alert('Please Select the correct Date!');
            document.getElementById("slPrDOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("slPrSubButtDiv").style.visibility = "visible";
            return false;
        } else {
            if (stockDateMMM == 'FEB' || stockDateMMM == 'APR' || stockDateMMM == 'JUN' || stockDateMMM == 'SEP' || stockDateMMM == 'NOV') {
                if (stockDateMMM == 'FEB' && stockDateDay > 29 && stockDateYY % 4 == 0) {
                    alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 29 days.');
                    document.getElementById("slPrDOBDay").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return false;
                }
                if (stockDateMMM == 'FEB' && stockDateDay > 28 && stockDateYY % 4 != 0) {
                    alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 28 days.');
                    document.getElementById("slPrDOBDay").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return false;
                }
                if (stockDateDay > 30) {
                    alert('Please select correct Date, Month ' + stockDateMMM + ' has only max 30 days.');
                    document.getElementById("slPrDOBDay").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return false;
                }
            }
            if (document.getElementById("panelName").value == 'SellDetUpPanel' || document.getElementById("panelName").value == 'SellPayUp') {
                if (parseInt(document.getElementById("totalPurQty").value) < ((parseInt(document.getElementById("totalSellQty").value) + parseInt(document.getElementById("slPrItemPieces").value)) - parseInt(document.getElementById("stockQty").value))) {
                    alert('Total Avail Qty:' + document.getElementById("totalPurQty").value + 'Total Sold Qty:' + document.getElementById("totalSellQty").value + '\nQuantity Exceeds Available Stock Quantity!\n Please Enter Correct Quantity !\n');
                    document.getElementById("slPrItemPieces").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return false;
                }
            } else if (document.getElementById("panelName").value == '' && (parseInt(document.getElementById("slPrItemPieces").value) > parseInt(document.getElementById("stockQty").value))) {
                alert('Quantity Exceeds Available Stock Quantity!\n Please Enter Correct Quantity !');
                document.getElementById("slPrItemPieces").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                return false;
            } else {
                //start code to validate hallmark uid: author @darshana 11 aug 2021
                var hallmarkValue = document.getElementById('sttr_hallmark_uid').value;
                var documentBslash = document.getElementById('documentRootBSlash').value;
                var panleName = 'AddSell';
                //
                if (document.getElementById("sttr_hallmark_uid").value != '') {
                    result = checkHallMarkUid(hallmarkValue, documentBslash, panleName, document.getElementById('sttrId').value);
                    if (result != 'success') {
                        alert(result);
                        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                        document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                        return false;
                    }
                }
                //
                if (typeof (document.getElementById('stockCrystal')) != 'undefined' && document.getElementById('stockCrystal') != null) {
                    if (document.getElementById("stockCrystal").value != 0) {
                        document.getElementById("sellTotCrystal").value = document.getElementById("noOfCry").value; //changed @Author:PRIYA04DEC13
                    }
                }

                if (validateEmptyField(document.getElementById("slPrItemFinalVal").value, "Please enter Valuation!") == false) {
                    document.getElementById("slPrItemFinalVal").focus();


                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return false;
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return true;
                }
                return false;
            }

        }


        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("slPrSubButtDiv").style.visibility = "visible";
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("slPrSubButtDiv").style.visibility = "visible";
        return false;
    }//End code to add condition for sell purchase item inputs validation @Author:SHRI05MAR15
}
/***************Start code to add function for sell purchase item inputs validation @Author:SHRI05MAR15**************/
function validateSellPurchaseInputs() {
    //
    var preInvNoStr = document.getElementById("slPrPreInvoiceNo").value;
    //
    //alert('preInvNoStr == ' + preInvNoStr);
    //
    var preInvNoCheckLastCharacter = preInvNoStr.charAt(preInvNoStr.length - 1);
    //
    //alert('preInvNoCheckLastCharacter == ' + preInvNoCheckLastCharacter);
    //
    var alphaExp = /^[0-9]+$/;
    var qtyValidationIndi = document.getElementById('qtyidvaliadtionsellpanel').value;
    if(qtyValidationIndi == 'YES'){
        if (validateEmptyField(document.getElementById("slPrItemPieces").value, "Please enter Item Pieces!") == false || 
             validateNum(document.getElementById("slPrItemPieces").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slPrItemPieces").focus();
        return false;
    }else if (parseInt(document.getElementById("slPrItemPieces").value) <= 0) {
    alert("Please enter Item Pieces!");
    document.getElementById("slPrItemPieces").focus();
    return false;
}
    }
    if (validateSelectField(document.getElementById("slPrDOBDay").value, "Please select day!") == false) {
        document.getElementById("slPrDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("slPrDOBMonth").value, "Please select month!") == false) {
        document.getElementById("slPrDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("slPrDOBYear").value, "Please select year!") == false) {
        document.getElementById("slPrDOBYear").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrCustomerName").value, "Customer Name should not be null!") == false) {
        document.getElementById("slPrCustomerName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrPreInvoiceNo").value, "Please enter Pre Invoice Number!") == false) {
        document.getElementById("slPrPreInvoiceNo").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrInvoiceNo").value, "Please enter Invoice Number!") == false) {
        document.getElementById("slPrInvoiceNo").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Id!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if ((typeof (document.getElementById('sttr_account_id')) != 'undefined' && document.getElementById('sttr_account_id') != null)
            && (validateSelectField(document.getElementById("sttr_account_id").value, "Please select Account Id!") == false)) {
        document.getElementById("sttr_account_id").focus();
        return false;
    } else if (validateSelectField(document.getElementById("slPrItemMetal").value, "Please select Metal!") == false) {
        document.getElementById("slPrItemMetal").focus();
        return false;
    } else if ((document.getElementById("slPrItemMetal").value != 'Other') && validateEmptyField(document.getElementById("slPrItemMetalRate").value, "Please enter Metal Rate!") == false) {
        document.getElementById("slPrItemMetalRate").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrItemCategory").value, "Please enter Item Category!") == false) {
        document.getElementById("slPrItemCategory").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrItemName").value, "Please enter Item Name!") == false) {
        document.getElementById("slPrItemName").focus();
        return false;
    }
//    else if (validateEmptyField(document.getElementById("slPrItemPieces").value, "Please enter Item Pieces!") == false ||
//             validateNum(document.getElementById("slPrItemPieces").value, "Accept only numeric characters without space!") == false) {
//        document.getElementById("slPrItemPieces").focus();
//        return false;
//    }
    else if (validateEmptyField(document.getElementById("slPrItemGSW").value, "Please enter Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("slPrItemGSW").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slPrItemGSW").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrItemNTW").value, "Please enter Net Weight!") == false ||
            validateNumWithDot(document.getElementById("slPrItemNTW").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slPrItemNTW").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_purity").value, "Please enter Item Purity!") == false ||
            validateNumWithDot(document.getElementById("sttr_purity").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_purity").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrItemFinalVal").value, "Please enter Final Valuation!") == false ||
            validateNumWithDot(document.getElementById("slPrItemFinalVal").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slPrItemFinalVal").focus();
        return false;
    }
    //else if (preInvNoCheckLastCharacter.match(alphaExp)) {
    //         //
    //         alert("In Pre Invoice Number, Last Character Should Not Be Numeric!");
    //         document.getElementById("slPrPreInvoiceNo").focus();
    //         return false;
    //         //
    //}
    //else if (validateNum(preInvNoCheckLastCharacter, "Wrong Pre Invoice Number, Please Enter Correct Invoice Number!") == false) {
    //           document.getElementById("slPrPreInvoiceNo").focus();
    //           return false;
    //} 
    else {
        return true;
    }
    return false;
}
//
//
/***************End code to add function for sell purchase item inputs validation @Author:SHRI05MAR15**************/
/************End code to add parseInt @Author:PRIYA03JUN14***************/
/************End code to change function  @Author:PRIYA06FEB14***************/
/**********END CODE To Add Item Sell Date  @AUTHOR:PRIYA18APR13**************/
/**********END CODE To Add NT WT @AUTHOR:PRIYA15APR13**************/
/**********END CODE To Add itstId @AUTHOR:PRIYA08MARCH13**************/
/**********END CODE To Remove NetWght And NetWghtType Ids @AUTHOR:PRIYA28FEB13**************/
// END CODE To Add SalesPurchase Invoice After Submit @AUTHOR:PRIYA24FEB13
//
function validateSellPurchasePaymentInputs() {

    if (validateEmptyField(document.getElementById("slPrPayTotalAmtBal").value, "Please enter value in Total Amount Balance Field!") == false ||
            validateNumWithDot(document.getElementById("slPrPayTotalAmtBal").value, "Accept only numeric value!") == false) {
        document.getElementById("slPrPayTotalAmtBal").focus();
        return false;
    }

    return true;
}

function sell_Purchase_item_payment(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSellPurchaseItemPayment;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/***********Start Change in function to hide one div content @AUTHOR: SANDY9OCT13****************/
function alertSellPurchaseItemPayment() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("sellPurchasePayment").innerHTML = xmlhttp.responseText;
        //TO HIDE INVOICE DETAIL DIV B4 PAYMENT
        document.getElementById("slPrCurrentInvBeforePay").innerHTML = '';
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/***********End Change in function to hide one div content @AUTHOR: SANDY9OCT13****************/
/*********START CODE TO Add Cust Id @AUTHOR:PRIYA26FEB13 ************/
/*********Start CODE TO Add FirmId @AUTHOR:PRIYA08APR13 ************/
/*******************Start to add changes IN function @AUTHOR: SANDY21OCT13 *********************/
function sellPurchasePayment(preInv, postInv) {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("sellPurchasePaymentButt").style.visibility = "hidden";
    if (validateSellPurchasePaymentInputs()) {

        poststr = "sellPrPayPreInvoiceNo=" + encodeURIComponent(document.getElementById("slPrPayPreInvoiceNo").value)
                + "&sellPrPayInvoiceNo=" + encodeURIComponent(document.getElementById("slPrPayInvoiceNo").value)
                + "&sellPrCustId=" + encodeURIComponent(document.getElementById("custId").value)
                + "&sellPrPayFirm1=" + encodeURIComponent(document.getElementById("slPrPayFirm1").value)
                + "&slPrItemAddDate=" + encodeURIComponent(document.getElementById("slPrItemAddDate").value)
                + "&sellPrPaySelAccountId1=" + encodeURIComponent(document.getElementById("slPrPaySelAccountId1").value)
                + "&sellPrPayTotalGoldWGT=" + encodeURIComponent(document.getElementById("slPrPayTotalGoldWGT").value)
                + "&sellPrPayTotalGoldWGTType=" + encodeURIComponent(document.getElementById("slPrPayTotalGoldWGTType").value)
                + "&sellPrPayTotalSilverWGT=" + encodeURIComponent(document.getElementById("slPrPayTotalSilverWGT").value)
                + "&sellPrPayTotalSilverWGTType=" + encodeURIComponent(document.getElementById("slPrPayTotalSilverWGTType").value)
                + "&sellPrPayTotalGoldNetWGT=" + encodeURIComponent(document.getElementById("slPrPayTotalGoldNetWGT").value)
                + "&sellPrPayTotalGoldNetWGTType=" + encodeURIComponent(document.getElementById("slPrPayTotalGoldNetWGTType").value)
                + "&sellPrPayTotalSilverNetWGT=" + encodeURIComponent(document.getElementById("slPrPayTotalSilverNetWGT").value)
                + "&sellPrPayTotalSilverNetWGTType=" + encodeURIComponent(document.getElementById("slPrPayTotalSilverNetWGTType").value)
                + "&sellPrPayMetalTotWeightRec1=" + encodeURIComponent(document.getElementById("slPrPayMetalTotWeightRec1").value)
                + "&sellPrPayMetalTotWeightRecType1=" + encodeURIComponent(document.getElementById("slPrPayMetalTotWeightRecType1").value)
                + "&sellPrPayMetalTunch1=" + encodeURIComponent(document.getElementById("slPrPayMetalTunch1").value)
                + "&sellPrPayMetalFineWeight1=" + encodeURIComponent(document.getElementById("slPrPayMetalFineWeightRec1").value)
                + "&sellPrPayMetalRate1=" + encodeURIComponent(document.getElementById("slPrPayMetalRate1").value)
                + "&sellPrPayMetalValuation1=" + encodeURIComponent(document.getElementById("slPrPayMetalValuation1").value)
                + "&sellPrPayMetalDueWeight1=" + encodeURIComponent(document.getElementById("slPrPayMetalDueWeight1").value)
                + "&sellPrPayMetalDueWeightType1=" + encodeURIComponent(document.getElementById("slPrPayMetalDueWeightType1").value)
                + "&sellPrPayFirm2=" + encodeURIComponent(document.getElementById("slPrPayFirm2").value)
                + "&sellPrPaySelAccountId2=" + encodeURIComponent(document.getElementById("slPrPaySelAccountId2").value)
                + "&sellPrPayMetalTotWeightRec2=" + encodeURIComponent(document.getElementById("slPrPayMetalTotWeightRec2").value)
                + "&sellPrPayMetalTotWeightRecType2=" + encodeURIComponent(document.getElementById("slPrPayMetalTotWeightRecType2").value)
                + "&sellPrPayMetalTunch2=" + encodeURIComponent(document.getElementById("slPrPayMetalTunch2").value)
                + "&sellPrPayMetalFineWeight2=" + encodeURIComponent(document.getElementById("slPrPayMetalFineWeightRec2").value)
                + "&sellPrPayMetalRate2=" + encodeURIComponent(document.getElementById("slPrPayMetalRate2").value)
                + "&sellPrPayMetalValuation2=" + encodeURIComponent(document.getElementById("slPrPayMetalValuation2").value)
                + "&sellPrPayMetalDueWeight2=" + encodeURIComponent(document.getElementById("slPrPayMetalDueWeight2").value)
                + "&sellPrPayMetalDueWeightType2=" + encodeURIComponent(document.getElementById("slPrPayMetalDueWeightType2").value)
                + "&sellPrPayGoldWghtBal=" + encodeURIComponent(document.getElementById("slPrPayGoldWghtBal").value)
                + "&sellPrPaySilverWghtBal=" + encodeURIComponent(document.getElementById("slPrPaySilverWghtBal").value)
                + "&sellPrPayTotalAmt=" + encodeURIComponent(document.getElementById("slPrPayTotalAmt").value)
                + "&sellPrPayTotalAmtRec=" + encodeURIComponent(document.getElementById("slPrPayTotalAmtRec").value)
                + "&sellPrPayTotalAmtBal=" + encodeURIComponent(document.getElementById("slPrPayTotalAmtBal").value)
                + "&sellPrPaySelAccountId=" + encodeURIComponent(document.getElementById("stockPaySelAccountId").value)
                + "&sellPrPayChequeNo=" + encodeURIComponent(document.getElementById("slPrPayChequeNo").value)
                + "&sellPrPayTotalCashPaid=" + encodeURIComponent(document.getElementById("slPrPayTotalCashPaid").value)
                + "&sellPrPayTotalDiscount=" + encodeURIComponent(document.getElementById("slPrPayTotalDiscount").value)
                + "&sellPrPayOtherInfo=" + encodeURIComponent(document.getElementById("slPrPayOtherInfo").value)
                + "&sellPrItemMetal=" + encodeURIComponent(document.getElementById("slPrItemMetal").value)
                + "&sellPrItemName=" + encodeURIComponent(document.getElementById("slPrItemName").value)
                + "&sellPrFirmId=" + encodeURIComponent(document.getElementById("slPrFirmId").value)
                + "&sellPrAccId=" + encodeURIComponent(document.getElementById("slPrAccId").value)
                + "&sellPrPyCardTp=" + encodeURIComponent(document.getElementById("rawMetPayCardType").value)
                + "&preInv=" + encodeURIComponent(preInv)
                + "&postInv=" + encodeURIComponent(postInv);
        sell_Purchase_item_payment('include/php/ogsppyad.php', poststr);
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("sellPurchasePaymentButt").style.visibility = "visible";
        return false;
    }
}
/*******************End to add changes IN function @AUTHOR: SANDY21OCT13 *********************/
/*********End CODE TO Add FirmId @AUTHOR:PRIYA08APR13 ************/
/*********END CODE TO Add Cust Id @AUTHOR:PRIYA26FEB13 ************/
//END Code To Add SellPurchase Payment Div @AUTHOR:PRIYA22FEB13
/********Start Code To Add Function For Supp Udhaar @AUTHOR:PRIYA07MAY13********/
/********Start Code To Add alert For Weight For Supp Udhaar @AUTHOR:PRIYA10MAY13********/
/*********Start code to change func @Author:PRIYA26APR14****************/
function validateSuppUdhaarPaymentInputs() {
    var metcnt = document.getElementById("metalCount").value
//    if (validateEmptyField((document.getElementById("suppUdhaarGoldWgtBal").value, "Please enter either Gold Balance or Silver Balance or Cash") == false) || ((document.getElementById("suppUdhaarSilverWgtBal").value, "Please enter Item Id!") == false)
//            || ((document.getElementById("suppUdhaarCash").value, "Please enter Item Id!") == false) ||
//            validateNum(document.getElementById("suppUdhaarGoldWgtBal").value, "Accept only numeric characters without space character!") == false) {
//        document.getElementById("suppUdhaarCash").focus();
//        return false;
//    }
    if ((document.getElementById("suppUdDpPayMetal1Val" + metcnt).value == 0) && ((document.getElementById("suppUdDpPayCashAmtRec").value == '') &&
            (document.getElementById("suppUdDpPayChequeAmt").value == '') && (document.getElementById("suppUdDpPayCardAmt").value == ''))) {
        alert("Please enter either Gold Balance or Silver Balance or Cash")
        document.getElementById("suppUdDpPayCashAmtRec").focus();
        return false;
    }
//    var totalGoldWtBal = document.getElementById("totalGdWtBal").value;
//    var totalSilverWtBal = document.getElementById("totalSlWtBal").value;
//
//    var suppUdInvGdWtBlType = document.getElementById("suppUdInvGoldWTBalType").value;
//    var suppUdInvSlWtBlType = document.getElementById("suppUdInvSilverWTBalType").value;
//
//    var suppUdhaarDepGdWtBl = document.getElementById("suppUdhaarGoldWgtBal").value;
//    var suppUdhaarDepGdWtBlType = document.getElementById("suppUdhaarGoldWgtBalType").value;
//    var suppUdhaarDepSlWtBl = document.getElementById("suppUdhaarSilverWgtBal").value;
//    var suppUdhaarDepSlWtBlType = document.getElementById("suppUdhaarSilverWgtBalType").value;
//
//
//    if (suppUdInvGdWtBlType != suppUdhaarDepGdWtBlType) {
//        confirm_box = confirm("You Have Entered Gold Weight Other Than Final Weight!\nDo You Want To Continue?");
//        if (confirm_box == true)
//        {
//            if (suppUdInvSlWtBlType != suppUdhaarDepSlWtBlType) {
//                confirm_box = confirm("You Have Entered Silver Weight Other Than Final Weight!\nDo You Want To Continue?");
//                if (confirm_box == true)
//                {
//                    if (validateEmptyField(document.getElementById("suppUdhaarAmtBal").value, "Please enter value in Total Amount Balance Field!") == false ||
//                            validateNumWithDot(document.getElementById("suppUdhaarAmtBal").value, "Accept only numeric value!") == false) {
//                        document.getElementById("suppUdhaarAmtBal").focus();
//                        return false;
//                    }
//                    return true;
//                }
//            }//if(Silver Wt Type)
//        }//if(Gold Wt Type Confirm box)    
//
//    }//if(Gold Wt Type)
//    else {
//        if (suppUdhaarDepGdWtBl > totalGoldWtBal) {
//            confirm_box = confirm("You Have Entered Gold Weight More Than Total Gold Weight!\nDo You Want To Continue?");
//            if (confirm_box == true)
//            {
//                if (suppUdInvSlWtBlType == suppUdhaarDepSlWtBlType) {
//                    if (suppUdhaarDepSlWtBl > totalSilverWtBal) {
//                        confirm_box = confirm("You Have Entered Silver Weight More Than Total Silver Weight!\nDo You Want To Continue?");
//                        if (confirm_box == true)
//                        {
//                            if (validateEmptyField(document.getElementById("suppUdhaarAmtBal").value, "Please enter value in Total Amount Balance Field!") == false ||
//                                    validateNumWithDot(document.getElementById("suppUdhaarAmtBal").value, "Accept only numeric value!") == false) {
//                                document.getElementById("suppUdhaarAmtBal").focus();
//                                return false;
//                            }
//                            return true;
//                        }
//                    }//if(Silver Wt Type)
//                }
//            }
//        }//if(Silver Wt)
//    }
//    if (suppUdInvSlWtBlType != suppUdhaarDepSlWtBlType) {
//        confirm_box = confirm("You Have Entered Silver Weight Other Than Final Weight!\nDo You Want To Continue?");
//        if (confirm_box == true)
//        {
//            if (validateEmptyField(document.getElementById("suppUdhaarAmtBal").value, "Please enter value in Total Amount Balance Field!") == false ||
//                    validateNumWithDot(document.getElementById("suppUdhaarAmtBal").value, "Accept only numeric value!") == false) {
//                document.getElementById("suppUdhaarAmtBal").focus();
//                return false;
//            }
//            return true;
//        }
//    } else {
//        if (suppUdhaarDepSlWtBl > totalSilverWtBal) {
//            confirm_box = confirm("You Have Entered Silver Weight More Than Total Silver Weight!\nDo You Want To Continue?");
//            if (confirm_box == true)
//            {
//                if (validateEmptyField(document.getElementById("suppUdhaarAmtBal").value, "Please enter value in Total Amount Balance Field!") == false ||
//                        validateNumWithDot(document.getElementById("suppUdhaarAmtBal").value, "Accept only numeric value!") == false) {
//                    document.getElementById("suppUdhaarAmtBal").focus();
//                    return false;
//                }
//                return true;
//            }
//        }//if(Silver Wt)
//    }
    /*****Start code to remove validations @Author:PRIYA15NOV13**********/
//    if (validateEmptyField(document.getElementById("suppUdhaarAmtBal").value,"Please enter value in Total Amount Balance Field!") == false ||
//        validateNumWithDot(document.getElementById("suppUdhaarAmtBal").value,"Accept only numeric value!") == false) {  
//        document.getElementById("suppUdhaarAmtBal").focus();
//        return false;
//    }
    /*****End code to remove validations @Author:PRIYA15NOV13**********/
    return true;
}
/*********End code to change func @Author:PRIYA26APR14****************/
/********End Code To Add alert For Weight For Supp Udhaar @AUTHOR:PRIYA10MAY13********/
function supp_udhaar_payment(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertSuppUdhaarPayment;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSuppUdhaarPayment() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("suppUdhaarDiv").innerHTML = xmlhttp.responseText; //div changed @Author:PRIYA27APR14
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
/*************Start to change in function to execute as per panel @AUTHOR: SANDY29SEP13 *****************/
/*********Start code to add date @Author:PRIYA26APR14************/
/*********Start code to add param @Author:PRIYA20JUN14************/
/*********Start code to add if else condition @Author:ANUJA25AUG15************/
function suppUdhaarPayment(panel, otherInfo) {
//    alert(panel);
    if (document.getElementById("panel").value == 'AddStock' && document.getElementById("invoiceRow").value > 0) {
        alert('You Can Not Submit This Item');
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("submiButt").style.visibility = "hidden";
        if (validateSuppUdhaarPaymentInputs()) {
            document.getElementById("metalCount").value = getMetalDiv;
            return true;
        }
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("submiButt").style.visibility = "visible";
    return false;
}
/*********End code to add if else condition @Author:ANUJA25AUG15************/
/*********End code to add param @Author:PRIYA20JUN14************/
/*********End code to add date @Author:PRIYA26APR14************/
/*************Start to change in function to execute as per panel @AUTHOR: SANDY29SEP13 *****************/
/********End Code To Add Function For Supp Udhaar @AUTHOR:PRIYA07MAY13********/
function searchMasterProdPrice(documentRootPath, custId, prodType, prodCategory, prodName, prodShortCode, masterItemId) {
//
    if (masterItemId === null || masterItemId == '') {
        if (prodType === null || prodType == '') {
            alert('Please Select Product Type!');
            document.getElementById('ms_itm_metal').focus();
            return false;
        } else if (prodCategory === null || prodCategory == '') {
            alert('Please Select Product Category!');
            document.getElementById('ms_itm_category').focus();
            return false;
        } else if (prodName === null || prodName == '') {
            alert('Please Select Product Name!');
            document.getElementById('ms_itm_name').focus();
            return false;
        } else if (prodShortCode === null || prodShortCode == '') {
            alert('Please Select Product Short Code!');
            document.getElementById('ms_itm_pre_id').focus();
            return false;
        }
    }
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("masterStockPriceDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/stock/master/omMasterItemPriceSetup.php?masterItemId=" + encodeURIComponent(masterItemId)
            + "&custId=" + custId
            + "&prodType=" + encodeURIComponent(prodType)
            + "&prodCategory=" + encodeURIComponent(prodCategory)
            + "&prodName=" + encodeURIComponent(prodName)
            + "&prodShortCode=" + encodeURIComponent(prodShortCode), true);
    xmlhttp.send();
    //
    return false;
}
//
//
function stockMasterItemDelete(panelName, ms_itm_id, ms_itm_itm_id) {
//
//alert(ms_itm_id);
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("omMasterItemDisplayListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/stock/master/omMasterItemDelete.php?ms_itm_id=" + encodeURIComponent(ms_itm_id) +
            "&ms_itm_itm_id=" + encodeURIComponent(ms_itm_itm_id), true);
    xmlhttp.send();
    //
}
//
//
//
function stockMasterItemPriceDelete(panelName, ms_itm_id, ms_itm_itm_id) {
//
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelName == 'stockMasterItemDelete')
                document.getElementById("omMasterItemDisplayListDiv").innerHTML = xmlhttp.responseText;
            else
                document.getElementById("userGroupDifferentPriceListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/stock/master/omMasterItemDelete.php?panelName=" + encodeURIComponent(panelName) + "&ms_itm_id=" + encodeURIComponent(ms_itm_id) +
            "&ms_itm_itm_id=" + encodeURIComponent(ms_itm_itm_id), true);
    xmlhttp.send();
    //
}
//
function showMasterItemPopUp(ms_itm_id, ms_itm_itm_id, panelName) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("info-popup-" + ms_itm_id).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("info-popup-" + ms_itm_id).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/stock/master/omMasterItemPopUp.php?ms_itm_id=" + ms_itm_id + "&ms_itm_itm_id=" + ms_itm_itm_id, true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
    //
}
//
function stockMasterInfoPopUpHide(ms_itm_id) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("info-popup-" + ms_itm_id).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("info-popup-" + ms_itm_id).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk.php", true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
    //
}
//
function stockTransFormInfoPopUpHide(itm_id) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("info-popup-" + itm_id).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("info-popup-" + itm_id).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk.php", true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
    //
}
//
//
/* START CODE TO ADD TWO MORE PARAMETERS TO FUNCTION FOR GETTING USER_ID AND USER_MEMBERSHIP AT MASTER PRICE POPUP @AUTHOR:MADHUREE-13FEB2020 */
function showStockMasterMainPopUp(ms_itm_id, ms_itm_itm_id, userMembership, userId, panelName) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("info-popup-" + ms_itm_id).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("info-popup-" + ms_itm_id).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/stock/master/omStockMasterMainPopUp.php?ms_itm_id=" + ms_itm_id + "&ms_itm_itm_id=" + ms_itm_itm_id + "&userId=" + userId + "&userMembership=" + userMembership, true);
    xmlhttp.send();
    //
}
//
/* END CODE TO ADD TWO MORE PARAMETERS TO FUNCTION FOR GETTING USER_ID AND USER_MEMBERSHIP AT MASTER PRICE POPUP @AUTHOR:MADHUREE-13FEB2020 */
function stockMasterMainPopUpHide(itm_id) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("info-popup-" + itm_id).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("info-popup-" + itm_id).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk.php", true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
    //
}
//
//
function stockMasterPriceDetailsUpdate(ms_sub_itm_ms_item_id, ms_sub_itm_id, panelName, custId) {
//
//alert(ms_sub_itm_id);
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockMasterMainUpdateDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    var poststr = "ms_itm_id=" + ms_sub_itm_ms_item_id + "&ms_sub_itm_id=" + ms_sub_itm_id + "&panelName=" + panelName
            + "&custId=" + custId;
    //
    //
    xmlhttp.open("POST", "omMasterStockUpdateMainDiv.php?" + poststr, true);
    xmlhttp.send();
}
//
//
function meltingInfoPopUpHide(documentRootPath) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            parent.window.document.getElementById("girviIframePopUp").innerHTML = xmlhttp.responseText;
        } else {
            //document.getElementById("girviIframePopUp").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ombbblnk.php", true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
    //
}
//
function checkProdMasterToGetPrice(prodCategory, prodName, prodPreId, userId) {
//alert(prodCategory);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //alert(xmlhttp.responseText);
            document.getElementById("SetPurityMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/stock/master/omCheckProdMasterToGetPrice.php?prodCategory=" + encodeURIComponent(prodCategory)
            + "&prodName=" + encodeURIComponent(prodName)
            + "&prodPreId=" + encodeURIComponent(prodPreId) + "&userId=" + userId, true);
    xmlhttp.send();
}
//
function stockMasterUserDetailsDisplay(ms_sub_itm_from_wt, ms_sub_itm_to_wt, ms_sub_itm_wstg_max, ms_sub_itm_wstg_min,
        ms_sub_itm_wstg_max_per, ms_sub_itm_wstg_min_per, ms_sub_itm_mkg_max, ms_sub_itm_mkg_min,
        ms_sub_itm_mkg_max_pp, ms_sub_itm_mkg_min_pp, ms_sub_itm_mkg_max_fx, ms_sub_itm_mkg_min_fx,
        ms_sub_itm_disc_max_gm, ms_sub_itm_disc_min_gm, ms_sub_itm_disc_max_pp, ms_sub_itm_disc_min_pp,
        ms_sub_itm_disc_mkg_max_fx, ms_sub_itm_disc_mkg_min_fx,
        itemCategory, itemName, itemModelNo) {
//
//alert('ms_sub_itm_from_wt == ' + ms_sub_itm_from_wt);
//alert('ms_sub_itm_to_wt == ' + ms_sub_itm_to_wt);
//alert('ms_sub_itm_wstg_max == ' + ms_sub_itm_wstg_max);
//alert('ms_sub_itm_wstg_min == ' + ms_sub_itm_wstg_min);
//alert('ms_sub_itm_wstg_max_per == ' + ms_sub_itm_wstg_max_per);
//alert('ms_sub_itm_wstg_min_per == ' + ms_sub_itm_wstg_min_per);O
//alert('ms_sub_itm_mkg_max == ' + ms_sub_itm_mkg_max);
//alert('ms_sub_itm_mkg_min == ' + ms_sub_itm_mkg_min);
//alert('ms_sub_itm_mkg_max_pp == ' + ms_sub_itm_mkg_max_pp);
//alert('ms_sub_itm_mkg_min_pp == ' + ms_sub_itm_mkg_min_pp);
//alert('ms_sub_itm_mkg_max_fx == ' + ms_sub_itm_mkg_max_fx);
//alert('ms_sub_itm_mkg_min_fx == ' + ms_sub_itm_mkg_min_fx);
//alert('ms_sub_itm_disc_max_gm == ' + ms_sub_itm_disc_max_gm);
//alert('ms_sub_itm_disc_min_gm == ' + ms_sub_itm_disc_min_gm);
//alert('ms_sub_itm_disc_max_pp == ' + ms_sub_itm_disc_max_pp);
//alert('ms_sub_itm_mkg_min_pp == ' + ms_sub_itm_mkg_min_pp);
//alert('ms_sub_itm_disc_mkg_max_fx == ' + ms_sub_itm_disc_mkg_max_fx);
//alert('ms_sub_itm_disc_mkg_min_fx == ' + ms_sub_itm_disc_mkg_min_fx);
//alert('itemCategory == ' + itemCategory);
//alert('itemName == ' + itemName);
//alert('itemModelNo == ' + itemModelNo);
//
//
    document.getElementById('ms_sub_itm_from_wt').value = ms_sub_itm_from_wt;
    document.getElementById('ms_sub_itm_to_wt').value = ms_sub_itm_to_wt;
    document.getElementById('ms_sub_itm_wstg_max').value = ms_sub_itm_wstg_max;
    document.getElementById('ms_sub_itm_wstg_min').value = ms_sub_itm_wstg_min;
    document.getElementById('ms_sub_itm_wstg_max_per').value = ms_sub_itm_wstg_max_per;
    document.getElementById('ms_sub_itm_wstg_min_per').value = ms_sub_itm_wstg_min_per;
    document.getElementById('ms_sub_itm_mkg_max').value = ms_sub_itm_mkg_max;
    document.getElementById('ms_sub_itm_mkg_min').value = ms_sub_itm_mkg_min;
    document.getElementById('ms_sub_itm_mkg_max_pp').value = ms_sub_itm_mkg_max_pp;
    document.getElementById('ms_sub_itm_mkg_min_pp').value = ms_sub_itm_mkg_min_pp;
    document.getElementById('ms_sub_itm_mkg_max_fx').value = ms_sub_itm_mkg_max_fx;
    document.getElementById('ms_sub_itm_mkg_min_fx').value = ms_sub_itm_mkg_min_fx;
    document.getElementById('ms_sub_itm_disc_max_gm').value = ms_sub_itm_disc_max_gm;
    document.getElementById('ms_sub_itm_disc_min_gm').value = ms_sub_itm_disc_min_gm;
    document.getElementById('ms_sub_itm_disc_max_pp').value = ms_sub_itm_disc_max_pp;
    document.getElementById('ms_sub_itm_disc_min_pp').value = ms_sub_itm_disc_min_pp;
    document.getElementById('ms_sub_itm_disc_mkg_max_fx').value = ms_sub_itm_disc_mkg_max_fx;
    document.getElementById('ms_sub_itm_disc_mkg_min_fx').value = ms_sub_itm_disc_mkg_min_fx;
    //document.getElementById('sttr_item_category').value = itemCategory;
    //document.getElementById('sttr_item_name').value = itemName;
    //document.getElementById('sttr_item_model_no').value = itemModelNo;

    document.getElementById('sttr_lab_charges').value = ms_sub_itm_mkg_min;
    document.getElementById('sttr_lab_charges_type').value = 'GM';
}
//
//
function showPopUpForWholeSaleToRetail(sttr_id, sttr_user_id, plusIcon, mainEntryPanelName, mainPanelName) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("info-popup-" + sttr_id).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("info-popup-" + sttr_id).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/stock/omStockTransFormPopUp.php?sttr_id=" + sttr_id + "&sttr_user_id=" + sttr_user_id + "&mainPanelName=" + mainPanelName, true); //change in filename @AUTHOR: SANDY22NOV13
    xmlhttp.send();
    //
}
//
//
function getAllDetailsOfScheme(schemeName, schemeGroup) {
//
//alert('schemeName == ' + schemeName);
//alert('schemeGroup == ' + schemeGroup);
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //alert(xmlhttp.responseText);
            document.getElementById("KittyUserGroupMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omGetAllDetailsOfScheme.php?schemeName=" + encodeURIComponent(schemeName)
            + "&schemeGroup=" + encodeURIComponent(schemeGroup), true);
    xmlhttp.send();
}
//
function getAllDetailsOfSchemeDisplay(schemeName, schemeGroup, schemeNoOfEMI, schemeEMIAmt, schemeBonus) {
//
//alert('schemeName == ' + schemeName);
//alert('schemeGroup == ' + schemeGroup);
//alert('schemeNoOfEMI == ' + schemeNoOfEMI);
//alert('schemeEMIAmt == ' + schemeEMIAmt);
//alert('schemeBonus == ' + schemeBonus);
//
    document.getElementById('kittyScheme').value = schemeName;
    document.getElementById('kittyGroup').value = schemeGroup;
    document.getElementById('kittyNoOfEmi').value = schemeNoOfEMI;
    document.getElementById('kittyEmiAmount').value = schemeEMIAmt;
    document.getElementById('kittyBonusAmount').value = schemeBonus;
    //document.getElementById('kittyNoOfEmi').focus();
}
//        }
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE SET ESTIMATE SELL & FIRM TRANSFER OPTION ACCORDING TO LOGIN TYPE @AUTHOR:MADHUREE-20JUNE2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
function validateStockFirmTransfer(prefix, CGSTCheck, SGSTCheck, IGSTCheck, CommTaxCheck, CGSTPer, SGSTPer, IGSTPer, CommTaxPer, payPanelName, currentFirmType) {
    if (((CGSTCheck == false || SGSTCheck == false) && IGSTCheck == false && CommTaxCheck == false) ||
            (((CGSTPer == '' || CGSTPer == 0) || (SGSTPer == '' || SGSTPer == 0)) && (IGSTPer == '' || IGSTPer == 0) && (CommTaxPer == '' || CommTaxPer == 0))) {
        if (currentFirmType == 'Public') {
            if (payPanelName == 'SellPayUp') {
                if (document.getElementById('HiddenMainTransType').value == 'sell') {
                    document.getElementById('HiddenSellEstimateConvert').value = 'YES';
                } else {
                    document.getElementById('HiddenSellEstimateConvert').value = 'NO';
                }
            } else {
                var nonTaxableInvoiceSetting = document.getElementById('nonTaxableInvoiceSetting').value;
                if (nonTaxableInvoiceSetting == 'manually') {
                    confirm_box = confirm("Press Cancel - Please select the tax options, this is the taxable firm.\nPress OK - If you want to create estimate?");
                    if (confirm_box == true) {
                        sec_confirm_box = confirm("Press Cancel - If you want to make estimate in same firm?\nPress OK - If you want to make estimate in another firm?");
                        if (sec_confirm_box == true) {
                            document.getElementById('HiddenFirmTransfer').value = 'YES';
                        } else {
                            document.getElementById('HiddenEstimateSell').value = 'YES';
                        }
                    } else {
                        document.getElementById('HiddenFirmTransfer').value = 'NO';
                        document.getElementById('HiddenEstimateSell').value = 'NO';
                        return false;
                    }
                } else {
                    document.getElementById('HiddenEstimateSell').value = 'YES';
                }
            }
        } else if (currentFirmType == 'Personal') {
            if (payPanelName == 'SellPayUp') {
                if (document.getElementById('HiddenMainTransType').value == 'sell') {
                    document.getElementById('HiddenSellEstimateConvert').value = 'YES';
                } else {
                    document.getElementById('HiddenSellEstimateConvert').value = 'NO';
                }
            } else {
                document.getElementById('HiddenEstimateSell').value = 'YES';
            }
        }
    } else {
        if (payPanelName == 'SellPayUp') {
            if (document.getElementById('HiddenMainTransType').value == 'ESTIMATESELL') {
                document.getElementById('HiddenEstimateSellConvert').value = 'YES';
            } else {
                document.getElementById('HiddenEstimateSellConvert').value = 'NO';
            }
        }
    }
    return true;
}
//        }
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE SET ESTIMATE SELL & FIRM TRANSFER OPTION ACCORDING TO LOGIN TYPE @AUTHOR:MADHUREE-20JUNE2020 //
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR MASTER STOCK DETAILS FUNCTIONS @AUTHOR:PRIYANKA-16FEB2021 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function showMasterStockDetailsPopUp(ms_itm_id, ms_sub_itm_ms_item_id, userId) {
    //
    //alert('ms_itm_id == ' + ms_itm_id);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("info-popup-" + ms_itm_id).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("info-popup-" + ms_itm_id).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    //
    xmlhttp.open("POST", "include/php/stock/master/omMasterStockDetailsPopUp.php?ms_itm_id=" + ms_itm_id +
            "&ms_sub_itm_ms_item_id=" + ms_sub_itm_ms_item_id + "&userId=" + userId, true);
    //
    xmlhttp.send();
    //
}
//
//
function stockMasterDetailsPopUpHide(itm_id) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("info-popup-" + itm_id).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("info-popup-" + itm_id).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    //
    xmlhttp.open("POST", "include/php/ombbblnk.php", true);
    xmlhttp.send();
    //
}
//
//
function masterStockDetailsUpdate(ms_sub_itm_ms_item_id, ms_sub_itm_id, panelName) {
    //
    //alert('ms_sub_itm_ms_item_id == ' + ms_sub_itm_ms_item_id);
    //alert('ms_sub_itm_id == ' + ms_sub_itm_id);
    //alert('panelName == ' + panelName);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("masterStockDetailsMainUpdateDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    var poststr = "ms_sub_itm_ms_item_id=" + ms_sub_itm_ms_item_id + "&ms_sub_itm_id=" + ms_sub_itm_id +
            "&panelName=" + panelName;
    //
    //
    xmlhttp.open("POST", "omMasterStockDetailsUpdate.php?" + poststr, true);
    xmlhttp.send();
    //
}
//
//
function masterStockDetailsDelete(panelName, ms_sub_itm_ms_item_id, ms_sub_itm_id) {
    //
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addNewMasterStockDetailsListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "omMasterStockDetailsDelete.php?ms_sub_itm_ms_item_id=" + ms_sub_itm_ms_item_id +
            "&ms_sub_itm_id=" + ms_sub_itm_id + "&panelName=" + panelName, true);
    //
    xmlhttp.send();
    //
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE FOR MASTER STOCK DETAILS FUNCTIONS @AUTHOR:PRIYANKA-16FEB2021 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
function masterRetailStockDetailsUpdate(ms_sub_itm_ms_item_id, ms_sub_itm_id, panelName) {
    //
    //alert('ms_sub_itm_ms_item_id == ' + ms_sub_itm_ms_item_id);
    //alert('ms_sub_itm_id == ' + ms_sub_itm_id);
    //alert('panelName == ' + panelName);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("masterStockDetailsMainUpdateDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    //
    var poststr = "ms_sub_itm_ms_item_id=" + ms_sub_itm_ms_item_id + "&ms_sub_itm_id=" + ms_sub_itm_id +
            "&panelName=" + panelName;
    //
    //
    xmlhttp.open("POST", "omMasterRetailStockDetailsUpdate.php?" + poststr, true);
    xmlhttp.send();
    //
}
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE TO CALCULATE MASTER PUR, SELL, MRP PRICE ETC. 
// AND PUR, SELL, MRP PRICE INCLUDING GST FUNCTIONS @AUTHOR:PRIYANKA-25FEB2021 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function calculateTaxIncPrice() {
    //
    //
    var purchasePriceMain = document.getElementById('ms_itm_purchase_price_main').value;
    var sellPriceMain = document.getElementById('ms_itm_sell_price_main').value;
    var mrpPriceMain = document.getElementById('ms_itm_mrp_main').value;
    //
    //
    var gst = document.getElementById('ms_itm_gst').value;
    //
    // GST @ 18%
    var strGst = gst;
    var resStrGst = strGst.substr(5);
    var prodGst = resStrGst.replace("%", "");
    //
    //
    //alert('prodGst == ' + prodGst);
    //alert('ms_itm_taxincl_checked == ' + document.getElementById("ms_itm_taxincl_checked").checked);
    //
    //
    if (document.getElementById("ms_itm_taxincl_checked").checked == true) {
        //
        if (purchasePriceMain > 0) {
            document.getElementById("ms_itm_purchase_price").value = parseFloat((100 * parseFloat(purchasePriceMain)) / (100 + (parseFloat(prodGst)))).toFixed(2);
        }
        //
        if (sellPriceMain > 0) {
            document.getElementById("ms_itm_sell_price").value = parseFloat((100 * parseFloat(sellPriceMain)) / (100 + (parseFloat(prodGst)))).toFixed(2);
        }
        //
        if (mrpPriceMain > 0) {
            document.getElementById("ms_itm_mrp").value = parseFloat((100 * parseFloat(mrpPriceMain)) / (100 + (parseFloat(prodGst)))).toFixed(2);
        }
        //
        if (purchasePriceMain > 0) {
            document.getElementById("ms_itm_pur_price_with_gst").value = parseFloat(purchasePriceMain).toFixed(2);
        }
        //
        if (sellPriceMain > 0) {
            document.getElementById("ms_itm_sell_price_with_gst").value = parseFloat(sellPriceMain).toFixed(2);
        }
        //
        if (mrpPriceMain > 0) {
            document.getElementById("ms_itm_mrp_with_gst").value = parseFloat(mrpPriceMain).toFixed(2);
        }
        //        
    }
    //
    //
    if (document.getElementById("ms_itm_taxincl_checked").checked == false) {
        //
        var purchaseGstAmt = ((parseFloat(purchasePriceMain) * parseFloat(prodGst)) / 100).toFixed(2);
        //
        var sellGstAmt = ((parseFloat(sellPriceMain) * parseFloat(prodGst)) / 100).toFixed(2);
        //
        var mrpGstAmt = ((parseFloat(mrpPriceMain) * parseFloat(prodGst)) / 100).toFixed(2);
        //
        //
        //alert('purchaseGstAmt == ' + purchaseGstAmt);
        //
        //
        if (purchaseGstAmt == 'NaN') {
            purchaseGstAmt = 0;
        }
        //
        if (sellGstAmt == 'NaN') {
            sellGstAmt = 0;
        }
        //
        if (mrpGstAmt == 'NaN') {
            mrpGstAmt = 0;
        }
        //
        //
        if (purchasePriceMain > 0) {
            document.getElementById("ms_itm_pur_price_with_gst").value = parseFloat(parseFloat(purchasePriceMain) + parseFloat(purchaseGstAmt)).toFixed(2);
        }
        //
        if (sellPriceMain > 0) {
            document.getElementById("ms_itm_sell_price_with_gst").value = parseFloat(parseFloat(sellPriceMain) + parseFloat(sellGstAmt)).toFixed(2);
        }
        //
        if (mrpPriceMain > 0) {
            document.getElementById("ms_itm_mrp_with_gst").value = parseFloat(parseFloat(mrpPriceMain) + parseFloat(mrpGstAmt)).toFixed(2);
        }
        //
        if (purchasePriceMain > 0) {
            document.getElementById("ms_itm_purchase_price").value = parseFloat(purchasePriceMain).toFixed(2);
        }
        //
        if (sellPriceMain > 0) {
            document.getElementById("ms_itm_sell_price").value = parseFloat(sellPriceMain).toFixed(2);
        }
        //
        if (mrpPriceMain > 0) {
            document.getElementById("ms_itm_mrp").value = parseFloat(mrpPriceMain).toFixed(2);
        }
        //
    }
    //
    if (document.getElementById("ms_itm_pur_price_with_gst").value == 'NaN') {
        document.getElementById("ms_itm_pur_price_with_gst").value = '';
    }
    //
    if (document.getElementById("ms_itm_sell_price_with_gst").value == 'NaN') {
        document.getElementById("ms_itm_sell_price_with_gst").value = '';
    }
    //
    if (document.getElementById("ms_itm_mrp_with_gst").value == 'NaN') {
        document.getElementById("ms_itm_mrp_with_gst").value = '';
    }
    //
    if (document.getElementById("ms_itm_purchase_price").value == 'NaN') {
        document.getElementById("ms_itm_purchase_price").value = '';
    }
    //
    if (document.getElementById("ms_itm_sell_price").value == 'NaN') {
        document.getElementById("ms_itm_sell_price").value = '';
    }
    //
    if (document.getElementById("ms_itm_mrp").value == 'NaN') {
        document.getElementById("ms_itm_mrp").value = '';
    }
    //
    return false;
    //
}
//
//
function calculateWholesaleTaxIncPrice() {
    //
    //
    var purchasePriceMain = document.getElementById('ms_itm_wholesale_pur_price_main').value;
    var sellPriceMain = document.getElementById('ms_itm_wholesale_sell_price_main').value;
    //
    //
    var gst = document.getElementById('ms_itm_gst').value;
    //
    // GST @ 18%
    var strGst = gst;
    var resStrGst = strGst.substr(5);
    var prodGst = resStrGst.replace("%", "");
    //
    //
    //alert('prodGst == ' + prodGst);
    //
    //
    if (document.getElementById("ms_itm_wholesale_taxincl_checked").checked == true) {
        //
        if (purchasePriceMain > 0) {
            document.getElementById("ms_itm_wholesale_pur_price").value = parseFloat((100 * parseFloat(purchasePriceMain)) / (100 + (parseFloat(prodGst)))).toFixed(2);
        }
        //
        if (sellPriceMain > 0) {
            document.getElementById("ms_itm_wholesale_sell_price").value = parseFloat((100 * parseFloat(sellPriceMain)) / (100 + (parseFloat(prodGst)))).toFixed(2);
        }
        //
        if (purchasePriceMain > 0) {
            document.getElementById("ms_itm_wholesale_pur_price_with_gst").value = parseFloat(purchasePriceMain).toFixed(2);
        }
        //
        if (sellPriceMain > 0) {
            document.getElementById("ms_itm_wholesale_sell_price_with_gst").value = parseFloat(sellPriceMain).toFixed(2);
        }
        //        
    }
    //
    //
    if (document.getElementById("ms_itm_wholesale_taxincl_checked").checked == false) {
        //
        var purchaseGstAmt = ((parseFloat(purchasePriceMain) * parseFloat(prodGst)) / 100).toFixed(2);
        //
        var sellGstAmt = ((parseFloat(sellPriceMain) * parseFloat(prodGst)) / 100).toFixed(2);
        //
        //
        if (purchaseGstAmt == 'NaN') {
            purchaseGstAmt = 0;
        }
        //
        if (sellGstAmt == 'NaN') {
            sellGstAmt = 0;
        }
        //
        //
        if (purchasePriceMain > 0) {
            document.getElementById("ms_itm_wholesale_pur_price_with_gst").value = parseFloat(parseFloat(purchasePriceMain) + parseFloat(purchaseGstAmt)).toFixed(2);
        }
        //
        if (sellPriceMain > 0) {
            document.getElementById("ms_itm_wholesale_sell_price_with_gst").value = parseFloat(parseFloat(sellPriceMain) + parseFloat(sellGstAmt)).toFixed(2);
        }
        //
        if (purchasePriceMain > 0) {
            document.getElementById("ms_itm_wholesale_pur_price").value = parseFloat(purchasePriceMain).toFixed(2);
        }
        //
        if (sellPriceMain > 0) {
            document.getElementById("ms_itm_wholesale_sell_price").value = parseFloat(sellPriceMain).toFixed(2);
        }
        //
    }
    //
    //
    if (document.getElementById("ms_itm_wholesale_pur_price_with_gst").value == 'NaN') {
        document.getElementById("ms_itm_wholesale_pur_price_with_gst").value = '';
    }
    //
    if (document.getElementById("ms_itm_wholesale_sell_price_with_gst").value == 'NaN') {
        document.getElementById("ms_itm_wholesale_sell_price_with_gst").value = '';
    }
    //
    if (document.getElementById("ms_itm_wholesale_pur_price").value == 'NaN') {
        document.getElementById("ms_itm_wholesale_pur_price").value = '';
    }
    //
    if (document.getElementById("ms_itm_wholesale_sell_price").value == 'NaN') {
        document.getElementById("ms_itm_wholesale_sell_price").value = '';
    }
    //
    //
    return false;
    //
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO CALCULATE MASTER PUR, SELL, MRP PRICE ETC. 
// AND PUR, SELL, MRP PRICE INCLUDING GST FUNCTIONS @AUTHOR:PRIYANKA-25FEB2021 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
//
//
function sellMetalFormB2Submit() {
    //
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("slPrSubButtDiv").style.visibility = "hidden";
    //
    var stockDateDay = document.getElementById("slPrDOBDay").value;
    var stockDateMMM = document.getElementById("slPrDOBMonth").value;
    var stockDateYY = document.getElementById("slPrDOBYear").value;
    var stockDateStr = document.getElementById("slPrDOBMonth").value + ' ' + document.getElementById("slPrDOBDay").value + ', ' + document.getElementById("slPrDOBYear").value;
    var stockDate = new Date(stockDateStr); // stock Date
    var todayDate = new Date(); // Today Date
    //
    var milliStockDate = stockDate.getTime();
    var milliTodayDate = milliStockDate;
    var datesDiff = milliTodayDate - milliStockDate;
    //
    if (typeof (document.getElementById('nepaliDateIndicator')) != 'undefined' &&
            (document.getElementById('nepaliDateIndicator') != null)) {
        var nepaliDateIndicator = document.getElementById("nepaliDateIndicator").value;
    } else {
        var nepaliDateIndicator = '';
    }
    if (validateSellMetalFormB2Inputs()) {
        if (datesDiff < 0 && nepaliDateIndicator != 'YES') {
            alert('Please Select the correct Date!');
            document.getElementById("slPrDOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("slPrSubButtDiv").style.visibility = "visible";
            return false;
        } else {
            if (stockDateMMM == 'FEB' || stockDateMMM == 'APR' || stockDateMMM == 'JUN' ||
                    stockDateMMM == 'SEP' || stockDateMMM == 'NOV') {
                if (stockDateMMM == 'FEB' && stockDateDay > 29 && stockDateYY % 4 == 0) {
                    alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 29 days.');
                    document.getElementById("slPrDOBDay").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return false;
                }
                if (stockDateMMM == 'FEB' && stockDateDay > 28 && stockDateYY % 4 != 0) {
                    alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 28 days.');
                    document.getElementById("slPrDOBDay").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return false;
                }
                if (stockDateDay > 30) {
                    alert('Please select correct Date, Month ' + stockDateMMM + ' has only max 30 days.');
                    document.getElementById("slPrDOBDay").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return false;
                }
            }
            if (document.getElementById("panelName").value == 'SellDetUpPanel' || document.getElementById("panelName").value == 'SellPayUp') {
                if (parseInt(document.getElementById("totalPurQty").value) < ((parseInt(document.getElementById("totalSellQty").value) + parseInt(document.getElementById("slPrItemPieces").value)) - parseInt(document.getElementById("stockQty").value))) {
                    alert('Total Avail Qty:' + document.getElementById("totalPurQty").value + 'Total Sold Qty:' + document.getElementById("totalSellQty").value + '\nQuantity Exceeds Available Stock Quantity!\n Please Enter Correct Quantity !\n');
                    document.getElementById("slPrItemPieces").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return false;
                }
            } else if (document.getElementById("panelName").value == '' && (parseInt(document.getElementById("slPrItemPieces").value) > parseInt(document.getElementById("stockQty").value))) {
                alert('Quantity Exceeds Available Stock Quantity!\n Please Enter Correct Quantity !');
                document.getElementById("slPrItemPieces").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                return false;
            } else {
                if (document.getElementById("stockCrystal").value != 0) {
                    document.getElementById("sellTotCrystal").value = document.getElementById("noOfCry").value;
                }
                if (validateEmptyField(document.getElementById("slPrItemFinalVal").value, "Please enter Valuation!") == false) {
                    document.getElementById("slPrItemFinalVal").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return false;
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return true;
                }
                return false;
            }
        }
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("slPrSubButtDiv").style.visibility = "visible";
        return true;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("slPrSubButtDiv").style.visibility = "visible";
        return false;
    }
}
//
//
//
//
function validateSellMetalFormB2Inputs() {
    //
    if (validateSelectField(document.getElementById("slPrDOBDay").value, "Please select day!") == false) {
        document.getElementById("slPrDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("slPrDOBMonth").value, "Please select month!") == false) {
        document.getElementById("slPrDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("slPrDOBYear").value, "Please select year!") == false) {
        document.getElementById("slPrDOBYear").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrCustomerName").value, "Customer Name should not be null!") == false) {
        document.getElementById("slPrCustomerName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrPreInvoiceNo").value, "Please enter Pre Invoice Number!") == false) {
        document.getElementById("slPrPreInvoiceNo").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrInvoiceNo").value, "Please enter Invoice Number!") == false) {
        document.getElementById("slPrInvoiceNo").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm Id!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("sttr_account_id").value, "Please select Account Id!") == false) {
        document.getElementById("sttr_account_id").focus();
        return false;
    } else if (validateSelectField(document.getElementById("slPrItemMetal").value, "Please select Metal!") == false) {
        document.getElementById("slPrItemMetal").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrItemCategory").value, "Please enter Item Category!") == false) {
        document.getElementById("slPrItemCategory").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrItemName").value, "Please enter Item Name!") == false) {
        document.getElementById("slPrItemName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrItemGSW").value, "Please enter Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("slPrItemGSW").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slPrItemGSW").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrItemNTW").value, "Please enter Net Weight!") == false ||
            validateNumWithDot(document.getElementById("slPrItemNTW").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slPrItemNTW").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_purity").value, "Please enter Item Purity!") == false ||
            validateNumWithDot(document.getElementById("sttr_purity").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_purity").focus();
        return false;
    } else {
        return true;
    }
    return false;
}
//
//
// * ********************************************************************************************
// * START CODE TO ADD FUNCTION FOR MASTER SETUP MAIN ENTRY DELETE @AUTHOR-PRIYANKA-28APR2021
// * ********************************************************************************************
function stockMasterSetupMainDelete(panelName, ms_itm_id, ms_itm_itm_id) {
    //
    //alert(panelName);
    //alert(ms_itm_id);
    //alert(ms_itm_itm_id);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addNewMasterListDivFromAddStock").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/stock/master/omMasterSetupMainDelete.php?ms_itm_id=" + encodeURIComponent(ms_itm_id) +
            "&ms_itm_itm_id=" + encodeURIComponent(ms_itm_itm_id) +
            "&panelName=" + encodeURIComponent(panelName), true);
    //
    xmlhttp.send();
    //
}
// * ********************************************************************************************
// * END CODE TO ADD FUNCTION FOR MASTER SETUP MAIN ENTRY DELETE @AUTHOR-PRIYANKA-28APR2021
// * ********************************************************************************************
//
//
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR MASTER PANEL SHORTCUTS FUNCTIONS @AUTHOR:PRIYANKA-21MAY2021 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function showMasterPanelShortcutsPopUp(panelName) {
    //
    //alert('panelName == ' + panelName);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("masterPanelShortcutsDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("masterPanelShortcutsDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    //
    xmlhttp.open("POST", "include/php/stock/master/omMasterPanelShortcutsPopUp.php?panelName=" + panelName, true);
    //
    xmlhttp.send();
    //
}
//
//
function showMasterPanelShortcutsPopUpHide(panelName) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("masterPanelShortcutsDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("masterPanelShortcutsDiv").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    //
    xmlhttp.open("POST", "include/php/ombbblnk.php", true);
    xmlhttp.send();
    //
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE FOR MASTER PANEL SHORTCUTS FUNCTIONS @AUTHOR:PRIYANKA-21MAY2021 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR ORDER SEARCH PANEL @AUTHOR:PRIYANKA-10NOV2021 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function searchProductDetailsByIdBarcodeRFID(searchItemId, autoEntryValue, userId, transType, indicator, status) {
    //
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;
    //
    while (tempLen > 0) {
        var field = searchItemIdTemp.substr(0, 1);
        searchItemIdTemp = searchItemIdTemp.substr(1);
        if (field.match(alphaExp)) {
            charLen = charLen + 1;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }
    //
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);
    //
    var lastIndexOfHash = searchItemIdNumPart.lastIndexOf("#");
    //
    if (lastIndexOfHash > 0) {
        searchItemIdCharPart = searchItemId.substr(0, lastIndexOfHash + 2);
        searchItemIdNumPart = searchItemId.substr(lastIndexOfHash + 2);
    }
    //
    searchItemIdCharPart = encodeURIComponent(searchItemIdCharPart);
    searchItemIdNumPart = encodeURIComponent(searchItemIdNumPart);
    //
    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
    //alert('searchItemIdNumPart == ' + searchItemIdNumPart);
    //
    // IT WILL SET ITEM PRE ID & POST ID  
    document.getElementById('searchProductPreId').value = searchItemIdCharPart;
    document.getElementById('searchProductPostId').value = searchItemIdNumPart;
    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockMainFormDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/stock/omStockSearchForOrder.php?searchProductPreId=" + searchItemIdCharPart +
                "&searchProductPostId=" + searchItemIdNumPart + "&userId=" + userId +
                "&autoEntry=" + autoEntryValue + "&transType=" + transType +
                "&transactionType=" + transType + "&status=" + status + "&indicator=" + indicator, true);

        xmlhttp.send();
    } else {
        return false;
    }
}
//
//
//
//
function showProductDetailsDiv(srchItemPreId, srchItemPostId, userId, panelName, transType, indicator, status) {
    //
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockProductSearchDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/stock/omStockSearchForOrder.php?searchProductPreId=" + srchItemPreId +
            "&searchProductPostId=" + srchItemPostId + "&userId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&sttr_status=" + status + "&indicator=" + indicator, true);
    //
    xmlhttp.send();
    //
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE FOR ORDER SEARCH PANEL @AUTHOR:PRIYANKA-10NOV2021 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR HALLMARKING SEARCH PANEL @AUTHOR:PRIYANKA-10NOV2021 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function searchProductDetailsByIdBarcodeRFIDForHallMarking(searchItemId, autoEntryValue, userId, transType, indicator, newLotNumber) {
    //
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;
    //
    while (tempLen > 0) {
        var field = searchItemIdTemp.substr(0, 1);
        searchItemIdTemp = searchItemIdTemp.substr(1);
        if (field.match(alphaExp)) {
            charLen = charLen + 1;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }
    //
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);
    //
    var lastIndexOfHash = searchItemIdNumPart.lastIndexOf("#");
    //
    if (lastIndexOfHash > 0) {
        searchItemIdCharPart = searchItemId.substr(0, lastIndexOfHash + 2);
        searchItemIdNumPart = searchItemId.substr(lastIndexOfHash + 2);
    }
    //
    searchItemIdCharPart = encodeURIComponent(searchItemIdCharPart);
    searchItemIdNumPart = encodeURIComponent(searchItemIdNumPart);
    //
    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
    //alert('searchItemIdNumPart == ' + searchItemIdNumPart);
    //
    // IT WILL SET ITEM PRE ID & POST ID  
    document.getElementById('searchProductPreId').value = searchItemIdCharPart;
    document.getElementById('searchProductPostId').value = searchItemIdNumPart;
    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("sendStockHallmarkingSubDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/omCustHallMarkingSendStock.php?searchProductPreId=" + searchItemIdCharPart +
                "&searchProductPostId=" + searchItemIdNumPart + "&userId=" + userId + "&custId=" + userId +
                "&autoEntry=" + autoEntryValue + "&transType=" + transType +
                "&transactionType=" + transType + "&newLotNumber=" + newLotNumber + "&indicator=" + indicator, true);

        xmlhttp.send();
    } else {
        return false;
    }
}
//
//
//
//
function showProductDetailsDivForHallMarking(srchItemPreId, srchItemPostId, userId, panelName, transType, indicator, newLotNumber) {
    //
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainSendStockDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omCustHallMarkingSendStock.php?searchProductPreId=" + srchItemPreId +
            "&searchProductPostId=" + srchItemPostId + "&userId=" + userId + "&custId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&newLotNumber=" + newLotNumber + "&indicator=" + indicator, true);
    //
    xmlhttp.send();
    //
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE FOR HALLMARKING SEARCH PANEL @AUTHOR:PRIYANKA-10NOV2021 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
function createNewLotForHallmarking(lot_number) {
    var addToLotNumber = 1;
    var newLotNumber = parseFloat(parseFloat(lot_number) + parseFloat(addToLotNumber));
    document.getElementById("lotNumberDisplay").innerHTML = "(" + "LOT NO. " + newLotNumber + ")";
}
//
//
function deleteStockSendForHallmarking(delPanelName, delSttrId, userId, delProdCode) {
    //
    confirm_box = confirm("\n\nDo you really want to delete this stock?");
    //
    if (confirm_box == true) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainSendStockDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("POST", "include/php/omCustHallMarkingSendStock.php?delPanelName=" + delPanelName +
                "&delSttrId=" + delSttrId + "&userId=" + userId + "&custId=" + userId +
                "&delProdCode=" + delProdCode +
                "&transType=EXISTING" + "&transactionType=EXISTING" + "&formName=sendStockForHallmarking" +
                "&panelName=sendStockForHallmarking" + "&type=stock" + "&indicator=stock" +
                "&divName=cust_middle_body", true);
        //
        xmlhttp.send();
        //
    }
    //
}
//
//
//
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR DELETE RECEIVED STOCK HALLMARKING @AUTHOR:PRIYANKA-15NOV2021
// ********************************************************************************************************************
function deleteReceivedHallmarkingStock(delPanelName, delSttrId, userId, delProdCode) {
    //
    confirm_box = confirm("\n\nDo you really want to delete this stock?");
    //
    if (confirm_box == true) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("mainStockReturnDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("POST", "include/php/omCustHallMarkingReturn.php?delPanelName=" + delPanelName +
                "&delSttrId=" + delSttrId + "&userId=" + userId + "&custId=" + userId +
                "&delProdCode=" + delProdCode +
                "&transType=EXISTING" + "&transactionType=EXISTING" + "&formName=receiveStockWithHallmarking" +
                "&panelName=receiveStockWithHallmarking" + "&type=stock" + "&indicator=stock" +
                "&divName=cust_middle_body", true);
        //
        xmlhttp.send();
        //
    }
    //
}
// ********************************************************************************************************************
// END CODE FOR NEW FUNCTION FOR DELETE RECEIVED STOCK HALLMARKING @AUTHOR:PRIYANKA-15NOV2021
// ********************************************************************************************************************
//
//
//
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR RECEIVED STOCK HALLMARKING POP UP CLOSE @AUTHOR:PRIYANKA-15NOV2021
// ********************************************************************************************************************
function closeReceivedStockHallmarkingPopUp(userId) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainStockReturnDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omCustHallMarkingReturn.php?userId=" + userId + "&custId=" + userId +
            "&transType=EXISTING" + "&transactionType=EXISTING" + "&formName=receiveStockWithHallmarking" +
            "&panelName=receiveStockWithHallmarking" + "&type=stock" + "&indicator=stock" +
            "&divName=cust_middle_body", true);
    //
    xmlhttp.send();
    //    
}
// ********************************************************************************************************************
// END CODE FOR NEW FUNCTION FOR RECEIVED STOCK HALLMARKING POP UP CLOSE @AUTHOR:PRIYANKA-15NOV2021
// ********************************************************************************************************************
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR RECEIVED STOCK HALLMARKING POP UP IFRAME @AUTHOR:PRIYANKA-13NOV2021 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function searchProductDetailsByIdBarcodeRFIDForReceivedStockHallMarking(searchItemId, userId, transType, indicator, documentRoot) {
    //
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;
    //
    while (tempLen > 0) {
        var field = searchItemIdTemp.substr(0, 1);
        searchItemIdTemp = searchItemIdTemp.substr(1);
        if (field.match(alphaExp)) {
            charLen = charLen + 1;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }
    //
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);
    //
    var lastIndexOfHash = searchItemIdNumPart.lastIndexOf("#");
    //
    if (lastIndexOfHash > 0) {
        searchItemIdCharPart = searchItemId.substr(0, lastIndexOfHash + 2);
        searchItemIdNumPart = searchItemId.substr(lastIndexOfHash + 2);
    }
    //
    searchItemIdCharPart = encodeURIComponent(searchItemIdCharPart);
    searchItemIdNumPart = encodeURIComponent(searchItemIdNumPart);
    //
    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
    //alert('searchItemIdNumPart == ' + searchItemIdNumPart);
    //
    // IT WILL SET ITEM PRE ID & POST ID  
    document.getElementById('searchProductPreId').value = searchItemIdCharPart;
    document.getElementById('searchProductPostId').value = searchItemIdNumPart;
    return false;
}
//
//
//
//
function showProductDetailsDivForReceivedStockHallMarking(srchItemPreId, srchItemPostId, userId, panelName, transType, indicator, documentRoot) {
    //
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalReceiveStock').style.display = "block";
            document.getElementById('myModalReceiveStock').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omCustHallMarkingReceiveStockPopUpIframe.php?searchProductPreId=" + srchItemPreId +
            "&searchProductPostId=" + srchItemPostId + "&userId=" + userId + "&custId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&indicator=" + indicator + "&documentRoot=" + documentRoot, true);
    //
    xmlhttp.send();
    //
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE FOR RECEIVED STOCK HALLMARKING POP UP IFRAME @AUTHOR:PRIYANKA-13NOV2021 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
//
function receivedStockUpdate() {
    if (validateEmptyField(document.getElementById("sttr_hallmark_uid").value, "Please Enter HUID") == false) {
        document.getElementById("sttr_hallmark_uid").focus();
        return false;
    }
    return true;
}
//
//
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR HALLMARKING LIST @AUTHOR:PRIYANKA-20MAR2023
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function stockSendForHallmarkingAllStock(sendStockLotNo, userId) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("CustHallMarkingSendStockMainList").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omCustHallMarkingSendStockDatatableList.php?sendStockLotNo=" + sendStockLotNo +
            "&userId=" + userId + "&custId=" + userId +
            "&transType=EXISTING" + "&transactionType=EXISTING" + "&formName=sendStockForHallmarking" +
            "&panelName=sendStockForHallmarking" + "&type=stock" + "&indicator=stock" +
            "&divName=cust_middle_body", true);
    //
    xmlhttp.send();
    //
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE FOR HALLMARKING LIST @AUTHOR:PRIYANKA-20MAR2023
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
//
//
// MODIFIED FUNCTION FOR VOUCHER NUMBER PARAMETERS @AUTHOR:PRIYANKA-29JULY2022
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE STOCK MANAGEMENT BY COUNTER SEARCH PANEL @AUTHOR:PRIYANKA-25NOV2021
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function searchProductDetailsByIdBarcodeRFIDForStockManagementByCounter(searchItemId, autoEntryValue, userId, transType, indicator, productCounter, selectedStaff, selectedFirm, preVoucherNo, postVoucherNo) {
    //
    var searchItemIdLen = searchItemId.length;
    var searchItemIdTemp = searchItemId;
    var tempLen = searchItemIdLen;
    var charLen = 0;
    var alphaExp = /^[a-zA-Z]+$/;
    //
    while (tempLen > 0) {
        var field = searchItemIdTemp.substr(0, 1);
        searchItemIdTemp = searchItemIdTemp.substr(1);
        if (field.match(alphaExp)) {
            charLen = charLen + 1;
        } else {
            break;
        }
        tempLen = tempLen - 1;
    }
    //
    var searchItemIdCharPart = searchItemId.substr(0, charLen);
    var searchItemIdNumPart = searchItemId.substr(charLen);
    //
    var lastIndexOfHash = searchItemIdNumPart.lastIndexOf("#");
    //
    if (lastIndexOfHash > 0) {
        searchItemIdCharPart = searchItemId.substr(0, lastIndexOfHash + 2);
        searchItemIdNumPart = searchItemId.substr(lastIndexOfHash + 2);
    }
    //
    searchItemIdCharPart = encodeURIComponent(searchItemIdCharPart);
    searchItemIdNumPart = encodeURIComponent(searchItemIdNumPart);
    //
    //alert('searchItemIdCharPart == ' + searchItemIdCharPart);
    //alert('searchItemIdNumPart == ' + searchItemIdNumPart);
    //
    // IT WILL SET ITEM PRE ID & POST ID  
    document.getElementById('searchProductPreId').value = searchItemIdCharPart;
    document.getElementById('searchProductPostId').value = searchItemIdNumPart;
    //
    //
    if (autoEntryValue == 'YES') {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockManagementByCounterDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        // 
        // MODIFIED CODE FOR VOUCHER NUMBER @AUTHOR:PRIYANKA-26JULY2022
        xmlhttp.open("GET", "include/php/omStockManagementByCounter.php?searchProductPreId=" + searchItemIdCharPart +
                "&searchProductPostId=" + searchItemIdNumPart + "&userId=" + userId + "&custId=" + userId +
                "&autoEntry=" + autoEntryValue + "&transType=" + transType +
                "&transactionType=" + transType + "&indicator=" + indicator +
                "&productCounter=" + productCounter +
                "&selectedStaff=" + selectedStaff + "&selectedFirm=" + selectedFirm +
                "&preVoucherNo=" + preVoucherNo + "&postVoucherNo=" + postVoucherNo, true);

        xmlhttp.send();
    } else {
        return false;
    }
}
//
//
// MODIFIED FUNCTION FOR VOUCHER NUMBER PARAMETERS @AUTHOR:PRIYANKA-29JULY2022
function showProductDetailsDivForStockManagementByCounter(srchItemPreId, srchItemPostId, userId, panelName, transType, indicator, productCounter, selectedStaff, selectedFirm, preVoucherNo, postVoucherNo) {
    //
    //alert('panelName == ' + panelName);
    //alert('preVoucherNo == ' + preVoucherNo);
    //alert('postVoucherNo == ' + postVoucherNo);
    //
    if (!selectedFirm) {
        alert('Please select a firm.');
        document.getElementById('FirmName').focus();
        return;
    }
    //
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockManagementByCounterMainDiv").innerHTML = xmlhttp.responseText;
            if (document.getElementById("transferstockthroughcsvfilemaindiv").style.display = "none") {
                document.getElementById("transferstockthroughcsvfilemaindiv").style.display = "block";
            }
            showTransferData(selectedFirm);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    if (panelName == 'stockTransferHistoryPanel') {
        //
        xmlhttp.open("POST", "include/php/omStockTransferHistory.php?searchProductPreId=" + srchItemPreId +
                "&searchProductPostId=" + srchItemPostId + "&userId=" + userId + "&custId=" + userId +
                "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
                "&indicator=" + indicator +
                "&preVoucherNo=" + preVoucherNo + "&postVoucherNo=" + postVoucherNo, true);
        //
    } else {
        //
        xmlhttp.open("POST", "include/php/omStockManagementByCounter.php?searchProductPreId=" + srchItemPreId +
                "&searchProductPostId=" + srchItemPostId + "&userId=" + userId + "&custId=" + userId +
                "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
                "&indicator=" + indicator + "&productCounter=" + productCounter +
                "&selectedStaff=" + selectedStaff + "&selectedFirm=" + selectedFirm +
                "&preVoucherNo=" + preVoucherNo + "&postVoucherNo=" + postVoucherNo, true);
        //
    }
    //
    xmlhttp.send();
    //
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE FOR STOCK MANAGEMENT BY COUNTER SEARCH PANEL @AUTHOR:PRIYANKA-25NOV2021 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
// START CODE STOCK TRANSFER PANEL FUNCTIONS @AUTHOR:DNYANESHWARI 21AUG2024
function stockTransManagementByCsvFile(panel, sttranspPreVoucherNo, sttransPostVoucherNo, productCode, selectedFirm, preVoucherNo, postVoucherNo) {
//    alert('panel==>'+panel);
    const firm = document.getElementById('selectedFirm').value;
    const fileInput = document.getElementById('CVSFile');
    //
    const formData = new FormData();
    if (panel == 'sendData') {
//        formData.append('arraySttrId', arraySttrId);
        formData.append('checkPanelName', panel);
        formData.append('sttranspPreVoucherNo', sttranspPreVoucherNo);
        formData.append('sttransPostVoucherNo', sttransPostVoucherNo);
    } else if (panel == 'singleStockTransfer') {
        if (!selectedFirm) {
            alert('Please select a firm.');
            document.getElementById('FirmName').focus();
            return;
        }
        formData.append('checkPanelName', panel);
        formData.append('productCode', productCode);
        formData.append('selectedFirm', selectedFirm);
        formData.append('postVoucherNo', postVoucherNo);
        formData.append('preVoucherNo', preVoucherNo);
        // 
    } else {
        if (!firm) {
            alert('Please select a firm.');
            fileInput.value = '';
            document.getElementById('FirmName').focus();
            return;
        }
        //
        const fileInput1 = document.getElementById('CVSFile');
        if (fileInput1.files.length > 0) {
            formData.append('CVSFile', fileInput1.files[0]);
        }
        formData.append('selectedFirm', document.getElementById('selectedFirm').value);
        formData.append('postVoucherNo', document.getElementById('postVoucherNo').value);
        formData.append('preVoucherNo', document.getElementById('preVoucherNo').value);
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            fileInput.value = '';
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (document.getElementById("transferstockthroughcsvfilemaindiv").style.display = "none") {
                document.getElementById("transferstockthroughcsvfilemaindiv").style.display = "block";
            }
            if (selectedFirm == '' || selectedFirm == undefined) {
                selectedFirm = document.getElementById('selectedFirm').value;
            }
            showTransferData(selectedFirm);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omtransferstockfile.php", true);
    //
    xmlhttp.send(formData);
}
//
let flage = false;
function showdivhide() {
    $("#transferstockthroughcsvfilemaindiv").toggle();
    if ($("#transferstockthroughcsvfilemaindiv").is(":visible")) {
//                console.log("The div is visible.");
        flage = true;
    } else {
        flage = false;
    }
}
//
function  showTransferData(selectedFirm, stTransId, operation, sttransPreVoucherNo, sttransVoucherNo) {
//    alert('selectedFirm==>'+selectedFirm);
//     alert('postVoucherNo==>'+postVoucherNo);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("transferstockdiv").innerHTML = xmlhttp.responseText;
            if (flage) {
                $("#transferstockthroughcsvfilemaindiv").css("display", "block");
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omtransferpendingstocktbl.php?selectedFirm=" + selectedFirm + "&stTransId=" + stTransId + "&operation=" + operation + "&sttransPreVoucherNo=" + sttransPreVoucherNo + "&sttransVoucherNo=" + sttransVoucherNo, true);
    //
    xmlhttp.send();
}
//END CODE STOCK TRANSFER PANEL FUNCTIONS @AUTHOR:DNYANESHWARI 21AUG2024
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE STOCK TRANSFER PANEL FUNCTIONS @AUTHOR:PRIYANKA-09DEC2021
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function getStockTransferSelectedOptionsFunc(productCounter, selectedStaff, selectedFirm, stockTransferNavPanelName, preVoucherNo) {
    //
    //alert('productCounter == ' + productCounter);
    //alert('selectedStaff == ' + selectedStaff);
    //alert('selectedFirm == ' + selectedFirm);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockManagementByCounterMainDiv").innerHTML = xmlhttp.responseText;
            showTransferData(selectedFirm);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    if (stockTransferNavPanelName == 'stockTransferReportPanel') {
        //
        xmlhttp.open("POST", "include/php/omStockTransferReport.php?productCounter=" + productCounter +
                "&selectedStaff=" + selectedStaff + "&selectedFirm=" + selectedFirm +
                "&stockTransferNavPanelName=" + stockTransferNavPanelName, true);
        //
        xmlhttp.send();
        //
    } else {
        //
        xmlhttp.open("POST", "include/php/omStockManagementByCounter.php?productCounter=" + productCounter +
                "&selectedStaff=" + selectedStaff + "&selectedFirm=" + selectedFirm + "&preVoucherNo=" + preVoucherNo, true);
        //
        xmlhttp.send();
        //
    }
    //
    //
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE STOCK TRANSFER PANEL FUNCTIONS @AUTHOR:PRIYANKA-25NOV2021
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
// ****************************************************************************************
// START CODE FOR STOCK TRANSFER REPORT PANEL @AUTHOR:PRIYANKA-04DEC2021
// ****************************************************************************************
function searchStockTransferReportDetails(productCounter, selectedStaff, firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear) {
    //
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("stockManagementByCounterMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        xmlhttp.open("POST", "include/php/omStockTransferReport.php?productCounter=" + productCounter +
                "&selectedStaff=" + selectedStaff + "&firmId=" + firmId +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.send();
    }
}
// ****************************************************************************************
// END CODE FOR STOCK TRANSFER REPORT PANEL @AUTHOR:PRIYANKA-04DEC2021
// ****************************************************************************************
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE STOCK TRANSFER REPORT PANEL FUNCTIONS @AUTHOR:PRIYANKA-25NOV2021
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function getStockTransferReportSelectedOptionsFunc(productCounter, selectedStaff, selectedFirm, stockTransferNavPanelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear) {
    //
    //alert('productCounter == ' + productCounter);
    //alert('selectedStaff == ' + selectedStaff);
    //alert('selectedFirm == ' + selectedFirm);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockManagementByCounterMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    //
    var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
    var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
    //
    //
    if (stockTransferNavPanelName == 'stockTransferReportPanel') {
        //
        xmlhttp.open("POST", "include/php/omStockTransferReport.php?productCounter=" + productCounter +
                "&selectedStaff=" + selectedStaff + "&selectedFirm=" + selectedFirm +
                "&stockTransferNavPanelName=" + stockTransferNavPanelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        xmlhttp.send();
        //
    } else {
        //
        xmlhttp.open("POST", "include/php/omStockManagementByCounter.php?productCounter=" + productCounter +
                "&selectedStaff=" + selectedStaff + "&selectedFirm=" + selectedFirm, true);
        //
        xmlhttp.send();
        //
    }
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE STOCK TRANSFER REPORT PANEL FUNCTIONS @AUTHOR:PRIYANKA-25NOV2021
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR STOCK LEDGER SUMMARY PANEL BY PRODUCT TYPE @AUTHOR:PRIYANKA-11JAN2022
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function searchStockLedgerSummaryReportDetailsByProductType(firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, panelName, searchValueMetal, subPanelName) {
    //
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerSummary.php?firmId=" + firmId + "&panelName=" + panelName +
        //             "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        //
        xmlhttp.open("POST", "omStockLedgerSummary.php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&subPanelName=" + subPanelName +
                "&searchValueMetal=" + searchValueMetal + "&searchColumnMetal=sttr_metal_type", true);
        //
        xmlhttp.send();
        //
    }
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE FOR STOCK LEDGER SUMMARY PANEL BY PRODUCT TYPE @AUTHOR:PRIYANKA-11JAN2022
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR STOCK LEDGER STOCK MISMATCH FUNCTION @AUTHOR:PRIYANKA-20JAN2022
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function searchStockLedgerStockMismatchFunc(firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, panelName, searchValueMetal, subPanelName) {
    //
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerSummary.php?firmId=" + firmId + "&panelName=" + panelName +
        //             "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        //
        xmlhttp.open("POST", "omStockLedgerSummary.php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&subPanelName=" + subPanelName +
                "&searchValueMetal=" + searchValueMetal + "&searchColumnMetal=sttr_metal_type", true);
        //
        xmlhttp.send();
        //
    }
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE FOR STOCK LEDGER STOCK MISMATCH FUNCTION @AUTHOR:PRIYANKA-20JAN2022
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
//
//
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR STOCK LEDGER STOCK MISMATCH IFRAME POP UP @AUTHOR:PRIYANKA-21JAN2022
// ********************************************************************************************************************
function updateStockMismatchTransactionsPopUp(sttrId, transStockType, transFirmId, transPanelDetailsDisplay, transCategory, transName, transPurity, transMetal, transIndicator, startDate, endDate, documentRoot, stockLedgerPanelName) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('transStockType == ' + transStockType);
    //alert('transFirmId == ' + transFirmId);
    //alert('transPanelDetailsDisplay == ' + transPanelDetailsDisplay);
    //alert('transCategory == ' + transCategory);
    //alert('transName == ' + transName);
    //alert('transPurity == ' + transPurity);
    //alert('transMetal == ' + transMetal);
    //alert('transIndicator == ' + transIndicator);    
    //alert('startDate == ' + startDate);
    //alert('endDate == ' + endDate);
    //alert('documentRoot == ' + documentRoot);
    //alert('stockLedgerPanelName == ' + stockLedgerPanelName);    
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //
            //document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
            //           
            document.getElementById('headerTable').style.display = "none";
            document.getElementById('myModalStockMismatch').style.display = "block";
            document.getElementById('myModalStockMismatch').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    //
    xmlhttp.open("GET", documentRoot + "/include/php/omStockMismatchTransactionsPopUpIframe.php?startDate=" + startDate +
            "&endDate=" + endDate + "&transMetal=" + transMetal + "&transIndicator=" + transIndicator +
            "&transFirmId=" + transFirmId + "&transCategory=" + transCategory +
            "&transName=" + transName + "&transStockType=" + transStockType +
            "&transPurity=" + transPurity + "&transPanelDetailsDisplay=" + transPanelDetailsDisplay +
            "&documentRoot=" + documentRoot + "&sttrId=" + sttrId + "&stockLedgerPanelName=" + stockLedgerPanelName, true);
    //
    xmlhttp.send();
    //
}
// ********************************************************************************************************************
// END CODE FOR NEW FUNCTION FOR STOCK LEDGER STOCK MISMATCH IFRAME POP UP @AUTHOR:PRIYANKA-21JAN2022
// ********************************************************************************************************************
//
//
//
//
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR STOCK LEDGER STOCK MISMATCH IFRAME POP UP CLOSE @AUTHOR:PRIYANKA-21JAN2022
// ********************************************************************************************************************
function closeStockMismatchTransactionsPopUp() {
    //
    document.getElementById('myModalStockMismatch').style.display = "none";
    document.getElementById('headerTable').style.display = "block";
    //
}
// ********************************************************************************************************************
// END CODE FOR NEW FUNCTION FOR STOCK LEDGER STOCK MISMATCH IFRAME POP UP CLOSE @AUTHOR:PRIYANKA-21JAN2022
// ********************************************************************************************************************
//
//
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR STOCK LEDGER SUMMARY PANEL DELETED STOCK LIST BUTTON @PRIYANKA-07FEB2022 
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
function searchStockLedgerSummarySubPanel(firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, panelName, searchValueMetal, subPanelName) {
    //
    if (valStockReportInputs()) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
        //
        //
        //xmlhttp.open("POST", "include/php/omStockLedgerSummary.php?firmId=" + firmId + "&panelName=" + panelName +
        //             "&FromDate=" + FromDate + "&ToDate=" + ToDate, true);
        //
        //
        xmlhttp.open("POST", "omStockLedgerStockMismatch.php?firmId=" + firmId + "&panelName=" + panelName +
                "&FromDate=" + FromDate + "&ToDate=" + ToDate + "&subPanelName=" + subPanelName +
                "&searchValueMetal=" + searchValueMetal + "&searchColumnMetal=sttr_metal_type", true);
        //
        xmlhttp.send();
        //
    }
}
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE FOR STOCK LEDGER SUMMARY PANEL DELETED STOCK LIST BUTTON @PRIYANKA-07FEB2022
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
//
//
//**************************************************************************************
// START CODE FOR STOCK RECREATION FUNCTION @PRIYANKA-11FEB2022
//**************************************************************************************
function stockMismatchStockRecreationFunc(productId, transFirmId, subPanelName) {
    //
    confirm_box = confirm("\n\nDo you really want to recreate this stock?");
    //
    if (confirm_box == true) {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById('stockRecreationDiv').innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("GET", "omStockMismatchStockRecreationMain.php?productId=" + productId +
                "&subPanelName=" + subPanelName + "&transFirmId=" + transFirmId, true);
        //
        xmlhttp.send();
        //
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    }
}
//**************************************************************************************
// END CODE FOR STOCK RECREATION FUNCTION @PRIYANKA-11FEB2022
//**************************************************************************************
//
//
//
//
// *******************************************************************************************************
// START CODE FOR SEARCH ALL STOCK LEDGER SUMMARY REPORT PANEL DETAILS @AUTHOR:PRIYANKA-21FEB2022
// *******************************************************************************************************
function searchStockLedgerAllSummaryReportDetailsByColumn(
    firmId, panelName, fromDay, fromMonth, fromYear, toDay, toMonth, toYear,
    searchColumnMetal, searchValueMetal,
    searchColumnCategory, searchValueCategory,
    searchColumnName, searchValueName,
    searchColumnTypee, searchValueTypee,   // Newly added
    searchColumnPurity, searchValuePurity  // Newly added
) {
    if (valStockReportInputs()) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("StockReportLedgerPanelMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };

        var FromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
        var ToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;

        var requestUrl = "omStockLedgerSummary" + default_theme + ".php?" +
            "firmId=" + encodeURIComponent(firmId) +
            "&panelName=" + encodeURIComponent(panelName) +
            "&FromDate=" + encodeURIComponent(FromDate) +
            "&ToDate=" + encodeURIComponent(ToDate) +
            "&searchColumnMetal=" + encodeURIComponent(searchColumnMetal) +
            "&searchValueMetal=" + encodeURIComponent(searchValueMetal) +
            "&searchColumnCategory=" + encodeURIComponent(searchColumnCategory) +
            "&searchValueCategory=" + encodeURIComponent(searchValueCategory) +
            "&searchColumnName=" + encodeURIComponent(searchColumnName) +
            "&searchValueName=" + encodeURIComponent(searchValueName);

        // Append new params only if values are provided
        if (searchColumnTypee && searchValueTypee) {
            requestUrl += "&searchColumnTypee=" + encodeURIComponent(searchColumnTypee) +
                          "&searchValueTypee=" + encodeURIComponent(searchValueTypee);
        }

        if (searchColumnPurity && searchValuePurity) {
            requestUrl += "&searchColumnPurity=" + encodeURIComponent(searchColumnPurity) +
                          "&searchValuePurity=" + encodeURIComponent(searchValuePurity);
        }

        xmlhttp.open("POST", requestUrl, true);
        xmlhttp.send();
    }
}
// *******************************************************************************************************
// END CODE FOR SEARCH All STOCK LEDGER SUMMARY REPORT PANEL DETAILS @AUTHOR:PRIYANKA-21FEB2022
// *******************************************************************************************************
//
//
//
//
// ********************************************************************************************************************
// START CODE FOR NEW FUNCTION FOR STOCK COUNTER ALL TRANSACTIONS REPORT IFRAME POP UP @AUTHOR:PRIYANKA-21FEB2022
// ********************************************************************************************************************
function getStockCounterTransactionsReportPopUp(sttrId, transStockType, transFirmId, transPanelDetailsDisplay, transCategory, transName, transPurity, transMetal, transIndicator, startDate, endDate, documentRoot, stockLedgerPanelName) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('transStockType == ' + transStockType);
    //alert('transFirmId == ' + transFirmId);
    //alert('transPanelDetailsDisplay == ' + transPanelDetailsDisplay);
    //alert('transCategory == ' + transCategory);
    //alert('transName == ' + transName);
    //alert('transPurity == ' + transPurity);
    //alert('transMetal == ' + transMetal);
    //alert('transCounterName == ' + transCounterName);    
    //alert('startDate == ' + startDate);
    //alert('endDate == ' + endDate);
    //alert('documentRoot == ' + documentRoot);
    //alert('stockLedgerPanelName == ' + stockLedgerPanelName);    
    //
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
    //
    xmlhttp.open("GET", documentRoot + "/include/php/omStockLedgerSummaryTransReportPopUpIframe.php?startDate=" + startDate +
            "&endDate=" + endDate + "&transMetal=" + transMetal + "&transIndicator=" + transIndicator +
            "&counterPanelName=StockCounterReportPanel" +
            "&transFirmId=" + transFirmId + "&transCategory=" + transCategory +
            "&transName=" + transName + "&transStockType=" + transStockType +
            "&transPurity=" + transPurity + "&transPanelDetailsDisplay=" + transPanelDetailsDisplay +
            "&documentRoot=" + documentRoot + "&sttrId=" + sttrId + "&stockLedgerPanelName=" + stockLedgerPanelName, true);
    //
    xmlhttp.send();
    //
}
// ********************************************************************************************************************
// END CODE FOR NEW FUNCTION FOR STOCK COUNTER ALL TRANSACTIONS REPORT IFRAME POP UP @AUTHOR:PRIYANKA-21FEB2022
// ********************************************************************************************************************
//
//
//
//
//********************************************************************************************************/
// START CODE TO MOVE TO READY REPAIR ORDERS FUNCTION @PRIYANKA-04MAR2022
//********************************************************************************************************/
function moveToReadyRepairOrderFunc(sttrOrderId, sttrOrderPreInvoiceNo, sttrOrderInvoiceNo, sttrOrderUserId, userId, readyOrderPanelName, sttrOrderTransId) {
    //
    //alert('sttrOrderId == ' + sttrOrderId);
    //alert('sttrOrderTransId == ' + sttrOrderTransId);
    //alert('sttrOrderPreInvoiceNo == ' + sttrOrderPreInvoiceNo);
    //alert('sttrOrderInvoiceNo == ' + sttrOrderInvoiceNo); 
    //alert('userId == ' + userId);
    //alert('readyOrderPanelName == ' + readyOrderPanelName);
    //
    confirm_box = confirm("Do you really want to Move this Order to Ready Orders!");
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
        //
        xmlhttp.open("POST", "include/php/omRepairNewItemList.php?sttrOrderId=" + sttrOrderId +
                "&panelName=RepairNewItemList" +
                "&indicator=stock" + "&stockType=wholesale" +
                "&transactionType=RepairItem" + "&operation=insert" + "&formName=RepairNewItemList" +
                "&mainPanel=Customer" + "&divName=cust_middle_body" + "&mainUserPanel=Customer" +
                "&userId=" + userId + "&custId=" + userId +
                "&sttrOrderPreInvoiceNo=" + sttrOrderPreInvoiceNo +
                "&sttrOrderInvoiceNo=" + sttrOrderInvoiceNo +
                "&readyOrderPanelName=" + readyOrderPanelName +
                "&sttrOrderUserId=" + sttrOrderUserId +
                "&sttrOrderTransId=" + sttrOrderTransId, true);
        //
        xmlhttp.send();
        //
    }
}
//
//
//********************************************************************************************************************************************/
// END CODE TO MOVE TO READY REPAIR ORDERS FUNCTION @PRIYANKA-04MAR2022
//********************************************************************************************************************************************/
//
//
//
//
//********************************************************************************************************/
// START CODE TO RETURN REPAIR ORDERS ASSIGN FUNCTION @AUTHOR:PRIYANKA-04MAR2022
//********************************************************************************************************/
function returnRepairOrderAssignFunction(sttrId, userId, sttrAssignPreInvoiceNo, sttrAssignInvoiceNo, ReturnOrderAssignPanelName, transMainId) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('utinId == ' + utinId);
    //alert('userId == ' + userId);
    //alert('ReturnOrderAssignPanelName == ' + ReturnOrderAssignPanelName); 
    //
    confirm_box = confirm("Do you really want to Return this Order!");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("SuppMetalItemListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("POST", "include/php/omRepairOrderReturnOrder.php?sttrMainOrderId=" + sttrId +
                "&panelName=SELL" + "&indicator=rawMetal" + "&type=rawMetal" +
                "&transactionType=SELL" + "&operation=insert" + "&formName=SELL" +
                "&mainPanel=Customer" + "&divName=cust_middle_body" + "&mainUserPanel=Customer" +
                "&userId=" + userId + "&custId=" + userId +
                "&sttrAssignPreInvoiceNo=" + sttrAssignPreInvoiceNo +
                "&sttrAssignInvoiceNo=" + sttrAssignInvoiceNo +
                "&ReturnOrderAssignPanelName=" + ReturnOrderAssignPanelName, true);
        //
        xmlhttp.send();
        //
    }
}
//
//
//********************************************************************************************************************************************/
// END CODE TO RETURN OREPAIR RDERS ASSIGN FUNCTION @AUTHOR:PRIYANKA-04MAR2022
//********************************************************************************************************************************************/
//
//
//
//
//********************************************************************************************************/
// START CODE TO REPAIR ORDER ASSIGN ORDERS @PRIYANKA-08MAR2022
//********************************************************************************************************/
function repairOrderAssignOrderFunc(sttrId, utinId, userId, repairOrderAssignUserId, RepairPanelName, transMainId) {
    //
    //alert('sttrId == ' + sttrId);
    //alert('utinId == ' + utinId);
    //alert('userId == ' + userId);
    //alert('repairOrderAssignUserId == ' + repairOrderAssignUserId); 
    //
    confirm_box = confirm("Do you really want to Assign this Order!");
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
        //
        xmlhttp.open("POST", "include/php/omRepairNewItemList.php?sttrId=" + sttrId +
                "&utinId=" + utinId +
                "&panelName=RepairNewItemList" + "&transMainId=" + transMainId +
                "&indicator=stock" + "&stockType=wholesale" +
                "&transactionType=RepairItem" + "&operation=insert" +
                "&formName=RepairNewItemList" +
                "&mainPanel=ItemRepair" + "&divName=cust_middle_body" +
                "&mainUserPanel=ItemRepair" +
                "&userId=" + userId + "&repairOrderAssignUserId=" + repairOrderAssignUserId +
                "&custId=" + userId + "&RepairPanelName=" + RepairPanelName, true);
        //
        xmlhttp.send();
        //
    }
}
//
//
//********************************************************************************************************************************************/
// END CODE TO REPAIR ORDER ASSIGN ORDERS @PRIYANKA-08MAR2022
//********************************************************************************************************************************************/
//
//xxxxxxxxxxxxxxxxxxxxxxxx  START ADD THIS FUNCTION FOR HALLMARKING 17012023 xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function showProductDetailsDivForReceivedStockHallMarkingSecPopup(prodCode, userId, panelName, transType, indicator, documentRoot) {
    //
//    alert(prodCode);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('mainStockReturnDivByExl' + prodCode).innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    // C:\Project\OMUNIM_2.7.68_SVN_COMP_SW\htdocs\omunim\2\include\php\omCustHallMarkingReturn.php
    xmlhttp.open("POST", "omCustHallMarkingReturn.php?prodCode=" + prodCode +
            "&userId=" + userId + "&custId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&indicator=" + indicator + "&documentRoot=" + documentRoot, true);
    //

    //
    xmlhttp.send();
    //
}

function showProductDetailsDivForReceivedStockHallMarkingSecDiv(prodCode, userId, panelName, transType, indicator, documentRoot) {
    //
//    var firstChar = srchItemPreId.charAt(0);
//    var res = firstChar.toUpperCase();
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalReceiveStock').style.display = "block";
            document.getElementById('myModalReceiveStock').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "omCustHallMarkingReceiveStockPopUpIframe.php?prodCode=" + prodCode +
            "&prodCode=" + prodCode + "&userId=" + userId + "&custId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&indicator=" + indicator + "&documentRoot=" + documentRoot, true);
    //
    xmlhttp.send();
    //
}

//=======================================================================================
//=======================================================================================
//=======================================================================================

function showProductDetailsDivForReceivedStockHallMarkingNewDivExcle(prodCode, srchItemPostId, userId, panelName, transType, indicator, documentRoot) {
    //
//    var firstChar = srchItemPreId.charAt(0);
//    var res = firstChar.toUpperCase();
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalReceiveStock').style.display = "block";
            document.getElementById('myModalReceiveStock').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omCustHallMarkingReceiveStockPopUpIframe.php?prodCode=" + prodCode +
            "&userId=" + userId + "&custId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&indicator=" + indicator + "&documentRoot=" + documentRoot, true);
    //
    xmlhttp.send();
    //
}


function showProductDetailsDivForReceivedStockHallMarkingSecDiv(prodCode, userId, panelName, transType, indicator, documentRoot, counter) {
    //
    var confirm_box = confirm("Are you sure Update this " + prodCode + "Product ?");

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //
            if (confirm_box == true) {
                document.getElementById('prodId').value = prodCode;
                document.getElementById('myModalReceiveStockExcleReport').innerHTML = xmlhttp.responseText;
                alert(document.getElementById('prodId').value);
            } else { // if false
                document.getElementById('mcx-live-rate-modal' + counter).style.display = 'none';
                document.getElementById('prodId').value = '';
            }
//
            return false;

        } else {
//           document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "omHallMarkingStockReturnImportFileWithPopup.php?prodCode=" + prodCode +
            "&userId=" + userId + "&custId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&indicator=" + indicator + "&documentRoot=" + documentRoot + "&rowsCounter=" + counter, true);
    //
    xmlhttp.send();
    //
}

//
function closeReceivedStockHallmarkingPopUpForExcel(userId) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainStockReturnDiv").innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "omCustHallMarkingReturn.php?userId=" + userId + "&custId=" + userId +
            "&transType=EXISTING" + "&transactionType=EXISTING" + "&formName=receiveStockWithHallmarking" +
            "&panelName=receiveStockWithHallmarking" + "&type=stock" + "&indicator=stock" +
            "&divName=cust_middle_body", true);
    //
    xmlhttp.send();
    //    
}
//
function showProductDetailsDivReceiHMExcel(srchItemPreId, srchItemPostId, userId, panelName, transType, indicator, documentRoot, srchPrevPreId, srchPrevPostId, hallmarkreturnupdatestatus) {
    //
//    alert("searchProductPreId=" + srchItemPreId +
//            "&searchProductPostId=" + srchItemPostId + "&userId=" + userId + "&custId=" + userId +
//            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
//            "&indicator=" + indicator + "&documentRoot=" + documentRoot + "&excelstockpopup='YES'" 
//            + "&srchPrevPreId=" + srchPrevPreId +
//            "&srchPrevPostId=" + srchPrevPostId +
//            "&hallmarkreturnupdatestatus=" + hallmarkreturnupdatestatus);
    var firstChar = srchItemPreId.charAt(0);
    var res = firstChar.toUpperCase();
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModalReceiveStock').style.display = "block";
            document.getElementById("myModalReceiveStock").innerHTML.reload;
//            document.getElementById("receivedStockHallMarkingPopUpIframe").innerHTML.reload;
            document.getElementById('myModalReceiveStock').innerHTML = xmlhttp.responseText;

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    //
    xmlhttp.open("POST", documentRoot + "/include/php/omCustHallMarkingReceiveStockPopUpIframe.php?searchProductPreId=" + srchItemPreId +
            "&searchProductPostId=" + srchItemPostId + "&userId=" + userId + "&custId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&indicator=" + indicator + "&documentRoot=" + documentRoot + "&excelstockpopup='YES'"
            + "&srchPrevPreId=" + srchPrevPreId +
            "&srchPrevPostId=" + srchPrevPostId +
            "&hallmarkreturnupdatestatus=" + hallmarkreturnupdatestatus, true);
    //
    xmlhttp.send();
    //
}
//
function showNextProductDetailsDivReceiHMExcel(srchItemPreId, srchItemPostId, userId, panelName, transType, indicator, documentRoot) {
    //
//      alert('documentRoot:-' + documentRoot);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById('myModalReceiveStock').style.display = "none";
            document.getElementById('myModalReceiveStock').style.display = "block";
            document.getElementById('myModalReceiveStock').innerHTML = xmlhttp.responseText;
        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//
//    alert("searchProductPreId=" + srchItemPreId +
//            "&searchProductPostId=" + srchItemPostId + "&userId=" + userId + "&custId=" + userId +
//            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
//            "&indicator=" + indicator + "&documentRoot=" + documentRoot);
// omCustHallMarkingReceivedStockPopUp
    xmlhttp.open("POST", documentRoot + "/include/php/omCustHallMarkingReceivedStockPopUp.php?searchProductPreId=" + srchItemPreId +
            "&searchProductPostId=" + srchItemPostId + "&userId=" + userId + "&custId=" + userId +
            "&panelName=" + panelName + "&transType=" + transType + "&transactionType=" + transType +
            "&indicator=" + indicator + "&documentRoot=" + documentRoot + "&excelstockpopup='YES'", true);
//
    xmlhttp.send();
    //
}



function nextCloseReceivedStockHallmarkingPopUp(userId) {
    // myModalReceiveStock 
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainStockReturnDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "omCustHallMarkingReturn.php?userId=" + userId + "&custId=" + userId +
            "&transType=EXISTING" + "&transactionType=EXISTING" + "&formName=receiveStockWithHallmarking" +
            "&panelName=receiveStockWithHallmarking" + "&type=stock" + "&indicator=stock" +
            "&divName=cust_middle_body", true);
    //
    xmlhttp.send();
    //    
}
//xxxxxxxxxxxxxxxxxxxxxxxx  END ADD THIS FUNCTION FOR HALLMARKING 17012023 xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
function loadImageForPRNFileFromTagPanelRang(jsondata, rootpath, panel = null) {
//    alert('innnn');
    let result = jsondata.split("|");
    //console.log(result);

    let index = 0;
    function processNext() {
        if (index >= result.length) {
            return;
        }
        let strid = result[index];
        index++;
        setTimeout(function () {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    parent.location = 'localexplorer:C:/OMPRN/omprn.bat';
                }
            };
            if (panel == 'Items55x13IMBarCodePanel') {
                xmlhttp.open(
                        "GET",
                        "ogibbc55x13imi.php?sttrId=" + strid + "&panel=Items55x13IMBarCodePanel&printOption=directPRNPrint",
                        true
                        );
            } else {
                xmlhttp.open(
                        "GET",
                        "ogibbc55x13.php?sttrId=" + strid + "&panel=Items55x13BarCodePanel&printOption=directPRNPrint",
                        true
                        );
            }
            xmlhttp.send();
            processNext();
        }, 2000);
    }

    processNext(); // Start the recursive loop
    return true;
}
function exportDivTablesToExcel(divId) {
    const div = document.getElementById(divId);
    const tables = div.getElementsByTagName("table");
    const data = [];
    const rowSet = new Set(); // To track unique rows
    var Varcount=true;
    function extractTableData(tableElement,count) {
        const rows = tableElement.rows;
        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].cells;
            const rowData = [];
            let isRowEmpty = true;
            let colIndex = 0; // To track the current column index
            for (let j = 0; j < cells.length; j++) {
                const cell = cells[j];

                // Handle `colspan`
                const colspan = cell.colSpan || 1;
                const cellValue = cell.innerText.trim();

                // Skip cells with value "150" and column text length of 150
                if (cellValue.length >= 150) {
                    continue;
        }

                if (cellValue) {
                    isRowEmpty = false;
    }

                // Fill the columns affected by `colspan`
                for (let k = 0; k < colspan; k++) {
                    if (k === 0) {
                        rowData[colIndex] = cellValue; // Store data in the first column
                    } else {
                        rowData[colIndex] = ""; // Leave other columns blank
}
                    colIndex++;
                }
            }

            if (!isRowEmpty) {
                const rowString = rowData.join("|"); // Use as unique identifier
                if (!rowSet.has(rowString)) {
                    rowSet.add(rowString);
                    data.push(rowData);
                    data.push([]); // Add a blank row after each valid row
        }
            }
        }
    }

    // Process each table in the div
   let count =0;
    for (let table of tables) {
      
        extractTableData(table,count);
         count++;
    }
    if (data.length > 6) {
        data.splice(6, 1); // Delete the 4th row
        }
    // Convert to Excel
    const ws = XLSX.utils.aoa_to_sheet(data);
    const wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

    // Export
    XLSX.writeFile(wb, "tables_data.xlsx");
}
//
//
var multiRFIDPrintGlobalCounter = 0;
var callRFIDPrintCounter = [];
var xmlhttpRFIDPrintArr = [];
function rfidStockPrintOneByOneInOneShot(jsondata) {
//
    let result = jsondata.split("|");
    //
    let index = 0;
    function processNext() {
        if (index >= result.length) {
            return;
        }
        let strid = result[index];
        index++;
        setTimeout(function () {
            rfidStockPrintOneByOneInOneShotWaitFunc(index, strid);
            processNext();
        }, 4000);
        //console.log("Index1:" + index + "   Sttr Id:" + strid);
    }

    processNext(); // Start the recursive loop
    return true;
    //
}

function rfidStockPrintOneByOneInOneShotWaitFunc(multiBarcodeCounter, strid) {
    //
    var callCounterNum;
    if (multiBarcodeCounter > 0)
        callCounterNum = parseInt(multiBarcodeCounter) - 1;
    else
        callCounterNum = 0;
    //
    //
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        xmlhttpRFIDPrintArr[multiBarcodeCounter] = new XMLHttpRequest();
        if (xmlhttpRFIDPrintArr[multiBarcodeCounter].overrideMimeType) {
            // set type accordingly to anticipated content type
            xmlhttpRFIDPrintArr[multiBarcodeCounter].overrideMimeType('text/html');
        }
    } else if (window.ActiveXObject) { // IE
        try {
            xmlhttpRFIDPrintArr[multiBarcodeCounter] = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlhttpRFIDPrintArr[multiBarcodeCounter] = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
            }
        }
    }
    if (!xmlhttpRFIDPrintArr[multiBarcodeCounter]) {
        alert('Cannot create XMLHTTP instance');
        return false;
    }
    xmlhttpRFIDPrintArr[multiBarcodeCounter].onreadystatechange = function () {
        if (xmlhttpRFIDPrintArr[multiBarcodeCounter].readyState == 4 && xmlhttpRFIDPrintArr[multiBarcodeCounter].status == 200) {
            parent.location = 'localexplorer:C:/OMPRN/omprn.bat';
            //console.log("IndexMain:" + multiBarcodeCounter + "   Sttr Id:" + strid);
        }
    };
    //
    xmlhttpRFIDPrintArr[multiBarcodeCounter].open("POST", "ogibbc55x13.php?sttrId=" + strid + "&panel=Items55x13BarCodePanel&printOption=directPRNPrint", true);
    xmlhttpRFIDPrintArr[multiBarcodeCounter].send();
    //
}
//EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
