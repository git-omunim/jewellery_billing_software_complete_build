<?php
/*
 * **************************************************************************************
 * @tutorial: SELL METAL FORM B2 MAIN FILE @PRIYANKA-05MAR2021
 * **************************************************************************************
 * 
 * Created on MARCH 05, 2021 05:00:00 PM
 *
 * @FileName: omspjsdv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.37
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-05MAR2021
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
?>
<?php
//
if ($_SESSION['sessionProdVer'] == 'OMUNIM3.0.0') {
    include $_SESSION['documentRootIncludePhp'] . 'stock/omStockSearch.php';
} else {
    ?>
    <div id="sellPurchaseItemDetails">
        <?php // include 'omshorthead.php'; ?>
        <input type="hidden" id="preOrdInvNo" name="preOrdInvNo" value="<?php echo $_REQUEST['preOrdInvNo']; ?>" />
        <input type="hidden" id="preOrdInvNo" name="postOrdInvNo" value="<?php echo $_REQUEST['postOrdInvNo']; ?>" />
        <?php
        if ($panelDivName == '')
            $panelDivName = $_GET['panelDivName'];

        if ($CustomerAddedHome == '')
            $CustomerAddedHome = $_GET['divMainMiddlePanel'];

        if ($mainPanel == '')
            $mainPanel = $_GET['mainPanel'];

        if ($panelName == '')
            $panelName = $_GET['panelName'];

        if ($panelName == '')
            $panelName = $mainPanel;

        if ($custId == '')
            $custId = $_GET['custId'];

        if ($newOrderPanelName == '' || $newOrderPanelName == NULL)
            $newOrderPanelName = $_REQUEST['newOrderPanelName'];

        // START CODE FOR ADD STOCK FROM NEW ORDER TO STOCK AND THEN SELL FROM SELL PANEL @PRIYANKA-04DEC2018
        if ($newOrderPanelName == 'newOrderProdAddSell') {
            //
            $sttrId = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sttrId'])));
            //
            // MOVE ENTRY INTO STOCK TRANSACTION TABLE @PRIYANKA-04DEC18
            $Query = "INSERT INTO stock_transaction (sttr_st_id,sttr_sttrin_id,sttr_owner_id,sttr_jrnl_id,sttr_firm_id,sttr_user_id,sttr_account_id,sttr_staff_id,sttr_transaction_type,sttr_item_pre_id,sttr_item_id,sttr_product_type,sttr_metal_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_barcode_prefix,sttr_barcode,sttr_add_barcode_date,sttr_item_code,sttr_indicator,sttr_brand_id,sttr_bis_mark,sttr_image_id,sttr_add_date,sttr_bill_date,sttr_mfg_date,sttr_tally_date,sttr_hsn_no,sttr_size,sttr_shape,sttr_color,sttr_quantity,sttr_clarity,sttr_metal_rate,sttr_metal_rate_id,sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight,sttr_pkt_weight_type,sttr_nt_weight,sttr_nt_weight_type,sttr_fine_weight,sttr_final_fine_weight,sttr_lab_charges,sttr_lab_charges_type,sttr_total_lab_charges,sttr_making_charges,sttr_making_charges_type,sttr_tax,sttr_tot_tax,sttr_valuation,sttr_stone_valuation,sttr_final_valuation,sttr_status,sttr_current_status,sttr_sell_status,sttr_bc_print_status,sttr_stock_add,sttr_item_ent_type,sttr_other_info,sttr_item_other_info,sttr_pre_invoice_no,sttr_invoice_no,sttr_product_purchase_rate,sttr_purchase_rate,sttr_purchase_rate_type,sttr_product_sell_rate,sttr_product_sell_rate_type,sttr_sell_rate,sttr_sell_rate_type,sttr_crystal_yn,sttr_other_charges_by,sttr_final_val_by,sttr_since,sttr_comments,sttr_value_added,sttr_item_safe_tray,sttr_cust_itmcalby,sttr_cust_itmcode,sttr_cust_itmnum,sttr_item_length,sttr_item_width,sttr_item_model_no,sttr_item_sales_pkg,sttr_price,sttr_cust_price,sttr_purchase_price,sttr_pkt_qty1,sttr_pkt_qty2,sttr_pkt_qty3,sttr_pkt_qty4,sttr_pkt_qty5,sttr_pkt_weight1,sttr_pkt_weight2,sttr_pkt_weight3,sttr_pkt_weight4,sttr_pkt_weight5,sttr_lab_chrg_type1,sttr_lab_chrg_type2,sttr_lab_chrg_type3,sttr_lab_chrg_type4,sttr_lab_chrg_type5,sttr_lab_chrg_qty1,sttr_lab_chrg_qty2,sttr_lab_chrg_qty3,sttr_lab_chrg_qty4,sttr_lab_chrg_qty5,sttr_lab_chrg_val1,sttr_lab_chrg_val2,sttr_lab_chrg_val3,sttr_lab_chrg_val4,sttr_lab_chrg_val5,sttr_lab_chrg_tot1,sttr_lab_chrg_tot2,sttr_lab_chrg_tot3,sttr_lab_chrg_tot4,sttr_lab_chrg_tot5,sttr_wt_auto_less) "
                    . "SELECT sttr_st_id,sttr_sttrin_id,sttr_owner_id,sttr_jrnl_id,sttr_firm_id,sttr_user_id,sttr_account_id,sttr_staff_id,'EXISTING',sttr_item_pre_id,sttr_item_id,sttr_product_type,sttr_product_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_barcode_prefix,sttr_barcode,sttr_add_barcode_date,sttr_item_code,sttr_indicator,sttr_brand_id,sttr_bis_mark,sttr_image_id,sttr_add_date,sttr_bill_date,sttr_mfg_date,sttr_tally_date,sttr_hsn_no,sttr_size,sttr_shape,sttr_color,sttr_quantity,sttr_clarity,sttr_product_sell_rate,sttr_metal_rate_id,sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight,sttr_pkt_weight_type,sttr_nt_weight,sttr_nt_weight_type,sttr_fine_weight,sttr_final_fine_weight,sttr_lab_charges,sttr_lab_charges_type,sttr_total_lab_charges,sttr_making_charges,sttr_making_charges_type,sttr_tax,sttr_tot_tax,sttr_valuation,sttr_stone_valuation,sttr_final_valuation,'EXISTING',sttr_current_status,sttr_sell_status,sttr_bc_print_status,sttr_stock_add,sttr_item_ent_type,sttr_other_info,sttr_item_other_info,sttr_pre_invoice_no,sttr_invoice_no,sttr_product_purchase_rate,sttr_purchase_rate,sttr_purchase_rate_type,sttr_product_sell_rate,sttr_product_sell_rate_type,sttr_sell_rate,sttr_sell_rate_type,sttr_crystal_yn,sttr_other_charges_by,sttr_final_val_by,sttr_since,sttr_comments,sttr_value_added,sttr_item_safe_tray,sttr_cust_itmcalby,sttr_cust_itmcode,sttr_cust_itmnum,sttr_item_length,sttr_item_width,sttr_item_model_no,sttr_item_sales_pkg,sttr_price,sttr_cust_price,sttr_purchase_price,sttr_pkt_qty1,sttr_pkt_qty2,sttr_pkt_qty3,sttr_pkt_qty4,sttr_pkt_qty5,sttr_pkt_weight1,sttr_pkt_weight2,sttr_pkt_weight3,sttr_pkt_weight4,sttr_pkt_weight5,sttr_lab_chrg_type1,sttr_lab_chrg_type2,sttr_lab_chrg_type3,sttr_lab_chrg_type4,sttr_lab_chrg_type5,sttr_lab_chrg_qty1,sttr_lab_chrg_qty2,sttr_lab_chrg_qty3,sttr_lab_chrg_qty4,sttr_lab_chrg_qty5,sttr_lab_chrg_val1,sttr_lab_chrg_val2,sttr_lab_chrg_val3,sttr_lab_chrg_val4,sttr_lab_chrg_val5,sttr_lab_chrg_tot1,sttr_lab_chrg_tot2,sttr_lab_chrg_tot3,sttr_lab_chrg_tot4,sttr_lab_chrg_tot5,sttr_wt_auto_less FROM stock_transaction WHERE sttr_id = '$sttrId'";
            //
            if (!mysqli_query($conn, $Query)) {
                die('Error: ' . mysqli_error($conn));
            }
            //
            parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_indicator = 'stock' "
                            . "AND sttr_status NOT IN ('DELETED') order by sttr_id DESC LIMIT 0,1"));
            //
            $slPrId = $sttr_id; // ADD STOCK MAIN ENTRY ID
            //
            stock('update', $_REQUEST, $sttr_id, 'AddStock');
            //
            //
            // Code To SELECT Sub Entries of Main Entries from stock_transaction Table @PRIYANKA-04DEC18
            $Qry = "SELECT * FROM stock_transaction WHERE sttr_sttr_id='$sttrId'";
            //
            $qryResult = mysqli_query($conn, $Qry);
            $totalEntries = mysqli_num_rows($qryResult);
            //
            //echo '$Qry == '.$Qry.'<br />';
            //echo '$totalEntries == '.$totalEntries.'<br />';
            //
            if ($totalEntries > 0) { // TOTAL NO OF ENTRIES
                //
                while ($rowDet = mysqli_fetch_array($qryResult, MYSQLI_ASSOC)) {
                    //
                    $subSttrId = $rowDet['sttr_id'];
                    //
                    // MOVE SUB ENTRIES ENTRY INTO STOCK TRANSACTION TABLE @PRIYANKA-04DEC18
                    $subEntryQuery = "INSERT INTO stock_transaction (sttr_sttr_id,sttr_st_id,sttr_sttrin_id,sttr_owner_id,sttr_jrnl_id,sttr_firm_id,sttr_user_id,sttr_account_id,sttr_staff_id,sttr_transaction_type,sttr_item_pre_id,sttr_item_id,sttr_product_type,sttr_metal_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_barcode_prefix,sttr_barcode,sttr_add_barcode_date,sttr_item_code,sttr_indicator,sttr_brand_id,sttr_bis_mark,sttr_image_id,sttr_add_date,sttr_bill_date,sttr_mfg_date,sttr_tally_date,sttr_hsn_no,sttr_size,sttr_shape,sttr_color,sttr_quantity,sttr_clarity,sttr_metal_rate,sttr_metal_rate_id,sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight,sttr_pkt_weight_type,sttr_nt_weight,sttr_nt_weight_type,sttr_fine_weight,sttr_final_fine_weight,sttr_lab_charges,sttr_lab_charges_type,sttr_total_lab_charges,sttr_making_charges,sttr_making_charges_type,sttr_tax,sttr_tot_tax,sttr_valuation,sttr_stone_valuation,sttr_final_valuation,sttr_status,sttr_current_status,sttr_sell_status,sttr_bc_print_status,sttr_stock_add,sttr_item_ent_type,sttr_other_info,sttr_item_other_info,sttr_pre_invoice_no,sttr_invoice_no,sttr_product_purchase_rate,sttr_purchase_rate,sttr_purchase_rate_type,sttr_product_sell_rate,sttr_product_sell_rate_type,sttr_sell_rate,sttr_sell_rate_type,sttr_crystal_yn,sttr_other_charges_by,sttr_final_val_by,sttr_since,sttr_comments,sttr_value_added,sttr_item_safe_tray,sttr_cust_itmcalby,sttr_cust_itmcode,sttr_cust_itmnum,sttr_item_length,sttr_item_width,sttr_item_model_no,sttr_item_sales_pkg,sttr_price,sttr_cust_price,sttr_purchase_price,sttr_pkt_qty1,sttr_pkt_qty2,sttr_pkt_qty3,sttr_pkt_qty4,sttr_pkt_qty5,sttr_pkt_weight1,sttr_pkt_weight2,sttr_pkt_weight3,sttr_pkt_weight4,sttr_pkt_weight5,sttr_lab_chrg_type1,sttr_lab_chrg_type2,sttr_lab_chrg_type3,sttr_lab_chrg_type4,sttr_lab_chrg_type5,sttr_lab_chrg_qty1,sttr_lab_chrg_qty2,sttr_lab_chrg_qty3,sttr_lab_chrg_qty4,sttr_lab_chrg_qty5,sttr_lab_chrg_val1,sttr_lab_chrg_val2,sttr_lab_chrg_val3,sttr_lab_chrg_val4,sttr_lab_chrg_val5,sttr_lab_chrg_tot1,sttr_lab_chrg_tot2,sttr_lab_chrg_tot3,sttr_lab_chrg_tot4,sttr_lab_chrg_tot5,sttr_wt_auto_less) "
                            . "SELECT $sttr_id,sttr_st_id,sttr_sttrin_id,sttr_owner_id,sttr_jrnl_id,sttr_firm_id,sttr_user_id,sttr_account_id,sttr_staff_id,'EXISTING',sttr_item_pre_id,sttr_item_id,sttr_product_type,sttr_product_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_barcode_prefix,sttr_barcode,sttr_add_barcode_date,sttr_item_code,sttr_indicator,sttr_brand_id,sttr_bis_mark,sttr_image_id,sttr_add_date,sttr_bill_date,sttr_mfg_date,sttr_tally_date,sttr_hsn_no,sttr_size,sttr_shape,sttr_color,sttr_quantity,sttr_clarity,sttr_product_sell_rate,sttr_metal_rate_id,sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight,sttr_pkt_weight_type,sttr_nt_weight,sttr_nt_weight_type,sttr_fine_weight,sttr_final_fine_weight,sttr_lab_charges,sttr_lab_charges_type,sttr_total_lab_charges,sttr_making_charges,sttr_making_charges_type,sttr_tax,sttr_tot_tax,sttr_valuation,sttr_stone_valuation,sttr_final_valuation,'EXISTING',sttr_current_status,sttr_sell_status,sttr_bc_print_status,sttr_stock_add,sttr_item_ent_type,sttr_other_info,sttr_item_other_info,sttr_pre_invoice_no,sttr_invoice_no,sttr_product_purchase_rate,sttr_purchase_rate,sttr_purchase_rate_type,sttr_product_sell_rate,sttr_product_sell_rate_type,sttr_sell_rate,sttr_sell_rate_type,sttr_crystal_yn,sttr_other_charges_by,sttr_final_val_by,sttr_since,sttr_comments,sttr_value_added,sttr_item_safe_tray,sttr_cust_itmcalby,sttr_cust_itmcode,sttr_cust_itmnum,sttr_item_length,sttr_item_width,sttr_item_model_no,sttr_item_sales_pkg,sttr_price,sttr_cust_price,sttr_purchase_price,sttr_pkt_qty1,sttr_pkt_qty2,sttr_pkt_qty3,sttr_pkt_qty4,sttr_pkt_qty5,sttr_pkt_weight1,sttr_pkt_weight2,sttr_pkt_weight3,sttr_pkt_weight4,sttr_pkt_weight5,sttr_lab_chrg_type1,sttr_lab_chrg_type2,sttr_lab_chrg_type3,sttr_lab_chrg_type4,sttr_lab_chrg_type5,sttr_lab_chrg_qty1,sttr_lab_chrg_qty2,sttr_lab_chrg_qty3,sttr_lab_chrg_qty4,sttr_lab_chrg_qty5,sttr_lab_chrg_val1,sttr_lab_chrg_val2,sttr_lab_chrg_val3,sttr_lab_chrg_val4,sttr_lab_chrg_val5,sttr_lab_chrg_tot1,sttr_lab_chrg_tot2,sttr_lab_chrg_tot3,sttr_lab_chrg_tot4,sttr_lab_chrg_tot5,sttr_wt_auto_less FROM stock_transaction WHERE sttr_id = '$subSttrId'";
                    //
                    if (!mysqli_query($conn, $subEntryQuery)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                    //
                    //echo '$subEntryQuery == '.$subEntryQuery.'<br />';
                    //
                }
            }
            //
            //
            $prodUpdateQuery = "UPDATE stock_transaction SET sttr_status = 'Delivered' WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                    . "AND sttr_user_id = '$custId' AND sttr_transaction_type = 'newOrder' "
                    . "AND (sttr_id = '$sttrId' OR sttr_sttr_id = '$sttrId')";
            //
            mysqli_query($conn, $prodUpdateQuery);
            //
            //echo '$prodUpdateQuery == '.$prodUpdateQuery.'<br />';
            //
        } else if ($newOrderPanelName == 'newOrderProdSell') {
            //
            $sttrId = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sttrId'])));
            //
            //$slPrId = $sttr_id; // ADD STOCK MAIN ENTRY ID
            //
            $prodUpdateQuery = "UPDATE stock_transaction SET sttr_status = 'Delivered' WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                    . "AND sttr_user_id = '$custId' AND sttr_transaction_type = 'newOrder' "
                    . "AND (sttr_id = '$sttrId' OR sttr_sttr_id = '$sttrId')";
            //
            mysqli_query($conn, $prodUpdateQuery);
            //
            //echo '$prodUpdateQuery == '.$prodUpdateQuery.'<br />';
            //
        }
        // END CODE FOR ADD STOCK FROM NEW ORDER TO STOCK AND THEN SELL FROM SELL PANEL @PRIYANKA-04DEC2018
        //    
        //echo '$mainPanel:'.$mainPanel.'<br />';
        //echo '$panelName:'.$panelName.'<br />';
        //
        if ($mainPanel != 'SellPayUp' && $mainPanel != 'SellDetUpPanel' && $mainPanel != 'SoldOutList' &&
                $mainPanel != 'ImitationSoldOutList' && $mainPanel != 'StrlleringSoldOutList' && $mainPanel != 'WholeSalePanel' &&
                $mainPanel != 'CrystalPurchasePanel' && $mainPanel != 'ImitationPurchasePanel' &&
                $mainPanel != 'StrlleringPurchasePanel' && $mainPanel != 'orderPickStock' && $panelName != 'finalOrderUp') {

            $selPurOption = callOmLayoutTable('PurOption', '', 'select');

            if ($selPurOption == '')
                callOmLayoutTable('PurOption', 'StockPurchase', 'insert');
            else
                callOmLayoutTable('PurOption', 'StockPurchase', 'update');
        }

        if ($omly_value == '') {
            parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'sellAutoEntry'"));
        }

        if ($omly_value != 'YES') {
            if ($panelName != 'SellDetUpPanel' && $panelName != 'EstimateUpdate' && $panelName != 'EstimatePayUp' &&
                    $panelName != 'SellPayUp' && $panelName != 'finalOrderUp' && $panelName != 'Estimate') {
                ?>
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-md-12">
                            <table align="center" border="0" cellspacing="0" width="98%" cellpadding="2" >
                                <tr>
                                    <?php
                                    if ($panelName == 'orderPickStock') {
                                        if ($preOrdInvNo == '')
                                            $preOrdInvNo = $_REQUEST['preOrdInvNo'];
                                        if ($postOrdInvNo == '')
                                            $postOrdInvNo = $_REQUEST['postOrdInvNo'];
                                        $invoice = $preOrdInvNo . ';' . $postOrdInvNo;
                                    }
                                    ?>
                                     <!--<td align="center" valign="middle" width="5%"></td>-->
                                    <!--Start code for sell item search preid by Ashwini Patil 12june2020-->
                                    <td align="center" valign="" width="45%">
                                        <input id="srchItemId" name="srchItemId" type="text"  placeholder="ADD PRODUCT ID / BARCODE / RFID" 

                                               onkeyup="javascript: if ((event.keyCode != 9 && event.keyCode != 13) || (event.keyCode == 13 && this.value == '')) {
                                                           searchItemByItemPreId(document.getElementById('srchItemId').value, event.keyCode, '');
                                                       }"

                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                           searchItemByItemIdMetalFormB2(document.getElementById('srchItemId').value, '<?php echo $omly_value; ?>', '<?php echo $custId; ?>');
                                                           showSellMetalFormB2InvDiv(document.getElementById('srchItemPreId').value, document.getElementById('srchItemPostId').value, '<?php echo $custId; ?>', '<?php echo $panelName; ?>', '<?php echo $invoice; ?>');
                                                           return false;
                                                       }"
                                               autocomplete="off" spellcheck="false" class="textLabel16CalibriNormalGreyMiddle border-no " 
                                               size="40" maxlength="64" style="width:100%;height:45px;border:1px solid #86beff;font-size:18px;font-weight:600;box-shadow: 0 1px 3px rgba(0,0,0,0.2);border-radius:50px!important;"/>
                                        &nbsp;
                                        <input id="srchItemPreId" name="srchItemPreId" type="hidden"/>
                                        <input id="srchItemPostId" name="srchItemPostId" type="hidden"/>

                                        <?php if ($CustomerAddedHome == 'CustomerAdded' || $panelName == 'FINE_JEWELLERY_SELL') { ?>
                                            <img src="<?php echo $documentRoot; ?>/images/sell_Purchase16.png" width="0.01px" 
                                                 onload="document.getElementById('srchItemId').focus();"/>
                                             <?php } ?> 

                                    </td>
                                    <!--End code for sell item search preid by Ashwini Patil 12june2020-->
                                <div id="itemDropdownDiv" style="position:relative;"></div>
                                <?php
                                if ($panelName == 'orderPickStock') {
                                    $invoice = $preOrdInvNo . ';' . $postOrdInvNo;
                                }
                                ?>
                                <td align="left" valign="top" width="5%">
                                    <!---Start to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                                    <?php
                                    $inputId = "srchItemButt";
                                    $inputType = 'button';
                                    $inputFieldValue = 'GO';
                                    $inputIdButton = "srchItemButt";
                                    $inputNameButton = 'srchItemButt';
                                    $inputTitle = '';
                                    //
                                    // This is the main class for input flied
                                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                    $inputStyle = "width:50px;height:45px;margin-top:0px;margin-left:-24px;margin-bottom:0;border-radius:0 50px 50px 0 !important;font-size:16px;box-shadow: 0 1px 3px rgba(0,0,0,0.2);";
                                    $inputLabel = 'GO'; // Display Label below the text box
                                    //
                                    // This class is for Pencil Icon                                                           
                                    $inputIconClass = '';
                                    $inputPlaceHolder = '';
                                    $spanPlaceHolderClass = '';
                                    $spanPlaceHolder = '';
                                    $inputOnChange = "";
                                    $inputOnClickFun = 'javascript:searchItemByItemIdMetalFormB2(document.getElementById("srchItemId").value, "' . $omly_value . '", "' . $custId . '");
                                       showSellMetalFormB2InvDiv(document.getElementById("srchItemPreId").value, document.getElementById("srchItemPostId").value, "' . $custId . '", "' . $panelName . '", "' . $invoice . '");
                                       return false;';
                                    $inputKeyUpFun = '';
                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                    $inputMainClassButton = '';           // This is the main division for Button
                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                    ?>
                                    <!---End to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                                </td>


                                <td align="center" valign="middle" width="45%">
                                    <input id="srchDelItemId" name="srchDelItemId" type="text"  placeholder="RETURN PRODUCT ID / BARCODE / RFID" 
                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                       searchItemByItemIdMetalFormB2(document.getElementById('srchDelItemId').value, '<?php echo $omly_value; ?>', '<?php echo $custId; ?>', 'delete');
                                                       showSellMetalFormB2InvDiv(document.getElementById('srchdelItemPreId').value, document.getElementById('srchdelItemPostId').value, '<?php echo $custId; ?>', '<?php echo $panelName; ?>', 'delete');
                                                       return false;
                                                   }"
                                           autocomplete="off" spellcheck="false" class="textLabel16CalibriNormalGreyMiddle border-no" 
                                           size="40" maxlength="64" style="width:100%;height:45px;border:1px solid #86beff;font-size:18px;font-weight:600;box-shadow: 0 1px 3px rgba(0,0,0,0.2);border-radius:50px!important;"/>
                                    &nbsp;
                                    <input id="srchdelItemPreId" name="srchdelItemPreId" type="hidden"/>
                                    <input id="srchdelItemPostId" name="srchdelItemPostId" type="hidden"/>

                                </td>
                                <td align="left" valign="top" width="5%">
                                    <!---Start to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                                    <?php
                                    $inputId = "srchDelItemButt";
                                    $inputType = 'button';
                                    $inputFieldValue = 'GO';
                                    $inputIdButton = "srchDelItemButt";
                                    $inputNameButton = 'srchDelItemButt';
                                    $inputTitle = '';
                                    //
                                    // This is the main class for input flied
                                    $inputFieldClass = 'btn ' . $om_btn_style_nav;
                                    $inputStyle = "width:50px;height:45px;margin-top:0px;margin-left:-24px;margin-bottom:0;border-radius:0 50px 50px 0 !important;font-size:16px;box-shadow: 0 1px 3px rgba(0,0,0,0.2);";
                                    $inputLabel = 'GO'; // Display Label below the text box
                                    //
                                    // This class is for Pencil Icon                                                           
                                    $inputIconClass = '';
                                    $inputPlaceHolder = '';
                                    $spanPlaceHolderClass = '';
                                    $spanPlaceHolder = '';
                                    $inputOnChange = "";
                                    $inputOnClickFun = 'javascript:searchItemByItemIdMetalFormB2(document.getElementById("srchDelItemId").value, "' . $omly_value . '", "' . $custId . '");
                                               showSellMetalFormB2InvDiv(document.getElementById("srchdelItemPreId").value, document.getElementById("srchdelItemPostId").value, "' . $custId . '", "' . $panelName . '", "delete");
                                               return false;';
                                    $inputKeyUpFun = '';
                                    $inputDropDownCls = '';               // This is the main division class for drop down 
                                    $inputselDropDownCls = '';            // This is class for selection in drop down
                                    $inputMainClassButton = '';           // This is the main division for Button
                                    include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                    ?>
                                    <!---End to Changes button @AUTHOR: DIKSHA25SEPT2018----->
                                </td>
                                <!--<td align="center" valign="middle" width="5%"></td>-->
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
            }
        }

        $autoEntry = $_GET['autoEntry'];
        $txtType = $_GET['txtType'];

        $sellPanelName = $panelName;

        //echo '$sellPanelName:'.$sellPanelName.'<br />';

        $sessionOwnerId = $_SESSION['sessionOwnerId'];

        // *************************************************************************************************************
        // START CODE - OPTION ON LAYOUT FOR SELL CUSTOMER WASTAGE @PRIYANKA-06MAR19
        // *************************************************************************************************************
        $sellCustWastgQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellCustWastg'";
        $resSetSellCustWastg = mysqli_query($conn, $sellCustWastgQuery);
        $rowSetSellCustWastg = mysqli_fetch_array($resSetSellCustWastg);
        $sellCustWastg = $rowSetSellCustWastg['omly_value'];
        // *************************************************************************************************************
        // END CODE - OPTION ON LAYOUT FOR SELL CUSTOMER WASTAGE @PRIYANKA-06MAR19
        // *************************************************************************************************************
        //echo '$sellCustWastg @@== ' . $sellCustWastg . '<br />';
        // *************************************************************************************************************
        // START CODE FOR OPTION ON LAYOUT TO SET ADDITIONAL SELL CUSTOMER WASTAGE @PRIYANKA-09MAY19
        // *************************************************************************************************************
        $setAdditionalSellCustWastgQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'setAdditionalSellCustWastg'";
        $resSetAdditionalSellCustWastg = mysqli_query($conn, $setAdditionalSellCustWastgQuery);
        $rowSetAdditionalSellCustWastg = mysqli_fetch_array($resSetAdditionalSellCustWastg);
        $setAdditionalSellCustWastg = $rowSetAdditionalSellCustWastg['omly_value'];
        // *************************************************************************************************************
        // END CODE FOR OPTION ON LAYOUT TO SET ADDITIONAL SELL CUSTOMER WASTAGE @PRIYANKA-09MAY19
        // *************************************************************************************************************
        //echo '$setAdditionalSellCustWastg @@== '.$setAdditionalSellCustWastg.'<br />';
        //*************************************************************************************************************
        // START CODE FOR SELL METAL VALUATION AND VALUE ADDED BY FINE WEIGHT OPTION @AUTHOR:SHRI05FEB20
        //*************************************************************************************************************
        $qSelItemNValAdByFNWTOption = "SELECT omly_value FROM omlayout WHERE omly_option = 'itemValNValAdByFNWT'";
        $resItemNValAdByFNWTOptionOption = mysqli_query($conn, $qSelItemNValAdByFNWTOption);
        $rowItemNValAdByFNWTOption = mysqli_fetch_array($resItemNValAdByFNWTOptionOption);
        $itemNValAdByFNWTOption = $rowItemNValAdByFNWTOption['omly_value'];
        // *************************************************************************************************************
        // END CODE FOR SELL METAL VALUATION AND VALUE ADDED BY FINE WEIGHT OPTION @AUTHOR:SHRI05FEB20
        // *************************************************************************************************************

        if ($sellPanelName != 'SellDetUpPanel' && $sellPanelName != 'EstimateUpdate' && $sellPanelName != 'EstimatePayUp' &&
                $sellPanelName != 'SellPayUp' && $sellPanelName != 'SellItemReturn' && $sellPanelName != 'SellItemReturnUp' ||
                $sellPanelName != 'finalOrderUp') {
            include 'ogspsbdv.php';
        }

        if ($sellPanelName == 'SellDetUpPanel' || $sellPanelName == 'EstimateUpdate' || $sellPanelName == 'EstimatePayUp' ||
                $sellPanelName == 'SellPayUp' || $sellPanelName == 'StockItemReturn' ||
                $sellPanelName == 'SellItemReturnUp' || $sellPanelName == 'finalOrderUp') {

            $slPrId = $_GET['slPrId'];

            //echo '$slPrId == '.$slPrId;
            // START code to get slPrId (Update from Cust All Transaction List) @Author:PRIYANKA-21AUG17
            if ($utinId == '') {
                $utinId = $_GET['utin_id'];
            }

            if ($utinId != '' && $slPrId == '') {

                parse_str(getTableValues("SELECT utin_pre_invoice_no,utin_invoice_no FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_id = '$utinId' and utin_transaction_type = 'sell' and utin_type = 'stock'"));

                parse_str(getTableValues("SELECT sttr_id FROM stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' and sttr_indicator='stock' and sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_invoice_no = '$utin_invoice_no' and sttr_pre_invoice_no = '$utin_pre_invoice_no'"));

                if ($slPrId == '') {
                    $slPrId = $sttr_id;
                }
            }
            // END code to get slPrId (Update from Cust All Transaction List) @Author:PRIYANKA-21AUG17

            $stockAvail = 1;
            $itst_sell_status = '';
            $itStatus = 'PaymentDone';
        }

        if ($omly_value == 'YES') {
            $stockAvail = 1;
            $itst_sell_status = '';
            $itStatus = 'PaymentDone';
        }

        $strStockStr = "and sttr_status NOT IN ('DELETED') and sttr_indicator='stock' and sttr_transaction_type IN ('sell','ESTIMATESELL')";

        if ($stockAvail > 0 && $itst_sell_status != 'SOLDOUT' && $itStatus != 'PaymentPending') {

            if ($sellPanelName == 'SellDetUpPanel' || $sellPanelName == 'EstimateUpdate' || $sellPanelName == 'EstimatePayUp' ||
                    $sellPanelName == 'SellPayUp' || $sellPanelName == 'SellItemReturn' ||
                    $sellPanelName == 'SellItemReturnUp' || $sellPanelName == 'finalOrderUp') {

                if ($sellPanelName == 'finalOrderUp') {
                    $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' and "
                            . "sttr_pre_invoice_no = '$_GET[preOrdInvNo]' and sttr_invoice_no = '$_GET[postOrdInvNo]' "
                            . "AND sttr_indicator = 'stock' and sttr_status NOT IN ('DELETED') order by sttr_id asc";
                } else {
                    if ($_GET['preInvoiceNo'] != '' && $_GET['postInvoiceNo'] != '') {
                        $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' and "
                                . "sttr_pre_invoice_no = '$_GET[preInvoiceNo]' and sttr_invoice_no = '$_GET[postInvoiceNo]' "
                                . "AND sttr_indicator = 'stock' and sttr_status NOT IN ('DELETED') order by sttr_id asc";
                    } else {
                        $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
                                . "and sttr_id = '$slPrId' and sttr_status NOT IN ('DELETED')";
                    }
                }

//                echo '$qSelSlPrItemDetails'.$qSelSlPrItemDetails.'<br />';

                $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
                $rowSlPrItemDetails = mysqli_fetch_array($resSlPrItemDetails, MYSQLI_ASSOC);
                $slPrId = $rowSlPrItemDetails['sttr_id'];
                $custId = $rowSlPrItemDetails['sttr_user_id'];
                $slpr_add_date = $rowSlPrItemDetails['sttr_add_date'];
                $slPrPreInvoiceNo = $rowSlPrItemDetails['sttr_pre_invoice_no'];
                $slPrInvoiceNo = $rowSlPrItemDetails['sttr_invoice_no'];
                $itstId = $rowSlPrItemDetails['sttr_st_id'];
                //
                /* START CODE TO GET STOCK TYPE AT UPDATE SELL ENTRY @AUTHOR:MADHUREE-10AUGUST2020 */
                //
                $newStockType = $rowSlPrItemDetails['sttr_stock_type'];
                //
                /* END CODE TO GET STOCK TYPE AT UPDATE SELL ENTRY @AUTHOR:MADHUREE-10AUGUST2020 */
                //
                //
                //if ($newStockType == 'retail') {
                //
                // ADDED CODE FOR MANDATORY READONLY FIELDS @AUTHOR:PRIYANKA-27APR2023
                $preIdAccessStr = "readonly='readonly'";
                $postIdAccessStr = "readonly='readonly'";
                $categoryAccessStr = "readonly='readonly'";
                $nameAccessStr = "readonly='readonly'";
                $metalTypeAccessStr = "readonly='readonly'";
                $metalTypeAccessValue = "NO";
                $purityAccessStr = "NO";
                $firmAccessStr = "NO";
                //
                //}
                //
                //                
                $itst_item_pre_id = $rowSlPrItemDetails['sttr_item_pre_id'];
                $itst_item_id = $rowSlPrItemDetails['sttr_item_id'];
                $itst_firm_id = $rowSlPrItemDetails['sttr_firm_id'];
                $itst_account_id = $rowSlPrItemDetails['sttr_account_id'];
                $itst_metal_type = $rowSlPrItemDetails['sttr_metal_type'];
                $itst_item_name = $rowSlPrItemDetails['sttr_item_name'];
                $itst_item_category = $rowSlPrItemDetails['sttr_item_category'];
                $itst_item_desc = $rowSlPrItemDetails['sttr_indicator'];
                $itst_item_safe_tray = $rowSlPrItemDetails['sttr_item_safe_tray'];
                $itst_item_other_info = $rowSlPrItemDetails['sttr_item_other_info'];
                $finalQTY = $rowSlPrItemDetails['sttr_quantity'];
                $finalGSWT = $rowSlPrItemDetails['sttr_gs_weight'];
                $itemGSWT = $rowSlPrItemDetails['sttr_gs_weight_type'];
                $itemPKTW = $rowSlPrItemDetails['sttr_pkt_weight'];
                $itemPKTWT = $rowSlPrItemDetails['sttr_pkt_weight_type'];
                $itemNTW = $rowSlPrItemDetails['sttr_nt_weight'];
                $itemNTWT = $rowSlPrItemDetails['sttr_nt_weight_type'];
                $itst_metal_rate_id = $rowSlPrItemDetails['sttr_metal_rate_id'];
                $metalRate = $rowSlPrItemDetails['sttr_metal_rate'];
                $itst_vat_charges = $rowSlPrItemDetails['sttr_tax'];
                $sttr_tax = $rowSlPrItemDetails['sttr_tax'];
                $newItemFinalVal = $rowSlPrItemDetails['sttr_final_valuation'];
                $newItemSnapFName = $rowSlPrItemDetails['stsl_snap_fname'];
                $itst_item_cust_lbcrg = $rowSlPrItemDetails['sttr_making_charges'];
                $itemCustLabChrgT = $rowSlPrItemDetails['sttr_making_charges_type'];
                //
                $sttr_transaction_type = $rowSlPrItemDetails['sttr_transaction_type'];
                //
                // CODE ADDED FOR OTHER CHARGES @PRIYANKA-12OCT2018
                $sttr_other_charges = $rowSlPrItemDetails['sttr_other_charges'];
                $sttr_other_charges_type = $rowSlPrItemDetails['sttr_other_charges_type'];
                $sttr_total_other_charges = $rowSlPrItemDetails['sttr_total_other_charges'];
                $sttr_total_making_charges = $rowSlPrItemDetails['sttr_total_making_charges'];
                //
                //
                $slpr_value_added = $rowSlPrItemDetails['sttr_value_added'];
                $itemWastage = $rowSlPrItemDetails['sttr_wastage'];

                //if ($sellCustWastg == 'addStock') {
                $itemCustWastage = $rowSlPrItemDetails['sttr_cust_wastage'];
                //}

                $sttr_cust_wastage_wt = $rowSlPrItemDetails['sttr_cust_wastage_wt'];
                $sttr_metal_amt = $rowSlPrItemDetails['sttr_metal_amt'];
                $sttr_total_making_amt = $rowSlPrItemDetails['sttr_total_making_amt'];
                $sttr_mkg_discount_per = $rowSlPrItemDetails['sttr_mkg_discount_per'];
                $sttr_mkg_discount_amt = $rowSlPrItemDetails['sttr_mkg_discount_amt'];
                $sttr_metal_discount_per = $rowSlPrItemDetails['sttr_metal_discount_per'];
                $sttr_metal_discount_amt = $rowSlPrItemDetails['sttr_metal_discount_amt'];
                $tunch = $rowSlPrItemDetails['sttr_purity'];
                $itemFinalTunch = $rowSlPrItemDetails['sttr_final_purity'];
                $slpr_fine_wt = $rowSlPrItemDetails['sttr_fine_weight'];
                $slpr_final_fine_wt = $rowSlPrItemDetails['sttr_final_fine_weight'];
                $itst_item_size = $rowSlPrItemDetails['sttr_size'];
                $sttr_hsn_no = $rowSlPrItemDetails['sttr_hsn_no'];
                $metalWtBy = $rowSlPrItemDetails['sttr_final_val_by'];
                $stsl_othr_chrg_by_type = $rowSlPrItemDetails['sttr_other_charges_by'];
                $sttr_tot_price_cgst_per = $rowSlPrItemDetails['sttr_tot_price_cgst_per'];
                $sttr_tot_price_sgst_per = $rowSlPrItemDetails['sttr_tot_price_sgst_per'];
                $sttr_tot_price_igst_per = $rowSlPrItemDetails['sttr_tot_price_igst_per'];
                $sttr_mkg_sgst_per = $rowSlPrItemDetails['sttr_mkg_sgst_per'];
                $sttr_mkg_cgst_per = $rowSlPrItemDetails['sttr_mkg_cgst_per'];
                $sttr_mkg_igst_per = $rowSlPrItemDetails['sttr_mkg_igst_per'];
                $sttr_tot_tax = $rowSlPrItemDetails['sttr_tot_tax'];
                $custFinalValuation = $rowSlPrItemDetails['sttr_valuation'];
                $sttr_final_valuation = $rowSlPrItemDetails['sttr_final_valuation'];
                $sttr_cust_wastg_by = $rowSlPrItemDetails['sttr_cust_wastg_by'];

                // START CODE FOR STONE DISCOUNT IN % & STONE DISCOUNT IN AMT @PRIYANKA-12APR18        
                $sttr_mkg_discount_per = $rowSlPrItemDetails['sttr_mkg_discount_per'];
                $sttr_mkg_discount_amt = $rowSlPrItemDetails['sttr_mkg_discount_amt'];
                $sttr_metal_discount_per = $rowSlPrItemDetails['sttr_metal_discount_per'];
                $sttr_metal_discount_amt = $rowSlPrItemDetails['sttr_metal_discount_amt'];
                $sttr_mkg_charges_by = $rowSlPrItemDetails['sttr_mkg_charges_by'];
                $addCustWastageWtInSpecifiedWt = $rowSlPrItemDetails['sttr_final_fine_wt_by'];
                $sttr_hallmark_uid = $rowSlPrItemDetails['sttr_hallmark_uid'];
                // END CODE FOR STONE DISCOUNT IN % & STONE DISCOUNT IN AMT @PRIYANKA-12APR18

                $sttr_account_id = $rowSlPrItemDetails['sttr_account_id'];
                $sttr_hidden_pur_valuation = $sttr_final_valuation;

                //echo '<br/>$slpr_add_date:' . $slpr_add_date;

                $selDOBDay = substr($slpr_add_date, 0, 2);
                $selDOBMnth = substr($slpr_add_date, 3, -5);
                $todayMM = date("m", strtotime($selDOBMnth)) - 1;
                $selDOBYear = substr($slpr_add_date, -4);

                //echo '<br/>$todayMM:' . $todayMM;

                $qSelSlPrItemDetailsQty = "SELECT SUM(sttr_quantity) as total_qty FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_st_id='$itstId'";
                $resSlPrItemDetailsQty = mysqli_query($conn, $qSelSlPrItemDetailsQty);
                $rowSlPrItemDetailsQty = mysqli_fetch_array($resSlPrItemDetailsQty, MYSQLI_ASSOC);
                $sellQty = $rowSlPrItemDetailsQty['total_qty'];

                $qSelCryDet = "SELECT * FROM stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' and sttr_sttr_id = '$slPrId' and sttr_indicator='stockCrystal' and sttr_status NOT IN ('DELETED')";
                $resCryDet = mysqli_query($conn, $qSelCryDet);
                $noOfCry = mysqli_num_rows($resCryDet);

                // START CODE FOR FIRM NOT CHANGE IN CASE OF SAME INVOICE NO. @PRIYANKA-02JULY18
                $firmQuery = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' AND sttr_user_id = '$custId' "
                        . "AND sttr_status IN ('PaymentPending','PaymentDone') AND sttr_transaction_type IN ('sell','ESTIMATESELL') AND sttr_indicator = 'stock' order by sttr_id desc LIMIT 0,1";
                $firmResult = mysqli_query($conn, $firmQuery) or die(mysqli_error($conn));
                $firmNumRows = mysqli_num_rows($firmResult);

                //echo '$firmQuery == '.$firmQuery.'<br />';

                if ($firmNumRows > 0) {
                    $firmRow = mysqli_fetch_array($firmResult, MYSQLI_ASSOC);
                    $sttr_firm_id = $firmRow['sttr_firm_id'];
                    $itst_firm_id = $sttr_firm_id;
                }
                // END CODE FOR FIRM NOT CHANGE IN CASE OF SAME INVOICE NO. @PRIYANKA-02JULY18
            } else {

                //echo '$newItemId:' . $newItemPreId . '  ' . $newItemPostId;

                if ($panelName != 'Estimate') {
                    $panelName = "SellStock";
                }

                $newProdCode = $newItemPreId . $newItemPostId;

                //echo '$itemBarCodePreId == '.$newItemPostId.'<br />';
                //echo '$itemBarCodeId == '.$newItemPostId.'<br />';

                if ($newItemPreId == '' && $newItemPostId != '') {
                    $itemBarCodePreId = substr($newItemPostId, 0, 1);
                    $itemBarCodeId = substr($newItemPostId, 1);
                }

                //echo '$newProdCode == '.$newItemPreId.'<br />';
                //echo '$newItemPreId == '.$newItemPreId.'<br />';
                //echo '$newItemPostId == '.$newItemPostId.'<br />';

                if ($newProdCode != '') {

                    if ($newItemPreId != '' || $newItemPostId != '') {

                        if ($newItemPreId == '' && $newItemPostId != '') {
                            $qSelItemDetails = "SELECT * FROM stock_transaction "
                                    . "WHERE sttr_indicator = 'stock' and sttr_barcode_prefix = '$itemBarCodePreId' "
                                    . "and sttr_barcode = '$itemBarCodeId'";
                        } else if ($newItemPreId != '' && $newItemPostId == '') {
                            $qSelItemDetails = "SELECT * FROM stock_transaction where CONCAT(sttr_item_pre_id,'',sttr_item_id) = '$newProdCode' and " // CONDITION MODIFIED  @AUTHOR:SHRI18DEC19 
                                    . "sttr_status NOT IN('DELETED','SOLDOUT') and sttr_stock_type = 'retail' and " //REMOVED "or sttr_stock_type = 'wholesale'" @AUTHOR:SHRI30NOV19 
                                    . "sttr_transaction_type NOT IN ('sell','ItemReturn') order by sttr_id desc";
                        } else {
                            if ($newOrderPanelName == 'newOrderProdAddSell') {
                                $qSelItemDetails = "SELECT * FROM stock_transaction where sttr_item_pre_id = '$newItemPreId' and "
                                        . "sttr_item_id = '$newItemPostId'  AND "
                                        . "sttr_indicator = 'stock' and sttr_stock_type = 'retail' and "
                                        . "sttr_transaction_type NOT IN ('sell','newOrder') and sttr_status NOT IN('DELETED')"; // And sttr_item_code = '$newProdCode'
                            } else {
                                $qSelItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                        . "AND ((sttr_item_pre_id = '$newItemPreId' AND sttr_item_id = '$newItemPostId') "
                                        . "OR sttr_item_code = '$newProdCode') "
                                        . "AND sttr_indicator IN ('stock', 'PURCHASE') AND sttr_stock_type = 'retail' "
                                        . "AND sttr_transaction_type NOT IN ('sell','ESTIMATESELL') "
                                        . "AND sttr_status NOT IN('DELETED')"; // And sttr_item_code = '$newProdCode'
                            }
                        }

                        $resItemDetails = mysqli_query($conn, $qSelItemDetails);

                        //echo '$qSelItemDetails : ' . $qSelItemDetails . "<br>";

                        $stockCount = mysqli_num_rows($resItemDetails);

                        // If Stock Available Count is Zero then check with RFID No. @PRIYANKA-10FEB19
                        if ($stockCount == 0 && $prodScanWithRFID != '') {

                            //if ($newItemPreId == '' && $newItemPostId != '') {

                            $qSelItemDetails = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stock' "
                                    . "and sttr_rfid_no = '$newProdCode' and sttr_transaction_type NOT IN ('sell','ESTIMATESELL')";

                            $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                            $stockCount = mysqli_num_rows($resItemDetails);
                            //} 
                        }

                        // START CODE FOR SCAN PRODUCT WITH BARCODE NUMBER (STARTS WITH ZERO) @PRIYANKA-25FEB19
                        //echo '$stockCount : ' . $stockCount . "<br>";
                        if ($stockCount == 0) {
                            //
                            if ($newItemPreId == '' && $newItemPostId != '') {
                                //
                                $itemBarCodePreId = substr($newItemPostId, 0, 2);
                                $itemBarCodeId = substr($newItemPostId, 2);
                                //
                                $qSelItemDetails = "SELECT * FROM stock_transaction "
                                        . "WHERE sttr_indicator = 'stock' and sttr_barcode_prefix = '$itemBarCodePreId' "
                                        . "and sttr_barcode = '$itemBarCodeId' and sttr_transaction_type NOT IN ('sell','ESTIMATESELL')";
                                //
                                $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                                $stockCount = mysqli_num_rows($resItemDetails);
                            }
                        }
                        // END CODE FOR SCAN PRODUCT WITH BARCODE NUMBER (STARTS WITH ZERO) @PRIYANKA-25FEB19
                        //
                        //echo '$stockCount : ' . $stockCount . "<br>";
                        //
                        if ($stockCount > 0) {

                            $rowItemDetails = mysqli_fetch_array($resItemDetails, MYSQLI_ASSOC);
                            $itstId = $rowItemDetails['sttr_id'];
                            $itst_item_pre_id = $rowItemDetails['sttr_item_pre_id'];
                            $itst_item_id = $rowItemDetails['sttr_item_id'];
                            $slPrId = $rowItemDetails['sttr_id'];
                            $itst_firm_id = $rowItemDetails['sttr_firm_id'];
                            $itst_account_id = $rowItemDetails['sttr_account_id'];

                            $sttrTransactionType = $rowItemDetails['sttr_transaction_type'];

                            $itst_metal_type = $rowItemDetails['sttr_metal_type'];

                            if (($itst_metal_type == '' || $itst_metal_type == NULL) && $sttrTransactionType == 'newOrder') {
                                $itst_metal_type = $rowItemDetails['sttr_product_type'];
                            }

                            $metalRate = $rowItemDetails['sttr_metal_rate'];

                            if (($metalRate == '' || $metalRate == NULL) && $sttrTransactionType == 'newOrder') {
                                $metalRate = $rowItemDetails['sttr_product_sell_rate'];
                            }
                            $sttr_product_purchase_rate = $rowItemDetails['sttr_product_purchase_rate'];
                            $staffLoginId = $rowItemDetails['sttr_staff_id'];
                            $itst_metal_rate_id = $rowItemDetails['sttr_metal_rate_id'];
                            $itst_item_name = $rowItemDetails['sttr_item_name'];
                            $itst_item_category = $rowItemDetails['sttr_item_category'];
                            $itst_item_desc = $rowItemDetails['sttr_item_desc'];
                            $itst_item_safe_tray = $rowItemDetails['sttr_item_safe_tray'];
                            $itst_item_other_info = $rowItemDetails['sttr_item_other_info'];
                            $sttr_barcode = $rowItemDetails['sttr_barcode'];
                            $sttr_barcode_prefix = $rowItemDetails['sttr_barcode_prefix'];
                            $sttr_hsn_no = $rowItemDetails['sttr_hsn_no'];
                            $sttr_account_id = $rowItemDetails['sttr_account_id'];
                            $sttr_tot_price_cgst_per = $rowItemDetails['sttr_tot_price_cgst_per'];
                            $sttr_tot_price_sgst_per = $rowItemDetails['sttr_tot_price_sgst_per'];
                            $sttr_mkg_sgst_per = $rowItemDetails['sttr_mkg_sgst_per'];
                            $sttr_mkg_cgst_per = $rowItemDetails['sttr_mkg_cgst_per'];
                            $sttr_mkg_igst_per = $rowItemDetails['sttr_mkg_igst_per'];

                            if ($sttr_tot_price_cgst_per == '') {
                                $sttr_tot_price_cgst_per = 0;
                            }
                            if ($sttr_tot_price_sgst_per == '') {
                                $sttr_tot_price_sgst_per = 0;
                            }

                            $querySellEntry = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' and "
                                    . "sttr_sttr_id = '$slPrId' and sttr_indicator = 'stock' and sttr_transaction_type IN ('sell','ESTIMATESELL') "
                                    . "order by sttr_id asc";
                            $resultSellEntry = mysqli_query($conn, $querySellEntry);
                            $noOfSellEntry = mysqli_num_rows($resultSellEntry);

                            //echo '$sttr_tot_price_cgst_per == '.$sttr_tot_price_cgst_per.'<br />';

                            if ($noOfSellEntry > 0) {
                                $finalQTY = $rowItemDetails['sttr_final_quantity'];
                                $finalGSWT = $rowItemDetails['sttr_final_gs_weight'];
                                $itemNTW = $rowItemDetails['sttr_final_nt_weight'];

                                if ($finalQTY == 0 && $finalGSWT > 0) {
                                    $finalQTY = 1;
                                }
                            } else {
                                $finalQTY = $rowItemDetails['sttr_quantity'];
                                $finalGSWT = $rowItemDetails['sttr_gs_weight'];
                                $itemNTW = $rowItemDetails['sttr_nt_weight'];

                                if ($newItemPostId != '') {
                                    $finalGSWT = $rowItemDetails['sttr_gs_weight'];
                                    $itemGSWT = $rowItemDetails['sttr_gs_weight_type'];
                                }
                            }
                            //
                            $itemGSWT = $rowItemDetails['sttr_gs_weight_type'];
                            $newItemGSQT = $rowItemDetails['sttr_gs_weight_type'];
                            $itemNTWT = $rowItemDetails['sttr_nt_weight_type'];
                            $itemPKTW = $rowItemDetails['sttr_pkt_weight'];
                            $itemPKTWT = $rowItemDetails['sttr_pkt_weight_type'];
                            $newItemFFNW = $rowItemDetails['sttr_final_fine_wt'];
                            $newStockType = $rowItemDetails['sttr_stock_type'];
                            //
                            //
                            // ADDED CODE FOR MANDATORY READONLY FIELDS @AUTHOR:PRIYANKA-27APR2023
                            if ($newStockType == 'retail') {
                                //
                                $preIdAccessStr = "readonly='readonly'";
                                $postIdAccessStr = "readonly='readonly'";
                                $categoryAccessStr = "readonly='readonly'";
                                $nameAccessStr = "readonly='readonly'";
                                $metalTypeAccessStr = "readonly='readonly'";
                                $metalTypeAccessValue = "NO";
                                $purityAccessStr = "NO";
                                $firmAccessStr = "NO";
                                //
                            }
                            //
                            //
                            $slpr_value_added = $rowItemDetails['sttr_value_added'];
                            $newItemTunch = $rowItemDetails['sttr_purity'];
                            $newStockType = $rowItemDetails['sttr_stock_type'];
                            $newItemLabChrg = $rowItemDetails['sttr_lab_charges'];
                            $newItemLabChrgType = $rowItemDetails['sttr_lab_charges_type'];
                            $custFinalValuation = $rowItemDetails['sttr_valuation'];
                            $itemCryValuation = $rowItemDetails['sttr_stone_valuation'];
                            $itst_vat_charges = $rowItemDetails['sttr_tax'];
                            $sttr_tax = $rowItemDetails['sttr_tax'];
                            $totalItemTaxChrg = $newItemVATCharges + $newItemTaxOthChrg;
                            $sttr_final_valuation = $rowItemDetails['sttr_final_valuation'];
                            $itemCustTunch = $rowItemDetails['sttr_purity'];
                            $itst_item_cust_lbcrg = $rowItemDetails['sttr_making_charges'];
                            $sttr_mkg_charges_type = $rowItemDetails['sttr_mkg_charges_type'];
                            $sttr_total_making_charges = $rowItemDetails['sttr_total_making_charges'];
                            $sttr_hidden_pur_valuation = $sttr_final_valuation;
                            //
                            if ($sttr_mkg_cgst_per == '') {
                                $sttr_mkg_cgst_per = 0;
                            }
                            if ($sttr_mkg_sgst_per == '') {
                                $sttr_mkg_sgst_per = 0;
                            }
                            //
                            // CODE ADDED FOR OTHER CHARGES @PRIYANKA-12OCT2018
                            $sttr_other_charges = $rowItemDetails['sttr_other_charges'];
                            $sttr_other_charges_type = $rowItemDetails['sttr_other_charges_type'];
                            $sttr_total_other_charges = $rowItemDetails['sttr_total_other_charges'];
                            //
                            $sttr_other_info = $rowItemDetails['sttr_other_info'];
                            //
                            $itemCustLabChrgT = $rowItemDetails['sttr_making_charges_type'];
                            $itst_item_size = $rowItemDetails['sttr_item_size'];
                            $itemWastage = $rowItemDetails['sttr_wastage'];

                            if ($sellCustWastg == 'addStock') {
                                $itemCustWastage = $rowItemDetails['sttr_cust_wastage'];
                            }

                            $sttr_cust_wastage_wt = $rowItemDetails['sttr_cust_wastage_wt'];
                            $sttr_metal_amt = $rowItemDetails['sttr_metal_amt'];
                            $sttr_total_making_amt = $rowItemDetails['sttr_total_making_amt'];
                            $sttr_mkg_discount_per = $rowItemDetails['sttr_mkg_discount_per'];
                            $sttr_mkg_discount_amt = $rowItemDetails['sttr_mkg_discount_amt'];
                            $sttr_metal_discount_per = $rowItemDetails['sttr_metal_discount_per'];
                            $sttr_metal_discount_amt = $rowItemDetails['sttr_metal_discount_amt'];

                            $itemFinalTunch = $rowItemDetails['sttr_final_purity'];
                            $slpr_tunch = $rowItemDetails['sttr_purity'];
                            $purity = explode('%', $slpr_tunch);
                            $tunch = $purity[0];
                            $slpr_fine_wt = $rowItemDetails['sttr_fine_weight'];
                            $slpr_final_fine_wt = $rowItemDetails['sttr_final_fine_weight'];
                            $stsl_othr_chrg_by_type = $rowItemDetails['sttr_other_charges_by'];
                            $sttr_mkg_charges_by = $rowItemDetails['sttr_mkg_charges_by'];
                            $sttr_cust_wastg_by = $rowItemDetails['sttr_cust_wastg_by'];
                            $sttr_final_valuation_by = $rowItemDetails['sttr_final_valuation_by'];
                            $addCustWastageWtInSpecifiedWt = $rowSlPrItemDetails['sttr_final_fine_wt_by'];
                            $sttr_hallmark_uid = $rowItemDetails['sttr_hallmark_uid'];
                            //
                            //if ($sttr_mkg_charges_by != '') {
                            //    $stsl_othr_chrg_by_type = $sttr_mkg_charges_by;
                            //}
                            //
                            //
                            if ($_SESSION['sessionOwnIndStr'][35] == 'A' ||
                                    $_SESSION['sessionOwnIndStr'][35] == 'B') {
                                // SET DISCOUNT COLUMNS @PRIYANKA-10NOV2020
                                $sttr_disc_start_date = $rowItemDetails['sttr_disc_start_date'];
                                $sttr_disc_end_date = $rowItemDetails['sttr_disc_end_date'];
                                $sttr_disc_product_amount = $rowItemDetails['sttr_disc_product_amount'];
                                $sttr_disc_making_discount = $rowItemDetails['sttr_disc_making_discount'];
                                $sttr_disc_stone_discount = $rowItemDetails['sttr_disc_stone_discount'];
                                $sttr_disc_product_discount = $rowItemDetails['sttr_disc_product_discount'];
                                $sttr_disc_active = $rowItemDetails['sttr_disc_active'];
                            }
                            //
                            //
                        } else {

                            $itemStockPresent = noOfRowsCheck('st_id', 'stock', "st_owner_id='$_SESSION[sessionOwnerId]' AND st_item_code='$newProdCode'");

                            //echo '$itemStockPresent=='.$itemStockPresent;

                            if ($itemStockPresent == 0 && $stockCount == 0) { // IF ADDDED @AUTHOR:SHRI30NOV19
                                ?>    
                                <div class="fs_13 ff_calibri bold" style="color:red;">This product is not present into stock list.</div>
                                <?php
                            }
                            if ($itemStockPresent > 0) {

                                $qSelItemDetails = "SELECT * FROM stock where st_item_code = '$newProdCode' AND st_gs_weight!=0 AND st_nt_weight!=0";
                                $qSelItemDetailsFromSttr = "SELECT * FROM stock_transaction where sttr_item_code = '$newProdCode' order by sttr_id DESC LIMIT 0,1";
                                $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                                $rowItemDetails = mysqli_fetch_array($resItemDetails, MYSQLI_ASSOC);
                                $resItemDetailsFromSttr = mysqli_query($conn, $qSelItemDetailsFromSttr);
                                $rowItemDetailsFromSttr = mysqli_fetch_array($resItemDetailsFromSttr, MYSQLI_ASSOC);

                                $itst_owner_id = $rowItemDetails['st_owner_id'];
                                $itst_firm_id = $rowItemDetails['st_firm_id'];
                                $itst_metal_type = $rowItemDetails['st_metal_type'];
                                $stockType = $rowItemDetails['st_stock_type'];
                                $itst_item_name = $rowItemDetails['st_item_name'];
                                $itst_item_category = $rowItemDetails['st_item_category'];
                                $finalQTY = $rowItemDetails['st_quantity'];
                                $tunch = $rowItemDetails['st_purity'];
                                $metalRate = $rowItemDetails['st_metal_rate'];
                                $sttr_product_purchase_rate = $rowItemDetails['st_purchase_rate'];
                                $finalGSWT = $rowItemDetails['st_gs_weight'];
                                $itemGSWT = $rowItemDetails['st_gs_weight_type'];
                                $itemPKTW = $rowItemDetails['st_pkt_weight'];
                                $itemNTW = $rowItemDetails['st_nt_weight'];
                                $slpr_fine_wt = $rowItemDetails['st_fine_weight'];
                                $slpr_final_fine_wt = $rowItemDetails['st_final_fine_weight'];
                                $itemNTWT = $rowItemDetails['st_nt_weight_type'];
                                $itemPKTWT = $rowItemDetails['st_pkt_weight_type'];
                                $itst_item_cust_lbcrg = $rowItemDetails['st_making_charges'];
                                $itemCustLabChrgT = $rowItemDetails['st_making_charges_type'];
                                $sttr_tot_tax = $rowItemDetails['st_tot_tax'];
                                $sttr_tax = $rowItemDetails['st_tax'];
                                $custFinalValuation = $rowItemDetails['st_valuation'];
                                $sttr_final_valuation = $rowItemDetails['st_final_valuation'];
                                $itst_item_pre_id = $rowItemDetails['st_item_code'];
                                $sttr_indicator = $rowItemDetails['st_type'];
                                $itst_item_shape = $rowItemDetails['st_shape'];
                                $itst_item_size = $rowItemDetails['st_size'];
                                $itst_item_desc = $rowItemDetails['st_item_other_info'];
                                $newStockType = $rowItemDetails['st_stock_type'];
                                $sttr_hsn_no = $rowItemDetails['sttr_hsn_no'];
                                $itemFinalTunch = $rowItemDetailsFromSttr['sttr_final_purity'];
                                $itemCustWastage = $rowItemDetailsFromSttr['sttr_cust_wastage'];
                                $itemWastage = $rowItemDetailsFromSttr['sttr_wastage'];
                                $sttr_cust_wastage_wt = $rowItemDetailsFromSttr['sttr_cust_wastage_wt'];
                                $sttr_cust_wastg_by = $rowItemDetailsFromSttr['sttr_cust_wastg_by'];
                                $sttr_mkg_sgst_per = $rowItemDetails['sttr_mkg_sgst_per'];
                                $sttr_mkg_cgst_per = $rowItemDetails['sttr_mkg_cgst_per'];
                                $sttr_mkg_igst_per = $rowItemDetails['sttr_mkg_igst_per'];
                                $sttr_final_valuation_by = $rowItemDetails['sttr_final_valuation_by'];
                                $addCustWastageWtInSpecifiedWt = $rowSlPrItemDetails['sttr_final_fine_wt_by'];
                                $sttr_hidden_pur_valuation = $sttr_final_valuation;
                                //
                                $sttr_other_charges = $rowItemDetailsFromSttr['sttr_other_charges'];
                                $sttr_other_charges_type = $rowItemDetailsFromSttr['sttr_other_charges_type'];
                                $itst_item_cust_lbcrg = $rowItemDetailsFromSttr['sttr_making_charges'];
                                $itemCustLabChrgT = $rowItemDetailsFromSttr['sttr_making_charges_type'];
                                $sttr_total_other_charges = $rowItemDetailsFromSttr['sttr_total_other_charges'];
                                $sttr_total_making_charges = $rowItemDetailsFromSttr['sttr_total_making_charges'];
                                $sttr_hallmark_uid = $rowItemDetailsFromSttr['sttr_hallmark_uid'];
                                $sttr_stock_type = $rowItemDetailsFromSttr['sttr_stock_type'];
                                //
                                //echo '$itemCustWastage : ' . $itemCustWastage;
                                //
                                //
                                //
                                // ADDED CODE FOR MANDATORY READONLY FIELDS @AUTHOR:PRIYANKA-27APR2023
                                if ($sttr_stock_type == 'wholesale') {
                                    //
                                    $preIdAccessStr = "readonly='readonly'";
                                    $postIdAccessStr = "readonly='readonly'";
                                    $categoryAccessStr = "readonly='readonly'";
                                    $nameAccessStr = "readonly='readonly'";
                                    $metalTypeAccessStr = "readonly='readonly'";
                                    $metalTypeAccessValue = "NO";
                                    $purityAccessStr = "NO";
                                    $firmAccessStr = "NO";
                                    //
                                }
                                //
                                //
                                //
                                if ($sttr_tot_price_cgst_per == '') {
                                    $sttr_tot_price_cgst_per = 0;
                                }
                                //
                                if ($sttr_tot_price_sgst_per == '') {
                                    $sttr_tot_price_sgst_per = 0;
                                }
                                //
                                include 'ogspvalu.php';
                                //
                            } else {

                                $itst_item_pre_id = $newItemPreId;

                                parse_str(getTableValues("SELECT MAX(CAST(sttr_item_id AS SIGNED)) as item_id FROM stock_transaction "
                                                . "WHERE sttr_owner_id = '$sessionOwnerId' and sttr_user_id = '$custId' AND "
                                                . "sttr_item_pre_id = '$itst_item_pre_id' AND sttr_indicator = 'stock' AND "
                                                . "sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_status NOT IN ('DELETED')"));

                                $itst_item_id = '';

                                $qSelSlPrItemDetails = "SELECT * FROM stock_transaction "
                                        . "WHERE sttr_owner_id = '$sessionOwnerId' and sttr_item_pre_id = '$itst_item_pre_id' "
                                        . "AND sttr_item_id = '$itst_item_id' AND sttr_user_id='$custId' AND "
                                        . "sttr_transaction_type IN ('sell','ESTIMATESELL') "
                                        . "and sttr_indicator = 'stock' and sttr_status NOT IN ('DELETED') "
                                        . "order by sttr_id LIMIT 0,1";

                                $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
                                $rowSlPrItemDetails = mysqli_fetch_array($resSlPrItemDetails, MYSQLI_ASSOC);
                                $itst_firm_id = $rowSlPrItemDetails['sttr_firm_id'];
                                $staffLoginId = $rowSlPrItemDetails['sttr_staff_id'];
                                $itst_account_id = $rowSlPrItemDetails['sttr_account_id'];
                                $itst_metal_type = $rowSlPrItemDetails['sttr_metal_type'];
                                $itst_metal_rate_id = $rowSlPrItemDetails['sttr_metal_rate_id'];
                                $itst_item_name = $rowSlPrItemDetails['sttr_item_name'];
                                $itst_item_category = $rowSlPrItemDetails['sttr_item_category'];
                                $finalQTY = $rowSlPrItemDetails['sttr_quantity'];
                                $finalGSWT = $rowItemDetails['sttr_gs_weight'];
                                $newStockType = $rowSlPrItemDetails['sttr_stock_type'];
                                $metalRate = $rowSlPrItemDetails['sttr_metal_rate'];
                                $sttr_product_purchase_rate = $rowSlPrItemDetails['sttr_product_purchase_rate'];
                                $itst_vat_charges = $rowSlPrItemDetails['sttr_tax'];
                                $sttr_tax = $rowSlPrItemDetails['sttr_tax'];
                                $itst_item_cust_lbcrg = $rowSlPrItemDetails['sttr_making_charges'];
                                $itemCustLabChrgT = $rowSlPrItemDetails['sttr_making_charges_type'];
                                //
                                // CODE ADDED FOR OTHER CHARGES @PRIYANKA-12OCT2018
                                $sttr_other_charges = $rowSlPrItemDetails['sttr_other_charges'];
                                $sttr_other_charges_type = $rowSlPrItemDetails['sttr_other_charges_type'];
                                $sttr_total_other_charges = $rowSlPrItemDetails['sttr_total_other_charges'];
                                $sttr_total_making_charges = $rowSlPrItemDetails['sttr_total_making_charges'];
                                //
                                $slpr_value_added = $rowSlPrItemDetails['sttr_value_added'];
                                $sttr_account_id = $rowSlPrItemDetails['sttr_account_id'];
                                $sttr_hsn_no = $rowSlPrItemDetails['sttr_hsn_no'];
                                $itemGSWT = $rowSlPrItemDetails['sttr_gs_weight_type'];
                                $itemNTWT = $rowSlPrItemDetails['sttr_nt_weight_type'];
                                $itemPKTWT = $rowSlPrItemDetails['sttr_pkt_weight_type'];
                                $custFinalValuation = $rowSlPrItemDetails['sttr_valuation'];
                                $sttr_final_valuation = $rowSlPrItemDetails['sttr_final_valuation'];
                                $itemWastage = $rowSlPrItemDetails['sttr_wastage'];
                                $sttr_hidden_pur_valuation = $sttr_final_valuation;

                                if ($sellCustWastg == 'addStock') {
                                    $itemCustWastage = $rowSlPrItemDetails['sttr_cust_wastage'];
                                }

                                $sttr_cust_wastage_wt = $rowSlPrItemDetails['sttr_cust_wastage_wt'];
                                $sttr_metal_amt = $rowSlPrItemDetails['sttr_metal_amt'];
                                $sttr_total_making_amt = $rowSlPrItemDetails['sttr_total_making_amt'];
                                $sttr_mkg_discount_per = $rowSlPrItemDetails['sttr_mkg_discount_per'];
                                $sttr_mkg_discount_amt = $rowSlPrItemDetails['sttr_mkg_discount_amt'];
                                $sttr_metal_discount_per = $rowSlPrItemDetails['sttr_metal_discount_per'];
                                $sttr_metal_discount_amt = $rowSlPrItemDetails['sttr_metal_discount_amt'];
                                $slpr_tunch = $rowSlPrItemDetails['sttr_purity'];
                                $itemFinalTunch = $rowSlPrItemDetails['sttr_final_purity'];
                                $slpr_final_fine_wt = $rowSlPrItemDetails['sttr_final_fine_weight'];
                                $itst_item_size = $rowSlPrItemDetails['sttr_size'];
                                $stsl_othr_chrg_by_type = $rowSlPrItemDetails['sttr_other_charges_by'];
                                $sttr_mkg_charges_by = $rowSlPrItemDetails['sttr_mkg_charges_by'];
                                $sttr_final_valuation_by = $rowSlPrItemDetails['sttr_final_valuation_by'];
                                $addCustWastageWtInSpecifiedWt = $rowSlPrItemDetails['sttr_final_fine_wt_by'];
                                $sttr_hallmark_uid = $rowSlPrItemDetails['sttr_hallmark_uid'];

                                //if ($sttr_mkg_charges_by != '') {
                                //    $stsl_othr_chrg_by_type = $sttr_mkg_charges_by;
                                //}

                                if ($itst_item_pre_id == '' || $itst_item_pre_id == NULL) {
                                    $itst_item_pre_id = 'PG';
                                }
                            }
                        }

                        $totalWastage = $itemCustWastage + $itemFinalTunch;

                        $totalLabNOthCharges = 0;

                        $selDOBDay = date(j);
                        $todayMM = date(n) - 1;
                        $selDOBYear = date(Y);
                        $selDOBMnth = strtoupper(date(M));

                        include 'ogspvalu.php';

                        if ($crystalCount == '') {
                            $crystalCount = 1;
                        }
                    } else {

                        $itemStockPresent = noOfRowsCheck('st_id', 'stock', "st_owner_id = '$_SESSION[sessionOwnerId]' AND st_item_code = '$newProdCode'");

                        if ($itemStockPresent == 0) { // IF ADDDED @AUTHOR:SHRI30NOV19
                            ?>    
                            <div class="fs_13 ff_calibri bold" style="color:red;">This product is not present into stock list.</div>
                            <?php
                        }

                        if ($itemStockPresent > 0) {

                            $qSelItemDetails = "SELECT st_id,st_item_code,st_firm_id,st_metal_type,st_item_category FROM stock WHERE "
                                    . "st_item_code='$newProdCode'";
                            $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                            $rowItemDetails = mysqli_fetch_array($resItemDetails, MYSQLI_ASSOC);

                            $itstId = $rowItemDetails['st_id'];
                            $itst_item_code = $rowItemDetails['st_item_code'];
                            $itst_item_pre_id = $newItemPreId;
                            $itst_firm_id = $rowItemDetails['st_firm_id'];
                            $itst_metal_type = $rowItemDetails['st_metal_type'];
                            $finalQTY = $rowItemDetails['st_quantity'];
                            $finalGSWT = $rowItemDetails['st_gs_weight'];
                            $slpr_fine_wt = $rowItemDetails['st_fine_weight'];
                            $slpr_final_fine_wt = $rowItemDetails['st_final_fine_weight'];
                            $newStockType = $rowItemDetails['st_stock_type'];
                            $sttr_barcode_prefix = $rowItemDetails['st_barcode_prefix'];
                            $sttr_barcode = $rowItemDetails['st_barcode'];
                            $itst_item_category = $rowItemDetails['st_item_category'];
                            $totalLabNOthCharges = 0;
                            $itemGSWT = $rowItemDetails['st_gs_weight_type'];
                            $itemNTWT = $rowItemDetails['st_nt_weight_type'];
                            $itemPKTWT = $rowItemDetails['st_pkt_weight_type'];
                            $sttr_product_purchase_rate = $rowItemDetails['st_purchase_rate'];
                            include 'ogspvalu.php';

                            //Get post id if not entered by user.
                            $qSelInvNo = "SELECT sttr_item_id FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' and "
                                    . "sttr_user_id = '$custId' and sttr_pre_invoice_no = '$slPrPreInvoiceNo' and "
                                    . "sttr_invoice_no = '$slPrInvoiceNo' and sttr_item_pre_id = '$itst_item_pre_id' "
                                    . "order by sttr_id LIMIT 0,1";

                            $resInvNo = mysqli_query($conn, $qSelInvNo);
                            $rowInvNo = mysqli_fetch_array($resInvNo, MYSQLI_ASSOC);

                            $itst_item_id = $rowInvNo['sttr_item_id'];
                        } else {

                            $itst_item_pre_id = $newItemPreId;

                            parse_str(getTableValues("SELECT MAX(CAST(sttr_item_id AS SIGNED)) as item_id FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_user_id='$custId' AND sttr_item_pre_id='$itst_item_pre_id' AND sttr_indicator = 'stock' AND sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_status NOT IN ('DELETED')"));

                            $itst_item_id = $item_id;

                            $qSelSlPrItemDetails = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' and "
                                    . "sttr_item_pre_id = '$itst_item_pre_id' AND sttr_item_id = '$itst_item_id' "
                                    . "AND sttr_user_id = '$custId' AND sttr_transaction_type IN ('sell','ESTIMATESELL') "
                                    . "and sttr_indicator = 'stock' and sttr_status NOT IN ('DELETED') "
                                    . "order by sttr_id LIMIT 0,1";

                            $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
                            $rowSlPrItemDetails = mysqli_fetch_array($resSlPrItemDetails, MYSQLI_ASSOC);

                            $itst_firm_id = $rowSlPrItemDetails['sttr_firm_id'];
                            $itst_account_id = $rowSlPrItemDetails['sttr_account_id'];

                            $itst_metal_type = $rowSlPrItemDetails['sttr_metal_type'];
                            $itst_metal_rate_id = $rowSlPrItemDetails['sttr_metal_rate_id'];
                            $itst_item_name = $rowSlPrItemDetails['sttr_item_name'];
                            $itst_item_category = $rowSlPrItemDetails['sttr_item_category'];
                            $finalQTY = $rowSlPrItemDetails['sttr_quantity'];
                            $newStockType = $rowSlPrItemDetails['sttr_stock_type'];
                            $metalRate = $rowSlPrItemDetails['sttr_metal_rate'];
                            $itst_vat_charges = $rowSlPrItemDetails['sttr_tax'];
                            $sttr_tax = $rowSlPrItemDetails['sttr_tax'];
                            $itst_item_cust_lbcrg = $rowSlPrItemDetails['sttr_making_charges'];
                            $itemCustLabChrgT = $rowSlPrItemDetails['sttr_making_charges_type'];
                            //
                            // CODE ADDED FOR OTHER CHARGES @PRIYANKA-12OCT2018
                            $sttr_other_charges = $rowSlPrItemDetails['sttr_other_charges'];
                            $sttr_other_charges_type = $rowSlPrItemDetails['sttr_other_charges_type'];
                            $sttr_total_other_charges = $rowSlPrItemDetails['sttr_total_other_charges'];
                            $sttr_total_making_charges = $rowSlPrItemDetails['sttr_total_making_charges'];
                            //
                            $slpr_value_added = $rowSlPrItemDetails['sttr_value_added'];
                            $itemWastage = $rowSlPrItemDetails['sttr_wastage'];

                            if ($sellCustWastg == 'addStock') {
                                $itemCustWastage = $rowSlPrItemDetails['sttr_cust_wastage'];
                            }

                            $sttr_cust_wastage_wt = $rowSlPrItemDetails['sttr_cust_wastage_wt'];
                            $sttr_metal_amt = $rowSlPrItemDetails['sttr_metal_amt'];
                            $sttr_total_making_amt = $rowSlPrItemDetails['sttr_total_making_amt'];
                            $sttr_mkg_discount_per = $rowSlPrItemDetails['sttr_mkg_discount_per'];
                            $sttr_mkg_discount_amt = $rowSlPrItemDetails['sttr_mkg_discount_amt'];
                            $sttr_metal_discount_per = $rowSlPrItemDetails['sttr_metal_discount_per'];
                            $sttr_metal_discount_amt = $rowSlPrItemDetails['sttr_metal_discount_amt'];
                            $slpr_tunch = $rowSlPrItemDetails['sttr_purity'];
                            $itemFinalTunch = $rowSlPrItemDetails['sttr_final_purity'];
                            $slpr_final_fine_wt = $rowSlPrItemDetails['sttr_final_fine_weight'];
                            $itst_item_size = $rowSlPrItemDetails['sttr_size'];
                            $custFinalValuation = $rowSlPrItemDetails['sttr_valuation'];
                            $sttr_final_valuation = $rowSlPrItemDetails['sttr_final_valuation'];
                            $sttr_hsn_no = $rowSlPrItemDetails['sttr_hsn_no'];
                            $itemGSWT = $rowSlPrItemDetails['sttr_gs_weight_type'];
                            $itemNTWT = $rowSlPrItemDetails['sttr_nt_weight_type'];
                            $itemPKTWT = $rowSlPrItemDetails['sttr_pkt_weight_type'];
                            $stsl_othr_chrg_by_type = $rowSlPrItemDetails['sttr_other_charges_by'];
                            $sttr_mkg_charges_by = $rowSlPrItemDetails['sttr_mkg_charges_by'];
                            $sttr_final_valuation_by = $rowSlPrItemDetails['sttr_final_valuation_by'];
                            $addCustWastageWtInSpecifiedWt = $rowSlPrItemDetails['sttr_final_fine_wt_by'];
                            $sttr_hallmark_uid = $rowSlPrItemDetails['sttr_hallmark_uid'];
                            $sttr_hidden_pur_valuation = $sttr_final_valuation;

                            //if ($sttr_mkg_charges_by != '') {
                            //    $stsl_othr_chrg_by_type = $sttr_mkg_charges_by;
                            //}

                            $sttr_account_id = $rowSlPrItemDetails['sttr_account_id'];

                            if ($itst_item_pre_id == '' || $itst_item_pre_id == NULL) {
                                $itst_item_pre_id = 'PG';
                            }
                        }
                    }

                    //echo '$slPrId=='.$slPrId;

                    if ($slPrId != '') {
                        $qSelCryDet = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                                . "and sttr_sttr_id = '$slPrId' and sttr_indicator = 'stockCrystal' "
                                . "and sttr_status NOT IN ('DELETED')";
                        $resCryDet = mysqli_query($conn, $qSelCryDet);
                        $noOfCry = mysqli_num_rows($resCryDet);
                    }

                    if ($itst_metal_type == '') {
                        $itst_metal_type = 'Gold';
                    }

                    //echo '$metalRate == '.$metalRate.'<br />';
                    //echo '$itst_item_cust_lbcrg == '.$itst_item_cust_lbcrg.'<br />';
                    //echo '$itemCustLabChrgT == '.$itemCustLabChrgT.'<br />';
                    //echo '$tunch == '.$tunch.'<br />';
                    //echo '$itemFinalTunch == '.$itemFinalTunch.'<br />';

                    if ($metalRate == '' || $metalRate == NULL) {

                        parse_str(getTableValues("SELECT met_rate_metal_id, met_rate_value, met_rate_mkg_chrgs, "
                                        . "met_rate_mkg_chrgs_type, met_rate_purity FROM metal_rates WHERE "
                                        . "met_rate_own_id = '$_SESSION[sessionOwnerId]' and "
                                        . "met_rate_metal_name = '$itst_metal_type' "
                                        . "order by met_rate_ent_dat desc LIMIT 0, 1"));

                        if ($met_rate_metal_id != '' || $met_rate_metal_id != NULL) {
                            $itst_metal_rate_id = $met_rate_metal_id;
                        }

                        if ($met_rate_value != '' || $met_rate_value != NULL) {
                            $metalRate = $met_rate_value;
                        }
                    } else {

                        if ($itst_metal_rate_id != '') {
                            parse_str(getTableValues("SELECT met_rate_value, met_rate_mkg_chrgs, "
                                            . "met_rate_mkg_chrgs_type, met_rate_purity "
                                            . "FROM metal_rates WHERE met_rate_own_id = '$_SESSION[sessionOwnerId]' "
                                            . "and met_rate_metal_name = '$itst_metal_type' "
                                            . "and met_rate_metal_id = '$itst_metal_rate_id' "
                                            . "order by met_rate_ent_dat desc LIMIT 0, 1"));
                            $metalRate = $met_rate_value;
                        } else {
                            parse_str(getTableValues("SELECT met_rate_metal_id, met_rate_value, met_rate_mkg_chrgs, "
                                            . "met_rate_mkg_chrgs_type, met_rate_purity FROM metal_rates "
                                            . "WHERE met_rate_own_id = '$_SESSION[sessionOwnerId]' "
                                            . "and met_rate_metal_name = '$itst_metal_type' and "
                                            . "met_rate_value = '$metalRate' "
                                            . "order by met_rate_ent_dat asc LIMIT 0, 1"));

                            // When sell TAG, Value Added showing NaN and Metal Rate showing blank @PRIYANKA-19OCT18
                            if ($met_rate_metal_id != '' || $met_rate_metal_id != NULL) {
                                $itst_metal_rate_id = $met_rate_metal_id;
                            }

                            if ($met_rate_value != '' || $met_rate_value != NULL) {
                                $metalRate = $met_rate_value;
                            }

                            if ($met_rate_metal_id != '') {
                                parse_str(getTableValues("SELECT met_rate_value, met_rate_mkg_chrgs, "
                                                . "met_rate_mkg_chrgs_type, met_rate_purity "
                                                . "FROM metal_rates WHERE met_rate_own_id = '$_SESSION[sessionOwnerId]' "
                                                . "and met_rate_metal_name = '$itst_metal_type' "
                                                . "and met_rate_metal_id = '$met_rate_metal_id' "
                                                . "order by met_rate_ent_dat desc LIMIT 0, 1"));
                                $metalRate = $met_rate_value;
                            }
                        }
                    }
                    //
                    if ($metalRate == '' || $metalRate == NULL || $metalRate <= 0) {
                        //
                        parse_str(getTableValues("SELECT met_rate_value, met_rate_mkg_chrgs, "
                                        . "met_rate_mkg_chrgs_type, met_rate_purity FROM metal_rates WHERE "
                                        . "met_rate_own_id = '$_SESSION[sessionOwnerId]' and "
                                        . "met_rate_metal_name = '$itst_metal_type' "
                                        . "order by met_rate_ent_dat desc LIMIT 0, 1"));

                        if ($met_rate_value != '' || $met_rate_value != NULL) {
                            $metalRate = $met_rate_value;
                        }
                    }

                    // Start code for Metal Rates which effects the Making/Making Type/Tunch Functionality @PRIYANKA-20OCT18
                    if ($met_rate_mkg_chrgs != '' && $met_rate_mkg_chrgs != NULL) {
                        $itst_item_cust_lbcrg = $met_rate_mkg_chrgs;
                        $itemCustLabChrgT = $met_rate_mkg_chrgs_type;
                    }

                    if ($met_rate_purity != '' && $met_rate_purity != NULL) {
                        $tunch = $met_rate_purity;
                        $itemFinalTunch = $met_rate_purity;
                    }
                    // End code for Metal Rates which effects the Making/Making Type/Tunch Functionality @PRIYANKA-20OCT18
                    //echo '$metalRate @@%%== '.$metalRate.'<br />';
                    //echo '$itst_item_cust_lbcrg @@%%== '.$itst_item_cust_lbcrg.'<br />';
                    //echo '$itemCustLabChrgT @@%%== '.$itemCustLabChrgT.'<br />';
                    //echo '$tunch @@%%== '.$tunch.'<br />';
                    //echo '$itemFinalTunch @@%%== '.$itemFinalTunch.'<br />';

                    $selDOBDay = date(j);
                    $todayMM = date(n) - 1;
                    $selDOBYear = date(Y);
                    $selDOBMnth = strtoupper(date(M));
                }

                // START CODE FOR FIRM NOT CHANGE IN CASE OF SAME INVOICE NO. @PRIYANKA-02JULY18
                $firmQuery = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' AND sttr_user_id = '$custId' "
                        . "AND sttr_status IN ('PaymentPending') AND sttr_transaction_type IN ('sell','ESTIMATESELL') "
                        . "AND sttr_indicator = 'stock' order by sttr_id desc LIMIT 0,1";
                $firmResult = mysqli_query($conn, $firmQuery) or die(mysqli_error($conn));
                $firmNumRows = mysqli_num_rows($firmResult);

                //echo '$firmQuery == '.$firmQuery.'<br />';

                if ($firmNumRows > 0) {

                    $firmRow = mysqli_fetch_array($firmResult, MYSQLI_ASSOC);
                    $sttr_add_date = $firmRow['sttr_add_date'];
                    $sttr_firm_id = $firmRow['sttr_firm_id'];
                    $itst_firm_id = $sttr_firm_id;
                    $selDOBDay = substr($sttr_add_date, 0, 2);
                    $selDOBMnth = substr($sttr_add_date, 3, -5);
                    $todayMM = date("m", strtotime($selDOBMnth)) - 1;
                    $selDOBYear = substr($sttr_add_date, -4);
                    //echo '$itst_firm_id ##== '.$itst_firm_id.'<br />';
                }
                // END CODE FOR FIRM NOT CHANGE IN CASE OF SAME INVOICE NO. @PRIYANKA-02JULY18

                $newItemPreId = $_GET['srchItemPreId'];

                //Start to get details from stock sell table
                $stockType = 'stock';

                if ($panelName != 'Estimate') {
                    $transType = 'sell';
                } else {
                    $transType = 'ESTIMATE';
                }

                if ($staffId != '' && $staffId != NULL) {
                    if ($_SESSION['setFirmSession'] != '' && ($itst_firm_id == NULL || $itst_firm_id == '')) {
                        $firmID = $_SESSION['setFirmSession'];
                        $itst_firm_id = $_SESSION['setFirmSession'];
                    }
                } else {
                    if ($_SESSION['setFirmSession'] != '' && $_SESSION['setFirmSession'] != NULL) {
                        $firmID = $_SESSION['setFirmSession'];
                        $itst_firm_id = $_SESSION['setFirmSession'];
                    }
                }

                $changeInv = $_REQUEST['changeInv'];

                //echo '$staffId == ' . $staffId . '<br />';
                //echo '$firmID == ' . $firmID . '<br />';
                //echo '$itst_firm_id == ' . $itst_firm_id . '<br />';

                parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'InvNoIndi'"));
                if ($omly_value == "InvNoByFirm")
                    $firmID = $itst_firm_id;

                parse_str(getTableValues("SELECT omly_value,omly_option FROM omlayout WHERE omly_option = 'InvNoByMetal'"));
                if ($omly_value == 'true')
                    $metalType = $itst_metal_type;

                //echo '$firmID=='.$firmID;

                if ($firmID == '' || $firmID == NULL) {
                    $firmID = $itst_firm_id;
                }

                if (($firmID == '' || $firmID == NULL)) {
                    parse_str(getTableValues("SELECT user_firm_id FROM user WHERE user_id = '$custId'"));
                    $firmID = $user_firm_id;
                    $itst_firm_id = $firmID;
                }

                //echo '$changeInv == '.$changeInv;           
                //echo '$stockType == '.$stockType.'<br />';
                //echo '$transType == '.$transType.'<br />';
                //echo '$changeInv == '.$changeInv.'<br />';
                //echo '$metalType == '.$metalType.'<br />';
                //echo '$firmID == '.$firmID.'<br />';

                if ($changeInv != '')
                    $invoiceNumber = explode('*', getInvoiceNum($custId, $stockType, $transType, $changeInv, $firmID, $metalType));
                else
                    $invoiceNumber = explode('*', getInvoiceNum($custId, $stockType, $transType, '', $firmID, $metalType));

                $slPrPreInvoiceNo = $invoiceNumber[0];
                $slPrInvoiceNo = $invoiceNumber[1];

//                if ($slPrPreInvoiceNo == 'ISO' && $slPrInvoiceNo >= 1) {
//                //
//                $slPrPreInvoiceNo = 'IS';
//                //
//                parse_str(getTableValues("SELECT MAX(CAST(sttr_invoice_no AS SIGNED)) as slPrInvoiceNo "
//                                       . "FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
//                                       . "AND sttr_pre_invoice_no = '$slPrPreInvoiceNo' "
//                                       . "AND sttr_transaction_type IN ('sell') "));
//                //
//                //echo 'slPrInvoiceNo == ' . $slPrInvoiceNo . '<br />';
//                //
//                if ($slPrInvoiceNo != '' && $slPrInvoiceNo != NULL && $sttr_status != 'PaymentPending') {
//                    $slPrInvoiceNo = $slPrInvoiceNo + 1;
//                } else {
//                    if ($sttr_status != 'PaymentPending') {
//                        $slPrInvoiceNo = 1;
//                    }
//                }
//                //
//                }
            }

            if ($metalWtBy == '') {
                $metalWtBy = 'byNetWt';
            }

            $qSelCustName = "SELECT user_fname,user_lname FROM user where user_id='$custId'";
            $resCustName = mysqli_query($conn, $qSelCustName);
            $rowCustName = mysqli_fetch_array($resCustName);
            $custFirstName = $rowCustName['user_fname'];
            $custLastName = $rowCustName['user_lname'];

            parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'sellAutoEntry'"));

            if ($omly_value == 'YES' && ($sellPanelName == 'StockPurchasePanel' || $sellPanelName == 'SellStock')) {
                $sellPanelName = '';
            }

            if ($slPrInvoiceNo != '' || $slPrInvoiceNo != NULL) {

                $query = "SELECT * FROM stock_transaction WHERE sttr_pre_invoice_no = '$slPrPreInvoiceNo' AND "
                        . "sttr_invoice_no > $slPrInvoiceNo AND sttr_owner_id='$sessionOwnerId' AND "
                        . "sttr_status='PaymentDone' AND sttr_user_id='$custId'";
                $resInvPostId = mysqli_query($conn, $query);
                $rowInvPostId = mysqli_num_rows($resInvPostId);

                $invNo = $slPrInvoiceNo;
            }

            if ($itstId == '') {
                $itstId = $slPrId;
            }

            //echo '$itemCustWastage @@: '.$itemCustWastage.'<br />';

            if ($sellPanelName == 'SellDetUpPanel' || $sellPanelName == 'SellPayUp' ||
                    $sellPanelName == 'EstimateUpdate' || $sellPanelName == 'EstimatePayUp') {

                $qSelCryDet = "SELECT * FROM stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' and "
                        . "sttr_sttr_id = '$slPrId' and sttr_indicator = 'stockCrystal' and "
                        . "sttr_status NOT IN ('DELETED') order by sttr_id asc";
                $resCryDet = mysqli_query($conn, $qSelCryDet);
                $noOfCry = mysqli_num_rows($resCryDet);
            }

            //echo '$itst_item_category === '.$itst_item_category.'<br />';

            if ($sellPanelName != 'SellDetUpPanel' && $sellPanelName != 'EstimateUpdate' &&
                    $sellPanelName != 'EstimatePayUp' &&
                    $sellPanelName != 'SellPayUp' && $mainPanel != 'StockPurchasePanel') {


                if (($itst_item_category == '' || $itst_item_category == NULL) &&
                        ($itst_item_name == '' || $itst_item_name == NULL)) {

                    parse_str(getTableValues("SELECT * FROM stock_transaction where sttr_item_pre_id = '$newProdCode' and "
                                    . "sttr_item_code = '$newProdCode' AND sttr_indicator = 'stock' and "
                                    . "sttr_stock_type = 'retail' and "
                                    . "sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_status NOT IN('DELETED') "
                                    . "order by sttr_id desc LIMIT 0,1"));

                    if ($sttr_item_category == '' && $sttr_item_name == '') {
                        parse_str(getTableValues("SELECT * FROM stock_transaction where sttr_indicator = 'stock' and "
                                        . "sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_status NOT IN('DELETED') "
                                        . "order by sttr_id desc LIMIT 0,1"));
                    }

//            $itst_item_category = $sttr_item_category;
//            $itst_item_name = $sttr_item_name;                
//            $finalQTY = $sttr_quantity;
//            $finalGSWT = $sttr_gs_weight;
//            $itemNTW = $sttr_nt_weight;
//            $itst_item_cust_lbcrg = $sttr_making_charges;
//            $slpr_value_added = $sttr_value_added;
//            $itst_item_size = $sttr_size;
//            $itemPKTW = $sttr_pkt_weight;
//            $slpr_fine_wt = $sttr_fine_weight;
//            $slpr_final_fine_wt = $sttr_final_fine_weight;               
//            $custFinalValuation = $sttr_valuation;
//            $sttr_total_cust_price = ($sttr_valuation + $sttr_total_making_charges);
//            $sttr_mkg_charges_by = $sttr_item_pre_id;                          

                    $tunch = $sttr_purity;
//                    echo '$tunch=1=' . $tunch;
                    $itemWastage = 0;
                    $itemFinalTunch = $sttr_final_purity;

                    if ($sellCustWastg == 'lastEntry') {
                        $itemCustWastage = $sttr_cust_wastage;
                    } else if ($sellCustWastg == 'blank' || $sellCustWastg == 'addStock' || $sellCustWastg == '') {
                        $itemCustWastage = 0;
                        $sttr_cust_wastage_wt = 0;
                    }

                    // @PRIYANKA - 16APR18 (To Resolve Infinity Error)           
                    $slpr_value_added = 0;
                    $sttr_final_valuation = 0;
                    $sttr_total_cust_price = 0;
                    $sttr_mkg_cgst_per = 0;
                    $sttr_mkg_sgst_per = 0;
                    $sttr_mkg_igst_per = 0;
                    $sttr_mkg_cgst_chrg = 0;
                    $sttr_mkg_sgst_chrg = 0;
                    $sttr_mkg_igst_chrg = 0;
                    $sttr_tot_price_cgst_per = 0;
                    $sttr_tot_price_sgst_per = 0;
                    $sttr_tot_price_igst_per = 0;
                    $sttr_tot_price_cgst_chrg = 0;
                    $sttr_tot_price_sgst_chrg = 0;
                    $sttr_tot_price_igst_chrg = 0;
                    // @PRIYANKA-18APR18  
                    $sttr_metal_amt = 0;
                    $sttr_total_making_amt = 0;
                    $sttr_mkg_discount_per = 0;
                    $sttr_mkg_discount_amt = 0;
                    $sttr_metal_discount_per = 0;
                    $sttr_metal_discount_amt = 0;

                    $itst_metal_type = $sttr_metal_type;

                    if ($sttr_metal_rate != '') {
                        $metalRate = $sttr_metal_rate;
                    }

                    $sttr_tot_tax = 0;
                    $sttr_total_making_charges = 0;

                    // FOR DIRECT SELL ENTRY @PRIYANKA-06FEB19
                    $directSellCase = 'YES';

                    // START CODE FOR ADD DATE FOR MULTIPLE ITEMS IN ONE INVOICE @PRIYANKA-24JAN18
                    if ($slPrPreInvoiceNo != '' && $slPrPreInvoiceNo != NULL) {

                        $dateQuery = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' AND "
                                . "sttr_pre_invoice_no = '$slPrPreInvoiceNo' AND sttr_invoice_no = '$slPrInvoiceNo' AND "
                                . "sttr_status IN ('PaymentPending') AND sttr_transaction_type IN ('sell','ESTIMATESELL') AND sttr_indicator = 'stock'";

                        $dateResult = mysqli_query($conn, $dateQuery) or die(mysqli_error($conn));
                        $numRowsInv = mysqli_num_rows($dateResult);

                        if ($numRowsInv > 0) {

                            $row = mysqli_fetch_array($dateResult, MYSQLI_ASSOC);
                            $sttr_add_date = $row['sttr_add_date'];

                            $selDOBDay = substr($sttr_add_date, 0, 2);
                            $selDOBMnth = substr($sttr_add_date, 3, -5);
                            $todayMM = date("m", strtotime($selDOBMnth)) - 1;
                            $selDOBYear = substr($sttr_add_date, -4);
                        } else {

                            if ($sttr_pre_invoice_no != '' && $sttr_pre_invoice_no != NULL) {
                                parse_str(getTableValues("SELECT MAX(CAST(sttr_invoice_no AS SIGNED)) as invoice_no FROM "
                                                . "stock_transaction where sttr_owner_id = '$sessionOwnerId' AND "
                                                . "sttr_pre_invoice_no = '$sttr_pre_invoice_no' AND sttr_status NOT IN ('DELETED')"));

                                if ($slPrPreInvoiceNo == '' || $slPrPreInvoiceNo == NULL) {
                                    $slPrPreInvoiceNo = $sttr_pre_invoice_no;
                                    $slPrInvoiceNo = $invoice_no + 1;
                                }
                            }
                        }
                    }
                    // END CODE FOR ADD DATE FOR MULTIPLE ITEMS IN ONE INVOICE @PRIYANKA-24JAN18

                    if (($itst_item_category == '' || $itst_item_category == NULL) &&
                            ($itst_item_name == '' || $itst_item_name == NULL)) {

                        $itst_item_pre_id = $newProdCode;
                        $itst_item_category = $newProdCode;
                        $itst_item_name = $newProdCode;

                        // START CODE FOR Customer Wastage and Making Charges By According to that User (Last Sell Entry) @PRIYANKA-06FEB19
                        if ($row['sttr_purity'] > 0) {
                            $tunch = $row['sttr_purity'];
                            $itemWastage = $row['sttr_wastage'];
                            $itemFinalTunch = $row['sttr_final_purity'];

                            if ($sellCustWastg == 'lastEntry') {
                                $itemCustWastage = $row['sttr_cust_wastage'];
                                $sttr_cust_wastage_wt = $row['sttr_cust_wastage_wt'];
                            }

                            $sttr_mkg_charges_by = $row['sttr_mkg_charges_by'];

                            //$stsl_othr_chrg_by_type = $row['sttr_other_charges_by'];
                            //echo '$tunch #: '.$tunch.'<br />';
                            //echo '$itemWastage #: '.$itemWastage.'<br />';
                            //echo '$itemFinalTunch #: '.$itemFinalTunch.'<br />';
                            //echo '$itemCustWastage #: '.$itemCustWastage.'<br />';
                            //echo '$sttr_mkg_charges_by #: '.$sttr_mkg_charges_by.'<br />';
                            //echo '$stsl_othr_chrg_by_type #: '.$stsl_othr_chrg_by_type.'<br />';
                            // END CODE FOR Customer Wastage and Making Charges By According to that User (Last Sell Entry) @PRIYANKA-06FEB19
                        } else {
                            $finalQTY = 1;
                            $tunch = 100;
                            $itemFinalTunch = 100;
                        }

                        $sttr_final_valuation = 0;
                    }
                } else {

                    // START CODE FOR Customer Wastage and Making Charges By According to that User (Last Sell Entry) @PRIYANKA-06FEB19
                    if (($itst_item_category != '' && $itst_item_category != NULL) &&
                            ($itst_item_name != '' && $itst_item_name != NULL)) {
                        if ($sttr_mkg_charges_by == '') {
                            $sttrMkgByCondition = ',sttr_mkg_charges_by '; // COMMENTED @AUTHOR:SHRI06FEB20
                        } else {
                            $sttrMkgByCondition = ' ';
                        }
                        parse_str(getTableValues("SELECT sttr_cust_wastage$sttrMkgByCondition" // REMOVED sttr_mkg_charges_by  @AUTHOR:SHRI06FEB20
                                        . "FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' and sttr_user_id='$custId' "
                                        . "and sttr_indicator = 'stock' and "
                                        . "sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_status NOT IN('DELETED') "
                                        . "order by sttr_id desc LIMIT 0,1"));

                        if ($sellCustWastg == 'userWiselastEntry') {
                            $itemCustWastage = $sttr_cust_wastage;
                        } else if ($sellCustWastg == 'lastEntry') {
                            parse_str(getTableValues("SELECT sttr_cust_wastage "
                                            . "FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId'"
                                            . "and sttr_indicator = 'stock' and "
                                            . "sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_status NOT IN('DELETED') "
                                            . "order by sttr_id desc LIMIT 0,1"));
                            $itemCustWastage = $sttr_cust_wastage;
                        }

                        $sttr_mkg_charges_by = $sttr_mkg_charges_by; // COMMENTED @AUTHOR:SHRI06FEB20
                        //$stsl_othr_chrg_by_type = $sttr_other_charges_by;
                        // FOR DIRECT SELL ENTRY @PRIYANKA-06FEB19
                        $directSellCase = 'YES';

                        if ($sttr_mkg_charges_by == '') {
                            parse_str(getTableValues("SELECT sttr_mkg_charges_by " // REMOVED sttr_mkg_charges_by  @AUTHOR:SHRI06FEB20
                                            . "FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' and sttr_item_name='$itst_item_category' "
                                            . "and sttr_item_name='$itst_item_name' and sttr_indicator = 'stock' and "
                                            . "sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_status NOT IN('DELETED') "
                                            . "order by sttr_id desc LIMIT 0,1"));
                        }
                        //echo '$sttr_mkg_charges_by @: ' . $sttr_mkg_charges_by . '<br />';
                    }
                    // END CODE FOR Customer Wastage and Making Charges By According to that User (Last Sell Entry) @PRIYANKA-06FEB19
                }

                if (($sttr_mkg_cgst_per == '' || $sttr_mkg_cgst_per == NULL) &&
                        ($sttr_mkg_sgst_per == '' || $sttr_mkg_sgst_per == NULL)) {
                    $sttr_mkg_cgst_per = 0;
                    $sttr_mkg_sgst_per = 0;
                    $sttr_mkg_igst_per = 0;
                }
            }

            //echo '$sttr_tot_price_cgst_per @: '.$sttr_tot_price_cgst_per.'<br />';

            if ($newStockType == '') {
                $newStockType = 'retail';
            }

            if (($sttr_tot_price_cgst_per == '' || $sttr_tot_price_cgst_per == NULL) &&
                    ($sttr_tot_price_sgst_per == '' || $sttr_tot_price_sgst_per == NULL)) {
                $sttr_tot_price_cgst_per = 0;
                $sttr_tot_price_sgst_per = 0;
            }

            //echo '$itst_item_category == '.$itst_item_category;
            //echo '$itst_item_name == '.$itst_item_name;
            //echo '$itst_item_pre_id == '.$itst_item_pre_id;
            //echo '$stsl_othr_chrg_by_type : '.$stsl_othr_chrg_by_type;

            if ($sttr_metal_type == 'Gold' && $sttr_hsn_no == '')
                $sttr_hsn_no = 7113;

            if ($sttr_metal_type == 'Silver' && $sttr_hsn_no == '')
                $sttr_hsn_no = 7113;

//            if ($finalQTY == '' || $finalQTY == NULL) {
//                $finalQTY = 1;
//            }

            if ($tunch < 0) {
                $tunch = 100;
                $itemFinalTunch = 100;
            }

            //echo '$itst_firm_id == '.$itst_firm_id.'<br />';
            //if ($slPrPreInvoiceNo != '' && $slPrPreInvoiceNo != NULL) {
            //$firmQuery = "SELECT * FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' AND sttr_user_id = '$custId' "
            //           . "AND sttr_status IN ('PaymentPending') AND sttr_transaction_type = 'sell' AND sttr_indicator = 'stock' order by sttr_id desc LIMIT 0,1";
            //$firmResult = mysqli_query($conn, $firmQuery) or die(mysqli_error($conn));
            //$firmNumRows = mysqli_num_rows($firmResult);
            //echo '$firmQuery == '.$firmQuery.'<br />';
            //if ($firmNumRows > 0) {
            //$firmRow = mysqli_fetch_array($firmResult, MYSQLI_ASSOC);
            //$sttr_add_date = $firmRow['sttr_add_date'];
            //$sttr_firm_id = $firmRow['sttr_firm_id'];
            //$itst_firm_id = $sttr_firm_id;
            //echo '$itst_firm_id ##== '.$itst_firm_id.'<br />';
            //$selDOBDay = substr($sttr_add_date, 0, 2);
            //$selDOBMnth = substr($sttr_add_date, 3, -5);
            //$todayMM = date("m", strtotime($selDOBMnth)) - 1;
            //$selDOBYear = substr($sttr_add_date, -4);
            //}
            //}
            //echo '$itst_firm_id @@== '.$itst_firm_id.'<br />';
            //echo '$sttr_firm_id @@== '.$sttr_firm_id;die;
            //echo '$sellPanelName == '.$sellPanelName;die;

            if (($itemCustWastage == '' || $itemCustWastage == NULL) &&
                    ($sttr_cust_wastage_wt == '' || $sttr_cust_wastage_wt == NULL)) {
                if ($sellCustWastg == 'blank') {
                    $itemCustWastage = 0;
                    $sttr_cust_wastage_wt = 0;
                }
            }

            // START CODE FOR Rohan (Raipur) - Requirements : Customer : Sell Panel : Set Making Charges According to User Membership (A, B, C) @PRIYANKA-22AUG18
            // parse_str(getTableValues("SELECT sttr_making_charges,sttr_making_charges_type FROM stock_transaction "
            // . "WHERE sttr_owner_id = '$sessionOwnerId' AND sttr_user_id = '$custId' "
            // . "AND sttr_indicator = 'stock' AND sttr_transaction_type = 'sell' order by sttr_id desc LIMIT 0,1"));
            //
            // if (($sttr_making_charges != '' || $sttr_making_charges != NULL) && 
            // ($itst_item_cust_lbcrg == '' || $itst_item_cust_lbcrg == NULL)) {
            // $itst_item_cust_lbcrg = $sttr_making_charges;
            // $itemCustLabChrgT = $sttr_making_charges_type;
            // }
            // END CODE FOR Rohan (Raipur) - Requirements : Customer : Sell Panel : Set Making Charges According to User Membership (A, B, C) @PRIYANKA-22AUG18

            if ($finalGSWT < 0) {
                $finalQTY = '';
                $finalGSWT = '';
                $slpr_fine_wt = '';
                $slpr_final_fine_wt = '';
                $tunch = 100;
                $itemNTW = '';
                $itemFinalTunch = 100;
                $itemWastage = 0;

                if ($sellCustWastg == 'blank') {
                    $itemCustWastage = 0;
                    $sttr_cust_wastage_wt = 0;
                }

                $sttr_final_valuation = '';
                $itst_item_cust_lbcrg = '';
                $sttr_total_making_amt = '';
            }

            if ($finalQTY < 0) {
                $finalQTY = '';
            }

            $ms_itm_pre_id = $itst_item_pre_id;

            //echo '$ms_itm_pre_id == ' . $ms_itm_pre_id . '<br />';

            parse_str(getTableValues("SELECT user_membership FROM user WHERE user_id = '$custId'"));

            //parse_str(getTableValues("SELECT omin_value FROM omindicators WHERE omin_option='UserGroup' "
            //                       . "AND omin_id='$user_membership'"));
            //$user_membership_name = $omin_value;
            //echo '$user_membership_name == ' . $user_membership_name . '<br />';

            parse_str(getTableValues("SELECT * FROM master_item WHERE ms_itm_category = '$itst_item_category' "
                            . "AND ms_itm_name = '$itst_item_name' AND ms_itm_pre_id = '$ms_itm_pre_id'"));

            //echo '$itst_item_category == ' . $itst_item_category . '<br />';
            //echo '$itst_item_name == ' . $itst_item_name . '<br />';

            parse_str(getTableValues("SELECT ms_sub_itm_mkg_min FROM master_subitem WHERE "
                            . "ms_sub_itm_ms_item_id = '$ms_itm_id' "
                            . "AND ms_sub_itm_user_group = '$user_membership'"));

            if ($ms_sub_itm_mkg_min != '' && $ms_sub_itm_mkg_min != NULL) {
                $itst_item_cust_lbcrg = $ms_sub_itm_mkg_min;
            }

            //echo '$ms_sub_itm_mkg_min == ' . $ms_sub_itm_mkg_min . '<br />';
            //echo '$tunch : '.$tunch.'<br />';
            //echo '$itemWastage : '.$itemWastage.'<br />';
            //echo '$itemFinalTunch : '.$itemFinalTunch.'<br />';
            //echo '$itemCustWastage : '.$itemCustWastage.'<br />';
            //echo '$sttr_mkg_charges_by : '.$sttr_mkg_charges_by.'<br />';
            //echo '$stsl_othr_chrg_by_type : '.$stsl_othr_chrg_by_type.'<br />';

            if ($sttr_mkg_charges_by == '' || $sttr_mkg_charges_by == NULL) {
                $sttr_mkg_charges_by = 'mkgByFFineWt';
            }

            include 'ogiartdv.php';

            // START CODE TO CHECK FIELDS ACCESS TO STAFF @AUTHOR:SHRI17OCT19
            // echo 'Access:'.$array['disableSellFieldsAccess'];
            $staffAccessStr = "";
            $staffAccessReadOnlyStr = "";
            $mkgDiscPerStaffAccessStr = "";
            $mkgDiscAmtStaffAccessReadOnlyStr = "";
            $staffAccessClassStr = "class='form-control-height20 placeholderClass'";
            if ($staffId && $array['disableSellFieldsAccess'] == 'true') {
                $accAccess = 'NO';
                $directSellCase = 'NO';
                $mkgDiscPerStaffAccessStr = $staffAccessStr = " readonly='true'";
                $mkgDiscAmtStaffAccessReadOnlyStr = $staffAccessReadOnlyStr = "readonly='readonly'";

                $staffAccessReadOnly = true;
                $accessForPanel = 'mainItem';
                if ($_SESSION['sessionUserId'] == 'CARAT24') {
                    $mkgDiscPerStaffAccessStr = "";
                    $mkgDiscAmtStaffAccessReadOnlyStr = "";
                    $staffAccessClassStr = "class='lgn-txtfield-middle'";
                }
            }
            // END CODE TO CHECK FIELDS ACCESS TO STAFF @AUTHOR:SHRI17OCT19
            //
            //
            //
            if ($sellPanelName != 'SellDetUpPanel' && $sellPanelName != 'SellPayUp' &&
                    $sellPanelName != 'EstimateUpdate' && $sellPanelName != 'EstimatePayUp' &&
                    $sellPanelName != 'SellItemReturnUp' && $sellPanelName != 'finalOrderUp') {
                //
                //
                // ***********************************************************************************************************************
                // START CODE FOR PRODUCT DISCOUNT ON / OFF SETTING @AUTHOR-PRIYANKA-03DEC2020
                // ***********************************************************************************************************************
                $selProductDiscOnOffSettingQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'ProductDiscountOnOff'";
                $resProductDiscOnOffSetting = mysqli_query($conn, $selProductDiscOnOffSettingQuery);
                $rowProductDiscOnOffSetting = mysqli_fetch_array($resProductDiscOnOffSetting);
                $ProductDiscountOnOff = $rowProductDiscOnOffSetting['omly_value'];
                // ***********************************************************************************************************************
                // END CODE FOR PRODUCT DISCOUNT ON / OFF SETTING @AUTHOR-PRIYANKA-03DEC2020
                // ***********************************************************************************************************************
                //
                //
                if ($ProductDiscountOnOff == 'ON' &&
                        ($_SESSION['sessionOwnIndStr'][35] == 'A' ||
                        $_SESSION['sessionOwnIndStr'][35] == 'B')) {
                    //
                    //
                    // ********************************************************************************************************
                    // START CODE TO CHECK DISCOUNT IS APPLICABLE OR NOT @PRIYANKA-31OCT2020
                    // ********************************************************************************************************
                    //
                    //include 'omSellSetDiscount.php';
                    //
                    // ********************************************************************************************************
                    // END CODE TO CHECK DISCOUNT IS APPLICABLE OR NOT @PRIYANKA-31OCT2020
                    // ********************************************************************************************************
                    //
                    //
                    //echo '$finalProductValuation == ' . $finalProductValuation . '<br />';
                    //echo '$disc_product_amount == ' . $disc_product_amount . '<br />';
                    //echo '$disc_making_discount == ' . $disc_making_discount . '<br />';
                    //echo '$disc_product_discount == ' . $disc_product_discount . '<br />';
                    //echo '$disc_stone_discount == ' . $disc_stone_discount . '<br />';
                    //
                    //
                    // *********************************************************************************************************
                    // START CODE TO SET PRODUCT / MKG / STONE DISCOUNT IN PREVIOUS ENTRIES (SAME INVOICE) @PRIYANKA-31OCT2020
                    // *********************************************************************************************************
                    //
                    if ($finalProductValuation >= $disc_product_amount) {
                        //
                        //include 'omSellSetDiscountProductUp.php';
                        //
                    }
                    //
                    // *********************************************************************************************************
                    // END CODE TO SET PRODUCT / MKG / STONE DISCOUNT IN PREVIOUS ENTRIES (SAME INVOICE) @PRIYANKA-31OCT2020
                    // *********************************************************************************************************
                }
            }
            //
            //
            // ***********************************************************************************************************************
            // START CODE FOR HSN OPTION IN FORMS SETTING YES / NO @AUTHOR-PRIYANKA-22MAR2021
            // ***********************************************************************************************************************
            $selHSNOptionInFormsQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'HSNOptionInForms'";
            $resHSNOptionInForms = mysqli_query($conn, $selHSNOptionInFormsQuery);
            $rowHSNOptionInForms = mysqli_fetch_array($resHSNOptionInForms);
            $HSNOptionInForms = $rowHSNOptionInForms['omly_value'];
            // ***********************************************************************************************************************
            // END CODE FOR HSN OPTION IN FORMS SETTING YES / NO @AUTHOR-PRIYANKA-22MAR2021
            // ***********************************************************************************************************************
            //
            //
            // START CODE TO CHECK FIELDS ACCESS TO STAFF @AUTHOR:SHRI17OCT19
            // echo 'Access:'.$array['disableSellFieldsAccess'];
//            $staffAccessStr = "";
//            $staffAccessReadOnlyStr = "";
//            $mkgDiscPerStaffAccessStr = "";
//            $mkgDiscAmtStaffAccessReadOnlyStr = "";
//            $staffAccessClassStr = "class='form-control-height20 placeholderClass'";
//            if ($staffId && $array['disableSellFieldsAccess'] == 'true' && $newStockType == 'retail') {
//                $accAccess = 'NO';
//                $directSellCase = 'NO';
//                $mkgDiscPerStaffAccessStr = $staffAccessStr = " readonly='true'";
//                $mkgDiscAmtStaffAccessReadOnlyStr = $staffAccessReadOnlyStr = "readonly='readonly'";
//
//                $staffAccessReadOnly = true;
//                $accessForPanel = 'mainItem';
//                if ($_SESSION['sessionUserId'] == 'CARAT24') {
//                    $mkgDiscPerStaffAccessStr = "";
//                    $mkgDiscAmtStaffAccessReadOnlyStr = "";
//                    $staffAccessClassStr = "class='lgn-txtfield-middle'";
//                }
//            }
            // END CODE TO CHECK FIELDS ACCESS TO STAFF @AUTHOR:SHRI17OCT19
            //
            //
            //echo '$itemWastage : ' . $itemWastage . '<br />';
            //echo '$itemCustWastage : ' . $itemCustWastage . '<br />';
            //echo '$sttr_cust_wastage_wt : ' . $sttr_cust_wastage_wt . '<br />';  
            //
            //
            //echo '$sellCustWastg : ' . $sellCustWastg . '<br />';                      
            //
            //
            //
            if ($stsl_othr_chrg_by_type == '') {
                $stsl_othr_chrg_by_type = "lbByFFineWt";
            }
            //
            ?>                                                      
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                <tr>
                    <td class="portlet-title caption">
                        <div class="main_link_brown16 padLeft5">
                            <b>  <?php
                                if ($sellPanelName != 'SellDetUpPanel' && $sellPanelName != 'SellPayUp' &&
                                        $sellPanelName != 'EstimateUpdate' && $sellPanelName != 'EstimatePayUp') {
                                    ?>
                                    SELL METAL FORM B2
                                <?php } else { ?>
                                    UPDATE SELL METAL FORM B2
                                <?php } ?> </b>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if ($omly_value == 'YES' && $sellPanelName != 'SellPayUp' &&
                                $sellPanelName != 'EstimateUpdate' && $sellPanelName != 'EstimatePayUp' &&
                                $sellPanelName != 'SellDetUpPanel' && $sellPanelName != 'finalOrderUp') {
                            ?>

                            <form name="sell_purchase" id="sell_purchase"
                                  enctype="multipart/form-data" method="post"
                                  action="include/php/ogspmnad.php"
                                  onsubmit="return true;">

                            <?php } else { ?>

                                <form name="sell_purchase" id="sell_purchase"
                                      enctype="multipart/form-data" method="post"
                                      action="include/php/ogspmnad.php"
                                      onsubmit="return sellMetalFormB2Submit();">                                
                                      <?php } ?>

                                <div id="slPrDiv" 
                                     onload="calculateSellPrice();">                  
                                    <!-- Start Code to Define Hidden inputs -->   
                                    <input type="hidden" id="ProductMkgDiscountInc" name="ProductMkgDiscountInc" value="<?php echo $ProductMkgDiscountInc; ?>"/>
                                    <input id="sttr_final_valuation_by" name="sttr_final_valuation_by" value="<?php echo $sttr_final_valuation_by; ?>" type="hidden"/>
                                    <input type="hidden" id="addItemCryFinVal" name="addItemCryFinVal"/>
                                    <input type="hidden" id="addItemCryCount" name="addItemCryCount"/>
                                    <input type="hidden" id="noOfCry" name="noOfCry" value="<?php echo $noOfCry; ?>"/>
                                    <input type="hidden" id="itemDivCnt" name="itemDivCnt"/>
                                    <input type="hidden" id="itemTotalCrystalVal" name="itemTotalCrystalVal"/>	                                
                                    <input type="hidden" id="itstId" name="itstId" value="<?php echo $itstId; ?>"/>
                                    <input type="hidden" id="itstId" name="itstId" value="<?php echo $itstId; ?>" />
                                    <input type="hidden" id="sttr_barcode_prefix" name="sttr_barcode_prefix" value="<?php echo $sttr_barcode_prefix; ?>" />
                                    <input type="hidden" id="sttr_barcode" name="sttr_barcode" value="<?php echo $sttr_barcode; ?>" />                                
                                    <?php
                                    if ($sellPanelName != 'SellDetUpPanel' && $sellPanelName != 'SellPayUp' &&
                                            $sellPanelName != 'EstimateUpdate' && $sellPanelName != 'EstimatePayUp') {
                                        ?>
                                        <input type="hidden" id="sttr_sttr_id" name="sttr_sttr_id" value="<?php echo $itstId; ?>" />
                                        <input type="hidden" id="sttr_st_id" name="sttr_st_id" value="<?php echo $itstId; ?>" />
                                    <?php } ?>
                                    <input type="hidden" id="panelName" name="panelName" value="<?php echo $sellPanelName; ?>" />
                                    <input type="hidden" id="addPanel" name="addPanel" value="<?php echo $panelName; ?>" />
                                    <input type="hidden" id="sellTotCrystal" name="sellTotCrystal" value="<?php echo $noOfCry; ?>" />
                                    <input type="hidden" id="slPrId" name="slPrId" value="<?php echo $slPrId; ?>"/>
                                    <!--<input type="hidden" id="slPrItemPurity" name="slPrItemPurity" value="<?php echo $newItemTunch; ?>"/>-->
                                    <input type="hidden" id="valueAdd" name="valueAdd"/>
                                    <input type="hidden" id="stockQty" name="stockQty" value="<?php echo $itst_quantity; ?>"/>
                                    <input type="hidden" id="purchaseGsWt" name="purchaseGsWt" value="<?php echo $itpr_gs_weight; ?>"/>
                                    <input type="hidden" id="autoEntry" name="autoEntry" value="<?php echo $omly_value; ?>"/>
                                    <input type="hidden" id="totalSellQty" name="totalSellQty" value="<?php echo $sellQty; ?>"/>
                                    <input type="hidden" id="totalPurQty" name="totalPurQty" value="<?php echo $totalPurQty; ?>"/>
                                    <input type="hidden" id="sttr_final_val_by" name="sttr_final_val_by" value="<?php echo $metalWtBy; ?>"/>
                                    <input type="hidden" id="slPrItemWtBy" name="slPrItemWtBy" value="<?php echo $metalWtBy; ?>"/>
                                    <input type="hidden" id="sttr_other_charges_by" name="sttr_other_charges_by" value="<?php echo $stsl_othr_chrg_by_type; ?>" />
                                    <input type="hidden" id="addItemLabourChgsBy" name="addItemLabourChgsBy" value="<?php echo $sttr_mkg_charges_by; ?>" />
                                    <input id="slPrItemValuation" name="slPrItemValuation" type="hidden" placeholder="Item Val" value="<?php echo $custFinalValWithOutTax; ?>"/>
                                    <input type="hidden" id="slPrMetalTotValuation" name="slPrMetalTotValuation" value="" />
                                    <input type="hidden" id="sttr_stone_valuation" name="sttr_stone_valuation"/>
                                    <input id="slPrCrystalTotTax" name="slPrCrystalTotTax" type="hidden"/>
                                    <input id="slPrItemCryTax" name="slPrItemCryTax" type="hidden"  value="<?php echo $itst_cry_tax_charges; ?>" /> 
                                    <input id="slPrCrystalValuation" name="slPrCrystalValuation" type="hidden" placeholder="CRYSTAL VALUATION" /><!--Code add hidden field -->
                                    <input type="hidden" id="invoiceRow" name="invoiceRow" value="<?php echo $rowInvPostId; ?>" />
                                    <input type="hidden" id="upPanel" name="upPanel" value="<?php echo $panelName; ?>"/>
                                    <input type="hidden" id="custId" name="custId" value="<?php echo $custId; ?>" />
                                    <input type="hidden" id="sttr_stock_type" name="sttr_stock_type" value="<?php echo $newStockType; ?>" />
                                    <input type="hidden" id="sttr_cust_wastg_by" name="sttr_cust_wastg_by" value="<?php echo $sttr_cust_wastg_by; ?>"/>
                                    <input type="hidden" id="sttr_hallmark_uid" name="sttr_hallmark_uid" value="<?php echo $sttr_hallmark_uid; ?>"/>
                                    <?php
                                    if ($panelName != 'Estimate' && $sellPanelName != 'EstimateUpdate' &&
                                            $sellPanelName != 'EstimatePayUp') {
                                        ?>
                                        <input type="hidden" id="sttr_indicator" name="sttr_indicator" value="stock" />
                                        <?php if ($sttr_transaction_type == 'ESTIMATESELL') { ?>
                                            <input type="hidden" id="sttr_transaction_type" name="sttr_transaction_type" value="ESTIMATESELL" />
                                        <?php } else { ?>
                                            <input type="hidden" id="sttr_transaction_type" name="sttr_transaction_type" value="sell" />
                                        <?php } ?>
                                    <?php } else { ?>

                                        <input type="hidden" id="sttr_indicator" name="sttr_indicator" value="stock" />
                                        <input type="hidden" id="sttr_transaction_type" name="sttr_transaction_type" value="ESTIMATE" />

                                    <?php } ?>

                                    <input type="hidden" id="redirectionPanelName" name="redirectionPanelName" value="SellMetalFormB2" />
                                    <input type="hidden" id="sttr_panel_name" name="sttr_panel_name" value="FINE_JEWELLERY_SELL_B2" />

                                    <input type="hidden" id="addItemMkgChgBy" name="addItemMkgChgBy" value="<?php echo $sttr_mkg_charges_by; ?>" />
                                    <input type="hidden" id="sttr_mkg_charges_by" name="sttr_mkg_charges_by" value="<?php echo $sttr_mkg_charges_by; ?>" />

                                    <input type="hidden" id="setAdditionalSellCustWastg" name="setAdditionalSellCustWastg" 
                                           value="<?php echo $setAdditionalSellCustWastg; ?>"/>

                                    <input type="hidden" id="sellMetalNCustWstgValuationBySpecifiedWt" name="sellMetalNCustWstgValuationBySpecifiedWt" 
                                           value="<?php echo $itemNValAdByFNWTOption; ?>"/>

                                    <input type="hidden" id="additionalSellCustWastageWt" name="additionalSellCustWastageWt" />

                                    <!--------------------------------------------------------------->
                                    <!-- START CODE FOR HIDDEN DISCOUNT INPUTS @PRIYANKA-31OCT2020 -->
                                    <!--------------------------------------------------------------->
                                    <input type="hidden" id="finalProductValuation" name="finalProductValuation" 
                                           value="<?php echo $finalProductValuation; ?>" />
                                    <input type="hidden" id="disc_product_amount" name="disc_product_amount" 
                                           value="<?php echo $disc_product_amount; ?>" />
                                    <input type="hidden" id="disc_making_discount" name="disc_making_discount" 
                                           value="<?php echo $disc_making_discount; ?>" />
                                    <input type="hidden" id="disc_product_discount" name="disc_product_discount" 
                                           value="<?php echo $disc_product_discount; ?>" />
                                    <input type="hidden" id="disc_stone_discount" name="disc_stone_discount" 
                                           value="<?php echo $disc_stone_discount; ?>"/>
                                    <!--------------------------------------------------------------->
                                    <!-- END CODE FOR HIDDEN DISCOUNT INPUTS @PRIYANKA-31OCT2020 ---->
                                    <!--------------------------------------------------------------->

                                    <!-- End Code to Define Hidden inputs -->
                                    <?php
                                    //
                                    $querysellFineWtBy = "SELECT omly_value FROM omlayout WHERE omly_option = 'sellFineWtBy'";
                                    $ressellFineWtBy = mysqli_query($conn, $querysellFineWtBy);
                                    $rowsellFineWtBy = mysqli_fetch_array($ressellFineWtBy);
                                    $sellFineWtBy = $rowsellFineWtBy['omly_value'];
                                    if ($sellFineWtBy != '') {
                                        $addCustWastageWtInSpecifiedWt = $sellFineWtBy;
                                    }
                                    ?>
                                    <input type="hidden" id="sttr_fixed_price_status" name="sttr_fixed_price_status" value=""/>
                                    <input type="hidden" id="sttr_final_fine_wt_by" name="sttr_final_fine_wt_by" value="<?php echo $addCustWastageWtInSpecifiedWt; ?>"/>
                                    <input type="hidden" id="ProductMainMkgChrgsForDiscIncPer" name="ProductMainMkgChrgsForDiscIncPer" value="<?php echo $itst_item_cust_lbcrg; ?>" />
                                    <input type="hidden" id="addCustWastageWtInSpecifiedWt" name="addCustWastageWtInSpecifiedWt" value="<?php echo $addCustWastageWtInSpecifiedWt; ?>"/>
                                    <?PHP
                                    //
                                    if ($omly_value == 'YES' && $sellPanelName != 'EstimateUpdate' &&
                                            $sellPanelName != 'EstimatePayUp' &&
                                            $sellPanelName != 'SellPayUp' && $sellPanelName != 'SellDetUpPanel' &&
                                            $sellPanelName != 'finalOrderUp') {
                                        ?>
                                        <table align="center" border="0" cellspacing="0" cellpadding="2" width="100%" align="center">
                                            <tr>
                                                <td align="center" valign="" width="45%">
                                                    <input id="srchItemId" name="srchItemId" type="text"  placeholder="ADD PRODUCT ID / BARCODE" 
                                                           onkeydown="javascript: if (event.keyCode == 13) {
                                                                       searchItemByItemIdMetalFormB2(document.getElementById('srchItemId').value, '<?php echo $omly_value; ?>', '<?php echo $custId; ?>');
                                                                       return false;
                                                                   }"
                                                           autocomplete="off" spellcheck="false" class="textLabel16CalibriNormalGreyMiddle border-no" 
                                                           size="40" maxlength="20" style="width:100%;height:45px;border:1px solid #86beff;font-size:18px;font-weight:600;box-shadow: 0 1px 3px rgba(0,0,0,0.2);border-radius:50px!important;"/>
                                                    &nbsp;
                                                    <input id="srchItemPreId" name="srchItemPreId" type="hidden"/>
                                                    <input id="srchItemPostId" name="srchItemPostId" type="hidden"/>
                                                </td>
                                                <?php
                                                if ($panelName == 'orderPickStock') {
                                                    $invoice = $preOrdInvNo . ';' . $postOrdInvNo;
                                                }
                                                ?>
                                                <td align="left" valign="top" width="5%">
                                                    <input id="srchItemButt" name="srchItemButt" type="button" 
                                                           onclick="javascript:searchItemByItemIdMetalFormB2(document.getElementById('srchItemId').value);
                                                                   searchItemByItemIdMetalFormB2(document.getElementById('srchItemId').value, '<?php echo $omly_value; ?>', '<?php echo $custId; ?>');
                                                                   return false;"
                                                           value="GO" class="frm-btn height_25" style="width:50px;height:45px;margin-top:0px;margin-left:-24px;margin-bottom:0;border-radius:0 50px 50px 0 !important;font-size:16px;box-shadow: 0 1px 3px rgba(0,0,0,0.2);"/>
                                                </td>

                                                <td  align="center" valign="middle" width="45%">
                                                    <input id="srchDelItemId" name="srchDelItemId" type="text"  placeholder="RETURN PRODUCT ID / BARCODE" 
                                                           onkeydown="javascript: if (event.keyCode == 13) {

                                                                       searchItemByItemIdMetalFormB2(document.getElementById('srchDelItemId').value, '<?php echo $omly_value; ?>', '<?php echo $custId; ?>', 'delete');
                                                                       showSellMetalFormB2InvDiv(document.getElementById('srchItemPreId').value, document.getElementById('srchItemPostId').value, '<?php echo $custId; ?>', '<?php echo $panelName; ?>', 'delete');
                                                                       return false;
                                                                   }"
                                                           autocomplete="off" spellcheck="false" class="textLabel16CalibriNormalGreyMiddle border-no" 
                                                           size="40" maxlength="20" style="width:100%;height:45px;border:1px solid #86beff;font-size:18px;font-weight:600;box-shadow: 0 1px 3px rgba(0,0,0,0.2);border-radius:50px!important;"/>
                                                    &nbsp;
                                                    <input id="srchdelItemPreId" name="srchdelItemPreId" type="hidden"/>
                                                    <input id="srchdelItemPostId" name="srchdelItemPostId" type="hidden"/>
                                                </td>
                                                <td align="left" valign="top" width="5%">
                                                    <input id="srchDelItemButt" name="srchDelItemButt" type="button" 
                                                           onclick="javascript:searchItemByItemIdMetalFormB2(document.getElementById('srchDelItemId').value, '<?php echo $omly_value; ?>', '<?php echo $custId; ?>');
                                                                   showSellMetalFormB2InvDiv(document.getElementById('srchdelItemPreId').value, document.getElementById('srchdelItemPostId').value, '<?php echo $custId; ?>', '<?php echo $panelName; ?>', 'delete');
                                                                   return false;"
                                                           value="GO" class="frm-btn height_25" style="width:50px;height:45px;margin-top:0px;margin-left:-24px;margin-bottom:0;border-radius:0 50px 50px 0 !important;font-size:16px;box-shadow: 0 1px 3px rgba(0,0,0,0.2);"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="middle">
                                                    <div id="autoEntryMessDisplayDiv">

                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php
                                    }

                                    if ($omly_value != 'YES' || ($omly_value == 'YES' && $sellPanelName != '')) {
                                        ?>
                                        <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%"> 
                                            <?php
                                            if ($sellPanelName != 'SellDetUpPanel' && $sellPanelName != 'EstimateUpdate' &&
                                                    $sellPanelName != 'EstimatePayUp' &&
                                                    $sellPanelName != 'SellPayUp' && $sellPanelName != 'SellItemReturn' &&
                                                    $sellPanelName != 'SellItemReturnUp' && $sellPanelName != 'finalOrderUp') {
                                                ?>
                    <!--                                                <tr>
                                                            <td align="left" class="paddingTop4 padBott4">
                                                                <div class="hrGold"></div>
                                                            </td>
                                                        </tr>-->
                                            <?php } ?>
                                            <tr>
                                                <td align="left" class="padBott2">
                                                    <table align="center" border="0" cellspacing="0" cellpadding="1" width="99%" class="brdrgry-dashed">
                                                        <tr class="trbggry">
                                                            <td align="center" title="Select Date Here" class="textLabel14CalibriBrownBold" width="20%">
                                                                <img src="<?php echo $documentRoot; ?>/images/sell_Purchase16.png" width="0.01px" onload="
                                                                <?php if ($stockCount > 0) { ?>
                                                                            document.getElementById('slPrDOBDay').focus();
                                                                <?php } else if ($itemStockPresent > 0) { ?>
                                                                            document.getElementById('slPrItemName').focus();
                                                                <?php } else if ($changeInv != '') { // START CODE  END CODE FOR INVOICE NO CHANGE => FOCUS ISSUE @PRIYANKA-06JAN18    ?>
                                                                            document.getElementById('firmId').focus();
                                                                <?php } else { // END CODE FOR INVOICE NO CHANGE => FOCUS ISSUE @PRIYANKA-06JAN18  ?>
                                                                            document.getElementById('slPrDOBDay').focus();
                                                                <?php } ?>
                                                                        initFormName('sell_purchase', 'sellMetalFormB2Submit');
                                                                <?php
                                                                if ($sellPanelName != 'SellDetUpPanel' && $sellPanelName != 'EstimateUpdate' &&
                                                                        $sellPanelName != 'EstimatePayUp' &&
                                                                        $sellPanelName != 'SellPayUp' && $sellPanelName != 'SellItemReturn' &&
                                                                        $sellPanelName != 'SellItemReturnUp' && $sellPanelName != 'finalOrderUp') {

                                                                    if ($sellCustWastg == 'blank') {
                                                                        ?>
                                                                                document.getElementById('slPrCustWastage').value = 0;
                                                                    <?php } else if ($sellCustWastg == 'lastEntry' || $sellCustWastg == 'addStock' || $sellCustWastg == 'userWiselastEntry') { ?>
                                                                                document.getElementById('slPrCustWastage').value = '<?php echo $itemCustWastage; ?>';
                                                                    <?php } else { ?>
                                                                                document.getElementById('slPrCustWastage').value = Math.abs(parseFloat(100 - (parseFloat(document.getElementById('slPrFinalTunch').value)))).toFixed(2);
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                                        calculateCustWastageWt();
                                                                        calculateSellPrice();
                                                                        calcSellCryPrice();
                                                                     "/>
                                                                BILL DATE
                                                            </td>
                                                            <td align="center" class="textLabel14CalibriBrownBold" width="20%">
                                                                CUSTOMER NAME
                                                            </td>
                                                            <td colspan="1" width="20%">
                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                    <tr>
                                                                        <td align="center" class="textLabel14CalibriBrownBold" width="50%">
                                                                            <div class="padLeft25">INVOICE NUMBER</div>
                                                                        </td>
                                                                        <td align="center" class="textLabel14CalibriBrownBold" width="50%">
                                                                            <div>FIRM NAME</div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="center" class="textLabel14CalibriBrownBold" width="15%">
                                                                ACCOUNT
                                                            </td>
                                                            <td align="center" class="textLabel14CalibriBrownBold" colspan="2" width="20%" title="SALE EXECUTIVE / SALE MONTH">
                                                                SALE EXE / SALE MONTH
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" width="20%">
                                                                <?php include 'ogsphdnid.php'; ?>
                                                                <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                    <tr>
                                                                        <td align="center" title="SELECT DATE HERE!" class="margin2pxAll" colspan="3">
                                                                            <?php
                                                                            //
                                                                            // **********************************************************************************
                                                                            // START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:VINOD-12APR2023
                                                                            // **********************************************************************************
                                                                            //
                                                                            $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
                                                                            $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
                                                                            $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
                                                                            $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
                                                                            //
                                                                            // ********************************************************************************
                                                                            // END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:VINOD-12APR2023
                                                                            // ********************************************************************************
                                                                            //
                                                                            if ($nepaliDateIndicator == 'YES') {
                                                                                ?>
                                                                                <input type="hidden" id="nepaliDateIndicator" name="nepaliDateIndicator" value="<?php echo $nepaliDateIndicator; ?>"/>
                                                                                <?php
                                                                                $tableAlignStyle = 'center';
                                                                                $selDayId = 'slPrDOBDay';
                                                                                $selDayName = 'addItemDOBDay';
                                                                                $selDayStyle = 'width:55px;height:26px;';
                                                                                $selMonthId = 'slPrDOBMonth';
                                                                                $selMonthName = 'addItemDOBMonth';
                                                                                $selMonthStyle = 'width:55px;height:26px;';
                                                                                $selYearId = 'slPrDOBYear';
                                                                                $selYearName = 'addItemDOBYear';
                                                                                $selYearStyle = 'width:55px;height:26px;';
                                                                                $date_nepali = $sttr_other_lang_add_date;
                                                                                include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                                                            } else {
                                                                                ?>
                                                                                <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                                    <tr>
                                                                                        <td width="33.33%" align="center">

                                                                                            <!-- *************** Start Code for dayDD *************** -->
                                                                                            <?php
                                                                                            //Current date is not showing -saif-24-05-2025 
                                                                                                if (empty($selDOBDay)) {
                                                                                                    $selDOBDay = date('d');  // day with leading zero
                                                                                                }
                                                                                            if (empty($selDOBMnth)) {
                                                                                                    $selDOBMnth = strtoupper(date('M')); // e.g., MAY
                                                                                                }
                                                                                                $todayMM = date('n') - 1; // 0-based index (0 = Jan)
                                                                                                $optMonth[$todayMM] = "selected";

                                                                                            if (empty($selDOBYear)) {
                                                                                                $selDOBYear = date('Y');  // 4 digit year
                                                                                            }
                                                                                            
                                                                                            
                                                                                            $todayDay = $selDOBDay - 1;
                                                                                            $arrDays = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10',
                                                                                                '11', '12', '13', '14', '15', '16', '17', '18', '19', '20',
                                                                                                '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
                                                                                            $optDay[$todayDay] = "selected";
                                                                                            ?> 
                                                                                            <select <?php if (($staffId && $array['addSellTransAccessDate'] != 'true')) { ?>
                                                                                                    disabled
                                                                                                <?php } ?> id="slPrDOBDay" name="addItemDOBDay" title="DAY"
                                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                            document.getElementById('slPrDOBMonth').focus();
                                                                                                            return false;
                                                                                                        } else if (event.keyCode == 8) {
                                                                                                            return false;
                                                                                                        }"
                                                                                                class="form-control text-center form-control-font13" style="width: 100%;"
                                                                                                <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                                    disabled
                                                                                                <?php } ?>
                                                                                                >
                                                                                                <option value="NotSelected">DAY</option>
                                                                                                <?php
                                                                                                for ($dd = 0; $dd <= 30; $dd++) {
                                                                                                    echo "<option value=\"$arrDays[$dd]\" $optDay[$dd]>$arrDays[$dd]</option>";
                                                                                                }
                                                                                                ?>
                                                                                            </select> 
                                                                                            <?php if (($staffId && $array['addSellTransAccessDate'] != 'true') || ($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                                <input id="slPrDOBDay" name="addItemDOBDay" type="hidden" value="<?php echo $selDOBDay; ?>"/>
                                                                                            <?php } ?>
                                                                                            <!-- *************** Bill Code for Month *************** -->
                                                                                            <?php
                                                                                            $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC);
                                                                                            $optMonth[$todayMM] = "selected";
                                                                                            ?> 
                                                                                        </td>
                                                                                        <td class="padLeft3" width="33.33%" align="center">
                                                                                            <input  id="gbMonthId" name="gbMonthId" type="hidden" value="0" /> 
                                                                                            <select <?php if (($staffId && $array['addSellTransAccessDate'] != 'true')) { ?>
                                                                                                    disabled
                                                                                                <?php } ?> id="slPrDOBMonth" name="addItemDOBMonth" title="MONTH" style="width:100%;"
                                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                            document.getElementById('slPrDOBYear').focus();
                                                                                                            return false;
                                                                                                        } else if (event.keyCode == 8) {
                                                                                                            document.getElementById('slPrDOBDay').focus();
                                                                                                            return false;
                                                                                                        }
                                                                                                        //START CODE TO GET MONTH FROM KEYS  
                                                                                                        var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                                                                                                        gbMonth = document.getElementById('gbMonthId').value;
                                                                                                        if (gbMonth == 1) {
                                                                                                            if (event.keyCode) {
                                                                                                                var sel = String.fromCharCode(event.keyCode);
                                                                                                                if (sel == 0)
                                                                                                                {
                                                                                                                    this.value = arrMonths[9];
                                                                                                                } else if (sel == 1)
                                                                                                                {
                                                                                                                    this.value = arrMonths[10];
                                                                                                                } else if (sel == 2)
                                                                                                                {
                                                                                                                    this.value = arrMonths[11];
                                                                                                                }
                                                                                                                // this.value = arrMonths[10];
                                                                                                                document.getElementById('gbMonthId').value = 0;
                                                                                                            }
                                                                                                        } else if (event.keyCode) {
                                                                                                            if (event.keyCode != 9) {
                                                                                                                var sel = String.fromCharCode(event.keyCode) - 1;
                                                                                                                this.value = arrMonths[sel];
                                                                                                                if (event.keyCode == 49) {
                                                                                                                    document.getElementById('gbMonthId').value = 1;
                                                                                                                }
                                                                                                            }
                                                                                                        } //END CODE TO GET MONTH FROM KEYS "
                                                                                                class="form-control text-center form-control-font13" style="width: 35px;"
                                                                                                <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                                    disabled
                                                                                                <?php } ?>
                                                                                                >
                                                                                                <option value="NotSelected">MON</option>
                                                                                                <?php
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************
                                                                                                $queryengmonformat = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$sessionOwnerId' and omly_option = 'englishMonthformat'";
                                                                                                $engmonformat = mysqli_query($conn, $queryengmonformat);
                                                                                                $rowengmonformat = mysqli_fetch_array($engmonformat);
                                                                                                $englishMonthFormat = $rowengmonformat['omly_value'];
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
////**********************************************************************************************************************************
                                                                                                for ($mm = 0; $mm <= 11; $mm++) {
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
//************************************************************************************************************************************
                                                                                                    if ($englishMonthFormat == 'displayinnumber') {
                                                                                                        $billMonth = date('m', strtotime($arrMonths[$mm]));
                                                                                                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$billMonth</option>";
                                                                                                    } else {
                                                                                                        echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
                                                                                                    }
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022**************************
//************************************************************************************************************************************ 
                                                                                                }
                                                                                                ?>
                                                                                            </select> 
                                                                                            <?php if (($staffId && $array['addSellTransAccessDate'] != 'true') || ($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                                <input id="slPrDOBMonth" name="addItemDOBMonth" type="hidden" value="<?php echo $selDOBMnth; ?>"/>
                                                                                            <?php } ?> 
                                                                                        </td>
                                                                                        <td class="padLeft3" width="33.33%">
                                                                                            <!-- *************** Start Code for Year *************** -->
                                                                                            <?php
                                                                                            $todayYear = date(Y);
                                                                                            $optYear[$selDOBYear] = "selected";
                                                                                            ?> 
                                                                                            <select <?php if (($staffId && $array['addSellTransAccessDate'] != 'true')) { ?>
                                                                                                    disabled
                                                                                                <?php } ?> id="slPrDOBYear" name="addItemDOBYear" title="YEAR" style="width:100%"
                                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                            document.getElementById('slPrCustomerName').focus();
                                                                                                            return false;
                                                                                                        } else if (event.keyCode == 8) {
                                                                                                            document.getElementById('slPrDOBMonth').focus();
                                                                                                            return false;
                                                                                                        }"
                                                                                                class="form-control text-center form-control-font13" style="width: 40px;"
                                                                                                <?php if (($staffId != '' && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                                    disabled
                                                                                                <?php } ?>
                                                                                                >
                                                                                                <option value="NotSelected">YEAR</option>
                                                                                                <?php
                                                                                                for ($yy = $todayYear; $yy >= 1900; $yy--) {
                                                                                                    echo "<option value=\"$yy\" $optYear[$yy]>$yy</option>";
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                            <?php if (($staffId && $array['addSellTransAccessDate'] != 'true') || ($staffId && $array['backDateTransactionForAllpanel'] != 'true')) { ?>
                                                                                                <?php // echo '$selDOBYear=='.$selDOBYear.'<br>'; ?>    
                                                                                                <input id="slPrDOBYear" name="addItemDOBYear" type="hidden" value="<?php echo $selDOBYear; ?>"/>
                                                                                            <?php } ?> 
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td align="center" title="CUSTOMER" width="20%">
                                                                <input id="slPrCustomerId" name="sttr_user_id" value="<?php echo $custId; ?>" type="hidden"/>
                                                                <input id="slPrCustomerName" name="slPrCustomerName" type="text" placeholder="CUSTOMER NAME" value="<?php echo $custFirstName . ' ' . $custLastName; ?>"
                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                                   document.getElementById('slPrPreInvoiceNo').focus();
                                                                                   return false;
                                                                               } else if (event.keyCode == 8) {
                                                                                   document.getElementById('slPrDOBYear').focus();
                                                                                   return false;
                                                                               }"
                                                                       readonly="true" autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="30" maxlength="50" />
                                                            </td>
                                                            <td colspan="1" width="30%">
                                                                <table border="0" cellspacing="0" cellpadding="1" width="100%">
                                                                    <tr>
                                                                        <td align="center"  width="70%">
                                                                            <div id="slPrInvoiceNoDiv">
                                                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                                                    <tr>
                                                                                        <?php
                                                                                        if ($sellPanelName == 'orderPickStock') {
                                                                                            $preOrdInvNo = $_REQUEST['preOrdInvNo'];
                                                                                            $postOrdInvNo = $_REQUEST['postOrdInvNo'];
                                                                                        }
                                                                                        ?>
                                                                                        <td>
                                                                                            <input <?php echo $staffAccessStr; ?> id="slPrPreInvoiceNo" name="sttr_pre_invoice_no" type="text" placeholder="INV" 
                                                                                                                                  value="<?php echo $slPrPreInvoiceNo; ?>" 
                                                                                                                                  onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                                              document.getElementById('slPrInvoiceNo').focus();
                                                                                                                                              return false;
                                                                                                                                          } else if (event.keyCode == 8 && this.value == '') {
                                                                                                                                              document.getElementById('slPrCustomerName').focus();
                                                                                                                                              return false;
                                                                                                                                          }"
                                                                                                                                  onchange="getInvoiceMetalB2(document.getElementById('slPrPreInvoiceNo').value, document.getElementById('slPrItemPreId').value, document.getElementById('slPrItemPostId').value, '<?php echo $custId; ?>', '<?php echo $panelName; ?>', '<?php echo $txtType ?>');"                                                                                               
                                                                                                                                  spellcheck="false" class="form-control text-center form-control-font13" size="9" maxlength="10" title="ITEM PRE INVOICE NUMBER"/>
                                                                                        </td>
                                                                                        <td class="padLeft3">
                                                                                            <input <?php echo $staffAccessStr; ?> id="slPrInvoiceNo" name="sttr_invoice_no" type="text" placeholder="Invoice No" 
                                                                                                                                  value="<?php echo $slPrInvoiceNo; ?>" 
                                                                                                                                  onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                                              document.getElementById('sttr_account_id').focus();
                                                                                                                                              return false;
                                                                                                                                          } else if (event.keyCode == 8 && this.value == '') {
                                                                                                                                              document.getElementById('slPrPreInvoiceNo').focus();
                                                                                                                                              return false;
                                                                                                                                          }"
                                                                                                                                  onblur="if (this.value == '')
                                                                                                                                              this.value = '<?php echo $slPrInvoiceNo; ?>';"
                                                                                                                                  onkeypress="javascript:return valKeyPressedForNumber(event);"
                                                                                                                                  spellcheck="false" class="form-control text-center form-control-font13" size="8" maxlength="30" title="ITEM POST INVOICE NUMBER"/>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                        <td align="center" title="FIRM" width="10%">
                                                                            <div>
                                                                                <div id="addStockItemFirmDiv" class="" style="width: 100%;">
                                                                                    <?php
                                                                                    $nextFieldId = 'sttr_account_id';
                                                                                    $nextReqFieldId = 'sttr_account_id';
                                                                                    $prevFieldId = 'slPrInvoiceNo';
                                                                                    $firmIdDivClass = 'form-control text-center form-control-font13';
                                                                                    $firmSelOptionDisable = true;
                                                                                    $panelName = 'sellStock';
                                                                                    $FirmStyle = 'height:26px; border:solid 1px #808080;width:160px;';
                                                                                    $firmIdSelected = $itst_firm_id;
                                                                                    if ($staffId && $array['addSellTransAccessfirm'] != 'true') {//To Give Access to staff 
                                                                                        $accAccess = 'NO';
                                                                                    }
                                                                                    include 'omffrasp.php';
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <?php //echo '$numRows == ' . $numRows;                   ?>
                                                            <td align="left" title="ACCOUNT" width="10%">                                                            
                                                                <div id="selAccountDiv" class="" style="height:35px;overflow:hidden;border-bottom:1px solid #c1c1c1">
                                                                    <?php
                                                                    $prevFieldId = 'slPrInvoiceNo';
                                                                    $nextFieldId = 'slPrItemMetal';
                                                                    $accNameSelected = 'Sales Accounts';
                                                                    $selAccountId = 'sttr_account_id';
                                                                    $selAccountName = "'Sales Accounts'";
                                                                    $selAccountClass = 'form-control text-center form-control-font13';
                                                                    $selStyle = 'height:35px; border:solid 1px #808080;';
                                                                    //echo '$itst_firm_id == ' . $itst_firm_id; 

                                                                    $selFirmId = $itst_firm_id;

                                                                    $accIdSelected = $sttr_account_id;
                                                                    if ($staffId && $array['addStockAccessAcntType'] != 'true') { //To Give Access to staff 
                                                                        $accAccess = 'NO';
                                                                    }
                                                                    include 'omacsalt.php';
                                                                    ?>
                                                                </div>
                                                            </td>
                                                            <td align="center" width="10%" valign="middle">
                                                                <div  class="" style="width:100%;">
                                                                    <?php if ($staffId != '') { ?>
                                                                        <select id="custStaffLoginId" name="sttr_staff_id"                
                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                            document.getElementById('addItemSALEMonth').focus();
                                                                                            return false;
                                                                                        } else if (event.keyCode == 8) {
                                                                                            document.getElementById('sttr_account_id').focus();
                                                                                            return false;
                                                                                        }"
                                                                                class="form-control text-center form-control-font13" style="height: 35px;width:100%;border: solid 1px #808080;">
                                                                                    <?php
                                                                                    $qSelStaffLoginId = "SELECT user_id,user_login_id,user_fname FROM user where user_owner_id='$sessionOwnerId' and user_status NOT IN ('Deleted','INACTIVE') and user_type='STAFF' order by user_login_id asc";
                                                                                    $resStaffLoginId = mysqli_query($conn, $qSelStaffLoginId);

                                                                                    while ($rowStaffLoginId = mysqli_fetch_array($resStaffLoginId, MYSQLI_ASSOC)) {
                                                                                        $staffName = $rowStaffLoginId['user_fname'];
                                                                                        if ($rowStaffLoginId['user_id'] == $staffId) {
                                                                                            $staffLoginIdSelected = "selected";
                                                                                        }
                                                                                        echo "<OPTION  VALUE=" . "\"{$rowStaffLoginId['user_id']}\"" . " class=" . "\"content-mess-maron\"" . " $staffLoginIdSelected>{$staffName}</OPTION>";
                                                                                        $staffLoginIdSelected = "";
                                                                                    }
                                                                                    ?>
                                                                            <input type="hidden" id="custStaffLoginId" name="custStaffLoginId" value="<?php echo $staffLoginId; ?>"/>
                                                                        </select>
                                                                    <?php } else { ?>
                                                                        <select id="custStaffLoginId" name="sttr_staff_id"               
                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                            document.getElementById('addItemSALEMonth').focus();
                                                                                            return false;
                                                                                        } else if (event.keyCode == 8) {
                                                                                            document.getElementById('sttr_account_id').focus();
                                                                                            return false;
                                                                                        }"
                                                                                class="form-control text-center form-control-font13" style="height:35px;width:100%;border: solid 1px #808080;">
                                                                            <OPTION  VALUE="NotSelected">STAFF</OPTION>
                                                                            <?php
                                                                            $qSelStaffLoginId = "SELECT user_id,user_login_id,user_fname FROM user where user_owner_id='$sessionOwnerId' and user_status NOT IN ('Deleted','INACTIVE') and user_type='STAFF' order by user_login_id asc";
                                                                            $resStaffLoginId = mysqli_query($conn, $qSelStaffLoginId);

                                                                            while ($rowStaffLoginId = mysqli_fetch_array($resStaffLoginId, MYSQLI_ASSOC)) {
                                                                                $staffName = $rowStaffLoginId['user_fname'];
                                                                                if ($rowStaffLoginId['user_id'] == $staffLoginId) {
                                                                                    $staffLoginIdSelected = "selected";
                                                                                }
                                                                                echo "<OPTION  VALUE=" . "\"{$rowStaffLoginId['user_id']}\"" . " class=" . "\"content-mess-maron\"" . " $staffLoginIdSelected>{$staffName}</OPTION>";
                                                                                $staffLoginIdSelected = "";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    <?php } ?>
                                                                </div>

                                                            </td>
                                                            <td align="center" width="10%">
                                                                <!-- *************** Bill Code for Month *************** -->
                                                                <?php
                                                                //
                                                                // **********************************************************************************
                                                                // START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:VINOD13APR2023
                                                                // **********************************************************************************
                                                                //
                                                                $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
                                                                $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
                                                                $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
                                                                $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
                                                                //
                                                                // ********************************************************************************
                                                                // END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:VINOD13APR2023
                                                                // ********************************************************************************
                                                                //
                                                                if ($nepaliDateIndicator == 'YES') {
                                                                    ?>
                                                                    <input type="hidden" id="nepaliDateIndicator" name="nepaliDateIndicator" value="<?php echo $nepaliDateIndicator; ?>"/>
                                                                    <input  id="gbSaleMonthId" name="gbSaleMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD -->
                                                                    <?php
                                                                    $tableAlignStyle = 'center';
                                                                    $selDayId = $selDayName = 'slPrDOBDay';
                                                                    $selDayStyle = 'width:55px;height:26px;display:none;';
                                                                    $selMonthId = 'addItemSALEMonth';
                                                                    $selMonthName = 'sttr_staff_sale_month';
                                                                    $selMonthStyle = 'width:45px;height:26px;';
                                                                    $selYearId = $selYearName = 'slPrDOBYear';
                                                                    $selYearStyle = 'width:55px;height:26px;display:none;';
                                                                    $date_nepali = $sttr_other_lang_add_date;
                                                                    include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                                                } else {
                                                                    ?>
                                                                    <?php
                                                                    //Current date is not showing -@saif 24-05-2025
                                                                                                if (empty($selDOBDay)) {
                                                                                                    $selDOBDay = date('d');  // day with leading zero
                                                                                                }
                                                                                            if (empty($selDOBMnth)) {
                                                                                                    $selDOBMnth = strtoupper(date('M')); // e.g., MAY
                                                                                                }
                                                                                                $todayMM = date('n') - 1; // 0-based index (0 = Jan)
                                                                                                $optMonth[$todayMM] = "selected";

                                                                                            if (empty($selDOBYear)) {
                                                                                                $selDOBYear = date('Y');  // 4 digit year
                                                                                            }
                                                                    $arrMonths = array(JAN, FEB, MAR, APR, MAY, JUN, JUL, AUG, SEP, OCT, NOV, DEC);
                                                                    $optMonth[$staffSaleMM] = "selected";
                                                                    ?> 
                                                                    <input  id="gbSaleMonthId" name="gbSaleMonthId" type="hidden" value="0" /> <!-- ADD INPUT FIELD -->
                                                                    <select id="addItemSALEMonth" name="sttr_staff_sale_month" 
                                                                            title="SALE MONTH"
                                                                            onkeydown="javascript: if (event.keyCode == 13) {
                                                                            <?php
                                                                            if ($_REQUEST['panelName'] == 'SUBSCRIPTION_FORM' ||
                                                                                    $_REQUEST['panelName'] == 'SERVICE_FORM' ||
                                                                                    $sttr_panel_name == 'SERVICE_FORM' ||
                                                                                    $sttr_panel_name == 'SUBSCRIPTION_FORM') {
                                                                                ?>
                                                                                            document.getElementById('addItemMDOBDay').focus();
                                                                            <?php } else { ?>
                                                                                            document.getElementById('slPrItemPreId').focus();
                                                                            <?php } ?>
                                                                                        return false;
                                                                                    } else if (event.keyCode == 8) {
                                                                                        document.getElementById('custStaffLoginId').focus();
                                                                                        return false;
                                                                                    }
                                                                                    //START CODE TO GET MONTH FROM KEYS  
                                                                                    var arrMonths = new Array('JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC');
                                                                                    gbMonth = document.getElementById('gbSaleMonthId').value;
                                                                                    if (gbMonth == 1) {
                                                                                        if (event.keyCode) {
                                                                                            var sel = String.fromCharCode(event.keyCode);
                                                                                            if (sel == 0)
                                                                                            {
                                                                                                this.value = arrMonths[9];
                                                                                            } else if (sel == 1)
                                                                                            {
                                                                                                this.value = arrMonths[10];
                                                                                            } else if (sel == 2)
                                                                                            {
                                                                                                this.value = arrMonths[11];
                                                                                            }
                                                                                            // this.value = arrMonths[10];
                                                                                            document.getElementById('gbSaleMonthId').value = 0;
                                                                                        }
                                                                                    } else if (event.keyCode) {
                                                                                        var sel = String.fromCharCode(event.keyCode) - 1;
                                                                                        this.value = arrMonths[sel];
                                                                                        if (event.keyCode == 49) {
                                                                                            document.getElementById('gbSaleMonthId').value = 1;
                                                                                        }
                                                                                    } //END CODE TO GET MONTH FROM KEYS "
                                                                            class="form-control text-center form-control-font13" style="height: 35px; width:100%;"
                                                                            <?php if (($staffId != '' && $array['sellSalesMonthAccess'] == 'true')) { ?>
                                                                                disabled
                                                                            <?php } ?>
                                                                            >
                                                                        <option value="NotSelected">MONTH</option>
                                                                        <?php
                                                                        for ($mm = 0; $mm <= 11; $mm++) {
//************************************************************************************************************************************
//***********************START CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022************************
//************************************************************************************************************************************
                                                                            if ($englishMonthFormat == 'displayinnumber') {
                                                                                $engMonth = date('m', strtotime($arrMonths[$mm]));
                                                                                echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$engMonth</option>";
                                                                            } else {
                                                                                echo "<option value=\"$arrMonths[$mm]\" $optMonth[$mm]>$arrMonths[$mm]</option>";
                                                                            }
//************************************************************************************************************************************
//***********************END CODE TO SHOW ENGLISH DATE MONTH IN NUMERIC/WORD FORMAT@RENUKA SHARMA-07-12-2022**************************
//************************************************************************************************************************************ 
                                                                        }
                                                                        ?>
                                                                    </select> 
                                                                    <?php if (($staffId != '' && $array['sellSalesMonthAccess'] == 'true')) { ?>
                                                                        <input type="hidden" id="addItemSALEMonth" name="sttr_staff_sale_month" value="<?php echo $staffSaleMM; ?>"> 
                                                                    <?php }
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" colspan="7" class="paddingTopBott5">
                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemValueAdded" name="sttr_value_added" type="hidden" />
                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="sttr_total_making_amt" name="sttr_total_making_amt" type="hidden" />
                                                                <input <?php echo $mkgDiscPerStaffAccessStr; ?> id="sttr_mkg_discount_per" name="sttr_mkg_discount_per" type="hidden" />
                                                                <input <?php echo $mkgDiscAmtStaffAccessReadOnlyStr; ?> id="sttr_mkg_discount_amt" name="sttr_mkg_discount_amt" type="hidden" />
                                                                <input <?php echo $staffAccessStr; ?> id="slPrItemQtyMkgCgstPer" name="sttr_mkg_cgst_per" type="hidden" />
                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemMkgCgstChrg" name="sttr_mkg_cgst_chrg" type="hidden" />
                                                                <input <?php echo $staffAccessStr; ?> id="slPrItemMkgSgstPer" name="sttr_mkg_sgst_per" type="hidden" />
                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemMkgSgstChrg" name="sttr_mkg_sgst_chrg" type="hidden" />
                                                                <input <?php echo $staffAccessStr; ?> id="slPrItemMkgIgstPer" name="sttr_mkg_igst_per" type="hidden" />
                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemMkgIgstChrg" name="sttr_mkg_igst_chrg" type="hidden" />

                                                                <div id="metalRateDiv">
                                                                    <input id="sttr_product_purchase_rate" name="sttr_product_purchase_rate" type="hidden" />
                                                                    <input <?php echo $staffAccessStr; ?> id="slPrItemMetalRate" name="sttr_metal_rate" type="hidden" />
                                                                    <div id="metalRateSelectDiv"></div>
                                                                </div>

                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="sttr_metal_amt" name="sttr_metal_amt" type="hidden" />
                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="sttr_metal_discount_per" name="sttr_metal_discount_per" type="hidden" />
                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="sttr_metal_discount_amt" name="sttr_metal_discount_amt" type="hidden" />
                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="addItemNTWNMetRate" name="sttr_valuation" type="hidden" />
                                                                <input <?php echo $staffAccessStr; ?> id="slPrItemPriMkgCgstPer" name="sttr_tot_price_cgst_per" type="hidden" />
                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemPriMkgCgstChrg" name="sttr_tot_price_cgst_chrg" type="hidden" />
                                                                <input <?php echo $staffAccessStr; ?> id="slPrItemPriMkgSgstPer" name="sttr_tot_price_sgst_per" type="hidden" />
                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemPriMkgSgstChrg" name="sttr_tot_price_sgst_chrg" type="hidden" />
                                                                <input <?php echo $staffAccessStr; ?> id="slPrItemPriMkgIgstPer" name="sttr_tot_price_igst_per" type="hidden" />
                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemPriMkgIgstChrg" name="sttr_tot_price_igst_chrg" type="hidden" />
                                                                <input id="addItemOtherChrgsChanged" name="addItemOtherChrgsChanged" type="hidden" />
            <!--                                                                <input <?php echo $staffAccessStr; ?> id="sttr_other_charges" name="sttr_other_charges" type="hidden" />
                                                                <input <?php echo $staffAccessStr; ?> id="sttr_other_charges_type" name="sttr_other_charges_type" type="hidden" />-->
                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="totalValuation" name="sttr_total_cust_price" type="hidden"  />
                                                                <input <?php echo $staffAccessStr; ?> id="sttr_tax" name="sttr_tax" type="hidden" />
                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemTotTax" name="sttr_tot_tax" type="hidden"  />
                                                                <input type="hidden" id="sttr_price" name="sttr_price" />
                                                                <input type="hidden" id="reverseCal" name="reverseCal" value="No" />
                                                                <input type="hidden" id="slPrItemFinalValHidden" name="slPrItemFinalValHidden" />
                                                                <input type="hidden" <?php echo $staffAccessReadOnlyStr; ?> id="slPrItemFinalVal" name="sttr_final_valuation" />
                                                                <div id="finalValuationSelectDiv" /></div>

                                                                <!--<div class="hrGold"></div>-->

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="padBott2">
                                                    <table border="0" cellspacing="0" cellpadding="0" align="center" width="99.6%">
                                                        <tr>
                                                            <td>
                                                                <table align="left" border="0" cellspacing="0" cellpadding="1" width="100%"  class="brdrgry-dashed margtp10">
                                                                    <tr class="height28 goldBack">
                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                            TYPE
                                                                        </td>
                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                            PRE ID
                                                                        </td>
                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                            POST ID
                                                                        </td>
                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                            CATEGORY
                                                                        </td>                                                                      
                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                            NAME
                                                                        </td>
            <?php if ($HSNOptionInForms != 'NO') { ?>
                                                                            <td align="center" title="" class="textLabel14CalibriBrownBold" >
                                                                                HSN
                                                                            </td>
            <?php } ?>
                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold" >
                                                                            QTY
                                                                        </td>
                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                            GS WT
                                                                        </td>
                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                            LESS WT 
                                                                        </td>
                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                            NT WT
                                                                        </td>

                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                            PUR
                                                                        </td> 
            <?php if ($_SESSION['sessionStaffId'] == '' && $_SESSION['sessionStaffId'] == NULL) { ?>
                                                                            <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                                WSTG
                                                                            </td> 
                                                                            <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                                F.PUR
                                                                            </td> 
                                                                            <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                                C.W %
                                                                            </td>
                                                                        <?php } ?>
            <?php if ($_SESSION['sessionStaffId'] != '' && $_SESSION['sessionStaffId'] != NULL) { ?>
                                                                            <td align="center" title="" class="textLabel14CalibriBrownBold" colspan="3">
                                                                                TOT WSTG
                                                                            </td>
            <?php } ?>
                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                            F.F PUR
                                                                        </td>
                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                            C.W WT
                                                                        </td>
                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                            FN WT
                                                                        </td>                                                                            
                                                                        <td align="center" title="" class="textLabel14CalibriBrownBold">
                                                                            FFN WT 
                                                                        </td>                                                                      
                                                                    </tr>

                                                                    <tr>
                                                                        <td align="left" width="5%">
                                                                            <div name="box" id="metaltype_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                METAL TYPE
                                                                            </div>
                                                                            <div id="itemTypeDiv">
            <?php // echo '$stockType=='.$stockType;     ?>
                                                                                <input <?php echo $staffAccessStr; ?> <?php echo $metalTypeAccessStr; ?>
                                                                                    id="slPrItemMetal" name="sttr_metal_type" 
                                                                                    type="text" placeholder="METAL TYPE" 
                                                                                    <?php if ($stockType == 'stock') { ?>readonly<?php } ?>
                                                                                    value="<?php
                                                                                    if ($itst_metal_type != '')
                                                                                        echo $itst_metal_type;
                                                                                    else
                                                                                        echo 'Gold';
                                                                                    ?>"
                                                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                clearDivision('metalSelectDiv');
                                                                                                document.getElementById('slPrItemPreId').focus();
                                                                                                return false;
                                                                                            } else if (event.keyCode == 8 && this.value == '') {
                                                                                                clearDivision('metalSelectDiv');
                                                                                                document.getElementById('sttr_account_id').focus();
                                                                                                return false;
                                                                                            }"
                                                                                    onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                                                                    <?php if ($stockType != 'stock') { ?>
                                                                                        <?php if ($metalTypeAccessValue != 'NO') { ?>
                                                                                                        getMetalType('metalSelectDiv', 'slPrItemMetal', event.keyCode, 'SellPurchase', '<?php echo $custId; ?>', 'sellStock', '<?php echo $transType; ?>', '<?php echo $firmID; ?>', this.value, '<?php echo $omly_value; ?>', '<?php echo $omly_option; ?>');
                                                                                        <?php } ?>
                                                                                    <?php } ?>

                                                                                            }"
                                                                                    onclick="this.value = '';"
                                                                                    onblur="document.getElementById('metaltype_label_box').style.visibility = 'hidden';
                                                                                            if (this.value == '') {
                                                                                                this.value = '<?php echo $itst_metal_type; ?>';
                                                                                            }
                                                                                            calculateSellPrice();
                                                                                    "
                                                                                    onfocus="document.getElementById('metaltype_label_box').style.visibility = 'visible';"
                                                                                    autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="5" maxlength="80" />
                                                                                <div id="metalSelectDiv" class="itemListDivToAddStock placeholderClass"></div>
                                                                            </div>
                                                                        </td>

            <?php //echo '$invoiceNumber == '.$invoiceNumber;        ?>

                                                                        <td align="left" class="" title="" width="7%">
                                                                            <div name="box" id="preid_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                ITEM PRE ID
                                                                            </div>
                                                                            <div id="addStockItemPreIdDiv">
                                                                                <input <?php echo $staffAccessStr; ?> <?php echo $preIdAccessStr; ?>
                                                                                    type="text" id="slPrItemPreId" name="sttr_item_pre_id" placeholder="PRE ID"
                                                                                    value="<?php echo $itst_item_pre_id; ?>" 
                                                                                    onkeydown="javascript: if (event.keyCode == 13 || event.keyCode == 39) {
                                                                                                document.getElementById('slPrItemPostId').focus();
                                                                                                return false;
                                                                                            } else if (event.keyCode == 8 && this.value == '') {
                                                                                                document.getElementById('slPrItemMetal').focus();
                                                                                                return false;
                                                                                            }"
                                                                                    onblur="document.getElementById('preid_label_box').style.visibility = 'hidden';"
                                                                                    onfocus="document.getElementById('preid_label_box').style.visibility = 'visible';"
                                                                                    autocomplete="off" size="6"  maxlength="6" class="form-control text-center form-control-font13"/>
                                                                                <div id="itemPreIdSelectDiv"></div>
                                                                            </div> 
                                                                        </td>

                                                                        <td align="left" title="" width="7%">
                                                                            <div name="box" id="pasoid_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                ITEM POST ID
                                                                            </div>
                                                                            <div id="addStockItemIdDiv">
                                                                                <input type="text" <?php echo $staffAccessStr; ?> <?php echo $postIdAccessStr; ?>
                                                                                       id="slPrItemPostId" name="sttr_item_id" 
                                                                                       placeholder="POST ID" 
                                                                                       value="<?php echo $itst_item_id; ?>"
                                                                                       onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                   document.getElementById('slPrItemCategory').value = '';
                                                                                                   document.getElementById('slPrItemCategory').focus();
                                                                                                   return false;
                                                                                               } else if ((event.keyCode == 8 || event.keyCode == 37) && this.value == '') {
                                                                                                   document.getElementById('slPrItemPreId').focus();
                                                                                                   return false;
                                                                                               }"
                                                                                       onblur="document.getElementById('pasoid_label_box').style.visibility = 'hidden';
                                                                                               if (this.value == '')
                                                                                                   this.value = '<?php echo $itst_item_id; ?>';"
                                                                                       onfocus="document.getElementById('pasoid_label_box').style.visibility = 'visible';"                       
                                                                                       autocomplete="off" class="form-control text-center form-control-font13" size="6" maxlength="15"/>  
                                                                            </div>
                                                                        </td>
            <?php // echo '$sellPanelName'.$sellPanelName;     ?>
                                                                        <td align="left" title="" class="" width="6%">
                                                                            <div name="box" id="category_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                ITEM CATEGORY
                                                                            </div>
                                                                            <input <?php echo $staffAccessStr; ?> <?php echo $categoryAccessStr; ?>
                                                                                id="slPrItemCategory" name="sttr_item_category" 
                                                                                type="text" placeholder="CATEGORY" <?php if ($sellPanelName == 'SellDetUpPanel ' || $sellPanelName == 'SellPayUp') { ?> <?php } ?>
                                                                                value="<?php echo $itst_item_category; ?>"
                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                            document.getElementById('slPrItemName').value = '';
                                                                                            document.getElementById('slPrItemName').focus();
                                                                                            return false;
                                                                                        } else if (event.keyCode == 8 && this.value == '') {
                                                                                            document.getElementById('sttr_account_id').focus();
                                                                                            return false;
                                                                                        }"
                                                                                onclick="this.value = '';"
                                                                                onblur="document.getElementById('category_label_box').style.visibility = 'hidden';
                                                                                        if (this.value == '') {
                                                                                            this.value = '<?php echo $itst_item_category; ?>';
                                                                                        }"
                                                                                onfocus="document.getElementById('category_label_box').style.visibility = 'visible';"
                                                                                autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="6" maxlength="80" />
                                                                        </td>

                                                                        <td align="left" title="" class="" width="6%">
                                                                            <div name="box" id="name_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                ITEM NAME
                                                                            </div>
                                                                            <input <?php echo $staffAccessStr; ?> <?php echo $nameAccessStr; ?>
                                                                                id="slPrItemName" name="sttr_item_name" 
                                                                                type="text" placeholder="NAME" <?php if ($sellPanelName == 'SellDetUpPanel' || $sellPanelName == 'SellPayUp') { ?>  <?php } ?>
                                                                                value="<?php echo $itst_item_name; ?>"
                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                <?php if ($HSNOptionInForms == 'NO') { ?>
                                                                                                document.getElementById('slPrItemPieces').focus();
                                                                                                document.getElementById('slPrItemPieces').value = '';
                                                                                <?php } else { ?>
                                                                                                document.getElementById('sttr_hsn_no').focus();
                                                                                                document.getElementById('sttr_hsn_no').value = '';
                                                                                <?php } ?>
                                                                                            clearDivision('itemListDivToAddStock');
                                                                                            return false;
                                                                                        } else if (event.keyCode == 8 && this.value == '') {
                                                                                            document.getElementById('slPrItemCategory').focus();
                                                                                            clearDivision('itemListDivToAddStock');
                                                                                            return false;
                                                                                        }"
                                                                                onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                                                                <?php
                                                                                if ($sellPanelName != 'SellDetUpPanel' && $sellPanelName != 'SellPayUp' &&
                                                                                        $sellPanelName != 'EstimateUpdate' && $sellPanelName != 'EstimatePayUp') {
                                                                                    ?>
                                                                                                searchWhSellItemNames(document.getElementById('slPrItemCategory').value, document.getElementById('slPrItemMetal').value, 'slPrItemName', document.getElementById('slPrItemPreId').value,document.getElementById('slPrItemPostId').value,event.keyCode);
                                                                                <?php } ?>
                                                                                        }"
                                                                                onblur="document.getElementById('name_label_box').style.visibility = 'hidden';
                                                                                        if (this.value == '') {
                                                                                            this.value = '<?php echo $itst_item_name; ?>';
                                                                                        }"
                                                                                onfocus="document.getElementById('name_label_box').style.visibility = 'visible';"                    
                                                                                onclick="clearDivision('itemListDivToAddStock');
                                                                                        this.value = '';"
                                                                                autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="6" maxlength="80" />
                                                                            <div id="itemListDivToAddStock" class="itemListDivToAddStock placeholderClass"></div>
                                                                        </td>

                                                                        <?php
                                                                        //if ($sttr_hsn_no == '') {
                                                                        //    $sttr_hsn_no = 7113;
                                                                        //}
                                                                        ?>

            <?php if ($HSNOptionInForms != 'NO') { ?>
                                                                            <td align="left" title="" class="" width="4%">
                                                                                <div name="box" id="hsn_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                    ITEM HSN NUMBER
                                                                                </div>
                                                                                <input <?php echo $staffAccessStr; ?> id="sttr_hsn_no" name="sttr_hsn_no" type="text" placeholder="HSN" 
                                                                                                                      value="<?php echo $sttr_hsn_no; ?>"
                                                                                                                      onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                                  document.getElementById('slPrItemPieces').focus();
                                                                                                                                  document.getElementById('slPrItemPieces').value = '';
                                                                                                                                  return false;
                                                                                                                              } else if (event.keyCode == 8 && this.value == '') {
                                                                                                                                  document.getElementById('slPrItemName').focus();
                                                                                                                                  return false;
                                                                                                                              }"
                                                                                                                      onclick="this.value = '';"
                                                                                                                      onblur="document.getElementById('hsn_label_box').style.visibility = 'hidden';
                                                                                                                              if (this.value == '') {
                                                                                                                                  this.value = '<?php echo $sttr_hsn_no; ?>';
                                                                                                                              }"
                                                                                                                      onfocus="document.getElementById('hsn_label_box').style.visibility = 'visible';"
                                                                                                                      autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="2" maxlength="15" />
                                                                            </td>
            <?php } ?>

                                                                        <td align="left" title="" class="" width="4%">
                                                                            <div name="box" id="qty_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                ITEM QUANTITY
                                                                            </div>
                                                                            <input type="hidden" id="slPrItemPiecesChnged" value="<?php echo $itst_quantity; ?>" />
                                                                            <input <?php
                                                                            if ($staffId && ($array['sellPanelQtyAccess'] != 'true')) {
                                                                                echo $staffAccessStr;
                                                                            }
                                                                            ?>   id="slPrItemPieces" name="sttr_quantity" <?php if ($sellPanelName == 'SellDetUpPanel' || $sellPanelName == 'SellPayUp') { ?> <?php } ?>
                                                                                type="text" value="<?php echo $finalQTY; ?>" placeholder="QTY"
                                                                                onblur="document.getElementById('qty_label_box').style.visibility = 'hidden';
                                                                                        if (this.value == '') {
                                                                                            if (document.getElementById('slPrItemPiecesChnged').value != '') {
                                                                                                this.value = document.getElementById('slPrItemPiecesChnged').value;
                                                                                            }
                                                                                        }
                                                                                        if (this.value == '') {
                                                                                            this.value = '<?php echo $finalQTY; ?>';
                                                                                        }
                                                                                        calculateSellPrice();"
                                                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                                                            document.getElementById('slPrItemGSW').focus();
                                                                                            document.getElementById('slPrItemGSW').value = '';
                                                                                            return false;
                                                                                        } else if (event.keyCode == 8 && this.value == '') {
                                                                                <?php if ($HSNOptionInForms == 'NO') { ?>
                                                                                                document.getElementById('slPrItemName').focus();
                                                                                <?php } else { ?>
                                                                                                document.getElementById('sttr_hsn_no').focus();
                                                                                <?php } ?>
                                                                                            return false;
                                                                                        }"
                                                                                onclick="this.value = '';"
                                                                                onkeypress="javascript:return valKeyPressedForNumber(event);"  
                                                                                onfocus="document.getElementById('qty_label_box').style.visibility = 'visible';"
                                                                                spellcheck="false" class="form-control text-center form-control-font13" 
                                                                                style=""
                                                                                size="10" maxlength="10" />
                                                                        </td>

                                                                        <td align="left" class="" width="5%">
                                                                            <table cellspacing="0" cellpadding="1" width="100%" >
                                                                                <tr>
                                                                                    <td align="left" class="">
                                                                                        <div name="box" id="gswt_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                            GROSS WEIGHT
                                                                                        </div>
                                                                                        <input type="hidden" id="grossWeight" name="grossWeight" value="<?php echo $finalGSWT; ?>" />
                                                                                        <input type="hidden" id="slPrItemGSWChng" class="form-control-height20 placeholderClass" name="slPrItemGSWChng" value="<?php echo $finalGSWT; ?>" />
                                                                                        <input <?php
                                                                                        if ($staffId && ($array['sellPanelGrossWtAccess'] != 'true')) {
                                                                                            echo $staffAccessStr;
                                                                                        }
                                                                                        ?>  id="slPrItemGSW" name="sttr_gs_weight" type="text" 
                                                                                            placeholder="GS WT" value="<?php echo $finalGSWT; ?>" 
                                                                                            <?php if ($staffId && $array['addStockAccessAutoWtRdOnly'] == 'true') { ?>readonly="true"<?php } ?>
                                                                                            <?php
                                                                                            /* ------------------------------------------------------------------------------------------------------- */
                                                                                            /* Start Code to Get Weight from Weighing Scale
                                                                                              /* ------------------------------------------------------------------------------------------------------- */
                                                                                            $selFormsLayoutDet = "SELECT omly_value FROM omlayout WHERE omly_option = 'checkWSComPort'";
                                                                                            $resFormsLayoutDet = mysqli_query($conn, $selFormsLayoutDet);
                                                                                            $rowFormsLayoutDet = mysqli_fetch_array($resFormsLayoutDet);
                                                                                            $checkWSComPortVal = $rowFormsLayoutDet['omly_value'];
                                                                                            ?>
            <?php if ($_SESSION['sessionOwnIndStr'][16] == 'Y' && $checkWSComPortVal == 'true') { ?>
                                                                                                onfocus="getWeightFromWeighingScale('slPrItemGSW', 'slPrItemNTW');"
                                                                                                onclick="getWeightFromWeighingScale('slPrItemGSW', 'slPrItemNTW');"
                                                                                                <?php
                                                                                            }
                                                                                            /* ------------------------------------------------------------------------------------------------------- */
                                                                                            /* End Code to Get Weight from Weighing Scale
                                                                                              /* ------------------------------------------------------------------------------------------------------- */
                                                                                            ?>   
                                                                                            onclick="this.value = '';"  
                                                                                            onblur="document.getElementById('gswt_label_box').style.visibility = 'hidden';
                                                                                                    if (this.value == '') {
                                                                                                        this.value = '<?php echo $finalGSWT; ?>';
                                                                                                    }
                                                                                                    if (this.value != '') {
                                                                                                        document.getElementById('slPrItemNTW').value = this.value;
                                                                                                        getItemDetInPurchase('<?php echo $itemDetailPanel; ?>');
                                                                                                    }
                                                                                                    if (this.value != '') {
                                                                                                        document.getElementById('slPrItemNTW').value = this.value;
                                                                                                        document.getElementById('grossWeight').value = this.value;
                                                                                                        document.getElementById('netWeight').value = this.value;
                                                                                                        changeNetWeightByPktWt('','sellMetalB2');
                                                                                                    }
                                                                                                    if (document.getElementById('slPrItemGSW').value > 0) {
                                                                                                        calculateCustWastageWt();
                                                                                                    }
                                                                                                    calculateSellPrice();
                                                                                                    return false;"
                                                                                            onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                        document.getElementById('slPrItemGSWT').focus();
                                                                                                        return false;
                                                                                                    } else if (event.keyCode == 8 && this.value == '') {
                                                                                                        document.getElementById('slPrItemPieces').focus();
                                                                                                        return false;
                                                                                                    }"
                                                                                            onkeyup="if (event.keyCode == 13) {
                                                                                                        document.getElementById('grossWeight').value = this.value;
                                                                                                    }"

                                                                                            onkeypress="javascript:return valKeyPressedForNumNDot(event);"  
                                                                                            onfocus="document.getElementById('gswt_label_box').style.visibility = 'visible';"
                                                                                            autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" style="width:73px;"
                                                                                            size="25" maxlength="10"  title=""/>
                                                                                    </td>
                                                                                    <td align="left" class="">
                                                                                        <select <?php echo $staffAccessStr; ?> id="slPrItemGSWT" name="sttr_gs_weight_type" title=""
                                                                                                                               onchange ="document.getElementById('slPrItemGSWT').value = this.value;
                                                                                                                                       if ((document.getElementById('slPrItemGSW').value) != '') {
                                                                                                                                           calculateSellPrice();
                                                                                                                                           return false;
                                                                                                                                       }"
                                                                                                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                                           document.getElementById('slPrPacketWeight').focus();
                                                                                                                                           return false;
                                                                                                                                       } else if (event.keyCode == 8) {
                                                                                                                                           document.getElementById('slPrItemGSW').focus();
                                                                                                                                           return false;
                                                                                                                                       }"
                                                                                                                               class="form-control text-center form-control-font13" style="width: 43px;">
                                                                                                                                   <?php
                                                                                                                                   if ($itemGSWT != '') {
                                                                                                                                       $itemGsWtType = array(GM, KG, MG);
                                                                                                                                       for ($i = 0; $i <= 2; $i++)
                                                                                                                                           if ($itemGsWtType[$i] == $itemGSWT)
                                                                                                                                               $optionGSWTypeSel[$i] = 'selected';
                                                                                                                                   } else {
                                                                                                                                       $optionGSWTypeSel[0] = 'selected';
                                                                                                                                   }
                                                                                                                                   ?>
                                                                                            <option value="GM" <?php echo $optionGSWTypeSel[0]; ?>>GM</option>
                                                                                            <option value="KG" <?php echo $optionGSWTypeSel[1]; ?>>KG</option>
                                                                                            <option value="MG" <?php echo $optionGSWTypeSel[2]; ?>>MG</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>


                                                                        <td align="left" class="" width="5%">
                                                                            <table cellspacing="0" cellpadding="0" width="100%" >
                                                                                <tr>
                                                                                    <td align="left" width="60%">
                                                                                        <div name="box" id="pktwt_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                            PKT WEIGHT
                                                                                        </div>
                                                                                        <!--<input type="hidden" id="sellMetalB2" name="sellMetalB2" value="<?php // echo 'YES';?>">-->
                                                                                        <input <?php
                                                                                        if ($staffId && ($array['sellPanelLesssWtAccess'] != 'true')) {
                                                                                            echo $staffAccessStr;
                                                                                        }
                                                                                        ?> id="slPrPacketWeight" name="sttr_pkt_weight" type="text" placeholder="PKT WT" value="<?php echo $itemPKTW; ?>"
                                                                                            onblur="document.getElementById('pktwt_label_box').style.visibility = 'hidden';
                                                                                                    if (this.value == '') {
                                                                                                        this.value = '<?php echo $itemPKTW; ?>';
                                                                                                    }
                                                                                                    changeNetWeightByPktWt(this.value,'sellMetalB2');
                                                                                                    calculateSellPrice();
                                                                                                    return false;"
                                                                                            onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                        document.getElementById('slPrPacketWeightType').focus();
                                                                                                        return false;
                                                                                                    } else if (event.keyCode == 8 && this.value == '') {
                                                                                                        document.getElementById('slPrItemGSWT').focus();
                                                                                                        return false;
                                                                                                    }"
                                                                                            onclick="this.value = '';"
                                                                                            onfocus="document.getElementById('pktwt_label_box').style.visibility = 'visible';"
                                                                                            onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                                                                            autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="2" maxlength="20"  title="" style="width:100%;"/>
                                                                                    </td>
                                                                                    <td class="padLeft3" width="40%">
                                                                                        <select <?php
                                                                                        if ($staffId && ($array['sellPanelLesssWtAccess'] != 'true')) {
                                                                                            echo $staffAccessStr;
                                                                                        }
                                                                                        ?> id="slPrPacketWeightType" name="sttr_pkt_weight_type" title=""
                                                                                            onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                        document.getElementById('slPrItemNTW').focus();
                                                                                                        return false;
                                                                                                    } else if (event.keyCode == 8) {
                                                                                                        document.getElementById('slPrPacketWeight').focus();
                                                                                                        document.getElementById('slPrPacketWeight').value = '';
                                                                                                        return false;
                                                                                                    }"
                                                                                            class="form-control text-center form-control-font13" style="width:100%;">
                                                                                                <?php
                                                                                                if ($itemPKTWT != '') {
                                                                                                    $itemPktWtType = array(GM, KG, MG);
                                                                                                    for ($i = 0; $i <= 2; $i++)
                                                                                                        if ($itemPktWtType[$i] == $itemPKTWT)
                                                                                                            $optionPKTWTypeSel[$i] = 'selected';
                                                                                                } else {
                                                                                                    $optionPKTWTypeSel[0] = 'selected';
                                                                                                }
                                                                                                ?>

                                                                                            <option value="GM" <?php echo $optionPKTWTypeSel[0]; ?>>GM</option>
                                                                                            <option value="KG" <?php echo $optionPKTWTypeSel[1]; ?>>KG</option>
                                                                                            <option value="MG" <?php echo $optionPKTWTypeSel[2]; ?>>MG</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>


                                                                        <td align="left" class="" width="">
                                                                            <table border="0" cellspacing="1" cellpadding="1" width="">
                                                                                <tr>
                                                                                    <td align="left" class="">
                                                                                        <div name="box" id="ntwt_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                            NET WEIGHT
                                                                                        </div>
                                                                                        <input type="hidden" id="netWeight" name="netWeight" value="<?php echo $itemNTW; ?>" />
                                                                                        <input <?php echo $staffAccessStr; ?> id="slPrItemNTW" name="sttr_nt_weight" type="text" placeholder="NT WT" value="<?php echo $itemNTW; ?>"
                                                                                        <?php
                                                                                        /* ------------------------------------------------------------------------------------------------------- */
                                                                                        /* Start Code to Get Weight from Weighing Scale
                                                                                          /* ------------------------------------------------------------------------------------------------------- */
                                                                                        ?>
            <?php if ($_SESSION['sessionOwnIndStr'][16] == 'Y' && $checkWSComPortVal == 'true') { ?>

                                                                                                                                  onfocus="getWeightFromWeighingScale('slPrItemGSW', 'slPrItemNTW');"
                                                                                                                                  onclick="getWeightFromWeighingScale('slPrItemGSW', 'slPrItemNTW');"
                                                                                                                                  <?php
                                                                                                                              }
                                                                                                                              /* ------------------------------------------------------------------------------------------------------- */
                                                                                                                              /* End Code to Get Weight from Weighing Scale
                                                                                                                                /* ------------------------------------------------------------------------------------------------------- */
                                                                                                                              ?>   
                                                                                                                              onblur="javascript:document.getElementById('ntwt_label_box').style.visibility = 'hidden';
                                                                                                                                      if (document.getElementById('slPrItemNTW').value > 0) {
                                                                                                                                          calculateCustWastageWt();
                                                                                                                                          calculateSellPrice();
                                                                                                                                          return false;
                                                                                                                                      }"
                                                                                                                              onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                                          document.getElementById('slPrItemNTWT').focus();
                                                                                                                                          return false;
                                                                                                                                      } else if (event.keyCode == 8 && this.value == '') {
                                                                                                                                          document.getElementById('slPrPacketWeightType').focus();
                                                                                                                                          return false;
                                                                                                                                      }"
                                                                                                                              onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                                                                                              onfocus="document.getElementById('ntwt_label_box').style.visibility = 'visible';"
                                                                                                                              autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" 
                                                                                                                              size="10" maxlength="25" title="" style="width:90px;"/>
                                                                                    </td>
                                                                                    <td align="left" class="">
                                                                                        <select <?php echo $staffAccessStr; ?> id="slPrItemNTWT" name="sttr_nt_weight_type" title=""
                                                                                                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                                           document.getElementById('slPrItemWastage').focus();
                                                                                                                                           return false;
                                                                                                                                       } else if (event.keyCode == 8) {
                                                                                                                                           document.getElementById('slPrItemNTW').focus();
                                                                                                                                           return false;
                                                                                                                                       }"
                                                                                                                               onchange = "if ((document.getElementById('slPrItemNTW').value) > 0) {
                                                                                                                                           calculateSellPrice();
                                                                                                                                           return false;
                                                                                                                                       }"
                                                                                                                               class="form-control text-center form-control-font13" style="width: 35px;">
                                                                                                                                   <?php
                                                                                                                                   if ($itemNTWT != '') {
                                                                                                                                       $itemNtWtType = array(KG, GM, MG);
                                                                                                                                       for ($i = 0; $i <= 2; $i++)
                                                                                                                                           if ($itemNtWtType[$i] == $itemNTWT)
                                                                                                                                               $optionNTWTypeSel[$i] = 'selected';
                                                                                                                                   } else {
                                                                                                                                       $optionNTWTypeSel[1] = 'selected';
                                                                                                                                   }
                                                                                                                                   ?>
                                                                                            <option value="KG" <?php echo $optionNTWTypeSel[0]; ?>>KG</option>
                                                                                            <option value="GM" <?php echo $optionNTWTypeSel[1]; ?>>GM</option>
                                                                                            <option value="MG" <?php echo $optionNTWTypeSel[2]; ?>>MG</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>

                                                                        <td align="left" title="" width="4%">
                                                                            <div name="box" id="purity_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                PURITY / TUNCH
                                                                            </div>
                                                                            <input type="hidden" name="FirmTransferStatus" id="FirmTransferStatus" value=""/>
                                                                            <input type="hidden" name="PreviousFirmId" id="PreviousFirmId" value=""/>
                                                                            <div id ="itemTunchDiv" >
                                                                                <?php
                                                                                $tunchStyle = "width: 55px;";
                                                                                $tunchDivId = 'sttr_purity';
                                                                                $nextFieldId = 'slPrItemWastage';
                                                                                $prevFieldId = 'slPrItemNTWT';
                                                                                $netWeightFieldId = 'slPrItemNTW';
                                                                                $fineWeightFieldId = 'slPrItemFineWeight';
                                                                                $finalFineWeightFieldId = 'slPrItemFFineWeight';
                                                                                $tunchDivClass = 'form-control-select20-font12 placeholderClass';
                                                                                $metalType = $itst_metal_type;
                                                                                $TunchValue = $tunch;
                                                                                $itemDivCount = 'SellPurchase';
                                                                                $Access = 'NO';  // FOR PURITY READONLY @PRIYANKA-06FEB19
                                                                                include 'ogiatnch.php';
                                                                                ?>
                                                                            </div>
                                                                        </td>


            <?php if ($_SESSION['sessionStaffId'] == '' || $_SESSION['sessionStaffId'] == NULL) { ?>
                                                                            <td align="left" title="WASTAGE" width="4%">
                                                                                <div name="box" id="wastage_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                    WASTAGE
                                                                                </div>
                                                                                <input type="hidden" id="slPrItemWastageChanged" name="slPrItemWastageChanged" value="<?php echo $itemWastage; ?>" />
                                                                                <input <?php echo $staffAccessStr; ?> id="slPrItemWastage" name="sttr_wastage" 
                                                                                                                      type="text" placeholder="WSTG" style="width:100%;"
                                                                                                                      value="<?php
                                                                                                                      if ($itemWastage != '')
                                                                                                                          echo $itemWastage;
                                                                                                                      else
                                                                                                                          echo '0.00';
                                                                                                                      ?>" title="WASTAGE"
                                                                                                                      onkeydown="javascript:document.getElementById('valueAdd').value = 'false';
                                                                                                                              if (event.keyCode == 13) {
                                                                                                                                  document.getElementById('slPrFinalTunch').focus();
                                                                                                                                  return false;
                                                                                                                              } else if (event.keyCode == 8 && this.value == '') {
                                                                                                                                  document.getElementById('slPrItemGSW').focus();
                                                                                                                                  return false;
                                                                                                                              }"
                                                                                                                      onclick="this.value = '';"
                                                                                                                      onblur="if (this.value == '') {
                                                                                                                                  this.value = document.getElementById('slPrItemWastageChanged').value;
                                                                                                                              }

                                                                                                                              if (document.getElementById('sttr_purity').value != '') {
                                                                                                                                  document.getElementById('slPrFinalTunch').value = (parseFloat(this.value) + parseFloat(document.getElementById('sttr_purity').value));
                                                                                                                      <?php
                                                                                                                      if ($sellCustWastg != 'blank' && $sellCustWastg != 'addStock' && $sellCustWastg != 'lastEntry') {
                                                                                                                          ?>
                                                                                                                                      document.getElementById('slPrCustWastage').value = Math.abs(parseFloat(100 - (parseFloat(this.value) + parseFloat(document.getElementById('sttr_purity').value)))).toFixed(2);
                                                                                                                                      document.getElementById('slPrCustWastageChng').value = Math.abs(parseFloat(100 - (parseFloat(this.value) + parseFloat(document.getElementById('sttr_purity').value)))).toFixed(2);
                                                                                                                      <?php } ?>
                                                                                                                              }
                                                                                                                              document.getElementById('wastage_label_box').style.visibility = 'hidden';
                                                                                                                              calculateCustWastageWt();
                                                                                                                              calculateSellPrice();
                                                                                                                              return false;"
                                                                                                                      onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                                                                                      onfocus="document.getElementById('wastage_label_box').style.visibility = 'visible';"
                                                                                                                      autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="2" maxlength="15" />

                                                                            </td>
                                                                        <?php } ?>
            <?php if ($_SESSION['sessionStaffId'] == '' || $_SESSION['sessionStaffId'] == NULL) { ?>  
                                                                            <td align="left" width="4%">
                                                                                <div name="box" id="fpurity_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                    FINAL TUNCH
                                                                                </div>
                                                                                <input <?php echo $staffAccessStr; ?> <?php if ($purityAccessStr == 'NO') { ?>
                                                                                        readonly="readonly"
                <?php } ?>
                                                                                    id="slPrFinalTunch" name="sttr_final_purity" type="text" placeholder="F.PURITY" value ="<?php echo $itemFinalTunch; ?>" title="" 
                                                                                    onkeydown="document.getElementById('valueAdd').value = 'false';
                                                                                            javascript: if (event.keyCode == 13) {
                                                                                                document.getElementById('slPrCustWastage').focus();
                                                                                                return false;
                                                                                            } else if (event.keyCode == 8 && this.value == '') {
                                                                                                document.getElementById('slPrItemWastage').value = '';
                                                                                                document.getElementById('slPrItemWastage').focus();
                                                                                                return false;
                                                                                            }"
                                                                                    onkeyup="javascript: calculateSellPrice();
                                                                                            return  false;"
                                                                                    onblur="javascript:document.getElementById('fpurity_label_box').style.visibility = 'hidden';
                                                                                            calculateSellPrice();
                                                                                            return false;"
                                                                                    onkeypress="javascript:return valKeyPressedForNumNDot(event);" 
                                                                                    onfocus="document.getElementById('fpurity_label_box').style.visibility = 'visible';"  
                                                                                    autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="2" maxlength="15" /> 
                                                                            </td>
                                                                        <?php } ?>
            <?php if ($_SESSION['sessionStaffId'] == '' || $_SESSION['sessionStaffId'] == NULL) { ?>
                                                                            <td align="left" class="" title="" width="5%">
                                                                                <div name="box" id="cust_wast_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                    CUSTOMER WASTAGE
                                                                                </div>
                                                                                <!--Code to replace previous code for value in proper format @Author:SHRI03MAR15-->
                                                                                <input type="hidden" id="slPrCustWastageChng" name="slPrCustWastageChng" value="<?php echo $itemCustWastage; ?>" />
                                                                                <input <?php echo $staffAccessReadOnlyStr; ?> id="slPrCustWastage" name="sttr_cust_wastage" 
                                                                                                                              type="text" placeholder="CS.WS" 
                                                                                                                              value ="<?php echo $itemCustWastage; ?>" 
                                                                                                                              title="" 
                                                                                                                              onkeydown="document.getElementById('valueAdd').value = 'false';
                                                                                                                                      javascript: if (event.keyCode == 13) {
                                                                                                                                          document.getElementById('slPrCustWastageWt').focus();
                                                                                                                                          return false;
                                                                                                                                      } else if (event.keyCode == 8 && this.value == '') {
                                                                                                                                          document.getElementById('slPrItemWastage').focus();
                                                                                                                                          return false;
                                                                                                                                      }"  
                                                                                                                              ondblclick="javascript:
                                                                                                                                              if (event.keyCode != 8 && event.keyCode != 13) {
                                                                                                                                          sellCustWastageByWt('sellCustWastageSelDiv', 'sttr_cust_wastage', event.keyCode, 'MetalFormB2');
                                                                                                                                      }"
                                                                                                                              onblur="javascript:document.getElementById('cust_wast_label_box').style.visibility = 'hidden';
                                                                                                                                       if (document.getElementById('slPrItemNTW').value > 0) {
                                                                                                                                      calculateCustWastageWt();
                                                                                                      calculateSellPrice();
                                                                                                      return false;
                                                                                                  }"
                                                                                                                              onchange="javascript:
                                                                                                          if (document.getElementById('slPrItemNTW').value > 0) {
                                                                                                                                              calculateCustWastageWt();
                                                                                                      calculateSellPrice();
                                                                                                      return false;
                                                                                                  }"
                                                                                                                              onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                                                                                              onfocus="document.getElementById('cust_wast_label_box').style.visibility = 'visible';"
                                                                                                                              autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" 
                                                                                                                              size="3" maxlength="15" />
                                                                                <div id="sellCustWastageSelDiv" style=""/>
                                                                            </td>
                                                                        <?php } ?>
            <?php if ($_SESSION['sessionStaffId'] != '' && $_SESSION['sessionStaffId'] != NULL) { ?>

                                                                            <td align="left" title="TOTAL WASTAGE" width="8%" colspan="3">
                                                                                <input <?php echo $staffAccessStr; ?> 
                                                                                    id="slPrFinalTunch" name="sttr_final_purity" 
                                                                                    type="hidden" placeholder="F.PURITY" 
                                                                                    value ="<?php echo $itemFinalTunch; ?>" title="FINAL TUNCH" >
                                                                                <input type="hidden" <?php echo $staffAccessReadOnlyStr; ?> 
                                                                                       id="slPrCustWastage" name="sttr_cust_wastage"  
                                                                                       placeholder="CS.WS" value ="<?php echo $itemCustWastage; ?>">
                                                                                <input type="hidden" <?php echo $staffAccessReadOnlyStr; ?> 
                                                                                       id="slPrItemWastage" name="sttr_wastage" 
                                                                                       value="<?php echo $itemWastage; ?>" />

                                                                                <input <?php echo $staffAccessStr; ?> 
                                                                                    id="slprtotalwatg" name="slprtotalwatg" 
                                                                                    type="text" placeholder="TOT WSTG" 
                                                                                    value ="<?php
                                                                                    if ($itemWastage != '')
                                                                                        echo $itemWastage;
                                                                                    else
                                                                                        echo '0.00';
                                                                                    ?>" title="TOT WASTAGE"
                                                                                    onkeydown="javascript:document.getElementById('valueAdd').value = 'false';
                                                                                            if (event.keyCode == 13) {
                                                                                                document.getElementById('slPrFinalTunch').focus();
                                                                                                return false;
                                                                                            } else if (event.keyCode == 8 && this.value == '') {
                                                                                                document.getElementById('sttr_purity').focus();
                                                                                                return false;
                                                                                            }"
                                                                                    onclick="this.value = '';"
                                                                                    onblur="if (this.value == '') {
                                                                                                this.value = document.getElementById('slPrItemWastage').value;
                                                                                            }

                                                                                            if (document.getElementById('slPrCustWastage').value != '' && document.getElementById('slPrItemWastage').value != '') {
                                                                                                calculateSellPrice();
                                                                                            }
                                                                                            return false;"
                                                                                    onkeypress="javascript:return valKeyPressedForNumNDot(event);"                   
                                                                                    autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="2" maxlength="15" readonly/>

                                                                            </td>
            <?php } ?>
                                                                        <td align="left" class="" title="" width="5%">
                                                                            <div name="box" id="ffpurity_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                FINAL FINAL TUNCH
                                                                            </div>
                                                                            <!--Code to replace previous code for value in proper format @Author:SHRI03MAR15-->
                                                                            <?php
                                                                            $slffpurity = $_REQUEST['slffpurity'];
                                                                            ?>
                                                                            <input <?php echo $staffAccessReadOnlyStr; ?> id="slffpurity" name="slffpurity" type="text" placeholder="F.F.PUR" value ="<?php echo $slffpurity; ?>" title="CUSTOMER WASTAGE % &#10It Should be greater than final tunch of item !" 
                                                                                                                          onkeydown="document.getElementById('valueAdd').value = 'false';
                                                                                                                                  javascript: if (event.keyCode == 13) {
                                                                                                                                      document.getElementById('slPrCustWastageWt').focus();
                                                                                                                                      return false;
                                                                                                                                  } else if (event.keyCode == 8 && this.value == '') {
                                                                                                                                      document.getElementById('slPrFinalTunch').focus();
                                                                                                                                      return false;
                                                                                                                                  }"  

                                                                                                                          onblur="javascript: document.getElementById('ffpurity_label_box').style.visibility = 'hidden';
                                                                                                                                  if (document.getElementById('slPrFinalTunch').value > 0) {
                                                                                                                                      //                                                                                                                                                  alert(this.value);
                                                                                                                                      calculateSellPrice();
                                                                                                                                      return false;
                                                                                                                                  }"
                                                                                                                          onfocus="document.getElementById('ffpurity_label_box').style.visibility = 'visible';"               
                                                                                                                          onkeypress="javascript:return valKeyPressedForNumNDot(event);"                
                                                                                                                          autocomplete="off" spellcheck="false" class="form-control text-center form-control-font13" size="3" maxlength="15" readonly/>
                                                                            <!--<div id="sellCustWastageSelDiv" style=""/>-->
                                                                        </td>
                                                                        <?php
                                                                        //
                                                                        //
                                                                        //echo '$itemWastage : ' . $itemWastage . '<br />';
                                                                        //echo '$itemCustWastage : ' . $itemCustWastage . '<br />';
                                                                        //echo '$sttr_cust_wastage_wt : ' . $sttr_cust_wastage_wt . '<br />';            
                                                                        //
                                                                        //
                                                                        ?>   
                                                                        <td align="left" title="" width="5%">
                                                                            <div name="box" id="cust_ws_st_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                CUST WASTAGE WT
                                                                            </div>
                                                                            <input <?php echo $staffAccessStr; ?> id="slPrCustWastageWt" name="sttr_cust_wastage_wt" 
                                                                                                                  type="text" 
                                                                                                                  placeholder="CS.WS.WT" 
                                                                                                                  value="<?php echo $sttr_cust_wastage_wt; ?>" 
                                                                                                                  title="" 
                                                                                                                  onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                              document.getElementById('slPrItemLabCharges').focus();
                                                                                                                              return false;
                                                                                                                          } else if (event.keyCode == 8 && this.value == '') {
                                                                                                                              document.getElementById('slPrCustWastage').focus();
                                                                                                                              return false;
                                                                                                                          }"
                                                                                                                  onclick="this.value = '';"     
                                                                                                                  onblur = "javascript:document.getElementById('cust_ws_st_label_box').style.visibility = 'hidden';
                                                                                                                          if (this.value == '') {
                                                                                                                              this.value = '<?php echo $sttr_cust_wastage_wt; ?>';
                                                                                                                          }
                                                                                                                          if (document.getElementById('slPrItemNTW').value > 0) {
                                                                                                                            calculateSellPrice();
                                                                                                                              return false;
                                                                                                                          }"

                                                                                                                  onchange ="javascript:
                                                                                                                                  if (document.getElementById('slPrItemNTW').value > 0) {
                                                                                                                                calculateSellPrice();
                                                                                                                              return false;
                                                                                                                          }"
                                                                                                                  onkeypress="javascript:return valKeyPressedForNumNDot(event);" 
                                                                                                                  onfocus="document.getElementById('cust_ws_st_label_box').style.visibility = 'visible';"
                                                                                                                  autocomplete="off" spellcheck="false" 
                                                                                                                  class="form-control text-center form-control-font13" size="4" maxlength="15" />
                                                                        </td>



                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <!--                                                                        <td align="left" width="4%" title="FINE WEIGHT&NewLine;Double click to Calculate Final Valuation by Gross or Net Weight !">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input <?php echo $staffAccessStr; ?> 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    id="slPrItemFineWeight" name="sttr_fine_weight" 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    type="text" placeholder="FN WT" value="<?php echo $slpr_fine_wt; ?>"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ondblclick ="if (event.keyCode != 8 && event.keyCode != 13) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          getItemPurchaseFfnWt('itemFfineWtSelDiv', 'slPrItemFineWeight', event.keyCode);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      }"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      spellcheck="false" 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      class="form-control-height20 placeholderClass" 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      size="14" maxlength="20" readonly="true"/>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div id="itemFfineWtSelDiv"></div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </td>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td align="left" width="4%" title="FINAL FINE WEIGHT">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input type="text" <?php echo $staffAccessStr; ?> 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       id="slPrItemFFineWeight" name="sttr_final_fine_weight" 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       value="<?php echo $slpr_final_fine_wt; ?>"  placeholder="FFN WT" 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       spellcheck="false" class="form-control-height20 placeholderClass" 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       size="14" maxlength="15" readonly/>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </td>-->
                                                                        <!--
                                                                                                                                                <td style="width: 7%">
                                                                                                                                                    <table>
                                                                                                                                                        <tr>-->
                                                                        <td align="left" width="4%" title="">
                                                                            <div name="box" id="finwt_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                FINE WEIGHT
                                                                            </div>
                                                                            <input <?php echo $staffAccessStr; ?> 
                                                                                style=""
                                                                                id="slPrItemFineWeight" name="sttr_fine_weight" 
                                                                                type="text" placeholder="FN WT" value="<?php echo $slpr_fine_wt; ?>"
                                                                                ondblclick ="if (event.keyCode != 8 && event.keyCode != 13) {
                                                                                            getItemPurchaseFfnWt('itemFfineWtSelDiv', 'slPrItemFineWeight', event.keyCode);
                                                                                        }"
                                                                                onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                                                spellcheck="false" 
                                                                                onblur="document.getElementById('finwt_label_box').style.visibility = 'hidden';"
                                                                                onfocus="document.getElementById('finwt_label_box').style.visibility = 'visible';"
                                                                                class="form-control text-center form-control-font13" 
                                                                                size="14" maxlength="20" readonly="true"/>
                                                                            <div id="itemFfineWtSelDiv"></div>
                                                                        </td>

                                                                        <td align="left" width="5%" title="">
                                                                            <div name="box" id="ffinwt_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                FINAL FINE WEIGHT
                                                                            </div>
                                                                            <input type="text" <?php echo $staffAccessStr; ?> 
                                                                                   style=""
                                                                                   id="slPrItemFFineWeight" name="sttr_final_fine_weight" 
                                                                                   value="<?php echo $slpr_final_fine_wt; ?>"  placeholder="FFN WT" 
                                                                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"
                                                                                   onblur="document.getElementById('ffinwt_label_box').style.visibility = 'hidden';"
                                                                                   onfocus="document.getElementById('ffinwt_label_box').style.visibility = 'visible';"
                                                                                   spellcheck="false" class="form-control text-center form-control-font13" 
                                                                                   size="14" maxlength="15" readonly/>
                                                                        </td>

                                                                        <!--                                                                                </tr>
                                                                                                                                                    </table>
                                                                                                                                                </td>-->
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <td align="left" title="" colspan="3">
                                                                            <div name="box" id="othinfo_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                OTHER INFO
                                                                            </div>
                                                                            <input type="hidden" id="addItemOtherInfoChanged" name="addItemOtherInfoChanged" 
                                                                                   value="<?php echo $sttr_other_info; ?>" />
                                                                            <input <?php echo $staffAccessStr; ?> style="" id="sttr_other_info" name="sttr_other_info" 
                                                                                                                  type="text" placeholder="OTHER INFO" 
                                                                                                                  value="<?php echo $sttr_other_info; ?>"
                                                                                                                  onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                              document.getElementById('slPrItemSize').focus();
                                                                                                                              return false;
                                                                                                                          } else if (event.keyCode == 8 && this.value == '') {
                                                                                                                              document.getElementById('addItemLbNOthCh').focus();
                                                                                                                              return false;
                                                                                                                          }"
                                                                                                                  onblur="document.getElementById('othinfo_label_box').style.visibility = 'hidden'
                                                                                                                          if (this.value == '') {
                                                                                                                              this.value = document.getElementById('addItemOtherInfoChanged').value;
                                                                                                                          }
                                                                                                                          if (document.getElementById('slPrItemNTW').value != '') {
                                                                                                                              calculateSellPrice();
                                                                                                                              return false;
                                                                                                                          }" 
                                                                                                                  onfocus="document.getElementById('othinfo_label_box').style.visibility = 'visible';"
                                                                                                                  spellcheck="false" class="form-control text-center form-control-font13"
                                                                                                                  maxlength="50" title="" />

                                                                        </td>
                                                                        <td align="left" title="" colspan="3">
                                                                            <div name="box" id="size_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                SIZE / LENGTH
                                                                            </div>
            <?php // echo '$itst_item_size'.$itst_item_size;     ?>
                                                                            <input <?php echo $staffAccessStr; ?> style="" id="slPrItemSize" name="sttr_size" 
                                                                                                                  type="text" placeholder="SIZE / LENGTH" 
                                                                                                                  value="<?php echo $itst_item_size; ?>"
                                                                                                                  onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                              document.getElementById('sttr_fine_weight').focus();
                                                                                                                              return false;
                                                                                                                          } else if (event.keyCode == 8 && this.value == '') {
                                                                                                                              document.getElementById('addItemLbNOthCh').focus();
                                                                                                                              return false;
                                                                                                                          }"
                                                                                                                  onblur="document.getElementById('size_label_box').style.visibility = 'hidden';
                                                                                                                          if (this.value == '') {
                                                                                                                              this.value = document.getElementById('addItemOtherInfoChanged').value;
                                                                                                                          }
                                                                                                                          if (document.getElementById('slPrItemNTW').value != '') {
                                                                                                                              calculateSellPrice();
                                                                                                                              return false;
                                                                                                                          }"
                                                                                                                  onfocus="document.getElementById('size_label_box').style.visibility = 'visible';"
                                                                                                                  spellcheck="false" class="form-control text-center form-control-font13"
                                                                                                                  maxlength="50" title="" />

                                                                        </td>
            <?php //echo '$itst_item_cust_lbcrg == ' . $itst_item_cust_lbcrg . '<br />';      ?>
                                                                        <td align="left" title="" width="13%">
                                                                            <div name="box" id="mkgchrg_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                MAKING CHARGES
                                                                            </div>
                                                                            <table border="0" cellspacing="1" cellpadding="0">
                                                                                <tr>
                                                                                    <td>
                                                                                        <!-- START CODE for Making Charges apply on GS WT, NT WT or FFine WT @PRIYANKA-28MAR18 -->
                                                                                        <input <?php echo $staffAccessStr; ?> id="slPrItemLabCharges" name="sttr_making_charges" 
                                                                                                                              type="text" placeholder="MKG CH" 
                                                                                                                              value="<?php echo $itst_item_cust_lbcrg; ?>"
                                                                                                                              onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                                          document.getElementById('slPrItemLabChargesType').focus();
                                                                                                                                          return false;
                                                                                                                                      } else if (event.keyCode == 8 && this.value == '') {
                                                                                                                                          document.getElementById('slPrCustWastageWt').focus();
                                                                                                                                          return false;
                                                                                                                                      }"
                                                                                                                              onblur="javascript:document.getElementById('mkgchrg_label_box').style.visibility = 'hidden';
                                                                                                                                      if (document.getElementById('slPrItemGSW').value != '') {
                                                                                                                                          calculateSellPrice();
                                                                                                                                          return false;
                                                                                                                                      }"
                                                                                                                              ondblclick ="if (event.keyCode != 8 && event.keyCode != 13) {
                                                                                                                                          getItemMkgChrgsByWt('itemMkgChrgsSelDiv', 'SellPanel', event.keyCode);
                                                                                                                                      }"
                                                                                                                              onfocus="document.getElementById('mkgchrg_label_box').style.visibility = 'visible';"
                                                                                                                              onkeypress="javascript:return valKeyPressedForNumNDot(event);"                       
                                                                                                                              spellcheck="false" autocomplete="off" 
                                                                                                                              class="form-control text-center form-control-font13" 
                                                                                                                              size="8" maxlength="10" title="MAKING CHARGES" style="width: 132px;"/>
                                                                                        <!-- END CODE for Making Charges apply on GS WT, NT WT or FFine WT @PRIYANKA-28MAR18 -->
                                                                                        <div id="itemMkgChrgsSelDiv"></div>
                                                                                    </td>

                                                                                    <td>
                                                                                        <select <?php echo $staffAccessStr; ?> id="slPrItemLabChargesType" name="sttr_making_charges_type" 
                                                                                                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                                           document.getElementById('addItemLbNOthCh').focus();
                                                                                                                                           return false;
                                                                                                                                       } else if (event.keyCode == 8) {
                                                                                                                                           document.getElementById('slPrItemLabCharges').focus();
                                                                                                                                           return false;
                                                                                                                                       }"
                                                                                                                               onchange="javascript: if (document.getElementById('slPrItemLabCharges').value != '') {
                                                                                                                                           calculateSellPrice();
                                                                                                                                           return false;
                                                                                                                                       }"
                                                                                                                               class="form-control text-center form-control-font13" title="" style="width: 43px;">
                                                                                                                                   <?php
                                                                                                                                   if ($itemCustLabChrgT != '') {
                                                                                                                                       $itemCustLabChType = array(PP, GM, MG, KG, per, Fixed);
                                                                                                                                       for ($i = 0; $i <= 5; $i++)
                                                                                                                                           if ($itemCustLabChType[$i] == $itemCustLabChrgT)
                                                                                                                                               $optionCustLabChTypeSel[$i] = 'selected';
                                                                                                                                   } else {
                                                                                                                                       $optionCustLabChTypeSel[0] = 'selected';
                                                                                                                                   }
                                                                                                                                   ?>
                                                                                            <option value="PP" <?php echo $optionCustLabChTypeSel[0]; ?>>PP</option>
                                                                                            <option value="GM" <?php echo $optionCustLabChTypeSel[1]; ?>>GM</option>
                                                                                            <option value="MG" <?php echo $optionCustLabChTypeSel[2]; ?>>MG</option>                                                                
                                                                                            <option value="KG" <?php echo $optionCustLabChTypeSel[3]; ?>>KG</option>
                                                                                            <option value="per" <?php echo $optionCustLabChTypeSel[4]; ?>>%</option>
                                                                                            <option value="Fixed" <?php echo $optionCustLabChTypeSel[5]; ?>>FX</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>

            <?php //echo '$sttr_total_making_charges == ' . $sttr_total_making_charges . '<br />';      ?>
                                                                        <td align="left" width="9%" title="">
                                                                            <div name="box" id="tot_mkg_disc_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                TOTAL OF MAKING CHARGES
                                                                            </div>
                                                                            <input  id="addItemLbNOthCh" name="sttr_total_making_charges" 
                                                                                    type="text" placeholder="TOT MKG CH" 
                                                                                    value="<?php echo $sttr_total_making_charges; ?>"
                                                                                    onkeydown="
                                                                                            document.getElementById('valueAdd').value = 'false';
                                                                                            javascript: if (event.keyCode == 13) {
                                                                                                document.getElementById('sttr_other_charges').focus();
                                                                                                return false;
                                                                                            } else if (event.keyCode == 8 && this.value == '') {
                                                                                                document.getElementById('slPrItemLabChargesType').focus();
                                                                                                return false;
                                                                                            }"
                                                                                    onblur="document.getElementById('tot_mkg_disc_label_box').style.visibility = 'hidden';
                                                                                            calculateSellPrice();"
                                                                                    onfocus="document.getElementById('tot_mkg_disc_label_box').style.visibility = 'visible';"
                                                                                    onkeypress="javascript:return valKeyPressedForNumNDot(event);"                    
                                                                                    spellcheck="false" class="form-control text-center form-control-font13" 
                                                                                    size="2" maxlength="20" />
                                                                        </td>
                                                                        <td colspan="1">
                                                                            <table cellpadding="0" cellspacing="0">
                                                                                <tr>
                                                                                    <td title="">
                                                                                        <div name="box" id="othchrg_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                            OTHER CHARGES
                                                                                        </div>
                                                                                        <input <?php echo $staffAccessStr; ?> id="sttr_other_charges" name="sttr_other_charges" 
                                                                                                                              type="text" placeholder="OTH CHRGS" 
                                                                                                                              value="<?php echo $sttr_other_charges; ?>"

                                                                                                                              onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                                          document.getElementById('sttr_other_charges_type').focus();
                                                                                                                                          return false;
                                                                                                                                      } else if (event.keyCode == 8 && this.value == '') {
                                                                                                                                          document.getElementById('slPrItemLabCharges').focus();
                                                                                                                                          return false;
                                                                                                                                      }"
                                                                                                                              onblur="document.getElementById('othchrg_label_box').style.visibility = 'hidden';
                                                                                                                                      if (this.value == '') {
                                                                                                                                          this.value = document.getElementById('addItemOtherChrgsChanged').value;
                                                                                                                                      }
                                                                                                                                      if (document.getElementById('slPrItemGSW').value != '') {
                                                                                                                                          calculateSellPrice();
                                                                                                                                          return false;
                                                                                                                                      }"
                                                                                                                              onfocus="document.getElementById('othchrg_label_box').style.visibility = 'visible';"
                                                                                                                              onkeypress="javascript:return valKeyPressedForNumNDot(event);"                       
                                                                                                                              spellcheck="false" class="form-control text-center form-control-font13"
                                                                                                                              maxlength="10" title="" size="8" 
                                                                                                                              style="width:127px;"/>
                                                                                    </td>
                                                                                    <td title="" align="left" class="padLeft3">
                                                                                        <select <?php echo $staffAccessStr; ?> id="sttr_other_charges_type" name="sttr_other_charges_type" 
                                                                                                                               onkeydown="javascript: if (event.keyCode == 13) {
                                                                                                                                           document.getElementById('sttr_total_other_charges').focus();
                                                                                                                                           return false;
                                                                                                                                       } else if (event.keyCode == 8) {
                                                                                                                                           document.getElementById('sttr_other_charges').focus();
                                                                                                                                           document.getElementById('sttr_other_charges').value = '';
                                                                                                                                           return false;
                                                                                                                                       }"
                                                                                                                               onchange="javascript: if (document.getElementById('sttr_other_charges').value != '') {
                                                                                                                                           calculateSellPrice();
                                                                                                                                           return false;
                                                                                                                                       }"
                                                                                                                               class="form-control text-center form-control-font13" title="" style="width:43px;">
                                                                                                                                   <?php
                                                                                                                                   if ($sttr_other_charges_type != '' && $sttr_other_charges_type != null) {
                                                                                                                                       $itemOtherChrgsType = array(GM, KG, MG, PP, per, Fixed);
                                                                                                                                       for ($i = 0; $i <= 5; $i++)
                                                                                                                                           if ($itemOtherChrgsType[$i] == $sttr_other_charges_type)
                                                                                                                                               $optionOtherChargesTypeSel[$i] = 'selected';
                                                                                                                                   } else {
                                                                                                                                       $optionOtherChargesTypeSel[0] = 'selected';
                                                                                                                                   }
                                                                                                                                   ?>
                                                                                            <option value="GM" <?php echo $optionOtherChargesTypeSel[0]; ?>>GM</option>
                                                                                            <option value="KG" <?php echo $optionOtherChargesTypeSel[1]; ?>>KG</option>
                                                                                            <option value="MG" <?php echo $optionOtherChargesTypeSel[2]; ?>>MG</option>
                                                                                            <option value="PP" <?php echo $optionOtherChargesTypeSel[3]; ?>>PP</option>
                                                                                            <option value="per" <?php echo $optionOtherChargesTypeSel[4]; ?>>%</option>
                                                                                            <option value="Fixed" <?php echo $optionOtherChargesTypeSel[5]; ?>>FX</option>
                                                                                        </select>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td align="left" title="" colspan="2">
                                                                            <div name="box" id="tot_oth_label_box" class="hidden_box" style="visibility:hidden;"> 
                                                                                TOT OTHER CHRG
                                                                            </div>
                                                                            <input <?php echo $staffAccessReadOnlyStr; ?> id="sttr_total_other_charges" name="sttr_total_other_charges" 
                                                                                                                          type="text" value="<?php echo $sttr_total_other_charges; ?>" 
                                                                                                                          placeholder="TOT OTH CHRG" 
                                                                                                                          style=""
                                                                                                                          onkeydown="
                                                                                                                                  document.getElementById('valueAdd').value = 'false';
                                                                                                                                  javascript: if (event.keyCode == 13) {
                                                                                                                                      document.getElementById('metaltSlPrSubButt').focus();
                                                                                                                                      return false;
                                                                                                                                  } else if (event.keyCode == 8 && this.value == '') {
                                                                                                                                      document.getElementById('sttr_other_charges_type').focus();
                                                                                                                                      return false;
                                                                                                                                  }"
                                                                                                                          onblur="<?php if (!$staffAccessReadOnly) { ?>changeSlPrMetalRateByVal();<?php } ?>
                                                                                                                                  document.getElementById('tot_oth_label_box').style.visibility = 'hidden';
                                                                                                                                  calculateSellPrice();
                                                                                                                                  return false;"
                                                                                                                          onkeypress="javascript:return valKeyPressedForNumNDot(event);" 
                                                                                                                          onfocus="document.getElementById('tot_oth_label_box').style.visibility = 'visible';"
                                                                                                                          spellcheck="false" class="form-control text-center form-control-font13" 
                                                                                                                          size="10" maxlength="30" />
                                                                        </td>
                                                                        <td align="left" colspan="2"></td>
                                                                        <td colspan="5">
                                                                            <table border="0" cellspacing="0" cellpadding="0" width="100%" align="left">
                                                                                <tr>
                                                                                    <?php if ($accAccess != 'NO') { ?>
                <?php if ($sellPanelName != 'EstimateUpdate' && $sellPanelName != 'EstimatePayUp') { ?>
                                                                                            <td align="left">

                                                                                                <input type="hidden" id="webcam_file" name="webcam_file" class="image-tag">
                                                                                                <input type="text" id="fileName" name="fileName" value="<?php echo $image_snap_fname; ?>"
                                                                                                       class="lgn-txtfield-without-borderAndBackground" readonly="readonly" size="9"/>
                                                                                                <input type="hidden" id="imageLoadOption" name="imageLoadOption" />
                                                                                                <input type="hidden" id="compressedImage" name="compressedImage" />
                                                                                                <input type="hidden" id="compressedImageThumb" name="compressedImageThumb" />
                                                                                                <input type="hidden" id="compressedImageSize" name="compressedImageSize" />



                                                                                            </td>
                                                                                            <td align="right">
                                                                                                <div id="file_input_div" style="margin-top:5px;">
                                                                                                    <div class="file_item_input_div" align="right">
                                                                                                        <input type="button" value="" alt="COM" id="ComputerButt" class="frm-btn-computer24" 
                                                                                                               onclick="javascript: document.getElementById('imageLoadOption').value = 'COM';" onsubmit="return false;" />
                                                                                                        <input type="file" id="addItemSelectPhoto"
                                                                                                               style="cursor: pointer;" name="addItemSelectPhoto"
                                                                                                               class="file_input_hidden_gItem"
                                                                                                               onclick="javascript: document.getElementById('imageLoadOption').value = 'COM';"
                                                                                                               onchange="javascript: document.getElementById('fileName').value = this.value;" onsubmit="return false;" />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div id="webcam_input_div" align="center" ></div>
                                                                                            </td>
                    <!--                                                                                            <td align="right">
                                                                                                <input type="submit" value="" alt="WEB" class="frm-btn-webcam24" id="WebcamButt" name="WebcamButt" size="1" 
                                                                                                       onclick="chngStockImgLoadOpt(this.alt, '<?php echo $mainPanel; ?>', '', '<?php echo $documentRootBSlash; ?>');
                                                                                                                                   return false;" onsubmit="return false;"/>
                                                                                            </td>-->

                                                                                            <td align="center">
                                                                                                <button type="submit"  class="frm-btn-webcam24" id="TakeWebcamImage" name="TakeWebcamImage" size="1" 
                                                                                                        onclick="getWebcamImageDiv('', 'file_input_div', 'Webcam');
                                                                                                                return false;" onsubmit="return false;"/>
                                                                                                </button>
                                                                                            </td>

                                                                                                                                                                                                                                                                    <!--<td>
                                                                                                                                                                                                                                                                            STONE
                                                                                                                                                                                                                                                                        </td>-->

                <?php } ?>

                                                                                        <td valign="middle" align="center">
                                                                                            <a style="cursor: pointer;" onclick ="getCrystalFunc('', 'addStockCrystalDiv', '<?php echo $mainPanel; ?>', 'SellPurchase');">
                                                                                                <img src="<?php echo $documentRoot; ?>/images/img/diamond-icon.png" alt="" onload="<?php if ($simItem == 'SimilarItem' || $panelSimilarDiv == 'SimilarItem') { ?>
                                                                                                        document.getElementById('addItemGrossWeight').focus();
                                                                                                    <?php
                                                                                                } if ($sellPanelName == 'SellDetUpPanel' || $sellPanelName == 'EstimateUpdate' ||
                                                                                                        $sellPanelName == 'EstimatePayUp' ||
                                                                                                        $sellPanelName == 'SellPayUp' || $sellPanelName == 'StockPurchasePanel') {
                                                                                                    ?>
                                                                                                        calculateSellPrice();
                                                                                                        calcSellCryPrice();
                                                                                                        return false;
                <?php } ?>"/>
                                                                                            </a>
                                                                                        </td>
            <?php } ?>
                                                                            </table>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td colspan="20">
                                                                            <div id="addStockCrystalDiv">
                                                                                <?php
                                                                                if ($sellPanelName == 'SellDetUpPanel') {
                                                                                    $crystalpanelName = 'SellDetUpPanel';
                                                                                    if ($sttr_transaction_type == 'ESTIMATESELL') {
                                                                                        $sttr_transaction_type = 'ESTIMATESELL';
                                                                                    } else {
                                                                                        $sttr_transaction_type = 'sell';
                                                                                    }
                                                                                } else if ($sellPanelName == 'SellPayUp') {
                                                                                    $crystalpanelName = 'SellPayUp';
                                                                                    if ($sttr_transaction_type == 'ESTIMATESELL') {
                                                                                        $sttr_transaction_type = 'ESTIMATESELL';
                                                                                    } else {
                                                                                        $sttr_transaction_type = 'sell';
                                                                                    }
                                                                                } else if ($sellPanelName == 'EstimateUpdate' || $sellPanelName == 'EstimatePayUp') {
                                                                                    $crystalpanelName = $sellPanelName;
                                                                                } else {
                                                                                    if ($panelName == 'Estimate') {
                                                                                        $crystalpanelName = 'slPrCrystalAdd';
                                                                                        $sttr_transaction_type = 'ESTIMATE';
                                                                                    } else {
                                                                                        $crystalpanelName = 'slPrCrystalAdd';
                                                                                        if ($sttr_transaction_type == 'ESTIMATESELL') {
                                                                                            $sttr_transaction_type = 'ESTIMATESELL';
                                                                                        } else {
                                                                                            $sttr_transaction_type = 'sell';
                                                                                        }
                                                                                    }
                                                                                }

                                                                                //echo '$noOfCry == '.$noOfCry;

                                                                                if ($noOfCry > 0) {
                                                                                    if ($sttr_transaction_type == 'ESTIMATESELL') {
                                                                                        $$_REQUEST = 'ESTIMATESELL';
                                                                                    } else {
                                                                                        $$_REQUEST = 'sell';
                                                                                    }
                                                                                    include 'ogslcydv.php';
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" class="paddingTop4 padBott4">
                                                                <div class="hrGold"></div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        if ($sellPanelName != 'SellItemReturn' &&
                                                                $sellPanelName != 'SellItemReturnUp') {
                                                            ?>
                                                            <tr>
                                                                <td align="center" width="100%">

                                                                    <?php
                                                                    $qSelItemCount = "SELECT sttr_id FROM stock_transaction WHERE sttr_indicator = 'stock' "
                                                                            . "and sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_status NOT IN ('DELETED') "
                                                                            . "and sttr_owner_id = '$_SESSION[sessionOwnerId]'";
                                                                    $resItemCount = mysqli_query($conn, $qSelItemCount);
                                                                    $totalItem = mysqli_num_rows($resItemCount);

                                                                    if (($_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) && $totalItem >= 10) {
                                                                        ?>
                                                                        <div class = "main_link_red_12">In Demo, You can not add more than five items. To add more items, please purchase the product!</div>
                                                                        <?php
                                                                    } else if ($_SESSION['sessionDongleStatus'] != NULL &&
                                                                            (($_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) && $totalItem < 10) ||
                                                                            ((($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM) ||
                                                                            ($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD)) &&
                                                                            ($_SESSION['sessionDongleStatus'] == $gbDongleRegStatus))) {
                                                                        ?>
                                                                        <div id="slPrSubButtDiv">
                                                                            <button class="btn btn1 btn1Hover" id="metaltSlPrSubButt" name="metaltSlPrSubButt" onclick="getCRDRAccountID('<?php echo $custId; ?>', document.getElementById('firmId').value, document.getElementById('sttr_account_id').value, '');"
                                                                                    style="height:30px;width:120px;border-radius:5px!important;font-weight:bold;font-size:16px;padding-top:0px;text-align:center;color:#1a971a;background:#dfd;border: 1px solid #a2d8a2;">
                                                                                <span><?php
                                                                                    if ($sellPanelName == 'SellDetUpPanel' || $sellPanelName == 'EstimateUpdate' ||
                                                                                            $sellPanelName == 'EstimatePayUp' ||
                                                                                            $sellPanelName == 'SellPayUp' || $sellPanelName == 'finalOrderUp') {

                                                                                        if ($sellPanelName == 'EstimateUpdate' || $sellPanelName == 'EstimatePayUp') {
                                                                                            echo 'UPDATE ESTIMATE';
                                                                                        } else {
                                                                                            echo 'UPDATE';
                                                                                        }
                                                                                    } else {
                                                                                        echo 'SUBMIT';
                                                                                    }
                                                                                    ?>
                                                                                </span>
                                                                                <?php
                                                                                if ($autoEntry == 'YES' && $sellPanelName != 'SellPayUp' &&
                                                                                        $sellPanelName != 'EstimateUpdate' && $sellPanelName != 'EstimatePayUp' &&
                                                                                        $sellPanelName != 'SellDetUpPanel' && $sellPanelName != 'finalOrderUp') {
                                                                                    ?>

                                                                                    <img src="<?php echo $documentRoot; ?>/images/sell_Purchase16.png" width="0.01px" 
                                                                                         onload="document.getElementById('slPrDiv').style.display = 'none';
                                                                                                 calculateSellPrice();
                                                                                                 document.getElementById('sell_purchase').submit();" />
                    <?php } ?>
                                                                            </button>
                                                                        </div>
                <?php } ?>

                                                                </td>
                                                            </tr>
            <?php } ?>
                                                        <tr>
                                                            <td align="center" width="100%">

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
        <?php } ?>
                                </div>
                            </form>
                    </td>
                </tr>
            </table>
    <?php } ?>
        <table align="center" border="0" cellspacing="0" cellpadding="0" width="99.6%"> 
            <tr>
                <td align="center" colspan="16">
                    <div id="slPrCurrentInvoice"> 
                        <?php
                        if ($panelName != 'Estimate' && $sellPanelName != 'EstimateUpdate' && $sellPanelName != 'EstimatePayUp') {
                            if ($autoEntry == 'YES' && $sellPanelName == '') {
                                $payPanelName = 'SlPrPayment';
                                $payPreInvoiceNo = $slPrPreInvoiceNo;
                                $payInvoiceNo = $slPrInvoiceNo;
                                include 'omspindv.php';
                            } else {
                                $panelName = 'ItemSearchPanel';
                                $payPanelName = 'SlPrPayment';
                                include 'omspindv.php';
                            }
                        }
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
<?php } ?>