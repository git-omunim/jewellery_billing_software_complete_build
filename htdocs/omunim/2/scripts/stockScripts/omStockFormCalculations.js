/* 
 * *************************************************************************************************************************************
 * @tutorial: UNIVERSAL JAVASCRIPT CALCULATIONS FILE @PRIYANKA-24JAN19
 * *************************************************************************************************************************************
 *
 * Created on on 24 JAN, 2019 12:01:00 PM
 * 
 * @FileName: omStockFormCalculations.js
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2019 www.softwaregen.com
 * @All rights reserved
 * Copyright 2019 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA
 *  REASON: UNIVERSAL JAVASCRIPT CALCULATIONS FILE
 *  
 */
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION to add new division
// *************************************************************************************************************************************
var numberOfDiv = 0;
function createChildDiv(parentDiv, prodCount) {
    numberOfDiv = prodCount;
    with (document) {
        var newDiv = createElement('div');
        with (newDiv) {
            id = parentDiv + numberOfDiv;
            appendChild(createTextNode('Loading...'));
        }
        getElementById(parentDiv).appendChild(newDiv);
        //getElementById(parentDiv).parentNode.insertBefore(newDiv, parentDiv.nextSibling);
    }

}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION to add new division
// *************************************************************************************************************************************
// 
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION addFormFunc_2_6_72() FOR MULTIPLE FORM DIV ON SAME PANEL @PRIYANKA-27APR18
// *************************************************************************************************************************************
function addFormFunc_2_6_72(mainProdCount, prodCount, div, mainPanelName, panelName, crystalPanelName, operation, indicator, transactionType, stockType, custId, crystalIndicator, sttr_trans_id) {
    //
    var documentRootPath = document.getElementById('documentRootPath').value;
    //
    if ((typeof (document.getElementById(div + mainProdCount)) == 'undefined' ||
            (document.getElementById(div + mainProdCount) == null)) && mainProdCount != '0') {
        createChildDiv(div, mainProdCount);
    } else if (typeof (document.getElementById(div + mainProdCount + '' + prodCount)) == 'undefined' ||
            (document.getElementById(div + mainProdCount + '' + prodCount) == null)) {
        createChildDiv(div + '' + mainProdCount, prodCount);
    }
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            if (prodCount == '') {
                document.getElementById('sttr_noofprod').value = mainProdCount;
                document.getElementById(div + mainProdCount).innerHTML = xmlhttp.responseText;
            } else {
                //alert(xmlhttp.responseText);
                document.getElementById('sttr_noofprod' + mainProdCount).value = prodCount;
                document.getElementById(div + mainProdCount + '' + prodCount).innerHTML = xmlhttp.responseText;
            }
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/stock/omStockTransFormSubDiv.php?mainProdCount=" + mainProdCount
            + "&prodCount=" + prodCount + "&mainPanelName=" + mainPanelName + "&panelName=" + panelName
            + "&crystalPanelName=" + crystalPanelName + "&fixedPricePanelName=" + panelName
            + "&operation=" + operation + "&indicator=" + indicator + "&transactionType=" + transactionType
            + "&stockType=" + stockType + "&custId=" + custId + "&crystalIndicator=" + crystalIndicator + "&sttr_trans_id=" + sttr_trans_id, true);
    //
    xmlhttp.send();
}
// *************************************************************************************************************************************
// END OF CODE TO ADD FUNCTION addFormFunc_2_6_72() FOR MULTIPLE FORM DIV ON SAME PANEL @PRIYANKA-27APR18
// *************************************************************************************************************************************
//
//
//
//
// *************************************************************************************************************************************
// START CODE FOR CLOSE MULTIPLE FORM DIV @PRIYANKA-09MAY18
// *************************************************************************************************************************************
function closeFormFunc_2_6_72(mainProdCount, prodCount, div, mainPanelName, panelName, operation, indicator, transactionType, stockType, custId, crystalIndicator, sttr_trans_id) {
    //
    if (prodCount == 0) {
        prodCount = '';
    }
    //
    var childDivName = document.getElementById(div);
    //
    //
    //alert('div == ' + div);
    //alert('mainProdCount == ' + mainProdCount);
    //alert('prodCount == ' + prodCount);
    //
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            //
            //if (prodCount == '' || prodCount == 0 || prodCount == null) {
            //    document.getElementById(div).innerHTML = xmlhttp.responseText;
            //} else {
            //document.getElementById('sttr_noofprod').value = prodCount;
            //
            //document.getElementById('sttr_noofprod'+ mainProdCount).value = prodCount - 1;
            //autoLessWeightFunction(prodCount, 'addFromGrossWt'); // Comment on 13 Nov 2018
            //
            if (prodCount == '' || prodCount == null) {
                for (var p = 1; p <= document.getElementById('sttr_noofprod' + mainProdCount).value; p++) {
                    if (typeof (document.getElementById(div + mainProdCount + '' + p)) != 'undefined' &&
                            (document.getElementById(div + mainProdCount + '' + p) != null))
                        document.getElementById(div + mainProdCount).removeChild(document.getElementById(div + mainProdCount + '' + p));
                }
                if (typeof (document.getElementById(div + mainProdCount)) != 'undefined' &&
                        (document.getElementById(div + mainProdCount) != null)) {
                    document.getElementById(div).removeChild(document.getElementById(div + mainProdCount));
                    document.getElementById('sttr_noofprod').value = document.getElementById('sttr_noofprod').value - 1;
                }
            } else {
                if (typeof (document.getElementById(div + mainProdCount + '' + prodCount)) != 'undefined' &&
                        (document.getElementById(div + mainProdCount + '' + prodCount) != null)) {
                    document.getElementById(div + mainProdCount).removeChild(document.getElementById(div + mainProdCount + '' + prodCount));
                    document.getElementById('sttr_noofprod' + mainProdCount).value = document.getElementById('sttr_noofprod' + mainProdCount).value - 1;
                }
            }
            //
            if (indicator == 'stockCrystal' || panelName == 'CRYSTAL') {
                setTimeout(function () {
                    autoLessWeightFunction(mainProdCount, 'doNotLess');
                }, 80);
            }
            //
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "include/php/stock/omStockTransFormSubDiv.php?prodCount=" + prodCount
            + "&mainPanelName=" + mainPanelName + "&panelName=" + panelName
            + "&operation=" + operation + "&indicator=" + indicator + "&transactionType=" + transactionType
            + "&stockType=" + stockType + "&custId=" + custId + "&crystalIndicator=" + crystalIndicator + "&sttr_trans_id=" + sttr_trans_id, true);
    //
    xmlhttp.send();
}
//
// *************************************************************************************************************************************
// END CODE FOR CLOSE MULTIPLE FORM DIV @PRIYANKA-09MAY18
// *************************************************************************************************************************************

// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR TAX CALCULATIONS @PRIYANKA-02APR18
// *************************************************************************************************************************************
function stockTransCalcFunc(prodCount, process, discountCal) {
    
    //alert('prodCount == ' + prodCount);
    
    setTimeout(function () {

        // PRODUCT TYPE @PRIYANKA-28JAN19
        if (typeof (document.getElementById('sttr_product_type')) != 'undefined' &&
                (document.getElementById('sttr_product_type') != null)) {
            // PRODUCT TYPE @PRIYANKA-28JAN19
            var prodType = document.getElementById('sttr_product_type').value;
        }

        //alert('prodType 1== ' + prodType);

        if (prodType == '' || prodType == null || prodType == 'undefined') {
            // PRODUCT TYPE IS NULL/BLANK
            // USE PRODUCT COUNT @PRIYANKA-28JAN19
            if (typeof (document.getElementById('sttr_product_type' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_product_type' + prodCount) != null)) {
                // PRODUCT TYPE @PRIYANKA-28JAN19
                var prodType = document.getElementById('sttr_product_type' + prodCount).value;
            }
        }

        //alert('prodType 2== ' + prodType);

        // *************************************************************************************************************************************
        // START CODE FOR PURCHASE RATE & PRODUCT SELL RATE
        // *************************************************************************************************************************************

        // PRODUCT PURCHASE RATE
        if (typeof (document.getElementById('sttr_product_purchase_rate' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_product_purchase_rate' + prodCount) != null)) {
            // PRODUCT PURCHASE RATE
            var prodRate = parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value);

        } else {
            // PRODUCT RATE        
            var prodRate = null;
        }

        // PRODUCT RATE
        if (prodRate == '' || prodRate == null) {
            // PRODUCT RATE
            if (typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_product_sell_rate' + prodCount) != null)) {
                // PRODUCT RATE
                prodRate = parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value);
            }
        }

        //alert('prodRate == ' + prodRate);


        // PRODUCT PURCHASE RATE & PRODUCT SELL RATE
        if (typeof (document.getElementById('sttr_product_purchase_rate' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_product_purchase_rate' + prodCount) != null) &&
                typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_product_sell_rate' + prodCount) != null)) {
            // PRODUCT SELL RATE
            if (typeof (document.getElementById('panelName' + prodCount)) != 'undefined' &&
                    (document.getElementById('panelName' + prodCount) != null)) {
                if ((document.getElementById('panelName' + prodCount).value !== 'FINE_JEWELLERY_RETAIL_PUR_B6')
                        && (document.getElementById('panelName' + prodCount).value !== 'FINE_JEWELLERY_WHOLESALE_PUR_B6')
                        && (document.getElementById('panelName' + prodCount).value !== 'FINE_JEWELLERY_RETAIL_PUR_B7')
                        && (document.getElementById('panelName' + prodCount).value !== 'FINE_JEWELLERY_WHOLESALE_PUR_B7')
                        && (document.getElementById('panelName' + prodCount).value !== 'IMITATION_WHOLESALE_PUR_JEWELLERY_B6')
                        && (document.getElementById('panelName' + prodCount).value !== 'IMITATION_RETAIL_PUR_JEWELLERY_B6')
                        && (document.getElementById('panelName' + prodCount).value !== 'CRYSTAL')) {
                    if ((document.getElementById('sttr_product_sell_rate' + prodCount).value == '') &&
                            document.getElementById('sttr_product_purchase_rate' + prodCount).value != '') {
                        document.getElementById('sttr_product_sell_rate' + prodCount).value = parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value);
                    }
                }
            }
        }

        // PRODUCT SELL RATE
        if (typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_product_sell_rate' + prodCount) != null)) {
            // PRODUCT SELL RATE
            if (document.getElementById('sttr_product_sell_rate' + prodCount).value == 'NaN') {
                document.getElementById('sttr_product_sell_rate' + prodCount).value = 0;
            }
        }


        // PRODUCT PURCHASE RATE TYPE @PRIYANKA-29JAN19
        if (typeof (document.getElementById('sttr_product_purchase_rate_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_product_purchase_rate_type' + prodCount) != null)) {
            // PRODUCT PURCHASE RATE TYPE @PRIYANKA-29JAN19
            var prodRateType = document.getElementById('sttr_product_purchase_rate_type' + prodCount).value;
        }


        // PRODUCT SELL RATE TYPE @PRIYANKA-29JAN19
        if (prodRateType == '' || prodRateType == null) {
            // PRODUCT SELL RATE TYPE @PRIYANKA-29JAN19
            if (typeof (document.getElementById('sttr_product_sell_rate_type' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_product_sell_rate_type' + prodCount) != null)) {
                // PRODUCT SELL RATE TYPE @PRIYANKA-29JAN19
                prodRateType = document.getElementById('sttr_product_sell_rate_type' + prodCount).value;
            }
        }


        // PRODUCT SELL RATE TYPE FOR STONE ENTRIES @PRIYANKA-03AUG2021
        if (typeof (document.getElementById('sttr_product_sell_rate_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_product_sell_rate_type' + prodCount) != null) &&
                typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_gs_weight_type' + prodCount) != null) &&
                (document.getElementById('panelName' + prodCount).value == 'CRYSTAL')) {
            //
            // PRODUCT SELL RATE TYPE FOR STONE ENTRIES @PRIYANKA-03AUG2021
            document.getElementById('sttr_product_sell_rate_type' + prodCount).value = document.getElementById('sttr_gs_weight_type' + prodCount).value;
            //
            // PRODUCT SELL RATE TYPE FOR STONE ENTRIES @PRIYANKA-03AUG2021
            prodRateType = document.getElementById('sttr_product_sell_rate_type' + prodCount).value;
            //
        }


        // PRODUCT SELL RATE TYPE @PRIYANKA-29JAN19
        if (typeof (document.getElementById('sttr_product_purchase_rate_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_product_purchase_rate_type' + prodCount) != null) &&
                typeof (document.getElementById('sttr_product_sell_rate_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_product_sell_rate_type' + prodCount) != null)) {
            // PRODUCT SELL RATE TYPE @PRIYANKA-29JAN19
            if (document.getElementById('sttr_product_sell_rate_type' + prodCount).value != document.getElementById('sttr_product_purchase_rate_type' + prodCount).value) {
                document.getElementById('sttr_product_sell_rate_type' + prodCount).value = document.getElementById('sttr_product_purchase_rate_type' + prodCount).value;
            }
        }

        // *************************************************************************************************************************************
        // END CODE FOR PURCHASE RATE & PRODUCT SELL RATE
        // *************************************************************************************************************************************


        // *************************************************************************************************************************************
        // START CODE FOR IMITATION PURCHASE PRICE & PRODUCT SELL PRICE @PRIYANKA-28JAN19
        // *************************************************************************************************************************************        
        // 
        // PRODUCT ITEM CODE, ITEM NUM @PRIYANKA-28JAN19
        var prodItmCode = 0;
        var prodItmNum = 0;
        //
        // PRODUCT ITEM CODE @PRIYANKA-28JAN19
        if (typeof (document.getElementById('sttr_cust_itmcode' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_cust_itmcode' + prodCount) != null)) {
            // PRODUCT ITEM CODE @PRIYANKA-28JAN19
            if (document.getElementById('sttr_cust_itmcode' + prodCount).value == 'NaN') {
                document.getElementById('sttr_cust_itmcode' + prodCount).value = 0;
            }
            // PRODUCT ITEM CODE @PRIYANKA-28JAN19
            prodItmCode = document.getElementById('sttr_cust_itmcode' + prodCount).value;
        }
        //
        // PRODUCT ITEM NUM @PRIYANKA-28JAN19
        if (typeof (document.getElementById('sttr_cust_itmnum' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_cust_itmnum' + prodCount) != null)) {
            // PRODUCT ITEM NUM @PRIYANKA-28JAN19
            if (document.getElementById('sttr_cust_itmnum' + prodCount).value == 'NaN') {
                document.getElementById('sttr_cust_itmnum' + prodCount).value = 0;
            }
            // PRODUCT ITEM NUM @PRIYANKA-28JAN19
            prodItmNum = document.getElementById('sttr_cust_itmnum' + prodCount).value;
        }
        //
        // PRODUCT ITEM CAL TYPE @PRIYANKA-28JAN19
        if (typeof (document.getElementById('sttr_cust_itmcalby' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_cust_itmcalby' + prodCount) != null)) {
            // PRODUCT ITEM CAL TYPE @PRIYANKA-28JAN19
            var prodItmCalType = document.getElementById('sttr_cust_itmcalby' + prodCount).value;
        }
        //
        //
        if (typeof (prodItmCalType) != 'undefined' &&
                prodItmCalType != null) {
            //
            // CALCULATE PRODUCT PURCHASE PRICE @PRIYANKA-28JAN19
            if (prodItmCalType == 'M') {
                if (prodItmNum > 0 && prodItmCode > 0) {
                    // CALCULATE PRODUCT PURCHASE PRICE @PRIYANKA-28JAN19
                    if (typeof (document.getElementById('sttr_price' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_price' + prodCount) != null)) {
                        document.getElementById('sttr_price' + prodCount).value = parseFloat(parseFloat(prodItmCode) * parseFloat(prodItmNum)).toFixed(2);
                    }
                }
            } else if (prodItmCalType == 'D') {
                if (prodItmNum > 0 && prodItmCode > 0) {
                    // CALCULATE PRODUCT PURCHASE PRICE @PRIYANKA-28JAN19
                    if (typeof (document.getElementById('sttr_price' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_price' + prodCount) != null)) {
                        document.getElementById('sttr_price' + prodCount).value = parseFloat(parseFloat(prodItmCode) / parseFloat(prodItmNum)).toFixed(2);
                    }
                }
            }
        }
        // 
        // PRODUCT PURCHASE PRICE @PRIYANKA-28JAN19
        if (typeof (document.getElementById('sttr_price' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_price' + prodCount) != null)) {
            // PRODUCT PURCHASE PRICE @PRIYANKA-28JAN19
            var prodRate = parseFloat(document.getElementById('sttr_price' + prodCount).value);
        }
        //
        // PRODUCT SELL PRICE @PRIYANKA-28JAN19
        if (prodRate == '' || prodRate == null) {
            // PRODUCT SELL PRICE @PRIYANKA-28JAN19
            if (typeof (document.getElementById('sttr_cust_price' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_cust_price' + prodCount) != null)) {
                // PRODUCT SELL PRICE @PRIYANKA-28JAN19
                prodRate = parseFloat(document.getElementById('sttr_cust_price' + prodCount).value);
            }
        }
        //
        //
        //alert('prodRate @@== ' + prodRate);
        //
        // PRODUCT SELL PRICE @PRIYANKA-28JAN19
        if (typeof (document.getElementById('sttr_cust_price' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_cust_price' + prodCount) != null)) {
            // PRODUCT SELL PRICE @PRIYANKA-28JAN19
            if (document.getElementById('sttr_cust_price' + prodCount).value == 'NaN') {
                document.getElementById('sttr_cust_price' + prodCount).value = 0;
            }
        }
        //
        // *************************************************************************************************************************************
        // END CODE FOR IMITATION PURCHASE PRICE & PRODUCT SELL PRICE @PRIYANKA-28JAN19
        // *************************************************************************************************************************************

        // *************************************************************************************************************************************
        // START CODE FOR PRODUCT GROSS WEIGHT, GROSS WEIGHT TYPE @PRIYANKA-29JAN19
        // *************************************************************************************************************************************

        // PRODUCT GROSS WEIGHT @PRIYANKA-29JAN19
        if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_gs_weight' + prodCount) != null)) {
            // PRODUCT GROSS WEIGHT @PRIYANKA-29JAN19
            var prodGsWeight = document.getElementById('sttr_gs_weight' + prodCount).value
            if (prodGsWeight !== 'NaN' && prodGsWeight !== '') {
                document.getElementById('sttr_gs_weight' + prodCount).value = (parseFloat(prodGsWeight)).toFixed(3);
            }
        }


        // PRODUCT GROSS WEIGHT TYPE @PRIYANKA-29JAN19
        if (typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_gs_weight_type' + prodCount) != null)) {
            // PRODUCT GROSS WEIGHT TYPE @PRIYANKA-29JAN19
            var prodGsWeightType = document.getElementById('sttr_gs_weight_type' + prodCount).value;
        }

        // *************************************************************************************************************************************
        // END CODE FOR PRODUCT GROSS WEIGHT, GROSS WEIGHT TYPE @PRIYANKA-29JAN19
        // *************************************************************************************************************************************


        // *************************************************************************************************************************************
        // START CODE FOR PRODUCT ADD-ON WEIGHT, ADD-ON WEIGHT TYPE @PRIYANKA-19MAR2021
        // *************************************************************************************************************************************
        //
        //
        // PRODUCT ADD-ON WEIGHT @PRIYANKA-19MAR2021
        if (typeof (document.getElementById('sttr_add_on_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_add_on_weight' + prodCount) != null)) {
            // PRODUCT ADD-ON WEIGHT @PRIYANKA-19MAR2021
            var prodAddOnWeight = document.getElementById('sttr_add_on_weight' + prodCount).value
            if (prodAddOnWeight !== 'NaN' && prodAddOnWeight !== '') {
                document.getElementById('sttr_add_on_weight' + prodCount).value = (parseFloat(prodAddOnWeight)).toFixed(3);
            }
        }
        //
        //
        // PRODUCT ADD-ON WEIGHT TYPE @PRIYANKA-19MAR2021
        if (typeof (document.getElementById('sttr_add_on_weight_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_add_on_weight_type' + prodCount) != null)) {
            // PRODUCT ADD-ON WEIGHT TYPE @PRIYANKA-19MAR2021
            var prodAddOnWeightType = document.getElementById('sttr_add_on_weight_type' + prodCount).value;
        }
        //
        // *************************************************************************************************************************************
        // END CODE FOR PRODUCT ADD-ON WEIGHT, ADD-ON WEIGHT TYPE @PRIYANKA-19MAR2021
        // *************************************************************************************************************************************



        // PRODUCT QUANTITY
        if (typeof (document.getElementById('sttr_quantity' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_quantity' + prodCount) != null)) {
            // PRODUCT QUANTITY
            var prodQTY = (document.getElementById('sttr_quantity' + prodCount).value);
        }

        // *************************************************************************************************************************************
        // START CODE FOR PKT WT, NT WT CALCULATIONS
        // *************************************************************************************************************************************

        // PRODUCT PKT WEIGHT
        if (typeof (document.getElementById('sttr_pkt_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_pkt_weight' + prodCount) != null)) {

            // PRODUCT FIX PKT WEIGHT @PRIYANKA-09JULY2019
//            if (typeof (document.getElementById('sttr_fix_pkt_weight' + prodCount)) != 'undefined' &&
//                       (document.getElementById('sttr_fix_pkt_weight' + prodCount) != null)) {
//
//                // PRODUCT FIX PKT WEIGHT
//                if ((document.getElementById('sttr_fix_pkt_weight' + prodCount).value == '' ||
//                     document.getElementById('sttr_fix_pkt_weight' + prodCount).value == null) &&
//                    (document.getElementById('sttr_pkt_weight' + prodCount).value > 0)) {
//
//                    document.getElementById('sttr_fix_pkt_weight' + prodCount).value = document.getElementById('sttr_pkt_weight' + prodCount).value;
//
//                }
//
//                //alert('sttr_fix_pkt_weight 1== ' + document.getElementById('sttr_fix_pkt_weight' + prodCount).value);
//
//                if (document.getElementById('sttr_fix_pkt_weight' + prodCount).value == '' ||
//                    document.getElementById('sttr_fix_pkt_weight' + prodCount).value == null) {
//                    document.getElementById('sttr_fix_pkt_weight' + prodCount).value = 0;
//                }
//
//                //alert('sttr_fix_pkt_weight 2== ' + document.getElementById('sttr_fix_pkt_weight' + prodCount).value);
//            }

            // PRODUCT PKT WEIGHT
            if (document.getElementById('sttr_pkt_weight' + prodCount).value == '' ||
                    document.getElementById('sttr_pkt_weight' + prodCount).value == 'NaN') {
                document.getElementById('sttr_pkt_weight' + prodCount).value = 0;
            }

        }

        // PRODUCT PKT WEIGHT TYPE
        if (typeof (document.getElementById('sttr_pkt_weight_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_pkt_weight_type' + prodCount) != null) &&
                typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_gs_weight_type' + prodCount) != null)) {
            // PRODUCT PKT WEIGHT TYPE
            document.getElementById('sttr_pkt_weight_type' + prodCount).value = document.getElementById('sttr_gs_weight_type' + prodCount).value;
        }

        // PRODUCT NET WEIGHT
        if (typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_nt_weight' + prodCount) != null) &&
                typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_gs_weight' + prodCount) != null) &&
                typeof (document.getElementById('sttr_pkt_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_pkt_weight' + prodCount) != null)) {

            //alert('sttr_nt_weight == ' + document.getElementById('sttr_nt_weight' + prodCount).value);

            // CALCULATE PRODUCT NET WEIGHT
            var prodNtWeight = document.getElementById('sttr_nt_weight' + prodCount).value = (parseFloat(document.getElementById('sttr_gs_weight' + prodCount).value) - parseFloat(document.getElementById('sttr_pkt_weight' + prodCount).value)).toFixed(3);

        }

        // STONE WEIGHT LESS FROM NET WEIGHT @PRIYANKA-20AUG2019
        if (typeof (document.getElementById('sttr_stone_less_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_stone_less_weight' + prodCount) != null)) {

            if (document.getElementById('sttr_stone_less_weight' + prodCount).value == '' ||
                    document.getElementById('sttr_stone_less_weight' + prodCount).value == null) {
                document.getElementById('sttr_stone_less_weight' + prodCount).value = 0;
            }

            // PRODUCT NET WEIGHT @PRIYANKA-20AUG2019
            if (typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_nt_weight' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_gs_weight' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_pkt_weight' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_pkt_weight' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_stone_less_weight' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_stone_less_weight' + prodCount) != null)) {

                //alert('sttr_stone_less_weight == ' + document.getElementById('sttr_stone_less_weight' + prodCount).value);

                // CALCULATE PRODUCT NET WEIGHT @PRIYANKA-20AUG2019
                var prodNtWeight = document.getElementById('sttr_nt_weight' + prodCount).value = (parseFloat(document.getElementById('sttr_gs_weight' + prodCount).value) - parseFloat(parseFloat(document.getElementById('sttr_pkt_weight' + prodCount).value) + parseFloat(document.getElementById('sttr_stone_less_weight' + prodCount).value))).toFixed(3);

            }

        }

        // PRODUCT NET WEIGHT
        if (typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_nt_weight' + prodCount) != null)) {
            // PRODUCT NET WEIGHT
            if (document.getElementById('sttr_nt_weight' + prodCount).value == '' ||
                    document.getElementById('sttr_nt_weight' + prodCount).value == 'NaN') {
                document.getElementById('sttr_nt_weight' + prodCount).value = 0;
            }
        }

        // PRODUCT NET WEIGHT TYPE
        if (typeof (document.getElementById('sttr_nt_weight_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_nt_weight_type' + prodCount) != null) &&
                typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_gs_weight_type' + prodCount) != null)) {
            // PRODUCT NET WEIGHT TYPE
            document.getElementById('sttr_nt_weight_type' + prodCount).value = document.getElementById('sttr_gs_weight_type' + prodCount).value;
        }
        // *************************************************************************************************************************************
        // END CODE FOR PKT WT, NT WT CALCULATIONS
        // *************************************************************************************************************************************


        // *************************************************************************************************************************************
        // START CODE FOR PURITY, FINE WEIGHT, FINAL FINE WEIGHT & PURITY CALCULATIONS
        // *************************************************************************************************************************************
        if (typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_purity' + prodCount) != null) &&
                typeof (document.getElementById('sttr_purity_ct' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_purity_ct' + prodCount) != null)) {
            if (document.getElementById('sttr_purity' + prodCount).value == '') {
                document.getElementById('sttr_purity' + prodCount).value = (parseFloat(100 * (document.getElementById('sttr_purity_ct' + prodCount).value)) / 24).toFixed(2);
            }
        }



        if (typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_nt_weight' + prodCount) != null) &&
                typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_purity' + prodCount) != null)) {

            if (document.getElementById('sttr_nt_weight' + prodCount).value != '' &&
                    document.getElementById('sttr_purity' + prodCount).value != '') {
                // PRODUCT FINAL FINE WEIGHT BY
                if (typeof (document.getElementById('sttr_final_val_by' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_final_val_by' + prodCount) != null)) {
                    // PRODUCT FINAL FINE WEIGHT BY NET WEIGHT
                    if (document.getElementById('sttr_final_val_by' + prodCount).value == 'byNetWt') {
                        // NET WEIGHT & NET WEIGHT TYPE
                        if (typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_nt_weight' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_nt_weight_type' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_nt_weight_type' + prodCount) != null)) {
                            // NET WEIGHT & NET WEIGHT TYPE
                            var prodWt = document.getElementById('sttr_nt_weight' + prodCount).value;
                            var prodWtType = document.getElementById('sttr_nt_weight_type' + prodCount).value;
                        }

                        // CALCULATE FINE WEIGHT
                        if (typeof (document.getElementById('sttr_fine_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_fine_weight' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_purity' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_nt_weight' + prodCount) != null)) {
                            // CALCULATE FINE WEIGHT
                            document.getElementById('sttr_fine_weight' + prodCount).value = ((document.getElementById('sttr_purity' + prodCount).value * document.getElementById('sttr_nt_weight' + prodCount).value) / 100).toFixed(3);
                        }

                        // CALCULATE FINAL FINE WEIGHT
                        if (typeof (document.getElementById('sttr_final_fine_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_final_fine_weight' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_purity' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_nt_weight' + prodCount) != null)) {
                            // CALCULATE FINAL FINE WEIGHT
                            document.getElementById('sttr_final_fine_weight' + prodCount).value = ((document.getElementById('sttr_purity' + prodCount).value * document.getElementById('sttr_nt_weight' + prodCount).value) / 100).toFixed(3);
                        }

                        // PRODUCT FINAL FINE WEIGHT BY GROSS WEIGHT
                    } else if (document.getElementById('sttr_final_val_by' + prodCount).value == 'byGrossWt') {
                        // GROSS WEIGHT & GROSS WEIGHT TYPE
                        if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_gs_weight' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_gs_weight_type' + prodCount) != null)) {
                            // GROSS WEIGHT & GROSS WEIGHT TYPE
                            var prodWt = document.getElementById('sttr_gs_weight' + prodCount).value;
                            var prodWtType = document.getElementById('sttr_gs_weight_type' + prodCount).value;
                        }

                        // CALCULATE FINE WEIGHT
                        if (typeof (document.getElementById('sttr_fine_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_fine_weight' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_purity' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_gs_weight' + prodCount) != null)) {
                            // CALCULATE FINE WEIGHT
                            document.getElementById('sttr_fine_weight' + prodCount).value = ((document.getElementById('sttr_purity' + prodCount).value * document.getElementById('sttr_gs_weight' + prodCount).value) / 100).toFixed(3);
                        }

                        // CALCULATE FINAL FINE WEIGHT
                        if (typeof (document.getElementById('sttr_final_fine_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_final_fine_weight' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_purity' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_gs_weight' + prodCount) != null)) {
                            // CALCULATE FINAL FINE WEIGHT
                            document.getElementById('sttr_final_fine_weight' + prodCount).value = ((document.getElementById('sttr_purity' + prodCount).value * document.getElementById('sttr_gs_weight' + prodCount).value) / 100).toFixed(3);
                        }
                        // PRODUCT DEFAULT FINAL FINE WEIGHT CALCULATION BY NET WEIGHT

                    } else {

                        if (typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_nt_weight' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_nt_weight_type' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_nt_weight_type' + prodCount) != null)) {
                            // NET WEIGHT & NET WEIGHT TYPE
                            var prodWt = document.getElementById('sttr_nt_weight' + prodCount).value;
                            var prodWtType = document.getElementById('sttr_nt_weight_type' + prodCount).value;
                        }

                        // CALCULATE FINE WEIGHT
                        if (typeof (document.getElementById('sttr_fine_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_fine_weight' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_purity' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_nt_weight' + prodCount) != null)) {
                            // CALCULATE FINE WEIGHT
                            document.getElementById('sttr_fine_weight' + prodCount).value = ((document.getElementById('sttr_purity' + prodCount).value * document.getElementById('sttr_nt_weight' + prodCount).value) / 100).toFixed(3);
                        }

                        // CALCULATE FINAL FINE WEIGHT
                        if (typeof (document.getElementById('sttr_final_fine_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_final_fine_weight' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_purity' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_nt_weight' + prodCount) != null)) {
                            // CALCULATE FINAL FINE WEIGHT
                            document.getElementById('sttr_final_fine_weight' + prodCount).value = ((document.getElementById('sttr_purity' + prodCount).value * document.getElementById('sttr_nt_weight' + prodCount).value) / 100).toFixed(3);
                        }
                    }
                }
            }
        }

        // PRODUCT WASTAGE
        if (typeof (document.getElementById('sttr_wastage' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_wastage' + prodCount) != null)) {
            // PRODUCT WASTAGE
            if ((document.getElementById('sttr_wastage' + prodCount).value) != '') {
                // PRODUCT FINAL PURITY 
                if (typeof (document.getElementById('sttr_final_purity' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_final_purity' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_purity' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_wastage' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_wastage' + prodCount) != null)) {
                    // PRODUCT FINAL PURITY 
                    document.getElementById('sttr_final_purity' + prodCount).value = (parseFloat(document.getElementById('sttr_purity' + prodCount).value) + parseFloat(document.getElementById('sttr_wastage' + prodCount).value));
                }

                // PRODUCT FINAL FINE WEIGHT
                if (typeof (document.getElementById('sttr_final_fine_weight' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_final_fine_weight' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_purity' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_wastage' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_wastage' + prodCount) != null)) {
                    // PRODUCT FINAL FINE WEIGHT
                    document.getElementById('sttr_final_fine_weight' + prodCount).value = (((parseFloat(document.getElementById('sttr_wastage' + prodCount).value) + parseFloat(document.getElementById('sttr_purity' + prodCount).value)) * prodWt) / 100).toFixed(3);
                }

            } else {
                // PRODUCT FINAL PURITY
                if (typeof (document.getElementById('sttr_final_purity' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_final_purity' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_purity' + prodCount) != null)) {
                    // PRODUCT FINAL PURITY
                    if (document.getElementById('sttr_purity' + prodCount).value != '') {
                        document.getElementById('sttr_final_purity' + prodCount).value = parseFloat(document.getElementById('sttr_purity' + prodCount).value);
                    }
                }
            }
        } else {
            //
            // =========================================================================================================== //
            // START CODE TO ADD CONDITION FOR CALCULATE FINAL PURITY WHEN WSATGE IS NOT PRSENT @AUTHOR:MADHUREE-02DEC2020 //
            // =========================================================================================================== //
            //
            if (typeof (document.getElementById('sttr_final_purity' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_final_purity' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_purity' + prodCount) != null)) {
                // PRODUCT FINAL PURITY
                if (document.getElementById('sttr_purity' + prodCount).value != '') {
                    document.getElementById('sttr_final_purity' + prodCount).value = parseFloat(document.getElementById('sttr_purity' + prodCount).value);
                }
            }
            //
            // ========================================================================================================= //
            // END CODE TO ADD CONDITION FOR CALCULATE FINAL PURITY WHEN WSATGE IS NOT PRSENT @AUTHOR:MADHUREE-02DEC2020 //
            // ========================================================================================================= //
            //
        }

        // PRODUCT FINE WEIGHT
        if (typeof (document.getElementById('sttr_fine_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_fine_weight' + prodCount) != null)) {
            // PRODUCT FINE WEIGHT
            if (document.getElementById('sttr_fine_weight' + prodCount).value == '' ||
                    document.getElementById('sttr_fine_weight' + prodCount).value == 'NaN') {
                document.getElementById('sttr_fine_weight' + prodCount).value = 0;
            }
        }

        // PRODUCT FINAL FINE WEIGHT
        if (typeof (document.getElementById('sttr_final_fine_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_final_fine_weight' + prodCount) != null)) {
            // PRODUCT FINAL FINE WEIGHT
            if (document.getElementById('sttr_final_fine_weight' + prodCount).value == 'NaN') {
                document.getElementById('sttr_final_fine_weight' + prodCount).value = 0;
            }
        }

        // *************************************************************************************************************************************
        // END CODE FOR PURITY, FINE WEIGHT, FINAL FINE WEIGHT & PURITY CALCULATIONS
        // *************************************************************************************************************************************


        // *************************************************************************************************************************************
        // START CODE FOR LAB CHARGES, LAB CHARGES TYPE & LAB CHARGES CALCULATIONS
        // *************************************************************************************************************************************

        // IF PRODUCT WEIGHT TYPE IS NULL @PRIYANKA-28JAN19
        if (prodWtType == '' || prodWtType == null || prodWtType == 'undefined') {
            // IF PRODUCT WEIGHT TYPE IS NULL @PRIYANKA-28JAN19
            if (typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_gs_weight_type' + prodCount) != null)) {
                prodWtType = document.getElementById('sttr_gs_weight_type' + prodCount).value;
            }
        }


        // PRODUCT LAB CHARGES
        if (typeof (document.getElementById('sttr_lab_charges' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_lab_charges' + prodCount) != null)) {
            // PRODUCT LAB CHARGES
            var prodLabCharges = document.getElementById('sttr_lab_charges' + prodCount).value;
        }

        // PRODUCT LAB CHARGES TYPE
        if (typeof (document.getElementById('sttr_lab_charges_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_lab_charges_type' + prodCount) != null)) {
            // PRODUCT LAB CHARGES TYPE
            var prodLabChargesType = document.getElementById('sttr_lab_charges_type' + prodCount).value;
        }


        // PRODUCT TOTAL LAB CHARGES
        var prodTotalLabCharges = 0;

        if (typeof (document.getElementById('sttr_other_charges_by' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_other_charges_by' + prodCount) != null) &&
                typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_nt_weight' + prodCount) != null) &&
                typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_gs_weight' + prodCount) != null) &&
                typeof (document.getElementById('sttr_final_fine_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_final_fine_weight' + prodCount) != null)) {

            // PRODUCT LAB CHARGES BY @PRIYANKA-07-05-18
            if (document.getElementById('sttr_other_charges_by' + prodCount).value == 'lbByNetWt') {
                var prodLabChargesBy = parseFloat(document.getElementById('sttr_nt_weight' + prodCount).value);
            } else if (document.getElementById('sttr_other_charges_by' + prodCount).value == 'lbByGrossWt') {
                var prodLabChargesBy = parseFloat(document.getElementById('sttr_gs_weight' + prodCount).value);
            } else if (document.getElementById('sttr_other_charges_by' + prodCount).value == 'lbByFFineWt') {
                var prodLabChargesBy = parseFloat(document.getElementById('sttr_final_fine_weight' + prodCount).value);
            } else {
                var prodLabChargesBy = parseFloat(document.getElementById('sttr_final_fine_weight' + prodCount).value);
            }
        }

        // PRODUCT FINAL FINE WEIGHT
        if (typeof (document.getElementById('sttr_final_fine_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_final_fine_weight' + prodCount) != null) &&
                typeof (document.getElementById('sttr_final_valuation_by' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_final_valuation_by' + prodCount) != null)) {
            //
            var prodFinalValutionBy = document.getElementById('sttr_final_valuation_by' + prodCount).value;
            var prodFinalFineWeight;
            //
            if ((prodFinalValutionBy == 'byGrossWt')
                    && (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' && document.getElementById('sttr_gs_weight' + prodCount) != null)) {
                prodFinalFineWeight = parseFloat(document.getElementById('sttr_gs_weight' + prodCount).value);
            } else if ((prodFinalValutionBy == 'byNetWt')
                    && (typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' && document.getElementById('sttr_nt_weight' + prodCount) != null)) {
                prodFinalFineWeight = parseFloat(document.getElementById('sttr_nt_weight' + prodCount).value);
            } else if ((prodFinalValutionBy == 'byFineWt')
                    && (typeof (document.getElementById('sttr_fine_weight' + prodCount)) != 'undefined' && document.getElementById('sttr_fine_weight' + prodCount) != null)) {
                prodFinalFineWeight = parseFloat(document.getElementById('sttr_fine_weight' + prodCount).value);
            } else if ((prodFinalValutionBy == 'byFFineWt')
                    && (typeof (document.getElementById('sttr_final_fine_weight' + prodCount)) != 'undefined' && document.getElementById('sttr_final_fine_weight' + prodCount) != null)) {
                prodFinalFineWeight = parseFloat(document.getElementById('sttr_final_fine_weight' + prodCount).value);
            } else {
                prodFinalFineWeight = parseFloat(document.getElementById('sttr_final_fine_weight' + prodCount).value);
            }
            //
        }

        // IF PRODUCT LAB CHARGES BY IS NULL @PRIYANKA-29JAN19
        if (prodLabChargesBy == '' || prodLabChargesBy == null || prodLabChargesBy == 'undefined') {
            // IF PRODUCT LAB CHARGES BY IS NULL @PRIYANKA-29JAN19
            if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_gs_weight' + prodCount) != null)) {
                prodLabChargesBy = document.getElementById('sttr_gs_weight' + prodCount).value;
            }
        }


        // IF PRODUCT LAB CHARGES BY IS NULL @PRIYANKA-19MAR2021
        if (prodLabChargesBy == '' || prodLabChargesBy == null || prodLabChargesBy == 'undefined') {
            // IF PRODUCT LAB CHARGES BY IS NULL @PRIYANKA-19MAR2021
            if (typeof (document.getElementById('sttr_add_on_weight' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_add_on_weight' + prodCount) != null)) {
                prodLabChargesBy = document.getElementById('sttr_add_on_weight' + prodCount).value;
            }
        }


        //alert('prodLabChargesType == ' + prodLabChargesType);

        // PRODUCT LAB CHARGES
        if ((typeof (prodLabCharges) != 'undefined' && prodLabCharges != null)
                && ((typeof (document.getElementById('sttr_total_lab_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_lab_charges' + prodCount) != null)) ||
                        (typeof (document.getElementById('sttr_total_lab_amt' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_total_lab_amt' + prodCount) != null)))) {

            if (prodLabCharges > 0) {

                //alert('prodLabChargesType == ' + prodLabChargesType);
                //alert('prodWtType == ' + prodWtType);

                // PRODUCT LAB CHARGES TYPE
                if (prodLabChargesType == 'KG') {
                    // PRODUCT WEIGHT TYPE
                    if (prodWtType == 'KG')
                        prodTotalLabCharges = prodLabCharges * prodLabChargesBy; // (PRODUCT LAB CHARGES * PRODUCT LAB CHARGES BY)
                    else if (prodWtType == 'GM')
                        prodTotalLabCharges = (prodLabCharges / 1000) * prodLabChargesBy;
                    else
                        prodTotalLabCharges = (prodLabCharges / (1000 * 1000)) * prodLabChargesBy;

                    // PRODUCT LAB CHARGES TYPE
                } else if (prodLabChargesType == 'GM') {
                    // PRODUCT WEIGHT TYPE
                    if (prodWtType == 'KG')
                        prodTotalLabCharges = prodLabCharges * 1000 * prodLabChargesBy; // (PRODUCT LAB CHARGES * PRODUCT LAB CHARGES BY)
                    else if (prodWtType == 'GM')
                        prodTotalLabCharges = prodLabCharges * prodLabChargesBy;
                    else
                        prodTotalLabCharges = (prodLabCharges / 1000) * prodLabChargesBy;

                    // PRODUCT LAB CHARGES TYPE
                } else if (prodLabChargesType == 'MG') {
                    // 
                    // PRODUCT WEIGHT TYPE
                    if (prodWtType == 'KG')
                        prodTotalLabCharges = prodLabCharges * 1000 * 1000 * prodLabChargesBy; // (PRODUCT LAB CHARGES * PRODUCT LAB CHARGES BY)
                    else if (prodWtType == 'GM')
                        prodTotalLabCharges = prodLabCharges * 1000 * prodLabChargesBy;
                    else
                        prodTotalLabCharges = prodLabCharges * prodLabChargesBy;
                    //
                    // PRODUCT LAB CHARGES TYPE
                } else if (prodLabChargesType == 'PP') {
                    // 
                    // PRODUCT WEIGHT TYPE
                    prodTotalLabCharges = prodLabCharges * prodQTY;
                    //
                } else if (prodLabChargesType == 'FX' || prodLabChargesType == 'fx' || 
                           prodLabChargesType == 'Fx' || prodLabChargesType == 'Fixed' || prodLabChargesType == 'fixed') {
                    // 
                    // PRODUCT WEIGHT TYPE
                    prodTotalLabCharges = (prodLabCharges);
                    //
                }
                //
                //alert('prodTotalLabCharges == ' + prodTotalLabCharges);
                //
                // PRODUCT TOTAL LAB AMT
                if (typeof (document.getElementById('sttr_total_lab_amt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_lab_amt' + prodCount) != null)) {
                    // PRODUCT TOTAL LAB AMT // @PRIYANKA-28JAN19
                    document.getElementById('sttr_total_lab_amt' + prodCount).value = parseFloat(prodTotalLabCharges).toFixed(2);
                }

                // PRODUCT TOTAL LAB CHARGES
                if (typeof (document.getElementById('sttr_total_lab_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_lab_charges' + prodCount) != null)) {
                    // PRODUCT TOTAL LAB CHARGES // @PRIYANKA-28JAN19
                    document.getElementById('sttr_total_lab_charges' + prodCount).value = parseFloat(prodTotalLabCharges).toFixed(2);
                }

            } else {
                // PRODUCT TOTAL LAB AMT
                if (typeof (document.getElementById('sttr_total_lab_amt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_lab_amt' + prodCount) != null)) {
                    // PRODUCT TOTAL LAB AMT
                    if (document.getElementById('sttr_total_lab_amt' + prodCount).value == '') {
                        document.getElementById('sttr_total_lab_amt' + prodCount).value = 0;
                    }
                }

                // PRODUCT TOTAL LAB CHARGES
                if (typeof (document.getElementById('sttr_total_lab_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_lab_charges' + prodCount) != null)) {
                    // PRODUCT TOTAL LAB CHARGES
                    if (document.getElementById('sttr_total_lab_charges' + prodCount).value == '') {
                        document.getElementById('sttr_total_lab_charges' + prodCount).value = 0;
                    }
                }

                // PRODUCT TOTAL LAB CHARGES
                if (typeof (document.getElementById('sttr_total_lab_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_lab_charges' + prodCount) != null)) {
                    // PRODUCT TOTAL LAB CHARGES
                    prodTotalLabCharges = parseFloat(document.getElementById('sttr_total_lab_charges' + prodCount).value);
                }
            }
        }

        // *************************************************************************************************************************************
        // END CODE FOR LAB CHARGES, LAB CHARGES TYPE & LAB CHARGES CALCULATIONS
        // *************************************************************************************************************************************

        // *************************************************************************************************************************************
        // START CODE FOR MKG CHARGES, MKG CHARGES TYPE & TOTAL MKG CHARGES CALCULATIONS @PRIYANKA-28NOV18
        // *************************************************************************************************************************************

        // PRODUCT MKG CHARGES @PRIYANKA-28NOV18
        if (typeof (document.getElementById('sttr_making_charges' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_making_charges' + prodCount) != null)) {
            // PRODUCT MKG CHARGES
            var prodMkgCharges = document.getElementById('sttr_making_charges' + prodCount).value;
        }

        // PRODUCT MKG CHARGES TYPE @PRIYANKA-28NOV18
        if (typeof (document.getElementById('sttr_making_charges_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_making_charges_type' + prodCount) != null)) {
            // PRODUCT MKG CHARGES TYPE
            var prodMkgChargesType = document.getElementById('sttr_making_charges_type' + prodCount).value;
        }

        // PRODUCT TOTAL MKG CHARGES @PRIYANKA-28NOV18
        var prodTotalMkgCharges = 0;

        if (typeof (document.getElementById('sttr_mkg_charges_by' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_mkg_charges_by' + prodCount) != null) &&
                typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_nt_weight' + prodCount) != null) &&
                typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_gs_weight' + prodCount) != null) &&
                typeof (document.getElementById('sttr_final_fine_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_final_fine_weight' + prodCount) != null)) {

            // PRODUCT MKG CHARGES BY @PRIYANKA-28NOV18
            if (document.getElementById('sttr_mkg_charges_by' + prodCount).value == 'mkgByNetWt') {
                var prodMkgChargesBy = parseFloat(document.getElementById('sttr_nt_weight' + prodCount).value);
            } else if (document.getElementById('sttr_mkg_charges_by' + prodCount).value == 'mkgByGrossWt') {
                var prodMkgChargesBy = parseFloat(document.getElementById('sttr_gs_weight' + prodCount).value);
            } else if (document.getElementById('sttr_mkg_charges_by' + prodCount).value == 'mkgByFFineWt') {
                var prodMkgChargesBy = parseFloat(document.getElementById('sttr_final_fine_weight' + prodCount).value);
            } else {
                var prodMkgChargesBy = parseFloat(document.getElementById('sttr_nt_weight' + prodCount).value);
            }
        }

        // IF PRODUCT MKG CHARGES BY IS NULL @PRIYANKA-29JAN19
        if (prodMkgChargesBy == '' || prodMkgChargesBy == null || prodMkgChargesBy == 'undefined') {
            // IF PRODUCT MKG CHARGES BY IS NULL @PRIYANKA-29JAN19
            if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_gs_weight' + prodCount) != null)) {
                prodMkgChargesBy = document.getElementById('sttr_gs_weight' + prodCount).value;
            }
        }

        if (typeof (document.getElementById('panelName' + prodCount)) != 'undefined' &&
                (document.getElementById('panelName' + prodCount) != null)) {

            if (document.getElementById('panelName' + prodCount).value == 'CRYSTAL_SELL') {

                if (typeof (document.getElementById('sttr_mkg_charges_by' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_mkg_charges_by' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_nt_weight' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_gs_weight' + prodCount) != null)) {

                    // PRODUCT MKG CHARGES BY @PRIYANKA-28NOV18
                    if (document.getElementById('sttr_mkg_charges_by' + prodCount).value == 'mkgByNetWt') {
                        var prodMkgChargesBy = parseFloat(document.getElementById('sttr_nt_weight' + prodCount).value);
                    } else if (document.getElementById('sttr_mkg_charges_by' + prodCount).value == 'mkgByGrossWt') {
                        var prodMkgChargesBy = parseFloat(document.getElementById('sttr_gs_weight' + prodCount).value);
                    } else {
                        var prodMkgChargesBy = parseFloat(document.getElementById('sttr_nt_weight' + prodCount).value);
                    }
                }
            }
        }
        // Start 24k according metal rate get for mkg charge 
        var metalRate = parseFloat(document.getElementById('metalRateValue').value);   // 24k rate
        var sellMkgByPerInd = document.getElementById('sellMkgByPerInd').value;
        var orderOperation = document.getElementById('orderOperation').value;
        
        var metalRateSelect = prodRate;
        
        if((sellMkgByPerInd == 'true' && prodType == 'Gold') || (sellMkgByPerInd == 'false' && orderOperation == 'update')){ 
            prodRate = metalRate;
        } 
        // End 24k according metal rate get for mkg charge 
        // PRODUCT MKG CHARGES @PRIYANKA-28NOV18
        if ((typeof (prodMkgCharges) != 'undefined' && prodMkgCharges != null)
                && ((typeof (document.getElementById('sttr_total_making_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_making_charges' + prodCount) != null)) ||
                        (typeof (document.getElementById('sttr_total_making_amt' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_total_making_amt' + prodCount) != null)))) {

            if (prodMkgCharges != '') {
                // PRODUCT MKG CHARGES TYPE
                if (prodMkgChargesType == 'KG') {
                    // PRODUCT WEIGHT TYPE
                    if (prodWtType == 'KG')
                        prodTotalMkgCharges = prodMkgCharges * prodMkgChargesBy;
                    else if (prodWtType == 'GM')
                        prodTotalMkgCharges = (prodMkgCharges / 1000) * prodMkgChargesBy;
                    else
                        prodTotalMkgCharges = (prodMkgCharges / (1000 * 1000)) * prodMkgChargesBy;

                    // PRODUCT MKG CHARGES TYPE
                } else if (prodMkgChargesType == 'GM') {
                    // PRODUCT WEIGHT TYPE
                    if (prodWtType == 'KG')
                        prodTotalMkgCharges = prodMkgCharges * 1000 * prodMkgChargesBy;
                    else if (prodWtType == 'GM')
                        prodTotalMkgCharges = prodMkgCharges * prodMkgChargesBy;
                    else
                        prodTotalMkgCharges = (prodMkgCharges / 1000) * prodMkgChargesBy;
                    //
                    // PRODUCT MKG CHARGES TYPE
                } else if (prodMkgChargesType == 'MG') {
                    // 
                    // PRODUCT WEIGHT TYPE
                    if (prodWtType == 'KG')
                        prodTotalMkgCharges = prodMkgCharges * 1000 * 1000 * prodMkgChargesBy;
                    else if (prodWtType == 'GM')
                        prodTotalMkgCharges = prodMkgCharges * 1000 * prodMkgChargesBy;
                    else
                        prodTotalMkgCharges = prodMkgCharges * prodMkgChargesBy;
                    // 
                    // PRODUCT MKG CHARGES TYPE
                } else if (prodMkgChargesType == 'PP') {
                    //
                    prodTotalMkgCharges = prodMkgCharges * prodQTY;
                    //
                } else if (prodMkgChargesType == 'FX' || prodMkgChargesType == 'fx' || 
                           prodMkgChargesType == 'Fx' || prodMkgChargesType == 'Fixed' || prodMkgChargesType == 'fixed') {
                    //
                    prodTotalMkgCharges = prodMkgCharges;
                    //
                } else if (prodMkgChargesType == 'CT') {
                    //
                    prodTotalMkgCharges = (prodMkgCharges * prodMkgChargesBy);
                    //
                } else if (prodMkgChargesType == 'per' || prodMkgChargesType == '%') {
                    //
                    var MkgCharges = (prodMkgCharges * prodMkgChargesBy) / 100;
                    //
                    if ((prodType == 'Gold' || prodType == 'GOLD') && sttrIndicator != 'IMITATION') {
                        if (prodWtType == 'KG') {
                            prodTotalMkgCharges = ((MkgCharges * prodRate) * document.getElementById('gmWtInKg').value).toFixed(2);
                        } else if (prodWtType == 'GM') {
                            prodTotalMkgCharges = ((MkgCharges * prodRate) / document.getElementById('gmWtInGm').value).toFixed(2);
                        } else if (prodWtType == 'MG') {
                            prodTotalMkgCharges = ((MkgCharges * prodRate) / document.getElementById('gmWtInMg').value).toFixed(2);
                        }
                    } else if ((prodType == 'Silver' || prodType == 'SILVER') && sttrIndicator != 'IMITATION') {
                        if (prodWtType == 'KG') {
                            prodTotalMkgCharges = (MkgCharges * prodRate * document.getElementById('srGmWtInKg').value).toFixed(2);
                        } else if (prodWtType == 'GM') {
                            prodTotalMkgCharges = ((MkgCharges * prodRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
                        } else if (prodWtType == 'MG') {
                            prodTotalMkgCharges = ((MkgCharges * prodRate) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                        }
                    } else {
                        if (prodWtType == 'KG') {
                            prodTotalMkgCharges = ((MkgCharges * prodRate) * document.getElementById('othGmWtInKg').value).toFixed(2);
                        } else if (prodWtType == 'GM') {
                            prodTotalMkgCharges = ((MkgCharges * prodRate) / document.getElementById('othGmWtInGm').value).toFixed(2);
                        } else if (prodWtType == 'MG') {
                            prodTotalMkgCharges = ((MkgCharges * prodRate) / document.getElementById('othGmWtInMg').value).toFixed(2);
                        }
                    }
                    //
                }

                // PRODUCT TOTAL MKG AMT @PRIYANKA-28NOV18
                if (typeof (document.getElementById('sttr_total_making_amt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_making_amt' + prodCount) != null)) {
                    // PRODUCT TOTAL MKG AMT
                    document.getElementById('sttr_total_making_amt' + prodCount).value = parseFloat(prodTotalMkgCharges).toFixed(2);
                }

                // PRODUCT TOTAL MKG CHARGES @PRIYANKA-28NOV18
                if (typeof (document.getElementById('sttr_total_making_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_making_charges' + prodCount) != null)) {
                    // PRODUCT TOTAL MKG CHARGES
                    document.getElementById('sttr_total_making_charges' + prodCount).value = parseFloat(prodTotalMkgCharges).toFixed(2);
                }

            } else {

                // PRODUCT TOTAL MKG AMT
                if (typeof (document.getElementById('sttr_total_making_amt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_making_amt' + prodCount) != null)) {
                    // PRODUCT TOTAL MKG AMT
                    if (document.getElementById('sttr_total_making_amt' + prodCount).value == '') {
                        document.getElementById('sttr_total_making_amt' + prodCount).value = 0;
                    }
                }

                // PRODUCT TOTAL MKG CHARGES
                if (typeof (document.getElementById('sttr_total_making_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_making_charges' + prodCount) != null)) {
                    // PRODUCT TOTAL MKG CHARGES
                    if (document.getElementById('sttr_total_making_charges' + prodCount).value == '') {
                        document.getElementById('sttr_total_making_charges' + prodCount).value = 0;
                    }
                }

                // PRODUCT TOTAL MKG CHARGES
                if (typeof (document.getElementById('sttr_total_making_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_making_charges' + prodCount) != null)) {
                    // PRODUCT TOTAL MKG CHARGES
                    prodTotalMkgCharges = parseFloat(document.getElementById('sttr_total_making_charges' + prodCount).value);
                }
            }
        }
        prodRate = metalRateSelect;

        // *************************************************************************************************************************************
        // END CODE FOR MKG CHARGES, MKG CHARGES TYPE & TOTAL MKG CHARGES CALCULATIONS @PRIYANKA-28NOV18
        // *************************************************************************************************************************************
        // 
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // START CODE TO CALCULATE TOTAL OTHER CHARGES ACCORDING OTHER CHARGES AND OTH CHARGES TYPE @AUTHOR:MADHUREE-19MAY2020 //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        //
        if (typeof (document.getElementById('sttr_other_charges' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_other_charges' + prodCount) != null)) {
            // PRODUCT OTHER CHARGES @AUTHOR:MADHUREE-19MAY2020
            var prodOtherCharges = document.getElementById('sttr_other_charges' + prodCount).value;
        }
        //
        if (typeof (document.getElementById('sttr_other_charges_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_other_charges_type' + prodCount) != null)) {
            // PRODUCT OTHER CHARGES TYPE @AUTHOR:MADHUREE-19MAY2020
            var prodOtherChargesType = document.getElementById('sttr_other_charges_type' + prodCount).value;
        }
        //
        if (typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_nt_weight' + prodCount) != null)) {
            var prodOtherChargesBy = document.getElementById('sttr_nt_weight' + prodCount).value;
        }
        //
        var prodTotalOtherCharges = 0;
        //
        if (typeof (prodOtherCharges) != 'undefined' && prodOtherCharges != null) {
            if (prodOtherCharges != '') {

                // PRODUCT MKG CHARGES TYPE
                if (prodOtherChargesType == 'KG') {
                    // PRODUCT WEIGHT TYPE
                    if (prodWtType == 'KG')
                        prodTotalOtherCharges = prodOtherCharges * prodOtherChargesBy;
                    else if (prodWtType == 'GM')
                        prodTotalOtherCharges = (prodOtherCharges / 1000) * prodOtherChargesBy;
                    else
                        prodTotalOtherCharges = (prodOtherCharges / (1000 * 1000)) * prodOtherChargesBy;

                    // PRODUCT MKG CHARGES TYPE
                } else if (prodOtherChargesType == 'GM') {
                    // PRODUCT WEIGHT TYPE
                    if (prodWtType == 'KG')
                        prodTotalOtherCharges = prodOtherCharges * 1000 * prodOtherChargesBy;
                    else if (prodWtType == 'GM')
                        prodTotalOtherCharges = prodOtherCharges * prodOtherChargesBy;
                    else
                        prodTotalOtherCharges = (prodOtherCharges / 1000) * prodOtherChargesBy;

                    // PRODUCT MKG CHARGES TYPE
                } else if (prodOtherChargesType == 'MG') {
                    // PRODUCT WEIGHT TYPE
                    if (prodWtType == 'KG')
                        prodTotalOtherCharges = prodOtherCharges * 1000 * 1000 * prodOtherChargesBy;
                    else if (prodWtType == 'GM')
                        prodTotalOtherCharges = prodOtherCharges * 1000 * prodOtherChargesBy;
                    else
                        prodTotalOtherCharges = prodOtherCharges * prodOtherChargesBy;

                    // PRODUCT MKG CHARGES TYPE
                } else if (prodOtherChargesType == 'PP') {
                    prodTotalOtherCharges = prodOtherCharges * prodQTY;

                } else if (prodOtherChargesType == 'CT') {
                    prodTotalOtherCharges = prodOtherCharges * prodOtherChargesBy;
                } else if (prodOtherChargesType == 'per' || prodOtherChargesType == '%') {
                    //
                    var OtherCharges = (prodOtherCharges * prodOtherChargesBy) / 100;
                    //
                    if ((prodType == 'Gold' || prodType == 'GOLD') && sttrIndicator != 'IMITATION') {
                        if (prodWtType == 'KG') {
                            prodTotalOtherCharges = ((OtherCharges * prodRate) * document.getElementById('gmWtInKg').value).toFixed(2);
                        } else if (prodWtType == 'GM') {
                            prodTotalOtherCharges = ((OtherCharges * prodRate) / document.getElementById('gmWtInGm').value).toFixed(2);
                        } else if (prodWtType == 'MG') {
                            prodTotalOtherCharges = ((OtherCharges * prodRate) / document.getElementById('gmWtInMg').value).toFixed(2);
                        }
                    } else if ((prodType == 'Silver' || prodType == 'SILVER') && sttrIndicator != 'IMITATION') {
                        if (prodWtType == 'KG') {
                            prodTotalOtherCharges = (OtherCharges * prodRate * document.getElementById('srGmWtInKg').value).toFixed(2);
                        } else if (prodWtType == 'GM') {
                            prodTotalOtherCharges = ((OtherCharges * prodRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
                        } else if (prodWtType == 'MG') {
                            prodTotalOtherCharges = ((OtherCharges * prodRate) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                        }
                    } else {
                        if (prodWtType == 'KG') {
                            prodTotalOtherCharges = ((OtherCharges * prodRate) * document.getElementById('othGmWtInKg').value).toFixed(2);
                        } else if (prodWtType == 'GM') {
                            prodTotalOtherCharges = ((OtherCharges * prodRate) / document.getElementById('othGmWtInGm').value).toFixed(2);
                        } else if (prodWtType == 'MG') {
                            prodTotalOtherCharges = ((OtherCharges * prodRate) / document.getElementById('othGmWtInMg').value).toFixed(2);
                        }
                    }
                    //
                }

                // PRODUCT TOTAL OTHER CHARGES
                if (typeof (document.getElementById('sttr_total_other_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_other_charges' + prodCount) != null)) {
                    // PRODUCT TOTAL OTHER CHARGES
                    document.getElementById('sttr_total_other_charges' + prodCount).value = parseFloat(prodTotalOtherCharges).toFixed(2);
                }
            } else {
                // PRODUCT TOTAL OTHER CHARGES
                if (typeof (document.getElementById('sttr_total_other_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_other_charges' + prodCount) != null)) {
                    // PRODUCT TOTAL OTHER CHARGES
                    if (document.getElementById('sttr_total_other_charges' + prodCount).value == '') {
                        document.getElementById('sttr_total_other_charges' + prodCount).value = 0;
                    }
                }
            }
        }
        // 
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // END CODE TO CALCULATE TOTAL OTHER CHARGES ACCORDING OTHER CHARGES AND OTH CHARGES TYPE @AUTHOR:MADHUREE-19MAY2020 //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // 
        // 
        //alert('prodFinalFineWeight @== ' + prodFinalFineWeight);
        //alert('sttr_add_on_weight @== ' + document.getElementById('sttr_add_on_weight' + prodCount).value);
        //alert('prodRate @== ' + prodRate);        
        //alert('prodTotalLabCharges @== ' + prodTotalLabCharges);
        //alert('prodTotalMkgCharges @== ' + prodTotalMkgCharges);
        //alert('prodTotalOtherCharges @== ' + prodTotalOtherCharges);
        //alert('prodType @== ' + prodType);
        //alert('sttrIndicator @== ' + sttrIndicator);
        //alert('prodGsWeight @== ' + prodGsWeight);
        // 
        // 
        // IF PRODUCT NT WT, FN WT AND FFN WT ARE NULL @PRIYANKA-19MAR2021
        if (typeof (document.getElementById('sttr_add_on_weight' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_add_on_weight' + prodCount) != null)) {
            prodFinalFineWeight = parseFloat(document.getElementById('sttr_add_on_weight' + prodCount).value).toFixed(3);
        }
        //
        //
        //alert('prodGsWeight @@== ' + prodGsWeight);
        //alert('prodFinalFineWeight @@== ' + prodFinalFineWeight);
        //alert('panelName @@== ' + document.getElementById('panelName' + prodCount).value);
        //alert('sttr_transaction_type @@== ' + document.getElementById('sttr_transaction_type' + prodCount).value); 
        // 
        //
        if (typeof (document.getElementById('panelName' + prodCount)) != 'undefined' &&
                   (document.getElementById('panelName' + prodCount) != null)) {
            //  
            //
            if (typeof (document.getElementById('sttr_transaction_type' + prodCount)) != 'undefined' &&
                       (document.getElementById('sttr_transaction_type' + prodCount) != null)) {
                //
                //
                var sttr_transaction_type = document.getElementById('sttr_transaction_type' + prodCount).value; 
                //
                //
                if (sttr_transaction_type == 'newOrder' && document.getElementById('panelName' + prodCount).value == 'addNewOrderB2') {
                    //
                    //
                    if (typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                               (document.getElementById('sttr_purity' + prodCount) != null) && 
                        typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                               (document.getElementById('sttr_gs_weight' + prodCount) != null)) {
                        //
                        prodFinalFineWeight = ((document.getElementById('sttr_purity' + prodCount).value * document.getElementById('sttr_gs_weight' + prodCount).value) / 100).toFixed(3);
                        //
                    }
                }            
            }
        }
        //
        //
        //alert('prodRate @== ' + prodRate);
        //alert('prodType @== ' + prodType);
        //alert('prodFinalFineWeight @@== ' + prodFinalFineWeight);
        // 
        // 
        // *************************************************************************************************************************************
        // START CODE FOR PRODUCT VAL, AMT, TAXABLE AMT & FINAL VALUATION CALCULATIONS
        // *************************************************************************************************************************************
        //
        // CHANGED CODE FOR REPAIR PANEL @AUTHOR:PRIYANKA-18MAR2023
        if (typeof (prodRate) != 'undefined' && prodRate != null) {

            if (typeof (prodType) != 'undefined' && prodType != null) {
                //
                if (typeof (document.getElementById('sttr_indicator' + prodCount)) != 'undefined' &&
                           (document.getElementById('sttr_indicator' + prodCount) != null)) {
                    //
                    var sttrIndicator = document.getElementById('sttr_indicator' + prodCount).value;
                    //
                }
                //
                //alert('prodRate @== ' + prodRate);
                //alert('prodType @== ' + prodType);
                //alert('prodFinalFineWeight @@== ' + prodFinalFineWeight);
                //alert('sttrIndicator @== ' + sttrIndicator);
                //
                if (prodGsWeight != '') {
                    //
                    //alert('prodType == ' + prodType);
                    //alert('sttrIndicator == ' + sttrIndicator);
                    //
                    // PRODUCT TYPE
                    if ((prodType == 'Gold' || prodType == 'GOLD') && sttrIndicator != 'IMITATION') {
                        //
                        // PRODUCT WEIGHT TYPE
                        if (prodWtType == 'KG') {
                            //
                            if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_metal_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('gmWtInKg')) != 'undefined' &&
                                    (document.getElementById('gmWtInKg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT AMT @PRIYANKA-29JAN19
                                document.getElementById('sttr_metal_amt' + prodCount).value = ((prodFinalFineWeight * prodRate) * document.getElementById('gmWtInKg').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('gmWtInKg')) != 'undefined' &&
                                    (document.getElementById('gmWtInKg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19
                                document.getElementById('sttr_valuation' + prodCount).value = ((prodFinalFineWeight * prodRate) * document.getElementById('gmWtInKg').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('gmWtInKg')) != 'undefined' &&
                                    (document.getElementById('gmWtInKg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19     
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(((prodFinalFineWeight * prodRate) * document.getElementById('gmWtInKg').value) + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('gmWtInKg')) != 'undefined' &&
                                    (document.getElementById('gmWtInKg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                               
                               document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(((prodFinalFineWeight * prodRate) * document.getElementById('gmWtInKg').value) + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);

                            }


                            // PRODUCT WEIGHT TYPE
                        } else if (prodWtType == 'GM') {

                            //alert('prodRate == ' +  prodRate);
//                            alert('prodFinalFineWeight == ' +  prodFinalFineWeight);
                            //alert('gmWtInGm == ' +  document.getElementById('gmWtInGm').value);

                            if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_metal_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('gmWtInGm')) != 'undefined' &&
                                    (document.getElementById('gmWtInGm') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT AMT @PRIYANKA-29JAN19                               
                                document.getElementById('sttr_metal_amt' + prodCount).value = ((prodFinalFineWeight * prodRate) / document.getElementById('gmWtInGm').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('gmWtInGm')) != 'undefined' &&
                                    (document.getElementById('gmWtInGm') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19
                                document.getElementById('sttr_valuation' + prodCount).value = ((prodFinalFineWeight * prodRate) / document.getElementById('gmWtInGm').value).toFixed(2);
//                                alert(document.getElementById('sttr_valuation' + prodCount).value);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('gmWtInGm')) != 'undefined' &&
                                    (document.getElementById('gmWtInGm') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19 
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(parseFloat((prodFinalFineWeight * prodRate) / document.getElementById('gmWtInGm').value) + parseFloat(prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('gmWtInGm')) != 'undefined' &&
                                    (document.getElementById('gmWtInGm') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                               
                                document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(((prodFinalFineWeight * prodRate) / document.getElementById('gmWtInGm').value) + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);
                            }

                            // PRODUCT WEIGHT TYPE
                        } else if (prodWtType == 'MG') {

                            if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_metal_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('gmWtInMg')) != 'undefined' &&
                                    (document.getElementById('gmWtInMg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT AMT @PRIYANKA-29JAN19                            
                                document.getElementById('sttr_metal_amt' + prodCount).value = ((prodFinalFineWeight * prodRate) / document.getElementById('gmWtInMg').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('gmWtInMg')) != 'undefined' &&
                                    (document.getElementById('gmWtInMg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19
                                document.getElementById('sttr_valuation' + prodCount).value = ((prodFinalFineWeight * prodRate) / document.getElementById('gmWtInMg').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('gmWtInMg')) != 'undefined' &&
                                    (document.getElementById('gmWtInMg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19                              
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(((prodFinalFineWeight * prodRate) / document.getElementById('gmWtInMg').value) + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('gmWtInMg')) != 'undefined' &&
                                    (document.getElementById('gmWtInMg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                               
                             document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(((prodFinalFineWeight * prodRate) / document.getElementById('gmWtInMg').value) + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);
                            }
                        }

                        // PRODUCT TYPE
                    } else if ((prodType == 'Silver' || prodType == 'SILVER') && sttrIndicator != 'IMITATION') {

                        // PRODUCT WEIGHT TYPE
                        if (prodWtType == 'KG') {

                            if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_metal_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('srGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('srGmWtInKg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT AMT @PRIYANKA-29JAN19                                
                                document.getElementById('sttr_metal_amt' + prodCount).value = parseFloat((prodFinalFineWeight * prodRate) * document.getElementById('srGmWtInKg').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('srGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('srGmWtInKg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19 
                                document.getElementById('sttr_valuation' + prodCount).value = parseFloat((prodFinalFineWeight * prodRate) * document.getElementById('srGmWtInKg').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('srGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('srGmWtInKg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19                               
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat((prodFinalFineWeight * prodRate * document.getElementById('srGmWtInKg').value) + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('srGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('srGmWtInKg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                                 
                                document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat((prodFinalFineWeight * prodRate * document.getElementById('srGmWtInKg').value) + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);
                            }

                            // PRODUCT WEIGHT TYPE
                        } else if (prodWtType == 'GM') {

                            if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_metal_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('srGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('srGmWtInGm') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT AMT @PRIYANKA-29JAN19                                 
                                document.getElementById('sttr_metal_amt' + prodCount).value = parseFloat((prodFinalFineWeight * prodRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('srGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('srGmWtInGm') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19  
                                document.getElementById('sttr_valuation' + prodCount).value = parseFloat((prodFinalFineWeight * prodRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('srGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('srGmWtInGm') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19                                
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat((prodFinalFineWeight * prodRate) / document.getElementById('srGmWtInGm').value + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('srGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('srGmWtInGm') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                                
                                document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat((prodFinalFineWeight * prodRate) / document.getElementById('srGmWtInGm').value + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);
                            }

                            // PRODUCT WEIGHT TYPE
                        } else if (prodWtType == 'MG') {

                            if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_metal_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('srGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('srGmWtInMg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT AMT @PRIYANKA-29JAN19                                 
                                document.getElementById('sttr_metal_amt' + prodCount).value = parseFloat((prodFinalFineWeight * prodRate) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('srGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('srGmWtInMg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19 
                                document.getElementById('sttr_valuation' + prodCount).value = parseFloat((prodFinalFineWeight * prodRate) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('srGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('srGmWtInMg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19                                  
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat((prodFinalFineWeight * prodRate) / (document.getElementById('srGmWtInMg').value) + parseFloat(prodTotalLabCharges) + parseFloat(prodTotalMkgCharges) + parseFloat(prodTotalOtherCharges)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('srGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('srGmWtInMg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                                
                               document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat((prodFinalFineWeight * prodRate) / (document.getElementById('srGmWtInMg').value) + parseFloat(prodTotalLabCharges) + parseFloat(prodTotalMkgCharges) + parseFloat(prodTotalOtherCharges)).toFixed(2);
                            }
                        }

                        // PRODUCT TYPE (Imitation) @PRIYANKA-28JAN19
                    } else if (prodType == 'Imitation' || prodType == 'IMITATION' || sttrIndicator == 'IMITATION') {

                        if (typeof (prodRate) != 'undefined' &&
                                (prodRate != null) &&
                                typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                typeof (prodQTY) != 'undefined' &&
                                (prodQTY != null)) {

                            // PRODUCT PRICE @PRIYANKA-29JAN19
                            document.getElementById('sttr_valuation' + prodCount).value = (parseFloat(prodRate) * parseFloat(prodQTY)).toFixed(2);
                        }

                        if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_valuation' + prodCount) != null)) {

                            // ADDED CODE FOR PRODUCT FINAL TAXABLE AMOUNT @PRIYANKA-13JAN2021
                            document.getElementById('sttr_final_taxable_amt' + prodCount).value = (parseFloat(document.getElementById('sttr_valuation' + prodCount).value)).toFixed(2);
                        }

                        if (typeof (prodRate) != 'undefined' &&
                                (prodRate != null) &&
                                typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                typeof (prodQTY) != 'undefined' &&
                                (prodQTY != null) &&
                                typeof (prodTotalLabCharges) != 'undefined' &&
                                (prodTotalLabCharges != null) &&
                                typeof (prodTotalMkgCharges) != 'undefined' &&
                                (prodTotalMkgCharges != null)) {
                            
                            // PRODUCT FINAL PRICE @PRIYANKA-29JAN19          
                            document.getElementById('sttr_valuation' + prodCount).value = document.getElementById('sttr_final_valuation' + prodCount).value = ((parseFloat(prodRate) * parseFloat(prodQTY)) + parseFloat(prodTotalLabCharges) + parseFloat(prodTotalMkgCharges) + parseFloat(prodTotalOtherCharges)).toFixed(2);

                        }

                        // PRODUCT TYPE (Crystal) @PRIYANKA-29JAN19
                    } else if (prodType == 'Crystal' || prodType == 'CRYSTAL' || prodType == 'STONE' || prodType == 'Stone') {
                        //
                        //alert('prodType == ' + prodType);
                        //alert('prodRateType == ' + prodRateType);
                        //alert('prodRate == ' + prodRate);
                        //
                        //
                        // SET PRODUCT GS WT @PRIYANKA-19MAR2021
                        if (typeof (document.getElementById('sttr_add_on_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_add_on_weight' + prodCount) != null)) {
                            document.getElementById('sttr_gs_weight' + prodCount).value = parseFloat(document.getElementById('sttr_add_on_weight' + prodCount).value).toFixed(3);
                            prodGsWeight = parseFloat(document.getElementById('sttr_add_on_weight' + prodCount).value).toFixed(3);
                        }
                        //
                        //
                        //
                        // SET PRODUCT GS WT TYPE, RATE TYPE @PRIYANKA-19MAR2021
                        if (typeof (document.getElementById('sttr_add_on_weight_type' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_add_on_weight_type' + prodCount) != null)) {
                            document.getElementById('sttr_gs_weight_type' + prodCount).value = (document.getElementById('sttr_add_on_weight_type' + prodCount).value);
                            prodGsWeightType = (document.getElementById('sttr_add_on_weight_type' + prodCount).value);
                            document.getElementById('sttr_product_sell_rate_type' + prodCount).value = (document.getElementById('sttr_add_on_weight_type' + prodCount).value);
                            prodRateType = (document.getElementById('sttr_add_on_weight_type' + prodCount).value);
                        }
                        //
                        //
                        //alert('prodQTY == ' + prodQTY);
                        //alert('prodGsWeight == ' + prodGsWeight);
                        //alert('prodGsWeightType == ' + prodGsWeightType);
                        //alert('prodRate == ' + prodRate);
                        //alert('prodRateType == ' + prodRateType);
                        //
                        //
                        if (typeof (prodRate) != 'undefined' &&
                                (prodRate != null) &&
                                typeof (prodRateType) != 'undefined' &&
                                (prodRateType != null) &&
                                typeof (prodQTY) != 'undefined' &&
                                (prodQTY != null) &&
                                typeof (prodGsWeight) != 'undefined' &&
                                (prodGsWeight != null) &&
                                typeof (prodGsWeightType) != 'undefined' &&
                                (prodGsWeightType != null)) {

                            var totalValuation = 0; // TOTAL VALUATION @PRIYANKA-29JAN19

                            if (prodRateType == 'PP') {
                                totalValuation = prodRate * prodQTY;
                            } else if (prodGsWeightType == 'CT' && prodRateType == 'CT') {
                                totalValuation = prodRate * prodGsWeight;
                            } else if (prodGsWeightType == 'CT' && prodRateType == 'GM') {
                                var currentRate = (prodRate * 0.2);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'CT' && prodRateType == 'MG') {
                                var currentRate = (prodRate * 0.005);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'CT' && prodRateType == 'KG') {
                                var currentRate = (prodRate * 5000);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'GM' && prodRateType == 'CT') {
                                var currentRate = (prodRate * 5);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'GM' && prodRateType == 'GM') {
                                totalValuation = prodRate * prodGsWeight;
                            } else if (prodGsWeightType == 'GM' && prodRateType == 'MG') {
                                var currentRate = (prodRate * 0.001);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'GM' && prodRateType == 'KG') {
                                var currentRate = (prodRate * 1000);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'MG' && prodRateType == 'CT') {
                                var currentRate = (prodRate * 0.005);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'MG' && prodRateType == 'GM') {
                                var currentRate = (prodRate * 1000);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'MG' && prodRateType == 'MG') {
                                totalValuation = prodRate * prodGsWeight;
                            } else if (prodGsWeightType == 'MG' && prodRateType == 'KG') {
                                var currentRate = (prodRate * 1000000);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'KG' && prodRateType == 'CT') {
                                var currentRate = (prodRate * 0.0002);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'KG' && prodRateType == 'GM') {
                                var currentRate = (prodRate * 0.001);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'KG' && prodRateType == 'MG') {
                                var currentRate = (prodRate * 1000000);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'KG' && prodRateType == 'KG') {
                                totalValuation = prodRate * prodGsWeight;
                            } else if (prodGsWeight == '' && prodRateType == 'PP') {
                                totalValuation = prodRate * prodQTY;
                            } else if (prodGsWeightType == 'GM' && prodRateType == 'PP') {
                                totalValuation = prodRate * prodQTY;
                            } else if (prodGsWeightType == 'MG' && prodRateType == 'PP') {
                                totalValuation = prodRate * prodQTY;
                            } else if (prodGsWeightType == 'KG' && prodRateType == 'PP') {
                                totalValuation = prodRate * prodQTY;
                            } else {
                                totalValuation = prodRate * prodGsWeight;
                            }
                        }
                        //
                        //alert('totalValuation 1== ' + totalValuation);
                        //
                        // IF GROSS WEIGHT IS NULL @PRIYANKA-29JAN19
                        if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined') {

                            if (document.getElementById('sttr_gs_weight' + prodCount).value == '' ||
                                document.getElementById('sttr_gs_weight' + prodCount).value == null) {
                                totalValuation = prodRate * prodQTY;
                            }
                        }

                        //alert('totalValuation 2== ' + totalValuation);
                        
                        if (typeof (totalValuation) != 'undefined' &&
                                   (totalValuation != null)) {
                               
                            if (totalValuation == 'NaN') {
                                totalValuation = 0;
                            }
                        }
                                               
                        // PRODUCT AMOUNT @PRIYANKA-29JAN19
                        if (typeof (totalValuation) != 'undefined' &&
                                (totalValuation != null) &&
                                typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_metal_amt' + prodCount) != null)) {

                            // PRODUCT AMOUNT @PRIYANKA-29JAN19
                            document.getElementById('sttr_metal_amt' + prodCount).value = (parseFloat(totalValuation)).toFixed(2);

                        }

                        if (typeof (totalValuation) != 'undefined' &&
                                (totalValuation != null) &&
                                typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_valuation' + prodCount) != null)) {

                            // PRODUCT VALUATION @PRIYANKA-29JAN19
                            document.getElementById('sttr_valuation' + prodCount).value = (parseFloat(totalValuation)).toFixed(2);
                        }

                        //alert('sttr_valuation == ' + document.getElementById('sttr_valuation' + prodCount).value);

                        if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_valuation' + prodCount) != null)) {

                            // ADDED CODE FOR PRODUCT FINAL TAXABLE AMOUNT @PRIYANKA-13JAN2021
                            document.getElementById('sttr_final_taxable_amt' + prodCount).value = (parseFloat(document.getElementById('sttr_valuation' + prodCount).value)).toFixed(2);
                        }

                        if (typeof (totalValuation) != 'undefined' &&
                                (totalValuation != null) &&
                                typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                typeof (prodTotalLabCharges) != 'undefined' &&
                                (prodTotalLabCharges != null) &&
                                typeof (prodTotalMkgCharges) != 'undefined' &&
                                (prodTotalMkgCharges != null)) {

                            // PRODUCT FINAL VALUATION @PRIYANKA-29JAN19                            
                            document.getElementById('sttr_final_valuation' + prodCount).value = (parseFloat(totalValuation) + parseFloat(prodTotalLabCharges) + parseFloat(prodTotalMkgCharges) + parseFloat(prodTotalOtherCharges)).toFixed(2);
                        }

                    } else {
                        //
                        if (prodFinalFineWeight == null)
                            prodFinalFineWeight = prodNtWeight;
                        // PRODUCT WEIGHT TYPE
                        if (prodWtType == 'KG') {

                            if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_metal_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInKg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT AMT @PRIYANKA-29JAN19
                                document.getElementById('sttr_metal_amt' + prodCount).value = ((prodFinalFineWeight * prodRate) * document.getElementById('othGmWtInKg').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInKg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19
                                document.getElementById('sttr_valuation' + prodCount).value = ((prodFinalFineWeight * prodRate) * document.getElementById('othGmWtInKg').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInKg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19                         
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(((prodFinalFineWeight * prodRate) * document.getElementById('othGmWtInKg').value) + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInKg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                               
                                document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(((prodFinalFineWeight * prodRate) * document.getElementById('othGmWtInKg').value) + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);

                            }


                            // PRODUCT WEIGHT TYPE
                        } else if (prodWtType == 'GM') {
                            //alert(document.getElementById('othGmWtInGm').value);
                            if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_metal_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('othGmWtInGm') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT AMT @PRIYANKA-29JAN19                               
                                document.getElementById('sttr_metal_amt' + prodCount).value = ((prodFinalFineWeight * prodRate) / document.getElementById('othGmWtInGm').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('othGmWtInGm') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19
                                document.getElementById('sttr_valuation' + prodCount).value = ((prodFinalFineWeight * prodRate) / document.getElementById('othGmWtInGm').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('othGmWtInGm') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19                              
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(((prodFinalFineWeight * prodRate) / document.getElementById('othGmWtInGm').value) + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('othGmWtInGm') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                               
                                document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(((prodFinalFineWeight * prodRate) / document.getElementById('othGmWtInGm').value) + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);
                            }

                            // PRODUCT WEIGHT TYPE
                        } else if (prodWtType == 'MG') {

                            if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_metal_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInMg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT AMT @PRIYANKA-29JAN19                            
                                document.getElementById('sttr_metal_amt' + prodCount).value = ((prodFinalFineWeight * prodRate) / document.getElementById('othGmWtInMg').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInMg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19
                                document.getElementById('sttr_valuation' + prodCount).value = ((prodFinalFineWeight * prodRate) / document.getElementById('othGmWtInMg').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInMg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19                              
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(((prodFinalFineWeight * prodRate) / document.getElementById('othGmWtInMg').value) + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInMg') != null) &&
                                    typeof (prodFinalFineWeight) != 'undefined' && prodFinalFineWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                               
                                document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(((prodFinalFineWeight * prodRate) / document.getElementById('othGmWtInMg').value) + prodTotalLabCharges + prodTotalMkgCharges + prodTotalOtherCharges).toFixed(2);
                            }

                        } else {

                            if (prodRateType == 'PP') {
                                totalValuation = prodRate * prodQTY;
                            } else if (prodGsWeightType == 'CT' && prodRateType == 'CT') {
                                totalValuation = prodRate * prodGsWeight;
                            } else if (prodGsWeightType == 'CT' && prodRateType == 'GM') {
                                var currentRate = (prodRate * 5);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'CT' && prodRateType == 'MG') {
                                var currentRate = (prodRate * 0.005);
                                totalValuation = currentRate * prodGsWeight;
                            } else if (prodGsWeightType == 'CT' && prodRateType == 'KG') {
                                var currentRate = (prodRate * 5000);
                                totalValuation = currentRate * prodGsWeight;
                            }
                            //
                            // IF GROSS WEIGHT IS NULL @PRIYANKA-29JAN19
                            if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined') {

                                if (document.getElementById('sttr_gs_weight' + prodCount).value == '' ||
                                        document.getElementById('sttr_gs_weight' + prodCount).value == null) {
                                    totalValuation = prodRate * prodQTY;
                                }
                            }

                            // PRODUCT AMOUNT @PRIYANKA-29JAN19
                            if (typeof (totalValuation) != 'undefined' &&
                                    (totalValuation != null) &&
                                    typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_metal_amt' + prodCount) != null)) {

                                // PRODUCT AMOUNT @PRIYANKA-29JAN19
                                document.getElementById('sttr_metal_amt' + prodCount).value = (parseFloat(totalValuation)).toFixed(2);

                            }

                            if (typeof (totalValuation) != 'undefined' &&
                                    (totalValuation != null) &&
                                    typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null)) {

                                // PRODUCT VALUATION @PRIYANKA-29JAN19
                                document.getElementById('sttr_valuation' + prodCount).value = (parseFloat(totalValuation)).toFixed(2);
                            }

                            if (typeof (totalValuation) != 'undefined' &&
                                    (totalValuation != null) &&
                                    typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (prodTotalLabCharges) != 'undefined' &&
                                    (prodTotalLabCharges != null) &&
                                    typeof (prodTotalMkgCharges) != 'undefined' &&
                                    (prodTotalMkgCharges != null)) {

                                // PRODUCT FINAL VALUATION @PRIYANKA-29JAN19 
                                document.getElementById('sttr_final_valuation' + prodCount).value = (parseFloat(totalValuation) + parseFloat(prodTotalLabCharges) + parseFloat(prodTotalMkgCharges) + parseFloat(prodTotalOtherCharges)).toFixed(2);
                            }
                        }
                        // PRODUCT TYPE
                    }

                } else {

                    if (typeof (prodRate) != 'undefined' &&
                            (prodRate != null) &&
                            typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + prodCount) != null) &&
                            typeof (prodQTY) != 'undefined' &&
                            (prodQTY != null)) {

                        // PRODUCT PRICE @PRIYANKA-29JAN19
                        document.getElementById('sttr_valuation' + prodCount).value = (parseFloat(prodRate) * parseFloat(prodQTY)).toFixed(2);
                    }
//alert(prodHallmarkCharges);
document.getElementById('sttr_final_valuation' + prodCount).value;
                    if (typeof (prodRate) != 'undefined' &&
                            (prodRate != null) &&
                            typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                            typeof (prodQTY) != 'undefined' &&
                            (prodQTY != null) &&
                            typeof (prodTotalLabCharges) != 'undefined' &&
                            (prodTotalLabCharges != null) &&
                            typeof (prodTotalMkgCharges) != 'undefined' &&
                            (prodTotalMkgCharges != null)&&
                            typeof (prodHallmarkCharges) != 'undefined' &&
                            (prodHallmarkCharges != null)) {

                        // PRODUCT FINAL PRICE @PRIYANKA-29JAN19    
                        //alert('2113');
//                       alert(prodHallmarkCharges);
document.getElementById('sttr_final_valuation' + prodCount).value;
                        document.getElementById('sttr_final_valuation' + prodCount).value = ((parseFloat(prodRate) * parseFloat(prodQTY)) + parseFloat(prodTotalLabCharges) + parseFloat(prodTotalMkgCharges) + parseFloat(prodTotalOtherCharges)+ parseFloat(prodHallmarkCharges)).toFixed(2);
                document.getElementById('sttr_final_valuation' + prodCount).value;  
            }
                }
            }
        }
        
        //alert('sttr_valuation == ' + document.getElementById('sttr_valuation' + prodCount).value);
        
        if ((typeof (document.getElementById('sttr_cust_wastage' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_cust_wastage' + prodCount) != null)) &&
                (typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null))) {
            //
            if (document.getElementById('sttr_cust_wastage' + prodCount).value > 0 && document.getElementById('sttr_cust_wastage' + prodCount).value != '') {
                custWastgWeightValueAddCalcFunc(prodCount);
            }
        }


        // VALUE ADDED CHARGES @PRIYANKA-13DEC18
        if (typeof (document.getElementById('sttr_value_added' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_value_added' + prodCount) != null)) {
            // VALUE ADDED CHARGES @PRIYANKA-13DEC18
            if (document.getElementById('sttr_value_added' + prodCount).value == '') {
                document.getElementById('sttr_value_added' + prodCount).value = 0;
            }
        }

        // PRODUCT VAL, AMT, TAXABLE AMT, FINAL VAL, VALUE ADDED @PRIYANKA-13DEC18
        if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_valuation' + prodCount) != null) &&
                typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_metal_amt' + prodCount) != null) &&
                typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_final_valuation' + prodCount) != null)) {

            // PRODUCT VAL, AMT, TAXABLE AMT, FINAL VAL, VALUE ADDED @PRIYANKA-13DEC18
            document.getElementById('sttr_valuation' + prodCount).value = parseFloat(parseFloat(document.getElementById('sttr_valuation' + prodCount).value)).toFixed(2);
            document.getElementById('sttr_metal_amt' + prodCount).value = parseFloat(parseFloat(document.getElementById('sttr_metal_amt' + prodCount).value)).toFixed(2);
            document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(parseFloat(document.getElementById('sttr_final_taxable_amt' + prodCount).value)).toFixed(2);
            document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(parseFloat(document.getElementById('sttr_final_valuation' + prodCount).value)).toFixed(2);
        }

        // PRODUCT VAL, TAXABLE AMT, FINAL VAL, VALUE ADDED @PRIYANKA-13DEC18
        if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_valuation' + prodCount) != null) &&
                typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                typeof (document.getElementById('sttr_value_added' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_value_added' + prodCount) != null)) {
            // PRODUCT VAL, TAXABLE AMT, FINAL VAL, VALUE ADDED @PRIYANKA-13DEC18
            document.getElementById('sttr_valuation' + prodCount).value = parseFloat(parseFloat(document.getElementById('sttr_valuation' + prodCount).value) + parseFloat(document.getElementById('sttr_value_added' + prodCount).value)).toFixed(2);
            document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(parseFloat(document.getElementById('sttr_final_taxable_amt' + prodCount).value) + parseFloat(document.getElementById('sttr_value_added' + prodCount).value)).toFixed(2);
            document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(parseFloat(document.getElementById('sttr_final_valuation' + prodCount).value) + parseFloat(document.getElementById('sttr_value_added' + prodCount).value)).toFixed(2);
        } else if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                typeof (document.getElementById('sttr_value_added' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_value_added' + prodCount) != null)) {
            // TAXABLE AMT, FINAL VAL, VALUE ADDED @PRIYANKA-13DEC18
            document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(parseFloat(document.getElementById('sttr_final_taxable_amt' + prodCount).value) + parseFloat(document.getElementById('sttr_value_added' + prodCount).value)).toFixed(2);
            document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(parseFloat(document.getElementById('sttr_final_valuation' + prodCount).value) + parseFloat(document.getElementById('sttr_value_added' + prodCount).value)).toFixed(2);
        }

        if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_metal_amt' + prodCount) != null)) {

            if (document.getElementById('sttr_metal_amt' + prodCount).value == '' ||
                    document.getElementById('sttr_metal_amt' + prodCount).value == 'NaN') {
                document.getElementById('sttr_metal_amt' + prodCount).value = 0;
            }
        }

        if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_valuation' + prodCount) != null)) {

            if (document.getElementById('sttr_valuation' + prodCount).value == '' ||
                    document.getElementById('sttr_valuation' + prodCount).value == 'NaN') {
                document.getElementById('sttr_valuation' + prodCount).value = 0;
            }
        }

        //alert('sttr_valuation == ' + document.getElementById('sttr_valuation' + prodCount).value);

        /* START CODE TO ADD CONDITION FOR FINE JWELLRTY RETAIL B6 FORM CALCULATION @AUTHOR:MADHUREE-04FEB2020 */
        if (typeof (document.getElementById('panelName' + prodCount)) != 'undefined' &&
                (document.getElementById('panelName' + prodCount) != null)) {

            sttr_transaction_type = document.getElementById('sttr_transaction_type' + prodCount).value;

            if (document.getElementById('panelName' + prodCount).value == 'FINE_JEWELLERY_RETAIL_PUR_B6'
                    || document.getElementById('panelName' + prodCount).value == 'FINE_JEWELLERY_WHOLESALE_PUR_B6'
                    || document.getElementById('panelName' + prodCount).value == 'FINE_JEWELLERY_RETAIL_PUR_B7'
                    || document.getElementById('panelName' + prodCount).value == 'FINE_JEWELLERY_WHOLESALE_PUR_B7') {

                if (typeof (document.getElementById('sttr_item_code' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_item_code' + prodCount)) != null &&
                        typeof (document.getElementById('sttr_item_pre_id' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_item_pre_id' + prodCount)) != null) {
                    // FOR ITEM CODE FIELD FOR WHOLESALE PRODUCT @PRIYANKA-31JAN19

                    if (document.getElementById('sttr_item_code' + prodCount).value == '' || document.getElementById('sttr_item_code' + prodCount).value == null)
                    {
                        var prodPreId = document.getElementById('sttr_item_pre_id' + prodCount).value;
                        if (prodPreId.charAt(prodPreId.length - 1) != '#') {
                            prodPreId += '#';
                        }
                        document.getElementById('sttr_item_code' + prodCount).value = prodPreId;
//                        alert('sttr_item_code @== ' + document.getElementById('sttr_item_code' + prodCount).value);
                    }

                    //alert('sttr_item_code @== ' + document.getElementById('sttr_item_code' + prodCount).value);
                }
                if (sttr_transaction_type == 'sell' || sttr_transaction_type == 'ESTIMATE' || sttr_transaction_type == 'APPROVAL') {
                    if (typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_product_sell_rate' + prodCount) != null)) {
                        prodSellRate = document.getElementById('sttr_product_sell_rate' + prodCount).value;
                    }
                    if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_gs_weight' + prodCount) != null)) {
                        if (prodGsWeight == null) {
                            prodGsWeight = document.getElementById('sttr_gs_weight' + prodCount).value;
                        }
                        if (typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_nt_weight' + prodCount) != null)) {
                            document.getElementById('sttr_nt_weight' + prodCount).value = document.getElementById('sttr_gs_weight' + prodCount).value;
                            document.getElementById('sttr_nt_weight_type' + prodCount).value = document.getElementById('sttr_gs_weight_type' + prodCount).value;
                        }
                        if (typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_purity' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_purity_ct' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_purity_ct' + prodCount) != null)) {
                            if (document.getElementById('sttr_purity' + prodCount).value == '' && document.getElementById('sttr_purity_ct' + prodCount).value != '') {
                                document.getElementById('sttr_purity' + prodCount).value = (parseFloat(100 * (document.getElementById('sttr_purity_ct' + prodCount).value)) / 24).toFixed(2);
                            }
                        }
                        if (typeof (document.getElementById('sttr_fine_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_fine_weight' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_purity' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_nt_weight' + prodCount) != null)) {
                            // CALCULATE FINE WEIGHT
                            document.getElementById('sttr_fine_weight' + prodCount).value = ((document.getElementById('sttr_purity' + prodCount).value * document.getElementById('sttr_nt_weight' + prodCount).value) / 100).toFixed(3);
                            document.getElementById('sttr_fine_weight_type' + prodCount).value = document.getElementById('sttr_gs_weight_type' + prodCount).value;
                            document.getElementById('sttr_final_fine_weight' + prodCount).value = ((document.getElementById('sttr_purity' + prodCount).value * document.getElementById('sttr_nt_weight' + prodCount).value) / 100).toFixed(3);
                        }
                        if (prodGsWeightType == null) {
                            prodGsWeightType = document.getElementById('sttr_gs_weight_type' + prodCount).value;
                        }
                        if (typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_product_sell_rate' + prodCount) != null)) {
                            prodSellRate = document.getElementById('sttr_product_sell_rate' + prodCount).value;
                        }
                        if (document.getElementById('sttr_final_valuation' + prodCount).value == '' ||
                                document.getElementById('sttr_final_valuation' + prodCount).value == 'NaN') {
                            document.getElementById('sttr_final_valuation' + prodCount).value = 0;
                        }
                        // PRODUCT WEIGHT TYPE
                        if (prodGsWeightType == 'KG') {

                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInKg') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19
                                document.getElementById('sttr_valuation' + prodCount).value = ((prodGsWeight * prodSellRate) * document.getElementById('othGmWtInKg').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInKg') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19                         
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(((prodGsWeight * prodSellRate) * document.getElementById('othGmWtInKg').value)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInKg') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                               
                               document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(((prodGsWeight * prodSellRate) * document.getElementById('othGmWtInKg').value)).toFixed(2);
                                document.getElementById('sttr_cust_price' + prodCount).value = parseFloat(((prodGsWeight * prodSellRate) / document.getElementById('othGmWtInGm').value)).toFixed(2);
                            }


                            // PRODUCT WEIGHT TYPE
                        } else if (prodGsWeightType == 'GM') {
//                        alert(document.getElementById('othGmWtInGm').value);
                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('othGmWtInGm') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19
                                document.getElementById('sttr_valuation' + prodCount).value = parseFloat(((prodGsWeight * prodSellRate) / document.getElementById('othGmWtInGm').value)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('othGmWtInGm') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19                              
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(((prodGsWeight * prodSellRate) / document.getElementById('othGmWtInGm').value)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('othGmWtInGm') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                               
                                document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(((prodGsWeight * prodSellRate) / document.getElementById('othGmWtInGm').value)).toFixed(2);
                                document.getElementById('sttr_cust_price' + prodCount).value = parseFloat(((prodGsWeight * prodSellRate) / document.getElementById('othGmWtInGm').value)).toFixed(2);
                            }

                            // PRODUCT WEIGHT TYPE
                        } else if (prodGsWeightType == 'MG') {

                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInMg') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19
                                document.getElementById('sttr_valuation' + prodCount).value = parseFloat(((prodGsWeight * prodSellRate) / document.getElementById('othGmWtInMg').value)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInMg') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19                              
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(((prodGsWeight * prodSellRate) / document.getElementById('othGmWtInMg').value)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInMg') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                               
                                document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(((prodGsWeight * prodSellRate) / document.getElementById('othGmWtInMg').value)).toFixed(2);
                                document.getElementById('sttr_cust_price' + prodCount).value = parseFloat(((prodGsWeight * prodSellRate) / document.getElementById('othGmWtInGm').value)).toFixed(2);
                            }
                            if (document.getElementById('sttr_final_valuation' + prodCount).value == '' ||
                                    document.getElementById('sttr_final_valuation' + prodCount).value == 'NaN') {
                                document.getElementById('sttr_final_valuation' + prodCount).value = 0;
                            }
                        }
                    }
                } else {
                    if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_gs_weight' + prodCount) != null)) {
                        if (prodGsWeight == null) {
                            prodGsWeight = document.getElementById('sttr_gs_weight' + prodCount).value;
                        }
                        if (typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_nt_weight' + prodCount) != null)) {
                            document.getElementById('sttr_nt_weight' + prodCount).value = document.getElementById('sttr_gs_weight' + prodCount).value;
                            document.getElementById('sttr_nt_weight_type' + prodCount).value = document.getElementById('sttr_gs_weight_type' + prodCount).value;
                        }
                        if (typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_purity' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_purity_ct' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_purity_ct' + prodCount) != null)) {
                            if (document.getElementById('sttr_purity' + prodCount).value == '' && document.getElementById('sttr_purity_ct' + prodCount).value != '') {
                                document.getElementById('sttr_purity' + prodCount).value = (parseFloat(100 * (document.getElementById('sttr_purity_ct' + prodCount).value)) / 24).toFixed(2);
                            }
                        }
                        if (typeof (document.getElementById('sttr_fine_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_fine_weight' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_purity' + prodCount) != null) &&
                                typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_nt_weight' + prodCount) != null)) {
                            // CALCULATE FINE WEIGHT
                            document.getElementById('sttr_fine_weight' + prodCount).value = ((document.getElementById('sttr_purity' + prodCount).value * document.getElementById('sttr_nt_weight' + prodCount).value) / 100).toFixed(3);
                            document.getElementById('sttr_fine_weight_type' + prodCount).value = document.getElementById('sttr_gs_weight_type' + prodCount).value;
                            document.getElementById('sttr_final_fine_weight' + prodCount).value = ((document.getElementById('sttr_purity' + prodCount).value * document.getElementById('sttr_nt_weight' + prodCount).value) / 100).toFixed(3);
                        }
                        if (prodGsWeightType == null) {
                            prodGsWeightType = document.getElementById('sttr_gs_weight_type' + prodCount).value;
                        }
                        if (typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' &&
                                (document.getElementById('sttr_product_sell_rate' + prodCount) != null)) {
                            prodSellRate = document.getElementById('sttr_product_sell_rate' + prodCount).value;
                        }
                        if (document.getElementById('sttr_final_valuation' + prodCount).value == '' ||
                                document.getElementById('sttr_final_valuation' + prodCount).value == 'NaN') {
                            document.getElementById('sttr_final_valuation' + prodCount).value = 0;
                        }
                        // PRODUCT WEIGHT TYPE
                        if (prodGsWeightType == 'KG') {

                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInKg') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19
                                document.getElementById('sttr_valuation' + prodCount).value = ((prodGsWeight * prodRate) * document.getElementById('othGmWtInKg').value).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInKg') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19                         
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(((prodGsWeight * prodRate) * document.getElementById('othGmWtInKg').value)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInKg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInKg') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                               
                                document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(((prodGsWeight * prodRate) * document.getElementById('othGmWtInKg').value)).toFixed(2);

                            }


                            // PRODUCT WEIGHT TYPE
                        } else if (prodGsWeightType == 'GM') {
//                        alert(document.getElementById('othGmWtInGm').value);
                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('othGmWtInGm') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19
                                document.getElementById('sttr_valuation' + prodCount).value = parseFloat(((prodGsWeight * prodRate) / document.getElementById('othGmWtInGm').value)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('othGmWtInGm') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19                              
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(((prodGsWeight * prodRate) / document.getElementById('othGmWtInGm').value)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInGm')) != 'undefined' &&
                                    (document.getElementById('othGmWtInGm') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                               
                                document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(((prodGsWeight * prodRate) / document.getElementById('othGmWtInGm').value)).toFixed(2);
                                document.getElementById('sttr_cust_price' + prodCount).value = parseFloat(((prodGsWeight * prodSellRate) / document.getElementById('othGmWtInGm').value)).toFixed(2);
                            }

                            // PRODUCT WEIGHT TYPE
                        } else if (prodGsWeightType == 'MG') {

                            if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInMg') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT VAL @PRIYANKA-29JAN19
                                document.getElementById('sttr_valuation' + prodCount).value = parseFloat(((prodGsWeight * prodRate) / document.getElementById('othGmWtInMg').value)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInMg') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT TAXABLE AMT @PRIYANKA-29JAN19                              
                                document.getElementById('sttr_final_taxable_amt' + prodCount).value = parseFloat(((prodGsWeight * prodRate) / document.getElementById('othGmWtInMg').value)).toFixed(2);
                            }

                            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                                    typeof (document.getElementById('othGmWtInMg')) != 'undefined' &&
                                    (document.getElementById('othGmWtInMg') != null) &&
                                    typeof (prodGsWeight) != 'undefined' && prodGsWeight != null) {

                                // PRODUCT FINAL VAL @PRIYANKA-29JAN19                               
                                document.getElementById('sttr_final_valuation' + prodCount).value = parseFloat(((prodGsWeight * prodRate) / document.getElementById('othGmWtInMg').value)).toFixed(2);
                            }
                            if (document.getElementById('sttr_final_valuation' + prodCount).value == '' ||
                                    document.getElementById('sttr_final_valuation' + prodCount).value == 'NaN') {
                                document.getElementById('sttr_final_valuation' + prodCount).value = 0;
                            }
                            // PRODUCT TYPE
                        }
                    }
                }
            }
        }
        //alert('here');
 var prodHallmarkCharges = 0;
var hallmarkChargesElement = document.getElementById('sttr_hallmark_charges' + prodCount);
if (typeof hallmarkChargesElement !== 'undefined' && hallmarkChargesElement !== null) {
    // PRODUCT Hallmark CHARGES
    prodHallmarkCharges = parseFloat(hallmarkChargesElement.value) || 0;
}
if (document.getElementById('sttr_final_valuation' + prodCount).value != '' || document.getElementById('sttr_final_valuation' + prodCount).value != null) {
    document.getElementById('sttr_final_valuation' + prodCount).value = (parseFloat(document.getElementById('sttr_final_valuation' + prodCount).value) + prodHallmarkCharges).toFixed(2);
//console.log(document.getElementById('sttr_final_valuation' + prodCount).value);
                  }
        /* END CODE TO ADD CONDITION FOR FINE JWELLRTY RETAIL B6 FORM CALCULATION @AUTHOR:MADHUREE-04FEB2020 */

        //alert('prodQTY == ' + prodQTY);
        //alert('prodGsWeight == ' + prodGsWeight);
        //alert('prodGsWeightType == ' + prodGsWeightType);
        //alert('prodRate == ' + prodRate);
        //alert('prodRateType == ' + prodRateType);
        ///alert('totalValuation == ' + totalValuation);
        //alert('sttr_valuation == ' + document.getElementById('sttr_valuation' + prodCount).value);

        // *************************************************************************************************************************************
        // END CODE FOR PRODUCT VAL, AMT, TAXABLE AMT & FINAL VALUATION CALCULATIONS
        // *************************************************************************************************************************************

        // START CODE TO CALL FUNCTION FOR DISCOUNT CALCULATIONS @PRIYANKA-03MAY18
        discountCalcFunc(prodCount, discountCal);
        // END CODE TO CALL FUNCTION FOR DISCOUNT CALCULATIONS @PRIYANKA-03MAY18

        // *************************************************************************************************************************************
        // *************************************************************************************************************************************

        // START CODE TO CALL FUNCTION FOR TAX & FINAL AMOUNT CALCULATIONS @PRIYANKA-03MAY18
        taxCalcFunc(prodCount, discountCal);
        // END CODE TO CALL FUNCTION FOR TAX & FINAL AMOUNT CALCULATIONS @PRIYANKA-03MAY18

        // *************************************************************************************************************************************
        // *************************************************************************************************************************************

        // START CODE TO ADD FUNCTION FOR ADD DATE, MFG DATE, EXP DATE, DELIVERY DATE, ITEM CODE @PRIYANKA-30JAN19
        stockFormMergeColumnValueFunc(prodCount);
        // END CODE TO ADD FUNCTION FOR ADD DATE, MFG DATE, EXP DATE, DELIVERY DATE, ITEM CODE @PRIYANKA-30JAN19

        // *************************************************************************************************************************************
        // *************************************************************************************************************************************
        hideAddDivButton();
        if ((typeof (document.getElementById('sttr_transaction_type' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_transaction_type' + prodCount) != null)) &&
                (document.getElementById('sttr_transaction_type' + prodCount).value == 'EXISTING')) {
            calculateSellAmt(prodCount);
        }
        calculateFinalAmt();
    }, 100);
}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR CALCULATIONS @PRIYANKA-02APR18
// *************************************************************************************************************************************
//
// **************************************************************************************************
// START CODE TO ADD FUNCTION FOR CALCULATE SELL AMOUNT AT ADD STOCK PANEL @AUTHOR:MADHUREE-17DEC2021
// **************************************************************************************************
//
function calculateSellAmt(prodCount) {
    //
    var prodType = document.getElementById('sttr_product_type' + prodCount).value;
    //
    if (prodType == 'Gold' || prodType == 'GOLD' || prodType == 'gold' || prodType == 'Silver' || prodType == 'SILVER' || prodType == 'silver') {
        if (typeof (document.getElementById('sttr_cust_price' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_cust_price' + prodCount) != null)) {
            var purchaseFinalAmount = document.getElementById('sttr_valuation' + prodCount).value;
            var sellMkgCharges = 0;
            var sellValueAdded = 0;
            var prodMkgCharges = document.getElementById('sttr_making_charges' + prodCount).value;
            var prodMkgChargesType = document.getElementById('sttr_making_charges_type' + prodCount).value;
            var prodType = document.getElementById('sttr_product_type' + prodCount).value;
            var prodWtType = document.getElementById('sttr_gs_weight_type' + prodCount).value;
            var prodRate = parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value);
            if (prodRate == '' || prodRate == null) {
                prodRate = parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value);
            }
            var custWastageWtForCal = '';
            //
            if (document.getElementById('sttr_mkg_charges_by' + prodCount).value == 'mkgByNetWt') {
                var prodMkgChargesBy = parseFloat(document.getElementById('sttr_nt_weight' + prodCount).value);
            } else if (document.getElementById('sttr_mkg_charges_by' + prodCount).value == 'mkgByGrossWt') {
                var prodMkgChargesBy = parseFloat(document.getElementById('sttr_gs_weight' + prodCount).value);
            } else {
                var prodMkgChargesBy = parseFloat(document.getElementById('sttr_nt_weight' + prodCount).value);
            }
            // CALCULATE MAKING CHARGES@AUTHOR:MADHUREE-17DEC2021
            if (prodMkgCharges != '') {
                if (prodMkgChargesType == 'KG') {
                    if (prodWtType == 'KG') {
                        sellMkgCharges = prodMkgCharges * prodMkgChargesBy;
                    } else if (prodWtType == 'GM') {
                        sellMkgCharges = (prodMkgCharges / 1000) * prodMkgChargesBy;
                    } else {
                        sellMkgCharges = (prodMkgCharges / (1000 * 1000)) * prodMkgChargesBy;
                    }
                } else if (prodMkgChargesType == 'GM') {
                    if (prodWtType == 'KG') {
                        sellMkgCharges = prodMkgCharges * 1000 * prodMkgChargesBy;
                    } else if (prodWtType == 'GM') {
                        sellMkgCharges = prodMkgCharges * prodMkgChargesBy;
                    } else {
                        sellMkgCharges = (prodMkgCharges / 1000) * prodMkgChargesBy;
                    }
                } else if (prodMkgChargesType == 'MG') {
                    if (prodWtType == 'KG') {
                        sellMkgCharges = prodMkgCharges * 1000 * 1000 * prodMkgChargesBy;
                    } else if (prodWtType == 'GM') {
                        sellMkgCharges = prodMkgCharges * 1000 * prodMkgChargesBy;
                    } else {
                        sellMkgCharges = prodMkgCharges * prodMkgChargesBy;
                    }
                } else if (prodMkgChargesType == 'PP') {
                    sellMkgCharges = prodMkgCharges * prodQTY;
                } else if (prodMkgChargesType == 'CT') {
                    sellMkgCharges = prodMkgCharges * prodMkgChargesBy;
                } else if (prodMkgChargesType == 'per' || prodMkgChargesType == '%') {
                    var MkgCharges = (prodMkgCharges * prodMkgChargesBy) / 100;
                    if ((prodType == 'Gold' || prodType == 'GOLD')) {
                        if (prodWtType == 'KG') {
                            sellMkgCharges = ((MkgCharges * prodRate) * document.getElementById('gmWtInKg').value).toFixed(2);
                        } else if (prodWtType == 'GM') {
                            sellMkgCharges = ((MkgCharges * prodRate) / document.getElementById('gmWtInGm').value).toFixed(2);
                        } else if (prodWtType == 'MG') {
                            sellMkgCharges = ((MkgCharges * prodRate) / document.getElementById('gmWtInMg').value).toFixed(2);
                        }
                    } else if ((prodType == 'Silver' || prodType == 'SILVER')) {
                        if (prodWtType == 'KG') {
                            sellMkgCharges = (MkgCharges * prodRate * document.getElementById('srGmWtInKg').value).toFixed(2);
                        } else if (prodWtType == 'GM') {
                            sellMkgCharges = ((MkgCharges * prodRate) / document.getElementById('srGmWtInGm').value).toFixed(2);
                        } else if (prodWtType == 'MG') {
                            sellMkgCharges = ((MkgCharges * prodRate) / (document.getElementById('srGmWtInMg').value)).toFixed(2);
                        }
                    } else {
                        if (prodWtType == 'KG') {
                            sellMkgCharges = ((MkgCharges * prodRate) * document.getElementById('othGmWtInKg').value).toFixed(2);
                        } else if (prodWtType == 'GM') {
                            sellMkgCharges = ((MkgCharges * prodRate) / document.getElementById('othGmWtInGm').value).toFixed(2);
                        } else if (prodWtType == 'MG') {
                            sellMkgCharges = ((MkgCharges * prodRate) / document.getElementById('othGmWtInMg').value).toFixed(2);
                        }
                    }
                }

            }
            // CALCULATE VALUE ADDED @AUTHOR:MADHUREE-17DEC2021
            if (document.getElementById('sttr_cust_wastage' + prodCount).value > 0) {
                //
                if (document.getElementById('sttr_value_added_by' + prodCount).value == 'byNetWt') {
                    custWastageWtForCal = ((parseFloat(parseFloat(document.getElementById('sttr_nt_weight' + prodCount).value)) * parseFloat(document.getElementById('sttr_cust_wastage' + prodCount).value)) / 100).toFixed(3);
                } else if (document.getElementById('sttr_value_added_by' + prodCount).value == 'byGrossWt') {
                    custWastageWtForCal = ((parseFloat(parseFloat(document.getElementById('sttr_gs_weight' + prodCount).value)) * parseFloat(document.getElementById('sttr_cust_wastage' + prodCount).value)) / 100).toFixed(3);
                } else if (document.getElementById('sttr_value_added_by' + prodCount).value == 'byFineWt') {
                    custWastageWtForCal = ((parseFloat(parseFloat(document.getElementById('sttr_fine_weight' + prodCount).value)) * parseFloat(document.getElementById('sttr_cust_wastage' + prodCount).value)) / 100).toFixed(3);
                } else if (document.getElementById('sttr_value_added_by' + prodCount).value == 'byFFineWt') {
                    custWastageWtForCal = ((parseFloat(parseFloat(document.getElementById('sttr_final_fine_weight' + prodCount).value)) * parseFloat(document.getElementById('sttr_cust_wastage' + prodCount).value)) / 100).toFixed(3);
                } else {
                    custWastageWtForCal = ((parseFloat(parseFloat(document.getElementById('sttr_final_fine_weight' + prodCount).value)) * parseFloat(document.getElementById('sttr_cust_wastage' + prodCount).value)) / 100).toFixed(3);
                }
                //
                if (prodType == 'Gold' || prodType == 'GOLD' || prodType == 'gold') {
                    if (prodWtType == 'KG') {
                        if (typeof (document.getElementById('gmWtInKg')) != 'undefined' &&
                                (document.getElementById('gmWtInKg') != null)) {
                            sellValueAdded = parseFloat(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) * document.getElementById('gmWtInKg').value)).toFixed(2);
                        }
                    } else if (prodWtType == 'GM') {
                        if (typeof (document.getElementById('gmWtInGm')) != 'undefined' &&
                                (document.getElementById('gmWtInGm') != null)) {
                            sellValueAdded = parseFloat(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) / document.getElementById('gmWtInGm').value)).toFixed(2);
                        }
                    } else if (prodWtType == 'MG') {
                        if (typeof (document.getElementById('gmWtInMg')) != 'undefined' &&
                                (document.getElementById('gmWtInMg') != null)) {
                            sellValueAdded = parseFloat(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) / document.getElementById('gmWtInMg').value)).toFixed(2);
                        }
                    }
                }
                //
                if (prodType == 'Silver' || prodType == 'SILVER' || prodType == 'silver') {
                    if (prodWtType == 'KG') {
                        if (typeof (document.getElementById('srGmWtInKg')) != 'undefined' &&
                                (document.getElementById('srGmWtInKg') != null)) {
                            sellValueAdded = parseFloat(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) * document.getElementById('srGmWtInKg').value)).toFixed(2);
                        }
                    }
                    //
                    if (prodWtType == 'GM') {
                        if (typeof (document.getElementById('srGmWtInGm')) != 'undefined' &&
                                (document.getElementById('srGmWtInGm') != null)) {
                            sellValueAdded = parseFloat(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) / document.getElementById('srGmWtInGm').value)).toFixed(2);
                        }
                    }
                    //
                    if (prodWtType == 'MG') {
                        if (typeof (document.getElementById('srGmWtInMg')) != 'undefined' &&
                                (document.getElementById('srGmWtInMg') != null)) {
                            sellValueAdded = parseFloat(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) / document.getElementById('srGmWtInMg').value)).toFixed(2);
                        }
                    }
                }
            }
        }
        //
        //alert('purchaseFinalAmount : ' + purchaseFinalAmount);
        //alert('sellValueAdded : ' + sellValueAdded);
        //alert('sellMkgCharges : ' + sellMkgCharges);
        //
        document.getElementById('sttr_cust_price' + prodCount).value = parseFloat(parseFloat(purchaseFinalAmount) + parseFloat(sellValueAdded) + parseFloat(sellMkgCharges)).toFixed(2);
        //
        if (document.getElementById('sttr_cust_price' + prodCount).value == 'NaN') {
            document.getElementById('sttr_cust_price' + prodCount).value = parseFloat(0);
        }
        //
    } else if (prodType == 'Crystal' || prodType == 'CRYSTAL' || prodType == 'STONE' || prodType == 'Stone') {
        //
        var prodQTY = (document.getElementById('sttr_quantity' + prodCount).value);
        var prodRate = parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value);
        var prodRateType = document.getElementById('sttr_product_sell_rate_type' + prodCount).value;
        var prodGsWeight = parseFloat(document.getElementById('sttr_gs_weight' + prodCount).value);
        var prodGsWeightType = document.getElementById('sttr_gs_weight_type' + prodCount).value;
        //
        var totalValuation = 0;
        //
        if (prodRateType == 'PP') {
            totalValuation = prodRate * prodQTY;
        } else if (prodGsWeightType == 'CT' && prodRateType == 'CT') {
            totalValuation = prodRate * prodGsWeight;
        } else if (prodGsWeightType == 'CT' && prodRateType == 'GM') {
            var currentRate = (prodRate * 0.2);
            totalValuation = currentRate * prodGsWeight;
        } else if (prodGsWeightType == 'CT' && prodRateType == 'MG') {
            var currentRate = (prodRate * 0.005);
            totalValuation = currentRate * prodGsWeight;
        } else if (prodGsWeightType == 'CT' && prodRateType == 'KG') {
            var currentRate = (prodRate * 5000);
            totalValuation = currentRate * prodGsWeight;
        } else if (prodGsWeightType == 'GM' && prodRateType == 'CT') {
            var currentRate = (prodRate * 5);
            totalValuation = currentRate * prodGsWeight;
        } else if (prodGsWeightType == 'GM' && prodRateType == 'GM') {
            totalValuation = prodRate * prodGsWeight;
        } else if (prodGsWeightType == 'GM' && prodRateType == 'MG') {
            var currentRate = (prodRate * 0.001);
            totalValuation = currentRate * prodGsWeight;
        } else if (prodGsWeightType == 'GM' && prodRateType == 'KG') {
            var currentRate = (prodRate * 1000);
            totalValuation = currentRate * prodGsWeight;
        } else if (prodGsWeightType == 'MG' && prodRateType == 'CT') {
            var currentRate = (prodRate * 0.005);
            totalValuation = currentRate * prodGsWeight;
        } else if (prodGsWeightType == 'MG' && prodRateType == 'GM') {
            var currentRate = (prodRate * 1000);
            totalValuation = currentRate * prodGsWeight;
        } else if (prodGsWeightType == 'MG' && prodRateType == 'MG') {
            totalValuation = prodRate * prodGsWeight;
        } else if (prodGsWeightType == 'MG' && prodRateType == 'KG') {
            var currentRate = (prodRate * 1000000);
            totalValuation = currentRate * prodGsWeight;
        } else if (prodGsWeightType == 'KG' && prodRateType == 'CT') {
            var currentRate = (prodRate * 0.0002);
            totalValuation = currentRate * prodGsWeight;
        } else if (prodGsWeightType == 'KG' && prodRateType == 'GM') {
            var currentRate = (prodRate * 0.001);
            totalValuation = currentRate * prodGsWeight;
        } else if (prodGsWeightType == 'KG' && prodRateType == 'MG') {
            var currentRate = (prodRate * 1000000);
            totalValuation = currentRate * prodGsWeight;
        } else if (prodGsWeightType == 'KG' && prodRateType == 'KG') {
            totalValuation = prodRate * prodGsWeight;
        } else if (prodGsWeight == '' && prodRateType == 'PP') {
            totalValuation = prodRate * prodQTY;
        } else if (prodGsWeightType == 'GM' && prodRateType == 'PP') {
            totalValuation = prodRate * prodQTY;
        } else if (prodGsWeightType == 'MG' && prodRateType == 'PP') {
            totalValuation = prodRate * prodQTY;
        } else if (prodGsWeightType == 'KG' && prodRateType == 'PP') {
            totalValuation = prodRate * prodQTY;
        } else {
            totalValuation = prodRate * prodGsWeight;
        }
        //
        document.getElementById('sttr_cust_price' + prodCount).value = parseFloat(totalValuation).toFixed(2);
        //
        if (document.getElementById('sttr_cust_price' + prodCount).value == 'NaN') {
            document.getElementById('sttr_cust_price' + prodCount).value = parseFloat(0);
        }
        //
    }
}
//
// ************************************************************************************************
// END CODE TO ADD FUNCTION FOR CALCULATE SELL AMOUNT AT ADD STOCK PANEL @AUTHOR:MADHUREE-17DEC2021
// ************************************************************************************************
//
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR VALUE ADD & CUSTOMER WASTAGE CALCULATIONS @PRIYANKA-03MAY18
// *************************************************************************************************************************************
function custWastgValueAddCalcFunc(prodCount) {
    //
    // PRODUCT NET WEIGHT
    if (typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_nt_weight' + prodCount) != null)) {
        // PRODUCT NET WEIGHT
        var prodNetWeight = document.getElementById('sttr_nt_weight' + prodCount).value; // NET WEIGHT
        if (prodNetWeight == '' || prodNetWeight == 'NaN') {
            prodNetWeight = 0;
        }
    }

    // PRODUCT FINAL FINE WEIGHT
    if (typeof (document.getElementById('sttr_final_purity' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_final_purity' + prodCount) != null)) {
        // PRODUCT FINAL FINE WEIGHT
        var prodFinalFineWt = ((parseFloat(document.getElementById('sttr_final_purity' + prodCount).value) * prodNetWeight) / 100).toFixed(3);
        if (prodFinalFineWt == '' || prodFinalFineWt == 'NaN') {
            prodFinalFineWt = 0;
        }
    }
    //
    // CUSTOMER WASTAGE WEIGHT @PRIYANKA-01SEP2021
    if (typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null)) {
        //
        //
        // CUSTOMER WASTAGE WEIGHT @PRIYANKA-01SEP2021
        if (document.getElementById('sttr_cust_wastage_wt' + prodCount).value > 0) { // CUSTOMER WASTAGE WEIGHT IS GREATER THAN ZERO @PRIYANKA-01SEP2021
            //
            //
            // ============================================================================================================= //
            // START CODE TO CHANGE FOR CALCULATING VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021                            //
            // ============================================================================================================= //
            //
            // PRODUCT TYPE @PRIYANKA-01SEP2021
            if (typeof (document.getElementById('sttr_product_type')) != 'undefined' &&
                    (document.getElementById('sttr_product_type') != null)) {
                // PRODUCT TYPE @PRIYANKA-01SEP2021
                var prodType = document.getElementById('sttr_product_type').value;
            }
            //
            //alert('prodType == ' + prodType);
            //
            if (prodType == '' || prodType == null || prodType == 'undefined') {
                //
                // PRODUCT TYPE IS NULL/BLANK @PRIYANKA-01SEP2021
                // USE PRODUCT COUNT @PRIYANKA-01SEP2021
                if (typeof (document.getElementById('sttr_product_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_product_type' + prodCount) != null)) {
                    // PRODUCT TYPE @PRIYANKA-01SEP2021
                    var prodType = document.getElementById('sttr_product_type' + prodCount).value;
                }
            }
            //
            //
            // IF PRODUCT WEIGHT TYPE IS NULL @PRIYANKA-01SEP2021
            if (typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_gs_weight_type' + prodCount) != null)) {
                // PRODUCT WT TYPE @PRIYANKA-01SEP2021
                var prodWtType = document.getElementById('sttr_gs_weight_type' + prodCount).value;
            }
            //
            //
            //alert('prodType == ' + prodType);
            //alert('prodWtType == ' + prodWtType);
            //alert('sttr_product_sell_rate == ' + document.getElementById('sttr_product_sell_rate' + prodCount).value);
            //alert('sttr_cust_wastage_wt == ' + document.getElementById('sttr_cust_wastage_wt' + prodCount).value);
            //alert('srGmWtInKg == ' + document.getElementById('srGmWtInKg').value);
            //alert('srGmWtInGm == ' + document.getElementById('srGmWtInGm').value);
            //alert('srGmWtInMg == ' + document.getElementById('srGmWtInMg').value);
            //
            //
            // FOR PRODUCT TYPE GOLD @PRIYANKA-01SEP2021
            if (prodType == 'Gold' || prodType == 'GOLD' || prodType == 'gold') {
                //
                //
                // FOR PRODUCT PURCHASE RATE @PRIYANKA-01SEP2021
                if (typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_value_added' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_value_added' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_gs_weight_type' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_product_purchase_rate' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_product_purchase_rate' + prodCount) != null)) {
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'KG') {
                        if (typeof (document.getElementById('gmWtInKg')) != 'undefined' &&
                                (document.getElementById('gmWtInKg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) * document.getElementById('gmWtInKg').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'GM') {
                        if (typeof (document.getElementById('gmWtInGm')) != 'undefined' &&
                                (document.getElementById('gmWtInGm') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) / document.getElementById('gmWtInGm').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'MG') {
                        if (typeof (document.getElementById('gmWtInMg')) != 'undefined' &&
                                (document.getElementById('gmWtInMg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) / document.getElementById('gmWtInMg').value));
                        }
                    }
                }
                //
                //
                // FOR PRODUCT SELL RATE @PRIYANKA-01SEP2021
                if (typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_value_added' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_value_added' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_gs_weight_type' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_product_sell_rate' + prodCount) != null)) {
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'KG') {
                        if (typeof (document.getElementById('gmWtInKg')) != 'undefined' &&
                                (document.getElementById('gmWtInKg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value) * parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value)) * document.getElementById('gmWtInKg').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'GM') {
                        if (typeof (document.getElementById('gmWtInGm')) != 'undefined' &&
                                (document.getElementById('gmWtInGm') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value) * parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value)) / document.getElementById('gmWtInGm').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'MG') {
                        if (typeof (document.getElementById('gmWtInMg')) != 'undefined' &&
                                (document.getElementById('gmWtInMg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value) * parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value)) / document.getElementById('gmWtInMg').value));
                        }
                    }
                }
            }
            //
            //
            //
            // FOR PRODUCT TYPE SILVER @PRIYANKA-01SEP2021
            if (prodType == 'Silver' || prodType == 'SILVER' || prodType == 'silver') {
                //
                //
                // FOR PRODUCT PURCHASE RATE @PRIYANKA-01SEP2021
                if (typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_value_added' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_value_added' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_gs_weight_type' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_product_purchase_rate' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_product_purchase_rate' + prodCount) != null)) {
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'KG') {
                        if (typeof (document.getElementById('srGmWtInKg')) != 'undefined' &&
                                (document.getElementById('srGmWtInKg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) * document.getElementById('srGmWtInKg').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'GM') {
                        if (typeof (document.getElementById('srGmWtInGm')) != 'undefined' &&
                                (document.getElementById('srGmWtInGm') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) / document.getElementById('srGmWtInGm').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'MG') {
                        if (typeof (document.getElementById('srGmWtInMg')) != 'undefined' &&
                                (document.getElementById('srGmWtInMg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) / document.getElementById('srGmWtInMg').value));
                        }
                    }
                }
                //
                //
                // FOR PRODUCT SELL RATE @PRIYANKA-01SEP2021
                if (typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_value_added' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_value_added' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_gs_weight_type' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_product_sell_rate' + prodCount) != null)) {
                    //
                    //
                    //alert('prodType == ' + prodType);
                    //alert('prodWtType == ' + prodWtType);
                    //alert('sttr_product_sell_rate == ' + document.getElementById('sttr_product_sell_rate' + prodCount).value);
                    //alert('sttr_cust_wastage_wt == ' + document.getElementById('sttr_cust_wastage_wt' + prodCount).value);
                    //alert('srGmWtInKg == ' + document.getElementById('srGmWtInKg').value);
                    //alert('srGmWtInGm == ' + document.getElementById('srGmWtInGm').value);
                    //alert('srGmWtInMg == ' + document.getElementById('srGmWtInMg').value);
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'KG') {
                        if (typeof (document.getElementById('srGmWtInKg')) != 'undefined' &&
                                (document.getElementById('srGmWtInKg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value) * parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value)) * document.getElementById('srGmWtInKg').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'GM') {
                        if (typeof (document.getElementById('srGmWtInGm')) != 'undefined' &&
                                (document.getElementById('srGmWtInGm') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value) * parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value)) / document.getElementById('srGmWtInGm').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'MG') {
                        if (typeof (document.getElementById('srGmWtInMg')) != 'undefined' &&
                                (document.getElementById('srGmWtInMg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value) * parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value)) / document.getElementById('srGmWtInMg').value));
                        }
                    }
                }
            }
            // ============================================================================================================= //
            // END CODE TO CHANGE FOR CALCULATING VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021                              //
            // ============================================================================================================= //
        }
    }
    //
    //
    // VALUE ADDED
    if (typeof (document.getElementById('sttr_value_added' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_value_added' + prodCount) != null)) {
        // VALUE ADDED
        if (document.getElementById('sttr_value_added' + prodCount).value == '' ||
                document.getElementById('sttr_value_added' + prodCount).value == 'NaN') {
            document.getElementById('sttr_value_added' + prodCount).value = 0;
        }
    }
    //
    //
    // CALCULATE PROD SELL FINAL FINE WEIGHT
    if (typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null)) {
        // CALCULATE PROD SELL FINAL FINE WEIGHT
        var prodSellFinalFineWt = (parseFloat(prodFinalFineWt) + parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value)).toFixed(3);
    }
    //
    //
    // PROD SELL FINAL FINE WEIGHT
    if (typeof (document.getElementById('sttr_sell_final_fine_weight' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_sell_final_fine_weight' + prodCount) != null)) {
        // PROD SELL FINAL FINE WEIGHT
        document.getElementById('sttr_sell_final_fine_weight' + prodCount).value = parseFloat(prodSellFinalFineWt).toFixed(3);
        // PROD SELL FINAL FINE WEIGHT
        if (document.getElementById('sttr_sell_final_fine_weight' + prodCount).value == '' ||
                document.getElementById('sttr_sell_final_fine_weight' + prodCount).value == 'NaN') {
            document.getElementById('sttr_sell_final_fine_weight' + prodCount).value = 0;
        }
    }
}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR VALUE ADD & CUSTOMER WASTAGE CALCULATIONS @PRIYANKA-03MAY18
// *************************************************************************************************************************************

// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR VALUE ADD & CUSTOMER WASTAGE WEIGHT CALCULATIONS @PRIYANKA-09MAY18
// *************************************************************************************************************************************
function custWastgWeightValueAddCalcFunc(prodCount) {

 if(document.getElementById('sttr_hallmark_charges' + prodCount).value == ''){
                document.getElementById('sttr_hallmark_charges' + prodCount).value = 0;
                }
    if (typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_nt_weight' + prodCount) != null)) {
        // PRODUCT NET WEIGHT
        var prodNetWeight = document.getElementById('sttr_nt_weight' + prodCount).value; // NET WEIGHT

        if (prodNetWeight == '' || prodNetWeight == 'NaN') {
            prodNetWeight = 0;
        }
    }

    if (typeof (document.getElementById('sttr_final_purity' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_final_purity' + prodCount) != null)) {
        // PRODUCT FINAL FINE WEIGHT
        var prodFinalFineWt = ((parseFloat(document.getElementById('sttr_final_purity' + prodCount).value) * prodNetWeight) / 100).toFixed(3);

        if (prodFinalFineWt == '' || prodFinalFineWt == 'NaN') {
            prodFinalFineWt = 0;
        }
    }

    //alert('gmWtInGm @@== ' + document.getElementById('gmWtInGm').value);

    if (typeof (document.getElementById('sttr_cust_wastage' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_cust_wastage' + prodCount) != null)) {
        //
        // ============================================================================================================== //
        // START CODE TO ADD CONDITION FOR CALCULATING CUST WASTAGE WEIGHT BY SPECIFIES WEIGHT @AUTHOR:MADHUREE-18NOV2020 //
        // ============================================================================================================== //
        //
        var prodCustWastBy = '';
        //
        if (typeof (document.getElementById('sttr_cust_wastg_by' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_cust_wastg_by' + prodCount) != null) &&
                typeof (document.getElementById('sttr_cust_wastage' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_cust_wastage' + prodCount) != null) &&
                typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_nt_weight' + prodCount) != null) &&
                typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_gs_weight' + prodCount) != null) &&
                typeof (document.getElementById('sttr_final_fine_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_final_fine_weight' + prodCount) != null) &&
                typeof (document.getElementById('sttr_fine_weight' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_fine_weight' + prodCount) != null)) {

            // PRODUCT MKG CHARGES BY @PRIYANKA-28NOV18
            if (document.getElementById('sttr_cust_wastg_by' + prodCount).value == 'byNetWt') {
                prodCustWastBy = parseFloat(document.getElementById('sttr_nt_weight' + prodCount).value);
            } else if (document.getElementById('sttr_cust_wastg_by' + prodCount).value == 'byGrossWt') {
                prodCustWastBy = parseFloat(document.getElementById('sttr_gs_weight' + prodCount).value);
            } else if (document.getElementById('sttr_cust_wastg_by' + prodCount).value == 'byFFineWt') {
                prodCustWastBy = parseFloat(document.getElementById('sttr_final_fine_weight' + prodCount).value);
            } else if (document.getElementById('sttr_cust_wastg_by' + prodCount).value == 'byFineWt') {
                prodCustWastBy = parseFloat(document.getElementById('sttr_fine_weight' + prodCount).value);
            } else {
                prodCustWastBy = parseFloat(document.getElementById('sttr_nt_weight' + prodCount).value);
            }
        } else {
            prodCustWastBy = parseFloat(document.getElementById('sttr_nt_weight' + prodCount).value);
        }
        //
        // ============================================================================================================ //
        // END CODE TO ADD CONDITION FOR CALCULATING CUST WASTAGE WEIGHT BY SPECIFIES WEIGHT @AUTHOR:MADHUREE-18NOV2020 //
        // ============================================================================================================ //
        //
        // CUSTOMER WASTAGE WEIGHT
        if (document.getElementById('sttr_cust_wastage' + prodCount).value >= 0) { // CUSTOMER WASTAGE WEIGHT IS GREATER THAN ZERO

            if (typeof (document.getElementById('sttr_cust_wastage' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_cust_wastage' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null)) {
                // CALCULATE CUSTOMER WASTAGE WEIGHT
                document.getElementById('sttr_cust_wastage_wt' + prodCount).value = ((parseFloat(prodCustWastBy) * parseFloat(document.getElementById('sttr_cust_wastage' + prodCount).value)) / 100).toFixed(3); // CALCULATE CUSTOMER WASTAGE WEIGHT
            }
            //
            // ============================================================================================================= //
            // START CODE TO ADD CONDITION FOR CALCULATING VALUE ADDED AMOUNT BY SPECIFIES WEIGHT @AUTHOR:MADHUREE-15DEC2020 //
            // ============================================================================================================= //
            //
            var custWastageWtForCal = '';
            //
            if (typeof (document.getElementById('sttr_value_added_by' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_value_added_by' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_cust_wastage' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_cust_wastage' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_nt_weight' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_nt_weight' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_gs_weight' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_final_fine_weight' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_final_fine_weight' + prodCount) != null)) {

                // PRODUCT MKG CHARGES BY @PRIYANKA-28NOV18
                if (document.getElementById('sttr_value_added_by' + prodCount).value == 'byNetWt') {
                    custWastageWtForCal = ((parseFloat(parseFloat(document.getElementById('sttr_nt_weight' + prodCount).value)) * parseFloat(document.getElementById('sttr_cust_wastage' + prodCount).value)) / 100).toFixed(3);
                } else if (document.getElementById('sttr_value_added_by' + prodCount).value == 'byGrossWt') {
                    custWastageWtForCal = ((parseFloat(parseFloat(document.getElementById('sttr_gs_weight' + prodCount).value)) * parseFloat(document.getElementById('sttr_cust_wastage' + prodCount).value)) / 100).toFixed(3);
                } else if (document.getElementById('sttr_value_added_by' + prodCount).value == 'byFineWt') {
                    custWastageWtForCal = ((parseFloat(parseFloat(document.getElementById('sttr_fine_weight' + prodCount).value)) * parseFloat(document.getElementById('sttr_cust_wastage' + prodCount).value)) / 100).toFixed(3);
                } else if (document.getElementById('sttr_value_added_by' + prodCount).value == 'byFFineWt') {
                    custWastageWtForCal = ((parseFloat(parseFloat(document.getElementById('sttr_final_fine_weight' + prodCount).value)) * parseFloat(document.getElementById('sttr_cust_wastage' + prodCount).value)) / 100).toFixed(3);
                } else {
                    custWastageWtForCal = ((parseFloat(parseFloat(document.getElementById('sttr_final_fine_weight' + prodCount).value)) * parseFloat(document.getElementById('sttr_cust_wastage' + prodCount).value)) / 100).toFixed(3);
                }
            } else if (typeof (document.getElementById('sttr_cust_wastage' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_cust_wastage' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null)) {
                custWastageWtForCal = parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value);
            }
            //
            // =========================================================================================================== //
            // END CODE TO ADD CONDITION FOR CALCULATING VALUE ADDED AMOUNT BY SPECIFIES WEIGHT @AUTHOR:MADHUREE-15DEC2020 //
            // =========================================================================================================== //
            //
            //
            //
            //
            // ============================================================================================================= //
            // START CODE TO CHANGE FOR CALCULATING VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021                            //
            // ============================================================================================================= //
            // 
            // PRODUCT TYPE @PRIYANKA-01SEP2021
            if (typeof (document.getElementById('sttr_product_type')) != 'undefined' &&
                    (document.getElementById('sttr_product_type') != null)) {
                // PRODUCT TYPE @PRIYANKA-01SEP2021
                var prodType = document.getElementById('sttr_product_type').value;
            }
            //
            //alert('prodType == ' + prodType);
            //
            if (prodType == '' || prodType == null || prodType == 'undefined') {
                //
                // PRODUCT TYPE IS NULL/BLANK @PRIYANKA-01SEP2021
                // USE PRODUCT COUNT @PRIYANKA-01SEP2021
                if (typeof (document.getElementById('sttr_product_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_product_type' + prodCount) != null)) {
                    // PRODUCT TYPE @PRIYANKA-01SEP2021
                    var prodType = document.getElementById('sttr_product_type' + prodCount).value;
                }
            }
            //
            //
            // IF PRODUCT WEIGHT TYPE IS NULL @PRIYANKA-01SEP2021
            if (typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_gs_weight_type' + prodCount) != null)) {
                // PRODUCT WT TYPE @PRIYANKA-01SEP2021
                var prodWtType = document.getElementById('sttr_gs_weight_type' + prodCount).value;
            }
            //
            //
            //alert('prodType == ' + prodType);
            //alert('prodWtType == ' + prodWtType);
            //alert('sttr_product_sell_rate == ' + document.getElementById('sttr_product_sell_rate' + prodCount).value);
            //alert('sttr_cust_wastage_wt == ' + document.getElementById('sttr_cust_wastage_wt' + prodCount).value);
            //alert('srGmWtInKg == ' + document.getElementById('srGmWtInKg').value);
            //alert('srGmWtInGm == ' + document.getElementById('srGmWtInGm').value);
            //alert('srGmWtInMg == ' + document.getElementById('srGmWtInMg').value);
            //
            //
            // FOR PRODUCT TYPE GOLD @PRIYANKA-01SEP2021
            if (prodType == 'Gold' || prodType == 'GOLD' || prodType == 'gold') {
                //
                //
                // FOR PRODUCT PURCHASE RATE @PRIYANKA-01SEP2021
                if (typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_value_added' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_value_added' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_gs_weight_type' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_product_purchase_rate' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_product_purchase_rate' + prodCount) != null)) {
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'KG') {
                        if (typeof (document.getElementById('gmWtInKg')) != 'undefined' &&
                                (document.getElementById('gmWtInKg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) * document.getElementById('gmWtInKg').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'GM') {
                        if (typeof (document.getElementById('gmWtInGm')) != 'undefined' &&
                                (document.getElementById('gmWtInGm') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) / document.getElementById('gmWtInGm').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'MG') {
                        if (typeof (document.getElementById('gmWtInMg')) != 'undefined' &&
                                (document.getElementById('gmWtInMg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) / document.getElementById('gmWtInMg').value));
                        }
                    }
                }
                //
                //
                // FOR PRODUCT SELL RATE @PRIYANKA-01SEP2021
                if (typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_value_added' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_value_added' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_gs_weight_type' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_product_sell_rate' + prodCount) != null)) {
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'KG') {
                        if (typeof (document.getElementById('gmWtInKg')) != 'undefined' &&
                                (document.getElementById('gmWtInKg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value)) * document.getElementById('gmWtInKg').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'GM') {
                        if (typeof (document.getElementById('gmWtInGm')) != 'undefined' &&
                                (document.getElementById('gmWtInGm') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value)) / document.getElementById('gmWtInGm').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'MG') {
                        if (typeof (document.getElementById('gmWtInMg')) != 'undefined' &&
                                (document.getElementById('gmWtInMg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value)) / document.getElementById('gmWtInMg').value));
                        }
                    }
                }
            }
            //
            //
            //
            // FOR PRODUCT TYPE SILVER @PRIYANKA-01SEP2021
            if (prodType == 'Silver' || prodType == 'SILVER' || prodType == 'silver') {
                //
                //
                // FOR PRODUCT PURCHASE RATE @PRIYANKA-01SEP2021
                if (typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_value_added' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_value_added' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_gs_weight_type' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_product_purchase_rate' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_product_purchase_rate' + prodCount) != null)) {
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'KG') {
                        if (typeof (document.getElementById('srGmWtInKg')) != 'undefined' &&
                                (document.getElementById('srGmWtInKg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) * document.getElementById('srGmWtInKg').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'GM') {
                        if (typeof (document.getElementById('srGmWtInGm')) != 'undefined' &&
                                (document.getElementById('srGmWtInGm') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) / document.getElementById('srGmWtInGm').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'MG') {
                        if (typeof (document.getElementById('srGmWtInMg')) != 'undefined' &&
                                (document.getElementById('srGmWtInMg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_purchase_rate' + prodCount).value)) / document.getElementById('srGmWtInMg').value));
                        }
                    }
                }
                //
                //
                // FOR PRODUCT SELL RATE @PRIYANKA-01SEP2021
                if (typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_value_added' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_value_added' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_gs_weight_type' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_product_sell_rate' + prodCount) != null)) {
                    //
                    //
                    //alert('prodType == ' + prodType);
                    //alert('prodWtType == ' + prodWtType);
                    //alert('sttr_product_sell_rate == ' + document.getElementById('sttr_product_sell_rate' + prodCount).value);
                    //alert('sttr_cust_wastage_wt == ' + document.getElementById('sttr_cust_wastage_wt' + prodCount).value);
                    //alert('srGmWtInKg == ' + document.getElementById('srGmWtInKg').value);
                    //alert('srGmWtInGm == ' + document.getElementById('srGmWtInGm').value);
                    //alert('srGmWtInMg == ' + document.getElementById('srGmWtInMg').value);
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'KG') {
                        if (typeof (document.getElementById('srGmWtInKg')) != 'undefined' &&
                                (document.getElementById('srGmWtInKg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value)) * document.getElementById('srGmWtInKg').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'GM') {
                        if (typeof (document.getElementById('srGmWtInGm')) != 'undefined' &&
                                (document.getElementById('srGmWtInGm') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value)) / document.getElementById('srGmWtInGm').value));
                        }
                    }
                    //
                    // PRODUCT WEIGHT TYPE @PRIYANKA-01SEP2021
                    if (prodWtType == 'MG') {
                        if (typeof (document.getElementById('srGmWtInMg')) != 'undefined' &&
                                (document.getElementById('srGmWtInMg') != null)) {
                            // CALCULATE VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021
                            document.getElementById('sttr_value_added' + prodCount).value = Math_round(((parseFloat(custWastageWtForCal) * parseFloat(document.getElementById('sttr_product_sell_rate' + prodCount).value)) / document.getElementById('srGmWtInMg').value));
                        }
                    }
                }
            }
            // ============================================================================================================= //
            // END CODE TO CHANGE FOR CALCULATING VALUE ADDED AMOUNT @AUTHOR:PRIYANKA-01SEP2021                              //
            // ============================================================================================================= //
        }
    }
    //
    //
    if (typeof (document.getElementById('sttr_value_added' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_value_added' + prodCount) != null)) {
        // VALUE ADDED
        if (document.getElementById('sttr_value_added' + prodCount).value == '' ||
                document.getElementById('sttr_value_added' + prodCount).value == 'NaN') {
            document.getElementById('sttr_value_added' + prodCount).value = 0;
        }
    }
    //
    if (typeof (document.getElementById('sttr_cust_wastage_wt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_cust_wastage_wt' + prodCount) != null)) {
        // CALCULATE PROD SELL FINAL FINE WEIGHT
        var prodSellFinalFineWt = (parseFloat(prodFinalFineWt) + parseFloat(document.getElementById('sttr_cust_wastage_wt' + prodCount).value)).toFixed(3);
    }
    //
    if (typeof (document.getElementById('sttr_sell_final_fine_weight' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_sell_final_fine_weight' + prodCount) != null)) {
        // PROD SELL FINAL FINE WEIGHT
        document.getElementById('sttr_sell_final_fine_weight' + prodCount).value = parseFloat(prodSellFinalFineWt).toFixed(3);
        //
        if (document.getElementById('sttr_sell_final_fine_weight' + prodCount).value == '' ||
                document.getElementById('sttr_sell_final_fine_weight' + prodCount).value == 'NaN') {
            document.getElementById('sttr_sell_final_fine_weight' + prodCount).value = 0;
        }
    }
}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR VALUE ADD & CUSTOMER WASTAGE WEIGHT CALCULATIONS @PRIYANKA-09MAY18
// *************************************************************************************************************************************
//
//
//
//
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR DISCOUNT CALCULATIONS @PRIYANKA-03MAY18
// *************************************************************************************************************************************
function discountCalcFunc(prodCount, discountCal) {

    //alert('sttr_metal_discount_type == ' + document.getElementById('sttr_metal_discount_type' + prodCount).value);

    if (typeof (document.getElementById('sttr_metal_discount_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_discount_per' + prodCount) != null)) {

        // PRODUCT DISCOUNT IN % @PRIYANKA-03MAY18     
        if (document.getElementById('sttr_metal_discount_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_metal_discount_per' + prodCount).value = '0';
        }
    }

    if (typeof (document.getElementById('sttr_metal_discount_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_discount_amt' + prodCount) != null)) {

        // PRODUCT DISCOUNT IN AMT @PRIYANKA-03MAY18  
        if (document.getElementById('sttr_metal_discount_amt' + prodCount).value == 'NaN') {
            document.getElementById('sttr_metal_discount_amt' + prodCount).value = '0.00';
        }
    }

    if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_amt' + prodCount) != null)) {

        // PRODUCT AMT
        var prodTotalAmt = (parseFloat(document.getElementById('sttr_metal_amt' + prodCount).value)).toFixed(2);
    }

    // METAL DISCOUNT TYPE @PRIYANKA-16NOV17
    if (typeof (document.getElementById('sttr_metal_discount_type' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_discount_type' + prodCount) != null)) {

        // METAL DISCOUNT TYPE @PRIYANKA-16NOV17
        var prodDiscType = document.getElementById('sttr_metal_discount_type' + prodCount).value;
    }

    // PROD WEIGHT & PROD WEIGHT TYPE @PRIYANKA-16NOV17
    if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_gs_weight' + prodCount) != null) &&
            typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_gs_weight_type' + prodCount) != null)) {

        // PROD WEIGHT @PRIYANKA-16NOV17
        var productWeight = document.getElementById('sttr_gs_weight' + prodCount).value;
        // PROD WEIGHT TYPE @PRIYANKA-16NOV17
        var productWtType = document.getElementById('sttr_gs_weight_type' + prodCount).value;

    }

    // PROD QUANTITY @PRIYANKA-16NOV17
    if (typeof (document.getElementById('sttr_quantity' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_quantity' + prodCount) != null)) {

        // PROD QUANTITY @PRIYANKA-16NOV17
        var productQTY = document.getElementById('sttr_quantity' + prodCount).value;
    }

    if (typeof (document.getElementById('sttr_metal_discount_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_discount_per' + prodCount) != null) &&
            typeof (document.getElementById('sttr_metal_discount_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_discount_amt' + prodCount) != null)) {

        //alert('sttr_metal_discount_type == ' + document.getElementById('sttr_metal_discount_type' + prodCount).value);

        var metDiscountCalBy = 'sttr_metal_discount_per' + prodCount;

        // START CODE FOR PRODUCT DISCOUNT IN % & PRODUCT DISCOUNT AMT @PRIYANKA-03MAY18     
        if (discountCal == metDiscountCalBy) {

            if (prodTotalAmt > 0) {

                if (typeof (document.getElementById('sttr_metal_discount_per' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_metal_discount_per' + prodCount) != null)) {

                    // PRODUCT DISCOUNT %
                    var sttr_metal_discount_per = document.getElementById('sttr_metal_discount_per' + prodCount).value; // PRODUCT DISCOUNT IN % @PRIYANKA-03MAY18          
                }

                //alert('prodDiscType == ' + prodDiscType);
                //alert('productWtType == ' + productWtType);
                //alert('productQTY == ' + productQTY);

                var prodDiscountAmt = 0;

                // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                if (prodDiscType == 'KG') {
                    // PRODUCT WEIGHT TYPE
                    if (productWtType == 'KG')
                        prodDiscountAmt = parseFloat(parseFloat(sttr_metal_discount_per) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        prodDiscountAmt = parseFloat((parseFloat(sttr_metal_discount_per) / 1000) * parseFloat(productWeight)).toFixed(2);
                    else
                        prodDiscountAmt = parseFloat((parseFloat(sttr_metal_discount_per) / (1000 * 1000)) * parseFloat(productWeight)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (prodDiscType == 'GM') {

                    // PRODUCT WEIGHT TYPE
                    if (productWtType == 'KG')
                        prodDiscountAmt = parseFloat((parseFloat(sttr_metal_discount_per) * 1000) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        prodDiscountAmt = parseFloat(parseFloat(sttr_metal_discount_per) * parseFloat(productWeight)).toFixed(2);
                    else
                        prodDiscountAmt = parseFloat((parseFloat(sttr_metal_discount_per) / 1000) * parseFloat(productWeight)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (prodDiscType == 'MG') {
                    // PRODUCT WEIGHT TYPE
                    if (productWtType == 'KG')
                        prodDiscountAmt = parseFloat((parseFloat(sttr_metal_discount_per) * 1000 * 1000) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        prodDiscountAmt = parseFloat((parseFloat(sttr_metal_discount_per) * 1000) * parseFloat(productWeight)).toFixed(2);
                    else
                        prodDiscountAmt = parseFloat(parseFloat(sttr_metal_discount_per) * parseFloat(productWeight)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (prodDiscType == 'PP') {
                    // PRODUCT WEIGHT TYPE
                    prodDiscountAmt = parseFloat(parseFloat(sttr_metal_discount_per) * parseFloat(productQTY)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (prodDiscType == 'per') {

                    if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_metal_amt' + prodCount) != null)) {

                        // CALCULATE PRODUCT DISCOUNT AMT @PRIYANKA-16NOV17
                        prodDiscountAmt = ((parseFloat(document.getElementById('sttr_metal_amt' + prodCount).value)) * parseFloat(sttr_metal_discount_per) / 100).toFixed(2);
                    }

                }

                if (typeof (document.getElementById('sttr_metal_discount_amt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_metal_discount_amt' + prodCount) != null)) {

                    // PRODUCT DISCOUNT AMT
                    document.getElementById('sttr_metal_discount_amt' + prodCount).value = (parseFloat(prodDiscountAmt)).toFixed(2);
                }

                if (prodDiscountAmt > 0) {

                    if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_metal_amt' + prodCount) != null)) {

                        // PRODUCT VAL
                        document.getElementById('sttr_valuation' + prodCount).value = ((parseFloat(document.getElementById('sttr_metal_amt' + prodCount).value)) - Math_round(parseFloat(prodDiscountAmt))).toFixed(2);
                    }
                }
            }

        } else {

            // START CODE TO CALCULATE PRODUCT DISCOUNT IN % ACCORDING TO PRODUCT DISCOUNT AMT @PRIYANKA-03MAY18        
            if (prodTotalAmt > 0) {

                if (typeof (document.getElementById('sttr_metal_discount_amt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_metal_discount_amt' + prodCount) != null)) {

                    // PRODUCT DISCOUNT AMT @PRIYANKA-03MAY18
                    var prodDiscountAmt = (parseFloat(document.getElementById('sttr_metal_discount_amt' + prodCount).value)).toFixed(2);
                }

                var prodDiscountPer = 0;

                // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                if (prodDiscType == 'KG') {
                    // PRODUCT WEIGHT TYPE
                    if (productWtType == 'KG')
                        prodDiscountPer = parseFloat(parseFloat(prodDiscountAmt) / parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        prodDiscountPer = parseFloat((parseFloat(prodDiscountAmt) * 1000) / parseFloat(productWeight)).toFixed(2);
                    else
                        prodDiscountPer = parseFloat((parseFloat(prodDiscountAmt) / (1000 * 1000)) / parseFloat(productWeight)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (prodDiscType == 'GM') {

                    // PRODUCT WEIGHT TYPE
                    if (productWtType == 'KG')
                        prodDiscountPer = parseFloat((parseFloat(prodDiscountAmt) * 1000) / parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        prodDiscountPer = parseFloat(parseFloat(prodDiscountAmt) / parseFloat(productWeight)).toFixed(2);
                    else
                        prodDiscountPer = parseFloat((parseFloat(prodDiscountAmt) / 1000) / parseFloat(productWeight)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (prodDiscType == 'MG') {
                    // PRODUCT WEIGHT TYPE
                    if (productWtType == 'KG')
                        prodDiscountPer = parseFloat((parseFloat(prodDiscountAmt) / (1000 * 1000)) / parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        prodDiscountPer = parseFloat((parseFloat(prodDiscountAmt) / 1000) / parseFloat(productWeight)).toFixed(2);
                    else
                        prodDiscountPer = parseFloat(parseFloat(prodDiscountAmt) / parseFloat(productWeight)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (prodDiscType == 'PP') {
                    // PRODUCT WEIGHT TYPE
                    prodDiscountPer = parseFloat(parseFloat(prodDiscountAmt) * parseFloat(productQTY)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (prodDiscType == 'per') {

                    // CALCULATE PRODUCT DISCOUNT IN % 
                    var prodDiscountPer = ((parseFloat(prodDiscountAmt) * 100) / parseFloat(prodTotalAmt));

                }

                if (typeof (document.getElementById('sttr_metal_discount_per' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_metal_discount_per' + prodCount) != null)) {

                    // PRODUCT DISCOUNT IN % 
                    document.getElementById('sttr_metal_discount_per' + prodCount).value = parseFloat(prodDiscountPer);
                }

                if (prodDiscountAmt > 0) {

                    if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_metal_amt' + prodCount) != null)) {

                        document.getElementById('sttr_valuation' + prodCount).value = ((parseFloat(document.getElementById('sttr_metal_amt' + prodCount).value)) - parseFloat(prodDiscountAmt)).toFixed(2);
                    }
                }
            }
            // END CODE TO CALCULATE PRODUCT DISCOUNT IN % ACCORDING TO PRODUCT DISCOUNT AMT @PRIYANKA-03MAY18
        }
        // END CODE FOR PRODUCT DISCOUNT IN % & PRODUCT DISCOUNT AMT @PRIYANKA-03MAY18
    }

    if (typeof (document.getElementById('sttr_metal_discount_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_discount_per' + prodCount) != null)) {

        // PRODUCT DISCOUNT IN % @PRIYANKA-03MAY18     
        if (document.getElementById('sttr_metal_discount_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_metal_discount_per' + prodCount).value = '0';
        }
    }

    if (typeof (document.getElementById('sttr_metal_discount_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_discount_amt' + prodCount) != null)) {

        // PRODUCT DISCOUNT IN AMT @PRIYANKA-03MAY18  
        if (document.getElementById('sttr_metal_discount_amt' + prodCount).value == 'NaN' ||
                document.getElementById('sttr_metal_discount_amt' + prodCount).value == '0') {
            document.getElementById('sttr_metal_discount_amt' + prodCount).value = '0.00';
        }
    }


    // *************************************************************************************************************************************
    // *************************************************************************************************************************************
    // *************************************************************************************************************************************


    if (typeof (document.getElementById('sttr_lab_discount_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_lab_discount_per' + prodCount) != null)) {

        // LAB DISCOUNT IN % @PRIYANKA-03MAY18     
        if (document.getElementById('sttr_lab_discount_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_lab_discount_per' + prodCount).value = '0';
        }
    }

    if (typeof (document.getElementById('sttr_lab_discount_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_lab_discount_amt' + prodCount) != null)) {

        // LAB DISCOUNT IN AMT @PRIYANKA-03MAY18  
        if (document.getElementById('sttr_lab_discount_amt' + prodCount).value == 'NaN') {
            document.getElementById('sttr_lab_discount_amt' + prodCount).value = '0.00';
        }
    }

    if (typeof (document.getElementById('sttr_total_lab_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_total_lab_amt' + prodCount) != null)) {

        // TOT LAB AMT
        var labTotalAmt = (parseFloat(document.getElementById('sttr_total_lab_amt' + prodCount).value)).toFixed(2);
    }

    if (typeof (document.getElementById('sttr_lab_discount_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_lab_discount_per' + prodCount) != null) &&
            typeof (document.getElementById('sttr_lab_discount_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_lab_discount_amt' + prodCount) != null)) {

        var labDiscountCalBy = 'sttr_lab_discount_per' + prodCount;

        // START CODE FOR LAB DISCOUNT IN % & LAB DISCOUNT AMT @PRIYANKA-03MAY18     
        if (discountCal == labDiscountCalBy) {

            if (labTotalAmt > 0) {

                if (typeof (document.getElementById('sttr_lab_discount_per' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_lab_discount_per' + prodCount) != null)) {

                    // LAB DISCOUNT IN %
                    var sttr_lab_discount_per = document.getElementById('sttr_lab_discount_per' + prodCount).value; // LAB DISCOUNT IN % @PRIYANKA-03MAY18          
                }

                // LAB DISCOUNT TYPE @PRIYANKA-16NOV17
                if (typeof (document.getElementById('sttr_lab_discount_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_lab_discount_type' + prodCount) != null)) {

                    // LAB DISCOUNT TYPE @PRIYANKA-16NOV17
                    var labDiscType = document.getElementById('sttr_lab_discount_type' + prodCount).value;
                }

                // PROD WEIGHT & PROD WEIGHT TYPE @PRIYANKA-16NOV17
                if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_gs_weight' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_gs_weight_type' + prodCount) != null)) {

                    // PROD WEIGHT @PRIYANKA-16NOV17
                    var productWeight = document.getElementById('sttr_gs_weight' + prodCount).value;
                    // PROD WEIGHT TYPE @PRIYANKA-16NOV17
                    var productWtType = document.getElementById('sttr_gs_weight_type' + prodCount).value;

                }

                // PROD QUANTITY @PRIYANKA-16NOV17
                if (typeof (document.getElementById('sttr_quantity' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_quantity' + prodCount) != null)) {

                    // PROD QUANTITY @PRIYANKA-16NOV17
                    var productQTY = document.getElementById('sttr_quantity' + prodCount).value;
                }


                // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                if (labDiscType == 'KG') {
                    // PRODUCT WEIGHT TYPE
                    if (productWtType == 'KG')
                        var labDiscountAmt = parseFloat(parseFloat(sttr_lab_discount_per) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        var labDiscountAmt = parseFloat((parseFloat(sttr_lab_discount_per) / 1000) * parseFloat(productWeight)).toFixed(2);
                    else
                        var labDiscountAmt = parseFloat((parseFloat(sttr_lab_discount_per) / (1000 * 1000)) * parseFloat(productWeight)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (labDiscType == 'GM') {
                    // PRODUCT WEIGHT TYPE
                    if (productWtType == 'KG')
                        var labDiscountAmt = parseFloat((parseFloat(sttr_lab_discount_per) * 1000) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        var labDiscountAmt = parseFloat(parseFloat(sttr_lab_discount_per) * parseFloat(productWeight)).toFixed(2);
                    else
                        var labDiscountAmt = parseFloat((parseFloat(sttr_lab_discount_per) / 1000) * parseFloat(productWeight)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (labDiscType == 'MG') {
                    // PRODUCT WEIGHT TYPE
                    if (productWtType == 'KG')
                        var labDiscountAmt = parseFloat((parseFloat(sttr_lab_discount_per) * 1000 * 1000) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        var labDiscountAmt = parseFloat((parseFloat(sttr_lab_discount_per) * 1000) * parseFloat(productWeight)).toFixed(2);
                    else
                        var labDiscountAmt = parseFloat(parseFloat(sttr_lab_discount_per) * parseFloat(productWeight)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (labDiscType == 'PP') {
                    // PRODUCT WEIGHT TYPE
                    var labDiscountAmt = parseFloat(parseFloat(sttr_lab_discount_per) * parseFloat(productQTY)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (labDiscType == 'per') {

                    if (typeof (document.getElementById('sttr_total_lab_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_amt' + prodCount) != null)) {

                        // CALCULATE PRODUCT DISCOUNT AMT @PRIYANKA-16NOV17
                        var labDiscountAmt = ((parseFloat(document.getElementById('sttr_total_lab_amt' + prodCount).value)) * parseFloat(sttr_lab_discount_per) / 100).toFixed(2);
                    }
                }

                if (typeof (document.getElementById('sttr_lab_discount_amt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_lab_discount_amt' + prodCount) != null)) {

                    // LAB DISCOUNT AMT
                    document.getElementById('sttr_lab_discount_amt' + prodCount).value = (parseFloat(labDiscountAmt)).toFixed(2);
                }

                if (labDiscountAmt > 0) {

                    if (typeof (document.getElementById('sttr_total_lab_charges' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_charges' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_total_lab_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_amt' + prodCount) != null)) {

                        // TOTAL LAB CHARGES
                        document.getElementById('sttr_total_lab_charges' + prodCount).value = ((parseFloat(document.getElementById('sttr_total_lab_amt' + prodCount).value)) - Math_round(parseFloat(labDiscountAmt))).toFixed(2);
                    }
                }
            }

        } else {

            // START CODE TO CALCULATE LAB DISCOUNT IN % ACCORDING TO LAB DISCOUNT AMT @PRIYANKA-03MAY18        
            if (labTotalAmt > 0) {

                if (typeof (document.getElementById('sttr_lab_discount_amt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_lab_discount_amt' + prodCount) != null)) {

                    // LAB DISCOUNT AMT @PRIYANKA-03MAY18
                    var labDiscountAmt = (parseFloat(document.getElementById('sttr_lab_discount_amt' + prodCount).value)).toFixed(2);
                }

                // CALCULATE LAB DISCOUNT IN %
                var labDiscountPer = ((parseFloat(labDiscountAmt) * 100) / parseFloat(labTotalAmt));

                if (typeof (document.getElementById('sttr_lab_discount_per' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_lab_discount_per' + prodCount) != null)) {

                    // LAB DISCOUNT IN %
                    document.getElementById('sttr_lab_discount_per' + prodCount).value = parseFloat(labDiscountPer);
                }

                if (labDiscountAmt > 0) {

                    if (typeof (document.getElementById('sttr_total_lab_charges' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_charges' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_total_lab_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_amt' + prodCount) != null)) {

                        // TOTAL LAB CHARGES
                        document.getElementById('sttr_total_lab_charges' + prodCount).value = ((parseFloat(document.getElementById('sttr_total_lab_amt' + prodCount).value)) - parseFloat(labDiscountAmt)).toFixed(2);
                    }
                }
            }
            // END CODE TO CALCULATE LAB DISCOUNT IN % ACCORDING TO LAB DISCOUNT AMT @PRIYANKA-03MAY18
        }
        // END CODE FOR LAB DISCOUNT IN % & LAB DISCOUNT AMT @PRIYANKA-03MAY18
    }

    if (typeof (document.getElementById('sttr_lab_discount_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_lab_discount_per' + prodCount) != null)) {

        // LAB DISCOUNT IN % @PRIYANKA-03MAY18   
        if (document.getElementById('sttr_lab_discount_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_lab_discount_per' + prodCount).value = '0';
        }
    }

    if (typeof (document.getElementById('sttr_lab_discount_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_lab_discount_amt' + prodCount) != null)) {

        // LAB DISCOUNT IN AMT @PRIYANKA-03MAY18   
        if (document.getElementById('sttr_lab_discount_amt' + prodCount).value == 'NaN' ||
                document.getElementById('sttr_lab_discount_amt' + prodCount).value == '0') {
            document.getElementById('sttr_lab_discount_amt' + prodCount).value = '0.00';
        }
    }

    if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + prodCount) != null) &&
            typeof (document.getElementById('sttr_total_lab_charges' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_total_lab_charges' + prodCount) != null) &&
            typeof (document.getElementById('sttr_total_other_charges' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_total_other_charges' + prodCount) != null)) {

        // TAXABLE AMOUNT @PRIYANKA-03MAY18  
        document.getElementById('sttr_final_taxable_amt' + prodCount).value = (parseFloat(document.getElementById('sttr_valuation' + prodCount).value) +
                parseFloat(document.getElementById('sttr_total_lab_charges' + prodCount).value) + parseFloat(document.getElementById('sttr_total_other_charges' + prodCount).value)).toFixed(2);
    }


    // *************************************************************************************************************************************
    // *************************************************************************************************************************************
    // *************************************************************************************************************************************


    if (typeof (document.getElementById('sttr_mkg_discount_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_discount_per' + prodCount) != null)) {

        // MKG DISCOUNT IN % @PRIYANKA-28NOV18   
        if (document.getElementById('sttr_mkg_discount_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_mkg_discount_per' + prodCount).value = '0';
        }
    }

    if (typeof (document.getElementById('sttr_mkg_discount_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_discount_amt' + prodCount) != null)) {

        // MKG DISCOUNT IN AMT @PRIYANKA-28NOV18   
        if (document.getElementById('sttr_mkg_discount_amt' + prodCount).value == 'NaN') {
            document.getElementById('sttr_mkg_discount_amt' + prodCount).value = '0.00';
        }
    }

    if (typeof (document.getElementById('sttr_total_making_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_total_making_amt' + prodCount) != null)) {

        // TOT MKG AMT @PRIYANKA-28NOV18  
        var mkgTotalAmt = (parseFloat(document.getElementById('sttr_total_making_amt' + prodCount).value)).toFixed(2);
    }

    if (typeof (document.getElementById('sttr_mkg_discount_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_discount_per' + prodCount) != null) &&
            typeof (document.getElementById('sttr_mkg_discount_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_discount_amt' + prodCount) != null)) {

        var mkgDiscountCalBy = 'sttr_mkg_discount_per' + prodCount;

        // START CODE FOR MKG DISCOUNT IN % & MKG DISCOUNT AMT @PRIYANKA-28NOV18    
        if (discountCal == mkgDiscountCalBy) {

            if (mkgTotalAmt > 0) {

                if (typeof (document.getElementById('sttr_mkg_discount_per' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_mkg_discount_per' + prodCount) != null)) {

                    // MKG DISCOUNT IN % @PRIYANKA-28NOV18
                    var sttr_mkg_discount_per = document.getElementById('sttr_mkg_discount_per' + prodCount).value;
                }

                // MKG DISCOUNT TYPE @PRIYANKA-28NOV18
                if (typeof (document.getElementById('sttr_mkg_discount_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_mkg_discount_type' + prodCount) != null)) {

                    // MKG DISCOUNT TYPE @PRIYANKA-28NOV18
                    var mkgDiscType = document.getElementById('sttr_mkg_discount_type' + prodCount).value;
                }

                // PROD WEIGHT & PROD WEIGHT TYPE @PRIYANKA-16NOV17
                if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_gs_weight' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_gs_weight_type' + prodCount) != null)) {

                    // PROD WEIGHT @PRIYANKA-16NOV17
                    var productWeight = document.getElementById('sttr_gs_weight' + prodCount).value;
                    // PROD WEIGHT TYPE @PRIYANKA-16NOV17
                    var productWtType = document.getElementById('sttr_gs_weight_type' + prodCount).value;

                }

                // PROD QUANTITY @PRIYANKA-16NOV17
                if (typeof (document.getElementById('sttr_quantity' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_quantity' + prodCount) != null)) {

                    // PROD QUANTITY @PRIYANKA-16NOV17
                    var productQTY = document.getElementById('sttr_quantity' + prodCount).value;
                }


                // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                if (mkgDiscType == 'KG') {
                    // PRODUCT WEIGHT TYPE
                    if (productWtType == 'KG')
                        mkgDiscountAmt = parseFloat(parseFloat(sttr_mkg_discount_per) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        mkgDiscountAmt = parseFloat((parseFloat(sttr_mkg_discount_per) / 1000) * parseFloat(productWeight)).toFixed(2);
                    else
                        mkgDiscountAmt = parseFloat((parseFloat(sttr_mkg_discount_per) / (1000 * 1000)) * parseFloat(productWeight)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (mkgDiscType == 'GM') {
                    // PRODUCT WEIGHT TYPE
                    if (productWtType == 'KG')
                        mkgDiscountAmt = parseFloat((parseFloat(sttr_mkg_discount_per) * 1000) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        mkgDiscountAmt = parseFloat(parseFloat(sttr_mkg_discount_per) * parseFloat(productWeight)).toFixed(2);
                    else
                        mkgDiscountAmt = parseFloat((parseFloat(sttr_mkg_discount_per) / 1000) * parseFloat(productWeight)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (mkgDiscType == 'MG') {
                    // PRODUCT WEIGHT TYPE
                    if (productWtType == 'KG')
                        mkgDiscountAmt = parseFloat((parseFloat(sttr_mkg_discount_per) * 1000 * 1000) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        mkgDiscountAmt = parseFloat((parseFloat(sttr_mkg_discount_per) * 1000) * parseFloat(productWeight)).toFixed(2);
                    else
                        mkgDiscountAmt = parseFloat(parseFloat(sttr_mkg_discount_per) * parseFloat(productWeight)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-16NOV17
                } else if (mkgDiscType == 'PP') {
                    // PRODUCT WEIGHT TYPE
                    mkgDiscountAmt = parseFloat(parseFloat(sttr_mkg_discount_per) * parseFloat(productQTY)).toFixed(2);

                    // PROD DISCOUNT TYPE @PRIYANKA-28NOV18    
                } else if (mkgDiscType == 'per') {

                    if (typeof (document.getElementById('sttr_total_making_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_making_amt' + prodCount) != null)) {

                        // CALCULATE PRODUCT DISCOUNT AMT @PRIYANKA-28NOV18    
                        mkgDiscountAmt = ((parseFloat(document.getElementById('sttr_total_making_amt' + prodCount).value)) * parseFloat(sttr_mkg_discount_per) / 100).toFixed(2);
                    }
                }

                if (typeof (document.getElementById('sttr_mkg_discount_amt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_mkg_discount_amt' + prodCount) != null)) {

                    // MKG DISCOUNT AMT @PRIYANKA-28NOV18    
                    document.getElementById('sttr_mkg_discount_amt' + prodCount).value = (parseFloat(mkgDiscountAmt)).toFixed(2);
                }

                if (mkgDiscountAmt > 0) {

                    if (typeof (document.getElementById('sttr_total_making_charges' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_making_charges' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_total_making_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_making_amt' + prodCount) != null)) {

                        // TOTAL MKG CHARGES @PRIYANKA-28NOV18    
                        document.getElementById('sttr_total_making_charges' + prodCount).value = ((parseFloat(document.getElementById('sttr_total_making_amt' + prodCount).value)) - (parseFloat(mkgDiscountAmt))).toFixed(2);
                    }
                }
            }

        } else {

            // START CODE TO CALCULATE MKG DISCOUNT IN % ACCORDING TO MKG DISCOUNT AMT @PRIYANKA-28NOV18       
            if (mkgTotalAmt > 0) {

                if (typeof (document.getElementById('sttr_mkg_discount_amt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_mkg_discount_amt' + prodCount) != null)) {

                    // MKG DISCOUNT AMT @PRIYANKA-28NOV18 
                    var mkgDiscountAmt = (parseFloat(document.getElementById('sttr_mkg_discount_amt' + prodCount).value)).toFixed(2);
                }

                // CALCULATE MKG DISCOUNT IN % @PRIYANKA-28NOV18 
                var mkgDiscountPer = ((parseFloat(mkgDiscountAmt) * 100) / parseFloat(mkgTotalAmt));

                if (typeof (document.getElementById('sttr_mkg_discount_per' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_mkg_discount_per' + prodCount) != null)) {

                    // MKG DISCOUNT IN % @PRIYANKA-28NOV18 
                    document.getElementById('sttr_mkg_discount_per' + prodCount).value = parseFloat(mkgDiscountPer);
                }

                if (mkgDiscountAmt > 0) {

                    if (typeof (document.getElementById('sttr_total_making_charges' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_making_charges' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_total_making_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_making_amt' + prodCount) != null)) {

                        // TOTAL MKG CHARGES @PRIYANKA-28NOV18 
                        document.getElementById('sttr_total_making_charges' + prodCount).value = ((parseFloat(document.getElementById('sttr_total_making_amt' + prodCount).value)) - parseFloat(mkgDiscountAmt)).toFixed(2);
                    }
                }
            }
            // END CODE TO CALCULATE MKG DISCOUNT IN % ACCORDING TO MKG DISCOUNT AMT @PRIYANKA-28NOV18 
        }
        // END CODE FOR MKG DISCOUNT IN % & MKG DISCOUNT AMT @PRIYANKA-28NOV18 
    }

    if (typeof (document.getElementById('sttr_mkg_discount_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_discount_per' + prodCount) != null)) {

        // MKG DISCOUNT IN % @PRIYANKA-28NOV18      
        if (document.getElementById('sttr_mkg_discount_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_mkg_discount_per' + prodCount).value = '0';
        }
    }

    if (typeof (document.getElementById('sttr_mkg_discount_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_discount_amt' + prodCount) != null)) {

        // MKG DISCOUNT IN AMT @PRIYANKA-28NOV18     
        if (document.getElementById('sttr_mkg_discount_amt' + prodCount).value == 'NaN' ||
                document.getElementById('sttr_mkg_discount_amt' + prodCount).value == '0') {
            document.getElementById('sttr_mkg_discount_amt' + prodCount).value = '0.00';
        }
    }

    if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + prodCount) != null) &&
            typeof (document.getElementById('sttr_total_lab_charges' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_total_lab_charges' + prodCount) != null) &&
            typeof (document.getElementById('sttr_total_other_charges' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_total_other_charges' + prodCount) != null)) {

        document.getElementById('sttr_final_taxable_amt' + prodCount).value = (parseFloat(document.getElementById('sttr_valuation' + prodCount).value) +
                parseFloat(document.getElementById('sttr_total_lab_charges' + prodCount).value)
                + parseFloat(document.getElementById('sttr_total_other_charges' + prodCount).value)).toFixed(2);

    } else if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + prodCount) != null) &&
            typeof (document.getElementById('sttr_total_lab_charges' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_total_lab_charges' + prodCount) != null)) {

        document.getElementById('sttr_final_taxable_amt' + prodCount).value = (parseFloat(document.getElementById('sttr_valuation' + prodCount).value) +
                parseFloat(document.getElementById('sttr_total_lab_charges' + prodCount).value)).toFixed(2);

    } else if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_final_taxable_amt' + prodCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + prodCount) != null) &&
            typeof (document.getElementById('sttr_total_making_charges' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_total_making_charges' + prodCount) != null) &&
            typeof (document.getElementById('sttr_total_other_charges' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_total_other_charges' + prodCount) != null)) {

        document.getElementById('sttr_final_taxable_amt' + prodCount).value = (parseFloat(document.getElementById('sttr_valuation' + prodCount).value) +
                parseFloat(document.getElementById('sttr_total_making_charges' + prodCount).value)
                + parseFloat(document.getElementById('sttr_total_other_charges' + prodCount).value)).toFixed(2);

    }

    if (typeof (document.getElementById('sttr_final_taxable_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_final_taxable_amt' + prodCount) != null)) {
        // TAXABLE AMOUNT @PRIYANKA-03MAY18   
        if (document.getElementById('sttr_final_taxable_amt' + prodCount).value == 'NaN') {
            document.getElementById('sttr_final_taxable_amt' + prodCount).value = '0.00';
        }
    }


    // *************************************************************************************************************************************
    // *************************************************************************************************************************************
    // *************************************************************************************************************************************


    if (typeof (document.getElementById('sttr_stone_discount_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_per' + prodCount) != null)) {
        // CRYSTAL DISCOUNT IN % @PRIYANKA-29JAN19
        if (document.getElementById('sttr_stone_discount_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_stone_discount_per' + prodCount).value = '0';
        }
    }
    //
    if (typeof (document.getElementById('sttr_stone_discount_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_amt' + prodCount) != null)) {
        // CRYSTAL DISCOUNT IN AMT @PRIYANKA-29JAN19
        if (document.getElementById('sttr_stone_discount_amt' + prodCount).value == 'NaN') {
            document.getElementById('sttr_stone_discount_amt' + prodCount).value = '0.00';
        }
    }
    //
    if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_amt' + prodCount) != null)) {
        // CRYSTAL AMT @PRIYANKA-29JAN19
        var prodTotalAmt = (parseFloat(document.getElementById('sttr_metal_amt' + prodCount).value)).toFixed(2);
    }

    //
    var stoneDiscountCalBy = 'sttr_stone_discount_per' + prodCount;
    var stoneLabDiscountCalBy = 'sttr_lab_discount_per' + prodCount;
    //

    // STONE DISCOUNT TYPE @PRIYANKA-29JAN19
    if (typeof (document.getElementById('sttr_stone_discount_type' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_type' + prodCount) != null)) {

        // STONE DISCOUNT TYPE @PRIYANKA-29JAN19
        var stoneDiscType = document.getElementById('sttr_stone_discount_type' + prodCount).value;
    }


    // PROD WEIGHT & PROD WEIGHT TYPE @PRIYANKA-29JAN19
    if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_gs_weight' + prodCount) != null) &&
            typeof (document.getElementById('sttr_gs_weight_type' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_gs_weight_type' + prodCount) != null)) {

        // PROD WEIGHT @PRIYANKA-29JAN19
        var productWeight = document.getElementById('sttr_gs_weight' + prodCount).value;
        // PROD WEIGHT TYPE @PRIYANKA-29JAN19
        var productWtType = document.getElementById('sttr_gs_weight_type' + prodCount).value;

    }

    // PROD QUANTITY @PRIYANKA-29JAN19
    if (typeof (document.getElementById('sttr_quantity' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_quantity' + prodCount) != null)) {

        // PROD QUANTITY @PRIYANKA-29JAN19
        var productQTY = document.getElementById('sttr_quantity' + prodCount).value;
    }

    //
    if (typeof (document.getElementById('sttr_stone_discount_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_per' + prodCount) != null) &&
            typeof (document.getElementById('sttr_stone_discount_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_amt' + prodCount) != null)) {
        //
        // START CODE FOR CRYSTAL DISCOUNT IN % & CRYSTAL DISCOUNT AMT @PRIYANKA-29JAN19   
        if (discountCal == stoneDiscountCalBy) {
            //
            //alert('discountCal == ' + discountCal);
            //alert('stoneDiscountCalBy == ' + stoneDiscountCalBy);
            //
            if (prodTotalAmt > 0) {
                //
                if (typeof (document.getElementById('sttr_stone_discount_per' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_stone_discount_per' + prodCount) != null)) {
                    //
                    // CRYSTAL DISCOUNT % @PRIYANKA-29JAN19
                    var sttr_stone_discount_per = document.getElementById('sttr_stone_discount_per' + prodCount).value; // PRODUCT DISCOUNT IN % @PRIYANKA-29JAN19
                }


                var stoneDiscountAmt = 0;

                // STONE LAB DISCOUNT TYPE @PRIYANKA-29JAN19
                if (stoneDiscType == 'KG') {
                    // STONE WEIGHT TYPE
                    if (productWtType == 'KG')
                        stoneDiscountAmt = parseFloat(parseFloat(sttr_stone_discount_per) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        stoneDiscountAmt = parseFloat((parseFloat(sttr_stone_discount_per) / 1000) * parseFloat(productWeight)).toFixed(2);
                    else
                        stoneDiscountAmt = parseFloat((parseFloat(sttr_stone_discount_per) / (1000 * 1000)) * parseFloat(productWeight)).toFixed(2);

                    // STONE LAB DISCOUNT TYPE @PRIYANKA-29JAN19
                } else if (stoneDiscType == 'GM') {

                    // STONE WEIGHT TYPE
                    if (productWtType == 'KG')
                        stoneDiscountAmt = parseFloat((parseFloat(sttr_stone_discount_per) * 1000) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        stoneDiscountAmt = parseFloat(parseFloat(sttr_stone_discount_per) * parseFloat(productWeight)).toFixed(2);
                    else
                        stoneDiscountAmt = parseFloat((parseFloat(sttr_stone_discount_per) / 1000) * parseFloat(productWeight)).toFixed(2);

                    // STONE LAB DISCOUNT TYPE @PRIYANKA-29JAN19
                } else if (stoneDiscType == 'MG') {
                    // STONE WEIGHT TYPE
                    if (productWtType == 'KG')
                        stoneDiscountAmt = parseFloat((parseFloat(sttr_stone_discount_per) * 1000 * 1000) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        stoneDiscountAmt = parseFloat((parseFloat(sttr_stone_discount_per) * 1000) * parseFloat(productWeight)).toFixed(2);
                    else
                        stoneDiscountAmt = parseFloat(parseFloat(sttr_stone_discount_per) * parseFloat(productWeight)).toFixed(2);

                    // STONE LAB DISCOUNT TYPE @PRIYANKA-29JAN19
                } else if (stoneDiscType == 'PP') {
                    // STON WEIGHT TYPE
                    stoneDiscountAmt = parseFloat(parseFloat(sttr_stone_discount_per) * parseFloat(productQTY)).toFixed(2);

                    // STONE LAB DISCOUNT TYPE @PRIYANKA-29JAN19
                } else if (stoneDiscType == 'per') {

                    if (typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_metal_amt' + prodCount) != null)) {

                        // CALCULATE STONE LAB DISCOUNT AMT @PRIYANKA-29JAN19
                        stoneDiscountAmt = ((parseFloat(document.getElementById('sttr_metal_amt' + prodCount).value)) * parseFloat(sttr_stone_discount_per) / 100).toFixed(2);
                    }

                }

                //
                if (typeof (document.getElementById('sttr_stone_discount_amt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_stone_discount_amt' + prodCount) != null)) {
                    //
                    // CRYSTAL DISCOUNT AMT @PRIYANKA-29JAN19
                    document.getElementById('sttr_stone_discount_amt' + prodCount).value = (parseFloat(stoneDiscountAmt)).toFixed(2);
                }
                //
                if (stoneDiscountAmt > 0) {
                    //
                    if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_metal_amt' + prodCount) != null)) {
                        //
                        // CRYSTAL VAL @PRIYANKA-29JAN19
                        document.getElementById('sttr_valuation' + prodCount).value = ((parseFloat(document.getElementById('sttr_metal_amt' + prodCount).value)) -
                                (parseFloat(stoneDiscountAmt))).toFixed(2);
                    }

                } else {
                    //
                    if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_metal_amt' + prodCount) != null)) {
                        //
                        // CRYSTAL VAL @PRIYANKA-29JAN19
                        document.getElementById('sttr_valuation' + prodCount).value = (parseFloat(document.getElementById('sttr_metal_amt' + prodCount).value)).toFixed(2);
                    }
                }
            }
            //
        } else if (discountCal != stoneDiscountCalBy && discountCal != stoneLabDiscountCalBy) {
            //
            // START CODE TO CALCULATE CRYSTAL DISCOUNT IN % ACCORDING TO CRYSTAL DISCOUNT AMT @PRIYANKA-29JAN19             
            if (prodTotalAmt > 0) {
                //
                if (typeof (document.getElementById('sttr_stone_discount_amt' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_stone_discount_amt' + prodCount) != null)) {
                    //
                    // CRYSTAL DISCOUNT AMT @PRIYANKA-29JAN19    
                    var stoneDiscountAmt = (parseFloat(document.getElementById('sttr_stone_discount_amt' + prodCount).value)).toFixed(2);
                }

                // CALCULATE CRYSTAL DISCOUNT IN % @PRIYANKA-29JAN19
                var stoneDiscountPer = ((parseFloat(stoneDiscountAmt) * 100) / parseFloat(prodTotalAmt));

                if (typeof (document.getElementById('sttr_stone_discount_per' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_stone_discount_per' + prodCount) != null)) {

                    // CRYSTAL DISCOUNT IN % @PRIYANKA-29JAN19
                    document.getElementById('sttr_stone_discount_per' + prodCount).value = parseFloat(stoneDiscountPer);
                }

                if (stoneDiscountAmt > 0) {

                    if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_metal_amt' + prodCount) != null)) {
                        document.getElementById('sttr_valuation' + prodCount).value = ((parseFloat(document.getElementById('sttr_metal_amt' + prodCount).value)) -
                                parseFloat(stoneDiscountAmt)).toFixed(2);
                    }

                } else {

                    if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_metal_amt' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_metal_amt' + prodCount) != null)) {
                        document.getElementById('sttr_valuation' + prodCount).value = (parseFloat(document.getElementById('sttr_metal_amt' + prodCount).value)).toFixed(2);
                    }
                }

            }
            // END CODE TO CALCULATE CRYSTAL DISCOUNT IN % ACCORDING TO CRYSTAL DISCOUNT AMT @PRIYANKA-29JAN19       
        }
        // END CODE FOR CRYSTAL DISCOUNT IN % & CRYSTAL DISCOUNT AMT @PRIYANKA-29JAN19      

    }

    if (typeof (document.getElementById('sttr_stone_discount_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_per' + prodCount) != null)) {
        // CRYSTAL DISCOUNT IN % @PRIYANKA-29JAN19    
        if (document.getElementById('sttr_stone_discount_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_stone_discount_per' + prodCount).value = '0';
        }
    }

    if (typeof (document.getElementById('sttr_stone_discount_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_amt' + prodCount) != null)) {
        // CRYSTAL DISCOUNT IN AMT @PRIYANKA-29JAN19  
        if (document.getElementById('sttr_stone_discount_amt' + prodCount).value == 'NaN' ||
                document.getElementById('sttr_stone_discount_amt' + prodCount).value == '0') {
            document.getElementById('sttr_stone_discount_amt' + prodCount).value = '0.00';
        }
    }

}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR DISCOUNT CALCULATIONS @PRIYANKA-03MAY18
// *************************************************************************************************************************************


// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR TAX CALCULATIONS @PRIYANKA-30APR18
// *************************************************************************************************************************************
function taxCalcFunc(prodCount, discountCal) {

    //var prodCount = document.getElementById('noOfProd').value;

    if (typeof (document.getElementById('sttr_mkg_cgst_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_cgst_per' + prodCount) != null)) {
        // LAB/MKG CGST IN % @PRIYANKA-30APR18
        if (document.getElementById('sttr_mkg_cgst_per' + prodCount).value == '' ||
                document.getElementById('sttr_mkg_cgst_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_mkg_cgst_per' + prodCount).value = 0;
        }
    }

    if (typeof (document.getElementById('sttr_mkg_sgst_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_sgst_per' + prodCount) != null)) {
        // LAB/MKG SGST IN % @PRIYANKA-30APR18
        if (document.getElementById('sttr_mkg_sgst_per' + prodCount).value == '' ||
                document.getElementById('sttr_mkg_sgst_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_mkg_sgst_per' + prodCount).value = 0;
        }
    }

    if (typeof (document.getElementById('sttr_mkg_igst_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_igst_per' + prodCount) != null)) {
        // LAB/MKG IGST IN % @PRIYANKA-30APR18
        if (document.getElementById('sttr_mkg_igst_per' + prodCount).value == '' ||
                document.getElementById('sttr_mkg_igst_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_mkg_igst_per' + prodCount).value = 0;
        }
    }

    if (typeof (document.getElementById('sttr_total_lab_charges' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_total_lab_charges' + prodCount) != null)) {

        if (document.getElementById('sttr_total_lab_charges' + prodCount).value > 0) { // TOTAL LAB CHARGES IS GREATER THAN ZERO

            if (typeof (document.getElementById('sttr_mkg_cgst_per' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_mkg_cgst_per' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_mkg_cgst_chrg' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_mkg_cgst_chrg' + prodCount) != null)) {

                // CALCULATE LAB/MKG CGST AMT => ((TOTAL LAB/MKG CHARGES * LAB/MKG CGST IN %) / 100) @PRIYANKA-30APR18
                if (document.getElementById('sttr_mkg_cgst_per' + prodCount).value != '') {
                    document.getElementById('sttr_mkg_cgst_chrg' + prodCount).value = (parseFloat(document.getElementById('sttr_total_lab_charges' + prodCount).value) *
                            (parseFloat(document.getElementById('sttr_mkg_cgst_per' + prodCount).value) / 100)).toFixed(2);
                }
            }

            if (typeof (document.getElementById('sttr_mkg_sgst_per' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_mkg_sgst_per' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_mkg_sgst_chrg' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_mkg_sgst_chrg' + prodCount) != null)) {

                // CALCULATE LAB/MKG CGST AMT => ((TOTAL LAB/MKG CHARGES * LAB/MKG SGST IN %) / 100) @PRIYANKA-30APR18
                if (document.getElementById('sttr_mkg_sgst_per' + prodCount).value != '') {
                    document.getElementById('sttr_mkg_sgst_chrg' + prodCount).value = (parseFloat(document.getElementById('sttr_total_lab_charges' + prodCount).value) *
                            (parseFloat(document.getElementById('sttr_mkg_sgst_per' + prodCount).value) / 100)).toFixed(2);
                }
            }

            if (typeof (document.getElementById('sttr_mkg_igst_per' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_mkg_igst_per' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_mkg_igst_chrg' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_mkg_igst_chrg' + prodCount) != null)) {

                // CALCULATE LAB/MKG CGST AMT => ((TOTAL LAB/MKG CHARGES * LAB/MKG IGST IN %) / 100) @PRIYANKA-30APR18
                if (document.getElementById('sttr_mkg_igst_per' + prodCount).value != '') {
                    document.getElementById('sttr_mkg_igst_chrg' + prodCount).value = (parseFloat(document.getElementById('sttr_total_lab_charges' + prodCount).value) *
                            (parseFloat(document.getElementById('sttr_mkg_igst_per' + prodCount).value) / 100)).toFixed(2);
                }
            }
        }
    }

    if (typeof (document.getElementById('sttr_total_making_charges' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_total_making_charges' + prodCount) != null)) {

        if (document.getElementById('sttr_total_making_charges' + prodCount).value > 0) { // TOTAL MKG CHARGES IS GREATER THAN ZERO

            if (typeof (document.getElementById('sttr_mkg_cgst_per' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_mkg_cgst_per' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_mkg_cgst_chrg' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_mkg_cgst_chrg' + prodCount) != null)) {

                // CALCULATE MKG CGST AMT => ((TOTAL MKG CHARGES * MKG CGST IN %) / 100) @PRIYANKA-28NOV18
                if (document.getElementById('sttr_mkg_cgst_per' + prodCount).value != '') {
                    document.getElementById('sttr_mkg_cgst_chrg' + prodCount).value = (parseFloat(document.getElementById('sttr_total_making_charges' + prodCount).value) *
                            (parseFloat(document.getElementById('sttr_mkg_cgst_per' + prodCount).value) / 100)).toFixed(2);
                }
            }

            if (typeof (document.getElementById('sttr_mkg_sgst_per' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_mkg_sgst_per' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_mkg_sgst_chrg' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_mkg_sgst_chrg' + prodCount) != null)) {

                // CALCULATE MKG CGST AMT => ((TOTAL MKG CHARGES * MKG SGST IN %) / 100) @PRIYANKA-28NOV18
                if (document.getElementById('sttr_mkg_sgst_per' + prodCount).value != '') {
                    document.getElementById('sttr_mkg_sgst_chrg' + prodCount).value = (parseFloat(document.getElementById('sttr_total_making_charges' + prodCount).value) *
                            (parseFloat(document.getElementById('sttr_mkg_sgst_per' + prodCount).value) / 100)).toFixed(2);
                }
            }

            if (typeof (document.getElementById('sttr_mkg_igst_per' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_mkg_igst_per' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_mkg_igst_chrg' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_mkg_igst_chrg' + prodCount) != null)) {

                // CALCULATE MKG CGST AMT => ((TOTAL MKG CHARGES * MKG IGST IN %) / 100) @PRIYANKA-28NOV18
                if (document.getElementById('sttr_mkg_igst_per' + prodCount).value != '') {
                    document.getElementById('sttr_mkg_igst_chrg' + prodCount).value = (parseFloat(document.getElementById('sttr_total_making_charges' + prodCount).value) *
                            (parseFloat(document.getElementById('sttr_mkg_igst_per' + prodCount).value) / 100)).toFixed(2);
                }
            }
        }
    }

    if (typeof (document.getElementById('sttr_mkg_cgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_cgst_chrg' + prodCount) != null)) {
        // LAB/MKG CGST CHRG @PRIYANKA-30APR18
        if (document.getElementById('sttr_mkg_cgst_chrg' + prodCount).value == '' ||
                document.getElementById('sttr_mkg_cgst_chrg' + prodCount).value == 'NaN') {
            document.getElementById('sttr_mkg_cgst_chrg' + prodCount).value = 0;
        }
    }

    if (typeof (document.getElementById('sttr_mkg_sgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_sgst_chrg' + prodCount) != null)) {
        // LAB/MKG SGST CHRG @PRIYANKA-30APR18
        if (document.getElementById('sttr_mkg_sgst_chrg' + prodCount).value == '' ||
                document.getElementById('sttr_mkg_sgst_chrg' + prodCount).value == 'NaN') {
            document.getElementById('sttr_mkg_sgst_chrg' + prodCount).value = 0;
        }
    }

    if (typeof (document.getElementById('sttr_mkg_igst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_igst_chrg' + prodCount) != null)) {
        // LAB/MKG IGST CHRG @PRIYANKA-30APR18
        if (document.getElementById('sttr_mkg_igst_chrg' + prodCount).value == '' ||
                document.getElementById('sttr_mkg_igst_chrg' + prodCount).value == 'NaN') {
            document.getElementById('sttr_mkg_igst_chrg' + prodCount).value = 0;
        }
    }


    // *************************************************************************************************************************************
    // *************************************************************************************************************************************
    // *************************************************************************************************************************************


    if (typeof (document.getElementById('sttr_tot_price_cgst_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_cgst_per' + prodCount) != null)) {
        // PROD CGST IN % @PRIYANKA-30APR18
        if (document.getElementById('sttr_tot_price_cgst_per' + prodCount).value == '' ||
                document.getElementById('sttr_tot_price_cgst_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_tot_price_cgst_per' + prodCount).value = 0;
        }
    }

    if (typeof (document.getElementById('sttr_tot_price_sgst_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_sgst_per' + prodCount) != null)) {
        // PROD SGST IN % @PRIYANKA-30APR18
        if (document.getElementById('sttr_tot_price_sgst_per' + prodCount).value == '' ||
                document.getElementById('sttr_tot_price_sgst_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_tot_price_sgst_per' + prodCount).value = 0;
        }
    }

    if (typeof (document.getElementById('sttr_tot_price_igst_per' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_igst_per' + prodCount) != null)) {
        // PROD IGST IN % @PRIYANKA-30APR18
        if (document.getElementById('sttr_tot_price_igst_per' + prodCount).value == '' ||
                document.getElementById('sttr_tot_price_igst_per' + prodCount).value == 'NaN') {
            document.getElementById('sttr_tot_price_igst_per' + prodCount).value = 0;
        }
    }

    if (typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + prodCount) != null)) {


        if (document.getElementById('sttr_valuation' + prodCount).value > 0) { // PROD AMOUNT IS GREATER THAN ZERO

            if (typeof (document.getElementById('sttr_tot_price_cgst_per' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_tot_price_cgst_per' + prodCount) != null)) {
                // CALCULATE PROD CGST AMT => ((PROD VAL * PROD CGST IN %) / 100) @PRIYANKA-30APR18
                if (document.getElementById('sttr_tot_price_cgst_per' + prodCount).value != '') {

                    if (typeof (document.getElementById('sttr_tot_price_cgst_chrg' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_tot_price_cgst_chrg' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_tot_price_cgst_per' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_tot_price_cgst_per' + prodCount) != null)) {
                        // PROD CGST AMT 
                        document.getElementById('sttr_tot_price_cgst_chrg' + prodCount).value = (parseFloat(document.getElementById('sttr_valuation' + prodCount).value) *
                                (parseFloat(document.getElementById('sttr_tot_price_cgst_per' + prodCount).value) / 100)).toFixed(2);
                    }
                }
            }

            if (typeof (document.getElementById('sttr_tot_price_sgst_per' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_tot_price_sgst_per' + prodCount) != null)) {
                // CALCULATE PROD SGST AMT => ((PROD VAL * PROD SGST IN %) / 100) @PRIYANKA-30APR18
                if (document.getElementById('sttr_tot_price_sgst_per' + prodCount).value != '') {

                    if (typeof (document.getElementById('sttr_tot_price_sgst_chrg' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_tot_price_sgst_chrg' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_tot_price_sgst_per' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_tot_price_sgst_per' + prodCount) != null)) {
                        // PROD SGST AMT 
                        document.getElementById('sttr_tot_price_sgst_chrg' + prodCount).value = (parseFloat(document.getElementById('sttr_valuation' + prodCount).value) *
                                (parseFloat(document.getElementById('sttr_tot_price_sgst_per' + prodCount).value) / 100)).toFixed(2);
                    }
                }
            }

            if (typeof (document.getElementById('sttr_tot_price_igst_per' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_tot_price_igst_per' + prodCount) != null)) {
                // CALCULATE PROD IGST AMT => ((PROD VAL * PROD IGST IN %) / 100) @PRIYANKA-30APR18
                if (document.getElementById('sttr_tot_price_igst_per' + prodCount).value != '') {

                    if (typeof (document.getElementById('sttr_tot_price_igst_chrg' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_tot_price_igst_chrg' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + prodCount) != null) &&
                            typeof (document.getElementById('sttr_tot_price_igst_per' + prodCount)) != 'undefined' &&
                            (document.getElementById('sttr_tot_price_igst_per' + prodCount) != null)) {
                        // PROD IGST AMT
                        document.getElementById('sttr_tot_price_igst_chrg' + prodCount).value = (parseFloat(document.getElementById('sttr_valuation' + prodCount).value) *
                                (parseFloat(document.getElementById('sttr_tot_price_igst_per' + prodCount).value) / 100)).toFixed(2);
                    }
                }
            }

        }
    }

    if (typeof (document.getElementById('sttr_tot_price_cgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_cgst_chrg' + prodCount) != null)) {
        // PROD CGST CHRG @PRIYANKA-30APR18
        if (document.getElementById('sttr_tot_price_cgst_chrg' + prodCount).value == '' ||
                document.getElementById('sttr_tot_price_cgst_chrg' + prodCount).value == 'NaN') {
            document.getElementById('sttr_tot_price_cgst_chrg' + prodCount).value = 0;
        }
    }

    if (typeof (document.getElementById('sttr_tot_price_sgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_sgst_chrg' + prodCount) != null)) {
        // PROD SGST CHRG @PRIYANKA-30APR18
        if (document.getElementById('sttr_tot_price_sgst_chrg' + prodCount).value == '' ||
                document.getElementById('sttr_tot_price_sgst_chrg' + prodCount).value == 'NaN') {
            document.getElementById('sttr_tot_price_sgst_chrg' + prodCount).value = 0;
        }
    }

    if (typeof (document.getElementById('sttr_tot_price_igst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_igst_chrg' + prodCount) != null)) {
        // PROD IGST CHRG @PRIYANKA-30APR18
        if (document.getElementById('sttr_tot_price_igst_chrg' + prodCount).value == '' ||
                document.getElementById('sttr_tot_price_igst_chrg' + prodCount).value == 'NaN') {
            document.getElementById('sttr_tot_price_igst_chrg' + prodCount).value = 0;
        }
    }

    // *************************************************************************************************************************************
    // *************************************************************************************************************************************

    if (typeof (document.getElementById('sttr_tax' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tax' + prodCount) != null)) {
        // PROD OTHER TAX IN % @PRIYANKA-30APR18
        if (document.getElementById('sttr_tax' + prodCount).value == '' ||
                document.getElementById('sttr_tax' + prodCount).value == 'NaN') {
            document.getElementById('sttr_tax' + prodCount).value = 0;
        }
    }

    if (typeof (document.getElementById('sttr_tax' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tax' + prodCount) != null)) {

        // PROD OTHER TAX AMT => ((PROD VAL * PROD OTH TAX IN %) / 100) @PRIYANKA-30APR18
        if (document.getElementById('sttr_tax' + prodCount).value != '') {

            if (typeof (document.getElementById('sttr_other_tax_amt' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_other_tax_amt' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_tax' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_tax' + prodCount) != null)) {
                // PROD OTHER TAX AMT
                document.getElementById('sttr_other_tax_amt' + prodCount).value = (parseFloat(document.getElementById('sttr_valuation' + prodCount).value) *
                        (parseFloat(document.getElementById('sttr_tax' + prodCount).value) / 100)).toFixed(2);
            }
        }
    }

    if (typeof (document.getElementById('sttr_other_tax_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_other_tax_amt' + prodCount) != null)) {
        // PROD OTHER TAX AMT @PRIYANKA-30APR18
        if (document.getElementById('sttr_other_tax_amt' + prodCount).value == '' ||
                document.getElementById('sttr_other_tax_amt' + prodCount).value == 'NaN') {
            document.getElementById('sttr_other_tax_amt' + prodCount).value = 0;
        }
    }

    // *************************************************************************************************************************************
    // *************************************************************************************************************************************
    // *************************************************************************************************************************************


    if (typeof (document.getElementById('sttr_tot_tax' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_tax' + prodCount) != null) &&
            typeof (document.getElementById('sttr_mkg_cgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_cgst_chrg' + prodCount) != null) &&
            typeof (document.getElementById('sttr_mkg_sgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_sgst_chrg' + prodCount) != null) &&
            typeof (document.getElementById('sttr_mkg_igst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_igst_chrg' + prodCount) != null)) {

        // CALCULATE TOT TAX AMT => LAB/MKG CGST AMT + LAB/MKG SGST AMT + LAB/MKG IGST AMT @PRIYANKA-29JAN19
        document.getElementById('sttr_tot_tax' + prodCount).value = (parseFloat(document.getElementById('sttr_mkg_cgst_chrg' + prodCount).value) +
                parseFloat(document.getElementById('sttr_mkg_sgst_chrg' + prodCount).value) +
                parseFloat(document.getElementById('sttr_mkg_igst_chrg' + prodCount).value)).toFixed(2);

    }

    if (typeof (document.getElementById('sttr_tot_tax' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_tax' + prodCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_cgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_cgst_chrg' + prodCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_sgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_sgst_chrg' + prodCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_igst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_igst_chrg' + prodCount) != null)) {

        // CALCULATE TOT TAX AMT => PROD CGST AMT + PROD SGST AMT + PROD IGST AMT @PRIYANKA-29JAN19
        document.getElementById('sttr_tot_tax' + prodCount).value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg' + prodCount).value) +
                parseFloat(document.getElementById('sttr_tot_price_sgst_chrg' + prodCount).value) +
                parseFloat(document.getElementById('sttr_tot_price_igst_chrg' + prodCount).value)).toFixed(2);

    }

    if (typeof (document.getElementById('sttr_tot_tax' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_tax' + prodCount) != null) &&
            typeof (document.getElementById('sttr_other_tax_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_other_tax_amt' + prodCount) != null)) {

        // CALCULATE TOT TAX AMT => OTHER TAX AMT @PRIYANKA-29JAN19
        document.getElementById('sttr_tot_tax' + prodCount).value = (parseFloat(document.getElementById('sttr_other_tax_amt' + prodCount).value)).toFixed(2);

    }

    if (typeof (document.getElementById('sttr_tot_tax' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_tax' + prodCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_cgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_cgst_chrg' + prodCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_sgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_sgst_chrg' + prodCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_igst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_igst_chrg' + prodCount) != null) &&
            typeof (document.getElementById('sttr_other_tax_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_other_tax_amt' + prodCount) != null)) {

        // CALCULATE TOT TAX AMT => PROD CGST AMT + PROD SGST AMT + PROD IGST AMT + OTHER TAX AMT @PRIYANKA-29JAN19
        document.getElementById('sttr_tot_tax' + prodCount).value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg' + prodCount).value) +
                parseFloat(document.getElementById('sttr_tot_price_sgst_chrg' + prodCount).value) +
                parseFloat(document.getElementById('sttr_tot_price_igst_chrg' + prodCount).value) +
                parseFloat(document.getElementById('sttr_other_tax_amt' + prodCount).value)).toFixed(2);

    }

    if (typeof (document.getElementById('sttr_tot_tax' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_tax' + prodCount) != null) &&
            typeof (document.getElementById('sttr_mkg_cgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_cgst_chrg' + prodCount) != null) &&
            typeof (document.getElementById('sttr_mkg_sgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_sgst_chrg' + prodCount) != null) &&
            typeof (document.getElementById('sttr_mkg_igst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_mkg_igst_chrg' + prodCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_cgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_cgst_chrg' + prodCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_sgst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_sgst_chrg' + prodCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_igst_chrg' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_igst_chrg' + prodCount) != null) &&
            typeof (document.getElementById('sttr_other_tax_amt' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_other_tax_amt' + prodCount) != null)) {

        // CALCULATE TOT TAX AMT => LAB/MKG CGST AMT + LAB/MKG SGST AMT + LAB/MKG IGST AMT + 
        //                          PROD CGST AMT + PROD SGST AMT + PROD IGST AMT + OTHER TAX AMT @PRIYANKA-29JAN19
        document.getElementById('sttr_tot_tax' + prodCount).value = (parseFloat(document.getElementById('sttr_mkg_cgst_chrg' + prodCount).value) +
                parseFloat(document.getElementById('sttr_mkg_sgst_chrg' + prodCount).value) +
                parseFloat(document.getElementById('sttr_mkg_igst_chrg' + prodCount).value) +
                parseFloat(document.getElementById('sttr_tot_price_cgst_chrg' + prodCount).value) +
                parseFloat(document.getElementById('sttr_tot_price_sgst_chrg' + prodCount).value) +
                parseFloat(document.getElementById('sttr_tot_price_igst_chrg' + prodCount).value) +
                parseFloat(document.getElementById('sttr_other_tax_amt' + prodCount).value)).toFixed(2);

    }

    if (typeof (document.getElementById('sttr_tot_tax' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_tax' + prodCount) != null)) {
        // TOT TAX AMT
        if (document.getElementById('sttr_tot_tax' + prodCount).value == '' ||
                document.getElementById('sttr_tot_tax' + prodCount).value == 'NaN') {
            document.getElementById('sttr_tot_tax' + prodCount).value = 0;
        }
    }

    if (typeof (document.getElementById('sttr_tot_tax' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_tax' + prodCount) != null)) {

        // CALCULATE FINAL VALUATION @PRIYANKA-30APR18
        if (document.getElementById('sttr_tot_tax' + prodCount).value != '') {

            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_tot_tax' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_tot_tax' + prodCount) != null)) {

                // FINAL VALUATION @PRIYANKA-29JAN19
                document.getElementById('sttr_final_valuation' + prodCount).value = (parseFloat(parseFloat(document.getElementById('sttr_valuation' + prodCount).value)
                        + parseFloat(document.getElementById('sttr_tot_tax' + prodCount).value))).toFixed(2);
            }

                //alert('here');
                 if(document.getElementById('sttr_hallmark_charges' + prodCount).value == ''){
                document.getElementById('sttr_hallmark_charges' + prodCount).value = 0;
                }
            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_total_lab_charges' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_total_lab_charges' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_tot_tax' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_tot_tax' + prodCount) != null)) {

                // FINAL VALUATION
                document.getElementById('sttr_final_valuation' + prodCount).value = (parseFloat(parseFloat(document.getElementById('sttr_valuation' + prodCount).value)
                        + parseFloat(document.getElementById('sttr_total_lab_charges' + prodCount).value)
                        + parseFloat(document.getElementById('sttr_tot_tax' + prodCount).value))).toFixed(2);
            }

            if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_valuation' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_total_making_charges' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_total_making_charges' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_hallmark_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_hallmark_charges' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_total_other_charges' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_total_other_charges' + prodCount) != null) &&
                    typeof (document.getElementById('sttr_tot_tax' + prodCount)) != 'undefined' &&
                    (document.getElementById('sttr_tot_tax' + prodCount) != null)) { 

                // FINAL VALUATION @PRIYANKA-28NOV18
                document.getElementById('sttr_final_valuation' + prodCount).value = (parseFloat(parseFloat(document.getElementById('sttr_valuation' + prodCount).value)
                        + parseFloat(document.getElementById('sttr_total_making_charges' + prodCount).value)
                        + parseFloat(document.getElementById('sttr_total_other_charges' + prodCount).value)
                        + parseFloat(document.getElementById('sttr_hallmark_charges' + prodCount).value)
                        + parseFloat(document.getElementById('sttr_tot_tax' + prodCount).value))).toFixed(2);
            
        } else {
                if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_valuation' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_total_making_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_making_charges' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_hallmark_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_hallmark_charges' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_tot_tax' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_tot_tax' + prodCount) != null)) {

                     //FINAL VALUATION @PRIYANKA-28NOV18
//                    if(document.getElementById('sttr_hallmark_charges' + prodCount).value == ''){
//                    document.getElementById('sttr_hallmark_charges' + prodCount).value = 0;
//                }
                    
                    document.getElementById('sttr_final_valuation' + prodCount).value = (parseFloat(parseFloat(document.getElementById('sttr_valuation' + prodCount).value)
                            + parseFloat(document.getElementById('sttr_total_making_charges' + prodCount).value)
                            + parseFloat(document.getElementById('sttr_hallmark_charges' + prodCount).value)
                            + parseFloat(document.getElementById('sttr_tot_tax' + prodCount).value))).toFixed(2);
                }

                if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_final_valuation' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_valuation' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_valuation' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_total_other_charges' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_total_other_charges' + prodCount) != null) &&
                        typeof (document.getElementById('sttr_tot_tax' + prodCount)) != 'undefined' &&
                        (document.getElementById('sttr_tot_tax' + prodCount) != null)) {

                    // FINAL VALUATION
                    document.getElementById('sttr_final_valuation' + prodCount).value = (parseFloat(parseFloat(document.getElementById('sttr_valuation' + prodCount).value)
                            + parseFloat(document.getElementById('sttr_total_other_charges' + prodCount).value)
                            + parseFloat(document.getElementById('sttr_tot_tax' + prodCount).value))).toFixed(2);
                }
            }
        }
    }

    if (typeof (document.getElementById('sttr_final_valuation' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_final_valuation' + prodCount) != null)) {
        // FINAL VALUATION @PRIYANKA-03MAY18   
        if (document.getElementById('sttr_final_valuation' + prodCount).value == 'NaN') {
            document.getElementById('sttr_final_valuation' + prodCount).value = '0.00';
        }
        if (document.getElementById('sttr_final_valuation' + prodCount).value > 0) {
            if (typeof (document.getElementById('same_product')) != 'undefined' &&
                    (document.getElementById('same_product') != null)) {
                document.getElementById("same_product").disabled = false;
            }
        }
    }

    //alert(document.getElementById('mainPanelName' + prodCount).value);

    if (typeof (document.getElementById('panelName' + prodCount)) != 'undefined' &&
            (document.getElementById('panelName' + prodCount) != null)) {

        if (document.getElementById('panelName' + prodCount).value == 'CRYSTAL' ||
                document.getElementById('panelName' + prodCount).value == 'CRYSTAL_SELL') {
            cryValCalcFunc(prodCount, discountCal);
        }
    }

}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR CALCULATIONS @PRIYANKA-30APR18
// *************************************************************************************************************************************

// *************************************************************************************************************************************
// START CODE TO VALIDATE STOCK TRANS FUNCTION @LOVE-07APR2018
// *************************************************************************************************************************************
function stockTransValidationFunc(arrStockFormFieldMandatory, arrStockFormFieldValidationMessage, prodCount) {
    //
    //console.log(arrStockFormFieldMandatory);
    var arrStockFormFieldMandatoryLength = Object.keys(arrStockFormFieldMandatory).length;
    var productCount = '';
    //
    // Check all mandatory fields in loop
    if (prodCount == null || prodCount == '')
        prodCount = 0;
    //
    //alert(document.getElementById('sttr_final_valuation').value);
    for (var p = 0; p <= prodCount; p++) {
        //
        productCount = '';
        //
        for (var i = 0; i < arrStockFormFieldMandatoryLength; i++) {
            //
            if (i > 5 && p != 0 && p != 'undefined')
                productCount = p;
            //
            var alertMessage = "Please Enter ";
            //
//            if (p == 2) {
//                alert('p: ' + p);
//                alert('prodCount: ' + prodCount);
//                alert('productCount: ' + productCount);
//                alert('i: ' + i);
//                alert('arrStockFormFieldMandatory: ' + arrStockFormFieldMandatory[i]);
//                alert(arrStockFormFieldMandatory[i] + productCount);
//            }
            // This validation message contain both validation message and place holder
            var position = arrStockFormFieldValidationMessage[i].lastIndexOf("|");
            //
            // Get only validation message from the full text
            alertMessage = alertMessage + arrStockFormFieldValidationMessage[i].slice(0, position);
            //
            //alert(arrStockFormFieldMandatory[i]);
            if (validateEmptyField(document.getElementById(arrStockFormFieldMandatory[i] + productCount).value, alertMessage) == false) {
                //
                document.getElementById(arrStockFormFieldMandatory[i] + productCount).focus();
                return false;
            }
        }
    }
    return true;
}
// *************************************************************************************************************************************
// END CODE TO VALIDATE STOCK TRANS FUNCTION @LOVE-07APR2018
// *************************************************************************************************************************************
//
// *************************************************************************************************************************************
// START CODE TO AUTO WEIGHT LESS FUNCTION @LOVE-07APR2018
// *************************************************************************************************************************************
function autoLessWeightFunction(prodCount, optionChkdYesNo) {
    var prodCountGlobal = prodCount;
    //
    if (typeof (document.getElementById('sttr_noofprod' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_noofprod' + prodCount) != null)) {
        var noOfStones = document.getElementById("sttr_noofprod" + prodCount).value;
    }
    //
    //alert('sttr_noofprod + prodCount == ' + "sttr_noofprod" + prodCount);
    //
    //alert('prodCountGlobal == ' + prodCountGlobal);
    //
    //alert('noOfStones == ' + noOfStones);
    //
    var cryPanel = 'add';
    //
    var grossWtId = 'sttr_gs_weight' + prodCountGlobal;
    var grossWtTypeId = 'sttr_gs_weight_type' + prodCountGlobal;
    var remWt = 0;
    //
    if (document.getElementById('sttr_gs_weight' + prodCountGlobal).value == '' || document.getElementById('sttr_gs_weight' + prodCountGlobal).value == 'NaN')
        document.getElementById('sttr_gs_weight' + prodCountGlobal).value = 0;
    //
    var cryGSW = document.getElementById('sttr_gs_weight' + prodCountGlobal).value;
    var cryGSWT = document.getElementById('sttr_gs_weight_type' + prodCountGlobal).value;
    //
    if (document.getElementById('sttr_gs_weight' + prodCountGlobal).value == '' || document.getElementById('sttr_gs_weight' + prodCountGlobal).value == 'NaN')
        document.getElementById('sttr_gs_weight' + prodCountGlobal).value = 0;
    //
    var itemGSW = parseFloat(document.getElementById('sttr_gs_weight' + prodCountGlobal).value);
    var itemGSWT = document.getElementById(grossWtTypeId).value;
    //
    // START CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-09MAR18
    if (cryGSWT == 'KG') { // CRYSTAL WEIGHT TYPE IN KG
        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSW = cryGSW;
    } else if (cryGSWT == 'GM') { // CRYSTAL WEIGHT TYPE IN GM
        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSW = (cryGSW * 0.001);
        else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSW = cryGSW;
        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSW = (cryGSW * 1000);
    } else if (cryGSWT == 'MG') { // CRYSTAL WEIGHT TYPE IN MG
        if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSW = (cryGSW * 0.001);
        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSW = cryGSW;
    } else if (cryGSWT == 'CT') { // CRYSTAL WEIGHT TYPE IN CT
        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
            cryGSW = (cryGSW * 0.0002);
        else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
            cryGSW = (cryGSW * 0.2);
        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
            cryGSW = (cryGSW * 200);
    }
    // END CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-09MAR18
    //
    //cryGSW = convertCryWeight(cryGSW, itemGSWT, cryGSWT);
    //
    if (cryPanel == 'deleteCry') {
        //
        if (optionChkdYesNo) {
            remWt = parseFloat(itemGSW) + parseFloat(cryGSW);
            document.getElementById(grossWtId).value = parseFloat(remWt).toFixed(3);
            document.getElementById('sttr_nt_weight' + prodCountGlobal).value = parseFloat(remWt).toFixed(3);
            changeNetWeightByPktWt();
        }
        //
    } else {
        //
        //if (optionChkdYesNo == 'lessFromGrossWt') {

        var gsWt = document.getElementById('sttr_gs_weight' + prodCountGlobal).value;
        var gsWtType = document.getElementById('sttr_gs_weight_type' + prodCountGlobal).value;
        if (gsWt == '' || gsWt == null) {
            gsWt = 0;
        }

        //var pktWt = document.getElementById('sttr_pkt_weight' + prodCountGlobal).value;
        //var pktWtType = document.getElementById('sttr_pkt_weight_type' + prodCountGlobal).value;
        //if (pktWt == '' || pktWt == null) {
        //    pktWt = 0;
        //}

        //var newNetWT = parseFloat(parseFloat(gsWt) - convertWeight(pktWt, gsWtType, pktWtType)).toFixed(3);
        //var newPktWT = convertWeight(pktWt, gsWtType, pktWtType);

        var totCryGSW = 0;
        //
        //alert('noOfStones : ' + noOfStones);
        for (var i = 1; i <= noOfStones; i++) {
            //
            if (typeof (document.getElementById('sttr_gs_weight' + prodCountGlobal + i)) != 'undefined' && document.getElementById('sttr_gs_weight' + prodCountGlobal + i) != null) {
                var finalNtWt = document.getElementById('sttr_gs_weight' + prodCountGlobal).value;
                var itemGSWT = document.getElementById('sttr_gs_weight_type' + prodCountGlobal).value;
                var cryGSW = document.getElementById('sttr_gs_weight' + prodCountGlobal + i).value;
                //alert('sttr_gs_weight ==' + document.getElementById('sttr_gs_weight' + i).value);
                var cryGSWT = document.getElementById('sttr_gs_weight_type' + prodCountGlobal + i).value;
                //alert('sttr_gs_weight_type ==' + document.getElementById('sttr_gs_weight_type' + i).value);


                //alert(document.getElementById('sttr_wt_auto_less' + i).value);

                if (document.getElementById('sttr_wt_auto_less' + prodCountGlobal + i).value == 'lessFromGrossWt') {
                    // START CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-10MAR18
                    if (cryGSWT == 'KG') { // CRYSTAL WEIGHT TYPE IN KG
                        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
                            cryGSW = cryGSW;
                    } else if (cryGSWT == 'GM') { // CRYSTAL WEIGHT TYPE IN GM
                        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
                            cryGSW = (cryGSW * 0.001);
                        else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
                            cryGSW = cryGSW;
                        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
                            cryGSW = (cryGSW * 1000);
                    } else if (cryGSWT == 'MG') { // CRYSTAL WEIGHT TYPE IN MG
                        if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
                            cryGSW = (cryGSW * 0.001);
                        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
                            cryGSW = cryGSW;
                    } else if (cryGSWT == 'CT') { // CRYSTAL WEIGHT TYPE IN CT
                        if (itemGSWT == 'KG') // METAL WEIGHT TYPE IN KG
                            cryGSW = (cryGSW * 0.0002);
                        else if (itemGSWT == 'GM') // METAL WEIGHT TYPE IN GM
                            cryGSW = (cryGSW * 0.2);
                        else if (itemGSWT == 'MG') // METAL WEIGHT TYPE IN MG
                            cryGSW = (cryGSW * 200);
                    }
                    // END CODE TO CALCULATE CRYSTAL GS WT ACCORDING TO CRYSTAL WEIGHT TYPE & METAL WEIGHT TYPE @PRIYANKA-10MAR18

                    totCryGSW += parseFloat(cryGSW);

                    //alert(totCryGSW);
                }
            }
        }

        //alert('totCryGSW == ' + totCryGSW);
        //alert('prodCountGlobal == ' + prodCountGlobal);
        //alert('sttr_nt_weight == ' + document.getElementById('sttr_nt_weight' + prodCountGlobal).value);

        if (typeof (document.getElementById('sttr_stone_less_weight' + prodCountGlobal)) != 'undefined' &&
                document.getElementById('sttr_stone_less_weight' + prodCountGlobal) != null) {
            document.getElementById('sttr_stone_less_weight' + prodCountGlobal).value = parseFloat(totCryGSW).toFixed(3);
        }

//        if (typeof (document.getElementById('sttr_stone_less_weight' + prodCountGlobal)) != 'undefined' &&
//                    document.getElementById('sttr_stone_less_weight' + prodCountGlobal) != null &&
//           (typeof (document.getElementById('sttr_fix_pkt_weight' + prodCountGlobal)) != 'undefined' &&
//                    document.getElementById('sttr_fix_pkt_weight' + prodCountGlobal) != null)) {
//
//            //alert('sttr_fix_pkt_weight == ' + document.getElementById('sttr_fix_pkt_weight' + prodCountGlobal).value);
//
//            if (document.getElementById('sttr_fix_pkt_weight' + prodCountGlobal).value > 0) {
//                document.getElementById('sttr_pkt_weight' + prodCountGlobal).value = (parseFloat(document.getElementById('sttr_fix_pkt_weight' + prodCountGlobal).value) + parseFloat(totCryGSW)).toFixed(3);
//            }
//        }

        var NetWT = parseFloat(finalNtWt) - parseFloat(totCryGSW);

        //if (newPktWT != '' && prodCount <= 1) {
        //    var newNtWeight = NetWT - newPktWT;
        //    remWt = newNtWeight;
        //} else {
        remWt = NetWT;
        //}

        //document.getElementById(grossWtId).value = parseFloat(remWt).toFixed(3);
        document.getElementById('sttr_nt_weight' + prodCountGlobal).value = parseFloat(remWt).toFixed(3);

        //} 

        //else {
        //
        //    var gsWt = document.getElementById('sttr_gs_weight' + prodCountGlobal).value;
        //    var gsWtType = document.getElementById('sttr_gs_weight_type' + prodCountGlobal).value;
        //    if (gsWt == '' || gsWt == null) {
        //        gsWt = 0;
        //    }
        //
        //var pktWt = document.getElementById('sttr_pkt_weight' + prodCountGlobal).value;
        //var pktWtType = document.getElementById('sttr_pkt_weight_type' + prodCountGlobal).value;
        //if (pktWt == '' || pktWt == null) {
        //    pktWt = 0;
        //}
        //
        //
        //var newNetWT = parseFloat(parseFloat(gsWt) - convertWeight(pktWt, gsWtType, pktWtType)).toFixed(3);
        //
        //    var remNTWt;
        //    remNTWt = parseFloat(itemGSW) + parseFloat(cryGSW);
        //
        //   alert('cryGSW == ' + cryGSW);
        //    alert('newNetWT == ' + newNetWT);
        //    alert('remNTWt == ' + remNTWt);
        //
        //    if (newNetWT == remNTWt) {
        //        remWt = parseFloat(itemGSW) + parseFloat(cryGSW);
        //    } else {
        //        var finalNtWt = document.getElementById('sttr_nt_weight' + prodCountGlobal).value;
        //        remWt = parseFloat(finalNtWt) + parseFloat(cryGSW);
        //    }
        //
        //    alert('remWt == ' + remWt);
        //
        //document.getElementById(grossWtId).value = parseFloat(remWt).toFixed(3);
        //    document.getElementById('sttr_nt_weight' + prodCountGlobal).value = parseFloat(remWt).toFixed(3);
        //}
        stockTransCalcFunc(prodCountGlobal);
    }
}
// *************************************************************************************************************************************
// END CODE TO AUTO WEIGHT LESS FUNCTION @LOVE-07APR2018
// *************************************************************************************************************************************

function stock_transaction_delete_operation(operation, sttrId, transType, mainSttrId, panelName) {
    confirm_msg = confirm('\n\nDo you really want to delete this Item?');
    if (confirm_msg == true) {
        /* START CODE TO ADD CONDTION FOR SET OPRATION AS DELETE FOR DELETION @AUTHOR:MADHUREE-28MARCH2020 */
        if (operation == 'delete_with_all_values') {
            operation = 'delete';
        }
        /* END CODE TO ADD CONDTION FOR SET OPRATION AS DELETE FOR DELETION @AUTHOR:MADHUREE-28MARCH2020 */
        var documentRootPath = document.getElementById('documentRootPath').value;
        loadXMLDoc();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
                document.getElementById("main_full_body").innerHTML = xmlhttp.responseText;
            } else {
                document.getElementById("main_ajax_loading_div").style.visibility = "visible";
            }
        };
        xmlhttp.open("POST", documentRootPath + "/include/php/stock/omAdFormData.php?operation=" + operation + "&sttrId=" + sttrId
                + "&sttr_transaction_type=" + transType + "&sttr_sttr_id=" + mainSttrId + "&panelName=" + panelName, true);
        xmlhttp.send();
    }
}

function stock_transaction_update_operation(sttrId, transType, operation, panelNameDivName, sttrSttrId, sttrSttrinId, custId) {
    //
    var documentRootPath = document.getElementById('documentRootPath').value;
    //
    //alert("operation=" + operation + "&sttrId=" + sttrId + "&transType=" + transType + "&indicator=" + indicator + "&mainPanelName=" + mainPanelName);
    //
    //alert('panelNameDivName == ' + panelNameDivName);
    //
    var str = panelNameDivName.split('|');
    //
    var panelName = str[0];
    //
    //alert('div == ' + div);
    //
    var divNameUpdatePanelName = str[1];
    //
    //alert('divNameUpdatePanelName == ' + divNameUpdatePanelName);
    //
    // ADDED CODE FOR DIV NAME @PRIYANKA-03OCT2019
    if (divNameUpdatePanelName.indexOf('*') > -1) {
        //
        var divStr = divNameUpdatePanelName.split('*');
        var div = divStr[0];
        var updatePanelName = divStr[1];
        //
    } else {
        //
        var div = divNameUpdatePanelName;
        var updatePanelName = null;
        //
    }

    //alert('sttrSttrinId == ' + sttrSttrinId);
    //alert('sttrId == ' + sttrId);
    //alert('sttrSttrId == ' + sttrSttrId);

    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/stock/omStockTransForm.php?operation=" + operation
            + "&sttr_id=" + sttrId + "&sttr_sttrin_id=" + sttrSttrinId
            + "&transType=" + transType + "&sttr_sttr_id=" + sttrSttrId
            + "&panelName=" + panelName + "&transPanelName=" + updatePanelName + "&payPanelName=" + updatePanelName+ "&custId=" + custId, true);
    xmlhttp.send();
}
//
//
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR STONE AMOUNT CALCULATIONS @PRIYANKA-14NOV18
// *************************************************************************************************************************************
function cryValCalcFunc(cryProdCount, discountCal) {
    //
    if (typeof (document.getElementById('noOfCrystal')) != 'undefined' &&
            (document.getElementById('noOfCrystal') != null)) {
        // NO OF CRYSTAL
        var noOfCrystal = parseFloat(document.getElementById('noOfCrystal').value);
    }
    //
    if (typeof (document.getElementById('sttr_quantity' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_quantity' + cryProdCount) != null)) {
        // CRYSTAL QUANTITY
        var crystalQTY = parseFloat(document.getElementById('sttr_quantity' + cryProdCount).value);
    }
    //
    if (typeof (document.getElementById('sttr_gs_weight' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_gs_weight' + cryProdCount) != null)) {
        // CRYSTAL GS WT
        var crystalGsWt = parseFloat(document.getElementById('sttr_gs_weight' + cryProdCount).value);
    }
    //
    if (typeof (document.getElementById('sttr_gs_weight_type' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_gs_weight_type' + cryProdCount) != null)) {
        // CRYSTAL GS WT TYPE
        var crystalGsWtTyp = (document.getElementById('sttr_gs_weight_type' + cryProdCount).value);
    }
    //
    if (typeof (document.getElementById('sttr_gs_weight_type' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_gs_weight_type' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_pkt_weight_type' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_pkt_weight_type' + cryProdCount) != null)) {
        // CRYSTAL PKT WT TYPE
        if (document.getElementById('sttr_gs_weight_type' + cryProdCount).value != document.getElementById('sttr_pkt_weight_type' + cryProdCount).value) {
            document.getElementById('sttr_pkt_weight_type' + cryProdCount).value = document.getElementById('sttr_gs_weight_type' + cryProdCount).value;
        }
    }
    //
    if (typeof (document.getElementById('sttr_gs_weight_type' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_gs_weight_type' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_nt_weight_type' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_nt_weight_type' + cryProdCount) != null)) {
        // CRYSTAL NT WT TYPE
        if (document.getElementById('sttr_gs_weight_type' + cryProdCount).value != document.getElementById('sttr_nt_weight_type' + cryProdCount).value) {
            document.getElementById('sttr_nt_weight_type' + cryProdCount).value = document.getElementById('sttr_gs_weight_type' + cryProdCount).value;
        }
    }
    //
    if (typeof (document.getElementById('sttr_product_purchase_rate' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_product_purchase_rate' + cryProdCount) != null)) {
        // CRYSTAL PURCHASE RATE
        var crystalRate = parseFloat(document.getElementById('sttr_product_purchase_rate' + cryProdCount).value);
    } else {
        // CRYSTAL PURCHASE RATE      
        var crystalRate = null;
    }
    //
    //alert('crystalRate @@== ' + crystalRate);
    //
    if (typeof (document.getElementById('sttr_product_purchase_rate_type' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_product_purchase_rate_type' + cryProdCount) != null)) {
        // CRYSTAL PURCHASE RATE TYPE
        var crystalRateType = (document.getElementById('sttr_product_purchase_rate_type' + cryProdCount).value);
    }
    //               
    //alert('crystalRate == ' + crystalRate);
    //
    // CRYSTAL PURCHASE RATE 
    if (crystalRate == '' || crystalRate == null) {
        //
        // CRYSTAL PURCHASE RATE 
        if (typeof (document.getElementById('sttr_product_sell_rate' + cryProdCount)) != 'undefined' &&
                (document.getElementById('sttr_product_sell_rate' + cryProdCount) != null)) {
            //
            // CRYSTAL SELL RATE 
            crystalRate = parseFloat(document.getElementById('sttr_product_sell_rate' + cryProdCount).value);
            //
            // CRYSTAL SELL RATE TYPE
            var crystalRateType = (document.getElementById('sttr_product_sell_rate_type' + cryProdCount).value);
        }

    } else {
        //
        if (typeof (document.getElementById('sttr_product_purchase_rate_type' + cryProdCount)) != 'undefined' &&
                (document.getElementById('sttr_product_purchase_rate_type' + cryProdCount) != null) &&
                typeof (document.getElementById('sttr_product_sell_rate_type' + cryProdCount)) != 'undefined' &&
                (document.getElementById('sttr_product_sell_rate_type' + cryProdCount) != null)) {
            // CRYSTAL SELL RATE TYPE
            if (document.getElementById('sttr_product_purchase_rate_type' + cryProdCount).value != document.getElementById('sttr_product_sell_rate_type' + cryProdCount).value) {
                document.getElementById('sttr_product_sell_rate_type' + cryProdCount).value = document.getElementById('sttr_product_purchase_rate_type' + cryProdCount).value;
            }
        }

    }
    //
    //
    var cryValuation = 0;
    //
    //
    if (crystalRate > 0) {
        //
        //alert('crystalRateType == ' + crystalRateType);
        //alert('crystalGsWtTyp == ' + crystalGsWtTyp);
        //alert('crystalRate == ' + crystalRate);
        //
        // START CODE TO CALCULATE VALUATION ACCORDING TO CRYSTAL WEIGHT TYPE & CRYSTAL RATE TYPE @PRIYANKA-14NOV18
        if (crystalRateType == 'KG') { // CRYSTAL RATE TYPE IN KG
            if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
                cryValuation = crystalRate * crystalGsWt;
            else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
                cryValuation = (crystalRate / 1000) * crystalGsWt;
            else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
                cryValuation = (crystalRate * 0.0002) * crystalGsWt;
            else
                cryValuation = (crystalRate / (1000 * 1000)) * crystalGsWt;
        } else if (crystalRateType == 'GM') { // CRYSTAL RATE TYPE IN GM
            if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
                cryValuation = crystalRate * 1000 * crystalGsWt;
            else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
                cryValuation = crystalRate * crystalGsWt;
            else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
                cryValuation = (crystalRate * 0.2) * crystalGsWt;
            else
                cryValuation = (crystalRate / 1000) * crystalGsWt;
        } else if (crystalRateType == 'MG') { // CRYSTAL RATE TYPE IN MG
            if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
                cryValuation = crystalRate * 1000 * 1000 * crystalGsWt;
            else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
                cryValuation = crystalRate * 1000 * crystalGsWt;
            else if (crystalGsWtTyp == 'CT') // CRYSTAL WEIGHT TYPE IN CT
                cryValuation = (crystalRate * 200) * crystalGsWt;
            else
                cryValuation = crystalRate * crystalGsWt;
        } else if (crystalRateType == 'CT') { // CRYSTAL RATE TYPE IN CT
            if (crystalGsWtTyp == 'KG') // CRYSTAL WEIGHT TYPE IN KG
                cryValuation = ((crystalRate / 0.0002) * crystalGsWt);
            else if (crystalGsWtTyp == 'GM') // CRYSTAL WEIGHT TYPE IN GM
                cryValuation = ((crystalRate / 0.2) * crystalGsWt);
            else if (crystalGsWtTyp == 'MG') // CRYSTAL WEIGHT TYPE IN MG
                cryValuation = ((crystalRate / 200) * crystalGsWt);
            else
                cryValuation = crystalRate * crystalGsWt;
        } else if (crystalRateType == 'PP') { // CRYSTAL RATE TYPE IN PP @PRIYANKA-14NOV18
            cryValuation = crystalRate * crystalQTY; // CRYSTAL VAL @PRIYANKA-14NOV18
        } else {
            cryValuation = crystalRate * crystalGsWt;
        }
    }
    // END CODE TO CALCULATE VALUATION ACCORDING TO CRYSTAL WEIGHT TYPE & CRYSTAL RATE TYPE @PRIYANKA-14NOV18
    //
    if (typeof (document.getElementById('sttr_metal_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_amt' + cryProdCount) != null) &&
            typeof (cryValuation) != 'undefined' &&
            (cryValuation) != null) {

        //alert('cryValuation == ' + cryValuation);

        // STONE VALUATION @PRIYANKA-14NOV18
        document.getElementById('sttr_metal_amt' + cryProdCount).value = parseFloat(cryValuation).toFixed(2);
    }
    //
    if (typeof (document.getElementById('sttr_metal_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_amt' + cryProdCount) != null)) {

        //alert('sttr_metal_amt == ' + document.getElementById('sttr_metal_amt' + cryProdCount).value);

        // STONE VALUATION @PRIYANKA-14NOV18
        if (document.getElementById('sttr_metal_amt' + cryProdCount).value == '' ||
                document.getElementById('sttr_metal_amt' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_metal_amt' + cryProdCount).value = 0;
        }
    }
    //
    //
    cryDiscountCalcFunc(cryProdCount, discountCal);
    //
    var prodType;
    if (typeof (document.getElementById('sttr_product_type' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_product_type' + cryProdCount) != null)) {
        prodType = document.getElementById('sttr_product_type' + cryProdCount).value;
    }
    // STONE VALUATION @PRIYANKA-20AUG2019
    if (prodType != '' && prodType != 'Gold' && prodType != 'GOLD' && prodType != 'Silver' && prodType != 'SILVER') {
        if (typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
                (document.getElementById('sttr_valuation' + cryProdCount) != null)) {

            //alert('sttr_valuation 1== ' + document.getElementById('sttr_valuation' + cryProdCount).value);  

            if (typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
                    (document.getElementById('sttr_valuation' + cryProdCount) != null) &&
                    typeof (cryValuation) != 'undefined' &&
                    (cryValuation) != null) {

                //alert('cryValuation == ' + cryValuation);

                // STONE VALUATION @PRIYANKA-20AUG2019
                document.getElementById('sttr_valuation' + cryProdCount).value = parseFloat(cryValuation).toFixed(2);
            }

            //alert('sttr_valuation 2== ' + document.getElementById('sttr_valuation' + cryProdCount).value);  

            // STONE VALUATION @PRIYANKA-20AUG2019
            if (document.getElementById('sttr_valuation' + cryProdCount).value == '' ||
                    document.getElementById('sttr_valuation' + cryProdCount).value == 'NaN') {
                document.getElementById('sttr_valuation' + cryProdCount).value = 0;
            }
        }
    }
    //
    if (typeof (document.getElementById('sttr_tot_price_cgst_per' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_cgst_per' + cryProdCount) != null)) {
        // STONE CGST IN % @PRIYANKA-14NOV18
        if (document.getElementById('sttr_tot_price_cgst_per' + cryProdCount).value == '' ||
                document.getElementById('sttr_tot_price_cgst_per' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_tot_price_cgst_per' + cryProdCount).value = 0;
        }
    }
    //
    // CALCULATE STONE CGST AMT => (STONE VAL * STONE CGST IN %) / 100 @PRIYANKA-14NOV18
    if (typeof (document.getElementById('sttr_tot_price_cgst_per' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_cgst_per' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_cgst_chrg' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_cgst_chrg' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + cryProdCount) != null)) {
        //           
        if (document.getElementById('sttr_tot_price_cgst_per' + cryProdCount).value != '') {
            document.getElementById('sttr_tot_price_cgst_chrg' + cryProdCount).value = (parseFloat(document.getElementById('sttr_valuation' + cryProdCount).value) *
                    (parseFloat(document.getElementById('sttr_tot_price_cgst_per' + cryProdCount).value) / 100)).toFixed(2);
        }
    }
    //
    if (typeof (document.getElementById('sttr_tot_price_cgst_chrg' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_cgst_chrg' + cryProdCount) != null)) {
        // STONE CGST CHRG @PRIYANKA-14NOV18
        if (document.getElementById('sttr_tot_price_cgst_chrg' + cryProdCount).value == '' ||
                document.getElementById('sttr_tot_price_cgst_chrg' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_tot_price_cgst_chrg' + cryProdCount).value = 0;
        }
    }
    //
    if (typeof (document.getElementById('sttr_tot_price_sgst_per' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_sgst_per' + cryProdCount) != null)) {
        // STONE SGST IN % @PRIYANKA-14NOV18
        if (document.getElementById('sttr_tot_price_sgst_per' + cryProdCount).value == '' ||
                document.getElementById('sttr_tot_price_sgst_per' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_tot_price_sgst_per' + cryProdCount).value = 0;
        }
    }
    //
    // CALCULATE STONE SGST AMT => (STONE VAL * STONE SGST IN %) / 100 @PRIYANKA-14NOV18
    if (typeof (document.getElementById('sttr_tot_price_sgst_per' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_sgst_per' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_sgst_chrg' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_sgst_chrg' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + cryProdCount) != null)) {
        //
        if (document.getElementById('sttr_tot_price_sgst_per' + cryProdCount).value != '') {
            document.getElementById('sttr_tot_price_sgst_chrg' + cryProdCount).value = (parseFloat(document.getElementById('sttr_valuation' + cryProdCount).value) *
                    (parseFloat(document.getElementById('sttr_tot_price_sgst_per' + cryProdCount).value) / 100)).toFixed(2);
        }
    }
    //
    if (typeof (document.getElementById('sttr_tot_price_sgst_chrg' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_sgst_chrg' + cryProdCount) != null)) {
        // STONE SGST CHRG @PRIYANKA-14NOV18
        if (document.getElementById('sttr_tot_price_sgst_chrg' + cryProdCount).value == '' ||
                document.getElementById('sttr_tot_price_sgst_chrg' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_tot_price_sgst_chrg' + cryProdCount).value = 0;
        }
    }
    //
    if (typeof (document.getElementById('sttr_tot_price_igst_per' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_igst_per' + cryProdCount) != null)) {
        // STONE IGST IN % @PRIYANKA-14NOV18
        if (document.getElementById('sttr_tot_price_igst_per' + cryProdCount).value == '' ||
                document.getElementById('sttr_tot_price_igst_per' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_tot_price_igst_per' + cryProdCount).value = 0;
        }
    }
    //
    // CALCULATE MET IGST AMT => (STONE VAL * STONE IGST IN %) / 100 @PRIYANKA-14NOV18
    if (typeof (document.getElementById('sttr_tot_price_igst_per' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_igst_per' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_igst_chrg' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_igst_chrg' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + cryProdCount) != null)) {
        //
        if (document.getElementById('sttr_tot_price_igst_per' + cryProdCount).value != '') {
            document.getElementById('sttr_tot_price_igst_chrg' + cryProdCount).value = (parseFloat(document.getElementById('sttr_valuation' + cryProdCount).value) *
                    (parseFloat(document.getElementById('sttr_tot_price_igst_per' + cryProdCount).value) / 100)).toFixed(2);
        }
    }
    //
    if (typeof (document.getElementById('sttr_tot_price_igst_chrg' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_igst_chrg' + cryProdCount) != null)) {
        // STONE IGST CHRG @PRIYANKA-14NOV18
        if (document.getElementById('sttr_tot_price_igst_chrg' + cryProdCount).value == '' ||
                document.getElementById('sttr_tot_price_igst_chrg' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_tot_price_igst_chrg' + cryProdCount).value = 0;
        }
    }
    //
    // CALCULATE TOT TAX AMT =>  STONE CGST AMT + STONE SGST AMT + STONE IGST AMT @PRIYANKA-14NOV18
    if (typeof (document.getElementById('sttr_tot_tax' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_tax' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_cgst_chrg' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_cgst_chrg' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_sgst_chrg' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_sgst_chrg' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_tot_price_igst_chrg' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_price_igst_chrg' + cryProdCount) != null)) {
        //
        document.getElementById('sttr_tot_tax' + cryProdCount).value = (parseFloat(document.getElementById('sttr_tot_price_cgst_chrg' + cryProdCount).value) +
                parseFloat(document.getElementById('sttr_tot_price_sgst_chrg' + cryProdCount).value) +
                parseFloat(document.getElementById('sttr_tot_price_igst_chrg' + cryProdCount).value)).toFixed(2);
    }
    //
    if (typeof (document.getElementById('sttr_tot_tax' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_tax' + cryProdCount) != null)) {
        // STONE TOTAL TAX @PRIYANKA-14NOV18
        if (document.getElementById('sttr_tot_tax' + cryProdCount).value == '' ||
                document.getElementById('sttr_tot_tax' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_tot_tax' + cryProdCount).value = 0;
        }
    }
    //
    if (typeof (document.getElementById('sttr_final_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_final_valuation' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_tot_tax' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_tax' + cryProdCount) != null)) {
        // STONE FINAL VALUATION @PRIYANKA-14NOV18
        document.getElementById('sttr_final_valuation' + cryProdCount).value = parseFloat(parseFloat(document.getElementById('sttr_valuation' + cryProdCount).value) +
                parseFloat(document.getElementById('sttr_tot_tax' + cryProdCount).value)).toFixed(2);
    }
    //
    if (typeof (document.getElementById('sttr_final_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_final_valuation' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_total_lab_charges' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_total_lab_charges' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_tot_tax' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_tax' + cryProdCount) != null)) {
        // STONE FINAL VALUATION @PRIYANKA-14NOV18
        document.getElementById('sttr_final_valuation' + cryProdCount).value = parseFloat(parseFloat(document.getElementById('sttr_valuation' + cryProdCount).value) +
                parseFloat(document.getElementById('sttr_total_lab_charges' + cryProdCount).value) + parseFloat(document.getElementById('sttr_tot_tax' + cryProdCount).value)).toFixed(2);
    }
    //
    if (typeof (document.getElementById('sttr_final_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_final_valuation' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_total_lab_charges' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_total_lab_charges' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_total_other_charges' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_total_other_charges' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_tot_tax' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_tax' + cryProdCount) != null)) {
        // STONE FINAL VALUATION @PRIYANKA-14NOV18
        document.getElementById('sttr_final_valuation' + cryProdCount).value = parseFloat(parseFloat(document.getElementById('sttr_valuation' + cryProdCount).value)
                + parseFloat(document.getElementById('sttr_total_other_charges' + cryProdCount).value)
                + parseFloat(document.getElementById('sttr_total_lab_charges' + cryProdCount).value)
                + parseFloat(document.getElementById('sttr_tot_tax' + cryProdCount).value)).toFixed(2);
    }
    //
    if (typeof (document.getElementById('sttr_final_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_final_valuation' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_total_making_charges' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_total_making_charges' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_total_other_charges' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_total_other_charges' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_tot_tax' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_tot_tax' + cryProdCount) != null)) {

        // FINAL VALUATION @PRIYANKA-29NOV18
        document.getElementById('sttr_final_valuation' + cryProdCount).value = (parseFloat(parseFloat(document.getElementById('sttr_valuation' + cryProdCount).value)
                + parseFloat(document.getElementById('sttr_total_making_charges' + cryProdCount).value)
                + parseFloat(document.getElementById('sttr_total_other_charges' + cryProdCount).value)
                + parseFloat(document.getElementById('sttr_tot_tax' + cryProdCount).value))).toFixed(2);
    }
    //
    if (typeof (document.getElementById('sttr_final_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_final_valuation' + cryProdCount) != null)) {
        // STONE FINAL VALUATION @PRIYANKA-14NOV18
        if (document.getElementById('sttr_final_valuation' + cryProdCount).value == '' ||
                document.getElementById('sttr_final_valuation' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_final_valuation' + cryProdCount).value = 0;
        }
    }
    //
    return false;
}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR STONE AMOUNT CALCULATIONS @PRIYANKA-14NOV18
// *************************************************************************************************************************************
//
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR CRYSTAL DISCOUNT CALCULATIONS @PRIYANKA-14NOV18
// *************************************************************************************************************************************
function cryDiscountCalcFunc(cryProdCount, discountCal) {
    //
    if (typeof (document.getElementById('sttr_stone_discount_per' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_per' + cryProdCount) != null)) {
        // CRYSTAL DISCOUNT IN % @PRIYANKA-14NOV18 
        if (document.getElementById('sttr_stone_discount_per' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_stone_discount_per' + cryProdCount).value = '0';
        }
    }
    //
    if (typeof (document.getElementById('sttr_stone_discount_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_amt' + cryProdCount) != null)) {
        // CRYSTAL DISCOUNT IN AMT @PRIYANKA-14NOV18
        if (document.getElementById('sttr_stone_discount_amt' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_stone_discount_amt' + cryProdCount).value = '0.00';
        }
    }
    //
    if (typeof (document.getElementById('sttr_metal_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_amt' + cryProdCount) != null)) {
        // CRYSTAL AMT
        var prodTotalAmt = (parseFloat(document.getElementById('sttr_metal_amt' + cryProdCount).value)).toFixed(2);
    }

    //
    var stoneDiscountCalBy = 'sttr_stone_discount_per' + cryProdCount;
    var stoneLabDiscountCalBy = 'sttr_lab_discount_per' + cryProdCount;
    //

    // STONE DISCOUNT TYPE @PRIYANKA-18NOV17
    if (typeof (document.getElementById('sttr_stone_discount_type' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_type' + cryProdCount) != null)) {

        // STONE DISCOUNT TYPE @PRIYANKA-18NOV17
        var stoneDiscType = document.getElementById('sttr_stone_discount_type' + cryProdCount).value;
    }

    // STONE LAB DISCOUNT TYPE @PRIYANKA-18NOV17
    if (typeof (document.getElementById('sttr_lab_discount_type' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_lab_discount_type' + cryProdCount) != null)) {

        // STONE LAB DISCOUNT TYPE @PRIYANKA-18NOV17
        var stoneLabDiscType = document.getElementById('sttr_lab_discount_type' + cryProdCount).value;
    }

    // PROD WEIGHT & PROD WEIGHT TYPE @PRIYANKA-18NOV17
    if (typeof (document.getElementById('sttr_gs_weight' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_gs_weight' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_gs_weight_type' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_gs_weight_type' + cryProdCount) != null)) {

        // PROD WEIGHT @PRIYANKA-18NOV17
        var productWeight = document.getElementById('sttr_gs_weight' + cryProdCount).value;
        // PROD WEIGHT TYPE @PRIYANKA-18NOV17
        var productWtType = document.getElementById('sttr_gs_weight_type' + cryProdCount).value;

    }

    // PROD QUANTITY @PRIYANKA-18NOV17
    if (typeof (document.getElementById('sttr_quantity' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_quantity' + cryProdCount) != null)) {

        // PROD QUANTITY @PRIYANKA-18NOV17
        var productQTY = document.getElementById('sttr_quantity' + cryProdCount).value;
    }

    //
    if (typeof (document.getElementById('sttr_stone_discount_per' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_per' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_stone_discount_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_amt' + cryProdCount) != null)) {
        //
        // START CODE FOR CRYSTAL DISCOUNT IN % & CRYSTAL DISCOUNT AMT @PRIYANKA-14NOV18     
        if (discountCal == stoneDiscountCalBy) {
            //
            //alert('discountCal == ' + discountCal);
            //alert('stoneDiscountCalBy == ' + stoneDiscountCalBy);
            //
            if (prodTotalAmt > 0) {
                //
                if (typeof (document.getElementById('sttr_stone_discount_per' + cryProdCount)) != 'undefined' &&
                        (document.getElementById('sttr_stone_discount_per' + cryProdCount) != null)) {
                    //
                    // CRYSTAL DISCOUNT %
                    var sttr_stone_discount_per = document.getElementById('sttr_stone_discount_per' + cryProdCount).value; // PRODUCT DISCOUNT IN % @PRIYANKA-14NOV18   
                }


                var stoneDiscountAmt = 0;

                // STONE LAB DISCOUNT TYPE @PRIYANKA-18NOV17
                if (stoneDiscType == 'KG') {
                    // STONE WEIGHT TYPE
                    if (productWtType == 'KG')
                        stoneDiscountAmt = parseFloat(parseFloat(sttr_stone_discount_per) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        stoneDiscountAmt = parseFloat((parseFloat(sttr_stone_discount_per) / 1000) * parseFloat(productWeight)).toFixed(2);
                    else
                        stoneDiscountAmt = parseFloat((parseFloat(sttr_stone_discount_per) / (1000 * 1000)) * parseFloat(productWeight)).toFixed(2);

                    // STONE LAB DISCOUNT TYPE @PRIYANKA-18NOV17
                } else if (stoneDiscType == 'GM') {

                    // STONE WEIGHT TYPE
                    if (productWtType == 'KG')
                        stoneDiscountAmt = parseFloat((parseFloat(sttr_stone_discount_per) * 1000) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        stoneDiscountAmt = parseFloat(parseFloat(sttr_stone_discount_per) * parseFloat(productWeight)).toFixed(2);
                    else
                        stoneDiscountAmt = parseFloat((parseFloat(sttr_stone_discount_per) / 1000) * parseFloat(productWeight)).toFixed(2);

                    // STONE LAB DISCOUNT TYPE @PRIYANKA-18NOV17
                } else if (stoneDiscType == 'MG') {
                    // STONE WEIGHT TYPE
                    if (productWtType == 'KG')
                        stoneDiscountAmt = parseFloat((parseFloat(sttr_stone_discount_per) * 1000 * 1000) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        stoneDiscountAmt = parseFloat((parseFloat(sttr_stone_discount_per) * 1000) * parseFloat(productWeight)).toFixed(2);
                    else
                        stoneDiscountAmt = parseFloat(parseFloat(sttr_stone_discount_per) * parseFloat(productWeight)).toFixed(2);

                    // STONE LAB DISCOUNT TYPE @PRIYANKA-18NOV17
                } else if (stoneDiscType == 'PP') {
                    // STON WEIGHT TYPE
                    stoneDiscountAmt = parseFloat(parseFloat(sttr_stone_discount_per) * parseFloat(productQTY)).toFixed(2);

                    // STONE LAB DISCOUNT TYPE @PRIYANKA-18NOV17
                } else if (stoneDiscType == 'per') {

                    if (typeof (document.getElementById('sttr_metal_amt' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_metal_amt' + cryProdCount) != null)) {

                        // CALCULATE STONE LAB DISCOUNT AMT @PRIYANKA-18NOV17
                        stoneDiscountAmt = ((parseFloat(document.getElementById('sttr_metal_amt' + cryProdCount).value)) * parseFloat(sttr_stone_discount_per) / 100).toFixed(2);
                    }

                }

                //
                if (typeof (document.getElementById('sttr_stone_discount_amt' + cryProdCount)) != 'undefined' &&
                        (document.getElementById('sttr_stone_discount_amt' + cryProdCount) != null)) {
                    //
                    // CRYSTAL DISCOUNT AMT
                    document.getElementById('sttr_stone_discount_amt' + cryProdCount).value = (parseFloat(stoneDiscountAmt)).toFixed(2);
                }
                //
                if (stoneDiscountAmt > 0) {
                    //
                    if (typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + cryProdCount) != null) &&
                            typeof (document.getElementById('sttr_metal_amt' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_metal_amt' + cryProdCount) != null)) {
                        //
                        // CRYSTAL VAL
                        document.getElementById('sttr_valuation' + cryProdCount).value = ((parseFloat(document.getElementById('sttr_metal_amt' + cryProdCount).value)) -
                                (parseFloat(stoneDiscountAmt))).toFixed(2);
                    }

                } else {
                    //
                    if (typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + cryProdCount) != null) &&
                            typeof (document.getElementById('sttr_metal_amt' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_metal_amt' + cryProdCount) != null)) {
                        //
                        // CRYSTAL VAL
                        document.getElementById('sttr_valuation' + cryProdCount).value = (parseFloat(document.getElementById('sttr_metal_amt' + cryProdCount).value)).toFixed(2);
                    }
                }
            }
            //
        } else if (discountCal != stoneDiscountCalBy && discountCal != stoneLabDiscountCalBy) {
            //
            // START CODE TO CALCULATE CRYSTAL DISCOUNT IN % ACCORDING TO CRYSTAL DISCOUNT AMT @PRIYANKA-14NOV18             
            if (prodTotalAmt > 0) {
                //
                if (typeof (document.getElementById('sttr_stone_discount_amt' + cryProdCount)) != 'undefined' &&
                        (document.getElementById('sttr_stone_discount_amt' + cryProdCount) != null)) {
                    //
                    // CRYSTAL DISCOUNT AMT @PRIYANKA-14NOV18     
                    var stoneDiscountAmt = (parseFloat(document.getElementById('sttr_stone_discount_amt' + cryProdCount).value)).toFixed(2);
                }

                // CALCULATE CRYSTAL DISCOUNT IN % 
                var stoneDiscountPer = ((parseFloat(stoneDiscountAmt) * 100) / parseFloat(prodTotalAmt));

                if (typeof (document.getElementById('sttr_stone_discount_per' + cryProdCount)) != 'undefined' &&
                        (document.getElementById('sttr_stone_discount_per' + cryProdCount) != null)) {

                    // CRYSTAL DISCOUNT IN % 
                    document.getElementById('sttr_stone_discount_per' + cryProdCount).value = parseFloat(stoneDiscountPer);
                }

                if (stoneDiscountAmt > 0) {

                    if (typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + cryProdCount) != null) &&
                            typeof (document.getElementById('sttr_metal_amt' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_metal_amt' + cryProdCount) != null)) {
                        document.getElementById('sttr_valuation' + cryProdCount).value = ((parseFloat(document.getElementById('sttr_metal_amt' + cryProdCount).value)) -
                                parseFloat(stoneDiscountAmt)).toFixed(2);
                    }

                } else {

                    if (typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_valuation' + cryProdCount) != null) &&
                            typeof (document.getElementById('sttr_metal_amt' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_metal_amt' + cryProdCount) != null)) {
                        document.getElementById('sttr_valuation' + cryProdCount).value = (parseFloat(document.getElementById('sttr_metal_amt' + cryProdCount).value)).toFixed(2);
                    }
                }

            }
            // END CODE TO CALCULATE CRYSTAL DISCOUNT IN % ACCORDING TO CRYSTAL DISCOUNT AMT @PRIYANKA-14NOV18     
        }
        // END CODE FOR CRYSTAL DISCOUNT IN % & CRYSTAL DISCOUNT AMT @PRIYANKA-14NOV18     

    }

    if (typeof (document.getElementById('sttr_stone_discount_per' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_per' + cryProdCount) != null)) {
        // CRYSTAL DISCOUNT IN % @PRIYANKA-14NOV18   
        if (document.getElementById('sttr_stone_discount_per' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_stone_discount_per' + cryProdCount).value = '0';
        }
    }

    if (typeof (document.getElementById('sttr_stone_discount_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_stone_discount_amt' + cryProdCount) != null)) {
        // CRYSTAL DISCOUNT IN AMT @PRIYANKA-14NOV18   
        if (document.getElementById('sttr_stone_discount_amt' + cryProdCount).value == 'NaN' ||
                document.getElementById('sttr_stone_discount_amt' + cryProdCount).value == '0') {
            document.getElementById('sttr_stone_discount_amt' + cryProdCount).value = '0.00';
        }
    }

    // *************************************************************************************************************************************
    // *************************************************************************************************************************************

    if (typeof (document.getElementById('sttr_lab_discount_per' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_lab_discount_per' + cryProdCount) != null)) {
        // LAB DISCOUNT IN % @PRIYANKA-14NOV18    
        if (document.getElementById('sttr_lab_discount_per' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_lab_discount_per' + cryProdCount).value = '0';
        }
    }

    if (typeof (document.getElementById('sttr_lab_discount_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_lab_discount_amt' + cryProdCount) != null)) {
        // LAB DISCOUNT IN AMT @PRIYANKA-14NOV18   
        if (document.getElementById('sttr_lab_discount_amt' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_lab_discount_amt' + cryProdCount).value = '0.00';
        }
    }

    if (typeof (document.getElementById('sttr_total_lab_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_total_lab_amt' + cryProdCount) != null)) {
        // TOT LAB AMT
        var labTotalAmt = (parseFloat(document.getElementById('sttr_total_lab_amt' + cryProdCount).value)).toFixed(2);
    }

    if (typeof (document.getElementById('sttr_lab_discount_per' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_lab_discount_per' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_lab_discount_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_lab_discount_amt' + cryProdCount) != null)) {

        // START CODE FOR LAB DISCOUNT IN % & LAB DISCOUNT AMT @PRIYANKA-14NOV18   
        if (discountCal == stoneLabDiscountCalBy) {

            if (labTotalAmt > 0) {

                if (typeof (document.getElementById('sttr_lab_discount_per' + cryProdCount)) != 'undefined' &&
                        (document.getElementById('sttr_lab_discount_per' + cryProdCount) != null)) {
                    // LAB DISCOUNT IN %
                    var sttr_lab_discount_per = document.getElementById('sttr_lab_discount_per' + cryProdCount).value; // LAB DISCOUNT IN % @PRIYANKA-03MAY18          
                }

                var labDiscountAmt = 0;

                // STONE LAB DISCOUNT TYPE @PRIYANKA-18NOV17
                if (stoneLabDiscType == 'KG') {
                    // STONE WEIGHT TYPE
                    if (productWtType == 'KG')
                        labDiscountAmt = parseFloat(parseFloat(sttr_lab_discount_per) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        labDiscountAmt = parseFloat((parseFloat(sttr_lab_discount_per) / 1000) * parseFloat(productWeight)).toFixed(2);
                    else
                        labDiscountAmt = parseFloat((parseFloat(sttr_lab_discount_per) / (1000 * 1000)) * parseFloat(productWeight)).toFixed(2);

                    // STONE LAB DISCOUNT TYPE @PRIYANKA-18NOV17
                } else if (stoneLabDiscType == 'GM') {

                    // STONE WEIGHT TYPE
                    if (productWtType == 'KG')
                        labDiscountAmt = parseFloat((parseFloat(sttr_lab_discount_per) * 1000) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        labDiscountAmt = parseFloat(parseFloat(sttr_lab_discount_per) * parseFloat(productWeight)).toFixed(2);
                    else
                        labDiscountAmt = parseFloat((parseFloat(sttr_lab_discount_per) / 1000) * parseFloat(productWeight)).toFixed(2);

                    // STONE LAB DISCOUNT TYPE @PRIYANKA-18NOV17
                } else if (stoneLabDiscType == 'MG') {
                    // STONE WEIGHT TYPE
                    if (productWtType == 'KG')
                        labDiscountAmt = parseFloat((parseFloat(sttr_lab_discount_per) * 1000 * 1000) * parseFloat(productWeight)).toFixed(2);
                    else if (productWtType == 'GM')
                        labDiscountAmt = parseFloat((parseFloat(sttr_lab_discount_per) * 1000) * parseFloat(productWeight)).toFixed(2);
                    else
                        labDiscountAmt = parseFloat(parseFloat(sttr_lab_discount_per) * parseFloat(productWeight)).toFixed(2);

                    // STONE LAB DISCOUNT TYPE @PRIYANKA-18NOV17
                } else if (stoneLabDiscType == 'PP') {
                    // STON WEIGHT TYPE
                    labDiscountAmt = parseFloat(parseFloat(sttr_lab_discount_per) * parseFloat(productQTY)).toFixed(2);

                    // STONE LAB DISCOUNT TYPE @PRIYANKA-18NOV17
                } else if (stoneLabDiscType == 'per') {

                    if (typeof (document.getElementById('sttr_total_lab_amt' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_amt' + cryProdCount) != null)) {

                        // CALCULATE STONE LAB DISCOUNT AMT @PRIYANKA-18NOV17
                        labDiscountAmt = ((parseFloat(document.getElementById('sttr_total_lab_amt' + cryProdCount).value)) * parseFloat(sttr_lab_discount_per) / 100).toFixed(2);
                    }

                }

                if (typeof (document.getElementById('sttr_lab_discount_amt' + cryProdCount)) != 'undefined' &&
                        (document.getElementById('sttr_lab_discount_amt' + cryProdCount) != null)) {
                    // STONE LAB DISCOUNT AMT
                    document.getElementById('sttr_lab_discount_amt' + cryProdCount).value = (parseFloat(labDiscountAmt)).toFixed(2);
                }

                if (labDiscountAmt > 0) {

                    if (typeof (document.getElementById('sttr_total_lab_charges' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_charges' + cryProdCount) != null) &&
                            typeof (document.getElementById('sttr_total_lab_amt' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_amt' + cryProdCount) != null)) {
                        // TOTAL LAB CHARGES
                        document.getElementById('sttr_total_lab_charges' + cryProdCount).value = ((parseFloat(document.getElementById('sttr_total_lab_amt' + cryProdCount).value)) -
                                (parseFloat(labDiscountAmt))).toFixed(2);
                    }

                } else {

                    if (typeof (document.getElementById('sttr_total_lab_charges' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_charges' + cryProdCount) != null) &&
                            typeof (document.getElementById('sttr_total_lab_amt' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_amt' + cryProdCount) != null)) {
                        // TOTAL LAB CHARGES
                        document.getElementById('sttr_total_lab_charges' + cryProdCount).value = (parseFloat(document.getElementById('sttr_total_lab_amt' + cryProdCount).value)).toFixed(2);
                    }
                }
            }

        } else if (discountCal != stoneDiscountCalBy && discountCal != stoneLabDiscountCalBy) {

            // START CODE TO CALCULATE LAB DISCOUNT IN % ACCORDING TO LAB DISCOUNT AMT @PRIYANKA-14NOV18       
            if (labTotalAmt > 0) {

                if (typeof (document.getElementById('sttr_lab_discount_amt' + cryProdCount)) != 'undefined' &&
                        (document.getElementById('sttr_lab_discount_amt' + cryProdCount) != null)) {
                    // LAB DISCOUNT AMT @PRIYANKA-14NOV18   
                    var labDiscountAmt = (parseFloat(document.getElementById('sttr_lab_discount_amt' + cryProdCount).value)).toFixed(2);
                }

                // CALCULATE LAB DISCOUNT IN %
                var labDiscountPer = ((parseFloat(labDiscountAmt) * 100) / parseFloat(labTotalAmt));

                if (typeof (document.getElementById('sttr_lab_discount_per' + cryProdCount)) != 'undefined' &&
                        (document.getElementById('sttr_lab_discount_per' + cryProdCount) != null)) {
                    // LAB DISCOUNT IN %
                    document.getElementById('sttr_lab_discount_per' + cryProdCount).value = parseFloat(labDiscountPer);
                }

                if (labDiscountAmt > 0) {

                    if (typeof (document.getElementById('sttr_total_lab_charges' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_charges' + cryProdCount) != null) &&
                            typeof (document.getElementById('sttr_total_lab_amt' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_amt' + cryProdCount) != null)) {
                        // TOTAL LAB CHARGES
                        document.getElementById('sttr_total_lab_charges' + cryProdCount).value = ((parseFloat(document.getElementById('sttr_total_lab_amt' + cryProdCount).value)) -
                                parseFloat(labDiscountAmt)).toFixed(2);
                    }

                } else {

                    if (typeof (document.getElementById('sttr_total_lab_charges' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_charges' + cryProdCount) != null) &&
                            typeof (document.getElementById('sttr_total_lab_amt' + cryProdCount)) != 'undefined' &&
                            (document.getElementById('sttr_total_lab_amt' + cryProdCount) != null)) {
                        // TOTAL LAB CHARGES
                        document.getElementById('sttr_total_lab_charges' + cryProdCount).value = (parseFloat(document.getElementById('sttr_total_lab_amt' + cryProdCount).value)).toFixed(2);
                    }
                }

            }
            // END CODE TO CALCULATE LAB DISCOUNT IN % ACCORDING TO LAB DISCOUNT AMT @PRIYANKA-14NOV18   
        }
        // END CODE FOR LAB DISCOUNT IN % & LAB DISCOUNT AMT @PRIYANKA-14NOV18   
    }

    if (typeof (document.getElementById('sttr_lab_discount_per' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_lab_discount_per' + cryProdCount) != null)) {
        // LAB DISCOUNT IN % @PRIYANKA-14NOV18   
        if (document.getElementById('sttr_lab_discount_per' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_lab_discount_per' + cryProdCount).value = '0';
        }
    }

    if (typeof (document.getElementById('sttr_lab_discount_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_lab_discount_amt' + cryProdCount) != null)) {
        // LAB DISCOUNT IN AMT @PRIYANKA-14NOV18   
        if (document.getElementById('sttr_lab_discount_amt' + cryProdCount).value == 'NaN' ||
                document.getElementById('sttr_lab_discount_amt' + cryProdCount).value == '0') {
            document.getElementById('sttr_lab_discount_amt' + cryProdCount).value = '0.00';
        }
    }

    if (typeof (document.getElementById('sttr_final_taxable_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_final_taxable_amt' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + cryProdCount) != null)) {
        // TAXABLE AMOUNT @PRIYANKA-14NOV18     
        document.getElementById('sttr_final_taxable_amt' + cryProdCount).value = (parseFloat(document.getElementById('sttr_valuation' + cryProdCount).value)).toFixed(2);
    }

    if (typeof (document.getElementById('sttr_final_taxable_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_final_taxable_amt' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_total_lab_charges' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_total_lab_charges' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_total_other_charges' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_total_other_charges' + cryProdCount) != null)) {
        // TAXABLE AMOUNT @PRIYANKA-14NOV18     
        document.getElementById('sttr_final_taxable_amt' + cryProdCount).value = (parseFloat(document.getElementById('sttr_valuation' + cryProdCount).value) +
                parseFloat(document.getElementById('sttr_total_lab_charges' + cryProdCount).value)
                + parseFloat(document.getElementById('sttr_total_other_charges' + cryProdCount).value)).toFixed(2);
    }

    if (typeof (document.getElementById('sttr_final_taxable_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_final_taxable_amt' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_total_lab_charges' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_total_lab_charges' + cryProdCount) != null)) {

        document.getElementById('sttr_final_taxable_amt' + cryProdCount).value = (parseFloat(document.getElementById('sttr_valuation' + cryProdCount).value) +
                parseFloat(document.getElementById('sttr_total_lab_charges' + cryProdCount).value)).toFixed(2);
    }

    if (typeof (document.getElementById('sttr_final_taxable_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_final_taxable_amt' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_valuation' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_valuation' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_total_making_charges' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_total_making_charges' + cryProdCount) != null) &&
            typeof (document.getElementById('sttr_total_other_charges' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_total_other_charges' + cryProdCount) != null)) {
        // TAXABLE AMOUNT @PRIYANKA-14NOV18     
        document.getElementById('sttr_final_taxable_amt' + cryProdCount).value = (parseFloat(document.getElementById('sttr_valuation' + cryProdCount).value) +
                parseFloat(document.getElementById('sttr_total_making_charges' + cryProdCount).value)
                + parseFloat(document.getElementById('sttr_total_other_charges' + cryProdCount).value)).toFixed(2);
    }

    if (typeof (document.getElementById('sttr_final_taxable_amt' + cryProdCount)) != 'undefined' &&
            (document.getElementById('sttr_final_taxable_amt' + cryProdCount) != null)) {
        // TAXABLE AMOUNT @PRIYANKA-14NOV18     
        if (document.getElementById('sttr_final_taxable_amt' + cryProdCount).value == 'NaN') {
            document.getElementById('sttr_final_taxable_amt' + cryProdCount).value = '0.00';
        }
    }

}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR DISCOUNT CALCULATIONS @PRIYANKA-14NOV18     
// *************************************************************************************************************************************

// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION stockFormMergeColumnValueFunc() FOR ADD DATE, MFG DATE, EXP DATE, DELIVERY DATE, ITEM CODE @PRIYANKA-30JAN19
// *************************************************************************************************************************************
function stockFormMergeColumnValueFunc(prodCount) {

    // FOR ADD DATE FIELD @PRIYANKA-30JAN19
    if (typeof (document.getElementById('sttr_add_date')) != 'undefined' &&
            (document.getElementById('sttr_add_date')) != null &&
            typeof (document.getElementById('prodDOBDay')) != 'undefined' &&
            (document.getElementById('prodDOBDay')) != null &&
            typeof (document.getElementById('prodDOBMonth')) != 'undefined' &&
            (document.getElementById('prodDOBMonth')) != null &&
            typeof (document.getElementById('prodDOBYear')) != 'undefined' &&
            (document.getElementById('prodDOBYear')) != null) {
        // FOR ADD DATE FIELD @PRIYANKA-30JAN19
        document.getElementById("sttr_add_date").value = document.getElementById("prodDOBDay").value + " " +
                document.getElementById("prodDOBMonth").value + " " +
                document.getElementById("prodDOBYear").value;

        //alert('sttr_add_date == ' + document.getElementById("sttr_add_date").value);

    }
//alert('sttr_add_date == ' + document.getElementById("sttr_add_date").value);


    // FOR MFG DATE FIELD @PRIYANKA-30JAN19
    if (typeof (document.getElementById('sttr_mfg_date')) != 'undefined' &&
            (document.getElementById('sttr_mfg_date')) != null &&
            typeof (document.getElementById('prodMfgDOBDay')) != 'undefined' &&
            (document.getElementById('prodMfgDOBDay')) != null &&
            typeof (document.getElementById('prodMfgDOBMonth')) != 'undefined' &&
            (document.getElementById('prodMfgDOBMonth')) != null &&
            typeof (document.getElementById('prodMfgDOBYear')) != 'undefined' &&
            (document.getElementById('prodMfgDOBYear')) != null) {
        // FOR MFG DATE FIELD @PRIYANKA-30JAN19
        document.getElementById("sttr_mfg_date").value = document.getElementById("prodMfgDOBDay").value + " " +
                document.getElementById("prodMfgDOBMonth").value + " " +
                document.getElementById("prodMfgDOBYear").value;

    }

    // FOR EXPIRY DATE FIELD @PRIYANKA-30JAN19
    if (typeof (document.getElementById('sttr_exp_date')) != 'undefined' &&
            (document.getElementById('sttr_exp_date')) != null &&
            typeof (document.getElementById('prodExpDOBDay')) != 'undefined' &&
            (document.getElementById('prodExpDOBDay')) != null &&
            typeof (document.getElementById('prodExpDOBMonth')) != 'undefined' &&
            (document.getElementById('prodExpDOBMonth')) != null &&
            typeof (document.getElementById('prodExpDOBYear')) != 'undefined' &&
            (document.getElementById('prodExpDOBYear')) != null) {
        // FOR EXPIRY DATE FIELD @PRIYANKA-30JAN19
        document.getElementById("sttr_exp_date").value = document.getElementById("prodExpDOBDay").value + " " +
                document.getElementById("prodExpDOBMonth").value + " " +
                document.getElementById("prodExpDOBYear").value;

    }


    // FOR DELIVERY DATE FIELD @PRIYANKA-30JAN19
    if (typeof (document.getElementById('sttr_delivery_date')) != 'undefined' &&
            (document.getElementById('sttr_delivery_date')) != null &&
            typeof (document.getElementById('sttr_delivery_date_day')) != 'undefined' &&
            (document.getElementById('sttr_delivery_date_day')) != null &&
            typeof (document.getElementById('sttr_delivery_date_month')) != 'undefined' &&
            (document.getElementById('sttr_delivery_date_month')) != null &&
            typeof (document.getElementById('sttr_delivery_date_year')) != 'undefined' &&
            (document.getElementById('sttr_delivery_date_year')) != null) {
        // FOR DELIVERY DATE FIELD @PRIYANKA-30JAN19
        document.getElementById("sttr_delivery_date").value = document.getElementById("sttr_delivery_date_day").value + " " +
                document.getElementById("sttr_delivery_date_month").value + " " +
                document.getElementById("sttr_delivery_date_year").value;

    }

    // FOR ITEM CODE FIELD FOR WHOLESALE PRODUCT @PRIYANKA-31JAN19
    if (typeof (document.getElementById('sttr_item_code' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_code' + prodCount)) != null &&
            typeof (document.getElementById('sttr_item_pre_id' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_pre_id' + prodCount)) != null) {
        // FOR ITEM CODE FIELD FOR WHOLESALE PRODUCT @PRIYANKA-31JAN19
        var prodPreId = document.getElementById('sttr_item_pre_id' + prodCount).value;
        if (prodPreId.charAt(prodPreId.length - 1) != '#') {
            prodPreId += '#';
        }
        document.getElementById('sttr_item_code' + prodCount).value = prodPreId;

        //alert('sttr_item_code @== ' + document.getElementById("sttr_item_code").value);
    }

    //alert('sttr_item_code #== ' + document.getElementById("sttr_item_code").value);
    //alert('sttr_item_pre_id #== ' + document.getElementById("sttr_item_pre_id").value);
    //alert('sttr_item_id #== ' + document.getElementById("sttr_item_id").value);

    // FOR ITEM CODE FIELD FOR RETAIL PRODUCT @PRIYANKA-31JAN19
    if (typeof (document.getElementById('sttr_item_code' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_code' + prodCount)) != null &&
            typeof (document.getElementById('sttr_item_pre_id' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_pre_id' + prodCount)) != null &&
            typeof (document.getElementById('sttr_item_id' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_id' + prodCount)) != null) {
        // FOR ITEM CODE FIELD RETAIL PRODUCT @PRIYANKA-31JAN19    
        var prodPreId = document.getElementById('sttr_item_pre_id' + prodCount).value;
        if (prodPreId.charAt(prodPreId.length - 1) != '#') {
            prodPreId += '#';
        }
        document.getElementById('sttr_item_code' + prodCount).value = prodPreId + document.getElementById("sttr_item_id" + prodCount).value;

        //alert('sttr_item_code #== ' + document.getElementById("sttr_item_code").value);

    }

    // FOR ITEM CODE FIELD FOR WHOLESALE PRODUCT @PRIYANKA-30JAN19
    if (typeof (document.getElementById('sttr_item_code' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_code' + prodCount)) != null &&
            typeof (document.getElementById('sttr_item_pre_id' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_pre_id' + prodCount)) != null) {
        // FOR ITEM CODE FIELD FOR WHOLESALE PRODUCT @PRIYANKA-30JAN19
        var prodPreId = document.getElementById('sttr_item_pre_id' + prodCount).value;
        if (prodPreId.charAt(prodPreId.length - 1) != '#') {
            prodPreId += '#';
        }
        document.getElementById('sttr_item_code' + prodCount).value = prodPreId;

        //alert('sttr_item_code @@== ' + document.getElementById("sttr_item_code" + prodCount).value);
    }

    //alert('sttr_item_code ##== ' + document.getElementById("sttr_item_code" + prodCount).value);
    //alert('sttr_item_pre_id ##== ' + document.getElementById("sttr_item_pre_id" + prodCount).value);
    //alert('sttr_item_id ##== ' + document.getElementById("sttr_item_id" + prodCount).value);

    // FOR ITEM CODE FIELD FOR RETAIL PRODUCT @PRIYANKA-30JAN19
    if (typeof (document.getElementById('sttr_item_code' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_code' + prodCount)) != null &&
            typeof (document.getElementById('sttr_item_pre_id' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_pre_id' + prodCount)) != null &&
            typeof (document.getElementById('sttr_item_id' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_id' + prodCount)) != null) {
        // FOR ITEM CODE FIELD RETAIL PRODUCT @PRIYANKA-30JAN19    
        var prodPreId = document.getElementById('sttr_item_pre_id' + prodCount).value;
        if (prodPreId.charAt(prodPreId.length - 1) != '#') {
            prodPreId += '#';
        }
        document.getElementById('sttr_item_code' + prodCount).value = prodPreId + document.getElementById("sttr_item_id" + prodCount).value;

//        alert('sttr_item_code ##== ' + document.getElementById("sttr_item_code" + prodCount).value);

    }

    // FOR METAL TYPE FIELD @PRIYANKA-20JAN19
    if (typeof (document.getElementById('sttr_metal_type')) != 'undefined' &&
            (document.getElementById('sttr_metal_type')) != null &&
            typeof (document.getElementById('sttr_product_type')) != 'undefined' &&
            (document.getElementById('sttr_product_type')) != null) {
        // FOR METAL TYPE FIELD @PRIYANKA-20JAN19
        document.getElementById("sttr_metal_type").value = document.getElementById("sttr_product_type").value;

        //alert('sttr_metal_type #== ' + document.getElementById("sttr_metal_type").value);

    }

    // FOR METAL TYPE FIELD @PRIYANKA-20JAN19
    if (typeof (document.getElementById('sttr_metal_type' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_type' + prodCount)) != null &&
            typeof (document.getElementById('sttr_product_type' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_product_type' + prodCount)) != null) {
        // FOR METAL TYPE FIELD @PRIYANKA-20JAN19
        document.getElementById("sttr_metal_type" + prodCount).value = document.getElementById("sttr_product_type" + prodCount).value;

        //alert('sttr_metal_type ##== ' + document.getElementById("sttr_metal_type" + prodCount).value);

    }

    // FOR METAL RATE FIELD @PRIYANKA-20JAN19
    if (typeof (document.getElementById('sttr_metal_rate')) != 'undefined' &&
            (document.getElementById('sttr_metal_rate')) != null &&
            typeof (document.getElementById('sttr_product_purchase_rate')) != 'undefined' &&
            (document.getElementById('sttr_product_purchase_rate')) != null) {
        // FOR METAL RATE FIELD @PRIYANKA-20JAN19  
        document.getElementById("sttr_metal_rate").value = document.getElementById("sttr_product_purchase_rate").value;

        //alert('sttr_metal_rate #== ' + document.getElementById("sttr_metal_rate").value);

    }

    // FOR METAL RATE FIELD @PRIYANKA-20JAN19
    if (typeof (document.getElementById('sttr_metal_rate' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_metal_rate' + prodCount)) != null &&
            typeof (document.getElementById('sttr_product_purchase_rate' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_product_purchase_rate' + prodCount)) != null) {
        // FOR METAL RATE FIELD @PRIYANKA-20JAN19  
        document.getElementById("sttr_metal_rate" + prodCount).value = document.getElementById("sttr_product_purchase_rate" + prodCount).value;

        //alert('sttr_metal_rate ##== ' + document.getElementById("sttr_metal_rate" + prodCount).value);

    }

}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION stockFormMergeColumnValueFunc() FOR ADD DATE, MFG DATE, EXP DATE, DELIVERY DATE, ITEM CODE @PRIYANKA-30JAN19
// *************************************************************************************************************************************
//
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR RESET PRODUCT LIST @PRIYANKA-17JULY19
// *************************************************************************************************************************************
function resetProductList(prodIndicator) {
    //
    var documentRootPath = document.getElementById('documentRootPath').value;
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("stockPreviousProdDetails").innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/stock/omProductResetList.php?prodIndicator=" + prodIndicator
            + "&documentRootPath=" + documentRootPath, true);
    //
    xmlhttp.send();
}
// *************************************************************************************************************************************
// END OF CODE TO ADD FUNCTION FOR RESET PRODUCT LIST @PRIYANKA-17JULY19
// *************************************************************************************************************************************
//
//
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR UPDATE INVOICE @PRIYANKA-18JULY19
// *************************************************************************************************************************************
/* START CODE TO MODIFY FUNCTION [ONE MORE PARAMETER ADDED i.e sttrSttrInId] FOR GETTING ALL DETAILS AT UPDATE PANEL @AUTHOR:MADHUREE-02APRIL2020 */
function stock_transaction_invoice_update_operation(utinId, userId, firmId, operation,
        prodPreInvNo, prodInvNo, transactionType, stockType, indicator,
        panelName, payPanelName, transPanelName, div, sttrSttrInId) {
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    xmlhttp.open("POST", "include/php/stock/omStockTransForm.php?utinId=" + utinId
            + "&userId=" + userId + "&firmId=" + firmId + "&operation=" + operation
            + "&prodPreInvNo=" + prodPreInvNo + "&prodInvNo=" + prodInvNo + "&stockType=" + stockType
            + "&transactionType=" + transactionType + "&transType=" + transactionType + "&indicator=" + indicator
            + "&panelName=" + panelName + "&payPanelName=" + payPanelName + "&transPanelName=" + transPanelName + "&sttr_sttrin_id=" + sttrSttrInId, true);
    //
    xmlhttp.send();
}
/* END CODE TO MODIFY FUNCTION [ONE MORE PARAMETER ADDED i.e sttrSttrInId] FOR GETTING ALL DETAILS AT UPDATE PANEL @AUTHOR:MADHUREE-02APRIL2020 */
// *************************************************************************************************************************************
// END OF CODE TO ADD FUNCTION FOR UPDATE INVOICE @PRIYANKA-18JULY19
// *************************************************************************************************************************************
//
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR RELOAD THE PACKING LIST @PRIYANKA-30JULY19
// *************************************************************************************************************************************
function reloadTheProductList(sttr_id, sttr_user_id) {
    //
    //alert('sttr_id @@== ' + sttr_id);    
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            window.parent.document.getElementById("info-popup-" + sttr_id).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", "omStockTransFormPopUp.php?sttr_id=" + sttr_id + "&sttr_user_id=" + sttr_user_id, true);
    //
    xmlhttp.send();
}
// Export in Excel Code

$(document).ready(function () {
    $("[id$=myButtonControlID]").click(function (e) {
        window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('div[id$=divTableDataHolder]').html()));
        e.preventDefault();
    });
});

//
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR RELOAD THE PACKING LIST @PRIYANKA-30JULY19
// *************************************************************************************************************************************
//
//
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR CALCULATE LESS WEIGHT @PRIYANKA-20AUG2019
// *************************************************************************************************************************************
//
function calcLessWeightFunc(prodCount, process, discountCal) {

    // PRODUCT PKT WEIGHT AND PRODUCT QUANTITY @PRIYANKA-20AUG2019
    if (typeof (document.getElementById('sttr_pkt_weight' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_pkt_weight' + prodCount) != null) &&
            typeof (document.getElementById('sttr_quantity' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_quantity' + prodCount) != null)) {

        // PRODUCT PKT WEIGHT @PRIYANKA-20AUG2019
        if (document.getElementById('sttr_pkt_weight' + prodCount).value == '' ||
                document.getElementById('sttr_pkt_weight' + prodCount).value == 'NaN') {
            document.getElementById('sttr_pkt_weight' + prodCount).value = 0;
        }

        // CALCULATE LESS WEIGHT @PRIYANKA-20AUG2019
        var lessWeight = parseFloat(parseFloat(document.getElementById('sttr_quantity' + prodCount).value) * parseFloat(document.getElementById('sttr_pkt_weight' + prodCount).value)).toFixed(3);
        document.getElementById('sttr_pkt_weight' + prodCount).value = parseFloat(lessWeight).toFixed(3);

    }
}
//
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR CALCULATE LESS WEIGHT @PRIYANKA-20AUG2019
// *************************************************************************************************************************************
//
//
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR SET DATA ACCORDING TO MASTER DATA @PRIYANKA-16SEP2019
// *************************************************************************************************************************************
//
function setFieldsDataByMasterData(userId, prodType, prodCategory, prodName, prodCode, prodMergedCount, stockIframe, sttr_transaction_type) {
    //
//    alert('userId 1== ' + userId);
//    alert('prodType 1== ' + prodType);
//    alert('prodCategory 1== ' + prodCategory);
//    alert('prodName 1== ' + prodName);
//    alert('prodCode 1== ' + prodCode);
//    alert('prodMergedCount 1== ' + prodMergedCount);
//    alert('stockIframe 1== ' + stockIframe);
    loadXMLDoc2();
    xmlhttp2.onreadystatechange = function () {
        if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("setStockDataByMasterDataMainDiv").innerHTML = xmlhttp2.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    if (stockIframe == 'Y') {
        //
        xmlhttp2.open("POST", "omSetFieldsDataByMasterData.php?userId=" + encodeURIComponent(userId)
                + "&prodType=" + encodeURIComponent(prodType)
                + "&prodCategory=" + encodeURIComponent(prodCategory) + "&prodName=" + encodeURIComponent(prodName)
                + "&prodCode=" + encodeURIComponent(prodCode) + "&prodMergedCount=" + encodeURIComponent(prodMergedCount)
                + "&sttr_transaction_type=" + encodeURIComponent(sttr_transaction_type), true);
        //
        xmlhttp2.send();
        //
    } else {
        //
        xmlhttp2.open("POST", "include/php/stock/omSetFieldsDataByMasterData.php?userId=" + encodeURIComponent(userId)
                + "&prodType=" + encodeURIComponent(prodType)
                + "&prodCategory=" + encodeURIComponent(prodCategory) + "&prodName=" + encodeURIComponent(prodName)
                + "&prodCode=" + encodeURIComponent(prodCode) + "&prodMergedCount=" + encodeURIComponent(prodMergedCount), true);
        xmlhttp2.send();
        //
    }
    //
}
//
//
function setFieldsDataByMasterDataDisplay(ms_sub_itm_from_wt, ms_sub_itm_to_wt,
        ms_sub_itm_wstg_max, ms_sub_itm_wstg_min, ms_sub_itm_wstg_max_per, ms_sub_itm_wstg_min_per,
        ms_sub_itm_mkg_max, ms_sub_itm_mkg_min, ms_sub_itm_mkg_max_gm, ms_sub_itm_mkg_min_gm,
        ms_sub_itm_mkg_max_pp, ms_sub_itm_mkg_min_pp, ms_sub_itm_mkg_max_fx, ms_sub_itm_mkg_min_fx,
        ms_sub_itm_disc_max_gm, ms_sub_itm_disc_min_gm, ms_sub_itm_disc_max_pp, ms_sub_itm_disc_min_pp,
        ms_sub_itm_disc_mkg_max_fx, ms_sub_itm_disc_mkg_min_fx,
        userId, prodType, prodCategory, prodName, prodCode, prodMergedCount, sttr_transaction_type) {
    //
    //alert('ms_sub_itm_from_wt == ' + ms_sub_itm_from_wt);
    //alert('ms_sub_itm_to_wt == ' + ms_sub_itm_to_wt);
//    alert('ms_sub_itm_wstg_max == ' + ms_sub_itm_wstg_max);
//    alert('ms_sub_itm_wstg_min == ' + ms_sub_itm_wstg_min);
    //alert('ms_sub_itm_wstg_max_per == ' + ms_sub_itm_wstg_max_per);
    //alert('ms_sub_itm_wstg_min_per == ' + ms_sub_itm_wstg_min_per);
    //alert('ms_sub_itm_mkg_max == ' + ms_sub_itm_mkg_max);
    //alert('ms_sub_itm_mkg_min == ' + ms_sub_itm_mkg_min);
    //alert('ms_sub_itm_mkg_max_gm == ' + ms_sub_itm_mkg_max_gm);
    //alert('ms_sub_itm_mkg_min_gm == ' + ms_sub_itm_mkg_min_gm);
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
    //
    //alert('userId 2== ' + userId);
    //alert('prodType 2== ' + prodType);
    //alert('prodCategory 2== ' + prodCategory);
    //alert('prodName 2== ' + prodName);
    //alert('prodCode 2== ' + prodCode);
    //alert('prodMergedCount 2== ' + prodMergedCount);
    //
    //
    // WEIGHT COLUMNS @PRIYANKA-16SEP2019
    //document.getElementById('ms_sub_itm_from_wt').value = ms_sub_itm_from_wt;
    //document.getElementById('ms_sub_itm_to_wt').value = ms_sub_itm_to_wt;
    //
    // WASTAGE COLUMNS @PRIYANKA-16SEP2019
    //document.getElementById('ms_sub_itm_wstg_max').value = ms_sub_itm_wstg_max;
    //document.getElementById('ms_sub_itm_wstg_min').value = ms_sub_itm_wstg_min;
    //document.getElementById('ms_sub_itm_wstg_max_per').value = ms_sub_itm_wstg_max_per;
    //document.getElementById('ms_sub_itm_wstg_min_per').value = ms_sub_itm_wstg_min_per;
    //
    // MAKING CHARGES COLUMNS @PRIYANKA-16SEP2019
    //document.getElementById('ms_sub_itm_mkg_max').value = ms_sub_itm_mkg_max;
    //document.getElementById('ms_sub_itm_mkg_min').value = ms_sub_itm_mkg_min;
    //document.getElementById('ms_sub_itm_mkg_max_gm').value = ms_sub_itm_mkg_max_gm;
    //document.getElementById('ms_sub_itm_mkg_min_gm').value = ms_sub_itm_mkg_min_gm;
    //document.getElementById('ms_sub_itm_mkg_max_pp').value = ms_sub_itm_mkg_max_pp;
    //document.getElementById('ms_sub_itm_mkg_min_pp').value = ms_sub_itm_mkg_min_pp;
    //document.getElementById('ms_sub_itm_mkg_max_fx').value = ms_sub_itm_mkg_max_fx;
    //document.getElementById('ms_sub_itm_mkg_min_fx').value = ms_sub_itm_mkg_min_fx;
    //
    // DISCOUNT COLUMNS @PRIYANKA-16SEP2019
    //document.getElementById('ms_sub_itm_disc_max_gm').value = ms_sub_itm_disc_max_gm;
    //document.getElementById('ms_sub_itm_disc_min_gm').value = ms_sub_itm_disc_min_gm;
    //document.getElementById('ms_sub_itm_disc_max_pp').value = ms_sub_itm_disc_max_pp;
    //document.getElementById('ms_sub_itm_disc_min_pp').value = ms_sub_itm_disc_min_pp;
    //document.getElementById('ms_sub_itm_disc_mkg_max_fx').value = ms_sub_itm_disc_mkg_max_fx;
    //document.getElementById('ms_sub_itm_disc_mkg_min_fx').value = ms_sub_itm_disc_mkg_min_fx;
    //
    //document.getElementById('sttr_product_type' + prodMergedCount).value = prodType;
    //document.getElementById('sttr_item_category' + prodMergedCount).value = prodCategory;
    //document.getElementById('sttr_item_name' + prodMergedCount).value = prodName;
    //document.getElementById('sttr_item_pre_id' + prodMergedCount).value = prodCode;
    //
    //
    // GROSS WEIGHT @PRIYANKA-16SEP2019
//    if (typeof (document.getElementById('sttr_gs_weight' + prodMergedCount)) != 'undefined' &&
//               (document.getElementById('sttr_gs_weight' + prodMergedCount) != null)) {
//                document.getElementById('sttr_gs_weight' + prodMergedCount).value = ms_sub_itm_from_wt;
//    }
//    //
//    // GROSS WEIGHT TYPE (BY DEFAULT GM) @PRIYANKA-17SEP2019
//    if (typeof (document.getElementById('sttr_gs_weight_type' + prodMergedCount)) != 'undefined' &&
//               (document.getElementById('sttr_gs_weight_type' + prodMergedCount) != null)) {
//                document.getElementById('sttr_gs_weight_type' + prodMergedCount).value = 'GM';
//    }
    //
    // WASTAGE @PRIYANKA-16SEP2019
    if (typeof (document.getElementById('sttr_wastage' + prodMergedCount)) != 'undefined' &&
            (document.getElementById('sttr_wastage' + prodMergedCount) != null) && ms_sub_itm_wstg_min != '') {
        document.getElementById('sttr_wastage' + prodMergedCount).value = ms_sub_itm_wstg_min;
        document.getElementById('sttr_wastage' + prodMergedCount).readOnly = true;
    }
    //
    if (sttr_transaction_type == 'sell') {
        // MAKING CHARGES AND MAKING CHARGES TYPE (BY DEFAULT GM) @PRIYANKA-16SEP2019
        if (typeof (document.getElementById('sttr_making_charges' + prodMergedCount)) != 'undefined' &&
                (document.getElementById('sttr_making_charges' + prodMergedCount) != null) && ms_sub_itm_mkg_min_gm != '') {
            document.getElementById('sttr_making_charges' + prodMergedCount).value = ms_sub_itm_mkg_min_gm;
            document.getElementById('sttr_making_charges' + prodMergedCount).readOnly = true;
        }
        // MAKING CHARGES TYPE (BY DEFAULT GM) @PRIYANKA-17SEP2019
        if (typeof (document.getElementById('sttr_making_charges_type' + prodMergedCount)) != 'undefined' &&
                (document.getElementById('sttr_making_charges_type' + prodMergedCount) != null) && ms_sub_itm_mkg_min_gm != '') {
            document.getElementById('sttr_making_charges_type' + prodMergedCount).value = 'GM';
            document.getElementById('sttr_making_charges_type' + prodMergedCount).readOnly = true;
        }
    } else {
        // Labour CHARGES AND MAKING CHARGES TYPE (BY DEFAULT GM) @PRIYANKA-16SEP2019
        if (typeof (document.getElementById('sttr_lab_charges' + prodMergedCount)) != 'undefined' &&
                (document.getElementById('sttr_lab_charges' + prodMergedCount) != null) && ms_sub_itm_mkg_min_gm != '') {
            document.getElementById('sttr_lab_charges' + prodMergedCount).value = ms_sub_itm_mkg_min_gm;
            document.getElementById('sttr_lab_charges' + prodMergedCount).readOnly = true;
        }
        // MAKING CHARGES TYPE (BY DEFAULT GM) @PRIYANKA-17SEP2019
        if (typeof (document.getElementById('sttr_lab_charges_type' + prodMergedCount)) != 'undefined' &&
                (document.getElementById('sttr_lab_charges_type' + prodMergedCount) != null) && ms_sub_itm_mkg_min_gm != '') {
            document.getElementById('sttr_lab_charges_type' + prodMergedCount).value = 'GM';
            document.getElementById('sttr_lab_charges_type' + prodMergedCount).readOnly = true;
        }
    }
    //

    //
}
//
//
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR SET DATA ACCORDING TO MASTER DATA @PRIYANKA-16SEP2019
// *************************************************************************************************************************************
//
//
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR RESET PRODUCT LIST @PRIYANKA-24SEP19
// *************************************************************************************************************************************
function makeInvoice(userId, prodPreInvNo, prodInvNo, panelName, divName) {
    //
    var documentRootPath = document.getElementById('documentRootPath').value;
    //
    var str = divName.split('|');
    var divNamePanelName = str[1];
    var divStr = divNamePanelName.split('*');
    var div = divStr[0];
    //
    loadXMLDoc();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById(div).innerHTML = xmlhttp.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    xmlhttp.open("POST", documentRootPath + "/include/php/stock/omMakeInvoice.php?userId=" + userId
            + "&documentRootPath=" + documentRootPath + "&panelName=" + panelName + "&divName=" + div
            + "&prodPreInvNo=" + prodPreInvNo + "&prodInvNo=" + prodInvNo, true);
    //
    xmlhttp.send();
}
// *************************************************************************************************************************************
// END OF CODE TO ADD FUNCTION FOR RESET PRODUCT LIST @PRIYANKA-24SEP19
// *************************************************************************************************************************************
// 
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR SET HIDDEN PARAMETERS DATA ACCORDING TO MASTER DATA @AUTHOR:MADHUREE-11JAN2020
// *************************************************************************************************************************************

function setFieldsDataByMasterDataToHiddenParameters(ms_sub_itm_from_wt, ms_sub_itm_to_wt,
        ms_sub_itm_wstg_max, ms_sub_itm_wstg_min, ms_sub_itm_wstg_max_per, ms_sub_itm_wstg_min_per,
        ms_sub_itm_mkg_max, ms_sub_itm_mkg_min, ms_sub_itm_mkg_max_gm, ms_sub_itm_mkg_min_gm,
        ms_sub_itm_mkg_max_pp, ms_sub_itm_mkg_min_pp, ms_sub_itm_mkg_max_fx, ms_sub_itm_mkg_min_fx,
        ms_sub_itm_disc_max_gm, ms_sub_itm_disc_min_gm, ms_sub_itm_disc_max_pp, ms_sub_itm_disc_min_pp,
        ms_sub_itm_disc_mkg_max_fx, ms_sub_itm_disc_mkg_min_fx,
        userId, prodType, prodCategory, prodName, prodCode, prodMergedCount, sttr_transaction_type, ms_itm_purity) {
    //
    //alert('ms_sub_itm_from_wt == ' + ms_sub_itm_from_wt);
    //alert('ms_sub_itm_to_wt == ' + ms_sub_itm_to_wt);
//    alert('ms_sub_itm_wstg_max == ' + ms_sub_itm_wstg_max);
//    alert('ms_sub_itm_wstg_min == ' + ms_sub_itm_wstg_min);
    //alert('ms_sub_itm_wstg_max_per == ' + ms_sub_itm_wstg_max_per);
//    alert('ms_sub_itm_wstg_min_per == ' + ms_sub_itm_wstg_min_per);
    //alert('ms_sub_itm_mkg_max == ' + ms_sub_itm_mkg_max);
    //alert('ms_sub_itm_mkg_min == ' + ms_sub_itm_mkg_min);
    //alert('ms_sub_itm_mkg_max_gm == ' + ms_sub_itm_mkg_max_gm);
//    alert('ms_sub_itm_mkg_min_gm == ' + ms_sub_itm_mkg_min_gm);
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
//    alert('ms_itm_purity == ' + ms_itm_purity);
    //
    //alert('userId 2== ' + userId);
    //alert('prodType 2== ' + prodType);
    //alert('prodCategory 2== ' + prodCategory);
    //alert('prodName 2== ' + prodName);
    //alert('prodCode 2== ' + prodCode);
    //alert('prodMergedCount 2== ' + prodMergedCount);
    //
    //
    // WEIGHT COLUMNS @AUTHOR:MADHUREE-11JAN2020
    //document.getElementById('ms_sub_itm_from_wt').value = ms_sub_itm_from_wt;
    //document.getElementById('ms_sub_itm_to_wt').value = ms_sub_itm_to_wt;
    //
    // WASTAGE COLUMNS @AUTHOR:MADHUREE-11JAN2020
    //document.getElementById('ms_sub_itm_wstg_max').value = ms_sub_itm_wstg_max;
    //document.getElementById('ms_sub_itm_wstg_min').value = ms_sub_itm_wstg_min;
    //document.getElementById('ms_sub_itm_wstg_max_per').value = ms_sub_itm_wstg_max_per;
    //document.getElementById('ms_sub_itm_wstg_min_per').value = ms_sub_itm_wstg_min_per;
    //
    // MAKING CHARGES COLUMNS @AUTHOR:MADHUREE-11JAN2020
    //document.getElementById('ms_sub_itm_mkg_max').value = ms_sub_itm_mkg_max;
    //document.getElementById('ms_sub_itm_mkg_min').value = ms_sub_itm_mkg_min;
    //document.getElementById('ms_sub_itm_mkg_max_gm').value = ms_sub_itm_mkg_max_gm;
    //document.getElementById('ms_sub_itm_mkg_min_gm').value = ms_sub_itm_mkg_min_gm;
    //document.getElementById('ms_sub_itm_mkg_max_pp').value = ms_sub_itm_mkg_max_pp;
    //document.getElementById('ms_sub_itm_mkg_min_pp').value = ms_sub_itm_mkg_min_pp;
    //document.getElementById('ms_sub_itm_mkg_max_fx').value = ms_sub_itm_mkg_max_fx;
    //document.getElementById('ms_sub_itm_mkg_min_fx').value = ms_sub_itm_mkg_min_fx;
    //
    // DISCOUNT COLUMNS @AUTHOR:MADHUREE-11JAN2020
    //document.getElementById('ms_sub_itm_disc_max_gm').value = ms_sub_itm_disc_max_gm;
    //document.getElementById('ms_sub_itm_disc_min_gm').value = ms_sub_itm_disc_min_gm;
    //document.getElementById('ms_sub_itm_disc_max_pp').value = ms_sub_itm_disc_max_pp;
    //document.getElementById('ms_sub_itm_disc_min_pp').value = ms_sub_itm_disc_min_pp;
    //document.getElementById('ms_sub_itm_disc_mkg_max_fx').value = ms_sub_itm_disc_mkg_max_fx;
    //document.getElementById('ms_sub_itm_disc_mkg_min_fx').value = ms_sub_itm_disc_mkg_min_fx;
    //
    //document.getElementById('sttr_product_type' + prodMergedCount).value = prodType;
    //document.getElementById('sttr_item_category' + prodMergedCount).value = prodCategory;
    //document.getElementById('sttr_item_name' + prodMergedCount).value = prodName;
    //document.getElementById('sttr_item_pre_id' + prodMergedCount).value = prodCode;
    //
    //
    // GROSS WEIGHT @AUTHOR:MADHUREE-11JAN2020
//    if (typeof (document.getElementById('sttr_gs_weight' + prodMergedCount)) != 'undefined' &&
//               (document.getElementById('sttr_gs_weight' + prodMergedCount) != null)) {
//                document.getElementById('sttr_gs_weight' + prodMergedCount).value = ms_sub_itm_from_wt;
//    }
//    //
//    // GROSS WEIGHT TYPE (BY DEFAULT GM) @AUTHOR:MADHUREE-11JAN2020
//    if (typeof (document.getElementById('sttr_gs_weight_type' + prodMergedCount)) != 'undefined' &&
//               (document.getElementById('sttr_gs_weight_type' + prodMergedCount) != null)) {
//                document.getElementById('sttr_gs_weight_type' + prodMergedCount).value = 'GM';
//    }
    // PURITY @AUTHOR:MADHUREE-23JAN2020
    if (typeof (document.getElementById('sttr_purity' + prodMergedCount)) != 'undefined' &&
            (document.getElementById('sttr_purity' + prodMergedCount) != null) && ms_itm_purity != '') {
        document.getElementById('hidden_sttr_purity' + prodMergedCount).value = ms_itm_purity;
    }
    //
    // WASTAGE @AUTHOR:MADHUREE-11JAN2020
    if (typeof (document.getElementById('sttr_wastage' + prodMergedCount)) != 'undefined' &&
            (document.getElementById('sttr_wastage' + prodMergedCount) != null) && ms_sub_itm_wstg_min != '') {
        document.getElementById('hidden_sttr_wastage' + prodMergedCount).value = ms_sub_itm_wstg_min;
    }
    //
    if (sttr_transaction_type == 'sell') {
        // MAKING CHARGES @AUTHOR:MADHUREE-11JAN2020
        if (typeof (document.getElementById('sttr_making_charges' + prodMergedCount)) != 'undefined' &&
                (document.getElementById('sttr_making_charges' + prodMergedCount) != null) && ms_sub_itm_mkg_min_gm != '') {
            document.getElementById('hidden_sttr_making_charges' + prodMergedCount).value = ms_sub_itm_mkg_min_gm;
        }
        // MAKING CHARGES TYPE (BY DEFAULT GM) @AUTHOR:MADHUREE-11JAN2020
        if (typeof (document.getElementById('sttr_making_charges_type' + prodMergedCount)) != 'undefined' &&
                (document.getElementById('sttr_making_charges_type' + prodMergedCount) != null) && ms_sub_itm_mkg_min_gm != '') {
            document.getElementById('hidden_sttr_making_charges_type' + prodMergedCount).value = 'GM';
        }
    } else {
        // LABOUR CHARGES @AUTHOR:MADHUREE-11JAN2020
        if (typeof (document.getElementById('sttr_lab_charges' + prodMergedCount)) != 'undefined' &&
                (document.getElementById('sttr_lab_charges' + prodMergedCount) != null) && ms_sub_itm_mkg_min_gm != '') {
            document.getElementById('hidden_sttr_lab_charges' + prodMergedCount).value = ms_sub_itm_mkg_min_gm;
        }
        // LABOUR CHARGES TYPE (BY DEFAULT GM) @AUTHOR:MADHUREE-11JAN2020
        if (typeof (document.getElementById('sttr_lab_charges_type' + prodMergedCount)) != 'undefined' &&
                (document.getElementById('sttr_lab_charges_type' + prodMergedCount) != null) && ms_sub_itm_mkg_min_gm != '') {
            document.getElementById('hidden_sttr_lab_charges_type' + prodMergedCount).value = 'GM';
        }
    }
}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR SET HIDDEN PARAMETERS DATA ACCORDING TO MASTER DATA @AUTHOR:MADHUREE-11JAN2020
// *************************************************************************************************************************************
//
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR CALCULATE THE PURITY ACCORDING TO PURITY IN CARAT FOR RETAIL FINE B6 FORM @AUTHOR:MADHUREE-14FEB2020
// *************************************************************************************************************************************
function calculatePurityAccordingToPurityInCarat(prodCount) {
    //
    if (typeof (document.getElementById('sttr_purity_ct' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_purity_ct' + prodCount) != null) &&
            typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_purity' + prodCount) != null)) {
        //alert(document.getElementById('sttr_purity_ct' + prodCount).value);
        // PRODUCT PURITY IN CARAT
        document.getElementById('sttr_purity' + prodCount).value = (parseFloat(100 * (document.getElementById('sttr_purity_ct' + prodCount).value)) / 24).toFixed(2);
        //alert(document.getElementById('sttr_purity' + prodCount).value);
    }
    //
}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR CALCULATE THE PURITY ACCORDING TO PURITY IN CARAT FOR RETAIL FINE B6 FORM @AUTHOR:MADHUREE-14FEB2020
// *************************************************************************************************************************************
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR SET THE CATEGORY AND NAME ACCORDING TO SELECTED PRE-ID @AUTHOR:MADHUREE-23MARCH2020
// *************************************************************************************************************************************
function setFieldsDataByMasterPreIdData(itemPreId, itemCategory, itemName, itemSize, itemPurity, itemPurchaseRate, itemSellRate, prodCount) {
    // PRODUCT ID @AUTHOR:MADHUREE-23MARCH2020
    if (typeof (document.getElementById('sttr_item_pre_id' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_pre_id' + prodCount) != null) && itemPreId != '') {
        document.getElementById('sttr_item_pre_id' + prodCount).value = itemPreId;
    }
    // PRODUCT CATEGORY @AUTHOR:MADHUREE-23MARCH2020
    if (typeof (document.getElementById('sttr_item_category' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_category' + prodCount) != null) && itemCategory != '') {
        document.getElementById('sttr_item_category' + prodCount).value = itemCategory;
    }
    // PRODUCT NAME @AUTHOR:MADHUREE-23MARCH2020
    if (typeof (document.getElementById('sttr_item_name' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_name' + prodCount) != null) && itemName != '') {
        document.getElementById('sttr_item_name' + prodCount).value = itemName;
    }
    // PRODUCT SIZE @AUTHOR:MADHUREE-23MARCH2020
    if (typeof (document.getElementById('sttr_size' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_size' + prodCount) != null) && itemSize != '') {
        document.getElementById('sttr_size' + prodCount).value = itemSize;
    }
    // PRODUCT PURITY @AUTHOR:MADHUREE-23MARCH2020
    if (typeof (document.getElementById('sttr_purity_ct' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_purity_ct' + prodCount) != null) && itemPurity != '') {
        document.getElementById('sttr_purity_ct' + prodCount).value = itemPurity;
    }
    // PRODUCT PURCHASE RATE @AUTHOR:MADHUREE-23MARCH2020
    if (typeof (document.getElementById('sttr_product_purchase_rate' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_product_purchase_rate' + prodCount) != null) && itemPurchaseRate != '') {
        document.getElementById('sttr_product_purchase_rate' + prodCount).value = itemPurchaseRate;
    }
    // PRODUCT SELL RATE @AUTHOR:MADHUREE-23MARCH2020
    if (typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_product_sell_rate' + prodCount) != null) && itemSellRate != '') {
        document.getElementById('sttr_product_sell_rate' + prodCount).value = itemSellRate;
    }
    // FOCUS PRODUCT QUANTITY @AUTHOR:MADHUREE-31MARCH2020
    if (document.getElementById('sttr_item_category' + prodCount).value != '' && document.getElementById('sttr_item_name' + prodCount).value != '') {
        if (typeof (document.getElementById('sttr_quantity' + prodCount)) != 'undefined' &&
                (document.getElementById('sttr_quantity' + prodCount) != null)) {
            document.getElementById('sttr_quantity' + prodCount).focus();
        }
    }
}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR SET THE CATEGORY AND NAME ACCORDING TO SELECTED PRE-ID @AUTHOR:MADHUREE-23MARCH2020
// *************************************************************************************************************************************
// *************************************************************************************************************************************
// START CODE TO ADD FUNCTION FOR SET THE CATEGORY AND NAME ACCORDING TO SELECTED PRE-ID @AUTHOR:MADHUREE-23MARCH2020
// *************************************************************************************************************************************
function setFieldsDataByPreId(userId, prodType, prodCode, prodMergedCount, stockIframe) {
//    alert('userId : ' + userId);
//    alert('prodType : ' + prodType);
//    alert('prodCode : ' + prodCode);
//    alert('prodMergedCount : ' + prodMergedCount);
    //    alert('stockIframe : ' + stockIframe);
    loadXMLDoc3();
    xmlhttp3.onreadystatechange = function () {
        if (xmlhttp3.readyState === 4 && xmlhttp3.status === 200) {
            document.getElementById("main_ajax_loading_div").style.visibility = "hidden";
            document.getElementById("setStockDataByMasterDataMainDiv").innerHTML = xmlhttp3.responseText;
        } else {
            document.getElementById("main_ajax_loading_div").style.visibility = "visible";
        }
    };
    //
    if (stockIframe === 'Y') {
        //
        xmlhttp3.open("POST", "omSetFieldsDataByMasterPreId.php?userId=" + encodeURIComponent(userId)
                + "&prodType=" + encodeURIComponent(prodType)
                + "&prodCode=" + encodeURIComponent(prodCode)
                + "&prodMergedCount=" + encodeURIComponent(prodMergedCount), true);
        //
        xmlhttp3.send();
        //
    } else {
        //
        xmlhttp3.open("POST", "include/php/stock/omSetFieldsDataByMasterPreId.php?userId=" + encodeURIComponent(userId)
                + "&prodType=" + encodeURIComponent(prodType)
                + "&prodCode=" + encodeURIComponent(prodCode)
                + "&prodMergedCount=" + encodeURIComponent(prodMergedCount), true);
        //
        xmlhttp3.send();
        //
    }
    //
}
// *************************************************************************************************************************************
// END CODE TO ADD FUNCTION FOR SET THE CATEGORY AND NAME ACCORDING TO SELECTED PRE-ID @AUTHOR:MADHUREE-23MARCH2020
// *************************************************************************************************************************************
// *************************************************************************************************************************************
// START CODE ADD FUNCTION FOR RESET FORM AT TAGGING PANEL @AUTHOR:MADHUREE-25MARCH2020
// *************************************************************************************************************************************
function omResetForm() {
    //alert(prodCount);
    var prodCount = 0;
    if (typeof (document.getElementById('sttr_item_category' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_category' + prodCount) != null)) {
        document.getElementById('sttr_item_category' + prodCount).value = '';
    }
    if (typeof (document.getElementById('sttr_item_name' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_name' + prodCount) != null)) {
        document.getElementById('sttr_item_name' + prodCount).value = '';
    }
    if (typeof (document.getElementById('sttr_item_pre_id' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_pre_id' + prodCount) != null)) {
        document.getElementById('sttr_item_pre_id' + prodCount).value = '';
    }
    if (typeof (document.getElementById('sttr_item_id' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_item_id' + prodCount) != null)) {
        document.getElementById('sttr_item_id' + prodCount).value = '';
    }
    if (typeof (document.getElementById('sttr_size' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_size' + prodCount) != null)) {
        document.getElementById('sttr_size' + prodCount).value = '';
    }
    if (typeof (document.getElementById('sttr_quantity' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_quantity' + prodCount) != null)) {
        document.getElementById('sttr_quantity' + prodCount).value = '';
    }
    if (typeof (document.getElementById('sttr_purity_ct' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_purity_ct' + prodCount) != null)) {
        document.getElementById('sttr_purity_ct' + prodCount).value = '';
    }
    if (typeof (document.getElementById('sttr_purity' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_purity' + prodCount) != null)) {
        document.getElementById('sttr_purity' + prodCount).value = '';
    }
    if (typeof (document.getElementById('sttr_gs_weight' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_gs_weight' + prodCount) != null)) {
        document.getElementById('sttr_gs_weight' + prodCount).value = '';
    }
    if (typeof (document.getElementById('sttr_product_purchase_rate' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_product_purchase_rate' + prodCount) != null)) {
        document.getElementById('sttr_product_purchase_rate' + prodCount).value = '';
    }
    if (typeof (document.getElementById('sttr_product_sell_rate' + prodCount)) != 'undefined' &&
            (document.getElementById('sttr_product_sell_rate' + prodCount) != null)) {
        document.getElementById('sttr_product_sell_rate' + prodCount).value = '';
    }
    return false;
}
// *************************************************************************************************************************************
// END CODE ADD FUNCTION FOR RESET FORM AT TAGGING PANEL @AUTHOR:MADHUREE-25MARCH2020
// *************************************************************************************************************************************
//
function setFieldsDataByPreviousEntry(sttr_other_charges_by, sttr_cust_wastg_by, sttr_value_added_by, sttr_mkg_charges_by, sttr_final_val_by, sttr_final_valuation_by, sttr_making_charges_type, sttr_lab_charges_type, prodMergedCount) {
    //
    if (typeof ((document.getElementById('sttr_other_charges_by' + prodMergedCount)) != 'undefined') &&
            (document.getElementById('sttr_other_charges_by' + prodMergedCount) != null) &&
            (document.getElementById('sttr_other_charges_by' + prodMergedCount).value == '')) {
        document.getElementById('sttr_other_charges_by' + prodMergedCount).value = sttr_other_charges_by;
    }
    //
    if (typeof ((document.getElementById('sttr_cust_wastg_by' + prodMergedCount)) != 'undefined') &&
            (document.getElementById('sttr_cust_wastg_by' + prodMergedCount) != null) &&
            (document.getElementById('sttr_cust_wastg_by' + prodMergedCount).value == '')) {
        document.getElementById('sttr_cust_wastg_by' + prodMergedCount).value = sttr_cust_wastg_by;
    }
    //
    if (typeof ((document.getElementById('sttr_value_added_by' + prodMergedCount)) != 'undefined') &&
            (document.getElementById('sttr_value_added_by' + prodMergedCount) != null) &&
            (document.getElementById('sttr_value_added_by' + prodMergedCount).value == '')) {
        document.getElementById('sttr_value_added_by' + prodMergedCount).value = sttr_value_added_by;
    }
    //
    if (typeof ((document.getElementById('sttr_mkg_charges_by' + prodMergedCount)) != 'undefined') &&
            (document.getElementById('sttr_mkg_charges_by' + prodMergedCount) != null) &&
            (document.getElementById('sttr_mkg_charges_by' + prodMergedCount).value == '')) {
        document.getElementById('sttr_mkg_charges_by' + prodMergedCount).value = sttr_mkg_charges_by;
    }
    //
    if (typeof ((document.getElementById('sttr_final_val_by' + prodMergedCount)) != 'undefined') &&
            (document.getElementById('sttr_final_val_by' + prodMergedCount) != null) &&
            (document.getElementById('sttr_final_val_by' + prodMergedCount).value == '')) {
        document.getElementById('sttr_final_val_by' + prodMergedCount).value = sttr_final_val_by;
    }
    //
    if (typeof ((document.getElementById('sttr_final_valuation_by' + prodMergedCount)) != 'undefined') &&
            (document.getElementById('sttr_final_valuation_by' + prodMergedCount) != null) &&
            (document.getElementById('sttr_final_valuation_by' + prodMergedCount).value == '')) {
        document.getElementById('sttr_final_valuation_by' + prodMergedCount).value = sttr_final_valuation_by;
    }
    //
    if (typeof ((document.getElementById('sttr_making_charges_type' + prodMergedCount)) != 'undefined') &&
            (document.getElementById('sttr_making_charges_type' + prodMergedCount) != null) &&
            (sttr_making_charges_type != '')) {
        document.getElementById('sttr_making_charges_type' + prodMergedCount).value = sttr_making_charges_type;
    }
    //
    if (typeof ((document.getElementById('sttr_lab_charges_type' + prodMergedCount)) != 'undefined') &&
            (document.getElementById('sttr_lab_charges_type' + prodMergedCount) != null) &&
            (sttr_lab_charges_type != '')) {
        document.getElementById('sttr_lab_charges_type' + prodMergedCount).value = sttr_lab_charges_type;
    }
    //

}
//
// ============================================================================================================ // 
// START CODE TO ADD FUNCTION TO CALCULATE GRAND TOTAL OF ALL THE MAIN & SUBPRODUCTS @AUTHOR:MADHUREE-17DEC2020 //                                                                                                                                    //                           
// ============================================================================================================ // 
//
function calculateFinalAmt() {
    //
    if ((typeof (document.getElementById('sttr_total_final_valuation')) != 'undefined' &&
            (document.getElementById('sttr_total_final_valuation') != null)) ||
            (typeof (document.getElementById('sttr_total_sell_final_valuation')) != 'undefined' &&
                    (document.getElementById('sttr_total_sell_final_valuation') != null))) {
        //
        if (typeof (document.getElementById('sttr_noofprod')) != 'undefined' &&
                (document.getElementById('sttr_noofprod') != null)) {
            var sttr_noofprod = document.getElementById('sttr_noofprod').value;
        } else {
            var sttr_noofprod = 0;
        }
        //
        var sttr_total_final_valuation = 0;
        var sttr_main_final_valuation = 0;
        var sttr_stone_final_valuation = 0;
        var sttr_total_sell_final_valuation = 0;
        var sttr_main_sell_final_valuation = 0;
        var sttr_stone_sell_final_valuation = 0;
        //
        for (var p = 0; p <= sttr_noofprod; p++) {
            //
            if (typeof (document.getElementById('sttr_final_valuation' + p)) != 'undefined' &&
                    (document.getElementById('sttr_final_valuation' + p) != null)) {
                sttr_main_final_valuation = (parseFloat(parseFloat(sttr_main_final_valuation)
                        + parseFloat(document.getElementById('sttr_final_valuation' + p).value))).toFixed(2);
            }
            //
            //START CODE FOR GRAND TOTAL FOR SELL PRICE IN STOCK PANEL : AUTHOR @DARSHANA 4 DEC 2021
            //
            if (typeof (document.getElementById('sttr_cust_price' + p)) != 'undefined' &&
                    (document.getElementById('sttr_cust_price' + p) != null)) {
                sttr_main_sell_final_valuation = (parseFloat(parseFloat(sttr_main_sell_final_valuation)
                        + parseFloat(document.getElementById('sttr_cust_price' + p).value))).toFixed(2);
            }
            //
            if (typeof (document.getElementById('sttr_noofprod' + p)) != 'undefined' &&
                    (document.getElementById('sttr_noofprod' + p) != null)) {
                var sttr_noofSubprod = document.getElementById('sttr_noofprod' + p).value;
            } else {
                var sttr_noofSubprod = 0;
            }
            //
            for (var s = 1; s <= sttr_noofSubprod; s++) {
                //
                if (typeof (document.getElementById('sttr_final_valuation' + p + s)) != 'undefined' &&
                        (document.getElementById('sttr_final_valuation' + p + s) != null)) {
                    sttr_stone_final_valuation = (parseFloat(parseFloat(sttr_stone_final_valuation)
                            + parseFloat(document.getElementById('sttr_final_valuation' + p + s).value))).toFixed(2);
                }
                //
                if (typeof (document.getElementById('sttr_cust_price' + p + s)) != 'undefined' &&
                        (document.getElementById('sttr_cust_price' + p + s) != null)) {
                    sttr_stone_sell_final_valuation = (parseFloat(parseFloat(sttr_stone_sell_final_valuation)
                            + parseFloat(document.getElementById('sttr_cust_price' + p + s).value))).toFixed(2);
                }
                //
            }
            //
            if (typeof (document.getElementById('sttr_noofprod' + p)) != 'undefined' &&
                    (document.getElementById('sttr_noofprod' + p) != null)) {
                var sttr_noofSubprod = document.getElementById('sttr_noofprod' + p).value;
            } else {
                var sttr_noofSubprod = 0;
            }
            //END CODE FOR GRAND TOTAL FOR SELL PRICE IN STOCK PANEL : AUTHOR @DARSHANA 4 DEC 2021
        }
        //
        //alert('sttr_main_final_valuation ##== ' + sttr_main_final_valuation);
        //alert('sttr_stone_final_valuation ##== ' + sttr_stone_final_valuation);

        sttr_total_final_valuation = (parseFloat(parseFloat(sttr_main_final_valuation)
                + parseFloat(sttr_stone_final_valuation))).toFixed(2);
        //
        //alert('sttr_total_final_valuation == ' + sttr_total_final_valuation);
        //
        document.getElementById('sttr_total_final_valuation').value = parseFloat(sttr_total_final_valuation).toFixed(2);
        //
        //alert('sttr_total_final_valuation !!== ' + document.getElementById('sttr_total_final_valuation').value);
        //
        if (document.getElementById('sttr_total_final_valuation').value == '' ||
                document.getElementById('sttr_total_final_valuation').value == 'NaN') {
            document.getElementById('sttr_total_final_valuation').value = 0;
        }
        // CODE FOR TOTAL SELL PRICE: AUTHOR @DARSHANA 6 JAN 2021
        sttr_total_sell_final_valuation = (parseFloat(parseFloat(sttr_main_sell_final_valuation)
                + parseFloat(sttr_stone_sell_final_valuation))).toFixed(2);
        //
        //alert('sttr_total_final_valuation == ' + sttr_total_final_valuation);
        //
//        document.getElementById('sttr_total_sell_final_valuation').value = parseFloat(sttr_total_sell_final_valuation).toFixed(2);
        //
        //alert('sttr_total_sell_final_valuation !!== ' + document.getElementById('sttr_total_sell_final_valuation').value);
        //
        if (document.getElementById('sttr_total_sell_final_valuation').value == '' ||
                document.getElementById('sttr_total_sell_final_valuation').value == 'NaN') {
            document.getElementById('sttr_total_sell_final_valuation').value = 0;
        }
        //
    }
    //
}
//
// ============================================================================================================ // 
// END CODE TO ADD FUNCTION TO CALCULATE GRAND TOTAL OF ALL THE MAIN & SUBPRODUCTS @AUTHOR:MADHUREE-17DEC2020 //                                                                                                                                    //                           
// ============================================================================================================ // 
//
// ======================================================================================================================== // 
// START CODE TO ADD FUNCTION TO HIDE OR DISPLAY MAIN ADD NEW PRODUCT BUTTONS ACCORDING TO CHILD @AUTHOR:MADHUREE-05JAN2020 //                                                                                                                                    //                           
// ======================================================================================================================== // 
//
function hideAddDivButton() {
    if (typeof (document.getElementById('sttr_noofprod')) != 'undefined' &&
            (document.getElementById('sttr_noofprod') != null)) {
        var sttr_noofprod = document.getElementById('sttr_noofprod').value;
    } else {
        var sttr_noofprod = 0;
    }
    for (var p = 0; p <= sttr_noofprod; p++) {
        if (p != sttr_noofprod) {
            if (typeof (document.getElementById('plus' + p)) != 'undefined' && (document.getElementById('plus' + p) != null)) {
                document.getElementById('plus' + p).style.display = 'none';
            }
        }
        if (typeof (document.getElementById('sttr_noofprod' + p)) != 'undefined' &&
                (document.getElementById('sttr_noofprod' + p) != null)) {
            var sttr_noofSubprod = document.getElementById('sttr_noofprod' + p).value;
        } else {
            var sttr_noofSubprod = 0;
        }
        for (var s = 1; s <= sttr_noofSubprod; s++) {
            if (typeof (document.getElementById('stone' + p)) != 'undefined' && (document.getElementById('stone' + p) != null)) {
                document.getElementById('stone' + p).style.display = 'none';
            }
            if (typeof (document.getElementById('plus' + p + s)) != 'undefined' && (document.getElementById('plus' + p + s) != null)) {
                document.getElementById('plus' + p + s).style.display = 'none';
            }
            if (s != sttr_noofSubprod) {
                if (typeof (document.getElementById('stone' + p + s)) != 'undefined' && (document.getElementById('stone' + p + s) != null)) {
                    document.getElementById('stone' + p + s).style.display = 'none';
                }
            }
        }
    }
}
//
function showAddDivButton(mainProdCount, prodCount, panelName) {
    var stoneDisplayDivCount = (prodCount - 1);
    //
    if (panelName == 'CRYSTAL') {
        if (typeof (document.getElementById('sttr_noofprod' + mainProdCount)) != 'undefined' &&
                (document.getElementById('sttr_noofprod' + mainProdCount) != null)) {
            var sttr_noofSubprod = document.getElementById('sttr_noofprod' + mainProdCount).value;
        } else {
            var sttr_noofSubprod = 0;
        }
        //
        if (prodCount == sttr_noofSubprod && stoneDisplayDivCount != 0) {
            document.getElementById('stone' + mainProdCount + stoneDisplayDivCount).style.display = 'inline';
        } else if (prodCount == sttr_noofSubprod && stoneDisplayDivCount == 0) {
            document.getElementById('stone' + mainProdCount).style.display = 'inline';
        } else if (prodCount > sttr_noofSubprod) {
            document.getElementById('stone' + mainProdCount).style.display = 'inline';
        }
    } else {
        if (typeof (document.getElementById('sttr_noofprod')) != 'undefined' &&
                (document.getElementById('sttr_noofprod') != null)) {
            var sttr_noofprod = document.getElementById('sttr_noofprod').value;
        } else {
            var sttr_noofprod = 0;
        }
        //
        if (sttr_noofprod == 1 || sttr_noofprod==0) {
            document.getElementById('plus0').style.display = 'inline';
            document.getElementById('stone0').style.display = 'inline';
        } else if (sttr_noofprod == mainProdCount) {
            document.getElementById('plus' + (mainProdCount - 1)).style.display = 'inline';
            document.getElementById('stone' + mainProdCount).style.display = 'inline';
        }
    }
}
//
// ====================================================================================================================== // 
// END CODE TO ADD FUNCTION TO HIDE OR DISPLAY MAIN ADD NEW PRODUCT BUTTONS ACCORDING TO CHILD @AUTHOR:MADHUREE-05JAN2020 //                                                                                                                                    //                           
// ====================================================================================================================== // 
//