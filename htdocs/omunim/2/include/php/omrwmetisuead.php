<?php

/*
 * **************************************************************************************
 * @tutorial: Add Raw Metal Issue 
 * **************************************************************************************
 *
 * Created on SEPT 20, 2021  8: 20 PM
 *
 * @FileName: omrwmetisuead.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php

$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
include 'ogiamtrts.php';
?>
<?php
//print_r($_REQUEST);
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

    /*     * **************************************************************************************** */
    /*     * ***********************ALL INPUTS FOR RAW METAL ENTRY********************************** */
    /*     * **************************************************************************************** */

    if ($_POST['addItemDOBMonth'] == 'NotSelected' || $_POST['addItemDOBDay'] == 'NotSelected' ||
            $_POST['addItemDOBYear'] == 'NotSelected') {
        $rawMetalAddDob = 'N/A';
    } else {
        $rawMetalAddDob = $_POST['addItemDOBDay'] . ' ' . $_POST['addItemDOBMonth'] . ' ' . $_POST['addItemDOBYear'];
    }

    $rawOwnerId = $_SESSION['sessionOwnerId'];

    include 'ogadrwids.php';

    $sellPanelName = trim($_POST['rawIsuePanelName']);
    $slPrPreInvoice = trim($_POST['sttr_pre_invoice_no']);
    $slPrInvoiceNo = trim($_POST['sttr_invoice_no']);
    $slPrCustomerId = trim($_POST['sttr_user_id']);
    $custId = trim($_POST['sttr_user_id']);

    $slPrId = trim($_POST['slPrId']);

    $slPrDOBDay = trim($_POST['slPrDOBDay']);
    $slPrDOBMonth = trim($_POST['slPrDOBMonth']);
    $slPrDOBYear = trim($_POST['slPrDOBYear']);
    $slPrSellDate = $slPrDOBDay . ' ' . $slPrDOBMonth . ' ' . $slPrDOBYear;
    $slPrFirmId = trim($_POST['firmId']);
    $slPrAccountId = trim($_POST['accountId']);
    $accountId = trim($_POST['sttr_account_id']);
    $slPrItemMetal = trim($_POST['sttr_metal_type']);
    $slPrItemName = trim($_POST['sttr_item_name']);
    $slPrItemCategory = trim($_POST['sttr_item_category']);
    $slPrItemPieces = trim($_POST['sttr_quantity']);
    $slPrItemGSW = trim($_POST['sttr_gs_weight']);
    $slPrItemGSWT = trim($_POST['sttr_gs_weight_type']);
    $slPrItemPKTW = trim($_POST['sttr_pkt_weight']);
    $slPrItemPKTWT = trim($_POST['sttr_pkt_weight_type']);
    $slPrItemNTW = trim($_POST['sttr_nt_weight']);
    $slPrItemNTWT = trim($_POST['sttr_nt_weight_type']);
    $slPrItemTunch = trim($_POST['sttr_purity']);
    $addRawMetalIssue = trim($_POST['addRawMetalIssue']);
    $updateRawMetalIssue = trim($_POST['updateRawMetalIssue']);
    
    //echo '$updateRawMetalIssue=='.$updateRawMetalIssue;
     //
        $todayDOBMonth = strtoupper(date(M));
        $currentFinancialDay = '01';
        $currentFinancialMonth = 'APR';
        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR') {
            $currentFinancialYear = date(Y) - 1;
        } else {
            $currentFinancialYear = date(Y);
        }
        $currentFinancialYearDate = $currentFinancialDay . ' ' . $currentFinancialMonth . ' ' . $currentFinancialYear;
        //
        $nextFinancialDay = '01';
        $nextFinancialMonth = 'APR';
        if ($todayDOBMonth == 'JAN' || $todayDOBMonth == 'FEB' || $todayDOBMonth == 'MAR') {
            $nextFinancialYear = date(Y);
        } else {
            $nextFinancialYear = date(Y) + 1;
        }
        $nextFinancialYearDate = $nextFinancialDay . ' ' . $nextFinancialMonth . ' ' . $nextFinancialYear;
        //
        // CURRENT AND NEXT FINANCIAL YEAR DATE STR
        $currentFinancialYearDateStr = strtotime($currentFinancialYearDate);
        $nextFinancialYearDateStr = strtotime($nextFinancialYearDate);
        //
        $preSlprPreInv = trim($_POST['sttr_pre_invoice_no']);
        $preSlprInv = trim($_POST['sttr_invoice_no']);
        $divSubPanel = NULL;
       //
        if($addRawMetalIssue == 'RawMetalIssue'){
           $qSelEntryExist = "SELECT sttr_pre_invoice_no, sttr_invoice_no, sttr_add_date FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId'  "
                        . "AND sttr_pre_invoice_no = '$slPrPreInvoice' AND sttr_invoice_no = '$slPrInvoiceNo' "                                               
                        . "AND $currentFinancialYearDateStr < UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) "
                        . "AND UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) < $nextFinancialYearDateStr ";
                         
                // 
                //echo '$qSelEntryExist == ' . $qSelEntryExist . '<br /><br />';
                //
                $resSelEntryExist = mysqli_query($conn, $qSelEntryExist);
                $rowSelExistingEntry = mysqli_num_rows($resSelEntryExist);
                //
                //echo '$rowSelExistingEntry == ' . $rowSelExistingEntry . '<br /><br />';
                //
                if ($rowSelExistingEntry > 0) {
                    $divSubPanel = 'InvAlreadyExists';
                } 
        }


    /*     * **************************************************************************************** */
    /*     * ***********************ALL INPUTS FOR RAW METAL ENTRY********************************** */
    /*     * **************************************************************************************** */

    /*     * **************************************************************************************** */
    /*     * ***********************CHECK IF ALL REQUIRED I/P ARE PRESENT**************************** */
    /*     * **************************************************************************************** */


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

    $selDOBDay = substr($sttr_add_date, 0, 2);
    $selDOBMnth = substr($sttr_add_date, 3, -5);
    $todayMM = date("m", strtotime($selDOBMnth)) - 1;
    $selDOBYear = substr($sttr_add_date, -4);


    if (($rawMetalType != 'Other') && ($rawMetalAddDob == '' or $rawMetalAddDob == NULL or
            $slPrPreInvoice == '' or $slPrPreInvoice == NULL or $slPrInvoiceNo == '' or $slPrInvoiceNo == NULL or
            $slPrItemMetal == '' or $slPrItemMetal == NULL or
            $slPrItemName == '' or $slPrItemName == NULL or
            $slPrItemGSW == NULL or $slPrItemGSW == '' or $slPrItemNTW == '' or $slPrItemNTW == NULL or
            $slPrItemTunch == '' or $slPrItemTunch == NULL
            )) {
        header("Location: " . $documentRoot . "/include/php/ommperrp.php");
    }


    /*     * **************************************************************************************** */
    /*     * ***********************CHECK IF ALL REQUIRED I/P ARE PRESENT**************************** */
    /*     * **************************************************************************************** */

    /*     * **************************************************************************************** */
    /*     * ***********************ADD SUPPLIER IF NOT PRESENT************************************** */
    /*     * **************************************************************************************** */

//echo '$sellPanelName='.$sellPanelName.'<br>';
    if (($panelName == 'RawDetUpPanel' || $panelName == 'RawPayUp') && $rawSupplierName != '') {
        $suppIdPresent = callSupplierTable('select', $panelName, $supp_id, $rawFirmId, $rawSupplierName, '', '', '');
        if ($suppIdPresent == 0) {
            parse_str(getTableValues("SELECT acc_id FROM accounts WHERE acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$rawFirmId' and acc_user_acc='Sundry Creditors'"));
            callSupplierTable('insert', $panelName, $supp_id, $rawFirmId, $rawSupplierName, '', '', '');
            parse_str(getTableValues("SELECT user_id from user where user_owner_id = '$rawOwnerId' and user_type = 'SUPPLIER' and user_category = 'WholeSeller' order by user_since desc LIMIT 0, 1"));
            $supp_id = $user_id;
        }
    } else {
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

//print_r($_REQUEST);
//    echo '$rawPanelName=1='.$rawPanelName.'<br>';
//    echo '$updateRawMetalIssue='.$updateRawMetalIssue.'<br>';

    if ($rawPanelName == 'RawDetUpPanel' || $rawPanelName == 'RawPayUp' || $updateRawMetalIssue == 'RawMetalIssueUp') {
//        echo 'hiii1'.'<br>';
//        echo '$rwprId='.$rwprId;

       // parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_owner_id='$_SESSION[sessionOwnerId]' AND sttr_id='$rwprId'"));

        //stock_transaction('update', $_REQUEST, '');

        $sttr_id = $rwprId;
        //    
        $qSelEntryExist = "SELECT sttr_pre_invoice_no, sttr_invoice_no FROM stock_transaction WHERE sttr_owner_id='$sessionOwnerId'  "
                         . "AND sttr_pre_invoice_no = '$slPrPreInvoice' AND sttr_invoice_no = '$slPrInvoiceNo' "
                         . "AND $currentFinancialYearDateStr < UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) "
                         . "AND UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) < $nextFinancialYearDateStr ";
                         
        // 
        //echo '$qSelEntryExist == ' . $qSelEntryExist . '<br /><br />';
        //
        $resSelEntryExist = mysqli_query($conn, $qSelEntryExist);
        $rowSelExistingEntry = mysqli_num_rows($resSelEntryExist);
        //
        //echo '$rowSelExistingEntry == ' . $rowSelExistingEntry . '<br /><br />';
        //
        if ($rowSelExistingEntry > 0) {
            $divSubPanel = 'InvAlreadyExists';
        } 
        // 
        // 
        if ($divSubPanel != 'InvAlreadyExists') {
        // 
        //
        $qSelectSttrId = "SELECT sttr_pre_invoice_no AS sttr_pre_invoice_no_old, sttr_invoice_no AS sttr_invoice_no_old, sttr_add_date AS  sttr_add_date_old "
                       . "FROM stock_transaction WHERE sttr_id = '$rwprId'";
        //
        $querySelectStrId = mysqli_query($conn, $qSelectSttrId);
        //
        while ($resSelectStrId = mysqli_fetch_array($querySelectStrId, MYSQLI_ASSOC)) {
            
            $sttr_pre_invoice_no_old = $resSelectStrId['sttr_pre_invoice_no_old'];
            $sttr_invoice_no_old = $resSelectStrId['sttr_invoice_no_old'];   
            $sttr_add_date_old = $resSelectStrId['sttr_add_date_old'];   
            
            $arrAddDate = explode(' ', $sttr_add_date_old);

            $day = $arrAddDate[0];
            $month = strtoupper($arrAddDate[1]);
            $year = $arrAddDate[2];
            
            $old_date = "01 APR " .  $year;           
            $old_date_next_year = "01 APR " .  ($year + 1);
            
//            echo '$old_date == ' . $old_date . '<br /><br />';
//            echo '$old_date_next_year == ' . $old_date_next_year . '<br /><br />';
            
            $currentFinancialOldYearDateStr = strtotime($old_date);
            $nextFinancialOldYearDateStr = strtotime($old_date_next_year);
            
                        
            $query = "UPDATE stock_transaction SET sttr_pre_invoice_no = '$slPrPreInvoice', sttr_invoice_no = '$slPrInvoiceNo' "
                   . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                   . "AND sttr_pre_invoice_no = '$sttr_pre_invoice_no_old' AND sttr_invoice_no = '$sttr_invoice_no_old' "
                   . "AND $currentFinancialOldYearDateStr < UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) "
                   . "AND UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date,'%d %b %Y')) < $nextFinancialOldYearDateStr ";
            //
            if (!mysqli_query($conn, $query)) {
                die('Error: ' . mysqli_error($conn));
            }
            //
        }
        //
        }

        if ($file_size != 0) {
            // 
            // Start Code To call common image id insertion file in stock_transaction table or stock table @Priyanka-11MAR19
            //
            include 'omimginsrt.php';
            //
            // End Code To call common image id insertion file in stock_transaction table or stock table @Priyanka-11MAR19
            //
        }
    } else if ($rawPanelName == 'RawMetalIssue' || $addRawMetalIssue == 'RawMetalIssue' || ($rawPanelName == 'RawPayment')) {
//echo 'hi2';
//        print_r($_REQUEST);
        //
        //******************************************************************************************************************
      //**************** START CODE TO ADD CONDITION FOR UPDATE RAW METAL ISSUE INV NUMBER @SIMRAN:04JUN2023*********//
      //*****************************************************************************************************************
        //
        $sttrTransactionType = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_transaction_type'])));
        $sttrUserId = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_user_id'])));
        $sttrMetalType = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_metal_type'])));
        $sttrFirmId = mysqli_real_escape_string($conn, stripslashes(trim($_POST['firmId'])));
        //
        //
        $invoiceNumber = explode('*', getInvoiceNum($sttrUserId, 'rawMetal', $sttrTransactionType, '', $sttrFirmId, $sttrMetalType));
        $slPrPreInvoiceNo = $invoiceNumber[0];
        $slPrInvoiceNo = $invoiceNumber[1];
        //
        //die;
        //
        $_REQUEST['sttr_pre_invoice_no'] = $slPrPreInvoiceNo;
        $_REQUEST['sttr_invoice_no'] = $slPrInvoiceNo;
        //
        //
        //echo '$slPrPreInvoiceNo == ' . $slPrPreInvoiceNo . '<br />';
        //echo '$slPrInvoiceNo == ' . $slPrInvoiceNo . '<br />';
        //die;
        //
        //
        $sttr_id = stock_transaction('insert', $_REQUEST, '');
        //$mainEntryId = $sttrId;
        //print_r($_REQUEST);die;
        if ($rowSelExistingEntry > 0) {
                 $divSubPanel = 'InvAlreadyExists';
          }
        //  
       //******************************************************************************************************************
      //**************** END CODE TO ADD CONDITION FOR UPDATE RAW METAL ISSUE INV NUMBER @SIMRAN:04JUN2023*********//
      //*****************************************************************************************************************
        //

       // $sttr_id = stock_transaction('insert', $_REQUEST, '');

        $transType = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_transaction_type'])));
        $panelSimilarDiv = mysqli_real_escape_string($conn, stripslashes(trim($_POST['panelSimilarDiv'])));

        if ($file_size != 0) {
            // 
            //
            //
            include 'omimginsrt.php';
            //
            // 
            //
        }

        if ($transType == 'PURBYSUPP' && $panelSimilarDiv == 'NoSimilarItem') {

            // START CODE TO ADD CODE FOR ADD STOCK JOURNAL ENTRIES @PRIYANKA-11JUNE18
            $firmId = mysqli_real_escape_string($conn, stripslashes(trim($_POST['firmId'])));
            $metalType = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_metal_type'])));
        }
    }


    //
    // 
//    echo '$crystalEntered=1='.$crystalEntered.'<br>';
    if ($crystalEntered != '') {
//        echo '$crystalEntered=2='.$crystalEntered.'<br>';
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
                // 
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
                // @PRIYANKA-14MAR19
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
                    $itemIndicator = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sttr_indicator' . $j])));
                    //
                    if ($itemIndicator == 'stockCrystal') {
                        //
                        $itemCryName = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sttr_item_name' . $j])));
                        $itemCryCat = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sttr_item_category' . $j])));
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

        if ($addRawMetalIssue == 'RawMetalIssue' || ($rawPanelName == 'RawPayment') && $crystalEntered != '') {
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
            //echo '$queryUpdateStone='.$queryUpdateStone;
            //
            if (!mysqli_query($conn, $queryUpdateStone)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        //
    }
    //*****************************************************************************************
    //******************* End code to add Crystal  ***************************
    //*****************************************************************************************
    //
    //echo '$supp_id : '.$supp_id.'<br>';
    //echo '$custId : '.$custId.'<br>';
    //
    if($supp_id == '' && $custId != ''){
        $supp_id = $custId;
    }
    //
    if (($_SESSION['sessionProdOMUNIM'] == $globalKeyOMUNIM || $_SESSION['sessionProdOMUNIM'] == $gbKeyOMUNIMDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        if ($clickId == 'true') {
            header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=StockList&listPanel=PurchaseRawStockList');
        } else {
            if ($rawPanelName == 'RawPayUp' || $updateRawMetalIssue == 'RawMetalIssueUp') {
                header("Location: " . $documentRoot . "/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&panelDivName=rawMetalIssue&custId=$supp_id&userId=$supp_id&rawPanelName=" . $rawPanelName . '&rwprId=' . $rwprId . '&transactionPanel=' . $transactionPanel . '&mainPanel=' . $mainPanel . '&metType=' . $metType);
            } else {
                header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&panelDivName=rawMetalIssue&custId=' . $supp_id . '&userId=' . $supp_id . '&dispMsg=Added&transactionPanel=' . $transactionPanel . '&mainPanel=rawMetalIssue&metType=' . $metType . '&panelName=rawMetalIssue');
            }
        }
    } else if (($_SESSION['sessionProdOMGOLD'] == $globalKeyOMGOLD || $_SESSION['sessionProdOMGOLD'] == $gbKeyOMGOLDDEMO) &&
            $_SESSION['sessionProdVer'] == $globalKeyProdVer) {
        if ($clickId == 'true') {
            header('Location: ' . $documentRoot . '/omHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=StockList&listPanel=PurchaseRawStockList');
        } else {
            if ($panelName == 'RawDetUpPanel' || $panelName == 'RawPayUp' || $updateRawMetalIssue == 'RawMetalIssueUp') {
                header("Location: " . $documentRoot . "/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&panelDivName=rawMetalIssue&suppPanelName=addMetalByCash&custId=$supp_id&userId=$supp_id&rawPanelName=" . $rawPanelName . '&rwprId=' . $rwprId . '&transactionPanel=' . $transactionPanel . '&mainPanel=' . $mainPanel . '&metType=' . $metType);
            } else {
                header('Location: ' . $documentRoot . '/ogHomePage.php?divPanel=OwnerHome&divMainMiddlePanel=CustHome&panelDivName=rawMetalIssue&suppPanelName=addMetalByCash&custId=' . $supp_id . '&userId=' . $supp_id . '&dispMsg=Added&transactionPanel=' . $transactionPanel . '&mainPanel=' . $mainPanel . '&metType=' . $metType);
            }
        }
    }
}
?>

