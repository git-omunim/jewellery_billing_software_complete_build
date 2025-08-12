<?php
/*
 * **************************************************************************************
 * @tutorial: Purchase new Scheme Invoice @AUTHOR: MADHUREE-13SEP2019
 * **************************************************************************************
 * 
 * Created on SEP 13,2019
 *
 * @FileName: omSchemePrInv.php
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
 *  AUTHOR: Bajrang
 *  REASON:
 *
 */
?>
<?php
$currentFileName = basename(__FILE__);
include 'system/omsachsc.php';
require_once 'system/omsgeagb.php';
require_once 'system/omssopin.php';
include_once 'ommpnmwd.php';
include_once 'ommpfndv.php';
require_once 'ommpincr.php';
include_once 'conversions.php';
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Online Munim &mdash; Girvi Software, Jewellery Software, Jewellery &amp; Money Lending Accounting Software...</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="imagetoolbar" content="no" />
        
<style type="text/css">
    table.blueTable {
        border: 1px solid #DCDCDC;
        background-color: #FFFFFF;

        text-align: left;
        border-collapse: collapse;
    }
    table.blueTable1 {
        border-right: 1px solid #DCDCDC;
        background-color: #FFFFFF;
        border-bottom: 1px solid #DCDCDC;
        text-align: left;
        border-collapse: collapse;
    }
    table.blueTable2 {
        border: 1px solid #DCDCDC;
        background-color: #FFFFFF;

        text-align: left;
        border-collapse: collapse;
    }
    table.blueTable td, table.blueTable th {
        border: 1px solid #DCDCDC;
    }
    table.blueTable1 td, table.blueTable th {
    }
    table.blueTable2 td {
        font-size: 14px;
        border: 1px solid #DCDCDC;
    }
    table.blueTable tbody td {
        font-size: 15px;
    }
    table.blueTable tfoot {
        font-size: 14px;
        font-weight: bold;
        color: #FFFFFF;
        background: #D0E4F5;
        background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
        border-top: 2px solid #DCDCDC;
    }
    table.blueTable tfoot td {
        font-size: 14px;
    }
    table.blueTable tfoot .links {
        text-align: right;
    }
    table.blueTable tfoot .links a{
        display: inline-block;
        background: #1C6EA4;
        color: #FFFFFF;
        padding: 2px 8px;
        border-radius: 5px;
    }
</style>
</head>
<body>
<?php
ob_start();
$whatsappStatus = $_GET['whatsappStatus'];
//Start Code to get Cust and Firm Details 
//Start Code To Select FirmId
if ($_SESSION['setFirmSession'] != '') {
    $strFrmId = $_SESSION['setFirmSession'];
} else {
    $strFrmId = getFirmByPass($globalOwnPass, $globalOwnIPass);
}
$kittyCustId = $_GET['kittyCustId'];
$kittyNo = $_GET['kittyNo'];
$kittyId = $_GET['kittyId'];
$kittyTokenNum = $_GET['kittyTokenNum'];
$kittyDepId = $_GET['kittyDepId'];
$kittyNoOfEmi = $_GET['kittyNoOfEmi'];
$kittyFirmId = $_GET['kittyFirmId'];
$kittyPreSerialNum = $_GET['kittyPreSerialNum'];
$kittySerialNum = $_GET['kittySerialNum'];
$kittyMainAmount = $_GET['kittyMainAmount'];
$kRateAmt = $_GET['kRateAmt'];
$kWtAmt = $_GET['kWtAmt'];
$kittyStartDate = $_GET['kittyStartDate'];
$dueDate = $_GET['dueDate'];
$emiPaidDate = $_GET['emiPaidDate'];
$kittyEMIStatus = $_GET['kittyEMIStatus'];
$kittyAmtLeft = $_GET['kittyAmtLeft'];
$kittyMetalType = $_GET['kittyMetalType'];

//
$selNepaliDateIndicator = "SELECT omly_value FROM omlayout WHERE omly_option = 'nepaliDateIndicator'";
$resNepaliDateIndicator = mysqli_query($conn, $selNepaliDateIndicator);
$rowNepaliDateIndicator = mysqli_fetch_array($resNepaliDateIndicator);
$nepaliDateIndicator = $rowNepaliDateIndicator['omly_value'];
//
parse_str(getTableValues("SELECT * FROM user where user_owner_id='$sessionOwnerId' and user_id='$kittyCustId'"));
$fatherOrSpouseName = om_ucfirst(substr($user_father_name, 1));

parse_str(getTableValues("SELECT * FROM firm where firm_own_id='$sessionOwnerId' and firm_id='$kittyFirmId'"));

if ($invoicePanel == 'sellInvLay3Inch') {
    $divIdClass = 'sell_Inv_3Inch';
    $tableClass = 'sell_Inv_table';
    $imageClass = 'form7-logo-image';
    $colspan = '7';
    $itemIdWidth = '38px';
    $itemDescWidth = '37px';
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
    $itemDescWidth = '91px';
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
} else if ($invoicePanel == 'sellInvLayA5') {
    $divIdClass = 'bodyClass';
    $tableClass = 'sellInvA5-main-table';
    $imageClass = 'a5-logo-image';
    $colspan = '8';
    $itemIdWidth = '44px';
    $itemDescWidth = '66px';
    $gsWtWidth = '60px';
    $ntWtWidth = '60px';
    $rateWidth = '45px';
    $valWidth = '70px';
    $labourWidth = '55px';
    $amtWidth = '91px';
    $balanceTopBorder = '';
    $itemNameSubstr = '6';
    $balanceInWordsFs = 'fs_14';
    $firmHeader = 'fs_22';
    $firmLongName = 'fs_20';
    $firmDesc = 'fs_16';
    $firmAddress = 'fs_14';
    $addressSubStr = '45';
    $fontSize = 'fs_13';
    $textAreaWidth = '500px';
    $wd = 600;
    $totalWidth = '70px';
    $rawPurityTitle = 'PR';
    $rawRateTitle = 'RT';
    $goldShort = 'GD';
    $silverShort = 'SR';
    $rawTitle = 'RAW';
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
}
$labelType = 'schemeInv';
$fieldName = 'topSchemeInvMargin';
parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$topMargin = $label_field_content;

$label_field_content = '';
$fieldName = 'leftSchemeInvMargin';
parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
$leftMargin = $label_field_content;


$fieldName = 'formSchemeInvBorderCheck';
$label_field_content = '';
parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
if ($label_field_check == 'true') {
    $border = '#000000 1px solid';
} else {
    $border = '#000000 0px solid';
}
?>
<?php
$qSelKittyDepEMI = "SELECT * FROM kitty_money_deposit WHERE kitty_mondep_own_id = '$_SESSION[sessionOwnerId]' "
        . "AND kitty_mondep_kitty_id = '$kittyId' order by kitty_mondep_id asc";
$resSelKittyDepEMI = mysqli_query($conn, $qSelKittyDepEMI) or die("Entry:" . $qSelKittyDepEMI . mysqli_error($conn));
$rowSelKittyDepEMI = mysqli_fetch_array($resSelKittyDepEMI, MYSQLI_BOTH);

$emiAmt = $rowSelKittyDepEMI['kitty_mondep_prin_amt'];


$query = "SELECT * FROM kitty WHERE kitty_own_id = '$_SESSION[sessionOwnerId]' "
        . "AND kitty_cust_id = '$kittyCustId' "
        . "AND kitty_id = '$kittyId' and kitty_upd_sts IN ('New','Updated','Released')";
$CustDetails = mysqli_query($conn, $query);
$rowCustDetails = mysqli_fetch_array($CustDetails, MYSQLI_ASSOC);
$kitty_cust_fname = $rowCustDetails['kitty_cust_fname'];
$kitty_cust_lname = $rowCustDetails['kitty_cust_lname'];
$kitty_cust_mobile_no = $rowCustDetails['kitty_cust_mobile_no'];
$kitty_cust_Address = $rowCustDetails['kitty_cust_Address'];
$kittyId = $rowCustDetails['kitty_id'];
$kittyScheme = $rowCustDetails['kitty_scheme'];
$kittyGroup = $rowCustDetails['kitty_group'];
$kittyGiftItem = $rowCustDetails['kitty_gift_item'];
$kitty_gift_item_del_sts = $rowCustDetails['kitty_gift_item_del_sts'];
$kittyDOB = $rowCustDetails['kitty_DOB'];
$kittyDOB = om_strtoupper(($kittyDOB));
$kittyEndDOB = $rowCustDetails['kitty_end_DOB'];
$kittyEndDOB = om_strtoupper(($kittyEndDOB));
$kittyFirmId = $rowCustDetails['kitty_firm_id'];
$kittyNoOfDays = $rowCustDetails['kitty_EMI_days'];
$kittyNoOfEmi = $rowCustDetails['kitty_EMI_occurrences'];
$kittyScNoDayPrd = $rowCustDetails['kitty_scheme_prd_typ'];
$kittyMainAmount = $rowCustDetails['kitty_main_prin_amt'];
$kittyOtherInfo = $rowCustDetails['kitty_comm'];
$kittyPayOtherInfo = $rowCustDetails['kitty_pay_other_info'];
$kittyDrAccId = $rowCustDetails['kitty_dr_acc_id'];
$kittyPreSerialNum = $rowCustDetails['kitty_pre_serial_num'];
$kittySerialNum = $rowCustDetails['kitty_serial_num'];
$kittyTokenNum = $rowCustDetails['kitty_token_num'];
$kittyEMIDays = $rowCustDetails['kitty_EMI_days'];
$kittyCustId = $rowCustDetails['kitty_cust_id'];
$firmId = $rowCustDetails['kitty_firm_id'];
$kittyJrnlId = $rowCustDetails['kitty_jrnlid'];
$kittyBonusAmt = $rowCustDetails['kitty_bonus_amt'];
$kittyEMIStatus = $rowCustDetails['kitty_EMI_status'];
$kittyEmiAmt = $rowCustDetails['kitty_EMI_amt'];
$kittyBonusAmt = $rowCustDetails['kitty_bonus_amt'];
$kitty_barcode = $rowCustDetails['kitty_barcode'];
$kittyMetalType = $rowCustDetails['kitty_metal_type'];
$kittyStaffId = $rowCustDetails['kitty_staff_id'];
$kitty_upd_sts = $rowCustDetails['kitty_upd_sts'];
?>
<div id="schemeInvDispDiv">
    <div id="<?php echo $divIdClass; ?>" style="margin-top:<?php echo $topMargin . 'mm'; ?>;margin-left:<?php echo $leftMargin . 'mm'; ?>">
        <?php
        $fieldName = 'formSchemeInvWidth';
        $label_field_content = '';
        parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
        $formWidthInMM = $label_field_content;
        if ($formWidthInMM != '') {
            $fieldName = 'headerImtTop';
            $label_field_content = '';
            parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
            $headerTopVal = $label_field_content;
            ?>
            <table border="0" cellpadding="0" cellspacing="0" align="left" valign="top" bgcolor="#FFFFFF" style="width:<?php echo $formWidthInMM . 'mm'; ?>;border: <?php echo $border; ?>;padding-top:<?php echo $headerTopVal; ?>"><!-- change in alignment from center to left and top @AUTHOR:SANDY22JUL13 -->
                <?php
            } else {
                $fieldName = 'headerImtTop';
                $label_field_content = '';
                parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                $headerTopVal = $label_field_content;
                ?>
                <table border="0" cellpadding="0" cellspacing="0" align="center" valign="top" bgcolor="#FFFFFF" class="paddingLeft2 paddingRight2 <?php echo $tableClass; ?>" 
                       style="border: <?php echo $border; ?>;padding-top:<?php echo $headerTopVal; ?>mm"><!-- change in alignment from center to left and top @AUTHOR:SANDY22JUL13 -->
                       <?php } ?>
                <tr> 
                    <td align="center" colspan="<?php echo $colspan; ?>" width="100%">
                        <table border="0" cellpadding="0" width="90%" cellspacing="0">

                            <tr>
                                <td align="left">
                                    <table border="0" cellpadding="0" cellspacing="0" align="left"  style="margin-left:15px;">
                                        <tr>
                                            <?php
                                            $fieldName = 'firmSchemeInvLeftLogoCheck';
                                            $label_field_font_size = '';
                                            $label_field_font_color = '';
                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if (($label_field_check == 'true') && $firm_left_thumb_ftype != '') {
                                                ?>
                                                <?php
                                                $firmId = $firm_id;
                                                $noEcho = 'Y';
                                                include('omffgfli.php');
                                                $noEcho = '';
                                                ?>
                                                <td align="left" >
                                                    <img style="height:100px;width:100px;padding-right:20px;" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($firmThumb); ?>"
                                                             alt="" class="<?php echo $imageClass; ?>"/>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    </table>   
                                </td>
                                <!--START FIRM DETAILS-->
                                <td align="center">
                                    <table border="0" cellpadding="0" width="90%" cellspacing="0" align="center">
                                        <?php
                                        $fieldName = 'firmSchemeInvFormHeader';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_form_header != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <td valign="middle" align="center" colspan="2" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"  onClick="this.contentEditable = 'true';">
                                                    <?php echo $firm_form_header; ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        $fieldName = 'firmSchemeInvLongName';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_long_name != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <td valign="middle" align="center" colspan="2" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php echo"<b>" . ($firm_long_name) . "</b>"; ?>
                                                </td>
                                            </tr>

                                            <?php
                                        } $fieldName = 'firmSchemeInvDesc';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_desc != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <td valign="middle" align="center"  colspan="2" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php echo ($firm_desc); ?>
                                                </td>
                                            </tr>
                                            <?php
                                        } $fieldName = 'firmschemeInvRegNo';
                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_reg_no != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <?php
                                                $fieldName = 'firmschemeInvRegNoLabel';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                <td valign="middle" align="center" colspan="2"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?>:
                                                    <?php
                                                    $fieldName = 'firmschemeInvRegNo';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" ><?php echo ($firm_reg_no); ?></span>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        $fieldName = 'firmschemeInvAddress';
                                        $label_field_font_size = '';
                                        $label_field_font_color = '';
                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                        if ($firm_address != NULL && $label_field_check == 'true') {
                                            ?>
                                            <tr> 
                                                <td valign="middle" align="center"  colspan="2" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php echo ($firm_address); ?>
                                                </td>
                                            </tr>
                                        <?php } if ((($firm_phone_details != NULL) || $firm_email != NULL)) { ?>
                                            <tr>                   
                                              <?php
                                                $fieldName = 'firmschemeInvPhone';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($firm_phone_details != NULL && $label_field_check == 'true') {
                                                    ?>

                                                <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px;padding-top: 5px;" onClick="this.contentEditable = 'true';">
                                                    <span  class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px">Phone No</span>
                                                            : <?php echo $firm_phone_details; ?>
                                                        </td>
                                                <?php 
                                                }
                                                 $fieldName = 'firmschemeInvEmail';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                if ($firm_email != NULL && $label_field_check == 'true') { ?>
                                                     <td valign="middle" align="left"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?> " style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                        <?php echo $label_field_content; ?> : <?php echo $firm_email; ?>
                                                    </td>
                                        <?php }} ?>
                                            </tr>
                                        <?php if ((($firm_tin_no != '') || $firm_pan_no != '')) { ?>
                                            <?php
                                            $fieldName = 'firmschemeInvTin';
                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($firm_tin_no != NULL && $label_field_check == 'true') {
                                                ?>
                                                <tr> 
                                                    <?php
                                                    $fieldName = 'firmschemeInvTinLb';
                                                    $label_field_font_size = '';
                                                    $label_field_font_color = '';
                                                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    ?>
                                                    <td valign="middle" align="center"  class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                        <?php echo $label_field_content; ?> :
                                                        <?php
                                                        $fieldName = 'firmschemeInvTin';
                                                        $label_field_font_size = '';
                                                        $label_field_font_color = '';
                                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" ><?php echo ($firm_tin_no); ?></span>
                                                    </td>
                                                      <?php
                                        } }
                                            $fieldName = 'firmschemeInvPan';
                                            parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if ($firm_pan_no != '' && $label_field_check == 'true') {
                                                ?>
                                                <?php
                                                $fieldName = 'firmschemeInvPanLb';
                                                $label_field_font_size = '';
                                                $label_field_font_color = '';
                                                parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                ?>
                                                    <td align="left">
                                                    <div class="ff_calibri  font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';"><?php echo $label_field_content; ?> :&nbsp;&nbsp;
                                                        <?php
                                                        $fieldName = 'firmschemeInvPan';
                                                        parse_str(getTableValues("SELECT label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                        ?>
                                                        <span class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $firm_pan_no; ?></span></div>  
                                                </td>
                                                </tr>
                                            <?php } ?>
                                      
                                      
                                    </table>
                                </td>
                                <!--START DATE & LOGO DETAILS-->
                                <td align="left">
                                    <table border="0" cellpadding="0" cellspacing="0" align="left"  style="margin-left:20px;">
                                        <tr >
                                            <?php
                                            $fieldName = 'firmSchemeInvRightLogoCheck';
                                            $label_field_font_size = '';
                                            $label_field_font_color = '';
                                            parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                            if (($label_field_check == 'true') && $firm_right_thumb_ftype != '') {
                                                ?>
                                            <?php
                                                $firmId = $firm_id;
                                                $noEcho = 'Y';
                                                include('omffgfri.php');
                                                $noEcho = '';
                                                ?>
                                                <td align="right" >
                                                      <img style="height:100px;width:100px;" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($firmThumb); ?>"
                                                             alt="" class="<?php echo $imageClass; ?>"/>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    </table>
                                </td>
                                <!--END DATE & LOGO DETAILS-->

                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table border="0" cellpadding="0" width="100%" cellspacing="0" style="padding-top:<?php echo $custDetTopVal; ?>mm">
                <tr>
                    <td align="left" valign="top">
                        <table border="0" cellpadding="0" width="100%" cellspacing="0" align="left">
                            <tr>
                                <td colspan="" valign="top" align="left">
                                    <div style="margin-top:5px;"></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="<?php echo $colspan; ?>">
                                    <table border="0" cellpadding="0" width="100%" cellspacing="0" style="padding-top:<?php echo $itemDetTopVal; ?>mm">
                                        <tr> 
                                            <td valign="middle" align="center" colspan="<?php echo $colspan; ?>">
                                                <div class="ff_calibri fw_n font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                                                    <?php
                                                    $fieldName= 'schemeInvTitle';
                                                    $label_field_content = '';
                                                    parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                                                    if ($kittyScheme != ''){
                                                    echo '<b>' . $kittyScheme . '  Scheme</b>';                                                                                                      
                                                    }else{
                                                    echo $label_field_content; 
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="<?php echo $colspan; ?>" class="paddingTop5">
                                    <hr>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table class="blueTable" align="left" width="55%" border="0">

                <tr height="30px">
                      <?php
                    $fieldName = 'userschemeInvName';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'userschemeInvNameLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?>
                    <td width="20%" align="left" style="padding-left: 5px; font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?> </td>
                         <?php } ?>
                    <?php
                         $fieldName = 'userschemeInvName';
                         $label_field_font_size = '';
                         $label_field_font_color = '';
                         parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                         if ($label_field_check == 'true') {
                      ?>
                    <td width="35%"> 
                        <?php
                        if ($user_fname == '') {
                            echo '';
                        } else {
                            echo $user_fname . ' ' . $user_lname;
                        }
                        ?>
                    </td>
                         <?php } ?>
                </tr>
                <?php
                $father_name = substr($user_father_name, 1);
                if ($father_name != '' && $father_name != NULL) {
                    ?>
                    <tr height="30px">
                        <td> FATHER/HUS NAME </td>
                        <td> 
                            <?php echo $father_name; ?>
                        </td>
                    </tr>
                <?php } ?>
                <?php if ($user_DOB != '' && $user_DOB != NULL) { ?>
                    <tr height="30px">
                          <?php
                    $fieldName = 'userschemeInvDob';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'userschemeInvDobLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?>                    
                         <td width="20%" align="left" style="padding-left: 5px; font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?> </td>    
                        <td> 
                             <?php
                         $fieldName = 'userschemeInvDob';
                         $label_field_font_size = '';
                         $label_field_font_color = '';
                         parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                         if ($label_field_check == 'true') {
                      ?>
                            <?php
                            echo $user_DOB;
                            ?>  
                        </td>
                         <?php } ?>
                    </tr>
                <?php } }?>
                <?php if ($user_mobile != '' && $user_mobile != NULL) { ?>
                    <tr height="30px">
                          <?php
                    $fieldName = 'userschemeInvContact';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'userschemeInvContactLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?>      
                        <td width="20%" align="left" style="padding-left: 5px; font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?> </td>                      
                        <td>
                                  <?php
                         $fieldName = 'userschemeInvContact';
                         $label_field_font_size = '';
                         $label_field_font_color = '';
                         parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                         if ($label_field_check == 'true') {
                      ?>
                            <?php
                            echo $user_mobile;
                            ?>
                        </td>
                         <?php } ?>
                    </tr>
                <?php } }?>
                <?php if ($user_email != '' && $user_email != NULL) { ?>
                    <tr height="30px">
                            <?php
                    $fieldName = 'userschemeInvEmail';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'userschemeInvEmailLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?> 
                        <td width="20%" align="left" style="padding-left: 5px; font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?> </td>
                                          
                        <td> 
                              <?php
                         $fieldName = 'userschemeInvEmail';
                         $label_field_font_size = '';
                         $label_field_font_color = '';
                         parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                         if ($label_field_check == 'true') {
                      ?>
                            <?php
                            echo $user_email;
                            ?>   
                        </td>
                         <?php } ?>
                    </tr>
                <?php }} ?>
                <?php if ($user_add != '' && $user_add != NULL) { ?>
                    <tr height="30px">
                         <?php
                    $fieldName = 'userschemeInvAddress';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'userschemeInvAddressLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?> 
                        <td width="20%" align="left" style="padding-left: 5px; font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></td>  
                        <td>
                         <?php
                         $fieldName = 'userschemeInvAddress';
                         $label_field_font_size = '';
                         $label_field_font_color = '';
                         parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                         if ($label_field_check == 'true') {
                       ?>
                            <?php
                            echo $user_add . ' , ' . $user_state . ' , ' . $user_country;
                            ?>
                        </td>
                         <?php } ?>
                    </tr>
                <?php } } ?>
                <?php
                if ($user_adhaar_card != '' && $user_adhaar_card != NULL) {
                    ?>
                    <tr height="30px">
                        <td> ID proof Type </td>
                        <td> 
                            <table cellpadding="0" cellspacing="2" border="0" style="border:none;">
                                <tr>
                                    <td style="border:none;">Aadhaar Card </td>
                                    <?php
                                    if ($kittyCustId != '') {
                                        $qSelCustAdhImg_1 = "SELECT * FROM image where image_user_id='$kittyCustId' and image_count='image11'";
                                        $resCustAdhImg_1 = mysqli_query($conn, $qSelCustAdhImg_1);
                                        $rowCustAdhImg_1 = mysqli_fetch_array($resCustAdhImg_1, MYSQLI_ASSOC);
                                        $image_adhaar_Id = $rowCustAdhImg_1['image_id'];
                                        //echo $image_adhaar_Id;
                                    }
                                    ?>
                                    <?php if ($image_adhaar_Id != '') { ?>
                                        <td align="center" valign="bottom" class="paddingLeft5 paddingRight5" title="Click here to see adhaar card photos!">
                                            <a class="noPrint" style="cursor: pointer;" target="_blank"
                                               onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$image_adhaar_Id"; ?>&imageCount=image11',
                                                               'popup', 'width=600,height=600,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                       return false" >
                                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$image_adhaar_Id"; ?>" 
                                                 width="24px" height="24px" border="1" 
                                                 style="border-color: #B8860B;" /> 
                                            </a> 
                                            
                                        </td>
                                    <?php } ?>
                                    <?php
                                    if ($kittyCustId != '') {
                                        $qSelCustAdhImg_1 = "SELECT * FROM image where image_user_id='$kittyCustId' and image_count='image12'";
                                        $resCustAdhImg_1 = mysqli_query($conn, $qSelCustAdhImg_1);
                                        $rowCustAdhImg_1 = mysqli_fetch_array($resCustAdhImg_1, MYSQLI_ASSOC);
                                       $image_adhaar_Id = $rowCustAdhImg_1['image_id'];
                                        //echo"ak".$image_adhaar_Id;
                                    }
                                    ?>
                                    <?php if ($image_adhaar_Id != '') { ?>
                                        <td align="center" valign="bottom" class="paddingLeft5 paddingRight5" title="Click here to see adhaar card photos!">
                                            <a class="noPrint" style="cursor: pointer;" target="_blank"
                                               onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$image_adhaar_Id"; ?>&imageCount=image12',
                                                               'popup', 'width=600,height=600,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                       return false" >
                                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$image_adhaar_Id"; ?>&imageCount=image12" 
                                                     width="24px" height="24px" border="1" style="border-color: #B8860B"/>
                                            </a> 
                                        </td>
                                    <?php } ?>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr height="30px">
                        <td> ID proof No. </td>
                        <td> <?php
                            if ($user_adhaar_card == '') {
                                echo '';
                            } else {
                                echo $user_adhaar_card;
                            }
                            ?> </td>
                    </tr>
                <?php } ?>
                <?php if ($user_pan_it_no != '' && $user_pan_it_no != NULL) { ?>
                    <tr height="30px">
                        <td> ID proof Type </td>
                        <td> 
                            <table cellpadding="0" cellspacing="2" border="0" style="border:none;">
                                <tr>
                               <?php
                    $fieldName = 'userschemeInvPan';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'userschemeInvPanLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?> 
                                        <td width="20%" align="left" style="padding-left: 5px;border:none;font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?></td>
                                 
                                        
                                        <?php
                                        if ($kittyCustId != '') {
                                            $qSelCustPANImg = "SELECT * FROM image where image_user_id='$kittyCustId' and image_count='image13'";
                                            $resCustPANImg = mysqli_query($conn, $qSelCustPANImg);
                                            $rowCustPANImg = mysqli_fetch_array($resCustPANImg, MYSQLI_ASSOC);
                                            $image_snap_fname_pan = $rowCustPANImg['image_snap_fname'];
                                            $image_Id = $rowCustPANImg['image_id'];
                                           // echo"ak".$image_Id;
                                        }
                                        ?>
                                                    <?php //if ($image_snap_fname_pan != '') {  ?>
                                              <!--  <td align="center" valign="bottom" class="paddingLeft5 paddingRight5" title="Click here to see adhaar card photos!">
                                                    <a class="noPrint" style="cursor: pointer;" target="_blank"
                                                       onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omccusaim.php?user_id=<?php echo "$kittyCustId"; ?>&imageCount=image13',
                                                                       'popup', 'width=600,height=600,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                               return false" >
                                                        <img src="<?php echo $documentRootBSlash; ?>/include/php/omccguaim.php?user_id=<?php echo "$kittyCustId"; ?>&imageCount=image13" 
                                                             width="24px" height="24px" border="1" style="border-color: #B8860B"/>
                                                    </a> 
                                                </td>
                                                <?php //}  ?>
                                                <td valign="bottom" align="right"> -->
        <?php
//                        if ($kittyCustId != '') {
//                            $qSelCustImg = "SELECT * FROM image where image_user_id='$kittyCustId' and (image_count=0 OR image_count IS NULL)";
//                            $resCustImg = mysqli_query($conn, $qSelCustImg);
//                            $rowCustImg = mysqli_fetch_array($resCustImg, MYSQLI_ASSOC);
        // $image_snap_fname = $rowCustImg['image_snap_fname'];
        // $image_Id = $rowCustPANImg['image_id'];
        //}
        ?>
                             <?php if ($image_Id != '') { ?>
                                        <a style="cursor: pointer;"
                                           onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$image_Id"; ?>',
                                                           'popup', 'width=600,height=600,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                                   return false">
                                            <img src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$image_Id"; ?>" 
                                                 width="24px" height="24px" border="0"
                                                 style="border-color: #B8860B;" /> 
                                        </a>
        <?php } ?>
                            </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr height="30px">
                        <td>ID proof No. </td>
                        <?php
                         $fieldName = 'userschemeInvPan';
                         $label_field_font_size = '';
                         $label_field_font_color = '';
                         parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                         if ($label_field_check == 'true') {
                       ?>
                        <td> <?php echo $user_pan_it_no; ?> </td>
                    <?php }} ?>
                    </tr>
                <?php } ?>
                <?php
                // QUERY TO GET NOMINEE
                parse_str(getTableValues("SELECT label_field_content FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                $ternCondition = $label_field_content;
                if ($user_nominee_name != '' && $user_nominee_name != NULL) {
                    ?>
                    <tr height="30px">
                        <td> NOMINEE </td>
                        <td>
                            <?php echo strtoupper($user_nominee_name); ?>
                        </td>
                    </tr>
                    <?php
                } else if ($nomineeId != '' && $nomineeId != NULL) {
                    $nomineeId = substr($nomineeId, 1);
                    parse_str(getTableValues("SELECT user_fname,user_lname FROM user where user_owner_id='$sessionOwnerId' and user_id='$nomineeId'"));
                    ?>
                    <tr height="30px">
                        <td> NOMINEE </td>
                        <td>
                            <?php echo strtoupper($user_fname . ' ' . $user_lname); ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <table class="blueTable" align="right" width="45%" border="0">
                <tr>
                    <td valign="bottom" align="left" width="40%" >
                         <?php 
                    $fieldName = 'userschemeInvNo';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'userschemeInvNoLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?>     
                        <div class="block84LText9 element" id="tailbcBarcode" style="font-size: 14px; border:0px solid; cursor:pointer; width:120px; margin-left:2%;" >

                            <img src="<?php echo $documentRootBSlash; ?>/include/php/ommpitbc.php?panel=SchemeBarcode&bar_id=<?php
                            echo $kitty_barcode;
                            ?>" alt="Barcode" width="120px" height="25px" /><br>
                        </div>
                        <div style="margin-left: 35%;margin-bottom: 5px;font-weight: bold; font-size: 16px;">
                            <br />
                        </div> 
                        <div id="BarCodeNumber" class="element" style="width:auto;cursor:pointer;border:0px solid;
                             font-size:16px;margin-top: -10%;margin-left: 74%;" > 
                             <?php
                             echo $kitty_barcode;
                             ?>
                        </div>                
                    </td>
                    
                    <!--START CUSTOMER IMAGE DETAILS-->
                    <td valign="bottom" align="center">
                        <?php
                        if ($kittyCustId != '') {
                           $qSelPerFirm = "SELECT image_id,image_user_id,image_user,image_user_type,image_snap_thumb,"
                                            . "image_snap_fname,image_snap_ftype,image_snap_fsize,image_snap_fszMB,image_snap_desc "
                                            . "FROM image where image_user_id='$kittyCustId' AND (image_count='0' OR image_count='' OR image_count IS NULL) AND (image_snap_ftype IS NOT NULL AND image_snap_ftype!='')"; // ADD THIS ( image_count='0' OR )CONDITION IN THIS QUERRY @YUVRAJ 31102022
                                    $resPerFirm = mysqli_query($conn, $qSelPerFirm);
                                    $rowPerFirm1 = mysqli_fetch_array($resPerFirm, MYSQLI_ASSOC);
                                    $image_snap_fname = $rowPerFirm1['image_snap_fname'];
                                    $image_user_Id = $rowPerFirm1['image_user_id'];
                                    $image_cust_Id = $rowPerFirm1['image_id'];
                            //echo"hello".$qSelPerFirm;
                        }
                        ?>
                        <?php if ($image_cust_Id != '') { ?>
                            <a style="cursor: pointer;"
                               onclick="window.open('<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$image_cust_Id"; ?>',
                                               'popup', 'width=600,height=600,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=0,top=0');
                                       return false">
                                <img src="<?php echo $documentRootBSlash; ?>/include/php/omshowimage.php?image_id=<?php echo "$image_cust_Id"; ?>" 
                                                width="145px" height="145px" border="0"
                                     style="border-color: #B8860B;" />
                            </a>
                        <?php } ?>
                    </td>
                    <?php } ?>     
                    <!--END CUSTOMER IMAGE DETAILS-->
                </tr>
                <?php if ($user_bank_details != '' && $user_bank_details != NULL) { ?>
                    <tr height="30px">
                        <?php 
                    $fieldName = 'userschemeInvBank';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'userschemeInvBankLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?>     
                        <td width="30%" align="left" style="padding-left: 5px; font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?> </td>
                          
                        <td width="25%">
                             <?php
                         $fieldName = 'userschemeInvBank';
                         $label_field_font_size = '';
                         $label_field_font_color = '';
                         parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                         if ($label_field_check == 'true') {
                       ?>
                            <?php
                            echo $user_bank_details;
                            ?>
                        </td>
                         <?php } ?>
                    </tr>
                <?php } } ?>
                <?php if ($kittyDOB != '' && $kittyDOB != NULL) { ?>
                    <?php 
                    $fieldName = 'SchemeInvJoinDate';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'SchemeInvJoinDateLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?>     
                    <tr height="30px">
                        <td width="20%" align="left" style="padding-left: 5px; font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?> </td>
                        
                        <td> 
                             <?php
                         $fieldName = 'SchemeInvJoinDate';
                         $label_field_font_size = '';
                         $label_field_font_color = '';
                         parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                         if ($label_field_check == 'true') {
                       ?>
                            <?php
                            echo $kittyDOB;
                            ?>
                        </td>
                         <?php } ?>
                    </tr>
                <?php }} ?>
                <?php if ($emiAmt != '' && $emiAmt != NULL) { ?>
                    <tr height="30px">
                          <?php 
                    $fieldName = 'schemeInstalAmt';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'schemeInstalAmtLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?>  
                        <td width="20%" align="left" style="padding-left: 5px; font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?> </td>
                         
                        <td> 
                              <?php
                         $fieldName = 'schemeInstalAmt';
                         $label_field_font_size = '';
                         $label_field_font_color = '';
                         parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                         if ($label_field_check == 'true') {
                       ?>
                            <?php
                            echo $emiAmt;
                            ?> 
                        </td>
                         <?php } ?>
                    </tr>
                <?php }} ?>
                <?php if ($kittyNoOfEmi != '' && $kittyNoOfEmi != NULL) { ?>
                    <tr height="30px">
                               <?php 
                    $fieldName = 'schemeInvNoOfInstal';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'schemeInvNoOfInstalLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?>  
                        <td width="20%" align="left" style="padding-left: 5px; font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?> </td>
                         
                        <td> 
                              <?php
                         $fieldName = 'schemeInvNoOfInstal';
                         $label_field_font_size = '';
                         $label_field_font_color = '';
                         parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                         if ($label_field_check == 'true') {
                       ?>
                            <?php
                            echo $kittyNoOfEmi;
                            ?>  
                        </td>
                         <?php } ?>
                    </tr>
                <?php } } ?>
                    
                    
                    <?php if ($kittyTokenNum != '' && $kittyTokenNum != NULL) { ?>
                    <tr height="30px">
                                  <?php 
                    $fieldName = 'schemeInvTokenNo';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'schemeInvTokenNoLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?> 
                        <td width="20%" align="left" style="padding-left: 5px; font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?> </td>
                        
                        <td> 
                              <?php
                         $fieldName = 'schemeInvTokenNo';
                         $label_field_font_size = '';
                         $label_field_font_color = '';
                         parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                         if ($label_field_check == 'true') {
                       ?>
                            <?php
                            echo $kittyTokenNum;
                            ?>  
                        </td>
                         <?php } ?>
                    </tr>
                    <?php } } ?>
                    
                    
                <?php if ($kittyEndDOB != '' && $kittyEndDOB != NULL) { ?>
                    <tr height="30px">
                                      <?php 
                    $fieldName = 'SchemeInvMaturityDate';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'SchemeInvMaturityDateLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?> 
                        <td width="20%" align="left" style="padding-left: 5px; font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?> </td>
                         
                        <td> 
                              <?php
                         $fieldName = 'SchemeInvMaturityDate';
                         $label_field_font_size = '';
                         $label_field_font_color = '';
                         parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                         if ($label_field_check == 'true') {
                       ?>
                            <?php if($nepaliDateIndicator == 'YES'){
                                echo $kittyEndDOB;
                            }else{
                                echo ' ' . strtoupper("$kittyEndDOB"); 
                            } ?>   
                        </td>
                         <?php } ?>
                    </tr>
                <?php } } ?>
            </table>              
            <table border="0" class="blueTable2" cellpadding="0" cellspacing="0" width="100%">
                <tr height="35px">
                     <?php               
                    $fieldName = 'tncSchemeInv';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        $totalColumns++;
                        $fieldName = 'tncschemeInvLb';
                        $srNoPresent = 'Y';
                        $label_field_content = '';
                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                        if ($label_field_font_size == 0) {
                            $label_field_font_size = 14;
                        }
                        ?>                  
                    <td width="20%" align="left" style="padding-left: 5px; font-size: <?php echo $label_field_font_size; ?>px;"><?php echo $label_field_content; ?> </td>
                         <?php } ?> 
                </tr>
                <tr>
                                     
                    <?php
                    $fieldName = 'tncSchemeInv';
                    $labelType = 'schemeInv';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $tnc = $label_field_content;
                    $tnc_size = $label_field_font_size;
                    $noOfRows = substr_count($tnc, "\n") + 2;
                    $height = $noOfRows * ($tnc_size * 3);
                    if($tnc_size=='' || $tnc_size ==null){
                       $tnc_size = 14; 
                    }
                    if($label_field_check == 'true'){
                    ?>
                    <td align="left"  class="ff_calibri fw_n font_color_<?php echo $tnc_color; ?>" style="" >
                        <div onClick="this.contentEditable = 'false';">

                            <textarea id="tncLabel" spellcheck="false" name="tncLabel" class="textarea_a5_content ff_calibri font_color_<?php echo $tnc_color; ?>" rows="<?php echo $noOfRows; ?>"
                                      style="text-align:left;width:99%;height:<?php echo $height; ?>;font-size:<?php echo $tnc_size; ?>px"><?php echo preg_replace('/\\\\/i', ' ', $tnc); ?></textarea>                                   
                        </div>
                    </td>
                    <?php }else{ ?>
                    <td></td>
                     <?php } ?>
                </tr>
<!--                <tr><td style="font-size:12px">1.<?php echo $firm_long_name; ?> &quot;Desire&quot; is monthly installment advance Jewellery Purchase Plan..</td></tr>
                <tr><td style="font-size:12px">2.The amount of installments has minimum value of Rs. 2000 and it can be any amount in multiples of INR 500.
                        Customers will have to choose any one and pay for 10 months.<td></tr>
                <tr><td style="font-size:12px">3.The scheme is open to all Indian citizens having age 18yrs or more.</td></tr>
                <tr><td style="font-size:12px">4.At the end of 11th month, after paying all 10 installments, customers can buy jewellery for the amount
                        accumulated in their account at the prevailing rate on the date of purchase. </td></tr>
                <tr><td style="font-size:12px">5.If a few installments are delayed, the maturity date of plan gets delayed.</td></tr>
                <tr><td style="font-size:12px">6.Customers can pay their monthly installments only at <?php echo $firm_long_name; ?> Sadar Bazar Shahjajanpur outlets. </td></tr>
                <tr><td style="font-size:12px">7.Mode of payments can be through  Cash / Local Cheques / Debit Cards / Credit Cards also the payment is made 
                        through NEFT/IMPS/RTGS/UPI, please inform us by sending an email to the below-mentioned addresses mentioning your chit ID. 
                        Email address for <?php echo $firm_long_name; ?> store <?php echo $firm_email; ?> <br>
                        Alternate Email address for <?php echo $firm_long_name; ?> contactus@OMUNIM.in   </td></tr>
                <tr><td style="font-size:12px">8.This scheme is valid only for purchase of Gold & Diamond Jewellery not applicable for pure gold, silver & coins, 
                        Member can buy jewellery for higher amount also. For example, if the amount on maturity is Rs. 22000 the member 
                        can buy jewellery worth Rs.35000/- by paying additional amount of Rs. 13000/-</td></tr>
                <tr><td style="font-size:12px">9.Wastage, GST, Making Charge and other government levies if any shall be fully borne by customers.</td></tr>
                <tr><td style="font-size:12px">10.Cash will not be refunded under any circumstances..</td></tr>
                <tr><td style="font-size:12px">11.<?php echo $firm_long_name; ?> will not be paying any interest.</td></tr>
                <tr><td style="font-size:12px">12.This scheme is not transferable. Any additional discount given under the DJP Scheme will be deducted at the 
                        time of redemption if customer chooses to discontinue scheme before maturity or breaches the terms and conditions of the DJP Scheme.<td></tr>
                <tr><td style="font-size:12px">13.In case of discontinuation of the scheme before completing 11 months or 10+1 installments, customers can buy 
                        jewellery for the amount they have paid without any benefits of the scheme.</td></tr>
                <tr><td style="font-size:12px">14.At the time of maturity and purchase of jewellery, the original membership card & Receipt should be surrendered. 
                        The member would be able to redeem and buy the jewellery under the scheme, at the time of purchase. 
                        If unable to come in person, the member can authorize a person, with a duly signed authorization letter, that grants permission to sign the invoice and purchase jewellery on member&apos;s behalf. 
                        At the time of redemption, the nominated person should bring the original pass book and produce authentic photo ID proof. </td></tr>
                <tr><td style="font-size:12px">15.<?php echo $firm_long_name; ?> reserves the right to cancel DJP Scheme installment if there is any discrepancy in the details submitted by you or not submit valid ID proof.</td></tr>
                <tr><td style="font-size:12px">16.All disputes are subject to jurisdiction of competent courts in Shahjahanpur </td></tr>-->
            </table>
            <br>
            <table width="100%" class="blueTable">
                <tr height="40px"> 
                        <?php
//                                        $fieldName = 'authSchemeSignLb';
//                                        parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    $fieldName = 'authSchemeInvCustSignLb';
                    $label_field_check = '';
                    parse_str(getTableValues("SELECT label_field_content,label_field_font_size,label_field_font_color,label_field_check FROM labels WHERE label_own_id = '$sessionOwnerId' and label_field_name = '$fieldName' and label_type = '$labelType'"));
                    if ($label_field_check == 'true') {
                        if ($rowCustSnap['user_sign_update_date'] != "") {
                            ?>
                            <td align="left" valign="bottom" width="50%" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content . "      (" . $rowCustSnap['user_sign_update_date'] . ")"; ?></td>
                            <?php
                        } else {
                            ?>  
                            <td align="left" valign="bottom" width="50%" class="ff_calibri fw_b font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px"><?php echo $label_field_content; ?></td>
                            <?php
                        }
                    } else {
                        ?>
                        <td align="left"valign="bottom"  width="50%" ></td>
                        <?php
                    }
                    ?>
                    <td valign="bottom" align="right" class="ff_calibri font_color_<?php echo $label_field_font_color; ?>" style="font-size:<?php echo $label_field_font_size; ?>px" onClick="this.contentEditable = 'true';">
                        <?php echo($firm_long_name); ?>
                    </td>
            </table>                      
            <br>
            <?php 
            
            // ****************************************************************
            // START CODE FOR WHATSAPP SEND PDF : AUTHOR @GANGADHAR 22 DEC 2023
            // ****************************************************************
                $slPrPreInvoiceNo = $_GET['kittyPreSerialNum'];
                $slPrInvoiceNo = $_GET['kittySerialNum'];
                $userId = $_GET['kittyCustId'];
                $invmessageText = 'Scheme Invoice Details :';
                //
                $invoiceDate = $kittyDOB;
                //
                //
                $invoiceDateTime = date("d M Y", strtotime($invoiceDate));
                $invoiceDate = strtoupper($invoiceDateTime);
                //$_GET['invoiceDate'] = $invoiceDate;
            
            
                
            if ($whatsappStatus == 'Yes') {
                if ($systemOnOrOff == 'ON') {
                    $dirName = $documentRootIncludePhp . 'invoice/' . $sessionOwnerId;
                    if (!is_dir($dirName)) {
                        chmod($documentRootIncludePhp . 'invoice', 0777);
                        mkdir($dirName, 0777, true);
                    }
                } else {
                    $dirName = 'invoice';
                }
                //
                chmod($dirName, 0777);
                $readWritefile = fopen("$dirName/om_current_invoice.html", "w");
                fwrite($readWritefile, ob_get_contents());
                fclose($readWritefile);
                //
                if ($systemOnOrOff == 'ON') {
                    //
                    $cmd = "/usr/local/bin/wkhtmltopdf " . "$dirName/om_current_invoice.html " . "$dirName/om_current_invoice.pdf";
                    //  
                } else {
                    //
                    $folderPathForCommand = str_replace('/', '\\', $documentRootIncludePhp);
                    $cmd = $folderPathForCommand . "invoice\wkhtmltopdf\bin\wkhtmltopdf.exe " . $folderPathForCommand . "invoice\om_current_invoice.html " . $folderPathForCommand . "invoice\om_current_invoice.pdf";
                    //
                }

                 shell_exec($cmd);
                //
                include 'ogspwhatsapp.php';
                //
            }
            ob_end_flush();
            
            // ****************************************************************
            // END  CODE FOR WHATSAPP SEND PDF : AUTHOR @GANGADHAR 22 DEC 2023
            // ****************************************************************
            ?>
            <table border="0" cellpadding="0" cellspacing="0" align="center" style="width:<?php echo $divIdClass; ?>">
                <tr>
                    <td align="center" class="noPrint" colspan="<?php echo $colspan; ?>">
                        <a style="cursor: pointer;" 
                           onClick="window.print();">
                            <img src="<?php echo $documentRootBSlash; ?>/images/printer32.png" alt='Print' title='Print'
                                 width="32px" height="32px" /> 
                        </a>
                        <a style="cursor: pointer;" 
                           onClick="var url = window.location.href;
                            url += '&whatsappStatus=Yes';
                            window.location.href = url;" >
                            <img src="<?php echo $documentRootBSlash; ?>/images/whatsapp24.png" alt='Send Whatsapp' title='Send Whatsapp'
                                 width="32px" height="32px" /> 
                        </a>
                    </td>
                </tr>
            </table>
    </div>
</body>
</html>