<?php
/*
 * **************************************************************************************************
 * @Description: STOCK LEDGER SUMMARY CALCULATE CLOSING FILE @AUTHOR:PRIYANKA-25OCT2021
 * **************************************************************************************************
 *
 * Created on OCT 25, 2021 01:53:01 PM 
 * **************************************************************************************
 * @FileName: omStockLedgerSummaryClosingCal.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.92
 * @version 2.7.92
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:25OCT2021
 *  AUTHOR: PRIYANKA
 *  REASON:
 *
 * Project Name: Online Munim ERP Accounting Software
 * Version: 2.7.92
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'ommpincr.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
//
//
$ClosingQTY = 0;
$ClosingGsWeight = 0;
$ClosingNtWeight = 0;
$ClosingFnWeight = 0;
//
//
if ($InwardQTY < 0) {
    $InwardQTY = 0;
}
//
if ($InwardGsWeight < 0) {
    $InwardGsWeight = 0;
}
//
if ($InwardNtWeight < 0) {
    $InwardNtWeight = 0;
}
//
if ($InwardFnWeight < 0) {
    $InwardFnWeight = 0;
}
//
// 
// CLOSING QTY @AUTHOR:PRIYANKA-11OCT2021
$ClosingQTY = (($OpeningQTY + $InwardQTY) - abs($OutwardQTY));
//
//
//echo '$OpeningGsWeight == ' . $OpeningGsWeight . '<br />';
//echo '$InwardGsWeight == ' . $InwardGsWeight . '<br />';
//echo '$OutwardGsWeight == ' . $OutwardGsWeight . '<br />';
// CLOSING GS WEIGHT @AUTHOR:PRIYANKA-11OCT2021
$ClosingGsWeight = (($OpeningGsWeight + $InwardGsWeight) - abs($OutwardGsWeight));
//
//
// CLOSING NET WEIGHT @AUTHOR:PRIYANKA-11OCT2021
$ClosingNtWeight = (($OpeningNtWeight + $InwardNtWeight) - abs($OutwardNtWeight));
//
//
// CLOSING FINE WEIGHT @AUTHOR:PRIYANKA-11OCT2021
$ClosingFnWeight = (($OpeningFnWeight + $InwardFnWeight) - abs($OutwardFnWeight));
//
//                    
//
//echo '$totalOpeningQty == ' . $totalOpeningQty . '<br />';
//echo '$totalInwardQty == ' . $totalInwardQty . '<br />';
//echo '$totalOutwardQty == ' . $totalOutwardQty . '<br />'; 
//
//echo '$ClosingQTY == ' . $ClosingQTY . '<br />';
//echo '$ClosingGsWeight == ' . $ClosingGsWeight . '<br />';
//echo '$ClosingNtWeight == ' . $ClosingNtWeight . '<br />'; 
//die;
//
//
//$totalClosingQty += (($totalOpeningQty + $totalInwardQty) - abs($totalOutwardQty)); 
//$totalClosingGsWt += (($totalOpeningGsWt + $totalInwardGsWt) - abs($totalOutwardGsWt)); 
//$totalClosingNtWt += (($totalOpeningNtWt + $totalInwardNtWt) - abs($totalOutwardNtWt));
//$totalClosingFnWt += (($totalOpeningFnWt + $totalInwardFnWt) - abs($totalOutwardFnWt));
//
//
//
//
// ADDED CODE FOR ALL STOCK LEDGER REPORT @PRIYANKA-11JAN2022
if ($_REQUEST['subPanelName'] == 'AllStockList') {
    //
    //
    $totalClosingQty += $ClosingQTY;
    //
    //
    $totalClosingGsWt += $ClosingGsWeight;
    //
    //
    $totalClosingNtWt += $ClosingNtWeight;
    //
    //
    $totalClosingFnWt += $ClosingFnWeight;
    //
    //
} else {
    //
    //
    if ($ClosingGsWeight > 0 && $ClosingQTY > 0) {
        $totalClosingQty += $ClosingQTY;
    }
    //
    //
    if ($ClosingGsWeight > 0) {
        $totalClosingGsWt += $ClosingGsWeight;
    }
    //
    //
    if ($ClosingNtWeight > 0) {
        $totalClosingNtWt += $ClosingNtWeight;
    }
    //
    //
    if ($ClosingFnWeight > 0) {
        $totalClosingFnWt += $ClosingFnWeight;
    }
    //
    //
}
//
//
//echo '$totalClosingQty == ' . $totalClosingQty . '<br />';
//echo '$totalClosingGsWt == ' . $totalClosingGsWt . '<br />';
//echo '$totalClosingNtWt == ' . $totalClosingNtWt . '<br />'; 
//echo '$totalClosingFnWt == ' . $totalClosingFnWt . '<br />'; 
//
//
?>