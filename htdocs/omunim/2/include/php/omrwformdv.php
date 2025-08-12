<?php
/*
 * **************************************************************************************
 * @Description: ORDER ASSIGNMENT FORM MAIN FILE @PRIYANKA-22JULY2021
 * **************************************************************************************
 *
 * Created on JULY 22, 2021 05:55.00 PM
 *
 * @FileName: omrwformdv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 2.7.68
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-22JULY2021
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 2.7.68
 * Version: 2.7.68
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php
//
$currentFileName = basename(__FILE__);
$accFileName = $currentFileName;
include 'ommpemac.php';
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
$staffId = $_SESSION['sessionStaffId'];
include 'ommpsbac.php';
include_once 'ommpfndv.php';
?>
<?php
    //
    //print_r($_REQUEST);
    //
    if ($firmId == '' || $firmId == NULL) {
        $firmId = $_REQUEST['firmId'];
    }
    //
    if ($_SESSION['setFirmSession'] != '') {
        $strFrmId = $_SESSION['setFirmSession'];
    } else {
        $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
    }
    //
    $selStockPurOption = callOmLayoutTable('StockPurOption', '', 'select');
    //
    if ($selStockPurOption == '')
        callOmLayoutTable('StockPurOption', 'RawStock', 'insert');
    else
        callOmLayoutTable('StockPurOption', 'RawStock', 'update');
    //
    if ($metType == '' || $metType == NULL) {
        $metType = $_POST['metType'];
    }
    //
    if ($metType == '' || $metType == NULL) {
        $metType = $_GET['metType'];
    }
    //
    $msg = $_GET['msg'];
    $rwprId = $_GET['rwprId'];
    $sessionOwnerId = $_SESSION[sessionOwnerId];
    //
    if ($simButton == '' || $simButton == NULL) {
        $simButton = $_GET['simButton'];
    }
    //
    if ($simButton == '' || $simButton == NULL) {
        $simButton = $_POST['simButton'];
    }
    //
    if ($userId == '' || $userId == NULL) {
        $userId = $_REQUEST['custId'];
    }
    //
    if ($suppId == '' || $suppId == NULL) {
        $suppId = $_REQUEST['custId'];
    }
    //
    if ($userId == '' || $userId == NULL) {
        $userId = $_REQUEST['userId'];
    }
    //
    if ($suppId == '' || $suppId == NULL) {
        $suppId = $_REQUEST['userId'];
    }
    //
    if ($mainPanelDiv == '' || $mainPanelDiv == NULL) {
        $mainPanelDiv = $_GET['mainPanel'];
    }
    //
    if ($transactionPanel == '' || $transactionPanel == NULL) {
        $transactionPanel = $_GET['transactionPanel'];
    }
    //
    if ($rawPanelName == '' || $rawPanelName == NULL)
        $rawPanelName = $_GET['rawPanelName'];
    //
    if ($NewPanelName == '' || $NewPanelName == NULL)
        $NewPanelName = $_GET['NewPanelName'];
    //
    if ($NavPanelName == '' || $NavPanelName == NULL)
        $NavPanelName = $_REQUEST['NavPanelName'];
    //
    if ($assignReceivedOrderPanelName == '' || $assignReceivedOrderPanelName == NULL)
        $assignReceivedOrderPanelName = $_REQUEST['assignReceivedOrderPanelName'];
    //
    if ($assignMainOrderPanelName == '' || $assignMainOrderPanelName == NULL)
        $assignMainOrderPanelName = $_REQUEST['assignMainOrderPanelName'];
    //
    if ($unassignMainOrderPanelName == '' || $unassignMainOrderPanelName == NULL)
        $unassignMainOrderPanelName = $_REQUEST['unassignMainOrderPanelName'];
    //
    //
    //echo '$NewPanelName == '.$NewPanelName.'<br />';
    //echo '$mainPanelDiv == '.$mainPanelDiv.'<br />';
    //echo '$rwprId == '.$rwprId.'<br />';
    //echo '$userId == '.$userId.'<br />';
    //echo '$suppId == '.$suppId.'<br />';
    //echo '$rawPanelName == '.$rawPanelName.'<br />';
    //echo '$metType == '.$metType.'<br />';
    //echo '$transactionPanel == '.$transactionPanel.'<br />';
    //
    //
    if ($transactionPanel == '' && $metType == 'BUY') {
        $transactionPanel = 'RawPurchase';
    }
    //
    if ($transactionPanel == '' && $metType == 'SELL') {
        $transactionPanel = 'RawSell';
    }
    //
    //echo '$userId1 == '.$userId.'<br />';
    //echo '$mainPanelDiv == '.$mainPanelDiv.'<br />';
    //
    if ($mainPanelDiv == 'Customer' || $mainPanelDiv == 'Supplier') {
        //
        include 'omadcsrmdt.php';
        //
        parse_str(getTableValues("SELECT user_fname FROM user WHERE user_owner_id='$sessionOwnerId' "
                               . "AND user_id ='$userId'"));
        //
    } else {
        //
        include 'ogadrwmtdt.php';
        //
    }
    //
    //
    //
    //echo '$sttr_pre_invoice_no @ : ' . $sttr_pre_invoice_no . '<br>';
    //echo '$sttr_invoice_no @ : ' . $sttr_invoice_no . '<br>';
    //
    //
    if ($rawPanelName != 'RawDetUpPanel' && $rawPanelName != 'RawPayUp') {
    //    
    if ($sttr_pre_invoice_no == 'IS') {
        //
        $sttr_pre_invoice_no = 'ISO';
        //
        parse_str(getTableValues("SELECT MAX(CAST(sttr_invoice_no AS SIGNED)) as slPrInvoiceNo "
                               . "FROM stock_transaction where sttr_owner_id = '$sessionOwnerId' "
                               . "AND sttr_pre_invoice_no = '$sttr_pre_invoice_no' "
                               . "AND sttr_transaction_type IN ('sell') "));
        //
        if ($slPrInvoiceNo != '' && $slPrInvoiceNo != NULL && $sttr_status != 'PaymentPending') {
            $sttr_invoice_no = $slPrInvoiceNo + 1;
        } else {
            if ($sttr_status != 'PaymentPending') {
                $sttr_invoice_no = 1;
            }
        }
    }
    //
    }
    //
    //
    //echo '$sttr_pre_invoice_no # : ' . $sttr_pre_invoice_no . '<br>';
    //echo '$sttr_invoice_no # : ' . $sttr_invoice_no . '<br>';
    //
    //
    //
    //echo '$userId2 == '.$userId.'<br />';
    //
    if ($user_fname == '')
        $user_fname = $sttr_brand_id;
    //
    if ($sttr_brand_id == '')
        $sttr_brand_id = $user_fname;
    //
    include 'ogiartdv.php';
    //
    if ($metType == 'BUY') {
        $hindiLabel = ' / RECIEVED / जमा';
        $transactionType = 'PURBYSUPP';
    } else if ($metType == 'SELL') {
        $hindiLabel = ' / ISSUE / UDHAAR / लेना';
        $transactionType = 'sell';
        //
        if ($NavPanelName == '' || $NavPanelName == NULL)
            $NavPanelName = "AssignRepairOrderPanel";
    }
    //
    // Add Code for Update Crystal Functionality @Author:PRIYANKA-14MAR19
    if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') {
        //
        $sttrId = $_GET['rwprId'];
        //
        $qSelCryDet = "SELECT * FROM stock_transaction where sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                    . "and sttr_sttr_id = '$sttrId' and sttr_status NOT IN ('DELETED') "
                    . "and sttr_indicator = 'stockCrystal' order by sttr_id asc";
        //
        $resCryDet = mysqli_query($conn, $qSelCryDet);
        $noOfCry = mysqli_num_rows($resCryDet);
        //
        //echo '$qSelCryDet == '.$qSelCryDet.'<br />';
        //echo '$noOfCry == '.$noOfCry.'<br />';
        //
    }
    //
    // *************************************************************************************************************
    // START CODE FOR TAX AND GST SETTING ON FORMS @PRIYANKA-02APR2021
    // *************************************************************************************************************
    //
    $selTaxAndGstSettingQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'TaxAndGstSetting'";
    $resTaxAndGstSetting = mysqli_query($conn, $selTaxAndGstSettingQuery);
    $rowTaxAndGstSetting = mysqli_fetch_array($resTaxAndGstSetting);
    $TaxAndGstSettingValue = $rowTaxAndGstSetting['omly_value'];
    //
    // *************************************************************************************************************
    // END CODE FOR TAX AND GST SETTING ON FORMS @PRIYANKA-02APR2021
    // *************************************************************************************************************
    //
    //
    // ***********************************************************************************************************************
    // START CODE FOR HSN OPTION IN FORMS SETTING YES / NO @PRIYANKA-02APR2021
    // ***********************************************************************************************************************
    $selHSNOptionInFormsQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'HSNOptionInForms'";
    $resHSNOptionInForms = mysqli_query($conn, $selHSNOptionInFormsQuery);
    $rowHSNOptionInForms = mysqli_fetch_array($resHSNOptionInForms);
    $HSNOptionInForms = $rowHSNOptionInForms['omly_value'];
    // ***********************************************************************************************************************
    // END CODE FOR HSN OPTION IN FORMS SETTING YES / NO @PRIYANKA-02APR2021
    // ***********************************************************************************************************************
    //
?>
<form name="add_raw_stock" id="add_raw_stock"
          enctype="multipart/form-data" method="post"
          action="include/php/omrwmtad.php"   
          onsubmit="return addRawStock();">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <!-------------------------------------------------->
            <!---Start code to add title and onload function---->
            <!-------------------------------------------------->
            <tr>
                <td align="left" class="portlet grey-crusta box" style="background:#fff;">
                    <table align="left" border="0" cellspacing="0" cellpadding="2" width="100%">
                        <tr>
                            <td width="26px">
                                <img src="<?php echo $documentRoot; ?>/images/addGold24.png" alt="Add Stock" 
                                     onload="initFormName('add_raw_stock', 'addRawStock');
                                     <?php if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') { ?>
                                               calRawMetalFinVal();
                                     <?php } else if ($assignReceivedOrderPanelName == 'assignReceivedOrderFromAssignMetal' ||
                                                      $assignReceivedOrderPanelName == 'assignMainOrderFromAssignMetal') { ?>
                                               calRawMetalFinVal();
                                     <?php } ?>    
                                     document.getElementById('sttr_metal_type').focus();
                                     return false;"/>
                            </td>
                            <td class="portlet-title caption">
                                 <div class="main_link_brown16">
                                     <b> <?php if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') { ?>
                                        <?php if ($metType == 'BUY') {?>
                                            UPDATE RETURN ORDERS 
                                        <?php } else { ?>
                                            UPDATE ASSIGN (ALLOCATE) METAL
                                        <?php } ?>
                                    
                                    <?php } else { ?>
                                        <?php if ($metType == 'BUY') {?>
                                            RETURN ORDERS 
                                        <?php } else { ?>
                                            ASSIGN (ALLOCATE) METAL
                                        <?php } ?>
                                    <?php } ?> </b>
                                 </div>
                            </td>                            
                        </tr>
                    </table>
                </td>
            </tr>
            <!-------------------------------------------------->
            <!---End code to add title and onload function------>
            <!-------------------------------------------------->
            <tr>
                <td>
                    <!-- Add Code for Stone Functionality @PRIYANKA-02APR2021 -->
                    <input type="hidden" id="sttr_ratecut_norate_option" name="sttr_ratecut_norate_option" value="<?php echo $sttr_ratecut_norate_option; ?>"/>       
                    <input type="hidden" id="addItemValuation" name="addItemValuation"  />
                    <input type="hidden" id="addItemCryFinVal" name="addItemCryFinVal"  />
                    <input type="hidden" id="addItemCryCount" name="addItemCryCount"  />
                    <input type="hidden" id="commonPanel" name="commonPanel" value="<?php echo $commonPanel; ?>" />
                    <input type="hidden" id="noOfCry" name="noOfCry" value="<?php echo $noOfCry; ?>"/>
                    <input type="hidden" id="globalPlusKeyId" name="globalPlusKeyId"/>
                    <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>"/>
                    <input type="hidden" id="globalAltCId" name="globalAltCId"/>
                    <input type="hidden" id="rawPanelName" name="rawPanelName" value="<?php echo $rawPanelName; ?>"/>
                    <input type="hidden" id="rwprId" name="rwprId" value="<?php echo $rwprId; ?>"/>
                    <input type="hidden" id="sttrId" name="sttrId" value="<?php echo $rwprId; ?>"/>
                    <input type="hidden" id="userMainPanel" name="userMainPanel" value="<?php echo $mainPanelDiv; ?>"/>
                    <input type="hidden" id="transactionPanel" name="transactionPanel" value="<?php echo $transactionPanel; ?>"/>
                    <input type="hidden" id="payButClickId" name="payButClickId" value="false"/>
                    <input type="hidden" id="rawMetalUniqueId" name="rawMetalUniqueId" value="<?php echo $payUniqueId; ?>" />
                    <input type="hidden" id="metType" name="metType" value="<?php echo $metType; ?>"/>
                    <input type="hidden" id="rawMetalpanel" name="rawMetalpanel" value="RawMetalPanel" />
                    <!-------------- Start Code to Define New Hidden inputs @PRIYANKA-02APR2021 ------------>                    
                    <?php 
                    //
                    //echo '$sttr_item_category == ' . $sttr_item_category . '<br />'; 
                    //echo '$sttr_item_name == ' . $sttr_item_name . '<br />';
                    //
                    //
                    ?>
                    
                    <input type="hidden" id="sttr_bc_print_status" name="sttr_bc_print_status" value="No" />
                    <input type="hidden" id="sttr_sell_status" name="sttr_sell_status" value="No" />
                    
                    <?php if ($metType == 'BUY') { ?>
                        <input type="hidden" id="sttr_transaction_type" name="sttr_transaction_type" value="PURBYSUPP" />
                        <?php if ($rawPanelName != 'RawDetUpPanel' && $rawPanelName != 'RawPayUp') { ?>
                            <input type="hidden" id="mainEntryAssignStatus" name="mainEntryAssignStatus" />
                        <?php } ?>
                    <?php } else { ?>
                    <input type="hidden" id="sttr_transaction_type" name="sttr_transaction_type" value="sell" />
                    <input type="hidden" id="sttr_assign_status" name="sttr_assign_status" value="ASSIGNED" />
                        <?php if ($rawPanelName != 'RawDetUpPanel' && $rawPanelName != 'RawPayUp') { ?>
                        <input type="hidden" id="mainEntryAssignStatus" name="mainEntryAssignStatus" value="READY TO ASSIGN" />
                        <input type="hidden" id="sttr_assign_entry_indicator" name="sttr_assign_entry_indicator" value="<?php echo $sttr_assign_entry_indicator; ?>" />
                        <input type="hidden" id="sttr_assign_entry_id" name="sttr_assign_entry_id" value="<?php echo $sttr_assign_entry_id; ?>" />
                        <?php } ?>
                    <?php } ?>
                    
                    <input type="hidden" id="NavPanelName" name="NavPanelName" value="<?php echo $NavPanelName; ?>" />
                                                            
                    <input type="hidden" name="sttr_user_id" id="sttr_user_id" value="<?php echo $userId; ?>" />
                    
                    <input type="hidden" id="condition" name="condition" value = <?php echo $_REQUEST['condition']; ?> />                   
                    <input type="hidden" id="sttr_final_val_by" name="sttr_final_val_by" value="<?php echo $sttr_final_val_by; ?>"/>
                    <input type="hidden" id="sttr_final_valuation_by" name="sttr_final_valuation_by" value="<?php echo $sttr_final_valuation_by; ?>"/>
                    <input type="hidden" id="sttr_other_charges_by" name="sttr_other_charges_by" value="<?php echo $sttr_other_charges_by; ?>"/>
                    <input type="hidden" id="sttr_other_charges" name="sttr_other_charges" value="<?php echo $sttr_other_charges; ?>"/>
                    <input type="hidden" id="sttr_other_charges_type" name="sttr_other_charges_type" value="<?php echo $sttr_other_charges_type; ?>"/>
                    <input type="hidden" id="suppItemTotVal" name="suppItemTotVal" value="<?php echo $suppItemTotVal; ?>" />
                    <input type="hidden" id="addPanel" name="addPanel" value="AddStock" />
                    <input type="hidden" id="addPanelInfo" name="addPanelInfo" value="<?php echo $addPanelInfo ?>" />
                    <input type="hidden" id="sttr_cust_wastg_by" name="sttr_cust_wastg_by" value="custWastgByNetWt" />
                    <input type="hidden" id="sttr_cust_wastage" name="sttr_cust_wastage" value="" />
                    <input type="hidden" id="sttr_cust_wastage_wt" name="sttr_cust_wastage_wt" value="" />
                    <input type="hidden" id="sttr_value_added" name="sttr_value_added" value="" />        
                    <input type="hidden" id="sttr_mkg_cgst_per" name="sttr_mkg_cgst_per" value="" /> 
                    <input type="hidden" id="sttr_mkg_sgst_per" name="sttr_mkg_sgst_per" value="" /> 
                    <input type="hidden" id="sttr_mkg_igst_per" name="sttr_mkg_igst_per" value="" /> 
                    <input type="hidden" id="sttr_mkg_cgst_chrg" name="sttr_mkg_cgst_chrg" value="" /> 
                    <input type="hidden" id="sttr_mkg_sgst_chrg" name="sttr_mkg_sgst_chrg" value="" /> 
                    <input type="hidden" id="sttr_mkg_igst_chrg" name="sttr_mkg_igst_chrg" value="" />
                    <input type="hidden" id="mainPanel" name="mainPanel" value=""/>
                    <input type="hidden" id="custPurPresent" name="custPurPresent" value=""/>
                    <input type="hidden" id="addItemSubButtDiv" name="addItemSubButtDiv" value=""/>
                    <input type="hidden" id="addItemSimButtDiv" name="addItemSimButtDiv" value=""/>
                    <input type="hidden" id="addItemExItButtDiv" name="addItemExItButtDiv" value=""/>
                    <input type="hidden" id="addItemAddStockItButtDiv" name="addItemAddStockItButtDiv" value=""/>
                    <input type="hidden" id="addItemHelpButtDiv" name="addItemHelpButtDiv" value=""/>
                    <input type="hidden" id="payButClickId" name="payButClickId" value="false"/>
                    <input type="hidden" id="panelSimilarDiv" name="panelSimilarDiv" value=""/>
                    <input type="hidden" id="addItemCryFinVal" name="addItemCryFinVal" value="" />
                    <input type="hidden" id="sttr_total_other_charges" name="sttr_total_other_charges" value="" />
                    <input type="hidden" id="sttr_stone_valuation" name="sttr_stone_valuation" value="" />
                    <input type="hidden" id="sttr_making_charges" name="sttr_making_charges" value="" />
                    <!-------------- End Code to Define New Hidden inputs @PRIYANKA-02APR2021 ------------>
                    <?php
                    include 'omrwadhdv.php';
                    include 'omrwaddv.php';
                    ?>
                    <!-------------- End Code to include item add files ------------>
                </td>
            </tr>
        </table>
    </form>
    <!-------------------------------------------------->
    <!---Start code to add item add and payment div------->
    <!-------------------------------------------------->
    <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%">
        <!-------------------------------------------------->
        <!---Start code to show Invoice after item add------>
        <!-------------------------------------------------->
        <tr>
            <td align="center" width="100%">
                <div id="addRawStockInvoice">
                    <?php
                    //
                    $invPanel = 'RawInvoice';
                    //
                    include 'omrmindv.php';
                    //
                    ?>
                </div>
            </td>
        </tr>
        <!-------------------------------------------------->
        <!---End code to show Invoice after item add------>
        <!-------------------------------------------------->
    </table>
    <!-------------------------------------------------->
    <!---End code to add item add and payment div------->
    <!-------------------------------------------------->