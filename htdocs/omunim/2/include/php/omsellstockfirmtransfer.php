<?php

/*
 * **************************************************************************************
 * @tutorial: Sell item auto stock transfer file @AUTHOR:MADHUREE-26JUNE2020
 * **************************************************************************************
 *
 * Created on 26 JUNE 2020 12:30:54 PM
 *
 * @FileName:omsellstockfirmtransfer.php
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
include_once 'ommpfndv.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php

if ($sellStockOption == 'EstimateSellOption') {
    $currentDate = date("d/m/y  - h:i");
    $currentDate = '#' . $currentDate;
    //
    $sellEstimateInvoiceNo = getInvoiceNum($userId, 'sellStock', 'ESTIMATESELL', '', $firmId);
    $sellEstimateInvoiceNoArray = explode('*', $sellEstimateInvoiceNo);
    $payNewPreInvoiceNo = $sellEstimateInvoiceNoArray[0];
    $payNewInvoiceNo = $sellEstimateInvoiceNoArray[1];
    $selStockDetails = "SELECT * FROM stock_transaction WHERE sttr_firm_id='$firmId' AND sttr_pre_invoice_no='$payPreInvoiceNo' AND sttr_invoice_no='$payInvoiceNo' AND sttr_owner_id = '$_SESSION[sessionOwnerId]' and sttr_transaction_type NOT IN('DELETED')";
    $resultStockDetails = mysqli_query($conn, $selStockDetails);
//    while ($rowStockDetails = mysqli_fetch_array($resultStockDetails, MYSQLI_ASSOC)) {
//        $sttr_item_code = $rowStockDetails['sttr_item_code'];
//        $sttr_firm_id = $rowStockDetails['sttr_firm_id'];
//        parse_str(getTableValues("SELECT firm_name AS preFirmNames FROM firm WHERE firm_id='$sttr_firm_id'"));
//        $preFirmNames = '#' . $preFirmNames;
//        //
        $updateSttrQuery = "UPDATE stock_transaction SET sttr_transaction_type='ESTIMATESELL', sttr_pre_invoice_no='$payNewPreInvoiceNo', sttr_invoice_no='$payNewInvoiceNo' WHERE sttr_pre_invoice_no='$payPreInvoiceNo' AND sttr_invoice_no='$payInvoiceNo' AND sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_transaction_type IN ('sell','ESTIMATESELL')";
        if (!mysqli_query($conn, $updateSttrQuery)) {
            die('Error: ' . mysqli_error($conn));
        }
//    }
    $_REQUEST[$prefix . 'PreInvoiceNo'] = $payNewPreInvoiceNo;
    $_REQUEST[$prefix . 'PostInvoiceNo'] = $payNewInvoiceNo;
    $payPreInvoiceNo = $payNewPreInvoiceNo;
    $payInvoiceNo = $payNewInvoiceNo;
} else if ($sellStockOption == 'EstimateSellConvertOption') {
    $sellEstimateInvoiceNo = getInvoiceNum($userId, 'sellStock', 'sell', '', $firmId);
    $sellEstimateInvoiceNoArray = explode('*', $sellEstimateInvoiceNo);
    $payNewPreInvoiceNo = $sellEstimateInvoiceNoArray[0];
    $payNewInvoiceNo = $sellEstimateInvoiceNoArray[1];
    //
//    $selStockDetails = "SELECT sttr_item_code FROM stock_transaction WHERE sttr_firm_id='$firmId' AND sttr_pre_invoice_no='$payPreInvoiceNo' AND sttr_invoice_no='$payInvoiceNo' AND sttr_owner_id = '$_SESSION[sessionOwnerId]' and sttr_transaction_type NOT IN('DELETED')";
//    $resultStockDetails = mysqli_query($conn, $selStockDetails);
//    while ($rowStockDetails = mysqli_fetch_array($resultStockDetails, MYSQLI_ASSOC)) {
//        $sttr_item_code = $rowStockDetails['sttr_item_code'];
        //
        $updateSttrQuery = "UPDATE stock_transaction SET sttr_transaction_type='sell', sttr_pre_invoice_no='$payNewPreInvoiceNo', sttr_invoice_no='$payNewInvoiceNo' WHERE sttr_firm_id='$firmId' AND sttr_pre_invoice_no='$payPreInvoiceNo' AND sttr_invoice_no='$payInvoiceNo' AND sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_transaction_type IN ('ESTIMATESELL')";
        if (!mysqli_query($conn, $updateSttrQuery)) {
            die('Error: ' . mysqli_error($conn));
        }
//    }
    $_REQUEST[$prefix . 'PreInvoiceNo'] = $payNewPreInvoiceNo;
    $_REQUEST[$prefix . 'PostInvoiceNo'] = $payNewInvoiceNo;
    $payPreInvoiceNo = $payNewPreInvoiceNo;
    $payInvoiceNo = $payNewInvoiceNo;
} else if ($sellStockOption == 'SellEstimateConvertOption') {
    $sellEstimateInvoiceNo = getInvoiceNum($userId, 'sellStock', 'ESTIMATESELL', '', $firmId);
    $sellEstimateInvoiceNoArray = explode('*', $sellEstimateInvoiceNo);
    $payNewPreInvoiceNo = $sellEstimateInvoiceNoArray[0];
    $payNewInvoiceNo = $sellEstimateInvoiceNoArray[1];
    $date = $_REQUEST['slPrDOBDay'].' '.$_REQUEST['slPrDOBMonth'].' '.$_REQUEST['slPrDOBYear'];
    $timestamp = strtotime($date);
//    $selStockDetails = "SELECT sttr_item_code FROM stock_transaction WHERE sttr_firm_id='$firmId' AND sttr_pre_invoice_no='$payPreInvoiceNo' AND sttr_invoice_no='$payInvoiceNo' AND sttr_owner_id = '$_SESSION[sessionOwnerId]' and sttr_transaction_type NOT IN('DELETED')";
//    $resultStockDetails = mysqli_query($conn, $selStockDetails);
//    while ($rowStockDetails = mysqli_fetch_array($resultStockDetails, MYSQLI_ASSOC)) {
//        $sttr_item_code = $rowStockDetails['sttr_item_code'];
        //
        $updateSttrQuery = "UPDATE stock_transaction SET sttr_transaction_type='ESTIMATESELL', "
                . "sttr_pre_invoice_no='$payNewPreInvoiceNo', sttr_invoice_no='$payNewInvoiceNo' WHERE sttr_firm_id='$firmId' "
                . "AND sttr_pre_invoice_no='$payPreInvoiceNo' AND sttr_invoice_no='$payInvoiceNo' and sttr_owner_id='$_SESSION[sessionOwnerId]' "
                . "and sttr_transaction_type IN ('sell')and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date, '%d %b %Y')) = '$timestamp' ";
        if (!mysqli_query($conn, $updateSttrQuery)) {
            die('Error: ' . mysqli_error($conn));
        }
          $updateSttrQuery = "UPDATE stock_transaction SET  "
                . "sttr_pre_invoice_no='$payNewPreInvoiceNo', sttr_invoice_no='$payNewInvoiceNo' WHERE sttr_firm_id='$firmId' "
                . "AND sttr_pre_invoice_no='$payPreInvoiceNo' AND sttr_invoice_no='$payInvoiceNo' and sttr_owner_id='$_SESSION[sessionOwnerId]' "
                . "and sttr_transaction_type IN ('RECEIVED')and UNIX_TIMESTAMP(STR_TO_DATE(sttr_add_date, '%d %b %Y')) = '$timestamp' ";
        if (!mysqli_query($conn, $updateSttrQuery)) {
            die('Error: ' . mysqli_error($conn));
        }
//    }
    $_REQUEST[$prefix . 'PreInvoiceNo'] = $payNewPreInvoiceNo;
    $_REQUEST[$prefix . 'PostInvoiceNo'] = $payNewInvoiceNo;
    $payPreInvoiceNo = $payNewPreInvoiceNo;
    $payInvoiceNo = $payNewInvoiceNo;
} else {
    //
    /* START CODE TO GET PERSONAL FIRM DETAILS FOR AUTO STOCK TRANSFER FOR ESTIMATE SELL OPTION @AUTHOR:MADHUREE-26JUNE2020 */
    //
    $perFirmCount = noOfRowsCheck("firm_id", "firm", "firm_type='Personal'");
    //
    if ($perFirmCount > 0) {
        parse_str(getTableValues("SELECT firm_id AS firmId FROM firm WHERE firm_type='Personal' ORDER BY firm_id DESC LIMIT 0,1"));
    } else {
        parse_str(getTableValues("SELECT * FROM firm WHERE firm_type='Public' ORDER BY firm_id DESC LIMIT 0,1"));
        $firm_name.= '-P';
        $year = date("Y");
        $firm_op_cash_date = '01 APR ' . $year;
        $perFirmInsert = "INSERT INTO firm (
		firm_own_id,firm_name,firm_reg_no,firm_long_name,firm_desc,firm_address,firm_phone_details,
                firm_email,firm_type,firm_owner,firm_comments,firm_smtp_email,firm_smtp_pass,firm_formN,
                firm_formR,firm_form_header,firm_form_footer,firm_op_cash_date,firm_op_cash_bal,firm_op_cash_bal_crdr,
                firm_op_gold_bal,firm_op_gold_bal_wtype,firm_op_gold_bal_crdr,firm_op_silv_bal,firm_op_silv_bal_wtype,
                firm_op_silv_bal_crdr,firm_pan_no,firm_tin_no,firm_left_thumb,firm_left_thumb_ftype,firm_right_thumb,
                firm_right_thumb_ftype,firm_since) VALUES ('$firm_own_id','$firm_name','$firm_reg_no','$firm_long_name',
                '$firm_desc','$firm_address','$firm_phone_details','$firm_email','Personal','$firm_owner','$firm_comments',
                '$firm_smtp_email','$firm_smtp_pass','$firm_formN','$firm_formR','$firm_form_header','$firm_form_footer',
                '$firm_op_cash_date','','CR','','','','','','','$firm_pan_no','$firm_tin_no','','','','',now())";

        if (!mysqli_query($conn, $perFirmInsert)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
        $qSelFirm = "SELECT firm_id FROM firm where firm_own_id='$firm_own_id' order by firm_since desc LIMIT 0,1";
        $resFirm = mysqli_query($conn, $qSelFirm);
        $rowFirm = mysqli_fetch_array($resFirm, MYSQLI_ASSOC);
        $firmId = $rowFirm['firm_id'];
        include 'omtipacc.php';
        //
        $qSelAccount = "SELECT acc_id FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$firmId' and acc_user_acc='Capital Account'";
        $resAccounts = mysqli_query($conn, $qSelAccount);
        $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
        $mainAccountId = $rowAccounts['acc_id'];
        //
        $accOwnerId = $_SESSION['sessionOwnerId'];
        $accUserAccount = $firm_name;
        $accMainAccountId = $mainAccountId;
        $accFirm = $firmId;
        $accName = $firm_long_name;
        $accAddress = $firm_address;
        $accCity = '';
        $accPin = '';
        $accState = '';
        $accCountry = '';
        $accPANNO = '';
        $accSalesTaxNo = '';
        $accCSTNo = '';
        $accBankAccountNo = '';
        $accBranchName = '';
        $accBSRCode = '';
        $accIFSCode = '';
        $accCashBalDate = $firm_op_cash_date;
        $accCashBalance = '';
        $accCashBalCrDr = '';
        $accOtherInfo = $firm_comments;
        $accUser = "oMunim";
        $divPanel = 'AccAddAPI';
        include 'omacacad.php';
        // 
        $qSelAccount = "SELECT acc_id FROM accounts where acc_own_id='$_SESSION[sessionOwnerId]' and acc_firm_id='$firmId' and acc_user_acc='$firm_name'";
        $resAccounts = mysqli_query($conn, $qSelAccount);
        $rowAccounts = mysqli_fetch_array($resAccounts, MYSQLI_ASSOC);
        $firmCapitalAccId = $rowAccounts['acc_id'];
        //
        $query = "UPDATE firm SET
		firm_capital_acc_id='$firmCapitalAccId'
                WHERE firm_own_id = '$_SESSION[sessionOwnerId]' and firm_id = '$firmId'";
        if (!mysqli_query($conn, $query)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    //
    /* END CODE TO GET PERSONAL FIRM DETAILS FOR AUTO STOCK TRANSFER FOR ESTIMATE SELL OPTION @AUTHOR:MADHUREE-26JUNE2020 */
    //
    $sellEstimateInvoiceNo = getInvoiceNum($userId, 'sellStock', 'ESTIMATESELL', '', $firmId);
    $sellEstimateInvoiceNoArray = explode('*', $sellEstimateInvoiceNo);
    $payNewPreInvoiceNo = $sellEstimateInvoiceNoArray[0];
    $payNewInvoiceNo = $sellEstimateInvoiceNoArray[1];
    //
    /* START CODE TO TRANSAFER STOCK FROM STOCK & STOCK TRANSACTION TABLE BEFORE SELL ENTRY @AUTHOR:MADHUREE-26JUNE2020 */
    //
    $currentDate = date("d/m/y  - h:i");
    $currentDate = '#' . $currentDate;
    //
    $selStockDetails = "SELECT * FROM stock_transaction WHERE sttr_pre_invoice_no='$payPreInvoiceNo' AND sttr_invoice_no='$payInvoiceNo' AND sttr_transaction_type = 'sell' AND sttr_owner_id = '$_SESSION[sessionOwnerId]' and sttr_status NOT IN('DELETED')";
    $resultStockDetails = mysqli_query($conn, $selStockDetails);
    while ($rowStockDetails = mysqli_fetch_array($resultStockDetails, MYSQLI_ASSOC)) {
        //
        $sell_sttr_metal_type = $rowStockDetails['sttr_metal_type'];
        $sell_sttr_item_name = $rowStockDetails['sttr_item_name'];
        $sell_sttr_item_code = $rowStockDetails['sttr_item_code'];
        $sell_sttr_item_category = $rowStockDetails['sttr_item_category'];
        $sell_sttr_stock_type = $rowStockDetails['sttr_stock_type'];
        $sell_sttr_purity = $rowStockDetails['sttr_purity'];
        $sell_sttr_quantity = $rowStockDetails['sttr_quantity'];
        $sell_sttr_pkt_weight = $rowStockDetails['sttr_pkt_weight'];
        $sell_sttr_gs_weight = $rowStockDetails['sttr_gs_weight'];
        $sell_sttr_nt_weight = $rowStockDetails['sttr_nt_weight'];
        $sell_sttr_fine_weight = $rowStockDetails['sttr_fine_weight'];
        $sell_sttr_final_fine_weight = $rowStockDetails['sttr_final_fine_weight'];
        $sell_sttr_tax = $rowStockDetails['sttr_tax'];
        $sell_sttr_tot_tax = $rowStockDetails['sttr_tot_tax'];
        $sell_sttr_valuation = $rowStockDetails['sttr_valuation'];
        $sell_sttr_final_valuation = $rowStockDetails['sttr_final_valuation'];
        $sell_sttr_gs_weight_type = $rowStockDetails['sttr_gs_weight_type'];
        $sell_sttr_nt_weight_type = $rowStockDetails['sttr_nt_weight_type'];
        //
        $sell_sttr_firm_id = $rowStockDetails['sttr_firm_id'];
        parse_str(getTableValues("SELECT firm_name AS preFirmNames FROM firm WHERE firm_id='$sell_sttr_firm_id'"));
        $preFirmNames = '#' . $preFirmNames;
        // 
        parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_item_code='$sell_sttr_item_code' AND sttr_transaction_type IN ('PURONCASH','PURBYSUPP','EXISTING','TAG') and sttr_status NOT IN('DELETED')"));
        //
        if ($sttr_transaction_type == 'PURBYSUPP' || $sttr_stock_type == 'wholesale') {
            //
            $transType = 'EXISTING';
            $sttrStatus = 'SOLDOUT';
            //
            parse_str(getTableValues("SELECT sttr_item_pre_id,sttr_item_id,sttr_metal_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_indicator,sttr_metal_rate,sttr_product_purchase_rate,"
                            . "sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_cust_wastage_wt,sttr_gs_weight_type,sttr_pkt_weight_type,sttr_nt_weight_type,sttr_total_making_charges,"
                            . "sttr_making_charges_type,sttr_other_charges_type,sttr_tax,sttr_tot_tax,sttr_mkg_cgst_per,sttr_mkg_cgst_chrg,sttr_mkg_sgst_per,sttr_mkg_sgst_chrg,sttr_mkg_igst_per,sttr_mkg_igst_chrg,sttr_tot_price_cgst_per,sttr_tot_price_cgst_chrg,"
                            . "sttr_tot_price_sgst_per,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_chrg,sttr_pre_invoice_no,sttr_invoice_no,sttr_mkg_charges_by,sttr_final_val_by,sttr_value_added,sttr_price,sttr_total_cust_price,sttr_metal_amt,sttr_total_making_amt,sttr_metal_discount_per,"
                            . "sttr_metal_discount_amt,sttr_add_date,sttr_mfg_date,sttr_owner_id,sttr_item_code,sttr_current_status FROM stock_transaction WHERE sttr_id='$sttr_id'"));
            //
            $insertSttrQuery = "INSERT INTO stock_transaction (sttr_transaction_type,sttr_item_pre_id,sttr_item_id,sttr_metal_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_indicator,sttr_quantity,sttr_metal_rate,sttr_product_purchase_rate,"
                    . "sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_cust_wastage_wt,sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight,sttr_pkt_weight_type,sttr_nt_weight,sttr_nt_weight_type,sttr_fine_weight,sttr_final_fine_weight,sttr_total_making_charges,"
                    . "sttr_making_charges_type,sttr_other_charges_type,sttr_tax,sttr_tot_tax,sttr_valuation,sttr_final_valuation,sttr_mkg_cgst_per,sttr_mkg_cgst_chrg,sttr_mkg_sgst_per,sttr_mkg_sgst_chrg,sttr_mkg_igst_per,sttr_mkg_igst_chrg,sttr_tot_price_cgst_per,sttr_tot_price_cgst_chrg,"
                    . "sttr_tot_price_sgst_per,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_chrg,sttr_pre_invoice_no,sttr_invoice_no,sttr_mkg_charges_by,sttr_final_val_by,sttr_value_added,sttr_price,sttr_total_cust_price,sttr_metal_amt,sttr_total_making_amt,sttr_metal_discount_per,"
                    . "sttr_metal_discount_amt,sttr_add_date,sttr_mfg_date,sttr_firm_id,sttr_owner_id,sttr_item_code,sttr_current_status,sttr_status,sttr_stock_trans_history,sttr_trans_date)VALUES "
                    . "('$transType','$sttr_item_pre_id','$sttr_item_id','$sttr_metal_type','$sttr_stock_type','$sttr_item_category','$sttr_item_name','$sttr_indicator','$sell_sttr_quantity','$sttr_metal_rate','$sttr_product_purchase_rate',"
                    . "'$sttr_purity','$sttr_wastage','$sttr_final_purity','$sttr_cust_wastage','$sttr_cust_wastage_wt','$sell_sttr_gs_weight','$sttr_gs_weight_type','$sell_sttr_pkt_weight','$sttr_pkt_weight_type','$sell_sttr_nt_weight','$sttr_nt_weight_type','$sell_sttr_fine_weight','$sell_sttr_final_fine_weight','$sttr_total_making_charges',"
                    . "'$sttr_making_charges_type','$sttr_other_charges_type','$sttr_tax','$sttr_tot_tax','$sell_sttr_valuation','$sell_sttr_final_valuation','$sttr_mkg_cgst_per','$sttr_mkg_cgst_chrg','$sttr_mkg_sgst_per','$sttr_mkg_sgst_chrg','$sttr_mkg_igst_per','$sttr_mkg_igst_chrg','$sttr_tot_price_cgst_per','$sttr_tot_price_cgst_chrg',"
                    . "'$sttr_tot_price_sgst_per','$sttr_tot_price_sgst_chrg','$sttr_tot_price_igst_chrg','$sttr_pre_invoice_no','$sttr_invoice_no','$sttr_mkg_charges_by','$sttr_final_val_by','$sttr_value_added','$sttr_price','$sttr_total_cust_price','$sttr_metal_amt','$sttr_total_making_amt','$sttr_metal_discount_per',"
                    . "'$sttr_metal_discount_amt','$sttr_add_date','$sttr_mfg_date','$firmId','$sttr_owner_id','$sttr_item_code','$sttr_current_status','$sttrStatus','$preFirmNames','$currentDate')";
            if (!mysqli_query($conn, $insertSttrQuery)) {
                die('Error: ' . mysqli_error($conn));
            }
            //
            parse_str(getTableValues("SELECT sttr_id AS new_sttr_sttr_id FROM stock_transaction ORDER BY sttr_id DESC LIMIT 0,1"));
            //
            $updateSttrQuery = "UPDATE stock_transaction SET sttr_sttr_id='$new_sttr_sttr_id' WHERE sttr_id='$sttrId' and sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_transaction_type IN ('sell')";
            if (!mysqli_query($conn, $updateSttrQuery)) {
                die('Error: ' . mysqli_error($conn));
            }
        } else if (($sttr_stock_type == 'retail') && ($sttr_quantity != $addItemFormQty || $sttr_gs_weight != $addItemFormGrossWeight || $sttr_nt_weight != $addItemFormNetWeight)) {
            //
            $finalSttrQty = ($sttr_quantity - $sell_sttr_quantity);
            $finalSttrPktWT = ($sttr_pkt_weight - $sell_sttr_pkt_weight);
            $finalSttrGSWT = ($sttr_gs_weight - $sell_sttr_gs_weight);
            $finalSttrGSWType = ($sell_sttr_gs_weight_type);
            $finalSttrGSWT = getTotalWeight($finalSttrGSWT, $finalSttrGSWType, 'weight');
            $finalSttrNTWT = ($sttr_nt_weight - $sell_sttr_nt_weight);
            $finalSttrNTWType = ($sell_sttr_nt_weight_type );
            $finalSttrNTWT = getTotalWeight($finalSttrNTWT, $finalSttrNTWType, 'weight');
            $finalSttrFNWT = ($sttr_fine_weight - $sell_sttr_fine_weight);
            $finalSttrFFWT = ($sttr_final_fine_weight - $sell_sttr_final_fine_weight);
            $finalSttrTotTax = ($sttr_tot_tax - $sell_sttr_tot_tax);
            $finalSttrVal = ($sttr_valuation - $sell_sttr_valuation);
            $finalSttrFinalVal = ($sttr_final_valuation - $sell_sttr_final_valuation);
            //
            $updateMainSttrQuery = "UPDATE stock_transaction SET sttr_quantity = '$finalSttrQty',"
                    . "sttr_pkt_weight = '$finalSttrPktWT',sttr_gs_weight = '$finalSttrGSWT',sttr_gs_weight_type = '$finalSttrGSWType',"
                    . "sttr_nt_weight = '$finalSttrNTWT',sttr_nt_weight_type = '$finalSttrNTWType',"
                    . "sttr_fine_weight = '$finalSttrFNWT',sttr_final_fine_weight = '$finalSttrFFWT',sttr_tot_tax = '$finalSttrTotTax',"
                    . "sttr_valuation = '$finalSttrVal', sttr_final_valuation = '$finalSttrFinalVal' WHERE sttr_firm_id = '$prevFirmId' and sttr_id='$sttr_id' and sttr_owner_id='$_SESSION[sessionOwnerId]'";
            if (!mysqli_query($conn, $updateMainSttrQuery)) {
                die('Error: ' . mysqli_error($conn));
            }
            //
            $transType = 'EXISTING';
            $sttrStatus = 'SOLDOUT';
            //
            parse_str(getTableValues("SELECT sttr_item_pre_id,sttr_item_id,sttr_item_id,sttr_metal_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_indicator,sttr_metal_rate,sttr_product_purchase_rate,"
                            . "sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_cust_wastage_wt,sttr_gs_weight_type,sttr_pkt_weight_type,sttr_nt_weight_type,sttr_total_making_charges,"
                            . "sttr_making_charges_type,sttr_other_charges_type,sttr_tax,sttr_tot_tax,sttr_mkg_cgst_per,sttr_mkg_cgst_chrg,sttr_mkg_sgst_per,sttr_mkg_sgst_chrg,sttr_mkg_igst_per,sttr_mkg_igst_chrg,sttr_tot_price_cgst_per,sttr_tot_price_cgst_chrg,"
                            . "sttr_tot_price_sgst_per,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_chrg,sttr_pre_invoice_no,sttr_invoice_no,sttr_mkg_charges_by,sttr_final_val_by,sttr_value_added,sttr_price,sttr_total_cust_price,sttr_metal_amt,sttr_total_making_amt,sttr_metal_discount_per,"
                            . "sttr_metal_discount_amt,sttr_add_date,sttr_mfg_date,sttr_owner_id,sttr_item_code,sttr_current_status FROM stock_transaction WHERE sttr_id='$sttr_id'"));
            //
            $insertSttrQuery = "INSERT INTO stock_transaction (sttr_transaction_type,sttr_item_pre_id,sttr_item_id,sttr_metal_type,sttr_stock_type,sttr_item_category,sttr_item_name,sttr_indicator,sttr_quantity,sttr_metal_rate,sttr_product_purchase_rate,"
                    . "sttr_purity,sttr_wastage,sttr_final_purity,sttr_cust_wastage,sttr_cust_wastage_wt,sttr_gs_weight,sttr_gs_weight_type,sttr_pkt_weight,sttr_pkt_weight_type,sttr_nt_weight,sttr_nt_weight_type,sttr_fine_weight,sttr_final_fine_weight,sttr_total_making_charges,"
                    . "sttr_making_charges_type,sttr_other_charges_type,sttr_tax,sttr_tot_tax,sttr_valuation,sttr_final_valuation,sttr_mkg_cgst_per,sttr_mkg_cgst_chrg,sttr_mkg_sgst_per,sttr_mkg_sgst_chrg,sttr_mkg_igst_per,sttr_mkg_igst_chrg,sttr_tot_price_cgst_per,sttr_tot_price_cgst_chrg,"
                    . "sttr_tot_price_sgst_per,sttr_tot_price_sgst_chrg,sttr_tot_price_igst_chrg,sttr_pre_invoice_no,sttr_invoice_no,sttr_mkg_charges_by,sttr_final_val_by,sttr_value_added,sttr_price,sttr_total_cust_price,sttr_metal_amt,sttr_total_making_amt,sttr_metal_discount_per,"
                    . "sttr_metal_discount_amt,sttr_add_date,sttr_mfg_date,sttr_firm_id,sttr_owner_id,sttr_item_code,sttr_current_status,sttr_status,sttr_stock_trans_history,sttr_trans_date)VALUES "
                    . "('$transType','$sttr_item_pre_id','$sttr_item_id','$sttr_metal_type','$sttr_stock_type','$sttr_item_category','$sttr_item_name','$sttr_indicator','$sell_sttr_quantity','$sttr_metal_rate','$sttr_product_purchase_rate',"
                    . "'$sttr_purity','$sttr_wastage','$sttr_final_purity','$sttr_cust_wastage','$sttr_cust_wastage_wt','$sell_sttr_gs_weight','$sttr_gs_weight_type','$sell_sttr_pkt_weight','$sttr_pkt_weight_type','$sell_sttr_nt_weight','$sttr_nt_weight_type','$sell_sttr_fine_weight','$sell_sttr_final_fine_weight','$sttr_total_making_charges',"
                    . "'$sttr_making_charges_type','$sttr_other_charges_type','$sttr_tax','$sttr_tot_tax','$sell_sttr_valuation','$sell_sttr_final_valuation','$sttr_mkg_cgst_per','$sttr_mkg_cgst_chrg','$sttr_mkg_sgst_per','$sttr_mkg_sgst_chrg','$sttr_mkg_igst_per','$sttr_mkg_igst_chrg','$sttr_tot_price_cgst_per','$sttr_tot_price_cgst_chrg',"
                    . "'$sttr_tot_price_sgst_per','$sttr_tot_price_sgst_chrg','$sttr_tot_price_igst_chrg','$sttr_pre_invoice_no','$sttr_invoice_no','$sttr_mkg_charges_by','$sttr_final_val_by','$sttr_value_added','$sttr_price','$sttr_total_cust_price','$sttr_metal_amt','$sttr_total_making_amt','$sttr_metal_discount_per',"
                    . "'$sttr_metal_discount_amt','$sttr_add_date','$sttr_mfg_date','$firmId','$sttr_owner_id','$sttr_item_code','$sttr_current_status','$sttrStatus','$preFirmNames','$currentDate')";
            if (!mysqli_query($conn, $insertSttrQuery)) {
                die('Error: ' . mysqli_error($conn));
            }
            //
            parse_str(getTableValues("SELECT sttr_id AS new_sttr_sttr_id FROM stock_transaction ORDER BY sttr_id DESC LIMIT 0,1"));
            //
            $updateSttrQuery = "UPDATE stock_transaction SET sttr_sttr_id='$new_sttr_sttr_id' WHERE sttr_id='$sttrId' and sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_transaction_type IN ('sell')";
            if (!mysqli_query($conn, $updateSttrQuery)) {
                die('Error: ' . mysqli_error($conn));
            }
        } else {
            $updateSttrQuery = "UPDATE stock_transaction SET sttr_firm_id='$firmId',sttr_stock_trans_history='$preFirmNames',sttr_trans_date='$currentDate' WHERE sttr_id = '$sttr_id' and sttr_owner_id='$_SESSION[sessionOwnerId]'";
            if (!mysqli_query($conn, $updateSttrQuery)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
    }
    //
    /* END TO CODE TO TRANSAFER STOCK FROM STOCK & STOCK TRANSACTION TABLE BEFORE SELL ENTRY @AUTHOR:MADHUREE-26JUNE2020 */
    //
    //
    /* START CODE TO TRANSAFER STOCK SELL ENTRY TO PERSONAL FIRM IN STOCK TRANSACTION TABLE @AUTHOR:MADHUREE-26JUNE2020 */
    //
    $selStockSellDetails = "SELECT sttr_id,sttr_firm_id FROM stock_transaction WHERE sttr_pre_invoice_no='$payPreInvoiceNo' AND sttr_invoice_no='$payInvoiceNo' AND sttr_owner_id = '$_SESSION[sessionOwnerId]' and sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_status NOT IN('DELETED')";
    $resultStockSellDetails = mysqli_query($conn, $selStockSellDetails);
    while ($rowStockSellDetails = mysqli_fetch_array($resultStockSellDetails, MYSQLI_ASSOC)) {
        $sttr_id = $rowStockSellDetails['sttr_id'];
        $sttr_firm_id = $rowStockSellDetails['sttr_firm_id'];
        //
        if ($new_sttr_sttr_id != '' && $new_sttr_sttr_id != NULL) {
            $sttr_sttr_id_str = ",sttr_sttr_id='$new_sttr_sttr_id'";
        } else {
            $sttr_sttr_id_str = "";
        }
        //
        $updateSttrSellQuery = "UPDATE stock_transaction SET sttr_firm_id='$firmId'$sttr_sttr_id_str,sttr_transaction_type='ESTIMATESELL',sttr_pre_invoice_no='$payNewPreInvoiceNo',sttr_invoice_no='$payNewInvoiceNo' WHERE sttr_id = '$sttr_id' and sttr_firm_id='$sttr_firm_id' and sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_transaction_type IN ('sell')";
        if (!mysqli_query($conn, $updateSttrSellQuery)) {
            die('Error: ' . mysqli_error($conn));
        }
    }
    //
    /* END CODE TO TRANSAFER STOCK SELL ENTRY TO PERSONAL FIRM IN STOCK TRANSACTION TABLE @AUTHOR:MADHUREE-26JUNE2020 */
    //
    $_REQUEST[$prefix . 'PreInvoiceNo'] = $payNewPreInvoiceNo;
    $_REQUEST[$prefix . 'PostInvoiceNo'] = $payNewInvoiceNo;
    $payPreInvoiceNo = $payNewPreInvoiceNo;
    $payInvoiceNo = $payNewInvoiceNo;
    $_REQUEST[$prefix . 'FirmId'] = $request[$prefix . 'FirmId'] = $firmId;
    //
}
?>
