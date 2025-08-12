<?php
/*
 * Created on Sep 15, 2011 11:35:16 AM
 *
 * @FileName: omuudtdv.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: oMunim
 * @version 1.0
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2010 SoftwareGen, Inc
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
require_once 'ommpfndv.php';
require_once 'nepal/nepali-date.php';
$nepali_date = new nepali_date();
?>
<?php
//
//print_r($_REQUEST);
//
/* START CODE TO GET NEW UDHAAR DATE,@AUTHOR:HEMA-23OCT2020 */
$selNewUdhaarDate = "SELECT * FROM user_transaction_invoice WHERE utin_utin_id = '$rowAllUdhaar[utin_id]' ORDER BY utin_id desc LIMIT 0,1";
//
//echo 'selNewUdhaarDate == ' . $selNewUdhaarDate . '<br />';
//
$udhaarId = $rowAllUdhaar[utin_id];
$resNewUdhaarDate = mysqli_query($conn, $selNewUdhaarDate);
$rowNewUdhaarDate = mysqli_fetch_assoc($resNewUdhaarDate);
$newUdhaarDate = $rowNewUdhaarDate['utin_date'];
/* END CODE TO GET NEW UDHAAR DATE,@AUTHOR:HEMA-23OCT2020 */
//
//
// FOR TRANS TYPE / INVOICE NUMBER
parse_str(getTableValues("SELECT utin_transaction_type AS sellTransType, "
                . "utin_pre_invoice_no AS preInvoiceNo, "
                . "utin_invoice_no AS postInvoiceNo "
                . "FROM user_transaction_invoice "
                . "WHERE utin_id = '$utin_utin_id'"));
//
//
if ($sellTransType == 'sell' || $sellTransType == 'ESTIMATESELL' || $sellTransType == 'APPROVAL') {
//
//echo '$preInvoiceNo == ' . $preInvoiceNo . '<br />';
//echo '$postInvoiceNo == ' . $postInvoiceNo . '<br />';
//echo '$custId == ' . $custId . '<br />';
//echo '$firmId == ' . $firmId . '<br />';
//echo '$documentRootBSlash == ' . $documentRootBSlash . '<br />';
//echo '$documentRoot == ' . $documentRoot . '<br />';
//    
    parse_str(getTableValues("SELECT sttr_id AS slPrId, "
                    . "sttr_panel_name AS setupPanelName, "
                    . "sttr_stock_type AS stockType, "
                    . "sttr_indicator AS indicator, "
                    . "sttr_sttrin_id AS sttrSttrInId "
                    . "FROM stock_transaction "
                    . "WHERE sttr_utin_id = '$utin_utin_id' "
                    . "AND sttr_transaction_type IN ('sell', 'ESTIMATESELL', 'APPROVAL') "
                    . "AND sttr_indicator NOT IN ('stockCrystal', 'RECEIVED') "
                    . "AND sttr_pre_invoice_no = '$preInvoiceNo'  AND sttr_invoice_no = '$postInvoiceNo' "
                    . "AND sttr_user_id = '$custId'"));
//
    $invoiceNo = $preInvoiceNo . ' ' . $postInvoiceNo;
//
    $div = 'cust_middle_body';
//
//
//echo '$invoiceNo == ' . $invoiceNo . '<br />';
//echo '$slPrId == ' . $slPrId . '<br />';
//echo '$setupPanelName == ' . $setupPanelName . '<br />';
//echo '$stockType == ' . $stockType . '<br />';
//echo '$indicator == ' . $indicator . '<br />';
//echo '$sttrSttrInId == ' . $sttrSttrInId . '<br />';
//
//
}
//
//
//echo 'utin_id == ' . $rowAllUdhaar['utin_id'] . '<br />';
//echo 'utin_utin_id == ' . $utin_utin_id . '<br />';
//echo 'sellTransType == ' . $sellTransType . '<br />';
//
//
// Start to get access values for subfields in form @AUTHOR: SANDY15AUG13
$staffId = $_SESSION['sessionStaffId'];
//
//
include 'ommpsbac.php';
//
//
// End to get access values for subfields in form @AUTHOR: SANDY15AUG13
$form8Lay = callOmLayoutTable('form8Lay', '', '');
if ($form8Lay == 'form8Lay4Inch' || $form8Lay == 'form8LayA6') {
    $frm8Width = 420;
    $frm8Height = 660;
} else if ($form8Lay == 'form8LayA5') {
    $frm8Width = 550;
    $frm8Height = 630;
} else {
    $frm8Width = 810;
    $frm8Height = 930;
}
//
//
$panelDetails = $_GET['panelName'];
//
//
// **********************************************************************************
// START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// **********************************************************************************
//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
$selNepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
$resNepaliDateMonthFormat = mysqli_query($conn, $selNepaliDateMonthFormat);
$rowNepaliDateMonthFormat = mysqli_fetch_array($resNepaliDateMonthFormat);
$nepaliDateMonthFormat = $rowNepaliDateMonthFormat['omly_value'];
//
// ********************************************************************************
// END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
// ********************************************************************************
//
//
//echo '$udhaarType == ' . $udhaarType . '<br />';
//echo '$udhaarAmt == ' . $udhaarAmt . '<br />';
//
//
?>
<div id="girviDetailsDiv">
    <div class="textBoxCurve1px backFFFFFF paddingTop2 paddingBott2 paddingLeft2 paddingRight2"  style="background:#fffce5;border-radius:3px;border:1px dashed #b2a002;padding:5px;margin-bottom:10px;">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <td valign="top" class="ff_arial fs_14 fw_b paddingTop2">
                <?php echo $udCounter . '.'; ?>
            </td>
            <td>
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td align="left" valign="top">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="left" valign="top" colspan="10">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>  
                                                <td align="left" valign="bottom"  class="ff_calibri fs_13 brown" style="font-size:14px;"><b>UDHAAR AMOUNT &nbsp; :</b></td>
<!-- <a style="cursor:pointer;" onclick="getUdhaarUpdateDiv('<?php echo $udhaarId; ?>', '');">
                                                                                                        </a>-->
                                                <td align="right"  valign="top" class="paddingLeft5 ff_calibri fs_14 bold" title="Click to update udhaar details ! ">
                                                    <?php if ($udhaarType == 'OnPurchase' && ($sellTransType == 'sell' || $sellTransType == 'ESTIMATESELL')) { ?>

                                                        <?php if ($_SESSION['sessionProdVer'] == 'OMUNIM3.0.0') { ?>
                                                            <a style="cursor:pointer; color: red"  
                                                               class="ff_calibri fs_14 greenFont"  
                                                               <?php if (($staffId == '') || ($staffId != '' && $array['updateUdhaarAccess'] == 'true' && $array['updateTransactionForAllPanel'] == 'true')) { ?>            onclick="stock_transaction_invoice_update_operation('<?php echo $utin_utin_id; ?>', '<?php echo $custId; ?>',
                                                                                           '<?php echo $firmId; ?>', 'update', '<?php echo $preInvoiceNo; ?>', '<?php echo $postInvoiceNo; ?>',
                                                                                           'sell', '<?php echo $stockType; ?>', '<?php echo $indicator; ?>',
                                                                                           '<?php echo $setupPanelName; ?>',
                                                                                           'SellPayUp', 'SellPayUp', '<?php echo $div; ?>', '<?php echo $sttrSttrInId; ?>');" <?php } ?>>
                                                                <span style="border:0px solid; width:80px; text-align: right;">
                                                                    <?php echo formatInIndianStyle($udhaarMainAmt); ?>
                                                                </span>
                                                            </a>
                                                        <?php } else if ($setupPanelName == 'FINE_JEWELLERY_SELL_B2') { ?>
                                                            <a style="cursor:pointer; color: red"  
                                                               class="ff_calibri fs_14 greenFont"  
                                                               <?php if (($staffId == '') || ($staffId != '' && $array['updateUdhaarAccess'] == 'true' && $array['updateTransactionForAllPanel'] == 'true')) { ?>            onclick="showSellMetalFormB2UpdatePanel('<?php echo $documentRoot; ?>', '<?php echo $custId; ?>', '<?php echo $slPrId; ?>', 'SellPayUp', '<?php echo $invoiceNo; ?>', '');" <?php } ?>>
                                                                <span style="border:0px solid; width:80px; text-align: right;">
                                                                    <?php echo formatInIndianStyle($udhaarMainAmt); ?>
                                                                </span>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a style="cursor:pointer; color: red"  
                                                               class="ff_calibri fs_14 greenFont"  
                                                               <?php if (($staffId == '') || ($staffId != '' && $array['updateUdhaarAccess'] == 'true' && $array['updateTransactionForAllPanel'] == 'true')) { ?>     onclick="showSellDetUpdatePanel('<?php echo $documentRoot; ?>', '<?php echo $custId; ?>', '<?php echo $slPrId; ?>', 'SellPayUp', '<?php echo $invoiceNo; ?>', '', '', '');" <?php } ?>>
                                                                <span style="border:0px solid; width:80px; text-align: right;">
                                                                    <?php echo formatInIndianStyle($udhaarMainAmt); ?>
                                                                </span>
                                                            </a>
                                                        <?php } ?>

                                                        <?php
                                                    } else if ($udhaarType == 'OnPurchase' || $udhaarOtherInfo == 'OPENING BALANCE') {
                                                        echo $udhaarMainAmt;
                                                    } else {
                                                        ?>
                                                        <a style="cursor:pointer; color: red"  class="ff_calibri fs_14 greenFont"   <?php if (($staffId == '') || ($staffId != '' && $array['updateUdhaarAccess'] == 'true' && $array['updateTransactionForAllPanel'] == 'true')) { ?>  onclick="getUdhaarUpdateDiv('<?php echo $udhaarId; ?>', 'custUdhaarDetailsPrintDiv');"  <?php } ?>><span style="border:0px solid; width:80px; text-align: right;"><?php echo formatInIndianStyle($udhaarMainAmt); ?></span></a>
                                                    <?php } ?>
                                                </td>


                                                <td align="right" valign="bottom"><div class="spaceLeft30 ff_calibri fs_13 brown" style="font-size:14px;"><b>&nbsp;&nbsp; UDHAAR DATE &nbsp;:&nbsp;</b></div></td>
                                                <td align="left" valign="bottom">
                                                    <div class="ff_calibri fs_14 greenFont">
                                                        <?php
                                                     if ($nepaliDateIndicator == 'YES') {
                                                                $day_en = substr($udhaarDOB, 0, 2);
                                                                $selMnth = substr($udhaarDOB, 3, -5);
                                                                $year_en = substr($udhaarDOB, -4);
                                                                //
                                                                if (preg_match("/^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC|Aug|Jan|Feb|Mar|Apr|May|Jun|Jul|Sep|Oct|Nov|Dec)$/", $selMnth)) {
                                                                    // Convert the month abbreviation to its numeric representation (zero-padded)
                                                                    $selMnth = date('m', strtotime($selMnth));
                                                                }
                                                                $girviDOBDate = $nepali_date->validate_en($year_en, $selMnth, $day_en);
                                                                if ($girviDOBDate != '1' || $girviDOBDate != 'TRUE') {
                                                                    $girviDOBArray = explode(' ', $udhaarDOB);
                                                                    if (is_numeric($girviDOBArray[1])) {
                                                                        $girviDOBMnth = $nepali_date->get_nepali_month($girviDOBArray[1]);
                                                                    }
                                                            if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                        echo $girviDOBArray[0] . ' ' . $girviDOBArray[1] . ' ' . $girviDOBArray[2];
                                                            } else {
                                                                        echo $girviDOBArray[0] . ' ' . $girviDOBMnth . ' ' . $girviDOBArray[2];
                                                            }
                                                        } else {
                                                                    $date_ne = $nepali_date->get_nepali_date($year_en, $selMnth, $day_en);
                                                                    if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                        echo $date_ne[d] . ' ' . $date_ne[m] . ' ' . $date_ne[y];
                                                                    } else {
                                                                        echo $date_ne[d] . ' ' . $date_ne[M] . ' ' . $date_ne[y];
                                                                    }
                                                                }
                                                        } else {
                                                            echo $udhaarDOB;
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                                <!------------------START CODE TO ADD OPTION TO SHOW NEW UDHAAR DATE,@AUTHOR:HEMA-23OCT2020-------------->
                                                <?php if ($udhaarIntChk == 'true') { ?>
                                                    <td align="right" valign="bottom"><div class="spaceLeft30 ff_calibri fs_13 brown" style="font-size:14px;"><b>&nbsp;&nbsp; NEW UDHAAR DATE &nbsp;:&nbsp;</b></div></td>
                                                    <td align="left" valign="bottom"><div class="ff_calibri fs_14 greenFont" style="color:blue;"><?php echo $newUdhaarDate; ?></div></td>
                                                <?php } ?>
                                                <!------------------END CODE TO ADD OPTION TO SHOW NEW UDHAAR DATE,@AUTHOR:HEMA-23OCT2020-------------->
                                                <td align="right" valign="bottom" class="ff_calibri fs_13 brown"><div class="spaceLeft30" style="font-size:14px;"><b>&nbsp;UDHAAR TYPE &nbsp;:&nbsp;</b></div></td>
                                                <td align="left" valign="bottom"><div class="ff_calibri fs_14 greenFont"><?php echo $udhaarType; ?></div></td>
                                                <!-------Start code to add udhaar wt @Author:PRIYA26FEB15----------------->
                                                <?php if ($udhaarGdWt != 0) { ?>
                                                    <td align="right" valign="bottom" class="ff_calibri fs_13 brown"><div class="spaceLeft30" style="font-size:14px;">GD WT:</div></td>
                                                    <td align="left" valign="bottom"><div class="spaceLeft5"><?php echo $udhaarGdWt . ' ' . $udhaarGdWtTyp; ?></div></td>
                                                <?php } if ($udhaarSrWt != 0) { ?>
                                                    <td align="right" valign="bottom" class="ff_calibri fs_13 brown"><div class="spaceLeft30" style="font-size:14px;">SR WT:</div></td>
                                                    <td align="left" valign="bottom"><div class="spaceLeft5"><?php echo $udhaarSrWt . ' ' . $udhaarSrWtTyp; ?></div></td>
                                                <?php } ?>
                                                <!-------End code to add udhaar wt @Author:PRIYA26FEB15----------------->
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php
                                /*                                 * ***************Start code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-28JUN17*********************** */
                                $qSelAllUdhaarDepMon = "SELECT * FROM user_transaction_invoice "
                                        . "where utin_owner_id='$_SESSION[sessionOwnerId]' "
                                        . "and utin_user_id='$custId' "
                                        . "and utin_utin_id='$udhaarId' "
                                        . "and (utin_EMI_status IN ('Paid') or utin_EMI_status IS NULL) "
                                        . "and (utin_type IN ('udhaar','OnPurchase') OR utin_type IS NULL) "
                                        . "and utin_transaction_type IN ('UDHAAR DEPOSIT','UDHAAR','OnPurchase') "
                                        . "AND utin_utin_id<>'' order by STR_TO_DATE(utin_date,'%d %b %Y') asc"; //add NULL condition @Author:SHRI29MAY15  //add  discount column  @Author:SHE19OCT15
                                //
                                //echo '$qSelAllUdhaarDepMon===='.$qSelAllUdhaarDepMon;
                                //
                                $resAllUdhaarDepMon = mysqli_query($conn, $qSelAllUdhaarDepMon)or die(mysqli_error($conn));
                                //
                                $udhaarDepHistory = '';
                                $udhaarTotalDepAmount = 0;
                                $udhaarDepDiv = 1;
                                $udhaarTotalDiscAmt = 0; // Start Code To Add Discount sum  @Author:SHE19OCT15
                                $totalCash = 0;
                                $totalBank = 0;
                                $udhaardiscount = 0;
                                $totaldeposit = 0;
                                $udhaarDepDOB = '';
                                while ($rowUdhaarDepMon = mysqli_fetch_array($resAllUdhaarDepMon, MYSQLI_ASSOC)) {
                                    $udhaarDepId = $rowUdhaarDepMon['utin_id'];
                                    $udhaarDepAmount = $rowUdhaarDepMon['utin_total_amt_deposit'];
                                    $udhaarIntAmount = $rowUdhaarDepMon['utin_udhaar_int_amt']; //CODE ADDED TO GET UDHAAR INTEREST DEPOSITED AMOUNT,@AUTHOR:HEMA-23OCT2020
                                    $totalUdaarIntAmt += $udhaarIntAmount;
                                    //
                                    //echo '$udhaarDepAmount1233====='.$udhaarDepAmount;
                                    //
                                    if ($udhaarDepAmount == NULL || $udhaarDepAmount == '')
                                        $udhaarDepAmount = $rowUdhaarDepMon['utin_cash_amt_rec'] + $rowUdhaarDepMon['utin_pay_cheque_amt'] + ($rowUdhaarDepMon['utin_pay_card_amt'] + $rowUdhaarDepMon['utin_pay_trans_chrg']) + ($rowUdhaarDepMon['utin_online_pay_amt'] - $rowUdhaarDepMon['utin_pay_comm_paid']);
                                    //
                                    //$udhaarDiscAmount = $rowUdhaarDepMon['utin_discount_amt']; //fetch discount column  @Author:SHE19OCT15
                                    //$udhaarDepAmount = $rowUdhaarDepMon['utin_cash_amt_rec'] + $rowUdhaarDepMon['utin_pay_cheque_amt'] + ($rowUdhaarDepMon['utin_pay_card_amt'] + $rowUdhaarDepMon['utin_pay_trans_chrg']) + ($rowUdhaarDepMon['utin_online_pay_amt'] - $rowUdhaarDepMon['utin_pay_comm_paid']);
                                    //
                                    $udhaarDiscAmount = $rowUdhaarDepMon['utin_discount_amt']; //fetch discount column  @Author:SHE19OCT15
                                    $totalDiscountAmt += $udhaarDiscAmount;
                                    $udhaardiscount = $udhaardiscount + $udhaarDiscAmount;

                                    $udhaarDepDOB = $rowUdhaarDepMon['utin_date'];
                                    $udhaarOtherLangDepDOB = $rowUdhaarDepMon['utin_other_lang_date'];

                                    $udhaarCash = $rowUdhaarDepMon['utin_cash_amt_rec'];
                                    $totalCash = $totalCash + $udhaarCash;

                                    $udhaarDep = $rowUdhaarDepMon['utin_total_amt_deposit'];
                                    $totaldeposit = $totaldeposit + $udhaarDep;

                                    $udhaarCashBal = $rowUdhaarDepMon['utin_cash_balance'];
                                    $udhaarDepHistory = $udhaarDepHistory . $rowUdhaarDepMon['utin_history'];
                                    $udhaarTotalDepAmount = $udhaarTotalDepAmount + $udhaarDepAmount;
                                    $udhaarTotalDiscAmt = $udhaarTotalDiscAmt + $udhaarDiscAmount; // Start Code To Add total deposit sum  @Author:SHE19OCT15
                                    $udhaarDepUpdStatus = $rowUdhaarDepMon['utin_status'];
                                    $udhaarDepComm = $rowUdhaarDepMon['utin_paym_oth_info'];
                                    if ($udhaarDepComm == '' || $udhaarDepComm == NULL)
                                        $udhaarDepComm = 'N/A';
                                    $udhaarDepJrnlId = $rowUdhaarDepMon['utin_jrnl_id'];
                                    // Udhaar Dep Jrnl Id Added @Author:PRIYA18AUG13  
                                    /*                                     * **************END code to change udhaar_deposit table to user_transaction_invoice table @Author:PRIYANKA-28JUN17*********************** */
                                    //
                                    //echo '$udhaarIntChk == ' . $udhaarIntChk . '<br />';
                                    //
                                    $udhaarDepWithInt = $udhaarDepAmount + $udhaarIntAmount - $udhaarDiscAmount; //CODE ADDED TO CALCULATE TOTAL UDHAAR DEPOSITE AMOUNT WITH INTEREST,@AUTHOR:HEMA-23OCT2020
                                    ?>
                                    <tr>
                                        <td align="left" valign="top" colspan="10">
                                            <!--Change code for table layout @Author:PRIYANKA-09AUG2022-->
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" 
                                                   style="table-layout: fixed;">
                                                <tr> 

                                                    <td align="right" valign="bottom" style="width:4.3%;"
                                                        class="ff_calibri fs_13 greenFont">
                                                        <b>AMOUNT :&nbsp;</b>
                                                    </td>

                                                    <td align="left" style="border:0px solid; width:6%;" 
                                                        valign="bottom" class="ff_calibri fs_14 greenFont" 
                                                        title="Click to update deposit details ! " >
                                                        <!--<a style="cursor:pointer;" class="greenFont" 
                                                            onclick="getUdhaarDepUpdateDiv('<?php echo $udhaarDepId; ?>', '<?php echo $udhaarId; ?>', '<?php echo $custId; ?>',
                                                            '<?php echo $firmId; ?>', '<?php echo $udhaarPreSerialNum . $udhaarSerialNum; ?>');">
                                                        </a>-->
                                                        <span style="border:0px solid;"> 
                                                            <?php echo formatInIndianStyle($udhaarDepAmount - $udhaarDiscAmount); ?>
                                                        </span>
                                                    </td>

                                                    <!--Change the color font red to greenFont for DEPOSIT @Author : SHE19OCT15-->

                                                    <!--Change code for table layout @Author:PRIYANKA-09AUG2022-->
                                                    <!------START CODE TO ADD INTEREST AMOUNT,@AUTHOR:HEMA-23OCT2020-------------->
                                                    <?php if ($udhaarIntChk == 'true') { ?>
                                                        <td align="right"  valign="bottom" style="width:4.5%;">
                                                            <div class="ff_calibri fs_13 brown" style="font-size:14px;">
                                                                <b>INTEREST :&nbsp;</b>
                                                            </div>
                                                        </td>

                                                        <td align="left" style="border:0px solid; width:5%;" 
                                                            valign="bottom" >
                                                            <div class="ff_calibri fs_14 greenFont">
                                                                <?php echo $udhaarIntAmount; ?>
                                                            </div>
                                                        </td>
                                                    <?php } ?>
                                                    <!-------END CODE TO ADD INTEREST AMOUNT,@AUTHOR:HEMA-23OCT2020--------------->

                                                    <!--ADD td for Discount @Author : SHE19OCT15-->
                                                    <td align="right" valign="bottom" style="width:4.5%;">
                                                        <div class="ff_calibri fs_13 redFont" style="font-size:14px;">
                                                            <b>DISCOUNT :&nbsp;</b>
                                                        </div>
                                                    </td>

                                                    <!--Change code for table layout @Author:PRIYANKA-09AUG2022-->
                                                    <?php if ($udhaarDiscAmount == '' || $udhaarDiscAmount == NULL || $udhaarDiscAmount == 0) { ?>

                                                        <td align="left" style="border:0px solid; width:4%;"  
                                                            valign="bottom" class="ff_calibri fs_14 greenFont" 
                                                            title="Click to update deposit details ! ">
                                                            <!--<a style="cursor:pointer;" class="spaceLeft5 redFont" 
                                                                onclick="getUdhaarDepUpdateDiv('<?php echo $udhaarDepId; ?>', '<?php echo $udhaarId; ?>', '<?php echo $custId; ?>',
                                                                '<?php echo $firmId; ?>', '<?php echo $udhaarPreSerialNum . $udhaarSerialNum; ?>');">
                                                            </a>-->
                                                            <?php echo 0; ?>
                                                        </td>

                                                    <?php } else { ?>

                                                        <td align="left" style="border:0px solid; width:4%;" 
                                                            valign="bottom" class="ff_calibri fs_14 redFont" 
                                                            title="Click to update deposit details ! ">
                                                            <!--<a style="cursor:pointer;" class="spaceLeft5 redFont" 
                                                                onclick="getUdhaarDepUpdateDiv('<?php echo $udhaarDepId; ?>', '<?php echo $udhaarId; ?>', '<?php echo $custId; ?>',
                                                                '<?php echo $firmId; ?>', '<?php echo $udhaarPreSerialNum . $udhaarSerialNum; ?>');">
                                                            </a>-->
                                                            <span style="border:0px solid;">
                                                                <?php echo $udhaarDiscAmount; ?>
                                                            </span>
                                                        </td>

                                                    <?php } ?>

                                                    <!--Change code for table layout @Author:PRIYANKA-09AUG2022-->
                                                    <!--ADD td for Discount @Author : SHE19OCT15-->
                                                    <!------START CODE TO SHOW DEPOSITED TOTAL DEPOSITES AMOUNT,@AUTHOR:HEMA-23OCT2020---------->
                                                    <?php if ($udhaarIntChk == 'true') { ?>
                                                        <td align="right"  valign="bottom" style="width:6%;">
                                                            <div class="ff_calibri fs_13 brown" style="font-size:14px;">
                                                                <b>TOTAL DEPOSIT :&nbsp;</b>
                                                            </div>
                                                        </td>

                                                        <td align="left" 
                                                            style="border:0px solid; width:6%;" valign="bottom" >
                                                            <div class="ff_calibri fs_14 greenFont">
                                                                <?php echo $udhaarDepWithInt; ?>
                                                            </div>
                                                        </td>
                                                    <?php } ?>
                                                    <!-----END CODE TO SHOW DEPOSITED TOTAL DEPOSITES AMOUNT,@AUTHOR:HEMA-23OCT2020-------------->

                                                    <!--Change code for table layout @Author:PRIYANKA-09AUG2022-->
                                                    <td align="right" valign="bottom" style="width:5.5%;">
                                                        <div class="ff_calibri fs_13 brown" valign="bottom" style="font-size:14px;">
                                                            <b>DEPOSIT DATE :&nbsp;</b>
                                                        </div>
                                                    </td>

                                                    <!--Change code for table layout @Author:PRIYANKA-09AUG2022-->
                                                    <td align="left" valign="bottom" style="width:5%;">
                                                        <div class="ff_calibri fs_14 greenFont">
                                                            <?php
                                                            if ($nepaliDateIndicator == 'YES') {
                                                                if ($nepaliDateMonthFormat == 'displayInNumber') {
                                                                    echo $udhaarOtherLangDepDOB;
                                                                } else {
                                                                   $udhaarDepDOBArray = explode('-', $udhaarOtherLangDepDOB);
                                                                    $udharDepDOBMonth = $nepali_date->get_nepali_month($udhaarDepDOBArray[1]);
                                                                    echo $udhaarDepDOBArray[0] . ' ' . $udharDepDOBMonth . ' ' . $udhaarDepDOBArray[2];
                                                                }
                                                            } else {
                                                                echo $udhaarDepDOB;
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>

                                                    <!--Change code for table layout @Author:PRIYANKA-09AUG2022-->
                                                    <td align="right"  valign="bottom" style="width:5%;">
                                                        <div class="ff_calibri fs_13 brown" style="font-size:14px;">
                                                            <b>PAYMENT OTHER INFO :&nbsp;</b>
                                                        </div>
                                                    </td>
                                                    <td align="left" style="border:0px solid; width:7%;" valign="bottom" >
                                                        <div class="ff_calibri fs_14 greenFont">
                                                            <?php echo $udhaarDepComm; ?>
                                                        </div>
                                                    </td>

                                                    <!--Change code for table layout @Author:PRIYANKA-09AUG2022-->
                                                    <!--add invoice link Author:GAUR30JUNE16-->
                                                    <td align="left" valign="bottom" 
                                                        title="CLICK HERE TO VIEW INVOICE !" 
                                                        style="width:1.5%;">
                                                        <div>
                                                            <a style="cursor: pointer;" 
                                                               onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/olpyinvo.php?custId=<?php echo "$custId"; ?>&udhaarId=<?php echo "$udhaarId"; ?>&udhaarDepId=<?php echo "$udhaarDepId"; ?>&form8Lay=<?php echo "$form8Lay"; ?>&udharDepInv=udharDepInvoice',
                                                                                   'popup', 'width=<?php echo $frm8Width; ?>,height=<?php echo $frm8Height; ?>,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                                           return false" >
                                                                <img src="<?php echo $documentRoot; ?>/images/pdf166.png" 
                                                                     alt='Item Invoice' 
                                                                     width="16px" height="16px" />
                                                            </a>
                                                        </div>
                                                    </td>                                                    
                                                    <!--add invoice link Author:GAUR30JUNE16-->

                                                    <!--Change code for table layout @Author:PRIYANKA-09AUG2022-->
                                                    <?php
                                                    if ($udhaarUpdStatus != 'Deleted' && ($udhaarSettled == NULL || $udhaarSettled == '')) {
                                                        if (($staffId == '') || ($staffId != '' && $array['deleteTransactionForAllPanel'] == 'true' && $array['deleteUdhaarAccess'] == 'true')) {
                                                            ?>
                                                            <td align="left" valign="bottom" 
                                                                style="width:1.5%;">
                                                                <div id="updUdharDepAmtDelButt<?php echo $udhaarDiv; ?><?php echo $udhaarDepDiv; ?>">
                                                                    <a style="cursor: pointer;" 
                                                                       onclick="javascript:deleteUdharDepAmt('<?php echo "$custId"; ?>', '<?php echo $udhaarDepId; ?>', '<?php echo $udhaarDiv; ?>', '<?php echo $udhaarDepDiv; ?>', '<?php echo $firmId; ?>',
                                                                                                   '<?php echo $udhaarDepJrnlId; ?>', '<?php echo $udhaarDepAmount; ?>', '<?php echo $udhaarDepDOB; ?>', '<?php echo $udhaarPreSerialNum . $udhaarSerialNum; ?>');">
                                                                        <img src="<?php echo $documentRoot; ?>/images/img/cancel.png" style="height:14px;"
                                                                             alt="Delete Deposit Details" 
                                                                             title="Delete Deposit Details"/>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <!--End Code To Add Udhaar Dep Jrnl Id @Author:PRIYA18AUG13-->
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tr>
                                                <!--------------START CODE TO SHOW OTHER INFORMATION OF DEPOSITED AMOUNT,@AUTHOR:HEMA-23OCT2020--------->
    <!--                                                <tr>
                                                    <td align="right"  valign="bottom" style="padding-top:10px;"><div class="spaceLeft ff_calibri fs_13 brown"><b>DEPOSIT OTHER INFO&nbsp:&nbsp</b></div></td>
                                                    <td align="left" style="border:0px solid; width:130px;padding-top:10px;" valign="bottom" ><div class="ff_calibri fs_14 greenFont"><?php echo $udhaarDepComm; ?></div></td>
                                                </tr>-->
                                                <!--------------END CODE TO SHOW OTHER INFORMATION OF DEPOSITED AMOUNT,@AUTHOR:HEMA-23OCT2020--------->

                                            </table>
                                        </td>
                                    </tr>
                                    <!--Start Code To Add Discount sum  @Author:SHE21JAN16-->
                                    <?php
                                    $udhaarDepDiv++;
                                }

                                $totalUdhaarTotalDepAmount += $udhaarTotalDepAmount - $udhaarTotalDiscAmt; //// Start Code To Add total deposit sum  @Author:SHE19OCT15
                                $udhaarDiv++;

                                //echo '$udhaarAmt == ' . $udhaarAmt . '<br/>';
                                //echo '$udhaarTotalDepAmount == ' . $udhaarTotalDepAmount . '<br/>';
                                //echo '$totalUdhaDepAmt == ' . $totalUdhaDepAmt . '<br/>';


                                $totalUdhaDepAmt = $udhaarTotalDepAmount;

                                //echo '$totalUdhaDepAmt == ' . $totalUdhaDepAmt . '<br/>';
                                //$udhaarAmtLeft = $udhaarAmt - $totalUdhaDepAmt;

                                if ($_REQUEST['udhaarDivMainMiddlePanel'] == 'Paid' || $_REQUEST['panelName'] == 'udhaarPaidDetails') {
                                    $udhaarAmtLeft = $udhaarAmtLeftDeposit;
                                } else {
                                    $udhaarAmtLeft = $udhaarAmt;
                                }

                                //echo '$udhaarAmt==='.$udhaarAmt;
                                //echo '$totalUdhaDepAmt==='.$totalUdhaDepAmt;
                                //echo '$udhaarAmtLeft==='.$udhaarAmtLeft;
                                //echo '<br/><br/>$udhaarDepDOB !@@!: ' . $udhaarDepDOB;
                                //echo '<br/><br/>$udhaarDOB !@@!: ' . $udhaarDOB;
                                //echo '<br/><br/>$udhaarIntChk !@@!: ' . $udhaarIntChk;

                                if ($udhaarIntChk == 'true') {
                                    //
                                    //
                                    $ROI = $udhaarIntROI; // UDHAAR ROI
                                    $princAmount = $udhaarAmtLeft;
                                    $ROIType = $udhaarIntType; // UDHAAR ROI TYPE
                                    //
                                    //
                                    if ($udhaarDepDOB == null || $udhaarDepDOB == '') {
                                        $girviNewDOB = $udhaarDOB; //CODE COMMENTED TO NOT CALCULATE INTESREST AMOUNT FROM START DATE,@AUTHOR:HEMA-23OCT2020
                                    } else {
                                        $girviNewDOB = $udhaarDepDOB; //CODE ADDED TO CALCULATE INTEREST AMOUNT FROM LAST DEPOSITED DATE,@AUTHOR:HEMA-23OCT2020
                                    }
                                    //
                                    //echo '<br/><br/>$girviNewDOB !@1@!: ' . $girviNewDOB;
                                    //
                                    //echo '<br/><br/>$subPanelName !@1@!: ' . $subPanelName;
                                    //echo '<br/><br/>$mainUdhaarId !@1@!: ' . $mainUdhaarId;
                                    //echo '<br/><br/>$udhaarId !@1@!: ' . $udhaarId;
                                    //
                                    // IF DEPOSIT DATE CHANGE, CALCUALTE NEW INTEREST @AUTHOR-PRIYANKA-10AUG2022
                                    if($changeCounter == $udCounter){
                                    if ($subPanelName == 'udhaarDepositDateChangePanel' && $mainUdhaarId == $udhaarId) {
                                        $girviDOR = $newDepositDOBDay . ' ' . $newDepositDOBMonth . ' ' . $newDepositDOBYear;
                                    }
                                    }else{
                                        $girviDOR ='';
                                    }
                                    //
                                    //echo '<br/><br/>$girviDOR !@2@!: ' . $girviDOR;
                                    //echo '<br/><br/>$princAmount !@@!: ' . $princAmount;
                                    //
                                    //$IROI = $ROI;
                                    //
                                    // ADDED CODE FOR INTEREST CAL BY DAYS @PRIYANKA-20JULY2022
                                    if ($udhaarIntType == 'Days') {
                                        //
                                        $IROI = $ROI;
                                        $ROIType = 'Monthly';
                                        $gMonthIntOption = 'DD';
                                        $_POST['gMonthIntOption'] = 'DD';
                                        //
                                    }
                                    //
                                    if ($udhaarIntType == 'Monthly') {
                                        //
                                        $IROI = $ROI;
                                        $ROIType = 'Monthly';
                                        $gMonthIntOption = 'FM';
                                        $_POST['gMonthIntOption'] = 'FM';
                                        //
                                    }
                                    //
                                    //echo '<br/><br/>$ROIType !@@!: ' . $ROIType;
                                    //echo '<br/><br/>$gMonthIntOption !@@!: ' . $gMonthIntOption;
                                    //echo '<br/><br/>';
                                    //
                                    include 'ommpgvip.php';
                                    //
                                    //
                                }
                                //
                                //
                                //echo '<br/><br/>$totalFinalInterest !@@!: ' . $totalFinalInterest;
                                //echo '<br/><br/>$totalUdaarIntAmt !@@!: ' . $totalUdaarIntAmt;
                                //
                                //
                                ?>
                                <!--End CodeTo Add Discount sum  @Author:SHE21JAN16-->
                                <tr>
                                    <td align="left" colspan="10" class="paddingTop4 padBott4">
                                        <div class="hrGrey"></div>
                                    </td>
                                </tr>
                                <tr>

                                    <td align="left" valign="top" class="paddingTop4">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>  
                                                <td align="right" valign="bottom" class="ff_calibri fs_14 red" style="color: brown;"><b>UDHAAR AMT LEFT<span style="margin-left: 10px;">:&nbsp </span></b></td>
                                                <td align="right" valign="top" class="ff_calibri fs_14 red bold">
                                                    <div class="ff_calibri fs_14 red" style="color: red" id="udhaarAmt<?php echo $udCounter; ?>"><?php echo $udhaarAmtLeft; ?></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <?php
                                    if ($udhaarIntChk == 'true' && $displayTotalColumn != 'No') {
                                        //
                                        //if (($totalFinalInterest - $totalUdaarIntAmt) > 0) {
                                        //    $totalInterestAmt = $totalFinalInterest - $totalUdaarIntAmt;
                                        //} else {
                                        $totalInterestAmt = $totalFinalInterest;
                                        //}
                                        //
                                        //echo '<br/><br/>$totalInterestAmt !@@!: ' . $totalInterestAmt;
                                        //
                                        ?>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>  
                                                    <td align="right" valign="bottom" class="ff_calibri fs_14 redFont"><b>INTEREST AMT<span style="margin-left: 10px;">:&nbsp </span></b></td>
                                                    <td align="right" valign="top" class="ff_calibri fs_14 redFont">
                                                        <div class="ff_calibri fs_14 greenFont" id="udhaarIntAmt<?php echo $udCounter; ?>">
                                                            <?php
                                                            //
                                                            //echo abs($totalInterestAmt);
                                                            //
                                                            //if ($totalInterestAmt > 0) {
                                                            echo $totalInterestAmt;
                                                            //} else {
                                                            //    echo abs($totalInterestAmt); 
                                                            //}
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    <?php } ?>
                                    <?php if ($udhaarIntChk == 'true' && $displayTotalColumn != 'No') { ?>
                                        <td align="left" valign="top" class="paddingTop4">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>  
                                                    <td align="right" valign="bottom" class="ff_calibri fs_13 redFont"><b>TOTAL<span style="margin-left: 10px;">:&nbsp </span></b></td>
                                                    <td align="right" valign="top" class="ff_calibri fs_14 redFont">
                                                        <div class="ff_calibri fs_14 greenFont" id="udhaarAmt<?php echo $udCounter; ?>">
                                                            <?php
                                                            //
                                                            if ($totalInterestAmt > 0) {
                                                                $totalUdhaarAmtLeft = $udhaarAmtLeft + $totalInterestAmt;
                                                            } else {
                                                                $totalUdhaarAmtLeft = $udhaarAmtLeft;
                                                            }
                                                            //
                                                            echo $totalUdhaarAmtLeft;
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    <?php } ?>
                                    <?php if ($udhaarIntChk == 'true' && $displayTotalColumn != 'No') { ?>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>  
                                                    <td align="right" valign="bottom" class="ff_calibri fs_13 redFont"><b>TIME PERIOD<span style="margin-left: 10px;">:&nbsp </span></b></td>
                                                    <td align="right" valign="top" class="ff_calibri fs_14 redFont">
                                                        <div class="ff_calibri fs_14 greenFont" id="udhaarTimePrd<?php echo $udCounter; ?>">
                                                            <?php
                                                            if ($yearPrint > 1) {
                                                                echo $yearPrint . " Years ";
                                                            } else if ($yearPrint == 1) {
                                                                echo $yearPrint . " Year ";
                                                            }
                                                            if ($monthPrint > 1) {
                                                                echo $monthPrint . " Months ";
                                                            } else if ($monthPrint == 1) {
                                                                echo $monthPrint . " Month ";
                                                            }
                                                            if ($daysPrint > 1 || ($daysPrint == 0 && $monthPrint == 0)) {
                                                                echo $daysPrint . " Days";
                                                            }
                                                            if ($daysPrint == 1) {
                                                                echo $daysPrint . " Day";
                                                            }
                                                            //echo " ($totalDateDiffDays Days) ";
                                                            if ($daysPrint == 0 && $yearPrint == 0 && $monthPrint == 0) {
                                                                echo $daysPrint . " Days";
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>

                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>  
                                                    <td align="right" valign="bottom" class="ff_calibri fs_13 redFont"><b>ROI<span style="margin-left: 10px;">:&nbsp </span></b></td>
                                                    <td align="right" valign="top" class="ff_calibri fs_14 redFont">
                                                        <div class="ff_calibri fs_14 greenFont" id="udhaarROI<?php echo $udCounter; ?>"><?php echo $udhaarIntROI . ' %'; ?></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>  
                                                    <td align="right" valign="bottom" class="ff_calibri fs_13 redFont"><b>INT TYPE<span style="margin-left: 10px;">:&nbsp </span></b></td>
                                                    <td align="right" valign="top" class="ff_calibri fs_14 redFont">
                                                        <div class="ff_calibri fs_14 greenFont" id="udhaarIntType<?php echo $udCounter; ?>"><?php echo $udhaarIntType; ?></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    <?php } ?>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" colspan="4" class="paddingTop4"> 
                            <table border="0" cellpadding="0" cellspacing="2" width="100%">
                                <?php
//**************************************************************************************************************
//***********************START CODE TO ADD ACCESS FOR UDHAAR DEPOSIT FEATURE@RENUKA SHARMA2022**********************
//**************************************************************************************************************
                                if ($staffId == '' || ($staffId != '' && $array['udhaarDepositAccess'] == 'true')) {
                                    ?>
                                    <tr>  
                                         <td align="left" width="3%">
                                            <div id="ajaxLoadUdhaarDepositMon<?php echo "$udhaarId"; ?>" style="visibility: hidden" align="left">
                                                <?php include 'omzaajld.php'; ?>
                                            </div>
                                        </td>
                                        <td align="center" style="border: 0px solid; " width="7.2%"  valign="top">
                                            <h4 class="fw_b" >DEPOSIT &nbsp;&nbsp;&nbsp;:</h4>
                                        </td>
                                       
                                        <?php if ($udhaarPayChk != 'checked') { ?>
                                            <td  align="center" valign="middle" size="7" width="20%">
                                                <?php
                                                //
                                                // **********************************************************************************
                                                // START CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
                                                // **********************************************************************************
                                                //
                                                $selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
                                                $resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
                                                $rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
                                                $nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
                                                //
                                                // ********************************************************************************
                                                // END CODE TO GET VALUE OF NEPALI DATE INDICATOR OPTION @AUTHOR:MADHUREE-01DEC2021
                                                // ********************************************************************************
                                                //
                                                if ($nepaliDateIndicator == 'YES') {
                                                    $nepaliDatePanel = 'udharAdvancePanel'; 
                                                    $selDayId = "DOBDay$udCounter";
                                                    $selDayName = 'DOBDay';
                                                    $selDayStyle = '';
                                                    $selMonthId = "DOBMonth$udCounter";
                                                    $selMonthName = 'DOBMonth';
                                                    $selMonthStyle = '';
                                                    $selYearId = "DOBYear$udCounter";
                                                    $selYearName = 'DOBYear';
                                                    $selYearStyle = '';
                                                    $date_nepali = '';
                                                    include $_SESSION['documentRootIncludePhp'] . 'nepal/omNepaliDate.php';
                                                } else {
                                                    //
                                                    // IF DEPOSIT DATE CHANGE, CALCUALTE NEW INTEREST @AUTHOR-PRIYANKA-10AUG2022
                                                    if ($subPanelName == 'udhaarDepositDateChangePanel' && $mainUdhaarId == $udhaarId) {
                                                        $newDepositDate = $newDepositDOBDay . ' ' . $newDepositDOBMonth . ' ' . $newDepositDOBYear;
                                                        $selDOBDay = substr($newDepositDate, 0, 2);
                                                        $selDOBMnth = substr($newDepositDate, 3, -5);
                                                        $todayMM = date("m", strtotime($selDOBMnth)) - 1;
                                                        $selDOBYear = substr($newDepositDate, -4);
                                                    } else {
                                                        $selDOBDay = date(j);
                                                        $todayMM =  strtoupper(date('M'));
                                                        $selDOBYear = date(Y);
                                                    }
                                                    //
                                                    // IF DEPOSIT DATE CHANGE, CALCUALTE NEW INTEREST @AUTHOR-PRIYANKA-10AUG2022
                                                    $datePanelName = 'udhaarDepositPanel';
                                                    //
                                                    include 'omuustartdate.php';
                                                    //
                                                }
                                                ?>
                                            </td>
                                            <td align="right" width="10%">
                                                <input type="text"  id="depositAmt<?php echo $udCounter; ?>" 
                                                       placeholder="DEPOSIT AMT" 
                                                       class="form-control-height20 placeholderClass " size="10" style="height:30px;"
                                                       onchange="var total = parseFloat(document.getElementById('udhaarAmt<?php echo $udCounter; ?>').textContent);
                                                                       var deposit;
                                                                       var disc;
                                                                       if (document.getElementById('depositAmt<?php echo $udCounter; ?>').value == '')
                                                                           deposit = 0;
                                                                       else
                                                                           deposit = parseFloat(document.getElementById('depositAmt<?php echo $udCounter; ?>').value);
                                                                       if (document.getElementById('depositDisc<?php echo $udCounter; ?>').value == '')
                                                                           disc = parseFloat(0);
                                                                       else
                                                                           disc = parseFloat(document.getElementById('depositDisc<?php echo $udCounter; ?>').value);
                                                                       if (parseFloat(deposit) >= parseFloat(disc)) {
                                                                           if (parseFloat(total) < parseFloat(deposit)) {
                                                                               alert('DEPOSIT AND DISCOUNT TOTAL SHOULD BE LESS THAN EQUAL TO UDHAAR AMOUNT');
                                                                               this.focus();
                                                                           }
                                                                       } else {
                                                                           alert('DISCOUNT TOTAL SHOULD BE LESS THAN EQUAL TO DEPOSIT AMOUNT');
                                                                           this.focus();
                                                                       }">
                                            </td>
                                            <!------START CODE TO ADD OPTION TO DEPOSIT INTEREST AMOUNT,@AUTHOR:HEMA-3OCT2020------------->
                                            <?php if ($udhaarIntChk == 'true') { ?>
                                                <td width="10%">
                                                    <input type="text"  id="depositIntAmt<?php echo $udCounter; ?>" 
                                                           placeholder="INTEREST AMT" 
                                                           class="form-control-height20 placeholderClass" style="height:30px" size="10" />
                                                </td>
                                            <?php } else { ?>
                                            <input type="hidden"  id="depositIntAmt<?php echo $udCounter; ?>" 
                                                   placeholder="INTEREST AMT" value="0"
                                                   class="form-control-height20 placeholderClass " size="10" style="height:30px"/>
                                               <?php } ?>
                                        <!-----END CODE TO ADD OPTION TO DEPOSIT INTEREST AMOUNT,@AUTHOR:HEMA-3OCT2020--------------->
                                        <td align="left" width="10%">
                                            <input type="text" id="depositDisc<?php echo $udCounter; ?>" 
                                                   class="form-control-height20 placeholderClass" style="height:30px;width:100%" size="10" placeholder="DISCOUNT"
                                                   onchange="var total = parseFloat(document.getElementById('udhaarAmt<?php echo $udCounter; ?>').textContent);
                                                                   var deposit;
                                                                   var disc;
                                                                   if (document.getElementById('depositAmt<?php echo $udCounter; ?>').value == '')
                                                                       deposit = 0;
                                                                   else
                                                                       deposit = parseFloat(document.getElementById('depositAmt<?php echo $udCounter; ?>').value);
                                                                   if (document.getElementById('depositDisc<?php echo $udCounter; ?>').value == '')
                                                                       disc = parseFloat(0);
                                                                   else
                                                                       disc = parseFloat(document.getElementById('depositDisc<?php echo $udCounter; ?>').value);
                                                                   if (parseFloat(deposit) >= parseFloat(disc)) {
                                                                       if (parseFloat(total) < parseFloat(deposit)) {
                                                                           alert('DEPOSIT AND DISCOUNT TOTAL SHOULD BE LESS THAN EQUAL TO UDHAAR AMOUNT');
                                                                           this.focus();
                                                                       }
                                                                   } else {
                                                                       alert('DISCOUNT TOTAL SHOULD BE LESS THAN EQUAL TO DEPOSIT AMOUNT');
                                                                       this.focus();
                                                                   }">

                                        </td>
        <!--                                        <td style="padding-left:8px">
                                            <textarea id='udhaarOtherInfo'cols="25" rows="5"></textarea>
                                        </td>-->
                                       <?php 
                                       //print_r($_REQUEST);
                                         //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                        //*************************** START CODE TO INSERT MAIN INV NO IN UDHAAR DEPOSITE @SIMRAN:06JUN2023***************************************//
                                        //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                        //
                                         $query = "SELECT utin_main_inv_no FROM user_transaction_invoice WHERE utin_owner_id = '$sessionOwnerId' AND utin_id = '$udhaarId' AND utin_user_id='$userId'";
                                               $resMainInvNo = mysqli_query($conn, $query) or die("QUERY :" . $query . mysqli_error($conn));
                                               $rowMainInvNo = mysqli_fetch_array($resMainInvNo, MYSQLI_ASSOC);
                                               //
                                               $mainInvNo = $rowMainInvNo['utin_main_inv_no'];
                                        //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                        //*************************** END CODE TO INSERT MAIN INV NO IN UDHAAR DEPOSITE @SIMRAN:06JUN2023***************************************//
                                        //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                                                 ?>
                                        <td align="center" width="20%">
                                            <div id="udhaarDepositMonButDiv<?php echo "$udhaarId"; ?>">
                                                <form name="show_udhaar_deposit_money<?php echo "$udhaarId"; ?>" id="show_udhaar_deposit_money<?php echo "$udhaarId"; ?>"
                                                      action="javascript:showAddUdhaarDepositPayDiv(<?php echo "$custId"; ?>,
                                                          <?php echo "$udhaarId"; ?>,document.getElementById('depositAmt<?php echo $udCounter; ?>').value,document.getElementById('depositIntAmt<?php echo $udCounter; ?>').value, <?php echo "$firmId"; ?>,'<?php echo $udhaarPreSerialNum; ?>','<?php echo $udhaarSerialNum + 1; ?>','','','','','','','','','',document.getElementById('depositDisc<?php echo $udCounter; ?>').value,<?php echo "$udhaarId"; ?>,'<?php echo $mainInvNo; ?>','<?php echo $udCounter; ?>');"      
                                                      method="get">
                                                    <!--ADDED CODE FOR UDHAAR DEPOSIT DATE ISSUE @AUTHOR:PRIYANKA-08FEB2022-->
                                                    <input type="hidden" id="udhaarCounterNew" name="udhaarCounterNew" value="<?php echo $udCounter; ?>" />
                                                    <input type="hidden" id="showDivPanel" name="showDivPanel" value="<?php echo $showDivPanel; ?>" /><!--------CODE ADDED TO GET SHOW DIV PANEL NAME,@AUTHOR:HEMA12NOV2020--->
                                                    <input type="hidden" id="depositIntAmtMainEntry<?php echo $udCounter; ?>" name="depositIntAmtMainEntry<?php echo $udCounter; ?>" 
                                                           value="<?php echo $totalInterestAmt; ?>" />
                                                <!--START CODE TO ADDED MAIN INV NO @SIMRAN:08JUN2023-->
                                                   <input type="hidden" id="utin_main_inv_no" name="utin_main_inv_no" value="<?php echo $mainInvNo; ?>" />
                                                 <!--END CODE TO ADDED MAIN INV NO @SIMRAN:08JUN2023-->   
                                                   <input type="button" value="QUICK SUBMIT" class="frm-btn-without-border" style="background:#D8F6D8;color:#006400;border:1px solid #9fdc9f"
                                                           maxlength="30" size="15" 
                                                           onclick="this.style.display='none';
                                                               var total = parseFloat(document.getElementById('udhaarAmt<?php echo $udCounter; ?>').textContent);
                                                                           var deposit;
                                                                           var disc;
                                                                           var interest;
                                                                           //
                                                                           if (document.getElementById('depositAmt<?php echo $udCounter; ?>').value == '') {
                                                                               document.getElementById('depositAmt<?php echo $udCounter; ?>').value = deposit = 0;
                                                                           } else {
                                                                               deposit = parseFloat(document.getElementById('depositAmt<?php echo $udCounter; ?>').value);
                                                                           }
                                                                           //
                                                                           if (document.getElementById('depositDisc<?php echo $udCounter; ?>').value == '') {
                                                                               document.getElementById('depositDisc<?php echo $udCounter; ?>').value = disc = parseFloat(0);
                                                                           } else {
                                                                               disc = parseFloat(document.getElementById('depositDisc<?php echo $udCounter; ?>').value);
                                                                           }
                                                                           //
                                                                           if (document.getElementById('depositIntAmt<?php echo $udCounter; ?>').value == '') {
                                                                               document.getElementById('depositIntAmt<?php echo $udCounter; ?>').value = interest = parseFloat(0);
                                                                           } else {
                                                                               interest = parseFloat(document.getElementById('depositIntAmt<?php echo $udCounter; ?>').value);
                                                                           }
                                                                           //
                                                                           if (parseFloat(deposit) >= parseFloat(disc)) {
                                                                               if (parseFloat(total) < parseFloat(deposit)) {
                                                                                   alert('DEPOSIT AND DISCOUNT TOTAL SHOULD BE LESS THAN EQUAL TO UDHAAR AMOUNT');
                                                                                   this.focus();
                                                                                   return false;
                                                                               } else if (parseFloat(deposit) != 0 || parseFloat(disc) != 0 || parseFloat(interest) != 0) {
                                                                                   udhaarDepositMoney('<?php echo "$custId"; ?>', '<?php echo "$udhaarId"; ?>', '<?php echo "$firmId"; ?>', '<?php echo "$udCounter"; ?>', '<?php echo "$mainInvNo"; ?>')  //ADDED MAIN INV NO @SIMRAN:08JUN2023
                                                                               }
                                                                           } else {
                                                                               alert('DISCOUNT TOTAL SHOULD BE LESS THAN EQUAL TO DEPOSIT AMOUNT');
                                                                               this.focus();
                                                                               return false;
                                                                           }

                                                           "  />
                                                    &nbsp;&nbsp;
                                                    <?php // if ($transType != 'OnPurchase') {     ?>
                                                    <input type="submit" value="PAYMENT OPTION" class="frm-btn-without-border"
                                                           maxlength="30" size="15" onclick="var total = parseFloat(document.getElementById('udhaarAmt<?php echo $udCounter; ?>').textContent);
                                                                           var deposit;
                                                                           var disc;
                                                                           var int;
                                                                           if (document.getElementById('depositAmt<?php echo $udCounter; ?>').value == '')
                                                                               deposit = 0;
                                                                           else
                                                                               deposit = parseFloat(document.getElementById('depositAmt<?php echo $udCounter; ?>').value);
                                                                           if (document.getElementById('depositDisc<?php echo $udCounter; ?>').value == '')
                                                                               disc = parseFloat(0);
                                                                           else
                                                                               disc = parseFloat(document.getElementById('depositDisc<?php echo $udCounter; ?>').value);
                                                                           //START CODE TO GET INTEREST AMOUNT,@AUTHOR:HEMA-3OCT2020
                                                                           if (document.getElementById('depositIntAmt<?php echo $udCounter; ?>').value == '')
                                                                               int = 0;
                                                                           else
                                                                               int = parseFloat(document.getElementById('depositIntAmt<?php echo $udCounter; ?>').value == '');
                                                                           //END CODE TO GET INTEREST AMOUNT,@AUTHOR:HEMA-3OCT2020   
                                                                           if (parseFloat(deposit) >= parseFloat(disc)) {
                                                                               if (parseFloat(total) < parseFloat(deposit)) {
                                                                                   alert('DEPOSIT AND DISCOUNT TOTAL SHOULD BE LESS THAN EQUAL TO UDHAAR AMOUNT');
                                                                                   this.focus();
                                                                                   return false;
                                                                               }
                                                                           } else {
                                                                               alert('DISCOUNT TOTAL SHOULD BE LESS THAN EQUAL TO DEPOSIT AMOUNT');
                                                                               this.focus();
                                                                               return false;
                                                                           }" />
                                                           <?php // }    ?>
                                                </form>
                                            </div>
                                        </td>
                                        <?php
                                    }
                                }
                                ?>
                                <?php if (($staffId == '') || ($staffId != '' && $array['deleteTransactionForAllPanel'] == 'true' && $array['deleteUdhaarAccess'] == 'true')) { ?>
                                    <td align="right" width="70px">
                                        <input type="button" value="DELETE"  style="background: #FFD6DD;color:#DC143C;border: 1px solid #ffa1b1;"
                                               onclick="javascript:deleteCustUdhaarDetails('<?php echo $custId; ?>', '<?php echo "$firmId"; ?>', '<?php echo $udhaarId; ?>', '<?php echo $udhaarJrnlId; ?>', '<?php echo $udhaarPreSerialNum . $udhaarSerialNum; ?>', '<?php echo $udhaarDOB; ?>', '<?php echo $udhaarAmount; ?>');"
                                               class="frm-btn-without-border spaceleft20" />
                                    </td>
                                <?php } ?>
                                <?php
                                $selFormsLayoutDet = "SELECT omly_value FROM omlayout WHERE omly_own_id = '$_SESSION[sessionOwnerId]' and omly_option = 'udhaarNoticeLay'";
                                $resFormsLayoutDet = mysqli_query($conn, $selFormsLayoutDet);
                                $rowFormsLayoutDet = mysqli_fetch_array($resFormsLayoutDet);
                                $udhaarNoticeLay = $rowFormsLayoutDet['omly_value'];
                                if ($udhaarNoticeLay == 'udhaarNoticeLay4Inch' || $udhaarNoticeLay == 'udhaarNoticeLayA6') {
                                    $width = 420;
                                    $height = 660;
                                } else {
                                    $width = 550;
                                    $height = 630;
                                }
                                ?>
                                <td align="center" width="30px" valign="middle">
                                    <a style="cursor: pointer;" 
                                       onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omuunote.php?custId=<?php echo "$custId"; ?>&udhaarId=<?php echo "$udhaarId"; ?>&udhaarAmtLeft=<?php echo "$udhaarAmtLeft"; ?>',
                                                       'popup', 'width=<?php echo $width; ?>, height =<?php echo $height; ?>, scrollbars = yes, resizable = yes, toolbar = no, directories = no, location = no, menubar = no, status = no, left = 0, top = 0');
                                               return false" >
                                        <img src="<?php echo $documentRoot; ?>/images/img/cust-notice.png" alt='Udhaar Notice' title='Udhaar Notice' valign="bottom"
                                             width="20px" height="20px"   class="paddingTop3"/> 
                                    </a>
                                </td>
                                <!--add invoice link Author: GAUR21JUL16-->
                                <td align="left" valign="bottom" title="CLICK HERE TO VIEW INVOICE !">
                                    <a style="cursor: pointer;" onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/olpyinvo.php?custId=<?php echo "$custId"; ?>&udhaarId=<?php echo "$udhaarId"; ?>&udhaarDepId=<?php echo "$udhaarDepId"; ?>&form8Lay=<?php echo "$form8Lay"; ?>&udhaarMainInv=udharMainInvoice',
                                                    'popup', 'width=<?php echo $frm8Width; ?>,height=<?php echo $frm8Height; ?>,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                            return false" >
                                        <img src="<?php echo $documentRoot; ?>/images/pdf166.png" alt='Item Invoice' 
                                             width="16px" height="16px"/>
                                    </a>
                                </td>
                                <!--add invoice link Author: GAUR21JUL16-->
                    </tr>
                    <!----------START CODE TO ADD OPTION TO SELECT ACCOUNT FOR DEPOSITE MONEY, INTEREST AMOUNT, AND DISCOUNT AMOUNT,@AUTHOR:HEMA-3OCT2020------------->
                    <?php if (($staffId == '' || ($staffId != '' && $array['udhaarDepositAccess'] == 'true'))) { ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
<!--                            <td>&nbsp;</td>-->
                            <td>
                                <div class="selectStyled textLabel14CalibriGrey" style="height:30px;margin-top:5px;"><!-----Change in class @AUTHOR: SANDY09JAN14--->
                                    <?php
                                    if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                        $selFirmId = $_SESSION['setFirmSession'];
                                    } else {
                                        $selFirmId = $firmId;
                                    }
                                    $nextFieldId = 'udhaarDepIntRecAccId';
                                    $prevFieldId = 'otherInfoField';
                                    $selAccountId = 'udhaarDepLoanAccId';
                                    $selAccountName = "'Current Assets'";
                                    if ($mainUdharCrAccountName != '') {
                                        $accNameSelected = $mainUdharCrAccountName;
                                    } else {
                                        $accNameSelected = 'Cash in Hand';
                                    }
                                    $selAccountClass = 'textLabel14CalibriGrey';
                                    if (($staffId == '') || ($staffId && $array['addNewGirviAccessAcntType'] != 'true')) {//To Give Access to staff @AUTHOR: SANDY16AUG13
                                        $accAccess = 'NO';
                                    }
                                    include 'omuacsalt.php';
                                    ?>
                                </div> 
                                <?php // 
                                if($admnStatus == 'OnPurchase')
                                {?>
                                <input type="hidden" name="udhaarDepLoanDrAccId" id="udhaarDepLoanDrAccId" value="<?php echo $utin_dr_acc_id; ?>" />
                                <?php }else{ ?>
                                <input type="hidden" name="udhaarDepLoanDrAccId" id="udhaarDepLoanDrAccId" value="<?php echo $utin_cr_acc_id; ?>" />
                                <?php } ?>
                            </td>
                            <td style="display:<?php
                            if ($udhaarIntChk == 'true') {
                                echo 'visible';
                            } else {
                                echo 'none';
                            }
                            ?>;">
                                <div class="selectStyled textLabel14CalibriGrey" style="height:30px;margin-top:5px;margin-left:5px"><!-----Change in class @AUTHOR: SANDY09JAN14--->
                                    <?php
                                    if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                        $selFirmId = $_SESSION['setFirmSession'];
                                    } else {
                                        $selFirmId = $firmId;
                                    }
                                    $nextFieldId = 'udhaarDepCashAccId';
                                    $prevFieldId = 'udhaarDepLoanAccId';
                                    $selAccountId = 'udhaarDepIntRecAccId';
                                    $accIdSelected = '';
                                    $selAccountName = "'Direct Incomes'";
                                    $accNameSelected = 'Interest Rec';
                                    $selAccountClass = 'textLabel14CalibriGrey';
                                    include 'omuacsalt.php';
                                    ?>
                                </div>  
                            </td>
                            <td>
                                <div class="selectStyled textLabel14CalibriGrey" style="height:30px;margin-top:5px;margin-left:5px"><!----Change in class @AUTHOR: SANDY09JAN14--->
                                    <?php
                                    if ($_SESSION['setFirmSession'] != '' || $_SESSION['setFirmSession'] != NULL) {
                                        $selFirmId = $_SESSION['setFirmSession'];
                                    } else {
                                        $selFirmId = $firmId;
                                    }
                                    $nextFieldId = 'udhaarDepCashAccId';
                                    $prevFieldId = 'udhaarDepLoanAccId';
                                    $selAccountId = 'udhaarDepDiscPaidAccId';
                                    $accIdSelected = '';
                                    $selAccountName = "'Direct Expenses','Current Liabilities'";
                                    $accNameSelected = 'Discount Paid';
                                    $selAccountClass = 'textLabel14CalibriGrey';
                                    include 'omuacsalt.php';
                                    ?>
                                </div>
                            </td>
                            <td style="padding-left:8px">
                                <textarea id='udhaarOtherInfo'cols="25" rows="5" style="width:100%;height:30px;margin-top:5px;border:1px solid #c1c1c1!important;"></textarea>
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    <?php } ?>
                    <!----------END CODE TO ADD OPTION TO SELECT ACCOUNT FOR DEPOSITE MONEY, INTEREST AMOUNT, AND DISCOUNT AMOUNT,@AUTHOR:HEMA-3OCT2020------------->
                </table>
            </td>
            </tr>
            <tr>
<!--                        <td align="left" colspan="2">
                    <div class="spaceLeft10 ff_calibri fs_13"><?php echo $udhaarHistory; ?></div>
                </td>
            </tr>
            <tr>
                <td align="left" colspan="2">
                    <div class="spaceLeft10"><h5><?php echo $udhaarDepHistory; ?></h5></div>
                </td>-->
            </tr>
            <tr>
                <td align="left" colspan="2">
                    <div class="spaceLeft10 ff_calibri fs_14 blueFont"><?php echo $udhaarComm; ?></div>
                </td>
            </tr>
            <?php if ($udhaarOtherInfo != '') { ?>
            <tr>
                    <td>
                        <table width="100%" align="left">
                            <tr>
                                <td align="left" width="10%">
                                    <h4 class="fw_b" style="margin-top: 9px;text-transform:uppercase">Other Info :</h4></td>
                                <td align="left" width="90%">
                                    <?php 
                                    //
                                    parse_str(getTableValues("SELECT utin_transaction_type FROM user_transaction_invoice WHERE utin_id= '$utin_utin_id'"));
                                    //
                                    if($_SESSION['sessionIgenType'] == $globalOwnPass && $utin_transaction_type == 'ESTIMATESELL'){
                                    ?>
                                    <div class="main_link_blue_Arial" style="margin-top: 9px;text-transform:uppercase"></div>
                                    <?php  } else { ?>
                                    <div class="main_link_blue_Arial" style="margin-top: 9px;text-transform:uppercase"><?php echo $udhaarOtherInfo; ?></div>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            <?php } ?>
            <?php if ($udhaarHistory != '') { ?>
                <tr>
                        <td>
                            <table width="100%" align="left">
                                <tr>
                                    <td align="left" width="10%">
                                        <h4 class="fw_b" style="text-transform:uppercase">History :</h4></td>
                                    <td align="left" width="90%">
                                        <div class="main_link_blue_Arial"><?php echo $udhaarHistory; ?></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
            <?php } ?>
            <?php if ($udhaarPaymInfo != '') { ?>
                <tr>
                    <td>
                        <table width="100%" align="left">
                            <tr>
                                <td align="left" width="10%">
                        <h4 class="fw_b" style="text-transform:uppercase">Payment Info : </h4></td>
                    <td align="left" width="90%">
                        <div class="main_link_blue_Arial"> <?php echo $udhaarPaymInfo; ?></div>
                    </td>
                            </tr>
                        </table>
                    </td>
                    
                </tr>
            <?php } ?>
            <tr>
                <td align="left" colspan="2">
                    <div id="udhaarDepositMoneyDiv<?php echo "$udhaarId"; ?>" class="spaceLeft10">
                    </div>
                </td>
            </tr>
        </table>
        </td>
        </table>
    </div>
</div>

<!--<hr scolor="#B8860B" />-->
