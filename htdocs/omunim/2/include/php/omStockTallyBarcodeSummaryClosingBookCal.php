<?php
/*
 * **************************************************************************************************
 * @Description: RFID TALLY SUMMARY CALCULATE CLOSING FILE @AUTHOR:YUVRAJ-17112022
 * **************************************************************************************************
 *
 * Created on OCT 25, 2021 01:53:01 PM 
 * **************************************************************************************
 * @FileName: C:\Project\OMUNIM_2.7.68_SVN_COMP_SW\htdocs\omunim\2\include\php\omStockTallySummaryClosingBookCal.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.92
 * @version 2.7.92
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:17112022
 *  AUTHOR: YUVRAJ
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
$ClosingBookQTY = 0;
$ClosingBookGsWeight = 0;
$ClosingBookNtWeight = 0;
$ClosingBookFnWeight = 0;
//
// 
// CLOSING QTY @AUTHOR:YUVRAJ-17112022
$ClosingBookQTY = (($OpeningBookQTY + $InwardQTY) - abs($OutwardQTY));
//
//
// CLOSING GS WEIGHT @AUTHOR:YUVRAJ-17112022
$ClosingBookGsWeight = (($OpeningBookGsWeight + $InwardGsWeight) - abs($OutwardGsWeight));
//
//
// CLOSING NET WEIGHT @AUTHOR:YUVRAJ-17112022
$ClosingBookNtWeight = (($OpeningBookNtWeight + $InwardNtWeight) - abs($OutwardNtWeight));
//
//
// CLOSING FINE WEIGHT @AUTHOR:YUVRAJ-17112022
$ClosingBookFnWeight = (($OpeningBookFnWeight + $InwardFnWeight) - abs($OutwardFnWeight));
//
//                    
//
//echo '$totalOpeningQty == ' . $totalOpeningQty . '<br />';
//echo '$totalInwardQty == ' . $totalInwardQty . '<br />';
//echo '$totalOutwardQty == ' . $totalOutwardQty . '<br />'; 

//echo '$ClosingBookQTY == ' . $ClosingBookQTY. '<br />';
//echo '$ClosingBookGsWeight == ' . $ClosingBookGsWeight . '<br />';
//echo '$ClosingBookNtWeight == ' . $ClosingBookNtWeight . '<br />'; 

//
//
//$totalClosingBookQty += (($totalOpeningQty + $totalInwardQty) - abs($totalOutwardQty)); 
//$totalClosingBookGsWt += (($totalOpeningGsWt + $totalInwardGsWt) - abs($totalOutwardGsWt)); 
//$totalClosingBookNtWt += (($totalOpeningNtWt + $totalInwardNtWt) - abs($totalOutwardNtWt));
//$totalClosingBookFnWt += (($totalOpeningFnWt + $totalInwardFnWt) - abs($totalOutwardFnWt));
//
//
//
//
// ADDED CODE FOR ALL RFID TALLY REPORT @YUVRAJ-11JAN2022
if ($_REQUEST['subPanelName'] == 'AllStockList') {
    //
    //
    $totalClosingBookQty += $ClosingBookQTY;
    //
    //
    $totalClosingBookGsWt += $ClosingBookGsWeight;
    //
    //
    $totalClosingBookNtWt += $ClosingBookNtWeight;
    //
    //
    $totalClosingBookFnWt += $ClosingBookFnWeight;
    //
    //
} else {
    //
    //
    if ($ClosingBookQTY > 0) {
        $totalClosingBookQty += $ClosingBookQTY;
    }
    //
    //
    if ($ClosingBookGsWeight > 0) {
        $totalClosingBookGsWt += $ClosingBookGsWeight;
    }
    //
    //
    if ($ClosingBookNtWeight > 0) {
        $totalClosingBookNtWt += $ClosingBookNtWeight;
    }
    //
    //
    if ($ClosingBookFnWeight > 0) {
        $totalClosingBookFnWt += $ClosingBookFnWeight;
    }
    //
    //
}
//
//
//echo '$totalClosingBookQty == ' . $totalClosingBookQty . '<br />';
//echo '$totalClosingBookGsWt == ' . $totalClosingBookGsWt . '<br />';
//echo '$totalClosingBookNtWt == ' . $totalClosingBookNtWt . '<br />'; 
//echo '$totalClosingBookFnWt == ' . $totalClosingBookFnWt . '<br />'; 
//
//
?>