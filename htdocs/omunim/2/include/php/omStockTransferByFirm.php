<?php

/*
 * **************************************************************************************
 * @Description: STOCK TRANSFER BY FIRM @PRIYANKA-26NOV2021
 * **************************************************************************************
 *
 * Created on NOV 26, 2021 07:12:00 PM 
 * **************************************************************************************
 * @FileName: omStockTransferByFirm.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.102
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * *****************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE: @PRIYANKA-26NOV2021
 *  AUTHOR: 
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 2.7.102
 * Version: 2.7.102
 * Website: http://www.omunim.com/
 * Contact: info@omunim.com
 * Follow: www.twitter.com/omunim
 * Like: www.facebook.com/omunim
 * Purchase: http://www.omunim.com/buy.html
 * License: You must have a valid license purchased only from Online Munim.
 */
?>
<?php

$currentFileName = basename(__FILE__);
$accFileName = $currentFileName;
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include 'ommpsbac.php';
include_once 'ommpfndv.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
$staffId = $_SESSION['sessionStaffId'];
?>
<?php

//
//
// NEW STAFF SELECTED VARIABLE @PRIYANKA-27NOV2021
$selectedStaff = $_GET['selectedStaff'];
//
//
// NEW COUNTER SELECTED VARIABLE @PRIYANKA-27NOV2021
$productCounter = $_GET['productCounter'];
//
//
// NEW FIRM SELECTED VARIABLE @PRIYANKA-27NOV2021
$selectedFirm = $_GET['selectedFirm'];
//
//
// PRODUCT DETAILS @PRIYANKA-05AUG2022
parse_str(getTableValues(" SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                . " AND sttr_transaction_type IN ('EXISTING','PURONCASH','TAG','PURBYSUPP') "
                . " $conditionStr "));
//
//
// PRODUCT DETAILS - PREVIOUS COUNTER VARIABLE @PRIYANKA-27NOV2021
//$productCounterOld = $sttr_counter_name;
//
// PRODUCT DETAILS - PREVIOUS STAFF VARIABLE @PRIYANKA-27NOV2021
//$selectedStaffOld = $sttr_staff_id;
//
// PRODUCT DETAILS - PREVIOUS FIRM VARIABLE @PRIYANKA-27NOV2021
//$selectedFirmOld = $sttr_firm_id;
//
//
//echo '$selectedFirmOld == ' . $selectedFirmOld . '<br />';
//echo '$selectedFirm == ' . $selectedFirm . '<br />';
//
//
// IF NEW FIRM AND PREVIOUS FIRM ARE DIFFERENT - THEN ONLY STOCK TRANSFER WILL PROCESS @PRIYANKA-27NOV2021
if ($selectedFirm != $sttr_firm_id) {
//
//
// FOR INDICATOR @PRIYANKA-27NOV2021
    if ($sttr_indicator == 'AddInvoice') {
        $sttr_indicator = 'stock';
    }
//
//
// TO DELETE STOCK FROM PREVIOUS FIRM @PRIYANKA-27NOV2021
    parse_str(getTableValues("SELECT * FROM stock WHERE st_owner_id = '$_SESSION[sessionOwnerId]' "
                    . "AND st_metal_type = '$sttr_metal_type' "
                    . "AND st_item_name = '$sttr_item_name' "
                    . "AND st_item_category = '$sttr_item_category' "
                    . "AND st_stock_type = '$sttr_stock_type' "
                    . "AND st_purity = '$sttr_purity' "
                    . "AND st_firm_id = '$sttr_firm_id' "
                    . "AND st_type = '$sttr_indicator'"));
//
//
// TO DELETE PRODUCT FROM PREVIOUS FIRM @PRIYANKA-27NOV2021
    
    $stockNewQty = ($st_quantity - $sttr_quantity);
    $stockNewPktWT = ($st_pkt_weight - $sttr_pkt_weight);
    $stockNewGSW = ($st_gs_weight - $sttr_gs_weight);
    $stockNewNTW = ($st_nt_weight - $sttr_nt_weight);
    $stockNewLabChrgs = ($st_lab_charges - $sttr_lab_charges);
    $stockNewMkgChrgs = ($st_making_charges - $sttr_making_charges);
    $stockNewFineWt = ($st_fine_weight - $sttr_fine_weight);
    $stockNewFinalFineWt = ($st_final_fine_weight - $sttr_final_fine_weight);
    $stockNewTax = ($st_tax - $sttr_tax);
    $stockNewTotTax = ($st_tot_tax - $sttr_tot_tax);
    $stockNewVal = ($st_valuation - $sttr_valuation);
    $stockNewFinalVal = ($st_final_valuation - $sttr_final_valuation);
//
//
// TO GET DETAILS OF STOCK FROM PREV FIRM TO DELETE PRODUCT / STOCK FROM IT @PRIYANKA-27NOV2021
    $query = "SELECT * FROM stock WHERE st_owner_id = '$_SESSION[sessionOwnerId]' "
            . "AND st_metal_type = '$sttr_metal_type' "
            . "AND st_item_name = '$sttr_item_name' "
            . "AND st_item_category = '$sttr_item_category' "
            . "AND st_stock_type = '$sttr_stock_type' "
            . "AND st_purity = '$sttr_purity' "
            . "AND st_firm_id = '$sttr_firm_id' "
            . "AND st_type = '$sttr_indicator'";
//
    $result = mysqli_query($conn, $query);
//
    $rowPrevStock = mysqli_fetch_array($result, MYSQLI_ASSOC);
//
// MAIN STOCK TABLE ENTRY ID @PRIYANKA-27NOV2021
    $stId = $rowPrevStock['st_id'];
//
// NO. OF ROWS @PRIYANKA-27NOV2021
    $noOfStockAvailable = mysqli_num_rows($result);
//
// IF NO. OF ROWS ARE PRESENT IN STOCK TABLE THEN MINUS PREV STOCK FROM IT (UPDATE STOCK TABLE) @PRIYANKA-27NOV2021
    if ($noOfStockAvailable > 0) {
        //
        $qUpdateProduct = "UPDATE stock SET st_quantity = '$stockNewQty', "
                . "st_gs_weight = '$stockNewGSW', st_nt_weight = '$stockNewNTW', "
                . "st_pkt_weight = '$stockNewPktWT', "
                . "st_fine_weight = '$stockNewFineWt', st_final_fine_weight = '$stockNewFinalFineWt', "
                . "st_lab_charges = '$stockNewLabChrgs', st_making_charges = '$stockNewMkgChrgs', "
                . "st_tax = '$stockNewTax', st_tot_tax = '$stockNewTotTax', "
                . "st_valuation = '$stockNewVal', st_final_valuation = '$stockNewFinalVal' "
                . "WHERE st_id = '$stId'";
        //
        if (!mysqli_query($conn, $qUpdateProduct)) {
            die('Error: ' . mysqli_error($conn));
        } else {
            $firmId = $sttr_firm_id;
            //   START MAIN STOCK JOURNAL
            if (0 < $sttr_valuation) {

                $metalType = $sttr_metal_type;
                //
                if ($metalType == 'Gold' || $metalType == 'GOLD') {
                    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Gold'"));
                    $accId = $acc_id;
                }
                //
                if ($metalType == 'Silver' || $metalType == 'SILVER') {
                    parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Silver'"));
                    $accId = $acc_id;
                }
                $selAccName = "SELECT acc_id, acc_user_acc,acc_user_acc FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and "
                        . "acc_firm_id='$firmId' and acc_user_acc='Sundry Debtors'";
//
                $resAccName = mysqli_query($conn, $selAccName);
                $rowAccName = mysqli_fetch_array($resAccName, MYSQLI_ASSOC);
                $SundryDebAccId = $rowAccName['acc_id'];
                //
                $payFinalPayableAmt = $sttr_valuation;
                $jrnlOwnId = $sessionOwnerId;
                $jrnlJId = '';
                $jrnlUserId = '';
                $jrnlUserType = '';
                $jrnlTransId = '';
                $jrnlTransType = 'STOCK';
                $jrnlFirmId = $firmId;
                $jrnlTTDr = $payFinalPayableAmt;
                $jrnlTTCr = $payFinalPayableAmt;
                $jrnlCrAccId = $SundryDebAccId;
                $jrnlCrDesc = "$acc_user_acc(Stock Tranfer)";
                $jrnlDesc = 'Stock Transfer';
                $jrnlOthInfo = '';
                $jrnlDOB = date('d M Y');
                $apiType = 'insert';
                include 'ommpjrnl.php';
                //
                //
                $qSelJournalEntry = "SELECT * FROM journal where jrnl_own_id='$sessionOwnerId' order by jrnl_id desc LIMIT 0,1";
                $resJournalEntry = mysqli_query($conn, $qSelJournalEntry);
                $rowJournalEntry = mysqli_fetch_array($resJournalEntry);
                $jrnlId = $rowJournalEntry['jrnl_id'];
                //
                //
                if ($payFinalPayableAmt > 0) {
                    $jrtrJId = '';
                    $jrtrJrnlId = $jrnlId;
                    $jrtrOwnId = $sessionOwnerId;
                    $jrtrUserId = '';
                    $jrtrUserType = '';
                    $jrtrTransId = '';
                    $jrtrTransType = 'STOCK';
                    $jrtrFirmId = $firmId;
                    $jrtrTransCRDR = 'CR';
                    $jrtrDrAmt = '';
                    $jrtrDrAccId = '';
                    $jrtrDrDesc = '';
                    $jrtrCrAmt = $payFinalPayableAmt;
                    $jrtrCrAccId = $accId;
                    $jrtrCrDesc = "$acc_user_acc(Stock Tranfer)";
                    $jrtrDesc = 'Stock Transfer';
                    $jrtrOthInfo = '';
                    $jrtrDOB = date('d M Y');
                    //    
                    $apiType = 'insert';
                    include 'ommpjrtr.php';
                }
            }
            //   END MAIN STOCK JOURNAL
            //        UPDATE STOCK TRANSACTION JOURNAL ID COLUMN 
             $qUpdateJournalEntry = "UPDATE stock_transaction SET sttr_jrnl_id = '$jrnlId' where sttr_owner_id = '$_SESSION[sessionOwnerId]' $conditionStr";
            //
            if (!mysqli_query($conn, $qUpdateJournalEntry)) {
                die('Error: ' . mysqli_error($conn));
            }
            //  START STOCK STONE JOURNAL
            if (0 < $sttr_stone_valuation) {

                parse_str(getTableValues("SELECT acc_id,acc_user_acc FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Stone'"));
                $accId = $acc_id;

                //
                if ($sttr_stone_valuation > 0) {
                    $jrtrJId = '';
                    $jrtrJrnlId = $jrnlId;
                    $jrtrOwnId = $sessionOwnerId;
                    $jrtrUserId = '';
                    $jrtrUserType = '';
                    $jrtrTransId = '';
                    $jrtrTransType = 'STOCK';
                    $jrtrFirmId = $firmId;
                    $jrtrTransCRDR = 'CR';
                    $jrtrDrAmt = '';
                    $jrtrDrAccId = '';
                    $jrtrDrDesc = '';
                    $jrtrCrAmt = $sttr_stone_valuation;
                    $jrtrCrAccId = $accId;
                    $jrtrCrDesc = "$acc_user_acc(Stock Tranfer)";
                    $jrtrDesc = 'Stock Transfer';
                    $jrtrOthInfo = '';
                    $jrtrDOB = date('d M Y');
                    //    
                    $apiType = 'insert';
                    include 'ommpjrtr.php';
                }
            }
            //  END STOCK STONE JOURNAL
        }
    }
//
//
//
// TO GET DETAILS OF STOCK FROM NEW FIRM TO ADD NEW PRODUCT INTO IT @PRIYANKA-27NOV2021
//parse_str(getTableValues("SELECT * FROM stock WHERE st_owner_id = '$_SESSION[sessionOwnerId]' "
//                       . "AND st_metal_type = '$sttr_metal_type' "
//                       . "AND st_item_name = '$sttr_item_name' "
//                       . "AND st_item_category = '$sttr_item_category' "
//                       . "AND st_stock_type = '$sttr_stock_type' "
//                       . "AND st_purity = '$sttr_purity' "
//                       . "AND st_firm_id = '$selectedFirm' "
//                       . "AND st_type = '$sttr_indicator'"));
////
////
//$stockNewQty = ($st_quantity + $sttr_quantity);
//$stockNewPktWT = ($st_pkt_weight + $sttr_pkt_weight);
//$stockNewGSW = ($st_gs_weight + $sttr_gs_weight);
//$stockNewNTW = ($st_nt_weight + $sttr_nt_weight);
//$stockNewLabChrgs = ($st_lab_charges + $sttr_lab_charges);
//$stockNewMkgChrgs = ($st_making_charges + $sttr_making_charges);
//$stockNewFineWt = ($st_fine_weight + $sttr_fine_weight);
//$stockNewFinalFineWt = ($st_final_fine_weight + $sttr_final_fine_weight);
//$stockNewTax = ($st_tax + $sttr_tax);
//$stockNewTotTax = ($st_tot_tax + $sttr_tot_tax);
//$stockNewVal = ($st_valuation + $sttr_valuation);
//$stockNewFinalVal = ($st_final_valuation + $sttr_final_valuation);
////
////
//// TO GET DETAILS OF STOCK FROM NEW FIRM TO ADD NEW PRODUCT INTO IT @PRIYANKA-27NOV2021
//$queryNewStock = "SELECT * FROM stock WHERE st_owner_id = '$_SESSION[sessionOwnerId]' "
//               . "and st_metal_type = '$sttr_metal_type' "
//               . "and st_item_name = '$sttr_item_name' "
//               . "and st_item_category = '$sttr_item_category' "
//               . "and st_stock_type = '$sttr_stock_type' "
//               . "and st_purity = '$sttr_purity' "
//               . "and st_firm_id = '$selectedFirm' "
//               . "and st_type = '$sttr_indicator'";
////
//$resultNewStock = mysqli_query($conn, $queryNewStock);
////
//$rowNewStock = mysqli_fetch_array($resultNewStock, MYSQLI_ASSOC);
////
//// MAIN STOCK TABLE ENTRY ID @PRIYANKA-27NOV2021
//$stIdNewStock = $rowNewStock['st_id'];
////
//// NO. OF ROWS @PRIYANKA-27NOV2021
//$noOfNewStockAvailable = mysqli_num_rows($resultNewStock);
////
////
//// IF NO. OF ROWS ARE PRESENT IN STOCK TABLE THEN ADD NEW STOCK INTO IT (UPDATE STOCK TABLE) @PRIYANKA-27NOV2021
//if ($noOfNewStockAvailable > 0) {
//    //
//    $qUpdateProduct2 = "UPDATE stock SET st_quantity = '$stockNewQty', "
//                     . "st_gs_weight = '$stockNewGSW', st_nt_weight = '$stockNewNTW', "
//                     . "st_pkt_weight = '$stockNewPktWT', "
//                     . "st_fine_weight = '$stockNewFineWt', st_final_fine_weight = '$stockNewFinalFineWt', "
//                     . "st_lab_charges = '$stockNewLabChrgs', st_making_charges = '$stockNewMkgChrgs', "           
//                     . "st_tax = '$stockNewTax', st_tot_tax = '$stockNewTotTax', "
//                     . "st_valuation = '$stockNewVal', st_final_valuation = '$stockNewFinalVal' "
//                     . "WHERE st_id = '$stIdNewStock'";
//    //
//    if (!mysqli_query($conn, $qUpdateProduct2)) {
//        die('Error: ' . mysqli_error($conn));
//    }
//    //
//    //echo '$qUpdateProduct2 == ' . $qUpdateProduct2 . '<br />';
//    //
//} else {
//    //
//    //
//    // IF STOCK IS NOT PRESENT STOCK TABLE THEN ADD NEW STOCK ENTRY INTO STOCK TABLE @PRIYANKA-27NOV2021
//    $insertProduct = "INSERT INTO stock (st_owner_id, st_firm_id, st_metal_type, st_product_type, st_item_code,"
//                   . "st_metal_rate, st_pur_avg_rate, st_purchase_rate,"
//                   . "st_item_name, st_item_category, st_type, st_stock_type,"
//                   . "st_quantity,"
//                   . "st_purity, st_wastage, st_final_purity,"
//                   . "st_pkt_weight, st_gs_weight, st_gs_weight_type,"
//                   . "st_nt_weight, st_nt_weight_type, st_pkt_weight_type, "
//                   . "st_lab_charges, st_making_charges, st_lab_charges_type, st_making_charges_type,"
//                   . "st_fine_weight, st_fine_weight_type, st_final_fine_weight, "
//                   . "st_tax, st_tot_tax,"
//                   . "st_valuation, st_final_valuation) "
//                   . "VALUES ('$sttr_owner_id', '$selectedFirm', '$sttr_metal_type', '$sttr_metal_type', '$sttr_item_code',"
//                   . "'$sttr_metal_rate', '$sttr_metal_rate', '$sttr_metal_rate',"
//                   . "'$sttr_item_name', '$sttr_item_category', '$sttr_indicator', '$sttr_stock_type',"
//                   . "'$sttr_quantity',"
//                   . "'$sttr_purity', '$sttr_wastage', '$sttr_final_purity',"
//                   . "'$sttr_pkt_weight', '$sttr_gs_weight', '$sttr_gs_weight_type',"
//                   . "'$sttr_nt_weight', '$sttr_nt_weight_type', '$sttr_pkt_weight_type',"
//                   . "'$sttr_lab_charges', '$sttr_making_charges', '$sttr_lab_charges_type', '$sttr_making_charges_type',"
//                   . "'$sttr_fine_weight', '$sttr_nt_weight_type', '$sttr_final_fine_weight',"
//                   . "'$sttr_tax', '$sttr_tot_tax',"
//                   . "'$sttr_valuation', '$sttr_final_valuation')";
//    //
//    //echo '$insertProduct == ' . $insertProduct . '<br />';
//    //
//    if (!mysqli_query($conn, $insertProduct)) {
//        die('Error: ' . mysqli_error($conn));
//    }
//    //
//}
//
//
//
//
    $conditionForApprovalPendingStr = ", sttr_stock_transfer_previous_firm_id = '$sttr_firm_id', "
            . " sttr_stock_transfer_approval_status = 'StockTransferApprovalPendingStock' ";
//
//
// FOR SYSTEM LOG @PRIYANKA-29JULY2022
    $sslg_trans_sub = 'STOCK TRANSFER - APPROVAL PENDING';
    $sysLogTransType = 'Stock';
    $sslg_firm_id = $selectedFirm;
    $custId = $sttr_user_id;
    $sslg_trans_comment = $sttr_metal_type . ' Item Id: ' . $sttr_item_pre_id . $sttr_item_id
            . ', Date: ' . $sttr_add_date . ', Valuation: ' . formatInIndianStyle($sttr_final_valuation)
            . ', Old Firm:' . $strFrmNamePrev . ', New Firm:' . $strFrmNameCurrent;
//
//
    include 'omslgapi.php';
//
//
// FOR BARCODE UPDATE @PRIYANKA-29JULY2022
    $query = "UPDATE item_barcode SET itbc_firm_id = '$selectedFirm' WHERE itbc_stock_id = '$sttrId'";
//
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
//
//
//
//
}
?>