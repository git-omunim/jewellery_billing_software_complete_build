<?php
/*
 * **************************************************************************************************
 * @Description: RFID TALLY SUMMARY CALCULATE CLOSING FILE @AUTHOR:YUVRAJ-17112022
 * **************************************************************************************************
 *
 * Created on OCT 25, 2021 01:53:01 PM 
 * **************************************************************************************
 * @FileName: C:\Project\OMUNIM_2.7.68_SVN_COMP_SW\htdocs\omunim\2\include\php\omStockTallySummaryClosingCal.php
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
$ClosingQTY = 0;
$ClosingGsWeight = 0;
$ClosingNtWeight = 0;
$ClosingFnWeight = 0;
//
// 
// CLOSING QTY @AUTHOR:YUVRAJ-17112022
$ClosingQTY = (($OpeningQTY + $InwardQTY) - abs($OutwardQTY));
//
//
// CLOSING GS WEIGHT @AUTHOR:YUVRAJ-17112022
$ClosingGsWeight = (($OpeningGsWeight + $InwardGsWeight) - abs($OutwardGsWeight));
//
//
// CLOSING NET WEIGHT @AUTHOR:YUVRAJ-17112022
$ClosingNtWeight = (($OpeningNtWeight + $InwardNtWeight) - abs($OutwardNtWeight));
//
//
// CLOSING FINE WEIGHT @AUTHOR:YUVRAJ-17112022
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
// ADDED CODE FOR ALL RFID TALLY REPORT @YUVRAJ-11JAN2022
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