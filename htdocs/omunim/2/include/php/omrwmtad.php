<?php
/*
 * **************************************************************************************
 * @Description: REPAIR ORDER ASSIGNMENT DATABASE INSERTION FILE @PRIYANKA-03APR2021
 * **************************************************************************************
 *
 * Created on APR 03, 2021 12:30 PM
 *
 * @FileName: omrwmtad.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM
 * @version 2.7.45
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-03APR2021
 *  REASON:
 *
 * 
 * Project Name: Online Munim ERP Accounting Software 2.7.45
 * Version: 2.7.45
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
include_once 'conversions.php';
require_once 'ommpincr.php';
include 'ogiamtrts.php';
?>
<?php
// 
// Start Code to Check Demo Mode
$qSelItemCount = "SELECT sttr_id FROM stock_transaction where sttr_item_category IN ('RawGold', 'RawSilver','OldGold','OldSilver')";
$resItemCount = mysqli_query($conn, $qSelItemCount);
$totalItem = mysqli_num_rows($resItemCount);
//
if (($_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) && $totalItem >= 5) {
     $message = "In Demo, You can not add more than five Items!";
     header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=False&message=' . $message);
} else if ($_SESSION['sessionDongleStatus'] != NULL &&
        ((($_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) && 
           $totalItem < 5) ||
         (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD) &&
           $_SESSION['sessionDongleStatus'] == $gbDongleRegStatus))) {
    //
    /****************************************************************************************** */
    /*************************ALL INPUTS FOR RAW METAL ENTRY********************************** */
    /****************************************************************************************** */
    //
    if ($_POST['addItemDOBMonth'] == 'NotSelected' || $_POST['addItemDOBDay'] == 'NotSelected' || 
        $_POST['addItemDOBYear'] == 'NotSelected') {
        $rawMetalAddDob = 'N/A';
    } else {
        $rawMetalAddDob = $_POST['addItemDOBDay'] . ' ' . $_POST['addItemDOBMonth'] . ' ' . $_POST['addItemDOBYear'];
    }
    //
    $rawOwnerId = $_SESSION['sessionOwnerId'];
    //
    include 'ogadrwids.php';
    //
    /****************************************************************************************** */
    /*************************ALL INPUTS FOR RAW METAL ENTRY********************************** */
    /****************************************************************************************** */
    //
    /****************************************************************************************** */
    /*************************CHECK IF ALL REQUIRED I/P ARE PRESENT**************************** */
    /****************************************************************************************** */
    //
    //
    $conditionStr = " sttr_owner_id='$rawOwnerId' AND sttr_indicator = 'rawMetal' and sttr_status NOT IN ('DELETED') order by sttr_id desc LIMIT 0,1 ";
    parse_str(getTableValues("SELECT sttr_id,sttr_owner_id, sttr_jrnl_id, sttr_firm_id, sttr_brand_id, sttr_add_date, sttr_account_id, sttr_mfg_date,
            sttr_pre_invoice_no, sttr_invoice_no, sttr_item_pre_id, sttr_item_id, sttr_metal_type, sttr_item_name, sttr_barcode ,sttr_item_category, sttr_quantity, sttr_bis_mark,
            sttr_gs_weight, sttr_gs_weight_type, sttr_pkt_weight, sttr_pkt_weight_type, sttr_nt_weight, sttr_nt_weight_type, sttr_fine_weight,sttr_final_fine_weight, sttr_purity,sttr_wastage,  
            sttr_final_purity, sttr_cust_wastage,sttr_metal_rate, sttr_lab_charges, sttr_lab_charges_type,sttr_making_charges,sttr_making_charges_type,
            sttr_valuation, sttr_stone_valuation,sttr_final_valuation, sttr_tax,sttr_tot_tax,sttr_status,sttr_item_other_info, sttr_metal_rate_id, sttr_final_val_by, sttr_size,
            sttr_pkt_qty1,sttr_pkt_qty2,sttr_pkt_qty3,sttr_pkt_qty4,sttr_pkt_qty5,
            sttr_pkt_weight1,sttr_pkt_weight2,sttr_pkt_weight3,sttr_pkt_weight4,sttr_pkt_weight5,sttr_total_lab_charges,
            sttr_lab_chrg_qty1,sttr_lab_chrg_qty2,sttr_lab_chrg_qty3,sttr_lab_chrg_qty4,sttr_lab_chrg_qty5,
            sttr_lab_chrg_val1,sttr_lab_chrg_val2,sttr_lab_chrg_val3,sttr_lab_chrg_val4,sttr_lab_chrg_val5,
            sttr_lab_chrg_type1,sttr_lab_chrg_type2,sttr_lab_chrg_type3,sttr_lab_chrg_type4,sttr_lab_chrg_type5,
            sttr_lab_chrg_tot1,sttr_lab_chrg_tot2,sttr_lab_chrg_tot3,sttr_lab_chrg_tot4,sttr_lab_chrg_tot5,sttr_other_charges_by
            FROM stock_transaction where $conditionStr"));
    //
    $selDOBDay = substr($sttr_add_date, 0, 2);
    $selDOBMnth = substr($sttr_add_date, 3, -5);
    $todayMM = date("m", strtotime($selDOBMnth)) - 1;
    $selDOBYear = substr($sttr_add_date, -4);

    if ($mainPanel == 'Customer' || $mainPanel == 'Supplier') {
        if (($rawMetalType != 'Other') && ($rawMetalAddDob == '' or $rawMetalAddDob == NULL or
             $rawPreInvNo == '' or $rawPreInvNo == NULL or $rawPostInvNo == '' or $rawPostInvNo == NULL or
             $rawMetalName == '' or $rawMetalName == NULL or
             $rawMetalGrossWt == NULL or $rawMetalGrossWt == '' or $rawMetalNetWt == '' or $rawMetalNetWt == NULL or
             $rawMetalTunch == '' or $rawMetalTunch == NULL or $rawMetalRate == '' or $rawMetalRate == NULL or $rawMetalVal == '' or $rawMetalVal == NULL or $rawMetalVal == 0 or
             $rawMetalFinalVal == '' or $rawMetalFinalVal == NULL or $rawMetalFinalVal == 0)) {
             header("Location: " . $documentRoot . "/include/php/ommperrp.php");
        }
    } 
    else {
        if (($rawMetalType != 'Other') && ($rawMetalAddDob == '' or $rawMetalAddDob == NULL or
             $rawMetalName == '' or $rawMetalName == NULL or
             $rawMetalGrossWt == NULL or $rawMetalGrossWt == '' or $rawMetalNetWt == '' or $rawMetalNetWt == NULL or
             $rawMetalTunch == '' or $rawMetalTunch == NULL or $rawMetalRate == '' or $rawMetalRate == NULL or $rawMetalVal == '' or $rawMetalVal == NULL or $rawMetalVal == 0 or
             $rawMetalFinalVal == '' or $rawMetalFinalVal == NULL or $rawMetalFinalVal == 0)) {
             header("Location: " . $documentRoot . "/include/php/ommperrp.php");
        }
    }

    /****************************************************************************************** */
    /*************************CHECK IF ALL REQUIRED I/P ARE PRESENT**************************** */
    /****************************************************************************************** */

    /****************************************************************************************** */
    /*************************ADD SUPPLIER IF NOT PRESENT************************************** */
    /****************************************************************************************** */
   
    if ($mainPanel != 'Customer' && $mainPanel != 'Supplier') {
       
        if (($panelName == 'RawDetUpPanel' || $panelName == 'RawPayUp') && $rawSupplierName != '') {
            $suppIdPresent = callSupplierTable('select', $panelName, $supp_id, $rawFirmId, $rawSupplierName, '', '', '');
            if ($suppIdPresent == 0) {
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$rawFirmId' and acc_user_acc='Sundry Creditors'"));
                callSupplierTable('insert', $panelName, $supp_id, $rawFirmId, $rawSupplierName, '', '', '');
                parse_str(getTableValues("SELECT user_id from user where user_owner_id = '$rawOwnerId' and user_type = 'SUPPLIER' and user_category = 'WholeSeller' order by user_since desc LIMIT 0, 1"));
                $supp_id = $user_id;
            }
        } 
        else {
            if ($supp_id == '' && $rawSupplierName != '') {
                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$rawFirmId' and acc_user_acc='Sundry Creditors'"));
                $suppPresent = noOfRowsCheck('user_id', 'user', "user_owner_id = '$rawOwnerId' AND user_fname = '$rawSupplierName' AND user_type = 'SUPPLIER'");
                if ($suppPresent > 0) {
                    parse_str(getTableValues("SELECT user_id from user where user_owner_id = '$rawOwnerId' and user_fname = '$rawSupplierName' and user_type = 'SUPPLIER'"));
                } else {
                    callSupplierTable('insert', $rawPanelName, $supp_id, $rawFirmId, $rawSupplierName, '', '', $acc_id);
                    parse_str(getTableValues("SELECT user_id from user where user_owner_id = '$rawOwnerId' and user_type = 'SUPPLIER'"));
                }
                $supp_id = $user_id;
            }
        }
    }
    /****************************************************************************************** */
    /*************************ADD SUPPLIER IF NOT PRESENT************************************** */
    /***************************************************************************************** */
    
    if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') {
        
        parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_owner_id='$_SESSION[sessionOwnerId]' AND sttr_id='$rwprId'"));
        
        stock_transaction('update', $_REQUEST, '');
        
        $sttr_id = $rwprId;
        
        if ($file_size != 0) {
            // 
            // Start Code To call common image id insertion file in stock_transaction table or stock table 
            //
               include 'omimginsrt.php';
            //
            // End Code To call common image id insertion file in stock_transaction table or stock table 
            //
        }
        
    } 
    else if (($rawPanelName == 'AddRawStock') || ($rawPanelName == 'RawPayment') ||  
             ($rawPanelName == 'SimilarItem')) {
        //
        //
        //print_r($_REQUEST);
        //
        //
        $sttr_id = stock_transaction('insert', $_REQUEST, '');
        //
        //
        //
        //
        // *********************************************************************************************************
        // Start Code to Assign Received Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
        // *********************************************************************************************************
        if ($_REQUEST['mainEntryAssignStatus'] == 'READY TO ASSIGN') {
            //
            //
            if ($_SESSION['setFirmSession'] != '') {
                $strFrmId = $_SESSION['setFirmSession'];
            } else {
                $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
            }
            //    
            //
            if ($_REQUEST['sttr_assign_entry_indicator'] == 'crystal' || 
                $_REQUEST['sttr_assign_entry_indicator'] == 'rawMetal') {
                //  
                //
                $updateQuery = "UPDATE stock_transaction SET sttr_assign_status = 'ASSIGNED', "
                             . "sttr_assign_pre_invoice_no = '$_REQUEST[sttr_pre_invoice_no]', "
                             . "sttr_assign_invoice_no = '$_REQUEST[sttr_invoice_no]' "
                             . "WHERE sttr_owner_id = '$sessionOwnerId' "
                             . "AND sttr_firm_id IN ($strFrmId) "
                             . "AND sttr_assign_user_id = '$_REQUEST[sttr_user_id]' "
                             . "AND sttr_assign_status = 'READY TO ASSIGN' "
                             . "AND sttr_indicator IN ('$_REQUEST[sttr_assign_entry_indicator]') "
                             . "AND sttr_transaction_type IN ('RECEIVED') "
                             . "AND sttr_id = '$_REQUEST[sttr_assign_entry_id]' "
                             . "AND sttr_status IN ('PaymentDone') ORDER BY sttr_id ASC";
                //
                //echo '</br>$updateQuery @@ == @@ ' . $updateQuery . '</br>';
                //
                mysqli_query($conn, $updateQuery);
                //
                //
                if ($_REQUEST['sttr_assign_entry_indicator'] == 'rawMetal') {
                //
                //    
                if ($_REQUEST['sttr_metal_type'] == 'GOLD' || $_REQUEST['sttr_metal_type'] == 'Gold' || 
                    $_REQUEST['sttr_metal_type'] == 'gold') {
                    $metalTypeStr = "GOLD','Gold','gold";
                } 
                else if ($_REQUEST['sttr_metal_type'] == 'SILVER' || $_REQUEST['sttr_metal_type'] == 'Silver' || 
                         $_REQUEST['sttr_metal_type'] == 'silver') {
                    $metalTypeStr = "SILVER','Silver','silver";
                }
                //
                //
                if ($_REQUEST['sttr_metal_type'] == 'GOLD' || $_REQUEST['sttr_metal_type'] == 'Gold' || 
                    $_REQUEST['sttr_metal_type'] == 'gold' ||
                    $_REQUEST['sttr_metal_type'] == 'SILVER' || $_REQUEST['sttr_metal_type'] == 'Silver' || 
                    $_REQUEST['sttr_metal_type'] == 'silver') {
                //
                $qSelMetalDet = "SELECT * FROM stock_transaction "
                              . "WHERE sttr_owner_id = '$sessionOwnerId' "
                              . "and sttr_panel_name IN ('addNewOrder', 'addNewOrderB2') "
                              . "and sttr_indicator IN ('stock') "
                              . "and (sttr_assign_pre_invoice_no IS NULL OR sttr_assign_pre_invoice_no = '') "
                              . "and sttr_direct_assign_status != 'YES' "
                              . "and sttr_status IN ('PaymentDone') "
                              . "and sttr_assign_status IN ('ASSIGNED') "
                              . "and sttr_metal_type IN ('$metalTypeStr') "
                              . "and sttr_assign_user_id IN ('$_REQUEST[sttr_user_id]') "
                              . "and sttr_transaction_type IN ('newOrder') ORDER BY sttr_id ASC";
                //        
                //echo '$qSelMetalDet @@ : ' . $qSelMetalDet.'<br />';
                //       
                $resMetDet = mysqli_query($conn, $qSelMetalDet);
                //        
                //$noOfMetalEntries = mysqli_num_rows($resMetDet);
                //        
                while ($rowMetDet = mysqli_fetch_array($resMetDet)) {
                    //
                    $updateQuery2 = "UPDATE stock_transaction SET "
                                  . "sttr_assign_pre_invoice_no = '$_REQUEST[sttr_pre_invoice_no]', "
                                  . "sttr_assign_invoice_no = '$_REQUEST[sttr_invoice_no]' "
                                  . "WHERE sttr_owner_id = '$sessionOwnerId' "
                                  . "and (sttr_id = '$rowMetDet[sttr_id]' OR sttr_sttr_id = '$rowMetDet[sttr_id]') "
                                  . "and sttr_panel_name IN ('addNewOrder', 'CRYSTAL', 'CRYSTAL_ORDER', 'addNewOrderB2') "
                                  . "and sttr_indicator IN ('stock', 'stockCrystal') "
                                  . "and sttr_direct_assign_status != 'YES' "
                                  . "and (sttr_assign_pre_invoice_no IS NULL OR sttr_assign_pre_invoice_no = '') "
                                  . "and sttr_status IN ('PaymentDone') "
                                  . "and sttr_assign_status IN ('ASSIGNED') "
                                  . "and sttr_assign_user_id IN ('$_REQUEST[sttr_user_id]') "
                                  . "and sttr_transaction_type IN ('newOrder') ORDER BY sttr_id ASC";
                    //
                    //echo '</br>$updateQuery2 ## == ## ' . $updateQuery2 . '</br>';
                    //
                    mysqli_query($conn, $updateQuery2);
                    //
                        }
                    }
                }
                //
                //
            } else {
                //
                //
                if ($_REQUEST['sttr_metal_type'] == 'GOLD' || $_REQUEST['sttr_metal_type'] == 'Gold' || 
                    $_REQUEST['sttr_metal_type'] == 'gold') {
                    $metalTypeStr = "GOLD','Gold','gold";
                } 
                else if ($_REQUEST['sttr_metal_type'] == 'SILVER' || $_REQUEST['sttr_metal_type'] == 'Silver' || 
                         $_REQUEST['sttr_metal_type'] == 'silver') {
                    $metalTypeStr = "SILVER','Silver','silver";
                }
                //
                //
                if ($_REQUEST['sttr_metal_type'] == 'GOLD' || $_REQUEST['sttr_metal_type'] == 'Gold' || 
                    $_REQUEST['sttr_metal_type'] == 'gold' ||
                    $_REQUEST['sttr_metal_type'] == 'SILVER' || $_REQUEST['sttr_metal_type'] == 'Silver' || 
                    $_REQUEST['sttr_metal_type'] == 'silver') {
                //
                $qSelMetalDet = "SELECT * FROM stock_transaction "
                              . "WHERE sttr_owner_id = '$sessionOwnerId' "
                              . "and sttr_panel_name IN ('addNewOrder', 'addNewOrderB2') "
                              . "and sttr_indicator IN ('stock') "
                              . "and sttr_direct_assign_status != 'YES' "
                              . "and (sttr_assign_pre_invoice_no IS NULL OR sttr_assign_pre_invoice_no = '') "
                              . "and sttr_status IN ('PaymentDone') "
                              . "and sttr_assign_status IN ('ASSIGNED') "
                              . "and sttr_metal_type IN ('$metalTypeStr') "
                              . "and sttr_assign_user_id IN ('$_REQUEST[sttr_user_id]') "
                              . "and sttr_transaction_type IN ('newOrder') ORDER BY sttr_id ASC";
                //        
                //echo '$qSelMetalDet @@ : ' . $qSelMetalDet.'<br />';
                //       
                $resMetDet = mysqli_query($conn, $qSelMetalDet);
                //        
                //$noOfMetalEntries = mysqli_num_rows($resMetDet);
                //        
                while ($rowMetDet = mysqli_fetch_array($resMetDet)) {
                    //
                    $updateQuery2 = "UPDATE stock_transaction SET "
                                  . "sttr_assign_pre_invoice_no = '$_REQUEST[sttr_pre_invoice_no]', "
                                  . "sttr_assign_invoice_no = '$_REQUEST[sttr_invoice_no]' "
                                  . "WHERE sttr_owner_id = '$sessionOwnerId' "
                                  . "and (sttr_id = '$rowMetDet[sttr_id]' OR sttr_sttr_id = '$rowMetDet[sttr_id]') "
                                  . "and sttr_panel_name IN ('addNewOrder', 'CRYSTAL', 'CRYSTAL_ORDER', 'addNewOrderB2') "
                                  . "and sttr_indicator IN ('stock', 'stockCrystal') "
                                  . "and sttr_direct_assign_status != 'YES' "
                                  . "and (sttr_assign_pre_invoice_no IS NULL OR sttr_assign_pre_invoice_no = '') "
                                  . "and sttr_status IN ('PaymentDone') "
                                  . "and sttr_assign_status IN ('ASSIGNED') "
                                  . "and sttr_assign_user_id IN ('$_REQUEST[sttr_user_id]') "
                                  . "and sttr_transaction_type IN ('newOrder') ORDER BY sttr_id ASC";
                    //
                    //echo '</br>$updateQuery2 ## == ## ' . $updateQuery2 . '</br>';
                    //
                    mysqli_query($conn, $updateQuery2);
                    //
                    }
                }
            }
        }
        // *********************************************************************************************************
        // End Code to Assign Received Orders From Assign Metal Panel @Author:PRIYANKA-11JUNE2021
        // *********************************************************************************************************
        //
        //
        //
        //
        $transType = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_transaction_type'])));
        $panelSimilarDiv = mysqli_real_escape_string($conn, stripslashes(trim($_POST['panelSimilarDiv'])));
        //      
        if ($file_size != 0) {
            // 
            // Start Code To call common image id insertion file in stock_transaction table or stock table 
            //
               include 'omimginsrt.php';
            //
            // End Code To call common image id insertion file in stock_transaction table or stock table 
            //
        }
        //
        if ($transType == 'PURBYSUPP' && $panelSimilarDiv == 'NoSimilarItem') {
            //
            // START CODE TO ADD CODE FOR ADD STOCK JOURNAL ENTRIES 
            $firmId = mysqli_real_escape_string($conn, stripslashes(trim($_POST['firmId'])));
            $metalType = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_metal_type'])));
            //
            //
            //echo '$firmId == '.$firmId.'<br />';
            //echo '$metalType == '.$metalType.'<br />';
            //
            //
//            if ($metalType == 'Gold' || $metalType == 'GOLD') {
//                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Gold'"));
//                $accId = $acc_id;
//            }
//
//            if ($metalType == 'Silver' || $metalType == 'SILVER') {
//                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock Silver'"));
//                $accId = $acc_id;
//            }
//
//            if (($metalType != 'Gold' && $metalType != 'GOLD') && ($metalType != 'Silver' && $metalType != 'SILVER')) {
//                parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$sessionOwnerId' and acc_firm_id='$firmId' and acc_user_acc='Stock (Inventory)'"));
//                $accId = $acc_id;
//            }
//
//            $date = trim($_POST['addItemDOBDay']) . ' ' . trim($_POST['addItemDOBMonth']) . ' ' . trim($_POST['addItemDOBYear']);
//            $payAddDate = mysqli_real_escape_string($conn, stripslashes($date));
//            $payFinalPayableAmt = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_final_valuation'])));
//            $transApiType = 'insert';
//            $transactionType = 'EXISTING';
//            include 'omusrtranjrnl.php';
            // END CODE TO ADD CODE FOR ADD STOCK JOURNAL ENTRIES
        }
    }
    
    //*************************************************************************************************
    //****************** Start code to add Crystal **********************************
    //*************************************************************************************************
    //
    // Add Code for Stone Functionality 
    if ($crystalEntered != '') {
        //
        $cryCount = 0;
        $cryTotWt = 0;
        //
        for ($j = 1; $j <= $crystalEntered; $j++) {
            //
            $cryAvail = trim($_POST['del' . $j]);
            //
            if ($cryAvail != 'Deleted') {
                //
                include 'ogadcyid.php';
                //
                // ADDED CONDITION TO MANAGE EXTRA CRYSTAL AT UPDATE TIME 
                //if ($j > $itemCodeCount && ($panelName == 'RawDetUpPanel' || $panelName == 'RawPayUp')) {
                    //$tableCryId = $sttr_id;
                //}
                //
                $qSelCryDet = "SELECT cry_id from crystal where cry_own_id = '$_SESSION[sessionOwnerId]' "
                            . "and cry_crystal_id = '$addItemCryId'"; // crystal table
                $resCryDet = mysqli_query($conn, $qSelCryDet);
                $cryAvailCount = mysqli_num_rows($resCryDet);
                //
                if ($cryAvailCount <= 0) {
                    //
                    $query = "INSERT INTO crystal (
                    cry_own_id,cry_crystal_id,cry_name,cry_dob,cry_rate,
                    cry_rate_type,cry_clarity,cry_color,
                    cry_other_info,cry_upd_sts,cry_since,cry_comm) 
                    VALUES (
                    '$_SESSION[sessionOwnerId]','$addItemCryId','$addItemCryName','$itemDOBDay','$addItemCryRate',
                    '$addItemCryRateTyp','$addItemCryClarity',
                    '$addItemCryColor', '$addItemCryOtherInfo','User',$currentDateTime,'Created By User')";
                    //
                    if (!mysqli_query($conn, $query)) {
                        die('Error: ' . mysqli_error($conn));
                    }
                }
                //
                // 
                if ($tableCryId != '') {
                    //
                    // Start Code To Update Stone Values Into stock_transaction Table 
                    //
                       stock_transaction('update', $_REQUEST, $tableCryId, $j);
                    //
                    // End Code To Update Stone Values Into stock_transaction Table 
                    //
                } else {
                    //
                    // Start Code To Add Stone Values Into stock_transaction Table 
                    //
                    //
                    // SET METAL TYPE FOR STONE ENTRIES FOR MASTER ITEM DETAILS FUNCTIONALITY 
                       $itemIndicator = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sttr_indicator'.$j])));
                    //
                    if ($itemIndicator == 'stockCrystal') {
                        //
                        $itemCryName = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sttr_item_name'.$j])));
                        $itemCryCat =  mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sttr_item_category'.$j])));       
                        $cryMetalType = 'Crystal';
                        //
                        callItemNameTable('select', 'Crystal', $itemCryName, $itemCryCat, $cryMetalType);
                        //
                    }
                    //
                    //
                       stock_transaction('insert', $_REQUEST, $sttr_id, $j);
                    //
                    // End Code To Add Stone Values Into stock_transaction Table 
                    //
                }
            }
        }
        //
        // Add Code for Stone Functionality 
        if (($rawPanelName == 'AddRawStock') || ($rawPanelName == 'RawPayment') || 
            ($rawPanelName == 'SimilarItem') && $crystalEntered != '') {
            //
            // Start code to set crystal entry field in stock_transaction 
            $query = "UPDATE stock_transaction SET sttr_crystal_yn = 'yes' WHERE  "
                    . "sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_id = '$sttr_id'";
            //
            if (!mysqli_query($conn, $query)) {
                die('Error: ' . mysqli_error($conn));
            }
            // End code to set crystal entry field in stock_transaction 
            // 
            // Start code to get LAST INSERT ID  
            //
            parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_owner_id='$_SESSION[sessionOwnerId]' "
                                   . "AND sttr_status NOT IN ('DELETED') "
                                   . "AND sttr_id = '$sttr_id'"));
            // 
            // END code to get LAST INSERT ID  
            // 
            //
            $queryUpdateStone = "UPDATE stock_transaction SET sttr_barcode_prefix = '$sttr_barcode_prefix', "
                              . "sttr_barcode = '$sttr_barcode', sttr_rfid_no = '$sttr_rfid_no', "
                              . "sttr_user_id = '$sttr_user_id', sttr_firm_id = '$sttr_firm_id', "   
                              . "sttr_item_pre_id = '$sttr_item_pre_id', sttr_item_id = '$sttr_item_id', "
                              . "sttr_brand_id = '$sttr_brand_id', sttr_counter_name = '$sttr_counter_name', "
                              . "sttr_pre_invoice_no = '$sttr_pre_invoice_no', sttr_invoice_no = '$sttr_invoice_no', "
                              . "sttr_stock_type = '$sttr_stock_type', sttr_counter_name = '$sttr_counter_name', "
                              . "sttr_location = '$sttr_location', sttr_transaction_type = '$sttr_transaction_type' "
                              . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_sttr_id = '$sttr_id' "
                              . "AND sttr_indicator = 'stockCrystal'";
            //
            if (!mysqli_query($conn, $queryUpdateStone)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        //
    }
    //*****************************************************************************************
    //******************* End code to add Crystal ***************************
    //*****************************************************************************************
    //
    //
    if ($NavPanelName == '' || $NavPanelName == NULL)
        $NavPanelName = $_REQUEST['NavPanelName'];
    //
    //
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
         $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        if ($clickId == 'true') {
            header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=StockList&listPanel=PurchaseRawStockList' . '&NavPanelName=' . $NavPanelName);
        } else {
            if ($panelSimilarDiv == 'SimilarItem') {
                header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=StockAdded&panelName=RawStock&dispMsg=Added&rawPanelName=' . $panelSimilarDiv . '&transactionPanel=' . $transactionPanel . '&simButton=similirItem' . '&NavPanelName=' . $NavPanelName);
            } else if ($mainPanel == 'Supplier') {
                if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp') {                   
                    header("Location: " . $documentRoot . "/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=SuppHome&suppPanelOption=SuppRawMetalInvoice&suppPanelName=addMetalByCash&suppId=" . $supp_id . "&userId=$supp_id&rawPanelName=" . $rawPanelName . '&rwprId=' . $rwprId . '&transactionPanel=' . $transactionPanel . '&mainPanel=' . $mainPanel . '&metType=' . $metType . '&NavPanelName=' . $NavPanelName);
                } else {
                    header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=SuppHome&suppPanelOption=SuppRawMetalInvoice&suppPanelName=addMetalByCash&suppId=' . $supp_id . '&userId=' . $supp_id . '&dispMsg=Added&transactionPanel=' . $transactionPanel . '&mainPanel=' . $mainPanel . '&metType=' . $metType . '&NavPanelName=' . $NavPanelName);
                }
            } else if ($mainPanel == 'Customer') {
                if ( $rawPanelName == 'RawPayUp') {
                    header("Location: " . $documentRoot . "/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&panelDivName=SellPanel&suppPanelName=addMetalByCash&custId=$supp_id&userId=$supp_id&rawPanelName=" . $rawPanelName . '&rwprId=' . $rwprId . '&transactionPanel=' . $transactionPanel . '&mainPanel=' . $mainPanel . '&metType=' . $metType . '&NavPanelName=' . $NavPanelName);
                } else {
                    header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&panelDivName=SellPanel&suppPanelName=addMetalByCash&custId=' . $supp_id . '&userId=' . $supp_id . '&dispMsg=Added&transactionPanel=' . $transactionPanel . '&mainPanel=' . $mainPanel . '&metType=' . $metType . '&NavPanelName=' . $NavPanelName);
                }
            } else {
                if ($rawPanelName == 'RawPayUp') {
                    header("Location: " . $documentRoot . "/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=StockAdded&panelName=RawStock&rawPanelName=" . $rawPanelName . '&rwprId=' . $rwprId . '&transactionPanel=' . $transactionPanel . '&NavPanelName=' . $NavPanelName);
                } else {
                    if($rawPanelName == 'RawDetUpPanel' && $_REQUEST['condition'] == 'NO'){
                        header("Location: " . $documentRoot . "/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=StockAdded&panelName=RawStock&rawPanelName=" . $rawPanelName . '&rwprId=' . $rwprId . '&transactionPanel=' . $transactionPanel.'&condition='.$_REQUEST['condition'] . '&NavPanelName=' . $NavPanelName);
                    } else{
                        header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=StockAdded&panelName=RawStock&dispMsg=Added&transactionPanel=' . $transactionPanel. '&simButton=similirItem' . '&NavPanelName=' . $NavPanelName); // Because Similar Item Button Should be Visible At all Situation
                    }                    
                }
            }
        }
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
                $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        if ($clickId == 'true') {
            header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=StockList&listPanel=PurchaseRawStockList' . '&NavPanelName=' . $NavPanelName);
        } else {
            if ($panelSimilarDiv == 'SimilarItem') {
                header("Location: " . $documentRoot . "/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=StockAdded&panelName=RawStock&rawPanelName=" . $panelSimilarDiv . '&transactionPanel=' . $transactionPanel . '&simButton=similirItem' . '&NavPanelName=' . $NavPanelName);
            } else if ($mainPanel == 'Supplier') {
                if ($panelName == 'RawDetUpPanel' || $panelName == 'RawPayUp') {
                    header("Location: " . $documentRoot . "/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=SuppHome&suppPanelOption=SuppRawMetalInvoice&suppPanelName=addMetalByCash&suppId=" . $supp_id . "&userId=$supp_id&rawPanelName=" . $rawPanelName . '&rwprId=' . $rwprId . '&transactionPanel=' . $transactionPanel . '&mainPanel=' . $mainPanel . '&metType=' . $metType . '&NavPanelName=' . $NavPanelName);
                } else {
                    header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=SuppHome&suppPanelOption=SuppRawMetalInvoice&suppPanelName=addMetalByCash&suppId=' . $supp_id . '&userId=' . $supp_id . '&dispMsg=Added&transactionPanel=' . $transactionPanel . '&mainPanel=' . $mainPanel . '&metType=' . $metType . '&NavPanelName=' . $NavPanelName);
                }
            } else if ($mainPanel == 'Customer') {
                if ($panelName == 'RawDetUpPanel' || $panelName == 'RawPayUp') {
                    header("Location: " . $documentRoot . "/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&panelDivName=SellPanel&suppPanelName=addMetalByCash&custId=$supp_id&userId=$supp_id&rawPanelName=" . $rawPanelName . '&rwprId=' . $rwprId . '&transactionPanel=' . $transactionPanel . '&mainPanel=' . $mainPanel . '&metType=' . $metType . '&NavPanelName=' . $NavPanelName);
                } else {
                    header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&panelDivName=SellPanel&suppPanelName=addMetalByCash&custId=' . $supp_id . '&userId=' . $supp_id . '&dispMsg=Added&transactionPanel=' . $transactionPanel . '&mainPanel=' . $mainPanel . '&metType=' . $metType . '&NavPanelName=' . $NavPanelName);
                }
            } else {
                if ($panelName == 'RawDetUpPanel' || $panelName == 'RawPayUp') {
                    header("Location: " . $documentRoot . "/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=StockAdded&panelName=RawStock&rawPanelName=" . $rawPanelName . '&rwprId=' . $rwprId . '&transactionPanel=' . $transactionPanel . '&NavPanelName=' . $NavPanelName);
                } else {
                    header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=StockAdded&panelName=RawStock&dispMsg=Added&transactionPanel=' . $transactionPanel . '&NavPanelName=' . $NavPanelName);
                }
            }
        }
    }
}
?>
