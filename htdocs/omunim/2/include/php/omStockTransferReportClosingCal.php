<?php
/*
 * **************************************************************************************************
 * @Description: STOCK TRANSFER REPORT CALCULATE CLOSING FILE @AUTHOR:PRIYANKA-09DEC2021
 * **************************************************************************************************
 *
 * Created on DEC 09, 2021 05:30:01 PM 
 * **************************************************************************************
 * @FileName: omStockTransferReportClosingCal.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: OMUNIM 2.7.102
 * @version 2.7.102
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 * ******************************************************************************************
 * @ModificaionHistory
 *  MODIFICATION DATE:09DEC2021
 *  AUTHOR: PRIYANKA
 *  REASON:
 *
 * Project Name: Online Munim ERP Accounting Software
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
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
include 'ommprspc.php';
require_once 'ommpincr.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
?>
<?php
//
//***********************************************************************************************************
// START CODE FOR STOCK TRANSFER REPORT CALCULATE CLOSING @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
//
//
$ClosingQTY = 0;
$ClosingGsWeight = 0;
$ClosingNtWeight = 0;
$ClosingFnWeight = 0;
//
// 
// CLOSING QTY @AUTHOR:PRIYANKA-09DEC2021
$ClosingQTY = (($OpeningQTY + $InwardQTY) - abs($OutwardQTY));
//
//
// CLOSING GS WEIGHT @AUTHOR:PRIYANKA-09DEC2021
$ClosingGsWeight = (($OpeningGsWeight + $InwardGsWeight) - abs($OutwardGsWeight));
//
//
// CLOSING NET WEIGHT @AUTHOR:PRIYANKA-09DEC2021
$ClosingNtWeight = (($OpeningNtWeight + $InwardNtWeight) - abs($OutwardNtWeight));
//
//
// CLOSING FINE WEIGHT @AUTHOR:PRIYANKA-09DEC2021
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
$totalClosingQty += $ClosingQTY;
$totalClosingGsWt += $ClosingGsWeight;
$totalClosingNtWt += $ClosingNtWeight;
$totalClosingFnWt += $ClosingFnWeight;
//
//
//echo '$totalClosingQty == ' . $totalClosingQty . '<br />';
//echo '$totalClosingGsWt == ' . $totalClosingGsWt . '<br />';
//echo '$totalClosingNtWt == ' . $totalClosingNtWt . '<br />'; 
//echo '$totalClosingFnWt == ' . $totalClosingFnWt . '<br />'; 
//
//
//***********************************************************************************************************
// END CODE FOR STOCK TRANSFER REPORT CALCULATE CLOSING @AUTHOR:PRIYANKA-09DEC2021
//***********************************************************************************************************
//
?>