<?php
/*
 * *************************************************************************************************
 * @tutorial: DELETED STOCK REACTIVE OR PERMANENT DELETE API REQUEST FILE @AUTHOR:SIMRAN-11NOV2021
 * *************************************************************************************************
 *
 * Created on on 21 OCT, 2021 01:36:00 PM
 * 
 * @FileName: omsttrandel.php
 * @Author: SoftwareGen Developement Teamjrj
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 3.0.0
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 * Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: 
 *  REASON: 
 */
?>
<?php
//
// MANDATORY FILES
if (!isset($_SESSION)) {
    session_start();
}
//
include $_SESSION['documentRootIncludePhp'] . '/system/omsachsc.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omsgeagb.php';
require_once $_SESSION['documentRootIncludePhp'] . '/system/omssopin.php';
include_once $_SESSION['documentRootIncludePhp'] . '/ommpfndv.php';
//
?>
<?php
//
//echo '<pre>';
//print_r($_REQUEST);
//
$stockRoundRobinQuery= "SELECT omly_value FROM omlayout WHERE omly_option = 'stockRoundRobin'";
$resStockRoundRobin = mysqli_query($conn, $stockRoundRobinQuery);
$rowStockRoundRobin = mysqli_fetch_array($resStockRoundRobin);
$stockRoundRobin = $rowStockRoundRobin['omly_value'];
//
$sessionOwnerId = $_SESSION['sessionOwnerId'];
$sttr_id = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['sttrId'])));
$operation = mysqli_real_escape_string($conn, stripslashes(trim($_REQUEST['operation'])));
$firmId = $_REQUEST['firmId'];
$_REQUEST['sttr_recreate_status'] = 'YES';
//
if($stockRoundRobin == 'YES'){
    $getItemCode = "SELECT sttr_item_code,sttr_item_pre_id,sttr_item_id FROM stock_transaction_del where sttr_owner_id='$ownerId' "
                . "AND sttr_id = '$sttr_id'";
    $resGetItemCode = mysqli_query($conn, $getItemCode);
    $rowGetItemCode = mysqli_fetch_array($resGetItemCode);
    $itemPreId = $rowGetItemCode['sttr_item_pre_id'];
    $itemPostId = $rowGetItemCode['sttr_item_id'];
    //
 $qStockEntryExist = "SELECT sttr_id FROM stock_transaction where sttr_owner_id='$ownerId' "
                . "AND sttr_item_pre_id = '$itemPreId' AND sttr_item_id = '$itemPostId'"
                . " AND sttr_indicator = 'stock' AND sttr_status IN ('EXISTING' , 'PaymentPending','TAG') AND sttr_firm_id = '$firmId' "
                . "AND sttr_transaction_type NOT IN ('sell') AND sttr_status NOT IN ('DELETED') ORDER BY sttr_id DESC";
        //
        $resStockEntryExist = mysqli_query($conn, $qStockEntryExist);
        $noOfRowsStock = mysqli_num_rows($resStockEntryExist);
        //
        if($noOfRowsStock > 0){
            $sttrItemIdquery = "SELECT sttr_item_pre_id, MAX(CAST(sttr_item_id AS SIGNED)) as sttr_item_id 
              FROM stock_transaction WHERE sttr_item_pre_id = '$itemPreId' and sttr_owner_id='$ownerId' and sttr_firm_id = '$firmId' "
                . "AND sttr_transaction_type NOT IN ('sell') AND sttr_status IN ('EXISTING' , 'PaymentPending')";
//
        $resSttrItemIdquery = mysqli_query($conn, $sttrItemIdquery);
        $rowSttrItemIdquery = mysqli_fetch_array($resSttrItemIdquery);
        $sttr_item_id = $rowSttrItemIdquery['sttr_item_id'];
        $sttr_item_pre_id = $rowSttrItemIdquery['sttr_item_pre_id'];
        $sttr_item_id++;
        $sttr_item_code = $sttr_item_pre_id.$sttr_item_id;
        //
        $qGetBarcode = "SELECT MAX(sttr_barcode) as sttr_barcode 
              FROM stock_transaction WHERE sttr_owner_id='$ownerId' and sttr_firm_id = '$firmId' "
                . "AND sttr_barcode_prefix IS NOT NULL "
                . "AND sttr_transaction_type NOT IN ('sell') AND sttr_status IN ('EXISTING' , 'PaymentPending')";
//
        $resGetBarcode = mysqli_query($conn, $qGetBarcode);
        $rowGetBarcode = mysqli_fetch_array($resGetBarcode);
        $sttr_barcode = $rowGetBarcode['sttr_barcode'];
        //
        $incrementedBarcode = str_pad((int)$sttr_barcode + 1, strlen($sttr_barcode), "0", STR_PAD_LEFT);
        $updateAddStockEntry = "UPDATE stock_transaction_del "
                         . "SET sttr_item_id = '$sttr_item_id', sttr_item_pre_id = '$sttr_item_pre_id', sttr_item_code = '$sttr_item_code' "
                . ",sttr_barcode = '$incrementedBarcode' "
                         . "WHERE sttr_id = '$sttr_id' and sttr_indicator = 'stock'";
        }else{
           $updateAddStockEntry = "UPDATE stock_transaction "
                         . "SET sttr_status = 'EXISTING'"
                         . "WHERE sttr_id = '$addStockId' and sttr_indicator = 'stock'"; 
        }
         if (!mysqli_query($conn, $updateAddStockEntry)) {
           die('Error: ' . mysqli_error($conn));
         }
}

//echo 'sttrr==='.$sttr_id;
//
if ($operation == 'reactive') {
    $function_name = "ROLLBACK_DELETED_STOCK";
} else {
    $function_name = "SET_PERMANENT_DELETE_STOCK";
}
//
$request_array = array('sttr_id' => $sttr_id, 'sttr_owner_id' => $sessionOwnerId, 
                       'sttr_recreate_status' => 'YES',
                       'function_name' => $function_name);
//
$request_array['dbName'] = $_SESSION['sessionUserDBName'];
$request_array['dbUser'] = $_SESSION['sessionUserDBId'];
$request_array['dbPass'] = $_SESSION['sessionUserDBPass'];
$request_array['DB_HOST'] = $_SESSION['sessionUserDBHost'];
$request_array['DB_DATABASE'] = $_SESSION['sessionUserDBName'];
$request_array['DB_USER'] = $_SESSION['sessionUserDBId'];
$request_array['DB_PASSWORD'] = $_SESSION['sessionUserDBPass'];
$apiUrl = $_SESSION['sessionApiLink'] . "/stock/om_stock.php";
//
$apiPostFields = $request_array;
//
//echo '<pre>';
//print_r($apiPostFields);
//echo '</pre>';
//die;
//
$omAPIResult = omCallAPI($apiUrl, $apiPostFields);
$omAPIResultArray = json_decode($omAPIResult, TRUE);
//
//echo '<br>$omAPIResultArray : '.$omAPIResultArray.'<br>';
//
parse_str(getTableValues("SELECT sttr_jrnl_id,sttr_metal_type,sttr_firm_id,sttr_valuation FROM stock_transaction WHERE "
                               . "sttr_owner_id='$_SESSION[sessionOwnerId]' and sttr_id='$sttr_id' ORDER BY sttr_id DESC LIMIT 0,1"));
if ($sttr_jrnl_id != '' && $sttr_jrnl_id != NULL) {
            //
            // START CODE TO UPDATE JOURNAL ENTRIES @PRIYANKA-14SEP18
            $jrnlOwnId = $sessionOwnerId;
            $jrnlId = $sttr_jrnl_id;
            $jrtrOwnId = $sessionOwnerId;
            $jrtrJrnlId = $sttr_jrnl_id;
            $metalType = $sttr_metal_type;
            $payFinalPayableAmt = $sttr_valuation;
            $firmId = $sttr_firm_id;
            $sttr_item_ent_type = 'AddInStock';
            $payAddDate = date('d M Y');
            $operation = 'insert';
            $transType = 'EXISTING';
            include 'omusrtranjrnlstockinvacc.php';
            //
            parse_str(getTableValues("SELECT jrnl_id "
                . "FROM journal WHERE jrnl_own_id='$_SESSION[sessionOwnerId]' order by jrnl_id desc limit 0,1"));
            
            $queryUpdateJrnlId = "UPDATE stock_transaction SET sttr_jrnl_id='$jrnl_id'"
                              . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' AND sttr_id = '$sttr_id' ";
            if (!mysqli_query($conn, $queryUpdateJrnlId)) {
                        die('Error: ' . mysqli_error($conn));
                    }
            // END CODE TO UPDATE JOURNAL ENTRIES @PRIYANKA-14SEP18
            //
        }
//
if ($_REQUEST['panelName'] == 'StockMismatchDeletedStockList') {
header("Location: $documentRoot/include/php/omStockMismatchDeletedStockList.php?panelName=deletedStockList");
} else {
header("Location: $documentRoot/include/php/omstockdeletelist.php?panelName=deletedStockList");    
}
//
?>
