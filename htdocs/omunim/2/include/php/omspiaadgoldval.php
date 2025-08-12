<?php
//@FileName: omspiaadgoldval.php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'conversions.php';
require_once 'ommpincr.php';
$staffId = $_SESSION['sessionStaffId'];
?>
<?php
//
//
$sslg_trans_sub = 'MAIN STOCK UPDATED';
$sysLogTransType = 'sellStock';
$sysLogTransId = $slPrPreInvoice . $slPrInvoiceNo;
$sslg_firm_id = $slPrFirmId;
$sslg_trans_comment = 'Pur Inv No: ' . $sysLogTransId . ', ' . $slPrItemMetal . ' Item Id: ' . $slPrStockPreId . $slPrStockPostId . ', Date: ' . $slPrSellDate . ', Updated Fn Wt: ' . $resFFNW . $slPrItemNTWT .
        ', Valuation: ' . formatInIndianStyle($custFinalValuation);
//
//
include 'omslgapi.php';
//
//
$stockIndicator = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_indicator'])));
    //
    if ($stockIndicator == 'MetalValuation') {
        //
        //print_r($_REQUEST);die;
        //
        $_REQUEST['sttr_barcode_prefix'] = NULL;
        $_REQUEST['sttr_barcode'] = NULL;
        //
        $pktWeight = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_pkt_weight'])));
        $pktWeightType = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_pkt_weight_type'])));
        //
        //
        // FOR STOCK TYPE @PRIYANKA-14APR2022
        $sttrItemId = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_item_id'])));
        //
        $sttrStockType = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_stock_type'])));
        //
        if (($sttrItemId == '' || $sttrItemId == NULL) && $sttrStockType == 'retail') {
            $_REQUEST['sttr_stock_type'] = 'wholesale';
        }
        //
        //
        $sttrId = stock_transaction('insert', $_REQUEST);
        $mainEntryId = $sttrId;
        //
        //                
        // START CODE TO ADD CONDITION FOR SELL ENTRIES @PRIYANKA-13JUNE18
        $transType = mysqli_real_escape_string($conn, stripslashes(trim($_POST['sttr_transaction_type'])));
        //
        //     
        // Start Code To Update image in stock_transaction (Fine) Table @PRIYANKA-30-10-17
        if ($file_size != 0) {
            // 
            // Start Code To call common image id insertion file in stock_transaction table or stock table @Priyanka 04-07-17
            //
            $sttr_id = $sttrId;
            //
            include 'omimginsrt.php';
            //
            // End Code To call common image id insertion file in stock_transaction table or stock table @Priyanka 04-07-17
            //
        }
        // 
        // END Code To Update image in stock_transaction (Fine) Table @PRIYANKA-30-10-17
        //
        //
    } 
/****************Start code to add sys log var @Author:PRIYA15APR14*********************** */
//
//
$crystalEntered = mysqli_real_escape_string($conn, stripslashes(trim($_POST['addItemCryCount'])));
$itemCryFinVal = mysqli_real_escape_string($conn, stripslashes(trim($_POST['addItemCryFinVal'])));
//
//
//echo '$crystalEntered == '.$crystalEntere.'<br />';
//print_r($_REQUEST); exit();
//
//
/****************************************************************************** */
/***************** Start code to add Crystal ***************************        */
/****************************************************************************** */
if ($crystalEntered != '') {

    $cryCount = 0;
    $cryTotWt = 0;

    for ($j = 1; $j <= $crystalEntered; $j++) {

        $cryAvail = trim($_POST['del' . $j]);

        if ($cryAvail != 'Deleted') {

            include 'ogadcyid.php';

            $qSelCryDet = "SELECT cry_id from crystal where cry_own_id = '$ownerId' and cry_crystal_id = '$addItemCryId'"; // crystal table
            $resCryDet = mysqli_query($conn, $qSelCryDet);
            $cryAvailCount = mysqli_num_rows($resCryDet);

            if ($cryAvailCount <= 0) {

                $query = "INSERT INTO crystal (
                              cry_own_id,cry_crystal_id,cry_name,cry_dob,cry_rate,cry_rate_type,cry_clarity,cry_color,
                              cry_other_info,cry_upd_sts,cry_since,cry_comm) 
                              VALUES ('$ownerId','$addItemCryId','$addItemCryName','$itemDOBDay','$addItemCryRate',"
                        . "'$addItemCryRateTyp','$addItemCryClarity',"
                        . "'$addItemCryColor', '$addItemCryOtherInfo','User',$currentDateTime,'Created By User')";

                if (!mysqli_query($conn, $query)) {
                    die('Error: ' . mysqli_error($conn));
                }
            }

            if ($tableCryId != '') {
                //
                //
                // Start Code To Update Stone Values Into stock_transaction (Fine) Table @PRIYANKA-05-06-17
                //
                stock_transaction('update', $_REQUEST, $tableCryId, $j);
                //
                // End Code To Update Stone Values Into stock_transaction (Fine Sell) Table @PRIYANKA-05-06-17
                //
                //
            } else {
                //
                //
                // Start Code To Add Stone Values Into stock_transaction (Fine Sell) Table @PRIYANKA-05-06-17
                $itemIndicator = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sttr_indicator' . $j])));
                //
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
                // FOR STOCK TYPE @PRIYANKA-14APR2022
                $_REQUEST['sttr_stock_type' . $j] = $_REQUEST['sttr_stock_type'];
                $_REQUEST['sttr_transaction_type' . $j] = 'MetalValuation';
                //
                //
                //
                $sttr_id = stock_transaction('insert', $_REQUEST, $sttrId, $j);
                //
                // End Code To Add Stone Values Into stock_transaction (Fine) Table @PRIYANKA-05-06-17
                //
            }
            //
            $cryTotWt = $addItemCryGSW;
            //
            $selectStoneEntry = "SELECT * FROM stock_transaction WHERE sttr_indicator = 'stockCrystal' "
                              . "and sttr_status NOT IN ('DELETED') and sttr_sttr_id = '$mainEntryId'";
            //
            $resultEntry = mysqli_query($conn, $selectStoneEntry);
            $stoneFinalVal = 0;
            $stoneWt = 0;
            //
            while ($stoneRow = mysqli_fetch_array($resultEntry)) {

                $stoneFinalVal += $stoneRow['sttr_valuation'];
                $stoneWt += $stoneRow['sttr_gs_weight'];
                $stoneWtType = $stoneRow['sttr_gs_weight_type'];
            }
            //
            $updateStoneQuery = "UPDATE stock_transaction SET sttr_stone_valuation = '$stoneFinalVal',"
                              . "sttr_stone_wt = '$stoneWt',"
                              . "sttr_stone_wt_type = '$stoneWtType'  "
                              . "WHERE sttr_id = '$mainEntryId' AND sttr_status NOT IN ('DELETED') "
                              . "AND sttr_indicator IN ('MetalValuation') AND sttr_transaction_type IN ('MetalValuation')";
            //
            if (!mysqli_query($conn, $updateStoneQuery)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
    }
    //
    //echo '$sttr_id == '.$sttr_id.'<br />';
    //
    /*************** Start code to set crystal entry field in stock_transaction ******** */
    $query = "UPDATE stock_transaction SET sttr_crystal_yn = 'yes' WHERE  sttr_owner_id = '$ownerId' "
           . "AND sttr_id = '$mainEntryId' AND sttr_indicator IN ('MetalValuation') "
           . "AND sttr_transaction_type IN ('MetalValuation')"; // added condition fro approval @RATNAKAR 26 FEB2018

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }

    // Start Code to get LAST INSERT ID
    //
    parse_str(getTableValues("SELECT * FROM stock_transaction WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
                           . "AND sttr_indicator = 'stockCrystal' order by sttr_id desc LIMIT 0,1"));
    //  
    // END Code to get LAST INSERT ID 

    if ($sttr_id != '') {

        $selStockQuery1 = "SELECT * FROM stock_transaction "
                        . "where sttr_indicator IN ('MetalValuation') "
                        . "and sttr_transaction_type IN ('MetalValuation') "
                        . "and sttr_id = '$mainEntryId' ";

        $stockResult1 = mysqli_query($conn, $selStockQuery1);
        $stockRowDetails = mysqli_fetch_array($stockResult1, MYSQLI_ASSOC);

        $sttr_pre_invoice_no = $stockRowDetails['sttr_pre_invoice_no'];
        $sttr_invoice_no = $stockRowDetails['sttr_invoice_no'];
        $sttr_user_id = $stockRowDetails['sttr_user_id'];
        $sttr_firm_id = $stockRowDetails['sttr_firm_id'];
        $stockItemCode = $stockRowDetails['sttr_item_code'];
        $stockMetalType = $stockRowDetails['sttr_metal_type'];
        $stockTransactionTyp = $stockRowDetails['sttr_transaction_type'];

        $updateQry = "UPDATE stock_transaction SET sttr_item_code = '$stockItemCode', "
                   . "sttr_pre_invoice_no = '$sttr_pre_invoice_no', "
                   . "sttr_invoice_no = '$sttr_invoice_no', "
                   . "sttr_user_id = '$sttr_user_id', "
                   . "sttr_firm_id = '$sttr_firm_id', "
                   . "sttr_transaction_type = '$stockTransactionTyp', "
                   . "sttr_barcode_prefix = '', "
                   . "sttr_barcode = '' "
                   . "WHERE sttr_indicator = 'stockCrystal' and sttr_sttr_id = '$mainEntryId' ";

        if (!mysqli_query($conn, $updateQry)) {
            die('Error: ' . mysqli_error($conn));
        }

        //echo '$updateQry == '.$updateQry;
    }
}
//
//
//
//
/*********************************************************************** */
/****************** End code to add Crystal *************************** */
/********************************************************************** */
//
$sslg_trans_sub = 'CUSTOMER PURCHASE';
$sysLogTransType = 'sellStock';
$sysLogTransId = $slPrPreInvoice . $slPrInvoiceNo;
$sslg_firm_id = $slPrFirmId;
$custId = $sttr_user_id;
$sslg_trans_comment = 'Pur Inv No: ' . $sysLogTransId . ', ' . $slPrItemMetal . ' Item Id: ' . $slPrStockPreId . $slPrStockPostId . ',Metal Fn Wt:' . $slPrItemFFineWt . $slPrItemNTWT . ', Date: ' . $slPrSellDate . ', Valuation: ' . formatInIndianStyle($slPrFinalVal);
include 'omslgapi.php';
//
/***************End code to add sys log var @Author:PRIYA15APR14*********************** */
//
/****************START CODE TO ADD STOCK_SELL LOG VAR @AUTHOR: GAUR29JAN16******************** */
//START CODE TO GET LAST INSERT ID
$qSelItemId = "SELECT sttr_id FROM stock_transaction where sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_indicator='MetalValuation' "
            . "and sttr_transaction_type='MetalValuation' and sttr_status NOT IN ('DELETED') order by sttr_id desc LIMIT 0,1";
$resItemId = mysqli_query($conn, $qSelItemId);
$rowItemId = mysqli_fetch_array($resItemId, MYSQLI_ASSOC);
$lastAddedSlPrId = $rowItemId['sttr_id'];
//
/****************END CODE TO ADD STOCK_SELL LOG VAR @AUTHOR: GAUR29JAN16******************** */
$qUpdPurchasePrice = "UPDATE stock_transaction SET sttr_purchase_price='$itemPurFinalVal', sttr_barcode_prefix = '', "
                   . "sttr_barcode = '' WHERE sttr_id='$lastAddedSlPrId'";
if (!mysqli_query($conn, $qUpdPurchasePrice)) {
    die('Error: ' . mysqli_error($conn));
}
//
//
?>