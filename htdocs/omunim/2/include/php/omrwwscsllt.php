<?php
/*
 * **************************************************************************************
 * @Description: ASSIGNED ORDERS LIST FILE @PRIYANKA-23JUNE2021
 * **************************************************************************************
 *
 * Created on June 23, 2021 05:44:21 PM
 *
 * @FileName: omrwwscsllt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 3.0.0
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-23JUNE2021
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 3.0.0
 * Version: 3.0.0
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
?>
<div id="stockPanelSellList">
    <?php
        //
        //
        //echo '$strFrmId @@== ' . $strFrmId . '<br />';
        //echo '$userId ##== ' . $userId . '<br />';
        //
        //
        // Start Code To Select FirmId
        if ($_SESSION['setFirmSession'] != '') {
            $strFrmId = $_SESSION['setFirmSession'];
        } else {
            $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
        }
        //
        //
        if ($userId == '' || $userId == NULL) {
            $userId = $_GET['userId'];
        }
        //
        //              
        if ($mainPanel == '') {
            $mainPanel = $_GET['mainPanel'];
        }
        //
        if ($metType == '') {
            $metType = $_GET['transType'];
        }
        //
        if ($metType == '') {
            $metType = $_GET['metType'];
        }
        //
        if ($mainPanel == 'Customer') {
            $rmslType = 'CustMetalPurchase';
        } else {
            $rmslType = 'SuppMetalPurchase';
        }
        //End Code To Select FirmId
        //
        if ($mainPanel == 'Customer') {
            $divName = 'cust_middle_body';
        }
        //
        $panel = 'MetalToCashPurchaseList';
        //
    $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
    $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
    $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
    $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];

    $selnepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
    $resnepaliDateMonthFormat = mysqli_query($conn, $selnepaliDateMonthFormat);
    $rownepaliDateMonthFormat = mysqli_fetch_array($resnepaliDateMonthFormat);
    $nepaliDateMonthFormat = $rownepaliDateMonthFormat['omly_value'];
/******* Start Code To GET Firm Details @AUTHOR:PRIYANKA-23JUNE2021 ********* */
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    // If not selected assign session firm @AUTHOR:PRIYANKA-23JUNE2021
    $selFirmId = $_SESSION['setFirmSession'];
}
//
//
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type='Public' and "
                   . "firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr";
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    $qSelFirmCount = "SELECT firm_id,firm_name,firm_type FROM firm where "
                   . "firm_own_id='$_SESSION[sessionOwnerId]' $sessionFirmStr order by firm_since desc";
}
//
//
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    // 
    // Set String for Public Firms @AUTHOR:PRIYANKA-23JUNE2021
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
/****** End Code To GET Firm Details @AUTHOR:PRIYANKA-23JUNE2021 ********* */
//
//
if ($returnOrderAssignPanelName == '' || $returnOrderAssignPanelName == NULL)
    $returnOrderAssignPanelName = $_REQUEST['ReturnOrderAssignPanelName'];
//
//
// *********************************************************************************************************
// Start Code to Return Orders From Return Order Panel @Author:PRIYANKA-15JULY2021
// *********************************************************************************************************
if ($returnOrderAssignPanelName == 'ReturnOrderAssignPanel') {
    //
    //
    if ($sttrMainOrderId == '' || $sttrMainOrderId == NULL)
        $sttrMainOrderId = $_REQUEST['sttrMainOrderId'];
    //
    //
    if ($transMainId == '' || $transMainId == NULL)
        $transMainId = $_REQUEST['transMainId'];
    //
    //
    if ($sttrAssignPreInvoiceNo == '' || $sttrAssignPreInvoiceNo == NULL)
        $sttrAssignPreInvoiceNo = $_REQUEST['sttrAssignPreInvoiceNo'];
    //
    //
    if ($sttrAssignInvoiceNo == '' || $sttrAssignInvoiceNo == NULL)
        $sttrAssignInvoiceNo = $_REQUEST['sttrAssignInvoiceNo'];
    //
    //
    if ($sttrMainOrderId != '' && ($sttrAssignPreInvoiceNo == '' || $sttrAssignPreInvoiceNo == NULL)) {        
        //
        //
        $updateProdQuery1 = "UPDATE stock_transaction SET sttr_return_status = 'READY TO RETURN', "
                          . "sttr_return_user_id = '$userId' "
                          . "WHERE (sttr_id = '$sttrMainOrderId' or sttr_sttr_id = '$sttrMainOrderId') "
                          . "and sttr_owner_id = '$sessionOwnerId' "
                          . "and sttr_panel_name IN ('addNewOrder', 'CRYSTAL', 'CRYSTAL_ORDER', 'addNewOrderB2') "
                          . "and sttr_indicator IN ('stock', 'stockCrystal') "
                          . "and sttr_status IN ('PaymentDone') "
                          . "and sttr_assign_status IN ('ASSIGNED') "
                          . "and sttr_direct_assign_status IN ('YES') "
                          . "and (sttr_return_status = '' or sttr_return_status IS NULL) "
                          . "and sttr_assign_user_id IN ($userId) "
                          . "and sttr_transaction_type IN ('newOrder') ORDER BY sttr_id ASC";
        //
        //
        //echo '</br>$updateProdQuery1 == ' . $updateProdQuery1 . '</br>';
        //
        //
        mysqli_query($conn, $updateProdQuery1);
        //
        //
    } else {
        //
        //
        if ($sttrMainOrderId != '') {
        //
        //   
        //$updateQuery = "UPDATE stock_transaction SET sttr_return_status = 'READY TO RETURN' "
        //             . "WHERE sttr_owner_id = '$sessionOwnerId' "
        //             . "AND sttr_firm_id IN ($strFrmId) "
        //             . "AND sttr_user_id = '$userId' "
        //             . "AND sttr_pre_invoice_no = '$sttrAssignPreInvoiceNo' "
        //             . "AND sttr_invoice_no = '$sttrAssignInvoiceNo' "
        //             . "AND sttr_indicator IN ('rawMetal', 'stockCrystal', 'crystal') "
        //             . "AND sttr_transaction_type IN ('sell') "
        //             . "AND sttr_assign_status = 'ASSIGNED' "
        //             . "AND (sttr_return_status = '' or sttr_return_status IS NULL) "
        //             . "AND sttr_status IN ('PaymentDone') ORDER BY sttr_id ASC";
        //
        //echo '</br>$updateQuery == ' . $updateQuery . '</br>';
        //
        //mysqli_query($conn, $updateQuery);
        //
        //
        $updateProdQuery1 = "UPDATE stock_transaction SET sttr_return_status = 'READY TO RETURN', "
                          . "sttr_return_user_id = '$userId' "
                          . "WHERE (sttr_id = '$sttrMainOrderId' or sttr_sttr_id = '$sttrMainOrderId') "
                          . "and sttr_owner_id = '$sessionOwnerId' "
                          . "and sttr_panel_name IN ('addNewOrder', 'CRYSTAL', 'CRYSTAL_ORDER', 'addNewOrderB2') "
                          . "and sttr_assign_pre_invoice_no = '$sttrAssignPreInvoiceNo' "
                          . "and sttr_assign_invoice_no = '$sttrAssignInvoiceNo' "
                          . "and sttr_indicator IN ('stock', 'stockCrystal') "
                          . "and sttr_status IN ('PaymentDone') "
                          . "and sttr_assign_status IN ('ASSIGNED') "
                          . "and (sttr_return_status = '' or sttr_return_status IS NULL) "
                          . "and sttr_assign_user_id IN ($userId) "
                          . "and sttr_transaction_type IN ('newOrder') ORDER BY sttr_id ASC";
        //
        mysqli_query($conn, $updateProdQuery1);
        //
        //echo '</br>$updateProdQuery1 == ' . $updateProdQuery1 . '</br>';
        //
        }
    }
}
// *********************************************************************************************************
// End Code to Return Orders From Return Order Panel @Author:PRIYANKA-15JULY2021
// *********************************************************************************************************
//
//
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
// START CODE TO GET ITEMS DETAILS IN ASC ORDER @PRIYANKA-23JUNE2021
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
// START CODE TO FETCH ITEMS @PRIYANKA-23JUNE2021
    $prodQuery1 = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' "
                . "and sttr_panel_name IN ('addNewOrder', 'CRYSTAL', 'CRYSTAL_ORDER', 'addNewOrderB2') "
                . "and sttr_indicator IN ('stock', 'stockCrystal') "
                . "and sttr_status IN ('PaymentDone') "
                . "and sttr_assign_status IN ('ASSIGNED') "
                . "and (sttr_return_date IS NULL OR sttr_return_date = '') "                
                . "and sttr_assign_user_id IN ($userId) "
                . "and (sttr_direct_assign_status != 'YES') "   
                . "and (sttr_assign_pre_invoice_no != '' and sttr_assign_invoice_no != '') "                
                . "and sttr_transaction_type IN ('newOrder') ORDER BY sttr_id ASC";
    //
    //echo '$prodQuery1 == ' . $prodQuery1 . '<br />';
    //
//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// END CODE TO GET ITEMS DETAILS IN ASC ORDER @PRIYANKA-23JUNE2021
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
//
//
$prodResult1 = mysqli_query($conn, $prodQuery1);
$totalEntries1 = mysqli_num_rows($prodResult1);
//
//
//echo '$totalEntries1 == ' . $totalEntries1 . '<br />';
//
//
$counter1 = 1;
//
//
?>
<table border="0" cellspacing="1" cellpadding="1" width="100%" 
           style="margin-bottom: 25px; margin-top: -11px;">  
        <tr>
            <td align="center" valign="middle">
                <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />
                <div id="messDisplayDiv"></div>
                <div class="analysis_div_rows main_link_green12">
                    <?php if ($messageDisplay != '' && $messageDisplay != NULL) { ?>
                        <div id="ajax_upated_div" style="visibility: visible; background:none;"> ~ <?php echo $messageDisplay; ?> ~ </div>
                    <?php } ?>                        
                </div>
            </td>
        </tr>       
        <?php 
        //
        // TOTAL NO OF ENTRIES @PRIYANKA-23JUNE2021
        if ($totalEntries1 > 0) { 
            //
            //
            //echo '$totalEntries1 == ' . $totalEntries1 . '<br />';
            //
            //
            ?>   
<!--            <tr>
                <td colspan="16" class="paddingTop5">
                </td>
            </tr>
            <tr>
                <td colspan="16" class="paddingTop5">
                    <div class="hrGold"></div>
                </td>
            </tr>-->
            <tr>
                <td align="center" width="100%">
                    <div id="estimateCurrentInvoice">
                        <table border="0" cellspacing="1" cellpadding="0" width="100%" align="left" style="border:1px solid #c1c1c1;">
                            <?php
                            //
                            $assignOrderCounter = 0;
                            //
                            $totalGdQty = 0;
                            $totalGdGsWt = 0;
                            $totalGdNtWt = 0;
                            $totalGdFnWt = 0;
                            $totalSlQty = 0;
                            $totalSlGsWt = 0;
                            $totalSlNtWt = 0;
                            $totalSlFnWt = 0;
                            $totalStQty = 0;
                            $totalStGsWt = 0;
                            $totalStNtWt = 0;
                            $totalStFnWt = 0;
                            while ($prodRow1 = mysqli_fetch_array($prodResult1)) {
                                //
                                $sttr_Id = $prodRow1['sttr_id'];
                                //
                                //echo '$sttr_Id == ' . $sttr_Id . '<br />';
                                //                                
                                $sttr_trans_Id = $prodRow1['sttr_trans_id'];
                                //
                                $preInvoice_No = $prodRow1['sttr_pre_invoice_no'];
                                $postInvoice_No = $prodRow1['sttr_invoice_no'];
                                //
                                $PrePost_InvoiceNumber = $preInvoice_No . $postInvoice_No;
                                //
                                //
                                $AssignPreInvoice_No = $prodRow1['sttr_assign_pre_invoice_no'];
                                $AssignPostInvoice_No = $prodRow1['sttr_assign_invoice_no'];
                                //
                                $AssignPrePost_InvoiceNumber = $AssignPreInvoice_No . $AssignPostInvoice_No;
                                //
                                //
                                //if ($prodRow1['sttr_indicator'] != 'stockCrystal' && 
                                //    $prodRow1['sttr_return_status'] == 'RETURNED') { 
                                    //
                                    //
                                    if ($prodRow1['sttr_product_type'] == 'Gold' || 
                                        $prodRow1['sttr_product_type'] == 'GOLD' || 
                                        $prodRow1['sttr_product_type'] == 'gold') { 
                                        //
                                        $totalGdQty += $prodRow1['sttr_quantity'];
                                        $totalGdGsWt += getTotalWeight($prodRow1['sttr_gs_weight'], $prodRow1['sttr_gs_weight_type'], 'weight');
                                        $totalGdNtWt += getTotalWeight($prodRow1['sttr_nt_weight'], $prodRow1['sttr_gs_weight_type'], 'weight');
                                        $totalGdFnWt += getTotalWeight($prodRow1['sttr_fine_weight'], $prodRow1['sttr_gs_weight_type'], 'weight');
                                        //
                                    }
                                    //
                                    //
                                    if ($prodRow1['sttr_product_type'] == 'Silver' || 
                                        $prodRow1['sttr_product_type'] == 'SILVER' || 
                                        $prodRow1['sttr_product_type'] == 'silver') { 
                                        //
                                        $totalSlQty += $prodRow1['sttr_quantity'];
                                        $totalSlGsWt += getTotalWeight($prodRow1['sttr_gs_weight'], $prodRow1['sttr_gs_weight_type'], 'weight');
                                        $totalSlNtWt += getTotalWeight($prodRow1['sttr_nt_weight'], $prodRow1['sttr_gs_weight_type'], 'weight');
                                        $totalSlFnWt += getTotalWeight($prodRow1['sttr_fine_weight'], $prodRow1['sttr_gs_weight_type'], 'weight');
                                        //
                                    }
                                    //
                                    // 
                                    if ($prodRow1['sttr_product_type'] == 'crystal' || 
                                        $prodRow1['sttr_product_type'] == 'Crystal' || 
                                        $prodRow1['sttr_product_type'] == 'CRYSTAL' ||
                                        $prodRow1['sttr_product_type'] == 'STONE' ||
                                        $prodRow1['sttr_product_type'] == 'Stone' ||
                                        $prodRow1['sttr_product_type'] == 'stone' ||
                                        $prodRow1['sttr_metal_type'] == 'crystal' || 
                                        $prodRow1['sttr_metal_type'] == 'Crystal' || 
                                        $prodRow1['sttr_metal_type'] == 'CRYSTAL' ||
                                        $prodRow1['sttr_metal_type'] == 'STONE' ||
                                        $prodRow1['sttr_metal_type'] == 'Stone' ||
                                        $prodRow1['sttr_metal_type'] == 'stone') { 
                                        // 
                                        $totalStQty += $prodRow1['sttr_quantity'];
                                        $totalStGsWt += getTotalCrystalWeight($prodRow1['sttr_gs_weight'], $prodRow1['sttr_gs_weight_type'], '');
                                        $totalStNtWt += getTotalCrystalWeight($prodRow1['sttr_nt_weight'], $prodRow1['sttr_gs_weight_type'], '');
                                        $totalStFnWt += getTotalCrystalWeight($prodRow1['sttr_fine_weight'], $prodRow1['sttr_gs_weight_type'], '');
                                        //
                                    } 
                                    //                                    
                                    //                                                                                                        
                                //}
                                //
                                //
                                //if ($prodRow1['sttr_return_status'] == 'RETURNED') {
                                    //
                                    if ($totalGdGsWt > 0) {
                                        $displayGoldTotalRow = 'Y';
                                    }
                                    //
                                    if ($totalSlGsWt > 0) {
                                        $displaySilverTotalRow = 'Y';
                                    }
                                    //
                                    if ($totalStGsWt > 0) {
                                        $displayStoneTotalRow = 'Y';
                                    }
                                //}
                                //
                                //
                                //echo '$totalGdGsWt == ' . $totalGdGsWt . '<br />';
                                //echo '$totalGdNtWt == ' . $totalGdNtWt . '<br />';
                                //echo '$totalGdFnWt == ' . $totalGdFnWt . '<br />';
                                //
                                //
                                parse_str(getTableValues("SELECT firm_name FROM firm WHERE firm_id = '$prodRow1[sttr_firm_id]'"));
                                //
                                //
                                if ($counter1 == 1) { ?>
                                    <tr style='background: #FFE34F;'>
                                        <td align="center" class="textLabel14CalibriBrownBold" width="140px" title="ASSIGN DATE" style='border-right: 1px solid #c1c1c1;'>
                                            DATE
                                        </td>
                                        <td align="center" class="textLabel14CalibriBrownBold" width="70px" title="ORDER NO" style='border-right: 1px solid #c1c1c1;'>
                                            ORDER
                                        </td>
                                        <td align="center" class="textLabel14CalibriBrownBold" width="70px" title="ASSIGNED INV NO" style='border-right: 1px solid #c1c1c1;'>
                                            INV
                                        </td>
                                        <td align="center" class="textLabel14CalibriBrownBold" width="70px" title="FIRM" style='border-right: 1px solid #c1c1c1;'>
                                            FIRM
                                        </td>
                                        <td align="center" class="textLabel14CalibriBrownBold" width="70px" title="METAL" style='border-right: 1px solid #c1c1c1;'>
                                            METAL
                                        </td>
                                        <td align="center" class="textLabel14CalibriBrownBold" width="90px" title="CATEGORY" style='border-right: 1px solid #c1c1c1;'>
                                            CATEGORY
                                        </td>
                                        <td align="center" class="textLabel14CalibriBrownBold" width="145px" title="NAME" style='border-right: 1px solid #c1c1c1;'>
                                            NAME
                                        </td> 
                                        <td align="center" class="textLabel14CalibriBrownBold" width="70px" title="QTY" style='border-right: 1px solid #c1c1c1;'>
                                           QTY
                                        </td> 
                                        <td align="center" class="textLabel14CalibriBrownBold" width="110px" title="GS WT" style='border-right: 1px solid #c1c1c1;'>
                                            GS WT
                                        </td>  
                                        <td align="center" class="textLabel14CalibriBrownBold" width="100px" title="NT WT" style='border-right: 1px solid #c1c1c1;'>
                                            NT WT
                                        </td>  
                                        <td align="center" class="textLabel14CalibriBrownBold" width="70px" title="PURITY" style='border-right: 1px solid #c1c1c1;'>
                                            PURITY
                                        </td>
                                        <td align="center" class="textLabel14CalibriBrownBold" width="100px" title="FN WT" style='border-right: 1px solid #c1c1c1;'>
                                            FN WT
                                        </td> 
                                        <td align="center" class="textLabel14CalibriBrownBold" width="70px" title="RATE" style='border-right: 1px solid #c1c1c1;'>
                                            RATE
                                        </td>
                                        <td align="center" class="textLabel14CalibriBrownBold" width="80px" title="AMOUNT" style='border-right: 1px solid #c1c1c1;'>
                                            AMT
                                        </td>  
                                        <td align="center" class="textLabel14CalibriBrownBold" width="70px" title="STATUS" style='border-right: 1px solid #c1c1c1;'>
                                            STATUS
                                        </td>
                                        <td align="center" class="textLabel14CalibriBrownBold" width="180px" title="RETURN" style='border-right: 1px solid #c1c1c1;'>
                                            RETURN
                                        </td>
                                        <td align="center" class="textLabel14CalibriBrownBold" width="30px" title="PANEL" style='border-right: 1px solid #c1c1c1;'>
                                            PANEL
                                        </td>                                        
                                        <!--<td align="center" class="textLabel14CalibriBrownBold" width="30px" title="DELETE">
                                            DEL
                                        </td>-->
                                    </tr>
                                <?php } $counter1 = 2;
                                ?>
                                <?php
                                //
                                $div = $_REQUEST['divName'];
                                //
                                //echo '$div == ' . $div . '<br />';
                                //
                                ?>
                                <tr>
                                    <td align="left" class="amount" title="ASSIGN DATE"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-left:5px;"
                                    <?php } ?>>
                                        <?php
                                        if ($prodRow1['sttr_assign_date'] != '' && $prodRow1['sttr_indicator'] != 'stockCrystal') {
                                              if($nepaliDateIndicator == 'YES'){
                                              $sttr_assign_date = $prodRow1['sttr_assign_date'];
                                              $timestamp = strtotime($sttr_assign_date);
                                              $Day = date('j', $timestamp);
                                              $month_number = date('n', $timestamp);
                                              $Year = date('Y', $timestamp);
                                              $sttr_assign_date = $Day.' '.$month_number.' '.$Year;
                                              $date_components = explode(' ', $sttr_assign_date);

                                                $date_d = $date_components[0];
                                                $selMnth = $date_components[1];
                                                $date_y = $date_components[2];
                                                $date_ne = $nepali_date->get_nepali_date($date_y,$selMnth,$date_d);
                                                if($nepaliDateMonthFormat == 'displayInWord'){
                                                    echo $date_ne[d].' '.$date_ne[M].' '.$date_ne[y];
                                                }else{
                                                     echo $date_ne[d].' '.$date_ne[m].' '.$date_ne[y];
                                                }
                                                
                                            }else{
                                            echo $prodRow1['sttr_assign_date'];
                                            }
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                    
                                    <td align="left" class="amount" title="ORDER NO"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-left:5px;"
                                    <?php } ?>>
                                        <?php
                                        if ($PrePost_InvoiceNumber != '') {
                                            echo $PrePost_InvoiceNumber;
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    
                                    <td align="left" class="amount" title="ASSIGNED INV NO"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-left:5px;"
                                    <?php } ?>>
                                        <?php
                                        if ($AssignPrePost_InvoiceNumber != '') {
                                            echo $AssignPrePost_InvoiceNumber;
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    
                                    <td align="left" class="amount" title="FIRM" 
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-left:5px;"
                                    <?php } ?>>
                                        <?php echo $firm_name; ?>
                                    </td>
                                    
                                    <td align="left" class="amount" title="METAL"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-left:5px;"
                                    <?php } ?>>
                                        <?php
                                        if ($prodRow1['sttr_metal_type'] != '') {
                                            echo strtoupper($prodRow1['sttr_metal_type']);
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>

                                    <td align="left" class="amount" title="CATEGORY"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-left:5px;"
                                    <?php } ?>>
                                        <?php
                                        if ($prodRow1['sttr_item_category'] != '') {
                                            echo $prodRow1['sttr_item_category'];
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>

                                    <td align="left" class="amount" title="NAME"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-left:5px;"
                                    <?php } ?>>
                                        <?php
                                        if ($prodRow1['sttr_item_name'] != '') {
                                            echo $prodRow1['sttr_item_name'];
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    
                                    <td align="right" class="amount" title="QTY"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-left:5px;"
                                    <?php } ?>>
                                        <?php
                                        if ($prodRow1['sttr_quantity'] != '') {
                                            echo $prodRow1['sttr_quantity'];
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>

                                    <td align="right" class="amount" title="GS WT"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-right:5px;"
                                    <?php } ?>>
                                        <?php
                                        if ($prodRow1['sttr_gs_weight'] != '') {
                                            echo $prodRow1['sttr_gs_weight'] . " " . $prodRow1['sttr_gs_weight_type'];
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    
                                    <td align="right" class="amount" title="NT WT"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-right:5px;"
                                    <?php } ?>>
                                        <?php
                                        if ($prodRow1['sttr_nt_weight'] != '') {
                                            echo $prodRow1['sttr_nt_weight'] . " " . $prodRow1['sttr_gs_weight_type'];
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    
                                    <td align="right" class="amount" title="PURITY"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-right:5px;"
                                    <?php } ?>>
                                        <?php
                                        if ($prodRow1['sttr_purity'] != '') {
                                            echo $prodRow1['sttr_purity'] . " %";
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                    
                                    <td align="right" class="amount" title="FN WT"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-right:5px;"
                                    <?php } ?>>
                                        <?php
                                        if ($prodRow1['sttr_fine_weight'] != '') {
                                            echo $prodRow1['sttr_fine_weight'] . " " . $prodRow1['sttr_gs_weight_type'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                   
                                    <td align="right" class="amount" title="RATE"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-right:5px;"
                                    <?php } ?>>
                                        <?php
                                        if ($prodRow1['sttr_product_sell_rate'] != '') {
                                            echo $prodRow1['sttr_product_sell_rate'];
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>

                                    <td align="right" class="amount" title="AMOUNT"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:blue;border-right: 1px solid #c1c1c1;padding-right:5px;"
                                    <?php } ?>>
                                        <?php
                                        if ($prodRow1['sttr_valuation'] != '') {
                                            echo $prodRow1['sttr_valuation'];
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>     
                                    
                                    <td align="right" class="amount" title="AMOUNT"
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                       style="color:green;border-right: 1px solid #c1c1c1;padding-right:5px;"
                                    <?php } ?> >
                                        <?php
                                        if ($prodRow1['sttr_assign_status'] != '') {
                                            if ($prodRow1['sttr_indicator'] != 'stockCrystal') {
                                                echo $prodRow1['sttr_assign_status'];
                                            } else {
                                                
                                            }
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>  
                                    
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal' && 
                                              $prodRow1['sttr_return_status'] != 'READY TO RETURN' && 
                                              $prodRow1['sttr_return_status'] != 'RETURNED') { ?>
                                    <td align="left" valign="bottom" title="RETURN" style='border-right: 1px solid #c1c1c1;padding-left:5px;'>                                    
                                                    <div id="returnOrderButtDiv"> 
                                                        <?php
                                                        //
                                                        //* ************************************************************************************************
                                                        //* ORDER RETURN BY KARIGAR @PRIYANKA-12JULY2021
                                                        //* ************************************************************************************************
                                                        // 
                                                        // // This is the main division class for input filed
                                                        // 
                                                        $orderPanelName = 'ReturnOrderAssignPanel';
                                                        //
                                                        // Input Box Type and Ids
                                                        $inputType = 'submit';
                                                        $inputIdButton = 'returnOrdCustButt';
                                                        $inputNameButton = 'returnOrdCustButt';
                                                        //
                                                        //
                                                        // This is the main class for input flied
                                                        $inputFieldClass = 'btn btn-primary';
                                                        //
                                                        $inputStyle = 'height:22px;width:80px;font-weight:bold;font-size:12px;'
                                                                    . 'padding-top:0px;margin-top:5px;margin-bottom:5px;'
                                                                    . 'text-align:center;color:white;margin-left:25px;background-color: green;';
                                                        //
                                                        $inputLabel = 'RETURN'; // Display Label 
                                                        //
                                                        //
                                                        // This class is for Pencil Icon                                                           
                                                        $inputIconClass = 'fa fa-inr';
                                                        // 
                                                        // Place Holder inside input box
                                                        $inputPlaceHolder = 'RETURN';
                                                        //
                                                        // Place Holder in span outside input box
                                                        $spanPlaceHolderClass = '';
                                                        $spanPlaceHolder = '';
                                                        // 
                                                        // Event Options
                                                        //
                                                        // On Change Function
                                                        $inputOnChange = "";
                                                        $inputKeyUpFun = '';
                                                        //
                                                        $inputOnClickFun = 'returnOrderAssignFunction("' . $sttr_Id . '", "' . $userId . '", "' . $AssignPreInvoice_No . '", "' . $AssignPostInvoice_No . '", "' . $orderPanelName . '", "' . $sttr_trans_Id . '");';
                                                        //
                                                        $inputDropDownCls = '';               // This is the main division class for drop down 
                                                        $inputselDropDownCls = '';            // This is class for selection in drop down
                                                        $inputMainClassButton = '';           // This is the main division for Button
                                                        // 
                                                        //* **************************************************************************************
                                                        //* End Input Area 
                                                        //* **************************************************************************************
                                                        include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                                                        //
                                                        //}
                                                        ?>
                                                    </div>
                                        
                                            <!--<img src="<?php echo $documentRootBSlash; ?>/images/submit16.png" 
                                                 onclick="returnOrderAssignFunc('<?php echo $sttr_Id; ?>', '<?php echo $userId; ?>', '<?php echo $AssignPreInvoice_No; ?>', '<?php echo $AssignPostInvoice_No; ?>', 'ReturnOrderAssignPanel', '<?php echo $sttr_trans_Id; ?>');"
                                                 alt='RETURN' 
                                                 title='RETURN'
                                                 style="cursor: pointer; margin-right: 10px;" />-->
                                    </td>
                                    <?php } ?>
                                    
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal' && 
                                             ($prodRow1['sttr_return_status'] == 'READY TO RETURN' || 
                                              $prodRow1['sttr_return_status'] == 'RETURNED')) { ?>
                                            <td align="center" class="amount" title="RETURN"
                                                <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal' && 
                                                          $prodRow1['sttr_return_status'] == 'RETURNED') { ?>  
                                                        style="color:#5CB85C;border-right: 1px solid #c1c1c1;padding-left:5px;"
                                                <?php } else { ?> 
                                                        style="color:blue;"
                                                <?php } ?> >
                                                <?php
                                                    if ($prodRow1['sttr_return_status'] != '') {
                                                        echo $prodRow1['sttr_return_status'];
                                                    } else {
                                                        echo '-';
                                                    }
                                                ?>
                                            </td>  
                                    <?php } ?>
                                     
                                    <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>         
                                    <td align="center" class="amount" style='border-right: 1px solid #c1c1c1;padding-left:5px;'>                                    
                                        <div style="text-align:center;">
                                            <img src="<?php echo $documentRootBSlash; ?>/images/img/right-arrow.png" 
                                                 onclick="navigatationPanelByFileName('mainBigMiddle', 'omcdccdd', 'ReadyOrdersPanel', '', 'PURBYSUPP', '', '', 'stock', '<?php echo $userId; ?>', '', 'CustHome', '', '<?php echo $prodRow1[sttr_firm_id]; ?>');"
                                                 alt='GO TO READY ORDERS PANEL' 
                                                 title='GO TO READY ORDERS PANEL'
                                                 style="cursor: pointer;height:18px;" />
                                        </div>
                                    </td> 
                                    <?php } ?>
                                    
                                    <!--<td align="right" valign="bottom" width="30px">                                    
                                        <div style="text-align:center;">
                                            <?php if ($prodRow1['sttr_indicator'] != 'stockCrystal') { ?>  
                                            <img src="<?php echo $documentRootBSlash; ?>/images/delete16.png" 
                                                 onclick="deleteAssignRepairOrder('DeleteAssignRepairOrder', '<?php echo $sttr_Id; ?>', '<?php echo $prodRow1[sttr_assign_user_id]; ?>', '<?php echo $sttr_trans_Id; ?>');"
                                                 alt='DELETE' 
                                                 title='DELETE' style="cursor: pointer;" />
                                            <?php } ?>
                                        </div>
                                    </td>-->
                                    
                                <?php } ?>
                            </tr>
                        <?php
                        $assignOrderCounter++;
                        ?>
                        <tr>
                            <td colspan="18" class="paddingTop5">
                                <div class="hrGold"></div>
                            </td>
                        </tr>
                        
                        <?php if ($displayGoldTotalRow == 'Y') { ?>
                        <tr>
                            <td colspan="6"></td>
                            <td align="right" class="textLabel14CalibriBrownBold" 
                                title="GOLD TOTAL" style="padding-right: 2px;border-right: 1px solid #c1c1c1;padding-left:5px;">
                                GOLD TOTAL :
                            </td>
                            <td align="right" class="amount">
                                <?php
                                if ($totalGdQty != '') {
                                    echo $totalGdQty;
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td align="right" class="amount" title="TOTAL GD GS WT" style='border-right: 1px solid #c1c1c1;padding-right:10px;'>
                                <?php
                                if ($totalGdGsWt != '') {
                                    echo decimalVal($totalGdGsWt, 3) . ' ' . 'GM';
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td align="right" class="amount" title="TOTAL GD NT WT" style='border-right: 1px solid #c1c1c1;padding-right:10px;'>
                                <?php
                                if ($totalGdNtWt != '') {
                                    echo decimalVal($totalGdNtWt, 3) . ' ' . 'GM';
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td></td>
                            <td align="right" class="amount" title="TOTAL GD FN WT" style='border-right: 1px solid #c1c1c1;padding-right:10px;'>
                                <?php
                                if ($totalGdFnWt != '') {
                                    echo decimalVal($totalGdFnWt, 3) . ' ' . 'GM';
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td></td> 
                            <td></td>                                
                            <td></td>
                            <td></td>
                        </tr>                        
                        <tr>
                            <td colspan="18" class="paddingTop5">
                                <div class="hrGold"></div>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if ($displaySilverTotalRow == 'Y') { ?>
                        <tr>
                            <td colspan="6"></td>
                            <td align="right" class="textLabel14CalibriBrownBold" 
                                title="SILVER TOTAL" style="padding-right: 2px;border-right: 1px solid #c1c1c1;padding-left:5px;">
                                SILVER TOTAL :
                            </td>
                            <td align="right" class="amount" style='border-right: 1px solid #c1c1c1;padding-left:5px;'>
                                <?php
                                if ($totalSlQty != '') {
                                    echo $totalSlQty;
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td align="right" class="amount" title="TOTAL SL GS WT" style='border-right: 1px solid #c1c1c1;padding-left:5px;'>
                                <?php
                                if ($totalSlGsWt != '') {
                                    echo decimalVal($totalSlGsWt, 3) . ' ' . 'GM';
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td align="right" class="amount" title="TOTAL SL NT WT" style='border-right: 1px solid #c1c1c1;padding-left:5px;'>
                                <?php
                                if ($totalSlNtWt != '') {
                                    echo decimalVal($totalSlNtWt, 3) . ' ' . 'GM';
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td></td>
                            <td align="right" class="amount" title="TOTAL SL FN WT" style='border-right: 1px solid #c1c1c1;padding-left:5px;'>
                                <?php
                                if ($totalSlFnWt != '') {
                                    echo decimalVal($totalSlFnWt, 3) . ' ' . 'GM';
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td></td> 
                            <td></td>                                
                            <td></td>
                            <td></td>
                        </tr>                        
                        <tr>
                            <td colspan="18" class="paddingTop5">
                                <div class="hrGold"></div>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if ($displayStoneTotalRow == 'Y') { ?>
                        <tr>
                            <td colspan="6"></td>
                            <td align="right" class="textLabel14CalibriBrownBold" 
                                title="STONE TOTAL" style="padding-right: 2px;border-right: 1px solid #c1c1c1;padding-left:5px;">
                                STONE TOTAL :
                            </td>
                            <td align="right" class="amount" style='border-right: 1px solid #c1c1c1;padding-left:5px;'>
                                <?php
                                if ($totalStQty != '') {
                                    echo $totalStQty;
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td align="right" class="amount" style='border-right: 1px solid #c1c1c1;padding-left:5px;'>
                                <?php
                                if ($totalStGsWt != '') {
                                    echo decimalVal(($totalStGsWt * 5), 3) . ' ' . 'CT';
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td align="right" class="amount" style='border-right: 1px solid #c1c1c1;padding-left:5px;'>
                                <?php
                                if ($totalStNtWt != '') {
                                    echo decimalVal(($totalStNtWt * 5), 3) . ' ' . 'CT';
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td></td>
                            <td align="right" class="amount" style='border-right: 1px solid #c1c1c1;padding-left:5px;'>
                                <?php
                                echo '';
                                ?>
                            </td>
                            <td></td> 
                            <td></td>                                
                            <td></td>
                            <td></td>
                        </tr>                        
                        <tr>
                            <td colspan="18" class="paddingTop5">
                                <div class="hrGold"></div>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</div>
<br/>