<?php
/*
 * **************************************************************************************
 * @tutorial: RECEIVED STOCK HUID UPDATE FILE @PRIYANKA-13NOV2021
 * **************************************************************************************
 * 
 * Created on NOV 13, 2021 04:12:00 PM
 *
 * @FileName: omUpdateRetailStockHUID.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.96
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-13NOV2021
 *  REASON:
 *
 */
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
//
$currentFileName = basename(__FILE__);
//
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
include 'ommpsbac.php';
//
$staffId = $_SESSION['sessionStaffId'];
//
?>
<?php
//
//print_r($_REQUEST);
//
$hallmarkFieldFocus = 'YES';
//
// START CODE TO CALL OMLAYOUTTABLE TO SET PANEL *************/
$selStockPurOption = callOmLayoutTable('StockTypOption', '', 'select');
//
if ($selStockPurOption == '')
    callOmLayoutTable('StockTypOption', 'retailStock', 'insert');
else
    callOmLayoutTable('StockTypOption', 'retailStock', 'update');
// END CODE TO CALL OMLAYOUTTABLE TO SET PANEL *************/
//
$sessionOwnerId = $_SESSION[sessionOwnerId];
$mainPanel = 'AddStockPanel';
$bcPrintMainPanel = 'StockPanel';
//
if ($stockPanelName != 'RETAIL_FINE_B2_UPDATE' && $stockPanelName != 'updateCatalogueStock') {
    $stockPanelName = $_GET['panelName'];
    $panelSimilarDiv = $stockPanelName;
}
//
//
// START CODE TO CHECK STAFF ACESS AT ITEM UPDATE ***********/
if ($stockPanelName == 'UpdateStock' || $stockPanelName == 'StockPayUp' || 
    $stockPanelName == 'RETAIL_FINE_B2_UPDATE' || $stockPanelName == 'updateCatalogueStock') {
    if ($staffId && $array['updateStockAccess'] != 'true') {
        echo "<div class=" . "erMessage" . ">~ You do not have Access for this Panel ~" . " </br> " . " Please Contact To Your Administrator !</div>";
        exit(0);
    }
}
// END CODE TO CHECK STAFF ACESS AT ITEM UPDATE ********** */
//
// START CODE TO GET VALUES FROM JS ********** */
if ($sttrId == '' || $sttrId == NULL) {
    $sttrId = $_REQUEST['sttrId'];
}
// END CODE TO GET VALUES FROM JS ********** */
//
//
//echo '$sttrId = '.$sttrId.'<br />';
//echo '$stockPanelName = '.$stockPanelName.'<br />';
//
//
// START CODE TO GET TABLE VALUES WHILE UPDATE STOCK AND SIMILLAR ITEM********** */
if ($stockPanelName == 'SimilarItem' || $stockPanelName == 'UpdateStock' || 
    $stockPanelName == 'StockPayUp' || $stockPanelName == 'RETAIL_FINE_B2_UPDATE') {
    //
    if ($stockPanelName == 'SimilarItem') {
        //
        $conditionStr = " sttr_owner_id = '$sessionOwnerId' AND sttr_indicator = 'stock' order by sttr_id desc LIMIT 0,1 ";
        $uniqueIdCondStr = " sttr_owner_id = '$sessionOwnerId' AND sttr_indicator = 'stock' order by sttr_id desc LIMIT 0,1 ";
        $sttr_hallmark_uid = '';
        //
    } 
    else if ($stockPanelName == 'UpdateStock' || $stockPanelName == 'StockPayUp' || 
             $stockPanelName == 'RETAIL_FINE_B2_UPDATE') {
        //
        $conditionStr = " sttr_owner_id = '$sessionOwnerId' AND sttr_id = '$sttrId' "
                      . " AND sttr_stock_type IN ('retail') AND sttr_indicator = 'stock'";
        //
        $uniqueIdCondStr = " sttr_owner_id = '$sessionOwnerId' and sttr_id = '$sttrId'";
        //
    }
    //
    //
    //echo '$conditionStr = '.$conditionStr.'<br />';
    //echo '$uniqueIdCondStr = '.$uniqueIdCondStr.'<br />';
    //
    // Code added for Other Charges @Author:PRIYANKA-12OCT2018
    parse_str(getTableValues("SELECT sttr_id, sttr_owner_id, sttr_jrnl_id, sttr_firm_id, sttr_brand_id, sttr_add_date, 
            sttr_account_id, sttr_mfg_date, sttr_pre_invoice_no, sttr_invoice_no, sttr_item_pre_id, sttr_item_id, sttr_hsn_no, 
            sttr_metal_type, sttr_item_name, sttr_rfid_no, sttr_location, sttr_barcode ,sttr_item_category, sttr_quantity, sttr_bis_mark,
            sttr_gs_weight, sttr_gs_weight_type, sttr_pkt_weight, sttr_pkt_weight_type, sttr_nt_weight, sttr_nt_weight_type, 
            sttr_fine_weight,sttr_final_fine_weight, sttr_purity,sttr_wastage, sttr_final_purity, sttr_cust_wastage,
            sttr_metal_rate, sttr_lab_charges, sttr_lab_charges_type,sttr_making_charges,sttr_making_charges_type,
            sttr_other_charges, sttr_other_charges_type, sttr_total_other_charges,
            sttr_valuation, sttr_stone_valuation,sttr_final_valuation, sttr_tax,sttr_tot_tax,sttr_status,
            sttr_item_other_info, sttr_metal_rate_id, sttr_final_val_by,sttr_final_fine_wt_by, sttr_final_valuation_by, sttr_size,
            sttr_pkt_qty1,sttr_pkt_qty2,sttr_pkt_qty3,sttr_pkt_qty4,sttr_pkt_qty5,
            sttr_pkt_weight1,sttr_pkt_weight2,sttr_pkt_weight3,sttr_pkt_weight4,sttr_pkt_weight5,sttr_total_lab_charges,
            sttr_lab_chrg_qty1,sttr_lab_chrg_qty2,sttr_lab_chrg_qty3,sttr_lab_chrg_qty4,sttr_lab_chrg_qty5,
            sttr_lab_chrg_val1,sttr_lab_chrg_val2,sttr_lab_chrg_val3,sttr_lab_chrg_val4,sttr_lab_chrg_val5,
            sttr_lab_chrg_type1,sttr_lab_chrg_type2,sttr_lab_chrg_type3,sttr_lab_chrg_type4,sttr_lab_chrg_type5,
            sttr_lab_chrg_tot1,sttr_lab_chrg_tot2,sttr_lab_chrg_tot3,sttr_lab_chrg_tot4,sttr_lab_chrg_tot5,
            sttr_other_charges_by, sttr_cust_wastg_by, sttr_mkg_cgst_per, sttr_mkg_sgst_per, sttr_mkg_igst_per, 
            sttr_mkg_cgst_chrg, sttr_mkg_sgst_chrg, sttr_mkg_igst_chrg, 
            sttr_tot_price_cgst_per, sttr_tot_price_sgst_per, sttr_tot_price_igst_per, 
            sttr_tot_price_cgst_chrg, sttr_tot_price_sgst_chrg, sttr_tot_price_igst_chrg, sttr_value_added,
            sttr_cust_wastage, sttr_cust_wastage_wt, sttr_item_ent_type, sttr_item_model_no, sttr_counter_name,sttr_color,sttr_fixed_price_status,sttr_hallmark_uid
            FROM stock_transaction where $conditionStr"));
    //
    $selDOBDay = substr($sttr_add_date, 0, 2);
    $selDOBMnth = substr($sttr_add_date, 3, -5);
    $todayMM = date("m", strtotime($selDOBMnth)) - 1;
    $selDOBYear = substr($sttr_add_date, -4);
    //
    // ADD CODE TO MANUFACTURING DATE
    $selMDOBDay = substr($sttr_mfg_date, 0, 2);
    $selMDOBMnth = substr($sttr_mfg_date, 3, -5);
    $todayMMM = date("m", strtotime($selMDOBMnth)) - 1;
    $selMDOBYear = substr($sttr_mfg_date, -4);
    // ADD CODE TO MANUFACTURING DATE
    //
    if ($stockPanelName == 'SimilarItem') {
        $AddItemPanel = 'AddItem';
        $sttr_gs_weight = '';
        $sttr_rfid_no = '';
        $sttr_location = '';
        $sttr_nt_weight = '';
        $sttrId = $sttr_id;
    } 
    else if ($stockPanelName == 'UpdateStock' || $stockPanelName == 'StockPayUp' || 
             $stockPanelName == 'RETAIL_FINE_B2_UPDATE') {
        //
        if ($stockPanelName == 'StockPayUp') {
            //
            $resItemDet = mysqli_query($conn, "SELECT sttr_id FROM stock_transaction "
                                            . "where sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_pre_invoice_no = '$sttr_pre_invoice_no' "
                                            . "and sttr_invoice_no = '$sttr_invoice_no' and sttr_stock_type IN ('retail') "
                                            . "and sttr_indicator = 'stock' and sttr_status NOT IN ('DELETED')");
            //
            $noOfItemsAvail = mysqli_num_rows($resItemDet);
            //
        }
        //
        $firmIdSelected = $mainStockFirmId = $sttr_firm_id;
        $selAccId = $sttr_account_id;
        $sttrId = $sttr_id;
        //
        $UpdateItemPanel = 'UpdateItem';
        $Access = 'NO';
    }
    //
    $UpPanel = 'UpPanel';
    $sttrTransType = 'stockCrystal';
    //
    $qSelCryDet = "SELECT * FROM stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                . "and sttr_sttr_id = '$sttr_id' and sttr_indicator = 'stockCrystal' "
                . "and sttr_status NOT IN ('DELETED','PaymentDone') order by sttr_id asc";
    //
    $resCryDet = mysqli_query($conn, $qSelCryDet);
    $noOfCry = mysqli_num_rows($resCryDet);
    //
    $query = "SELECT * FROM stock_transaction where sttr_invoice_no > '$sttr_invoice_no' "
           . "and sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_status='PaymentDone' "
           . "and sttr_brand_id='$sttr_brand_id' and sttr_stock_type IN ('retail') and sttr_indicator = 'stock'";
    //
    $resInvPostId = mysqli_query($conn, $query);
    $rowInvPostId = mysqli_num_rows($resInvPostId);
    //
}
//**************END CODE TO GET TABLE VALUES WHILE ADD STOCK ***********/
//
//
//****************START CODE TO GET SUPPLIER NAME FROM SUPPLIER TABLE BY SUPP ID***********/
if ($sttr_brand_id != '') {
    parse_str(getTableValues("SELECT user_fname,user_lname FROM user WHERE user_owner_id='$sessionOwnerId' "
                           . "AND user_id ='$sttr_brand_id'"));
} else {
    $user_fname = $sttr_brand_id;
}
//
if ($user_fname == '' && $sttr_brand_id != '')
    $user_fname = $sttr_brand_id;
//****************END CODE TO GET SUPPLIER NAME FROM SUPPLIER TABLE BY SUPP ID***********/
//
//
//****************START CODE TO SET CRYSTALCOUNT TO DEFAULT***********/
if ($crystalCount == '')
    $crystalCount = 1;
//****************END CODE TO SET CRYSTALCOUNT TO DEFAULT***********/
//
//
//*********START CODE TO SET DEFAULT VALUE OF ITEM FN WT CALC BY GS WT OR NT WT***********/
//
if ($sttr_final_val_by == '') {
    $sttr_final_val_by = "byFineWt";
}
//
if ($sttr_final_fine_wt_by == '') {
    $sttr_final_fine_wt_by = "byFFineWt";
}
//
if ($sttr_mkg_charges_by == '') {
    $sttr_mkg_charges_by = "mkgByFFineWt";
}
//
//
if ($sttr_other_charges_by == '') {
    $sttr_other_charges_by = "lbByFFineWt";
}
//
//
// START CODE TO ADD FUNCTION FOR FINAL VALUATION BY GS WT, NT WT, FN WT, FFN WT @PRIYANKA-07MAR19
//if ($sttr_final_valuation_by == '') {
//    $sttr_final_valuation_by = "byFFineWt";
//}
// END CODE TO ADD FUNCTION FOR FINAL VALUATION BY GS WT, NT WT, FN WT, FFN WT @PRIYANKA-07MAR19
//
//
$metalType = $sttr_metal_type;
//
// SELECT METAL RATE
parse_str(getTableValues("SELECT met_rate_id,met_rate_tax_check,met_rate_tax_percentage,met_rate_with_tax,met_rate_tax_amt "
                       . "FROM metal_rates where met_rate_own_id='$sessionOwnerId' and met_rate_metal_name='$sttr_metal_type' "
                       . "and met_rate_id='$sttr_metal_rate_id' order by met_rate_ent_dat desc LIMIT 0, 1"));
//
if ($met_rate_tax_check == 'true') {
    $sttr_tax = $met_rate_tax_percentage;
    $metalRateCal = trim($met_rate_with_tax);
} else {
    $metalRateCal = $sttr_metal_rate;
}
//
$newMetalRateId = $met_rate_id;
//
$selAutoBcPrintOpt = "SELECT omly_value FROM omlayout WHERE omly_option = 'autoBarcodePrint'";
$resAutoBcPrintOpt = mysqli_query($conn, $selAutoBcPrintOpt);
$rowAutoBcPrintOpt = mysqli_fetch_array($resAutoBcPrintOpt, MYSQLI_ASSOC);
$autoBarcodePrint = $rowAutoBcPrintOpt['omly_value'];
//
if ($stockType == '' || $stockType == NULL) {
    if ($panel == 'addRetailStock') {
        $stockType = 'retailStock';
    } else {
        $stockType = 'wholeSaleStock';
    }
}
//*******START CODE TO SET BY DEFAULT ASC FIRM ID************************* */
if ($firmIdSelected == '') {
    parse_str(getTableValues("SELECT firm_id FROM firm where firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_id asc"));
    $firmIdSelected = $firm_id;
}
//
if ($autoBarcodePrint == 'YES') {
    $itstIdNew = $_GET['itstIdNew'];
    if ($itstIdNew != '') {
        $qSelAutoPrint = "SELECT sttr_bc_print_status FROM stock_transaction WHERE sttr_id='$itstIdNew' AND sttr_indicator = 'stock' AND sttr_status NOT IN ('DELETED')";
        $resSelAutoPrint = mysqli_query($conn, $qSelAutoPrint);
        $rowSelAutoPrint = mysqli_fetch_array($resSelAutoPrint, MYSQLI_ASSOC);
        $autoBcPrint = $rowSelAutoPrint['sttr_bc_print_status'];
    }
}
//
if ($userId != '') {
    parse_str(getTableValues("SELECT user_fname,user_lname FROM user where user_owner_id='$sessionOwnerId' "
                           . "and user_id ='$userId'"));
}
//
if ($sttr_metal_type == 'Gold' && $sttr_hsn_no == '')
    $sttr_hsn_no = 7113;
//
if ($sttr_metal_type == 'Silver' && $sttr_hsn_no == '')
    $sttr_hsn_no = 7113;
//
//
// *************************************************************************************************************
// START CODE FOR TAX AND GST SETTING ON FORMS @AUTHOR-PRIYANKA-09MAR2021
// *************************************************************************************************************
//
$selTaxAndGstSettingQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'TaxAndGstSetting'";
$resTaxAndGstSetting = mysqli_query($conn, $selTaxAndGstSettingQuery);
$rowTaxAndGstSetting = mysqli_fetch_array($resTaxAndGstSetting);
$TaxAndGstSettingValue = $rowTaxAndGstSetting['omly_value'];
//
// *************************************************************************************************************
// END CODE FOR TAX AND GST SETTING ON FORMS @AUTHOR-PRIYANKA-09MAR2021
// *************************************************************************************************************
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
// **************************************************************************************
// START CODE TO GET VALUE OF HALLMARK HUID MANDATORY OPTION
// **************************************************************************************
//
$queryHallmarkHUID = "SELECT omly_value FROM omlayout WHERE omly_option = 'hallmarkHUID'";
$resHallmarkHUID = mysqli_query($conn, $queryHallmarkHUID);
$rowHallmarkHUID = mysqli_fetch_array($resHallmarkHUID);
$hallmarkHUID = $rowHallmarkHUID['omly_value'];
//
if ($hallmarkHUID == 'COMPULSORY') {
    $validateHUIDvalue = 'YES';
} else {
    $validateHUIDvalue = 'NO';
}
//
// **************************************************************************************
// END CODE TO GET VALUE OF HALLMARK HUID MANDATORY OPTION
// **************************************************************************************
//
?>
<form name="add_item" id="add_item"
      enctype="multipart/form-data" method="post"
      action="<?php echo $documentRootBSlash; ?>/include/php/omReceivedStockUpdateAd.php"    
      onsubmit="return addItem('<?php echo $documentRootBSlash; ?>');">  
    <div id="stockPanelFormDiv">
        <table border="0"  cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="left" class="box">
                    <img src="<?php echo $documentRootBSlash; ?>/images/spacer.gif" alt="Add Stock" 
                         onload="initFormName('add_item', 'addItem');
                         <?php if ($stockPanelName == 'UpdateStock' || $stockPanelName == 'StockPayUp') { ?>
                                     calStockItemPrice();
                                     calcItemCryPrice();
                         <?php } ?>
                         document.getElementById('sttr_hallmark_uid').focus();" />
                         <?php
                         if ($autoBarcodePrint == 'YES' && $autoBcPrint == 'No') {
                             $qSelItemDet = "SELECT * FROM stock_transaction WHERE sttr_id='$itstIdNew' "
                                          . "AND sttr_indicator = 'stock' AND sttr_status NOT IN ('DELETED')";
                             $resItemDet = mysqli_query($conn, $qSelItemDet);
                             $rowItemDet = mysqli_fetch_array($resItemDet, MYSQLI_ASSOC);
                             ?>
                        <input type="hidden" id="bcFirmId" name="bcFirmId" value="<?php echo $rowItemDet['sttr_firm_id']; ?>"/>
                        <input type="hidden" id="bcAddItemPreId" name="bcAddItemPreId" value="<?php echo $rowItemDet['sttr_item_pre_id']; ?>"/>
                        <input type="hidden" id="bcAddItemId" name="bcAddItemId" value="<?php echo $rowItemDet['sttr_item_id']; ?>"/>
                        <input type="hidden" id="bcAddItemName" name="bcAddItemName" value="<?php echo $rowItemDet['sttr_item_name']; ?>"/>
                        <input type="hidden" id="bcAddItemMetal" name="bcAddItemMetal" value="<?php echo $rowItemDet['sttr_metal_type']; ?>"/>
                        <input type="hidden" id="bcAddItemGrossWeight" name="bcAddItemGrossWeight" value="<?php echo $rowItemDet['sttr_gs_weight']; ?>"/>
                        <input type="hidden" id="bcAddItemGrossWeightType" name="bcAddItemGrossWeightType" value="<?php echo $rowItemDet['sttr_gs_weight_type']; ?>"/>
                        <input type="hidden" id="bcAddItemNetWeight" name="bcAddItemNetWeight" value="<?php echo $rowItemDet['sttr_nt_weight']; ?>"/>
                        <input type="hidden" id="bcAddItemNetWeightType" name="bcAddItemNetWeightType" value="<?php echo $rowItemDet['sttr_nt_weight_type']; ?>"/>
                        <input type="hidden" id="bcAddItemTunch" name="bcAddItemTunch" value="<?php echo $rowItemDet['sttr_purity']; ?>"/>
                        <input type="hidden" id="bcAddItemBisMark" name="bcAddItemBisMark" value="<?php echo $rowItemDet['sttr_bis_mark']; ?>"/>
                        <input type="hidden" id="bcAddItemCustCharges" name="bcAddItemCustCharges" value="<?php echo $rowItemDet['sttr_making_charges']; ?>"/>
                        <input type="hidden" id="bcAddItemCustChargesType" name="bcAddItemCustChargesType" value="<?php echo $rowItemDet['sttr_making_charges_type']; ?>"/>
                        <input type="hidden" id="sttrId" name="sttrId" value="<?php echo $rowItemDet['sttr_id']; ?>" />
                        <input type="hidden" id="bcItemStocId" name="bcItemStocId" value="<?php echo $rowItemDet['sttr_id']; ?>"/>
                        <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />
                        <?php
                        parse_str(getTableValues("SELECT sttr_barcode,sttr_item_pre_id as itemPreId,sttr_item_id as itemPostId FROM stock_transaction WHERE sttr_id='$itstIdNew'"));
                        parse_str(getTableValues("SELECT omly_value as prnPrintOption "
                                               . "FROM omlayout where omly_own_id='$sessionOwnerId' and omly_option='printOption'"));
                        ?>
                        <img src="<?php echo $documentRootBSlash; ?>/images/abx-t.png" alt="Print Barcode" 
                             onload="printOneAllLabelBarcodeBySttrId('<?php echo $itstIdNew; ?>', 'stock', '<?php echo $systemOnOrOff; ?>', '<?php echo $sysLocalDBRemote; ?>', '<?php echo $prnPrintOption; ?>');" />
                        <div id="AllLabelsDivs" style="display:none;"></div>
                        <?php
                        $query = "UPDATE stock_transaction SET sttr_bc_print_status='YES' WHERE sttr_id='$itstIdNew' "
                               . "AND sttr_indicator = 'stock' AND sttr_status NOT IN ('DELETED')";
                        if (!mysqli_query($conn, $query)) {
                            die('Error: ' . mysqli_error($conn));
                        }
                        ?>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>
                    <!-------------- Start Code to Define Hidden inputs ------------>
                    <input type="hidden" id="documentRoot" name="documentRoot" value="<?php echo $documentRootBSlash; ?>" />
                    <input type="hidden" id="custId" name="custId" value="<?php echo $_REQUEST['userId']; ?>" />
                    <input type="hidden" id="searchProductPreId" name="searchProductPreId" value="<?php echo $_REQUEST['searchProductPreId']; ?>" />
                    <input type="hidden" id="searchProductPostId" name="searchProductPostId" value="<?php echo $_REQUEST['searchProductPostId']; ?>" />
                    <input type="hidden" id="userId" name="userId" value="<?php echo $_REQUEST['userId']; ?>" />
                    <input type="hidden" id="sttrId" name="sttrId" value="<?php echo $sttrId; ?>" />
                    
                    <input type="hidden" id="validateHUID" name="validateHUID" value="<?php echo $validateHUIDvalue; ?>"/>
                    <input type="hidden" id="globalPlusKeyId" name="globalPlusKeyId"/>
                    <input type="hidden" id="globalAltCId" name="globalAltCId"/>
                    <input type="hidden" id="panelName" name="panelName" value="<?php echo $stockPanelName; ?>"/>
                    <input type="hidden" id="totCrystal" name="totCrystal"/> 
                    <input type="hidden" id="stockType" name="stockType" value="<?php echo $stockType; ?>" />
                    <input type="hidden" id="invoiceRow" name="invoiceRow" value="<?php echo $rowInvPostId; ?>" />
                    <input type="hidden" id="invPanelName" name="invPanelName" value="<?php echo $invPanelName; ?>" />
                    
                    <!-------------- Start Code to Define New Hidden inputs @PRIYANKA 03-06-17 ------------>
                    <input type="hidden" id="sttr_indicator" name="sttr_indicator" value="stock" />
                    <input type="hidden" id="sttr_bc_print_status" name="sttr_bc_print_status" value="No" />
                    <input type="hidden" id="sttr_sell_status" name="sttr_sell_status" value="No" />
                    <input type="hidden" id="sttr_item_ent_type" name="sttr_item_ent_type" />
                    <input type="hidden" id="sendForHallmarking" name="sendForHallmarking" />
                    <input type="hidden" id="sttr_type" name="sttr_type" value="stock"/>
                    <input type="hidden" id="subPanel" name="subPanel" value="AddStock"/>
                    <input type="hidden" id="suppPanelName" name="suppPanelName" value="AddStock"/>
                    <input type="hidden" id="payPanelName" name="payPanelName" value="<?php echo $invPanelName; ?>"/>
                    
                    <?php if($_SESSION['sessionProdName'] != 'OMRETL'){ ?>
                    <input type="hidden" id="msItmType" name="msItmType" value="PRODUCT">
                    <?php } ?>
                    <!-------------- Start Code to Define New Hidden inputs @PRIYANKA 03-06-17 --------------->
                    <input type="hidden" id="mainEntryId" name="mainEntryId" value="<?php echo $utransInvId; ?>"/>
                    <input type="hidden" id="sttr_stock_type" name="sttr_stock_type" value="retail" />
                    <?php
                    //
                    //
                    //echo '$DefaultFormOption 1== ' . $DefaultFormOption . '<br />';
                    //echo '$invPanelName 1== ' . $invPanelName . '<br />';
                    //echo '$panelName 1== ' . $panelName . '<br />';
                    //echo '$stockPanelName 1== ' . $stockPanelName . '<br />';
                    //
                    //
                    // *******************************************************************************
                    // START CODE TO GET FINE JEWELLERY DEFAULT FORM OPTION
                    // *******************************************************************************
                    //
                    $selDefaultFormOptionQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'DefaultFormOption'";
                    $resDefaultFormOption = mysqli_query($conn, $selDefaultFormOptionQuery);
                    $rowDefaultFormOption = mysqli_fetch_array($resDefaultFormOption);
                    $DefaultFormOption = $rowDefaultFormOption['omly_value'];
                    //
                    // *****************************************************************************
                    // END CODE TO GET FINE JEWELLERY DEFAULT FORM OPTION
                    // *****************************************************************************
                    //
                    // CHANGED CODE FOR UPDATE PANEL NAME @PRIYANKA-19SEP2022
                    if ($DefaultFormOption == 'fineb2' && $invPanelName == 'AddByInv' && $panelName != 'UpdateStock') {
                        $panelName = 'RETAIL_FINE_B2';
                    }
                    //
                    //
                    //echo '$DefaultFormOption == ' . $DefaultFormOption . '<br />';
                    //echo '$invPanelName == ' . $invPanelName . '<br />';
                    //echo '$panelName == ' . $panelName . '<br />';
                    //echo '$stockPanelName == ' . $stockPanelName . '<br />';
                    //
                    $huidPanelName='receiveStock';
                    //
                    //
                    include 'ogadrtdv.php'; // retail item update date, header file
                    //
                    //
                    if ($panelName == 'RETAIL_FINE_B2' || $stockPanelName == 'RETAIL_FINE_B2_UPDATE') {
                        include 'ogadsmrtdv.php'; // wholesale and retail item update file
                    } else {
                        include 'ogadwsdv.php'; // wholesale and retail item update file
                    }
                    //
                    //
                    ?>
                    <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
                        <!-------------------------------------------------->
                        <!---Start code to show details after item update------>
                        <!-------------------------------------------------->
                        <tr>
                            <td colspan="2" align="left">
                                <div id="addStockCurrentInvoice">
                                    <?php
                                    //
                                    $invPanel = 'StockInvoice';
                                    //
                                    //print_r($_REQUEST);
                                    //echo '$sttrId == ' . $sttrId . '<br />';
                                    //echo '$stockPanelName == ' . $stockPanelName . '<br />';
                                    //
                                    include 'omUpdateStockHUIDProdDetails.php';
                                    //
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <!-------------------------------------------------->
                        <!---End code to show details after item update------>
                        <!-------------------------------------------------->
                    </table>
                </td>
            </tr>
        </table>
    </div>
</form>