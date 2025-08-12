<?php
/*
 * **************************************************************************************
 * @tutorial: Sell URD Invoice A5 Sheet Format
 * **************************************************************************************
 * 
 * Created on June 11, 2019 9:16:40 PM
 *
 * @FileName: URDheader.php
 * @Author: SoftwareGen Developement Team
 * @AuthorEmailId:  info@softwaregen.com
 * @ProjectName: omunim
 * @version 1.0.1
 * @Copyright (c) 2010 www.softwaregen.com
 * @All rights reserved
 *  Copyright 2012 SoftwareGen, Inc
 *
 * @ModificaionHistory
 *  MODIFICATION DATE:
 *  AUTHOR:
 *  REASON:
 *
 */
?>
<?php
//header start
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpnmwd.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
include_once 'conversions.php';
?>
<style>
    .border-color-grey-bottom{
        border-bottom : 1px solid #000000;
    }
    .border-color-grey-top{
        border-top : 1px solid #000000;
    }
</style>
<?php
//Start Code to get Cust and Firm Details 
//Start Code To Select FirmId
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
// salepurchase to  stock_sell @Author: GAUR18MAR16
$userId = $_GET['userId'];
//
if ($invName == 'XRF_PAYMENT') {
 //
 $qSelCustId = "SELECT xrf_user_id,xrf_firm_id,xrf_metal_type FROM xrf_entries WHERE xrf_owner_id = '$sessionOwnerId' "
             . "and xrf_pre_invoice_no = '$slPrPreInvoiceNo' and "
             . "xrf_invoice_no = '$slPrInvoiceNo' and xrf_firm_id IN ($strFrmId) AND xrf_status NOT IN ('DELETED') AND "      
             . "xrf_user_id = '$userId' order by xrf_id asc";
 
    //echo '$qSelCustId == '.$qSelCustId;
    
    $resCustId = mysqli_query($conn, $qSelCustId);
    $rowCustId = mysqli_fetch_array($resCustId, MYSQLI_ASSOC);
    $firmId = $rowCustId['xrf_firm_id'];
    $metal_type = $rowCustId['xrf_metal_type'];
    $sttr_transaction_type = 'sell';
 //
} else if ($invName == 'TRANS_PAYMENT') {
    //
    $qSelCustId = "SELECT transaction_firm_id FROM transaction WHERE transaction_own_id = '$sessionOwnerId' "
             . "and transaction_pre_vch_id = '$slPrPreInvoiceNo' and "
             . "transaction_post_vch_id = '$slPrInvoiceNo' and transaction_firm_id IN ($strFrmId) "
             . "AND transaction_upd_sts IN ('PaymentDone') "      
             . "order by transaction_id asc";
 
    //echo '$qSelCustId == '.$qSelCustId;
    
    $resCustId = mysqli_query($conn, $qSelCustId);
    $rowCustId = mysqli_fetch_array($resCustId, MYSQLI_ASSOC);
    $firmId = $rowCustId['transaction_firm_id'];
    $metal_type = "TransPayment";
    $sttr_transaction_type = "TransPayment";
    //
} else {
    //
    $qSelCustId = "SELECT sttr_user_id, sttr_firm_id, sttr_metal_type, sttr_transaction_type FROM stock_transaction "
                . "WHERE sttr_owner_id='$sessionOwnerId' and sttr_pre_invoice_no='$slPrPreInvoiceNo' and "
                . "sttr_invoice_no='$slPrInvoiceNo' and sttr_firm_id IN ($strFrmId) AND sttr_status NOT IN ('DELETED') "
                . "and sttr_indicator IN ('stock','PURCHASE','rawMetal','crystal','imitation','strsilver','ItemReturn','APPROVAL') "
                . "and sttr_transaction_type IN('sell','PURCHASE','PURBYSUPP','ESTIMATE','ItemReturn','APPROVAL') "
                . "and sttr_user_id='$userId' order by sttr_id asc";
    //
    $resCustId = mysqli_query($conn, $qSelCustId);
    $rowCustId = mysqli_fetch_array($resCustId, MYSQLI_ASSOC);
    $firmId = $rowCustId['sttr_firm_id'];
    $metal_type = $rowCustId['sttr_metal_type'];
    $sttr_transaction_type = $rowCustId['sttr_transaction_type'];
}
//
//echo '$qSelCustId == '.$qSelCustId.'<br />';
//
$goldPresent = 0;
$silverPresent = 0;
//
if ($rowCustId['sttr_metal_type'] == 'Gold') {
    $goldPresent = 1;
}
//
if ($rowCustId['sttr_metal_type'] == 'Silver') {
    $silverPresent = 1;
}
//!= 'NoRateCut'
//$qSelSlPrItemDetails = "SELECT stsl_id,stsl_metal_type FROM stock_sell where stsl_owner_id='$sessionOwnerId' and stsl_cust_pre_invoice_no='$slPrPreInvoiceNo' and stsl_cust_invoice_no='$slPrInvoiceNo' AND stsl_status NOT IN ('Deleted') order by stsl_since asc"; //Add condition for wholesalepurchase @Author:ANUJA22APR15
//echo '$qSelSlPrItemDetails'.$qSelSlPrItemDetails;
//$resSlPrItemDetails = mysqli_query($conn, $qSelSlPrItemDetails);
//while ($rowSlPrDetails = mysqli_fetch_array($resSlPrItemDetails, MYSQLI_ASSOC)) {
//    if ($rowSlPrDetails['stsl_metal_type'] == 'Gold') {
//        $goldPresent = 1;
//    }
//    if ($rowSlPrDetails['stsl_metal_type'] == 'Silver') {
//        $silverPresent = 1;
//    }
//}
if ($goldPresent == 1 && $silverPresent == 1) {
    $invTitle = ' / GOLD-SILVER ' . om_strtoupper($sttr_transaction_type);
} else if ($goldPresent == 1) {
    $invTitle = ' / GOLD ' . om_strtoupper($sttr_transaction_type);
    if ($invName == 'metalPurchase') {
        $invTitle = ' / GOLD ' . om_strtoupper($sttr_transaction_type);
    }
    if ($invName == 'rawMetalSale') {
        $invTitle = ' / RAW GOLD ' . om_strtoupper($sttr_transaction_type);
    }
} else {
    $invTitle = ' / SILVER ' . om_strtoupper($sttr_transaction_type);
    if ($invName == 'metalPurchase') {
        $invTitle = ' / SILVER ' . om_strtoupper($sttr_transaction_type);
    }
    if ($invName == 'rawMetalSale') {
        $invTitle = ' / RAW SILVER ' . om_strtoupper($sttr_transaction_type);
    }
}
//
$counter = 1;
//
//Select Inv Present
//$qRowSlrn = noOfRows2('slprrn_id', 'slpr_return_inv', 'slprrn_pre_invoice_no', 'slprrn_invoice_no', $slPrPreInvoiceNo, $slPrInvoiceNo);
//
parse_str(getTableValues("SELECT firm_id,firm_reg_no,firm_form_header,firm_name,firm_long_name,firm_address,firm_phone_details,firm_email,firm_desc,firm_pan_no,"
                . "firm_tin_no,firm_left_thumb_ftype,firm_right_thumb_ftype FROM firm where firm_own_id='$sessionOwnerId' and firm_id='$firmId' $sessionFirmStr"));
//************************Start change code for data from customer to user Author@:SANT12JAN16******************************************************************************************
//
$qSelFirm = "SELECT firm_id,firm_reg_no,firm_form_header,firm_name,firm_long_name,firm_address,firm_phone_details,firm_email,firm_desc,firm_pan_no,"
        . "firm_tin_no,firm_left_thumb_ftype,firm_right_thumb_ftype FROM firm where firm_own_id='$sessionOwnerId' and firm_id='$firmId' $sessionFirmStr";
$resFirmCount = mysqli_query($conn, $qSelFirm);
//
while ($rowFirm = mysqli_fetch_array($resFirmCount, MYSQLI_ASSOC)) {
    $firm_long_name = $rowFirm['firm_long_name'];
}
//echo '$firm_long_name= '.$firm_long_name;
parse_str(getTableValues("SELECT user_fname,user_lname,user_father_name,user_pan_it_no,user_sale_tax_no,user_add,user_city,user_pincode,user_state,user_country,user_cst_no,user_phone,user_adhaar_card,user_mobile FROM user where user_owner_id='$sessionOwnerId' and user_id='$userId'"));
//*************************End change code for data from customer to user Author@:SANT12JAN16******************************************************************************************
//echo $invoicePanel;
if ($invoicePanel == 'sellInvLay3Inch') {
    $divIdClass = 'sell_Inv_3Inch';
    $tableClass = 'sell_Inv_table';
    $imageClass = 'form7-logo-image';
    $colspan = '7';
    $itemIdWidth = '38px';
    $itemDescWidth = '34px';
    $gsWtWidth = '50px';
    $rateWidth = '53px';
    $valWidth = '54px';
    $amtWidth = '73px';
    $balanceTopBorder = 'border-color-grey-top';
    $itemNameSubstr = '4';
    $balanceInWordsFs = 'fs_12';
    $firmHeader = 'fs_18';
    $firmLongName = 'fs_16';
    $firmDesc = 'fs_14';
    $firmAddress = 'fs_12';
    $addressSubStr = '15';
    $fontSize = 'fs_12';
    $textAreaWidth = '290px';
    $wd = 400;
    $totalWidth = '60px';
    $rawPurityTitle = 'PR';
    $rawRateTitle = 'RT';
    $goldShort = 'GD';
    $silverShort = 'SR';
    $rawTitle = 'RW';
} else if ($invoicePanel == 'sellInvLay4Inch' || $invoicePanel == 'sellInvLayA6') {
    $divIdClass = 'sell_4InchInv_table';
    $tableClass = 'sell_4InchInv_table';
    $imageClass = 'form7-logo-image';
    $colspan = '8';
    $itemIdWidth = '38px';
    $itemDescWidth = '85px';
    $gsWtWidth = '56px';
    $ntWtWidth = '56px';
    $rateWidth = '45px';
    $valWidth = '70px';
    $amtWidth = '91px';
    $itemNameSubstr = '5';
    $balanceTopBorder = 'border-color-grey-top';
    $balanceInWordsFs = 'fs_12';
    $firmHeader = 'fs_20';
    $firmLongName = 'fs_18';
    $firmDesc = 'fs_16';
    $firmAddress = 'fs_12';
    $addressSubStr = '27';
    $fontSize = 'fs_12';
    $textAreaWidth = '340px';
    $wd = 400;
    $totalWidth = '60px';
    $rawPurityTitle = 'PR';
    $rawRateTitle = 'RT';
    $goldShort = 'GD';
    $silverShort = 'SR';
    $rawTitle = 'RW';
     $custAddress='180px';
     $finalamtwidth='70%';
} else if ($invoicePanel == 'sellInvLayA5') {

    $divIdClass = 'bodyClass';
    $tableClass = 'sellInvA5-main-table';
    $imageClass = 'a5-logo-image';
    $colspan = '8';
    $itemIdWidth = '40px';
    $itemDescWidth = '55px';
    $gsWtWidth = '55px';
    $ntWtWidth = '55px';
    $rateWidth = '40px';
    $valWidth = '65px';
    $labourWidth = '50px';
    $amtWidth = '86px';
    $balanceTopBorder = '';
    $itemNameSubstr = '6';
    $balanceInWordsFs = 'fs_14';
    $firmHeader = 'fs_22';
    $firmLongName = 'fs_20';
    $firmDesc = 'fs_16';
    $firmAddress = 'fs_14';
    $addressSubStr = '45';
    $fontSize = 'fs_13';
    $textAreaWidth = '400px';
    $wd = 600;
    $totalWidth = '60px';
    $rawPurityTitle = 'PR';
    $rawRateTitle = 'RT';
    $goldShort = 'GD';
    $silverShort = 'SR';
    $rawTitle = 'RAW';
    $custAddress='300px';
    $finalamtwidth='50%';
} else {
    $divIdClass = 'A4-size';
    $tableClass = 'A4-Inv-Table';
    $colspan = '14';
    $imageClass = 'form8-logo-image';
    $balanceTopBorder = '';
    $itemNameSubstr = '6';
    $balanceInWordsFs = 'fs_14';
    $firmHeader = 'fs_22';
    $firmLongName = 'fs_20';
    $firmDesc = 'fs_16';
    $firmAddress = 'fs_14';
    $addressSubStr = '45';
    $fontSize = 'fs_13';
    $textAreaWidth = '790px';
    $wd = 860;
    $totalWidth = '90px';
    $rawPurityTitle = 'PURITY';
    $rawRateTitle = 'RATE';
    $goldShort = 'GOLD';
    $silverShort = 'SILVER';
    $rawTitle = 'RAW';
    $custAddress='300px';
      $finalamtwidth='50%';
}
if ($labelType == '')
    $labelType = 'SellPurchase';

$fieldName = 'topMargin';
parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$topMargin = $label_field_content;

$label_field_content = '';
$fieldName = 'leftMargin';
parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$leftMargin = $label_field_content;


$fieldName = 'formBorderCheck';
$label_field_content = '';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
if ($label_field_check == 'true') {
    $border = '#000000 1px solid';
} else {
    $border = '#000000 0px solid';
}
?>
<?php //echo $topMargin . 'mm'; ?>

<div id="<?php echo $divIdClass; ?>" style="margin-top:<?php echo $topMargin . 'mm'; ?>;margin-left:<?php echo $leftMargin . 'mm'; ?>">
    <?php
    $fieldName = 'formWidth';
    $label_field_content = '';
    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
    $formWidthInMM = $label_field_content;
    if ($formWidthInMM != '') {
        $fieldName = 'headerTop';
        $label_field_content = '';
        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        $headerTopVal = $label_field_content;
        ?>
        <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" bgcolor="#FFFFFF" style="width:<?php echo $formWidthInMM . 'mm'; ?>;border: <?php echo $border; ?>;padding-top:<?php echo $headerTopVal; ?>"><!-- change in alignment from center to left and top @AUTHOR:SANDY22JUL13 -->
            <?php
        } else {
            $fieldName = 'headerTop';
            $label_field_content = '';
            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $headerTopVal = $label_field_content;
            ?>
            <table border="0" cellpadding="0" cellspacing="0" align="center" valign="top" bgcolor="#FFFFFF" class="paddingLeft2 paddingRight2 <?php echo $tableClass; ?>" 
                   style="border: <?php echo $border; ?>;padding-top:<?php echo $headerTopVal; ?>mm"><!-- change in alignment from center to left and top @AUTHOR:SANDY22JUL13 -->
                   <?php } ?>
            <tr> 
                <td align="left" colspan="<?php echo $colspan; ?>">
                    <table border="0" cellpadding="0" width="100%" cellspacing="0">
                        <!--START DEFAULT INVOICE LAYOUT-->
                        <?php if ($custInvLay == 'InvLayDefault') { ?>
                            <tr> 
                                <td align="left" colspan="<?php echo $colspan; ?>">
                                    <table border="0" cellpadding="0" width="100%" cellspacing="0">
                                        <tr>
                                            <!--START LEFT LOGO-->
                                            <?php if($sttr_transaction_type!='PURCHASE'){?>
                                            <td align="right" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" align="right">
                                                    <tr valign="top">
                                                        <?php
                                                        $fieldName = 'firmLeftLogoCheck';
                                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if (($firm_left_thumb_ftype != NULL || $firm_left_thumb_ftype != '') && $label_field_check == 'true') {
                                                            ?>
                                                            <td align="left" valign="top">
                                                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omffgfli.php?firm_id=<?php echo $firm_id; ?>" 
                                                                     alt="" class="<?php echo $imageClass; ?>" />
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                    
                                                </table>
                                            </td>
                                            <?php } else {?>
                                            <td align="right" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" align="right">
                                                    <tr valign="top">
                                                        <?php
                                                        $fieldName = 'firmLeftLogoCheck';
                                                        parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($label_field_check == 'true') {
                                                            ?>
                                                            <td align="left" valign="top">
                                                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omccguim.php?user_id=<?php echo $userId; ?>" 
                                                                     alt="" class="<?php echo $imageClass; ?>" />
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                    
                                                </table>
                                            </td>
                                            <?php }?>
                                            <!--END LEFT LOGO-->
                                            <!--START FIRM DETAILS-->
                                         <?php 
                                         if($sttr_transaction_type!='PURCHASE'){?>
                                            <td align="right">
                                                <table border="0" cellpadding="0" width="100%" cellspacing="0" align="right">
                                                    <?php
                                                    $fieldName = 'firmFormHeader';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($firm_form_header != NULL && $label_field_check == 'true') {
                                                        ?>
                                                        <tr> 
                                                            <td valign="middle" align="center" class="ff_calibri" style="color:<?php echo $label_field_font_color;?>;font-size:<?php echo $label_field_font_size; ?>px"  onClick="this.contentEditable = 'true';">
                                                                <?php echo ($firm_form_header); ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    $fieldName = 'firmLongName';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($firm_long_name != NULL && $label_field_check == 'true') {
                                                        ?>
                                                        <tr> 
                                                            <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                <?php echo ($firm_long_name); ?>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                    } $fieldName = 'firmDesc';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($firm_desc != NULL && $label_field_check == 'true') {
                                                        ?>
                                                        <tr> 
                                                            <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                <?php echo ($firm_desc); ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    } $fieldName = 'firmRegNo';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($firm_reg_no != NULL && $label_field_check == 'true') {
                                                        ?>
                                                        <tr> 
                                                            <?php
                                                            $fieldName = 'firmRegNoLabel';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?> :
                                                                <?php
                                                                $fieldName = 'firmRegNo';
                                                                $label_field_font_size = '';
                                                                $label_field_font_color = '';
                                                                parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" ><?php echo ($firm_reg_no); ?></span>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                    }
                                                    // 123
                                                    $fieldName = 'firmAddress';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($firm_address != NULL && $label_field_check == 'true') {
                                                        ?>
                                                        <tr> 
                                                            <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                <?php echo ($firm_address); ?>
                                                            </td>
                                                        </tr>
                                                    <?php } if ((($firm_phone_details != NULL) || $firm_email != NULL)) { ?>
                                                        <tr>
                                                            <td colspan="2">
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center">
                                                                    <tr>
                                                                    <?php
                                                                    $fieldName = 'firmPhone';
                                                                    $label_field_font_size = '';
                                                                    $label_field_font_color = '';
                                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                    if ($firm_phone_details != NULL && $label_field_check == 'true') {
                                                                        ?>
                                                                        
                                                                            <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                                <?php echo $label_field_content; ?> : <?php echo $firm_phone_details; ?>
                                                                            </td>
                                                                        
                                                                        <?php
                                                                    } $fieldName = 'firmEmail';
                                                                    $label_field_font_size = '';
                                                                    $label_field_font_color = '';
                                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                    if ($firm_email != NULL && $label_field_check == 'true') {
                                                                        ?>
                                                                        
                                                                            <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?> padLeft5" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                                <?php echo $label_field_content; ?> : <?php echo $firm_email; ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                   
                                                        <?php
                                                        // 123
                                                        $fieldName = 'firmTin';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($firm_tin_no != NULL && $label_field_check == 'true') {
                                                            ?>
                                                            <tr> 
                                                                <?php
                                                                $fieldName = 'firmTinLb';

                                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                ?>
                                                                <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                    <?php echo $label_field_content; ?> :
                                                                    <?php
                                                                    $fieldName = 'firmTin';
                                                                    $label_field_font_size = '';
                                                                    $label_field_font_color = '';
                                                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                    ?>
                                                                    <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" ><?php echo ($firm_tin_no); ?></span>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        <?php
                                                        $fieldName = 'firmPan';
                                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($firm_pan_no != '' && $label_field_check == 'true') {
                                                            ?>
                                                            <?php
                                                            $fieldName = 'firmPanLb';
                                                            $label_field_font_size = '';
                                                            $label_field_font_color = '';
                                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                            ?>
                                                            <td align="center">
                                                                <div class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                    <?php echo $label_field_content; ?> :&nbsp;&nbsp;
                                                                    <?php
                                                                    $fieldName = 'firmPan';
                                                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                                    ?>
                                                                    <span class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $firm_pan_no; ?></span></div>  
                                                            </td>
                                                            <?php
                                                        }
                                                    
                                                    ?>
                                                </table>
                                            </td>
                                         <?php } else {?>
                                            
                                            
                                            <td align="right">
                                                <table border="0" cellpadding="0" width="100%" cellspacing="0" align="right">
                                                   <?php
                        $fieldName = 'userName';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $userNamefontsize = $label_field_font_size;
                        if ($user_fname != NULL && $label_field_check == 'true') {
                            $fieldName = 'userNameLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            
                            <tr>
                                     <td valign="middle" align="center" class="ff_calibri">
                                    <div class="spaceRight5" style="font-size:<?php echo $userNamefontsize; ?>px;">
                                        <?php
                                        if ($user_fname != 'EBILL') {
                                            //
                                            if ($user_lname != '' || $user_father_name != '')
                                                echo '<b>' . om_strtoupper($user_fname . ' ' . $user_lname) . '</b>';
                                            else
                                                echo '<b>' . om_strtoupper($user_fname) . '</b>';
                                        }
                                        ?>
                                    </div>
                                </td> 
                        </tr> <?php }?> 
                             <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'S' || $fLetter == 'F') {
                            $fieldName = 'userSo';

                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_father_name != '' && $label_field_check == 'true') {
                                $fieldName = 'userSoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr >
                                   

                                    <td valign="middle" align="center" class="ff_calibri" style="border:0px solid;font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div   class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>

                                <?php
                            }
                        }
                        ?>
                        <!--END SON OF-->
                        <!--START DAUGHTER OF-->
                        <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'D') {
                            $fieldName = 'userDo';

                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_fname != NULL && $label_field_check == 'true') {
                                $fieldName = 'userDoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    


                                    <td valign="middle" align="center" class="ff_calibri" style="font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div   class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <!--END DAUGHTER OF-->
                        <!--START WIFE OF-->
                        <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'W') {
                            $fieldName = 'userWo';

                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_fname != NULL && $label_field_check == 'true') {
                                $fieldName = 'userWoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    


                                    <td valign="middle" align="center" class="ff_calibri" style="font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <!--END WIFE OF-->
                        <!--START GUARDIAN OF-->
                        <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'C') {
                            $fieldName = 'userCo';
                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_fname != NULL && $label_field_check == 'true') {
                                $fieldName = 'userCoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    


                                    <td valign="middle" align="center" class="ff_calibri" style="font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>
                                <?php
                            }
                        }
                        ?>
                          <?php
                        $fieldName = 'userAddress';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $addresssize = $label_field_font_size;
                        if ($label_field_check == 'true') {
                            $fieldName = 'userAddressLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr>
                                
                               

                               <td valign="middle" align="center" class="ff_calibri" style="border:0px solid;">


                                    <?php if ($user_add != '') { ?>                    
                                        <div title="<?php echo om_strtoupper($user_add); ?>" style="border:0px solid;width:250px;">
                                            <?php
                                            $fieldName = 'userAddress';
                                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            ?> 
                                            <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                <?php echo om_strtoupper($user_add); ?>
                                           
                                       

                                    <?php } if ($user_city != '' || $user_pincode != '') { ?>
                                        
                                                <?php echo om_strtoupper($user_city . ', ' . $user_pincode); ?>

                                            <?php } if ($user_state != '' || $user_country != '') { ?>
                                                <?php echo om_strtoupper($user_state . ', ' . $user_country); ?></span>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>




                                </td>
                            </tr>
                        <?php } ?>      
                           <?php
                        $fieldName = 'userContact';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $usercontact = $label_field_font_size;
                        if ($user_mobile != NULL && $label_field_check == 'true') {
                            $fieldName = 'userContactLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                               

                               <td valign="middle" align="center"  class="ff_calibri" style="font-size:<?php echo $usercontact; ?>px;">
                                   <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?> :</span> <span><?php echo $user_mobile; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                            
                             <?php
                        $fieldName = 'userPan';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($user_pan_it_no != '' && $label_field_check == 'true') {
                            $fieldName = 'userPanLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                               <td valign="middle" align="center"  class="ff_calibri">
                                    <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?> :</span>
                                        <span><?php echo $user_pan_it_no; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                            
                            <?php
                        $fieldName = 'userGstIn';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($user_cst_no != '' && $label_field_check == 'true') {
                            $fieldName = 'userGstInLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                               <td valign="middle" align="center"  class="ff_calibri">
                                    <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?>:</span>
                                        <span><?php echo $user_cst_no; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                             <?php
                        $fieldName = 'userAdhaar';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($user_adhaar_card != '' && $label_field_check == 'true') {
                            $fieldName = 'userAdhaarLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                                

                               <td valign="middle" align="center"  class="ff_calibri">
                                   <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?>:</span>
                                       <span><?php echo $user_adhaar_card; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                            
                                                </table>
                                            </td>
                                            
                                            
                                         <?php }?>
                                            <!--END FIRM DETAILS-->
                                            <!--START RIGHT LOGO-->
                                             <?php if($sttr_transaction_type!='PURCHASE'){?>
                                            <td align="left" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top">
                                                    <tr valign="top">
                                                        <?php
                                                        $fieldName = 'firmRightLogoCheck';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if (($firm_right_thumb_ftype != NULL || $firm_right_thumb_ftype != '') && $label_field_check == 'true') {
                                                            ?>
                                                            <td align="left" valign="top">
                                                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omffgfri.php?firm_id=<?php echo $firm_id; ?>" 
                                                                     alt="" class="<?php echo $imageClass; ?>" />
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                </table>
                                            </td>
                                             <?php } else {?>
                                             
                                            <td align="left" valign="top">
                                                <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top">
                                                    <tr valign="top">
                                                        <?php
                                                        $fieldName = 'firmRightLogoCheck';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ( $label_field_check == 'true') {
                                                            ?>
                                                            <td align="left" valign="top">
                                                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omccguim.php?user_id=<?php echo $userId; ?>" 
                                                                     alt="" class="<?php echo $imageClass; ?>" />
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                </table>
                                            </td>
                                            
                                             <?php }?>
                                            <!--END RIGHT LOGO-->
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        <?php } ?>
                        <!--END DEFAULT INVOICE LAYOUT-->

                        <!--START RIGHT INVOICE LAYOUT-->
                        <?php if ($custInvLay == 'InvLayRight' || $custInvLay == 'InvLayWoGst') { ?>
                            <tr>
                                <!--START FIRM DETAILS-->
                                <?php
                                if($sttr_transaction_type!='PURCHASE'){?>
                                <td align="left">
                                    <table border="0" cellpadding="0" width="100%" cellspacing="0" align="left">
                                        <?php
                                        $fieldName = 'firmFormHeader';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_form_header != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <td valign="middle" align="left" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"  onClick="this.contentEditable = 'true';">
                                                    <?php echo ($firm_form_header); ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        $fieldName = 'firmLongName';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_long_name != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <td valign="middle" align="left" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php echo"<b>" . ($firm_long_name) . "</b>"; ?>
                                                </td>
                                            </tr>

                                            <?php
                                        } $fieldName = 'firmDesc';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_desc != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <td valign="middle" align="left"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php echo ($firm_desc); ?>
                                                </td>
                                            </tr>
                                            <?php
                                        } $fieldName = 'firmRegNo';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ( $firm_reg_no != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <?php
                                                $fieldName = 'firmRegNoLabel';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td valign="middle" align="left"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?>:
                                                    <?php
                                                    $fieldName = 'firmRegNo';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" ><?php echo ($firm_reg_no); ?></span>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        // 123
                                        $fieldName = 'firmAddress';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_address != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <td valign="middle" align="left"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php echo ($firm_address); ?>
                                                </td>
                                            </tr>
                                        <?php } if ((($firm_phone_details != NULL) || $firm_email != NULL)) { ?>
                                            <tr>
                                                <td colspan="2">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left">
                                                        <tr>
                                                        <?php
                                                        $fieldName = 'firmPhone';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($firm_phone_details != NULL && $label_field_check == 'true') {
                                                            ?>
                                                           
                                                                <td valign="middle" align="left"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                    <?php echo $label_field_content; ?> : <?php echo $firm_phone_details; ?>
                                                                </td>
                                                           
                                                            <?php
                                                        } $fieldName = 'firmEmail';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        if ($firm_email != NULL && $label_field_check == 'true') {
                                                            ?>
                                                            
                                                                <td valign="middle" align="left"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?> " style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                                    <?php echo $label_field_content; ?> : <?php echo $firm_email; ?>
                                                                </td>
                                                           
                                                        <?php } ?>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ( (($firm_tin_no != '') || $firm_pan_no != '')) { ?>
                                            <?php
                                            // 123
                                            $fieldName = 'firmTin';
                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($firm_tin_no != NULL && $label_field_check == 'true') {
                                                ?>
                                                <tr> 
                                                    <?php
                                                    $fieldName = 'firmTinLb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td valign="middle" align="left"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                        <?php echo $label_field_content; ?> :
                                                        <?php
                                                        $fieldName = 'firmTin';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" ><?php echo ($firm_tin_no); ?></span>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <?php
                                            $fieldName = 'firmPan';
                                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($firm_pan_no != '' && $label_field_check == 'true') {
                                                ?>
                                                <?php
                                                $fieldName = 'firmPanLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td align="left">
                                                    <div class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?> :&nbsp;&nbsp;
                                                        <?php
                                                        $fieldName = 'firmPan';
                                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $firm_pan_no; ?></span></div>  
                                                </td>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </table>
                                </td>
                                <?php } else {?>
                                
                                
                                <td align="left">
                                                <table border="0" cellpadding="0" width="100%" cellspacing="0" align="right">
                                                   <?php
                        $fieldName = 'userName';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $userNamefontsize = $label_field_font_size;
                        if ($user_fname != NULL && $label_field_check == 'true') {
                            $fieldName = 'userNameLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            
                            <tr>
                                     <td valign="middle" align="left" class="ff_calibri">
                                    <div class="spaceRight5" style="font-size:<?php echo $userNamefontsize; ?>px;">
                                        <?php
                                        if ($user_fname != 'EBILL') {
                                            //
                                            if ($user_lname != '' || $user_father_name != '')
                                                echo '<b>' . om_strtoupper($user_fname . ' ' . $user_lname) . '</b>';
                                            else
                                                echo '<b>' . om_strtoupper($user_fname) . '</b>';
                                        }
                                        ?>
                                    </div>
                                </td> 
                        </tr> <?php }?> 
                             <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'S' || $fLetter == 'F') {
                            $fieldName = 'userSo';

                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_father_name != '' && $label_field_check == 'true') {
                                $fieldName = 'userSoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr >
                                   

                                    <td valign="middle" align="left" class="ff_calibri" style="border:0px solid;font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div   class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>

                                <?php
                            }
                        }
                        ?>
                        <!--END SON OF-->
                        <!--START DAUGHTER OF-->
                        <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'D') {
                            $fieldName = 'userDo';

                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_fname != NULL && $label_field_check == 'true') {
                                $fieldName = 'userDoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    


                                    <td valign="middle" align="left" class="ff_calibri" style="font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div   class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <!--END DAUGHTER OF-->
                        <!--START WIFE OF-->
                        <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'W') {
                            $fieldName = 'userWo';

                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_fname != NULL && $label_field_check == 'true') {
                                $fieldName = 'userWoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    


                                    <td valign="middle" align="left" class="ff_calibri" style="font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <!--END WIFE OF-->
                        <!--START GUARDIAN OF-->
                        <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'C') {
                            $fieldName = 'userCo';
                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_fname != NULL && $label_field_check == 'true') {
                                $fieldName = 'userCoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    


                                    <td valign="middle" align="left" class="ff_calibri" style="font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>
                                <?php
                            }
                        }
                        ?>
                          <?php
                        $fieldName = 'userAddress';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $addresssize = $label_field_font_size;
                        if ($label_field_check == 'true') {
                            $fieldName = 'userAddressLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr>
                                
                               

                               <td valign="middle" align="left" class="ff_calibri" style="border:0px solid;">


                                    <?php if ($user_add != '') { ?>                    
                                        <div title="<?php echo om_strtoupper($user_add); ?>" style="border:0px solid;width:250px;">
                                            <?php
                                            $fieldName = 'userAddress';
                                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            ?> 
                                            <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                <?php echo om_strtoupper($user_add); ?>
                                           
                                       

                                    <?php } if ($user_city != '' || $user_pincode != '') { ?>
                                        
                                                <?php echo om_strtoupper($user_city . ', ' . $user_pincode); ?>

                                            <?php } if ($user_state != '' || $user_country != '') { ?>
                                                <?php echo om_strtoupper($user_state . ', ' . $user_country); ?></span>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>




                                </td>
                            </tr>
                        <?php } ?>      
                           <?php
                        $fieldName = 'userContact';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $usercontact = $label_field_font_size;
                        if ($user_mobile != NULL && $label_field_check == 'true') {
                            $fieldName = 'userContactLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                               

                               <td valign="middle" align="left"  class="ff_calibri" style="font-size:<?php echo $usercontact; ?>px;">
                                   <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?> :</span> <span><?php echo $user_mobile; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                            
                             <?php
                        $fieldName = 'userPan';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($user_pan_it_no != '' && $label_field_check == 'true') {
                            $fieldName = 'userPanLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                               <td valign="middle" align="left"  class="ff_calibri">
                                    <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?> :</span>
                                        <span><?php echo $user_pan_it_no; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                            
                            <?php
                        $fieldName = 'userGstIn';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($user_cst_no != '' && $label_field_check == 'true') {
                            $fieldName = 'userGstInLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                               <td valign="middle" align="left"  class="ff_calibri">
                                    <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?>:</span>
                                        <span><?php echo $user_cst_no; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                             <?php
                        $fieldName = 'userAdhaar';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($user_adhaar_card != '' && $label_field_check == 'true') {
                            $fieldName = 'userAdhaarLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                                

                               <td valign="middle" align="left"  class="ff_calibri">
                                   <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?>:</span>
                                       <span><?php echo $user_adhaar_card; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                            
                                                    
                                                </table>
                                            </td>
                                
                                
                                <?php }?>
                                <!--END FIRM DETAILS-->
                                <!--START INVOICE DETAILS-->
                                
                                <!--END INVOICE DETAILS-->
                                <!--START DATE & LOGO DETAILS-->
                                 <?php if($sttr_transaction_type!='PURCHASE'){?>
                                <td align="left" >
                                    <table border="0" cellpadding="0" cellspacing="0" align="left" >
                                        <tr valign="top">
                                            
                                        <?php
                                        $fieldName = 'firmRightLogoCheck';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if (($firm_right_thumb_ftype != NULL || $firm_right_thumb_ftype != '') && $label_field_check == 'true') {
                                            ?>
                                            <td align="right" >
                                                <img style="height:100px;width:100px;" src="<?php echo $documentRootBSlash; ?>/include/php/omffgfri.php?firm_id=<?php echo $firm_id; ?>" 
                                                     alt="" class="<?php echo $imageClass; ?>" />
                                            </td>
                                        <?php } ?>
                            </tr>
                        </table>
                    </td>
                                 <?php } else {
                                   ?><td align="left" >
                                    <table border="0" cellpadding="0" cellspacing="0" align="left" >
                                        <tr valign="top">
                                            
                                        <?php
                                        $fieldName = 'firmRightLogoCheck';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ( $label_field_check == 'true') {
                                            ?>
                                            <td align="right" >
                                                <img style="height:100px;width:100px;" src="<?php echo $documentRootBSlash; ?>/include/php/omccguim.php?user_id=<?php echo $userId; ?>"  
                                                     alt="" class="<?php echo $imageClass; ?>" />
                                            </td>
                                        <?php } ?>
                            </tr>
                        </table>
                    </td>  
                               <?php  }
                        ?>
                    <!--END DATE & LOGO DETAILS-->
                </tr>
            <?php } ?>
            <!--END RIGHT INVOICE LAYOUT-->


            <!--START LEFT INVOICE LAYOUT-->
            <?php if ($custInvLay == 'InvLayLeft') { ?>
                <tr>
                    <!--START DATE & LOGO DETAILS-->
                    <?php if($sttr_transaction_type!='PURCHASE'){?>
                    <td align="left">
                        <table border="0" cellpadding="0" cellspacing="0" align="left"  style="margin-left:20px;">
                            <tr >
                               <?php
                            $fieldName = 'firmRightLogoCheck';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if (($firm_right_thumb_ftype != NULL || $firm_right_thumb_ftype != '') && $label_field_check == 'true') {
                                ?>
                                <td align="right" >
                                    <img style="height:100px;width:100px;" src="<?php echo $documentRootBSlash; ?>/include/php/omffgfri.php?firm_id=<?php echo $firm_id; ?>" 
                                         alt="" class="<?php echo $imageClass; ?>" />
                                </td>
                            <?php } ?>
                </tr>
            </table>
            </td>
                    <?php } else {?>
                      <td align="left">
                        <table border="0" cellpadding="0" cellspacing="0" align="left"  style="margin-left:20px;">
                            <tr >
                               <?php
                            $fieldName = 'firmRightLogoCheck';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if (($firm_right_thumb_ftype != NULL || $firm_right_thumb_ftype != '') && $label_field_check == 'true') {
                                ?>
                                <td align="right" >
                                    <img style="height:100px;width:100px;" src="<?php echo $documentRootBSlash; ?>/include/php/omccguim.php?user_id=<?php echo $userId; ?>" 
                                         alt="" class="<?php echo $imageClass; ?>" />
                                </td>
                            <?php } ?>
                </tr>
            </table>
            </td>
                 
                    <?php }?>
            <!--END DATE & LOGO DETAILS-->

            <!--START INVOICE DETAILS-->
           
            <!--END INVOICE DETAILS-->
            <!--START FIRM DETAILS-->
            <?php
             if($sttr_transaction_type!='PURCHASE'){?>
            <td align="left">
                <table border="0" cellpadding="0" width="100%" cellspacing="0" align="left">
                    <?php
                    $fieldName = 'firmFormHeader';
                    $label_field_font_size = '';
                    $label_field_font_color = '';
                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($firm_form_header != NULL && $label_field_check == 'true') {
                        ?>
                        <tr> 
                            <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"  onClick="this.contentEditable = 'true';">
                                <?php echo ($firm_form_header); ?>
                            </td>
                        </tr>
                        <?php
                    }
                    $fieldName = 'firmLongName';
                    $label_field_font_size = '';
                    $label_field_font_color = '';
                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($firm_long_name != NULL && $label_field_check == 'true') {
                        ?>
                        <tr> 
                            <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                <?php echo ($firm_long_name); ?>
                            </td>
                        </tr>

                        <?php
                    } $fieldName = 'firmDesc';
                    $label_field_font_size = '';
                    $label_field_font_color = '';
                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($firm_desc != NULL && $label_field_check == 'true') {
                        ?>
                        <tr> 
                            <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                <?php echo ($firm_desc); ?>
                            </td>
                        </tr>
                        <?php
                    } $fieldName = 'firmRegNo';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ( $firm_reg_no != NULL && $label_field_check == 'true') {
                        ?>
                        <tr> 
                            <?php
                            $fieldName = 'firmRegNoLabel';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?>:
                                <?php
                                $fieldName = 'firmRegNo';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" ><?php echo ($firm_reg_no); ?></span>
                            </td>
                        </tr>
                        <?php
                    }
                    // 123
                    $fieldName = 'firmAddress';
                    $label_field_font_size = '';
                    $label_field_font_color = '';
                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($firm_address != NULL && $label_field_check == 'true') {
                        ?>
                        <tr> 
                            <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                <?php echo ($firm_address); ?>
                            </td>
                        </tr>
                    <?php } if ((($firm_phone_details != NULL) || $firm_email != NULL)) { ?>
                        <tr>
                            <td colspan="2">
                                <table border="0" cellpadding="0" cellspacing="4" align="center">
                                     <tr>
                                    <?php
                                    $fieldName = 'firmPhone';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($firm_phone_details != NULL && $label_field_check == 'true') {
                                        ?>
                                       
                                            <td valign="middle" align="left"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                <?php echo $label_field_content; ?> : <?php echo $firm_phone_details; ?>
                                            </td>
                                            
                                          
                                       
                                        <?php
                                    } $fieldName = 'firmEmail';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    if ($firm_email != NULL && $label_field_check == 'true') {
                                        ?>
                                        
                                            <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?> " style="margin-left:5px;font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                <?php echo"  ". $label_field_content; ?> : <?php echo $firm_email; ?>
                                            </td>
                                       
                                    <?php } ?>
                                     </tr>
                                </table>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php if ( (($firm_tin_no != '') || $firm_pan_no != '')) { ?>
                        <?php
                        // 123
                        $fieldName = 'firmTin';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ( $firm_tin_no != NULL && $label_field_check == 'true') {
                            ?>
                            <tr> 
                                <?php
                                $fieldName = 'firmTinLb';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                    <?php echo $label_field_content; ?> :
                                    <?php
                                    $fieldName = 'firmTin';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" ><?php echo ($firm_tin_no); ?></span>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php
                        $fieldName = 'firmPan';
                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($firm_pan_no != '' && $label_field_check == 'true') {
                            ?>
                            <?php
                            $fieldName = 'firmPanLb';
                            $label_field_font_size = '';
                            $label_field_font_color = '';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <td align="center">
                                <div class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                    <?php echo 'PAN '; ?> :&nbsp;&nbsp;
                                    <?php
                                    $fieldName = 'firmPan';
                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $firm_pan_no; ?></span></div>  
                            </td>
                            <?php
                        }
                    }
                    ?>
                </table>
            </td>
             <?php } else {?>
            <td align="left">
                                                <table border="0" cellpadding="0" width="100%" cellspacing="0" align="right">
                                                   <?php
                        $fieldName = 'userName';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $userNamefontsize = $label_field_font_size;
                        if ($user_fname != NULL && $label_field_check == 'true') {
                            $fieldName = 'userNameLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            
                            <tr>
                                     <td valign="middle" align="center" class="ff_calibri">
                                    <div class="spaceRight5" style="font-size:<?php echo $userNamefontsize; ?>px;">
                                        <?php
                                        if ($user_fname != 'EBILL') {
                                            //
                                            if ($user_lname != '' || $user_father_name != '')
                                                echo '<b>' . om_strtoupper($user_fname . ' ' . $user_lname) . '</b>';
                                            else
                                                echo '<b>' . om_strtoupper($user_fname) . '</b>';
                                        }
                                        ?>
                                    </div>
                                </td> 
                        </tr> <?php }?> 
                             <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'S' || $fLetter == 'F') {
                            $fieldName = 'userSo';

                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_father_name != '' && $label_field_check == 'true') {
                                $fieldName = 'userSoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr >
                                   

                                    <td valign="middle" align="center" class="ff_calibri" style="border:0px solid;font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div   class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>

                                <?php
                            }
                        }
                        ?>
                        <!--END SON OF-->
                        <!--START DAUGHTER OF-->
                        <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'D') {
                            $fieldName = 'userDo';

                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_fname != NULL && $label_field_check == 'true') {
                                $fieldName = 'userDoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    


                                    <td valign="middle" align="center" class="ff_calibri" style="font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div   class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <!--END DAUGHTER OF-->
                        <!--START WIFE OF-->
                        <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'W') {
                            $fieldName = 'userWo';

                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_fname != NULL && $label_field_check == 'true') {
                                $fieldName = 'userWoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    


                                    <td valign="middle" align="center" class="ff_calibri" style="font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <!--END WIFE OF-->
                        <!--START GUARDIAN OF-->
                        <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'C') {
                            $fieldName = 'userCo';
                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_fname != NULL && $label_field_check == 'true') {
                                $fieldName = 'userCoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    


                                    <td valign="middle" align="center" class="ff_calibri" style="font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>
                                <?php
                            }
                        }
                        ?>
                          <?php
                        $fieldName = 'userAddress';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $addresssize = $label_field_font_size;
                        if ($label_field_check == 'true') {
                            $fieldName = 'userAddressLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr>
                                
                               

                               <td valign="middle" align="center" class="ff_calibri" style="border:0px solid;">


                                    <?php if ($user_add != '') { ?>                    
                                        <div title="<?php echo om_strtoupper($user_add); ?>" style="border:0px solid;width:250px;">
                                            <?php
                                            $fieldName = 'userAddress';
                                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            ?> 
                                            <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                <?php echo om_strtoupper($user_add); ?>
                                           
                                       

                                    <?php } if ($user_city != '' || $user_pincode != '') { ?>
                                        
                                                <?php echo om_strtoupper($user_city . ', ' . $user_pincode); ?>

                                            <?php } if ($user_state != '' || $user_country != '') { ?>
                                                <?php echo om_strtoupper($user_state . ', ' . $user_country); ?></span>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>




                                </td>
                            </tr>
                        <?php } ?>      
                           <?php
                        $fieldName = 'userContact';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $usercontact = $label_field_font_size;
                        if ($user_mobile != NULL && $label_field_check == 'true') {
                            $fieldName = 'userContactLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                               

                               <td valign="middle" align="center"  class="ff_calibri" style="font-size:<?php echo $usercontact; ?>px;">
                                   <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?> :</span> <span><?php echo $user_mobile; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                            
                             <?php
                        $fieldName = 'userPan';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($user_pan_it_no != '' && $label_field_check == 'true') {
                            $fieldName = 'userPanLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                               <td valign="middle" align="center"  class="ff_calibri">
                                    <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?> :</span>
                                        <span><?php echo $user_pan_it_no; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                            
                            <?php
                        $fieldName = 'userGstIn';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($user_cst_no != '' && $label_field_check == 'true') {
                            $fieldName = 'userGstInLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                               <td valign="middle" align="center"  class="ff_calibri">
                                    <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?>:</span>
                                        <span><?php echo $user_cst_no; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                             <?php
                        $fieldName = 'userAdhaar';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($user_adhaar_card != '' && $label_field_check == 'true') {
                            $fieldName = 'userAdhaarLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                                

                               <td valign="middle" align="center"  class="ff_calibri">
                                   <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?>:</span>
                                       <span><?php echo $user_adhaar_card; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                            
                                                </table>
                                            </td>
                                            
             <?php }?>
            </tr>
        <?php } ?>
            <!--END FIRM DETAILS-->
        <!--END LFET INVOICE LAYOUT-->

        <!--START CENTER INVOICE LAYOUT-->
        <?php if ($custInvLay == 'InvLayCenter') { ?>
            <tr>
                <!--START FIRM DETAILS-->
                 <?php 
                 if($sttr_transaction_type!='PURCHASE'){?>
                <td align="center">
                    <table border="0" cellpadding="0" width="100%" cellspacing="0" align="center">
                        <?php
                          if($sttr_transaction_type!='PURCHASE'){
                        $fieldName = 'firmRightLogoCheck';
                        $label_field_font_size = '';
                        $label_field_font_color = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if (($firm_right_thumb_ftype != NULL || $firm_right_thumb_ftype != '') && $label_field_check == 'true') {
                            ?>
                            <td align="center" valign="top">
                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omffgfri.php?firm_id=<?php echo $firm_id; ?>" 
                                     alt="" class="<?php echo $imageClass; ?>" />
                            </td>
                          <?php } } else {
                            $fieldName = 'firmRightLogoCheck';
                        $label_field_font_size = '';
                        $label_field_font_color = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ( $label_field_check == 'true') {
                            ?>
                            <td align="center" valign="top">
                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omffgfri.php?omccguim.php?user_id=<?php echo $userId; ?>" 
                                     alt="" class="<?php echo $imageClass; ?>" />
                            </td>
                          <?php } }?>
                         
                        <?php
                        $fieldName = 'firmFormHeader';
                        $label_field_font_size = '';
                        $label_field_font_color = '';
                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($firm_form_header != NULL && $label_field_check == 'true') {
                            ?>
                            <tr> 
                                <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"  onClick="this.contentEditable = 'true';">
                                    <?php echo ($firm_form_header); ?>
                                </td>
                            </tr>

                            <?php
                        }
                        $fieldName = 'firmLongName';
                        $label_field_font_size = '';
                        $label_field_font_color = '';
                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($firm_long_name != NULL && $label_field_check == 'true') {
                            ?>
                            <tr> 
                                <td valign="middle" align="center" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                    <?php echo ($firm_long_name); ?>
                                </td>
                            </tr>

                            <?php
                        } $fieldName = 'firmDesc';
                        $label_field_font_size = '';
                        $label_field_font_color = '';
                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($firm_desc != NULL && $label_field_check == 'true') {
                            ?>
                            <tr> 
                                <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                    <?php echo($firm_desc); ?>
                                </td>
                            </tr>
                            <?php
                        } $fieldName = 'firmRegNo';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ( $firm_reg_no != NULL && $label_field_check == 'true') {
                            ?>
                            <tr> 
                                <?php
                                $fieldName = 'firmRegNoLabel';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo "Firm Reg.No"; ?>:
                                    <?php
                                    $fieldName = 'firmRegNo';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <span class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" ><?php echo ($firm_reg_no); ?></span>
                                </td>
                            </tr>
                            <?php
                        }

                        $fieldName = 'firmAddress';
                        $label_field_font_size = '';
                        $label_field_font_color = '';
                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($firm_address != NULL && $label_field_check == 'true') {
                            ?>
                            <tr> 
                                <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                    <?php echo ($firm_address); ?>
                                </td>
                            </tr>
                        <?php } if ((($firm_phone_details != NULL) || $firm_email != NULL)) { ?>
                            <tr>
                                <td colspan="2">
                                    <table border="0" cellpadding="0" cellspacing="0" align="center">
                                        <?php
                                        $fieldName = 'firmPhone';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_phone_details != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr>
                                                <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php echo $label_field_content; ?> : <?php echo $firm_phone_details; ?>
                                                </td>
                                            </tr>
                                            <?php
                                        } $fieldName = 'firmEmail';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_email != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr>
                                                <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?> " style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php echo $label_field_content; ?> : <?php echo $firm_email; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </td>
                            </tr>
                        <?php } if ( (($firm_tin_no != '') || $firm_pan_no != '')) {
                            ?>
                            <?php
                            // 123
                            $fieldName = 'firmTin';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ( $firm_tin_no != NULL && $label_field_check == 'true') {
                                ?>
                                <tr> 
                                    <?php
                                    $fieldName = 'firmTinLb';
                                    $label_field_font_size = '';
                                    $label_field_font_color = '';
                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                    ?>
                                    <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?> :
                                        <?php
                                        $fieldName = 'firmTin';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <span class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" ><?php echo ($firm_tin_no); ?></span>
                                    </td>
                                </tr>
                            <?php } ?>

                            <?php
                            $fieldName = 'firmPan';
                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            if ($firm_pan_no != '' && $label_field_check == 'true') {
                                ?>
                                <?php
                                $fieldName = 'firmPanLb';
                                $label_field_font_size = '';
                                $label_field_font_color = '';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <td align="center">
                                    <div class="ff_calibri  font_color_black" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?> :&nbsp;&nbsp;
                                        <?php
                                        $fieldName = 'firmPan';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        ?>
                                        <span class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $firm_pan_no; ?></span></div>  
                                </td>
                            <?php } ?>
                        <?php } ?>

                    </table>
                </td>
                 <?php } else {
                   ?>
                      <td align="center">
                    <table border="0" cellpadding="0" width="100%" cellspacing="0" align="center">
                        <?php
                        $fieldName = 'firmRightLogoCheck';
                        $label_field_font_size = '';
                        $label_field_font_color = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if (($firm_right_thumb_ftype != NULL || $firm_right_thumb_ftype != '') && $label_field_check == 'true') {
                            ?>
                            <td align="center" valign="top">
                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omffgfri.php?firm_id=<?php echo $firm_id; ?>" 
                                     alt="" class="<?php echo $imageClass; ?>" />
                            </td>
                        <?php } ?>
                        <?php
                        $fieldName = 'userName';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $userNamefontsize = $label_field_font_size;
                        if ($user_fname != NULL && $label_field_check == 'true') {
                            $fieldName = 'userNameLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            
                            <tr>
                                     <td valign="middle" align="center" class="ff_calibri">
                                    <div class="spaceRight5" style="font-size:<?php echo $userNamefontsize; ?>px;">
                                        <?php
                                        if ($user_fname != 'EBILL') {
                                            //
                                            if ($user_lname != '' || $user_father_name != '')
                                                echo '<b>' . om_strtoupper($user_fname . ' ' . $user_lname) . '</b>';
                                            else
                                                echo '<b>' . om_strtoupper($user_fname) . '</b>';
                                        }
                                        ?>
                                    </div>
                                </td> 
                        </tr> <?php }?> 
                             <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'S' || $fLetter == 'F') {
                            $fieldName = 'userSo';

                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_father_name != '' && $label_field_check == 'true') {
                                $fieldName = 'userSoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr >
                                   

                                    <td valign="middle" align="center" class="ff_calibri" style="border:0px solid;font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div   class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>

                                <?php
                            }
                        }
                        ?>
                        <!--END SON OF-->
                        <!--START DAUGHTER OF-->
                        <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'D') {
                            $fieldName = 'userDo';

                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_fname != NULL && $label_field_check == 'true') {
                                $fieldName = 'userDoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    


                                    <td valign="middle" align="center" class="ff_calibri" style="font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div   class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <!--END DAUGHTER OF-->
                        <!--START WIFE OF-->
                        <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'W') {
                            $fieldName = 'userWo';

                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_fname != NULL && $label_field_check == 'true') {
                                $fieldName = 'userWoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    


                                    <td valign="middle" align="center" class="ff_calibri" style="font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        <!--END WIFE OF-->
                        <!--START GUARDIAN OF-->
                        <?php
                        $fLetter = $user_father_name[0];
                        if ($fLetter == 'C') {
                            $fieldName = 'userCo';
                            parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            $fatherNamefontsize = $label_field_font_size;
                            if ($user_fname != NULL && $label_field_check == 'true') {
                                $fieldName = 'userCoLb';
                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                ?>
                                <tr>
                                    


                                    <td valign="middle" align="center" class="ff_calibri" style="font-size:<?php echo $fatherNamefontsize; ?>px;">
                                        <div class="spaceRight5"><?php echo om_strtoupper(substr($user_father_name, 1)); ?>
                                        </div>
                                    </td> 
                                </tr>
                                <?php
                            }
                        }
                        ?>
                          <?php
                        $fieldName = 'userAddress';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $addresssize = $label_field_font_size;
                        if ($label_field_check == 'true') {
                            $fieldName = 'userAddressLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>
                            <tr>
                                
                               

                               <td valign="middle" align="center" class="ff_calibri" style="border:0px solid;">


                                    <?php if ($user_add != '') { ?>                    
                                        <div title="<?php echo om_strtoupper($user_add); ?>" style="border:0px solid;width:250px;">
                                            <?php
                                            $fieldName = 'userAddress';
                                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            ?> 
                                            <div class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                <?php echo om_strtoupper($user_add); ?>
                                           
                                       

                                    <?php } if ($user_city != '' || $user_pincode != '') { ?>
                                        
                                                <?php echo om_strtoupper($user_city . ', ' . $user_pincode); ?>

                                            <?php } if ($user_state != '' || $user_country != '') { ?>
                                                <?php echo om_strtoupper($user_state . ', ' . $user_country); ?></span>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>




                                </td>
                            </tr>
                        <?php } ?>      
                           <?php
                        $fieldName = 'userContact';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        $usercontact = $label_field_font_size;
                        if ($user_mobile != NULL && $label_field_check == 'true') {
                            $fieldName = 'userContactLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                               

                               <td valign="middle" align="center"  class="ff_calibri" style="font-size:<?php echo $usercontact; ?>px;">
                                   <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?> :</span> <span><?php echo $user_mobile; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                            
                             <?php
                        $fieldName = 'userPan';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($user_pan_it_no != '' && $label_field_check == 'true') {
                            $fieldName = 'userPanLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                               <td valign="middle" align="center"  class="ff_calibri">
                                    <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?> :</span>
                                        <span><?php echo $user_pan_it_no; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                            
                            <?php
                        $fieldName = 'userGstIn';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($user_cst_no != '' && $label_field_check == 'true') {
                            $fieldName = 'userGstInLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                               <td valign="middle" align="center"  class="ff_calibri">
                                    <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?>:</span>
                                        <span><?php echo $user_cst_no; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                             <?php
                        $fieldName = 'userAdhaar';
                        parse_str(getTableValues("SELECT label_field_check,label_field_font_size FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($user_adhaar_card != '' && $label_field_check == 'true') {
                            $fieldName = 'userAdhaarLb';
                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                            ?>

                            <tr>
                                

                               <td valign="middle" align="center"  class="ff_calibri">
                                   <div class="spaceRight5"><span class="itemAddPnLabels12Arial font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?>:</span>
                                       <span><?php echo $user_adhaar_card; ?></span>
                                    </div>
                                </td> 
                            </tr>
                        <?php } ?>
                            
                                                </table>
                                            </td>
                 } ?>
                <!--END FIRM DETAILS-->
            </tr>
        <?php }  }?>
        <!--END CENTER INVOICE LAYOUT-->

    </table>
</td>
</tr>
<?php /* header end */ ?>
