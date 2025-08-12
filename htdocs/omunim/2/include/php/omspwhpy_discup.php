<?php
/*
 * **************************************************************************************
 * @Description: RAW METAL DIV @PRIYANKA-28FEB18
 * **************************************************************************************
 *
 * Created on FEB 28, 2018 11:50:47 AM
 * @FileName: omspwhpy_discup.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE: // For new entries from 25 FEB 2018 - 'utin_inv_disc_option' store 'discUp' 
  // Old payment panel now this utin_inv_disc_option value is null but in future utin_inv_disc_option value will be
  // 'discDown' and we will provide customer to choose payment panel option @PRIYANKA-28FEB18
 *  AUTHOR:@PRIYANKA-28FEB18
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
include_once 'ommpcmfc.php';
?>
<?php
//
//
//print_r($_REQUEST);
//
//
//echo '<br />$noOfRawMetalEntries == ' . $noOfRawMetalEntries . '<br />';
//echo '<br />$accIdSelected 1== ' . $accIdSelected . '<br />';
//
//
if($prefix == ''){
    $prefix = $_REQUEST['prefix'];
}
if ($noOfRawMetalEntries == 0) {
    $accIdSelected = '';
}
//
//
//echo '<br />$accIdSelected 2== ' . $accIdSelected . '<br />';
//
//
//echo '$payPanelName='.$payPanelName;
//
//
$slectCrystalRate = "SELECT cry_rate_value, cry_rate_per_wt_tp FROM crystal_rates WHERE (cry_rate_value > 0) "
        . "ORDER BY cry_rate_id DESC LIMIT 0,1";
//
//echo '<br />$slectCrystalRate == ' . $slectCrystalRate . '<br />';
//
$queryCrystalRate = mysqli_query($conn, $slectCrystalRate);
$resCrystalRate = mysqli_fetch_array($queryCrystalRate);
//
if ($cry_rate_value == '' || $cry_rate_value == NULL) {
    $cry_rate_value = $resCrystalRate['cry_rate_value'];
}
//
$cry_rate_per_wt_tp = $resCrystalRate['cry_rate_per_wt_tp'];
//
$metalTypePanel = $_GET['metalTypePanel'];
$metalPanelName = $_POST['metalPanelName'];
//
//
//        print_r($_REQUEST);
//        echo '$panelName @== ' . $panelName . '<br />';
//        echo '$mainPanel @== ' . $mainPanel . '<br />';
//        echo 'panelName @@== ' . $_REQUEST['panelName'] . '<br />';
//        echo '$payPanelName @@== ' . $_REQUEST['payPanelName'] . '<br />';
//        echo '$transPanelName @@== ' . $_REQUEST['transPanelName'] . '<br />';
//        echo '$payPanelName @== ' . $payPanelName . '<br />';
//        echo '$transPanelName @== ' . $transPanelName . '<br />';
//        echo '$paymentMode @== ' . $paymentMode . '<br />';
//        echo '$prefix @== ' . $prefix . '<br />';
//
//
if ($payPanelName == '') {
    $payPanelName = $_POST['panelName'];
}
if ($payPanelName == '') {
    $payPanelName = $_GET['panelName'];
}
if ($userId == '') {
    $userId = $_POST['userId'];
}
if ($userId == '') {
    $userId = $_GET['userId'];
}
//
//echo '$userId === ' . $userId . '<br />';
//
parse_str(getTableValues("SELECT user_type as UserType FROM user WHERE user_id = '$userId'"));
//
//echo 'UserType === ' . $UserType . '<br />';
//
$cntr = 'true';
$mcntr = 'true';
//
// CrystalStockPayment  CrystalStockPayUp
// 
//echo '$payPanelName='.$payPanelName;
//
if ($payPanelName == 'StockPayment' || $payPanelName == 'SlPrPayment' ||
        $payPanelName == 'ItemRepairPayment' ||
        $transPanelName == 'NewOrderPayment' ||
        $payPanelName == 'ApprovalPayment' || $payPanelName == 'NewOrderPayment' || // $payPanelName == 'NewOrderPayment' ADDED FOR NEW ORDER @AUTHOR:MADHUREE-17JUN2020
        $payPanelName == 'CustSellPayment' || $payPanelName == 'NwOrPayment' ||
        $payPanelName == 'RawPayment' || $payPanelName == 'SuppAddOrder' ||
        $payPanelName == 'SuppUdhaDep' || $payPanelName == 'InvoicePayment' ||
        $payPanelName == 'NwOrDelPayment' ||
        $payPanelName == 'SuppPayment' || $payPanelName == 'SuppOrderDelivery' || $payPanelName == 'CrySellPayment' ||
        $payPanelName == 'CrystalStockPayment' || $payPanelName == 'CrystalStockPayUp' || $payPanelName == 'CrySellPayUp') {
    //
    //echo '$payPanelName=1='.$payPanelName.'<br>';
    //
    if ($saveMetalCount != 0 && $slPrOthInfo == 'PaymentSaved') {
        $metalCount = $saveMetalCount + 1;
    } else {
        //
        if ($payPanelName == 'SlPrPayment' && $noOfEstimateReceivedRawMet > 0) {
            //$metalCount = 1;
        } else {
            $metalCount = 1;
        }
        //        
    }
    //
    //echo '$metalPanelName==1--'.$metalPanelName.'<br/>';
    //
    if ($metalPanelName == 'rawMoreMetalPanel') {
        //
        $rawPreId = $_POST['rawPreId'];
        $rawPostId = $_POST['rawPostId'];
        $metalCount = $_POST['metalDivCount'];
        //
        if (($noOfRawMet == '' || $noOfRawMet == NULL) &&
                $metalCount != '' && $metalCount != NULL) {
            $noOfRawMet = $metalCount;
        }
        //
        $firmId = $_POST['firmId'];
        $rawMetType = $_POST['metalType'];
        $rawMetName = $_POST['metalName'];
        $rawGdPreId = $_POST['rawGdPreId'];
        $rawGdPostId = $_POST['rawGdPostId'];
        $mcntr = $_POST['mcntr'];
        $rawGdPostId = $rawGdPostId + 1;
        $rawSlPreId = $_POST['rawSlPreId'];
        $rawSlPostId = $_POST['rawSlPostId'];

        $rawAlPreId = $_POST['rawAlPreId']; //alloy Pre Id
        $rawAlPostId = $_POST['rawAlPostId']; //alloy Post Id
        $otherChgsBy = $_POST['otherChgsBy'];
        $goldPurchaseAvgRate = $_POST['gMetalAvgRate'];
        $silverPurchaseAvgRate = $_POST['sMetalAvgRate'];
        //
        $crystalPurchaseAvgRate = $cry_rate_value;
        //
        //$crystalPurchaseAvgRate = $_POST['cryMetalAvgRate'];
        //
        //echo '<br />$crystalPurchaseAvgRate **== ' . $crystalPurchaseAvgRate . '<br />';
        //
    }
    //
    //echo '$metalTypePanel===='.$metalTypePanel;
    //
    if ($metalTypePanel == 'rawMetalType') {
        //
        //echo '$metalPanelName'.$metalPanelName;
        //
        $metalCount = $_GET['metalDivCount'];

        if (($noOfRawMet == '' || $noOfRawMet == NULL) &&
                $metalCount != '' && $metalCount != NULL) {
            $noOfRawMet = $metalCount;
        }

        $firmId = $_GET['firmId'];
        $rawMetType = $_GET['metalType'];
        $rawMetName = $_GET['metalName'];
        $cntr = $_GET['cntr'];
        $rawGdPreId = $_GET['rawGdPreId'];
        $rawGdPostId = $_GET['rawGdPostId'];
        $rawSlPreId = $_GET['rawSlPreId'];

        $rawSlPostId = $_GET['rawSlPostId'];
        $rawAlPreId = $_GET['rawAlPreId']; //alloy Pre Id
        $rawAlPostId = $_GET['rawAlPostId']; //alloy Post Id
        $otherChgsBy = $_GET['otherChgsBy'];
        $goldPurchaseAvgRate = $_GET['gMetalAvgRate'];
        $silverPurchaseAvgRate = $_GET['sMetalAvgRate'];
        //
        $crystalPurchaseAvgRate = $_GET['cryMetalAvgRate'];
        //
        //$metalAvgRate = $_GET['metalAvgRate'];
        //
        //echo '<br />$metalCount !!== '.$metalCount.'<br />';
        //
        //
        $cntr = 'false';
        //
    } else if ($metalPanelName != 'rawMoreMetalPanel' && $metalPanelName != 'rawMetalType') {
        //
        if ($rawMetType == '' || $rawMetType == NULL || $rawMetType == 'Gold') {
            $rawMetType = 'Gold';
            $rawGdPreId = $rawGoldPreId;
            $rawGdPostId = $rawGoldPostId;
            $rawSlPreId = $rawSilverPreId;
            $rawSlPostId = $rawSilverPostId;
            $rawAlPreId = $rawAlloyPreId;
            $rawAlPostId = $rawAlloyPostId;
            $metalAvgRate = $goldPurchaseAvgRate;
        }
    }
}
//
if ($metalDueBalType == NULL || $metalDueBalType == '') {
    $metalDueBalType = 'GM';
}
//
//
//echo '<br />$metalCount @@== '.$metalCount.'<br />';
//
//
//if ($payPanelName == 'StockPayUp' || $payPanelName == 'StockPayment') {
//    $rawType = 'AddStock';
//} else if ($payPanelName == 'SellPayUp' || $payPanelName == 'SlPrPayment') {
//    $rawType = 'SellPurchase';
//} else if ($payPanelName == 'NwOrPayUp' || $payPanelName == 'NwOrPayment') {
//    $rawType = 'newOrder';
//}
//
//
if ($payPanelName == 'StockPayUp' || $payPanelName == 'StockPayment' || $payPanelName == 'CrystalStockPayment' || $payPanelName == 'CrystalStockPayUp') {
    $rawType = 'PAID';
} else if ($payPanelName == 'SellPayUp' || $payPanelName == 'SlPrPayment' ||
        $payPanelName == 'ItemRepairPayUp' || $payPanelName == 'ItemRepairPayment' ||
        $payPanelName == 'ApprovalPayment' || $payPanelName == 'ApprovalPayUp' ||
        $transPanelName == 'NewOrderPayment' ||
        $payPanelName == 'CrySellPayUp' || $payPanelName == 'CrySellPayment') {
    $rawType = 'RECEIVED';
} else if ($payPanelName == 'RawPayUp' || $payPanelName == 'RawPayment') {
    if ($transactionPanel == 'RawPurchase')
        $rawType = 'PAID';
    else
        $rawType = 'RECEIVED';
} else if ($payPanelName == 'NwOrPayUp' || $payPanelName == 'NwOrPayment' || $payPanelName == 'NewOrderPaymentUp') {
    $rawType = 'newOrder';
}
//
//
//echo '<pre>';
//print_r($_REQUEST);
//echo '<br />$metalCount == '.$metalCount.'<br />';
//echo '<br />$payPanelName == '.$payPanelName.'<br />';
//
//
// START CODE FOR ADD NEW METAL REC/PAID ENTRY - MAIN ENTRY UPDATE TIME - NEW FUNCTIONALITY @PRIYANKA-18MAR2019
if ($payPanelName == 'StockPayUp' || $payPanelName == 'SellPayUp' ||
        $payPanelName == 'ItemRepairPayUp' ||
        $payPanelName == 'ApprovalPayUp' ||
        $payPanelName == 'SellItemReturn' ||
        $payPanelName == 'CustSellPayUp' || $payPanelName == 'RawPayUp' ||
        $payPanelName == 'NwOrPayUp' || $payPanelName == 'NewOrderPaymentUp' ||
        $payPanelName == 'CrystalStockPayUp' || $payPanelName == 'CrySellPayUp') {

    //echo '$payPanelName=3='.$payPanelName.'<br>';

    if (($metalCount == '' || $metalCount == NULL) &&
            $_REQUEST['metalDivCount'] != '' &&
            $_REQUEST['metalDivCount'] != NULL) {

        $metalCount = $_REQUEST['metalDivCount'];
        $noOfRawMet = $_REQUEST['metalDivCount'];
        $firmId = $_REQUEST['firmId'];
        $userId = $_REQUEST['userId'];
        $rawMetType = $_REQUEST['metalType'];
        $rawMetName = $_REQUEST['metalName'];
        $cntr = $_REQUEST['cntr'];

        //echo '$rawMetType'.$rawMetType;

        if ($_REQUEST['gMetalAvgRate'] != '' &&
                $_REQUEST['gMetalAvgRate'] != NULL) {
            $metalRate = $_REQUEST['gMetalAvgRate'];
        } else if ($rawMetType == 'crystal' && $_REQUEST['cryMetalAvgRate'] != '' && $_REQUEST['cryMetalAvgRate'] != NULL) {
            $metalRate = $_REQUEST['cryMetalAvgRate'];
        } else {
            $metalRate = $_REQUEST['sMetalAvgRate'];
        }

        $goldPurchaseAvgRate = $_REQUEST['gMetalAvgRate'];
        $silverPurchaseAvgRate = $_REQUEST['sMetalAvgRate'];
        $crystalPurchaseAvgRate = $_REQUEST['cryMetalAvgRate'];
        $metalPanelName = $_REQUEST['metalPanelName'];

        //echo '$crystalPurchaseAvgRate'.$crystalPurchaseAvgRate;
        //echo '<br />$metalCount %%== '.$metalCount.'<br />';
    }
}
// END CODE FOR ADD NEW METAL REC/PAID ENTRY - MAIN ENTRY UPDATE TIME - NEW FUNCTIONALITY @PRIYANKA-18MAR2019
//
//
//echo '<br />$cry_rate_value == ' . $cry_rate_value . '<br />';
//echo '<br />$crystalPurchaseAvgRate == ' . $crystalPurchaseAvgRate . '<br />';
//echo '<br />cryMetalAvgRate == ' . $_REQUEST['cryMetalAvgRate'] . '<br />';
//echo '<br />$metalRate ==' . $metalRate . '<br />';
//
//
//echo 'noOfRawMet *== ' . $noOfRawMet . '<br/>';
//echo '$metalCount *== ' . $metalCount . '<br/>';
//
//
//echo '$payMetal1RecGsWt *== ' . $payMetal1RecGsWt . '<br/>';
//echo '$payMetal1RecGsWtType *== ' . $payMetal1RecGsWtType . '<br/>';
//
//
include 'omrmsldt.php';
include 'omiamrtdv.php';
//
//
//echo '$payMetal1RecGsWt @@== ' . $payMetal1RecGsWt . '<br/>';
//echo '$payMetal1RecGsWtType @@== ' . $payMetal1RecGsWtType . '<br/>';
//
//
// START CODE FOR URDVALUATION CALCULATION FOR DROPDOWNOPTION byGSTWt byNetWt byFineWt byFFineWt  @JAY-28FEB2025
if ($payPanelName == 'StockPayUp' || $payPanelName == 'SellPayUp' ||
        $payPanelName == 'ItemRepairPayUp' ||
        $payPanelName == 'ApprovalPayUp' ||
        $payPanelName == 'SellItemReturn' ||
        $payPanelName == 'CustSellPayUp' || $payPanelName == 'RawPayUp' ||
        $payPanelName == 'NwOrPayUp' || $payPanelName == 'NewOrderPaymentUp' ||
        $payPanelName == 'CrystalStockPayUp' || $payPanelName == 'CrySellPayUp'){
    
    // Define the query
$queryURDUtinRawMetValBy = "SELECT utin_id, utin_user_id, utin_pre_invoice_no, utin_invoice_no, utin_raw_met_val_by 
                            FROM user_transaction_invoice 
                            WHERE utin_user_id = '$userId' 
                              AND utin_pre_invoice_no = '$payPreInvoiceNo' 
                              AND utin_invoice_no = '$payInvoiceNo'";

// Print the query for debugging
//echo "Query: " . $queryURDUtinRawMetValBy . "<br>";

// Execute the query
$resqURDUtinRawMetValBy = mysqli_query($conn, $queryURDUtinRawMetValBy);
$rowURDUtinRawMetValBy = mysqli_fetch_array($resqURDUtinRawMetValBy, MYSQLI_ASSOC);
$URDUtinRawMetValBy = $rowURDUtinRawMetValBy['utin_raw_met_val_by'];
//echo "URDUtinRawMetValBy: " . $URDUtinRawMetValBy . "<br>";
$urdValuationBy=$URDUtinRawMetValBy;
}
// END CODE FOR URDVALUATION CALCULATION CALCULATION FOR DROPDOWNOPTION byGSTWt byNetWt byFineWt byFFineWt @JAY-28FEB2025

?>
<div id="rawheadtitle"></div>
<table border="0" cellspacing="0" cellpadding="0" align="left" width="100%">
    <tr>
        <td align="left" valign="top">

            <!-- START CODE FOR ADD NEW METAL REC/PAID ENTRY - MAIN ENTRY UPDATE TIME - NEW FUNCTIONALITY @PRIYANKA-18MAR2019 -->
            <?php //if ($noOfRawMet != '' && $noOfRawMet != NULL) {   ?>

            <!-- START CODE TO DEFINE HIDDEN VARIABLE FOR OLD METAL VAL CALCULATION @AUTHOR:PRIYANKA-13JULY2023 -->
            <input type="hidden" id="defaultGmWtInGm" name="defaultGmWtInGm" value="<?php echo $gmWtInGm; ?>"/>
            <input type="hidden" id="defaultGmWtInKg" name="defaultGmWtInKg" value="<?php echo $gmWtInKg; ?>"/>
            <input type="hidden" id="defaultGmWtInMg" name="defaultGmWtInMg" value="<?php echo $gmWtInMg; ?>"/>
            <input type="hidden" id="defaultSrGmWtInGm" name="defaultSrGmWtInGm" value="<?php echo $srGmWtInGm; ?>"/>
            <input type="hidden" id="defaultSrGmWtInKg" name="defaultSrGmWtInKg" value="<?php echo $srGmWtInKg; ?>"/>
            <input type="hidden" id="defaultSrGmWtInMg" name="defaultSrGmWtInMg" value="<?php echo $srGmWtInMg; ?>"/>
            <!-- END CODE TO DEFINE HIDDEN VARIABLE FOR OLD METAL VAL CALCULATION @AUTHOR:PRIYANKA-13JULY2023 -->

            <input type="hidden" id="urdValuationBy" name="urdValuationBy" value="<?php echo $urdValuationBy; ?>" />
            <input type="hidden" id="noOfRawMet" name="noOfRawMet" value="<?php echo $noOfRawMet; ?>" />
            <input type="hidden" id="totMetal" name="totMetal" value="<?php echo $noOfRawMet; ?>" />
            <?php //} else {   ?>
<!--            <input type="hidden" id="noOfRawMet" name="noOfRawMet" />
            <input type="hidden" id="totMetal" name="totMetal" />-->
            <?php //} ?>
            <!-- END CODE FOR ADD NEW METAL REC/PAID ENTRY - MAIN ENTRY UPDATE TIME - NEW FUNCTIONALITY @PRIYANKA-18MAR2019 -->

            <?php
            //echo '$rawType == ' . $rawType . '<br />';
            //echo '$rawMetType == ' . $rawMetType . '<br />';
            //echo '$userId == ' . $userId . '<br />';
            //echo '$payPreInvoiceNo == ' . $payPreInvoiceNo . '<br />';
            //echo '$payInvoiceNo == ' . $payInvoiceNo . '<br />';
            ?>

            <input type="hidden" id="<?php echo $payMetal1TransType; ?>" name="<?php echo $payMetal1TransType; ?>" value="<?php echo $rawType; ?>" />            
            <input type="hidden" id="<?php echo $payMetal1PreInvNo; ?>" name="<?php echo $payMetal1PreInvNo; ?>" value="<?php echo $payPreInvoiceNo; ?>" />
            <input type="hidden" id="<?php echo $payMetal1PostInvNo; ?>" name="<?php echo $payMetal1PostInvNo; ?>" value="<?php echo $payInvoiceNo; ?>" />


            <?php if ($rawMetType == 'crystal') { ?>
                <input type="hidden" id="<?php echo $payMetal1Indicator; ?>" name="<?php echo $payMetal1Indicator; ?>" value="crystal"/>
                <input type="hidden" id="<?php echo $payMetal1UserId; ?>" name="<?php echo $payMetal1UserId; ?>" value="<?php echo $userId; ?>" />
                <input type="hidden" id="<?php echo $payMetal1StocType; ?>" name="<?php echo $payMetal1StocType; ?>" value="retail" />
                <input type="hidden" id="<?php echo $payMetal1StockType; ?>" name="<?php echo $payMetal1StockType; ?>" value="crystal" />
            <?php } else { ?>
                <input type="hidden" id="<?php echo $payMetal1Indicator; ?>" name="<?php echo $payMetal1Indicator; ?>" value="rawMetal"/>
                <input type="hidden" id="<?php echo $payMetal1UserId; ?>" name="<?php echo $payMetal1UserId; ?>" value="<?php echo $userId; ?>" />
                <input type="hidden" id="<?php echo $payMetal1StocType; ?>" name="<?php echo $payMetal1StocType; ?>" value="retail" />
                <input type="hidden" id="<?php echo $payMetal1StockType; ?>" name="<?php echo $payMetal1StockType; ?>" value="rawMetal" />
            <?php } ?>


            <div id="rawMetalDiv<?php echo $metalCount; ?>" name="rawMetalDiv<?php echo $metalCount; ?>">
                <div id="rawMetalIdDiv<?php echo $metalCount; ?>">
                    <?php
                    //
                    //
                    if ($userId == '') {
                        $userId = $_POST['userId'];
                    }
                    //
                    if ($userId == '') {
                        $userId = $_GET['userId'];
                    }
                    //
                    //echo '$userId === ' . $userId . '<br />';
                    //
                    parse_str(getTableValues("SELECT user_type as UserType FROM user WHERE user_id = '$userId'"));
                    //
                    //echo 'UserType === ' . $UserType . '<br />';
                    //            
                    //
                    if ($payPanelName == 'StockPayment' || $payPanelName == 'SlPrPayment' ||
                            $payPanelName == 'ItemRepairPayment' ||
                            $payPanelName == 'ApprovalPayment' ||
                            $payPanelName == 'CustSellPayment' || $payPanelName == 'SuppOrderDelivery' ||
                            $payPanelName == 'NwOrPayment' || $payPanelName == 'RawPayment' ||
                            $payPanelName == 'SuppAddOrder' || $payPanelName == 'NwOrDelPayment' ||
                            $payPanelName == 'SuppPayment' || $payPanelName == 'NewOrderPayment' ||
                            $payPanelName == 'CrySellPayment' || $payPanelName == 'CrystalStockPayment' ||
                            $payPanelName == 'CrystalStockPayUp' || $payPanelName == 'CrySellPayUp') {

//                        if ($metalRate == null || $metalRate == '') {
                            if ($rawMetType == 'Gold') {
                                //
                                $metalDueBal = $goldFinalWeight;
                                $metalDueBalType = $goldFinalWeightType;
                                //
                                //$metalAvgRate = $goldPurchaseAvgRate;
                                //
                                if ($metalRate == '') {
                                    if ($goldPurchaseAvgRate != '') {
                                        $metalRate = $goldPurchaseAvgRate;
                                        $metalAvgRate = $goldPurchaseAvgRate;
                                    } else {
                                        $metalRate = callMetalRateTable('select', 'LatestMetalRate', '', '', 'Gold');
                                        $metalAvgRate = $metalRate;
                                    }
                                }
                                //
                                $gdRate = $metalRate;
                                $rawMetName = 'OLD GOLD';
                                //
                            } else if ($rawMetType == 'Silver') {
                                //
                                $metalDueBal = $silverFinalWeight;
                                $metalDueBalType = $silverFinalWeightType;
                                //
                                if ($metalRate == '') {
                                    if ($silverPurchaseAvgRate != '') {
                                        $metalRate = $silverPurchaseAvgRate;
                                        $metalAvgRate = $silverPurchaseAvgRate;
                                    } else {
                                        $metalRate = callMetalRateTable('select', 'LatestMetalRate', '', '', 'Silver');
                                        $metalAvgRate = $metalRate;
                                    }
                                }
                                //
                                $slRate = $metalRate;
                                $rawMetName = 'OLD SILVER';
                                //
                            } else if ($rawMetType == 'crystal') {
                                //
                                if ($crystalPurchaseAvgRate != '') {
                                    //
                                    $metalRate = $crystalPurchaseAvgRate;
                                    $metalAvgRate = $crystalPurchaseAvgRate;
                                    //
                                } else {
                                    //
                                    $slectCrystalRate = "SELECT cry_rate_value, cry_rate_per_wt_tp FROM crystal_rates "
                                            . "WHERE (cry_rate_value > 0) ORDER BY cry_rate_id DESC LIMIT 0,1";
                                    //
                                    $queryCrystalRate = mysqli_query($conn, $slectCrystalRate);
                                    $resCrystalRate = mysqli_fetch_array($queryCrystalRate);
                                    //
                                    if ($cry_rate_value == '' || $cry_rate_value == NULL) {
                                        $cry_rate_value = $resCrystalRate['cry_rate_value'];
                                    }
                                    //
                                    $cry_rate_per_wt_tp = $resCrystalRate['cry_rate_per_wt_tp'];
                                    //
                                    if ($invRecGsWType == '' || $invRecGsWType == NULL) {
                                        $invRecGsWType = $cry_rate_per_wt_tp;
                                    }
                                    //
                                    $metalRate = $cry_rate_value;
                                    $metalAvgRate = $metalRate;
                                    //
                                }
                                //
                                $stRate = $metalRate;
                                $rawMetName = 'STONE STOCK';
                                //
                            } else if ($rawMetType == 'Alloy') {
                                $metalRate = '';
                                $rawMetName = 'ALLOY';
                            }
//                        } else {
//                            $metalAvgRate = $metalRate;
//                        }
                    }
                    //
                    //
                    if ($payPanelName == 'StockPayUp' || $payPanelName == 'SellPayUp' ||
                            $payPanelName == 'ItemRepairPayUp' ||
                            $payPanelName == 'ApprovalPayUp' ||
                            $payPanelName == 'SellItemReturn' ||
                            $payPanelName == 'CustSellPayUp' || $payPanelName == 'NewOrderPaymentUp' ||
                            $payPanelName == 'NwOrPayUp' || $payPanelName == 'RawPayUp' ||
                            $payPanelName == 'CrySellPayUp' || $payPanelName == 'CrystalStockPayUp') {
                        //
//                        echo '$payPanelName=5='.$payPanelName.'<br>';
                        if ($metalRate == '' || $metalRate == NULL) {
                            //
                            if ($goldPurchaseAvgRate != '') {
                                $metalRate = $goldPurchaseAvgRate;
                                $metalAvgRate = $goldPurchaseAvgRate;
                            } else {
                                $metalRate = callMetalRateTable('select', 'LatestMetalRate', '', '', 'Gold');
                                $metalAvgRate = $metalRate;
                            }
                            //
                            $gdRate = $metalRate;
                            $rawMetType = 'Gold';
                            //
                            //echo '$metalRate == '.$metalRate;
                            //
                        }
                    }
                    //
                    //
                    if ($rawMetDesc == '') {
                        //
                        parse_str(getTableValues("SELECT met_rate_metal_id FROM metal_rates "
                                        . "WHERE met_rate_own_id='$_SESSION[sessionOwnerId]' "
                                        . "AND met_rate_metal_name='$rawMetType' "
                                        . "order by met_rate_ent_dat desc LIMIT 0, 1"));
                        // 
                        $rawMetDesc = $met_rate_metal_id;
                        //
                        parse_str(getTableValues("SELECT rwmt_item_name FROM raw_metal where rwmt_owner_id='$_SESSION[sessionOwnerId]' "
                                        . "and rwmt_metal_type='$rawMetType' and rwmt_metal_rate_id ='$met_rate_metal_id' "
                                        . "ORDER BY rwmt_since DESC LIMIT 0, 1"));
                        //
                        //$rawMetName = $rwmt_item_name;
                        //
                    }
                    //
                    $checkRawGdPresent = noOfRowsCheck('rwmt_id', 'raw_metal', "rwmt_metal_type='Gold' and rwmt_status = 'PaymentDone'");
                    $checkRawSlPresent = noOfRowsCheck('rwmt_id', 'raw_metal', "rwmt_metal_type='Silver' and rwmt_status = 'PaymentDone'");
                    //
                    ?>
                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                        <tr>
                            <td align="left"  class="itemAddPnLabels14" width="5%">
                                <input id="metalDiv<?php echo $metalCount; ?>" name="metalDiv<?php echo $metalCount; ?>" type="hidden"/>
                                <input id="metalDel<?php echo $metalCount; ?>" name="metalDel<?php echo $metalCount; ?>" value="<?php echo $metalCount; ?>" type="hidden" />
                                <input id="rawId" name="rawId" type="hidden" value="<?php echo $rawId; ?>"/>
                                <input id="metalPanel" name="metalPanel" type="hidden" value="<?php echo $payPanelName; ?>"/>
                                <input id="metalCount" name="metalCount" type="hidden" value="<?php echo $metalCount; ?>"/>

                                <input type="hidden" id="totPrevMetal" name="totPrevMetal" value="<?php echo $saveMetalCount; ?>" />

                                <SELECT class="input_border_grey" 
                                        id="<?php echo $payMetalType1; ?>" name="<?php echo $payMetalType1; ?>" 
                                        style="width:100%;height:40px;"
                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('<?php echo $payMetal1FirmId; ?>').focus();
                                                    return false;
                                                } else if (event.keyCode == 8) {
                                        <?php
                                        if ($metalCount > 1 &&
                                                ($payPanelName != 'SlPrPayment' &&
                                                $payPanelName != 'ItemRepairPayment' &&
                                                $payPanelName != 'ApprovalPayment' &&
                                                $slPrOthInfo != 'PaymentSaved')) {
                                            ?>
                                                        document.getElementById('<?php echo $prefix . 'PayMetalType1' . ($metalCount - 1); ?>').focus();
                                        <?php } else if ($itemMainPanel == 'addByInv') { ?>
                                                        document.getElementById('suppItemFinVal1').focus();
                                        <?php } ?>
                                                    return false;
                                                }"
                                        onchange="getWholeRawMetalType('<?php echo $payPanelName; ?>', this.value, '<?php echo $metalCount; ?>', '<?php echo $firmId; ?>',
                                                        '<?php echo $rawGdPreId; ?>', '<?php echo $rawGdPostId; ?>',
                                                        '<?php echo $rawSlPreId; ?>', '<?php echo $rawSlPostId; ?>', '<?php echo $rawAlPreId; ?>',
                                                        '<?php echo $rawAlPostId; ?>',
                                                        'rawMetalType', '<?php echo $cntr; ?>',
                                                        '<?php echo $goldPurchaseAvgRate; ?>', '<?php echo $silverPurchaseAvgRate; ?>',
                                                        '<?php echo $crystalPurchaseAvgRate; ?>', '<?php echo $userId; ?>');
                                        
                                        <?php
                                        if ($payPanelName != 'StockPayUp' &&
                                                $payPanelName != 'SellPayUp' &&
                                                $payPanelName != 'ItemRepairPayUp' &&
                                                $payPanelName != 'ApprovalPayUp' &&
                                                $payPanelName != 'SellItemReturn' &&
                                                $payPanelName != 'CustSellPayUp' &&
                                                $payPanelName != 'NwOrPayUp' &&
                                                $payPanelName != 'RawPayUp' &&
                                                $payPanelName != 'ItemRepairPayUp' &&
                                                $payPanelName != 'NewOrderPaymentUp') {
                                            //
                                            if ($UserType != 'CUSTOMER') {
                                                ?>
                                                        if (document.getElementById('<?php echo $payMetalType1; ?>').value == 'Gold') {
                                                            document.getElementById('<?php echo $payMetal1MetalType; ?>').value = 'RawGold';
                                                            document.getElementById('<?php echo $payMetal1MetalDesc; ?>').value = 'RAW GOLD';
                                                            document.getElementById('<?php echo $payMetal1RecGsWtType; ?>').value = 'GM';
                                                            document.getElementById('<?php echo $payMetal1RecWtType; ?>').value = 'GM';
                                                            document.getElementById('<?php echo $payMetal1PktWtType; ?>').value = 'GM';
                                                            document.getElementById('<?php echo $payMetal1Indicator; ?>').value = 'rawMetal';
                                                            document.getElementById('<?php echo $payMetal1StockType; ?>').value = 'rawMetal';
                                                        } else if (document.getElementById('<?php echo $payMetalType1; ?>').value == 'Silver') {
                                                            document.getElementById('<?php echo $payMetal1MetalType; ?>').value = 'RawSilver';
                                                            document.getElementById('<?php echo $payMetal1MetalDesc; ?>').value = 'RAW SILVER';
                                                            document.getElementById('<?php echo $payMetal1RecGsWtType; ?>').value = 'GM';
                                                            document.getElementById('<?php echo $payMetal1RecWtType; ?>').value = 'GM';
                                                            document.getElementById('<?php echo $payMetal1PktWtType; ?>').value = 'GM';
                                                            document.getElementById('<?php echo $payMetal1Indicator; ?>').value = 'rawMetal';
                                                            document.getElementById('<?php echo $payMetal1StockType; ?>').value = 'rawMetal';
                                                        } else if (document.getElementById('<?php echo $payMetalType1; ?>').value == 'crystal') {
                                                            document.getElementById('<?php echo $payMetal1MetalType; ?>').value = 'StockStone';
                                                            document.getElementById('<?php echo $payMetal1MetalDesc; ?>').value = 'STOCK STONE';
                                                            document.getElementById('<?php echo $payMetal1RecGsWtType; ?>').value = 'CT';
                                                            document.getElementById('<?php echo $payMetal1RecWtType; ?>').value = 'CT';
                                                            document.getElementById('<?php echo $payMetal1PktWtType; ?>').value = 'CT';
                                                            document.getElementById('<?php echo $payMetal1Indicator; ?>').value = 'crystal';
                                                            document.getElementById('<?php echo $payMetal1StockType; ?>').value = 'crystal';
                                                        }
                                            <?php } else { ?>
                                                        if (document.getElementById('<?php echo $payMetalType1; ?>').value == 'Gold') {
                                                            document.getElementById('<?php echo $payMetal1MetalType; ?>').value = 'OldGold';
                                                            document.getElementById('<?php echo $payMetal1MetalDesc; ?>').value = 'OLD GOLD';
                                                            document.getElementById('<?php echo $payMetal1RecGsWtType; ?>').value = 'GM';
                                                            document.getElementById('<?php echo $payMetal1RecWtType; ?>').value = 'GM';
                                                            document.getElementById('<?php echo $payMetal1PktWtType; ?>').value = 'GM';
                                                            document.getElementById('<?php echo $payMetal1Indicator; ?>').value = 'rawMetal';
                                                            document.getElementById('<?php echo $payMetal1StockType; ?>').value = 'rawMetal';
                                                        } else if (document.getElementById('<?php echo $payMetalType1; ?>').value == 'Silver') {
                                                            document.getElementById('<?php echo $payMetal1MetalType; ?>').value = 'OldSilver';
                                                            document.getElementById('<?php echo $payMetal1MetalDesc; ?>').value = 'OLD SILVER';
                                                            document.getElementById('<?php echo $payMetal1RecGsWtType; ?>').value = 'GM';
                                                            document.getElementById('<?php echo $payMetal1RecWtType; ?>').value = 'GM';
                                                            document.getElementById('<?php echo $payMetal1PktWtType; ?>').value = 'GM';
                                                            document.getElementById('<?php echo $payMetal1Indicator; ?>').value = 'rawMetal';
                                                            document.getElementById('<?php echo $payMetal1StockType; ?>').value = 'rawMetal';
                                                        } else if (document.getElementById('<?php echo $payMetalType1; ?>').value == 'crystal') {
                                                            document.getElementById('<?php echo $payMetal1MetalType; ?>').value = 'StockStone';
                                                            document.getElementById('<?php echo $payMetal1MetalDesc; ?>').value = 'STOCK STONE';
                                                            document.getElementById('<?php echo $payMetal1RecGsWtType; ?>').value = 'CT';
                                                            document.getElementById('<?php echo $payMetal1RecWtType; ?>').value = 'CT';
                                                            document.getElementById('<?php echo $payMetal1PktWtType; ?>').value = 'CT';
                                                            document.getElementById('<?php echo $payMetal1Indicator; ?>').value = 'crystal';
                                                            document.getElementById('<?php echo $payMetal1StockType; ?>').value = 'crystal';
                                                        }
                                                <?php
                                            }
                                        }
                                        ?>" 
                                        size="1"> 
                                            <?php
                                            $metTypeNew = array('Gold', 'Silver', 'Alloy', 'crystal');
                                            for ($i = 0; $i <= 3; $i++) {
                                                if ($metTypeNew[$i] == $rawMetType)
                                                    $optionRawMetalSel[$i] = 'selected';
                                            }
                                            ?>
                                    <option value="Gold" <?php echo $optionRawMetalSel[0]; ?>>GOLD</option>
                                    <option value="Silver" <?php echo $optionRawMetalSel[1]; ?>>SILVER</option>
                                    <option value="Alloy" <?php echo $optionRawMetalSel[2]; ?>>ALLOY</option>
                                    <?php
//                                    if ($payPanelName == 'ItemRepairPayUp' || $payPanelName == 'ItemRepairPayment' ||
//                                            $payPanelName == 'NewOrderPaymentUp' || $payPanelName == 'NewOrderPayment') {
                                    ?>
                                    <option value="crystal" <?php echo $optionRawMetalSel[3]; ?>>STONE</option>
                                    <?php //} ?>
<?php unset($optionRawMetalSel); ?>
                                </SELECT>
                            </td>
                            <!--<td align="left" width="78px" title="<?php echo $rawSelTitle; ?>">-->
<?php if ($rawMetType == 'Gold') { ?>
                            <input type="hidden" id="<?php echo $payRawGoldPreId; ?>" name="<?php echo $payRawGoldPreId; ?>" value="<?php echo $rawGdPreId; ?>">
                            <input type="hidden" id="<?php echo $payRawGoldPostId; ?>" name="<?php echo $payRawGoldPostId; ?>" value="<?php echo $rawGdPostId; ?>">
                            <input type="hidden" id="payRawMetalSelId<?php echo $metalCount; ?>" name="payRawMetalSelId<?php echo $metalCount; ?>" placeholder="RAW METAL" 
                                   value="<?php if ($rawGdPostId != '') echo $rawGdPreId . $rawGdPostId; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                                        clearDivision('rawMetalSelectDiv<?php echo $metalCount; ?>');
                                                        document.getElementById('<?php echo $payMetal1FirmId; ?>').focus();
                                                        return false;
                                                    } else if (event.keyCode == 8 && this.value == '') {
                                                        clearDivision('rawMetalSelectDiv<?php echo $metalCount; ?>');
                                                        document.getElementById('<?php echo $payMetalType1; ?>').focus();
                                                        return false;
                                                    }"
                                   <?php
                                   if ($payPanelName == 'StockPayment' || $payPanelName == 'StockPayUp' ||
                                           $payPanelName == 'CustSellPayment' || $payPanelName == 'CustSellPayUp' ||
                                           $payPanelName == 'RawPayment' || $payPanelName == 'SuppAddOrder' ||
                                           $payPanelName == 'InvoicePayment' || $payPanelName == 'NwOrDelPayment' ||
                                           $payPanelName == 'SuppOrderDelivery' || $payPanelName == 'CrySellPayment' ||
                                           $payPanelName == 'CrystalStockPayment' || $payPanelName == 'CrystalStockPayUp') {
                                       if ($checkRawGdPresent > 0) {
                                           ?>
                                           onclick="this.value = '';"
                                       <?php } ?>
                                       onkeyup ="<?php if ($checkRawGdPresent > 0) { ?>
                                                   if (event.keyCode != 8 && event.keyCode != 13) {
                                                       getRawMetalList(event.keyCode, '<?php echo $payPanelName; ?>', document.getElementById('<?php echo $payMetalType1; ?>').value, '<?php echo $rawPreId; ?>', '<?php echo $rawPostId; ?>',
                                                               'rawMetalSelectDiv<?php echo $metalCount; ?>', '<?php echo $metalCount; ?>');
                                                   }
                                       <?php } ?>"
                                       onblur="if (this.value == '') {
                                                   this.value = '<?php if ($rawGdPostId != '') echo $rawGdPreId . $rawGdPostId; ?>';
                                               }
                                               return false;"
    <?php } ?>
                                   autocomplete="off" spellcheck="false" class="input_border_red_center" size="8" maxlength="15" style="height:40px;"/>
                            <div id="rawMetalSelectDiv<?php echo $metalCount; ?>"></div>
<?php } else if ($rawMetType == 'Alloy') { ?>
                            <input type="hidden" id="<?php echo $payRawGoldPreId; ?>" name="<?php echo $payRawGoldPreId; ?>" value="<?php echo $rawAlPreId; ?>">
                            <input type="hidden" id="<?php echo $payRawGoldPostId; ?>" name="<?php echo $payRawGoldPostId; ?>" value="<?php echo $rawAlPostId; ?>">
                            <input type="hidden" id="payRawMetalSelId<?php echo $metalCount; ?>" name="payRawMetalSelId<?php echo $metalCount; ?>" placeholder="RAW METAL" 
                                   value="<?php if ($rawAlPostId != '') echo $rawAlPreId . $rawAlPostId; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                               clearDivision('rawMetalSelectDiv<?php echo $metalCount; ?>');
                                               document.getElementById('<?php echo $payMetal1FirmId; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               clearDivision('rawMetalSelectDiv<?php echo $metalCount; ?>');
                                               document.getElementById('<?php echo $payMetalType1; ?>').focus();
                                               return false;
                                           }"
                                   <?php
                                   if ($payPanelName == 'StockPayment' || $payPanelName == 'StockPayUp' || $payPanelName == 'CustSellPayment' || $payPanelName == 'CustSellPayUp' ||
                                           $payPanelName == 'RawPayment' || $payPanelName == 'SuppAddOrder' || $payPanelName == 'InvoicePayment' || $payPanelName == 'NwOrDelPayment' ||
                                           $payPanelName == 'NwOrPayment' || $payPanelName == 'SuppOrderDelivery' ||
                                           $payPanelName == 'CrystalStockPayment' || $payPanelName == 'CrystalStockPayUp') { //add code for PanelName For Payment:Author:SANT30NOV16****
                                       if ($checkRawGdPresent > 0) {
                                           ?>
                                           onclick="this.value = '';"
                                       <?php } ?>
                                       onkeyup ="<?php if ($checkRawGdPresent > 0) { ?>
                                                   if (event.keyCode != 8 && event.keyCode != 13) {
                                                       getRawMetalList(event.keyCode, '<?php echo $payPanelName; ?>', document.getElementById('<?php echo $payMetalType1; ?>').value, '<?php echo $rawPreId; ?>', '<?php echo $rawPostId; ?>',
                                                               'rawMetalSelectDiv<?php echo $metalCount; ?>', '<?php echo $metalCount; ?>');
                                                   }
                                       <?php } ?>"
                                       onblur="if (this.value == '') {
                                                   this.value = '<?php if ($rawAlPostId != '') echo $rawAlPreId . $rawAlPostId; ?>';
                                               }
                                               return false;"
    <?php } ?>
                                   autocomplete="off" spellcheck="false" class="input_border_red_center" size="8" maxlength="15" style="height:40px"/>
                            <div id="rawMetalSelectDiv<?php echo $metalCount; ?>"></div>
<?php } else { ?>
                            <input type="hidden" id="<?php echo $payRawGoldPreId; ?>" name="<?php echo $payRawGoldPreId; ?>" value="<?php echo $rawSlPreId; ?>">
                            <input type="hidden" id="<?php echo $payRawGoldPostId; ?>" name="<?php echo $payRawGoldPostId; ?>" value="<?php echo $rawSlPostId; ?>">
                            <input type="hidden" id="payRawMetalSelId<?php echo $metalCount; ?>" name="payRawMetalSelId<?php echo $metalCount; ?>" placeholder="RAW METAL"
                                   value="<?php if ($rawSlPostId != '') echo $rawSlPreId . $rawSlPostId; ?>"
                                   onkeydown="javascript: if (event.keyCode == 13) {
                                               clearDivision('rawMetalSelectDiv<?php echo $metalCount; ?>');
                                               document.getElementById('<?php echo $payMetal1FirmId; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               clearDivision('rawMetalSelectDiv<?php echo $metalCount; ?>');
                                               document.getElementById('<?php echo $payMetalType1; ?>').focus();
                                               return false;
                                           }"
                                   <?php
                                   if ($payPanelName == 'StockPayment' || $payPanelName == 'StockPayUp' ||
                                           $payPanelName == 'CustSellPayment' || $payPanelName == 'CustSellPayUp' ||
                                           $payPanelName == 'RawPayment' || $payPanelName == 'SuppAddOrder' ||
                                           $payPanelName == 'InvoicePayment' || $payPanelName == 'NwOrDelPayment' ||
                                           $payPanelName == 'SuppOrderDelivery' ||
                                           $payPanelName == 'CrystalStockPayment' || $payPanelName == 'CrystalStockPayUp') { //add code for PanelName For Payment:Author:SANT30NOV16****
                                       if ($checkRawSlPresent > 0) {
                                           ?>
                                           onclick="this.value = '';"
                                       <?php } ?>
                                       onkeyup ="<?php if ($checkRawSlPresent > 0) { ?>
                                                   if (event.keyCode != 8 && event.keyCode != 13) {
                                                       getRawMetalList(event.keyCode, '<?php echo $payPanelName; ?>', document.getElementById('<?php echo $payMetalType1; ?>').value, '<?php echo $rawPreId; ?>', '<?php echo $rawPostId; ?>',
                                                               'rawMetalSelectDiv<?php echo $metalCount; ?>', '<?php echo $metalCount; ?>');
                                                   }<?php } ?>"
                                       onblur="if (this.value == '') {
                                                   this.value = '<?php if ($rawSlPostId != '') echo $rawSlPreId . $rawSlPostId; ?>';
                                               }
                                               return false;"
    <?php } ?>
                                   autocomplete="off" spellcheck="false" class="input_border_red_center" size="8" maxlength="15" style="height:30px"/>
                            <div id="rawMetalSelectDiv<?php echo $metalCount; ?>"></div>
<?php } ?>
                        <!--</td>-->
                        <td align="center" width="8%">
                            <div id="payFirmDiv<?php echo $metalCount; ?>">
                                <?php
                                $selPayFirmId = $payMetal1FirmId;
                                $prevFieldId = $payMetalType1;
                                $nextFieldId = $payMetal1AccId;
                                if ($rawFirmId != '')
                                    $firmIdSelected = $rawFirmId;
                                else if ($firmIdSelected == '')
                                    $firmIdSelected = $firmId;
                                $panelName = $firmPanelName;
                                include 'omrwpyfr.php';
                                ?>
                            </div>
                        </td>
                        <td align="left" width="8%">
                            <?php
                            //acc name changed @OMMODTAG SHRI_10JAN16
                            //
                            //echo '$rawMetType == ' . $rawMetType . '<br />';
                            //echo '$rawAccId == '.$rawAccId.'<br />';
                            //
                            $prevFieldId = $payMetal1FirmId;
                            $nextFieldId = $payMetal1MetalType;
                            $selAccountId = $payMetal1AccId;
                            $selFirmId = $firmId;
                            $selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver','Stock (Inventory)'"; // for MYSQLI Query

                            if ($rawMetType == 'Silver') {
                                $accNameSelected = 'RAW Silver';
                            } else if ($rawMetType == 'crystal') {
                                $accNameSelected = 'Stock Stone';
                            } else if ($rawMetType == 'Gold') {
                                $accNameSelected = 'RAW Gold';
                            } else {
                                $accNameSelected = 'RAW Gold';
                            }

                            if ($payPanelName == 'suppPendingOrderUp' || $payPanelName == 'StockPayUp' ||
                                    $payPanelName == 'SellPayUp' ||
                                    $payPanelName == 'ItemRepairPayUp' ||
                                    $payPanelName == 'SellItemReturn' ||
                                    $payPanelName == 'ApprovalPayUp' ||
                                    $payPanelName == 'CustSellPayUp' || $payPanelName == 'NwOrPayUp' ||
                                    $payPanelName == 'NewOrderPaymentUp' ||
                                    $payPanelName == 'SuppOrderUp' || $payPanelName == 'CrystalStockPayUp' ||
                                    $payPanelName == 'CrySellPayUp') {

                                if ($rawMetType == 'Gold') {
                                    if ($rawAccId != '') {
                                        $selFirmId = $rawFirmId;
                                        $selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver','Stock (Inventory)'"; // for MYSQLI Query
                                        $accNameSelected = '';
                                        $accIdSelected = $rawAccId;
                                    } else {
                                        $accIdSelected = '';
                                        $accNameSelected = 'RAW Gold';
                                    }
                                }

                                if ($rawMetType == 'Silver') {
                                    if ($rawAccId != '') {
                                        $selFirmId = $rawFirmId;
                                        $selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver','Stock (Inventory)'"; // for MYSQLI Query
                                        $accNameSelected = '';
                                        $accIdSelected = $rawAccId;
                                    } else {
                                        $accIdSelected = '';
                                        $accNameSelected = "'RAW Silver'";
                                    }
                                }

                                if ($rawMetType == 'Alloy') {
                                    if ($rawAccId != '') {
                                        $selFirmId = $rawFirmId;
                                        $selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver','Stock (Inventory)'"; // for MYSQLI Query
                                        $accNameSelected = '';
                                        $accIdSelected = $rawAccId;
                                    } else {
                                        $accIdSelected = '';
                                        $accNameSelected = "'RAW Alloy'";
                                    }
                                }

                                if ($rawMetType == 'crystal') {
                                    if ($rawAccId != '') {
                                        $selFirmId = $rawFirmId;
                                        $selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver','Stock (Inventory)'"; // for MYSQLI Query
                                        $accNameSelected = '';
                                        $accIdSelected = $rawAccId;
                                    } else {
                                        $accIdSelected = '';
                                        $accNameSelected = "'Stock Stone'";
                                    }
                                }
                            } else {

                                if ($rawMetType == 'Silver') {
                                    $selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver','Stock (Inventory)'"; // for MYSQLI Query
                                    $accNameSelected = 'RAW Silver';
                                    $accIdSelected = '';
                                }

                                if ($rawMetType == 'Alloy') {
                                    $selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver','Stock (Inventory)'"; // for MYSQLI Query
                                    $accNameSelected = 'RAW Alloy';
                                    $accIdSelected = '';
                                }

                                if ($rawMetType == 'crystal') {
                                    $selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver','Stock (Inventory)'"; // for MYSQLI Query
                                    $accNameSelected = 'Stock Stone';
                                    $accIdSelected = '';
                                }

                                // ADDED CONDITION FOR GOLD STOCK @AUTHOR:MADHUREE-19JUNE2021
                                if ($rawMetType == 'Gold') {
                                    $selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver','Stock (Inventory)'"; // for MYSQLI Query
                                    $accNameSelected = 'RAW Gold';
                                    $accIdSelected = '';
                                }
                            }

                            $selAccountClass = 'input_border_red';

                            //echo '$accIdSelected %%== '. $accIdSelected . '<br />';
                            //echo '$payPanelName %%== '. $payPanelName . '<br />';
                            //echo '$itemMainPanel %%== '. $itemMainPanel . '<br />';

                            if (($payPanelName == 'StockPayment' || $payPanelName == 'SlPrPayment' ||
                                    $payPanelName == 'ItemRepairPayment' ||
                                    $payPanelName == 'ApprovalPayment' ||
                                    (($itemMainPanel == 'addByInv' && $payPanelName != 'StockPayUp') ||
                                    $itemMainPanel == 'addByItems')) ||
                                    $payPanelName == 'SuppAddOrder' || $payPanelName == 'InvoicePayment' ||
                                    $payPanelName == 'NwOrPayment' || $payPanelName == 'NwOrDelPayment' ||
                                    $payPanelName == 'SuppOrderDelivery' || $payPanelName == '' ||
                                    $payPanelName == 'CrystalStockPayment' || $payPanelName == 'CrystalStockPayUp') {
                                //
                                $accIdSelected = '';
                                //
                            }
                            //
                            //echo '$rawMetType @@== '. $rawMetType . '<br />';
                            //echo '$accIdSelected @@== '. $accIdSelected . '<br />';
                            //echo '$accNameSelected @@== '. $accNameSelected . '<br />';
                            //
                            include 'omacsalt.php';
                            //
                            ?>
                        </td>
                        <td align="center" width="7%" style="position:relative">
                            <?php
                            //
                            if ($payPanelName != 'StockPayUp' &&
                                    $payPanelName != 'SellPayUp' &&
                                    $payPanelName != 'ItemRepairPayUp' &&
                                    $payPanelName != 'ApprovalPayUp' &&
                                    $payPanelName != 'CustSellPayUp' &&
                                    $payPanelName != 'NwOrPayUp' &&
                                    $payPanelName != 'RawPayUp' &&
                                    $payPanelName != 'ItemRepairPayUp' &&
                                    $payPanelName != 'NewOrderPaymentUp') {

                                if ($UserType != 'CUSTOMER') {

                                    if ($rawMetType == 'Gold') {
                                        $rawMetalDesc = 'RawGold';
                                        $rawMetName = 'RAW GOLD';
                                    }

                                    if ($rawMetType == 'Silver') {
                                        $rawMetalDesc = 'RawSilver';
                                        $rawMetName = 'RAW SILVER';
                                    }

                                    if ($rawMetType == 'crystal') {
                                        $rawMetalDesc = 'StockStone';
                                        $rawMetName = 'STOCK STONE';
                                    }
                                } else {

                                    if ($rawMetType == 'Gold') {
                                        $rawMetalDesc = 'OldGold';
                                        $rawMetName = 'OLD GOLD';
                                    }

                                    if ($rawMetType == 'Silver') {
                                        $rawMetalDesc = 'OldSilver';
                                        $rawMetName = 'OLD SILVER';
                                    }

                                    if ($rawMetType == 'crystal') {
                                        $rawMetalDesc = 'StockStone';
                                        $rawMetName = 'STOCK STONE';
                                    }
                                }

                                if ($rawMetType == 'Alloy') {
                                    $rawMetalDesc = 'Alloy';
                                    $rawMetName = 'ALLOY';
                                }
                            }
                            //
                            ?>                            
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Code for Category Google Suggestion @PRIYANKA-14JUNE21
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            $inputId = $payMetal1MetalType;
                            $inputName = $payMetal1MetalType;
                            $inputFieldNextId = $payMetal1MetalDesc;
                            $inputFieldPrevId = $payMetal1AccId;
                            //
                            $inputFieldValue = $rawMetalDesc;
                            //
                            //$requiredField = 'Y';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'input_border_grey_center';
                            //
                            if ($inputStyle === '' || $inputStyle === NULL) {
                                $inputStyle = 'width:100%;height:40px;';
                            }
                            //
                            $inputLabel = ''; // Display Label below the text box
                            // 
                            $inputTitle = 'CATEGORY';
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            //
                            $inputPlaceHolder = 'CATEGORY';
                            //
                            $inputLabelDivText = '';
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            // $isAlphaOnly = 'Y';
                            //
                            // Event Options
                            //
                            // On Change Function
                            $inputGoogleSuggDivId = $inputId . '_google_div' . $prodMergedCount;
                            $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
                            $selectDropdownClass = 'googleSuggestionDivClass';
                            $inputOnBlurFun = 'googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '"); ';
                            //
                            //
                            $inputKeyUpFun = " if (document.getElementById('$payMetalType1').value == 'Gold') { "
                                    . " var googleWhereCondColumns = 'AND (sttr_metal_type=\'' + 'Gold' + '\'' + ' OR ' + 'sttr_metal_type=\'' + 'GOLD' + '\'' + ' OR ' + 'sttr_metal_type=\'' + 'gold' + '\'' + ' ) AND ' + 'sttr_indicator=\'' + document.getElementById('$payMetal1Indicator').value + '\''; "
                                    . " } else if (document.getElementById('$payMetalType1').value == 'Silver') { "
                                    . " var googleWhereCondColumns = 'AND (sttr_metal_type=\'' + 'Silver' + '\'' + ' OR ' + 'sttr_metal_type=\'' + 'SILVER' + '\'' + ' OR ' + 'sttr_metal_type=\'' + 'silver' + '\'' + ' ) AND ' + 'sttr_indicator=\'' + document.getElementById('$payMetal1Indicator').value + '\''; "
                                    . " } else if (document.getElementById('$payMetalType1').value == 'crystal') { "
                                    . " var googleWhereCondColumns = 'AND (sttr_metal_type=\'' + 'Crystal' + '\'' + ' OR ' + 'sttr_metal_type=\'' + 'CRYSTAL' + '\'' + ' OR ' + 'sttr_metal_type=\'' + 'crystal' + '\'' + ' ) AND ' + 'sttr_indicator=\'' + document.getElementById('$payMetal1Indicator').value + '\''; "
                                    . " } "
                                    . " googleSuggestionDropdown('stock_transaction', 'sttr_item_category', this.value, googleWhereCondColumns, '$inputId', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId');";
                            //
                            $inputKeyDownFun = '';
                            $inputOnDoubleClickFun = 'this.value = "";';
                            $inputOnChange = '';
                            $inputOnInput = '';
                            $inputOnClickFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            // 
                            //* **************************************************************************************
                            //* End Code for Category Google Suggestion @PRIYANKA-14JUNE21
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                            //
                            ?>       
                        </td>

                        <td align="center" width="8%">
                            <?php
                            //
                            //* **************************************************************************************
                            //* Start Code for Name Google Suggestion @PRIYANKA-14JUNE21
                            //* **************************************************************************************
                            // // This is the main division class for input filed
                            //
                            // Input Box Type and Ids
                            $inputType = 'text';
                            $inputId = $payMetal1MetalDesc;
                            $inputName = $payMetal1MetalDesc;
                            $inputFieldNextId = $payMetal1RecGsWt;
                            $inputFieldPrevId = $payMetal1MetalType;
                            //
                            $inputFieldValue = $rawMetName;
                            //
                            //$requiredField = 'Y';
                            //
                            // This is the main class for input flied
                            $inputFieldClass = 'input_border_grey_center';
                            //
                            if ($inputStyle === '' || $inputStyle === NULL) {
                                $inputStyle = 'width:100%;height:40px;';
                            }
                            //
                            $inputLabel = ''; // Display Label below the text box
                            // 
                            $inputTitle = 'NAME';
                            //
                            // This class is for Pencil Icon                                                           
                            $inputIconClass = '';
                            // 
                            // Place Holder inside input box
                            //
                            $inputPlaceHolder = 'NAME';
                            //
                            $inputLabelDivText = '';
                            //
                            // Place Holder in span outside input box
                            $spanPlaceHolderClass = '';
                            $spanPlaceHolder = '';
                            // 
                            // $isAlphaOnly = 'Y';
                            //
                            // Event Options
                            //
                            // On Change Function
                            $inputGoogleSuggDivId = $inputId . '_google_div' . $prodMergedCount;
                            $inputGoogleSuggDivClass = 'googleSuggestionDropdownDivClass';
                            $selectDropdownClass = 'googleSuggestionDivClass';
                            $inputOnBlurFun = 'googleSuggestionDropdownBlank("' . $inputGoogleSuggDivId . '"); ';
                            //
                            $inputKeyUpFun = "var googleWhereCondColumns = 'AND sttr_item_category=\'' + document.getElementById('$payMetal1MetalType').value + '\'' + ' AND ' + 'sttr_metal_type=\'' + document.getElementById('$payMetalType1').value + '\'' + ' AND ' + 'sttr_indicator=\'' + document.getElementById('$payMetal1Indicator').value + '\''; "
                                    . " googleSuggestionDropdown('stock_transaction', 'sttr_item_name', this.value, googleWhereCondColumns, '$inputId', '$selectDropdownClass', event.keyCode, '$inputGoogleSuggDivId', '$inputGoogleSuggDivId');";
                            //
                            $inputKeyDownFun = '';
                            $inputOnDoubleClickFun = 'this.value = "";';
                            $inputOnChange = '';
                            $inputOnInput = '';
                            $inputOnClickFun = '';
                            $inputDropDownCls = '';               // This is the main division class for drop down 
                            $inputselDropDownCls = '';            // This is class for selection in drop down
                            $inputMainClassButton = '';           // This is the main division for Button
                            // 
                            // 
                            //* **************************************************************************************
                            //* End Code for Name Google Suggestion @PRIYANKA-14JUNE21
                            //* **************************************************************************************
                            include $_SESSION['documentRootIncludePhp'] . '/formInputField/omInputField.php';
                            //
                            ?>                            
                        </td>

                        <?php
                        //echo '$payMetal1RecGsWt == ' . $payMetal1RecGsWt . '<br/>';
                        //echo '$payMetal1RecGsWtType == ' . $payMetal1RecGsWtType . '<br/>';
                        ?>

                        <!-- START CODE FOR LESS WEIGHT FUNCTIONALITY ON METAL REC/PAID @PRIYANKA-16MAR2019 -->
                        <td colspan="2" width="7%">
                            <table border="0" cellspacing="2" cellpadding="0" width="100%" align="center">
                                <td class="itemAddPnLabels14" align="left"  width="60%">
                                    <input type="hidden" id="<?php echo $payMetal1RecGsWtHidden; ?>" name="<?php echo $payMetal1RecGsWtHidden; ?>" 
                                           value="<?php echo $invRecGsWT; ?>" />
                                    <input id="<?php echo $payMetal1RecGsWt; ?>" 
                                           name="<?php echo $payMetal1RecGsWt; ?>" style="width:100%;height:40px;"
                                           type="text" placeholder="GS WT" value="<?php echo $invRecGsWT; ?>"
                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                       document.getElementById('<?php echo $payMetal1RecGsWtType; ?>').focus();
                                                       return false;
                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                       document.getElementById('<?php echo $payMetal1MetalDesc; ?>').focus();
                                                       document.getElementById('<?php echo $payMetal1MetalDesc; ?>').setSelectionRange(document.getElementById('<?php echo $payMetal1MetalDesc; ?>').value.length,document.getElementById('<?php echo $payMetal1MetalDesc; ?>').value.length);
                                                       return false;
                                                   }"
                                           onclick="document.getElementById('<?php echo $payMetal1RecGsWtHidden; ?>').value = this.value;
                                                   this.value = '';"   
                                           onblur="if (this.value == '' || this.value == null) {
                                                       this.value = document.getElementById('<?php echo $payMetal1RecGsWtHidden; ?>').value;
                                                   }
                                           <?php if ($rawMetType == 'crystal') { ?>
                                                       document.getElementById('<?php echo $payMetal1RecWt; ?>').value = this.value;
                                                       document.getElementById('<?php echo $payMetal1RecWtType; ?>').value = document.getElementById('<?php echo $payMetal1RecGsWtType; ?>').value;
                                           <?php } ?>
                                                   calDiscountAmt('<?php echo $prefix; ?>');
                                                   calcStockItemBalance();
                                                   if(document.getElementById('<?php echo $payMetal1Tunch; ?>').value != ''){
                                                       calculateFinalFineWt('<?php echo $metalCount; ?>');
                                                   }
                                                   return false;"
                                           onchange="
                                           <?php if ($rawMetType == 'crystal') { ?>
                                                       document.getElementById('<?php echo $payMetal1RecWtType; ?>').value = document.getElementById('<?php echo $payMetal1RecGsWtType; ?>').value;
                                           <?php } ?>
                                                   calDiscountAmt('<?php echo $prefix; ?>');
                                                   calcStockItemBalance();
                                                   if(document.getElementById('<?php echo $payMetal1Tunch; ?>').value != ''){
                                                       calculateFinalFineWt('<?php echo $metalCount; ?>');
                                                   }
                                                   return false;"
                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                           autocomplete="off" spellcheck="false" class="input_border_grey_center" 
                                           size="5" maxlength="15" style="height:40px;"/>
                                </td>
                                <td class="itemAddPnLabels14" width="40%">
                                    <div class="floatRight" style="width:100%">
                                        <select id="<?php echo $payMetal1RecGsWtType; ?>" 
                                                name="<?php echo $payMetal1RecGsWtType; ?>"
                                                 
                                                onkeydown="javascript: if (event.keyCode == 13) {
                                                            //document.getElementById('sttr_nt_weigh1').focus();
                                                            //document.getElementById('sttr_nt_weight1').value = '';
                                                            document.getElementById('<?php echo $payMetal1RecWt; ?>').focus();
                                                            document.getElementById('<?php echo $payMetal1RecWt; ?>').value = '';                       
                                                            return false;
                                                        } else if (event.keyCode == 8) {
                                                            document.getElementById('<?php echo $payMetal1RecGsWt; ?>').focus();
                                                            return false;
                                                        }"
                                                onchange="checkWeight(document.getElementById('<?php echo $payRawGoldPreId; ?>').value, document.getElementById('<?php echo $payRawGoldPostId; ?>').value,
                                                                document.getElementById('<?php echo $payMetal1RecWt; ?>').value, document.getElementById('<?php echo $payMetal1RecWtType; ?>').value,
                                                                document.getElementById('payPanelName').value, '<?php echo $rawSlStatus; ?>');
                                                        javascript:
                                                                if (document.getElementById('<?php echo $payMetal1RecWt; ?>').value != '') {
                                                <?php if ($rawMetType == 'crystal') { ?>
                                                                document.getElementById('<?php echo $payMetal1RecWtType; ?>').value = this.value;
                                                <?php } ?>
                                                            calDiscountAmt('<?php echo $prefix; ?>');
                                                            calcStockItemBalance();
                                                            return false;

                                                        }"
                                                class="input_border_grey" style="width:100%;height:40px;">
                                                    <?php
                                                    //
                                                    //echo '$payPanelName=='.$payPanelName;
                                                    //
                                                    if ($payPanelName == 'StockPayUp' || $payPanelName == 'SellPayUp' ||
                                                            $payPanelName == 'ItemRepairPayUp' ||
                                                            $payPanelName == 'ApprovalPayUp' ||
                                                            $payPanelName == 'SellItemReturn' ||
                                                            $payPanelName == 'CustSellPayUp' ||
                                                            $payPanelName == 'NwOrPayUp' || $payPanelName == 'RawPayUp' ||
                                                            $payPanelName == 'CrystalStockPayUp' || $payPanelName == 'CrySellPayUp' ||
                                                            $payPanelName == 'CrySellPayment' || $payPanelName == 'CrystalStockPayment') {
                                                        //
                                                        //echo '$payPanelName==2=='.$payPanelName;
                                                        //
                                                        $payPanelGdRecWT = array(KG, GM, MG, CT);

                                                        if ($invRecGsWType != '' && $invRecGsWType != null) {
                                                            for ($i = 0; $i <= 3; $i++)
                                                                if ($payPanelGdRecWT[$i] == $invRecGsWType)
                                                                    $payPanelGdRecWTSel[$i] = 'selected';
                                                        } else {
                                                            $payPanelGdRecWTSel[1] = 'selected';
                                                        }
                                                        ?>
                                                <option value="KG" <?php echo $payPanelGdRecWTSel[0]; ?>>KG</option>
                                                <option value="GM" <?php echo $payPanelGdRecWTSel[1]; ?>>GM</option>
                                                <option value="MG" <?php echo $payPanelGdRecWTSel[2]; ?>>MG</option>
                                                <option value="CT" <?php echo $payPanelGdRecWTSel[3]; ?>>CT</option>
                                                <?php
                                                //
                                                unset($payPanelGdRecWTSel);
                                                //
                                                //$payPanelGdRecWTSel = '';
                                                //
                                            } else {
                                                //
                                                if ($rawMetType == 'crystal') {
                                                    ?>
                                                    <option value="KG">KG</option>
                                                    <option value="GM">GM</option>
                                                    <option value="MG">MG</option>
                                                    <option value="CT" selected>CT</option>
    <?php } else { ?>
                                                    <option value="KG">KG</option>
                                                    <option value="GM" selected>GM</option>
                                                    <option value="MG">MG</option>
                                                    <option value="CT">CT</option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </table>
                        </td>
                        <?php
                        //echo '$rawMetType'.$rawMetType; 
//                        START CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021
                        ?>
<?php if ($rawMetType == 'crystal') { ?>
                            <td colspan="2" width="8%">
                                <table border="0" cellspacing="1" cellpadding="0" width="100%">
                                    <td class="itemAddPnLabels14" align="left"  width="60%">
                                        <input type="hidden" id="<?php echo $payMetal1FFnWt; ?>" name="<?php echo $payMetal1FFnWt; ?>" 
                                               value="<?php echo $invRecFFNWT; ?>" />
                                        <input type="hidden" id="<?php echo $payMetal1PktWtHidden; ?>" name="<?php echo $payMetal1PktWtHidden; ?>" 
                                               value="<?php echo $invPktWT; ?>" />
                                        <input type="hidden" id="<?php echo $payMetal1PktWeightHidden; ?>" name="<?php echo $payMetal1PktWeightHidden; ?>" 
                                               value="<?php echo $invPktWT; ?>" />
                                        <input id="<?php echo $payMetal1PktWt; ?>" name="<?php echo $payMetal1PktWt; ?>"
                                               type="text" placeholder="LESS WT" value="<?php echo $invPktWT; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('<?php echo $payMetal1PktWtType; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8) {
                                                           document.getElementById('<?php echo $payMetal1RecGsWtType; ?>').focus();
                                                           return false;
                                                       }"
                                               onclick="document.getElementById('<?php echo $payMetal1PktWtHidden; ?>').value = this.value;
                                                       this.value = '';"   
                                               onblur="if (this.value == '' || this.value == null) {
                                                           this.value = document.getElementById('<?php echo $payMetal1PktWtHidden; ?>').value;
                                                       }
                                                       calDiscountAmt('<?php echo $prefix; ?>');
                                                       calcStockItemBalance();
                                                       return false;"
                                               onchange="calDiscountAmt('<?php echo $prefix; ?>');
                                                       calcStockItemBalance();
                                                       return false;"
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                               autocomplete="off" spellcheck="false" class="input_border_grey_center" 
                                               size="5" maxlength="15" style="background-color:lightgrey;width:100%;height:40px;" readonly/>
                                    </td>
                                    <td class="itemAddPnLabels14" width="40%">
                                        <div class="floatRight" style="width:100%">
                                            <select id="<?php echo $payMetal1PktWtType; ?>" 
                                                    name="<?php echo $payMetal1PktWtType; ?>" 
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('<?php echo $payMetal1RecWt; ?>').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('<?php echo $payMetal1PktWt; ?>').focus();
                                                                return false;
                                                            }"
                                                    onchange="
                                                            checkWeight(document.getElementById('<?php echo $payRawGoldPreId; ?>').value, document.getElementById('<?php echo $payRawGoldPostId; ?>').value,
                                                                    document.getElementById('<?php echo $payMetal1RecWt; ?>').value, document.getElementById('<?php echo $payMetal1RecWtType; ?>').value,
                                                                    document.getElementById('payPanelName').value, '<?php echo $rawSlStatus; ?>');
                                                            javascript:

                                                                    if (document.getElementById('<?php echo $payMetal1RecWt; ?>').value != '') {

                                                                calDiscountAmt('<?php echo $prefix; ?>');
                                                                calcStockItemBalance();
                                                                return false;

                                                            }"
                                                    class="input_border_grey" style="background-color:lightgray;width:100%;height:40px;" readonly>
                                                        <?php
                                                        if ($payPanelName == 'StockPayUp' || $payPanelName == 'SellPayUp' ||
                                                                $payPanelName == 'ItemRepairPayUp' ||
                                                                $payPanelName == 'ApprovalPayUp' ||
                                                                $payPanelName == 'SellItemReturn' ||
                                                                $payPanelName == 'CustSellPayUp' ||
                                                                $payPanelName == 'NwOrPayUp' || $payPanelName == 'RawPayUp' ||
                                                                $payPanelName == 'CrystalStockPayUp' || $payPanelName == 'CrySellPayUp' ||
                                                                $payPanelName == 'CrystalStockPayment' || $payPanelName == 'CrySellPayment') {

                                                            $payPanelGdRecWT = array(KG, GM, MG, CT);

                                                            if ($invPktWType != '' && $invPktWType != null) {
                                                                for ($i = 0; $i <= 3; $i++)
                                                                    if ($payPanelGdRecWT[$i] == $invPktWType)
                                                                        $payPanelGdRecWTSel[$i] = 'selected';
                                                            } else {
                                                                $payPanelGdRecWTSel[1] = 'selected';
                                                            }
//                                                        echo '<br />$invPktWType=' . $invPktWType;
//                                                        echo '<br />$payPanelGdRecWTSel=' . $payPanelGdRecWTSel[1];
                                                            ?>
                                                    <option value="KG" <?php echo $payPanelGdRecWTSel[0]; ?>>KG</option>
                                                    <option value="GM" <?php echo $payPanelGdRecWTSel[1]; ?>>GM</option>
                                                    <option value="MG" <?php echo $payPanelGdRecWTSel[2]; ?>>MG</option>
                                                    <option value="CT" <?php echo $payPanelGdRecWTSel[3]; ?>>CT</option>
                                                    <?php
                                                    unset($payPanelGdRecWTSel);
                                                } else {
                                                    //
                                                    if ($rawMetType == 'crystal') {
                                                        ?>
                                                        <option value="KG">KG</option>
                                                        <option value="GM">GM</option>
                                                        <option value="MG">MG</option>
                                                        <option value="CT" selected>CT</option>
        <?php } else { ?>
                                                        <option value="KG">KG</option>
                                                        <option value="GM" selected>GM</option>
                                                        <option value="MG">MG</option>
                                                        <option value="CT">CT</option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </td>
                                </table>
                            </td>
                            <!-- END CODE FOR LESS WEIGHT FUNCTIONALITY ON METAL REC/PAID @PRIYANKA-16MAR2019 -->

                            <td colspan="2" width="8%">
                                <table border="0" cellspacing="1" cellpadding="0" width="100%">
                                    <td class="itemAddPnLabels14" align="left"  width="60%">
                                        <input id="<?php echo $payMetal1RecWt; ?>" name="<?php echo $payMetal1RecWt; ?>" 
                                               type="text" placeholder="NT WT" value="<?php echo $invRecWT; ?>" style="width:100%;height:40px;background-color:lightgrey;"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('<?php echo $payMetal1RecWtType; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('<?php echo $payMetal1PktWtType; ?>').focus();
                                                           return false;
                                                       }"
                                               onchange="calDiscountAmt('<?php echo $prefix; ?>');
                                                       calcStockItemBalance();
                                                       return false;"
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                               autocomplete="off" spellcheck="false" class="input_border_grey_center" size="5" maxlength="15" readonly/>
                                    </td>
                                    <td class="itemAddPnLabels14" width="40%">
                                        <div class="floatRight" style="width:100%">
                                            <select id="<?php echo $payMetal1RecWtType; ?>" name="<?php echo $payMetal1RecWtType; ?>" 
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('<?php echo $payMetal1Tunch; ?>').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('<?php echo $payMetal1RecWt; ?>').focus();
                                                                return false;
                                                            }"
                                                    onchange="
                                                            checkWeight(document.getElementById('<?php echo $payRawGoldPreId; ?>').value, document.getElementById('<?php echo $payRawGoldPostId; ?>').value,
                                                                    document.getElementById('<?php echo $payMetal1RecWt; ?>').value, document.getElementById('<?php echo $payMetal1RecWtType; ?>').value,
                                                                    document.getElementById('payPanelName').value, '<?php echo $rawSlStatus; ?>');
                                                            javascript:

                                                                    if (document.getElementById('<?php echo $payMetal1RecWt; ?>').value != '') {

                                                                calDiscountAmt('<?php echo $prefix; ?>');
                                                                calcStockItemBalance();
                                                                return false;

                                                            }"
                                                    class="input_border_grey" style="background-color:lightgrey;width:100%;height:40px;" readonly>
                                                        <?php
                                                        if ($payPanelName == 'StockPayUp' || $payPanelName == 'SellPayUp' ||
                                                                $payPanelName == 'ItemRepairPayUp' ||
                                                                $payPanelName == 'ApprovalPayUp' ||
                                                                $payPanelName == 'SellItemReturn' ||
                                                                $payPanelName == 'CustSellPayUp' ||
                                                                $payPanelName == 'NwOrPayUp' ||
                                                                $payPanelName == 'RawPayUp' || $payPanelName == 'CrystalStockPayUp' ||
                                                                $payPanelName == 'CrySellPayUp' || $payPanelName == 'CrystalStockPayment' ||
                                                                $payPanelName == 'CrySellPayment') {
                                                            $payPanelGdRecWT = array(KG, GM, MG, CT);

                                                            if ($invRecWType != '' && $invRecWType != null) {
                                                                for ($i = 0; $i <= 3; $i++)
                                                                    if ($payPanelGdRecWT[$i] == $invRecWType)
                                                                        $payPanelGdRecWTSel[$i] = 'selected';
                                                            } else {
                                                                $payPanelGdRecWTSel[1] = 'selected';
                                                            }
                                                            ?>
                                                    <option value="KG"<?php echo $payPanelGdRecWTSel[0]; ?>>KG</option>
                                                    <option value="GM"<?php echo $payPanelGdRecWTSel[1]; ?>>GM</option>
                                                    <option value="MG"<?php echo $payPanelGdRecWTSel[2]; ?>>MG</option>
                                                    <option value="CT"<?php echo $payPanelGdRecWTSel[3]; ?>>CT</option>
                                                    <?php
                                                    unset($payPanelGdRecWTSel);
                                                } else {
                                                    //
                                                    if ($rawMetType == 'crystal') {
                                                        ?>
                                                        <option value="KG">KG</option>
                                                        <option value="GM">GM</option>
                                                        <option value="MG">MG</option>
                                                        <option value="CT" selected>CT</option>
        <?php } else { ?>
                                                        <option value="KG">KG</option>
                                                        <option value="GM" selected>GM</option>
                                                        <option value="MG">MG</option>
                                                        <option value="CT">CT</option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </td>
                                </table>
                            </td>


                            <td align="center" width="5%">
                                <input id="<?php echo $payMetal1Tunch; ?>" name="<?php echo $payMetal1Tunch; ?>" type="text" 
                                       placeholder="TUNCH" value="<?php echo $invRecPurity; ?>" style="width:100%;height:40px;background-color:lightgrey;"
                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                   document.getElementById('<?php echo $payMetal1Rate; ?>').focus();
                                                   document.getElementById('<?php echo $payMetal1Rate; ?>').setSelectionRange(document.getElementById('<?php echo $payMetal1Rate; ?>').value.length,document.getElementById('<?php echo $payMetal1Rate; ?>').value.length);
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('<?php echo $payMetal1RecWtType; ?>').focus();
                                                   return false;
                                               }"
                                       onchange="calDiscountAmt('<?php echo $prefix; ?>');
                                               calcStockItemBalance();
                                               return false;"

                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                       autocomplete="off" spellcheck="false" class="input_border_grey_center" size="3" maxlength="10" readonly/>
                            </td>
                            <td align="left" class="itemAddPnLabels14" width="7%">
                                <input id="<?php echo $payMetal1FnWt; ?>" name="<?php echo $payMetal1FnWt; ?>" 
                                       type="text" placeholder="FN WT" value="<?php echo $invRecFNWT; ?>" style="width:100%;height:40px;background-color:lightgrey;"
                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                   document.getElementById('<?php echo $payMetal1Rate; ?>').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('<?php echo $payMetal1Tunch; ?>').focus();
                                                   return false;
                                               }"
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                       autocomplete="off" spellcheck="false" class="input_border_grey_center" 
                                       size="6" maxlength="12" readonly="true"/>
                            </td>
                        <?php } else {
                            ?>
                            <td colspan="2" width="8%">
                                <table border="0" cellspacing="1" cellpadding="0" width="100%">
                                    <td class="itemAddPnLabels14" align="left"  width="60%">
                                        <input type="hidden" id="<?php echo $payMetal1PktWtHidden; ?>" name="<?php echo $payMetal1PktWtHidden; ?>" 
                                               value="<?php echo $invPktWT; ?>" />
                                        <input type="hidden" id="<?php echo $payMetal1PktWeightHidden; ?>" name="<?php echo $payMetal1PktWeightHidden; ?>" 
                                               value="<?php echo $invPktWT; ?>" />
                                        <input id="<?php echo $payMetal1PktWt; ?>" name="<?php echo $payMetal1PktWt; ?>" 
                                               type="text" placeholder="LESS WT" value="<?php echo $invPktWT; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('<?php echo $payMetal1PktWtType; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('<?php echo $payMetal1RecGsWtType; ?>').focus();
                                                           return false;
                                                       }"
                                               onclick="document.getElementById('<?php echo $payMetal1PktWtHidden; ?>').value = this.value;
                                                       this.value = '';"   
                                               onblur="if (this.value == '' || this.value == null) {
                                                           this.value = document.getElementById('<?php echo $payMetal1PktWtHidden; ?>').value;
                                                       }
                                                       calDiscountAmt('<?php echo $prefix; ?>');
                                                       calcStockItemBalance();
                                                       return false;"
                                               onchange="document.getElementById('<?php echo $payMetal1PktWeightHidden; ?>').value = this.value;
                                                       calDiscountAmt('<?php echo $prefix; ?>');
                                                       calcStockItemBalance();
                                                       return false;"
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                               autocomplete="off" spellcheck="false" class="input_border_grey_center" 
                                               size="5" maxlength="15" style="width:100%;height:40px;"/>
                                    </td>
                                    <td class="itemAddPnLabels14" width="40%">
                                        <div class="floatRight" style="width:100%;">
                                            <select id="<?php echo $payMetal1PktWtType; ?>" 
                                                    name="<?php echo $payMetal1PktWtType; ?>" 
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('<?php echo $payMetal1RecWt; ?>').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('<?php echo $payMetal1PktWt; ?>').focus();
                                                                return false;
                                                            }"
                                                    onchange="
                                                            checkWeight(document.getElementById('<?php echo $payRawGoldPreId; ?>').value, document.getElementById('<?php echo $payRawGoldPostId; ?>').value,
                                                                    document.getElementById('<?php echo $payMetal1RecWt; ?>').value, document.getElementById('<?php echo $payMetal1RecWtType; ?>').value,
                                                                    document.getElementById('payPanelName').value, '<?php echo $rawSlStatus; ?>');
                                                            javascript:

                                                                    if (document.getElementById('<?php echo $payMetal1RecWt; ?>').value != '') {

                                                                calDiscountAmt('<?php echo $prefix; ?>');
                                                                calcStockItemBalance();
                                                                return false;

                                                            }"
                                                    class="input_border_grey" style="width:100%;height:40px;">
                                                        <?php
                                                        if ($payPanelName == 'StockPayUp' || $payPanelName == 'SellPayUp' ||
                                                                $payPanelName == 'ItemRepairPayUp' ||
                                                                $payPanelName == 'ApprovalPayUp' ||
                                                                $payPanelName == 'SellItemReturn' ||
                                                                $payPanelName == 'CustSellPayUp' ||
                                                                $payPanelName == 'NwOrPayUp' || $payPanelName == 'RawPayUp' ||
                                                                $payPanelName == 'CrystalStockPayUp' || $payPanelName == 'CrySellPayUp' ||
                                                                $payPanelName == 'CrystalStockPayment' || $payPanelName == 'CrySellPayment') {

                                                            $payPanelGdRecWT = array(KG, GM, MG);

                                                            if ($invPktWType != '' && $invPktWType != null) {
                                                                for ($i = 0; $i <= 2; $i++)
                                                                    if ($payPanelGdRecWT[$i] == $invPktWType)
                                                                        $payPanelGdRecWTSel[$i] = 'selected';
                                                            } else {
                                                                $payPanelGdRecWTSel[1] = 'selected';
                                                            }
                                                            //echo '<br />$invPktWType=' . $invPktWType;
                                                            //echo '<br />$payPanelGdRecWTSel=' . $payPanelGdRecWTSel[1];
                                                            ?>
                                                    <option value="KG" <?php echo $payPanelGdRecWTSel[0]; ?>>KG</option>
                                                    <option value="GM" <?php echo $payPanelGdRecWTSel[1]; ?>>GM</option>
                                                    <option value="MG" <?php echo $payPanelGdRecWTSel[2]; ?>>MG</option>
                                                    <?php
                                                    unset($payPanelGdRecWTSel);
                                                } else {
                                                    ?>
                                                    <option value="KG">KG</option>
                                                    <option value="GM" selected>GM</option>
                                                    <option value="MG">MG</option>
    <?php } ?>
                                            </select>
                                        </div>
                                    </td>
                                </table>
                            </td>
                            <!-- END CODE FOR LESS WEIGHT FUNCTIONALITY ON METAL REC/PAID @PRIYANKA-16MAR2019 -->

                            <td colspan="2" width="8%">
                                <table border="0" cellspacing="1" cellpadding="0" width="100%">
                                    <td class="itemAddPnLabels14" align="left"  width="60%">
                                        <input id="<?php echo $payMetal1RecWt; ?>" name="<?php echo $payMetal1RecWt; ?>" 
                                               type="text" placeholder="NT WT" value="<?php echo $invRecWT; ?>" style="width:100%;height:40px;"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('<?php echo $payMetal1RecWtType; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           //document.getElementById('$payMetal1RecGsWtType').focus();
                                                           document.getElementById('<?php echo $payMetal1RecGsWtType; ?>').focus();
                                                           return false;
                                                       }"
                                               onchange="calDiscountAmt('<?php echo $prefix; ?>');
                                                       calcStockItemBalance();
                                                       return false;"
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                               autocomplete="off" spellcheck="false" class="input_border_grey_center" size="5" maxlength="15"/>
                                    </td>
                                    <td class="itemAddPnLabels14" width="40%">
                                        <div class="floatRight" style="width:100%">
                                            <select id="<?php echo $payMetal1RecWtType; ?>" name="<?php echo $payMetal1RecWtType; ?>" 
                                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                                document.getElementById('<?php echo $payMetal1Tunch; ?>').focus();
                                                                return false;
                                                            } else if (event.keyCode == 8) {
                                                                document.getElementById('<?php echo $payMetal1RecWt; ?>').focus();
                                                                return false;
                                                            }"
                                                    onchange="
                                                            checkWeight(document.getElementById('<?php echo $payRawGoldPreId; ?>').value, document.getElementById('<?php echo $payRawGoldPostId; ?>').value,
                                                                    document.getElementById('<?php echo $payMetal1RecWt; ?>').value, document.getElementById('<?php echo $payMetal1RecWtType; ?>').value,
                                                                    document.getElementById('payPanelName').value, '<?php echo $rawSlStatus; ?>');
                                                            javascript:

                                                                    if (document.getElementById('<?php echo $payMetal1RecWt; ?>').value != '') {

                                                                calDiscountAmt('<?php echo $prefix; ?>');
                                                                calcStockItemBalance();
                                                                return false;

                                                            }"
                                                    class="input_border_grey" style="width:100%;height:40px;">
                                                        <?php
                                                        if ($payPanelName == 'StockPayUp' || $payPanelName == 'SellPayUp' ||
                                                                $payPanelName == 'ItemRepairPayUp' ||
                                                                $payPanelName == 'ApprovalPayUp' ||
                                                                $payPanelName == 'SellItemReturn' ||
                                                                $payPanelName == 'CustSellPayUp' ||
                                                                $payPanelName == 'NwOrPayUp' ||
                                                                $payPanelName == 'RawPayUp' || $payPanelName == 'CrystalStockPayUp' ||
                                                                $payPanelName == 'CrySellPayUp' || $payPanelName == 'CrystalStockPayment' ||
                                                                $payPanelName == 'CrySellPayment') {
                                                            $payPanelGdRecWT = array(KG, GM, MG);

                                                            if ($invRecWType != '' && $invRecWType != null) {
                                                                for ($i = 0; $i <= 2; $i++)
                                                                    if ($payPanelGdRecWT[$i] == $invRecWType)
                                                                        $payPanelGdRecWTSel[$i] = 'selected';
                                                            } else {
                                                                $payPanelGdRecWTSel[1] = 'selected';
                                                            }
                                                            ?>
                                                    <option value="KG"<?php echo $payPanelGdRecWTSel[0]; ?>>KG</option>
                                                    <option value="GM"<?php echo $payPanelGdRecWTSel[1]; ?>>GM</option>
                                                    <option value="MG"<?php echo $payPanelGdRecWTSel[2]; ?>>MG</option>
                                                    <?php
                                                    unset($payPanelGdRecWTSel);
                                                } else {
                                                    ?>
                                                    <option value="KG">KG</option>
                                                    <option value="GM" selected>GM</option>
                                                    <option value="MG">MG</option>
    <?php } ?>
                                            </select>
                                        </div>
                                    </td>
                                </table>
                            </td>


                            <td align="center" width="5%">
                                <input id="<?php echo $payMetal1Tunch; ?>" name="<?php echo $payMetal1Tunch; ?>" type="text" 
                                       placeholder="TUNCH" value="<?php echo $invRecPurity; ?>" style="width:100%;height:40px;"
                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                   document.getElementById('<?php echo $payMetal1Rate; ?>').focus();
                                                   document.getElementById('sttr_metal_rate1').setSelectionRange(document.getElementById('sttr_metal_rate1').value.length,document.getElementById('sttr_metal_rate1').value.length);
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('<?php echo $payMetal1RecWtType; ?>').focus();
                                                   return false;
                                               }"
                                       onchange="calDiscountAmt('<?php echo $prefix; ?>');
                                               calcStockItemBalance();
                                               calculateFinalFineWt('<?php echo $metalCount; ?>');
                                               return false;"
                                       onblur="calDiscountAmt('<?php echo $prefix; ?>');
                                               calcStockItemBalance();
                                               calculateFinalFineWt('<?php echo $metalCount; ?>');
                                               return false;"
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                       autocomplete="off" spellcheck="false" class="input_border_grey_center" size="3" maxlength="10" />
                            </td>
                            
                            <!-- START CODE FOR ADDED FFW By 99.5 Purity  @AUTHOR MANISHA-04MAY2024-->
                                <td  class="itemAddPnLabels14" width="2%" align="center">
                                    <input type="checkbox" id="<?php echo $payMetal1ByTunch; ?>" name="<?php echo $payMetal1ByTunch; ?>" 
                                           onchange="calcStockItemBalance();
                                                    calculateFinalFineWt('<?php echo $metalCount; ?>');
                                                    return false;
                                                    "
                                           onclick="if (!this.checked) {
                                                                        document.getElementById('<?php $payMetal1metTrans; ?>').value = 'off';
                                                                    } else {
                                                                       document.getElementById('<?php $payMetal1metTrans; ?>').value = 'on';
                                                   }" 
                                                   title="FFW By 99.5 Purity" />
                                </td>
                                <!-- START CODE FOR ADDED FFW By 99.5 Purity  @AUTHOR MANISHA-04MAY2024-->                            <td align="left" class="itemAddPnLabels14" width="7%">
                                <input id="<?php echo $payMetal1FnWt; ?>" name="<?php echo $payMetal1FnWt; ?>" 
                                       type="text" placeholder="FN WT" value="<?php echo $invRecFNWT; ?>" style="width:100%;height:40px;"
                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                   document.getElementById('<?php echo $payMetal1LbrWt; ?>').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('<?php echo $payMetal1Tunch; ?>').focus();
                                                   return false;
                                               }"
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                       autocomplete="off" spellcheck="false" class="input_border_grey_center" 
                                       size="6" maxlength="12" readonly="true" />
                            </td>
                            <!-- START CODE TO ADD ITEM LABOUR WEIGHT & FINAL FINE WEIGHT OPTION @AUTHOR:MADHUREE-08JULY2021 -->
                            <td align="left" class="itemAddPnLabels14" width="7%">
                                <input type="hidden" id="<?php echo $lbrWtAddMinusValue; ?>" name="<?php echo $lbrWtAddMinusValue; ?>" value="minus" />
                                <input id="<?php echo $payMetal1LbrWt; ?>" name="<?php echo $payMetal1LbrWt; ?>" 
                                       type="text" placeholder="LB WT" value="<?php echo $invRecLbrWT; ?>" style="width:100%;height:40px;"
                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                   document.getElementById('<?php echo $payMetal1FFnWt; ?>').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('<?php echo $payMetal1FnWt; ?>').focus();
                                                   return false;
                                               }"
                                       onblur="calculateFinalFineWt('<?php echo $metalCount; ?>');
                                               calcStockItemBalance();
                                               return false;"
                                       ondblclick="getLbrWtDropdown('<?php echo $metalCount; ?>');";
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                       autocomplete="off" spellcheck="false" class="input_border_grey_center" 
                                       size="6" maxlength="12"/>
                                <div id="lbrWtOptionDiv"></div>
                            </td>
                            <td align="left" class="itemAddPnLabels14" width="7%">
                                <input id="<?php echo $payMetal1FFnWt; ?>" name="<?php echo $payMetal1FFnWt; ?>" 
                                       type="text" placeholder="FFN WT" value="<?php echo $invRecFFNWT; ?>" style="width:100%;height:40px;"
                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                   document.getElementById('<?php echo $payMetal1Rate; ?>').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('<?php echo $payMetal1LbrWt; ?>').focus();
                                                   return false;
                                               }"
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                       autocomplete="off" spellcheck="false" class="input_border_grey_center" 
                                       size="6" maxlength="12" readonly="true" />
                            </td>
                            <!-- END CODE TO ADD ITEM LABOUR WEIGHT & FINAL FINE WEIGHT OPTION @AUTHOR:MADHUREE-08JULY2021 -->
                            <?php
                        }
                        //END CODE FOR STONE : AUTHOR: DARSHANA 21 JULY 2021
                        ?>
                        <td align="left" class="itemAddPnLabels14" width="5%">
<?php // echo '$payMetal1Rate=='.$metalRate;      ?>
                            <input id="<?php echo $payMetal1Rate; ?>" name="<?php echo $payMetal1Rate; ?>" 
                                   type="text" placeholder="RATE" value="<?php
                                   if ($rawMetType == 'crystal') {
                                       echo $cry_rate_value;
                                   } else {
                                       echo $metalRate;
                                   }
                                   ?>"
                                   onkeydown="javascript:if (event.keyCode == 13) {
                                               document.getElementById('<?php echo $payMetal1Val; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('<?php echo $payMetal1Tunch; ?>').focus();
                                               return false;
                                           }"
                                   onblur="javascript:calDiscountAmt('<?php echo $prefix; ?>');
                                           calcStockItemBalance();
                                           return false;"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                   autocomplete="off" spellcheck="false" class="input_border_grey_center" size="6" maxlength="15"  style="width:100%;height:40px;"/>
                        </td>
                        <td align="left" class="itemAddPnLabels14" width="8%">
                            <input id="<?php echo $payMetal1Val; ?>" name="<?php echo $payMetal1Val; ?>" 
                                   type="text" placeholder="VAL" value="<?php echo $invMetVal; ?>"
                                   onkeydown="javascript:if (event.keyCode == 13 || event.key === 'PageUp') {
                                               //document.getElementById('<?php echo $payCashAmtRec; ?>').focus();
                                               document.getElementById('<?php echo $prefix."PayCashAmtRec"; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('<?php echo $payMetal1Rate; ?>').focus();
                                               document.getElementById('<?php echo $payMetal1Rate; ?>').setSelectionRange(document.getElementById('<?php echo $payMetal1Rate; ?>').value.length,document.getElementById('<?php echo $payMetal1Rate; ?>').value.length);
                                               return false;
                                           }"
                                   onchange="javascript:changeMetalRateByVal('<?php echo $prefix; ?>', '<?php echo $metalCount; ?>');
                                           calDiscountAmt('<?php echo $prefix; ?>');
                                           calcStockItemBalance();
                                           return false;"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                   autocomplete="off"  spellcheck="false" class="input_border_grey_center" size="8" maxlength="15" style="width:100%;height:40px";
                                   ondblclick="if (event.keyCode != 8 && event.keyCode != 13) {
                                            getMetValuationDropdown();}"/>
                        <div id="finalValuationSelectDivVal" /></div>
                        </td>
                        <?php
                        if ($rawMetType == 'crystal') {
                            if ($metalAvgRate == '' || $metalAvgRate == NULL) {
                                $metalAvgRate = $metalRate;
                            }
                        }
                        ?>
                        <td align="left" class="itemAddPnLabels14" width="5%">
                            <input id="<?php echo $payMetal1AvgRate; ?>" name="<?php echo $payMetal1AvgRate; ?>" 
                                   type="text" placeholder="AVG RATE" value="<?php echo $metalAvgRate; ?>"
                                   onkeydown="javascript:if (event.keyCode == 13) {
                                               document.getElementById('<?php echo $payMetal1Val; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('<?php echo $payMetal1Tunch; ?>').focus();
                                               return false;
                                           }"
                                   onblur="javascript:calDiscountAmt('<?php echo $prefix; ?>');
                                           calcStockItemBalance();
                                           return false;"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                   autocomplete="off" spellcheck="false" class="input_border_grey_center" size="6" maxlength="15" style="width:90px;height:40px;"/>
                        </td>
<?php if ($rawMetType == 'crystal') { ?>
                            <td align="left" class="itemAddPnLabels14" width="5%">
                                <input id="<?php echo $payMetal1Pnl; ?>" name="<?php echo $payMetal1Pnl; ?>" type="text" 
                                       placeholder="P/L" value="<?php echo $metalProfitNLoss; ?>"
                                       onkeydown="javascript:if (event.keyCode == 13) {
                                                   document.getElementById('<?php echo $payMetal1Val; ?>').focus();
                                                   return false;
                                               } else if (event.keyCode == 8 && this.value == '') {
                                                   document.getElementById('<?php echo $payMetal1Tunch; ?>').focus();
                                                   return false;
                                               }"
                                       onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                       autocomplete="off" spellcheck="false" class="input_border_grey_center" size="7" maxlength="15" style="width:100%;height:40px;" />
                            </td>
<?php } else { ?>
                            <input id="<?php echo $payMetal1Pnl; ?>" name="<?php echo $payMetal1Pnl; ?>" type="hidden" 
                                   placeholder="P/L" value="<?php echo $metalProfitNLoss; ?>"
                                   onkeydown="javascript:if (event.keyCode == 13) {
                                               document.getElementById('<?php echo $payMetal1Val; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('<?php echo $payMetal1Tunch; ?>').focus();
                                               return false;
                                           }"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                   autocomplete="off" spellcheck="false" class="input_border_grey_center" size="7" maxlength="15" style="width:100%;height:40px;"/>
<?php } ?>
                        <td align="left" class="itemAddPnLabels14" width="10%" colspan="2">
                            <table cellspacing="1" cellpadding="0" width="100%">
                                <tr>
                                    <td width="50%">
                                        <input id="<?php echo $payMetal1Bal; ?>" name="<?php echo $payMetal1Bal; ?>" 
                                               type="hidden" placeholder="Due Weight" value="<?php echo $metalDueBal; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('<?php echo $payMetal1BalType; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('<?php echo $payMetal1Val; ?>').focus();
                                                           return false;
                                                       }"
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                               autocomplete="off" spellcheck="false" class="input_border_grey_center" size="6" maxlength="15" style="width:100%;height:40px;"/>
                                    </td>
                                    <td width="50%">
                                        <input id="<?php echo $payMetal1BalType; ?>" name="<?php echo $payMetal1BalType; ?>" 
                                               type="hidden" placeholder="Due WeightType" value="<?php echo $metalDueBalType; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                               <?php if ($metalCount > 1) { ?>
                                                               document.getElementById('<?php echo $payMetalType1; ?>').focus();
                                                               return false;
                                               <?php } else { ?>
                                                               document.getElementById('<?php echo $payAccId; ?>').focus();
                                                               return false;
                                               <?php } ?>
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('<?php echo $payMetal1Bal; ?>').focus();
                                                           return false;
                                                       }"
                                               autocomplete="off" spellcheck="false" class="input_border_grey_center" size="3" maxlength="4" style="width:100%;height:40px;"/>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <?php
//                        if ($payPanelName != 'StockPayUp' && $payPanelName != 'SellPayUp' && 
//                            $payPanelName != 'ItemRepairPayUp' &&
//                            $payPanelName != 'SellItemReturn' && $payPanelName != 'SellItemReturnUp' &&
//                            $payPanelName != 'CustSellPayUp' && $payPanelName != 'RawPayUp' && 
//                            $payPanelName != 'NwOrPayUp' && $payPanelName != 'InvoicePayUp' && 
//                            $payPanelName != 'SuppOrderDeliveryUp' && $payPanelName != 'SuppOrderUp' && 
//                            $payPanelName != 'NwOrDelPaymentUp') { 
                        ?>
                        <!-- START CODE FOR ADD NEW METAL REC/PAID ENTRY - MAIN ENTRY UPDATE TIME - NEW FUNCTIONALITY @PRIYANKA-18MAR2019 -->
                        <td align = "right" width ="5%">
                            <a style = "cursor: pointer;"
                               onclick = "
                                       if (document.getElementById('metalDiv<?php echo $metalCount; ?>').value == '' ||
                                               document.getElementById('metalDiv<?php echo $metalCount; ?>').value == 'true') {
                                           getWholeMoreRawMetalDiv('<?php echo $metalCount + 1; ?>', '<?php echo $payPanelName; ?>',
                                                   '<?php echo $firmIdSelected; ?>', '<?php echo $rawGdPreId; ?>',
                                                   '<?php echo $rawGdPostId; ?>',
                                                   'Gold', '<?php echo $rawSlPreId; ?>', '<?php echo $rawSlPostId; ?>',
                                                   '<?php echo $rawAlPreId; ?>',
                                                   '<?php echo $rawAlPostId; ?>', 'rawMoreMetalPanel', '<?php echo $mcntr; ?>',
                                                   document.getElementById('<?php echo $payRawGoldPreId; ?>').value,
                                                   document.getElementById('<?php echo $payRawGoldPostId; ?>').value,
                                                   '<?php echo $goldPurchaseAvgRate; ?>', '<?php echo $silverPurchaseAvgRate; ?>',
                                                   '<?php echo $userId; ?>','<?php echo $prefix; ?>');
                                       }">
                                <img src = "images/img/add.png" 
                                     alt = "Click Here To Add More Raw Metal" 
                                     class = "marginTop5" style="height:14px;"
                                     onload="document.getElementById('noOfRawMet').value = '<?php echo $noOfRawMet; ?>'
                                             document.getElementById('totMetal').value = '<?php echo $noOfRawMet; ?>'
                                             document.getElementById('metalCount').value = '<?php echo $metalCount; ?>'
                                     <?php if ($payPanelName == 'SlPrPayment' && $noOfEstimateReceivedRawMet > 0) { ?>
                                                 calcStockItemBalance();
                            <?php } ?>"/>
                            </a>
                            <?php if ($metalCount != 1) {
                                ?>
                                <a style="cursor: pointer;" 
                                   onclick ="closeStockRawMetalDiv('<?php echo $metalCount; ?>',
                                                         '<?php echo $payPanelName; ?>');" >
                                    <img src="<?php echo $documentRoot; ?>/images/delete16.png"  alt=""  
                                    <?php
                                    if ($metalCount > 1 && $payPanelName != 'StockPayUp' &&
                                            $payPanelName != 'SellPayUp' &&
                                            $payPanelName != 'ItemRepairPayUp' &&
                                            $payPanelName != 'ApprovalPayUp' &&
                                            $payPanelName != 'CustSellPayUp') {
                                        ?>onload=
                                             "document.getElementById('<?php echo $payMetalType1; ?>').focus();" <?php } ?>/>
                                </a>
<?php } ?>
                        </td>
<!--                        <td align = "right" width = "5%">
                           
                        </td>-->
                        <!-- END CODE FOR ADD NEW METAL REC/PAID ENTRY - MAIN ENTRY UPDATE TIME - NEW FUNCTIONALITY @PRIYANKA-18MAR2019 -->
                        <?php
//}
                        ?>
                        </tr>
                    </table>
                </div>
            </div>
        </td>
    </tr>
</table>
<div id = "payRawMetalDiv<?php echo $metalCount + 1; ?>">
</div>
