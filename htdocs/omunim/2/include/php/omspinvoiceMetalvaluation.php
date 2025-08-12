<?php
/*
 * **************************************************************************************
 * @tutorial: Sell Invoice @PRIYA 
 * **************************************************************************************
 * 
 *
 * @FileName: omspinvoiceMetalvaluation.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2013 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2013 SoftwareGen, Inc
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
require_once 'system/omssopin.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
require_once 'nepal/nepali-date.php';
require_once 'ommpnmwd.php';
?>
<?php
include 'omEstiSellInsUpd.php';
$nepali_date = new nepali_date();
ob_start();
$sessionOwnerId = $_SESSION['sessionOwnerId'];
//
$custId = $_GET['custId'];
$custId = $_GET['userId'];
//echo '$custId' . $custId;
//echo '$slPrPreInvoiceNo' . $slPrPreInvoiceNo;
$slPrPreInvoiceNo = $_GET['slPrPreInvoiceNo'];
//echo '$slPrPreInvoiceNo' . $slPrPreInvoiceNo;
$slPrInvoiceNo = $_GET['slPrInvoiceNo'];
//echo '$slPrInvoiceNo' . $slPrInvoiceNo;
$invoiceDate = $_GET['invoiceDate'];
$invoicePanel = $_GET['invoicePanel'];
//
$roughEstimate = $_GET['roughEstimate'];
$slprinSubPanel = $_GET['slprinSubPanel'];
$invName = $_GET['invName'];
// ADDED CODE FOR DELIVERY DATE @PRIYANKA-19NOV2022
$orderDeliveryDate = $_GET['orderDeliveryDate'];
//
$labelType = $_GET['labelType'];
if ($labelType == '') {
    $labelType = 'SellPurchase';
}
$panelName = $_GET['panelName'];
$panel = $_GET['panel'];
//
$emailStatus = $_GET['emailStatus'];
$whatsappStatus = $_GET['whatsappStatus'];
$directPrintInvoice = $_GET['directPrintInvoice'];
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
// **************************************************************************************
// START CODE TO GET VALUE OF NEPALI DATE MONTH FORNMAT OPTION @AUTHOR:MADHUREE-01DEC2021
// **************************************************************************************
//
$selNepaliDateMonthFormat = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateMonthFormat'";
$resNepaliDateMonthFormat = mysqli_query($conn, $selNepaliDateMonthFormat);
$rowNepaliDateMonthFormat = mysqli_fetch_array($resNepaliDateMonthFormat);
$nepaliDateMonthFormat = $rowNepaliDateMonthFormat['omly_value'];
//
// ************************************************************************************
// END CODE TO GET VALUE OF NEPALI DATE MONTH FORNMAT OPTION @AUTHOR:MADHUREE-01DEC2021
// ************************************************************************************
//
// *********************************************************************************************
// START CODE TO GET VALUE OF SELL INVOICE OPTION : AUTHOR @DARSHANA 24 SEPT 2021
// *********************************************************************************************
//
$selSellInvSample = "SELECT omly_value FROM omlayout WHERE omly_option = 'SellInvSample'";
$resSellInvSample = mysqli_query($conn, $selSellInvSample);
$rowSellInvSample = mysqli_fetch_array($resSellInvSample);
$sellInvSample = $rowSellInvSample['omly_value'];
//
// *******************************************************************************************
// END CODE TO GET VALUE OF SELL INVOICE OPTION : AUTHOR @DARSHANA 24 SEPT 2021
// *******************************************************************************************
$sellInvOption = $_GET['customizationOption'];
//
//echo '$sellInvOption'.$sellInvOption;
//
if ($sellInvOption == 'byMetalValue') {
    parse_str(getTableValues("SELECT sttr_metal_type FROM stock_transaction "
                    . "WHERE sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo'"));

    $sttr_gold_count = noOfRowsCheck('sttr_metal_type', 'stock_transaction', "sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' and sttr_metal_type='Gold'");
    $sttr_silver_count = noOfRowsCheck('sttr_metal_type', 'stock_transaction', "sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo' and sttr_metal_type='Silver'");
//
//    echo '$sttr_gold_count : '.$sttr_gold_count.'<br>';
//    echo '$sttr_silver_count : '.$sttr_silver_count.'<br>';
//
    if ($sttr_gold_count > 0 && $sttr_silver_count > 0) {
        $labelType = $_GET['labelType'];
    } else if ($sttr_metal_type == 'Gold') {
        $labelType = 'GoldSellPurchase';
    } else if ($sttr_metal_type == 'Silver') {
        $labelType = 'SilverSellPurchase';
    }
}
if ($slprinSubPanel == '') {
    parse_str(getTableValues("SELECT utin_transaction_type FROM user_transaction_invoice "
                    . "WHERE utin_pre_invoice_no = '$slPrPreInvoiceNo' and utin_invoice_no = '$slPrInvoiceNo'"));
    if ($utin_transaction_type != '') {
        $slprinSubPanel = $utin_transaction_type;
    }
}

if ($sttr_transaction_type == '') {
    parse_str(getTableValues("SELECT sttr_transaction_type FROM stock_transaction"
                    . " WHERE sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo'"));
//    echo "SELECT sttr_transaction_type FROM stock_transaction WHERE sttr_pre_invoice_no = '$slPrPreInvoiceNo' and sttr_invoice_no = '$slPrInvoiceNo'";
    if ($sttr_transaction_type != '') {
        $sttr_transaction_type = $sttr_transaction_type;
        //echo '$panelName:' . $panelName.'<br />';
    }
}

if ($slprinSubPanel == 'RECEIPT' || $slprinSubPanel == 'PAYMENT') {
    include 'ogspinvo_1.0.1.php';
} else {
//  
//
//echo '$slprinSubPanel:' . $slprinSubPanel.'<br />';
//echo '$panelName:' . $panelName.'<br />';
//echo '$custId' . $custId;
//echo  '$slPrPreInvoiceNo' . $slPrPreInvoiceNo;
//echo  '$slPrInvoiceNo' . $slPrInvoiceNo;
//$slPrPreInvoiceNo = $_GET['slPrPreInvoiceNo'];
//$slPrInvoiceNo = $_GET['slPrInvoiceNo'];
    //
    parse_str(getTableValues("SELECT utin_transaction_type,utin_firm_id,utin_user_id FROM user_transaction_invoice "
                    . "WHERE utin_owner_id = '$_SESSION[sessionOwnerId]' "
                    . "and utin_pre_invoice_no = '$slPrPreInvoiceNo' and utin_invoice_no = '$slPrInvoiceNo'"));
    //

    if ($utin_transaction_type == 'TransPayment') {
        $panelName = 'TRANS_PAYMENT';
        $invName = 'TRANS_PAYMENT';
        $firmId = $utin_firm_id;
    }
    //
    if ($panelName == 'XRF_PAYMENT' || $slprinSubPanel == 'XRF') {
        $invName = 'XRF_PAYMENT';
        $slprinSubPanel = 'XRF_PAYMENT';
    }
    //
    if ($utin_user_id != '') {
        parse_str(getTableValues("SELECT user_fname,user_lname FROM user WHERE user_id='$utin_user_id'"));
    }
    //
    $invDate = date_create($invoiceDate);
    $invoiceDateForTitle = strtoupper(date_format($invDate, "d M Y"));
    ?>



    <!DOCTYPE html>
    <html>
        <head>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="imagetoolbar" content="no" />
            <?php
            $query = "SELECT * FROM user WHERE user_id = $custId ";
            //echo $query;
            $resUserFirmId = mysqli_query($conn, $query);
            $rowuserdetail = mysqli_fetch_array($resUserFirmId);
            $custName = $rowuserdetail['user_fname'] . $rowuserdetail['user_lname'];
            $firmid = $rowuserdetail['user_firm_id'];
            if ($rowuserdetail['user_add'] == "" || $rowuserdetail['user_add'] == null) {
                $custaddress = $rowuserdetail['user_city'] . " " . $rowuserdetail['user_state'] . " " . $rowuserdetail['user_country'];
            } else {
                $custaddress = $rowuserdetail['user_add'];
            }

            $qSelAllMetelValVoucher = "SELECT * FROM stock_transaction where sttr_transaction_type='Metalvaluation' and sttr_user_id='$custId' "
                    . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' and sttr_indicator='Metalvaluation'";

            //echo'<br>$qSelAllMetelValVoucher1'.$qSelAllMetelValVoucher.'<br>';
            $resAllMetelValVoucher = mysqli_query($conn, $qSelAllMetelValVoucher);
            $rowAllMetelValVoucher = mysqli_fetch_array($resAllMetelValVoucher);
               if($nepaliDateIndicator == 'YES'){
             $addDate = $rowAllMetelValVoucher['sttr_other_lang_add_date'];
            }else{
            $addDate = $rowAllMetelValVoucher['sttr_add_date'];
            }
            $asOnDate = $rowAllMetelValVoucher['sttr_as_on_date'];

            $queryfirm = "SELECT * FROM firm WHERE firm_id = $firmid ";
            //echo '$queryfirm:'.$queryfirm;
            $resfirmdetails = mysqli_query($conn, $queryfirm);
            $rowfirmdetail = mysqli_fetch_array($resfirmdetails);
            $firmname = $rowfirmdetail['firm_long_name'];

            $qutintransinv = "SELECT * FROM user_transaction_invoice WHERE utin_user_id = $custId and utin_pre_invoice_no = '$slPrPreInvoiceNo' and utin_invoice_no = '$slPrInvoiceNo'";
            //echo '$qutintransinv'.$qutintransinv;
            $resutintransinvdetails = mysqli_query($conn, $qutintransinv);
            $rowutintransinvdetails = mysqli_fetch_array($resutintransinvdetails);
            $tax_amt = $rowutintransinvdetails['utin_total_amt'];
            //echo '$tax_amt'.$tax_amt;
            ?>
            <!------<?php if ($utin_transaction_type == 'sell' || $utin_transaction_type == 'ESTIMATESELL') { ?>
                                                                                                                    <h1><?php echo $slPrPreInvoiceNo . $slPrInvoiceNo . '_' . $user_fname . ' ' . $user_lname . '_' . $invoiceDateForTitle ?></h1>
            <?php } else { ?>
                                                                                                                    <title>Online Munim &mdash; Girvi Software, Jewellery Software, Jewellery &amp; Money Lending Accounting Software...</title>
            <?php } ?>----->
        <table valign="top" class="paddingLeft2 paddingRight2 A4-Inv-Table" style="padding:2px; padding-top:2mm; border: 0px solid ;" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center"><!-- change in alignment from center to left and top @AUTHOR:SANDY22JUL13 -->
            <tbody><tr> 
                    <td colspan="14" align="left">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <!--START DEFAULT INVOICE LAYOUT-->
                            <tbody><tr> 
                                    <td colspan="14" align="left">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td valign="bottom" align="right">
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="right">
                                                            <tbody><tr> 

                                                                <tr>
                                                                    <td class="center-content">
                                                                        <h1 class="ff_calibri font_color_black" style="font-size:20px; font-weight: bold;" onclick="this.contentEditable = 'true';" valign="middle" align="center">

                                                                            <?php
                                                                            if ($sttr_transaction_type == 'MetalValuation') {
                                                                                echo $firmname;
                                                                                ?>
                                                                                <title><?php //echo $firmname                               ?></title>
                                                                            <?php } else { ?>
                                                                                <title> OMUNIM JWELLERS  </title>
                                                                            <?php } ?>
                                                                        </h1>
                                                                    </td>

                                                                </tr>
                                                            </tbody></table>
                                                        <table valign="bottom" cellspacing="0" cellpadding="0" align="center">
                                                            <tbody><tr>
                                                                </tr>
                                                            </tbody></table>
                                                    </td>

                                                </tr>
                                            </tbody></table>
                                    </td>
                                </tr>

                            </tbody></table>
                    </td>
                </tr>
                <tr>
                    <td colspan="14" class="">
                        <!--<div class="hrPaleGrey"></div>-->
                        <hr>
                    </td>
                </tr>
                <tr> 
                    <td colspan="14" align="left">
                        <table style="padding-top:" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody><tr>
                                    <td width="65%" valign="top" align="left">
                                        <div class="ff_calibri fw_b font_color_black" style="font-weight: bold" onclick="this.contentEditable = 'true';">

                                            <!----START CODE TO SHOW BILL FROM FOR RAW METAL PURCHASE INVOICE,@AUTHOR:HEMA-3MAY2020----->

                                            <span class="spaceRight25" style="font-size:14px;">Details Of Receiver(Bill To) :</span><br>
                                        </div>
                                        <table cellspacing="0" cellpadding="0" border="0" align="left">                                   
                                            <tbody>
                                                <tr>
                                                    <td class="itemAddPnLabels12Arial font_color_black" style="font-size:14px; font-weight: bold" align="left">
                                                        <div class="paddingRight10">NAME  </div>
                                                    </td>
                                                    <td class="itemAddPnLabels12Arial font_color_black" style="font-size:14px" align="left">
                                                        <div class="paddingRight10"> : </div>
                                                    </td>

                                                    <td class="blackCalibri13Font font_color_black" align="left">
                                                        <div class="spaceRight5" style="font-size:14px;">

                                                            <?php if ($sttr_transaction_type == 'MetalValuation') { ?>
                                                                <?php echo $custName; ?><?php } ?>
                                                        </div>
                                                    </td> 
                                                </tr>

                                                <tr>
                                                    <td class="itemAddPnLabels12Arial font_color_black" style="font-size:14px; font-weight: bold; border:0px solid;" align="left">
                                                        <div class="paddingRight10">ADDRESS  </div>
                                                    </td>
                                                    <td class="itemAddPnLabels12Arial font_color_black" style="font-size:14px;border:0px solid;" align="left">
                                                        <div class="paddingRight10"> : </div>
                                                    </td>

                                                    <td class="blackCalibri13Font font_color_black" align="left">


                                                        <div style="border:0px solid;">
                                                            <div class="ff_calibri fw_n font_color_black" style="font-size:14px" onclick="this.contentEditable = 'true';">

                                                                <?php if ($sttr_transaction_type == 'MetalValuation') { ?>
                                                                    <?php echo $custaddress; ?>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>


                                            </tbody></table>
                                    </td>
                                    <td class="paddingRight10" width="35%" valign="top" align="right">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="right">

                                            <tbody><tr>

                                                    <td align="right">
                                                        <div class="ff_calibri fw_b font_color_black" style="font-size:14px; font-weight: bold" onclick="this.contentEditable = 'true';">
                                                            INVOICE NO:&nbsp;

                                                            <?php if ($sttr_transaction_type == 'MetalValuation') { ?>
                                                                <?php
                                                                echo $slPrPreInvoiceNo;
                                                                echo $slPrInvoiceNo;
                                                                ?>
                                                            <?php } ?>
                                                        </div> 
                                                    </td>
                                                </tr>
                                                <!-- START CODE TO DISPLAY MAIN SELL INVOICE NO IF URD INVOICE NO IS DIFFERENT @AUTHOR:MADHUREE-12JULY2021 -->
                                                <!-- END CODE TO DISPLAY MAIN SELL INVOICE NO IF URD INVOICE NO IS DIFFERENT @AUTHOR:MADHUREE-12JULY2021 -->

                                                <tr>
                                                    <td align="right">

                                                        <div class="ff_calibri fw_b font_color_black" style="font-size:14px; font-weight: bold" onclick="this.contentEditable = 'true';">DATE:&nbsp;

                                                            <span style="font-size:14px;font-weight: normal">
                                                                <?php if ($sttr_transaction_type == 'MetalValuation') { ?>
                                                                    <?php echo $addDate; ?>
                                                                <?php } ?> 
                                                            </span>
                                                        </div> 
                                                    </td>
                                                </tr>

                                                <!-- START CODE TO ADD GST AND PAN AT CUSTOMIZATION AT INVOICE @AUTHOR:RUTUJA-15FEB2021 -->

                                            </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="14" class="">

                                        <hr>
                                    </td>
                                </tr>
                                <tr><td colspan="14">
                                        <table style="padding-top:mm" width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr> 
                                                    <td colspan="14" valign="middle" align="center">
                                                        <div class="ff_calibri fw_n font_color_blue" style="font-size:16px;" onclick="this.contentEditable = 'true';">
                                                            <b>METAL VALUATION REPORT</b>                    </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="14" align="center">
                                                        &nbsp;
                                                    </td>
                                                </tr>
                                            <style>
                                                .border-color-grey-rb{
                                                    border-bottom: 1px solid #000000;
                                                    border-right: 1px solid #000000;
                                                }

                                                .bc_color_darkblue
                                                {
                                                    background-color: #1b5fa8;
                                                }
                                                .textarea_a5_content
                                                {
                                                    border: 0px solid #ccc;
                                                    font-family: calibri;
                                                    background-position: bottom right;
                                                    background-repeat: no-repeat;
                                                    background-color: #FFFFFF;
                                                    overflow: auto;
                                                    resize: none;
                                                }
                                                .font_color_black
                                                {
                                                    color: #000000;
                                                }
                                                .margin2pxAll
                                                {
                                                    padding: 2px 4px 2px 4px;
                                                }
                                                .border-color-grey-rbu{
                                                    border-right: 1px solid #000000;
                                                    border-bottom: 1px solid #000000;
                                                    border-top: 1px solid #000000;
                                                }
                                                .border-color-grey-left{
                                                    border-left:1px solid #000000;
                                                }
                                                .border-color-grey-top{
                                                    border-up:1px solid #000000;
                                                }
                                                .border-color-grey-ru{
                                                    border-top: 1px solid #000000;
                                                    border-right: 1px solid #000000;
                                                }
                                                .border-color-grey-u{
                                                    border-top: 1px solid #000000;
                                                }
                                            </style>
                                            <tr class="bc_color_darkblue"  height="20px">
                                                <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu " style="font-size:14px ;color: #FFFFFF;" width="" align="center" >
                                                    <div class="paddingRight5">SR NO.</div>
                                                </td>

                                                <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu " style="font-size:14px ;color: #FFFFFF;" width="" align="center">
                                                    <div class="paddingRight5">ITEM DET</div>
                                                </td>

                                                <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu " style="font-size:14px ;color: #FFFFFF;" width="" align="center">
                                                    <div class="paddingRight5">METAL TYPE</div>
                                                </td>

                                                <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu " style="font-size:14px ;color: #FFFFFF;" width="" align="center">
                                                    <div class="paddingRight5">QTY</div>
                                                </td>

                                                <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu " style="font-size:14px ;color: #FFFFFF;" width="" align="center">
                                                    <div class="paddingRight5">GS WT</div>
                                                </td>

                                                <td class="tableHeadColorChng ff_calibri fs_11 border-color-grey-rbu " style="font-size:14px ;color: #FFFFFF;" width="" align="center">
                                                    <div class="paddingRight5">AMOUNT</div>
                                                </td>
                                            </tr>                                            
                                            <?php
                                            $qSelAllMetelValVoucher1 = "SELECT * FROM stock_transaction  where sttr_transaction_type='Metalvaluation' and sttr_user_id='$custId' "
                                                    . "and sttr_pre_invoice_no='$slPrPreInvoiceNo' and sttr_invoice_no='$slPrInvoiceNo' and sttr_indicator='Metalvaluation'";
                                            //echo'<br>$qSelAllMetelValVoucher1'.$qSelAllMetelValVoucher1.'<br>';
                                            $resAllMetelValVoucher1 = mysqli_query($conn, $qSelAllMetelValVoucher1);
                                            $finalstockamt = 0;
                                            $i = 1;
                                            $tax_amt = 0;
                                            $cgst = 0;
                                            $sgst = 0;
                                            while ($rowAllMetelValVoucher1 = mysqli_fetch_array($resAllMetelValVoucher1, MYSQLI_ASSOC)) {
                                                $sutinid = $rowAllMetelValVoucher1['sttr_utin_id'];
                                                $stockName = $rowAllMetelValVoucher1['sttr_item_name'];
                                                $addDate = $rowAllMetelValVoucher1['sttr_add_date'];
                                                $billDate = $rowAllMetelValVoucher1['sttr_bill_date'];
                                                $details = $rowAllMetelValVoucher1['sttr_item_name'];
                                                $quantity = $rowAllMetelValVoucher1['sttr_quantity'];
                                                $grosswtg = $rowAllMetelValVoucher1['sttr_gs_weight'];
                                                $grosswtgtype = $rowAllMetelValVoucher1['sttr_gs_weight_type'];
                                                $valuation = $rowAllMetelValVoucher1['sttr_valuation'];
                                                $netweight = $rowAllMetelValVoucher1['sttr_nt_weight'];
                                                $sttr_metal_type = $rowAllMetelValVoucher1['sttr_metal_type'];
                                                $sttr_final_valuation = $rowAllMetelValVoucher1['sttr_final_valuation'];

//                                                echo "<pre>";
//                                                print_r($rowAllMetelValVoucher1);
//                                                echo "</pre>";
                                                //echo '$cryValuation'.$cryValuation;
                                                //echo $qSelAllMetelValInv;  
                                                //
//                                            echo "<pre>";
//                                            print_r($rowAllMetelValCry);
//                                            echo "</pre>";
                                            //echo '$cryValuation'.$cryValuation;
                                            if ($sttr_transaction_type == 'MetalValuation') {
                                                ?>
                                                <tr class="marginTop10">
                                                    <td class="border-color-grey-rb border-color-grey-left" valign="top" align="center">
                                                        <div class="paddingLeft5">                                                     
                                                            <?php echo $i; ?>
                                                        </div>
                                                    </td>

                                                    <td class="border-color-grey-rb border-color-grey-left" valign="top" align="center">
                                                        <div class="paddingLeft5">
                                                            <?php echo $details ?>
                                                        </div>
                                                    </td>

                                                    <td class="border-color-grey-rb border-color-grey-left" valign="top" align="center">
                                                        <div class="paddingLeft5">
                                                            <?php echo $sttr_metal_type ?>
                                                        </div>
                                                    </td>

                                                    <td class="border-color-grey-rb border-color-grey-left" valign="top" align="center">
                                                        <div class="paddingLeft5">
                                                            <?php echo $quantity ?>
                                                        </div>
                                                    </td>

                                                    <td class="border-color-grey-rb border-color-grey-left" valign="top" align="center">
                                                        <div class="paddingLeft5">
                                                            <?php $grosswtg1 = number_format($grosswtg, 3). " ".$grosswtgtype; ?>
                                                            <?php echo $grosswtg1 ?>
                                                        </div>
                                                    </td>

                                                    <td class="border-color-grey-rb border-color-grey-left" valign="top" align="center">
                                                        <div class="paddingLeft5">

                                                            <?php echo number_format($sttr_final_valuation, 3); ?>

                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            
                                           
                                            //getting crystal details
                                            //getting diamond detils//
                                                $qSelAllMetelValCry = "SELECT * FROM stock_transaction WHERE sttr_sttr_id = '$rowAllMetelValVoucher1[sttr_id]' "
                                                        . "AND sttr_transaction_type IN ('MetalValuation') "
                                                        . "AND sttr_indicator IN ('stockCrystal') "
                                                        . "AND sttr_pre_invoice_no='$slPrPreInvoiceNo' AND sttr_invoice_no='$slPrInvoiceNo'";
                                               // echo "qury".$qSelAllMetelValCry;
                                                $resAllMetelValCry = mysqli_query($conn, $qSelAllMetelValCry);
                                                while ($rowAllMetelValCry = mysqli_fetch_array($resAllMetelValCry, MYSQLI_ASSOC)) {
                                                    $cryNamedia = $rowAllMetelValCry['sttr_item_name'];
                                                    $cryNamediaCategory = $rowAllMetelValCry['sttr_item_category'];
                                                    $cryQuantitydia = $rowAllMetelValCry['sttr_quantity'];
                                                    $cryGrosswtgdia += $rowAllMetelValCry['sttr_gs_weight'];
                                                    $cryValuationdia += $rowAllMetelValCry['sttr_valuation'];
                                                    $cryGsWtType = $rowAllMetelValCry['sttr_gs_weight_type'];
//                                                      echo '<pre>';
//                                                    print_r($rowAllMetelValCry);
//                                                    echo '</pre>';
                                                    ?>
                                                
                                                <tr class="marginTop10">
                                                    <td class="border-color-grey-rb border-color-grey-left" valign="top" align="center">
                                                        <div class="paddingLeft5">                                                     
                                                            <?php  ?>
                                                        </div>
                                                    </td>

                                                    <td class="border-color-grey-rb border-color-grey-left" valign="top" align="center">
                                                        <div class="paddingLeft5">
                                                            <?php echo $cryNamedia ?>
                                                        </div>
                                                    </td>

                                                    <td class="border-color-grey-rb border-color-grey-left" valign="top" align="center">
                                                        <div class="paddingLeft5">
                                                            <?php echo $cryNamediaCategory ?>
                                                        </div>
                                                    </td>

                                                    <td class="border-color-grey-rb border-color-grey-left" valign="top" align="center">
                                                        <div class="paddingLeft5">
                                                            <?php echo $cryQuantitydia ?>
                                                        </div>
                                                    </td>

                                                    <td class="border-color-grey-rb border-color-grey-left" valign="top" align="center">
                                                        <div class="paddingLeft5">
                                                            <?php $grosswtg1 = number_format($cryGrosswtgdia, 3). " ".$cryGsWtType ; ?>
                                                            <?php echo $grosswtg1 ?>
                                                        </div>
                                                    </td>

                                                    <td class="border-color-grey-rb border-color-grey-left" valign="top" align="center">
                                                        <div class="paddingLeft5">

                                                            <?php echo number_format($cryValuationdia, 3); ?>

                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php 
                                                }
                                                }                                           
                                        } 
                                            $i = $i + 1;                                       
//                                       
                                            ?>
                            </tbody>
                        </table>

                    </td>
                </tr>

                <tr>
                    <td colspan="14" align="center">
                        &nbsp;
                    </td>

                </tr>
                <?php
                $qutintransinv_m = "SELECT * FROM user_transaction_invoice WHERE utin_user_id = $custId and utin_pre_invoice_no = '$slPrPreInvoiceNo' and utin_invoice_no = '$slPrInvoiceNo'";
                //echo '$qutintransinv'.$qutintransinv;
                $resutintransinvdetails_m = mysqli_query($conn, $qutintransinv_m);
                //$rowutintransinvdetails = mysqli_fetch_array($resutintransinvdetails_m);
                $tax_amt = 0;
                $cgst_amt = 0;
                $sgst_amt = 0;
                while ($rowutintransinvdetails_m = mysqli_fetch_array($resutintransinvdetails_m, MYSQLI_ASSOC)) {
                    //  echo "<pre>";
                    //print_r($rowutintransinvdetails_m);
                    //echo "</pre>";
                    // $cgst = $rowutintransinvdetails['cgst'];
                    $tax_amt = $rowutintransinvdetails['utin_pay_tax_tot_amt'];
                    $cgst_amt = $rowutintransinvdetails['utin_pay_cgst_amt'];
                    $sgst_amt = $rowutintransinvdetails['utin_pay_sgst_amt'];
                    $total_pay_amt = $rowutintransinvdetails['utin_tot_payable_amt'];
                    $cash_amt_rec = $rowutintransinvdetails['utin_cash_amt_rec'];
                    $total_cash_balance = $rowutintransinvdetails['utin_cash_balance'];
                    $utin_cash_amt_rec = $rowutintransinvdetails['$utin_cash_amt_rec'];
                    ?>          

                <?php } ?>  
            <table class="margin2pxAll" width="100%" cellspacing="0" cellpadding="0" border="0">
                <thead>
                <tbody>
                    <tr>
                        <td class="itemAddPnLabels12Arial" width="670px" align="right">
                            <div class="paddingRight5 ff_calibri fw_b font_color_black" style="width:120px;font-size:12px;font-weight: bold; font-family: Calibri" onclick="this.contentEditable = 'true';">
                                TAXABLE AMOUNT : 
                            </div>
                        </td>
                        <td class="itemAddPnLabels12Arial"style="width:120px;font-size:12px;font-weight: bold; font-family: Calibri" align="right">
                            <div class="paddingRight2">
                                <?php echo $tax_amt ?>                   
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="itemAddPnLabels12Arial" width="670px" align="right">
                            <div class="paddingRight5 ff_calibri fw_b font_color_black" style="width:120px;font-size:12px; font-weight: bold;font-family: Calibri" onclick="this.contentEditable = 'true';">
                                CGST : 
                            </div>
                        </td>
                        <td class="itemAddPnLabels12Arial" style="width:120px;font-size:12px;font-weight: bold;font-family: Calibri" align="right">
                            <div class="paddingRight2">
                                <?php echo $cgst_amt ?>              
                            </div>
                        </td>
                    </tr>                             


                    <tr>
                        <td class="itemAddPnLabels12Arial" width="670px" align="right">
                            <div class="paddingRight5  ff_calibri fw_b font_color_black" style="width:120px;font-size:12px;font-weight: bold;font-family: Calibri" onclick="this.contentEditable = 'true';">
                                SGST : 
                            </div>
                        </td>
                        <td class="itemAddPnLabels12Arial"style="width:120px;font-size:12px;font-weight: bold;font-family: Calibri" align="right">
                            <div class="paddingRight2">
                                <?php echo $sgst_amt ?>                 
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="itemAddPnLabels12Arial" width="670px" align="right">
                            <div class="paddingRight5  border-color-grey-top border-color-grey-bottom  ff_calibri fw_b font_color_black" style="width:120px;font-size:12px;font-weight: bold;font-family: Calibri" onclick="this.contentEditable = 'true';">
                                FINAL AMOUNT : 
                            </div>
                        </td>
                        <td class="itemAddPnLabels12Arial border-color-grey-top border-color-grey-bottom"style="width:120px;font-size:12px;font-family: Calibri" align="right">
                            <div class="paddingRight2">
                                <?php echo $total_pay_amt ?>                     
                            </div>
                        </td>
                    </tr>

                <td class="" align="left">
                    &nbsp;
                </td>


                <tr>
                    <td class="itemAddPnLabels12Arial" width="670px" align="right">
                        <div class="paddingRight5 border-color-grey-bottom  ff_calibri fw_b font_color_black" style="width:120px;font-size:12px;font-weight: bold;font-family: Calibri" onclick="this.contentEditable = 'true';">
                            CASH PAID : 
                        </div>
                    </td>
                    <td class="itemAddPnLabels12Arial border-color-grey-bottom " style="width:120px;font-size:12px" align="right">
                        <div class="greenFont paddingRight2">
                            <?php echo $cash_amt_rec ?>       
                        </div>
                    </td>
                </tr>


                <tr>
                    <td class="itemAddPnLabels12Arial" width="670px" align="right">
                        <div class="paddingRight5  ff_calibri fw_b font_color_black border-color-grey-bottom" style="width:120px;font-size:12px;font-weight: bold;font-family: Calibri" onclick="this.contentEditable = 'true';">
                            TOTAL REC. AMOUNT : 
                        </div>
                    </td>
                    <td class="itemAddPnLabels12Arial border-color-grey-bottom" style="width:120px;font-size:12px" align="right">
                        <div class="greenFont paddingRight2">
                            <?php echo $total_pay_amt ?>                     
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="14">
                        <br><table class="margin2pxAll" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody><tr>
                                    <td class="" align="left">
                                        &nbsp;
                                    </td>

                                    <td  style="font-size:14px" align="right">
                                        <table width="50%" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td class="border-color-grey-top  " width="50%" align="right">
                                                    <div class="redFont  ff_calibri fw_b font_color_black" onclick="this.contentEditable = 'true';" style="font-size:18px; font-weight: bold; font-family:calibri">
                                                        <span>AMT BALANCE :                                               
                                                            <span>
                                                                <?php echo $total_cash_balance ?>  
                                                            </span>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="border-color-grey-bottom border-color-grey-top itemAddPnLabels12Arial font_color_black" style="font-size:14px;font-weight: bold;font-family:calibri" align="left">
                                        PAYABLE AMOUNT :
                                    </td>
                                    <td class="border-color-grey-bottom border-color-grey-top itemAddPnLabels12Arial"style="font-size:12px;font-weight: bold;font-family:calibri" align="left">
                                        <?php echo ucwords(numToWords(abs($total_pay_amt + 0))) . ' Only/-' ?>
                                    </td>

                                                                <!--- <td align="right" class="itemAddPnLabels12Arial font_color_<?php echo $cashPaid_color; ?>" style="font-size:<?php echo $cashPaidt_size; ?>px">
                                                                   <div class="paddingRight2"><?php echo formatInIndianStyle($utin_cash_amt_rec + $utin_pay_cheque_amt + ($utin_pay_card_amt + $utin_pay_trans_chrg) + ($utin_online_pay_amt - $utin_pay_comm_paid)); ?></div>
                                                                 </td>--->
                                </tr>

                            </tbody></table>
                    </td>
                </tr>

                <tr>
                    <td colspan="14">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody><tr>
                                    <td colspan="14">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">    
                                            <tbody><tr>
                                                    <td colspan="14" align="center">
                                                        &nbsp;
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="14">
                                                        <table style="padding-top:mm" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody><tr>
                                                                    <td class="ff_calibri fw_b font_color_black" style="font-size:14px;font-weight: bold;font-family:calibri" align="left">
                                                                        Terms and Conditions : &nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="ff_calibri fw_n font_color_black" style="font-size:12px;font-family:calibri" align="left">
                                                                        <div onclick="this.contentEditable = 'true';">
                                                                            <textarea id="tncLabel" spellcheck="false" name="tncLabel" class="textarea_a5_content ff_calibri font_color_black" rows="2" style="text-align:left;width:90%;height:84;font-size:14px">All disputes are subject to the jurisdiction of the competent courts in Delhi.</textarea>                                   
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                            </tbody></table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="paddingRight5" valign="middle" align="right">
                                                        <table valign="bottom" cellspacing="0" cellpadding="0" border="0" align="right">
                                                            <tbody><tr>
                                                                </tr>
                                                            </tbody></table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table width="100%">
                                                            <tbody><tr>
                                                                    <td width="50%" align="left"></td>

                                                                    <td width="50%" align="right">
                                                                    </td></tr>
                                                                <tr>

                                                                    <td class="ff_calibri fw_b font_color_black"style="font-size:14px;font-weight: bold;font-family:calibri" width="150px" align="left">Customer Signatory</td>
                                                                    <td class="ff_calibri fw_b font_color_black"style="font-size:14px;font-weight: bold;font-family:calibri" width="150px" align="right">Authorized Signatory</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr>

                                                                </tr>
                                                            </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody></table>  
                    <table cellspacing="0" cellpadding="0" border="0" align="center">
                        <tbody><tr>
<!--                                        <td class="noPrint" colspan="14" align="center">
                                    <a style="cursor: pointer;" onclick="window.print();">
                                        <img src="http://127.0.0.1:8080/2/images/printer32.png" alt="Print" title="Print" width="32px" height="32px"> 
                                    </a>
                                </td>-->
<!--                                        <td class="noPrint" align="center">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>
                                <td class="noPrint" colspan="14" align="center">
                                    <a style="cursor: pointer;" href="localexplorer:C:\COM\bat\omprint.bat">
                                        <img src="http://127.0.0.1:8080/2/images/printer_wifi_32.png" alt="Print" title="Print" width="32px" height="32px"> 
                                    </a>
                                </td>
                                <td class="noPrint" align="center">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>

                                <td class="noPrint" colspan="14" align="center">

                                    <a style="cursor: pointer;" onclick="var url = window.location.href;
                                            url += '&amp;emailStatus=Yes';
                                            window.location.href = url;">
                                        <img src="http://127.0.0.1:8080/2/images/email_48x48.png" alt="Email" title="Email" width="32px" height="32px"> 
                                    </a>
                                </td>-->
                                <td class="noPrint" align="center">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </td>

<!--                                        <td class="noPrint" colspan="14" align="center">
                                            <a style="cursor: pointer;" onclick="var url = window.location.href;
                                                    url += '&amp;whatsappStatus=Yes';
                                                    window.location.href = url;" "="">
                                                <img src="http://127.0.0.1:8080/2/images/whatsapp24.png" alt="Send Whatsapp" title="Send Whatsapp" width="32px" height="32px"> 
                                            </a>

                                        </td>-->
                            </tr>
                        </tbody></table>
                </td>
            </tr>
            </tbody></table>
    </td>
</tr>
</tbody></table>

<?php if ($sellInvSample != 'SellInvSampleTaxNewRetailWholesale') { ?>
    <style>
        .border-color-grey-bottom{
            border-bottom : 1px solid #000000;
        }
        .border-color-grey-top{
            border-top : 1px solid #000000;
        }
        @page {
            size: auto;
        }
        .invoice-table tr:first-child td {
            padding-top: unset;
        }
        .invoice-table tr:nth-child(2) td {
            padding-top: 1px;
        }
        .invoice-table tr:last-child td {
            padding-top: unset;
        }
        .invoice-table tr td{
            padding-top:5px;
        }
        .invoiceWholesaleBoder{
            border: 1px solid;
        }
        .invoiceWholesaleStyletitle{
            font-size: 14px;
            font-weight: 600;
            padding:4px;
        }
        .invoiceWholesaleStyle{
            font-size: 14px;
            padding:4px;
        }
        @media print {
            .hidden-print {
                display: none !important;
            }
        }
    </style>
<?php } ?>
</head>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="width: 100%; align-items: center; margin-left: 625px;">
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td align="<?php echo $align; ?>" class="noPrint" style="width:100%" class="hidden-print">
            <a style="cursor: pointer;"
               onclick="window.print();">
                <img src="<?php echo $documentRoot; ?>/images/printer24.png" alt='Print' title='Print' class="hidden-print"
                     width="32px" height="32px"/> 
            </a> 
        </td>
    </tr>
</table>
</body>

</html>
