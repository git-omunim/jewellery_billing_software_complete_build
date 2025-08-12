<?php
/*
 * **************************************************************************************
 * @tutorial: RAW METAL DELETE @AUTHOR:PRIYANKA-30JULY2021 
 * **************************************************************************************
 * 
 * Created on JULY 30, 2021 11:17:00 AM
 *
 * @FileName: omrmdelt.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
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
require_once 'system/omssopin.php';
require_once 'system/omsgeagb.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
include_once 'conversions.php';
include 'ogiamtrts.php';
?>
<?php
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$rwprId = $_GET['rwprId'];
$rwmtdrId = $_GET['rwmtdrId'];
$rawPanelName = $_GET['panelName'];
$mainPanelNew = $_GET['mainPanel'];
$payPanelName = $_GET['payPanelName'];
$pageNum = $_GET['pageNum'];
$rowsPerPage = $_GET['rowsPerPage'];
$delFromRawStock = $_GET['rawDeleteConfirm'];
$mainPanel = $_GET['mainPanelNew'];
$metType = $_GET['metType'];
//
$metalRateId = $_GET['metalRateId'];
$metalTypeNew = $_GET['metalType'];
$userId = $_GET['userId'];
$rawMetalType = $_GET['rawMetalType'];
//
if ($mainPanelNew == 'RawMetalStock') {
    $query = "DELETE FROM raw_metal where rwmt_id='$rwprId'";
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
} else {
    //
    parse_str(getTableValues("SELECT sttr_pre_invoice_no,sttr_invoice_no,sttr_firm_id,sttr_user_id,sttr_metal_type,sttr_item_category,sttr_item_name,sttr_add_date,sttr_valuation FROM stock_transaction where sttr_id = '$rwprId'"));
    $payPreInvoiceNo = $sttr_pre_invoice_no;
    $payInvoiceNo = $sttr_invoice_no;
    //
    if ($metType == 'SELL') {
        $transType = 'sell';
    } else {
        $transType = 'PURBYSUPP';
    }
    //
    $noOfItems = noOfRowsCheck('sttr_id', 'stock_transaction', "sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_pre_invoice_no = '$sttr_pre_invoice_no' and sttr_invoice_no = '$sttr_invoice_no' and sttr_indicator='rawMetal' and sttr_transaction_type='$transType' and sttr_current_status NOT IN ('Deleted')");
    parse_str(getTableValues("SELECT utin_id,utin_transaction_type FROM user_transaction_invoice where utin_pre_invoice_no ='$sttr_pre_invoice_no' and utin_invoice_no ='$sttr_invoice_no' and utin_user_id='$userId' and utin_type='rawMetal' and utin_transaction_type='$transType'"));
    $utinId = $utin_id;
    $uTransaction = $utin_transaction_type;
    stock_transaction('delete', array(), $rwprId, '', $delFromRawStock);
    $sslg_trans_sub = 'RAW METAL DELETED';
    $sysLogTransType = 'AddRawMetal';
    $sysLogTransId = $payPreInvoiceNo . $payInvoiceNo;
    $sslg_firm_id = $sttr_firm_id;
    $custId = $sttr_user_id;
    $sslg_trans_comment = 'Raw Inv No: ' . $sysLogTransId . ', ' . $sttr_metal_type . ', Date: ' . $sttr_add_date . ', Valuation: ' . formatInIndianStyle($sttr_valuation);
    include 'omslgapi.php';
    //
    $rawPresent = noOfRowsCheck('sttr_id', 'stock_transaction', "sttr_utin_id ='$utin_id' and sttr_indicator = 'rawMetal' AND sttr_transaction_type = '$uTransaction' and sttr_user_id='$userId'");
    //
    if ($utin_id != '') {
        parse_str(getTableValues("SELECT * FROM user_transaction_invoice where utin_owner_id='$_SESSION[sessionOwnerId]' and utin_id ='$utinId'"));
        if ($noOfItems > 0) {
            //
            $jrnlId = $utin_jrnl_id;
            $apiType = 'delete';
            include 'ommpjrnl.php';

            $jrtrJrnlId = $utin_jrnl_id;
            $apiType = 'delete';
            include 'ommpjrtr.php';

            $jrnlId = $utin_tax_jrnl_id;
            $apiType = 'delete';
            include 'ommpjrnl.php';

            $jrtrJrnlId = $utin_tax_jrnl_id;
            $apiType = 'delete';
            include 'ommpjrtr.php';
            //            
            $sslg_trans_sub = 'RAW PAYMENT DELETED';
            $sysLogTransType = 'AddRawMetal';
            $sysLogTransId = $payPreInvoiceNo . $payInvoiceNo;
            $sslg_firm_id = $sttr_firm_id;
            $custId = $sttr_user_id;
            $sslg_trans_comment = 'Raw Inv No: ' . $sysLogTransId . ', Date: ' . $sttr_add_date . ', Cash Paid: ' . formatInIndianStyle($utin_pay_card_amt + $utin_pay_cheque_amt + $utin_cash_amt_rec)
                                . ', Discount: ' . formatInIndianStyle($utin_discount_amt) . ', Balance: ' . formatInIndianStyle($utin_cash_balance);
            include 'omslgapi.php';
            $addSysLogInd = 'NO';
            //
            // CODE TO MANAGE STOCK FOR RECEIVED/PAID RAW METAL
            $rawMetalQuery = "SELECT * FROM stock_transaction "
                           . "WHERE sttr_transaction_type IN ('PAID','RECEIVED') "
                           . "and sttr_utin_id='$utin_id'";

            $resultQuery = mysqli_query($conn, $rawMetalQuery);

            while ($row = mysqli_fetch_array($resultQuery)) {
                $sttr_transaction_type = $row['sttr_transaction_type'];
                $sttr_id = $row['sttr_id'];

                // CALL STOCK TRANSACTION ACCORDING URD TRANSACTION 
                if ($sttr_transaction_type == 'PAID') {
                    stock_transaction('delete', $row, $sttr_id, '', 'yes');
                } else if ($sttr_transaction_type == 'RECEIVED') {
                    stock_transaction('delete', array(), $sttr_id, '', 'yes');
                }
            }
            //
            user_transaction_invoice('delete', $_REQUEST, $utinId, $userId);
            // DELETE ONPURCHASE ENTRY
            $rawMetalOnpurchaseQuery = "SELECT utin_id FROM user_transaction_invoice "
                                     . "WHERE utin_type IN ('OnPurchase') "
                                     . "and utin_utin_id='$utinId'";
            $resultMetalOnpurchaseQuery = mysqli_query($conn, $rawMetalOnpurchaseQuery);

            while ($rowMetalOnpurchaseQuery = mysqli_fetch_array($resultMetalOnpurchaseQuery)) {
                $query = "DELETE FROM user_transaction_invoice "
                       . "WHERE utin_id = '$rowMetalOnpurchaseQuery[utin_id]' AND utin_type IN ('OnPurchase')";
                //
                if (!mysqli_query($conn, $query)) {
                    die('Error: ' . mysqli_error($conn));
                }
            }
        } 
        //
        // ==================================================================================================== // 
        // START CODE TO ROLL BACK ALL TRANSACTION WHICH IS SETTLED IN THIS INVOICE @AUTHOR:PRIYANKA-30JULY2021 //
        // ==================================================================================================== // 
        //
        $qSelPrevGdPayInvDet = "SELECT utin_id,utin_other_info  "
                             . "FROM user_transaction_invoice "
                             . "WHERE utin_owner_id='$_SESSION[sessionOwnerId]' "
                             . "and utin_user_id='$userId' and utin_gd_settled_inv_id='$utinId' "
                             . "and utin_gd_pay_chk = 'checked'";

        $resSelPrevGdPayInvDet = mysqli_query($conn, $qSelPrevGdPayInvDet);
        while ($rowSelPrevGdPayInvDet = mysqli_fetch_array($resSelPrevGdPayInvDet, MYSQLI_ASSOC)) {
            $otherInfo = $rowSelPrevAmtPayInvDet['utin_other_info'];
            $otherInfo = substr($otherInfo, 0, strripos($otherInfo, "SETTLED ") - 1);
            $qUpdInv = "UPDATE user_transaction_invoice "
                     . "SET utin_gd_settled_inv_id=NULL,utin_gd_pay_chk=NULL,"
                     . "utin_other_info='$otherInfo' "
                     . "WHERE utin_id='$rowSelPrevGdPayInvDet[utin_id]'";
            if (!mysqli_query($conn, $qUpdInv)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        //
        $qSelPrevSlPayInvDet = "SELECT utin_id,utin_other_info  "
                             . "FROM user_transaction_invoice "
                             . "WHERE utin_owner_id='$_SESSION[sessionOwnerId]' and "
                             . "utin_user_id='$userId' and utin_sl_settled_inv_id='$utinId' "
                             . "and utin_sl_pay_chk = 'checked'";

        $resSelPrevSlPayInvDet = mysqli_query($conn, $qSelPrevSlPayInvDet);
        while ($rowSelPrevSlPayInvDet = mysqli_fetch_array($resSelPrevSlPayInvDet, MYSQLI_ASSOC)) {
            $otherInfo = $rowSelPrevAmtPayInvDet['utin_other_info'];
            $otherInfo = substr($otherInfo, 0, strripos($otherInfo, "SETTLED ") - 1);
            $qUpdInv = "UPDATE user_transaction_invoice "
                     . "SET utin_sl_settled_inv_id=NULL,utin_sl_pay_chk=NULL,"
                     . "utin_other_info='$otherInfo' "
                     . "WHERE utin_id='$rowSelPrevSlPayInvDet[utin_id]'";
            if (!mysqli_query($conn, $qUpdInv)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        //
        $qSelPrevAmtPayInvDet = "SELECT utin_id,utin_other_info "
                              . "FROM user_transaction_invoice "
                              . "WHERE utin_owner_id='$_SESSION[sessionOwnerId]' "
                              . "and utin_user_id='$userId' and utin_amt_settled_inv_id='$utinId' "
                              . "and utin_amt_pay_chk = 'checked'";

        $resSelPrevAmtPayInvDet = mysqli_query($conn, $qSelPrevAmtPayInvDet);
        while ($rowSelPrevAmtPayInvDet = mysqli_fetch_array($resSelPrevAmtPayInvDet, MYSQLI_ASSOC)) {
            $otherInfo = $rowSelPrevAmtPayInvDet['utin_other_info'];
            $otherInfo = substr($otherInfo, 0, strripos($otherInfo, "SETTLED ") - 1);
            $qUpdInv = "UPDATE user_transaction_invoice "
                     . "SET utin_amt_settled_inv_id=NULL,utin_amt_pay_chk=NULL,"
                     . "utin_other_info='$otherInfo' "
                     . "WHERE utin_id='$rowSelPrevAmtPayInvDet[utin_id]'";
            if (!mysqli_query($conn, $qUpdInv)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        //
        // ================================================================================================== // 
        // END CODE TO ROLL BACK ALL TRANSACTION WHICH IS SETTLED IN THIS INVOICE @AUTHOR:PRIYANKA-30JULY2021 //
        // ================================================================================================== // 
        //
    }
}
//
if ($mainPanelNew == 'AddRawStock') {
    header("Location: $documentRoot/include/php/ogrmindv.php?panelName=$mainPanelNew&messDiv=itemDeleted&metType=$metType&mainPanel=$mainPanel&userId=$userId"); //Start code to redirecting after deleting @ATHU:27/2/17
} else if ($mainPanelNew == 'RawPayment') {
    header("Location: $documentRoot/include/php/ogrmindv.php?paymentPanelName=$payPanelName&payMessDiv=itemDeleted&preInvNo=$sttr_pre_invoice_no&postInvNo=$sttr_invoice_no&metType=$metType&mainPanel=$mainPanel&userId=$userId");
} else if ($mainPanelNew == 'RawPayUp') {
    header("Location: $documentRoot/include/php/ogrmindv.php?panelName=$payPanelName&paymentPanelName=$payPanelName&messDiv=itemDeleted&preInvNo=$sttr_pre_invoice_no&postInvNo=$sttr_invoice_no&metType=$metType&mainPanel=$mainPanel&userId=$userId");
} else if ($mainPanelNew == 'RawUserPanelPurchaseList') {
    header("Location: $documentRoot/include/php/ogrwwscprlt.php?messDiv=itemDeleted&metType=$metType&mainPanel=$mainPanel&userId=$userId");
} else if ($mainPanelNew == 'RawStockPanelPurchaseList') {
    header("Location: $documentRoot/include/php/ogrmpslt.php");
} else if ($payPanelName == 'RawPayment') {
    header("Location: $documentRoot/include/php/ogrmindv.php?paymentPanelName=$payPanelName&payMessDiv=itemDeleted&preInvNo=$sttr_pre_invoice_no&postInvNo=$sttr_invoice_no&metType=$metType&mainPanel=$mainPanel&userId=$userId");
} else if ($mainPanelNew == 'RawMetalStock') {
    header("Location: $documentRoot/include/php/ogrmsdlt.php?payMessDiv=itemDeleted&metalType=$metalTypeNew&rawMetalType=$rawMetalType&page=$pageNum&rowsPerPage=$rowsPerPage");
} else if ($mainPanelNew == 'RawSellList') {
    header("Location: $documentRoot/include/php/omOrdTranslt.php?messDiv=itemDeleted&metType=$metType&mainPanel=$mainPanel&userId=$userId");
}
//
?>