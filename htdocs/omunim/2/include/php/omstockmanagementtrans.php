<?php

/*
 * **************************************************************************************
 * @Description: Stock Transfer @DNYANESHWARI21AUG2024
 * **************************************************************************************
 *
 * Created on AUG 21, 2021 07:12:00 PM 
 * **************************************************************************************
 * @FileName: omstockmanagementtrans.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.102
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * *****************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE: @PRIYANKA-25NOV2021
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
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$conn = $GLOBALS['conn'];
$currentDateTime = $GLOBALS['currentDateTime'];
//
$selectedFirm = $_GET['selectedFirm'];
//
$indicator = 'stock';
//
if ($showMessageDiv == '' || $showMessageDiv == NULL)
    $showMessageDiv = $_GET['showMessageDiv'];
//
if ($userId != NULL && $userId != '') {
    parse_str(getTableValues("SELECT * FROM user WHERE user_id = '$userId'"));
}
//
$messDiv = $_GET['messDiv'];
//    
//    
//print_r($_REQUEST);
//
//
// Added Code To GET Firm Details @AUTHOR:PRIYANKA-26NOV2021
$selFirmId = NULL;
//
$firmIdSelected = NULL;
//
$selFirmId = $_REQUEST['firmId'];
//
if (!isset($selFirmId)) {
    $firmIdSelected = $_SESSION['setFirmSession'];
    $selFirmId = $firmIdSelected;
} else {
    $firmIdSelected = $selFirmId;
}
//
//
if ($selectedFirm != '' && $selectedFirm != NULL) {
    $firmIdSelected = $selectedFirm;
}
//
//
//echo 'selFirmId == ' . $selFirmId . '<br />';
//echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
//echo 'firmIdSelected == ' . $firmIdSelected . '<br />';
//echo 'setFirmSession == ' . $_SESSION['setFirmSession'] . '<br />';
//echo 'documentRoot == ' . $documentRoot . '<br />';
//
//
// Start Code To GET Firm Details @AUTHOR:PRIYANKA-26NOV2021
if (isset($_GET['selFirmId'])) {
    $selFirmId = $_GET['selFirmId'];
} else {
    //if not selected assign session firm @AUTHOR:PRIYANKA-26NOV2021
    $selFirmId = $_SESSION['setFirmSession'];
}
//
//
//echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
//echo 'strFrmId == ' . $strFrmId . '<br />';
//echo 'selFirmId == ' . $selFirmId . '<br />';
//
//
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    if ($_REQUEST['firmId'] != NULL && $_REQUEST['firmId'] != '') {
        $selFirmId = $_REQUEST['firmId'];
    }
}
//
//
if ($_SESSION['sessionIgenType'] == $globalOwnPass) {
    //
    $qSelFirmCount = "SELECT firm_id FROM firm where firm_type = 'Public' and firm_own_id = '$_SESSION[sessionOwnerId]' "
            . "$sessionFirmStr";
    //
} else if ($_SESSION['sessionIgenType'] == $globalOwnIPass) {
    //
    $qSelFirmCount = "SELECT firm_id, firm_name, firm_type FROM firm where firm_own_id = '$_SESSION[sessionOwnerId]' "
            . "$sessionFirmStr order by firm_since desc";
    //
}
//
if ($selFirmId == NULL || $selFirmId == '' || $selFirmId == 'NotSelected') {
    $resFirmCount = mysqli_query($conn, $qSelFirmCount);
    $strFrmId = '0';
    //Set String for Public Firms @AUTHOR:PRIYANKA-26NOV2021
    while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
        $strFrmId = $strFrmId . ",";
        $strFrmId = $strFrmId . "$rowFirm[firm_id]";
    }
} else {
    $strFrmId = $selFirmId;
}
// End Code To GET Firm Details @AUTHOR:PRIYANKA-26NOV2021
//
//
?> 
<?php
// 
//include $_SESSION['documentRootIncludePhp'] . 'omStockStatusCheckForStockManagementByCounter.php';
include $_SESSION['documentRootIncludePhp'] . 'omstockstatuscheckforstockmanagement.php';
//
//
$newProdCode = $newProductPreId . $newProductPostId;
//
//
//echo '$newProdCode == ' . $newProdCode . '<br />';
//echo '$newProductPreId == ' . $newProductPreId . '<br />';
//echo '$newProductPostId == ' . $newProductPostId . '<br />';
//
//
$stockTransferHistoryDisplay = '';
//
if ($newProdCode != '' && $stockAvailable > 0) {
    
    //
    // ADDED CODE BY @AUTHOR:PRIYANKA-12SEP2023
    $productSearchWithBarcode = NULL;
    $productSearchWithRFID = NULL;
    $productSearchWithProdCode = NULL;
    //
    //
//    if ($newProductPreId != '' && $newProductPostId != '') {
//       //
//        // ADDED CODE BY @AUTHOR:PRIYANKA-12SEP2023
//        $qSelItemDetails = "SELECT * FROM stock_transaction "
//                . "WHERE sttr_item_pre_id = '$newProductPreId' AND sttr_item_id = '$newProductPostId' "
//                . "AND sttr_indicator IN ('stock', 'PURCHASE') and sttr_stock_type = 'retail' "
//                . "AND sttr_transaction_type NOT IN ('sell', 'ESTIMATESELL', 'APPROVAL') "
//                . "AND sttr_status NOT IN('DELETED')";
//        //
//        $resItemDetails = mysqli_query($conn, $qSelItemDetails);
//        $stockCount = mysqli_num_rows($resItemDetails);
//        
//        //
//        if ($stockCount > 0) {
//            $productSearchWithProdCode = 'YES';
//        }
//        //
//        //
//    }
        
    //
    $stockTransferHistoryDisplay = 'YES';
    //
    //
    // DATE @AUTHOR:PRIYANKA-26NOV2021
    $todayDate = date("d M Y");
    //
    $todayDate = strtoupper($todayDate);
    //
//    $rowItemDetails = mysqli_fetch_array($resItemDetails, MYSQLI_ASSOC);
    
   //
//    $sttrIdStr = "(sttr_id = '$sttrId' OR sttr_sttr_id = '$sttrId')";
    //
    //
   
    //
    // PRODUCT CODE CONDITION STR @AUTHOR:PRIYANKA-26NOV2021
    if ($newProductPostId == '' && $sttrPanelName == 'RETAIL_CAD_STOCK') {
        $prodCodeStr = " sttr_item_code = '$sttrItemCode' AND sttr_panel_name = 'RETAIL_CAD_STOCK' AND sttr_stock_type ='retail'";
    }
    elseif (($newProductPreId != '' && $newProductPreId != NULL) ||
            ($newProductPostId != '' && $newProductPostId != NULL)) {
        $prodCodeStr = " sttr_item_pre_id = '$newProductPreId' AND sttr_item_id = '$newProductPostId'";
    }
    //
    //
      
    //                   
    //             
    // WHERE CONDITION STR @AUTHOR:PRIYANKA-26NOV2021
//    $conditionStr = " AND ($sttrIdStr $barcodeStr $prodCodeStr $rfidStr) ";
     $conditionStr = " AND $prodCodeStr ";
//    echo '$conditionStr==>'.$conditionStr."<Br>";
//    die("hereee");
    //
    //
    $updateQueryStr = 'NO';
    //
    //
    // NEW STAFF SELECTED VARIABLE @PRIYANKA-27NOV2021
//    $selectedStaff = $_GET['selectedStaff'];
    //
    // NEW COUNTER SELECTED VARIABLE @PRIYANKA-27NOV2021
//    $productCounter = $_GET['productCounter'];
    //
    // NEW FIRM SELECTED VARIABLE @PRIYANKA-27NOV2021
    $selectedFirm = $_GET['selectedFirm'];
    //
    // PRE VOUCHER NUMBER @PRIYANKA-29JULY2022
    $preVoucherNo = $_GET['preVoucherNo'];
    
    //
    // POST VOUCHER NUMBER @PRIYANKA-29JULY2022
    $postVoucherNo = $_GET['postVoucherNo'];
    
    //
    //
    // PRODUCT DETAILS @PRIYANKA-27NOV2021
    parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                    . "AND sttr_transaction_type IN ('EXISTING','PURONCASH','TAG','PURBYSUPP') "
                    . "$conditionStr"));
   
    // PRODUCT DETAILS - PREVIOUS FIRM VARIABLE @PRIYANKA-27NOV2021
    $selectedFirmOld = $sttr_firm_id;
    //
    //
    //echo '$selectedFirmOld == ' . $selectedFirmOld . '<br />';
    //echo '$selectedFirm == ' . $selectedFirm . '<br />';
    //
    //
    // PREVIOUS FIRM DETAILS FOR HISTORY @PRIYANKA-27NOV2021
    parse_str(getTableValues("SELECT firm_name FROM firm WHERE firm_own_id = '$_SESSION[sessionOwnerId]' AND firm_id = '$selectedFirmOld'"));
    //one
    //
    // CURRENT / NEW FIRM DETAILS FOR HISTORY @PRIYANKA-27NOV2021
    parse_str(getTableValues("SELECT firm_name AS strFrmNameCurrent FROM firm WHERE firm_own_id = '$_SESSION[sessionOwnerId]' AND firm_id = '$selectedFirm'"));
    // two
    // 
    // PREVIOUS TRANS HISTORY @PRIYANKA-27NOV2021
    $strTransHistPrev = $sttr_stock_trans_history;
    //
    // PREVIOUS VOUCHER HISTORY @DNYANESHWARI
    $strTransHistVoucherPrev = $sttr_voucher_history;
    //
    // PREVIOUS TRANS DATE HISTORY @PRIYANKA-27NOV2021
    $strTransHistDatePrev = $sttr_trans_date;
    //
    // PREVIOUS TRANS FIRM NAME FOR HISTORY @PRIYANKA-27NOV2021
    $strFrmNamePrev = $firm_name;
    //
   
    //
    //
    // FOR NEW TRANS DATE HISTORY @PRIYANKA-27NOV2021
    $stTransDate = date("d/m/Y - h:i");
    //
    //
    if ($strFrmNamePrev != '' && $strFrmNamePrev != NULL) {
        //
        if ($strFrmNamePrev != $strFrmNameCurrent) {
            //
            if ($strFrmNameCurrent != '' && $strFrmNameCurrent != NULL) {
                //
                // FOR NEW TRANS HISTORY @PRIYANKA-27NOV2021
                $strTransHist = $strTransHistPrev . '#' . $strFrmNamePrev;
                //
            } else {
                //
                if ($strTransHistPrev == '' || $strTransHistPrev == NULL) {
                    //
                    // FOR NEW TRANS HISTORY @PRIYANKA-27NOV2021
                    $strTransHist = $strTransHistPrev . '#' . $strFrmNamePrev;
                    //
                } else {
                    //
                    // FOR NEW TRANS HISTORY @PRIYANKA-27NOV2021
                    $strTransHist = $strTransHistPrev;
                    //
                }
            }
            //
            //
        } else {
            //
            // FOR NEW TRANS HISTORY @PRIYANKA-27NOV2021
            $strTransHist = $strTransHistPrev;
            //
        }
        //
        //
    } else {
        //
        // FOR NEW TRANS HISTORY @PRIYANKA-27NOV2021
        $strTransHist = $strTransHistPrev;
        //
    }
    //
    //
    // FOR NEW TRANS DATE HISTORY @PRIYANKA-27NOV2021
    $strTransHistDate = $strTransHistDatePrev . '#' . $stTransDate;
    //
    //
    //
    // FOR NEW TRANS DATE UPDATE STR @PRIYANKA-27NOV2021
    $productTransDateStr = ", sttr_trans_date = '$strTransHistDate' ";
    //
    //
    //
    // IF NEW FIRM AND PREVIOUS FIRM ARE DIFFERENT - THEN ONLY STOCK TRANSFER WILL PROCESS @PRIYANKA-27NOV2021
    if ($selectedFirm != $sttr_firm_id) {
        //
        //
        if ($selectedFirm != '' && $selectedFirm != NULL) {
            //                
            // FOR NEW TRANS UPDATE STR @PRIYANKA-02DEC2021
            $productTransferDetailsStr = " sttr_firm_id = '$selectedFirm', "
                    . " sttr_stock_trans_history = '$strTransHist' ";
            $producttransferfirmId = " st_firm_id = '$selectedFirm' ";
            //
            //
        } else {
            // 
            // FOR NEW TRANS UPDATE STR @PRIYANKA-27NOV2021
            $productTransferDetailsStr = " sttr_stock_trans_history = '$strTransHist' ";
            //  
            //
        }
        //
        //
        //echo '$productTransferDetailsStr == ' . $productTransferDetailsStr . '<br />';
        //
        //
        include $_SESSION['documentRootIncludePhp'] . 'omStockTransferByFirm.php';
        //
        //
        $updateQueryStr = 'YES';
        //
        //
    }
    
    if ($updateQueryStr == 'YES') {
        //
        //
        
        //
        $updStatusColumnValueStr = ", sttr_stock_transfer_status = 'COMPLETED' ";
        //
        $strTransferCounter = ", sttr_stock_transfer_success_status = 'transferPending' ";
        //
         $strTransHistPrePostVoucher = $strTransHistVoucherPrev . '#' . $preVoucherNo.'|'.$postVoucherNo;
         $strTransferVoucher = ", sttr_voucher_history = '$strTransHistPrePostVoucher' ";
        // STOCK TRANSFER UPDATE QUERY @AUTHOR:PRIYANKA-26NOV2021
        // Added Code in where condition @Author:PRIYANKA-05AUG2022
        
        //
         $updateQuery = " UPDATE stock_transaction SET "
        . " $productTransferDetailsStr $updStatusColumnValueStr $strTransferVoucher"
        . " $productTransDateStr "
        . " $productTransCounterHistoryStr "
        . " $conditionForApprovalPendingStr "
        . " WHERE sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP') AND sttr_stock_type = 'retail' "
        . " AND sttr_indicator IN ('stock', 'crystal', 'imitation', 'AddInvoice','stockCrystal') "
        . " $conditionStr ";
        //
      
        //
        //echo '$updateQuery == ' . $updateQuery . '<br />';
        //
        //
        if (!mysqli_query($conn, $updateQuery)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
        //
        //
        // VOUCHER NUMBER UPDATE STR @AUTHOR:PRIYANKA-29JULY2022
        $updVoucherColumnValueStr = " sttr_pre_voucher_no = '$preVoucherNo', "
                . " sttr_voucher_no = '$postVoucherNo' ";
        //
        //
        // STOCK TRANSFER VOUCHER UPDATE QUERY @AUTHOR:PRIYANKA-25JULY2022
        $updateVouchrQuery = " UPDATE stock_transaction SET "
                . " $updVoucherColumnValueStr $strTransferCounter "
                . " WHERE sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP') AND sttr_stock_type = 'retail' "
                . " AND sttr_indicator IN ('stock', 'crystal', 'imitation', 'AddInvoice') "
                . " AND (sttr_stock_transfer_lot_status IS NULL OR sttr_stock_transfer_lot_status = '') "
                . " $conditionStr ";
        //
//        echo '$updateVouchrQuery == ' . $updateVouchrQuery . '<br />';
        
        if (!mysqli_query($conn, $updateVouchrQuery)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
        //
    }
    //
    //
    //echo '$updateQuery == ' . $updateQuery . '<br />';
    //
    //
}
?>