<?php
/*
 * **************************************************************************************
 * @Description:
 * **************************************************************************************
 *
 * Created on Apr 30, 2015 10:11:47 PM
 * @FileName: ogspwhpy.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: 2
 * @version 1.0.1
 * @Copyright (c) 2015 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2015 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:@PRIYA
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
// modify file to change raw metal acc name @OMMODTAG SHRI_10JAN16
$metalTypePanel = $_GET['metalTypePanel'];
$metalPanelName = $_POST['metalPanelName'];

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
// echo '$userId==='.$userId;
//
$cntr = 'true';
$mcntr = 'true';
//
if ($payPanelName == 'StockPayment' ||
        $payPanelName == 'ItemRepairPayment' ||
        $payPanelName == 'SlPrPayment' || $transPanelName == 'NewOrderPayment' ||
        $payPanelName == 'CustSellPayment' || $payPanelName == 'NwOrPayment' ||
        $payPanelName == 'RawPayment' || $payPanelName == 'SuppAddOrder' ||
        $payPanelName == 'SuppUdhaDep' || $payPanelName == 'InvoicePayment' ||
        $payPanelName == 'NwOrDelPayment' ||
        $payPanelName == 'SuppPayment' || $payPanelName == 'SuppOrderDelivery') { //add code for PanelName For Payment:Author:SANT30NOV16****
    
    if ($saveMetalCount != 0 && $slPrOthInfo == 'PaymentSaved') {
        //
        $metalCount = $saveMetalCount + 1;
        //
    } else {
        //
        if ($payPanelName == 'SlPrPayment' && $noOfEstimateReceivedRawMet > 0) {
            //$metalCount = 1;
        } else {
            $metalCount = 1;
        }
        //        
    }

    if ($metalPanelName == 'rawMoreMetalPanel') {
        $rawPreId = $_POST['rawPreId'];
        $rawPostId = $_POST['rawPostId'];
        $metalCount = $_POST['metalDivCount'];
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

//        $metalAvgRate = $_POST['metalAvgRate'];
    }

//    echo '$metalTypePanel='.$metalTypePanel;

    if ($metalTypePanel == 'rawMetalType') {
        $metalCount = $_GET['metalDivCount'];
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

//        $metalAvgRate = $_GET['metalAvgRate'];

        $cntr = 'false';
    } else if ($metalPanelName != 'rawMoreMetalPanel' && $metalPanelName != 'rawMetalType') {

        if ($rawMetType == '' || $rawMetType == 'Gold') {
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
if ($metalDueBalType == NULL || $metalDueBalType == '') {
    $metalDueBalType = 'GM';
}

//if ($payPanelName == 'StockPayUp' || $payPanelName == 'StockPayment') {
//    $rawType = 'AddStock';
//} else if ($payPanelName == 'SellPayUp' || $payPanelName == 'SlPrPayment') {
//    $rawType = 'SellPurchase';
//} else if ($payPanelName == 'NwOrPayUp' || $payPanelName == 'NwOrPayment') {
//    $rawType = 'newOrder';
//}

if ($payPanelName == 'StockPayUp' || $payPanelName == 'StockPayment') {
    $rawType = 'PAID';
} else if ($payPanelName == 'SellPayUp' || $payPanelName == 'SlPrPayment' ||
        $payPanelName == 'ItemRepairPayUp' || $payPanelName == 'ItemRepairPayment' ||
        $transPanelName == 'NewOrderPayment') {
    $rawType = 'RECEIVED';
} else if ($payPanelName == 'RawPayUp' || $payPanelName == 'RawPayment') {
    if ($transactionPanel == 'RawPurchase')
        $rawType = 'PAID';
    else
        $rawType = 'RECEIVED';
} else if ($payPanelName == 'NwOrPayUp' || $payPanelName == 'NwOrPayment') {
    $rawType = 'newOrder';
}

include 'omrmsldt.php';
include 'omiamrtdv.php';

//echo '$rawMetName='.$rawMetName;
?>
<table border="0" cellspacing="0" cellpadding="0" align="left">
    <tr>
        <td align="left" valign="top">
            <!-- START CODE TO DEFINE HIDDEN VARIABLE FOR METAL RATE FRACTIONS @AUTHOR:MADHUREE-14JAN2022 -->
            <input type="hidden" id="defaultGmWtInGm" name="defaultGmWtInGm" value="<?php echo $gmWtInGm; ?>"/>
            <input type="hidden" id="defaultGmWtInKg" name="defaultGmWtInKg" value="<?php echo $gmWtInKg; ?>"/>
            <input type="hidden" id="defaultGmWtInMg" name="defaultGmWtInMg" value="<?php echo $gmWtInMg; ?>"/>
            <input type="hidden" id="defaultSrGmWtInGm" name="defaultSrGmWtInGm" value="<?php echo $srGmWtInGm; ?>"/>
            <input type="hidden" id="defaultSrGmWtInKg" name="defaultSrGmWtInKg" value="<?php echo $srGmWtInKg; ?>"/>
            <input type="hidden" id="defaultSrGmWtInMg" name="defaultSrGmWtInMg" value="<?php echo $srGmWtInMg; ?>"/>
            <!-- END CODE TO DEFINE HIDDEN VARIABLE FOR METAL RATE FRACTIONS @AUTHOR:MADHUREE-14JAN2022 -->
            <input type="hidden" id="urdValuationBy" name="urdValuationBy" value="<?php echo $urdValuationBy; ?>" />
            <input type="hidden" id="<?php echo $payMetal1TransType; ?>" name="<?php echo $payMetal1TransType; ?>" value="<?php echo $rawType; ?>" />
            <input type="hidden" id="<?php echo $payMetal1Indicator; ?>" name="<?php echo $payMetal1Indicator; ?>" value="rawMetal"/>
            <input type="hidden" id="<?php echo $payMetal1PreInvNo; ?>" name="<?php echo $payMetal1PreInvNo; ?>" value="<?php echo $payPreInvoiceNo; ?>" />
            <input type="hidden" id="<?php echo $payMetal1PostInvNo; ?>" name="<?php echo $payMetal1PostInvNo; ?>" value="<?php echo $payInvoiceNo; ?>" />
            <input type="hidden" id="<?php echo $payMetal1UserId; ?>" name="<?php echo $payMetal1UserId; ?>" value="<?php echo $userId; ?>" />
            <input type="hidden" id="<?php echo $payMetal1StocType; ?>" name="<?php echo $payMetal1StocType; ?>" value="retail" />
            <input type="hidden" id="<?php echo $payMetal1StockType; ?>" name="<?php echo $payMetal1StockType; ?>" value="rawMetal" />

            <div id="rawMetalDiv<?php echo $metalCount; ?>" name="rawMetalDiv<?php echo $metalCount; ?>">
                <div id="rawMetalIdDiv<?php echo $metalCount; ?>">
<?php
if ($payPanelName == 'StockPayment' || $payPanelName == 'SlPrPayment' ||
        $payPanelName == 'ItemRepairPayment' ||
        $payPanelName == 'CustSellPayment' || $payPanelName == 'SuppOrderDelivery' ||
        $payPanelName == 'NwOrPayment' || $payPanelName == 'RawPayment' ||
        $payPanelName == 'SuppAddOrder' || $payPanelName == 'NwOrDelPayment' ||
        $payPanelName == 'SuppPayment') { //add code for PanelName For Payment:Author:SANT30NOV16****
    if ($rawMetType == 'Gold') {
        $metalDueBal = $goldFinalWeight;
        $metalDueBalType = $goldFinalWeightType;
//                            $metalAvgRate = $goldPurchaseAvgRate;
        if ($goldPurchaseAvgRate != '') {
            $metalRate = $goldPurchaseAvgRate;
            $metalAvgRate = $goldPurchaseAvgRate;
        } else {
            $metalRate = callMetalRateTable('select', 'LatestMetalRate', '', '', 'Gold');
            $metalAvgRate = $metalRate;
        }
        $gdRate = $metalRate;
    } else if ($rawMetType == 'Silver') {
        $metalDueBal = $silverFinalWeight;
        $metalDueBalType = $silverFinalWeightType;
        if ($silverPurchaseAvgRate != '') {
            $metalRate = $silverPurchaseAvgRate;
            $metalAvgRate = $silverPurchaseAvgRate;
        } else {
            $metalRate = callMetalRateTable('select', 'LatestMetalRate', '', '', 'Silver');
            $metalAvgRate = $metalRate;
        }
        $slRate = $metalRate;
    } else if ($rawMetType == 'Alloy') {
        $metalRate = '';
    }
}
if ($rawMetDesc == '') {
    parse_str(getTableValues("SELECT met_rate_metal_id FROM metal_rates WHERE met_rate_own_id='$_SESSION[sessionOwnerId]' AND met_rate_metal_name='$rawMetType' order by met_rate_ent_dat desc LIMIT 0, 1"));
    $rawMetDesc = $met_rate_metal_id;
    parse_str(getTableValues("SELECT rwmt_item_name FROM raw_metal where rwmt_owner_id='$_SESSION[sessionOwnerId]' and rwmt_metal_type='$rawMetType' and rwmt_metal_rate_id ='$met_rate_metal_id' ORDER BY rwmt_since DESC LIMIT 0, 1"));
//                        $rawMetName = $rwmt_item_name;
}

$checkRawGdPresent = noOfRowsCheck('rwmt_id', 'raw_metal', "rwmt_metal_type='Gold' and rwmt_status = 'PaymentDone'");
$checkRawSlPresent = noOfRowsCheck('rwmt_id', 'raw_metal', "rwmt_metal_type='Silver' and rwmt_status = 'PaymentDone'");
?>
                    <table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr>
                            <td align="left"  class="itemAddPnLabels14" width="60px">
                                <input id="metalDiv<?php echo $metalCount; ?>" name="metalDiv<?php echo $metalCount; ?>" type="hidden"/>
                                <input id="metalDel<?php echo $metalCount; ?>" name="metalDel<?php echo $metalCount; ?>" value="<?php echo $metalCount; ?>" type="hidden" />
                                <input id="rawId" name="rawId" type="hidden" value="<?php echo $rawId; ?>"/>
                                <input id="metalPanel" name="metalPanel" type="hidden" value="<?php echo $payPanelName; ?>"/>
                                <input id="metalCount" name="metalCount" type="hidden" value="<?php echo $metalCount; ?>"/>

                                <input type="hidden" id="totPrevMetal" name="totPrevMetal" value="<?php echo $saveMetalCount; ?>" />

                                <SELECT class="input_border_grey" id="<?php echo $payMetalType1; ?>" name="<?php echo $payMetalType1; ?>"
                                        onkeydown="javascript: if (event.keyCode == 13) {
                                                    document.getElementById('<?php echo $payMetal1FirmId; ?>').focus();
                                                    return false;
                                                } else if (event.keyCode == 8) {
                                        <?php if ($metalCount > 1 && ($payPanelName != 'SlPrPayment' && $slPrOthInfo != 'PaymentSaved')) { ?>
                                                        document.getElementById('<?php echo $prefix . 'PayMetalType1' . ($metalCount - 1); ?>').focus();
                                        <?php } else if ($itemMainPanel == 'addByInv') { ?>
                                                        document.getElementById('suppItemFinVal1').focus();
                                        <?php } ?>
                                                    return false;
                                                }"
                                        onchange ="getWholeRawMetalType('<?php echo $payPanelName; ?>', this.value, '<?php echo $metalCount; ?>', '<?php echo $firmId; ?>',
                                                        '<?php echo $rawGdPreId; ?>', '<?php echo $rawGdPostId; ?>',
                                                        '<?php echo $rawSlPreId; ?>', '<?php echo $rawSlPostId; ?>', '<?php echo $rawAlPreId; ?>', '<?php echo $rawAlPostId; ?>', 'rawMetalType', '<?php echo $cntr; ?>', '<?php echo $goldPurchaseAvgRate; ?>', '<?php echo $silverPurchaseAvgRate; ?>', '<?php echo $userId; ?>');"
                                        size="1"> 
                                        <?php
                                        $metTypeNew = array('Gold', 'Silver', 'Alloy');
                                        for ($i = 0; $i <= 2; $i++) {
                                            if ($metTypeNew[$i] == $rawMetType)
                                                $optionRawMetalSel[$i] = 'selected';
                                        }
                                        ?>
                                    <option value="Gold" <?php echo $optionRawMetalSel[0]; ?>>GOLD</option>
                                    <option value="Silver" <?php echo $optionRawMetalSel[1]; ?>>SILVER</option>
                                    <option value="Alloy" <?php echo $optionRawMetalSel[2]; ?>>ALLOY</option>
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
                                           $payPanelName == 'SuppOrderDelivery') { //add code for PanelName For Payment:Author:SANT30NOV16****
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
                                   autocomplete="off" spellcheck="false" class="input_border_red_center" size="8" maxlength="15" />
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
                                   if ($payPanelName == 'StockPayment' || $payPanelName == 'StockPayUp' ||
                                           $payPanelName == 'CustSellPayment' || $payPanelName == 'CustSellPayUp' ||
                                           $payPanelName == 'RawPayment' || $payPanelName == 'SuppAddOrder' ||
                                           $payPanelName == 'InvoicePayment' || $payPanelName == 'NwOrDelPayment' ||
                                           $payPanelName == 'NwOrPayment' || $payPanelName == 'SuppOrderDelivery') { //add code for PanelName For Payment:Author:SANT30NOV16****
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
                                   autocomplete="off" spellcheck="false" class="input_border_red_center" size="8" maxlength="15" />
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
                                           $payPanelName == 'SuppOrderDelivery') { //add code for PanelName For Payment:Author:SANT30NOV16****
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
                                   autocomplete="off" spellcheck="false" class="input_border_red_center" size="8" maxlength="15" />
                            <div id="rawMetalSelectDiv<?php echo $metalCount; ?>"></div>
                               <?php } ?>
                        <!--</td>-->
                        <td align="center" width="90px">
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
//                                include 'ogrwpyfr.php';
?>
                            </div>
                        </td>
                        <td align="left" width="100px">
<?php
//acc name changed @OMMODTAG SHRI_10JAN16
$prevFieldId = $payMetal1FirmId;
$nextFieldId = $payMetal1MetalType;
$selAccountId = $payMetal1AccId;
$selFirmId = $firmId;
$selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver'"; // for MYSQLI Query
$accNameSelected = 'RAW Gold';
if ($payPanelName == 'suppPendingOrderUp' || $payPanelName == 'StockPayUp' ||
        $payPanelName == 'SellPayUp' || $payPanelName == 'ItemRepairPayUp' ||
        $payPanelName == 'SellItemReturn' ||
        $payPanelName == 'CustSellPayUp' || $payPanelName == 'NwOrPayUp' ||
        $payPanelName == 'SuppOrderUp') {
    if ($rawMetType == 'Gold') {
        if ($rawAccId != '') {
            $selFirmId = $rawFirmId;
            $accNameSelected = '';
            $accIdSelected = $rawAccId;
        } else {
            $accIdSelected = '';
            $accNameSelected = 'RAW Gold';
        }
    }if ($rawMetType == 'Silver') {
        if ($rawAccId != '') {
            $selFirmId = $rawFirmId;
            $selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver'"; // for MYSQLI Query
            $accNameSelected = '';
            $accIdSelected = $rawAccId;
        } else {
            $accIdSelected = '';
            $accNameSelected = "'RAW Silver'";
        }
    }if ($rawMetType == 'Alloy') {
        if ($rawAccId != '') {
            $selFirmId = $rawFirmId;
            $selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver'"; // for MYSQLI Query
            $accNameSelected = '';
            $accIdSelected = $rawAccId;
        } else {
            $accIdSelected = '';
            $accNameSelected = "'RAW Alloy'";
        }
    }
} else {
    if ($rawMetType == 'Silver') {
        $selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver'"; // for MYSQLI Query
        $accNameSelected = 'RAW Silver';
        $accIdSelected = '';
    }
    if ($rawMetType == 'Alloy') {
        $selMainAccName = "'RAW Metal','RAW/OLD Gold','RAW/OLD Silver'"; // for MYSQLI Query
        $accNameSelected = 'RAW Alloy';
        $accIdSelected = '';
    }
}
$selAccountClass = 'input_border_red';
if (($payPanelName == 'StockPayment' || $payPanelName == 'SlPrPayment' ||
        $payPanelName == 'ItemRepairPayment' ||
        ($itemMainPanel == 'addByInv' || $itemMainPanel == 'addByItems')) ||
        $payPanelName == 'SuppAddOrder' || $payPanelName == 'InvoicePayment' ||
        $payPanelName == 'NwOrPayment' || $payPanelName == 'NwOrDelPayment' ||
        $payPanelName == 'SuppOrderDelivery') { //add code for PanelName For Payment:Author:SANT30NOV16****
    $accIdSelected = '';
}
include 'omacsalt.php';
?>
                        </td>
                        <td align="center" width="100px">

                            <?php
                            if ($rawMetType == 'Gold') {
                                $rawMetalDesc = 'OldGold';
                            }
                            if ($rawMetType == 'Silver') {
                                $rawMetalDesc = 'OldSilver';
                            }
                            ?>
                            <select id="<?php echo $payMetal1MetalType; ?>" name="<?php echo $payMetal1MetalType; ?>" 
                                    onkeydown="javascript: if (event.keyCode == 13) {
                                                document.getElementById('<?php echo $payMetal1MetalDesc; ?>').focus();
                                                return false;
                                            } else if (event.keyCode == 8) {
                                                document.getElementById('<?php echo $payMetal1AccId; ?>').focus();
                                                return false;
                                            }"
                                    class="input_border_red" >
                                    <?php
                                    $metalDesc = array(RawGold, RawSilver, OldGold, OldSilver);
                                    if ($payPanelName == 'SellPayUp' || $payPanelName == 'RawPayUp' ||
                                            $payPanelName == 'ItemRepairPayUp') {
                                        for ($i = 0; $i <= 3; $i++)
                                            if ($metalDesc[$i] == $rmpr_metal_desc)
                                                $optionMetalDescSel[$i] = 'selected';
                                    } else {
                                        for ($i = 0; $i <= 3; $i++)
                                            if ($metalDesc[$i] == $rawMetalDesc)
                                                $optionMetalDescSel[$i] = 'selected';
                                    }
                                    ?>
                                <option value="RawGold" <?php echo $optionMetalDescSel[0]; ?>>RAW GOLD</option>
                                <option value="RawSilver" <?php echo $optionMetalDescSel[1]; ?>>RAW SILVER</option>
                                <option value="OldGold" <?php echo $optionMetalDescSel[2]; ?>>OLD GOLD</option>
                                <option value="OldSilver" <?php echo $optionMetalDescSel[3]; ?>>OLD SILVER</option>
                            </select>
                        </td>
                        <td align="center" width="50px">
                            <input id="<?php echo $payMetal1MetalDesc; ?>" name="<?php echo $payMetal1MetalDesc; ?>" type="text" placeholder="METAL NAME" value="<?php echo $rawMetName; ?>"
                                   onkeydown="javascript:if (event.keyCode == 13) {
                                               searchItemForPanelBlank('rawSell', '<?php echo $metalCount; ?>');
                                               document.getElementById('<?php echo $payMetal1RecWt; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               searchItemForPanelBlank('rawSell', '<?php echo $metalCount; ?>');
                                               document.getElementById('<?php echo $payMetal1MetalType; ?>').focus();
                                               return false;
                                           }"
                                   onkeyup="if (event.keyCode != 9 && event.keyCode != 13) {
                                               searchRawSellItemNames(this.value, document.getElementById('<?php echo $payMetalType1; ?>').value, 'rawSell', document.getElementById('<?php echo $payMetal1MetalType; ?>').value, event.keyCode, '<?php echo $prefix; ?>', '<?php echo $metalCount; ?>');
                                           }"
                                   autocomplete="off" spellcheck="false" class="input_border_grey_center" size="15" maxlength="15" title="METAL NAME"/>
                            <div id="itemListDivToaddRawMetSellStock<?php echo $metalCount; ?>" class="itemListDivToAddStock" style="padding-right: 70px;"></div>
                        </td>
                        <td colspan="2">
                            <table border="0" cellspacing="2" cellpadding="0" >
                                <td class="itemAddPnLabels14" align="left"  width="60px">
                                    <input id="<?php echo $payMetal1RecWt; ?>" name="<?php echo $payMetal1RecWt; ?>" type="text" placeholder="Total Wt" value="<?php echo $invRecWT; ?>"
                                           onkeydown="javascript:if (event.keyCode == 13) {
                                                       document.getElementById('<?php echo $payMetal1RecWtType; ?>').focus();
                                                       return false;
                                                   } else if (event.keyCode == 8 && this.value == '') {
                                                       document.getElementById('<?php echo $payMetal1MetalDesc; ?>').focus();
                                                       return false;
                                                   }"
                                           onchange="calcStockItemBalance();
                                                   return false;"
                                           onblur="calcStockItemBalance();
                                                   return false;"
                                           onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                           autocomplete="off" spellcheck="false" class="input_border_grey_center" size="5" maxlength="15"/>
                                </td>
                                <td class="itemAddPnLabels14" width="40px">
                                    <div class="floatRight">
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

                                                            calcStockItemBalance();
                                                            return false;

                                                        }"
                                                class="input_border_grey">
                                                <?php
                                                if ($payPanelName == 'StockPayUp' || $payPanelName == 'SellPayUp' ||
                                                        $payPanelName == 'ItemRepairPayUp' ||
                                                        $payPanelName == 'SellItemReturn' ||
                                                        $payPanelName == 'CustSellPayUp' || $payPanelName == 'NwOrPayUp' ||
                                                        $payPanelName == 'RawPayUp') {
                                                    $payPanelGdRecWT = array(KG, GM, MG);
                                                    for ($i = 0; $i <= 2; $i++)
                                                        if ($payPanelGdRecWT[$i] == $invRecWType)
                                                            $payPanelGdRecWTSel[$i] = 'selected';
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
                        <td align="center" width="50px">
                            <input id="<?php echo $payMetal1Tunch; ?>" name="<?php echo $payMetal1Tunch; ?>" type="text" placeholder="Tunch%" value="<?php echo $invRecPurity; ?>"
                                   onkeydown="javascript:if (event.keyCode == 13) {
                                               document.getElementById('<?php echo $payMetal1Rate; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('<?php echo $payMetal1RecWtType; ?>').focus();
                                               return false;
                                           }"
                                   onchange="calcStockItemBalance();
                                           return false;"
                                   onblur="calcStockItemBalance();
                                           return false;"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                   autocomplete="off" spellcheck="false" class="input_border_grey_center" size="3" maxlength="10" />
                        </td>
                        <td align="left" class="itemAddPnLabels14" width="81px">
                            <input id="<?php echo $payMetal1FnWt; ?>" name="<?php echo $payMetal1FnWt; ?>" type="text" placeholder="Fine Weight" value="<?php echo $invRecFNWT; ?>"
                                   onkeydown="javascript:if (event.keyCode == 13) {
                                               document.getElementById('<?php echo $payMetal1Rate; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('<?php echo $payMetal1Tunch; ?>').focus();
                                               return false;
                                           }"
                                   onblur="calcStockItemBalance();
                                           return false;"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                   autocomplete="off" spellcheck="false" class="input_border_grey_center" size="6" maxlength="12" readonly="true" />
                        </td>
                        <td align="left" class="itemAddPnLabels14" width="75px">
                            <input id="<?php echo $payMetal1Rate; ?>" name="<?php echo $payMetal1Rate; ?>" type="text" placeholder="Rate" value="<?php echo $metalRate; ?>"
                                   onkeydown="javascript:if (event.keyCode == 13) {
                                               document.getElementById('<?php echo $payMetal1Val; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('<?php echo $payMetal1Tunch; ?>').focus();
                                               return false;
                                           }"
                                   onblur="javascript:calcStockItemBalance();
                                           return false;"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                   autocomplete="off" spellcheck="false" class="input_border_grey_center" size="7" maxlength="15" />
                        </td>
                        <td align="left" class="itemAddPnLabels14" width="100px">
                            <input id="<?php echo $payMetal1Val; ?>" name="<?php echo $payMetal1Val; ?>" type="text" placeholder="Valuation" value="<?php echo $invMetVal; ?>"
                                   onkeydown="javascript:if (event.keyCode == 13) {
                                               document.getElementById('<?php echo $payMetal1Bal; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('<?php echo $payMetal1Rate; ?>').focus();
                                               return false;
                                           }"
                                   onchange="javascript:changeMetalRateByVal('<?php echo $prefix; ?>', '<?php echo $metalCount; ?>');
                                           calcStockItemBalance();
                                           return false;"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                   autocomplete="off"  spellcheck="false" class="input_border_grey_center" size="8" maxlength="15" />
                        </td>
                        <td align="left" class="itemAddPnLabels14" width="75px">
                            <input id="<?php echo $payMetal1AvgRate; ?>" name="<?php echo $payMetal1AvgRate; ?>" type="text" placeholder="Avg Rate" value="<?php echo $metalAvgRate; ?>"
                                   onkeydown="javascript:if (event.keyCode == 13) {
                                               document.getElementById('<?php echo $payMetal1Val; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('<?php echo $payMetal1Tunch; ?>').focus();
                                               return false;
                                           }"
                                   onblur="javascript:calcStockItemBalance();
                                           return false;"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                   autocomplete="off" spellcheck="false" class="input_border_grey_center" size="7" maxlength="15" />
                        </td>
                        <td align="left" class="itemAddPnLabels14" width="75px">
                            <input id="<?php echo $payMetal1Pnl; ?>" name="<?php echo $payMetal1Pnl; ?>" type="text" placeholder="Profit/Loss" value="<?php echo $metalProfitNLoss; ?>"
                                   onkeydown="javascript:if (event.keyCode == 13) {
                                               document.getElementById('<?php echo $payMetal1Val; ?>').focus();
                                               return false;
                                           } else if (event.keyCode == 8 && this.value == '') {
                                               document.getElementById('<?php echo $payMetal1Tunch; ?>').focus();
                                               return false;
                                           }"
                                   onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                   autocomplete="off" spellcheck="false" class="input_border_grey_center" size="7" maxlength="15" />
                        </td>
                        <td align="left" class="itemAddPnLabels14" width="140px" colspan="2">
                            <table>
                                <tr>
                                    <td>
                                        <input id="<?php echo $payMetal1Bal; ?>" name="<?php echo $payMetal1Bal; ?>" type="hidden" placeholder="Due Weight" value="<?php echo $metalDueBal; ?>"
                                               onkeydown="javascript:if (event.keyCode == 13) {
                                                           document.getElementById('<?php echo $payMetal1BalType; ?>').focus();
                                                           return false;
                                                       } else if (event.keyCode == 8 && this.value == '') {
                                                           document.getElementById('<?php echo $payMetal1Val; ?>').focus();
                                                           return false;
                                                       }"
                                               onkeypress="javascript:return valKeyPressedForNumNDot(event);"    
                                               autocomplete="off" spellcheck="false" class="input_border_grey_center" size="6" maxlength="15"/>
                                    </td>
                                    <td>
                                        <input id="<?php echo $payMetal1BalType; ?>" name="<?php echo $payMetal1BalType; ?>" type="hidden" placeholder="Due WeightType" value="<?php echo $metalDueBalType; ?>"
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
                                               autocomplete="off" spellcheck="false" class="input_border_grey_center" size="3" maxlength="4"/>
                                    </td>
                                </tr>
                            </table>
                        </td>
<?php
//                        echo '$payPanelName:'.$payPanelName;
if ($payPanelName != 'StockPayUp' && $payPanelName != 'SellPayUp' &&
        $payPanelName != 'ItemRepairPayUp' &&
        $payPanelName != 'SellItemReturn' && $payPanelName != 'SellItemReturnUp' &&
        $payPanelName != 'CustSellPayUp' && $payPanelName != 'RawPayUp' &&
        $payPanelName != 'NwOrPayUp' && $payPanelName != 'InvoicePayUp' &&
        $payPanelName != 'SuppOrderDeliveryUp' && $payPanelName != 'SuppOrderUp' &&
        $payPanelName != 'NwOrDelPaymentUp') { //add panel for order panel prev balance :Author:SANT30NOV16
    ?>
                            <td align = "right" width = "20px">
                                <a style = "cursor: pointer;"
                                   onclick = "
                                               if (document.getElementById('metalDiv<?php echo $metalCount; ?>').value == '' || document.getElementById('metalDiv<?php echo $metalCount; ?>').value == 'true') {
                                                   getWholeMoreRawMetalDiv('<?php echo $metalCount + 1; ?>', '<?php echo $payPanelName; ?>',
                                                           '<?php echo $firmIdSelected; ?>', '<?php echo $rawGdPreId; ?>', '<?php echo $rawGdPostId; ?>',
                                                           'Gold', '<?php echo $rawSlPreId; ?>', '<?php echo $rawSlPostId; ?>', '<?php echo $rawAlPreId; ?>', '<?php echo $rawAlPostId; ?>', 'rawMoreMetalPanel', '<?php echo $mcntr; ?>',
                                                           document.getElementById('<?php echo $payRawGoldPreId; ?>').value, document.getElementById('<?php echo $payRawGoldPostId; ?>').value, '<?php echo $goldPurchaseAvgRate; ?>', '<?php echo $silverPurchaseAvgRate; ?>', '<?php echo $userId; ?>');
                                               }">
                                    <img src = "images/update16.png" alt = "Click Here To Add More Raw Metal" class = "marginTop5"
                                    <?php
                                    if ($payPanelName == 'SlPrPayment' && $noOfEstimateReceivedRawMet > 0) { ?>
                                        onload="setTimeout(function () {
                                                    calcStockItemBalance();
                                                }, 1000);" 
                                    <?php } ?>   
                                    />
                                </a>
                            </td>
                            <td align = "right" width = "20px">
    <?php if ($metalCount != 1) {
        ?>
                                    <a style="cursor: pointer;" onclick ="closeStockRawMetalDiv('<?php echo $metalCount; ?>', '<?php echo $payPanelName; ?>')" >
                                        <img src="<?php echo $documentRoot; ?>/images/delete16.png"  alt="" class="marginTop5" 
                                    <?php
                                    if ($metalCount > 1 &&
                                        $payPanelName != 'StockPayUp' &&
                                        $payPanelName != 'SellPayUp' &&
                                        $payPanelName != 'ItemRepairPayUp' &&
                                        $payPanelName != 'CustSellPayUp') { ?>
                                        onload="document.getElementById('<?php echo $payMetalType1; ?>').focus();" 
                                    <?php } ?>/>
                                    </a>
    <?php } ?>
                            </td>
                                <?php
                            }
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
