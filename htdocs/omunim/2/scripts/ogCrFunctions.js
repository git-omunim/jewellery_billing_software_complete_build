// Start Code To Add  Crystal Panel
function showAddCrystalPanel(panel) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/ogcraddv" + default_theme + ".php", true);
    xmlhttp.send();
}
// START Code To Add  strellering silver Panel author:DIKSHA06OCT2018
function showAddstrelleringPanel(panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omijsdv.php", true);
    xmlhttp.send();
}

// END Code To Add  strellering silver Panel author:DIKSHA06OCT2018
// Strat Code To Add  strellering silver List Panel author:DIKSHA10OCT2018
function showStrelleringSilverListPanel(panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'StrelleringSilverList')
    {
        xmlhttp.open("POST", "include/php/ompurchaselist.php?panelName=" + panel, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("POST", "include/php/ompurchase.php?panelName=" + panel, true);
        xmlhttp.send();
    }

}
// END Code To Add  strellering silver List Panel author:DIKSHA10OCT2018
// Start Code To Add  Crystal PurchasePanel
//**********Start code to Crystal PurchasePanel in add stock panel:Author:ATHU2JUN17
function showCystalPurchaseListPanel(panel) {
    loadXMLDoc();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }

    };
    if (panel == 'CrystalList')
    {
        xmlhttp.open("POST", "include/php/ompurchaselist.php?panelName=" + panel, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("POST", "include/php/ompurchase.php?panelName=" + panel, true);
        xmlhttp.send();
    }

}
//
function showRetailStockByCategory(panel) {
    loadXMLDoc();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }

    };
    if (panel == 'retail')
    {
        xmlhttp.open("POST", "include/php/omavablretailstockbycategory.php?panelName=" + panel, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("POST", "include/php/ompurchase.php?panelName=" + panel, true);
        xmlhttp.send();
    }

}

// Start Code To Add  Crystal Sold Out List Panel
function showCrystalSoldOutListPanel(panel, custId) {
    // alert(panel);
    loadXMLDoc();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("sellMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }

    };
    // file changd below sent main panel name insted of panel @Author:SHE23FEB15
    if (panel == 'ReturnedItemList')
        xmlhttp.open("GET", "include/php/ogspisdv.php?custId=" + custId + "&sellPanel=" + panel + "&mainPanel=ReturnedItemList", true);
    else
        xmlhttp.open("GET", "include/php/ogspisdv.php?custId=" + custId + "&sellPanel=" + panel + "&crystalPanel=CrystalSoldOutList&mainPanel=SoldOutList", true);
    xmlhttp.send();
}

//   Start Code For exist Stock Functionality
function addCrystalExistingItemDiv(newPreInvoiceNo, newInvoiceNo, panelName, stockType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addCrystalCurrentInvoice").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogcriaex.php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&panelName=" + panelName + "&stockType=" + stockType, true);
    xmlhttp.send();
}


function calcTotalTaxByCryTotalPrice() {
        var mkgchrg=0;
    if(document.getElementById('sttr_total_lab_charges').value != ''){
        mkgchrg= parseFloat(document.getElementById('sttr_total_lab_charges').value);
    }

    if (document.getElementById('sttr_valuation').value == 'NaN' || document.getElementById('sttr_valuation').value == '') {
        document.getElementById('sttr_valuation').value = 0;
    }

    if (document.getElementById('sttr_tot_price_cgst_per').value > 0 || document.getElementById('sttr_tot_price_igst_per').value > 0) {

        var CGSTTax = parseFloat(document.getElementById('sttr_valuation').value * (document.getElementById('sttr_tot_price_cgst_per').value / 100));
        var SGSTTax = parseFloat(document.getElementById('sttr_valuation').value * (document.getElementById('sttr_tot_price_sgst_per').value / 100));
        var IGSTTax = parseFloat(document.getElementById('sttr_valuation').value * (document.getElementById('sttr_tot_price_igst_per').value / 100));

        if (CGSTTax == 'NaN' || CGSTTax == '') {
            CGSTTax = 0;
        }

        if (SGSTTax == 'NaN' || SGSTTax == '') {
            SGSTTax = 0;
        }

        if (IGSTTax == 'NaN' || IGSTTax == '') {
            IGSTTax = 0;
        }

        document.getElementById('sttr_tot_price_cgst_chrg').value = parseFloat(CGSTTax);
        document.getElementById('sttr_tot_price_sgst_chrg').value = parseFloat(SGSTTax);
        document.getElementById('sttr_tot_price_igst_chrg').value = parseFloat(IGSTTax);

        var totalCrystalTax = parseFloat(CGSTTax + SGSTTax + IGSTTax);

        if (totalCrystalTax == 'NaN' || totalCrystalTax == '') {
            totalCrystalTax = 0;
        }

        document.getElementById('sttr_tot_tax').value = parseFloat(totalCrystalTax);

        if (document.getElementById('sttr_tot_tax').value == 'NaN') {
            document.getElementById('sttr_tot_tax').value = 0;
        }

        document.getElementById('sttr_final_valuation').value = parseFloat(parseFloat(document.getElementById('sttr_tot_tax').value) + parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(mkgchrg)).toFixed(2);

    } else {
        document.getElementById('sttr_final_valuation').value = parseFloat( parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(mkgchrg)) .toFixed(2);
    }

    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }
}


// Start Code to Calculate VAluations For Crystal
function calcCryTotalTaxPrice() {
//    alert(document.getElementById('addItemCryQty').value);
    var crystalQTY = parseInt(document.getElementById('sttr_quantity').value);
    var crystalGsWt = parseFloat(document.getElementById('sttr_gs_weight').value);
    var crystalGsWtTyp = document.getElementById('sttr_gs_weight_type').value;
    var crystalRate = parseFloat(document.getElementById('sttr_purchase_rate').value);
    var crystalRateType = document.getElementById('sttr_purchase_rate_type').value;
    var crystalVal = parseFloat(document.getElementById('sttr_valuation').value);
    var crystalTax = parseFloat(document.getElementById('sttr_tax').value);
    var crystalTotTax = parseFloat(document.getElementById('sttr_tot_tax').value);
    var labCharges = document.getElementById('sttr_lab_charges').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;

    var totalGSWTNRate = 0;
    var totalCrystalTax = 0;
    var finalValuation = 0;
    // START CODE TO CALCULATE VALUATION ACCORDING TO CRYSTAL WEIGHT TYPE & CRYSTAL RATE TYPE
    if (crystalRateType == 'KG') { // CRYSTAL RATE TYPE IN KG
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = crystalRate * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = (crystalRate / 1000) * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalGSWTNRate = (crystalRate * 0.0002) * crystalGsWt;
        else
            totalGSWTNRate = (crystalRate / (1000 * 1000)) * crystalGsWt;
    } else if (crystalRateType == 'GM') { // CRYSTAL RATE TYPE IN GM
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = crystalRate * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = crystalRate * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalGSWTNRate = (crystalRate * 0.2) * crystalGsWt;
        else
            totalGSWTNRate = (crystalRate / 1000) * crystalGsWt;
    } else if (crystalRateType == 'MG') { // CRYSTAL RATE TYPE IN MG
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = crystalRate * 1000 * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = crystalRate * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalGSWTNRate = (crystalRate * 200) * crystalGsWt;
        else
            totalGSWTNRate = crystalRate * crystalGsWt;
    } else if (crystalRateType == 'CT') { // CRYSTAL RATE TYPE IN CT
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = ((crystalRate / 0.0002) * crystalGsWt);
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = ((crystalRate / 0.2) * crystalGsWt);
        else if (crystalGsWtTyp == 'MG') // CRYSTAL WEIGHT TYPE IN MG
            totalGSWTNRate = ((crystalRate / 200) * crystalGsWt);
        else
            totalGSWTNRate = crystalRate * crystalGsWt;
    } else if (crystalRateType == 'FX') { // RATE TYPE IN FX @PRIYANKA-12OCT2020
        totalGSWTNRate = crystalRate;
    } else {
        totalGSWTNRate = crystalRate * crystalQTY;
    }
    // END CODE TO CALCULATE VALUATION ACCORDING TO CRYSTAL WEIGHT TYPE & CRYSTAL RATE TYPE
    // START CODE TO CALCULATE VALUATION ACCORDING TO CRYSTAL WEIGHT TYPE & CRYSTAL RATE TYPE
    var totalLabCharg = 0;
    if (labChargesType == 'KG') { // CRYSTAL RATE TYPE IN KG
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalLabCharg = labCharges * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalLabCharg = (labCharges / 1000) * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalLabCharg = (labCharges * 0.0002) * crystalGsWt;
        else
            totalLabCharg = (labCharges / (1000 * 1000)) * crystalGsWt;
    } else if (labChargesType == 'GM') { // CRYSTAL RATE TYPE IN GM
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalLabCharg = labCharges * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalLabCharg = labCharges * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalLabCharg = (labCharges * 0.2) * crystalGsWt;
        else
            totalLabCharg = (labCharges / 1000) * crystalGsWt;
    } else if (labChargesType == 'MG') { // CRYSTAL RATE TYPE IN MG
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalLabCharg = labCharges * 1000 * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalLabCharg = labCharges * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalLabCharg = (labCharges * 200) * crystalGsWt;
        else
            totalLabCharg = labCharges * crystalGsWt;
    } else if (labChargesType == 'CT') { // CRYSTAL RATE TYPE IN CT
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalLabCharg = ((labCharges / 0.0002) * crystalGsWt);
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalLabCharg = ((labCharges / 0.2) * crystalGsWt);
        else if (crystalGsWtTyp == 'MG') // CRYSTAL WEIGHT TYPE IN MG
            totalLabCharg = ((labCharges / 200) * crystalGsWt);
        else
            totalLabCharg = labCharges * crystalGsWt;
    } else if (labChargesType == 'FX') { // RATE TYPE IN FX @PRIYANKA-12OCT2020
        totalLabCharg = labCharges;
    } else if (labChargesType == 'per') { // RATE TYPE IN PER @PRIYANKA-12OCT2020
        //totalLabCharg = labCharges * (crystalVal / 100);
         totalLabCharg = labCharges * (crystalVal / 100);
    } else if (labChargesType == 'PP') { // RATE TYPE IN PER PICS @PRIYANKA-12OCT2020
        totalLabCharg = labCharges * crystalQTY;
    } else if (labChargesType == 'Fixed') { // RATE TYPE IN Fixed @PRIYANKA-12OCT2020
        totalLabCharg = labCharges;
    } else {
        totalLabCharg = labCharges + crystalVal;
    }
    // END CODE TO CALCULATE VALUATION ACCORDING TO CRYSTAL WEIGHT TYPE & CRYSTAL RATE TYPE
    if (document.getElementById('sttr_gs_weight').value == '') {
        totalGSWTNRate = crystalRate * crystalQTY;
    }
    var totalLabCharges = 0;
    var totaltax = 0;
    document.getElementById('sttr_total_lab_charges').value = parseFloat(totalLabCharg).toFixed(2);
    if (document.getElementById('sttr_total_lab_charges').value != '' && document.getElementById('sttr_total_lab_charges').value != 'NaN') {
        totalLabCharges = document.getElementById('sttr_total_lab_charges').value;
    }
    if (document.getElementById('sttr_tot_tax').value != '' && document.getElementById('sttr_tot_tax').value != 'NaN') {
        totaltax = document.getElementById('sttr_tot_tax').value;
    }
    document.getElementById('sttr_valuation').value = (totalGSWTNRate).toFixed(2);

    if (document.getElementById('sttr_total_lab_charges').value == 'NaN' || document.getElementById('sttr_total_lab_charges').value == '') {
        document.getElementById('sttr_total_lab_charges').value = 0;
    }
    if (document.getElementById('sttr_valuation').value == 'NaN' || document.getElementById('sttr_valuation').value == '') {
        document.getElementById('sttr_valuation').value = 0;
    }
    document.getElementById('sttr_valuation').value = parseFloat(document.getElementById('sttr_valuation').value);
    document.getElementById('sttr_final_valuation').value = parseFloat(parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(totalLabCharges) + parseFloat(totaltax)).toFixed(2);
    if (document.getElementById('sttr_tax').value != '') {
        totalCrystalTax = totalGSWTNRate * (crystalTax / 100);
        document.getElementById('sttr_tot_tax').value = (totalCrystalTax).toFixed(2);
        if (document.getElementById('sttr_tot_tax').value == 'NaN') {
            document.getElementById('sttr_tot_tax').value = 0;
        }
        alert(totalCrystalTax);
        alert(totalGSWTNRate);
        finalValuation = parseFloat(parseFloat(totalCrystalTax) + parseFloat(totalGSWTNRate)).toFixed(2);
        document.getElementById('sttr_valuation').value = (finalValuation + totalLabCharges).toFixed(2);
        document.getElementById('sttr_final_valuation').value = parseFloat(parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(totalLabCharges) + parseFloat(totaltax)).toFixed(2);
    }
    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }
}

// Start code for  Validation of crystal 
function addCrystal() {
//alert(document.getElementById('stockType').value);
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (document.getElementById('payButClickId').value == 'true') {
        return true;
    } else {
//        alert(document.getElementById('stockType').value);
        if (document.getElementById('stockType').value == 'retailStock') {
            functionName = validateAddCrystalInputs;
        } else {
            var functionName = validateAddWhCrystalInputs;
        }
        if ((functionName())) {
            return true;
        }
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    return false;
}

// Start code for  Validation of wholesale crystal stock
function validateAddWhCrystalInputs() {
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
    } else if (validateEmptyField(document.getElementById("sttr_item_pre_id").value, "Please enter Item Pre Id!") == false) {
        document.getElementById("sttr_item_pre_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_category").value, "Please enter Crystal Id!") == false)
    {
        document.getElementById("sttr_item_category").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please enter Crystal Name!") == false) {
        document.getElementById("sttr_item_name").focus();
        return false;
    }
//    else if (validateEmptyField(document.getElementById("addItemCryQty").value, "Please enter Crystal Quantity!") == false ||
//            validateNum(document.getElementById("addItemCryQty").value, "Accept only numeric characters without space!") == false) {
//        document.getElementById("addItemCryQty").focus();
//        return false;
//    }
    else if (document.getElementById('stockType').value != 'retailStock') {
        if (document.getElementById("sttr_gs_weight").value == '') {
            if (validateEmptyField(document.getElementById("sttr_quantity").value, "Please enter Crystal Quantity!") == false ||
                    validateNum(document.getElementById("sttr_quantity").value, "Accept only numeric characters without space!") == false) {
                document.getElementById("sttr_quantity").focus();
                return false;
            }
        }
    }
//    alert(document.getElementById("sttr_gs_weight").value);
    if (document.getElementById("sttr_gs_weight").value == '') {
        alert('Please enter Gross Weight!');
        document.getElementById("sttr_gs_weight").focus();
        return false;
    }
    if (validateEmptyField(document.getElementById("sttr_purchase_rate").value, "Please enter Crystal Rate!") == false) {
        document.getElementById("sttr_purchase_rate").focus();
        return false;
    }
    if (document.getElementById('stockType').value == 'retailStock') {
        if (validateEmptyField(document.getElementById("sttr_gs_weight").value, "Please enter Gross Weight!") == false ||
                validateNumWithDot(document.getElementById("sttr_gs_weight").value, "Accept only numeric characters without space!") == false) {
            document.getElementById("sttr_gs_weight").focus();
            return false;
        }
    }
    if (document.getElementById('stockType').value != 'retailStock') {
        if (document.getElementById("sttr_gs_weight").value == '') {
            if (validateEmptyField(document.getElementById("sttr_quantity").value, "Please enter Crystal Quantity!") == false ||
                    validateNum(document.getElementById("sttr_quantity").value, "Accept only numeric characters without space!") == false) {
                document.getElementById("sttr_quantity").focus();
                return false;
            }
        }
    }
    return true;
}
// Start code for  Validation of retail crystal stock
function validateAddCrystalInputs() {
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
    } else if (validatePreId(document.getElementById("sttr_item_pre_id").value, "Pre Id should not contain numeric in last character") == false) {
        document.getElementById("sttr_item_pre_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_pre_id").value, "Please enter Item Pre Id!") == false) {
        document.getElementById("sttr_item_pre_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_id").value, "Please enter Item Id!") == false) {
        document.getElementById("sttr_item_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_category").value, "Please enter Crystal Id!") == false)
    {
        document.getElementById("sttr_item_category").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please enter Crystal Name!") == false) {
        document.getElementById("sttr_item_name").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_quantity").value, "Please enter Crystal Quantity!") == false ||
            validateNum(document.getElementById("sttr_quantity").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_quantity").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_gs_weight").value, "Please enter Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("sttr_gs_weight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_gs_weight").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_purchase_rate").value, "Please enter Crystal Rate!") == false) {
        document.getElementById("sttr_purchase_rate").focus();
        return false;
    }
    return true;
}

/**********Start code to add function to get crystal name on enter kety @Author:SHEETAL20JAN15*********/
/**********Start code to add function to get crystal name on enter kety @Author:SANT23JAN17*********/
/************code modified 1/17/2018  one extra paramenter added to function for auto suggestion crystal name*******/
function getCrystalType(itemname, div, id, keyCodeInput, mainPanel, subPanelName) {
    var CryId = document.getElementById(id).value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('addItemCrySelBy').focus();
                document.getElementById('addItemCrySelBy').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogcriaml.php?id=" + id + "&div=" + div + "&mainPanel=" + mainPanel + "&CryId=" + CryId + "&subPanelName=" + subPanelName
            + "&itemName=" + itemname, true);
    xmlhttp.send();
}
/**********End code to add function to get crystal name on enter kety @Author:SANT23JAN17*********/
var addstockDiv;
var addItemCryType;

function changeStockCrystalId(selectedCrystalType, panelName) {
    addstockDiv = panelName;
    addItemCryType = selectedCrystalType;
    var poststr = "crystalType=" + encodeURIComponent(selectedCrystalType)
            + "&panelName=" + encodeURIComponent(panelName);

    change_stock_crystal_id('include/php/ogcriddv.php', poststr);

    return false;
}
function change_stock_crystal_id(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertChangeStockCrystalId;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}
function alertChangeStockCrystalId() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";

        if (addstockDiv == 'CrystalPanel') {
            var str = xmlhttp.responseText;
            var strValue = new Array();
            strValue = str.split("*");
            document.getElementById("sttr_item_pre_id").value = strValue[0];
            document.getElementById("sttr_item_id").value = strValue[1];
            document.getElementById("sttr_item_pre_id").focus();
            changeAddCrystalRate(addItemCryType);
        }
    }
}
// End code to add function to get crystal name on enter kety


// Code to g crystal from Crystal Purchase List
//*****************END code :DISH14NOV16**********************************//
// Code to g crystal from Crystal Purchase List
//*****Start code for crystal purchase for supplier:Author:SANT22JAN17
function deleteCrystal(itstId, sttrId, panelName, mainPanel, pageNo, sellPresent, itprcryId, itprcryName, utinId, itemDeletePanel, deletereason) {
    // Check if a delete reason is required
    if (deletereason === 'YES') {
        var deleteReason = prompt("Please provide a reason for deleting this item:");

        // If no reason is provided, prevent deletion
        if (deleteReason === null || deleteReason.trim() === "") {
            alert("You must provide a reason for deletion.");
            return false;
        }
    }
    if (sellPresent > 0) {
        alert('To Delete,First Delete This Item From Customer Purchase Panel!');
        return false;
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");//add variables of alert msgs @AUTHOR: SANDY29JAN14
        var stockDelete = document.getElementById("stockDelete").value;

        if (confirm_box == true && stockDelete == 'Y') {
            confirm_box1 = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item from Stock?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
            if (confirm_box1 == true) {
                var delFromStock = 'delfromstock'; //add variables of to delete from stock: DISH14NOV16
            }
        }
        if (confirm_box == true)
        {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//alert(mainPanel);
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    if (panelName == 'ItemDetailPanel') {
                        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                        window.setTimeout(CrystalGlobalFunctionToCloseDiv, 1000);
                    } else if (mainPanel == 'StockList') {

                        document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
                        window.setTimeout(CrystalGlobalFunctionToCloseDiv, 1000);
                    } else if (panelName == 'CrystalPurchaseList') {

                        document.getElementById("crystalPanelPurchaseList").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else if (mainPanel == 'StockInvoice') {
                        document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else if (panelName == 'TagItemDelete') {
                        document.getElementById("crystalPanelFormDiv").innerHTML = xmlhttp.responseText;

                    } else if (pageNo == 'SuppPanel' || pageNo == 'addByItems') {
                        document.getElementById("suppPurchaseDivs").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else {
                        document.getElementById("paymentDiv").innerHTML = xmlhttp.responseText;
                        window.setTimeout(CrystalGlobalFunctionToCloseDiv, 1000);
                    }
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };

            if (panelName == 'TagItemDelete') {
                xmlhttp.open("GET", "ogcrldel.php?itstId=" + itstId + "&sttrId=" + sttrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&pageNo=" + pageNo + "&itprcryCryId=" + itprcryId + "&itprcryName=" + itprcryName + "&delFromStock=" + delFromStock + "&utinId=" + utinId + "&itemDeletePanel=" + itemDeletePanel + "&deleteReason=" + encodeURIComponent(deleteReason), true);
            } else {
                xmlhttp.open("GET", "include/php/ogcrldel.php?itstId=" + itstId + "&sttrId=" + sttrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&pageNo=" + pageNo + "&itprcryCryId=" + itprcryId + "&itprcryName=" + itprcryName + "&delFromStock=" + delFromStock + "&utinId=" + utinId + "&itemDeletePanel=" + itemDeletePanel + "&deleteReason=" + encodeURIComponent(deleteReason), true);
            }

            xmlhttp.send();
        }
    }
}
//*****End code for crystal purchase for supplier:Author:SANT22JAN17
function CrystalGlobalFunctionToCloseDiv() {
    document.getElementById('messDisplayDiv').innerHTML = '';
}

function calcCashCrystalBalance(prefix) {
    document.getElementById(prefix + 'PayTotAmtBal').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value)).toFixed(2);

    var totalCashPaidAmt = document.getElementById(prefix + 'PayCashAmtRec').value;
    if (totalCashPaidAmt == null || totalCashPaidAmt == '') {
        totalCashPaidAmt = '0.00';
    }
    document.getElementById(prefix + 'PayCashRecDisp').value = parseFloat(totalCashPaidAmt).toFixed(2);

    var totalDiscountAmt = document.getElementById(prefix + 'PayDiscount').value;
    if (totalDiscountAmt == null || totalDiscountAmt == '') {
        totalDiscountAmt = '0.00';
    }
    document.getElementById(prefix + 'PayDiscountDisp').value = parseFloat(totalDiscountAmt).toFixed(2);

    document.getElementById(prefix + 'PayTotAmtBal').value = (parseFloat(document.getElementById(prefix + 'PayTotAmtBal').value) - parseFloat(totalCashPaidAmt) - parseFloat(totalDiscountAmt)).toFixed(2);

    if (document.getElementById('payPanelName').value == 'SellItemReturn' || document.getElementById('payPanelName').value == 'SellItemReturnUp') {
        if (document.getElementById(prefix + 'PayCashAmtRec').value != '' && document.getElementById('balAvail').value == 0) {
            document.getElementById(prefix + 'PayTotAmtBal').value = parseFloat(document.getElementById('returnVal').value - totalCashPaidAmt);
        }
        if (document.getElementById(prefix + 'PayTotAmtBal').value < 0) {
            document.getElementById(prefix + 'PayTotAmtBal').value = 0;
        }
    }
    document.getElementById(prefix + 'PayTotAmtBalDisp').value = document.getElementById(prefix + 'PayTotAmtBal').value;
//    alert('prefix=' + prefix);
}
//Code to seacrh crystal by name @Author:SHE23FEB15
function searchCrystalList(documentRootPath, searchColumn, searchValue, selFirmId, div, panel) {
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
    if (panel == 'CrystalPurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogcrprlt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'crystalStockList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogcrstls.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsblt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    xmlhttp.send();
}

// Code to sort out crystals in purchase list
function sortCrystalList(documentRootPath, sortKeyword, selFirmId, div, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'CrystalPurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogcrprlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'crystalStockList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogcrstls.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'UdhaarEMIList')
        xmlhttp.open("POST", documentRootPath + "/include/php/omuemilt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsblt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    xmlhttp.send();
}

function search_suppId_for_textField_Crystal(url, parameters) {
    loadXMLDoc();

    xmlhttp.onreadystatechange = alertSearchSuppIdForTextFieldCrystal;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchSuppIdForTextFieldCrystal() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("suppListDivToAddCrystalStock").innerHTML = xmlhttp.responseText;
        if (keyCode == 40 || keyCode == 38) {
            document.getElementById('suppListForTextFieldSelect').focus();
            document.getElementById('suppListForTextFieldSelect').options[0].selected = true;
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function searchSuppIdForTextFieldCrystal(suppName, keyCodeInput) {

    keyCode = keyCodeInput;

    document.getElementById("main_ajax_loading_div").style.visibility = "visible";

    var poststr = "suppName=" + encodeURIComponent(suppName);

    search_suppId_for_textField_Crystal('include/php/ogcrswlt.php', poststr);
}

var panelNameForCrystalNames;
var divNumForItemNames;
var keyCodeForItemNames;
function search_crystal_names(url, parameters) {
    loadXMLDoc();

    xmlhttp.onreadystatechange = alertSearchCrystalNames;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function searchCrystalNames(itemName, divNum, keyCodeInput) {
    keyCodeForItemNames = keyCodeInput;
    divNumForItemNames = divNum;
    panelNameForCrystalNames = divNum;

    //document.getElementById("ajaxLoadGetItemListDiv").style.visibility = "visible";
    var poststr = "itemName=" + encodeURIComponent(itemName)

            + "&divNum=" + encodeURIComponent(divNum);


    search_crystal_names('include/php/ogcrladv.php', poststr);
}
function alertSearchCrystalNames() {
    /*******Start code to add div for custSlItem @Author:PRIYA24DEC13******/
    /*******Start code to add div @Author:PRIYA13SEP14*******************************/
    if (panelNameForCrystalNames == 'addItemCryName') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cryNameSelectDiv").innerHTML = xmlhttp.responseText;
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
                document.getElementById('itemListToAddItemSelect').focus();
                document.getElementById('itemListToAddItemSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }
}

function showCrystalDetailsDiv(documentRootPath, itstId, panelName, page) {
    var panelNameItemDetails = panelName;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelNameItemDetails == 'stockList') {
                document.getElementById("stockList").innerHTML = xmlhttp.responseText;
            } else if (panelNameItemDetails == 'jewelleryPanel') {
                document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogcrisdv.php?itstId=" + itstId + "&page=" + page, true);
    xmlhttp.send();
}


// Code to calculate valuation in sell purchase panel of crystal
function calculateSellPriceCrystal() {

    var crystalQTY = parseInt(document.getElementById('sttr_quantity').value);
    var crystalGsWt = parseFloat(document.getElementById('sttr_gs_weight').value);
    var crystalGsWtTyp = document.getElementById('sttr_gs_weight_type').value;
    var crystalRate = parseFloat(document.getElementById('sttr_sell_rate').value);
    var crystalRateType = document.getElementById('sttr_sell_rate_type').value;
    var crystalVal = parseFloat(document.getElementById('sttr_valuation').value);
    var crystalMkgChrg = parseFloat(document.getElementById('sttr_making_charges').value);
    var crystalMkgChrgType = document.getElementById('sttr_making_charges_type').value;
    var totalGSWTNRate = 0;
    var totalCryVal = 0.0;
    //********************
    // START CODE TO CALCULATE VALUATION ACCORDING TO CRYSTAL WEIGHT TYPE & CRYSTAL RATE TYPE
    if (crystalRateType == 'KG') { // CRYSTAL RATE TYPE IN KG
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = crystalRate * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = (crystalRate / 1000) * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalGSWTNRate = (crystalRate * 0.0002) * crystalGsWt;
        else
            totalGSWTNRate = (crystalRate / (1000 * 1000)) * crystalGsWt;
    } else if (crystalRateType == 'GM') { // CRYSTAL RATE TYPE IN GM
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = crystalRate * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = crystalRate * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalGSWTNRate = (crystalRate * 0.2) * crystalGsWt;
        else
            totalGSWTNRate = (crystalRate / 1000) * crystalGsWt;
    } else if (crystalRateType == 'MG') { // CRYSTAL RATE TYPE IN MG
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = crystalRate * 1000 * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = crystalRate * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalGSWTNRate = (crystalRate * 200) * crystalGsWt;
        else
            totalGSWTNRate = crystalRate * crystalGsWt;
    } else if (crystalRateType == 'CT') { // CRYSTAL RATE TYPE IN CT
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalGSWTNRate = ((crystalRate / 0.0002) * crystalGsWt);
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalGSWTNRate = ((crystalRate / 0.2) * crystalGsWt);
        else if (crystalGsWtTyp == 'MG') // CRYSTAL WEIGHT TYPE IN MG
            totalGSWTNRate = ((crystalRate / 200) * crystalGsWt);
        else
            totalGSWTNRate = crystalRate * crystalGsWt;
    } else if (crystalRateType == 'FX') { // RATE TYPE IN FX @PRIYANKA-12OCT2020
        totalGSWTNRate = crystalRate;
    } else {
        totalGSWTNRate = crystalRate * crystalQTY;
    }
    // END CODE TO CALCULATE VALUATION ACCORDING TO CRYSTAL WEIGHT TYPE & CRYSTAL RATE TYPE
    // START CODE TO CALCULATE VALUATION ACCORDING TO CRYSTAL WEIGHT TYPE & CRYSTAL RATE TYPE
    var totalMkgCharg = 0;
    
    if (crystalMkgChrgType == 'KG') { // CRYSTAL RATE TYPE IN KG
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalMkgCharg = crystalMkgChrg * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalMkgCharg = (crystalMkgChrg / 1000) * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalMkgCharg = (crystalMkgChrg * 0.0002) * crystalGsWt;
        else
            totalMkgCharg = (crystalMkgChrg / (1000 * 1000)) * crystalGsWt;
    } else if (crystalMkgChrgType == 'GM') { // CRYSTAL RATE TYPE IN GM
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalMkgCharg = crystalMkgChrg * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalMkgCharg = crystalMkgChrg * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalMkgCharg = (crystalMkgChrg * 0.2) * crystalGsWt;
        else
            totalMkgCharg = (crystalMkgChrg / 1000) * crystalGsWt;
    } else if (crystalMkgChrgType == 'MG') { // CRYSTAL RATE TYPE IN MG
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalMkgCharg = crystalMkgChrg * 1000 * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalMkgCharg = crystalMkgChrg * 1000 * crystalGsWt;
        else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
            totalMkgCharg = (crystalMkgChrg * 200) * crystalGsWt;
        else
            totalMkgCharg = crystalMkgChrg * crystalGsWt;
    } else if (crystalMkgChrgType == 'CT') { // CRYSTAL RATE TYPE IN CT
        if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
            totalMkgCharg = ((crystalMkgChrg / 0.0002) * crystalGsWt);
        else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
            totalMkgCharg = ((crystalMkgChrg / 0.2) * crystalGsWt);
        else if (crystalGsWtTyp == 'MG') // CRYSTAL WEIGHT TYPE IN MG
            totalMkgCharg = ((crystalMkgChrg / 200) * crystalGsWt);
        else
            totalMkgCharg = crystalMkgChrg * crystalGsWt;
    } else if (crystalMkgChrgType == 'FX') { // RATE TYPE IN FX @PRIYANKA-12OCT2020
        totalMkgCharg = crystalMkgChrg;
    } else if (crystalMkgChrgType == 'per') { // RATE TYPE IN PER @PRIYANKA-12OCT2020
        //totalMkgCharg = crystalMkgChrg * (crystalVal / 100);
        totalMkgCharg = crystalMkgChrg * (totalGSWTNRate / 100);
    } else if (crystalMkgChrgType == 'PP') { // RATE TYPE IN PER PICS @PRIYANKA-12OCT2020
        totalMkgCharg = crystalMkgChrg * crystalQTY;
    } else if (crystalMkgChrgType == 'Fixed') { // RATE TYPE IN Fixed @PRIYANKA-12OCT2020
        totalMkgCharg = crystalMkgChrg;
    } else {
        totalMkgCharg = crystalMkgChrg + crystalVal;
    }
    // END CODE TO CALCULATE VALUATION ACCORDING TO CRYSTAL WEIGHT TYPE & CRYSTAL RATE TYPE
    if (!totalMkgCharg) {
        totalMkgCharg = 0;
    }
    document.getElementById('sttr_valuation').value = Math_round(totalGSWTNRate).toFixed(2);
    if (document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }
//    totalCryVal += parseFloat(document.getElementById('sttr_valuation').value);
//    document.getElementById('sttr_valuation').value = Math_round(parseFloat(totalCryVal)).toFixed(2);
    //START CHANGES BY AUTHOR:AMOL5Oct2017
    if (document.getElementById('slPrItemPriMkgCgstChrg').value == '') {
        document.getElementById('slPrItemPriMkgCgstChrg').value = 0;
    }
    if (document.getElementById('slPrItemPriMkgSgstChrg').value == '') {
        document.getElementById('slPrItemPriMkgSgstChrg').value = 0;
    }
    if (document.getElementById('slPrItemPriMkgIgstChrg').value == '') {
        document.getElementById('slPrItemPriMkgIgstChrg').value = 0;
    }
    document.getElementById('sttr_valuation').value = parseFloat(document.getElementById('sttr_valuation').value).toFixed(2);
    //calculate CGST 
    if (document.getElementById('slPrItemPriMkgCgstPer').value != '') {
        document.getElementById('slPrItemPriMkgCgstChrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('slPrItemPriMkgCgstPer').value) / 100)).toFixed(2);
    }
    //calculate SGST 
    if (document.getElementById('slPrItemPriMkgSgstPer').value != '') {
        document.getElementById('slPrItemPriMkgSgstChrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('slPrItemPriMkgSgstPer').value) / 100)).toFixed(2);
    }
    //calculate IGST 
    if (document.getElementById('slPrItemPriMkgIgstPer').value != '') {
        document.getElementById('slPrItemPriMkgIgstChrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('slPrItemPriMkgIgstPer').value) / 100)).toFixed(2);
    }

    //Calculate Total Item Tax cgst+sgst+igst
    document.getElementById('slPrItemTotTax').value = (parseFloat(document.getElementById('slPrItemPriMkgCgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgSgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgIgstChrg').value));

            document.getElementById('sttr_valuation').value = parseFloat(document.getElementById('sttr_valuation').value);
//    document.getElementById('sttr_valuation').value = parseFloat(parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(totalMkgCharg)).toFixed(2);
    document.getElementById('sttr_final_valuation').value = parseFloat(parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(totalMkgCharg) +
            parseFloat(document.getElementById('slPrItemTotTax').value));
    //
    if( document.getElementById('sttr_total_making_charges')!=null){
        document.getElementById('sttr_total_making_charges').value = (totalMkgCharg).toFixed(2);;
    }
        //END CHANGES BY AUTHOR:AMOL5Oct2017 
//    if (document.getElementById('sttr_tax').value != '') {
//        document.getElementById('sttr_tot_tax').value = (parseFloat((document.getElementById('sttr_valuation').value * document.getElementById('sttr_tax').value) / 100)).toFixed(2);
//        ;
//        document.getElementById('sttr_final_valuation').value = (parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
//    }


//            if (document.getElementById('slPrCryFinVal').value != '') {
//                calculateSellPriceCrystal();
//            }

}


function calcTotalTaxBySellCrystalTotalPrice() {

    if (document.getElementById('sttr_valuation').value == 'NaN' || document.getElementById('sttr_valuation').value == '') {
        document.getElementById('sttr_valuation').value = 0;
    }

    if (document.getElementById('sttr_tax').value > 0) {

        var totalTax = parseFloat(parseFloat(document.getElementById('sttr_valuation').value) * parseFloat(document.getElementById('sttr_tax').value) / 100).toFixed(2);

        if (totalTax == 'NaN' || totalTax == '') {
            totalTax = 0;
        }

        document.getElementById('slPrItemTotTax').value = parseFloat(totalTax);

        if (document.getElementById('slPrItemTotTax').value == 'NaN') {
            document.getElementById('slPrItemTotTax').value = 0;
        }

        document.getElementById('sttr_final_valuation').value = parseFloat(parseFloat(document.getElementById('slPrItemTotTax').value) + parseFloat(document.getElementById('sttr_valuation').value)).toFixed(2);

    } else {
        document.getElementById('sttr_final_valuation').value = parseFloat(document.getElementById('sttr_valuation').value).toFixed(2);
    }

    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }
}


// Code to Add function for the delete crystal from the sell purchase table
function deleteSellItemCrystal(custId, slPrId, panelName, mainPanel, count, slPrInvoiceNo, slPrPreInvoiceNo) {
//    alert("okkkkk");
//    alert(slPrInvoiceNo+"="+slPrPreInvoiceNo);
//    alert(document.getElementById("upPanel").value);
    if ((document.getElementById("upPanel").value == 'ItemCrystalSoldOutList' || document.getElementById("upPanel").value == 'CrySellPayUp' || document.getElementById("upPanel").value == 'SellDetUpPanel') && parseFloat(document.getElementById("invoiceRow" + count).value) > 0) {
        alert('You can not delete this Item');
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14

        var stockDelete = document.getElementById("stockDelete").value;

        if (confirm_box == true)
        {
            if (stockDelete == 'Y')
            {
                confirm_box1 = confirm(addItemAlertMess + "\n\nDo you want to add this Item to Stock ?");
                if (confirm_box1 == true) {
                    var addToStock = 'addtostock';
                }
            }

            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//                if (mainPanel == 'SellItemReturn') {
//                    document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
//                } else 
                    if (panelName == 'CrystalSoldOutList') {
                        document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                        document.getElementById('deleteInvVerifyPopUp').style.display = "none";
                        window.setTimeout(sellCryFunctionToCloseDiv, 1000);
                    } else if (mainPanel == 'MainSoldOutListDel' && panelName == '') {
                        document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                        window.setTimeout(sellFunctionToCloseDiv, 1000);
                    } else {
                        document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                        window.setTimeout(sellFunctionToCloseDiv, 1000);
                    }
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            xmlhttp.open("GET", "include/php/ogcrspdl.php?custId=" + custId + "&slPrId=" + slPrId + "&stockDelete=" + stockDelete + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&addToStock=" + addToStock + "&slPrInvoiceNo=" + slPrInvoiceNo + "&slPrPreInvoiceNo=" + slPrPreInvoiceNo, true);
            xmlhttp.send();
        }
    }
}

function sellCryFunctionToCloseDiv() {
    document.getElementById('sellCryMessDisplayDiv').innerHTML = '';
}
// Function to display crystal list in stock Panel
//amol
function showStockCrystalList(divPanel) {
    // alert(divPanel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omwgstlt.php?divPanel=" + divPanel, true);
    xmlhttp.send();
}

// ****************START FUNCTION TO DISPLAY STRLLERING LIST IN STOCK PANEL AUTHOR : DIKSHA15DEC2018*****************
function showStockStrlleringList(divPanel) {
    // alert(divPanel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("jewellerySubPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omstrgstlt.php?divPanel=" + divPanel, true);
    xmlhttp.send();
}
// ****************END FUNCTION TO DISPLAY STRLLERING LIST IN STOCK PANEL AUTHOR : DIKSHA15DEC2018*****************
function showBoxInOutList(divPanel) {
    // alert(divPanel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omboxinout.php?divPanel=" + divPanel, true);
    xmlhttp.send();
}
// 
// **************** Re-oder List
function showReOrderList(divPanel) {
    // alert(divPanel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omreorderlist.php?divPanel=" + divPanel, true);
    xmlhttp.send();
}
// 
// Functon For the displaying Page No
function showSelPageInStockListCrystal(pageNo, panel, rowsPerPage, start, end, wtTp, metalTp, metalName, noOfPagesAsLink) {
    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (panel == 'CurrentCrystalStockList' || panel == 'CrystalGivenList' || panel == 'CrystalPurchaseList') {
                    document.getElementById("crystalStockListDiv").innerHTML = xmlhttp.responseText;
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
        if (panel == 'CurrentCrystalStockList' || panel == 'CrystalGivenList' || panel == 'CrystalPurchaseList') {
            xmlhttp.open("POST", "include/php/ogcrmnlt.php?page=" + pageNo + "&listPanel=" + panel + "&rowsPerPage=" + rowsPerPage + "&startRange=" + start + "&endRange=" + end + "&itemName=" + metalName + "&stockItemMetal=" + metalTp + "&metalWt=" + wtTp, true);
        } else {
            xmlhttp.open("POST", "include/php/ogrpilst.php?page=" + pageNo + "&panel=" + panel + "&rowsPerPage=" + rowsPerPage, true);
        }
        xmlhttp.send();
    }
}


// Function For Return crystal in Sell purchase
function sellExchangeCrystal(custId, preInvoiceNo, postInvoiceNo, returnPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogspisdv.php?custId=" + custId + "&panelName=" + returnPanel + "&mainPanel=CrystalPurchasePanel&preInvoiceNo=" + preInvoiceNo +
            "&postInvoiceNo=" + postInvoiceNo, true);
    xmlhttp.send();
}
function getmulBarCodeField(option, value, panelName) {
    // alert(panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barCodePrintPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omijlgcd.php?option=" + option + "&value=" + value + "&panelName=" + panelName, true);
    xmlhttp.send();
}
function gettailBarCodeField(option, value, panelName) {
    // alert(panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("barCodePrintPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
//    xmlhttp.open("POST", "include/php/ogijlgcd.php?option=" + option + "&value=" + value + "&panelName=" + panelName, true);
    xmlhttp.open("POST", "include/php/omijlgcd.php?option=" + option + "&value=" + value + "&panelName=" + panelName, true);
    xmlhttp.send();
}
function showCrystalStokPanel(divPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        }
    };
    xmlhttp.open("POST",
            "include/php/ogcrlidv.php?divPanel="
            + divPanel, true);
    xmlhttp.send();
}
function showItemCrystalDetailsDiv(documentRootPath, sttrId, panelName, page, crystalId) {

    var panelNameItemDetails = panelName;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelNameItemDetails == 'stockList') {
                document.getElementById("stockList").innerHTML = xmlhttp.responseText;
            } else if (panelNameItemDetails == 'CrystalPanel') {
                document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogcrisbd.php?sttrId=" + sttrId + "&page=" + page + "&crystalId=" + crystalId, true);
    xmlhttp.send();
}
function navigateBackToCrystalStockPanel(documentRootPath, panel, page) {
    if (panel == 'crystalStockPanel') {
        var panelName = 'crystalStockPanel';
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'udhaarList' || panel == 'StockList' || panel == 'RawList') {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogilstdv.php?page=" + page + "&panel=" + panel + "&panelName=" + panelName, true);
    xmlhttp.send();
}
function navigationCrystalItemListPanel(pageNo, startRange, endRange, itemName, noOfPagesAsLink) {
    if (pageNo == 0) {
        document.getElementById('enterPageNo').value = '';
        alert("Please select correct page Number!!");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.barcode_search.barcode_text.focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
                if (pageNo >= 10) {
                    setPageValue(pageNo, noOfPagesAsLink);
                } else {
                    document.getElementById('pageNoTextField' + pageNo).setAttribute("class", "currentPageNoButton");
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogcrlidv.php?page=" + pageNo + "&startRange=" + startRange + "&endRange=" + endRange + "&itemName=" + itemName, true);

        xmlhttp.send();
    }
}
function getCrystalItemDetailsPanel(documentRootPath, preId, postId, panelName, page, crystalId) {

    //alert('crystalId == ' + crystalId);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("crystalDetails").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogcrisbd.php?panelName=" + panelName +
            "&preId=" + preId + "&postId=" + postId +
            "&page=" + page + "&sttrId=" + crystalId, true);
    xmlhttp.send();
}
function navigateBackToCrystalPanel(documentRootPath, panel, page) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("crystalDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/ogcrlidv.php?page=" + page, true);
    xmlhttp.send();

}

function searchCrystalNames(itemName, divNum, keyCodeInput) {
    keyCodeForItemNames = keyCodeInput;
    divNumForItemNames = divNum;
    panelNameForItemNames = divNum;

    //document.getElementById("ajaxLoadGetItemListDiv").style.visibility = "visible";

    var poststr = "itemName=" + encodeURIComponent(itemName)

            + "&divNum=" + encodeURIComponent(divNum);

    search_crystal_names('include/php/ogcrladv.php', poststr);
}

function searchcrystalByAmountRange(obj) {
    if (valSearchCrystalByAmountRangeInputs(obj)) {
        var poststr = "startRange=" + encodeURIComponent(document.srch_stock_AmtRange.stockAmtStartRange.value)
                + "&endRange=" + encodeURIComponent(document.srch_stock_AmtRange.stockAmtEndRange.value)
                + "&itemName=" + encodeURIComponent(document.srch_stock_AmtRange.stockItemName.value)

                + "&metalWt=" + encodeURIComponent(document.srch_stock_AmtRange.selectMetalWeight.value);//TO PASS METAL WEIGHT TYPE 

        //alert( poststr);  
        search_crystal_by_amt_range('include/php/ogcrlisd.php', poststr);
    }
}

function valSearchCrystalByAmountRangeInputs(obj) {
    if (validateEmptyField(document.srch_stock_AmtRange.stockAmtStartRange.value, "Please enter start range!") == false) {
        document.srch_stock_AmtRange.stockAmtStartRange.focus();
        return false;
    }
    /*else if (validateEmptyField(document.srch_stock_AmtRange.stockAmtEndRange.value,"Please enter end range!") == false ||
     validateNumWithDot(document.srch_stock_AmtRange.stockAmtEndRange.value,"Accept only Numbers without space character!") == false) {
     document.srch_stock_AmtRange.stockAmtEndRange.focus();
     return false;
     }*/
    else if (validateEmptyField(document.srch_stock_AmtRange.stockAmtEndRange.value, "Please enter end range!") == false)
    {
        document.srch_stock_AmtRange.stockAmtEndRange.focus();
        return false;
    }
    return true;
}
function search_crystal_by_amt_range(url, parameters) {
    loadXMLDoc();

    xmlhttp.onreadystatechange = alertSearchCrystalByAmtRange;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/**********Start code to change div @Author:PRIYA06FEB14*************/
function alertSearchCrystalByAmtRange() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("stockByAmtRangeGoButt").style.visibility = "visible";
        document.getElementById("CrystalSubPanel").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("stockByAmtRangeGoButt").style.visibility = "hidden";
    }
}


function search_crystal_names(url, parameters) {
    loadXMLDoc();

    xmlhttp.onreadystatechange = alertSearchCrystalNames;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchCrystalNames() {


    if (panelNameForItemNames == 'CrystalPanel') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemListCrystalPanelToAddItemSelect").innerHTML = xmlhttp.responseText;
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
                document.getElementById('itemListToAddItemSelect').focus();
                document.getElementById('itemListToAddItemSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    }

}

//Start code to search crystal by range in crystal list @Author:SHE27FEB15

function valSearchCrystalStockByRequirement(obj) {
    if (validateEmptyField(document.srch_crystalStock.stockAmtStartRange.value, "Please enter start range!") == false) {
        document.srch_crystalStock.stockAmtStartRange.focus();
        return false;
    } else if (validateEmptyField(document.srch_crystalStock.stockAmtEndRange.value, "Please enter end range!") == false)
    {
        document.srch_crystalStock.stockAmtEndRange.focus();
        return false;
    }
    return true;
}

function search_Crystal_stock(url, parameters) {
    loadXMLDoc();

    xmlhttp.onreadystatechange = alertSearchCrystalStock;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
/**********Start code to change div @Author:PRIYA06FEB14*************/
function alertSearchCrystalStock() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("stockByAmtRangeGoButt").style.visibility = "visible";
        document.getElementById("crystalStockListDiv").innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("stockByAmtRangeGoButt").style.visibility = "hidden";
    }
}
/**********End code to change div @Author:PRIYA06FEB14*************/
function searchCrystalStock(obj) {
    if (valSearchCrystalStockByRequirement(obj)) {
        var poststr = "startRange=" + encodeURIComponent(document.srch_crystalStock.stockAmtStartRange.value)
                + "&endRange=" + encodeURIComponent(document.srch_crystalStock.stockAmtEndRange.value)
                + "&itemName=" + encodeURIComponent(document.srch_crystalStock.stockItemName.value)

                + "&metalWt=" + encodeURIComponent(document.srch_crystalStock.selectMetalWeight.value)
                + "&searchPanel=" + encodeURIComponent(document.srch_crystalStock.panelName.value);
        search_Crystal_stock('include/php/ogcrmnlt.php', poststr);
    }
}
//End code to search crystal by range in crystal list @Author:SHE27FEB15


function sellPurchaseSubmitCrystal() {
    if (document.getElementById('panelName').value == 'CrySellPayUp' && document.getElementById('noOfInv').value > 0) {
        alert('You can not update this item');
        return false;
    } else {
        if (validateSelectField(document.getElementById("slPrDOBDay").value, "Please select Day!") == false) {
            document.getElementById("slPrDOBDay").focus();
            return false;
        } else if (validateSelectField(document.getElementById("slPrDOBMonth").value, "Please select Month!") == false) {
            document.getElementById("slPrDOBMonth").focus();
            return false;
        } else if (validateSelectField(document.getElementById("slPrDOBYear").value, "Please select Year!") == false) {
            document.getElementById("slPrDOBYear").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("slPrInvoiceNo").value, "Please enter Invoice Number!") == false ||
                validateNum(document.getElementById("slPrInvoiceNo").value, "Accept only numeric characters without space character!") == false) {
            document.getElementById("slPrInvoiceNo").focus();
            return false;
        } else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm!") == false) {
            document.getElementById("firmId").focus();
            return false;
        } else if (validateSelectField(document.getElementById("sttr_account_id").value, "Please select Account Name!") == false) {
            document.getElementById("sttr_account_id").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please enter Item Name!") == false) {
            document.getElementById("sttr_item_name").focus();

        } else if (validateEmptyField(document.getElementById("sttr_quantity").value, "Please enter Crystal Quantity!") == false ||
                validateNum(document.getElementById("sttr_quantity").value, "Accept only numeric characters without space!") == false) {
            document.getElementById("sttr_quantity").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_gs_weight").value, "Please enter Gross Weight!") == false ||
                validateNumWithDot(document.getElementById("sttr_gs_weight").value, "Accept only numeric characters without space!") == false) {
            document.getElementById("sttr_gs_weight").focus();
            return false;
        } else if (validateEmptyField(document.getElementById("sttr_sell_rate").value, "Please enter Crystal Rate!") == false) {
            document.getElementById("sttr_sell_rate").focus();
            return false;
        }
//    else if (validateEmptyField(document.getElementById("slPrItemCryTax").value, "Please enter Crystal Tax!") == false ||
//            validateNum(document.getElementById("slPrItemCryTax").value, "Accept only numeric characters without space!") == false) {
//        document.getElementById("slPrItemCryTax").focus();
//        return false;
//
//    }
        else
            return true;
    }
}

function labelsFormCrystal(count, labelType, fieldName, fieldValue, fontSize, fontColor, divId, display) {
    if (display == 'NO' || divId == 'tncDiv' || divId == 'authSignLbDiv' || divId == 'invTitleDiv' || fieldName == 'formBorderCheck' || divId == 'footerLbDiv') {
        var check = document.getElementById("fontCheckId" + count).checked;
    }
    if (fieldName != 'firmLeftLogoCheck' && fieldName != 'firmRightLogoCheck' && fieldName != 'design' && divId != '' && fontSize == '') {
        alert("Please Enter Font Size !");
    } else {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                document.getElementById("cuMessDisplayDiv").innerHTML = "<span class='fs_14 ff_calibri reddish'>UPDATED</span>";
                window.setTimeout(closeMessDetails, 1500);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", "include/php/ogcrcufd.php?labelType=" + labelType + "&count=" + count + "&fieldName=" + fieldName + "&fieldValue=" + fieldValue + "&fontSize=" + fontSize +
                "&fontColor=" + fontColor + "&fieldCheck=" + check + "&panel=CustomizedFormMainPanel", true);
        xmlhttp.send();
    }
    function closeMessDetails()
    {
        document.getElementById("cuMessDisplayDiv").innerHTML = "";
    }
}

function getBackPanel(layoutPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (layoutPanel == 'CrystalSoldOutList') {
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/ogspsblt.php?layoutPanel=" + layoutPanel, true);
    xmlhttp.send();

}

function openCrystalFormDiv(divId, count, display, labelId, fieldName, fieldValue, fontSize, fontColor, fieldCheck, inputWidth, labelType, topMargin, leftMargin) {
    fieldValue = encodeURIComponent(fieldValue);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            if (labelType != 'SchemeBook') {
                document.getElementById('fontSize' + count).focus();
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogcrcfmd"+ default_theme + ".php?divId=" + divId + "&count=" + count + "&display=" + display + "&labelId=" + labelId + "&labelType=" + labelType + "&fieldName=" + fieldName
            + "&fieldValue=" + fieldValue + "&inputWidth=" + inputWidth + "&fontSize=" + fontSize + "&fontColor=" + fontColor + "&fieldCheck=" + fieldCheck + "&topMargin=" + topMargin + "&leftMargin=" + leftMargin, true);
    xmlhttp.send();
}

function showSuppCrystalPurchaseDetails(newPreInvoiceNo, newInvoiceNo, panel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("supp_middle_body").innerHTML = xmlhttp.responseText;
        } else
        {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'RawMetal') {
        xmlhttp.open("POST", "include/php/ogrwprdt.php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo, true);
    } else
    {
        xmlhttp.open("POST", "include/php/ogcrhprd.php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo, true);
    }
    xmlhttp.send();
}

function  calCrySuppDepositBalance() {

    prefix = 'suppUdDp';
    var count = 1;
    var delId = 'del' + 1;
    var totAmtRec = 0;
    var gdVal = 0;
    var slVal = 0;
    var cash = document.getElementById('suppUdhaarCash').value;
    if (cash == '')
        cash = 0;

    document.getElementById('suppUdhaarAmtBal').value = parseFloat(parseFloat(cash)).toFixed(2);
    return false;
}

//function validateCrySuppUdhaarPaymentInputs() {
//    var metcnt = document.getElementById("metalCount").value
////    if (validateEmptyField((document.getElementById("suppUdhaarGoldWgtBal").value, "Please enter either Gold Balance or Silver Balance or Cash") == false) || ((document.getElementById("suppUdhaarSilverWgtBal").value, "Please enter Item Id!") == false)
////            || ((document.getElementById("suppUdhaarCash").value, "Please enter Item Id!") == false) ||
////            validateNum(document.getElementById("suppUdhaarGoldWgtBal").value, "Accept only numeric characters without space character!") == false) {
////        document.getElementById("suppUdhaarCash").focus();
////        return false;
////    }
//    if ((document.getElementById("suppUdDpPayMetal1Val" + metcnt).value == 0) && (document.getElementById("suppUdhaarCash").value == '')) {
//        alert("Please enter either Gold Balance or Silver Balance or Cash")
//        document.getElementById("suppUdhaarCash").focus();
//        return false;
//    }
////    var totalGoldWtBal = document.getElementById("totalGdWtBal").value;
////    var totalSilverWtBal = document.getElementById("totalSlWtBal").value;
////
////    var suppUdInvGdWtBlType = document.getElementById("suppUdInvGoldWTBalType").value;
////    var suppUdInvSlWtBlType = document.getElementById("suppUdInvSilverWTBalType").value;
////
////    var suppUdhaarDepGdWtBl = document.getElementById("suppUdhaarGoldWgtBal").value;
////    var suppUdhaarDepGdWtBlType = document.getElementById("suppUdhaarGoldWgtBalType").value;
////    var suppUdhaarDepSlWtBl = document.getElementById("suppUdhaarSilverWgtBal").value;
////    var suppUdhaarDepSlWtBlType = document.getElementById("suppUdhaarSilverWgtBalType").value;
////
////
////    if (suppUdInvGdWtBlType != suppUdhaarDepGdWtBlType) {
////        confirm_box = confirm("You Have Entered Gold Weight Other Than Final Weight!\nDo You Want To Continue?");
////        if (confirm_box == true)
////        {
////            if (suppUdInvSlWtBlType != suppUdhaarDepSlWtBlType) {
////                confirm_box = confirm("You Have Entered Silver Weight Other Than Final Weight!\nDo You Want To Continue?");
////                if (confirm_box == true)
////                {
////                    if (validateEmptyField(document.getElementById("suppUdhaarAmtBal").value, "Please enter value in Total Amount Balance Field!") == false ||
////                            validateNumWithDot(document.getElementById("suppUdhaarAmtBal").value, "Accept only numeric value!") == false) {
////                        document.getElementById("suppUdhaarAmtBal").focus();
////                        return false;
////                    }
////                    return true;
////                }
////            }//if(Silver Wt Type)
////        }//if(Gold Wt Type Confirm box)    
////
////    }//if(Gold Wt Type)
////    else {
////        if (suppUdhaarDepGdWtBl > totalGoldWtBal) {
////            confirm_box = confirm("You Have Entered Gold Weight More Than Total Gold Weight!\nDo You Want To Continue?");
////            if (confirm_box == true)
////            {
////                if (suppUdInvSlWtBlType == suppUdhaarDepSlWtBlType) {
////                    if (suppUdhaarDepSlWtBl > totalSilverWtBal) {
////                        confirm_box = confirm("You Have Entered Silver Weight More Than Total Silver Weight!\nDo You Want To Continue?");
////                        if (confirm_box == true)
////                        {
////                            if (validateEmptyField(document.getElementById("suppUdhaarAmtBal").value, "Please enter value in Total Amount Balance Field!") == false ||
////                                    validateNumWithDot(document.getElementById("suppUdhaarAmtBal").value, "Accept only numeric value!") == false) {
////                                document.getElementById("suppUdhaarAmtBal").focus();
////                                return false;
////                            }
////                            return true;
////                        }
////                    }//if(Silver Wt Type)
////                }
////            }
////        }//if(Silver Wt)
////    }
////    if (suppUdInvSlWtBlType != suppUdhaarDepSlWtBlType) {
////        confirm_box = confirm("You Have Entered Silver Weight Other Than Final Weight!\nDo You Want To Continue?");
////        if (confirm_box == true)
////        {
////            if (validateEmptyField(document.getElementById("suppUdhaarAmtBal").value, "Please enter value in Total Amount Balance Field!") == false ||
////                    validateNumWithDot(document.getElementById("suppUdhaarAmtBal").value, "Accept only numeric value!") == false) {
////                document.getElementById("suppUdhaarAmtBal").focus();
////                return false;
////            }
////            return true;
////        }
////    } else {
////        if (suppUdhaarDepSlWtBl > totalSilverWtBal) {
////            confirm_box = confirm("You Have Entered Silver Weight More Than Total Silver Weight!\nDo You Want To Continue?");
////            if (confirm_box == true)
////            {
////                if (validateEmptyField(document.getElementById("suppUdhaarAmtBal").value, "Please enter value in Total Amount Balance Field!") == false ||
////                        validateNumWithDot(document.getElementById("suppUdhaarAmtBal").value, "Accept only numeric value!") == false) {
////                    document.getElementById("suppUdhaarAmtBal").focus();
////                    return false;
////                }
////                return true;
////            }
////        }//if(Silver Wt)
////    }
//    /*****Start code to remove validations @Author:PRIYA15NOV13**********/
////    if (validateEmptyField(document.getElementById("suppUdhaarAmtBal").value,"Please enter value in Total Amount Balance Field!") == false ||
////        validateNumWithDot(document.getElementById("suppUdhaarAmtBal").value,"Accept only numeric value!") == false) {  
////        document.getElementById("suppUdhaarAmtBal").focus();
////        return false;
////    }
//    /*****End code to remove validations @Author:PRIYA15NOV13**********/
//    return true;
//}
///*********End code to change func @Author:PRIYA26APR14****************/
///********End Code To Add alert For Weight For Supp Udhaar @AUTHOR:PRIYA10MAY13********/
//function supp_udhaar_payment(url, parameters) {
//
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = alertCrySuppUdhaarPayment;
//    xmlhttp.open('POST', url, true);
//    xmlhttp.setRequestHeader('Content-Type',
//            'application/x-www-form-urlencoded');
//    xmlhttp.setRequestHeader("Content-length", parameters.length);
//    xmlhttp.setRequestHeader("Connection", "close");
//    xmlhttp.send(parameters);
//}
//
//function alertCrySuppUdhaarPayment() {
//
//    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        document.getElementById("suppUdhaarDiv").innerHTML = xmlhttp.responseText; //div changed @Author:PRIYA27APR14
//    } else {
//        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//    }
//}
///*************Start to change in function to execute as per panel @AUTHOR: SANDY29SEP13 *****************/
///*********Start code to add date @Author:PRIYA26APR14************/
///*********Start code to add param @Author:PRIYA20JUN14************/
//function CrysuppUdhaarPayment(panel, otherInfo) {
//    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//    document.getElementById("submiButt").style.visibility = "hidden";
//    if (validateCrySuppUdhaarPaymentInputs()) {
//        document.getElementById("metalCount").value = getMetalDiv;
//        return true;
//    }
//    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//    document.getElementById("submiButt").style.visibility = "visible";
//    return false;
//}

function navigateCrystalPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/ogcramrd" + default_theme + ".php", true);
    xmlhttp.send();
}
function validateAddCrystalRateInputs(obj) {
    if (validateEmptyField(document.getElementById("crystalSelectId").value, "Please enter Crystal Id!") == false) {
        document.getElementById("crystalSelectId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("crystalRate").value, "Please enter Crystal Rate!") == false ||
            validateNum(document.getElementById("crystalRate").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("crystalRate").focus();
        return false;

    }
    return true;
}
/***End of changes in validation @AUTHOR: SANDY21DEC13**/
function add_crystal_rate(url, parameters) {
    //alert("parameters = "+parameters);
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertAddCrystalRate;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

/*********Start Code To Add Message Disp Delay Func @Author:PRIYA16AUG13*******/
function alertAddCrystalRate() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addCrystalRateButDiv").style.visibility = "visible";
        document.getElementById("settingTablesDiv").innerHTML = xmlhttp.responseText;
        refreshMetalRate();
        window.setTimeout(closeMetRateMessDiv, 1000);
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "visible";
        document.getElementById("addCrystalRateButDiv").style.visibility = "hidden";
    }
    function closeMetRateMessDiv() {
        document.getElementById("crystalRateMessDisplayDiv").innerHTML = "";
    }
}
/* Start of modification to pass goldid and customer percentage @AUTHOR: SANDY25JUL13 */
/****************Start code to add ids @Author:PRIYA10NOV14****************/
/*****************Start code to add ids @Author:PRIYA02DEC14******************/
function addCrystalRate(obj) {
    //
    document.getElementById("ajax_loading_div").style.visibility = "visible";
    document.getElementById("addCrystalRateButDiv").style.visibility = "hidden";
    //
    if (validateAddCrystalRateInputs(obj)) {
        //
        var poststr = "&clarityColor=" + encodeURIComponent(document.getElementById("clarityColor").value)
                + "&clarityRate=" + encodeURIComponent(document.getElementById("clarityRate").value)
                + "&cryColor=" + encodeURIComponent(document.getElementById("cryColor").value)
                + "&colorRate=" + encodeURIComponent(document.getElementById("colorRate").value)
                + "&crystalRate=" + encodeURIComponent(document.getElementById("crystalRate").value)
                + "&cut=" + encodeURIComponent(document.getElementById("cut").value)
                + "&shape=" + encodeURIComponent(document.getElementById("shape").value)
                + "&certificateLab=" + encodeURIComponent(document.getElementById("certificateLab").value)
                + "&crystalRateComments=" + encodeURIComponent(document.getElementById("crystalRateComments").value)
                + "&crystalSelectId=" + encodeURIComponent(document.getElementById("crystalSelectId").value)
                + "&crystalRatePurchaseWtTp=" + encodeURIComponent(document.getElementById("crystalRatePurchaseWtTp").value)
                + "&crystalRatePerWtTp=" + encodeURIComponent(document.getElementById("crystalRatePerWtTp").value)
                + "&crystalCategory=" + encodeURIComponent(document.getElementById("crystalCategory").value)
                + "&crystalName=" + encodeURIComponent(document.getElementById("crystalName").value)
                + "&crystalSellRate=" + encodeURIComponent(document.getElementById("crystalSellRate").value)
                + "&colorclarity=" + encodeURIComponent(document.getElementById("colorclarity").value)
        //
        add_crystal_rate('include/php/ogcradmr.php', poststr);
        //
    } else {
        //
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addCrystalRateButDiv").style.visibility = "visible";
        //
    }
}
// After update item 
function updCrystalRate(obj) {
    //
    document.getElementById("ajax_loading_div").style.visibility = "visible";
    document.getElementById("addCrystalRateButDiv").style.visibility = "hidden";
    //
    if (validateAddCrystalRateInputs(obj)) {
        //
        var poststr = "&clarityColor=" + encodeURIComponent(document.getElementById("clarityColor").value)
                + "&clarityRate=" + encodeURIComponent(document.getElementById("clarityRate").value)
                + "&cryColor=" + encodeURIComponent(document.getElementById("cryColor").value)
                + "&colorRate=" + encodeURIComponent(document.getElementById("colorRate").value)
                + "&crystalRate=" + encodeURIComponent(document.getElementById("crystalRate").value)
                + "&cut=" + encodeURIComponent(document.getElementById("cut").value)
                + "&shape=" + encodeURIComponent(document.getElementById("shape").value)
                + "&certificateLab=" + encodeURIComponent(document.getElementById("certificateLab").value)
                + "&crystalRateComments=" + encodeURIComponent(document.getElementById("crystalRateComments").value)
                + "&crystalSelectId=" + encodeURIComponent(document.getElementById("crystalSelectId").value)
                + "&crystalRatePurchaseWtTp=" + encodeURIComponent(document.getElementById("crystalRatePurchaseWtTp").value)
                + "&crystalRatePerWtTp=" + encodeURIComponent(document.getElementById("crystalRatePerWtTp").value)
                + "&crystalCategory=" + encodeURIComponent(document.getElementById("crystalCategory").value)
                + "&crystalName=" + encodeURIComponent(document.getElementById("crystalName").value)
                + "&crystalSellRate=" + encodeURIComponent(document.getElementById("crystalSellRate").value)
                + "&colorclarity=" + encodeURIComponent(document.getElementById("colorclarity").value)
        //
        add_crystal_rate('include/php/ogcradmr.php', poststr + "&panelName=upCrystalMetal");
        //
    } else {
        //
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addCrystalRateButDiv").style.visibility = "visible";
        //
    }
}

function deleteCrystalDetails(panelName, crystalId) {
    confirm_box = confirm(deleteAlertMess + "\n\nDo you really want to Permanent Delete this Crystal Details?");//change in line @AUTHOR: SANDY28JAN14

    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("cryDetDiv").innerHTML = xmlhttp.responseText;
                window.setTimeout(closeCryRateDelMessDiv, 1000);
            } else {
                if (panelName == 'crystal')
                    document.getElementById("deleteCryDet" + crystalId).innerHTML = "<img src='images/loading16.gif' />";

            }
        };
        xmlhttp.open("POST", "include/php/omcrmdel.php?crystalId=" + crystalId, true);
        xmlhttp.send();
    }
    function closeCryRateDelMessDiv() {
        document.getElementById("messDisplayDiv").innerHTML = "";
    }
}
// Click Crytal id and update
function updateCrystalRate(crystalId) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("cryDetDiv").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", "include/php/ogcramrd.php?crystalId=" + crystalId + "&panelName=upCrystalMetal", true);
        xmlhttp.send();
}
//
function getCrystalRateDiv(crystalId, div, id, keyCodeInput) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('crystalIdListDivToAddCrystalIdSelect').focus();
                document.getElementById('crystalIdListDivToAddCrystalIdSelect').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogcrwpct.php?crystalId=" + crystalId + "&div=" + div + "&id=" + id, true);
    xmlhttp.send();
}

function getSuppDepCrystalType(documentRootPath, suppUdhaarId, crystalId, metalRate, panel, preInv, postInv) {
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
function changeAddCrystalRate(crystalId) {
    var poststr = "crystalId=" + encodeURIComponent(crystalId) +
            "&panelName=" + encodeURIComponent(addstockDiv);

    change_add_crystal_rate('include/php/omcrcydr.php', poststr);

    return false;
}
function change_add_crystal_rate(url, parameters) {

    loadXMLDoc2();

    xmlhttp2.onreadystatechange = alertChangeAddCrystalRate;

    xmlhttp2.open('POST', url, true);
    xmlhttp2.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp2.setRequestHeader("Content-length", parameters.length);
    xmlhttp2.setRequestHeader("Connection", "close");
    xmlhttp2.send(parameters);

}

function alertChangeAddCrystalRate() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        if (addstockDiv == 'CrystalPanel') {
            document.getElementById("crystalRateDiv").innerHTML = xmlhttp2.responseText;
        }
        /**End for crystal panel  @Author:SHE12MAR15***/
//        changeStockCrystalId(addItemCryType, panelName);//Commented @Author:SHRI28NOV16
//        changeStockItemId(addStockMetalType, addstockDiv);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
// Start code to add function for display crystal stock list @Author:SHRI14MAR15
function showCrystalStock() {
    // alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {//alert(xmlhttp.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("crystalStockList").innerHTML = xmlhttp.responseText;  //change in div name @AUTHOR: SANDY25SEP13

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/ogcrstls.php", true);
    xmlhttp.send();
}
// End code to add function for display crystal stock list @Author:SHRI14MAR15
function changeStockCrystalRate(crystalRateValue, itstId, panelName, pageNum) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("crystalDetails").innerHTML = xmlhttp.responseText;
            window.setTimeout(closeMessDispDetails, 1000);
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogcrisbd.php?crystalRateValue=" + crystalRateValue + "&itstId=" + itstId + "&panelName=" + panelName + "&page=" + pageNum, true);
    xmlhttp.send();
}
/*********Start code to comment code as panel is passed in original function @Author:PRIYA06APR15*********/
//function getCrystalSoldOutList(panel)
//{
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function() {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    if (panel == 'CrystalSoldOutList')
//        xmlhttp.open("GET", "include/php/ogcrspst.php?panel=" + panel, true);
//    else
//        xmlhttp.open("GET", "include/php/ogspsblt.php", true);
//    xmlhttp.send();
//}
/*********End code to comment code as panel is passed in original function @Author:PRIYA06APR15*********/
/*********start code for crsytal sold out list onclick datatable  @Author:ATHU12APR17*********/
function showSellPurchaseCryDetails(custId, preInvoiceNo, panelName, aa, postInvoiceNo, itemId) {
    var documentRootPath = document.getElementById('documentRootPath').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/omcdccdd.php?custId=" + custId + "&panelDivName=" + 'SellPurchase' + "&panelName=" + 'CrySellPayUp' + "&divMainMiddlePanel=" + panelName + "&preInvoiceNo=" + preInvoiceNo +
            "&postInvoiceNo=" + postInvoiceNo + "&mainPanel=CrystalPurchasePanel", true);
//    panelDivName=SellPurchase&mainPanel=ItemPurchase&panelName=SellPayUp&divMainMiddlePanel=SellPayUp&preInvoiceNo=ICP&postInvoiceNo=1
//    xmlhttp.open( "POST", documentRootPath + "/include/php/ogspisdv.php?custId=" + custId + "&slPrId=" + itemId + "&mainPanel=CrystalPurchasePanel" + "&panelName=SellPayUp", true);

    xmlhttp.send();
}
/*********END CODE for crsytal sold out list onclick datatable  @Author:ATHU12APR17*********/
function deleteCrystalSuppUdhaarDepAmt(suppUdhaarDepId, suppUdhaarDepDiv, newPreInvoiceNo, newInvoiceNo, jrnlId, payId) {
    globalSuppDepUdhaarDiv = suppUdhaarDepDiv;

    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";

    confirm_box = confirm("Do you really want to delete this udhaar amount?");

    if (confirm_box == true)
    {
        var poststr = "suppUdhaarDepId=" + suppUdhaarDepId +
                "&newPreInvoiceNo=" + newPreInvoiceNo +
                "&newInvoiceNo=" + newInvoiceNo +
                "&jrnlId=" + jrnlId + "&payId=" + payId;

        delete_crystal_supp_udhar_dep_amt('include/php/ogcrdpdl.php', poststr);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        exit();
    }
}
function delete_crystal_supp_udhar_dep_amt(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertDeleteCrystalSuppUdharDepAmt;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}
function alertDeleteCrystalSuppUdharDepAmt() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("suppUdhaarDiv").innerHTML = xmlhttp.responseText;
    } else {
        //  document.getElementById("suppUdharDepAmtDelButt" + globalSuppDepUdhaarDiv).innerHTML = "<img src='images/loading16.gif' />";
    }

}
//amol
function showJewelleryType(divPanel, metalType) {
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('addStockItemDetails').innerHTML = xmlhttp.responseText;

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        }
    };
//    if (metalType == 'Gold')
//        xmlhttp.open("POST", "include/php/ogwgstlt.php?divPanel=" + divPanel + "&metalType=" + metalType, true);
//    else if (metalType == 'Silver')
//        xmlhttp.open("POST", "include/php/ogwsrslt.php?divPanel=" + divPanel + "&metalType=" + metalType, true);
    if (divPanel == 'stock') {
        xmlhttp.open("POST", "include/php/ogwgstlt.php?divPanel=" + divPanel + "&metalType=" + metalType, true);
    } else if (divPanel == 'rawMetal') {
        xmlhttp.open("POST", "include/php/ogwsrslt.php?divPanel=" + divPanel + "&metalType=" + metalType, true);
    }
    xmlhttp.send();
}
/* Start code to Add functions for Raw metal OMMODTAG_SHE28DEC15 */



function showRateCutdiv() {
    document.getElementById('rateCut').style.color = 'green';

    document.getElementById('noRateCut').style.color = 'gray';


}
//function getStockSellRawMetalType(panelName, metalType, metalCount, firmId, rawGdPreId, rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId, metalTypePanel, cntr, otherChgsBy, totFinGdWt, totFinSlWt) {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById("rawMetalIdDiv" + metalCount).innerHTML = xmlhttp.responseText;
//            // calcItemBalance();
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    xmlhttp.open("POST", "include/php/ogrmpydt.php?panelName=" + panelName + "&metalType=" + metalType +
//            "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
//            "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId + "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
//            "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt, true);
//    xmlhttp.send();
//}

function calcRawItemBalance(prefix) {

    var metalEntered = 0;
    var metalCount = document.getElementById("metalCount").value;
    if (document.getElementById('metalPanel').value == 'RawPayment' || document.getElementById('metalPanel').value == 'RawPayUp') {
        prefix = 'rmpr';
    } else if (document.getElementById('metalPanel').value == 'CustSellPayment' || document.getElementById('metalPanel').value == 'CustSellPayUp') {
        prefix = 'sell';
    }
    if (document.getElementById('metalPanel').value == 'CustSellPayment' || document.getElementById('metalPanel').value == 'RawPayment') {
        count = 1;
        delId = 'del' + 1;
    } else if (
            document.getElementById('metalPanel').value == 'CustSellPayUp' || document.getElementById('metalPanel').value == 'RawPayUp') {
        getMetalDiv = document.getElementById('noOfRawMet').value;
        var count = document.getElementById('rawId').value;
        var delId = 'del' + count;
    }
    var totAmtRec = 0;
    var gdBal = 0;
    var slBal = 0;
    var totRecGd = 0;
    var totRecSl = 0;
    var goldWeight = 0;
    var silverWeight = 0;
    var silverWeightType = '';
    var goldWeightType = '';
    var metalWeight = '';

    for (var dc = count; getMetalDiv != ''; dc++) {

        if (document.getElementById('metalDel' + dc).value != 'Deleted') {
            var payTotalWeight1 = document.getElementById(prefix + 'PayMetal1RecWt' + dc).value;

            var payTotalWeightType1 = document.getElementById(prefix + 'PayMetal1RecWtType' + dc).value;

            var payMetalRate1 = document.getElementById(prefix + 'PayMetal1Rate' + dc).value;
            var payMetalTunch1 = document.getElementById(prefix + 'PayMetal1Tunch' + dc).value;

            var metalWeight = (payTotalWeight1 * payMetalTunch1) / 100;


            document.getElementById(prefix + 'PayMetal1FnWt' + dc).value = parseFloat(metalWeight).toFixed(2);


            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold' || document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Alloy') {
                goldWeight = metalWeight;



                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) * document.getElementById('gmWtInKg').value).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInMg').value).toFixed(2);
                }

                if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold') {
                    var payMetalDueWeightType1 = goldWeightType = document.getElementById(prefix + 'GoldTotFineWtType').value;
                    goldWeightType = payMetalDueWeightType1;
                    if (gdBal == '') {
                        gdBal = document.getElementById(prefix + 'GoldTotRemFineWt').value;
                    }


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

                    document.getElementById(prefix + 'PayMetal1Bal' + dc).value = gdBal;

                    document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;

                    if (document.getElementById('payPanelName').value != 'RawPayUp' && document.getElementById('payPanelName').value != 'CustSellPayUp') {


                        document.getElementById('metal1RtCtWt').value = parseFloat(gdBal).toFixed(3);  // SHE08MAR16
                        document.getElementById('metal1RtCtWtBal1').value = gdBal;
//                        alert(document.getElementById('metal1RtCtWtBal1').value );

                        document.getElementById('metal1RtCtWtType').value = payMetalDueWeightType1;
                        document.getElementById(prefix + 'PayMetal1WtBal').value = gdBal;
// alert(document.getElementById(prefix + 'PayMetal1WtBal').value );
                        document.getElementById(prefix + 'PayMetal1WtBalType').value = payMetalDueWeightType1;

                    }
                    if (document.getElementById('rawPurPriceCut').value != 'rateCut') {
                        if (document.getElementById('payPanelName').value != 'RawPayment' && document.getElementById('payPanelName').value != 'CustSellPayment') {
                            document.getElementById('metal1RtCtWt').value = parseFloat(gdBal).toFixed(3);  // SHE08MAR16
                            document.getElementById('metal1RtCtWtBal1').value = gdBal;
//                        alert(document.getElementById('metal1RtCtWt').value );

                            document.getElementById('metal1RtCtWtType').value = payMetalDueWeightType1;
                            document.getElementById(prefix + 'PayMetal1WtBal').value = gdBal;
// alert(document.getElementById(prefix + 'PayMetal1WtBal').value );
                            document.getElementById(prefix + 'PayMetal1WtBalType').value = payMetalDueWeightType1;

                        }
                    }
                    totRecGd += parseFloat(goldWeight);
                }
            }

//              alert(  totRecGd);
            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Silver') {
                silverWeight = metalWeight;
//                alert(silverWeight);
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1 * document.getElementById('srGmWtInKg').value)).toFixed(3);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1) / document.getElementById('srGmWtInGm').value).toFixed(3);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1) / (document.getElementById('srGmWtInMg').value)).toFixed(3);
                }

                payMetalDueWeightType1 = silverWeightType = document.getElementById(prefix + 'SilverTotFineWtType').value;
                if (slBal == '') {
//                    slBal = document.getElementById(prefix + 'SilverTotFineWt').value;
                    slBal = document.getElementById(prefix + 'SilverTotRemFineWt').value;
                }

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

                document.getElementById(prefix + 'PayMetal1Bal' + dc).value = slBal;
                document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;

                if (document.getElementById('payPanelName').value != 'RawPayUp' && document.getElementById('payPanelName').value != 'CustSellPayUp') {

                    document.getElementById('metal2RtCtWt').value = parseFloat(slBal).toFixed(3);  // SHE08MAR16
                    document.getElementById('metal2RtCtWtBal1').value = parseFloat(slBal).toFixed(3);
                    document.getElementById('metal2RtCtWtType').value = payMetalDueWeightType1;
                    document.getElementById(prefix + 'PayMetal2WtBal').value = slBal;

                    document.getElementById(prefix + 'PayMetal2WtBalType').value = payMetalDueWeightType1;
                }



                if (document.getElementById('rawPurPriceCut').value != 'rateCut') {
                    if (document.getElementById('payPanelName').value != 'RawPayment' && document.getElementById('payPanelName').value != 'CustSellPayment') {
                        document.getElementById('metal2RtCtWt').value = parseFloat(slBal).toFixed(3);  // SHE08MAR16
                        document.getElementById('metal2RtCtWtBal1').value = parseFloat(slBal).toFixed(3);
                        document.getElementById('metal2RtCtWtType').value = payMetalDueWeightType1;
                        document.getElementById(prefix + 'PayMetal2WtBal').value = slBal;
                    }
                }
                totRecSl += silverWeight;
            }

            document.getElementById('metal1WtRecBal').value = parseFloat(totRecGd).toFixed(3) + ' ' + goldWeightType;
            document.getElementById('metal1WtRecBal1').value = parseFloat(totRecGd).toFixed(3);

            document.getElementById('metal1WtRecBal1Typ').value = goldWeightType;


            document.getElementById('metal2WtRecBal').value = parseFloat(totRecSl).toFixed(3) + ' ' + silverWeightType;
            document.getElementById('metal2WtRecBal1').value = parseFloat(totRecSl).toFixed(3);

            document.getElementById('metal2WtRecBal1Typ').value = silverWeightType;
            var metalValuation1 = document.getElementById(prefix + 'PayMetal1Val' + dc).value;
            if (metalValuation1 == '') {
                metalValuation1 = 0;
            }
            totAmtRec += parseFloat(metalValuation1);

            calcRawMetItem(prefix);
            calcRawRrCtCashBalance(prefix);
        }
        metalEntered++;
    }
    return false;
}

function calcRawRrCtCashBalance(prefix) {
//    alert(prefix);
    if (document.getElementById(prefix + 'PayCashAmtRec').value != '' || document.getElementById(prefix + 'PayChequeAmt').value || document.getElementById(prefix + 'PayCardAmt').value) {
        var totalCashPaidAmt = document.getElementById(prefix + 'PayCashAmtRec').value;
        if (totalCashPaidAmt == null || totalCashPaidAmt == '') {
            totalCashPaidAmt = 0;
        }
        var totalChequeAmt = document.getElementById(prefix + 'PayChequeAmt').value;
        if (totalChequeAmt == null || totalChequeAmt == '') {
            totalChequeAmt = 0;
        }
        var totalCardAmt = document.getElementById(prefix + 'PayCardAmt').value;
        if (totalCardAmt == null || totalCardAmt == '') {
            totalCardAmt = 0;
        }
        document.getElementById(prefix + 'PayCashRecDisp').value = Math_round(parseFloat(totalCashPaidAmt) + parseFloat(totalChequeAmt) + parseFloat(totalCardAmt)).toFixed(2);
        document.getElementById(prefix + 'PayTotCashAmt').value = parseFloat(parseFloat(totalCashPaidAmt) + parseFloat(totalChequeAmt) + parseFloat(totalCardAmt)).toFixed(2);
    }

    if (document.getElementById('VATTax').value != '' || document.getElementById('VATTax').value != null) {
        var totalValuation = document.getElementById('taxOnTotAmt').value;
        if (totalValuation == null || totalValuation == '') {
            totalValuation = 0;
        }
//                alert(document.getElementById('VATTax').value );
        if (document.getElementById('VATTax').value == '') {
            document.getElementById('VATTax').value = 0;
        }
//        alert(document.getElementById('VATTax').value );
        var totTax = parseFloat(document.getElementById('VATTax').value) / 100;
        document.getElementById(prefix + 'PayVATAmtDisp').value = Math_round(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
        document.getElementById(prefix + 'PayVATAmt').value = parseFloat(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
// alert(document.getElementById(prefix + 'PayVATAmt').value); alert(document.getElementById(prefix + 'PayVATAmtDisp').value);
    }

    if (document.getElementById(prefix + 'PayVATAmt').value == 'NaN' || document.getElementById(prefix + 'PayVATAmt').value == '') {
        document.getElementById(prefix + 'PayVATAmt').value = 0.00;
    }

    if (document.getElementById(prefix + 'PayTotCashAmt').value || document.getElementById(prefix + 'PayVATAmt').value || document.getElementById(prefix + 'PayDiscount').value != '') {
        var totalAmt = 0;
        if (document.getElementById('rawPurPriceCut').value == 'rateCut') {
            var totalAmtRec = parseFloat(document.getElementById(prefix + 'PayTotAmtRec').value); // field changed @Author:SHRI20SEP16
            var otherChgs = document.getElementById(prefix + 'PayTotAmt').value;
            totalAmt = parseFloat(totalAmtRec) + parseFloat(otherChgs);
        } else {
            var totalCashPaidAmt = document.getElementById(prefix + 'PayTotAmt').value;
            if (totalCashPaidAmt == null || totalCashPaidAmt == '') {
                totalCashPaidAmt = 0;
            }
            totalAmt = parseFloat(totalCashPaidAmt);
        }
        if (document.getElementById(prefix + 'PayPrevTotAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayPrevTotAmt').value = 0;
        }

        if (document.getElementById(prefix + 'PayPrevTotAmt').value != '' || document.getElementById(prefix + 'PayPrevTotAmt').value != 0) {
            if (document.getElementById(prefix + 'PayPrevTotAmt').value > 0) {
                totalAmt = totalAmt + parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value);
            } else {
                totalAmt = totalAmt - Math.abs(parseFloat(document.getElementById(prefix + 'PayPrevTotAmt').value));
            }
        }


        if (document.getElementById(prefix + 'PayVATAmt').value == '' || document.getElementById(prefix + 'PayVATAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayVATAmt').value = 0;
        }
        if (document.getElementById(prefix + 'PayDiscount').value == '' || document.getElementById(prefix + 'PayDiscount').value == 'NaN') {
            document.getElementById(prefix + 'PayDiscount').value = 0;
        }
        if (document.getElementById(prefix + 'PayTotCashAmt').value == '' || document.getElementById(prefix + 'PayTotCashAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayTotCashAmt').value = 0;
        }
        document.getElementById(prefix + 'PayDiscountDisp').value = Math_round(parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);

//        alert(totalAmt);
//        alert(document.getElementById(prefix + 'PayVATAmt').value);

        document.getElementById(prefix + 'PayTotalFinalAmtBalDisp').value = Math_round((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value))).toFixed(2);

//        alert(document.getElementById(prefix + 'PayTotalFinalAmtBalDisp').value);
        document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math_round((parseFloat(document.getElementById(prefix + 'PayTotalFinalAmtBalDisp').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
//        alert(document.getElementById(prefix + 'PayFinAmtBalDisp').value);

        document.getElementById(prefix + 'PayTotAmtBal').value = parseFloat((parseFloat(totalAmt) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);

    }
}
function calcRawRateCut(prefix) {

    var goldBal = parseFloat(document.getElementById('metal1RtCtWtBal1').value);
    var goldWtType = document.getElementById('metal1RtCtWtType').value;
//    var Rtct = document.getElementById('metal1RtCtWt').value;
//  alert('ui' );
    if (goldBal != '') {
        document.getElementById(prefix + 'PayMetal1WtBal').value = parseFloat(goldBal - parseFloat(document.getElementById('metal1RtCtWt').value)).toFixed(3);
        document.getElementById('metal1RtCtWtBalDisp').value = document.getElementById('metal1RtCtWt').value + ' ' + goldWtType;
    }
    var silverBal = parseFloat(document.getElementById('metal2RtCtWtBal1').value);
    var silverWtType = document.getElementById('metal2RtCtWtType').value;
    if (silverBal != '') {
        document.getElementById(prefix + 'PayMetal2WtBal').value = parseFloat(silverBal - parseFloat(document.getElementById('metal2RtCtWt').value)).toFixed(3);
        document.getElementById('metal2RtCtWtBalDisp').value = document.getElementById('metal2RtCtWt').value + ' ' + silverWtType;
    }

    calcRawMetItem(prefix);
}

//function calcRawItemBalance(prefix) {
////    alert(prefix);
//
//    var metalEntered = 0;
//    var metalCount = document.getElementById("metalCount").value;
//    if (document.getElementById('metalPanel').value == 'RawPayment' || document.getElementById('metalPanel').value == 'RawPayUp')
//        prefix = 'rmpr';
//
//    if (document.getElementById('metalPanel').value == 'RawPayment') {
//        count = 1;
//        delId = 'del' + 1;
//    } else if (document.getElementById('metalPanel').value == 'RawPayUp') {
//        getMetalDiv = document.getElementById('noOfRawMet').value;
//        var count = document.getElementById('rawId').value;
//        var delId = 'del' + count;
//    }
//    var totAmtRec = 0;
//    var gdBal = 0;
//    var slBal = 0;
//    var totRecGd = 0;
//    var totRecSl = 0;
//    var goldWeight = 0;
//    var silverWeight = 0;
//    var silverWeightType = '';
//    var goldWeightType = '';
//    //    for (var dc = count; dc <= getMetalDiv; dc++) { 
//    for (var dc = count; getMetalDiv != ''; dc++) {
//        if (document.getElementById('metalDel' + dc).value != 'Deleted') {
//            var payTotalWeight1 = document.getElementById(prefix + 'PayMetal1RecWt' + dc).value;
////alert(payTotalWeight1);
//            var payTotalWeightType1 = document.getElementById(prefix + 'PayMetal1RecWtType' + dc).value;
//            var payMetalRate1 = document.getElementById(prefix + 'PayMetal1Rate' + dc).value;
//            var payMetalTunch1 = document.getElementById(prefix + 'PayMetal1Tunch' + dc).value;
//            var metalWeight = (payTotalWeight1 * payMetalTunch1) / 100;
//        
//            document.getElementById(prefix + 'PayMetal1FnWt' + dc).value = (metalWeight).toFixed(2);
//            goldWeight = metalWeight;
////                alert(goldWeight);
////            alert(document.getElementById(prefix + 'PayMetalType1' + dc).value);
//            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold' || document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Alloy') {
//                if (payTotalWeightType1 == 'KG') {
//                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) * document.getElementById('gmWtInKg').value).toFixed(2);
//                } else if (payTotalWeightType1 == 'GM') {
//                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(2);
//                } else if (payTotalWeightType1 == 'MG') {
//                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInMg').value).toFixed(2);
//                }
////                totRecGd += goldWeight;
//                if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold') {
//                    var payMetalDueWeightType1 = document.getElementById(prefix + 'GoldTotFineWtType').value;
//                    if (gdBal == '') {
//                        gdBal = document.getElementById(prefix + 'GoldTotFineWt').value;
//                    }
////                    alert(totRecGd);
////                    alert(payTotalWeightType1);
//                    if (payMetalDueWeightType1 == 'KG') {
//                        if (payTotalWeightType1 == 'KG') {
//                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(2);
//
//                        }
//                        else if (payTotalWeightType1 == 'GM') {
//                               
//                            gdBal = parseFloat(((gdBal) - (goldWeight / 1000))).toFixed(2);
//                          
//                            goldWeight = parseFloat(goldWeight / 1000);
//                              
//                        
//                        }
//                        else if (payTotalWeightType1 == 'MG') {
//                            gdBal = parseFloat(((gdBal) - goldWeight / (1000 * 1000))).toFixed(2);
//                            goldWeight = parseFloat(goldWeight / (1000 * 1000)).toFixed(2);
//                        }
//                    }
//                    else if (payMetalDueWeightType1 == 'GM') {
//                        if (payTotalWeightType1 == 'KG') {
//                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(2);
//                            goldWeight = parseFloat(goldWeight * 1000).toFixed(2);
//                        }
//                        else if (payTotalWeightType1 == 'GM') {
//                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(2);
//                        }
//                        else if (payTotalWeightType1 == 'MG') {
//                            gdBal = parseFloat(((gdBal) - goldWeight / (1000))).toFixed(2);
//                            goldWeight = parseFloat(goldWeight * 1000).toFixed(2);
//                        }
//                    }
//                    else if (payMetalDueWeightType1 == 'MG') {
//                        if (payTotalWeightType1 == 'KG') {
//                            gdBal = parseFloat(((gdBal) - goldWeight * 1000 * 1000)).toFixed(2);
//                            goldWeight = parseFloat(goldWeight * 1000 * 1000).toFixed(2);
//                        }
//                        else if (payTotalWeightType1 == 'GM') {
//                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(2);
//                            goldWeight = parseFloat(goldWeight * 1000).toFixed(2);
//                        }
//                        else if (payTotalWeightType1 == 'MG') {
//                            gdBal = parseFloat((gdBal - goldWeight)).toFixed(2);
//                        }
//                    }
////                    alert(gdBal);
//                    document.getElementById(prefix + 'PayMetal1Bal' + dc).value = gdBal;
//                    document.getElementById('metal1RtCtWtBal1').value = gdBal;
//                    document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
////                    document.getElementById(prefix + 'PayMetal1WtBal').value = gdBal;
////                    document.getElementById(prefix + 'PayMetal1WtBalType').value = payMetalDueWeightType1;
//                    document.getElementById('metal1WtBal').value = parseFloat(gdBal).toFixed(3);
//                    document.getElementById('metal1WtBalType').value = payMetalDueWeightType1;
//                    document.getElementById('metal1RtCtWtBal').value = parseFloat(gdBal).toFixed(3);
//                    document.getElementById('metal1RtCtWtBalType').value = payMetalDueWeightType1;
//                    totRecGd += goldWeight;
//                }
//            }
//
//            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Silver') {
//                silverWeight = metalWeight;
//                if (payTotalWeightType1 == 'KG') {
//                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1 * document.getElementById('srGmWtInKg').value)).toFixed(2);
//                } else if (payTotalWeightType1 == 'GM') {
//                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1) / document.getElementById('srGmWtInGm').value).toFixed(2);
//                } else if (payTotalWeightType1 == 'MG') {
//                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((silverWeight * payMetalRate1) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
//                }
//
//                payMetalDueWeightType1 = document.getElementById(prefix + 'SilverTotFineWtType').value;
//                if (slBal == '') {
//                    slBal = document.getElementById(prefix + 'SilverTotFineWt').value;
//                }
//                if (payMetalDueWeightType1 == 'KG') {
//                    if (payTotalWeightType1 == 'KG') {
//                        slBal = parseFloat((slBal) - silverWeight).toFixed(2);
//                    }
//                    else if (payTotalWeightType1 == 'GM') {
//                        slBal = parseFloat(((slBal) - silverWeight / 1000)).toFixed(2);
//                        silverWeight = parseFloat(silverWeight / 1000).toFixed(2);
//                    }
//                    else if (payTotalWeightType1 == 'MG') {
//                        slBal = parseFloat(((slBal) - silverWeight / (1000 * 1000))).toFixed(2);
//                        silverWeight = parseFloat(silverWeight / (1000 * 1000)).toFixed(2);
//                    }
//                }
//                else if (payMetalDueWeightType1 == 'GM') {
//                    if (payTotalWeightType1 == 'KG') {
//                        slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(2);
//                        silverWeight = parseFloat(silverWeight * 1000).toFixed(2);
//                    }
//                    else if (payTotalWeightType1 == 'GM') {
//                        slBal = parseFloat((slBal) - silverWeight).toFixed(2);
//                    }
//                    else if (payTotalWeightType1 == 'MG') {
//                        slBal = parseFloat(((slBal) - silverWeight / (1000))).toFixed(2);
//                        silverWeight = parseFloat(silverWeight / 1000).toFixed(2);
//                    }
//                } else if (payMetalDueWeightType1 == 'MG') {
//                    if (payTotalWeightType1 == 'KG') {
//                        slBal = parseFloat(((slBal) - silverWeight * 1000 * 1000)).toFixed(2);
//                        silverWeight = parseFloat(silverWeight * 1000 * 1000).toFixed(2);
//                    }
//                    else if (payTotalWeightType1 == 'GM') {
//                        slBal = parseFloat(((slBal) - silverWeight * 1000)).toFixed(2);
//                        silverWeight = parseFloat(silverWeight * 1000).toFixed(2);
//                    }
//                    else if (payTotalWeightType1 == 'MG') {
//                        slBal = parseFloat((slBal - silverWeight)).toFixed(2);
//                    }
//                }
//                document.getElementById(prefix + 'PayMetal1Bal' + dc).value = slBal;
//                document.getElementById('metal2RtCtWtBal1').value = slBal;
//                document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
//                document.getElementById(prefix + 'PayMetal2WtBal').value = slBal;
//                document.getElementById(prefix + 'PayMetal2WtBalType').value = payMetalDueWeightType1;
//                document.getElementById('metal2WtBal').value = parseFloat(slBal).toFixed(3);
//                document.getElementById('metal2WtBalType').value = payMetalDueWeightType1;
//                document.getElementById('metal2RtCtWtBal').value = parseFloat(slBal).toFixed(3);
//                document.getElementById('metal2RtCtWtBalType').value = payMetalDueWeightType1;
//                totRecSl += silverWeight;
//            }
////            alert(totRecGd);
////            alert(goldWeight);
//            document.getElementById('metal1WtRecBal').value = parseFloat(totRecGd).toFixed(3) + ' ' + goldWeightType;
//            document.getElementById('metal1WtRecBal1').value = parseFloat(totRecGd).toFixed(3);
//            document.getElementById('metal1WtRecBal1Typ').value = goldWeightType;
//            document.getElementById('metal2WtRecBal').value = parseFloat(totRecSl).toFixed(3) + ' ' + silverWeightType;
//            document.getElementById('metal2WtRecBal1').value = parseFloat(totRecSl).toFixed(3);
//            document.getElementById('metal2WtRecBal1Typ').value = silverWeightType;
//            var metalValuation1 = document.getElementById(prefix + 'PayMetal1Val' + dc).value;
//            if (metalValuation1 == '') {
//                metalValuation1 = 0;
//            }
//            totAmtRec += parseFloat(metalValuation1);
////            alert(totAmtRec);
////            document.getElementById(prefix + 'PayTotAmtRec').value = (totAmtRec).toFixed(2);
////            document.getElementById(prefix + 'PayTotAmtRecDisp').value = document.getElementById(prefix + 'PayTotAmtRec').value;
//
////            calcCashBalance(prefix);
//            calcRawMetItem(prefix);
//        }
//        metalEntered++;
//    }
//    return false;
//}


function calcRawMetItem(prefix) {
    var silverRtCtBal = 0;
    var goldRtCtBal = 0;
    if (document.getElementById('metal1WtPrevBal1').value != '' || document.getElementById('metal1WtPurBal1').value != '' || document.getElementById('metal1WtRecBal1').value != '') {
        var goldPrevBal = document.getElementById('metal1WtPrevBal1').value;
        if (goldPrevBal == '' || goldPrevBal == null) {
            goldPrevBal = 0;
        }
        var goldPurchaseBal = parseFloat(document.getElementById('metal1WtPurBal1').value).toFixed(3);
        if (goldPurchaseBal == '' || goldPurchaseBal == null) {
            goldPurchaseBal = 0;
        }
//        alert(goldPurchaseBal);
        var goldRecBal = document.getElementById('metal1WtRecBal1').value;
        if (goldRecBal == '' || goldRecBal == null) {
            goldRecBal = 0;
        }
        if (document.getElementById('rawPurPriceCut').value == 'rateCut') {
//            alert(document.getElementById('metal1RtCtWt').value);

            goldRtCtBal = (document.getElementById('metal1RtCtWt').value);
//alert(goldRtCtBal);
            if (goldRtCtBal == '' || goldRtCtBal == null) {
                goldRtCtBal = 0;
            }
        }
//        alert( parseFloat(goldRtCtBal));
        var totFinGdWtBal = parseFloat((parseFloat(goldPrevBal) + parseFloat(goldPurchaseBal)) - parseFloat(goldRecBal) - parseFloat(goldRtCtBal)).toFixed(5);

//        alert(totFinGdWtBal    );
        document.getElementById('metal1WtFinBal').value = totFinGdWtBal + ' ' + document.getElementById('metal1WtPurBal1Type').value;
        document.getElementById('metal1WtFinBal').value = parseFloat(document.getElementById('metal1WtFinBal').value).toFixed(3) + ' ' + document.getElementById('metal1WtPurBal1Type').value;
        document.getElementById('metal1WtFinBal1').value = parseFloat(totFinGdWtBal).toFixed(3);
        document.getElementById('metal1WtFinBal1Typ').value = document.getElementById('metal1WtPurBal1Type').value;
//        alert(document.getElementById('metal1WtFinBal1').value);

        if (document.getElementById('rawPurPriceCut').value == 'rateCut') {
            var payTotalWeightType1 = document.getElementById('metal1RtCtWtType').value;
            var goldWeight = document.getElementById('metal1RtCtWt').value;
            var payMetalRate1 = document.getElementById('metal1Rate').value;

            document.getElementById('metal1RtCtWtBalDisp').value = parseFloat(goldRtCtBal).toFixed(3) + " " + payTotalWeightType1;

            if (payTotalWeightType1 == 'KG') {
                document.getElementById('metal1Valuation').value = ((goldWeight * payMetalRate1 * document.getElementById('gmWtInKg').value)).toFixed(2);
            } else if (payTotalWeightType1 == 'GM') {
                document.getElementById('metal1Valuation').value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(2);
            } else if (payTotalWeightType1 == 'MG') {
                document.getElementById('metal1Valuation').value = ((goldWeight * payMetalRate1) / (document.getElementById('gmWtInMg').value)).toFixed(2);
            }
        }
    }
    if (document.getElementById('metal2WtPrevBal1').value != '' || document.getElementById('metal2WtPurBal1').value != '' || document.getElementById('metal2WtRecBal1').value != '') {
        var silverPrevBal = document.getElementById('metal2WtPrevBal1').value;
        if (silverPrevBal == '' || silverPrevBal == null) {
            silverPrevBal = 0;
        }
        var silverPurchaseBal = document.getElementById('metal2WtPurBal1').value;
        if (silverPurchaseBal == '' || silverPurchaseBal == null) {
            silverPurchaseBal = 0;
        }
//        alert(silverPurchaseBal);
        var silverRecBal = document.getElementById('metal2WtRecBal1').value;
        if (silverRecBal == '' || silverRecBal == null) {
            silverRecBal = 0;
        }
        if (document.getElementById('rawPurPriceCut').value == 'rateCut') {
            silverRtCtBal = document.getElementById('metal2RtCtWt').value;
            if (silverRtCtBal == '' || silverRtCtBal == null) {
                silverRtCtBal = 0;
            }
        }

//        var totFinSrWtBal = Math_round((parseFloat(silverPrevBal) + parseFloat(silverPurchaseBal)) - parseFloat(silverRecBal) - parseFloat(silverRtCtBal)).toFixed(3);
//        alert(parseFloat(silverPrevBal) + '-' + parseFloat(silverPurchaseBal) + '-' + parseFloat(silverRecBal) + '-' + parseFloat(silverRtCtBal));
        var totFinSrWtBal = parseFloat((parseFloat(silverPrevBal) + parseFloat(silverPurchaseBal)) - parseFloat(silverRecBal) - parseFloat(silverRtCtBal)).toFixed(3);

        document.getElementById('metal2WtFinBal').value = parseFloat(totFinSrWtBal).toFixed(3) + ' ' + document.getElementById('metal2WtPurBal1Type').value;
        document.getElementById('metal2WtFinBal1').value = parseFloat(totFinSrWtBal).toFixed(3);
//        alert(document.getElementById('metal2WtFinBal1').value);
        document.getElementById('metal2WtFinBal1Typ').value = document.getElementById('metal2WtPurBal1Type').value;
//        document.getElementById(prefix + 'PayMetal2WtBal').value = parseFloat(totFinSrWtBal).toFixed(3);
        document.getElementById('metal2WtFinBal1').value = parseFloat(totFinSrWtBal).toFixed(3);


        if (document.getElementById('rawPurPriceCut').value == 'rateCut') {
            var payTotalWeightType2 = document.getElementById('metal2RtCtWtType').value;
            var silverWeight = document.getElementById('metal2RtCtWt').value;
            var payMetalRate2 = document.getElementById('metal2Rate').value;
            document.getElementById('metal2RtCtWtBalDisp').value = parseFloat(silverRtCtBal).toFixed(3) + " " + payTotalWeightType2;
            if (payTotalWeightType2 == 'KG') {
                document.getElementById('metal2Valuation').value = ((silverWeight * payMetalRate2 * document.getElementById('srGmWtInKg').value)).toFixed(2);
            } else if (payTotalWeightType2 == 'GM') {
                document.getElementById('metal2Valuation').value = ((silverWeight * payMetalRate2) / document.getElementById('srGmWtInGm').value).toFixed(2);
            } else if (payTotalWeightType2 == 'MG') {
                document.getElementById('metal2Valuation').value = ((silverWeight * payMetalRate2) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
            }
//            document.getElementById(prefix + 'PayTotAmtRecDisp').value = parseFloat(document.getElementById('metal1Valuation').value) + parseFloat(document.getElementById('metal2Valuation').value);
        }
    }
//     alert(document.getElementById('rawPurPriceCut').value);
//      alert( document.getElementById(prefix + 'PayMetal1WtBal').value );
    if (document.getElementById('rawPurPriceCut').value == 'rateCut') {
        if (document.getElementById('metal1Valuation').value == '') {
            document.getElementById('metal1Valuation').value = 0;
        }
        if (document.getElementById('metal2Valuation').value == '') {
            document.getElementById('metal2Valuation').value = 0;
        }
        document.getElementById(prefix + 'PayBalDisp').value = Math_round(parseFloat(document.getElementById('metal1Valuation').value) + parseFloat(document.getElementById('metal2Valuation').value)).toFixed(2);

//        alert(prefix + 'PayTotAmtBalDisp');
//          document.getElementById('taxOnTotAmt').value = document.getElementById(prefix + 'PayBalDisp').value;
        document.getElementById(prefix + 'PayTotAmtRec').value = document.getElementById(prefix + 'PayBalDisp').value;

        document.getElementById('taxOnTotAmt').value = (parseFloat(document.getElementById(prefix + 'PayBalDisp').value) + parseFloat(document.getElementById('otCharges').value)).toFixed(2);
//        alert(document.getElementById( 'otCharges').value);
//        alert(document.getElementById(prefix + 'PayTotAmtBalDisp').value)
//        alert(document.getElementById('taxOnTotAmt').value);
    }


}

//function calcRawMetItem(prefix) {
//
//    if (document.getElementById('metal1WtPrevBal').value != '' || document.getElementById('metal1WtPurBal1').value != '' || document.getElementById('metal1WtRecBal1').value != '') {
//        var goldPrevBal = document.getElementById('metal1WtPrevBal').value;
//        if (goldPrevBal == '' || goldPrevBal == null) {
//            goldPrevBal = 0;
//        }
//        var goldPurchaseBal = document.getElementById('metal1WtPurBal1').value;
//        if (goldPurchaseBal == '' || goldPurchaseBal == null) {
//            goldPurchaseBal = 0;
//        }
//        var goldRecBal = document.getElementById('metal1WtRecBal1').value;
//        if (goldRecBal == '' || goldRecBal == null) {
//            goldRecBal = 0;
//        }
//
//
//        if (document.getElementById('rawPurPriceCut').value == 'rateCut') {
//            var goldRtCtBal = document.getElementById('metal1RtCtWtBal').value;
//
//            if (goldRtCtBal == '' || goldRtCtBal == null) {
//                goldRtCtBal = 0;
//            }
//        }
//
//        else {
//            goldRtCtBal = 0;
//        }
//
//        var totFinGdWtBal = (parseFloat(goldPrevBal) + parseFloat(goldPurchaseBal)) - parseFloat(goldRecBal) - parseFloat(goldRtCtBal).toFixed(3);
//        totFinGdWtBal = totFinGdWtBal.toFixed(3);
//
//        document.getElementById('metal1WtFinBal').value = totFinGdWtBal + ' ' + document.getElementById('metal1WtPurBal1Type').value;
//    }
//    if (document.getElementById('metal2WtPrevBal1').value != '' || document.getElementById('metal2WtPurBal1').value != '' || document.getElementById('metal2WtRecBal1').value != '') {
//        var silverPrevBal = document.getElementById('metal2WtPrevBal1').value;
//        if (silverPrevBal == '' || silverPrevBal == null) {
//            silverPrevBal = 0;
//        }
//        var silverPurchaseBal = document.getElementById('metal2WtPurBal1').value;
//        if (silverPurchaseBal == '' || silverPurchaseBal == null) {
//            silverPurchaseBal = 0;
//        }
//
//        var silverRecBal = document.getElementById('metal2WtRecBal1').value;
////        alert(document.getElementById('metal2WtRecBal1').value);
////        silverRecBal = Math_round(silverRecBal);
//        if (silverRecBal == '' || silverRecBal == null) {
//            silverRecBal = 0;
//        }
//        if (document.getElementById('rawPurPriceCut').value == 'rateCut') {
//            var silverRtCtBal = document.getElementById('metal2RtCtWtBal').value;
//
//            if (silverRtCtBal == '' || silverRtCtBal == null) {
//                silverRtCtBal = 0;
//            }
//        }
//
//        if (document.getElementById('rawPurPriceCut').value == 'noRateCut') {
//            var silverRtCtBal = document.getElementById('metal2RtCtWtBal').value;
//            silverRtCtBal = 0.00;
//
//        }
//// alert(silverPurchaseBal);
////
////alert(silverRtCtBal);
////  alert(totFinSrWtBsal);
////        document.getElementById('metal2RtCtWtBalDisp').value = document.getElementById('metal2RtCtWtBal').value;
//
////alert(document.getElementById('metal2RtCtWtBalDisp').value );
//        var totFinSrWtBal = (parseFloat(silverPrevBal) + parseFloat(silverPurchaseBal)) - parseFloat(silverRecBal) - parseFloat(silverRtCtBal).toFixed(3);
////               alert(totFinSrWtBal);
//        totFinSrWtBal = totFinSrWtBal.toFixed(3);
//        document.getElementById('metal2WtFinBal').value = totFinSrWtBal + ' ' + document.getElementById('metal2WtPurBal1Type').value;
//
//
//    }
//}

function checkRawWeight(rawPreId, rawPostId, rawMetalType, rawMetalId, recWt, recWtType, panelName, rwSlStatus) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (xmlhttp.responseText == 'SUCCESS') {
                document.getElementById("checkStatus").value = 'true';
                return true;
            } else if (xmlhttp.responseText != 'SUCCESS' && xmlhttp.responseText != '' && (panelName == 'StockPayUp' && rwSlStatus == 'PaymentDone')) {
                document.getElementById("checkStatus").value = 'false';
                alert(xmlhttp.responseText);
                return false;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogwrwtch.php?rawPreId=" + rawPreId + "&rawPostId=" + rawPostId + "&rawMetalType=" + rawMetalType + "&rawMetalId=" + rawMetalId + "&recWt=" + recWt + "&recWtType=" + recWtType, true);
    xmlhttp.send();
    // return false;
}
//function checkRawWeight(rawPreId, rawPostId, recWt, recWtType, panelName, rwSlStatus) {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            if (xmlhttp.responseText == 'SUCCESS') {
//                document.getElementById("checkStatus").value = 'true';
//                return true;
//            } else if (xmlhttp.responseText != 'SUCCESS' && xmlhttp.responseText != '' && (panelName == 'StockPayUp' && rwSlStatus == 'PaymentDone')) {
//                document.getElementById("checkStatus").value = 'false';
////                alert(xmlhttp.responsseText);
//                return false;
//            }
//        }
//    };
//    xmlhttp.open("POST", "include/php/ogrmwtch.php?rawPreId=" + rawPreId + "&rawPostId=" + rawPostId + "&recWt=" + recWt + "&recWtType=" + recWtType, true);
//    xmlhttp.send();
//    // return false;
//}





function calcRawCashBalance(prefix) {
//    alert('calcStockCashBalance='+document.getElementById(prefix + 'PayFinAmtBalDisp').value);
    if (document.getElementById(prefix + 'PayCashAmtRec').value != '' || document.getElementById(prefix + 'PayChequeAmt').value || document.getElementById(prefix + 'PayCardAmt').value) {
        var totalCashPaidAmt = document.getElementById(prefix + 'PayCashAmtRec').value;
        if (totalCashPaidAmt == null || totalCashPaidAmt == '') {
            totalCashPaidAmt = 0;
        }
        var totalChequeAmt = document.getElementById(prefix + 'PayChequeAmt').value;
        if (totalChequeAmt == null || totalChequeAmt == '') {
            totalChequeAmt = 0;
        }
        var totalCardAmt = document.getElementById(prefix + 'PayCardAmt').value;
        if (totalCardAmt == null || totalCardAmt == '') {
            totalCardAmt = 0;
        }
        document.getElementById(prefix + 'PayCashRecDisp').value = Math_round(parseFloat(totalCashPaidAmt) + parseFloat(totalChequeAmt) + parseFloat(totalCardAmt)).toFixed(2);
        document.getElementById(prefix + 'PayTotCashAmt').value = parseFloat(parseFloat(totalCashPaidAmt) + parseFloat(totalChequeAmt) + parseFloat(totalCardAmt)).toFixed(2);
    }

    if (document.getElementById('VATTax').value != '' || document.getElementById('VATTax').value != null) {
        var totalValuation = document.getElementById('taxOnTotAmt').value;
        if (totalValuation == null || totalValuation == '') {
            totalValuation = 0;
        }
        var totTax = parseFloat(document.getElementById('VATTax').value) / 100;
        document.getElementById(prefix + 'PayVATAmt').value = parseFloat(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
        document.getElementById(prefix + 'PayVATAmtDisp').value = Math_round(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
    }

    if (document.getElementById(prefix + 'PayVATAmt').value == 'NaN') {
        document.getElementById(prefix + 'PayVATAmt').value = 0.00;
    }

    if (document.getElementById(prefix + 'PayVATAmt').value || document.getElementById(prefix + 'PayDiscount').value != '') {
        if (document.getElementById(prefix + 'PayVATAmt').value == null || document.getElementById(prefix + 'PayVATAmt').value == '' || document.getElementById(prefix + 'PayVATAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayVATAmt').value = 0;
        }
        if (document.getElementById(prefix + 'PayPrevTotAmt').value == null || document.getElementById(prefix + 'PayPrevTotAmt').value == '' || document.getElementById(prefix + 'PayPrevTotAmt').value == 'NaN') {
            document.getElementById(prefix + 'PayPrevTotAmt').value = 0;
        }
        if (document.getElementById(prefix + 'PayDiscount').value == null || document.getElementById(prefix + 'PayDiscount').value == '' || document.getElementById(prefix + 'PayDiscount').value == 'NaN') {
            document.getElementById(prefix + 'PayDiscount').value = 0;
        }
        document.getElementById(prefix + 'PayDiscountDisp').value = Math_round(parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
        document.getElementById(prefix + 'PayVATAmtDisp').value = Math_round(parseFloat(document.getElementById(prefix + 'PayVATAmt').value)).toFixed(2);
//        alert(document.getElementById(prefix + 'PayTotAmt').value);
//        alert(parseFloat(document.getElementById(calcRawRrCtCashBalance + 'PayTotCashAmt').value));
        document.getElementById(prefix + 'PayFinAmtBalDisp').value = Math_round((parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);

        document.getElementById(prefix + 'PayTotAmtBal').value = parseFloat((parseFloat(document.getElementById(prefix + 'PayTotAmt').value) + parseFloat(document.getElementById(prefix + 'PayVATAmt').value)) - parseFloat(document.getElementById(prefix + 'PayTotCashAmt').value) - parseFloat(document.getElementById(prefix + 'PayDiscount').value)).toFixed(2);
    }
}





//
//
//function calcRawCashBalance(prefix) {
//
//    document.getElementById(prefix + 'PayCashRecDisp').value = document.getElementById(prefix + 'PayCashAmtRec').value;
//    document.getElementById(prefix + 'PayCashRecDisp').value = document.getElementById(prefix + 'PayChequeAmt').value;
//    document.getElementById(prefix + 'PayCashRecDisp').value = document.getElementById(prefix + 'PayCardAmt').value;
//    document.getElementById(prefix + 'PayCashRecDisp').value = document.getElementById(prefix + 'PayVATAmt').value;
//
//
//
//
//    if (document.getElementById(prefix + 'PayCashAmtRec').value != '' || document.getElementById(prefix + 'PayChequeAmt').value || document.getElementById(prefix + 'PayCardAmt').value || document.getElementById(prefix + 'PayVATAmt').value || document.getElementById(prefix + 'PayDiscount').value != '') {
//        var totalCashPaidAmt = document.getElementById(prefix + 'PayCashAmtRec').value;
//        if (totalCashPaidAmt == null || totalCashPaidAmt == '') {
//            totalCashPaidAmt = 0;
//        }
//
//
//        var totalChequeAmt = document.getElementById(prefix + 'PayChequeAmt').value;
//        if (totalChequeAmt == null || totalChequeAmt == '') {
//            totalChequeAmt = 0;
//        }
//        var totalCardAmt = document.getElementById(prefix + 'PayCardAmt').value;
//        if (totalCardAmt == null || totalCardAmt == '') {
//            totalCardAmt = 0;
//        }
//        document.getElementById(prefix + 'PayCashRecDisp').value = (parseFloat(totalCashPaidAmt) + parseFloat(totalChequeAmt) + parseFloat(totalCardAmt)).toFixed(2);
//    }
//
//    if (document.getElementById('VATTax').value != '' || document.getElementById('VATTax').value != null) {
//        var totalValuation = document.getElementById('taxOnTotAmt').value;
//        if (totalValuation == null || totalValuation == '') {
//            totalValuation = 0;
//        }
//        var totTax = parseFloat(document.getElementById('VATTax').value) / 100;
//        document.getElementById(prefix + 'PayVATAmt').value = Math_round(parseFloat(totTax * parseFloat(totalValuation))).toFixed(2);
//
//    }
//
//    if (document.getElementById(prefix + 'PayVATAmt').value == 'NaN') {
//        document.getElementById(prefix + 'PayVATAmt').value = 0.00;
//    }
//
//    if (document.getElementById(prefix + 'PayCashAmtRec').value != '' || document.getElementById(prefix + 'PayChequeAmt').value || document.getElementById(prefix + 'PayCardAmt').value || document.getElementById(prefix + 'PayVATAmt').value || document.getElementById(prefix + 'PayDiscount').value != '') {
//        var totalCashPaidAmt = document.getElementById(prefix + 'PayCashAmtRec').value;
////        alert(totalCashPaidAmt);
//        if (totalCashPaidAmt == null || totalCashPaidAmt == '') {
//            totalCashPaidAmt = 0;
//        }
//        var totalChequeAmt = document.getElementById(prefix + 'PayChequeAmt').value;
//        if (totalChequeAmt == null || totalChequeAmt == '') {
//            totalChequeAmt = 0;
//        }
//        var totalCardAmt = document.getElementById(prefix + 'PayCardAmt').value;
//        if (totalCardAmt == null || totalCardAmt == '') {
//            totalCardAmt = 0;
//        }
//        var totalVATAmt = document.getElementById(prefix + 'PayVATAmt').value;
//        if (totalVATAmt == null || totalVATAmt == '') {
//            totalVATAmt = 0;
//        }
//        var totalDiscountAmt = document.getElementById(prefix + 'PayDiscount').value;
//        if (totalDiscountAmt == null || totalDiscountAmt == '') {
//            totalDiscountAmt = 0;
//        }
////        alert(document.getElementById(prefix + 'PrevAmt').value );
//        if (document.getElementById(prefix + 'PrevAmt').value != '' || document.getElementById(prefix + 'PrevAmt').value != null)
//        {
//            if (document.getElementById(prefix + 'PrevAmt').value < 0) {
//                document.getElementById(prefix + 'PrevAmt').value = Math.abs(document.getElementById(prefix + 'PrevAmt').value);
//                document.getElementById(prefix + 'PayTotalAmt').value = Math_round((parseFloat(document.getElementById(prefix + 'PayTotalAmt').value)) - parseFloat(document.getElementById(prefix + 'PrevAmt').value));
////               alert('gfh' + document.getElementById(prefix + 'PayTotalAmt').value );
//            }
//            else if (document.getElementById(prefix + 'PrevAmt').value > 0) {
//                document.getElementById(prefix + 'PayTotalAmt').value = Math_round((parseFloat(document.getElementById(prefix + 'PayTotalAmt').value)) + parseFloat(document.getElementById(prefix + 'PrevAmt').value));
////                alert('err' + document.getElementById(prefix + 'PayTotalAmt').value );
//            }
//
//        }
//
//        document.getElementById(prefix + 'PayDiscountDisp').value = Math_round(parseFloat(totalDiscountAmt)).toFixed(2);
//        document.getElementById('VATDisp').value = Math_round(parseFloat(totalVATAmt)).toFixed(2);
////alert(document.getElementById(prefix + 'PayTotalAmt').value);
////alert(document.getElementById(prefix + 'PayCashRecDisp').value);
////alert(totalVATAmt);
//        document.getElementById(prefix + 'PayFinalAmtBalDisp').value = Math_round((parseFloat(document.getElementById(prefix + 'PayTotalAmt').value)) - parseFloat(document.getElementById(prefix + 'PayCashRecDisp').value) - parseFloat(totalDiscountAmt) + parseFloat(totalVATAmt)).toFixed(2);
////            alert(  document.getElementById(prefix + 'PayFinalAmtBalDisp').value);
//        document.getElementById(prefix + 'PayTotalAmtBal').value = document.getElementById(prefix + 'PayFinalAmtBalDisp').value
//
//    }
//}

function ShowRawRateCut(rateCutId, goldTotFFineWt, goldTotBal, silverTotBal, goldTotFFineWtType, silverTotFFineWt, silverTotFFineWtType, totGoldPay, totSilverPay, goldRate, silverRate, payPanelName, otherCharges, otherChgsBy, suppId, preInvNo, invNo, payId, totalAmt, payUniqueId) {

    var poststr = "rateCutOpt=" + encodeURIComponent(rateCutId) +
            "&goldTotFFineWt=" + encodeURIComponent(goldTotFFineWt) +
            "&goldTotFFineWtType=" + encodeURIComponent(goldTotFFineWtType) +
            "&silverTotFFineWt=" + encodeURIComponent(silverTotFFineWt) +
            "&silverTotFFineWtType=" + encodeURIComponent(silverTotFFineWtType) +
            "&totGoldPay=" + encodeURIComponent(totGoldPay) +
            "&totSilverPay=" + encodeURIComponent(totSilverPay) +
            "&goldRate=" + encodeURIComponent(goldRate) +
            "&silverRate=" + encodeURIComponent(silverRate) +
            "&otherCharges=" + encodeURIComponent(otherCharges) +
            "&payPanelName=" + encodeURIComponent(payPanelName) +
            "&otherChgsBy=" + encodeURIComponent(otherChgsBy) +
            "&payId=" + encodeURIComponent(document.getElementById('payId').value) +
            "&preInvId=" + encodeURIComponent(preInvNo) +
            "&invId=" + encodeURIComponent(invNo) +
            "&suppId=" + encodeURIComponent(suppId) +
            "&goldTotBal=" + encodeURIComponent(goldTotBal) +
            "&silverTotBal=" + encodeURIComponent(silverTotBal) +
            "&payId=" + encodeURIComponent(payId) +
            "&uniqueId=" + encodeURIComponent(payUniqueId); //added @Auhtor:SHRI13JUN16



    if (rateCutId == 'rateCut') {
        showraw_rate_cut("include/php/ogrmrtct.php", poststr);
    } else {
        showraw_rate_cut("include/php/ogrmnrct.php", poststr);
    }
}
function showraw_rate_cut(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertShowRawRateCut;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}

function alertShowRawRateCut() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("rateCutDiv").innerHTML = xmlhttp.responseText;

//    alert('rateCutId');
        var prefix = document.getElementById('prefix').value;
//        alert('prefix66');    
//        calcRawRateCut(prefix);
        calcRawMetItem(prefix);

        calcRawRrCtCashBalance(prefix);



    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";

    }

}





















//function showNoRateCutdiv(rateCutOpt, goldTotFFineWt, goldTotFFineWtType, silverTotFFineWt, silverTotFFineWtType, totGoldPay, totSilverPay, goldRate, silverRate, payPanelName, totAmtBal, prevGdWt, totalOthGdChgs, payId, goldbalrt,silverbalrt ,suppId, preInvNo, invNo) {
//    
//
//
////alert(goldTotFFineWtType);
////    alert(goldTotFFineWtType + '-' + silverTotFFineWt + payPanelName);
//    var poststr = "rateCutOpt=" + rateCutOpt +
//            "&goldTotFFineWt=" + goldTotFFineWt +
//            "&silverTotFFineWt=" + silverTotFFineWt +
//            "&totGoldPay=" + totGoldPay +
//            "&totSilverPay=" + totSilverPay +
//            "&goldRate=" + goldRate +
//            "&silverRate=" + silverRate +
//            "&totAmtBal=" + totAmtBal +
//            "&payPanelName=" + payPanelName +
//            "&totalOthGdChgs=" + totalOthGdChgs +
//            "&payId=" + payId +
//            "&goldTotFFineWtType=" + goldTotFFineWtType +
//            "&silverTotFFineWtType=" + silverTotFFineWtType +
//             "&goldbalrt=" + goldbalrt + 
//              "&silverbalrt=" + silverbalrt +
//               "&suppId=" + encodeURIComponent(suppId) +
//              "&preInvNo=" + encodeURIComponent(preInvNo) +
//            "&invNo=" + encodeURIComponent(invNo) ;
//           
//           
//    if (rateCutOpt == 'rateCut') {
//        show_no_rate_cut_div("include/php/ogrmrtct.php", poststr);
//    } else {
//        show_no_rate_cut_div("include/php/ogrmnrct.php", poststr);
//    }
//}
//
//
//function show_no_rate_cut_div(url, parameters) {
//
//    loadXMLDoc();
//
//    xmlhttp.onreadystatechange = alertshowNoRateCutdiv;
//
//    xmlhttp.open('POST', url, true);
//    xmlhttp.setRequestHeader('Content-Type',
//            'application/x-www-form-urlencoded');
//    xmlhttp.setRequestHeader("Content-length", parameters.length);
//    xmlhttp.setRequestHeader("Connection", "close");
//    xmlhttp.send(parameters);
//
//}
//
//function alertshowNoRateCutdiv() {
//
//    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        document.getElementById("rateCutDiv").innerHTML = xmlhttp.responseText;
//    } else {
//        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//
//    }
//
//}


function getSellRawMetalType(panelName, metalType, metalCount, firmId, rawGdPreId, rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId, metalTypePanel, cntr, otherChgsBy, totFinGdWt, totFinSlWt, goldTotFFineWtType, silverTotFFineWtType, goldTotBal, silverTotBal, metalRate, metalRateId, rawMetDesc) {


    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalIdDiv" + metalCount).innerHTML = xmlhttp.responseText;
            document.getElementById(firmId).focus();
            // calcItemBalance();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogrmsydt.php?panelName=" + panelName + "&metalType=" + metalType +
            "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId + "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
            "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt + "&goldTotFFineWtType=" + goldTotFFineWtType + "&silverTotFFineWtType=" + silverTotFFineWtType + "&goldTotBal=" + goldTotBal + "&silverTotBal=" + silverTotBal + "&metalRate=" + metalRate + "&metalRateId=" + metalRateId + "&rawMetDesc=" + rawMetDesc, true);
    xmlhttp.send();
}

function getRawMetMetalType(panelName, metalType, metalCount, firmId, rawGdPreId, rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId, metalTypePanel, cntr, otherChgsBy, totFinGdWt, totFinSlWt, goldTotFFineWtType, silverTotFFineWtType, goldTotBal, silverTotBal, metalRate, metalRateId, rawMetDesc) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalIdDiv" + metalCount).innerHTML = xmlhttp.responseText;

            document.getElementById(firmId).focus();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogrmpydt.php?panelName=" + panelName + "&metalType=" + metalType +
            "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId + "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
            "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt + "&goldTotFFineWtType=" + goldTotFFineWtType + "&silverTotFFineWtType=" + silverTotFFineWtType + "&goldTotBal=" + goldTotBal + "&silverTotBal=" + silverTotBal + "&metalRate=" + metalRate + "&metalRateId=" + metalRateId + "&rawMetDesc=" + rawMetDesc, true);
    xmlhttp.send();
}












function getRawMetalDiv(metalCnt, panelName, firmId, rawGdPreId, rawGdPostId, metalType, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
        metalPanelName, mcntr, rawPreId, rawPostId, otherChgsBy, totFinGdWt, totFinSlWt, goldTotFFineWtType, silverTotFFineWtType, goldTotBal, silverTotBal, rawMetDesc, rawMetName, metalRate, metalRateId) {
//alert(goldTotFFineWtType + silverTotFFineWtType);
    metalPanel = panelName;
    metalCount = metalCnt;
    if (metalCount != '') {
        getMetalDiv = metalCount;
    }
    var poststr = "metalDivCount=" + metalCount
            + "&panelName=" + panelName + "&firmId=" + firmId
            + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&metalType=" + metalType + "&rawSlPreId=" + rawSlPreId +
            "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId +
            "&rawAlPostId=" + rawAlPostId + "&metalPanelName=" + metalPanelName
            + "&mcntr=" + mcntr + "&rawPreId=" + rawPreId + "&rawPostId=" + rawPostId
            + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt + "&goldTotFFineWtType=" + goldTotFFineWtType + "&silverTotFFineWtType=" + silverTotFFineWtType + "&goldTotBal=" + goldTotBal + "&silverTotBal=" + silverTotBal
            + "&rawMetDesc=" + rawMetDesc + "&rawMetName=" + rawMetName + "&metalRate=" + metalRate + "&metalRateId=" + metalRateId;

    get_raw_metal_div('include/php/ogrmsydt.php', poststr);
    return false;
}
/*********Start code to add panel @Author:PRIYA20JUN14********************/
var metalPanel;
var metalCount;
var getMetalDiv = 1;
function get_raw_metal_div(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertGetRawMetalDiv;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertGetRawMetalDiv() {
    var metmin = metalCount - 1;
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("metalDiv" + metmin).value = 'false';
        document.getElementById("payRawMetalDiv" + metalCount).innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}




function getStockRawMetalDiv(metalCnt, panelName, firmId, rawGdPreId, rawGdPostId, metalType, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
        metalPanelName, mcntr, rawPreId, rawPostId, otherChgsBy, totFinGdWt, totFinSlWt, goldTotFFineWtType, silverTotFFineWtType, goldTotBal, silverTotBal, rawMetDesc, rawMetName, metalRate, metalRateId) {

    metalPanel = panelName;
    metalCount = metalCnt;
    if (metalCount != '') {
        getMetalDiv = metalCount;
    }
    var poststr = "metalDivCount=" + metalCount
            + "&panelName=" + panelName + "&firmId=" + firmId
            + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&metalType=" + metalType + "&rawSlPreId=" + rawSlPreId +
            "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId +
            "&rawAlPostId=" + rawAlPostId + "&metalPanelName=" + metalPanelName
            + "&mcntr=" + mcntr + "&rawPreId=" + rawPreId + "&rawPostId=" + rawPostId
            + "&otherChgsBy=" + otherChgsBy + "&totFinGdWt=" + totFinGdWt + "&totFinSlWt=" + totFinSlWt + "&goldTotFFineWtType=" + goldTotFFineWtType + "&silverTotFFineWtType=" + silverTotFFineWtType + "&goldTotBal=" + goldTotBal + "&silverTotBal=" + silverTotBal
            + "&rawMetDesc=" + rawMetDesc + "&rawMetName=" + rawMetName + "&metalRate=" + metalRate + "&metalRateId=" + metalRateId;

    get_stock_raw_metal_div('include/php/ogrmpydt.php', poststr);
    return false;
}
/*********Start code to add panel @Author:PRIYA20JUN14********************/
var metalPanel;
var metalCount;
var getMetalDiv = 1;
function get_stock_raw_metal_div(url, parameters) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertGetStockRawMetalDiv;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertGetStockRawMetalDiv() {
    var metmin = metalCount - 1;
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("metalDiv" + metmin).value = 'false';
        document.getElementById("payRawMetalDiv" + metalCount).innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}



/******End code to remove SuppWholeDep @Author:PRIYA02MAYR15****************/
/******End code to add panel SuppWholeDep @Author:PRIYA30APR15****************/
/*********End code to add function @Author:PRIYA02JAN13*******************/
/*********Start code to add function to close Metal div @Author:PRIYA29DEC13**********/

//function calcRawRateCut(prefix) {
//
//
//    var goldBal = parseFloat(document.getElementById('metal1RtCtWtBal1').value);
////  alert(document.getElementById('metal1RtCtWtBal1').value);
////   alert(document.getElementById('metal2RtCtWtBal1').value);
//    var goldWtType = document.getElementById('metal1RtCtWtBalType').value;
////    alert(goldBal);
//    if (goldBal != '') {
//        document.getElementById(prefix + 'PayMetal1WtBal').value = (parseFloat(goldBal) - parseFloat(document.getElementById('metal1RtCtWtBal').value)).toFixed(3);
////        document.getElementById(prefix + 'PayMetal1WtBal').value  = document.getElementById(prefix + 'PayMetal1WtBal').value .toFixed(3);
//        document.getElementById('metal1RtCtWtBalDisp').value = document.getElementById('metal1RtCtWtBal').value + ' ' + goldWtType;
//        var metalRate = document.getElementById('metal1Rate').value;
//        var FinalVal = metalRate * document.getElementById(prefix + 'PayMetal1WtBal').value;
//
//        document.getElementById('metal1Valuation').value = FinalVal;
//
//    }
//
//
//
//    var silverBal = parseFloat(document.getElementById('metal2RtCtWtBal1').value);
////    alert(silverBal);
////alert(document.getElementById('metal2RtCtWtBal').value);
//    var silverWtType = document.getElementById('metal2RtCtWtBalType').value;
//
//    if (silverBal != '') {
//
//        document.getElementById(prefix + 'PayMetal2WtBal').value = (parseFloat(silverBal) - parseFloat(document.getElementById('metal2RtCtWtBal').value)).toFixed(3);
//// alert(document.getElementById('metal2RtCtWtBalDisp').value);
//
//        document.getElementById('metal2RtCtWtBalDisp').value = document.getElementById('metal2RtCtWtBal').value + ' ' + silverWtType;
//
//        var metalRate = document.getElementById('metal2Rate').value;
//        var FinalVal = metalRate * document.getElementById(prefix + 'PayMetal2WtBal').value;
//
//        document.getElementById('metal2Valuation').value = FinalVal;
//    }
//
//    calcRawMetItem(prefix);
//
//}


//start code to implement datatable delete fn in raw sell list @AUTH:ATHU7APR17
function deleteRawMetalItem(mainPanel, rwprId, userId) {

    if (mainPanel == 'RawSellList')
    {
        metType = 'SELL';
    } else
    {
        metType = 'BUY';
    }

    confirm_box = confirm(deleteAlertMess + "\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var rawDeleteConfirm = '';
        confirm_box_for_raw_metal = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Raw Metal Stock?");
        if (confirm_box_for_raw_metal == true)
        {
            rawDeleteConfirm = 'yes';
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (mainPanel == 'RawPurchaseList') { // Metal - Metal
                    document.getElementById("rawPanelPurchaseList").innerHTML = xmlhttp.responseText;
                    window.setTimeout(rawMetalFunctionCloseDiv, 1000);
                } else if (mainPanel == 'RawUserPanelPurchaseList') {
                    document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                    window.setTimeout(rawMetalFunctionCloseDiv, 1000);
                } else if (mainPanel == 'RawStockPanelPurchaseList') { // Metal - Cash
                    document.getElementById("rawPanelPurchaseList").innerHTML = xmlhttp.responseText;
                    window.setTimeout(rawMetalFunctionCloseDiv, 1000);
                } else if (mainPanel == 'RawSellList') {
                    document.getElementById("stockPanelSellList").innerHTML = xmlhttp.responseText;
                    window.setTimeout(rawMetalFunctionCloseDiv, 1000);
                } else if (mainPanel == 'RawMetalList') {
                    document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
                    window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                } else if (payPanelName == 'RawPayment' || mainPanel == 'AddRawStock') {
                    document.getElementById("addRawStockInvoice").innerHTML = xmlhttp.responseText;
                    window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                } else {
                    document.getElementById("addRawStockInvoice").innerHTML = xmlhttp.responseText;
                    window.setTimeout(rawMetalFunctionCloseDiv, 1000);
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        if (metType == 'SELL') {
            xmlhttp.open("POST", "include/php/ogrwsldel.php?rwprId=" + rwprId + "&mainPanelNew=CUSTOMER" + "&mainPanel=" + mainPanel +
                    "&rawDeleteConfirm=" + rawDeleteConfirm + "&custId=" + userId + "&metType=" + metType, true);
        } else {
            xmlhttp.open("POST", "include/php/ogrmdelt.php?rwprId=" + rwprId + "&mainPanelNew=CUSTOMER" + "&mainPanel=" + mainPanel +
                    "&rawDeleteConfirm=" + rawDeleteConfirm + "&custId=" + userId + "&metType=" + metType, true);
        }
        xmlhttp.send();
    }
}
function rawMetalFunctionCloseDiv() {
    document.getElementById('rawMessDisplay').innerHTML = '';
}

function changeRawOtherChgsOpt(othChgsBy, invPanel, payPanelName, suppId, preInvoiceNo, invoiceNo)
{
//alert(payPanelName);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('main_ajax_loading_div').style.visibility = "hidden";
            document.getElementById('addRawStockInvoice').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById('main_ajax_loading_div').style.visibility = "visible";
        }
        if (payPanelName == 'RawPayUp') {
            calcRawRateCut('rmpr');
            calcRawRrCtCashBalance('rmpr');

        }
    };
    xmlhttp.open("POST", "include/php/ogrmindv.php?othChgsBy=" + othChgsBy + "&invPanel=" + invPanel + "&payPanelName=" + payPanelName + "&suppId=" + suppId + "&preInvoiceNo=" + preInvoiceNo + "&invoiceNo=" + invoiceNo, true);
    xmlhttp.send();
}

function showRawStockDetList(panel, rawMetalType, metalType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;  //CHANGE IN DIV @AUTHOR: SANDY11NOV13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'RawMetalListDet') {
        xmlhttp.open("POST", "include/php/ogrmsdlt.php?rawMetalType=" + rawMetalType + "&metalType=" + metalType, true);
    }


    xmlhttp.send();
}


function getBackToRawStockList() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;  //CHANGE IN DIV @AUTHOR: SANDY11NOV13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/ogrmcslt.php?", true);

    xmlhttp.send();
}


/*************Start code to change function to add condition for Raw Metal @Author:SHE16JAN16*********************/
function searchStockDetList(documentRootPath, searchColumn, searchValue, selFirmId, div, panel, metalRateId, metalType) {
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
    if (panel == 'RawMetalListDet')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmsdlt.php?searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel + "&metalRateId=" + metalRateId + "&metalType=" + metalType, true);

    else
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsblt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    xmlhttp.send();
}
function sortStockDetList(documentRootPath, sortKeyword, selFirmId, div, panel, metalRateId, metalType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'RawMetalListDet')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmsdlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel + "&metalRateId=" + metalRateId + "&metalType=" + metalType, true);
    else
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsblt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    xmlhttp.send();
}
/**********End code to change function to add condition for Raw Metal @Author:SHE16AN16*******************/



function addRawStockExistingItemDiv(newPreInvoiceNo, newInvoiceNo, panelName,sttrid) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addRawStockInvoice").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogrmexad.php?newPreInvoiceNo=" + newPreInvoiceNo + "&newInvoiceNo=" + newInvoiceNo + "&panelName=" + panelName +"&sttrId=" + sttrid, true);
    xmlhttp.send();
}

function calculateRawSellPrice() {
    var netWt = parseFloat(document.getElementById('slItemNetWeight').value);
    var netWtTp = document.getElementById('slItemNetWeightType').value;
//    var metalRate = parseFloat(document.getElementById('slItemMetalRate').value);
    var metalRate = parseFloat(document.getElementById('metalRateCalculation').value);

    var metalType = document.getElementById('slItemMetal').value;


    if (document.getElementById('slItemTunch').value != 'NotSelected') {
        document.getElementById('slItemFineWeight').value = (parseFloat(document.getElementById('slItemTunch').value) * netWt) / 100;
    } else {
        document.getElementById('slItemTunch').value = 0.0;
        document.getElementById('slItemFineWeight').value = 0.0;
    }
    var fineWt = parseFloat(document.getElementById('slItemFineWeight').value);
    if (netWt != '') {

        if (metalType == 'Gold') {

            if (netWtTp == 'MG') {
                document.getElementById('slItemFnWNMetRate').value = Math_round((metalRate * fineWt) / document.getElementById('gmWtInMg').value).toFixed(2);
            } else if (netWtTp == 'GM') {


                document.getElementById('slItemFnWNMetRate').value = Math_round((metalRate * fineWt) / document.getElementById('gmWtInGm').value).toFixed(2);


            } else {
                document.getElementById('slItemFnWNMetRate').value = Math_round((metalRate * fineWt) * document.getElementById('gmWtInKg').value).toFixed(2);
            }
        } else if (metalType == 'Silver') {
            if (netWtTp == 'MG') {
                document.getElementById('slItemFnWNMetRate').value = Math_round((metalRate * fineWt) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
            } else if (netWtTp == 'GM') {
                document.getElementById('slItemFnWNMetRate').value = Math_round((metalRate * fineWt) / document.getElementById('srGmWtInGm').value).toFixed(2);
            } else {
                document.getElementById('slItemFnWNMetRate').value = Math_round((metalRate * fineWt * document.getElementById('srGmWtInKg').value)).toFixed(2);
            }
        }
    }
    document.getElementById('slItemValuation').value = Math_round(document.getElementById('slItemFnWNMetRate').value).toFixed(2);
    document.getElementById('slItemMetalTotValuation').value = Math_round(document.getElementById('slItemValuation').value).toFixed(2);
    if (document.getElementById('slItemVATTax').value != '') {
        document.getElementById('slItemTotTax').value = Math_round(parseFloat(document.getElementById('slItemValuation').value * document.getElementById('slItemVATTax').value) / 100).toFixed(2);
        document.getElementById('slItemMetalTotValuation').value = Math_round(parseFloat(document.getElementById('slItemValuation').value) + (parseFloat(document.getElementById('slItemVATTax').value) / 100 * document.getElementById('slItemValuation').value)).toFixed(2);
    } else {
        document.getElementById('slItemTotTax').value = '';
    }
    if (document.getElementById('slItemDisc').value != '') {
//          alert(document.getElementById('addRawStockFinalValuation').value + document.getElementById('addRawStockDiscount').value );
        document.getElementById('slItemFinalVal').value = Math_round(parseFloat(document.getElementById('slItemMetalTotValuation').value - document.getElementById('slItemDisc').value)).toFixed(2);

    } else {
        document.getElementById('slItemFinalVal').value = Math_round(document.getElementById('slItemMetalTotValuation').value).toFixed(2);
    }
    return false;
}
function ShowSaleRawRateCut(rateCutId, goldTotFFineWt, goldTotBal, silverTotBal, goldTotFFineWtType, silverTotFFineWt, silverTotFFineWtType, totGoldPay, totSilverPay, goldRate, silverRate, payPanelName, otherCharges, otherChgsBy, custId, preInvNo, invNo) {
//    alert(rateCutId+'-'+goldTotFFineWt+'-'+goldTotFFineWtType+'-'+silverTotFFineWt+'-'+silverTotFFineWtType+'-'+totGoldPay+'-'+totSilverPay+'-'+goldRate+'-'+silverRate+'-'+payPanelName+'-'+otherCharges+'-'+otherChgsBy+'-'+suppId+'-'+preInvNo+'-'+invNo);

    var poststr = "rateCutOpt=" + encodeURIComponent(rateCutId) +
            "&goldTotFFineWt=" + encodeURIComponent(goldTotFFineWt) +
            "&goldTotFFineWtType=" + encodeURIComponent(goldTotFFineWtType) +
            "&silverTotFFineWt=" + encodeURIComponent(silverTotFFineWt) +
            "&silverTotFFineWtType=" + encodeURIComponent(silverTotFFineWtType) +
            "&totGoldPay=" + encodeURIComponent(totGoldPay) +
            "&totSilverPay=" + encodeURIComponent(totSilverPay) +
            "&goldRate=" + encodeURIComponent(goldRate) +
            "&silverRate=" + encodeURIComponent(silverRate) +
            "&otherCharges=" + encodeURIComponent(otherCharges) +
            "&payPanelName=" + encodeURIComponent(payPanelName) +
            "&otherChgsBy=" + encodeURIComponent(otherChgsBy) +
            "&payId=" + encodeURIComponent(document.getElementById('payId').value) +
            "&preInvId=" + encodeURIComponent(preInvNo) +
            "&invId=" + encodeURIComponent(invNo) +
            "&custId=" + encodeURIComponent(custId) +
            "&goldTotBal=" + encodeURIComponent(goldTotBal) +
            "&silverTotBal=" + encodeURIComponent(silverTotBal);

    if (rateCutId == 'rateCut') {
        showraw_sale_rate_cut("include/php/ogrmsrct.php", poststr);
    } else {
        showraw_sale_rate_cut("include/php/ogrmsnrt.php", poststr);
    }
}
function showraw_sale_rate_cut(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertShowSaleRawRateCut;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}

function alertShowSaleRawRateCut() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("rateCutDiv").innerHTML = xmlhttp.responseText;

        var prefix = document.getElementById('prefix').value;
//        calcRawRateCut(prefix);
        calcRawMetItem(prefix);
        calcRawRrCtCashBalance(prefix);



    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";

    }

}


function searchRawItemNames(itemName, metalType, divNum, metalId, keyCodeInput) {
    keyCodeForItemNames = keyCodeInput;
    divNumForItemNames = divNum;
    panelNameForItemNames = divNum;


    var documentRootPath = document.getElementById('documentRootPath').value;
    var poststr = "itemName=" + encodeURIComponent(itemName)
            + "&metalType=" + encodeURIComponent(metalType)
            + "&divNum=" + encodeURIComponent(divNum)
            + "&metalId=" + encodeURIComponent(metalId);

    search_raw_item_names(documentRootPath + "/include/php/omiladgv.php", poststr);
}

var keyCodeForItemNames;
//var divNumForItemNames;
var panelNameForItemNames;
function search_raw_item_names(url, parameters) {
    loadXMLDoc();

    xmlhttp.onreadystatechange = alertSearchRawItemNames;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchRawItemNames() {

    if (panelNameForItemNames == 'addStockItemName' || panelNameForItemNames == 'addItemCategory') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemListDivToAddStock").innerHTML = xmlhttp.responseText;
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
                document.getElementById('itemListToAddItemSelect').focus();
                document.getElementById('itemListToAddItemSelect').options[0].selected = true;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    } else if (panelNameForItemNames == 'addRawStockItemName' || panelNameForItemNames == 'addWhStockItemName') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemListDivToaddRawStock").innerHTML = xmlhttp.responseText;
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {

                document.getElementById('itemListToaddRawStock').focus();
                document.getElementById('itemListToaddRawStock').options[0].selected = true;

            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    } else if (panelNameForItemNames == 'RawStockItemName' ||panelNameForItemNames == 'RawMetalStockItemName') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemListDivToaddRawStock").innerHTML = xmlhttp.responseText;
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {

                document.getElementById('itemListToAddItemSelect').focus();
                document.getElementById('itemListToAddItemSelect').options[0].selected = true;

            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    } else if (panelNameForItemNames == 'slItemName') {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("itemListDivToaddRawCustStock").innerHTML = xmlhttp.responseText;
            if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {

                document.getElementById('itemListToaddRawCustStock').focus();
                document.getElementById('itemListToaddRawCustStock').options[0].selected = true;

            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    } else {
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



function searchRawSellItemNames(itemName, metalType, divNum, metalId, keyCodeInput, prefix, metlCount) {
    keyCodeForItemNames = keyCodeInput;
    divNumForItemNames = divNum;
    panelNameForItemNames = divNum;
    rawMetalCount = metlCount;

    //document.getElementById("ajaxLoadGetItemListDiv").style.visibility = "visible";
    var ItemId = prefix + "PayMetal1MetalDesc" + metlCount;
    var poststr = "itemName=" + encodeURIComponent(itemName)
            + "&metalType=" + encodeURIComponent(metalType)
            + "&divNum=" + encodeURIComponent(divNum)
            + "&metalId=" + encodeURIComponent(metalId)
            + "&ItemId=" + encodeURIComponent(ItemId)
            + "&metalCount=" + encodeURIComponent(metlCount);

    search_raw_sell_item_names('include/php/omiladgv.php', poststr);
}

var keyCodeForItemNames;
var divNumForItemNames;
var panelNameForItemNames;
var rawMetalCount;
function search_raw_sell_item_names(url, parameters) {
    loadXMLDoc();

    xmlhttp.onreadystatechange = alertSearchRawSellItemNames;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}

function alertSearchRawSellItemNames() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("itemListDivToaddRawMetSellStock" + rawMetalCount).innerHTML = xmlhttp.responseText;
        if (keyCodeForItemNames == 40 || keyCodeForItemNames == 38) {
            /****Start of changes in Code @AUTHOR: SANDY23SEP13 ******/
            document.getElementById('itemListToaddRawMetSellStock').focus();
            document.getElementById('itemListToaddRawMetSellStock').options[0].selected = true;
            /****End of changes in Code @AUTHOR: SANDY23SEP13 ******/
        }
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}



//START update function @Author:GAUR28NOV16
function changeRawSellOtherChgsOpt(othChgsBy, invPanel, payPanelName, custId, preInvoiceNo, invoiceNo, metalSellType)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById('main_ajax_loading_div').style.visibility = "hidden";
            document.getElementById('addRawStockSellInvoice').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById('main_ajax_loading_div').style.visibility = "visible";
        }
//                         alert(payPanelName);
        if (payPanelName == 'CustSellPayUp') {
            calcRawRrCtCashBalance('sell');
//                 alert(panel);

        }
    };
    xmlhttp.open("POST", "include/php/ogrmsind.php?othChgsBy=" + othChgsBy + "&invPanel=" + invPanel + "&payPanelName=" + payPanelName + "&custId=" + custId + "&preInvoiceNo=" + preInvoiceNo + "&invoiceNo=" + invoiceNo + "&metalSellType=" + metalSellType, true);
    xmlhttp.send();
}
//END update function @Author:GAUR28NOV16

function printCustInv(obj) {
    var DocumentContainer = document.getElementById(obj);
    var head;
    head = document.getElementById("custSellInvPrint");
    head.style.position = "relative";
    head.style.top = "0px"
    head.style.visibility = "visible"; //visible added @Author:PRIYA28MAY14

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
            '<script type="text/javascript" src="scripts/advanceMetal.js"></script>' +
            '</head><body>' +
            '<div id="CustSellInvId">' +
            DocumentContainer.innerHTML +
            '</div>' +
            '<a style="cursor: pointer;" onClick="window.print();"><img src="images/printer32.png" class="noPrint" alt="Print" title="Print" width="32px" height="32px" /></a>' +
            '</body></html>';
    var WindowObject = window.open("", "PrintWindow", "width=850,height=900,top=120,left=120,toolbars=no,scrollbars=yes,status=no,resizable=yes");
    WindowObject.document.open();
    WindowObject.document.writeln(html);
    WindowObject.document.close();
    WindowObject.focus();
}


function showRawNoOfRows(documentRootPath, rowsPerPage, pageNum, upRowsPanel, nwOrPanel, custId, metalRateId)
{
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadNextItemList").style.visibility = "visible";
//            document.getElementById("ajaxLoadNextItemListButt").style.visibility = "hidden";
        }
    };
    if (nwOrPanel == 'RawMetalList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmcslt.php?rowsPerPage=" + rowsPerPage + "&panel=" + nwOrPanel + "&stockUpdateRows=" + upRowsPanel + "&panelName=" + nwOrPanel + "&metalRateId=" + metalRateId, true);
    } else if (nwOrPanel == 'RawDetailMetalListDet') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmsdlt.php?rowsPerPage=" + rowsPerPage + "&panel=" + nwOrPanel + "&stockUpdateRows=" + upRowsPanel + "&panelName=" + nwOrPanel + "&metalRateId=" + metalRateId, true);
    }

    xmlhttp.send();
}

//function setRawRateCutValues(prefix) {
////    alert(prefix);
//    document.getElementById('metal1RtCtWt').value = parseFloat(goldWtBal).toFixed(3);
//    document.getElementById('metal1RtCtWtType').value = GoldWtType;
//    document.getElementById('metal2RtCtWt').value = parseFloat(silverWtBal).toFixed(3);
//    document.getElementById('metal2RtCtWtType').value = SilverWtType;
//    document.getElementById(prefix + 'PayMetal1WtBal').value = parseFloat(goldWtBal).toFixed(3);
//    document.getElementById(prefix + 'PayMetal1WtBalType').value = GoldWtType;
//    document.getElementById(prefix + 'PayMetal2WtBal').value = parseFloat(silverWtBal).toFixed(3);
//    document.getElementById(prefix + 'PayMetal2WtBalType').value = SilverWtType;
////    alert(document.getElementById('stockPurPriceCut').value);
//    if (document.getElementById('rawPurPriceCut').value == 'rateCut') {
////        if (stockDiv == 'wholeSaleStock') {
////            document.getElementById(prefix + 'Metal1RtCtWtBalDisp').value = parseFloat(goldWtBal).toFixed(3) + ' ' + GoldWtType;
////            document.getElementById(prefix + 'Metal2RtCtWtBalDisp').value = parseFloat(silverWtBal).toFixed(3) + ' ' + SilverWtType;
////            alert(document.getElementById(prefix + 'Metal2RtCtWtBalDisp').value);
////            document.getElementById(prefix + 'Metal1RtCtWtBal1').value = parseFloat(goldWtBal).toFixed(3);
////            document.getElementById(prefix + 'Metal2RtCtWtBal1').value = parseFloat(silverWtBal).toFixed(3);
////        } else {
//            document.getElementById('metal1RtCtWtBal1').value = parseFloat(goldWtBal).toFixed(3);
//            document.getElementById('metal2RtCtWtBal1').value = parseFloat(silverWtBal).toFixed(3);
//            document.getElementById('metal1RtCtWtBal').value = parseFloat(goldWtBal).toFixed(3);
//            document.getElementById('metal2RtCtWtBal').value = parseFloat(silverWtBal).toFixed(3);
//            document.getElementById('metal1RtCtWtBalDisp').value = parseFloat(goldWtBal).toFixed(3) + ' ' + GoldWtType;
//            document.getElementById('metal2RtCtWtBalDisp').value = parseFloat(silverWtBal).toFixed(3) + ' ' + SilverWtType;
////        }
//    }
//}
//******************START code for :DISH14NOV16**********************************//
function deleteCrystal_1(itstId, itprId, panelName, mainPanel, pageNo, sellPresent, itprcryId, itprcryName) {
//    alert("itstId = "+itstId);
//    alert("itprId = "+itprId);
//    alert("panelName = "+panelName);
//    alert("mainPanel = "+mainPanel);
//    alert("pageNo = "+pageNo);
//    alert("sellPresent = "+sellPresent);
//    alert("itprcryId = "+itprcryId);
//    alert("itprcryName = "+itprcryName);
    if (sellPresent > 0) {
        alert('To Delete,First Delete This Item From Customer Purchase Panel!');
        return false;
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");//add variables of alert msgs @AUTHOR: SANDY29JAN14
        if (confirm_box == true)
        {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("addStockCurrentInvoice").innerHTML = xmlhttp.responseText;
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            xmlhttp.open("GET", "include/php/ogcrldel.php?itstId=" + itstId + "&itprId=" + itprId + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&pageNo=" + pageNo + "&itprcryCryId=" + itprcryId + "&itprcryName=" + itprcryName, true);
            xmlhttp.send();
        }
    }
}

//*****************END code :DISH14NOV16**********************************//
//*******************START code to delete fields from :DISH14NOV16***************//
//####################START CODE TO DELETE SINGLE CRYSTAL ENTRY @SWAP22JUL17#################//
function deleteSellItemCrystal_1(custId, slPrId, panelName, mainPanel) {

    confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14

    var stockDelete = document.getElementById("stockDelete").value;

    if (confirm_box == true && stockDelete == 'Y') {
        confirm_box1 = confirm(addItemAlertMess + "\n\nDo you want to add this Item to Stock ?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
        if (confirm_box1 == true) {
            var addToStock = 'addtostock'; //add variables of alert msgs @AUTHOR: SANDY29JAN14
        }
    }
//    }
    if (confirm_box == true)
    {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrCurrentInvoice").innerHTML = xmlhttp.responseText;
                window.setTimeout(sellFunctionToCloseDiv, 1000);
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("GET", "include/php/ogcrspdl_1.php?custId=" + custId + "&stockDelete=" + stockDelete + "&slPrId=" + slPrId + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&addToStock=" + addToStock, true);
        xmlhttp.send();
    }

}
//####################END CODE TO DELETE SINGLE CRYSTAL ENTRY  IN CRYSTAL SELL PANEL @SWAP22JUL17#################//
//*******************START code to delete fields from :DISH14NOV16***************//
function validateAddSuppRawStockInputs() {
    if (validateSelectField(document.getElementById("addItemDOBDay").value, "Please Select Date Day!") == false) {
        document.getElementById("addItemDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBMonth").value, "Please Select Date Month!") == false) {
        document.getElementById("addItemDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBYear").value, "Please Select Date Year!") == false) {
        document.getElementById("addItemDOBYear").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please Select Firm Id!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_invoice_no").value, "Please enter Invoice Number!") == false ||
            validateNum(document.getElementById("sttr_invoice_no").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("sttr_invoice_no").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_metal_rate").value, "Please Enter item metal rate!") == false) {
        document.getElementById("sttr_metal_rate").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please Enter Item Name!") == false) {
        document.getElementById("sttr_item_name").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_gs_weight").value, "Please Enter Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("sttr_gs_weight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_gs_weight").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_nt_weight").value, "Please Enter Net Weight!") == false ||
            validateNumWithDot(document.getElementById("sttr_nt_weight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_nt_weight").focus();
        return false;
    } else if (validateSelectField(document.getElementById("sttr_purity").value, "Please Select Item Tunch or Purity!") == false) {
        document.getElementById("sttr_purity").focus();
        return false;
    }
    return true;
}
function addSuppRawStock() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addItemSubButtDiv").style.visibility = "hidden";
    var stockDateDay = document.getElementById("addItemDOBDay").value;
    var stockDateMMM = document.getElementById("addItemDOBMonth").value;
    var stockDateYY = document.getElementById("addItemDOBYear").value;
    var stockDateStr = document.getElementById("addItemDOBMonth").value + ' ' + document.getElementById("addItemDOBDay").value + ', ' + document.getElementById("addItemDOBYear").value;
    var stockDate = new Date(stockDateStr); // stock Date
    var todayDate = new Date(); // Today Date

    var milliStockDate = stockDate.getTime();
    var milliTodayDate = milliStockDate;
    var datesDiff = milliTodayDate - milliStockDate;
    if (datesDiff < 0) {
        alert('Please Select the correct Date!');
        document.getElementById("addItemDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
    } else {
        if (stockDateMMM == 'FEB' || stockDateMMM == 'APR' || stockDateMMM == 'JUN' || stockDateMMM == 'SEP' || stockDateMMM == 'NOV') {
            if (stockDateMMM == 'FEB' && stockDateDay > 29 && stockDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemSubButtDiv").style.visibility = "visible";
            }
            if (stockDateMMM == 'FEB' && stockDateDay > 28 && stockDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemSubButtDiv").style.visibility = "visible";
            }
            if (stockDateDay > 30) {
                alert('Please select correct Date, Month ' + stockDateMMM + ' has only max 30 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemSubButtDiv").style.visibility = "visible";
            }
        }

        if (validateAddSuppRawMetalInputs()) {
            return true;
        }
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemSubButtDiv").style.visibility = "visible";
        return false;
    }
}
function validateAddSuppRawMetalInputs() {
    if (validateSelectField(document.getElementById("addItemDOBDay").value, "Please Select Date Day!") == false) {
        document.getElementById("addItemDOBDay").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBMonth").value, "Please Select Date Month!") == false) {
        document.getElementById("addItemDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBYear").value, "Please Select Date Year!") == false) {
        document.getElementById("addItemDOBYear").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("addItemInvoiceNo").value, "Please enter Invoice Number!") == false ||
            validateNum(document.getElementById("addItemInvoiceNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("addItemInvoiceNo").focus();
        return false;
    } else if (validateSelectField(document.getElementById("firmId").value, "Please Select Firm Id!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("accountId").value, "Please Select Metal Account!") == false) {
        document.getElementById("accountId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slItemName").value, "Please Enter Item Name!") == false) {
        document.getElementById("slItemName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slItemGrossWeight").value, "Please Enter Gross Weight!") == false ||
            validateNumWithDot(document.getElementById("slItemGrossWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slItemGrossWeight").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slItemNetWeight").value, "Please Enter Net Weight!") == false ||
            validateNumWithDot(document.getElementById("slItemNetWeight").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slItemNetWeight").focus();
        return false;
    } else if (validateSelectField(document.getElementById("slItemTunch").value, "Please Select Item Tunch or Purity!") == false) {
        document.getElementById("slItemTunch").focus();
        return false;
    }
    return true;
}

function deleteRawMetalList(utransId, panelName, mainPanel, payPanelName, userId, metType) {
//    alert(metType);
//    alert('utransId:' + utransId + 'panelName:' + panelName + 'mainPanel:' + mainPanel + 'payPanelName:' + payPanelName + 'userId:' + userId + 'metType:' + metType);
    confirm_box = confirm(deleteAlertMess + "\nDo you really want to delete this Item?");
    if (confirm_box == true)
    {
        var rawDeleteConfirm = '';
        confirm_box_for_raw_metal = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item From Raw Metal Stock?");
        if (confirm_box_for_raw_metal == true)
        {
            rawDeleteConfirm = 'yes';
        }
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                if (panelName == 'ItemDelete') {
                    document.getElementById("SuppMetalPurchaseDiv").innerHTML = xmlhttp.responseText;
                    window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                } else if (panelName == 'StockPanelRawPurchaseList' || panelName == 'StockPanelRawSellList') {
                    document.getElementById("rawPanelPurchaseList").innerHTML = xmlhttp.responseText;
                }
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        if (metType == 'BUY') {
            xmlhttp.open("POST", "include/php/ogrwmtdel.php?utransId=" + utransId + "&panelName=" + panelName + "&mainPanel=" + mainPanel +
                    "&payPanelName=" + payPanelName + "&rawDeleteConfirm=" + rawDeleteConfirm + "&userId=" + userId + "&metType=" + metType, true);
        } else {
            xmlhttp.open("POST", "include/php/ogrwmtsldel.php?utransId=" + utransId + "&panelName=" + panelName + "&mainPanel=" + mainPanel +
                    "&payPanelName=" + payPanelName + "&rawDeleteConfirm=" + rawDeleteConfirm + "&userId=" + userId + "&metType=" + metType, true);
        }
        xmlhttp.send();
    }
}
//FUNCTION FOR RE-ORDER LIST METAL TYPE WISE @DARSHANA 16 AUG 2021
function showReOrderMetalWiseList(divPanel, indicator) {
    // alert(divPanel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (indicator == 'GoldSilverReorder') {
        xmlhttp.open("POST", "include/php/omgslreordrlist.php?divPanel=" + divPanel, true);
    } else if (indicator == 'StoneReorder') {
        xmlhttp.open("POST", "include/php/omstonordrlist.php?divPanel=" + divPanel, true);
    } else if (indicator == 'ImitationReorder') {
        xmlhttp.open("POST", "include/php/omimitaordrlist.php?divPanel=" + divPanel, true);
    }

    xmlhttp.send();
}
//
//
//
//
//*************************************************************************************************
//* START CODE FOR ALL GOLD SILVER STOCK LIST @PRIYANKA-07JAN2022
//*************************************************************************************************
function showAllGoldSilverStockList(divPanel, metalType) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById('addStockItemDetails').innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omAllGdSlStockList.php?divPanel=" + divPanel + "&metalType=" + metalType, true);
    xmlhttp.send();
    //
}
//*************************************************************************************************
//* END CODE FOR ALL GOLD SILVER STOCK LIST @PRIYANKA-07JAN2022
//*************************************************************************************************
//
//***************************************************************************************************************
//START CODE FOR SHOW CATLOGUE PRODUCT LIST AND CARD WISE : ATUHOR @DARSHANA 9 FEB 2022
//***************************************************************************************************************
function showCatlogue(indicator) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (indicator == 'catlogueShowList') {
        xmlhttp.open("POST", "include/php/omcatstkoplist.php", true);
    } else if (indicator == 'catlogueShowCard') {
        xmlhttp.open("POST", "include/php/ogvirstoption.php", true);
    }

    xmlhttp.send();
}
//***************************************************************************************************************
//END CODE FOR SHOW CATLOGUE PRODUCT LIST AND CARD WISE : ATUHOR @DARSHANA 9 FEB 2022
//***************************************************************************************************************