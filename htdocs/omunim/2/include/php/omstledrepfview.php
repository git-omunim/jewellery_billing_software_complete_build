<?php

/*
 * **************************************************************************************
 * @tutorial: STONE TRANSACTION REPORT : AUTHOR @DARSHANA 4 AUG 2021
 * **************************************************************************************
 * 
 * Created on June 28, 2020 6:15:20 PM
 *
 * @FileName: omstledrepfview.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.6.0
 * @Copyright (c) 2018 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2018 SoftwareGen Technologies
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
include 'ommprspc.php';
require_once 'system/omssopin.php';
include_once 'conversions.php';
include_once 'ommpfndv.php';
?>
<?php

//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// START CODE FOR CREATE TEMP VIEW TABLE FOR STONE TRANSACTION REPORT : @DARSHANA 4 AUG 2021//
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX //
// 
$createView = "CREATE TABLE IF NOT EXISTS temp_view ("
        . "sttr_id                         INT NOT NULL PRIMARY KEY AUTO_INCREMENT,"
        . "sttr_item_category              VARCHAR(50),"
        . "sttr_item_name                  VARCHAR(50),"
        . "open_gswt                       VARCHAR(50),"
        . "purchase_gswt                   VARCHAR(50),"
        . "sell_gswt                       VARCHAR(50),"
        . "available_gswt                  VARCHAR(50),"
        . "stone_date                      VARCHAR(20),"
        . "stone_other_lang_date           VARCHAR(20))";
// 
$sqlTable = 'DESC temp_view';
mysqli_query($conn, $sqlTable);
//
if (!mysqli_errno($conn) == 1146) {
    $dropView = "DROP table temp_view";
    mysqli_query($conn, $dropView) or die('<br/> ERROR:' . mysqli_error($conn));
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
} else {
    mysqli_query($conn, $createView) or die('<br/> ERROR:' . mysqli_error($conn));
}
//
// Table aWHERE Condition
$viewWhere = " WHERE sttr_firm_id IN ($strFrmId) "
        . "AND "
        . "((sttr_transaction_type IN ('PURCHASE', 'sell', 'EXISTING') "
        . "AND sttr_metal_type IN ('STONE','crystal') "
        . "AND sttr_indicator IN ('crystal','PURCHASE')) "
        . "OR "
        . "(sttr_transaction_type IN ('PURCHASE', 'sell') "
        . "AND sttr_indicator IN ('stockCrystal')) "
        . "OR "
        . "(sttr_transaction_type IN ('PAID','RECEIVED') "
        . "AND sttr_metal_type IN ('STONE','crystal','rawMetal') "
        . "AND sttr_indicator IN ('crystal','rawMetal'))) ";
//table join
$viewJoin = "";
//column group by
$viewGroupBy = "";
//order by
$viewOrderBy = " ORDER BY sttr_add_date ASC";

$selStoneLedger = "SELECT sttr_id, sttr_item_category, sttr_item_name, sttr_add_date, sttr_other_lang_add_date FROM stock_transaction"
        . "$viewWhere" . "$viewOrderBy";

$querySelectStone = mysqli_query($conn, $selStoneLedger) or die(mysqli_error($conn));
while ($resSelectStoneLedger = mysqli_fetch_array($querySelectStone, MYSQLI_ASSOC)) {
    $sttr_id = $resSelectStoneLedger['sttr_id'];
    $sttr_item_category = $resSelectStoneLedger['sttr_item_category'];
    $sttr_item_name = $resSelectStoneLedger['sttr_item_name'];
    $sttr_add_date = $resSelectStoneLedger['sttr_add_date'];
    $sttr_other_lang_add_date = $resSelectStoneLedger['sttr_other_lang_add_date'];
    //
    //
     $purchase_gswt = 0;
    $sell_gswt = 0;
    $available_gswt = 0;
    //
    //start code for opening bal @darshana 13 aug 2021
    //
    $qselectOpenGsCt = "select sttr_gs_weight , sttr_gs_weight_type FROM stock_transaction "
            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
            . "AND sttr_firm_id IN ($strFrmId) "
            . "AND ((sttr_transaction_type IN ('EXISTING') "
            . "AND sttr_indicator IN ('crystal'))"
            . "AND sttr_metal_type IN ('STONE','crystal')"
            . "OR "
            . "(sttr_transaction_type IN ('EXISTING') AND sttr_indicator IN ('stockCrystal'))"
            . " OR "
            . "(sttr_transaction_type IN ('RECEIVED') "
            . "AND sttr_indicator IN ('crystal','rawMetal'))) "
            . "AND sttr_gs_weight_type='CT' "
            . "AND sttr_id = '$sttr_id'";
//     echo '$qselectPurGsCt='.$qselectPurGsCt.'<br>';
    $queryOpengStGs = mysqli_query($conn, $qselectOpenGsCt);
    $resOpengStonCt = mysqli_fetch_array($queryOpengStGs, MYSQLI_ASSOC);
    $totalOpenigStGsWtCt = $resOpengStonCt['sttr_gs_weight'];
    $sttr_gs_weight_type = $resOpengStonCt['sttr_gs_weight_type'];
    //
    //
    $qselectOpenGsGm = "select sttr_gs_weight , sttr_gs_weight_type FROM stock_transaction "
            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
            . "AND sttr_firm_id IN ($strFrmId) "
            . "AND ((sttr_transaction_type IN ('EXISTING') "
            . "AND sttr_indicator IN ('crystal'))"
            . "AND sttr_metal_type IN ('STONE','crystal')"
            . "OR "
            . "(sttr_transaction_type IN ('EXISTING') AND sttr_indicator IN ('stockCrystal'))"
            . " OR "
            . "(sttr_transaction_type IN ('RECEIVED') "
            . "AND sttr_indicator IN ('crystal','rawMetal'))) "
            . "AND sttr_gs_weight_type='GM' "
            . "AND sttr_id = '$sttr_id'";
//     echo '$qselectPurGsCt='.$qselectPurGsCt.'<br>';
    $queryOpengStGsGm = mysqli_query($conn, $qselectOpenGsGm);
    $resOpengStonGm = mysqli_fetch_array($queryOpengStGsGm, MYSQLI_ASSOC);
    $OpenigStGsWtGm = $resOpengStonGm['sttr_gs_weight'];
    $sttr_gs_weight_type = $resOpengStonGm['sttr_gs_weight_type'];
    $totalOpenigStGsWtGm = ($OpenigStGsWtGm * 5);
    //
    //
     $qselectOpenGsKg = "select sttr_gs_weight , sttr_gs_weight_type FROM stock_transaction "
            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
            . "AND sttr_firm_id IN ($strFrmId) "
            . "AND ((sttr_transaction_type IN ('EXISTING') "
            . "AND sttr_indicator IN ('crystal'))"
            . "AND sttr_metal_type IN ('STONE','crystal')"
            . "OR "
            . "(sttr_transaction_type IN ('EXISTING') AND sttr_indicator IN ('stockCrystal'))"
            . " OR "
            . "(sttr_transaction_type IN ('RECEIVED') "
            . "AND sttr_indicator IN ('crystal','rawMetal'))) "
            . "AND sttr_gs_weight_type='KG' "
            . "AND sttr_id = '$sttr_id'";
//     echo '$qselectPurGsCt='.$qselectPurGsCt.'<br>';
    $queryOpengStGsKg = mysqli_query($conn, $qselectOpenGsKg);
    $resOpengStonKg = mysqli_fetch_array($queryOpengStGsKg, MYSQLI_ASSOC);
    $OpenigStGsWtKg = $resOpengStonKg['sttr_gs_weight'];
    $sttr_gs_weight_type = $resOpengStonKg['sttr_gs_weight_type'];
    $totalOpenigStGsWtKg = ($OpenigStGsWtKg * 5000);
    //
    //
    $qselectOpenGsMg = "select sttr_gs_weight , sttr_gs_weight_type FROM stock_transaction "
            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
            . "AND sttr_firm_id IN ($strFrmId) "
            . "AND ((sttr_transaction_type IN ('EXISTING') "
            . "AND sttr_indicator IN ('crystal'))"
            . "AND sttr_metal_type IN ('STONE','crystal')"
            . "OR "
            . "(sttr_transaction_type IN ('EXISTING') AND sttr_indicator IN ('stockCrystal'))"
            . " OR "
            . "(sttr_transaction_type IN ('RECEIVED') "
            . "AND sttr_indicator IN ('crystal','rawMetal'))) "
            . "AND sttr_gs_weight_type='MG' "
            . "AND sttr_id = '$sttr_id'";
//     echo '$qselectPurGsCt='.$qselectPurGsCt.'<br>';
    $queryOpengStGsMg = mysqli_query($conn, $qselectOpenGsMg);
    $resOpengStonMg = mysqli_fetch_array($queryOpengStGsMg, MYSQLI_ASSOC);
    $OpenigStGsWtMg = $resOpengStonMg['sttr_gs_weight'];
    $sttr_gs_weight_type = $OpenigStGsWtMg['sttr_gs_weight_type'];
    $totalOpenigStGsWtMg = ($OpenigStGsWtMg * 0.005);
    //
    //
    $TotalOpeningBal = ($totalOpenigStGsWtCt + $totalOpenigStGsWtGm + $totalOpenigStGsWtKg + $totalOpenigStGsWtMg);
    //
    //end code for opening @darshana 13 aug 2021
    //code for purhcase stone @darshana
    //
     $qselectPurGsCt = "select sttr_gs_weight , sttr_gs_weight_type FROM stock_transaction "
            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
            . "AND sttr_firm_id IN ($strFrmId) "
            . "AND ((sttr_transaction_type IN ('PURCHASE') "
            . "AND sttr_indicator IN ('crystal','PURCHASE'))"
            . "AND sttr_metal_type IN ('STONE','crystal')"
            . "OR "
            . "(sttr_transaction_type IN ('PURCHASE') AND sttr_indicator IN ('stockCrystal'))"
            . " OR "
            . "(sttr_transaction_type IN ('RECEIVED') "
            . "AND sttr_indicator IN ('crystal','rawMetal'))) "
            . "AND sttr_gs_weight_type='CT' "
            . "AND sttr_id = '$sttr_id'";
//     echo '$qselectPurGsCt='.$qselectPurGsCt.'<br>';
    $queryDateStGs = mysqli_query($conn, $qselectPurGsCt);
    $resDateStonPur = mysqli_fetch_array($queryDateStGs, MYSQLI_ASSOC);
    $totalPurStGsWtCt = $resDateStonPur['sttr_gs_weight'];
    $sttr_gs_weight_type_date = $resDateStonPur['sttr_gs_weight_type'];
    //
    //
     $qselectPurGsGm = "SELECT sttr_gs_weight, sttr_gs_weight_type "
            . "FROM stock_transaction "
            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
            . "AND sttr_firm_id IN ($strFrmId) "
            . "AND ((sttr_transaction_type IN ('PURCHASE') "
            . "AND sttr_indicator IN ('crystal','PURCHASE'))"
            . "AND sttr_metal_type IN ('STONE','crystal')"
            . "OR "
            . "(sttr_transaction_type IN ('PURCHASE') AND sttr_indicator IN ('stockCrystal'))"
            . " OR "
            . "(sttr_transaction_type IN ('RECEIVED') "
            . "AND sttr_indicator IN ('crystal','rawMetal'))) "
            . "AND sttr_gs_weight_type='GM' "
            . "AND sttr_id = '$sttr_id'";

    $queryDateStGsGm = mysqli_query($conn, $qselectPurGsGm);
    $resDateStonPurGm = mysqli_fetch_array($queryDateStGsGm, MYSQLI_ASSOC);
    $StGsWtGm = $resDateStonPurGm['sttr_gs_weight'];
    $sttr_gs_weight_type_date = $resDateStonPur['sttr_gs_weight_type'];
    $totalPurStGsWtGm = ($StGsWtGm * 5);
    //
//
    $qselectPurGsKg = "SELECT sttr_gs_weight, sttr_gs_weight_type "
            . "FROM stock_transaction "
            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
            . "AND sttr_firm_id IN ($strFrmId) "
            . "AND ((sttr_transaction_type IN ('PURCHASE') "
            . "AND sttr_indicator IN ('crystal','PURCHASE'))"
            . "AND sttr_metal_type IN ('STONE','crystal')"
            . "OR "
            . "(sttr_transaction_type IN ('PURCHASE') AND sttr_indicator IN ('stockCrystal'))"
            . " OR "
            . "(sttr_transaction_type IN ('RECEIVED') "
            . "AND sttr_indicator IN ('crystal','rawMetal'))) "
            . "AND sttr_gs_weight_type='KG' "
            . "AND sttr_id = '$sttr_id'";

    $queryDateStGsKg = mysqli_query($conn, $qselectPurGsKg);
    $resDateStonPurKg = mysqli_fetch_array($queryDateStGsKg, MYSQLI_ASSOC);
    //
    $StGsWtKg = $resDateStonPurKg['sttr_gs_weight'];
    $sttr_gs_weight_type_date = $resDateStonPurKg['sttr_gs_weight_type'];
    $totalPurStGsWtKg = ($StGsWtKg * 5000);
    //
    //
    $qselectPurGsMg = "SELECT sttr_gs_weight, sttr_gs_weight_type "
            . "FROM stock_transaction "
            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
            . "AND sttr_firm_id IN ($strFrmId) "
            . "AND ((sttr_transaction_type IN ('PURCHASE') "
            . "AND sttr_indicator IN ('crystal','PURCHASE'))"
            . "AND sttr_metal_type IN ('STONE','crystal')"
            . "OR "
            . "(sttr_transaction_type IN ('PURCHASE') AND sttr_indicator IN ('stockCrystal'))"
            . " OR "
            . "(sttr_transaction_type IN ('RECEIVED') "
            . "AND sttr_indicator IN ('crystal','rawMetal'))) "
            . "AND sttr_gs_weight_type='MG' "
            . "AND sttr_id = '$sttr_id'";

    $queryDateStGsMg = mysqli_query($conn, $qselectPurGsMg);
    $resDateStonPurMg = mysqli_fetch_array($queryDateStGsMg, MYSQLI_ASSOC);
    //
    $StGsWtKg = $resDateStonPurMg['sttr_gs_weight'];
    $sttr_gs_weight_type_date = $resDateStonPurMg['sttr_gs_weight_type'];
    $totalPurStGsWtMg = ($StGsWtKg * 0.005);
    //
    $purchase_gswt = ($totalPurStGsWtCt + $totalPurStGsWtGm + $totalPurStGsWtKg + $totalPurStGsWtMg);
    //
    //
    $qselectSellGsCt = "SELECT sttr_gs_weight,"
            . "sttr_gs_weight_type "
            . "FROM stock_transaction "
            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
            . "AND sttr_firm_id IN ($strFrmId) "
            . "AND ((sttr_transaction_type IN ('sell') "
            . "AND sttr_indicator IN ('crystal') "
            . "AND sttr_metal_type IN ('STONE', 'crystal')) OR "
            . "(sttr_transaction_type IN ('sell') AND sttr_indicator IN ('stockCrystal'))"
            . "OR "
            . "(sttr_transaction_type IN ('PAID') "
            . "AND sttr_indicator IN ('crystal','rawMetal'))) "
            . "AND sttr_gs_weight_type='CT' "
            . "AND sttr_id = '$sttr_id'";
    $queryDateSellStone = mysqli_query($conn, $qselectSellGsCt);
    $resDateSellStone = mysqli_fetch_array($queryDateSellStone, MYSQLI_ASSOC);
    //
    $totalSellStGsWtCt = $resDateSellStone['sttr_gs_weight'];
    $sttr_gs_weight_type_Date_sell = $resDateSellStone['sttr_gs_weight_type'];
    //
    //
    //weight type in Gm
    $qselectSellGsGm = "SELECT sttr_gs_weight,"
            . "sttr_gs_weight_type "
            . "FROM stock_transaction "
            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
            . "AND sttr_firm_id IN ($strFrmId) "
            . "AND ((sttr_transaction_type IN ('sell') "
            . "AND sttr_indicator IN ('crystal') "
            . "AND sttr_metal_type IN ('STONE', 'crystal')) OR "
            . "(sttr_transaction_type IN ('sell') AND sttr_indicator IN ('stockCrystal'))"
            . "OR "
            . "(sttr_transaction_type IN ('PAID') "
            . "AND sttr_indicator IN ('crystal','rawMetal'))) "
            . "AND sttr_gs_weight_type='GM' "
            . "AND sttr_id = '$sttr_id'";

    $queryDateSellGsWtGm = mysqli_query($conn, $qselectSellGsGm);
    $resDateSellGsWtGm = mysqli_fetch_array($queryDateSellGsWtGm, MYSQLI_ASSOC);
    //
    $SellStGsWtGm = $resDateSellGsWtGm['sttr_gs_weight'];
    $sttr_gs_weight_type_Date_sell = $resDateSellGsWtGm['sttr_gs_weight_type'];
    $totalSellStGsWtGm = ($SellStGsWtGm * 5);
    //
    //
    $qselectSellGsKg = "SELECT sttr_gs_weight,"
            . "sttr_gs_weight_type "
            . "FROM stock_transaction "
            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
            . "AND sttr_firm_id IN ($strFrmId) "
            . "AND ((sttr_transaction_type IN ('sell') "
            . "AND sttr_indicator IN ('crystal') "
            . "AND sttr_metal_type IN ('STONE', 'crystal')) OR "
            . "(sttr_transaction_type IN ('sell') AND sttr_indicator IN ('stockCrystal'))"
            . "OR "
            . "(sttr_transaction_type IN ('PAID') "
            . "AND sttr_indicator IN ('crystal','rawMetal'))) "
            . "AND sttr_gs_weight_type='KG' "
            . "AND sttr_id = '$sttr_id'";

    $queryDateSellGsWtKg = mysqli_query($conn, $qselectSellGsKg);
    $resDateSellGsWtKg = mysqli_fetch_array($queryDateSellGsWtKg, MYSQLI_ASSOC);
    //
    $SellStGsWtKg = $resDateSellGsWtKg['sttr_gs_weight'];
    $sttr_gs_weight_type_Date_sell = $resDateSellGsWtKg['sttr_gs_weight_type'];
    $totalSellStGsWtKg = ($SellStGsWtKg * 5000);
    //
    //
    $qselectSellGsMg = "SELECT sttr_gs_weight,"
            . "sttr_gs_weight_type "
            . "FROM stock_transaction "
            . "WHERE sttr_owner_id = '$_SESSION[sessionOwnerId]' "
            . "AND sttr_firm_id IN ($strFrmId) "
            . "AND ((sttr_transaction_type IN ('sell') "
            . "AND sttr_indicator IN ('crystal') "
            . "AND sttr_metal_type IN ('STONE', 'crystal')) OR "
            . "(sttr_transaction_type IN ('sell') AND sttr_indicator IN ('stockCrystal'))"
            . "OR "
            . "(sttr_transaction_type IN ('PAID') "
            . "AND sttr_indicator IN ('crystal','rawMetal'))) "
            . "AND sttr_gs_weight_type='MG' "
            . "AND sttr_id = '$sttr_id'";

    $queryDateSellGsWtMg = mysqli_query($conn, $qselectSellGsMg);
    $resDateSellGsWtMg = mysqli_fetch_array($queryDateSellGsWtMg, MYSQLI_ASSOC);
    //
    $SellStGsWtMg = $resDateSellGsWtMg['sttr_gs_weight'];
    $sttr_gs_weight_type_Date_sell = $resDateSellGsWtMg['sttr_gs_weight_type'];
    $totalSellStGsWtMg = ($SellStGsWtMg * 0.005);
    //
    //
     $sell_gswt = ($totalSellStGsWtCt + $totalSellStGsWtGm + $totalSellStGsWtKg + $totalSellStGsWtMg);
    //
    $available_gswt = (($TotalOpeningBal + $purchase_gswt) - $sell_gswt);
    //
    //
//    echo '$sttr_id='.$sttr_id.'<br>';
//    echo '$sttr_item_categor='.$sttr_item_category.'<br>';
//    echo '$sttr_item_name='.$sttr_item_name.'<br>';
//    echo '$purchase_gswt='.$purchase_gswt.'<br>';
//    echo '$sell_gswt='.$sell_gswt.'<br>';
//    echo '$available_gswt='.$available_gswt.'<br>';
//    echo '$sttr_add_date='.$sttr_add_date;

    $InserIntoTempViewStoneRe = "INSERT into temp_view(sttr_id, sttr_item_category, sttr_item_name, open_gswt, purchase_gswt, sell_gswt, available_gswt, stone_date, stone_other_lang_date)"
            . "VALUES"
            . "('$sttr_id','$sttr_item_category','$sttr_item_name','$TotalOpeningBal','$purchase_gswt','$sell_gswt','$available_gswt','$sttr_add_date','$sttr_other_lang_add_date')";
    mysqli_query($conn, $InserIntoTempViewStoneRe) or die('<br/> ERROR:' . mysqli_error($conn));
}
//
?>
