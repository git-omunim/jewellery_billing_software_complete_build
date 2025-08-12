<?php
/*
 * **************************************************************************************
 * @Description: STOCK MANAGEMENT BY COUNTER @PRIYANKA-25NOV2021
 * **************************************************************************************
 *
 * Created on NOV 25, 2021 07:12:00 PM 
 * **************************************************************************************
 * @FileName: omStockManagementByCounter.php
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
<div id="stockManagementByCounterMainDiv">
    <?php
    //
    //print_r($_REQUEST);
    //
    $sessionOwnerId = $_SESSION['sessionOwnerId'];
    $conn = $GLOBALS['conn'];
    $currentDateTime = $GLOBALS['currentDateTime'];
    //
    //
    //echo '$sessionOwnerId == ' . $sessionOwnerId . '<br />';
    //
    //
    $selectedStaff = $_GET['selectedStaff'];
    //
    $productCounter = $_GET['productCounter'];
    //
    $selectedFirm = $_GET['selectedFirm'];
    //
    //
    $preVoucher = $_GET['preVoucherNo'];
    //
    //
    if ($custId == '' || $custId == NULL)
        $custId = $_GET['custId'];
    //
    if ($userId == '' || $userId == NULL)
        $userId = $_GET['custId'];
    //
    if ($custId == '' || $custId == NULL)
        $custId = $_GET['userId'];
    //
    if ($userId == '' || $userId == NULL)
        $userId = $_GET['userId'];
    //
    if ($indicator == '' || $indicator == NULL)
        $indicator = $_GET['indicator'];
    //
    $indicator = "\'stock\',\'imitation\'";
    //
    if ($panelName == '' || $panelName == NULL)
        $panelName = $_GET['panelName'];
    //
    if ($transType == '' || $transType == NULL)
        $transType = $_GET['transactionType'];
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
    //echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
    //echo 'strFrmId == ' . $strFrmId . '<br />';
    //echo 'selFirmId == ' . $selFirmId . '<br />';
    //
    //
    ?>
    <?php
    //
    //
    $headingNameForPanel = 'STOCK TRANSFER';
    //
    //
    include $_SESSION['documentRootIncludePhp'] . 'omStockTransferReportAllButtons.php';
    //
    //
    ?>        
    <div id="stockManagementByCounterDiv">
        <?php
        //
        //
        if ($updatePanelName == '' || $updatePanelName == NULL)
            $updatePanelName = $_GET['updatePanelName'];
        //
        //
        // FOR STOCK TRANSFER VOUCHER @AUTHOR:PRIYANKA-29JULY2022
        if ($updatePanelName == 'stockTransferVoucherUpdate') {
            //
            //
            // FOR STOCK TRANSFER VOUCHER FIRM STR @AUTHOR:PRIYANKA-29JULY2022
            if ($selFirmId != '' && $selFirmId != NULL) {
                $firmStrForVoucher = " AND sttr_firm_id = '$selFirmId' ";
            }
            //
            // FOR STOCK TRANSFER VOUCHER FIRM STR @AUTHOR:PRIYANKA-29JULY2022
            if ($_REQUEST['selectedFirm'] != '' && $_REQUEST['selectedFirm'] != NULL) {
                $firmStrForVoucher = " AND sttr_firm_id = '$_REQUEST[selectedFirm]' ";
            }
            //
            //
            // FOR STOCK TRANSFER PRE VOUCHER NUMBER @AUTHOR:PRIYANKA-29JULY2022
            if ($sttr_pre_voucher_no_update == '' || $sttr_pre_voucher_no_update == NULL)
                $sttr_pre_voucher_no_update = $_GET['preVoucherNo'];
            //
            // FOR STOCK TRANSFER POST VOUCHER NUMBER @AUTHOR:PRIYANKA-29JULY2022
            if ($sttr_voucher_no_update == '' || $sttr_voucher_no_update == NULL)
                $sttr_voucher_no_update = $_GET['postVoucherNo'];
            //
            //
            // STOCK TRANSFER VOUCHER UPDATE QUERY @AUTHOR:PRIYANKA-25JULY2022
            $updateVoucherQuery = " UPDATE stock_transaction SET "
                    . " sttr_pre_voucher_no = '$sttr_pre_voucher_no_update', "
                    . " sttr_voucher_no = '$sttr_voucher_no_update', "
                    . " sttr_stock_transfer_lot_status = 'COMPLETED' "
                    . " WHERE (sttr_stock_transfer_lot_status IS NULL OR sttr_stock_transfer_lot_status = '') "
                    //. " AND (sttr_pre_voucher_no IS NOT NULL AND sttr_pre_voucher_no != '') "
                    //. " AND (sttr_voucher_no IS NOT NULL AND sttr_voucher_no != '') "
                    //. " AND (sttr_pre_voucher_no IS NULL OR sttr_pre_voucher_no = '') "
                    //. " AND (sttr_voucher_no IS NULL OR sttr_voucher_no = '') "
                    . " $firmStrForVoucher "
                    . " AND sttr_stock_transfer_status = 'COMPLETED' "
                    . " AND sttr_indicator NOT IN ('stockCrystal') "
                    . " AND sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP', 'PURCHASE') ";
            //
            //echo '$updateVoucherQuery == ' . $updateVoucherQuery . '<br />';
            //
            if (!mysqli_query($conn, $updateVoucherQuery)) {
                die('Error: ' . mysqli_error($conn));
            }
            //
            //
        }
        //
        //
        //
        // ADDED CODE BY FOR ORDER PANEL @AUTHOR:PRIYANKA-25NOV2021
        include $_SESSION['documentRootIncludePhp'] . 'omStockStatusCheckForStockManagementByCounter.php';
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
            if ($newProductPreId == '' && $newProductPostId != '') {
                //
                // ADDED CODE BY @AUTHOR:PRIYANKA-12SEP2023
                $qSelItemDetails = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stock' "
                        . "AND sttr_barcode_prefix = '$productBarCodePreId' AND sttr_barcode = '$productBarCode'";
                //
                $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                $stockCount = mysqli_num_rows($resItemDetails);
                //
                if ($stockCount > 0) {
                    $productSearchWithBarcode = 'YES';
                }
                //
            } else {
                //
                // ADDED CODE BY @AUTHOR:PRIYANKA-12SEP2023
                $qSelItemDetails = "SELECT * FROM stock_transaction "
                        . "WHERE sttr_item_pre_id = '$newProductPreId' AND sttr_item_id = '$newProductPostId' "
                        . "AND sttr_indicator IN ('stock', 'PURCHASE') and sttr_stock_type = 'retail' "
                        . "AND sttr_transaction_type NOT IN ('sell', 'ESTIMATESELL', 'APPROVAL') "
                        . "AND sttr_status NOT IN('DELETED')";
                //
                $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                $stockCount = mysqli_num_rows($resItemDetails);
                //
                if ($stockCount > 0) {
                    $productSearchWithProdCode = 'YES';
                }
                //
            }
            //  
            //                      
            // If Stock Available Count is Zero then check with RFID No. @AUTHOR:PRIYANKA-25NOV2021
            if ($stockCount == 0 && $prodScanWithRFID != '') {
                //
                // ADDED CODE BY @AUTHOR:PRIYANKA-12SEP2023
                $qSelItemDetails = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stock' "
                        . "AND sttr_rfid_no = '$newProdCode' AND sttr_transaction_type NOT IN ('sell', 'ESTIMATESELL', 'APPROVAL')";
                //
                $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                $stockCount = mysqli_num_rows($resItemDetails);
                //
                if ($stockCount > 0) {
                    $productSearchWithRFID = 'YES';
                }
                //
            }
            //
            //
            // FOR PRODUCT CODE SCAN WITH SPACE IN PRE ID @AUTHOR:PRIYANKA-14APR2022
            if ($newProductPreId != '' && $newProductPostId != '' && $stockCount == 0) {
                //
                // ADDED CODE BY @AUTHOR:PRIYANKA-12SEP2023
                $qSelItemDetails = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stock' "
                        . "AND sttr_item_code = '$newProdCode' AND sttr_stock_type = 'retail' "
                        . "AND sttr_transaction_type NOT IN ('sell', 'ESTIMATESELL', 'APPROVAL')";
                //
                $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                //
                $stockCount = mysqli_num_rows($resItemDetails);
                //
                if ($stockCount > 0) {
                    $productSearchWithProdCode = 'YES';
                }
                //
            }
            //
            //
            // FOR PRODUCT CODE SCAN WITH SPACE IN PRE ID @AUTHOR:PRIYANKA-12SEP2023
            if ($newProductPostId != '' && $stockCount == 0) {
                //
                // ADDED CODE BY @AUTHOR:PRIYANKA-12SEP2023
                $qSelItemDetails = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stock' "
                        . "AND sttr_item_code = '$newProdCode' AND sttr_stock_type = 'retail' "
                        . "AND sttr_transaction_type NOT IN ('sell', 'ESTIMATESELL', 'APPROVAL')";
                //
                $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                //
                $stockCount = mysqli_num_rows($resItemDetails);
                //
                if ($stockCount > 0) {
                    $productSearchWithProdCode = 'YES';
                }
                //
            }
            //
            //
            // FOR BARCODE WITH CHARACTERS @AUTHOR:PRIYANKA-14APR2022
            if ($newProductPreId != '' && $newProductPostId != '' && $stockCount == 0) {
                //
                // ADDED CODE BY @AUTHOR:PRIYANKA-12SEP2023
                $qSelItemDetails = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stock' "
                        . "AND sttr_barcode = '$newProdCode' AND sttr_stock_type = 'retail' "
                        . "AND sttr_transaction_type NOT IN ('sell', 'ESTIMATESELL', 'APPROVAL')";
                //
                $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                //
                $stockCount = mysqli_num_rows($resItemDetails);
                //
                if ($stockCount > 0) {
                    $productSearchWithBarcode = 'YES';
                }
                //
            }
            //
            //
            // START CODE FOR SCAN PRODUCT WITH BARCODE NUMBER (STARTS WITH ZERO) @AUTHOR:PRIYANKA-25NOV2021
            if ($stockCount == 0) {
                //
                if ($newProductPreId == '' && $newProductPostId != '') {
                    //
                    $productBarCodePreId = substr($newProductPostId, 0, 2);
                    $productBarCode = substr($newProductPostId, 2);
                    //
                    // ADDED CODE BY @AUTHOR:PRIYANKA-12SEP2023
                    $qSelItemDetails = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stock' "
                            . "AND sttr_barcode_prefix = '$productBarCodePreId' AND sttr_barcode = '$productBarCode' "
                            . "AND sttr_transaction_type NOT IN ('sell', 'ESTIMATESELL', 'APPROVAL')";
                    //
                    $resItemDetails = mysqli_query($conn, $qSelItemDetails);
                    $stockCount = mysqli_num_rows($resItemDetails);
                    //
                    if ($stockCount > 0) {
                        $productSearchWithBarcode = 'YES';
                    }
                    //
                }
            }
            //
            //
            if ($stockCount == 0) {
                // 
                // ADDED CODE BY @AUTHOR:PRIYANKA-12SEP2023
                $productSearchWithBarcode = NULL;
                $productSearchWithRFID = NULL;
                $productSearchWithProdCode = NULL;
                //
            }
            //
            //
            //echo '$qSelItemDetails == ' . $qSelItemDetails . '<br />';
            //echo '$stockCount == ' . $stockCount . '<br />';
            //     
            //
            $stockTransferHistoryDisplay = 'YES';
            //
            //
            // DATE @AUTHOR:PRIYANKA-26NOV2021
            $todayDate = date("d M Y");
            //
            $todayDate = strtoupper($todayDate);
            //
            $rowItemDetails = mysqli_fetch_array($resItemDetails, MYSQLI_ASSOC);
            //
            // 
            $sttrId = $rowItemDetails['sttr_id'];
            //    
            //              
            //echo '$sttrId == ' . $sttrId . '<br />';
            //echo '$productBarCodePreId == ' . $productBarCodePreId . '<br />';
            //echo '$productBarCode == ' . $productBarCode . '<br />';
            //echo '$newProdCode == ' . $newProdCode . '<br />';
            //echo '$newProductPreId == ' . $newProductPreId . '<br />';
            //echo '$newProductPostId == ' . $newProductPostId . '<br />';
            //
            //
            $sttrIdStr = "(sttr_id = '$sttrId')";
            //
            //
            // BARCODE CONDITION STR @AUTHOR:PRIYANKA-26NOV2021
            if (($productBarCodePreId != '' && $productBarCodePreId != NULL) ||
                    ($productBarCode != '' && $productBarCode != NULL)) {
                $barcodeStr = " OR (sttr_barcode_prefix = '$productBarCodePreId' AND sttr_barcode = '$productBarCode')";
            }
            //
            //
            // PRODUCT CODE CONDITION STR @AUTHOR:PRIYANKA-26NOV2021
            if (($newProductPreId != '' && $newProductPreId != NULL) ||
                    ($newProductPostId != '' && $newProductPostId != NULL)) {
                $prodCodeStr = " OR (sttr_item_pre_id = '$newProductPreId' AND sttr_item_id = '$newProductPostId')";
            }
            //
            //
            // RFID CONDITION STR @AUTHOR:PRIYANKA-26NOV2021
            if ($newProdCode != '' && $newProdCode != NULL) {
                $rfidStr = " OR (sttr_rfid_no = '$newProdCode')";
            }
            //   
            //                   
            //             
            // WHERE CONDITION STR @AUTHOR:PRIYANKA-26NOV2021
            $conditionStr = " AND ($sttrIdStr $barcodeStr $prodCodeStr $rfidStr) ";
            //
            //
            $updateQueryStr = 'NO';
            //
            //
            // NEW STAFF SELECTED VARIABLE @PRIYANKA-27NOV2021
            $selectedStaff = $_GET['selectedStaff'];
            //
            // NEW COUNTER SELECTED VARIABLE @PRIYANKA-27NOV2021
            $productCounter = $_GET['productCounter'];
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
            //
            //
            //if ($sttr_stock_trans_counter_history == '' || $sttr_stock_trans_counter_history == NULL) {
            //
            // PRODUCT DETAILS - PREVIOUS COUNTER VARIABLE @PRIYANKA-27NOV2021
            $productCounterOld = $sttr_counter_name;
            //
            //} else {
            //
            // PREVIOUS COUNTER VARIABLE @PRIYANKA-27NOV2021
            //$productCounterOld = $sttr_stock_trans_counter_history;
            //
            //}
            //
            //
            //echo '$sttr_stock_trans_counter_history == ' . $sttr_stock_trans_counter_history . '<br />';
            //echo '$productCounterOld == ' . $productCounterOld . '<br />';
            //
            //
            //if ($sttr_stock_trans_staff_history == '' || $sttr_stock_trans_staff_history == NULL) {
            //
            // PRODUCT DETAILS - PREVIOUS STAFF VARIABLE @PRIYANKA-27NOV2021
            $selectedStaffOld = $sttr_staff_id;
            //
            //} else {
            //
            // PREVIOUS STAFF VARIABLE @PRIYANKA-27NOV2021
            //$selectedStaffOld = $sttr_stock_trans_staff_history;
            //
            //}
            //
            //
            //echo '$sttr_stock_trans_staff_history == ' . $sttr_stock_trans_staff_history . '<br />';
            //echo '$selectedStaffOld == ' . $selectedStaffOld . '<br />';
            //
            //
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
            //
            //
            // CURRENT / NEW FIRM DETAILS FOR HISTORY @PRIYANKA-27NOV2021
            parse_str(getTableValues("SELECT firm_name AS strFrmNameCurrent FROM firm WHERE firm_own_id = '$_SESSION[sessionOwnerId]' AND firm_id = '$selectedFirm'"));
            // 
            // 
            // PREVIOUS TRANS HISTORY @PRIYANKA-27NOV2021
            $strTransHistPrev = $sttr_stock_trans_history;
            //
            // PREVIOUS TRANS DATE HISTORY @PRIYANKA-27NOV2021
            $strTransHistDatePrev = $sttr_trans_date;
            //
            // PREVIOUS TRANS FIRM NAME FOR HISTORY @PRIYANKA-27NOV2021
            $strFrmNamePrev = $firm_name;
            //
            //
            if ($selectedFirm == '' || $selectedFirm == NULL) {
                if ($sttr_firm_id != '' && $sttr_firm_id != NULL) {
                    //
                    //$selectedFirm = $sttr_firm_id;
                    //
                    if ($strFrmNameCurrent == '' || $strFrmNameCurrent == NULL) {
                        $strFrmNameCurrent = $strFrmNamePrev;
                    }
                }
            }
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
            //
            //
            //echo '$productCounterOld == ' . $productCounterOld . '<br />';
            //echo '$productCounter == ' . $productCounter . '<br /><br />';
            //echo '$productTransferDetailsStr == ' . $productTransferDetailsStr . '<br />';
            //
            //
            if ($productCounter != 'NotSelected' && $productCounter != '' && $productCounter != NULL) {
                //
                //
                //echo '$productCounterOld @== ' . $productCounterOld . '<br />'; 
                //echo '$productCounter @== ' . $productCounter . '<br />'; 
                //
                //
                if ($productCounterOld != $productCounter) {
                    //
                    if ($productCounterOld != '' && $productCounterOld != NULL) {
                        //
                        // FOR NEW TRANS HISTORY @PRIYANKA-27NOV2021
                        $strTransCounterHistory = $sttr_stock_trans_counter_history . '#' . $productCounterOld;
                        //
                    } else if ($sttr_stock_trans_counter_history == '' || $sttr_stock_trans_counter_history == NULL) {
                        //
                        if ($productCounter != 'NotSelected' && $productCounter != '' && $productCounter != NULL) {
                            //
                            // FOR NEW TRANS HISTORY @PRIYANKA-27NOV2021
                            $strTransCounterHistory = $sttr_stock_trans_counter_history . '#' . $productCounter;
                            //
                        } else {
                            //
                            // FOR NEW TRANS HISTORY @PRIYANKA-27NOV2021
                            //$strTransCounterHistory = $sttr_stock_trans_counter_history . '#' . $productCounter;
                            //   
                        }
                    }
                }
                //
                //
                if ($selectedStaff != 'NotSelected' && $selectedStaff != '' && $selectedStaff != NULL) {
                    //
                    // UPDATE COUNTER STR @AUTHOR:PRIYANKA-26NOV2021
                    $updCounterColumnValueStr = " sttr_counter_name = '$productCounter', ";
                    //
                } else {
                    //
                    if ($selectedFirm != $sttr_firm_id) {
                        //
                        // UPDATE COUNTER STR @AUTHOR:PRIYANKA-26NOV2021
                        $updCounterColumnValueStr = " sttr_counter_name = '$productCounter', ";
                        //
                    } else {
                        //
                        // UPDATE COUNTER STR @AUTHOR:PRIYANKA-26NOV2021
                        $updCounterColumnValueStr = " sttr_counter_name = '$productCounter' ";
                        //
                    }
                    //
                }
                //
                $updateQueryStr = 'YES';
                //
            }
            //
            //
            //echo '$updCounterColumnValueStr == ' . $updCounterColumnValueStr . '<br />';
            //echo '$strTransCounterHistory == ' . $strTransCounterHistory . '<br /><br />';            
            //
            //
            if ($selectedStaff != 'NotSelected' && $selectedStaff != '' && $selectedStaff != NULL) {
                //
                //
                if ($selectedStaffOld != $selectedStaff) {
                    //
                    if ($selectedStaffOld != '' && $selectedStaffOld != NULL) {
                        //
                        // FOR NEW TRANS STAFF HISTORY @PRIYANKA-27NOV2021
                        $strTransStaffHistory = $sttr_stock_trans_staff_history . '#' . $selectedStaffOld;
                        //
                    } else if ($sttr_stock_trans_staff_history == '' || $sttr_stock_trans_staff_history == NULL) {
                        //
                        if ($selectedStaff != 'NotSelected' && $selectedStaff != '' && $selectedStaff != NULL) {
                            //
                            // FOR NEW TRANS STAFF HISTORY @PRIYANKA-27NOV2021
                            $strTransStaffHistory = $sttr_stock_trans_staff_history . '#' . $selectedStaff;
                            //
                        } else {
                            //
                            // FOR NEW TRANS STAFF HISTORY @PRIYANKA-27NOV2021
                            //$strTransStaffHistory = $sttr_stock_trans_staff_history . '#' . $selectedStaff;
                            //   
                        }
                    }
                }
                //
                //
                if ($selectedFirm != $sttr_firm_id) {
                    //
                    // UPDATE STAFF STR @AUTHOR:PRIYANKA-26NOV2021
                    $updStaffColumnValueStr = " sttr_staff_id = '$selectedStaff', ";
                    //
                } else {
                    //
                    // UPDATE STAFF STR @AUTHOR:PRIYANKA-26NOV2021
                    $updStaffColumnValueStr = " sttr_staff_id = '$selectedStaff' ";
                    //
                }
                //
                $updateQueryStr = 'YES';
                //
            }
            //
            //
            //echo '$updStaffColumnValueStr == ' . $updStaffColumnValueStr . '<br />';
            //echo '$updateQueryStr == ' . $updateQueryStr . '<br />';
            //
            //
            //
            if ($updateQueryStr == 'YES') {
                //
                //
                if ($strTransCounterHistory != '' && $strTransCounterHistory != NULL) {
                    //
                    if ($strTransStaffHistory != '' && $strTransStaffHistory != NULL) {
                        //
                        // FOR NEW TRANS COUNTER HISTORY UPDATE STR @PRIYANKA-27NOV2021
                        $productTransCounterHistoryStr = ", sttr_stock_trans_counter_history = '$strTransCounterHistory', ";
                        //
                    } else {
                        //
                        // FOR NEW TRANS COUNTER HISTORY UPDATE STR @PRIYANKA-27NOV2021
                        $productTransCounterHistoryStr = ", sttr_stock_trans_counter_history = '$strTransCounterHistory' ";
                        //
                    }
                    //
                }
                //
                //
                //echo '$productTransCounterHistoryStr == ' . $productTransCounterHistoryStr . '<br />';
                //
                //
                if ($strTransStaffHistory != '' && $strTransStaffHistory != NULL) {
                    //
                    if ($strTransCounterHistory != '' && $strTransCounterHistory != NULL) {
                        //
                        // FOR NEW TRANS STAFF HISTORY UPDATE STR @PRIYANKA-27NOV2021
                        $productTransStaffHistoryStr = "sttr_stock_trans_staff_history = '$strTransStaffHistory' ";
                        //
                    } else {
                        //
                        // FOR NEW TRANS STAFF HISTORY UPDATE STR @PRIYANKA-27NOV2021
                        $productTransStaffHistoryStr = ", sttr_stock_trans_staff_history = '$strTransStaffHistory' ";
                        //
                    }
                }
                //
                //
                $updStatusColumnValueStr = ", sttr_stock_transfer_status = 'COMPLETED' ";
                //
                //
                // STOCK TRANSFER UPDATE QUERY @AUTHOR:PRIYANKA-26NOV2021
                // Added Code in where condition @Author:PRIYANKA-05AUG2022
                $updateQuery = " UPDATE stock_transaction SET "
                        . " $updCounterColumnValueStr $updStaffColumnValueStr "
                        . " $productTransferDetailsStr $updStatusColumnValueStr "
                        . " $productTransDateStr "
                        . " $productTransCounterHistoryStr $productTransStaffHistoryStr "
                        . " $conditionForApprovalPendingStr "
                        . " WHERE sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP') "
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
                        . " $updVoucherColumnValueStr "
                        . " WHERE sttr_transaction_type IN ('EXISTING', 'PURONCASH', 'TAG', 'PURBYSUPP') "
                        . " AND sttr_indicator IN ('stock', 'crystal', 'imitation', 'AddInvoice') "
                        . " AND (sttr_stock_transfer_lot_status IS NULL OR sttr_stock_transfer_lot_status = '') "
                        . " $conditionStr ";
                //
                //echo '$updateVouchrQuery == ' . $updateVouchrQuery . '<br />';
                //
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
    </div>
    <?php
    //
    //
    // Start Code To GET Firm Details @AUTHOR:PRIYANKA-26NOV2021
    //if (isset($_GET['selFirmId'])) {
    //    $selFirmId = $_GET['selFirmId'];
    //} else {
    //    //if not selected assign session firm @AUTHOR:PRIYANKA-26NOV2021
    //    $selFirmId = $_SESSION['setFirmSession'];
    //}
    //
    //
    //print_r($_REQUEST) . '<br />';
    //echo 'firmId == ' . $_REQUEST['firmId'] . '<br />';
    //echo 'strFrmId == ' . $strFrmId . '<br />';
    //echo 'selFirmId == ' . $selFirmId . '<br />';
    //
    //
    // FIRM STR FOR VOUCHER NUMBER @AUTHOR:PRIYANKA-29JULY2022
    if ($selFirmId != '' && $selFirmId != NULL) {
        $firmStr = " AND sttr_firm_id = '$selFirmId' ";
    }
    //
    if ($_REQUEST['selectedFirm'] != '' && $_REQUEST['selectedFirm'] != NULL) {
        $firmStr = " AND sttr_firm_id = '$_REQUEST[selectedFirm]' ";
    }
    //
    //echo '$firmStr == ' . $firmStr . '<br />';
    //
    // GET PRE VOUCHER NUMBER @AUTHOR:PRIYANKA-29JULY2022
//    parse_str(getTableValues("SELECT sttr_pre_voucher_no AS sttrPreVoucherNo FROM stock_transaction "
//                    . "WHERE sttr_owner_id = '$sessionOwnerId' $firmStr "
//                    . "AND sttr_stock_transfer_lot_status = 'COMPLETED' "
//                    . "ORDER BY sttr_id desc LIMIT 0,1"));
    //
    //echo "SELECT sttr_pre_voucher_no AS sttrPreVoucherNo FROM stock_transaction "
    //   . "WHERE sttr_owner_id = '$sessionOwnerId' $firmStr "
    //   . "AND sttr_stock_transfer_lot_status = 'COMPLETED' "
    //   . "ORDER BY sttr_id desc LIMIT 0,1" . '<br />';
    //
    //echo '$sttrPreVoucherNo == ' . $sttrPreVoucherNo . '<br />';
    //
//    if ($sttrPreVoucherNo == '' || $sttrPreVoucherNo == NULL) {
//        //
//        if ($_REQUEST['selectedFirm'] != '' && $_REQUEST['selectedFirm'] != NULL) {
//            $sttrPreVoucherNo = 'VO' . $_REQUEST['selectedFirm'];
//        } else {
//            if ($selFirmId != '' && $selFirmId != NULL) {
//                $sttrPreVoucherNo = 'VO' . $selFirmId;
//            } else {
//                $sttrPreVoucherNo = 'VO';
//            }
//        }
//        //
//    }
    //
    //echo '$sttrPreVoucherNo == ' . $sttrPreVoucherNo . '<br />';
    //
    // GET POST VOUCHER NUMBER @AUTHOR:PRIYANKA-29JULY2022
    parse_str(getTableValues("SELECT MAX(CAST(sttr_voucher_no AS SIGNED)) as sttrVoucherNo "
                    . "FROM stock_transaction "
                    . "WHERE sttr_owner_id = '$sessionOwnerId' $firmStr "
                    . "AND sttr_pre_voucher_no = '$sttrPreVoucherNo' "
                    . "AND sttr_stock_transfer_lot_status = 'COMPLETED' "
                    . "AND sttr_status NOT IN ('DELETED') "));
    //
    //
    //echo '$sttrPreVoucherNo == ' . $sttrPreVoucherNo . '<br />';
    //echo '$sttrVoucherNo == ' . $sttrVoucherNo . '<br />';
    //
    //
    if ($sttrVoucherNo == '' || $sttrVoucherNo == NULL) {
        //
        $sttrVoucherNo = 1;
        //
    } else {
        //
        if ($sttrVoucherNo != '' && $sttrVoucherNo != NULL) {
            $sttrVoucherNo = $sttrVoucherNo + 1;
        }
        //
    }
    //
    //echo '$sttrPreVoucherNo == ' . $sttrPreVoucherNo . '<br />';
    //echo '$sttrVoucherNo == ' . $sttrVoucherNo . '<br />';
    //
    ?>
<!--<table align="left" border="0" cellspacing="0" cellpadding="2" style="margin-top: 10px;" width="100%">
        <tr>
            <td valign="middle" style="width: 15%;" align="right">
                <div>
                    <span style="font-size: 14px; font-weight: bold; margin-right: 34px;">
                        VOUCHER NUMBER : &nbsp;&nbsp;
                    </span>
                </div>
            </td>
            <td valign="middle" style="width: 15%;" align="left">
                <input <?php //echo $staffAccessStr;     ?> 
                    id="sttr_pre_voucher_no" name="sttr_pre_voucher_no" 
                    type="text" placeholder="PRE VOUCHER NUMBER" 
                    value="<?php //echo $sttrPreVoucherNo;     ?>" 
                    onkeydown="javascript: if (event.keyCode == 13) {
                                                document.getElementById('sttr_voucher_no').focus();
                                                return false;
                                            } else if (event.keyCode == 8 && this.value == '') {
                                                document.getElementById('sttr_pre_voucher_no').focus();
                                                return false;
                                            }"
                    onblur="if (this.value == '')
                                this.value = '<?php //echo $sttrPreVoucherNo;     ?>';"
                    spellcheck="false" class="form-control text-center form-control-font13" 
                    size="3" maxlength="10" 
                    title="PRE VOUCHER NUMBER"/>
            </td>
            <td valign="middle" class="padLeft3" style="width: 15%;" align="left">
                <input <?php //echo $staffAccessStr;     ?> 
                    id="sttr_voucher_no" name="sttr_voucher_no" 
                    type="text" placeholder="POST VOUCHER NUMBER" 
                    value="<?php //echo $sttrVoucherNo;     ?>" 
                    onkeydown="javascript: if (event.keyCode == 13) {
                                                document.getElementById('sttr_voucher_no').focus();
                                                return false;
                                            } else if (event.keyCode == 8 && this.value == '') {
                                                document.getElementById('sttr_pre_voucher_no').focus();
                                                return false;
                                            }"
                    onblur="if (this.value == '')
                                this.value = '<?php //echo $sttrVoucherNo;     ?>';"
                    onkeypress="javascript:return valKeyPressedForNumber(event);"
                    spellcheck="false" class="form-control text-center form-control-font13" 
                    size="3" maxlength="30" 
                    title="POST VOUCHER NUMBER"/>
            </td>
            <td valign="middle" style="width: 20%;" align="right">
                <div></div>
            </td>
        </tr>
        <tr>
            <td colspan="8" style="padding-top: 12px !important;">
                <div class="hrGrey"></div>
            </td>
        </tr>
    </table>-->
    <table align="left" border="0" cellspacing="0" cellpadding="2"  width="100%">
        <tr>
            <td valign="middle" align="center" width="20%">
                <div>
                    <span style="font-size: 14px;font-weight: bold;">
                        SELECT TRANSFER OPTIONS : 
                    </span>
                </div>
            </td>
            <td valign="middle" align="center" width="20%">
                <?php
                //
                include $_SESSION['documentRootIncludePhp'] . 'omStockTransferByCounter.php';
                //
                ?>
            </td>
            <td valign="middle" align="center" width="20%">
                <?php
                //
                include $_SESSION['documentRootIncludePhp'] . 'omStockManagementByCounterStaff.php';
                //
                ?>
            </td>
            <td valign="middle" align="center" width="20%">
                <?php
                //
                include $_SESSION['documentRootIncludePhp'] . 'omStockManagementByCounterFirm.php';
                //
                ?>
            </td>
            <!-- START CODE TO ADD FOR VOUCHER NUMBER @AUTHOR:PRIYANKA-29JULY2022 -->
            <td valign="middle" align="center" width="20%">

                <table>
                    <tr>
                        <td valign="middle">
                            <div>
                                <span style="font-size: 14px; font-weight: bold;">
                                    VOUCHER NUMBER : &nbsp;&nbsp;
                                </span>
                            </div>
                        </td>
                        <!--START CODE TO GET VOUCHER NO AND INCREMENT OF VOUCHER NO @AUTHOR:DNYANESHWARI 21AUG2024-->
                        <?php
                        //
                        if ($selectedFirm == '' || $selectedFirm == NULL) {
                            $selectedFirm = $_SESSION[setFirmSession];
                        }
                        //
                        $getTransferedStock = "SELECT sttr_pre_voucher_no,sttr_voucher_no FROM stock_transaction where sttr_stock_transfer_success_status='transferPending' and sttr_pre_voucher_no != '' and sttr_firm_id='$selectedFirm' order by sttr_voucher_no desc limit 0,1";
                        //
                        $resTransferedStock = mysqli_query($conn, $getTransferedStock);
                        $noOfTransferPendingStock = mysqli_num_rows($resTransferedStock);
                        $rowTransferedStock = mysqli_fetch_array($resTransferedStock);
                        $sttr_pre_voucher_no = $rowTransferedStock['sttr_pre_voucher_no'];
                        $sttr_voucher_no = $rowTransferedStock['sttr_voucher_no'];
                        //
                        $preVoucherNo = $sttr_pre_voucher_no;
                        $voucherNo = $sttr_voucher_no;
                        //
                        if ($noOfTransferPendingStock <= 0) {
                            //
                            $voucherNumber = explode('*', getStockTransferVoucherNum($selectedFirm, $preVoucher));
                            //
                            $preVoucherNo = $voucherNumber[0];
                            $voucherNo = $voucherNumber[1];
                        }
                        ?> 
                        <!--END CODE TO GET VOUCHER NO AND INCREMENT OF VOUCHER NO @AUTHOR:DNYANESHWARI 21AUG2024-->
                        <td valign="middle">
                            <input <?php echo $staffAccessStr; ?> 
                                id="sttr_pre_voucher_no" name="sttr_pre_voucher_no" 
                                type="text" placeholder="PRE VOUCHER NUMBER" 
                                value="<?php echo $preVoucherNo; ?>" 
                                onkeydown="javascript:
                                                if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105)) {
                                            event.preventDefault(); // Prevent number keys (0-9)
                                        } else if (event.keyCode == 13) {
                                            document.getElementById('sttr_voucher_no').focus();
                                            return false;
                                        } else if (event.keyCode == 8 && this.value == '') {
                                            document.getElementById('sttr_pre_voucher_no').focus();
                                            return false;
                                        }"
                                onchange="getStockTransferSelectedOptionsFunc(document.getElementById('productCounter').value, document.getElementById('selectedStaff').value,
                                                document.getElementById('FirmName').value, '<?php echo $stockTransferNavPanelName; ?>', this.value);"
                                onblur="if (this.value == '')
                                            this.value = '<?php echo $sttrPreVoucherNo; ?>';"
                                spellcheck="false" class="form-control text-center form-control-font13" 
                                size="3" maxlength="3"
                                title="PRE VOUCHER NUMBER"/>
                        </td>
                        <td valign="middle" class="padLeft3">
                            <input <?php echo $staffAccessStr; ?> 
                                id="sttr_voucher_no" name="sttr_voucher_no" 
                                type="text" placeholder="POST VOUCHER NUMBER" 
                                value="<?php echo $voucherNo; ?>" 
                                onkeydown="javascript: if (event.keyCode == 13) {
                                            document.getElementById('sttr_voucher_no').focus();
                                            return false;
                                        } else if (event.keyCode == 8 && this.value == '') {
                                            document.getElementById('sttr_pre_voucher_no').focus();
                                            return false;
                                        }"
                                onblur="if (this.value == '')
                                            this.value = '<?php echo $sttrVoucherNo; ?>';"
                                onkeypress="javascript:return valKeyPressedForNumber(event);"
                                spellcheck="false" class="form-control text-center form-control-font13" 
                                size="3" maxlength="30"
                                title="POST VOUCHER NUMBER"/>
                        </td>
                    </tr>
                </table>
            </td>

            <!-- END CODE TO ADD FOR VOUCHER NUMBER @AUTHOR:PRIYANKA-29JULY2022 -->
        </tr>
    </table>            
    <br/>
    <table width="90%" align="center" border="0" cellspacing="0" cellpadding="2" 
           style="margin-top: 30px; background-color: #e6f7ff;border: 1px dashed #36b0ea;" >
        <tr>
            <td>
                <table align="center" border="0" cellspacing="0" cellpadding="2" width="100%" style="margin-top: 6px;margin-bottom: 6px;">
                    <tr>

                        <td valign="middle" align="center" width="50%"  style="padding-left: 52px;">      
                            <input type="hidden" id="multiBarcodeScanCounter" name="multiBarcodeScanCounter" value='1' />
                            <input type="hidden" id="stockTransferMultiBarcodeGlobalCounter" name="stockTransferMultiBarcodeGlobalCounter" value='0' />
                            <textarea id="multiBarcodeProductScanCounter" name="multiBarcodeProductScanCounter" 
                                      spellcheck="false" cols="30" placeholder="Enter Multi Barcode Tags" 
                                      onkeyup="var code = (event.keyCode ? event.keyCode : event.which);
                                              if (code == 13) {
                                                  callMultiBarcodeCounter[stockTransferMultiBarcodeGlobalCounter] = false;
                                                  stockManagementByCounterMultiBarcode(document.getElementById('stockTransferMultiBarcodeGlobalCounter').value, this.value, document.getElementById('productCounter').value);
                                                  this.value = '';
                                              }"                                      
                                      class="textarea" style="width:100%; font-size: 18px; height:auto; text-align: left;" value="">
                            </textarea>                            
                        </td>

                        <td align="center" valign="middle" width="40%">   
                            <div style="margin-left:8px; margin-top: 5px; width:100%;">
                                <?php
                                //
                                //
                                //echo '$indicator == ' . $indicator . '<br />';
                                //echo '$userId == ' . $userId . '<br />';
                                //echo '$panelName == ' . $panelName . '<br />';
                                //echo '$transType == ' . $transType . '<br />';
                                //
                                //
                                //*************************************************************************************
                                //* Start Input Area to get firms details
                                //*************************************************************************************
                                //
                                // // This is the main division class for input filed
                                // 
                                // Input Box Type and Ids
                                $inputId = 'searchProduct';
                                $inputName = 'searchProduct';
                                $inputFieldColumnName = 'searchProduct';
                                $mainInputFieldId = 'searchProduct';
                                //
                                $inputFieldNextId = "goButton";
                                $inputFieldPrevId = 'searchProduct';
                                //
                                $inputType = 'text';
                                // This is the main class for input flied
                                $inputFieldClass = 'textLabel16CalibriNormalGreyMiddle form-control font-dark';
                                //
                                //if ($inputStyle === '' || $inputStyle === NULL) {
                                $inputStyle = 'width: 500px; height:40px; text-align: center;border-radius:5px!important;';

                                //if ($inputTitle === '' || $inputTitle === NULL) {
                                //
                                $inputTitle = 'SEARCH PRODUCT ID / BARCODE / RFID';
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                // 
                                // Place Holder inside input box
                                //
                                $selectDropdownClass = 'googleSuggestionDivClass';
                                //
                                //if ($inputPlaceHolder === '' || $inputPlaceHolder === NULL) {
                                //
                                $inputPlaceHolder = 'SEARCH PRODUCT ID';
                                //
                                // Place Holder in span outside input box
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                //
                                //$selectDropdownDivStyle = "margin-left: 62%;";
                                //        
                                //$isAlphaNumWithSomeSpecialCharSpace = 'Y';
                                //
                                //
                                // Event Options
                                //
                                // On Change Function
                                $inputGoogleSuggDivId = $inputFieldColumnName . '_google_div';
                                $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
//                                $inputOnBlurFun = ' googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '");'
//                                                . ' if (document.getElementById("searchProduct").value != "" && document.getElementById("searchProduct").value != null) {'
//                                                . ' searchProductDetailsByIdBarcodeRFIDForStockManagementByCounter(document.getElementById("searchProduct").value, "' . $autoEntry . '", "' . $userId . '", "' . $transType . '", "' . $indicator . '", document.getElementById("productCounter").value, document.getElementById("selectedStaff").value, document.getElementById("FirmName").value, document.getElementById("sttr_pre_voucher_no").value, document.getElementById("sttr_voucher_no").value);
//                                                    showProductDetailsDivForStockManagementByCounter(document.getElementById("searchProductPreId").value, document.getElementById("searchProductPostId").value, "' . $userId . '",  "' . $panelName . '",  "' . $transType . '",  "' . $indicator . '", document.getElementById("productCounter").value, document.getElementById("selectedStaff").value, document.getElementById("FirmName").value, document.getElementById("sttr_pre_voucher_no").value, document.getElementById("sttr_voucher_no").value);
//                                                    return false; 
//                                                   } ';
                                //    
                                $inputKeyUpFun = " var googleWhereCondColumns = 'AND sttr_transaction_type NOT IN (\'' + 'sell\',\'' +  'newOrder\',\'' + 'ESTIMATESELL' + '\') AND sttr_status!=\'' + 'SOLDOUT' + '\' AND sttr_item_code!=\'' + '' + '\' AND sttr_indicator IN ($indicator) AND sttr_stock_type=\'' + 'retail' + '\' AND sttr_firm_id IN ($strFrmId) AND (sttr_stock_transfer_approval_status!=\'' + 'StockTransferApprovalPendingStock' + '\' or sttr_stock_transfer_approval_status is NULL)';"
                                        . " googleSuggestionDropdown('stock_transaction', 'sttr_item_code', this.value, googleWhereCondColumns, '$inputId', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId')";
                                //  
                                //
                                $inputKeyDownFun = "";
                                //
                                $inputOnChange = "";
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                // 
                                //
                                //* *************************************************************************************
                                //* End Input Area 
                                //***************************************************************************************
                                //
                                //
                                include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                                //
                                //
                                ?>
                                &nbsp;
                                <input id="searchProductPreId" name="searchProductPreId" type="hidden"/>
                                <input id="searchProductPostId" name="searchProductPostId" type="hidden"/>
                                <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />
                                <!--<img src="<?php echo $documentRoot; ?>/images/sell_Purchase16.png" width="0.01px" 
                                     onload="document.getElementById('searchProduct').focus();"/>-->
                                <img src="<?php echo $documentRoot; ?>/images/sell_Purchase16.png" width="0.01px" 
                                     onload="document.getElementById('multiBarcodeProductScanCounter').focus();"/>
                            </div>
                        </td>

                        <td align="" valign="middle"> 
                            <div>
                                <?php
                                //
                                $inputId = "goButton";
                                $inputIdButton = "goButton";
                                $inputNameButton = 'goButton';
                                $inputFieldValue = 'GO';
                                //
                                $inputFieldNextId = "goButton";
                                $inputFieldPrevId = 'goButton';
                                //
                                $inputType = 'button';
                                //
                                $inputTitle = '';
                                //
                                //
                                // This is the main class for input flied
                                $inputFieldClass = 'btn ' . $om_btn_style;
                                $inputStyle = "margin-top:-8px;margin-left:-10px;width: 50px;height: 40px;font-size: 16px;border-radius: 0 5px 5px 0 !important";
                                $inputLabel = 'GO'; // Display Label below the text box
                                //
                                //
                                // This class is for Pencil Icon                                                           
                                $inputIconClass = '';
                                $inputPlaceHolder = '';
                                $spanPlaceHolderClass = '';
                                $spanPlaceHolder = '';
                                $inputOnChange = "";
                                //
                                $inputOnClickFun = 'javascript:
                                                   stockTransManagementByCsvFile("singleStockTransfer", "", "", document.getElementById("searchProduct").value, document.getElementById("FirmName").value, document.getElementById("sttr_pre_voucher_no").value, document.getElementById("sttr_voucher_no").value);
                                                   return false;';
                                //
                                $inputKeyUpFun = '';
                                $inputDropDownCls = '';               // This is the main division class for drop down 
                                $inputselDropDownCls = '';            // This is class for selection in drop down
                                $inputMainClassButton = '';           // This is the main division for Button
                                include $_SESSION['documentRootIncludePhp'] . 'formInputField/omInputField.php';
                                //
                                ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table align="left" border="0" cellspacing="0" cellpadding="0" style="margin-top:5px;" width="100%">
        <tr>
            <td align="center" valign="middle" style="width: 35%;">   
                <div style="margin-left:160px; margin-top: 5px; width: 62%; font-size: 14px; color: #007bff;">
                    <span style="font-weight: bold;">
                        <?php
                        //
                        echo 'PREVIOUS COUNTER -> NEW COUNTER';
                        //
                        ?>
                    </span>  
                </div>
            </td>
            <td align="center" valign="middle" style="width: 35%;">   
                <div style="margin-left:-100px; margin-top: 5px; width: 50%; font-size: 14px; color: #4cae4c;">
                    <span style="font-weight: bold;">
                        <?php
                        //
                        echo 'PREVIOUS STAFF -> NEW STAFF';
                        //
                        ?>
                    </span>
                </div>
            </td>
            <td align="center" valign="middle" style="width: 35%;">   
                <div style="margin-left:-380px; margin-top: 5px; width: 60%; font-size: 14px; color: #D76B00;">
                    <span style="font-weight: bold;">
                        <?php
                        //
                        echo 'PREVIOUS FIRM -> NEW FIRM';
                        //
                        ?>
                    </span>    
                </div>
            </td>
        </tr>
        <tr>

            <td align="center" valign="middle" style="width: 35%;">   
                <div style="margin-left:160px; margin-top: 5px; width: 62%; font-size: 14px; color: #007bff;">
                    <?php
                    //
                    //
                    //echo '$productCounterOld =@= ' . $productCounterOld . '<br />';
                    //echo '$productCounter =@= ' . $productCounter . '<br />';
                    //
                    //
                    // ADDED CONDITION FOR SAME FIRM NAME @SIMRAM:11SEPT2023
                    if ($productCounterOld == $productCounter && $productCounterOld != '' && $productCounter != '') {
                        ?>
                        <span style="margin-left: 32px; font-size: 25px; color:#ff3333; font-weight: bold;">
                            <?php
                            //
                            //echo '$productCounter @==@ ' . $productCounter . '<br />';
                            //
                            echo $productCounterOld . '  -> ' . $productCounter;
                            //
                            ?>
                        </span>
                    <?php
                    } else if ($productCounterOld != '' && $productCounterOld != NULL &&
                            $productCounter != '' && $productCounter != NULL && $productCounter != 'NotSelected') {
                        ?>
                        <span style="margin-left: 32px; font-size: 15px;">
                            <?php
                            //
                            //echo '$productCounter @==@ ' . $productCounter . '<br />';
                            //
                            echo $productCounterOld . '  -> ' . $productCounter;
                            //
                            ?>
                        </span>
                        <?php } else { ?>
                        <span style="margin-left: 25px;">
                            <?php
                            //
                            if ($stockTransferHistoryDisplay == 'YES') {
                                //
                                if ($productCounter != 'NotSelected') {
                                    echo '  -> ' . $productCounter;
                                } else if ($productCounter == 'NotSelected') {
                                    echo ' -- ';
                                } else {
                                    echo ' -- ';
                                }
                                //
                            }
                            //
                            ?>
                        </span>
<?php } ?>  
                </div>
            </td>
            <td align="center" valign="middle" style="width: 35%;">   
                <div style="margin-left:-100px; margin-top: 5px; width: 50%; font-size: 14px; color: #4cae4c;">
                    <?php
                    //
                    // PREVIOUS STAFF NAME FOR HISTORY @PRIYANKA-01DEC2021
                    parse_str(getTableValues("SELECT user_fname AS selectedStaffNameOld FROM user "
                                    . "WHERE user_owner_id = '$_SESSION[sessionOwnerId]' AND user_id = '$selectedStaffOld'"));
                    //
                    // NEW STAFF NAME FOR HISTORY @PRIYANKA-01DEC2021
                    parse_str(getTableValues("SELECT user_fname AS selectedStaffName FROM user "
                                    . "WHERE user_owner_id = '$_SESSION[sessionOwnerId]' AND user_id = '$selectedStaff'"));
                    //
                    //
                    //echo '$selectedStaffNameOld == ' . $selectedStaffNameOld . '<br />';
                    //echo '$selectedStaffName == ' . $selectedStaffName . '<br />';
                    //
                    //ADDED CONDITION FOR SAME STAFF NAME @SIMRAN:11SEPT2023
                    if ($selectedStaffNameOld == $selectedStaffName && $selectedStaffNameOld != '' && $selectedStaffName != '') {
                        ?>
                        <span style="margin-left: 32px; font-size: 25px; color:#ff3333; font-weight: bold;">
                            <?php
                            //
                            echo $selectedStaffNameOld . '  -> ' . $selectedStaffName;
                            //
                            ?>
                        </span>
                        <?php
                    } else if ($selectedStaffNameOld != '' && $selectedStaffNameOld != NULL &&
                            $selectedStaffName != '' && $selectedStaffName != NULL) {
                        ?>                        
                        <span style="margin-left: 32px; font-size: 15px;">
                            <?php
                            //
                            if ($selectedStaffName != 'NotSelected') {
                                //
                                echo $selectedStaffNameOld . '  -> ' . $selectedStaffName;
                                //
                            } else {
                                //
                                echo ' -- ';
                                //    
                            }
                            //
                            ?>
                        </span>
                        <?php } else { ?>
                        <span style="margin-left: 25px;">
                            <?php
                            //
                            if ($stockTransferHistoryDisplay == 'YES') {
                                if ($selectedStaffName != '' && $selectedStaffName != NULL) {
                                    echo '  -> ' . $selectedStaffName;
                                } else {
                                    echo ' -- ';
                                }
                            }
                            //
                            ?>
                        </span>
                        <?php
                    }
//
                    ?> 
                </div>
            </td>
            <td align="center" valign="middle" style="width: 35%;">   
                <div style="margin-left:-380px; margin-top: 5px; width: 60%; font-size: 14px; color: #D76B00;">
                    <?php
                    //
                    // NEW FIRM NAME FOR HISTORY @PRIYANKA-01DEC2021
                    parse_str(getTableValues("SELECT firm_name AS selectedFirmName FROM firm "
                                    . "WHERE firm_own_id = '$_SESSION[sessionOwnerId]' AND firm_id = '$selectedFirm'"));
                    //
                    //
                    //echo '$strFrmNamePrev == ' . $strFrmNamePrev . '<br />';
                    //echo '$selectedFirmName == ' . $selectedFirmName . '<br />';
                    //
                    //ADDED CONDITION FOR SAME FIRM NAME @SIMRAM:11SEPT2023
                    if ($strFrmNamePrev == $selectedFirmName && $strFrmNamePrev != '' && $selectedFirmName != '') {
                        ?>
                        <span style="margin-left: 32px; font-size: 25px; color:#ff3333; font-weight: bold;">
                            <?php
                            //
                            echo $strFrmNamePrev . '  -> ' . $selectedFirmName;
                            //
                            ?>
                        </span>
                        <?php
                    } else if ($strFrmNamePrev != '' && $strFrmNamePrev != NULL &&
                            $selectedFirmName != '' && $selectedFirmName != NULL) {
                        ?>
                        <span style="margin-left: 32px; font-size: 15px;">
                            <?php
                            //
                            echo $strFrmNamePrev . '  -> ' . $selectedFirmName;
                            //
                            ?>
                        </span>
                        <?php } else { ?>
                        <span style="margin-left: 25px;">
                            <?php
                            //
                            if ($stockTransferHistoryDisplay == 'YES') {
                                echo ' -- ';
                            }
                            //
                            ?>
                        </span>
                        <?php
                    }
//
                    ?> 
                </div>
            </td>
        </tr>        

    </table>    
    <!--START CODE STOCK TRANSFER THROUGH CSV FILE @AUTHOR:DNYANESHWARI 21AUG2024-->
    <div id="transferstockthroughcsvfilemaindiv" style="display:none;">
        <table align="center" border="0" cellspacing="0" cellpadding="0" style="margin:5px auto 0;background-color: #e6f7ff;border: 1px dashed #36b0ea;border-bottom:0;" width="70%">
            <tr>
                <td colspan="3" class="paddingTop4 textLabel14CalibriBrownBold" align="center" style="padding-top:20px;padding-bottom:20px;">
                    <form name="fileUpload" id="fileUpload" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="selectedFirm" id="selectedFirm" value="" placeholder="selected firm">
                        <input type="hidden" name="preVoucherNo" id="preVoucherNo" value="" placeholder="pre voucher no">
                        <input type="hidden" name="postVoucherNo" id="postVoucherNo" value="" placeholder="post voucher no">
                        <table valign="top" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody><tr>
                                    <?php
                                    //print_r($_SESSION);
                                    ?>
                                    <td valign="top" align="right" colspan="2">
                                        <a style="cursor: pointer;" 
                                           href="<?php echo $documentRootBSlash; ?>/include/php/stock/sample_files/OM_TRANSFER_STOCK.csv ">Download Sample File</a>
                                    </td>
                                </tr>
                                <tr>                                      
                                    <td valign="middle" align="center">
                                        <input type="file" name="CVSFile" id="CVSFile" required="required">
                                    </td>
                                    <td valign="top" align="left">
                                        <!---Start to Changes button----->
                                        <div>
                                            <button type="button" id="button" name="" onclick="document.getElementById('selectedFirm').value = document.getElementById('FirmName').value;
                                                    document.getElementById('preVoucherNo').value = document.getElementById('sttr_pre_voucher_no').value;
                                                    document.getElementById('postVoucherNo').value = document.getElementById('sttr_voucher_no').value;
                                                    stockTransManagementByCsvFile();" value="Submit" class="btn om_btn_style" style="width:132px;height:32px;font-size: 14px;border: 1px solid #7ab0fe;border-radius: 5px !important;font-weight: 600;text-transform: uppercase;padding:5px 15px; ">
                                                <span>Transfer stock</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody></table>
                    </form>
                </td>
            </tr>
        </table> 
              <!--<span class="main_link_brown">VOUCHER NO: <?php // echo $preVoucherNo;  ?> | <?php // echo $voucherNo;  ?></span>-->
        <div id="transferstockdiv">
<?php include 'omtransferpendingstocktbl.php'; ?>
        </div>
    </div>
    <!--END CODE STOCK TRANSFER THROUGH CSV FILE @AUTHOR:DNYANESHWARI 21AUG2024-->

    <!--    <div id="stockManagementByCounterSubDiv" style="margin-top:2%;">
            <table width="100%" border="0">
                <tr>
    
                <input type="hidden" id="documentRootPath" name="documentRootPath" value="<?php echo $documentRootBSlash; ?>" />
                </tr>
            </table>
    <?php
    //ADD CONDITION FOR STAFF : AUTHOR @DARSHANA 21 MAR 2022
    // ADDED STAFF ACCESS FOR HIDE/SHOW TABLE OF STOCK TRANSFER PANEL @SIMRAN:04JAN2023
//        if ($staffId == '' || ($staffId && $array['stockTransferAccess'] == 'true')) {
//
//            //
//            include $_SESSION['documentRootIncludePhp'] . 'omStockManagementByCounterDatatable.php';
//            //
//        }
    // END TO STAFF ACCESS FOR HIDE/SHOW TABLE OF STOCK TRANSFER PANEL @SIMRAN:04JAN2023
    ?>  
    
            <table width="100%" border="0" align="center">
                <tr>
                    <td valign="middle" align="center" width="10%">
                        <div id="stockTransferVoucherUpdateButtDiv"> 
    <?php
    //
    //* ************************************************************************************************
    //* START CODE FOR STOCK TRANSFER VOUCHER SUBMIT BUTTON @PRIYANKA-25JULY2022
    //* ************************************************************************************************
    // 
    // // This is the main division class for input filed
    // 
    //
    // Input Box Type and Ids
//                        $inputType = 'submit';
//                        $inputIdButton = 'stockTransferVoucherUpdateButt';
//                        $inputNameButton = 'stockTransferVoucherUpdateButt';
//                        //
//                        //
//                        // This is the main class for input flied
//                        $inputFieldClass = 'btn btn1 btn1Hover';
//                        //
//                        $inputStyle = 'height:30px; width:130px; font-weight:bold; font-size:15px;'
//                                . 'padding-top:3px; margin-top:5px; margin-bottom:5px; border-radius: 5px !important;'
//                                . 'text-align:center;background-color:#BED8FD; color:#000080;';
//                        //
//                        $inputLabel = 'SUBMIT'; // Display Label 
//                        //
//                        //
//                        // This class is for Pencil Icon                                                           
//                        $inputIconClass = 'fa fa-inr';
//                        // 
//                        // Place Holder inside input box
//                        $inputPlaceHolder = 'SUBMIT';
//                        //
//                        // Place Holder in span outside input box
//                        $spanPlaceHolderClass = '';
//                        $spanPlaceHolder = '';
//                        // 
//                        // Event Options
//                        //
//                        // On Change Function
//                        $inputOnChange = "";
//                        $inputKeyUpFun = '';
//                        //
//                        //
//                        $inputOnClickFun = 'javascript:stockTransferVoucherFunc("stockTransferVoucherUpdate", document.getElementById("sttr_pre_voucher_no").value, document.getElementById("sttr_voucher_no").value, document.getElementById("productCounter").value, document.getElementById("selectedStaff").value, document.getElementById("FirmName").value);'
//                                . 'return false;';
//                        //
//                        $inputDropDownCls = '';               // This is the main division class for drop down 
//                        $inputselDropDownCls = '';            // This is class for selection in drop down
//                        $inputMainClassButton = '';           // This is the main division for Button
//                        // 
//                        //* **************************************************************************************
//                        //* END CODE FOR STOCK TRANSFER VOUCHER SUBMIT BUTTON @PRIYANKA-25JULY2022
//                        //* **************************************************************************************
//                        include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
    //
    //}
    ?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>-->

    <table width="100%">
        <tr>
            <td>
                <div class="hrGrey"></div>
            </td>
        </tr>
    </table>
    <?php
    //
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    // START CODE FOR STOCK TRANSFER HISTORY @AUTHOR:PRIYANKA-26NOV2021
    // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
    //
    if ($stockTransferHistoryDisplay == 'SHOW') {
        //
        $transCount = noOfRowsCheck('sttr_id', 'stock_transaction',
                "(sttr_stock_trans_history IS NOT NULL OR "
                . "sttr_stock_trans_counter_history IS NOT NULL OR "
                . "sttr_stock_trans_staff_history IS NOT NULL) "
                . "$conditionStr ");
        //
    }
    //
    //echo '$conditionStr == ' . $conditionStr . '<br />';
    //echo '$transCount == ' . $transCount . '<br />';
    //
    if ($transCount > 0) {
        ?>
        <table align="center">
            <tr align="center">
                <td class="ff_tnr fs_18 brown" align="center" style="font-weight: bold;">
                    STOCK TRANSFER HISTORY
                </td>
            </tr>
        </table>
        <br>
        <table align="center" border="1 px solid black" cellspacing="0" cellpadding="0" width="60%">
            <tr>
                <th width="15%" class="ff_calibri fs_14 brown fw_b" style="background-color: #F9C99A"><center>Date & Time</center></th>
            <th width="45%" class="ff_calibri fs_14 brown fw_b" style="background-color: #F9C99A"><center>Comments</center></th>
            </tr>
            <?php
            //
            $qSelAllStTransHis = "SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                    . "AND (sttr_stock_trans_history IS NOT NULL "
                    . "OR sttr_stock_trans_counter_history IS NOT NULL "
                    . "OR sttr_stock_trans_staff_history IS NOT NULL) $conditionStr ";
            //
            $resAllStTransHis = mysqli_query($conn, $qSelAllStTransHis);
            //
            //echo '$qSelAllStTransHis == ' . $qSelAllStTransHis . '<br />';
            //
            $rowAllStTransHis = mysqli_fetch_array($resAllStTransHis, MYSQLI_ASSOC);
            //
            //
            $History = $rowAllStTransHis['sttr_stock_trans_history'];
            $CounterHistory = $rowAllStTransHis['sttr_stock_trans_counter_history'];
            $StaffHistory = $rowAllStTransHis['sttr_stock_trans_staff_history'];
            //
            $ItemCode = $rowAllStTransHis['sttr_item_code'];
            //
            $strTransHisTime = $rowAllStTransHis['sttr_trans_date'];
            //
            $stCurrentFirm = $rowAllStTransHis['sttr_firm_id'];
            //
            $counterNameNew = $rowAllStTransHis['sttr_counter_name'];
            //
            $staffIdNew = $rowAllStTransHis['sttr_staff_id'];
            //
            parse_str(getTableValues("SELECT firm_name FROM firm WHERE firm_id = '$stCurrentFirm'"));
            //
            parse_str(getTableValues("SELECT user_fname AS staffNameNew FROM user WHERE user_id = '$staffIdNew'"));
            //
            //
            //
            if ($History != '' && $History != NULL) {
                //
                $StockFirmHistory = explode('#', $History);
                //
                $prevFirm = end($StockFirmHistory);
                //
                $stTransFirmHist = array_reverse($StockFirmHistory);
                //
            }
            //
            //
            //echo '$staffNameNew == ' . $staffNameNew . '<br />';
            //echo '$CounterHistory == ' . $CounterHistory . '<br />';
            //echo '$StaffHistory == ' . $StaffHistory . '<br />';
            //
            //
            if ($CounterHistory != '' && $CounterHistory != NULL) {
                //
                $StockCounterHistory = explode('#', $CounterHistory);
                //
                $prevCounter = end($StockCounterHistory);
                //
                $stTransCounterHist = array_reverse($StockCounterHistory);
                //
            }
            //
            //echo '$prevCounter == ' . $prevCounter . '<br />';
            //echo '$stTransCounterHist == ' . $stTransCounterHist . '<br />';
            //
            if ($StaffHistory != '' && $StaffHistory != NULL) {
                //
                $StockStaffHistory = explode('#', $StaffHistory);
                //
                //$prevStaff = end($StockStaffHistory);
                //
                //parse_str(getTableValues("SELECT user_fname AS prevStaffName FROM user WHERE user_id = '$prevStaff'"));
                //
                //$stTransStaffHist = array_reverse($StockStaffHistory);
                //
            }
            //
            $stTransHist = explode('#', $strTransHisTime);
            //
            //print_r($StockFirmHistory);
            //
            $prevdate = end($stTransHist);
            //
            $stTransDateHist = array_reverse($stTransHist);
            //
            ?>
            <tr>
                <td align="center" class="ff_calibri fs_14">
    <?php echo $prevdate; ?>
                </td>
                <td align="left" class="ff_calibri fs_14" style="padding-left: 5px;">
                    <?php
                    //
                    if ($prevFirm != '') {
                        echo 'Product Code : ' . $ItemCode . '&nbsp;&nbsp;' . '( Previous Firm : ' . $prevFirm . '&nbsp;&nbsp;' . 'and Current Firm : ' . $firm_name . ' )' . '<br />';
                    }
                    //
                    if ($prevCounter != '') {
                        echo 'Product Code : ' . $ItemCode . '&nbsp;&nbsp;' . '( Previous Counter : ' . $prevCounter . '&nbsp;&nbsp;' . 'and Current Counter : ' . $counterNameNew . ' )' . '<br />';
                    }
                    //
                    if ($prevStaffName != '') {
                        echo 'Product Code : ' . $ItemCode . '&nbsp;&nbsp;' . '( Previous Staff : ' . $prevStaffName . '&nbsp;&nbsp;' . 'and Current Staff : ' . $staffNameNew . ' )';
                    }
                    //
                    ?>
                </td>
            </tr>
            <?php
            //
            $firmHistarrayLength = count($stTransFirmHist);
            //
            $counterHistarrayLength = count($stTransCounterHist);
            //
            $staffHistarrayLength = count($stTransStaffHist);
            //
            $dateHistarrayLength = count($stTransDateHist);
            //
            //echo $firmHistarrayLength;
            //
            $firmHist = 1;
            $dateHist = 1;
            $counterHist = 1;
            $counterDateHist = 1;
            $staffHist = 1;
            $staffDateHist = 1;
            //
            //print_r($stTransFirmHist);
            //print_r($stTransDateHist);
            //
            ?>
            <tr>
                    <?php while ($firmHist < ($firmHistarrayLength - 1) && $dateHist < ($dateHistarrayLength - 1)) { ?>
                    <td align="center" class="ff_calibri fs_14">
        <?php echo $stTransDateHist[$dateHist]; ?>
                    </td>
                    <td align="left" class="ff_calibri fs_14" style="padding-left: 5px;">
        <?php echo 'Product Code : ' . $newProdCode . '&nbsp;&nbsp;' . '( Previous Firm : ' . $stTransFirmHist[$firmHist] . '&nbsp;&nbsp;' . 'and New Firm : ' . $stTransFirmHist[$firmHist - 1] . ' )'; ?>
                    </td>
                </tr>
                <?php
                $firmHist++;
                $dateHist++;
            }
            ?>
            <tr>
                    <?php while ($counterHist < ($counterHistarrayLength - 1) && $counterDateHist < ($dateHistarrayLength - 1)) { ?>
                    <td align="center" class="ff_calibri fs_14">
        <?php echo $stTransDateHist[$counterDateHist]; ?>
                    </td>
                    <td align="left" class="ff_calibri fs_14" style="padding-left: 5px;">
        <?php echo 'Product Code : ' . $newProdCode . '&nbsp;&nbsp;' . '( Previous Counter : ' . $stTransCounterHist[$counterHist] . '&nbsp;&nbsp;' . 'and New Counter : ' . $stTransCounterHist[$counterHist - 1] . ' )'; ?>
                    </td>
                </tr>
                <?php
                $counterHist++;
                $counterDateHist++;
            }
            ?>
            <tr>
                    <?php while ($staffHist < ($staffHistarrayLength - 1) && $staffDateHist < ($dateHistarrayLength - 1)) { ?>
                    <td align="center" class="ff_calibri fs_14">
        <?php echo $stTransDateHist[$staffDateHist]; ?>
                    </td>
                    <td align="left" class="ff_calibri fs_14" style="padding-left: 5px;">
        <?php //echo 'Product Code : ' . $newProdCode . '&nbsp;&nbsp;' . '( Previous Staff : ' . $stTransStaffHist[$staffHist] . '&nbsp;&nbsp;' . 'and New Staff : ' . $stTransStaffHist[$staffHist - 1] . ' )';   ?>
                    </td>
                </tr>
                <?php
                $staffHist++;
                $staffDateHist++;
            }
        }
        //
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        // END CODE FOR STOCK TRANSFER HISTORY @AUTHOR:PRIYANKA-26NOV2021
        // XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
        //
        ?>
    </table>
    <div id="stockManagementByCounterMultiBarcodeResultsDiv"></div>
</div>