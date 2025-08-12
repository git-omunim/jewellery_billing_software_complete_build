<?php
/*
 * ***************************************************************************************************************
 * @tutorial: SELL ENTRY UPDATE STOCK TABLE FILE @PRIYANKA-27JUNE18
 * ***************************************************************************************************************
 * 
 * Created on JUNE 27, 2018 18:23:00 PM
 *
 * @FileName: omSellUpdateStockFunc.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
 * @version 2.6.76
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 * Copyright 2018 SoftwareGen, Inc
 *
 * @ModificaionHistory
 * MODIFICATION DATE:
 * AUTHOR: @PRIYANKA-27JUNE18
 * REASON:
 *
 */
?>
<?php
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
?>
<?php
//
if (($sttr_transaction_type == 'sell' || $sttr_transaction_type == 'ESTIMATESELL') && $sttr_status != 'Deleted') {
//  
// TO FETCH MAIN ENTRY DETAILS @PRIYANKA-27JUNE18
$stockEntryQuery = "SELECT * FROM stock_transaction "
                 . "WHERE sttr_owner_id = '$sessionOwnerId' "
                 . "AND sttr_id = '$sttr_sttr_id' AND sttr_indicator NOT IN ('stockCrystal') "
                 . "AND sttr_transaction_type NOT IN ('sell','ESTIMATESELL')";
//
$stockEntryQueryResult = mysqli_query($conn, $stockEntryQuery);
//
while ($stockEntryRowAllDetails = mysqli_fetch_array($stockEntryQueryResult)) {
    //
    $sttrQty = $stockEntryRowAllDetails['sttr_quantity'];
    $sttrGSWEIGHT = $stockEntryRowAllDetails['sttr_gs_weight'];
    $sttrNTWEIGHT = $stockEntryRowAllDetails['sttr_nt_weight'];
    $sttrFNWEIGHT = $stockEntryRowAllDetails['sttr_fine_weight'];
    $mainEntryTransactionType = $stockEntryRowAllDetails['sttr_transaction_type'];
    $sttr_stock_type = $stockEntryRowAllDetails['sttr_stock_type'];
    // 
    // CALCULATE REMAINING STOCK DETAILS @PRIYANKA-27JUNE18
    $finalQTY = ($sttrQty - $addItemFormQty);
    $finalGSWT = ($sttrGSWEIGHT - $addItemFormGrossWeight);
    $finalNTWT = ($sttrNTWEIGHT - $addItemFineWeight);
    $finalFNWT = ($sttrFNWEIGHT - $addItemFFineWeight);
    }
    //
    //
    if ($addItemFormQty > $dBQty) {
        //
        //echo '$stockQty == '.$stockQty.'<br />';
        //echo '$newQty == '.$newQty.'<br />';
        //
        if ($newQty > 0) {
            $newQty = ($newQty * -1);
        }
        //
        $stQty = ($stockQty - $newQty);
        //
        //echo '$stQty == '.$stQty.'<br />';die;
        //
    } else {
        //
        //echo '$stockQty @== '.$stockQty.'<br />';
        //echo '$newQty @== '.$newQty.'<br />';
        //
        if ($newQty < 0) {
            $newQty = ($newQty * -1);
        }
        //
        $stQty = ($stockQty + $newQty);
        //
        //echo '$stQty @== '.$stQty.'<br />';die;
        //
    }
    //
    //
    //echo '$addItemFormGrossWeight #== '.$addItemFormGrossWeight.'<br />';
    //echo '$dBGSW #== '.$dBGSW.'<br />';
    //echo '$finalGSWT #== '.$finalGSWT.'<br />';
    //echo '$finalQTY #== '.$finalQTY.'<br />';
    //
    //
    if ($addItemFormGrossWeight > $dBGSW) {
        //
        //echo '$stockGSW #== '.$stockGSW.'<br />';
        //echo '$newGSW #== '.$newGSW.'<br />';
        //
        if ($newGSW > 0) {
            $newGSW = ($newGSW * -1);
        }
        //
        //echo '$newGSW ##== '.$newGSW.'<br />';die;
        //
        // TO UPDATE MAIN ENTRY DETAILS @PRIYANKA-27JUNE18
        $mainEntryUpdQuery = "UPDATE stock_transaction SET sttr_status = 'SOLDOUT', "
                           . "sttr_final_quantity = '$finalQTY', sttr_final_gs_weight = '$finalGSWT', "
                           . "sttr_final_nt_weight = '$finalNTWT', sttr_final_fn_weight = '$finalFNWT' "
                           . "WHERE sttr_id = '$sttr_sttr_id' AND sttr_indicator NOT IN ('stockCrystal') "
                           . "AND sttr_transaction_type NOT IN ('sell','ESTIMATESELL') AND sttr_owner_id = '$sessionOwnerId'";
        //
        //echo '$mainEntryUpdQuery ##== '.$mainEntryUpdQuery;
        //die;
        //
        if (!mysqli_query($conn, $mainEntryUpdQuery)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
        //
    } else {
        //
        //echo '$newGSW @== '.$newGSW.'<br />'; 
        //
        if ($newGSW < 0) {
            $newGSW = ($newGSW * -1);
        }
        //
        //echo '$newGSW @@== '.$newGSW.'<br />';die;
        //
        // TO UPDATE MAIN ENTRY DETAILS @PRIYANKA-27JUNE18
        if ($mainEntryTransactionType == 'TAG') {
            //
            //
            if ($finalGSWT == 0 && $finalQTY == 0) {
            //    
            $mainEntryUpdQuery = "UPDATE stock_transaction SET sttr_status = 'SOLDOUT', "
                               . "sttr_final_quantity = '0', sttr_final_gs_weight = '0', "
                               . "sttr_final_nt_weight = '0', sttr_final_fn_weight = '0' "
                               . "WHERE sttr_id = '$sttr_sttr_id' AND sttr_indicator NOT IN ('stockCrystal') "
                               . "AND sttr_transaction_type NOT IN ('sell','ESTIMATESELL') AND sttr_owner_id = '$sessionOwnerId'";
            //
            } else {
            // 
             parse_str(getTableValues("SELECT sttr_transaction_type As quatationPanelName FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' and sttr_st_id = '$sttr_sttr_id' AND sttr_transaction_type='ESTIMATE'"));
            if($quatationPanelName == 'ESTIMATE')
            {
            $mainEntryUpdQuery = "UPDATE stock_transaction SET sttr_status = 'ESTIMATE', "
                               . "sttr_final_quantity = '$finalQTY', sttr_final_gs_weight = '$finalGSWT', "
                               . "sttr_final_nt_weight = '$finalNTWT', sttr_final_fn_weight = '$finalFNWT' "
                               . "WHERE sttr_id = '$sttr_sttr_id' AND sttr_indicator NOT IN ('stockCrystal') "
                               . "AND sttr_transaction_type NOT IN ('sell','ESTIMATESELL') AND sttr_owner_id = '$sessionOwnerId'";  
            }else{
            $mainEntryUpdQuery = "UPDATE stock_transaction SET sttr_status = 'TAG', "
                               . "sttr_final_quantity = '$finalQTY', sttr_final_gs_weight = '$finalGSWT', "
                               . "sttr_final_nt_weight = '$finalNTWT', sttr_final_fn_weight = '$finalFNWT' "
                               . "WHERE sttr_id = '$sttr_sttr_id' AND sttr_indicator NOT IN ('stockCrystal') "
                               . "AND sttr_transaction_type NOT IN ('sell','ESTIMATESELL') AND sttr_owner_id = '$sessionOwnerId'";      
            }
            //
            }
            //
            //
        } else {
            //
            //
            if ($finalGSWT == 0 && $finalQTY == 0) {
            // 
            // TO UPDATE MAIN ENTRY DETAILS @PRIYANKA-27JUNE18     
            $mainEntryUpdQuery = "UPDATE stock_transaction SET sttr_status = 'SOLDOUT', "
                               . "sttr_final_quantity = '0', sttr_final_gs_weight = '0', "
                               . "sttr_final_nt_weight = '0', sttr_final_fn_weight = '0' "
                               . "WHERE sttr_id = '$sttr_sttr_id' AND sttr_indicator NOT IN ('stockCrystal') "
                               . "AND sttr_transaction_type NOT IN ('sell','ESTIMATESELL') AND sttr_owner_id = '$sessionOwnerId'";
            //
            } else {
            // 
            // TO UPDATE MAIN ENTRY DETAILS @PRIYANKA-27JUNE18 
             parse_str(getTableValues("SELECT sttr_transaction_type As quatationPanelName FROM stock_transaction WHERE sttr_owner_id = '$sessionOwnerId' and sttr_st_id = '$sttr_sttr_id' AND sttr_transaction_type='ESTIMATE'"));
            if($quatationPanelName == 'ESTIMATE')
            {
            $mainEntryUpdQuery = "UPDATE stock_transaction SET sttr_status = 'ESTIMATE', "
                               . "sttr_final_quantity = '$finalQTY', sttr_final_gs_weight = '$finalGSWT', "
                               . "sttr_final_nt_weight = '$finalNTWT', sttr_final_fn_weight = '$finalFNWT' "
                               . "WHERE sttr_id = '$sttr_sttr_id' AND sttr_indicator NOT IN ('stockCrystal') "
                               . "AND sttr_transaction_type NOT IN ('sell','ESTIMATESELL') AND sttr_owner_id = '$sessionOwnerId'";  
            //
            }else{
                 $mainEntryUpdQuery = "UPDATE stock_transaction SET sttr_status = 'EXISTING', "
                               . "sttr_final_quantity = '$finalQTY', sttr_final_gs_weight = '$finalGSWT', "
                               . "sttr_final_nt_weight = '$finalNTWT', sttr_final_fn_weight = '$finalFNWT' "
                               . "WHERE sttr_id = '$sttr_sttr_id' AND sttr_indicator NOT IN ('stockCrystal') "
                               . "AND sttr_transaction_type NOT IN ('sell','ESTIMATESELL') AND sttr_owner_id = '$sessionOwnerId'";  
            //
            }
            }
            //
            //
        }
        //
        //echo '$mainEntryUpdQuery @@== '.$mainEntryUpdQuery;
        //die;
        //
        if (!mysqli_query($conn, $mainEntryUpdQuery)) {
            die('Error: ' . mysqli_error($conn));
        }
        //
        //
    }
    //
    if ($addItemFormNetWeight > $dBNTW) {
        //
        if ($newNTW > 0) {
            $newNTW = ($newNTW * -1);
        }
        //
    } else {
        //
        if ($newNTW < 0) {
            $newNTW = ($newNTW * -1);
        }
        //
    }
    //
}
?>