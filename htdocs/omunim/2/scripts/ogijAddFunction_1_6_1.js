/* file name := ogijAddFunction_1_6_1.js
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**********Start code to add function to get item pre id div @Author:ANUJA19JAN15*********/
/**********ADD update @Author: GAUR05OCT16*********/
function getAItemPreIdDiv(preId, div, id, keyCodeInput, mainPanel, stockType) {
    documentRootPath = document.getElementById('documentRootBSlash').value;
    var sttr_panel_name = document.getElementById('sttr_panel_name').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            if (str == '') {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                document.getElementById('sttr_item_id').value = '1';////changed by @auth:athu6jun17
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
    xmlhttp.open("POST", documentRootPath + "/include/php/ogijaidsl.php?itemPreId=" + itemPreId +
            "&div=" + div + "&id=" + id + "&mainPanel=" + mainPanel +
            "&stockType=" + stockType + "&sttr_panel_name=" + sttr_panel_name, true);
    xmlhttp.send();
}
/**********END update @Author: GAUR05OCT16*********/
function getAItemPreIdDivRetail(preId, div, id, keyCodeInput, mainPanel, stockType) {
    alert('colled');
    documentRootPath = document.getElementById('documentRootBSlash').value;
    var sttr_panel_name = document.getElementById('sttr_panel_name').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            if (str == '') {
                document.getElementById(div).innerHTML = xmlhttp.responseText;
                document.getElementById('sttr_item_id').value = '1';////changed by @auth:athu6jun17
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
    xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv.php?itemPreId=" + itemPreId +
            "&div=" + div + "&id=" + id + "&mainPanel=" + mainPanel +
            "&stockType=" + stockType + "&sttr_panel_name=" + sttr_panel_name, true);
    xmlhttp.send();
}
/**********END update @Author: GAUR05OCT16*********/
// ****START CODE FOR ADD IMITATION PANEL - ACCORDING TO PRE ID, ITEM ID NOT CHANGING AUTHOR : DIKSHA 2JAN2019******
//

//
function getImitaionPreId(preId, panelName, div) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        }
    };
    documentRootPath = document.getElementById('documentRootBSlash').value;
    if (panelName == 'RETAIL_IMITATION_B1') {
        xmlhttp.open("POST", "include/php/ogijsdvimb1.php?preId=" + preId + "&stockPanel=" + panelName, true);
        xmlhttp.send();
    } else if (panelName == 'RETAIL_IMITATION_B2') {
        xmlhttp.open("POST", "include/php/ogijaitdvB2.php?preId=" + preId + "&stockPanel=" + panelName, true);
        xmlhttp.send();
    } else if (panelName == 'RETAIL_IMITATION_B3') {
        xmlhttp.open("POST", "include/php/ogijaitdvB3.php?preId=" + preId + "&stockPanel=ImitationStock", true);
        xmlhttp.send();
    } else if (panelName == 'FASHION_JEWELLARY') {
        xmlhttp.open("POST", "include/php/ogijaitdvfashion.php?preId=" + preId + "&stockPanel=ImitationStock", true);
        xmlhttp.send();//hrushali
    } else if (panelName == 'SERVICE_FORM' || panelName == 'SUBSCRIPTION_FORM') {
        xmlhttp.open("POST", "include/php/ogijaitdvS1.php?preId=" + preId + "&stockPanel=ImitationStock"
                + "&panelName=" + panelName, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijsdv.php?preId=" + preId + "&stockPanel=" + panelName, true);
        xmlhttp.send();
    }
}
//START CODE FOR ADD STOCK FORM @AUTHOR:SHRIKANT 10032023
function getImitaionPreIdRetail(preId, panelName, div) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        }
    };
    if (panelName == 'RETAIL_IMITATION_B2') {
        xmlhttp.open("POST", "include/php/ogijaitdvB2.php?preId=" + preId + "&stockPanel=ImitationStock"
                + "&stockPanel=" + panelName, true);
        xmlhttp.send();
    } else if (panelName == 'RETAIL_IMITATION_B3') {
        xmlhttp.open("POST", "include/php/ogijaitdvB3.php?preId=" + preId + "&stockPanel=ImitationStock"
                + "&panelName=" + panelName, true);
        xmlhttp.send();
    } else if (panelName == 'RETAIL_IMITATION_NUM_B3') {
        xmlhttp.open("POST", "include/php/omAdStNumB3.php?preId=" + preId + "&stockPanel=ImitationStock"
                + "&panelName=" + panelName, true);
        xmlhttp.send();
    } else if (panelName == 'SERVICE_FORM' || panelName == 'SUBSCRIPTION_FORM') {
        xmlhttp.open("POST", "include/php/ogijaitdvS1.php?preId=" + preId + "&stockPanel=ImitationStock"
                + "&panelName=" + panelName, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("POST", "include/php/ogijaitdvRB2.php?preId=" + preId + "&stockPanel=" + panelName, true);
        xmlhttp.send();
    }
}
//END CODE FOR ADD STOCK FORM @AUTHOR:SHRIKANT 10032023
// ****END CODE FOR ADD IMITATION PANEL - ACCORDING TO PRE ID, ITEM ID NOT CHANGING AUTHOR : DIKSHA 2JAN2019******
/**********End code to add function to get item pre id div @Author:ANUJA19JAN15*********/
function searchImitationItemNames(itemName, divNum, keyCodeInput) {
    keyCodeForItemNames = keyCodeInput;
    divNumForItemNames = divNum;
    panelNameForItemNames = divNum;

    //document.getElementById("ajaxLoadGetItemListDiv").style.visibility = "visible";

    var poststr = "itemName=" + encodeURIComponent(itemName)
            + "&divNum=" + encodeURIComponent(divNum);


    search_item_names('include/php/ogijladgv.php', poststr);
}
//function search_suppId_for_textField(url, parameters) {
//    loadXMLDoc();
//
//    xmlhttp.onreadystatechange = alertSearchSuppIdForTextField;
//
//    xmlhttp.open('POST', url, true);
//    xmlhttp.setRequestHeader('Content-Type',
//            'application/x-www-form-urlencoded');
//    xmlhttp.setRequestHeader("Content-length", parameters.length);
//    xmlhttp.setRequestHeader("Connection", "close");
//    xmlhttp.send(parameters);
//}
//
//function alertSearchSuppIdForTextField() {
//    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//        document.getElementById("suppListDivToAddItemStock").innerHTML = xmlhttp.responseText;
//        if (keyCode == 40 || keyCode == 38) {
//            document.getElementById('suppListForTextFieldSelect').focus();
//            document.getElementById('suppListForTextFieldSelect').options[0].selected = true;
//        }
//    }
//    else {
//        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//    }
//}
//function searchSuppIdForTextField(suppName, keyCodeInput) {
//
//    keyCode = keyCodeInput;
//
//    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//
//    var poststr = "suppName=" + encodeURIComponent(suppName);
//
//    search_suppId_for_textField('include/php/ogwwswlt.php', poststr);
//}
//function validateEmptyField(field, alerttxt) {
//    String.prototype.trim = function () {
//        return this.replace(/^\s*/, "").replace(/\s*$/, "");
//    };
//    field = field.trim();
//    if (field == null || field == "") {
//        alert(alerttxt);
//        return false;
//    } else {
//        return true;
//    }
//}
//function validateSelectField(field, alerttxt) {
//    if (field == "NotSelected" || field == "" || field == null) {
//        alert(alerttxt);
//        return false;
//    } else {
//        return true;
//    }
//}
//function valKeyPressedForNumNDot(evt) {
//    var charCode = (evt.which) ? evt.which : event.keyCode;
//    if (charCode == 46 || charCode == 8) {
//        return true;
//    }
//    else if ((charCode < 48 || charCode > 57)) {
//        return false;
//    }
//    return true;
//}
/***************Start cdoe to add panel @Author:ANUJA12JAN15*************/
function showAddArtificialPanel(panel) {
    loadXMLDoc();
    //alert(panel);
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;  //change in div name @AUTHOR: SANDY25SEP13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/ogijsdv.php?panel=" + panel, true);
    xmlhttp.send();
}
/***************Start cdoe to add panel @Author:LOVE01OCT17*************/
function showAddRetailStockPanel(panel, defaultImi = '') {
    loadXMLDoc();
    //
    //    alert(panel);
    //
    xmlhttp.onreadystatechange = function () {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;  //change in div name @AUTHOR: SANDY25SEP13
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    var imiPurDefaultForm = document.getElementById("imiPurDefaultForm").value;
    //
    if (panel == 'RETAIL_IMITATION_NUM_B3') {
        xmlhttp.open("POST", "include/php/omAdStNumB3" + default_theme + ".php?panel=" + panel, true);
    } else if (imiPurDefaultForm == 'imiPurB2') {
        if (panel == 'ImitationStock') {
            xmlhttp.open("POST", "include/php/ogijsdv" + default_theme + ".php?panel=" + panel, true);
        } else {
            xmlhttp.open("POST", "include/php/ogijaitdvB2" + default_theme + ".php?panel=" + panel, true);
        }
    } else {
        if (defaultImi == 'imitationb1') {
            xmlhttp.open("POST", "include/php/ogijsdvimb1" + default_theme + ".php?panel=RETAIL_IMITATION_B1", true);
        } else if (defaultImi == 'imitationb2') {
            xmlhttp.open("POST", "include/php/ogijaitdvB2" + default_theme + ".php?panel=RETAIL_IMITATION_B2", true);
        } else if (defaultImi == 'fashionJwel') {
            xmlhttp.open("POST", "include/php/ogijaitdvfashion" + default_theme + ".php?panel=FASHION_JEWELLARY", true);
        } else {
            xmlhttp.open("POST", "include/php/ogijsdv" + default_theme + ".php?panel=" + panel, true);
        }
    }


    xmlhttp.send();
}
/***************End cdoe to add panel @Author:ANUJA12JAN15*************/

function showAddRetailStockPanelPopUp(panel, invPanel, utransInvId, utransUserId) {
    //
    //alert("panel == " + panel);
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addGoodsAndStockMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    if (panel == 'RetailStock') {
        xmlhttp.open("POST", "ogijsdv.php?panel=" + panel + "&invPanel=" + invPanel +
                "&utransInvId=" + utransInvId + "&utransUserId=" + utransUserId, true);
    } else {
        xmlhttp.open("POST", "ogijaitdvB2.php?panelName=" + panel + "&panel=" + panel + "&invPanel=" + invPanel +
                "&utransInvId=" + utransInvId + "&utransUserId=" + utransUserId, true);
    }
    //
    xmlhttp.send();
}

/**********Start code to add function to get calc by for labour charges @Author:PRIYA07OCT14*********/
function getAItemDetailsByPreId(preId, mainPanel, stockPanel) {

    //alert('stockPanel == ' + stockPanel);
    //alert('mainPanel == ' + mainPanel);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var str = xmlhttp.responseText;
            var strArray = new Array();
            strArray = str.split("*");

            if (stockPanel == 'retailStock')
                document.getElementById('addItemId').value = strArray[0];
            else {
                document.getElementById('addItemName').value = strArray[1];
                document.getElementById('addItemCategory').value = strArray[2];
                document.getElementById('addItemPieces').value = strArray[3];

                document.getElementById('addItemGrossWeight').value = '';

                document.getElementById('addItemValuation').value = strArray[4];
                document.getElementById('addItemCustItmCode').value = strArray[5];
                document.getElementById('addItemCustItmNum').value = strArray[6];

                document.getElementById('addItemLabCharges').value = strArray[7];
                document.getElementById('addItemLabChargesType').value = strArray[8];

                document.getElementById('addItemValuation').value = strArray[9];
                document.getElementById('addItemVATTax').value = strArray[10];

                if (mainPanel == 'StockPanel')
                    document.getElementById('addItemFinalVal').value = '';

                callItemPrice();
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogijapidt.php?preId=" + preId + "&mainPanel=" + mainPanel + "&stockPanel=" + stockPanel, true);
    xmlhttp.send();
}
/**********End code to add function to get calc by for labour charges @Author:ANUJA13JAN15*********/

/**********Start code to add function to get calc by for labour charges @Author:ANUJA14JAN15*********/
/**********Start code to add function to get calc by for labour charges @Author:ANUJA20FEB15*********/
/**********Start code TO UPDATE THE MULTIFICATION OF QTY @Author: GAUR19SEP16*********/
//***************Start code to add function for strellering calulations AUTHOR:DIKSHA08OCT2018*********
function calstrprice() {

    var rate = parseFloat(document.getElementById('sttr_price').value).toFixed(2);
    var sellrate = parseFloat(document.getElementById('sttr_cust_price').value).toFixed(2);
    var mkgchrg = parseFloat(document.getElementById('sttr_making_charges').value).toFixed(2);
    var labCharges = parseFloat(document.getElementById('sttr_lab_charges').value).toFixed(2);
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;
    var mkgChargesType = document.getElementById('sttr_making_charges_type').value;
    var addprice = parseFloat(document.getElementById('sttr_unit_price').value).toFixed(2);
    var itemqty = parseFloat(document.getElementById('sttr_quantity').value).toFixed(2);
    var itemgswt = parseFloat(document.getElementById('sttr_gs_weight').value).toFixed(2);
    var sellprice = parseFloat(document.getElementById('sttr_final_sell_valuation').value).toFixed(2);

    if ((document.getElementById('sttr_cust_itmcalby').value == 'QTY')) {
        if (document.getElementById('sttr_quantity').value > 0) {
            document.getElementById('sttr_unit_price').value = ((parseFloat(document.getElementById('sttr_quantity').value)) * parseFloat(rate)).toFixed(2);
            document.getElementById('sttr_unit_cust_price').value = ((parseFloat(document.getElementById('sttr_quantity').value)) * parseFloat(sellrate)).toFixed(2);
        }
    } else if ((document.getElementById('sttr_cust_itmcalby').value == 'GSWT')) {
        if (document.getElementById('sttr_gs_weight').value > 0) {
            if (document.getElementById('sttr_gs_weight_type').value == 'GM') {
                document.getElementById('sttr_unit_price').value = ((parseFloat(document.getElementById('sttr_gs_weight').value)) * parseFloat(rate)).toFixed(2);
            } else if (document.getElementById('sttr_gs_weight_type').value == 'KG') {
                document.getElementById('sttr_unit_price').value = ((parseFloat(document.getElementById('sttr_gs_weight').value)) * (parseFloat(rate) * 1000)).toFixed(2);
            } else if (document.getElementById('sttr_gs_weight_type').value == 'MG') {
                document.getElementById('sttr_unit_price').value = ((parseFloat(document.getElementById('sttr_gs_weight').value)) * (parseFloat(rate) / 1000)).toFixed(2);
            }
            if (document.getElementById('sttr_gs_weight_type').value == 'GM') {
                document.getElementById('sttr_unit_cust_price').value = ((parseFloat(document.getElementById('sttr_gs_weight').value)) * parseFloat(sellrate)).toFixed(2);
            } else if (document.getElementById('sttr_gs_weight_type').value == 'KG') {
                document.getElementById('sttr_unit_cust_price').value = ((parseFloat(document.getElementById('sttr_gs_weight').value)) * (parseFloat(sellrate) * 1000)).toFixed(2);
            } else if (document.getElementById('sttr_gs_weight_type').value == 'MG') {
                document.getElementById('sttr_unit_cust_price').value = ((parseFloat(document.getElementById('sttr_gs_weight').value)) * (parseFloat(sellrate) / 1000)).toFixed(2);
            }
        }
    }

    if (document.getElementById('sttr_unit_price').value == '' ||
            document.getElementById('sttr_unit_price').value == 'NaN') {
        document.getElementById('sttr_unit_price').value = 0;
    }

    if (document.getElementById('sttr_unit_cust_price').value == '' ||
            document.getElementById('sttr_unit_cust_price').value == 'NaN') {
        document.getElementById('sttr_unit_cust_price').value = 0;
    }

    if (labChargesType == 'PP') {
        document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(itemqty)).toFixed(2);
    } else if (labChargesType == 'GM') {
        document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(itemgswt)).toFixed(2);
    } else if (labChargesType == 'KG') {
        document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * (parseFloat(itemgswt) * 1000)).toFixed(2);
    } else if (labChargesType == 'MG') {
        document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * (parseFloat(itemgswt) / 1000)).toFixed(2);
    }

    if (mkgChargesType == 'PP') {
        document.getElementById('sttr_total_making_charges').value = (parseFloat(mkgchrg) * parseFloat(itemqty)).toFixed(2);
    } else if (mkgChargesType == 'GM') {
        document.getElementById('sttr_total_making_charges').value = (parseFloat(mkgchrg) * parseFloat(itemgswt)).toFixed(2);
    } else if (mkgChargesType == 'KG') {
        document.getElementById('sttr_total_making_charges').value = (parseFloat(mkgchrg) * (parseFloat(itemgswt) * 1000)).toFixed(2);
    } else if (mkgChargesType == 'MG') {
        document.getElementById('sttr_total_making_charges').value = (parseFloat(mkgchrg) * (parseFloat(itemgswt) / 1000)).toFixed(2);
    }

    if (document.getElementById('sttr_total_lab_charges').value == '' ||
            document.getElementById('sttr_total_lab_charges').value == 'NaN') {
        document.getElementById('sttr_total_lab_charges').value = 0;
    }

    if (document.getElementById('sttr_total_making_charges').value == '' ||
            document.getElementById('sttr_total_making_charges').value == 'NaN') {
        document.getElementById('sttr_total_making_charges').value = 0;
    }

    document.getElementById('sttr_valuation').value = (parseFloat(document.getElementById('sttr_unit_price').value)).toFixed(2);
    document.getElementById('sttr_final_valuation').value = (parseFloat(document.getElementById('sttr_valuation').value)).toFixed(2);
    document.getElementById('sttr_final_sell_valuation').value = ((parseFloat(document.getElementById('sttr_unit_cust_price').value) + parseFloat(document.getElementById('sttr_total_making_charges').value))).toFixed(2);

    if (document.getElementById('sttr_valuation').value == '' ||
            document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }

    if (document.getElementById('sttr_final_sell_valuation').value == '' ||
            document.getElementById('sttr_final_sell_valuation').value == 'NaN') {
        document.getElementById('sttr_final_sell_valuation').value = 0;
    }

    if (document.getElementById('sttr_total_price').value == '' ||
            document.getElementById('sttr_total_price').value == 'NaN') {
        document.getElementById('sttr_total_price').value = 0;
    }

    if (document.getElementById('sttr_total_lab_charges').value == '') {
        document.getElementById('sttr_total_price').value = document.getElementById('sttr_valuation').value;
    } else {
        document.getElementById('sttr_total_price').value = ((parseFloat(document.getElementById('sttr_total_lab_charges').value) + parseFloat(document.getElementById('sttr_valuation').value))).toFixed(2);
    }

    if (document.getElementById('sttr_total_price').value == '' ||
            document.getElementById('sttr_total_price').value == 'NaN') {
        document.getElementById('sttr_total_price').value = 0;
    }

    //GST calculations
    if (document.getElementById('sttr_mkg_cgst_per').value == '' ||
            document.getElementById('sttr_mkg_cgst_per').value == 'NaN') {
        document.getElementById('sttr_mkg_cgst_per').value = 0;
    }

    if (document.getElementById('sttr_mkg_cgst_per').value != '') {
        document.getElementById('sttr_mkg_cgst_chrg').value = (parseFloat(document.getElementById('sttr_total_lab_charges').value) * (parseFloat(document.getElementById('sttr_mkg_cgst_per').value) / 100)).toFixed(2);
    }

    if (document.getElementById('sttr_mkg_cgst_chrg').value == '' ||
            document.getElementById('sttr_mkg_cgst_chrg').value == 'NaN') {
        document.getElementById('sttr_mkg_cgst_chrg').value = 0;
    }

    if (document.getElementById('sttr_mkg_sgst_per').value == '' ||
            document.getElementById('sttr_mkg_sgst_per').value == 'NaN') {
        document.getElementById('sttr_mkg_sgst_per').value = 0;
    }

    if (document.getElementById('sttr_mkg_sgst_per').value != '') {
        document.getElementById('sttr_mkg_sgst_chrg').value = (parseFloat(document.getElementById('sttr_total_lab_charges').value) * (parseFloat(document.getElementById('sttr_mkg_sgst_per').value) / 100)).toFixed(2);
    }

    if (document.getElementById('sttr_mkg_sgst_chrg').value == '' ||
            document.getElementById('sttr_mkg_sgst_chrg').value == 'NaN') {
        document.getElementById('sttr_mkg_sgst_chrg').value = 0;
    }

    if (document.getElementById('sttr_mkg_igst_per').value == '' ||
            document.getElementById('sttr_mkg_igst_per').value == 'NaN') {
        document.getElementById('sttr_mkg_igst_per').value = 0;
    }

    if (document.getElementById('sttr_mkg_igst_per').value != '') {
        document.getElementById('sttr_mkg_igst_chrg').value = (parseFloat(document.getElementById('sttr_total_lab_charges').value) * (parseFloat(document.getElementById('sttr_mkg_igst_per').value) / 100)).toFixed(2);
    }

    if (document.getElementById('sttr_mkg_igst_chrg').value == '' ||
            document.getElementById('sttr_mkg_igst_chrg').value == 'NaN') {
        document.getElementById('sttr_mkg_igst_chrg').value = 0;
    }

    if (document.getElementById('sttr_tot_price_cgst_per').value == '' ||
            document.getElementById('sttr_tot_price_cgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_per').value = 0;
    }

    if (document.getElementById('sttr_tot_price_cgst_per').value != '') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
    }

    if (document.getElementById('sttr_tot_price_cgst_chrg').value == '' ||
            document.getElementById('sttr_tot_price_cgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = 0;
    }

    if (document.getElementById('sttr_tot_price_sgst_per').value == '' ||
            document.getElementById('sttr_tot_price_sgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_per').value = 0;
    }

    if (document.getElementById('sttr_tot_price_sgst_per').value != '') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
    }

    if (document.getElementById('sttr_tot_price_sgst_chrg').value == '' ||
            document.getElementById('sttr_tot_price_sgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = 0;
    }

    if (document.getElementById('sttr_tot_price_igst_per').value == '' ||
            document.getElementById('sttr_tot_price_igst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_per').value = 0;
    }

    if (document.getElementById('sttr_tot_price_igst_per').value != '') {
        document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
    }

    if (document.getElementById('sttr_tot_price_igst_chrg').value == '' ||
            document.getElementById('sttr_tot_price_igst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_chrg').value = 0;
    }

    if (document.getElementById('sttr_tax').value == '' || document.getElementById('sttr_tax').value == 'NaN') {
        document.getElementById('sttr_tax').value = 0;
    }

    if (document.getElementById('sttr_total_lab_charges').value == '') {
        document.getElementById('sttr_final_valuation').value = parseFloat(document.getElementById('sttr_unit_price').value).toFixed(2);
    }

    // CALCULATE TOT TAX AMT => LAB CGST AMT + LAB SGST AMT + LAB IGST AMT + MET CGST AMT + MET SGST AMT + MET IGST AMT @PRIYANKA-23FEB18
    document.getElementById('sttr_tax').value = (parseFloat(document.getElementById('sttr_mkg_cgst_chrg').value) +
            parseFloat(document.getElementById('sttr_mkg_sgst_chrg').value) +
            parseFloat(document.getElementById('sttr_mkg_igst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);

    if (document.getElementById('sttr_tax').value > 0) {
        document.getElementById('sttr_final_valuation').value = parseFloat(parseFloat(document.getElementById('sttr_total_price').value) + parseFloat(document.getElementById('sttr_tax').value)).toFixed(2);
    } else {
        document.getElementById('sttr_final_valuation').value = parseFloat(parseFloat(document.getElementById('sttr_total_price').value)).toFixed(2);
    }

    if (document.getElementById('sttr_final_valuation').value == '' ||
            document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }

    return false;
}
//***************End code to add function for strellering calulations AUTHOR:DIKSHA08OCT2018*********
/**********Start code to change ID's @Author: PRIYANKA-03-06-17*********/
function callItemPrice() {
    if (typeof (document.getElementById('sttr_metal_rate')) != 'undefined' &&
            (document.getElementById('sttr_metal_rate') != null)) {
        var rate = document.getElementById('sttr_metal_rate').value;
    }
    var addprice = document.getElementById('sttr_price').value;
    var labCharges = document.getElementById('sttr_lab_charges').value;
    var othCharges = document.getElementById('sttr_oth_charges').value;
    var itemqty = document.getElementById('sttr_quantity').value;
    var labChargesType = document.getElementById('sttr_lab_charges_type').value;
    var calculationBy = document.getElementById('sttr_item_cal_type').value;
    var totVal;

    var purDiscountPercentage = document.getElementById('purchase_discount_per').value;
    var sellDiscountPercentage = document.getElementById('sell_discount_per').value;
    //    if ((rate > 0) && (document.getElementById('sttr_gs_weight').value > 0)) {
    //        addprice = document.getElementById('sttr_price').value = rate;
    //    }
    //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    // START TO MODIFY CODE FOR CALCULATION BY QTY AND GROSS WEIGHT ACCODRING TO SELECTED OPTION FOR IMITATION PURCHASE @AUTHOR:MADHUREE-31JULY2020 //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    //
    //    if (calculationBy == 'byOty' && document.getElementById('sttr_gs_weight').value != '' && rate != '') {
    //        document.getElementById('sttr_item_cal_type').value = 'byWt';
    //        calculationBy = 'byWt';
    //    }
    //
    if (calculationBy == 'byWt') {
        var weight = document.getElementById('sttr_gs_weight').value;
        var wtType = document.getElementById('sttr_gs_weight_type').value;
        if (addprice == '' || addprice == 'NaN' || addprice == null) {
            addprice = 0;
        }
        if (wtType == 'KG') {
            document.getElementById('sttr_valuation').value = parseFloat((weight * addprice) * 1000).toFixed(2);
        } else if (wtType == 'GM') {
            document.getElementById('sttr_valuation').value = parseFloat((weight * addprice)).toFixed(2);
        } else if (wtType == 'MG') {
            document.getElementById('sttr_valuation').value = parseFloat((weight * addprice) / 1000).toFixed(2);
        }
        //
        if (labCharges != '') {
            if (labChargesType == 'PP') {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(itemqty)).toFixed(2);
            } else if (labChargesType == 'GM') {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(weight)).toFixed(2);
            } else if (labChargesType == 'KG') {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * (parseFloat(weight) * 1000)).toFixed(2);
            } else if (labChargesType == 'MG') {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * (parseFloat(weight) / 1000)).toFixed(2);
            }
            //
            var totalLabCharges = 0;
            if (document.getElementById('sttr_total_lab_charges').value != '' && document.getElementById('sttr_total_lab_charges').value != 'NaN') {
                totalLabCharges = document.getElementById('sttr_total_lab_charges').value;
            }
            document.getElementById('sttr_valuation').value = (parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(totalLabCharges)).toFixed(2);
        }
        //
    } else {
        //

        if (labCharges == '') {
            document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(itemqty)).toFixed(2);
            document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('sttr_price').value)) * parseFloat(itemqty)).toFixed(2);
        } else if (labChargesType == 'PP') {
            document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(itemqty)).toFixed(2);
            document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('sttr_price').value) + parseFloat(labCharges)) * parseFloat(itemqty)).toFixed(2);
        } else if (labChargesType == 'GM') {
            document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(itemqty)).toFixed(2);
            document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('sttr_price').value) + parseFloat(labCharges)) * parseFloat(itemqty)).toFixed(2);
        } else if (labChargesType == 'KG') {
            document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(itemqty)).toFixed(2);
            document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('sttr_price').value) + parseFloat(labCharges)) * parseFloat(itemqty)).toFixed(2);
        } else if (labChargesType == 'MG') {
            document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(itemqty)).toFixed(2);
            document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('sttr_price').value) + parseFloat(labCharges))).toFixed(2);
        }
        if (othCharges != '') {
            document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(othCharges) * parseFloat(itemqty))).toFixed(2);
        }
    }

    if (purDiscountPercentage != '') {
        var discountAmt = document.getElementById('sttr_valuation').value * (purDiscountPercentage / 100);
        document.getElementById('sttr_purches_discount_amt').value = parseInt(discountAmt);
        var discountedPrice = document.getElementById('sttr_valuation').value - discountAmt;
        document.getElementById('sttr_valuation').value = (parseFloat(discountedPrice)).toFixed(2);
    }

    if (document.getElementById('sttr_sell_oth_charges').value == 'NaN' || document.getElementById('sttr_sell_oth_charges').value == '') {
        document.getElementById('sttr_sell_oth_charges').value = 0;
    }
    var originalPrize = ((parseFloat(document.getElementById('sttr_cust_price').value) + parseFloat(document.getElementById('sttr_sell_oth_charges').value)) * parseFloat(itemqty)).toFixed(2);
    //     var originalPrize = (parseFloat(document.getElementById('sttr_cust_price').value) + parseFloat(document.getElementById('sttr_sell_oth_charges').value)).toFixed(2);

    if (sellDiscountPercentage != '') {
        var discountAmt = originalPrize * (sellDiscountPercentage / 100);
        document.getElementById('sttr_metal_discount_amt').value = parseInt(discountAmt);
        var discountedPrice = originalPrize - discountAmt;
        //        alert(discountedPrice);
    }
    //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    // END TO MODIFY CODE FOR CALCULATION BY QTY AND GROSS WEIGHT ACCODRING TO SELECTED OPTION FOR IMITATION PURCHASE @AUTHOR:MADHUREE-31JULY2020 //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    //
    //alert('sttr_valuation == ' + document.getElementById('sttr_valuation').value);
    if (document.getElementById('sttr_item_model_no').value == '') {
        document.getElementById('sttr_item_model_no').value = document.getElementById('sttr_item_pre_id').value + document.getElementById('sttr_item_id').value;
    }


    if (document.getElementById('sttr_total_lab_charges').value == 'NaN' || document.getElementById('sttr_total_lab_charges').value == '') {
        document.getElementById('sttr_total_lab_charges').value = 0;
    }

    if (document.getElementById('mainUserPanelName').value == 'SupplierPanel' || document.getElementById('mainUserPanelName').value == 'AddStockPanel') {
        if (document.getElementById('sttr_valuation').value > 0) {
            document.getElementById('taxByValMainAmount').value = (parseFloat(document.getElementById('sttr_valuation').value)).toFixed(2);
        }
    }

    if (document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }

    if (document.getElementById('sttr_valuation').value == '' || document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = '';
    }

    // CGST IN % @PRIYANKA-19JUNE2020
    if (document.getElementById('sttr_tot_price_cgst_per').value == '' || document.getElementById('sttr_tot_price_cgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_per').value = '';
    }

    //alert('sttr_tot_price_cgst_per == ' + document.getElementById('sttr_tot_price_cgst_per').value);

    // CALCULATE CGST AMT => (VAL * CGST IN %) / 100 @PRIYANKA-19JUNE2020
    if (document.getElementById('sttr_tot_price_cgst_per').value != '') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
    }

    //alert('sttr_tot_price_cgst_chrg == ' + document.getElementById('sttr_tot_price_cgst_chrg').value);

    // CGST CHRG @PRIYANKA-19JUNE2020
    if (document.getElementById('sttr_tot_price_cgst_chrg').value == '' || document.getElementById('sttr_tot_price_cgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = 0;
    }

    // SGST IN % @PRIYANKA-19JUNE2020
    if (document.getElementById('sttr_tot_price_sgst_per').value == '' || document.getElementById('sttr_tot_price_sgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_per').value = '';
    }

    // CALCULATE SGST AMT => (VAL * SGST IN %) / 100 @PRIYANKA-19JUNE2020
    if (document.getElementById('sttr_tot_price_sgst_per').value != '') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
    }

    // SGST CHRG @PRIYANKA-19JUNE2020
    if (document.getElementById('sttr_tot_price_sgst_chrg').value == '' || document.getElementById('sttr_tot_price_sgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = 0;
    }

    // IGST IN % @PRIYANKA-19JUNE2020
    if (document.getElementById('sttr_tot_price_igst_per').value == '' || document.getElementById('sttr_tot_price_igst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_per').value = '';
    }

    // CALCULATE IGST AMT => (VAL * IGST IN %) / 100 @PRIYANKA-19JUNE2020
    if (document.getElementById('sttr_tot_price_igst_per').value != '') {
        document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
    }

    // IGST CHRG @PRIYANKA-19JUNE2020
    if (document.getElementById('sttr_tot_price_igst_chrg').value == '' || document.getElementById('sttr_tot_price_igst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_chrg').value = 0;
    }
    if (document.getElementById('sttr_tax')) {
        if (document.getElementById('sttr_tax').value == '' || document.getElementById('sttr_tax').value == 'NaN' ||
                document.getElementById('sttr_tax').value == 'undefined') {
            document.getElementById('sttr_tax').value = '';
        }
    }
    // ADDTHIS OMRETAIL FOR GST SEPRATION AND DISPLAY @YUVRAJ 05012023
    if (document.getElementById('gst_tax')) {
        if (document.getElementById('gst_tax').value == '' || document.getElementById('gst_tax').value == 'NaN' ||
                document.getElementById('gst_tax').value == 'undefined') {
            document.getElementById('gst_tax').value = '';
        }
    }
    // CALCULATE TOT TAX AMT => CGST AMT + SGST AMT + IGST AMT @PRIYANKA-19JUNE2020
    // IF ELSE ADDTHIS OMRETAIL FOR GST SEPRATION AND DISPLAY @YUVRAJ 05012023
    if (document.getElementById('tot_tax')) {
        if (document.getElementById('tot_tax').value != '') {
            document.getElementById('tot_tax').value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
                    parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
                    parseFloat(document.getElementById('gst_tax').value) +
                    parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);
        }
    }

    if (document.getElementById('sttr_tot_tax')) {
        if (document.getElementById('sttr_tot_tax').value != '') {
            document.getElementById('sttr_tot_tax').value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
                    parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
                    parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);
        }
    }

    //    if( document.getElementById('tot_tax').value != ''){
    //            document.getElementById('tot_tax').value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
    //            parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
    //            parseFloat(document.getElementById('gst_tax').value) +
    //            parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);
    //    } else if( document.getElementById('sttr_tot_tax').value != ''){ 
    //        document.getElementById('sttr_tot_tax').value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
    //            parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
    //            parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);
    //    }
    if (document.getElementById('sttr_tot_tax')) {
        if (document.getElementById('sttr_tot_tax').value == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
            document.getElementById('sttr_tot_tax').value = 0;
        }
    }
    // ADDTHIS OMRETAIL FOR GST SEPRATION AND DISPLAY @YUVRAJ 05012023
    if (document.getElementById('tot_tax')) {
        if (document.getElementById('tot_tax').value == '' || document.getElementById('tot_tax').value == 'NaN') {
            document.getElementById('tot_tax').value = 0;
        }
    }
    //
    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }

    // CALCULATE TOT TAX AMT @PRIYANKA-19JUNE2020
    if (document.getElementById('sttr_tax')) {
        if (document.getElementById('sttr_tax').value > 0) {
            document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
        }
    }
    // ADDTHIS OMRETAIL FOR GST SEPRATION AND DISPLAY @YUVRAJ 05012023
    if (document.getElementById('gst_tax')) {
        if (document.getElementById('gst_tax').value > 0) {
            document.getElementById('tot_tax').value = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('gst_tax').value) / 100).toFixed(2);
        }
    }
    // CALCULATE FINAL PRICE => PRICE + TOTAL TAX @PRIYANKA-19JUNE2020
    if (document.getElementById('sttr_tot_tax')) {
        if (document.getElementById('sttr_tot_tax').value != '') {
            document.getElementById('sttr_final_valuation').value = (parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
        } else {
            document.getElementById('sttr_final_valuation').value = ((parseFloat(document.getElementById('sttr_valuation').value))).toFixed(2);
        }
    }
    //  // ADDTHIS OMRETAIL FOR GST SEPRATION AND DISPLAY @YUVRAJ 05012023
    if (document.getElementById('tot_tax')) {
        if (document.getElementById('tot_tax').value != '') {
            document.getElementById('sttr_final_valuation').value = (parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(document.getElementById('tot_tax').value)).toFixed(2);
        } else {
            document.getElementById('sttr_final_valuation').value = ((parseFloat(document.getElementById('sttr_valuation').value))).toFixed(2);
        }
    }
    totVal = parseFloat(document.getElementById('sttr_final_valuation').value).toFixed(2);
    if (document.getElementById('addItemCryFinVal').value != '') {
        document.getElementById('sttr_final_valuation').value = (parseFloat(totVal) + parseFloat(document.getElementById('addItemCryFinVal').value)).toFixed(2);
    }
    //        calculateTaxIncludingVal();
    return false;
}
/**********End code to change ID's @Author: PRIYANKA-03-06-17*********/

/**********End code TO UPDATE THE MULTIFICATION OF QTY @Author: GAUR19SEP16*********/
/**********End code to add function to get calc by for labour charges @Author:ANUJA20FEB15*********/
/**********End code to add function to get calc by for labour charges @Author:ANUJA14JAN15*********/

function addAItemFormSubmit() {
    //alert('add_item');
    document.getElementById("add_item").submit();
}
/**********   Start code to Validation of Item    @Author:ANUJA14JAN15*********/
/**********   Start code to Validation of Item    @Author:ANUJA20FEB15*********/
function addAItem() {
    documentRootPath = document.getElementById('documentRootPath').value;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";

    document.getElementById("addItemExItButtDiv").style.visibility = "hidden";
    //    document.getElementById("addItemSimButtDiv").style.visibility = "hidden";
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
        document.getElementById("addItemExItButtDiv").style.visibility = "visible";
        //        document.getElementById("addItemSimButtDiv").style.visibility = "visible";
        return false;
    } else {
        if (itemDateMMM == 'FEB' || itemDateMMM == 'APR' || itemDateMMM == 'JUN' || itemDateMMM == 'SEP' || itemDateMMM == 'NOV') {
            if (itemDateMMM == 'FEB' && itemDateDay > 29 && itemDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + itemDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemExItButtDiv").style.visibility = "visible";
                //                document.getElementById("addItemSimButtDiv").style.visibility = "visible";
                return false;
            }
            if (itemDateMMM == 'FEB' && itemDateDay > 28 && itemDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + itemDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemExItButtDiv").style.visibility = "visible";
                //                document.getElementById("addItemSimButtDiv").style.visibility = "visible";
                return false;
            }
            if (itemDateDay > 30) {
                alert('Please select correct Date, Month ' + itemDateMMM + ' has only max 30 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemExItButtDiv").style.visibility = "visible";
                //                document.getElementById("addItemSimButtDiv").style.visibility = "visible";
                return false;
            }
        }

        if (document.getElementById('payButClickId').value == 'true') {
            var prefix = document.getElementById("prefix").value;
            var payPanelName = document.getElementById("upPanel").value;
            //            if (payPanelName == 'AddPanel') {
            //                document.getElementById("totMetal").value = getMetalDiv;
            //            } else if (payPanelName == 'UpPanel') {
            //                document.getElementById("totMetal").value = document.getElementById("noOfRawMet").value;
            //            }
            //  if (document.getElementById(prefix + 'PayTotAmt').value != 0)
            return true;
        } else {
            if (document.getElementById('stockType').value == 'wholesale') {
                functionName = validateAddAWItemInputs;
            } else {
                functionName = validateAddARItemInputs;
            }
            if (functionName()) {
                if (document.getElementById('mainPanel').value == 'StockPanel') {
                    if (document.getElementById("panelName").value != 'ImitationUpdateStock' && document.getElementById("panelName").value != 'ImitationStockPayUp')
                        callAutoBcPrint();
                    else
                        return true;
                } else {
                    return true;
                }
            }
        }
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("addItemExItButtDiv").style.visibility = "visible";
    //    document.getElementById("addItemSimButtDiv").style.visibility = "visible";
    return false;
}

//********************Start code to add function for strellering silver validations AUTHOR:DIKSHA09OCT2018*************
function addstrItem() {
    documentRootPath = document.getElementById('documentRootPath').value;
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";

    document.getElementById("addItemExItButtDiv").style.visibility = "hidden";
    var itemDateDay = document.getElementById("addItemDOBDay").value;
    var itemDateMMM = document.getElementById("addItemDOBMonth").value;
    var itemDateYY = document.getElementById("addItemDOBYear").value;
    var itemDateStr = document.getElementById("addItemDOBMonth").value + ' ' + document.getElementById("addItemDOBDay").value + ', ' + document.getElementById("addItemDOBYear").value;
    var itemDate = new Date(itemDateStr); // stock Date
    var todayDate = new Date(); // Today Date

    var milliStockDate = itemDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliStockDate;
    if (datesDiff < 0) {
        alert('Please Select the correct Date!');
        document.getElementById("addItemDOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addItemExItButtDiv").style.visibility = "visible";
        return false;
    } else {
        if (itemDateMMM == 'FEB' || itemDateMMM == 'APR' || itemDateMMM == 'JUN' || itemDateMMM == 'SEP' || itemDateMMM == 'NOV') {
            if (itemDateMMM == 'FEB' && itemDateDay > 29 && itemDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + itemDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemExItButtDiv").style.visibility = "visible";
                return false;
            }
            if (itemDateMMM == 'FEB' && itemDateDay > 28 && itemDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + itemDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemExItButtDiv").style.visibility = "visible";
                return false;
            }
            if (itemDateDay > 30) {
                alert('Please select correct Date, Month ' + itemDateMMM + ' has only max 30 days.');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addItemExItButtDiv").style.visibility = "visible";
                return false;
            }
        }
        if (document.getElementById('payButClickId').value == 'true') {
            var prefix = document.getElementById("prefix").value;
            var payPanelName = document.getElementById("upPanel").value;
            return true;
        } else {
            if (document.getElementById('stockType').value == 'wholesale') {
                functionName = validateAddstrItemInputs;
            } else {
                functionName = validateAddstrItemInputs;
            }
            if (functionName()) {
                if (document.getElementById('mainPanel').value == 'StockPanel') {
                    if (document.getElementById("panelName").value != 'StrelleringUpdateStock' && document.getElementById("panelName").value != 'StrelleringStockPayUp')
                        callAutoBcPrint();
                    else
                        return true;
                } else {
                    return true;
                }
            }
        }
    }
    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    document.getElementById("addItemExItButtDiv").style.visibility = "visible";
    return false;
}
//********************END code to add function for strellering silver validations AUTHOR:DIKSHA09OCT2018***************
/*******************Start code Add supplier field  @Author:ANUJA26FEB15***********************/
/*******************Start UPDATE code REMOVE supplier field  @Author:GAUR16SEP16***********************/
/*******************Start code to change ID's @Author:PRIYANKA-05-06-17***********************/
function validateAddARItemInputs() {

    // if (document.getElementById('AddImitationByInv').value == 'AddImitationByInv' && parseFloat(document.getElementById("sttr_quantity").value) > parseFloat(document.getElementById('totalRemQty').value)) {
    //     alert("Qty entered should not more than the remaining Quantity !");
    //     document.getElementById("sttr_quantity").focus();
    //     return false;
    // }

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
    } else if (validateEmptyField(document.getElementById("sttr_item_id").value, "Please enter Item Id!") == false) {
        document.getElementById("sttr_item_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_category").value, "Please enter Item Category!") == false) {
        document.getElementById("sttr_item_category").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please enter Item Name!") == false) {
        document.getElementById("sttr_item_name").focus();
        return false;
    } else if (validateNumWithSpace(document.getElementById("sttr_quantity").value, "Please enter Quantity, Accept only numeric characters!") == false) { // condition add ganesh 8-5-2025
        document.getElementById("sttr_quantity").focus();
        return false;
    } else if (document.getElementById("sttr_quantity").value == 0 && document.getElementById('stockType').value == 'retail') {
        alert("Please enter Item Quantity!");
        document.getElementById("sttr_quantity").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_price").value, "Please enter Price!") == false ||
            validateNumWithDot(document.getElementById("sttr_price").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_price").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_cust_price").value, "Please enter Customer Price!") == false ||
            validateNumWithDot(document.getElementById("sttr_cust_price").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_cust_price").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_final_valuation").value, "Please enter Item Final Valuation!") == false ||
            validateNumWithDot(document.getElementById("sttr_final_valuation").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_final_valuation").focus();
        return false;
    } else
        return true;
}
/*******************End code to change ID's @Author:PRIYANKA-05-06-17***********************/
//********************Start code to add function for strellering silver validations AUTHOR:09OCT2018**************
function validateAddstrItemInputs() {
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
    } else if (validateEmptyField(document.getElementById("sttr_item_id").value, "Please enter Item Id!") == false) {
        document.getElementById("sttr_item_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_category").value, "Please enter Item Category!") == false) {
        document.getElementById("sttr_item_category").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please enter Item Name!") == false) {
        document.getElementById("sttr_item_name").focus();
        return false;
    } else if (validateNumWithSpace(document.getElementById("sttr_quantity").value, "Please enter Item Quantity!") == false) { // condition add ganesh 8-5-2025
        document.getElementById("sttr_quantity").focus();
        return false;
    }
    //    else if (document.getElementById("sttr_quantity").value == 0 && document.getElementById('stockType').value == 'retail') {
    //        alert("Please enter Item Quantity!");
    //        document.getElementById("sttr_quantity").focus();
    //        return false;
    //    }
    else if (validateEmptyField(document.getElementById("sttr_price").value, "Please enter Purchase Rate!") == false ||
            validateNumWithDot(document.getElementById("sttr_price").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_price").focus();
        return false;
    }
    //    else if (validateEmptyField(document.getElementById("sttr_cust_itmcode").value, "Please enter Item Code!") == false) {
    //        document.getElementById("sttr_cust_itmcode").focus();
    //        return false;
    //    } 
    //    else if (validateEmptyField(document.getElementById("sttr_cust_itmnum").value, "Please enter Item Number!") == false) {
    //        document.getElementById("sttr_cust_itmnum").focus();
    //        return false;
    //    }  
    else if (validateEmptyField(document.getElementById("sttr_unit_price").value, "Please enter Unit Purchase Price!") == false ||
            validateNumWithDot(document.getElementById("sttr_unit_price").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_unit_price").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_valuation").value, "Please enter Total Purchase!") == false ||
            validateNumWithDot(document.getElementById("sttr_valuation").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_valuation").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_final_valuation").value, "Please enter Final Purchase Price!") == false ||
            validateNumWithDot(document.getElementById("sttr_final_valuation").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_final_valuation").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_unit_cust_price").value, "Please enter Sell Price!") == false ||
            validateNumWithDot(document.getElementById("sttr_unit_cust_price").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_unit_cust_price").focus();
        return false;
    }
    //    else if (validateEmptyField(document.getElementById("sttr_cust_price").value, "Please enter Customer Price!") == false ||
    //            validateNumWithDot(document.getElementById("sttr_cust_price").value, "Accept only numeric characters without space!") == false) {
    //        document.getElementById("sttr_cust_price").focus();
    //        return false;
    //    }
    else
        return true;
}
//********************END code to add function for strellering silver validations AUTHOR:09OCT2018****************
/*******************Start code to change ID's @Author:PRIYANKA-05-06-17***********************/
function validateAddAWItemInputs() {

    //alert("firmId == " + document.getElementById("firmId").value);

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
    } else if (validateEmptyField(document.getElementById("sttr_item_pre_id").value, "Please enter Item Id!") == false) {
        document.getElementById("sttr_item_pre_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_category").value, "Please enter Item Category!") == false) {
        document.getElementById("sttr_item_category").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please enter Item Name!") == false) {
        document.getElementById("sttr_item_name").focus();
        return false;
    } else if (validateNumWithSpace(document.getElementById("sttr_quantity").value, "Please enter Quantity, Accept only numeric characters!") == false) {
        document.getElementById("sttr_quantity").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_price").value, "Please enter Price!") == false ||
            validateNumWithDot(document.getElementById("sttr_price").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_price").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_cust_price").value, "Please enter Customer Price!") == false ||
            validateNumWithDot(document.getElementById("sttr_cust_price").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_cust_price").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_final_valuation").value, "Please enter Item Final Valuation!") == false ||
            validateNumWithDot(document.getElementById("sttr_final_valuation").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("sttr_final_valuation").focus();
        return false;
    } else
        return true;

}
/*******************End code to change ID's @Author:PRIYANKA-05-06-17***********************/
/*******************End UPDATE code REMOVE supplier field  @Author:GAUR16SEP16***********************/
/**********  End code to Add supplier field   @Author:ANUJA26FEB15*********/
/**********   END code to Validation of Item    @Author:ANUJA20FEB15*********/
/**********   End code to Validation of Item    @Author:ANUJA14JAN15*********/
/**********   ADD code to UPDATE @Author:GAUR03OCT16*********/
function showImitationStockDiv(documentRootPath, sttrId, upPanelName, stockType, invPanelName, utransId, utransUserId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (invPanelName == 'AddImitationByInv') {
                document.getElementById("addStockPanelFormMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
        }
    };
    if (invPanelName == 'AddImitationByInv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijsdv.php?sttrId=" + sttrId + "&invPanel=AddImitationByInv" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType + "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&utransUserId=" + utransUserId, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv.php?sttrId=" + sttrId + "&panelName=ImitationStock" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType + "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&utransUserId=" + utransUserId, true);
    }

    xmlhttp.send();
}
//*********** Start code to add function for update strellering silver AUTHOR: DIKSHA15OCT2018*********/
function showStrelleringStockDiv(documentRootPath, sttrId, upPanelName, stockType, invPanelName, utransId, utransUserId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (invPanelName == 'AddImitationByInv') {
                document.getElementById("addStockPanelFormMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
        }
    };
    if (invPanelName == 'AddImitationByInv') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omijsdv.php?sttrId=" + sttrId + "&invPanel=AddImitationByInv" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType + "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&utransUserId=" + utransUserId, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv.php?sttrId=" + sttrId + "&panelName=StrelleringSilver" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType + "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&utransUserId=" + utransUserId, true);
    }

    xmlhttp.send();
}
//*********** End code to add function for update strellering silver AUTHOR: DIKSHA15OCT2018*********/
/**********END code to UPDATE @Author:GAUR03OCT16*********/
function calcImitationStockBalance(prefix) {
    // document.getElementById(prefix + 'PayTotAmtBal').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) - parseFloat(document.getElementById(prefix + 'PayTotAmtRec').value)).toFixed(2);
    if (document.getElementById(prefix + 'PayCashAmtRec').value != '' || document.getElementById(prefix + 'PayDiscount').value != '') {
        var totalCashPaidAmt = document.getElementById(prefix + 'PayCashAmtRec').value;
        if (totalCashPaidAmt == null || totalCashPaidAmt == '') {
            totalCashPaidAmt = '0.00';
        }
        var totalDiscountAmt = document.getElementById(prefix + 'PayDiscount').value;
        // alert( document.getElementById(prefix + 'PayDiscount').value);
        if (totalDiscountAmt == null || totalDiscountAmt == '' || totalDiscountAmt == 'undefined') {
            totalDiscountAmt = '0.00';
        }

    }

    document.getElementById(prefix + 'PayDiscountDisp').value = parseFloat(totalDiscountAmt).toFixed(2);
    if (document.getElementById(prefix + 'PayDiscountDisp').value == 'undefined' || document.getElementById(prefix + 'PayDiscountDisp').value == 'NaN') {
        document.getElementById(prefix + 'PayDiscountDisp').value = '0.00';
    }


    //    alert(document.getElementById(prefix + 'PayDiscount').value);
    document.getElementById(prefix + 'PayTotAmtBal').value = (parseFloat(document.getElementById(prefix + 'PayTotAmt').value) - parseFloat(totalCashPaidAmt) - parseFloat(totalDiscountAmt)).toFixed(2);
    if (document.getElementById(prefix + 'PayTotAmtBal').value == 'NaN') {
        document.getElementById(prefix + 'PayTotAmtBal').value = document.getElementById(prefix + 'PayTotAmtDisp').value;
    }

    // document.getElementById(prefix + 'PayTotAmtBalDisp').value = document.getElementById(prefix + 'PayTotAmtBal').value;
}

/************START code update function @Author:GAUR03OCT16**********/

function deleteImitationStockList(itstId, sttrId, panelName, mainPanel, pageNo, sellPresent, stockType, itemCategory, documentRootBSlash, utransId, divId) {
    //  alert(divId);
    if (sellPresent > 0) {
        alert('To Delete,First Delete This Item From Customer Purchase Panel!');
        return false;
    } else {

        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");//add variables of alert msgs @AUTHOR: SANDY29JAN14
        if (confirm_box == true) {
            confirm_box = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item from Stock?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
            if (confirm_box == true) {
                var delFromStock = 'delfromstock'; //add variables of to delete from stock: DISH14NOV16
            }
        }
        if (confirm_box == true) {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    if (panelName == 'ItemDetailPanel' || panelName == 'SterlingDetailPanel') {
                        document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
                        window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                    } else if (panelName == 'StockList') {
                        document.getElementById("stockList").innerHTML = xmlhttp.responseText;
                        window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                    } else if (panelName == 'ImitationPurchaseList' || panelName == 'ImitationStockList') {
                        document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                        if (panelName == 'ImitationPurchaseList') {
                            closeMessDiv('messDisplayDiv', 'DELETED');
                        }
                    } else if (panelName == 'StrlleringStockList') { // Code to Add Condition for Sterling Panel @Author:DIKSHA 31DEC2018
                        document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else if (panelName == 'ItemDetailPanel' || panelName == 'SterlingDetailPanel') {
                        document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else if (itstId != '') {
                        document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else if (divId == 'imitationPurchaseList') {
                        document.getElementById("stockListSubDiv").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else if (panelName == 'ItemDelete') {
                        document.getElementById("addStockPanelFormMainDiv").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else if (pageNo == 'SuppPanel' || pageNo == 'addByItems') {
                        document.getElementById("suppPurchaseDivs").innerHTML = xmlhttp.responseText;
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    } else {
                        document.getElementById("paymentDiv").innerHTML = xmlhttp.responseText;
                        window.setTimeout(stockGlobalFunctionToCloseDiv, 1000);
                    }
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            xmlhttp.open("GET", documentRootBSlash + "/include/php/ogijiadel.php?itstId=" + itstId + "&sttrId=" + sttrId + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&pageNo=" + pageNo + "&stockType=" + stockType + "&itemCategory=" + itemCategory + "&delFromStock=" + delFromStock + "&utransId=" + utransId + "&divId=" + divId, true);
            xmlhttp.send();
        }
    }
}
function deleteDTImitationStockList(panelName, sttrId, itstId, mainPanel, pageNo, sellPresent, stockType, itemCategory) {
    //    alert(itstId + '-' + itprId + '-' + panelName);
    if (sellPresent > 0) {
        alert('To Delete,First Delete This Item From Customer Purchase Panel!');
        return false;
    } else {
        confirm_box = confirm(deleteItemAlertMess + "\n\nDo you really want to delete this Item?");//add variables of alert msgs @AUTHOR: SANDY29JAN14
        if (confirm_box == true) {
            confirm_box = confirm(deleteItemAlertMess + "\n\nDo you want to delete this Item from Stock?"); //add variables of alert msgs @AUTHOR: SANDY29JAN14
            if (confirm_box == true) {
                var delFromStock = 'delfromstock'; //add variables of to delete from stock: DISH14NOV16
            }
        }
        if (confirm_box == true) {
            loadXMLDoc();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    //                     if (panelName == 'ImitationPurchaseList' || panelName == 'ImitationStockList') {
                    document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
                    if (panelName == 'ImitationPurchaseList') {
                        closeMessDiv('messDisplayDiv', 'DELETED');
                    }
                    //                    } 
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
                }
            };
            xmlhttp.open("GET", "include/php/ogijiadel.php?itstId=" + itstId + "&sttrId=" + sttrId + "&panelName=" + panelName + "&mainPanel=" + mainPanel + "&pageNo=" + pageNo + "&stockType=" + stockType + "&itemCategory=" + itemCategory + "&delFromStock=" + delFromStock, true);
            xmlhttp.send();
        }
    }
}
/************end code update function @Author:GAUR03OCT16**********/
/************Start code To Add  Validn for BackSpace @Author:PRIYA18AUG13**********/
//function valKeyPressedForNumNDot(evt) {
//    var charCode = (evt.which) ? evt.which : event.keyCode;
//    if (charCode == 46 || charCode == 8) {
//        return true;
//    }
//    else if ((charCode < 48 || charCode > 57)) {
//        return false;
//    }
//    return true;
//}
/************End code To Add  Validn for BackSpace @Author:PRIYA18AUG13**********/
/*************Start code to add function for Imitation item purchase panel @Author:ANUJA15MAR15*********************/
/*************Start update @Author:GAUR19OCT16*********************/
//**********Start code to add crystalPurchase in supplier panel:Author:SANT13JAN17
function searchImitationStockList(documentRootPath, searchColumn, searchValue, selFirmId, div, panel, itemCategory, suppId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'ImitationPurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaprlt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'ImtSuppPurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijpltd.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel + "&suppId=" + suppId, true);
    else if (panel == 'CrySuppPurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijpltd.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'StockList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilsbdv.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'ImtStockList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijistlt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel + "&itemCategory=" + itemCategory, true);
    else if (panel == 'ImitationStockList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijsbdv.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel + "&stockPanel=ImitationStock", true);
    else
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsblt.php?searchColumn="
                + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    xmlhttp.send();
}
function sortImitationStockList(documentRootPath, sortKeyword, selFirmId, div, panel, itemCategory) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'ImitationPurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaprlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'ImtSuppPurchaseList' || panel == 'CrySuppPurchaseList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijpltd.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'StockList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilsbdv.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else if (panel == 'ImtStockList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijistlt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel + "&stockPanel=ImitationStock" + "&itemCategory=" + itemCategory, true);
    else if (panel == 'ImitationStockList')
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijsbdv.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel + "&stockPanel=ImitationStock", true);
    else if (panel == 'UdhaarEMIList')
        xmlhttp.open("POST", documentRootPath + "/include/php/omuemilt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    else
        xmlhttp.open("POST", documentRootPath + "/include/php/ogspsblt.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&panel=" + panel, true);
    xmlhttp.send();
}
//**********End code to add crystalPurchase in supplier panel:Author:SANT13JAN17
/*************Start update @Author:GAUR19OCT16*********************/
/*************End code to add function for item purchase panel @Author:ANUJA15MAR15*********************/
/***************Start cdoe to add panel @Author:PRIYA08OCT14*************/
/***************Start update @Author:GAUR19OCT16*************/
//**********Start code to add crystalPurchase in supplier panel:Author:SANT13JAN17
//**********Start code to IMITATION PURCHASELIST IN ADD STOCK PANEL:Author:ATHU2JUN17
function showImitationStockPanel(panel, listType) {
    //alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'Imitation' || panel == 'ImitationList' || panel == 'ImitationListWithStone' || panel == 'ImitationTagList')
                document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;  //change in div name @AUTHOR: SANDY25SEP13
            //            else
            //                document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'Imitation')
        xmlhttp.open("POST", "include/php/ompurchase.php?panelName=" + panel + "&listType=" + listType, true);//Added by @auth:athu2jun17
    else if (panel == 'ImtSuppPurchaseList')
        xmlhttp.open("POST", "include/php/ogijpltd.php?panel=" + panel, true);
    else if (panel == 'ImitationList') {
        //alert(panel);
        xmlhttp.open("POST", "include/php/ompurchaselist.php?panelName=" + panel + "&listType=" + listType, true);
    } else if (panel == 'ImitationTagList') {
        xmlhttp.open("POST", "include/php/ompurchaselist.php?panelName=" + panel + "&listType=" + listType, true);
    } else if (panel == 'ImitationListWithStone') {
        xmlhttp.open("POST", "include/php/ompurchaselist.php?panelName=" + panel + "&listType=" + listType, true);
    } else if (panel == 'CrySuppPurchaseList')
        xmlhttp.open("POST", "include/php/ogijpltd.php?panel=" + panel, true);
    else if (panel == 'StockDeletedList')
        xmlhttp.open("POST", "include/php/ogwaprdlt.php?panel=" + panel, true);
    else
        xmlhttp.open("POST", "include/php/ogijsdv.php?panel=" + panel, true);
    xmlhttp.send();
}
//**********End code to add crystalPurchase in supplier panel:Author:SANT13JAN17
/***************End update @Author:GAUR19OCT16*************/
/***************End cdoe to add panel @Author:PRIYA08OCT14*************/
//
function showLotToTagReport(panel, stockTransType, panelName1) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panel == 'stockLotTotaglist' || panel == 'stockImiLotTotaglist')
                document.getElementById("stockLotTotag").innerHTML = xmlhttp.responseText;  //change in div name @AUTHOR: SANDY25SEP13
            //            else
            //                document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (panel == 'stockImiLotTotaglist') {
        xmlhttp.open("POST", "omimiLotTotagdatatable.php?panel=" + panel + "&stockTransType=" + stockTransType + "&panelName1=" + panelName1, true);
        xmlhttp.send();
    } else {
        xmlhttp.open("POST", "omLotTotagdatatable.php?panel=" + panel + "&stockTransType=" + stockTransType + "&panelName1=" + panelName1, true);
        xmlhttp.send();
    }
}
//
/***************START cdoe UPDATE @Author:GAUR19OCT16*************/
function showImitationNoOfRows(documentRootPath, rowsPerPage, pageNum, upRowsPanel, nwOrPanel, custId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (upRowsPanel == 'NwOrUpdateRows') {
                document.getElementById("ajaxLoadNextItemList").style.visibility = "hidden";
                document.getElementById("ajaxLoadNextItemListButt").style.visibility = "visible";
            }
            if (upRowsPanel == 'NwOrUpdateRows') {
                document.getElementById("newOrderStatus").innerHTML = xmlhttp.responseText;
            } else if (upRowsPanel == 'rawStockList') {
                document.getElementById("rawMetalStockListDiv").innerHTML = xmlhttp.responseText;
            } else if (upRowsPanel == 'JewelleryPanel') {
                document.getElementById("jewellerySubPanel").innerHTML = xmlhttp.responseText;
            } else if (nwOrPanel == 'ImitationPurchaseList') {
                document.getElementById("stockPanelSubDiv").innerHTML = xmlhttp.responseText;
            } else if (nwOrPanel == 'ImtSuppPurchaseList' || nwOrPanel == 'CrySuppPurchaseList') {
                document.getElementById("stockPanelPurchaseList").innerHTML = xmlhttp.responseText;
            } else if (upRowsPanel == 'UdhaarUpdateRows') {
                document.getElementById("udhaarDetPanel").innerHTML = xmlhttp.responseText;
            } else if (nwOrPanel == 'AdvanceMoney') {
                document.getElementById("advMoneyList").innerHTML = xmlhttp.responseText;
            } else if (upRowsPanel == 'AcitUpdateRows') {
                document.getElementById("acitListDiv").innerHTML = xmlhttp.responseText;
            } else if (upRowsPanel == 'AvailStockUpdateRows' || upRowsPanel == 'SoldStockUpdateRows' || upRowsPanel == 'MainStockUpdateRows') {
                document.getElementById("stockListSubDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("stockList").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("ajaxLoadNextItemList").style.visibility = "visible";
            document.getElementById("ajaxLoadNextItemListButt").style.visibility = "hidden";
        }
    };
    if (upRowsPanel == 'NwOrUpdateRows') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ognostlt.php?rowsPerPage=" + rowsPerPage + "&page=" + pageNum + "&upRows=" + upRowsPanel + "&panelName=" + nwOrPanel + "&custId=" + custId, true);
    } else if (upRowsPanel == 'rawStockList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrmlist.php?rowsPerPage=" + rowsPerPage + "&page=" + pageNum + "&panel=" + upRowsPanel + "&listPanel=" + nwOrPanel, true);
    } else if (upRowsPanel == 'JewelleryPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilimsd.php?rowsPerPage=" + rowsPerPage + "&panel=" + upRowsPanel, true);
    } else if (nwOrPanel == 'ImitationPurchaseList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaprlt.php?rowsPerPage=" + rowsPerPage + "&panel=" + nwOrPanel + "&stockUpdateRows=" + upRowsPanel, true);
    } else if (nwOrPanel == 'ImtSuppPurchaseList' || nwOrPanel == 'CrySuppPurchaseList') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijpltd.php?rowsPerPage=" + rowsPerPage + "&panel=" + nwOrPanel + "&stockUpdateRows=" + upRowsPanel + "&custId=" + custId, true);
    } else if (upRowsPanel == 'UdhaarUpdateRows') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omuupnal.php?rowsPerPage=" + rowsPerPage + "&udhaarUpdateRows=" + upRowsPanel + "&panelName=" + nwOrPanel, true);
    } else if (nwOrPanel == 'AdvanceMoney') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omadmnlt.php?rowsPerPage=" + rowsPerPage + "&updateRows=" + upRowsPanel + "&panelName=" + nwOrPanel, true);
    } else if (upRowsPanel == 'AcitUpdateRows') {
        xmlhttp.open("POST", documentRootPath + "/include/php/omaiatlt.php?rowsPerPage=" + rowsPerPage + "&updateRows=" + upRowsPanel + "&panelName=" + nwOrPanel, true);
    } else if (upRowsPanel == 'AvailStockUpdateRows') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogisavlt.php?rowsPerPage=" + rowsPerPage + "&updateRows=" + upRowsPanel + "&metalType=" + nwOrPanel + "&itemName=" + custId, true);
    } else if (upRowsPanel == 'SoldStockUpdateRows') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogissolt.php?rowsPerPage=" + rowsPerPage + "&updateRows=" + upRowsPanel + "&metalType=" + nwOrPanel + "&itemName=" + custId, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogilmndv.php?rowsPerPage=" + rowsPerPage + "&page=" + pageNum + "&stockUpdateRows=" + upRowsPanel, true);
    }
    xmlhttp.send();
}
/***************END cdoe UPDATE @Author:GAUR19OCT16*************/

//START update function @Author:GAUR03OCT16
function showImitationStockDetailsDiv(itprId, stockType, panelName, documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (panelName == 'RawDetUpPanel') {
                document.getElementById("rawMetalAddDiv").innerHTML = xmlhttp.responseText;
            } else if (panelName == 'addByItems') {
                document.getElementById("suppPurchaseDivs").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
        }
    };
    if (panelName == 'RawDetUpPanel') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogrwiadv.php?rwprId=" + itprId + "&panelName=RawStock" + "&rawPanelName=" + panelName, true);
    } else if (panelName == 'addByItems') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogwprinv.php?itprId=" + itprId + "&itemMainPanel=" + panelName + "&itemSubPanel=itemsAddUp", true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv.php?itprId=" + itprId + "&panelName=ImitationStock&updatePanelName=" + panelName + "&stockType=" + stockType, true);
    }
    xmlhttp.send();
}
//END update function @Author:GAUR03OCT16
//start to update code @Author:GAUR19OCT16
function showImitationSelectPage(pageNo, panel, rowsPerPage, noOfPagesAsLink, selFirmId, sortKeyword, searchColumn, searchValue, div, custId) {
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
        if (panel == 'soldOutList' || panel == 'returnedList') {
            xmlhttp.open("POST", "include/php/ogspsldt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'StockList') {
            xmlhttp.open("POST", "include/php/ogilsbdv.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'ImitationPurchaseList') {
            xmlhttp.open("POST", "include/php/ogijaprlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'ImtSuppPurchaseList') {
            xmlhttp.open("POST", "include/php/ogijpltd.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'ItemSoldInvoice') {
            xmlhttp.open("POST", "include/php/ogspsblt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'StockPanel') {
            xmlhttp.open("POST", "include/php/ogismnlt.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel, true);
        } else if (panel == 'CrySuppPurchaseList') {
            xmlhttp.open("POST", "include/php/ogijpltd.php?page=" + pageNo + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&searchValue=" + searchValue +
                    "&panel=" + panel + "&custId=" + custId, true);
        }
        xmlhttp.send();
    }
}
//end to update code @Author:GAUR19OCT16
/***********Start Code To Add Func For Add Sell Iteem Calcn @Author:ANUJA31JAN15***********/
/************Start code to change value added option @Author:ANUJA31JAN15***************/
/************Start code to UPDATE CODE @Author:GAUR19SEP16***************/
function calculateImitationSellPriceTaxByVal() {

    var itemsQTY = parseInt(document.getElementById('slPrItemPieces').value);

    //alert('itemsQTY ==' + document.getElementById('slPrItemPieces').value);

    if (itemsQTY == '' || itemsQTY == null || itemsQTY == '0') {
        itemsQTY = 1;
    }

    if (document.getElementById("sttr_taxincl_checked").checked == true) {

        if (document.getElementById('slPrItemPriMkgIgstPer').value != '0' && document.getElementById('slPrItemPriMkgIgstPer').value != '') {

            document.getElementById('slPrItemPriceQty').value = (((100 * parseFloat(document.getElementById('slPrItemCharges').value)) / (100 + parseFloat(document.getElementById('slPrItemPriMkgIgstPer').value))) * (parseFloat(itemsQTY))).toFixed(2);

            //alert('slPrItemPriceQty ==' +  document.getElementById('slPrItemPriceQty').value);
            //document.getElementById('slPrItemCharges').value = document.getElementById('slPrItemPriceQty').value;

        } else {

            //alert('slPrItemCharges == ' + document.getElementById('slPrItemCharges').value);
            //alert('slPrItemPriMkgCgstPer == ' + document.getElementById('slPrItemPriMkgCgstPer').value);
            //alert('itemsQTY == ' + itemsQTY);

            document.getElementById('slPrItemPriceQty').value = (((100 * parseFloat(document.getElementById('slPrItemCharges').value)) / (100 + parseFloat(document.getElementById('slPrItemPriMkgCgstPer').value) * 2)) * (parseFloat(itemsQTY))).toFixed(2);

            //alert('slPrItemPriceQty ==' +  document.getElementById('slPrItemPriceQty').value);            
            //document.getElementById('slPrItemCharges').value = document.getElementById('slPrItemPriceQty').value;
        }

        document.getElementById('slPrItemValuation').value = ((parseFloat(document.getElementById('slPrItemPriceQty').value) + parseFloat(document.getElementById('slPrItemQtyMkgCharges').value))).toFixed(2);

        //alert('slPrItemValuation ==' +  document.getElementById('slPrItemValuation').value);
    }

    if (document.getElementById("sttr_taxincl_checked").checked == false) {

        document.getElementById('slPrItemPriceQty').value = ((parseFloat(document.getElementById('slPrItemFinalVal').value))).toFixed(2);

        //document.getElementById('slPrItemCharges').value = document.getElementById('slPrItemPriceQty').value;
        //alert('slPrItemPriceQty ==' +  document.getElementById('slPrItemPriceQty').value);

        document.getElementById('slPrItemValuation').value = ((parseFloat(document.getElementById('slPrItemPriceQty').value)) + parseFloat(document.getElementById('slPrItemQtyMkgCharges').value)).toFixed(2);

        //alert('slPrItemValuation **==' +  document.getElementById('slPrItemValuation').value);

        document.getElementById('slPrItemQtyMkgCharges').value = ((parseFloat(document.getElementById('slPrItemMkgCharges').value))) * (parseFloat(itemsQTY)).toFixed(2);

    }

    if (document.getElementById('slPrItemPriceQty').value == 'NaN') {
        document.getElementById('slPrItemPriceQty').value = 0;
    }

    if (document.getElementById('slPrItemValuation').value == 'NaN') {
        document.getElementById('slPrItemValuation').value = 0;
    }

    //calculate CGST for QTY * MKG CHRG
    if (document.getElementById('slPrItemQtyMkgCgstPer').value != '') {
        document.getElementById('slPrItemMkgCgstChrg').value = (parseFloat(document.getElementById('slPrItemQtyMkgCharges').value) * (parseFloat(document.getElementById('slPrItemQtyMkgCgstPer').value) / 100)).toFixed(2);
    }
    //calculate SGST for QTY * MKG CHRG
    if (document.getElementById('slPrItemMkgSgstPer').value != '') {
        document.getElementById('slPrItemMkgSgstChrg').value = (parseFloat(document.getElementById('slPrItemQtyMkgCharges').value) * (parseFloat(document.getElementById('slPrItemMkgSgstPer').value) / 100)).toFixed(2);
    }
    //calculate IGST for QTY * MKG CHRG
    if (document.getElementById('slPrItemMkgIgstPer').value != '') {
        document.getElementById('slPrItemMkgIgstChrg').value = (parseFloat(document.getElementById('slPrItemQtyMkgCharges').value) * (parseFloat(document.getElementById('slPrItemMkgIgstPer').value) / 100)).toFixed(2);
    }

    //calculate CGST for QTY * PRICE
    if (document.getElementById('slPrItemPriMkgCgstPer').value != '') {
        document.getElementById('slPrItemPriMkgCgstChrg').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) * (parseFloat(document.getElementById('slPrItemPriMkgCgstPer').value) / 100)).toFixed(2);
    }

    if (document.getElementById('slPrItemPriMkgCgstChrg').value == 'NaN') {
        document.getElementById('slPrItemPriMkgCgstChrg').value = 0;
    }

    //calculate SGST for QTY * PRICE
    if (document.getElementById('slPrItemPriMkgSgstPer').value != '') {
        document.getElementById('slPrItemPriMkgSgstChrg').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) * (parseFloat(document.getElementById('slPrItemPriMkgSgstPer').value) / 100)).toFixed(2);
    }

    if (document.getElementById('slPrItemPriMkgSgstChrg').value == 'NaN') {
        document.getElementById('slPrItemPriMkgSgstChrg').value = 0;
    }

    //calculate IGST for QTY * PRICE
    if (document.getElementById('slPrItemPriMkgIgstPer').value != '') {
        document.getElementById('slPrItemPriMkgIgstChrg').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) * (parseFloat(document.getElementById('slPrItemPriMkgIgstPer').value) / 100)).toFixed(2);
    }

    if (document.getElementById('slPrItemPriMkgIgstChrg').value == 'NaN') {
        document.getElementById('slPrItemPriMkgIgstChrg').value = 0;
    }

    //Calculate Total Item Tax cgst+sgst+igst
    document.getElementById('slPrItemTotTax').value = (parseFloat(document.getElementById('slPrItemMkgCgstChrg').value) +
            parseFloat(document.getElementById('slPrItemMkgSgstChrg').value) +
            parseFloat(document.getElementById('slPrItemMkgIgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgCgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgSgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgIgstChrg').value));

    var slPrItemFinalVal = (parseFloat(document.getElementById('slPrItemValuation').value)) + (parseFloat(document.getElementById('slPrItemTotTax').value));
    document.getElementById('slPrItemFinalVal').value = Math_round(slPrItemFinalVal);

    if (document.getElementById('slPrItemFinalVal').value == 'NaN') {
        document.getElementById('slPrItemFinalVal').value = 0;
    }

    return false;
}

function calculateImitationSellPrice() {


    var itemsQTY = parseInt(document.getElementById('slPrItemPieces').value);
    var totVal = 0;
    if (itemsQTY == '' || itemsQTY == null) {
        itemsQTY = 1;
    }

    document.getElementById('sttr_total_lab_charges').value = parseFloat(parseFloat(document.getElementById('slPrItemMkgCharges').value) * parseFloat(itemsQTY)).toFixed(2);
    document.getElementById('slPrItemValuation').value = ((parseFloat(document.getElementById('slPrItemCharges').value) + parseFloat(document.getElementById('slPrItemMkgCharges').value))) * (parseFloat(itemsQTY)).toFixed(2);

    document.getElementById('slPrItemQtyMkgCharges').value = ((parseFloat(document.getElementById('slPrItemMkgCharges').value))) * (parseFloat(itemsQTY)).toFixed(2);
    document.getElementById('slPrItemPriceQty').value = ((parseFloat(document.getElementById('slPrItemCharges').value))) * (parseFloat(itemsQTY)).toFixed(2);

    document.getElementById('sttr_metal_amt').value = ((parseFloat(document.getElementById('slPrItemCharges').value))) * (parseFloat(itemsQTY)).toFixed(2);

    // ADDED CODE FOR DISCOUNT FUNCTIONALITY @PRIYANKA-30NOV2020
    if (document.getElementById('sttr_itm_disc_type').value == 'AMT') {
        //
        var metalDiscountAmt = parseFloat(document.getElementById('sttr_itm_disc_amt').value);
        //
    } else {
        //
        // METAL DISCOUNT IN % @PRIYANKA-30NOV2020
        var sttr_metal_discount_per = document.getElementById('sttr_metal_discount_per').value;
        //
        // CALCULATE METAL DISCOUNT AMT @PRIYANKA-30NOV2020
        var metalDiscountAmt = Math_round(parseFloat(document.getElementById('sttr_metal_amt').value) * parseFloat(sttr_metal_discount_per) / 100).toFixed(2);
        //
    }
    //
    // METAL DISCOUNT AMT @PRIYANKA-30NOV2020
    document.getElementById('sttr_metal_discount_amt').value = Math_round(parseFloat(metalDiscountAmt)).toFixed(2);
    //
    if (document.getElementById('sttr_metal_discount_amt').value == 'NaN') {
        document.getElementById('sttr_metal_discount_amt').value = 0;
    }
    //
    // AMOUNTS AFTER DISCOUNT @PRIYANKA-30NOV2020
    if (metalDiscountAmt > 0) {
        var stockTotalVal = parseFloat(document.getElementById('sttr_metal_amt').value).toFixed(2);
        document.getElementById('slPrItemValuation').value = (Math_round((parseFloat(stockTotalVal) + parseFloat(document.getElementById('slPrItemMkgCharges').value)) - parseFloat(metalDiscountAmt))).toFixed(2);
        document.getElementById('slPrItemPriceQty').value = (Math_round(parseFloat(stockTotalVal) - parseFloat(metalDiscountAmt))).toFixed(2);
    }
    //
    //
    if (document.getElementById('sttr_metal_amt').value == 'NaN') {
        document.getElementById('sttr_metal_amt').value = 0;
    }

    if (document.getElementById('slPrItemQtyMkgCharges').value == 'NaN') {
        document.getElementById('slPrItemQtyMkgCharges').value = 0;
    }
    if (document.getElementById('slPrItemPriceQty').value == 'NaN') {
        document.getElementById('slPrItemPriceQty').value = 0;
    }

    //calculate CGST for QTY * MKG CHRG
    if (document.getElementById('slPrItemQtyMkgCgstPer').value != '') {
        document.getElementById('slPrItemMkgCgstChrg').value = (parseFloat(document.getElementById('slPrItemQtyMkgCharges').value) * (parseFloat(document.getElementById('slPrItemQtyMkgCgstPer').value) / 100)).toFixed(2);
    }
    //calculate SGST for QTY * MKG CHRG
    if (document.getElementById('slPrItemMkgSgstPer').value != '') {
        document.getElementById('slPrItemMkgSgstChrg').value = (parseFloat(document.getElementById('slPrItemQtyMkgCharges').value) * (parseFloat(document.getElementById('slPrItemMkgSgstPer').value) / 100)).toFixed(2);
    }
    //calculate IGST for QTY * MKG CHRG
    if (document.getElementById('slPrItemMkgIgstPer').value != '') {
        document.getElementById('slPrItemMkgIgstChrg').value = (parseFloat(document.getElementById('slPrItemQtyMkgCharges').value) * (parseFloat(document.getElementById('slPrItemMkgIgstPer').value) / 100)).toFixed(2);
    }

    //calculate CGST for QTY * PRICE
    if (document.getElementById('slPrItemPriMkgCgstPer').value != '') {
        document.getElementById('slPrItemPriMkgCgstChrg').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) * (parseFloat(document.getElementById('slPrItemPriMkgCgstPer').value) / 100)).toFixed(2);
    }
    //calculate SGST for QTY * PRICE
    if (document.getElementById('slPrItemPriMkgSgstPer').value != '') {
        document.getElementById('slPrItemPriMkgSgstChrg').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) * (parseFloat(document.getElementById('slPrItemPriMkgSgstPer').value) / 100)).toFixed(2);
    }
    //calculate IGST for QTY * PRICE
    if (document.getElementById('slPrItemPriMkgIgstPer').value != '') {
        document.getElementById('slPrItemPriMkgIgstChrg').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) * (parseFloat(document.getElementById('slPrItemPriMkgIgstPer').value) / 100)).toFixed(2);
    }

    if (document.getElementById('slPrItemMkgCgstChrg').value == '') {
        document.getElementById('slPrItemMkgCgstChrg').value = 0;
    }
    if (document.getElementById('slPrItemMkgSgstChrg').value == '') {
        document.getElementById('slPrItemMkgSgstChrg').value = 0;
    }
    if (document.getElementById('slPrItemMkgIgstChrg').value == '') {
        document.getElementById('slPrItemMkgIgstChrg').value = 0;
    }
    if (document.getElementById('slPrItemPriMkgCgstChrg').value == '') {
        document.getElementById('slPrItemPriMkgCgstChrg').value = 0;
    }
    if (document.getElementById('slPrItemPriMkgSgstChrg').value == '') {
        document.getElementById('slPrItemPriMkgSgstChrg').value = 0;
    }
    if (document.getElementById('slPrItemPriMkgIgstChrg').value == '') {
        document.getElementById('slPrItemPriMkgIgstChrg').value = 0;
    }

    //Calculate Total Item Tax cgst+sgst+igst
    document.getElementById('slPrItemTotTax').value = (parseFloat(document.getElementById('slPrItemMkgCgstChrg').value) +
            parseFloat(document.getElementById('slPrItemMkgSgstChrg').value) +
            parseFloat(document.getElementById('slPrItemMkgIgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgCgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgSgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgIgstChrg').value));

    var slPrItemFinalVal = (parseFloat(document.getElementById('slPrItemValuation').value)) + (parseFloat(document.getElementById('slPrItemTotTax').value));
    document.getElementById('slPrItemFinalVal').value = Math_round(slPrItemFinalVal);


    if (document.getElementById('slPrItemValuation').value == '' || document.getElementById('slPrItemValuation').value == 'NaN') {
        document.getElementById('slPrItemValuation').value = 0;
    }

    if (document.getElementById('slPrItemFinalVal').value == 'NaN') {
        document.getElementById('slPrItemFinalVal').value = 0;
    }
    totVal = parseFloat(document.getElementById('slPrItemFinalVal').value).toFixed(2);
    //       alert('totVal==>'+totVal);
    if (document.getElementById('addItemCryFinVal')) {
        if (document.getElementById('addItemCryFinVal').value != '') {
            document.getElementById('slPrItemFinalVal').value = (parseFloat(totVal) + parseFloat(document.getElementById('addItemCryFinVal').value)).toFixed(2);
        }
    }
    calculateImitationSellPriceTaxByValB2();
    return false;

}


function calcTotalTaxByImitationTotalPrice() {

    if (document.getElementById('slPrItemValuation').value == 'NaN' || document.getElementById('slPrItemValuation').value == '') {
        document.getElementById('slPrItemValuation').value = 0;
    }

    if (document.getElementById('sttr_tax').value > 0) {

        var totalTax = parseFloat(parseFloat(document.getElementById('slPrItemValuation').value) * parseFloat(document.getElementById('sttr_tax').value) / 100).toFixed(2);

        if (totalTax == 'NaN' || totalTax == '') {
            totalTax = 0;
        }

        document.getElementById('slPrItemTotTax').value = parseFloat(totalTax);

        if (document.getElementById('slPrItemTotTax').value == 'NaN') {
            document.getElementById('slPrItemTotTax').value = 0;
        }

        document.getElementById('slPrItemFinalVal').value = parseFloat(parseFloat(document.getElementById('slPrItemTotTax').value) + parseFloat(document.getElementById('slPrItemValuation').value)).toFixed(2);

    } else {
        document.getElementById('slPrItemFinalVal').value = parseFloat(document.getElementById('slPrItemValuation').value).toFixed(2);
    }

    if (document.getElementById('slPrItemFinalVal').value == 'NaN') {
        document.getElementById('slPrItemFinalVal').value = 0;
    }
}


//*************Start code to add Function for strellring silver AUTHOR:DIKSHA 22OCT2018********
function calculateStrelleringSellPrice() {
    var itemsQTY = parseInt(document.getElementById('slPrItemPieces').value);
    var itemsGSWT = parseFloat(document.getElementById('slPrItemGSW').value).toFixed(2);
    if (itemsQTY == '' || itemsQTY == null) {
        itemsQTY = 1;
    }

    document.getElementById('slPrItemQtyMkgCharges').value = ((parseFloat(document.getElementById('slPrItemMkgCharges').value))) * (parseFloat(itemsQTY)).toFixed(2);
    //
    if ((document.getElementById('addItemCalType').value == 'QTY')) {
        if (document.getElementById('slPrItemPieces').value > 0) {
            document.getElementById('slPrItemPriceQty').value = ((parseFloat(document.getElementById('slPrItemCharges').value))) * (parseFloat(itemsQTY)).toFixed(2);
            //        document.getElementById('slPrItemValuation').value = ((parseFloat(document.getElementById('slPrItemCharges').value) + parseFloat(document.getElementById('slPrItemMkgCharges').value))) * (parseFloat(itemsQTY)).toFixed(2);
            document.getElementById('slPrItemValuation').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) + parseFloat(document.getElementById('slPrItemQtyMkgCharges').value)).toFixed(2);
        }
    } else if ((document.getElementById('addItemCalType').value == 'GSWT')) {
        //         alert(addItemCalType);
        if (document.getElementById('slPrItemGSW').value > 0) {
            if (document.getElementById('slPrItemGSWT').value == 'GM') {
                document.getElementById('slPrItemPriceQty').value = ((parseFloat(itemsGSWT)) * (parseFloat(document.getElementById('slPrItemCharges').value))).toFixed(2);
                //                document.getElementById('slPrItemValuation').value = ((parseFloat(document.getElementById('slPrItemPriceQty').value) + parseFloat(document.getElementById('slPrItemMkgCharges').value))* (parseFloat(itemsQTY))).toFixed(2);
                document.getElementById('slPrItemValuation').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) + parseFloat(document.getElementById('slPrItemQtyMkgCharges').value)).toFixed(2);
            } else if (document.getElementById('slPrItemGSWT').value == 'KG') {
                document.getElementById('slPrItemPriceQty').value = ((parseFloat(document.getElementById('slPrItemGSW').value)) * (parseFloat(document.getElementById('slPrItemCharges').value))).toFixed(2);
            } else if (document.getElementById('slPrItemGSWT').value == 'MG') {
                document.getElementById('slPrItemPriceQty').value = ((parseFloat(document.getElementById('slPrItemGSW').value)) * (parseFloat(document.getElementById('slPrItemCharges').value))).toFixed(2);
            }
        }
    }
    //    document.getElementById('sttr_total_lab_charges').value = parseFloat(parseFloat(document.getElementById('slPrItemMkgCharges').value) * parseFloat(itemsQTY)).toFixed(2);
    //    document.getElementById('slPrItemValuation').value = ((parseFloat(document.getElementById('slPrItemCharges').value) + parseFloat(document.getElementById('slPrItemMkgCharges').value))) * (parseFloat(itemsQTY)).toFixed(2);
    //      document.getElementById('slPrItemValuation').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) + parseFloat(document.getElementById('slPrItemQtyMkgCharges').value)).toFixed(2);
    //    document.getElementById('slPrItemQtyMkgCharges').value = ((parseFloat(document.getElementById('slPrItemMkgCharges').value))) * (parseFloat(itemsQTY)).toFixed(2);
    //    document.getElementById('slPrItemPriceQty').value = ((parseFloat(document.getElementById('slPrItemCharges').value))) * (parseFloat(itemsQTY)).toFixed(2);

    //making charges calculations
    if (document.getElementById('slPrItemMkgChargesType').value == 'PP') {
        document.getElementById('slPrItemQtyMkgCharges').value = ((parseFloat(document.getElementById('slPrItemMkgCharges').value))) * (parseFloat(itemsQTY)).toFixed(2);
    } else if (document.getElementById('slPrItemMkgChargesType').value == 'GM') {
        document.getElementById('slPrItemQtyMkgCharges').value = ((parseFloat(document.getElementById('slPrItemMkgCharges').value))) * (parseFloat(itemsGSWT)).toFixed(2);
    }

    if (document.getElementById('slPrItemQtyMkgCharges').value == 'NaN') {
        document.getElementById('slPrItemQtyMkgCharges').value = 0;
    }
    if (document.getElementById('slPrItemPriceQty').value == 'NaN') {
        document.getElementById('slPrItemPriceQty').value = 0;
    }
    //calculate CGST for QTY * MKG CHRG
    if (document.getElementById('slPrItemQtyMkgCgstPer').value != '') {
        document.getElementById('slPrItemMkgCgstChrg').value = (parseFloat(document.getElementById('slPrItemQtyMkgCharges').value) * (parseFloat(document.getElementById('slPrItemQtyMkgCgstPer').value) / 100)).toFixed(2);
    }
    //calculate SGST for QTY * MKG CHRG
    if (document.getElementById('slPrItemMkgSgstPer').value != '') {
        document.getElementById('slPrItemMkgSgstChrg').value = (parseFloat(document.getElementById('slPrItemQtyMkgCharges').value) * (parseFloat(document.getElementById('slPrItemMkgSgstPer').value) / 100)).toFixed(2);
    }
    //calculate IGST for QTY * MKG CHRG
    if (document.getElementById('slPrItemMkgIgstPer').value != '') {
        document.getElementById('slPrItemMkgIgstChrg').value = (parseFloat(document.getElementById('slPrItemQtyMkgCharges').value) * (parseFloat(document.getElementById('slPrItemMkgIgstPer').value) / 100)).toFixed(2);
    }
    //calculate CGST for QTY * PRICE
    if (document.getElementById('slPrItemPriMkgCgstPer').value != '') {
        document.getElementById('slPrItemPriMkgCgstChrg').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) * (parseFloat(document.getElementById('slPrItemPriMkgCgstPer').value) / 100)).toFixed(2);
    }
    //calculate SGST for QTY * PRICE
    if (document.getElementById('slPrItemPriMkgSgstPer').value != '') {
        document.getElementById('slPrItemPriMkgSgstChrg').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) * (parseFloat(document.getElementById('slPrItemPriMkgSgstPer').value) / 100)).toFixed(2);
    }
    //calculate IGST for QTY * PRICE
    if (document.getElementById('slPrItemPriMkgIgstPer').value != '') {
        document.getElementById('slPrItemPriMkgIgstChrg').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) * (parseFloat(document.getElementById('slPrItemPriMkgIgstPer').value) / 100)).toFixed(2);
    }
    if (document.getElementById('slPrItemMkgCgstChrg').value == '' ||
            document.getElementById('slPrItemMkgCgstChrg').value == 'NaN') {
        document.getElementById('slPrItemMkgCgstChrg').value = 0;
    }
    if (document.getElementById('slPrItemMkgSgstChrg').value == '' ||
            document.getElementById('slPrItemMkgSgstChrg').value == 'NaN') {
        document.getElementById('slPrItemMkgSgstChrg').value = 0;
    }
    if (document.getElementById('slPrItemMkgIgstChrg').value == '' ||
            document.getElementById('slPrItemMkgIgstChrg').value == 'NaN') {
        document.getElementById('slPrItemMkgIgstChrg').value = 0;
    }
    if (document.getElementById('slPrItemPriMkgCgstChrg').value == '' ||
            document.getElementById('slPrItemPriMkgCgstChrg').value == 'NaN') {
        document.getElementById('slPrItemPriMkgCgstChrg').value = 0;
    }
    if (document.getElementById('slPrItemPriMkgSgstChrg').value == '' ||
            document.getElementById('slPrItemPriMkgSgstChrg').value == 'NaN') {
        document.getElementById('slPrItemPriMkgSgstChrg').value = 0;
    }
    if (document.getElementById('slPrItemPriMkgIgstChrg').value == '' ||
            document.getElementById('slPrItemPriMkgIgstChrg').value == 'NaN') {
        document.getElementById('slPrItemPriMkgIgstChrg').value = 0;
    }
    document.getElementById('slPrItemTotTax').value = (parseFloat(document.getElementById('slPrItemMkgCgstChrg').value) +
            parseFloat(document.getElementById('slPrItemMkgSgstChrg').value) +
            parseFloat(document.getElementById('slPrItemMkgIgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgCgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgSgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgIgstChrg').value));
    var slPrItemFinalVal = (parseFloat(document.getElementById('slPrItemValuation').value)) + (parseFloat(document.getElementById('slPrItemTotTax').value));
    document.getElementById('slPrItemFinalVal').value = Math_round(slPrItemFinalVal);

    if (document.getElementById('slPrItemValuation').value == '' || document.getElementById('slPrItemValuation').value == 'NaN') {
        document.getElementById('slPrItemValuation').value = 0;
    }
    if (document.getElementById('slPrItemFinalVal').value == 'NaN') {
        document.getElementById('slPrItemFinalVal').value = 0;
    }
    return false;
}
//*************End code to add Function for strellring silver AUTHOR:DIKSHA 22OCT2018**********
/************End code to UPDATE CODE @Author:GAUR19SEP16***************/
/***********End code to change value added option @Author:ANUJA31JAN15***************/
/***********End Code To Add Func For Add Sell Iteem Calcn @Author:ANUJA31JAN15***********/

/*********Start code to get accounts field 65l BC @Author:ANUJA4FEB15**********/
function getImiLoanBarCodeField(option, value, panelName) {
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
/*********End code to get accounts field 65l BC @Author:ANUJA4FEB15**********/
/*********Start code to get accounts field 85l BC @Author:ANUJA4FEB15**********/
function getImiBarCodeField(option, value, panelName) {
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
    xmlhttp.open("POST", "include/php/ogijlgcd.php?option=" + option + "&value=" + value + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/*********End code to get accounts field 85l BC @Author:ANUJA4FEB15**********/
//START CODE To Add SalesPurchase Invoice After Submit @AUTHOR:PRIYA24FEB13
/**********START CODE To Remove NetWght And NetWghtType Ids @AUTHOR:PRIYA28FEB13**************/
/**********START CODE To Add itstId @AUTHOR:PRIYA08MARCH13**************/
/**********START CODE To Add NT WT @AUTHOR:PRIYA15APR13**************/
/**********START CODE To Add Item Sell Date  @AUTHOR:PRIYA18APR13**************/
/************Start code to change function  @Author:PRIYA06FEB14***************/
/************Start code to add parseInt @Author:PRIYA03JUN14***************/
function sellImiPurchaseSubmit() {
    if (document.getElementById('panelName').value == 'ImitationSellPayUp' && document.getElementById('noOfInv').value > 0) {
        alert('You can not update this item');
        return false;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("slPrSubButtDiv").style.visibility = "hidden";
        var stockDateDay = document.getElementById("addItemDOBDay").value;
        var stockDateMMM = document.getElementById("addItemDOBMonth").value;
        var stockDateYY = document.getElementById("addItemDOBYear").value;
        var stockDateStr = document.getElementById("addItemDOBMonth").value + ' ' + document.getElementById("addItemDOBDay").value + ', ' + document.getElementById("addItemDOBYear").value;
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
        //
        if (validateImiItemInputs()) {
            if (datesDiff < 0 && nepaliDateIndicator != 'YES') {
                alert('Please Select the correct Date!');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                return false;
            } else {
                if (stockDateMMM == 'FEB' || stockDateMMM == 'APR' || stockDateMMM == 'JUN' || stockDateMMM == 'SEP' || stockDateMMM == 'NOV') {
                    if (stockDateMMM == 'FEB' && stockDateDay > 29 && stockDateYY % 4 == 0) {
                        alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 29 days.');
                        document.getElementById("addItemDOBDay").focus();
                        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                        document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                        return false;
                    }
                    if (stockDateMMM == 'FEB' && stockDateDay > 28 && stockDateYY % 4 != 0) {
                        alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 28 days.');
                        document.getElementById("addItemDOBDay").focus();
                        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                        document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                        return false;
                    }
                    if (stockDateDay > 30) {
                        alert('Please select correct Date, Month ' + stockDateMMM + ' has only max 30 days.');
                        document.getElementById("addItemDOBDay").focus();
                        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                        document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                        return false;
                    }
                }
                //            if (document.getElementById("panelName").value == 'SellDetUpPanel' || document.getElementById("panelName").value == 'SellPayUp') {
                //                if (parseInt(document.getElementById("totalPurQty").value) < ((parseInt(document.getElementById("totalSellQty").value) + parseInt(document.getElementById("slPrItemPieces").value)) - parseInt(document.getElementById("stockQty").value))) {
                //                    alert('Total Avail Qty:' + document.getElementById("totalPurQty").value + 'Total Sold Qty:' + document.getElementById("totalSellQty").value + '\nQuantity Exceeds Available Stock Quantity!\n Please Enter Correct Quantity !\n');
                //                    document.getElementById("slPrItemPieces").focus();
                //                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                //                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                //                    return false;
                //                }
                //            } else 
                if (document.getElementById("panelName").value == '' && (parseInt(document.getElementById("slPrItemPieces").value) > parseInt(document.getElementById("stockQty").value)) && document.getElementById('stockType').value == 'retailStock') {
                    alert('In Retail You Can Sell Only Single Item!\n Please Enter Correct Quantity !');
                    document.getElementById("slPrItemPieces").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return false;
                } else {
                    //if (validateEmptyField(document.getElementById("slPrItemFinalVal").value, "Please enter Valuation!") == false) {
                    //    document.getElementById("slPrItemFinalVal").focus();
                    //    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    //    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    //    return false;
                    //} else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return true;
                    //}
                    return false;
                }
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrSubButtDiv").style.visibility = "visible";
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("slPrSubButtDiv").style.visibility = "visible";
            return false;
        }
    }
}
function sellstrPurchaseSubmit() {
    if (document.getElementById('panelName').value == 'StrlleringSellPayUp' && document.getElementById('noOfInv').value > 0) {
        alert('You can not update this item');
        return false;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        document.getElementById("slPrSubButtDiv").style.visibility = "hidden";
        var stockDateDay = document.getElementById("addItemDOBDay").value;
        var stockDateMMM = document.getElementById("addItemDOBMonth").value;
        var stockDateYY = document.getElementById("addItemDOBYear").value;
        var stockDateStr = document.getElementById("addItemDOBMonth").value + ' ' + document.getElementById("addItemDOBDay").value + ', ' + document.getElementById("addItemDOBYear").value;
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
        if (validateImiItemInputs()) {
            if (datesDiff < 0 && nepaliDateIndicator != 'YES') {
                alert('Please Select the correct Date!');
                document.getElementById("addItemDOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                return false;
            } else {
                if (stockDateMMM == 'FEB' || stockDateMMM == 'APR' || stockDateMMM == 'JUN' || stockDateMMM == 'SEP' || stockDateMMM == 'NOV') {
                    if (stockDateMMM == 'FEB' && stockDateDay > 29 && stockDateYY % 4 == 0) {
                        alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 29 days.');
                        document.getElementById("addItemDOBDay").focus();
                        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                        document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                        return false;
                    }
                    if (stockDateMMM == 'FEB' && stockDateDay > 28 && stockDateYY % 4 != 0) {
                        alert('Please select correct Date, Month ' + stockDateMMM + ' for this selected year has only max 28 days.');
                        document.getElementById("addItemDOBDay").focus();
                        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                        document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                        return false;
                    }
                    if (stockDateDay > 30) {
                        alert('Please select correct Date, Month ' + stockDateMMM + ' has only max 30 days.');
                        document.getElementById("addItemDOBDay").focus();
                        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                        document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                        return false;
                    }
                }
                if (document.getElementById("panelName").value == '' && (parseInt(document.getElementById("slPrItemPieces").value) > parseInt(document.getElementById("stockQty").value)) && document.getElementById('stockType').value == 'retailStock') {
                    alert('In Retail You Can Sell Only Single Item!\n Please Enter Correct Quantity !');
                    document.getElementById("slPrItemPieces").focus();
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("slPrSubButtDiv").style.visibility = "visible";
                    return false;
                } else {
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
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("slPrSubButtDiv").style.visibility = "visible";
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("slPrSubButtDiv").style.visibility = "visible";
            return false;
        }
    }
}
function validateImiItemInputs() {
    document.getElementById('sttr_stock_type == ' + document.getElementById("sttr_stock_type").value);

    if (validateSelectField(document.getElementById("addItemDOBDay").value, "Please select Day!") == false) {
        document.getElementById("addItemDOBDay").focus();
        // alert('Hi');
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBMonth").value, "Please select Month!") == false) {
        document.getElementById("addItemDOBMonth").focus();
        return false;
    } else if (validateSelectField(document.getElementById("addItemDOBYear").value, "Please select Year!") == false) {
        document.getElementById("addItemDOBYear").focus();
        return false;
    }
    //    else if (validateEmptyField(document.getElementById("slPrPreInvoiceNo").value, "Please enter Invoice Number!") == false ||
    //            validateNum(document.getElementById("slPrPreInvoiceNo").value, "Accept only numeric characters without space character!") == false) {
    //        document.getElementById("slPrPreInvoiceNo").focus();
    //        return false;
    //    } 
    //amol123
    else if (validateSelectField(document.getElementById("firmId").value, "Please select Firm!") == false) {
        document.getElementById("firmId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("sttr_account_id").value, "Please select Account Name!") == false) {
        document.getElementById("sttr_account_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrItemCategory").value, "Please enter Item Category!") == false) {
        document.getElementById("slPrItemCategory").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrItemName").value, "Please enter Item Name!") == false) {
        document.getElementById("slPrItemName").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrItemPieces").value, "Please enter Item Pieces!") == false ||
            validateNum(document.getElementById("slPrItemPieces").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slPrItemPieces").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrItemCharges").value, "Please enter Price!") == false ||
            validateNumWithDot(document.getElementById("slPrItemCharges").value, "Accept only numeric characters without space!") == false) {
        document.getElementById("slPrItemCharges").focus();
        return false;
    }
    //    else if (validateEmptyField(document.getElementById("slPrItemFinalVal").value, "Please enter Item Final Valuation!") == false ||
    //            validateNumWithDot(document.getElementById("slPrItemFinalVal").value, "Accept only numeric characters without space!") == false) {
    //        document.getElementById("slPrItemFinalVal").focus();
    //        return false;
    //    }
    else
        return true;
    //    if (document.getElementById('mainPanel').value == 'StockPanel' && document.getElementById('autoBcPrint').value == 'YES') {
    //        document.getElementById("auto_barcode_label_print").style.visibility = "hidden";
    //        return true;
    //    } else {
    //        
    //}
}
/************End code to add parseInt @Author:PRIYA03JUN14***************/
/************End code to change function  @Author:PRIYA06FEB14***************/
/**********END CODE To Add Item Sell Date  @AUTHOR:PRIYA18APR13**************/
/**********END CODE To Add NT WT @AUTHOR:PRIYA15APR13**************/
/**********END CODE To Add itstId @AUTHOR:PRIYA08MARCH13**************/
/**********END CODE To Remove NetWght And NetWghtType Ids @AUTHOR:PRIYA28FEB13**************/
//END CODE To Add SalesPurchase Invoice After Submit @AUTHOR:PRIYA24FEB13

function navigateToImiStockPanel(documentRootPath) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // alert('hie');
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("jewellerySubPanel").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/ogijsmlt.php", true);
    xmlhttp.send();
}
function showJewelleryStock(panel) {
    // alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {//alert(xmlhttp.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockListSubDiv").innerHTML = xmlhttp.responseText;  //change in div name @AUTHOR: SANDY25SEP13

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/ogilsbdv.php?stockPanel=" + panel, true);
    xmlhttp.send();
}
function showImitationStock(panel) {
    // alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {//alert(xmlhttp.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockListSubDiv").innerHTML = xmlhttp.responseText;  //change in div name @AUTHOR: SANDY25SEP13

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/ogijsbdv.php?stockPanel=" + panel, true);
    xmlhttp.send();
}
/***************Start code to ADD new function for Auction @Author:ANUJA25FEB15**************/
function releaseAuctDetails(custId, girviId, pageNo, totalTransLoan, panelName) {
    document.getElementById("girviReleaseDetailsButDiv").style.visibility = "hidden";
    document.getElementById("ajaxLdGirviInfoBelowButtPanelDiv").style.visibility = "visible";
    //var confirm_box;
    if (totalTransLoan > 0) {
        confirm_box = confirm("First Release Transferred Loan!\nDo You Really Want To Continue?");
        if (confirm_box != true) {
            document.getElementById("girviReleaseDetailsButDiv").style.visibility = "visible";
            document.getElementById("ajaxLdGirviInfoBelowButtPanelDiv").style.visibility = "hidden";
        }
    } else {
        confirm_box = true;
    }
    if (confirm_box == true || totalTransLoan == 0 || totalTransLoan == '0' || totalTransLoan == NULL) {
        if (confirm_box == true) {
            var poststr = "custId=" + custId +
                    "&girviId=" + girviId +
                    "&pageNo=" + pageNo +
                    "&auctionPanel=" + panelName +
                    "&grvRelPayDetails=TRUE";
            release_girvi_details('include/php/olgraudt.php', poststr);
        } else {
            document.getElementById("girviReleaseDetailsButDiv").style.visibility = "visible";
            document.getElementById("ajaxLdGirviInfoBelowButtPanelDiv").style.visibility = "hidden";
        }
    }
}
/***************End code to ADD new function for Auction @Author:ANUJA25FEB15**************/
/**************Start code to add fumction for Auction  @Author:ANUJA03MAR15**********************/
function releaseAuction(custId, girviId, pageNo, relDD, relMM, relYY, girviFirmId, aucPrinAmt, aucIntrAmount, auctionAmount, auctotalAmount, aucLoanPrinAmtAccId, aucLoanAucAmtAccId, aucLoanFinalAmtAccId, aucLoanIntAmtAccId, girviOtherInfo) {
    // alert('girviCashRecAccId='+girviOtherInfo);
    //START CODE FOR AUCTION CHARGES AND EXTRA CHARGES : AUTHOR @DARSHANA 
    var aucChargeAmount = document.getElementById('aucChargeAmount').value;
    var aucExChrgAmount = document.getElementById('aucExChrgAmount').value;
    var accChargesAcc = document.getElementById('girv_auction_chrg_acc').value;
    var accExtraChrgAcc = document.getElementById('girv_auction_extra_chrg_acc').value;



    document.getElementById("girviReleaseButDiv").style.visibility = "hidden";
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";

    if (validateSelectField(relDD.value, "Please select Release Date Day!") == false) {
        relDD.focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(relMM.value, "Please select Release Date Month!") == false) {
        relMM.focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else if (validateSelectField(relYY.value, "Please select Release Date Year!") == false) {
        relYY.focus();
        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        exit();
    } else {
        var girviDateDay = relDD.value;
        var girviDateMMM = relMM.value;
        var girviDateYY = relYY.value;

        if (girviDateMMM == 'FEB' || girviDateMMM == 'APR' || girviDateMMM == 'JUN' ||
                girviDateMMM == 'SEP' || girviDateMMM == 'NOV') {
            if (girviDateMMM == 'FEB' && girviDateDay > 29 && girviDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("girviReleaseButDiv").style.visibility = "visible";
                return false;
                exit();
            }
            if (girviDateMMM == 'FEB' && girviDateDay > 28 && girviDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("girviReleaseButDiv").style.visibility = "visible";
                return false;
                exit();
            }
            if (girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("girviReleaseButDiv").style.visibility = "visible";
                return false;
                exit();
            }
        }

        if (validateEmptyField(document.getElementById("auctionAmount").value, "Please enter Auction Amount!") == false ||
                validateNum(document.getElementById("auctionAmount").value, "Accept only numeric characters without space character!") == false) {
            document.getElementById("auctionAmount").focus();
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviReleaseButDiv").style.visibility = "visible";
            return false;
            exit();
        }

        confirm_box = confirm("Do you really want to release this Auction?");

        if (confirm_box == true) {
            var poststr = "custId=" + custId + "&girviId=" + girviId + "&pageNo=" + pageNo
                    + "&relDD=" + relDD.value + "&relMM=" + relMM.value + "&relYY=" + relYY.value + "&girviFirmId=" + girviFirmId +
                    "&aucPrinAmt=" + aucPrinAmt + "&aucIntrAmount=" + aucIntrAmount + "&auctionPanel=AuctionPanel" + "&auctionAmount=" + auctionAmount + "&auctotalAmount=" + auctotalAmount
                    + "&aucLoanPrinAmtAccId=" + aucLoanPrinAmtAccId + "&aucLoanAucAmtAccId=" + aucLoanAucAmtAccId + "&aucLoanFinalAmtAccId=" + aucLoanFinalAmtAccId + "&aucLoanIntAmtAccId=" + aucLoanIntAmtAccId
                    + "&aucChargeAmount=" + aucChargeAmount + "&aucExChrgAmount=" + aucExChrgAmount + "&accChargesAcc=" + accChargesAcc + "&accExtraChrgAcc=" + accExtraChrgAcc + "&girviOtherInfo=" + girviOtherInfo;

            release_girvi('include/php/olaucgrl.php', poststr);//change in filename @AUTHOR:ANUJA28FEB15
        } else {
            document.getElementById("girviReleaseButDiv").style.visibility = "visible";
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        }
        //        document.getElementById("girviReleaseButDiv").style.visibility = "visible";
        //        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
    //document.getElementById("girviReleaseButDiv").style.visibility = "visible";
    //document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
}
/**************End code to add fumction for Auction  @Author:ANUJA03MAR15**********************/
/**********Start code to add function to get calc by for labour charges @Author:ANUJA04MAR15*********/
function callAuction() {

    var aucamount = document.getElementById('auctionAmount').value;
    var aucvalue = document.getElementById('auctotalAmount').value;
    var aucprofitlossvalue = document.getElementById('auctionprofitLoss').value;

    if (document.getElementById('aucFinalProfit').value == 'NaN') {
        document.getElementById('aucFinalProfit').value = 0;
    }
    document.getElementById('aucFinalProfit').value = Math.abs(((parseFloat(document.getElementById('auctionAmount').value) - parseFloat(document.getElementById('auctotalAmount').value))).toFixed(2));
    if (document.getElementById('aucFinalProfit').value == 'NaN') {
        document.getElementById('aucFinalProfit').value = '';
    }
    if (parseFloat(aucamount) > parseFloat(aucvalue)) {
        document.getElementById('aucFinalProfit').style.color = 'Green';
    } else {
        document.getElementById('aucFinalProfit').style.color = 'Red';
    }
    //document.getElementById('aucFinalProfit').value = ((parseFloat(aucFinalProfit) + parseFloat(document.getElementById('auctionprofitLoss').value))).toFixed(2);
    //document.getElementById('addItemValuation').value = ((parseFloat(document.getElementById('addItemPurPrice').value) + parseFloat(labCharges))).toFixed(2);
}
/**********End code to add function to get calc by for labour charges @Author:ANUJA04MAR15*********/
/**********End code to add function to get calc by for labour charges @Author:ANUJA14JAN15*********/

function searchAuctionByLoanIdInCustHome(custId, girviId, panelDivName) {
    //alert(girviId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {//alert(xmlhttp.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;  //change in div name @AUTHOR: SANDY25SEP13

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/olgrgrdtbylnid.php?custId=" + custId + "&girviId=" + girviId + "&panelDivName=" + panelDivName, true);
    xmlhttp.send();
}

function searchAuctionByGirviIdInCustHome(custId, girviId, panelDivName) {
    //alert(girviId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {//alert(xmlhttp.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;  //change in div name @AUTHOR: SANDY25SEP13

        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/olgrgrdt.php?custId=" + custId + "&girviId=" + girviId + "&panelDivName=" + panelDivName, true);
    xmlhttp.send();
}
//**************************** Start code Navigate Auction Loan Panel @Author:ANUJA10MAR15*******************************************************************
function showAuctionedListPanel() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/orgpaucl" + default_theme + ".php", true);
    xmlhttp.send();
}

function numberOfRowsofAuctionedPanel(documentRootPath, rowsPerPage, selFirmId, sortKeyword, pageNum, searchColumn, searchValue, updateRows) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "hidden";
            //document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "visible";
            document.barcode_search.barcode_text.focus();
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            //document.getElementById("ajaxLoadNextGirviPanelList").style.visibility = "visible";
            //document.getElementById("ajaxLoadNextGirviPanelListButt").style.visibility = "hidden";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/orgpaucl.php?rowsPerPage=" + rowsPerPage + "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&page=" + pageNum + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue + "&updateRows=" + updateRows, true);
    xmlhttp.send();
}

function searchAuctionLoanPanel(documentRootPath, searchColumn, searchValue, selFirmId, rowsPerPage) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/orgpaucl.php?searchColumn="
            + searchColumn + "&searchValue=" + searchValue + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage, true);
    xmlhttp.send();
}
function sortAuctionLoanPanel(documentRootPath, sortKeyword, selFirmId, rowsPerPage) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", documentRootPath + "/include/php/orgpaucl.php?sortKeyword=" + sortKeyword + "&selFirmId=" + selFirmId + "&rowsPerPage=" + rowsPerPage, true);
    xmlhttp.send();
}
function navigateToImitationPanel(panel) {
    //alert(panel);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {//alert(xmlhttp.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";

        } else
            document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
    };

    xmlhttp.open("POST", "include/php/ogijlimdv.php?panel=" + panel, true);
    xmlhttp.send();
}
//add parameter last three Author:GAUR25JUL16
function navigateToJewelleryPanel(panel, divPanel, itemCategory, metalType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {//alert(xmlhttp.responseText);
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //  document.getElementById("stockListSubDiv").innerHTML = xmlhttp.responseText;  //change in div name @AUTHOR: SANDY25SEP13

        } else
            document.getElementById("jewelleryPanel").innerHTML = xmlhttp.responseText;
    };

    xmlhttp.open("POST", "include/php/ogilimdv.php?panel=" + panel + "&divPanel=" + divPanel + "&itemCategory=" + itemCategory + "&metalType=" + metalType, true);
    xmlhttp.send();
}
//
//
function showImitationDetailsDiv(documentRootPath, sttrId, panelName, page, imiStockType) {
    var panelNameItemDetails = panelName;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (panelNameItemDetails == 'stockList') {
                document.getElementById("stockList").innerHTML = xmlhttp.responseText;
            } else if (panelNameItemDetails == 'imitationPanel' || panelNameItemDetails == 'sterlingPanel' ||
                    panelNameItemDetails == 'WholsaleJwelleryPanel' || panelNameItemDetails == 'jwelleryPanel' ||
                    panelNameItemDetails == 'WholesaleStockSearchPanel' || panelNameItemDetails == 'WholsaleImitationJwelleryPanel') { //CONDITION ADDED FOR WHOLESALE IMITATION JWELLERY,@AUTHOR:HEMA27JULY2020
                document.getElementById("addStockItemDetails").innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    if (imiStockType == 'wholesale')
        xmlhttp.open("POST", "include/php/ogijwsbdv.php?sttrId=" + sttrId + "&panelName=" + panelName + "&page=" + page, true);
    else
        xmlhttp.open("POST", "include/php/ogijdsbdv.php?sttrId=" + sttrId + "&panelName=" + panelName + "&page=" + page, true);
    xmlhttp.send();
}
//
//
function getAuctionAccount(auctionAmount, aucTotalAmount, firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("aucFinalAmtDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/olaucfac.php?auctionAmount=" + auctionAmount + "&aucTotalAmount=" + aucTotalAmount +
            "&firmId=" + firmId, true);
    xmlhttp.send();
}
function deleteAuction(girviId, custId, panelDivName) {

    document.getElementById("girviDeleteImageDiv").style.visibility = "hidden";
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";

    confirm_box = confirm("Do you really want to Permanent Delete this Auctioned?");
    if (confirm_box == true) {
        var poststr = "girviId=" + girviId + "&custId=" + custId + "&panelDivName=" + panelDivName;

        delete_girvi('include/php/olgdgvdl.php', poststr);//change in filename @AUTHOR: SANDY20NOV13
    } else {
        document.getElementById("girviDeleteImageDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
function getSellItemFfnWt(div, id, keyCodeInput) {
    //    alert('hiee');
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(div).innerHTML = xmlhttp.responseText;
            if (keyCodeInput == 40 || keyCodeInput == 38) {
                document.getElementById('itemPurchaseWtBy').focus();
                document.getElementById('itemPurchaseWtBy').options[0].selected = true;
            }
        }
    };
    xmlhttp.open("POST", "include/php/ogisfwsl.php?div=" + div, true);
    xmlhttp.send();
}
function addCustItemStock(itslId, panelName) {
    //    alert(panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", "include/php/ogiamsdv.php?itslId=" + itslId + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/********Start code to change tofixed(2) values @Author:ANUJA21MAY15********* */
/********Start code to add if condition to check panelName @Author:ANUJA28MAY15********* */
var totGoldBal;
var totSilverBal;
var metalCountBal;
function calcWholeItemBalance() {
    //alert('calwholesale');
    var metalEntered = 0;
    var count = 0;
    var metalCount = document.getElementById("metalCount").value;
    var prefix = 'slPr';
    metalCountBal = metalCount;
    if (document.getElementById('metalPanel').value == 'SlPrPayment') {
        count = 1;
        delId = 'del' + 1;
    } else if (document.getElementById('metalPanel').value == 'SellPayUp') {
        getMetalDiv = document.getElementById('noOfRawMet').value;
        count = document.getElementById('rawId').value;
        var delId = 'del' + count;
    }
    var totAmtRec = 0;
    var gdBal = 0;
    var slBal = 0;
    var goldWeight = 0;
    var totGoldBal = 0;
    var totSilverBal = 0;

    document.getElementById('metal1WtBalPay').value = '0.00';
    document.getElementById('metal2WtBalPay').value = '0.00';

    for (var dc = count; getMetalDiv != ''; dc++) {
        if (document.getElementById('metalDel' + dc).value != 'Deleted') {
            var payTotalWeight1 = document.getElementById(prefix + 'PayMetal1RecWt' + dc).value;
            var payTotalWeightType1 = document.getElementById(prefix + 'PayMetal1RecWtType' + dc).value;
            var payMetalRate1 = document.getElementById(prefix + 'PayMetal1Rate' + dc).value;
            var payMetalTunch1 = document.getElementById(prefix + 'PayMetal1Tunch' + dc).value;
            var goldWeight = (payTotalWeight1 * payMetalTunch1) / 100;
            document.getElementById(prefix + 'PayMetal1FnWt' + dc).value = (goldWeight).toFixed(3);

            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold' || document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Alloy') {
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) * document.getElementById('gmWtInKg').value).toFixed(3);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(3);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInMg').value).toFixed(3);
                }
                if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold') {
                    var payMetalDueWeightType1 = document.getElementById(prefix + 'GoldTotFineWtType').value;
                    if (gdBal == '') {
                        gdBal = document.getElementById(prefix + 'GoldTotFineWt').value;
                    }
                    if (payMetalDueWeightType1 == 'KG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight / 1000)).toFixed(3);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000 * 1000))).toFixed(3);
                        }
                    } else if (payMetalDueWeightType1 == 'GM') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(3);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000))).toFixed(3);
                        }
                    } else if (payMetalDueWeightType1 == 'MG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000 * 1000)).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(3);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat((gdBal - goldWeight)).toFixed(3);
                        }
                    }

                    totGoldBal = (parseFloat(totGoldBal) + parseFloat(goldWeight)).toFixed(3);
                    document.getElementById('metal1WtBalPay').value = totGoldBal + ' ' + payMetalDueWeightType1;
                    document.getElementById('metal1WtPay').value = parseFloat(totGoldBal).toFixed(3);
                    document.getElementById(prefix + 'PayMetal1Bal' + dc).value = gdBal;
                    document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                    document.getElementById(prefix + 'PayMetal1WtBal').value = gdBal;
                    document.getElementById(prefix + 'PayMetal1WtBalType').value = payMetalDueWeightType1;
                    document.getElementById('metal1WtBal').value = gdBal;
                    document.getElementById('metal1WtBalType').value = payMetalDueWeightType1;
                    var goldbal = gdBal;
                    //                    alert(document.getElementById('metal1WtBalPay').value);
                    if (document.getElementById('metalPanel').value != 'SellPayUp') {
                        document.getElementById('wholeAdjGdPay').value = goldbal;
                    }

                    if (document.getElementById('metal1WtPrv').value == '' || document.getElementById('metal1WtPrv').value == 'NaN') {
                        document.getElementById('metal1WtPrv').value = '0.00';
                    }
                    if (document.getElementById('metal1WtPur').value == '' || document.getElementById('metal1WtPur').value == 'NaN') {
                        document.getElementById('metal1WtPur').value = '0.00';
                    }
                    if (document.getElementById('metal1WtPay').value == '' || document.getElementById('metal1WtPay').value == 'NaN') {
                        document.getElementById('metal1WtPay').value = '0.00';
                    }

                    document.getElementById('metal1WtTotalBal').value = parseFloat(parseFloat(document.getElementById('metal1WtPrv').value) + parseFloat(document.getElementById('metal1WtPur').value) - parseFloat(document.getElementById('metal1WtPay').value)).toFixed(3);

                    document.getElementById('metal1WtTotalBal').value = document.getElementById('metal1WtTotalBal').value + '' + payMetalDueWeightType1;
                    document.getElementById('metalGoldWtBal').value = gdBal;

                    if (goldbal != gdBal) {
                        document.getElementById('metalGoldWtBal').value = parseFloat(gdBal - goldbal).toFixed(3);
                        //                      
                    }
                }

            }
            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Silver') {
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1 * document.getElementById('srGmWtInKg').value)).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('srGmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                }
                payMetalDueWeightType1 = document.getElementById(prefix + 'SilverTotFineWtType').value;
                if (slBal == '') {
                    slBal = document.getElementById(prefix + 'SilverTotFineWt').value;
                }
                if (payMetalDueWeightType1 == 'KG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat((slBal) - goldWeight).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - goldWeight / 1000)).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - goldWeight / (1000 * 1000))).toFixed(3);
                    }
                } else if (payMetalDueWeightType1 == 'GM') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - goldWeight * 1000)).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat((slBal) - goldWeight).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - goldWeight / (1000))).toFixed(3);
                    }
                } else if (payMetalDueWeightType1 == 'MG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - goldWeight * 1000 * 1000)).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - goldWeight * 1000)).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat((slBal - goldWeight)).toFixed(3);
                    }
                }
                totSilverBal = (parseFloat(totSilverBal) + parseFloat(goldWeight)).toFixed(3);
                document.getElementById('metal2WtBalPay').value = totSilverBal + ' ' + payMetalDueWeightType1;
                document.getElementById('metal2WtPay').value = parseFloat(totSilverBal).toFixed(2);
                document.getElementById(prefix + 'PayMetal1Bal' + dc).value = slBal;
                document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                document.getElementById(prefix + 'PayMetal2WtBal').value = slBal;
                document.getElementById(prefix + 'PayMetal2WtBalType').value = payMetalDueWeightType1;
                //                alert(slBal+' '+payMetalDueWeightType1);
                document.getElementById('metal2WtBal').value = slBal + ' ' + payMetalDueWeightType1;
                var silverbal = slBal;

                //                document.getElementById('metal21WtBal').value = document.getElementById('metal2WtBal').value + '' + payMetalDueWeightType1;

                if (document.getElementById('metalPanel').value != 'SellPayUp') {
                    document.getElementById('wholeAdSrPay').value = silverbal;
                    //                        alert("up"+document.getElementById('wholeAdSrPay').value);
                }

                if (document.getElementById('metal2WtPrv').value == '' || document.getElementById('metal2WtPrv').value == 'NaN') {
                    document.getElementById('metal2WtPrv').value = '0.00';
                }
                if (document.getElementById('metal2WtPur').value == '' || document.getElementById('metal2WtPur').value == 'NaN') {
                    document.getElementById('metal2WtPur').value = '0.00';
                }
                if (document.getElementById('metal2WtPay').value == '' || document.getElementById('metal2WtPay').value == 'NaN') {
                    document.getElementById('metal2WtPay').value = '0.00';
                }

                document.getElementById('metal2WtTotalBal').value = parseFloat(parseFloat(document.getElementById('metal2WtPrv').value) + parseFloat(document.getElementById('metal2WtPur').value) - parseFloat(document.getElementById('metal2WtPay').value)).toFixed(3);
                document.getElementById('metal2WtTotalBal').value = document.getElementById('metal2WtTotalBal').value + ' ' + payMetalDueWeightType1;
                document.getElementById('metalSilverWtBal').value = slBal;
                //                document.getElementById('metalSilverWtBalType').value = payMetalDueWeightType1;
                if (silverbal != slBal) {
                    document.getElementById('metalSilverWtBal').value = parseFloat(slBal - silverbal).toFixed(3);
                    //                    document.getElementById('metalSilverWtBalType').value = payMetalDueWeightType1;
                }
            }
            var metalValuation1 = document.getElementById(prefix + 'PayMetal1Val' + dc).value;
            if (metalValuation1 == '') {
                metalValuation1 = 0;
            }
            totAmtRec += parseFloat(metalValuation1);
            document.getElementById(prefix + 'PayTotAmtRec').value = (totAmtRec).toFixed(2);

            var gdRtCut = document.getElementById('wholeAdjGdPay').value;
            //            alert(gdRtCut);
            if (gdRtCut == '' || gdRtCut == 'NaN') {
                gdRtCut = '0.00';
            }
            document.getElementById('metal11WtBal').value = gdRtCut + ' ' + document.getElementById('metalGoldWtBalType').value;

            var srRtCut = document.getElementById('wholeAdSrPay').value;
            if (srRtCut == '' || srRtCut == 'NaN') {
                srRtCut = '0.00';
            }
            document.getElementById('metal12WtBal').value = parseFloat(srRtCut).toFixed(3) + ' ' + document.getElementById('metalSilverWtBalType').value;
            //             alert(gdRtCut);
            //            alert(document.getElementById('metal1WtTotalBal').value);
            var finGdBal = Math.abs(parseFloat(document.getElementById('metal1WtTotalBal').value) - parseFloat(gdRtCut)).toFixed(3);
            //alert(finGdBal);
            var finSrBal = Math.abs(parseFloat(document.getElementById('metal2WtTotalBal').value) - parseFloat(srRtCut)).toFixed(3);
            if (finGdBal == '' || finGdBal == 'NaN') {
                finGdBal = '0.00';
            }
            if (finSrBal == '' || finSrBal == 'NaN') {
                finSrBal = '0.00';
            }
            document.getElementById('metal2WtFinalGdBal').value = finGdBal;
            document.getElementById('metal2WtFinalSlBal').value = finSrBal;

            document.getElementById('metal1WtFinalBal').value = finGdBal + ' ' + document.getElementById('metalGoldWtBalType').value;
            //            alert(document.getElementById('metal1WtFinalBal').value);
            document.getElementById('metal2WtFinalBal').value = finSrBal + ' ' + document.getElementById('metalSilverWtBalType').value;
            //            alert(document.getElementById('metalPanel').value);
            //            if (document.getElementById('metalPanel').value != 'SellPayUp') {
            calcCashBalance(prefix);
        }

        metalEntered++;
    }

    return false;
}
/**start code to change code for rate cut wt type @OMMODTAG SHRI_23NOV15*************/
function calcRateCutBal() {
    var gdRtCut = document.getElementById('wholeAdjGdPay').value;
    if (gdRtCut == '' || gdRtCut == 'NaN') {
        gdRtCut = '0.00';
    }
    document.getElementById('metal11WtBal').value = gdRtCut + ' ' + document.getElementById('wholeAdjGdPayType').value;

    var srRtCut = document.getElementById('wholeAdSrPay').value;
    //    alert('srRtCut='+srRtCut);
    if (srRtCut == '' || srRtCut == 'NaN') {
        srRtCut = '0.00';
    }
    document.getElementById('metal12WtBal').value = parseFloat(srRtCut).toFixed(3) + ' ' + document.getElementById('wholeAdSrPayType').value;

    //    alert(document.getElementById('metal1WtTotalBal').value);

    var finGdBal = Math.abs(parseFloat(document.getElementById('metal1WtTotalBal').value) - parseFloat(gdRtCut)).toFixed(3);
    var finSrBal = Math.abs(parseFloat(document.getElementById('metal2WtTotalBal').value) - parseFloat(srRtCut)).toFixed(3);
    if (finGdBal == '' || finGdBal == 'NaN') {
        finGdBal = '0.00';
    }
    if (finSrBal == '' || finSrBal == 'NaN') {
        finSrBal = '0.00';
    }
    document.getElementById('metal2WtFinalGdBal').value = finGdBal;
    document.getElementById('metal2WtFinalSlBal').value = finSrBal;

    document.getElementById('metal1WtFinalBal').value = finGdBal + ' ' + document.getElementById('wholeAdjGdPayType').value;
    //    alert(document.getElementById('metal1WtFinalBal').value);
    document.getElementById('metal2WtFinalBal').value = finSrBal + ' ' + document.getElementById('wholeAdSrPayType').value;

}
/********Start code to add if condition to check panelName @Author:ANUJA28MAY15********* */
/********End code to change tofixed(2) values @Author:ANUJA21MAY15********* */
function getImitationDetailsPanel(documentRootPath, preId, postId, panelName, page, sttrId, stockType) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("itemDetails").innerHTML = xmlhttp.responseText;
        }
    };
    if (stockType == 'wholeSaleStock') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijwsbdv.php?panelName=" + panelName + "&preId=" + preId + "&postId=" + postId +
                "&page=" + page + "&sttrId=" + sttrId, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijdsbdv.php?panelName=" + panelName + "&preId=" + preId + "&postId=" + postId +
                "&page=" + page + "&sttrId=" + sttrId, true);
    }
    xmlhttp.send();
}
function getEngDateOpt(divId) {
    //    alert(divId);
    loadXMLDoc3();
    if (divId == 'display_girvi_add_prin_eng_date') {
        var todayDay = document.getElementById('addPrinDOBDayTithi').value;
        var todayMonth = document.getElementById('addPrinDOBMonth').value;
        var todayPaksha = document.getElementById('addPrinDOBDayPaksh').value;
        var todayYear = document.getElementById('addPrinDOBYear').value;
    } else if (divId == 'display_girvi_money_dep_eng_date') {
        var todayDay = document.getElementById('DMDOBTithi').value;
        var todayMonth = document.getElementById('DMDOBMonth').value;
        var todayPaksha = document.getElementById('DMDOBPaksh').value;
        var todayYear = document.getElementById('DMDOBYear').value;
    } else if (divId == 'display_girvi_updt_eng_date') {
        var todayDay = document.getElementById('DOBDayTithi').value;
        var todayMonth = document.getElementById('updateDOBMonth').value;
        var todayPaksha = document.getElementById('DOBDayPaksh').value;
        var todayYear = document.getElementById('updateDOBYear').value;
    } else {
        var todayDay = document.getElementById('DOBDayTithi').value;
        var todayMonth = document.getElementById('DOBMonth').value;
        var todayPaksha = document.getElementById('DOBDayPaksh').value;
        var todayYear = document.getElementById('DOBYear').value;
    }
    //    alert(todayDay + " " + todayMonth + " " + todayPaksha + " " + todayYear);
    xmlhttp3.onreadystatechange = function () {
        if (xmlhttp3.readyState == 4 && xmlhttp3.status == 200) {

            document.getElementById(divId).innerHTML = xmlhttp3.responseText;

        } else {
            document.getElementById(divId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };

    xmlhttp3.open("POST", "include/php/olggendat.php?todayDay=" + todayDay + "&todayMonth=" + todayMonth + "&todayPaksha=" + todayPaksha + "&todayYear=" + todayYear + "&divId=" + divId, true);
    xmlhttp3.send();

    //     return true;
}
function functionToCloseDiv() {
    document.getElementById(formId).submit();
}
function searchHindiDate(form_id, divId) {
    formId = form_id;
    //    alert('formId='+formId);
    loadXMLDoc2();
    if (divId == 'display_girvi_add_prin_eng_date') {
        var todayDay = document.getElementById('addPrinDOBDayTithi').value;
        var todayMonth = document.getElementById('addPrinDOBMonth').value;
        var todayPaksha = document.getElementById('addPrinDOBDayPaksh').value;
        var todayYear = document.getElementById('addPrinDOBYear').value;
    } else if (divId == 'display_girvi_money_dep_eng_date') {
        var todayDay = document.getElementById('DMDOBTithi').value;
        var todayMonth = document.getElementById('DMDOBMonth').value;
        var todayPaksha = document.getElementById('DMDOBPaksh').value;
        var todayYear = document.getElementById('DMDOBYear').value;
    } else if (divId == 'display_girvi_updt_eng_date') {
        var todayDay = document.getElementById('DOBDayTithi').value;
        var todayMonth = document.getElementById('updateDOBMonth').value;
        var todayPaksha = document.getElementById('DOBDayPaksh').value;
        var todayYear = document.getElementById('updateDOBYear').value;
    } else {
        var todayDay = document.getElementById('DOBDayTithi').value;
        var todayMonth = document.getElementById('DOBMonth').value;
        var todayPaksha = document.getElementById('DOBDayPaksh').value;
        var todayYear = document.getElementById('DOBYear').value;
    }

    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            //            alert(xmlhttp2.responseText);
            if (xmlhttp2.responseText == 0) {
                getEngDateOpt(divId);
                if (divId == 'display_girvi_add_prin_eng_date') {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("ajaxLoadAddMorePrincipal").style.visibility = "hidden";
                } else if (divId == 'display_girvi_money_dep_eng_date') {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                    document.getElementById("ajaxLoadDepositMoneyDiv").style.visibility = "hidden";
                } else {
                    document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                }
            } else {
                if (divId == 'display_girvi_add_prin_eng_date') {
                    functionToSubmitAddPrinForm();
                } else if (divId == 'display_girvi_money_dep_eng_date') {
                    functionToSubmitMoneyDepForm();
                } else if (divId == 'display_girvi_reles_eng_date') {
                    functionToSubmitReleseDate();
                } else if (divId == 'display_girvi_auct_eng_date') {
                    functionToSubmitAuctionDate();
                } else if (divId == 'display_girvi_updt_eng_date') {
                    functionToSubmitUpdtDtForm();
                } else {
                    window.setTimeout(functionToCloseDiv, 1000);
                }
            }
        }
    };

    xmlhttp2.open("POST", "include/php/olgghindt.php?todayDay=" + todayDay + "&todayMonth=" + todayMonth + "&todayPaksha=" + todayPaksha + "&todayYear=" + todayYear, true);
    xmlhttp2.send();
    //    setInterval(searchHindiDate,1000);
}
//**************************** Hide Date Info POP UP *****************************************
function getEngDateOptHide(divId) {
    //    alert(divId);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(divId).innerHTML = xmlhttp.responseText;
            if (divId == 'display_girvi_add_prin_eng_date') {
                document.getElementById("girviUpdateAddPrincipalButDiv").style.visibility = "visible";
            } else if (divId == 'display_girvi_money_dep_eng_date') {
                document.getElementById("girviUpdateDepMoneyButDiv").style.visibility = "visible";
            } else if (divId == 'display_girvi_reles_eng_date') {
                document.getElementById("girviReleaseButDiv").style.visibility = "visible";
            } else if (divId == 'display_girvi_auct_eng_date') {
                document.getElementById("girviReleaseButDiv").style.visibility = "visible";
            } else if (divId == 'display_girvi_updt_eng_date') {
                document.getElementById("updateGirviDOBButton").style.visibility = "visible";
            }
        } else {
            document.getElementById(divId).innerHTML = "<img src='images/ajaxLoad.gif' />";
        }
    };

    xmlhttp.open("POST", "include/php/ombbblnk.php", true);
    xmlhttp.send();
}
//****************************Hide Date Function *************************************
function addNewGHindiDate(divId) {
    var poststr = "DOBDayTithi=" + document.getElementById('DOBDayTithi').value +
            "&DOBMonth=" + document.getElementById('DOBMonth').value +
            "&DOBYear=" + document.getElementById('DOBYear').value +
            "&DOBDayPaksh=" + document.getElementById('DOBDayPaksh').value +
            "&DOBEngDay=" + document.getElementById('DOBEngDay').value +
            "&DOBEngMonth=" + document.getElementById('DOBEngMonth').value +
            "&DOBEngYear=" + document.getElementById('DOBEngYear').value;
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (xmlhttp.responseText == 1) {
                //                alert(divId);
                document.getElementById(divId).style.visibility = 'hidden';
                if (divId == 'display_girvi_add_prin_eng_date') {
                    functionToSubmitAddPrinForm();
                } else if (divId == 'display_girvi_money_dep_eng_date') {
                    functionToSubmitMoneyDepForm();
                } else if (divId == 'display_girvi_reles_eng_date') {
                    functionToSubmitReleseDate();
                } else if (divId == 'display_girvi_auct_eng_date') {
                    functionToSubmitAuctionDate();
                } else if (divId == 'display_girvi_updt_eng_date') {
                    functionToSubmitUpdtDtForm();
                } else {
                    window.setTimeout(functionToCloseDiv, 1000);
                }
            }
        }
    };
    xmlhttp.open("POST", 'include/php/olgghadv.php?' + poststr, true);
    xmlhttp.send();
}
//**************************Start code to update Date in Layout @Author:ANUJA04JULY15*************************************
function updateHnEnDate() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("layoutTablOpt").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST", 'include/php/olglupdtl.php', true);
    xmlhttp.send();
}

function updateNewGHindiDate(ominId) {
    document.getElementById("AddNewLoanUpdButt").style.visibility = "hidden";
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateSelectField(document.getElementById('DOBEngDay').value, "Please select Date Day!") == false) {
        document.getElementById('DOBEngDay').focus();
        document.getElementById("AddNewLoanUpdButt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    } else if (validateSelectField(document.getElementById('DOBEngMonth').value, "Please select Date Month!") == false) {
        document.getElementById('DOBEngMonth').focus();
        document.getElementById("AddNewLoanUpdButt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    } else if (validateSelectField(document.getElementById('DOBEngYear').value, "Please select Date Year!") == false) {
        document.getElementById('DOBEngYear').focus();
        document.getElementById("AddNewLoanUpdButt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    } else {
        var poststr = "DOBDayTithi=" + document.getElementById('DOBDayTithi').value +
                "&DOBMonth=" + document.getElementById('DOBMonth').value +
                "&DOBYear=" + document.getElementById('DOBYear').value +
                "&DOBDayPaksh=" + document.getElementById('DOBDayPaksh').value +
                "&DOBEngDay=" + document.getElementById('DOBEngDay').value +
                "&DOBEngMonth=" + document.getElementById('DOBEngMonth').value +
                "&DOBEngYear=" + document.getElementById('DOBEngYear').value + "&ominId=" + ominId;
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("layoutTablOpt").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", 'include/php/olglupadv.php?' + poststr, true);
        xmlhttp.send();
        document.getElementById("AddNewLoanUpdButt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
/**********Start code to change function to add validation @Author:SHRI10JUL15*************/
function checkEngDate(todayDay, todayMonth, todayPaksha, todayYear) {
    document.getElementById("AddNewLoanSubButt").style.visibility = "hidden";
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    if (validateSelectField(document.getElementById('DOBDayTithi').value, "Please select Date Tithi!") == false) {
        document.getElementById('DOBDayTithi').focus();
        document.getElementById("AddNewLoanSubButt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    } else if (validateSelectField(document.getElementById('DOBMonth').value, "Please select Date Month!") == false) {
        document.getElementById('DOBMonth').focus();
        document.getElementById("AddNewLoanSubButt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    } else if (validateSelectField(document.getElementById('DOBDayPaksh').value, "Please select Date Paksh!") == false) {
        document.getElementById('DOBDayPaksh').focus();
        document.getElementById("AddNewLoanSubButt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    } else if (validateSelectField(document.getElementById('DOBYear').value, "Please select Date Year!") == false) {
        document.getElementById('DOBYear').focus();
        document.getElementById("AddNewLoanSubButt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    } else {

        todayDay = document.getElementById('DOBDayTithi').value;
        todayMonth = document.getElementById('DOBMonth').value;
        todayPaksha = document.getElementById('DOBDayPaksh').value;
        todayYear = document.getElementById('DOBYear').value;
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if (xmlhttp.responseText == null || xmlhttp.responseText == '') {
                    alert("This date is not available in database!");
                } else {
                    chkEngDt(xmlhttp.responseText);
                }
            }
        };
        xmlhttp.open("POST", "include/php/olglchend.php?todayDay=" + todayDay + "&todayMonth=" + todayMonth + "&todayPaksha=" + todayPaksha + "&todayYear=" + todayYear, true);
        xmlhttp.send();
        document.getElementById("AddNewLoanSubButt").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }

}
/**********End code to change function to add validation @Author:SHRI10JUL15*************/
function chkEngDt(engDate) {

    var strArray = new Array();
    strArray = engDate.split(" ");
    var todayEngDay = strArray[0];
    var todayEngMonth = strArray[1];
    var todayEngYear = strArray[2];
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("engDateDiv").innerHTML = xmlhttp2.responseText;
        }
    };
    xmlhttp2.open("POST", "include/php/olggengdt.php?todayEngDay=" + todayEngDay + "&todayEngMonth=" + todayEngMonth + "&todayEngYear=" + todayEngYear, true);
    xmlhttp2.send();
}
//**************************End code to update Date in Layout @Author:ANUJA04JULY15*************************************
/****************Start code to add function for girvi trans Packet number update @Author:ANUJA29JUL15***********************/
function update_girvi_trans_packet_num(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertUpdateGirviTransPacketNum;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}

function alertUpdateGirviTransPacketNum() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        if (xmlhttp.responseText == 'PacketNumAlreadyExist') {
            document.getElementById("updateGirviPacketNumAlreadyExistMessage").style.visibility = "visible";
            document.getElementById("girviTransPacketNo").focus();
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
    document.getElementById("updateGirviPacketNumAlreadyExistMessage").style.visibility = "hidden";
}
function updateGirviTransPacketNum(documentRootPath, custId, girviId, gTransId, girviPacketNo, transType, firmId, DOB, prinAmt, panel) {
    upDatePanelName = panel;
    document.getElementById("updateGirviPacketNumAlreadyExistMessage").style.visibility = "hidden";
    document.getElementById("updateTransGirviPacketNoButton").style.visibility = "hidden";

    var girviPacketNum = girviPacketNo.value;


    if (validateEmptyField(girviPacketNum, "Please enter Packet Number!") == false ||
            validateNum(girviPacketNum, "Accept only numeric characters without space character!") == false) {
        document.getElementById("girviTransPacketNo").focus();
        document.getElementById("updateTransGirviPacketNoButton").style.visibility = "visible";
        return false;
    } else {
        confirm_box = confirm("Do you really want to update Packet Number?");
        if (confirm_box == true) {
            var poststr = "custId=" + custId + "&girviId=" + girviId
                    + "&gTransId=" + gTransId
                    + "&girviPacketNum=" + girviPacketNum
                    + "&transType=" + transType
                    + "&firmId=" + firmId
                    + "&DOB=" + DOB
                    + "&prinAmt=" + prinAmt
                    + "&panel=" + panel;

            update_girvi_trans_packet_num(documentRootPath + '/include/php/olgtpnup.php', poststr);
        }
    }
    document.getElementById("updateTransGirviPacketNoButton").style.visibility = "visible";
    return false;
}
/****************End code to add function for girvi trans Packet number update @Author:ANUJA29JUL15***********************/
/****************Start code to add function for girvi trans Packet number update in money Lender @Author:ANUJA29JUL15***********************/
function update_girvi_trans_packet_ml_num(url, parameters) {

    loadXMLDoc();

    xmlhttp.onreadystatechange = alertUpdateGirviTransPacketMLNum;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);

}

function alertUpdateGirviTransPacketMLNum() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        if (xmlhttp.responseText == 'PacketNumAlreadyExist') {
            document.getElementById("updateGirviPacketNumAlreadyExistMessage" + gTransferID).style.visibility = "visible";
            document.getElementById("girviTransPacketNo" + gTransferID).focus();
            window.setTimeout(closeTransPackMlMessageDiv, 2000);
        } else {

            document.getElementById("loanDetailsUpdateDiv").innerHTML = xmlhttp.responseText;
        }
    }

}
function closeTransPackMlMessageDiv() {

    //document.getElementById("updateGirviSerialNumAlreadyExistMessage").innerHTML = "";
    document.getElementById("updateGirviPacketNumAlreadyExistMessage" + gTransferID).style.visibility = "hidden";
}
var gTransferID;
function updateGirviTransPacketMlNum(documentRootPath, custId, girviId, gTransId, girviPacketMlNum, transType, firmId, DOB, prinAmt, preSerialNo, postSerialNo, mlId, loanId, panel) {
    // alert(girviPacketMlNum);
    gTransferID = gTransId;
    document.getElementById("updateGirviPacketNumAlreadyExistMessage" + gTransId).style.visibility = "hidden";
    document.getElementById("updateTransGirviPacketNoButton" + gTransId).style.visibility = "hidden";

    var girviPackMlNum = girviPacketMlNum.value;


    if (validateEmptyField(girviPackMlNum, "Please enter Packet Number!") == false ||
            validateNum(girviPackMlNum, "Accept only numeric characters without space character!") == false) {
        document.getElementById("girviTransPacketNo" + gTransId).focus();
        document.getElementById("updateTransGirviPacketNoButton" + gTransId).style.visibility = "visible";
        return false;
    } else {
        confirm_box = confirm("Do you really want to update Packet Number?");
        if (confirm_box == true) {
            var poststr = "custId=" + custId + "&girviId=" + girviId
                    + "&gTransId=" + gTransId
                    + "&girviPacketMlNum=" + girviPackMlNum
                    + "&transType=" + transType
                    + "&firmId=" + firmId
                    + "&DOB=" + DOB
                    + "&prinAmt=" + prinAmt
                    + "&preSerialNo=" + preSerialNo
                    + "&postSerialNo=" + postSerialNo
                    + "&mlId=" + mlId
                    + "&loanId=" + loanId;

            update_girvi_trans_packet_ml_num(documentRootPath + '/include/php/ormlupkn.php', poststr);
        }
    }
    document.getElementById("updateTransGirviPacketNoButton" + gTransId).style.visibility = "visible";
    return false;
}
/****************End code to add function for girvi trans Packet number update money Lender @Author:ANUJA29JUL15***********************/
/********Start code to add if code for Supplier wholesale  @Author:ANUJA08AUG15********* */

function calcSuppWholeItemBalance() {
    var metalEntered = 0;
    var count = 0;
    var prefix = 'stock';
    var metalCount = document.getElementById("metalCount").value;
    metalCountBal = metalCount;
    if (document.getElementById('metalPanel').value == 'StockPayment') {
        count = 1;
        delId = 'del' + 1;
    } else if (document.getElementById('metalPanel').value == 'StockPayUp') {
        getMetalDiv = document.getElementById('noOfRawMet').value;
        count = document.getElementById('rawId').value;
        var delId = 'del' + count;
    }
    var totAmtRec = 0;
    var gdBal = 0;
    var slBal = 0;
    var goldWeight = 0;
    var totGoldBal = 0;
    var totSilverBal = 0;

    document.getElementById('metal1WtBalPay').value = '0.000 GM';
    document.getElementById('metal2WtBalPay').value = '0.000 GM';
    //    alert('getMetalDiv'+getMetalDiv);
    for (var dc = count; getMetalDiv != ''; dc++) {
        if (document.getElementById('metalDel' + dc).value != 'Deleted') {
            var payTotalWeight1 = document.getElementById(prefix + 'PayMetal1RecWt' + dc).value;
            var payTotalWeightType1 = document.getElementById(prefix + 'PayMetal1RecWtType' + dc).value;
            var payMetalRate1 = document.getElementById(prefix + 'PayMetal1Rate' + dc).value;
            var payMetalTunch1 = document.getElementById(prefix + 'PayMetal1Tunch' + dc).value;
            var goldWeight = (payTotalWeight1 * payMetalTunch1) / 100;
            document.getElementById(prefix + 'PayMetal1FnWt' + dc).value = (goldWeight).toFixed(3);

            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold' || document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Alloy') {
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) * document.getElementById('gmWtInKg').value).toFixed(3);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInGm').value).toFixed(3);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('gmWtInMg').value).toFixed(3);
                }
                if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Gold') {
                    var payMetalDueWeightType1 = document.getElementById(prefix + 'GoldTotFineWtType').value;
                    if (gdBal == '') {
                        gdBal = document.getElementById(prefix + 'GoldTotFineWt').value;
                    }
                    if (payMetalDueWeightType1 == 'KG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight / 1000)).toFixed(3);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000 * 1000))).toFixed(3);
                        }
                    } else if (payMetalDueWeightType1 == 'GM') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat((gdBal) - goldWeight).toFixed(3);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat(((gdBal) - goldWeight / (1000))).toFixed(3);
                        }
                    } else if (payMetalDueWeightType1 == 'MG') {
                        if (payTotalWeightType1 == 'KG') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000 * 1000)).toFixed(3);
                        } else if (payTotalWeightType1 == 'GM') {
                            gdBal = parseFloat(((gdBal) - goldWeight * 1000)).toFixed(3);
                        } else if (payTotalWeightType1 == 'MG') {
                            gdBal = parseFloat((gdBal - goldWeight)).toFixed(3);
                        }
                    }

                    totGoldBal = (parseFloat(totGoldBal) + parseFloat(goldWeight)).toFixed(3);

                    document.getElementById('metal1WtBalPay').value = totGoldBal + ' ' + payMetalDueWeightType1;
                    document.getElementById('metal1WtPay').value = parseFloat(totGoldBal).toFixed(3);
                    document.getElementById(prefix + 'PayMetal1Bal' + dc).value = gdBal;
                    document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                    document.getElementById(prefix + 'PayMetal1WtBal').value = gdBal;
                    document.getElementById(prefix + 'PayMetal1WtBalType').value = payMetalDueWeightType1;
                    document.getElementById('metal1WtBal').value = gdBal;
                    document.getElementById('metal1WtBalType').value = payMetalDueWeightType1;
                    var goldbal = gdBal;

                    document.getElementById('metalGoldWtBal').value = gdBal;
                    if (document.getElementById('metalPanel').value != 'StockPayUp') {
                        document.getElementById('wholeAdjGdPay').value = goldbal;
                    }

                    if (document.getElementById('metal1WtPrv').value == '' || document.getElementById('metal1WtPrv').value == 'NaN') {
                        document.getElementById('metal1WtPrv').value = '0.00';
                    }
                    if (document.getElementById('metal1WtPur').value == '' || document.getElementById('metal1WtPur').value == 'NaN') {
                        document.getElementById('metal1WtPur').value = '0.00';
                    }
                    if (document.getElementById('metal1WtPay').value == '' || document.getElementById('metal1WtPay').value == 'NaN') {
                        document.getElementById('metal1WtPay').value = '0.00';
                    }

                    document.getElementById('metal1WtTotalBal').value = parseFloat(parseFloat(document.getElementById('metal1WtPrv').value) + parseFloat(document.getElementById('metal1WtPur').value) - parseFloat(document.getElementById('metal1WtPay').value)).toFixed(3);
                    document.getElementById('metal1WtTotalBal').value = document.getElementById('metal1WtTotalBal').value + ' ' + payMetalDueWeightType1;

                    if (goldbal != gdBal) {
                        document.getElementById('metalGoldWtBal').value = parseFloat(gdBal - goldbal).toFixed(3);
                        //                      
                    }
                }

            }
            if (document.getElementById(prefix + 'PayMetalType1' + dc).value == 'Silver') {
                if (payTotalWeightType1 == 'KG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1 * document.getElementById('srGmWtInKg').value)).toFixed(2);
                } else if (payTotalWeightType1 == 'GM') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / document.getElementById('srGmWtInGm').value).toFixed(2);
                } else if (payTotalWeightType1 == 'MG') {
                    document.getElementById(prefix + 'PayMetal1Val' + dc).value = ((goldWeight * payMetalRate1) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                }
                payMetalDueWeightType1 = document.getElementById(prefix + 'SilverTotFineWtType').value;
                if (slBal == '') {
                    slBal = document.getElementById(prefix + 'SilverTotFineWt').value;
                }
                if (payMetalDueWeightType1 == 'KG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat((slBal) - goldWeight).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - goldWeight / 1000)).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - goldWeight / (1000 * 1000))).toFixed(3);
                    }
                } else if (payMetalDueWeightType1 == 'GM') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - goldWeight * 1000)).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat((slBal) - goldWeight).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat(((slBal) - goldWeight / (1000))).toFixed(3);
                    }
                } else if (payMetalDueWeightType1 == 'MG') {
                    if (payTotalWeightType1 == 'KG') {
                        slBal = parseFloat(((slBal) - goldWeight * 1000 * 1000)).toFixed(3);
                    } else if (payTotalWeightType1 == 'GM') {
                        slBal = parseFloat(((slBal) - goldWeight * 1000)).toFixed(3);
                    } else if (payTotalWeightType1 == 'MG') {
                        slBal = parseFloat((slBal - goldWeight)).toFixed(3);
                    }
                }
                totSilverBal = (parseFloat(totSilverBal) + parseFloat(goldWeight)).toFixed(3);
                document.getElementById('metal2WtBalPay').value = totSilverBal + ' ' + payMetalDueWeightType1;
                document.getElementById('metal2WtPay').value = parseFloat(totSilverBal).toFixed(2);
                document.getElementById(prefix + 'PayMetal1Bal' + dc).value = slBal;
                document.getElementById(prefix + 'PayMetalBal1Type' + dc).value = payMetalDueWeightType1;
                document.getElementById(prefix + 'PayMetal2WtBal').value = slBal;
                document.getElementById(prefix + 'PayMetal2WtBalType').value = payMetalDueWeightType1;
                document.getElementById('metal2WtBal').value = slBal + ' ' + payMetalDueWeightType1;
                var silverbal = slBal;
                //                document.getElementById('metal21WtBal').value = document.getElementById('metal2WtBal').value + '' + payMetalDueWeightType1;

                if (document.getElementById('metalPanel').value != 'StockPayUp') {
                    document.getElementById('wholeAdSrPay').value = silverbal;
                }

                if (document.getElementById('metal2WtPrv').value == '' || document.getElementById('metal2WtPrv').value == 'NaN') {
                    document.getElementById('metal2WtPrv').value = '0.00';
                }
                if (document.getElementById('metal2WtPur').value == '' || document.getElementById('metal2WtPur').value == 'NaN') {
                    document.getElementById('metal2WtPur').value = '0.00';
                }
                if (document.getElementById('metal2WtPay').value == '' || document.getElementById('metal2WtPay').value == 'NaN') {
                    document.getElementById('metal2WtPay').value = '0.00';
                }
                //                alert('prev wt=' + document.getElementById('metal2WtPrv').value);
                //                alert('pur'+document.getElementById('metal2WtPur').value);
                //                alert('pay='+document.getElementById('metal2WtPay').value);
                document.getElementById('metal2WtTotalBal').value = parseFloat(parseFloat(document.getElementById('metal2WtPrv').value) + parseFloat(document.getElementById('metal2WtPur').value) - parseFloat(document.getElementById('metal2WtPay').value)).toFixed(3);
                //                alert(document.getElementById('metal2WtTotalBal').value);
                document.getElementById('metal2WtTotalBal').value = document.getElementById('metal2WtTotalBal').value + ' ' + payMetalDueWeightType1;
                document.getElementById('metalSilverWtBal').value = slBal;
                //                document.getElementById('metalSilverWtBalType').value = payMetalDueWeightType1;
                if (silverbal != slBal) {
                    document.getElementById('metalSilverWtBal').value = parseFloat(slBal - silverbal).toFixed(3);
                    //                    document.getElementById('metalSilverWtBalType').value = payMetalDueWeightType1;
                }
            }
            var metalValuation1 = document.getElementById(prefix + 'PayMetal1Val' + dc).value;
            if (metalValuation1 == '') {
                metalValuation1 = 0;
            }
            totAmtRec += parseFloat(metalValuation1);
            document.getElementById(prefix + 'PayTotAmtRec').value = (totAmtRec).toFixed(2);

            var gdRtCut = document.getElementById('wholeAdjGdPay').value;
            document.getElementById('metal11WtBal').value = gdRtCut + ' ' + document.getElementById('metalGoldWtBalType').value;
            var srRtCut = document.getElementById('wholeAdSrPay').value;
            document.getElementById('metal12WtBal').value = srRtCut + ' ' + document.getElementById('metalSilverWtBalType').value;
            if (gdRtCut == '' || gdRtCut == 'NaN') {
                gdRtCut = '0.000';
            }
            if (srRtCut == '' || srRtCut == 'NaN') {
                srRtCut = '0.000';
            }
            var finGdBal = Math.abs(parseFloat(document.getElementById('metal1WtTotalBal').value) - parseFloat(gdRtCut)).toFixed(3);

            var finSrBal = Math.abs(parseFloat(document.getElementById('metal2WtTotalBal').value) - parseFloat(srRtCut)).toFixed(3);
            if (finGdBal == '' || finGdBal == 'NaN') {
                finGdBal = '0.000';
            }
            if (finSrBal == '' || finSrBal == 'NaN') {
                finSrBal = '0.000';
            }
            document.getElementById('metal2WtFinalGdBal').value = finGdBal;
            document.getElementById('metal2WtFinalSlBal').value = finSrBal;

            document.getElementById('metal1WtFinalBal').value = finGdBal + ' ' + document.getElementById('metalGoldWtBalType').value;
            document.getElementById('metal2WtFinalBal').value = finSrBal + ' ' + document.getElementById('metalSilverWtBalType').value;
            calcCashBalance(prefix);
        }

        metalEntered++;
    }
    //    alert(document.getElementById('wholeAdSrPay').value);

    return false;
}
/********Start code to add to udharGdWt,udharSrWt,udharSrWtType goldTotpurBal,goldTotpurBalType,silverTotPurBal,silverTotPurBalTypeand,goldVal, srVal etc option in NoRateCut condition @Author:ANUJA28MAY15******************************/
function callSuppRateCutOption(dRoot, rateCutOption, goldTotFnWt, goldTotFnWtTyp, goldRate, srTotFnWt, srTotFnWtTyp, srRate, udhaarFinalBalLeft, udharGdWt, udharGdWtType,
        udharSrWt, udharSrWtType, goldTotpurBal, goldTotpurBalType, silverTotPurBal, silverTotPurBalType, totOthrChrg, udharAmount) {
    //    alert(goldRate+'-'+srRate);
    confirm_box = confirm("Do you really want to cut rate ?");
    if (confirm_box == true) {
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("payTotAmtDiv").innerHTML = xmlhttp.responseText;
                calcSuppWholeItemBalance();
                wholeAdjCalc();
                showRateCutTotAmnt();
            } else {
                document.getElementById("main_ajax_loading_div").innerHTML = "<img src='images/ajaxLoad.gif' />";
            }
        };
        if (rateCutOption == 'NoRateCut') {
            xmlhttp.open("POST", dRoot + "/include/php/ogspwsdv.php?rateCutOption=" + rateCutOption + "&goldTotFnWt=" + goldTotFnWt + "&goldTotFnWtTyp=" + goldTotFnWtTyp +
                    "&goldRate=" + goldRate + "&srTotFnWt=" + srTotFnWt + "&srTotFnWtTyp=" + srTotFnWtTyp + "&srRate=" + srRate + "&udhaarFinalBalLeft=" + udhaarFinalBalLeft + "&udharGdWt=" + udharGdWt + "&udharGdWtType=" + udharGdWtType +
                    "&udharSrWt=" + udharSrWt + "&udharSrWtType=" + udharSrWtType + "&goldTotpurBal=" + goldTotpurBal + "&goldTotpurBalType=" + goldTotpurBalType + "&silverTotPurBal=" + silverTotPurBal + "&silverTotPurBalType=" + silverTotPurBalType + "&totOthrChrg=" + totOthrChrg + "&udharAmount=" + udharAmount, true);
        } else {
            xmlhttp.open("POST", dRoot + "/include/php/ogspwrtct.php?rateCutOption=" + rateCutOption + "&goldTotFnWt=" + goldTotFnWt + "&goldTotFnWtTyp=" + goldTotFnWtTyp +
                    "&goldRate=" + goldRate + "&srTotFnWt=" + srTotFnWt + "&srTotFnWtTyp=" + srTotFnWtTyp + "&srRate=" + srRate + "&udhaarFinalBalLeft=" + udhaarFinalBalLeft + "&udharGdWt=" + udharGdWt + "&udharGdWtType=" + udharGdWtType +
                    "&udharSrWt=" + udharSrWt + "&udharSrWtType=" + udharSrWtType + "&goldTotpurBal=" + goldTotpurBal + "&goldTotpurBalType=" + goldTotpurBalType + "&silverTotPurBal=" + silverTotPurBal + "&silverTotPurBalType=" + silverTotPurBalType + "&totOthrChrg=" + totOthrChrg + "&udharAmount=" + udharAmount, true);
        }
        xmlhttp.send();
    }
}
/****Start code to change function to add parameters for prev metal type @OMMODTAG SHRI_27NOV15************/
function getSuppWholeMoreRawMetalDiv(metalCnt, panelName, firmId, rawGdPreId, rawGdPostId, metalType, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId,
        metalPanelName, mcntr, rawPreId, rawPostId, rawMetType) {
    metalPanel = panelName;
    metalCount = metalCnt;
    if (metalCount != '') {
        getMetalDiv = metalCount;
    }
    //     alert('mcntr='+mcntr+' metalCount='+metalCnt+' rawSlPostId=' + rawSlPostId + ' rawAlPostId=' + rawAlPostId+' metalTypePanel='+metalPanelName);
    var poststr = "metalDivCount=" + metalCount
            + "&panelName=" + panelName + "&firmId=" + firmId
            + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&metalType=" + metalType + "&rawSlPreId=" + rawSlPreId +
            "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId +
            "&rawAlPostId=" + rawAlPostId + "&metalPanelName=" + metalPanelName
            + "&mcntr=" + mcntr + "&rawPreId=" + rawPreId + "&rawPostId=" + rawPostId + "&rawMetalType=" + rawMetType;

    get_more_raw_metal_div('include/php/ogspwpyt.php', poststr);

    return false;
}
function getSuppWholeRawMetalType(panelName, metalType, metalCount, firmId, rawGdPreId, rawGdPostId, rawSlPreId, rawSlPostId, rawAlPreId, rawAlPostId, metalTypePanel, cntr, prvRwMetalType, metalPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("rawMetalIdDiv" + metalCount).innerHTML = xmlhttp.responseText;
            // calcItemBalance();
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogspwpyt.php?panelName=" + panelName + "&metalType=" + metalType +
            "&metalDivCount=" + metalCount + "&rawGdPreId=" + rawGdPreId + "&rawGdPostId=" + rawGdPostId +
            "&rawSlPreId=" + rawSlPreId + "&rawSlPostId=" + rawSlPostId + "&rawAlPreId=" + rawAlPreId + "&rawAlPostId=" + rawAlPostId + "&firmId=" + firmId +
            "&metalTypePanel=" + metalTypePanel + "&cntr=" + cntr + "&prvRawMetType=" + prvRwMetalType + "&metalPanel=" + metalPanel, true);
    xmlhttp.send();

}
/****End code to change function to add parameters for prev metal type @OMMODTAG SHRI_27NOV15************/
/********End code to add to udharGdWt,udharSrWt,udharSrWtType goldTotpurBal,goldTotpurBalType,silverTotPurBal,silverTotPurBalTypeand,goldVal, srVal etc option in NoRateCut condition @Author:ANUJA28MAY15******************************/
function calcFinalBalLeft(prefix) {
    if (document.getElementById(prefix + 'PayTotAmtRec').value == '') {
        document.getElementById(prefix + 'PayTotAmtRec').value = 0;
    }
    var totalCashPaidAmt = document.getElementById(prefix + 'PayCashAmtRec').value;
    if (totalCashPaidAmt == null || totalCashPaidAmt == '') {
        totalCashPaidAmt = 0;
    }
    //        alert(document.getElementById('slPrWholeAdvCashDisp').value);
    if (document.getElementById('slPrWholeAdvCashDisp').value == '' || document.getElementById('slPrWholeAdvCashDisp').value == null) {
        document.getElementById('slPrWholeAdvCashDisp').value = '0.00';
    }
    var advCash = document.getElementById('slPrWholeAdvCash').value;
    //    alert(advCash);
    //alert(parseFloat(Math.abs(document.getElementById('slPrWholeAdvOthrCash').value)));
    if (advCash > 0) {
        document.getElementById('slPrWholeFinalCash').value = parseFloat((parseFloat(Math.abs(advCash)) + parseFloat(document.getElementById('slPrWholeAdvOthrCash').value)) - parseFloat(totalCashPaidAmt)).toFixed(2);
    } else {
        document.getElementById('slPrWholeFinalCash').value = parseFloat(parseFloat(document.getElementById('slPrWholeAdvOthrCash').value) - (parseFloat(totalCashPaidAmt) + parseFloat(Math.abs(advCash)))).toFixed(2);
    }
    document.getElementById('slPrWholeFinalCashDisp').value = document.getElementById('slPrWholeFinalCash').value;

    //    alert(document.getElementById('slPrWholeFinalCashDisp').value);

    if (document.getElementById('slPrWholeFinalCash').value > 0) {
        document.getElementById('slPrWholeFinalCashLeft').value = "FINAL CASH LEFT-";
    } else {
        document.getElementById('slPrWholeFinalCashLeft').value = "FINAL CASH DEP-";
    }
    if (document.getElementById('slPrWholeFinalCash').value < 0) {
        document.getElementById('slPrWholeFinalCash').value = Math.abs(document.getElementById('slPrWholeFinalCash').value);
    }
    //    alert(document.getElementById('slPrWholeFinalCash').value);
}

//************Start code to add Finance Loan function @AUTHOR:ANUJA01OCT15****************** 
/**********Start code to add validation for correct date @OMMODTAG SHRI_05NOV15**********/
function addNewLoanFanEMI() {
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    document.getElementById("addFinSubButDiv").style.visibility = "hidden";
    var uType = document.getElementById("loanType").value;
    var girviDateDay = document.getElementById("DOBDay").value;
    var girviDateMMM = document.getElementById("DOBMonth").value;
    var girviDateYY = document.getElementById("DOBYear").value;
    var girviDateStr = document.getElementById("DOBMonth").value + ' ' + document.getElementById("DOBDay").value + ', ' + document.getElementById("DOBYear").value;
    var girviDate = new Date(girviDateStr); // Girvi Date
    var todayDate = new Date(); // Today Date
    var milliGirviDate = girviDate.getTime();
    var milliTodayDate = todayDate.getTime();
    var datesDiff = milliTodayDate - milliGirviDate;
    var monthDay = document.getElementById('loanEMINoOfDays').value;
    if (typeof (document.getElementById('nepaliDateIndicator')) != 'undefined' &&
            (document.getElementById('nepaliDateIndicator') != null)) {
        var nepaliDateIndicator = document.getElementById("nepaliDateIndicator").value;
    } else {
        var nepaliDateIndicator = '';
    }
    var cashfAmt = document.getElementById('girvFCashAmtRec').value;
    var onlinefAmt = document.getElementById('girvFOnlineAmtRec').value;
    var bankfAmt = document.getElementById('girvFBankAmtRec').value;
    var cardfAmt = document.getElementById('girvFCardAmtRec').value;
    var totalfAmt = document.getElementById('loanFinalAmount').value;
    if (cashfAmt == '' || cashfAmt == null) {
        cashfAmt = 0;
    }
    if (onlinefAmt == '' || onlinefAmt == null) {
        onlinefAmt = 0;
    }
    if (bankfAmt == '' || bankfAmt == null) {
        bankfAmt = 0;
    }
    if (cardfAmt == '' || cardfAmt == null) {
        cardfAmt = 0;
    }

    var totalEnterAmt = parseFloat(cashfAmt) + parseFloat(onlinefAmt) + parseFloat(cardfAmt) + parseFloat(bankfAmt);
    if (totalEnterAmt != totalfAmt) {
        alert("Please Check Paid Amount  Deposit Amount...");
        document.getElementById('girvFCashAmtRec').value = totalfAmt;
        document.getElementById('girvFOnlineAmtRec').value = 0;
        document.getElementById('girvFBankAmtRec').value = 0;
        document.getElementById('girvFCardAmtRec').value = 0;
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addFinSubButDiv").style.visibility = "visible";
        return false;
        exit();
    }
    //End to change code to add condition for girvi date @Author:SHRI31MAR15
    if (datesDiff < 0 && nepaliDateIndicator != 'YES') {
        alert('Please Select the correct Girvi Date!');
        document.getElementById("DOBDay").focus();
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addFinSubButDiv").style.visibility = "visible";
        return false;
        exit();
    } else {
        if (monthDay == null || monthDay == '') {
            alert('Please Select Frequency Days / Months...');
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addFinSubButDiv").style.visibility = "visible";
            return false;
            exit();
        } else if (girviDateMMM == 'FEB' || girviDateMMM == 'APR' || girviDateMMM == 'JUN' || girviDateMMM == 'SEP' || girviDateMMM == 'NOV') {
            if (girviDateMMM == 'FEB' && girviDateDay > 29 && girviDateYY % 4 == 0) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 29 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addFinSubButDiv").style.visibility = "visible";
                return false;
                exit();
            }
            if (girviDateMMM == 'FEB' && girviDateDay > 28 && girviDateYY % 4 != 0) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' for this selected year has only max 28 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addFinSubButDiv").style.visibility = "visible";
                return false;
                exit();
            }
            if (girviDateDay > 30) {
                alert('Please select correct Date, Month ' + girviDateMMM + ' has only max 30 days.');
                document.getElementById("DOBDay").focus();
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addFinSubButDiv").style.visibility = "visible";
                return false;
                exit();
            }
        }
        if (uType == 'OnPurchase') {
            if (valAddFLoanOnPurEMIInputs()) {
                return true;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addFinSubButDiv").style.visibility = "visible";
                return false;
            }
        } else {
            if (validateAddFLaonEMIInputs()) {
                return true;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("addFinSubButDiv").style.visibility = "visible";
            }
        }
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addFinSubButDiv").style.visibility = "visible";
        return false;
    }
    return false;
}
/**********End code to add validation for correct date @OMMODTAG SHRI_05NOV15**********/
function validateAddFLaonEMIInputs() {
    if (validateEmptyField(document.getElementById("principalAmount").value, "Please Enter Principal Amount!") == false ||
            validateNum(document.getElementById("principalAmount").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("principalAmount").focus();
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
    } else if (validateEmptyField(document.getElementById("loanSerialNo").value, "Please enter Serial Number!") == false ||
            validateNum(document.getElementById("loanSerialNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("loanSerialNo").focus();
        return false;
    } else if (validateSelectField(document.getElementById("loanFirmId").value, "Please select Loan Firm Id!") == false) {
        document.getElementById("loanFirmId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("loanEMIOccurrences").value, "Please Enter Loan EMI Occurrences!") == false) {
        document.getElementById("loanEMIOccurrences").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("loanEMINoOfDays").value, "Please Enter Loan EMI Number of days!") == false) {
        document.getElementById("loanEMINoOfDays").focus();
        return false;
    } else if (validateSelectField(document.getElementById("girviPayAccId").value, "Please Select Payment Account!") == false) {
        document.getElementById("girviPayAccId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("girviDrAccId").value, "Please Select Cr Account!") == false) {
        document.getElementById("girviDrAccId").focus();
        return false;
    } else {
        return true;
    }
}

function valAddFLoanOnPurEMIInputs() {
    //    alert('girviItemCount=' + girviItemCount);
    if (validateEmptyField(document.getElementById("principalAmount").value, "Please enter Udhaar Amount!") == false ||
            validateNum(document.getElementById("principalAmount").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("principalAmount").focus();
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
    } else if (validateEmptyField(document.getElementById("loanSerialNo").value, "Please enter Serial Number!") == false ||
            validateNum(document.getElementById("loanSerialNo").value, "Accept only numeric characters without space character!") == false) {
        document.getElementById("loanSerialNo").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("selROIValue").value, "Please Select ROI!") == false) {
        document.getElementById("selROIValue").focus();
        return false;
    } else if (validateSelectField(document.getElementById("loanFirmId").value, "Please select Loan Firm Id!") == false) {
        document.getElementById("loanFirmId").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("loanEMINoOfDays").value, "Please enter Loan EMI Number of days!") == false) {
        document.getElementById("loanEMINoOfDays").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("loanEMIOccurrences").value, "Please enter Loan EMI Occurrences!") == false) {
        document.getElementById("loanEMIOccurrences").focus();
        return false;
    } else if (girviItemCount != '') {
        girviItemEntered = 0;
        for (var dc = 1; dc <= girviItemCount; dc++) {
            if (document.getElementById("girviItemDel" + dc).value != 'Deleted') {
                if (validateEmptyField(document.getElementById("itemName" + dc).value, "Please select Item Name " + dc + "!") == false) {
                    document.getElementById("itemName" + dc).focus();
                    return false;
                } else if (document.getElementById("girviItemPieces" + dc).value == 0 ||
                        validateNum(document.getElementById("girviItemPieces" + dc).value, "Accept only numeric characters without space character!") == false) {
                    if (document.getElementById("girviItemPieces" + dc).value == 0) {
                        alert('Please enter number of Pieces, 0 or space not accepted!');
                    }
                    document.getElementById("girviItemPieces" + dc).focus();
                    return false;
                } else if (document.getElementById("girviItemType" + dc).value != 'Other') {
                    if (validateEmptyField(document.getElementById("girviItemWeight" + dc).value, "Please enter Gross Weight!") == false ||
                            validateNumWithDot(document.getElementById("girviItemWeight" + dc).value, "Accept only numeric characters without space character!") == false) {
                        document.getElementById("girviItemWeight" + dc).focus();
                        return false;
                    } else if (validateSelectField(document.getElementById("girviItemWeightType" + dc).value, "Please select Gross Weight Type!") == false) {
                        document.getElementById("girviItemWeightType" + dc).focus();
                        return false;
                    } else if (validateEmptyField(document.getElementById("girviItemVal" + dc).value, "Please enter Item Valuation!") == false ||
                            validateNumWithDot(document.getElementById("girviItemVal" + dc).value, "Accept only numeric characters without space character!") == false) {
                        document.getElementById("girviItemVal" + dc).focus();
                        return false;
                    }
                    //                    else if (validateEmptyField(document.getElementById("itemWeight" + dc).value, "Please enter Item Net Weight!") == false ||
                    //                            validateNumWithDot(document.getElementById("itemWeight" + dc).value, "Accept only numeric characters without space character!") == false) {
                    //                        document.getElementById("itemWeight" + dc).focus();
                    //                        return false;
                    //                    }
                    //                    else if (validateSelectField(document.getElementById("weightType" + dc).value, "Please select Weight Type!") == false) {
                    //                        document.getElementById("weightType" + dc).focus();
                    //                        return false;
                    //                    }
                    //                    else if (validateSelectField(document.getElementById("itemTunch" + dc).value, "Please select Item Tunch!") == false) {
                    //                        document.getElementById("itemTunch" + dc).focus();
                    //                        return false;
                    //                    }
                } else if (document.getElementById("girviItemType" + dc).value == 'Other') {
                    if (validateEmptyField(document.getElementById("girviItemVal" + dc).value, "Please enter Item Valuation, for other item it is mandatory!") == false ||
                            validateNumWithDot(document.getElementById("girviItemVal" + dc).value, "Accept only numeric characters without space character!") == false) {
                        document.getElementById("girviItemVal" + dc).focus();
                        return false;
                    }
                }
                girviItemEntered++;
            }
        }
        document.getElementById("noOfGirviItems").value = girviItemEntered;
    } else if (validateSelectField(document.getElementById("girviPayAccId").value, "Please Select Payment Account!") == false) {
        document.getElementById("girviPayAccId").focus();
        return false;
    } else if (validateSelectField(document.getElementById("girviDrAccId").value, "Please Select Cr Account!") == false) {
        document.getElementById("girviDrAccId").focus();
        return false;
    }
    return true;
}

//************* Start Show Add Loan Item Div for Finance @AUTHOR:ANUJA05OCT15 *****************
function show_Loan_Add_Item_Opt(url) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = alertShowAddLoanFItemDiv;

    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send();

}
/***************Start code to add focus @Author:PRIYA19MAR14**********/
function alertShowAddLoanFItemDiv() {

    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "hidden";
        document.getElementById("addGirviItemDiv").innerHTML = xmlhttp.responseText;

        document.getElementById('girviItemType1').focus();
    } else {
        document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "visible";
    }
}
/***************End code to add focus @Author:PRIYA19MAR14**********/
/***************Start code to add itemdiv @Author:PRIYA19MAR14**********/
var girviItemCount;
var getGirviItemDiv;
var getCrysDivByKey;
function showAddLoanFItemDiv(selectUdhaarType, obj) {

    udhaarOption = selectUdhaarType.value;

    if (udhaarOption == 'OnPurchase') {
        getGirviItemDiv = 1;
        girviItemCount = 1;
        document.getElementById("hrVisible").style.visibility = "visible";
        show_Loan_Add_Item_Opt('include/php/omfaniadv.php');
    } else {
        document.getElementById("hrVisible").style.visibility = "hidden";
        show_Loan_Add_Item_Opt('include/php/ombbblnk.php');
    }
    return false;
}

function get_more_Loan_item_div(url, parameters) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertGetMoreFLoanItemDiv;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Content-length", parameters.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(parameters);
}
function alertGetMoreFLoanItemDiv() {
    var girviItemMin = girviItemCount - 1;
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("girviItemVar" + girviItemMin).value = 'false';
        document.getElementById("addGirviItemDiv" + girviItemCount).innerHTML = xmlhttp.responseText;
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function getMoreFLoanItemDiv(girviItmCnt, panelName) {
    //    alert(udhaarItmCnt);
    girviItemCount = girviItmCnt;
    if (girviItemCount != '') {
        getGirviItemDiv = girviItemCount;
    }
    //    alert(girviItemCount);
    var poststr = "girviItmCnt=" + girviItmCnt;
    //    alert(poststr);
    get_more_Loan_item_div('include/php/omfaniadv.php', poststr);
    return false;
}
function closeFLoanItemDiv(girviItmCnt, panelName) {
    var girviItemMin = girviItmCnt - 1;
    var d = girviItemCount - 1;
    var a = d - 1;
    document.getElementById("girviItemDel" + girviItmCnt).value = 'Deleted';
    if ((a == girviItemMin || d == girviItemMin) && girviItemMin != 0) {
        if (document.getElementById("girviItemDel" + girviItemMin).value != 'Deleted') {
            document.getElementById("girviItemVar" + girviItemMin).value = 'true';
        }
    }
    if (girviItemMin == 0) {
        document.getElementById("girviItemVar" + girviItmCnt).value = 'true';
    }
    document.getElementById("girviItemDiv" + girviItmCnt).innerHTML = "";
}
//**************************** Start code to remove lonInterest amt from function @Author:ANUJA15MAR16 *****************************************
//
//
//
//
function calcFinalAm() {
    //
    var principleAmt = document.getElementById('principalAmount').value;
    //
    //var roi = document.getElementById('loanRoi').value;
    //
    var loanProcessAmt = document.getElementById('loanProcessAmount').value
    //
    if (loanProcessAmt == '') {
        loanProcessAmt = 0;
    }
    //
    document.getElementById('loanFinalAmount').value = parseFloat(parseFloat(document.getElementById('principalAmount').value) - parseFloat(loanProcessAmt)).toFixed(2);
    //
    var Roi = document.getElementById('loanRoi').value;
    var RoiType = document.getElementById('loanRoiType').value;
    //
    var NoOfEmi = document.getElementById('loanEMIOccurrences').value;
    //
    var collectionAmount = 0;
    var collectionAmount1;
    if (Roi != '' && Roi != null) {
        //
        if (RoiType == 'FIX AMT') {
            collectionAmount = parseFloat(parseFloat(principleAmt / NoOfEmi) + parseFloat(Roi)).toFixed(2);
        } else {
            collectionAmount1 = parseFloat(parseFloat((principleAmt * Roi) / 100) * NoOfEmi).toFixed(2);
            collectionAmount = parseFloat(parseFloat(parseFloat(principleAmt) + parseFloat(collectionAmount1)) / NoOfEmi).toFixed(2);
        }
    } else {
        //
        collectionAmount = parseFloat(parseFloat(principleAmt / NoOfEmi)).toFixed(2);
        //
    }
    //
    document.getElementById('loanCollectAmount').value = Math_round(parseFloat(collectionAmount)).toFixed(2);
    //
    if (document.getElementById('loanCollectAmount').value == '' ||
            document.getElementById('loanCollectAmount').value == 'undefined' ||
            document.getElementById('loanCollectAmount').value == 'Infinity') {
        document.getElementById('loanCollectAmount').value = 0;
    }
    //
    if (document.getElementById('loanFinalAmount').value == 'NaN') {
        document.getElementById('loanFinalAmount').value = 0;
    }
    //
    //
}
//**************************** End code to remove lonInterest amt from function @Author:ANUJA15MAR16 *****************************************
//**************************** Show Paid Loan Details *****************************************
function showPaidFLoanDetailsDiv(custId, firmId) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "hidden";
            document.getElementById("custUdhaarDetailsDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/omfncpud.php?custId=" + custId + "&firmId=" + firmId, true);
    xmlhttp.send();
}
//**************************** Delete Udhaar Details *****************************************
/*****************Start code to add EMI @Author:PRIYA12NOV14*******************/
function change_Loan_EMI_ROI_Opt_Add(url) {

    loadXMLDoc();
    xmlhttp.onreadystatechange = alertchangeLoanEMIROIOptAdd;
    xmlhttp.open('POST', url, true);
    xmlhttp.setRequestHeader('Content-Type',
            'application/x-www-form-urlencoded');
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send();
}
/************Start code to add delay func @Author:PRIYA11SEP13********************/
function alertchangeLoanEMIROIOptAdd() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
        document.getElementById("ROIOption").innerHTML = xmlhttp.responseText;
        document.getElementById('selROIValue').focus();
        calcLoanInt(roiOption);
    } else {
        document.getElementById("main_ajax_loading_div").style.visibility = "visible";
    }
}
function changeLoanEMIROIOpt(selectROIType, obj, panelName) {
    roiOption = selectROIType.value;
    change_Loan_EMI_ROI_Opt_Add('include/php/omfneroi.php?roiOption=' + roiOption + "&omPanelDiv=" + panelName); //change in filename @OMMODTAG SHRI_24OCT15

    return false;
}
//************* End Show Add Loan Item Div for Finance @AUTHOR:ANUJA05OCT15 *****************
function calcLoanInt(interestType) {
    //    alert('calcLoanInt');
    var ROI = document.getElementById('selROIValue').value;
    //    var interesttype = document.getElementById('interestType').value;
    var loanMainAmt = document.getElementById('principalAmount').value;
    //    var loanDateDay = parseFloat(document.getElementById("DOBDay").value);
    //    var loanDateMM = parseFloat(document.getElementById("DOBMonth").value);
    //    var loanDateYY = parseFloat(document.getElementById("DOBYear").value);

    var loanstartDate = document.getElementById('DOBDay').value + ' ' + document.getElementById('DOBMonth').value + ' ' + document.getElementById('DOBYear').value;
    //    var loanEndDate = document.getElementById('loanDOBDay').value + ' ' + document.getElementById('loanDOBMonth').value + ' ' + document.getElementById('loanDOBYear').value;
    var loanMainDateStr = new Date(loanstartDate);
    //    alert(loanstartDate);
    //    alert(todayDateStr);
    var todayDateStr = new Date();

    var todayDD = todayDateStr.getDate();
    var todayMM = todayDateStr.getMonth() + 1; //January is 0!
    var todayYY = todayDateStr.getFullYear();

    var arrMonths = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
    var loanDepDate = new Date(todayDD + ' ' + arrMonths[todayMM - 1] + ' ' + todayYY);

    //    alert(loanDepDate);
    //    alert(loanMainDateStr);
    var milliGirviDepDate = loanDepDate.getTime();
    var milliGirviDate = loanMainDateStr.getTime();
    var datesDiff = (milliGirviDepDate - milliGirviDate) / 86400000;
    var girviDepDD = loanMainDateStr.getDate();
    var girviDepMM = loanMainDateStr.getMonth() + 1; //January is 0!
    var girviDepYY = loanMainDateStr.getFullYear();


    var month_lengths = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    var arrLeapYear = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];


    var noOfDaysInMM = 30;
    //    var totalNoOfDay =(strtotime(loanstartDate) - strtotime(loanEndDate))/86400;
    var interest;
    var days = 0;
    var month = 0;
    var years = 0;

    var start = parseFloat(girviDepYY + '' + smooth(girviDepMM) + '' + smooth(girviDepDD));
    var target = parseFloat(todayYY + '' + smooth(todayMM) + '' + smooth(todayDD));

    //    alert(start);
    //    alert(target);
    //    alert(datesDiff);
    var dateStr;
    if (start <= target) {
        var totalYears = 0;
        while (parseFloat((girviDepYY + 1) + '' + smooth(girviDepMM) + '' + smooth(girviDepDD)) <= target) {
            totalYears++;
            girviDepYY++;
        }
        var totalMonths = 0;
        while (parseFloat(girviDepYY + '' + smooth(girviDepMM + 1) + '' + smooth(girviDepDD)) <= target) {
            totalMonths++;
            girviDepMM++;

            if (girviDepMM > 12) {
                girviDepYY++;
                girviDepMM = 0;
                totalMonths--;
            }
            //            alert('totalMonths='+totalMonths);
        }
        var totalDays = 0;
        //        alert(parseFloat(girviDepYY + '' + girviDepMM + '' + ((girviDepDD) + 1)));
        while (parseFloat(girviDepYY + '' + smooth(girviDepMM) + '' + smooth(girviDepDD + 1)) <= target) {
            if ((girviDepYY % 100 == 0) && (girviDepYY % 400 == 0)) {
                month_lengths[1] = 29;
            } else {
                if (girviDepYY % 4 == 0) {
                    month_lengths[1] = 29;
                }
            }

            totalDays++;
            girviDepDD++;

            if (girviDepMM == 0) {
                totalDays = month_lengths[0] - parseFloat(girviDepDD) + 2;
            }

            if (girviDepDD > month_lengths[parseFloat(girviDepMM) - 1]) {
                girviDepMM = girviDepMM + 1;
                girviDepDD = 1;
                if (girviDepMM > 12) {
                    girviDepMM = 1;
                }
            }
        }
    }
    //    alert(totalDays + '-' + totalMonths + '-' + totalYears);
    days = totalDays;
    month = totalMonths;
    if (document.getElementById('loanEMINoOfDays').value != '' || document.getElementById('loanEMINoOfDays').value != null) {
        datesDiff = document.getElementById('loanEMINoOfDays').value;
    }
    if (days < 0) {
        days = 0;
    }

    if ((days >= 28) && (girviDepDD == '01') && (todayMM == '02') && (todayYY % 4 != 0)) {
        month++;
        days = days - 28;
    } else if ((days >= 28) && (girviDepDD != '01') && (todayDD == '28') && (todayMM == '02') && (todayYY % 4 != 0)) {
        month++;
        days = days - 28;
    } else if ((days == 28) && (girviDepMM == '02') && (girviDepDD != '01') && (todayMM == '03') && (todayYY % 4 != 0)) {
        month++;
        days = 0;
    } else if ((days >= 29) && (todayMM == '02') && (todayYY % 4 == 0)) {
        month++;
        days = days - 29;
    } else if ((days == 29) && (girviDepMM == '02') && (girviDepDD != '01') && (todayMM == '03') && (todayYY % 4 == 0)) {
        month++;
        days = 0;
    } else if ((days == 30) && (todayMM == '04' || todayMM == '06' || todayMM == '11') && (girviDepDD == '01')) {
        month++;
        days = 0;
    } else if ((days == 30) && (todayMM == '05' || todayMM == '07' || todayMM == '10' || todayMM == '12') && (girviDepDD != '01')) {
        if (girviDepDD == '02') {
            if (todayDD == '01') {
                month++;
                days = 0;
            }
        } else {
            month++;
            days = 0;
        }
    } else if ((days == 31)) {
        month++;
        days = 0;
    }
    if (month == 12) {
        years++;
        month = 0;
    }

    if (todayYY % 400 == 0 || (todayYY % 4 == 0 && todayYY % 100 != 0)) {
        noOfDaysInMM = arrLeapYear[todayMM - 1];
    } else {
        noOfDaysInMM = month_lengths[todayMM - 1];
    }
    //    alert(ROI + '-' + loanMainAmt);
    var perDayIntAnnually = (loanMainAmt * (ROI / 365)) / 100;
    var perDayInt = (loanMainAmt * (ROI / noOfDaysInMM)) / 100;
    if (interestType == 'Monthly') {
        var perYearInt = ((loanMainAmt * ROI) / 100) * 12;
        var perMonthInt = (loanMainAmt * ROI) / 100;
    }
    if (interestType == 'Monthly') {
        interest = perYearInt * years;
        interest = interest + perMonthInt * month;
        interest += perMonthInt;
        //        alert(perMonthInt+'-'+month);
    } else if (interestType == 'Annually') {
        interest = perDayIntAnnually * datesDiff;
    } else if (interestType == 'Weekly') {
        if (days > 21) {
            datesDiff = datesDiff - days + 30;
            interest = perDayInt * datesDiff;
        } else if (days > 14) {
            datesDiff = datesDiff - days + 21;
            interest = perDayInt * datesDiff;
        } else if (days > 7) {
            datesDiff = datesDiff - days + 14;
            interest = perDayInt * datesDiff;
        } else {
            datesDiff = datesDiff - days + 7;
            interest = perDayInt * datesDiff;
        }
    } else {   //Default Days Interest
        interest = perDayInt * datesDiff;
    }
    document.getElementById('loanInterest').value = parseFloat(interest).toFixed(2);
    calcFinalAm();
}
function smooth(number) {
    return number > 9 ? "" + number : "0" + number;
}
/**********Start code to add function @OMMODTAG ANUJA02NOV15******************************/
function showCollectionList() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/omfncml.php", true);
    xmlhttp.send();
}
/**********End code to add function @OMMODTAG ANUJA02NOV15******************************/
/**********Start code to add function @OMMODTAG ANUJA02NOV15******************************/
function showNonCollectionList() {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "hidden";
            document.getElementById("girviListPanelDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("ajaxLoadShowGirviListDiv").style.visibility = "visible";
        }
    };

    xmlhttp.open("POST", "include/php/omfnncml.php", true);
    xmlhttp.send();
}
/**********End code to add function @OMMODTAG ANUJA02NOV15******************************/
/********Start code to add to slPrId Id slPrPreInvoiceNo, slPrInvoiceNo @AUTHOR:ANUJA01DEC15******************************/
function getOtherChrgByWt(slPrId, custId, payPanelName, slPrPreInvoiceNo, slPrInvoiceNo) {
    //alert(custId);
    var slprChrgWtType = document.getElementById('slprotherChrgByWtTyp').value;
    var slprChrgCash = document.getElementById('slPrWholeAdvOthrCash').value;

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("sellMainDiv").innerHTML = xmlhttp.responseText;
            calcWholeItemBalance();
            wholeAdjCalc();
            showRateCutTotAmnt();
        }
    };

    xmlhttp.open("POST", "include/php/ogswocwt.php?slprChrgWtType=" + slprChrgWtType + "&slprChrgCash=" + slprChrgCash + "&slPrId=" + slPrId + "&custId=" + custId + "&payPanelName=" + payPanelName + "&slPrPreInvoiceNo=" + slPrPreInvoiceNo + "&slPrInvoiceNo=" + slPrInvoiceNo, true);
    xmlhttp.send();
}
/********End code to add to slPrId Id slPrPreInvoiceNo, slPrInvoiceNo @AUTHOR:ANUJA01DEC15******************************/
/********Start code to add new function for finance updation @AUTHOR:ANUJA21MAR16******************************/
function getLoanUpdateDiv(girviId, panelName) {
    //    alert(panelName);
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "hidden";
            document.getElementById("udhaarFinDiv").innerHTML = xmlhttp.responseText;

            document.getElementById('principalAmount').focus();
        } else {
            document.getElementById("ajaxLoadAddNewUdhaar").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/omfandetl.php?girviId=" + girviId + "&panelName=" + panelName, true);
    xmlhttp.send();
}
/********End code to add new function for finance updation @AUTHOR:ANUJA21MAR16******************************/
/********Start code to add new function for finance @AUTHOR:ANUJA21APR16******************************/
function passFinEMIValues(emiNo, emiPaidDate, emiAmt, emiStatus, serialNo, custId, firmId, girviId,
        girviDOB, gDepId, gDepJrnlId, emiOccur, gEMIIntAmt, gEMIAmt, pageNo, intAmt, princAmt, dueDate) {
    //    alert(firmId);
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

        var poststr = "emiNo=" + emiNo
                + "&emiPaidDate=" + emiPaidDate
                + "&emiAmt=" + emiAmt
                + "&emiStatus=" + emiStatus
                + "&serialNo=" + serialNo
                + "&custId=" + custId
                + "&firmId=" + firmId
                + "&girviId=" + girviId
                + "&girviDOB=" + girviDOB
                + "&gDepId=" + gDepId
                + "&gDepJrnlId=" + gDepJrnlId
                + "&emiOccur=" + emiOccur
                + "&gEMIIntAmt=" + gEMIIntAmt
                + "&gEMIAmt=" + gEMIAmt
                + "&pageNo=" + pageNo
                + "&intAmt=" + intAmt
                + "&princAmt=" + princAmt
                + "&girviEndDate=" + dueDate;
        xmlhttp.open("POST", "include/php/omfnemiin.php?" + poststr, true);
        xmlhttp.send();
    }

}
/********End code to add new function for finance @AUTHOR:ANUJA21APR16******************************/
/***********************Start Code To Add PageNo @Author:PRIYA14JUL13************************/
function navigationFinNonCollListPanel(button, offset, totalGirviProcessed, maxLimit, maxLimitProcess, selFirmId, sortKeyword, rowsPerPage, pageNo, searchColumn, searchValue) {
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
    xmlhttp.open("POST", "include/php/omfnncml.php?button=" + button + "&offset=" + offset + "&totalGirviProcessed=" + totalGirviProcessed + "&maxLimit=" + maxLimit + "&maxLimitProcess=" + maxLimitProcess +
            "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&rowsPerPage=" + rowsPerPage + "&page=" + pageNo + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue, true);
    xmlhttp.send();
}
/***********************End Code To Add PageNo @Author:PRIYA14JUL13************************/
/***********************Start Code To Add PageNo @Author:PRIYA14JUL13************************/
function navigationFinCollListPanel(button, offset, totalGirviProcessed, maxLimit, maxLimitProcess, selFirmId, sortKeyword, rowsPerPage, pageNo, searchColumn, searchValue) {
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
    xmlhttp.open("POST", "include/php/omfncml.php?button=" + button + "&offset=" + offset + "&totalGirviProcessed=" + totalGirviProcessed + "&maxLimit=" + maxLimit + "&maxLimitProcess=" + maxLimitProcess +
            "&selFirmId=" + selFirmId + "&sortKeyword=" + sortKeyword + "&rowsPerPage=" + rowsPerPage + "&page=" + pageNo + "&searchColumn=" + searchColumn + "&searchValue=" + searchValue, true);
    xmlhttp.send();
}
/***********************End Code To Add PageNo @Author:PRIYA14JUL13************************/
/***********Start code to add mainPanel @Author:GAUR23APR16**************/
function sellExchangeImitation(custId, preInvoiceNo, postInvoiceNo, returnPanel) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("cust_middle_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/ogspisdv.php?custId=" + custId + "&panelName=" + returnPanel + "&preInvoiceNo=" + preInvoiceNo +
            "&postInvoiceNo=" + postInvoiceNo + "&payPanel=paymentPanel" + "&mainPanel=ImitationPurchasePanel", true);
    xmlhttp.send();
}
/***********End code to add mainPanel @Author:GAUR23APR16**************/
/***************Start code to add cust Nominees @Author:ANUJA29APR16**************/
//function showNomineeDiv(custId, div,closeId) {
////    alert(divCheckValue);
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
////            document.getElementById(divCheckValue).value = 'true';
//            document.getElementById(closeId).style.visibility = "visible";
//            document.getElementById(div).innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    xmlhttp.open("POST", "include/php/omcdcdnmd.php?custId=" + custId + "&div=" + div, true);
//    xmlhttp.send();
//}
//function closeOpenNomiDiv(div, closeButtonDiv) {
//    loadXMLDoc();
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
//            document.getElementById(closeButtonDiv).style.visibility = "hidden";
////            document.getElementById(divCheckValue).value = 'false';
//            document.getElementById(div).innerHTML = xmlhttp.responseText;
//        } else {
//            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
//        }
//    };
//    xmlhttp.open("POST", "include/php/ombbblnk.php", true);
//    xmlhttp.send();
//}
/***************End code to add cust Nominees @Author:ANUJA29APR16**************/
function getNomineeDetails(custPanelOption) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
        } else {

            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("GET", "include/php/omcdccdd.php?custId=" + custId + "&custPanelOption=" + custPanelOption,
            true);
    xmlhttp.send();
}
/*****Start Code To Add Validation For nominee form Id @AUTHOR:SANT27MAY16*********/
function validateAddNomineeInputs(obj, count) {
    if (validateEmptyField(document.getElementById("firstName" + count).value, "Please enter First Name!") == false ||
            validateAlphaWithSpace(document.getElementById("firstName" + count).value, "Accept only alpha characters!") == false) {
        document.getElementById("firstName" + count).focus();
        return false;
    } else if ((document.getElementById("lastName" + count).value != '') && (validateAlphaWithSpace(document.getElementById("lastName" + count).value, "Accept only alpha characters!") == false)) {
        document.getElementById("lastName" + count).focus();
        return false;
    } else if (validateEmptyField(document.getElementById("fatherOrSpouseName" + count).value, "Please enter Father/Spouse Name!") == false ||
            validateAlphaWithSpace(document.getElementById("fatherOrSpouseName" + count).value, "Accept only alpha characters!") == false) {
        document.getElementById("fatherOrSpouseName" + count).focus();
        return false;
    } else if ((document.getElementById("motherName" + count).value != '') && (validateAlphaWithSpace(document.getElementById("motherName" + count).value, "Accept only alpha characters!") == false)) {
        document.getElementById("motherName" + count).focus();
        return false;
    } else if (validateSelectField(document.getElementById("city" + count).value, "Please select City Name!") == false) {
        document.getElementById("city" + count).focus();
        return false;
    } else if ((document.getElementById("pinCode" + count).value != '') && ((validateNum(document.getElementById("pinCode" + count).value, "Accept only Numbers without space character!") == false ||
            validateLength6(document.getElementById("pinCode" + count).value, "Pin Code length should be minimum 06!") == false))) {
        document.getElementById("pinCode" + count).focus(); //PRIYA15
        return false;
    } else if (validateSelectField(document.getElementById("state" + count).value, "Please select State Name!") == false) {
        document.getElementById("state" + count).focus();
        return false;
    } else if (validateSelectField(document.getElementById("country" + count).value, "Please select Country Name!") == false) {
        document.getElementById("country" + count).focus();
        return false;
    } else if ((document.getElementById("mobileNo" + count).value != '') && ((validateNum(document.getElementById("mobileNo" + count).value, "Accept only Numbers without space character!") == false) || (validateLengthMobNo(document.getElementById("mobileNo" + count).value, "Mobile number length should be 10 numbers only!") == false))) {
        document.getElementById("mobileNo" + count).focus();
        return false;
    } else {
        return true;
    }
}
function addNewNominee(obj, count) {
    document.getElementById("ajax_loading_div").style.visibility = "visible";
    document.getElementById("addCustSubButDiv").style.visibility = "hidden";
    if (validateAddNomineeInputs(obj, count)) {
        if (uploadImage(document.getElementById("selectPhoto").value) == false) {
            document.getElementById("ajax_loading_div").style.visibility = "hidden";
            document.getElementById("addCustSubButDiv").style.visibility = "visible";
            return false;
        }
        return true;
    } else {
        document.getElementById("ajax_loading_div").style.visibility = "hidden";
        document.getElementById("addCustSubButDiv").style.visibility = "visible";
        return false;
    }
}
/*****End Code To Add Validation For nominee form Id @AUTHOR:SANT27MAY16*********/

function deleteAuctionInt(girviId, custId, panelDivName) {

    document.getElementById("girviDeleteImageDiv").style.visibility = "hidden";
    document.getElementById("main_ajax_loading_div").style.visibility = "visible";

    confirm_box = confirm("Do you really want to Permanent Delete this Auctioned?");
    if (confirm_box == true) {
        var poststr = "girviId=" + girviId + "&custId=" + custId + "&panelDivName=" + panelDivName;

        delete_girvi('include/php/olgdgvdlint.php', poststr);
    } else {
        document.getElementById("girviDeleteImageDiv").style.visibility = "visible";
        document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
    }
}
/* START CODE ADD NEW FUNCTION FOR RETAIL-IMITATION B2 FUNCTION @AUTHOR:MADHUREE-05FEB2020  */
function addItemB2() {
    //
    if (document.getElementById('sttr_item_pre_id').value == '') {
        alert("Enter Item Pre Id !");
        document.getElementById('sttr_item_pre_id').focus();
        return false;
    }
    //
    if (validateSelectField(document.getElementById("firmId").value, "Please Select Firm!") == false) {
        document.getElementById("firmId").focus();
        return false;
    }
    //
    if (document.getElementById('sttr_item_category').value == '') {
        alert("Enter Item Category !");
        document.getElementById('sttr_item_category').focus();
        return false;
    }

    if (validateNumWithSpace(document.getElementById("sttr_quantity").value, "Please enter Quantity, Accept only numeric characters!") == false) { // condition add ganesh 8-5-2025
        document.getElementById("sttr_quantity").focus();
        return false;
    }
    //
    if (parseFloat(document.getElementById('sttr_price').value) > parseFloat(document.getElementById('sttr_cust_price').value)) {
        alert("Enter sell price grater then purchase prise !");
        return false;
    }
    //
    if (parseFloat(document.getElementById('sttr_price').value) == '') {
        alert("Enter Item Price !");
        document.getElementById('sttr_price').focus();
        return false;
    }
    //
    if (parseFloat(document.getElementById('sttr_final_valuation').value) == '' || parseFloat(document.getElementById('sttr_final_valuation').value) == '0.00') {
        alert("Enter Item Valuation !");
        document.getElementById('sttr_final_valuation').focus();
        return false;
    }
    return true;
}
/* END CODE ADD NEW FUNCTION FOR RETAIL-IMITATION B2 FUNCTION @AUTHOR:MADHUREE-05FEB2020  */
//
/* START CODE ADD NEW FUNCTION FOR RETAIL-IMITATION B2 FUNCTION @AUTHOR:MADHUREE-05FEB2020  */
function addItemB2Retail() {
    //
    if (document.getElementById('sttr_item_pre_id').value == '') {
        alert("Enter Item Pre Id !");
        document.getElementById('sttr_item_pre_id').focus();
        return false;
    }
    //
    if (validateSelectField(document.getElementById("firmId").value, "Please Select Firm!") == false) {
        document.getElementById("firmId").focus();
        return false;
    }
    //
    if (document.getElementById('sttr_item_category').value == '') {
        alert("Enter Item Category !");
        document.getElementById('sttr_item_category').focus();
        return false;
    }
    //
    if (parseFloat(document.getElementById('sttr_quantity').value) == '') {
        alert("Enter Item Quantity !");
        document.getElementById('sttr_quantity').focus();
        return false;
    }
    //
    //    if (parseFloat(document.getElementById('sttr_price').value) > parseFloat(document.getElementById('sttr_cust_price').value)) {
    //        alert("Enter sell price grater then purchase prise !");
    //        return false;
    //    }
    //
    if (parseFloat(document.getElementById('sttr_price').value) == '') {
        alert("Enter Item Price !");
        document.getElementById('sttr_price').focus();
        return false;
    }
    //
    if (parseFloat(document.getElementById('sttr_final_valuation').value) == '' || parseFloat(document.getElementById('sttr_final_valuation').value) == '0.00') {
        alert("Enter Item Valuation !");
        document.getElementById('sttr_final_valuation').focus();
        return false;
    }
    if (validateNumWithSpace(document.getElementById("sttr_quantity").value, "Please enter Quantity, Accept only numeric characters!") == false) { // condition add ganesh 8-5-2025
        document.getElementById("sttr_quantity").focus();
        return false;
    }
    return true;
}
/* END CODE ADD NEW FUNCTION FOR RETAIL-IMITATION B2 FUNCTION @AUTHOR:MADHUREE-05FEB2020  */
//
//
//***************************************************************************************************************
//* START CODE TO ADD FUNCTION TO SET ALL DETAILS ACCORDING TO BARCODE @AUTHOR-PRIYANKA-21JUNE2020
//***************************************************************************************************************
function setAllDetailsAccordingToBarcode() {
    //
    setTimeout(function () {
        var documentRoot = document.getElementById('documentRoot').value;
        var panelName = document.getElementById('mainUserPanelName').value;
        var SetAllFormDetailsAccordingTo = document.getElementById('SetAllFormDetailsAccordingTo').value;
        var prodBarcode = document.getElementById('sttr_barcode').value;
        var prodCategory = document.getElementById('sttr_item_category').value;
        var prodName = document.getElementById('sttr_item_name').value;
        var prodPreId = document.getElementById('sttr_item_pre_id').value;
        var prodId = document.getElementById('sttr_item_id').value;
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                //alert('responseText == ' + xmlhttp.responseText);
                document.getElementById("SetAllDetailsAccordingToBarcodeMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("POST", documentRoot + "/include/php/omSetAllDetailsAccordingToBarcode.php?documentRoot=" + documentRoot +
                "&panelName=" + panelName + "&SetAllFormDetailsAccordingTo=" + SetAllFormDetailsAccordingTo +
                "&prodBarcode=" + prodBarcode + "&prodCategory=" + prodCategory +
                "&prodName=" + prodName + "&prodPreId=" + prodPreId + "&prodId=" + prodId, true);
        xmlhttp.send();
    }, 100);
}
//
//
function allDetailsDisplayAccordingToBarcode(sttr_item_pre_id, sttr_item_id, sttr_item_category, sttr_item_name,
        sttr_shape, sttr_size, sttr_hsn_no, sttr_gender,
        sttr_color, sttr_item_length, sttr_item_width, sttr_item_other_info,
        sttr_quantity, sttr_gs_weight, sttr_gs_weight_type,
        sttr_item_model_no, sttr_item_sales_pkg,
        sttr_cust_itmpricecode, sttr_cust_itmcode, sttr_cust_itmcalby, sttr_cust_itmnum,
        sttr_metal_rate, sttr_price, sttr_cust_price, sttr_period, sttr_period_type,
        sttr_lab_charges, sttr_lab_charges_type,
        sttr_making_charges, sttr_making_charges_type, sttr_valuation,
        sttr_tot_price_cgst_per, sttr_tot_price_cgst_chrg,
        sttr_tot_price_sgst_per, sttr_tot_price_sgst_chrg,
        sttr_tot_price_igst_per, sttr_tot_price_igst_chrg,
        sttr_tax, sttr_tot_tax,
        sttr_final_valuation, panelName) {
    //
    //
    //    alert('sttr_item_pre_id == ' + sttr_item_pre_id);
    //    alert('sttr_item_id == ' + sttr_item_id);
    //    alert('sttr_item_category == ' + sttr_item_category);
    //    alert('sttr_item_name == ' + sttr_item_name);
    //    alert('sttr_shape == ' + sttr_shape);
    //    alert('sttr_size == ' + sttr_size);
    //    alert('sttr_gender == ' + sttr_gender);
    //    alert('sttr_color == ' + sttr_color);
    //    alert('sttr_item_length == ' + sttr_item_length);
    //    alert('sttr_item_width == ' + sttr_item_width);
    //    alert('sttr_item_other_info == ' + sttr_item_other_info);
    //    alert('sttr_quantity == ' + sttr_quantity);
    //    alert('sttr_item_model_no == ' + sttr_item_model_no);
    //    alert('sttr_item_sales_pkg == ' + sttr_item_sales_pkg);
    //    alert('sttr_cust_itmpricecode == ' + sttr_cust_itmpricecode);
    //    alert('sttr_cust_itmcode == ' + sttr_cust_itmcode);
    //    alert('sttr_cust_itmcalby == ' + sttr_cust_itmcalby);
    //    alert('sttr_cust_itmnum == ' + sttr_cust_itmnum);
    //    alert('sttr_metal_rate == ' + sttr_metal_rate);
    //    alert('sttr_price == ' + sttr_price);
    //    alert('sttr_cust_price == ' + sttr_cust_price);
    //    alert('sttr_lab_charges == ' + sttr_lab_charges);
    //    alert('sttr_lab_charges_type == ' + sttr_lab_charges_type);
    //    alert('sttr_making_charges == ' + sttr_making_charges);
    //    alert('sttr_making_charges_type == ' + sttr_making_charges_type);
    //    alert('sttr_valuation == ' + sttr_valuation);
    //    alert('sttr_tax == ' + sttr_tax);
    //    alert('sttr_tot_tax == ' + sttr_tot_tax);
    //    alert('sttr_final_valuation == ' + sttr_final_valuation);
    //    alert('panelName == ' + panelName);
    //
    //
    document.getElementById('sttr_item_pre_id').value = sttr_item_pre_id;
    document.getElementById('sttr_item_id').value = sttr_item_id;
    document.getElementById('sttr_item_category').value = sttr_item_category;
    document.getElementById('sttr_item_name').value = sttr_item_name;
    document.getElementById('sttr_shape').value = sttr_shape;
    document.getElementById('sttr_size').value = sttr_size;
    document.getElementById('sttr_hsn_no').value = sttr_hsn_no;
    document.getElementById('sttr_gender').value = sttr_gender;
    document.getElementById('sttr_color').value = sttr_color;
    document.getElementById('sttr_item_length').value = sttr_item_length;
    document.getElementById('sttr_item_width').value = sttr_item_width;
    document.getElementById('sttr_item_other_info').value = sttr_item_other_info;
    document.getElementById('sttr_quantity').value = sttr_quantity;
    document.getElementById('sttr_gs_weight').value = sttr_gs_weight;
    document.getElementById('sttr_gs_weight_type').value = sttr_gs_weight_type;
    document.getElementById('sttr_item_model_no').value = sttr_item_model_no;
    document.getElementById('sttr_item_sales_pkg').value = sttr_item_sales_pkg;
    document.getElementById('sttr_cust_itmpricecode_changed').value = sttr_cust_itmpricecode;
    document.getElementById('sttr_cust_itmpricecode').value = sttr_cust_itmpricecode;
    document.getElementById('sttr_cust_itmcode').value = sttr_cust_itmcode;
    document.getElementById('sttr_cust_itmcalby').value = sttr_cust_itmcalby;
    document.getElementById('sttr_cust_itmnum').value = sttr_cust_itmnum;
    document.getElementById('sttr_metal_rate').value = sttr_metal_rate;
    document.getElementById('sttr_price').value = sttr_price;
    document.getElementById('sttr_cust_price').value = sttr_cust_price;
    document.getElementById('sttr_period').value = sttr_period;
    document.getElementById('sttr_period_type').value = sttr_period_type;
    document.getElementById('sttr_lab_charges').value = sttr_lab_charges;
    document.getElementById('sttr_lab_charges_type').value = sttr_lab_charges_type;
    document.getElementById('sttr_making_charges').value = sttr_making_charges;
    document.getElementById('sttr_making_charges_type').value = sttr_making_charges_type;
    document.getElementById('sttr_valuation').value = sttr_valuation;
    document.getElementById('sttr_tot_price_cgst_per').value = sttr_tot_price_cgst_per;
    document.getElementById('sttr_tot_price_cgst_chrg').value = sttr_tot_price_cgst_chrg;
    document.getElementById('sttr_tot_price_sgst_per').value = sttr_tot_price_sgst_per;
    document.getElementById('sttr_tot_price_sgst_chrg').value = sttr_tot_price_sgst_chrg;
    document.getElementById('sttr_tot_price_igst_per').value = sttr_tot_price_igst_per;
    document.getElementById('sttr_tot_price_igst_chrg').value = sttr_tot_price_igst_chrg;
    document.getElementById('sttr_tax').value = sttr_tax;
    document.getElementById('sttr_tot_tax').value = sttr_tot_tax;
    document.getElementById('sttr_final_valuation').value = sttr_final_valuation;
    //
    //
    document.getElementById('productPreIdChanged').value = sttr_item_pre_id;
    document.getElementById('productCategoryChanged').value = sttr_item_category;
    document.getElementById('productNameChanged').value = sttr_item_name;
    document.getElementById('productQtyChanged').value = sttr_quantity;
    document.getElementById('productGSWeightChanged').value = sttr_gs_weight;
    document.getElementById('productGSWeightTypeChanged').value = sttr_gs_weight_type;
    document.getElementById('productPurchasePriceChanged').value = sttr_price;
    document.getElementById('productSellPriceCodeChanged').value = sttr_cust_itmpricecode;
    document.getElementById('productItemCodeChanged').value = sttr_cust_itmcode;
    document.getElementById('productItemCodeTypeChanged').value = sttr_cust_itmcalby;
    document.getElementById('productItemNumChanged').value = sttr_cust_itmnum;
    document.getElementById('productCustPriceChanged').value = sttr_cust_price;
    document.getElementById('productPeriodChanged').value = sttr_period;
    document.getElementById('productPeriodTypeChanged').value = sttr_period_type;
    document.getElementById('productOtherChargesChanged').value = sttr_lab_charges;
    document.getElementById('productOtherChargesTypeChanged').value = sttr_lab_charges_type;
    document.getElementById('productValuationChanged').value = sttr_valuation;
    document.getElementById('productCGSTPerChanged').value = sttr_tot_price_cgst_per;
    document.getElementById('productCGSTChrgChanged').value = sttr_tot_price_cgst_chrg;
    document.getElementById('productSGSTPerChanged').value = sttr_tot_price_sgst_per;
    document.getElementById('productSGSTChrgChanged').value = sttr_tot_price_sgst_chrg;
    document.getElementById('productIGSTPerChanged').value = sttr_tot_price_igst_per;
    document.getElementById('productIGSTChrgChanged').value = sttr_tot_price_igst_chrg;
    document.getElementById('productTaxChanged').value = sttr_tax;
    document.getElementById('productTotTaxChanged').value = sttr_tot_tax;
    document.getElementById('productFinalValuationChanged').value = sttr_final_valuation;
    //
    //
    if (panelName == 'AddStockPanel') {
        //document.getElementById('sttr_quantity').value = '';
        document.getElementById('sttr_quantity').focus();
    } else if (panelName == 'SupplierPanel') {
        document.getElementById('sttr_item_id').value = '';
        document.getElementById('sttr_quantity').value = '';
        document.getElementById('sttr_quantity').focus();

    }
    //
    //
}
//
//
//***************************************************************************************************************
//* END CODE TO ADD FUNCTION TO SET ALL DETAILS ACCORDING TO BARCODE @AUTHOR-PRIYANKA-21JUNE2020
//***************************************************************************************************************
//
//
//***************************************************************************************************************
//* START CODE TO ADD FUNCTION TO SET ALL DETAILS ACCORDING TO BARCODE @AUTHOR-SHRIKANT 08 MARCH 2023
//***************************************************************************************************************
function setAllDetailsAccordingToBarcodeRetail(name) {
    //
    setTimeout(function () {
        var documentRoot = document.getElementById('documentRoot').value;
        var panelName = document.getElementById('mainUserPanelName').value;
        var SetAllFormDetailsAccordingTo = document.getElementById('SetAllFormDetailsAccordingTo').value;
        var prodBarcode = document.getElementById('sttr_barcode').value;
        var prodCategory = document.getElementById('sttr_item_category').value;
        var prodName = document.getElementById('sttr_item_name').value;
        var prodPreId = document.getElementById('sttr_item_pre_id').value;
        var prodId = document.getElementById('sttr_item_id').value;
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                //alert('responseText == ' + xmlhttp.responseText);
                document.getElementById("SetAllDetailsAccordingToBarcodeMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("POST", documentRoot + "/include/php/omSetAllDetailsAccordingToBarcodeRetail.php?documentRoot=" + documentRoot +
                "&panelName=" + panelName + "&SetAllFormDetailsAccordingTo=" + SetAllFormDetailsAccordingTo +
                "&prodBarcode=" + prodBarcode + "&prodCategory=" + prodCategory +
                "&prodName=" + prodName + "&prodPreId=" + prodPreId + "&prodId=" + prodId + "&name" + name, true);
        xmlhttp.send();
    }, 100);
}
//
function allDetailsDisplayAccordingToBarcodeRetail(sttr_item_pre_id, sttr_item_id, sttr_item_category, sttr_item_name,
        sttr_shape, sttr_size, sttr_hsn_no, sttr_gender,
        sttr_color, sttr_item_length, sttr_item_width, sttr_item_other_info,
        sttr_quantity, sttr_gs_weight, sttr_gs_weight_type,
        sttr_item_model_no, sttr_item_sales_pkg,
        sttr_cust_itmpricecode, sttr_cust_itmcode, sttr_cust_itmcalby, sttr_cust_itmnum,
        sttr_metal_rate, sttr_price, sttr_cust_price, sttr_period, sttr_period_type,
        sttr_lab_charges, sttr_lab_charges_type,
        sttr_making_charges, sttr_making_charges_type, sttr_valuation,
        sttr_tot_price_cgst_per, sttr_tot_price_cgst_chrg,
        sttr_tot_price_sgst_per, sttr_tot_price_sgst_chrg,
        sttr_tot_price_igst_per, sttr_tot_price_igst_chrg,
        sttr_tax, sttr_tot_tax,
        sttr_barcode_serial_num,
        sttr_brand_id,
        sttr_purches_discount_per,
        sttr_purches_discount_amt,
        sttr_metal_discount_per,
        sttr_metal_discount_amt,
        sttr_counter_name,
        sttr_rfid_no,
        sttr_sell_rate,
        sttr_taxincl_checked,
        formName, sttr_purchase_price, sttr_gst,
        sttr_final_valuation, panelName, name, sttr_mfg_date, sttr_exp_date, sttr_item_height, sttr_online_option) {

    document.getElementById('sttr_item_pre_id').value = sttr_item_pre_id;
    document.getElementById('sttr_item_id').value = sttr_item_id;
    document.getElementById('sttr_item_category').value = sttr_item_category;
    document.getElementById('sttr_item_name').value = sttr_item_name;
    document.getElementById('sttr_shape').value = sttr_shape;
    document.getElementById('sttr_size').value = sttr_size;
    document.getElementById('sttr_hsn_no').value = sttr_hsn_no;
    document.getElementById('sttr_gender').value = sttr_gender;
    document.getElementById('sttr_color').value = sttr_color;
    document.getElementById('sttr_item_length').value = sttr_item_length;
    document.getElementById('sttr_item_width').value = sttr_item_width;
    document.getElementById('sttr_item_other_info').value = sttr_item_other_info;
    document.getElementById('sttr_quantity').value = sttr_quantity;
    document.getElementById('sttr_gs_weight').value = sttr_gs_weight;
    document.getElementById('sttr_gs_weight_type').value = sttr_gs_weight_type;
    document.getElementById('sttr_item_model_no').value = sttr_item_model_no;
    document.getElementById('sttr_item_sales_pkg').value = sttr_item_sales_pkg;
    document.getElementById('sttr_cust_itmpricecode_changed').value = sttr_cust_itmpricecode;
    document.getElementById('sttr_cust_itmpricecode').value = sttr_cust_itmpricecode;
    document.getElementById('sttr_cust_itmcode').value = sttr_cust_itmcode;
    document.getElementById('sttr_cust_itmcalby').value = sttr_cust_itmcalby;
    document.getElementById('sttr_cust_itmnum').value = sttr_cust_itmnum;
    document.getElementById('sttr_metal_rate').value = sttr_metal_rate;
    document.getElementById('sttr_price').value = sttr_price;
    document.getElementById('sttr_cust_price').value = sttr_cust_price;
    document.getElementById('sttr_period').value = sttr_period;
    document.getElementById('sttr_period_type').value = sttr_period_type;
    document.getElementById('sttr_lab_charges').value = sttr_lab_charges;
    document.getElementById('sttr_lab_charges_type').value = sttr_lab_charges_type;
    document.getElementById('sttr_making_charges').value = sttr_making_charges;
    document.getElementById('sttr_making_charges_type').value = sttr_making_charges_type;
    document.getElementById('sttr_valuation').value = sttr_valuation;
    document.getElementById('sttr_tot_price_cgst_per').value = sttr_tot_price_cgst_per;
    document.getElementById('sttr_tot_price_cgst_chrg').value = sttr_tot_price_cgst_chrg;
    document.getElementById('sttr_tot_price_sgst_per').value = sttr_tot_price_sgst_per;
    document.getElementById('sttr_tot_price_sgst_chrg').value = sttr_tot_price_sgst_chrg;
    document.getElementById('sttr_tot_price_igst_per').value = sttr_tot_price_igst_per;
    document.getElementById('sttr_tot_price_igst_chrg').value = sttr_tot_price_igst_chrg;
    document.getElementById('sttr_tax').value = sttr_tax;
    document.getElementById('gst_tax').value = sttr_gst;
    document.getElementById('sttr_tot_tax').value = sttr_tot_tax;
    document.getElementById('sttr_barcode_serial_num').value = sttr_barcode_serial_num;
    document.getElementById('sttr_brand_id').value = sttr_brand_id;
    document.getElementById('sttr_purches_discount_per').value = sttr_purches_discount_per;
    document.getElementById('sttr_purches_discount_amt').value = sttr_purches_discount_amt;
    document.getElementById('sttr_metal_discount_per').value = sttr_metal_discount_per;
    document.getElementById('sttr_metal_discount_amt').value = sttr_metal_discount_amt;
    document.getElementById('sttr_counter_name').value = sttr_counter_name;
    document.getElementById('sttr_rfid_no').value = sttr_rfid_no;
    document.getElementById('sttr_sell_rate').value = sttr_sell_rate;
    if (sttr_taxincl_checked == 'checked') {
        document.getElementById('sttr_taxincl_checked').checked = true;
    } else {
        document.getElementById('sttr_taxincl_checked').checked = false;
    }
    document.getElementById('formName').value = formName;
    document.getElementById('sttr_purchase_price').value = sttr_purchase_price;
    document.getElementById('sttr_final_valuation').value = sttr_final_valuation;

    document.getElementById('productPreIdChanged').value = sttr_item_pre_id;
    document.getElementById('productCategoryChanged').value = sttr_item_category;
    document.getElementById('productNameChanged').value = sttr_item_name;
    document.getElementById('productQtyChanged').value = sttr_quantity;
    document.getElementById('productGSWeightChanged').value = sttr_gs_weight;
    document.getElementById('productGSWeightTypeChanged').value = sttr_gs_weight_type;
    document.getElementById('productPurchasePriceChanged').value = sttr_price;
    document.getElementById('productSellPriceCodeChanged').value = sttr_cust_itmpricecode;
    document.getElementById('productItemCodeChanged').value = sttr_cust_itmcode;
    document.getElementById('productItemCodeTypeChanged').value = sttr_cust_itmcalby;
    document.getElementById('productItemNumChanged').value = sttr_cust_itmnum;
    document.getElementById('productCustPriceChanged').value = sttr_sell_rate;
    document.getElementById('productPeriodChanged').value = sttr_period;
    document.getElementById('productPeriodTypeChanged').value = sttr_period_type;
    document.getElementById('productOtherChargesChanged').value = sttr_lab_charges;
    document.getElementById('productOtherChargesTypeChanged').value = sttr_lab_charges_type;
    document.getElementById('productValuationChanged').value = sttr_valuation;
    document.getElementById('productCGSTPerChanged').value = sttr_tot_price_cgst_per;
    document.getElementById('productCGSTChrgChanged').value = sttr_tot_price_cgst_chrg;
    document.getElementById('productSGSTPerChanged').value = sttr_tot_price_sgst_per;
    document.getElementById('productSGSTChrgChanged').value = sttr_tot_price_sgst_chrg;
    document.getElementById('productIGSTPerChanged').value = sttr_tot_price_igst_per;
    document.getElementById('productIGSTChrgChanged').value = sttr_tot_price_igst_chrg;
    document.getElementById('productTaxChanged').value = sttr_tax;
    document.getElementById('productGstChanged').value = sttr_gst;
    document.getElementById('productTotTaxChanged').value = sttr_tot_tax;
    document.getElementById('productBarcodeSerialNum').value = sttr_barcode_serial_num;
    document.getElementById('productBrandId').value = sttr_brand_id;
    document.getElementById('productPurchesDiscountPer').value = sttr_purches_discount_per;
    document.getElementById('productPurchesDiscountAmt').value = sttr_purches_discount_amt;
    document.getElementById('productMetalDiscountPer').value = sttr_metal_discount_per;
    document.getElementById('productMetalDiscountAmt').value = sttr_metal_discount_amt;
    document.getElementById('productCounterName').value = sttr_counter_name;
    document.getElementById('productRfidNo').value = sttr_rfid_no;
    document.getElementById('productSellRate').value = sttr_sell_rate;
    document.getElementById('productTaxinclChecked').value = sttr_taxincl_checked;
    document.getElementById('productFormName').value = formName;
    document.getElementById('productPurchasePrice').value = sttr_purchase_price;
    document.getElementById('productFinalValuationChanged').value = sttr_final_valuation;
    document.getElementById('sttr_mfg_date').value = sttr_mfg_date;
    document.getElementById('sttr_exp_date').value = sttr_exp_date;
    document.getElementById('sttr_item_height').value = sttr_item_height;

    if (sttr_online_option == 'on') {
        document.getElementById('prodShowOnline').checked = true;
    }

    if (panelName == 'AddStockPanel') {
        document.getElementById('sttr_rfid_no').value = '';
        document.getElementById('sttr_barcode_serial_num').value = '';
        document.getElementById('sttr_barcode_serial_num').focus();
    } else if (panelName == 'SupplierPanel') {
        document.getElementById('sttr_rfid_no').value = '';
        document.getElementById('sttr_barcode_serial_num').value = '';
        document.getElementById('sttr_barcode_serial_num').focus();

    }
    if (name == 'name') {
        document.getElementById('sttr_item_other_info').focus();
    }

}

//***************************************************************************************************************
//* END CODE TO ADD FUNCTION TO SET ALL DETAILS ACCORDING TO BARCODE @AUTHOR-SHRIKANT-08MARCH2023
//***************************************************************************************************************
//***************************************************************************************************************
//* START CODE TO ADD FUNCTION TO CHECKED FOR UNIQ SERIALNUMBER @AUTHOR-SHRIKANT 08 MARCH 2023
//***************************************************************************************************************
function checkDetailAcordingToSerialNum(update) {
    var documentRoot = document.getElementById('documentRoot').value;
    var panelName = document.getElementById('mainUserPanelName').value;
    var SetAllFormDetailsAccordingTo = document.getElementById('SetAllFormDetailsAccordingTo').value;
    var prodId = document.getElementById('sttr_item_pre_id').value;
    var prodBarcode = document.getElementById('sttr_barcode').value;
    var prodSerialNum = document.getElementById('sttr_barcode_serial_num').value;
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //alert('responseText == ' + xmlhttp.responseText);
            document.getElementById("SetAllDetailsAccordingToBarcodeMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", documentRoot + "/include/php/checkSerialNumber.php?documentRoot=" + documentRoot +
            "&panelName=" + panelName + "&SetAllFormDetailsAccordingTo=" + SetAllFormDetailsAccordingTo +
            "&prodBarcode=" + prodBarcode + "&prodSerialNum=" + prodSerialNum + "&prodId=" + prodId + "&update=" + update, true);
    xmlhttp.send();
}

function checkSerialNumber(row, proBarcode, update) {
    if (row > 0) {
        if (update == 'update') {
            alert('Serial number is all ready exist with barcode - ' + proBarcode);
            document.getElementById('sttr_barcode_serial_num').value = document.getElementById('old_sttr_barcode_serial_num').value;
        } else {
            alert('Serial number is all ready exist with barcode - ' + proBarcode);
            document.getElementById('sttr_barcode_serial_num').value = '';
        }

        document.getElementById('sttr_barcode_serial_num').focus();
    }
}

function checkDetailAcordingToRfidNum(update) {
    var documentRoot = document.getElementById('documentRoot').value;
    var panelName = document.getElementById('mainUserPanelName').value;
    var SetAllFormDetailsAccordingTo = document.getElementById('SetAllFormDetailsAccordingTo').value;
    var prodId = document.getElementById('sttr_item_pre_id').value;
    var prodRfid = document.getElementById('sttr_rfid_no').value;
    var prodBarcode = document.getElementById('sttr_barcode').value;
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //alert('responseText == ' + xmlhttp.responseText);
            document.getElementById("SetAllDetailsAccordingToBarcodeMainDiv").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //C:\OMUNIM_RETAIL_NEW_DESIGN\htdocs\omretail\2\scripts\
    xmlhttp.open("POST", documentRoot + "/include/php/checkRfidNumber.php?documentRoot=" + documentRoot +
            "&panelName=" + panelName + "&SetAllFormDetailsAccordingTo=" + SetAllFormDetailsAccordingTo +
            "&prodBarcode=" + prodBarcode + "&prodRfid=" + prodRfid + "&prodId=" + prodId + "&update=" + update, true);
    xmlhttp.send();
}

function checkRfidNumber(row, update) {
    if (row > 0) {
        if (update == 'update') {
            alert('Rfid number is all ready exist');
            document.getElementById('sttr_rfid_no').value = document.getElementById('old_sttr_rfid_no').value;
        } else {
            alert('Rfid number is all ready exist');
            document.getElementById('sttr_rfid_no').value = '';
        }

        document.getElementById('sttr_rfid_no').focus();
    }
}
//***************************************************************************************************************
//* END CODE TO ADD FUNCTION TO CHECKED FOR UNIQ SERIALNUMBER @AUTHOR-SHRIKANT 08 MARCH 2023
//***************************************************************************************************************

//***************************************************************************************************************
//* START CODE TO ADD FUNCTION TO SET ALL DETAILS ACCORDING TO BARCODE @AUTHOR-SHRIKANT-08MARCH2023
//***************************************************************************************************************
function setAllDetailsAccordingToSerialNumRetail() {
    //
    setTimeout(function () {
        var documentRoot = document.getElementById('documentRoot').value;
        var SetAllFormDetailsAccordingTo = document.getElementById('SetAllFormDetailsAccordingTo').value;
        var prodBarcode = document.getElementById('sttr_barcode').value;
        var prodSerial = document.getElementById('serialNum').value;
        var prodCategory = document.getElementById('sttr_item_category').value;
        var prodId = document.getElementById('sttr_item_id').value;
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                //alert('responseText == ' + xmlhttp.responseText);
                document.getElementById("SetAllDetailsAccordingToBarcodeMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("POST", documentRoot + "/include/php/omSetAllDetailsAccordingToSerialNumRetail.php?documentRoot=" + documentRoot +
                "&panelName=" + panelName + "&SetAllFormDetailsAccordingTo=" + SetAllFormDetailsAccordingTo +
                "&prodBarcode=" + prodBarcode + "&prodSerial=" + prodSerial, true);
        xmlhttp.send();
    }, 100);
}
//
function allDetailsDisplayAccordingToSerialNumRetail(sttr_item_pre_id, sttr_item_id, sttr_item_category, sttr_item_name,
        sttr_shape, sttr_size, sttr_hsn_no, sttr_gender,
        sttr_color, sttr_item_length, sttr_item_width, sttr_item_other_info,
        sttr_quantity, sttr_gs_weight, sttr_gs_weight_type,
        sttr_item_model_no, sttr_item_sales_pkg,
        sttr_cust_itmpricecode, sttr_cust_itmcode, sttr_cust_itmcalby, sttr_cust_itmnum,
        sttr_metal_rate, sttr_price, sttr_cust_price, sttr_period, sttr_period_type,
        sttr_lab_charges, sttr_lab_charges_type,
        sttr_making_charges, sttr_making_charges_type, sttr_valuation,
        sttr_tot_price_cgst_per, sttr_tot_price_cgst_chrg,
        sttr_tot_price_sgst_per, sttr_tot_price_sgst_chrg,
        sttr_tot_price_igst_per, sttr_tot_price_igst_chrg,
        sttr_tax, sttr_tot_tax,
        sttr_barcode_serial_num,
        sttr_brand_id,
        sttr_purches_discount_per,
        sttr_purches_discount_amt,
        sttr_metal_discount_per,
        sttr_metal_discount_amt,
        sttr_counter_name,
        sttr_rfid_no,
        sttr_sell_rate,
        sttr_taxincl_checked,
        formName, sttr_purchase_price, sttr_gst,
        sttr_final_valuation, panelName) {

    document.getElementById('sttr_item_pre_id').value = sttr_item_pre_id;
    document.getElementById('sttr_item_id').value = sttr_item_id;
    document.getElementById('sttr_item_category').value = sttr_item_category;
    document.getElementById('sttr_item_name').value = sttr_item_name;
    document.getElementById('sttr_shape').value = sttr_shape;
    document.getElementById('sttr_size').value = sttr_size;
    document.getElementById('sttr_hsn_no').value = sttr_hsn_no;
    document.getElementById('sttr_gender').value = sttr_gender;
    document.getElementById('sttr_color').value = sttr_color;
    document.getElementById('sttr_item_length').value = sttr_item_length;
    document.getElementById('sttr_item_width').value = sttr_item_width;
    document.getElementById('sttr_item_other_info').value = sttr_item_other_info;
    document.getElementById('sttr_quantity').value = sttr_quantity;
    document.getElementById('sttr_gs_weight').value = sttr_gs_weight;
    document.getElementById('sttr_gs_weight_type').value = sttr_gs_weight_type;
    document.getElementById('sttr_item_model_no').value = sttr_item_model_no;
    document.getElementById('sttr_item_sales_pkg').value = sttr_item_sales_pkg;
    document.getElementById('sttr_cust_itmpricecode_changed').value = sttr_cust_itmpricecode;
    document.getElementById('sttr_cust_itmpricecode').value = sttr_cust_itmpricecode;
    document.getElementById('sttr_cust_itmcode').value = sttr_cust_itmcode;
    document.getElementById('sttr_cust_itmcalby').value = sttr_cust_itmcalby;
    document.getElementById('sttr_cust_itmnum').value = sttr_cust_itmnum;
    document.getElementById('sttr_metal_rate').value = sttr_metal_rate;
    document.getElementById('sttr_price').value = sttr_price;
    document.getElementById('sttr_cust_price').value = sttr_cust_price;
    document.getElementById('sttr_period').value = sttr_period;
    document.getElementById('sttr_period_type').value = sttr_period_type;
    document.getElementById('sttr_lab_charges').value = sttr_lab_charges;
    document.getElementById('sttr_lab_charges_type').value = sttr_lab_charges_type;
    document.getElementById('sttr_making_charges').value = sttr_making_charges;
    document.getElementById('sttr_making_charges_type').value = sttr_making_charges_type;
    document.getElementById('sttr_valuation').value = sttr_valuation;
    document.getElementById('sttr_tot_price_cgst_per').value = sttr_tot_price_cgst_per;
    document.getElementById('sttr_tot_price_cgst_chrg').value = sttr_tot_price_cgst_chrg;
    document.getElementById('sttr_tot_price_sgst_per').value = sttr_tot_price_sgst_per;
    document.getElementById('sttr_tot_price_sgst_chrg').value = sttr_tot_price_sgst_chrg;
    document.getElementById('sttr_tot_price_igst_per').value = sttr_tot_price_igst_per;
    document.getElementById('sttr_tot_price_igst_chrg').value = sttr_tot_price_igst_chrg;
    document.getElementById('sttr_tax').value = sttr_tax;
    document.getElementById('gst_tax').value = sttr_gst;
    document.getElementById('sttr_tot_tax').value = sttr_tot_tax;
    document.getElementById('sttr_barcode_serial_num').value = sttr_barcode_serial_num;
    document.getElementById('sttr_brand_id').value = sttr_brand_id;
    document.getElementById('sttr_purches_discount_per').value = sttr_purches_discount_per;
    document.getElementById('sttr_purches_discount_amt').value = sttr_purches_discount_amt;
    document.getElementById('sttr_metal_discount_per').value = sttr_metal_discount_per;
    document.getElementById('sttr_metal_discount_amt').value = sttr_metal_discount_amt;
    document.getElementById('sttr_counter_name').value = sttr_counter_name;
    document.getElementById('sttr_rfid_no').value = sttr_rfid_no;
    document.getElementById('sttr_sell_rate').value = sttr_sell_rate;
    document.getElementById('sttr_taxincl_checked').value = sttr_taxincl_checked;
    document.getElementById('formName').value = formName;
    document.getElementById('sttr_purchase_price').value = sttr_purchase_price;
    document.getElementById('sttr_final_valuation').value = sttr_final_valuation;

    document.getElementById('productPreIdChanged').value = sttr_item_pre_id;
    document.getElementById('productCategoryChanged').value = sttr_item_category;
    document.getElementById('productNameChanged').value = sttr_item_name;
    document.getElementById('productQtyChanged').value = sttr_quantity;
    document.getElementById('productGSWeightChanged').value = sttr_gs_weight;
    document.getElementById('productGSWeightTypeChanged').value = sttr_gs_weight_type;
    document.getElementById('productPurchasePriceChanged').value = sttr_price;
    document.getElementById('productSellPriceCodeChanged').value = sttr_cust_itmpricecode;
    document.getElementById('productItemCodeChanged').value = sttr_cust_itmcode;
    document.getElementById('productItemCodeTypeChanged').value = sttr_cust_itmcalby;
    document.getElementById('productItemNumChanged').value = sttr_cust_itmnum;
    document.getElementById('productCustPriceChanged').value = sttr_cust_price;
    document.getElementById('productPeriodChanged').value = sttr_period;
    document.getElementById('productPeriodTypeChanged').value = sttr_period_type;
    document.getElementById('productOtherChargesChanged').value = sttr_lab_charges;
    document.getElementById('productOtherChargesTypeChanged').value = sttr_lab_charges_type;
    document.getElementById('productValuationChanged').value = sttr_valuation;
    document.getElementById('productCGSTPerChanged').value = sttr_tot_price_cgst_per;
    document.getElementById('productCGSTChrgChanged').value = sttr_tot_price_cgst_chrg;
    document.getElementById('productSGSTPerChanged').value = sttr_tot_price_sgst_per;
    document.getElementById('productSGSTChrgChanged').value = sttr_tot_price_sgst_chrg;
    document.getElementById('productIGSTPerChanged').value = sttr_tot_price_igst_per;
    document.getElementById('productIGSTChrgChanged').value = sttr_tot_price_igst_chrg;
    document.getElementById('productTaxChanged').value = sttr_tax;
    document.getElementById('productGstChanged').value = sttr_gst;
    document.getElementById('productTotTaxChanged').value = sttr_tot_tax;
    document.getElementById('productBarcodeSerialNum').value = sttr_barcode_serial_num;
    document.getElementById('productBrandId').value = sttr_brand_id;
    document.getElementById('productPurchesDiscountPer').value = sttr_purches_discount_per;
    document.getElementById('productPurchesDiscountAmt').value = sttr_purches_discount_amt;
    document.getElementById('productMetalDiscountPer').value = sttr_metal_discount_per;
    document.getElementById('productMetalDiscountAmt').value = sttr_metal_discount_amt;
    document.getElementById('productCounterName').value = sttr_counter_name;
    document.getElementById('productRfidNo').value = sttr_rfid_no;
    document.getElementById('productSellRate').value = sttr_sell_rate;
    document.getElementById('productTaxinclChecked').value = sttr_taxincl_checked;
    document.getElementById('productFormName').value = formName;
    document.getElementById('productPurchasePrice').value = sttr_purchase_price;
    document.getElementById('productFinalValuationChanged').value = sttr_final_valuation;
    if (panelName == 'AddStockPanel') {
        document.getElementById('sttr_barcode_serial_num').value = '';
        document.getElementById('sttr_barcode_serial_num').focus();
    } else if (panelName == 'SupplierPanel') {
        document.getElementById('sttr_barcode_serial_num').value = sttr_barcode_serial_num;
        document.getElementById('sttr_barcode_serial_num').focus();

    }
}

//***************************************************************************************************************
//* END CODE TO ADD FUNCTION TO SET ALL DETAILS ACCORDING TO BARCODE @AUTHOR-SHRIKANT-08MARCH2023
//***************************************************************************************************************

function showPurWhStockPanel(formName, panelName, indicator, transactionType, type, custId, mainPanel, firmId, divName) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(divName).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    // FOR PURCHASE STERLING JEWELLERY @AUTHOR:PRIYANKA-04AUG2020
    if (formName == 'STERLING_JEWELLERY') {
        xmlhttp.open("POST", "include/php/omijssdv.php?formName=" + formName
                + "&panelName=" + panelName + "&indicator=" + indicator
                + "&transactionType=" + transactionType + "&type=" + type + "&metType=" + type
                + "&custId=" + custId + "&mainPanel=" + mainPanel + "&mainUserPanel=" + mainPanel
                + "&firmId=" + firmId + "&divName=" + divName, true);
    } else {
        xmlhttp.open("POST", "include/php/ogijssdv.php?formName=" + formName
                + "&panelName=" + panelName + "&indicator=" + indicator
                + "&transactionType=" + transactionType + "&type=" + type + "&metType=" + type
                + "&custId=" + custId + "&mainPanel=" + mainPanel + "&mainUserPanel=" + mainPanel
                + "&firmId=" + firmId + "&divName=" + divName, true);
    }
    //
    xmlhttp.send();
    //
}
//
//
function calSuppProdPrice() {

    if (document.getElementById('mainUserPanelName').value == 'SellPanel') {
        var addprice = parseFloat(document.getElementById('sttr_cust_price').value);
    } else {
        var addprice = parseFloat(document.getElementById('sttr_price').value);
    }

    var itemqty = document.getElementById('sttr_quantity').value;

    if (document.getElementById('mainUserPanelName').value == 'SellPanel') {
        var labCharges = document.getElementById('sttr_making_charges').value;
        var labChargesType = document.getElementById('sttr_making_charges_type').value;
    } else {
        var labCharges = document.getElementById('sttr_lab_charges').value;
        var labChargesType = document.getElementById('sttr_lab_charges_type').value;
    }

    //alert('addprice == ' + addprice);
    //alert('itemqty == ' + itemqty);
    //alert('labCharges == ' + labCharges);
    //alert('labChargesType == ' + labChargesType);

    //alert('sttr_cust_itmcalby == ' + document.getElementById('sttr_cust_itmcalby').value)

    if (document.getElementById('sttr_cust_itmcalby').value == 'UNIT') {

        document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('sttr_gs_weight').value)) * parseFloat(addprice)).toFixed(2);

        if (labCharges > 0) {
            if (labChargesType == 'GM') {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
                document.getElementById('sttr_valuation').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
            } else if (labChargesType == 'UNIT') {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
                document.getElementById('sttr_valuation').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
            } else if (labChargesType == 'PP') {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(itemqty)).toFixed(2);
                document.getElementById('sttr_valuation').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(itemqty)).toFixed(2);
            } else {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
                document.getElementById('sttr_valuation').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
            }
        }

    } else {

        if (labCharges == '') {
            document.getElementById('sttr_valuation').value = ((parseFloat(addprice)) * parseFloat(itemqty)).toFixed(2);
        } else {
            if (labChargesType == 'PP') {
                document.getElementById('sttr_total_lab_charges').value = ((labCharges) * (itemqty));
                document.getElementById('sttr_valuation').value = (parseFloat(addprice) + parseFloat(document.getElementById('sttr_total_lab_charges').value)).toFixed(2); // CHANGE THIS ID NAME FOR RETAIL SOFT @YUVRAJ KAMBLE @15122022
            } else {
                document.getElementById('sttr_total_lab_charges').value = parseFloat(labCharges).toFixed(2);
                document.getElementById('sttr_valuation').value = parseFloat(parseFloat(addprice) + parseFloat(document.getElementById('sttr_total_lab_charges').value)).toFixed(2); // CHANGE THIS ID NAME FOR RETAIL SOFT @YUVRAJ KAMBLE @15122022
            }
        }
    }

    //alert('sttr_valuation == ' + document.getElementById('sttr_valuation').value);

    if (document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }

    if (document.getElementById('mainUserPanelName').value == 'SellPanel' ||
            document.getElementById('mainUserPanelName').value == 'SupplierPanel' ||
            document.getElementById('mainUserPanelName').value == 'AddStockPanel') {
        if (document.getElementById('sttr_valuation').value > 0) {
            document.getElementById('taxByValMainAmount').value = (parseFloat(document.getElementById('sttr_valuation').value)).toFixed(2);
        }
    }

    if (document.getElementById('sttr_valuation').value == '' || document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = '';
    }

    // CGST IN % 
    if (document.getElementById('sttr_tot_price_cgst_per').value == '' || document.getElementById('sttr_tot_price_cgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_per').value = '';
    }

    // CALCULATE CGST AMT => (VAL * CGST IN %) / 100 
    if (document.getElementById('sttr_tot_price_cgst_per').value != '') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
    }

    // CGST CHRG 
    if (document.getElementById('sttr_tot_price_cgst_chrg').value == '' || document.getElementById('sttr_tot_price_cgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = 0;
    }

    // SGST IN % 
    if (document.getElementById('sttr_tot_price_sgst_per').value == '' || document.getElementById('sttr_tot_price_sgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_per').value = '';
    }

    // CALCULATE SGST AMT => (VAL * SGST IN %) / 100 
    if (document.getElementById('sttr_tot_price_sgst_per').value != '') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
    }

    // SGST CHRG 
    if (document.getElementById('sttr_tot_price_sgst_chrg').value == '' || document.getElementById('sttr_tot_price_sgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = 0;
    }

    // IGST IN % 
    if (document.getElementById('sttr_tot_price_igst_per').value == '' || document.getElementById('sttr_tot_price_igst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_per').value = '';
    }

    // CALCULATE IGST AMT => (VAL * IGST IN %) / 100 
    if (document.getElementById('sttr_tot_price_igst_per').value != '') {
        document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
    }

    // IGST CHRG 
    if (document.getElementById('sttr_tot_price_igst_chrg').value == '' || document.getElementById('sttr_tot_price_igst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_chrg').value = 0;
    }

    if (document.getElementById('sttr_tax').value == '' || document.getElementById('sttr_tax').value == 'NaN' ||
            document.getElementById('sttr_tax').value == 'undefined') {
        document.getElementById('sttr_tax').value = 0;
    }
    // // ADDTHIS OMRETAIL FOR GST SEPRATION AND DISPLAY @YUVRAJ 05012023
    if (document.getElementById('gst_tax').value == '' || document.getElementById('gst_tax').value == 'NaN' ||
            document.getElementById('gst_tax').value == 'undefined') {
        document.getElementById('gst_tax').value = 0;
    }

    // CALCULATE TOT TAX AMT => CGST AMT + SGST AMT + IGST AMT 
    document.getElementById('sttr_tot_tax').value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);

    if (document.getElementById('sttr_tot_tax').value == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }
    // // ADDTHIS OMRETAIL FOR GST SEPRATION AND DISPLAY @YUVRAJ 05012023
    document.getElementById('tot_tax').value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
            parseFloat(document.getElementById('gst_tax').value) +
            parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);
    // ADDTHIS OMRETAIL FOR GST SEPRATION AND DISPLAY @YUVRAJ 05012023
    if (document.getElementById('tot_tax').value == '' || document.getElementById('tot_tax').value == 'NaN') {
        document.getElementById('tot_tax').value = 0;
    }

    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }

    // CALCULATE TOT TAX AMT 
    if (document.getElementById('sttr_tax').value > 0) {
        document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
    } // ADDTHIS OMRETAIL FOR GST SEPRATION AND DISPLAY @YUVRAJ 05012023
    if (document.getElementById('gst_tax').value > 0) {
        document.getElementById('tot_tax').value = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('gst_tax').value) / 100).toFixed(2);
    }

    // CALCULATE FINAL PRICE => PRICE + TOTAL TAX 
    if (document.getElementById('sttr_tot_tax').value != '') {
        document.getElementById('sttr_final_valuation').value = Math_round(parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
    } else {
        document.getElementById('sttr_final_valuation').value = Math_round((parseFloat(document.getElementById('sttr_valuation').value))).toFixed(2);
    }
    // // ADDTHIS OMRETAIL FOR GST SEPRATION AND DISPLAY @YUVRAJ 05012023
    if (document.getElementById('tot_tax').value != '') {
        document.getElementById('sttr_final_valuation').value = Math_round(parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(document.getElementById('tot_tax').value)).toFixed(2);
    } else {
        document.getElementById('sttr_final_valuation').value = Math_round((parseFloat(document.getElementById('sttr_valuation').value))).toFixed(2);
    }
    return false;
}
//
//START CODE FOR RETAIL CALCULATION FUNCTION @AUTHOR:SHRIKANT 14022023
function calSuppProdPriceRetailForm() {
    var purchesTaxDiscont = 0;
    var purchesDiscont = 0;
    var purchesTax = 0;
    var purchesAmt = document.getElementById('sttr_price').value;
    var sellTaxDiscont = 0;
    var sellDiscont = 0;
    var sellTax = 0;
    var sellAmt = document.getElementById('sttr_sell_rate').value;

    //alert('sttr_cust_itmcalby : ' + document.getElementById('sttr_cust_itmcalby').value);
    /*
     if (document.getElementById('sttr_cust_itmcalby').value == '' || document.getElementById('sttr_cust_itmcalby').value == null){
     if (document.getElementById('sttr_quantity').value > 0) {
     document.getElementById('sttr_cust_itmcalby').value = 'QTY';
     document.getElementById('productItemCodeTypeChanged').value = 'QTY';               
     } else {
     document.getElementById('sttr_cust_itmcalby').value = 'UNIT';
     document.getElementById('productItemCodeTypeChanged').value = 'UNIT';
     }                        
     }
     */
    if (document.getElementById('sttr_lab_charges').value != '') {
        purchesTax = (parseFloat(document.getElementById('sttr_lab_charges').value));
    }

    if (purchesAmt == '' || purchesAmt < 0 || purchesAmt == 'NaN' || sellAmt == '' || sellAmt < 0 || sellAmt == 'NaN') {
        document.getElementById('gst_tax').value = '';
        document.getElementById('sttr_tax').value = '';
    }

    if (document.getElementById('sttr_purches_discount_per').value != '') {
        purchesDiscont = (parseFloat(purchesAmt) * parseFloat(document.getElementById('sttr_purches_discount_per').value) / 100).toFixed(2);
        document.getElementById('sttr_purches_discount_amt').value = purchesDiscont;
        if (purchesDiscont == 'NaN' || purchesDiscont == '' || purchesDiscont == 0) {
            document.getElementById('sttr_purches_discount_amt').value = '';
        }
    }

    purchesTaxDiscont = (parseFloat(purchesAmt) + (purchesTax - purchesDiscont));

    if (purchesTaxDiscont == 0 || purchesTaxDiscont == '') {
        document.getElementById('sttr_purchase_price').value = (parseFloat(document.getElementById('sttr_price').value)).toFixed(2);
    } else {
        document.getElementById('sttr_purchase_price').value = purchesTaxDiscont.toFixed(2);
    }


    //SELL TAX AND DISC 
    if (document.getElementById('sttr_making_charges').value != '') {
        sellTax = (parseFloat(document.getElementById('sttr_making_charges').value));
    }

    if (document.getElementById('sttr_metal_discount_per').value != '') {
        sellDiscont = (parseFloat(sellAmt) * parseFloat(document.getElementById('sttr_metal_discount_per').value) / 100).toFixed(2);
        document.getElementById('sttr_metal_discount_amt').value = sellDiscont;
        if (sellDiscont == 'NaN' || sellDiscont == '' || sellDiscont == 0) {
            document.getElementById('sttr_metal_discount_amt').value = '';
        }
    } else {
        document.getElementById('sttr_metal_discount_amt').value = '';
    }

    sellTaxDiscont = (parseFloat(sellAmt) + (sellTax - sellDiscont));

    if (sellTaxDiscont == 0 || sellTaxDiscont == '') {
        document.getElementById('sttr_cust_price').value = (parseFloat(document.getElementById('sttr_sell_rate').value)).toFixed(2);
    } else {
        document.getElementById('sttr_cust_price').value = sellTaxDiscont.toFixed(2);
    }

    if (document.getElementById('sttr_cust_itmcalby').value == 'UNIT') {
        document.getElementById('sttr_valuation').value = (parseFloat(document.getElementById('sttr_gs_weight').value) * parseFloat(document.getElementById('sttr_purchase_price').value)).toFixed(2);
        document.getElementById('taxByValMainAmount').value = (parseFloat(document.getElementById('sttr_gs_weight').value) * parseFloat(document.getElementById('sttr_purchase_price').value)).toFixed(2);
    } else {
        document.getElementById('sttr_valuation').value = (parseFloat(document.getElementById('sttr_quantity').value) * parseFloat(document.getElementById('sttr_purchase_price').value)).toFixed(2);
        document.getElementById('taxByValMainAmount').value = (parseFloat(document.getElementById('sttr_quantity').value) * parseFloat(document.getElementById('sttr_purchase_price').value)).toFixed(2);
    }

    if (document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }

    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }

    if (document.getElementById('sttr_tot_tax').value == 'NaN' || document.getElementById('sttr_tot_tax').value == '' ||
            document.getElementById('sttr_tot_tax').value == null) {
        document.getElementById('sttr_tot_tax').value = 0;
    }

    // CALCULATE FINAL PRICE => PRICE + TOTAL TAX 
    if (document.getElementById('sttr_tot_tax').value != '') {
        document.getElementById('sttr_final_valuation').value = (parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
    } else {
        document.getElementById('sttr_final_valuation').value = ((parseFloat(document.getElementById('sttr_valuation').value))).toFixed(2);
    }

    if (document.getElementById('sttr_purchase_price').value == 'NaN' || document.getElementById('sttr_purchase_price').value == '') {
        document.getElementById('sttr_purchase_price').value = 0;
    }

    if (document.getElementById('sttr_cust_price').value == 'NaN' || document.getElementById('sttr_cust_price').value == '') {
        document.getElementById('sttr_cust_price').value = 0;
    }

    // CALCULATE FINAL TAX
    calculateTaxIncludingValNew();

    return false;
}
//END CODE FOR RETAIL CALCULATION FUNCTION @AUTHOR:SHRIKANT 14022023

//START CODE FOR RETAIL CALCULATION FUNCTION @AUTHOR:SHRIKANT 06032023
function calSuppProdPriceRetailSellForm() {
    var sellTaxDiscont = 0;
    var sellDiscont = 0;
    var sellTax = 0;
    var sellAmt = document.getElementById('sttr_sell_rate').value;


    //SELL TAX AND DISC 
    if (document.getElementById('sttr_making_charges').value != '') {
        sellTax = (parseFloat(document.getElementById('sttr_making_charges').value));
    }
    if (document.getElementById('sttr_metal_discount_per').value != '') {
        sellDiscont = (parseFloat(sellAmt) * parseFloat(document.getElementById('sttr_metal_discount_per').value) / 100).toFixed(2);
        document.getElementById('sttr_metal_discount_amt').value = sellDiscont;
    } else {
        document.getElementById('sttr_metal_discount_amt').value = '';
    }
    sellTaxDiscont = (parseFloat(sellAmt) + (sellTax - sellDiscont));
    if (sellTaxDiscont == 0 || sellTaxDiscont == '') {
        document.getElementById('sttr_cust_price').value = document.getElementById('sttr_sell_rate').value;
    } else {
        document.getElementById('sttr_cust_price').value = sellTaxDiscont;
    }

    document.getElementById('sttr_valuation').value = (parseFloat(document.getElementById('sttr_quantity').value) * parseFloat(document.getElementById('sttr_cust_price').value)).toFixed(2);
    document.getElementById('taxByValMainAmount').value = (parseFloat(document.getElementById('sttr_quantity').value) * parseFloat(document.getElementById('sttr_cust_price').value)).toFixed(2);
    //


    if (document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }

    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }

    if (document.getElementById('sttr_purchase_price')) {
        if (document.getElementById('sttr_purchase_price').value == 'NaN' || document.getElementById('sttr_purchase_price').value == '') {
            document.getElementById('sttr_purchase_price').value = '';
        }
    }

    if (document.getElementById('sttr_cust_price').value == 'NaN' || document.getElementById('sttr_cust_price').value == '') {
        document.getElementById('sttr_cust_price').value = '';
    }

    // CALCULATE FINAL TAX
    calculateTaxIncludingValNew();
    return false;
}
//END CODE FOR RETAIL CALCULATION FUNCTION @AUTHOR:SHRIKANT 06032023

function showPurchaseStockListPanel(formName, userPanelName, panelName, indicator, transactionType, type, userId,
        mainPanel, firmId, divName, preInvoiceNo, invoiceNo) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("main_full_body").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/omNavToPurStockList.php?formName=" + formName + "&panelName=" + panelName
            + "&userPanelName=" + userPanelName + "&indicator=" + indicator
            + "&transactionType=" + transactionType + "&type=" + type + "&metType=" + type
            + "&userId=" + userId + "&mainPanel=" + mainPanel + "&mainUserPanel=" + mainPanel
            + "&firmId=" + firmId + "&divName=" + divName + "&preInvoiceNo=" + preInvoiceNo + "&invoiceNo=" + invoiceNo, true);
    //
    xmlhttp.send();
    //
}

///START CODE FOR TAX CALCULATION @AUTHOR:SHRIKANT 08022023
function calculateTaxIncludingValNew() {
    var cryVal = 0;

    if (document.getElementById('addItemCryFinVal').value != null && document.getElementById('addItemCryFinVal').value != '') {
        cryVal = document.getElementById('addItemCryFinVal').value;
    }
    //Code for checking checkbox clicked or not and calculate tax
    if (document.getElementById("sttr_taxincl_checked").checked == true) {

        if (document.getElementById("sttr_tot_price_cgst_per").value > 0) {
            document.getElementById("sttr_valuation").value = ((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tot_price_cgst_per").value) + parseFloat(document.getElementById("sttr_tot_price_sgst_per").value)))).toFixed(2);
            document.getElementById("sttr_total_cust_price").value = parseFloat((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tot_price_cgst_per").value) + parseFloat(document.getElementById("sttr_tot_price_sgst_per").value)))).toFixed(2);
            document.getElementById('sttr_tot_tax').value = (parseFloat(document.getElementById('taxByValMainAmount').value) - parseFloat(document.getElementById('sttr_valuation').value)).toFixed(2);
        }

        if (document.getElementById("sttr_tot_price_igst_per").value > 0) {
            document.getElementById("sttr_valuation").value = ((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tot_price_igst_per").value)))).toFixed(2);
            document.getElementById("sttr_total_cust_price").value = parseFloat((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tot_price_igst_per").value)))).toFixed(2);
            document.getElementById('sttr_tot_tax').value = (parseFloat(document.getElementById('taxByValMainAmount').value) - parseFloat(document.getElementById('sttr_valuation').value)).toFixed(2);
        }

        if (document.getElementById("sttr_tax").value > 0) {
            document.getElementById("sttr_valuation").value = ((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tax").value)))).toFixed(2);
            document.getElementById("sttr_total_cust_price").value = parseFloat((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tax").value))));
            document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
        } else {
            document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
        }
        if (cryVal == '' || cryVal == null) {
            cryVal = 0;
        }
        document.getElementById("sttr_final_valuation").value = (parseFloat(document.getElementById("taxByValMainAmount").value) + parseFloat(cryVal)).toFixed(2);

    }

    if (document.getElementById("sttr_taxincl_checked").checked == false) {
        if (document.getElementById('addItemCryFinVal').value != null && document.getElementById('addItemCryFinVal').value != '') {
            cryVal = document.getElementById('addItemCryFinVal').value;
        }
        if (document.getElementById("sttr_tot_price_cgst_per").value > 0) {
            document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('taxByValMainAmount').value) * (document.getElementById('sttr_tot_price_cgst_per').value) * 2) / 100).toFixed(2);
            document.getElementById("sttr_final_valuation").value = (parseFloat(document.getElementById("taxByValMainAmount").value) + (parseFloat(document.getElementById("sttr_tot_tax").value)) + (parseFloat(cryVal))).toFixed(2);
        }


        if (document.getElementById("sttr_tot_price_igst_per").value > 0) {
            document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('taxByValMainAmount').value) * document.getElementById('sttr_tot_price_igst_per').value) / 100).toFixed(2);
            document.getElementById("sttr_final_valuation").value = (parseFloat(document.getElementById("taxByValMainAmount").value) + (parseFloat(document.getElementById("sttr_tot_tax").value)) + (parseFloat(cryVal))).toFixed(2);
        }


        if (document.getElementById("sttr_tax").value > 0) {
            document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('taxByValMainAmount').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
            document.getElementById("sttr_final_valuation").value = (parseFloat(document.getElementById("taxByValMainAmount").value) + (parseFloat(document.getElementById("sttr_tot_tax").value)) + (parseFloat(cryVal))).toFixed(2);
        } else {
            document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('taxByValMainAmount').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
        }

        document.getElementById("sttr_valuation").value = parseFloat(parseFloat(document.getElementById("taxByValMainAmount").value)).toFixed(2);

    }
    //  CGST 
    if (document.getElementById('sttr_tot_price_cgst_per').value == '' || document.getElementById('sttr_tot_price_cgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_per').value = 0;
    }

    // CALCULATE CGST AMT 
    if (document.getElementById('sttr_tot_price_cgst_per').value != '') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
    }

    //CGST CHRG
    if (document.getElementById('sttr_tot_price_cgst_chrg').value == '' || document.getElementById('sttr_tot_price_cgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = 0;
    }

    //SGST 
    if (document.getElementById('sttr_tot_price_sgst_per').value == '' || document.getElementById('sttr_tot_price_sgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_per').value = 0;
    }

    // CALCULATE SGST AMT 
    if (document.getElementById('sttr_tot_price_sgst_per').value != '') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
    }

    // SGST CHRG 
    if (document.getElementById('sttr_tot_price_sgst_chrg').value == '' || document.getElementById('sttr_tot_price_sgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = 0;

    }

    //  IGST 
    if (document.getElementById('sttr_tot_price_igst_per').value == '' || document.getElementById('sttr_tot_price_igst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_per').value = 0;
    }

    // CALCULATE IGST AMT 
    if (document.getElementById('sttr_tot_price_igst_per').value != '') {
        document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
    }

    // IGST CHRG 
    if (document.getElementById('sttr_tot_price_igst_chrg').value == '' || document.getElementById('sttr_tot_price_igst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_chrg').value = 0;
    }

    // TAX
    if (document.getElementById('sttr_tax').value == '' || document.getElementById('sttr_tax').value == 'NaN') {
        document.getElementById('sttr_tax').value = 0;
    }

    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }

    if (document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }
    if (
            (
                    (document.getElementById('sttr_tax').value == '' || document.getElementById('sttr_tax').value == 0) ||
                    (document.getElementById('gst_tax').value == '' || document.getElementById('gst_tax').value == 0)
                    ) &&
            (document.getElementById('sttr_tot_tax').value == 'NaN' || document.getElementById('sttr_tot_tax').value == null)) {
        document.getElementById('sttr_tot_tax').value = 0;
    }
    return false;
}
///END CODE FOR TAX CALCULATION @AUTHOR:SHRIKANT 08022023

function calculateTaxIncludingVal() {
    //Code for checking checkbox clicked or not and calculate tax
    const cryFinElement = document.getElementById('addItemCryFinVal');
    let cryVal = 0; // Initialize your variable

    //if (document.getElementById('addItemCryFinVal').value != null && document.getElementById('addItemCryFinVal').value != '') {
    if (cryFinElement) {
        cryVal = document.getElementById('addItemCryFinVal').value;
    }
    if (document.getElementById("sttr_taxincl_checked").checked == true) {

        if (document.getElementById("sttr_tot_price_cgst_per").value > 0) {
            document.getElementById("sttr_valuation").value = ((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tot_price_cgst_per").value) + parseFloat(document.getElementById("sttr_tot_price_sgst_per").value)))).toFixed(2);
            document.getElementById("sttr_total_cust_price").value = parseFloat((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tot_price_cgst_per").value) + parseFloat(document.getElementById("sttr_tot_price_sgst_per").value)))).toFixed(2);
            document.getElementById('sttr_tot_tax').value = (parseFloat(document.getElementById('taxByValMainAmount').value) - parseFloat(document.getElementById('sttr_valuation').value)).toFixed(2);
        }

        if (document.getElementById("sttr_tot_price_igst_per").value > 0) {
            document.getElementById("sttr_valuation").value = ((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tot_price_igst_per").value)))).toFixed(2);
            document.getElementById("sttr_total_cust_price").value = parseFloat((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tot_price_igst_per").value)))).toFixed(2);
            document.getElementById('sttr_tot_tax').value = (parseFloat(document.getElementById('taxByValMainAmount').value) - parseFloat(document.getElementById('sttr_valuation').value)).toFixed(2);
        }

        if (document.getElementById("sttr_tax").value > 0) {
            document.getElementById("sttr_valuation").value = ((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tax").value)))).toFixed(2);
            document.getElementById("sttr_total_cust_price").value = parseFloat((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tax").value))));
            document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
        } else {
            document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
        }

        if (cryVal == '' || cryVal == null) {
            cryVal = 0;
        }
        document.getElementById("sttr_final_valuation").value = (parseFloat(document.getElementById("taxByValMainAmount").value) + parseFloat(cryVal)).toFixed(2);

    }

    if (document.getElementById("sttr_taxincl_checked").checked == false) {

        if (document.getElementById("sttr_tot_price_cgst_per").value > 0) {
            document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('taxByValMainAmount').value) * (document.getElementById('sttr_tot_price_cgst_per').value) * 2) / 100).toFixed(2);
            document.getElementById("sttr_final_valuation").value = (parseFloat(document.getElementById("taxByValMainAmount").value) + (parseFloat(document.getElementById("sttr_tot_tax").value)) + (parseFloat(parseFloat(document.getElementById("addItemCryFinVal").value)))).toFixed(2);
        }


        if (document.getElementById("sttr_tot_price_igst_per").value > 0) {
            document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('taxByValMainAmount').value) * document.getElementById('sttr_tot_price_igst_per').value) / 100).toFixed(2);
            document.getElementById("sttr_final_valuation").value = (parseFloat(document.getElementById("taxByValMainAmount").value) + (parseFloat(document.getElementById("sttr_tot_tax").value)) + (parseFloat(parseFloat(document.getElementById("addItemCryFinVal").value)))).toFixed(2);
        }


        if (document.getElementById("sttr_tax").value > 0) {
            document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('taxByValMainAmount').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
            document.getElementById("sttr_final_valuation").value = (parseFloat(document.getElementById("taxByValMainAmount").value) + (parseFloat(document.getElementById("sttr_tot_tax").value)) + (parseFloat(parseFloat(document.getElementById("addItemCryFinVal").value)))).toFixed(2);
        } else {
            document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('taxByValMainAmount').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
        }

        document.getElementById("sttr_valuation").value = parseFloat(parseFloat(document.getElementById("taxByValMainAmount").value)).toFixed(2);

    }
    //  CGST 
    if (document.getElementById('sttr_tot_price_cgst_per').value == '' || document.getElementById('sttr_tot_price_cgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_per').value = 0;
    }

    // CALCULATE CGST AMT 
    if (document.getElementById('sttr_tot_price_cgst_per').value != '') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
    }

    //CGST CHRG
    if (document.getElementById('sttr_tot_price_cgst_chrg').value == '' || document.getElementById('sttr_tot_price_cgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = 0;
    }

    //SGST 
    if (document.getElementById('sttr_tot_price_sgst_per').value == '' || document.getElementById('sttr_tot_price_sgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_per').value = 0;
    }

    // CALCULATE SGST AMT 
    if (document.getElementById('sttr_tot_price_sgst_per').value != '') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
    }

    // SGST CHRG 
    if (document.getElementById('sttr_tot_price_sgst_chrg').value == '' || document.getElementById('sttr_tot_price_sgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = 0;

    }

    //  IGST 
    if (document.getElementById('sttr_tot_price_igst_per').value == '' || document.getElementById('sttr_tot_price_igst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_per').value = 0;
    }

    // CALCULATE IGST AMT 
    if (document.getElementById('sttr_tot_price_igst_per').value != '') {
        document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
    }

    // IGST CHRG 
    if (document.getElementById('sttr_tot_price_igst_chrg').value == '' || document.getElementById('sttr_tot_price_igst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_chrg').value = 0;
    }

    // TAX
    if (document.getElementById('sttr_tax').value == '' || document.getElementById('sttr_tax').value == 'NaN') {
        document.getElementById('sttr_tax').value = 0;
    }

    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }

    if (document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }

    //     console.log('totVal======'+totaltaxamt);
    //     totVal = parseFloat(document.getElementById('sttr_valuation').value + totaltaxamt).toFixed(2);
    //        if (document.getElementById('addItemCryFinVal').value != '') {
    //            document.getElementById('sttr_final_valuation').value = (parseFloat(totVal) + parseFloat(document.getElementById('addItemCryFinVal').value)).toFixed(2);
    //        }
    return false;
}

function calculateTaxIncludingValRetails() {
    var purAmt = (parseFloat(document.getElementById('sttr_purchase_price').value) * parseFloat(document.getElementById('sttr_quantity').value));
    if (document.getElementById('sttr_tax').value > 0) {
        document.getElementById('sttr_tot_tax').value = ((parseFloat(purAmt) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
    } //ADDTHIS OMRETAIL FOR GST SEPRATION AND DISPLAY @YUVRAJ 05012023

    if (document.getElementById("sttr_taxincl_checked").checked == true) {
        document.getElementById('sttr_valuation').value = (parseFloat(purAmt) - parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
        document.getElementById('sttr_final_valuation').value = Math_round(parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
    } else {
        document.getElementById('sttr_final_valuation').value = Math_round(parseFloat(purAmt) + parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
    }
}

function calculateTaxIncludingValFormB3() {
    var totVal = 0;
    //alert('sttr_taxincl_checked == ' + document.getElementById("sttr_taxincl_checked").checked);

    if (document.getElementById("sttr_taxincl_checked").checked == true) {

        if (document.getElementById("sttr_tot_price_cgst_per").value > 0) {
            document.getElementById("sttr_valuation").value = parseFloat((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tot_price_cgst_per").value) + parseFloat(document.getElementById("sttr_tot_price_sgst_per").value)))).toFixed(2);
            document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
            document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
        }

        if (document.getElementById("sttr_tot_price_igst_per").value > 0) {
            document.getElementById("sttr_valuation").value = parseFloat((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tot_price_igst_per").value)))).toFixed(2);
            document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
        }

        if (document.getElementById("sttr_tax").value > 0) {
            document.getElementById("sttr_valuation").value = parseFloat((100 * parseFloat(document.getElementById("taxByValMainAmount").value)) / (100 + (parseFloat(document.getElementById("sttr_tax").value)))).toFixed(2);
        }
    }

    if (document.getElementById("sttr_taxincl_checked").checked == false) {
        document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
        document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
        document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
        document.getElementById("sttr_valuation").value = parseFloat(parseFloat(document.getElementById("taxByValMainAmount").value)).toFixed(2);
    }

    // CGST IN % 
    if (document.getElementById('sttr_tot_price_cgst_per').value == '' || document.getElementById('sttr_tot_price_cgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_per').value = '';
    }

    // CALCULATE CGST AMT => (VAL * CGST IN %) / 100 
    if (document.getElementById('sttr_tot_price_cgst_per').value != '') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
    }

    // CGST CHRG 
    if (document.getElementById('sttr_tot_price_cgst_chrg').value == '' || document.getElementById('sttr_tot_price_cgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = 0;
    }

    // SGST IN % 
    if (document.getElementById('sttr_tot_price_sgst_per').value == '' || document.getElementById('sttr_tot_price_sgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_per').value = '';
    }

    // CALCULATE SGST AMT => (VAL * SGST IN %) / 100 
    if (document.getElementById('sttr_tot_price_sgst_per').value != '') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
    }

    // SGST CHRG 
    if (document.getElementById('sttr_tot_price_sgst_chrg').value == '' || document.getElementById('sttr_tot_price_sgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = 0;
    }

    // IGST IN % 
    if (document.getElementById('sttr_tot_price_igst_per').value == '' || document.getElementById('sttr_tot_price_igst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_per').value = '';
    }

    // CALCULATE IGST AMT => (VAL * IGST IN %) / 100 
    if (document.getElementById('sttr_tot_price_igst_per').value != '') {
        document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
    }

    // IGST CHRG 
    if (document.getElementById('sttr_tot_price_igst_chrg').value == '' || document.getElementById('sttr_tot_price_igst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_chrg').value = 0;
    }

    if (document.getElementById('sttr_tax').value == '' || document.getElementById('sttr_tax').value == 'NaN' ||
            document.getElementById('sttr_tax').value == 'undefined') {
        //document.getElementById('sttr_tax').value = '';
    }


    // CALCULATE TOT TAX AMT => CGST AMT + SGST AMT + IGST AMT 
    document.getElementById('sttr_tot_tax').value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);

    if (document.getElementById('sttr_tot_tax').value == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }

    // CALCULATE TOT TAX AMT 
    if (document.getElementById('sttr_tax').value > 0) {
        document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
    }

    // CALCULATE FINAL PRICE => PRICE + TOTAL TAX 
    if (document.getElementById('sttr_tot_tax').value != '') {
        document.getElementById('sttr_final_valuation').value = Math_round(parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
    } else {
        document.getElementById('sttr_final_valuation').value = Math_round((parseFloat(document.getElementById('sttr_valuation').value))).toFixed(2);
    }

    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }
    totVal = parseFloat(document.getElementById('sttr_final_valuation').value).toFixed(2);
    if (document.getElementById('addItemCryFinVal').value != '') {
        document.getElementById('sttr_final_valuation').value = (parseFloat(totVal) + parseFloat(document.getElementById('addItemCryFinVal').value)).toFixed(2);
    }

    return false;
}
//
//
//***************************************************************************************************************
//* START CODE TO ADD FUNCTION TO SHOW TAG UPDATE FORM DIV @AUTHOR-PRIYANKA-14AUG2020
//***************************************************************************************************************
function showUpdateTagStockFormDiv(documentRootPath, sttrId, upPanelName, stockType, invPanelName, utransId, utransUserId, sttr_panel_name) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (invPanelName == 'AddImitationByInv') {
                document.getElementById("addStockPanelFormMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
        }
    };
    //
    if (invPanelName == 'AddImitationByInv' && sttr_panel_name == 'RETAIL_IMITATION_B2') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvB2.php?sttrId=" + sttrId + "&invPanel=AddImitationByInv" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType +
                "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&formName=" + sttr_panel_name +
                "&utransUserId=" + utransUserId + "&sttr_panel_name=" + sttr_panel_name, true);
    } else if (invPanelName == 'AddImitationByInv' && sttr_panel_name == 'RETAIL_IMITATION_B3') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvB3.php?sttrId=" + sttrId + "&invPanel=AddImitationByInv" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType +
                "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&formName=" + sttr_panel_name +
                "&utransUserId=" + utransUserId + "&sttr_panel_name=" + sttr_panel_name, true);
    } else if (upPanelName == 'UpdateImitationStock' && sttr_panel_name == 'RETAIL_IMITATION_NUM_B3') {
        // ADDTHIS UPDATE ISSUE B3 FORM NUM GARMENT AND DISPLAY @YUVRAJ 05012023
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv.php?sttrId=" + sttrId + "&invPanel=ImitationStock" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType +
                "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&formName=" + sttr_panel_name +
                "&utransUserId=" + utransUserId + "&sttr_panel_name=" + sttr_panel_name, true);
    } else if (invPanelName == 'AddImitationByInv' &&
            (sttr_panel_name == 'SUBSCRIPTION_FORM' || sttr_panel_name == 'SERVICE_FORM')) {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvS1.php?sttrId=" + sttrId + "&invPanel=AddImitationByInv" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType +
                "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&formName=" + sttr_panel_name +
                "&utransUserId=" + utransUserId + "&sttr_panel_name=" + sttr_panel_name, true);
    }
    //hrushali
    else if (sttr_panel_name == 'FASHION_JEWELLARY' || $stockPanelName == 'FASHION_JEWELLARY_UPDATE') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv.php?sttrId=" + sttrId + "&panelName=FASHION_JEWELLARY" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType +
                "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&formName=" + sttr_panel_name +
                "&utransUserId=" + utransUserId + "&sttr_panel_name=" + sttr_panel_name, true);
    }
    //end code
    else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv.php?sttrId=" + sttrId + "&panelName=ImitationStock" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType +
                "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&formName=" + sttr_panel_name +
                "&utransUserId=" + utransUserId + "&sttr_panel_name=" + sttr_panel_name, true);
    }
    //
    xmlhttp.send();
    //
}
//***************************************************************************************************************
//* END CODE TO ADD FUNCTION TO SHOW TAG UPDATE FORM DIV @AUTHOR-PRIYANKA-14AUG2020
//***************************************************************************************************************
//
//***************************************************************************************************************
//* START CODE TO ADD FUNCTION TO SHOW TAG UPDATE FORM DIV @AUTHOR-SHRIKANT-20022023
//***************************************************************************************************************
function showUpdateTagStockFormDivRetail(documentRootPath, sttrId, upPanelName, stockType, invPanelName, utransId, utransUserId, sttr_panel_name) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (invPanelName == 'AddImitationByInv') {
                document.getElementById("addStockPanelFormMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("mainBigMiddle").innerHTML = xmlhttp.responseText;
            }
        }
    };
    //
    if (invPanelName == 'AddImitationByInv' && sttr_panel_name == 'RETAIL_IMITATION_B2') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvRB2.php?sttrId=" + sttrId + "&invPanel=AddImitationByInv" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType +
                "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&formName=" + sttr_panel_name +
                "&utransUserId=" + utransUserId + "&sttr_panel_name=" + sttr_panel_name, true);
    } else if (invPanelName == 'AddImitationByInv' && sttr_panel_name == 'RETAIL_IMITATION_B3') {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvB3.php?sttrId=" + sttrId + "&invPanel=AddImitationByInv" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType +
                "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&formName=" + sttr_panel_name +
                "&utransUserId=" + utransUserId + "&sttr_panel_name=" + sttr_panel_name, true);
    } else if (upPanelName == 'UpdateImitationStock' && sttr_panel_name == 'RETAIL_IMITATION_NUM_B3') {
        // ADDTHIS UPDATE ISSUE B3 FORM NUM GARMENT AND DISPLAY @YUVRAJ 05012023
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv.php?sttrId=" + sttrId + "&invPanel=ImitationStock" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType +
                "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&formName=" + sttr_panel_name +
                "&utransUserId=" + utransUserId + "&sttr_panel_name=" + sttr_panel_name, true);
    } else if (invPanelName == 'AddImitationByInv' &&
            (sttr_panel_name == 'SUBSCRIPTION_FORM' || sttr_panel_name == 'SERVICE_FORM')) {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogijaitdvS1.php?sttrId=" + sttrId + "&invPanel=AddImitationByInv" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType +
                "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&formName=" + sttr_panel_name +
                "&utransUserId=" + utransUserId + "&sttr_panel_name=" + sttr_panel_name, true);
    } else {
        xmlhttp.open("POST", documentRootPath + "/include/php/ogiamndv.php?sttrId=" + sttrId + "&panelName=ImitationStock" +
                "&updatePanelName=" + upPanelName + "&stockType=" + stockType +
                "&invPanelName=" + invPanelName + "&utransInvId=" + utransId + "&formName=" + sttr_panel_name +
                "&utransUserId=" + utransUserId + "&sttr_panel_name=" + sttr_panel_name, true);
    }
    //
    xmlhttp.send();
    //
}
//***************************************************************************************************************
//* END CODE TO ADD FUNCTION TO SHOW TAG UPDATE FORM DIV @AUTHOR-PRIYANKA-14AUG2020
//***************************************************************************************************************
//
function sellFormB3Submit() {

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
    } else if (validateSelectField(document.getElementById("sttr_account_id").value, "Please select Account Name!") == false) {
        document.getElementById("sttr_account_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_category").value, "Please enter Item Category!") == false) {
        document.getElementById("sttr_item_category").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please enter Item Name!") == false) {
        document.getElementById("sttr_item_name").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_pre_id").value, "Please enter Product Code!") == false) {
        document.getElementById("sttr_item_pre_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_cust_price").value, "Please enter Sell Price!") == false) {
        document.getElementById("sttr_cust_price").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_valuation").value, "Please enter Total Price!") == false) {
        document.getElementById("sttr_valuation").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_final_valuation").value, "Please enter Final Price!") == false) {
        document.getElementById("sttr_final_valuation").focus();
        return false;
    } else
        return true;
}
//
//
function sellFormS1S2Submit() {

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
    } else if (validateSelectField(document.getElementById("sttr_account_id").value, "Please select Account Name!") == false) {
        document.getElementById("sttr_account_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_category").value, "Please enter Item Category!") == false) {
        document.getElementById("sttr_item_category").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_name").value, "Please enter Item Name!") == false) {
        document.getElementById("sttr_item_name").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_item_pre_id").value, "Please enter Product Code!") == false) {
        document.getElementById("sttr_item_pre_id").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("slPrItemCharges").value, "Please enter Sell Price!") == false) {
        document.getElementById("slPrItemCharges").focus();
        return false;
    } else if (validateEmptyField(document.getElementById("sttr_final_valuation").value, "Please enter Final Price!") == false) {
        document.getElementById("sttr_final_valuation").focus();
        return false;
    } else
        return true;
}
//
//
function setAllDetailsAccordingToProductCode() {
    setTimeout(function () {
        //
        var documentRoot = document.getElementById('documentRoot').value;
        var panelName = document.getElementById('mainUserPanelName').value;
        var prodPreId = document.getElementById('sttr_item_pre_id').value;
        var prodId = document.getElementById('sttr_item_id').value;
        var formName = document.getElementById('formName').value;
        //
        //alert("prodPreId == " + prodPreId);
        //
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("SetAllDetailsAccordingToBarcodeMainDiv").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        //
        xmlhttp.open("POST", documentRoot + "/include/php/omSetAllDetailsAccordingToProductCode.php?documentRoot=" + documentRoot +
                "&panelName=" + panelName + "&formName=" + formName +
                "&prodPreId=" + prodPreId + "&prodId=" + prodId, true);
        xmlhttp.send();
        //
    }, 100);
}
//
//
function allDetDisplayAccordingToProductCode(sttr_item_pre_id, sttr_item_id, sttr_item_category, sttr_item_name,
        sttr_shape, sttr_size, sttr_hsn_no, sttr_gender,
        sttr_color, sttr_item_length, sttr_item_width, sttr_item_other_info,
        sttr_quantity, sttr_gs_weight, sttr_gs_weight_type,
        sttr_item_model_no, sttr_item_sales_pkg,
        sttr_cust_itmpricecode, sttr_cust_itmcode, sttr_cust_itmcalby, sttr_cust_itmnum,
        sttr_metal_rate, sttr_price, sttr_cust_price, sttr_period, sttr_period_type,
        sttr_lab_charges, sttr_lab_charges_type,
        sttr_making_charges, sttr_making_charges_type, sttr_valuation,
        sttr_tot_price_cgst_per, sttr_tot_price_cgst_chrg,
        sttr_tot_price_sgst_per, sttr_tot_price_sgst_chrg,
        sttr_tot_price_igst_per, sttr_tot_price_igst_chrg,
        sttr_tax, sttr_tot_tax,
        sttr_final_valuation, sttr_taxincl_checked, panelName, formName, sttr_brand_id) {
    //
    //
    //    alert('sttr_item_pre_id == ' + sttr_item_pre_id);
    //    alert('sttr_item_id == ' + sttr_item_id);
    //    alert('sttr_item_category == ' + sttr_item_category);
    //    alert('sttr_item_name == ' + sttr_item_name);
    //    alert('sttr_shape == ' + sttr_shape);
    //    alert('sttr_size == ' + sttr_size);
    //    alert('sttr_gender == ' + sttr_gender);
    //    alert('sttr_color == ' + sttr_color);
    //    alert('sttr_item_length == ' + sttr_item_length);
    //    alert('sttr_item_width == ' + sttr_item_width);
    //    alert('sttr_item_other_info == ' + sttr_item_other_info);
    //    alert('sttr_quantity == ' + sttr_quantity);
    //    alert('sttr_item_model_no == ' + sttr_item_model_no);
    //    alert('sttr_item_sales_pkg == ' + sttr_item_sales_pkg);
    //    alert('sttr_cust_itmpricecode == ' + sttr_cust_itmpricecode);
    //    alert('sttr_cust_itmcode == ' + sttr_cust_itmcode);
    //    alert('sttr_cust_itmcalby == ' + sttr_cust_itmcalby);
    //    alert('sttr_cust_itmnum == ' + sttr_cust_itmnum);
    //    alert('sttr_metal_rate == ' + sttr_metal_rate);
    //    alert('sttr_price == ' + sttr_price);
    //    alert('sttr_cust_price == ' + sttr_cust_price);
    //    alert('sttr_lab_charges == ' + sttr_lab_charges);
    //    alert('sttr_lab_charges_type == ' + sttr_lab_charges_type);
    //    alert('sttr_making_charges == ' + sttr_making_charges);
    //    alert('sttr_making_charges_type == ' + sttr_making_charges_type);
    //    alert('sttr_valuation == ' + sttr_valuation);
    //    alert('sttr_tax == ' + sttr_tax);
    //    alert('sttr_tot_tax == ' + sttr_tot_tax);
    //    alert('sttr_final_valuation == ' + sttr_final_valuation);
    //    alert('panelName == ' + panelName);
    //
    //
    if (sttr_item_category == '' || sttr_item_category == null) {
        document.getElementById('sttr_barcode').value = '';
    }
    //
    document.getElementById('sttr_item_pre_id').value = sttr_item_pre_id;
    document.getElementById('sttr_item_id').value = sttr_item_id;
    document.getElementById('sttr_brand_id').value = sttr_brand_id;
    document.getElementById('sttr_item_category').value = sttr_item_category;
    document.getElementById('sttr_item_name').value = sttr_item_name;
    document.getElementById('sttr_shape').value = sttr_shape;
    document.getElementById('sttr_size').value = sttr_size;
    document.getElementById('sttr_hsn_no').value = sttr_hsn_no;
    //
    if (sttr_gender != '' && sttr_gender != null) {
        document.getElementById('sttr_gender').value = sttr_gender;
    }
    //
    document.getElementById('sttr_color').value = sttr_color;
    document.getElementById('sttr_item_length').value = sttr_item_length;
    document.getElementById('sttr_item_width').value = sttr_item_width;
    document.getElementById('sttr_item_other_info').value = sttr_item_other_info;
    document.getElementById('sttr_quantity').value = sttr_quantity;
    document.getElementById('sttr_gs_weight').value = sttr_gs_weight;
    //
    if (sttr_gs_weight_type != '' && sttr_gs_weight_type != null) {
        document.getElementById('sttr_gs_weight_type').value = sttr_gs_weight_type;
    }
    //
    document.getElementById('sttr_item_model_no').value = sttr_item_model_no;
    document.getElementById('sttr_item_sales_pkg').value = sttr_item_sales_pkg;
    document.getElementById('sttr_cust_itmpricecode_changed').value = sttr_cust_itmpricecode;
    document.getElementById('sttr_cust_itmpricecode').value = sttr_cust_itmpricecode;
    document.getElementById('sttr_cust_itmcode').value = sttr_cust_itmcode;
    //
    if (sttr_cust_itmcalby != '' && sttr_cust_itmcalby != null) {
        document.getElementById('sttr_cust_itmcalby').value = sttr_cust_itmcalby;
    }
    //
    document.getElementById('sttr_cust_itmnum').value = sttr_cust_itmnum;
    document.getElementById('sttr_metal_rate').value = sttr_metal_rate;
    document.getElementById('sttr_price').value = sttr_price;
    document.getElementById('sttr_cust_price').value = sttr_cust_price;
    document.getElementById('sttr_period').value = sttr_period;
    document.getElementById('sttr_period_type').value = sttr_period_type;
    document.getElementById('sttr_lab_charges').value = sttr_lab_charges;
    //
    if (sttr_lab_charges_type != '' && sttr_lab_charges_type != null) {
        document.getElementById('sttr_lab_charges_type').value = sttr_lab_charges_type;
    }
    //
    document.getElementById('sttr_making_charges').value = sttr_making_charges;
    //
    if (sttr_making_charges_type != '' && sttr_making_charges_type != null) {
        document.getElementById('sttr_making_charges_type').value = sttr_making_charges_type;
    }
    //
    document.getElementById('sttr_valuation').value = sttr_valuation;
    document.getElementById('sttr_tot_price_cgst_per').value = sttr_tot_price_cgst_per;
    document.getElementById('sttr_tot_price_cgst_chrg').value = sttr_tot_price_cgst_chrg;
    document.getElementById('sttr_tot_price_sgst_per').value = sttr_tot_price_sgst_per;
    document.getElementById('sttr_tot_price_sgst_chrg').value = sttr_tot_price_sgst_chrg;
    document.getElementById('sttr_tot_price_igst_per').value = sttr_tot_price_igst_per;
    document.getElementById('sttr_tot_price_igst_chrg').value = sttr_tot_price_igst_chrg;
    document.getElementById('sttr_tax').value = sttr_tax;
    document.getElementById('sttr_tot_tax').value = sttr_tot_tax;
    document.getElementById('sttr_final_valuation').value = sttr_final_valuation;

    if (sttr_taxincl_checked != '' && sttr_taxincl_checked != null) {
        document.getElementById('sttr_taxincl_checked').value = sttr_taxincl_checked;
    }
    //
    //
    document.getElementById('productPreIdChanged').value = sttr_item_pre_id;
    document.getElementById('productCategoryChanged').value = sttr_item_category;
    document.getElementById('productNameChanged').value = sttr_item_name;
    document.getElementById('productQtyChanged').value = sttr_quantity;
    document.getElementById('productGSWeightChanged').value = sttr_gs_weight;
    document.getElementById('productGSWeightTypeChanged').value = sttr_gs_weight_type;
    document.getElementById('productPurchasePriceChanged').value = sttr_price;
    document.getElementById('productSellPriceCodeChanged').value = sttr_cust_itmpricecode;
    document.getElementById('productItemCodeChanged').value = sttr_cust_itmcode;
    document.getElementById('productItemCodeTypeChanged').value = sttr_cust_itmcalby;
    document.getElementById('productItemNumChanged').value = sttr_cust_itmnum;
    document.getElementById('productCustPriceChanged').value = sttr_cust_price;
    document.getElementById('productPeriodChanged').value = sttr_period;
    document.getElementById('productPeriodTypeChanged').value = sttr_period_type;
    document.getElementById('productOtherChargesChanged').value = sttr_lab_charges;
    document.getElementById('productOtherChargesTypeChanged').value = sttr_lab_charges_type;
    document.getElementById('productValuationChanged').value = sttr_valuation;
    document.getElementById('productCGSTPerChanged').value = sttr_tot_price_cgst_per;
    document.getElementById('productCGSTChrgChanged').value = sttr_tot_price_cgst_chrg;
    document.getElementById('productSGSTPerChanged').value = sttr_tot_price_sgst_per;
    document.getElementById('productSGSTChrgChanged').value = sttr_tot_price_sgst_chrg;
    document.getElementById('productIGSTPerChanged').value = sttr_tot_price_igst_per;
    document.getElementById('productIGSTChrgChanged').value = sttr_tot_price_igst_chrg;
    document.getElementById('productTaxChanged').value = sttr_tax;
    document.getElementById('productTotTaxChanged').value = sttr_tot_tax;
    document.getElementById('productFinalValuationChanged').value = sttr_final_valuation;
    //
    //
    if (panelName == 'AddStockPanel') {
        if (formName == 'RETAIL_IMITATION_B3') {
            if (document.getElementById('sttr_gs_weight').value != '' && document.getElementById('sttr_gs_weight').value != null) {
                document.getElementById('sttr_gs_weight').value = '';
                document.getElementById('sttr_gs_weight').focus();
            } else {
                document.getElementById('sttr_brand_id').focus();
            }
        } else {
            if (document.getElementById('sttr_quantity').value != '' && document.getElementById('sttr_quantity').value != null) {
                document.getElementById('sttr_quantity').value = '';
                document.getElementById('sttr_quantity').focus();
            } else {
                document.getElementById('sttr_brand_id').focus();
            }
        }
    } else if (panelName == 'SupplierPanel') {
        document.getElementById('sttr_item_id').value = '';
        document.getElementById('sttr_quantity').value = '';
        document.getElementById('sttr_quantity').focus();
    }
    //
    //
}
//
//
function calSellProductPriceB3() {

    var addprice = parseFloat(document.getElementById('sttr_cust_price').value);
    var itemqty = document.getElementById('sttr_quantity').value;
    var labCharges = document.getElementById('sttr_making_charges').value;
    var labChargesType = document.getElementById('sttr_making_charges_type').value;

    //alert('addprice == ' + addprice);
    //alert('itemqty == ' + itemqty);
    //alert('labCharges == ' + labCharges);
    //alert('labChargesType == ' + labChargesType);

    //    alert('sttr_cust_itmcalby == ' + document.getElementById('sttr_cust_itmcalby').value)

    if (document.getElementById('sttr_cust_itmcalby').value == 'GSWT') {
        //alert('gswt');
        document.getElementById('sttr_metal_amt').value = ((parseFloat(document.getElementById('sttr_gs_weight').value)) * parseFloat(addprice)).toFixed(2);
        document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('sttr_gs_weight').value)) * parseFloat(addprice)).toFixed(2);


        if (labCharges > 0) {
            if (labChargesType == 'GM') {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
                document.getElementById('sttr_valuation').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
                document.getElementById('sttr_metal_amt').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
            } else if (labChargesType == 'UNIT') {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
                document.getElementById('sttr_valuation').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
                document.getElementById('sttr_metal_amt').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
            } else if (labChargesType == 'PP') {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(itemqty)).toFixed(2);
                document.getElementById('sttr_valuation').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(itemqty)).toFixed(2);
                document.getElementById('sttr_metal_amt').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(itemqty)).toFixed(2);
            } else {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
                document.getElementById('sttr_valuation').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
                document.getElementById('sttr_metal_amt').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(document.getElementById('sttr_gs_weight').value)).toFixed(2);
            }
        }

    } else if (document.getElementById('sttr_cust_itmcalby').value == 'UNIT') {
        //        alert('len')
        document.getElementById('sttr_metal_amt').value = ((parseFloat(document.getElementById('sttr_gs_weight').value)) * parseFloat(addprice)).toFixed(2);
        document.getElementById('sttr_valuation').value = ((parseFloat(document.getElementById('sttr_gs_weight').value)) * parseFloat(addprice)).toFixed(2);
    } else {
        if (labCharges == '') {
            document.getElementById('sttr_valuation').value = ((parseFloat(addprice)) * parseFloat(itemqty)).toFixed(2);
            document.getElementById('sttr_metal_amt').value = ((parseFloat(addprice)) * parseFloat(itemqty)).toFixed(2);
        } else {
            //            alert('labChargesType=='+labChargesType);
            if (labChargesType == 'PP') {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges) * parseFloat(itemqty)).toFixed(2);
                document.getElementById('sttr_valuation').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(itemqty)).toFixed(2);
                document.getElementById('sttr_metal_amt').value = ((parseFloat(addprice) + parseFloat(labCharges)) * parseFloat(itemqty)).toFixed(2);
            } else {
                document.getElementById('sttr_total_lab_charges').value = (parseFloat(labCharges)).toFixed(2);
                document.getElementById('sttr_valuation').value = ((parseFloat(addprice) + parseFloat(labCharges))).toFixed(2);
                document.getElementById('sttr_metal_amt').value = ((parseFloat(addprice) + parseFloat(labCharges))).toFixed(2);
            }
        }
    }

    if (document.getElementById('sttr_metal_amt').value == 'NaN') {
        document.getElementById('sttr_metal_amt').value = 0;
    }

    //alert('sttr_valuation == ' + document.getElementById('sttr_valuation').value);

    if (document.getElementById('sttr_itm_disc_type').value == 'AMT') {

        var metalDiscountAmt = parseFloat(document.getElementById('sttr_itm_disc_amt').value);

    } else {

        // DISCOUNT IN % @PRIYANKA-27NOV2020
        var sttr_metal_discount_per = document.getElementById('sttr_metal_discount_per').value;

        // CALCULATE DISCOUNT AMT @PRIYANKA-27NOV2020
        var metalDiscountAmt = Math_round(parseFloat(document.getElementById('sttr_metal_amt').value) * parseFloat(sttr_metal_discount_per) / 100).toFixed(2);

    }

    // DISCOUNT AMT @PRIYANKA-27NOV2020
    document.getElementById('sttr_metal_discount_amt').value = Math_round(parseFloat(metalDiscountAmt)).toFixed(2);

    if (document.getElementById('sttr_metal_discount_amt').value == 'NaN') {
        document.getElementById('sttr_metal_discount_amt').value = 0;
    }

    if (metalDiscountAmt > 0) {
        var stockTotalVal = parseFloat(document.getElementById('sttr_metal_amt').value).toFixed(2);
        document.getElementById('sttr_valuation').value = (Math_round(parseFloat(stockTotalVal) - parseFloat(metalDiscountAmt))).toFixed(2);
        document.getElementById('taxByValMainAmount').value = (Math_round(parseFloat(stockTotalVal) - parseFloat(metalDiscountAmt))).toFixed(2);
    }

    if (document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = 0;
    }

    if (document.getElementById('mainUserPanelName').value == 'SellPanel') {
        if (document.getElementById('sttr_valuation').value > 0) {
            document.getElementById('taxByValMainAmount').value = (parseFloat(document.getElementById('sttr_valuation').value)).toFixed(2);
        }
    }

    if (document.getElementById('sttr_valuation').value == '' || document.getElementById('sttr_valuation').value == 'NaN') {
        document.getElementById('sttr_valuation').value = '';
    }

    // CGST IN % @PRIYANKA-27NOV2020
    if (document.getElementById('sttr_tot_price_cgst_per').value == '' || document.getElementById('sttr_tot_price_cgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_per').value = '';
    }

    // CALCULATE CGST AMT => (VAL * CGST IN %) / 100 @PRIYANKA-27NOV2020
    if (document.getElementById('sttr_tot_price_cgst_per').value != '') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_cgst_per').value) / 100)).toFixed(2);
    }

    // CGST CHRG @PRIYANKA-27NOV2020
    if (document.getElementById('sttr_tot_price_cgst_chrg').value == '' || document.getElementById('sttr_tot_price_cgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_cgst_chrg').value = 0;
    }

    // SGST IN % @PRIYANKA-27NOV2020
    if (document.getElementById('sttr_tot_price_sgst_per').value == '' || document.getElementById('sttr_tot_price_sgst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_per').value = '';
    }

    // CALCULATE SGST AMT => (VAL * SGST IN %) / 100 @PRIYANKA-27NOV2020
    if (document.getElementById('sttr_tot_price_sgst_per').value != '') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_sgst_per').value) / 100)).toFixed(2);
    }

    // SGST CHRG @PRIYANKA-27NOV2020
    if (document.getElementById('sttr_tot_price_sgst_chrg').value == '' || document.getElementById('sttr_tot_price_sgst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_sgst_chrg').value = 0;
    }

    // IGST IN % @PRIYANKA-27NOV2020
    if (document.getElementById('sttr_tot_price_igst_per').value == '' || document.getElementById('sttr_tot_price_igst_per').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_per').value = '';
    }

    // CALCULATE IGST AMT => (VAL * IGST IN %) / 100 @PRIYANKA-27NOV2020
    if (document.getElementById('sttr_tot_price_igst_per').value != '') {
        document.getElementById('sttr_tot_price_igst_chrg').value = (parseFloat(document.getElementById('sttr_valuation').value) * (parseFloat(document.getElementById('sttr_tot_price_igst_per').value) / 100)).toFixed(2);
    }

    // IGST CHRG @PRIYANKA-27NOV2020
    if (document.getElementById('sttr_tot_price_igst_chrg').value == '' || document.getElementById('sttr_tot_price_igst_chrg').value == 'NaN') {
        document.getElementById('sttr_tot_price_igst_chrg').value = 0;
    }

    if (document.getElementById('sttr_tax').value == '' || document.getElementById('sttr_tax').value == 'NaN' ||
            document.getElementById('sttr_tax').value == 'undefined') {
        //document.getElementById('sttr_tax').value = 0;
    }


    // CALCULATE TOT TAX AMT => CGST AMT + SGST AMT + IGST AMT @PRIYANKA-27NOV2020
    document.getElementById('sttr_tot_tax').value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_sgst_chrg').value) +
            parseFloat(document.getElementById('sttr_tot_price_igst_chrg').value)).toFixed(2);

    if (document.getElementById('sttr_tot_tax').value == '' || document.getElementById('sttr_tot_tax').value == 'NaN') {
        document.getElementById('sttr_tot_tax').value = 0;
    }


    if (document.getElementById('sttr_final_valuation').value == 'NaN') {
        document.getElementById('sttr_final_valuation').value = 0;
    }

    // CALCULATE TOT TAX AMT @PRIYANKA-27NOV2020
    if (document.getElementById('sttr_tax').value > 0) {
        document.getElementById('sttr_tot_tax').value = ((parseFloat(document.getElementById('sttr_valuation').value) * document.getElementById('sttr_tax').value) / 100).toFixed(2);
    }

    // CALCULATE FINAL PRICE => PRICE + TOTAL TAX @PRIYANKA-27NOV2020
    if (document.getElementById('sttr_tot_tax').value != '') {
        document.getElementById('sttr_final_valuation').value = Math_round(parseFloat(document.getElementById('sttr_valuation').value) + parseFloat(document.getElementById('sttr_tot_tax').value)).toFixed(2);
    } else {
        document.getElementById('sttr_final_valuation').value = Math_round((parseFloat(document.getElementById('sttr_valuation').value))).toFixed(2);
    }

    return false;
}



function calculateImitationSellPriceTaxByValB2() {

    var itemsQTY = parseInt(document.getElementById('slPrItemPieces').value);

    //alert('itemsQTY ==' + document.getElementById('slPrItemPieces').value);

    if (itemsQTY == '' || itemsQTY == null || itemsQTY == '0') {
        itemsQTY = 1;
    }

    document.getElementById('taxByValMainAmount').value = ((parseFloat(document.getElementById('sttr_metal_amt').value) - parseFloat(document.getElementById('sttr_metal_discount_amt').value))).toFixed(2);

    if (document.getElementById("sttr_taxincl_checked").checked == true) {

        if (document.getElementById('slPrItemPriMkgIgstPer').value != '0' && document.getElementById('slPrItemPriMkgIgstPer').value != '') {

            var taxPriceWithoutTax = (((100 * parseFloat(document.getElementById('taxByValMainAmount').value)) / (100 + parseFloat(document.getElementById('slPrItemPriMkgIgstPer').value)))).toFixed(2);

            document.getElementById('slPrItemPriceQty').value = (parseFloat(taxPriceWithoutTax)).toFixed(2);

            //alert('slPrItemPriceQty ==' +  document.getElementById('slPrItemPriceQty').value);
            //document.getElementById('slPrItemCharges').value = document.getElementById('slPrItemPriceQty').value;

        } else if (document.getElementById('slPrItemPriMkgCgstPer').value != '0' && document.getElementById('slPrItemPriMkgCgstPer').value != '') {

            //alert('slPrItemCharges == ' + document.getElementById('slPrItemCharges').value);
            //alert('slPrItemPriMkgCgstPer == ' + document.getElementById('slPrItemPriMkgCgstPer').value);
            //alert('itemsQTY == ' + itemsQTY);

            var taxPriceWithoutTax = (((100 * parseFloat(document.getElementById('taxByValMainAmount').value)) / (100 + parseFloat(document.getElementById('slPrItemPriMkgCgstPer').value) * 2))).toFixed(2);

            document.getElementById('slPrItemPriceQty').value = (parseFloat(taxPriceWithoutTax)).toFixed(2);


            //alert('slPrItemPriceQty ==' +  document.getElementById('slPrItemPriceQty').value);            
            //document.getElementById('slPrItemCharges').value = document.getElementById('slPrItemPriceQty').value;
        } else {
            var taxPriceWithoutTax = document.getElementById('slPrItemPriceQty').value = ((parseFloat(document.getElementById('sttr_metal_amt').value) - parseFloat(document.getElementById('sttr_metal_discount_amt').value))).toFixed(2);
        }

        document.getElementById('slPrItemValuation').value = ((parseFloat(taxPriceWithoutTax) + parseFloat(document.getElementById('slPrItemMkgCharges').value))).toFixed(2);

        //alert('slPrItemValuation ==' +  document.getElementById('slPrItemValuation').value);
    }

    if (document.getElementById("sttr_taxincl_checked").checked == false) {
        document.getElementById('slPrItemPriceQty').value = ((parseFloat(document.getElementById('sttr_metal_amt').value) - parseFloat(document.getElementById('sttr_metal_discount_amt').value))).toFixed(2);

        //document.getElementById('slPrItemCharges').value = document.getElementById('slPrItemPriceQty').value;
        //alert('slPrItemPriceQty ==' +  document.getElementById('slPrItemPriceQty').value);

        document.getElementById('slPrItemValuation').value = ((parseFloat(document.getElementById('slPrItemPriceQty').value) + parseFloat(document.getElementById('slPrItemMkgCharges').value))).toFixed(2);

        //alert('slPrItemValuation **==' +  document.getElementById('slPrItemValuation').value);

        document.getElementById('slPrItemQtyMkgCharges').value = ((parseFloat(document.getElementById('slPrItemMkgCharges').value))) * (parseFloat(itemsQTY)).toFixed(2);

    }

    if (document.getElementById('slPrItemPriceQty').value == 'NaN') {
        document.getElementById('slPrItemPriceQty').value = 0;
    }

    if (document.getElementById('slPrItemValuation').value == 'NaN') {
        document.getElementById('slPrItemValuation').value = 0;
    }

    //calculate CGST for QTY * MKG CHRG
    if (document.getElementById('slPrItemQtyMkgCgstPer').value != '') {
        document.getElementById('slPrItemMkgCgstChrg').value = (parseFloat(document.getElementById('slPrItemQtyMkgCharges').value) * (parseFloat(document.getElementById('slPrItemQtyMkgCgstPer').value) / 100)).toFixed(2);
    }
    //calculate SGST for QTY * MKG CHRG
    if (document.getElementById('slPrItemMkgSgstPer').value != '') {
        document.getElementById('slPrItemMkgSgstChrg').value = (parseFloat(document.getElementById('slPrItemQtyMkgCharges').value) * (parseFloat(document.getElementById('slPrItemMkgSgstPer').value) / 100)).toFixed(2);
    }
    //calculate IGST for QTY * MKG CHRG
    if (document.getElementById('slPrItemMkgIgstPer').value != '') {
        document.getElementById('slPrItemMkgIgstChrg').value = (parseFloat(document.getElementById('slPrItemQtyMkgCharges').value) * (parseFloat(document.getElementById('slPrItemMkgIgstPer').value) / 100)).toFixed(2);
    }

    //calculate CGST for QTY * PRICE
    if (document.getElementById('slPrItemPriMkgCgstPer').value != '') {
        document.getElementById('slPrItemPriMkgCgstChrg').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) * (parseFloat(document.getElementById('slPrItemPriMkgCgstPer').value) / 100)).toFixed(2);
    }

    if (document.getElementById('slPrItemPriMkgCgstChrg').value == 'NaN') {
        document.getElementById('slPrItemPriMkgCgstChrg').value = 0;
    }

    //calculate SGST for QTY * PRICE
    if (document.getElementById('slPrItemPriMkgSgstPer').value != '') {
        document.getElementById('slPrItemPriMkgSgstChrg').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) * (parseFloat(document.getElementById('slPrItemPriMkgSgstPer').value) / 100)).toFixed(2);
    }

    if (document.getElementById('slPrItemPriMkgSgstChrg').value == 'NaN') {
        document.getElementById('slPrItemPriMkgSgstChrg').value = 0;
    }

    //calculate IGST for QTY * PRICE
    if (document.getElementById('slPrItemPriMkgIgstPer').value != '') {
        document.getElementById('slPrItemPriMkgIgstChrg').value = (parseFloat(document.getElementById('slPrItemPriceQty').value) * (parseFloat(document.getElementById('slPrItemPriMkgIgstPer').value) / 100)).toFixed(2);
    }

    if (document.getElementById('slPrItemPriMkgIgstChrg').value == 'NaN') {
        document.getElementById('slPrItemPriMkgIgstChrg').value = 0;
    }

    //Calculate Total Item Tax cgst+sgst+igst
    document.getElementById('slPrItemTotTax').value = (parseFloat(document.getElementById('slPrItemMkgCgstChrg').value) +
            parseFloat(document.getElementById('slPrItemMkgSgstChrg').value) +
            parseFloat(document.getElementById('slPrItemMkgIgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgCgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgSgstChrg').value) +
            parseFloat(document.getElementById('slPrItemPriMkgIgstChrg').value));
    var cryVal = 0;
    if (document.getElementById('addItemCryFinVal')) {
        if (document.getElementById('addItemCryFinVal').value != '') {
            cryVal = parseFloat(document.getElementById('addItemCryFinVal').value).toFixed(2);
        }
    }
    var slPrItemFinalVal = (parseFloat(document.getElementById('slPrItemValuation').value)) + (parseFloat(document.getElementById('slPrItemTotTax').value));
    document.getElementById('slPrItemFinalVal').value = Math_round(slPrItemFinalVal) + parseFloat(cryVal);

    if (document.getElementById('slPrItemFinalVal').value == 'NaN') {
        document.getElementById('slPrItemFinalVal').value = 0;
    }

    return false;
}
//START FUNCTION FOR CLOSE FINANCE: AUTHOR @DARSHANA 26 DEC 2021
function cloaseFinance(girvId, indicator, custId, totalPaid) {
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("girviDetailsDiv").innerHTML = xmlhttp.responseText;
        }
    };
    confirm_box = confirm("Do you really want to Close Finance?");
    if (confirm_box == true) {
        xmlhttp.open("POST", "include/php/omclsfinance.php?girviId=" + girvId + "&indicator=" + indicator + "&custId=" + custId + "&totalPaid=" + totalPaid, true);
    }
    xmlhttp.send();
}
//
//START CODE FOR AUCTION CHARGES AND EXTRA CHRG : AUTHOR @DARSHANA 31 MARCH 2022
function auctionChargesCalculation() {
    var auctionChrg = document.getElementById('aucChargeAmount').value;
    //    alert('auctionChrg==' + auctionChrg);
    var auctionExtraChrg = document.getElementById('aucExChrgAmount').value;
    var auctionIntrestAmt = document.getElementById('aucIntrAmount').value;
    var aucPrincAmount = document.getElementById('aucPrincAmount').value;

    if (auctionChrg == '' || auctionChrg == null) {
        auctionChrg = 0;
    }
    if (auctionExtraChrg == '' || auctionExtraChrg == null) {
        auctionExtraChrg = 0;
    }

    var acutionTotalamt = (Math_round(parseFloat(aucPrincAmount) + parseFloat(auctionIntrestAmt) + parseFloat(auctionChrg) + parseFloat(auctionExtraChrg))).toFixed(2);
    document.getElementById('auctotalAmount').value = acutionTotalamt;

}
//END CODE FOR AUCTION CHARGES AND EXTRA CHRG : AUTHOR @DARSHANA 31 MARCH 2022


//START CODE FOR RETAIL SELL FORM CALCULATION FUNCTION @AMOL 05-04-2023
function calSuppProdPriceRetailSellAllForms() {
    //GETTING VALUES
    var qty = document.getElementById('sttr_quantity').value;
    var sell_rate = document.getElementById('sttr_sell_rate').value;
    var sell_charges = document.getElementById('sttr_making_charges').value;
    var disc_per = document.getElementById('sttr_metal_discount_per').value;
    var disc_amt = document.getElementById('sttr_metal_discount_amt').value;
    var sell_amt = document.getElementById('sttr_cust_price').value;
    var tot_price = document.getElementById('sttr_valuation').value;
    var isByUnitExist = document.getElementById('isByUnitExist').value;

    var tax_per;
    if (document.getElementById('isGstOrTax').value == 'GST') {
        tax_per = document.getElementById('gst_tax').value;
    }
    if (document.getElementById('isGstOrTax').value == 'TAX') {
        tax_per = document.getElementById('sttr_tax').value;
    }
    var tot_tax = document.getElementById('sttr_tot_tax').value;
    var final_tot_price = document.getElementById('sttr_final_valuation').value;
    //END GETTING VALUES

    qty = (qty == '') ? 0 : parseFloat(qty);
    sell_rate = (sell_rate == '') ? 0 : parseFloat(sell_rate);
    sell_charges = (sell_charges == '') ? 0 : parseFloat(sell_charges);
    disc_per = (disc_per == '') ? 0 : parseFloat(disc_per);
    disc_amt = (disc_amt == '') ? 0 : parseFloat(disc_amt);
    sell_amt = (sell_amt == '') ? 0 : parseFloat(sell_amt);
    tot_price = (tot_price == '') ? 0 : parseFloat(tot_price);
    tax_per = (tax_per == '') ? 0 : parseFloat(tax_per);
    tot_tax = (tot_tax == '') ? 0 : parseFloat(tot_tax);
    final_tot_price = (final_tot_price == '') ? 0 : parseFloat(final_tot_price);

    //QTY
    if (qty == 0 || qty == '') {
        qty = 1;
    }

    //calu by unit/qty    sttr_gs_weight      sttr_cust_itmcalby
    if (isByUnitExist == 'YES') {
        if (document.getElementById('sttr_cust_itmcalby').value == 'UNIT') {
            var qty_old = qty;
            qty = parseFloat(document.getElementById('sttr_gs_weight').value);
        }
    }



    //DISC AMT
    if (disc_per != 0 && disc_per != '') {
        disc_amt = (sell_rate / 100) * disc_per;
    } else {
        disc_amt = 0;
    }
    //SELL AMOUNT 
    if (sell_rate != 0 && sell_rate != '') {
        sell_amt = (parseFloat(sell_rate) - parseFloat(disc_amt)) + parseFloat(sell_charges);
    } else {
        sell_amt = 0;
    }

    //EXCLUDING TAX
    if (document.getElementById('sttr_taxincl_checked').checked == false) {
        //TOTAL PRICE
        if (sell_amt != 0 && sell_amt != '') {
            tot_price = sell_amt * qty;
        } else {
            tot_price = 0;
        }
        //TOTAL TAX AMT
        if (tax_per != 0 && tax_per != '' && tot_price != 0 && tot_price != '') {
            tot_tax = (tot_price / 100) * tax_per;
        } else {
            tot_tax = 0;
        }
        //TOTAL FINAL PRICE
        if (tot_price != 0 && tot_price != '') {
            final_tot_price = tot_price + tot_tax;
        } else {
            final_tot_price = 0;
        }
    } else {
        //INCLUDING TAX
        //TOTAL FINAL PRICE
        if (sell_amt != 0 && sell_amt != '') {
            final_tot_price = (sell_amt * qty);
        } else {
            final_tot_price = 0;
        }
        //TOTAL TAX AMT
        if (tax_per != 0 && tax_per != '' && final_tot_price != 0 && final_tot_price != '') {
            tot_tax = (final_tot_price * tax_per) / (100 + tax_per);
        } else {
            tot_tax = 0;
        }
        //TOTAL PRICE
        if (final_tot_price != 0 && final_tot_price != '') {
            tot_price = final_tot_price - tot_tax;
        } else {
            tot_price = 0;
        }
    }

    //GIVING VALUE BACK TO QTY
    if (isByUnitExist == 'YES') {
        if (document.getElementById('sttr_cust_itmcalby').value == 'UNIT') {
            qty = qty_old;
        }
    }

    qty = (qty == 0 || qty == 'NaN') ? 1 : parseFloat(qty);
    sell_rate = (sell_rate == 0 || sell_rate == 'NaN') ? 0 : parseFloat(sell_rate).toFixed(2);
    sell_charges = (sell_charges == 0 || sell_charges == 'NaN') ? 0 : parseFloat(sell_charges).toFixed(2);
    disc_per = (disc_per == 0 || disc_per == 'NaN') ? 0 : parseFloat(disc_per).toFixed(2);
    disc_amt = (disc_amt == 0 || disc_amt == 'NaN') ? 0 : parseFloat(disc_amt).toFixed(2);
    sell_amt = (sell_amt == 0 || sell_amt == 'NaN') ? 0 : parseFloat(sell_amt).toFixed(2);
    tot_price = (tot_price == 0 || tot_price == 'NaN') ? 0 : parseFloat(tot_price).toFixed(2);
    tot_tax = (tot_tax == 0 || tot_tax == 'NaN') ? 0 : parseFloat(tot_tax).toFixed(2);
    final_tot_price = (final_tot_price == 0 || final_tot_price == 'NaN') ? 0 : parseFloat(final_tot_price).toFixed(2);
    //SET VALUES 
    document.getElementById('sttr_quantity').value = qty;
    document.getElementById('sttr_sell_rate').value = (parseInt(sell_rate) == sell_rate) ? parseInt(sell_rate) : sell_rate;
    document.getElementById('sttr_making_charges').value = (parseInt(sell_charges) == sell_charges) ? parseInt(sell_charges) : sell_charges;
    document.getElementById('sttr_metal_discount_per').value = (parseInt(disc_per) == disc_per) ? parseInt(disc_per) : disc_per;
    document.getElementById('sttr_metal_discount_amt').value = (parseInt(disc_amt) == disc_amt) ? parseInt(disc_amt) : disc_amt;
    document.getElementById('sttr_cust_price').value = (parseInt(sell_amt) == sell_amt) ? parseInt(sell_amt) : sell_amt;
    document.getElementById('sttr_valuation').value = (parseInt(tot_price) == tot_price) ? parseInt(tot_price) : tot_price;
    document.getElementById('sttr_tot_tax').value = (parseInt(tot_tax) == tot_tax) ? parseInt(tot_tax) : tot_tax;
    document.getElementById('sttr_final_valuation').value = (parseInt(final_tot_price) == final_tot_price) ? parseInt(final_tot_price) : final_tot_price;
    //END SET VALUES
    return false;
}
//END CODE FOR RETAIL SELL FORM CALCULATION FUNCTION @AMOL 05-04-2023
