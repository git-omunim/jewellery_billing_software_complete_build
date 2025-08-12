<?php
/*
 * **************************************************************************************
 * @tutorial: SELL METAL FORM B2 - PRODUCT DETAILS DIV FILE @PRIYANKA-08MAR2021
 * **************************************************************************************
 * 
 * Created on MARCH 08, 2021 01:38:00 PM
 *
 * @FileName: omspindv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 2.7.37
 * @Copyright (c) 2021 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2021 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR: @PRIYANKA-08MAR2021
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
include_once 'ommpcmfcc.php';
?>
<?php if ($panelName != 'SellValues') { ?>
<div id="slPrCurrentInvBeforePay">
<?php } ?>
<?php
//
//
//echo '$utin_currency_change_chk == ' . $utin_currency_change_chk . '<br />';
//
//$currencyPrice = '60';
//
//
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
// End Code To Select FirmId
// 
// print_r($_REQUEST);
// 
// Start code to Change File
$sessionOwnerId = $_SESSION[sessionOwnerId];
$newItemPreId = $_GET['srchItemPreId'];
$newItemPostId = $_GET['srchItemPostId'];
$custId = $_GET['custId'];
$slPrItemPreId = $_GET['slPrItemPreId'];
//
$accCrId = $_REQUEST['accCrId'];
//
//echo '$accCrId11==='.$accCrId;
//
$errorMess = $_GET['errorMess'];
if ($errorMess != NULL || $errorMess != '') {
    echo $errorMess;
}
if ($sellPanelName == '' || $sellPanelName == NULL) {
    $sellPanelName = $_GET['panelName'];
}
//
// print_r($_REQUEST);
// 
// echo '$sellPanelName:'.$sellPanelName;
//
if ($payPanelName == '' || $payPanelName == NULL) {
    $payPanelName = $_GET['paymentPanelName'];
}
//
if ($slPrInvoiceNo == '') {
    $slPrPreInvoiceNo = $_GET['preInvoiceNo'];
    $slPrInvoiceNo = $_GET['postInvoiceNo'];
}
//
if ($payPreInvoiceNo == '') {
    $payPreInvoiceNo = $_GET['preInvoiceNo'];
}
//
if ($payInvoiceNo == '') {
    $payInvoiceNo = $_GET['postInvoiceNo'];
}
//
if ($mainPanel == '') {
    $mainPanel = $_GET['mainPanel'];
}
//
if ($otherChgsBy == '') {
    $otherChgsBy = $_GET['otherChgsBy'];
}
//
$rateCutOption = $_GET['rateCutOption'];
//
if ($slprinPanel == '') {
    $slprinPanel = $_GET['slprinPanel'];
}
//
if ($strFrmId == '') {
    $strFrmId = $_GET['strFrmId'];
}
//
// *******************************************************************************
// START CODE TO GET FINE JEWELLERY DEFAULT FORM OPTION 
// *******************************************************************************
//
$selDefaultFormOptionQuery = "SELECT omly_value FROM omlayout WHERE omly_option = 'DefaultFormOption'";
$resDefaultFormOption = mysqli_query($conn, $selDefaultFormOptionQuery);
$rowDefaultFormOption = mysqli_fetch_array($resDefaultFormOption);
$DefaultFormOption = $rowDefaultFormOption['omly_value'];
//
// *****************************************************************************
// END CODE TO GET FINE JEWELLERY DEFAULT FORM OPTION 
// *****************************************************************************
//
if ($panelName != 'SellValues') { ?>
        <table border="0" cellspacing="0" cellpadding="0" width="100%" align="left">
        <?php
        }
        if ($payPanelName == '') {
            $payPanelName = $_GET['paymentPanelName'];
        }
        //
        if ($sellPanelName == '') {
            $sellPanelName = $_GET['sellPanelName'];
        }
        //
        if ($panelName == 'SellValues') {
            $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and  sttr_pre_invoice_no='$payPreInvoiceNo' and "
                                 . "sttr_invoice_no='$payInvoiceNo' and sttr_firm_id IN ($strFrmId) and sttr_indicator='stock' and sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_status NOT IN('DELETED') and sttr_user_id='$custId'";
        } 
        else if ($sellPanelName == 'SellPayUp' || $sellPanelName == 'SellDetUpPanel' || 
                 $sellPanelName == 'SellItemReturn' || $sellPanelName == 'SellItemReturnUp' || 
                 $sellPanelName == 'finalOrderUp') {
            $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_pre_invoice_no='$slPrPreInvoiceNo' and "
                                 . "sttr_invoice_no='$slPrInvoiceNo' and sttr_firm_id IN ($strFrmId) and sttr_indicator='stock' and sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_status NOT IN('DELETED') and sttr_user_id='$custId'";
        } 
        else if ($panelName == 'StockReturnPanel') {
            $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_pre_invoice_no='$slPrPreInvoiceNo' and "
                                 . "sttr_invoice_no='$slPrInvoiceNo' and sttr_firm_id IN ($strFrmId) and sttr_indicator='ItemReturn' and sttr_transaction_type='ItemReturn' and sttr_status NOT IN('DELETED') and sttr_user_id='$custId'";
        } 
        else {
            $qSelSlPrItemDetails = "SELECT * FROM stock_transaction where sttr_owner_id='$sessionOwnerId' and sttr_status='PaymentPending'"
                                 . " and sttr_firm_id IN ($strFrmId) and sttr_indicator='stock' and sttr_transaction_type IN ('sell','ESTIMATESELL') and sttr_status NOT IN('DELETED') and sttr_user_id='$custId'";
        }
        //
        // echo $qSelSlPrItemDetails;
        //
        if ($omly_value == '') {
            parse_str(getTableValues("SELECT omly_value FROM omlayout WHERE omly_option = 'sellAutoEntry'"));
        }
        //
        // print_r($_REQUEST);
        //
        $resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
        $noOfItemsAvail = mysqli_num_rows($resSlPrItemDetails);
        $listName = 'PURCHASE LIST';
        ?>
        <tr>
            <td align="left" colspan="16" class="paddingTop4 padBott4">
                <table border="0" cellspacing="0" cellpadding="0" align="center" width='100%'>
                    <?php
                    include 'omspinvn.php';
                    ?>
                </table>    
            </td>
        </tr> 
        <?php
        if ($panelName != 'SellValues' && $sellPanelName != 'ItemApproval' && 
            $sellPanelName != 'ItemApprovalUp' && ($goldTotGrossWt > 0 || $silverTotGrossWt > 0)) {
            ?>
            <tr>
                <td align="center" colspan="16">
                    <?php
                    //
                    $payPreInvoiceNo = $slPrPreInvoiceNo;
                    $payInvoiceNo = $slPrInvoiceNo;
                    //
                    if ($userId == '')
                        $userId = $custId;
                    //
                    if ($sellPanelName == 'StockPurchasePanel')
                        $payPanelName = 'SlPrPayment';
                    else
                        $payPanelName = $sellPanelName;
                    //
                    if ($mainPanel == 'orderPickStock')
                        $ordDelv = 'orderPickStock';
                    //
                    $mainPanel = 'stock';
                    //
                    //echo 'utin_pay_tax_on_total_amt_chk @@== '.$utin_pay_tax_on_total_amt_chk.'<br />';
                    //
                    //echo '$utin_oth_chgs_amt @@== ' . $utin_oth_chgs_amt . '<br />';
                    //echo '$totalMakingCharges @@== ' . $totalMakingCharges . '<br />';
                    //echo '$totalFinalBalance @@== ' . $totalFinalBalance . '<br />';
                    //echo '$goldFinalVal @@== ' . $goldFinalVal . '<br />';
                    //echo '$silverFinalVal @@== ' . $silverFinalVal . '<br />';
                    //echo '$totalLabOrMkgCharges @@== ' . $totalLabOrMkgCharges . '<br />';
                    //echo '$slPrItemFinalVal @@== ' . $slPrItemFinalVal . '<br />';
                    //echo '$slPrCryValuation @@== ' . $slPrCryValuation . '<br />';
                    //echo '$slPrItemValuation @@== ' . $slPrItemValuation . '<br />';
                    //echo '$sttr_metal_amt @@== ' . $sttr_metal_amt . '<br />';
                    //echo '$sttr_total_making_charges @@== ' . $sttr_total_making_charges . '<br />';
                    //echo '$totalSilverBalance @@== ' . $totalSilverBalance . '<br />';
                    //echo '$totalGoldBalance @@== ' . $totalGoldBalance . '<br />';
                    //echo '$utin_total_amt @@== ' . $utin_total_amt . '<br />';
                    //
                    if ($currencyPrice != '' && $currencyPrice != NULL && $currencyPrice != 'undefined') {
                        //
                        $utin_oth_chgs_amt = decimalVal(($utin_oth_chgs_amt / $currencyPrice), 2);
                        //   
                        $totalMakingCharges = decimalVal(($totalMakingCharges / $currencyPrice), 2);
                        //    
                        $totalFinalBalance = decimalVal(($totalFinalBalance / $currencyPrice), 2);
                        //
                        $goldFinalVal = decimalVal(($goldFinalVal / $currencyPrice), 2);
                        //    
                        $silverFinalVal = decimalVal(($silverFinalVal / $currencyPrice), 2);
                        //
                        $totalLabOrMkgCharges = decimalVal(($totalLabOrMkgCharges / $currencyPrice), 2);
                        //
                        $slPrItemFinalVal = decimalVal(($slPrItemFinalVal / $currencyPrice), 2);
                        //
                        $slPrCryValuation = decimalVal(($slPrCryValuation / $currencyPrice), 2);
                        //
                        $slPrItemValuation = decimalVal(($slPrItemValuation / $currencyPrice), 2);
                        //
                        $sttr_metal_amt = decimalVal(($sttr_metal_amt / $currencyPrice), 2);
                        //
                        $sttr_total_making_charges = decimalVal(($sttr_total_making_charges / $currencyPrice), 2);
                        //
                        $totalSilverBalance = decimalVal(($totalSilverBalance / $currencyPrice), 2);
                        //
                        $totalGoldBalance = decimalVal(($totalGoldBalance / $currencyPrice), 2);
                        //
                        $utin_total_amt = decimalVal(($utin_total_amt / $currencyPrice), 2);
                        //
                        $utin_crystal_amt = decimalVal(($utin_crystal_amt / $currencyPrice), 2);
                    }
                    //
                    //
                    //echo '<br /><br />';
                    //echo '$utin_oth_chgs_amt @@##== ' . $utin_oth_chgs_amt . '<br />';
                    //echo '$totalMakingCharges @@##== ' . $totalMakingCharges . '<br />';
                    //echo '$totalFinalBalance @@##== ' . $totalFinalBalance . '<br />';
                    //echo '$goldFinalVal @@##== ' . $goldFinalVal . '<br />';
                    //echo '$silverFinalVal @@##== ' . $silverFinalVal . '<br />';
                    //echo '$totalLabOrMkgCharges @@##== ' . $totalLabOrMkgCharges . '<br />';
                    //echo '$slPrItemFinalVal @@##== ' . $slPrItemFinalVal . '<br />';
                    //echo '$slPrCryValuation @@##== ' . $slPrCryValuation . '<br />';
                    //echo '$slPrItemValuation @@##== ' . $slPrItemValuation . '<br />';
                    //echo '$sttr_metal_amt @@##== ' . $sttr_metal_amt . '<br />';
                    //echo '$sttr_total_making_charges @@##== ' . $sttr_total_making_charges . '<br />';
                    //echo '$totalSilverBalance @@##== ' . $totalSilverBalance . '<br />';
                    //echo '$totalGoldBalance @@##== ' . $totalGoldBalance . '<br />';
                    //echo '$utin_total_amt @@##== ' . $utin_total_amt . '<br />';
                    //
                    //
                    if ($sellPanelName != 'SellDetUpPanel' && $sellPanelName != 'SellPayUp' &&
                        $sellPanelName != 'EstimateUpdate' && $sellPanelName != 'EstimatePayUp' &&
                        $sellPanelName != 'SellItemReturnUp' && $sellPanelName != 'finalOrderUp') {
                        //
                        //
                        // 
                        // ***********************************************************************************************************************
                        // START CODE FOR BILL DISCOUNT ON / OFF SETTING @AUTHOR-PRIYANKA-03DEC2020
                        // ***********************************************************************************************************************
                        $selBillDiscOnOffSettingQuery = "SELECT omly_value FROM omlayout WHERE "
                                                      . "omly_option = 'BillDiscountOnOff'";
                        //
                        $resBillDiscOnOffSetting = mysqli_query($conn, $selBillDiscOnOffSettingQuery);
                        $rowBillDiscOnOffSetting = mysqli_fetch_array($resBillDiscOnOffSetting);
                        $BillDiscountOnOff = $rowBillDiscOnOffSetting['omly_value'];
                        // ***********************************************************************************************************************
                        // END CODE FOR BILL DISCOUNT ON / OFF SETTING @AUTHOR-PRIYANKA-03DEC2020
                        // ***********************************************************************************************************************
                        //
                        //
                        // ********************************************************************************************************
                        // START CODE TO CHECK BILL DISCOUNT IS APPLICABLE OR NOT @PRIYANKA-10NOV2020
                        // ********************************************************************************************************
                        if ($BillDiscountOnOff == 'ON' &&
                           ($_SESSION['sessionOwnIndStr'][35] == 'A' ||
                            $_SESSION['sessionOwnIndStr'][35] == 'B')) {
                            //
                            //include 'omSellSetBillDiscount.php';
                            //
                        }
                        // ********************************************************************************************************
                        // END CODE TO CHECK BILL DISCOUNT IS APPLICABLE OR NOT @PRIYANKA-10NOV2020
                        // ********************************************************************************************************
                    }
                    //
                    //
                    $utin_prev_amt_CRDR = 'DR';
                    $utin_CRDR = 'DR'; // CHANGE CRDR FOR SELL ENTRY @PRIYANKA-26MAY18
                    //
                    //
                    //echo '$sellPanelName == ' . $sellPanelName . '<br />';
                    //
                    //
                    if ($sellPanelName != 'SellDetUpPanel' && $sellPanelName != 'SellPayUp' &&
                        $sellPanelName != 'EstimateUpdate' && $sellPanelName != 'EstimatePayUp' &&
                        $sellPanelName != 'SellItemReturnUp' && $sellPanelName != 'finalOrderUp') {
                        //
                        $paymentMode = 'NoRateCut';
                        $setByDefaultPaymentMode = 'NoRateCut';
                        //
                    } 
                    else {
                        $hideCashButtonOnPaymentPanel = 'YES';
                    }
                    //
                    //
                    //echo '$paymentMode == ' . $paymentMode . '<br />';
                    //echo '$setByDefaultPaymentMode == ' . $setByDefaultPaymentMode . '<br />';
                    //
                    //
                    include 'ompyamt.php';
                    //
                    //
                    ?>
                </td>
            </tr>
        <?php
        }
        if ($panelName != 'SellValues') { ?>
        </table>
    </div>
<?php } ?>