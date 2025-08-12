/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// TO RESET METAL BALANCE ACCORDING TO METAL AMOUNT @PRIYANKA-23MAR18
var setAmtToMetCon;
////
// Payment options change function
function itemsaleRateCut(rateCutId, goldFinalWeight, goldFinalWeightType, silverFinalWeight, silverFinalWeightType, crystalFinalWeight, crystalFinalWeightType, goldPaidWeight, goldPaidWeightType, silverPaidWeight, silverPaidWeightType, crystalPaidWeight, crystalPaidWeighType, goldRate, silverRate, crystalRate, payPanelName, userId, preInvNo, invNo, crystalVal, payOpt, otherChags, otherChgsBy, totalFinalBalance, totGoldBal, totSilverBal, totCrystalBal, totalValuation, PaymentReceiptPanel, hallmarkChrgsAmt) {
    //
    //
//    alert('crystalPaidWeight=' + crystalPaidWeight);
    //alert('crystalPaidWeighType=' + crystalPaidWeighType);
    //
    document.getElementById('paymentMode').value = rateCutId;
    //
    // START CODE TO ADD CONDITION FOR GETTING FIRM ID TO PASS IN PAYMENT DETAIL FILE @AUTHOR:MADHUREE-13AUGUST2021
    //
    var firmId;
    if (typeof (document.getElementById('firmId')) != 'undefined' && document.getElementById('firmId') != null) {
        firmId = document.getElementById('firmId').value;
    } else {
        firmId = '';
    }
    //
    // END CODE TO ADD CONDITION FOR GETTING FIRM ID TO PASS IN PAYMENT DETAIL FILE @AUTHOR:MADHUREE-13AUGUST2021
    //
    var prefix = document.getElementById('prefix').value;
    var poststr = "paymentMode=" + encodeURIComponent(rateCutId) +
            "&goldPrevWeight=" + encodeURIComponent(document.getElementById(prefix + 'GoldWtPrevBal').value) +
            "&goldPrevWeightType=" + encodeURIComponent(document.getElementById(prefix + 'GoldWtPrevBalType').value) +
            "&silverPrevWeight=" + encodeURIComponent(document.getElementById(prefix + 'SilverWtPrevBal').value) +
            "&silverPrevWeightType=" + encodeURIComponent(document.getElementById(prefix + 'SilverWtPrevBalType').value) +
            "&goldFinalWeight=" + encodeURIComponent(goldFinalWeight) +
            "&silverFinalWeight=" + encodeURIComponent(silverFinalWeight) +
            "&goldFinalWeightType=" + encodeURIComponent(goldFinalWeightType) +
            "&silverFinalWeightType=" + encodeURIComponent(silverFinalWeightType) +
            "&silverPaidWeight=" + encodeURIComponent(silverPaidWeight) +
            "&goldPaidWeight=" + encodeURIComponent(goldPaidWeight) +
            "&silverPaidWeightType=" + encodeURIComponent(silverPaidWeightType) +
            "&goldPaidWeightType=" + encodeURIComponent(goldPaidWeightType) +
            "&goldRate=" + encodeURIComponent(goldRate) +
            "&silverRate=" + encodeURIComponent(silverRate) +
            "&payPanelName=" + encodeURIComponent(document.getElementById('payPanelName').value) +
            "&mainPanelName=" + encodeURIComponent(document.getElementById('mainPanelName').value) +
            "&transPanelName=" + encodeURIComponent(document.getElementById('transPanelName').value) +
            "&preInvId=" + encodeURIComponent(preInvNo) +
            "&invId=" + encodeURIComponent(invNo) +
            "&userId=" + encodeURIComponent(userId) +
            "&firmId=" + encodeURIComponent(firmId) + // FIRM ID ADDED @AUTHOR:MADHUREE-13AUGUST2021
            "&otherChags=" + encodeURIComponent(otherChags) +
            "&otherChgsBy=" + encodeURIComponent(otherChgsBy) +
            "&crystalVal=" + encodeURIComponent(crystalVal) +
            "&payOpt=" + encodeURIComponent(payOpt) +
            "&totalFinalBalance=" + encodeURIComponent(totalFinalBalance) +
            "&totalGoldBalance=" + encodeURIComponent(totGoldBal) +
            "&totalSilverBalance=" + encodeURIComponent(totSilverBal) +
            "&labOrMkgChgs=" + encodeURIComponent(document.getElementById(prefix + 'PayTotOthChgs').value) +
            "&totalTaxAmount=" + encodeURIComponent(document.getElementById(prefix + 'TaxAmt').value) +
            "&goldPurAvgRate=" + encodeURIComponent(document.getElementById(prefix + 'GoldPurRate').value) +
            "&prevAmtBalance=" + encodeURIComponent(document.getElementById(prefix + 'PayPrevTotAmt').value) +
            "&silverPurAvgRate=" + encodeURIComponent(document.getElementById(prefix + 'SilverPurRate').value) +
            "&metType=" + encodeURIComponent(document.getElementById(prefix + 'transactionMode').value) +
            "&totalValuation=" + encodeURIComponent(totalValuation) +
            "&mainPanelDiv=" + encodeURIComponent(document.getElementById(prefix + 'userMainPanel').value) +
            "&goldPrevWtCRDR=" + encodeURIComponent(document.getElementById(prefix + 'GoldWtPrevBalCRDR').value) +
            "&silverPrevWtCRDR=" + encodeURIComponent(document.getElementById(prefix + 'SilverWtPrevBalCRDR').value) +
            "&goldPrevCRWt=" + encodeURIComponent(document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value) +
            "&silverPrevCRWt=" + encodeURIComponent(document.getElementById(prefix + 'SilverWtPrevBalCRAmt').value) +
            "&goldPrevDRWt=" + encodeURIComponent(document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value) +
            "&silverPrevDRWt=" + encodeURIComponent(document.getElementById(prefix + 'SilverWtPrevBalDRAmt').value) +
            "&prevCashBalCRDR=" + encodeURIComponent(document.getElementById(prefix + 'PayPrevCashBalCRDR').value) +
            "&prevCashBalCRAmt=" + encodeURIComponent(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value) +
            "&accId=" + encodeURIComponent(document.getElementById(prefix + 'AccId').value) +
            "&prevCashBalDRAmt=" + encodeURIComponent(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value) +
            "&PrevTotOpeningAmt=" + encodeURIComponent(document.getElementById('PrevTotOpeningAmt').value) +
            "&PrevTotOpeningAmtCRDR=" + encodeURIComponent(document.getElementById('PrevTotOpeningAmtCRDR').value) +
            "&setByDefaultPaymentMode=" + encodeURIComponent(document.getElementById('setByDefaultPaymentMode').value) +
            "&assignPanelName=" + encodeURIComponent(document.getElementById('assignPanelName').value) +
            "&returnOrderPanelName=" + encodeURIComponent(document.getElementById('returnOrderPanelName').value) +
            "&PaymentReceiptPanel=" + encodeURIComponent(document.getElementById('PaymentReceiptPanel').value) +
            "&hallmarkChrgsAmt=" + encodeURIComponent(hallmarkChrgsAmt) +
            "&hallmarkChgs=" + encodeURIComponent(document.getElementById(prefix + 'PayTotHallmarkChgs').value) +
            "&crystalFinalWeight=" + encodeURIComponent(crystalFinalWeight) +
            "&crystalFinalWeightType=" + encodeURIComponent(crystalFinalWeightType) +
            "&crystalPaidWeight=" + encodeURIComponent(crystalPaidWeight) +
            "&crystalPaidWeighType=" + encodeURIComponent(crystalPaidWeighType) +
            "&crystalRate=" + encodeURIComponent(crystalRate) +
            "&totalCrystalBalance=" + encodeURIComponent(totCrystalBal) +
            "&crystalPrevWeight=" + encodeURIComponent(document.getElementById(prefix + 'CrystalWtPrevBal').value) +
            "&crystalPrevWeightType=" + encodeURIComponent(document.getElementById(prefix + 'CrystalWtPrevBalType').value) +
            "&crystalPurAvgRate=" + encodeURIComponent(document.getElementById(prefix + 'CrystalPurRate').value) +
            "&crystalPrevWtCRDR=" + encodeURIComponent(document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value) +
            "&crystalPrevCRWt=" + encodeURIComponent(document.getElementById(prefix + 'CrystalWtPrevBalCRAmt').value) +
            "&crystalPrevDRWt=" + encodeURIComponent(document.getElementById(prefix + 'CrystalWtPrevBalDRAmt').value) +
            "&utin_crystal_amtPP=" + encodeURIComponent(document.getElementById('utin_crystal_amtPP').value) +
            "&utin_crystal_amt_temp=" + encodeURIComponent(document.getElementById('utin_crystal_amt_temp').value);

//    alert('poststr==' + poststr);
    itemsale_rate_cut("include/php/ompaydet.php", poststr);
}
function itemsale_rate_cut(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertItemSaleRateCut;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

//Start Code To Add Additional Charges Account Change @Author: Vinod:15-03-2023
//
function changeAdditionalChgAcc(itemListDivToAddGirviSelect,prefix)
{
    if(prefix == 'stock'){
                if(itemListDivToAddGirviSelect=='minus')
             {
                 accName='Indirect Incomes';
             }else{
                 accName='Indirect Expenses';
             }
    }
 
    if(prefix != 'stock'){
        if(itemListDivToAddGirviSelect=='minus')
        {
            accName='Indirect Expenses';
        }else{
            accName='Indirect Incomes';
        }
    }

    var selectElement = document.getElementById('utin_additional_charges_acc_id');
    if (selectElement) {
        var options = selectElement.getElementsByTagName('option');
        for (var i = 0; i < options.length; i++) {
            opAccName=options[i].textContent.trim();
            if (opAccName == accName) {
                options[i].selected = true;
                break;
            }
        }
    }

}
//
//End Code To Add Additional Charges Account Change @Author: Vinod:15-03-2023

function alertItemSaleRateCut() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("rateCutDiv").innerHTML = xmlhttp.responseText;
        var prefix = document.getElementById('prefix').value;
        var metCount = 0;
        var metalVal = 0;
        if (document.getElementById("payPanelName").value == 'SlPrPayment' ||
                document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                document.getElementById("payPanelName").value == 'ApprovalPayment' ||
                document.getElementById("payPanelName").value == 'StockReturnPanel' ||
                document.getElementById("payPanelName").value == 'RawPayment' ||
                document.getElementById("payPanelName").value == 'ItemReturnPanel' ||
                document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                document.getElementById("payPanelName").value == 'StockPayment' ||
                document.getElementById("payPanelName").value == 'NwOrDelPayment' ||
                document.getElementById("payPanelName").value == 'CustSellPayment' ||
                document.getElementById("payPanelName").value == 'NwOrPayment' ||
                document.getElementById("payPanelName").value == 'SuppOrderDelivery' ||
                document.getElementById("payPanelName").value == 'SuppAddOrder' ||
                document.getElementById("payPanelName").value == 'NewOrderPayment' ||
                document.getElementById("payPanelName").value == 'CrySellPayment' ||
                document.getElementById("payPanelName").value == 'CrystalStockPayment') {
            metCount = getMetalDiv;
            metalVal = document.getElementById('sttr_valuation' + metCount).value;
        } else if (document.getElementById("payPanelName").value == 'SellPayUp' ||
                document.getElementById("payPanelName").value == 'ItemRepairPayUp' ||
                document.getElementById("payPanelName").value == 'ApprovalPayUp' ||
                document.getElementById("payPanelName").value == 'RawPayUp' ||
                document.getElementById("payPanelName").value == 'StockPayUp' ||
                document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
                document.getElementById("payPanelName").value == 'PurchaseReturnPayUp' ||
                document.getElementById("payPanelName").value == 'SuppOrderUp' ||
                document.getElementById("payPanelName").value == 'CustSellPayUp' ||
                document.getElementById("payPanelName").value == 'NwOrPayUp' ||
                document.getElementById("payPanelName").value == 'SuppOrderDeliveryUp' ||
                document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
                document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
                document.getElementById('payPanelName').value == 'CrySellPayUp' ||
                document.getElementById('payPanelName').value == 'CrystalStockPayUp') {
            metCount = document.getElementById("noOfRawMet").value;
            if (metCount > 0)
                metalVal = 1;
        }

        //alert('PayPrevCashBalCRDR == ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);  
        //alert('PaymentReceiptPanel == ' + document.getElementById('PaymentReceiptPanel').value); 
        //alert('paymentMode == ' + document.getElementById('paymentMode').value); 

        if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {

            if (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' &&
                    (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == '' ||
                            document.getElementById(prefix + 'PayPrevCashBalCRDR').value == null)) {
                document.getElementById(prefix + 'PayPrevCashBalCRDR').value = 'DR';

                if (document.getElementById('PrevTotOpeningAmtCRDR').value == '' ||
                        document.getElementById('PrevTotOpeningAmtCRDR').value == null) {
                    document.getElementById('PrevTotOpeningAmtCRDR').value = 'DR';
                }

            } else if (document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' &&
                    (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == '' ||
                            document.getElementById(prefix + 'PayPrevCashBalCRDR').value == null)) {
                document.getElementById(prefix + 'PayPrevCashBalCRDR').value = 'CR';

                if (document.getElementById('PrevTotOpeningAmtCRDR').value == '' ||
                        document.getElementById('PrevTotOpeningAmtCRDR').value == null) {
                    document.getElementById('PrevTotOpeningAmtCRDR').value = 'CR';
                }                
            }
        }

        //alert('PayPrevCashBalCRDR @@== ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);  

        //alert('MetalCount:' + metalVal);

        if (metCount > 0 && (metalVal != '' || metalVal != 0)) {
            calcStockItemBalance();
        } else if (document.getElementById("payPanelName").value != 'SchemePayment' && document.getElementById("payPanelName").value != 'SchemePayUp' &&
                document.getElementById("payPanelName").value != 'FINANCE_PAYMENT' && document.getElementById("payPanelName").value != 'financePayUp') {
            calcMetalRateCut(prefix);
        }
        //} else if (document.getElementById("payPanelName").value != 'FINANCE_PAYMENT' && document.getElementById("payPanelName").value != 'financePayUp') {
        //    calcMetalRateCut(prefix);
        //}

        //alert('PayPrevCashBalCRDR &&== ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value); 
        
        if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut')
            //alert('PayPrevCashBalCRDR %%== ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);  

            // CHANGE CODE FOR TAX CALCULATION AFTER RATE CUT @PRIYANKA-03MAY18

            // @PRIYANKA-20NOV2018
            if (document.getElementById('paymentMode').value == 'RateCut' &&
                    (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
                            document.getElementById('PaymentReceiptPanel').value == 'PAYMENT')) {
                resetChangeMetAmtCalcMetBal();
                calcWholeSaleRateCut(prefix);
                calcPaymentCashBalance(prefix);
                calcRawMetStock(prefix);
            } else {
                calcCashToMetal(prefix);
                calcWholeSaleRateCut(prefix);
                calcRawMetStock(prefix);
                calcPaymentCashBalance(prefix);
            }

        //alert('PayPrevCashBalCRDR ##== ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);  

//            if (document.getElementById('paymentMode').value == 'NoRateCut') {
//                // START @PRIYANKA-06APR18
//                   calcRawMetStock(prefix);
//                // END @PRIYANKA-06APR18
//            }

    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
//
//
var goldWtBal = 0;
var silverWtBal = 0;
var crystalWtBal = 0;
var GoldWtType = null;
var SilverWtType = null;
var CrystalWtType = null;
var stockDiv = null;
function calcStockItemBalance() {

//    alert('mm==' + document.getElementById('metalPanel').value);

    //alert('PayPrevCashBalCRDR %% ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);

    //alert('noOfRawMet == ' + document.getElementById('noOfRawMet').value);

    var metalEntered = 0;
    var metalCount = document.getElementById("metalCount").value;

    if (document.getElementById('metalPanel').value == 'SlPrPayment' ||
            document.getElementById('metalPanel').value == 'SellPayUp' ||
            document.getElementById('metalPanel').value == 'ApprovalPayment' ||
            document.getElementById('metalPanel').value == 'ApprovalPayUp') {
        prefix = 'slPr';
    } else if (document.getElementById('metalPanel').value == 'RawPayment' ||
            document.getElementById('metalPanel').value == 'RawPayUp') {
        prefix = 'rwPr';
    } else if (document.getElementById('metalPanel').value == 'StockPayment' ||
            document.getElementById('metalPanel').value == 'StockReturnPanel' ||
            document.getElementById('metalPanel').value == 'StockPayUp' ||
            document.getElementById("metalPanel").value == 'PurchaseReturnPanel' ||
            document.getElementById("metalPanel").value == 'PurchaseReturnPayUp' ||
            document.getElementById('metalPanel').value == 'CrystalStockPayment' ||
            document.getElementById('metalPanel').value == 'CrystalStockPayUp') {
        prefix = 'stock';
    } else if (document.getElementById('metalPanel').value == 'SuppUdhaDep') {
        var prefix = 'suppUdDp';
    } else if (document.getElementById('metalPanel').value == 'ItemRepairPayment' ||
            document.getElementById('metalPanel').value == 'ItemRepairPayUp') {
        var prefix = '';
    } else if (document.getElementById('metalPanel').value == 'CrySellPayment' ||
            document.getElementById('metalPanel').value == 'CrySellPayUp') {
        var prefix = '';
    }
    //CrystalStockPayment

    if (document.getElementById('metalPanel').value == 'NwOrPayment' ||
            document.getElementById('metalPanel').value == 'NwOrPayUp' ||
            document.getElementById("metalPanel").value == 'NewOrderPayment' ||
            document.getElementById("metalPanel").value == 'PendingOrderUpdate' ||
            document.getElementById("metalPanel").value == 'NewOrderPaymentUp') {
        prefix = 'nwOr';
    }

    if (document.getElementById('metalPanel').value == 'SlPrPayment' ||
            document.getElementById('metalPanel').value == 'ItemRepairPayment' ||
            document.getElementById('metalPanel').value == 'ApprovalPayment' ||
            document.getElementById('metalPanel').value == 'StockReturnPanel' ||
            document.getElementById('metalPanel').value == 'ItemReturnPanel' ||
            document.getElementById("metalPanel").value == 'PurchaseReturnPanel' ||
            document.getElementById('metalPanel').value == 'RawPayment' ||
            document.getElementById('metalPanel').value == 'StockPayment' ||
            document.getElementById('metalPanel').value == 'SuppUdhaDep' ||
            document.getElementById('metalPanel').value == 'NwOrPayment' ||
            document.getElementById('metalPanel').value == 'NewOrderPayment' ||
            document.getElementById('metalPanel').value == 'CrySellPayment' ||
            document.getElementById('metalPanel').value == 'CrystalStockPayment') {
        count = 1;
        delId = 'del' + 1;
    } else if (document.getElementById('metalPanel').value == 'SellPayUp' ||
            document.getElementById("metalPanel").value == 'ItemRepairPayUp' ||
            document.getElementById('metalPanel').value == 'ApprovalPayUp' ||
            document.getElementById('metalPanel').value == 'RawPayUp' ||
            document.getElementById('metalPanel').value == 'StockPayUp' ||
            document.getElementById('metalPanel').value == 'ItemReturnPayUp' ||
            document.getElementById("metalPanel").value == 'PurchaseReturnPayUp' ||
            document.getElementById('metalPanel').value == 'SuppPayUp' ||
            document.getElementById('metalPanel').value == 'NwOrPayUp' ||
            document.getElementById("metalPanel").value == 'PendingOrderUpdate' ||
            document.getElementById("metalPanel").value == 'NewOrderPaymentUp' ||
            document.getElementById('metalPanel').value == 'CrySellPayUp' ||
            document.getElementById('metalPanel').value == 'CrystalStockPayUp') {
        getMetalDiv = document.getElementById('noOfRawMet').value;
        var count = document.getElementById('rawId').value;
        var delId = 'del' + count;
    }  
    //
    if (document.getElementById('metalPanel').value == 'SlPrPayment') {
        getMetalDiv = document.getElementById('noOfRawMet').value; 
    }
    //
    var totAmtRec = 0;
    var gdBal = 0;
    var slBal = 0;
    var stBal = 0;
    var totRecGd = 0;
    var totRecSl = 0;
    var totRecSt = 0;
    var goldWeight = 0;
    var silverWeight = 0;
    var silverWeightType = '';
    var goldWeightType = '';
    var crystalWeightType = '';
    GoldWtType = '';
    SilverWtType = '';
    goldWtBal = 0;
    silverWtBal = 0;
    var totSilverAmt = 0;
    var totGoldAmt = 0;
    var totCrysAmt = 0;
    var goldPurRemWt = 0;
    var silverPurRemWt = 0;
    var crystalPurRemWt = 0;

    //alert('getMetalDiv @@== ' + getMetalDiv);
    //alert('metalCount @@== ' + document.getElementById("metalCount").value);

    //alert('prefix =1= ' + prefix);  

    //if (document.getElementById('prefix').value == 'undefined' || document.getElementById('prefix').value == 'NaN') {
    //    document.getElementById('prefix').value = null;
    //}

    //if (prefix == 'undefined' || prefix === 'NaN') {
    //    prefix = null;
    //}
//alert('dc' + dc);
//    alert('getMetalDiv =2= ' + getMetalDiv);  

    for (dc = getMetalDiv; dc > 0; dc--) {

        //alert(dc);
        //dc = getMetalDiv;        
        //alert('dc == ' + dc);       
        //alert('metalDel @@== ' + document.getElementById('metalDel' + dc).value);

        if (document.getElementById('metalDel' + dc).value != 'Deleted') {

            // START CODE FOR LESS WEIGHT FUNCTIONALITY ON METAL REC/PAID @PRIYANKA-16MAR2019
            var gsWt = document.getElementById('sttr_gs_weight' + dc).value;
            var gsWtType = document.getElementById('sttr_gs_weight_type' + dc).value;
            //
            if (gsWt == '' || gsWt == null) {
                gsWt = 0;
            }
            //
            var pktWt = document.getElementById('sttr_pkt_weight' + dc).value;
            var pktWtType = document.getElementById('sttr_pkt_weight_type' + dc).value;
            //
            //alert('pktWt - 1 == ' + pktWt);
            //
            if ((pktWt == '') || (pktWt == null) || (pktWt <= 0) || (document.getElementById('sttr_pkt_weight' + dc).value != document.getElementById('sttr_pkt_wt_hidden' + dc).value)) {
                var pktWt = document.getElementById('sttr_pkt_wt_hidden' + dc).value;
            }
            //
            //alert('pktWt - 2 == ' + pktWt);
            //
            if (pktWt == '' || pktWt == null) {
                pktWt = 0;
            }
            //
            //alert('pktWt - 3 == ' + pktWt);
            //
            var finalNetWeight = parseFloat(parseFloat(gsWt) - convertWeight(pktWt, gsWtType, pktWtType)).toFixed(3);
            //
            if (finalNetWeight != '' && finalNetWeight != null && finalNetWeight != 'NaN') {
                document.getElementById('sttr_nt_weight' + dc).value = parseFloat(finalNetWeight).toFixed(3);
            }
            //
            document.getElementById('sttr_gs_weight' + dc).value = parseFloat(gsWt).toFixed(3);
            document.getElementById('sttr_pkt_weight' + dc).value = parseFloat(pktWt).toFixed(3);
            // END CODE FOR LESS WEIGHT FUNCTIONALITY ON METAL REC/PAID @PRIYANKA-16MAR2019
            //
            var payTotalWeight1 = document.getElementById('sttr_nt_weight' + dc).value;
            var payTotalWeightType1 = document.getElementById('sttr_nt_weight_type' + dc).value;
            var payMetalRate1 = document.getElementById('sttr_metal_rate' + dc).value;
            var payMetalTunch1 = document.getElementById('sttr_purity' + dc).value;
            var metalWeight = (payTotalWeight1 * payMetalTunch1) / 100;
            var metalAvgRate = document.getElementById('PayMetal1AvgRate' + dc).value;
            var metalValByAvgRate = 0;
//            alert('prefix : ' + prefix);
            silverPurRemWt = parseFloat(document.getElementById(prefix + 'SilverWtPrevBal').value).toFixed(3);
            goldPurRemWt = parseFloat(document.getElementById(prefix + 'GoldWtPrevBal').value).toFixed(3);
            crystalPurRemWt = parseFloat(document.getElementById(prefix + 'CrystalWtPrevBal').value).toFixed(3);
            if((document.getElementById('metalPanel').value == 'SlPrPayment' || (document.getElementById('metalPanel').value == 'StockPayment' ))&& document.getElementById('sttr_metal_trans' + dc).checked){
                var newFfnWt = document.getElementById('sttr_gs_weight' + dc).value * document.getElementById('sttr_purity' + dc).value / 100;
                metalWeight = (newFfnWt / 99.5) * 100;
                if (metalWeight != '' && metalWeight != 'NaN') {
                    document.getElementById('sttr_final_fine_weight' + dc).value = parseFloat(metalWeight).toFixed(3);
            document.getElementById('sttr_fine_weight' + dc).value = parseFloat(metalWeight).toFixed(3);
                }   
            } else
            document.getElementById('sttr_fine_weight' + dc).value = parseFloat(metalWeight).toFixed(3);
            if (typeof (document.getElementById('sttr_final_fine_weight' + dc)) != 'undefined' &&
                    document.getElementById('sttr_final_fine_weight' + dc) != null) {
                if (document.getElementById('sttr_final_fine_weight' + dc).value > 0) {
//                    metalWeight = document.getElementById('sttr_final_fine_weight' + dc).value;
                }
            }
            //
            // START CODE TO ADD CONDITIONS FOR OLD PRODUCT CALCULATION BY WEIGHT @AUTHOR:MADHUREE-25FEB2022
            //
            //alert('urdValuationBy == ' + document.getElementById('urdValuationBy').value);
            //alert('sttr_fine_weight == ' + document.getElementById('sttr_fine_weight' + dc).value);
            //alert('sttr_final_fine_weight == ' + document.getElementById('sttr_final_fine_weight' + dc).value);
            //
            if (document.getElementById('urdValuationBy').value == 'byGrossWt') {
                metalWeight = document.getElementById('sttr_gs_weight' + dc).value;
            } else if (document.getElementById('urdValuationBy').value == 'byNetWt') {
                metalWeight = document.getElementById('sttr_nt_weight' + dc).value;
            } else if (document.getElementById('urdValuationBy').value == 'byFineWt') {
                metalWeight = document.getElementById('sttr_fine_weight' + dc).value;
            } else {
                if (document.getElementById('sttr_final_fine_weight' + dc).value > 0) {
                    metalWeight = document.getElementById('sttr_final_fine_weight' + dc).value;
                } else {
                    metalWeight = document.getElementById('sttr_fine_weight' + dc).value;
            }
            }
            //
            // END CODE TO ADD CONDITIONS FOR OLD PRODUCT CALCULATION BY WEIGHT @AUTHOR:MADHUREE-25FEB2022
            //
            var metal_Rate_Int_Val = parseInt(payMetalRate1);
            //
            if(metal_Rate_Int_Val.toString() != 'NaN') {
                var metal_Rate_Int_Val_Length = metal_Rate_Int_Val.toString().length;
            } else {
                var metal_Rate_Int_Val_Length = 0;
            }
            //
            var metalType = document.getElementById('sttr_metal_type' + dc).value;
             if(document.getElementById('checkarateonegm').value == 'true'){
        document.getElementById('gmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
        document.getElementById('gmWtInGm').value = parseFloat(1).toFixed(2);
        document.getElementById('gmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
    }else{
            if (metal_Rate_Int_Val_Length == 4 && (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold')) {
                document.getElementById('gmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
                document.getElementById('gmWtInGm').value = parseFloat(1).toFixed(2);
                document.getElementById('gmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
            } else if (metal_Rate_Int_Val_Length == 5 && (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold')) {
                document.getElementById('gmWtInKg').value = parseFloat(1000 / 10).toFixed(2);
                document.getElementById('gmWtInGm').value = parseFloat(10).toFixed(2);
                document.getElementById('gmWtInMg').value = parseFloat(1000 * 10).toFixed(2);
            } else if (metal_Rate_Int_Val_Length == 3 && (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold')) {
                document.getElementById('gmWtInKg').value = parseFloat(100 * 1).toFixed(2);
                document.getElementById('gmWtInGm').value = parseFloat(1).toFixed(2);
                document.getElementById('gmWtInMg').value = parseFloat(100 * 1).toFixed(2);
            } else if ((metal_Rate_Int_Val_Length == 5) && (metalType == 'Silver' || metalType == 'SILVER' || metalType == 'silver')) {
                //START CODE TO ADD 10GM SILVER RATE@ RENUKA SHARMA 28/12/2022
                if (document.getElementById('silverMetalRateby10gm').value == 'yes') {
                    document.getElementById('srGmWtInGm').value = parseFloat(10).toFixed(2);
                    document.getElementById('srGmWtInKg').value = parseFloat(100 * 1).toFixed(2);
                    document.getElementById('srGmWtInMg').value = parseFloat(10000 * 1).toFixed(2);
                } else {
                    document.getElementById('srGmWtInKg').value = parseFloat(1).toFixed(2);
                    document.getElementById('srGmWtInGm').value = parseFloat(1000 * 1).toFixed(2);
                    document.getElementById('srGmWtInMg').value = parseFloat((1000 * 1000) * 1).toFixed(2);
                }
            } else if ((metal_Rate_Int_Val_Length == 2 || metal_Rate_Int_Val_Length == 4 || metal_Rate_Int_Val_Length == 3) &&
                    (metalType == 'Silver' || metalType == 'SILVER' || metalType == 'silver')) {
                if (document.getElementById('silverMetalRateby10gm').value == 'yes') {
                    document.getElementById('srGmWtInGm').value = parseFloat(10).toFixed(2);
                    document.getElementById('srGmWtInKg').value = parseFloat(100 * 1).toFixed(2);
                    document.getElementById('srGmWtInMg').value = parseFloat(10000 * 1).toFixed(2);
                } else {
                    document.getElementById('srGmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
                    document.getElementById('srGmWtInGm').value = parseFloat(1).toFixed(2);
                    document.getElementById('srGmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
                    //END CODE TO ADD 10GM SILVER RATE@ RENUKA SHARMA 28/12/2022
                }
            } else if (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold') {
                document.getElementById('gmWtInKg').value = parseFloat(document.getElementById('defaultGmWtInKg').value).toFixed(2);
                document.getElementById('gmWtInGm').value = parseFloat(document.getElementById('defaultGmWtInGm').value).toFixed(2);
                document.getElementById('gmWtInMg').value = parseFloat(document.getElementById('defaultGmWtInMg').value).toFixed(2);
            } else if (metalType == 'Silver' || metalType == 'SILVER' || metalType == 'silver') {
                document.getElementById('srGmWtInKg').value = parseFloat(document.getElementById('defaultSrGmWtInKg').value).toFixed(2);
                document.getElementById('srGmWtInGm').value = parseFloat(document.getElementById('defaultSrGmWtInGm').value).toFixed(2);
                document.getElementById('srGmWtInMg').value = parseFloat(document.getElementById('defaultSrGmWtInMg').value).toFixed(2);
            }
        }
            //
            if (document.getElementById('sttr_metal_type' + dc).value == 'Gold' || document.getElementById('sttr_metal_type' + dc).value == 'Alloy') {

                goldWeight = parseFloat(metalWeight).toFixed(3);


                if (payTotalWeightType1 == 'KG') {
                    document.getElementById('sttr_valuation' + dc).value = ((goldWeight * payMetalRate1) * document.getElementById('gmWtInKg').value).toFixed(2);
                    metalValByAvgRate = ((goldWeight * metalAvgRate) * document.getElementById('gmWtInKg').value).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById('sttr_valuation' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(2);
                    metalValByAvgRate = ((goldWeight * metalAvgRate) / document.getElementById('gmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById('sttr_valuation' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInMg').value).toFixed(2);
                    metalValByAvgRate = ((goldWeight * metalAvgRate) / document.getElementById('gmWtInMg').value).toFixed(2);
                }
                //
                if (document.getElementById('sttr_valuation' + dc).value == 'NaN') {
                    document.getElementById('sttr_valuation' + dc).value = 0;
                }
                //

                document.getElementById('PayMetal1Pnl' + dc).value = (document.getElementById('sttr_valuation' + dc).value - metalValByAvgRate).toFixed(2);

                if (document.getElementById('sttr_metal_type' + dc).value == 'Gold') {
                    var payMetalDueWeightType1 = document.getElementById(prefix + 'GoldTotFineWtType').value;
                    goldWeightType = payMetalDueWeightType1;

                    if (document.getElementById(prefix + 'GoldWtPrevBal').value == '' || document.getElementById(prefix + 'GoldWtPrevBal').value == 'NaN') {
                        document.getElementById(prefix + 'GoldWtPrevBal').value = 0;
                    }

                    if (gdBal == '') {
                        gdBal = calcWeightBalance(prefix, document.getElementById(prefix + 'GoldWtPrevBalCRDR').value, document.getElementById(prefix + 'GoldWtPrevBal').value, document.getElementById(prefix + 'GoldTotFineWt').value, 0, document.getElementById(prefix + 'RtCtGdCRDR'));//parseFloat(document.getElementById(prefix + 'GoldWtPrevBal').value) + parseFloat(document.getElementById(prefix + 'GoldTotFineWt').value);
                    }
//alert(gdBal);
                    if (payMetalDueWeightType1 == 'KG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight / 1000)).toFixed(3);
                            goldWeight = parseFloat(goldWeight / 1000).toFixed(3);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000 * 1000))).toFixed(3);
                            goldWeight = parseFloat(goldWeight / (1000 * 1000)).toFixed(3);
                        }
                    } else if (payMetalDueWeightType1 == 'GM') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(3);
                            goldWeight = parseFloat(goldWeight * 1000).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(3);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000))).toFixed(3);
                            goldWeight = parseFloat(goldWeight / 1000).toFixed(3);
                        }
                    } else if (payMetalDueWeightType1 == 'MG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000 * 1000)).toFixed(3);
                            goldWeight = parseFloat(goldWeight * 1000 * 1000).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(3);
                            goldWeight = parseFloat(goldWeight * 1000).toFixed(3);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat((gdBal - goldWeight)).toFixed(3);
                        }
                    }
//                    alert('gdBal'+gdBal);
                    document.getElementById('PayMetal1Bal' + dc).value = parseFloat(gdBal).toFixed(3);
                    document.getElementById('PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                    goldWtBal = parseFloat(gdBal).toFixed(3);
                    GoldWtType = payMetalDueWeightType1;
                    totRecGd += parseFloat(goldWeight);
                    totGoldAmt += parseFloat(document.getElementById('sttr_valuation' + dc).value);

                    //alert('totGoldAmt == ' + totGoldAmt);

                    if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
                        document.getElementById(prefix + 'PayGoldWtBal').value = parseFloat(Math.abs(gdBal)).toFixed(3);
                        document.getElementById(prefix + 'PayGoldWtBalType').value = payMetalDueWeightType1;

                        if ((document.getElementById('metalPanel').value != 'SuppOrderUp' &&
                                document.getElementById('metalPanel').value != 'NwOrPayUp' &&
                                document.getElementById('metalPanel').value != 'InvoicePayUp' &&
                                document.getElementById('metalPanel').value != 'NwOrDelPaymentUp' &&
                                document.getElementById('metalPanel').value != 'SuppOrderDeliveryUp' &&
                                document.getElementById('metalPanel').value != 'StockPayUp' &&
                                document.getElementById('metalPanel').value != 'ItemReturnPayUp' &&
                                document.getElementById('metalPanel').value != 'RawPayUp' &&
                                document.getElementById('metalPanel').value != 'SellPayUp' &&
                                document.getElementById("metalPanel").value != 'ItemRepairPayUp' &&
                                document.getElementById('metalPanel').value != 'PurchaseReturnPayUp' &&
                                document.getElementById("metalPanel").value != 'ApprovalPayUp' &&
                                document.getElementById('metalPanel').value != 'NwOrPayUp') &&
                                document.getElementById('paymentMode').value == 'RateCut') { //add panel for order panel prev balance :Author:SANT01DEC16
                            document.getElementById(prefix + 'GoldRtCtWtBal').value = parseFloat(Math.abs(gdBal)).toFixed(3);
                            document.getElementById(prefix + 'GoldRtCtWtBalType').value = payMetalDueWeightType1;
                            document.getElementById('metal1RtCtWtBal').value = parseFloat(Math.abs(gdBal)).toFixed(3) + '' + payMetalDueWeightType1; //Add Value this variable:Author:SANT24OCT16
//                       alert( 'gold'+document.getElementById('metal1RtCtWtBal').value);
                        }
                    }

                    if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
                        document.getElementById(prefix + 'GoldWtFinBal').value = parseFloat(Math.abs(gdBal)).toFixed(3);
                        document.getElementById(prefix + 'GoldWtFinBalType').value = payMetalDueWeightType1;
                    }
                }
                goldPurRemWt = parseFloat(parseFloat(gdBal) - parseFloat(document.getElementById(prefix + 'GoldWtPrevBal').value)).toFixed(3);
            }

            if (document.getElementById('sttr_metal_type' + dc).value == 'Silver' ||
                    document.getElementById('sttr_metal_type' + dc).value == 'SILVER' ||
                    document.getElementById('sttr_metal_type' + dc).value == 'silver') {
                //
                //
                //alert('metalWeight == ' + metalWeight);
                //alert('payMetalRate1 == ' + payMetalRate1);
                //alert('silverWeight == ' + silverWeight);
                //alert('payTotalWeightType1 == ' + payTotalWeightType1);     
                //alert('srGmWtInKg == ' + document.getElementById('srGmWtInKg').value);
                //alert('srGmWtInGm == ' + document.getElementById('srGmWtInGm').value);
                //alert('srGmWtInMg == ' + document.getElementById('srGmWtInMg').value);
                //
                //
                silverWeight = parseFloat(metalWeight);
                //
                //
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById('sttr_valuation' + dc).value = ((silverWeight * payMetalRate1 * document.getElementById('srGmWtInKg').value)).toFixed(2);
                    metalValByAvgRate = ((silverWeight * metalAvgRate * document.getElementById('srGmWtInKg').value)).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById('sttr_valuation' + dc).value = ((silverWeight * payMetalRate1) / document.getElementById('srGmWtInGm').value).toFixed(2);
                    metalValByAvgRate = ((silverWeight * metalAvgRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById('sttr_valuation' + dc).value = ((silverWeight * payMetalRate1) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                    metalValByAvgRate = ((silverWeight * metalAvgRate) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                }
                //
                //
                //alert('sttr_valuation 1 == ' + document.getElementById('sttr_valuation' + dc).value);
                //
                //
                if (document.getElementById('sttr_valuation' + dc).value == 'NaN') {
                    document.getElementById('sttr_valuation' + dc).value = 0;
                }
                //
                //
                //alert('sttr_valuation 2 == ' + document.getElementById('sttr_valuation' + dc).value);
                //
                //
                document.getElementById('PayMetal1Pnl' + dc).value = (document.getElementById('sttr_valuation' + dc).value - metalValByAvgRate).toFixed(2);
                payMetalDueWeightType1 = document.getElementById(prefix + 'SilverTotFineWtType').value;
                silverWeightType = payMetalDueWeightType1;

                if (document.getElementById(prefix + 'SilverWtPrevBal').value == '' || document.getElementById(prefix + 'SilverWtPrevBal').value == 'NaN') {
                    document.getElementById(prefix + 'SilverWtPrevBal').value = 0;
                }

                if (slBal == '') {
                    slBal = calcWeightBalance(prefix, document.getElementById(prefix + 'SilverWtPrevBalCRDR').value, document.getElementById(prefix + 'SilverWtPrevBal').value, document.getElementById(prefix + 'SilverTotFineWt').value, 0, document.getElementById(prefix + 'RtCtSlCRDR'));
                }
//                alert(document.getElementById('sttr_valuation' + dc).value);
                if (payMetalDueWeightType1 == 'KG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat((slBal) - silverWeight).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - silverWeight / 1000)).toFixed(3);
                        silverWeight = parseFloat(silverWeight / 1000).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - silverWeight / (1000 * 1000))).toFixed(3);
                        silverWeight = parseFloat(silverWeight / (1000 * 1000)).toFixed(3);
                    }
                } else if (payMetalDueWeightType1 == 'GM') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(3);
                        silverWeight = parseFloat(silverWeight * 1000).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat((slBal) - silverWeight).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - silverWeight / (1000))).toFixed(3);
                        silverWeight = parseFloat(silverWeight / 1000).toFixed(3);
                    }
                } else if (payMetalDueWeightType1 == 'MG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000 * 1000)).toFixed(3);
                        silverWeight = parseFloat(silverWeight * 1000 * 1000).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(3);
                        silverWeight = parseFloat(silverWeight * 1000).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat((slBal - silverWeight)).toFixed(3);
                    }
                }

                document.getElementById('PayMetal1Bal' + dc).value = parseFloat(slBal).toFixed(3);
                document.getElementById('PayMetalBal1Type' + dc).value = payMetalDueWeightType1;

                if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
                    document.getElementById(prefix + 'PaySilverWtBal').value = parseFloat(Math.abs(slBal)).toFixed(3);
                    document.getElementById(prefix + 'PaySilverWtBalType').value = payMetalDueWeightType1;

                    if ((document.getElementById('metalPanel').value != 'RawPayUp' &&
                            document.getElementById('metalPanel').value != 'InvoicePayUp' &&
                            document.getElementById('metalPanel').value != 'SellPayUp' &&
                            document.getElementById("metalPanel").value != 'ItemRepairPayUp' &&
                            document.getElementById('metalPanel').value != 'PurchaseReturnPayUp' &&
                            document.getElementById('metalPanel').value != 'ApprovalPayUp' &&
                            document.getElementById('metalPanel').value != 'NwOrPayUp') &&
                            document.getElementById('paymentMode').value == 'RateCut') { //add panel for order panel prev balance :Author:SANT01DEC16
                        document.getElementById(prefix + 'SilverRtCtWtBal').value = parseFloat(Math.abs(slBal)).toFixed(3);
                        document.getElementById(prefix + 'SilverRtCtWtBalType').value = payMetalDueWeightType1;
                        document.getElementById('metal2RtCtWtBal').value = parseFloat(Math.abs(slBal)).toFixed(3) + '' + payMetalDueWeightType1; //Add Value this variable:Author:SANT24OCT16
                    }
                }

                if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
                    document.getElementById(prefix + 'SilverWtFinBal').value = parseFloat(Math.abs(slBal)).toFixed(3);
                    document.getElementById(prefix + 'SilverWtFinBalType').value = payMetalDueWeightType1;
                }

                silverWtBal = parseFloat(slBal).toFixed(3);
                SilverWtType = payMetalDueWeightType1;
                totRecSl += parseFloat(silverWeight);
                totSilverAmt += parseFloat(document.getElementById('sttr_valuation' + dc).value);
                silverPurRemWt = parseFloat(parseFloat(slBal) - parseFloat(document.getElementById(prefix + 'SilverWtPrevBal').value)).toFixed(3);

                //alert('totSilverAmt == ' + totSilverAmt);
            }

//alert('metaltyep=='+document.getElementById('sttr_metal_type' + dc).value);
            if (document.getElementById('sttr_metal_type' + dc).value == 'crystal') {
//                alert(document.getElementById('sttr_metal_type' + dc).value);
//                alert('gsWt=1='+gsWt);
                if (gsWtType == 'KG') {
                    document.getElementById('sttr_valuation' + dc).value = parseFloat((gsWt * payMetalRate1)).toFixed(2);
                } else if (gsWtType == 'GM') {
                    document.getElementById('sttr_valuation' + dc).value = parseFloat((gsWt * payMetalRate1)).toFixed(2);
                } else if (gsWtType == 'MG') {
                    document.getElementById('sttr_valuation' + dc).value = parseFloat((gsWt * payMetalRate1)).toFixed(2);
                } else if (gsWtType == 'CT') {
                    document.getElementById('sttr_valuation' + dc).value = parseFloat((gsWt * payMetalRate1)).toFixed(2);
//                    alert(document.getElementById('sttr_valuation' + dc).value);
                }

                metalValByAvgRate = parseFloat((gsWt * metalAvgRate)).toFixed(2);
                //
//                alert('hii'+ document.getElementById('sttr_valuation' + dc).value);
                document.getElementById('PayMetal1Pnl' + dc).value = (document.getElementById('sttr_valuation' + dc).value - metalValByAvgRate).toFixed(2);
                //

                if (document.getElementById(prefix + 'CrystalWtPrevBal').value == '' || document.getElementById(prefix + 'CrystalWtPrevBal').value == 'NaN') {
                    document.getElementById(prefix + 'CrystalWtPrevBal').value = 0;
                }
                if (stBal == '') {
                    stBal = calcWeightBalance(prefix, document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value, document.getElementById(prefix + 'CrystalWtPrevBal').value, document.getElementById(prefix + 'CrystalTotFineWt').value, 0, document.getElementById(prefix + 'RtCtStCRDR'));
                }
//                alert('stBal'+stBal);
//  alert('hii=3='+ document.getElementById('sttr_valuation' + dc).value);
                payMetalDueWeightType1 = document.getElementById('sttr_gs_weight_type' + dc).value;
                crystalWeightType = payMetalDueWeightType1;
                if (gsWtType == 'KG') {
                    if (gsWtType == 'KG') {
                        stBal = parseFloat((stBal) - gsWt).toFixed(3);
                    } else if (gsWtType == 'GM') {
                        stBal = parseFloat(((stBal) - (gsWt * 5.0000))).toFixed(3);
                        gsWt = parseFloat(gsWt * 0.2).toFixed(3);
                    } else if (gsWtType == 'CT') {
                        stBal = parseFloat(((stBal) - gsWt / (1000 * 1000))).toFixed(3);
                        gsWt = parseFloat(gsWt / (1000 * 1000)).toFixed(3);
                    }
                } else if (gsWtType == 'GM') {
                    if (gsWtType == 'KG') {
                        stBal = parseFloat(((stBal) - (gsWt * 5000))).toFixed(3);
                        gsWt = parseFloat(gsWt * 5000).toFixed(3);
                    } else if (gsWtType == 'GM') {
                        stBal = parseFloat((stBal) - gsWt).toFixed(3);
                    } else if (gsWtType == 'CT') {
                        stBal = parseFloat(((stBal) - gsWt / (1000))).toFixed(3);
                        gsWt = parseFloat(gsWt / 1000).toFixed(3);
                    }
                } else if (gsWtType == 'CT') {
//                    alert('ct')
                    if (gsWtType == 'KG') {
                        stBal = parseFloat(((stBal) - (gsWt / 5000.0))).toFixed(3);
                        gsWt = parseFloat(gsWt / 5000.0).toFixed(3);
                    } else if (gsWtType == 'GM') {
                        stBal = parseFloat(((stBal) - (gsWt / 5.0000))).toFixed(3);
                        gsWt = parseFloat(gsWt / 5.0000).toFixed(3);
                    } else if (gsWtType == 'CT') {
                        stBal = parseFloat((stBal - gsWt)).toFixed(3);
                    }
                }
//                alert('stBal' + stBal);
                document.getElementById('PayMetal1Bal' + dc).value = parseFloat(stBal).toFixed(3);
                document.getElementById('PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
                    document.getElementById(prefix + 'PayCrystalWtBal').value = parseFloat(Math.abs(stBal)).toFixed(3);
//                    alert('stoneBal==' + document.getElementById(prefix + 'PayCrystalWtBal').value);
                    document.getElementById(prefix + 'PayCrystalWtBalType').value = gsWtType;

                    if ((document.getElementById('metalPanel').value != 'RawPayUp' &&
                            document.getElementById('metalPanel').value != 'InvoicePayUp' &&
                            document.getElementById('metalPanel').value != 'SellPayUp' &&
                            document.getElementById("metalPanel").value != 'ItemRepairPayUp' &&
                            document.getElementById('metalPanel').value != 'PurchaseReturnPayUp' &&
                            document.getElementById('metalPanel').value != 'ApprovalPayUp' &&
                            document.getElementById('metalPanel').value != 'NwOrPayUp') &&
                            document.getElementById('paymentMode').value == 'RateCut') { //add panel for order panel prev balance :Author:SANT01DEC16
                        document.getElementById(prefix + 'CrystalRtCtWtBal').value = parseFloat(Math.abs(stBal)).toFixed(3);
                        document.getElementById(prefix + 'CrystalRtCtWtBalType').value = gsWtType;
                        document.getElementById('metal3RtCtWtBal').value = parseFloat(Math.abs(stBal)).toFixed(3) + '' + gsWtType; //Add Value this variable:Author:SANT24OCT16
//                    alert(document.getElementById('metal3RtCtWtBal').value +'rtctbal');
                    }
                }

                if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
                    document.getElementById(prefix + 'CrystalWtFinBal').value = parseFloat(Math.abs(stBal)).toFixed(3);
                    document.getElementById(prefix + 'CrystalWtFinBalType').value = gsWtType;
                }
                crystalWtBal = parseFloat(stBal).toFixed(3);
                CrystalWtType = payMetalDueWeightType1;
//                alert('gsWt=2=' + gsWt);
                totRecSt += parseFloat(gsWt);
//                alert('totRecSt='+totRecSt);
                totCrysAmt += parseFloat(document.getElementById('sttr_valuation' + dc).value);
                crystalPurRemWt = parseFloat(parseFloat(stBal) - parseFloat(document.getElementById(prefix + 'CrystalWtPrevBal').value)).toFixed(3);
//alert('hii'+document.getElementById('sttr_valuation' + dc).value);
            }

            if (document.getElementById(prefix + 'GoldTotFineWt').value != '' && goldWtBal == 0) {
                goldWtBal = parseFloat(document.getElementById(prefix + 'GoldTotFineWt').value);
                GoldWtType = document.getElementById(prefix + 'GoldTotFineWtType').value;
            }

            if (document.getElementById(prefix + 'SilverTotFineWt').value != '' && silverWtBal == 0) {
                silverWtBal = parseFloat(document.getElementById(prefix + 'SilverTotFineWt').value);
                SilverWtType = document.getElementById(prefix + 'SilverTotFineWtType').value;
            }

            if (document.getElementById(prefix + 'CrystalTotFineWt').value != '' && crystalWtBal == 0) {
                crystalWtBal = parseFloat(document.getElementById(prefix + 'CrystalTotFineWt').value);
                CrystalWtType = document.getElementById(prefix + 'CrystalTotFineWtType').value;
            }
            
            document.getElementById(prefix + 'GoldWtRecBal').value = parseFloat(totRecGd).toFixed(3);
            document.getElementById(prefix + 'GoldWtRecBalType').value = goldWeightType;
            document.getElementById(prefix + 'SilverWtRecBal').value = parseFloat(totRecSl).toFixed(3);
            document.getElementById(prefix + 'SilverWtRecBalType').value = silverWeightType;
            document.getElementById(prefix + 'CrystalWtRecBal').value = parseFloat(totRecSt).toFixed(3);
            document.getElementById(prefix + 'CrystalWtRecBalType').value = crystalWeightType;


            if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
                document.getElementById(prefix + 'GoldAvgRate').value = parseFloat((((parseFloat(document.getElementById(prefix + 'GoldPrevRate').value) * parseFloat(document.getElementById(prefix + 'GoldWtPrevBal').value) / 100) + (parseFloat(document.getElementById(prefix + 'GoldPurRate').value) * parseFloat(goldPurRemWt)) / 100) / parseFloat(parseFloat(document.getElementById(prefix + 'GoldWtPrevBal').value) / 10 + parseFloat(goldPurRemWt) / 10)) * 10).toFixed(2);
                document.getElementById(prefix + 'SilverAvgRate').value = parseFloat((((parseFloat(document.getElementById(prefix + 'SilverPrevRate').value) * parseFloat(document.getElementById(prefix + 'SilverWtPrevBal').value) / 100) + (parseFloat(document.getElementById(prefix + 'SilverPurRate').value) * parseFloat(silverPurRemWt)) / 100) / parseFloat(parseFloat(document.getElementById(prefix + 'SilverWtPrevBal').value) / 10 + parseFloat(silverPurRemWt) / 10)) * 10).toFixed(2);
                if (document.getElementById(prefix + 'GoldAvgRate').value == 'NaN') {
                    document.getElementById(prefix + 'GoldAvgRate').value = document.getElementById(prefix + 'GoldPurRate').value;
                }
                if (document.getElementById(prefix + 'SilverAvgRate').value == 'NaN') {
                    document.getElementById(prefix + 'SilverAvgRate').value = document.getElementById(prefix + 'SilverPurRate').value;
                }
                if (document.getElementById(prefix + 'CrystalAvgRate').value == 'NaN') {
                    document.getElementById(prefix + 'CrystalAvgRate').value = document.getElementById(prefix + 'CrystalPurRate').value;
                }
                document.getElementById('metal1WtRecBal').value = parseFloat(totRecGd).toFixed(3) + ' ' + goldWeightType;
                document.getElementById('metal2WtRecBal').value = parseFloat(totRecSl).toFixed(3) + ' ' + silverWeightType;
                document.getElementById('metal3WtRecBal').value = parseFloat(totRecSt).toFixed(3) + ' ' + crystalWeightType;
//                alert('crystalWeightType' + document.getElementById('metal3WtRecBal').value);
            }


            if (document.getElementById('sttr_valuation' + dc).value == '') {
                document.getElementById('sttr_valuation' + dc).value = 0;
            }

//            alert(document.getElementById('sttr_valuation' + dc).value);
            totAmtRec += parseFloat(document.getElementById('sttr_valuation' + dc).value);
//            alert('totAmtRec'+ totAmtRec);

            //alert('paymentMode ==' + document.getElementById('paymentMode').value);

            if (document.getElementById('paymentMode').value == 'ByCash') {
                document.getElementById(prefix + 'PayTotAmtRec').value = Math_round(parseFloat(totAmtRec)).toFixed(2);
                document.getElementById(prefix + 'PayTotAmtRecDisp').value = Math_round(parseFloat(totAmtRec)).toFixed(2); // METAL RECEIVED-PRIYANKA-19MAR18	
                document.getElementById(prefix + 'PayTotAmtExchangeDisp').value = Math_round(parseFloat(totAmtRec)).toFixed(2); // METAL EXCHANGE-PRIYANKA-19MAR18
                //alert('PayTotAmtExchangeDisp == ' + document.getElementById(prefix + 'PayTotAmtExchangeDisp').value);
                //alert('totAmtRec == ' + totAmtRec);

            }

            if (document.getElementById('paymentMode').value == 'RateCut') {
                if (document.getElementById('utin_metal_exchange_chk').checked) {
                    document.getElementById(prefix + 'PayTotAmtRec').value = Math_round(parseFloat(totAmtRec)).toFixed(2);
                    document.getElementById(prefix + 'PayTotAmtRecDisp').value = Math_round(parseFloat(totAmtRec)).toFixed(2); // METAL RECEIVED-PRIYANKA-19MAR18	
                    document.getElementById(prefix + 'PayTotAmtExchangeDisp').value = Math_round(parseFloat(totAmtRec)).toFixed(2); // METAL EXCHANGE-PRIYANKA-19MAR18
                }
            }

            document.getElementById(prefix + 'PayTotGoldAmtRec').value = parseFloat(totGoldAmt).toFixed(2);
            document.getElementById(prefix + 'PayTotSilverAmtRec').value = parseFloat(totSilverAmt).toFixed(2);
            document.getElementById(prefix + 'PayTotCrystalAmtRec').value = parseFloat(totCrysAmt).toFixed(2);

            if (document.getElementById('paymentMode').value == 'RateCut' ||
                    document.getElementById('paymentMode').value == 'NoRateCut') {
                calcWholeSaleRateCut(prefix);
                calcRawMetStock(prefix);
            }        
            calcPaymentCashBalance(prefix); 
        }
//
//Checking scheme deposit string is blank or not
        if (typeof (document.getElementById('checkbox_id_str')) != 'undefined' &&
                (document.getElementById('checkbox_id_str') != null)) {
            var scCheckBox_id_str = document.getElementById('checkbox_id_str').value;
            if (scCheckBox_id_str != "" && scCheckBox_id_str != null)
            {
                document.getElementById(prefix + 'ScPayTotAmtRec').value = Math_round(parseFloat(totAmtRec)).toFixed(2);
                calFinalPaymentAmount(prefix);
            }
        }

        //alert('totAmtRec == ' + totAmtRec +  ' = ' + dc);

        metalEntered++;

        //getMetalDiv--;
    }
    return false;
}


// CALCULATES METAL WEIGHTS.
var goldRateCutWeight = 0;
var silverRateCutWeight = 0;

function calcWholeSaleRateCut(prefix) {
//alert('h2');
    var gdRtCt = 0;
    var metalType;

    //alert('GoldWtPrevBalCRDR == ' + document.getElementById(prefix + 'GoldWtPrevBalCRDR').value);

    if ((document.getElementById(prefix + 'GoldWtPrevBal').value).trim() == '' || document.getElementById(prefix + 'GoldWtPrevBal').value == 'NaN') {
        document.getElementById(prefix + 'GoldWtPrevBal').value = 0;
    }

    if ((document.getElementById(prefix + 'GoldTotFineWt').value).trim() == '' || document.getElementById(prefix + 'GoldTotFineWt').value == 'NaN') {
        document.getElementById(prefix + 'GoldTotFineWt').value = 0;
    }

    if ((document.getElementById(prefix + 'GoldWtRecBal').value).trim() == '' || document.getElementById(prefix + 'GoldWtRecBal').value == 'NaN') {
        document.getElementById(prefix + 'GoldWtRecBal').value = 0;
    }

    var gdBal = calcWeightBalance(prefix, document.getElementById(prefix + 'GoldWtPrevBalCRDR').value, document.getElementById(prefix + 'GoldWtPrevBal').value, document.getElementById(prefix + 'GoldTotFineWt').value, document.getElementById(prefix + 'GoldWtRecBal').value, document.getElementById(prefix + 'RtCtGdCRDR'));

    //alert('gdBal == ' + gdBal);

    var goldWtType = document.getElementById(prefix + 'GoldTotFineWtType').value;
    //
    // alert('paymentMode == ' + document.getElementById('paymentMode').value);
    //
    // START @PRIYANKA-05APR18
    if (document.getElementById('paymentMode').value == 'NoRateCut') {
        //

        //alert('GoldWtPrevBalCRDR == ' + document.getElementById(prefix + 'GoldWtPrevBalCRDR').value);
        //alert('utin_cash_to_metalwt_CRDR == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);

        //alert('gdBal **== ' + gdBal);
        //alert('FinalGdCRDR **== ' + document.getElementById(prefix + 'FinalGdCRDR').value);

        // START @PRIYANKA-06APR18
        // START @PRIYANKA-05APR18
        if (document.getElementById('utin_cash_to_metalwt_CRDR').value != '' && document.getElementById('utin_cash_to_metalwt').value > 0) {

            if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                    document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR') ||
                    (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                            document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR')) {

                gdBal = (parseFloat(gdBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
            }

            if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                    document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR') ||
                    (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                            document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR')) {

                gdBal = (parseFloat(gdBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                if (gdBal < 0) {
                    document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;
                }

            }

            //alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);

            if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                    (document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR' ||
                            document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR')) {

                if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                        document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR')) {

                    gdBal = (parseFloat(gdBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                    if (gdBal < 0) {
                        document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;
                    }

                } else {

                    gdBal = (parseFloat(gdBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                    document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;
                }
            }
        }
        // END @PRIYANKA-05APR18

        //alert('gdBal == ' + gdBal);
        //alert('FinalGdCRDR == ' + document.getElementById(prefix + 'FinalGdCRDR').value);

        // END @PRIYANKA-06APR18
        // START @PRIYANKA-06APR18
        if (document.getElementById('CashToGdMetalWtCRDR').value != '' && document.getElementById('CashToGdMetalWt').value > 0) {

            if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                    document.getElementById('CashToGdMetalWtCRDR').value == 'CR') ||
                    (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                            document.getElementById('CashToGdMetalWtCRDR').value == 'DR')) {

                gdBal = (parseFloat(gdBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
                document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;

            }

            if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                    document.getElementById('CashToGdMetalWtCRDR').value == 'DR') ||
                    (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                            document.getElementById('CashToGdMetalWtCRDR').value == 'CR')) {

                gdBal = (parseFloat(gdBal) - parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);

                if (gdBal < 0) {
                    document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
                }

            }

            if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                    (document.getElementById('CashToGdMetalWtCRDR').value == 'DR' ||
                            document.getElementById('CashToGdMetalWtCRDR').value == 'CR')) {

                if ((document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR' &&
                        document.getElementById('CashToGdMetalWtCRDR').value == 'CR') ||
                        (document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR' &&
                                document.getElementById('CashToGdMetalWtCRDR').value == 'DR')) {

                    gdBal = (parseFloat(gdBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);

                    document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;

                } else if ((document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR' &&
                        document.getElementById('CashToGdMetalWtCRDR').value == 'DR') ||
                        (document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR' &&
                                document.getElementById('CashToGdMetalWtCRDR').value == 'CR')) {

                    gdBal = (parseFloat(gdBal) - parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);

                    if (gdBal < 0) {
                        document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
                    } else {
                        document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;
                    }

                } else if (document.getElementById('utin_cash_to_metalwt_CRDR').value == '' &&
                        (document.getElementById('CashToGdMetalWtCRDR').value == 'DR' ||
                                document.getElementById('CashToGdMetalWtCRDR').value == 'CR')) {

                    gdBal = (parseFloat(gdBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
                    document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
                }
            }
        }
        // END @PRIYANKA-06APR18

        //alert('gdBal ##== ' + gdBal);        
        //alert('FinalGdCRDR ##== ' + document.getElementById(prefix + 'FinalGdCRDR').value);
    }

    //alert('gdBal == ' + gdBal);

    // END @PRIYANKA-05APR18
    //
    if (document.getElementById('paymentMode').value == 'RateCut') {


        // START @PRIYANKA-05APR18
        if (document.getElementById('utin_cash_to_metalwt_CRDR').value != '' && document.getElementById('utin_cash_to_metalwt').value > 0) {

            if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                    document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR') ||
                    (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                            document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR')) {

                gdBal = (parseFloat(gdBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
                //alert('FinalGdCRDR7 == ' + document.getElementById(prefix + 'FinalGdCRDR').value);
            }

            if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                    document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR') ||
                    (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                            document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR')) {

                gdBal = (parseFloat(gdBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                //alert('FinalGdCRDR %%== ' + document.getElementById(prefix + 'FinalGdCRDR').value);

                if (gdBal < 0) { // @PRIYANKA-07FEB19
                    document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;
                }

                //alert('FinalGdCRDR6 == ' + document.getElementById(prefix + 'FinalGdCRDR').value);
            }

            if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                    (document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR')) {

                //alert('TransCRDR ##== ' + document.getElementById(prefix + 'TransCRDR').value);
                //alert('gdBal 00 ##== ' + gdBal);

                if (document.getElementById(prefix + 'TransCRDR').value == document.getElementById('utin_cash_to_metalwt_CRDR').value)
                    gdBal = (parseFloat(gdBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
                else
                    gdBal = (parseFloat(gdBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                //gdBal = (parseFloat(gdBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                //alert('FinalGdCRDR ##== ' + document.getElementById(prefix + 'FinalGdCRDR').value);
                //alert('gdBal ##== ' + gdBal);
                //alert('metal1WtFinBal ##== ' + document.getElementById('metal1WtFinBal').value);

                if (prefix == 'slPr') {
                    if (gdBal > 0)
                        document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                    else
                        document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                } else {
                    if (gdBal < 0)
                        document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                    else
                        document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                }
                //document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;
                //alert('FinalGdCRDR534 == ' + document.getElementById(prefix + 'FinalGdCRDR').value);
            }
//            alert('FinalGdCRDR55 == ' + document.getElementById(prefix + 'FinalGdCRDR').value);
            //
            if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                    (document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR')) {
                
                if (document.getElementById(prefix + 'FinalGdCRDR').value == 'CR')
                    gdBal = (parseFloat(gdBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
                else
                    gdBal = (parseFloat(gdBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                //gdBal = (parseFloat(gdBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                //alert('FinalGdCRDR ##== ' + document.getElementById(prefix + 'FinalGdCRDR').value);

                if (prefix == 'slPr') {
                    if (gdBal > 0)
                        document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                    else
                        document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                } else {
                    if (gdBal < 0)
                        document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                    else
                        document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                }
                //alert('FinalGdCRDR5 == ' + document.getElementById(prefix + 'FinalGdCRDR').value);
            }

        }
        // END @PRIYANKA-05APR18

        //alert('gdBal == ' + gdBal);
        //alert('FinalGdCRDR == ' + document.getElementById(prefix + 'FinalGdCRDR').value);

        // END @PRIYANKA-06APR18
        // START @PRIYANKA-06APR18
        if (document.getElementById('CashToGdMetalWtCRDR').value != '' && document.getElementById('CashToGdMetalWt').value > 0) {

            if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                    document.getElementById('CashToGdMetalWtCRDR').value == 'CR') ||
                    (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                            document.getElementById('CashToGdMetalWtCRDR').value == 'DR')) {

                gdBal = (parseFloat(gdBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
                document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
                //alert('FinalGdCRDR0 == ' + document.getElementById(prefix + 'FinalGdCRDR').value);
            }

            if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                    document.getElementById('CashToGdMetalWtCRDR').value == 'DR') ||
                    (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                            document.getElementById('CashToGdMetalWtCRDR').value == 'CR')) {

                gdBal = (parseFloat(gdBal) - parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);

                //if (gdBal < 0) {
                document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
                //} 
                //alert('FinalGdCRDR1 == ' + document.getElementById(prefix + 'FinalGdCRDR').value);

            }

            if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                    (document.getElementById('CashToGdMetalWtCRDR').value == 'DR' ||
                            document.getElementById('CashToGdMetalWtCRDR').value == 'CR')) {

                // START CODE FOR Sell Panel CASH TO METAL Issue @PRIYANKA-28JUNE18
                if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                        document.getElementById('CashToGdMetalWtCRDR').value == 'CR' &&
                        document.getElementById(prefix + 'FinalGdCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                                document.getElementById('CashToGdMetalWtCRDR').value == 'DR' &&
                                document.getElementById(prefix + 'FinalGdCRDR').value == 'CR')) {

                    //alert('gdBal2222 == ' + gdBal);
                    //alert('CashToGdMetalWt634343 == ' + document.getElementById('CashToGdMetalWt').value);
                    //alert('CashToGdMetalWtCRDR634343 == ' + document.getElementById('CashToGdMetalWtCRDR').value);

                    if (gdBal < document.getElementById('CashToGdMetalWt').value) {
                        document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
                    }

                    gdBal = (parseFloat(gdBal) - parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);

//                    if (prefix == 'slPr') {
//                        if (gdBal > 0)
//                            document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
//                        else
//                            document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
//                    } else {
//                        if (gdBal < 0)
//                            document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
//                        else
//                            document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
//                    }

                    //alert('gdBal2223332 == ' + gdBal);
                    //alert('FinalGdCRDR2 == ' + document.getElementById(prefix + 'FinalGdCRDR').value);

                } else if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                        document.getElementById('CashToGdMetalWtCRDR').value == 'CR') &&
                        document.getElementById(prefix + 'FinalGdCRDR').value == 'CR') {

//                    if (gdBal < document.getElementById('CashToGdMetalWt').value) {
//                        document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
//                    }

                    gdBal = (parseFloat(gdBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);

                    if (prefix == 'slPr') {
                        if (gdBal > 0)
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                    } else {
                        if (gdBal < 0)
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                    }

                    //alert('FinalGdCRDR3 == ' + document.getElementById(prefix + 'FinalGdCRDR').value);

                } else {

                    gdBal = (parseFloat(gdBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
                    //alert('gdBal $$== ' + gdBal);
                    //document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;

                    if (prefix == 'slPr') {
                        if (gdBal > 0)
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                    } else {
                        if (gdBal < 0)
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                    }

                    //alert('FinalGdCRDR4 == ' + document.getElementById(prefix + 'FinalGdCRDR').value);
                }
                // END CODE FOR Sell Panel CASH TO METAL Issue @PRIYANKA-28JUNE18
            }
        }
        // END @PRIYANKA-06APR18


        if ((document.getElementById(prefix + 'GoldRtCtWtBal').value).trim() == '' || document.getElementById(prefix + 'GoldRtCtWtBal').value == 'NaN') {
            document.getElementById(prefix + 'GoldRtCtWtBal').value = 0;
        }

        var gdRtCt = parseFloat(document.getElementById(prefix + 'GoldRtCtWtBal').value);

        var goldRtCtWtType = document.getElementById(prefix + 'GoldRtCtWtBalType').value;

        if (gdBal == '' || gdBal == null) {
            gdBal = 0;
        }

        gdRtCt = convertWeight(gdRtCt, goldWtType, goldRtCtWtType);
        
        //alert('gdRtCt == ' + gdRtCt);
        // START @PRIYANKA-06APR18
        // START @PRIYANKA-05APR18
//        if (document.getElementById('utin_cash_to_metalwt_CRDR').value == '') {            
//            gdRtCt = convertWeight(gdRtCt, goldWtType, goldRtCtWtType);            
//        } else if (document.getElementById('utin_cash_to_metalwt_CRDR').value != '' && document.getElementById('utin_cash_to_metalwt').value > 0) {           
//            //alert('gdRtCt 1== ' + gdRtCt);
//            gdRtCt = (parseFloat(gdRtCt) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
//            //alert('gdRtCt 2== ' + gdRtCt);
//        }
        // END @PRIYANKA-05APR18
        // END @PRIYANKA-06APR18
        document.getElementById('metal1RtCtWtBal').value = gdRtCt + ' ' + goldWtType;
    }
//
//
//
//
//
//
//****************************************************************************************************
//************************************************************************************************
    //alert('FinalGdCRDR 78@@== ' + document.getElementById(prefix + 'FinalGdCRDR').value);

    //alert('gdBal788 @@== ' + gdBal);

    //alert('gdRtCt @@== ' + gdRtCt);

    if (document.getElementById('paymentMode').value != 'ByCash' &&
            (document.getElementById('PaymentReceiptPanel').value != 'RECEIPT' ||
                    document.getElementById('PaymentReceiptPanel').value != 'PAYMENT')) {
        // START @PRIYANKA-06APR18
        // START @PRIYANKA-05APR18
        // 
        //if (document.getElementById('utin_cash_to_metalwt_CRDR').value == '') {        
        //
        document.getElementById('metal1WtBal').value = Math.abs(parseFloat(gdBal - gdRtCt)).toFixed(3) + ' ' + goldWtType; // Gold final balance in rate cut division
        document.getElementById('metal1WtFinBal').value = Math.abs(parseFloat(gdBal - gdRtCt)).toFixed(3) + ' ' + goldWtType;
        //
        if (prefix == 'slPr') {
            if ((gdBal - gdRtCt) > 0)
                document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
            else
                document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
        } else {
            if ((gdBal - gdRtCt) < 0) {
                document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
            } else {
                document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
            }
        }
        
        //} else if (document.getElementById('utin_cash_to_metalwt_CRDR').value != '') {        
        //gdRtCt = (parseFloat(gdRtCt) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3)        
        //alert('gdBal == ' + gdBal);          
        //alert('gdRtCt == ' + gdRtCt);        
        //document.getElementById('metal1WtBal').value = parseFloat(gdBal - gdRtCt).toFixed(3) + ' ' + goldWtType;
        // document.getElementById('metal1WtFinBal').value = parseFloat(gdBal - gdRtCt).toFixed(3) + ' ' + goldWtType;        
        //alert('metal1WtFinBal == ' + document.getElementById('metal1WtFinBal').value);
        //}
        // END @PRIYANKA-05APR18
        // END @PRIYANKA-06APR18
        //
        //}
        // START OF CODE TO SET COLOR FOR GOLD WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        // START CODE TO Set color of metal balance (GD WT) according to CR/DR on payment panel @PRIYANKA-13MAR18
        if (document.getElementById(prefix + 'FinalGdCRDR').value == 'CR') {
            document.getElementById('metal1WtFinBal').style.color = 'green';
            document.getElementById(prefix + 'FinalGdCRDR').style.color = 'green';
            //document.getElementById('metal1WtFinBal').style.color = 'green';
            //document.getElementById(prefix + 'FinalGdCRDR').style.color = 'green';
        } else if (document.getElementById(prefix + 'FinalGdCRDR').value == 'DR') {
            document.getElementById('metal1WtFinBal').style.color = 'red';
            document.getElementById(prefix + 'FinalGdCRDR').style.color = 'red';
            //document.getElementById('metal1WtFinBal').style.color = 'red';
            //document.getElementById(prefix + 'FinalGdCRDR').style.color = 'red';
        }
        // END CODE TO Set color of metal balance (GD WT) according to CR/DR on payment panel @PRIYANKA-13MAR18
        // END OF CODE TO SET COLOR FOR GOLD WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        if ((document.getElementById(prefix + 'SilverWtPrevBal').value).trim() == '' || document.getElementById(prefix + 'SilverWtPrevBal').value == 'NaN') {
            document.getElementById(prefix + 'SilverWtPrevBal').value = 0;
        }

        if ((document.getElementById(prefix + 'SilverTotFineWt').value).trim() == '' || document.getElementById(prefix + 'SilverTotFineWt').value == 'NaN') {
            document.getElementById(prefix + 'SilverTotFineWt').value = 0;
        }

        if ((document.getElementById(prefix + 'SilverWtRecBal').value).trim() == '' || document.getElementById(prefix + 'SilverWtRecBal').value == 'NaN') {
            document.getElementById(prefix + 'SilverWtRecBal').value = 0;
        }

        var silverBal = calcWeightBalance(prefix, document.getElementById(prefix + 'SilverWtPrevBalCRDR').value, document.getElementById(prefix + 'SilverWtPrevBal').value, document.getElementById(prefix + 'SilverTotFineWt').value, document.getElementById(prefix + 'SilverWtRecBal').value, document.getElementById(prefix + 'RtCtSlCRDR'));
        var silverRtCt = 0;
        var silverWtType = document.getElementById(prefix + 'SilverTotFineWtType').value;

        if (document.getElementById('paymentMode').value == 'NoRateCut' || document.getElementById('paymentMode').value == 'RateCut') {

            // START CODE FOR SILVER CASE TO CALCULATE SL BAL @PRIYANKA-10APR18
            if (document.getElementById('utin_sl_cash_to_metalwt_CRDR').value != '' && document.getElementById('utin_sl_cash_to_metalwt').value > 0) {

                if ((document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR')) {

                    silverBal = (parseFloat(silverBal) + parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);
                }

                if ((document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR')) {

                    silverBal = (parseFloat(silverBal) - parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);

                    if (silverBal < 0) {
                        document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('utin_sl_cash_to_metalwt_CRDR').value;
                    }
                }

                if (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == '' &&
                        (document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR' ||
                                document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR')) {
                    //alert('love ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                    //alert('love TransCRDR ' + document.getElementById(prefix + 'TransCRDR').value);
                    if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                            document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR') ||
                            (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                    document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR')) {
                        //alert('love silverBal ' + silverBal);
                        //alert('love cr ' + document.getElementById('utin_sl_cash_to_metalwt_CRDR').value);
                        //alert('love val ' + document.getElementById('utin_sl_cash_to_metalwt').value);
                        silverBal = (parseFloat(silverBal) - parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);

                        //alert('prefix ' + prefix);
                        if (prefix == 'slPr') {
                            if (silverBal > 0)
                                document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                        } else {
                            if (silverBal < 0)
                                document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                        }

                    } else {
                        //alert('an ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                        if (document.getElementById(prefix + 'FinalSlCRDR').value == document.getElementById('utin_sl_cash_to_metalwt_CRDR').value)
                            silverBal = (parseFloat(silverBal) + parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);
                        else
                            silverBal = (parseFloat(silverBal) - parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);
                        //
                        if (prefix == 'slPr') {
                            if (silverBal > 0)
                                document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                        } else {
                            if (silverBal < 0)
                                document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                        }
                    }

                }

            }
            // END CODE FOR SILVER CASE TO CALCULATE SL BAL @PRIYANKA-10APR18

            // START CODE FOR SILVER CASE TO CALCULATE SL BAL ACCORDING CASH CONVERT METAL @PRIYANKA-10APR18
            if (document.getElementById('CashToSlMetalWtCRDR').value != '' && document.getElementById('CashToSlMetalWt').value > 0) {

                if ((document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('CashToSlMetalWtCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('CashToSlMetalWtCRDR').value == 'DR')) {

                    silverBal = (parseFloat(silverBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);
                    document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
                    //alert('FinalSlCRDRFinalSlCRDR12 == ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                }

                if ((document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('CashToSlMetalWtCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('CashToSlMetalWtCRDR').value == 'CR')) {

                    silverBal = (parseFloat(silverBal) - parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);

                    if (silverBal < 0) {
                        document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
                    }
                    //alert('FinalSlCRDRFinalSlCRDR11 == ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                }

                if (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == '' &&
                        (document.getElementById('CashToSlMetalWtCRDR').value == 'DR' ||
                                document.getElementById('CashToSlMetalWtCRDR').value == 'CR')) {

                    if (document.getElementById('paymentMode').value == 'RateCut') {

                        //silverBal = (parseFloat(silverBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);
                        //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;

                        // START CODE FOR Sell Panel CASH TO METAL Issue @PRIYANKA-28JUNE18
                        if ((document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == '' &&
                                document.getElementById('CashToSlMetalWtCRDR').value == 'CR' &&
                                document.getElementById(prefix + 'FinalSlCRDR').value == 'DR') ||
                                (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == '' &&
                                        document.getElementById('CashToSlMetalWtCRDR').value == 'DR' &&
                                        document.getElementById(prefix + 'FinalSlCRDR').value == 'CR')) {

//                            if (silverBal < document.getElementById('CashToSlMetalWt').value) {
//                                document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
//                            }

                            silverBal = (parseFloat(silverBal) - parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);
                            ////alert('silverBal CRDR8 == ' + silverBal);
                            //alert('CashToSlMetalWt CRDR8 == ' + document.getElementById('CashToSlMetalWt').value);
//
                            if (prefix == 'slPr') {
                                if (silverBal > 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            } else {
                                if (silverBal < 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            }

                            //alert('FinalSlCRDRFinalSlCRDR8 == ' + document.getElementById(prefix + 'FinalSlCRDR').value);

                        } else if ((document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == '' &&
                                document.getElementById('CashToSlMetalWtCRDR').value == 'CR') &&
                                document.getElementById(prefix + 'FinalSlCRDR').value == 'CR') {

//                            if (silverBal < document.getElementById('CashToSlMetalWt').value) {
//                                document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
//                            }

                            silverBal = (parseFloat(silverBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);

                            if (prefix == 'slPr') {
                                if (silverBal > 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            } else {
                                if (silverBal < 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            }

                        } else {

                            silverBal = (parseFloat(silverBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);
                            //alert('silverBal ##== ' + silverBal);
                            //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
                            //
                            //
                            if (prefix == 'slPr') {
                                if (silverBal > 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            } else {
                                if (silverBal < 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            }
                            //alert('FinalSlCRDRFinalSlCRDR5 == ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                        }
                        // END CODE FOR Sell Panel CASH TO METAL Issue @PRIYANKA-28JUNE18


                    }

                    if (document.getElementById('paymentMode').value == 'NoRateCut') {

                        if ((document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR' &&
                                document.getElementById('CashToSlMetalWtCRDR').value == 'CR') ||
                                (document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR' &&
                                        document.getElementById('CashToSlMetalWtCRDR').value == 'DR')) {

                            //alert('utin_sl_cash_to_metalwt_CRDR == ' + document.getElementById('utin_sl_cash_to_metalwt_CRDR').value);
                            //alert('CashToSlMetalWtCRDR == ' + document.getElementById('CashToSlMetalWtCRDR').value);
                            //alert('CashToSlMetalWt == ' + document.getElementById('CashToSlMetalWt').value);
                            //alert('silverBal == ' + silverBal);
                            //alert('FinalSlCRDRFinalSlCRDR3 == ' + document.getElementById(prefix + 'FinalSlCRDR').value);

                            if (document.getElementById(prefix + 'FinalSlCRDR').value == document.getElementById('CashToSlMetalWtCRDR').value)
                                silverBal = (parseFloat(silverBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);
                            else
                                silverBal = (parseFloat(silverBal) - parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);

                            //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;

                            if (prefix == 'slPr') {
                                if (silverBal > 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            } else {
                                if (silverBal < 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            }

                            //alert('FinalSlCRDRFinalSlCRDR3 == ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                        } else if ((document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR' &&
                                document.getElementById('CashToSlMetalWtCRDR').value == 'DR') ||
                                (document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR' &&
                                        document.getElementById('CashToSlMetalWtCRDR').value == 'CR')) {

                            silverBal = (parseFloat(silverBal) - parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);

                            if (silverBal < 0) {
                                document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
                            } else {
                                document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('utin_sl_cash_to_metalwt_CRDR').value;
                            }
                            //alert('FinalSlCRDRFinalSlCRDR2 == ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                        } else if (document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == '' &&
                                (document.getElementById('CashToSlMetalWtCRDR').value == 'DR' ||
                                        document.getElementById('CashToSlMetalWtCRDR').value == 'CR')) {

                            //alert('CashToSlMetalWtCRDR == ' + document.getElementById('CashToSlMetalWtCRDR').value);

                            //alert('silverBal == ' + silverBal);
                            //alert('CashToSlMetalWt == ' + document.getElementById('CashToSlMetalWt').value);
                            //
                            if (document.getElementById(prefix + 'FinalSlCRDR').value == document.getElementById('CashToSlMetalWtCRDR').value)
                                silverBal = (parseFloat(silverBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);
                            else
                                silverBal = (parseFloat(silverBal) - parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);
                            //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
                            //
                            if (prefix == 'slPr') {
                                if (silverBal > 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            } else {
                                if (silverBal < 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            }

                            //alert('FinalSlCRDRFinalSlCRDR1 == ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                        }
                    }

                }

            }
            // END CODE FOR SILVER CASE TO CALCULATE SL BAL ACCORDING CASH CONVERT METAL @PRIYANKA-10APR18

        }

        if (document.getElementById('paymentMode').value == 'RateCut') {

            if ((document.getElementById(prefix + 'SilverRtCtWtBal').value).trim() == '' || document.getElementById(prefix + 'SilverRtCtWtBal').value == 'NaN') {
                document.getElementById(prefix + 'SilverRtCtWtBal').value = 0;
            }

            var silverRtCt = parseFloat(document.getElementById(prefix + 'SilverRtCtWtBal').value);
            var silverRtCtWtType = document.getElementById(prefix + 'SilverRtCtWtBalType').value;

            if (silverBal == '' || silverBal == null) {
                silverBal = 0;
            }

            silverRtCt = convertWeight(silverRtCt, silverWtType, silverRtCtWtType);
            document.getElementById('metal2RtCtWtBal').value = silverRtCt + ' ' + silverWtType;
        }

        document.getElementById('metal2WtBal').value = Math.abs(parseFloat(silverBal - silverRtCt)).toFixed(3) + ' ' + silverWtType; // Final balance in rate cut division
        document.getElementById('metal2WtFinBal').value = Math.abs(parseFloat(silverBal - silverRtCt)).toFixed(3) + ' ' + silverWtType; // Final balance in display division
        //
        if (prefix == 'slPr') {
            if ((silverBal - silverRtCt) > 0)
                document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
            else
                document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
        } else {
            if ((silverBal - silverRtCt) < 0)
                document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
            else
                document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
        }
        //
        // START OF CODE TO SET COLOR FOR SILVER WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        // START CODE TO Set color of metal balance (SL WT) according to CR/DR on payment panel @PRIYANKA-13MAR18
        if (document.getElementById(prefix + 'FinalSlCRDR').value == 'CR') {
            document.getElementById('metal2WtFinBal').style.color = 'green';
            document.getElementById(prefix + 'FinalSlCRDR').style.color = 'green';
            //document.getElementById('metal2WtFinBal').style.color = 'green';
            //document.getElementById(prefix + 'FinalSlCRDR').style.color = 'green';
        } else if (document.getElementById(prefix + 'FinalSlCRDR').value == 'DR') {
            document.getElementById('metal2WtFinBal').style.color = 'red';
            document.getElementById(prefix + 'FinalSlCRDR').style.color = 'red';
            //document.getElementById('metal2WtFinBal').style.color = 'red';
            //document.getElementById(prefix + 'FinalSlCRDR').style.color = 'red';
        }
        // END CODE TO Set color of metal balance (SL WT) according to CR/DR on payment panel @PRIYANKA-13MAR18
        // END OF CODE TO SET COLOR FOR SILVER WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18


        //
        //START CODE FOR CRYSTAL @AUTHOR DARSHANA 17 JUNE 2021
        if ((document.getElementById(prefix + 'CrystalWtPrevBal').value).trim() == '' || document.getElementById(prefix + 'CrystalWtPrevBal').value == 'NaN') {
            document.getElementById(prefix + 'CrystalWtPrevBal').value = 0;
        }
        if ((document.getElementById(prefix + 'CrystalWtRecBal').value).trim() == '' || document.getElementById(prefix + 'CrystalWtRecBal').value == 'NaN') {
            document.getElementById(prefix + 'CrystalWtRecBal').value = 0;
        }
        //
//START CODE FOR CRYSTAL : DARSHANA 
        var crystalBal = calcWeightBalance(prefix, document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value, document.getElementById(prefix + 'CrystalWtPrevBal').value, document.getElementById(prefix + 'CrystalTotFineWt').value, document.getElementById(prefix + 'CrystalWtRecBal').value, document.getElementById(prefix + 'RtCtStCRDR'));
//       alert('crystalBal=' + crystalBal);
        var crystalRtCt = 0;
        var crystalWtType = document.getElementById(prefix + 'CrystalTotFineWtType').value;
//alert('crystalBal'.crystalBal);
        if (document.getElementById('paymentMode').value == 'NoRateCut' || document.getElementById('paymentMode').value == 'RateCut') {

            if (document.getElementById('utin_st_cash_to_metalwt_CRDR').value != '' && document.getElementById('utin_st_cash_to_metalwt').value > 0) {
//                alert('hiii');

                if ((document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'DR')) {

                    crystalBal = (parseFloat(crystalBal) + parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);
//                    alert('crystalBal==22==' + crystalBal);
                }

                if ((document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'CR')) {

                    crystalBal = (parseFloat(crystalBal) - parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);

                    if (crystalBal < 0) {
                        document.getElementById(prefix + 'FinalStCRDR').value = document.getElementById('utin_st_cash_to_metalwt_CRDR').value;
                    }
                }

                if (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == '' &&
                        (document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'DR' ||
                                document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'CR')) {
                    //alert('love ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                    //alert('love TransCRDR ' + document.getElementById(prefix + 'TransCRDR').value);
                    if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                            document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'DR') ||
                            (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                    document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'CR')) {
                        //alert('love silverBal ' + silverBal);
                        //alert('love cr ' + document.getElementById('utin_sl_cash_to_metalwt_CRDR').value);
                        //alert('love val ' + document.getElementById('utin_sl_cash_to_metalwt').value);
                        crystalBal = (parseFloat(crystalBal) - parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);

                        //alert('prefix ' + prefix);
                        if (prefix == 'slPr') {
                            if (crystalBal > 0)
                                document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                        } else {
                            if (crystalBal < 0)
                                document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                        }

                    } else {
                        //alert('an ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                        if (document.getElementById(prefix + 'FinalStCRDR').value == document.getElementById('utin_st_cash_to_metalwt_CRDR').value)
                            crystalBal = (parseFloat(crystalBal) + parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);
                        else
                            crystalBal = (parseFloat(crystalBal) - parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);
                        //
                        if (prefix == 'slPr') {
                            if (crystalBal > 0)
                                document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                        } else {
                            if (crystalBal < 0)
                                document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                        }
                    }

                }

            }
        }
        if (document.getElementById('paymentMode').value == 'RateCut') {

            if ((document.getElementById(prefix + 'CrystalRtCtWtBal').value).trim() == '' || document.getElementById(prefix + 'CrystalRtCtWtBal').value == 'NaN') {
                document.getElementById(prefix + 'CrystalRtCtWtBal').value = 0;
            }

            var crystalRtCt = parseFloat(document.getElementById(prefix + 'CrystalRtCtWtBal').value);
            var crystalRtCtWtType = document.getElementById(prefix + 'CrystalRtCtWtBalType').value;

            if (crystalBal == '' || crystalBal == null) {
                crystalBal = 0;
            }

            crystalRtCt = convertWeight(crystalRtCt, crystalWtType, crystalRtCtWtType);
//            alert('crystalRtCt'+crystalRtCt);
            document.getElementById('metal3RtCtWtBal').value = crystalRtCt + ' ' + crystalWtType;
        }
//        alert('crystalBal' + crystalBal);
//        alert('crystalRtCt' + crystalRtCt);
        document.getElementById('metal3WtBal').value = Math.abs(parseFloat(crystalBal - crystalRtCt)).toFixed(3) + ' ' + crystalWtType; // Final balance in rate cut division
        document.getElementById('metal3WtFinBal').value = Math.abs(parseFloat(crystalBal - crystalRtCt)).toFixed(3) + ' ' + crystalWtType; // Final balance in display division
        //
        if (prefix == 'slPr') {
            if ((crystalBal - crystalRtCt) > 0)
                document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
            else
                document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
        } else {
            if ((crystalBal - crystalRtCt) < 0)
                document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
            else
                document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
        }
        if (document.getElementById(prefix + 'FinalStCRDR').value == 'CR') {
            document.getElementById('metal3WtFinBal').style.color = 'green';
            document.getElementById(prefix + 'FinalStCRDR').style.color = 'green';
            //document.getElementById('metal2WtFinBal').style.color = 'green';
            //document.getElementById(prefix + 'FinalSlCRDR').style.color = 'green';
        } else if (document.getElementById(prefix + 'FinalStCRDR').value == 'DR') {
            document.getElementById('metal3WtFinBal').style.color = 'red';
            document.getElementById(prefix + 'FinalStCRDR').style.color = 'red';
            //document.getElementById('metal2WtFinBal').style.color = 'red';
            //document.getElementById(prefix + 'FinalSlCRDR').style.color = 'red';
        }
        // FOR GOLD CASE @PRIYANKA05APR18
        var utinCashToMetalWt = document.getElementById('utin_cash_to_metalwt').value;
        var CashToGdMetalWt = document.getElementById('CashToGdMetalWt').value;
        // FOR SILVER CASE @PRIYANKA-10APR18
        var utinCashToSLMetalWt = document.getElementById('utin_sl_cash_to_metalwt').value;
        var CashToSlMetalWt = document.getElementById('CashToSlMetalWt').value;
        //FOR CRYSTAL CASE @DARSHANA 17JUNE21
        var utinCashToSTMetalWt = document.getElementById('utin_st_cash_to_metalwt').value;
        var CashToStMetalWt = document.getElementById('CashToStMetalWt').value;
        
        if (utinCashToMetalWt > 0 || CashToGdMetalWt > 0 || utinCashToSLMetalWt > 0 || CashToSlMetalWt > 0 || utinCashToSTMetalWt > 0 || CashToStMetalWt > 0) {
            //document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById(prefix + 'RtCtGdCRDR').value;
        } else {
            document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById(prefix + 'RtCtGdCRDR').value;
            document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById(prefix + 'RtCtSlCRDR').value;
            document.getElementById(prefix + 'FinalStCRDR').value = document.getElementById(prefix + 'RtCtStCRDR').value;
            //alert('FinalSlCRDRFinalSlCRDR00 == ' + document.getElementById(prefix + 'FinalSlCRDR').value);
        }
        //END CODE FOR CRYSTAK @AUTHOR DARSHANA 17 JUNE 2021

        calcRawMetStock(prefix);
    }
    ////alert('FinalSlCRDRFinalSlCRDR00 == ' + document.getElementById(prefix + 'FinalSlCRDR').value);
        calcPaymentCashBalance(prefix);
//
    finalPaymentPanelFun(prefix);
}

function calcWeightBalance(prefix, prevWtCRDR, prevWtBal, finalFineWt, totRecWt, rtCtCRDRID) {
//alert('prevWtCRDR=' + prevWtCRDR);
//alert('prevWtBal=' + prevWtBal);
//alert('finalFineWt=' + finalFineWt);
//alert('totRecWt= ' + totRecWt);
//alert('rtCtCRDRID=' + rtCtCRDRID);
    var wtBal = 0;
    var wtBalCRDR = null;

    if (prevWtCRDR == '' && (prevWtBal == '' || prevWtBal == 0)) {
        prevWtCRDR = document.getElementById(prefix + 'TransCRDR').value;
    }

//    alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);
//    alert('prevWtCRDR == ' + prevWtCRDR);    
//    alert('finalFineWt == ' + finalFineWt);
//    alert('totRecWt == ' + totRecWt);
//    alert('prevWtBal == ' + prevWtBal);

    // START @PRIYANKA-29MAY18
    // START @PRIYANKA-26MAY18
    // PAYMENT PANEL : SELL PANEL SET TRANS CR/DR @PRIYANKA-23MAR18
    if ((document.getElementById("payPanelName").value == 'SlPrPayment' ||
            document.getElementById("payPanelName").value == 'SellPayUp' ||
            document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
            document.getElementById("payPanelName").value == 'ItemRepairPayUp' ||
            document.getElementById("payPanelName").value == 'ApprovalPayment' ||
            document.getElementById("payPanelName").value == 'ApprovalPayUp' ||
            document.getElementById("payPanelName").value == 'RawPayUp' ||
            document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
            document.getElementById("payPanelName").value == 'PurchaseReturnPayUp' ||
            document.getElementById('transPanelName').value == 'SellPayment' ||
            document.getElementById("transPanelName").value == 'SellPayUp' ||
            document.getElementById("transPanelName").value == 'ApprovalPayUp' ||
            document.getElementById("payPanelName").value == 'ImitationSellPayment' ||
            document.getElementById("payPanelName").value == 'ImitationSellPayUp' ||
            document.getElementById("payPanelName").value == 'CrySellPayment' ||
            document.getElementById("payPanelName").value == 'CrySellPayUp' ||
            document.getElementById("payPanelName").value == 'NewOrderPayment' ||
            document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
            document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
            document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
            document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
            document.getElementById("payPanelName").value == 'StrlleringSellPayUp') &&
            (document.getElementById('paymentMode').value == 'RateCut' ||
                    document.getElementById('paymentMode').value == 'NoRateCut')) {
        document.getElementById(prefix + 'TransCRDR').value = 'DR';
    }
    // END @PRIYANKA-26MAY18

    // PAYMENT PANEL : PURCHASE PANEL SET TRANS CR/DR @PRIYANKA-23MAR18
    if ((document.getElementById("payPanelName").value == 'StockPayment' ||
            document.getElementById("payPanelName").value == 'StockPayUp' ||
            document.getElementById("transPanelName").value == 'PurchasePayUp' ||
            document.getElementById("payPanelName").value == 'ImitationStockPayment' ||
            document.getElementById("payPanelName").value == 'ImitationStockPayUp' ||
            document.getElementById("payPanelName").value == 'CrystalStockPayment' ||
            document.getElementById("payPanelName").value == 'CrystalStockPayUp' ||
            document.getElementById("payPanelName").value == 'StockReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPanel' ||
            document.getElementById("payPanelName").value == 'SchemePayment' ||
            document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
            document.getElementById('PaymentReceiptPanel').value == 'PAYMENT') &&
            (document.getElementById('paymentMode').value == 'RateCut' ||
                    document.getElementById('paymentMode').value == 'NoRateCut')) {
        document.getElementById(prefix + 'TransCRDR').value = 'CR';
    }
    // END @PRIYANKA-29MAY18

    if ((prevWtCRDR == 'CR' && document.getElementById(prefix + 'TransCRDR').value == 'DR') ||
            (prevWtCRDR == 'DR' && document.getElementById(prefix + 'TransCRDR').value == 'CR')) {
       
        if (document.getElementById(prefix + 'TransCRDR').value == 'DR') {
            //
            wtBal = parseFloat(finalFineWt) - parseFloat(totRecWt) - parseFloat(prevWtBal);
            //
//            alert('wtBal 1== ' + wtBal);
            //
        } else if (document.getElementById(prefix + 'TransCRDR').value == 'CR') {
            //
            wtBal = parseFloat(prevWtBal) + parseFloat(totRecWt) - parseFloat(finalFineWt);
            //
//            alert('wtBal 2== ' + wtBal);
            //
        }
            
    } else if ((prevWtCRDR == 'CR' && document.getElementById(prefix + 'TransCRDR').value == 'CR') ||
            (prevWtCRDR == 'DR' && document.getElementById(prefix + 'TransCRDR').value == 'DR')) { 

        //if (document.getElementById('utin_cash_to_metalwt_CRDR').value == '') {
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // START CODE TO CHECK TRANSACTION CR DR FOR WEIGHT BAL WHEN CLICK ON NO RATE CUT AFTER RATE CUT @AUTHOR:MADHUREE-16JULY2020 //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        //
        if (document.getElementById(prefix + 'TransCRDR').value == 'DR') {
            //
            wtBal = parseFloat(finalFineWt) - parseFloat(totRecWt) + parseFloat(prevWtBal);
            //
        } else if (document.getElementById(prefix + 'TransCRDR').value == 'CR') {
            //
            if(prevWtCRDR == document.getElementById(prefix + 'TransCRDR').value && (document.getElementById("payPanelName").value == 'StockPayment' || document.getElementById("payPanelName").value == 'StockPayUp')) {
                //Added balance wt for ratecut at update section ::Prathamesh
                wtBal = parseFloat(prevWtBal) - parseFloat(totRecWt) + parseFloat(finalFineWt);
            } else 
                wtBal = parseFloat(prevWtBal) + parseFloat(totRecWt) - parseFloat(finalFineWt);
            //
        }
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // END CODE TO CHECK TRANSACTION CR DR FOR WEIGHT BAL WHEN CLICK ON NO RATE CUT AFTER RATE CUT @AUTHOR:MADHUREE-16JULY2020 //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        //
        wtBalCRDR = document.getElementById(prefix + 'TransCRDR').value;

//        alert('wtBal 3 == ' + wtBal);

        //} else if (document.getElementById('utin_cash_to_metalwt_CRDR').value != '') {

        //alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);
        //alert('prevWtCRDR == ' + prevWtCRDR);
        //alert('utin_cash_to_metalwt_CRDR == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);

//        if (prevWtCRDR == 'CR' && document.getElementById(prefix + 'TransCRDR').value == 'CR' 
//            && document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR') {
//            
//           wtBal = parseFloat(finalFineWt) + parseFloat(prevWtBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value) - parseFloat(totRecWt);
//           wtBalCRDR = document.getElementById(prefix + 'TransCRDR').value;
//            
//        } else if ((prevWtCRDR == 'DR' && document.getElementById(prefix + 'TransCRDR').value == 'DR') 
//            && document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR') {
//            
//           wtBal = parseFloat(finalFineWt) + parseFloat(prevWtBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value) - parseFloat(totRecWt);
//           wtBalCRDR = document.getElementById(prefix + 'TransCRDR').value;
//           
//        } else if ((prevWtCRDR == 'CR' && document.getElementById(prefix + 'TransCRDR').value == 'CR') 
//            && document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR') {
//            
//           wtBal = parseFloat(finalFineWt) + parseFloat(prevWtBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value) - parseFloat(totRecWt);
//                      
//        } else if ((prevWtCRDR == 'DR' && document.getElementById(prefix + 'TransCRDR').value == 'DR') 
//            && document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR') {
//            
//           wtBal = parseFloat(finalFineWt) + parseFloat(prevWtBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value) - parseFloat(totRecWt);
//
//        }
//        
//        }

        //alert('wtBal 3 == ' + wtBal);

        if (wtBal < 0) {
            if (wtBalCRDR == 'DR')
                wtBalCRDR = 'CR';
            else
                wtBalCRDR = 'DR';
    }
    }

    if (wtBalCRDR == null) {
        if (wtBal < 0) {
            wtBalCRDR = 'CR';
        } else {
            wtBalCRDR = 'DR';
        }
    }


    rtCtCRDRID.value = wtBalCRDR;
//    alert('wtBal==4==' + wtBal);
    return parseFloat(Math.abs(wtBal)).toFixed(3);
}

// CALCULATES RATE CUT AMOUNT.
function calcRawMetStock(prefix) {
//    alert('calcRawMetStock ==>>' + prefix);
    var weightBal = 0;

    if (document.getElementById(prefix + 'GoldWtPrevBal').value != '' || document.getElementById(prefix + 'GoldTotFineWt').value != '' || document.getElementById(prefix + 'GoldWtRecBal').value != '') {
        if (document.getElementById(prefix + 'GoldWtPrevBal').value == '' || document.getElementById(prefix + 'GoldWtPrevBal').value == 'NaN') {
            document.getElementById(prefix + 'GoldWtPrevBal').value = 0;
        }
        if (document.getElementById(prefix + 'GoldTotFineWt').value == '' || document.getElementById(prefix + 'GoldTotFineWt').value == 'NaN') {
            document.getElementById(prefix + 'GoldTotFineWt').value = 0;
        }
        if (document.getElementById(prefix + 'GoldWtRecBal').value == '' || document.getElementById(prefix + 'GoldWtRecBal').value == 'NaN') {
            document.getElementById(prefix + 'GoldWtRecBal').value = 0;
        }

        if (document.getElementById('paymentMode').value == 'RateCut') {

            if (document.getElementById(prefix + 'GoldRtCtWtBal').value == '' || document.getElementById(prefix + 'GoldRtCtWtBal').value == 'NaN') {
                document.getElementById(prefix + 'GoldRtCtWtBal').value = 0;
            }

            //alert('GoldRtCtWtBal == ' + document.getElementById(prefix + 'GoldRtCtWtBal').value);

            var gdRateCut = convertWeight(parseFloat(document.getElementById(prefix + 'GoldRtCtWtBal').value), document.getElementById(prefix + 'GoldTotFineWtType').value, document.getElementById(prefix + 'GoldRtCtWtBalType').value);

            totFinGdWtBal = calcWeightBalance(prefix, document.getElementById(prefix + 'GoldWtPrevBalCRDR').value, document.getElementById(prefix + 'GoldWtPrevBal').value, document.getElementById(prefix + 'GoldTotFineWt').value, document.getElementById(prefix + 'GoldWtRecBal').value, document.getElementById(prefix + 'RtCtGdCRDR')) - parseFloat(gdRateCut);

            //alert('gdRateCut **== ' + gdRateCut);
            //alert('totFinGdWtBal **== ' + totFinGdWtBal);

            // START @PRIYANKA-05APR18
            if (document.getElementById('utin_cash_to_metalwt_CRDR').value != '' && document.getElementById('utin_cash_to_metalwt').value > 0) {

                if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR')) {
                    //alert('FinalGdCRD33433R == ' + document.getElementById(prefix + 'FinalGdCRDR').value);
//                    alert('utin_cash_to_metalwt_CRDR == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                    if (document.getElementById(prefix + 'FinalGdCRDR').value == document.getElementById('utin_cash_to_metalwt_CRDR').value)
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
                    else
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
                }

                if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR')) {
                    //alert('TransCRDR2 == ' + document.getElementById(prefix + 'TransCRDR').value);
                    //totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                    if (document.getElementById(prefix + 'FinalGdCRDR').value == document.getElementById('utin_cash_to_metalwt_CRDR').value)
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
                    else
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                    if (totFinGdWtBal < 0) { // @PRIYANKA-07FEB19
                        document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;
                    }
                }

                //alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);
                //alert('utin_cash_to_metalwt_CRDR == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);

                if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                        (document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR')) {

//                    alert('FinalGdCRDR111222333 == ' + document.getElementById(prefix + 'FinalGdCRDR').value);
                    //alert('totFinGdWtBal == ' + totFinGdWtBal);
                    //alert('utin_cash_to_metalwt == ' + document.getElementById('utin_cash_to_metalwt').value);

                    //
                    if (document.getElementById(prefix + 'FinalGdCRDR').value == 'DR')
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
                    else
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
                    //
                    //alert('totFinGdWtBal 123 == ' + totFinGdWtBal);

                    if (totFinGdWtBal <= document.getElementById('utin_cash_to_metalwt').value) {
                        document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;
                    } else {
                        if (prefix == 'slPr') {
                            if (totFinGdWtBal > 0)
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                        } else {
                            if (totFinGdWtBal < 0)
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                        }
                    }

                }
                //
                if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                        (document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR')) {
//alert('utin_cash_to_metalwt_CRDR1223123 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                    if (document.getElementById(prefix + 'FinalGdCRDR').value == 'CR')
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
                    else
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
                    //
                    if (prefix == 'slPr') {
                        if (totFinGdWtBal > 0)
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                    } else {
                        if (totFinGdWtBal < 0)
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                    }

                }

            }
            // END @PRIYANKA-05APR18

            // START @PRIYANKA-06APR18
            if (document.getElementById('CashToGdMetalWtCRDR').value != '' && document.getElementById('CashToGdMetalWt').value > 0) {
                //alert('utin_cash_to_metalwt_CRDR123 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('CashToGdMetalWtCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('CashToGdMetalWtCRDR').value == 'DR')) {
                    //alert('GoldWtPrevBalCRDR == ' + document.getElementById(prefix + 'GoldWtPrevBalCRDR').value);
                    //alert('CashToGdMetalWtCRDR == ' + document.getElementById('CashToGdMetalWtCRDR').value);
//                    totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
//                    document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;

                    totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);

                    //
                    if (prefix == 'slPr') {
                        if (totFinGdWtBal > 0)
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                    } else {
                        if (totFinGdWtBal < 0)
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                    }

                }

                if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('CashToGdMetalWtCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('CashToGdMetalWtCRDR').value == 'CR')) {
//alert('utin_cash_to_metalwt_CRDR23389 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                    totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);

                    //
                    if (prefix == 'slPr') {
                        if (totFinGdWtBal > 0)
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                    } else {
                        if (totFinGdWtBal < 0)
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                    }

                }

                if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                        (document.getElementById('CashToGdMetalWtCRDR').value == 'DR' ||
                                document.getElementById('CashToGdMetalWtCRDR').value == 'CR')) {

                    // START CODE FOR Sell Panel CASH TO METAL Issue @PRIYANKA-28JUNE18
                    if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                            document.getElementById('CashToGdMetalWtCRDR').value == 'CR' &&
                            document.getElementById(prefix + 'FinalGdCRDR').value == 'DR') ||
                            (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                                    document.getElementById('CashToGdMetalWtCRDR').value == 'DR' &&
                                    document.getElementById(prefix + 'FinalGdCRDR').value == 'CR')) {
                        //alert('CashToGdMetalWtCRDR322 == ' + document.getElementById('CashToGdMetalWtCRDR').value);
                        //alert('FinalGdCRDR == ' + document.getElementById(prefix + 'FinalGdCRDR').value);
                        //alert('totFinGdWtBal == ' + totFinGdWtBal);
                        //alert('CashToGdMetalWt == ' + document.getElementById('CashToGdMetalWt').value);
                        //alert('utin_cash_to_metalwt_CRDR322 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                        //
                        if (totFinGdWtBal < document.getElementById('CashToGdMetalWt').value) {
                            document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
                        }

                        totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);

                        //alert('totFinGdWtBal ##== ' + totFinGdWtBal);

                    } else if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                            document.getElementById('CashToGdMetalWtCRDR').value == 'CR') &&
                            document.getElementById(prefix + 'FinalGdCRDR').value == 'CR') {
                        //alert('utin_cash_to_metalwt_CRDR555 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                        if (totFinGdWtBal < document.getElementById('CashToGdMetalWt').value) {
                            document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
                        }

                        totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);

                        //alert('totFinGdWtBal ##== ' + totFinGdWtBal);

                    } else {
                        //alert('utin_cash_to_metalwt_CRDR66 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
                        //alert('totFinGdWtBal ##== ' + totFinGdWtBal);
                        document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
                    }
                    // END CODE FOR Sell Panel CASH TO METAL Issue @PRIYANKA-28JUNE18
                }
            }

            //alert('FinalGdCRDR **== ' + document.getElementById(prefix + 'FinalGdCRDR').value);

        } else if (document.getElementById('paymentMode').value == 'NoRateCut') {
            //
            var totFinGdWtBal = calcWeightBalance(prefix, document.getElementById(prefix + 'GoldWtPrevBalCRDR').value, document.getElementById(prefix + 'GoldWtPrevBal').value, document.getElementById(prefix + 'GoldTotFineWt').value, document.getElementById(prefix + 'GoldWtRecBal').value, document.getElementById(prefix + 'RtCtGdCRDR'));
            //
            // START @PRIYANKA-05APR18
            //if (document.getElementById('paymentMode').value == 'NoRateCut') {
            //alert('gdBal **== ' + gdBal);
//                if (document.getElementById('utin_cash_to_metalwt_CRDR').value != '' && document.getElementById('utin_cash_to_metalwt').value > 0) {
//                    totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
//                }
            //alert('gdBal ##== ' + gdBal);
            //}
            // END @PRIYANKA-05APR18
            // START @PRIYANKA-06APR18
//            if (document.getElementById('CashToGdMetalWtCRDR').value != '' && document.getElementById('CashToGdMetalWt').value > 0) {
//                totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);            
//            }
            // END @PRIYANKA-06APR18

            // START @PRIYANKA-05APR18
            if (document.getElementById('utin_cash_to_metalwt_CRDR').value != '' && document.getElementById('utin_cash_to_metalwt').value > 0) {
                //alert('utin_cash_to_metalwt_CRDR33 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR')) {

                    //alert('utin_cash_to_metalwt_CRDR224433 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                    //totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                    if (document.getElementById(prefix + 'FinalGdCRDR').value == document.getElementById('utin_cash_to_metalwt_CRDR').value)
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
                    else
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
                }

                if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR')) {
                    //alert('utin_cash_to_metalwt_CRDR22 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
//                    totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
//
//                    if (totFinGdWtBal < 0) {
//                        document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;
//                    }

                    if (document.getElementById(prefix + 'FinalGdCRDR').value == document.getElementById('utin_cash_to_metalwt_CRDR').value)
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
                    else
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                    if (totFinGdWtBal < 0) { // @PRIYANKA-07FEB19
                        document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;
                    }
                }

                //alert('TransCRDR @@== ' + document.getElementById(prefix + 'TransCRDR').value);
                //alert('utin_cash_to_metalwt_CRDR @@== ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);

                if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                        (document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR' ||
                                document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR')) {
                    //alert('utin_cash_to_metalwt_CRDR11 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                    if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                            document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR') ||
                            (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                    document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR')) {
//alert('TransCRDR0 @@== ' + document.getElementById(prefix + 'TransCRDR').value);
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                        if (totFinGdWtBal < 0) {
                            document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;
                        }

                    } else {
//alert('TransCRDR1 @@== ' + document.getElementById(prefix + 'TransCRDR').value);
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                        document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;
                    }


                    //totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);

                    //document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;

                }

            }
            // END @PRIYANKA-05APR18

            // START @PRIYANKA-06APR18
            if (document.getElementById('CashToGdMetalWtCRDR').value != '' && document.getElementById('CashToGdMetalWt').value > 0) {
//                //alert('utin_cash_to_metalwt_CRDR00 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('CashToGdMetalWtCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('CashToGdMetalWtCRDR').value == 'DR')) {
//alert('utin_cash_to_metalwt_CRDR10 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                    totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
                    document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;

                }

                if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('CashToGdMetalWtCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('CashToGdMetalWtCRDR').value == 'CR')) {
//alert('utin_cash_to_metalwt_CRDR20 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                    totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);

                    if (totFinGdWtBal < 0) {
                        document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
                    }

                }

                if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                        (document.getElementById('CashToGdMetalWtCRDR').value == 'DR' ||
                                document.getElementById('CashToGdMetalWtCRDR').value == 'CR')) {
//alert('utin_cash_to_metalwt_CRDR30 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                    //totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
                    //document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;

                    //alert('utin_cash_to_metalwt_CRDR == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);

                    if ((document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR' &&
                            document.getElementById('CashToGdMetalWtCRDR').value == 'CR') ||
                            (document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR' &&
                                    document.getElementById('CashToGdMetalWtCRDR').value == 'DR')) {
                        //alert('utin_cash_to_metalwt_CRDR1 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);

                        if (document.getElementById(prefix + 'FinalGdCRDR').value == document.getElementById('CashToGdMetalWtCRDR').value)
                            totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
                        else
                            totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);


                        //totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
//alert('utin_cash_to_metalwt_CRDR40 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                        //document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
                        //
                        if (prefix == 'slPr') {
                            if (totFinGdWtBal > 0)
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                        } else {
                            if (totFinGdWtBal < 0)
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                        }

                    } else if ((document.getElementById('utin_cash_to_metalwt_CRDR').value == 'CR' &&
                            document.getElementById('CashToGdMetalWtCRDR').value == 'DR') ||
                            (document.getElementById('utin_cash_to_metalwt_CRDR').value == 'DR' &&
                                    document.getElementById('CashToGdMetalWtCRDR').value == 'CR')) {
                        ////alert('utin_cash_to_metalwt_CRDR2 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                        totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
//alert('utin_cash_to_metalwt_CRDR50 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                        if (totFinGdWtBal < 0) {
                            document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
                        } else {
                            document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('utin_cash_to_metalwt_CRDR').value;
                        }

                    } else if (document.getElementById('utin_cash_to_metalwt_CRDR').value == '' &&
                            (document.getElementById('CashToGdMetalWtCRDR').value == 'DR')) {
                        //alert('utin_cash_to_metalwt_CRDR3 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                        //
                        if (document.getElementById(prefix + 'FinalGdCRDR').value == 'DR')
                            totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
                        else
                            totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
                        //
                        if (prefix == 'slPr') {
                            if (totFinGdWtBal > 0)
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                        } else {
                            if (totFinGdWtBal < 0)
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                        }
                        //  
                        //
//                        totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
//                        document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById('CashToGdMetalWtCRDR').value;
                        //
                    } else if (document.getElementById('utin_cash_to_metalwt_CRDR').value == '' &&
                            (document.getElementById('CashToGdMetalWtCRDR').value == 'CR')) {
                        //alert('utin_cash_to_metalwt_CRDR4 == ' + document.getElementById('utin_cash_to_metalwt_CRDR').value);
                        //
                        if (document.getElementById(prefix + 'FinalGdCRDR').value == 'CR')
                            totFinGdWtBal = (parseFloat(totFinGdWtBal) + parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
                        else
                            totFinGdWtBal = (parseFloat(totFinGdWtBal) - parseFloat(document.getElementById('CashToGdMetalWt').value)).toFixed(3);
                        //
                        if (prefix == 'slPr') {
                            if (totFinGdWtBal > 0)
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                        } else {
                            if (totFinGdWtBal < 0)
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'DR';
                            else
                                document.getElementById(prefix + 'FinalGdCRDR').value = 'CR';
                        }
                        //  
                    }
                }
            }
        }
        // END @PRIYANKA-06APR18

        document.getElementById('metal1WtFinBal').value = Math.abs(parseFloat(totFinGdWtBal)).toFixed(3) + ' ' + document.getElementById(prefix + 'GoldTotFineWtType').value;

        //alert('metal1WtFinBal == ' + document.getElementById('metal1WtFinBal').value);

        // START OF CODE TO SET COLOR FOR GOLD WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        // START CODE TO Set color of metal balance (GD WT) according to CR/DR on payment panel @PRIYANKA-13MAR18
        if (document.getElementById(prefix + 'FinalGdCRDR').value == 'CR') {
            document.getElementById('metal1WtFinBal').style.color = 'green';
            document.getElementById(prefix + 'FinalGdCRDR').style.color = 'green';
            //document.getElementById('metal1WtFinBal').style.color = 'green';
            //document.getElementById(prefix + 'FinalGdCRDR').style.color = 'green';
        } else if (document.getElementById(prefix + 'FinalGdCRDR').value == 'DR') {
            document.getElementById('metal1WtFinBal').style.color = 'red';
            document.getElementById(prefix + 'FinalGdCRDR').style.color = 'red';
            //document.getElementById('metal1WtFinBal').style.color = 'red';
            //document.getElementById(prefix + 'FinalGdCRDR').style.color = 'red';
        }
        // END CODE TO Set color of metal balance (GD WT) according to CR/DR on payment panel @PRIYANKA-13MAR18
        // END OF CODE TO SET COLOR FOR GOLD WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        document.getElementById(prefix + 'GoldWtFinBal').value = Math.abs(parseFloat(totFinGdWtBal)).toFixed(3);
        document.getElementById(prefix + 'GoldWtFinBalType').value = document.getElementById(prefix + 'GoldTotFineWtType').value;

        // ADDING CONDITION FOR METAL BALANCE ACCORDING TO METAL AMOUNT CASE @PRIYANKA-23MAR18
        if (document.getElementById('paymentMode').value == 'RateCut' && setAmtToMetCon != 'changeMetAmtToMetWt') {

            var payTotalWeightType1 = document.getElementById(prefix + 'GoldRtCtWtBalType').value;

            // START CODE FOR UPDATE ENTRY CASE 
            // (NO RATE CUT TO RATE CUT - FINAL METAL BALANCE/VALUATION NOT CALCUATED ISSUE) @PRIYANKA-12FEB19
            if (document.getElementById('paymentMode').value == 'RateCut' && document.getElementById(prefix + 'GoldRtCtWtBal').value > 0) {
                var goldWeight = document.getElementById(prefix + 'GoldRtCtWtBal').value;
            } else if (document.getElementById('paymentMode').value == 'RateCut') {
                var goldWeight = document.getElementById(prefix + 'GoldRtCtWtBal').value;
            }
            // END CODE FOR UPDATE ENTRY CASE 
            // (NO RATE CUT TO RATE CUT - FINAL METAL BALANCE/VALUATION NOT CALCUATED ISSUE) @PRIYANKA-12FEB19

            var payMetalRate1 = document.getElementById(prefix + 'GoldRate').value;

            if (payTotalWeightType1 == 'KG') {
                document.getElementById(prefix + 'GoldValuation').value = Math_round(parseFloat((goldWeight * payMetalRate1) * document.getElementById('gmWtInKg').value)).toFixed(2);
            } else if (payTotalWeightType1 == 'GM') {
                document.getElementById(prefix + 'GoldValuation').value = Math_round(parseFloat((goldWeight * payMetalRate1) / (document.getElementById('gmWtInGm').value))).toFixed(2);
            } else if (payTotalWeightType1 == 'MG') {
                document.getElementById(prefix + 'GoldValuation').value = Math_round(parseFloat((goldWeight * payMetalRate1) / (document.getElementById('gmWtInMg').value))).toFixed(2);
            }

            document.getElementById(prefix + 'PayGoldWtBal').value = parseFloat(goldWeight).toFixed(3);
        }

    }
    //alert('FinalSlCRDR123123 ##== ' + document.getElementById(prefix + 'FinalSlCRDR').value);
    if (document.getElementById(prefix + 'SilverWtPrevBal').value != '' || document.getElementById(prefix + 'SilverTotFineWt').value != '' || document.getElementById(prefix + 'SilverWtRecBal').value != '') {
        if (document.getElementById(prefix + 'SilverWtPrevBal').value == '' || document.getElementById(prefix + 'SilverWtPrevBal').value == 'NaN') {
            document.getElementById(prefix + 'SilverWtPrevBal').value = 0;
        }
        if (document.getElementById(prefix + 'SilverTotFineWt').value == '' || document.getElementById(prefix + 'SilverTotFineWt').value == 'NaN') {
            document.getElementById(prefix + 'SilverTotFineWt').value = 0;
        }
        if (document.getElementById(prefix + 'SilverWtRecBal').value == '' || document.getElementById(prefix + 'SilverWtRecBal').value == 'NaN') {
            document.getElementById(prefix + 'SilverWtRecBal').value = 0;
        }

        if (document.getElementById('paymentMode').value == 'RateCut') {

            if (document.getElementById(prefix + 'SilverRtCtWtBal').value == '' || document.getElementById(prefix + 'SilverRtCtWtBal').value == 'NaN') {
                document.getElementById(prefix + 'SilverRtCtWtBal').value = 0;
            }

            var slRateCut = convertWeight(parseFloat(document.getElementById(prefix + 'SilverRtCtWtBal').value), document.getElementById(prefix + 'SilverTotFineWtType').value, document.getElementById(prefix + 'SilverRtCtWtBalType').value);

            totFinSrWtBal = calcWeightBalance(prefix, document.getElementById(prefix + 'SilverWtPrevBalCRDR').value, document.getElementById(prefix + 'SilverWtPrevBal').value, document.getElementById(prefix + 'SilverTotFineWt').value, document.getElementById(prefix + 'SilverWtRecBal').value, document.getElementById(prefix + 'RtCtSlCRDR')) - parseFloat(slRateCut);

        } else if (document.getElementById('paymentMode').value == 'NoRateCut') {

            var totFinSrWtBal = calcWeightBalance(prefix, document.getElementById(prefix + 'SilverWtPrevBalCRDR').value, document.getElementById(prefix + 'SilverWtPrevBal').value, document.getElementById(prefix + 'SilverTotFineWt').value, document.getElementById(prefix + 'SilverWtRecBal').value, document.getElementById(prefix + 'RtCtSlCRDR'));

        }
        //alert('totFinSrWtBa22111144444 ##== ' + totFinSrWtBal);
        if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
            ////alert('totFinSrWtBal11111 ##== ' + totFinSrWtBal);
            // START CODE FOR SILVER CASE TO CALCULATE SL BAL @PRIYANKA-10APR18
            if (document.getElementById('utin_sl_cash_to_metalwt_CRDR').value != '' && document.getElementById('utin_sl_cash_to_metalwt').value > 0) {

                if ((document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR')) {
                    //alert('totFinSrWtBa221111 ##== ' + totFinSrWtBal);
                    //totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);
                    //
                    if (document.getElementById(prefix + 'FinalSlCRDR').value == document.getElementById('utin_sl_cash_to_metalwt_CRDR').value)
                        totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);
                    else
                        totFinSrWtBal = (parseFloat(totFinSrWtBal) - parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);
                }

                if ((document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR')) {
                    //alert('totFinSrWtBa331111 ##== ' + totFinSrWtBal);
                    //totFinSrWtBal = (parseFloat(totFinSrWtBal) - parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);

                    if (document.getElementById(prefix + 'FinalSlCRDR').value == document.getElementById('utin_sl_cash_to_metalwt_CRDR').value)
                        totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);
                    else
                        totFinSrWtBal = (parseFloat(totFinSrWtBal) - parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);


                    if (totFinSrWtBal < 0) {
                        document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('utin_sl_cash_to_metalwt_CRDR').value;
                    }



                }

                if (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == '' &&
                        (document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR' ||
                                document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR')) {
                    //alert('totFinSrWtBal2222 ##== ' + totFinSrWtBal);
                    if (document.getElementById('paymentMode').value == 'NoRateCut') {

                        if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                                document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR') ||
                                (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                        document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR')) {

                            totFinSrWtBal = (parseFloat(totFinSrWtBal) - parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);

//                            if (totFinSrWtBal < 0) {
//                                document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('utin_sl_cash_to_metalwt_CRDR').value;
//                            }
                            //
                            if (prefix == 'slPr') {
                                if (totFinSrWtBal > 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            } else {
                                if (totFinSrWtBal < 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            }

                        } else {
                            //alert('totFinSrWtBa3311115656 ##== ' + totFinSrWtBal);
                            totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);

                            //
                            if (prefix == 'slPr') {
                                if (totFinSrWtBal > 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            } else {
                                if (totFinSrWtBal < 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            }

                            //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('utin_sl_cash_to_metalwt_CRDR').value;
                        }

                    } else {
                        //alert('totFinSrWtBal7 ##== ' + totFinSrWtBal);
                        //alert('utin_sl_cash_to_metalwt ##== ' + document.getElementById('utin_sl_cash_to_metalwt').value);
                        //totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);
                        //alert('totFinSrWtBal7777 ##== ' + totFinSrWtBal);
                        //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('utin_sl_cash_to_metalwt_CRDR').value;
                        //
                        //
                        if (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == '' &&
                                (document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR' ||
                                        document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR')) {
                            //alert('love7900 ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                            ////alert('love TransCRDR ' + document.getElementById(prefix + 'TransCRDR').value);
                            if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                                    document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR') ||
                                    (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                            document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR')) {
                                //alert('love silverBal ' + silverBal);
                                //alert('love cr ' + document.getElementById('utin_sl_cash_to_metalwt_CRDR').value);
                                //alert('love val9090 ' + document.getElementById('utin_sl_cash_to_metalwt').value);
                                totFinSrWtBal = (parseFloat(totFinSrWtBal) - parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);

                                //alert('totFinSrWtBal565689 ' + totFinSrWtBal);
                                //
                                if (prefix == 'slPr') {
                                    if (totFinSrWtBal > 0)
                                        document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                    else
                                        document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                                } else {
                                    if (totFinSrWtBal < 0)
                                        document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                    else
                                        document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                                }

                            } else {
                                //alert('an700 ');
                                if (document.getElementById(prefix + 'FinalSlCRDR').value == document.getElementById('utin_sl_cash_to_metalwt_CRDR').value)
                                    totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);
                                else
                                    totFinSrWtBal = (parseFloat(totFinSrWtBal) - parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);
                                //
                                //alert('an700000 ');
                                //
                                if (prefix == 'slPr') {
                                    if (totFinSrWtBal > 0)
                                        document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                    else
                                        document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                                } else {
                                    if (totFinSrWtBal < 0)
                                        document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                    else
                                        document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                                }
                            }
                            //
                        }
                    }
                }

            }
            // END CODE FOR SILVER CASE TO CALCULATE SL BAL @PRIYANKA-10APR18

            // START CODE FOR SILVER CASE TO CALCULATE SL BAL ACCORDING CASH CONVERT METAL @PRIYANKA-10APR18
            if (document.getElementById('CashToSlMetalWtCRDR').value != '' && document.getElementById('CashToSlMetalWt').value > 0) {
                //alert('totFinSrWtBal6563454 ##== ' + totFinSrWtBal);
                if ((document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('CashToSlMetalWtCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('CashToSlMetalWtCRDR').value == 'DR')) {
                    //alert('totFinSrWtBal5555555 ##== ' + totFinSrWtBal);
                    totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);
                    //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
                    //
                    if (prefix == 'slPr') {
                        if (totFinSrWtBal > 0)
                            document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                    } else {
                        if (totFinSrWtBal < 0)
                            document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                    }

                }

                if ((document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('CashToSlMetalWtCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('CashToSlMetalWtCRDR').value == 'CR')) {
                    //alert('totFinSrWtBal66666666 ##== ' + totFinSrWtBal);
                    totFinSrWtBal = (parseFloat(totFinSrWtBal) - parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);

//                    if (totFinSrWtBal < 0) {
//                        document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
//                    }

                    //
                    if (prefix == 'slPr') {
                        if (totFinSrWtBal > 0)
                            document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                    } else {
                        if (totFinSrWtBal < 0)
                            document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                    }

                }

                if (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == '' &&
                        (document.getElementById('CashToSlMetalWtCRDR').value == 'DR' ||
                                document.getElementById('CashToSlMetalWtCRDR').value == 'CR')) {

                    if (document.getElementById('paymentMode').value == 'RateCut') {

                        //totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);
                        //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;

                        // START CODE FOR Sell Panel CASH TO METAL Issue @PRIYANKA-28JUNE18
                        if ((document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == '' &&
                                document.getElementById('CashToSlMetalWtCRDR').value == 'CR' &&
                                document.getElementById(prefix + 'FinalSlCRDR').value == 'DR') ||
                                (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == '' &&
                                        document.getElementById('CashToSlMetalWtCRDR').value == 'DR' &&
                                        document.getElementById(prefix + 'FinalSlCRDR').value == 'CR')) {

//                            if (totFinSrWtBal < document.getElementById('CashToSlMetalWt').value) {
//                                document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
//                            }

                            totFinSrWtBal = (parseFloat(totFinSrWtBal) - parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);

                            if (prefix == 'slPr') {
                                if (totFinSrWtBal > 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            } else {
                                if (totFinSrWtBal < 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            }

                            //alert('totFinSrWtBal656 ##== ' + totFinSrWtBal);

                        } else if ((document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == '' &&
                                document.getElementById('CashToSlMetalWtCRDR').value == 'CR') &&
                                document.getElementById(prefix + 'FinalSlCRDR').value == 'CR') {

                            if (totFinSrWtBal < document.getElementById('CashToSlMetalWt').value) {
                                document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
                            }
                            //alert('totFinSrWtBal6566 ##== ' + totFinSrWtBal);
                            //alert('FinalSlCRDR6566 ##== ' + document.getElementById(prefix + 'FinalSlCRDR').value);

                            totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);
//                            if(totFinSrWtBal > 0)
//                                totFinSrWtBal = 0 - totFinSrWtBal;
                            //
//                            if (prefix == 'slPr') {
//                                if (totFinSrWtBal > 0)
//                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
//                                else
//                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
//                            } else {
//                                if (totFinSrWtBal < 0)
//                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
//                                else
//                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
//                            }

                            //alert('totFinGdWtBal12 ##== ' + totFinSrWtBal);

                        } else {
                            //alert('FinalSlCRDR ##== ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                            //alert('CashToSlMetalWtCRDR ##== ' + document.getElementById('CashToSlMetalWtCRDR').value);
                            //alert('totFinGdWtBal122 ##== ' + totFinSrWtBal);

                            totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);

                            document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
                        }
                        // END CODE FOR Sell Panel CASH TO METAL Issue @PRIYANKA-28JUNE18

                    }

                    if (document.getElementById('paymentMode').value == 'NoRateCut') {

                        if ((document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR' &&
                                document.getElementById('CashToSlMetalWtCRDR').value == 'CR') ||
                                (document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR' &&
                                        document.getElementById('CashToSlMetalWtCRDR').value == 'DR')) {
                            //alert('FinalSlCRDR676767 ##== ' + document.getElementById(prefix + 'FinalSlCRDR').value);

                            if (document.getElementById(prefix + 'FinalSlCRDR').value == document.getElementById('CashToSlMetalWtCRDR').value)
                                totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);
                            else
                                totFinSrWtBal = (parseFloat(totFinSrWtBal) - parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);

                            //totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);

                            //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;

                            if (prefix == 'slPr') {
                                if (totFinSrWtBal > 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            } else {
                                if (totFinSrWtBal < 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            }

                        } else if ((document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'CR' &&
                                document.getElementById('CashToSlMetalWtCRDR').value == 'DR') ||
                                (document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == 'DR' &&
                                        document.getElementById('CashToSlMetalWtCRDR').value == 'CR')) {
                            //alert('FinalSlCRDR89898989 ##== ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                            totFinSrWtBal = (parseFloat(totFinSrWtBal) - parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);

                            if (totFinSrWtBal < 0) {
                                document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
                            } else {
                                document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('utin_sl_cash_to_metalwt_CRDR').value;
                            }

                        } else if (document.getElementById('utin_sl_cash_to_metalwt_CRDR').value == '' &&
                                (document.getElementById('CashToSlMetalWtCRDR').value == 'DR' ||
                                        document.getElementById('CashToSlMetalWtCRDR').value == 'CR')) {
                            //alert('FinalSlCRDR90909090 ##== ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                            //alert('CashToSlMetalWtCRDR ##== ' + document.getElementById('CashToSlMetalWtCRDR').value);
                            //alert('totFinSrWtBal ##== ' + totFinSrWtBal);
                            //alert('FinalSlCRDR90909090 ##== ' + document.getElementById('CashToSlMetalWt').value);

                            if (document.getElementById(prefix + 'FinalSlCRDR').value == document.getElementById('CashToSlMetalWtCRDR').value)
                                totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);
                            else
                                totFinSrWtBal = (parseFloat(totFinSrWtBal) - parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);

                            // document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;

                            if (prefix == 'slPr') {
                                if (totFinSrWtBal > 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            } else {
                                if (totFinSrWtBal < 0)
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
                            }
                        }
                    }

                }

            }
            // END CODE FOR SILVER CASE TO CALCULATE SL BAL ACCORDING CASH CONVERT METAL @PRIYANKA-10APR18            
        }

        document.getElementById('metal2WtFinBal').value = Math.abs(parseFloat(totFinSrWtBal)).toFixed(3) + ' ' + document.getElementById(prefix + 'SilverTotFineWtType').value;
        //alert(document.getElementById('metal2WtFinBal').value);
        //
        // START OF CODE TO SET COLOR FOR SILVER WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        // START CODE TO Set color of metal balance (SL WT) according to CR/DR on payment panel @PRIYANKA-13MAR18
        if (document.getElementById(prefix + 'FinalSlCRDR').value == 'CR') {
            document.getElementById('metal2WtFinBal').style.color = 'green';
            document.getElementById(prefix + 'FinalSlCRDR').style.color = 'green';
            //document.getElementById('metal2WtFinBal').style.color = 'green';
            //document.getElementById(prefix + 'FinalSlCRDR').style.color = 'green';
        } else if (document.getElementById(prefix + 'FinalSlCRDR').value == 'DR') {
            document.getElementById('metal2WtFinBal').style.color = 'red';
            document.getElementById(prefix + 'FinalSlCRDR').style.color = 'red';
            //document.getElementById('metal2WtFinBal').style.color = 'red';
            //document.getElementById(prefix + 'FinalSlCRDR').style.color = 'red';
        }
        // END CODE TO Set color of metal balance (SL WT) according to CR/DR on payment panel @PRIYANKA-13MAR18
        // END OF CODE TO SET COLOR FOR SILVER WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        //alert('totFinSrWtBal : ' + totFinSrWtBal)
        document.getElementById(prefix + 'SilverWtFinBal').value = parseFloat(totFinSrWtBal).toFixed(3);
        document.getElementById(prefix + 'SilverWtFinBalType').value = document.getElementById(prefix + 'SilverTotFineWtType').value;

        // ADDING CONDITION FOR METAL BALANCE ACCORDING TO METAL AMOUNT CASE @PRIYANKA-23MAR18
        if (document.getElementById('paymentMode').value == 'RateCut' && setAmtToMetCon != 'changeMetAmtToMetWt') {

            var payTotalWeightType2 = document.getElementById(prefix + 'SilverRtCtWtBalType').value;
            var silverWeight = parseFloat(document.getElementById(prefix + 'SilverRtCtWtBal').value);
            var payMetalRate2 = parseFloat(document.getElementById(prefix + 'SilverRate').value);

            if (payTotalWeightType2 == 'KG') {
                document.getElementById(prefix + 'SilverValuation').value = Math_round((silverWeight * payMetalRate2 * document.getElementById('srGmWtInKg').value));
            } else if (payTotalWeightType2 == 'GM') {
                document.getElementById(prefix + 'SilverValuation').value = Math_round((silverWeight * payMetalRate2) / document.getElementById('srGmWtInGm').value);
            } else if (payTotalWeightType2 == 'MG') {
                document.getElementById(prefix + 'SilverValuation').value = Math_round((silverWeight * payMetalRate2) / (document.getElementById('srGmWtInMg').value));
            }

            document.getElementById(prefix + 'PaySilverWtBal').value = parseFloat(silverWeight).toFixed(3);

        }

    }
    // START CODE FOR CRYSTAL @AUTHOR @DARSHANA 17 JUNE 2021
    if (document.getElementById(prefix + 'CrystalWtPrevBal').value != '' || document.getElementById(prefix + 'CrystalTotFineWt').value != '' || document.getElementById(prefix + 'CrystalWtRecBal').value != '') {
        if (document.getElementById(prefix + 'CrystalWtPrevBal').value == '' || document.getElementById(prefix + 'CrystalWtPrevBal').value == 'NaN') {
            document.getElementById(prefix + 'CrystalWtPrevBal').value = 0;
        }
        if (document.getElementById(prefix + 'CrystalTotFineWt').value == '' || document.getElementById(prefix + 'CrystalTotFineWt').value == 'NaN') {
            document.getElementById(prefix + 'CrystalTotFineWt').value = 0;
        }
        if (document.getElementById(prefix + 'CrystalWtRecBal').value == '' || document.getElementById(prefix + 'CrystalWtRecBal').value == 'NaN') {
            document.getElementById(prefix + 'CrystalWtRecBal').value = 0;
        }
        //
        if (document.getElementById('paymentMode').value == 'RateCut') {

            if (document.getElementById(prefix + 'CrystalRtCtWtBal').value == '' || document.getElementById(prefix + 'CrystalRtCtWtBal').value == 'NaN') {
                document.getElementById(prefix + 'CrystalRtCtWtBal').value = 0;
            }

            var stRateCut = convertWeight(parseFloat(document.getElementById(prefix + 'CrystalRtCtWtBal').value), document.getElementById(prefix + 'CrystalTotFineWtType').value, document.getElementById(prefix + 'CrystalRtCtWtBalType').value);

            totFinStWtBal = calcWeightBalance(prefix, document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value, document.getElementById(prefix + 'CrystalWtPrevBal').value, document.getElementById(prefix + 'CrystalTotFineWt').value, document.getElementById(prefix + 'CrystalWtRecBal').value, document.getElementById(prefix + 'RtCtStCRDR')) - parseFloat(stRateCut);

        } else if (document.getElementById('paymentMode').value == 'NoRateCut') {

            var totFinStWtBal = calcWeightBalance(prefix, document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value, document.getElementById(prefix + 'CrystalWtPrevBal').value, document.getElementById(prefix + 'CrystalTotFineWt').value, document.getElementById(prefix + 'CrystalWtRecBal').value, document.getElementById(prefix + 'RtCtStCRDR'));

        }

        if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
            if (document.getElementById('utin_st_cash_to_metalwt_CRDR').value != '' && document.getElementById('utin_st_cash_to_metalwt').value > 0) {

                if ((document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'DR')) {
                    //alert('totFinSrWtBa221111 ##== ' + totFinSrWtBal);
                    //totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);
                    //
                    if (document.getElementById(prefix + 'FinalStCRDR').value == document.getElementById('utin_st_cash_to_metalwt_CRDR').value)
                        totFinSrWtBal = (parseFloat(totFinStWtBal) + parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);
                    else
                        totFinSrWtBal = (parseFloat(totFinStWtBal) - parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);
                }

                if ((document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'CR')) {
                    //alert('totFinSrWtBa331111 ##== ' + totFinSrWtBal);
                    //totFinSrWtBal = (parseFloat(totFinSrWtBal) - parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);

                    if (document.getElementById(prefix + 'FinalStCRDR').value == document.getElementById('utin_st_cash_to_metalwt_CRDR').value)
                        totFinStWtBal = (parseFloat(totFinStWtBal) + parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);
                    else
                        totFinStWtBal = (parseFloat(totFinStWtBal) - parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);


                    if (totFinSrWtBal < 0) {
                        document.getElementById(prefix + 'FinalStCRDR').value = document.getElementById('utin_st_cash_to_metalwt_CRDR').value;
                    }



                }

                if (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == '' &&
                        (document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'DR' ||
                                document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'CR')) {
                    //alert('totFinSrWtBal2222 ##== ' + totFinSrWtBal);
                    if (document.getElementById('paymentMode').value == 'NoRateCut') {

                        if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                                document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'DR') ||
                                (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                        document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'CR')) {

                            totFinStWtBal = (parseFloat(totFinStWtBal) - parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);

//                            if (totFinSrWtBal < 0) {
//                                document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('utin_sl_cash_to_metalwt_CRDR').value;
//                            }
                            //
                            if (prefix == 'slPr') {
                                if (totFinSrWtBal > 0)
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                            } else {
                                if (totFinSrWtBal < 0)
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                            }

                        } else {
                            //alert('totFinSrWtBa3311115656 ##== ' + totFinSrWtBal);
                            totFinStWtBal = (parseFloat(totFinStWtBal) + parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);

                            //
                            if (prefix == 'slPr') {
                                if (totFinSrWtBal > 0)
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                            } else {
                                if (totFinSrWtBal < 0)
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                            }

                            //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('utin_sl_cash_to_metalwt_CRDR').value;
                        }

                    } else {
                        //alert('totFinSrWtBal7 ##== ' + totFinSrWtBal);
                        //alert('utin_sl_cash_to_metalwt ##== ' + document.getElementById('utin_sl_cash_to_metalwt').value);
                        //totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value)).toFixed(3);
                        //alert('totFinSrWtBal7777 ##== ' + totFinSrWtBal);
                        //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('utin_sl_cash_to_metalwt_CRDR').value;
                        //
                        //
                        if (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == '' &&
                                (document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'DR' ||
                                        document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'CR')) {
                            //alert('love7900 ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                            ////alert('love TransCRDR ' + document.getElementById(prefix + 'TransCRDR').value);
                            if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                                    document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'DR') ||
                                    (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                            document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'CR')) {
                                //alert('love silverBal ' + silverBal);
                                //alert('love cr ' + document.getElementById('utin_sl_cash_to_metalwt_CRDR').value);
                                //alert('love val9090 ' + document.getElementById('utin_sl_cash_to_metalwt').value);
                                totFinStWtBal = (parseFloat(totFinStWtBal) - parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);

                                //alert('totFinSrWtBal565689 ' + totFinSrWtBal);
                                //
                                if (prefix == 'slPr') {
                                    if (totFinSrWtBal > 0)
                                        document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                    else
                                        document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                                } else {
                                    if (totFinSrWtBal < 0)
                                        document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                    else
                                        document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                                }

                            } else {
                                //alert('an700 ');
                                if (document.getElementById(prefix + 'FinalStCRDR').value == document.getElementById('utin_st_cash_to_metalwt_CRDR').value)
                                    totFinStWtBal = (parseFloat(totFinStWtBal) + parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);
                                else
                                    totFinStWtBal = (parseFloat(totFinStWtBal) - parseFloat(document.getElementById('utin_st_cash_to_metalwt').value)).toFixed(3);
                                //
                                //alert('an700000 ');
                                //
                                if (prefix == 'slPr') {
                                    if (totFinStWtBal > 0)
                                        document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                    else
                                        document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                                } else {
                                    if (totFinStWtBal < 0)
                                        document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                    else
                                        document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                                }
                            }
                            //
                        }
                    }
                }

            }
            //
//            alert('cahwt' + document.getElementById('CashToStMetalWtCRDR').value);
//            alert('wttypecash' + document.getElementById('CashToStMetalWt').value);
            if (document.getElementById('CashToStMetalWtCRDR').value != '' && document.getElementById('CashToStMetalWt').value > 0) {
                //alert('totFinSrWtBal6563454 ##== ' + totFinSrWtBal);
                if ((document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('CashToStMetalWtCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('CashToStMetalWtCRDR').value == 'DR')) {
                    //alert('totFinSrWtBal5555555 ##== ' + totFinSrWtBal);
                    totFinStWtBal = (parseFloat(totFinStWtBal) + parseFloat(document.getElementById('CashToStMetalWt').value)).toFixed(3);
                    //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
                    //
                    if (prefix == 'slPr') {
                        if (totFinStWtBal > 0)
                            document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                    } else {
                        if (totFinStWtBal < 0)
                            document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                    }

                }

                if ((document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR' &&
                        document.getElementById('CashToStMetalWtCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('CashToStMetalWtCRDR').value == 'CR')) {
                    //alert('totFinSrWtBal66666666 ##== ' + totFinSrWtBal);
                    totFinStWtBal = (parseFloat(totFinStWtBal) - parseFloat(document.getElementById('CashToStMetalWt').value)).toFixed(3);

//                    if (totFinSrWtBal < 0) {
//                        document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
//                    }

                    //
                    if (prefix == 'slPr') {
                        if (totFinStWtBal > 0)
                            document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                    } else {
                        if (totFinStWtBal < 0)
                            document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                        else
                            document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                    }

                }

                if (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == '' &&
                        (document.getElementById('CashToStMetalWtCRDR').value == 'DR' ||
                                document.getElementById('CashToStMetalWtCRDR').value == 'CR')) {

                    if (document.getElementById('paymentMode').value == 'RateCut') {

                        //totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);
                        //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;

                        // START CODE FOR Sell Panel CASH TO METAL Issue @PRIYANKA-28JUNE18
                        if ((document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == '' &&
                                document.getElementById('CashToStMetalWtCRDR').value == 'CR' &&
                                document.getElementById(prefix + 'FinalStCRDR').value == 'DR') ||
                                (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == '' &&
                                        document.getElementById('CashToStMetalWtCRDR').value == 'DR' &&
                                        document.getElementById(prefix + 'FinalStCRDR').value == 'CR')) {

//                            if (totFinSrWtBal < document.getElementById('CashToSlMetalWt').value) {
//                                document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;
//                            }

                            totFinStWtBal = (parseFloat(totFinStWtBal) - parseFloat(document.getElementById('CashToStMetalWt').value)).toFixed(3);

                            if (prefix == 'slPr') {
                                if (totFinStWtBal > 0)
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                            } else {
                                if (totFinStWtBal < 0)
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                            }

                            //alert('totFinSrWtBal656 ##== ' + totFinSrWtBal);

                        } else if ((document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == '' &&
                                document.getElementById('CashToStMetalWtCRDR').value == 'CR') &&
                                document.getElementById(prefix + 'FinalStCRDR').value == 'CR') {

                            if (totFinStWtBal < document.getElementById('CashToStMetalWt').value) {
                                document.getElementById(prefix + 'FinalStCRDR').value = document.getElementById('CashToStMetalWtCRDR').value;
                            }
                            //alert('totFinSrWtBal6566 ##== ' + totFinSrWtBal);
                            //alert('FinalSlCRDR6566 ##== ' + document.getElementById(prefix + 'FinalSlCRDR').value);

                            totFinStWtBal = (parseFloat(totFinStWtBal) + parseFloat(document.getElementById('CashToStMetalWt').value)).toFixed(3);
//                            if(totFinSrWtBal > 0)
//                                totFinSrWtBal = 0 - totFinSrWtBal;
                            //
//                            if (prefix == 'slPr') {
//                                if (totFinSrWtBal > 0)
//                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
//                                else
//                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
//                            } else {
//                                if (totFinSrWtBal < 0)
//                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'DR';
//                                else
//                                    document.getElementById(prefix + 'FinalSlCRDR').value = 'CR';
//                            }

                            //alert('totFinGdWtBal12 ##== ' + totFinSrWtBal);

                        } else {
                            //alert('FinalSlCRDR ##== ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                            //alert('CashToSlMetalWtCRDR ##== ' + document.getElementById('CashToSlMetalWtCRDR').value);
                            //alert('totFinGdWtBal122 ##== ' + totFinSrWtBal);

                            totFinStWtBal = (parseFloat(totFinStWtBal) + parseFloat(document.getElementById('CashToStMetalWt').value)).toFixed(3);

                            document.getElementById(prefix + 'FinalStCRDR').value = document.getElementById('CashToStMetalWtCRDR').value;
                        }
                        // END CODE FOR Sell Panel CASH TO METAL Issue @PRIYANKA-28JUNE18

                    }

                    if (document.getElementById('paymentMode').value == 'NoRateCut') {

                        if ((document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'CR' &&
                                document.getElementById('CashToStMetalWtCRDR').value == 'CR') ||
                                (document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'DR' &&
                                        document.getElementById('CashToStMetalWtCRDR').value == 'DR')) {
                            //alert('FinalSlCRDR676767 ##== ' + document.getElementById(prefix + 'FinalSlCRDR').value);

                            if (document.getElementById(prefix + 'FinalStCRDR').value == document.getElementById('CashToStMetalWtCRDR').value)
                                totFinStWtBal = (parseFloat(totFinStWtBal) + parseFloat(document.getElementById('CashToStMetalWt').value)).toFixed(3);
                            else
                                totFinStWtBal = (parseFloat(totFinStWtBal) - parseFloat(document.getElementById('CashToStMetalWt').value)).toFixed(3);

                            //totFinSrWtBal = (parseFloat(totFinSrWtBal) + parseFloat(document.getElementById('CashToSlMetalWt').value)).toFixed(3);

                            //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;

                            if (prefix == 'slPr') {
                                if (totFinStWtBal > 0)
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                            } else {
                                if (totFinStWtBal < 0)
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                            }

                        } else if ((document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'CR' &&
                                document.getElementById('CashToStMetalWtCRDR').value == 'DR') ||
                                (document.getElementById('utin_st_cash_to_metalwt_CRDR').value == 'DR' &&
                                        document.getElementById('CashToStMetalWtCRDR').value == 'CR')) {
                            //alert('FinalSlCRDR89898989 ##== ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                            totFinStWtBal = (parseFloat(totFinStWtBal) - parseFloat(document.getElementById('CashToStMetalWt').value)).toFixed(3);

                            if (totFinStWtBal < 0) {
                                document.getElementById(prefix + 'FinalStCRDR').value = document.getElementById('CashToStMetalWtCRDR').value;
                            } else {
                                document.getElementById(prefix + 'FinalStCRDR').value = document.getElementById('utin_st_cash_to_metalwt_CRDR').value;
                            }

                        } else if (document.getElementById('utin_st_cash_to_metalwt_CRDR').value == '' &&
                                (document.getElementById('CashToStMetalWtCRDR').value == 'DR' ||
                                        document.getElementById('CashToStMetalWtCRDR').value == 'CR')) {
                            //alert('FinalSlCRDR90909090 ##== ' + document.getElementById(prefix + 'FinalSlCRDR').value);
                            //alert('CashToSlMetalWtCRDR ##== ' + document.getElementById('CashToSlMetalWtCRDR').value);
                            //alert('totFinSrWtBal ##== ' + totFinSrWtBal);
                            //alert('FinalSlCRDR90909090 ##== ' + document.getElementById('CashToSlMetalWt').value);

                            if (document.getElementById(prefix + 'FinalStCRDR').value == document.getElementById('CashToStMetalWtCRDR').value)
                                totFinStWtBal = (parseFloat(totFinStWtBal) + parseFloat(document.getElementById('CashToStMetalWt').value)).toFixed(3);
                            else
                                totFinStWtBal = (parseFloat(totFinStWtBal) - parseFloat(document.getElementById('CashToStMetalWt').value)).toFixed(3);

                            // document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById('CashToSlMetalWtCRDR').value;

                            if (prefix == 'slPr') {
                                if (totFinStWtBal > 0)
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                            } else {
                                if (totFinStWtBal < 0)
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'DR';
                                else
                                    document.getElementById(prefix + 'FinalStCRDR').value = 'CR';
                            }
                        }
                    }

                }

            }
        }
        document.getElementById('metal3WtFinBal').value = Math.abs(parseFloat(totFinStWtBal)).toFixed(3) + ' ' + document.getElementById(prefix + 'CrystalTotFineWtType').value;
//alert(document.getElementById('metal2WtFinBal').value);
        //
        // START OF CODE TO SET COLOR FOR SILVER WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        // START CODE TO Set color of metal balance (SL WT) according to CR/DR on payment panel @PRIYANKA-13MAR18
        if (document.getElementById(prefix + 'FinalStCRDR').value == 'CR') {
            document.getElementById('metal3WtFinBal').style.color = 'green';
            document.getElementById(prefix + 'FinalStCRDR').style.color = 'green';
            //document.getElementById('metal2WtFinBal').style.color = 'green';
            //document.getElementById(prefix + 'FinalSlCRDR').style.color = 'green';
        } else if (document.getElementById(prefix + 'FinalStCRDR').value == 'DR') {
            document.getElementById('metal3WtFinBal').style.color = 'red';
            document.getElementById(prefix + 'FinalStCRDR').style.color = 'red';
            //document.getElementById('metal2WtFinBal').style.color = 'red';
            //document.getElementById(prefix + 'FinalSlCRDR').style.color = 'red';
        }
        // END CODE TO Set color of metal balance (SL WT) according to CR/DR on payment panel @PRIYANKA-13MAR18
        // END OF CODE TO SET COLOR FOR SILVER WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        //alert('totFinSrWtBal : ' + totFinSrWtBal)
        document.getElementById(prefix + 'CrystalWtFinBal').value = parseFloat(totFinStWtBal).toFixed(3);
        document.getElementById(prefix + 'CrystalWtFinBalType').value = document.getElementById(prefix + 'CrystalTotFineWtType').value;

        // ADDING CONDITION FOR METAL BALANCE ACCORDING TO METAL AMOUNT CASE @PRIYANKA-23MAR18
        if (document.getElementById('paymentMode').value == 'RateCut' && setAmtToMetCon != 'changeMetAmtToMetWt') {

            var payTotalWeightType2 = document.getElementById(prefix + 'CrystalRtCtWtBalType').value;
            var crystalWeight = parseFloat(document.getElementById(prefix + 'CrystalRtCtWtBal').value);
            var payMetalRate2 = parseFloat(document.getElementById(prefix + 'CrystalRate').value);
            
            if (payTotalWeightType2 == 'KG') {
                document.getElementById(prefix + 'CrystalValuation').value = Math_round((crystalWeight * payMetalRate2 * document.getElementById('cryWtInGm').value));
            } else if (payTotalWeightType2 == 'GM') {
                document.getElementById(prefix + 'CrystalValuation').value = Math_round((crystalWeight * payMetalRate2) / document.getElementById('cryWtInKg').value);
            } else if (payTotalWeightType2 == 'MG') {
                document.getElementById(prefix + 'CrystalValuation').value = Math_round((crystalWeight * payMetalRate2) / (document.getElementById('cryWtInMg').value));
            } else if (payTotalWeightType2 == 'CT') {
                document.getElementById(prefix + 'CrystalValuation').value = Math_round((crystalWeight * payMetalRate2) / (document.getElementById('cryWtInCt').value));
            }
            document.getElementById(prefix + 'PayCrystalWtBal').value = parseFloat(crystalWeight).toFixed(3);
        }

    }
    // END CODE FOR CRYSTAL AUTHOR @DARSHANA 17 JUNE 2021
    // START CODE TO CHANGE FOR RATE CUT FUNCTIONALITY @PRIYANKA-19APR18
    if (document.getElementById('paymentMode').value == 'RateCut') {

        //alert('PayableCashCRDR 11== ' + document.getElementById(prefix + 'PayableCashCRDR').value);

        if (document.getElementById(prefix + 'GoldValuation').value == '' || document.getElementById(prefix + 'GoldValuation').value == 'NaN') {
            document.getElementById(prefix + 'GoldValuation').value = 0;
        }

        if (document.getElementById(prefix + 'SilverValuation').value == '' || document.getElementById(prefix + 'SilverValuation').value == 'NaN') {
            document.getElementById(prefix + 'SilverValuation').value = 0;
        }
        if (document.getElementById(prefix + 'CrystalValuation').value == '' || document.getElementById(prefix + 'CrystalValuation').value == 'NaN') {
            document.getElementById(prefix + 'CrystalValuation').value = 0;
        }
        // START @PRIYANKA-07APR18
        // START @PRIYANKA-05APR18
        // START @PRIYANKA-08APR18
        // START @PRIYANKA-09APR18

        var GdCashToMetal = document.getElementById('GdCashToMetal').value;
        var PrevGdCashBal = document.getElementById('PrevGdCashBal').value;

        // START @PRIYANKA-10APR18
        var SlCashToMetal = document.getElementById('SlCashToMetal').value;
        var PrevSlCashBal = document.getElementById('PrevSlCashBal').value;
        // END @PRIYANKA-10APR18

        //start code @darshana 17 june 2021
        var StCashToMetal = document.getElementById('StCashToMetal').value;
        var PrevStCashBal = document.getElementById('PrevStCashBal').value;
        //end code @darshana 17 june 2021
        var PayPrevAmtDisp = document.getElementById(prefix + 'PayPrevAmtDisp').value;

        // alert('PayPrevAmtDisp == ' + PayPrevAmtDisp);
        // START @PRIYANKA-10APR18
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // START CODE TO CHECK CONDITIONS FOR PREVIOUS TOTAL CASH BALANCE CR OR DR FOR ADDING METAL AMOUNT IN PREVIOUS AMOUNT @MADHUREE-16JULY2020 //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        //
        if (GdCashToMetal > 0 || PayPrevAmtDisp > 0 || SlCashToMetal > 0 || StCashToMetal > 0) {
        
            //alert('CashToMetal **== ' + CashToMetal);
            //alert('PayTotAmt == ' + document.getElementById(prefix + 'PayTotAmt').value);

            //alert('TransCRDR === ' + document.getElementById(prefix + 'TransCRDR').value); 
            //alert('GoldWtPrevBalCRDR == ' + document.getElementById(prefix + 'GoldWtPrevBalCRDR').value);
            //alert('PrevGdCashBalCRDR == ' + document.getElementById('PrevGdCashBalCRDR').value);

            if ((GdCashToMetal > 0 || SlCashToMetal > 0 || StCashToMetal > 0) && PayPrevAmtDisp >= 0) {
                
                if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                        document.getElementById('PrevGdCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                                document.getElementById('PrevGdCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('PrevSlCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' &&
                                document.getElementById('PrevSlCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('PrevStCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR' &&
                                document.getElementById('PrevStCashBalCRDR').value == 'CR')) {

                    //alert('TransCRDR ** ' + document.getElementById(prefix + 'TransCRDR').value);

                    var totalAmount = Math_round(parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value) + parseFloat(document.getElementById(prefix + 'CrystalValuation').value) + parseFloat(document.getElementById('GdCashToMetal').value) + parseFloat(document.getElementById('SlCashToMetal').value)).toFixed(2);
                    if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
                        document.getElementById(prefix + 'PayTotAmt').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtBalDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtAccess').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                    }

                    // START CODE FOR PAYMENT/RECEIPT CASH TO METAL ISSUE @PRIYANKA-29MAY18
                    if (PayPrevAmtDisp == '0.00') {

                        document.getElementById(prefix + 'PayTotCashAmt').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);

                        if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                                document.getElementById('PrevGdCashBalCRDR').value == 'CR' &&
                                document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR') ||
                                (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                        document.getElementById('PrevGdCashBalCRDR').value == 'DR' &&
                                        document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR')) {

                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                            document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                            document.getElementById(prefix + 'RtCtCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;

                        }
                    }
                    // END CODE FOR PAYMENT/RECEIPT CASH TO METAL ISSUE @PRIYANKA-29MAY18

                } else if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                        document.getElementById('PrevGdCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                                document.getElementById('PrevGdCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('PrevSlCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' &&
                                document.getElementById('PrevSlCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById('PrevStCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR' &&
                                document.getElementById('PrevStCashBalCRDR').value == 'DR')) {

                    var totalAmount = Math_round(parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value) + parseFloat(document.getElementById(prefix + 'CrystalValuation').value) - parseFloat(document.getElementById('GdCashToMetal').value)).toFixed(2);

                    var GoldSilverAmt = parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value) + parseFloat(document.getElementById(prefix + 'CrystalValuation').value);

                    //alert('TransCRDR ## ' + document.getElementById(prefix + 'TransCRDR').value);

                    if (GoldSilverAmt <= GdCashToMetal || GoldSilverAmt <= SlCashToMetal || GoldSilverAmt <= StCashToMetal) {

                        if (GoldSilverAmt <= GdCashToMetal) {
                            document.getElementById(prefix + 'TransCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;
                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;
                            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;
                        }

                        if (GoldSilverAmt <= SlCashToMetal) {
                            document.getElementById(prefix + 'TransCRDR').value = document.getElementById('PrevSlCashBalCRDR').value;
                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById('PrevSlCashBalCRDR').value;
                            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById('PrevSlCashBalCRDR').value;
                        }

                        if (GoldSilverAmt <= StCashToMetal) {
                            document.getElementById(prefix + 'TransCRDR').value = document.getElementById('PrevStCashBalCRDR').value;
                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById('PrevStCashBalCRDR').value;
                            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById('PrevStCashBalCRDR').value;
                        }

                        //alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);

                    } else {

                        var metal1WtPrevBal = document.getElementById(prefix + 'metal1WtPrevBal').value;
                        var metal2WtPrevBal = document.getElementById(prefix + 'metal2WtPrevBal').value;
                        var metal3WtPrevBal = document.getElementById(prefix + 'metal3WtPrevBal').value;

                        if (metal1WtPrevBal > 0) {
                            document.getElementById(prefix + 'TransCRDR').value = document.getElementById('GoldWtPrevBalCRDR').value;
                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById('GoldWtPrevBalCRDR').value;
                            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById('GoldWtPrevBalCRDR').value;
                        }

                        if (metal2WtPrevBal > 0) {
                            document.getElementById(prefix + 'TransCRDR').value = document.getElementById('PrevSlCashBalCRDR').value;
                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById('PrevSlCashBalCRDR').value;
                            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById('PrevSlCashBalCRDR').value;
                        }

                        if (metal3WtPrevBal > 0) {
                            document.getElementById(prefix + 'TransCRDR').value = document.getElementById('PrevStCashBalCRDR').value;
                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById('PrevStCashBalCRDR').value;
                            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById('PrevStCashBalCRDR').value;
                        }
                    }

                    if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
                        document.getElementById(prefix + 'PayTotAmt').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtBalDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtAccess').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                    }

                    // START CODE FOR PAYMENT/RECEIPT CASH TO METAL ISSUE @PRIYANKA-29MAY18
                    if (PayPrevAmtDisp == '0.00') {

                        document.getElementById(prefix + 'PayTotCashAmt').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);

                        if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                                document.getElementById('PrevGdCashBalCRDR').value == 'DR' &&
                                document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR') ||
                                (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                        document.getElementById('PrevGdCashBalCRDR').value == 'CR' &&
                                        document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR')) {

                            if (GdCashToMetal > document.getElementById(prefix + 'GoldValuation').value) {

                                document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;
                                document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;
                                document.getElementById(prefix + 'RtCtCashCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;

                            } else {

                                document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                                document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                                document.getElementById(prefix + 'RtCtCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                            }
                        }
                    }
                    // END CODE FOR PAYMENT/RECEIPT CASH TO METAL ISSUE @PRIYANKA-29MAY18

                } else if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '' &&
                        document.getElementById('PrevGdCashBalCRDR').value == 'CR' ||
                        document.getElementById('PrevGdCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == '' &&
                                document.getElementById('PrevSlCashBalCRDR').value == 'CR' ||
                                document.getElementById('PrevSlCashBalCRDR').value == 'DR')
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == '' &&
                                document.getElementById('PrevStCashBalCRDR').value == 'CR' ||
                                document.getElementById('PrevStCashBalCRDR').value == 'DR')) {

                    //alert('PayTotAmt == ' + document.getElementById(prefix + 'PayTotAmt').value);

                    if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                            (document.getElementById('PrevGdCashBalCRDR').value == 'CR' ||
                                    document.getElementById('PrevSlCashBalCRDR').value == 'CR' ||
                                    document.getElementById('PrevStCashBalCRDR').value == 'CR')) ||
                            (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                    (document.getElementById('PrevGdCashBalCRDR').value == 'DR' ||
                                            document.getElementById('PrevSlCashBalCRDR').value == 'DR' ||
                                            document.getElementById('PrevStCashBalCRDR').value == 'DR'))) {

                        var totalAmount = Math_round(parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value) + parseFloat(document.getElementById(prefix + 'CrystalValuation').value) + parseFloat(document.getElementById('GdCashToMetal').value) + parseFloat(document.getElementById('SlCashToMetal').value) + parseFloat(document.getElementById('StCashToMetal').value)).toFixed(2);

                    } else if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                            (document.getElementById('PrevGdCashBalCRDR').value == 'DR' ||
                                    document.getElementById('PrevSlCashBalCRDR').value == 'DR' ||
                                    document.getElementById('PrevStCashBalCRDR').value == 'DR')) ||
                            (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                    (document.getElementById('PrevGdCashBalCRDR').value == 'CR' ||
                                            document.getElementById('PrevSlCashBalCRDR').value == 'CR' ||
                                            document.getElementById('PrevStCashBalCRDR').value == 'CR'))) {

                        var totalAmount = Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value) + parseFloat(document.getElementById(prefix + 'CrystalValuation').value)) - (parseFloat(document.getElementById('GdCashToMetal').value) + parseFloat(document.getElementById('SlCashToMetal').value) + parseFloat(document.getElementById('StCashToMetal').value))).toFixed(2);

                        if (totalAmount < 0) {

                            if (document.getElementById('PrevGdCashBalCRDR').value == 'DR' || document.getElementById('PrevSLCashBalCRDR').value == 'DR' || document.getElementById('PrevSTCashBalCRDR').value == 'DR') {
                                document.getElementById(prefix + 'TransCRDR').value = 'DR';
                                document.getElementById(prefix + 'PayableCashCRDR').value = 'DR';
                                document.getElementById(prefix + 'FinalCashCRDR').value = 'DR';
                            } else if (document.getElementById('PrevGdCashBalCRDR').value == 'CR' || document.getElementById('PrevSLCashBalCRDR').value == 'CR' || document.getElementById('PrevSTCashBalCRDR').value == 'CR') {
                                document.getElementById(prefix + 'TransCRDR').value = 'CR';
                                document.getElementById(prefix + 'PayableCashCRDR').value = 'CR';
                                document.getElementById(prefix + 'FinalCashCRDR').value = 'CR';
                            }
                        }
                    }
                    if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
                        document.getElementById(prefix + 'PayTotAmt').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtBalDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtAccess').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                    }
                }

                //alert('PayTotCashAmtDisp *== ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);
                //alert('PayFinAmtBalDisp *== ' + document.getElementById(prefix + 'PayFinAmtBalDisp').value);

                if ((document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR' &&
                        document.getElementById(prefix + 'PayableCashCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR' &&
                                document.getElementById(prefix + 'PayableCashCRDR').value == 'CR')) {

                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs(parseFloat(totalAmount) + parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value)).toFixed(2);
                    document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(parseFloat(totalAmount) + parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value)).toFixed(2);

                } else if ((document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR' &&
                        document.getElementById(prefix + 'PayableCashCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR' &&
                                document.getElementById(prefix + 'PayableCashCRDR').value == 'DR')) {

                    if (totalAmount == 0 || totalAmount == '0.00')
                        var totAmt = (parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value)).toFixed(2);
                    else
                        var totAmt = (parseFloat(totalAmount) - parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value)).toFixed(2);

                    if (totAmt < 0) {
                        document.getElementById(prefix + 'TransCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                        document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                    }

                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs(parseFloat(totAmt)).toFixed(2);
                    document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(parseFloat(totAmt)).toFixed(2);
                }

                //alert('PayTotAmt @@== ' + document.getElementById(prefix + 'PayTotAmt').value);
                //alert('PayTotCashAmtDisp @== ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);
                //alert('PayFinAmtBalDisp @== ' + document.getElementById(prefix + 'PayFinAmtBalDisp').value);
                //alert('PayTotAmtBalDisp @== ' + document.getElementById(prefix + 'PayTotAmtBalDisp').value);
                //alert('PayTotAmtAccess @== ' + document.getElementById(prefix + 'PayTotAmtAccess').value);


            } else if ((GdCashToMetal > 0 || SlCashToMetal > 0 || StCashToMetal > 0) && PayPrevAmtDisp == '0') {

                //alert('PayPrevAmtDisp *** === ' + PayPrevAmtDisp);

                if ((document.getElementById(prefix + 'FinalGdCRDR').value == 'DR' &&
                        document.getElementById('PrevGdCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'FinalGdCRDR').value == 'CR' &&
                                document.getElementById('PrevGdCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'FinalSlCRDR').value == 'DR' &&
                                document.getElementById('PrevSlCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'FinalSlCRDR').value == 'CR' &&
                                document.getElementById('PrevSlCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'FinalStCRDR').value == 'DR' &&
                                document.getElementById('PrevStCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'FinalStCRDR').value == 'CR' &&
                                document.getElementById('PrevStCashBalCRDR').value == 'CR')) {

                    //alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);

                    var totalAmount = Math_round(parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value) + parseFloat(document.getElementById(prefix + 'CrystalValuation').value) + parseFloat(document.getElementById('GdCashToMetal').value)).toFixed(2);
                    if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
                        document.getElementById(prefix + 'PayTotAmt').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtBalDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtAccess').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                    }
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                    document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);

                } else if ((document.getElementById(prefix + 'FinalGdCRDR').value == 'DR' &&
                        document.getElementById('PrevGdCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'FinalGdCRDR').value == 'CR' &&
                                document.getElementById('PrevGdCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'FinalSlCRDR').value == 'DR' &&
                                document.getElementById('PrevSlCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'FinalSlCRDR').value == 'CR' &&
                                document.getElementById('PrevSlCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'FinalStCRDR').value == 'DR' &&
                                document.getElementById('PrevStCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'FinalStCRDR').value == 'CR' &&
                                document.getElementById('PrevStCashBalCRDR').value == 'DR')) {

                    var totalAmount = Math_round(parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value) + parseFloat(document.getElementById(prefix + 'CrystalValuation').value) - parseFloat(document.getElementById('GdCashToMetal').value)).toFixed(2);

                    var GoldSilverAmt = parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value) + parseFloat(document.getElementById(prefix + 'CrystalValuation').value);

                    if (GoldSilverAmt < GdCashToMetal) {

                        document.getElementById(prefix + 'TransCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;
                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;
                        document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;

                    }

                    if (GoldSilverAmt < SlCashToMetal) {

                        document.getElementById(prefix + 'TransCRDR').value = document.getElementById('PrevSlCashBalCRDR').value;
                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById('PrevSlCashBalCRDR').value;
                        document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById('PrevSlCashBalCRDR').value;

                    }

                    if (GoldSilverAmt < StCashToMetal) {

                        document.getElementById(prefix + 'TransCRDR').value = document.getElementById('PrevStCashBalCRDR').value;
                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById('PrevStCashBalCRDR').value;
                        document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById('PrevStCashBalCRDR').value;

                    }
                    if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
                        document.getElementById(prefix + 'PayTotAmt').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtBalDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtAccess').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                    }
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                    document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);

                }


                //var totalAmount = Math_round(parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value) + parseFloat(document.getElementById('GdCashToMetal').value)).toFixed(2);


            } else if (PayPrevAmtDisp > 0) {
                //
                //
                //alert('PayPrevAmtDisp == ' + PayPrevAmtDisp);
                //
                //
                //alert('GoldWtPrevBalCRDR == ' + document.getElementById(prefix + 'GoldWtPrevBalCRDR').value);
                //alert('PayPrevCashBalCRDR == ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);
                //alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);
                //alert('RtCtSlCRDR == ' + document.getElementById(prefix + 'RtCtSlCRDR').value);
                //
                //
                if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                        document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' &&
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR' &&
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR')) {
                    //
                    //
                    // START @PRIYANKA-20JUNE18
                    //
                    //
                    var totGdSlAmount = 0;
                    //
                    //
                    //alert('GoldValuation == ' + document.getElementById(prefix + 'GoldValuation').value);
                    //alert('SilverValuation == ' + document.getElementById(prefix + 'SilverValuation').value);
                    //alert('CrystalValuation == ' + document.getElementById(prefix + 'CrystalValuation').value);
                    //
                    //alert('GoldWtPrevBalCRDR == ' + document.getElementById(prefix + 'GoldWtPrevBalCRDR').value);
                    //alert('SilverWtPrevBalCRDR == ' + document.getElementById(prefix + 'SilverWtPrevBalCRDR').value);
                    //alert('CrystalWtPrevBalCRDR == ' + document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value);
                    //
                    //alert('totGdSlAmount == ' + totGdSlAmount); 
                    //
                    //
                    if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR') ||
                            (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR')) {
                        totGdSlAmount = Math.abs(Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value) + parseFloat(document.getElementById(prefix + 'CrystalValuation').value))).toFixed(2));
                    } else if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR') ||
                            (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR')) {
                        totGdSlAmount = Math.abs(Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value) - parseFloat(document.getElementById(prefix + 'SilverValuation').value) - parseFloat(document.getElementById(prefix + 'CrystalValuation').value))).toFixed(2));
                    } else if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == '') ||
                            (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == '')) {
                        totGdSlAmount = Math.abs(Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value) - parseFloat(document.getElementById(prefix + 'SilverValuation').value) - parseFloat(document.getElementById(prefix + 'CrystalValuation').value))).toFixed(2));
                    }
                    //
                    //
                    //alert('totGdAmount =1= ' + totGdAmount);
                    //alert('totSlAmount =1= ' + totSlAmount);
                    //alert('totStAmount =1= ' + totStAmount);   
                    //alert('totGdSlAmount =1= ' + totGdSlAmount); 
                    //
                    //
                    if (totGdAmount == 'undefined' || totGdAmount == null) {
                        var totGdAmount = 0;
                    }
                    //
                    if (totSlAmount == 'undefined' || totSlAmount == null) {
                        var totSlAmount = 0;
                    }
                    //
                    if (totStAmount == 'undefined' || totStAmount == null) {
                        var totStAmount = 0;
                    }
                    //
                    //
                    //alert('totGdAmount =1= ' + totGdAmount);
                    //alert('totSlAmount =1= ' + totSlAmount);
                    //alert('totStAmount =1= ' + totStAmount);                    
                    //alert('totGdSlAmount =1= ' + totGdSlAmount); 
                    //
                    //
                    var totGdSlAmountCRDR = '';
                    //
                    //
                    if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR') {

                        totGdSlAmountCRDR = 'CR';

                        //var totGdAmount = Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value)).toFixed(2));
                        //var totSlAmount = Math_round((parseFloat(document.getElementById(prefix + 'SilverValuation').value)).toFixed(2));
                        //var totStAmount = Math_round((parseFloat(document.getElementById(prefix + 'CrystalValuation').value)).toFixed(2));

                    } else if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR') {

                        totGdSlAmountCRDR = 'DR';

                        //var totGdAmount = Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value)).toFixed(2));
                        //var totSlAmount = Math_round((parseFloat(document.getElementById(prefix + 'SilverValuation').value)).toFixed(2));
                        //var totStAmount = Math_round((parseFloat(document.getElementById(prefix + 'CrystalValuation').value)).toFixed(2));

                    } else if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR') ||
                            (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR')) {

                        var totGdAmount = Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value)).toFixed(2));
                        var totSlAmount = Math_round((parseFloat(document.getElementById(prefix + 'SilverValuation').value)).toFixed(2));
                        var totStAmount = Math_round((parseFloat(document.getElementById(prefix + 'CrystalValuation').value)).toFixed(2));

                        if (totGdAmount > totSlAmount || totGdAmount > totStAmount) {
                            totGdSlAmountCRDR = document.getElementById(prefix + 'FinalGdCRDR').value;
                        } else if (totGdAmount < totSlAmount || totStAmount < totSlAmount) {
                            totGdSlAmountCRDR = document.getElementById(prefix + 'FinalSlCRDR').value;
                        } else if (totGdAmount < totStAmount || totSlAmount < totStAmount) {
                            totGdSlAmountCRDR = document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value;
                        }

                    } else if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == '') ||
                            (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == '')) {

                        var totGdAmount = Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value)).toFixed(2));
                        var totSlAmount = Math_round((parseFloat(document.getElementById(prefix + 'SilverValuation').value)).toFixed(2));
                        var totStAmount = Math_round((parseFloat(document.getElementById(prefix + 'CrystalValuation').value)).toFixed(2));

                        if (totGdAmount > totSlAmount || totGdAmount > totStAmount) {
                            totGdSlAmountCRDR = document.getElementById(prefix + 'FinalGdCRDR').value;
                        } else if (totGdAmount < totSlAmount || totStAmount < totSlAmount) {
                            totGdSlAmountCRDR = document.getElementById(prefix + 'FinalSlCRDR').value;
                        } else if (totGdAmount < totStAmount || totSlAmount < totStAmount) {
                            totGdSlAmountCRDR = document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value;
                        }

                    }
                    //
                    //
                    //alert('totGdAmount =2= ' + totGdAmount);
                    //alert('totSlAmount =2= ' + totSlAmount);
                    //alert('totStAmount =2= ' + totStAmount);                    
                    //alert('totGdSlAmount =2= ' + totGdSlAmount);                    
                    //alert('totGdSlAmountCRDR == ' + totGdSlAmountCRDR);                    
                    //
                    //
                    if ((totGdSlAmountCRDR == 'DR' && document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') ||
                            (totGdSlAmountCRDR == 'CR' && document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR')) {

                        if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
                            document.getElementById(prefix + 'PayTotAmt').value = parseFloat(totGdSlAmount).toFixed(2);
                            document.getElementById(prefix + 'PayTotAmtBalDisp').value = parseFloat(totGdSlAmount).toFixed(2);
                            document.getElementById(prefix + 'PayTotAmtAccess').value = parseFloat(totGdSlAmount).toFixed(2);
                        }

                        document.getElementById(prefix + 'PayTotCashAmt').value = parseFloat(totGdSlAmount).toFixed(2);
                        document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs(parseFloat(totGdSlAmount) + parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value)).toFixed(2);
                        document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(parseFloat(totGdSlAmount) + parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value)).toFixed(2);

                    } else if ((totGdSlAmountCRDR == 'CR' && document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') ||
                            (totGdSlAmountCRDR == 'DR' && document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR')) {

                        if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
                            document.getElementById(prefix + 'PayTotAmt').value = parseFloat(totGdSlAmount).toFixed(2);
                            document.getElementById(prefix + 'PayTotAmtBalDisp').value = parseFloat(totGdSlAmount).toFixed(2);
                            document.getElementById(prefix + 'PayTotAmtAccess').value = parseFloat(totGdSlAmount).toFixed(2);
                        }

                        document.getElementById(prefix + 'PayTotCashAmt').value = parseFloat(totGdSlAmount).toFixed(2);
                        document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs(parseFloat(totGdSlAmount) - parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value)).toFixed(2);
                        document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(parseFloat(totGdSlAmount) - parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value)).toFixed(2);
                    } else if(document.getElementById('paymentMode').value == 'RateCut' && ( document.getElementById('payPanelName').value == 'StockReturnPanel' || document.getElementById('payPanelName').value == 'ItemReturnPayUp') ){
                        var totGdSlAmount = 0;
                        //
                        if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR') ||
                                (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR')) {
                            totGdSlAmount = Math.abs(Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value))).toFixed(2));
                            stTotAmount = Math.abs(Math_round(parseFloat(document.getElementById(prefix + 'CrystalValuation').value)));
                        } else if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR') ||
                                (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR') ||
                                (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR')) {
                            totGdSlAmount = Math.abs(Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value) - parseFloat(document.getElementById(prefix + 'SilverValuation').value))).toFixed(2));
                            stTotAmount = Math.abs(Math_round(parseFloat(document.getElementById(prefix + 'CrystalValuation').value)));
                        } else {
                            totGdSlAmount = Math.abs(Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value))).toFixed(2));
                            stTotAmount = Math.abs(Math_round(parseFloat(document.getElementById(prefix + 'CrystalValuation').value))); 
                        }
                        document.getElementById(prefix + 'PayTotCashAmtDisp').value = parseFloat(totGdSlAmount).toFixed(2);
                        document.getElementById(prefix + 'PayFinAmtBalDisp').value = parseFloat(totGdSlAmount).toFixed(2);
                        document.getElementById(prefix + 'PayCrystalAmtDisp').value = parseFloat(stTotAmount).toFixed(2);
                        document.getElementById(prefix + 'PayCrystalAmt').value = parseFloat(stTotAmount).toFixed(2);
                        if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
                            document.getElementById(prefix + 'PayTotAmt').value = parseFloat(totGdSlAmount).toFixed(2);
                            document.getElementById(prefix + 'PayTotAmtAccess').value = parseFloat(totGdSlAmount).toFixed(2);
                            document.getElementById(prefix + 'PayTotAmtBalDisp').value = parseFloat(totGdSlAmount).toFixed(2);
                            document.getElementById(prefix + 'PayCrystalAmtDisp').value = parseFloat(stTotAmount).toFixed(2);
                            document.getElementById(prefix + 'PayCrystalAmt').value = parseFloat(stTotAmount).toFixed(2);
                        }
                    }
                    //here kanha shyam issue
                    //
                    //
                    if (totGdSlAmountCRDR == 'CR' && document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR') {
                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                        document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                    } else if (totGdSlAmountCRDR == 'DR' && document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') {
                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                        document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                    } else if ((totGdSlAmountCRDR == 'CR' && document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') ||
                            (totGdSlAmountCRDR == 'DR' && document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR')) {
                        if (totGdSlAmount > document.getElementById(prefix + 'PayPrevAmtDisp').value) {
                            document.getElementById(prefix + 'PayableCashCRDR').value = totGdSlAmountCRDR;
                            document.getElementById(prefix + 'FinalCashCRDR').value = totGdSlAmountCRDR;
                        } else if (totGdSlAmount < document.getElementById(prefix + 'PayPrevAmtDisp').value) {
                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                        }
                    }
                    //
                } else if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' &&
                        document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' &&
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' &&
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR' &&
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR') ||
                        (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR' &&
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR')) {
                    //
                    if (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == '') {
                        slWeightToPay = parseFloat(document.getElementById(prefix + 'SilverWtPrevBalDRAmt').value) - parseFloat(document.getElementById(prefix + 'SilverWtPrevBalCRAmt').value);
                        if (slWeightToPay < 0) {
                            document.getElementById(prefix + 'SilverWtPrevBalCRDR').value = 'CR';
                        } else {
                            document.getElementById(prefix + 'SilverWtPrevBalCRDR').value = 'DR';
                        }
                    }
                    //
                    if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == '') {
                        gdWeightToPay = parseFloat(document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value) - parseFloat(document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value);
                        if (gdWeightToPay < 0) {
                            document.getElementById(prefix + 'GoldWtPrevBalCRDR').value = 'CR';
                        } else {
                            document.getElementById(prefix + 'GoldWtPrevBalCRDR').value = 'DR';
                        }
                    }
                    //
                    var GdSlAmt = 0;
                    if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR') ||
                            (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR')) {
                        GdSlAmt = Math.abs(Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value) + parseFloat(document.getElementById(prefix + 'CrystalValuation').value))).toFixed(2));
                    } else if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR') ||
                            (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR') ||
                            (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR')) {
                        GdSlAmt = Math.abs(Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value) - parseFloat(document.getElementById(prefix + 'SilverValuation').value) - parseFloat(document.getElementById(prefix + 'CrystalValuation').value))).toFixed(2));
                    }
                    //
                    var totGdSlAmountCRDR = '';
                    //
                    if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR') {
                        totGdSlAmountCRDR = 'CR';
                    } else if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR') {
                        totGdSlAmountCRDR = 'DR';
                    } else if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR') ||
                            (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR') ||
                            (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR')) {
                        var totGdAmount = Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value)).toFixed(2));
                        var totSlAmount = Math_round((parseFloat(document.getElementById(prefix + 'SilverValuation').value)).toFixed(2));
                        var totStAmount = Math_round((parseFloat(document.getElementById(prefix + 'CrystalValuation').value)).toFixed(2));
                        if (totGdAmount > totSlAmount) {
                            totGdSlAmountCRDR = document.getElementById(prefix + 'FinalGdCRDR').value;
                        } else if (totGdAmount < totSlAmount) {
                            totGdSlAmountCRDR = document.getElementById(prefix + 'FinalSlCRDR').value;
                        } else if (totGdAmount < totStAmount) {
                            totGdSlAmountCRDR = document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value;
                        }
                    }
                    //
                    var totalAmount = 0;
                    //
                    if ((totGdSlAmountCRDR == 'DR' && document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') ||
                            (totGdSlAmountCRDR == 'CR' && document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR')) {
                        totalAmount = Math.abs(Math_round(parseFloat(GdSlAmt) + parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value)).toFixed(2));
                        //
                    } else if ((totGdSlAmountCRDR == 'CR' && document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') ||
                            (totGdSlAmountCRDR == 'DR' && document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR')) {
                        totalAmount = Math.abs(Math_round(parseFloat(GdSlAmt) - parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value)).toFixed(2));
                    }
                    //
                    var PrevAmtDisp = parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value).toFixed(2);

                    if (GdSlAmt < PrevAmtDisp) {

                        document.getElementById(prefix + 'TransCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                        document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;

                    } else {

                        var metalGd1WtPrevBal = document.getElementById('metal1WtPrevBal').value;
                        var metalSl2WtPrevBal = document.getElementById('metal2WtPrevBal').value;
                        var metalSt3WtPrevBal = document.getElementById('metal3WtPrevBal').value;

                        if (metalGd1WtPrevBal > 0) {
                            document.getElementById(prefix + 'TransCRDR').value = document.getElementById(prefix + 'GoldWtPrevBalCRDR').value;
                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'GoldWtPrevBalCRDR').value;
                            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'GoldWtPrevBalCRDR').value;
                        }

                        if (metalSl2WtPrevBal > 0) {
                            document.getElementById(prefix + 'TransCRDR').value = document.getElementById(prefix + 'SilverWtPrevBalCRDR').value;
                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'SilverWtPrevBalCRDR').value;
                            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'SilverWtPrevBalCRDR').value;
                        }

                        if (metalSt3WtPrevBal > 0) {
                            document.getElementById(prefix + 'TransCRDR').value = document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value;
                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value;
                            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value;
                        }
                    }
                    if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
                        document.getElementById(prefix + 'PayTotAmt').value = parseFloat(GdSlAmt).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtBalDisp').value = parseFloat(GdSlAmt).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtAccess').value = parseFloat(GdSlAmt).toFixed(2);
                    }
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);
                    document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(parseFloat(totalAmount)).toFixed(2);

                }
                //alert('PayTotCashAmtDisp == ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);
//                alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);

            }

            //alert('TransCRDR @@ ' + document.getElementById(prefix + 'TransCRDR').value);

            // END @PRIYANKA-09APR18 
            // END @PRIYANKA-10APR18

        } else {

            //alert('GoldValuation == ' + document.getElementById(prefix + 'GoldValuation').value);
            //alert('SilverValuation == ' + document.getElementById(prefix + 'SilverValuation').value);

            var totGdSlAmount = 0;
            //
            if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR') ||
                    (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR')) {
                totGdSlAmount = Math.abs(Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value))).toFixed(2));
                stTotAmount = Math.abs(Math_round(parseFloat(document.getElementById(prefix + 'CrystalValuation').value)));
            } else if ((document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR') ||
                    (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR') ||
                    (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR' && document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR')) {
                totGdSlAmount = Math.abs(Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value) - parseFloat(document.getElementById(prefix + 'SilverValuation').value))).toFixed(2));
                stTotAmount = Math.abs(Math_round(parseFloat(document.getElementById(prefix + 'CrystalValuation').value)));
            } else {
                totGdSlAmount = Math.abs(Math_round((parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value))).toFixed(2));
                stTotAmount = Math.abs(Math_round(parseFloat(document.getElementById(prefix + 'CrystalValuation').value))); 
            }
            //

            document.getElementById(prefix + 'PayTotCashAmtDisp').value = parseFloat(totGdSlAmount).toFixed(2);
            document.getElementById(prefix + 'PayFinAmtBalDisp').value = parseFloat(totGdSlAmount).toFixed(2);
            document.getElementById(prefix + 'PayCrystalAmtDisp').value = parseFloat(stTotAmount).toFixed(2);
            document.getElementById(prefix + 'PayCrystalAmt').value = parseFloat(stTotAmount).toFixed(2);
            if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
                document.getElementById(prefix + 'PayTotAmt').value = parseFloat(totGdSlAmount).toFixed(2);
                document.getElementById(prefix + 'PayTotAmtAccess').value = parseFloat(totGdSlAmount).toFixed(2);
                document.getElementById(prefix + 'PayTotAmtBalDisp').value = parseFloat(totGdSlAmount).toFixed(2);
                document.getElementById(prefix + 'PayCrystalAmtDisp').value = parseFloat(stTotAmount).toFixed(2);
                document.getElementById(prefix + 'PayCrystalAmt').value = parseFloat(stTotAmount).toFixed(2);
            }

        }
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // END CODE TO CHECK CONDITIONS FOR PREVIOUS TOTAL CASH BALANCE CR OR DR FOR ADDING METAL AMOUNT IN PREVIOUS AMOUNT @MADHUREE-16JULY2020 //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        //
        // END CODE TO CHANGE FOR RATE CUT FUNCTIONALITY @PRIYANKA-19APR18

        // START @PRIYANKA-08APR18
        // END @PRIYANKA-05APR18        
        // END @PRIYANKA-07APR18

        var utinCashToMetalWt = document.getElementById('utin_cash_to_metalwt').value;
        var CashToGdMetalWt = document.getElementById('CashToGdMetalWt').value;
        var utinSlCashToMetalWt = document.getElementById('utin_sl_cash_to_metalwt').value;
        var CashToSlMetalWt = document.getElementById('CashToSlMetalWt').value;
        var utinStCashToMetalWt = document.getElementById('utin_st_cash_to_metalwt').value;
        var CashToStMetalWt = document.getElementById('CashToStMetalWt').value;

        if (utinCashToMetalWt > 0 || CashToGdMetalWt > 0 || utinSlCashToMetalWt > 0 || CashToSlMetalWt > 0 || utinStCashToMetalWt > 0 || CashToStMetalWt > 0) {
            //document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById(prefix + 'RtCtGdCRDR').value;
            //document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById(prefix + 'RtCtSlCRDR').value;
        } else {
            document.getElementById(prefix + 'FinalGdCRDR').value = document.getElementById(prefix + 'RtCtGdCRDR').value;
            document.getElementById(prefix + 'FinalSlCRDR').value = document.getElementById(prefix + 'RtCtSlCRDR').value;
            document.getElementById(prefix + 'FinalStCRDR').value = document.getElementById(prefix + 'RtCtStCRDR').value;
        }

        //alert('TransCRDR @@ ' + document.getElementById(prefix + 'TransCRDR').value);

        calcRateCutWeightPNL(prefix);

        //RtCtCashCRDR
//        alert('PayTotAmt === ' + document.getElementById(prefix + 'PayTotAmt').value); 
//        alert('PayTotCashAmtDisp == ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);
//        alert('PayFinAmtBalDisp == ' + document.getElementById(prefix + 'PayFinAmtBalDisp').value);
//        alert('PayTotAmtBalDisp == ' + document.getElementById(prefix + 'PayTotAmtBalDisp').value);
//        alert('PayTotAmtAccess == ' + document.getElementById(prefix + 'PayTotAmtAccess').value);

    }
    finalPaymentPanelFun(prefix);
}


//@Description : Calculate profit and loss @Author:SHRI10JAN17
function calcRateCutWeightPNL(prefix) {
// @Description : Calculate profit and loss for gold
    var goldRateCutRate = parseFloat(document.getElementById(prefix + 'GoldRate').value);
    var goldAvgRate = parseFloat(document.getElementById(prefix + 'GoldAvgRate').value);
    var goldRateCutW = parseFloat(document.getElementById(prefix + 'GoldRtCtWtBal').value);
    var goldRateCutWT = document.getElementById(prefix + 'GoldRtCtWtBalType').value;
    var goldRateCutValByCurrentRate = 0;
    var goldRateCutValByAvgRate = 0;
    if (goldRateCutWT == 'KG') {
        goldRateCutValByAvgRate = ((goldRateCutW * goldAvgRate) * document.getElementById('gmWtInKg').value).toFixed(2);
        goldRateCutValByCurrentRate = ((goldRateCutW * goldRateCutRate) * document.getElementById('gmWtInKg').value).toFixed(2);
    } else if (goldRateCutWT == 'GM') {
        goldRateCutValByAvgRate = ((goldRateCutW * goldAvgRate) / document.getElementById('gmWtInGm').value).toFixed(2);
        goldRateCutValByCurrentRate = ((goldRateCutW * goldRateCutRate) / document.getElementById('gmWtInGm').value).toFixed(2);
    } else if (goldRateCutWT == 'MG') {
        goldRateCutValByAvgRate = ((goldRateCutW * goldAvgRate) / document.getElementById('gmWtInMg').value).toFixed(2);
        goldRateCutValByCurrentRate = ((goldRateCutW * goldRateCutRate) / document.getElementById('gmWtInMg').value).toFixed(2);
    }

    document.getElementById('metal1WtPNL').value = parseFloat(goldRateCutValByCurrentRate - goldRateCutValByAvgRate).toFixed(2);
// @Description : Calculate profit and loss for silver
    var silverRateCutRate = parseFloat(document.getElementById(prefix + 'SilverRate').value);
    var silverAvgRate = parseFloat(document.getElementById(prefix + 'SilverAvgRate').value);
    var silverRateCutW = parseFloat(document.getElementById(prefix + 'SilverRtCtWtBal').value);
    var silverRateCutWT = document.getElementById(prefix + 'SilverRtCtWtBalType').value;
    var silverRateCutValByCurrentRate = 0;
    var silverRateCutValByAvgRate = 0;
    if (silverRateCutWT == 'KG') {
        silverRateCutValByAvgRate = ((silverRateCutW * silverAvgRate) * document.getElementById('srGmWtInKg').value).toFixed(2);
        silverRateCutValByCurrentRate = ((silverRateCutW * silverRateCutRate) * document.getElementById('srGmWtInKg').value).toFixed(2);
    } else if (silverRateCutWT == 'GM') {
        silverRateCutValByAvgRate = ((silverRateCutW * silverAvgRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
        silverRateCutValByCurrentRate = ((silverRateCutW * silverRateCutRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
    } else if (silverRateCutWT == 'MG') {
        silverRateCutValByAvgRate = ((silverRateCutW * silverAvgRate) / document.getElementById('srGmWtInMg').value).toFixed(2);
        silverRateCutValByCurrentRate = ((silverRateCutW * silverRateCutRate) / document.getElementById('srGmWtInMg').value).toFixed(2);
    }

    document.getElementById('metal2WtPNL').value = parseFloat(silverRateCutValByCurrentRate - silverRateCutValByAvgRate).toFixed(2);
}

function calcTotTax(prefix, finalTotalAmnt) {
    //
    //alert(('PayCashOthChgsDisp==' + document.getElementById('PayCashOthChgsDisp').value));
    //alert('cgstChk==' + document.getElementById('cgstChk').value);
    //alert('sgstChk==' + document.getElementById('sgstChk').value);
    //
    var PayTotAmt = 'PayTotAmt';
    //
    if (document.getElementById('transPanelName').value == 'UDHAAR' ||
            document.getElementById('transPanelName').value == 'MONEY') {
        PayTotAmt = 'udhaar_deposit_amt';
    }
    //
    var otherTax = document.getElementById(prefix + 'Tax').value;
    //
    if (otherTax == '' || otherTax == 'NaN') {
        otherTax = 0;
    }
    //
    //
    //
    var itemValIncludingTax = 0;
    itemValIncludingTax = parseFloat(parseFloat(document.getElementById(prefix + PayTotAmt).value));
    //
    if (document.getElementById('TaxByVal').checked) {
        itemValIncludingTax = getTaxByVal(prefix);
        document.getElementById('taxOnTotAmt').value = (parseFloat(itemValIncludingTax)).toFixed(2);
        document.getElementById('taxOnCGSTTotAmt').value = (parseFloat(itemValIncludingTax)).toFixed(2);
        document.getElementById('taxOnSGSTTotAmt').value = (parseFloat(itemValIncludingTax)).toFixed(2);
        document.getElementById('taxOnIGSTTotAmt').value = (parseFloat(itemValIncludingTax)).toFixed(2);
        document.getElementById('taxableAmount').value = (parseFloat(itemValIncludingTax)).toFixed(2);
    }
    //
    //
    //
    if (document.getElementById(prefix + 'Tax').value == '' &&
            document.getElementById(prefix + 'MkgChrgCGST').value == '' &&
            document.getElementById(prefix + 'MkgChrgSGST').value == '' &&
            document.getElementById(prefix + 'HallmarkChrgCGST').value == '' &&
            document.getElementById(prefix + 'HallmarkChrgSGST').value == '' &&
            document.getElementById(prefix + 'HallmarkChrgIGST').value == '' &&
            document.getElementById(prefix + 'CGST').value == '' &&
            document.getElementById(prefix + 'SGST').value == '' &&
            document.getElementById(prefix + 'IGST').value == '') {
        //
        if (document.getElementById('MkgTaxCheck').checked == true) {
            //
            document.getElementById('taxOnTotAmt').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            document.getElementById('taxOnCGSTTotAmt').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            document.getElementById('taxOnSGSTTotAmt').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            document.getElementById('taxOnIGSTTotAmt').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            document.getElementById('taxableAmount').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            //
            //
            //if(document.getElementById('paymentMode').value == 'ByCash') {
            //    var utin_oth_chgs_amt = parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value) + parseFloat(document.getElementById('valueAdded').value);
            //} else {
            var utin_oth_chgs_amt = parseFloat(document.getElementById('totMkngOrLabChgs').value).toFixed(2);
            //}
            //
            //
            document.getElementById('taxOnTotMkgCGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
            document.getElementById('taxOnTotMkgSGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
            //
            //
        } else if (document.getElementById('HallmarkTaxCheck').checked == true) {
            //
            document.getElementById('taxOnTotAmt').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            document.getElementById('taxOnCGSTTotAmt').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            document.getElementById('taxOnSGSTTotAmt').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            document.getElementById('taxOnIGSTTotAmt').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            document.getElementById('taxableAmount').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            //
            //
            //if(document.getElementById('paymentMode').value == 'ByCash') {
            //    var utin_hallmark_chrgs_amt = parseFloat(document.getElementById(prefix + 'PayTotHallmarkChgs').value));
            //} else {
            var utin_hallmark_chrgs_amt = parseFloat(document.getElementById('totHallmarkChgs').value).toFixed(2);
            //}
            //
            //
            document.getElementById('taxOnTotHallmarkCGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
            document.getElementById('taxOnTotHallmarkSGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
            document.getElementById('taxOnTotHallmarkIGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
            //
            //
        } else if (document.getElementById('MkgTaxCheck').checked == true &&
                document.getElementById('HallmarkTaxCheck').checked == true) {
            //
            document.getElementById('taxOnTotAmt').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            document.getElementById('taxOnCGSTTotAmt').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            document.getElementById('taxOnSGSTTotAmt').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            document.getElementById('taxOnIGSTTotAmt').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            document.getElementById('taxableAmount').value = ((parseFloat(document.getElementById(prefix + PayTotAmt).value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value))).toFixed(2);
            //
            //
            //if(document.getElementById('paymentMode').value == 'ByCash') {
            //    var utin_oth_chgs_amt = parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value) + parseFloat(document.getElementById('valueAdded').value);
            //} else {
            var utin_oth_chgs_amt = parseFloat(document.getElementById('totMkngOrLabChgs').value).toFixed(2);
            //}
            //
            //
            document.getElementById('taxOnTotMkgCGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
            document.getElementById('taxOnTotMkgSGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
            //
            //
            var utin_hallmark_chrgs_amt = parseFloat(document.getElementById('totHallmarkChgs').value).toFixed(2);
            //
            document.getElementById('taxOnTotHallmarkCGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
            document.getElementById('taxOnTotHallmarkSGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
            document.getElementById('taxOnTotHallmarkIGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
            //
            //
        } else {
            //
            if (document.getElementById('TaxByVal').checked) {
                //
                itemValIncludingTax = getTaxByVal(prefix);
                document.getElementById('taxOnTotAmt').value = (parseFloat(itemValIncludingTax)).toFixed(2);
                document.getElementById('taxOnCGSTTotAmt').value = (parseFloat(itemValIncludingTax)).toFixed(2);
                document.getElementById('taxOnSGSTTotAmt').value = (parseFloat(itemValIncludingTax)).toFixed(2);
                document.getElementById('taxOnIGSTTotAmt').value = (parseFloat(itemValIncludingTax)).toFixed(2);
                document.getElementById('taxableAmount').value = (parseFloat(itemValIncludingTax)).toFixed(2);

            } else {

                //alert(document.getElementById('payPanelName').value);

                if (document.getElementById('payPanelName').value != 'UdhaarPayment' && document.getElementById('payPanelName').value != 'UdhaarPaymentUpdate') {
                    document.getElementById(prefix + 'CGST').value = 1.5;
                    document.getElementById(prefix + 'SGST').value = 1.5;
                }

                // START CODE TO HIDE CGST, SGST & IGST TAX DIVISION @PRIYANKA-17MAY18
                if (document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' ||
                        document.getElementById('PaymentReceiptPanel').value == 'RECEIPT') {
                    document.getElementById('CGSTCheck').checked = false;
                    document.getElementById('SGSTCheck').checked = false;
                    document.getElementById('IGSTCheck').checked = false;
                    document.getElementById('CGSTDivision').style.display = 'none';
                    document.getElementById('SGSTDivision').style.display = 'none';
                    document.getElementById('IGSTDivision').style.display = 'none';
                }
                // END CODE TO HIDE CGST, SGST & IGST TAX DIVISION @PRIYANKA-17MAY18

                if (document.getElementById('utin_discount_per_discup').value == '' && document.getElementById('utin_discount_amt_discup').value == '') {
                         document.getElementById('taxOnTotAmt').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);
                    document.getElementById('taxOnCGSTTotAmt').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);
                    document.getElementById('taxOnSGSTTotAmt').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);
                    document.getElementById('taxOnIGSTTotAmt').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);
                    document.getElementById('taxableAmount').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);
                    document.getElementById('utin_total_taxable_amt').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);

//                    alert('total 1==' +document.getElementById('utin_total_taxable_amt').value);
                    }
                }
            }
    } else { 
        //
        //alert('CGST==' + document.getElementById(prefix + 'CGST').value);
        //
         if (document.getElementById(prefix + 'CGST').value == '' ||
                document.getElementById(prefix + 'CGST').value == '0.00'||document.getElementById(prefix + 'CGST').value == '0') {

            if (document.getElementById('cgstChk').value == 'checked' && document.getElementById('cgstPer').value == 'checked') {
                document.getElementById(prefix + 'CGST').value = 1.5;
            } else {
                document.getElementById(prefix + 'CGST').value = 0;
            }
        }
        //
        //alert('SGST ===' + document.getElementById(prefix + 'SGST').value);
        //
        if (document.getElementById(prefix + 'SGST').value == '' ||
                document.getElementById(prefix + 'SGST').value == '0.00' || document.getElementById(prefix + 'SGST').value == '0') {

            if (document.getElementById('sgstChk').value == 'checked' && document.getElementById('sgstPer').value == 'checked') {
                document.getElementById(prefix + 'SGST').value = 1.5;
            } else {
                document.getElementById(prefix + 'SGST').value = 0;
            }
        }
        //
//        alert('IGST ===' + document.getElementById(prefix + 'IGST').value);        
         if (document.getElementById(prefix + 'IGST').value == '' ||
                document.getElementById(prefix + 'IGST').value == '0.00' || document.getElementById(prefix + 'IGST').value == '0') {
            if (document.getElementById('IGSTCheck').value == 'on') {
                document.getElementById(prefix + 'IGST').value = 3;
            } else {
                document.getElementById(prefix + 'IGST').value = 0;
            }
        }
        //
        if (document.getElementById('utin_discount_per_discup').value == '' && document.getElementById('utin_discount_amt_discup').value == '') {
            //
            document.getElementById('taxOnTotAmt').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);
            document.getElementById('taxOnCGSTTotAmt').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);
            document.getElementById('taxOnSGSTTotAmt').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);
            document.getElementById('taxOnIGSTTotAmt').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);

            // CODE FOR IF FIXED MRP IS PRESENT THEN DO NOT ADD CRYSTAL VALUE IN TOTAL VALUATION : AUTHOR @DARSHANA 27 APRIL 2022
            if (document.getElementById('sttr_fixed_price_prod_present').value == 'YES') {
                document.getElementById('utin_total_taxable_amt').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value)).toFixed(2);
            } else {
                document.getElementById('utin_total_taxable_amt').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);
//                alert('document.getElementById(utin_total_taxable_amt).value =2= ' + document.getElementById('utin_total_taxable_amt').value);
            }
            //
            //
            if (document.getElementById('paymentMode').value == 'RateCut') {
                //
                if (document.getElementById('transPanelName').value == 'SellPayment' ||
                        document.getElementById("transPanelName").value == 'SellPayUp' ||
                        document.getElementById("transPanelName").value == 'PurchaseReturnPanel' ||
                        document.getElementById("transPanelName").value == 'PurchaseReturnPayUp' ||
                        document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                        document.getElementById("payPanelName").value == 'PurchaseReturnPayUp' ||
                        document.getElementById("payPanelName").value == 'SlPrPayment' ||
                        document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                        document.getElementById("payPanelName").value == 'ItemRepairPayUp' ||
                        document.getElementById("payPanelName").value == 'ApprovalPayment' ||
                        document.getElementById("payPanelName").value == 'ApprovalPayUp' ||
                        document.getElementById("transPanelName").value == 'ApprovalPayUp' ||
                        document.getElementById("payPanelName").value == 'NewOrderPayment' ||
                        document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
                        document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
                        document.getElementById('PaymentReceiptPanel').value == 'RECEIPT') { //@PRIYANKA-20MAY18
                    //
                    if (document.getElementById(prefix + 'PayableCashCRDR').value == 'CR' ||
                            document.getElementById(prefix + 'FinalCashCRDR').value == 'CR') {
                        document.getElementById('taxableAmount').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value)).toFixed(2);
                    } else {
                               document.getElementById('taxableAmount').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);
                       }

                } else if (document.getElementById('transPanelName').value == 'PurchasePayment' ||
                        document.getElementById("transPanelName").value == 'PurchasePayUp' ||
                        document.getElementById('transPanelName').value == 'ItemReturnPanel' ||
                        document.getElementById('transPanelName').value == 'StockReturnPanel' ||
                        document.getElementById('transPanelName').value == 'ItemReturnPayUp' ||
                        document.getElementById('PaymentReceiptPanel').value == 'PAYMENT') { //@PRIYANKA-20MAY18

                    if (document.getElementById(prefix + 'PayableCashCRDR').value == 'DR' ||
                            document.getElementById(prefix + 'FinalCashCRDR').value == 'DR') {
                        document.getElementById('taxableAmount').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value)).toFixed(2);
                    } else {
                        document.getElementById('taxableAmount').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);
                    }
                    }

            } else {
                document.getElementById('taxableAmount').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);
            }
            //
            //
            //alert('taxableAmount == ' + document.getElementById('taxableAmount').value);
            //
            //
        } else {
            //
            //
            if (document.getElementById("payPanelName").value == 'SellPayUp' ||
                    document.getElementById("payPanelName").value == 'ItemRepairPayUp' ||
                    document.getElementById("transPanelName").value == 'PurchaseReturnPayUp' ||
                    document.getElementById("payPanelName").value == 'ApprovalPayUp' ||
                    document.getElementById("payPanelName").value == 'RawPayUp' ||
                    document.getElementById("payPanelName").value == 'StockPayUp' ||
                    document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
                    document.getElementById("payPanelName").value == 'SuppOrderUp' ||
                    document.getElementById("payPanelName").value == 'CustSellPayUp' ||
                    document.getElementById("payPanelName").value == 'NwOrPayUp' ||
                    document.getElementById("payPanelName").value == 'SuppOrderDeliveryUp' ||
                    document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
                    document.getElementById("payPanelName").value == 'NewOrderPaymentUp') {
                //
                document.getElementById('taxOnTotAmt').value = ((parseFloat(document.getElementById(prefix + 'PayTotAmtBalDisp').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)) - parseFloat(document.getElementById('utin_discount_amt_discup').value)).toFixed(2);
                document.getElementById('taxOnCGSTTotAmt').value = ((parseFloat(document.getElementById(prefix + 'PayTotAmtBalDisp').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)) - parseFloat(document.getElementById('utin_discount_amt_discup').value)).toFixed(2);
                document.getElementById('taxOnSGSTTotAmt').value = ((parseFloat(document.getElementById(prefix + 'PayTotAmtBalDisp').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)) - parseFloat(document.getElementById('utin_discount_amt_discup').value)).toFixed(2);
                document.getElementById('taxOnIGSTTotAmt').value = ((parseFloat(document.getElementById(prefix + 'PayTotAmtBalDisp').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)) - parseFloat(document.getElementById('utin_discount_amt_discup').value)).toFixed(2);
                document.getElementById('taxableAmount').value = ((parseFloat(document.getElementById(prefix + 'PayTotAmtBalDisp').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)) - parseFloat(document.getElementById('utin_discount_amt_discup').value)).toFixed(2);
                document.getElementById('utin_total_taxable_amt').value = (parseFloat(document.getElementById(prefix + 'PayTotAmtBalDisp').value) + parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)).toFixed(2);
            }
        }
        //
        //
        if (document.getElementById('MkgTaxCheck').checked == true) {
            //
            if (document.getElementById(prefix + 'MkgChrgCGST').value == '' ||
                    document.getElementById(prefix + 'MkgChrgCGST').value == null ||
                    document.getElementById(prefix + 'MkgChrgSGST').value == '' ||
                    document.getElementById(prefix + 'MkgChrgSGST').value == null) {
                document.getElementById(prefix + 'MkgChrgCGST').value = 1.5;
                document.getElementById(prefix + 'MkgChrgSGST').value = 1.5;
            }
            //
            if (document.getElementById('totMkngOrLabChgs').value == '' ||
                    document.getElementById('totMkngOrLabChgs').value == 'NaN') {
                //
//                if (document.getElementById('paymentMode').value == 'ByCash') {
//                    var utin_oth_chgs_amt = parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value) + parseFloat(document.getElementById('valueAdded').value);
//                } else {
                var utin_oth_chgs_amt = parseFloat(document.getElementById(prefix + 'PayCashOthChgsDisp').value).toFixed(2);
//                }
                //
                document.getElementById('taxOnTotMkgCGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
                document.getElementById('taxOnTotMkgSGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
                //
            } else {
                //
//                if (document.getElementById('paymentMode').value == 'ByCash') {
//                    var utin_oth_chgs_amt = parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value) + parseFloat(document.getElementById('valueAdded').value);
//                } else {
                var utin_oth_chgs_amt = parseFloat(document.getElementById('totMkngOrLabChgs').value).toFixed(2);
//                }
                //
                if (document.getElementById('utin_discount_per_discup').value == '' &&
                        document.getElementById('utin_discount_amt_discup').value == '') {
                    document.getElementById('taxOnTotMkgCGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
                    document.getElementById('taxOnTotMkgSGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
                }
                //
            }
            //
            //
        } else if (document.getElementById('HallmarkTaxCheck').checked == true) {
            //
            //
            if (document.getElementById(prefix + 'HallmarkChrgCGST').value == '' ||
                    document.getElementById(prefix + 'HallmarkChrgCGST').value == null ||
                    document.getElementById(prefix + 'HallmarkChrgSGST').value == '' ||
                    document.getElementById(prefix + 'HallmarkChrgSGST').value == null) {
                document.getElementById(prefix + 'HallmarkChrgCGST').value = 1.5;
                document.getElementById(prefix + 'HallmarkChrgSGST').value = 1.5;
            }
            //
            if (document.getElementById('totHallmarkChgs').value == '' ||
                    document.getElementById('totHallmarkChgs').value == 'NaN') {
                //
                var utin_hallmark_chrgs_amt = parseFloat(document.getElementById(prefix + 'PayHallmarkChgsDisp').value).toFixed(2);
                //
                document.getElementById('taxOnTotHallmarkCGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
                document.getElementById('taxOnTotHallmarkSGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
                //
            } else {
                //
                var utin_hallmark_chrgs_amt = parseFloat(document.getElementById('totHallmarkChgs').value).toFixed(2);
                //
                if (document.getElementById('utin_discount_per_discup').value == '' &&
                        document.getElementById('utin_discount_amt_discup').value == '') {
                    document.getElementById('taxOnTotHallmarkCGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
                    document.getElementById('taxOnTotHallmarkSGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
                }
                //
            }
            //
            //
        } else if (document.getElementById('MkgTaxCheck').checked == true &&
                document.getElementById('HallmarkTaxCheck').checked == true) {
            //
            //
            if (document.getElementById(prefix + 'MkgChrgCGST').value == '' ||
                    document.getElementById(prefix + 'MkgChrgCGST').value == null ||
                    document.getElementById(prefix + 'MkgChrgSGST').value == '' ||
                    document.getElementById(prefix + 'MkgChrgSGST').value == null) {
                document.getElementById(prefix + 'MkgChrgCGST').value = 1.5;
                document.getElementById(prefix + 'MkgChrgSGST').value = 1.5;
            }
            //
            if (document.getElementById('totMkngOrLabChgs').value == '' ||
                    document.getElementById('totMkngOrLabChgs').value == 'NaN') {
                //
                //if (document.getElementById('paymentMode').value == 'ByCash') {
                //    var utin_oth_chgs_amt = parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value) + parseFloat(document.getElementById('valueAdded').value);
                //} else {
                var utin_oth_chgs_amt = parseFloat(document.getElementById(prefix + 'PayCashOthChgsDisp').value).toFixed(2);
                //}
                //
                document.getElementById('taxOnTotMkgCGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
                document.getElementById('taxOnTotMkgSGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
                //
            } else {
                //
                //if (document.getElementById('paymentMode').value == 'ByCash') {
                //    var utin_oth_chgs_amt = parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value) + parseFloat(document.getElementById('valueAdded').value);
                //} else {
                var utin_oth_chgs_amt = parseFloat(document.getElementById('totMkngOrLabChgs').value).toFixed(2);
                //}
                //
                if (document.getElementById('utin_discount_per_discup').value == '' &&
                        document.getElementById('utin_discount_amt_discup').value == '') {
                    document.getElementById('taxOnTotMkgCGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
                    document.getElementById('taxOnTotMkgSGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
                }
                //
            }
            //
            //
            if (document.getElementById(prefix + 'HallmarkChrgCGST').value == '' ||
                    document.getElementById(prefix + 'HallmarkChrgCGST').value == null ||
                    document.getElementById(prefix + 'HallmarkChrgSGST').value == '' ||
                    document.getElementById(prefix + 'HallmarkChrgSGST').value == null) {
                document.getElementById(prefix + 'HallmarkChrgCGST').value = 1.5;
                document.getElementById(prefix + 'HallmarkChrgSGST').value = 1.5;
            }
            //
            if (document.getElementById('totHallmarkChgs').value == '' ||
                    document.getElementById('totHallmarkChgs').value == 'NaN') {
                //
                var utin_hallmark_chrgs_amt = parseFloat(document.getElementById(prefix + 'PayHallmarkChgsDisp').value).toFixed(2);
                //
                document.getElementById('taxOnTotHallmarkCGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
                document.getElementById('taxOnTotHallmarkSGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
                //
            } else {
                //
                var utin_hallmark_chrgs_amt = parseFloat(document.getElementById('totHallmarkChgs').value).toFixed(2);
                //
                if (document.getElementById('utin_discount_per_discup').value == '' &&
                        document.getElementById('utin_discount_amt_discup').value == '') {
                    document.getElementById('taxOnTotHallmarkCGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
                    document.getElementById('taxOnTotHallmarkSGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
                }
                //
            }
            //
            //
        } else {
            //
            //
            document.getElementById(prefix + 'MkgChrgCGST').value = 0;
            document.getElementById(prefix + 'MkgChrgSGST').value = 0;
            //
            //
            document.getElementById(prefix + 'HallmarkChrgCGST').value = 0;
            document.getElementById(prefix + 'HallmarkChrgSGST').value = 0;
            document.getElementById(prefix + 'HallmarkChrgIGST').value = 0;
            //
            //
            //alert(document.getElementById('totMkngOrLabChgs').value);
            //
            //
            if (document.getElementById('totMkngOrLabChgs').value == '' ||
                    document.getElementById('totMkngOrLabChgs').value == 'NaN') {
                //
                //alert('Hello');
                //
                document.getElementById('taxOnTotMkgCGSTChrg').value = 0;
                document.getElementById('taxOnTotMkgSGSTChrg').value = 0;
                //
            } else {
                //
                //if (document.getElementById('paymentMode').value == 'ByCash') {
                //    var utin_oth_chgs_amt = parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value) + parseFloat(document.getElementById('valueAdded').value);
                //} else {
                var utin_oth_chgs_amt = parseFloat(document.getElementById('totMkngOrLabChgs').value).toFixed(2);
                //}
                //
                document.getElementById('taxOnTotMkgCGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
                document.getElementById('taxOnTotMkgSGSTChrg').value = parseFloat(utin_oth_chgs_amt).toFixed(2);
            }
            //
            //
            if (document.getElementById('totHallmarkChgs').value == '' ||
                    document.getElementById('totHallmarkChgs').value == 'NaN') {
                //
                document.getElementById('taxOnTotHallmarkCGSTChrg').value = 0;
                document.getElementById('taxOnTotHallmarkSGSTChrg').value = 0;
                document.getElementById('taxOnTotHallmarkIGSTChrg').value = 0;
                //
            } else {
                //
                var utin_hallmark_chrgs_amt = parseFloat(document.getElementById('totHallmarkChgs').value).toFixed(2);
                //
                document.getElementById('taxOnTotHallmarkCGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
                document.getElementById('taxOnTotHallmarkSGSTChrg').value = parseFloat(utin_hallmark_chrgs_amt).toFixed(2);
                //
            }
            //
            //
        }
    }
    //
    //
    //
    //
    // START CODE To Apply Tax on Total Amount (Metal Valuation + Other Charges + Crystal Charges) @PRIYANKA-01JAN18
    if (document.getElementById('utin_pay_tax_on_total_amt_chk').checked) {
        //
        //
        //alert('itemValIncludingTax === ' + itemValIncludingTax);
        //
        //
        if (document.getElementById('TaxByVal').checked && document.getElementById('utin_pay_tax_on_total_amt_chk').checked) {
            var metVal = (parseFloat(itemValIncludingTax - (parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value) +
                    parseFloat(document.getElementById(prefix + 'PayTotHallmarkChgs').value) +parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)))).toFixed(2);
        } else {
            var metVal = (parseFloat(itemValIncludingTax)).toFixed(2); // Metal Valuation
        }

        //alert('metVal === ' + metVal);

        var otherChrgs = 0;
        var crystalChrgs = 0;
        var hallmarkingChrgs = 0;

        if (typeof (document.getElementById(prefix + 'PayCashOthChgsDisp')) != 'undefined' &&
                document.getElementById(prefix + 'PayCashOthChgsDisp') != null) {
            //
            otherChrgs = document.getElementById(prefix + 'PayCashOthChgsDisp').value; // Other Charges
            //
            if (typeof (otherChrgs) != 'undefined' && otherChrgs != null) {
                otherChrgs = otherChrgs.replace(/\,/g, '');
            }
        }

        //alert('otherChrgs === ' + otherChrgs);

        if (typeof (document.getElementById(prefix + 'PayHallmarkChgsDisp')) != 'undefined' &&
                document.getElementById(prefix + 'PayHallmarkChgsDisp') != null) {
            //
            hallmarkingChrgs = document.getElementById(prefix + 'PayHallmarkChgsDisp').value; // Hallmarking Charges
            //
            if (typeof (hallmarkingChrgs) != 'undefined' && hallmarkingChrgs != null) {
                hallmarkingChrgs = hallmarkingChrgs.replace(/\,/g, '');
            }
        }

        //alert('hallmarkingChrgs === ' + hallmarkingChrgs);

        if (typeof (document.getElementById(prefix + 'PayCrystalAmtDisp')) != 'undefined' &&
                document.getElementById(prefix + 'PayCrystalAmtDisp') != null) {
            //
            crystalChrgs = document.getElementById(prefix + 'PayCrystalAmtDisp').value; // Crystal Charges
            //
            if (typeof (crystalChrgs) != 'undefined' && crystalChrgs != null) {
                crystalChrgs = crystalChrgs.replace(/\,/g, '');
            }
        }

        //alert('sttr_fixed_price_prod_present === ' + document.getElementById('sttr_fixed_price_prod_present').value);
        //alert('metVal === ' + metVal);
        //alert('otherChrgs === ' + otherChrgs);
        //alert('crystalChrgs === ' + crystalChrgs);
        //alert('hallmarkingChrgs === ' + hallmarkingChrgs);

        // CODE FOR IF FIXED MRP IS PRESENT THEN DO NOT ADD CRYSTAL VALUE IN TOTAL VALUATION : AUTHOR @DARSHANA 27 APRIL 2022
        var finalTaxAmt = 0;
        if (document.getElementById('sttr_fixed_price_prod_present').value == 'YES') {

            //finalTaxAmt = (parseFloat(metVal)).toFixed(2); // Total Amount

              if(document.getElementById('HallmarkTaxCheck').checked == true){
             finalTaxAmt = (parseFloat(metVal) + parseFloat(otherChrgs) + parseFloat(crystalChrgs)).toFixed(2); // Total Amount
             }else{
            finalTaxAmt = (parseFloat(metVal) + parseFloat(otherChrgs) + parseFloat(crystalChrgs) + parseFloat(hallmarkingChrgs)).toFixed(2); // Total Amount
        }

        } else {
//            alert('finalTaxAmt-22->'+finalTaxAmt);
            if (hallmarkingChrgs == '' || hallmarkingChrgs == null) {
                hallmarkingChrgs = 0;
            }
            if (crystalChrgs == '' || crystalChrgs == null) {
                crystalChrgs = 0;
            }
            if(document.getElementById('HallmarkTaxCheck').checked == true){
             finalTaxAmt = (parseFloat(metVal) + parseFloat(otherChrgs) + parseFloat(crystalChrgs)).toFixed(2); // Total Amount
             }else{
            finalTaxAmt = (parseFloat(metVal) + parseFloat(otherChrgs) + parseFloat(crystalChrgs) + parseFloat(hallmarkingChrgs)).toFixed(2); // Total Amount
        }
        }

        if (typeof (finalTaxAmt) != 'undefined' && finalTaxAmt != null) {
            finalTaxAmt = finalTaxAmt.replace(/\,/g, '');
        }

//        alert('finalTaxAmt == ' + finalTaxAmt);

        // START CODE TO APPLY DISCOUNT BEFORE GST ON TOTAL AMOUNT @PRIYANKA-24JULY18
        if (document.getElementById('utin_discount_per_discup').value == '' && document.getElementById('utin_discount_amt_discup').value == '') {
            document.getElementById('taxOnTotAmt').value = parseFloat(finalTaxAmt).toFixed(2); // Tax Apply on Total Amount
            document.getElementById('taxOnCGSTTotAmt').value = parseFloat(finalTaxAmt).toFixed(2); // Tax Apply on Total Amount
            document.getElementById('taxOnSGSTTotAmt').value = parseFloat(finalTaxAmt).toFixed(2); // Tax Apply on Total Amount
            document.getElementById('taxOnIGSTTotAmt').value = parseFloat(finalTaxAmt).toFixed(2); // Tax Apply on Total Amount
            document.getElementById('taxableAmount').value = parseFloat(finalTaxAmt).toFixed(2);
            document.getElementById('utin_total_taxable_amt').value = parseFloat(finalTaxAmt).toFixed(2);
//            alert('document.getElementById(utin_total_taxable_amt).value =33= ' + document.getElementById('utin_total_taxable_amt').value);
        } else {
            document.getElementById('taxOnTotAmt').value = (parseFloat(finalTaxAmt) - parseFloat(document.getElementById('utin_discount_amt_discup').value)).toFixed(2); // Tax Apply on Total Amount
            document.getElementById('taxOnCGSTTotAmt').value = (parseFloat(finalTaxAmt) - parseFloat(document.getElementById('utin_discount_amt_discup').value)).toFixed(2); // Tax Apply on Total Amount
            document.getElementById('taxOnSGSTTotAmt').value = (parseFloat(finalTaxAmt) - parseFloat(document.getElementById('utin_discount_amt_discup').value)).toFixed(2); // Tax Apply on Total Amount
            document.getElementById('taxOnIGSTTotAmt').value = (parseFloat(finalTaxAmt) - parseFloat(document.getElementById('utin_discount_amt_discup').value)).toFixed(2); // Tax Apply on Total Amount
            document.getElementById('taxableAmount').value = (parseFloat(finalTaxAmt) - parseFloat(document.getElementById('utin_discount_amt_discup').value)).toFixed(2); // Tax Apply on Total Amount
            document.getElementById('utin_total_taxable_amt').value = parseFloat(finalTaxAmt).toFixed(2); // Tax Apply on Total Amount
//            alert(' hii 5');
        }
        // END CODE TO APPLY DISCOUNT BEFORE GST ON TOTAL AMOUNT @PRIYANKA-24JULY18

        // START CODE TO MINUS ADDITIONAL CHARGES BEFORE APPLY GST @PRIYANKA-23AUG2019
        if (document.getElementById('utin_additional_charges').value > 0 && document.getElementById('additionalChargesPlusMinus').value == 'minus') {
            document.getElementById('taxOnTotAmt').value = parseFloat(parseFloat(document.getElementById('taxOnTotAmt').value) - parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
            document.getElementById('taxOnCGSTTotAmt').value = parseFloat(parseFloat(document.getElementById('taxOnCGSTTotAmt').value) - parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
            document.getElementById('taxOnSGSTTotAmt').value = parseFloat(parseFloat(document.getElementById('taxOnSGSTTotAmt').value) - parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
            document.getElementById('taxOnIGSTTotAmt').value = parseFloat(parseFloat(document.getElementById('taxOnIGSTTotAmt').value) - parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
            document.getElementById('taxableAmount').value = parseFloat(parseFloat(document.getElementById('taxableAmount').value) - parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
            //document.getElementById('utin_total_taxable_amt').value = parseFloat(parseFloat(document.getElementById('utin_total_taxable_amt').value) - parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
        } else if (document.getElementById('utin_additional_charges').value > 0 && document.getElementById('additionalChargesPlusMinus').value == 'plus') {
            document.getElementById('taxOnTotAmt').value = parseFloat(parseFloat(document.getElementById('taxOnTotAmt').value) + parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
            document.getElementById('taxOnCGSTTotAmt').value = parseFloat(parseFloat(document.getElementById('taxOnCGSTTotAmt').value) + parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
            document.getElementById('taxOnSGSTTotAmt').value = parseFloat(parseFloat(document.getElementById('taxOnSGSTTotAmt').value) + parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
            document.getElementById('taxOnIGSTTotAmt').value = parseFloat(parseFloat(document.getElementById('taxOnIGSTTotAmt').value) + parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
            document.getElementById('taxableAmount').value = parseFloat(parseFloat(document.getElementById('taxableAmount').value) + parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
            //document.getElementById('utin_total_taxable_amt').value = parseFloat(parseFloat(document.getElementById('utin_total_taxable_amt').value) + parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
        }
        // END CODE TO MINUS ADDITIONAL CHARGES BEFORE APPLY GST @PRIYANKA-23AUG2019

        if (document.getElementById('utin_additional_charges').value == null ||
                document.getElementById('utin_additional_charges').value == 'undefined') {
            document.getElementById('utin_additional_charges').value = '0.00';
        }

        if (document.getElementById('utin_additional_charges').value != '' &&
                document.getElementById('utin_additional_charges').value != null) {
            document.getElementById('utin_additional_charges_disp').value = parseFloat(document.getElementById('utin_additional_charges').value).toFixed(2);
        } else {
            document.getElementById('utin_additional_charges_disp').value = parseFloat(0).toFixed(2);
        }


    }
    // END CODE To Apply Tax on Total Amount (Metal Valuation + Other Charges + Crystal Charges) @PRIYANKA-01JAN18
    //
    //
    //alert('transPanelName  == ' + document.getElementById("transPanelName").value);
    //alert('payPanelName  == ' + document.getElementById("payPanelName").value);
    //
    //
    if (document.getElementById('paymentMode').value == 'RateCut') {
        //
        if (document.getElementById('transPanelName').value == 'SellPayment' ||
                document.getElementById("transPanelName").value == 'SellPayUp' ||
                document.getElementById("transPanelName").value == 'ItemRepairPayment' ||
                document.getElementById("transPanelName").value == 'ItemRepairPayUp' ||
                document.getElementById("transPanelName").value == 'PurchaseReturnPanel' ||
                document.getElementById("transPanelName").value == 'PurchaseReturnPayUp' ||
                document.getElementById("transPanelName").value == 'ApprovalPayUp' ||
                document.getElementById("payPanelName").value == 'NewOrderPayment' ||
                document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
                document.getElementById("payPanelName").value == 'NewOrderPaymentUp') {
            //
            if (document.getElementById(prefix + 'PayableCashCRDR').value == 'CR' ||
                    document.getElementById(prefix + 'FinalCashCRDR').value == 'CR') {
                //
                var totalOthChgs = document.getElementById(prefix + 'PayCashOthChgsDisp').value; // Other Charges
                var totalOthCharges = totalOthChgs.replace(/\,/g, '');
                //
                var crystalChrgs = document.getElementById(prefix + 'PayCrystalAmtDisp').value; // Crystal Charges
                crystalChrgs = crystalChrgs.replace(/\,/g, '');
                //
                //
                var totalHallmarkChgs = document.getElementById(prefix + 'PayHallmarkChgsDisp').value; // Hallmark Charges
                var totalHallmarkCharges = totalHallmarkChgs.replace(/\,/g, '');
                //
                //
                //alert('totalHallmarkCharges  == ' + totalHallmarkCharges);
                //alert('totalOthCharges  == ' + totalOthCharges);
                //alert('crystalChrgs  == ' + crystalChrgs);
                //
                //
                var taxableAmt = parseFloat(document.getElementById('taxableAmount').value);
                //
                //alert('taxableAmt  **== ' + taxableAmt);
                //
                document.getElementById('taxableAmount').value = (parseFloat(taxableAmt) - (parseFloat(totalOthCharges) + parseFloat(crystalChrgs))).toFixed(2);
                //
                //alert('taxableAmount  @@== ' + document.getElementById('taxableAmount').value);
                //
                document.getElementById('taxOnTotAmt').value = parseFloat(document.getElementById('taxableAmount').value).toFixed(2); // Tax Apply on Total Amount
                document.getElementById('taxOnCGSTTotAmt').value = parseFloat(document.getElementById('taxableAmount').value).toFixed(2); // Tax Apply on Total Amount
                document.getElementById('taxOnSGSTTotAmt').value = parseFloat(document.getElementById('taxableAmount').value).toFixed(2); // Tax Apply on Total Amount
                document.getElementById('taxOnIGSTTotAmt').value = parseFloat(document.getElementById('taxableAmount').value).toFixed(2); // Tax Apply on Total Amount
            }

        } else if (document.getElementById('transPanelName').value == 'PurchasePayment' ||
                document.getElementById("transPanelName").value == 'PurchasePayUp' ||
                document.getElementById('transPanelName').value == 'ItemReturnPanel' ||
                document.getElementById('transPanelName').value == 'StockReturnPanel' ||
                document.getElementById('transPanelName').value == 'ItemReturnPayUp') {

            if (document.getElementById(prefix + 'PayableCashCRDR').value == 'DR' ||
                    document.getElementById(prefix + 'FinalCashCRDR').value == 'DR') {
                //
                var totalOthChgs = document.getElementById(prefix + 'PayCashOthChgsDisp').value; // Other CHarges
                var totalOthCharges = totalOthChgs.replace(/\,/g, '');
                //
                var crystalChrgs = document.getElementById(prefix + 'PayCrystalAmtDisp').value; // Crystal Charges
                crystalChrgs = crystalChrgs.replace(/\,/g, '');
                //
                //
                var totalHallmarkChgs = document.getElementById(prefix + 'PayHallmarkChgsDisp').value; // Hallmark Charges
                var totalHallmarkCharges = totalHallmarkChgs.replace(/\,/g, '');
                //
                //
                //alert('totalOthCharges  == ' + totalOthCharges);
                //alert('crystalChrgs  == ' + crystalChrgs);
                //
                var taxableAmt = parseFloat(document.getElementById('taxableAmount').value);
                //
                //alert('taxableAmt  **== ' + taxableAmt);
                //
                document.getElementById('taxableAmount').value = (parseFloat(taxableAmt) - (parseFloat(totalOthCharges) + parseFloat(crystalChrgs))).toFixed(2);
                //
                //alert('taxableAmount  @@== ' + document.getElementById('taxableAmount').value);
                //
                document.getElementById('taxOnTotAmt').value = parseFloat(document.getElementById('taxableAmount').value).toFixed(2); // Tax Apply on Total Amount
                document.getElementById('taxOnCGSTTotAmt').value = parseFloat(document.getElementById('taxableAmount').value).toFixed(2); // Tax Apply on Total Amount
                document.getElementById('taxOnSGSTTotAmt').value = parseFloat(document.getElementById('taxableAmount').value).toFixed(2); // Tax Apply on Total Amount
                document.getElementById('taxOnIGSTTotAmt').value = parseFloat(document.getElementById('taxableAmount').value).toFixed(2); // Tax Apply on Total Amount
            }
        }
    }
    //
    //
    //alert('taxableAmount == ' + document.getElementById('taxableAmount').value);
    //
    //
    var mkgChrgCGST = document.getElementById(prefix + 'MkgChrgCGST').value;
    var mkgChrgSGST = document.getElementById(prefix + 'MkgChrgSGST').value;
    //
    //
    var hallmarkChrgCGST = document.getElementById(prefix + 'HallmarkChrgCGST').value;
    var hallmarkChrgSGST = document.getElementById(prefix + 'HallmarkChrgSGST').value;
    var hallmarkChrgIGST = document.getElementById(prefix + 'HallmarkChrgIGST').value;
    //
    //
    var CGST = document.getElementById(prefix + 'CGST').value;
    var SGST = document.getElementById(prefix + 'SGST').value;
    var IGST = document.getElementById(prefix + 'IGST').value;

    /* START TO CODE GETTING DTAILS OF OTHER COMMON TAX @AUTHOR: MADHUREE-30MARCH2020 */
    var CommonTAX = document.getElementById(prefix + 'Tax').value;
    /* END TO CODE GETTING DTAILS OF OTHER COMMON TAX @AUTHOR: MADHUREE-30MARCH2020 */

    if (CGST == '' || CGST == 'NaN') {
        CGST = 0;
    }

    if (SGST == '' || SGST == 'NaN') {
        SGST = 0;
    }

    if (IGST == '' || IGST == 'NaN') {
        IGST = 0;
    }

    /* START TO CODE GETTING DTAILS OF OTHER COMMON TAX @AUTHOR: MADHUREE-30MARCH2020 */
    if (CommonTAX == '' || CommonTAX == 'NaN') {
        CommonTAX = 0;
    }
    /* END TO CODE GETTING DTAILS OF OTHER COMMON TAX @AUTHOR: MADHUREE-30MARCH2020 */

    var taxOnTotAmt = document.getElementById('taxOnTotAmt').value;
    if (taxOnTotAmt == '' || taxOnTotAmt == 'NaN') {
        taxOnTotAmt = 0;
    }

    var totOthTax = parseFloat(otherTax) / 100;
    document.getElementById(prefix + 'PayTaxAmtDisp').value = (parseFloat(totOthTax * parseFloat(taxOnTotAmt))).toFixed(2);
    document.getElementById(prefix + 'TaxAmt').value = (parseFloat(totOthTax * parseFloat(taxOnTotAmt))).toFixed(2);

    // MAKING CHRG CGST CALC

    var taxOnTotMkgCGSTChrg = document.getElementById('taxOnTotMkgCGSTChrg').value;
    taxOnTotMkgCGSTChrg = taxOnTotMkgCGSTChrg.replace(/\,/g, '');

    //alert('taxOnTotMkgCGSTChrg==' + taxOnTotMkgCGSTChrg);

    if (taxOnTotMkgCGSTChrg == '' || taxOnTotMkgCGSTChrg == 'NaN') {
        taxOnTotMkgCGSTChrg = 0;
    }

    //alert('taxOnTotMkgCGSTChrg2' + taxOnTotMkgCGSTChrg);

    if (mkgChrgCGST == '' || mkgChrgCGST == 'NaN') {
        mkgChrgCGST = 0;
    }

    var totMkgCGST = parseFloat(mkgChrgCGST) / 100;
    document.getElementById(prefix + 'PayMkgCGSTAmtDisp').value = (parseFloat(totMkgCGST * parseFloat(taxOnTotMkgCGSTChrg))).toFixed(2);
    document.getElementById(prefix + 'MkgChrgCGSTAmt').value = (parseFloat(totMkgCGST * parseFloat(taxOnTotMkgCGSTChrg))).toFixed(2);

    // MAKING CHRG SGST CALC

    var taxOnTotMkgSGSTChrg = document.getElementById('taxOnTotMkgSGSTChrg').value;
    taxOnTotMkgSGSTChrg = taxOnTotMkgSGSTChrg.replace(/\,/g, '');

    if (taxOnTotMkgSGSTChrg == '' || taxOnTotMkgSGSTChrg == 'NaN') {
        taxOnTotMkgSGSTChrg = 0;
    }

    if (mkgChrgSGST == '' || mkgChrgSGST == 'NaN') {
        mkgChrgSGST = 0;
    }

    var totMkgSGST = parseFloat(mkgChrgSGST) / 100;
    document.getElementById(prefix + 'PayMkgSGSTAmtDisp').value = (parseFloat(totMkgSGST * parseFloat(taxOnTotMkgSGSTChrg))).toFixed(2);
    document.getElementById(prefix + 'MkgChrgSGSTAmt').value = (parseFloat(totMkgSGST * parseFloat(taxOnTotMkgSGSTChrg))).toFixed(2);
    //
    //
    //
    //
    // HALLMARK CHRG CGST CALC @PRIYANKA-26MAY2022 
    var taxOnTotHallmarkCGSTChrg = document.getElementById('taxOnTotHallmarkCGSTChrg').value;
    taxOnTotHallmarkCGSTChrg = taxOnTotHallmarkCGSTChrg.replace(/\,/g, '');
    //
    //alert('taxOnTotHallmarkCGSTChrg == ' + taxOnTotHallmarkCGSTChrg);
    //
    if (taxOnTotHallmarkCGSTChrg == '' || taxOnTotHallmarkCGSTChrg == 'NaN') {
        taxOnTotHallmarkCGSTChrg = 0;
    }
    //
    //alert('taxOnTotHallmarkCGSTChrg === ' + taxOnTotHallmarkCGSTChrg);
    //
    if (hallmarkChrgCGST == '' || hallmarkChrgCGST == 'NaN') {
        hallmarkChrgCGST = 0;
    }
    //
    var totHallmarkCGST = parseFloat(hallmarkChrgCGST) / 100;
    document.getElementById(prefix + 'PayHallmarkCGSTAmtDisp').value = (parseFloat(totHallmarkCGST * parseFloat(taxOnTotHallmarkCGSTChrg))).toFixed(2);
    document.getElementById(prefix + 'HallmarkChrgCGSTAmt').value = (parseFloat(totHallmarkCGST * parseFloat(taxOnTotHallmarkCGSTChrg))).toFixed(2);
    //
    //
    // HALLMARK CHRG SGST CALC @PRIYANKA-26MAY2022 
    var taxOnTotHallmarkSGSTChrg = document.getElementById('taxOnTotHallmarkSGSTChrg').value;
    taxOnTotHallmarkSGSTChrg = taxOnTotHallmarkSGSTChrg.replace(/\,/g, '');
    //
    if (taxOnTotHallmarkSGSTChrg == '' || taxOnTotHallmarkSGSTChrg == 'NaN') {
        taxOnTotHallmarkSGSTChrg = 0;
    }
    //
    if (hallmarkChrgSGST == '' || hallmarkChrgSGST == 'NaN') {
        hallmarkChrgSGST = 0;
    }
    //
    var totHallmarkSGST = parseFloat(hallmarkChrgSGST) / 100;
    document.getElementById(prefix + 'PayHallmarkSGSTAmtDisp').value = (parseFloat(totHallmarkSGST * parseFloat(taxOnTotHallmarkSGSTChrg))).toFixed(2);
    document.getElementById(prefix + 'HallmarkChrgSGSTAmt').value = (parseFloat(totHallmarkSGST * parseFloat(taxOnTotHallmarkSGSTChrg))).toFixed(2);
    //
    //
    // HALLMARK CHRG IGST CALC @PRIYANKA-26MAY2022 
    var taxOnTotHallmarkIGSTChrg = document.getElementById('taxOnTotHallmarkIGSTChrg').value;
    taxOnTotHallmarkIGSTChrg = taxOnTotHallmarkIGSTChrg.replace(/\,/g, '');
    //
    if (taxOnTotHallmarkIGSTChrg == '' || taxOnTotHallmarkIGSTChrg == 'NaN') {
        taxOnTotHallmarkIGSTChrg = 0;
    }
    //
    if (hallmarkChrgIGST == '' || hallmarkChrgIGST == 'NaN') {
        hallmarkChrgIGST = 0;
    }
    //
    var totHallmarkIGST = parseFloat(hallmarkChrgIGST) / 100;
    document.getElementById(prefix + 'PayHallmarkIGSTAmtDisp').value = (parseFloat(totHallmarkIGST * parseFloat(taxOnTotHallmarkIGSTChrg))).toFixed(2);
    document.getElementById(prefix + 'HallmarkChrgIGSTAmt').value = (parseFloat(totHallmarkIGST * parseFloat(taxOnTotHallmarkIGSTChrg))).toFixed(2);
    //
    //
    //
    //
    // CGST Calc
    var taxOnCGSTTotAmt = document.getElementById('taxOnCGSTTotAmt').value;

    if (taxOnCGSTTotAmt == '' || taxOnCGSTTotAmt == 'NaN') {
        taxOnCGSTTotAmt = 0;
    }

    var totCGST = parseFloat(CGST) / 100;

    if (document.getElementById('CGSTCheck').checked == false) {
        document.getElementById(prefix + 'PayCGSTAmtDisp').value = '0.00';
    } else {
        document.getElementById(prefix + 'PayCGSTAmtDisp').value = (parseFloat(totCGST * parseFloat(taxOnCGSTTotAmt))).toFixed(2);
    }

    document.getElementById(prefix + 'CGSTAmt').value = (parseFloat(totCGST * parseFloat(taxOnCGSTTotAmt))).toFixed(2);

    // SGST Calc
    var taxOnSGSTTotAmt = document.getElementById('taxOnSGSTTotAmt').value;

    if (taxOnSGSTTotAmt == '' || taxOnSGSTTotAmt == 'NaN') {
        taxOnSGSTTotAmt = 0;
    }

    var totSGST = parseFloat(SGST) / 100;

    if (document.getElementById('SGSTCheck').checked == false) {
        document.getElementById(prefix + 'PaySGSTAmtDisp').value = '0.00';
    } else {
        document.getElementById(prefix + 'PaySGSTAmtDisp').value = (parseFloat(totSGST * parseFloat(taxOnSGSTTotAmt))).toFixed(2);
    }

    document.getElementById(prefix + 'SGSTAmt').value = (parseFloat(totSGST * parseFloat(taxOnSGSTTotAmt))).toFixed(2);

    // IGST Calc
    var taxOnIGSTTotAmt = document.getElementById('taxOnIGSTTotAmt').value;

    if (taxOnIGSTTotAmt == '' || taxOnIGSTTotAmt == 'NaN') {
        taxOnIGSTTotAmt = 0;
    }

    var totIGST = parseFloat(IGST) / 100;

    // @PRIYANKA-28SEP2018
    if (document.getElementById('IGSTCheck').checked == false) {
        document.getElementById(prefix + 'PayIGSTAmtDisp').value = '0.00';
    } else {
        document.getElementById(prefix + 'PayIGSTAmtDisp').value = (parseFloat(totIGST * parseFloat(taxOnIGSTTotAmt))).toFixed(2);
    }

    document.getElementById(prefix + 'IGSTAmt').value = (parseFloat(totIGST * parseFloat(taxOnIGSTTotAmt))).toFixed(2);

    /* START TO CODE FOR COMMON TAX CALCULATION ON BASIS OF HIDDEN OR VISIBLE @AUTHOR: MADHUREE-30MARCH2020 */
    // COMMON TAX Calc
    var taxOnCommonTotAmt = document.getElementById('taxOnTotAmt').value;

    if (taxOnCommonTotAmt == '' || taxOnCommonTotAmt == 'NaN') {
        taxOnCommonTotAmt = 0;
    }

    var totCommonTax = parseFloat(CommonTAX) / 100;

    if (document.getElementById('CommTaxCheck').checked == false) {
        document.getElementById(prefix + 'PayTaxAmtDisp').value = '0.00';
    } else {
        let CommTaxCheckAcc = document.getElementById(prefix + 'PayTaxAccId');
        let selectedCommTaxCheckAcc = CommTaxCheckAcc.options[CommTaxCheckAcc.selectedIndex].text;
        selectedCommTaxCheckAcc = selectedCommTaxCheckAcc.trim();
        if (selectedCommTaxCheckAcc == 'TDS') {
            document.getElementById(prefix + 'PayTaxAmtDisp').value = -(parseFloat(totCommonTax * parseFloat(taxOnCommonTotAmt))).toFixed(2);
            document.getElementById(prefix + 'TaxAmt').value = -(parseFloat(totCommonTax * parseFloat(taxOnCommonTotAmt))).toFixed(2);            
        } else {
            document.getElementById(prefix + 'PayTaxAmtDisp').value = (parseFloat(totCommonTax * parseFloat(taxOnCommonTotAmt))).toFixed(2);
            document.getElementById(prefix + 'TaxAmt').value = (parseFloat(totCommonTax * parseFloat(taxOnCommonTotAmt))).toFixed(2);
        }
    }

    /* END TO CODE FOR COMMON TAX CALCULATION ON BASIS OF HIDDEN OR VISIBLE @AUTHOR: MADHUREE-30MARCH2020 */

}



function calcCourierChrg(prefix, finalTotalAmnt) {
    var courierAmt = document.getElementById(prefix + 'PayCourierAmt').value;
    if (courierAmt == '' || courierAmt == 'NaN') {
        courierAmt = 0;
    }

    document.getElementById(prefix + 'PayCourierAmtDisp').value = parseFloat(courierAmt).toFixed(2);
    finalTotalAmnt = parseFloat(finalTotalAmnt) + parseFloat(courierAmt);
    return finalTotalAmnt;
}
// Start Other Charge @Author:Vinod : 26-May-2023
function calcOtherChrg(prefix, finalTotalAmnt) {
    var otherchrAmt = document.getElementById(prefix + 'PayOtherAmt').value;
    if (otherchrAmt == '' || otherchrAmt == 'NaN') {
        otherchrAmt = 0;
    }

    document.getElementById(prefix + 'PayOtherAmtDisp').value = parseFloat(otherchrAmt).toFixed(2);
    finalTotalAmnt = parseFloat(finalTotalAmnt) + parseFloat(otherchrAmt);
    return finalTotalAmnt;
}
// End Other Charge @Author:Vinod : 26-May-2023
//Adding condition for onpurchase payment if limit has been set then it will display popup by CHETAN@03082023
function calcCashNdChequeAmt(prefix) {
    var totalAmount = 0;
    var cashRec = document.getElementById(prefix + 'PayCashAmtRec').value;
    var chequeRec = document.getElementById(prefix + 'PayChequeAmt').value;
    if (cashRec == null || cashRec == '') {
        cashRec = 0.00;
    }
    if (chequeRec == null || chequeRec == '') {
        chequeRec = 0.00;
    }
    if (document.getElementById('transPanelName').value == 'PurchasePayment' ||
        document.getElementById("transPanelName").value == 'PurchasePayUp') {
        var supPurchaseCashAmt = parseFloat(document.getElementById('payCashAmtLimitForPurchase').value);
        var supPurchaseValid = document.getElementById('payPurchaseForValidation').value;
        if (parseFloat(supPurchaseCashAmt) != "" && parseFloat(supPurchaseCashAmt) > 0 && (parseFloat(cashRec) > parseFloat(supPurchaseCashAmt))){
            alert("Cash in Hand amount should not more than Rs. " + supPurchaseCashAmt + " . Limit is only " + supPurchaseCashAmt);
            document.getElementById(prefix + 'PayCashAmtRec').value = 0.00;
            document.getElementById(prefix + 'PayCashAmtRec').focus();
            return false;
        } else {
            if (parseFloat(cashRec) > 0) {
                document.getElementById(prefix + 'PayCashAmtRec').value = parseFloat(cashRec).toFixed(2);
            }
            //
            if (parseFloat(chequeRec) > 0) {
                document.getElementById(prefix + 'PayChequeAmt').value = parseFloat(chequeRec).toFixed(2);
            }
            //
            totalAmount = (parseFloat(cashRec) + parseFloat(chequeRec)).toFixed(2);
            return totalAmount;
        }
    } else if (document.getElementById("transPanelName").value == 'SellPayment' ||  document.getElementById("transPanelName").value == 'SellPayUp')    //<!-- START CODE ADD CONDITION TO SET CASH LIMIT ON SELL @SIMRAN:18AUG2023-->
     {
        
        var sellCashAmt = parseFloat(document.getElementById('payCashAmtLimitForSell').value);
        //
        if(parseFloat(sellCashAmt) != "" && parseFloat(sellCashAmt) > 0 && (parseFloat(cashRec) > parseFloat(sellCashAmt)))
        {
                alert("Cash in Hand amount should not more than Rs. "+ sellCashAmt + " . Limit is only "+sellCashAmt);
                document.getElementById(prefix + 'PayCashAmtRec').value = 0.00;
                document.getElementById(prefix + 'PayCashAmtRec').focus();
                return false;
            }
        else 
        {
            if (parseFloat(cashRec) > 0  ) {
                document.getElementById(prefix + 'PayCashAmtRec').value = parseFloat(cashRec).toFixed(2);
            }
            //
            if (parseFloat(chequeRec) > 0) {
                document.getElementById(prefix + 'PayChequeAmt').value = parseFloat(chequeRec).toFixed(2);
            }
//
            totalAmount = (parseFloat(cashRec) + parseFloat(chequeRec)).toFixed(2);
            return totalAmount;
        }            
    }else {
        if (parseFloat(cashRec) > 0) {
            document.getElementById(prefix + 'PayCashAmtRec').value = parseFloat(cashRec).toFixed(2);
        }
        if (parseFloat(chequeRec) > 0) {
            document.getElementById(prefix + 'PayChequeAmt').value = parseFloat(chequeRec).toFixed(2);
        }
        //
        totalAmount = (parseFloat(cashRec) + parseFloat(chequeRec)).toFixed(2);
        return totalAmount;
    }    
}
// START CODE TO MODIFY FUNCTION FOR CALCULATE DISCOUNT IN % ACCORDING TO DISCOUNT AMT @PRIYANKA-05MAR18
function discountAmt(prefix) {
    var discountAmount = 0;
    if ((document.getElementById('utin_discount_per').value != '' || document.getElementById(prefix + 'PayDiscount').value > 0) && (document.getElementById(prefix + 'PayDiscount').value == '' || document.getElementById(prefix + 'PayDiscount').value == 0)) {
        // START CODE TO CALCULATE DISCOUNT AMOUNT ACCORDING TO DISCOUNT IN % @PRIYANKA-05MAR18
        // CALCULATE DISCOUNT AMT @PRIYANKA-05MAR18
        //if (document.getElementById(prefix + 'PayFinAmtBalDisp').value > 0) {
        var discRec = (parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value) * parseFloat(document.getElementById('utin_discount_per').value) / 100).toFixed(2);
        if (discRec > 0) {
            document.getElementById(prefix + 'PayDiscount').value = Math_round(parseFloat(discRec)).toFixed(2);
        }
        //}
        // END CODE TO CALCULATE DISCOUNT AMOUNT ACCORDING TO DISCOUNT IN % @PRIYANKA-05MAR18
    } else {
        var discRec = document.getElementById(prefix + 'PayDiscount').value;
        document.getElementById(prefix + 'PayDiscount').value = parseFloat(discRec).toFixed(2);
        // START CODE TO CALCULATE DISCOUNT IN % ACCORDING TO DISCOUNT AMT @PRIYANKA-05MAR18
        // CALCULATE DISCOUNT IN % @PRIYANKA-05MAR18
        //if (document.getElementById(prefix + 'PayFinAmtBalDisp').value > 0) {
        var utin_discount_per = ((parseFloat(discRec) * 100) / parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value)).toFixed(2);
        document.getElementById('utin_discount_per').value = (parseFloat(utin_discount_per)).toFixed(2);
        //} 
        // END CODE TO CALCULATE DISCOUNT IN % ACCORDING TO DISCOUNT AMT @PRIYANKA-05MAR18
    }
    // DISCOUNT IN AMT @PRIYANKA-05MAR18
    if (discRec == '' || discRec == 'NaN') {
        discRec = 0;
    }
    // DISCOUNT IN % @PRIYANKA-05MAR18
    if (document.getElementById('utin_discount_per').value == 'NaN') {
        document.getElementById('utin_discount_per').value = 0;
    }
    // DISCOUNT IN AMT @PRIYANKA-05MAR18
    if (document.getElementById(prefix + 'PayDiscount').value == 'NaN') {
        document.getElementById(prefix + 'PayDiscount').value = 0;
    }
    // START CODE TO DISPLAY DISCOUNT AMOUNT ON PAYMENT PANEL @PRIYANKA-05MAR18
    document.getElementById(prefix + 'PayDiscountDisp').value = Math_round(parseFloat(discRec)).toFixed(2);
    discountAmount = Math_round(parseFloat(discRec)).toFixed(2);
    return discountAmount;
}
// END CODE TO MODIFY FUNCTION FOR CALCULATE DISCOUNT IN % ACCORDING TO DISCOUNT AMT @PRIYANKA-05MAR18
function calcCardAmt(prefix) {
    var totCardAmt = '';
    if (document.getElementById('transChargesIncludeExclude').value == 'exclude') {
        if (document.getElementById('totalCardAmt').value >= 0) {
            var totCardAmt = 0.00;
            var cardAmount = document.getElementById(prefix + 'PayCardAmt').value = parseFloat(document.getElementById('totalCardAmt').value).toFixed(2);
            var transChrg = document.getElementById(prefix + 'PayTransChrgAmt').value;
            if (cardAmount == null || cardAmount == '' || isNaN(cardAmount)) {
                cardAmount = 0.00;
            }
            if (transChrg == null || transChrg == '' || isNaN(transChrg)) {
                transChrg = 0.00;
            }

            totCardAmt = (parseFloat(cardAmount) + parseFloat(transChrg)).toFixed(2);
            document.getElementById(prefix + 'PayCardFinalAmt').value = totCardAmt;
            document.getElementById(prefix + 'PayCardAmt').value = parseFloat(cardAmount).toFixed(2);
        } else {
            document.getElementById(prefix + 'PayCardFinalAmt').value = totCardAmt;
        }
    } else {
        if (document.getElementById('totalCardAmt').value >= 0) {
            var cardAmount = 0.00;
            var totCardAmt = document.getElementById('totalCardAmt').value;
            var transChrg = document.getElementById(prefix + 'PayTransChrgAmt').value;
            if (totCardAmt == null || totCardAmt == '' || isNaN(totCardAmt)) {
                totCardAmt = 0.00;
            }
            if (transChrg == null || transChrg == '' || isNaN(transChrg)) {
                transChrg = 0.00;
            }
            cardAmount = (parseFloat(totCardAmt) - parseFloat(transChrg)).toFixed(2);
            if (document.getElementById('paymentDefaultOption').value == 'card') {
                totCardAmt = document.getElementById(prefix + 'PayFinAmtBalDisp').value;
            } else {
                totCardAmt = document.getElementById(prefix + 'PayCardFinalAmt').value = parseFloat(totCardAmt).toFixed(2);
            }
            document.getElementById(prefix + 'PayCardAmt').value = cardAmount;
        } else {
            document.getElementById(prefix + 'PayCardFinalAmt').value = totCardAmt;
        }
    }
    //
    if (document.getElementById(prefix + 'PayCardFinalAmt').value == 0) {
        document.getElementById(prefix + 'PayCardFinalAmt').value = '';
    }
    //
    return totCardAmt;
}

function calcOnlinePayAmt(prefix) {
    var totOnlinePayAmt = '';
    if (document.getElementById('commPaidIncludeExclude').value == 'exclude') {
        if (document.getElementById('totalOnlineAmt').value >= 0) {
            var totOnlinePayAmt = 0.00;
            var onlinePayAmount = document.getElementById(prefix + 'PayOnlinePaymentAmt').value = document.getElementById('totalOnlineAmt').value;
            var commPaid = document.getElementById(prefix + 'PayCommPayAmt').value;
            if (onlinePayAmount == null || onlinePayAmount == '' || isNaN(onlinePayAmount)) {
                onlinePayAmount = 0.00;
            }
            if (commPaid == null || commPaid == '' || isNaN(commPaid)) {
                commPaid = 0.00;
            }
            totOnlinePayAmt = (parseFloat(onlinePayAmount) + parseFloat(Math.abs(commPaid))).toFixed(2);
            document.getElementById(prefix + 'PayOnlinePaymentFinalAmt').value = totOnlinePayAmt;
//            alert('document.getElementById(prefix + PayOnlinePaymentFinalAmt).value =11= ' + document.getElementById(prefix + 'PayOnlinePaymentFinalAmt').value);
            document.getElementById(prefix + 'PayOnlinePaymentAmt').value = parseFloat(onlinePayAmount).toFixed(2);
        } else {
            document.getElementById(prefix + 'PayOnlinePaymentFinalAmt').value = onlinePayAmount;
//            alert('document.getElementById(prefix + PayOnlinePaymentFinalAmt).value =22= ' + document.getElementById(prefix + 'PayOnlinePaymentFinalAmt').value);
        }
    } else {
        if (document.getElementById('totalOnlineAmt').value >= 0) {
            var onlinePayAmount = 0.00;

//            alert('online==' + document.getElementById('paymentDefaultOption').value);
            if (document.getElementById('paymentDefaultOption').value == 'online') {
                var totOnlinePayAmt = document.getElementById(prefix + 'PayFinAmtBalDisp').value;
            } else {
                var totOnlinePayAmt = document.getElementById('totalOnlineAmt').value;
            }

            var commPaid = document.getElementById(prefix + 'PayCommPayAmt').value;
            if (totOnlinePayAmt == null || totOnlinePayAmt == '') {
                totOnlinePayAmt = 0.00;
            }
            if (commPaid == null || commPaid == '') {
                commPaid = 0.00;
            }

            onlinePayAmount = (parseFloat(totOnlinePayAmt) - parseFloat(Math.abs(commPaid))).toFixed(2);
            totOnlinePayAmt = document.getElementById(prefix + 'PayOnlinePaymentFinalAmt').value = parseFloat(totOnlinePayAmt).toFixed(2);
            document.getElementById(prefix + 'PayOnlinePaymentAmt').value = onlinePayAmount;

//             alert('document.getElementById(prefix + PayOnlinePaymentFinalAmt).value =34= ' + document.getElementById(prefix + 'PayOnlinePaymentFinalAmt').value);
        } else {
            document.getElementById(prefix + 'PayOnlinePaymentFinalAmt').value = totOnlinePayAmt;
//            alert('document.getElementById(prefix + PayOnlinePaymentFinalAmt).value =33= ' + document.getElementById(prefix + 'PayOnlinePaymentFinalAmt').value);
        }
    }
    //
    if (document.getElementById(prefix + 'PayOnlinePaymentFinalAmt').value == 0) {
        document.getElementById(prefix + 'PayOnlinePaymentFinalAmt').value = '';
    }
    //
    return totOnlinePayAmt;
}
// PREV INV GD WT BAL CHECK/UNCHECK CAL FUNCTION @PRIYANKA-15MAR18
function calcGoldWeight(checked, invCount) {
    //
    var weightToPay = 0;
    var convertedWeight = 0;
    var transactionWeight = 0;
    var convertedTransactionWeight = 0;
    var prefix = document.getElementById('prefix').value;
    var weight = parseFloat(document.getElementById('goldWeight' + invCount).value);

    //alert('weight == ' + weight);

    var weightTyp = document.getElementById('goldWeightType' + invCount).value;

    //alert('weightTyp == ' + weightTyp);

    //
    if (document.getElementById(prefix + 'GoldWtPrevBal').value == 'NaN' || document.getElementById(prefix + 'GoldWtPrevBal').value == '') {
        document.getElementById(prefix + 'GoldWtPrevBal').value = 0;
    }
    //
    if (document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value == 'NaN' || document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value == '') {
        document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value = 0;
    }
    //
    if (document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value == 'NaN' || document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value == '') {
        document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value = 0;
    }
    //
    var prevWeight = parseFloat(document.getElementById(prefix + 'GoldWtPrevBal').value);
    var prevWeightTyp = document.getElementById(prefix + 'GoldWtPrevBalType').value;
    var transactionWeightTyp = document.getElementById(prefix + 'GoldTotFFineWtType').value;
    //
    convertedWeight = convertWeight(weight, prevWeightTyp, weightTyp);
    //
    if (checked) {
        if (document.getElementById('gdWtTransType' + invCount).value == 'DR') {
            document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value = parseFloat(document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value) + parseFloat(convertedWeight);
        } else if (document.getElementById('gdWtTransType' + invCount).value == 'CR') {
            document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value = parseFloat(document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value) + parseFloat(convertedWeight);
        }
    } else {
        if (document.getElementById('gdWtTransType' + invCount).value == 'DR') {
            document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value = parseFloat(document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value) - parseFloat(convertedWeight);
        } else if (document.getElementById('gdWtTransType' + invCount).value == 'CR') {
            document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value = parseFloat(document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value) - parseFloat(convertedWeight);
        }
    }
    //
    weightToPay = parseFloat(document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value) - parseFloat(document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value);
    //
    //alert('weightToPay == ' + weightToPay);
    //
    if (weightToPay < 0) {
        document.getElementById(prefix + 'GoldWtPrevBalCRDR').value = 'CR';
    } else {
        document.getElementById(prefix + 'GoldWtPrevBalCRDR').value = 'DR';
    }
    //
    // START OF CODE TO SET COLOR FOR GOLD PREV WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
    if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR') {
        document.getElementById('metal1WtPrevBal').style.color = 'red';
        document.getElementById(prefix + 'GoldWtPrevBalCRDR').style.color = 'red';
    } else if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR') {
        document.getElementById('metal1WtPrevBal').style.color = 'green';
        document.getElementById(prefix + 'GoldWtPrevBalCRDR').style.color = 'green';
    }
    // END OF CODE TO SET COLOR FOR GOLD PREV WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
    //
    document.getElementById(prefix + 'GoldWtPrevBal').value = parseFloat(Math.abs(weightToPay)).toFixed(3);
    //
    document.getElementById('metal1WtPrevBal').value = parseFloat(Math.abs(weightToPay)).toFixed(3) + ' ' + prevWeightTyp;
    // START @PRIYANKA-05APR18
    // document.getElementById('metal1WtPrevBal').value = (parseFloat(document.getElementById('metal1WtPrevBal').value) + parseFloat(document.getElementById('utin_cash_to_metalwt').value)).toFixed(3);
    // END @PRIYANKA-05APR18
    if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
        // START CODE TO ADD CONDITION FOR PAYMENT/RECEIPT PANEL (RATE CUT/NO RATE CUT CASE) PREV GD BAL CHECK & UNCHECK @PRIYANKA-15MAR18
        if (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
                document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' ||
                document.getElementById('payPanelName').value == 'SlPrPayment' ||
                document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                document.getElementById('payPanelName').value == 'ApprovalPayment' ||
                document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                document.getElementById('payPanelName').value == 'StockReturnPanel' ||
                document.getElementById('payPanelName').value == 'ItemReturnPanel' ||
                document.getElementById('payPanelName').value == 'RawPayment' ||
                document.getElementById('payPanelName').value == 'InvoicePayment' ||
                document.getElementById('payPanelName').value == 'NwOrPayment' ||
                document.getElementById("payPanelName").value == 'NewOrderPayment' ||
                document.getElementById("payPanelName").value == 'CrySellPayment') {
            //
            if (document.getElementById('paymentMode').value == 'RateCut') {
                //
                document.getElementById(prefix + 'GoldRtCtWtBal').value = calcWeightBalance(prefix, document.getElementById(prefix + 'GoldWtPrevBalCRDR').value, document.getElementById(prefix + 'GoldWtPrevBal').value, document.getElementById(prefix + 'GoldTotFineWt').value, document.getElementById(prefix + 'GoldWtRecBal').value, document.getElementById(prefix + 'RtCtGdCRDR'));
                //
            }
            //
        }
        // END CODE TO ADD CONDITION FOR PAYMENT/RECEIPT PANEL (RATE CUT/NO RATE CUT CASE) PREV GD BAL CHECK & UNCHECK @PRIYANKA-15MAR18
        document.getElementById(prefix + 'PayGoldWtBal').value = calcWeightBalance(prefix, document.getElementById(prefix + 'GoldWtPrevBalCRDR').value, document.getElementById(prefix + 'GoldWtPrevBal').value, document.getElementById(prefix + 'GoldTotFineWt').value, document.getElementById(prefix + 'GoldWtRecBal').value, document.getElementById(prefix + 'RtCtGdCRDR'));
        calcWholeSaleRateCut(prefix);
    }
}
// PREV INV SL WT BAL CHECK/UNCHECK CAL FUNCTION @PRIYANKA-15MAR18
function calcSilverWeight(checked, invCount) {
    //
    var weightToPay = 0;
    var convertedWeight = 0;
    var transactionWeight = 0;
    var convertedTransactionWeight = 0;
    var prefix = document.getElementById('prefix').value;
    var weight = parseFloat(document.getElementById('silverWeight' + invCount).value);
    var weightTyp = document.getElementById('silverWeightType' + invCount).value;
    //
    if (document.getElementById(prefix + 'SilverWtPrevBal').value == 'NaN' || document.getElementById(prefix + 'SilverWtPrevBal').value == '') {
        document.getElementById(prefix + 'SilverWtPrevBal').value = 0;
    }
    //
    if (document.getElementById(prefix + 'SilverWtPrevBalDRAmt').value == 'NaN' || document.getElementById(prefix + 'SilverWtPrevBalDRAmt').value == '') {
        document.getElementById(prefix + 'SilverWtPrevBalDRAmt').value = 0;
    }
    //
    if (document.getElementById(prefix + 'SilverWtPrevBalCRAmt').value == 'NaN' || document.getElementById(prefix + 'SilverWtPrevBalCRAmt').value == '') {
        document.getElementById(prefix + 'SilverWtPrevBalCRAmt').value = 0;
    }
    //
    var prevWeight = parseFloat(document.getElementById(prefix + 'SilverWtPrevBal').value);
    var prevWeightTyp = document.getElementById(prefix + 'SilverWtPrevBalType').value;
    var transactionWeightTyp = document.getElementById(prefix + 'SilverTotFFineWtType').value;
    //
    convertedWeight = convertWeight(weight, prevWeightTyp, weightTyp);
    //
    if (checked) {
        if (document.getElementById('slWtTransType' + invCount).value == 'DR') {
            document.getElementById(prefix + 'SilverWtPrevBalDRAmt').value = parseFloat(document.getElementById(prefix + 'SilverWtPrevBalDRAmt').value) + parseFloat(convertedWeight);
        } else if (document.getElementById('slWtTransType' + invCount).value == 'CR') {
            document.getElementById(prefix + 'SilverWtPrevBalCRAmt').value = parseFloat(document.getElementById(prefix + 'SilverWtPrevBalCRAmt').value) + parseFloat(convertedWeight);
        }
    } else {
        if (document.getElementById('slWtTransType' + invCount).value == 'DR') {
            document.getElementById(prefix + 'SilverWtPrevBalDRAmt').value = parseFloat(document.getElementById(prefix + 'SilverWtPrevBalDRAmt').value) - parseFloat(convertedWeight);
        } else if (document.getElementById('slWtTransType' + invCount).value == 'CR') {
            document.getElementById(prefix + 'SilverWtPrevBalCRAmt').value = parseFloat(document.getElementById(prefix + 'SilverWtPrevBalCRAmt').value) - parseFloat(convertedWeight);
        }
    }
    //
    weightToPay = parseFloat(document.getElementById(prefix + 'SilverWtPrevBalDRAmt').value) - parseFloat(document.getElementById(prefix + 'SilverWtPrevBalCRAmt').value);
    //
    if (weightToPay < 0) {
        document.getElementById(prefix + 'SilverWtPrevBalCRDR').value = 'CR';
    } else {
        document.getElementById(prefix + 'SilverWtPrevBalCRDR').value = 'DR';
    }

    // START OF CODE TO SET COLOR FOR SILVER PREV WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
    if (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'DR') {
        document.getElementById('metal2WtPrevBal').style.color = 'red';
        document.getElementById(prefix + 'SilverWtPrevBalCRDR').style.color = 'red';
    } else if (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value == 'CR') {
        document.getElementById('metal2WtPrevBal').style.color = 'green';
        document.getElementById(prefix + 'SilverWtPrevBalCRDR').style.color = 'green';
    }
    // END OF CODE TO SET COLOR FOR SILVER PREV WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18

    document.getElementById(prefix + 'SilverWtPrevBal').value = parseFloat(Math.abs(weightToPay)).toFixed(3);
    //
    document.getElementById('metal2WtPrevBal').value = parseFloat(Math.abs(weightToPay)).toFixed(3) + ' ' + prevWeightTyp;
    //
    if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
        // START CODE TO ADD CONDITION FOR PAYMENT/RECEIPT PANEL (RATE CUT/NO RATE CUT CASE) PREV INV SL BAL CHECK & UNCHECK @PRIYANKA-15MAR18
        if (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
                document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' ||
                document.getElementById('payPanelName').value == 'SlPrPayment' ||
                document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                document.getElementById('payPanelName').value == 'ApprovalPayment' ||
                document.getElementById('payPanelName').value == 'StockReturnPanel' ||
                document.getElementById('payPanelName').value == 'ItemReturnPanel' ||
                document.getElementById('payPanelName').value == 'RawPayment' ||
                document.getElementById('payPanelName').value == 'InvoicePayment' ||
                document.getElementById("payPanelName").value == 'NewOrderPayment' ||
                document.getElementById("payPanelName").value == 'CrySellPayment') {
            //
            if (document.getElementById('paymentMode').value == 'RateCut') {
                document.getElementById(prefix + 'SilverRtCtWtBal').value = calcWeightBalance(prefix, document.getElementById(prefix + 'SilverWtPrevBalCRDR').value, document.getElementById(prefix + 'SilverWtPrevBal').value, document.getElementById(prefix + 'SilverTotFineWt').value, document.getElementById(prefix + 'SilverWtRecBal').value, document.getElementById(prefix + 'RtCtSlCRDR'));
            }
            //
        }
        // END CODE TO ADD CONDITION FOR PAYMENT/RECEIPT PANEL (RATE CUT/NO RATE CUT CASE) PREV INV SL BAL CHECK & UNCHECK @PRIYANKA-15MAR18
        document.getElementById(prefix + 'PaySilverWtBal').value = calcWeightBalance(prefix, document.getElementById(prefix + 'SilverWtPrevBalCRDR').value, document.getElementById(prefix + 'SilverWtPrevBal').value, document.getElementById(prefix + 'SilverTotFineWt').value, document.getElementById(prefix + 'SilverWtRecBal').value, document.getElementById(prefix + 'RtCtSlCRDR'));
        calcWholeSaleRateCut(prefix);
    }
}
// PREV INV CASH AMOUNT CHECK/UNCHECK CAL FUNCTION @PRIYANKA-15MAR18
// PREV INV ST WT BAL CHECK/UNCHECK CAL FUNCTION @DARSHANA 13 JULY 2021
function calcCrystalWeight(checked, invCount) {
    //
    var weightToPay = 0;
    var convertedWeight = 0;
    var transactionWeight = 0;
    var convertedTransactionWeight = 0;
    var prefix = document.getElementById('prefix').value;
    var weight = parseFloat(document.getElementById('crystalWeight' + invCount).value);
    var weightTyp = document.getElementById('crystalWeightType' + invCount).value;
    //
//    alert()
    if (document.getElementById(prefix + 'CrystalWtPrevBal').value == 'NaN' || document.getElementById(prefix + 'CrystalWtPrevBal').value == '') {
        document.getElementById(prefix + 'CrystalWtPrevBal').value = 0;
    }
    //
    if (document.getElementById(prefix + 'CrystalWtPrevBalDRAmt').value == 'NaN' || document.getElementById(prefix + 'CrystalWtPrevBalDRAmt').value == '') {
        document.getElementById(prefix + 'CrystalWtPrevBalDRAmt').value = 0;
    }
    //
    if (document.getElementById(prefix + 'CrystalWtPrevBalCRAmt').value == 'NaN' || document.getElementById(prefix + 'CrystalWtPrevBalCRAmt').value == '') {
        document.getElementById(prefix + 'CrystalWtPrevBalCRAmt').value = 0;
    }
    //
    var prevWeight = parseFloat(document.getElementById(prefix + 'CrystalWtPrevBal').value);
    var prevWeightTyp = document.getElementById(prefix + 'CrystalWtPrevBalType').value;
    var transactionWeightTyp = document.getElementById(prefix + 'CrystalTotFFineWtType').value;
    //
//    alert('prefix='+prefix);
//    alert('prevTy=' + document.getElementById(prefix + 'CrystalWtPrevBalType').value);
//    alert('prevWeightTyp=' + prevWeightTyp);
//alert('weight=' +weight);
    convertedWeight = convertWeight(weight, prevWeightTyp, weightTyp);

    //
    if (checked) {
//       alert('checked=='+ document.getElementById(prefix + 'CrystalWtPrevBalDRAmt').value);
        if (document.getElementById('stWtTransType' + invCount).value == 'DR') {
            document.getElementById(prefix + 'CrystalWtPrevBalDRAmt').value = parseFloat(document.getElementById(prefix + 'CrystalWtPrevBalDRAmt').value) + parseFloat(convertedWeight);
        } else if (document.getElementById('stWtTransType' + invCount).value == 'CR') {
            document.getElementById(prefix + 'CrystalWtPrevBalCRAmt').value = parseFloat(document.getElementById(prefix + 'CrystalWtPrevBalCRAmt').value) + parseFloat(convertedWeight);
        }
    } else {
//        alert('unchecked'+checked);
        if (document.getElementById('stWtTransType' + invCount).value == 'DR') {
            document.getElementById(prefix + 'CrystalWtPrevBalDRAmt').value = parseFloat(document.getElementById(prefix + 'CrystalWtPrevBalDRAmt').value) - parseFloat(convertedWeight);
        } else if (document.getElementById('stWtTransType' + invCount).value == 'CR') {
            document.getElementById(prefix + 'CrystalWtPrevBalCRAmt').value = parseFloat(document.getElementById(prefix + 'CrystalWtPrevBalCRAmt').value) - parseFloat(convertedWeight);
        }
    }
    //
    weightToPay = parseFloat(document.getElementById(prefix + 'CrystalWtPrevBalDRAmt').value) - parseFloat(document.getElementById(prefix + 'CrystalWtPrevBalCRAmt').value);
    //
//    alert('weightToPay=' +weightToPay);
    if (weightToPay < 0) {
        document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value = 'CR';
    } else {
        document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value = 'DR';
    }

    // START OF CODE TO SET COLOR FOR CRYSTAL PREV WT BAL ACCORDING TO CR/DR TYPE @DARSHANA 13 JULY 21
    if (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'DR') {
        document.getElementById('metal3WtPrevBal').style.color = 'red';
        document.getElementById(prefix + 'CrystalWtPrevBalCRDR').style.color = 'red';
    } else if (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value == 'CR') {
        document.getElementById('metal3WtPrevBal').style.color = 'green';
        document.getElementById(prefix + 'CrystalWtPrevBalCRDR').style.color = 'green';
    }
    // END OF CODE TO SET COLOR FOR CRYSTAL PREV WT BAL ACCORDING TO CR/DR TYPE @DARSHANA 13 JULY 21

    document.getElementById(prefix + 'CrystalWtPrevBal').value = parseFloat(Math.abs(weightToPay)).toFixed(3);
    //
    document.getElementById('metal3WtPrevBal').value = parseFloat(Math.abs(weightToPay)).toFixed(3) + ' ' + prevWeightTyp;
    //
    if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
        // START CODE TO ADD CONDITION FOR PAYMENT/RECEIPT PANEL (RATE CUT/NO RATE CUT CASE) PREV INV SL BAL CHECK & UNCHECK @PRIYANKA-15MAR18
        if (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
                document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' ||
                document.getElementById('payPanelName').value == 'SlPrPayment' ||
                document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                document.getElementById('payPanelName').value == 'ApprovalPayment' ||
                document.getElementById('payPanelName').value == 'StockReturnPanel' ||
                document.getElementById('payPanelName').value == 'ItemReturnPanel' ||
                document.getElementById('payPanelName').value == 'RawPayment' ||
                document.getElementById('payPanelName').value == 'InvoicePayment' ||
                document.getElementById("payPanelName").value == 'NewOrderPayment' ||
                document.getElementById("payPanelName").value == 'CrySellPayment') {
            //
            if (document.getElementById('paymentMode').value == 'RateCut') {
                document.getElementById(prefix + 'CrystalRtCtWtBal').value = calcWeightBalance(prefix, document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value, document.getElementById(prefix + 'CrystalWtPrevBal').value, document.getElementById(prefix + 'CrystalTotFineWt').value, document.getElementById(prefix + 'CrystalWtRecBal').value, document.getElementById(prefix + 'RtCtStCRDR'));
            }
            //
        }
        // END CODE TO ADD CONDITION FOR PAYMENT/RECEIPT PANEL (RATE CUT/NO RATE CUT CASE) PREV INV ST BAL CHECK & UNCHECK @DARSHANA 13 JULY 2021
        document.getElementById(prefix + 'PayCrystalWtBal').value = calcWeightBalance(prefix, document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value, document.getElementById(prefix + 'CrystalWtPrevBal').value, document.getElementById(prefix + 'CrystalTotFineWt').value, document.getElementById(prefix + 'CrystalWtRecBal').value, document.getElementById(prefix + 'RtCtStCRDR'));
//        alert('Hi1');
        calcWholeSaleRateCut(prefix);
    }
}
//END PREV INV ST WT BAL CHECK/UNCHECK CAL FUNCTION @DARSHANA 13 JULY 2021
function calcCashAmount(checked, invCount) {
    var amountToPay = 0;
    var prefix = document.getElementById('prefix').value;
    var amount = parseFloat(document.getElementById('cashAmount' + invCount).value);
    
    if (document.getElementById(prefix + 'PayPrevTotAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevTotAmt').value == '') {
        document.getElementById(prefix + 'PayPrevTotAmt').value = 0;
    }

    if (document.getElementById(prefix + 'PayPrevCashBalDRAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevCashBalDRAmt').value == '') {
        document.getElementById(prefix + 'PayPrevCashBalDRAmt').value = 0;
    }

    if (document.getElementById(prefix + 'PayPrevCashBalCRAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevCashBalCRAmt').value == '') {
        document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = 0;
    }

    if (typeof (document.getElementById('schemeAmtSettledIndicator')) != 'undefined' &&
            (document.getElementById('schemeAmtSettledIndicator') != null)) {
        if (document.getElementById('schemeAmtSettledIndicator').value == 'YES') {
            if (typeof (document.getElementById('utin_scheme_dr_acc_id')) != 'undefined' &&
                    (document.getElementById('utin_scheme_dr_acc_id') != null)) {
                document.getElementById('utin_dr_acc_id').value = document.getElementById('utin_scheme_dr_acc_id').value;
            }
        }
    }

    var prevAmount = parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value);

    // START OF CODE TO SET COLOR FOR PREV WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
    if (document.getElementById('cashTransType' + invCount).value == 'DR') {
        document.getElementById('cashAmount' + invCount).style.color = 'red';
        document.getElementById('cashTransType' + invCount).style.color = 'red';
    } else if (document.getElementById('cashTransType' + invCount).value == 'CR') {
        document.getElementById('cashAmount' + invCount).style.color = 'green';
        document.getElementById('cashTransType' + invCount).style.color = 'green';
    }
    // END OF CODE TO SET COLOR FOR PREV WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18

    if (checked) {
        if (document.getElementById('cashTransType' + invCount).value == 'DR') {
            //alert('CDR');
            document.getElementById(prefix + 'PayPrevCashBalDRAmt').value = parseFloat(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value) + parseFloat(amount);
        } else if (document.getElementById('cashTransType' + invCount).value == 'CR') {
            //alert('CCR');
            document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = parseFloat(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value) + parseFloat(amount);
        }
    } else {
        if (document.getElementById('cashTransType' + invCount).value == 'DR') {
            //alert('DR');
            document.getElementById(prefix + 'PayPrevCashBalDRAmt').value = parseFloat(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value) - parseFloat(amount);
        } else if (document.getElementById('cashTransType' + invCount).value == 'CR') {
            //alert('CR');
            document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = parseFloat(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value) - parseFloat(amount);
            //alert(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value);
        }
    }

        amountToPay = parseFloat(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value) - parseFloat(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value);
    //alert('amountToPay == ' + amountToPay);  
    //   
    // alert('PayPrevCashBalCRDR **== ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);  
    //   
    // START CODE TO SET CR/DR ACCORDING TO CR/DR AMOUNT @PRIYANKA-15MAR18
    if (amountToPay > 0) {
        // 
        // START OF CODE TO SET COLOR FOR PREV CASH BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        document.getElementById(prefix + 'PayPrevCashBalCRDR').value = 'DR';
        document.getElementById('PrevTotOpeningAmtCRDR').value = 'DR';
        document.getElementById(prefix + 'PayPrevAmtDisp').style.color = 'red';
        document.getElementById(prefix + 'PayPrevCashBalCRDR').style.color = 'red';
        document.getElementById('prevAmountTdId').style.color = 'red';

        // END OF CODE TO SET COLOR FOR PREV CASH BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        //
        // START @PRIYANKA-05APR18
        // START @PRIYANKA-02APR18
//        if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
//            document.getElementById('utin_prev_cash_opening_CRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
//            document.getElementById('utin_prev_cash_opening_CRDR').style.color = 'green';
//            document.getElementById('utin_prev_cash_opening').style.color = 'green';
//        }
        // END @PRIYANKA-02APR18
        // END @PRIYANKA-05APR18
        //
    } else {
        //
        // START OF CODE TO SET COLOR FOR PREV CASH BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        document.getElementById(prefix + 'PayPrevCashBalCRDR').value = 'CR';
        document.getElementById('PrevTotOpeningAmtCRDR').value = 'CR';
        document.getElementById(prefix + 'PayPrevAmtDisp').style.color = 'green';
        document.getElementById(prefix + 'PayPrevCashBalCRDR').style.color = 'green';
        document.getElementById('prevAmountTdId').style.color = 'green';

        // START @PRIYANKA-05APR18
        // END OF CODE TO SET COLOR FOR PREV CASH BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        // START @PRIYANKA-02APR18
//        if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
//            document.getElementById('utin_prev_cash_opening_CRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
//            document.getElementById('utin_prev_cash_opening_CRDR').style.color = 'red';
//            document.getElementById('utin_prev_cash_opening').style.color = 'red';
//        }
        // END @PRIYANKA-02APR18
        // END @PRIYANKA-05APR18
    }
    // END CODE TO SET CR/DR ACCORDING TO CR/DR AMOUNT @PRIYANKA-15MAR18
    // alert('PayPrevCashBalCRDR == ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value); 
    // START @PRIYANKA-05APR18
    document.getElementById('PrevTotOpeningAmt').value = parseFloat(Math.abs(amountToPay)).toFixed(2);

    if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
        document.getElementById("utin_cash_to_metal").value = parseFloat(Math.abs(amountToPay)).toFixed(2);
    }

    // END @PRIYANKA-05APR18

    // START @PRIYANKA-05APR18
    if (document.getElementById('PrevTotOpeningAmt').value == '' || document.getElementById('PrevTotOpeningAmt').value == 'NaN') {
        document.getElementById('PrevTotOpeningAmt').value = '0.00';
    }
    // END @PRIYANKA-05APR18

    document.getElementById(prefix + 'PayPrevTotAmt').value = parseFloat(Math.abs(amountToPay)).toFixed(2);
    document.getElementById(prefix + 'PayPrevAmtDisp').value = parseFloat(Math.abs(amountToPay)).toFixed(2);

    // alert('paymentMode == ' + document.getElementById('paymentMode').value);
    // alert('PrevTotOpeningAmt == ' + document.getElementById('PrevTotOpeningAmt').value);  

    // START @PRIYANKA-02APR18
    if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
        // START @PRIYANKA-05APR18
        document.getElementById('utin_prev_cash_opening').value = parseFloat(Math.abs(document.getElementById('PrevTotOpeningAmt').value)).toFixed(2);
        // START @PRIYANKA-10APR18
        document.getElementById('utin_prev_cash_opening_CRDR').value = document.getElementById('PrevTotOpeningAmtCRDR').value;
        // END @PRIYANKA-10APR18
        // END @PRIYANKA-05APR18

        // alert('utin_prev_cash_opening == ' + document.getElementById('utin_prev_cash_opening').value);

        // START OF CODE TO SET COLOR FOR PREV CASH BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
        // START @PRIYANKA-07APR18
        // if (document.getElementById('paymentMode').value == 'NoRateCut') {
        if (document.getElementById("utin_prev_cash_opening_CRDR").value == 'DR') {
            document.getElementById('utin_prev_cash_opening_CRDR').style.color = 'red';
            document.getElementById('utin_prev_cash_opening').style.color = 'red';
        } else if (document.getElementById("utin_prev_cash_opening_CRDR").value == 'CR') {
            document.getElementById('utin_prev_cash_opening_CRDR').style.color = 'green';
            document.getElementById('utin_prev_cash_opening').style.color = 'green';
        }
        // }
        // END @PRIYANKA-07APR18

        if (document.getElementById("utin_sl_prev_cash_opening_CRDR").value == 'DR') {
            document.getElementById('utin_sl_prev_cash_opening_CRDR').style.color = 'red';
            document.getElementById('utin_sl_prev_cash_opening').style.color = 'red';
        } else if (document.getElementById("utin_sl_prev_cash_opening_CRDR").value == 'CR') {
            document.getElementById('utin_sl_prev_cash_opening_CRDR').style.color = 'green';
            document.getElementById('utin_sl_prev_cash_opening').style.color = 'green';
        }
        // END OF CODE TO SET COLOR FOR PREV CASH BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18

    }
    // END @PRIYANKA-02APR18

    calcPaymentCashBalance(prefix);

}
// START CODE TO PASS CR/DR FOR PAYMENT/RECEIPT PANEL NAME @PRIYANKA-16MAR18
function searchPrevInvoiceDetails(firmId, userId, panelName, transPanelName, mainPanelName, PaymentReceiptPanel, transCRDR) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("paymentDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ompyamt.php?firmId=" + firmId + "&transCRDR=" + transCRDR + "&PaymentReceiptPanel=" + PaymentReceiptPanel + "&userId=" + userId + "&paymentPanelName=" + panelName + "&transPanelName=" + transPanelName + "&mainPanelName=" + mainPanelName, true);
    xmlhttp.send();
}
// END CODE TO PASS CR/DR FOR PAYMENT/RECEIPT PANEL NAME @PRIYANKA-16MAR18
function changeSlPrMetalRateByVal() {
    var goldWeight = 0;
    var silverWeight = 0;
    var metalWeight = document.getElementById('slPrItemFFineWeight').value;
    var payTotalWeightType1 = document.getElementById('slPrItemNTWT').value;
    if (document.getElementById('slPrItemMetal').value == 'Gold' || document.getElementById('slPrItemMetal').value == 'Alloy') {
        goldWeight = parseFloat(metalWeight);
        if (document.getElementById('addItemNTWNMetRate').value == '' || document.getElementById('addItemNTWNMetRate').value == 'NaN')
            document.getElementById('addItemNTWNMetRate').value = 0;
        if (document.getElementById('addItemNTWNMetRate').value != 0) {
            if (payTotalWeightType1 == 'KG') {
                document.getElementById('slPrItemMetalRate').value = parseFloat(parseFloat(document.getElementById('addItemNTWNMetRate').value) / (goldWeight * document.getElementById('gmWtInKg').value)).toFixed(2);
            } else if (payTotalWeightType1 == 'GM') {
                document.getElementById('slPrItemMetalRate').value = parseFloat(parseFloat(parseFloat(document.getElementById('addItemNTWNMetRate').value) / goldWeight) * document.getElementById('gmWtInGm').value).toFixed(2);
            } else if (payTotalWeightType1 == 'MG') {
                document.getElementById('slPrItemMetalRate').value = parseFloat(parseFloat(parseFloat(document.getElementById('addItemNTWNMetRate').value) / goldWeight) * document.getElementById('gmWtInMg').value).toFixed(2);
            }
        }
    }
    if (document.getElementById('slPrItemMetal').value == 'Silver') {
        silverWeight = parseFloat(metalWeight);
        if (payTotalWeightType1 == 'KG') {
            document.getElementById('slPrItemMetalRate').value = parseFloat(parseFloat(document.getElementById('addItemNTWNMetRate').value) / (silverWeight * document.getElementById('srGmWtInKg').value)).toFixed(2);
        } else if (payTotalWeightType1 == 'GM') {
            document.getElementById('slPrItemMetalRate').value = parseFloat((parseFloat(document.getElementById('addItemNTWNMetRate').value) / silverWeight) * (document.getElementById('srGmWtInGm').value)).toFixed(2);
        } else if (payTotalWeightType1 == 'MG') {
            document.getElementById('slPrItemMetalRate').value = parseFloat((parseFloat(document.getElementById('addItemNTWNMetRate').value) / silverWeight) * (document.getElementById('srGmWtInMg').value)).toFixed(2);
        }
    }

}

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// START OF CALCULATING MAKING CHARGES FUNCTION ACCORDING TO FINAL VALUATION : Author:PRIYANKA31OCT17
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

function calculateMKGPrice() {
    // VALUATION
    var sttrVal = parseFloat(document.getElementById('addItemNTWNMetRate').value);
    // FINAL VALUATION
    var finalVal = parseFloat(document.getElementById('slPrItemFinalVal').value);
    // TOTAL TAX AMOUNT (CGST,SGST,IGST)
    var totTaxAmt = parseFloat(document.getElementById('slPrItemTotTax').value);
    // GROSS WEIGHT
    var gsWt = parseFloat(document.getElementById('slPrItemGSW').value);
    // TOTAL VALUATION
    var totSttrVal = (parseFloat(sttrVal) + parseFloat(totTaxAmt));
    // CHECKING FINAL VALUATION & VALUATION

    if (finalVal > sttrVal) {
        // MAKING CHARGS
        var mkgChr = (parseFloat(finalVal) - parseFloat(totSttrVal));
        // CHECKING GSWT
        if (gsWt != '0' || gsWt != NULL || gsWt != '') {
            // MAKING CHARGS ACCORDING TO GSWT
            var mkgChrgs = (parseFloat(mkgChr) / parseFloat(gsWt)).toFixed(2);
            // VALUE ADDED
            var valAdded = document.getElementById('slPrItemValueAdded').value;
            // CHECKING MAKING CHARGS & VALUE ADDED

            if (mkgChrgs > valAdded) {

                var finalMkg = parseFloat(mkgChrgs) - parseFloat(valAdded);
                document.getElementById('slPrItemLabCharges').value = parseFloat(finalMkg).toFixed(2);

            }
        }
    }
}

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// END OF CALCULATING MAKING CHARGES FUNCTION ACCORDING TO FINAL VALUATION : Author:PRIYANKA31OCT17
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

function getTaxByVal(prefix) {
    var itemValIncludingTax = 0;
    var totalTaxPercent = 0;
    var otherTax = document.getElementById(prefix + 'Tax').value;
    var CGST = document.getElementById(prefix + 'CGST').value;
    var SGST = document.getElementById(prefix + 'SGST').value;
    var IGST = document.getElementById(prefix + 'IGST').value;

    //var makingTaxPercent = 0;
    //var makingTaxCGST = document.getElementById(prefix + 'MkgChrgCGST').value;
    //var makingTaxSGST = document.getElementById(prefix + 'MkgChrgSGST').value;

    if (CGST == '' || CGST == 'NaN') {
        CGST = 0;
    }
    if (SGST == '' || SGST == 'NaN') {
        SGST = 0;
    }
    if (IGST == '' || IGST == 'NaN') {
        IGST = 0;
    }
    if (otherTax == '' || otherTax == 'NaN') {
        otherTax = 0;
    }
    if (document.getElementById('CGSTCheck').checked) {
        totalTaxPercent += parseFloat(CGST);
    }
    if (document.getElementById('SGSTCheck').checked) {
        totalTaxPercent += parseFloat(SGST);
    }
    if (document.getElementById('IGSTCheck').checked) {
        totalTaxPercent += parseFloat(IGST);
    }
    if (document.getElementById('CommTaxCheck').checked) {
        totalTaxPercent += parseFloat(otherTax);
    }

    //if (document.getElementById('MkgTaxCheck').checked) {
    //    makingTaxPercent += (parseFloat(makingTaxCGST) + parseFloat(makingTaxSGST));        
    //}

    //var makingChrgValIncludingTax = parseFloat((parseFloat(document.getElementById(prefix + 'PayCashOthChgsDisp').value) * 100) / parseFloat(100 + parseFloat(makingTaxPercent))).toFixed(2);

    //alert('makingChrgValIncludingTax == ' + makingChrgValIncludingTax); 

    //document.getElementById(prefix + 'taxOnTotMkgCGSTChrg').value = parseFloat(makingChrgValIncludingTax).toFixed(2);
    //document.getElementById(prefix + 'taxOnTotMkgSGSTChrg').value = parseFloat(makingChrgValIncludingTax).toFixed(2);
    //document.getElementById('totMkngOrLabChgs').value = parseFloat(makingChrgValIncludingTax).toFixed(2);
    //document.getElementById(prefix + 'PayCashOthChgsDisp').value = parseFloat(makingChrgValIncludingTax).toFixed(2);

    //alert('utin_total_taxable_amt 1== ' + document.getElementById('utin_total_taxable_amt').value); 
    //alert('PayTotAmtAccess 1== ' + document.getElementById(prefix + 'PayTotAmtAccess').value); 
    //alert('utin_total_taxable_amt 1== ' + document.getElementById('utin_total_taxable_amt').value); 
    //alert('PayCrystalAmt 1== ' + document.getElementById(prefix + 'PayCrystalAmt').value); 
    //
    // 
    // FOR TAX INC VAL AND TAX ON TOT AMT - BOTH CHECK ON AT A TIME @PRIYANKA-08MAY2022
    var totalFinalTaxableAmount = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotAmtAccess').value) +
            parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value) +
            parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value) +
            parseFloat(document.getElementById(prefix + 'PayTotHallmarkChgs').value));
    if(document.getElementById('reverseCalculation').value == 'Yes' && document.getElementById('TaxByVal').checked && !document.getElementById('utin_pay_tax_on_total_amt_chk').checked){
         var totalFinalTaxableAmount = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotAmtAccess').value));
    }
    //
    //alert('totalFinalTaxableAmount 1== ' + totalFinalTaxableAmount); 
    //
    if (document.getElementById('utin_pay_tax_on_total_amt_chk').checked) {
        if (document.getElementById('TaxByVal').checked) {
            if (totalFinalTaxableAmount > document.getElementById('utin_total_taxable_amt').value) {
                if (document.getElementById("payPanelName").value == 'StockPayUp' ||
                 document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
                 document.getElementById("transPanelName").value == 'SellPayUp' ||
                 document.getElementById("transPanelName").value == 'ItemRepairPayUp' ||
                 document.getElementById("transPanelName").value == 'PurchaseReturnPayUp' ||
                 document.getElementById("transPanelName").value == 'ApprovalPayUp' ||
                 document.getElementById("payPanelName").value == 'RawPayUp') {
              itemValIncludingTax = parseFloat(((parseFloat(parseFloat(totalFinalTaxableAmount))-(parseFloat(document.getElementById('discountAmtDisp').value))) * 100) / parseFloat(100 + parseFloat(totalTaxPercent)));
                itemValIncludingTax +=(parseFloat(document.getElementById('discountAmtDisp').value));
             }else{
                itemValIncludingTax = parseFloat((parseFloat(totalFinalTaxableAmount) * 100) / parseFloat(100 + parseFloat(totalTaxPercent)));
            }
            } else {
                if (document.getElementById("payPanelName").value == 'StockPayUp' ||
                 document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
                 document.getElementById("transPanelName").value == 'SellPayUp' ||
                 document.getElementById("transPanelName").value == 'ItemRepairPayUp' ||
                 document.getElementById("transPanelName").value == 'PurchaseReturnPayUp' ||
                 document.getElementById("transPanelName").value == 'ApprovalPayUp' ||
                 document.getElementById("payPanelName").value == 'RawPayUp') {
              itemValIncludingTax = parseFloat(((parseFloat(document.getElementById('utin_total_taxable_amt').value)-(parseFloat(document.getElementById('discountAmtDisp').value))) * 100) / parseFloat(100 + parseFloat(totalTaxPercent)));
                itemValIncludingTax +=(parseFloat(document.getElementById('discountAmtDisp').value));
             }else{
                itemValIncludingTax = parseFloat(((parseFloat(document.getElementById('utin_total_taxable_amt').value)-parseFloat(document.getElementById('discountAmtDisp').value)) * 100) / parseFloat(100 + parseFloat(totalTaxPercent)));
                itemValIncludingTax +=(parseFloat(document.getElementById('discountAmtDisp').value));
             }
//                itemValIncludingTax = parseFloat(((parseFloat(document.getElementById('utin_total_taxable_amt').value) - (parseFloat(discount))) * 100) / parseFloat(100 + parseFloat(totalTaxPercent)));
//                itemValIncludingTax +=(parseFloat(document.getElementById('discountAmtDisp').value));
             }
        } else {
            itemValIncludingTax = parseFloat((parseFloat(document.getElementById('utin_total_taxable_amt').value) * 100) / parseFloat(100 + parseFloat(totalTaxPercent)));
        }
    } else {
        if (document.getElementById('TaxByVal').checked) {
            if (document.getElementById("payPanelName").value == 'StockPayUp' ||
                    document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
                    document.getElementById("transPanelName").value == 'SellPayUp' ||
                    document.getElementById("transPanelName").value == 'ItemRepairPayUp' ||
                    document.getElementById("transPanelName").value == 'PurchaseReturnPayUp' ||
                    document.getElementById("transPanelName").value == 'ApprovalPayUp' ||
                    document.getElementById("payPanelName").value == 'RawPayUp') {
                itemValIncludingTax = parseFloat(((parseFloat(totalFinalTaxableAmount) - parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value)) * 100) / parseFloat(100 + parseFloat(totalTaxPercent)));
            } else {
                itemValIncludingTax = parseFloat(((parseFloat(totalFinalTaxableAmount) - parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value)) * 100) / parseFloat(100 + parseFloat(totalTaxPercent)));
            
            }
           if (document.getElementById('reverseCalculation').value != 'Yes') { 
                itemValIncludingTax -= parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value);
//                if(document.getElementById('utin_reverse_cal_by').value == 'BYMKG'){
//                 var itemValIncludingTaxdiscount = ((parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value)*totalTaxPercent) / parseFloat(100));
//                  }
//                    itemValIncludingTax -=((itemValIncludingTaxdiscount*totalTaxPercent) / parseFloat(100));
            } else {
                 
                if (document.getElementById("payPanelName").value == 'StockPayUp' ||
                    document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
                    document.getElementById("transPanelName").value == 'SellPayUp' ||
                    document.getElementById("transPanelName").value == 'ItemRepairPayUp' ||
                    document.getElementById("transPanelName").value == 'PurchaseReturnPayUp' ||
                    document.getElementById("transPanelName").value == 'ApprovalPayUp' ||
                    document.getElementById("payPanelName").value == 'RawPayUp') {                
                  itemValIncludingTax += (parseFloat(document.getElementById('discountAmtDisp').value) * 100) / parseFloat(100 + parseFloat(totalTaxPercent));                  
                  var itemValIncludingTaxdiscount = ((parseFloat(document.getElementById('discountAmtDisp').value)*totalTaxPercent) / parseFloat(100));                
                  itemValIncludingTax += ((parseFloat(document.getElementById('discountAmtDisp').value)*totalTaxPercent) / parseFloat(100));                  
                  itemValIncludingTax -=((itemValIncludingTaxdiscount*totalTaxPercent) / parseFloat(100));
                  if(document.getElementById('utin_reverse_cal_by').value == 'BYDIS'){
                      itemValIncludingTax-=parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value); 
                 }else{
                     itemValIncludingTax-=parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value); 
                 }
                }else{
                    if (document.getElementById('utin_reverse_cal_by').value == 'BYDIS') {
                        itemValIncludingTax -= parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value * 100) / parseFloat(100 + parseFloat(totalTaxPercent));
                    } else {
                        itemValIncludingTax -= parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value);
                    }
                     itemValIncludingTax += (parseFloat(document.getElementById('discountAmtDisp').value) * 100) / parseFloat(100 + parseFloat(totalTaxPercent));
                }
            } 
             }else{
           
             itemValIncludingTax = parseFloat((parseFloat(document.getElementById(prefix + 'PayTotAmtAccess').value) * 100) / parseFloat(100 + parseFloat(totalTaxPercent)));
        }
    }
    //
    //alert('itemValIncludingTax 1== ' + itemValIncludingTax); 
    //
    return itemValIncludingTax;
    //
}

function calcTotFinAmt(prefix) {
    var totalAmt = 0;
    var crystalAmnt = 0;
    var finalTotalAmnt = 0;
    var itemValIncludingTax = 0;

    if (document.getElementById(prefix + 'PayCrystalAmt').value == '' || document.getElementById(prefix + 'PayCrystalAmt').value == 'NaN') {
        document.getElementById(prefix + 'PayCrystalAmt').value = 0;
    }

    if (document.getElementById(prefix + 'PayTotOthChgs').value == '' || document.getElementById(prefix + 'PayTotOthChgs').value == 'NaN') {
        document.getElementById(prefix + 'PayTotOthChgs').value = 0;
    }

    if (document.getElementById(prefix + 'PayTotHallmarkChgs').value == '' || document.getElementById(prefix + 'PayTotHallmarkChgs').value == 'NaN') {
        document.getElementById(prefix + 'PayTotHallmarkChgs').value = 0;
    }

    crystalAmnt = parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value);

    document.getElementById(prefix + 'PayCrystalAmt').value = parseFloat(crystalAmnt).toFixed(2);

    //alert('transPanelName == ' + document.getElementById('transPanelName').value);

    // Add Condition for Udhaar Payment Panel @PRIYANKA-21JUNE19
    if (document.getElementById('transPanelName').value != 'OnPurchase') {

        if (typeof (document.getElementById(prefix + 'PayCrystalAmtDisp')) != 'undefined' &&
                (document.getElementById(prefix + 'PayCrystalAmtDisp') != null)) {
            document.getElementById(prefix + 'PayCrystalAmtDisp').value = parseFloat(crystalAmnt).toFixed(2);
        }

    }

    var otherChrgsAmt = parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value);

    var hallmarkChrgsAmt = parseFloat(document.getElementById(prefix + 'PayTotHallmarkChgs').value);

    if (document.getElementById(prefix + 'PayTotAmtAccess').value == '' ||
            document.getElementById(prefix + 'PayTotAmtAccess').value == 'NaN') {
        document.getElementById(prefix + 'PayTotAmtAccess').value = 0;
    }
    
    var itemValIncludingTax = parseFloat(document.getElementById(prefix + 'PayTotAmtAccess').value);

//    if (document.getElementById('mainPanelName').value != 'udhaar') {

    if (document.getElementById('TaxByVal').checked) {
        itemValIncludingTax = getTaxByVal(prefix);
    }
    //
    //alert('itemValIncludingTax 3== ' + itemValIncludingTax);
    //alert('PayTotAmtBalDisp 3== ' + document.getElementById(prefix + 'PayTotAmtBalDisp').value);
    //alert('PayTotAmtAccess 3== ' + document.getElementById(prefix + 'PayTotAmtAccess').value);
    //alert('utin_pay_tax_on_total_amt_chk 3== ' + document.getElementById('utin_pay_tax_on_total_amt_chk').value);
    //
    if (document.getElementById('paymentMode').value != 'NoRateCut') {
        //
        if (document.getElementById('TaxByVal').checked && document.getElementById('utin_pay_tax_on_total_amt_chk').checked) {
            document.getElementById(prefix + 'PayTotAmtBalDisp').value = (parseFloat(itemValIncludingTax - (parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value) +
                    parseFloat(document.getElementById(prefix + 'PayTotHallmarkChgs').value)+ parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)))).toFixed(2);
        } else {
            document.getElementById(prefix + 'PayTotAmtBalDisp').value = (parseFloat(itemValIncludingTax)).toFixed(2);
        }
        //
        if (document.getElementById('paymentMode').value != 'RateCut') { //AMOUNT-PRIYANKA-19MAR18
            //
            //alert('utin_metal_exchange_chk === ' + document.getElementById('utin_metal_exchange_chk').checked);
            //
            // PRIYANKA-30APR18
            if (document.getElementById('utin_metal_exchange_chk').checked) {
                document.getElementById(prefix + 'PayTotAmtBalDisp').value = (parseFloat(document.getElementById(prefix + 'PayTotAmtBalDisp').value) - parseFloat(document.getElementById(prefix + 'PayTotAmtExchangeDisp').value)).toFixed(2);
            }
            //
        }
    }
    //}
    //
    //
    //alert('PayTotAmtBalDisp 4== ' + document.getElementById(prefix + 'PayTotAmtBalDisp').value);
    //
    //
    // START CODE FOR DISCOUNT APPLY BEFORE GST TAX @PRIYANKA-06MAR18
//    if (document.getElementById('utin_discount_per_discup').value == '' &&
//            document.getElementById('utin_discount_amt_discup').value == '') {

    if (document.getElementById('TaxByVal').checked && document.getElementById('utin_pay_tax_on_total_amt_chk').checked) {
        if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
            document.getElementById(prefix + 'PayTotAmt').value = (parseFloat(itemValIncludingTax - (parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value) +
                    parseFloat(document.getElementById(prefix + 'PayTotHallmarkChgs').value) +  parseFloat(document.getElementById(prefix + 'PayCrystalAmt').value)))).toFixed(2);
        }
    } else {
        if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
            document.getElementById(prefix + 'PayTotAmt').value = parseFloat(itemValIncludingTax).toFixed(2);
        }
        }


    if (document.getElementById('paymentMode').value != 'RateCut') { //AMOUNT-PRIYANKA-19MAR18

        //alert('utin_metal_exchange_chk = ' + document.getElementById('utin_metal_exchange_chk').checked);

        // PRIYANKA-30APR18
        if (document.getElementById('utin_metal_exchange_chk').checked) {
            if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
                document.getElementById(prefix + 'PayTotAmt').value = Math_round(parseFloat(document.getElementById(prefix + 'PayTotAmt').value) - parseFloat(document.getElementById(prefix + 'PayTotAmtExchangeDisp').value)).toFixed(2);
            }
        }
    }
//    }
    //
    if (document.getElementById(prefix + 'PayPrevTotAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevTotAmt').value == '') {
        document.getElementById(prefix + 'PayPrevTotAmt').value = 0;
    }
    //
//    if (document.getElementById('utin_discount_per_discup').value == '' && document.getElementById('utin_discount_amt_discup').value == '') {
    //
    // alert('valueAdded **==' + document.getElementById('valueAdded').value);
    // If Payment Mode in ByCash then value added add in other charges @PRIYANKA-20MAR18
//        if (document.getElementById('paymentMode').value == 'ByCash') {
//            var otherChrgsAmt = parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value) + parseFloat(document.getElementById('valueAdded').value); 
//            document.getElementById(prefix + 'PayCashOthChgsDisp').value = Math_round(parseFloat(otherChrgsAmt)).toFixed(2); 
//        } else {
    var otherChrgsAmt = parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value);

    var hallmarkChrgsAmt = parseFloat(document.getElementById(prefix + 'PayTotHallmarkChgs').value);
//        }
    //
    //
    if (document.getElementById('paymentMode').value == 'RateCut') {
        //
//            alert('transPanelName == ' + document.getElementById('transPanelName').value);
//            alert('payPanelName == ' + document.getElementById('payPanelName').value);
//            alert('PaymentReceiptPanel == ' + document.getElementById('PaymentReceiptPanel').value);
        //
        if (document.getElementById('transPanelName').value == 'SellPayment' ||
                document.getElementById("transPanelName").value == 'SellPayUp' ||
                document.getElementById("payPanelName").value == 'SlPrPayment' ||
                document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                document.getElementById("payPanelName").value == 'ItemRepairPayUp' ||
                document.getElementById("transPanelName").value == 'PurchaseReturnPanel' ||
                document.getElementById("transPanelName").value == 'PurchaseReturnPayUp' ||
                document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                document.getElementById("payPanelName").value == 'PurchaseReturnPayUp' ||
                document.getElementById("payPanelName").value == 'ApprovalPayment' ||
                document.getElementById("payPanelName").value == 'ApprovalPayUp' ||
                document.getElementById("transPanelName").value == 'ApprovalPayUp' ||
                document.getElementById("payPanelName").value == 'NewOrderPayment' ||
                document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
                document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
                document.getElementById("payPanelName").value == 'CrySellPayment' ||
                document.getElementById("payPanelName").value == 'CrySellPayUp' ||
                document.getElementById('PaymentReceiptPanel').value == 'RECEIPT') { // @PRIYANKA-20NOV2018
            //
            if (document.getElementById(prefix + 'PayableCashCRDR').value == 'CR' ||
                    document.getElementById(prefix + 'FinalCashCRDR').value == 'CR') {
                finalTotalAmnt = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotAmt').value) - (parseFloat(otherChrgsAmt) + parseFloat(crystalAmnt) + parseFloat(hallmarkChrgsAmt))).toFixed(2);
            } else {

                if (document.getElementById('sttr_fixed_price_prod_present').value == 'YES') {

                    //finalTotalAmnt = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotAmt').value)).toFixed(2);

                    finalTotalAmnt = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + (parseFloat(otherChrgsAmt) + parseFloat(crystalAmnt) + parseFloat(hallmarkChrgsAmt))).toFixed(2);

                } else {
                    finalTotalAmnt = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + (parseFloat(otherChrgsAmt) + parseFloat(crystalAmnt) + parseFloat(hallmarkChrgsAmt))).toFixed(2);
                }

            }
            //
        } else if (document.getElementById('transPanelName').value == 'PurchasePayment' ||
                document.getElementById("transPanelName").value == 'PurchasePayUp' ||
                document.getElementById('transPanelName').value == 'ItemReturnPanel' ||
                document.getElementById('transPanelName').value == 'ItemReturnPayUp' ||
                document.getElementById('transPanelName').value == 'StockReturnPanel' ||
                document.getElementById('PaymentReceiptPanel').value == 'PAYMENT') { // @PRIYANKA-20NOV2018
            //
            if (document.getElementById(prefix + 'PayableCashCRDR').value == 'DR' ||
                    document.getElementById(prefix + 'FinalCashCRDR').value == 'DR') {
                finalTotalAmnt = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotAmt').value) - (parseFloat(otherChrgsAmt) + parseFloat(crystalAmnt) + parseFloat(hallmarkChrgsAmt))).toFixed(2);
            } else {
                if (document.getElementById('sttr_fixed_price_prod_present').value == 'YES') {

                    //finalTotalAmnt = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotAmt').value)).toFixed(2);

                    finalTotalAmnt = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + (parseFloat(otherChrgsAmt) + parseFloat(crystalAmnt) + parseFloat(hallmarkChrgsAmt))).toFixed(2);

                } else {
                    finalTotalAmnt = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + (parseFloat(otherChrgsAmt) + parseFloat(crystalAmnt) + parseFloat(hallmarkChrgsAmt))).toFixed(2);
                }
                }
            //
        }
    }
    //
    //
    if (document.getElementById('paymentMode').value != 'RateCut') {

        if (document.getElementById('sttr_fixed_price_prod_present').value == 'YES') {

            //finalTotalAmnt = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotAmt').value)).toFixed(2);

            finalTotalAmnt = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + (parseFloat(otherChrgsAmt) + parseFloat(crystalAmnt) + parseFloat(hallmarkChrgsAmt))).toFixed(2);

        } else {
            finalTotalAmnt = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + (parseFloat(otherChrgsAmt) + parseFloat(crystalAmnt) + parseFloat(hallmarkChrgsAmt))).toFixed(2);
        }
    }
    //
    //
    document.getElementById(prefix + 'PayTotCashAmt').value = finalTotalAmnt;
    //}
    //
    // END CODE FOR DISCOUNT APPLY BEFORE GST TAX @PRIYANKA-06MAR18

    //alert('finalTotalAmnt == ' + finalTotalAmnt);

//    if (document.getElementById(prefix + 'PayPrevTotAmt').value != '' || document.getElementById(prefix + 'PayPrevTotAmt').value != 0) {
//        if (finalTotalAmnt != '' && finalTotalAmnt != 0) {
//            finalTotalAmnt = calcFinalAmountCRDR(prefix, document.getElementById(prefix + 'PayPrevCashBalCRDR').value, document.getElementById(prefix + 'TransCRDR').value, finalTotalAmnt);
//        } else {
//            finalTotalAmnt = parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value);
//        }
//    }
    return finalTotalAmnt;
}
function calcFinalAmountCRDR(prefix, prevAmtCRDR, currentAmtCRDR, finalTotalAmnt) {
    if ((prevAmtCRDR == 'DR' && currentAmtCRDR == 'DR') ||
            (prevAmtCRDR == 'CR' && currentAmtCRDR == 'CR')) {
        finalTotalAmnt = parseFloat(finalTotalAmnt) + parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value);
    } else if ((prevAmtCRDR == 'DR' && currentAmtCRDR == 'CR') ||
            (prevAmtCRDR == 'CR' && currentAmtCRDR == 'DR')) {
        if (currentAmtCRDR == 'DR') {
            finalTotalAmnt = parseFloat(finalTotalAmnt) - parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value);
        } else {
            finalTotalAmnt = Math.abs(parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value) - parseFloat(finalTotalAmnt));
        }
    }
    return finalTotalAmnt;
}
// start code to reverse calculation @Author:vinod29May2023
function reverseGSTCal(prefix, changeGstType)
{
    var totalPayAmt = 0;
    var taxibleSgstAmt = 0;
    var sgstPer = 0;
    var taxibleCgstAmt = 0;
    var cgstPer = 0;
    var totalGstAmt = 0
    taxibleSgstAmt = document.getElementById(prefix + 'SGSTAmt').value;
    if (changeGstType == 'SGST' && taxibleSgstAmt != '' && taxibleSgstAmt != null)
    {
        totalGstAmt = taxibleSgstAmt;
    }
    taxibleCgstAmt = document.getElementById(prefix + 'CGSTAmt').value;
    if (changeGstType == 'CGST' && taxibleCgstAmt != '' && taxibleCgstAmt != null)
    {
        totalGstAmt = taxibleCgstAmt;
    }
    totalPayAmt = document.getElementById('taxOnCGSTTotAmt').value;
    gstPer = (totalGstAmt * 100) / totalPayAmt;
    document.getElementById(prefix + 'CGST').value = gstPer;
    document.getElementById(prefix + 'SGST').value = gstPer;
    calDiscountAmt(prefix);
    calcPaymentCashBalance(prefix);
}
// end code to reverse calculation @Author:vinod29May2023
function calcPaymentCashBalance(prefix) {
    //alert (document.getElementById('mainPanelName').value);
    if (document.getElementById('mainPanelName').value == 'PurchaseReturnPanel' || document.getElementById('mainPanelName').value == 'PurchaseReturnPayUp' || document.getElementById('mainPanelName').value == 'stock') {

        if (document.getElementById('transPanelName').value == '' || document.getElementById('transPanelName').value == null) {
            document.getElementById('transPanelName').value = document.getElementById('mainPanelName').value;
        }

        if (document.getElementById('payPanelName').value == '' || document.getElementById('payPanelName').value == null) {
            document.getElementById('payPanelName').value = document.getElementById('mainPanelName').value;
        }

    }

    //alert('mainPanelName #1== ' + document.getElementById('mainPanelName').value);
    //alert('transPanelName #1== ' + document.getElementById('transPanelName').value);
    //alert('payPanelName #1== ' + document.getElementById('payPanelName').value);

    //alert('PayTotCashAmt ##==' + document.getElementById(prefix + 'PayTotCashAmt').value);

    //alert('PayPrevCashBalCRDR **== ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);     

    //alert('TransCRDR **== ' + document.getElementById(prefix + 'TransCRDR').value);     
    //alert('FinalCashCRDR **== ' + document.getElementById(prefix + 'FinalCashCRDR').value); 
    //alert('PayableCashCRDR **== ' + document.getElementById(prefix + 'PayableCashCRDR').value);  

    //alert('PayableCashCRDR aa== ' + document.getElementById(prefix + 'PayableCashCRDR').value);   

    //alert('payPanelName : ' + document.getElementById("payPanelName").value);
    if (typeof (document.getElementById('paymentMode')) == 'undefined' || (document.getElementById('paymentMode') == null)) {
        document.getElementById('paymentMode').value = 'ByCash';
    }
    if (typeof (document.getElementById('paymentMode')) != 'undefined' &&
            (document.getElementById('paymentMode') != null)) {
        if (document.getElementById('paymentMode').value == 'RateCut' && document.getElementById(prefix + 'PayPrevAmtDisp').value == '0.00') {

            var PrevGdCashBal = document.getElementById('PrevGdCashBal').value;
            var CashToGdMetalWt = document.getElementById('CashToGdMetalWt').value;

            // START @PRIYANKA-11APR18
            var PrevSlCashBal = document.getElementById('PrevSlCashBal').value;
            var CashToSlMetalWt = document.getElementById('CashToSlMetalWt').value;
            // END @PRIYANKA-11APR18

            if ((CashToGdMetalWt > 0 && PrevGdCashBal > 0) || (CashToSlMetalWt > 0 && PrevSlCashBal > 0)) {

//            var FinalGdCRDR = document.getElementById(prefix + 'FinalGdCRDR').value;
//            document.getElementById(prefix + 'PayPrevCashBalCRDR').value = FinalGdCRDR;
//            document.getElementById(prefix + 'TransCRDR').value = FinalGdCRDR;
//            document.getElementById(prefix + 'PayableCashCRDR').value = FinalGdCRDR;
//            document.getElementById(prefix + 'FinalCashCRDR').value = FinalGdCRDR;

            } else {

                if (((document.getElementById(prefix + 'FinalGdCRDR').value == 'CR' ||
                        document.getElementById(prefix + 'FinalSlCRDR').value == 'CR') &&
                        document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR' &&
                        document.getElementById(prefix + 'PayableCashCRDR').value == 'DR') ||
                        ((document.getElementById(prefix + 'FinalGdCRDR').value == 'DR' ||
                                document.getElementById(prefix + 'FinalSlCRDR').value == 'DR') &&
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR' &&
                                document.getElementById(prefix + 'PayableCashCRDR').value == 'CR') &&
                        document.getElementById('paymentMode').value == 'RateCut') {

//                var GoldCashMetal = document.getElementById('utin_cash_to_metal').value;
//                var GoldCashMetalCRDR = document.getElementById('utin_prev_cash_opening_CRDR').value;
//                var GoldCashMetalWt = document.getElementById('utin_cash_to_metalwt').value;
//
//                var SilverCashMetal = document.getElementById('utin_sl_cash_to_metal').value;
//                var SilverCashMetalCRDR = document.getElementById('utin_sl_prev_cash_opening_CRDR').value;
//                var SilverCashMetalWt = document.getElementById('utin_sl_cash_to_metalwt').value;



                } else {

                    //alert('TransCRDR cc1== ' + document.getElementById(prefix + 'TransCRDR').value); 

                    var FinalGdCRDR = document.getElementById(prefix + 'FinalGdCRDR').value;
                    document.getElementById(prefix + 'PayPrevCashBalCRDR').value = FinalGdCRDR;
                    document.getElementById(prefix + 'TransCRDR').value = FinalGdCRDR;
                    document.getElementById(prefix + 'PayableCashCRDR').value = FinalGdCRDR;
                    document.getElementById(prefix + 'FinalCashCRDR').value = FinalGdCRDR;

                    //alert('TransCRDR cc2== ' + document.getElementById(prefix + 'TransCRDR').value); 
                    //alert('PayableCashCRDR cc== ' + document.getElementById(prefix + 'PayableCashCRDR').value); 
                }

            }

            //alert('TransCRDR **== ' + document.getElementById(prefix + 'TransCRDR').value);
        }
    }
    //alert('PayableCashCRDR ++== ' + document.getElementById(prefix + 'PayableCashCRDR').value);  

    //alert('PayPrevCashBalCRDR == ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);     
    //alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);   

    // START @PRIYANKA-05APR18
    if (document.getElementById('PrevTotOpeningAmt').value == '' || document.getElementById('PrevTotOpeningAmt').value == 'NaN') {
        document.getElementById('PrevTotOpeningAmt').value = '0.00';
    }
    // END @PRIYANKA-05APR18

    // alert('PrevTotOpeningAmt **== ' + document.getElementById('PrevTotOpeningAmt').value);

    // START @PRIYANKA-03APR18

    if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {

        //var PayPrevAmtDisp = document.getElementById(prefix + 'PayPrevAmtDisp').value; // Previous Amount Bal

        //if (typeof(PayPrevAmtDisp) != 'undefined' && PayPrevAmtDisp != null) {
        //PayPrevAmtDisp = PayPrevAmtDisp.replace(/\,/g, '');
        //}

        //alert('PrevTotOpeningAmt == ' + document.getElementById('PrevTotOpeningAmt').value);

        // START @PRIYANKA-05APR18        
        // if(document.getElementById('utin_prev_cash_opening').value < 0) {        

        // START CODE FOR DISPLAY PREV CASH OPENING (UPDATE TIME) @PRIYANKA-26JUNE18 
        if (document.getElementById("payPanelName").value != 'StockPayUp' &&
                document.getElementById("payPanelName").value != 'ItemReturnPayUp' &&
                document.getElementById("transPanelName").value != 'SellPayUp' &&
                document.getElementById("transPanelName").value != 'ItemRepairPayUp' &&
                document.getElementById("transPanelName").value != 'PurchaseReturnPayUp' &&
                document.getElementById("transPanelName").value != 'ApprovalPayUp' &&
                document.getElementById("payPanelName").value != 'RawPayUp') {
            document.getElementById('utin_prev_cash_opening').value = parseFloat(document.getElementById('PrevTotOpeningAmt').value).toFixed(2);
            document.getElementById('utin_prev_cash_opening_CRDR').value = document.getElementById('PrevTotOpeningAmtCRDR').value;
        }
        // END CODE FOR DISPLAY PREV CASH OPENING (UPDATE TIME) @PRIYANKA-26JUNE18

        // } 
        // END @PRIYANKA-05APR18

        //alert('utin_prev_cash_opening == ' + document.getElementById('utin_prev_cash_opening').value);

//        if (document.getElementById('paymentMode').value == 'NoRateCut') {
//            
//            if ((document.getElementById("utin_prev_cash_opening").value > 0) && (document.getElementById("utin_cash_to_metal").value > 0) &&
//                (document.getElementById("GdCashToMetal").value > 0) && (document.getElementById("PrevGdCashBal").value > 0)) {
//
//                // CASH BALANCE ON PAYMENT PANEL @PRIYANKA-06APR18
//                if (document.getElementById("utin_prev_cash_opening").value == document.getElementById("utin_cash_to_metal").value) {
//                    //
//                    document.getElementById(prefix + 'PayPrevTotAmt').value = parseFloat(Math.abs(document.getElementById("PrevGdCashBal").value)).toFixed(2);
//                    document.getElementById(prefix + 'PayPrevAmtDisp').value = parseFloat(Math.abs(document.getElementById("PrevGdCashBal").value)).toFixed(2);
//                    document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;
//                    //
//                }
//
//            } else if ((document.getElementById("utin_prev_cash_opening").value > 0) && (document.getElementById("utin_cash_to_metal").value > 0) &&
//                       (document.getElementById("utin_prev_cash_opening").value == document.getElementById("utin_cash_to_metal").value)) {
//
//                        document.getElementById(prefix + 'PayPrevTotAmt').value = parseFloat(Math.abs(document.getElementById("utin_prev_cash_bal").value)).toFixed(2);
//                        document.getElementById(prefix + 'PayPrevAmtDisp').value = parseFloat(Math.abs(document.getElementById("utin_prev_cash_bal").value)).toFixed(2);
//                      //document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;
//
//            }
//            
//        }

        // START @PRIYANKA-07APR18
        //if (document.getElementById('paymentMode').value == 'NoRateCut') {

//            if (document.getElementById("utin_prev_cash_opening_CRDR").value == 'DR') {
//                document.getElementById('utin_prev_cash_opening_CRDR').style.color = 'green';
//                document.getElementById('utin_prev_cash_opening').style.color = 'green';
//            } else if (document.getElementById("utin_prev_cash_opening_CRDR").value == 'CR') {
//                document.getElementById('utin_prev_cash_opening_CRDR').style.color = 'red';
//                document.getElementById('utin_prev_cash_opening').style.color = 'red';
//            }

        // END @PRIYANKA-07APR18

        // START @PRIYANKA-07APR18
        if (document.getElementById("utin_cash_to_metal").value == '0.00') {
            document.getElementById("utin_cash_to_metal").value = parseFloat(document.getElementById("utin_prev_cash_opening").value).toFixed(2);
        }

        if (document.getElementById("utin_cash_to_metal").value == '' || document.getElementById("utin_cash_to_metal").value == 0) {
            document.getElementById("utin_prev_cash_bal").value = parseFloat(document.getElementById("utin_prev_cash_opening").value).toFixed(2);
            document.getElementById("utin_prev_cash_bal_CRDR").value = document.getElementById("utin_prev_cash_opening_CRDR").value;
        }
        // END @PRIYANKA-07APR18

        // PREV SL CASH OPENING AMOUNT @PRIYANKA-10APR18
        if (document.getElementById("utin_sl_prev_cash_opening").value == '0.00') {
            document.getElementById("utin_sl_prev_cash_opening").value = parseFloat(document.getElementById("utin_prev_cash_bal").value).toFixed(2);
            document.getElementById("utin_sl_prev_cash_opening_CRDR").value = document.getElementById("utin_prev_cash_bal_CRDR").value;
        }

        // alert('utin_sl_prev_cash_opening == ' + document.getElementById("utin_sl_prev_cash_opening").value);
        // alert('utin_sl_prev_cash_opening_CRDR == ' + document.getElementById("utin_sl_prev_cash_opening_CRDR").value);

        calcCashToMetal(prefix);

        // START CODE FOR PAYMENT/RECEIPT CASH TO METAL ISSUE @PRIYANKA-29MAY18
        if (document.getElementById('paymentMode').value == 'RateCut') {

            var CashGdMetalWt = parseFloat(document.getElementById('CashToGdMetalWt').value);
            var GdCashMetal = parseFloat(document.getElementById('GdCashToMetal').value);

            var CashToSLMetalWt = document.getElementById('CashToSlMetalWt').value;
            var SLCashToMetal = document.getElementById('SlCashToMetal').value;

            if (CashGdMetalWt > 0 && GdCashMetal > 0 || CashToSLMetalWt > 0 && SLCashToMetal > 0) {

                if (document.getElementById(prefix + 'PayPrevAmtDisp').value == '0.00') {

                    document.getElementById(prefix + 'PayTotCashAmt').value = Math.abs(parseFloat(document.getElementById(prefix + 'PayTotAmt').value)).toFixed(2);
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs(parseFloat(document.getElementById(prefix + 'PayTotAmt').value)).toFixed(2);
                    document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.abs(parseFloat(document.getElementById(prefix + 'PayTotAmt').value)).toFixed(2);

                    if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                            document.getElementById('PrevGdCashBalCRDR').value == 'CR' &&
                            document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR') ||
                            (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                    document.getElementById('PrevGdCashBalCRDR').value == 'DR' &&
                                    document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR')) {

                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                        document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                        document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                        document.getElementById(prefix + 'RtCtCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;

                    } else if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
                            document.getElementById('PrevGdCashBalCRDR').value == 'DR' &&
                            document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR') ||
                            (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                                    document.getElementById('PrevGdCashBalCRDR').value == 'CR' &&
                                    document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR')) {

                        if (document.getElementById('GdCashToMetal').value > document.getElementById(prefix + 'GoldValuation').value) {

                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;
                            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;
                            document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;
                            document.getElementById(prefix + 'RtCtCashCRDR').value = document.getElementById('PrevGdCashBalCRDR').value;

                        } else {

                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                            document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                            document.getElementById(prefix + 'RtCtCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
                        }
                    }
                }
            }
        }           
        // END CODE FOR PAYMENT/RECEIPT CASH TO METAL ISSUE @PRIYANKA-29MAY18

        // START @PRIYANKA-08APR18
        if (document.getElementById('paymentMode').value == 'NoRateCut') {

            var CashGdMetalWt = parseFloat(document.getElementById('CashToGdMetalWt').value);
            var GdCashMetal = parseFloat(document.getElementById('GdCashToMetal').value);

            // START @PRIYANKA-11APR18
            var CashToSLMetalWt = document.getElementById('CashToSlMetalWt').value;
            var SLCashToMetal = document.getElementById('SlCashToMetal').value;

            if (CashGdMetalWt > 0 && GdCashMetal > 0 || CashToSLMetalWt > 0 && SLCashToMetal > 0) {

                document.getElementById(prefix + 'PayTotCashAmtDisp').value = (parseFloat(document.getElementById('GdCashToMetal').value)).toFixed(2);
                document.getElementById(prefix + 'PayFinAmtBalDisp').value = (parseFloat(document.getElementById('GdCashToMetal').value)).toFixed(2);
                if (document.getElementById('utin_reverse_cal_by').value != 'BYCSWS') {
                    document.getElementById(prefix + 'PayTotAmt').value = (parseFloat(document.getElementById('GdCashToMetal').value)).toFixed(2);
                    document.getElementById(prefix + 'PayTotAmtBalDisp').value = (parseFloat(document.getElementById('GdCashToMetal').value)).toFixed(2);
                    document.getElementById(prefix + 'PayTotAmtAccess').value = (parseFloat(document.getElementById('GdCashToMetal').value)).toFixed(2);
                }
                if (document.getElementById(prefix + 'PayPrevAmtDisp').value == '0.00') {

                    if (CashGdMetalWt > 0 && GdCashMetal > 0) {

                        var PrevGdCashBalCRDR = document.getElementById('PrevGdCashBalCRDR').value;
                        document.getElementById(prefix + 'PayPrevCashBalCRDR').value = PrevGdCashBalCRDR;
                        document.getElementById(prefix + 'TransCRDR').value = PrevGdCashBalCRDR;
                        document.getElementById(prefix + 'PayableCashCRDR').value = PrevGdCashBalCRDR;
                        document.getElementById(prefix + 'FinalCashCRDR').value = PrevGdCashBalCRDR;
                    }

                    if (CashToSLMetalWt > 0 && SLCashToMetal > 0) {

                        var PrevSLCashBalCRDR = document.getElementById('PrevSlCashBalCRDR').value;
                        document.getElementById(prefix + 'PayPrevCashBalCRDR').value = PrevSLCashBalCRDR;
                        document.getElementById(prefix + 'TransCRDR').value = PrevSLCashBalCRDR;
                        document.getElementById(prefix + 'PayableCashCRDR').value = PrevSLCashBalCRDR;
                        document.getElementById(prefix + 'FinalCashCRDR').value = PrevSLCashBalCRDR;
                    }

                    // alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);
                }
            }
        }
        //}
        // END @PRIYANKA-11APR18
        // END @PRIYANKA-08APR18
    }

//alert('PayableCashCRDR bb== ' + document.getElementById(prefix + 'PayableCashCRDR').value);   

// END @PRIYANKA-03APR18

//    if (document.getElementById('paymentMode').value == 'RateCut') {
//        
//        if (document.getElementById("utin_cash_to_metal").value == '') {
//
//            document.getElementById("utin_prev_cash_bal").value = parseFloat(document.getElementById("PrevTotOpeningAmt").value).toFixed(2);
//            document.getElementById("utin_prev_cash_bal_CRDR").value = document.getElementById("PrevTotOpeningAmtCRDR").value;
//
//            document.getElementById(prefix + 'PayPrevTotAmt').value = document.getElementById('PrevTotOpeningAmt').value;
//            document.getElementById(prefix + 'PayPrevAmtDisp').value = document.getElementById('PrevTotOpeningAmt').value;
//            document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById('PrevTotOpeningAmtCRDR').value;
//      
//        }
//    }

//alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);    
//alert('PayPrevCashBalCRDR == ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);

//alert('PayPrevAmtDisp == ' + document.getElementById(prefix + 'PayPrevAmtDisp').value);    
//alert('PayPrevCashBalCRDR == ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);

//alert('PayableCashCRDR ++== ' + document.getElementById(prefix + 'PayableCashCRDR').value);  


//alert('PayTotCashAmtDisp ++== ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);

    //alert('mainPanelName #1== ' + document.getElementById('mainPanelName').value);
    //alert('transPanelName #1== ' + document.getElementById('transPanelName').value);
    //alert('payPanelName #1== ' + document.getElementById('payPanelName').value);

    var finalCashBal;
    var taxAmt = 0;
    var CGSTAmt = 0;
    var SGSTAmt = 0;
    var IGSTAmt = 0;
    var MkgTaxAmt = 0;
    var HallmarkTaxAmt = 0;
    var finBalLabel = 'FINAL CASH BALANCE :';
    var finalTotalAmnt = 0;
    var totalTaxAmount = 0;
    var totalTaxCal = 0;
    //
    finalTotalAmnt = calcTotFinAmt(prefix);
    //
    //alert('finalTotalAmnt 1!!1== ' + finalTotalAmnt);
    //
    if (document.getElementById('utin_discount_amt_discup').value > 0) {
                finalTotalAmnt = parseFloat((finalTotalAmnt) - (document.getElementById('utin_discount_amt_discup').value)).toFixed(2);
            }
    //
    //alert('finalTotalAmnt 2!!2== ' + finalTotalAmnt);
    //
    //alert('mainPanelName #2== ' + document.getElementById('mainPanelName').value);
    //alert('transPanelName #2== ' + document.getElementById('transPanelName').value);
    //alert('payPanelName #2== ' + document.getElementById('payPanelName').value);

    //alert('PayTotCashAmtDisp @@== ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);

    if (document.getElementById('paymentMode').value == 'RateCut')
        finalTotalAmnt = parseFloat(finalTotalAmnt) + parseFloat(document.getElementById(prefix + 'PayTotAmtExchangeDisp').value);

    //alert('finalTotalAmnt *##*== ' + finalTotalAmnt);
    //finalTotalAmnt = parseFloat(finalTotalAmnt) - parseFloat(document.getElementById(prefix + 'PayTotAmtExchangeDisp').value);
    //alert('finalTotalAmnt **== ' + finalTotalAmnt);

    //alert('PayTotCashAmtDisp #1#== ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);

    calcTotTax(prefix, finalTotalAmnt);

    //alert('PayTotCashAmtDisp #2#== ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);

    if (document.getElementById('mainPanelName').value != 'userHome' && document.getElementById('mainPanelName').value != 'scheme' && document.getElementById('mainPanelName').value != 'finance') {
        finalTotalAmnt = calcCourierChrg(prefix, finalTotalAmnt);
        finalTotalAmnt = calcOtherChrg(prefix, finalTotalAmnt);    // Adding Other Charge @Author:Vinod : 26-May-2023
    }

    var totalCashNdChequeAmt = calcCashNdChequeAmt(prefix);
    var totalCardAmt = calcCardAmt(prefix);
    var totalOnlinePayAmt = calcOnlinePayAmt(prefix);
    var totalDiscount = discountAmt(prefix);

    MkgTaxAmt = parseFloat(document.getElementById(prefix + 'MkgChrgCGSTAmt').value) + parseFloat(document.getElementById(prefix + 'MkgChrgSGSTAmt').value);
    taxAmt = document.getElementById(prefix + 'TaxAmt').value;
    CGSTAmt = document.getElementById(prefix + 'CGSTAmt').value;
    SGSTAmt = document.getElementById(prefix + 'SGSTAmt').value;
    IGSTAmt = document.getElementById(prefix + 'IGSTAmt').value;

    HallmarkTaxAmt = parseFloat(parseFloat(document.getElementById(prefix + 'HallmarkChrgCGSTAmt').value) + parseFloat(document.getElementById(prefix + 'HallmarkChrgSGSTAmt').value) + parseFloat(document.getElementById(prefix + 'HallmarkChrgIGSTAmt').value));

    if (taxAmt == 'NaN' || taxAmt == '') {
        taxAmt = 0.00;
    }
    if (CGSTAmt == 'NaN' || CGSTAmt == '') {
        CGSTAmt = 0.00;
    }
    if (SGSTAmt == 'NaN' || SGSTAmt == '') {
        SGSTAmt = 0.00;
    }
    if (IGSTAmt == 'NaN' || IGSTAmt == '') {
        IGSTAmt = 0.00;
    }
    if (MkgTaxAmt == 'NaN' || MkgTaxAmt == '') {
        MkgTaxAmt = 0.00;
    }

//if (document.getElementById('TaxByVal').checked == true) {
//totalTaxAmount = 0;
//} else {
    totalTaxAmount = parseFloat(parseFloat(MkgTaxAmt) + parseFloat(HallmarkTaxAmt));
//}

    //alert('totalTaxAmount #2#== ' + totalTaxAmount);

    //alert('totalTaxCal ##== ' + totalTaxCal);

//    
//    
//    if (document.getElementById('UnregisteredPurchaseTaxCheck').checked) {        
//        
//        totalTaxCal = parseFloat(parseFloat(document.getElementById(prefix + 'CGSTAmt').value) +
//        parseFloat(document.getElementById(prefix + 'SGSTAmt').value) +
//        parseFloat(document.getElementById(prefix + 'IGSTAmt').value) +
//        parseFloat(document.getElementById(prefix + 'TaxAmt').value) +
//        parseFloat(document.getElementById(prefix + 'HallmarkChrgCGSTAmt').value) +
//        parseFloat(document.getElementById(prefix + 'HallmarkChrgSGSTAmt').value) +
//        parseFloat(document.getElementById(prefix + 'HallmarkChrgIGSTAmt').value) +
//        parseFloat(document.getElementById(prefix + 'MkgChrgCGSTAmt').value) +
//        parseFloat(document.getElementById(prefix + 'MkgChrgSGSTAmt').value)).toFixed(2);
//    
//        alert('PayTotCashAmt #@1@#== ' + document.getElementById(prefix + 'PayTotCashAmt').value);
//        alert('PayTotCashAmtDisp #@1@#== ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);
//        alert('totalTaxCal #@1@#== ' + totalTaxCal);
//        alert('PayTotCashAmt #@2@#== ' + document.getElementById(prefix + 'PayTotCashAmt').value);
//        alert('PayTotCashAmtDisp #@2@#== ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);
//        
//    }
//
//

    if (document.getElementById('utin_additional_charges').value == null ||
            document.getElementById('utin_additional_charges').value == 'undefined') {
        document.getElementById('utin_additional_charges').value = '0.00';
    }

    if (document.getElementById('utin_additional_charges').value > 0) {
        document.getElementById('utin_additional_charges').value = parseFloat(document.getElementById('utin_additional_charges').value).toFixed(2);
    }

    if (document.getElementById('utin_additional_charges').value != '' &&
            document.getElementById('utin_additional_charges').value != null) {
        document.getElementById('utin_additional_charges_disp').value = parseFloat(document.getElementById('utin_additional_charges').value).toFixed(2);
    } else {
        document.getElementById('utin_additional_charges_disp').value = parseFloat(0).toFixed(2);
    }

    if (document.getElementById('utin_additional_charges').value > 0 && document.getElementById('additionalChargesPlusMinus').value == 'minus') {
        document.getElementById(prefix + 'PayTotCashAmt').value = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
        document.getElementById(prefix + 'PayTotCashAmtDisp').value = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value) - parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
        finalTotalAmnt = parseFloat(parseFloat(finalTotalAmnt) - parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
    } else if (document.getElementById('utin_additional_charges').value > 0 && document.getElementById('additionalChargesPlusMinus').value == 'plus') {
        document.getElementById(prefix + 'PayTotCashAmt').value = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
        document.getElementById(prefix + 'PayTotCashAmtDisp').value = parseFloat(parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value) + parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2);
        finalTotalAmnt = parseFloat(parseFloat(finalTotalAmnt) + parseFloat(document.getElementById('utin_additional_charges').value)).toFixed(2)
    }

     if (document.getElementById('CGSTCheck').checked) {
        document.getElementById('IGSTCheck').checked =false; 
        document.getElementById('igstCheckBoxCheck').style.display= 'none';
        document.getElementById('IGSTDivision').style.display= 'none';
        totalTaxAmount += parseFloat(CGSTAmt);
    }
    if (document.getElementById('SGSTCheck').checked) {
        totalTaxAmount += parseFloat(SGSTAmt);
    }
    if (document.getElementById('IGSTCheck').checked) {
        document.getElementById('CGSTCheck').checked =false;            
        document.getElementById('SGSTCheck').checked= false;
        document.getElementById('cgstCheckBoxCheck').style.display= 'none';
        document.getElementById('sgstCheckBoxCheck').style.display= 'none';
        document.getElementById('CGSTDivision').style.display= 'none';
        document.getElementById('SGSTDivision').style.display= 'none';
        totalTaxAmount += parseFloat(IGSTAmt);
    }
    //
     if (document.getElementById('HallmarkTaxCheck').checked) {
         document.getElementById('HallmarkChrgTaxDivision').style.display= 'block';
        document.getElementById('hallMarkcgst').style.display= '';
        document.getElementById('hallMarksgst').style.display= '';
        document.getElementById('hallMarkigst').style.display= '';
    }
    //
    if (document.getElementById('CommTaxCheck').checked) {
        totalTaxAmount += parseFloat(taxAmt);
    }

//    if (document.getElementById('CommTcsTaxCheck').checked) {
//    
//        var tcsTaxTolAmt = document.getElementById('tcstaxOnTotAmt').value = 0;
//        
//        var tcsTaxTolAmt = parseFloat(parseFloat(finalTotalAmnt) + parseFloat(totalTaxAmount)).toFixed(2);  
//              
//        document.getElementById('tcstaxOnTotAmt').value = parseFloat(tcsTaxTolAmt).toFixed(2);   
//        
//        var tcsper = parseFloat(document.getElementById('tcsslPrTax').value).toFixed(2);
//        var tcsslPrTaxAmt = parseFloat(document.getElementById('tcsslPrTaxAmt').value).toFixed(2);
//        var totalFinalAmtDisp = parseFloat(document.getElementById('slPrPayFinAmtBalDisp').value).toFixed(2);
//        
//        if (tcsper == '') {
//            tcsper = 0;  
//        }
//        
//        if (tcsper != null && tcsper != 'NaN') {
//            
//        document.getElementById('tcsslPrTaxAmt').value = parseFloat((parseFloat(tcsTaxTolAmt) / 100) * parseFloat(tcsper)).toFixed(2);   
//        
//        document.getElementById('tcsslPrPayTaxAmtDisp').value = parseFloat((parseFloat(tcsTaxTolAmt) / 100) * parseFloat(tcsper)).toFixed(2);
//        
//        //totalFinalAmt=(parseFloat(totalFinalAmt)+((parseFloat(tcsTaxTolAmt)/100)*parseFloat(tcsper)));
//        
//        totalTaxAmount += parseFloat((parseFloat(tcsTaxTolAmt) / 100) * parseFloat(tcsper)).toFixed(2);
//        
//        //totalFinalAmtDisp=(parseFloat(totalFinalAmtDisp)+((parseFloat(tcsTaxTolAmt)/100)*parseFloat(tcsper)));
//        
//        }
//    }

    //alert('totalTaxAmount == ' + totalTaxAmount);

    // START CODE FOR DISCOUNT APPLY BEFORE GST TAX @PRIYANKA-06MAR18
    if (document.getElementById('utin_discount_per_discup').value != '' &&
        document.getElementById('utin_discount_amt_discup').value != '') {

        // alert('PayTotCashAmtDisp ***==' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);
        // alert('totalTaxAmount ***==' + totalTaxAmount);
        // alert('PayTotAmtExchangeDisp ***==' + document.getElementById(prefix + 'PayTotAmtExchangeDisp').value);
        
        //alert('finalTotalAmnt == ' + finalTotalAmnt);
        //alert('PayTotCashAmt #=# ' + document.getElementById(prefix + 'PayTotCashAmt').value);
        
        //if (document.getElementById('paymentMode').value != 'RateCut') { //TOTAL AMOUNT-PRIYANKA-19MAR18 


        if (document.getElementById("payPanelName").value == 'SellPayUp' ||
                document.getElementById("payPanelName").value == 'ItemRepairPayUp' ||
                document.getElementById("payPanelName").value == 'PurchaseReturnPayUp' ||
                document.getElementById("payPanelName").value == 'ApprovalPayUp' ||
                document.getElementById("payPanelName").value == 'RawPayUp' ||
                document.getElementById("payPanelName").value == 'StockPayUp' ||
                document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
                document.getElementById("payPanelName").value == 'SuppOrderUp' ||
                document.getElementById("payPanelName").value == 'CustSellPayUp' ||
                document.getElementById("payPanelName").value == 'NwOrPayUp' ||
                document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
                document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
                document.getElementById("payPanelName").value == 'SuppOrderDeliveryUp') {
            //
            //
            // ADDED CODE FOR UNREGISTERED PURCHASE FUNCTIONALITY @PRIYANKA-12JULY2022
            if (document.getElementById('UnregisteredPurchaseTaxCheck').checked) {
                document.getElementById(prefix + 'PayTotCashAmtDisp').value = (((parseFloat(finalTotalAmnt)))).toFixed(2);
                document.getElementById(prefix + 'PayTotCashAmt').value = (((parseFloat(finalTotalAmnt)))).toFixed(2);
            } else {
                //
                document.getElementById(prefix + 'PayTotCashAmtDisp').value = (((parseFloat(finalTotalAmnt) + parseFloat(totalTaxAmount)))).toFixed(2);
                document.getElementById(prefix + 'PayTotCashAmt').value = (((parseFloat(finalTotalAmnt) + parseFloat(totalTaxAmount)))).toFixed(2);
            }
            //
        } else {
            //
            // CHANGE FOR METAL EXCHANGE @PRIYANKA-30APR18
            if (document.getElementById('utin_metal_exchange_chk').checked) {
                //
                //
                // ADDED CODE FOR UNREGISTERED PURCHASE FUNCTIONALITY @PRIYANKA-12JULY2022
                if (document.getElementById('UnregisteredPurchaseTaxCheck').checked) {
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = (((parseFloat(finalTotalAmnt) + parseFloat(document.getElementById(prefix + 'PayTotAmtExchangeDisp').value)))).toFixed(2);
                    document.getElementById(prefix + 'PayTotCashAmt').value = (((parseFloat(finalTotalAmnt) + parseFloat(document.getElementById(prefix + 'PayTotAmtExchangeDisp').value)))).toFixed(2);
                } else {
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = (((parseFloat(finalTotalAmnt) + parseFloat(totalTaxAmount) + parseFloat(document.getElementById(prefix + 'PayTotAmtExchangeDisp').value)))).toFixed(2);
                    document.getElementById(prefix + 'PayTotCashAmt').value = (((parseFloat(finalTotalAmnt) + parseFloat(totalTaxAmount) + parseFloat(document.getElementById(prefix + 'PayTotAmtExchangeDisp').value)))).toFixed(2);
                }
                //
            } else {
                //
                //
                // ADDED CODE FOR UNREGISTERED PURCHASE FUNCTIONALITY @PRIYANKA-12JULY2022
                if (document.getElementById('UnregisteredPurchaseTaxCheck').checked) {
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = (parseFloat(finalTotalAmnt)).toFixed(2);
                    document.getElementById(prefix + 'PayTotCashAmt').value = (parseFloat(finalTotalAmnt)).toFixed(2);
                } else {
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = (parseFloat(finalTotalAmnt) + parseFloat(totalTaxAmount)).toFixed(2);
                    document.getElementById(prefix + 'PayTotCashAmt').value = (parseFloat(finalTotalAmnt) + parseFloat(totalTaxAmount)).toFixed(2);
                }
                //
            }
        }

        //} else {
        //document.getElementById(prefix + 'PayTotCashAmtDisp').value = ((parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value) + parseFloat(totalTaxAmount))).toFixed(2);
        //document.getElementById(prefix + 'PayTotCashAmt').value = ((parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(totalTaxAmount))).toFixed(2);  
        //}

        //alert('PayTotCashAmt #=# ' + document.getElementById(prefix + 'PayTotCashAmt').value);

    } else {
        //
        //
        if (document.getElementById('paymentMode').value != 'RateCut') { //TOTAL AMOUNT-PRIYANKA-19MAR18 
            //
            // 
            // CHANGE FOR METAL EXCHANGE @PRIYANKA-30APR18
            if (document.getElementById('utin_metal_exchange_chk').checked) {
                //
                //
                // ADDED CODE FOR UNREGISTERED PURCHASE FUNCTIONALITY @PRIYANKA-12JULY2022
                if (document.getElementById('UnregisteredPurchaseTaxCheck').checked) {
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = (((parseFloat(finalTotalAmnt) + parseFloat(document.getElementById(prefix + 'PayTotAmtExchangeDisp').value)))).toFixed(2);
                    document.getElementById(prefix + 'PayTotCashAmt').value = (((parseFloat(finalTotalAmnt) + parseFloat(document.getElementById(prefix + 'PayTotAmtExchangeDisp').value)))).toFixed(2);
                } else {
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = (((parseFloat(finalTotalAmnt) + parseFloat(totalTaxAmount) + parseFloat(document.getElementById(prefix + 'PayTotAmtExchangeDisp').value)))).toFixed(2);
                    document.getElementById(prefix + 'PayTotCashAmt').value = (((parseFloat(finalTotalAmnt) + parseFloat(totalTaxAmount) + parseFloat(document.getElementById(prefix + 'PayTotAmtExchangeDisp').value)))).toFixed(2);
                }
                //
            } else {
                //
                //
                // ADDED CODE FOR UNREGISTERED PURCHASE FUNCTIONALITY @PRIYANKA-12JULY2022
                if (document.getElementById('UnregisteredPurchaseTaxCheck').checked) {
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = ((parseFloat(finalTotalAmnt))).toFixed(2);
                    document.getElementById(prefix + 'PayTotCashAmt').value = ((parseFloat(finalTotalAmnt))).toFixed(2);
                } else {
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = ((parseFloat(finalTotalAmnt) + parseFloat(totalTaxAmount))).toFixed(2);
                    document.getElementById(prefix + 'PayTotCashAmt').value = ((parseFloat(finalTotalAmnt) + parseFloat(totalTaxAmount))).toFixed(2);
                }
                //
            }
            //
        } else {
            //
            //
            // ADDED CODE FOR UNREGISTERED PURCHASE FUNCTIONALITY @PRIYANKA-12JULY2022
            if (document.getElementById('UnregisteredPurchaseTaxCheck').checked) {
                document.getElementById(prefix + 'PayTotCashAmtDisp').value = (((parseFloat(finalTotalAmnt)))).toFixed(2);
                document.getElementById(prefix + 'PayTotCashAmt').value = (((parseFloat(finalTotalAmnt)))).toFixed(2);
            } else {
                document.getElementById(prefix + 'PayTotCashAmtDisp').value = (((parseFloat(finalTotalAmnt) + parseFloat(totalTaxAmount)))).toFixed(2);
                document.getElementById(prefix + 'PayTotCashAmt').value = (((parseFloat(finalTotalAmnt) + parseFloat(totalTaxAmount)))).toFixed(2);
            }
            //
        }
    }
    // END CODE FOR DISCOUNT APPLY BEFORE GST TAX @PRIYANKA-06MAR18

    //alert('PayableCashCRDR ==^^ ' + document.getElementById(prefix + 'PayableCashCRDR').value); 

    //alert('PayTotCashAmt ###==' + document.getElementById(prefix + 'PayTotCashAmt').value);

//}
//

    //alert('TransCRDR @@1@==' + document.getElementById(prefix + 'TransCRDR').value);
    //alert('FinalCashCRDR @@1@==' + document.getElementById(prefix + 'FinalCashCRDR').value);
    //alert('PayableCashCRDR @@1@==' + document.getElementById(prefix + 'PayableCashCRDR').value);
    //alert('PayPrevCashBalCRDR @@1@==' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);


    //alert('PayTotCashAmtDisp == ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);

    //alert('PayTotCashAmtDisp 1== ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);

//if (document.getElementById('mainPanelName').value != 'udhaar') {
    calcByCashTotalPayableAmount(prefix);
//}

    //alert('PayTotCashAmtDisp 2== ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);

    //alert('PayTotCashAmt ###@@@==' + document.getElementById(prefix + 'PayTotCashAmt').value);

    //alert('PayableCashCRDR ==$$ ' + document.getElementById(prefix + 'PayableCashCRDR').value); 

    //alert('PayFinAmtBalDisp == ' + document.getElementById(prefix + 'PayFinAmtBalDisp').value);

    //alert('TransCRDR @@2@==' + document.getElementById(prefix + 'TransCRDR').value);
    //alert('FinalCashCRDR @@2@==' + document.getElementById(prefix + 'FinalCashCRDR').value);
    //alert('PayableCashCRDR @@2@==' + document.getElementById(prefix + 'PayableCashCRDR').value);
    //alert('PayPrevCashBalCRDR @@2@==' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);

    if (document.getElementById('paymentMode').value == 'ByCash') {
        // 
        // ADDED CODE FOR PREVIOUS AMT CHECK ON AMOUNT NOT ADDED IN TOTAL AMOUNT CASE => DISCOUNT UP @PRIYANKA-28JULY2022            
        if (document.getElementById('utin_discount_per_discup').value != '' &&
            document.getElementById('utin_discount_amt_discup').value != '') {
            //
            //
            //alert('PayPrevCashBalCRDR @1@==' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);
            //alert('PayableCashCRDR @1@==' + document.getElementById(prefix + 'PayableCashCRDR').value);
            //
            //
            if ((document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR' &&
                 document.getElementById(prefix + 'PayableCashCRDR').value == 'DR') ||
                (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR' &&
                 document.getElementById(prefix + 'TransCRDR').value == 'CR')) {
                //
                // Added Code For Update Sell Product Issue (Settled Entry - Cash Balance Showing Issue) @AUTHOR:PRIYANKA-11JULY2023
                var PayPrevAmtDispNew1 = document.getElementById(prefix + 'PayPrevAmtDisp').value;
                //
                if (typeof (PayPrevAmtDispNew1) != 'undefined' && PayPrevAmtDispNew1 != null) {
                            PayPrevAmtDispNew1 = PayPrevAmtDispNew1.replace(/\,/g, '');
                }
                //
                if(document.getElementById('payPanelName').value=='SlPrPayment' || document.getElementById('payPanelName').value=='SellPayUp')
                {
                    if (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR' && document.getElementById('utin_discount_amt_discup').value != '') {
                        document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs( parseFloat(PayPrevAmtDispNew1) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) ).toFixed(2);
                        document.getElementById(prefix + 'PayTotCashAmt').value = Math.abs( parseFloat(PayPrevAmtDispNew1) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) ).toFixed(2);                     
                    } else if (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR' && document.getElementById('utin_discount_amt_discup').value != '') {
                        document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs( parseFloat(PayPrevAmtDispNew1) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) ).toFixed(2);
                        document.getElementById(prefix + 'PayTotCashAmt').value = Math.abs( parseFloat(PayPrevAmtDispNew1) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) ).toFixed(2);
                    } else {
                        document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs(parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(PayPrevAmtDispNew1)).toFixed(2);
                        document.getElementById(prefix + 'PayTotCashAmt').value = Math.abs(parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(PayPrevAmtDispNew1)).toFixed(2); 
                    }
                }else{
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs(parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(PayPrevAmtDispNew1)).toFixed(2);
                    document.getElementById(prefix + 'PayTotCashAmt').value = Math.abs(parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(PayPrevAmtDispNew1)).toFixed(2);
                }
                 //
                //alert('PayTotCashAmt @1@==' + document.getElementById(prefix + 'PayTotCashAmt').value);
                //alert('PayTotCashAmtDisp @1@==' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);   
                //
            } else if ((document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR' &&
                        document.getElementById(prefix + 'PayableCashCRDR').value == 'CR') ||
                       (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR' &&
                        document.getElementById(prefix + 'TransCRDR').value == 'DR')) {
                //
                var totAmt = 0;
                //
                //
                //alert('PayPrevAmtDisp @@==' + document.getElementById(prefix + 'PayPrevAmtDisp').value);
                //alert('PayTotCashAmt @@==' + document.getElementById(prefix + 'PayTotCashAmt').value);
                //
                //
                // Added Code For Update Sell Product Issue (Settled Entry - Cash Balance Showing Issue) @AUTHOR:PRIYANKA-11JULY2023
                var PayPrevAmtDispNew = document.getElementById(prefix + 'PayPrevAmtDisp').value;
                //
                if (typeof (PayPrevAmtDispNew) != 'undefined' && PayPrevAmtDispNew != null) {
                            PayPrevAmtDispNew = PayPrevAmtDispNew.replace(/\,/g, '');
                }
                //
                //document.getElementById(prefix + 'PayPrevAmtDisp').value = parseFloat(PayPrevAmtDispNew).toFixed(2);
                //
                //alert('PayPrevAmtDispNew @@==' + PayPrevAmtDispNew);
                //
                if (document.getElementById(prefix + 'PayTotCashAmt').value == 0 || document.getElementById(prefix + 'PayTotCashAmt').value == '0.00')
                    totAmt = parseFloat(PayPrevAmtDispNew).toFixed(2);
                else {
                    if (document.getElementById(prefix + 'PayableCashCRDR').value == 'CR' && document.getElementById('utin_discount_amt_discup').value != '' && (document.getElementById('payPanelName').value=='SlPrPayment' || document.getElementById('payPanelName').value=='SellPayUp')) {
                        totAmt = (parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(PayPrevAmtDispNew)).toFixed(2);
                    } else {
                        totAmt = (parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(PayPrevAmtDispNew)).toFixed(2);
                    }
                } 
                //
                //alert('totAmt @@==' + totAmt);
                //
                if (totAmt < 0) {
                    document.getElementById(prefix + 'TransCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                    document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                    document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                }
                //
                //
                document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.abs(parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(PayPrevAmtDispNew)).toFixed(2);
                document.getElementById(prefix + 'PayTotCashAmt').value = Math.abs(parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(PayPrevAmtDispNew)).toFixed(2);
                //
                //
                //alert('PayTotCashAmtDisp @2@==' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);
                //alert('PayTotCashAmt @2@==' + document.getElementById(prefix + 'PayTotCashAmt').value);
                //alert('PayableCashCRDR @2@==' + document.getElementById(prefix + 'PayableCashCRDR').value);
                //
                //
            }
            //
            //alert('PayTotCashAmtDisp @@==' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);
            //alert('PayTotCashAmt @@==' + document.getElementById(prefix + 'PayTotCashAmt').value);
            //
        }
    }

    // ONLY FOR XRF ENTRIES @PRIYANKA-28NOV18
    if (document.getElementById("payPanelName").value == 'XRF_PAYMENT' &&
       (document.getElementById(prefix + 'PayCashAmtRec').value == null ||
        document.getElementById(prefix + 'PayCashAmtRec').value == '')) {
        document.getElementById(prefix + 'PayCashAmtRec').value = Math.round(parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value));
        totalCashNdChequeAmt = Math.round(parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value));
    }
    //
    if (totalCashNdChequeAmt == '' || isNaN(totalCashNdChequeAmt)) {
        totalCashNdChequeAmt = 0;
    }
    //
    if (totalCardAmt == '' || isNaN(totalCardAmt)) {
        totalCardAmt = 0;
    }
    //
    if (totalOnlinePayAmt == '' || isNaN(totalOnlinePayAmt)) {
        totalOnlinePayAmt = 0;
    }
    //
    document.getElementById(prefix + 'PayCashRecDisp').value = (parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)).toFixed(2);


    if (prefix == 'order')
        document.getElementById('netPay').value = (parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value) - parseFloat(document.getElementById('preOrdRecAmt').value)).toFixed(2);

    //alert('PayableCashCRDR ##== ' + document.getElementById(prefix + 'PayableCashCRDR').value);  

    //alert('finalCashBal @@==' + finalCashBal);

    finalCashBal = calcTotalFinalAmount(prefix, totalCashNdChequeAmt, totalCardAmt, totalOnlinePayAmt, totalDiscount);

    //alert('PayableCashCRDR ++== ' + document.getElementById(prefix + 'PayableCashCRDR').value);

    //alert('finalCashBal ##==' + finalCashBal);

    //alert('PayFinAmtBalDisp @#== ' + document.getElementById(prefix + 'PayFinAmtBalDisp').value);


    /* START CODE TO ADD CONDITION FOR SHOWING FINAL AMT LABEL ACCORDING TO FINAL AMT CR/DR @AUTHOR:MADHUREE-29JUNE2020 */
    if (document.getElementById(prefix + 'FinalCashCRDR').value == 'CR') {
        finBalLabel = 'FINAL CASH DEPOSIT :';
    } else {
        finBalLabel = 'FINAL CASH BALANCE :';
    }
    /* END CODE TO ADD CONDITION FOR SHOWING FINAL AMT LABEL ACCORDING TO FINAL AMT CR/DR @AUTHOR:MADHUREE-29JUNE2020 */



    if ((finalCashBal <= 0) &&
            (document.getElementById("payPanelName").value == 'SlPrPayment' ||
                    document.getElementById("payPanelName").value == 'SellPayUp')) {

        finBalLabel = 'FINAL CASH DEPOSIT :';

        //document.getElementById("amountPaidReceiveOption").disabled = false;    //Payment Panel Account Otption Hidden Commit Code @Author:vinod15May2023

        // ADDED CODE FOR UDHAAR WITH INTEREST OPTION @PRIYANKA-13JULY2022
        if (typeof (document.getElementById('udhaarROIDiv') != 'undefined') && document.getElementById('udhaarROIDiv') != null) {
            document.getElementById('udhaarROIDiv').style.display = "none";
            document.getElementById('udhaarInterestTypeDiv').style.display = "none";
        }
        // ADDED CODE FOR UDHAAR WITH INTEREST - ROI @PRIYANKA-14JULY2022
        //if (typeof (document.getElementById('selROIValue')) != 'undefined' &&
        //           (document.getElementById('selROIValue') != null)) {
        //            document.getElementById('selROIValue').value = "";
        //}

        // ADDED CODE FOR UDHAAR WITH INTEREST TYPE @PRIYANKA-14JULY2022
        //if (typeof (document.getElementById('utin_udhaar_int_type')) != 'undefined' &&
        //           (document.getElementById('utin_udhaar_int_type') != null)) {
        //            document.getElementById('utin_udhaar_int_type').value = "";
        //}

        // ADDED CODE FOR UDHAAR WITH INTEREST CHECK @PRIYANKA-14JULY2022
        //if (typeof (document.getElementById('utin_udhaar_int_chk')) != 'undefined' &&
        //           (document.getElementById('utin_udhaar_int_chk') != null)) {
        //            document.getElementById('utin_udhaar_int_chk').value = "";
        //}


    } else if ((finalCashBal > 0) &&
            (document.getElementById("payPanelName").value == 'SlPrPayment' ||
                    document.getElementById("payPanelName").value == 'SellPayUp')) {

        //document.getElementById("amountPaidReceiveOption").value = 'amountReceived';
        //document.getElementById("amountPaidReceiveOption").disabled = true;          //Payment Panel Account Otption Hidden Commit Code @Author:vinod15May2023

        //document.getElementById("udhaarROIDiv").style.visibility = "visible";
        //document.getElementById("udhaarInterestTypeDiv").style.visibility = "visible";

        // ADDED CODE FOR UDHAAR WITH INTEREST OPTION @PRIYANKA-13JULY2022
        if (typeof (document.getElementById('udhaarROIDiv') != 'undefined') && document.getElementById('udhaarROIDiv') != null) {
            document.getElementById('udhaarROIDiv').style.display = "block";
            document.getElementById('udhaarInterestTypeDiv').style.display = "block";
        }

        //if (typeof (document.getElementById('utin_udhaar_int_type')) != 'undefined' &&
        //           (document.getElementById('utin_udhaar_int_type') != null)) {
        //            document.getElementById('utin_udhaar_int_type').value = "Monthly";
        //}


    } else if (finalCashBal <= 0) {

        finBalLabel = 'FINAL CASH DEPOSIT :';

        // ADDED CODE FOR UDHAAR WITH INTEREST OPTION @PRIYANKA-13JULY2022
        if (typeof (document.getElementById('udhaarROIDiv') != 'undefined') && document.getElementById('udhaarROIDiv') != null) {
            document.getElementById('udhaarROIDiv').style.display = "none";
            document.getElementById('udhaarInterestTypeDiv').style.display = "none";
        }
        // ADDED CODE FOR UDHAAR WITH INTEREST - ROI @PRIYANKA-14JULY2022
        //if (typeof (document.getElementById('selROIValue')) != 'undefined' &&
        //           (document.getElementById('selROIValue') != null)) {
        //            document.getElementById('selROIValue').value = "";
        //}

        // ADDED CODE FOR UDHAAR WITH INTEREST TYPE @PRIYANKA-14JULY2022
        //if (typeof (document.getElementById('utin_udhaar_int_type')) != 'undefined' &&
        //           (document.getElementById('utin_udhaar_int_type') != null)) {
        //            document.getElementById('utin_udhaar_int_type').value = "";
        //}

        // ADDED CODE FOR UDHAAR WITH INTEREST CHECK @PRIYANKA-14JULY2022
        //if (typeof (document.getElementById('utin_udhaar_int_chk')) != 'undefined' &&
        //           (document.getElementById('utin_udhaar_int_chk') != null)) {
        //            document.getElementById('utin_udhaar_int_chk').value = "";
        //}


    }



    if (document.getElementById('lpRedeem').value > 0) {
        finalCashBal = (parseFloat(finalCashBal) - parseFloat(document.getElementById('lpRedeemDisp').value)).toFixed(2);
    }
    //
    //
    //alert(document.getElementById("amountPaidReceiveOption").value);
    //
    //
    if (document.getElementById("amountPaidReceiveOption").value == 'amountPaid') {
        document.getElementById('amountReceivedLabel').innerHTML = 'AMOUNT PAID : ';
    } else {
        document.getElementById('amountReceivedLabel').innerHTML = 'AMOUNT RECEIVED : ';
    }
    //
    //alert('finalCashBal == ' + finalCashBal);
    //
    var globalRoundOffJs = document.getElementById('globalRoundOffJs').value;
    //
    var roundOffAmt = 0;
    var rndOffAmt = 0;
    
    if (globalRoundOffJs == 'YES') {        
        roundOffAmt = parseFloat(finalCashBal % 1).toFixed(2);        
    } else {        
        roundOffAmt = 0;        
    }
    
    if (roundOffAmt > 0) {        
        rndOffAmt = parseFloat(1 - roundOffAmt).toFixed(2);              
    }
    
    var roundOffAmtMain = 0;
    
    if (roundOffAmt == '-0.50') {
        roundOffAmtMain = roundOffAmt;
        roundOffAmt = Math.abs(parseFloat(roundOffAmt)).toFixed(2);
    }
    
//    if (roundOff(finalCashBal) > 0) {
//        
//        roundOffAmt = roundOff(finalCashBal);
//        
//        var rndOffAmt = (1 - roundOffAmt);
//        
//        //document.getElementById(prefix + 'PayRoundOffDisp').value = rndOffAmt.toFixed(2);
//        //document.getElementById(prefix + 'PayRoundOffAmt').value = roundOffAmt;
//        
//    }    

    //alert('roundOffAmt =@1@= ' + roundOffAmt);
    //alert('rndOffAmt =@1@= ' + rndOffAmt);
    //alert('roundOffAmtMain =@1@= ' + roundOffAmtMain);
    //alert('finalCashBal =@1@= ' + finalCashBal);
            
    if (globalRoundOffJs == 'YES') {
        
        if (roundOffAmtMain == '-0.50') {
            document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.round(Math.abs(parseFloat(Math.abs(finalCashBal)) - parseFloat(roundOffAmt))).toFixed(2);
        } else {
            
            if (roundOffAmt > 0.50) {
                document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.round(Math.abs(parseFloat(finalCashBal))).toFixed(2);
            } else {
                document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.round(Math.abs(parseFloat(finalCashBal) - parseFloat(roundOffAmt))).toFixed(2);
            }
        
        }
        
    } else {
        document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math_round(Math.abs(finalCashBal - roundOffAmt)).toFixed(2);
    }
 
    //document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math_round(Math.abs(finalCashBal - roundOffAmt)).toFixed(2);
    
    //alert('roundOffAmt =@2@= ' + roundOffAmt);
    //alert('finalCashBal =@2@= ' + finalCashBal);

    //alert('PayFinAmtBalDisp == ' + document.getElementById(prefix + 'PayFinAmtBalDisp').value);

    document.getElementById('finCashBalTd').innerHTML = finBalLabel;

    if (globalRoundOffJs == 'YES') {
        if (roundOffAmtMain == '-0.50') {
            document.getElementById(prefix + 'PayTotAmtBal').value = Math.round(Math.abs(parseFloat(Math.abs(finalCashBal)) - parseFloat(roundOffAmt))).toFixed(2);
        } else {
            document.getElementById(prefix + 'PayTotAmtBal').value = Math.round(Math.abs(parseFloat(finalCashBal) - parseFloat(roundOffAmt))).toFixed(2);
        }
    } else {
        document.getElementById(prefix + 'PayTotAmtBal').value = Math_round(Math.abs(finalCashBal - roundOffAmt)).toFixed(2);
    }

    //document.getElementById(prefix + 'PayTotAmtBal').value = Math_round(Math.abs(finalCashBal - roundOffAmt)).toFixed(2);

    // START CODE FOR ROUND OFF TOTAL AMT ON PAYMENT PANEL @PRIYANKA-18-SEP-17
    var TotalAmount = parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value);
    var roundOffAmount = 0;
    var rndOff = 0.5;
    //
    if ((TotalAmount % 1).toFixed(2) > 0) {

        roundOffAmount = parseFloat(TotalAmount % 1).toFixed(2);

        if (roundOffAmount >= rndOff) {
            
            var rndOffAmount = parseFloat(1 - roundOffAmount);

            //document.getElementById(prefix + 'PayRoundOffDisplay').value = '+ ' + rndOffAmount.toFixed(2);

            // START CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-19JUNE18
//            if (typeof (document.getElementById(prefix + 'PayRoundOffDisplay')) != 'undefined' &&
//                       (document.getElementById(prefix + 'PayRoundOffDisplay') != null)) {
//                        document.getElementById(prefix + 'PayRoundOffDisplay').value = '+ ' + rndOffAmount.toFixed(2);
//            }
            // END CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-19JUNE18
            
            //var globalRoundOffJs = document.getElementById('globalRoundOffJs').value;
            
//            alert('globalRoundOffJs == ' + globalRoundOffJs);
            
            //alert('PayFinAmtBalDisp =1= ' + document.getElementById(prefix + 'PayFinAmtBalDisp').value);
            //alert('finalCashBal =1= ' + finalCashBal);
            
            //alert('finalCashBal =1= ' + finalCashBal);
            
            if (globalRoundOffJs == 'YES') {
                
                document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.round(parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value)).toFixed(2);
                
                if (roundOffAmtMain == '-0.50') {
                    
                    document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.round(parseFloat(finalCashBal)).toFixed(2);
                    document.getElementById(prefix + 'PayTotAmtBal').value = Math.round(parseFloat(Math.abs(finalCashBal)) - parseFloat(roundOffAmt)).toFixed(2);
                } else {
                    if (roundOffAmt > 0.50) {
                        document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.round(parseFloat(finalCashBal)).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtBal').value = Math.round(parseFloat(finalCashBal)).toFixed(2);
                    }else if (roundOffAmt == 0.50) {
                        document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.round(parseFloat(finalCashBal)).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtBal').value = Math.round(parseFloat(finalCashBal) + parseFloat(roundOffAmt)).toFixed(2);
                    } else {
                        document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.round(parseFloat(finalCashBal)).toFixed(2);
                        document.getElementById(prefix + 'PayTotAmtBal').value = Math.round(parseFloat(finalCashBal) - parseFloat(roundOffAmt)).toFixed(2);
                    }
                }
                
            } else {
                document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math_round(parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value)).toFixed(2);
                document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math_round(parseFloat(finalCashBal)).toFixed(2);
                document.getElementById(prefix + 'PayTotAmtBal').value = Math_round(Math.abs(parseFloat(finalCashBal))).toFixed(2);
            }

            //document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math_round(parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value)).toFixed(2);
            //document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math_round(Math.abs(finalCashBal)).toFixed(2);
            //document.getElementById(prefix + 'PayTotAmtBal').value = Math_round(Math.abs(finalCashBal)).toFixed(2);
                        
            //alert('PayTotCashAmtDisp 1== ' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);

        } else {

            //document.getElementById(prefix + 'PayRoundOffDisplay').value = '- ' + parseFloat(roundOffAmount).toFixed(2);

            // START CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-19JUNE18
//            if (typeof (document.getElementById(prefix + 'PayRoundOffDisplay')) != 'undefined' &&
//                       (document.getElementById(prefix + 'PayRoundOffDisplay') != null)) {
//                        document.getElementById(prefix + 'PayRoundOffDisplay').value = '- ' + parseFloat(roundOffAmount).toFixed(2);
//            }
            // END CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-19JUNE18

            //var globalRoundOffJs = document.getElementById('globalRoundOffJs').value;
            
            //alert('PayFinAmtBalDisp =2= ' + document.getElementById(prefix + 'PayFinAmtBalDisp').value);
            //alert('finalCashBal =2= ' + finalCashBal);
            
            if (globalRoundOffJs == 'YES') {
                document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math.round(parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value)).toFixed(2);
                document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math.round(parseFloat(finalCashBal)).toFixed(2);
                document.getElementById(prefix + 'PayTotAmtBal').value = Math.round((parseFloat(document.getElementById(prefix + 'PayTotAmtBal').value))).toFixed(2);
            } else {
                document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math_round(parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value)).toFixed(2);
                document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math_round(parseFloat(finalCashBal)).toFixed(2);
                document.getElementById(prefix + 'PayTotAmtBal').value = Math_round((parseFloat(document.getElementById(prefix + 'PayTotAmtBal').value))).toFixed(2);
            }

            //document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math_round(parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value)).toFixed(2);
            //document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math_round(Math.abs(finalCashBal)).toFixed(2);
            //document.getElementById(prefix +7 'PayTotAmtBal').value = Math_round((parseFloat(document.getElementById(prefix + 'PayTotAmtBal').value))).toFixed(2);

            //alert('PayFinAmtBalDisp 2== ' + document.getElementById(prefix + 'PayFinAmtBalDisp').value);

        }

    } else if ((TotalAmount % 1).toFixed(2) == 0 || (TotalAmount % 1).toFixed(2) == '0.00') {

        //document.getElementById(prefix + 'PayRoundOffDisplay').value = roundOffAmount.toFixed(2);

        // START CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-19JUNE18
//        if (typeof (document.getElementById(prefix + 'PayRoundOffDisplay')) != 'undefined' &&
//                   (document.getElementById(prefix + 'PayRoundOffDisplay') != null)) {
//                    document.getElementById(prefix + 'PayRoundOffDisplay').value = roundOffAmount.toFixed(2);
//        }
        // END CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-19JUNE18

        // START CODE FOR ROUND OFF TOTAL AMT STORE IN DATABASE @PRIYANKA-05MAR18
//        document.getElementById(prefix + 'PayRoundOffDisp').value = roundOffAmount.toFixed(2);
//        document.getElementById(prefix + 'PayRoundOffAmt').value = roundOffAmount.toFixed(2);
        // END CODE FOR ROUND OFF TOTAL AMT STORE IN DATABASE @PRIYANKA-05MAR18
        
        //alert('3:' + document.getElementById(prefix + 'PayFinAmtBalDisp').value);
    }
    // END CODE FOR ROUND OFF TOTAL AMT ON PAYMENT PANEL @PRIYANKA-18-SEP-17

    //alert('PayFinAmtBalDisp == ' + document.getElementById(prefix + 'PayFinAmtBalDisp').value);

    //START CODE TO NULL ID FOR BY CASH PAYMENT MODE : AUTHOR @ DARSHANA 1 SEPT 2021
    if (document.getElementById('paymentMode').value == 'ByCash') {
        //FOR GOLD
        if ((typeof (document.getElementById(prefix + 'GoldWtFinBal') != 'undefined')) && (document.getElementById(prefix + 'GoldWtFinBal') != null)) {
            document.getElementById(prefix + 'GoldWtFinBal').value = 0;
        }
        if ((typeof (document.getElementById('PayMetal1Bal1') != 'undefined')) && (document.getElementById('PayMetal1Bal1') != null)) {
            document.getElementById('PayMetal1Bal1').value = 0;
        }
        if ((typeof (document.getElementById('PayMetal1Bal1') != 'undefined')) && (document.getElementById('PayMetal1Bal1') != null)) {
            document.getElementById('PayMetal1Bal1').value = 0;
        }
        //FOR SILVER
        if ((typeof (document.getElementById(prefix + 'SilverWtFinBal') != 'undefined')) && (document.getElementById(prefix + 'SilverWtFinBal') != null)) {
            document.getElementById(prefix + 'SilverWtFinBal').value = 0;
        }
        //FOR CRYSTAL
        if ((typeof (document.getElementById(prefix + 'CrystalWtFinBal') != 'undefined')) && (document.getElementById(prefix + 'CrystalWtFinBal') != null)) {
            document.getElementById(prefix + 'CrystalWtFinBal').value = 0;
        }
    }
    //END CODE TO NULL ID FOR BY CASH PAYMENT MODE : AUTHOR @ DARSHANA 1 SEPT 2021
    document.getElementById(prefix + 'PayCashOthChgsDisp').value = Math.abs(document.getElementById(prefix + 'PayCashOthChgsDisp').value).toFixed(2);
    //
    //
//    if (document.getElementById('utin_pay_with_paytm_chk').checked) {
//        document.getElementById('paytmPayment').style.display = 'block';
//        document.getElementById('onlinePayment').style.display = 'none';
//        document.getElementById('paytmSubmitBtn').style.display = 'block';
//        document.getElementById('paySubButtDiv').style.display = 'none';
//    } 

}
//
function calcByCashTotalPayableAmount(prefix) {

    var totalAmount = 0;

    //alert('PayPrevCashBalCRDR **== ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);
    //alert('TransCRDR **== ' + document.getElementById(prefix + 'TransCRDR').value);  
    //alert('PayableCashCRDR 1== ' + document.getElementById(prefix + 'PayableCashCRDR').value);
    //alert('PayableCashCRDR **== ' + document.getElementById(prefix + 'PayableCashCRDR').value);

    if ((document.getElementById(prefix + 'PayPrevCashBalCRDR').value == '') &&
            (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
                    document.getElementById('PaymentReceiptPanel').value == 'PAYMENT')) {

        document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById('PrevCashBalCRDR').value;

    } else if (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == '') {

        document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
    }

    //alert('PayableCashCRDR 2== ' + document.getElementById(prefix + 'PayableCashCRDR').value);
    //alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);
    //alert('PayPrevCashBalCRDR == ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);

    if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
            document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR') ||
            (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                    document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR')) {

        //alert('PayableCashCRDR == ' + document.getElementById(prefix + 'PayableCashCRDR').value);

        totalAmount = parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value);

        // CHANGE CODE FOR SILVER CASE CR/DR AFTER RATE CUT @PRIYANKA-03MAY18
        if ((document.getElementById('paymentMode').value == 'RateCut') &&
                (document.getElementById(prefix + 'GoldRtCtWtBal').value > 0 ||
                        document.getElementById(prefix + 'SilverRtCtWtBal').value > 0)) {

            if ((document.getElementById(prefix + 'PayPrevCashBalCRDR').value != document.getElementById(prefix + 'FinalGdCRDR').value) ||
                    (document.getElementById(prefix + 'PayPrevCashBalCRDR').value != document.getElementById(prefix + 'FinalSlCRDR').value)) {

                // START @PRIYANKA-07APR18
                var GdSlValuation = parseFloat(parseFloat(document.getElementById(prefix + 'GoldValuation').value)
                        + parseFloat(document.getElementById(prefix + 'SilverValuation').value));

                var PrevBalDisplay = parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value);

                if (GdSlValuation > PrevBalDisplay) {

                    //var CashToGdMetal = parseFloat(document.getElementById('CashToGdMetalWt').value);
                    var GdCashMetal = parseFloat(document.getElementById('GdCashToMetal').value);
                    //var CashToSLMetal = document.getElementById('CashToSlMetalWt').value;
                    var SLCashMetal = document.getElementById('SlCashToMetal').value;


                    if ((document.getElementById(prefix + 'PayableCashCRDR').value == 'CR' &&
                            document.getElementById('PrevGdCashBalCRDR').value == 'CR') ||
                            (document.getElementById(prefix + 'PayableCashCRDR').value == 'DR' &&
                                    document.getElementById('PrevGdCashBalCRDR').value == 'DR') ||
                            (document.getElementById(prefix + 'PayableCashCRDR').value == 'CR' &&
                                    document.getElementById('PrevSlCashBalCRDR').value == 'CR') ||
                            (document.getElementById(prefix + 'PayableCashCRDR').value == 'DR' &&
                                    document.getElementById('PrevSlCashBalCRDR').value == 'DR') &&
                            (GdCashMetal > 0 || SLCashMetal > 0)) {

                        //document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'FinalGdCRDR').value;

                    } else {

                        if (document.getElementById(prefix + 'SilverRtCtWtBal').value > document.getElementById(prefix + 'GoldRtCtWtBal').value) {
                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'FinalSlCRDR').value;
                        } else if (document.getElementById(prefix + 'GoldRtCtWtBal').value > document.getElementById(prefix + 'SilverRtCtWtBal').value) {
                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'FinalGdCRDR').value;
                        } else {
                            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'FinalGdCRDR').value;
                        }
                    }

                } else {
                    document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                }
                // END @PRIYANKA-07APR18

                //alert('PayableCashCRDR 3== ' + document.getElementById(prefix + 'PayableCashCRDR').value);

            } else {
                document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'FinalGdCRDR').value;

                //alert('PayableCashCRDR 4== ' + document.getElementById(prefix + 'PayableCashCRDR').value);
            }

            if (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == document.getElementById(prefix + 'FinalGdCRDR').value) {
                totalAmount = parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value);
            } else {
                totalAmount = parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value);
            }

        } else {
            document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;

            //alert('PayableCashCRDR 5== ' + document.getElementById(prefix + 'PayableCashCRDR').value);
        }

    } else if ((document.getElementById(prefix + 'TransCRDR').value == 'CR' &&
            document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') ||
            (document.getElementById(prefix + 'TransCRDR').value == 'DR' &&
                    document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR')) {

        //alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);
        
        if (document.getElementById(prefix + 'TransCRDR').value == 'DR') {
            totalAmount = parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value);
        } else {
            totalAmount = parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value);
        }

        //alert('PayPrevTotAmt == ' + document.getElementById(prefix + 'PayPrevTotAmt').value);
        //alert('PayTotCashAmt == ' + document.getElementById(prefix + 'PayTotCashAmt').value);

        //alert('totalAmount == ' + totalAmount);

        if ((document.getElementById('paymentMode').value == 'RateCut') &&
                (document.getElementById(prefix + 'GoldRtCtWtBal').value > 0 ||
                        document.getElementById(prefix + 'SilverRtCtWtBal').value > 0)) {

            if ((document.getElementById(prefix + 'PayPrevCashBalCRDR').value != document.getElementById(prefix + 'FinalGdCRDR').value) ||
                    (document.getElementById(prefix + 'PayPrevCashBalCRDR').value != document.getElementById(prefix + 'FinalSlCRDR').value)) {

                // alert('GoldValuation == ' + document.getElementById(prefix + 'GoldValuation').value);               
                // alert('PayPrevAmtDisp == ' + document.getElementById(prefix + 'PayPrevAmtDisp').value);

                //alert('totalAmount == ' + totalAmount);

                var PrevAmtDisplay = parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value);

                // START @PRIYANKA-07APR18
                if ((document.getElementById('paymentMode').value == 'RateCut') &&
                        (document.getElementById(prefix + 'GoldRtCtWtBal').value > 0)) {
                    var GdVal = parseFloat(document.getElementById(prefix + 'GoldValuation').value);

                    if (GdVal > PrevAmtDisplay) {
                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'FinalGdCRDR').value;
                        // alert('PayableCashCRDR == ' + document.getElementById(prefix + 'PayableCashCRDR').value);                       
                    } else {
                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                        // alert('PayableCashCRDR **== ' + document.getElementById(prefix + 'PayableCashCRDR').value);
                    }
                }

                // START @PRIYANKA-20JUNE18
                if ((document.getElementById('paymentMode').value == 'RateCut') &&
                        (document.getElementById(prefix + 'SilverRtCtWtBal').value > 0)) {
                    var SlVal = parseFloat(document.getElementById(prefix + 'SilverValuation').value);

                    if (SlVal > PrevAmtDisplay) {
                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'FinalSlCRDR').value;
                        // alert('PayableCashCRDR == ' + document.getElementById(prefix + 'PayableCashCRDR').value);                       
                    } else {
                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'PayPrevCashBalCRDR').value;
                        // alert('PayableCashCRDR **== ' + document.getElementById(prefix + 'PayableCashCRDR').value);
                    }
                }
                // END @PRIYANKA-20JUNE18

                // END @PRIYANKA-07APR18

                //alert('PayableCashCRDR 6== ' + document.getElementById(prefix + 'PayableCashCRDR').value);

            } else {

                // START @PRIYANKA-12APR18
                var GdSlVal = parseFloat(parseFloat(document.getElementById(prefix + 'GoldValuation').value) + parseFloat(document.getElementById(prefix + 'SilverValuation').value));
                var PrevAmtDisplay = parseFloat(document.getElementById(prefix + 'PayPrevAmtDisp').value);

                if (GdSlVal > PrevAmtDisplay) {
                    //document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'FinalGdCRDR').value;                   
                } else {

                    if ((document.getElementById(prefix + 'SilverValuation').value > document.getElementById(prefix + 'PayPrevAmtDisp').value) &&
                            (document.getElementById(prefix + 'SilverValuation').value > document.getElementById(prefix + 'GoldValuation').value)) {
                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'FinalSlCRDR').value;
                    } else {
                        document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'FinalGdCRDR').value;
                    }
                }
                // END @PRIYANKA-12APR18

                // document.getElementById(prefix + 'PayableCashCRDR').value = document.getElementById(prefix + 'FinalGdCRDR').value;

                // alert('PayableCashCRDR 7== ' + document.getElementById(prefix + 'PayableCashCRDR').value);

            }

            if (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == document.getElementById(prefix + 'FinalGdCRDR').value) {
                totalAmount = parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value);
            } else {
                totalAmount = parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value);
            }

            // START @PRIYANKA-20JUNE18
            if ((document.getElementById('paymentMode').value == 'RateCut') &&
                    (document.getElementById(prefix + 'SilverRtCtWtBal').value > 0)) {

                if (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == document.getElementById(prefix + 'FinalSlCRDR').value) {
                    totalAmount = parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value);
                } else {
                    totalAmount = parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value);
                }
            }
            // END @PRIYANKA-20JUNE18

            //alert('totalAmount @@@== ' + totalAmount);

        } else {
            if(document.getElementById('paymentMode').value != 'RateCut' && ( document.getElementById('payPanelName').value != 'StockReturnPanel' || document.getElementById('payPanelName').value != 'ItemReturnPayUp') ) {
                if (totalAmount < 0)
                    document.getElementById(prefix + 'PayableCashCRDR').value = 'CR';
                else
                    document.getElementById(prefix + 'PayableCashCRDR').value = 'DR';
            }
            // alert('PayableCashCRDR 8== ' + document.getElementById(prefix + 'PayableCashCRDR').value);
            }
        }

    //alert('PayableCashCRDR @@== ' + document.getElementById(prefix + 'PayableCashCRDR').value);

    //alert('PayPrevCashBalCRDR ##== ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);

    //alert('PayableCashCRDR ##== ' + document.getElementById(prefix + 'PayableCashCRDR').value);
    // START OF CODE TO SET COLOR FOR PREV CASH BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
    if (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') {
        document.getElementById(prefix + 'PayPrevCashBalCRDR').style.color = 'red';
        document.getElementById(prefix + 'PayPrevAmtDisp').style.color = 'red';
        // START @PRIYANKA-02APR18
//        if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
//            document.getElementById('utin_prev_cash_opening_CRDR').style.color = 'green';
//            document.getElementById('utin_prev_cash_opening').style.color = 'green';
//        }
        // END @PRIYANKA-02APR18
    } else if (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR') {
        document.getElementById(prefix + 'PayPrevCashBalCRDR').style.color = 'green';
        document.getElementById(prefix + 'PayPrevAmtDisp').style.color = 'green';
        // START @PRIYANKA-02APR18
//        if (document.getElementById('paymentMode').value == 'RateCut' || document.getElementById('paymentMode').value == 'NoRateCut') {
//            document.getElementById('utin_prev_cash_opening_CRDR').style.color = 'red';
//            document.getElementById('utin_prev_cash_opening').style.color = 'red';
//        }
        // END @PRIYANKA-02APR18
    }
    // END OF CODE TO SET COLOR FOR PREV CASH BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
    //alert('PayPrevCashBalCRDR == ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);

    // START CODE FOR DISCOUNT APPLY BEFORE GST TAX @PRIYANKA-06MAR18
    if (document.getElementById('utin_discount_per_discup').value == '' && document.getElementById('utin_discount_amt_discup').value == '') {

        //alert('totalAmount == ' + totalAmount);

        document.getElementById(prefix + 'PayTotCashAmt').value = parseFloat(Math.abs(totalAmount)).toFixed(2);
        document.getElementById(prefix + 'PayTotCashAmtDisp').value = parseFloat(Math.abs(totalAmount)).toFixed(2);

        //alert('document.getElementById(prefix + PayTotCashAmtDisp).value =22=' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);
        //alert('PayTotCashAmt == ' + document.getElementById(prefix + 'PayTotCashAmt').value);
    }
    // END CODE FOR DISCOUNT APPLY BEFORE GST TAX @PRIYANKA-06MAR18

    //alert('PayPrevCashBalCRDR @@== ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);   
    //alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);



}

function calcTotalFinalAmount(prefix, totalCashNdChequeAmt, totalCardAmt, totalOnlinePayAmt, totalDiscount) {

    var finalTotalAmnt = parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value);

    //alert('finalTotalAmnt == ' + finalTotalAmnt);

    var finalCashBal = 0;

    // START CODE @PRIYANKA -11APR18

    //alert('finalTotalAmnt ??== ' + finalTotalAmnt);

    //alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);
    //alert('PayableCashCRDR == ' + document.getElementById(prefix + 'PayableCashCRDR').value);
    //alert('mainPanelName == ' + document.getElementById('mainPanelName').value);
    //alert('transPanelName == ' + document.getElementById('transPanelName').value);
    //alert('payPanelName == ' + document.getElementById('payPanelName').value);
    //from here change amount receive or paid PRATHAMESH
    if (document.getElementById(prefix + 'TransCRDR').value == document.getElementById(prefix + 'PayableCashCRDR').value) {

        //alert('mainPanelName == ' + document.getElementById('mainPanelName').value);
        //alert('transPanelName == ' + document.getElementById('transPanelName').value);
        //alert('payPanelName == ' + document.getElementById('payPanelName').value);

        if ((document.getElementById('paymentMode').value == 'ByCash' ||
                document.getElementById('paymentMode').value == 'RateCut') &&
                document.getElementById('mainPanelName').value != 'scheme' &&
                document.getElementById('mainPanelName').value != 'finance' &&
                document.getElementById('mainPanelName').value != 'userHome' &&
                (document.getElementById('mainPanelName').value != 'udhaar' &&
                        document.getElementById('mainPanelName').value != 'MONEY')) {
            //
            if (typeof (document.getElementById(prefix + 'PayTotAmtRec')) != 'undefined' &&
                    document.getElementById(prefix + 'PayTotAmtRec') != null) { // IF ADDED - IF ID NOT PRESENT IN FILE @AUTHOR:SHRI11DEC19

                if (document.getElementById(prefix + 'PayTotAmtRec').value == '' ||
                        document.getElementById(prefix + 'PayTotAmtRec').value == 'NaN') {
                    document.getElementById(prefix + 'PayTotAmtRec').value = 0;
                }

            }
            //scheme settlement rates
            //
            if (typeof (document.getElementById('payTotalSchemeAmtRec')) != 'undefined' &&
                    document.getElementById('payTotalSchemeAmtRec') != null) { // IF ADDED - IF ID NOT PRESENT IN FILE @AUTHOR:SHRI11DEC19

                if (document.getElementById('payTotalSchemeAmtRec').value == '' ||
                        document.getElementById('payTotalSchemeAmtRec').value == 'NaN') {
                    document.getElementById('payTotalSchemeAmtRec').value = 0;
                }

            }
            //            
            //
            if (prefix == 'order') {
                finalTotalAmnt = parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById('preOrdRecAmt').value); // Metal received amount minus from total payable amount.
            } else {
                // DISCOUNT BEFORE TAX CASE => METAL EXCHANGE AMOUNT DISPLAY IN CASH BALANCE ISSUE (UPDATE CASE) @PRIYANKA-23MAR18
                if (document.getElementById('utin_discount_per_discup').value != '' &&
                        document.getElementById('utin_discount_amt_discup').value != '' &&
                        document.getElementById('paymentMode').value == 'RateCut') {
                    if (document.getElementById("payPanelName").value == 'SellPayUp' ||
                            document.getElementById("payPanelName").value == 'ItemRepairPayUp' ||
                            document.getElementById("payPanelName").value == 'PurchaseReturnPayUp' ||
                            document.getElementById("payPanelName").value == 'ApprovalPayUp' ||
                            document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
                            document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
                            document.getElementById("payPanelName").value == 'RawPayUp' ||
                            document.getElementById("payPanelName").value == 'StockPayUp' ||
                            document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
                            document.getElementById("payPanelName").value == 'SuppOrderUp' ||
                            document.getElementById("payPanelName").value == 'CustSellPayUp' ||
                            document.getElementById("payPanelName").value == 'NwOrPayUp' ||
                            document.getElementById("payPanelName").value == 'SuppOrderDeliveryUp') {
                        finalTotalAmnt = parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value);
                    } else {

                        // FOR PAYMENT PANEL - RATE CUT - REVERSE CALCULATION ISSUE @AUTHOR:PRIYANKA-09FEB2023
                        if (typeof (document.getElementById(prefix + 'PayTotAmtRec')) != 'undefined' &&
                                document.getElementById(prefix + 'PayTotAmtRec') != null) {

                            if (typeof (document.getElementById(prefix + 'PayTotCashAmt')) != 'undefined' &&
                                    document.getElementById(prefix + 'PayTotCashAmt') != null) {

                                finalTotalAmnt = parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayTotAmtRec').value); // Metal received amount minus from total payable amount.
                                
                            }

                        } else {

                            finalTotalAmnt = parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value);

                        }
                    }

                } else {

                    //scheme calculations
                    if (typeof (document.getElementById('payTotalSchemeAmtRec')) != 'undefined' &&
                            document.getElementById('payTotalSchemeAmtRec') != null) {
                        //
                        //var payTotalSchemeAmtRecDisp = document.getElementById(prefix + 'payTotalSchemeAmtRecDisp').value; // Other Charges
                        var payTotalSchemeAmtRecDisp = document.getElementById('payTotalSchemeAmtRec').value; // Other Charges

                        //
                        if (typeof (payTotalSchemeAmtRecDisp) != 'undefined' && payTotalSchemeAmtRecDisp != null) {
                            payTotalSchemeAmtRecDisp = payTotalSchemeAmtRecDisp.replace(/\,/g, '');
                            //alert('payTotalSchemeAmtRecDisp'+payTotalSchemeAmtRecDisp);
                        }
                    } else {
                        var payTotalSchemeAmtRecDisp = 0;
                    }

                    // FOR PAYMENT PANEL - RATE CUT - REVERSE CALCULATION ISSUE @AUTHOR:PRIYANKA-09FEB2023
                    if (typeof (document.getElementById(prefix + 'PayTotAmtRec')) != 'undefined' &&
                            document.getElementById(prefix + 'PayTotAmtRec') != null) {  // IF ADDED - IF ID NOT PRESENT IN FILE @AUTHOR:SHRI11DEC19

                        if (typeof (document.getElementById(prefix + 'PayTotCashAmt')) != 'undefined' &&
                                document.getElementById(prefix + 'PayTotCashAmt') != null) {

                            //finalTotalAmnt = parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayTotAmtRec').value); // Metal received amount minus from total payable amount.                                           

                            if (typeof (payTotalSchemeAmtRecDisp) != 'undefined' && payTotalSchemeAmtRecDisp != null) {
                                finalTotalAmnt = (parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - (parseFloat(document.getElementById(prefix + 'PayTotAmtRecDisp').value) + parseFloat(payTotalSchemeAmtRecDisp))); // Metal received amount minus from total payable amount.  

                                //alert('finalTotalAmnt 1== '+finalTotalAmnt);
                            } else
                            {
                                finalTotalAmnt = parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayTotAmtRec').value); // Metal received amount minus from total payable amount.                   
                                //alert('finalTotalAmnt'+finalTotalAmnt);
                            }

                        }

                    } else {

                        if (typeof (payTotalSchemeAmtRecDisp) != 'undefined' && payTotalSchemeAmtRecDisp != null) {
                            finalTotalAmnt = (parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(payTotalSchemeAmtRecDisp));
                            //alert('finalTotalAmnt 2== '+finalTotalAmnt);
                        } else
                        {
                            finalTotalAmnt = parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value);
                            //alert('finalTotalAmnt'+finalTotalAmnt);
                        }
                        //console.log("final cash finalTotalAmnt::::" + finalTotalAmnt );
                    }
                }
                //
                if (finalTotalAmnt == 'NaN') {
                    finalTotalAmnt = 0;
                }
            }
        }
        //
        //var TotalAmount = parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value);

        var roundOffAmount = 0;
        var rndOff = 0.5;
        if ((finalTotalAmnt % 1).toFixed(2) > 0) {
            //
            roundOffAmount = (finalTotalAmnt % 1).toFixed(2);
            //
            if (roundOffAmount >= rndOff) {
                var rndOffAmount = (1 - roundOffAmount);

                // START CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-19JUNE18
                if (typeof (document.getElementById(prefix + 'PayRoundOffDisplay')) != 'undefined' &&
                        (document.getElementById(prefix + 'PayRoundOffDisplay') != null)) {
                    document.getElementById(prefix + 'PayRoundOffDisplay').value = '+ ' + parseFloat(rndOffAmount).toFixed(2);
                }
                // END CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-19JUNE18

                document.getElementById(prefix + 'PayRoundOffDisp').value = parseFloat(rndOffAmount).toFixed(2);
                document.getElementById(prefix + 'PayRoundOffAmt').value = parseFloat(roundOffAmount).toFixed(2);
                //alert('1:'+roundOffAmount);
            } else {

                // START CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-19JUNE18
                if (typeof (document.getElementById(prefix + 'PayRoundOffDisplay')) != 'undefined' &&
                        (document.getElementById(prefix + 'PayRoundOffDisplay') != null)) {
                    document.getElementById(prefix + 'PayRoundOffDisplay').value = '- ' + parseFloat(roundOffAmount).toFixed(2);
                }
                // END CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-19JUNE18

                document.getElementById(prefix + 'PayRoundOffDisp').value = parseFloat(roundOffAmount).toFixed(2);
                document.getElementById(prefix + 'PayRoundOffAmt').value = parseFloat(roundOffAmount).toFixed(2);
                //alert('2:'+roundOffAmount);
            }

        } else if ((finalTotalAmnt % 1).toFixed(2) == 0 || (finalTotalAmnt % 1).toFixed(2) == '0.00') {

            // START CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-19JUNE18
            if (typeof (document.getElementById(prefix + 'PayRoundOffDisplay')) != 'undefined' &&
                    (document.getElementById(prefix + 'PayRoundOffDisplay') != null)) {
                document.getElementById(prefix + 'PayRoundOffDisplay').value = roundOffAmount.toFixed(2);
            }
            // END CODE FOR METAL RECEIVED CALCULATION ON PAYMENT PANEL @PRIYANKA-19JUNE18

            // START CODE FOR ROUND OFF TOTAL AMT STORE IN DATABASE @PRIYANKA-05MAR18
            document.getElementById(prefix + 'PayRoundOffDisp').value = parseFloat(roundOffAmount).toFixed(2);
            document.getElementById(prefix + 'PayRoundOffAmt').value = parseFloat(roundOffAmount).toFixed(2);
            // END CODE FOR ROUND OFF TOTAL AMT STORE IN DATABASE @PRIYANKA-05MAR18

        }

        finalTotalAmnt = Math_round(finalTotalAmnt);

        // END CODE FOR ROUND OFF TOTAL AMT ON PAYMENT PANEL @PRIYANKA-18-SEP-17


        //alert('finalTotalAmnt !!== ' + finalTotalAmnt);

        //alert('PaymentReceiptPanel == ' + document.getElementById("PaymentReceiptPanel").value);

        //alert('TransCRDR == ' + document.getElementById(prefix + 'TransCRDR').value);
        //alert('PayableCashCRDR == ' + document.getElementById(prefix + "PayableCashCRDR").value);
        //alert('mainPanelName == ' + document.getElementById("mainPanelName").value);
//        alert('payPanelName == ' + document.getElementById("payPanelName").value);
//        alert('transPanelName == ' + document.getElementById("transPanelName").value);

        // ADDING ONE CONDITION FOR PAYMENT/RECEIPT UPDATE CASE @PRIYANKA-21MAY18
        // START CODE TO CHANGE CONDITION FOR PAYMENT/RECEIPT PANEL NAME @PRIYANKA-16MAY18
        // START CODE TO ADD CONDITION FOR PAYMENT/RECEIPT PANEL NAME @PRIYANKA-15MAR18
        if (((document.getElementById('transPanelName').value == 'Payment' ||
                document.getElementById('transPanelName').value == 'PaymentReceiptUpdate') &&
                document.getElementById('mainPanelName').value == 'userHome' &&
                document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' &&
                document.getElementById(prefix + 'PayableCashCRDR').value == 'CR') ||
                ((document.getElementById('transPanelName').value == 'Payment' ||
                        document.getElementById('transPanelName').value == 'PaymentReceiptUpdate') &&
                        document.getElementById('mainPanelName').value == 'userHome' &&
                        document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' &&
                        document.getElementById(prefix + 'PayableCashCRDR').value == 'DR')) {
                        finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                    } else {
            // START - ADDED CONDITIONS @PRIYANKA-28MAY18
            // PAYMENT PANEL : SELL & PURCHASE PANEL AMOUNT PLUS MINUS ACCORDING TO CR/DR @PRIYANKA-23MAR18
            if ((document.getElementById("amountPaidReceiveOption").value == 'amountPaid') && (document.getElementById("payPanelName").value == 'SlPrPayment' || document.getElementById("payPanelName").value == 'SellPayUp')) {
                if(document.getElementById('Mainpanelname').value == 'stockSellPanel' && document.getElementById('paymentMode').value != 'RateCut') {  
                   if(document.getElementById(prefix + 'PayableCashCRDR').value == 'CR' && document.getElementById(prefix + 'TransCRDR').value == 'CR') {
                       finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                   } else {
                    finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                        }
               }else{
                   //Prathamesh here code for ratecut if amountPaid sell
                       if (document.getElementById('paymentMode').value == 'RateCut') { 
                            let finalAmtCR = 0;
                            let finalAmtDR = 0;
                            let goldRtCtVal = parseFloat(document.getElementById(prefix + 'GoldValuation').value).toFixed(2);
                            let silverRtCtVal = parseFloat(document.getElementById(prefix + 'SilverValuation').value).toFixed(2);
                            let stoneRtCtVal = parseFloat(document.getElementById(prefix + 'CrystalValuation').value).toFixed(2);
                            if (document.getElementById(prefix+'RtCtGdCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(goldRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(goldRtCtVal)).toFixed(2);
                            }
                            if (document.getElementById(prefix+'RtCtSlCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(silverRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(silverRtCtVal)).toFixed(2);
                            }
                            if (document.getElementById(prefix+'RtCtStCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(stoneRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(stoneRtCtVal)).toFixed(2);
                            }
                            if (finalAmtCR >= finalAmtDR) {
                                finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            } else {
                                finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            } 
                        } else {
                            finalCashBal = (parseFloat(Math.abs(finalTotalAmnt)) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            finalCashBal = (finalCashBal * -1);
                        }
                  }
             } else if ((document.getElementById("payPanelName").value == 'SlPrPayment' ||
                    document.getElementById("payPanelName").value == 'SellPayUp' ||
                    document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                    document.getElementById("payPanelName").value == 'ItemRepairPayUp' ||
                    document.getElementById("payPanelName").value == 'ApprovalPayment' ||
                    document.getElementById("payPanelName").value == 'ApprovalPayUp' ||
                    document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
                    document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
                    document.getElementById("payPanelName").value == 'NewOrderPayment' ||
                    document.getElementById("payPanelName").value == 'RawPayUp' ||
                    document.getElementById('transPanelName').value == 'SellPayment' ||
                    document.getElementById("transPanelName").value == 'SellPayUp' ||
                    document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                    document.getElementById("payPanelName").value == 'PurchaseReturnPayUp' ||
                    document.getElementById("transPanelName").value == 'PurchaseReturnPanel' ||
                    document.getElementById("transPanelName").value == 'PurchaseReturnPayUp' ||
                    document.getElementById("transPanelName").value == 'ApprovalPayUp' ||
                    document.getElementById("payPanelName").value == 'SCHEME_PAYMENT' ||
                    document.getElementById("payPanelName").value == 'FINANCE_PAYMENT' ||
                    document.getElementById("payPanelName").value == 'ImitationSellPayment' ||
                    document.getElementById("payPanelName").value == 'ImitationSellPayUp' ||
                    document.getElementById("payPanelName").value == 'CrySellPayment' ||
                    document.getElementById("payPanelName").value == 'CrySellPayUp' ||
                    document.getElementById("payPanelName").value == 'XRF_PAYMENT' ||
                    document.getElementById("payPanelName").value == 'TRANS_PAYMENT' ||
                    document.getElementById("payPanelName").value == 'XRF_PAYMENT_UP' ||
                    document.getElementById("payPanelName").value == 'schemePayUp' ||
                    document.getElementById("payPanelName").value == 'finacePayUp' ||
                    document.getElementById("transPanelName").value == 'MONEY' ||
                    document.getElementById('transPanelName').value == 'OnPurchase' ||
                    document.getElementById("payPanelName").value == 'NewOrderPayment' ||
                    document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
                    document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
                    document.getElementById("payPanelName").value == 'StrlleringSellPayUp') &&
                    (document.getElementById(prefix + 'PayableCashCRDR').value == 'DR')) { 
                if(document.getElementById('amountPaidReceiveOption').value == 'amountReceived' && document.getElementById("payPanelName").value == 'FINANCE_PAYMENT'){
                    finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                } else if(document.getElementById('amountPaidReceiveOption').value == 'amountPaid' && document.getElementById("payPanelName").value == 'FINANCE_PAYMENT'){
                    finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);                 
                 } else {
                     //Prathamesh here code for ratecut if amountReceived sell
                     if (document.getElementById('amountPaidReceiveOption').value == 'amountReceived') {
                        if (document.getElementById('paymentMode').value == 'RateCut') {
                            let finalAmtCR = 0;
                            let finalAmtDR = 0;
                            let goldRtCtVal = parseFloat(document.getElementById(prefix + 'GoldValuation').value).toFixed(2);
                            let silverRtCtVal = parseFloat(document.getElementById(prefix + 'SilverValuation').value).toFixed(2);
                            let stoneRtCtVal = parseFloat(document.getElementById(prefix + 'CrystalValuation').value).toFixed(2);
                            if (document.getElementById(prefix+'RtCtGdCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(goldRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(goldRtCtVal)).toFixed(2);
                            }
                            if (document.getElementById(prefix+'RtCtSlCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(silverRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(silverRtCtVal)).toFixed(2);
                            }
                            if (document.getElementById(prefix+'RtCtStCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(stoneRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(stoneRtCtVal)).toFixed(2);
                            }
                            if (finalAmtCR >= finalAmtDR) {
                                finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            } else {
                                finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            }                            
                        } else { 
                            finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                        }
                     } else if (document.getElementById('amountPaidReceiveOption').value == 'amountPaid') {
                         //Prathamesh here code for ratecut if amountPaid sell
                         if (document.getElementById('paymentMode').value == 'RateCut') {
                            let finalAmtCR = 0;
                            let finalAmtDR = 0;
                            let goldRtCtVal = parseFloat(document.getElementById(prefix + 'GoldValuation').value).toFixed(2);
                            let silverRtCtVal = parseFloat(document.getElementById(prefix + 'SilverValuation').value).toFixed(2);
                            let stoneRtCtVal = parseFloat(document.getElementById(prefix + 'CrystalValuation').value).toFixed(2);
                            if (document.getElementById(prefix+'RtCtGdCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(goldRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(goldRtCtVal)).toFixed(2);
                            }
                            if (document.getElementById(prefix+'RtCtSlCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(silverRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(silverRtCtVal)).toFixed(2);
                            }
                            if (document.getElementById(prefix+'RtCtStCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(stoneRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(stoneRtCtVal)).toFixed(2);
                            }
                            if (finalAmtCR >= finalAmtDR) {
                                finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            } else {
                                finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            }                            
                        } else { 
                            finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                        }
                     }
              }
                //alert('finalCashBal 1#==# ' + finalCashBal);

                // ADDED ONE CONDITION FOR SCHEME @PRIYANKA-30MAY18
            } else if ((document.getElementById("payPanelName").value == 'StockPayment' ||
                    document.getElementById("payPanelName").value == 'StockPayUp' ||
                    (document.getElementById("payPanelName").value == 'RawPayment' && 
                    document.getElementById('transPanelName').value == 'SellPayment' ||
                    document.getElementById('transPanelName').value == 'SellPayUp') ||
                    document.getElementById('transPanelName').value == 'ItemReturnPanel' ||
                    document.getElementById('transPanelName').value == 'StockReturnPanel' ||
                    document.getElementById('transPanelName').value == 'ItemReturnPayUp' ||
                    document.getElementById("payPanelName").value == 'ImitationStockPayment' ||
                    document.getElementById("payPanelName").value == 'ImitationStockPayUp' ||
                    document.getElementById("payPanelName").value == 'CrystalStockPayment' ||
                    document.getElementById("payPanelName").value == 'CrystalStockPayUp' ||
                    document.getElementById("payPanelName").value == 'FINANCE_PAYMENT' ||
                    document.getElementById('transPanelName').value == 'PurchasePayment' ||
                    document.getElementById('transPanelName').value == 'PurchasePayUp' ||
                    document.getElementById('payPanelName').value == 'StockReturnPanel') &&
                    (document.getElementById(prefix + 'PayableCashCRDR').value == 'CR')) {
                
                if(document.getElementById('amountPaidReceiveOption').value == 'amountReceived' && ((document.getElementById('transPanelName').value == 'PurchasePayUp') || (document.getElementById("PaymentReceiptPanel").value == 'PurchasePayment'))){ 
                    if(document.getElementById(prefix+'RtCtGdCRDR').value == 'CR' && document.getElementById('paymentMode').value == 'RateCut'){ 
                            finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                    } else{
                        finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                    }
                } else if(document.getElementById("payPanelName").value != 'ImitationStockPayment' && document.getElementById("payPanelName").value != 'ImitationStockPayUp'){
                    if(document.getElementById(prefix+'RtCtGdCRDR').value == 'CR' && document.getElementById('paymentMode').value == 'RateCut'){
                        finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                    } else{
                       finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                    }
                }

                if(document.getElementById('Mainpanelname').value == 'stockSellPanel' && document.getElementById('paymentMode').value != 'RateCut') { 
                    if(document.getElementById('amountPaidReceiveOption').value == 'amountReceived' ){
                        //
                    finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                         }else{
                              finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                         }
                    }else{ 
                        //Prathamesh here code for ratecut if amountReceived Purchase
                        if(document.getElementById('amountPaidReceiveOption').value == 'amountReceived'){ 
                            
                            if (document.getElementById('paymentMode').value == 'RateCut') { 
                                let finalAmtCR = 0;
                                let finalAmtDR = 0;
                                let goldRtCtVal = parseFloat(document.getElementById(prefix + 'GoldValuation').value).toFixed(2);
                                let silverRtCtVal = parseFloat(document.getElementById(prefix + 'SilverValuation').value).toFixed(2);
                                let stoneRtCtVal = parseFloat(document.getElementById(prefix + 'CrystalValuation').value).toFixed(2);
                                if (document.getElementById(prefix+'RtCtGdCRDR').value == 'CR') {
                                    finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(goldRtCtVal)).toFixed(2);
                                } else {
                                    finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(goldRtCtVal)).toFixed(2);
                                }
                                if (document.getElementById(prefix+'RtCtSlCRDR').value == 'CR') {
                                    finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(silverRtCtVal)).toFixed(2);
                                } else {
                                    finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(silverRtCtVal)).toFixed(2);
                                }
                                if (document.getElementById(prefix+'RtCtStCRDR').value == 'CR') {
                                    finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(stoneRtCtVal)).toFixed(2);
                                } else {
                                    finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(stoneRtCtVal)).toFixed(2);
                                }
                                if (finalAmtCR >= finalAmtDR) {
                                    finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                                } else {
                                    finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                                }
                        } else if (document.getElementById(prefix+'RtCtGdCRDR').value == 'DR' && document.getElementById('paymentMode').value == 'RateCut') { 
                              finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            }else{
                              finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            }
                        } else if (document.getElementById('amountPaidReceiveOption').value == 'amountPaid' && document.getElementById('paymentMode').value == 'RateCut') { 
                            //Prathamesh here code for ratecut if amountPaid Purchase
                            let finalAmtCR = 0;
                            let finalAmtDR = 0;
                            let goldRtCtVal = parseFloat(document.getElementById(prefix + 'GoldValuation').value).toFixed(2);
                            let silverRtCtVal = parseFloat(document.getElementById(prefix + 'SilverValuation').value).toFixed(2);
                            let stoneRtCtVal = parseFloat(document.getElementById(prefix + 'CrystalValuation').value).toFixed(2);
                            if (document.getElementById(prefix+'RtCtGdCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(goldRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(goldRtCtVal)).toFixed(2);
                            }
                            if (document.getElementById(prefix+'RtCtSlCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(silverRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(silverRtCtVal)).toFixed(2);
                            }
                            if (document.getElementById(prefix+'RtCtStCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(stoneRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(stoneRtCtVal)).toFixed(2);
                            }
                            if (finalAmtCR >= finalAmtDR) {
                                finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            } else {
                                finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            } 
                        } else if(document.getElementById("payPanelName").value != 'ImitationStockPayment' && document.getElementById("payPanelName").value != 'ImitationStockPayUp'){
                            if(document.getElementById(prefix+'RtCtGdCRDR').value == 'CR' && document.getElementById('paymentMode').value == 'RateCut'){
                              finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            } else{
                              finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            }
                            }
                    }
                     if(document.getElementById("payPanelName").value == 'ImitationStockPayment' || document.getElementById("payPanelName").value == 'ImitationStockPayUp'){
                         finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                     }
            } else if ((document.getElementById("payPanelName").value == 'StockPayment' ||
                    document.getElementById("payPanelName").value == 'StockPayUp' ||
                    document.getElementById('transPanelName').value == 'ItemReturnPanel' ||
                    document.getElementById('transPanelName').value == 'StockReturnPanel' ||
                    document.getElementById('transPanelName').value == 'ItemReturnPayUp' ||
                    document.getElementById("payPanelName").value == 'ImitationStockPayment' ||
                    document.getElementById("payPanelName").value == 'ImitationStockPayUp' ||
                    document.getElementById("payPanelName").value == 'CrystalStockPayment' ||
                    document.getElementById("payPanelName").value == 'CrystalStockPayUp' ||
                    document.getElementById("payPanelName").value == 'FINANCE_PAYMENT' ||
                    document.getElementById('transPanelName').value == 'PurchasePayment' ||
                    document.getElementById('transPanelName').value == 'PurchasePayUp' ||
                    document.getElementById('payPanelName').value == 'StockReturnPanel') &&
                    (document.getElementById(prefix + 'PayableCashCRDR').value == 'DR') && document.getElementById('paymentMode').value == 'RateCut') {

                if(document.getElementById('Mainpanelname').value == 'stockSellPanel' && document.getElementById('paymentMode').value != 'RateCut') { 
                if(document.getElementById('amountPaidReceiveOption').value == 'amountReceived' ){
                finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                     } else {
                          finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                     }
                    } else{ 
                        //Prathamesh here code for ratecut if amountReceived Purchase DR
                        if(document.getElementById('amountPaidReceiveOption').value == 'amountReceived') { 
                            
                            if (document.getElementById('paymentMode').value == 'RateCut') { 
                                let finalAmtCR = 0;
                                let finalAmtDR = 0;
                                let goldRtCtVal = parseFloat(document.getElementById(prefix + 'GoldValuation').value).toFixed(2);
                                let silverRtCtVal = parseFloat(document.getElementById(prefix + 'SilverValuation').value).toFixed(2);
                                let stoneRtCtVal = parseFloat(document.getElementById(prefix + 'CrystalValuation').value).toFixed(2);
                                if (document.getElementById(prefix+'RtCtGdCRDR').value == 'CR') {
                                    finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(goldRtCtVal)).toFixed(2);
                                } else {
                                    finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(goldRtCtVal)).toFixed(2);
                                }
                                if (document.getElementById(prefix+'RtCtSlCRDR').value == 'CR') {
                                    finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(silverRtCtVal)).toFixed(2);
                                } else {
                                    finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(silverRtCtVal)).toFixed(2);
                                }
                                if (document.getElementById(prefix+'RtCtStCRDR').value == 'CR') {
                                    finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(stoneRtCtVal)).toFixed(2);
                                } else {
                                    finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(stoneRtCtVal)).toFixed(2);
                                }
                                if (finalAmtCR >= finalAmtDR) {
                                    finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                                } else {
                                    finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                                }
                        } else if (document.getElementById(prefix+'RtCtGdCRDR').value == 'DR' && document.getElementById('paymentMode').value == 'RateCut') { 
                              finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            }else{
                              finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            }
                        } else if (document.getElementById('amountPaidReceiveOption').value == 'amountPaid' && document.getElementById('paymentMode').value == 'RateCut') { 
                            //Prathamesh here code for ratecut if amountPaid Purchase DR
                            let finalAmtCR = 0;
                            let finalAmtDR = 0;
                            let goldRtCtVal = parseFloat(document.getElementById(prefix + 'GoldValuation').value).toFixed(2);
                            let silverRtCtVal = parseFloat(document.getElementById(prefix + 'SilverValuation').value).toFixed(2);
                            let stoneRtCtVal = parseFloat(document.getElementById(prefix + 'CrystalValuation').value).toFixed(2);
                            if (document.getElementById(prefix+'RtCtGdCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(goldRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(goldRtCtVal)).toFixed(2);
                            }
                            if (document.getElementById(prefix+'RtCtSlCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(silverRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(silverRtCtVal)).toFixed(2);
                            }
                            if (document.getElementById(prefix+'RtCtStCRDR').value == 'CR') {
                                finalAmtCR = (parseFloat(finalAmtCR) + parseFloat(stoneRtCtVal)).toFixed(2);
                            } else {
                                finalAmtDR = (parseFloat(finalAmtDR) + parseFloat(stoneRtCtVal)).toFixed(2);
                            }
                            if (finalAmtCR >= finalAmtDR) {
                                finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            } else {
                                finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                            } 
                        }
                    }
            } 
                    else {

                if (((document.getElementById('transPanelName').value == 'Payment' ||
                        document.getElementById('transPanelName').value == 'PaymentReceiptUpdate') &&
                        document.getElementById('mainPanelName').value == 'userHome' &&
                        document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' &&
                        document.getElementById(prefix + 'PayableCashCRDR').value == 'DR') ||
                        ((document.getElementById('transPanelName').value == 'Payment' ||
                                document.getElementById('transPanelName').value == 'PaymentReceiptUpdate') &&
                                document.getElementById('mainPanelName').value == 'userHome' &&
                                document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' &&
                                document.getElementById(prefix + 'PayableCashCRDR').value == 'CR')) {

                    finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);

                    //alert('finalCashBal 3#==# ' + finalCashBal);

                } else {
                    if (document.getElementById("payPanelName").value == 'SchemePayment' ||
                            document.getElementById("payPanelName").value == 'schemePayUp' ||
                            document.getElementById("payPanelName").value == 'FINANCE_PAYMENT' ||
                            document.getElementById("payPanelName").value == 'finacePayUp' ||
                            document.getElementById("payPanelName").value == 'SCHEME_PAYMENT' ) { // IF ADDED TO DISPLAY AMOUNTS WHEN SCHEME PAYMENT DONE - @AUTHOR:SHRI08DEC19
                        finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                    } else if(document.getElementById('transPanelName').value == 'ADVMONEY' || document.getElementById('transPanelName').value == 'UDHAAR'){
                       finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);

                    } else {
                        finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                    }
                    //alert('finalCashBal 4#==# ' + finalCashBal);

                }
            }
            // END - ADDED CONDITIONS @PRIYANKA-28MAY18
        }
        //
        //
        //alert('finalCashBal @==@ ' + finalCashBal);
        //
        //
        if (finalCashBal == 'NaN') {
            finalCashBal = 0;
        }
        //
        // END CODE TO ADD CONDITION FOR PAYMENT/RECEIPT PANEL NAME @PRIYANKA-15MAR18
        // END CODE TO CHANGE CONDITION FOR PAYMENT/RECEIPT PANEL NAME @PRIYANKA-16MAY18
        //
        if (finalCashBal > 0) {
            document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'TransCRDR').value;
        } else {
            if (document.getElementById(prefix + 'TransCRDR').value == 'CR')
                document.getElementById(prefix + 'FinalCashCRDR').value = 'DR';
            else
                document.getElementById(prefix + 'FinalCashCRDR').value = 'CR';
        }
        // finalCashBal = Math.abs(finalCashBal);
        //
    } else { 
        //
        if ((document.getElementById('paymentMode').value == 'ByCash') &&
                document.getElementById('mainPanelName').value != 'scheme' &&
                document.getElementById('mainPanelName').value != 'userHome' &&
                document.getElementById('mainPanelName').value != 'udhaar' &&
                document.getElementById('mainPanelName').value != 'finance') {
            //
            if (document.getElementById(prefix + 'PayTotAmtRec').value == '' || document.getElementById(prefix + 'PayTotAmtRec').value == 'NaN') {
                document.getElementById(prefix + 'PayTotAmtRec').value = 0;
            }
            //
            if (prefix == 'order')
                finalTotalAmnt = parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById('preOrdRecAmt').value); // Metal received amount minus from total payable amount.
            //
            finalTotalAmnt = parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) + parseFloat(document.getElementById(prefix + 'PayTotAmtRec').value); // Metal received amount minus from total payable amount.
            //
        }
        // ADDING ONE CONDITION FOR PAYMENT/RECEIPT UPDATE CASE @PRIYANKA-21MAY18
        // 
        //alert('finalCashBal == ' + finalCashBal);
        // 
        // START CODE TO CHANGE CONDITION FOR PAYMENT/RECEIPT PANEL NAME @PRIYANKA-16MAY18
        // START CODE TO ADD CONDITION FOR PAYMENT/RECEIPT PANEL NAME @PRIYANKA-16MAR18
        if (((document.getElementById('transPanelName').value == 'Payment' ||
                document.getElementById('transPanelName').value == 'PaymentReceiptUpdate') &&
                document.getElementById('mainPanelName').value == 'userHome' &&
                document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' &&
                document.getElementById(prefix + 'PayableCashCRDR').value == 'DR') ||
                ((document.getElementById('transPanelName').value == 'Payment' ||
                        document.getElementById('transPanelName').value == 'PaymentReceiptUpdate') &&
                        document.getElementById('mainPanelName').value == 'userHome' &&
                        document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' &&
                        document.getElementById(prefix + 'PayableCashCRDR').value == 'CR')) {
            finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
        } else {
            //alert('payPanelName == ' + document.getElementById("payPanelName").value);
            if ((document.getElementById("amountPaidReceiveOption").value == 'amountPaid') && (document.getElementById("payPanelName").value == 'SlPrPayment' || document.getElementById("payPanelName").value == 'SellPayUp')) {
                finalCashBal = (parseFloat(Math.abs(finalTotalAmnt)) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                finalCashBal = (finalCashBal * -1);
            } else if (((document.getElementById("payPanelName").value == 'SlPrPayment' ||
                    document.getElementById("payPanelName").value == 'SellPayUp' ||
                    ((document.getElementById("payPanelName").value == 'RawPayment' ||
                    document.getElementById("payPanelName").value == 'ImitationSellPayment') && 
                    (document.getElementById('transPanelName').value == 'SellPayment' ||
                    document.getElementById('transPanelName').value == 'SellPayUp')) ||
                    document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                    document.getElementById("payPanelName").value == 'ItemRepairPayUp' ||
                    document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                    document.getElementById("payPanelName").value == 'PurchaseReturnPayUp' ||
                    document.getElementById("payPanelName").value == 'ApprovalPayment' ||
                    document.getElementById("payPanelName").value == 'ApprovalPayUp' ||
                    document.getElementById("payPanelName").value == 'NewOrderPayment' ||
                    document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
                    document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
                    document.getElementById("payPanelName").value == 'CrySellPayment' ||
                    document.getElementById("payPanelName").value == 'CrySellPayUp') &&
                    document.getElementById(prefix + 'PayableCashCRDR').value == 'CR') ||
                    ((document.getElementById("payPanelName").value == 'StockPayment' ||
                            document.getElementById("payPanelName").value == 'SchemePayment' ||
                            document.getElementById("payPanelName").value == 'StockPayUp' ||
                            document.getElementById("payPanelName").value == 'ItemReturnPanel' ||
                            document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
                            document.getElementById("payPanelName").value == 'RawPayment' ||
                            document.getElementById("payPanelName").value == 'RawPayUp' ||
                            document.getElementById("payPanelName").value == 'CrystalStockPayment' ||
                            document.getElementById("payPanelName").value == 'CrystalStockPayUp') &&
                            document.getElementById(prefix + 'PayableCashCRDR').value == 'DR')) {
                //
                if(document.getElementById("payPanelName").value == 'StockPayment' || 
                    (document.getElementById("payPanelName").value == 'RawPayment' && 
                    document.getElementById('transPanelName').value == 'PurchasePayment' ||
                    document.getElementById('transPanelName').value == 'PurchasePayUp')){
                if(document.getElementById('Mainpanelname').value == 'stockSellPanel' ){
                if(document.getElementById('amountPaidReceiveOption').value == 'amountReceived'){
                         finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                     }else{
                          finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                     }
                    }else{
                        if(document.getElementById('amountPaidReceiveOption').value == 'amountReceived'){
                        if(document.getElementById(prefix + 'PayableCashCRDR').value == 'DR'){
                          finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                      }else{
                          finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                      }
                     }else{
                         if(document.getElementById(prefix + 'PayableCashCRDR').value == 'DR'){
                          finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                      }else{
                          finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                      }
                     }
                 }
             }else{
                  if(document.getElementById('amountPaidReceiveOption').value == 'amountReceived'){
                        if(document.getElementById(prefix + 'PayableCashCRDR').value == 'DR'){
                          finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                      }else{
                          finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                      }
                     }else{
                    if(document.getElementById(prefix + 'PayableCashCRDR').value == 'DR'){
                          finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                      }else{
                          finalCashBal = (parseFloat(finalTotalAmnt) - parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                      }
                  }
                    // finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) + parseFloat(Math.abs(totalDiscount))).toFixed(2);
            }
//                alert('finalCashBal ^^== ' + finalCashBal);
            } else {
                finalCashBal = (parseFloat(finalTotalAmnt) + parseFloat(parseFloat(totalCashNdChequeAmt) + parseFloat(totalCardAmt) + parseFloat(totalOnlinePayAmt)) - parseFloat(Math.abs(totalDiscount))).toFixed(2);
                //alert('finalCashBal **== ' + finalCashBal);
            }
        }
        // END CODE TO ADD CONDITION FOR PAYMENT/RECEIPT PANEL NAME @PRIYANKA-16MAR18
        // END CODE TO CHANGE CONDITION FOR PAYMENT/RECEIPT PANEL NAME @PRIYANKA-16MAY18
        //

        //alert('finalCashBal EE== ' + finalCashBal);
        //alert('FinalCashCRDR == ' + document.getElementById(prefix + 'FinalCashCRDR').value);

        document.getElementById(prefix + 'FinalCashCRDR').value = document.getElementById(prefix + 'PayableCashCRDR').value;

        //alert('FinalCashCRDR **== ' + document.getElementById(prefix + 'FinalCashCRDR').value);

        if (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT') {
            if (finalCashBal < 0) {
                document.getElementById(prefix + 'FinalCashCRDR').value = 'CR';
            }
        }

        if (document.getElementById('PaymentReceiptPanel').value == 'PAYMENT') {
            if (finalCashBal < 0) {
                document.getElementById(prefix + 'FinalCashCRDR').value = 'DR';
            }
        }

    }
    // }
    return parseFloat(finalCashBal).toFixed(2);

    //alert('finalCashBal **@@== ' + finalCashBal);

    //alert('PayableCashCRDR YY== ' + document.getElementById(prefix + 'PayableCashCRDR').value);
}
//
function finalPaymentPanelFun(prefix) {
    //
    //alert('prefix: ' + prefix);
    //
    //alert('TransCRDR @1@==' + document.getElementById(prefix + 'TransCRDR').value);
    //alert('FinalCashCRDR @1@==' + document.getElementById(prefix + 'FinalCashCRDR').value);
    //alert('PayableCashCRDR @1@==' + document.getElementById(prefix + 'PayableCashCRDR').value);
    //alert('PayPrevCashBalCRDR @1@==' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);
    //
    var metal1WtFinBalFinal;
    var metal1WtFinBalFinalCRDR;
    var metal2WtFinBalFinal;
    var metal2WtFinBalFinalCRDR;
    var metal3WtFinBalFinal;
    var metal3WtFinBalFinalCRDR;
    var payPanelName = document.getElementById("payPanelNameHidden").value;
    var payPanelNameCRDR;
    //
    //
//    document.getElementById('metal1WtPrevBal').value;
//    document.getElementById(prefix + 'GoldWtPrevBalCRDR').value;
//    //
//    document.getElementById('utin_cash_gd_bal').value;
//    document.getElementById('utin_cash_gd_bal_CRDR').value;
//    //
//    document.getElementById('CashMetalGdBal').value;
//    document.getElementById('CashMetalGdBalCRDR').value;
//    //
//    document.getElementById('metal1RtCtWtBal').value;
//    document.getElementById('RtCtGdCRDR').value;
//    //
//    document.getElementById('metal1WtPurBal').value;
//    //
//    document.getElementById('metal1WtRecBal').value;
    //
    //
    // Start code for gold
    //
    //
    // ADDED CODE TO FIX ISSUE GETTING ON PAYMENT / RECEIPT PANEL => @AUTHOR-PRIYANKA:30DEC2022
    // Uncaught TypeError: document.getElementById(...) is null 
    // function finalPaymentPanelFun(prefix)
    // line no. 7750 // metal1WtFinBalFinalCRDR = document.getElementById(prefix + 'FinalGdCRDR').value;
    if (typeof (document.getElementById(prefix + 'GoldWtPrevBalCRDR') != 'undefined' &&
            (document.getElementById(prefix + 'GoldWtPrevBalCRDR') != null))) {
        if (typeof (document.getElementById(prefix + 'metal1WtPrevBal') != 'undefined' &&
                (document.getElementById(prefix + 'metal1WtPrevBal') != null))) {
            metal1WtFinBalFinal = parseFloat(document.getElementById('metal1WtPrevBal').value.slice(0, -3));
        }
        //        
        if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value != '') {
            if (typeof (document.getElementById(prefix + 'GoldWtPrevBalCRDR') != 'undefined' &&
                    (document.getElementById(prefix + 'GoldWtPrevBalCRDR') != null))) {
                metal1WtFinBalFinalCRDR = document.getElementById(prefix + 'GoldWtPrevBalCRDR').value;
            }
        } else {
            if (typeof (document.getElementById(prefix + 'FinalGdCRDR') != 'undefined' &&
                    (document.getElementById(prefix + 'FinalGdCRDR') != null))) {
                metal1WtFinBalFinalCRDR = document.getElementById(prefix + 'FinalGdCRDR').value;
            }
        }
        //alert('payPanelName: ' + document.getElementById("payPanelNameHidden").value);
        //alert('utin_cash_gd_bal0: ' + document.getElementById('utin_cash_gd_bal').value.slice(0, -3));
    }
    //
    //
    // Start code for silver
    //
    //
    if (typeof (document.getElementById(prefix + 'SilverWtPrevBalCRDR') != 'undefined' &&
            (document.getElementById(prefix + 'SilverWtPrevBalCRDR') != null))) {
        //
        if (typeof (document.getElementById(prefix + 'metal2WtPrevBal') != 'undefined' &&
                (document.getElementById(prefix + 'metal2WtPrevBal') != null))) {
            metal2WtFinBalFinal = parseFloat(document.getElementById('metal2WtPrevBal').value.slice(0, -3));
        }
        //    
        if (document.getElementById(prefix + 'SilverWtPrevBalCRDR').value != '') {
            //
            if (typeof (document.getElementById(prefix + 'SilverWtPrevBalCRDR') != 'undefined' &&
                    (document.getElementById(prefix + 'SilverWtPrevBalCRDR') != null))) {
                metal2WtFinBalFinalCRDR = document.getElementById(prefix + 'SilverWtPrevBalCRDR').value;
            }
            //
        } else {
            //
            if (typeof (document.getElementById(prefix + 'FinalSlCRDR') != 'undefined' &&
                    (document.getElementById(prefix + 'FinalSlCRDR') != null))) {
                metal2WtFinBalFinalCRDR = document.getElementById(prefix + 'FinalSlCRDR').value;
            }
            //
        }
        //alert('payPanelName: ' + document.getElementById("payPanelNameHidden").value);
        //alert('utin_cash_gd_bal0: ' + document.getElementById('utin_cash_gd_bal').value.slice(0, -3));
    }
    //author darshana 8 july 2021
    if (typeof (document.getElementById(prefix + 'CrystalWtPrevBalCRDR') != 'undefined' &&
            (document.getElementById(prefix + 'CrystalWtPrevBalCRDR') != null))) {
        if (typeof (document.getElementById(prefix + 'metal3WtPrevBal') != 'undefined' &&
                (document.getElementById(prefix + 'metal3WtPrevBal') != null))) {
            metal3WtFinBalFinal = parseFloat(document.getElementById('metal3WtPrevBal').value.slice(0, -3));
        }
        if (document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value != '') {
            if (typeof (document.getElementById(prefix + 'CrystalWtPrevBalCRDR') != 'undefined' &&
                    (document.getElementById(prefix + 'CrystalWtPrevBalCRDR') != null))) {
                metal3WtFinBalFinalCRDR = document.getElementById(prefix + 'CrystalWtPrevBalCRDR').value;
            }
        } else {
            if (typeof (document.getElementById(prefix + 'FinalStCRDR') != 'undefined' &&
                    (document.getElementById(prefix + 'FinalStCRDR') != null))) {
                metal3WtFinBalFinalCRDR = document.getElementById(prefix + 'FinalStCRDR').value;
            }
        }
        //alert('payPanelName: ' + document.getElementById("payPanelNameHidden").value);
        //alert('utin_cash_gd_bal0: ' + document.getElementById('utin_cash_gd_bal').value.slice(0, -3));
    }
    //   
    //
    if (metal1WtFinBalFinalCRDR != '' && metal1WtFinBalFinalCRDR != null) {
        //
        //
        //
        //  GD PURCHASE  
        if (typeof (document.getElementById('metal1WtPurBal') != 'undefined')) {
            if (document.getElementById('metal1WtPurBal') != null) {
                //
                if (parseFloat(document.getElementById('metal1WtPurBal').value) != 0
                        && parseFloat(document.getElementById('metal1WtPurBal').value) != ''
                        && parseFloat(document.getElementById('metal1WtPurBal').value) != null) {
                    //
                    if (payPanelName == 'PurchasePayment' || payPanelName == 'ItemReturnPanel' ||
                            payPanelName == 'PAYMENT' || payPanelName == 'PurchasePayUp' || payPanelName == 'StockReturnPanel') {
                        payPanelNameCRDR = 'CR';
                    } else {
                        payPanelNameCRDR = 'DR';
                    }
                    //
                    if (metal1WtFinBalFinalCRDR == payPanelNameCRDR) {
                        if(payPanelNameCRDR == 'CR') {                           
                            if(document.getElementById('paymentMode').value == 'NoRateCut') {
                                metal1WtFinBalFinal = parseFloat(parseFloat(document.getElementById('metal1WtPurBal').value.slice(0, -3)) + parseFloat(metal1WtFinBalFinal)).toFixed(3);
                            } else {                                
                                if(payPanelName == 'PurchasePayment' && parseFloat(metal1WtFinBalFinal) >= parseFloat(document.getElementById('metal1WtPurBal').value.slice(0, -3))) {
                                    metal1WtFinBalFinal = parseFloat(parseFloat(metal1WtFinBalFinal) + parseFloat(document.getElementById('metal1WtPurBal').value.slice(0, -3))).toFixed(3);
                                } else {     
                                    if(payPanelName == 'PurchasePayment') {
                                        metal1WtFinBalFinal = parseFloat(parseFloat(document.getElementById('metal1WtPurBal').value.slice(0, -3)) + parseFloat(metal1WtFinBalFinal)).toFixed(3);
                                    } else {
                                        metal1WtFinBalFinal = parseFloat(parseFloat(document.getElementById('metal1WtPurBal').value.slice(0, -3)) - parseFloat(metal1WtFinBalFinal)).toFixed(3);
                                    }                                    
                                }
                            }
                            metal1WtFinBalFinalCRDR = payPanelNameCRDR;
                        } else {                            
                            metal1WtFinBalFinal = metal1WtFinBalFinal + parseFloat(document.getElementById('metal1WtPurBal').value.slice(0, -3));
                            metal1WtFinBalFinalCRDR = payPanelNameCRDR;
                        }
                    } else {
                        if (metal1WtFinBalFinal >= parseFloat(document.getElementById('metal1WtPurBal').value)) {
                            metal1WtFinBalFinal = metal1WtFinBalFinal - parseFloat(document.getElementById('metal1WtPurBal').value.slice(0, -3));
                           // metal1WtFinBalFinalCRDR = payPanelNameCRDR;
                        } else if((metal1WtFinBalFinal <= parseFloat(document.getElementById('metal1WtPurBal').value)) && payPanelNameCRDR == 'CR') {
                            metal1WtFinBalFinal = parseFloat(document.getElementById('metal1WtPurBal').value.slice(0, -3)) - metal1WtFinBalFinal;
                            metal1WtFinBalFinalCRDR = payPanelNameCRDR;
                        } else {
                            metal1WtFinBalFinal = parseFloat(parseFloat(document.getElementById('metal1WtPurBal').value.slice(0, -3)) - metal1WtFinBalFinal).toFixed(3);
                            metal1WtFinBalFinalCRDR = payPanelNameCRDR;
                        }
                    }
                }
            }
        }
        //
//        alert('metal1WtFinBalFinalPURCHASE1: ' + metal1WtFinBalFinal);
//        alert('metal1WtFinBalFinalCRDRPURCHASE1: ' + metal1WtFinBalFinalCRDR);
        //
        //
        // Rate Cut   // GD RATE CUT
        if (typeof (document.getElementById('metal1RtCtWtBal') != 'undefined')) {
            if (document.getElementById('metal1RtCtWtBal') != null) {
                //
                if (payPanelName == 'PurchasePayment' || payPanelName == 'ItemReturnPanel' ||
                    payPanelName == 'PAYMENT' || payPanelName == 'PurchasePayUp' || payPanelName == 'StockReturnPanel') {
                    payPanelNameCRDR = 'DR';
                } else {
                    payPanelNameCRDR = 'CR';
                }
                //
                if (parseFloat(document.getElementById('metal1RtCtWtBal').value) != 0
                        && parseFloat(document.getElementById('metal1RtCtWtBal').value) != ''
                        && parseFloat(document.getElementById('metal1RtCtWtBal').value) != null) {
                    //
                    if (metal1WtFinBalFinalCRDR == payPanelNameCRDR && document.getElementById(prefix+'RtCtGdCRDR').value == 'CR' && document.getElementById(prefix + 'GoldWtPrevBalCRDR').value != 'CR') {
                        metal1WtFinBalFinal = parseFloat(metal1WtFinBalFinal) + parseFloat(document.getElementById('metal1RtCtWtBal').value.slice(0, -3));
                    } else {           
                        if (metal1WtFinBalFinal >= parseFloat(document.getElementById('metal1RtCtWtBal').value.slice(0, -3))) {                            
                            metal1WtFinBalFinal = metal1WtFinBalFinal - parseFloat(document.getElementById('metal1RtCtWtBal').value.slice(0, -3));   
                        } else {
                            metal1WtFinBalFinal = parseFloat(parseFloat(document.getElementById('metal1RtCtWtBal').value.slice(0, -3)) - parseFloat(metal1WtFinBalFinal)).toFixed(3);
//                            metal1WtFinBalFinalCRDR = document.getElementById(prefix + 'RtCtGdCRDR').value;
                        }
                    }
                }
            }
        }
//        alert('metal1WtFinBalFinalRateCut1: ' + metal1WtFinBalFinal);
//        alert('metal1WtFinBalFinalCRDRRateCut1: ' + metal1WtFinBalFinalCRDR);
        //
        // cash to Gold // CASH GD BAL
        if (typeof (document.getElementById('utin_cash_gd_bal') != 'undefined')) {
            if (document.getElementById('utin_cash_gd_bal') != null) {
                //
                if (parseFloat(document.getElementById('utin_cash_gd_bal').value) != 0
                        && parseFloat(document.getElementById('utin_cash_gd_bal').value) != ''
                        && parseFloat(document.getElementById('utin_cash_gd_bal').value) != null) {
                    //
                    if (metal1WtFinBalFinalCRDR == document.getElementById('utin_cash_gd_bal_CRDR').value) {
                        metal1WtFinBalFinal = metal1WtFinBalFinal + parseFloat(document.getElementById('utin_cash_gd_bal').value.slice(0, -3));
                    } else {
                        if (metal1WtFinBalFinal >= parseFloat(document.getElementById('utin_cash_gd_bal').value)) {
                            metal1WtFinBalFinal = metal1WtFinBalFinal - parseFloat(document.getElementById('utin_cash_gd_bal').value.slice(0, -3));
                        } else {
                            metal1WtFinBalFinal = parseFloat(document.getElementById('utin_cash_gd_bal').value.slice(0, -3)) - metal1WtFinBalFinal;
                            metal1WtFinBalFinalCRDR = document.getElementById('utin_cash_gd_bal_CRDR').value;
                        }
                    }
                }
            }
        }
        //
//        alert('metal1WtFinBalFinal1: ' + metal1WtFinBalFinal);
//        alert('metal1WtFinBalFinalCRDR1: ' + metal1WtFinBalFinalCRDR);
        //
        //  CASH GD WT 
        if (typeof (document.getElementById('CashMetalGdBal') != 'undefined')) {
            if (document.getElementById('CashMetalGdBal') != null) {
                //
                if (parseFloat(document.getElementById('CashMetalGdBal').value) != 0
                        && parseFloat(document.getElementById('CashMetalGdBal').value) != ''
                        && parseFloat(document.getElementById('CashMetalGdBal').value) != null) {
                    //
                    if (metal1WtFinBalFinalCRDR == document.getElementById('CashMetalGdBalCRDR').value) {
                        metal1WtFinBalFinal = metal1WtFinBalFinal + parseFloat(document.getElementById('CashMetalGdBal').value.slice(0, -3));
                    } else {
                        if (metal1WtFinBalFinal >= parseFloat(document.getElementById('CashMetalGdBal').value)) {
                            metal1WtFinBalFinal = metal1WtFinBalFinal - parseFloat(document.getElementById('CashMetalGdBal').value.slice(0, -3));
                        } else {
                            metal1WtFinBalFinal = parseFloat(document.getElementById('CashMetalGdBal').value.slice(0, -3)) - metal1WtFinBalFinal;
                            metal1WtFinBalFinalCRDR = document.getElementById('CashMetalGdBalCRDR').value;
                        }
                    }
                }
            }
        }
        //
//        alert('metal1WtFinBalFinal12: ' + metal1WtFinBalFinal);
        //
        //
        //  GD REC  
        if (typeof (document.getElementById('metal1WtRecBal') != 'undefined')) {
            if (document.getElementById('metal1WtRecBal') != null) {
                //
                if (parseFloat(document.getElementById('metal1WtRecBal').value) != 0
                        && parseFloat(document.getElementById('metal1WtRecBal').value) != ''
                        && parseFloat(document.getElementById('metal1WtRecBal').value) != null) {
                    //
                    if (payPanelName == 'PurchasePayment' || payPanelName == 'PurchasePayUp' ||
                            payPanelName == 'ItemReturnPanel' || payPanelName == 'ItemReturnPayUp' ||
                            payPanelName == 'StockReturnPanel' || payPanelName == 'PAYMENT') {
                        payPanelNameCRDR = 'DR';
                    } else {
                        payPanelNameCRDR = 'CR';
                    }
                    //
//                    alert('metal1WtFinBalFinalCRDR: ' + metal1WtFinBalFinalCRDR);
//                    alert('payPanelNameCRDR: ' + payPanelNameCRDR);
                    if (metal1WtFinBalFinalCRDR == payPanelNameCRDR) {
                        metal1WtFinBalFinal = metal1WtFinBalFinal + parseFloat(document.getElementById('metal1WtRecBal').value.slice(0, -3));
                        } else {
                        if (metal1WtFinBalFinal >= parseFloat(document.getElementById('metal1WtRecBal').value)) {
                            metal1WtFinBalFinal = metal1WtFinBalFinal - parseFloat(document.getElementById('metal1WtRecBal').value.slice(0, -3));
                        } else {
                            
                            //metal1WtFinBalFinal = parseFloat(document.getElementById('metal1WtRecBal').value.slice(0, -3)) - metal1WtFinBalFinal;
                            //metal1WtFinBalFinalCRDR = payPanelNameCRDR;
                                if(typeof (document.getElementById('metal1RtCtWtBal') != 'undefined') && parseFloat(document.getElementById('metal1WtRecBal').value.slice(0, -3)) > parseFloat(document.getElementById('metal1WtPurBal').value.slice(0, -3))){
                                    metal1WtFinBalFinal = (parseFloat(document.getElementById('metal1RtCtWtBal').value.slice(0, -3)) + parseFloat(document.getElementById('metal1WtPurBal').value.slice(0, -3))) - parseFloat(document.getElementById('metal1WtRecBal').value.slice(0, -3));
                                } else
                                    metal1WtFinBalFinal = parseFloat(parseFloat(document.getElementById('metal1WtRecBal').value.slice(0, -3)) - parseFloat(metal1WtFinBalFinal).toFixed(3));
                                //
                            if (metal1WtFinBalFinal == 0 || metal1WtFinBalFinal == '0.000') {
                                //metal1WtFinBalFinalCRDR = payPanelNameCRDR;
                            } else {
                                metal1WtFinBalFinalCRDR = payPanelNameCRDR;
                            }
                        }
                    }
                }
            }
        }
        //
//        
//        alert('metal1WtFinBalFinal1: ' + metal1WtFinBalFinal);
//        alert('metal1WtFinBalFinalCRDR1: ' + metal1WtFinBalFinalCRDR);
        //
        var metal1WtFinBalFinalNew = parseFloat(metal1WtFinBalFinal).toFixed(3);
        document.getElementById('metal1WtFinBal').value = metal1WtFinBalFinalNew + ' ' + document.getElementById(prefix + 'GoldTotFineWtType').value;
        document.getElementById(prefix + 'GoldWtFinBal').value = metal1WtFinBalFinalNew;
        document.getElementById(prefix + 'FinalGdCRDR').value = metal1WtFinBalFinalCRDR;

        if (metal1WtFinBalFinalCRDR == 'CR') {
            document.getElementById('metal1WtFinBal').style.color = 'green';
            document.getElementById(prefix + 'FinalGdCRDR').style.color = 'green';
        } else if (metal1WtFinBalFinalCRDR == 'DR') {
            document.getElementById('metal1WtFinBal').style.color = 'red';
            document.getElementById(prefix + 'FinalGdCRDR').style.color = 'red';
        }
    }
    //
    if (metal2WtFinBalFinalCRDR != '' && metal2WtFinBalFinalCRDR != null) {
        //
        //
        //Prathamesh start code to ratecut and noratecut for silver
        //SL purchase
        if (typeof (document.getElementById('metal2WtPurBal') != 'undefined')) {
            if (document.getElementById('metal2WtPurBal') != null) {
                //
                if (parseFloat(document.getElementById('metal2WtPurBal').value) != 0
                        && parseFloat(document.getElementById('metal2WtPurBal').value) != ''
                        && parseFloat(document.getElementById('metal2WtPurBal').value) != null) {
                    //
                    if (payPanelName == 'PurchasePayment' || payPanelName == 'ItemReturnPanel' ||
                            payPanelName == 'PAYMENT' || payPanelName == 'PurchasePayUp' || payPanelName == 'StockReturnPanel') {
                        payPanelNameCRDR = 'CR';
                    } else {
                        payPanelNameCRDR = 'DR';
                    }
                    //
                    if (metal2WtFinBalFinalCRDR == payPanelNameCRDR) {
                        if(payPanelNameCRDR == 'CR') {                           
                            if(document.getElementById('paymentMode').value == 'NoRateCut') {
                                metal2WtFinBalFinal = parseFloat(parseFloat(document.getElementById('metal2WtPurBal').value.slice(0, -3)) + parseFloat(metal2WtFinBalFinal)).toFixed(3);
                            } else {                                
                                if(payPanelName == 'PurchasePayment' && parseFloat(metal2WtFinBalFinal) >= parseFloat(document.getElementById('metal2WtPurBal').value.slice(0, -3))) {
                                    metal2WtFinBalFinal = parseFloat(parseFloat(metal2WtFinBalFinal) + parseFloat(document.getElementById('metal2WtPurBal').value.slice(0, -3))).toFixed(3);
                                } else {     
                                    if(payPanelName == 'PurchasePayment') {
                                        metal2WtFinBalFinal = parseFloat(parseFloat(document.getElementById('metal2WtPurBal').value.slice(0, -3)) + parseFloat(metal2WtFinBalFinal)).toFixed(3);
                                    } else {
                                        metal2WtFinBalFinal = parseFloat(parseFloat(document.getElementById('metal2WtPurBal').value.slice(0, -3)) - parseFloat(metal2WtFinBalFinal)).toFixed(3);
                                    }                                    
                                }
                            }
                            metal2WtFinBalFinalCRDR = payPanelNameCRDR;
                        } else {                            
                            metal2WtFinBalFinal = metal2WtFinBalFinal + parseFloat(document.getElementById('metal2WtPurBal').value.slice(0, -3));
                            metal2WtFinBalFinalCRDR = payPanelNameCRDR;
                        }
                    } else {
                        if (metal2WtFinBalFinal >= parseFloat(document.getElementById('metal2WtPurBal').value)) {
                            metal2WtFinBalFinal = metal2WtFinBalFinal - parseFloat(document.getElementById('metal2WtPurBal').value.slice(0, -3));
                           // metal2WtFinBalFinalCRDR = payPanelNameCRDR;
                        } else if((metal2WtFinBalFinal <= parseFloat(document.getElementById('metal2WtPurBal').value)) && payPanelNameCRDR == 'CR') {
                            metal2WtFinBalFinal = parseFloat(document.getElementById('metal2WtPurBal').value.slice(0, -3)) - metal2WtFinBalFinal;
                            metal2WtFinBalFinalCRDR = payPanelNameCRDR;
                        } else {
                            metal2WtFinBalFinal = parseFloat(parseFloat(document.getElementById('metal2WtPurBal').value.slice(0, -3)) - metal2WtFinBalFinal).toFixed(3);
                            metal2WtFinBalFinalCRDR = payPanelNameCRDR;
                        }
                    }
                }
            }
        }
        //
        // Rate Cut   // GD RATE CUT
        if (typeof (document.getElementById('metal2RtCtWtBal') != 'undefined')) {
            if (document.getElementById('metal2RtCtWtBal') != null) {
                //
                if (payPanelName == 'PurchasePayment' || payPanelName == 'ItemReturnPanel' ||
                    payPanelName == 'PAYMENT' || payPanelName == 'PurchasePayUp' || payPanelName == 'StockReturnPanel') {
                    payPanelNameCRDR = 'DR';
                } else {
                    payPanelNameCRDR = 'CR';
                }
                //
                if (parseFloat(document.getElementById('metal2RtCtWtBal').value) != 0
                        && parseFloat(document.getElementById('metal2RtCtWtBal').value) != ''
                        && parseFloat(document.getElementById('metal2RtCtWtBal').value) != null) {
                    //
                    if (metal2WtFinBalFinalCRDR == payPanelNameCRDR && document.getElementById(prefix+'RtCtGdCRDR').value == 'CR' && document.getElementById(prefix + 'GoldWtPrevBalCRDR').value != 'CR') {
                        metal2WtFinBalFinal = parseFloat(metal2WtFinBalFinal) + parseFloat(document.getElementById('metal2RtCtWtBal').value.slice(0, -3));
                    } else {           
                        if (metal2WtFinBalFinal >= parseFloat(document.getElementById('metal2RtCtWtBal').value.slice(0, -3))) {                            
                            metal2WtFinBalFinal = metal2WtFinBalFinal - parseFloat(document.getElementById('metal2RtCtWtBal').value.slice(0, -3));   
                        } else {
                            metal2WtFinBalFinal = parseFloat(parseFloat(document.getElementById('metal2RtCtWtBal').value.slice(0, -3)) - parseFloat(metal2WtFinBalFinal)).toFixed(3);
//                            metal2WtFinBalFinalCRDR = document.getElementById(prefix + 'RtCtGdCRDR').value;
                        }
                    }
                }
            }
        }
        //
        // cash to Gold // CASH GD BAL
        
        if (typeof (document.getElementById('utin_cash_sl_bal') != 'undefined')) {
            if (document.getElementById('utin_cash_sl_bal') != null) {
                //
                if (parseFloat(document.getElementById('utin_cash_sl_bal').value) != 0
                        && parseFloat(document.getElementById('utin_cash_sl_bal').value) != ''
                        && parseFloat(document.getElementById('utin_cash_sl_bal').value) != null) {
                    //
                    if (metal2WtFinBalFinalCRDR == document.getElementById('utin_cash_sl_bal_CRDR').value) {
                        metal2WtFinBalFinal = metal2WtFinBalFinal + parseFloat(document.getElementById('utin_cash_sl_bal').value.slice(0, -3));
                    } else {
                        if (metal2WtFinBalFinal >= parseFloat(document.getElementById('utin_cash_sl_bal').value)) {
                            metal2WtFinBalFinal = metal2WtFinBalFinal - parseFloat(document.getElementById('utin_cash_sl_bal').value.slice(0, -3));
                        } else {
                            metal2WtFinBalFinal = parseFloat(document.getElementById('utin_cash_sl_bal').value.slice(0, -3)) - metal2WtFinBalFinal;
                            metal2WtFinBalFinalCRDR = document.getElementById('utin_cash_sl_bal_CRDR').value;
                        }
                    }
                }
            }
        }
        //
        //  CASH GD WT 
        if (typeof (document.getElementById('CashMetalSlBal') != 'undefined')) {
            if (document.getElementById('CashMetalSlBal') != null) {
                //
                if (parseFloat(document.getElementById('CashMetalSlBal').value) != 0
                        && parseFloat(document.getElementById('CashMetalSlBal').value) != ''
                        && parseFloat(document.getElementById('CashMetalSlBal').value) != null) {
                    //
                    if (metal2WtFinBalFinalCRDR == document.getElementById('CashMetalSlBalCRDR').value) {
                        metal2WtFinBalFinal = metal2WtFinBalFinal + parseFloat(document.getElementById('CashMetalSlBal').value.slice(0, -3));
                    } else {
                        if (metal2WtFinBalFinal >= parseFloat(document.getElementById('CashMetalSlBal').value)) {
                            metal2WtFinBalFinal = metal2WtFinBalFinal - parseFloat(document.getElementById('CashMetalSlBal').value.slice(0, -3));
                        } else {
                            metal2WtFinBalFinal = parseFloat(document.getElementById('CashMetalSlBal').value.slice(0, -3)) - metal2WtFinBalFinal;
                            metal2WtFinBalFinalCRDR = document.getElementById('CashMetalSlBalCRDR').value;
                        }
                    }
                }
            }
        }
        //
        //  GD REC  
        if (typeof (document.getElementById('metal2WtRecBal') != 'undefined')) {
            if (document.getElementById('metal2WtRecBal') != null) {
                //
                if (parseFloat(document.getElementById('metal2WtRecBal').value) != 0
                        && parseFloat(document.getElementById('metal2WtRecBal').value) != ''
                        && parseFloat(document.getElementById('metal2WtRecBal').value) != null) {
                    //
                    if (payPanelName == 'PurchasePayment' || payPanelName == 'PurchasePayUp' ||
                            payPanelName == 'ItemReturnPanel' || payPanelName == 'ItemReturnPayUp' ||
                            payPanelName == 'StockReturnPanel' || payPanelName == 'PAYMENT') {                        
                        payPanelNameCRDR = 'DR';
                    } else {
                        payPanelNameCRDR = 'CR';
                    }
                    //
                    if (metal2WtFinBalFinalCRDR == payPanelNameCRDR) {
                        metal2WtFinBalFinal = metal2WtFinBalFinal + parseFloat(document.getElementById('metal2WtRecBal').value.slice(0, -3));
                        } else {
                        if (metal2WtFinBalFinal >= parseFloat(document.getElementById('metal2WtRecBal').value)) {
                            metal2WtFinBalFinal = metal2WtFinBalFinal - parseFloat(document.getElementById('metal2WtRecBal').value.slice(0, -3));
                        } else {
                            
                            //metal2WtFinBalFinal = parseFloat(document.getElementById('metal2WtRecBal').value.slice(0, -3)) - metal2WtFinBalFinal;
                            //metal2WtFinBalFinalCRDR = payPanelNameCRDR;
                                if(typeof (document.getElementById('metal2RtCtWtBal') != 'undefined') && parseFloat(document.getElementById('metal2WtRecBal').value.slice(0, -3)) > parseFloat(document.getElementById('metal2WtPurBal').value.slice(0, -3))){
                                    metal2WtFinBalFinal = (parseFloat(document.getElementById('metal2RtCtWtBal').value.slice(0, -3)) + parseFloat(document.getElementById('metal2WtPurBal').value.slice(0, -3))) - parseFloat(document.getElementById('metal2WtRecBal').value.slice(0, -3));
                                } else
                                    metal2WtFinBalFinal = parseFloat(parseFloat(document.getElementById('metal2WtRecBal').value.slice(0, -3)) - parseFloat(metal2WtFinBalFinal).toFixed(3));
                                //
                            if (metal2WtFinBalFinal == 0 || metal2WtFinBalFinal == '0.000') {
                                //metal2WtFinBalFinalCRDR = payPanelNameCRDR;
                            } else {
                                metal2WtFinBalFinalCRDR = payPanelNameCRDR;
                            }
                        }
                    }
                }
            }
        }
        //
        var metal2WtFinBalFinalNew = parseFloat(metal2WtFinBalFinal).toFixed(3);
        document.getElementById('metal2WtFinBal').value = metal2WtFinBalFinalNew + ' ' + document.getElementById(prefix + 'SilverTotFineWtType').value;
        document.getElementById(prefix + 'SilverWtFinBal').value = metal2WtFinBalFinalNew;
        document.getElementById(prefix + 'FinalSlCRDR').value = metal2WtFinBalFinalCRDR;

        if (metal2WtFinBalFinalCRDR == 'CR') {
            document.getElementById('metal2WtFinBal').style.color = 'green';
            document.getElementById(prefix + 'FinalSlCRDR').style.color = 'green';
        } else if (metal2WtFinBalFinalCRDR == 'DR') {
            document.getElementById('metal2WtFinBal').style.color = 'red';
            document.getElementById(prefix + 'FinalSlCRDR').style.color = 'red';
        }
    }
    //
    //
    if (metal3WtFinBalFinalCRDR != '' && metal3WtFinBalFinalCRDR != null) {
        //
        //
        //
        //  GD PURCHASE  
        if (typeof (document.getElementById('metal3WtPurBal') != 'undefined')) {
            if (document.getElementById('metal3WtPurBal') != null) {
                //
                if (parseFloat(document.getElementById('metal3WtPurBal').value) != 0
                        && parseFloat(document.getElementById('metal3WtPurBal').value) != ''
                        && parseFloat(document.getElementById('metal3WtPurBal').value) != null) {

//                    alert('document.getElementById(metal3WtPurBal).value==' + document.getElementById('metal3WtPurBal').value);
                    //
                    if (payPanelName == 'PurchasePayment' || payPanelName == 'PAYMENT' ||
                            payPanelName == 'PurchasePayUp' || payPanelName == 'StockReturnPanel' ||
                            payPanelName == 'ItemReturnPanel' || payPanelName == 'ItemReturnPayUp') {
                        payPanelNameCRDR = 'CR';
                    } else {
                        payPanelNameCRDR = 'DR';
                    }
                    //
                    if (metal3WtFinBalFinalCRDR == payPanelNameCRDR) {
                        metal3WtFinBalFinal = metal3WtFinBalFinal + parseFloat(document.getElementById('metal3WtPurBal').value.slice(0, -3));
                    } else {
                        if (metal3WtFinBalFinal >= parseFloat(document.getElementById('metal3WtPurBal').value)) {
                            metal3WtFinBalFinal = metal3WtFinBalFinal - parseFloat(document.getElementById('metal3WtPurBal').value.slice(0, -3));
                        } else {
                            metal3WtFinBalFinal = parseFloat(document.getElementById('metal3WtPurBal').value.slice(0, -3)) - metal3WtFinBalFinal;
                            metal3WtFinBalFinalCRDR = payPanelNameCRDR;
                        }
                    }
                }
            }
        }
        //
//        alert('metal2WtFinBalFinalPURCHASE1: ' + metal2WtFinBalFinal);
//        alert('metal2WtFinBalFinalCRDRPURCHASE1: ' + metal2WtFinBalFinalCRDR);
        //
        //
        // Rate Cut   // GD RATE CUT
        if (typeof (document.getElementById('metal3RtCtWtBal') != 'undefined')) {
            if (document.getElementById('metal3RtCtWtBal') != null) {
                //
                if (parseFloat(document.getElementById('metal3RtCtWtBal').value) != 0
                        && parseFloat(document.getElementById('metal3RtCtWtBal').value) != ''
                        && parseFloat(document.getElementById('metal3RtCtWtBal').value) != null) {
                    //
                    if (metal3WtFinBalFinal >= parseFloat(document.getElementById('metal3RtCtWtBal').value)) {
                        metal3WtFinBalFinal = metal3WtFinBalFinal - parseFloat(document.getElementById('metal3RtCtWtBal').value.slice(0, -3));
                    } else {
                        metal3WtFinBalFinal = parseFloat(document.getElementById('metal3RtCtWtBal').value.slice(0, -3)) - metal3WtFinBalFinal;
                        metal3WtFinBalFinalCRDR = document.getElementById(prefix + 'RtCtStCRDR').value;
                    }
                }
            }
        }
//        alert('metal2WtFinBalFinalRateCut1: ' + metal2WtFinBalFinal);
//        alert('metal2WtFinBalFinalCRDRRateCut1: ' + metal2WtFinBalFinalCRDR);
        //
        // cash to Gold // CASH GD BAL
        if (typeof (document.getElementById('utin_cash_st_bal') != 'undefined')) {
            if (document.getElementById('utin_cash_st_bal') != null) {
                //
                if (parseFloat(document.getElementById('utin_cash_st_bal').value) != 0
                        && parseFloat(document.getElementById('utin_cash_st_bal').value) != ''
                        && parseFloat(document.getElementById('utin_cash_st_bal').value) != null) {
                    //
                    if (metal3WtFinBalFinalCRDR == document.getElementById('utin_cash_st_bal_CRDR').value) {
                        metal3WtFinBalFinal = metal3WtFinBalFinal + parseFloat(document.getElementById('utin_cash_st_bal').value.slice(0, -3));
                    } else {
                        if (metal3WtFinBalFinal >= parseFloat(document.getElementById('utin_cash_st_bal').value)) {
                            metal3WtFinBalFinal = metal3WtFinBalFinal - parseFloat(document.getElementById('utin_cash_st_bal').value.slice(0, -3));
                        } else {
                            metal3WtFinBalFinal = parseFloat(document.getElementById('utin_cash_st_bal').value.slice(0, -3)) - metal3WtFinBalFinal;
                            metal3WtFinBalFinalCRDR = document.getElementById('utin_cash_st_bal_CRDR').value;
                        }
                    }
                }
            }
        }
        //
//        alert('metal2WtFinBalFinal1: ' + metal2WtFinBalFinal);
//        alert('metal2WtFinBalFinalCRDR1: ' + metal2WtFinBalFinalCRDR);
        //
        //  CASH GD WT 
        if (typeof (document.getElementById('CashMetalStBal') != 'undefined')) {
            if (document.getElementById('CashMetalStBal') != null) {
                //
                if (parseFloat(document.getElementById('CashMetalStBal').value) != 0
                        && parseFloat(document.getElementById('CashMetalStBal').value) != ''
                        && parseFloat(document.getElementById('CashMetalStBal').value) != null) {
                    //
                    if (metal3WtFinBalFinalCRDR == document.getElementById('CashMetalStBalCRDR').value) {
                        metal3WtFinBalFinal = metal3WtFinBalFinal + parseFloat(document.getElementById('CashMetalStBal').value.slice(0, -3));
                    } else {
                        if (metal3WtFinBalFinal >= parseFloat(document.getElementById('CashMetalStBal').value)) {
                            metal3WtFinBalFinal = metal3WtFinBalFinal - parseFloat(document.getElementById('CashMetalStBal').value.slice(0, -3));
                        } else {
                            metal3WtFinBalFinal = parseFloat(document.getElementById('CashMetalStBal').value.slice(0, -3)) - metal3WtFinBalFinal;
                            metal3WtFinBalFinalCRDR = document.getElementById('CashMetalStBalCRDR').value;
                        }
                    }
                }
            }
        }
        //
//        alert('metal2WtFinBalFinal12: ' + metal2WtFinBalFinal);
//        alert('metal2WtFinBalFinalCRDR12: ' + metal2WtFinBalFinalCRDR);
        //
        //
        //  GD REC  
        if (typeof (document.getElementById('metal3WtRecBal') != 'undefined')) {
            if (document.getElementById('metal3WtRecBal') != null) {
                //
                if (parseFloat(document.getElementById('metal3WtRecBal').value) != 0
                        && parseFloat(document.getElementById('metal3WtRecBal').value) != ''
                        && parseFloat(document.getElementById('metal3WtRecBal').value) != null) {
                    //
                    if (payPanelName == 'PurchasePayment' || payPanelName == 'ItemReturnPanel' ||
                            payPanelName == 'PAYMENT' || payPanelName == 'StockReturnPanel') {
                        payPanelNameCRDR = 'DR';
                    } else {
                        payPanelNameCRDR = 'CR';
                    }
                    //
//                    alert('metal2WtFinBalFinal11: ' + metal2WtFinBalFinal);
//                    alert('metal2WtFinBalFinalCRDR11: ' + metal2WtFinBalFinalCRDR);
                    if (metal3WtFinBalFinalCRDR == payPanelNameCRDR) {
                        metal3WtFinBalFinal = metal3WtFinBalFinal + parseFloat(document.getElementById('metal3WtRecBal').value.slice(0, -3));
                    } else {
                        if (metal3WtFinBalFinal >= parseFloat(document.getElementById('metal3WtRecBal').value)) {
                            metal3WtFinBalFinal = metal3WtFinBalFinal - parseFloat(document.getElementById('metal3WtRecBal').value.slice(0, -3));
                        } else {

                            //metal3WtFinBalFinal = parseFloat(document.getElementById('metal3WtRecBal').value.slice(0, -3)) - metal3WtFinBalFinal;
                            //metal3WtFinBalFinalCRDR = payPanelNameCRDR;

                            metal3WtFinBalFinal = parseFloat(parseFloat(document.getElementById('metal3WtRecBal').value.slice(0, -3)) - parseFloat(metal3WtFinBalFinal).toFixed(3));

                            //alert('metal3WtFinBalFinal ## : ' + metal3WtFinBalFinal);

                            if (metal3WtFinBalFinal == 0 || metal3WtFinBalFinal == '0.000') {
                                //metal1WtFinBalFinalCRDR = payPanelNameCRDR;
                            } else {
                                metal3WtFinBalFinalCRDR = payPanelNameCRDR;
                            }

                        }
                    }
                }
            }
        }
        //
        var metal3WtFinBalFinalNew = parseFloat(metal3WtFinBalFinal).toFixed(3);
        document.getElementById('metal3WtFinBal').value = metal3WtFinBalFinalNew + ' ' + document.getElementById(prefix + 'CrystalTotFineWtType').value;
        document.getElementById(prefix + 'CrystalWtFinBal').value = metal3WtFinBalFinalNew;
        document.getElementById(prefix + 'FinalStCRDR').value = metal3WtFinBalFinalCRDR;

        if (metal3WtFinBalFinalCRDR == 'CR') {
            document.getElementById('metal3WtFinBal').style.color = 'green';
            document.getElementById(prefix + 'FinalStCRDR').style.color = 'green';
        } else if (metal3WtFinBalFinalCRDR == 'DR') {
            document.getElementById('metal3WtFinBal').style.color = 'red';
            document.getElementById(prefix + 'FinalStCRDR').style.color = 'red';
        }
    }

    //alert('TransCRDR @2@==' + document.getElementById(prefix + 'TransCRDR').value);
    //alert('FinalCashCRDR @2@==' + document.getElementById(prefix + 'FinalCashCRDR').value);
    //alert('PayableCashCRDR @2@==' + document.getElementById(prefix + 'PayableCashCRDR').value);
    //alert('PayPrevCashBalCRDR @2@==' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);

}

/*************************************************************************************************************/
// START CODE TO CHANGE METAL BALANCE ACCORDING TO METAL AMOUNT (REVERSE CALCULATION) @PRIYANKA-14FEB18
/*************************************************************************************************************/
function changeMetAmtCalcMetBal(prefix) {
    //
    // ID'S OF INPUT FIELDS (GOLD) @PRIYANKA-14FEB18
    //
    // GOLD METAL AMOUNT => GoldValuation
    // GOLD RATE => GoldRate
    // GOLD METAL RATE CUT => GoldRtCtWtBal
    // GOLD METAL RATE CUT TYPE => GoldRtCtWtBalType
    // GOLD WEIGHT BALANCE => PayGoldWtBal
    // GOLD WEIGHT BALANCE TYPE => PayGoldWtBalType

    // TO SET METAL BALANCE ACCORDING TO METAL AMOUNT @PRIYANKA-23MAR18
    setAmtToMetCon = 'changeMetAmtToMetWt';

    var goldValuation = parseFloat(document.getElementById(prefix + 'GoldValuation').value).toFixed(2); // GOLD METAL AMOUNT

    var silverValuation = parseFloat(document.getElementById(prefix + 'SilverValuation').value).toFixed(2); // SILVER METAL AMOUNT

    var crystalValuation = parseFloat(document.getElementById(prefix + 'CrystalValuation').value).toFixed(2); // CRYSTAL AMOUNT @PRIYANKA-30DEC2022

    if (goldValuation != '' && goldValuation != null && goldValuation > 0) { // GOLD METAL AMOUNT

        var goldWeightType = (document.getElementById(prefix + 'GoldRtCtWtBalType').value); // GOLD METAL RATE CUT TYPE
        var goldRate = parseFloat(document.getElementById(prefix + 'GoldRate').value).toFixed(2); // GOLD RATE

        if (goldWeightType == 'KG') { // GOLD METAL RATE CUT TYPE
            document.getElementById(prefix + 'GoldRtCtWtBal').value = ((goldValuation) / (goldRate * document.getElementById('gmWtInKg').value)).toFixed(3); // GOLD METAL RATE CUT
        } else if (goldWeightType == 'GM') { // GOLD METAL RATE CUT TYPE
            document.getElementById(prefix + 'GoldRtCtWtBal').value = ((document.getElementById('gmWtInGm').value * goldValuation) / (goldRate)).toFixed(3); // GOLD METAL RATE CUT            
        } else if (goldWeightType == 'MG') { // GOLD METAL RATE CUT TYPE
            document.getElementById(prefix + 'GoldRtCtWtBal').value = ((document.getElementById('gmWtInMg').value * goldValuation) / (goldRate)).toFixed(3); // GOLD METAL RATE CUT
        }

        document.getElementById(prefix + 'PayGoldWtBal').value = parseFloat(document.getElementById(prefix + 'GoldRtCtWtBal').value).toFixed(2); // GOLD WEIGHT BALANCE

        if (document.getElementById(prefix + 'PayGoldWtBal').value == '' || document.getElementById(prefix + 'PayGoldWtBal').value == 'NaN') {
            document.getElementById(prefix + 'PayGoldWtBal').value = 0;
        }

    } else if (silverValuation != '' && silverValuation != null && silverValuation > 0) { // SILVER METAL AMOUNT
        //
        // ID'S OF INPUT FIELDS (SILVER) @PRIYANKA-14FEB18
        //
        // SILVER METAL AMOUNT => SilverValuation
        // SILVER RATE => SilverRate
        // SILVER METAL RATE CUT => SilverRtCtWtBal
        // SILVER METAL RATE CUT TYPE => SilverRtCtWtBalType
        // SILVER WEIGHT BALANCE => PaySilverWtBal
        // SILVER WEIGHT BALANCE TYPE => PaySilverWtBalType

        var silverWeightType = (document.getElementById(prefix + 'SilverRtCtWtBalType').value); // SILVER METAL RATE CUT TYPE

        var silverRate = parseFloat(document.getElementById(prefix + 'SilverRate').value).toFixed(2); // SILVER RATE

        if (silverWeightType == 'KG') { // SILVER METAL RATE CUT TYPE
            document.getElementById(prefix + 'SilverRtCtWtBal').value = ((silverValuation) / (silverRate * document.getElementById('srGmWtInKg').value)).toFixed(2); // SILVER METAL RATE CUT     
        } else if (silverWeightType == 'GM') { // SILVER METAL RATE CUT TYPE
            document.getElementById(prefix + 'SilverRtCtWtBal').value = ((document.getElementById('srGmWtInGm').value * silverValuation) / (silverRate)).toFixed(2); // SILVER METAL RATE CUT    
        } else if (silverWeightType == 'MG') { // SILVER METAL RATE CUT TYPE
            document.getElementById(prefix + 'SilverRtCtWtBal').value = ((document.getElementById('srGmWtInMg').value * silverValuation) / (silverRate)).toFixed(2); // SILVER METAL RATE CUT 
        }

        document.getElementById(prefix + 'PaySilverWtBal').value = parseFloat(document.getElementById(prefix + 'SilverRtCtWtBal').value).toFixed(2); // SILVER WEIGHT BALANCE

        if (document.getElementById(prefix + 'PaySilverWtBal').value == '' || document.getElementById(prefix + 'PaySilverWtBal').value == 'NaN') {
            document.getElementById(prefix + 'PaySilverWtBal').value = 0;
        }

    } else if (crystalValuation != '' && crystalValuation != null && crystalValuation > 0) { // CRYSTAL AMOUNT @PRIYANKA-30DEC2022
        //
        // ID'S OF INPUT FIELDS (CRYSTAL) @PRIYANKA-30DEC2022
        //
        // CRYSTAL AMOUNT => CrystalValuation
        // CRYSTAL RATE => CrystalRate
        // CRYSTAL RATE CUT => CrystalRtCtWtBal
        // CRYSTAL RATE CUT TYPE => CrystalRtCtWtBalType
        // CRYSTAL WEIGHT BALANCE => PayCrystalWtBal
        // CRYSTAL WEIGHT BALANCE TYPE => PayCrystalWtBalType
//
//
//        var crystalWeightType = (document.getElementById(prefix + 'CrystalRtCtWtBalType').value); // CRYSTAL RATE CUT TYPE @PRIYANKA-30DEC2022
//
//        var crystalRate = parseFloat(document.getElementById(prefix + 'CrystalRate').value).toFixed(2); // CRYSTAL RATE @PRIYANKA-30DEC2022
//                
//        if (crystalWeightType == 'KG') { // CRYSTAL RATE CUT TYPE
//            document.getElementById(prefix + 'CrystalRtCtWtBal').value = ((crystalValuation) / (crystalRate)).toFixed(2); // CRYSTAL RATE CUT @PRIYANKA-30DEC2022      
//        } else if (crystalWeightType == 'GM') { // CRYSTAL RATE CUT TYPE
//            document.getElementById(prefix + 'CrystalRtCtWtBal').value = ((crystalValuation) / (crystalRate)).toFixed(2); // CRYSTAL RATE CUT @PRIYANKA-30DEC2022    
//        } else if (crystalWeightType == 'MG') { // CRYSTAL RATE CUT TYPE
//            document.getElementById(prefix + 'CrystalRtCtWtBal').value = ((crystalValuation) / (crystalRate)).toFixed(2); // CRYSTAL RATE CUT @PRIYANKA-30DEC2022 
//        } else {
//            document.getElementById(prefix + 'CrystalRtCtWtBal').value = ((crystalValuation) / (crystalRate)).toFixed(2); // CRYSTAL RATE CUT @PRIYANKA-30DEC2022     
//        }
//
//        document.getElementById(prefix + 'PayCrystalWtBal').value = parseFloat(document.getElementById(prefix + 'CrystalRtCtWtBal').value).toFixed(2); // CRYSTAL WEIGHT BALANCE @PRIYANKA-30DEC2022
//
//
        // 
        // CRYSTAL WEIGHT BALANCE @PRIYANKA-30DEC2022
        var crystalWeight = parseFloat(document.getElementById(prefix + 'PayCrystalWtBal').value).toFixed(3);
        // 
        // CALCULATE CRYSTAL NEW RATE @PRIYANKA-30DEC2022
        var crystalNewRate = parseFloat(parseFloat(crystalValuation) / parseFloat(crystalWeight)).toFixed(2);
        // 
        // CRYSTAL RATE @PRIYANKA-30DEC2022
        document.getElementById(prefix + 'CrystalRate').value = parseFloat(crystalNewRate).toFixed(2);
        // 
        // CRYSTAL WEIGHT BALANCE @PRIYANKA-30DEC2022
        if (document.getElementById(prefix + 'PayCrystalWtBal').value == '' || document.getElementById(prefix + 'PayCrystalWtBal').value == 'NaN') {
            document.getElementById(prefix + 'PayCrystalWtBal').value = 0;
        }
        // 
        // CRYSTAL RATE CUT @PRIYANKA-30DEC2022
        document.getElementById(prefix + 'CrystalRtCtWtBal').value = parseFloat(document.getElementById(prefix + 'PayCrystalWtBal').value).toFixed(3);
        //
    }
}
/*************************************************************************************************************/
// END CODE TO CHANGE METAL BALANCE ACCORDING TO METAL AMOUNT (REVERSE CALCULATION) @PRIYANKA-14FEB18
/*************************************************************************************************************/

/*************************************************************************************************************/
// START CODE TO FOR DISCOUNT IN %, DISCOUNT AMT CALCULATED @PRIYANKA-05MAR18
/*************************************************************************************************************/
function calDiscountAmt(prefix) {
    var discountAmt = 0;
    var totalAmt = 0;
    var discountPer = 0;
    var discountPer = document.getElementById('utin_discount_per_discup').value; // DISCOUNT IN % @PRIYANKA-05MAR18
    var discountTotalAmount = document.getElementById('utin_discount_amt_discup').value;
    var discountonvalue = document.getElementById('utin_discount_on').value.trim(); // DISCOUNT AMT @PRIYANKA-05MAR18
    //
    // DISCOUNT AMOUNT DISCUP DISPLAY
    if (document.getElementById('utin_discount_amt_discup').value == '' || document.getElementById('utin_discount_amt_discup').value == 'NaN') {
        document.getElementById('discountAmtDisp').value = '0.00';
    } else {
        document.getElementById('discountAmtDisp').value = parseFloat(document.getElementById('utin_discount_amt_discup').value).toFixed(2);
    }
    //
    if ((discountPer > 0 && discountPer != 'NaN') || (discountTotalAmount != 'NaN' && discountTotalAmount > 0)) {
        // 
        // DISCOUNT IN % 
        if (discountPer == '' || discountPer == 'NaN') {
            discountPer = 0;
        }
        // 
        // TOTAL AMOUNT (METAL VALUATION)
        var utin_total_amt = document.getElementById(prefix + 'PayTotAmt').value;
        if (utin_total_amt == '' || utin_total_amt == 'NaN') {
            utin_total_amt = 0;
        }
        // 
        // CRYSTAL AMOUNT
        var utin_crystal_amt = document.getElementById(prefix + 'PayCrystalAmt').value;
        if (utin_crystal_amt == '' || utin_crystal_amt == 'NaN') {
            utin_crystal_amt = 0;
        }
        //
        //
        //
        // OTHER CHARGES AMOUNT
        var otherChrgs = document.getElementById(prefix + 'PayCashOthChgsDisp').value; // Other Charges
        if (typeof (otherChrgs) != 'undefined' && otherChrgs != null) {
            otherChrgs = otherChrgs.replace(/\,/g, '');
        }
        // 
        // HALLMARK CHARGES @PRIYANKA-27MAY2022 
        var hallmarkChrgs = document.getElementById(prefix + 'PayHallmarkChgsDisp').value; // HallmarkChrgs Charges
        //
        if (typeof (hallmarkChrgs) != 'undefined' && hallmarkChrgs != null) {
            hallmarkChrgs = hallmarkChrgs.replace(/\,/g, '');
        }
        //
        // START CODE YUVRAJ ADD THIS CODE FOR RETAILS SOFTWARE HallmarkChrgs Charges YUVRAJ @11062022
        var hallmarkChrgs = document.getElementById(prefix + 'PayHallmarkChgsDisp').value;
        if (hallmarkChrgs == '' || hallmarkChrgs == 'NaN') {
            hallmarkChrgs = 0;
        }
        // END CODE YUVRAJ ADD THIS CODE FOR RETAILS SOFTWARE HallmarkChrgs Charges YUVRAJ @11062022
        //
        //
        //alert('reverseCalculation == ' + document.getElementById('reverseCalculation').value);
        //
        //
        if (document.getElementById('utin_pay_tax_on_total_amt_chk').checked) {
            // TOTAL AMOUNT (METAL VALUATION + CRYSTAL AMOUNT + OTHER CHARGES)
            if (document.getElementById('reverseCalculation').value == 'Yes') { // Checking Variable For Reverse Calculation @PRIYANKA-15OCT18
                // MAA SAGAR BHAI - REVERSE CALCULATION REQUIREMENT (TAX ON TOT AMT CASE) @PRIYANKA-15OCT18
                totalAmt = (parseFloat(utin_total_amt) + parseFloat(utin_crystal_amt)).toFixed(2);
            } else {
                // RAJAWAT DISCOUNT ON TOTAL AMT ISSUE (TAX ON TOT AMT CASE) @PRIYANKA-15OCT18
                totalAmt = (parseFloat(utin_total_amt) + parseFloat(utin_crystal_amt) + parseFloat(otherChrgs) + parseFloat(hallmarkChrgs)).toFixed(2);
            }
        } else {
            // TOTAL AMOUNT (METAL VALUATION + CRYSTAL AMOUNT + OTHER CHARGES)
            totalAmt = ((parseFloat(utin_total_amt) + parseFloat(utin_crystal_amt))).toFixed(2);
        }
          //start code added to apply dicount by coupon code -@ASHWINI-31OCT2023 
        if (discountonvalue == 'Making') {
           totalAmt = parseFloat(otherChrgs).toFixed(2);
        } else if (discountonvalue == 'Metal') {
          totalAmt = parseFloat(utin_total_amt).toFixed(2);
        } else if (discountonvalue == 'Crystal') {
         totalAmt = parseFloat(utin_crystal_amt).toFixed(2);
        } 
        //end code added to apply dicount by coupon code -@ASHWINI-31OCT2023 
        //
        //
        // START CODE TO CALCULATE DISCOUNT AMOUNT ACCORDING TO DISCOUNT IN % @PRIYANKA-05MAR18
        if ((document.getElementById('utin_discount_per_discup').value != '') && (document.getElementById('utin_discount_amt_discup').value == '' || document.getElementById('utin_discount_amt_discup').value == '0.00')) {
            // CALCULATE DISCOUNT AMT
            discountAmt = (parseFloat(totalAmt) * parseFloat(discountPer) / 100).toFixed(2);
            // END CODE TO CALCULATE DISCOUNT AMOUNT ACCORDING TO DISCOUNT IN % @PRIYANKA-05MAR18
        } else {
            // START CODE TO CALCULATE DISCOUNT IN % ACCORDING TO DISCOUNT AMT @PRIYANKA-05MAR18
            // DISCOUNT AMT
            discountAmt = parseFloat(document.getElementById('utin_discount_amt_discup').value).toFixed(2);
            //
            if (totalAmt > 0) {
                var utin_discount_per_discup = ((parseFloat(discountAmt) * 100) / parseFloat(totalAmt)).toFixed(2);
                //
                document.getElementById('utin_discount_per_discup').value = parseFloat(utin_discount_per_discup).toFixed(2);
            }
            // END CODE TO CALCULATE DISCOUNT IN % ACCORDING TO DISCOUNT AMT @PRIYANKA-05MAR18
        }
        //
        // DISCOUNT AMT
        document.getElementById('utin_discount_amt_discup').value = (parseFloat(discountAmt)).toFixed(2);
        // 
        // DISCOUNT AMT DISCUP DISPLAY
        document.getElementById('discountAmtDisp').value = (parseFloat(discountAmt)).toFixed(2);
        //
        //document.getElementById(prefix + 'PayDiscountDisp').value = Math_round(parseFloat(discountAmt)).toFixed(2);
        //
        //
        if (totalAmt > 0) {
            // 
            // TAX APPLY ON AMOUNT
            document.getElementById('taxOnTotAmt').value = (parseFloat(totalAmt) - (parseFloat(discountAmt))).toFixed(2);
            document.getElementById('taxOnCGSTTotAmt').value = (parseFloat(totalAmt) - (parseFloat(discountAmt))).toFixed(2);
            document.getElementById('taxOnSGSTTotAmt').value = (parseFloat(totalAmt) - (parseFloat(discountAmt))).toFixed(2);
            document.getElementById('taxOnIGSTTotAmt').value = (parseFloat(totalAmt) - (parseFloat(discountAmt))).toFixed(2);
            // 
            // TAXABLE AMOUNT
            document.getElementById('taxableAmount').value = (parseFloat(totalAmt) - (parseFloat(discountAmt))).toFixed(2);
            // 
            // 
            // alert(document.getElementById('taxableAmount').value  = (parseFloat(totalAmt) - Math_round(parseFloat(discountAmt))).toFixed(2));
            //   
            //        
            // OTHER CHARGES
            // If Payment Mode in ByCash then value added add in other charges @PRIYANKA-22MAR18
//            if (document.getElementById('paymentMode').value == 'ByCash') {
//                var utin_oth_chgs_amt = parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value) + parseFloat(document.getElementById('valueAdded').value);
//                document.getElementById(prefix + 'PayCashOthChgsDisp').value = Math_round(parseFloat(utin_oth_chgs_amt)).toFixed(2);
//            } else {
            //
            var utin_oth_chgs_amt = (parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value)).toFixed(2);
            //            
//            }
            //
            //
            if (utin_oth_chgs_amt == '' || utin_oth_chgs_amt == 'NaN') {
                utin_oth_chgs_amt = 0;
            }
            //
            //
            // HALLMARK CHARGES @PRIYANKA-27MAY2022 
            var utin_hallmark_chrgs_amt = (parseFloat(document.getElementById(prefix + 'PayTotHallmarkChgs').value)).toFixed(2);
            //
            if (utin_hallmark_chrgs_amt == '' || utin_hallmark_chrgs_amt == 'NaN') {
                utin_hallmark_chrgs_amt = 0;
            }
            //
            //
            // SEPARATE TAX ON OTHER CHARGES
            //if (document.getElementById('MkgTaxCheck').checked != true) {
            var metCryAmt = (parseFloat(totalAmt) - (parseFloat(discountAmt))).toFixed(2);

            // TAX ON TOTAL AMT CHECK - DISCOUNT APPLY BEFORE GST @PRIYANKA-28NOV18
            if (document.getElementById('utin_pay_tax_on_total_amt_chk').checked) {

                if (document.getElementById('utin_discount_per_discup').value != '' &&
                        document.getElementById('utin_discount_amt_discup').value != '' &&
                        document.getElementById('reverseCalculation').value != 'Yes') {
                    document.getElementById(prefix + 'PayTotCashAmt').value = (parseFloat(metCryAmt)).toFixed(2);
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = (parseFloat(metCryAmt)).toFixed(2);
                } else {
                    document.getElementById(prefix + 'PayTotCashAmt').value = ((parseFloat(metCryAmt) + parseFloat(utin_oth_chgs_amt) + parseFloat(utin_hallmark_chrgs_amt))).toFixed(2);
                    document.getElementById(prefix + 'PayTotCashAmtDisp').value = ((parseFloat(metCryAmt) + parseFloat(utin_oth_chgs_amt) + parseFloat(utin_hallmark_chrgs_amt))).toFixed(2);
                }
            } else {
                document.getElementById(prefix + 'PayTotCashAmt').value = ((parseFloat(metCryAmt) + parseFloat(utin_oth_chgs_amt) + parseFloat(utin_hallmark_chrgs_amt))).toFixed(2);
                document.getElementById(prefix + 'PayTotCashAmtDisp').value = ((parseFloat(metCryAmt) + parseFloat(utin_oth_chgs_amt) + parseFloat(utin_hallmark_chrgs_amt))).toFixed(2);
            }

        }
        //} else {
        //document.getElementById(prefix + 'PayTotCashAmt').value = (parseFloat(totalAmt) - Math_round(parseFloat(discountAmt))).toFixed(2);
        //document.getElementById(prefix + 'PayTotCashAmtDisp').value = (parseFloat(totalAmt) - Math_round(parseFloat(discountAmt))).toFixed(2);
        //}
        //
        //alert('PayTotCashAmt @@==' + document.getElementById(prefix + 'PayTotCashAmt').value);
        //
        //document.getElementById(prefix + 'PayTotCashAmt').value = Math_round(parseFloat(document.getElementById('taxableAmount').value) + parseFloat(utin_oth_chgs_amt)).toFixed(2);
        //document.getElementById(prefix + 'PayTotCashAmtDisp').value = Math_round(parseFloat(document.getElementById('taxableAmount').value) + parseFloat(utin_oth_chgs_amt)).toFixed(2);
        //
        //
        //alert('PayPrevAmtDisp @@==' + document.getElementById(prefix + 'PayPrevAmtDisp').value);
        //alert('PayPrevCashBalCRDR @@==' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);                
        //alert('PayTotCashAmt @@==' + document.getElementById(prefix + 'PayTotCashAmt').value);
        //alert('PayTotCashAmtDisp @@==' + document.getElementById(prefix + 'PayTotCashAmtDisp').value);
        //alert('PayableCashCRDR @@==' + document.getElementById(prefix + 'PayableCashCRDR').value);
        //
        //
    }
}
/*************************************************************************************************************/
// END CODE TO FOR DISCOUNT IN %, DISCOUNT AMT CALCULATED @PRIYANKA-05MAR18
/*************************************************************************************************************/
//
// START CODE TO RESET METAL BALANCE ACCORDING TO METAL AMOUNT @PRIYANKA-23MAR18
function resetChangeMetAmtCalcMetBal() {
    setAmtToMetCon = 'changeMetWtToMetAmt';
}
// END CODE TO RESET METAL BALANCE ACCORDING TO METAL AMOUNT @PRIYANKA-23MAR18
//
function calLoyaltyPoints(prefix) {
    var lpAmount = parseFloat(document.getElementById('lpAmtValue').value).toFixed(2);
    var finalAmount = parseFloat(document.getElementById('taxableAmount').value).toFixed(2);

    var Gain = parseFloat(finalAmount) / parseFloat(lpAmount);

    if (document.getElementById('lpGain').value == 'NaN' || document.getElementById('lpGain').value == '') {
        document.getElementById('lpGain').value = '0.00';
    }
    //
    if(document.getElementById('payPanelName').value == 'StockReturnPanel' && prefix == 'stock'){
        Gain = 0 - Gain;
    }else if(document.getElementById('transPanelName').value == 'PurchasePayment' && document.getElementById('payPanelName').value != 'SlPrPayment'){
        Gain = 0;
    }
    //
    document.getElementById("lpGain").value = Math_round(parseFloat(Gain)).toFixed(2);

    if (document.getElementById('lpOpening').value == 'NaN' || document.getElementById('lpOpening').value == '') {
        document.getElementById('lpOpening').value = '0.00';
    }

    var lpOpen = parseFloat(document.getElementById('lpOpening').value).toFixed(2);

    if (lpOpen == 'NaN' || lpOpen == '') {
        lpOpen = 0.00;
    }

    if (document.getElementById('lpRedeem').value == 'NaN' || document.getElementById('lpRedeem').value == '') {
        document.getElementById('lpRedeem').value = '0.00';
    }

    if (document.getElementById('lpRedeemDisp').value == 'NaN' || document.getElementById('lpRedeemDisp').value == '') {
        document.getElementById('lpRedeemDisp').value = '0.00';
    }


    //alert(document.getElementById('lpRedeemDisp').value);

    var lpReddemPoints = Math_round(parseFloat(document.getElementById('lpRedeem').value)).toFixed(2);

    if (lpReddemPoints == 'NaN' || lpReddemPoints == '') {
        lpReddemPoints = '0.00';
    }

    var closingBal = Math_round(parseFloat(lpOpen) + parseFloat(Gain)).toFixed(2);

    //alert('closingBal == ' + closingBal);   
    //alert('lpReddemPoints == ' + lpReddemPoints);


//LOYALTY AMOUNT = LOYALTY VALUE * LOYALTY POINTS CODE BEGINS  AUTHOR@ AMRUTA VANDKAR 11 MAY 2022

    if (Number(lpReddemPoints) > Number(closingBal) && Number(lpReddemPoints) > 0) {

        alert('You dont have sufficient loyalty points to redeem');
        document.getElementById('lpRedeem').value = '0.00';

    } else if ((parseFloat(document.getElementById('lpRedeem').value) * parseFloat(document.getElementById('LP_Value').value).toFixed(2)) != '0.00' && (parseFloat(document.getElementById('MinLpLimit').value) >= parseFloat(document.getElementById('lpRedeem').value) * parseFloat(document.getElementById('LP_Value').value).toFixed(2)) || (parseFloat(document.getElementById('MaxLpLimit').value) < (parseFloat(document.getElementById('lpRedeem').value) * parseFloat(document.getElementById('LP_Value').value).toFixed(2)))) {
        alert('You Cross Loality Point Limit');
        document.getElementById('lpRedeem').value = '0.00';    //Adding Code To Check Loyalty Point Limit @Author:Vinod
    } else {

        document.getElementById('lpRedeemDisp').value = parseFloat(document.getElementById('lpRedeem').value) * parseFloat(document.getElementById('LP_Value').value).toFixed(2);

//        document.getElementById('lpRedeemDisp').value = parseFloat(document.getElementById('lpRedeem').value).toFixed(2);

        var closingBal = ((parseFloat(lpOpen) + parseFloat(Gain)) - parseFloat(lpReddemPoints));
        document.getElementById("lpClosing").value = Math_round(parseFloat(closingBal)).toFixed(2);

        if (parseInt(closingBal) < 0 || isNaN(closingBal)) {
            var closingBal = (parseFloat(lpOpen) + parseFloat(Gain));
            document.getElementById("lpClosing").value = Math_round(parseFloat(closingBal)).toFixed(2);
        }
        calDiscountAmt(prefix);
        calcPaymentCashBalance(prefix);
    }

    //var finalCashBal = parseFloat(document.getElementById(prefix + "PayFinAmtBalDisp").value) - parseFloat(document.getElementById("lpRedeemDisp").value);
    //document.getElementById(prefix + "PayFinAmtBalDisp").value = parseFloat(finalCashBal).toFixed(2);

}

//LOYALTY AMOUNT = LOYALTY VALUE * LOYALTY POINTS CODE ENDS HERE 


// *************************************************************************************************************/
// START CODE TO CONVERT AMOUNT TO METAL WEIGHT @PRIYANKA-05APR18
// *************************************************************************************************************/
function calcCashToMetal(prefix) {

    // alert('utin_prev_cash_opening == ' + document.getElementById("utin_prev_cash_opening").value);
    // alert('PrevTotOpeningAmt == ' + document.getElementById("PrevTotOpeningAmt").value);
    // alert(document.getElementById("utin_cash_to_metal").value);

    // GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG
    // START CASH TO METAL FUNCTIONALITY FOR GOLD @PRIYANKA-05APR18
    // GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG

    //alert('utin_prev_cash_opening == ' + document.getElementById("utin_prev_cash_opening").value);

    if (document.getElementById("utin_prev_cash_opening").value == '0.00' ||
            document.getElementById("utin_prev_cash_opening").value == 'NaN' ||
            document.getElementById("utin_prev_cash_opening").value == '') {
        document.getElementById("utin_cash_to_metal").readOnly = true;
    } else {
        document.getElementById("utin_cash_to_metal").readOnly = false;
    }
    //
    //
    if (document.getElementById("utin_sl_prev_cash_opening").value == '0.00' ||
            document.getElementById("utin_sl_prev_cash_opening").value == 'NaN' ||
            document.getElementById("utin_sl_prev_cash_opening").value == '') {
        document.getElementById("utin_sl_cash_to_metal").readOnly = true;
    } else {
        document.getElementById("utin_sl_cash_to_metal").readOnly = false;
    }
//
//
    if (document.getElementById("utin_st_prev_cash_opening").value == '0.00' ||
            document.getElementById("utin_st_prev_cash_opening").value == 'NaN' ||
            document.getElementById("utin_st_prev_cash_opening").value == '') {
        document.getElementById("utin_st_cash_to_metal").readOnly = true;
    } else {
        document.getElementById("utin_st_cash_to_metal").readOnly = false;
    }
    // CASH AMOUNT CONVERT TO METAL @PRIYANKA-05APR18
    if (document.getElementById("utin_cash_to_metal").value == 'NaN') {
        document.getElementById("utin_cash_to_metal").value = '0.00';
    }
    //
    if (document.getElementById("utin_cash_to_metal").value == '0.00') {

        if (document.getElementById("utin_cash_to_metal").value == '') {
            document.getElementById("utin_cash_to_metal").value = parseFloat(document.getElementById("utin_prev_cash_opening").value).toFixed(2);
        }
    }

    // PREV CASH OPENING AMOUNT @PRIYANKA-05APR18
    if (document.getElementById("utin_prev_cash_opening").value == '' || document.getElementById("utin_prev_cash_opening").value == 'NaN') {
        document.getElementById("utin_prev_cash_opening").value = '0.00';
    }

    // alert('utin_cash_to_metal == ' + document.getElementById("utin_cash_to_metal").value);

    // CALCUALTE PREV CASH BALANCE @PRIYANKA-05APR18
    // PREV CASH BAL = (PREV CASH OPENING - CASH AMOUNT CONVERT TO METAL)
    var utin_prev_cash_bal = Math_round(parseFloat(document.getElementById("utin_prev_cash_opening").value) - parseFloat(document.getElementById("utin_cash_to_metal").value)).toFixed(2);

    // PREV CASH BAL
    if (utin_prev_cash_bal == '' || utin_prev_cash_bal == 'NaN') {
        utin_prev_cash_bal = '0.00';
    }

    // PREV CASH BALANCE @PRIYANKA-05APR18
    document.getElementById("utin_prev_cash_bal").value = parseFloat(utin_prev_cash_bal).toFixed(2);
    // PREV CASH BALANCE CRDR @PRIYANKA-05APR18
    if (utin_prev_cash_bal >= 0) {
        document.getElementById("utin_prev_cash_bal_CRDR").value = document.getElementById("utin_prev_cash_opening_CRDR").value;
    } else {
        // PREV CASH BALANCE CRDR
        if (document.getElementById("utin_prev_cash_opening_CRDR").value == 'CR') {
            document.getElementById("utin_prev_cash_bal_CRDR").value = 'DR';
        } else if (document.getElementById("utin_prev_cash_opening_CRDR").value == 'DR') {
            document.getElementById("utin_prev_cash_bal_CRDR").value = 'CR';
        }

    }

    // CASH AMOUNT THAT CONVERT TO METAL WEIGHT @PRIYANKA-05APR18
    var utin_cash_to_metal = parseFloat(document.getElementById("utin_cash_to_metal").value).toFixed(2);

    // CASH AMOUNT
    if (utin_cash_to_metal == 'NaN') {
        utin_cash_to_metal = '0.00';
    } else if (utin_cash_to_metal != 0) {
        document.getElementById("utin_cash_to_metal").value = parseFloat(utin_cash_to_metal).toFixed(2);
    }

    // METAL RATE @PRIYANKA-05APR18
    if (document.getElementById('utin_metal_rate').value == '') {
        document.getElementById('utin_metal_rate').value = parseFloat(document.getElementById(prefix + 'GoldRate').value);
    }

    // METAL RATE
    var utin_metal_rate = parseFloat(document.getElementById('utin_metal_rate').value).toFixed(2); // METAL RATE

    // METAL RATE
    if (utin_metal_rate == '' || utin_metal_rate == 'NaN') {
        utin_metal_rate = '0.00';
    }

    // CALCULATE METAL WEIGHT ACCORDING TO AMOUNT @PRIYANKA-05APR18
    // METAL WT = ((WT IN GM * AMOUNT CONVERT TO METAL) / METAL RATE)
    var totalWeight = ((document.getElementById('gmWtInGm').value * parseFloat(utin_cash_to_metal)) / parseFloat(utin_metal_rate)).toFixed(3);

    if (totalWeight == '' || totalWeight == 'NaN') {
        totalWeight = '0.00';
    }

    // METAL PURITY @PRIYANKA-05APR18    
    if (document.getElementById('utin_purity').value == '' || document.getElementById('utin_purity').value == 'NaN') {
        document.getElementById('utin_purity').value = '100';
    }

    var utin_purity = parseFloat(document.getElementById('utin_purity').value);

    if (utin_purity == '' || utin_purity == 'NaN') {
        utin_purity = '0.00';
    }

    // CALCULATE METAL FINAL FINE WEIGHT @PRIYANKA-05APR18
    var finalMetalWeight = ((parseFloat(totalWeight) * parseFloat(utin_purity)) / 100).toFixed(3);

    if (finalMetalWeight == '' || finalMetalWeight == 'NaN') {
        finalMetalWeight = '0.00';
    }

    // alert('totalWeight == ' + totalWeight);
    // alert('finalMetalWeight == ' + finalMetalWeight);

    // METAL FINAL FINE WEIGHT
    document.getElementById('utin_cash_to_metalwt').value = parseFloat(finalMetalWeight).toFixed(3);
    // METAL FINAL FINE WEIGHT CRDR
    document.getElementById('utin_cash_to_metalwt_CRDR').value = document.getElementById("utin_prev_cash_opening_CRDR").value;
    // CASH TO METAL WEIGHT BAL TYPE
    var utin_cash_gd_bal_type = 'GM';
    // CASH TO METAL WEIGHT BAL 
    document.getElementById('utin_cash_gd_bal').value = parseFloat(document.getElementById('utin_cash_to_metalwt').value).toFixed(3) + ' ' + utin_cash_gd_bal_type;
    // CASH TO METAL WEIGHT BAL CRDR
    document.getElementById('utin_cash_gd_bal_CRDR').value = document.getElementById("utin_cash_to_metalwt_CRDR").value;

    // if (document.getElementById('paymentMode').value == 'RateCut') {

    // alert('PayTotAmtBalDisp **==' + document.getElementById(prefix + "PayTotAmtBalDisp").value);

    // document.getElementById(prefix + "PayTotAmtBalDisp").value = Math_round(parseFloat(document.getElementById(prefix + "PayTotAmtBalDisp").value) + parseFloat(document.getElementById("utin_cash_to_metal").value));  
    // document.getElementById(prefix + 'PayTotAmt').value = Math_round(parseFloat(document.getElementById(prefix + "PayTotAmtBalDisp").value) + parseFloat(document.getElementById("utin_cash_to_metal").value));  

    // alert('PayTotAmtBalDisp ==' + document.getElementById(prefix + "PayTotAmtBalDisp").value);
    // }

    // CASH AMOUNT THAT CONVERT TO METAL WEIGHT @PRIYANKA-06APR18
    if (document.getElementById("GdCashToMetal").value == '' || document.getElementById("GdCashToMetal").value == 'NaN') {
        document.getElementById("GdCashToMetal").value = '0.00';
    }

    // CASH AMOUNT THAT CONVERT TO METAL WEIGHT @PRIYANKA-06APR18
    var GdCashToMetal = parseFloat(document.getElementById("GdCashToMetal").value);

    // CASH AMOUNT @PRIYANKA-06APR18
    if (GdCashToMetal == '' || GdCashToMetal == 'NaN') {
        GdCashToMetal = '0.00';
        document.getElementById("GdCashToMetal").value = parseFloat(GdCashToMetal).toFixed(2);
    } else {
        document.getElementById("GdCashToMetal").value = parseFloat(GdCashToMetal).toFixed(2);
    }

    // PREV CASH BALANCE @PRIYANKA-06APR18
    document.getElementById("PrevGdCashBal").value = parseFloat(GdCashToMetal).toFixed(2);

    //alert('payPanelName == ' + document.getElementById("payPanelName").value);

    // PREV CASH BALANCE CRDR @PRIYANKA-06APR18
    if (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
            (document.getElementById("payPanelName").value == 'SlPrPayment' ||
                    document.getElementById("payPanelName").value == 'SellPayUp') ||
            (document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                    document.getElementById("payPanelName").value == 'ItemRepairPayUp') ||
            (document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                    document.getElementById("payPanelName").value == 'PurchaseReturnPayUp') ||
            (document.getElementById("payPanelName").value == 'ApprovalPayment' ||
                    document.getElementById("payPanelName").value == 'ApprovalPayUp') ||
            document.getElementById("payPanelName").value == 'NewOrderPayment' ||
            document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
            document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
            document.getElementById("payPanelName").value == 'CrySellPayment' ||
            document.getElementById("payPanelName").value == 'CrySellPayUp') {
        var PrevGdCashBalCRDR = 'DR';
    } else if (document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' ||
            (document.getElementById("payPanelName").value == 'StockPayment' ||
                    document.getElementById("payPanelName").value == 'StockPayUp') ||
            document.getElementById("payPanelName").value == 'RawPayUp' ||
            document.getElementById("payPanelName").value == 'StockReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
            document.getElementById("payPanelName").value == 'RawPayment' ||
            document.getElementById("payPanelName").value == 'CrystalStockPayment' ||
            document.getElementById("payPanelName").value == 'SchemePayment' ||
            document.getElementById('payPanelName').value == 'CrystalStockPayUp') {
        var PrevGdCashBalCRDR = 'CR';
    }

    // PREV CASH BALANCE CRDR @PRIYANKA-06APR18
    document.getElementById('PrevGdCashBalCRDR').value = PrevGdCashBalCRDR;

    // METAL RATE @PRIYANKA-06APR18
    if (document.getElementById('GdMetalRate').value == '') {
        document.getElementById('GdMetalRate').value = parseFloat(document.getElementById(prefix + 'GoldRate').value);
    }

    // METAL RATE @PRIYANKA-06APR18
    var GdMetalRate = parseFloat(document.getElementById('GdMetalRate').value).toFixed(2); // METAL RATE

    // METAL RATE @PRIYANKA-06APR18
    if (GdMetalRate == '' || GdMetalRate == 'NaN') {
        GdMetalRate = '0.00';
    }

    // CALCULATE METAL WEIGHT ACCORDING TO AMOUNT @PRIYANKA-06APR18
    // METAL WT = ((WT IN GM * AMOUNT CONVERT TO METAL) / METAL RATE) @PRIYANKA-06APR18
    var gdTotalWeight = ((document.getElementById('gmWtInGm').value * parseFloat(GdCashToMetal)) / parseFloat(GdMetalRate)).toFixed(3);

    if (gdTotalWeight == '' || gdTotalWeight == 'NaN') {
        gdTotalWeight = '0.00';
    }

    // METAL PURITY @PRIYANKA-06APR18        
    if (document.getElementById('GdPurity').value == '' || document.getElementById('GdPurity').value == 'NaN') {
        document.getElementById('GdPurity').value = '100';
    }

    var GdPurity = parseFloat(document.getElementById('GdPurity').value);

    if (GdPurity == '' || GdPurity == 'NaN') {
        GdPurity = '0.00';
    }

    // CALCULATE METAL FINAL FINE WEIGHT @PRIYANKA-06APR18
    var gdFinalMetalWeight = ((parseFloat(gdTotalWeight) * parseFloat(GdPurity)) / 100).toFixed(3);

    if (gdFinalMetalWeight == '' || gdFinalMetalWeight == 'NaN') {
        gdFinalMetalWeight = '0.00';
    }

    // alert('gdTotalWeight == ' + gdTotalWeight);
    // alert('gdFinalMetalWeight == ' + gdFinalMetalWeight);

    if (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
            (document.getElementById("payPanelName").value == 'SlPrPayment' ||
                    document.getElementById("payPanelName").value == 'SellPayUp') ||
            (document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                    document.getElementById("payPanelName").value == 'ItemRepairPayUp') ||
            (document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                    document.getElementById("payPanelName").value == 'PurchaseReturnPayUp') ||
            (document.getElementById("payPanelName").value == 'ApprovalPayment' ||
                    document.getElementById("payPanelName").value == 'ApprovalPayUp') ||
            document.getElementById("payPanelName").value == 'NewOrderPayment' ||
            document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
            document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
            document.getElementById("payPanelName").value == 'CrySellPayment' ||
            document.getElementById("payPanelName").value == 'CrySellPayUp') {
        var CashToGdMetalWtCRDR = 'CR';
    }

    if (document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' ||
            (document.getElementById("payPanelName").value == 'StockPayment' ||
                    document.getElementById("payPanelName").value == 'StockPayUp') ||
            document.getElementById("payPanelName").value == 'RawPayUp' ||
            document.getElementById("payPanelName").value == 'StockReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
            document.getElementById("payPanelName").value == 'RawPayment' ||
            document.getElementById("payPanelName").value == 'CrystalStockPayment' ||
            document.getElementById("payPanelName").value == 'SchemePayment' ||
            document.getElementById("payPanelName").value == 'CrystalStockPayUp') {
        var CashToGdMetalWtCRDR = 'DR';
    }

    // alert('CashToGdMetalWtCRDR == ' + CashToGdMetalWtCRDR);

    // METAL FINAL FINE WEIGHT @PRIYANKA-06APR18
    document.getElementById('CashToGdMetalWt').value = parseFloat(gdFinalMetalWeight).toFixed(3);
    // METAL FINAL FINE WEIGHT CRDR @PRIYANKA-06APR18
    document.getElementById('CashToGdMetalWtCRDR').value = CashToGdMetalWtCRDR;
    // CASH TO METAL WEIGHT BAL TYPE @PRIYANKA-06APR18
    var CashToGdMetalWtType = 'GM';
    // CASH TO METAL WEIGHT BAL @PRIYANKA-06APR18
    document.getElementById('CashMetalGdBal').value = parseFloat(document.getElementById('CashToGdMetalWt').value).toFixed(3) + ' ' + CashToGdMetalWtType;
    // CASH TO METAL WEIGHT BAL CRDR @PRIYANKA-06APR18
    document.getElementById('CashMetalGdBalCRDR').value = document.getElementById("CashToGdMetalWtCRDR").value;

    // GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG
    // END CASH TO METAL FUNCTIONALITY FOR GOLD @PRIYANKA-05APR18
    // GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG

    // SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    // START CASH TO METAL FUNCTIONALITY FOR SILVER @PRIYANKA-10APR18
    // SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS


    // PREV SL CASH OPENING AMOUNT @PRIYANKA-10APR18
    if (document.getElementById("utin_sl_prev_cash_opening").value == '' || document.getElementById("utin_sl_prev_cash_opening").value == 'NaN') {
        document.getElementById("utin_sl_prev_cash_opening").value = '0.00';
    }

    // PREV SL CASH OPENING AMOUNT @PRIYANKA-10APR18
    //if (document.getElementById("utin_sl_prev_cash_opening").value == '0.00') {
    document.getElementById("utin_sl_prev_cash_opening").value = parseFloat(document.getElementById("utin_prev_cash_bal").value).toFixed(2);
    document.getElementById("utin_sl_prev_cash_opening_CRDR").value = document.getElementById("utin_prev_cash_bal_CRDR").value;
    //}

    // SL CASH AMOUNT CONVERT TO METAL @PRIYANKA-10APR18
    if (document.getElementById("utin_sl_cash_to_metal").value == '' || document.getElementById("utin_sl_cash_to_metal").value == 'NaN') {
        document.getElementById("utin_sl_cash_to_metal").value = '0.00';
    }

//    SL CASH AMOUNT CONVERT TO METAL @PRIYANKA-10APR18
//    if (document.getElementById("utin_sl_cash_to_metal").value == '0.00') {        
//        if (document.getElementById("utin_sl_cash_to_metal").value == '') {
//            document.getElementById("utin_sl_cash_to_metal").value = parseFloat(document.getElementById("utin_prev_cash_bal").value).toFixed(2);
//        }
//    }

    // alert('utin_sl_cash_to_metal == ' + document.getElementById("utin_sl_cash_to_metal").value);

    // CALCUALTE PREV SL CASH BALANCE @PRIYANKA-10APR18
    // PREV SL CASH BAL = (PREV SL CASH OPENING - SL CASH AMOUNT CONVERT TO METAL)
    var utin_sl_prev_cash_bal = Math_round(parseFloat(document.getElementById("utin_sl_prev_cash_opening").value) - parseFloat(document.getElementById("utin_sl_cash_to_metal").value)).toFixed(2);

    // PREV SL CASH BAL @PRIYANKA-10APR18
    if (utin_sl_prev_cash_bal == '' || utin_sl_prev_cash_bal == 'NaN') {
        utin_sl_prev_cash_bal = '0.00';
    }

    // PREV SL CASH BALANCE @PRIYANKA-10APR18
    document.getElementById("utin_sl_prev_cash_bal").value = parseFloat(utin_sl_prev_cash_bal).toFixed(2);

    // PREV SL CASH BALANCE CRDR @PRIYANKA-10APR18
    if (utin_sl_prev_cash_bal >= 0) {
        document.getElementById("utin_sl_prev_cash_bal_CRDR").value = document.getElementById("utin_sl_prev_cash_opening_CRDR").value;
    } else {
        // PREV SL CASH BALANCE CRDR @PRIYANKA-10APR18
        if (document.getElementById("utin_sl_prev_cash_opening_CRDR").value == 'CR') {
            document.getElementById("utin_sl_prev_cash_bal_CRDR").value = 'DR';
        } else if (document.getElementById("utin_sl_prev_cash_opening_CRDR").value == 'DR') {
            document.getElementById("utin_sl_prev_cash_bal_CRDR").value = 'CR';
        }

    }

    // SL CASH AMOUNT THAT CONVERT TO METAL WEIGHT @PRIYANKA-10APR18
    var utin_sl_cash_to_metal = parseFloat(document.getElementById("utin_sl_cash_to_metal").value).toFixed(2);
    // SL CASH AMOUNT @PRIYANKA-10APR18
    if (utin_sl_cash_to_metal == 'NaN') {
        utin_sl_cash_to_metal = '0.00';
    } else if (utin_sl_cash_to_metal != 0) {
        document.getElementById("utin_sl_cash_to_metal").value = parseFloat(utin_sl_cash_to_metal).toFixed(2);
    }

    // SILVER METAL RATE @PRIYANKA-10APR18
    if (document.getElementById('utin_sl_cash_metal_rate').value == '') {
        document.getElementById('utin_sl_cash_metal_rate').value = parseFloat(document.getElementById(prefix + 'SilverRate').value);
    }
    // SILVER METAL RATE @PRIYANKA-10APR18
    var utin_sl_cash_metal_rate = parseFloat(document.getElementById('utin_sl_cash_metal_rate').value).toFixed(2); // SILVER METAL RATE
    //
    // SILVER METAL RATE @PRIYANKA-10APR18
    if (utin_sl_cash_metal_rate == '' || utin_sl_cash_metal_rate == 'NaN') {
        utin_sl_cash_metal_rate = '0.00';
    }

    // CALCULATE SL METAL WEIGHT ACCORDING TO AMOUNT @PRIYANKA-10APR18
    // SL METAL WT = ((SL WT IN KG * AMOUNT CONVERT TO METAL) / METAL RATE)
    var TotalSLWeight = ((document.getElementById('gmWtInKg').value * parseFloat(utin_sl_cash_to_metal)) / (parseFloat(utin_sl_cash_metal_rate) / document.getElementById('gmWtInGm').value)).toFixed(3);

    if (TotalSLWeight == '' || TotalSLWeight == 'NaN') {
        TotalSLWeight = '0.00';
    }

    // SILVER METAL PURITY @PRIYANKA-10APR18    
    if (document.getElementById('utin_sl_cash_metal_purity').value == '' || document.getElementById('utin_sl_cash_metal_purity').value == 'NaN') {
        document.getElementById('utin_sl_cash_metal_purity').value = '100';
    }

    var utin_sl_cash_metal_purity = parseFloat(document.getElementById('utin_sl_cash_metal_purity').value);

    if (utin_sl_cash_metal_purity == '' || utin_sl_cash_metal_purity == 'NaN') {
        utin_sl_cash_metal_purity = '0.00';
    }

    // CALCULATE SL METAL FINAL FINE WEIGHT @PRIYANKA-10APR18 
    var finalSLMetalWeight = ((parseFloat(TotalSLWeight) * parseFloat(utin_sl_cash_metal_purity)) / 100).toFixed(3);

    if (finalSLMetalWeight == '' || finalSLMetalWeight == 'NaN') {
        finalSLMetalWeight = '0.00';
    }

    // alert('totalWeight == ' + totalWeight);
    // alert('finalMetalWeight == ' + finalMetalWeight);

    // SL METAL FINAL FINE WEIGHT @PRIYANKA-10APR18 
    document.getElementById('utin_sl_cash_to_metalwt').value = parseFloat(finalSLMetalWeight).toFixed(3);
    // SL METAL FINAL FINE WEIGHT CRDR @PRIYANKA-10APR18 
    document.getElementById('utin_sl_cash_to_metalwt_CRDR').value = document.getElementById("utin_sl_prev_cash_opening_CRDR").value;
    // SL CASH TO SL METAL WEIGHT BAL TYPE @PRIYANKA-10APR18 
    var utin_cash_sl_bal_type = 'GM';
    // SL CASH TO SL METAL WEIGHT BAL @PRIYANKA-10APR18 
    document.getElementById('utin_cash_sl_bal').value = parseFloat(document.getElementById('utin_sl_cash_to_metalwt').value).toFixed(3) + ' ' + utin_cash_sl_bal_type;
    // Sl CASH TO SL METAL WEIGHT BAL CRDR @PRIYANKA-10APR18 
    document.getElementById('utin_cash_sl_bal_CRDR').value = document.getElementById("utin_sl_cash_to_metalwt_CRDR").value;


    // CASH AMOUNT THAT CONVERT TO SL METAL WEIGHT @PRIYANKA-10APR18 
    if (document.getElementById("SlCashToMetal").value == '' || document.getElementById("SlCashToMetal").value == 'NaN') {
        document.getElementById("SlCashToMetal").value = '0.00';
    }

    // CASH AMOUNT THAT CONVERT TO SL METAL WEIGHT @PRIYANKA-10APR18 
    var SlCashToMetal = parseFloat(document.getElementById("SlCashToMetal").value);

    // SL CASH AMOUNT @PRIYANKA-10APR18 
    if (SlCashToMetal == '' || SlCashToMetal == 'NaN') {
        SlCashToMetal = '0.00';
        document.getElementById("SlCashToMetal").value = parseFloat(SlCashToMetal).toFixed(2);
    } else {
        document.getElementById("SlCashToMetal").value = parseFloat(SlCashToMetal).toFixed(2);
    }

    // SL PREV CASH BALANCE @PRIYANKA-10APR18 
    document.getElementById("PrevSlCashBal").value = parseFloat(SlCashToMetal).toFixed(2);

    // alert('payPanelName == ' + document.getElementById("payPanelName").value);

    // SL PREV CASH BALANCE CRDR @PRIYANKA-10APR18 
    if (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
            (document.getElementById("payPanelName").value == 'SlPrPayment' ||
                    document.getElementById("payPanelName").value == 'SellPayUp') ||
            (document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                    document.getElementById("payPanelName").value == 'ItemRepairPayUp') ||
            (document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                    document.getElementById("payPanelName").value == 'PurchaseReturnPayUp') ||
            (document.getElementById("payPanelName").value == 'ApprovalPayment' ||
                    document.getElementById("payPanelName").value == 'ApprovalPayUp') ||
            document.getElementById("payPanelName").value == 'NewOrderPayment' ||
            document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
            document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
            document.getElementById("payPanelName").value == 'CrySellPayment' ||
            document.getElementById("payPanelName").value == 'CrySellPayUp') {
        var PrevSlCashBalCRDR = 'DR';
    } else if (document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' ||
            (document.getElementById("payPanelName").value == 'StockPayment' ||
                    document.getElementById("payPanelName").value == 'StockPayUp') ||
            document.getElementById("payPanelName").value == 'RawPayUp' ||
            document.getElementById("payPanelName").value == 'StockReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
            document.getElementById("payPanelName").value == 'RawPayment' ||
            document.getElementById("payPanelName").value == 'CrystalStockPayment' ||
            document.getElementById("payPanelName").value == 'SchemePayment' ||
            document.getElementById('payPanelName').value == 'CrystalStockPayUp') {
        var PrevSlCashBalCRDR = 'CR';
    }

    // SL PREV CASH BALANCE CRDR @PRIYANKA-10APR18 
    document.getElementById('PrevSlCashBalCRDR').value = PrevSlCashBalCRDR;

    // SILVER METAL RATE @PRIYANKA-10APR18 
    if (document.getElementById('SlMetalRate').value == '') {
        document.getElementById('SlMetalRate').value = parseFloat(document.getElementById(prefix + 'SilverRate').value);
    }

    // SILVER METAL RATE @PRIYANKA-10APR18 
    var SlMetalRate = parseFloat(document.getElementById('SlMetalRate').value).toFixed(2); // SILVER METAL RATE

    // SILVER METAL RATE @PRIYANKA-10APR18 
    if (SlMetalRate == '' || SlMetalRate == 'NaN') {
        SlMetalRate = '0.00';
    }

    // CALCULATE SL METAL WEIGHT ACCORDING TO AMOUNT @PRIYANKA-10APR18 
    // SL METAL WT = ((SL WT IN KG * SL AMOUNT CONVERT TO SL METAL) / SL METAL RATE) @PRIYANKA-10APR18 
    var SlTotalWeight = ((document.getElementById('gmWtInKg').value * parseFloat(SlCashToMetal)) / (parseFloat(SlMetalRate) / document.getElementById('gmWtInGm').value)).toFixed(3);

    if (SlTotalWeight == '' || SlTotalWeight == 'NaN') {
        SlTotalWeight = '0.00';
    }

    // METAL PURITY @PRIYANKA-10APR18       
    if (document.getElementById('SlPurity').value == '' || document.getElementById('SlPurity').value == 'NaN') {
        document.getElementById('SlPurity').value = '100';
    }

    var SlPurity = parseFloat(document.getElementById('SlPurity').value);

    if (SlPurity == '' || SlPurity == 'NaN') {
        SlPurity = '0.00';
    }

    // CALCULATE METAL FINAL FINE WEIGHT @PRIYANKA-10APR18 
    var SlFinalMetalWeight = ((parseFloat(SlTotalWeight) * parseFloat(SlPurity)) / 100).toFixed(3);

    if (SlFinalMetalWeight == '' || SlFinalMetalWeight == 'NaN') {
        SlFinalMetalWeight = '0.00';
    }

    // alert('SlTotalWeight == ' + SlTotalWeight);
    // alert('SlFinalMetalWeight == ' + SlFinalMetalWeight);

    // START CODE FOR Payment Panel Issue : (Rate Cut)
    // SILVER CASE - CASH TO METAL CASE - SILVER WT CRDR SHOWING WRONG @PRIYANKA-28JUNE18
    if (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
            (document.getElementById("payPanelName").value == 'SlPrPayment' ||
                    document.getElementById("payPanelName").value == 'SellPayUp') ||
            (document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                    document.getElementById("payPanelName").value == 'ItemRepairPayUp') ||
            (document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                    document.getElementById("payPanelName").value == 'PurchaseReturnPayUp') ||
            (document.getElementById("payPanelName").value == 'ApprovalPayment' ||
                    document.getElementById("payPanelName").value == 'ApprovalPayUp') ||
            document.getElementById("payPanelName").value == 'NewOrderPayment' ||
            document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
            document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
            document.getElementById("payPanelName").value == 'CrySellPayment' ||
            document.getElementById("payPanelName").value == 'CrySellPayUp') {
        var CashToSLMetalWtCRDR = 'CR';
    }

    if (document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' ||
            (document.getElementById("payPanelName").value == 'StockPayment' ||
                    document.getElementById("payPanelName").value == 'StockPayUp') ||
            document.getElementById("payPanelName").value == 'RawPayUp' ||
            document.getElementById("payPanelName").value == 'StockReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
            document.getElementById("payPanelName").value == 'RawPayment' ||
            document.getElementById("payPanelName").value == 'CrystalStockPayment' ||
            document.getElementById("payPanelName").value == 'SchemePayment' ||
            document.getElementById('payPanelName').value == 'CrystalStockPayUp') {
        var CashToSLMetalWtCRDR = 'DR';
    }
    // SILVER CASE - CASH TO METAL CASE - SILVER WT CRDR SHOWING WRONG @PRIYANKA-28JUNE18
    // END CODE FOR Payment Panel Issue : (Rate Cut)

    // alert('CashToSLMetalWtCRDR == ' + CashToSLMetalWtCRDR);

    // SL METAL FINAL FINE WEIGHT @PRIYANKA-10APR18 
    document.getElementById('CashToSlMetalWt').value = parseFloat(SlFinalMetalWeight).toFixed(3);
    // SL METAL FINAL FINE WEIGHT CRDR @PRIYANKA-10APR18 
    document.getElementById('CashToSlMetalWtCRDR').value = CashToSLMetalWtCRDR;
    // SL CASH TO METAL WEIGHT BAL TYPE @PRIYANKA-10APR18 
    var CashToSlMetalWtType = 'GM';
    // SL CASH TO METAL WEIGHT BAL @PRIYANKA-10APR18 
    document.getElementById('CashMetalSlBal').value = parseFloat(document.getElementById('CashToSlMetalWt').value).toFixed(3) + ' ' + CashToSlMetalWtType;
    // SL CASH TO METAL WEIGHT BAL CRDR @PRIYANKA-10APR18 
    document.getElementById('CashMetalSlBalCRDR').value = document.getElementById("CashToSlMetalWtCRDR").value;

    //alert('CashToSlMetalWtCRDR == ' + document.getElementById('CashToSlMetalWtCRDR').value);

    // SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    // END CASH TO METAL FUNCTIONALITY FOR SILVER @PRIYANKA-10APR18
    // SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
//
//
    // GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG
    // START CASH TO METAL FUNCTIONALITY FOR GOLD @PRIYANKA-05APR18
    // GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG

    //alert('utin_prev_cash_opening == ' + document.getElementById("utin_prev_cash_opening").value);

    if (document.getElementById("utin_prev_cash_opening").value == '0.00' ||
            document.getElementById("utin_prev_cash_opening").value == 'NaN' ||
            document.getElementById("utin_prev_cash_opening").value == '') {
        document.getElementById("utin_cash_to_metal").readOnly = true;
    } else {
        document.getElementById("utin_cash_to_metal").readOnly = false;
    }
    //
    //
    if (document.getElementById("utin_sl_prev_cash_opening").value == '0.00' ||
            document.getElementById("utin_sl_prev_cash_opening").value == 'NaN' ||
            document.getElementById("utin_sl_prev_cash_opening").value == '') {
        document.getElementById("utin_sl_cash_to_metal").readOnly = true;
    } else {
        document.getElementById("utin_sl_cash_to_metal").readOnly = false;
    }
//
//
    if (document.getElementById("utin_st_prev_cash_opening").value == '0.00' ||
            document.getElementById("utin_st_prev_cash_opening").value == 'NaN' ||
            document.getElementById("utin_st_prev_cash_opening").value == '') {
        document.getElementById("utin_st_cash_to_metal").readOnly = true;
    } else {
        document.getElementById("utin_st_cash_to_metal").readOnly = false;
    }
    // CASH AMOUNT CONVERT TO METAL @PRIYANKA-05APR18
    if (document.getElementById("utin_cash_to_metal").value == 'NaN') {
        document.getElementById("utin_cash_to_metal").value = '0.00';
    }
    //
    if (document.getElementById("utin_cash_to_metal").value == '0.00') {

        if (document.getElementById("utin_cash_to_metal").value == '') {
            document.getElementById("utin_cash_to_metal").value = parseFloat(document.getElementById("utin_prev_cash_opening").value).toFixed(2);
        }
    }

    // PREV CASH OPENING AMOUNT @PRIYANKA-05APR18
    if (document.getElementById("utin_prev_cash_opening").value == '' || document.getElementById("utin_prev_cash_opening").value == 'NaN') {
        document.getElementById("utin_prev_cash_opening").value = '0.00';
    }

    // alert('utin_cash_to_metal == ' + document.getElementById("utin_cash_to_metal").value);

    // CALCUALTE PREV CASH BALANCE @PRIYANKA-05APR18
    // PREV CASH BAL = (PREV CASH OPENING - CASH AMOUNT CONVERT TO METAL)
    var utin_prev_cash_bal = Math_round(parseFloat(document.getElementById("utin_prev_cash_opening").value) - parseFloat(document.getElementById("utin_cash_to_metal").value)).toFixed(2);

    // PREV CASH BAL
    if (utin_prev_cash_bal == '' || utin_prev_cash_bal == 'NaN') {
        utin_prev_cash_bal = '0.00';
    }

    // PREV CASH BALANCE @PRIYANKA-05APR18
    document.getElementById("utin_prev_cash_bal").value = parseFloat(utin_prev_cash_bal).toFixed(2);
    // PREV CASH BALANCE CRDR @PRIYANKA-05APR18
    if (utin_prev_cash_bal >= 0) {
        document.getElementById("utin_prev_cash_bal_CRDR").value = document.getElementById("utin_prev_cash_opening_CRDR").value;
    } else {
        // PREV CASH BALANCE CRDR
        if (document.getElementById("utin_prev_cash_opening_CRDR").value == 'CR') {
            document.getElementById("utin_prev_cash_bal_CRDR").value = 'DR';
        } else if (document.getElementById("utin_prev_cash_opening_CRDR").value == 'DR') {
            document.getElementById("utin_prev_cash_bal_CRDR").value = 'CR';
        }

    }

    // CASH AMOUNT THAT CONVERT TO METAL WEIGHT @PRIYANKA-05APR18
    var utin_cash_to_metal = parseFloat(document.getElementById("utin_cash_to_metal").value).toFixed(2);

    // CASH AMOUNT
    if (utin_cash_to_metal == 'NaN') {
        utin_cash_to_metal = '0.00';
    } else if (utin_cash_to_metal != 0) {
        document.getElementById("utin_cash_to_metal").value = parseFloat(utin_cash_to_metal).toFixed(2);
    }

    // METAL RATE @PRIYANKA-05APR18
    if (document.getElementById('utin_metal_rate').value == '') {
        document.getElementById('utin_metal_rate').value = parseFloat(document.getElementById(prefix + 'GoldRate').value);
    }

    // METAL RATE
    var utin_metal_rate = parseFloat(document.getElementById('utin_metal_rate').value).toFixed(2); // METAL RATE

    // METAL RATE
    if (utin_metal_rate == '' || utin_metal_rate == 'NaN') {
        utin_metal_rate = '0.00';
    }

    // CALCULATE METAL WEIGHT ACCORDING TO AMOUNT @PRIYANKA-05APR18
    // METAL WT = ((WT IN GM * AMOUNT CONVERT TO METAL) / METAL RATE)
    var totalWeight = ((document.getElementById('gmWtInGm').value * parseFloat(utin_cash_to_metal)) / parseFloat(utin_metal_rate)).toFixed(3);

    if (totalWeight == '' || totalWeight == 'NaN') {
        totalWeight = '0.00';
    }

    // METAL PURITY @PRIYANKA-05APR18    
    if (document.getElementById('utin_purity').value == '' || document.getElementById('utin_purity').value == 'NaN') {
        document.getElementById('utin_purity').value = '100';
    }

    var utin_purity = parseFloat(document.getElementById('utin_purity').value);

    if (utin_purity == '' || utin_purity == 'NaN') {
        utin_purity = '0.00';
    }

    // CALCULATE METAL FINAL FINE WEIGHT @PRIYANKA-05APR18
    var finalMetalWeight = ((parseFloat(totalWeight) * parseFloat(utin_purity)) / 100).toFixed(3);

    if (finalMetalWeight == '' || finalMetalWeight == 'NaN') {
        finalMetalWeight = '0.00';
    }

    // alert('totalWeight == ' + totalWeight);
    // alert('finalMetalWeight == ' + finalMetalWeight);

    // METAL FINAL FINE WEIGHT
    document.getElementById('utin_cash_to_metalwt').value = parseFloat(finalMetalWeight).toFixed(3);
    // METAL FINAL FINE WEIGHT CRDR
    document.getElementById('utin_cash_to_metalwt_CRDR').value = document.getElementById("utin_prev_cash_opening_CRDR").value;
    // CASH TO METAL WEIGHT BAL TYPE
    var utin_cash_gd_bal_type = 'GM';
    // CASH TO METAL WEIGHT BAL 
    document.getElementById('utin_cash_gd_bal').value = parseFloat(document.getElementById('utin_cash_to_metalwt').value).toFixed(3) + ' ' + utin_cash_gd_bal_type;
    // CASH TO METAL WEIGHT BAL CRDR
    document.getElementById('utin_cash_gd_bal_CRDR').value = document.getElementById("utin_cash_to_metalwt_CRDR").value;

    // if (document.getElementById('paymentMode').value == 'RateCut') {

    // alert('PayTotAmtBalDisp **==' + document.getElementById(prefix + "PayTotAmtBalDisp").value);

    // document.getElementById(prefix + "PayTotAmtBalDisp").value = Math_round(parseFloat(document.getElementById(prefix + "PayTotAmtBalDisp").value) + parseFloat(document.getElementById("utin_cash_to_metal").value));  
    // document.getElementById(prefix + 'PayTotAmt').value = Math_round(parseFloat(document.getElementById(prefix + "PayTotAmtBalDisp").value) + parseFloat(document.getElementById("utin_cash_to_metal").value));  

    // alert('PayTotAmtBalDisp ==' + document.getElementById(prefix + "PayTotAmtBalDisp").value);
    // }

    // CASH AMOUNT THAT CONVERT TO METAL WEIGHT @PRIYANKA-06APR18
    if (document.getElementById("GdCashToMetal").value == '' || document.getElementById("GdCashToMetal").value == 'NaN') {
        document.getElementById("GdCashToMetal").value = '0.00';
    }

    // CASH AMOUNT THAT CONVERT TO METAL WEIGHT @PRIYANKA-06APR18
    var GdCashToMetal = parseFloat(document.getElementById("GdCashToMetal").value);

    // CASH AMOUNT @PRIYANKA-06APR18
    if (GdCashToMetal == '' || GdCashToMetal == 'NaN') {
        GdCashToMetal = '0.00';
        document.getElementById("GdCashToMetal").value = parseFloat(GdCashToMetal).toFixed(2);
    } else {
        document.getElementById("GdCashToMetal").value = parseFloat(GdCashToMetal).toFixed(2);
    }

    // PREV CASH BALANCE @PRIYANKA-06APR18
    document.getElementById("PrevGdCashBal").value = parseFloat(GdCashToMetal).toFixed(2);

    //alert('payPanelName == ' + document.getElementById("payPanelName").value);

    // PREV CASH BALANCE CRDR @PRIYANKA-06APR18
    if (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
            (document.getElementById("payPanelName").value == 'SlPrPayment' ||
                    document.getElementById("payPanelName").value == 'SellPayUp') ||
            (document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                    document.getElementById("payPanelName").value == 'ItemRepairPayUp') ||
            (document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                    document.getElementById("payPanelName").value == 'PurchaseReturnPayUp') ||
            (document.getElementById("payPanelName").value == 'ApprovalPayment' ||
                    document.getElementById("payPanelName").value == 'ApprovalPayUp') ||
            document.getElementById("payPanelName").value == 'NewOrderPayment' ||
            document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
            document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
            document.getElementById("payPanelName").value == 'CrySellPayment' ||
            document.getElementById("payPanelName").value == 'CrySellPayUp') {
        var PrevGdCashBalCRDR = 'DR';
    } else if (document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' ||
            (document.getElementById("payPanelName").value == 'StockPayment' ||
                    document.getElementById("payPanelName").value == 'StockPayUp') ||
            document.getElementById("payPanelName").value == 'RawPayUp' ||
            document.getElementById("payPanelName").value == 'StockReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
            document.getElementById("payPanelName").value == 'RawPayment' ||
            document.getElementById("payPanelName").value == 'CrystalStockPayment' ||
            document.getElementById("payPanelName").value == 'SchemePayment' ||
            document.getElementById('payPanelName').value == 'CrystalStockPayUp') {
        var PrevGdCashBalCRDR = 'CR';
    }

    // PREV CASH BALANCE CRDR @PRIYANKA-06APR18
    document.getElementById('PrevGdCashBalCRDR').value = PrevGdCashBalCRDR;

    // METAL RATE @PRIYANKA-06APR18
    if (document.getElementById('GdMetalRate').value == '') {
        document.getElementById('GdMetalRate').value = parseFloat(document.getElementById(prefix + 'GoldRate').value);
    }

    // METAL RATE @PRIYANKA-06APR18
    var GdMetalRate = parseFloat(document.getElementById('GdMetalRate').value).toFixed(2); // METAL RATE

    // METAL RATE @PRIYANKA-06APR18
    if (GdMetalRate == '' || GdMetalRate == 'NaN') {
        GdMetalRate = '0.00';
    }

    // CALCULATE METAL WEIGHT ACCORDING TO AMOUNT @PRIYANKA-06APR18
    // METAL WT = ((WT IN GM * AMOUNT CONVERT TO METAL) / METAL RATE) @PRIYANKA-06APR18
    var gdTotalWeight = ((document.getElementById('gmWtInGm').value * parseFloat(GdCashToMetal)) / parseFloat(GdMetalRate)).toFixed(3);

    if (gdTotalWeight == '' || gdTotalWeight == 'NaN') {
        gdTotalWeight = '0.00';
    }

    // METAL PURITY @PRIYANKA-06APR18        
    if (document.getElementById('GdPurity').value == '' || document.getElementById('GdPurity').value == 'NaN') {
        document.getElementById('GdPurity').value = '100';
    }

    var GdPurity = parseFloat(document.getElementById('GdPurity').value);

    if (GdPurity == '' || GdPurity == 'NaN') {
        GdPurity = '0.00';
    }

    // CALCULATE METAL FINAL FINE WEIGHT @PRIYANKA-06APR18
    var gdFinalMetalWeight = ((parseFloat(gdTotalWeight) * parseFloat(GdPurity)) / 100).toFixed(3);

    if (gdFinalMetalWeight == '' || gdFinalMetalWeight == 'NaN') {
        gdFinalMetalWeight = '0.00';
    }

    // alert('gdTotalWeight == ' + gdTotalWeight);
    // alert('gdFinalMetalWeight == ' + gdFinalMetalWeight);

    if (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
            (document.getElementById("payPanelName").value == 'SlPrPayment' ||
                    document.getElementById("payPanelName").value == 'SellPayUp') ||
            (document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                    document.getElementById("payPanelName").value == 'ItemRepairPayUp') ||
            (document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                    document.getElementById("payPanelName").value == 'PurchaseReturnPayUp') ||
            (document.getElementById("payPanelName").value == 'ApprovalPayment' ||
                    document.getElementById("payPanelName").value == 'ApprovalPayUp') ||
            document.getElementById("payPanelName").value == 'NewOrderPayment' ||
            document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
            document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
            document.getElementById("payPanelName").value == 'CrySellPayment' ||
            document.getElementById("payPanelName").value == 'CrySellPayUp') {
        var CashToGdMetalWtCRDR = 'CR';
    }

    if (document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' ||
            (document.getElementById("payPanelName").value == 'StockPayment' ||
                    document.getElementById("payPanelName").value == 'StockPayUp') ||
            document.getElementById("payPanelName").value == 'RawPayUp' ||
            document.getElementById("payPanelName").value == 'StockReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
            document.getElementById("payPanelName").value == 'RawPayment' ||
            document.getElementById("payPanelName").value == 'CrystalStockPayment' ||
            document.getElementById("payPanelName").value == 'SchemePayment' ||
            document.getElementById("payPanelName").value == 'CrystalStockPayUp') {
        var CashToGdMetalWtCRDR = 'DR';
    }

    // alert('CashToGdMetalWtCRDR == ' + CashToGdMetalWtCRDR);

    // METAL FINAL FINE WEIGHT @PRIYANKA-06APR18
    document.getElementById('CashToGdMetalWt').value = parseFloat(gdFinalMetalWeight).toFixed(3);
    // METAL FINAL FINE WEIGHT CRDR @PRIYANKA-06APR18
    document.getElementById('CashToGdMetalWtCRDR').value = CashToGdMetalWtCRDR;
    // CASH TO METAL WEIGHT BAL TYPE @PRIYANKA-06APR18
    var CashToGdMetalWtType = 'GM';
    // CASH TO METAL WEIGHT BAL @PRIYANKA-06APR18
    document.getElementById('CashMetalGdBal').value = parseFloat(document.getElementById('CashToGdMetalWt').value).toFixed(3) + ' ' + CashToGdMetalWtType;
    // CASH TO METAL WEIGHT BAL CRDR @PRIYANKA-06APR18
    document.getElementById('CashMetalGdBalCRDR').value = document.getElementById("CashToGdMetalWtCRDR").value;

    // GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG
    // END CASH TO METAL FUNCTIONALITY FOR GOLD @PRIYANKA-05APR18
    // GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG

    // SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    // START CASH TO METAL FUNCTIONALITY FOR STONE @DARSHANA 9 JULY 2021
    // SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS


    // PREV SL CASH OPENING AMOUNT @PRIYANKA-10APR18
    if (document.getElementById("utin_st_prev_cash_opening").value == '' || document.getElementById("utin_st_prev_cash_opening").value == 'NaN') {
        document.getElementById("utin_st_prev_cash_opening").value = '0.00';
    }

    // PREV ST CASH OPENING AMOUNT @DARSHANA 9 JULY 2021
    //if (document.getElementById("utin_sl_prev_cash_opening").value == '0.00') {
    document.getElementById("utin_st_prev_cash_opening").value = parseFloat(document.getElementById("utin_prev_cash_bal").value).toFixed(2);
    document.getElementById("utin_st_prev_cash_opening_CRDR").value = document.getElementById("utin_prev_cash_bal_CRDR").value;
    //}

    // ST CASH AMOUNT CONVERT TO METAL @DARSHANA 9 JULY 2021
    if (document.getElementById("utin_st_cash_to_metal").value == '' || document.getElementById("utin_st_cash_to_metal").value == 'NaN') {
        document.getElementById("utin_st_cash_to_metal").value = '0.00';
    }

//    SL CASH AMOUNT CONVERT TO METAL @PRIYANKA-10APR18
//    if (document.getElementById("utin_sl_cash_to_metal").value == '0.00') {        
//        if (document.getElementById("utin_sl_cash_to_metal").value == '') {
//            document.getElementById("utin_sl_cash_to_metal").value = parseFloat(document.getElementById("utin_prev_cash_bal").value).toFixed(2);
//        }
//    }

    // alert('utin_sl_cash_to_metal == ' + document.getElementById("utin_sl_cash_to_metal").value);

    // CALCUALTE PREV SL CASH BALANCE @DARSHANA 9 JULY 2021
    // PREV SL CASH BAL = (PREV SL CASH OPENING - SL CASH AMOUNT CONVERT TO METAL)
    var utin_st_prev_cash_bal = Math_round(parseFloat(document.getElementById("utin_st_prev_cash_opening").value) - parseFloat(document.getElementById("utin_st_cash_to_metal").value)).toFixed(2);

    // PREV SL CASH BAL @DARSHANA 9 JULY 2021
    if (utin_st_prev_cash_bal == '' || utin_st_prev_cash_bal == 'NaN') {
        utin_st_prev_cash_bal = '0.00';
    }

    // PREV SL CASH BALANCE @DARSHANA 9 JULY 2021
    document.getElementById("utin_st_prev_cash_bal").value = parseFloat(utin_st_prev_cash_bal).toFixed(2);

    // PREV SL CASH BALANCE CRDR @DARSHANA 9 JULY 2021
    if (utin_st_prev_cash_bal >= 0) {
        document.getElementById("utin_st_prev_cash_bal_CRDR").value = document.getElementById("utin_st_prev_cash_opening_CRDR").value;
    } else {
        // PREV SL CASH BALANCE CRDR @PRIYANKA-10APR18
        if (document.getElementById("utin_st_prev_cash_opening_CRDR").value == 'CR') {
            document.getElementById("utin_st_prev_cash_bal_CRDR").value = 'DR';
        } else if (document.getElementById("utin_st_prev_cash_opening_CRDR").value == 'DR') {
            document.getElementById("utin_st_prev_cash_bal_CRDR").value = 'CR';
        }

    }

    // ST CASH AMOUNT THAT CONVERT TO METAL WEIGHT @DARSHANA 9 JULY 2021
    var utin_st_cash_to_metal = parseFloat(document.getElementById("utin_st_cash_to_metal").value).toFixed(2);
    // SL CASH AMOUNT @DARSHANA 9 JULY 2021
    if (utin_st_cash_to_metal == 'NaN') {
        utin_st_cash_to_metal = '0.00';
    } else if (utin_st_cash_to_metal != 0) {
        document.getElementById("utin_st_cash_to_metal").value = parseFloat(utin_st_cash_to_metal).toFixed(2);
    }

    // STONE METAL RATE @DARSHANA 9 JULY 2021
    if (document.getElementById('utin_st_cash_metal_rate').value == '') {
        document.getElementById('utin_st_cash_metal_rate').value = parseFloat(document.getElementById(prefix + 'CrystalRate').value);
    }
    // STONE METAL RATE @DARSHANA 9 JULY 2021
    var utin_st_cash_metal_rate = parseFloat(document.getElementById('utin_st_cash_metal_rate').value).toFixed(2); // SILVER METAL RATE
    //
    // STONE METAL RATE @DARSHANA 9 JULY 2021
    if (utin_st_cash_metal_rate == '' || utin_st_cash_metal_rate == 'NaN') {
        utin_st_cash_metal_rate = '0.00';
        document.getElementById('utin_st_cash_metal_rate').value = utin_st_cash_metal_rate;
    }

    // CALCULATE SL METAL WEIGHT ACCORDING TO AMOUNT @PRIYANKA-10APR18
    // SL METAL WT = ((SL WT IN KG * AMOUNT CONVERT TO METAL) / METAL RATE)
    var TotalSTWeight = ((document.getElementById('cryWtInKg').value * parseFloat(utin_st_cash_metal_rate)) / (parseFloat(utin_st_cash_metal_rate) / document.getElementById('cryWtInCt').value)).toFixed(3);

    if (TotalSTWeight == '' || TotalSTWeight == 'NaN') {
        TotalSTWeight = '0.00';
    }

    // SILVER METAL PURITY @DARSHANA 9 JULY 2021    
    if (document.getElementById('utin_st_cash_metal_purity').value == '' || document.getElementById('utin_st_cash_metal_purity').value == 'NaN') {
        document.getElementById('utin_st_cash_metal_purity').value = '100';
    }

    var utin_st_cash_metal_purity = parseFloat(document.getElementById('utin_st_cash_metal_purity').value);

    if (utin_st_cash_metal_purity == '' || utin_st_cash_metal_purity == 'NaN') {
        utin_st_cash_metal_purity = '0.00';
    }

    // CALCULATE SL METAL FINAL FINE WEIGHT @DARSHANA 9 JULY 2021 
    var finalSTMetalWeight = ((parseFloat(TotalSTWeight) * parseFloat(utin_st_cash_metal_purity)) / 100).toFixed(3);

    if (finalSTMetalWeight == '' || finalSTMetalWeight == 'NaN') {
        finalSLMetalWeight = '0.00';
    }

    // alert('totalWeight == ' + totalWeight);
    // alert('finalMetalWeight == ' + finalMetalWeight);

    // SL METAL FINAL FINE WEIGHT @DARSHANA 9 JULY 2021 
    document.getElementById('utin_st_cash_to_metalwt').value = parseFloat(finalSTMetalWeight).toFixed(3);
    // SL METAL FINAL FINE WEIGHT CRDR @DARSHANA 9 JULY 2021
    document.getElementById('utin_st_cash_to_metalwt_CRDR').value = document.getElementById("utin_st_prev_cash_opening_CRDR").value;
    // SL CASH TO SL METAL WEIGHT BAL TYPE @PRIYANKA-10APR18 
    var utin_cash_st_bal_type = 'CT';
    // SL CASH TO SL METAL WEIGHT BAL @DARSHANA 9 JULY 2021
    document.getElementById('utin_cash_st_bal').value = parseFloat(document.getElementById('utin_st_cash_to_metalwt').value).toFixed(3) + ' ' + utin_cash_st_bal_type;
    // Sl CASH TO SL METAL WEIGHT BAL CRDR @DARSHANA 9 JULY 2021 
    document.getElementById('utin_cash_st_bal_CRDR').value = document.getElementById("utin_st_cash_to_metalwt_CRDR").value;


    // CASH AMOUNT THAT CONVERT TO ST METAL WEIGHT @DARSHANA 9 JULY 2021
    if (document.getElementById("StCashToMetal").value == '' || document.getElementById("StCashToMetal").value == 'NaN') {
        document.getElementById("StCashToMetal").value = '0.00';
    }
    // CASH AMOUNT THAT CONVERT TO ST METAL WEIGHT @DARSHANA 9 JULY 2021 
    var StCashToMetal = parseFloat(document.getElementById("StCashToMetal").value);

    // ST CASH AMOUNT @DARSHANA 9 JULY 2021
    if (StCashToMetal == '' || StCashToMetal == 'NaN') {
        StCashToMetal = '0.00';
        document.getElementById("StCashToMetal").value = parseFloat(StCashToMetal).toFixed(2);
    } else {
        document.getElementById("StCashToMetal").value = parseFloat(StCashToMetal).toFixed(2);
    }

    // ST PREV CASH BALANCE @DARSHANA 9 JULY 2021
    document.getElementById("PrevStCashBal").value = parseFloat(StCashToMetal).toFixed(2);

    // alert('payPanelName == ' + document.getElementById("payPanelName").value);

    // ST PREV CASH BALANCE CRDR @DARSHANA 9 JULY 2021 
    if (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
            (document.getElementById("payPanelName").value == 'SlPrPayment' ||
                    document.getElementById("payPanelName").value == 'SellPayUp') ||
            (document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                    document.getElementById("payPanelName").value == 'ItemRepairPayUp') ||
            (document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                    document.getElementById("payPanelName").value == 'PurchaseReturnPayUp') ||
            (document.getElementById("payPanelName").value == 'ApprovalPayment' ||
                    document.getElementById("payPanelName").value == 'ApprovalPayUp') ||
            document.getElementById("payPanelName").value == 'NewOrderPayment' ||
            document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
            document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
            document.getElementById("payPanelName").value == 'CrySellPayment' ||
            document.getElementById("payPanelName").value == 'CrySellPayUp') {
        var PrevStCashBalCRDR = 'DR';
    } else if (document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' ||
            (document.getElementById("payPanelName").value == 'StockPayment' ||
                    document.getElementById("payPanelName").value == 'StockPayUp') ||
            document.getElementById("payPanelName").value == 'RawPayUp' ||
            document.getElementById("payPanelName").value == 'StockReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
            document.getElementById("payPanelName").value == 'RawPayment' ||
            document.getElementById("payPanelName").value == 'CrystalStockPayment' ||
            document.getElementById("payPanelName").value == 'SchemePayment' ||
            document.getElementById('payPanelName').value == 'CrystalStockPayUp') {
        var PrevStCashBalCRDR = 'CR';
    }

    // ST PREV CASH BALANCE CRDR @DARSHANA 9 JULY 2021 
    document.getElementById('PrevStCashBalCRDR').value = PrevStCashBalCRDR;

    // STONE METAL RATE @PRIYANKA-10APR18 
    if (document.getElementById('StMetalRate').value == '') {
        document.getElementById('StMetalRate').value = parseFloat(document.getElementById(prefix + 'CrystalRate').value);
    }

    // STONE METAL RATE @DARSHANA 9 JULY 2021
    var StMetalRate = parseFloat(document.getElementById('StMetalRate').value).toFixed(2); // SILVER METAL RATE

    // SILVER METAL RATE @DARSHANA 9 JULY 2021 
    if (StMetalRate == '' || StMetalRate == 'NaN') {
        StMetalRate = '0.00';
        document.getElementById('StMetalRate').value = StMetalRate;
    }

    // CALCULATE ST METAL WEIGHT ACCORDING TO AMOUNT @DARSHANA 9 JULY 2021
    //
    var StTotalWeight = ((document.getElementById('gmWtInKg').value * parseFloat(StCashToMetal)) / (parseFloat(StMetalRate) / document.getElementById('gmWtInGm').value)).toFixed(3);

    if (StTotalWeight == '' || StTotalWeight == 'NaN') {
        StTotalWeight = '0.00';
    }

    // METAL PURITY @DARSHANA 9 JULY 2021       
    if (document.getElementById('StPurity').value == '' || document.getElementById('StPurity').value == 'NaN') {
        document.getElementById('StPurity').value = '100';
    }

    var StPurity = parseFloat(document.getElementById('StPurity').value);

    if (StPurity == '' || StPurity == 'NaN') {
        StPurity = '0.00';
    }

    // CALCULATE METAL FINAL FINE WEIGHT @DARSHANA 9 JULY 2021 
    var StFinalMetalWeight = ((parseFloat(StTotalWeight) * parseFloat(StPurity)) / 100).toFixed(3);

    if (StFinalMetalWeight == '' || StFinalMetalWeight == 'NaN') {
        StFinalMetalWeight = '0.00';
    }

    // alert('SlTotalWeight == ' + SlTotalWeight);
    // alert('SlFinalMetalWeight == ' + SlFinalMetalWeight);

    // START CODE FOR Payment Panel Issue : (Rate Cut)
    // SILVER CASE - CASH TO METAL CASE - SILVER WT CRDR SHOWING WRONG @PRIYANKA-28JUNE18
    if (document.getElementById('PaymentReceiptPanel').value == 'RECEIPT' ||
            (document.getElementById("payPanelName").value == 'SlPrPayment' ||
                    document.getElementById("payPanelName").value == 'SellPayUp') ||
            (document.getElementById("payPanelName").value == 'ItemRepairPayment' ||
                    document.getElementById("payPanelName").value == 'ItemRepairPayUp') ||
            (document.getElementById("payPanelName").value == 'PurchaseReturnPanel' ||
                    document.getElementById("payPanelName").value == 'PurchaseReturnPayUp') ||
            (document.getElementById("payPanelName").value == 'ApprovalPayment' ||
                    document.getElementById("payPanelName").value == 'ApprovalPayUp') ||
            document.getElementById("payPanelName").value == 'NewOrderPayment' ||
            document.getElementById("payPanelName").value == 'PendingOrderUpdate' ||
            document.getElementById("payPanelName").value == 'NewOrderPaymentUp' ||
            document.getElementById("payPanelName").value == 'CrySellPayment' ||
            document.getElementById("payPanelName").value == 'CrySellPayUp') {
        var CashToSTMetalWtCRDR = 'CR';
    }

    if (document.getElementById('PaymentReceiptPanel').value == 'PAYMENT' ||
            (document.getElementById("payPanelName").value == 'StockPayment' ||
                    document.getElementById("payPanelName").value == 'StockPayUp') ||
            document.getElementById("payPanelName").value == 'RawPayUp' ||
            document.getElementById("payPanelName").value == 'StockReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPanel' ||
            document.getElementById("payPanelName").value == 'ItemReturnPayUp' ||
            document.getElementById("payPanelName").value == 'RawPayment' ||
            document.getElementById("payPanelName").value == 'CrystalStockPayment' ||
            document.getElementById("payPanelName").value == 'SchemePayment' ||
            document.getElementById("payPanelName").value == 'CrystalStockPayUp') {
        var CashToSTMetalWtCRDR = 'DR';
    }
    // SILVER CASE - CASH TO METAL CASE - SILVER WT CRDR SHOWING WRONG @PRIYANKA-28JUNE18
    // END CODE FOR Payment Panel Issue : (Rate Cut)

    // alert('CashToSLMetalWtCRDR == ' + CashToSLMetalWtCRDR);

    // SL METAL FINAL FINE WEIGHT @PRIYANKA-10APR18 
    document.getElementById('CashToStMetalWt').value = parseFloat(StFinalMetalWeight).toFixed(3);
    // SL METAL FINAL FINE WEIGHT CRDR @DARSHANA 9 JULY 2021
    document.getElementById('CashToStMetalWtCRDR').value = CashToSTMetalWtCRDR;
    // SL CASH TO METAL WEIGHT BAL TYPE @DARSHANA 9 JULY 2021
    var CashToStMetalWtType = 'CT';
    // SL CASH TO METAL WEIGHT BAL @DARSHANA 9 JULY 2021 
    document.getElementById('CashMetalStBal').value = parseFloat(document.getElementById('CashToStMetalWt').value).toFixed(3) + ' ' + CashToStMetalWtType;
    // SL CASH TO METAL WEIGHT BAL CRDR @DARSHANA 9 JULY 2021
    document.getElementById('CashMetalStBalCRDR').value = document.getElementById("CashToStMetalWtCRDR").value;

    //alert('CashToSlMetalWtCRDR == ' + document.getElementById('CashToSlMetalWtCRDR').value);

    // SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    // END CASH TO METAL FUNCTIONALITY FOR STONE: DARSHANA 9 JULY 2021
    // SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS

    // REMAINING CASH BALANCE ON PAYMENT PANEL @PRIYANKA-10APR18 
    if (document.getElementById('paymentMode').value == 'NoRateCut' || document.getElementById('paymentMode').value == 'RateCut') {

        //alert('PayPrevAmtDisp @@== ' + document.getElementById(prefix + 'PayPrevAmtDisp').value);
        // alert('utin_prev_cash_opening **== ' + document.getElementById(prefix + 'utin_prev_cash_opening').value);
        // alert('utin_cash_to_metal **== ' + document.getElementById(prefix + 'utin_cash_to_metal').value);
        // alert('utin_prev_cash_bal **== ' + document.getElementById(prefix + 'utin_prev_cash_bal').value);
        // alert('GdCashToMetal **== ' + document.getElementById('GdCashToMetal').value);
        // alert('PrevGdCashBal **== ' + document.getElementById('PrevGdCashBal').value);

        if (document.getElementById("utin_cash_to_metal").value == '' || document.getElementById("utin_sl_cash_to_metal").value == '') {

            if (document.getElementById("utin_cash_to_metal").value == '') {
                if (document.getElementById("PrevTotOpeningAmt").value == 0 && document.getElementById("utin_prev_cash_opening").value > 0) {
                    document.getElementById("utin_prev_cash_bal").value = parseFloat(document.getElementById("utin_prev_cash_opening").value).toFixed(2);
                    document.getElementById("utin_prev_cash_bal_CRDR").value = document.getElementById("utin_prev_cash_opening_CRDR").value;
                } else {
                    document.getElementById("utin_prev_cash_bal").value = parseFloat(document.getElementById("PrevTotOpeningAmt").value).toFixed(2);
                    document.getElementById("utin_prev_cash_bal_CRDR").value = document.getElementById("PrevTotOpeningAmtCRDR").value;
                }
            }

            if (document.getElementById("utin_sl_cash_to_metal").value == '') {
                document.getElementById("utin_sl_prev_cash_bal").value = parseFloat(document.getElementById("PrevTotOpeningAmt").value).toFixed(2);
                document.getElementById("utin_sl_prev_cash_bal_CRDR").value = document.getElementById("PrevTotOpeningAmtCRDR").value;
            }

            document.getElementById(prefix + 'PayPrevTotAmt').value = document.getElementById('PrevTotOpeningAmt').value;
            document.getElementById(prefix + 'PayPrevAmtDisp').value = document.getElementById('PrevTotOpeningAmt').value;
            document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById('PrevTotOpeningAmtCRDR').value;

            //alert('PayPrevAmtDisp $$== ' + document.getElementById(prefix + 'PayPrevAmtDisp').value);

        }

        // var sl_prev_cash_bal = document.getElementById("utin_sl_prev_cash_bal").value;
        // var gd_prev_cash_bal = document.getElementById("utin_prev_cash_bal").value;

        // GD PREV CASH OPENING IS GREATER THAN ZERO && GD CASH TO METAL AMOUNT IS GREATER THAN ZERO @PRIYANKA-10APR18
        if (document.getElementById("utin_prev_cash_opening").value > 0 || document.getElementById("GdCashToMetal").value > 0) {

            // CASH BALANCE ON PAYMENT PANEL @PRIYANKA-06APR18
            // if(document.getElementById("utin_prev_cash_bal").value == '0.00'){   
            document.getElementById(prefix + 'PayPrevTotAmt').value = parseFloat(Math.abs(document.getElementById("utin_prev_cash_bal").value)).toFixed(2);
            document.getElementById(prefix + 'PayPrevAmtDisp').value = parseFloat(Math.abs(document.getElementById("utin_prev_cash_bal").value)).toFixed(2);
            document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById('utin_prev_cash_bal_CRDR').value;
            // alert('PayPrevAmtDisp ##== ' + document.getElementById(prefix + 'PayPrevAmtDisp').value);
            // alert('PayPrevCashBalCRDR ##== ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);           
            // }

        }

        if (document.getElementById("utin_sl_prev_cash_opening").value > 0 || document.getElementById("SlCashToMetal").value > 0) {

            // PREV CASH AMOUNT ON PAYMENT PANEL @PRIYANKA-10APR18   
            document.getElementById(prefix + 'PayPrevTotAmt').value = parseFloat(Math.abs(document.getElementById("utin_sl_prev_cash_bal").value)).toFixed(2);
            document.getElementById(prefix + 'PayPrevAmtDisp').value = parseFloat(Math.abs(document.getElementById("utin_sl_prev_cash_bal").value)).toFixed(2);
            document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById('utin_sl_prev_cash_bal_CRDR').value;
            // alert('PayPrevAmtDisp ##== ' + document.getElementById(prefix + 'PayPrevAmtDisp').value);
            // alert('PayPrevCashBalCRDR ##== ' + document.getElementById(prefix + 'PayPrevCashBalCRDR').value);           

        }

        //alert('utin_prev_cash_bal $$== ' + document.getElementById('utin_prev_cash_bal').value);

        // START CODE FOR ADDED CONDITION FOR PREV BAL NOT DISPLAY IN NO RATE CUT CASE - UPDATE TIME @PRIYANKA-21JUNE18
        if (document.getElementById("payPanelName").value != 'StockPayUp' &&
                document.getElementById("payPanelName").value != 'ItemReturnPayUp' &&
                document.getElementById("transPanelName").value != 'SellPayUp' &&
                document.getElementById("payPanelName").value != 'ItemRepairPayUp' &&
                document.getElementById("transPanelName").value != 'PurchaseReturnPayUp' &&
                document.getElementById("transPanelName").value != 'ApprovalPayUp' &&
                document.getElementById("payPanelName").value != 'RawPayUp') {
            if (document.getElementById("utin_prev_cash_bal").value == '0.00') {
                document.getElementById(prefix + 'PayPrevTotAmt').value = '0.00';
                document.getElementById(prefix + 'PayPrevAmtDisp').value = '0.00';
                document.getElementById("utin_sl_prev_cash_bal").value = '0.00';
                document.getElementById("utin_sl_prev_cash_opening").value = '0.00';
            }
        }
        // END CODE FOR ADDED CONDITION FOR PREV BAL NOT DISPLAY IN NO RATE CUT CASE - UPDATE TIME @PRIYANKA-21JUNE18
    }

    //calcWholeSaleRateCut(prefix);
}
// *************************************************************************************************************/
// END CODE TO CONVERT AMOUNT TO METAL WEIGHT @PRIYANKA-05APR18
// *************************************************************************************************************/
//
// *************************************************************************************************************/
// START CODE FOR REVERSE CALCULATION ON PAYMENT PANEL @PRIYANKA-28SEP18
// *************************************************************************************************************/
function reverseCalcOfPayment(prefix, reverseMode) {
    //
    // NEW TAXABLE AMT
    var newTaxableAmt = 0;
    // 
    // TOTAL AMOUNT
    var totalAmount = parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value).toFixed(2);    
    var payFinAmtBalDisp = parseFloat(document.getElementById(prefix + 'PayFinAmtBalDisp').value).toFixed(2);
    var payCashMode = document.getElementById("amountPaidReceiveOption").value;
    var totalAmounttaxbyval=totalAmount;
    //
    if ((totalAmount != '' && totalAmount != null && totalAmount > 0 && totalAmount != 'NaN' && 
        payFinAmtBalDisp != '' && payFinAmtBalDisp != null && payFinAmtBalDisp > 0 && payFinAmtBalDisp != 'NaN') || 
        (reverseMode == 'FinalAmount' && payCashMode == 'amountPaid' && totalAmount != '' && totalAmount != 0 && totalAmount != null && totalAmount != 'NaN' && 
         payFinAmtBalDisp != '' && payFinAmtBalDisp != null&& payFinAmtBalDisp != 0 && payFinAmtBalDisp != 'NaN')) {
        //
        // TOTAL AMOUNT DISPLAY
        document.getElementById(prefix + 'PayTotCashAmtDisp').value = parseFloat(totalAmount).toFixed(2);
        //
        //
        if (document.getElementById('utin_pay_tax_on_total_amt_chk').checked) {

            //var totalMakingAmtWithGst = parseFloat(parseFloat(document.getElementById(prefix + 'PayCashOthChgsDisp').value) + parseFloat(document.getElementById(prefix + 'PayMkgCGSTAmtDisp').value) + parseFloat(document.getElementById(prefix + 'PayMkgSGSTAmtDisp').value)).toFixed(2);
            //totalAmount = parseFloat(parseFloat(totalAmount) - parseFloat(totalMakingAmtWithGst)).toFixed(2);

            // Set Variable For Reverse Calculation @PRIYANKA-15OCT18
            document.getElementById('reverseCalculation').value = 'Yes';

        } else {
            //
             document.getElementById('reverseCalculation').value = 'Yes';
            var totalMakingAmtWithGst = parseFloat(parseFloat(document.getElementById(prefix + 'PayCashOthChgsDisp').value) + parseFloat(document.getElementById(prefix + 'PayMkgCGSTAmtDisp').value) + parseFloat(document.getElementById(prefix + 'PayMkgSGSTAmtDisp').value)).toFixed(2);
             totalAmount = parseFloat(parseFloat(totalAmount) - parseFloat(totalMakingAmtWithGst)).toFixed(2);
            //
            //var totalHallmarkingAmtWithGst = parseFloat(parseFloat(document.getElementById(prefix + 'PayHallmarkChgsDisp').value) + parseFloat(document.getElementById(prefix + 'PayHallmarkCGSTAmtDisp').value) + parseFloat(document.getElementById(prefix + 'PayHallmarkSGSTAmtDisp').value) + parseFloat(document.getElementById(prefix + 'PayHallmarkIGSTAmtDisp').value)).toFixed(2);
            //totalAmount = parseFloat(parseFloat(totalAmount) - parseFloat(totalHallmarkingAmtWithGst)).toFixed(2);
            //
        }
        //
        // PREVIOUS AMOUNT @PRIYANKA-17OCT18
        //here issue reverse calc PRATHAMESH get values excluding .,
        var prevAmount = parseFloat((document.getElementById(prefix + 'PayPrevAmtDisp').value).replace(/\,/g, '')).toFixed(2);        
        var payTotAmtRecDisp = parseFloat(document.getElementById(prefix + 'PayTotAmtRecDisp').value).toFixed(2);
        var payCashRecDisp = parseFloat(document.getElementById(prefix + 'PayCashRecDisp').value).toFixed(2);
        var lpRedeemDisp = parseFloat(document.getElementById('lpRedeemDisp').value).toFixed(2);
        var payDiscountDisp = parseFloat(document.getElementById(prefix + 'PayDiscountDisp').value).toFixed(2);
        //
        //alert('prevAmount == ' + prevAmount);
        //
        if (prevAmount > 0) {
            if (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') {
                totalAmount = parseFloat(parseFloat(totalAmount) - parseFloat(prevAmount)).toFixed(2);
            } else if (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR'){
                totalAmount = parseFloat(parseFloat(totalAmount) + parseFloat(prevAmount)).toFixed(2);
            }
        }
        //
        if (reverseMode == 'FinalAmount') {
            if (prevAmount > 0) {
                if (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'DR') {
                    payFinAmtBalDisp = parseFloat(parseFloat(payFinAmtBalDisp) - parseFloat(prevAmount)).toFixed(2);
                } else if (document.getElementById(prefix + 'PayPrevCashBalCRDR').value == 'CR'){
                    payFinAmtBalDisp = parseFloat(parseFloat(payFinAmtBalDisp) + parseFloat(prevAmount)).toFixed(2);
                }
            }
            totalAmount = parseFloat(parseFloat(payFinAmtBalDisp) + parseFloat(payTotAmtRecDisp) + parseFloat(payCashRecDisp) + parseFloat(lpRedeemDisp) + parseFloat(payDiscountDisp)).toFixed(2);
        }
        //alert('totalAmount == ' + totalAmount);
        //        
        // OLD TAXABLE AMOUNT
        var oldTaxableAmt = parseFloat(document.getElementById('utin_total_taxable_amt').value).toFixed(2);
        //
        //
        //alert('CGSTCheck == ' + document.getElementById('CGSTCheck').checked);
        //alert('SGSTCheck == ' + document.getElementById('SGSTCheck').checked);
        //alert('IGSTCheck == ' + document.getElementById('IGSTCheck').checked);
        //
        // GST TAX CHECK
        if (document.getElementById('CGSTCheck').checked) {
            // CGST AND SGST TAX CHECK
            // CALCULATE NEW TAXABLE AMT
            newTaxableAmt = (parseFloat(100 * parseFloat(totalAmount)) / (100 + parseFloat(document.getElementById(prefix + 'CGST').value) * 2)).toFixed(2);
        } else if (document.getElementById('IGSTCheck').checked) {
            // IGST TAX CHECK
            // CALCULATE NEW TAXABLE AMT
            newTaxableAmt = (parseFloat(100 * parseFloat(totalAmount)) / (100 + parseFloat(document.getElementById(prefix + 'IGST').value))).toFixed(2);
        } else {
            // ADDED CODE FOR REVERSE CALCULATION ON PAYMENT PANEL WHEN GST NOT APPLIED @PRIYANKA-12OCT2020
            newTaxableAmt = parseFloat(totalAmount);
        }
        //
        //alert('newTaxableAmt == ' + newTaxableAmt);
        //
        if (parseInt(newTaxableAmt) > parseInt(oldTaxableAmt)) {
            // CALCULATE DISCOUNT
            if (document.getElementById('sellReverseCalculation').value == 'BYDIS' && document.getElementById('discountAmtDisp').value > 0) {
                var amtDifference = (newTaxableAmt - oldTaxableAmt);
                if (amtDifference < document.getElementById('discountAmtDisp').value) {
                    var newDiscountAmt = parseFloat(parseFloat(document.getElementById('discountAmtDisp').value) - parseFloat(amtDifference)).toFixed(2);
                    //
                    document.getElementById('utin_reverse_cal_by').value = 'BYDIS';
                    //
                    document.getElementById('discountAmtDisp').value = Math.abs(parseFloat(newDiscountAmt)).toFixed(2);
                    document.getElementById('utin_discount_amt_discup').value = Math.abs(parseFloat(newDiscountAmt)).toFixed(2);
                     if(document.getElementById('TaxByVal').checked && !document.getElementById('utin_pay_tax_on_total_amt_chk').checked){
                       document.getElementById(prefix + 'PayTotAmtAccess').value=Math.abs(parseFloat(totalAmounttaxbyval)).toFixed(2);
                        }
                    //
                } else {
                    var remAmtDifference = (amtDifference - document.getElementById('discountAmtDisp').value);
                    //
                    document.getElementById('utin_reverse_cal_by').value = 'BYDIS&MKG';
                    //
                    document.getElementById('discountAmtDisp').value = 0;
                    document.getElementById('utin_discount_amt_discup').value = 0;
                    //
                    var newMakingCharges = parseFloat(remAmtDifference).toFixed(2);
                    var oldMakingCharges = parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value).toFixed(2);
                    //
                    // MAKING DISPLAY
                    document.getElementById(prefix + 'PayCashOthChgsDisp').value = Math.abs(parseFloat(newMakingCharges) + parseFloat(oldMakingCharges)).toFixed(2);
                    document.getElementById('taxOnTotMkgCGSTChrg').value = Math.abs(parseFloat(newMakingCharges) + parseFloat(oldMakingCharges)).toFixed(2);
                    document.getElementById(prefix + 'PayTotOthChgs').value = Math.abs(parseFloat(newMakingCharges) + parseFloat(oldMakingCharges)).toFixed(2);
                     if(document.getElementById('TaxByVal').checked && !document.getElementById('utin_pay_tax_on_total_amt_chk').checked){
                       document.getElementById(prefix + 'PayTotAmtAccess').value=Math.abs(parseFloat(totalAmounttaxbyval)).toFixed(2);
                        }
                }
            } else if (document.getElementById('sellReverseCalculation').value == 'BYCSWS') {
                //
                var amountDifference = (newTaxableAmt - oldTaxableAmt);
                var oldTotalAmount = document.getElementById(prefix + 'PayTotAmt').value;
                //
                document.getElementById('utin_reverse_cal_by').value = 'BYCSWS';
                //
                document.getElementById(prefix + 'PayTotAmt').value = Math.abs(parseFloat(oldTotalAmount) + parseFloat(amountDifference)).toFixed(2);
                document.getElementById(prefix + 'PayTotAmtBalDisp').value = Math.abs(parseFloat(oldTotalAmount) + parseFloat(amountDifference)).toFixed(2);
                document.getElementById(prefix + 'PayTotAmtAccess').value = Math.abs(parseFloat(oldTotalAmount) + parseFloat(amountDifference)).toFixed(2);
                 if(document.getElementById('TaxByVal').checked && !document.getElementById('utin_pay_tax_on_total_amt_chk').checked){
                       document.getElementById(prefix + 'PayTotAmtAccess').value=Math.abs(parseFloat(totalAmounttaxbyval)).toFixed(2);
                        }
                //
            } else {
                var newMakingCharges = (newTaxableAmt - oldTaxableAmt);
                //
                var oldMakingCharges = parseFloat(document.getElementById(prefix + 'PayTotOthChgs').value).toFixed(2);
                //
                document.getElementById('utin_reverse_cal_by').value = 'BYMKG';
                // MAKING DISPLAY
                document.getElementById(prefix + 'PayCashOthChgsDisp').value = Math.abs(parseFloat(newMakingCharges) + parseFloat(oldMakingCharges)).toFixed(2);
                document.getElementById('taxOnTotMkgCGSTChrg').value = Math.abs(parseFloat(newMakingCharges) + parseFloat(oldMakingCharges)).toFixed(2);
                document.getElementById(prefix + 'PayTotOthChgs').value = Math.abs(parseFloat(newMakingCharges) + parseFloat(oldMakingCharges)).toFixed(2);
                 if(document.getElementById('TaxByVal').checked && !document.getElementById('utin_pay_tax_on_total_amt_chk').checked){
                       document.getElementById(prefix + 'PayTotAmtAccess').value=Math.abs(parseFloat(totalAmounttaxbyval)).toFixed(2);
                        }
            }
            //
        } else { 
            if (document.getElementById('sellReverseCalculation').value == 'BYMKG' && document.getElementById(prefix + 'PayCashOthChgsDisp').value > 0) { 
                var amtDifference = (oldTaxableAmt - newTaxableAmt);
                if (amtDifference < document.getElementById(prefix + 'PayCashOthChgsDisp').value) {
                    var newMakingAmt = parseFloat(parseFloat(document.getElementById(prefix + 'PayCashOthChgsDisp').value) - parseFloat(amtDifference)).toFixed(2);
                    //
                    document.getElementById('utin_reverse_cal_by').value = 'BYMKG';
                    //
                    document.getElementById(prefix + 'PayCashOthChgsDisp').value = Math.abs(parseFloat(newMakingAmt)).toFixed(2);
                    document.getElementById('taxOnTotMkgCGSTChrg').value = Math.abs(parseFloat(newMakingAmt)).toFixed(2);
                    document.getElementById(prefix + 'PayTotOthChgs').value = Math.abs(parseFloat(newMakingAmt)).toFixed(2);
                    if(document.getElementById('TaxByVal').checked && !document.getElementById('utin_pay_tax_on_total_amt_chk').checked){
                       document.getElementById(prefix + 'PayTotAmtAccess').value=Math.abs(parseFloat(totalAmounttaxbyval)).toFixed(2);
                        }
                    
                    //
                } else {
                    //
                    var newDiscount = (amtDifference - document.getElementById(prefix + 'PayCashOthChgsDisp').value);
                    //
                    document.getElementById(prefix + 'PayCashOthChgsDisp').value = 0;
                    document.getElementById('taxOnTotMkgCGSTChrg').value = 0;
                    document.getElementById(prefix + 'PayTotOthChgs').value = 0;
                    //
                    document.getElementById('utin_reverse_cal_by').value = 'BYDIS&MKG';
                    //
                    document.getElementById('discountAmtDisp').value = Math.abs(parseFloat(newDiscount)).toFixed(2);
                    document.getElementById('utin_discount_amt_discup').value = Math.abs(parseFloat(newDiscount)).toFixed(2);
                     if(document.getElementById('TaxByVal').checked && !document.getElementById('utin_pay_tax_on_total_amt_chk').checked){
                       document.getElementById(prefix + 'PayTotAmtAccess').value=Math.abs(parseFloat(totalAmounttaxbyval)).toFixed(2);
                        }
                    //
                }
            } else if (document.getElementById('sellReverseCalculation').value == 'BYCSWS') {
                //
                var amountDifference = (oldTaxableAmt - newTaxableAmt);
                var oldTotalAmount = document.getElementById(prefix + 'PayTotAmt').value;
                //
                document.getElementById('utin_reverse_cal_by').value = 'BYCSWS';
                //
                document.getElementById(prefix + 'PayTotAmt').value = Math.abs(parseFloat(oldTotalAmount) - parseFloat(amountDifference)).toFixed(2);
                document.getElementById(prefix + 'PayTotAmtBalDisp').value = Math.abs(parseFloat(oldTotalAmount) - parseFloat(amountDifference)).toFixed(2);
                document.getElementById(prefix + 'PayTotAmtAccess').value = Math.abs(parseFloat(oldTotalAmount) - parseFloat(amountDifference)).toFixed(2);
                //
            } else {
                // CALCULATE DISCOUNT
                var discount = (oldTaxableAmt - newTaxableAmt);
                //
                document.getElementById('utin_reverse_cal_by').value = 'BYDIS';
                // DISCOUNT DISPLAY
                document.getElementById('discountAmtDisp').value = Math.abs(parseFloat(discount)).toFixed(2);
                document.getElementById('utin_discount_amt_discup').value = Math.abs(parseFloat(discount)).toFixed(2);
                if(document.getElementById('TaxByVal').checked && !document.getElementById('utin_pay_tax_on_total_amt_chk').checked){
                document.getElementById(prefix + 'PayTotAmtAccess').value=Math.abs(parseFloat(totalAmounttaxbyval)).toFixed(2);
            }
                //
            }
        }
        //
        //
        // CALCULATE DISCOUNT IN %
        // var utin_discount_per_discup = ((parseFloat(discount) * 100) / parseFloat(document.getElementById('utin_total_taxable_amt').value)).toFixed(2);
        //
        // DISCOUNT IN %
        // document.getElementById('utin_discount_per_discup').value = parseFloat(utin_discount_per_discup).toFixed(2);
        //   
    }
    return false;
}
// *************************************************************************************************************/
// END CODE FOR REVERSE CALCULATION ON PAYMENT PANEL @PRIYANKA-28SEP18
// *************************************************************************************************************/

//
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR CURRENCY CHANGE CHECK @PRIYANKA-01AUG19
// *************************************************************************************************************************************
function changeCalcAccordingToCurrency(operation, panelName, userId, transactionType, indicator, stockType,
        transPanelName, payPanelName, panelNameNav, utin_currency_change_chk,
        prodPreInvNo, prodInvNo) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainMiddleCustHome").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcdccdd.php?operation=" + operation + "&panelName=" + panelName +
            "&userId=" + userId + "&userId=" + userId + "&transactionType=" + transactionType + "&indicator=" + indicator +
            "&stockType=" + stockType + "&transPanelName=" + transPanelName + "&payPanelName=" + payPanelName +
            "&panelNameNav=" + panelNameNav + "&utin_currency_change_chk=" + utin_currency_change_chk +
            "&prodPreInvNo=" + prodPreInvNo + "&prodInvNo=" + prodInvNo, true);
    //
    xmlhttp.send();
}
//
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR CURRENCY CHANGE CHECK @PRIYANKA-01AUG19
// *************************************************************************************************************************************
function calculateFinalFineWt(metalCount) {
    var lbrWtAddMinusValue = document.getElementById('lbrWtAddMinusValue' + metalCount).value;
    var sttr_fine_weight = document.getElementById('sttr_fine_weight' + metalCount).value;
    var sttr_lab_charges = document.getElementById('sttr_lab_charges' + metalCount).value;
    var finalFineWeight = 0;
    //
    if (lbrWtAddMinusValue == '' || lbrWtAddMinusValue == null) {
        lbrWtAddMinusValue = 'minus';
    }
    //
    if (sttr_fine_weight == '' || sttr_fine_weight == null || sttr_fine_weight == 'NaN') {
        sttr_fine_weight = 0;
    }
    //
    if (sttr_lab_charges == '' || sttr_lab_charges == null || sttr_lab_charges == 'NaN') {
        sttr_lab_charges = 0;
    }
    //
    if (sttr_lab_charges > 0) {
        if (lbrWtAddMinusValue == 'plus') {
            finalFineWeight = parseFloat(parseFloat(sttr_fine_weight) + parseFloat(sttr_lab_charges)).toFixed(3);
        } else {
            finalFineWeight = parseFloat(parseFloat(sttr_fine_weight) - parseFloat(sttr_lab_charges)).toFixed(3);
        }
    } else {
        finalFineWeight = parseFloat(sttr_fine_weight).toFixed(3);
    }
    //
    if (finalFineWeight != '' && finalFineWeight != 'NaN') {
        document.getElementById('sttr_final_fine_weight' + metalCount).value = finalFineWeight;
    } else {
        document.getElementById('sttr_final_fine_weight' + metalCount).value = 0;
    }
}
//
function validateAmountForPanDetails() {
    var prefix = document.getElementById('prefix').value;
    var payCashAmt = document.getElementById(prefix + 'PayCashAmtRec').value;
    var payCashAmtLimitForPanValidation = document.getElementById('payCashAmtLimitForPanValidation').value;
    var panDetailsPresentForValidation = document.getElementById('panDetailsPresentForValidation').value;
    //
    if ((payCashAmtLimitForPanValidation != '' && payCashAmtLimitForPanValidation > 0)) {
        if ((parseFloat(payCashAmt) > parseFloat(payCashAmtLimitForPanValidation)) && (panDetailsPresentForValidation == 'NO')) {
            document.getElementById(prefix + 'PayCashAmtRec').value = 0.00;
            document.getElementById(prefix + 'PayCashAmtRec').focus();
            alert("Entered Cash Amount is greater! Please Update PAN card Details!");
            return false;
        }
//        
    }
}
//
function getChrgesIncludeExcludeDropdown(prefix, inputId, divId, keyCodeInput) {
    var keyCode = keyCodeInput;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            if (keyCode == 40 || keyCode == 38) {
                document.getElementById('transChargesIncludeExclude').focus();
                document.getElementById('transChargesIncludeExclude').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/ompaytchdropdown.php?prefix=' + prefix + "&inputId=" + inputId + "&divId=" + divId, true);
    xmlhttp.send();
}

//****************************************************************************************************
//LOYALTY REDEEM POINTS CODE BEGINS
//****************************************************************************************************

// When the user clicks on Redeem Loyalty Points button, open the modal author@AMRUTA:02JUNE2022
function openRedeemLoyaltyPointsPopUp(userId, utin_lp_close) {
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
    xmlhttp.open("POST", 'include/php/omlypopup.php?userId=' + userId + "&utin_lp_close=" + utin_lp_close, true);
    xmlhttp.send();
}

function closeRedeemLoyaltyPointsPopUp()
{
    document.getElementById('myModal').style.display = 'none';
    document.getElementById('myModal').style.display = 'none';
}


//Check Loyalty Card number validation   author@AMRUTA:03JUNE2022
function loyaltycardnumber(loyaltycard, userId, utin_lp_close) {
//
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('checkloyaltycardnodiv').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/omcheckloyalno.php?loyaltycard=' + loyaltycard + "&userId=" + userId + "&utin_lp_close=" + utin_lp_close, true);
    xmlhttp.send();
}

//Add New Loyalty Card   author@AMRUTA:03JUNE2022
function addLoyaltyCardNo(userId, loyaltycard, utin_lp_close) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('checkloyaltycardnodiv').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", 'include/php/omupdateloyalno.php?userId=' + userId + "&loyaltycard=" + loyaltycard + "&utin_lp_close=" + utin_lp_close, true);
    xmlhttp.send();
}

//****************************************************************************************************
//LOYALTY REDEEM POINTS CODE ENDS
//****************************************************************************************************
/***************************************************************************************************************/
// ICICI BANK CODE:CODE FOR OPEN POPUP BOX@RENUKA 2022
/***************************************************************************************************************/
function OpenBankPaymentModal(custId, amount) {
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
    xmlhttp.open("POST", "include/php/omBankPaymentPopDiv.php?custId=" + custId + "&amount=" + amount, true);
    xmlhttp.send();
}

function closeBANKPopUp() {
    document.getElementById('myModal').style.display = "none";
}

/***************************************************************************************************************/
//ICICI BANK CODE:End CCODE FOR OPEN POPUP BOX@RENUKA 2022
/***************************************************************************************************************/
/***************************************************************************************************************/
///ICICI BANK CODE: AFTER OTP VERIFICATION SHOW OPTION FOR  BALANCE FETCH AND BANK STATEMENT @RENNUKA 2022
/***************************************************************************************************************/
function OpenBankOTPVerificationPopup(firmid, apiType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (apiType == 'BALANCE_FETCH') {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById('myModal').style.display = "block";
                document.getElementById('myModal').innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        }
    };
    xmlhttp.open("POST", "include/php/omBankotppopupDiv.php?apiType=" + apiType, true);
    xmlhttp.send();
    startTimer(60);
}

/***************************************************************************************************************/
///FIRM CODE: AFTER OTP VERIFICATION SHOW OPTION FOR  OTP @AUTHOR:VINOD-05-06-2023
/***************************************************************************************************************/
function closeOTPPopUp() {
    // Abort running AJAX request if still in progress
    if (typeof activeRequest !== 'undefined' && activeRequest && activeRequest.readyState !== 4) {
        activeRequest.abort();
        console.log("Active AJAX request aborted.");
    }

    // Hide the modal popup
    var modal = document.getElementById('myModal1');
    if (modal) {
        modal.style.display = "none";
        modal.innerHTML = ""; // Optional: clear content if needed
    }

    // Hide loading indicator
    var loader = document.getElementById('main_ajax_loading_div');
    if (loader) {
        loader.style.visibility = "hidden";
    }
}


/***************************************************************************************************************/
/////FIRM CODE: AFTER OTP VERIFICATION CLOSE OPTION FOR OTP@AUTHOR:VINOD-05-06-2023
/***************************************************************************************************************/
/***************************************************************************************************************/
///FIRM DELETE CODE: AFTER OTP VERIFICATION SHOW OPTION FOR @AUTHOR:VINOD-05-06-2023
/***************************************************************************************************************/
function OpenOTPVerificationPopup(firmid) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('myModal1').style.display = "block";
            document.getElementById('myModal1').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }

    };
    xmlhttp.open("POST", "include/php/omotppopupDiv.php?firmid=" + firmid, true);
    xmlhttp.send();
}

/***************************************************************************************************************/
///FIRM DELETE CODE: AFTER OTP VERIFICATION SHOW OPTION FOR  @AUTHOR:VINOD-05-06-2023
/***************************************************************************************************************/
function calChangeFinalAmtWithSchemeBonus(id, count)
{
    //console.log(id);
    var panelName = "FINE_JEWELLERY_SELL_B2";
    var scpanelName = "SCHEME_DEPOSIT";
    var sellPanelName = "SlPrPayment";
    //
    //
    if (id == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                mkg_charges_disc_amt
                document.getElementById('rateCutDiv').innerHTML = xmlhttp.responseText;
                document.getElementById('cashAmount' + count).value = document.getElementById('sc_cash_amt').value;
                document.getElementById('oldCashPayAmt' + count).value = document.getElementById('sc_old_cash_amt').value;
                document.getElementById('scLastBonusPayAmt' + count).value = document.getElementById('sc_last_bonus_amt').value;
                document.getElementById('mkg_charges_disc_amt').value = document.getElementById('sc_mkg_disc_amt').value;
                document.getElementById('selPayCash' + count).checked = 'checked';
                if (document.getElementById('cashAmount' + count).value != "" || document.getElementById('scLastBonusPayAmt' + count).value != "")
                {
                    document.getElementById('mkg_change_scheme_indicator').value = "SCHEME_MKG_INDICATOR_ON";
                } else
                {
                    document.getElementById('mkg_change_scheme_indicator').value = "SCHEME_MKG_INDICATOR_OFF";
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };

        //omkityupindv
        xmlhttp.open("POST", "include/php/ompaydet.php?userId=" + userId + "&utin_utin_id=" + utin_utin_id + "&invPreInvoiceId=" + invPreInvoiceId + "&invPostInvoiceId=" + invPostInvoiceId + "&panelname=" + panelName + "&scpanelname=" + scpanelName +
                "&cashAmountBal=" + cashAmountBal + "&invCount=" + count + "&advInvPreInvId=" + advInvPreInvId + "&advInvPostInvId=" + advInvPostInvId, true);
        xmlhttp.send();
    } else
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById('slPrCurrentInvBeforePay').innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogspindv.php?userId=" + userId + "&utin_utin_id=" + utin_utin_id + "&invPreInvoiceId=" + invPreInvoiceId + "&invPostInvoiceId=" + invPostInvoiceId + "&panelname=" + panelName + "&scpanelname=" + scpanelName +
                "&cashAmountBal=" + cashAmountBal + "&invCount=" + count + "&sellpanelName=" + sellPanelName, true);
        xmlhttp.send();
    }
}
//
//
var utin_utin_id_str = "";
var invoice_pre_id_str = "";
var invoice_post_id_str = "";
var checkbox_id_str = "";
var paySchemeTyp_id_str = "";
function onloadSchemeMakAmt(checkId, countId, paySchemeTyp, checkBId)
{
    //console.log("total inv"+document.getElementById('total_sc_inv_cnt').value);
    var total_inv_num = document.getElementById('total_sc_inv_cnt').value;
    //console.log(paySchemeTyp + document.getElementById('panelName').value);
    var panelName = document.getElementById('panelName').value;
    if (panelName == 'SellPayUp')
    {
        utin_utin_id_str = document.getElementById('utin_utin_id_str').value;
        invoice_pre_id_str = document.getElementById('invoice_pre_id_str').value;
        invoice_post_id_str = document.getElementById('invoice_post_id_str').value;
        checkbox_id_str = document.getElementById('checkbox_id_str').value;
        paySchemeTyp_id_str = document.getElementById('paySchemeTyp_id_str').value;
        //console.log(utin_utin_id_str+invoice_pre_id_str+invoice_post_id_str);
        if (utin_utin_id_str == "" || utin_utin_id_str == null || invoice_pre_id_str == "" || invoice_pre_id_str == null || invoice_post_id_str == "" || invoice_post_id_str == null)
        {
            //                   
            //console.log(countId);
            if (countId >= 1) {
                //console.log("in count 1");
                var chk = countId;

                var sc_ind = document.getElementById('scheme_indicator' + chk).value;
                if (sc_ind == "SCHEME_DEPOSIT")
                {
                    //console.log("in for");
                    var g_checkbox = document.getElementById('selPayGold' + chk).value;
                    //console.log("gold:::".g_checkbox);
                    var s_checkbox = document.getElementById('selPaySilver' + chk).value;
                    //console.log("silver:"+s_checkbox);
                    var st_checkbox = document.getElementById('selPayCrystal' + chk).value;
                    //console.log("stone"+st_checkbox);
                    var ca_checkbox = document.getElementById('selPayCash' + chk).value;
                    //console.log("cash::"+ca_checkbox);
                    //
                    //check this is scheme indicator is set or not  
                    if (utin_utin_id_str == "" || utin_utin_id_str == null || invoice_pre_id_str == "" || invoice_pre_id_str == null || invoice_post_id_str == "" || invoice_post_id_str == null)
                    {
                        utin_utin_id_str = document.getElementById('utin_utin_id' + chk).value;
                        if (utin_utin_id_str == "" || utin_utin_id_str == null)
                        {
                            utin_utin_id_str = "|";
                        }

                        invoice_pre_id_str = document.getElementById('invPreInvoiceId' + chk).value;
                        invoice_post_id_str = document.getElementById('invPostInvoiceId' + chk).value;
                        if (ca_checkbox == 'checked')
                        {
                            checkbox_id_str = 'selPayCash' + chk;
                        } else if (g_checkbox == 'checked') {
                            checkbox_id_str = 'selPayGold' + chk;
                        } else if (s_checkbox == 'checked') {
                            checkbox_id_str = 'selPaySilver' + chk;
                        } else if (st_checkbox == 'checked') {
                            checkbox_id_str = 'selPayCrystal' + chk;
                        }
                        //console.log(checkbox_id_str);
                        if (typeof (document.getElementById('paymentTypSc' + chk) != "" || document.getElementById('paymentTypSc' + chk).value != null) &&
                                (document.getElementById('paymentTypSc' + chk).value != "" || document.getElementById('paymentTypSc' + chk).value != null))
                        {
                            paySchemeTyp_id_str = document.getElementById('paymentTypSc' + chk).value;
                        } else
                        {
                            paySchemeTyp_id_str = paySchemeTyp;
                        }

                        //
                        checkBox_len = chk;
                        //console.log(checkBox_len);
                    } else
                    {
                        //console.log("chkcnt"+chk);
                        if (utin_utin_id_str == "" || utin_utin_id_str == null)
                        {
                            utin_utin_id_str = "|";
                        }
                        utin_utin_id_str = utin_utin_id_str + "_" + document.getElementById('utin_utin_id' + chk).value;
                        invoice_pre_id_str = invoice_pre_id_str + "_" + document.getElementById('invPreInvoiceId' + chk).value;
                        invoice_post_id_str = invoice_post_id_str + "_" + document.getElementById('invPostInvoiceId' + chk).value;
                        if (ca_checkbox == 'on')
                        {
                            checkBoxId = 'selPayCash' + chk;
                        } else if (g_checkbox == 'on') {
                            checkBoxId = 'selPayGold' + chk;
                        } else if (s_checkbox == 'on') {
                            checkBoxId = 'selPaySilver' + chk;
                        } else if (st_checkbox == 'on') {
                            checkBoxId = 'selPayCrystal' + chk;
                        }
                        checkbox_id_str = checkbox_id_str + "_" + checkBoxId;
                        if (document.getElementById('paymentTypSc' + chk).value != "" || document.getElementById('paymentTypSc' + chk).value != null)
                        {
                            paySchemeTyp_id_str = paySchemeTyp_id_str + "_" + document.getElementById('paymentTypSc' + chk).value;
                        } else
                        {
                            paySchemeTyp_id_str = paySchemeTyp_id_str + "_" + paySchemeTyp;
                        }
                        checkBox_len = chk;
                        //console.log(paySchemeTyp_id_str);                    
                    }
                    //
                }

            }
            //console.log("in line 99");
            var panelName = "SellPayUp";
            //
            var sellPanelName = "StockPurchasePanel";
            //
            var prefix = document.getElementById('prefix').value;
            var slPrPreInvoiceNo = document.getElementById('slPrPreInvoiceNo').value;
            var slPrInvoiceNo = document.getElementById('slPrInvoiceNo').value;
            var userId = document.getElementById('userId').value;
            if (paySchemeTyp == 'GOLD-SCHEME')
            {
                var scpanelName = "SCHEME_METAL_DEPOSIT";
            } else if (paySchemeTyp == 'CASH-SCHEME')
            {
                scpanelName = 'SCHEME_DEPOSIT';
            }
            //exit;
        }
    }
    //
    if (checkBox_len > 0)
    {
        //console.log("in if");
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //goldMetalDiv
                //console.log("2nd if");
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                //document.getElementById("schemeSettleDiv").style.display = "block";  last_inv_check_status
                if (document.getElementById('utin_utin_id_str').value == "" || document.getElementById('utin_utin_id_str').value == null)
                {
                    document.getElementById('utin_utin_id_str').value = utin_utin_id_str;
                    //console.log(utin_utin_id_str);
                } else
                {
                    //utin_utin_id_str = utin_utin_id_str + "_" + document.getElementById('utin_utin_id'+countId).value;
                    document.getElementById('utin_utin_id_str').value = utin_utin_id_str;
                }
                //
                if (document.getElementById('invoice_pre_id_str').value == "" || document.getElementById('invoice_pre_id_str').value == null)
                {
                    document.getElementById('invoice_pre_id_str').value = invoice_pre_id_str;
                    //console.log(invoice_pre_id_str);
                } else
                {
                    //invoice_pre_id_str = invoice_pre_id_str + "_" + document.getElementById('invPreInvoiceId'+countId).value;
                    document.getElementById('invoice_pre_id_str').value = invoice_pre_id_str;
                    //console.log(invoice_pre_id_str);
                }
                //
                //
                if (document.getElementById('invoice_post_id_str').value == "" || document.getElementById('invoice_post_id_str').value == null)
                {
                    document.getElementById('invoice_post_id_str').value = invoice_post_id_str;
                    //console.log(invoice_post_id_str);
                } else
                {
                    //invoice_post_id_str = invoice_post_id_str + "_" + document.getElementById('invPostInvoiceId'+countId).value;
                    document.getElementById('invoice_post_id_str').value = invoice_post_id_str;
                    //console.log(invoice_post_id_str);
                }

                //
                if (document.getElementById('checkbox_id_str').value == "" || document.getElementById('checkbox_id_str').value == null)
                {
                    document.getElementById('checkbox_id_str').value = checkbox_id_str;
                    // console.log(document.getElementById('checkbox_id_str').value);
                } else
                {
                    //checkbox_id_str = checkbox_id_str + "_" + checkBId;
                    document.getElementById('checkbox_id_str').value = checkbox_id_str;
                    //console.log(document.getElementById('checkbox_id_str').value);
                }
                //
                if (document.getElementById('paySchemeTyp_id_str').value == "" || document.getElementById('paySchemeTyp_id_str').value == null)
                {
                    document.getElementById('paySchemeTyp_id_str').value = paySchemeTyp_id_str;
                    //console.log(invoice_post_id_str);
                } else
                {
                    //checkbox_id_str = checkbox_id_str + "_" + checkBId;
                    document.getElementById('paySchemeTyp_id_str').value = paySchemeTyp_id_str;
                    //console.log(document.getElementById('paySchemeTyp_id_str').value);
                }
                //
                document.getElementById('rateCutDiv').innerHTML = xmlhttp.responseText;
                //  
                if (paySchemeTyp == 'GOLD-SCHEME')
                {
                    calulateMakingAmount(countId, 'METAL');
                    calcGoldWeight(checkId, countId);
                    calcWholeSaleRateCut(prefix);
                    calulateMakingAmount(countId, 'CASH');
                } else if (paySchemeTyp == 'CASH-SCHEME')
                {
                    calulateMakingAmount(countId, 'CASH');
//                        calcCashAmount(checkId,countId);
//                        calcWholeSaleRateCut(prefix);
                    //calPrevCashBalAfterScheme(prefix);
                    calcPaymentCashBalance(prefix);
//                        calDiscountAmt(prefix);  

                }
                //calPrevCashBalAfterScheme(prefix);
                //calcPaymentCashBalance(prefix);


            } else {
                //console.log("2nd ifelse");
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ompaydet.php?userId=" + userId + "&utin_utin_id=" + utin_utin_id_str + "&invPreInvoiceId=" + invoice_pre_id_str + "&invPostInvoiceId=" + invoice_post_id_str + "&panelName=" + panelName + "&scpanelname=" + scpanelName +
                "&invCount=" + countId + "&mainPanel=" + sellPanelName + "&prefix=" + prefix + "&paySchemeTyp=" + paySchemeTyp_id_str +
                "&slPrPreInvoiceNo=" + slPrPreInvoiceNo + "&slPrPostInvoiceNo=" + slPrInvoiceNo + "&transPanelName=SellPayUp"+ "&mainPanelName=stock", true);
        xmlhttp.send();
    }
}

function calculateSchemeMkgAmt(checkId, countId, paySchemeTyp, checkBId)
{
    var checkCnt_true = [];
    var checkCnt_false = [];
    var jj = 0, kk = 0;
    //    
    if (typeof (document.getElementById('panelName')) != 'undefined' && (document.getElementById('panelName') != null))
    {
        if (document.getElementById('panelName').value != "" || document.getElementById('panelName').value != null || document.getElementById('panelName').value != undefined)
        {
            //console.log(document.getElementById('panelName').value);
            var panelName = document.getElementById('panelName').value;
        } else
        {
            panelName = 'FINE_JEWELLERY_SELL_B2';
        }
    }

    if (panelName == 'SellPayUp')
    {
        utin_utin_id_str = document.getElementById('utin_utin_id_str').value;
        invoice_pre_id_str = document.getElementById('invoice_pre_id_str').value;
        invoice_post_id_str = document.getElementById('invoice_post_id_str').value;
        checkbox_id_str = document.getElementById('checkbox_id_str').value;
        paySchemeTyp_id_str = document.getElementById('paySchemeTyp_id_str').value;
        //console.log("check bos"+checkbox_id_str);
        //console.log(utin_utin_id_str+invoice_pre_id_str+invoice_post_id_str+paySchemeTyp_id_str);
        //
        if (utin_utin_id_str == "" || utin_utin_id_str == null || invoice_pre_id_str == "" || invoice_pre_id_str == null || invoice_post_id_str == "" || invoice_post_id_str == null)
        {
            //   
            //console.log("sell"+countId);
            if (countId > 1) {
                //console.log("sell in count 1");
                for (var chk = 0 + 1; chk <= countId; chk++)
                {
                    //console.log(document.getElementById('checkboxidchekced'+chk).value);
                    var checkBoxId = document.getElementById('checkboxidchekced' + chk).value;
                    if (!checkBoxId || checkBoxId.trim().length === 0)
                    {
                    } else {
                        var checkBoxId = document.getElementById('checkboxidchekced' + chk).value;
                        //console.log(checkBoxId);
                        var can = document.getElementById(checkBoxId).value;
                        //
                        //console.log(can);
                        if (can == 'checked')
                        {
                            if (document.getElementById('utin_utin_id' + chk).value == "" || document.getElementById('utin_utin_id' + chk).value == null)
                            {
                                utin_utin_id_str = utin_utin_id_str + "_" + "|";
                            } else
                            {
                                utin_utin_id_str = utin_utin_id_str + "_" + document.getElementById('utin_utin_id' + chk).value;
                            }
                            invoice_pre_id_str = invoice_pre_id_str + "_" + document.getElementById('invPreInvoiceId' + chk).value;
                            invoice_post_id_str = invoice_post_id_str + "_" + document.getElementById('invPostInvoiceId' + chk).value;
                            checkbox_id_str = checkbox_id_str + "_" + checkBoxId;
                            if (document.getElementById('paymentTypSc' + chk).value == "" || document.getElementById('paymentTypSc' + chk).value != null)
                            {
                                paySchemeTyp_id_str = paySchemeTyp_id_str + "_" + document.getElementById('paymentTypSc' + chk).value;
                            } else
                            {
                                paySchemeTyp_id_str = paySchemeTyp_id_str + "_" + paySchemeTyp;
                            }
                            //console.log("ln289"+paySchemeTyp_id_str);
                            checkBox_len = chk;
                            //console.log(checkBox_len);
                        } else if (checkId != true)
                        {
                            checkBox_len = 0;
                            //console.log(checkBox_len);
                        }
                    }
                    //
                }
            } else if (checkId == true)
            {
                //console.log("in ifelse");
                utin_utin_id_str = document.getElementById('utin_utin_id' + countId).value;
                if (utin_utin_id_str == "" || utin_utin_id_str == null)
                {
                    utin_utin_id_str = "|";
                }
                invoice_pre_id_str = document.getElementById('invPreInvoiceId' + countId).value;
                invoice_post_id_str = document.getElementById('invPostInvoiceId' + countId).value;
                if (document.getElementById('paymentTypSc' + countId).value != "" || document.getElementById('paymentTypSc' + countId).value != null)
                {
                    paySchemeTyp_id_str = document.getElementById('paymentTypSc' + countId).value;
                } else
                {
                    paySchemeTyp_id_str = paySchemeTyp;
                }
                checkbox_id_str = checkBId;
                //alert(checkBId);//                    
                checkBox_len = 1;
            } else
            {
                //console.log("it is false::"+checkId);
            }
        } else
        {
            //console.log("in ifelse concat");
            var old_utin_str = utin_utin_id_str.split("_").filter(s => s);
            var old_inv_pre_id_str = invoice_pre_id_str.split("_").filter(s => s);
            var old_inv_post_id_str = invoice_post_id_str.split("_").filter(s => s);
            var old_checkbox_id_str = checkbox_id_str.split("_").filter(s => s);
            var old_paySchemeTyp_id_str = paySchemeTyp_id_str.split("_").filter(s => s);
            //console.log(old_checkbox_id_str);

            //
            var check_len = old_checkbox_id_str.length;
            if (check_len > 0)
            {
                for (var j = 0; j < check_len; j++) {
                    //console.log(document.getElementById(old_checkbox_id_str[j]).value);
                    if (document.getElementById(old_checkbox_id_str[j]).value == 'checked')
                    {
                        //console.log("in if"+j);
                        checkCnt_true[jj] = j;
                        jj++;
                    } else
                    {
                        //console.log("in else"+j);
                        checkCnt_false[kk] = j;
                        kk++;
                    }
                }
            }
            //
            var checkBox_len = checkCnt_true.length;
            //console.log("ln 11321"+checkBox_len);
            if (checkBox_len == 1)
            {
                //console.log("in ifln 11321");
                utin_utin_id_str = "";
                invoice_pre_id_str = "";
                invoice_post_id_str = "";
                checkbox_id_str = "";
                paySchemeTyp_id_str = "";
                utin_utin_id_str = old_utin_str[checkCnt_true[0]];
                invoice_pre_id_str = old_inv_pre_id_str[checkCnt_true[0]];
                invoice_post_id_str = old_inv_post_id_str[checkCnt_true[0]];
                checkbox_id_str = old_checkbox_id_str[checkCnt_true[0]];
                paySchemeTyp_id_str = old_paySchemeTyp_id_str[checkCnt_true[0]];
                //console.log("ln 11691"+checkbox_id_str + paySchemeTyp_id_str);

            } else if (checkBox_len > 1)
            {
                //console.log("in iflnelse 11339");
                utin_utin_id_str = "";
                invoice_pre_id_str = "";
                invoice_post_id_str = "";
                checkbox_id_str = "";
                paySchemeTyp_id_str = "";
                for (var ll = 0; ll < checkBox_len; ll++)
                {

                    utin_utin_id_str = utin_utin_id_str + "_" + old_utin_str[checkCnt_true[ll]];
                    invoice_pre_id_str = invoice_pre_id_str + "_" + old_inv_pre_id_str[checkCnt_true[ll]];
                    invoice_post_id_str = invoice_post_id_str + "_" + old_inv_post_id_str[checkCnt_true[ll]];
                    checkbox_id_str = checkbox_id_str + "_" + old_checkbox_id_str[checkCnt_true[ll]];
                    paySchemeTyp_id_str = paySchemeTyp_id_str + "_" + old_paySchemeTyp_id_str[checkCnt_true[ll]];
                }
            } else
            {
                //console.log("in ifln 408");
                utin_utin_id_str = "";
                invoice_pre_id_str = "";
                invoice_post_id_str = "";
                checkbox_id_str = "";
                paySchemeTyp_id_str = "";
            }
            //console.log("355checkid"+checkId);
            if (checkId == true)
            {
                //console.log("358checkid"+checkId);
                var utin_id_id_s = document.getElementById('utin_utin_id' + countId).value;
                if (utin_id_id_s == "" || utin_id_id_s == null)
                {
                    utin_utin_id_str = utin_utin_id_str + "_" + "|";
                } else
                {
                    utin_utin_id_str = utin_utin_id_str + "_" + utin_id_id_s;
                }

                //
                var inv_pre_id_s = document.getElementById('invPreInvoiceId' + countId).value;
                invoice_pre_id_str = invoice_pre_id_str + "_" + inv_pre_id_s;

                //
                var inv_post_id_s = document.getElementById('invPostInvoiceId' + countId).value;
                invoice_post_id_str = invoice_post_id_str + "_" + inv_post_id_s;
                //
                var paymentTypSc_id_s = document.getElementById('paymentTypSc' + countId).value;
                paySchemeTyp_id_str = paySchemeTyp_id_str + "_" + paymentTypSc_id_s;

                //
                checkbox_id_str = checkbox_id_str + "_" + checkBId;
                //console.log(checkbox_id_str);
            } else
            {
                var utin_id_id_s = document.getElementById('utin_utin_id' + countId).value;
                //utin_utin_id_str = utin_utin_id_str + "_" + utin_id_id_s;
                if (utin_id_id_s != "" || utin_id_id_s != null)
                {
                    utin_utin_id_str = utin_utin_id_str.split("_").filter(v => v !== utin_id_id_s).join("_");
                }
                //
                var inv_pre_id_s = document.getElementById('invPreInvoiceId' + countId).value;
                //invoice_pre_id_str = invoice_pre_id_str + "_" + inv_pre_id_s;
                if (inv_pre_id_s != "" || inv_pre_id_s != null)
                {
                    invoice_pre_id_str = invoice_pre_id_str.split("_").filter(function (item, pos) {
                        return invoice_pre_id_str.indexOf(item) == pos;
                    });
                    //invoice_pre_id_str = invoice_pre_id_str.split("_"+inv_pre_id_s).slice(0, invoice_pre_id_str.length - 1).join("_");
                    //let splicedStr = invoice_pre_id_str.slice(0, invoice_pre_id_str.length - 1).join("_");
                    invoice_pre_id_str = invoice_pre_id_str.join("_");
                    //console.log(invoice_pre_id_str);
                }
                //
                var inv_post_id_s = document.getElementById('invPostInvoiceId' + countId).value;
                //invoice_post_id_str = invoice_post_id_str + "_" + inv_post_id_s;
                if (inv_post_id_s != "" || inv_post_id_s != null)
                {
                    invoice_post_id_str = invoice_post_id_str.split("_").filter(v => v !== inv_post_id_s).join("_");
                }
                //
                var paymentTypSc_id_s = document.getElementById('paymentTypSc' + countId).value;
                //paySchemeTyp_id_str = paySchemeTyp_id_str + "_" + paymentTypSc_id_s;
                //console.log(paymentTypSc_id_s);
                //alert(paySchemeTyp_id_str);
                if (paySchemeTyp_id_str.length)
                {
                    if (paymentTypSc_id_s != "" || paymentTypSc_id_s != null)
                    {

                        var paySchemeTyp_id_str = paySchemeTyp_id_str.split("_").filter(v => v !== paymentTypSc_id_s).join("_");
                    }
                    //console.log(paySchemeTyp_id_str); 
                }

                //
                //checkbox_id_str = checkbox_id_str + "_" + checkBId;
                //console.log(checkBId);
                checkbox_id_str = checkbox_id_str.split("_").filter(v => v !== checkBId).join("_");
                var check = checkbox_id_str.split("_");
                //console.log(checkbox_id_str);    
                checkBox_len = checkbox_id_str.length;
                //console.log("chekcbox lennnn::"+checkBox_len);  
                //console.log("chekcbox lennnn::"+check.length);                 
            }
        }
        //
        var panelName = "SellPayUp";
        //
        var sellPanelName = "SellPayUp";
        //
        var prefix = document.getElementById('prefix').value;
        var slPrPreInvoiceNo = document.getElementById('slPrPreInvoiceNo').value;
        var slPrInvoiceNo = document.getElementById('slPrInvoiceNo').value;
        var slPrIdNum = document.getElementById('slPrIdNum').value;
        var userId = document.getElementById('userId').value;
        if (checkId == true && paySchemeTyp == 'GOLD-SCHEME')
        {
            var scpanelName = "SCHEME_METAL_DEPOSIT";
        } else if (checkId == true && paySchemeTyp == 'CASH-SCHEME')
        {
            scpanelName = 'SCHEME_DEPOSIT';
        } else if (checkId == false && paySchemeTyp == 'CASH-SCHEME')
        {
            var scpanelName = "SCHEME_METAL_DEPOSIT";
        } else if (checkId == false && paySchemeTyp == 'GOLD-SCHEME')
        {
            var scpanelName = "SCHEME_DEPOSIT";
        } else
        {
            checkBox_len = 0;
        }
        //exit;
    } else
    {
        utin_utin_id_str = document.getElementById('utin_utin_id_str').value;
        invoice_pre_id_str = document.getElementById('invoice_pre_id_str').value;
        invoice_post_id_str = document.getElementById('invoice_post_id_str').value;
        checkbox_id_str = document.getElementById('checkbox_id_str').value;
        paySchemeTyp_id_str = document.getElementById('paySchemeTyp_id_str').value;
        //console.log(utin_utin_id_str+invoice_pre_id_str+invoice_post_id_str);
        if (utin_utin_id_str == "" || utin_utin_id_str == null || invoice_pre_id_str == "" || invoice_pre_id_str == null || invoice_post_id_str == "" || invoice_post_id_str == null)
        {
            //   
            //console.log(countId);
            if (countId > 1) {
                //console.log("in count 1");
                for (var chk = 0 + 1; chk <= countId; chk++)
                {
//                    console.log("in ifor");
//                    console.log(document.getElementById('checkboxidchekced'+chk).value);
                    var checkBoxId = document.getElementById('checkboxidchekced' + chk).value;
                    if (!checkBoxId || checkBoxId.trim().length === 0)
                    {
                    } else {
                        var checkBoxId = document.getElementById('checkboxidchekced' + chk).value;
                        //console.log(checkBoxId);
                        var can = document.getElementById(checkBoxId).value;
                        //
                        //console.log(can);
                        if (can == 'checked')
                        {
                            if (document.getElementById('utin_utin_id' + chk).value == "" || document.getElementById('utin_utin_id' + chk).value == null)
                            {
                                utin_utin_id_str = utin_utin_id_str + "_" + "|";
                            } else
                            {
                                utin_utin_id_str = utin_utin_id_str + "_" + document.getElementById('utin_utin_id' + chk).value;
                            }

                            invoice_pre_id_str = invoice_pre_id_str + "_" + document.getElementById('invPreInvoiceId' + chk).value;
                            invoice_post_id_str = invoice_post_id_str + "_" + document.getElementById('invPostInvoiceId' + chk).value;
                            checkbox_id_str = checkbox_id_str + "_" + checkBoxId;
                            if (document.getElementById('paymentTypSc' + chk).value == "" || document.getElementById('paymentTypSc' + chk).value != null)
                            {
                                paySchemeTyp_id_str = paySchemeTyp_id_str + "_" + document.getElementById('paymentTypSc' + chk).value;
                            } else
                            {
                                paySchemeTyp_id_str = paySchemeTyp_id_str + "_" + paySchemeTyp;
                            }
                            checkBox_len = chk;
                            //console.log(checkBox_len);
                        }
                    }
                    //
                }
            } else if (checkId == true)
            {
                //console.log("checkid"+checkId);
                //console.log("in ifelse");
                utin_utin_id_str = document.getElementById('utin_utin_id' + countId).value;
                if (utin_utin_id_str == "" || utin_utin_id_str == null)
                {
                    utin_utin_id_str = "|";
                }
                invoice_pre_id_str = document.getElementById('invPreInvoiceId' + countId).value;
                invoice_post_id_str = document.getElementById('invPostInvoiceId' + countId).value;
                paySchemeTyp_id_str = document.getElementById('paymentTypSc' + countId).value;
                checkbox_id_str = checkBId;
                //alert(checkBId);//                    
                checkBox_len = 1;
            }
        } else
        {
            //console.log("in ifelse concat");
            var old_utin_str = utin_utin_id_str.split("_").filter(s => s);
            var old_inv_pre_id_str = invoice_pre_id_str.split("_").filter(s => s);
            var old_inv_post_id_str = invoice_post_id_str.split("_").filter(s => s);
            var old_checkbox_id_str = checkbox_id_str.split("_").filter(s => s);
            var old_paySchemeTyp_id_str = paySchemeTyp_id_str.split("_").filter(s => s);
            //console.log(old_checkbox_id_str);
            //
            var check_len = old_checkbox_id_str.length;
            if (check_len > 0)
            {
                for (var j = 0; j < check_len; j++) {
                    //console.log(document.getElementById(old_checkbox_id_str[j]).value);
                    if (document.getElementById(old_checkbox_id_str[j]).value == 'checked')
                    {
                        //console.log("in if"+j);
                        checkCnt_true[jj] = j;
                        jj++;
                    } else
                    {
                        //console.log("in else"+j);
                        checkCnt_false[kk] = j;
                        kk++;
                    }
                }
            }
            //
            var checkBox_len = checkCnt_true.length;
            //console.log(checkBox_len);
            if (checkBox_len == 1)
            {
                utin_utin_id_str = "";
                invoice_pre_id_str = "";
                invoice_post_id_str = "";
                checkbox_id_str = "";
                paySchemeTyp_id_str = "";
                utin_utin_id_str = old_utin_str[checkCnt_true[0]];
                invoice_pre_id_str = old_inv_pre_id_str[checkCnt_true[0]];
                invoice_post_id_str = old_inv_post_id_str[checkCnt_true[0]];
                checkbox_id_str = old_checkbox_id_str[checkCnt_true[0]];
                paySchemeTyp_id_str = old_paySchemeTyp_id_str[checkCnt_true[0]];

            } else if (checkBox_len > 1)
            {
                utin_utin_id_str = "";
                invoice_pre_id_str = "";
                invoice_post_id_str = "";
                checkbox_id_str = "";
                paySchemeTyp_id_str = "";
                for (var ll = 0; ll < checkBox_len; ll++)
                {
                    utin_utin_id_str = utin_utin_id_str + "_" + old_utin_str[checkCnt_true[ll]];
                    invoice_pre_id_str = invoice_pre_id_str + "_" + old_inv_pre_id_str[checkCnt_true[ll]];
                    invoice_post_id_str = invoice_post_id_str + "_" + old_inv_post_id_str[checkCnt_true[ll]];
                    checkbox_id_str = checkbox_id_str + "_" + old_checkbox_id_str[checkCnt_true[ll]];
                    paySchemeTyp_id_str = paySchemeTyp_id_str + "_" + old_paySchemeTyp_id_str[checkCnt_true[ll]];
                }
            }

            if (checkId == true)
            {
                //console.log("in 11546");
                var utin_id_id_s = document.getElementById('utin_utin_id' + countId).value;
                if (utin_id_id_s == "" || utin_id_id_s == null)
                {
                    utin_utin_id_str = utin_utin_id_str + "_" + "|";
                } else
                {
                    utin_utin_id_str = utin_utin_id_str + "_" + utin_id_id_s;
                }
                //
                var inv_pre_id_s = document.getElementById('invPreInvoiceId' + countId).value;
                invoice_pre_id_str = invoice_pre_id_str + "_" + inv_pre_id_s;

                //
                var inv_post_id_s = document.getElementById('invPostInvoiceId' + countId).value;
                invoice_post_id_str = invoice_post_id_str + "_" + inv_post_id_s;
                //
                var paymentTypSc_id_s = document.getElementById('paymentTypSc' + countId).value;
                paySchemeTyp_id_str = paySchemeTyp_id_str + "_" + paymentTypSc_id_s;

                //
                checkbox_id_str = checkbox_id_str + "_" + checkBId;
                //console.log(checkbox_id_str);
            } else
            {
                var utin_id_id_s = document.getElementById('utin_utin_id' + countId).value;
                //utin_utin_id_str = utin_utin_id_str + "_" + utin_id_id_s;
                if (utin_id_id_s != "" || utin_id_id_s != null)
                {
                    utin_utin_id_str = utin_utin_id_str.split("_").filter(v => v !== utin_id_id_s).join("_");
                }
                //
                var inv_pre_id_s = document.getElementById('invPreInvoiceId' + countId).value;
                //invoice_pre_id_str = invoice_pre_id_str + "_" + inv_pre_id_s;
                if (inv_pre_id_s != "" || inv_pre_id_s != null)
                {
                    invoice_pre_id_str = invoice_pre_id_str.split("_").filter(function (item, pos) {
                        return invoice_pre_id_str.indexOf(item) == pos;
                    });
                    //invoice_pre_id_str = invoice_pre_id_str.split("_"+inv_pre_id_s).slice(0, invoice_pre_id_str.length - 1).join("_");
                    //let splicedStr = invoice_pre_id_str.slice(0, invoice_pre_id_str.length - 1).join("_");
                    invoice_pre_id_str = invoice_pre_id_str.join("_");
                    //console.log(invoice_pre_id_str);
                }
                //
                var inv_post_id_s = document.getElementById('invPostInvoiceId' + countId).value;
                //invoice_post_id_str = invoice_post_id_str + "_" + inv_post_id_s;
                if (inv_post_id_s != "" || inv_post_id_s != null)
                {
                    invoice_post_id_str = invoice_post_id_str.split("_").filter(v => v !== inv_post_id_s).join("_");
                }
                //
                var paymentTypSc_id_s = document.getElementById('paymentTypSc' + countId).value;
                //paySchemeTyp_id_str = paySchemeTyp_id_str + "_" + paymentTypSc_id_s;
                if (paymentTypSc_id_s != "" || paymentTypSc_id_s != null)
                {
                    paySchemeTyp_id_str = paySchemeTyp_id_str.split("_").filter(v => v !== paymentTypSc_id_s).join("_");
                }
                //console.log(paySchemeTyp_id_str);                    
                //
                //checkbox_id_str = checkbox_id_str + "_" + checkBId;
                checkbox_id_str = checkbox_id_str.split("_").filter(v => v !== checkBId).join("_");
                //console.log(checkbox_id_str);    
                checkBox_len = checkbox_id_str.length;
                //console.log("chekcbox lennnn::"+checkBox_len);
            }
        }
        //
        var panelName = "FINE_JEWELLERY_SELL_B2";
        //
        var sellPanelName = "SlPrPayment";
        //
        var prefix = document.getElementById('prefix').value;
        var slPrPreInvoiceNo = document.getElementById('slPrPreInvoiceNo').value;
        var slPrInvoiceNo = document.getElementById('slPrInvoiceNo').value;
        var slPrIdNum = document.getElementById('slPrIdNum').value;
        var userId = document.getElementById('userId').value;
        if (checkId == true && paySchemeTyp == 'GOLD-SCHEME')
        {
            var scpanelName = "SCHEME_METAL_DEPOSIT";
        } else if (checkId == true && paySchemeTyp == 'CASH-SCHEME')
        {
            scpanelName = 'SCHEME_DEPOSIT';
        } else if (checkId == false && paySchemeTyp == 'CASH-SCHEME')
        {
            var scpanelName = "SCHEME_METAL_DEPOSIT";
        } else if (checkId == false && paySchemeTyp == 'GOLD-SCHEME')
        {
            var scpanelName = "SCHEME_DEPOSIT";
        } else
        {
            checkBox_len = 0;
        }
    }
    //exit;
    if (checkBox_len > 0)
    {
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //goldMetalDiv
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                //document.getElementById("schemeSettleDiv").style.display = "block";  last_inv_check_status
                if (document.getElementById('utin_utin_id_str').value == "" || document.getElementById('utin_utin_id_str').value == null)
                {
                    document.getElementById('utin_utin_id_str').value = utin_utin_id_str;
                } else
                {
                    //utin_utin_id_str = utin_utin_id_str + "_" + document.getElementById('utin_utin_id'+countId).value;
                    document.getElementById('utin_utin_id_str').value = utin_utin_id_str;
                }
                //
                if (document.getElementById('invoice_pre_id_str').value == "" || document.getElementById('invoice_pre_id_str').value == null)
                {
                    document.getElementById('invoice_pre_id_str').value = invoice_pre_id_str;
                } else
                {
                    //invoice_pre_id_str = invoice_pre_id_str + "_" + document.getElementById('invPreInvoiceId'+countId).value;
                    document.getElementById('invoice_pre_id_str').value = invoice_pre_id_str;
                }
                //
                //
                if (document.getElementById('invoice_post_id_str').value == "" || document.getElementById('invoice_post_id_str').value == null)
                {
                    document.getElementById('invoice_post_id_str').value = invoice_post_id_str;
                } else
                {
                    //invoice_post_id_str = invoice_post_id_str + "_" + document.getElementById('invPostInvoiceId'+countId).value;
                    document.getElementById('invoice_post_id_str').value = invoice_post_id_str;
                }
                //
                if (document.getElementById('checkbox_id_str').value == "" || document.getElementById('checkbox_id_str').value == null)
                {
                    document.getElementById('checkbox_id_str').value = checkbox_id_str;
                } else
                {
                    //checkbox_id_str = checkbox_id_str + "_" + checkBId;
                    document.getElementById('checkbox_id_str').value = checkbox_id_str;
                    //console.log(document.getElementById('checkbox_id_str').value);
                }
                //
                if (document.getElementById('paySchemeTyp_id_str').value == "" || document.getElementById('paySchemeTyp_id_str').value == null)
                {
                    document.getElementById('paySchemeTyp_id_str').value = paySchemeTyp_id_str;
                } else
                {
                    document.getElementById('paySchemeTyp_id_str').value = paySchemeTyp_id_str;
                    //console.log(document.getElementById('paySchemeTyp_id_str').value);
                }
                //Storing cash amount in the cr amt

                //                                    
                //
//                    var divElement = document.createElement("Div");
//                    divElement.id = "schemeDiv";
//                    divElement.innerHTML = xmlhttp.responseText; 
//                    document.getElementById('rateCutDiv').appendChild(divElement);

                    document.getElementById('rateCutDiv').innerHTML = xmlhttp.responseText; 
                    //document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = parseFloat(document.getElementById('utinPrevCashBal').value);
                    // 
                    //  
                if (paySchemeTyp == 'GOLD-SCHEME')
                {
                    calulateMakingAmount(countId, 'METAL');
                    calcGoldWeight(checkId, countId);
                    calcWholeSaleRateCut(prefix);
                    calFinalPaymentAmount(prefix);
                    calcPaymentCashBalance(prefix);
                } else if (paySchemeTyp == 'CASH-SCHEME')
                {
                    calulateMakingAmount(countId, 'CASH');
                    //calcCashAmount(checkId,countId);
                    //calcWholeSaleRateCut(prefix);
                    calcStockItemBalance();
                    calcPaymentCashBalance(prefix);
                    //calDiscountAmt(prefix);  
                    //calFinalPaymentAmount(prefix);
//                    calcPaymentCashBalance(prefix);
                }
                //here change after settle scheme
                calPrevCashBalAfterScheme(prefix);
//                    calPrevGoldBalAfterScheme(prefix)
//                                    
                    calLoyaltyPoints(prefix);
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            xmlhttp.open("POST", "include/php/ompaydet.php?userId=" + userId + "&utin_utin_id=" + utin_utin_id_str + "&invPreInvoiceId=" + invoice_pre_id_str + "&invPostInvoiceId=" + invoice_post_id_str + "&panelName=" + panelName + "&scpanelname=" + scpanelName + 
                     "&invCount=" + countId + "&sellpanelName=" + sellPanelName + "&prefix=" + prefix + "&paySchemeTyp=" + paySchemeTyp_id_str +
                     "&slPrPreInvoiceNo=" + slPrPreInvoiceNo + "&slPrPostInvoiceNo=" + slPrInvoiceNo + "&CheckID_for_SC=" + checkId , true);
                xmlhttp.send();
    } else
    {
        if (panelName == "SellPayUp")
        {
            //
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    //goldMetalDiv
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    //document.getElementById("schemeSettleDiv").style.display = "block";  last_inv_check_status
                    document.getElementById('utin_utin_id_str').value = "";
                    document.getElementById('paySchemeTyp_id_str').value = "";
                    document.getElementById('checkbox_id_str').value = "";
                    document.getElementById('invoice_post_id_str').value = "";
                    document.getElementById('invoice_pre_id_str').value = "";
                    //
                    document.getElementById('rateCutDiv').innerHTML = xmlhttp.responseText;   //paymentDiv
//                    document.getElementById('slPrCurrentInvBeforePay').innerHTML = xmlhttp.responseText; // sc_pay_div_id 
//                    document.getElementById('paymentDiv').innerHTML = xmlhttp.responseText; // rateCutDiv
                    //    
                    if (paySchemeTyp == 'GOLD-SCHEME')
                    {
                        calulateMakingAmount(countId, 'CASH');
                        calcGoldWeight(checkId, countId);
                        calcWholeSaleRateCut(prefix);
//                        calPrevCashBalAfterScheme(prefix);
                        //calFinalPaymentAmount(prefix);
//                        calcPaymentCashBalance(prefix);
                    } else if (paySchemeTyp == 'CASH-SCHEME')
                    {
                        calulateMakingAmount(countId, 'CASH');
                        calPrevCashBalAfterScheme(prefix);
                        calSchemeGoldwtchange(checkId, countId, "CASH_BAL_CHANGE");
                        calcCashAmount(checkId, countId);
                        //calcCashAmount(checkId,countId);
//                         calcWholeSaleRateCut(prefix);
                        calcPaymentCashBalance(prefix);
                    }
                    //calPrevCashBalAfterScheme(prefix);
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            scPanlenme = 'NOSCHEME_DEPOSIT';
            var mainPanel = 'StockPurchasePanel';
            xmlhttp.open("POST", "include/php/ompaydet.php?userId=" + userId + "&panelName=" + panelName + "&slPrPreInvoiceNo=" + slPrPreInvoiceNo + "&slPrPostInvoiceNo=" + slPrInvoiceNo +
                    "&invCount=" + countId + "&sellpanelName=" + sellPanelName + "&scpanelnam=" + scPanlenme + "&prefix=" + prefix, true); //;"&slPrPreInvoiceNo=" + slPrPreInvoiceNo + "&slPrPostInvoiceNo=" + slPrInvoiceNo + "&scpanelname=" + scPanlenm 
//            xmlhttp.open("POST", "include/php/ompyamt.php?userId=" + userId  + "&slPrId=" + slPrIdNum + "&invoiceNo=" + slPrPreInvoiceNo + " " + slPrInvoiceNo + "&panelName=" + panelName + 
//                     "&sellpanelName=" + sellPanelName + "&prefix=" + prefix + "&mainPanel=" + mainPanel + "&payPanelName=" + sellPanelName + "&scpanelnam=" + scPanlenme +
//                        "&transPanelName=" + sellPanelName, true);
            xmlhttp.send();
        } else
        {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById('slPrCurrentInvBeforePay').innerHTML = xmlhttp.responseText;
                    //          
                    if (paySchemeTyp == 'GOLD-SCHEME')
                    {
                        calSchemeGoldwtchange(checkId, countId, "GOLD_WT_CHANGE");
                        calcGoldWeight(checkId, countId);
                        calcWholeSaleRateCut(prefix);
                    } else if (paySchemeTyp == 'CASH-SCHEME')
                    {
                        calSchemeGoldwtchange(checkId, countId, "CASH_BAL_CHANGE");
                        calcCashAmount(checkId, countId);
                        //calcWholeSaleRateCut(prefix); 
                    }
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            //
            xmlhttp.open("POST", "include/php/ogspindv.php?userId=" + userId + "&panelName=" + panelName + "&invPreInvoiceId=" + slPrPreInvoiceNo + "&invPostInvoiceId=" + slPrInvoiceNo +
                    "&invCount=" + countId + "&sellpanelName=" + sellPanelName, true);
//                xmlhttp.open("POST", "include/php/ompaydet.php?userId=" + userId  + "&slPrPreInvoiceNo=" + slPrPreInvoiceNo + "&slPrPostInvoiceNo=" + slPrInvoiceNo + "&panelName=" + panelName + 
//                     "&sellpanelName=" + sellPanelName + "&prefix=" + prefix + "&scpanelname=" + scPanlenm, true);
            xmlhttp.send();
        }
    }
}
// slPrPayableCashCRDR
function calFinalPaymentAmount(prefix)
{
    //calcStockItemBalance(prefix);
    if (typeof (document.getElementById(prefix + 'PayableCashCRDR')) != 'undefined' &&
            (document.getElementById(prefix + 'PayableCashCRDR') != null) &&
            typeof (document.getElementById('payTotalSchemeAmtRecDisp')) != 'undefined' &&
            (document.getElementById('payTotalSchemeAmtRecDisp') != null) ||
            (document.getElementById(prefix + 'PayableCashCRDR') == "DR")) {
//                    // payTotalSchemeAmtRec
        if (document.getElementById(prefix + 'PayTotAmtRecDisp').value != '' || document.getElementById(prefix + 'PayTotAmtRecDisp').value != 0.00)
        {
            //alert("in if fun");
            var PayTotCashAmtDisp = parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value) - parseFloat(document.getElementById('payTotalSchemeAmtRecDisp').value) - parseFloat(document.getElementById(prefix + 'PayTotAmtRecDisp').value);
            document.getElementById(prefix + 'PayFinAmtBalDisp').value = parseFloat(PayTotCashAmtDisp).toFixed(2);
        } else
        {
            //alert("in else fun");
            var PayTotCashAmtDisp = parseFloat(document.getElementById(prefix + 'PayTotCashAmtDisp').value) - parseFloat(document.getElementById('payTotalSchemeAmtRecDisp').value);
            document.getElementById(prefix + 'PayFinAmtBalDisp').value = parseFloat(PayTotCashAmtDisp).toFixed(2);
        }
        //
        calcPaymentCashBalance(prefix);
    }
    //
//    
}
//
function MetRateChange(userId,utin_utin_id_str,invoice_pre_id_str,invoice_post_id_str,panelName,scpanelName,countId,sellPanelName,prefix,paySchemeTyp_id_str,slPrPreInvoiceNo,slPrInvoiceNo,new_met_rate,checkId,paySchemeTyp,goldMkgDisc=null)
{
    
    loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
            document.getElementById('rateCutDiv').innerHTML = xmlhttp.responseText;
            if(paySchemeTyp== 'GOLD-SCHEME')
                    {            
                        calulateMakingAmount(countId,'METAL');    
                        calcGoldWeight(checkId,countId);                         
                        calcWholeSaleRateCut(prefix);
                        calFinalPaymentAmount(prefix);
                        calcPaymentCashBalance(prefix);
                    }
                    else if(paySchemeTyp == 'CASH-SCHEME')
                    {
                        calulateMakingAmount(countId,'CASH');
                        //calcCashAmount(checkId,countId);
                        //calcWholeSaleRateCut(prefix);
                        calcPaymentCashBalance(prefix);
                        //calDiscountAmt(prefix);  
                        //calFinalPaymentAmount(prefix);
                        calcPaymentCashBalance(prefix);
                    }
                    calPrevCashBalAfterScheme(prefix);
                    calLoyaltyPoints(prefix);
                    
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden"; 
        }else{
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//    myVar=1;
        xmlhttp.open("POST", "include/php/ompaydet.php?userId=" + userId + "&utin_utin_id=" + utin_utin_id_str + "&invPreInvoiceId=" + invoice_pre_id_str + "&invPostInvoiceId=" + invoice_post_id_str + "&panelName=" + panelName + "&scpanelname=" + scpanelName +
                "&invCount=" + countId + "&sellpanelName=" + sellPanelName + "&prefix=" + prefix + "&paySchemeTyp=" + paySchemeTyp_id_str +
                "&slPrPreInvoiceNo=" + slPrPreInvoiceNo + "&slPrPostInvoiceNo=" + slPrInvoiceNo+ "&new_met_rate=" + new_met_rate+ "&CheckID_for_SC=" + checkId+ "&goldMkgDisc_for_SC=" + goldMkgDisc, true);
        xmlhttp.send();
}
//
function calulateMakingAmount(countId, metalType)
{
    var prefix = document.getElementById('prefix').value;
    if (typeof (document.getElementById('panelName')) != 'undefined' &&
            (document.getElementById('panelName') != null))
    {
        if (document.getElementById('panelName').value != "" || document.getElementById('panelName').value != null || document.getElementById('panelName').value != undefined)
        {
            //console.log(document.getElementById('panelName').value);
            var panelName = document.getElementById('panelName').value;
        } else
        {
            panelName = 'FINE_JEWELLERY_SELL_B2';
        }
    }
    //Checking panel name for update 
    if (panelName == "SellPayUp")
    {
        if (typeof (document.getElementById(prefix + 'PayPrevCashBalCRAmt')) != 'undefined' &&
                (document.getElementById(prefix + 'PayPrevCashBalCRAmt') != null)) {
//                    // 
//                    console.log("prev cash bal"+document.getElementById('utinPrevCashBal').value);
            if (document.getElementById('utinPrevCashBal').value != '' || document.getElementById('utinPrevCashBal').value != null)
            {
                document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = parseFloat(document.getElementById('utinPrevCashBal').value).toFixed(2);
            } else
            {
                document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = 0.00;
            }

        }
        if (metalType == 'CASH')
        {
            if (typeof (document.getElementById('total_invoice_cnt')) != 'undefined' &&
                    (document.getElementById('total_invoice_cnt') != null))
            {
                var total_inv_cnt = document.getElementById('total_invoice_cnt').value;
                //console.log(total_inv_cnt);
                if (total_inv_cnt > 0)
                {
                    //alert("in inv cnt" + total_inv_cnt);
                    for (var ind = 1; ind <= total_inv_cnt; ind++)
                    {
                        //console.log("in for ind" + ind);
                        if (typeof (document.getElementById('selPayCash' + ind)) != 'undefined' &&
                                (document.getElementById('selPayCash' + ind) != null))
                        {
                            var checked_cash = document.getElementById('selPayCash' + ind).value;
                            //
                            //console.log(checked_cash);
                            if (checked_cash == 'checked')
                            {
                                if (typeof (document.getElementById('schemeDepCh' + ind)) != 'undefined' &&
                                        (document.getElementById('schemeDepCh' + ind) != null)
                                        && (document.getElementById('schemeDepCh' + ind).value == "SCHEME_DEPOSIT_CHECKED"))
                                {
                                    //console.log("in if stmt 207");                                          
                                } else
                                {
                                    //console.log("scheme check else");

                                    //
                                    if (document.getElementById(prefix + 'PayPrevTotAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevTotAmt').value == '') {
                                        document.getElementById(prefix + 'PayPrevTotAmt').value = 0;
                                    }

                                    if (document.getElementById(prefix + 'PayPrevCashBalDRAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevCashBalDRAmt').value == '') {
                                        document.getElementById(prefix + 'PayPrevCashBalDRAmt').value = 0;
                                    }

                                    if (document.getElementById(prefix + 'PayPrevCashBalCRAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevCashBalCRAmt').value == '') {
                                        document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = 0;
                                    }

                                    //
                                    if (typeof (document.getElementById('cashAmount' + ind)) != 'undefined' &&
                                            (document.getElementById('cashAmount' + ind) != null))
                                    {
                                        var amount = parseFloat(document.getElementById('cashAmount' + ind).value);
                                        //console.log(amount);
                                    }
                                    //
                                    if (typeof (document.getElementById('cashTransType' + ind)) != 'undefined' &&
                                            (document.getElementById('cashTransType' + ind) != null))
                                    {
                                        if (document.getElementById('cashTransType' + ind).value == 'DR') {
                                            //alert('CDR');
                                            document.getElementById(prefix + 'PayPrevCashBalDRAmt').value = parseFloat(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value) + parseFloat(amount);
                                            //console.log(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value);
                                        } else if (document.getElementById('cashTransType' + ind).value == 'CR') {
                                            //alert('CCR');
                                            document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = parseFloat(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value) + parseFloat(amount);
                                            //console.log(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value);
                                        }
                                    }
                                    amountToPay = parseFloat(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value) - parseFloat(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value);
                                    //console.log("amount to pay:::" + amountToPay);
                                    //                         
                                    //
                                    if (amountToPay > 0) {
                                        //console.log("in if >");
                                        // 
                                        if (typeof (document.getElementById(prefix + 'PayPrevAmtDisp')) != 'undefined' &&
                                                document.getElementById(prefix + 'PayPrevAmtDisp') != null)
                                        {
                                            document.getElementById(prefix + 'PayPrevAmtDisp').value = parseFloat(Math.abs(amountToPay)).toFixed(2);
                                            document.getElementById(prefix + 'PayPrevTotAmt').value = parseFloat(Math.abs(amountToPay)).toFixed(2);
                                            document.getElementById(prefix + 'PayPrevAmtDisp').style.color = 'red';
                                        }
                                        if (typeof (document.getElementById(prefix + 'PayPrevCashBalCRDR')) != 'undefined' &&
                                                document.getElementById(prefix + 'PayPrevCashBalCRDR') != null)
                                        {
                                            document.getElementById(prefix + 'PayPrevCashBalCRDR').value = 'DR';
                                            document.getElementById(prefix + 'PayPrevCashBalCRDR').style.color = 'red';
                                        }
                                    } else {
                                        //
                                        //console.log("in else <");
                                        if (typeof (document.getElementById(prefix + 'PayPrevAmtDisp')) != 'undefined' &&
                                                document.getElementById(prefix + 'PayPrevAmtDisp') != null)
                                        {
                                            document.getElementById(prefix + 'PayPrevAmtDisp').value = parseFloat(Math.abs(amountToPay)).toFixed(2);
                                            document.getElementById(prefix + 'PayPrevAmtDisp').style.color = 'green';
                                        }
                                        if (typeof (document.getElementById(prefix + 'PayPrevCashBalCRDR')) != 'undefined' &&
                                                document.getElementById(prefix + 'PayPrevCashBalCRDR') != null)
                                        {
                                            document.getElementById(prefix + 'PayPrevCashBalCRDR').value = 'CR';
                                            document.getElementById(prefix + 'PayPrevCashBalCRDR').style.color = 'Green';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

    }//sellPayUp ends here
    else
    {
        if (metalType == "METAL") {
            if (typeof (document.getElementById(prefix + 'PayCashOthChgsDisp')) != 'undefined' &&
                    (document.getElementById(prefix + 'PayCashOthChgsDisp') != null)) {
//                    // 
                document.getElementById(prefix + 'PayCashOthChgsDisp').value = parseFloat(document.getElementById('totalMakingCharges').value);
            }
            //
            if (typeof (document.getElementById('totMkngOrLabChgs')) != 'undefined' &&
                    (document.getElementById('totMkngOrLabChgs') != null)) {
                //                    // 
                document.getElementById('totMkngOrLabChgs').value = parseFloat(document.getElementById('totalMakingCharges').value).toFixed(2);
            }
            //slPrPayTotAmtBalDisp   slPrPayPrevAmtDisp
            if (typeof (document.getElementById(prefix + 'payTotalSchemeAmtRecDisp')) != 'undefined' &&
                    (document.getElementById(prefix + 'payTotalSchemeAmtRecDisp') != null)) {
//                    // 
                document.getElementById(prefix + 'payTotalSchemeAmtRecDisp').value = parseFloat(document.getElementById('remGoldVal').value).toFixed(2);

            }
            if (typeof (document.getElementById(prefix + 'payTotalSchemeAmtRec')) != 'undefined' &&
                    (document.getElementById(prefix + 'payTotalSchemeAmtRec') != null)) {
//                    // 
                document.getElementById(prefix + 'payTotalSchemeAmtRec').value = parseFloat(document.getElementById('remGoldVal').value).toFixed(2);
            }
            //
        } else {
            //slPrPayTotAmtBalDisp   slPrPayPrevAmtDisp
            if (typeof (document.getElementById(prefix + 'PayPrevCashBalCRAmt')) != 'undefined' &&
                    (document.getElementById(prefix + 'PayPrevCashBalCRAmt') != null)) {
//                    // 
                //console.log("prev cash bal"+document.getElementById('utinPrevCashBal').value);
                document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = parseFloat(document.getElementById('utinPrevCashBal').value).toFixed(2);
            }
            //
            if (typeof (document.getElementById(prefix + 'PayPrevCashBalCRDR')) != 'undefined' &&
                    (document.getElementById(prefix + 'PayPrevCashBalCRDR') != null)) {
//                    // 
                //console.log("prev cash balCRDR"+document.getElementById('utinPrevCashBalCRDR').value);
                document.getElementById(prefix + 'PayPrevCashBalCRDR').value = document.getElementById('utinPrevCashBalCRDR').value;
            }
        }
    }

}
//
//
function calSchemeGoldwtchange(checkId, countId, chTyppe)
{
    var prefix = document.getElementById('prefix').value;
    if (chTyppe == "GOLD_WT_CHANGE") {
        if (checkId != true)
        {
            if (typeof (document.getElementById(prefix + 'metal1WtPrevBal')) != 'undefined' &&
                    (document.getElementById(prefix + 'metal1WtPrevBal') != null)) {
                //                    // 
                //document.getElementById(prefix + 'metal1WtPrevBal').value = (-1) * parseFloat(document.getElementById('goldWeight'+countId).value).toFixed(3); ;
            }
            if (document.getElementById('gdWtTransType' + countId).value == 'CR') {
                document.getElementById(prefix + 'metal1WtPrevBal').value = (-1) * parseFloat(document.getElementById('goldWeight' + countId).value);
            }
        }
    } else
    {
        if (checkId != true)
        {
            if (typeof (document.getElementById(prefix + 'PayPrevCashBalCRAmt')) != 'undefined' &&
                    (document.getElementById(prefix + 'PayPrevCashBalCRAmt') != null)) {
                //                    // 
                document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = parseFloat(document.getElementById('cashAmount' + countId).value);
            }
            if (document.getElementById('cashTransType' + countId).value == 'CR') {
                document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = parseFloat(document.getElementById('cashAmount' + countId).value);
            }
        }
    }
}
//
//Calculate prev gold balance after scheme
function calPrevGoldBalAfterScheme(prefix)
{
    if (typeof (document.getElementById('total_invoice_cnt')) != 'undefined' &&
            (document.getElementById('total_invoice_cnt') != null))
    {
        var total_inv_cnt = document.getElementById('total_invoice_cnt').value;
        //console.log(total_inv_cnt);
        if (total_inv_cnt > 0)
        {
            //alert("in inv cnt" + total_inv_cnt);
            for (var ind = 1; ind <= total_inv_cnt; ind++)
            {
                //console.log("in for ind" + ind);
                if (typeof (document.getElementById('selPayGold' + ind)) != 'undefined' &&
                        (document.getElementById('selPayGold' + ind) != null))
                {
                    var checked_gold = document.getElementById('selPayGold' + ind).value;
                    //
                    //console.log(checked_gold);
                    if (checked_gold == 'checked')
                    {
                        if (typeof (document.getElementById('GoldschemeCheck' + ind)) != 'undefined' &&
                                (document.getElementById('GoldschemeCheck' + ind) != null))
                        {
                            var GoldschemeCheck = document.getElementById('GoldschemeCheck' + ind).value;
                            //console.log(GoldschemeCheck);
                            if (GoldschemeCheck == "GOLD_SCHEME_CHECK")
                            {

                            }
                        } else
                        {
                            //console.log("in else c");
                            calcGoldWeight(checked_gold, ind);
                        }
                    }
                }
            }
        }
    }
}

//
//After scheme setting check other advance or udhaar invoices are checked or not if checked then calculate total previous cash balance
function calPrevCashBalAfterScheme(prefix)
{
    if (typeof (document.getElementById('total_invoice_cnt')) != 'undefined' &&
            (document.getElementById('total_invoice_cnt') != null))
    {
        var total_inv_cnt = document.getElementById('total_invoice_cnt').value;
        //console.log(total_inv_cnt);
        if (total_inv_cnt > 0)
        {
            //alert("in inv cnt" + total_inv_cnt);
            for (var ind = 1; ind <= total_inv_cnt; ind++)
            {
                //console.log("in for ind" + ind);
                if (typeof (document.getElementById('selPayCash' + ind)) != 'undefined' &&
                        (document.getElementById('selPayCash' + ind) != null))
                {
                    var checked_cash = document.getElementById('selPayCash' + ind).value;
                    //
                    //console.log(checked_cash);
                    if (checked_cash == 'checked')
                    {
                        if (typeof (document.getElementById('schemeDepCh' + ind)) != 'undefined' &&
                                (document.getElementById('schemeDepCh' + ind) != null)
                                && (document.getElementById('schemeDepCh' + ind).value == "SCHEME_DEPOSIT_CHECKED"))
                        {
                            //console.log("in if stmt 207");                                          
                        } else
                        {
                            //console.log("scheme check else");
                        
                            //
                            if (document.getElementById(prefix + 'PayPrevTotAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevTotAmt').value == '') {
                                document.getElementById(prefix + 'PayPrevTotAmt').value = 0;
                          }

                            if (document.getElementById(prefix + 'PayPrevCashBalDRAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevCashBalDRAmt').value == '') {
                                document.getElementById(prefix + 'PayPrevCashBalDRAmt').value = 0;
                    }

                            if (document.getElementById(prefix + 'PayPrevCashBalCRAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevCashBalCRAmt').value == '') {
                                document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = 0;
                }

                            //
                            if (typeof (document.getElementById('cashAmount' + ind)) != 'undefined' &&
                                    (document.getElementById('cashAmount' + ind) != null))
                            {
                                var amount = parseFloat(document.getElementById('cashAmount' + ind).value);
                                //console.log(amount);
            }
                            //
                            if (typeof (document.getElementById('cashTransType' + ind)) != 'undefined' &&
                                    (document.getElementById('cashTransType' + ind) != null))
                            {
                                if (document.getElementById('cashTransType' + ind).value == 'DR') {
                                    //alert('CDR');
                                    document.getElementById(prefix + 'PayPrevCashBalDRAmt').value = parseFloat(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value) + parseFloat(amount);
                                    //console.log(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value);
                                } else if (document.getElementById('cashTransType' + ind).value == 'CR') {
                                    //alert('CCR');
                                    document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = parseFloat(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value) + parseFloat(amount);
                                    //console.log(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value);
        }
    }
                            amountToPay = parseFloat(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value) - parseFloat(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value);
//                            console.log("amount to pay:::" + amountToPay);
                            //                         
                            //

}
                    }
                }
            }
        }
    }
}


//On Load update invoice calculate total cr and dr amount / count which are settled invoice
function calcByInvoiceAmt(prefix)
{
    //console.log("in function");
    //alert("in function:::"+prefix);
    if (typeof (document.getElementById('total_invoice_cnt')) != 'undefined' &&
            (document.getElementById('total_invoice_cnt') != null))
    {
        var total_inv_cnt = document.getElementById('total_invoice_cnt').value;
        //console.log(total_inv_cnt);
        if (total_inv_cnt > 0)
        {
            //alert("in inv cnt" + total_inv_cnt);
            for (var ind = 1; ind <= total_inv_cnt; ind++)
            {
                //console.log("in for ind" + ind);
                //Checking cash pay is checked or not if checked then add this amount in the cr  / dr amount
                if (typeof (document.getElementById('selPayCash' + ind)) != 'undefined' &&
                        (document.getElementById('selPayCash' + ind) != null))
                {

                    var checked_cash = document.getElementById('selPayCash' + ind).value;
                    //
                    //console.log(checked_cash);
                    var schemeDepch = document.getElementById('schemeDepCh' + ind).value;
                    //console.log("this is scheme dep:::"+schemeDepch);
                    if (checked_cash == 'checked' && schemeDepch != 'SCHEME_DEPOSIT_CHECKED') {
                        //
                        if (document.getElementById(prefix + 'PayPrevTotAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevTotAmt').value == '') {
                            document.getElementById(prefix + 'PayPrevTotAmt').value = 0;
                        }

                        if (document.getElementById(prefix + 'PayPrevCashBalDRAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevCashBalDRAmt').value == '') {
                            document.getElementById(prefix + 'PayPrevCashBalDRAmt').value = 0;
                        }

                        if (document.getElementById(prefix + 'PayPrevCashBalCRAmt').value == 'NaN' || document.getElementById(prefix + 'PayPrevCashBalCRAmt').value == '') {
                            document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = 0;
                        }

                        //
                        if (typeof (document.getElementById('cashAmount' + ind)) != 'undefined' &&
                                (document.getElementById('cashAmount' + ind) != null))
                        {
                            var amount = parseFloat(document.getElementById('cashAmount' + ind).value);
                            //console.log(amount);
                        }
                        //
                        if (typeof (document.getElementById('cashTransType' + ind)) != 'undefined' &&
                                (document.getElementById('cashTransType' + ind) != null))
                        {
                            if (document.getElementById('cashTransType' + ind).value == 'DR') {
                                //alert('CDR');
                                document.getElementById(prefix + 'PayPrevCashBalDRAmt').value = parseFloat(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value) + parseFloat(amount);
                                //console.log(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value);
                            } else if (document.getElementById('cashTransType' + ind).value == 'CR') {
                                //alert('CCR');
                                document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = parseFloat(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value) + parseFloat(amount);
                                //console.log(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value);
                            }
                        }
                        amountToPay = parseFloat(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value) - parseFloat(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value);
                        //console.log("amount to pay:::"+amountToPay);
                        //
                        if (amountToPay > 0) {
                            //console.log("in if >");
                            // 
                            if (typeof (document.getElementById(prefix + 'PayPrevAmtDisp')) != 'undefined' &&
                                    document.getElementById(prefix + 'PayPrevAmtDisp') != null)
                            {
                                document.getElementById(prefix + 'PayPrevAmtDisp').value = parseFloat(Math.abs(amountToPay)).toFixed(2);
                                document.getElementById(prefix + 'PayPrevTotAmt').value = parseFloat(Math.abs(amountToPay)).toFixed(2);
                                document.getElementById(prefix + 'PayPrevAmtDisp').style.color = 'red';
                            }
                            if (typeof (document.getElementById(prefix + 'PayPrevCashBalCRDR')) != 'undefined' &&
                                    document.getElementById(prefix + 'PayPrevCashBalCRDR') != null)
                            {
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value = 'DR';
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').style.color = 'red';
                            }
                        } else {
                            //
                            //console.log("in else <");
                            if (typeof (document.getElementById(prefix + 'PayPrevAmtDisp')) != 'undefined' &&
                                    document.getElementById(prefix + 'PayPrevAmtDisp') != null)
                            {
                                document.getElementById(prefix + 'PayPrevAmtDisp').value = parseFloat(Math.abs(amountToPay)).toFixed(2);
                                document.getElementById(prefix + 'PayPrevAmtDisp').style.color = 'green';
                            }
                            if (typeof (document.getElementById(prefix + 'PayPrevCashBalCRDR')) != 'undefined' &&
                                    document.getElementById(prefix + 'PayPrevCashBalCRDR') != null)
                            {
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').value = 'CR';
                                document.getElementById(prefix + 'PayPrevCashBalCRDR').style.color = 'Green';
                            }
                        }
                        //
                        //
                        calcPaymentCashBalance(prefix);
                        //calPrevCashBalAfterScheme(prefix);
                    }
//                    else 
//                    {
//                        if(typeof(document.getElementById('cashAmount'+ind)) != 'undefined' &&
//                        (document.getElementById('cashAmount'+ind) != null))
//                        {
//                            var amount = parseFloat(document.getElementById('cashAmount' + ind).value);
//                        }
//                        //
//                        if(typeof(document.getElementById('cashTransType'+ind)) != 'undefined' &&
//                            (document.getElementById('cashTransType'+ind) != null))
//                        {
//                            if (document.getElementById('cashTransType' + ind).value == 'DR') {
//                                //alert('DR');
//                                document.getElementById(prefix + 'PayPrevCashBalDRAmt').value = parseFloat(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value) - parseFloat(amount);
//                                console.log(document.getElementById(prefix + 'PayPrevCashBalDRAmt').value);
//                            } else if (document.getElementById('cashTransType' + ind).value == 'CR') {
//                                //alert('CR');
//                                document.getElementById(prefix + 'PayPrevCashBalCRAmt').value = parseFloat(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value) - parseFloat(amount);
//                                console.log(document.getElementById(prefix + 'PayPrevCashBalCRAmt').value);
//                            }
//                        }    
//                    }             

                }
                //
                //Check gold is checked in pre invoice
                if (typeof (document.getElementById('selPayGold' + ind)) != 'undefined' &&
                        (document.getElementById('selPayGold' + ind) != null))
                {

                    var checked_gold = document.getElementById('selPayGold' + ind).value;
                    //console.log("chec gold is:::"+checked_gold);
                    //

                    if (document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value == 'NaN' || document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value == '') {
                        document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value = 0;
                    }
                    //
                    if (document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value == 'NaN' || document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value == '') {
                        document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value = 0;
                    }

                    //
                    if (checked_gold == 'checked') {
                        if (typeof (document.getElementById('goldWeight' + ind)) != 'undefined' &&
                                (document.getElementById('goldWeight' + ind) != null))
                        {
                            var weight = parseFloat(document.getElementById('goldWeight' + ind).value);
                            //alert('weight == ' + weight);
                        }
                        //
                        if (typeof (document.getElementById('goldWeightType' + ind)) != 'undefined' &&
                                (document.getElementById('goldWeightType' + ind) != null))
                        {
                            var weightTyp = document.getElementById('goldWeightType' + ind).value;
                            if (weightTyp == "")
                            {
                                weightTyp = 'GM';
                            }
                            //alert('weight == ' + weightTyp);
                        }
                        convertedWeight = convertWeight(weight, weightTyp, weightTyp);
                        //console.log("convertedWeight" + convertedWeight);
                        //
                        if (typeof (document.getElementById('gdWtTransType' + ind)) != 'undefined' &&
                                (document.getElementById('gdWtTransType' + ind) != null))
                        {
                            if (document.getElementById('gdWtTransType' + ind).value == 'DR') {
                                document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value = parseFloat(document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value) + parseFloat(convertedWeight);
                            } else if (document.getElementById('gdWtTransType' + ind).value == 'CR') {
                                document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value = parseFloat(document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value) + parseFloat(convertedWeight);
                            }
                        }
                        //console.log("GoldWtPrevBalCRAmt" + document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value);


//                    else {
//                        if(typeof(document.getElementById('goldWeight'+ind)) != 'undefined' &&
//                                (document.getElementById('goldWeight'+ind) != null))
//                        {
//                            var weight = parseFloat(document.getElementById('goldWeight' + ind).value);
//                            console.log('weight == ' + weight);
//                        }
//                        //
//                        if(typeof(document.getElementById('goldWeightType'+ ind)) != 'undefined' &&
//                                (document.getElementById('goldWeightType'+ ind) != null))
//                        {
//                            var weightTyp = document.getElementById('goldWeightType' + ind).value;
//                            //alert('weight == ' + weightTyp);
//                            console.log('weight type == ' + weightTyp);
//                        }    
//                        if(weightTyp == "")
//                        {
//                            weightTyp = 'GM';
//                        }
//                        convertedWeight = convertWeight(weight, weightTyp, weightTyp);
//                        console.log("convertedWeight" + convertedWeight);
//                    //
//                        if(typeof(document.getElementById('gdWtTransType'+ind)) != 'undefined' &&
//                            (document.getElementById('gdWtTransType'+ind) != null))
//                        {
//                            if (document.getElementById('gdWtTransType' + ind).value == 'DR') {
//                                document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value = parseFloat(document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value) - parseFloat(convertedWeight);
//                            } else if (document.getElementById('gdWtTransType' + ind).value == 'CR') {
//                                document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value = parseFloat(document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value) - parseFloat(convertedWeight);
//                            }
//                        }                        
//                    }
                        //console.log("GoldWtPrevBalCRAmt" + document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value  );
                        //
                        weightToPay = parseFloat(document.getElementById(prefix + 'GoldWtPrevBalDRAmt').value) - parseFloat(document.getElementById(prefix + 'GoldWtPrevBalCRAmt').value);
                        //console.log('weightToPay == ' + weightToPay);
    //
    //alert('weightToPay == ' + weightToPay);
    //
                        if (weightToPay < 0) {
                            document.getElementById(prefix + 'GoldWtPrevBalCRDR').value = 'CR';
                        } else {
                            document.getElementById(prefix + 'GoldWtPrevBalCRDR').value = 'DR';
                        }
                        //
                        // START OF CODE TO SET COLOR FOR GOLD PREV WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
                        if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'DR') {
                            document.getElementById('metal1WtPrevBal').style.color = 'red';
                            document.getElementById(prefix + 'GoldWtPrevBalCRDR').style.color = 'red';
                        } else if (document.getElementById(prefix + 'GoldWtPrevBalCRDR').value == 'CR') {
                            document.getElementById('metal1WtPrevBal').style.color = 'green';
                            document.getElementById(prefix + 'GoldWtPrevBalCRDR').style.color = 'green';
                        }
                        // END OF CODE TO SET COLOR FOR GOLD PREV WT BAL ACCORDING TO CR/DR TYPE @PRIYANKA-18MAY18
                        //
                        document.getElementById(prefix + 'GoldWtPrevBal').value = parseFloat(Math.abs(weightToPay)).toFixed(3);
                        //
                        if (weightTyp == "")
                        {
                            weightTyp = 'GM';
                        }
                        document.getElementById('metal1WtPrevBal').value = parseFloat(Math.abs(weightToPay)).toFixed(3) + ' ' + weightTyp;
                        //
                        if (document.getElementById('paymentMode').value == 'RateCut') {
                            //
                            document.getElementById(prefix + 'GoldRtCtWtBal').value = calcWeightBalance(prefix, document.getElementById(prefix + 'GoldWtPrevBalCRDR').value, document.getElementById(prefix + 'GoldWtPrevBal').value, document.getElementById(prefix + 'GoldTotFineWt').value, document.getElementById(prefix + 'GoldWtRecBal').value, document.getElementById(prefix + 'RtCtGdCRDR'));
                            //
                        }
                        //
                    }
                }
                if (typeof (document.getElementById('selPaySilver' + ind)) != 'undefined' &&
                        (document.getElementById('selPaySilver' + ind) != null))
                {
                    var checked_silver = document.getElementById('selPaySilver' + ind).value;
                    //console.log(checked_silver);
                    if (checked_silver == 'checked')
                    {
                        calcSilverWeight(checked_silver, ind);
                    }
                }
                if (typeof (document.getElementById('selPayCrystal' + ind)) != 'undefined' &&
                        (document.getElementById('selPayCrystal' + ind) != null))
                {
                    var checked_stone = document.getElementById('selPayCrystal' + ind).value;
                    //console.log(checked_stone);
                    if (checked_stone == 'checked')
                    {
                        calcCrystalWeight(checked_stone, ind);
                    }
                }
                //

            }//for loop ends here
        }
    }
}
