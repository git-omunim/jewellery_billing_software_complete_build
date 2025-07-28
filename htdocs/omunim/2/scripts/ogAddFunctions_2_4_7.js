/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*************Start code to add function for stock navigations @Author:PRIYA06OCT14*****************/
function commonNavigationFunction(div, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById(div).innerHTML = "<img src='images/loading16.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ogiamsdv.php?panelName=" + panel, true);
    xmlhttp.send();
}
/*************End code to add function for stock navigations @Author:PRIYA06OCT14*****************/
/*********Start code to change ID's @Author:PRIYANKA-05-06-17*********/
function validateAddWItemInputs() {

    if (document.getElementById('upPanel').value == 'UpPanel') {
        if (noOfCrystal == '' || noOfCrystal == undefined) {
            noOfCrystal = document.getElementById("noOfCry").value;
        }
    }
    if (validateSelectField(document.getElementById("addItemDOBDay").value, "Please select Day!") == false) {
        document.getElementById("addItemDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBMonth").value, "Please select Month!") == false) {
        document.getElementById("addItemDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBYear").value, "Please select Year!") == false) {
        document.getElementById("addItemDOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_metal_type").value, "Please select Metal!") == false) {
        document.getElementById("sttr_metal_type").focus();
        return false;
    } else if ((document.getElementById("sttr_metal_type").value != 'Other') && validateEmptyField(document.getElementById("sttr_metal_rate").value, "Please enter Metal Rate!") == false) {
        document.getElementById("sttr_metal_rate").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_pre_id").value, "Please enter Item Pre Id!") == false) {
//           || validateAlphaNum(document.getElementById("sttr_item_pre_id").value, "Please enter characters & number without space in item pre id!") == false) {
        document.getElementById("sttr_item_pre_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_category").value, "Please enter Item Category!") == false) {
        document.getElementById("sttr_item_category").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please enter Item Name!") == false) {
        document.getElementById("sttr_item_name").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_gs_weight").value, "Please enter Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("sttr_gs_weight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_gs_weight").focus();
        return false;
    } else if (document.getElementById('panelSimilarDiv').value != 'NoSimilarItem') {
        if (document.getElementById("sttr_nt_weight").value == '') {
            document.getElementById("sttr_nt_weight").value = document.getElementById("sttr_gs_weight").value;
        }
        if ((document.getElementById("sttr_metal_type").value == 'Gold' || document.getElementById("sttr_metal_type").value == 'Silver') && validateSelectField(document.getElementById("sttr_purity").value, "Please select Item Tunch or Purity!") == false) {
            document.getElementById("sttr_purity").focus();
            return false;
        }
        if (noOfCrystal != '' && noOfCrystal != undefined && noOfCrystal != '0') {
            suppCryEntered = 0;
            for (var cry = 1; cry <= noOfCrystal; cry++) {
                if (document.getElementById("del" + cry).value != 'Deleted') {
                    if (validateEmptyField(document.getElementById("sttr_item_category" + cry).value, "Please enter Crystal Id " + cry + "!") == false) {
                        document.getElementById("sttr_item_category" + cry).focus();
                        return false;
                    } else if (validateEmptyField(document.getElementById("sttr_purchase_rate" + cry).value, "Please enter Crystal Rate " + cry + "!") == false) {
                        document.getElementById("sttr_purchase_rate" + cry).focus();
                        return false;
                    } else if (validateEmptyField(document.getElementById("sttr_valuation" + cry).value, "Please enter Crystal Valuation " + cry + "!") == false) {
                        document.getElementById("sttr_valuation" + cry).focus();
                        return false;
                    }
                    suppCryEntered++;
                }
            }
            document.getElementById("addItemCryCount").value = suppCryEntered;
        }
        calStockItemPrice();
        return true;
    } else if (validateEmptyField(document.getElementById("sttr_nt_weight").value, "Please enter Net Weight!") == false ||
            validateNumWithDot(document.getElementById("sttr_nt_weight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_nt_weight").focus();
        return false;
    } else if ((document.getElementById("sttr_metal_type").value == 'Gold' || document.getElementById("sttr_metal_type").value == 'Silver') && validateSelectField(document.getElementById("sttr_purity").value, "Please select Item Tunch or Purity!") == false) {
        document.getElementById("sttr_purity").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_final_valuation").value, "Please enter Item Final Valuation!") == false ||
            validateNumWithDot(document.getElementById("sttr_final_valuation").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_final_valuation").focus();
        return false;
    } else if (noOfCrystal != '' && noOfCrystal != undefined && noOfCrystal != '0') {
        suppCryEntered = 0;
        for (var cry = 1; cry <= noOfCrystal; cry++) {
            if (document.getElementById("del" + cry).value != 'Deleted') {
                if (validateEmptyField(document.getElementById("sttr_item_category" + cry).value, "Please enter Crystal Id " + cry + "!") == false) {
                    document.getElementById("sttr_item_category" + cry).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("sttr_purchase_rate" + cry).value, "Please enter Crystal Rate " + cry + "!") == false) {
                    document.getElementById("sttr_purchase_rate" + cry).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("sttr_valuation" + cry).value, "Please enter Crystal Valuation " + cry + "!") == false) {
                    document.getElementById("sttr_valuation" + cry).focus();
                    return false;
                }
                suppCryEntered++;
            }
        }
        document.getElementById("addItemCryCount").value = suppCryEntered;
    }
    if (document.getElementById('mainPanel').value == 'StockPanel' && document.getElementById('autoBcPrint').value == 'YES') {
        document.getElementById("auto_barcode_label_print").style.visibility = "hidden";
        return true;
    } else {
        return true;
    }
}
/*********End code to change ID's @Author:PRIYANKA-05-06-17*********/
/*********Start code to add validation for tunch field @OMMODTAG SHRI_05OCT15*****************/
/*********Start code to add validation for supplier account @Author:SHRI19MAY16*********/
/*********Start code to change ID's @Author:PRIYANKA-05-06-17*********/

//
const mandatoryArray = ['FIRM_USER', 'DATE_USER', 'TYPE_USER', 'RATE_USER', 'PRE ID_USER', 'POST ID_USER', 'STOCK TYPE_USER', 'CATEGORY_USER', 'NAME_USER', 'GS WT_USER',
    'GS WT TYP_USER', 'NT WT_USER', 'NT WT TYP_USER', 'PURITY_USER'];
function mandatoryFieldSmapping() {
    for (let i = 0; i < mandatoryArray.length; i++) {
        let field = document.getElementById(mandatoryArray[i]);

        if (field.value === "") {
            alert("Please fill out the " + mandatoryArray[i].replace("_USER", ""));
            field.focus();
            return false;
        }
    }
    return true;
}

function validateAddItemInputs()

{
    if (document.getElementById('upPanel').value == 'UpPanel') {
        if (noOfCrystal == '' || noOfCrystal == undefined) {
            noOfCrystal = document.getElementById("noOfCry").value;
        }
    }
    if (document.getElementById('panelName').value == 'SuppOrderUp') {
        if (validateSelectField(document.getElementById("sttr_purity").value, "Please select Item Tunch or Purity!") == false) {
            document.getElementById("sttr_purity").focus();
            return false;
        }
    }
    //
    if (document.getElementById("sttr_nt_weight").value == '' && document.getElementById("sttr_gs_weight").value != '') {
        document.getElementById("sttr_nt_weight").value = document.getElementById("sttr_gs_weight").value;
    }
    //
    if (validateSelectField(document.getElementById("addItemDOBDay").value, "Please select Day!") == false) {
        document.getElementById("addItemDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBMonth").value, "Please select Month!") == false) {
        document.getElementById("addItemDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBYear").value, "Please select Year!") == false) {
        document.getElementById("addItemDOBYear").focus();
        return false;
    }
//    else if (validateEmptyField(document.getElementById("addItemInvoiceNo").value, "Please enter Invoice Number!") == false ||
//            validateNum(document.getElementById("addItemInvoiceNo").value, "Accept only numeric characters without space character!") == false) {
//        document.getElementById("addItemInvoiceNo").focus();
//        return false;
//    } 
    else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm!") == false) {
        document.getElementById("firmId").focus();
        return false;
    }
//    else if (validateSelectField(document.getElementById("accountId").value, "Please select Stock Account Name!") == false) {
//        document.getElementById("accountId").focus();
//        return false;
//    } else if (validateSelectField(document.getElementById("crAccountId").value, "Please select Supplier Account Name!") == false) {
//        document.getElementById("crAccountId").focus();
//        return false;
//    }
    else if (validateEmptyField(document.getElementById("sttr_metal_type").value, "Please select Metal!") == false) {
        document.getElementById("sttr_metal_type").focus();
        return false;
    } else if ((document.getElementById("sttr_metal_type").value != 'Other') && validateEmptyField(document.getElementById("sttr_metal_rate").value, "Please enter Metal Rate!") == false) {
        document.getElementById("sttr_metal_rate").focus();
        return false;

    } else if (validateEmptyField(document.getElementById("sttr_item_pre_id").value, "Please enter Item Pre Id!") == false) {
        document.getElementById("sttr_item_pre_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_id").value, "Please enter Item Id!") == false ||
            validateNum(document.getElementById("sttr_item_id").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("sttr_item_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_category").value, "Please enter Item Category!") == false) {
        document.getElementById("sttr_item_category").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please enter Item Name!") == false) {
        document.getElementById("sttr_item_name").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_quantity").value, "Please enter Item Pieces!") == false ||
            validateNum(document.getElementById("sttr_quantity").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_quantity").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_gs_weight").value, "Please enter Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("sttr_gs_weight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_gs_weight").focus();
        return false;
        //
        // =================================================================================================================================== //
        // START CODE TO ADD CONDITION FOR ENTERING GROSS WEIGHT LESS OR EQUAL TO REMAINING WEIGHT IN CASE OF TAG CREATION @MADHUREE-25NOV2020 //
        // =================================================================================================================================== //
        //
    }if( parseFloat(document.getElementById("sttr_gs_weight").value) == 0){
             alert("Gross Weight entered should be more than zero !");
            document.getElementById("sttr_gs_weight").focus();
             return false;
        } else if (document.getElementById("sttr_gs_weight").value != '' &&
            typeof (document.getElementById('invPanelName')) != 'undefined' &&
            (document.getElementById('invPanelName') != null) &&
            typeof (document.getElementById('totalRemGsWt')) != 'undefined' &&
            (document.getElementById('totalRemGsWt') != null)) {
        //
        if (document.getElementById('invPanelName').value == 'AddByInv' && parseFloat(document.getElementById("sttr_gs_weight").value) > parseFloat(document.getElementById('totalRemGsWt').value)) {
            alert("Gross Weight entered should not more than the remaining Gross Weight !");
            document.getElementById("sttr_gs_weight").focus();
            return false;
        }if( parseFloat(document.getElementById("sttr_gs_weight").value) == 0){
             alert("Gross Weight entered should be more than zero !");
            document.getElementById("sttr_gs_weight").focus();
             return false;
        }
        if (document.getElementById('invPanelName').value == 'AddByInv' && noOfCrystal != '' && noOfCrystal != undefined && noOfCrystal != '0') {
//        suppCryEntered = 0;
        for (var cry = 1; cry <= noOfCrystal; cry++) {
            if (parseFloat(document.getElementById("sttr_gs_weight_"+ cry).value) > parseFloat(document.getElementById('totalCrygswt'+ cry).value)) {
                    alert("Gross Weight entered should be more than the remaining Gross Weight "+ cry+ " !");
                    document.getElementById("sttr_gs_weight_"+ cry).focus();
                    return false;
        }else if( parseFloat(document.getElementById("sttr_gs_weight_"+ cry).value) == 0){
             alert("Gross Weight " + cry + " entered should be more than zero !");
            document.getElementById("sttr_gs_weight_"+ cry).focus();
             return false;
        }else if (validateEmptyField(document.getElementById("sttr_item_category" + cry).value, "Please enter Crystal Id " + cry + "!") == false) {
                    document.getElementById("sttr_item_category" + cry).focus();
                    return false; // Added by @PRIYANKA-18FEB18 for validating crystal name
                } else if (validateEmptyField(document.getElementById("sttr_item_name" + cry).value, "Please enter Crystal Name " + cry + "!") == false) {
                    document.getElementById("sttr_item_name" + cry).focus();
                    return false;
                } else if (document.getElementById('sttr_wt_auto_less' + cry).checked != true) {
                    // Added by @PRIYANKA-22MAR18 for Validating CRYSTAL RATE
                    if (validateEmptyField(document.getElementById("sttr_purchase_rate" + cry).value, "Please enter Crystal Rate " + cry + "!") == false) {
                        document.getElementById("sttr_purchase_rate" + cry).focus();
                        return false;
                    }
                    //
                } else if (validateEmptyField(document.getElementById("sttr_valuation" + cry).value, "Please enter Crystal Valuation " + cry + "!") == false) {
                    document.getElementById("sttr_valuation" + cry).focus();
                    return false;
                }
//                suppCryEntered++;
            
        }
        document.getElementById("addItemCryCount").value = suppCryEntered;
    }
        //
        // ================================================================================================================================= //
        // END CODE TO ADD CONDITION FOR ENTERING GROSS WEIGHT LESS OR EQUAL TO REMAINING WEIGHT IN CASE OF TAG CREATION @MADHUREE-25NOV2020 //
        // ================================================================================================================================= //
        //
    } else if (validateEmptyField(document.getElementById("sttr_nt_weight").value, "Please enter Net Weight!") == false ||
            validateNumWithDot(document.getElementById("sttr_nt_weight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_nt_weight").focus();
        return false;
    } else if ((document.getElementById("sttr_metal_type").value == 'Gold' || document.getElementById("sttr_metal_type").value == 'Silver' ||
            document.getElementById("sttr_metal_type").value == 'GOLD' || document.getElementById("sttr_metal_type").value == 'SILVER' ||
            document.getElementById("sttr_metal_type").value == 'gold' || document.getElementById("sttr_metal_type").value == 'silver')
            && validateEmptyField(document.getElementById("sttr_purity").value, "Please Enter Item Tunch or Purity!") == false) {
        document.getElementById("sttr_purity").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_final_valuation").value, "Please enter Item Final Valuation!") == false ||
            validateNumWithDot(document.getElementById("sttr_final_valuation").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_final_valuation").focus();
        return false;
    } else if (noOfCrystal != '' && noOfCrystal != undefined && noOfCrystal != '0') {
        suppCryEntered = 0;
        //
        for (var cry = 1; cry <= noOfCrystal; cry++) {
            if (document.getElementById("del" + cry).value != 'Deleted') {
                //
                if (validateEmptyField(document.getElementById("sttr_item_category" + cry).value, "Please enter Crystal Id " + cry + "!") == false) {
                    document.getElementById("sttr_item_category" + cry).focus();
                    return false; // Added by @PRIYANKA-18FEB18 for validating crystal name
                } else if (validateEmptyField(document.getElementById("sttr_item_name" + cry).value, "Please enter Crystal Name " + cry + "!") == false) {
                    document.getElementById("sttr_item_name" + cry).focus();
                    return false;
                 }else if (document.getElementById('totalCrygswt'+ cry)!=null && parseFloat(document.getElementById("sttr_gs_weight_"+ cry).value) > parseFloat(document.getElementById('totalCrygswt'+ cry).value)) {
                    alert("Gross Weight entered should be more than the remaining Gross Weight "+ cry+ " !");
                    document.getElementById("sttr_gs_weight_"+ cry).focus();
                    return false;
                }else if( parseFloat(document.getElementById("sttr_gs_weight_"+ cry).value) == 0){
                     alert("Gross Weight " + cry + " entered should be more than zero !");
                    document.getElementById("sttr_gs_weight_"+ cry).focus();
                     return false;
                }else if (document.getElementById('sttr_wt_auto_less' + cry).checked != true) {
                    // Added by @PRIYANKA-22MAR18 for Validating CRYSTAL RATE
                    if (validateEmptyField(document.getElementById("sttr_purchase_rate" + cry).value, "Please enter Crystal Rate1111 " + cry + "!") == false) {
                        document.getElementById("sttr_purchase_rate" + cry).focus();
                        return false;
                    }
                    //
                } else if (validateEmptyField(document.getElementById("sttr_valuation" + cry).value, "Please enter Crystal Valuation " + cry + "!") == false) {
                    document.getElementById("sttr_valuation" + cry).focus();
                    return false;
                }
                suppCryEntered++;
            }
        }
        document.getElementById("addItemCryCount").value = suppCryEntered;
    } else {
        return true;
    }
    if (typeof (document.getElementById('sttr_panel_name')) != 'undefined' && document.getElementById('sttr_panel_name') != null) {
        if (document.getElementById('sttr_panel_name').value != 'RETAIL_CAD_STOCK') {
    // START CDOE TO ADD # AT THE LAST OF PREID IF LAST CHARACTER IS NUMBER,@AUTHOR:HEMA-8JUL2020
    var prodPreId = document.getElementById('sttr_item_pre_id').value;
    var lastChar = prodPreId.charAt(prodPreId.length - 1);
    if (isNaN(lastChar) != true) {
        prodPreId += '#';
    }
    document.getElementById('sttr_item_pre_id').value = prodPreId.trim();
    // END CDOE TO ADD # AT THE LAST OF PREID IF LAST CHARACTER IS NUMBER,@AUTHOR:HEMA-8JUL2020
        }
    } else {
        var prodPreId = document.getElementById('sttr_item_pre_id').value;
        var lastChar = prodPreId.charAt(prodPreId.length - 1);
        if (isNaN(lastChar) != true) {
            prodPreId += '#';
        }
        document.getElementById('sttr_item_pre_id').value = prodPreId.trim();
    }
    if (document.getElementById('mainPanel').value == 'StockPanel' && document.getElementById('autoBcPrint').value == 'YES') {
        document.getElementById("auto_barcode_label_print").style.visibility = "hidden";
        return true;
    } else {
        return true;
    }

}

/*********End code to change ID's @Author:PRIYANKA-05-06-17*********/
/*********End code to add validation for supplier account @Author:SHRI19MAY16*********/
/*********End code to add validation for tunch field @OMMODTAG SHRI_05OCT15*****************/
/*********Start code for pass barocde id for print barocode:Author:SANT14FEB17***************/
function callAutoBcPrint(documentRootPath) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("auto_barcode_label_print").innerHTML = xmlhttp2.responseText;
            printDirectDiv("itemTagSel");
        }
    };
    var poststr = 'stockFirmId=' + document.getElementById("bcFirmId").value
            + '&newPreItemId=' + document.getElementById("bcAddItemPreId").value
            + '&newItemId=' + document.getElementById("bcAddItemId").value
            + '&newItemName=' + document.getElementById("bcAddItemName").value
            + '&newItemMetal=' + document.getElementById("bcAddItemMetal").value
            + '&newItemGSW=' + document.getElementById("bcAddItemGrossWeight").value
            + '&newItemGSQT=' + document.getElementById("bcAddItemGrossWeightType").value
            + '&newItemNTW=' + document.getElementById("bcAddItemNetWeight").value
            + '&newItemNTWT=' + document.getElementById("bcAddItemNetWeightType").value
            + '&newItemTunch=' + document.getElementById("bcAddItemTunch").value
            + '&bisMarkVal=' + document.getElementById("bcAddItemBisMark").value
            + '&mkngCharges=' + document.getElementById("bcAddItemCustCharges").value
            + '&mkngChargesType=' + document.getElementById("bcAddItemCustChargesType").value
            + '&panel=' + 'autoPrint'
            + '&itstId=' + document.getElementById('bcItemStocId').value;
    xmlhttp2.open("POST", documentRootPath + "/include/php/ogitemtg.php?" + poststr, true);
    xmlhttp2.send();
}

/*********End code for pass barocde id for print barocode:Author:SANT14FEB17***************/
function addItemFormSubmit() {
    document.getElementById("add_item").submit();
}

/*******Start  code to add if condition for wholesale @Author:ANUJA17AUG15********************/
function addItem(documentRootPath) {
    if (documentRootPath == '' || documentRootPath == null || documentRootPath == 'undefined') { //added @Author:SHRI22MAR17
        documentRootPath = document.getElementById('documentRootPath').value;
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";

    if (document.getElementById("sttr_item_ent_type").value == 'purchaseOnCash')
    {
        document.getElementById("sttr_transaction_type").value = 'PURONCASH';
    }

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (document.getElementById('mainPanel').value == 'StockPanel' && document.getElementById('custPurPresent').value > 0) {
        alert('To Modify ,First Delete This Item From Customer Purchase Panel!');
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        return false;
    } else
    {
        if (document.getElementById('sttr_wastage').value == '') {
            document.getElementById('sttr_wastage').value = 0;
        }
        document.getElementById("addItemSubButtDiv").style.visibility = "hidden";
        document.getElementById("addItemSimButtDiv").style.visibility = "hidden";
        document.getElementById("addItemExItButtDiv").style.visibility = "hidden";
        document.getElementById("addItemAddStockItButtDiv").style.visibility = "hidden";
        document.getElementById("addItemHelpButtDiv").style.visibility = "hidden";
        var itemDateDay = document.getElementById("addItemDOBDay").value;
        var itemDateMMM = document.getElementById("addItemDOBMonth").value;
        var itemDateYY = document.getElementById("addItemDOBYear").value;
        var itemDateStr = document.getElementById("addItemDOBMonth").value + ' ' + document.getElementById("addItemDOBDay").value + ', ' + document.getElementById("addItemDOBYear").value;
        var itemDate = new Date(itemDateStr); // stock Date
        var todayDate = new Date(); // Today Date
        var milliStockDate = itemDate.getTime();
        var milliTodayDate = milliStockDate;
        var datesDiff = milliTodayDate - milliStockDate;
        if (typeof (document.getElementById('nepaliDateIndicator')) != 'undefined' &&
                (document.getElementById('nepaliDateIndicator') != null)) {
            var nepaliDateIndicator = document.getElementById("nepaliDateIndicator").value;
        } else {
            var nepaliDateIndicator = '';
        }
        if (datesDiff < 0 && nepaliDateIndicator != 'YES') {
            alert('Please Select the correct Date!');
            document.getElementById("addItemDOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addItemSubButtDiv").style.visibility = "visible";
            document.getElementById("addItemSimButtDiv").style.visibility = "visible";
            document.getElementById("addItemExItButtDiv").style.visibility = "visible";
            document.getElementById("addItemAddStockItButtDiv").style.visibility = "visible";
            document.getElementById("addItemHelpButtDiv").style.visibility = "visible";
            return false;
        } else {
            if (itemDateMMM == 'FEB' || itemDateMMM == 'APR' || itemDateMMM == 'JUN' || itemDateMMM == 'SEP' || itemDateMMM == 'NOV') {
                if (itemDateMMM == 'FEB' && itemDateDay > 29 && itemDateYY % 4 == 0) {
                    alert('Please select correct Date, Month ' + itemDateMMM + ' for this selected year has only max 29 days.');
                    document.getElementById("addItemDOBDay").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                    document.getElementById("addItemSimButtDiv").style.visibility = "visible";
                    document.getElementById("addItemExItButtDiv").style.visibility = "visible";
                    document.getElementById("addItemAddStockItButtDiv").style.visibility = "visible";
                    document.getElementById("addItemHelpButtDiv").style.visibility = "visible";
                    return false;
                }
                if (itemDateMMM == 'FEB' && itemDateDay > 28 && itemDateYY % 4 != 0) {
                    alert('Please select correct Date, Month ' + itemDateMMM + ' for this selected year has only max 28 days.');
                    document.getElementById("addItemDOBDay").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                    document.getElementById("addItemSimButtDiv").style.visibility = "visible";
                    document.getElementById("addItemExItButtDiv").style.visibility = "visible";
                    document.getElementById("addItemAddStockItButtDiv").style.visibility = "visible";
                    document.getElementById("addItemHelpButtDiv").style.visibility = "visible";
                    return false;
                }
                if (itemDateDay > 30) {
                    alert('Please select correct Date, Month ' + itemDateMMM + ' has only max 30 days.');
                    document.getElementById("addItemDOBDay").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                    document.getElementById("addItemSimButtDiv").style.visibility = "visible";
                    document.getElementById("addItemExItButtDiv").style.visibility = "visible";
                    document.getElementById("addItemAddStockItButtDiv").style.visibility = "visible";
                    document.getElementById("addItemHelpButtDiv").style.visibility = "visible";
                    return false;
                }
            }

            if (document.getElementById('payButClickId').value == 'true') {
                if (validateRawMetInputs()) { //validation added @Author:SHRI11APR16
                    var prefix = document.getElementById("prefix").value;
                    var payPanelName = document.getElementById("upPanel").value;
                    if (payPanelName == 'AddPanel') {
                        document.getElementById("totMetal").value = getMetalDiv;
                    } else if (payPanelName == 'UpPanel') {
                        document.getElementById("totMetal").value = document.getElementById("noOfRawMet").value;
                    }
                    return true;
                }
            } else {

                var functionName = validateAddItemInputs;
                if (document.getElementById('stockType').value == 'wholeSaleStock') {
                    functionName = validateAddWItemInputs;
                } else {
                    functionName = validateAddItemInputs;
                }
                //
                if (functionName()) {
                    //
                    if (document.getElementById("validateHUID").value == 'YES' &&
                            (document.getElementById("sttr_metal_type").value == 'Gold' || document.getElementById("sttr_metal_type").value == 'gold' || document.getElementById("sttr_metal_type").value == 'GOLD')
                            && document.getElementById("sttr_gs_weight").value > 2) {
                        if (validateEmptyField(document.getElementById("sttr_hallmark_uid").value, "Please enter Item Hallmark UID !") == false) {

                            document.getElementById("sttr_hallmark_uid").focus();
                            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                            document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                            document.getElementById("addItemSimButtDiv").style.visibility = "visible";
                            document.getElementById("addItemExItButtDiv").style.visibility = "visible";
                            document.getElementById("addItemAddStockItButtDiv").style.visibility = "visible";
                            document.getElementById("addItemHelpButtDiv").style.visibility = "visible";
                            return false;
                        }
                    }
                    //
                    if (document.getElementById("panelName").value != 'UpdateStock' && document.getElementById("panelName").value != 'StockPayUp' && document.getElementById("panelName").value != 'RETAIL_CAD_STOCK_UPDATE') {
                        if (document.getElementById("sttr_hallmark_uid").value != '') {
                            result = checkHallMarkUid(document.getElementById("sttr_hallmark_uid").value, documentRootPath, 'AddStock', document.getElementById("sttrId").value);
                            if (result != 'success') {
                                alert(result);
                                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                                document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                                document.getElementById("addItemSimButtDiv").style.visibility = "visible";
                                document.getElementById("addItemExItButtDiv").style.visibility = "visible";
                                document.getElementById("addItemAddStockItButtDiv").style.visibility = "visible";
                                document.getElementById("addItemHelpButtDiv").style.visibility = "visible";
                                return false;
                            }
                        }
                    }
                    //
                    if (document.getElementById('mainPanel').value == 'StockPanel' && document.getElementById('autoBcPrint').value == 'YES') {

                        if (document.getElementById("panelName").value != 'UpdateStock' && document.getElementById("panelName").value != 'StockPayUp' && document.getElementById("panelName").value != 'RETAIL_CAD_STOCK_UPDATE')
                        {
                            addItemFormSubmit();
                        } else
                            return true;
                    } else {
                        return true;
                    }
                }
            }
        }
    }

    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("addItemSubButtDiv").style.visibility = "visible";
    document.getElementById("addItemSimButtDiv").style.visibility = "visible";
    document.getElementById("addItemExItButtDiv").style.visibility = "visible";
    document.getElementById("addItemAddStockItButtDiv").style.visibility = "visible";
    document.getElementById("addItemHelpButtDiv").style.visibility = "visible";
    return false;
}

/*******End code to add if condition for wholesale @Author:ANUJA17AUG15********************/
/***************Start Code Else condition removed @OMMODTAG SHRI_10MAY16**********************/
function validateRawMetInputs()
{
    var totPrevMetal = 0;
    var slPrOthInfo = document.getElementById('slPrOthInfo').value;
    if (slPrOthInfo == 'PaymentSaved') {
        totPrevMetal = document.getElementById('totPrevMetal').value;
        totPrevMetal++;
    } else {
        totPrevMetal = 1;
    }
    var prefix = document.getElementById("prefix").value;
    for (var dc = totPrevMetal; dc <= getMetalDiv; dc++) {
        if (document.getElementById(prefix + "PayMetal1Val" + dc).value != "") {
            if (validateEmptyField(document.getElementById(prefix + "PayMetal1MetalDesc" + dc).value, "Please Select Item Name " + dc + "!") == false) {
                document.getElementById(prefix + "PayMetal1MetalDesc" + dc).focus();
                return false;
            }
        }
    }
    return true;
}

/*************** End Code Else condition removed @OMMODTAG SHRI_10MAY16**********************/
/**********Start code to add function to get item pre id div @Author:PRIYA07OCT14*********/
function getItemPreIdDiv(preId, metalType, div, id, keyCodeInput, mainPanel, invPanelName, utransInvId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            //alert('str == ' + str);
            if (str == '' || str == null) {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                document.getElementById('sttr_item_id').value = '1';
                document.getElementById('changedItemId').value = '1';
            } else {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                if (keyCodeInput == 40 || keyCodeInput == 38) {
                    document.getElementById('itemPreIdListToSel').focus();
                    document.getElementById('itemPreIdListToSel').options[0].selected = true;
                }
            }
        }
    };
    var itemPreId = preId;
    if (mainPanel == 'AddStockPanel' || mainPanel == 'AddWhStockPanel' || mainPanel == 'RETAIL_FINE_B2' || mainPanel == 'RETAIL_FINE_B3') {
        var documentRootPath = document.getElementById('documentRootPath').value;
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiaidsl.php?metalType=" + metalType +
                "&itemPreId=" + itemPreId + "&div=" + div + "&id=" + id +
                "&mainPanel=" + mainPanel + "&invPanelName=" + invPanelName + "&utransInvId=" + utransInvId, true);
    } else {
        xmlhttp.open("POST", "include/php/ogiaidsl.php?metalType=" + metalType + "&itemPreId=" + itemPreId +
                "&div=" + div + "&id=" + id +
                "&mainPanel=" + mainPanel + "&invPanelName=" + invPanelName + "&utransInvId=" + utransInvId, true);
    }
    xmlhttp.send();
}
//
// ADDED CODE FOR WHOLESALE PRODUCT ID CHANGE - FORM CHANGE ISSUE @AUTHOR:PRIYANKA-10JUNE2023
function getItemPreIdDivWholesale(preId, metalType, div, id, keyCodeInput, mainPanel, invPanelName, utransInvId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            //alert('str == ' + str);
            if (str == '' || str == null) {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                document.getElementById('sttr_item_id').value = '1';
                document.getElementById('changedItemId').value = '1';
            } else {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                if (keyCodeInput == 40 || keyCodeInput == 38) {
                    document.getElementById('itemPreIdListToSel').focus();
                    document.getElementById('itemPreIdListToSel').options[0].selected = true;
                }
            }
        }
    };
    var itemPreId = preId;
    if (mainPanel == 'AddStockPanel' || mainPanel == 'AddWhStockPanel' || mainPanel == 'RETAIL_FINE_B2' || mainPanel == 'RETAIL_FINE_B3') {
        var documentRootPath = document.getElementById('documentRootPath').value;
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiaidsl.php?metalType=" + metalType +
                "&itemPreId=" + itemPreId + "&div=" + div + "&id=" + id + "&stockType=wholesale" +
                "&mainPanel=" + mainPanel + "&invPanelName=" + invPanelName + "&utransInvId=" + utransInvId, true);
    } else {
        xmlhttp.open("POST", "include/php/ogiaidsl.php?metalType=" + metalType + "&itemPreId=" + itemPreId +
                "&div=" + div + "&id=" + id +
                "&mainPanel=" + mainPanel + "&invPanelName=" + invPanelName + "&utransInvId=" + utransInvId, true);
    }
    xmlhttp.send();
}
//
//
function getItemOrderPreIdDiv(preId, metalType, div, id, keyCodeInput, mainPanel, invPanelName, utransInvId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            if (str == '' || str == null) {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                document.getElementById('sttr_item_id').value = '1';
                document.getElementById('changedItemId').value = '1';
            } else {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                if (keyCodeInput == 40 || keyCodeInput == 38) {
                    document.getElementById('itemPreIdListToSel').focus();
                    document.getElementById('itemPreIdListToSel').options[0].selected = true;
                }
            }
        }
    };
    var itemPreId = preId;
    var documentRootPath = document.getElementById('documentRootPath').value;
    xmlhttp.open("POST", documentRootPath + "/include/php/omordiaidsl.php?metalType=" + metalType +
            "&itemPreId=" + itemPreId + "&div=" + div + "&id=" + id +
            "&mainPanel=" + mainPanel + "&invPanelName=" + invPanelName + "&utransInvId=" + utransInvId, true);
    xmlhttp.send();
}
//
//
/**********End code to add function to get item pre id div @Author:PRIYA07OCT14*********/
//Start Adding Image SIze Validation code  By Sarvesh 24Aug2022
function validateSizeImage(input) {
    const fileSize = input.files[0].size / 1024 / 1024; // in MiB
//    if (fileSize > 2) {
//        alert('File size should not exceeds than 2 MB');
//        return false;
//    } else {
        loadImageFileCompress();
//    }
}

//End  Adding Image SIze Validation code  By Sarvesh 24Aug2022
/**********Start code to add function to get calc by for labour charges @Author:PRIYA07OCT14*********/
/**********Start code to add slPrItemLabChrgsSelDiv condition @Author:PRIYA31MAR15************************/
function getItemLabChrgsByWt(div, id, keyCodeInput, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('addItemLabChgBy').focus();
                document.getElementById('addItemLabChgBy').options[0].selected = true;
            }
        }
    };
    if (div == 'slPrItemPurLabChrgsSelDiv') {
        xmlhttp.open("POST", "include/php/ogsplbsl.php?div=" + div, true);
    } else if (div == 'slPrItemLabChrgsSelDiv') {
        xmlhttp.open("POST", "include/php/ogswlbsl.php?div=" + div, true);
    } else if (div == 'itemLabChrgsSelDiv' && panel == 'AddByInv') { // Code added for TAG Entry @PRIYANKA-19OCT18
        xmlhttp.open("POST", "ogialbsl.php?div=" + div + "&panel=" + panel, true);
    } else if (panel == 'rawPurchase') { // Code added for TAG Entry @PRIYANKA-19OCT18
        xmlhttp.open("POST", "include/php/ogialbsl.php?div=" + div + "&panel=" + panel, true);
    } else {
        xmlhttp.open("POST", "include/php/ogialbsl.php?div=" + div + "&panel=" + panel, true);
    }
    xmlhttp.send();
}

//
/**********End code to add slPrItemLabChrgsSelDiv condition @Author:PRIYA31MAR15************************/
/**********End code to add function to get calc by for labour charges @Author:PRIYA07OCT14*********/
/**********Start code to add function to get calc by for labour charges @Author:PRIYA07OCT14*********/
/**********Start code to add slPrItemFfineWtSelDiv condition @Author:PRIYA31MAR15************************/
/**********Start code to add panelname for invoice @Author:SANT08OCT16************************/
function getItemFfnWt(div, id, keyCodeInput, panel, documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('addItemWtBy').focus();
                document.getElementById('addItemWtBy').options[0].selected = true;
            }
        }
    };
    if (div == 'slPrItemFfineWtSelDiv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspfwsl.php?div=" + div, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiafwsl.php?div=" + div + "&panel=" + panel, true);
    }
    xmlhttp.send();
}

//
//
function getStockTransFFNWTDropdown(div, panel, arrStockFormFieldSequence, prodCount, process, documentRootPath, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById(div).focus();
                document.getElementById(div).options[0].selected = true;
            }
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/stock/omStockTransFormFFNWTDropdown.php?inputGoogleSuggDivId=" + div + "&panel=" + panel + "&arrStockFormFieldSequence=" + arrStockFormFieldSequence + "&prodCount=" + prodCount + "&process=" + process, true);
    //
    xmlhttp.send();
}

//
function getStockTransDiscDropdown(div, panel, arrStockFormFieldSequence, prodCount, process, documentRootPath, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById(div).focus();
                document.getElementById(div).options[0].selected = true;
            }
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/omStockTransFormDiscDropdown.php?inputGoogleSuggDivId=" + div
            + "&panel=" + panel + "&arrStockFormFieldSequence=" + arrStockFormFieldSequence + "&prodCount=" + prodCount
            + "&process=" + process, true);
    //
    xmlhttp.send();
}

//
/**********End code to add panelname for invoice @Author:SANT08OCT16************************/
/**********End code to add slPrItemFfineWtSelDiv condition @Author:PRIYA31MAR15************************/
/**********End code to add function to get calc by for labour charges @Author:PRIYA07OCT14*********/
/**********Start code to add function to get calc by for labour charges @Author:PRIYA07OCT14*********/
function getItemDetailsByPreId(preId, mainPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
//            alert(str);
            var strArray = new Array();
            strArray = str.split("*");
//            alert(strArray[16]);
            document.getElementById('addItemId').value = strArray[0];
            document.getElementById('addItemMetal').value = strArray[16];
            document.getElementById('addItemMetalRate').value = strArray[1];
            document.getElementById('addItemName').value = strArray[2];
            document.getElementById('addItemCategory').value = strArray[3];
            document.getElementById('addItemPieces').value = strArray[4];
            document.getElementById('addItemGrossWeight').value = '';
            document.getElementById('addItemNetWeight').value = '';
            document.getElementById('addItemFineWeight').value = strArray[5];
            document.getElementById('addItemFFineWeight').value = strArray[6];
            document.getElementById('addItemTunch').value = strArray[7];
            document.getElementById('addItemWastage').value = strArray[8];
            document.getElementById('addItemFinalTunch').value = strArray[9];
            document.getElementById('addItemLabCharges').value = strArray[10];
            document.getElementById('addItemLabChargesType').value = strArray[11];
            document.getElementById('addItemCustCharges').value = strArray[12];
            document.getElementById('addItemCustChargesType').value = strArray[13];
            document.getElementById('addItemValuation').value = strArray[14];
            document.getElementById('addItemVATTax').value = strArray[15];
            if (mainPanel == 'StockPanel')
                document.getElementById('addItemCustWastage').value = strArray[17];
            document.getElementById('addItemFinalVal').value = '';
            calItemPrice();
        }
    };
    xmlhttp.open("POST", "include/php/ogiapidt.php?preId=" + preId + "&mainPanel=" + mainPanel, true);
    xmlhttp.send();
}

/**********End code to add function to get calc by for labour charges @Author:PRIYA07OCT14*********/
/**********Start code to add function to get metal rate @Author:PRIYA10OCT14*********/
//var metalRateId1 = null;
////alert removed @auth:athu6jun17
function getMetalType(div, id, keyCodeInput, mainPanel, userId, panelName, transType, firmId, metalType, omly_value, omly_option) {
//    alert(omly_value);
//    alert(omly_option);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
//               setTimeout(getInvoiceNum(userId, panelName, transType, firmId, metalType), 100);
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('addItemMetSelBy').focus();
                document.getElementById('addItemMetSelBy').options[0].selected = true;
            }
        }
    };
    if (mainPanel == 'AddWhStockPanel' || mainPanel == 'AddStockPanel' || mainPanel == 'StockReturnPanel') {
        var documentRootPath = document.getElementById('documentRootPath').value;
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiamtsl.php?id=" + id + "&div=" + div + "&mainPanel=" + mainPanel + "&panelName=" + panelName, true);
    } else {
        xmlhttp.open("POST", "include/php/ogiamtsl.php?id=" + id + "&div=" + div + "&mainPanel=" + mainPanel + "&userId=" + userId + "&panelName=" + panelName + "&transType=" + transType + "&firmId=" + firmId + "&metalType=" + metalType + "&omly_value=" + omly_value + "&omly_option=" + omly_option, true);
    }
    xmlhttp.send();
}
//=====================================================================
// START CODE TO SET ACCOUNT NAME ACCORDING TO METAL TYPE @SIMRAN:04AUG2023//
//====================================================================
function getSellAccountName(metalType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("selAccountDiv").innerHTML = xmlhttp.responseText;

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //document.getElementById('sttr_account_id').value = '64';
    xmlhttp.open("POST", "include/php/ogspaccdv.php?metalType=" + metalType, true);
    xmlhttp.send();
}
//=====================================================================
// END CODE TO SET ACCOUNT NAME ACCORDING TO METAL TYPE @SIMRAN:04AUG2023//
//====================================================================
/**********End code to add function to get metal rate @Author:PRIYA10OCT14*********/
/*************Start code to add function for item purchase panel @Author:PRIYA10OCT14*********************/
/*************Start Change code to add function for item(imitation) purchase panel @Author:ANUJA16Feb15*********************/
/*************Start to change function to add condition for wholesale @Author:SHRI12JAN16*********************/
/*************Start code to change function to add condition for Raw Metal @Author:SHE13JAN16*********************/
/*************Start code to change condition PurchaseList panel file ogiaprlt to ogwaprlt.php @Author:GAUR05MAY16*********************/
/*************Start code to add condition stockListByParticularItem and add parameter itemName @Author: GAUR26JUL16*********************/
/*************START code to add condition RetailPurchaseList @Author: GAUR04AUG16*********************/
function searchStockList(documentRootPath, searchColumn, searchValue, selFirmId, div, panel, itemCategory, metalType, itemName, userId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'PurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwaprlt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'StockList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilsbdv.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'ImitationStockList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilsbdv.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel + "&stockPanel=ImitationStock", true); //Add panel @Author:ANUJA16Feb15
    else if (panel == 'WholeSaleStockList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwastlt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true); //Add panel @OMMODTAG SHRI_08JAN16
    else if (panel == 'WholeSaleStockItemList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwastlt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&panelName=stockListByItem", true); //Add panel @OMMODTAG SHRI_11MAY16
    else if (panel == 'stockListByParticularItem')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwastlt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName + "&panelName=stockListByParticularItem", true);
    else if (panel == 'WholeSalePurchaseList')
//        ogwaprlt
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwtprlt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'RawMetalList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmcslt.php?searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'RetailPurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrtprlt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'RawMetalSellList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmsllt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId, true);
    else if (panel == 'RawMetalPurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmpslt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId, true);
    else if (div == 'MetalToCashInvoicePurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrwspprlt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&userId=" + userId, true);
    else if (div == 'MetalToCashInvoiceSellList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrwspsrlt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&userId=" + userId, true);
    else if (panel == 'MetalToCashPurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrwwscprlt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&userId=" + userId, true);
    else
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsblt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    xmlhttp.send();
}
/*************END code to add condition RetailPurchaseList @Author: GAUR04AUG16*********************/
/*************START code to add condition RetailPurchaseList @Author: GAUR2AUG16*********************/
function sortStockList(documentRootPath, sortKeyword, selFirmId, div, panel, itemCategory, metalType, itemName, userId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'PurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwaprlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'StockList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilsbdv.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'ImitationStockList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilsbdv.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel + "&stockPanel=ImitationStock", true); //Add panel @Author:ANUJA16Feb15
    } else if (panel == 'UdhaarEMIList')
        xmlhttp.open("POST", documentRootPath + "/include/php/omuemilt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'WholeSaleStockList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwastlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true); //Add panel @OMMODTAG SHRI_08JAN16
    else if (panel == 'WholeSaleStockItemList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwastlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&panelName=stockListByItem", true); //Add panel @OMMODTAG SHRI_10MAY16
    else if (panel == 'WholeSalePurchaseList')
//    ogwaprlt
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwtprlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'stockListByParticularItem')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwastlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel + "&itemCategory=" + itemCategory + "&metalType=" + metalType + "&itemName=" + itemName + "&panelName=stockListByParticularItem", true);
    else if (panel == 'RawMetalList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmcslt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'RetailPurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrtprlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'RawMetalSellList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmsllt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId, true);
    else if (panel == 'RawMetalPurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmpslt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId, true);
    else if (panel == 'MetalToCashPurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrwwscprlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&userId=" + userId, true);
    else if (panel == 'MetalToCashInvoicePurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrwspprlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&userId=" + userId, true);
    else if (panel == 'MetalToCashInvoiceSellList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrwspsrlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&userId=" + userId, true);
    else
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsblt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    xmlhttp.send();
}
/*************end code to add condition RetailPurchaseList @Author: GAUR2AUG16*********************/
/*************Start code to add condition stockListByParticularItem and add parameter itemName @Author: GAUR26JUL16*********************/
/*************End code to change condition PurchaseList panel file ogiaprlt to ogwaprlt.php @Author:GAUR05MAY16*********************/
/**********End code to change function to add condition for Raw Metal @Author:SHE13JAN16*******************/
/*************End to change function to add condition for wholesale @Author:SHRI12JAN16*********************/
/*************End Change code to add function for item(imitation) purchase panel @Author:ANUJA16Feb15*********************/
/*************End code to add function for item purchase panel @Author:PRIYA10OCT14*********************/
/*********Start code to add function for stock navigation @Author:PRIYA13OCT14**************/
function navigateToStockPanel(documentRootPath, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
            if (panel == 'StockTallyByRFID' || panel == 'ImitationStockTallyByRFID') {
                document.getElementById("productCategory").focus();  // START THIS CODE FOR STOCK TALLY @YUVRAJ @05122022
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'StockTallyByRFID')
        // START THIS CODE FOR STOCK TALLY REPORT @YUVRAJ @28102022
        //xmlhttp.open("POST", documentRootPath + "/include/php/ogstallyRFID.php", true);
        xmlhttp.open("POST", documentRootPath + "/include/php/ogstallyRFIDNew.php?stockType=OPEN STOCK", true);
    else if (panel == 'StockTallyByRFIDReport')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogstallyRFIDReport.php", true);
    //END ADD THIS CODE FOR STOCK TALLY REPORT @YUVRAJ @28102022
    else if (panel == 'StockTally')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogstally.php", true);
    else if (panel == 'rfidTrackingReport')
        xmlhttp.open("POST", documentRootPath + "/include/php/omrfiddetect.php", true);
    else if (panel == 'ImitationStockTallyByRFID')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogimstallyRFIDNew.php?stockType=OPEN STOCK", true);
    else
        xmlhttp.open("POST", documentRootPath + "/include/php/ogismnlt.php", true);
    xmlhttp.send();
}

//conddition added for back tab of crystal list @Author:SHE14MAR15
//
//
function navigateBackToStockPanel(documentRootPath, panel, page) {
    //
    if (panel == 'WholesaleStockSearchPanel') {
        panel = 'ImitationStockPanel';
    }
    //
    loadXMLDoc(panel);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'udhaarList' || panel == 'StockList' || panel == 'RawList' || panel == 'CurrentCrystalStockList') {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else if (panel == 'retailPurchaseList') {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else if (panel == 'jwelleryPanel' || panel == 'stockList' || panel == 'mainStockPanel' || panel == 'WholsaleImitationJwelleryPanel' ||
                    panel == 'retailJwellery' || panel == 'WholsaleJwelleryPanel' || panel == 'sterlingPanel') { // CONDITION ADDED TO SHOW WHOLESALE IMITAIOTN JWELLERY,@AUTHOR:HEMA-27JULY2020
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else if (panel == 'retailJwelleryGold' || panel == 'retailJwellerySilver') {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else if (panel == 'stock') {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else if (panel == 'FineStock') {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else if (panel == 'TrendingKarigarList') {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else if (panel == 'stockTally') {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else if (panel == 'BoxMovement') {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else if (panel == 'boxPagesPrint') {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else if (panel == 'VirtualStockPanel') {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogilstdv.php?page=" + page + "&panelName=" + panel, true);
    xmlhttp.send();
}
//
//
// START Code for Back Buttons Fine Stock on Stock Panel @Author:PRIYANKA-06-07-17
function navigateBackToStockItmPanel(documentRootPath, panelName, itemCategory, itemName, metalType, stockPurity) {
    loadXMLDoc();

    var listDepth = panelName.split(";");

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (listDepth[0] == 'CurrentRawStockList')
                document.getElementById("mainMiddle").innerHTML = xmlhttp.responseText;
            else
                document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;

            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'stock') {
        if (metalType == 'Gold' || metalType == 'Silver') {
            xmlhttp.open("GET", documentRootPath + "/include/php/ogwgstlt.php?panelName=" + panelName + "&itemCategory=" + itemCategory + "&itemName=" + itemName + "&metalType=" + metalType, true);
        } else {
            metalType = 'undefined';
            xmlhttp.open("GET", documentRootPath + "/include/php/ogwgstlt.php?panelName=" + panelName + "&itemCategory=" + itemCategory + "&itemName=" + itemName + "&metalType=" + metalType, true);
        }
    } else if (listDepth[0] == 'CurrentRawStockList') {
        xmlhttp.open("GET", documentRootPath + "/include/php/ogrmprlt.php?listPanel=" + listDepth[0] + "&depth=" + listDepth[1] + "&con1=" + itemCategory + "&con2=" + itemName + "&con3=" + metalType, true);
    } else {
        xmlhttp.open("GET", documentRootPath + "/include/php/omstocitmlt.php?panelName=" + panelName + "&itemCategory=" + itemCategory + "&itemName=" + itemName + "&metalType=" + metalType + "&stockPurity=" + stockPurity, true);
    }
    xmlhttp.send();
}

// END Code for Back Buttons Fine Stock on Stock Panel @Author:PRIYANKA-06-07-17
// 
// START Code for Back Buttons CRYSTAL Stock on Stock Panel @Author:PRIYANKA-11-07-17
function navigateBackToStockCryItmPanel(documentRootPath, panelName, itemCategory, itemName, metalType) {
    //alert(panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'crystal') {
        xmlhttp.open("GET", documentRootPath + "/include/php/omwgstlt.php?panelName=" + panelName + "&itemCategory=" + itemCategory + "&itemName=" + itemName + "&metalType=" + metalType, true);
    } else {
        xmlhttp.open("GET", documentRootPath + "/include/php/omcryitmlt.php?panelName=" + panelName + "&itemCategory=" + itemCategory + "&itemName=" + itemName + "&metalType=" + metalType, true);
    }
    xmlhttp.send();
}
// END Code for Back Buttons CRYSTAL Stock on Stock Panel @Author:PRIYANKA-11-07-17
// 
// 
//***********START CODE FOR ADD FUNCTION TO GET BACK ON STELLERING STOCK AUTHOR : DIKSHA 15DEC2018***************
function navigateBackToStockStrItmPanel(documentRootPath, panelName, itemCategory, itemName, metalType) {
    //alert(panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panelName == 'strsilver') {
        xmlhttp.open("GET", documentRootPath + "/include/php/omstrgstlt.php?panelName=" + panelName + "&itemCategory=" + itemCategory + "&itemName=" + itemName + "&metalType=" + metalType, true);
    } else {
        xmlhttp.open("GET", documentRootPath + "/include/php/omstritmlt.php?panelName=" + panelName + "&itemCategory=" + itemCategory + "&itemName=" + itemName + "&metalType=" + metalType, true);
    }
    xmlhttp.send();
}

//***********END CODE FOR ADD FUNCTION TO GET BACK ON STELLERING STOCK AUTHOR : DIKSHA 15DEC2018***************
// 
// 
//end add panel retail purchase Author:GAUR2AUG16
/*********End code to add function for stock navigation @Author:PRIYA13OCT14**************/
function navToAvialStockPanel(div, panel, itemName, metalType, page) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'AvailStockList')
        xmlhttp.open("POST", "include/php/ogisavlt.php?itemName=" + itemName + "&metalType=" + metalType + "&mainPage=" + page, true);
    else if (panel == 'SoldList')
        xmlhttp.open("POST", "include/php/ogissolt.php?itemName=" + itemName + "&metalType=" + metalType + "&mainPage=" + page, true);
    xmlhttp.send();
}

//
//
function navigateBackToJewellryPanel(documentRootPath, panel, page) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'ImtPanel' || panel == 'StrPanel' || panel == 'WholesaleStockSearchPanel') {
                document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//    alert('pan===' + panel);
    if (panel == 'itemDetPanel' || panel == 'onlineOptionPanel' || panel == 'itemPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilstlt.php?divPanel=StockList&page=" + page, true);
    } else if (panel == 'jewelleryPanelSoldoutList') {   //Adding SoldOut List @author:vinod09-March2023
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilstlt.php?divPanel=SellStock&page=" + page, true);
    } else if (panel == 'WholesaleStockSearchPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilimlt.php?divPanel=imitationStockList&panelName=WholesaleStockSearchPanel&page=" + page, true);
    } else if (panel == 'ImtPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilimlt.php?divPanel=imitationStockList&panelName=jwelleryPanel&page=" + page, true);
    } else if (panel == 'StrPanel') { // FOR STERLING PANEL BACK FUNCTION AUTHOR : DIKSHA 31DEC2018
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilimlt.php?divPanel=StrlleringStockList&panelName=sterlingPanel&page=" + page, true);
    } else if (panel == 'WholsaleJwelleryPanel' || panel == 'WholsaleImitationJwelleryPanel') { //CONDITION ADDED TO SHOW WHOLESALE IMITATION STOCK,@AUTHOR:HEMA-27JULY2020
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilimlt.php?page=" + page + "&panelName=" + panel, true);
    } else if (panel == 'VirtualStockPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogvirstoption.php?page=" + page + "&panelName=" + panel, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilimdv.php?page=" + page, true);
    }
    xmlhttp.send();
}

//
//
function pagingForStockPanel(pageNo, panel, rowsPerPage, noOfPagesAsLink, selFirmId, sortKeyword, searchColumn, searchValue, div, metalTp, metalName, mainPage) {
    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.barcode_search.barcode_text.focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                if (pageNo >= 10) {
                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        if (panel == 'AvailStockList') {
            xmlhttp.open("POST", "include/php/ogisavlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn +
                    "&searchValue=" + searchValue + "&searchValue=" + searchValue + "&panel=" + panel + "&metalType=" + metalTp + "&itemName=" + metalName + "&mainPage=" + mainPage, true);
        } else if (panel == 'SoldList') {
            xmlhttp.open("POST", "include/php/ogissolt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn +
                    "&searchValue=" + searchValue + "&searchValue=" + searchValue + "&panel=" + panel + "&metalType=" + metalTp + "&itemName=" + metalName + "&mainPage=" + mainPage, true);
        }
        xmlhttp.send();
    }
}

/********Start code to comment xmlhttp @Author:PRIYA22MAY14**************/
var docRoot;
/************Start code to add condition @Author:PRIYA15DEC14************************/
function getTransFirmSerialNo(documentRootPath, selectedFirmNo, transPanel)
{
    //alert('kkkkkkkk');
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            var str = xmlhttp2.responseText;
            var strArray = new Array();
            strArray = str.split("*");
            document.getElementById("girviTransPreSerialNo").value = strArray[0];
            document.getElementById("girviTransSerialNo").value = strArray[1];
            if (transPanel != 'transToML')
                getFirmAccountNo(selectedFirmNo, 'TransferGirviPanel');
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var poststr = "firmNo=" + encodeURIComponent(selectedFirmNo);
    xmlhttp2.open("POST", documentRootPath + "/include/php/omgtsrno.php?" + poststr, true);
    xmlhttp2.send();
}

/************End code to add condition @Author:PRIYA15DEC14************************/
/********End code to comment xmlhttp @Author:PRIYA22MAY14**************/
/********Strat update code to remove fontSize @Author:GAUR14SEP16**************/
/********Strat update code to add barcodeSize @Author:GAUR09SEP16**************/
/********Strat code to add font size @Author:GAUR04MAY16**************/
function update55BarCode(omLayoutOptionTop, omLayoutOptionTopValue, omLayoutOptionLeft, omLayoutOptionLeftValue,
        slipWidth, slipWidthValue, slipHeight, slipHeightValue, textAlign, textAlignValue, barcodeSize, barcodeSizeValue, tailLength, tailLengthValue,
        caption1, caption2, caption3, caption4, caption5, caption6, caption7, caption8, caption9, caption10, panel) {
    loadXMLDoc();
//    alert(panel);
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
            + '&slipWidth=' + slipWidth + '&slipWidthValue=' + slipWidthValue
            + '&slipHeight=' + slipHeight + '&slipHeightValue=' + slipHeightValue
            + '&textAlign=' + textAlign + '&textAlignValue=' + textAlignValue
            + '&barcodeSize=' + barcodeSize + '&barcodeSizeValue=' + barcodeSizeValue
            + '&tailLength=' + tailLength + '&tailLengthValue=' + tailLengthValue + '&captionvalue1=' + caption1 +
            '&captionvalue2=' + caption2 + '&captionvalue3=' + caption3 + '&captionvalue4=' + caption4 + '&captionvalue5=' + caption5 + '&captionvalue6=' + caption6
            + '&captionvalue7=' + caption7 + '&captionvalue8=' + caption8 + '&captionvalue9=' + caption9 + '&captionvalue10=' + caption10 + '&panel=' + panel;
    xmlhttp.open("POST", "include/php/ombcbcup.php?" + postStr, true);
    xmlhttp.send();
}

/********END code to add font size @Author:GAUR04MAY16**************/
/********END update code to add barcodeSize @Author:GAUR09SEP16**************/
/********END update code to remove fontSize @Author:GAUR14SEP16**************/



function update55imiBarCode(omLayoutOptionTop, omLayoutOptionTopValue, omLayoutOptionLeft, omLayoutOptionLeftValue,
        slipWidth, slipWidthValue, slipHeight, slipHeightValue, textAlign, textAlignValue, barcodeSize, barcodeSizeValue, tailLength, tailLengthValue,
        caption1, caption2, caption3, caption4, caption5, caption6, caption7, caption8, caption9, caption10, panel) {
    loadXMLDoc();
    //alert(panel);
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
            + '&slipWidth=' + slipWidth + '&slipWidthValue=' + slipWidthValue
            + '&slipHeight=' + slipHeight + '&slipHeightValue=' + slipHeightValue
            + '&textAlign=' + textAlign + '&textAlignValue=' + textAlignValue
            + '&barcodeSize=' + barcodeSize + '&barcodeSizeValue=' + barcodeSizeValue
            + '&tailLength=' + tailLength + '&tailLengthValue=' + tailLengthValue + '&captionvalue1=' + caption1 +
            '&captionvalue2=' + caption2 + '&captionvalue3=' + caption3 + '&captionvalue4=' + caption4 + '&captionvalue5=' + caption5 + '&captionvalue6=' + caption6
            + '&captionvalue7=' + caption7 + '&captionvalue8=' + caption8 + '&captionvalue9=' + caption9 + '&captionvalue10=' + caption10 + '&panel=' + panel;
    xmlhttp.open("POST", "include/php/ombcbcup.php?" + postStr, true);
    xmlhttp.send();
}



/*****************Start code to add function to update time period @Author:PRIYA03NOV14****************/
function validateUpdateGirviOtherInfo() {
    if (validateEmptyField(document.getElementById("girviOtherInfo").value, "Please enter Girvi Other Info!") == false) {
        document.getElementById("girviOtherInfo").focus();
        return false;
    }
    return true;
}
//**************************************************************************************************
// START CODE TO ADD FUNCTION FOR LOAN AUTO BARCODE PRINT @SIMRAN:05SEPT2023
//**************************************************************************************************
function printOneAllLabelLoanBarcodeByGirvId(girviId, systemOnOrOff, sysLocalDBRemote, prnPrintOption) {
    var panel = 'Items55x13LoanBarCodePanel';
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("LoanAllLabelsDivs").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", "include/php/olggbc55x13" + default_theme + ".php?girviId=" + girviId + "&panel=" + panel + "&prnPrintOption=" + prnPrintOption, true);
    xmlhttp.send();
}
//**************************************************************************************************
// END CODE TO ADD FUNCTION FOR LOAN AUTO BARCODE PRINT @SIMRAN:05SEPT2023
//**************************************************************************************************

function updateGirviTimePeriod(documentRootPath, custId, girviId, timePeriod, girviJrnlId, girviDOB, girviFirmId, girviSerialNum) {
    loadXMLDoc();
    if (validateEmptyField(document.getElementById("updateTimePeriod").value, "Please enter Time Period!") == false) {
        document.getElementById("updateTimePeriod").focus();
        return false;
    } else {
        confirm_box = confirm("Do you really want to update Time Period?");
        if (confirm_box == true)
        {
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                }
            }
            var poststr = "timePeriod=" + timePeriod + "&custId=" + custId + "&girviId=" + girviId
                    + "&girviJrnlId=" + girviJrnlId
                    + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum;
        }
    }
    xmlhttp.open("POST", "include/php/oltpupdv.php?" + poststr, true);
    xmlhttp.send();
    return false;
}

/*****************End code to add function to update time period @Author:PRIYA03NOV14****************/
/*********Start code to add panel @Author:PRIYA23JUL14****************/
/*********Start code to add condition for raw panel @Author:SHE06APR16****************/
function showSelPageInStockList(pageNo, panel, rowsPerPage, start, end, wtTp, metalTp, metalName, noOfPagesAsLink) {
//    alert(panel);
    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (panel == 'CurrentRawStockList' || panel == 'RawSellList' || panel == 'PurchaseRawStockList') {
                    document.getElementById("rawMetalStockListDiv").innerHTML = xmlhttp.responseText;
                    if (pageNo >= 10) {
                        setPageValue(pageNo, noOfPagesAsLink);
                    } else {
                        document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                    }
                } else if (panel == 'ItemStockList' || panel == 'PurchaseList' || panel == 'CustSellList' || panel == 'StockPanel') {
                    if (panel == 'ItemStockList') {
                        document.getElementById("addStockCurrentInvoice").innerHTML = xmlhttp.responseText;
                    } else if (panel == 'PurchaseList') {
                        document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
                    } else if (panel == 'CustSellList') {
                        document.getElementById("custSellList").innerHTML = xmlhttp.responseText;
                    } else if (panel == 'StockPanel') {
                        document.getElementById("stockListSubDiv").innerHTML = xmlhttp.responseText;
                    }
                    if (pageNo >= 10) {
                        setPageValue(pageNo, noOfPagesAsLink);
                    } else {
                        document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                    }
                } else {
                    document.getElementById("repairedItemListDiv").innerHTML = xmlhttp.responseText;
                }
            }
        };
        if (panel == 'CurrentRawStockList' || panel == 'RawSellList' || panel == 'PurchaseRawStockList') {
            xmlhttp.open("POST", "include/php/ogrmprlt.php?page=" + pageNo + "&listPanel=" + panel + "&rowsPerPage=" + rowsPerPage + "&startRange=" + start + "&endRange=" + end + "&itemName=" + metalName + "&stockItemMetal=" + metalTp + "&metalWt=" + wtTp, true);
        } else if (panel == 'ItemStockList') {
            xmlhttp.open("POST", "include/php/ogilsbdv.php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&startRange=" + start + "&endRange=" + end +
                    "&itemName=" + metalName + "&stockItemMetal=" + metalTp + "&metalWt=" + wtTp + "&searchPanel=" + panel + "&stockPanel=ImitationStock", true); //Add panel Imitation @Author:ANUJA17Feb15
//        }
//        else if (panel == 'ItemStockList') {
//            xmlhttp.open("POST", "include/php/ogilsbdv.php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&startRange=" + start + "&endRange=" + end +
//                    "&itemName=" + metalName + "&stockItemMetal=" + metalTp + "&metalWt=" + wtTp + "&searchPanel=" + panel, true);
        } else if (panel == 'PurchaseList') {
            xmlhttp.open("POST", "include/php/ogiaprlt.php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel, true);
        } else if (panel == 'CustSellList') {
            xmlhttp.open("POST", "include/php/ogprstlt.php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel, true);
        } else if (panel == 'StockPanel') {
            xmlhttp.open("POST", "include/php/ogismnlt.php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage + "&panel=" + panel, true);
        } else {
            xmlhttp.open("POST", "include/php/ogrpilst.php?page=" + pageNo + "&panel=" + panel + "&rowsPerPage=" + rowsPerPage, true);
        }
        xmlhttp.send();
    }
}

/*********End code to add condition for raw panel @Author:SHE06APR16****************/
/*********End code to add panel @Author:PRIYA23JUL14****************/
/*********End code to change div @Author:PRIYA04JUN14*******************/
/*********End code to add div @Author:PRIYA25DEC13*******************/
/*********End code to add div @Author:PRIYA24DEC13*******************/
/*******End To implement paging in stock list @AUTHOR: SANDY30OCT13***********************/
/*********End of changes in function showSelPageInStockList @AUTHOR: SANDY31OCT13******************/
/*********End of changes in function showSelPageInStockList @AUTHOR: SANDY9NOV13******************/

/*********Start of changes in function setPageValue @AUTHOR: SANDY31OCT13******************/
/*********Start to add subfunction called while paging @AUTHOR: SANDY30OCT13************/
function setPageValue(pageNo, noOfPagesAsLink) {
    var nextPageNo = pageNo;
    var prePageNo = pageNo;
    var diff = parseInt(noOfPagesAsLink) - parseInt(pageNo);
    var newPageNo = 10 - parseInt(diff);
    var prvPages = parseInt(newPageNo) - 1;
    var pageId;
    if (diff <= 5) {
        for (pageId = newPageNo; pageId <= 10; pageId++) {
            document.getElementById('pageNoTextField' + pageId).value = prePageNo;
            if (pageNo == prePageNo) {
                document.getElementById('pageNoTextField' + pageId).setAttribute("class", "currentPageNoButton");
            }
            prePageNo = parseInt(prePageNo) + 1;
        }
        for (pageId = prvPages; pageId > 0; pageId--) {
            document.getElementById('pageNoTextField' + pageId).value = parseInt(nextPageNo) - 1;
            nextPageNo = parseInt(nextPageNo) - 1;
        }
    } else {
        document.getElementById('pageNoTextField' + 5).value = pageNo;
        document.getElementById('pageNoTextField' + 5).setAttribute("class", "currentPageNoButton");
        for (pageId = 6; pageId <= 10; pageId++) {
            document.getElementById('pageNoTextField' + pageId).value = parseInt(nextPageNo) + 1;
            nextPageNo = parseInt(nextPageNo) + 1;
        }
        for (pageId = 4; pageId > 0; pageId--) {
            document.getElementById('pageNoTextField' + pageId).value = parseInt(prePageNo) - 1;
            prePageNo = parseInt(prePageNo) - 1;
        }
    }
}

/*********End to add subfunction called while paging @AUTHOR: SANDY30OCT13************/
/*********Start code to add paging in udhaar list @Author:PRIYA03NOV14****************/
function pagingInUdhaarPanel(pageNo, panel, searchOption, rowsPerPage, noOfPagesAsLink) {
    //alert(panel);
    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("udhharListDiv").innerHTML = xmlhttp.responseText;
                if (pageNo >= 10) {
                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            }
        }
    }
    if (panel == 'UdhaarCityList')
        xmlhttp.open("POST", "include/php/omusctdv.php?page=" + pageNo + "&searchOption=" + searchOption + "&rowsPerPage=" + rowsPerPage, true);
    else if (panel == 'UdhaarCustList')
        xmlhttp.open("POST", "include/php/omuucclt.php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage, true);
    else if (panel == 'ExpiredCustList')
        xmlhttp.open("POST", "include/php/omuuexll.php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage, true); ////added panel @auth:Athu16JAN17
    else if (panel == 'AdvMoneyList')
        xmlhttp.open("POST", "include/php/omadmnlt.php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage, true);
    else
        xmlhttp.open("POST", "include/php/omuulstp.php?page=" + pageNo + "&rowsPerPage=" + rowsPerPage, true);
    xmlhttp.send();
}

/*********End code to add paging in udhaar list @Author:PRIYA03NOV14****************/
/********End code to comment xmlhttp @Author:PRIYA22MAY14**************/
function update20By12BarCode(omLayoutOptionTop, omLayoutOptionTopValue, omLayoutOptionLeft, omLayoutOptionLeftValue,
        slipWidth, slipWidthValue, slipHeight, slipHeightValue, slipNoOfCols, slipNoOfColsValue, slipNoOfRows, slipNoOfRowsValue, omLayoutOptionBcSize, omLayoutOptionBcSizeValue) {
    //alert();
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
            + '&slipWidth=' + slipWidth + '&slipWidthValue=' + slipWidthValue
            + '&slipHeight=' + slipHeight + '&slipHeightValue=' + slipHeightValue
            + '&noOfCols=' + slipNoOfCols + '&noOfColsValue=' + slipNoOfColsValue
            + '&noOfRows=' + slipNoOfRows + '&noOfRowsValue=' + slipNoOfRowsValue
            + '&20x12barcodeSize=' + omLayoutOptionBcSize + '&20x12barcodeSizeValue=' + omLayoutOptionBcSizeValue;
    xmlhttp.open("POST", "include/php/ombcbcup.php?" + postStr, true);
    xmlhttp.send();
}

/*****************Start code to add function to update time period @Author:PRIYA03NOV14****************/
/*****************Start code to add function to add barcode item id @Author:PRIYA05NOV14**********************/
function getItemInBCPanel(itemId, itemId1) {
    if (itemId == "" && itemId1 == "") {
        alert("Please Enter Item Id 1!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("barCodePrintPanelDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogib55x13twdv.php?itemId=" + itemId + "&itemId1=" + itemId1, true);
        xmlhttp.send();
    }
}

/*****************End code to add function to add barcode item id @Author:PRIYA05NOV14**********************/
/*******Start code to add function for number of rows @Author:PRIYA11NOV14**********************/
/*******Start code to update @Author:GAUR19OCT16**********************/
function showNumberOfRows(documentRootPath, rowsPerPage, selFirmId, sortKeyword, pageNum, searchColumn, searchValue, updateRows, div)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (updateRows == 'updateSoldInvRows') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsblt.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
                "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows, true);
    } else if (updateRows == 'updateImtSoldInvRows') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogsipsblt.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
                "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows, true);
    } else if (updateRows == 'MainStockUpdateRows') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogismnlt.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
                "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows, true);
    }
    xmlhttp.send();
}

/*******END code to update @Author:GAUR19OCT16**********************/
/*******End code to add function for number of rows @Author:PRIYA11NOV14**********************/
/*****************Start code to add EMI @Author:PRIYA12NOV14*******************/
function change_Udhaar_EMI_ROI_Opt_Add(url) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertchangeUdhaarEMIROIOptAdd;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send();
}

/************Start code to add delay func @Author:PRIYA11SEP13********************/
function alertchangeUdhaarEMIROIOptAdd() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("ROIOption").innerHTML = xmlhttp.responseText;
        document.getElementById('selROIValue').focus();
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}

function changeUdhaarEMIROIOpt(selectROIType, obj, panelName) {
    roiOption = selectROIType.value;
    change_Udhaar_EMI_ROI_Opt_Add('include/php/omuemroi.php?roiOption=' + roiOption + "&omPanelDiv=" + panelName); //change in filename @AUTHOR: SANDY20NOV13
    return false;
}

/*********Start code to add validation of accounts @Author:SHRI04JUL15***************************/
function validateAddUdhaarEMIInputs() {
    if (validateEmptyField(document.getElementById("udhaarMainAmount").value, "Please enter Udhaar Amount!") == false ||
            validateNum(document.getElementById("udhaarMainAmount").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("udhaarMainAmount").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBDay").value, "Please select Day!") == false) {
        document.getElementById("DOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Month!") == false) {
        document.getElementById("DOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select Year!") == false) {
        document.getElementById("DOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("interestType").value, "Please select Interest Type!") == false) {
        document.getElementById("interestType").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("udhaarSerialNo").value, "Please enter Serial Number!") == false ||
            validateNum(document.getElementById("udhaarSerialNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("udhaarSerialNo").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("selROI").value, "Please Select ROI!") == false) {
        document.getElementById("selROI").focus();
        return false;
    } else if (validateSelectField(document.getElementById("udhharFirmId").value, "Please select Udhaar Firm Id!") == false) {
        document.getElementById("udhharFirmId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("udhaarEMINoOfDays").value, "Please enter Udhaar EMI Number of days!") == false) {
        document.getElementById("udhaarEMINoOfDays").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("udhaarEMIOccurrences").value, "Please enter Udhaar EMI Occurrences!") == false) {
        document.getElementById("udhaarEMIOccurrences").focus();
        return false;
    } else if (validateSelectField(document.getElementById("udhaarPayAccId").value, "Please select Payment Account!") == false) {
        document.getElementById("udhaarPayAccId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("udhaarDrAccId").value, "Please select Cr Account!") == false) {
        document.getElementById("udhaarDrAccId").focus();
        return false;
    }
    return true;
}

/*********End code to add validation of accounts @Author:SHRI04JUL15***************************/
/***********Start code to add validation for accounts @Author:SHRI04JUL15******************/
function valAddUdhaarOnPurEMIInputs() {
    if (document.getElementById("panelName").value == 'UpdateUdhaar') {
        if (udahaarItemCount == '' || udahaarItemCount == undefined) {
            udahaarItemCount = document.getElementById("udhaarItemDivCounter").value;
        }
    }
    if (validateEmptyField(document.getElementById("udhaarMainAmount").value, "Please enter Udhaar Amount!") == false ||
            validateNum(document.getElementById("udhaarMainAmount").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("udhaarMainAmount").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBDay").value, "Please select Day!") == false) {
        document.getElementById("DOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth").value, "Please select Month!") == false) {
        document.getElementById("DOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear").value, "Please select Year!") == false) {
        document.getElementById("DOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("interestType").value, "Please select Interest Type!") == false) {
        document.getElementById("interestType").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("udhaarSerialNo").value, "Please enter Serial Number!") == false ||
            validateNum(document.getElementById("udhaarSerialNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("udhaarSerialNo").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("selROI").value, "Please Select ROI!") == false) {
        document.getElementById("selROI").focus();
        return false;
    } else if (validateSelectField(document.getElementById("udhharFirmId").value, "Please select Udhaar Firm Id!") == false) {
        document.getElementById("udhharFirmId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("udhaarEMINoOfDays").value, "Please enter Udhaar EMI Number of days!") == false) {
        document.getElementById("udhaarEMINoOfDays").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("udhaarEMIOccurrences").value, "Please enter Udhaar EMI Occurrences!") == false) {
        document.getElementById("udhaarEMIOccurrences").focus();
        return false;
    } else if (udahaarItemCount != '') {
        udhaarItemEntered = 0;
        for (var dc = 1; dc <= udahaarItemCount; dc++) {
            if (document.getElementById("udhaarItemDel" + dc).value != 'Deleted') {
                if (validateEmptyField(document.getElementById("itemName" + dc).value, "Please select Item Name " + dc + "!") == false) {
                    document.getElementById("itemName" + dc).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("udhaarItemVal" + dc).value, "Please enter Item Valuation " + dc + "!") == false ||
                        validateNumWithDot(document.getElementById("udhaarItemVal" + dc).value, "Accept only numeric characters without space character " + dc + "!") == false) {
                    document.getElementById("udhaarItemVal" + dc).focus();
                    return false;
                }
                udhaarItemEntered++;
            }
        }
        document.getElementById("noOfUdhaarItems").value = udhaarItemEntered;
    } else if (validateSelectField(document.getElementById("udhaarPayAccId").value, "Please select Payment Account!") == false) {
        document.getElementById("udhaarPayAccId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("udhaarDrAccId").value, "Please select Cr Account!") == false) {
        document.getElementById("udhaarDrAccId").focus();
        return false;
    }
    return true;
}

/***********End code to add validation for accounts @Author:SHRI04JUL15******************/
/***********Start code to add alert for occ @Author:PRIYA08DEC14******************/
/***********Start code to add condition @Author:PRIYA11DEC14****************************/
function addNewUdhaarEMI() {
    if (document.getElementById("paidCounter").value > 0) {
        alert("You can not update details after EMI has been paid !");
        return false;
    } else if ((document.getElementById("udhaarId").value != '') && (document.getElementById("udharOccCheck").value != document.getElementById("udhaarEMIOccurrences").value)) {
        alert("You can not update EMI occurences, once added!");
        return false;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("addUdhaarSubButDiv").style.visibility = "hidden";
        var uType = document.getElementById("udhaarType").value;
        if (uType == 'OnPurchase') {
            if (valAddUdhaarOnPurEMIInputs()) {
                return true;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addUdhaarSubButDiv").style.visibility = "visible";
                return false;
            }
        } else {
            if (validateAddUdhaarEMIInputs()) {
                return true;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addUdhaarSubButDiv").style.visibility = "visible";
            }
        }
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addUdhaarSubButDiv").style.visibility = "visible";
        return false;
    }
    return false;
}

/***********End code to add condition @Author:PRIYA11DEC14****************************/
/***********End code to add alert for occ @Author:PRIYA08DEC14******************/
/*****************End code to add EMI @Author:PRIYA12NOV14*******************/
/***************Start code to add function for udhaar EMI @Author:PRIYA13NOV14****************/
/*************Start code to add condition to check previous EMI status @Author:SHRI13JUN15*****************/
function passEMIValues(emiNo, emiPaidDD, emiPaidMM, emiPaidYY, emiAmt, emiStatus, serialNo, custId, firmId, udhaarId,
        udhaarDOB, uDepId, uDepJrnlId, emiOccur, uEMIIntAmt, uEMIAmt, prevEMIStatus, currEMIStatus) {
//            alert(prevEMIStatus+'-'+currEMIStatus);
    if (validateSelectField(document.getElementById("DOBDay" + uDepId + emiNo).value, "Please select Day!") == false) {
        document.getElementById("DOBDay" + uDepId + emiNo).focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBMonth" + uDepId + emiNo).value, "Please select Month!") == false) {
        document.getElementById("DOBMonth" + uDepId + emiNo).focus();
        return false;
    } else if (validateSelectField(document.getElementById("DOBYear" + uDepId + emiNo).value, "Please select Year!") == false) {
        document.getElementById("DOBYear" + uDepId + emiNo).focus();
        return false;
    } else if (prevEMIStatus == 'Due' && currEMIStatus != 'Paid') {
        alert("Please pay previous all EMI");
        return false;
    } else {

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
            var emiPaidDate = emiPaidDD + ' ' + emiPaidMM + ' ' + emiPaidYY;
            var poststr = "emiNo=" + emiNo
                    + "&emiPaidDate=" + emiPaidDate
                    + "&emiAmt=" + emiAmt
                    + "&emiStatus=" + emiStatus
                    + "&serialNo=" + serialNo
                    + "&custId=" + custId
                    + "&firmId=" + firmId
                    + "&udhaarId=" + udhaarId
                    + "&udhaarDOB=" + udhaarDOB
                    + "&uDepId=" + uDepId
                    + "&uDepJrnlId=" + uDepJrnlId
                    + "&emiOccur=" + emiOccur
                    + "&uEMIIntAmt=" + uEMIIntAmt
                    + "&uEMIAmt=" + uEMIAmt;
            xmlhttp.open("POST", "include/php/omuemiin.php?" + poststr, true);
            xmlhttp.send();
        }
    }
}

/*************End code to add condition to check previous EMI status @Author:SHRI13JUN15*****************/
/***************End code to add function for udhaar EMI @Author:PRIYA13NOV14****************/
function searchUdhaarEMIByPeriod(timePeriod, sortKeyword, searchColumn, searchValue) {
    loadXMLDoc();
    if (validateEmptyField(timePeriod, "Please enter Months!") == false ||
            validateNum(timePeriod, "Accept only Numbers!") == false) {
        //expGirviFrm.expGrvMonths.focus();
    } else {
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("udhharListDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omuemilt.php?timePeriod=" + timePeriod + "&sortKeyword=" + sortKeyword +
                "&searchColumn=" + searchColumn + "&searchValue=" + searchValue, true);
        xmlhttp.send();
    }
}

/*********Start code to add condition for panel  @OMMODTAG SHRI_08AUG15 ***********************/
function pagingInUdhaarEMIPanel(pageNo, panel, searchOption, rowsPerPage, noOfPagesAsLink, panelName, sortKeyword, searchColumn, searchValue) {
//    alert(panelName);//alert commented @OMMODTAG SHRI_12AUG15
    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("udhharListDiv").innerHTML = xmlhttp.responseText;
                if (pageNo >= 10) {
                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            }
        }
    }
    if (panelName == 'emiList') {
        xmlhttp.open("POST", "include/php/omsemilt.php?page=" + pageNo + "&timePeriod=" + searchOption + "&rowsPerPage=" + rowsPerPage + "&panel=" + panelName + "&sortKeyword=" + sortKeyword +
                "&searchColumn=" + searchColumn + "&searchValue=" + searchValue, true);
    } else {
        xmlhttp.open("POST", "include/php/omuemilt.php?page=" + pageNo + "&timePeriod=" + searchOption + "&rowsPerPage=" + rowsPerPage + "&panel=" + panelName + "&sortKeyword=" + sortKeyword +
                "&searchColumn=" + searchColumn + "&searchValue=" + searchValue, true);
    }
    xmlhttp.send();
}

/*********End code to add condition for panel  @OMMODTAG SHRI_08AUG15 ***********************/
function showNumberOfRowsInUdhaar(documentRootPath, rowsPerPage, pageNum, updateRows, div, timePeriod, sortKeyword, searchColumn, searchValue)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omuemilt.php?rowsPerPage=" + rowsPerPage + "&updateRows=" + updateRows + "&timePeriod=" +
            timePeriod + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue, true);
    xmlhttp.send();
}

function searchUdhaarEMIList(documentRootPath, searchColumn, searchValue, selFirmId, div, panel, timePeriod) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omuemilt.php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel + "&timePeriod=" + timePeriod, true);
    xmlhttp.send();
}

function sortUdhaarEMIList(documentRootPath, sortKeyword, selFirmId, div, panel, timePeriod) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omuemilt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel + "&timePeriod=" +
            timePeriod, true);
    xmlhttp.send();
}

function getItemInSellLotByPreId(preId, keyCodeInput) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('itemPreIdSelectDiv').innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('itemPreIdListToSel').focus();
                document.getElementById('itemPreIdListToSel').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogspslis.php?preId=" + preId, true);
    xmlhttp.send();
}

function getItemDetailsInSellLotByPreId(preId, mainPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            var strArray = new Array();
            strArray = str.split("*");
            document.getElementById('addItemId').value = strArray[0];
            document.getElementById('addItemName').value = strArray[1];
            document.getElementById('addItemCategory').value = strArray[2];
            document.getElementById('addItemPieces').value = strArray[3];
            document.getElementById('addItemFineWeight').value = strArray[4];
            document.getElementById('addItemTunch').value = strArray[5];
            // document.getElementById('addItemFinalTunch').value = strArray[6];
            document.getElementById('addItemCustCharges').value = strArray[6];
            document.getElementById('addItemCustChargesType').value = strArray[7];
            document.getElementById('addItemValuation').value = strArray[8];
            document.getElementById('addItemVATTax').value = strArray[9];
            document.getElementById('addItemMetal').value = strArray[10];
            document.getElementById('addItemPreId').value = strArray[11];
            if (strArray[13] != undefined) {
                document.getElementById('addItemGrossWeight').value = strArray[12];
                document.getElementById('addItemNetWeight').value = strArray[13];
            } else {
                document.getElementById('addItemGrossWeight').value = '';
                document.getElementById('addItemNetWeight').value = '';
            }
            if (mainPanel == 'WholeSale') {
                document.getElementById('addItemWastage').value = strArray[14];
                document.getElementById('addItemFFineWeight').value = strArray[15];
            }
            calculateSellLotPrice();
        }
    };
    xmlhttp.open("POST", "include/php/ogiapidt.php?preId=" + preId + "&mainPanel=" + mainPanel, true);
    xmlhttp.send();
}

/*******Start code to add validation for metal type @Author:PRIYA21MAR15********************/
/*******Start code to add comment item id validation @Author:PRIYA08APR15********************/
function validateAddSellLotItemInputs() {
//    alert(document.getElementById('upPanel').value);
    if (document.getElementById('upPanel').value == 'UpPanel' || document.getElementById('upPanel').value == 'WholeSaleUpPanel') {
        if (noOfCrystal == '' || noOfCrystal == undefined) {
            noOfCrystal = document.getElementById("noOfCry").value;
        }
    }
    if (validateSelectField(document.getElementById("addItemDOBDay").value, "Please select Day!") == false) {
        document.getElementById("addItemDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBMonth").value, "Please select Month!") == false) {
        document.getElementById("addItemDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBYear").value, "Please select Year!") == false) {
        document.getElementById("addItemDOBYear").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addItemInvoiceNo").value, "Please enter Invoice Number!") == false ||
            validateNum(document.getElementById("addItemInvoiceNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("addItemInvoiceNo").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("accountId").value, "Please select Account Name!") == false) {
        document.getElementById("accountId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemMetal").value, "Please select Metal!") == false) {
        document.getElementById("addItemMetal").focus();
        return false;
    } else if ((document.getElementById("addItemMetal").value != 'Other') && validateEmptyField(document.getElementById("addItemMetalRate").value, "Please enter Metal Rate!") == false) {
        document.getElementById("addItemMetalRate").focus();
        return false;
    }
//    else if (validateEmptyField(document.getElementById("addItemId").value, "Please enter Item Id!") == false ||
//            validateNum(document.getElementById("addItemId").value, "Accept only numeric characters without space character!") == false) {
//        document.getElementById("addItemId").focus();
//        return false;
//    }
    else if (validateEmptyField(document.getElementById("addItemName").value, "Please enter Item Name!") == false) {
        document.getElementById("addItemName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addItemPieces").value, "Please enter Item Pieces!") == false ||
            validateNum(document.getElementById("addItemPieces").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("addItemPieces").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addItemGrossWeight").value, "Please enter Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("addItemGrossWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("addItemGrossWeight").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addItemNetWeight").value, "Please enter Net Weight!") == false ||
            validateNumWithDot(document.getElementById("addItemNetWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("addItemNetWeight").focus();
        return false;
    } else if ((document.getElementById("addItemMetal").value != 'Other') && validateSelectField(document.getElementById("addItemTunch").value, "Please select Item Tunch or Purity!") == false) {
        document.getElementById("addItemTunch").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addItemFinalVal").value, "Please enter Item Final Valuation!") == false ||
            validateNumWithDot(document.getElementById("addItemFinalVal").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("addItemFinalVal").focus();
        return false;
    } else if (noOfCrystal != '' && noOfCrystal != undefined && noOfCrystal != '0') {
        cryEntered = 0;
        for (var cry = 1; cry <= noOfCrystal; cry++) {
            if (document.getElementById("del" + cry).value != 'Deleted') {
                if (validateEmptyField(document.getElementById("slPrCryId" + cry).value, "Please enter Crystal Id " + cry + "!") == false) {
                    document.getElementById("slPrCryId" + cry).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("slPrCryGSW" + cry).value, "Please enter Crystal Weight " + cry + "!") == false) {
                    document.getElementById("slPrCryGSW" + cry).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("slPrCryRate" + cry).value, "Please enter Crystal Rate " + cry + "!") == false) {
                    document.getElementById("slPrCryRate" + cry).focus();
                    return false;
                } else if (validateEmptyField(document.getElementById("slPrCryVal" + cry).value, "Please enter Crystal Valuation " + cry + "!") == false) {
                    document.getElementById("slPrCryVal" + cry).focus();
                    return false;
                }
                cryEntered++;
            }
        }
        document.getElementById("addItemCryCount").value = cryEntered;
    }
    return true;
}

/*******End code to add comment item id validation @Author:PRIYA08APR15********************/
/*******End code to add validation for metal type @Author:PRIYA21MAR15********************/
/*******Start  code to add braces in if condition for wholesale @Author:ANUJA14MAY15********************/
function addSellLotItem() {
    if ((document.getElementById("upPanel").value == 'WholeSaleUpPanel' || document.getElementById("upPanel").value == 'SellLotDetUpPanel') && document.getElementById("invoiceRow").value > 0) {
        alert('You can not update this Item');
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("addItemSubButtDiv").style.visibility = "hidden";
        var itemDateDay = document.getElementById("addItemDOBDay").value;
        var itemDateMMM = document.getElementById("addItemDOBMonth").value;
        var itemDateYY = document.getElementById("addItemDOBYear").value;
        var itemDateStr = document.getElementById("addItemDOBMonth").value + ' ' + document.getElementById("addItemDOBDay").value + ', ' + document.getElementById("addItemDOBYear").value;
        var itemDate = new Date(itemDateStr); // stock Date
        var todayDate = new Date(); // Today Date

        var milliStockDate = itemDate.getTime();
        var milliTodayDate = milliStockDate;
        var datesDiff = milliTodayDate - milliStockDate;
        if (datesDiff < 0) {
            alert('Please Select the correct Date!');
            document.getElementById("addItemDOBDay").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addItemSubButtDiv").style.visibility = "visible";
            return false;
        } else {
            if (itemDateMMM == 'FEB' || itemDateMMM == 'APR' || itemDateMMM == 'JUN' || itemDateMMM == 'SEP' || itemDateMMM == 'NOV') {
                if (itemDateMMM == 'FEB' && itemDateDay > 29 && itemDateYY % 4 == 0) {
                    alert('Please select correct Date, Month ' + itemDateMMM + ' for this selected year has only max 29 days.');
                    document.getElementById("addItemDOBDay").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                    return false;
                }
                if (itemDateMMM == 'FEB' && itemDateDay > 28 && itemDateYY % 4 != 0) {
                    alert('Please select correct Date, Month ' + itemDateMMM + ' for this selected year has only max 28 days.');
                    document.getElementById("addItemDOBDay").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                    return false;
                }
                if (itemDateDay > 30) {
                    alert('Please select correct Date, Month ' + itemDateMMM + ' has only max 30 days.');
                    document.getElementById("addItemDOBDay").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("addItemSubButtDiv").style.visibility = "visible";
                    return false;
                }
            }

//            if (document.getElementById('payButClickId').value == 'true') {
//                if (validateRawMetInputs()) { //validation added @Author:SHRI12MAY16
//                    var prefix = document.getElementById("prefix").value;
//                    var payPanelName = document.getElementById("upPanel").value;
//                    if (payPanelName == 'AddPanel') {
//                        document.getElementById("totMetal").value = getMetalDiv;
//                    } else if (payPanelName == 'UpPanel') {
//                        document.getElementById("totMetal").value = document.getElementById("noOfRawMet").value;
//                    }
//                    return true;
//                }
//            } else 
            if (document.getElementById('saveButClickId').value == 'true') {
                var prefix = document.getElementById("prefix").value;
                var payPanelName = document.getElementById("upPanel").value;
                if (payPanelName == 'AddPanel') {
                    document.getElementById("totMetal").value = getMetalDiv;
                }
                return true;
            } else {
                if (validateAddSellLotItemInputs()) {
                    return true;
                }
            }
        }
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("addItemSubButtDiv").style.visibility = "visible";
    return false;
}

/*******Start  code to add braces in if condition for wholesale @Author:ANUJA14MAY15********************/
/*******End code to add if else condition for wholesale @Author:ANUJA09MAY15********************/
function getSellLotItemDetails(panel) {
    loadXMLDoc2();
    var ntWeight = document.getElementById("addItemNetWeight").value;
    var ntWeighTyp = document.getElementById("addItemNetWeightType").value;
    var metalType = document.getElementById("addItemMetal").value;
    var itemName = document.getElementById("addItemName").value;
    var preId = document.getElementById("srchItemId").value;
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            var str = xmlhttp2.responseText;
            var strArray = new Array();
            strArray = str.split("*");
            if (str == 'EXCEEDS' || strArray[14] == 'EXCEEDS') {
                document.getElementById('addItemId').value = '0';
                document.getElementById("itstId").value = '';
                alert("Net weight exceeding available weight !\n Please enter correct weight !");
                return false;
            } else if (str == 'noItem') {
            } else if (str == 'FAIL') {
                document.getElementById('addItemId').value = '0';
//            confirm_box = confirm("No such stock is available\nDo you really want to continue ?");
//            if (confirm_box == true) {
//               return false;
//            } else {
//               document.getElementById("addItemGrossWeight").value = '';
//               document.getElementById("addItemNetWeight").value = '';
                document.getElementById("addItemGrossWeight").focus();
                return false;
//            }
//             alert('No Such Stock is available'); //@Author:SHE06NOV15
            } else {
                document.getElementById('addItemId').value = strArray[0];
                document.getElementById('addItemName').value = strArray[1];
                document.getElementById('addItemCategory').value = strArray[2];
                document.getElementById('addItemPieces').value = strArray[3];
                document.getElementById('addItemFineWeight').value = strArray[4];
                document.getElementById('addItemTunch').value = strArray[5];
                document.getElementById('addItemCustCharges').value = strArray[6];
                document.getElementById('addItemCustChargesType').value = strArray[7];
                document.getElementById('addItemValuation').value = strArray[8];
                document.getElementById('addItemVATTax').value = strArray[9];
                document.getElementById('addItemMetal').value = strArray[10];
                document.getElementById('addItemPreId').value = strArray[11];
                document.getElementById("addItemWastage").value = strArray[12];
                document.getElementById("addItemFFineWeight").value = strArray[13];
                if (strArray[14] != undefined && strArray[14] != 'SUCCESS' && strArray[14] != 'EXCEEDS') {
                    document.getElementById("itstId").value = strArray[14];
                }
                document.getElementById("itemAvailStatus").value = 'YES';
                calculateSellLotPrice();
                return true;
            }
        }
    };
    xmlhttp2.open("POST", "include/php/ogspitch.php?netWeight=" + ntWeight + "&netWeighTyp=" + ntWeighTyp + "&metalType=" + metalType + "&itemName=" + itemName
            + "&preId=" + preId + "&panel=" + panel, true);
    xmlhttp2.send();
}

/********************Start code to add function to add cust circle @Author:PRIYA24NOV14*************/
function addCustCircle(custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            document.getElementById('custCircleCustName').focus();
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omccsrch.php?custId=" + custId, true);
    xmlhttp.send();
}

/********************End code to add function to add cust circle @Author:PRIYA24NOV14*************/
/********************Start code to add function to add cust circle @Author:PRIYA24NOV14*************/
function searchCustCircle() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omccsrch.php?custId=" + custId, true);
    xmlhttp.send();
}

/********************End code to add function to add cust circle @Author:PRIYA24NOV14*************/
function navBackToCustCirclePage(custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcucrdv.php?custId=" + custId, true);
    xmlhttp.send();
}

////// Start change for add new customer from customer circle (@sujata - 30 mar 2019)///
function addNewToCustCirclePage(custId)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("addNewCustomer").style.visibility = "hidden";
            document.getElementById("ajaxCloseNewCustDiv").style.visibility = "visible";
            document.getElementById("NewCustDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("Searchcustomer").style.visibility = "hidden";
            // document.getElementById("girviDepositPrinAmount").focus();
        } else {
            document.getElementById("addNewCustomer").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omaddcustomer.php?custId=" + custId, true);
    xmlhttp.send();
}

function closeNewCustDiv() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("addNewCustomer").style.visibility = "hidden";
            document.getElementById("ajaxCloseNewCustDiv").style.visibility = "hidden";
            document.getElementById("NewCustDiv").innerHTML = xmlhttp.responseText;
            document.getElementById("Searchcustomer").style.visibility = "visible";
        } else {
            document.getElementById("addNewCustomer").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk.php", true);
    xmlhttp.send();
}

////// end change for add new customer from customer circle (@sujata - 30 mar 2019)///
function searchCustToAddInCircle(mainCustId, custName, custUId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("custListDivToAddInCircle").innerHTML = xmlhttp.responseText;
        }
    };
    var poststr = "custName=" + encodeURIComponent(custName)
            + "&custUId=" + encodeURIComponent(custUId)
            + "&mainCustId=" + encodeURIComponent(mainCustId);
    xmlhttp.open("GET", "include/php/omcusrrs.php?" + poststr, true);
    xmlhttp.send();
}

function getCustRelationList(div, id, keyCodeInput, custId, mainCustId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('addCustRelationSelBy').focus();
                document.getElementById('addCustRelationSelBy').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/omccrelt.php?id=" + id + "&div=" + div + "&custId=" + custId + "&mainCustId=" + mainCustId, true);
    xmlhttp.send();
}

/****************Start code to change ids @Author:PRIYA04DEC14**********/
function addCustRelation(relation, custId, mainCustId) {
    loadXMLDoc();
//    if (validateEmptyField(document.getElementById("custCircleRelationId" + custId).value, "Please Enter Relation!") == false) {
//        document.getElementById("custCircleRelationId" + custId).focus();
//        return false;
//    } else {
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", "include/php/omccread.php?relation=" + relation + "&custId=" + custId + "&mainCustId=" + mainCustId, true);
    xmlhttp.send();
//    }
}

/****************End code to change ids @Author:PRIYA04DEC14**********/
function deleteCustFromCircle(mainCustId, custId) {
    confirm_box = confirm("Do you really want to remove this customer from circle?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "include/php/omccremo.php?mainCustId=" + mainCustId + "&custId=" + custId, true);
        xmlhttp.send();
    }
}

function navigationSrchCustToAddInCircle(pageNo, custFName, custLName, custMobile, custPId, custUId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            document.getElementById("custCirCleSerchDiv").innerHTML = xmlhttp.responseText;
        } else {
            //document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST", "include/php/omcusrrs.php?page=" + pageNo + "&custFName=" + custFName + "&custLName=" + custLName + "&custMobNo=" + custMobile +
            "&custPId=" + custPId + "&custUId=" + custUId, true);
    xmlhttp.send();
}

/****Start to change function to add condition for raw stock panel @OMMODTAG SHE02APR16*****/
function showMetalRateWithTax(metalId, panelName) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            var str = xmlhttp2.responseText;
            var strArray = new Array();
            strArray = str.split("#");
            document.getElementById('metalRateCalculation').value = strArray[0];
            if (panelName == 'addStockPanel') {
                document.getElementById('sttr_tax').value = strArray[1];///added by @auth:athu6JUN17
                document.getElementById('metalRateId').value = metalId;
                calStockItemPrice();
            } else {
                document.getElementById('addRawStockItemTax').value = strArray[1];
                calRawMetalFinVal();
            }
        }
    };
    if (panelName == 'addStockPanel') {
        var documentRootPath = document.getElementById('documentRootPath').value;
        xmlhttp2.open("POST", documentRootPath + "/include/php/ogmtrttx.php?metalId=" + metalId + "&panelName=" + panelName, true);
    } else {
        xmlhttp2.open("POST", "include/php/ogmtrttx.php?metalId=" + metalId + "&panelName=" + panelName, true);
    }
    xmlhttp2.send();
}

/****End to change function to add condition for raw stock panel @OMMODTAG SHE02APR16*****/
/****************Start code to add function for girvi trans serial number update @Author:PRIYA06DEC14***********************/
function update_girvi_trans_serial_num(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertUpdateGirviTransSerialNum;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}


function alertUpdateGirviTransSerialNum() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        if (xmlhttp.responseText == 'SerialNumAlreadyExist') {
            document.getElementById("updateGirviSerialNumAlreadyExistMessage").style.visibility = "visible";
            document.getElementById("girviTransSerialNo").focus();
            window.setTimeout(closeTransMessageDiv, 2000);
        } else {
            if (upDatePanelName == 'AddPrinTransSerialNoUp')
                document.getElementById("addPrinTransDetDiv").innerHTML = xmlhttp.responseText;
            else
                document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        }
    }
}

function closeTransMessageDiv() {
    //document.getElementById("updateGirviSerialNumAlreadyExistMessage").innerHTML = "";
    document.getElementById("updateGirviSerialNumAlreadyExistMessage").style.visibility = "hidden";
}
function updateGirviTransSerialNum(documentRootPath, custId, girviId, gTransId, girviPreSerialNo, girviSerialNo, transType, firmId, DOB, prinAmt, panel) {
    upDatePanelName = panel;
    document.getElementById("updateGirviSerialNumAlreadyExistMessage").style.visibility = "hidden";
    document.getElementById("updateTransGirviSerialNoButton").style.visibility = "hidden";
    var girviSerialNum = girviSerialNo.value;
    var girviPreSerialNo = girviPreSerialNo.value;
    if (validateEmptyField(girviSerialNum, "Please enter Serial Number!") == false ||
            validateNum(girviSerialNum, "Accept only numeric characters without space character!") == false) {
        document.getElementById("girviTransSerialNo").focus();
        document.getElementById("updateTransGirviSerialNoButton").style.visibility = "visible";
        return false;
    } else if ((girviPreSerialNo != '') && validateAlpha(girviPreSerialNo, "Accept only Alpha characters without space character!") == false) {
        document.getElementById("girviTransPreSerialNo").focus();
        document.getElementById("updateTransGirviSerialNoButton").style.visibility = "visible";
        return false;
    } else {
        confirm_box = confirm("Do you really want to update Serial Number?");
        if (confirm_box == true)
        {
            var poststr = "custId=" + custId + "&girviId=" + girviId
                    + "&gTransId=" + gTransId
                    + "&girviSerialNum=" + girviSerialNum
                    + "&girviPreSerialNum=" + girviPreSerialNo
                    + "&transType=" + transType
                    + "&firmId=" + firmId
                    + "&DOB=" + DOB
                    + "&prinAmt=" + prinAmt
                    + "&panel=" + panel;
            update_girvi_trans_serial_num(documentRootPath + '/include/php/olgtsnup.php', poststr);
        }
    }
    document.getElementById("updateTransGirviSerialNoButton").style.visibility = "visible";
    return false;
}

/****************End code to add function for girvi trans serial number update @Author:PRIYA06DEC14***********************/
/****************Start code to vlear circle @Author:PRIYA06DEC14***********************/
//function clearCircle(mainCustId) {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function() {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    xmlhttp.open("GET", "include/php/omccsrch.php?mainCustId=" + mainCustId, true);
//    xmlhttp.send();
//}
/****************End code to vlear circle @Author:PRIYA06DEC14***********************/

/******Start code to add function for dd navigation to purchase panel @Author:PRIYA08DEC14**********/
/***************Start code to add condition for crystal panel @Author:SHE30MAR15*********/
function navToPurchasePanel(div, isinId, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'CrystalPayUp')
        xmlhttp.open("POST", "include/php/ogiamndv.php?isin_id=" + isinId + "&updatePanelName=" + panel + "&panelName=CrystalPanel", true);
    else
        xmlhttp.open("POST", "include/php/ogiamndv.php?isin_id=" + isinId + "&panelName=" + panel, true);
    xmlhttp.send();
}
/***************End code to add condition for crystal panel @Author:SHE30MAR15*********/
/******End code to add function for dd navigation to purchase panel @Author:PRIYA08DEC14**********/
/******Start code to add funtion to trans add principal @Author:PRIYA08DEC14*********************/
function showAddPrinTransLoanPanel(addPrinId, loanId, entryPresent) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("trans_add_prin_div" + addPrinId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("trans_add_prin_div" + addPrinId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    if (entryPresent > 0) {
        xmlhttp.open("POST", "include/php/olaptrdt.php?addPrinId=" + addPrinId + "&girviId=" + loanId, true);
    } else {
        xmlhttp.open("POST", "include/php/olaptrdv.php?addPrinId=" + addPrinId + "&girviId=" + loanId, true);
    }
    xmlhttp.send();
}
function showAddPrinTransLoanPanelClose(addPrinId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("trans_add_prin_div" + addPrinId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk.php", true);
    xmlhttp.send();
}
function transfer_additional_prin(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertTransferAdditionalPrin;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertTransferAdditionalPrin() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("ajaxLoadCustGirviTransferDiv").style.visibility = "visible";
        document.getElementById("transferGirviButton").style.visibility = "hidden";
    }
}
function transferAdditionalPrin(documentRootPath, obj, nepalidate = '', nepaliIndicator = '') {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("transferGirviButton").style.visibility = "hidden";
    var girviDateStr = document.transfer_add_prin.DOBMonth.value + ' ' + document.transfer_add_prin.DOBDay.value + ', ' + document.transfer_add_prin.DOBYear.value;
    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date
    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    if (nepaliIndicator == 'YES') {
        var datesDiff = nepalidate - milliGirviDate;
    } else {
        var datesDiff = milliTodayDate - milliGirviDate;
    }
//    var datesDiff = milliTodayDate - milliGirviDate;
    if (datesDiff < 0) {
        alert('Please Select the correct Date!');
        document.getElementById("DOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("transferGirviButton").style.visibility = "visible";
    } else {
        if (validateTransferGirviInputs(obj)) {
            var poststr = "principalAmount=" + encodeURIComponent(document.getElementById("principalAmount").value)
                    + "&custId=" + encodeURIComponent(document.getElementById("custId").value)
                    + "&girviId=" + encodeURIComponent(document.getElementById("girviId").value)
                    + "&interestType=" + encodeURIComponent(document.getElementById("interestTGType").value)
                    + "&selTROI=" + encodeURIComponent(document.getElementById("selTROI").value)
                    + "&DOBDay=" + encodeURIComponent(document.transfer_add_prin.DOBDay.value)
                    + "&DOBMonth=" + encodeURIComponent(document.transfer_add_prin.DOBMonth.value)
                    + "&DOBYear=" + encodeURIComponent(document.transfer_add_prin.DOBYear.value)
                    + "&girviFirmId=" + encodeURIComponent(document.getElementById("girviFirmId").value)
                    + "&girviExistFirmId=" + encodeURIComponent(document.getElementById("girviExistFirmId").value)
                    + "&girviTransPreSerialNo=" + encodeURIComponent(document.getElementById("girviTransPreSerialNo").value)
                    + "&girviTransSerialNo=" + encodeURIComponent(document.getElementById("girviTransSerialNo").value)
                    + "&loanLenderId=" + encodeURIComponent(document.getElementById("mlId").value)
                    + "&mlMainId=" + encodeURIComponent(document.getElementById("mlMainId").value)
                    + "&girviTransTokenNo=" + encodeURIComponent(document.getElementById("girviTransTokenNo").value)
                    + "&girviTransMlLoanNo=" + encodeURIComponent(document.getElementById('mlLoanNo').value)
                    + "&trGirviPaySelAccountId=" + encodeURIComponent(document.getElementById('trGirviPaySelAccountId').value)
                    + "&trGirviPaymentOtherInfo=" + encodeURIComponent(document.getElementById('trGirviPaymentOtherInfo').value)
                    + "&girviTransOtherInfo=" + encodeURIComponent(document.getElementById("girviTransOtherInfo").value)
                    + "&prinType=" + encodeURIComponent(document.getElementById("prinType").value)
                    + "&girviTransCrAccId=" + encodeURIComponent(document.getElementById("girviTransCrAccId").value)
                    + "&addPrinId=" + encodeURIComponent(document.getElementById("addPrinId").value);
            transfer_additional_prin(documentRootPath + '/include/php/olaptrad.php', poststr);
        }
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("transferGirviButton").style.visibility = "visible";
    return false;
}
/******End code to add funtion to trans add principal @Author:PRIYA08DEC14*********************/
/******Start code to add funtion to trans add principal @Author:PRIYA09DEC14*********************/
function changeAppPrinROIAdd(selectROIType, obj, troi, girviId, custId, panelName) {
    loadXMLDoc();
    roiOption = selectROIType.value;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("AddPrinROIOption").innerHTML = xmlhttp.responseText;
            document.getElementById("troiIntTypeChangeDiv").style.visibility = "visible";
            document.getElementById("selTROIChangeDiv").style.visibility = "visible";
            window.setTimeout(closeGirviTROIOptChangeDiv, 1000);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olaproim.php?roiOption=" + roiOption + "&troi=" + troi + "&girviId=" + girviId + "&custId=" + custId, true);
    xmlhttp.send();
    return false;
}
function updateAddPrinTransDOB(documentRootPath, custId, girviId, DOBDay, DOBMonth, DOBYear, jrnlId, panelName, gTransId, girviDOB, girviFirmId, girviSerialNum, prinAmt) {
    upDatePanelName = panelName;
    document.getElementById("updateTransGirviDOBButton").style.visibility = "hidden";
    var girviDateDay = DOBDay.value;
    var girviDateMMM = DOBMonth.value;
    var girviDateYY = DOBYear.value;
    var girviDateStr = girviDateMMM + ' ' + girviDateDay + ', ' + girviDateYY;
    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date

    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;
    if (datesDiff < 0) {
        alert('Please Select the correct Girvi Date!');
        document.getElementById("updateDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("updateTransGirviDOBButton").style.visibility = "visible";
        return false;
        exit();
    } else {
        if (girviDateMMM == 'FEB' || girviDateMMM == 'APR' || girviDateMMM == 'JUN' || girviDateMMM == 'SEP' || girviDateMMM == 'NOV') {
            if (girviDateMMM == 'FEB' && girviDateDay > 29 && girviDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("updateDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("updateTransGirviDOBButton").style.visibility = "visible";
                return false;
                exit();
            }
            if (girviDateMMM == 'FEB' && girviDateDay > 28 && girviDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("updateDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("updateTransGirviDOBButton").style.visibility = "visible";
                return false;
                exit();
            }
            if (girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("updateDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("updateTransGirviDOBButton").style.visibility = "visible";
                return false;
                exit();
            }
        }
        if (validateSelectField(girviDateDay, "Please select Girvi Date Day!") == false) {
            document.getElementById("updateDOBDay").focus();
            document.getElementById("updateTransGirviDOBButton").style.visibility = "visible";
            return false;
        } else if (validateSelectField(girviDateMMM, "Please select Girvi Date Month!") == false) {
            document.getElementById("updateDOBMonth").focus();
            document.getElementById("updateTransGirviDOBButton").style.visibility = "visible";
            return false;
        } else if (validateSelectField(girviDateYY, "Please select Girvi Date Year!") == false) {
            document.getElementById("updateDOBYear").focus();
            document.getElementById("updateTransGirviDOBButton").style.visibility = "visible";
            return false;
        } else {
            confirm_box = confirm("Do you really want to update Girvi Date?");
            if (confirm_box == true)
            {
                var poststr = "custId=" + custId + "&girviId=" + girviId
                        + "&girviDOBDay=" + girviDateDay + "&girviDOBMonth=" + girviDateMMM +
                        "&girviDOBYear=" + girviDateYY + "&jrnlId=" + jrnlId + "&panelName=" + panelName
                        + "&girviTransId=" + gTransId + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
                        + "&girviSerialNum=" + girviSerialNum + "&prinAmt=" + prinAmt;
                update_girvi_DOB_amount(documentRootPath + '/include/php/olgugvdd.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
            }
        }
        document.getElementById("updateTransGirviDOBButton").style.visibility = "visible";
    }
    return false;
}
/******End code to add funtion to trans add principal @Author:PRIYA09DEC14*********************/
/******Start code to add funtion for dd trans firm @Author:PRIYA10DEC14********************/
function searchDailyDiaryTransFirm(ddDetVal, firmId, fromDay, fromMonth, fromYear, toDay, toMonth, toYear, ddPanelToShow, ddMainPanel, transFirmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("dailyDiaryDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var dailyDiaryFromDate = fromDay.value + '-' + fromMonth.value + '-' + fromYear.value;
    var dailyDiaryToDate = toDay.value + '-' + toMonth.value + '-' + toYear.value;
    xmlhttp.open("POST", "include/php/omddddandv.php?ddDetVal=" + ddDetVal + "&firmId=" + firmId + "&dailyDiaryFromDate=" + dailyDiaryFromDate + "&dailyDiaryToDate=" + dailyDiaryToDate
            + "&ddPanelToShow=" + ddPanelToShow + "&ddMainPanel=" + ddMainPanel + "&transFirmId=" + transFirmId, true);
    xmlhttp.send();
}
/******End code to add funtion for dd trans firm @Author:PRIYA10DEC14********************/
/******Start code to add funtion for Monthly add prin transfer @Author:PRIYA11DEC14********************/
function changeAddPrinTransMonthlyIntOpt(documentRootPath, simpleOrCompIntOption, girviCompoundedOption, omPanelDiv, grvRelPayDetails, selMonthlyIntOpt, princAmount, ROIValue,
        interestType, girviDate, girviType, addPrinId, custId, girviStatus, transId, girviDOB, girviFirmId, girviSerialNum, girviHindiDOB) {
    document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "visible";
    selectedROIValue = ROIValue;
    if (girviStatus == 'Transferred') {
        relDateDDValue = document.getElementById('DOBTransDay').value;
        relDateMMValue = document.getElementById('DOBTransMonth').value;
        relDateYYValue = document.getElementById('DOBTransYear').value;
    } else if (girviStatus == 'Released') {
        relDateDDValue = '';
        relDateMMValue = '';
        relDateYYValue = '';
    } else {
        relDateDDValue = document.getElementById('DOBDay').value;
        relDateMMValue = document.getElementById('DOBMonth').value;
        relDateYYValue = document.getElementById('DOBYear').value;
    }
    var poststr = "gMonthIntOption=" + selMonthlyIntOpt.value + "&princAmount=" + princAmount
            + "&ROIValue=" + selectedROIValue + "&interestType=" + interestType.value
            + "&girviDate=" + girviDate + "&addPrinId=" + addPrinId + "&custId=" + custId + "&omPanelDiv=" + omPanelDiv
            + "&girviType=" + girviType + "&grvRelPayDetails=" + grvRelPayDetails + "&girviStatus=" + girviStatus
            + "&relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
            + "&simpleOrCompIntOption=" + simpleOrCompIntOption + "&girviCompoundedOption=" + girviCompoundedOption
            + "&girviAddROINotChange=No" + "&transId=" + transId + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
            + "&girviSerialNum=" + girviSerialNum + "&girviHindiDOB=" + girviHindiDOB;
    change_Monthly_Int_Opt(documentRootPath + '/include/php/olaptram.php', poststr);
    change_addprin_monthly_int_option_db(documentRootPath + '/include/php/olapmidb.php', poststr);
    return false;
}
function change_addprin_monthly_int_option_db(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertChangeAddPrinMonthlyIntOptionDB;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.send(parameters);
}
function alertChangeAddPrinMonthlyIntOptionDB() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadTGirviMonthlyIntOptChangeDiv").style.visibility = "visible";
        document.getElementById("ajaxLoadTGirviMonthlyIntOptChangeDiv").innerHTML = "<img src='images/right16.png' />";
        window.setTimeout(closeMonthlyIntOptionChangeDiv, 1000);
        document.getElementById("ajaxLoadTGirviMonthlyIntOptChangeDiv").style.visibility = "visible";
    } else {
        document.getElementById("ajaxLoadTGirviMonthlyIntOptChangeDiv").style.visibility = "visible";
        document.getElementById("ajaxLoadTGirviMonthlyIntOptChangeDiv").innerHTML = "<img src='images/loading16.gif' />";
    }
}
function closeMonthlyIntOptionChangeDiv()
{
    document.getElementById("ajaxLoadTGirviMonthlyIntOptChangeDiv").style.visibility = "hidden";
}
var changeIntOptPanel;
function changeAddPrinIntCompoundedOpt(documentRootPath, simpleOrCompIntOption, girviCompoundedOption, omPanelDiv, grvRelPayDetails, selMonthlyIntOpt, princAmount, ROIValue,
        interestType, girviDate, girviType, addPrinId, custId, girviStatus, transId, girviDOB, girviFirmId, girviSerialNum, girviHindiDOB) {
    changeIntOptPanel = omPanelDiv;
    document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "visible";
    selectedROIValue = ROIValue;
    if (girviStatus == 'Transferred') {
        relDateDDValue = document.getElementById('DOBTransDay').value;
        relDateMMValue = document.getElementById('DOBTransMonth').value;
        relDateYYValue = document.getElementById('DOBTransYear').value;
    } else if (girviStatus == 'Released') {
        relDateDDValue = '';
        relDateMMValue = '';
        relDateYYValue = '';
    } else {
        relDateDDValue = document.getElementById('DOBDay').value;
        relDateMMValue = document.getElementById('DOBMonth').value;
        relDateYYValue = document.getElementById('DOBYear').value;
    }


    var poststr = "gMonthIntOption=" + selMonthlyIntOpt.value + "&princAmount=" + princAmount
            + "&ROIValue=" + selectedROIValue + "&interestType=" + interestType.value
            + "&girviDate=" + girviDate + "&addPrinId=" + addPrinId + "&custId=" + custId + "&omPanelDiv=" + omPanelDiv
            + "&girviType=" + girviType + "&grvRelPayDetails=" + grvRelPayDetails + "&girviStatus=" + girviStatus
            + "&relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
            + "&simpleOrCompIntOption=" + simpleOrCompIntOption + "&girviCompoundedOption=" + girviCompoundedOption
            + "&girviAddROINotChange=No" + "&transId=" + transId + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
            + "&girviSerialNum=" + girviSerialNum + "&girviHindiDOB=" + girviHindiDOB;
    change_int_type_opt(documentRootPath + '/include/php/olaptram.php', poststr);
    change_int_type_option_db(documentRootPath + '/include/php/olguindb.php', poststr); //change in filename @AUTHOR: SANDY21NOV13
    return false;
}
var changeIntCompoundedOptPanel;
function changeAddPrinIntCompoundedOpt(documentRootPath, simpleOrCompIntOption, girviCompoundedOption, omPanelDiv, grvRelPayDetails, selMonthlyIntOpt, princAmount, ROIValue,
        interestType, girviDate, girviType, addPrinId, custId, girviStatus, transId, girviDOB, girviFirmId, girviSerialNum, girviHindiDOB) {
    changeIntCompoundedOptPanel = omPanelDiv;
    document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "visible";
    selectedROIValue = ROIValue;
    if (girviStatus == 'Transferred') {
        relDateDDValue = document.getElementById('DOBTransDay').value;
        relDateMMValue = document.getElementById('DOBTransMonth').value;
        relDateYYValue = document.getElementById('DOBTransYear').value;
    } else if (girviStatus == 'Released') {
        relDateDDValue = '';
        relDateMMValue = '';
        relDateYYValue = '';
    } else {
        relDateDDValue = document.getElementById('DOBDay').value;
        relDateMMValue = document.getElementById('DOBMonth').value;
        relDateYYValue = document.getElementById('DOBYear').value;
    }


    var poststr = "gMonthIntOption=" + selMonthlyIntOpt.value + "&princAmount=" + princAmount
            + "&ROIValue=" + selectedROIValue + "&interestType=" + interestType.value
            + "&girviDate=" + girviDate + "&addPrinId=" + addPrinId + "&custId=" + custId + "&omPanelDiv=" + omPanelDiv
            + "&girviType=" + girviType + "&grvRelPayDetails=" + grvRelPayDetails + "&girviStatus=" + girviStatus
            + "&relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
            + "&simpleOrCompIntOption=" + simpleOrCompIntOption + "&girviCompoundedOption=" + girviCompoundedOption
            + "&girviAddROINotChange=No" + "&transId=" + transId + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
            + "&girviSerialNum=" + girviSerialNum + "&girviHindiDOB=" + girviHindiDOB;
    change_addprin_int_type_opt(documentRootPath + '/include/php/olapttam.php', poststr);
    change_compounded_option_db(documentRootPath + '/include/php/olgucmdb.php', poststr);
    return false;
}
function change_addprin_int_type_opt(url, parameters) {

    loadXMLDoc2();
    xmlhttp2.onreadystatechange = alertChangeAddprinIntTypeOpt;
    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.send(parameters);
}
function alertChangeAddprinIntTypeOpt() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "hidden";
        document.getElementById("transGirviTotalResultDiv").innerHTML = xmlhttp2.responseText;
    } else {
        document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "visible";
    }
}
/******End code to add funtion for Monthly add prin transfer @Author:PRIYA11DEC14********************/
function numberOfRowsofUnRelTransPanel(documentRootPath, rowsPerPage, selFirmId, sortKeyword, pageNum, searchColumn, searchValue, updateRows, selTFirmId, gTransStatus, selMlName)
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
    xmlhttp.open("POST", documentRootPath + "/include/php/orgptgrl.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&page=" + pageNum + "&searchColumn=" + searchColumn +
            "&searchValue=" + searchValue + "&updateRows=" + updateRows + "&selTFirmId=" + selTFirmId + "&gTransStatus=" + gTransStatus + "&selMlName=" + selMlName, true);
    xmlhttp.send();
}
function searchUnRelTransferGirviPanel(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage, selTFirmId, gTransStatus, selMlName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/orgptgrl.php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage + "&selTFirmId=" + selTFirmId +
            "&gTransStatus=" + gTransStatus + "&selMlName=" + selMlName, true);
    xmlhttp.send();
}
function sortUnRelGirviTransferPanel(documentRootPath, sortKeyword, selFirmId, rowsPerPage, selTFirmId, gTransStatus, selMlName) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/orgptgrl.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId +
            "&rowsPerPage=" + rowsPerPage + "&selTFirmId=" + selTFirmId + "&gTransStatus=" + gTransStatus + "&selMlName=" + selMlName, true);
    xmlhttp.send();
}
/******************Start code to add function for supp deposit @Author:PRIYA19DEC14*********************/
function getSuppDepMetalType(documentRootPath, suppUdhaarId, metalType, metalRate, panel, preInv, postInv) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("suppUdhaarDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogwhdpmt.php?metalType=" + metalType + "&suppUdhaarId=" + suppUdhaarId + "&metalRate=" + metalRate
            + "&panel=" + panel + "&preInv=" + preInv + "&postInv=" + postInv, true);
    xmlhttp.send();
}
/******************End code to add function for supp deposit @Author:PRIYA19DEC14*********************/
/******************Start code to add function to insert into supp deposit @Author:PRIYA19DEC14*********************/
function getSuppDepMetalRateDiv(metalType, div, id, keyCodeInput, suppUdhaarId, newPreInv, postInv) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('goldIdListDivToAddGoldIdSelect').focus();
                document.getElementById('goldIdListDivToAddGoldIdSelect').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogwpmtrt.php?metalType=" + metalType + "&div=" + div + "&id=" + id + "&suppUdhaarId=" + suppUdhaarId + "&newPreInv=" + newPreInv + "&postInv=" + postInv, true);
    xmlhttp.send();
}

/******************End code to add function to insert into supp deposit @Author:PRIYA19DEC14*********************/
function change_add_prin_release_date(url, parameters) {

    loadXMLDoc2();
    xmlhttp2.onreadystatechange = alertChangeAddPrinReleaseDate;
    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.send(parameters);
}

/**********START TO CHANGE FUNCTIONS @AUTHOR: SANDY24DEC13***************/
function alertChangeAddPrinReleaseDate() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "hidden";
        document.getElementById("transGirviTotalResultDiv").innerHTML = xmlhttp2.responseText;
    } else {
        document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "visible";
    }
}
/***Start to change function @AUTHOR: SANDY14JAN14********************/
var setReleaseDatePanel; //new variable @AUTHOR: SANDY24DEC13
function changeAddPrinReleaseDate(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviROI, monthlyInterestType, simpleOrCompIntOption,
        girviCompoundedOption, princAmount, interestType, girviDate, addPrinId, custId, girviType, panel, girviStatus) {
    setReleaseDatePanel = panel;
    girviCurrentStatus = girviStatus;
    var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
            + "&ROIValue=" + girviROI.value + "&gMonthIntOption=" + monthlyInterestType.value
            + "&simpleOrCompIntOption=" + simpleOrCompIntOption.value + "&girviCompoundedOption=" + girviCompoundedOption.value
            + "&princAmount=" + princAmount + "&interestType=" + interestType.value
            + "&girviDate=" + girviDate + "&addPrinId=" + addPrinId + "&custId=" + custId
            + "&girviType=" + girviType + "&girviStatus=" + girviCurrentStatus + "&grvRelPayDetails=TRUE" + "&omPanelDiv=" + panel;
    change_add_prin_release_date(documentRootPath + '/include/php/olapttam.php', poststr);
    return false;
}
/**********Start code to add function to get release girvi list @Author:PRIYA26DEC14*********/
function get_girvi_by_girviId(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertGetGirviByGirviId;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertGetGirviByGirviId() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function getGirviByGirviId(girviId) {
    poststr = "girviId=" + encodeURIComponent(girviId);
    get_girvi_by_girviId('include/php/olgsgiwd.php', poststr);
}
/**********End code to add function to get release girvi list @Author:PRIYA26DEC14*********/
/******************Start Code To Navigate to Cust List @Author:PRIYA26DEC14*************/
function getCustomerList(panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerListDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omcccslt.php?custTypeList=" + panel, true);
    xmlhttp.send();
}
/******************End Code To Navigate to Cust List @Author:PRIYA26DEC14*************/
/********Start code to add function to nav to ml loan @Author:PRIYA15JAN15*************/
function navMlLoanDet(loanId, mlCode, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
    xmlhttp.open("GET", "include/php/ommlmndv.php?loanId=" + loanId + "&mlCode=" + mlCode + "&panelOption=" + panel, true);
    xmlhttp.send();
}
/********End code to add function to nav to ml loan @Author:PRIYA15JAN15*************/
/********Start code to add code for ML serial number @Author:PRIYA21JAN15**************/
function getMLFirmSerialNo(dRoot, selectedFirmNo, panel, transType) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            var str = xmlhttp2.responseText;
            var strArray = new Array();
            strArray = str.split("*");
            document.getElementById("mlPreSerialNumber").value = strArray[0];
            document.getElementById("mlSerialNumber").value = strArray[1];
            getMLFirmLoanNo(selectedFirmNo, panel, transType);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var poststr = "firmNo=" + encodeURIComponent(selectedFirmNo);
    xmlhttp2.open("POST", dRoot + "/include/php/ormlsrnm.php?" + poststr, true);
    xmlhttp2.send();
}
/********End code to add code for ML serial number @Author:PRIYA21JAN15**************/
function delete_add_prin_girvi_details(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertDeleteAddPrinGirviDetails;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertDeleteAddPrinGirviDetails() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("transGirviDeleteButDiv").style.visibility = "hidden";
    }
//    function closeTransGirviDetailsDiv()
//    {
//        document.getElementById("transGirviDelMessDiv").innerHTML = "";
//    }
}
function deleteAddPrinGirviDetails(girviTransId, girviId, custId, addPrinId, panelName) {
    document.getElementById("transGirviDeleteButDiv").style.visibility = "hidden";
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    gGirviId = girviId;
    confirm_box = confirm("Do you really want to Delete This Transferred Girvi?");
    if (confirm_box == true)
    {
        var poststr = "girviTransId=" + girviTransId
                + "&girviId=" + girviId
                + "&custId=" + custId
                + "&addPrinId=" + addPrinId
                + "&panelName=" + panelName;
        delete_add_prin_girvi_details('include/php/olaptrdl.php', poststr);
    } else {
        document.getElementById("transGirviDeleteButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
/********Start code to add code to delete entry from jrtr table @Author:PRIYA09FEB15**************/
function deleteEntryFrmJrtr(jrtrId, jrnlId, acntName, userAccount) {
    confirm_box = confirm(deleteAlertMess + "\n Do you really want to delete this Journal Entry Permanently?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (xmlhttp.responseText == 'FAIL') {
                    alert("You can not delete this entry,because it has related journal entry !");
                } else
                    document.getElementById("accLedgerDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omjrtrdl.php?jrtrId=" + jrtrId + "&jrnlId=" + jrnlId + "&acntName=" + acntName + "&userAccount=" + userAccount, true);
        xmlhttp.send();
    }
}
/********End code to add code to delete entry from jrtr table @Author:PRIYA09FEB15**************/
/********Start code to add function to get customer type @Author:PRIYA23FEB15******************/
function getCustTypeList(id, keyCodeInput) {
    loadXMLDoc();
//    alert(id);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('custTypeListDiv').innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('custTypeListIdToSel').focus();
                document.getElementById('custTypeListIdToSel').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/omcutplt.php?id=" + id, true);
    xmlhttp.send();
}
/********End code to add function to get customer type @Author:PRIYA23FEB15******************/
/********Start code to add code for deposit delete @Author:PRIYA28FEB15*****************/
function girviMoneyDepDeleteOption(girviDepId, girviId, custId, commentId) {
    confirm_box = confirm("Do you really want to delete this Transaction ?");
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
        xmlhttp.open("POST", "include/php/olggmddl.php?girviDepId=" + girviDepId + "&girviId=" + girviId + "&custId=" + custId + "&commentId=" + commentId, true);
        xmlhttp.send();
    }
}
/********End code to add code for deposit delete @Author:PRIYA28FEB15*****************/
/********Start code to add code to get details by srearch item id @Author:PRIYA10FEB15*****************/
/********Start code to add code to addItemMetalRate  @Author:ANUJA24APR15*****************/
/********Start code to add changeTunch @Author:ANUJA25APR15*****************/
/********Start code to add one condition plz replace whole function @Author:ANUJA29APR15*****************/
/********Start code to add one vriable custId in  function @Author:ANUJA15MAY15*****************/
function getItemDetInSellByPreId(preId, mainPanel, custId) {
//alert('nkvnkdvn');
    var metalType = '';
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            var strArray = new Array();
            strArray = str.split("*");
            if (str == 'soldOut') {
                alert("THIS ITEM IS ALREADY SOLD OUT !");
                document.getElementById('srchItemId').focus();
            } else if (strArray[0] == 'postIdNotExist') {
                document.getElementById('addItemPreId').value = strArray[1];
                document.getElementById('addItemMetal').focus(); // change id @Author:ANUJA20APR15
            } else if (strArray[0] == 'preNpostIdNotExist') {
                document.getElementById('addItemPreId').value = strArray[1];
                document.getElementById('addItemId').value = strArray[2];
                document.getElementById('addItemGrossWeight').focus();
            } else if (strArray[0] == 'needPostId') {   // Added in case of tagging for Post Id @Author:SHE05NOV15
                alert('Please Enter Post Id');
            } else {
                document.getElementById('addItemId').value = strArray[0];
                document.getElementById('addItemName').value = strArray[1];
                document.getElementById('addItemCategory').value = strArray[2];
                document.getElementById('addItemPieces').value = strArray[3];
                document.getElementById('addItemFineWeight').value = strArray[4];
                document.getElementById('addItemTunch').value = strArray[5];
                document.getElementById('addItemCustCharges').value = strArray[6];
                document.getElementById('addItemCustChargesType').value = strArray[7];
                document.getElementById('addItemValuation').value = strArray[8];
                document.getElementById('addItemVATTax').value = strArray[9];
                document.getElementById('addItemMetal').value = strArray[10];
                document.getElementById('addItemPreId').value = strArray[11];
                document.getElementById('addItemWastage').value = strArray[12];
                document.getElementById('addItemFFineWeight').value = strArray[13];
                if (strArray[15] == 'sellPurchase') {
                    document.getElementById('addItemMetalRate').value = strArray[14];
                    changeTunch(strArray[10]);
                }
                if (strArray[16] != undefined) {
                    document.getElementById('itstId').value = strArray[14];
                    document.getElementById('addItemGrossWeight').value = strArray[16];
                    document.getElementById('addItemGrossWeightType').value = strArray[15];
                    document.getElementById('addItemNetWeight').value = strArray[17];
                    document.getElementById('addItemNetWeightType').value = strArray[18];
                } else {
                    document.getElementById('addItemGrossWeight').value = '';
                    document.getElementById('addItemNetWeight').value = '';
                }
                calculateSellLotPrice();
            }
        }
    };
//    alert(metalType);
    xmlhttp.open("POST", "include/php/ogiapidt.php?metalType=" + metalType + "&preId=" + preId + "&mainPanel=" + mainPanel + "&custId=" + custId, true);
    xmlhttp.send();
}
function changeTunch(metalType) {
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById('addItemTunch').innerHTML = xmlhttp2.responseText;
        }
    };
    xmlhttp2.open("POST", "include/php/ogiatndv.php?metalType=" + metalType, true);
    xmlhttp2.send();
}
/********End code to add one vriable custId in  function @Author:ANUJA15MAY15*****************/
/********End code to add changeTunch @Author:ANUJA25APR15*****************/
/********End code to add code to addItemMetalRate  @Author:ANUJA24APR15*****************/
/********End code to add code to get details by srearch item id @Author:PRIYA10FEB15*****************/
/********Start code to add code to get wholesale details enter panel @Author:PRIYA18MAR15*****************/
function getWholesaleDetFunc(gdFineWt, gdFineWtTyp, srFineWt, srFineWtTyp, totalFinalBalance, custId, invNo) {
    if (document.getElementById("wholesaleAdjustCheck").checked == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("wholesaleOpenDetDiv").innerHTML = xmlhttp.responseText;
                document.getElementById("wholeAdjGdGsWt").focus();
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogswgtdv.php?gdFineWt=" + gdFineWt + "&gdFineWtTyp=" + gdFineWtTyp + "&srFineWt=" + srFineWt
                + "&srFineWtTyp=" + srFineWtTyp + "&totalFinalBalance=" + totalFinalBalance + "&custId=" + custId + "&invNo=" + invNo, true);
        xmlhttp.send();
    } else {
        document.getElementById("wholesaleOpenDetDiv").innerHTML = '';
    }
}
function getWholesaleDetHide() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("wholesaleOpenDetDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };
    xmlhttp.open("POST", "include/php/ombbblnk.php", true);
    xmlhttp.send();
}
function passWholesaleValues(dRoot, gdFineWt, gdFineWtTyp, srFineWt, srFineWtTyp, totalFinalBalance, custId, invNo) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("wholesaleOpenDetDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var poststr = "wholeAdjGdGsWt=" + encodeURIComponent(document.getElementById("wholeAdjGdGsWt").value)
            + "&wholeAdjGdGsWtType=" + encodeURIComponent(document.getElementById("wholeAdjGdGsWtType").value)
            + "&wholeAdjGdRate=" + encodeURIComponent(document.getElementById("wholeAdjGdRate").value)
            + "&wholeAdjGdVal=" + encodeURIComponent(document.getElementById("wholeAdjGdVal").value)
            + "&wholeAdjSrGsWt=" + encodeURIComponent(document.getElementById("wholeAdjSrGsWt").value)
            + "&wholeAdjSrGsWtType=" + encodeURIComponent(document.getElementById("wholeAdjSrGsWtType").value)
            + "&wholeAdjSrRate=" + encodeURIComponent(document.getElementById("wholeAdjSrRate").value)
            + "&wholeAdjSrVal=" + encodeURIComponent(document.getElementById("wholeAdjSrVal").value)
            + "&wholeAdjBalance=" + encodeURIComponent(document.getElementById("wholeAdjBalance").value)
            + "&gdFineWt=" + encodeURIComponent(gdFineWt)
            + "&gdFineWtTyp=" + encodeURIComponent(gdFineWtTyp)
            + "&srFineWt=" + encodeURIComponent(srFineWt)
            + "&srFineWtTyp=" + encodeURIComponent(srFineWtTyp)
            + "&totalFinalBalance=" + encodeURIComponent(totalFinalBalance)
            + "&custId=" + encodeURIComponent(custId)
            + "&invNo=" + encodeURIComponent(invNo);
    xmlhttp.open("POST", dRoot + "/include/php/ogswwtad.php?" + poststr, true);
    xmlhttp.send();
}
/********End code to add code to get wholesale details enter panel @Author:PRIYA18MAR15*****************/
/********Start code to add to get Rate cut option @Author:23MAR15*******************************/
/********Start code to add to udharGdWt,udharSrWt,udharSrWtType goldTotpurBal,goldTotpurBalType,silverTotPurBal,silverTotPurBalTypeand etc option @Author:ANUJA28APR15******************************/
/********Start code to add to udharGdWt,udharSrWt,udharSrWtType goldTotpurBal,goldTotpurBalType,silverTotPurBal,silverTotPurBalTypeand,goldVal, srVal etc option in NoRateCut condition @Author:ANUJA28MAY15******************************/
/********Start code to add to udhaarFinalBalLeft,totOthrChrg etc option in NoRateCut condition @Author:ANUJA19OCT15******************************/
/********Start code to add to slPrId Id @Author:ANUJA31OCT15******************************/
/********Start code to add to slPrId Id slPrPreInvoiceNo, slPrInvoiceNo @AUTHOR:ANUJA01DEC15******************************/
function callRateCutOption(dRoot, rateCutOption, goldTotFnWt, goldTotFnWtTyp, goldRate, srTotFnWt, srTotFnWtTyp, srRate, udhaarAmt, udharGdWt, udharGdWtType,
        udharSrWt, udharSrWtType, goldTotpurBal, goldTotpurBalType, silverTotPurBal, silverTotPurBalType, udhaarFinalBalLeft, totOthrChrg, slPrId, slPrPreInvoiceNo, slPrInvoiceNo) {
//    alert(srTotFnWt);
    confirm_box = confirm("Do you really want to cut rate ?");
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("payTotAmtDiv").innerHTML = xmlhttp.responseText;
                calcWholeItemBalance();
                wholeAdjCalc();
            } else {
                document.getElementById("main_ajax_loading_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        };
        if (rateCutOption == 'NoRateCut') {
            xmlhttp.open("POST", dRoot + "/include/php/ogswsbdv.php?rateCutOption=" + rateCutOption + "&goldTotFnWt=" + goldTotFnWt + "&goldTotFnWtTyp=" + goldTotFnWtTyp +
                    "&goldRate=" + goldRate + "&srTotFnWt=" + srTotFnWt + "&srTotFnWtTyp=" + srTotFnWtTyp + "&srRate=" + srRate + "&udhaarAmt=" + udhaarAmt + "&udharGdWt=" + udharGdWt + "&udharGdWtType=" + udharGdWtType +
                    "&udharSrWt=" + udharSrWt + "&udharSrWtType=" + udharSrWtType + "&goldTotpurBal=" + goldTotpurBal + "&goldTotpurBalType=" + goldTotpurBalType + "&silverTotPurBal=" + silverTotPurBal + "&silverTotPurBalType=" + silverTotPurBalType + "&udhaarFinalBalLeft=" + udhaarFinalBalLeft + "&totOthrChrg=" + totOthrChrg + "&slPrId=" + slPrId + "&slPrPreInvoiceNo=" + slPrPreInvoiceNo + "&slPrInvoiceNo=" + slPrInvoiceNo, true);
        } else {
            xmlhttp.open("POST", dRoot + "/include/php/ogswrtct.php?rateCutOption=" + rateCutOption + "&goldTotFnWt=" + goldTotFnWt + "&goldTotFnWtTyp=" + goldTotFnWtTyp +
                    "&goldRate=" + goldRate + "&srTotFnWt=" + srTotFnWt + "&srTotFnWtTyp=" + srTotFnWtTyp + "&srRate=" + srRate + "&udhaarAmt=" + udhaarAmt + "&udharGdWt=" + udharGdWt + "&udharGdWtType=" + udharGdWtType +
                    "&udharSrWt=" + udharSrWt + "&udharSrWtType=" + udharSrWtType + "&goldTotpurBal=" + goldTotpurBal + "&goldTotpurBalType=" + goldTotpurBalType + "&silverTotPurBal=" + silverTotPurBal + "&silverTotPurBalType=" + silverTotPurBalType + "&udhaarFinalBalLeft=" + udhaarFinalBalLeft + "&totOthrChrg=" + totOthrChrg + "&slPrId=" + slPrId + "&slPrPreInvoiceNo=" + slPrPreInvoiceNo + "&slPrInvoiceNo=" + slPrInvoiceNo, true);
        }
        xmlhttp.send();
    }
}
/********End code to add to slPrId Id slPrPreInvoiceNo, slPrInvoiceNo @AUTHOR:ANUJA01DEC15******************************/
/********End code to add to slPrId Id @Author:ANUJA31OCT15******************************/
/********End code to add to udhaarFinalBalLeft,totOthrChrg etc option in NoRateCut condition @Author:ANUJA19OCT15******************************/
/********End code to add to udharGdWt,udharSrWt,udharSrWtType goldTotpurBal,goldTotpurBalType,silverTotPurBal,silverTotPurBalTypeand,goldVal, srVal etc option in NoRateCut condition @Author:ANUJA28MAY15******************************/
/********Start code to add to udharGdWt,udharSrWt,udharSrWtType goldTotpurBal,goldTotpurBalType,silverTotPurBal,silverTotPurBalTypeand etc option @Author:ANUJA28APR15***********/
/********End code to add to get Rate cut option @Author:23MAR15*******************************/
function getItemDetInPurchase(panel) {
    loadXMLDoc();
    var ntWeight = document.getElementById("slPrItemGSW").value;
    var ntWeighTyp = document.getElementById("slPrItemGSWT").value;
    var metalType = document.getElementById("slPrItemMetal").value;
    var itemName = document.getElementById("slPrItemName").value;
    var preId = document.getElementById("slPrItemPreId").value;
    var postId = document.getElementById("slPrItemPostId").value;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            var strArray = new Array();
            strArray = str.split("*");
            if (strArray[0] == 'EXCEEDS') {
                alert("Gross weight exceeding available weight !\n Please enter correct weight !");
                return false;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogspitch.php?netWeight=" + ntWeight + "&netWeighTyp=" + ntWeighTyp + "&metalType=" + metalType + "&itemName=" + itemName
            + "&preId=" + preId + "&postId=" + postId + "&panel=" + panel, true);
    xmlhttp.send();
}

function changeAddPrinTransIntTypeOpt(documentRootPath, simpleOrCompIntOption, girviCompoundedOption, omPanelDiv, grvRelPayDetails, selMonthlyIntOpt, princAmount, ROIValue,
        interestType, girviDate, girviType, girviId, custId, girviStatus, transId, girviDOB, girviFirmId, girviSerialNum, girviHindiDOB) {
    changeIntOptPanel = omPanelDiv;
    document.getElementById("ajaxLoadCustGirviDetailsDiv").style.visibility = "visible";
    selectedROIValue = ROIValue;
    if (girviStatus == 'Transferred') {
        relDateDDValue = document.getElementById('DOBTransDay').value;
        relDateMMValue = document.getElementById('DOBTransMonth').value;
        relDateYYValue = document.getElementById('DOBTransYear').value;
    } else if (girviStatus == 'Released') {
        relDateDDValue = '';
        relDateMMValue = '';
        relDateYYValue = '';
    } else {
        relDateDDValue = document.getElementById('DOBDay').value;
        relDateMMValue = document.getElementById('DOBMonth').value;
        relDateYYValue = document.getElementById('DOBYear').value;
    }


    var poststr = "gMonthIntOption=" + selMonthlyIntOpt.value + "&princAmount=" + princAmount
            + "&ROIValue=" + selectedROIValue + "&interestType=" + interestType.value
            + "&girviDate=" + girviDate + "&girviId=" + girviId + "&custId=" + custId + "&omPanelDiv=" + omPanelDiv
            + "&girviType=" + girviType + "&grvRelPayDetails=" + grvRelPayDetails + "&girviStatus=" + girviStatus
            + "&relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
            + "&simpleOrCompIntOption=" + simpleOrCompIntOption + "&girviCompoundedOption=" + girviCompoundedOption
            + "&girviAddROINotChange=No" + "&transId=" + transId + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId
            + "&girviSerialNum=" + girviSerialNum + "&girviHindiDOB=" + girviHindiDOB;
    if (girviStatus == 'Transferred') { //CHANGE IN VARIABLE @AUTHOR: SANDY14JAN14
        change_int_type_opt(documentRootPath + '/include/php/olgggtta.php', poststr); //change in filename @AUTHOR: SANDY20NOV13
    } else {
        change_int_type_opt(documentRootPath + '/include/php/olggttam.php', poststr); //changes in navigation AS per new filename @AUTHOR: SANDY20NOV13
    }
    change_int_type_option_db(documentRootPath + '/include/php/olguindb.php', poststr); //change in filename @AUTHOR: SANDY21NOV13
    return false;
}
function getUdhaarList() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omuupnal.php", true);
    xmlhttp.send();
}
//
// START CODE FOR ADD NEW METAL REC/PAID ENTRY - MAIN ENTRY UPDATE TIME - NEW FUNCTIONALITY @PRIYANKA-18MAR2019
function getWholeMoreRawMetalDiv(metalCnt, panelName, firmId, rawGdPreId, rawGdPostId, metalType,
        rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
        metalPanelName, mcntr, rawPreId, rawPostId,
        gMetalAvgRate, sMetalAvgRate, userId ,prefix) {
    metalPanel = panelName;
    metalCount = metalCnt;

    //alert('metalType == ' + metalType);
    //alert('metalCount == ' + metalCount);
    //alert('panelName == ' + panelName);

    //alert('noOfRawMet == ' + document.getElementById('noOfRawMet').value);
    //alert('metalCount == ' + document.getElementById('metalCount').value);

    //alert('panelName == ' + panelName);

    if (metalCount != '') {
        getMetalDiv = metalCount;
    }

    var poststr = "metalDivCount=" + metalCount + "&panelName=" + panelName + "&firmId=" + firmId +
            "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&metalType=" + metalType + "&rawSlPreId=" + rawSlPreId +
            "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId +
            "&rawAlPostId=" + rawAlPostId + "&metalPanelName=" + metalPanelName +
            "&mcntr=" + mcntr + "&rawPreId=" + rawPreId + "&rawPostId=" + rawPostId +
            "&gMetalAvgRate=" + gMetalAvgRate + "&sMetalAvgRate=" + sMetalAvgRate + "&userId=" + userId + "&prefix=" + prefix;

    if (panelName == 'SuppRawDep')
        get_more_raw_metal_div('include/php/ogwurwdv.php', poststr);
    else
        get_more_raw_metal_div('include/php/omspwhpy_discup.php', poststr);

    return false;
}
// END CODE FOR ADD NEW METAL REC/PAID ENTRY - MAIN ENTRY UPDATE TIME - NEW FUNCTIONALITY @PRIYANKA-18MAR2019
//
function getWholeRawMetalType(panelName, metalType, metalCount, firmId, rawGdPreId,
        rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
        metalTypePanel, cntr, gMetalAvgRate, sMetalAvgRate, stMetalAvgRate, userId) {
    //
    //alert('panelName == ' + panelName);
    //alert('userId == ' + userId);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName != 'Estimate') {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            }
            document.getElementById("rawMetalIdDiv" + metalCount).innerHTML = xmlhttp.responseText;
            // calcItemBalance();
        } else {
            if (panelName != 'Estimate') {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        }
    };
    if (panelName == 'SuppRawDep') {
        xmlhttp.open("POST", "include/php/ogwurwdv.php?panelName=" + panelName + "&metalType=" + metalType +
                "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
                "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&firmId=" + firmId +
                "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr, true);
        xmlhttp.send();
    } else if (panelName == 'Estimate') {
        xmlhttp.open("POST", "include/php/omestimaterawmetalsubdiv.php?panelName=" + panelName + "&metalType=" + metalType +
                "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
                "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId +
                "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
                "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr + "&gMetalAvgRate=" + gMetalAvgRate +
                "&sMetalAvgRate=" + sMetalAvgRate + "&stMetalAvgRate=" + stMetalAvgRate +
                "&userId=" + userId, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("POST", "include/php/omspwhpy_discup.php?panelName=" + panelName + "&metalType=" + metalType +
                "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
                "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId +
                "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
                "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr + "&gMetalAvgRate=" + gMetalAvgRate +
                "&sMetalAvgRate=" + sMetalAvgRate + "&stMetalAvgRate=" + stMetalAvgRate +
                "&userId=" + userId, true);
        xmlhttp.send();
    }

}
function getAdhikMonthFromYear(year, todayMonth, divId, monthId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olgadtmn.php?year=" + year + "&todayMonth=" + todayMonth + "&monthId=" + monthId, true);
    xmlhttp.send();
}
function getRelAdhikMonthFromYear(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviROI, monthlyInterestType, simpleOrCompIntOption, girviCompoundedOption,
        princAmount, interestType, girviDOB, girviId, custId, girviType, panel, girviStatus, girviHindiDOB, dateCompare, girviDOBTithi, girviDOBPaksha, girviHindiTithi,
        girviHindiPaksha, year, todayMonth, panelName, auctionPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("monthIdDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    setReleaseDatePanel = panel;
    girviCurrentStatus = girviStatus;
    var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
            + "&ROIValue=" + girviROI.value + "&gMonthIntOption=" + monthlyInterestType.value
            + "&simpleOrCompIntOption=" + simpleOrCompIntOption.value + "&girviCompoundedOption=" + girviCompoundedOption.value
            + "&princAmount=" + princAmount + "&interestType=" + interestType.value
            + "&girviDate=" + girviDOB + "&girviId=" + girviId + "&custId=" + custId
            + "&girviType=" + girviType + "&girviStatus=" + girviCurrentStatus + "&grvRelPayDetails=TRUE"
            + "&omPanelDiv=" + panel + "&girviHindiDOB=" + girviHindiDOB + "&dateChangeOpt=relDateChange"
            + "&girviDOBTithi=" + girviDOBTithi + "&girviDOBPaksha=" + girviDOBPaksha
            + "&relGirviHindiTithi=" + girviHindiTithi + "&relGirviHindiPaksha=" + girviHindiPaksha + "&year=" + year + "&todayMonth=" + todayMonth
            + "&panelName=" + panelName + "&auctionPanel=" + auctionPanel;
    xmlhttp.open("POST", "include/php/olgrvkmo.php?" + poststr, true);
    xmlhttp.send();
}

function getPrinRelAdhikMonthFromYear(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviROI, princAmount, interestType, girviDate, girviId, custId, girviType, girviUpdSts,
        gMonthIntOption, gCurrentAddPrinDiv, omPanelDiv, girviHindiDOB, principalEngDOB, lastDayInt, year, todayMonth) {
    girviCurrentAddPrinDiv = gCurrentAddPrinDiv;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addPrinRelMonthIdDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
            + "&ROIValue=" + girviROI.value + "&princAmount=" + princAmount + "&interestType=" + interestType
            + "&girviDate=" + girviDate + "&girviId=" + girviId + "&custId=" + custId + "&omPanelDiv=" + omPanelDiv
            + "&girviType=" + girviType + "&girviStatus=" + girviUpdSts + "&gMonthIntOption=" + gMonthIntOption + "&girviCurrentAddPrinDiv=" + girviCurrentAddPrinDiv
            + "&grvRelPayDetails=False" + "&girviHindiDOB=" + girviHindiDOB + "&dateChangeOpt=relDateChange" + "&year=" + year + "&todayMonth=" + todayMonth;
    xmlhttp.open("POST", "include/php/olgprdmo.php?" + poststr, true);
    xmlhttp.send();
}

function girviDepAdhikMonthFromYear(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviDepositPrinAmount, girviDepositIntAmount, girviROI, princAmount,
        interestType, girviDOB, girviDateStr, girviId, custId, girviType, girviUpdSts, simpleOrCompIntOption, girviCompoundedOption, girviHindiDOB, dateCompare, year, todayMonth,
        girviDOBTithi, girviDOBPaksha, girviHindiTithi, girviHindiPaksha) {

    girviCurrentStatus = 'girviUpdateGirviResultDiv';
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviDepMonthId").innerHTML = xmlhttp.responseText;
//            changeGirviUpdateDateHindiVikSam(documentRootPath, relDateDDValue, relDateMMValue, relDateYYValue, girviDepositPrinAmount, girviDepositIntAmount, girviROI, princAmount,
//                    interestType, girviDOB, girviDateStr, girviId, custId, girviType, girviUpdSts, simpleOrCompIntOption, girviCompoundedOption, girviHindiDOB, dateCompare,
//                    girviDOBTithi, girviDOBPaksha, girviHindiTithi, girviHindiPaksha);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    var poststr = "relDateDDValue=" + relDateDDValue + "&relDateMMValue=" + relDateMMValue + "&relDateYYValue=" + relDateYYValue
            + "&girviDepositPrinAmount=" + girviDepositPrinAmount + "&girviDepositIntAmount=" + girviDepositIntAmount
            + "&ROIValue=" + girviROI.value + "&princAmount=" + princAmount + "&interestType=" + interestType.value
            + "&girviDate=" + girviDOB + "&girviId=" + girviId + "&custId=" + custId
            + "&girviType=" + girviType + "&girviStatus=" + girviUpdSts + "&grvRelPayDetails=False" + "&simpleOrCompIntOption=" + simpleOrCompIntOption +
            "&girviCompoundedOption=" + girviCompoundedOption + "&girviHindiDOB=" + girviHindiDOB + "&dateChangeOpt=relDateChange" + "&year=" + year + "&todayMonth=" + todayMonth
            + "&girviDOBTithi=" + girviDOBTithi + "&girviDOBPaksha=" + girviDOBPaksha
            + "&relGirviHindiTithi=" + girviHindiTithi + "&relGirviHindiPaksha=" + girviHindiPaksha;
    xmlhttp.open("POST", "include/php/olgmdvkmo.php?" + poststr, true);
    xmlhttp.send();
}
/*******Start code to add cust details navigation function  @OMMODTAG PRIYA_28MAY15********/
function custDetailsNavigation(pageNo, panel, rowsPerPage, noOfPagesAsLink, selFirmId, sortKeyword, searchColumn, searchValue, sNo, panel, staffId, custInterest) {
    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.barcode_search.barcode_text.focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("customerDetails").innerHTML = xmlhttp.responseText;
                if (pageNo >= 10) {
                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/omccdtlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn +
                "&searchValue=" + searchValue + "&sNo=" + sNo + "&panel=" + panel + "&searchStaffId=" + staffId + "&custInterest=" + custInterest, true);
        xmlhttp.send();
    }
}
function custDetailsNumberOfRows(documentRootPath, rowsPerPage, selFirmId, sortKeyword, pageNum, searchColumn, searchValue, updateRows, sNo, panel, staffId, custInterest)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("customerDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omccdtlt.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword +
            "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows + "&sNo=" + sNo + "&panel=" + panel
            + "&searchStaffId=" + staffId + "&custInterest=" + custInterest, true);
    xmlhttp.send();
}
/*******End code to add cust details navigation function  @OMMODTAG PRIYA_28MAY15************/
// ****************************************************************************************************************//
// START CODE FOR FUNCTION TO LESS STONE WT FROM GS WT OR NT WT @PRIYANKA-25FEB18
// ****************************************************************************************************************//
function getItemLessWtBy(div, id, keyCodeInput, autoChk, count, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('sttrStoneLessWtBy').focus();
                document.getElementById('sttrStoneLessWtBy').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/omadlesswt.php?div=" + div + "&panel=" + panel + "&id=" + id + "&count=" + count + "&autoChk=" + autoChk, true);
    xmlhttp.send();
}
// ****************************************************************************************************************//
// END CODE FOR FUNCTION TO LESS STONE WT FROM GS WT OR NT WT @PRIYANKA-25FEB18
// ****************************************************************************************************************//
//
// ****************************************************************************************************************//
// START CODE for Making Charges apply on GS WT, NT WT or FFine WT @PRIYANKA-28MAR18
// ****************************************************************************************************************//
function getItemMkgChrgsByWt(div, id, keyCodeInput) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('addItemMkgChgBy').focus();
                document.getElementById('addItemMkgChgBy').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omialbsl.php?div=" + div + "&id=" + id, true);
    xmlhttp.send();
}
// ****************************************************************************************************************//
// END CODE for Making Charges apply on GS WT, NT WT or FFine WT @PRIYANKA-28MAR18
// ****************************************************************************************************************//
// 
// ****************************************************************************************************************//
// START CODE for Labour Charges By GS WT, NT WT or FFine WT @PRIYANKA-07MAY18
// ****************************************************************************************************************//
function getStockTransLabChargesDropdown(div, panel, prodCount, process, documentRootPath, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('addItemLabChgBy').focus();
                document.getElementById('addItemLabChgBy').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omStockTransFormLabChargesDropdown.php?inputGoogleSuggDivId=" + div + "&panel=" + panel + "&prodCount=" + prodCount + "&process=" + process, true);
    xmlhttp.send();
}
// ****************************************************************************************************************//
// END CODE for Labour Charges By GS WT, NT WT or FFine WT @PRIYANKA-07MAY18
// ****************************************************************************************************************//
//
// ****************************************************************************************************************//
// START CODE for Making Charges By GS WT, NT WT @PRIYANKA-30NOV18
// ****************************************************************************************************************//
function getStockTransMakingChargesDropdown(div, panel, prodCount, process, documentRootPath, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('prodMakingChrgBy').focus();
                document.getElementById('prodMakingChrgBy').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/stock/omStockTransFormMakingChargesDropdown.php?inputGoogleSuggDivId=" + div + "&panel=" + panel + "&prodCount=" + prodCount + "&process=" + process, true);
    xmlhttp.send();
}
// ****************************************************************************************************************//
// END CODE for Making Charges By GS WT, NT WT @PRIYANKA-30NOV18
// ****************************************************************************************************************//
//
function getStockTransGSWTDropdown(div, prodCount, mainProdCount, process, documentRootPath, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById(div).focus();
                document.getElementById(div).options[0].selected = true;
            }
        }
    };
    //
    xmlhttp.open("POST", documentRootPath + "/include/php/stock/omStockTransFormGSWTDropdown.php?inputGoogleSuggDivId=" + div + "&prodCount=" + prodCount + "&mainProdCount=" + mainProdCount + "&process=" + process, true);
    //
    xmlhttp.send();
}
//
//***************************************************************************************************************
// START CODE TO ADD FUNCTION FOR Add Stock - Customer Wastage By GS, NT, FN Wt @PRIYANKA-07SEP2018
//***************************************************************************************************************
function custWastageByWt(div, id, keyCodeInput, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('custWastgBy').focus();
                document.getElementById('custWastgBy').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/omctwstgby.php?div=" + div + "&panel=" + panel + "&id=" + id, true);
    xmlhttp.send();
}
//***************************************************************************************************************
// END CODE TO ADD FUNCTION FOR Add Stock - Customer Wastage By GS, NT, FN Wt @PRIYANKA-07SEP2018
//***************************************************************************************************************
//
//
//***************************************************************************************************************
// START CODE TO ADD FUNCTION FOR FINAL VALUATION BY GS WT, NT WT, FN WT, FFN WT @PRIYANKA-07MAR19
//***************************************************************************************************************
function getProdFinalValuationBy(div, id, keyCodeInput, panel, documentRootPath) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('finalValuationBy').focus();
                document.getElementById('finalValuationBy').options[0].selected = true;
            }
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/omadfnlvalby.php?div=" + div + "&panel=" + panel + "&id=" + id, true);
    xmlhttp.send();
}
//
//***************************************************************************************************************
// END CODE TO ADD FUNCTION FOR FINAL VALUATION BY GS WT, NT WT, FN WT, FFN WT @PRIYANKA-07MAR19
//***************************************************************************************************************

function updateGirviTimePeriodInt(documentRootPath, custId, girviId, timePeriod, girviJrnlId, girviDOB, girviFirmId, girviSerialNum) {
    loadXMLDoc();
    if (validateEmptyField(document.getElementById("updateTimePeriod").value, "Please enter Time Period!") == false) {
        document.getElementById("updateTimePeriod").focus();
        return false;
    } else {
        confirm_box = confirm("Do you really want to update Time Period?");
        if (confirm_box == true)
        {
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
                }
            }
            var poststr = "timePeriod=" + timePeriod + "&custId=" + custId + "&girviId=" + girviId
                    + "&girviJrnlId=" + girviJrnlId
                    + "&girviDOB=" + girviDOB + "&girviFirmId=" + girviFirmId + "&girviSerialNum=" + girviSerialNum;
        }
    }
    xmlhttp.open("POST", "include/php/oltpupdvint.php?" + poststr, true);
    xmlhttp.send();
    return false;
}

//****************************26APRIL 2019 (HEMA)************************************//
function addMaster()
{
    if (validateEmptyField(document.getElementById("user_fname").value, "Please select user name!") == false) {
        document.getElementById("user_fname").focus();
        return false;
    }
}


//***************************************************************************************************************
// START CODE TO ADD FUNCTION FOR PRN PRINT BY BARCODE AND REFERENCEID @RUTUJA-20MAY2020
//***************************************************************************************************************
function prnPrintByReference(prnPrintByBarcodeFrom, prnPrintByBarcodeTo, prnPrintByReferenceFrom, prnPrintByReferenceTo, prnPrintByRangeOption)
{
    if (typeof (document.getElementById('imiPrnPrintByRange')) != 'undefined' &&
            (document.getElementById('imiPrnPrintByRange') != null)) {
        // PRODUCT TYPE @PRIYANKA-28JAN19
        var ImiPrnPrintByRange = document.getElementById('imiPrnPrintByRange').value;
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barcodePrintInRangeDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (ImiPrnPrintByRange == 'YES') {
        xmlhttp.open("POST", "include/php/omPrnPrintByRange.php?prnPrintByBarcodeFrom=" + prnPrintByBarcodeFrom + "&prnPrintByBarcodeTo=" + prnPrintByBarcodeTo + "&prnPrintByReferenceFrom=" + prnPrintByReferenceFrom + "&prnPrintByReferenceTo=" + prnPrintByReferenceTo + "&prnPrintByRangeOption=" + prnPrintByRangeOption + "&ImiPrnPrintByRange=" + ImiPrnPrintByRange, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("POST", "include/php/omPrnPrintByRange.php?prnPrintByBarcodeFrom=" + prnPrintByBarcodeFrom + "&prnPrintByBarcodeTo=" + prnPrintByBarcodeTo + "&prnPrintByReferenceFrom=" + prnPrintByReferenceFrom + "&prnPrintByReferenceTo=" + prnPrintByReferenceTo + "&prnPrintByRangeOption=" + prnPrintByRangeOption, true);
        xmlhttp.send();
    }
    return false;
}
function loadImageForPRNFileFromTagPanel() {
    setTimeout(function () {
        parent.location = 'localexplorer:C:/OMPRN/omprn.bat';
    }, 1000);
}
//***************************************************************************************************************
// END CODE TO ADD FUNCTION FOR PRN PRINT BY BARCODE AND REFERENCEID @RUTUJA-20MAY2020
//***************************************************************************************************************
//
// ===================================================================================================== //
// START CODE TO ADD FUNCTION FOR SHOWING DROPDOWN FOR CUST WASTGAE BY OPTION @AUTHOR:MADHUREE-12NOV2020 //
// ===================================================================================================== //
//
function getStockTransValueAddedDropdown(div, panel, prodCount, process, documentRootPath, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('prodMakingChrgBy').focus();
                document.getElementById('prodMakingChrgBy').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/stock/omStockTransFormCustWastageDropdown.php?inputGoogleSuggDivId=" + div + "&panel=" + panel + "&prodCount=" + prodCount + "&process=" + process, true);
    xmlhttp.send();
}
//
// =================================================================================================== //
// END CODE TO ADD FUNCTION FOR SHOWING DROPDOWN FOR CUST WASTGAE BY OPTION @AUTHOR:MADHUREE-12NOV2020 //
// =================================================================================================== //
//
//
// ======================================================================================================== //
// START CODE TO ADD FUNCTION FOR SHOWING DROPDOWN FOR FINAL VALUATION BY OPTION @AUTHOR:MADHUREE-05DEC2020 //
// ======================================================================================================== //
//
function getStockTransFinalValDropdown(div, panel, arrStockFormFieldSequence, prodCount, process, documentRootPath, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById(div).focus();
                document.getElementById(div).options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/stock/omStockTransFormFinalValDropdown.php?inputGoogleSuggDivId=" + div + "&panel=" + panel + "&arrStockFormFieldSequence=" + arrStockFormFieldSequence + "&prodCount=" + prodCount + "&process=" + process, true);
    xmlhttp.send();
}
//
// ====================================================================================================== //
// END CODE TO ADD FUNCTION FOR SHOWING DROPDOWN FOR FINAL VALUATION BY OPTION @AUTHOR:MADHUREE-05DEC2020 //
// ====================================================================================================== //
//
// ======================================================================================================== //
// START CODE TO ADD FUNCTION FOR SHOWING DROPDOWN FOR FINAL VALUATION BY OPTION @AUTHOR:MADHUREE-05DEC2020 //
// ======================================================================================================== //
//
function getStockTransValueAddedAmountDropdown(div, panel, arrStockFormFieldSequence, prodCount, process, documentRootPath, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById(div).focus();
                document.getElementById(div).options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/stock/omStockTransValueAddedAmountDropdown.php?inputGoogleSuggDivId=" + div + "&panel=" + panel + "&arrStockFormFieldSequence=" + arrStockFormFieldSequence + "&prodCount=" + prodCount + "&process=" + process, true);
    xmlhttp.send();
}
//
// ====================================================================================================== //
// END CODE TO ADD FUNCTION FOR SHOWING DROPDOWN FOR FINAL VALUATION BY OPTION @AUTHOR:MADHUREE-05DEC2020 //
// ====================================================================================================== //
//
//
//
//
// ======================================================================================================== //
// START CODE TO ADD FUNCTION FOR METAL FORM B2 (METAL TYPE CHANGE) @AUTHOR:PRIYANKA-29APR2021              //
// ======================================================================================================== //
function getMetalTypeFunc(div, id, keyCodeInput, mainPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('addItemMetSelBy').focus();
                document.getElementById('addItemMetSelBy').options[0].selected = true;
            }
        }
    };
    var documentRootPath = document.getElementById('documentRootPath').value;
    xmlhttp.open("POST", documentRootPath + "/include/php/omiamtsl.php?id=" + id + "&div=" + div + "&mainPanel=" + mainPanel, true);
    xmlhttp.send();
}
// ======================================================================================================== //
// END CODE TO ADD FUNCTION FOR METAL FORM B2 (METAL TYPE CHANGE) @AUTHOR:PRIYANKA-29APR2021                //
// ======================================================================================================== //
function reverseCalcOfPaymentOnPurchase() {
    var sttr_final_valuation_by = document.getElementById('sttr_final_valuation_by').value;
    var sttr_gs_weight = document.getElementById('sttr_gs_weight').value;
    var sttr_gs_weight_type = document.getElementById('sttr_gs_weight_type').value;
    var sttr_nt_weight = document.getElementById('sttr_nt_weight').value;
    var sttr_fn_weight = document.getElementById('sttr_fine_weight').value;
    var sttr_ffn_weight = document.getElementById('sttr_final_fine_weight').value;
    var totalFinalValuation = document.getElementById('sttr_final_valuation').value;
    var metalType = document.getElementById('sttr_metal_type').value;
    var weightForMetalCal = 0;
    var weightIdForMetalCal = "";
    var metalRate = document.getElementById('sttr_metal_rate').value;
    var metalPurity = document.getElementById('sttr_purity').value;
    var finalMetalPurity = document.getElementById('sttr_final_purity').value;
    var weightTypeForMetalCal = sttr_gs_weight_type;
    //
    //alert(sttr_final_valuation_by);
    //
    if (sttr_final_valuation_by == 'byGrossWt') {
        weightForMetalCal = sttr_gs_weight;
        weightIdForMetalCal = document.getElementById("sttr_gs_weight");
    } else if (sttr_final_valuation_by == 'byNetWt') {
        weightForMetalCal = sttr_nt_weight;
        weightIdForMetalCal = document.getElementById("sttr_nt_weight");
    } else if (sttr_final_valuation_by == 'byFineWt') {
        weightForMetalCal = sttr_fn_weight;
        weightIdForMetalCal = document.getElementById("sttr_fine_weight");
    } else if (sttr_final_valuation_by == 'byFFineWt') {
        weightForMetalCal = sttr_ffn_weight;
        weightIdForMetalCal = document.getElementById("sttr_final_fine_weight");
    } else {
        weightForMetalCal = sttr_ffn_weight;
        weightIdForMetalCal = document.getElementById("sttr_final_fine_weight");
    }
    //
    //alert(weightIdForMetalCal);
    //
    if (totalFinalValuation > 0 && totalFinalValuation != '' && totalFinalValuation != 'NaN') {
        document.getElementById('sttr_final_valuation').value = parseFloat(totalFinalValuation).toFixed(2);
    }
    //
    if (totalFinalValuation != '' && totalFinalValuation > 0 && weightForMetalCal > 0) {
        //
        if (document.getElementById('sttr_lab_charges').value != '') {
            document.getElementById('sttr_lab_charges').value = 0;
        }
        //
        if (metalType == 'Gold') {
            if (weightTypeForMetalCal == 'KG') {
                document.getElementById('sttr_metal_rate').value = ((totalFinalValuation / weightForMetalCal) / document.getElementById('gmWtInKg').value).toFixed(2);
            } else if (weightTypeForMetalCal == 'GM') {
                document.getElementById('sttr_metal_rate').value = ((totalFinalValuation / weightForMetalCal) * document.getElementById('gmWtInGm').value).toFixed(2);
            } else if (weightTypeForMetalCal == 'MG') {
                document.getElementById('sttr_metal_rate').value = ((totalFinalValuation / weightForMetalCal) * document.getElementById('gmWtInMg').value).toFixed(2);
            }
        } else if (metalType == 'Silver') {
            if (weightTypeForMetalCal == 'KG') {
                document.getElementById('sttr_metal_rate').value = ((totalFinalValuation / weightForMetalCal) / document.getElementById('srGmWtInKg').value).toFixed(2);
            } else if (weightTypeForMetalCal == 'GM') {
                document.getElementById('sttr_metal_rate').value = ((totalFinalValuation / weightForMetalCal) * document.getElementById('srGmWtInGm').value).toFixed(2);
            } else if (weightTypeForMetalCal == 'MG') {
                document.getElementById('sttr_metal_rate').value = ((totalFinalValuation / weightForMetalCal) * document.getElementById('srGmWtInMg').value).toFixed(2);
            }
        }
    } else if (totalFinalValuation != '' && totalFinalValuation > 0 && metalRate > 0 && metalPurity != '') {
        //
        if (document.getElementById('sttr_lab_charges').value != '') {
            document.getElementById('sttr_lab_charges').value = 0;
        }
        //
        if (metalType == 'Gold') {
            if (weightTypeForMetalCal == 'KG') {
                weightIdForMetalCal.value = ((totalFinalValuation / metalRate) / document.getElementById('gmWtInKg').value).toFixed(3);
            } else if (weightTypeForMetalCal == 'GM') {
                weightIdForMetalCal.value = ((totalFinalValuation / metalRate) * document.getElementById('gmWtInGm').value).toFixed(3);
            } else if (weightTypeForMetalCal == 'MG') {
                weightIdForMetalCal.value = ((totalFinalValuation / metalRate) * document.getElementById('gmWtInMg').value).toFixed(3);
            }
        } else if (metalType == 'Silver') {
            if (weightTypeForMetalCal == 'KG') {
                weightIdForMetalCal.value = ((totalFinalValuation / metalRate) / document.getElementById('srGmWtInKg').value).toFixed(3);
            } else if (weightTypeForMetalCal == 'GM') {
                weightIdForMetalCal.value = ((totalFinalValuation / metalRate) * document.getElementById('srGmWtInGm').value).toFixed(3);
            } else if (weightTypeForMetalCal == 'MG') {
                weightIdForMetalCal.value = ((totalFinalValuation / metalRate) * document.getElementById('srGmWtInMg').value).toFixed(3);
            }
        }
        //
        if (document.getElementById("sttr_gs_weight").value == '' || document.getElementById("sttr_gs_weight").value == 'NaN') {
            document.getElementById("sttr_gs_weight").value = 0;
        }
        if (document.getElementById("sttr_pkt_weight").value == '' || document.getElementById("sttr_pkt_weight").value == 'NaN') {
            document.getElementById("sttr_pkt_weight").value = 0;
        }
        if (document.getElementById("sttr_nt_weight").value == '' || document.getElementById("sttr_nt_weight").value == 'NaN') {
            document.getElementById("sttr_nt_weight").value = 0;
        }
        if (document.getElementById("sttr_fine_weight").value == '' || document.getElementById("sttr_fine_weight").value == 'NaN') {
            document.getElementById("sttr_fine_weight").value = 0;
        }
        if (document.getElementById("sttr_final_fine_weight").value == '' || document.getElementById("sttr_final_fine_weight").value == 'NaN') {
            document.getElementById("sttr_final_fine_weight").value = 0;
        }
        //
        if (sttr_final_valuation_by == 'byGrossWt') {
            document.getElementById('sttr_nt_weight').value = parseFloat(parseFloat(document.getElementById("sttr_gs_weight").value) - parseFloat(document.getElementById('sttr_pkt_weight').value)).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(document.getElementById("sttr_gs_weight").value).toFixed(3);
        } else if (sttr_final_valuation_by == 'byNetWt') {
            document.getElementById('sttr_gs_weight').value = parseFloat(parseFloat(document.getElementById("sttr_nt_weight").value) + parseFloat(document.getElementById('sttr_pkt_weight').value)).toFixed(3);
            document.getElementById('sttr_nt_weight').value = parseFloat(parseFloat(document.getElementById("sttr_gs_weight").value) - parseFloat(document.getElementById('sttr_pkt_weight').value)).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(document.getElementById("sttr_gs_weight").value).toFixed(3);
        } else if (sttr_final_valuation_by == 'byFineWt') {
            document.getElementById('sttr_nt_weight').value = parseFloat(parseFloat(document.getElementById("sttr_fine_weight").value) / (metalPurity / 100)).toFixed(3);
            document.getElementById('sttr_gs_weight').value = parseFloat(parseFloat(document.getElementById("sttr_nt_weight").value) + parseFloat(document.getElementById('sttr_pkt_weight').value)).toFixed(3);
            document.getElementById('sttr_nt_weight').value = parseFloat(parseFloat(document.getElementById("sttr_gs_weight").value) - parseFloat(document.getElementById('sttr_pkt_weight').value)).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(document.getElementById("sttr_gs_weight").value).toFixed(3);
        } else if (sttr_final_valuation_by == 'byFFineWt') {
            document.getElementById('sttr_nt_weight').value = parseFloat(parseFloat(document.getElementById("sttr_final_fine_weight").value) / (finalMetalPurity / 100)).toFixed(3);
            document.getElementById('sttr_gs_weight').value = parseFloat(parseFloat(document.getElementById("sttr_nt_weight").value) + parseFloat(document.getElementById('sttr_pkt_weight').value)).toFixed(3);
            document.getElementById('sttr_nt_weight').value = parseFloat(parseFloat(document.getElementById("sttr_gs_weight").value) - parseFloat(document.getElementById('sttr_pkt_weight').value)).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(document.getElementById("sttr_gs_weight").value).toFixed(3);
        } else {
            document.getElementById('sttr_nt_weight').value = parseFloat(parseFloat(document.getElementById("sttr_final_fine_weight").value) / (finalMetalPurity / 100)).toFixed(3);
            document.getElementById('sttr_gs_weight').value = parseFloat(parseFloat(document.getElementById("sttr_nt_weight").value) + parseFloat(document.getElementById('sttr_pkt_weight').value)).toFixed(3);
            document.getElementById('sttr_nt_weight').value = parseFloat(parseFloat(document.getElementById("sttr_gs_weight").value) - parseFloat(document.getElementById('sttr_pkt_weight').value)).toFixed(3);
            document.getElementById('netWeight').value = parseFloat(document.getElementById("sttr_gs_weight").value).toFixed(3);
        }
        //
    }
    calcFuncSupplierFineJewelleryPurchase();
}
//**********************************************************************************************************************
//FUNCTION FOR CHECK HALL MARK UID IS ALERADY PRESENT OR NOT @ DARSHANA 10 AUG 2021
//**********************************************************************************************************************
function checkHallMarkUid(currentHallMark, documentRootPath, panelName, sttrId) {
    var result = "";
    $.ajax({
        async: false,
        type: "POST",
        url: documentRootPath + "/include/php/omhallmrkchk.php",
        data: {HallMarkUid: currentHallMark, panelName: panelName, sttrId: sttrId},
        success: function (data) {
            if (data == 'success')
                $("#userAlerts").html('');
            else
                $("#userAlerts").html(data);
            result = data;
        }
    });
    return result;
}
function navigateToCrystalByCtWtPanel(divPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omwgstctlt.php?divPanel=" + divPanel, true);
    xmlhttp.send();
}
function navigateToCrystalByGmWtPanel(divPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if(divPanel == 'crystalWtInCt'){
    xmlhttp.open("POST", "include/php/omcrywtinctreport.php?divPanel=" + divPanel, true); 
    }else{
    xmlhttp.open("POST", "include/php/omwgstgmlt.php?divPanel=" + divPanel, true);
    }
    xmlhttp.send();
}
//
function updateProductSectionforEcom(sttrId, productSection, pageNum) {
    loadXMLDoc();
    show = "no";
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("itemDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omadecomsection.php?sttrId=" + sttrId + "&productSection=" + productSection + "&pageNum=" + pageNum + "&show=" + show, true);
    xmlhttp.send();
}
//
//
function getWholeMoreEstimateRawMetalDiv(metalCnt, panelName, firmId, rawGdPreId, rawGdPostId, metalType,
        rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
        metalPanelName, mcntr, rawPreId, rawPostId,
        gMetalAvgRate, sMetalAvgRate, userId) {
    //
    metalPanel = panelName;
    metalCount = metalCnt;
    //
    //alert('metalType == ' + metalType);
    //alert('metalCount == ' + metalCount);
    //alert('panelName == ' + panelName);
    //
    //alert('noOfRawMet == ' + document.getElementById('noOfRawMet').value);
    //alert('metalCount == ' + document.getElementById('metalCount').value);
    //
    //alert('panelName == ' + panelName);
    //
    if (metalCount != '') {
        getMetalDiv = metalCount;
    }
    //
    var poststr = "metalDivCount=" + metalCount + "&panelName=" + panelName + "&firmId=" + firmId +
            "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&metalType=" + metalType + "&rawSlPreId=" + rawSlPreId +
            "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId +
            "&rawAlPostId=" + rawAlPostId + "&metalPanelName=" + metalPanelName +
            "&mcntr=" + mcntr + "&rawPreId=" + rawPreId + "&rawPostId=" + rawPostId +
            "&gMetalAvgRate=" + gMetalAvgRate + "&sMetalAvgRate=" + sMetalAvgRate + "&userId=" + userId;
    //
    get_more_raw_metal_div('include/php/omestimaterawmetalsubdiv.php', poststr);
    //
    return false;
    //
}
//
//
function calcEstimateStockItemBalance() {
    //
    //alert('metalPanel ==' +  document.getElementById('metalPanel').value);
    //
    var metalEntered = 0;
    var metalCount = document.getElementById("metalCount").value;
    var prefix = null;
    //
    if (document.getElementById('metalPanel').value == 'StockPayment' || document.getElementById('metalPanel').value == 'StockPayUp') {
        prefix = 'stock';
    } else if (document.getElementById('metalPanel').value == 'Estimate' || document.getElementById('metalPanel').value == 'SlPrPayment' || document.getElementById('metalPanel').value == 'SellPayUp') {
        prefix = 'slPr';
    } else if (document.getElementById('metalPanel').value == 'CustSellPayment' || document.getElementById('metalPanel').value == 'CustSellPayUp') {
        prefix = 'sell';
    } else if (document.getElementById('metalPanel').value == 'NwOrPayment' || document.getElementById('metalPanel').value == 'NwOrPayUp') {
        prefix = 'nwOr';
    } else if (document.getElementById('metalPanel').value == 'RawPayment' || document.getElementById('metalPanel').value == 'RawPayUp') {
        prefix = 'rwPr';
    } else if (document.getElementById('metalPanel').value == 'SuppAddOrder' || document.getElementById('metalPanel').value == 'SuppOrderUp') {
        prefix = 'spOr';
    }
    //
    if (document.getElementById('metalPanel').value == 'StockPayment' || document.getElementById('metalPanel').value == 'Estimate' ||
            document.getElementById('metalPanel').value == 'SlPrPayment' ||
            document.getElementById('metalPanel').value == 'CustSellPayment' || document.getElementById('metalPanel').value == 'NwOrPayment' ||
            document.getElementById('metalPanel').value == 'RawPayment' || document.getElementById('metalPanel').value == 'SuppAddOrder') {
        //
        if (document.getElementById('metalPanel').value == 'SlPrPayment' && document.getElementById('metalPanel').value == 'PaymentSaved') {
            if (document.getElementById('rawId').value != '') {
                count = document.getElementById('rawId').value;
            } else {
                count = 1;
            }
            if (document.getElementById('noOfRawMet').value != 0) {
                getMetalDiv = document.getElementById('noOfRawMet').value;
            }

        } else {
            count = 1;
        }
        //
        delId = 'del' + count;
        //
    } else if (document.getElementById('metalPanel').value == 'StockPayUp' || document.getElementById('metalPanel').value == 'SellPayUp' ||
            document.getElementById('metalPanel').value == 'CustSellPayUp' || document.getElementById('metalPanel').value == 'NwOrPayUp' ||
            document.getElementById('metalPanel').value == 'RawPayUp' || document.getElementById('metalPanel').value == 'SuppOrderUp') {
        //
        getMetalDiv = document.getElementById('noOfRawMet').value;
        //
        var count = document.getElementById('rawId').value;
        var delId = 'del' + count;
    }
    //
    //
    var totAmtRec = 0;
    var gdBal = 0;
    var slBal = 0;
    var totRecGd = 0;
    var totRecSl = 0;
    var goldWeight = 0;
    var silverWeight = 0;
    var silverWeightType = '';
    var goldWeightType = '';
    GoldWtType = '';
    SilverWtType = '';
    goldWtBal = 0;
    silverWtBal = 0;
    stockDiv = 'wholeSaleStock';
    //
    //
    for (var dc = count; getMetalDiv != ''; dc++) {
        //
        //
        if (document.getElementById('metalDel' + dc).value != 'Deleted') {
            //
            //
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
            //
            //
            var payTotalWeight1 = document.getElementById('sttr_nt_weight' + dc).value;
            var payTotalWeightType1 = document.getElementById('sttr_nt_weight_type' + dc).value;

            var payMetalRate1 = document.getElementById('sttr_metal_rate' + dc).value;

            var payMetalTunch1 = document.getElementById('sttr_purity' + dc).value;
            var metalWeight = (payTotalWeight1 * payMetalTunch1) / 100;

            var metalAvgRate = document.getElementById('PayMetal1AvgRate' + dc).value;
            var metalValByAvgRate = 0;

            document.getElementById('sttr_fine_weight' + dc).value = parseFloat(metalWeight).toFixed(3);

            if (document.getElementById('sttr_lab_charges' + dc).value == '' ||
                    document.getElementById('sttr_lab_charges' + dc).value == null) {
                document.getElementById('sttr_lab_charges' + dc).value = 0;
                document.getElementById('sttr_final_fine_weight' + dc).value = document.getElementById('sttr_fine_weight' + dc).value;
            }

            if (typeof (document.getElementById('sttr_final_fine_weight' + dc)) != 'undefined' &&
                    document.getElementById('sttr_final_fine_weight' + dc) != null) {
                if (document.getElementById('sttr_final_fine_weight' + dc).value > 0) {
                    metalWeight = document.getElementById('sttr_final_fine_weight' + dc).value;
                }
            }

            //alert('urdValuationBy == ' + document.getElementById('urdValuationBy').value);
            //alert('sttr_fine_weight == ' + document.getElementById('sttr_fine_weight' + dc).value);
            //alert('sttr_final_fine_weight == ' + document.getElementById('sttr_final_fine_weight' + dc).value);

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

            var metal_Rate_Int_Val = parseInt(payMetalRate1);
            var metal_Rate_Int_Val_Length = metal_Rate_Int_Val.toString().length;
            var metalType = document.getElementById('sttr_metal_type' + dc).value;

            if (metal_Rate_Int_Val_Length == 4 && (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold')) {
                document.getElementById('gmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
                document.getElementById('gmWtInGm').value = parseFloat(1).toFixed(2);
                document.getElementById('gmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
            } else if (metal_Rate_Int_Val_Length == 5 && (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold')) {
                document.getElementById('gmWtInKg').value = parseFloat(1000 / 10).toFixed(2);
                document.getElementById('gmWtInGm').value = parseFloat(10).toFixed(2);
                document.getElementById('gmWtInMg').value = parseFloat(1000 * 10).toFixed(2);
            } else if ((metal_Rate_Int_Val_Length == 5 || metal_Rate_Int_Val_Length == 4) && (metalType == 'Silver' || metalType == 'SILVER' || metalType == 'silver')) {
                document.getElementById('srGmWtInKg').value = parseFloat(1).toFixed(2);
                document.getElementById('srGmWtInGm').value = parseFloat(1000 * 1).toFixed(2);
                document.getElementById('srGmWtInMg').value = parseFloat((1000 * 1000) * 1).toFixed(2);
            } else if (metal_Rate_Int_Val_Length == 2 && (metalType == 'Silver' || metalType == 'SILVER' || metalType == 'silver')) {
                document.getElementById('srGmWtInKg').value = parseFloat(1000 * 1).toFixed(2);
                document.getElementById('srGmWtInGm').value = parseFloat(1).toFixed(2);
                document.getElementById('srGmWtInMg').value = parseFloat(1000 * 1).toFixed(2);
            } else if (metalType == 'Gold' || metalType == 'GOLD' || metalType == 'gold') {
                document.getElementById('gmWtInKg').value = parseFloat(document.getElementById('defaultGmWtInKg').value).toFixed(2);
                document.getElementById('gmWtInGm').value = parseFloat(document.getElementById('defaultGmWtInGm').value).toFixed(2);
                document.getElementById('gmWtInMg').value = parseFloat(document.getElementById('defaultGmWtInMg').value).toFixed(2);
            } else if (metalType == 'Silver' || metalType == 'SILVER' || metalType == 'silver') {
                document.getElementById('srGmWtInKg').value = parseFloat(document.getElementById('defaultSrGmWtInKg').value).toFixed(2);
                document.getElementById('srGmWtInGm').value = parseFloat(document.getElementById('defaultSrGmWtInGm').value).toFixed(2);
                document.getElementById('srGmWtInMg').value = parseFloat(document.getElementById('defaultSrGmWtInMg').value).toFixed(2);
            }

            if (document.getElementById('sttr_metal_type' + dc).value == 'Gold' ||
                    document.getElementById('sttr_metal_type' + dc).value == 'GOLD' ||
                    document.getElementById('sttr_metal_type' + dc).value == 'gold' ||
                    document.getElementById('sttr_metal_type' + dc).value == 'Alloy') {

                goldWeight = parseFloat(metalWeight);

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
            }

            if (document.getElementById('sttr_metal_type' + dc).value == 'Silver' ||
                    document.getElementById('sttr_metal_type' + dc).value == 'SILVER' ||
                    document.getElementById('sttr_metal_type' + dc).value == 'silver') {

                silverWeight = parseFloat(metalWeight);

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

            }

            if (document.getElementById('sttr_metal_type' + dc).value == 'crystal') {
                if (gsWtType == 'KG') {
                    document.getElementById('sttr_valuation' + dc).value = parseFloat((gsWt * payMetalRate1)).toFixed(2);
                } else if (gsWtType == 'GM') {
                    document.getElementById('sttr_valuation' + dc).value = parseFloat((gsWt * payMetalRate1)).toFixed(2);
                } else if (gsWtType == 'MG') {
                    document.getElementById('sttr_valuation' + dc).value = parseFloat((gsWt * payMetalRate1)).toFixed(2);
                } else if (gsWtType == 'CT') {
                    document.getElementById('sttr_valuation' + dc).value = parseFloat((gsWt * payMetalRate1)).toFixed(2);
                }

                metalValByAvgRate = parseFloat((gsWt * metalAvgRate)).toFixed(2);

            }

            if (document.getElementById('sttr_valuation' + dc).value == '') {
                document.getElementById('sttr_valuation' + dc).value = 0;
            }

            totAmtRec += parseFloat(document.getElementById('sttr_valuation' + dc).value);

        }
        //
        metalEntered++;
        //
    }
    //
    return false;
    //
}
//
//
function estimateRawMetalSubmit() {
    //
    var metalEntered = 0;
    var count = 1;
    var prefix = 'slPr';
    var metalCount = document.getElementById("metalCount").value;
    var getMetalDiv = document.getElementById('noOfRawMet').value;
    //
    if (getMetalDiv == '' || getMetalDiv == null) {
        getMetalDiv = 1;
    }
    //
    for (var dc = count; getMetalDiv != ''; dc++) {
        //
        if (document.getElementById('metalDel' + dc).value != 'Deleted') {
            //
            if (validateEmptyField(document.getElementById("sttr_gs_weight" + dc).value, "Please Enter Gross Weight!") == false ||
                    validateNumWithDot(document.getElementById("sttr_gs_weight").value, "Accept only numeric characters without space!") == false) {
                document.getElementById("sttr_gs_weight" + dc).focus();
                return false;
            } else if (validateEmptyField(document.getElementById("sttr_nt_weight" + dc).value, "Please Enter Net Weight!") == false ||
                    validateNumWithDot(document.getElementById("sttr_nt_weight" + dc).value, "Accept only numeric characters without space!") == false) {
                document.getElementById("sttr_nt_weight" + dc).focus();
                return false;
            } else if (validateEmptyField(document.getElementById("sttr_purity" + dc).value, "Please Enter Purity!") == false ||
                    validateNumWithDot(document.getElementById("sttr_purity" + dc).value, "Accept only numeric characters without space!") == false) {
                document.getElementById("sttr_purity" + dc).focus();
                return false;
            } else if (validateEmptyField(document.getElementById("sttr_valuation" + dc).value, "Please Enter Valuation!") == false ||
                    validateNumWithDot(document.getElementById("sttr_valuation" + dc).value, "Accept only numeric characters without space!") == false) {
                document.getElementById("sttr_valuation" + dc).focus();
                return false;
            } else if (document.getElementById("sttr_gs_weight" + dc).value == 0) {
                alert("Please Enter Gross Weight!");
                document.getElementById("sttr_gs_weight" + dc).focus();
                return false;
            } else if (document.getElementById("sttr_nt_weight" + dc).value == 0) {
                alert("Please Enter Net Weight!");
                document.getElementById("sttr_nt_weight" + dc).focus();
                return false;
            } else if (document.getElementById("sttr_purity" + dc).value == 0) {
                alert("Please Enter Purity!");
                document.getElementById("sttr_purity" + dc).focus();
                return false;
            } else if (document.getElementById("sttr_valuation" + dc).value == 0) {
                alert("Please Enter Valuation!");
                document.getElementById("sttr_valuation" + dc).focus();
                return false;
            }
            //
        }
        //
        metalEntered++;
        //
    }
}
//
//
function deleteEstimateRawMetal(rawMetalId, custId, rawMetalPreInvNo, rawMetalInvNo, firmId, panelName) {
    //
    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");
    //
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("estimateRawMetalReceivedPanel").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
    }
    //
    xmlhttp.open("GET", "include/php/omEstimateRawMetalDel" + default_theme + ".php?custId=" + custId + "&userId=" + custId +
            "&rawMetalId=" + rawMetalId + "&firmId=" + firmId + "&rawMetalPreInvNo=" + rawMetalPreInvNo + "&rawMetalInvNo=" + rawMetalInvNo +
            "&panelName=" + panelName, true);
    //
    xmlhttp.send();
    //
}
//
//
